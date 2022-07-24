<?php
$options   = [];
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Featured Boxes', 'authow' ),
	'id'       => 'penci_section_featured_boxes_cheading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Text on Featured Boxes', 'authow' ),
	'id'       => 'penci_home_box_text_size',
	'ids'      => array(
		'desktop' => 'penci_home_box_text_size',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '14',
		),
	),
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Popular Posts', 'authow' ),
	'id'       => 'penci_section_popular_cheading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for "Popular Posts" heading', 'authow' ),
	'id'       => 'penci_home_polular_fsectitle',
	'ids'      => array(
		'desktop' => 'penci_home_polular_fsectitle',
		'mobile'  => 'penci_home_polular_mfsectitle',
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
			'default' => '14',
		),
	),
);
$options[] = array(
	'id'       => 'penci_home_polular_mfsectitle',
	'default'  => '14',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-hidden',
	'label'    => __( 'Font Size for "Popular Posts" heading', 'authow' ),
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Post Titles on Popular Posts', 'authow' ),
	'id'       => 'penci_home_popular_post_font_size',
	'ids'      => array(
		'desktop' => 'penci_home_popular_post_font_size',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '14',
		),
	),
);
$options[] = array(
	'default'  => '13',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Post Date on Popular Posts', 'authow' ),
	'id'       => 'penci_home_popular_post_fdate',
	'ids'      => array(
		'desktop' => 'penci_home_popular_post_fdate',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '13',
		),
	),
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Home Title Box', 'authow' ),
	'id'       => 'penci_section_home_titlebox_cheading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Home Title Box', 'authow' ),
	'id'       => 'penci_featured_cat_size',
	'ids'      => array(
		'desktop' => 'penci_featured_cat_size',
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
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Featured Categories', 'authow' ),
	'id'       => 'penci_section_featured_cat_cheading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Categories on Style 8', 'authow' ),
	'id'       => 'penci_featuredcat_cat_size',
	'ids'      => array(
		'desktop' => 'penci_featuredcat_cat_size',
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
	'default'     => '13',
	'sanitize'    => 'absint',
	'type'        => 'authow-fw-size',
	'label'       => __( 'Font Size for Post Meta', 'authow' ),
	'description' => __( 'Include author name, date, comment count', 'authow' ),
	'id'          => 'penci_featuredcat_meta_size',
	'ids'         => array(
		'desktop' => 'penci_featuredcat_meta_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '13',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Post Excerpt', 'authow' ),
	'id'       => 'penci_featuredcat_excerpt_size',
	'ids'      => array(
		'desktop' => 'penci_featuredcat_excerpt_size',
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
	'id'          => 'penci_featuredcat_title_size_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'    => 'General Font Size for Post Titles',
	'id'       => 'penci_featuredcat_title_size',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'penci_featuredcat_title_size',
		'mobile'  => 'penci_featuredcat_title_size_mobile',
	),
	'choices'  => array(
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
	'id'          => 'penci_featuredcat_smtitle_size',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'    => 'Font Size for Post Titles on Small Posts',
	'id'       => 'penci_featuredcat_smtitle_size_mobile',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'penci_featuredcat_smtitle_size_mobile',
		'mobile'  => 'penci_featuredcat_smtitle_size',
	),
	'choices'  => array(
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
	'id'          => 'penci_featuredcat4_title_size_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'    => 'Font Size for Post Titles on Style 4',
	'id'       => 'penci_featuredcat4_title_size',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'penci_featuredcat4_title_size',
		'mobile'  => 'penci_featuredcat4_title_size_mobile',
	),
	'choices'  => array(
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
	'id'          => 'penci_featuredcat12_title_size_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'    => 'Font Size for Post Titles on Style 12 & 13',
	'id'       => 'penci_featuredcat12_title_size',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'penci_featuredcat12_title_size',
		'mobile'  => 'penci_featuredcat12_title_size_mobile',
	),
	'choices'  => array(
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
	'id'          => 'penci_featuredcat14_ftitle_size_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'    => 'Font Size for Post Titles on First Post on Style 14',
	'id'       => 'penci_featuredcat14_ftitle_size',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'penci_featuredcat14_ftitle_size',
		'mobile'  => 'penci_featuredcat14_ftitle_size_mobile',
	),
	'choices'  => array(
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
	'id'          => 'penci_featuredcat14_title_size_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'    => 'Font Size for Post Titles on Other Posts on Style 14',
	'id'       => 'penci_featuredcat14_title_size',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'penci_featuredcat14_title_size',
		'mobile'  => 'penci_featuredcat14_title_size_mobile',
	),
	'choices'  => array(
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
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for "View All" Button', 'authow' ),
	'id'       => 'penci_featuredcat_viewall_size',
	'ids'      => array(
		'desktop' => 'penci_featuredcat_viewall_size',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 300,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);

return $options;
