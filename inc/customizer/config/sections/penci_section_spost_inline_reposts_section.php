<?php
$options   = [];
$options[] = array(
	'sanitize'    => 'sanitize_text_field',
	'label'       => esc_html__( 'Inline Related Posts Before/After Content', 'authow' ),
	'description' => __( 'You can check <a href="https://imgresources.s3.amazonaws.com/inline_related_posts.png" target="_blank">this image</a> to understand what\'s Inline Related Posts', 'authow' ),
	'id'          => 'penci_inlinerp_beaf_head',
	'type'        => 'authow-fw-header',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Add Inline Related Posts Before/After Post Content?',
	'description' => __( 'After enabling it, maybe you need to refresh the customize or check on the single post page on the front-end to see how it works.', 'authow' ),
	'id'          => 'penci_show_inlinerp',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		''       => 'None',
		'before' => 'Before Post Content',
		'after'  => 'After Post Content',
		'be_af'  => 'Before & After Post Content'
	)
);
$options[] = array(
	'default'  => 'categories',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Display Inline Related Posts By:',
	'id'       => 'penci_inlinerp_by',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'categories'  => 'Same Categories',
		'tags'        => 'Same Tags',
		'primary_cat' => 'Same Primary Category from "Yoast SEO" or "Rank Math" plugin'
	)
);
$options[] = array(
	'default'  => 'rand',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Order Inline Related Posts By:',
	'id'       => 'penci_inlinerp_orderby',
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
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Order Inline Related Posts:',
	'id'       => 'penci_inlinerp_order',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'DESC' => 'Descending Order',
		'ASC'  => 'Ascending  Order',
	)
);
$options[] = array(
	'default'  => 'list',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Select Style',
	'id'       => 'penci_inlinerp_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'list' => 'List',
		'grid' => 'Grid',
	)
);
$options[] = array(
	'default'  => 'none',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Inline Related Posts Float:',
	'id'       => 'penci_inlinerp_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'none'  => 'None',
		'left'  => 'Float To Left',
		'right' => 'Float To Right',
	)
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Inline Related Posts Inside Post Content', 'authow' ),
	'id'       => 'penci_inlinerp_insert_head',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Add Inline Related Posts Inside Posts Content?',
	'description' => __( 'After enabling it, maybe you need to refresh the customize or check on the single post page on the front-end to see how it works.', 'authow' ),
	'id'          => 'penci_show_inlinerp_inside',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		''         => 'None',
		'repeat'   => 'After Each X Paragraphs - Repeat',
		'norepeat' => 'After X Paragraphs - No Repeat'
	)
);
$options[] = array(
	'default'  => '4',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Add Inline Related Posts Inside Posts Content After How Many Paragraphs?', 'authow' ),
	'id'       => 'penci_show_inlinerp_p',
	'ids'         => array(
		'desktop' => 'penci_show_inlinerp_p',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '4',
		),
	),
);
$options[] = array(
	'default'  => 'categories',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Display Inline Related Posts By:',
	'id'       => 'penci_inlinerpis_by',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'categories'  => 'Same Categories',
		'tags'        => 'Same Tags',
		'primary_cat' => 'Same Primary Category from "Yoast SEO" or "Rank Math" plugin'
	)
);
$options[] = array(
	'default'  => 'rand',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Order Inline Related Posts By:',
	'id'       => 'penci_inlinerpis_orderby',
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
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Order Inline Related Posts:',
	'id'       => 'penci_inlinerpis_order',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'DESC' => 'Descending Order',
		'ASC'  => 'Ascending  Order',
	)
);
$options[] = array(
	'default'  => 'list',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Select Style for Inline Related Posts Inside Post Content',
	'id'       => 'penci_inlinerp_style_insert',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'list' => 'List',
		'grid' => 'Grid',
	)
);
$options[] = array(
	'default'  => 'none',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Select Float for Inline Related Posts Inside Post Content:',
	'id'       => 'penci_inlinerp_align_insert',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'none'  => 'None',
		'left'  => 'Float To Left',
		'right' => 'Float To Right',
	)
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'General Settings', 'authow' ),
	'id'       => 'penci_inlinerp_general_head',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'     => '2',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Inline Related Posts Columns for Grid Style:',
	'description' => __( 'This option just applies when you select style is grid and "Inline Related Posts Float" is "None"', 'authow' ),
	'id'          => 'penci_inlinerp_col',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'1' => '1 Column',
		'2' => '2 Column',
		'3' => '3 Column',
	)
);
$options[] = array(
	'default'  => '6',
	'sanitize' => 'absint',
	'label'    => __( 'How Many Posts You Want to Display?', 'authow' ),
	'id'       => 'penci_inlinerp_num',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_inlinerp_num',
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
	'default' => 'You Might Be Interested In',
	'label'   => 'Custom Heading Text',
	'id'      => 'penci_inlinerp_title',
	'type'    => 'authow-fw-text',
);
$options[] = array(
	'default'  => 'left',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Heading Text Align',
	'id'       => 'penci_inlinerp_titalign',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'left'   => 'Left',
		'center' => 'Center',
		'right'  => 'Right',
	)
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove the Line Below the Heading Text',
	'id'       => 'penci_inlinerp_titleline',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Featured Image on Grid Style?',
	'id'       => 'penci_inlinerp_hide_thumb',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Show Featured Image on the Right Side for Grid Style?',
	'id'       => 'penci_inlinerp_thumb_right',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Post Date?',
	'id'       => 'penci_inlinerp_date',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Show Post Views?',
	'id'       => 'penci_inlinerp_views',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Font Sizes', 'authow' ),
	'id'       => 'penci_inlinerp_fontsize_head',
	'type'     => 'authow-fw-header',
);
/* Font Size */
$options[] = array(
	'label'       => '',
	'id'          => 'penci_inlinerp_fsheading_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Heading Text',
	'id'          => 'penci_inlinerp_fsheading',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'penci_inlinerp_fsheading',
		'mobile'  => 'penci_inlinerp_fsheading_mobile',
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
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Post Title', 'authow' ),
	'id'       => 'penci_inlinerp_fstitle',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_inlinerp_fstitle',
	),
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
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Post Title', 'authow' ),
	'id'       => 'penci_inlinerp_fsmeta',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_inlinerp_fsmeta',
	),
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
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Colors', 'authow' ),
	'id'       => 'penci_inlinerp_colors_head',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Background Color',
	'id'       => 'penci_inlinerp_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Borders Color',
	'id'       => 'penci_inlinerp_border',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Heading Text Color',
	'id'       => 'penci_inlinerp_cheading',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Color for the Line Below Heading Text',
	'id'       => 'penci_inlinerp_cline',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Post Title Color',
	'id'       => 'penci_inlinerp_ctitle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Post Title Hover Color',
	'id'       => 'penci_inlinerp_hctitle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Post Meta Color',
	'id'       => 'penci_inlinerp_hcmeta',
);

return $options;
