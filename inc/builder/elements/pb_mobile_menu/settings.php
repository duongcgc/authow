<?php
$options   = [];
$options[] = array(
	'id'      => 'goso_header_pb_mobile_menu_desc',
	'label'   => 'Please go to Appearance → Customize → Logo & Header → Vertical Mobile Navigation to configure the mobile menu.',
	'type'    => 'authow-fw-alert',
	'default' => 'notice-bg'
);
$options[] = array(
	'id'        => 'goso_header_pb_mobile_menu_btn_style',
	'default'   => 'customize',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => __( 'Mobile Button Pre-define Style', 'authow' ),
	'choices'   => [
		'customize' => 'Default',
		'style-4'   => 'Filled',
		'style-1'   => 'Bordered',
		'style-2'   => 'Link',
	]
);
$options[] = array(
	'id'        => 'goso_header_pb_mobile_menu_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_textarea_field',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_mobile_menu_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_textarea_field',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Hover Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_mobile_menu_btnbstyle',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => __( 'Button Borders Style', 'authow' ),
	'choices'   => [
		''       => 'Default',
		'none'   => 'None',
		'dotted' => 'Dotted',
		'dashed' => 'Dashed',
		'solid'  => 'Solid',
		'double' => 'Double',
	],
);
$options[] = array(
	'id'        => 'goso_header_pb_mobile_menu_bcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Menu Borders Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_mobile_menu_bhcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Menu Hover Borders Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_mobile_menu_bgcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Menu Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_mobile_menu_bghcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Menu Hover Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_mobile_menu_btnspacing',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-box-model',
	'label'     => __( 'Mobile Button Spacing', 'authow' ),
	'choices'   => array(
		'margin'        => array(
			'margin-top'    => '',
			'margin-right'  => '',
			'margin-bottom' => '',
			'margin-left'   => '',
		),
		'padding'       => array(
			'padding-top'    => '',
			'padding-right'  => '',
			'padding-bottom' => '',
			'padding-left'   => '',
		),
		'border'        => array(
			'border-top'    => '',
			'border-right'  => '',
			'border-bottom' => '',
			'border-left'   => '',
		),
		'border-radius' => array(
			'border-radius-top'    => '',
			'border-radius-right'  => '',
			'border-radius-bottom' => '',
			'border-radius-left'   => '',
		),
	),
);
$options[] = array(
	'id'        => 'goso_header_pb_mobile_menu_spacing',
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
	'id'        => 'goso_header_pb_mobile_menu_class',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_textarea_field',
	'type'      => 'authow-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'authow' ),
);

return $options;
