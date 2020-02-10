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
							'title'           => __( 'Slide ' . $base . ' Content', 'astra-slider' ),
							'priority'        => 5,
						),

						/**
						 * Option: Slide Heading Prefix
						 */
						array(
							'name'     => ASTRA_THEME_SETTINGS . '[astra-slider-banner-'. $base .'-pre-heading]',
							'default'  => astra_get_option( 'astra-slider-banner-'. $base .'-pre-heading' ),
							'type'     => 'control',
							'section'  => 'section-slide-'. $base .'-contents',
							'priority' => 15,
							'title'    => __( 'Heading Prefix', 'astra-slider' ),
							'control'  => 'text',
						),

						/**
						 * Option: Slide Heading
						 */
						array(
							'name'     => ASTRA_THEME_SETTINGS . '[astra-slider-banner-'. $base .'-heading]',
							'default'  => astra_get_option( 'astra-slider-banner-'. $base .'-heading' ),
							'type'     => 'control',
							'section'  => 'section-slide-'. $base .'-contents',
							'priority' => 20,
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
							'priority'  => 25,
							'description' => __( 'Custom Text / HTML allowed.', 'astra-slider' ),
							'title'     => __( 'Banner Description', 'astra-slider' ),
						),

						/**
						 * Option: Slide CTA Divider
						 */
						array(
							'name'            => ASTRA_THEME_SETTINGS . '[ast-slider-cta-slide-' . $base . '-divider]',
							'type'            => 'control',
							'control'         => 'ast-heading',
							'section'         => 'section-slide-'. $base .'-contents',
							'title'           => __( 'Call To Action', 'astra-slider' ),
							'priority'        => 30,
						),

						/**
						 * Option: Button 1
						 */
						array(
							'name'     => ASTRA_THEME_SETTINGS . '[slide-'. $base .'-cta-1-text]',
							'default'  => astra_get_option( 'slide-'. $base .'-cta-1-text' ),
							'type'     => 'control',
							'section'  => 'section-slide-'. $base .'-contents',
							'priority' => 35,
							'title'    => __( 'Button 1 Text', 'astra-slider' ),
							'control'  => 'text',
						),

						/**
						* Option: Button 1 Link
						*/
						array(
							'name'     => ASTRA_THEME_SETTINGS . '[slide-'. $base .'-cta-1-link]',
							'default'  => astra_get_option( 'slide-'. $base .'-cta-1-link' ),
							'type'     => 'control',
							'control'  => 'text',
							'section'  => 'section-slide-'. $base .'-contents',
							'priority' => 40,
							'title'    => __( 'Button 1 Link', 'astra-slider' ),
						),

						/**
						 * Option: Button 2
						 */
						array(
							'name'     => ASTRA_THEME_SETTINGS . '[slide-'. $base .'-cta-2-text]',
							'default'  => astra_get_option( 'slide-'. $base .'-cta-2-text' ),
							'type'     => 'control',
							'section'  => 'section-slide-'. $base .'-contents',
							'priority' => 45,
							'title'    => __( 'Button 2 Text', 'astra-slider' ),
							'control'  => 'text',
						),

						/**
						* Option: Button 2 Link
						*/
						array(
							'name'     => ASTRA_THEME_SETTINGS . '[slide-'. $base .'-cta-2-link]',
							'default'  => astra_get_option( 'slide-'. $base .'-cta-2-link' ),
							'type'     => 'control',
							'control'  => 'text',
							'section'  => 'section-slide-'. $base .'-contents',
							'priority' => 50,
							'title'    => __( 'Button 2 Link', 'astra-slider' ),
						),

						/**
						 * Option: Slide Above Divider
						 */
						array(
							'name'            => ASTRA_THEME_SETTINGS . '[ast-slider-styling-slide-' . $base . '-divider]',
							'type'            => 'control',
							'control'         => 'ast-heading',
							'section'         => 'section-slide-'. $base .'-contents',
							'title'           => __( 'Background', 'astra-slider' ),
							'priority'        => 55,
						),

						/**
						 * Option: Slider BG Content Group
						 */
						array(
							'name'      => ASTRA_THEME_SETTINGS . '[ast-slide-' . $base . '-background-group]',
							'default'   => astra_get_option( 'ast-slide-' . $base . '-background-group' ),
							'type'      => 'control',
							'control'   => 'ast-settings-group',
							'title'     => __( 'Background', 'astra-slider' ),
							'section'   => 'section-slide-'. $base .'-contents',
							'transport' => 'postMessage',
							'priority'  => 60,
						),

						/**
						 * Option: Slider Background
						 */
						array(
							'name'     => 'ast-slide-' . $base . '-bg-obj',
							'type'     => 'sub-control',
							'priority' => 55,
							'parent'   => ASTRA_THEME_SETTINGS . '[ast-slide-' . $base . '-background-group]',
							'section'  => 'section-slide-'. $base .'-contents',
							'control'  => 'ast-background',
							'default'  => astra_get_option( 'ast-slide-' . $base . '-bg-obj' ),
							'label'    => __( 'Background', 'astra-slider' ),
						),
					);

					$configurations = array_merge( $configurations, ${"ast_slide_$base"} );
				}
			}

			$_configs = array(

				/**
				 * Option: Slider Dimension Section
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[ast-slider-container-padding-divider]',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'section'  => 'section-slide-carousel',
					'title'    => __( 'Slide Dimensions', 'astra-slider' ),
					'priority' => 5,
					'settings' => array(),
				),

				/**
				 * Option: Slider Size
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[slider-image-size-option]',
					'default'  => astra_get_option( 'slider-image-size-option' ),
					'type'     => 'control',
					'control'  => 'select',
					'section'  => 'section-slide-carousel',
					'priority' => 10,
					'title'    => __( 'Slide Size', 'astra-slider' ),
					'choices'  => array(
						'' 	          => __( 'Full Screen', 'astra-slider' ),
						'custom-size' => __( 'Custom Size', 'astra-slider' ),
					),
				),

				/**
				 * Option: Slider Padding
				 */
				array(
					'name'           => ASTRA_THEME_SETTINGS . '[ast-slider-container-padding]',
					'default'        => astra_get_option( 'ast-slider-container-padding' ),
					'type'           => 'control',
					'control'        => 'ast-responsive-spacing',
					'section'        => 'section-slide-carousel',
					'title'          => __( 'Padding for Banner Slides', 'astra-slider' ),
					'linked_choices' => true,
					'required' => array(
						ASTRA_THEME_SETTINGS . '[slider-image-size-option]',
						'!=',
						'',
					),
					'transport'      => 'postMessage',
					'unit_choices'   => array( 'px', 'em', '%' ),
					'choices'        => array(
						'top'    => __( 'Top', 'astra-slider' ),
						'right'  => __( 'Right', 'astra-slider' ),
						'bottom' => __( 'Bottom', 'astra-slider' ),
						'left'   => __( 'Left', 'astra-slider' ),
					),
					'priority'       => 15,
				),

				/**
				 * Option: Colors & Background Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[slider-on-top-color-divider]',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'section'  => 'section-slide-design',
					'priority' => 5,
					'title'    => __( 'Colors & Background', 'astra-slider' ),
					'settings' => array(),
				),

				/**
				 * Option: Content Colors Group
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[astra-slider-color-group]',
					'default'   => astra_get_option( 'astra-slider-color-group' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Content', 'astra-slider' ),
					'section'   => 'section-slide-design',
					'priority' 	=> 10,
					'transport' => 'postMessage',
				),

				/**
				 * Option: Prefix Color
				 */
				array(
					'name'      => 'slider-centent-prefix-color',
					'default'   => '',
					'type'      => 'sub-control',
					'priority'  => 1,
					'parent'    => ASTRA_THEME_SETTINGS . '[astra-slider-color-group]',
					'section'   => 'section-slide-design',
					'control'   => 'ast-color',
					'transport' => 'postMessage',
					'title'     => __( 'Prefix Color', 'astra-slider' ),
				),

				/**
				 * Option: Heading Color
				 */
				array(
					'name'      => 'slider-centent-heading-color',
					'default'   => '',
					'type'      => 'sub-control',
					'priority'  => 2,
					'parent'    => ASTRA_THEME_SETTINGS . '[astra-slider-color-group]',
					'section'   => 'section-slide-design',
					'transport' => 'postMessage',
					'control'   => 'ast-color',
					'title'     => __( 'Heading Color', 'astra-slider' ),
				),

				/**
				 * Option: Description Color
				 */
				array(
					'name'      => 'slider-centent-description-color',
					'default'   => '',
					'type'      => 'sub-control',
					'priority'  => 3,
					'parent'    => ASTRA_THEME_SETTINGS . '[astra-slider-color-group]',
					'section'   => 'section-slide-design',
					'transport' => 'postMessage',
					'control'   => 'ast-color',
					'title'     => __( 'Description Color', 'astra-slider' ),
				),

				/**
				 * Option: Button colors group
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[astra-slider-button-color-group]',
					'default'   => astra_get_option( 'astra-slider-button-color-group' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Buttons', 'astra-slider' ),
					'section'   => 'section-slide-design',
					'priority' 	=> 15,
					'transport' => 'postMessage',
				),

				/**
				 * Option: Text Color
				 */
				array(
					'name'      => 'slider-button-text-color',
					'default'   => '',
					'type'      => 'sub-control',
					'priority'  => 1,
					'parent'    => ASTRA_THEME_SETTINGS . '[astra-slider-button-color-group]',
					'section'   => 'section-slide-design',
					'tab'       => __( 'Normal', 'astra-slider' ),
					'control'   => 'ast-color',
					'transport' => 'postMessage',
					'title'     => __( 'Text Color', 'astra-slider' ),
				),

				/**
				 * Option: Background Color
				 */
				array(
					'name'      => 'slider-button-bg-color',
					'default'   => '',
					'type'      => 'sub-control',
					'priority'  => 1,
					'parent'    => ASTRA_THEME_SETTINGS . '[astra-slider-button-color-group]',
					'section'   => 'section-slide-design',
					'tab'       => __( 'Normal', 'astra-slider' ),
					'transport' => 'postMessage',
					'control'   => 'ast-color',
					'title'     => __( 'Background Color', 'astra-slider' ),
				),

				/**
				 * Option: Text Hover Color
				 */
				array(
					'name'      => 'slider-button-text-hover-color',
					'default'   => '',
					'type'      => 'sub-control',
					'priority'  => 1,
					'parent'    => ASTRA_THEME_SETTINGS . '[astra-slider-button-color-group]',
					'section'   => 'section-slide-design',
					'tab'       => __( 'Hover', 'astra-slider' ),
					'control'   => 'ast-color',
					'transport' => 'postMessage',
					'title'     => __( 'Text Color', 'astra-slider' ),
				),

				/**
				 * Option: Hover Background Color
				 */
				array(
					'name'      => 'slider-button-bg-hover-color',
					'default'   => '',
					'type'      => 'sub-control',
					'priority'  => 1,
					'parent'    => ASTRA_THEME_SETTINGS . '[astra-slider-button-color-group]',
					'section'   => 'section-slide-design',
					'tab'       => __( 'Hover', 'astra-slider' ),
					'control'   => 'ast-color',
					'transport' => 'postMessage',
					'title'     => __( 'Background Color', 'astra-slider' ),
				),

				/**
				 * Option: Slider Typography
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[slider-typography-styling-divider]',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'section'  => 'section-slide-design',
					'title'    => __( 'Typography', 'astra-slider' ),
					'priority' => 20,
					'settings' => array(),
				),

				/**
				 * Option: Heading Prefix Typography Title
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[slider-pre-heading-typography]',
					'default'   => astra_get_option( 'slider-pre-heading-typography' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Heading Prefix', 'astra-slider' ),
					'section'   => 'section-slide-design',
					'transport' => 'postMessage',
					'priority'  => 25,
				),

				/**
				 * Option: Prefix Font Family
				 */
				array(
					'name'      => 'slider-pre-heading-font-family',
					'type'      => 'sub-control',
					'parent'    => ASTRA_THEME_SETTINGS . '[slider-pre-heading-typography]',
					'section'   => 'section-slide-design',
					'control'   => 'ast-font',
					'font_type' => 'ast-font-family',
					'title'     => __( 'Family', 'astra-slider' ),
					'default'   => astra_get_option( 'slider-pre-heading-font-family' ),
					'connect'   => ASTRA_THEME_SETTINGS . '[slider-pre-heading-font-weight]',
					'priority'  => 1,
				),

				/**
				 * Option: Prefix Font Size
				 */
				array(
					'name'        => 'slider-pre-heading-font-size',
					'transport'   => 'postMessage',
					'title'       => __( 'Size', 'astra-slider' ),
					'type'        => 'sub-control',
					'parent'      => ASTRA_THEME_SETTINGS . '[slider-pre-heading-typography]',
					'section'     => 'section-slide-design',
					'control'     => 'ast-responsive',
					'default'     => astra_get_option( 'slider-pre-heading-font-size' ),
					'input_attrs' => array(
						'min' => 0,
					),
					'units'       => array(
						'px' => 'px',
						'em' => 'em',
					),
				),

				/**
				 * Option: Prefix Font Weight
				 */
				array(
					'name'              => 'slider-pre-heading-font-weight',
					'type'              => 'sub-control',
					'parent'            => ASTRA_THEME_SETTINGS . '[slider-pre-heading-typography]',
					'section'           => 'section-slide-design',
					'control'           => 'ast-font',
					'font_type'         => 'ast-font-weight',
					'title'             => __( 'Weight', 'astra-slider' ),
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
					'default'           => astra_get_option( 'slider-pre-heading-font-weight' ),
					'connect'           => 'slider-pre-heading-font-family',
					'priority'          => 2,
				),

				/**
				 * Option: Prefix Text Transform
				 */
				array(
					'name'      => 'slider-pre-heading-text-transform',
					'transport' => 'postMessage',
					'default'   => astra_get_option( 'slider-pre-heading-text-transform' ),
					'title'     => __( 'Text Transform', 'astra-slider' ),
					'type'      => 'sub-control',
					'parent'    => ASTRA_THEME_SETTINGS . '[slider-pre-heading-typography]',
					'section'   => 'section-slide-design',
					'control'   => 'ast-select',
					'priority'  => 3,
					'choices'   => array(
						''           => __( 'Inherit', 'astra-slider' ),
						'none'       => __( 'None', 'astra-slider' ),
						'capitalize' => __( 'Capitalize', 'astra-slider' ),
						'uppercase'  => __( 'Uppercase', 'astra-slider' ),
						'lowercase'  => __( 'Lowercase', 'astra-slider' ),
					),
				),

				/**
				 * Option: Prefix Line Height
				 */
				array(
					'name'              => 'slider-pre-heading-line-height',
					'control'           => 'ast-slider',
					'transport'         => 'postMessage',
					'type'              => 'sub-control',
					'default'           => astra_get_option( 'slider-pre-heading-line-height' ),
					'parent'            => ASTRA_THEME_SETTINGS . '[slider-pre-heading-typography]',
					'section'           => 'section-slide-design',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'title'             => __( 'Line Height', 'astra-slider' ),
					'suffix'            => '',
					'priority'          => 4,
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 0.01,
						'max'  => 5,
					),
				),

				/**
				 * Option: Prefix Letter Spacing
				 */
				array(
					'name'              => 'slider-pre-heading-letter-spacing',
					'control'           => 'ast-slider',
					'transport'         => 'postMessage',
					'type'              => 'sub-control',
					'default'           => '',
					'parent'            => ASTRA_THEME_SETTINGS . '[slider-pre-heading-typography]',
					'section'           => 'section-slide-design',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'title'             => __( 'Letter Spacing', 'astra-slider' ),
					'suffix'            => '',
					'priority'          => 5,
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 1,
						'max'  => 100,
					),
				),

				/**
				 * Option: Heading Typography Title
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[slider-heading-typography]',
					'default'   => astra_get_option( 'slider-heading-typography' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Heading', 'astra-slider' ),
					'section'   => 'section-slide-design',
					'transport' => 'postMessage',
					'priority'  => 30,
				),

				/**
				 * Option: Heading Font Family
				 */
				array(
					'name'      => 'slider-heading-font-family',
					'type'      => 'sub-control',
					'parent'    => ASTRA_THEME_SETTINGS . '[slider-heading-typography]',
					'section'   => 'section-slide-design',
					'control'   => 'ast-font',
					'font_type' => 'ast-font-family',
					'title'     => __( 'Family', 'astra-slider' ),
					'default'   => astra_get_option( 'slider-heading-font-family' ),
					'connect'   => ASTRA_THEME_SETTINGS . '[slider-heading-font-weight]',
					'priority'  => 1,
				),

				/**
				 * Option: Heading Font Size
				 */
				array(
					'name'        => 'slider-heading-font-size',
					'transport'   => 'postMessage',
					'title'       => __( 'Size', 'astra-slider' ),
					'type'        => 'sub-control',
					'parent'      => ASTRA_THEME_SETTINGS . '[slider-heading-typography]',
					'section'     => 'section-slide-design',
					'control'     => 'ast-responsive',
					'default'     => astra_get_option( 'slider-heading-font-size' ),
					'input_attrs' => array(
						'min' => 0,
					),
					'units'       => array(
						'px' => 'px',
						'em' => 'em',
					),
				),

				/**
				 * Option: Heading Font Weight
				 */
				array(
					'name'              => 'slider-heading-font-weight',
					'type'              => 'sub-control',
					'parent'            => ASTRA_THEME_SETTINGS . '[slider-heading-typography]',
					'section'           => 'section-slide-design',
					'control'           => 'ast-font',
					'font_type'         => 'ast-font-weight',
					'title'             => __( 'Weight', 'astra-slider' ),
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
					'default'           => astra_get_option( 'slider-heading-font-weight' ),
					'connect'           => 'slider-heading-font-family',
					'priority'          => 2,
				),

				/**
				 * Option: Heading Text Transform
				 */
				array(
					'name'      => 'slider-heading-text-transform',
					'transport' => 'postMessage',
					'default'   => astra_get_option( 'slider-heading-text-transform' ),
					'title'     => __( 'Text Transform', 'astra-slider' ),
					'type'      => 'sub-control',
					'parent'    => ASTRA_THEME_SETTINGS . '[slider-heading-typography]',
					'section'   => 'section-slide-design',
					'control'   => 'ast-select',
					'priority'  => 3,
					'choices'   => array(
						''           => __( 'Inherit', 'astra-slider' ),
						'none'       => __( 'None', 'astra-slider' ),
						'capitalize' => __( 'Capitalize', 'astra-slider' ),
						'uppercase'  => __( 'Uppercase', 'astra-slider' ),
						'lowercase'  => __( 'Lowercase', 'astra-slider' ),
					),
				),

				/**
				 * Option: Heading Line Height
				 */
				array(
					'name'              => 'slider-heading-line-height',
					'control'           => 'ast-slider',
					'transport'         => 'postMessage',
					'type'              => 'sub-control',
					'default'           => astra_get_option( 'slider-heading-line-height' ),
					'parent'            => ASTRA_THEME_SETTINGS . '[slider-heading-typography]',
					'section'           => 'section-slide-design',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'title'             => __( 'Line Height', 'astra-slider' ),
					'suffix'            => '',
					'priority'          => 4,
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 0.01,
						'max'  => 5,
					),
				),

				/**
				 * Option: Heading Letter Spacing
				 */
				array(
					'name'              => 'slider-heading-letter-spacing',
					'control'           => 'ast-slider',
					'transport'         => 'postMessage',
					'type'              => 'sub-control',
					'default'           => '',
					'parent'            => ASTRA_THEME_SETTINGS . '[slider-heading-typography]',
					'section'           => 'section-slide-design',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'title'             => __( 'Letter Spacing', 'astra-slider' ),
					'suffix'            => '',
					'priority'          => 5,
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 1,
						'max'  => 100,
					),
				),

				/**
				 * Option: Description Typography Title
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[slider-description-typography]',
					'default'   => astra_get_option( 'slider-description-typography' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Description', 'astra-slider' ),
					'section'   => 'section-slide-design',
					'transport' => 'postMessage',
					'priority'  => 35,
				),

				/**
				 * Option: Description Font Family
				 */
				array(
					'name'      => 'slider-description-font-family',
					'type'      => 'sub-control',
					'parent'    => ASTRA_THEME_SETTINGS . '[slider-description-typography]',
					'section'   => 'section-slide-design',
					'control'   => 'ast-font',
					'font_type' => 'ast-font-family',
					'title'     => __( 'Family', 'astra-slider' ),
					'default'   => astra_get_option( 'slider-description-font-family' ),
					'connect'   => ASTRA_THEME_SETTINGS . '[slider-description-font-weight]',
					'priority'  => 1,
				),

				/**
				 * Option: Description Font Size
				 */
				array(
					'name'        => 'slider-description-font-size',
					'transport'   => 'postMessage',
					'title'       => __( 'Size', 'astra-slider' ),
					'type'        => 'sub-control',
					'parent'      => ASTRA_THEME_SETTINGS . '[slider-description-typography]',
					'section'     => 'section-slide-design',
					'control'     => 'ast-responsive',
					'default'     => astra_get_option( 'slider-description-font-size' ),
					'input_attrs' => array(
						'min' => 0,
					),
					'units'       => array(
						'px' => 'px',
						'em' => 'em',
					),
				),

				/**
				 * Option: Description Font Weight
				 */
				array(
					'name'              => 'slider-description-font-weight',
					'type'              => 'sub-control',
					'parent'            => ASTRA_THEME_SETTINGS . '[slider-description-typography]',
					'section'           => 'section-slide-design',
					'control'           => 'ast-font',
					'font_type'         => 'ast-font-weight',
					'title'             => __( 'Weight', 'astra-slider' ),
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
					'default'           => astra_get_option( 'slider-description-font-weight' ),
					'connect'           => 'slider-description-font-family',
					'priority'          => 2,
				),

				/**
				 * Option: Description Text Transform
				 */
				array(
					'name'      => 'slider-description-text-transform',
					'transport' => 'postMessage',
					'default'   => astra_get_option( 'slider-description-text-transform' ),
					'title'     => __( 'Text Transform', 'astra-slider' ),
					'type'      => 'sub-control',
					'parent'    => ASTRA_THEME_SETTINGS . '[slider-description-typography]',
					'section'   => 'section-slide-design',
					'control'   => 'ast-select',
					'priority'  => 3,
					'choices'   => array(
						''           => __( 'Inherit', 'astra-slider' ),
						'none'       => __( 'None', 'astra-slider' ),
						'capitalize' => __( 'Capitalize', 'astra-slider' ),
						'uppercase'  => __( 'Uppercase', 'astra-slider' ),
						'lowercase'  => __( 'Lowercase', 'astra-slider' ),
					),
				),

				/**
				 * Option: Description Line Height
				 */
				array(
					'name'              => 'slider-description-line-height',
					'control'           => 'ast-slider',
					'transport'         => 'postMessage',
					'type'              => 'sub-control',
					'default'           => astra_get_option( 'slider-description-line-height' ),
					'parent'            => ASTRA_THEME_SETTINGS . '[slider-description-typography]',
					'section'           => 'section-slide-design',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'title'             => __( 'Line Height', 'astra-slider' ),
					'suffix'            => '',
					'priority'          => 4,
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 0.01,
						'max'  => 5,
					),
				),

				/**
				 * Option: Description Letter Spacing
				 */
				array(
					'name'              => 'slider-description-letter-spacing',
					'control'           => 'ast-slider',
					'transport'         => 'postMessage',
					'type'              => 'sub-control',
					'default'           => '',
					'parent'            => ASTRA_THEME_SETTINGS . '[slider-description-typography]',
					'section'           => 'section-slide-design',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'title'             => __( 'Letter Spacing', 'astra-slider' ),
					'suffix'            => '',
					'priority'          => 5,
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 1,
						'max'  => 100,
					),
				),

				/**
				 * Option: Button Typography
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[slider-buttons-typography]',
					'default'   => astra_get_option( 'slider-buttons-typography' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Buttons', 'astra-slider' ),
					'section'   => 'section-slide-design',
					'transport' => 'postMessage',
					'priority'  => 40,
				),

				/**
				 * Option: Button Font Family
				 */
				array(
					'name'      => 'slider-buttons-font-family',
					'type'      => 'sub-control',
					'parent'    => ASTRA_THEME_SETTINGS . '[slider-buttons-typography]',
					'section'   => 'section-slide-design',
					'control'   => 'ast-font',
					'font_type' => 'ast-font-family',
					'title'     => __( 'Family', 'astra-slider' ),
					'default'   => astra_get_option( 'slider-buttons-font-family' ),
					'connect'   => ASTRA_THEME_SETTINGS . '[slider-buttons-font-weight]',
					'priority'  => 1,
				),

				/**
				 * Option: Button Font Size
				 */
				array(
					'name'        => 'slider-description-font-size',
					'transport'   => 'postMessage',
					'title'       => __( 'Size', 'astra-slider' ),
					'type'        => 'sub-control',
					'parent'      => ASTRA_THEME_SETTINGS . '[slider-buttons-typography]',
					'section'     => 'section-slide-design',
					'control'     => 'ast-responsive',
					'default'     => astra_get_option( 'slider-description-font-size' ),
					'input_attrs' => array(
						'min' => 0,
					),
					'units'       => array(
						'px' => 'px',
						'em' => 'em',
					),
				),

				/**
				 * Option: Button Font Weight
				 */
				array(
					'name'              => 'slider-buttons-font-weight',
					'type'              => 'sub-control',
					'parent'            => ASTRA_THEME_SETTINGS . '[slider-buttons-typography]',
					'section'           => 'section-slide-design',
					'control'           => 'ast-font',
					'font_type'         => 'ast-font-weight',
					'title'             => __( 'Weight', 'astra-slider' ),
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
					'default'           => astra_get_option( 'slider-buttons-font-weight' ),
					'connect'           => 'slider-buttons-font-family',
					'priority'          => 2,
				),

				/**
				 * Option: Button Text Transform
				 */
				array(
					'name'      => 'slider-buttons-text-transform',
					'transport' => 'postMessage',
					'default'   => astra_get_option( 'slider-buttons-text-transform' ),
					'title'     => __( 'Text Transform', 'astra-slider' ),
					'type'      => 'sub-control',
					'parent'    => ASTRA_THEME_SETTINGS . '[slider-buttons-typography]',
					'section'   => 'section-slide-design',
					'control'   => 'ast-select',
					'priority'  => 3,
					'choices'   => array(
						''           => __( 'Inherit', 'astra-slider' ),
						'none'       => __( 'None', 'astra-slider' ),
						'capitalize' => __( 'Capitalize', 'astra-slider' ),
						'uppercase'  => __( 'Uppercase', 'astra-slider' ),
						'lowercase'  => __( 'Lowercase', 'astra-slider' ),
					),
				),

				/**
				 * Option: Button Line Height
				 */
				array(
					'name'              => 'slider-buttons-line-height',
					'control'           => 'ast-slider',
					'transport'         => 'postMessage',
					'type'              => 'sub-control',
					'default'           => astra_get_option( 'slider-buttons-line-height' ),
					'parent'            => ASTRA_THEME_SETTINGS . '[slider-buttons-typography]',
					'section'           => 'section-slide-design',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'title'             => __( 'Line Height', 'astra-slider' ),
					'suffix'            => '',
					'priority'          => 4,
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 0.01,
						'max'  => 5,
					),
				),

				/**
				 * Option: Button Letter Spacing
				 */
				array(
					'name'              => 'slider-buttons-letter-spacing',
					'control'           => 'ast-slider',
					'transport'         => 'postMessage',
					'type'              => 'sub-control',
					'default'           => '',
					'parent'            => ASTRA_THEME_SETTINGS . '[slider-buttons-typography]',
					'section'           => 'section-slide-design',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'title'             => __( 'Letter Spacing', 'astra-slider' ),
					'suffix'            => '',
					'priority'          => 5,
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 1,
						'max'  => 100,
					),
				),

				/**
				 * Option: Scroll On Top Colors Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[slider-btn-style-divider]',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'section'  => 'section-slide-design',
					'priority' => 45,
					'title'    => __( 'CTA Border & Spacing', 'astra-slider' ),
					'settings' => array(),
				),

				/**
				 * Group: Slider Button Border Group
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[ast-slider-button-border-group]',
					'default'   => astra_get_option( 'ast-slider-button-border-group' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Border', 'astra-slider' ),
					'section'   => 'section-slide-design',
					'transport' => 'postMessage',
					'priority'  => 50,
				),

				/**
				 * Option: Global Button Border Size
				 */
				array(
					'type'           => 'sub-control',
					'parent'         => ASTRA_THEME_SETTINGS . '[ast-slider-button-border-group]',
					'section'        => 'section-slide-design',
					'control'        => 'ast-border',
					'name'           => 'ast-slider-button-border-size',
					'transport'      => 'postMessage',
					'linked_choices' => true,
					'priority'       => 1,
					'default'        => astra_get_option( 'ast-slider-button-border-size' ),
					'title'          => __( 'Width', 'astra-slider' ),
					'choices'        => array(
						'top'    => __( 'Top', 'astra-slider' ),
						'right'  => __( 'Right', 'astra-slider' ),
						'bottom' => __( 'Bottom', 'astra-slider' ),
						'left'   => __( 'Left', 'astra-slider' ),
					),
				),

				/**
				 * Option: Global Button Border Color
				 */
				array(
					'name'      => 'ast-slider-button-border-color',
					'default'   => astra_get_option( 'ast-slider-button-border-color' ),
					'transport' => 'postMessage',
					'type'      => 'sub-control',
					'parent'    => ASTRA_THEME_SETTINGS . '[ast-slider-button-border-group]',
					'section'   => 'section-slide-design',
					'control'   => 'ast-color',
					'priority'  => 2,
					'title'     => __( 'Color', 'astra-slider' ),
				),

				/**
				 * Option: Global Button Border Hover Color
				 */
				array(
					'name'      => 'ast-slider-button-border-hover-color',
					'default'   => astra_get_option( 'ast-slider-button-border-hover-color' ),
					'transport' => 'postMessage',
					'type'      => 'sub-control',
					'parent'    => ASTRA_THEME_SETTINGS . '[ast-slider-button-border-group]',
					'section'   => 'section-slide-design',
					'control'   => 'ast-color',
					'priority'  => 3,
					'title'     => __( 'Hover Color', 'astra-slider' ),
				),

				/**
				 * Option: Global Button Radius
				 */
				array(
					'name'        => 'ast-slider-button-border-radius',
					'default'     => astra_get_option( 'ast-slider-button-border-radius' ),
					'type'        => 'sub-control',
					'parent'      => ASTRA_THEME_SETTINGS . '[ast-slider-button-border-group]',
					'section'     => 'section-slide-design',
					'control'     => 'ast-slider',
					'title'       => __( 'Border Radius', 'astra-slider' ),
					'input_attrs' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 200,
					),
				),

				/**
				 * Option: Slider Button Padding
				 */
				array(
					'name'           => ASTRA_THEME_SETTINGS . '[ast-slider-button-padding]',
					'default'        => astra_get_option( 'ast-slider-button-padding' ),
					'type'           => 'control',
					'control'        => 'ast-responsive-spacing',
					'section'        => 'section-slide-design',
					'title'          => __( 'Padding', 'astra-slider' ),
					'linked_choices' => true,
					'transport'      => 'postMessage',
					'priority'       => 55,
					'unit_choices'   => array( 'px', 'em', '%' ),
					'choices'        => array(
						'top'    => __( 'Top', 'astra-slider' ),
						'right'  => __( 'Right', 'astra-slider' ),
						'bottom' => __( 'Bottom', 'astra-slider' ),
						'left'   => __( 'Left', 'astra-slider' ),
					),
				),

				/**
				 * Option: Slider Button Top Spacing
				 */
				array(
					'name'              => ASTRA_THEME_SETTINGS . '[ast-slider-button-top-spacing]',
					'default'           => '',
					'type'              => 'control',
					'control'           => 'ast-slider',
					'section'           => 'section-slide-design',
					'priority'          => 60,
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'title'             => __( 'Buttons Top Spacing', 'astra-slider' ),
					'suffix'            => '',
					'input_attrs'       => array(
						'min'  => 0,
						'step' => 10,
						'max'  => 500,
					),
				),
			);

			$configurations = array_merge( $configurations, $_configs );

			return $configurations;
		}
	}
}
	
new Astra_Slide_Configs;
