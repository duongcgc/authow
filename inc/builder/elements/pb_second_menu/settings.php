<?php
$options   = [];
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_name',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',

	'label'           => esc_html__( 'Select Menu', 'authow' ),
	'placeholder'     => esc_html__( 'Select an the menu', 'authow' ),
	'description'     => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to add new or edit your menus.', 'authow' ), admin_url( 'nav-menus.php' ) ),
	'choices'         => goso_builder_menu_list(),
	'partial_refresh' => [
		'goso_header_pb_second_menu_name' => [
			'selector'        => '.pc-wrapbuilder-header-inner',
			'render_callback' => function () {
				load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
			},
		],
	],
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_header_enable_padding',
	'default'   => 'disable',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Enable Padding on Menu Item Level 1',

	'type'    => 'authow-fw-select',
	'choices' => [
		'disable' => 'No',
		'enable'  => 'Yes',
	]
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_header_remove_line_hover',
	'default'   => 'disable',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Hide Line When Hover on Menu Items Level 1',

	'description' => __( 'You can change the sub menu style via Customize > Logo & Header > Main Bar & Primary Menu > Sub Menu Style', 'authow' ),
	'type'        => 'authow-fw-select',
	'choices'     => [
		'disable' => 'No',
		'enable'  => 'Yes',
	]
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_font_for_menu',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Custom Font For Second Menu Items',
	'type'      => 'authow-fw-select',
	'choices'   => goso_all_fonts( 'select' )
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_font_weight_menu',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Font Weight For Second Menu Items',

	'type'    => 'authow-fw-select',
	'choices' => array(
		''        => '',
		'normal'  => 'Normal',
		'bold'    => 'Bold',
		'bolder'  => 'Bolder',
		'lighter' => 'Lighter',
		'100'     => '100',
		'200'     => '200',
		'300'     => '300',
		'400'     => '400',
		'500'     => '500',
		'600'     => '600',
		'700'     => '700',
		'800'     => '800',
		'900'     => '900'
	)
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_menu_uppercase',
	'default'   => 'disable',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Turn Off Uppercase on Menu items',

	'type'    => 'authow-fw-select',
	'choices' => [
		'disable' => 'No',
		'enable'  => 'Yes',
	]
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_menu_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Menu Items Color',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_menu_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Menu Items Hover Color',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_menu_active_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Menu Items Active Color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_menu_line_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Line Hover Color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_menu_bg_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Menu Items Background Color',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_menu_bg_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Menu Items Hover Background Color',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_submenu_bgcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Sub Menu Background Color',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_submenu_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Sub Menu Items Color',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_submenu_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Sub Menu Items Hover Color',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_submenu_activecl',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Sub Menu Items Active Color',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_submenu_bordercolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Sub Menu Borders Color',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_mega_bg_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Category Mega Menu Background Color',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_mega_child_cat_bg_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Category Mega Menu List Child Categories Background Color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_mega_post_category_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Mega Menu Post Category Color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_mega_post_title_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Category Mega Menu Post Title Color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_mega_post_date_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Category Mega Menu Post Date Color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_mega_accent_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Category Mega Menu Accent Color',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_mega_border_style2',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Borders Color for Category Mega on Menu Style2',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_drop_border_style2',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Dropdown Borders on Hover for Menu Style2',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_section_slogan_heading_1',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_text_field',
	'label'     => esc_html__( 'Menu Font Size', 'authow' ),

	'type' => 'authow-fw-header',
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_line_height_lv1',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-size',
	'sanitize'  => 'absint',
	'label'     => __( 'Height for Menu Items Level 1', 'authow' ),
	'ids'       => array(
		'desktop' => 'goso_header_pb_second_menu_goso_line_height_lv1',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_font_size_lv1',
	'default'   => '12',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-size',
	'label'     => __( 'Font Size for Menu Items Level 1', 'authow' ),
	'ids'       => array(
		'desktop' => 'goso_header_pb_second_menu_goso_font_size_lv1',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_font_size_drop',
	'default'   => '12',
	'sanitize'  => 'absint',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-size',
	'label'     => __( 'Font Size for Dropdown Menu Items', 'authow' ),
	'ids'       => array(
		'desktop' => 'goso_header_pb_second_menu_goso_font_size_drop',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_goso_lv1_item_spacing',
	'default'   => '',
	'sanitize'  => 'absint',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-size',
	'label'     => __( 'Space Between Menu Items Level 1', 'authow' ),
	'ids'       => array(
		'desktop' => 'goso_header_pb_second_menu_goso_lv1_item_spacing',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_spacing',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-box-model',
	'label'     => __( 'Element Spacing', 'authow' ),
	'choices'   => array(
		'margin'  => array(
			'margin-top'    => '',
			'margin-right'  => '',
			'margin-bottom' => '',
			'margin-left'   => '',
		),
		'padding' => array(
			'padding-top'    => '',
			'padding-right'  => '',
			'padding-bottom' => '',
			'padding-left'   => '',
		),
	),
);
$options[] = array(
	'id'        => 'goso_header_pb_second_menu_class',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_textarea_field',
	'type'      => 'authow-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'authow' ),
);

return $options;
/*$wp_customize->selective_refresh->add_partial( 'goso_header_pb_second_menu_name', array(
	'selector'            => '.pc-wrapbuilder-header-inner',
	'settings'            => [
		'goso_header_pb_second_menu_name',
		//'goso_header_pb_second_menu_style',
		'goso_header_pb_second_menu_goso_header_enable_padding',
		'goso_header_pb_second_menu_goso_header_remove_line_hover',
		//'goso_header_pb_second_menu_goso_font_for_menu',
		//'goso_header_pb_second_menu_goso_font_weight_menu',
		'goso_header_pb_second_menu_goso_menu_uppercase',
		//'goso_header_pb_second_menu_goso_section_slogan_heading',
		//'goso_header_pb_second_menu_goso_menu_color',
		//'goso_header_pb_second_menu_goso_menu_hv_color',
		//'goso_header_pb_second_menu_goso_menu_line_hv_color',
		//'goso_header_pb_second_menu_goso_menu_bg_color',
		//'goso_header_pb_second_menu_goso_menu_bg_hv_color',
		//'goso_header_pb_second_menu_goso_submenu_color',
		//'goso_header_pb_second_menu_goso_submenu_hv_color',
		//'goso_header_pb_second_menu_goso_submenu_bgcolor',
		//'goso_header_pb_second_menu_goso_submenu_bordercolor',
		//'goso_header_pb_second_menu_goso_mega_bg_color',
		//'goso_header_pb_second_menu_goso_mega_child_cat_bg_color',
		//'goso_header_pb_second_menu_goso_mega_post_date_color',
		//'goso_header_pb_second_menu_goso_mega_post_category_color',
		//'goso_header_pb_second_menu_goso_mega_accent_color',
		//'goso_header_pb_second_menu_goso_mega_border_style2',
		//'goso_header_pb_second_menu_goso_section_slogan_heading_1',
		//'goso_header_pb_second_menu_goso_font_size_lv1',
		//'goso_header_pb_second_menu_goso_line_height_lv1',
		//'goso_header_pb_second_menu_goso_font_size_drop',
		//'goso_header_pb_second_menu_goso_lv1_item_spacing',
		//'goso_header_pb_second_menu_spacing',
		'goso_header_pb_second_menu_class',
	],
	'container_inclusive' => true,
	'render_callback'     => function () {
		load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
	},
	'fallback_refresh'    => false,
) );*/
