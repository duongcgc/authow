<?php
$options   = [];
$options[] = array(
	'id'        => 'goso_header_builder_pb_html_3_name',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-textarea',
	'label'     => esc_html__( 'HTML Code', 'authow' ),
	'partial_refresh' => [
		'goso_header_builder_pb_html_3_name' => [
			'selector'        => '.pc-wrapbuilder-header-inner',
			'render_callback' => function () {
				load_template( GOSO_BUILDER_PATH . '/template/desktop-builder.php' );
			},
		],
	],
);
$options[] = array(
	'id'        => 'goso_header_builder_pb_html_3_color',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-color',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => esc_html__( 'Text Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_builder_pb_html_3_link_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => esc_html__( 'Links Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_builder_pb_html_3_fsize',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-size',
	'sanitize'  => 'absint',
	'label'     => 'Font Size',
	'ids'  => array(
		'desktop' => 'goso_header_builder_pb_html_3_fsize',
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
	'id'        => 'goso_header_builder_pb_html_3_spacing',
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
	'id'       => 'goso_header_builder_pb_html_3_css_class',
	'default'  => '',
	'sanitize' => 'goso_sanitize_textarea_field',
	'type'     => 'authow-fw-text',
	'label'    => esc_html__( 'Custom CSS Class', 'authow' ),
);
return $options;
