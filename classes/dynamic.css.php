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

	$background_size				= 		astra_get_option( 'slider-image-size-option' );
	$custom_background_top_p    	= 		astra_get_option( 'banner-custom-top-padding' );
	$custom_background_bottom_p 	= 		astra_get_option( 'banner-custom-bottom-padding' );

	$slider_container_padding    	= 		astra_get_option( 'ast-slider-container-padding' );

	$slider_desktop_css = array(

		// Banner CSS.
		'.home-page-ast-slider .ast-single-slide .banner-heading' => array(
		),
		'.home-page-ast-slider .ast-single-slide .banner-subheading' => array(
		),
		'.home-page-ast-slider' => array(
			'background-image'    	=> 'url(' . esc_url( $banner_image ) . ')',
			'background-repeat'   	=> esc_attr( 'repeat' ),
			'background-size'     	=> esc_attr( 'cover' ),
			'background-position' 	=> esc_attr( 'center center' ),
		),
	);

	if ( 'custom-size' == $background_size ) {
		$slider_banner_css = array(
			'.home-page-ast-slider .ast-single-slide' => array(
				'padding-top'         => astra_responsive_spacing( $slider_container_padding, 'top', 'desktop' ),
				'padding-right'       => astra_responsive_spacing( $slider_container_padding, 'right', 'desktop' ),
				'padding-bottom'      => astra_responsive_spacing( $slider_container_padding, 'bottom', 'desktop' ),
				'padding-left'        => astra_responsive_spacing( $slider_container_padding, 'left', 'desktop' ),
			),
		);

		$slider_desktop_css = array_merge( $slider_desktop_css, $slider_banner_css );
	}

	/* Parse CSS from array() */
	$ast_slider_css_output = astra_parse_css( $slider_desktop_css );

	if ( 'custom-size' == $background_size ) {

		$slider_tablet_css = array(
			'.home-page-ast-slider .ast-single-slide' => array(
				'padding-top'    => astra_responsive_spacing( $slider_container_padding, 'top', 'tablet' ),
				'padding-right'  => astra_responsive_spacing( $slider_container_padding, 'right', 'tablet' ),
				'padding-bottom' => astra_responsive_spacing( $slider_container_padding, 'bottom', 'tablet' ),
				'padding-left'   => astra_responsive_spacing( $slider_container_padding, 'left', 'tablet' ),
			),
		);

		/* Parse CSS from array() */
		$ast_slider_css_output .= astra_parse_css( $slider_tablet_css, '', '768' );

		$slider_mobile_css = array(
			'.home-page-ast-slider .ast-single-slide' => array(
				'padding-top'    => astra_responsive_spacing( $slider_container_padding, 'top', 'mobile' ),
				'padding-right'  => astra_responsive_spacing( $slider_container_padding, 'right', 'mobile' ),
				'padding-bottom' => astra_responsive_spacing( $slider_container_padding, 'bottom', 'mobile' ),
				'padding-left'   => astra_responsive_spacing( $slider_container_padding, 'left', 'mobile' ),
			),
		);

		/* Parse CSS from array() */
		$ast_slider_css_output .= astra_parse_css( $slider_mobile_css, '', '544' );
	}

	wp_add_inline_style( 'astra-theme-css', $ast_slider_css_output );
}
