<?php
$options   = [];
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Related Posts Box',
	'id'       => 'goso_post_related',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Make Related Posts Display in a Grid Layout ( not Slider )',
	'id'       => 'goso_post_related_grid',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => 'categories',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Display Related Posts By:',
	'id'       => 'goso_related_by',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'categories'  => 'Categories',
		'tags'        => 'Tags',
		'primary_cat' => 'Primary Category from "Yoast SEO" or "Rank Math" plugin'
	)
);
$options[] = array(
	'default'  => 'date',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Order Related Posts',
	'id'       => 'goso_related_orderby',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'rand'          => 'Random Posts',
		'date'          => 'Published Date',
		'ID'            => 'Post ID',
		'modified'      => 'Modified Date',
		'title'         => 'Post Title',
		'comment_count' => 'Comment Count',
		'popular'       => 'Most Viewed Posts All Time',
		'popular7'      => 'Most Viewed Posts Once Weekly',
		'popular_month' => 'Most Viewed Posts Once a Month',
	)
);
$options[] = array(
	'default'  => 'DESC',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Sort Order Related Posts',
	'id'       => 'goso_related_sort_order',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'DESC' => 'Descending',
		'ASC'  => 'Ascending '
	)
);
$options[] = array(
	'default'  => '8',
	'sanitize' => 'absint',
	'label'    => __( 'Words Length for Post Titles on Related Posts', 'authow' ),
	'id'       => 'goso_related_posts_title_length',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_related_posts_title_length',
	),
	'choices'     => array(
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
	'default'  => 'You may also like',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Related Posts Custom Text',
	'id'       => 'goso_post_related_text',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Turn Off Uppercase in Post Titles Related Posts',
	'id'       => 'goso_off_uppercase_post_title_related',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Enable Posts Format Icons in Related Posts',
	'id'       => 'goso_post_related_icons',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Post Date on Related Posts',
	'id'       => 'goso_hide_date_related',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Related Posts Carousel Auto Play',
	'id'       => 'goso_post_related_autoplay',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Dots On Carousel Related Posts',
	'id'       => 'goso_post_related_dots',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => true,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Enable Next/Prev Button On Carousel Related Posts',
	'id'       => 'goso_post_related_arrows',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '10',
	'sanitize' => 'absint',
	'label'    => __( 'Amount of Related Posts', 'authow' ),
	'id'       => 'goso_numbers_related_post',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_numbers_related_post',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '10',
		),
	),
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Exclude Featured Category from Related Posts based on Categories',
	'id'          => 'goso_post_related_exclusive_cat',
	'description' => 'Featured Category is category you selected to filter slider via Customize > Featured Slider > General. This option will help you remove that category on related posts based on categories',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'sanitize'    => 'sanitize_text_field',
	'label'       => esc_html__( 'Related Posts Popup', 'authow' ),
	'id'          => 'goso_section_related_post_popup',
	'description' => 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/related-posts-popup.png">this image</a> to know what is "Related Posts Popup"',
	'type'        => 'authow-fw-header',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Enable Related Posts Popup',
	'id'       => 'goso_related_post_popup',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => 'left',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Position of Related Posts Popup',
	'id'       => 'goso_rltpopup_position',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'left'  => 'Left',
		'right' => 'Right'
	)
);
$options[] = array(
	'default'  => 'categories',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Display Related Posts Popup By:',
	'id'       => 'goso_rltpopup_by',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'categories'  => 'Categories',
		'tags'        => 'Tags',
		'primary_cat' => 'Primary Category from "Yoast SEO" or "Rank Math" plugin'
	)
);
$options[] = array(
	'default'  => 'date',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Order Related Posts Popup',
	'id'       => 'goso_rltpopup_orderby',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'rand'          => 'Random Posts',
		'date'          => 'Published Date',
		'ID'            => 'Post ID',
		'modified'      => 'Modified Date',
		'title'         => 'Post Title',
		'comment_count' => 'Comment Count',
		'popular'       => 'Most Viewed Posts All Time',
		'popular7'      => 'Most Viewed Posts Once Weekly',
		'popular_month' => 'Most Viewed Posts Once a Month',
	)
);
$options[] = array(
	'default'  => 'DESC',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Sort Order Related Posts Popup',
	'id'       => 'goso_rltpopup_sort_order',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'DESC' => 'Descending',
		'ASC'  => 'Ascending '
	)
);
$options[] = array(
	'default'  => '6',
	'sanitize' => 'absint',
	'label'    => __( 'Words Length for Post Titles on Related Posts Popup', 'authow' ),
	'id'       => 'goso_rltpopup_title_length',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_rltpopup_title_length',
	),
	'choices'     => array(
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
	'default'  => 'Read also',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Custom Heading Text for Related Posts Popup',
	'id'       => 'goso_rltpopup_heading_text',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'default'  => '3',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Amount of Posts Display on Related Posts Popup', 'authow' ),
	'id'       => 'goso_rltpopup_numpost',
	'ids'         => array(
		'desktop' => 'goso_rltpopup_numpost',
	),
	'choices'     => array(
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
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Padding Bottom of Related Posts Popup', 'authow' ),
	'id'       => 'goso_rltpopup_padding_bottom',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_rltpopup_padding_bottom',
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
	'label'    => 'Hide Date on Related Posts Popup',
	'id'       => 'goso_rltpopup_hide_date',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Related Posts Popup on Mobile',
	'id'       => 'goso_rltpopup_hide_mobile',
	'type'     => 'authow-fw-toggle',
);
return $options;
