<?php
$options   = [];
$options[] = array(
	'label'    => 'Category, Tag, Search, Archive Layout',
	'id'       => 'goso_archive_layout',
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
	),
	'default'  => 'standard',
	'sanitize' => 'goso_sanitize_choices_field'
);

/* Archive Featured Settings */
$options[] = array(
	'label'    => esc_html__( 'Archive Builder Templates', 'authow' ),
	'id'       => 'goso_heading_archi_template',
	'type'     => 'authow-fw-header',
	'sanitize' => 'sanitize_text_field'
);

$archive_layout     = [];
$archive_layout[''] = __( 'Default Template', 'authow' );
$archive_layouts    = get_posts( [
	'post_type'      => 'archive-template',
	'posts_per_page' => - 1,
] );
foreach ( $archive_layouts as $alayout ) {
	$archive_layout[ $alayout->post_name ] = $alayout->post_title;
}

$options[] = array(
	'id'          => 'goso_archive_cat_template',
	'label'       => 'Select Builder Template for Categories Pages',
	'description' => 'You can select a custom template for each category by go to Dashboard > Posts > and edit Category you want to change the template. You can add new and edit a category template on <a target="_blank" href="' . esc_url( admin_url( '/edit.php?post_type=archive-template' ) ) . '">this page</a>',
	'type'        => 'authow-fw-select',
	'choices'     => $archive_layout,
	'default'     => '',
	'sanitize'    => 'goso_sanitize_choices_field'
);

$options[] = array(
	'id'       => 'goso_archive_tag_template',
	'label'    => 'Select Builder Template for Tags Pages',
	'type'     => 'authow-fw-select',
	'choices'  => $archive_layout,
	'default'  => '',
	'description'  => 'You can add new and edit a tag template on <a target="_blank" href="' . esc_url( admin_url( '/edit.php?post_type=archive-template' ) ) . '">this page</a>',
	'sanitize' => 'goso_sanitize_choices_field'
);

$options[] = array(
	'id'       => 'goso_archive_author_template',
	'label'    => 'Select Builder Template for Author Pages',
	'type'     => 'authow-fw-select',
	'choices'  => $archive_layout,
	'default'  => '',
	'description'  => 'You can add new and edit a author template on <a target="_blank" href="' . esc_url( admin_url( '/edit.php?post_type=archive-template' ) ) . '">this page</a>',
	'sanitize' => 'goso_sanitize_choices_field'
);

$options[] = array(
	'id'       => 'goso_archive_date_template',
	'label'    => 'Select Builder Template for Day/Times Pages',
	'type'     => 'authow-fw-select',
	'choices'  => $archive_layout,
	'default'  => '',
	'description'  => 'You can add new and edit a day/times archive template on <a target="_blank" href="' . esc_url( admin_url( '/edit.php?post_type=archive-template' ) ) . '">this page</a>',
	'sanitize' => 'goso_sanitize_choices_field'
);

$options[] = array(
	'id'       => 'goso_archive_search_template',
	'label'    => 'Select Builder Template for Search Result Page',
	'type'     => 'authow-fw-select',
	'choices'  => $archive_layout,
	'default'  => '',
	'description'  => 'You can add new and edit a search result template on <a target="_blank" href="' . esc_url( admin_url( '/edit.php?post_type=archive-template' ) ) . '">this page</a>',
	'sanitize' => 'goso_sanitize_choices_field'
);

$goso_featured_cat_layout = [
	''                         => esc_html__( 'None', 'authow' ),
	'style-1 goso-grid-col-2' => esc_html__( 'Grid 2 Columns', 'authow' ),
	'style-1 goso-grid-col-3' => esc_html__( 'Grid 3 Columns', 'authow' ),
	'style-1 goso-grid-col-4' => esc_html__( 'Grid 4 Columns', 'authow' ),
	'style-1 goso-grid-col-5' => esc_html__( 'Grid 5 Columns', 'authow' ),
	'style-3'                  => esc_html__( 'Featured 3', 'authow' ),
	'style-4'                  => esc_html__( 'Featured 4', 'authow' ),
	'style-5'                  => esc_html__( 'Featured 5', 'authow' ),
	'style-6'                  => esc_html__( 'Featured 6', 'authow' ),
	'style-7'                  => esc_html__( 'Featured 7', 'authow' ),
	'style-8'                  => esc_html__( 'Featured 8', 'authow' ),
	'style-9'                  => esc_html__( 'Featured 9', 'authow' ),
	'style-10'                 => esc_html__( 'Featured 10', 'authow' ),
	'style-11'                 => esc_html__( 'Featured 11', 'authow' ),
	'style-12'                 => esc_html__( 'Featured 12', 'authow' ),
	'style-13'                 => esc_html__( 'Featured 13', 'authow' ),
	'style-14'                 => esc_html__( 'Featured 14', 'authow' ),
	'style-15'                 => esc_html__( 'Featured 15', 'authow' ),
	'style-16'                 => esc_html__( 'Featured 16', 'authow' ),
	'style-17'                 => esc_html__( 'Featured 17', 'authow' ),
	'style-18'                 => esc_html__( 'Featured 18', 'authow' ),
	'style-19'                 => esc_html__( 'Featured 19', 'authow' ),
	'style-20'                 => esc_html__( 'Featured 20', 'authow' ),
	'style-21'                 => esc_html__( 'Featured 21', 'authow' ),
	'style-22'                 => esc_html__( 'Featured 22', 'authow' ),
];
/* Archive Featured Settings */
$options[] = array(
	'label'    => esc_html__( 'Show Featured Posts', 'authow' ),
	'id'       => 'goso_heading_featured_archi',
	'type'     => 'authow-fw-header',
	'sanitize' => 'sanitize_text_field'
);
/* Category Featured */
$options[] = array(
	'id'       => 'goso_cat_featured_layout',
	'label'    => 'Category Pages Featured Style',
	'type'     => 'authow-fw-select',
	'choices'  => $goso_featured_cat_layout,
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field'
);
$options[] = array(
	'label'    => '',
	'id'       => 'goso_category_featured_mheight',
	'type'     => 'authow-fw-hidden',
	'sanitize' => 'absint',
);
$options[] = array(
	'label'       => 'Height for Featured Styles',
	'description' => __( 'for Featured Posts on Category Pages', 'authow' ),
	'id'          => 'goso_category_featured_height',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'goso_category_featured_height',
		'mobile'  => 'goso_category_featured_mheight',
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
	'type'        => 'authow-fw-size',
	'id'          => 'goso_cat_featured_theight',
	'sanitize'    => 'absint',
	'label'       => __( 'Height for Featured Styles on Tablet', 'authow' ),
	'description' => __( 'for Featured Posts on Category Pages', 'authow' ),
	'ids'         => array(
		'desktop' => 'goso_cat_featured_theight',
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
/* Tags Featured */
$options[] = array(
	'id'       => 'goso_tag_featured_layout',
	'label'    => 'Tag Pages Featured Style',
	'type'     => 'authow-fw-select',
	'choices'  => $goso_featured_cat_layout,
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field'
);
$options[] = array(
	'label'    => '',
	'id'       => 'goso_tag_featured_mheight',
	'type'     => 'authow-fw-hidden',
	'sanitize' => 'absint',
);
$options[] = array(
	'label'    => 'Height for Featured Styles',
	'id'       => 'goso_tag_featured_height',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_tag_featured_height',
		'mobile'  => 'goso_tag_featured_mheight',
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
	'id'          => 'goso_tag_featured_theight',
	'type'        => 'authow-fw-size',
	'label'       => __( 'Height for Featured Styles on Tablet', 'authow' ),
	'description' => __( 'for Featured Posts on Tags Pages', 'authow' ),
	'ids'         => array(
		'desktop' => 'goso_tag_featured_theight',
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
	'id'       => 'goso_arf_orderby',
	'label'    => 'Featured Posts Sort By',
	'type'     => 'authow-fw-select',
	'choices'  => [
		''              => 'Published Date',
		'modified'      => 'Modified Date',
		'comment_count' => 'Comment Count',
		'popular'       => 'Most Viewed Posts All Time',
		'popular7'      => 'Most Viewed Posts Once Weekly',
		'popular_month' => 'Most Viewed Posts Once a Month',
	],
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field'
);
$options[] = array(
	'id'       => 'goso_arf_sortby',
	'label'    => 'Featured Posts Order By',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'desc' => 'DESC',
		'asc'  => 'ASC',
	],
	'default'  => 'desc',
	'sanitize' => 'goso_sanitize_choices_field'
);
$options[] = array(
	'id'       => 'goso_arf_img_ratio',
	'type'     => 'authow-fw-text',
	'label'    => __( 'Image Ratio for Grid Layout (Unit is %. Eg: 50.5)', 'authow' ),
	'default'  => '',
	'sanitize' => 'goso_sanitize_text_field',
);
$options[] = array(
	'label'    => '',
	'id'       => 'goso_arf_mheight',
	'type'     => 'authow-fw-hidden',
	'sanitize' => 'absint',
);
$options[] = array(
	'label'    => 'Height for Featured Styles',
	'id'       => 'goso_arf_height',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_arf_height',
		'mobile'  => 'goso_arf_mheight',
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
	'label'    => __( 'Height for Featured Styles on Tablet', 'authow' ),
	'id'       => 'goso_arf_theight',
	'type'     => 'authow-fw-size',
	'default'  => '',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_arf_theight',
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
	'label'    => __( 'Gap Between Featured Posts', 'authow' ),
	'id'       => 'goso_arf_gap',
	'type'     => 'authow-fw-size',
	'default'  => '4',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_arf_gap',
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
$options[] = array(
	'label'    => __( 'Custom Title Words Length', 'authow' ),
	'id'       => 'goso_arf_titlength',
	'type'     => 'authow-fw-size',
	'default'  => '',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_arf_titlength',
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
$options[] = array(
	'label'    => 'Hide Categories',
	'id'       => 'goso_arcf_cat',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Hide Post Date',
	'id'       => 'goso_arcf_date',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Show Post Author',
	'id'       => 'goso_arcf_author',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Show Comments Count',
	'id'       => 'goso_arcf_cm',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Show Views Count',
	'id'       => 'goso_arcf_view',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Show Reading Time',
	'id'       => 'goso_arcf_reading',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Hide Categories on Mobile',
	'id'       => 'goso_arcf_mcat',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Hide Post Meta on Mobile',
	'id'       => 'goso_arcf_mmeta',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Google Adsense/Custom HTML Code Display Below Featured Posts',
	'id'       => 'goso_arcf_adbelow',
	'type'     => 'authow-fw-textarea',
	'default'  => '',
	'sanitize' => 'goso_sanitize_textarea_field'
);
$options[] = array(
	'label'       => 'Latest Posts Heading Title Below the Featured Area',
	'description' => 'Replace your category/tag name with {name} string.',
	'type'        => 'authow-fw-text',
	'id'          => 'goso_arf_title',
	'default'     => 'Latest in {name}',
	'sanitize'    => 'goso_sanitize_choices_field'
);
$options[] = array(
	'id'       => 'goso_arf_title_style',
	'label'    => 'Select Latest Posts Title Heading Style',
	'type'     => 'authow-fw-select',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'choices'  => array(
		''                  => 'Follow Title Box Style',
		'style-1'           => 'Default Style',
		'style-2'           => 'Style 2',
		'style-3'           => 'Style 3',
		'style-4'           => 'Style 4',
		'style-5'           => 'Style 5',
		'style-6'           => 'Style 6 - Only Text',
		'style-7'           => 'Style 7',
		'style-9'           => 'Style 8',
		'style-8'           => 'Style 9 - Custom Background Image',
		'style-10'          => 'Style 10',
		'style-11'          => 'Style 11',
		'style-12'          => 'Style 12',
		'style-13'          => 'Style 13',
		'style-14'          => 'Style 14',
		'style-15'          => 'Style 15',
		'style-16'          => 'Style 16',
		'style-2 style-17'  => 'Style 17',
		'style-18'          => 'Style 18',
		'style-18 style-19' => 'Style 19',
		'style-18 style-20' => 'Style 20',
	)
);
/* Font size & color */
$options[] = array(
	'id'       => 'goso_heading_featured_fzc',
	'label'    => esc_html__( 'Featured Posts Font Size & Colors', 'authow' ),
	'type'     => 'authow-fw-header',
	'sanitize' => 'sanitize_text_field'
);
$options[] = array(
	'id'       => 'goso_arf_catfs',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Post Categories', 'authow' ),
	'default'  => '',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_arf_catfs',
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
	'label'    => '',
	'id'       => 'goso_arf_t_mfs',
	'type'     => 'authow-fw-hidden',
	'sanitize' => 'absint',
);
$options[] = array(
	'label'    => 'Big Grid Font Size for Post Title',
	'id'       => 'goso_arf_t_fs',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_arf_t_fs',
		'mobile'  => 'goso_arf_t_mfs',
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
	'label'    => '',
	'id'       => 'goso_arf_t_bmfs',
	'type'     => 'authow-fw-hidden',
	'sanitize' => 'absint',
);
$options[] = array(
	'label'    => 'Font Size for Post Title on Big Items',
	'id'       => 'goso_arf_t_bfs',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_arf_t_bfs',
		'mobile'  => 'goso_arf_t_bmfs',
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
	'label'    => __( 'Big Grid Font Size for Post Meta', 'authow' ),
	'id'       => 'goso_arf_meta_fs',
	'type'     => 'authow-fw-size',
	'default'  => '',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_arf_meta_fs',
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
/* Color */
$options[] = array(
	'id'       => 'goso_arf_cat_cl',
	'label'    => 'Post Categories Color',
	'type'     => 'authow-fw-color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'id'       => 'goso_arf_cat_hcl',
	'label'    => 'Post Categories Hover Color',
	'type'     => 'authow-fw-color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'id'       => 'goso_arf_t_cl',
	'label'    => 'Post Title Color',
	'type'     => 'authow-fw-color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Post Title Hover Color',
	'id'       => 'goso_arf_t_hcl',
	'type'     => 'authow-fw-color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Post Meta Color',
	'id'       => 'goso_arf_meta_cl',
	'type'     => 'authow-fw-color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Post Meta Links Color',
	'id'       => 'goso_arf_meta_lcl',
	'type'     => 'authow-fw-color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Post Meta Links Hover Color',
	'id'       => 'goso_arf_meta_hcl',
	'type'     => 'authow-fw-color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color'
);
// End Category Featured
$options[] = array(
	'label'    => esc_html__( 'Other Settings', 'authow' ),
	'id'       => 'goso_heading_other_archi',
	'type'     => 'authow-fw-header',
	'sanitize' => 'sanitize_text_field'
);
$options[] = array(
	'label'    => 'Enable Load More Button for Categories, Tags, Search, Archive Pages',
	'id'       => 'goso_archive_nav_ajax',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Enable Infinite Scroll for Categories, Tags, Search, Archive Pages',
	'id'       => 'goso_archive_nav_scroll',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => __( 'Number of Posts for Each Time Load More Posts', 'authow' ),
	'type'     => 'authow-fw-size',
	'id'       => 'goso_arc_number_load_more',
	'default'  => '6',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_arc_number_load_more',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => '',
			'default' => '6',
		),
	),
);
$options[] = array(
	'label'    => 'Move Description of Category, Tag, Archive Pages Below Post Listings',
	'id'       => 'goso_archive_move_desc',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Category, Tags, Archive Description Align',
	'id'       => 'goso_archive_descalign',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''       => 'Default',
		'left'   => 'Left',
		'right'  => 'Right',
		'center' => 'Center',
	),
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field'
);
$options[] = array(
	'label'    => 'Enable Sidebar On Archives',
	'id'       => 'goso_sidebar_archive',
	'type'     => 'authow-fw-toggle',
	'default'  => true,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Enable Left Sidebar On Archives',
	'id'       => 'goso_left_sidebar_archive',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Enable Two Sidebars On Archives',
	'id'       => 'goso_two_sidebar_archive',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Remove "Category:" Words on Category Pages',
	'id'       => 'goso_remove_cat_words',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Remove "Tag:" Words on Tag Pages',
	'id'       => 'goso_remove_tag_words',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'       => 'Custom Sidebar Display on Category Pages',
	'id'          => 'goso_sidebar_name_category',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar',
	'type'        => 'authow-fw-select',
	'choices'     => get_list_custom_sidebar_option(),
	'default'     => 'main-sidebar',
	'sanitize'    => 'goso_sanitize_choices_field'
);
$options[] = array(
	'label'       => 'Custom Sidebar Left Display on Category Pages',
	'id'          => 'goso_sidebar_left_name_category',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar Left. This option just use when you enable 2 sidebars for Archive pages',
	'type'        => 'authow-fw-select',
	'choices'     => get_list_custom_sidebar_option(),
	'default'     => 'main-sidebar-left',
	'sanitize'    => 'goso_sanitize_choices_field'
);
$options[] = array(
	'label'       => 'Google Adsense/Custom HTML Code to Display Above Posts Layout for Archive Pages',
	'id'          => 'goso_archive_ad_above',
	'description' => 'You can display google adsense/custom HTML code above posts on category, tags, search, archive page by use this option',
	'type'        => 'authow-fw-textarea',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_textarea_field'
);
$options[] = array(
	'label'       => 'Google Adsense/Custom HTML Code to Display Below Posts Layout for Archive Pages',
	'id'          => 'goso_archive_ad_below',
	'description' => 'You can display google adsense/custom HTML code below posts on category, tags, search, archive page by use this option',
	'type'        => 'authow-fw-textarea',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_textarea_field'
);
$options[] = array(
	'label'    => esc_html__( 'In-Feed Ads', 'authow' ),
	'id'       => 'goso_heading_infeed_ads_archi',
	'type'     => 'authow-fw-header',
	'sanitize' => 'sanitize_text_field'
);
$options[] = array(
	'label'    => __( 'Insert In-feed Ads Code After Every How Many Posts?', 'authow' ),
	'id'       => 'goso_infeedads_archi_num',
	'type'     => 'authow-fw-size',
	'default'  => '3',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_infeedads_archi_num',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => '',
			'default' => '3',
		),
	),
);
$options[] = array(
	'label'       => 'In-feed Ads Code/HTML',
	'description' => __( 'Please use normal responsive ads here to get the best results - the in-feed ads can\'t work with auto-ads because auto-ads will randomly place your ads on random places on the pages.', 'authow' ),
	'id'          => 'goso_infeedads_archi_code',
	'type'        => 'authow-fw-textarea',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_textarea_field'
);
$options[] = array(
	'label'    => 'In-feed Ads Layout Type',
	'id'       => 'goso_infeedads_archi_layout',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''     => 'Follow Current Layout',
		'full' => 'Full Width',
	),
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field'
);

return $options;
