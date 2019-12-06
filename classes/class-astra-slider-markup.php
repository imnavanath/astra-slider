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
if ( ! class_exists( 'Astra_Slider_Loader' ) ) {

	class Astra_Slider_Loader {

		/**
		 * The unique instance of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      Astra_Slider_Loader    $instance    Maintains Instance in a variable.
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

			// After Headers action.
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

			$classes[] = 'ast-slider-' . ASTRA_SLIDER_VERSION;

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

			if( is_front_page() ) {
				$banner_heading 	= astra_get_option('astra-slider-banner-heading');
				$banner_subheading 	= astra_get_option('astra-slider-banner-subheading');
				$home_page_banner_size 	= astra_get_option('banner-image-size-option');

				// Full Screen.
				$full_screen = ( 'full-size' == $home_page_banner_size ) ? ' ast-full-home-page-banner' : '';

				$html = '<div class="home-page-banner'.$full_screen.'">' .
							'<div class="heading-container">' .
								'<h2 class="banner-heading">' . $banner_heading . '</h2>' .
								'<h3 class="banner-subheading">' . $banner_subheading . '</h3>' .
							'</div>' .
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
				wp_enqueue_style( 'home-page-banner-css', ASTRA_SLIDER_BASE_URL . 'assets/css/astra-slider-style.css', array(), ASTRA_SLIDER_VERSION );
				wp_enqueue_script( 'home-page-banner-js', ASTRA_SLIDER_BASE_URL . 'assets/js/astra-slider-script.js', array( 'jquery' ), ASTRA_SLIDER_VERSION );
			}
		}
	}

	/**
	 *  Prepare if class 'Astra_Slider' exist.
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Astra_Slider_Loader::get_instance();
}
