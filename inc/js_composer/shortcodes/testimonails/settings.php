<?php
$group_color = 'Typo & Color';

vc_map( array(
	'base'          => 'goso_testimonails',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => goso_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/testimonails/frontend.php',
	'weight'        => 700,
	'name'          => goso_get_theme_name('Goso').' '.esc_html__( 'Testimonails', 'authow' ),
	'description'   => __( 'Testimonails Block', 'authow' ),
	'controls'      => 'full',
	'params'        => array_merge(
		array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Design style', 'authow' ),
				'param_name' => 'style',
				'std'        => 's1',
				'value'      => array(
					esc_html__( 'Style 1', 'authow' ) => 's1',
					esc_html__( 'Style 2', 'authow' ) => 's2',
					esc_html__( 'Style 3', 'authow' ) => 's3'
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Columns', 'authow' ),
				'param_name' => 'columns',
				'value'      => array(
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
				),
				'std' => 2
			),
			array(
				'type'             => 'goso_number',
				'param_name'       => 'p_name_marbottom',
				'heading'          => __( 'Name Margin Top', 'authow' ),
				'value'            => '',
				'std'              => '',
				'suffix'           => 'px',
				'min'              => 1,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'goso_number',
				'param_name'       => 'p_company_marbottom',
				'heading'          => __( 'Company/Position Margin Top', 'authow' ),
				'value'            => '',
				'std'              => '',
				'suffix'           => 'px',
				'min'              => 1,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'goso_number',
				'param_name'       => 'p_rating_marbottom',
				'heading'          => __( 'Rating Margin Top', 'authow' ),
				'value'            => '',
				'std'              => '',
				'suffix'           => 'px',
				'min'              => 1,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'goso_number',
				'param_name'       => 'p_desc_marbottom',
				'heading'          => __( 'Description Margin Top', 'authow' ),
				'value'            => '',
				'std'              => '',
				'suffix'           => 'px',
				'min'              => 1,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'goso_number',
				'param_name'       => 'p_desc_padding',
				'heading'          => __( 'Description Padding', 'authow' ),
				'value'            => '',
				'std'              => '',
				'suffix'           => 'px',
				'min'              => 1,
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Slider option
			array(
				'type'             => 'textfield',
				'param_name'       => 'heading_slider_settings',
				'heading'          => esc_html__( 'Slider options', 'authow' ),
				'value'            => '',
				'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Slides Per View', 'authow' ),
				'param_name' => 'slider_item',
				'value'      => array(
					1 => 1,
					2 => 2,
					3 => 3,
				),
				'std' => 1
			),

			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Autoplay', 'authow' ),
				'param_name' => 'autoplay',
				'value'      => array( esc_html__( 'Yes', 'authow' ) => 'yes' ),
				'std'        => '',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Slider Loop', 'authow' ),
				'param_name' => 'loop',
				'value'      => array( esc_html__( 'Yes', 'authow' ) => 'yes' ),
				'std'        => 'yes',
			),
			array(
				'type'       => 'textfield',
				'param_name' => 'auto_time',
				'heading'    => esc_html__( 'Slider Auto Time (at x seconds)', 'authow' ),
				'value'      => 4000,
			),
			array(
				'type'       => 'textfield',
				'param_name' => 'speed',
				'heading'    => esc_html__( 'Slider Speed (at x seconds)', 'authow' ),
				'value'      => 800,
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Show next/prev buttons', 'authow' ),
				'param_name' => 'shownav',
				'value'      => array( esc_html__( 'Yes', 'authow' ) => 'yes' ),
				'std'        => 'yes',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Show dots navigation', 'authow' ),
				'param_name' => 'showdots',
				'value'      => array( esc_html__( 'Yes', 'authow' ) => 'yes' ),
			),
			array(
				'type'       => 'param_group',
				'heading'    => '',
				'param_name' => 'testimonails',
				'group'      => 'Testimonials',
				'value'      => urlencode( json_encode( array(
					array(
						'testi_name'    => 'Testimonails 1',
						'testi_desc'    => 'I am text block. Click edit button to change this text.',
						'testi_company' => 'Company/Position',
						'testi_link'    => '#'
					),
					array(
						'testi_name'    => 'Testimonails 2',
						'testi_desc'    => 'I am text block. Click edit button to change this text.',
						'testi_company' => 'Company/Position',
						'testi_link'    => '#'
					),
					array(
						'testi_name'    => 'Testimonails 3',
						'testi_desc'    => 'I am text block. Click edit button to change this text.',
						'testi_company' => 'Company/Position',
						'testi_link'    => '#'
					)
				) ) ),
				'params'     => array(
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Name', 'authow' ),
						'param_name'  => 'testi_name',
						'admin_label' => true,
						'description' => __( 'Insert the name of the person.', 'authow' ),
					),
					array(
						'type'        => 'attach_image',
						'heading'     => __( 'Custom Avatar', 'authow' ),
						'param_name'  => 'testi_image',
						'value'       => '',
						'description' => __( 'Upload a custom avatar image. Recommended 70×70 pixels', 'authow' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Company/Position', 'authow' ),
						'param_name'  => 'testi_company',
						'description' => __( 'Insert the name of the company.', 'authow' ),
					),
					array(
						'type'        => 'textarea',
						'heading'     => __( 'Description', 'authow' ),
						'param_name'  => 'testi_desc',
						'description' => __( 'Add the testimonial description..', 'authow' ),
					),
					array(
						'type'       => 'dropdown',
						'heading'    => __( 'Rating', 'authow' ),
						'param_name' => 'testi_rating',
						'value'      => array(
							1 => 1,
							2 => 2,
							3 => 3,
							4 => 4,
							5 => 5
						),
						'std'        => 5,
						'dependency' => array( 'element' => 'style', 'value' => array( 's3' ) ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Link', 'authow' ),
						'param_name'  => 'testi_link',
						'description' => __( 'Add the url the company name will link to', 'authow' ),
					)
				),
			),
		),
		array(
			// Icon typo
			array(
				'type'             => 'textfield',
				'param_name'       => 'heading_icon_settings',
				'heading'          => esc_html__( 'Icon Colors', 'authow' ),
				'value'            => '',
				'group'            => $group_color,
				'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Icon Block Quote Color', 'authow' ),
				'param_name'       => 'icon_quote_color',
				'group'            => $group_color,
			),array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Icon Block Quote Background Color', 'authow' ),
				'param_name'       => 'icon_quote_bgcolor',
				'group'            => $group_color,
			),
			// Name color
			array(
				'type'             => 'textfield',
				'param_name'       => 'heading_name_settings',
				'heading'          => esc_html__( 'Name Colors', 'authow' ),
				'value'            => '',
				'group'            => $group_color,
				'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Name Color', 'authow' ),
				'param_name'       => 'name_color',
				'group'            => $group_color,
			),
			array(
				'type'             => 'goso_number',
				'param_name'       => 'name_size',
				'heading'          => __( 'Font Size for Position', 'authow' ),
				'value'            => '',
				'std'              => '',
				'suffix'           => 'px',
				'min'              => 1,
				'group'            => $group_color,
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Custom Font Family for Name', 'authow' ),
				'param_name' => 'use_name_typo',
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'group'      => $group_color,
			),
			array(
				'type'             => 'google_fonts',
				'param_name'       => 'name_typo',
				'value'            => '',
				'group'            => $group_color,
				'dependency'       => array( 'element' => 'use_name_typo', 'value' => 'yes' ),
			),
			// Company/Position Colors
			array(
				'type'             => 'textfield',
				'param_name'       => 'heading_pos_settings',
				'heading'          => esc_html__( 'Company/Position Color', 'authow' ),
				'value'            => '',
				'group'            => $group_color,
				'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Company/Position Color', 'authow' ),
				'param_name'       => 'company_color',
				'group'            => $group_color,
			),
			array(
				'type'             => 'goso_number',
				'param_name'       => 'company_size',
				'heading'          => __( 'Font Size for Company/Position', 'authow' ),
				'value'            => '',
				'std'              => '',
				'suffix'           => 'px',
				'min'              => 1,
				'group'            => $group_color,
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Custom Font Family for Company/Position', 'authow' ),
				'param_name' => 'use_company_typo',
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'group'      => $group_color,
			),
			array(
				'type'             => 'google_fonts',
				'param_name'       => 'company_typo',
				'value'            => '',
				'group'            => $group_color,
				'dependency'       => array( 'element' => 'use_company_typo', 'value' => 'yes' ),
			),
			// Description Colors
			array(
				'type'             => 'textfield',
				'param_name'       => 'heading_desc_settings',
				'heading'          => esc_html__( 'Description Colors', 'authow' ),
				'value'            => '',
				'group'            => $group_color,
				'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Description Color', 'authow' ),
				'param_name'       => 'desc_color',
				'group'            => $group_color,
			),
			array(
				'type'             => 'goso_number',
				'param_name'       => 'desc_size',
				'heading'          => __( 'Font Size for Description', 'authow' ),
				'value'            => '',
				'std'              => '',
				'suffix'           => 'px',
				'min'              => 1,
				'group'            => $group_color,
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Custom Font Family for Description', 'authow' ),
				'param_name' => 'use_desc_typo',
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'group'      => $group_color,
			),
			array(
				'type'             => 'google_fonts',
				'param_name'       => 'desc_typo',
				'value'            => '',
				'group'            => $group_color,
				'dependency'       => array( 'element' => 'use_desc_typo', 'value' => 'yes' ),
			),
			// Ratting Colors
			array(
				'type'             => 'textfield',
				'param_name'       => 'heading_rating_settings',
				'heading'          => esc_html__( 'Description Colors', 'authow' ),
				'value'            => '',
				'group'            => $group_color,
				'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Rating Color', 'authow' ),
				'param_name'       => 'rating_color',
				'group'            => $group_color,
			),
			array(
				'type'             => 'goso_number',
				'param_name'       => 'rating_size',
				'heading'          => __( 'Font Size for Rating', 'authow' ),
				'value'            => '',
				'std'              => '',
				'suffix'           => 'px',
				'min'              => 1,
				'group'            => $group_color,
			),

		),
		Goso_Vc_Params_Helper::extra_params()
	)
) );
