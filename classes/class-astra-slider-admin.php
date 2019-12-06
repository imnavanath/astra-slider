<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://brainstormforce.com/
 * @since      1.0.0
 *
 * @package    Astra_Slider
 * @subpackage Astra_Slider/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Astra_Slider
 * @subpackage Astra_Slider/admin
 * @author     Brainstorm Force <support@bsf.io>
 */
if ( ! class_exists( 'Astra_Slider_Admin' ) ) {

	class Astra_Slider_Admin {

		/**
		 * The unique instance of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      Astra_Slider_Admin    $instance    Maintains Instance in a variable.
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

			/**
			 * The class responsible for setting up customizer settings
			 * of the plugin.
			 */
			require_once ASTRA_SLIDER_BASE_DIR . 'classes/class-astra-slider-loader.php';
			require_once ASTRA_SLIDER_BASE_DIR . 'classes/class-astra-slider-markup.php';

			/**
			 * Include front end files.
			 */
			if ( ! is_admin() && 'astra' === get_template() ) {
				require_once ASTRA_SLIDER_BASE_DIR . 'classes/dynamic.css.php';
			}
		}
	}

	/**
	 *  Prepare if class 'Astra_Slider_Admin' exist.
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Astra_Slider_Admin::get_instance();
}
