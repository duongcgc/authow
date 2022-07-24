<?php
$mobile_row   = 'midbar';
$name         = 'Mobile Mid Bar';
$section_name = "goso_header_mobile_{$mobile_row}_setting_section";
/* Section Settings */
$options   = [];
$options[] = array(
	'id'        => "goso_header_mobile_{$mobile_row}_middle_column",
	'default'   => 'enable',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => __( 'Middle Column Position', 'authow' ),
	'choices'   => [
		'disable' => 'Flexible',
		'enable'  => 'Always Center',
	]
);
$options[] = array(
	'id'       => "goso_header_mobile_{$mobile_row}_sticky_setting",
	'default'  => 'enable',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'enable'  => 'Yes',
		'disable' => 'No',
	],
	'label'    => esc_html__( 'Sticky This Row on Scroll Down?', 'authow' ),
);
$options[] = array(
	'id'        => "goso_header_mobile_{$mobile_row}_background_img",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-image',
	'label'     => $name . esc_html__( ' Background Image', 'authow' ),
);
$options[] = array(
	'id'        => "goso_header_mobile_{$mobile_row}_background_color",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-color',
	'label'     => $name . __( ' Background Color', 'authow' ),
);
$options[] = array(
	'id'        => "goso_header_mobile_{$mobile_row}_background_repeat",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => $name . __( ' Background Repeat', 'authow' ),
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
	'id'        => "goso_header_mobile_{$mobile_row}_background_position",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => $name . __( ' Background Position', 'authow' ),
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
	'id'        => "goso_header_mobile_{$mobile_row}_background_size",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => $name . __( ' Background Size', 'authow' ),
	'choices'   => [
		'auto'    => 'auto',
		'length'  => 'length',
		'cover'   => 'cover',
		'contain' => 'contain',
		'initial' => 'initial',
		'inherit' => 'inherit'
	]
);
$options[] = array(
	'id'        => "goso_header_mobile_{$mobile_row}_background_attachment",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => $name . __( ' Background Attachment', 'authow' ),
	'choices'   => [
		'scroll'  => 'scroll',
		'fixed'   => 'fixed',
		'local'   => 'local',
		'initial' => 'initial',
		'inherit' => 'inherit'
	]
);
$options[] = array(
	'id'        => "goso_header_mobile_{$mobile_row}_spacing_setting",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_custom_sanitization',
	'type'      => 'authow-fw-box-model',
	'label'     => esc_html__( ' Spacing & Borders', 'authow' ),
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
$options[] = array(
	'id'        => "goso_header_mobile_{$mobile_row}_border_setting",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-color',
	'label'     => $name . __( ' Borders Color', 'authow' ),
);
$options[] = array(
	'id'        => "goso_header_mobile_{$mobile_row}_border_style_setting",
	'default'   => 'solid',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => $name . __( ' Borders Style', 'authow' ),
	'choices'   => [
		'dotted' => 'Dotted',
		'dashed' => 'Dashed',
		'solid'  => 'Solid',
		'double' => 'Double',
	],
);
$options[] = array(
	'id'        => "goso_header_mobile_{$mobile_row}_text_color_setting",
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-color',
	'sanitize'  => 'goso_sanitize_choices_field',
	'settings'  => "goso_header_mobile_{$mobile_row}_text_color_setting",
	'label'     => $name . __( ' Text Color', 'authow' ),
);
$options[] = array(
	'id'        => "goso_header_mobile_{$mobile_row}_maxheight_setting",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-text',
	'settings'  => "goso_header_mobile_{$mobile_row}_maxheight_setting",
	'label'     => $name . esc_html__( ' Max Height', 'authow' ),
);

return $options;
