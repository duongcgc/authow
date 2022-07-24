<?php
$options   = [];
$options[] = array(
	'default'     => '',
	'sanitize'    => 'goso_sanitize_textarea_field',
	'label'       => 'List Featured Categories',
	'id'          => 'goso_home_featured_cat',
	'description' => 'By default, this option apply only for Homepage Magazine(style 1 and style 2) layout, copy and paste categories slug you want display above Latest Posts here - check <a rel="nofollow" href="https://imgresources.s3.amazonaws.com/magazine-2.png" target="_blank">this image</a> to understand what is categories slug. Example: You want display categories "Life Style, Travel, Music" above Latest Posts, fill categories slug like "life-style, travel, music"',
	'type'        => 'authow-fw-textarea',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Enable Featured Categories for All Homepage Layouts - Not for Magazine Layouts Only',
	'id'       => 'goso_enable_featured_cat_all_layouts',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Move Latest Posts To Above Featured Categories',
	'id'       => 'goso_move_latest_posts_above',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Remove Border Bottom Between Post Items',
	'id'       => 'goso_feacat_rmborder',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Enable Post Meta Overlay Featured Image for Featured Category Style 7',
	'id'       => 'goso_home_featured_cat_overlay7',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Show Thumbnail for Small Posts on Featured Category Style 15',
	'id'       => 'goso_home_thumbnail15',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '60',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Custom Space Between Featured Categories', 'authow' ),
	'id'       => 'goso_featured_cat_margin',
	'ids'         => array(
		'desktop' => 'goso_featured_cat_margin',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '60',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Custom Image Width on Small Posts', 'authow' ),
	'id'       => 'goso_featured_cat_imgwidth',
	'ids'         => array(
		'desktop' => 'goso_featured_cat_imgwidth',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Post Author on Featured Categories',
	'id'       => 'goso_home_featured_cat_author',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Show Post Author on Small Posts',
	'description' => __( 'You can check <a href="https://imgresources.s3.amazonaws.com/small-posts.png" target="_blank">this image</a> to know where is the "Small Posts"', 'authow' ),
	'id'          => 'goso_home_cat_author_sposts',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Post Date on Featured Categories',
	'id'       => 'goso_home_featured_cat_date',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Show Comment Count on Featured Categories',
	'id'       => 'goso_home_featured_cat_comment',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Show Views Count on Featured Categories',
	'id'       => 'goso_home_cat_views',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Reading Time on Featured Categories',
	'id'       => 'goso_home_cat_readtime',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Enable Post Format Icons on Featured Categories',
	'id'       => 'goso_home_featured_cat_icons',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Enable "View All" link for Featured Categories',
	'id'       => 'goso_home_featured_cat_seemore',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Remove arrow on "View All"',
	'id'       => 'goso_home_featured_cat_remove_arrow',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Make "View All" is A Button',
	'id'       => 'goso_home_featured_cat_readmore_button',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => 'left',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Align "View All" Button',
	'id'       => 'goso_home_featured_cat_readmore_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'left'   => esc_html__( 'Left', 'authow' ),
		'center' => esc_html__( 'Center', 'authow' ),
		'right'  => esc_html__( 'Right', 'authow' )
	)
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Remove Posts Excerpt on Featured Categories',
	'id'       => 'goso_home_featured_cat_remove_excerpt',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Disable Autoplay for Sliders on Style 4, 5, 12',
	'id'       => 'goso_home_featured_cat_autoplay',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '5',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Style 1', 'authow' ),
	'id'       => 'goso_home_featured_posts_numbers_1',
	'ids'      => array(
		'desktop' => 'goso_home_featured_posts_numbers_1',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '5',
		),
	),
);
$options[] = array(
	'default'  => '4',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Style 2', 'authow' ),
	'id'       => 'goso_home_featured_posts_numbers_2',
	'ids'      => array(
		'desktop' => 'goso_home_featured_posts_numbers_2',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '4',
		),
	),
);
$options[] = array(
	'default'  => '4',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Style 3', 'authow' ),
	'id'       => 'goso_home_featured_posts_numbers_3',
	'ids'      => array(
		'desktop' => 'goso_home_featured_posts_numbers_3',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '4',
		),
	),
);
$options[] = array(
	'default'  => '6',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Style 4', 'authow' ),
	'id'       => 'goso_home_featured_posts_numbers_4',
	'ids'      => array(
		'desktop' => 'goso_home_featured_posts_numbers_4',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '6',
		),
	),
);
$options[] = array(
	'default'  => '6',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Style 5', 'authow' ),
	'id'       => 'goso_home_featured_posts_numbers_5',
	'ids'      => array(
		'desktop' => 'goso_home_featured_posts_numbers_5',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '6',
		),
	),
);
$options[] = array(
	'default'  => '5',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Style 6', 'authow' ),
	'id'       => 'goso_home_featured_posts_numbers_6',
	'ids'      => array(
		'desktop' => 'goso_home_featured_posts_numbers_6',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '5',
		),
	),
);
$options[] = array(
	'default'  => '6',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Style 7', 'authow' ),
	'id'       => 'goso_home_featured_posts_numbers_7',
	'ids'      => array(
		'desktop' => 'goso_home_featured_posts_numbers_7',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '6',
		),
	),
);
$options[] = array(
	'default'  => '3',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Style 8', 'authow' ),
	'id'       => 'goso_home_featured_posts_numbers_8',
	'ids'      => array(
		'desktop' => 'goso_home_featured_posts_numbers_8',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '3',
		),
	),
);
$options[] = array(
	'default'  => '8',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Style 9', 'authow' ),
	'id'       => 'goso_home_featured_posts_numbers_9',
	'ids'      => array(
		'desktop' => 'goso_home_featured_posts_numbers_9',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '8',
		),
	),
);
$options[] = array(
	'default'  => '6',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Style 10', 'authow' ),
	'id'       => 'goso_home_featured_posts_numbers_10',
	'ids'      => array(
		'desktop' => 'goso_home_featured_posts_numbers_10',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '6',
		),
	),
);
$options[] = array(
	'default'  => '4',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Style 11', 'authow' ),
	'id'       => 'goso_home_featured_posts_numbers_11',
	'ids'      => array(
		'desktop' => 'goso_home_featured_posts_numbers_11',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '4',
		),
	),
);
$options[] = array(
	'default'  => '6',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Style 12', 'authow' ),
	'id'       => 'goso_home_featured_posts_numbers_12',
	'ids'      => array(
		'desktop' => 'goso_home_featured_posts_numbers_12',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '6',
		),
	),
);
$options[] = array(
	'default'  => '6',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Style 13', 'authow' ),
	'id'       => 'goso_home_featured_posts_numbers_13',
	'ids'      => array(
		'desktop' => 'goso_home_featured_posts_numbers_13',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '6',
		),
	),
);
$options[] = array(
	'default'  => '6',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Style 14', 'authow' ),
	'id'       => 'goso_home_featured_posts_numbers_14',
	'ids'      => array(
		'desktop' => 'goso_home_featured_posts_numbers_14',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '6',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Style 15', 'authow' ),
	'id'       => 'goso_home_featured_posts_numbers_15',
	'ids'      => array(
		'desktop' => 'goso_home_featured_posts_numbers_15',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
		),
	),
);

return $options;
