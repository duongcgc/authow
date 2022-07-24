<?php
$options   = [];
$options[] = array(
	'id'       => 'penci_favicon',
	'sanitize' => 'esc_url_raw',
	'type'     => 'authow-fw-image',
	'label'    => 'Upload Favicon',
);
$options[] = array(
	'default'     => 'horizontal',
	'label'       => 'Featured Images Type:',
	'id'          => 'penci_featured_image_size',
	'description' => 'This feature does not apply for Featured Sliders and some special places. For featured images on category mega menu items, please select option for it via <strong>Customize > Logo & Header</strong>',
	'type'        => 'authow-fw-radio',
	'sanitize'    => 'penci_sanitize_choices_field',
	'choices'     => array(
		'horizontal' => 'Horizontal Size',
		'square'     => 'Square Size',
		'vertical'   => 'Vertical Size',
		'custom'     => 'Custom',
	)
);
$options[] = array(
	'default'     => '',
	'label'       => 'Custom Container Width',
	'id'          => 'penci_custom_container_w',
	'description' => 'Default is 1170px. Minimum is 800px',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'penci_custom_container_w',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 800,
			'max'  => 10000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'     => '',
	'label'       => 'Custom Container Width for Two Sidebars',
	'id'          => 'penci_custom_container2_w',
	'description' => 'Default is 1400px. Minimum is 800px',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'penci_custom_container2_w',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 800,
			'max'  => 10000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'type'        => 'authow-fw-text',
	'label'       => 'Custom Aspect Ratio for Featured Image',
	'id'          => 'penci_general_featured_image_ratio',
	'sanitize'    => 'sanitize_text_field',
	'description' => 'The aspect ratio of an element describes the proportional relationship between its width and its height. E.g: <strong>3:2</strong>. Default is 3:2 . This option apply  for <strong>Featured Images Type is Custom</strong>',
);
$options[] = array(
	'type'        => 'authow-fw-text',
	'label'       => 'Custom Border Radius for Featured Images',
	'id'          => 'penci_image_border_radius',
	'sanitize'    => 'sanitize_text_field',
	'description' => 'Fill value for border radius you want here - You can use pixel or percent. E.g:  <strong>10px</strong>  or  <strong>10%</strong>',
);

$options[] = array(
	'label'    => 'Get Post Views Data From?',
	'id'       => 'penci_general_views_meta',
	'type'     => 'authow-fw-select',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'choices'  => array(
		''       => 'Default - from The Theme',
		'custom' => 'Custom Post Meta Field',
	)
);
$options[] = array(
	'type'        => 'authow-fw-text',
	'label'       => 'Post Views Meta Key',
	'id'          => 'penci_general_views_key',
	'sanitize'    => 'penci_sanitize_choices_field',
	'description' => 'Fill the Post Views Meta Key you want to get post views for your posts here. This option applies when you selected "Get Post Views Data From" is "Custom Post Meta Field"',
);
$options[] = array(
	'type'        => 'authow-fw-text',
	'label'       => 'Set A Default Reading Time Value',
	'id'          => 'penci_readtime_default',
	'description' => __( 'If you want to set a default reading time value, you can put it here. E.g: 3 mins', 'authow' ),
);
$options[] = array(
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'default'  => 'date',
	'label'    => 'Sort Posts By',
	'id'       => 'penci_general_post_orderby',
	'choices'  => array(
		'date'          => 'Published Date',
		'ID'            => 'Post ID',
		'modified'      => 'Modified Date',
		'title'         => 'Post Title',
		'rand'          => 'Random Posts',
		'comment_count' => 'Comment Count'
	)
);
$options[] = array(
	'sanitize' => 'penci_sanitize_choices_field',
	'default'  => 'DESC',
	'label'    => 'Select Posts Order',
	'id'       => 'penci_general_post_order',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'DESC' => 'Descending',
		'ASC'  => 'Ascending '
	)
);
$options[] = array(
	'label'       => 'Use Outline Social Icons Instead of Filled Social Icons for Your Social Media?',
	'description' => __( 'You can check <a href="https://imgresources.s3.amazonaws.com/outline-social.png" target="_blank">this image</a> to understand what difference between outline social icons & filled social icons. Note: some icons doesn\'t support for outline', 'authow' ),
	'id'          => 'penci_outline_social_icon',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'label' => 'Use Outline Social Icons for Social Sharing?',
	'id'    => 'penci_outline_social_share',
	'type'  => 'authow-fw-toggle',
);
$options[] = array(
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Select Separator Icon Between Posts Datas',
	'description' => __( 'You can check <a href="https://imgresources.s3.amazonaws.com/separator-pmeta.png" target="_blank">this image</a> to understand what is "Separator Icon Between Posts Datas".', 'authow' ),
	'id'          => 'penci_separator_post_meta',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		''         => 'Default ( Vertical Line )',
		'horiline' => 'Horizontal Line',
		'circle'   => 'Circle Filled',
		'bcricle'  => 'Circle Bordered',
		'square'   => 'Square Filled',
		'bsquare'  => 'Square Bordered',
		'diamond'  => 'Diamond Square Filled',
		'bdiamond' => 'Diamond Square Bordered',
	)
);
$options[] = array(
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Style for Post Categories Listing',
	'description' => __( 'You can check <a href="https://imgresources.s3.amazonaws.com/cat_design.png" target="_blank">this image</a> to understand Styles for Post Categories Listing. You can change general color for it via General > Colors > Filled Categories Styles.', 'authow' ),
	'id'          => 'penci_catdesign',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		''      => 'Default',
		'fill'  => 'Filled Rectangle',
		'fillr' => 'Filled Round',
		'fillc' => 'Filled Circle',
	)
);
$options[] = array(
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Select Separator Icon Between Categories',
	'description' => __( 'You can check <a href="https://imgresources.s3.amazonaws.com/separator-cat.png" target="_blank">this image</a> to understand what is "Separator Icon Between Categories". It does not apply to Filled styles above.', 'authow' ),
	'id'          => 'penci_separator_cat',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		''         => 'Default ( Diamond Square Bordered )',
		'verline'  => 'Vertical Line',
		'horiline' => 'Horizontal Line',
		'circle'   => 'Circle Filled',
		'bcricle'  => 'Circle Bordered',
		'square'   => 'Square Filled',
		'bsquare'  => 'Square Bordered',
		'diamond'  => 'Diamond Square Filled',
	)
);
$options[] = array(
	'default'  => false,
	'label'    => 'Disable Breadcrumb',
	'id'       => 'penci_disable_breadcrumb',
	'type'     => 'authow-fw-toggle',
	'sanitize' => 'penci_sanitize_checkbox_field',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Display Modified Date Replace with Published Date',
	'id'       => 'penci_show_modified_date',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Select Date Format',
	'id'       => 'penci_date_format',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''        => 'Default ( By Day, Month & Year )',
		'timeago' => 'Time Ago Format',
	)
);
$options[] = array(
	'default'  => 's9',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Style for Blocks Loading Ajax',
	'id'       => 'penci_block_lajax',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		's9' => 'Style 1',
		's2' => 'Style 2',
		's3' => 'Style 3',
		's4' => 'Style 4',
		's5' => 'Style 5',
		's6' => 'Style 6',
		's1' => 'Style 7',
	)
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Smooth Scroll',
	'id'       => 'penci_enable_smooth_scroll',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'label'    => 'Enable Page Navigation Numbers',
	'id'       => 'penci_page_navigation_numbers',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Page Navigation Numbers Alignment',
	'id'       => 'penci_page_navigation_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'align-left'   => 'Left',
		'align-right'  => 'Right',
		'align-center' => 'Center',
	),
	'default'  => 'align-left',
	'sanitize' => 'penci_sanitize_choices_field'
);
$options[] = array(
	'label'    => 'Enable Sticky Sidebar',
	'id'       => 'penci_sidebar_sticky',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Disable Sidebar for BBPress Forums',
	'id'       => 'penci_dis_sidebar_bbforums',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Disable Sidebar for BBPress Forum',
	'id'       => 'penci_dis_sidebar_bbforum',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Disable Sidebar for BBPress Topic',
	'id'       => 'penci_dis_sidebar_bbtoppic',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Show Only Primary Category from "Yoast SEO" or "Rank Math" plugin for Breadcrumb',
	'id'       => 'enable_pri_cat_yoast_seo',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'       => 'Show Primary Category from "Yoast SEO" or "Rank Math" only',
	'description' => __( 'If you don\'t use "Yoast SEO" or "Rank Math" plugin, it will be display the first category on the list categories of the posts.', 'authow' ),
	'id'          => 'penci_show_pricat_yoast_only',
	'type'        => 'authow-fw-toggle',
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Show Primary Category from "Yoast SEO" or "Rank Math" at First ( When you display full categories )',
	'id'       => 'penci_show_pricat_first_yoast',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'       => 'Get the Post Excerpt Length based on Number of Letters',
	'description' => __( 'It can be helps you fix the problems with the excerpt length on Chinese or Japanese languages.', 'authow' ),
	'id'          => 'penci_excerptcharac',
	'type'        => 'authow-fw-toggle',
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field'
);

return $options;
