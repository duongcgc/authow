<?php
$options   = [];
$options[] = array(
	'id'       => 'goso_header_pb_hamburger_menu_desc',
	'type'     => 'authow-fw-alert',
	'label'    => 'You can go to "Appearance > Customize > Vertical Navigation & Menu Hamburger" to adjust the sidebar hamburger.',
	'sanitize' => 'goso_sanitize_choices_field',
	'default'  => 'notice-bg'
);
$options[] = array(
	'id'        => 'goso_header_pb_hamburger_menu_btn_style',
	'default'   => 'customize',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => __( 'Hamburger Button Pre-define Style', 'authow' ),
	'choices'   => [
		'customize' => 'Default',
		'style-4'   => 'Filled',
		'style-1'   => 'Bordered',
		'style-2'   => 'Link',
	]
);
$options[] = array(
	'id'        => 'goso_header_pb_hamburger_menu_size',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-size',
	'label'     => 'Custom Size',
	'ids'       => array(
		'desktop' => 'goso_header_pb_hamburger_menu_size',
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
	'id'        => 'goso_header_pb_hamburger_menu_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_textarea_field',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Text Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_hamburger_menu_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_textarea_field',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Text Hover Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_hamburger_menu_btnbstyle',
	'default'   => 'none',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => __( 'Borders Style', 'authow' ),
	'choices'   => [
		'none'   => 'None',
		'dotted' => 'Dotted',
		'dashed' => 'Dashed',
		'solid'  => 'Solid',
		'double' => 'Double',
	],
);
$options[] = array(
	'id'        => 'goso_header_pb_hamburger_menu_bcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Borders Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_hamburger_menu_bhcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Menu Hover Borders Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_hamburger_menu_bgcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_hamburger_menu_bghcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Hover Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_hamburger_menu_btnspacing',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-box-model',
	'label'     => __( 'Button Spacing', 'authow' ),
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
	'id'        => 'goso_header_pb_hamburger_menu_spacing',
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
	'id'        => 'goso_header_pb_hamburger_menu_class',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_textarea_field',
	'type'      => 'authow-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'authow' ),
);

return $options;
