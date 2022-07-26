<?php
$footer_options     = [];
$footer_options[''] = '- Select -';
$builder_layouts    = get_posts( [
	'post_type'      => 'goso-block',
	'posts_per_page' => - 1,
] );
foreach ( $builder_layouts as $builder_builder ) {
	$footer_options[ $builder_builder->post_name ] = $builder_builder->post_title;
}
$options = [];
/* Saved Layout */
$options[] = array(
	'id'       => 'goso_footer_builder_layout',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'label'    => esc_html__( 'General Footer Builder for All Pages', 'authow' ),
	'choices'  => $footer_options,
);

$options[] = array(
	'id'       => 'goso_footer_builder_layout_homepage',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'label'    => esc_html__( 'Footer Builder for Homepage', 'authow' ),
	'choices'  => $footer_options,
);

$options[] = array(
	'id'       => 'goso_footer_builder_layout_archive',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'label'    => esc_html__( 'Footer Builder for Category,Tag, Search, Archive Pages', 'authow' ),
	'choices'  => $footer_options,
);

$options[] = array(
	'id'       => 'goso_footer_builder_layout_page',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'label'    => esc_html__( 'Footer Builder for Pages', 'authow' ),
	'choices'  => $footer_options,
);

$options[] = array(
	'id'       => 'goso_footer_builder_layout_post',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'label'    => esc_html__( 'Footer Builder for Single Post Pages', 'authow' ),
	'choices'  => $footer_options,
);

return $options;
