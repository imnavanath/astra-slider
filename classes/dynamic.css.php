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

	wp_add_inline_style( 'astra-theme-css', $ast_slider_css_output );
}
