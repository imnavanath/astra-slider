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

/**
 * Option: Retina logo selector
 */
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[astra-slider-banner-image]', array(
		'default'           => astra_get_option( 'astra-slider-banner-image' ),
		'type'              => 'option',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize, ASTRA_THEME_SETTINGS . '[astra-slider-banner-image]', array(
			'section'        => 'section-astra-slider-contents',
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
	ASTRA_THEME_SETTINGS . '[astra-slider-banner-heading]', array(
		'default'           => astra_get_option( 'astra-slider-banner-heading' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[astra-slider-banner-heading]', array(
		'type'     => 'text',
		'section'  => 'section-astra-slider-contents',
		'label'    => __( 'Banner Heading', 'astra-slider' ),
		'priority' => 6,
	)
);

/**
 * Option: Add Sub Heading
 */
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[astra-slider-banner-subheading]', array(
		'default'           => astra_get_option( 'astra-slider-banner-subheading' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[astra-slider-banner-subheading]', array(
		'type'     => 'text',
		'section'  => 'section-astra-slider-contents',
		'label'    => __( 'Banner Subheading', 'astra-slider' ),
		'priority' => 6,
	)
);

/**
 * Option: Heading Font Family
 */
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[banner-font-family]', array(
		'default'           => astra_get_option( 'banner-font-family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	new Astra_Control_Typography(
		$wp_customize, ASTRA_THEME_SETTINGS . '[banner-font-family]', array(
			'type'    => 'ast-font-family',
			'label'   => __( 'Font Family', 'astra-slider' ),
			'section' => 'section-astra-slider-styles',
			'connect' => ASTRA_THEME_SETTINGS . '[banner-font-weight]',
		)
	)
);

$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[banner-font-weight]', array(
		'default'           => astra_get_option( 'banner-font-weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Astra_Control_Typography(
		$wp_customize, ASTRA_THEME_SETTINGS . '[banner-font-weight]', array(
			'type'    => 'ast-font-weight',
			'label'   => __( 'Font Weight', 'astra-slider' ),
			'section' => 'section-astra-slider-styles',
			'connect' => ASTRA_THEME_SETTINGS . '[banner-font-family]',
		)
	)
);

$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[banner-heading-text-transform]', array(
		'default'           => astra_get_option( 'banner-heading-text-transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[banner-heading-text-transform]', array(
		'section' => 'section-astra-slider-styles',
		'label'   => __( 'Text Transform', 'astra-addon' ),
		'type'    => 'select',
		'choices' => array(
			''           => __( 'Inherit', 'astra-addon' ),
			'none'       => __( 'None', 'astra-addon' ),
			'capitalize' => __( 'Capitalize', 'astra-addon' ),
			'uppercase'  => __( 'Uppercase', 'astra-addon' ),
			'lowercase'  => __( 'Lowercase', 'astra-addon' ),
		),
	)
);

$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[banner-heading-font-size]', array(
		'default'           => astra_get_option( 'banner-heading-font-size' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Astra_Control_Responsive(
		$wp_customize, ASTRA_THEME_SETTINGS . '[banner-heading-font-size]', array(
			'section'     => 'section-astra-slider-styles',
			'label'       => __( 'Font Size', 'astra-addon' ),
			'type'        => 'ast-responsive',
			'input_attrs' => array(
				'min' => 0,
			),
			'units'       => array(
				'px' => 'px',
				'em' => 'em',
			),
		)
	)
);

$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[banner-heading-line-height]', array(
		'default'           => '',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
	)
);
$wp_customize->add_control(
	new Astra_Control_Slider(
		$wp_customize, ASTRA_THEME_SETTINGS . '[banner-heading-line-height]', array(
			'section'     => 'section-astra-slider-styles',
			'label'       => __( 'Line Height', 'astra-addon' ),
			'type'        => 'ast-slider',
			'suffix'      => '',
			'input_attrs' => array(
				'min'  => 1,
				'step' => 0.01,
				'max'  => 5,
			),
		)
	)
);

$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[banner-bg-color]', array(
		'default'           => astra_get_option( 'banner-bg-color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Astra_Control_Color(
		$wp_customize, ASTRA_THEME_SETTINGS . '[banner-bg-color]', array(
			'type'    => 'ast-color',
			'label'   => __( 'Color', 'astra-slider' ),
			'section' => 'section-astra-slider-styles',
		)
	)
);

$wp_customize->add_control(
	new Astra_Control_Divider(
		$wp_customize, ASTRA_THEME_SETTINGS . '[divider-section-banner-subheading]', array(
			'type'     => 'ast-divider',
			'section'  => 'section-astra-slider-styles',
			'priority' => 10,
			'label'    => __( 'Subheading', 'astra-slider' ),
			'settings' => array(),
		)
	)
);

/**
 * Option: Sub Heading Font Family
 */
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[banner-subheading-font-family]', array(
		'default'           => astra_get_option( 'banner-subheading-font-family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	new Astra_Control_Typography(
		$wp_customize, ASTRA_THEME_SETTINGS . '[banner-subheading-font-family]', array(
			'type'    => 'ast-font-family',
			'label'   => __( 'Font Family', 'astra-slider' ),
			'section' => 'section-astra-slider-styles',
			'connect' => ASTRA_THEME_SETTINGS . '[banner-subheading-font-weight]',
		)
	)
);

$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[banner-subheading-font-weight]', array(
		'default'           => astra_get_option( 'banner-subheading-font-weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Astra_Control_Typography(
		$wp_customize, ASTRA_THEME_SETTINGS . '[banner-subheading-font-weight]', array(
			'type'    => 'ast-font-weight',
			'label'   => __( 'Font Weight', 'astra-slider' ),
			'section' => 'section-astra-slider-styles',
			'connect' => ASTRA_THEME_SETTINGS . '[banner-subheading-font-family]',
		)
	)
);

$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[banner-subheading-text-transform]', array(
		'default'           => astra_get_option( 'banner-subheading-text-transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[banner-subheading-text-transform]', array(
		'section' => 'section-astra-slider-styles',
		'label'   => __( 'Text Transform', 'astra-addon' ),
		'type'    => 'select',
		'choices' => array(
			''           => __( 'Inherit', 'astra-addon' ),
			'none'       => __( 'None', 'astra-addon' ),
			'capitalize' => __( 'Capitalize', 'astra-addon' ),
			'uppercase'  => __( 'Uppercase', 'astra-addon' ),
			'lowercase'  => __( 'Lowercase', 'astra-addon' ),
		),
	)
);

$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[banner-subheading-font-size]', array(
		'default'           => astra_get_option( 'banner-subheading-font-size' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Astra_Control_Responsive(
		$wp_customize, ASTRA_THEME_SETTINGS . '[banner-subheading-font-size]', array(
			'section'     => 'section-astra-slider-styles',
			'label'       => __( 'Font Size', 'astra-addon' ),
			'type'        => 'ast-responsive',
			'input_attrs' => array(
				'min' => 0,
			),
			'units'       => array(
				'px' => 'px',
				'em' => 'em',
			),
		)
	)
);

$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[banner-subheading-line-height]', array(
		'default'           => '',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
	)
);
$wp_customize->add_control(
	new Astra_Control_Slider(
		$wp_customize, ASTRA_THEME_SETTINGS . '[banner-subheading-line-height]', array(
			'section'     => 'section-astra-slider-styles',
			'label'       => __( 'Line Height', 'astra-addon' ),
			'type'        => 'ast-slider',
			'suffix'      => '',
			'input_attrs' => array(
				'min'  => 1,
				'step' => 0.01,
				'max'  => 5,
			),
		)
	)
);

$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[banner-subheading-bg-color]', array(
		'default'           => astra_get_option( 'banner-subheading-bg-color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Astra_Control_Color(
		$wp_customize, ASTRA_THEME_SETTINGS . '[banner-subheading-bg-color]', array(
			'type'    => 'ast-color',
			'label'   => __( 'Color', 'astra-slider' ),
			'section' => 'section-astra-slider-styles',
		)
	)
);

