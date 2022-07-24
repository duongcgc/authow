<?php
$options   = [];
$options[] = array(
	'id'       => 'goso_header_pb_news_ticker_text',
	'default'  => esc_html__( 'Top Posts', 'authow' ),
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-text',
	'label'    => esc_html__( 'Custom "Top Posts" Text', 'authow' ),
	'desc'     => esc_html__( 'If you want hide Top Posts text, let empty this', 'authow' ),
);
$options[] = array(
	'id'       => 'goso_header_pb_news_ticker_style',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'label'    => __( 'Style for "Top Posts" Text', 'authow' ),
	'priority' => 10,
	'choices'  => array(
		''                => 'Default Style',
		'nticker-style-2' => 'Style 2',
		'nticker-style-3' => 'Style 3',
		'nticker-style-4' => 'Style 4'
	)
);
$options[] = array(
	'id'       => 'goso_header_pb_news_ticker_animation',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'label'    => __( '"Top Posts" Transition Animation', 'authow' ),
	'default'  => '',
	'priority' => 10,
	'choices'  => array(
		''             => 'Slide In Up',
		'slideInRight' => 'Fade In Right',
		'fadeIn'       => 'Fade In',
	)
);
$options[] = array(
	'id'       => 'goso_header_pb_news_ticker_by',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'label'    => esc_html__( 'Display Top Posts By', 'authow' ),
	'choices'  => array(
		''      => 'Recent Posts',
		'all'   => 'Popular Posts All Time',
		'week'  => 'Popular Posts Once Weekly',
		'month' => 'Popular Posts Once Month'
	)
);
$options[] = array(
	'id'       => 'goso_header_pb_news_ticker_filter_by',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-radio',
	'label'    => esc_html__( 'Filter Topbar By', 'authow' ),
	'priority' => 10,
	'choices'  => array(
		'category' => 'Category',
		'tags'     => 'Tags'
	)
);
$options[] = array(
	'id'          => 'goso_header_pb_news_ticker_tags',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_choices_field',
	'type'        => 'authow-fw-textarea',
	'label'       => esc_html__( 'Fill List Tags for Filter by Tags on "Top Post"', 'authow' ),
	'description' => 'This option just apply when you select "Filter Topbar by" Tags above. And please fill list featured tags slug here, check <a rel="nofollow" href="https://authow.gosodesign.net/authow-document/images/tags.png" target="_blank">this image</a> to know what is tags slug. Example for multiple tags slug, fill:  tag-1, tag-2, tag-3',
	'priority'    => 10,
);
$options[] = array(
	'id'          => 'goso_header_pb_news_ticker_cats',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_choices_field',
	'type'        => 'authow-fw-textarea',
	'label'       => esc_html__( 'Fill List Categories for Filter by Category on "Top Post"', 'authow' ),
	'description' => 'This option just apply when you select "Filter Topbar by" Category above. And please fill list featured category slug here, check <a rel="nofollow" href="https://authow.gosodesign.net/authow-document/images/tags.png" target="_blank">this image</a> to know what is tags slug. Example for multiple category slug, fill:  cat-1, cat-2, cat-3',
);
$options[] = array(
	'id'       => 'goso_header_pb_news_ticker_post_titles',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-size',
	'label'    => esc_html__( 'Words Length for Post Titles on Top Posts', 'authow' ),
	'ids'       => array(
		'desktop' => 'goso_header_pb_news_ticker_post_titles',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'ms',
		),
	),
);
$options[] = array(
	'id'       => 'goso_header_pb_news_ticker_disable_autoplay',
	'default'  => 'disable',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => esc_html__( 'Disable Auto Play', 'authow' ),
	'type'     => 'authow-fw-select',
	'choices'  => [
		'disable' => 'No',
		'enable'  => 'Yes',
	]
);
$options[] = array(
	'id'          => 'goso_header_pb_news_ticker_autoplay_timeout',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_choices_field',
	'type'        => 'authow-fw-size',
	'description' => '1000 = 1 second',
	'label'       => esc_html__( 'Autoplay Timeout', 'authow' ),
	'priority'    => 10,
	'ids'       => array(
		'desktop' => 'goso_header_pb_news_ticker_autoplay_timeout',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'ms',
		),
	),
);
$options[] = array(
	'id'          => 'goso_header_pb_news_ticker_autoplay_speed',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_choices_field',
	'type'        => 'authow-fw-size',
	'description' => '1000 = 1 second',
	'label'       => esc_html__( 'Autoplay Speed', 'authow' ),
	'ids'       => array(
		'desktop' => 'goso_header_pb_news_ticker_autoplay_speed',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'ms',
		),
	),
);
$options[] = array(
	'id'       => 'goso_header_pb_news_ticker_total_posts',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-size',
	'label'    => esc_html__( 'Amount of Posts Display on Top Posts', 'authow' ),
	'ids'       => array(
		'desktop' => 'goso_header_pb_news_ticker_total_posts',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'ms',
		),
	),
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_width',
	'default'   => '420',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-size',
	'label'     => __( 'Maxium Width for Ticker Text', 'authow' ),
	'ids'       => array(
		'desktop' => 'goso_header_pb_news_ticker_width',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_disable_uppercase',
	'default'   => 'disable',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => __( 'Disable Uppercase for "Top Posts" text', 'authow' ),
	'type'      => 'authow-fw-select',
	'choices'   => [
		'disable' => 'No',
		'enable'  => 'Yes',
	]
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_post_titles_uppercase',
	'default'   => 'disable',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => esc_html__( 'Turn Off Uppercase Post Titles', 'authow' ),
	'type'      => 'authow-fw-select',
	'choices'   => [
		'disable' => 'No',
		'enable'  => 'Yes',
	]
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_headline_color',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-color',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Color for "Top Posts" Text',
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_headline_bg',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-color',
	'label'     => 'Background Color for "Top Posts Text"',
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_headline_bg_style3',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Color for Right Arrow on Style 3',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Color for Post Titles',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Hover Color for Post Titles',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_arr_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Color for Next/Prev Buttons',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_arr_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Hover Color for Next/Prev Buttons',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_font',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Custom Text Font',
	'type'      => 'authow-fw-select',
	'choices'   => goso_all_fonts( 'select' )
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_fs',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-size',
	'label'     => __( 'Font Size for Post Titles', 'authow' ),
	'ids'       => array(
		'desktop' => 'goso_header_pb_news_ticker_fs',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_arr_fs',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-size',
	'label'     => __( 'Font Size for Next/Prev Buttons', 'authow' ),
	'ids'       => array(
		'desktop' => 'goso_header_pb_news_ticker_arr_fs',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_headline_fs',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-size',
	'sanitize'  => 'absint',
	'label'     => __( 'Font Size for "Top Posts" Text', 'authow' ),
	'ids'       => array(
		'desktop' => 'goso_header_pb_news_ticker_headline_fs',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_spacing',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'type'      => 'authow-fw-box-model',
	'label'     => __( 'Element Spacing', 'authow' ),
	'choices'   => array(
		'margin'  => array(
			'margin-top'    => '',
			'margin-right'  => '',
			'margin-bottom' => '',
			'margin-left'   => '',
		),
		'padding' => array(
			'padding-top'    => '',
			'padding-right'  => '',
			'padding-bottom' => '',
			'padding-left'   => '',
		),
	),
);
$options[] = array(
	'id'        => 'goso_header_pb_news_ticker_class',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_textarea_field',
	'type'      => 'authow-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'authow' ),
);

/*$wp_customize->selective_refresh->add_partial( 'goso_header_pb_news_ticker_text', array(
	'selector'            => '.pc-wrapbuilder-header-inner',
	'settings'            => [
		//'goso_header_pb_news_ticker_width',
		'goso_header_pb_news_ticker_text',
		'goso_header_pb_news_ticker_style',
		'goso_header_pb_news_ticker_animation',
		//'goso_header_pb_news_ticker_disable_uppercase',
		'goso_header_pb_news_ticker_by',
		'goso_header_pb_news_ticker_filter_by',
		'goso_header_pb_news_ticker_tags',
		'goso_header_pb_news_ticker_cats',
		'goso_header_pb_news_ticker_post_titles',
		//'goso_header_pb_news_ticker_post_titles_uppercase',
		'goso_header_pb_news_ticker_disable_autoplay',
		'goso_header_pb_news_ticker_autoplay_timeout',
		'goso_header_pb_news_ticker_autoplay_speed',
		'goso_header_pb_news_ticker_total_posts',
		//'goso_header_pb_news_ticker_spacing',
		'goso_header_pb_news_ticker_class',
	],
	'container_inclusive' => true,
	'render_callback'     => function () {
		load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
	},
	'fallback_refresh'    => false,
) );*/

return $options;
