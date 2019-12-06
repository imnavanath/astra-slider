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

			add_filter( 'astra_theme_defaults', array( $this, 'theme_defaults' ) );
			// add_action( 'customize_preview_init', array( $this, 'preview_scripts' ) );
			add_action( 'customize_register', array( $this, 'customize_register' ) );
			// add_action( 'customize_controls_enqueue_scripts', array( $this, 'controls_scripts' ) );
			add_action( 'astra_get_fonts', array( $this, 'add_fonts' ) );
		}

		/**
		 * Set Options Default Values
		 *
		 * @param  array $defaults  Astra options default value array.
		 * @return array
		 * @since      1.0.0
		 */
		function theme_defaults( $defaults ) {

			$defaults['astra-slider-banner-heading']     			= __( 'Perfect Theme for Any Website', 'astra-slider' );
			$defaults['astra-slider-banner-subheading']  			= __( 'Lightning Fast & Easily Customizable', 'astra-slider' );
			$defaults['banner-font-family'] 				= 'inherit';
			$defaults['banner-font-weight'] 				= 'inherit';
			$defaults['banner-subheading-font-family'] 		= 'inherit';
			$defaults['banner-subheading-font-weight'] 		= 'inherit';
			$defaults['banner-heading-text-transform']		= '';
			$defaults['banner-heading-font-size']			= '';
			$defaults['banner-subheading-text-transform']	= '';
			$defaults['banner-subheading-font-size']		= '';
			$defaults['banner-bg-color'] 					= '#ffffff';
			$defaults['banner-subheading-bg-color'] 		= '#ffffff';
			$defaults['banner-image-size-option'] 			= 'custom-size';
			$defaults['banner-custom-top-padding'] 			= '10';
			$defaults['banner-custom-bottom-padding'] 		= '10';
			$defaults['astra-slider-banner-image']     		= ASTRA_SLIDER_BASE_URL . 'assets/images/banner.jpg';

			return $defaults;
		}

		/**
		 * Customizer Controls
		 *
		 * @see 'astra-customizer-controls-js' panel in parent theme
		 * @since      1.0.0
		 */
		function preview_scripts() {

			wp_enqueue_script( 'home-page-banner-preview', ASTRA_SLIDER_BASE_URL . 'inc/assets/js/customizer-preview.js', array( 'astra-customizer-preview-js', 'customize-preview' ), HOME_PAGE_BANNER_VER, true );
		}

		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 * @since      1.0.0
		 */
		function customize_register( $wp_customize ) {

			if ( ! defined( 'ASTRA_THEME_SETTINGS' ) ) {
				return;
			}

			/**
			 * Register Sections & Panels
			 */
			require_once ASTRA_SLIDER_BASE_DIR . 'classes/customizer-panels-and-sections.php';

			/**
			 * Sections
			 */
			require_once ASTRA_SLIDER_BASE_DIR . 'classes/sections/section-slider.php';
		}

		/**
		 * Customizer Preview
		 * 
		 * @since      1.0.0
		 */
		function controls_scripts() {

			wp_enqueue_script( 'home-page-banner-toggles', ASTRA_SLIDER_BASE_URL . 'inc/assets/js/customizer-toggles.js', array( 'astra-customizer-controls-toggle-js' ), HOME_PAGE_BANNER_VER, true );
		}

		/**
		 * Add Fonts support
		 * 
		 * @since      1.0.0
		 */
		public function add_fonts() {

			$font_family = astra_get_option( 'banner-font-family' );
			$font_weight = astra_get_option( 'banner-font-weight' );

			Astra_Fonts::add_font( $font_family, $font_weight );
			
			$subheading_font_family = astra_get_option( 'banner-subheading-font-family' );
			$subheading_font_weight = astra_get_option( 'banner-subheading-font-weight' );

			Astra_Fonts::add_font( $subheading_font_family, $subheading_font_weight );
		}
	}

	/**
	 *  Prepare if class 'Astra_Slider' exist.
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Astra_Slider_Loader::get_instance();
}
