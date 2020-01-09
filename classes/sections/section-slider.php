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

			if( $ast_hompage_slide_count ) {

				for( $base = 1; $base <= $ast_hompage_slide_count; $base++ ) {

					${"ast_slide_$base"} = array(

						/**
						 * Option: Slide Above Divider
						 */
						array(
							'name'            => ASTRA_THEME_SETTINGS . '[ast-slider-divider-section-slide-' . $base . '-header]',
							'type'            => 'control',
							'control'         => 'ast-heading',
							'section'         => 'section-slide-'. $base .'-contents',
							'title'           => __( 'Slide ' . $base . ' ', 'astra-slider' ),
							'priority'        => 5,
						),

						/**
						 * Option: Slide image selector
						 */
						array(
							'name'           => ASTRA_THEME_SETTINGS . '[astra-slider-banner-'. $base .'-image]',
							'default'        => astra_get_option( 'astra-slider-banner-'. $base .'-image' ),
							'type'           => 'control',
							'control'        => 'image',
							'section'        => 'section-slide-'. $base .'-contents',
							'priority'       => 10,
							'title'          => __( 'Banner Background Image', 'astra-slider' ),
							'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
						),

						/**
						 * Option: Slide Heading
						 */
						array(
							'name'     => ASTRA_THEME_SETTINGS . '[astra-slider-banner-'. $base .'-heading]',
							'default'  => astra_get_option( 'astra-slider-banner-'. $base .'-heading' ),
							'type'     => 'control',
							'section'  => 'section-slide-'. $base .'-contents',
							'priority' => 15,
							'title'    => __( 'Banner Heading', 'astra-slider' ),
							'control'  => 'text',
						),

						/**
						 * Option: Slide Description
						 */
						array(
							'name'      => ASTRA_THEME_SETTINGS . '[astra-slider-banner-'. $base .'-subheading]',
							'default'   => astra_get_option( 'astra-slider-banner-'. $base .'-subheading' ),
							'type'      => 'control',
							'control'   => 'textarea',
							'section'   => 'section-slide-'. $base .'-contents',
							'priority'  => 20,
							'description' => __( 'Custom Text / HTML allowed.', 'astra-slider' ),
							'title'     => __( 'Banner Description', 'astra' ),
						),
					);

					$configurations = array_merge( $configurations, ${"ast_slide_$base"} );
				}
			}

			$_configs = array(

				/**
				 * Option: Scroll On Top Colors Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[slider-on-top-color-divider]',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'section'  => 'section-slide-design',
					'title'    => __( 'Colors', 'astra-addon' ),
					'settings' => array(),
				),

				array(
					'name'      => ASTRA_THEME_SETTINGS . '[astra-slider-color-group]',
					'default'   => astra_get_option( 'astra-slider-color-group' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Icon', 'astra-addon' ),
					'section'   => 'section-slide-design',
					'transport' => 'postMessage',
				),

				/**
				 * Option: Icon Color
				 */
				array(
					'name'      => 'slider-to-top-icon-color',
					'default'   => '',
					'type'      => 'sub-control',
					'priority'  => 1,
					'parent'    => ASTRA_THEME_SETTINGS . '[astra-slider-color-group]',
					'section'   => 'section-slide-design',
					'tab'       => __( 'Normal', 'astra-addon' ),
					'control'   => 'ast-color',
					'transport' => 'postMessage',
					'title'     => __( 'Icon Color', 'astra-addon' ),
				),

				// Check Astra_Control_Color is exist in the theme.
				/**
				 * Option: Icon Background Color
				 */
				array(
					'name'      => 'slider-to-top-icon-bg-color',
					'default'   => '',
					'type'      => 'sub-control',
					'priority'  => 1,
					'parent'    => ASTRA_THEME_SETTINGS . '[astra-slider-color-group]',
					'section'   => 'section-slide-design',
					'tab'       => __( 'Normal', 'astra-addon' ),
					'transport' => 'postMessage',
					'control'   => 'ast-color',
					'title'     => __( 'Background Color', 'astra-addon' ),
				),

				/**
				 * Option: Icon Hover Color
				 */
				array(
					'name'      => 'slider-to-top-icon-h-color',
					'default'   => '',
					'type'      => 'sub-control',
					'priority'  => 1,
					'parent'    => ASTRA_THEME_SETTINGS . '[astra-slider-color-group]',
					'section'   => 'section-slide-design',
					'tab'       => __( 'Hover', 'astra-addon' ),
					'control'   => 'ast-color',
					'transport' => 'postMessage',
					'title'     => __( 'Icon Color', 'astra-addon' ),
				),

				// Check Astra_Control_Color is exist in the theme.
				/**
				 * Option: Link Hover Background Color
				 */

				array(
					'name'      => 'slider-to-top-icon-h-bg-color',
					'default'   => '',
					'type'      => 'sub-control',
					'priority'  => 1,
					'parent'    => ASTRA_THEME_SETTINGS . '[astra-slider-color-group]',
					'section'   => 'section-slide-design',
					'tab'       => __( 'Hover', 'astra-addon' ),
					'control'   => 'ast-color',
					'transport' => 'postMessage',
					'title'     => __( 'Background Color', 'astra-addon' ),
				),
			);

			$configurations = array_merge( $configurations, $_configs );

			return $configurations;
		}
	}

}
	
new Astra_Slide_Configs;
