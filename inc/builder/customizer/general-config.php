<?php
$wp_customize->add_section( 'goso_builder_general_section', array(
	'title'       => __( 'Header Builder', 'authow' ),
	'description' => __( 'You can add new and edit a header builder on <a target="_blank" href="' . esc_url( admin_url( '/edit.php?post_type=goso_builder' ) ) . '">this page</a>.<br>Please check <a href="https://www.youtube.com/watch?v=kUFqsVYyJig&list=PL1PBMejQ2VTwp9ppl8lTQ9Tq7I3FJTT04&index=4" target="_blank">this video tutorial</a> to know how to setup your header builder.', 'authow' ),
	'panel'       => 'goso_logoheader_panel',
	'priority'    => - 1
) );

$wp_customize->add_setting( 'pchdbd_all', array(
	'default'           => '',
	'sanitize_callback' => 'goso_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pchdbd_all', [
	'type'    => 'select',
	'label'   => esc_html__( 'General Header Builder for All Pages', 'authow' ),
	'section' => 'goso_builder_general_section',
	'choices' => goso_builder_header_list(),
] ) );

$wp_customize->add_setting( 'pchdbd_homepage', array(
	'default'           => '',
	'sanitize_callback' => 'goso_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pchdbd_homepage', [
	'type'    => 'select',
	'label'   => esc_html__( 'Header Builder for Homepage', 'authow' ),
	'section' => 'goso_builder_general_section',
	'choices' => goso_builder_header_list(),
] ) );

$wp_customize->add_setting( 'pchdbd_archive', array(
	'default'           => '',
	'sanitize_callback' => 'goso_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pchdbd_archive', [
	'type'    => 'select',
	'label'   => esc_html__( 'Header Builder for Category,Tag, Search, Archive Pages', 'authow' ),
	'section' => 'goso_builder_general_section',
	'choices' => goso_builder_header_list(),
] ) );

$wp_customize->add_setting( 'pchdbd_post', array(
	'default'           => '',
	'sanitize_callback' => 'goso_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pchdbd_post', [
	'type'    => 'select',
	'label'   => esc_html__( 'Header Builder for Single Post Pages', 'authow' ),
	'section' => 'goso_builder_general_section',
	'choices' => goso_builder_header_list(),
] ) );

$wp_customize->add_setting( 'pchdbd_page', array(
	'default'           => '',
	'sanitize_callback' => 'goso_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pchdbd_page', [
	'type'    => 'select',
	'label'   => esc_html__( 'Header Builder for Pages', 'authow' ),
	'section' => 'goso_builder_general_section',
	'choices' => goso_builder_header_list(),
] ) );
