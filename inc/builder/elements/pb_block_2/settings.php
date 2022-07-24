<?php
$pb_block_2_section = 'goso_header_pb_block_2_section';
$options            = [];
$options[]          = array(
	'id'              => 'goso_header_pb_block_2_select',
	'default'         => '',
	'transport'       => 'postMessage',
	'sanitize'        => 'goso_sanitize_choices_field',
	'type'            => 'authow-fw-ajax-select',
	'label'           => esc_html__( 'Select the Goso Block', 'authow' ),
	'choices'         => call_user_func( function () {
		$builder_layout  = [ '' => '- Select -' ];
		$builder_layouts = get_posts( [
			'post_type'      => 'goso-block',
			'posts_per_page' => - 1,
		] );
		foreach ( $builder_layouts as $builder_builder ) {
			$builder_layout[ $builder_builder->post_name ] = $builder_builder->post_title;
		}

		return $builder_layout;
	} ),
	'partial_refresh' => [
		'goso_header_pb_block_2_select' => [
			'selector'        => '.pc-wrapbuilder-header-inner',
			'render_callback' => function () {
				load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
			},
		],
	],
);
$options[]          = array(
	'id'        => 'goso_header_pb_block_2_spacing',
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
