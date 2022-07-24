<?php
$options   = [];
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Icon Post Format',
	'id'       => 'goso_grid_icon_format',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Display Post Meta Overlay Featured Image',
	'id'          => 'goso_grid_meta_overlay',
	'description' => 'This option just apply for Grid Posts & Masonry Posts',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Enable Uppercase on Post Categories',
	'id'       => 'goso_grid_uppercase_cat',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Turn Off Uppercase on Post Title',
	'id'       => 'goso_grid_off_title_uppercase',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Enable Click on Posts Thumbnail to Play Video',
	'description' => 'This option only apply for video posts format - supports only for Youtube & Vimeo',
	'id'          => 'goso_grid_lightbox_video',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Remove Letter Spacing on Post Titles',
	'id'       => 'goso_grid_off_letter_spacing',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Do Not Crop Images on List Layouts',
	'id'          => 'goso_grid_nocrop_list',
	'description' => 'This option does not apply for gallery posts format',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Share Box',
	'id'       => 'goso_grid_share_box',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Remove Borders Left & Right on Share Box',
	'id'       => 'goso_grid_share_rmbd',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Category',
	'id'       => 'goso_grid_cat',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Post Author',
	'id'       => 'goso_grid_author',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Post Date',
	'id'       => 'goso_grid_date',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Show Views Count',
	'id'       => 'goso_grid_countviews',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Comment Count on Mixed & Overlay Posts',
	'id'       => 'goso_grid_comment',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Show Comment Count on Grid, Masonry, List, Boxed, Photography Posts',
	'id'       => 'goso_grid_comment_other',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Reading Time',
	'id'       => 'goso_grid_readingtime',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Remove Line Above Post Excerpt',
	'id'       => 'goso_grid_remove_line',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Remove Post Excerpt',
	'id'       => 'goso_grid_remove_excerpt',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Add "Read more" button link',
	'id'       => 'goso_grid_add_readmore',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Remove arrow on "Read more"',
	'id'       => 'goso_grid_remove_arrow',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Make "Read more" is A Button',
	'id'       => 'goso_grid_readmore_button',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Remove Border Bottom on List Posts',
	'id'       => 'goso_grid_rmbd_bottom',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Header Alignment',
	'description' => __( 'This option does not apply for Overlay, Photography, Boxed 2 Styles', 'authow' ),
	'id'          => 'goso_grihead_align',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		''       => esc_html__( 'Default', 'authow' ),
		'left'   => esc_html__( 'Left', 'authow' ),
		'center' => esc_html__( 'Center', 'authow' ),
		'right'  => esc_html__( 'Right', 'authow' ),
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Post Excerpt Alignment',
	'id'       => 'goso_griexc_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''        => esc_html__( 'Default', 'authow' ),
		'left'    => esc_html__( 'Left', 'authow' ),
		'center'  => esc_html__( 'Center', 'authow' ),
		'right'   => esc_html__( 'Right', 'authow' ),
		'justify' => esc_html__( 'Justify', 'authow' ),
	)
);
$options[] = array(
	'default'  => 'left',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Align "Read more" Button',
	'id'       => 'goso_grid_readmore_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'left'   => esc_html__( 'Left', 'authow' ),
		'center' => esc_html__( 'Center', 'authow' ),
		'right'  => esc_html__( 'Right', 'authow' )
	)
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Share Box Alignment',
	'description' => __( 'This option does apply for some Post Styles, not all', 'authow' ),
	'id'          => 'goso_grishare_align',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		''       => esc_html__( 'Default', 'authow' ),
		'left'   => esc_html__( 'Left', 'authow' ),
		'center' => esc_html__( 'Center', 'authow' ),
		'right'  => esc_html__( 'Right', 'authow' ),
	)
);
$options[] = array(
	'default'  => '30',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Excerpt Length', 'authow' ),
	'id'       => 'goso_post_excerpt_length',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_post_excerpt_length',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '30',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Image Width on List Posts', 'authow' ),
	'id'       => 'goso_img_listwidth',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_img_listwidth',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '%',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Image Width on Small List Posts', 'authow' ),
	'id'       => 'goso_img_slistwidth',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_img_slistwidth',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '%',
		),
	),
);

return $options;
