<?php
$area          = 'bottombar';
$name          = 'Bottom Bar';
$area_settings = $area;
$default_width = 'container-normal';
$section_name  = "goso_header_{$area_settings}_setting_section";

/* Section Settings */
$options   = [];
$options[] = array(
	'id'              => "goso_header_{$area}_middle_column",
	'default'         => 'disable',
	'transport'       => 'postMessage',
	'sanitize'        => 'goso_sanitize_choices_field',
	'type'            => 'authow-fw-select',
	'label'           => __( 'Middle Column Position', 'authow' ),
	'section'         => $section_name,
	'choices'         => [
		'disable' => 'Flexible',
		'enable'  => 'Always Center',
	],
	'partial_refresh' => [
		"goso_header_{$area}_middle_column" => [
			'selector'        => '.goso-desktop-bottombar',
			'render_callback' => 'goso_hb_element_desktop_' . str_replace( 'bar', '', $area ) . '_preview_render',
		],
	],
);

$options[] = array(
	'id'        => "goso_header_{$area}_content_width",
	'default'   => $default_width,
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => $name . __( ' Container Width', 'authow' ),
	'section'   => $section_name,
	'choices'   => [
		'container-normal'    => '1170px',
		'container-1400'      => '1400px',
		'container-fullwidth' => 'Fullwidth',
		'container-custom'    => 'Custom Width',
	]
);

$options[] = array(
	'id'        => "goso_header_{$area}_content_custom_width",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-size',
	'label'     => $name . __( ' Custom Container Width', 'authow' ),
	'section'   => $section_name,
	'ids'  => array(
		'desktop' => "goso_header_{$area}_content_custom_width",
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 9999,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);

$options[] = array(
	'id'        => "goso_header_{$area}_background_img",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-image',
	'label'     => $name . esc_html__( ' Background Image', 'authow' ),
	'section'   => $section_name,
);

$options[] = array(
	'id'        => "goso_header_{$area}_background_color",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-color',
	'label'     => $name . __( ' Background Color', 'authow' ),
	'section'   => $section_name,
);

$options[] = array(
	'id'        => "goso_header_{$area}_transparent_background_color",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => __( 'Enable Transparent Background Color ?', 'authow' ),
	'section'   => $section_name,
	'type'      => 'authow-fw-select',
	'choices'   => [
		'enable'  => 'Yes',
		'disable' => 'No',
	]
);

$options[] = array(
	'id'        => "goso_header_{$area}_background_repeat",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => $name . __( ' Background Repeat', 'authow' ),
	'section'   => $section_name,
	'choices'   => [
		'repeat'    => 'repeat',
		'repeat-x'  => 'repeat-x',
		'repeat-y'  => 'repeat-y',
		'no-repeat' => 'no-repeat',
		'initial'   => 'initial',
		'inherit'   => 'inherit'
	]
);

$options[] = array(
	'id'        => "goso_header_{$area}_background_position",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => $name . __( ' Background Position', 'authow' ),
	'section'   => $section_name,
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

$options[] = array(
	'id'        => "goso_header_{$area}_background_size",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => $name . __( ' Background Size', 'authow' ),
	'section'   => $section_name,
	'choices'   => [
		'auto'    => 'auto',
		'length'  => 'length',
		'cover'   => 'cover',
		'contain' => 'contain',
		'initial' => 'initial',
		'inherit' => 'inherit',
	]
);

$options[] = array(
	'id'        => "goso_header_{$area}_background_attachment",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => $name . __( ' Background Attachment', 'authow' ),
	'section'   => $section_name,
	'choices'   => [
		'scroll'  => 'scroll',
		'fixed'   => 'fixed',
		'local'   => 'local',
		'initial' => 'initial',
		'inherit' => 'inherit'
	]
);

$options[] = array(
	'id'        => "goso_header_{$area}_spacing_setting",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_custom_sanitization',
	'type'      => 'authow-fw-box-model',
	'label'     => esc_html__( 'Spacing & Borders', 'authow' ),
	'section'   => $section_name,
	'choices'   => array(
		'margin'        => array(
			'margin-top'    => '',
			'margin-right'  => '',
			'margin-bottom' => '',
			'margin-left'   => '',
		),
		'padding'       => array(
			'padding-top'    => '',
			'padding-right'  => '',
			'padding-bottom' => '',
			'padding-left'   => '',
		),
		'border'        => array(
			'border-top'    => '',
			'border-right'  => '',
			'border-bottom' => '',
			'border-left'   => '',
		),
		'border-radius' => array(
			'border-radius-top'    => '',
			'border-radius-right'  => '',
			'border-radius-bottom' => '',
			'border-radius-left'   => '',
		),
	),
);

$options[] = array(
	'id'        => "goso_header_{$area}_border_setting",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-color',
	'label'     => $name . __( ' Borders Color', 'authow' ),
	'section'   => $section_name,
);

$options[] = array(
	'id'        => "goso_header_{$area}_border_style_setting",
	'default'   => 'solid',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => $name . __( ' Borders Style', 'authow' ),
	'section'   => $section_name,
	'choices'   => [
		'none'   => 'None',
		'dotted' => 'Dotted',
		'dashed' => 'Dashed',
		'solid'  => 'Solid',
		'double' => 'Double',
	],
);

$options[] = array(
	'id'        => "goso_header_{$area}_text_color_setting",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-color',
	'settings'  => "goso_header_{$area}_text_color_setting",
	'label'     => __( 'General Text Color', 'authow' ),
	'section'   => $section_name,
);

$options[] = array(
	'id'        => "goso_header_{$area}_maxheight_setting",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-size',
	'label'     => $name . esc_html__( ' Max Height', 'authow' ),
	'section'   => $section_name,
	'ids'  => array(
		'desktop' => "goso_header_{$area}_maxheight_setting",
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 9999,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);

return $options;
