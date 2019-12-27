<?php
/**
 * Home Page Banner options for Astra.
 *
 * @package Home Page Banner for Astra Theme
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ast_hompage_slide_count = apply_filters( 'ast_hompage_slide_count', 3 );

if( $ast_hompage_slide_count ) {

	for( $base = 1; $base <= $ast_hompage_slide_count; $base++ ) {

		/**
		 * Option: Retina logo selector
		 */
		$wp_customize->add_setting(
			ASTRA_THEME_SETTINGS . '[astra-slider-banner-'. $base .'-image]', array(
				'default'           => astra_get_option( 'astra-slider-banner-'. $base .'-image' ),
				'type'              => 'option',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize, ASTRA_THEME_SETTINGS . '[astra-slider-banner-'. $base .'-image]', array(
					'section'        => 'section-astra-slider-'. $base .'-contents',
					'priority'       => 5,
					'label'          => __( 'Banner Image', 'astra-slider' ),
					'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
				)
			)
		);

		/**
		 * Option: Add Heading
		 */
		$wp_customize->add_setting(
			ASTRA_THEME_SETTINGS . '[astra-slider-banner-'. $base .'-heading]', array(
				'default'           => astra_get_option( 'astra-slider-banner-'. $base .'-heading' ),
				'type'              => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			ASTRA_THEME_SETTINGS . '[astra-slider-banner-'. $base .'-heading]', array(
				'type'     => 'text',
				'section'  => 'section-astra-slider-'. $base .'-contents',
				'label'    => __( 'Banner Heading', 'astra-slider' ),
				'priority' => 6,
			)
		);

		/**
		 * Option: Add Sub Heading
		 */
		$wp_customize->add_setting(
			ASTRA_THEME_SETTINGS . '[astra-slider-banner-'. $base .'-subheading]', array(
				'default'           => astra_get_option( 'astra-slider-banner-'. $base .'-subheading' ),
				'type'              => 'option',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			ASTRA_THEME_SETTINGS . '[astra-slider-banner-'. $base .'-subheading]', array(
				'type'     => 'text',
				'section'  => 'section-astra-slider-'. $base .'-contents',
				'label'    => __( 'Banner Subheading', 'astra-slider' ),
				'priority' => 6,
			)
		);
	}
}
