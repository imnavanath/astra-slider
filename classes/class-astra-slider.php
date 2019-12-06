<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that classes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://brainstormforce.com/
 * @since      1.0.0
 *
 * @package    Astra_Slider
 * @subpackage Astra_Slider/classes
 */

defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Astra_Slider
 * @subpackage Astra_Slider/classes
 * @author     Brainstorm Force <support@bsf.io>
 */

if ( ! class_exists( 'Astra_Slider' ) ) {

	class Astra_Slider {

		/**
		 * The unique instance of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      Astra_Slider    $instance    Maintains Instance in a variable.
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
			/* Load plugin core file */
			$this->load_dependencies();
		}

		/**
		 * Load the required dependencies for this plugin.
		 *
		 * Include the following files that make up the plugin:
		 *
		 * - Astra_Slider_Loader. Orchestrates the hooks of the plugin.
		 * - Astra_Slider_Helper. Defines internationalization functionality.
		 * - Astra_Slider_Admin. Defines all hooks for the admin area.
		 * - Astra_Slider_Public. Defines all hooks for the public side of the site.
		 *
		 * Create an instance of the loader which will be used to register the hooks
		 * with WordPress.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function load_dependencies() {

			/**
			 * The class responsible for defining helping functionality
			 * of the plugin.
			 */
			require_once ASTRA_SLIDER_BASE_DIR . 'classes/class-astra-slider-helper.php';

			/**
			 * The class responsible for defining all actions that occur in the admin area.
			 */
			require_once ASTRA_SLIDER_BASE_DIR . 'classes/class-astra-slider-admin.php';
		}
	}

	/**
	 *  Prepare if class 'Astra_Slider' exist.
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Astra_Slider::get_instance();
}