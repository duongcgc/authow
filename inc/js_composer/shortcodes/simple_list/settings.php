<?php

vc_map(
	array(
		'name'          => penci_get_theme_name('Goso').' '.esc_html__( 'Simple List', 'authow' ),
		'base'          => 'penci_simple_list',
		'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/simple_list/frontend.php',
		'category'      => penci_get_theme_name('Authow'),
		'description'   => esc_html__( 'Display a list with icon', 'authow' ),
		'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
		'params'        => array(
			// General
			array(
				'type'       => 'penci_heading_title',
				'title'      => esc_html__( 'General settings', 'authow' ),
				'param_name' => 'general_divider',
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'List items font size', 'authow' ),
				'param_name'       => 'size',
				'value'            => array(
					esc_html__( 'Default (14px)', 'authow' )     => 'default',
					esc_html__( 'Medium (16px)', 'authow' )      => 'medium',
					esc_html__( 'Large (18px)', 'authow' )       => 'large',
					esc_html__( 'Extra Large (22px)', 'authow' ) => 'extra-large',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Color scheme', 'authow' ),
				'param_name'       => 'color_scheme',
				'value'            => array(
					esc_html__( 'Inherit', 'authow' ) => '',
					esc_html__( 'Light', 'authow' )   => 'light',
					esc_html__( 'Dark', 'authow' )    => 'dark',
					esc_html__( 'Custom', 'authow' )  => 'custom',
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Text color', 'authow' ),
				'param_name'       => 'text_color',
				'dependency'       => array(
					'element' => 'color_scheme',
					'value'   => array( 'custom' ),
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Text color hover', 'authow' ),
				'param_name'       => 'text_color_hover',
				'dependency'       => array(
					'element' => 'color_scheme',
					'value'   => array( 'custom' ),
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Align', 'authow' ),
				'param_name'       => 'align',
				'value'            => array(
					esc_html__( 'Left', 'authow' )   => 'left',
					esc_html__( 'Center', 'authow' ) => 'center',
					esc_html__( 'Right', 'authow' )  => 'right',
				),
				'std'              => 'left',
				'edit_field_class' => 'vc_col-sm-6 vc_column title-align',
			),
			array(
				'type'       => 'penci_heading_title',
				'holder'     => 'div',
				'title'      => esc_html__( 'Extra settings', 'authow' ),
				'param_name' => 'extra_divider',
			),
			( function_exists( 'vc_map_add_css_animation' ) ) ? vc_map_add_css_animation( true ) : '',
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'authow' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'authow' ),
			),
			// List
			array(
				'type'       => 'param_group',
				'param_name' => 'list',
				'group'      => esc_html__( 'List', 'authow' ),
				'params'     => array(
					array(
						'type'       => 'vc_link',
						'heading'    => esc_html__( 'Link', 'authow' ),
						'param_name' => 'link',
					),
					array(
						'type'       => 'textarea',
						'heading'    => esc_html__( 'Content', 'authow' ),
						'param_name' => 'list-content',
					),
				),
			),
			// Icon
			array(
				'type'       => 'penci_heading_title',
				'holder'     => 'div',
				'title'      => esc_html__( 'Icon settings', 'authow' ),
				'group'      => esc_html__( 'Icon', 'authow' ),
				'param_name' => 'icon_divider',
			),
			array(
				'type'             => 'dropdown',
				'group'            => esc_html__( 'Icon', 'authow' ),
				'heading'          => esc_html__( 'List type', 'authow' ),
				'value'            => array(
					esc_html__( 'With icon', 'authow' )    => 'icon',
					esc_html__( 'With image', 'authow' )   => 'image',
					esc_html__( 'Ordered', 'authow' )      => 'ordered',
					esc_html__( 'Unordered', 'authow' )    => 'unordered',
					esc_html__( 'Without icon', 'authow' ) => 'without',
				),
				'param_name'       => 'list_type',
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'dropdown',
				'group'            => esc_html__( 'Icon', 'authow' ),
				'heading'          => esc_html__( 'List style', 'authow' ),
				'value'            => array(
					esc_html__( 'Default', 'authow' ) => 'default',
					esc_html__( 'Rounded', 'authow' ) => 'rounded',
					esc_html__( 'Square', 'authow' )  => 'square',
				),
				'param_name'       => 'list_style',
				'dependency'       => array(
					'element' => 'list_type',
					'value'   => array( 'icon', 'ordered', 'unordered' ),
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'attach_image',
				'heading'          => esc_html__( 'Image', 'authow' ),
				'group'            => esc_html__( 'Icon', 'authow' ),
				'param_name'       => 'image',
				'value'            => '',
				'description'      => esc_html__( 'Select image from media library.', 'authow' ),
				'dependency'       => array(
					'element' => 'list_type',
					'value'   => array( 'image' ),
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Image size', 'authow' ),
				'group'            => esc_html__( 'Icon', 'authow' ),
				'param_name'       => 'img_size',
				'description'      => esc_html__( 'Enter image size. Example: \'thumbnail\', \'medium\', \'large\', \'full\' or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use \'thumbnail\' size.', 'authow' ),
				'dependency'       => array(
					'element' => 'list_type',
					'value'   => array( 'image' ),
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'description'      => esc_html__( 'Example: \'thumbnail\', \'medium\', \'large\', \'full\' or enter image size in pixels: \'200x100\'.', 'authow' ),
			),
			array(
				'type'        => 'dropdown',
				'group'       => esc_html__( 'Icon', 'authow' ),
				'heading'     => esc_html__( 'Icon library', 'authow' ),
				'value'       => array(
					esc_html__( 'Font Awesome', 'authow' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'authow' )  => 'openiconic',
					esc_html__( 'Typicons', 'authow' )     => 'typicons',
					esc_html__( 'Entypo', 'authow' )       => 'entypo',
					esc_html__( 'Linecons', 'authow' )     => 'linecons',
					esc_html__( 'Mono Social', 'authow' )  => 'monosocial',
					esc_html__( 'Material', 'authow' )     => 'material',
				),
				'param_name'  => 'icon_library',
				'description' => esc_html__( 'Select icon library.', 'authow' ),
				'dependency'  => array(
					'element' => 'list_type',
					'value'   => 'icon',
				),
			),
			array(
				'type'        => 'iconpicker',
				'group'       => esc_html__( 'Icon', 'authow' ),
				'heading'     => esc_html__( 'Icon', 'authow' ),
				'param_name'  => 'icon_fontawesome',
				'value'       => 'fa fa-adjust',
				'settings'    => array(
					'emptyIcon'    => false,
					'iconsPerPage' => 4000,
				),
				'dependency'  => array(
					'element' => 'icon_library',
					'value'   => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'authow' ),
			),
			array(
				'type'        => 'iconpicker',
				'group'       => esc_html__( 'Icon', 'authow' ),
				'heading'     => esc_html__( 'Icon', 'authow' ),
				'param_name'  => 'icon_openiconic',
				'settings'    => array(
					'emptyIcon'    => false,
					'type'         => 'openiconic',
					'iconsPerPage' => 4000,
				),
				'dependency'  => array(
					'element' => 'icon_library',
					'value'   => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'authow' ),
			),
			array(
				'type'        => 'iconpicker',
				'group'       => esc_html__( 'Icon', 'authow' ),
				'heading'     => esc_html__( 'Icon', 'authow' ),
				'param_name'  => 'icon_typicons',
				'settings'    => array(
					'emptyIcon'    => false,
					'type'         => 'typicons',
					'iconsPerPage' => 4000,
				),
				'dependency'  => array(
					'element' => 'icon_library',
					'value'   => 'typicons',
				),
				'description' => esc_html__( 'Select icon from library.', 'authow' ),
			),
			array(
				'type'       => 'iconpicker',
				'group'      => esc_html__( 'Icon', 'authow' ),
				'heading'    => esc_html__( 'Icon', 'authow' ),
				'param_name' => 'icon_entypo',
				'settings'   => array(
					'emptyIcon'    => false,
					'type'         => 'entypo',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_library',
					'value'   => 'entypo',
				),
			),
			array(
				'type'        => 'iconpicker',
				'group'       => esc_html__( 'Icon', 'authow' ),
				'heading'     => esc_html__( 'Icon', 'authow' ),
				'param_name'  => 'icon_linecons',
				'settings'    => array(
					'emptyIcon'    => false,
					'type'         => 'linecons',
					'iconsPerPage' => 4000,
				),
				'dependency'  => array(
					'element' => 'icon_library',
					'value'   => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'authow' ),
			),
			array(
				'type'        => 'iconpicker',
				'group'       => esc_html__( 'Icon', 'authow' ),
				'heading'     => esc_html__( 'Icon', 'authow' ),
				'param_name'  => 'icon_monosocial',
				'settings'    => array(
					'emptyIcon'    => false,
					'type'         => 'monosocial',
					'iconsPerPage' => 4000,
				),
				'dependency'  => array(
					'element' => 'icon_library',
					'value'   => 'monosocial',
				),
				'description' => esc_html__( 'Select icon from library.', 'authow' ),
			),
			array(
				'type'        => 'iconpicker',
				'group'       => esc_html__( 'Icon', 'authow' ),
				'heading'     => esc_html__( 'Icon', 'authow' ),
				'param_name'  => 'icon_material',
				'settings'    => array(
					'emptyIcon'    => false,
					'type'         => 'material',
					'iconsPerPage' => 4000,
				),
				'dependency'  => array(
					'element' => 'icon_library',
					'value'   => 'material',
				),
				'description' => esc_html__( 'Select icon from library.', 'authow' ),
			),
			array(
				'type'             => 'colorpicker',
				'group'            => esc_html__( 'Icon', 'authow' ),
				'heading'          => esc_html__( 'Icons color', 'authow' ),
				'param_name'       => 'icons_color',
				'dependency'       => array(
					'element' => 'list_type',
					'value'   => array( 'icon', 'ordered', 'unordered' ),
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'colorpicker',
				'group'            => esc_html__( 'Icon', 'authow' ),
				'heading'          => esc_html__( 'Icons color hover', 'authow' ),
				'param_name'       => 'icons_color_hover',
				'dependency'       => array(
					'element' => 'list_type',
					'value'   => array( 'icon', 'ordered', 'unordered' ),
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'colorpicker',
				'group'            => esc_html__( 'Icon', 'authow' ),
				'heading'          => esc_html__( 'Icons background color', 'authow' ),
				'param_name'       => 'icons_bg_color',
				'dependency'       => array(
					'element' => 'list_style',
					'value'   => array( 'rounded', 'square' ),
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'colorpicker',
				'group'            => esc_html__( 'Icon', 'authow' ),
				'heading'          => esc_html__( 'Icons background color hover', 'authow' ),
				'param_name'       => 'icons_bg_color_hover',
				'dependency'       => array(
					'element' => 'list_style',
					'value'   => array( 'rounded', 'square' ),
				),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			// Style
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__( 'CSS box', 'authow' ),
				'param_name' => 'css',
				'group'      => esc_html__( 'Design Options', 'authow' ),
			),
		),
	)
);
