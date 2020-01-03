<?php
/**
 * Astra Slider - Panels & Sections
 *
 * @package Home Page Slider for Astra Theme
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
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

if ( ! class_exists( 'Astra_Slider_Panels_Configs' ) ) {

	/**
	 * Register Astra Slider Customizer Configurations.
	 */
	class Astra_Slider_Panels_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Astra Slider Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_config = array(

				/*
				 * Slider Panel Section
				 *
				 * @since 1.0.0
				 */
				array(
					'name'     => 'panel-astra-slider',
					'type'     => 'panel',
					'priority' => 20,
					'title'    => __( 'Astra Slider', 'astra-slider' ),
				),

				array(
					'name'     => 'section-astra-slides',
					'title'    => __( 'Slides', 'astra-slider' ),
					'panel'    => 'panel-astra-slider',
					'priority' => 5,
					'type'     => 'section',
				),

				array(
					'name'     => 'section-slide-design',
					'title'    => __( 'Design', 'astra-slider' ),
					'panel'    => 'panel-astra-slider',
					'priority' => 10,
					'type'     => 'section',
				),
			);

			$ast_hompage_slide_count = apply_filters( 'ast_hompage_slide_count', 3 );

			if( $ast_hompage_slide_count ) {

				for( $base = 1; $base <= $ast_hompage_slide_count; $base++ ) {

					$ast_slide = array(
						array(
							'name'     => 'section-astra-slide-'. $base .'-contents',
							'title'    => __( 'Slide ' . $base .' ' , 'astra-slider' ),
							'section'  => 'section-astra-slides',
							'priority' => 5 + $base,
							'type'     => 'section',
						),
					);

					$_config = array_merge( $_config, $ast_slide );
				}
			}

			return array_merge( $configurations, $_config );
		}
	}
}

new Astra_Slider_Panels_Configs;
