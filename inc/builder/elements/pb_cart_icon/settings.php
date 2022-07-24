<?php
$options   = [];
$options[] = array(
	'id'        => 'goso_header_pb_cart_icon_section_btn_style',
	'default'   => 'customize',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => __( 'Cart Icon Button Pre-define Style', 'authow' ),
	'choices'   => [
		'customize' => 'Default',
		'style-4'   => 'Filled',
		'style-1'   => 'Bordered',
		'style-2'   => 'Link',
	]
);
$options[] = array(
	'id'        => 'goso_header_pb_cart_icon_section_color',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-color',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => esc_html__( 'Cart Icon Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_cart_icon_section_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-color',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => esc_html__( 'Cart Icon Hover Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_cart_icon_section_btnbstyle',
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
	'id'        => 'goso_header_pb_cart_icon_section_bcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Cart Icon Borders Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_cart_icon_section_bhcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Cart Icon Hover Borders Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_cart_icon_section_bgcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Cart Icon Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_cart_icon_section_bghcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Cart Icon Hover Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_cart_icon_section_item_count_txt',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Number Count Text Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_cart_icon_section_item_count_bg',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Number Count Text Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_pb_cart_icon_section_btnspacing',
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
	'id'        => 'goso_header_pb_cart_icon_section_size',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'label'     => 'Icon Size',
	'type'      => 'authow-fw-size',
	'ids'       => array(
		'desktop' => 'goso_header_pb_cart_icon_section_size',
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
	'id'        => 'goso_header_pb_cart_icon_section_spacing',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-box-model',
	'label'     => __( 'Item Spacing', 'authow' ),
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

return $options;
