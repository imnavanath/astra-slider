<?php
/**
 * Astra Slider - Panels & Sections
 *
 * @package Home Page Slider for Astra Theme
 * @since 1.0.0
 */

/**
 * Layout Panel
 */

$wp_customize->add_panel(
	'panel-astra-slider', array(
		'priority' => 20,
		'title'    => __( 'Astra Slider', 'astra-slider' ),
	)
);

$wp_customize->add_section(
	'section-astra-slider-contents', array(
		'priority' => 5,
		'title'    => __( 'Slides', 'astra-slider' ),
		'panel'    => 'panel-astra-slider',
	)
);

$wp_customize->add_section(
	'section-astra-slider-styles', array(
		'priority' => 10,
		'title'    => __( 'Style', 'astra-slider' ),
		'panel'    => 'panel-astra-slider',
	)
);
