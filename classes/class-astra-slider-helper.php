<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://brainstormforce.com/
 * @since      1.0.0
 *
 * @package    Astra_Slider
 * @subpackage Astra_Slider/classes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Astra_Slider
 * @subpackage Astra_Slider/classes
 * @author     Brainstorm Force <support@bsf.io>
 */
if ( ! class_exists( 'Astra_Slider_Helper' ) ) {

	class Astra_Slider_Helper {

		/**
		 * The unique instance of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      Astra_Slider_Helper    $instance    Maintains Instance in a variable.
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
		 * Define the core functionality of the plugin.
		 *
		 * Set the plugin name and the plugin version that can be used throughout the plugin.
		 * Load the dependencies, define the locale, and set the hooks for the admin area and
		 * the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function __construct() {
			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
		}

		/**
		 * Load BSF Announcements Text Domain.
		 * This will load the translation textdomain depending on the file priorities.
		 *      1. Global Languages /wp-content/languages/astra-slider/ folder
		 *      2. Local dorectory /wp-content/plugins/astra-slider/languages/ folder
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public function load_textdomain() {
			/**
			 * Filters the languages directory path to use for BSF Announcements.
			 *
			 * @param string $lang_dir The languages directory path.
			 */
			$lang_dir = apply_filters( 'astra_slider_domain_loader', ASTRA_SLIDER_ROOT . '/languages/' );
			load_plugin_textdomain( 'astra-slider', false, $lang_dir );
		}

		/**
		 * Load assets JS path
		 *
		 * @since 1.0.0
		 *
		 * @param  string $js_file_name JS file name.
		 * @return string               JS minified file path.
		 */
		public static function get_assets_js_path( $js_file_name = '' ) {

			if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
				return $js_file_name . '.js';
			}

			return 'min/' . $js_file_name . '.min.js';
		}

		/**
		 * Load assets CSS path
		 *
		 * @since 1.0.0
		 *
		 * @param  string $css_file_name CSS file name.
		 * @return string                CSS minified file path.
		 */
		public static function get_assets_css_path( $css_file_name = '' ) {

			if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
				return $css_file_name . '.css';
			}

			return 'min/' . $css_file_name . '.min.css';
		}
	}

	/**
	 *  Prepare if class 'Astra_Slider_Helper' exist.
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Astra_Slider_Helper::get_instance();
}
