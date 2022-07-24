<?php
$group_icon  = 'Icon';
$group_color = 'Typo & Color';

vc_map( array(
	'base'          => "goso_google_map",
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => goso_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/google_map/frontend.php',
	'weight'        => 775,
	'name'          => goso_get_theme_name('Goso').' '.esc_html__( 'Google Map', 'authow' ),
	'description'   => 'Map Block',
	'controls'      => 'full',
	'params'        => array(
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Insert Map Using', 'authow' ),
			'param_name' => 'map_using',
			'value'      => array(
				esc_html__( 'Address', 'authow' )     => 'address',
				esc_html__( 'Coordinates', 'authow' ) => 'coordinates',
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Address', 'authow' ),
			'param_name'  => 'address',
			'admin_label' => true,
			'dependency'  => array(
				'element' => 'map_using',
				'value'   => 'address'
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Latitude', 'authow' ),
			'param_name'  => 'latitude',
			'admin_label' => true,
			'dependency'  => array(
				'element' => 'map_using',
				'value'   => 'coordinates'
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Longtitude', 'authow' ),
			'param_name'  => 'longtitude',
			'admin_label' => true,
			'dependency'  => array(
				'element' => 'map_using',
				'value'   => 'coordinates'
			)
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Map type', 'authow' ),
			'param_name' => 'map_type',
			'value'      => array(
				esc_html__( 'Road', 'authow' )      => 'road',
				esc_html__( 'Satellite', 'authow' ) => 'satellite',
				esc_html__( 'Hybrid', 'authow' )    => 'hybrid',
				esc_html__( 'Terrain', 'authow' )   => 'terrain',
				esc_html__( 'Custom', 'authow' )    => 'custom',
			)
		),
		array(
			'type'             => 'goso_number',
			'heading'          => esc_html__( 'Width', 'authow' ),
			'param_name'       => 'map_width',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'type'             => 'goso_number',
			'heading'          => esc_html__( 'Height', 'authow' ),
			'param_name'       => 'map_height',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'type'       => 'attach_image',
			'heading'    => esc_html__( 'Marker Image', 'authow' ),
			'param_name' => 'marker_img',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Marker Title', 'authow' ),
			'param_name'  => 'marker_title',
			'admin_label' => true,
		),
		array(
			'type'        => 'exploded_textarea_safe',
			'heading'     => esc_html__( 'Info Window', 'authow' ),
			'param_name'  => 'info_window',
			'description' => ''
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Zoom', 'authow' ),
			'param_name'       => 'map_is_zoom',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Pan', 'authow' ),
			'param_name'       => 'map_pan',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Map scale', 'authow' ),
			'param_name'       => 'map_scale',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Street view', 'authow' ),
			'param_name'       => 'map_street_view',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Rotate', 'authow' ),
			'param_name'       => 'map_rotate',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'             => 'checkbox',
			'heading'          => esc_html__( 'Overview map', 'authow' ),
			'param_name'       => 'map_overview',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Zoom', 'authow' ),
			'param_name' => 'map_zoom',
			'value'      => array(
				6  => 6,
				7  => 7,
				8  => 8,
				9  => 9,
				10 => 10,
				11 => 11,
				12 => 12,
				13 => 13,
				14 => 14,
				15 => 15,
				16 => 16,
			),
			'std'        => '8',
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Scrollwheel', 'authow' ),
			'param_name' => 'map_scrollwheel',
		),

		vc_map_add_css_animation(),

		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'authow' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'authow' ),
		),
		array(
			'type'       => 'css_editor',
			'heading'    => __( 'CSS box', 'authow' ),
			'param_name' => 'css',
			'group'      => __( 'Design Options', 'authow' ),
		)
	)
) );
