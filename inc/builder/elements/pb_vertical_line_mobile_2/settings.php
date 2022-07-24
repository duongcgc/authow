<?php
$general_config = 'penci_builder_mods';
$options        = [];
$options[]      = array(
	'id'        => 'penci_header_pb_vertical_line_mobile_2_width',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-text',
	'label'     => esc_html__( 'Vertical Line Width', 'authow' ),
);
$options[]      = array(
	'id'        => 'penci_header_pb_vertical_line_mobile_2_height',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-text',
	'label'     => esc_html__( 'Vertical Line Height', 'authow' ),
);
$options[]      = array(
	'id'        => 'penci_header_pb_vertical_line_mobile_2_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Vertical Line Color', 'authow' ),
);
$options[]      = array(
	'id'        => 'penci_header_pb_vertical_line_mobile_2_spacing',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
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
	'id'        => 'penci_header_pb_vertical_line_mobile_2_class',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_textarea_field',
	'type'      => 'authow-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'authow' ),
);

return $options;
/*$wp_customize->selective_refresh->add_partial( 'penci_header_pb_vertical_line_mobile_2_width', array(
	'selector'            => '.penci-vertical-line.vertical-line-1',
	'settings'            => [
		'penci_header_pb_vertical_line_mobile_2_width',
		'penci_header_pb_vertical_line_mobile_2_height',
		'penci_header_pb_vertical_line_mobile_2_color',
		'penci_header_pb_vertical_line_mobile_2_class',
	],
	'container_inclusive' => true,
	'render_callback'     => function () {
		load_template( PENCI_BUILDER_PATH . '/elements/pb_vertical_line_1/front-end.php' );
	},
	'fallback_refresh'    => false,
) );*/
