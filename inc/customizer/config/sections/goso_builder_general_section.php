<?php

$header_options     = [];
$header_options[''] = '- Select -';
$header_layouts     = get_posts( [
	'post_type'      => 'penci_builder',
	'posts_per_page' => - 1,
] );
foreach ( $header_layouts as $header_builder ) {
	$header_options[ $header_builder->post_name ] = $header_builder->post_title;
}
$options   = [];
$options[] = array(
	'id'       => 'pchdbd_all',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'label'    => esc_html__( 'General Header Builder for All Pages', 'authow' ),
	'choices'  => $header_options,
);

$options[] = array(
	'id'       => 'pchdbd_homepage',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'label'    => esc_html__( 'Header Builder for Homepage', 'authow' ),
	'choices'  => $header_options,
);

$options[] = array(
	'id'       => 'pchdbd_archive',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'label'    => esc_html__( 'Header Builder for Category,Tag, Search, Archive Pages', 'authow' ),
	'choices'  => $header_options,
);

$options[] = array(
	'id'       => 'pchdbd_post',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'label'    => esc_html__( 'Header Builder for Single Post Pages', 'authow' ),
	'choices'  => $header_options,
);

$options[] = array(
	'id'       => 'pchdbd_page',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'label'    => esc_html__( 'Header Builder for Pages', 'authow' ),
	'choices'  => $header_options,
);

return $options;
