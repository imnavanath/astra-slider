<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       https://brainstormforce.com/
 * @since      1.0.0
 *
 * @package    Astra_Slider
 * @subpackage Astra_Slider/classes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Astra_Slider
 * @subpackage Astra_Slider/classes
 * @author     Brainstorm Force <support@bsf.io>
 */
if ( ! class_exists( 'Astra_Slider_Markup' ) ) {

	class Astra_Slider_Markup {

		/**
		 * The unique instance of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      Astra_Slider_Markup    $instance    Maintains Instance in a variable.
		 */
		private static $instance;

		/**
		 * Gets an instance of our plugin.
		 * 
		 * @since    1.0.0
		 */
		public static function get_instance() {

			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since      1.0.0
		 * @param      string    $plugin_name       The name of this plugin.
		 * @param      string    $version    The version of this plugin.
		 */
		public function __construct() {

			add_filter( 'body_class', array( $this, 'body_classes' ), 10, 1 );
			add_action( 'astra_header_after', array( $this, 'load_astra_slider_markup' ), 0 );
			add_action( 'wp_enqueue_scripts', array( $this, 'load_astra_slider_scripts' ), 9 );
		}

		/**
		 * Add Body Classes
		 *
		 * @param  array $classes Body Class Array.
		 * @return array
		 * @since      1.0.0
		 */
		public function body_classes( $classes ) {

			if ( ! defined( 'ASTRA_THEME_SETTINGS' ) ) {
				return;
			}

			$classes[] = 'astra-slider-' . ASTRA_SLIDER_VERSION;

			return $classes;
		}

		/**
		 * Advanced Headers markup loader
		 *
		 * Loads appropriate template file based on the style option selected in options panel.
		 *
		 * @since 1.0.0
		 */
		public function load_astra_slider_markup() {

			if ( ! defined( 'ASTRA_THEME_SETTINGS' ) ) {
				return;
			}

			if( apply_filters( 'ast_slider_enabled_on', is_front_page() ) ) {

				$ast_hompage_slide_count = apply_filters( 'ast_hompage_slide_count', 3 );

				$home_page_banner_size 	= astra_get_option('slider-image-size-option');

				// Full Screen.
				$full_screen = ( 'custom-size' != $home_page_banner_size ) ? ' ast-full-home-page-ast-slider' : '';

				$slider_markup = '';

				$slick_options = array(
					'slidesToShow'   => 2,
					'slidesToScroll' => 1,
					'autoplaySpeed'  => 2000,
					'autoplay'       => 'yes',
					'infinite'       => 'yes',
					'pauseOnHover'   => 'yes',
					'speed'          => 500,
					'arrows'         => true,
					'dots'           => true,
					'prevArrow'      => '<button type="button" data-role="none" class="slick-prev slick-arrow fa fa-angle-left" aria-label="Previous" role="button"></button>',
					'nextArrow'      => '<button type="button" data-role="none" class="slick-next slick-arrow fa fa-angle-right" aria-label="Next" role="button"></button>',
				);

				// Ast-Slider configuration

				$dots 				= 		'true';
				$arrows 			= 		'true';
				$autoplay 			= 		'true';
				$autoplay_interval 	= 		2000;
				$speed 				= 		300;
				$fade 				= 		'false';
				$rtl               	= 		'';

				$slider_conf = compact( 'dots', 'arrows', 'autoplay', 'autoplay_interval', 'fade','speed', 'rtl' );

				if( $ast_hompage_slide_count ) {

					for( $base = 1; $base <= $ast_hompage_slide_count; $base++ ) {

						${"banner_pre_heading_$base"} 		= 		astra_get_option( 'astra-slider-banner-' . $base . '-pre-heading' );
						${"banner_heading_$base"} 			= 		astra_get_option( 'astra-slider-banner-' . $base . '-heading' );
						${"banner_subheading_$base"} 		= 		astra_get_option( 'astra-slider-banner-' . $base . '-subheading' );

						$slide_btn_1_text 	= astra_get_option('slide-'. $base .'-cta-1-text');
						$slide_btn_1_link 	= astra_get_option('slide-'. $base .'-cta-1-link');

						$slide_btn_2_text 	= astra_get_option('slide-'. $base .'-cta-2-text');
						$slide_btn_2_link 	= astra_get_option('slide-'. $base .'-cta-2-link');

						$slider_markup .= '<div class="ast-single-slide">' .
								'<div class="ast-slide-content">' .
									'<h6 class="banner-pre-heading">' . ${"banner_pre_heading_$base"} . '</h6>' .
									'<h2 class="banner-heading">' . ${"banner_heading_$base"} . '</h2>' .
									'<p class="banner-subheading">' . ${"banner_subheading_$base"} . '</p>' .
								'</div>' .
								'<div class="ast-slide-cta-wrapper">' .
									'<a class="ast-slide-button-link" href="' . esc_url( $slide_btn_1_link ) . '"><button class="ast-button ast-slider-cta-button">' . esc_html( $slide_btn_1_text ) .'</button></a>' .
									'<a class="ast-slide-button-link ast-slide-second-btn" href="' . esc_url( $slide_btn_2_link ) . '"><button class="ast-button ast-slider-cta-button">' . esc_html( $slide_btn_2_text ) .'</button></a>' .
								'</div>	</div>';
					}
				}

				$html = '<div class="ast-slider-wrapper">' .
							'<div id="ast-slides-container" class="home-page-ast-slider' . $full_screen . '">' .
								$slider_markup .
							'</div>' .
							'<div class="ast-slider-config" data-slide_conf="' . htmlspecialchars( json_encode( $slider_conf ) ) . '"></div>' .
						'</div>';
				echo $html;
			}
		}

		/**
		 * Loads frontend styles.
		 *
		 * @since 1.0.0
		 */
		public function load_astra_slider_scripts() {

			if ( ! defined( 'ASTRA_THEME_SETTINGS' ) ) {
				return;
			}

			if( is_front_page() ) {

				// Slick Style & Scripts.
				wp_enqueue_style( 'slick-css', ASTRA_SLIDER_BASE_URL . 'assets/css/slick.css', array(), ASTRA_SLIDER_VERSION );
				wp_enqueue_style( 'slick-theme-css', ASTRA_SLIDER_BASE_URL . 'assets/css/slick-theme.css', array(), ASTRA_SLIDER_VERSION );
				wp_enqueue_script( 'slick-js', ASTRA_SLIDER_BASE_URL . 'assets/js/slick.js', array( 'jquery' ), ASTRA_SLIDER_VERSION, true );

				// Astra Slider styles & scripts.
				wp_enqueue_style( 'ast-slider-css', ASTRA_SLIDER_BASE_URL . 'assets/css/astra-slider-style.css', array(), ASTRA_SLIDER_VERSION );
				wp_enqueue_script( 'ast-slider-js', ASTRA_SLIDER_BASE_URL . 'assets/js/astra-slider-script.js', array( 'jquery', 'slick-js' ), ASTRA_SLIDER_VERSION );
			}
		}
	}

	/**
	 *  Prepare if class 'Astra_Slider' exist.
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Astra_Slider_Markup::get_instance();
}
