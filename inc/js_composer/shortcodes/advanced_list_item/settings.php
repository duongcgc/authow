<?php

vc_map(
	array(
		'name'            => esc_html__( 'Extra menu list item', 'authow' ),
		'base'            => 'goso_advanced_list_item',
		'as_child'        => array( 'only' => 'goso_advanced_list' ),
		'content_element' => true,
		'category'        => esc_html__( 'Authow', 'authow' ),
		'description'     => esc_html__( 'A link for your extra menu list', 'authow' ),
		'html_template'   => get_template_directory() . '/inc/js_composer/shortcodes/advanced_list_item/frontend.php',
		'icon'            => get_template_directory_uri() . '/images/vc-icon.png',
		'params'          => array(
			/**
			 * Link
			 */
			array(
				'type'       => 'goso_heading_title',
				'holder'     => 'div',
				'title'      => esc_html__( 'Link', 'authow' ),
				'param_name' => 'link_divider',
			),
			array(
				'type'             => 'textfield',
				'holder'           => 'div',
				'heading'          => esc_html__( 'Title', 'authow' ),
				'param_name'       => 'title',
				'edit_field_class' => 'vc_col-sm-6 vc_column',

			),
			array(
				'type'             => 'vc_link',
				'heading'          => esc_html__( 'Link', 'authow' ),
				'param_name'       => 'link',
				'hint'             => esc_html__( 'Enter URL if you want this parent menu item to have a link.', 'authow' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			/**
			 * Label
			 */
			array(
				'type'       => 'goso_heading_title',
				'holder'     => 'div',
				'title'      => esc_html__( 'Label', 'authow' ),
				'param_name' => 'label_divider',
			),
			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Label text (optional)', 'authow' ),
				'param_name'       => 'label_text',
				'hint'             => esc_html__( 'Write a label for this menu item badge like “Sale”, “Hot”, “New” etc. Leave empty to not add any badges.', 'authow' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Label color', 'authow' ),
				'param_name'       => 'label',
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			/**
			 * Image
			 */
			array(
				'type'       => 'goso_heading_title',
				'holder'     => 'div',
				'title'      => esc_html__( 'Image', 'authow' ),
				'param_name' => 'image_divider',
			),
			array(
				'type'             => 'attach_image',
				'heading'          => esc_html__( 'Image', 'authow' ),
				'param_name'       => 'image',
				'value'            => '',
				'hint'             => esc_html__( 'Select image from media library.', 'authow' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Image size', 'authow' ),
				'param_name'       => 'image_size',
				'hint'             => esc_html__( 'Enter image size. Example: \'thumbnail\', \'medium\', \'large\', \'full\' or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use \'thumbnail\' size.', 'authow' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'description'      => esc_html__( 'Example: \'thumbnail\', \'medium\', \'large\', \'full\' or enter image size in pixels: \'200x100\'.', 'authow' ),
			),
			/**
			 * Extra
			 */
			array(
				'type'       => 'goso_heading_title',
				'holder'     => 'div',
				'title'      => esc_html__( 'Extra options', 'authow' ),
				'param_name' => 'extra_divider',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra class name', 'authow' ),
				'param_name' => 'el_class',
				'hint'       => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'authow' ),
			),
		),
	)
);
