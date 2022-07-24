<?php
$builder_settings            = 'goso_builder_mods';
$builder_section             = 'goso_header_builder_block';
$builder_rows_desktop        = [ 'topblock', 'top', 'mid', 'bottom', 'bottomblock' ];
$builder_rows_desktop_sticky = [
	'top'    => 'Sticky Top',
	'mid'    => 'Sticky Middle',
	'bottom' => 'Sticky Bottom'
];
$builder_columns_desktop     = [ 'left', 'center', 'right' ];
$builder_rows_mobile         = [ 'top', 'mid', 'bottom' ];
$builder_columns_mobile      = [ 'left', 'center', 'right' ];
$builder_row_sidebar         = [ 'top', 'bottom' ];
$builder_columns_sidebar     = [ 'center' ];
$partial_refresh_id          = [
	'topblock'    => '.goso_topblock.goso-desktop-topblock',
	'top'         => '.goso-desktop-topbar',
	'mid'         => '.goso-desktop-midbar',
	'bottom'      => '.goso-desktop-bottombar',
	'bottomblock' => '.goso-desktop-bottomblock',
];
$partial_mobile_refresh_id   = [
	'top'    => '.goso-mobile-topbar',
	'mid'    => '.goso-mobile-midbar',
	'bottom' => '.goso-mobile-bottombar',
];
$partial_sticky_refresh_id   = [
	'top'    => '.goso-desktop-sticky-top',
	'mid'    => '.goso-desktop-sticky-mid',
	'bottom' => '.goso-desktop-sticky-bottom',
];

/* General Set up*/
$wp_customize->add_panel( 'header_builder_config', array(
	'priority'    => 1,
	'title'       => esc_html__( 'Header Builder', 'authow' ),
	'description' => esc_html__( 'Build your site header with Customizer', 'authow' ),
) );

$wp_customize->add_section( $builder_section, array(
	'title'       => esc_html__( 'Builder Settings', 'authow' ),
	'description' => esc_html__( 'General Builder', 'authow' ),
	'panel'       => 'header_builder_config',
	'priority'    => 900,
) );

$wp_customize->add_section( 'goso_header_desktop_sticky_section', array(
	'title'    => esc_html__( 'Sticky Header', 'authow' ),
	'panel'    => 'header_builder_config',
	'priority' => 20,
) );

$wp_customize->add_section( 'goso_header_mobile_option_section', array(
	'title'    => esc_html__( 'Mobile Header', 'authow' ),
	'panel'    => 'header_builder_config',
	'priority' => 20,
) );

$wp_customize->add_section( 'goso_header_drawer_container_section', array(
	'title'    => esc_html__( 'Mobile Sidebar', 'authow' ),
	'panel'    => 'header_builder_config',
	'priority' => 20,
) );

/* Main Builder Section */
$wp_customize->add_setting( 'goso_hb_arrange_bar', array(
	'default'           => 'topblock,top,mid,bottom,bottomblock',
	'sanitize_callback' => 'goso_text_sanitization',
) );
$wp_customize->add_control( new Goso_Dropdown_Select2_Custom_Control( $wp_customize, 'goso_hb_arrange_bar', [
	'label'       => esc_html__( 'Desktop Element Sort', 'authow' ),
	'section'     => $builder_section,
	'input_attrs' => array(
		'multiselect' => true,
	),
	'choices'     => [
		'topblock'    => esc_attr__( 'Top Ads', 'authow' ),
		'top'         => esc_attr__( 'Top', 'authow' ),
		'mid'         => esc_attr__( 'Mid', 'authow' ),
		'bottom'      => esc_attr__( 'Bottom', 'authow' ),
		'bottomblock' => esc_attr__( 'Bottom Ads', 'authow' ),
	],
] ) );

foreach ( $builder_rows_desktop as $row ) {
	foreach ( $builder_columns_desktop as $column ) {
		$wp_customize->add_setting( "goso_hb_align_desktop_{$row}_{$column}", array(
			'default'           => $column,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goso_sanitize_choices_field'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "goso_hb_align_desktop_{$row}_{$column}", [
			'type'     => 'select',
			'label'    => ucfirst( $row ) . ' ' . ucfirst( $column ) . ' ' . esc_html__( 'Align', 'authow' ),
			'section'  => $builder_section,
			'settings' => "goso_hb_align_desktop_{$row}_{$column}",
			'choices'  => [
				'left'   => esc_attr__( 'Left', 'authow' ),
				'center' => esc_attr__( 'Center', 'authow' ),
				'right'  => esc_attr__( 'Right', 'authow' ),
			],
		] ) );


		$wp_customize->add_setting( "goso_hb_element_desktop_{$row}_{$column}", array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goso_text_sanitization'
		) );
		$wp_customize->add_control( new Goso_Dropdown_Select2_Custom_Control( $wp_customize, "goso_hb_element_desktop_{$row}_{$column}", [
			'label'       => ucfirst( $row ) . ' ' . ucfirst( $column ) . ' ' . esc_html__( 'Element', 'authow' ),
			'section'     => $builder_section,
			'input_attrs' => array(
				'multiselect' => true,
			),
			'choices'     => HeaderBuilder::desktop_header_element(),
		] ) );

		$wp_customize->selective_refresh->add_partial( "goso_hb_element_desktop_{$row}_{$column}", array(
			'selector'            => $partial_refresh_id[ $row ],
			'settings'            => [
				"goso_hb_align_desktop_{$row}_{$column}",
				"goso_hb_element_desktop_{$row}_{$column}",
			],
			'container_inclusive' => true,
			'render_callback'     => "goso_hb_element_desktop_{$row}_preview_render",
			'fallback_refresh'    => false,
		) );
	}
}

/* Mobile Elements*/
foreach ( $builder_rows_mobile as $row ) {
	foreach ( $builder_columns_mobile as $column ) {
		$wp_customize->add_setting( "goso_hb_align_mobile_{$row}_{$column}", array(
			'default'           => $column,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goso_sanitize_choices_field'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "goso_hb_align_mobile_{$row}_{$column}", [
			'type'    => 'select',
			'label'   => 'Mobile ' . ucfirst( $row ) . ' ' . ucfirst( $column ) . ' ' . esc_html__( 'Align', 'authow' ),
			'section' => $builder_section,
			'choices' => [
				'left'   => esc_attr__( 'Left', 'authow' ),
				'center' => esc_attr__( 'Center', 'authow' ),
				'right'  => esc_attr__( 'Right', 'authow' ),
			],
		] ) );

		$wp_customize->add_setting( "goso_hb_element_mobile_{$row}_{$column}", array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goso_text_sanitization'
		) );
		$wp_customize->add_control( new Goso_Dropdown_Select2_Custom_Control( $wp_customize, "goso_hb_element_mobile_{$row}_{$column}", [
			'label'       => 'Mobile ' . ucfirst( $row ) . ' ' . ucfirst( $column ) . ' ' . esc_html__( 'Element', 'authow' ),
			'section'     => $builder_section,
			'input_attrs' => array(
				'multiselect' => true,
			),
			'choices'     => HeaderBuilder::mobile_header_element(),
		] ) );

		$wp_customize->selective_refresh->add_partial( "goso_hb_element_mobile_{$row}_{$column}", array(
			'selector'            => $partial_mobile_refresh_id[ $row ],
			'setttings'           => [
				"goso_hb_align_mobile_{$row}_{$column}",
				"goso_hb_element_mobile_{$row}_{$column}"
			],
			'container_inclusive' => true,
			'render_callback'     => "goso_hb_element_mobile_{$row}_preview_render",
			'fallback_refresh'    => false,
		) );
	}
}

/* Header Sticky Elements*/
foreach ( $builder_rows_desktop_sticky as $row => $row_name ) {
	foreach ( $builder_columns_desktop as $column ) {
		$wp_customize->add_setting( "goso_hb_align_desktop_sticky_{$row}_{$column}", array(
			'default'           => $column,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goso_sanitize_choices_field'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "goso_hb_align_desktop_sticky_{$row}_{$column}", [
			'type'    => 'select',
			'label'   => 'Desktop Sticky ' . ucfirst( $row ) . ' ' . ucfirst( $column ) . ' ' . esc_html__( 'Align', 'authow' ),
			'section' => $builder_section,
			'choices' => [
				'left'   => esc_attr__( 'Left', 'authow' ),
				'center' => esc_attr__( 'Center', 'authow' ),
				'right'  => esc_attr__( 'Right', 'authow' ),
			],
		] ) );


		$wp_customize->add_setting( "goso_hb_element_desktop_sticky_{$row}_{$column}", array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goso_text_sanitization'
		) );
		$wp_customize->add_control( new Goso_Dropdown_Select2_Custom_Control( $wp_customize, "goso_hb_element_desktop_sticky_{$row}_{$column}", [
			'label'       => 'Desktop Sticky ' . ucfirst( $row ) . ' ' . ucfirst( $column ) . ' ' . esc_html__( 'Element', 'authow' ),
			'section'     => $builder_section,
			'input_attrs' => array(
				'multiselect' => true,
			),
			'choices'     => HeaderBuilder::desktop_header_element(),
		] ) );

		$wp_customize->selective_refresh->add_partial( "goso_hb_element_desktop_sticky_{$row}_{$column}", array(
			'selector'            => $partial_sticky_refresh_id[ $row ],
			'setttings'           => [
				"goso_hb_align_desktop_sticky_{$row}_{$column}",
				"goso_hb_element_desktop_sticky_{$row}_{$column}"
			],
			'container_inclusive' => true,
			'render_callback'     => "goso_hb_element_desktop_sticky_{$row}_preview_render",
			'fallback_refresh'    => false,
		) );
	}
}

/* Mobile Sidebar Elements*/
foreach ( $builder_row_sidebar as $row ) {
	foreach ( $builder_columns_sidebar as $column ) {
		$wp_customize->add_setting( "goso_hb_align_mobile_drawer_{$row}_{$column}", array(
			'default'           => $column,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goso_sanitize_choices_field'
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, "goso_hb_align_mobile_drawer_{$row}_{$column}", [
			'type'    => 'select',
			'label'   => 'Mobile Sidebar ' . ucfirst( $row ) . ' ' . ucfirst( $column ) . ' ' . esc_html__( 'Align', 'authow' ),
			'section' => $builder_section,
			'choices' => [
				'left'   => esc_attr__( 'Left', 'authow' ),
				'center' => esc_attr__( 'Center', 'authow' ),
				'right'  => esc_attr__( 'Right', 'authow' ),
			],
		] ) );

		$wp_customize->add_setting( "goso_hb_element_mobile_drawer_{$row}_{$column}", array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'goso_text_sanitization'
		) );
		$wp_customize->add_control( new Goso_Dropdown_Select2_Custom_Control( $wp_customize, "goso_hb_element_mobile_drawer_{$row}_{$column}", [
			'label'       => 'Mobile Sidebar ' . ucfirst( $row ) . ' ' . ucfirst( $column ) . ' ' . esc_html__( 'Element', 'authow' ),
			'section'     => $builder_section,
			'input_attrs' => array(
				'multiselect' => true,
			),
			'choices'     => HeaderBuilder::mobile_header_element(),
		] ) );

		$wp_customize->selective_refresh->add_partial( "goso_hb_element_mobile_drawer_{$row}_{$column}", array(
			'selector'            => '.goso-mobile-sidebar-content-wrapper',
			'settings'            => [
				"goso_hb_align_mobile_drawer_{$row}_{$column}",
				"goso_hb_element_mobile_drawer_{$row}_{$column}"
			],
			'container_inclusive' => true,
			'render_callback'     => function () {
				load_template( PENCI_BUILDER_PATH . '/template/mobile-menu-content.php' );
			},
			'fallback_refresh'    => false,
		) );
	}
}
