<?php
/* Header Sticky */
$options   = [];
$options[] = array(
	'id'       => 'goso_header_desktop_sticky_shadow',
	'default'  => 'enable',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => esc_attr__( 'Enable Sticky Shadow ?', 'authow' ),
	'section'  => 'goso_header_desktop_sticky_section',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'disable' => 'No',
		'enable'  => 'Yes',
	]
);

$options[] = array(
	'id'       => 'goso_header_desktop_sticky_hide_down',
	'default'  => 'disable',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => esc_attr__( 'Hide When Scrolling Down', 'authow' ),
	'section'  => 'goso_header_desktop_sticky_section',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'disable' => 'No',
		'enable'  => 'Yes',
	]
);

$options[] = array(
	'id'       => "goso_header_desktop_sticky_wrap_all",
	'default'  => 'disable',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'disable' => 'No',
		'enable'  => 'Yes',
	],
	'label'    => __( 'Enable Boxed Header Sticky ?', 'authow' ),
	'section'  => 'goso_header_desktop_sticky_section',
);

$options[] = array(
	'id'        => "goso_header_desktop_sticky_wrap_width",
	'default'   => 'container-fullwidth',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'choices'   => [
		'container-normal' => '1170px',
		'container-1400'   => '1400px',
		'container-custom' => 'Custom Width',
	],
	'label'     => __( 'Select Width for Boxed Header', 'authow' ),
	'section'   => 'goso_header_desktop_sticky_section',
);

$options[] = array(
	'id'        => "goso_header_desktop_sticky_wrap_custom_width",
	'default'   => '',
	'type'      => 'authow-fw-size',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'label'     => __( 'Boxed Header Custom Width', 'authow' ),
	'section'   => 'goso_header_desktop_sticky_section',
	'ids'       => array(
		'desktop' => "goso_header_desktop_sticky_wrap_custom_width",
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
	'id'        => 'goso_header_desktop_sticky_spacing_setting',
	'type'      => 'authow-fw-box-model',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_custom_sanitization',
	'label'     => esc_html__( 'Spacing & Borders', 'authow' ),
	'section'   => 'goso_header_desktop_sticky_section',
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
	'id'        => 'goso_header_sticky_border_color',
	'default'   => '',
	'type'      => 'authow-fw-color',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => __( 'Borders Color', 'authow' ),
	'section'   => 'goso_header_desktop_sticky_section',
);

$options[] = array(
	'id'        => 'goso_header_sticky_border_style',
	'default'   => 'solid',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => __( ' Borders Style', 'authow' ),
	'section'   => 'goso_header_desktop_sticky_section',
	'choices'   => [
		'none'   => 'None',
		'dotted' => 'Dotted',
		'dashed' => 'Dashed',
		'solid'  => 'Solid',
		'double' => 'Double',
	],
);

return $options;
