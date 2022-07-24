<?php
$wp_customize->add_section( 'goso_footer_builder_config', array(
	'priority'    => - 1,
	'panel'       => 'goso_footer_section_panel',
	'description' => __( 'You can add new and edit a Footer Template on <a target="_blank" href="' . esc_url( admin_url( '/edit.php?post_type=goso-block' ) ) . '">this page</a>.<br>Please check <a href="https://www.youtube.com/watch?v=kUFqsVYyJig&list=PL1PBMejQ2VTwp9ppl8lTQ9Tq7I3FJTT04&t=809s" target="_blank">this video tutorial</a> to know how to setup your footer builder.', 'authow' ),
	'title'       => esc_html__( 'Footer Builder', 'authow' ),
) );

/* Saved Layout */
$wp_customize->add_setting( 'goso_footer_builder_layout', array(
	'default'           => '',
	'sanitize_callback' => 'goso_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'goso_footer_builder_layout', [
	'type'    => 'select',
	'label'   => esc_html__( 'General Footer Builder for All Pages', 'authow' ),
	'section' => 'goso_footer_builder_config',
	'choices' => goso_builder_block_list(),
] ) );

$wp_customize->add_setting( 'goso_footer_builder_layout_homepage', array(
	'default'           => '',
	'sanitize_callback' => 'goso_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'goso_footer_builder_layout_homepage', [
	'type'    => 'select',
	'label'   => esc_html__( 'Footer Builder for Homepage', 'authow' ),
	'section' => 'goso_footer_builder_config',
	'choices' => goso_builder_block_list(),
] ) );

$wp_customize->add_setting( 'goso_footer_builder_layout_archive', array(
	'default'           => '',
	'sanitize_callback' => 'goso_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'goso_footer_builder_layout_archive', [
	'type'    => 'select',
	'label'   => esc_html__( 'Footer Builder for Category,Tag, Search, Archive Pages', 'authow' ),
	'section' => 'goso_footer_builder_config',
	'choices' => goso_builder_block_list(),
] ) );

$wp_customize->add_setting( 'goso_footer_builder_layout_page', array(
	'default'           => '',
	'sanitize_callback' => 'goso_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'goso_footer_builder_layout_page', [
	'type'    => 'select',
	'label'   => esc_html__( 'Footer Builder for Pages', 'authow' ),
	'section' => 'goso_footer_builder_config',
	'choices' => goso_builder_block_list(),
] ) );

$wp_customize->add_setting( 'goso_footer_builder_layout_post', array(
	'default'           => '',
	'sanitize_callback' => 'goso_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'goso_footer_builder_layout_post', [
	'type'    => 'select',
	'label'   => esc_html__( 'Footer Builder for Single Post Pages', 'authow' ),
	'section' => 'goso_footer_builder_config',
	'choices' => goso_builder_block_list(),
] ) );
