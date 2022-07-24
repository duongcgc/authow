<?php
$options   = [];
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Featured Boxes', 'authow' ),
	'id'       => 'penci_section_featured_boxes_heading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Featured Boxes Border & Background Color',
	'id'       => 'penci_home_boxes_overlay',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Featured Boxes Title Color',
	'id'       => 'penci_home_boxes_title_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Featured Boxes Accent Hover Color',
	'id'       => 'penci_home_boxes_accent_hover_color',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Popular Posts', 'authow' ),
	'id'       => 'penci_section_popular_heading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Home Popular Posts Heading Color',
	'id'       => 'penci_home_popular_label_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Home Popular Posts Border Color',
	'id'       => 'penci_home_popular_border_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Home Popular Post Titles Color',
	'id'       => 'penci_home_popular_post_title_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Home Popular Post Titles Post Hover Color',
	'id'       => 'penci_home_popular_post_title_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Home Popular Post Date Color',
	'id'       => 'penci_home_popular_post_date_color',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Home Title Box', 'authow' ),
	'id'       => 'penci_section_home_titlebox_heading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Home Title Box Background Color',
	'id'       => 'penci_home_title_box_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Home Title Box Background Outer Color',
	'id'       => 'penci_home_title_box_outer_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Home Title Box Border Color',
	'id'       => 'penci_home_title_box_border_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Home Title Box Border Outer Color',
	'id'       => 'penci_home_title_box_border_inner_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Custom Color for Border Bottom on Home Title Box Style 5, 10, 11, 12',
	'id'       => 'penci_home_title_box_border_bottom5',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Custom Color for Small Border Bottom on Home Title Box Style 7 & Style 8',
	'id'       => 'penci_home_title_box_border_bottom7',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Custom Color for Border Top on Home Title Box Style 10',
	'id'       => 'penci_home_title_box_border_top10',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Custom Color for Background Shapes Home Title Box Style 11, 12, 13',
	'id'       => 'penci_home_title_box_shapes_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Background Color for Icon on Style 15',
	'id'       => 'penci_home_bgstyle15',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Icon Color on Style 15',
	'id'       => 'penci_home_iconstyle15',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Color for Lines on Styles 18, 19, 20',
	'id'       => 'penci_home_cllines',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Home Title Box Text Color',
	'id'       => 'penci_home_title_box_text_color',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Featured Categories', 'authow' ),
	'id'       => 'penci_section_featured_cat_heading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Post Titles Color',
	'id'       => 'penci_home_featured_title_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Post Titles Hover Color',
	'id'       => 'penci_home_featured_title_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Post Titles Color For Style 3, Style 4, Style 11, Style 14',
	'id'       => 'penci_home_featured3_title_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Post Titles Hover Color For Style 3, Style 4, Style 11, Style 14',
	'id'       => 'penci_home_featured3_title_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Post Meta Color',
	'id'       => 'penci_home_featured_meta_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Posts Meta Color For Style 3, Style 4, Style 11, Style 14',
	'id'       => 'penci_home_featured3_meta_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Color for Links on Post Meta',
	'id'       => 'penci_home_featured_metalink_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Text Color for "View All" Button',
	'id'       => 'penci_home_featured_viewall_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Background Color for "View All" Button',
	'id'       => 'penci_home_featured_viewall_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Accent Color',
	'id'       => 'penci_home_featured_accent_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Posts Overlay Background Color For Style 3 & Style 11',
	'id'       => 'penci_home_featured3_overlay_color',
);
$options[] = array(
	'default'  => '0.15',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Posts Overlay Opacity For Style 3 & Style 11',
	'id'       => 'penci_home_featured3_overlay_opacity',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'0'    => '0',
		'0.05' => '0.05',
		'0.1'  => '0.1',
		'0.15' => '0.15',
		'0.2'  => '0.2',
		'0.25' => '0.25',
		'0.3'  => '0.3',
		'0.35' => '0.35',
		'0.4'  => '0.4',
		'0.45' => '0.45',
		'0.5'  => '0.5',
		'0.55' => '0.55',
		'0.6'  => '0.6',
		'0.65' => '0.65',
		'0.7'  => '0.7',
		'0.75' => '0.75',
		'0.8'  => '0.8',
		'0.85' => '0.85',
		'0.9'  => '0.9',
		'0.95' => '0.95',
		'1'    => '1',
	)
);
$options[] = array(
	'default'  => '0.7',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Posts Overlay Opacity on Hover For Style 3 & Style 11',
	'id'       => 'penci_home_featured3_overlay_hover_opacity',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'0'    => '0',
		'0.05' => '0.05',
		'0.1'  => '0.1',
		'0.15' => '0.15',
		'0.2'  => '0.2',
		'0.25' => '0.25',
		'0.3'  => '0.3',
		'0.35' => '0.35',
		'0.4'  => '0.4',
		'0.45' => '0.45',
		'0.5'  => '0.5',
		'0.55' => '0.55',
		'0.6'  => '0.6',
		'0.65' => '0.65',
		'0.7'  => '0.7',
		'0.75' => '0.75',
		'0.8'  => '0.8',
		'0.85' => '0.85',
		'0.9'  => '0.9',
		'0.95' => '0.95',
		'1'    => '1',
	)
);

return $options;
