<?php
$options   = [];
$options[] = array(
	'label'    => __( 'Font Size for Categories on Slider', 'authow' ),
	'id'       => 'goso_fslider_cat_fsize',
	'ids' => [
		'desktop' => 'goso_fslider_cat_fsize'
	],
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'choices'     => array(
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
	'label'    => __( 'Font Size for Post Meta', 'authow' ),
	'id'       => 'goso_fslider_meta_fsize',
	'default'  => '13',
	'type'     => 'authow-fw-size',
	'ids' => [
		'desktop' => 'goso_fslider_meta_fsize'
	],
	'sanitize' => 'absint',
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'     => '13',
		),
	),
);
$options[] = array(
	'label'    => __( 'Font Size for Post Titles', 'authow' ),
	'id'       => 'goso_fslider_title_fsize',
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'ids' => [
		'desktop' => 'goso_fslider_title_fsize'
	],
	'choices'     => array(
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
	'label'    => __( 'Font Size for Post Titles on Small Posts', 'authow' ),
	'id'       => 'goso_fslider_smalltitle_fsize',
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'ids' => [
		'desktop' => 'goso_fslider_smalltitle_fsize'
	],
	'choices'     => array(
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
	'label'       => __( 'Font Size for Post Titles on Tiny Posts', 'authow' ),
	'description' => __( 'You can see Tiny Posts on Style 22, 23, 24', 'authow' ),
	'id'          => 'goso_fslider_tinytitle_fsize',
	'default'     => '',
	'sanitize'    => 'absint',
	'type'        => 'authow-fw-size',
	'ids' => [
		'desktop' => 'goso_fslider_tinytitle_fsize',
	],
	'choices'     => array(
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
	'label'    => __( 'Font Size for Post Titles on Mobile', 'authow' ),
	'id'       => 'goso_fslider_title_fsize_mobile',
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'ids' => [
		'desktop' => 'goso_fslider_title_fsize_mobile',
	],
	'choices'     => array(
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
	'label'    => __( 'Font Size for Post Titles on Small Posts on Mobile', 'authow' ),
	'id'       => 'goso_fslider_small_fsize_mobile',
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'ids' => [
		'desktop' => 'goso_fslider_small_fsize_mobile',
	],
	'choices'     => array(
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
	'label'    => __( 'Font Size for Excerpt on Style 35, 36, 38', 'authow' ),
	'id'       => 'goso_fslider_excerpt_fsize',
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'ids' => [
		'desktop' => 'goso_fslider_excerpt_fsize',
	],
	'choices'     => array(
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
	'label'    => __( 'Font Size for Button on Style 29, 30, 35, 36, 38', 'authow' ),
	'id'       => 'goso_fslider_button_fsize',
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'ids' => [
		'desktop' => 'goso_fslider_button_fsize',
	],
	'choices'     => array(
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
	'label'       => esc_html__( 'Goso Slider Style 1 & 2', 'authow' ),
	'description' => 'Goso Slider is a Custom Slider - it does not based on Posts. So, you can pick any image & text & URL on each slide.<br>Check a demo for Goso Slider <a target="_blank" href="https://authow.gosodesign.net/authow-hipster/?slider=style-31">here</a>',
	'id'          => 'goso_pslider_fsize_heading',
	'type'        => 'authow-fw-header',
	'sanitize'    => 'sanitize_text_field'
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'goso_pslider_title_fsize',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Titles on Goso Slider',
	'id'          => 'goso_pslider_title_fsize',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'goso_pslider_title_fsize',
		'mobile'  => 'goso_pslider_title_fsize_mobile',
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
	'label'       => '',
	'description' => '',
	'id'          => 'goso_pslider_caption_fsize',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Caption on Goso Slider',
	'id'          => 'goso_pslider_caption_fsize',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'goso_pslider_caption_fsize',
		'mobile'  => 'goso_pslider_caption_fsize_mobile',
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
	'label'       => '',
	'description' => '',
	'id'          => 'goso_pslider_button_fsize_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Button on Goso Slider',
	'id'          => 'goso_pslider_button_fsize',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'goso_pslider_button_fsize',
		'mobile'  => 'goso_pslider_button_fsize_mobile',
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
return $options;
