<?php
$options   = [];
$options[] = array(
	'default'  => 'standard',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Homepage Layout',
	'id'       => 'penci_home_layout',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'standard'         => 'Standard Posts',
		'classic'          => 'Classic Posts',
		'overlay'          => 'Overlay Posts',
		'featured'         => 'Featured Boxed Posts',
		'grid'             => 'Grid Posts',
		'grid-2'           => 'Grid 2 Columns Posts',
		'masonry'          => 'Grid Masonry Posts',
		'masonry-2'        => 'Grid Masonry 2 Columns Posts',
		'list'             => 'List Posts',
		'small-list'       => 'Small List Posts',
		'boxed-1'          => 'Boxed Posts Style 1',
		'boxed-2'          => 'Boxed Posts Style 2',
		'mixed'            => 'Mixed Posts',
		'mixed-2'          => 'Mixed Posts Style 2',
		'mixed-3'          => 'Mixed Posts Style 3',
		'mixed-4'          => 'Mixed Posts Style 4',
		'photography'      => 'Photography Posts',
		'magazine-1'       => 'Magazine Style 1',
		'magazine-2'       => 'Magazine Style 2',
		'standard-grid'    => '1st Standard Then Grid',
		'standard-grid-2'  => '1st Standard Then Grid 2 Columns',
		'standard-list'    => '1st Standard Then List',
		'standard-boxed-1' => '1st Standard Then Boxed',
		'classic-grid'     => '1st Classic Then Grid',
		'classic-grid-2'   => '1st Classic Then Grid 2 Columns',
		'classic-list'     => '1st Classic Then List',
		'classic-boxed-1'  => '1st Classic Then Boxed',
		'overlay-grid'     => '1st Overlay Then Grid',
		'overlay-list'     => '1st Overlay Then List'
	)
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'label'       => 'Custom Heading Title of Latest Posts Section',
	'id'          => 'penci_home_title',
	'description' => 'You can check <a href="https://imgresources.s3.amazonaws.com/heading-title-latest-posts.png" target="_blank">this image</a> to know what\'s "Heading Title of Latest Posts Section".<br>If you want hide it, let empty this option',
	'type'        => 'authow-fw-text',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => 'Exclude specific categories from latest posts on Homepage',
	'id'          => 'penci_home_exclude_cat',
	'description' => 'Example: if you do not want all posts in categories: Fashion, Life Style show on your latest posts on homepage. You can fill slug of the categories here: fashion, life-style. You can see <a rel="nofollow" href="https://pencidesign.net/authow/authow-document/assets/images/magazine-2.png" target="_blank">this image</a> to understand what is slug',
	'type'        => 'authow-fw-textarea',
);
$options[] = array(
	'default'  => '10',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Shown Per Page on Homepage', 'authow' ),
	'id'       => 'penci_home_lastest_posts_numbers',
	'ids'         => array(
		'desktop' => 'penci_home_lastest_posts_numbers',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '10',
		),
	),
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Latest Posts On Homepage',
	'id'       => 'penci_hide_latest_post_homepage',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Load More Button on Homepage',
	'id'       => 'penci_page_navigation_ajax',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Infinite Scroll on Homepage',
	'id'       => 'penci_page_navigation_scroll',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '6',
	'sanitize' => 'absint',
	'label'    => __( 'Number of Posts for Each Time Load More Posts', 'authow' ),
	'id'       => 'penci_number_load_more',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_number_load_more',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '6',
		),
	),
);
$options[] = array(
	'default'  => true,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Sidebar On Homepage',
	'id'       => 'penci_sidebar_home',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Left Sidebar On Homepage',
	'id'       => 'penci_left_sidebar_home',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Two Sidebars On Homepage',
	'id'       => 'penci_two_sidebar_home',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => 'Add Meta Description for Homepage',
	'description' => __( 'If you\'re using a SEO plugin, maybe it already added a meta description. So, you don\'t need to use this option anymore.', 'authow' ),
	'id'          => 'penci_home_metadesc',
	'type'        => 'authow-fw-textarea',
);
$options[] = array(
	'default'     => 'main-sidebar',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Sidebar for Homepage',
	'id'          => 'penci_sidebar_name_home',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar',
	'type'        => 'authow-fw-select',
	'choices'     => get_list_custom_sidebar_option()
);
$options[] = array(
	'default'     => 'main-sidebar-left',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Sidebar Left for Homepage',
	'id'          => 'penci_sidebar_left_name_home',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar Left. This option just use when you enable 2 sidebars for Homepage',
	'type'        => 'authow-fw-select',
	'choices'     => get_list_custom_sidebar_option()
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'label'       => 'Add More &lt;H1&gt; Tag for Homepage',
	'id'          => 'penci_home_h1content',
	'description' => 'Write content for &lt;H1&gt; tag here',
	'type'        => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'In-Feed Ads on Latest Posts', 'authow' ),
	'id'       => 'penci_heading_infeed_ads_home',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '3',
	'sanitize' => 'absint',
	'label'    => __( 'Insert In-feed Ads Code After Every How Many Posts?', 'authow' ),
	'id'       => 'penci_infeedads_home_num',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_infeedads_home_num',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '3',
		),
	),
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => 'In-feed Ads Code/HTML',
	'description' => __( 'Please use normal responsive ads here to get the best results - the in-feed ads can\'t work with auto-ads because auto-ads will randomly place your ads on random places on the pages.', 'authow' ),
	'id'          => 'penci_infeedads_home_code',
	'type'        => 'authow-fw-textarea',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'In-feed Ads Layout Type',
	'id'       => 'penci_infeedads_home_layout',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''     => 'Follow Current Layout',
		'full' => 'Full Width',
	)
);

return $options;
