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

	// Slider configs.
	$background_size				= 		astra_get_option( 'slider-image-size-option' );
	$custom_background_top_p    	= 		astra_get_option( 'banner-custom-top-padding' );
	$custom_background_bottom_p 	= 		astra_get_option( 'banner-custom-bottom-padding' );
	$slider_container_padding    	= 		astra_get_option( 'ast-slider-container-padding' );

	// Typo & color styles for Prefix.
	$ast_slide_prefix_color   			= 		astra_get_option( 'slider-centent-prefix-color' );
	$ast_slide_prefix_font_family    	= 		astra_get_option( 'slider-pre-heading-font-family' );
	$ast_slide_prefix_font_weight    	= 		astra_get_option( 'slider-pre-heading-font-weight' );
	$ast_slide_prefix_font_size      	= 		astra_get_option( 'slider-pre-heading-font-size' );
	$ast_slide_prefix_line_height    	= 		astra_get_option( 'slider-pre-heading-line-height' );
	$ast_slide_prefix_text_transform 	= 		astra_get_option( 'slider-pre-heading-text-transform' );
	$ast_slide_prefix_letter_spacing 	= 		astra_get_option( 'slider-pre-heading-letter-spacing' );

	// Typo & color styles for Heading.
	$ast_slide_heading_color   			= 		astra_get_option( 'slider-centent-heading-color' );
	$ast_slide_heading_font_family    	= 		astra_get_option( 'slider-heading-font-family' );
	$ast_slide_heading_font_weight    	= 		astra_get_option( 'slider-heading-font-weight' );
	$ast_slide_heading_font_size      	= 		astra_get_option( 'slider-heading-font-size' );
	$ast_slide_heading_line_height    	= 		astra_get_option( 'slider-heading-line-height' );
	$ast_slide_heading_text_transform 	= 		astra_get_option( 'slider-heading-text-transform' );
	$ast_slide_heading_letter_spacing 	= 		astra_get_option( 'slider-heading-letter-spacing' );

	// Typo & color styles for Description.
	$ast_slide_descr_color   			= 		astra_get_option( 'slider-centent-description-color' );
	$ast_slide_descr_font_family    	= 		astra_get_option( 'slider-description-font-family' );
	$ast_slide_descr_font_weight    	= 		astra_get_option( 'slider-description-font-weight' );
	$ast_slide_descr_font_size      	= 		astra_get_option( 'slider-description-font-size' );
	$ast_slide_descr_line_height    	= 		astra_get_option( 'slider-description-line-height' );
	$ast_slide_descr_text_transform 	= 		astra_get_option( 'slider-description-text-transform' );
	$ast_slide_descr_letter_spacing 	= 		astra_get_option( 'slider-description-letter-spacing' );

	// Typo & color styles for Buttons.
	$ast_slide_btn_txt_color   			= 		astra_get_option( 'slider-button-text-color' );
	$ast_slide_btn_txt_hover_color   	= 		astra_get_option( 'slider-button-text-hover-color' );
	$ast_slide_btn_bg_color   			= 		astra_get_option( 'slider-button-bg-color' );
	$ast_slide_btn_bg_hover_color   	= 		astra_get_option( 'slider-button-bg-hover-color' );

	$ast_slide_btn_font_family    		= 		astra_get_option( 'slider-buttons-font-family' );
	$ast_slide_btn_font_weight    		= 		astra_get_option( 'slider-buttons-font-weight' );
	$ast_slide_btn_font_size      		= 		astra_get_option( 'slider-description-font-size' );
	$ast_slide_btn_line_height    		= 		astra_get_option( 'slider-buttons-line-height' );
	$ast_slide_btn_text_transform 		= 		astra_get_option( 'slider-buttons-text-transform' );
	$ast_slide_btn_letter_spacing 		= 		astra_get_option( 'slider-buttons-letter-spacing' );

	$ast_slide_button_border_size 		= 		astra_get_option( 'ast-slider-button-border-size' );
	$ast_slide_button_border_radius		= 		astra_get_option( 'ast-slider-button-border-radius' );
	$ast_slide_button_border_color      = 		astra_get_option( 'ast-slider-button-border-color' );
	$ast_slide_button_border_h_color    = 		astra_get_option( 'ast-slider-button-border-hover-color' );

	$theme_btn_padding     = astra_get_option( 'theme-button-padding' );

	$slider_desktop_css = array(

		// Slider Content CSS.
		'.ast-single-slide .banner-pre-heading' => array(
			'color' 			=> 		esc_attr( $ast_slide_prefix_color ),
			'font-family'    	=> 		astra_get_font_family( $ast_slide_prefix_font_family ),
			'font-weight'    	=> 		esc_attr( $ast_slide_prefix_font_weight ),
			'font-size'      	=> 		astra_responsive_font( $ast_slide_prefix_font_size, 'desktop' ),
			'line-height'    	=> 		esc_attr( $ast_slide_prefix_line_height ),
			'text-transform' 	=> 		esc_attr( $ast_slide_prefix_text_transform ),
			'letter-spacing' 	=> 		astra_get_css_value( $ast_slide_prefix_letter_spacing, 'px' ),
		),
		'.ast-single-slide .banner-heading' => array(
			'color' => esc_attr( $ast_slide_heading_color ),
			'font-family'    	=> 		astra_get_font_family( $ast_slide_heading_font_family ),
			'font-weight'    	=> 		esc_attr( $ast_slide_heading_font_weight ),
			'font-size'      	=> 		astra_responsive_font( $ast_slide_heading_font_size, 'desktop' ),
			'line-height'    	=> 		esc_attr( $ast_slide_heading_line_height ),
			'text-transform' 	=> 		esc_attr( $ast_slide_heading_text_transform ),
			'letter-spacing' 	=> 		astra_get_css_value( $ast_slide_heading_letter_spacing, 'px' ),
		),
		'.ast-single-slide .banner-subheading' => array(
			'color' => esc_attr( $ast_slide_descr_color ),
			'font-family'    	=> 		astra_get_font_family( $ast_slide_descr_font_family ),
			'font-weight'    	=> 		esc_attr( $ast_slide_descr_font_weight ),
			'font-size'      	=> 		astra_responsive_font( $ast_slide_descr_font_size, 'desktop' ),
			'line-height'    	=> 		esc_attr( $ast_slide_descr_line_height ),
			'text-transform' 	=> 		esc_attr( $ast_slide_descr_text_transform ),
			'letter-spacing' 	=> 		astra_get_css_value( $ast_slide_descr_letter_spacing, 'px' ),
		),
		'.ast-single-slide .ast-slider-cta-button' => array(
			'color' => esc_attr( $ast_slide_btn_txt_color ),
			'background-color' => esc_attr( $ast_slide_btn_bg_color ),
			'font-family'    	=> 		astra_get_font_family( $ast_slide_btn_font_family ),
			'font-weight'    	=> 		esc_attr( $ast_slide_btn_font_weight ),
			'font-size'      	=> 		astra_responsive_font( $ast_slide_btn_font_size, 'desktop' ),
			'line-height'    	=> 		esc_attr( $ast_slide_btn_line_height ),
			'text-transform' 	=> 		esc_attr( $ast_slide_btn_text_transform ),
			'letter-spacing' 	=> 		astra_get_css_value( $ast_slide_btn_letter_spacing, 'px' ),
			'border-style'        => 'solid',
			'border-top-width'    => ( isset( $ast_slide_button_border_size['top'] ) && '' !== $ast_slide_button_border_size['top'] ) ? astra_get_css_value( $ast_slide_button_border_size['top'], 'px' ) : '1px',
			'border-right-width'  => ( isset( $ast_slide_button_border_size['right'] ) && '' !== $ast_slide_button_border_size['right'] ) ? astra_get_css_value( $ast_slide_button_border_size['right'], 'px' ) : '1px',
			'border-left-width'   => ( isset( $ast_slide_button_border_size['left'] ) && '' !== $ast_slide_button_border_size['left'] ) ? astra_get_css_value( $ast_slide_button_border_size['left'], 'px' ) : '1px',
			'border-bottom-width' => ( isset( $ast_slide_button_border_size['bottom'] ) && '' !== $ast_slide_button_border_size['bottom'] ) ? astra_get_css_value( $ast_slide_button_border_size['bottom'], 'px' ) : '1px',
			'border-color'        => empty( $ast_slide_button_border_color ) ? esc_attr( $ast_slide_btn_bg_color ) : esc_attr( $ast_slide_button_border_color ),
			'border-radius'       => astra_get_css_value( $ast_slide_button_border_radius, 'px' ),
			'padding-top'         => astra_responsive_spacing( $theme_btn_padding, 'top', 'desktop' ),
			'padding-right'       => astra_responsive_spacing( $theme_btn_padding, 'right', 'desktop' ),
			'padding-bottom'      => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'desktop' ),
			'padding-left'        => astra_responsive_spacing( $theme_btn_padding, 'left', 'desktop' ),
		),
		'.ast-single-slide .ast-slider-cta-button:hover' => array(
			'color' => esc_attr( $ast_slide_btn_txt_hover_color ),
			'background-color' => esc_attr( $ast_slide_btn_bg_hover_color ),
			'border-color'     => empty( $ast_slide_button_border_h_color ) ? esc_attr( $ast_slide_btn_bg_hover_color ) : esc_attr( $ast_slide_button_border_h_color ),
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
			'.ast-single-slide' => array(
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
			'.ast-single-slide' => array(
				'padding-top'   	=> 			astra_responsive_spacing( $slider_container_padding, 'top', 'tablet' ),
				'padding-right'  	=> 			astra_responsive_spacing( $slider_container_padding, 'right', 'tablet' ),
				'padding-bottom' 	=> 			astra_responsive_spacing( $slider_container_padding, 'bottom', 'tablet' ),
				'padding-left'   	=> 			astra_responsive_spacing( $slider_container_padding, 'left', 'tablet' ),
			),
			'.ast-single-slide .banner-pre-heading' => array(
				'font-size'      	=> 			astra_responsive_font( $ast_slide_prefix_font_size, 'tablet' ),
			),
			'.ast-single-slide .banner-heading' => array(
				'font-size'      	=> 			astra_responsive_font( $ast_slide_heading_font_size, 'tablet' ),
			),
			'.ast-single-slide .banner-subheading' => array(
				'font-size'      	=> 			astra_responsive_font( $ast_slide_descr_font_size, 'tablet' ),
			),
			'.ast-single-slide .ast-slider-cta-button' => array(
				'font-size'      	=> 			astra_responsive_font( $ast_slide_btn_font_size, 'tablet' ),
				'padding-top'         => astra_responsive_spacing( $theme_btn_padding, 'top', 'tablet' ),
				'padding-right'       => astra_responsive_spacing( $theme_btn_padding, 'right', 'tablet' ),
				'padding-bottom'      => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'tablet' ),
				'padding-left'        => astra_responsive_spacing( $theme_btn_padding, 'left', 'tablet' ),
			),
		);

		/* Parse CSS from array() */
		$ast_slider_css_output .= astra_parse_css( $slider_tablet_css, '', '768' );

		$slider_mobile_css = array(
			'.ast-single-slide' => array(
				'padding-top'    	=> 			astra_responsive_spacing( $slider_container_padding, 'top', 'mobile' ),
				'padding-right'  	=> 			astra_responsive_spacing( $slider_container_padding, 'right', 'mobile' ),
				'padding-bottom' 	=> 			astra_responsive_spacing( $slider_container_padding, 'bottom', 'mobile' ),
				'padding-left'   	=> 			astra_responsive_spacing( $slider_container_padding, 'left', 'mobile' ),
			),
			'.ast-single-slide .banner-pre-heading' => array(
				'font-size'      	=> 			astra_responsive_font( $ast_slide_prefix_font_size, 'mobile' ),
			),
			'.ast-single-slide .banner-heading' => array(
				'font-size'      	=> 			astra_responsive_font( $ast_slide_heading_font_size, 'mobile' ),
			),
			'.ast-single-slide .banner-subheading' => array(
				'font-size'      	=> 			astra_responsive_font( $ast_slide_descr_font_size, 'mobile' ),
			),
			'.ast-single-slide .ast-slider-cta-button' => array(
				'font-size'      	=> 			astra_responsive_font( $ast_slide_btn_font_size, 'mobile' ),
				'padding-top'         => astra_responsive_spacing( $theme_btn_padding, 'top', 'mobile' ),
				'padding-right'       => astra_responsive_spacing( $theme_btn_padding, 'right', 'mobile' ),
				'padding-bottom'      => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'mobile' ),
				'padding-left'        => astra_responsive_spacing( $theme_btn_padding, 'left', 'mobile' ),
			),
		);

		/* Parse CSS from array() */
		$ast_slider_css_output .= astra_parse_css( $slider_mobile_css, '', '544' );
	}

	wp_add_inline_style( 'astra-theme-css', $ast_slider_css_output );
}
