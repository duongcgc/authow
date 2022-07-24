<?php
$sticky_row   = 'top';
$name         = 'Sticky Top';
$section_name = 'goso_header_desktop_sticky_' . $sticky_row . '_section';
$options      = [];
/* Section Settings */
$options[] = array(
	'id'        => "goso_header_sticky_{$sticky_row}_middle_column",
	'default'   => 'disable',
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
	'id'        => "goso_header_sticky_{$sticky_row}_background_img",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-image',
	'label'     => $name . esc_html__( ' Background Image', 'authow' ),
);
$options[] = array(
	'id'        => "goso_header_sticky_{$sticky_row}_content_width",
	'default'   => 'container-normal',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => $name . __( ' Container Width', 'authow' ),
	'choices'   => [
		'container-normal'    => '1170px',
		'container-1400'      => '1400px',
		'container-fullwidth' => 'Fullwidth',
		'container-custom'    => 'Custom Width',
	]
);
$options[] = array(
	'id'        => "goso_header_sticky_{$sticky_row}_content_custom_width",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-size',
	'label'     => $name . __( ' Custom Container Width', 'authow' ),
	'ids'  => array(
		'desktop' => "goso_header_sticky_{$sticky_row}_content_custom_width",
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
	'id'        => "goso_header_sticky_{$sticky_row}_background_color",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-color',
	'label'     => $name . __( ' Background Color', 'authow' ),
);
$options[] = array(
	'id'        => "goso_header_sticky_{$sticky_row}_background_repeat",
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
	'id'        => "goso_header_sticky_{$sticky_row}_background_position",
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
	'id'        => "goso_header_sticky_{$sticky_row}_background_size",
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
	'id'        => "goso_header_sticky_{$sticky_row}_background_attachment",
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
	'id'        => "goso_header_sticky_{$sticky_row}_spacing_setting",
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-box-model',
	'sanitize'  => 'goso_custom_sanitization',
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
	'id'        => "goso_header_sticky_{$sticky_row}_border_setting",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-color',
	'label'     => $name . __( ' Borders Color', 'authow' ),
);
$options[] = array(
	'id'        => "goso_header_sticky_{$sticky_row}_border_style_setting",
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
	'id'        => "goso_header_sticky_{$sticky_row}_text_color_setting",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-color',
	'settings'  => "goso_header_sticky_{$sticky_row}_text_color_setting",
	'label'     => $name . __( ' Text Color', 'authow' ),
);
$options[] = array(
	'id'        => "goso_header_sticky_{$sticky_row}_maxheight_setting",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-size',
	'label'     => $name . esc_html__( ' Max Height', 'authow' ),
	'ids'  => array(
		'desktop' => "goso_header_sticky_{$sticky_row}_maxheight_setting",
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
