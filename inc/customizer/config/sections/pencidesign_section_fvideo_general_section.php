<?php
$options   = [];
$options[] = array(
	'label'    => 'Enable Featured Video Background',
	'id'       => 'penci_enable_featured_video_bg',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);

$options[] = array(
	'label'    => 'Background Image Display Replace Video On Tablet & Mobile',
	'id'       => 'penci_featured_video_img_mobile',
	'sanitize' => 'esc_url_raw',
	'type'     => 'authow-fw-image'
);
$options[] = array(
	'label'    => 'Video Youtube URL',
	'id'       => 'penci_featured_video_url',
	'type'     => 'authow-fw-text',
	'sanitize' => 'esc_url_raw'
);
$options[] = array(
	'label'    => __( 'Featured Video Background Height', 'authow' ),
	'id'       => 'penci_featured_video_height',
	'default'  => '600',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_featured_video_height',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '600',
		),
	),
);
$options[] = array(
	'label'       => __( 'Start Video At', 'authow' ),
	'description' => __( 'Unit is second', 'authow' ),
	'id'          => 'penci_featured_video_start',
	'default'     => '0',
	'sanitize'    => 'absint',
	'type'        => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_featured_video_start',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 's',
			'default'     => '0',
		),
	),
);
$options[] = array(
	'label'    => 'Add Custom Image on Video Background',
	'id'       => 'penci_featured_video_image',
	'sanitize' => 'esc_url_raw',
	'type'     => 'authow-fw-text'
);
$options[] = array(
	'label'    => 'Heading Text On Video Background',
	'id'       => 'penci_featured_video_text_heading',
	'default'  => '',
	'sanitize' => 'penci_sanitize_textarea_field',
	'type'     => 'authow-fw-text'
);
$options[] = array(
	'label'    => 'Sub Heading Text On Video Background',
	'id'       => 'penci_featured_video_sub_heading',
	'type'     => 'authow-fw-textarea',
	'default'  => '',
	'sanitize' => 'penci_sanitize_textarea_field'
);
return $options;
