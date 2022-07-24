<?php
$options   = [];
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => 'Upload Logo',
	'id'       => 'goso_logo',
	'type'     => 'authow-fw-image',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Set A Max Width for Logo', 'authow' ),
	'id'       => 'goso_logo_max_width',
	'ids'      => array(
		'desktop' => 'goso_logo_max_width',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'id'          => 'goso_logo_height_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Set A Height for Logo Image',
	'id'          => 'goso_logo_height',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'goso_logo_height',
		'mobile'  => 'goso_logo_height_mobile',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'sanitize'    => 'esc_url_raw',
	'label'       => 'Upload Logo for Transparent Header style 6, 9, 10 & 11',
	'id'          => 'goso_upload_transparent_logo',
	'type'        => 'authow-fw-image',
	'description' => 'Important Note: This option apply when you use transparent header only',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'label'       => 'Custom Link for Logo Image',
	'id'          => 'goso_custom_url_logo',
	'description' => 'By default, logo image will link to homepage url. If you want to link the logo for another URL - fill here. Include http:// or https:// on the link',
	'type'        => 'authow-fw-text',
);
$options[] = array(
	'default'         => '40',
	'sanitize'        => 'absint',
	'type'            => 'authow-fw-size',
	'label'           => __( 'Logo Padding Top & Bottom', 'authow' ),
	'sub_description' => __( 'This option does not apply for header layout 6, 9, 10, 11', 'authow' ),
	'id'              => 'goso_header_padding',
	'ids'      => array(
		'desktop' => 'goso_header_padding',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Overflow Logo for Header Layout 10 & 11',
	'id'       => 'goso_overflow_logo',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'absint',
	'type'        => 'authow-fw-size',
	'label'       => __( 'Max Width for Sticky Logo on Header 10 & 11', 'authow' ),
	'description' => __( 'This option just apply when you use overflow logo for header layout 10 & 11', 'authow' ),
	'id'          => 'goso_logo_max_width_overflow',
	'ids'      => array(
		'desktop' => 'goso_logo_max_width_overflow',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);

return $options;
