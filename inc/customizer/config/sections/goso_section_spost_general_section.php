<?php
$options           = [];
$options[]         = array(
	'default'  => 'style-1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Single Posts Template',
	'id'       => 'penci_single_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'style-1'  => esc_html__( 'Style 1', 'authow' ),
		'style-2'  => esc_html__( 'Style 2', 'authow' ),
		'style-3'  => esc_html__( 'Style 3', 'authow' ),
		'style-4'  => esc_html__( 'Style 4', 'authow' ),
		'style-5'  => esc_html__( 'Style 5', 'authow' ),
		'style-6'  => esc_html__( 'Style 6', 'authow' ),
		'style-7'  => esc_html__( 'Style 7', 'authow' ),
		'style-8'  => esc_html__( 'Style 8', 'authow' ),
		'style-9'  => esc_html__( 'Style 9', 'authow' ),
		'style-10' => esc_html__( 'Style 10', 'authow' ),
	)
);
$single_layout     = [];
$single_layout[''] = esc_attr__( 'None' );
$single_layouts    = get_posts( [
	'post_type'      => 'custom-post-template',
	'posts_per_page' => - 1,
] );
foreach ( $single_layouts as $slayout ) {
	$single_layout[ $slayout->post_name ] = $slayout->post_title;
}
$options[] = array(
	'default'     => '',
	'description' => 'Will override the pre-build single posts template above. You can add new and edit a single post template on <a target="_blank" href="' . esc_url( admin_url( '/edit.php?post_type=custom-post-template' ) ) . '">this page</a>',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Custom Post Builder Template',
	'id'          => 'penci_single_custom_template',
	'type'        => 'authow-fw-select',
	'choices'     => $single_layout
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Move Categories, Post Title, Post Meta To Bellow Featured Image',
	'id'       => 'penci_move_title_bellow',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => 'right',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Single Posts Sidebar Layout',
	'id'       => 'penci_single_layout',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'right'       => 'Right Sidebar',
		'left'        => 'Left Sidebar',
		'two'         => 'Two Sidebars',
		'no'          => 'No Sidebar',
		'small_width' => 'No Sidebar with Container Width Smaller'
	)
);
$options[] = array(
	'default'         => '780',
	'sanitize'        => 'absint',
	'label'           => __( 'Custom Width for "No Sidebar with Container Width Smaller" Layout You Selected Above', 'authow' ),
	'id'              => 'penci_single_smaller_width',
	'type'            => 'authow-fw-size',
	'ids'             => array(
		'desktop' => 'penci_single_smaller_width',
	),
	'choices'         => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '780',
		),
	),
	'active_callback' => [
		[
			'setting'  => 'penci_single_layout',
			'operator' => '==',
			'value'    => 'small_width',
		]
	],
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'absint',
	'label'       => __( 'Custom Container Width on Single Posts Page', 'authow' ),
	'description' => 'Minimum is 600px',
	'id'          => 'penci_single_container_w',
	'type'        => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_single_container_w',
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
	'default'     => '',
	'sanitize'    => 'absint',
	'label'       => __( 'Custom Container Width for Two Sidebars on Single Posts Page', 'authow' ),
	'description' => 'Minimum is 800px',
	'id'          => 'penci_single_container2_w',
	'type'        => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_single_container2_w',
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
	'default'     => '',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Custom Image Size for Featured Image',
	'description' => __( 'This option doesn\'t apply for two sidebars layout.', 'authow' ),
	'id'          => 'penci_single_custom_thumbnail_size',
	'type'        => 'authow-fw-ajax-select',
	'choices'     => call_user_func( function () {
		global $_wp_additional_image_sizes;

		$default_image_sizes = get_intermediate_image_sizes();

		foreach ( $default_image_sizes as $size ) {
			$image_sizes[ $size ]['width']  = intval( get_option( "{$size}_size_w" ) );
			$image_sizes[ $size ]['height'] = intval( get_option( "{$size}_size_h" ) );
			$image_sizes[ $size ]['crop']   = get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
		}

		if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
			$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
		}

		$image_sizes_data = array( '' => 'Default' );
		if ( ! empty( $image_sizes ) ) {
			foreach ( $image_sizes as $key => $val ) {
				$new_val = $key;
				if ( isset( $val['width'] ) && isset( $val['height'] ) ) {
					$heightname = $val['height'];
					if ( '0' == $val['height'] || '99999' == $val['height'] ) {
						$heightname = 'auto';
					}
					$new_val = $key . ' - ' . $val['width'] . ' x ' . $heightname;
				}
				$image_sizes_data[ $key ] = $new_val;
			}
		}
		$image_sizes_data['full'] = 'Full Size';

		return $image_sizes_data;
	} ),
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Enable Parallax on Featured Image',
	'id'          => 'penci_enable_jarallax_single',
	'type'        => 'authow-fw-toggle',
	'description' => 'This feature does not apply for Single Style 1 & 2',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Parallax on Featured Image on Mobile',
	'id'       => 'penci_dis_jarallax_single_mb',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Auto Play for Single Slider Gallery & Posts Format Gallery',
	'id'       => 'penci_disable_autoplay_single_slider',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Images Title on Galleries from The Theme',
	'id'       => 'penci_disable_image_titles_galleries',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Lightbox on Single Posts',
	'id'       => 'penci_disable_lightbox_single',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Hide Featured Image on Top',
	'id'          => 'penci_post_thumb',
	'description' => 'Hide Featured images auto appears on single posts page - This option not apply for Video format, Gallery format',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Category',
	'id'       => 'penci_post_cat',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Uppercase on Post Categories',
	'id'       => 'penci_on_uppercase_post_cat',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'label'       => 'Custom Border Radius for Featured Image',
	'id'          => 'penci_post_featured_image_radius',
	'type'        => 'authow-fw-text',
	'description' => 'You can use pixel or percent. E.g:  <strong>10px</strong>  or  <strong>10%</strong>. If you want to disable border radius - fill 0',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'label'       => 'Custom Aspect Ratio for Featured Image',
	'id'          => 'penci_post_featured_image_ratio',
	'type'        => 'authow-fw-text',
	'description' => 'The aspect ratio of an element describes the proportional relationship between its width and its height. E.g: <strong>3:2</strong>. Default is 3:2 . This option not apply when enable parallax images. This feature does not apply for Single Style 1 & 2',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Align Left Post Categories, Post Title, Post Meta',
	'id'       => 'penci_align_left_post_title',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Letter Spacing on Post Title',
	'id'       => 'penci_off_letter_space_post_title',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Turn Off Uppercase on Post Title',
	'id'       => 'penci_off_uppercase_post_title',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Post Author',
	'id'       => 'penci_single_meta_author',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Post Date',
	'id'       => 'penci_single_meta_date',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Display Published Date & Modified Date',
	'description' => esc_html__( 'Note that: If Published Date and Modified Date is the same - will be display Published date only. And if you want to display Modified date only - check option for it via Customize > General > General Settings > Display Modified Date Replace with Published Date', 'authow' ),
	'id'          => 'penci_single_publishmodified',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Comment Count',
	'id'       => 'penci_single_meta_comment',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Show Views Count',
	'id'       => 'penci_single_show_cview',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Reading Time',
	'id'       => 'penci_single_hreadtime',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Enable ajax Post View Count',
	'id'          => 'penci_enable_ajax_view',
	'description' => 'Use to count posts viewed when you using cache plugin.',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Enable Caption on Featured Image',
	'id'          => 'penci_post_thumb_caption',
	'description' => 'If your featured image has a caption, it will display on featured image',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Caption on Slider of Gallery Post Format',
	'id'       => 'penci_post_gallery_caption',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Move Caption of Images to Below The Images',
	'id'       => 'penci_post_caption_below',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Italic on Caption of Images',
	'id'       => 'penci_post_caption_disable_italic',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => 'style-1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Blockquote Style:',
	'id'       => 'penci_blockquote_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'style-1' => 'Style 1',
		'style-2' => 'Style 2'
	)
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => 'Add Ads/Custom HTML Code Inside Posts Content',
	'id'          => 'penci_ads_inside_content_html',
	'description' => '',
	'type'        => 'authow-fw-textarea',
);
$options[] = array(
	'default'  => 'style-1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Add Ads/Custom HTML Code Inside Posts Content With:',
	'id'       => 'penci_ads_inside_content_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'style-1' => 'After Each X Paragraphs - Repeat',
		'style-2' => 'After X Paragraphs - No Repeat'
	)
);
$options[] = array(
	'default'  => '4',
	'sanitize' => 'absint',
	'label'    => __( 'Add Ads/Custom HTML Code Inside Posts Content After How Many Paragraphs?', 'authow' ),
	'id'       => 'penci_ads_inside_content_num',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'penci_ads_inside_content_num',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
		),
	),
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Tags',
	'id'       => 'penci_post_tags',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Like Count & Social Share',
	'id'       => 'penci_post_share',
	'type'     => 'authow-fw-toggle',
);

$share_style = [];
for ( $i = 1; $i <= 23; $i ++ ) {
	$v                      = $i < 4 ? 's' : 'n';
	$n                      = $i < 4 ? $i : $i - 3;
	$share_style[ $v . $n ] = 'Style ' . $i;
}

$options[] = array(
	'default'     => 's1',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Share Box Style',
	'id'          => 'penci_single_style_cscount',
	'description' => '',
	'type'        => 'authow-fw-select',
	'choices'     => $share_style
);
$options[] = array(
	'id'       => 'penci_post_align_cscount',
	'default'  => 'default',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Share Box Alignment',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'default' => 'Default Theme Style',
		'left'    => 'Left',
		'right'   => 'Right',
		'center'  => 'Center',
	)
);
$options[] = array(
	'default'     => 'below-content',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Share Box Position',
	'id'          => 'penci_single_poslcscount',
	'description' => '',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'btitle'             => 'Bellow Post Meta',
		'above-content'      => 'Above Content',
		'below-content'      => 'Below Content',
		'abovebelow-content' => 'Above & Below Content',
		'btitle-bcontent'    => 'Bellow Post Meta & Below Content',
	)
);
$options[] = array(
	'default'     => 'author-postnav-related-comments',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Re-order "Author Box" - "Post Navigation" - "Related Posts" - "Comments" section',
	'id'          => 'penci_single_ordersec',
	'description' => '',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'author-postnav-related-comments' => 'Author Box - Post Navigation - Related Posts - Comments',
		'author-postnav-comments-related' => 'Author Box - Post Navigation - Comments - Related Posts',
		'author-comments-postnav-related' => 'Author Box - Comments - Post Navigation - Related Posts',
		'author-comments-related-postnav' => 'Author Box - Comments - Related Posts - Post Navigation',
		'author-related-comments-postnav' => 'Author Box - Related Posts - Comments - Post Navigation',
		'author-related-postnav-comments' => 'Author Box - Related Posts - Post Navigation - Comments',
		'postnav-author-related-comments' => 'Post Navigation - Author Box - Related Posts - Comments',
		'postnav-author-comments-related' => 'Post Navigation - Author Box - Comments - Related Posts',
		'postnav-comments-author-related' => 'Post Navigation - Comments - Author Box - Related Posts',
		'postnav-comments-related-author' => 'Post Navigation - Comments - Related Posts - Author Box',
		'postnav-related-comments-author' => 'Post Navigation - Related Posts - Comments - Author Box',
		'postnav-related-author-comments' => 'Post Navigation - Related Posts - Author Box - Comments',
		'related-author-comments-postnav' => 'Related Posts - Author Box - Comments - Post Navigation',
		'related-author-postnav-comments' => 'Related Posts - Author Box - Post Navigation - Comments',
		'related-comments-author-postnav' => 'Related Posts - Comments - Author Box - Post Navigation',
		'related-comments-postnav-author' => 'Related Posts - Comments - Post Navigation - Author Box',
		'related-postnav-author-comments' => 'Related Posts - Post Navigation - Author Box - Comments',
		'related-postnav-comments-author' => 'Related Posts - Post Navigation - Comments - Author Box',
		'comments-author-postnav-related' => 'Comments - Author Box - Post Navigation - Related Posts',
		'comments-author-related-postnav' => 'Comments - Author Box - Related Posts - Post Navigation',
		'comments-postnav-related-author' => 'Comments - Post Navigation - Related Posts - Author Box',
		'comments-postnav-author-related' => 'Comments - Post Navigation - Author Box - Related Posts',
		'comments-related-author-postnav' => 'Comments - Related Posts - Author Box - Post Navigation',
		'comments-related-postnav-author' => 'Comments - Related Posts - Post Navigation - Author Box',
	)
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Author Box',
	'id'       => 'penci_post_author',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Show Email Icon of Author on Author Box',
	'id'       => 'penci_post_author_email',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Uppercase for Author Name on Author Box',
	'id'       => 'penci_bio_upper_name',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => 'style-1',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Author Box Style',
	'id'          => 'penci_authorbio_style',
	'description' => '',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'style-1' => 'Default',
		'style-2' => 'Style 2',
		'style-3' => 'Style 3',
		'style-4' => 'Style 4',
	)
);
$options[] = array(
	'default'     => 'round',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Author Box Image Type',
	'id'          => 'penci_bioimg_style',
	'description' => '',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'round'  => 'Round',
		'square' => 'Square',
		'sround' => 'Round Borders',
	)
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Next/Prev Post Navigation',
	'id'       => 'penci_post_nav',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Turn Off Uppercase in Post Title Next/Prev Post Navigation',
	'id'       => 'penci_off_uppercase_post_title_nav',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Show Post Thumbnail on Next/Prev Post Navigation',
	'id'       => 'penci_post_nav_thumbnail',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Lines Before & After of Heading Title on Related & Comments',
	'id'       => 'penci_post_remove_lines_related',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Gallery Feature from This Theme',
	'id'       => 'penci_post_disable_gallery',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => 'justified',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Default Gallery Style from The Theme',
	'id'       => 'penci_gallery_dstyle',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'justified'     => 'Justified Style',
		'masonry'       => 'Masonry Style',
		'grid'          => 'Grid Style',
		'single-slider' => 'Single Slider',
		'none'          => 'None'
	)
);
$options[] = array(
	'default'  => '150',
	'sanitize' => 'absint',
	'label'    => __( 'Custom the height of images on Justified Gallery style', 'authow' ),
	'id'       => 'penci_image_height_gallery',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'penci_image_height_gallery',
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
	'default'     => 'main-sidebar',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Custom Sidebar for Single',
	'id'          => 'penci_sidebar_name_single',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar',
	'type'        => 'authow-fw-select',
	'choices'     => get_list_custom_sidebar_option()
);
$options[] = array(
	'default'     => 'main-sidebar-left',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Custom Sidebar Left for Single',
	'id'          => 'penci_sidebar_left_name_single',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar. This option just apply when you use 2 sidebars for Single',
	'type'        => 'authow-fw-select',
	'choices'     => get_list_custom_sidebar_option()
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Ads on Single Posts', 'authow' ),
	'id'       => 'penci_singleads_bheading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => 'Add Ads/Custom HTML Code Inside Posts Content',
	'id'          => 'penci_ads_inside_content_html',
	'description' => '',
	'type'        => 'authow-fw-textarea',
);
$options[] = array(
	'default'  => 'style-1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Add Ads/Custom HTML Code Inside Posts Content:',
	'id'       => 'penci_ads_inside_content_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'style-1' => 'After Each X Paragraphs - Repeat',
		'style-2' => 'After X Paragraphs - No Repeat'
	)
);
$options[] = array(
	'default'  => '4',
	'sanitize' => 'absint',
	'label'    => __( 'Add Ads/Custom HTML Code Inside Posts Content After How Many Paragraphs?', 'authow' ),
	'id'       => 'penci_ads_inside_content_num',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'penci_ads_inside_content_num',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_textarea_field',
	'label'    => 'Add Google Adsense/Custom HTML code For Post Template Style 10',
	'id'       => 'penci_post_adsense_single10',
	'type'     => 'authow-fw-textarea',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => 'Add Google Adsense/Custom HTML code below post description',
	'id'          => 'penci_post_adsense_one',
	'description' => '',
	'type'        => 'authow-fw-textarea',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => 'Add Google Adsense/Custom HTML code at the end of content posts',
	'id'          => 'penci_post_adsense_two',
	'description' => '',
	'type'        => 'authow-fw-textarea',
);

return $options;
