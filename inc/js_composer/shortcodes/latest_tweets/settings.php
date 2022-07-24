<?php
$group_icon  = 'Icon';
$group_color = 'Typo & Color';

vc_map( array(
	'base'          => "penci_latest_tweets",
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => penci_get_theme_name( 'Authow' ),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/latest_tweets/frontend.php',
	'weight'        => 775,
	'name'          => penci_get_theme_name( 'Goso' ) . ' ' . esc_html__( 'Latest Tweets', 'authow' ),
	'description'   => 'Latest Tweets Block',
	'controls'      => 'full',
	'params'        => array_merge( array(
		array(
			'param_name' => 'custom_markup',
			'type'       => 'penci_custom_markup',
			'value'      => '<span style="color: #ff0000;">Note Important:</span> To use this widget you need fill complete your twitter information <a target="_blank" href="' . admin_url( 'options-general.php?page=tdf_settings' ) . '">here</a>',
		),
		array(
			'type'       => 'style',
			'heading'    => __( 'Layout:', 'authow' ),
			'param_name' => 'style',
			'value'      => array(
				__( 'Slider', 'authow' ) => 'slider',
				__( 'List', 'authow' )   => 'list',
			),
			'std'        => 'slider',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => __( 'Align This Widget:', 'authow' ),
			'param_name' => 'pc_aligncenter',
			'value'      => array(
				__( 'Align Center', 'authow' ) => 'pc_aligncenter',
				__( 'Align Left', 'authow' )   => 'pc_alignleft',
				__( 'Align Right', 'authow' )  => 'pc_alignright',
			),
			'std'        => 'pc_aligncenter',
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Hide tweets date?', 'authow' ),
			'param_name' => 'date',
			'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Disable Auto Play Tweets Slider?', 'authow' ),
			'param_name' => 'auto',
			'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
		),

		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Custom Reply text:', 'authow' ),
			'param_name' => 'reply',
			'std'        => esc_html__( 'Reply', 'authow' ),
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Custom Retweet text:', 'authow' ),
			'param_name' => 'retweet',
			'std'        => esc_html__( 'Retweet', 'authow' ),
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Custom Favorite text:', 'authow' ),
			'param_name' => 'favorite',
			'std'        => esc_html__( 'Favorite', 'authow' ),
		),
	), Goso_Vc_Params_Helper::heading_block_params(), Goso_Vc_Params_Helper::params_heading_typo_color(), array(
		array(
			'type'             => 'textfield',
			'param_name'       => 'color_Tweets_css',
			'heading'          => esc_html__( 'Tweets colors', 'authow' ),
			'value'            => '',
			'group'            => $group_color,
			'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Text color', 'authow' ),
			'param_name'       => 'tweets_text_color',
			'group'            => $group_color,
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'type'             => 'penci_number',
			'param_name'       => 'tweets_text_size',
			'heading'          => __( 'Font size for Text', 'authow' ),
			'value'            => '',
			'std'              => '',
			'suffix'           => 'px',
			'min'              => 1,
			'edit_field_class' => 'vc_col-sm-6',
			'group'            => $group_color,
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Date color', 'authow' ),
			'param_name'       => 'tweets_date_color',
			'group'            => $group_color,
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'type'             => 'penci_number',
			'param_name'       => 'tweets_date_size',
			'heading'          => __( 'Font size for Date', 'authow' ),
			'value'            => '',
			'std'              => '',
			'suffix'           => 'px',
			'min'              => 1,
			'edit_field_class' => 'vc_col-sm-6',
			'group'            => $group_color,
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Icon and Link color', 'authow' ),
			'param_name'       => 'tweets_link_color',
			'group'            => $group_color,
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'type'             => 'penci_number',
			'param_name'       => 'tweets_link_size',
			'heading'          => __( 'Font size for Link', 'authow' ),
			'value'            => '',
			'std'              => '',
			'suffix'           => 'px',
			'min'              => 1,
			'edit_field_class' => 'vc_col-sm-6',
			'group'            => $group_color,
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Dot background color', 'authow' ),
			'param_name'       => 'tweets_dot_color',
			'group'            => $group_color,
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Dot border and background active color', 'authow' ),
			'param_name'       => 'tweets_dot_hcolor',
			'group'            => $group_color,
			'edit_field_class' => 'vc_col-sm-6',
		),
	), Goso_Vc_Params_Helper::extra_params() )
) );
