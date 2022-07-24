<?php
$options   = [];
$options[] = array(
	'id'       => "goso_header_overlap_setting",
	'default'  => 'disable',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'disable' => 'No',
		'enable'  => 'Yes',
	],
	'label'    => __( 'Enable Transparent Header( Overlap Header )', 'authow' ),
);
$options[] = array(
	'id'       => "goso_header_wrap_all",
	'default'  => 'disable',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'disable' => 'No',
		'enable'  => 'Yes',
	],
	'label'    => __( 'Enable Boxed Header ?', 'authow' ),
);
$options[] = array(
	'id'        => "goso_header_shadow",
	'default'   => 'disable',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'choices'   => [
		'disable' => 'No',
		'enable'  => 'Yes',
	],
	'label'     => __( 'Enable Header Shadow ?', 'authow' ),
);
$options[] = array(
	'id'        => "goso_header_wrap_width",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'choices'   => [
		'container-normal' => '1170px',
		'container-1400'   => '1400px',
		'container-custom' => 'Custom Width',
	],
	'label'     => __( 'Select Width for Boxed Header', 'authow' ),
);
/*$wp_customize->selective_refresh->add_partial( 'goso_header_overlap_setting', array(
	'selector'            => ".goso_header.goso-header-builder",
	'settings'            => [
		'goso_header_wrap_width',
		'goso_header_shadow',
		'goso_header_overlap_setting'
	],
	'container_inclusive' => true,
	'render_callback'     => function () {
		load_template( get_template_directory() . '/inc/builder/template/desktop-builder.php' );
	},
	'fallback_refresh'    => false,
) );*/
$options[] = array(
	'id'        => "goso_header_wrap_custom_width",
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-size',
	'label'     => __( 'Boxed Header Custom Width', 'authow' ),
	'ids'       => array(
		'desktop' => "goso_header_wrap_custom_width",
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
	'id'        => 'goso_header_spacing_setting',
	'type'      => 'authow-fw-box-model',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_custom_sanitization',
	'label'     => esc_html__( 'Spacing & Borders', 'authow' ),
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
	'id'        => 'goso_header_border_color',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-color',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => __( 'Borders Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_header_border_style',
	'default'   => 'solid',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-select',
	'label'     => __( ' Borders Style', 'authow' ),
	'choices'   => [
		'none'   => 'None',
		'dotted' => 'Dotted',
		'dashed' => 'Dashed',
		'solid'  => 'Solid',
		'double' => 'Double',
	],
);

return $options;
