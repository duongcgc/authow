<?php
$general_config = 'goso_builder_mods';
$options        = [];
$options[]      = array(
	'id'        => 'goso_header_pb_vertical_line_mobile_1_width',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-text',
	'label'     => esc_html__( 'Vertical Line Width', 'authow' ),
);
$options[]      = array(
	'id'        => 'goso_header_pb_vertical_line_mobile_1_height',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-text',
	'label'     => esc_html__( 'Vertical Line Height', 'authow' ),
);
$options[]      = array(
	'id'        => 'goso_header_pb_vertical_line_mobile_1_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Vertical Line Color', 'authow' ),
);
$options[]      = array(
	'id'        => 'goso_header_pb_vertical_line_mobile_1_spacing',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-box-model',
	'label'     => __( 'Element Spacing', 'authow' ),
	'choices'   => array(
		'margin' => array(
			'margin-top'    => '',
			'margin-right'  => '',
			'margin-bottom' => '',
			'margin-left'   => '',
		),
	),
);
$options[]      = array(
	'id'        => 'goso_header_pb_vertical_line_mobile_1_class',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_textarea_field',
	'type'      => 'authow-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'authow' ),
);

return $options;
/*$wp_customize->selective_refresh->add_partial( 'goso_header_pb_vertical_line_mobile_1_width', array(
	'selector'            => '.goso-vertical-line.vertical-line-1',
	'settings'            => [
		'goso_header_pb_vertical_line_mobile_1_width',
		'goso_header_pb_vertical_line_mobile_1_height',
		'goso_header_pb_vertical_line_mobile_1_color',
		'goso_header_pb_vertical_line_mobile_1_class',
	],
	'container_inclusive' => true,
	'render_callback'     => function () {
		load_template( GOSO_BUILDER_PATH . '/elements/pb_vertical_line_1/front-end.php' );
	},
	'fallback_refresh'    => false,
) );*/
