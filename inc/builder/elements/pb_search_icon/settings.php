<?php
$options   = [];
$options[] = array(
	'id'        => 'goso_header_search_style',
	'default'   => 'showup',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => __( 'Search Style', 'authow' ),
	'choices'   => [
		'showup'  => 'Default (Slide Up)',
		'overlay' => 'Overlay',
	]
);
$options[] = array(
	'id'        => 'goso_header_search_icon_btn_style',
	'default'   => 'customize',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => __( 'Search Button Pre-define Style', 'authow' ),
	'choices'   => [
		'customize' => 'Default',
		'style-4'   => 'Filled',
		'style-1'   => 'Bordered',
		'style-2'   => 'Link',
	]
);
$options[] = array(
	'id'        => 'goso_header_search_icon_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Search Icon Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_icon_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-color',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => esc_html__( 'Search Icon Hover Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_btnborder_style',
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
	'id'        => 'goso_header_search_icon_bcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Search Icon Borders Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_icon_bhcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Search Icon Hover Borders Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_button_bgcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Search Icon Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_button_bghcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Search Icon Hover Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_border_color',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-color',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => esc_html__( 'Search Form Borders Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_bg_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Search Form Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_input_border_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Search Form Input Borders Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_input_bg_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Search Form Input Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_input_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Search Form Input Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_button_bg_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Search Form Submit Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_button_bg_hcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Search Form Submit Background Hover Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_button_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Search Form Submit Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_button_hcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Search Form Submit Hover Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_o_bgcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Overlay Search Form Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_o_bdcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Overlay Search Input Border Bottom Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_search_o_closecolor',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Overlay Close Button Color', 'authow' ),
);

$options[] = array(
	'id'        => 'goso_header_search_icon_size',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'label'     => 'Search Icon Size',
	'type'      => 'authow-fw-size',
	'ids'       => array(
		'desktop' => 'goso_header_search_icon_size',
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
	'id'        => 'goso_header_search_input_size',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'label'     => 'Search Form Input Text Size',
	'type'      => 'authow-fw-size',
	'ids'       => array(
		'desktop' => 'goso_header_search_input_size',
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
	'id'        => 'goso_header_search_btn_size',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'label'     => 'Search Icon Size',
	'type'      => 'authow-fw-size',
	'ids'       => array(
		'desktop' => 'goso_header_search_btn_size',
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
	'id'        => 'goso_header_search_btnspacing',
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
	'id'        => 'goso_header_search_spacing',
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
	'id'        => 'goso_header_search_css_class',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_textarea_field',
	'type'      => 'authow-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'authow' ),
);

return $options;
