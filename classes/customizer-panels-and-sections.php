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

$ast_hompage_slide_count = apply_filters( 'ast_hompage_slide_count', 3 );

if( $ast_hompage_slide_count ) {
	for( $base = 1; $base <= $ast_hompage_slide_count; $base++ ) {
		$wp_customize->add_section(
			'section-astra-slider-'. $base .'-contents', array(
				'priority' => 5 + $base,
				'title'    => __( 'Slide ' . $base .' ' , 'astra-slider' ),
				'panel'    => 'panel-astra-slider',
			)
		);
	}
}

$wp_customize->add_section(
	'section-astra-slider-styles', array(
		'priority' => 100,
		'title'    => __( 'Style', 'astra-slider' ),
		'panel'    => 'panel-astra-slider',
	)
);
