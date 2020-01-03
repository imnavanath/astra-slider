<?php
/**
 * Astra Slider Options for our theme.
 *
 * @package     Astra Slider
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2019, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       1.0.0
 */

// Block direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bail if Customizer config base class does not exist.
if ( ! class_exists( 'Astra_Customizer_Config_Base' ) ) {
	return;
}

if ( ! class_exists( 'Astra_Slide_Configs' ) ) {

	/**
	 * Register Astra Slider Customizer Configurations.
	 */
	class Astra_Slide_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Astra Slider Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$ast_hompage_slide_count = apply_filters( 'ast_hompage_slide_count', 3 );

			$_config = array();

			if( $ast_hompage_slide_count ) {

				for( $base = 1; $base <= $ast_hompage_slide_count; $base++ ) {

					$_config = array(

						/**
						 * Option: Slide Above Divider
						 */
						 array(
							'name'            => 'ast-slider-divider-section-slide-' . $base . '-header',
							'type'            => 'control',
							'control'         => 'ast-heading',
							'section'         => 'section-astra-slide-'. $base .'-contents',
							'title'           => __( 'Slide ' . $base . ' ', 'astra-slider' ),
							'priority'        => 5,
						),

						/**
						 * Option: Slide image selector
						 */
						array(
							'name'           => 'astra-slider-banner-'. $base .'-image',
							'default'        => astra_get_option( 'astra-slider-banner-'. $base .'-image' ),
							'type'           => 'control',
							'control'        => 'image',
							'section'        => 'section-astra-slider-'. $base .'-contents',
							'priority'       => 10,
							'title'          => __( 'Sticky Logo', 'astra-slider' ),
							'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
						),

						/**
						 * Option: Slide Heading
						 */
						array(
							'name'     => 'astra-slider-banner-'. $base .'-heading',
							'default'  => astra_get_option( 'astra-slider-banner-'. $base .'-heading' ),
							'type'     => 'control',
							'section'  => 'section-astra-slider-'. $base .'-contents',
							'priority' => 15,
							'title'    => __( 'Slide Heading', 'astra-slider' ),
							'control'  => 'text',
						),

						/**
						 * Option: Slide Description
						 */
						array(
							'name'      => 'astra-slider-banner-'. $base .'-subheading',
							'default'   => astra_get_option( 'astra-slider-banner-'. $base .'-subheading' ),
							'type'      => 'control',
							'control'   => 'textarea',
							'section'   => 'section-astra-slider-'. $base .'-contents',
							'priority'  => 20,
							'description' => __( 'Custom Text / HTML allowed.', 'astra-slider' ),
							'title'     => __( 'Slide Description', 'astra' ),
						),
					);
				}
			}

			return array_merge( $configurations, $_config );
		}
	}

}
	
new Astra_Slide_Configs;
