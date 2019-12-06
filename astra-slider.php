<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://brainstormforce.com/
 * @since             1.0.0
 * @package           Astra_Slider
 *
 * @wordpress-plugin
 * Plugin Name:       Astra Homepage Slider
 * Plugin URI:        http://wpastra.com/
 * Description:       Showcase elegant homepage slider using Astra theme.
 * Version:           1.0.0
 * Author:            Brainstorm Force
 * Author URI:        https://brainstormforce.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       astra-slider
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Plugin constants.
 * 
 * Start at version 1.0.0
 */

define( 'ASTRA_SLIDER_PLUGIN_FILE' , __FILE__ );
define( 'ASTRA_SLIDER_VERSION' , '1.0.0' );
define( 'ASTRA_SLIDER_BASE_DIR_NAME' , plugin_basename( ASTRA_SLIDER_PLUGIN_FILE ) );
define( 'ASTRA_SLIDER_ROOT', dirname( ASTRA_SLIDER_BASE_DIR_NAME ) );
define( 'ASTRA_SLIDER_BASE_FILE' , trailingslashit( ASTRA_SLIDER_PLUGIN_FILE ) . ASTRA_SLIDER_BASE_DIR_NAME . '.php' );
define( 'ASTRA_SLIDER_BASE_DIR' , plugin_dir_path( ASTRA_SLIDER_PLUGIN_FILE ) );
define( 'ASTRA_SLIDER_BASE_URL' , plugins_url( '/', ASTRA_SLIDER_PLUGIN_FILE ) );

/**
 * The code that runs during plugin activation.
 * 
 * @since    1.0.0
 */
register_activation_hook( ASTRA_SLIDER_PLUGIN_FILE, 'activate_astra_homepage_slider' );

function activate_astra_homepage_slider() { }

/**
 * The code that runs during plugin deactivation.
 * 
 * @since    1.0.0
 */
register_deactivation_hook( ASTRA_SLIDER_PLUGIN_FILE, 'deactivate_astra_homepage_slider' );

function deactivate_astra_homepage_slider() { }

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
if ( ! function_exists( 'astra_slider_plugin_setup' ) ) :

	/**
	 * Astra Slider Setup
	 *
	 * @since 1.0.0
	 */
	function astra_slider_plugin_setup() {
		require_once ASTRA_SLIDER_BASE_DIR . 'classes/class-astra-slider.php';
	}

	add_action( 'plugins_loaded', 'astra_slider_plugin_setup' );

endif;
