<?php
$group_color = 'Font Size & Color';

$main_params = array(
	array(
		'type'        => 'loop',
		'heading'     => __( '', 'authow' ),
		'param_name'  => 'build_query',
		'value'       => 'post_type:post|size:10',
		'settings'    => array(
			'size'      => array( 'value' => 10, 'hidden' => false ),
			'post_type' => array( 'value' => 'post', 'hidden' => false )
		),
		'description' => __( 'Create WordPress loop, to filter your posts', 'authow' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => esc_html__( 'Custom "Top Posts" Text', 'authow' ),
		'param_name' => 'tpost_text',
		'std'        => 'Top Posts',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Style for "Top Posts" Text', 'authow' ),
		'value'      => array(
			'Default Style' => '',
			'Style 2' => 'nticker-style-2',
			'Style 3' => 'nticker-style-3',
			'Style 4' => 'nticker-style-4',
		),
		'param_name' => 'headline_style',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Display Next/Prev Icons as Buttons', 'authow' ),
		'param_name' => 'navs_buttons',
		'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Move Next/Prev Icons/Buttons To The Right Side', 'authow' ),
		'param_name'  => 'move_navs',
		'value'       => array( __( 'Yes', 'authow' ) => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Turn off Uppercase for "Top Posts" text', 'authow' ),
		'param_name' => 'headline_upper',
		'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => esc_html__( 'Custom Words Length for Post Titles', 'authow' ),
		'param_name' => 'title_length',
		'std'        => '8',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Turn off Uppercase for Post Titles', 'authow' ),
		'param_name' => 'titles_upper',
		'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Disable Auto Play', 'authow' ),
		'param_name' => 'autoplay',
		'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => esc_html__( 'Autoplay Timeout', 'authow' ),
		'param_name' => 'autotime',
		'description'    => esc_html__( '1000 = 1 second', 'authow' ),
		'std'        => '3000',
	),
	array(
		'type'       => 'textfield',
		'heading'    => esc_html__( 'Autoplay Speed', 'authow' ),
		'param_name' => 'autospeed',
		'description'    => esc_html__( '1000 = 1 second', 'authow' ),
		'std'        => '300',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Transition Animation', 'authow' ),
		'value'      => array(
			'Slide In Up' => '',
			'Fade In Right' => 'slideInRight',
			'Fade In' => 'fadeIn',
		),
		'param_name' => 'headline_anim',
	),
	
);


$typo_params    = array(
	array(
		'type'             => 'textfield',
		'param_name'       => 'heading_fontsize',
		'heading'          => esc_html__( 'Font Size', 'authow' ),
		'value'            => '',
		'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
		'group'            => $group_color,
	),
	array(
		'type'       => 'goso_number',
		'param_name' => 'tpost_size',
		'heading'    => __( 'Font size for "Top Posts" Text', 'authow' ),
		'value'      => '',
		'std'        => '',
		'suffix'     => 'px',
		'min'        => 1,
		'group'      => $group_color,
	),
	array(
		'type'       => 'goso_number',
		'param_name' => 'navs_size',
		'heading'    => __( 'Font size for Next/Prev Buttons', 'authow' ),
		'value'      => '',
		'std'        => '',
		'suffix'     => 'px',
		'min'        => 1,
		'group'      => $group_color,
	),
	array(
		'type'       => 'goso_number',
		'param_name' => 'ptitles_size',
		'heading'    => __( 'Font size for Post Titles', 'authow' ),
		'value'      => '',
		'std'        => '',
		'suffix'     => 'px',
		'min'        => 1,
		'group'      => $group_color,
	),

	// Colors
	array(
		'type'             => 'textfield',
		'param_name'       => 'heading_colors',
		'heading'          => esc_html__( 'Colors', 'authow' ),
		'value'            => '',
		'group'            => $group_color,
		'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Set Borders Around The News Ticker', 'authow' ),
		'param_name'       => 'border_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Background Color', 'authow' ),
		'param_name'       => 'bg_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( '"Top Posts" Background Color', 'authow' ),
		'param_name'       => 'tpost_bg',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( '"Top Posts" Text Color', 'authow' ),
		'param_name'       => 'tpost_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Next/Prev Icons Color', 'authow' ),
		'param_name'       => 'navs_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Next/Prev Icons Hover Color', 'authow' ),
		'param_name'       => 'navs_hcolor',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Next/Prev Buttons Background Color', 'authow' ),
		'param_name'       => 'navs_bg',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
		'dependency' => array( 'element' => 'navs_buttons', 'value' => 'yes' ),
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Next/Prev Buttons Hover Background Color', 'authow' ),
		'param_name'       => 'navs_hbg',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
		'dependency' => array( 'element' => 'navs_buttons', 'value' => 'yes' ),
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Post Title Color', 'authow' ),
		'param_name'       => 'ptitle_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Post Title Hover Color', 'authow' ),
		'param_name'       => 'ptitle_hcolor',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
);

vc_map( array(
	'base'          => 'goso_news_ticker',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => goso_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/news_ticker/frontend.php',
	'weight'        => 700,
	'name'          => goso_get_theme_name('Goso').' '.__( 'News Ticker', 'authow' ),
	'description'   => __( 'News Ticker', 'authow' ),
	'controls'      => 'full',
	'params'        => array_merge( $main_params, $typo_params )
) );
