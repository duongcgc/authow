<?php
$group_icon  = 'Icon';
$group_color = 'Typo & Color';

vc_map( array(
	'base'          => "goso_instagram",
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => goso_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/instagram/frontend.php',
	'weight'        => 775,
	'name'          => goso_get_theme_name('Goso').' '.esc_html__( 'Instagram Feed', 'authow' ),
	'description'   => 'Instagram Block',
	'controls'      => 'full',
	'params'        => array_merge(
		array(
			array(
				'type'             => 'textfield',
				'param_name'       => 'heading_meta_settings',
				'heading'          => esc_html__( 'You need to connect to your Instagram account via "Dashboard > Authow > Connect Instagram" first.', 'authow' ),
				'value'            => '',
				'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Number of images to show', 'authow' ),
				'param_name' => 'images_number',
				'value'      => array(
					1  => 1,
					2  => 2,
					3  => 3,
					4  => 4,
					5  => 5,
					6  => 6,
					7  => 7,
					8  => 8,
					9  => 9,
					10 => 10,
					11 => 11,
					12 => 12
				),
				'std'        => '9',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Check for new images every', 'authow' ),
				'param_name'  => 'refresh_hour',
				'std'         => '5',
				'description' => 'Unix is hour(s)',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Template', 'authow' ),
				'param_name' => 'template',
				'value'      => array(
					'Thumbnails - Without Border' => 'thumbs-no-border',
					'Thumbnails'                  => 'thumbs',
					'Slider - Normal'             => 'slider',
					'Slider - Overlay Text'       => 'slider-overlay'
				),
				'std'        => 'thumbs',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Number of Columns:', 'authow' ),
				'param_name' => 'columns',
				'value'      => array(
					1  => 1,
					2  => 2,
					3  => 3,
					4  => 4,
					5  => 5,
					6  => 6,
					7  => 7,
					8  => 8,
					9  => 9,
					10 => 10,
				),
				'std'        => '3',
				'dependency' => array( 'element' => 'template', 'value' => array( 'thumbs-no-border', 'thumbs' ) ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Order by', 'authow' ),
				'param_name' => 'orderby',
				'value'      => array(
					__( 'Date - Ascending', 'authow' )        => 'date-ASC',
					__( 'Date - Descending', 'authow' )       => 'date-DESC',
					__( 'Popularity - Ascending', 'authow' )  => 'popular-ASC',
					__( 'Popularity - Descending', 'authow' ) => 'popular-DESC',
					__( 'Random', 'authow' )                  => 'rand',
				),
				'std'        => 'rand',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'On click action', 'authow' ),
				'param_name' => 'images_link',
				'value'      => array(
					__( 'None', 'authow' )              => '',
					__( 'Instagram image', 'authow' )   => 'image_url',
					__( 'Instagram Profile', 'authow' ) => 'user_url',
					__( 'Attachment Page', 'authow' )   => 'attachment'
				),
				'std'        => 'rand',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Slider Speed (at x seconds)', 'authow' ),
				'param_name' => 'slidespeed',
				'dependency' => array( 'element' => 'template', 'value' => array( 'slider', 'slider-overlay' ) ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Slider Navigation Controls', 'authow' ),
				'param_name' => 'controls',
				'value'      => array(
					__( 'None', 'authow' )        => 'none',
					__( 'Prev & Next', 'authow' ) => 'prev_next',
					__( 'Dotted', 'authow' )      => 'numberless',
				),
				'std'        => 'prev_next',
				'dependency' => array( 'element' => 'template', 'value' => array( 'slider', 'slider-overlay' ) ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Number of words in caption', 'authow' ),
				'param_name' => 'caption_words',
				'default'    => 100,
				'dependency' => array( 'element' => 'template', 'value' => array( 'slider', 'slider-overlay' ) ),
			),
		),
		Goso_Vc_Params_Helper::heading_block_params(),
		Goso_Vc_Params_Helper::params_heading_typo_color(),
		array(
			array(
				'type'       => 'css_editor',
				'heading'    => __( 'CSS box', 'authow' ),
				'param_name' => 'css',
				'group'      => __( 'Design Options', 'authow' ),
			)
		)
	)
) );
