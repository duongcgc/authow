<?php
$group_color = 'Typo & Color';

vc_map( array(
	'base'          => 'goso_about_me',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => goso_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/about_me/frontend.php',
	'weight'        => 700,
	'name'          => goso_get_theme_name('Goso').' '.esc_html__( 'Widget About Me', 'authow' ),
	'description'   => __( 'About Me Block', 'authow' ),
	'controls'      => 'full',
	'params'        => array_merge(
		array(
			array(
				'type'        => 'attach_image',
				'heading'     => __( 'About Image', 'authow' ),
				'param_name'  => 'image',
				'value'       => '',
				'description' => __( 'Select image from media library.', 'authow' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'About Image size', 'authow' ),
				'param_name'  => 'thumbnail_size',
				'std'         => 'full',
				'description' => __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)). Leave parameter empty to use "thumbnail" by default.', 'authow' ),
			),
			array(
				'type'        => 'href',
				'heading'     => __( 'Add Link for About Image', 'authow' ),
				'param_name'  => 'link',
				'description' => __( 'If you want to clickable on the about me image link to other page, put the link here. Include http:// or https:// on the link', 'authow' )
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( ' Open in new window', 'authow' ),
				'param_name' => 'link_external'
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Add nofollow', 'authow' ),
				'param_name' => 'link_nofollow'
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Heading Text:', 'authow' ),
				'param_name'  => 'about_us_heading',
				'value'       => '',
				'admin_label' => true,
			),
			array(
				'type'       => 'textarea_html',
				'holder'     => 'div',
				'heading'    => __( 'About us text: ( you can use HTML here )', 'authow' ),
				'param_name' => 'content',
				'value'      => __( '<p>I am text block. Click edit button to change this text.</p>', 'authow' ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Align This Block', 'authow' ),
				'param_name' => 'align_block',
				'value'      => array(
					__( 'Align Left', 'authow' )   => 'left',
					__( 'Align Center', 'authow' ) => 'center',
					__( 'Align Right', 'authow' )  => 'right',
				),
				'std'        => 'center',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Title HTML Tag', 'authow' ),
				'param_name' => 'title_tag',
				'value'      => array(
					__( 'H1', 'authow' )   => 'h1',
					__( 'H2', 'authow' )   => 'h2',
					__( 'H3', 'authow' )   => 'h3',
					__( 'H4', 'authow' )   => 'h4',
					__( 'H5', 'authow' )   => 'h5',
					__( 'H6', 'authow' )   => 'h6',
					__( 'div', 'authow' )  => 'div',
					__( 'span', 'authow' ) => 'span',
					__( 'p', 'authow' )    => 'p',
				),
				'std'        => 'h3',
			),
			array(
				'type'        => 'checkbox',
				'heading'     => __( 'Make About Image Circle:', 'authow' ),
				'param_name'  => 'img_circle',
				'description' => __( 'To use this feature, please use square image for your image above to get best display.', 'authow' )
			),
			array(
				'type'        => 'checkbox',
				'heading'     => __( 'Disable Lazyload for About Me Image:', 'authow' ),
				'param_name'  => 'dis_lazyload',
				'description' => __( 'To use this feature, please use square image for your image above to get best display.', 'authow' )
			),
			array(
				'type'       => 'goso_number',
				'param_name' => 'image_space',
				'heading'    => __( 'Image Margin Bottom', 'authow' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'goso_number',
				'param_name' => 'image_width',
				'heading'    => __( 'Image Width', 'authow' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'goso_number',
				'param_name' => 'title_bottom_space',
				'heading'    => __( 'Title Margin Bottom', 'authow' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'edit_field_class' => 'vc_col-sm-6',
			),
		),
		Goso_Vc_Params_Helper::heading_block_params(),
		Goso_Vc_Params_Helper::params_heading_typo_color(),
		Goso_Vc_Params_Helper::extra_params(),
		array(
			array(
				'type'             => 'textfield',
				'param_name'       => 'heading_ptitle_settings',
				'heading'          => esc_html__( 'About us text', 'authow' ),
				'value'            => '',
				'group'            => $group_color,
				'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Heading Text Color', 'authow' ),
				'param_name'       => 'title_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Content Color', 'authow' ),
				'param_name'       => 'content_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
		)
	)
) );
