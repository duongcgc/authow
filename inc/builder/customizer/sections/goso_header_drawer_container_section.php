<?php
/* Sidebar Section */
$mobile_sidebar_section = 'goso_header_drawer_container_section';
$options[]              = array(
	'id'        => "goso_header_mobile_sidebar_background_img",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-image',
	'label'     => esc_html__( 'Mobile Sidebar Background Image', 'authow' ),
);
$options[]              = array(
	'id'        => "goso_header_mobile_sidebar_background_color",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Mobile Sidebar Background Color', 'authow' ),
);
$options[]              = array(
	'id'        => "goso_header_mobile_sidebar_background_repeat",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => __( 'Mobile Sidebar Background Repeat', 'authow' ),
	'choices'   => [
		'repeat'    => 'repeat',
		'repeat-x'  => 'repeat-x',
		'repeat-y'  => 'repeat-y',
		'no-repeat' => 'no-repeat',
		'initial'   => 'initial',
		'inherit'   => 'inherit'
	]
);
$options[]              = array(
	'id'        => "goso_header_mobile_sidebar_background_position",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => __( 'Mobile Sidebar Background Position', 'authow' ),
	'choices'   => [
		'left top'      => 'left top',
		'left center'   => 'left center',
		'left bottom'   => 'left bottom',
		'right top'     => 'right top',
		'right center'  => 'right center',
		'right bottom'  => 'right bottom',
		'center top'    => 'center top',
		'center center' => 'center center',
		'center bottom' => 'center bottom',
	]
);
$options[]              = array(
	'id'        => "goso_header_mobile_sidebar_background_size",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => __( 'Mobile Sidebar Background Size', 'authow' ),
	'choices'   => [
		'auto'    => 'auto',
		'length'  => 'length',
		'cover'   => 'cover',
		'contain' => 'contain',
		'initial' => 'initial',
		'inherit' => 'inherit'
	]
);
$options[]              = array(
	'id'        => "goso_header_mobile_sidebar_background_attachment",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => __( 'Mobile Sidebar Background Attachment', 'authow' ),
	'choices'   => [
		'scroll'  => 'scroll',
		'fixed'   => 'fixed',
		'local'   => 'local',
		'initial' => 'initial',
		'inherit' => 'inherit'
	]
);
$options[]              = array(
	'id'        => "goso_header_mobile_sidebar_spacing_setting",
	'default'   => '',
	'type'      => 'authow-fw-box-model',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_custom_sanitization',
	'label'     => esc_html__( 'Spacing & Borders', 'authow' ),
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
		'border'  => array(
			'border-top'    => '',
			'border-right'  => '',
			'border-bottom' => '',
			'border-left'   => '',
		),
	),
);
$options[]              = array(
	'id'        => "goso_header_mobile_sidebar_border_setting",
	'type'      => 'authow-fw-color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => __( ' Mobile Sidebar Borders Color', 'authow' ),
);
$options[]              = array(
	'id'        => "goso_header_mobile_sidebar_border_style_setting",
	'default'   => 'solid',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => __( ' Mobile Sidebar Borders Style', 'authow' ),
	'choices'   => [
		'dotted' => 'Dotted',
		'dashed' => 'Dashed',
		'solid'  => 'Solid',
		'double' => 'Double',
	],
);
$options[]              = array(
	'id'        => "goso_header_mobile_sidebar_text_color_setting",
	'type'      => 'authow-fw-color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'settings'  => "goso_header_mobile_sidebar_text_color_setting",
	'label'     => __( 'General Text Color', 'authow' ),
);
$options[]              = array(
	'id'        => "goso_header_mobile_sidebar_link_color_setting",
	'default'   => '',
	'type'      => 'authow-fw-color',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => __( ' Mobile Sidebar Link Color', 'authow' ),
);
$options[]              = array(
	'id'        => "goso_header_mobile_sidebar_link_hv_color_setting",
	'default'   => '',
	'type'      => 'authow-fw-color',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => __( ' Mobile Sidebar Link Hover Color', 'authow' ),
);

return $options;
