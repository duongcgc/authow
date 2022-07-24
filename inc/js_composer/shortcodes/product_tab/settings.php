<?php
vc_map(
	array(
		'name'                    => penci_get_theme_name('Goso').' '.esc_html__( 'Products tab', 'authow' ),
		'base'                    => 'penci_product_tab',
		'as_child'                => array( 'only' => 'penci_products_tabs' ),
		'content_element'         => true,
		'show_settings_on_create' => true,
		'html_template'           => get_template_directory() . '/inc/js_composer/shortcodes/product_tab/frontend.php',
		'category'                => penci_get_theme_name('Authow'),
		'description'             => esc_html__( 'Product tabs for your marketplace', 'authow' ),
		'icon'                    => get_template_directory_uri() . '/images/vc-icon.png',
		'params'                  => array_merge( array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Tab Title', 'authow' ),
				'param_name'  => 'title',
				'admin_label' => true,
			),
			/**
			 * Icon
			 */
			array(
				'type'             => 'attach_image',
				'heading'          => esc_html__( 'Icon for the tab', 'authow' ),
				'param_name'       => 'icon',
				'hint'             => esc_html__( 'Select icon from media library.', 'authow' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Icon size', 'authow' ),
				'param_name'       => 'icon_size',
				'hint'             => esc_html__( 'Enter image size. Example: \'thumbnail\', \'medium\', \'large\', \'full\' or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use \'thumbnail\' size.', 'authow' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'description'      => esc_html__( 'Example: \'thumbnail\', \'medium\', \'large\', \'full\' or enter image size in pixels: \'200x100\'.', 'authow' ),
			)
		), penci_get_products_shortcode_params() )
	)
);
