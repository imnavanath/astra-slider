<?php

/**
 * Banner Widgets - Dynamic CSS
 *
 * @package Home Page Banner for Astra Theme
 * @since 1.0.0
 */

add_action( 'wp_enqueue_scripts', 'astra_slider_dynamic_css' );

/**
 * Dynamic CSS
 *
 * @param  string $dynamic_css          Astra Dynamic CSS.
 * @param  string $dynamic_css_filtered Astra Dynamic CSS Filters.
 * @return string
 */
function astra_slider_dynamic_css() {

	$ast_slider_css_output = '';

	$banner_image					= 		astra_get_option( 'astra-slider-banner-1-image' );

	// Slider configs.
	$background_size				= 		astra_get_option( 'slider-image-size-option' );
	$custom_background_top_p    	= 		astra_get_option( 'banner-custom-top-padding' );
	$custom_background_bottom_p 	= 		astra_get_option( 'banner-custom-bottom-padding' );
	$slider_container_padding    	= 		astra_get_option( 'ast-slider-container-padding' );

	// Typo & color styles for heading-prefix.
	$ast_slide_prefix_color   			= 		astra_get_option( 'slider-centent-prefix-color' );
	$ast_slide_prefix_font_family    	= 		astra_get_option( 'slider-pre-heading-font-family' );
	$ast_slide_prefix_font_weight    	= 		astra_get_option( 'slider-pre-heading-font-weight' );
	$ast_slide_prefix_font_size      	= 		astra_get_option( 'slider-pre-heading-font-size' );
	$ast_slide_prefix_line_height    	= 		astra_get_option( 'slider-pre-heading-line-height' );
	$ast_slide_prefix_text_transform 	= 		astra_get_option( 'slider-pre-heading-text-transform' );
	$ast_slide_prefix_letter_spacing 	= 		astra_get_option( 'slider-pre-heading-letter-spacing' );

	// Typo & color styles for heading.
	$ast_slide_heading_color   			= 		astra_get_option( 'slider-centent-heading-color' );
	$ast_slide_heading_font_family    	= 		astra_get_option( 'slider-heading-font-family' );
	$ast_slide_heading_font_weight    	= 		astra_get_option( 'slider-heading-font-weight' );
	$ast_slide_heading_font_size      	= 		astra_get_option( 'slider-heading-font-size' );
	$ast_slide_heading_line_height    	= 		astra_get_option( 'slider-heading-line-height' );
	$ast_slide_heading_text_transform 	= 		astra_get_option( 'slider-heading-text-transform' );
	$ast_slide_heading_letter_spacing 	= 		astra_get_option( 'slider-heading-letter-spacing' );

	// Typo & color styles for description.
	$ast_slide_descr_color   			= 		astra_get_option( 'slider-centent-description-color' );
	$ast_slide_descr_font_family    	= 		astra_get_option( 'slider-description-font-family' );
	$ast_slide_descr_font_weight    	= 		astra_get_option( 'slider-description-font-weight' );
	$ast_slide_descr_font_size      	= 		astra_get_option( 'slider-description-font-size' );
	$ast_slide_descr_line_height    	= 		astra_get_option( 'slider-description-line-height' );
	$ast_slide_descr_text_transform 	= 		astra_get_option( 'slider-description-text-transform' );
	$ast_slide_descr_letter_spacing 	= 		astra_get_option( 'slider-description-letter-spacing' );

	$slider_desktop_css = array(

		// Slider Content CSS.
		'.home-page-ast-slider .ast-single-slide .banner-pre-heading' => array(
			'color' 			=> 		esc_attr( $ast_slide_prefix_color ),
			'font-family'    	=> 		astra_get_font_family( $ast_slide_prefix_font_family ),
			'font-weight'    	=> 		esc_attr( $ast_slide_prefix_font_weight ),
			'font-size'      	=> 		astra_responsive_font( $ast_slide_prefix_font_size, 'desktop' ),
			'line-height'    	=> 		esc_attr( $ast_slide_prefix_line_height ),
			'text-transform' 	=> 		esc_attr( $ast_slide_prefix_text_transform ),
			'letter-spacing' 	=> 		astra_get_css_value( $ast_slide_prefix_letter_spacing, 'px' ),
		),
		'.home-page-ast-slider .ast-single-slide .banner-heading' => array(
			'color' => esc_attr( $ast_slide_heading_color ),
			'font-family'    	=> 		astra_get_font_family( $ast_slide_heading_font_family ),
			'font-weight'    	=> 		esc_attr( $ast_slide_heading_font_weight ),
			'font-size'      	=> 		astra_responsive_font( $ast_slide_heading_font_size, 'desktop' ),
			'line-height'    	=> 		esc_attr( $ast_slide_heading_line_height ),
			'text-transform' 	=> 		esc_attr( $ast_slide_heading_text_transform ),
			'letter-spacing' 	=> 		astra_get_css_value( $ast_slide_heading_letter_spacing, 'px' ),
		),
		'.home-page-ast-slider .ast-single-slide .banner-subheading' => array(
			'color' => esc_attr( $ast_slide_descr_color ),
			'font-family'    	=> 		astra_get_font_family( $ast_slide_descr_font_family ),
			'font-weight'    	=> 		esc_attr( $ast_slide_descr_font_weight ),
			'font-size'      	=> 		astra_responsive_font( $ast_slide_descr_font_size, 'desktop' ),
			'line-height'    	=> 		esc_attr( $ast_slide_descr_line_height ),
			'text-transform' 	=> 		esc_attr( $ast_slide_descr_text_transform ),
			'letter-spacing' 	=> 		astra_get_css_value( $ast_slide_descr_letter_spacing, 'px' ),
		),
	);

	$ast_hompage_slide_count = apply_filters( 'ast_hompage_slide_count', 3 );

	if( $ast_hompage_slide_count ) {

		for( $base = 1; $base <= $ast_hompage_slide_count; $base++ ) {

			// Slide Background Options.
			${"ast_slide_bg_styles_$base"}      = 		astra_get_option( 'ast-slide-' . $base . '-bg-obj' );

			$slider_banner_css = array(
				'.home-page-ast-slider' => astra_get_background_obj( ${"ast_slide_bg_styles_$base"} ),
			);

			$slider_desktop_css = array_merge( $slider_desktop_css, $slider_banner_css );
		}
	}

	if ( 'custom-size' == $background_size ) {
		$slider_banner_css = array(
			'.home-page-ast-slider .ast-single-slide' => array(
				'padding-top'         => 		astra_responsive_spacing( $slider_container_padding, 'top', 'desktop' ),
				'padding-right'       => 		astra_responsive_spacing( $slider_container_padding, 'right', 'desktop' ),
				'padding-bottom'      => 		astra_responsive_spacing( $slider_container_padding, 'bottom', 'desktop' ),
				'padding-left'        => 		astra_responsive_spacing( $slider_container_padding, 'left', 'desktop' ),
			),
		);

		$slider_desktop_css = array_merge( $slider_desktop_css, $slider_banner_css );
	}

	/* Parse CSS from array() */
	$ast_slider_css_output = astra_parse_css( $slider_desktop_css );

	if ( 'custom-size' == $background_size ) {

		$slider_tablet_css = array(
			'.home-page-ast-slider .ast-single-slide' => array(
				'padding-top'   	=> 			astra_responsive_spacing( $slider_container_padding, 'top', 'tablet' ),
				'padding-right'  	=> 			astra_responsive_spacing( $slider_container_padding, 'right', 'tablet' ),
				'padding-bottom' 	=> 			astra_responsive_spacing( $slider_container_padding, 'bottom', 'tablet' ),
				'padding-left'   	=> 			astra_responsive_spacing( $slider_container_padding, 'left', 'tablet' ),
			),
			'.home-page-ast-slider .ast-single-slide .banner-pre-heading' => array(
				'font-size'      	=> 			astra_responsive_font( $ast_slide_prefix_font_size, 'tablet' ),
			),
			'.home-page-ast-slider .ast-single-slide .banner-heading' => array(
				'font-size'      	=> 			astra_responsive_font( $ast_slide_heading_font_size, 'tablet' ),
			),
			'.home-page-ast-slider .ast-single-slide .banner-subheading' => array(
				'font-size'      	=> 			astra_responsive_font( $ast_slide_descr_font_size, 'tablet' ),
			),
		);

		/* Parse CSS from array() */
		$ast_slider_css_output .= astra_parse_css( $slider_tablet_css, '', '768' );

		$slider_mobile_css = array(
			'.home-page-ast-slider .ast-single-slide' => array(
				'padding-top'    	=> 			astra_responsive_spacing( $slider_container_padding, 'top', 'mobile' ),
				'padding-right'  	=> 			astra_responsive_spacing( $slider_container_padding, 'right', 'mobile' ),
				'padding-bottom' 	=> 			astra_responsive_spacing( $slider_container_padding, 'bottom', 'mobile' ),
				'padding-left'   	=> 			astra_responsive_spacing( $slider_container_padding, 'left', 'mobile' ),
			),
			'.home-page-ast-slider .ast-single-slide .banner-pre-heading' => array(
				'font-size'      	=> 			astra_responsive_font( $ast_slide_prefix_font_size, 'mobile' ),
			),
			'.home-page-ast-slider .ast-single-slide .banner-heading' => array(
				'font-size'      	=> 			astra_responsive_font( $ast_slide_heading_font_size, 'mobile' ),
			),
			'.home-page-ast-slider .ast-single-slide .banner-subheading' => array(
				'font-size'      	=> 			astra_responsive_font( $ast_slide_descr_font_size, 'mobile' ),
			),
		);

		/* Parse CSS from array() */
		$ast_slider_css_output .= astra_parse_css( $slider_mobile_css, '', '544' );
	}

	wp_add_inline_style( 'astra-theme-css', $ast_slider_css_output );
}
