<?php
$options   = [];
$options[] = array(
	'id'        => 'goso_header_builder_pb_shortcode_mobile_name',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-textarea',
	
	'label'     => esc_html__( 'Shortcode Code', 'authow' ),
	'priority'  => 10,
);
$options[] = array(
	'id'        => 'goso_header_builder_pb_shortcode_mobile_spacing',
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
	'id'        => 'goso_header_builder_pb_shortcode_mobile_class',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_textarea_field',
	'type'      => 'authow-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'authow' ),
);

return $options;
/*$wp_customize->selective_refresh->add_partial( 'goso_header_builder_pb_shortcode_mobile_name', array(
	'selector'            => '.pc-wrapbuilder-header-inner',
	'settings'            => [
		'goso_header_builder_pb_shortcode_mobile_name',
		//'goso_header_builder_pb_shortcode_mobile_spacing',
		'goso_header_builder_pb_shortcode_mobile_class',
	],
	'container_inclusive' => true,
	'render_callback'     => function () {
		load_template( GOSO_BUILDER_PATH . '/template/desktop-builder.php' );
	},
	'fallback_refresh'    => false,
) );*/
