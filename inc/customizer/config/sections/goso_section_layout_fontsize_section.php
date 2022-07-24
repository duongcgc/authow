<?php
$options   = [];
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Categories', 'authow' ),
	'id'       => 'goso_layout_category_fsize',
	'ids'      => array(
		'desktop' => 'goso_layout_category_fsize',
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
	'description' => '',
	'id'          => 'goso_layout_titlebig_fsize_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
	'default'     => '18',
);
$options[] = array(
	'label'    => 'Font Size for Post Titles on Layouts: Standard, Classic & Overlay',
	'id'       => 'goso_layout_titlebig_fsize',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'default'  => '24',
	'ids'      => array(
		'desktop' => 'goso_layout_titlebig_fsize',
		'mobile'  => 'goso_layout_titlebig_fsize_mobile',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '24',
		),
		'mobile'  => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '18',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'goso_layout_title_fsize_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'    => 'Font Size for Post Titles on Other Layouts',
	'id'       => 'goso_layout_title_fsize',
	'type'     => 'authow-fw-size',
	'default'  => '18',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_layout_title_fsize',
		'mobile'  => 'goso_layout_title_fsize_mobile',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '18',
		),
		'mobile'  => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '16',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Post Meta', 'authow' ),
	'id'       => 'goso_layout_meta_fsize',
	'ids'      => array(
		'desktop' => 'goso_layout_meta_fsize',
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
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Post Excerpt', 'authow' ),
	'id'       => 'goso_layout_excerpt_fsize',
	'ids'      => array(
		'desktop' => 'goso_layout_excerpt_fsize',
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
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for "Continue Reading"/"Read More" Button', 'authow' ),
	'id'       => 'goso_layout_readmore_fsize',
	'ids'      => array(
		'desktop' => 'goso_layout_readmore_fsize',
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
	'default'  => '14',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Like/Share Icons', 'authow' ),
	'id'       => 'goso_layout_sharebox_fsize',
	'ids'      => array(
		'desktop' => 'goso_layout_sharebox_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '14',
		),
	),
);

return $options;
