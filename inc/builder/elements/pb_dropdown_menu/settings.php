<?php
$options   = [];
$options[] = array(
	'id'              => 'goso_header_pb_dropdown_menu_name',
	'default'         => '',
	'transport'       => 'postMessage',
	'sanitize'        => 'goso_sanitize_choices_field',
	'type'            => 'authow-fw-select',
	
	'label'           => esc_html__( 'Select Menu', 'authow' ),
	'placeholder'     => esc_html__( 'Select an the menu', 'authow' ),
	'choices'         => goso_builder_menu_list(),
	'description'     => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to add new or edit your menus.', 'authow' ), admin_url( 'nav-menus.php' ) ),
	'partial_refresh' => [
		'goso_header_pb_dropdown_menu_name' => [
			'selector'        => '.pc-wrapbuilder-header-inner',
			'render_callback' => function () {
				load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
			},
		],
	],
);
$options[] = array(
	'id'        => 'goso_header_pb_dropdown_menu_goso_font_for_menu',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Custom Font For Menu Items',
	'type'      => 'authow-fw-select',
	'choices'   => goso_all_fonts( 'select' )
);
$options[] = array(
	'id'        => 'goso_header_pb_dropdown_menu_goso_font_weight_menu',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Font Weight For Dropdown Menu Items',
	
	'type'      => 'authow-fw-select',
	'choices'   => array(
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
	'id'        => 'goso_header_pb_dropdown_menu_goso_menu_uppercase',
	'default'   => 'disable',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Turn Off Uppercase on Menu items',
	'type'      => 'authow-fw-select',
	'choices'   => [
		'disable' => 'No',
		'enable'  => 'Yes',
	]
);
$options[] = array(
	'id'          => 'goso_header_pb_dropdown_menu_goso_vernav_click_parent',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Enable click on Parent Menu Item to open Child Menu Items',
	'description' => 'By default, you need to click to the arrow on the right side to open child menu items - this option will help you click on the parent menu items to open child menu items',
	'type'        => 'authow-fw-select',
	'choices'     => [
		'disable' => 'No',
		'enable'  => 'Yes',
	]
);
$options[] = array(
	'id'        => 'goso_header_pb_dropdown_menu_goso_font_size_lv1',
	'default'   => '12',
	'sanitize'  => 'absint',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-size',
	'label'     => __( 'Font Size for Menu Items Level 1', 'authow' ),
	'ids'       => array(
		'desktop' => 'goso_header_pb_dropdown_menu_goso_font_size_lv1',
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
	'id'        => 'goso_header_pb_dropdown_menu_goso_font_size_drop',
	'default'   => '12',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-size',
	'sanitize'  => 'absint',
	'label'     => __( 'Font Size for Dropdown Menu Items', 'authow' ),
	'ids'  => array(
		'desktop' => 'goso_header_pb_dropdown_menu_goso_font_size_drop',
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
	'id'        => 'goso_header_pb_dropdown_menu_spacing',
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
	'id'        => 'goso_header_pb_dropdown_menu_goso_menu_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Menu Items Color',
);
$options[] = array(
	'id'        => 'goso_header_pb_dropdown_menu_goso_menu_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Menu Items Hover & Active Color',
);
$options[] = array(
	'id'        => 'goso_header_pb_dropdown_menu_goso_menu_border_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Menu Items Borders Color',
);
$options[] = array(
	'id'        => 'goso_header_pb_dropdown_menu_class',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_textarea_field',
	'type'      => 'authow-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'authow' ),
);

return $options;
