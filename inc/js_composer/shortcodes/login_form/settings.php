<?php
$group_icon  = 'Icon';
$group_color = 'Typo & Color';

vc_map( array(
	'base'          => "goso_login_form",
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => goso_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/login_form/frontend.php',
	'weight'        => 775,
	'name'          => goso_get_theme_name('Goso').' '.esc_html__( 'Login/Register Form', 'authow' ),
	'description'   => 'Login/Register Form Block',
	'controls'      => 'full',
	'params'        => array_merge(
		array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Choose Form Type', 'authow' ),
				'param_name' => 'form_style',
				'description' => esc_html__( 'Please note that when a user is logged in, the registration form will be hidden. And if you select to show "Register" form, you need to go to Dashboard > Settings > General > on "Membership" select "Anyone can register" to make the Register form displays.', 'authow' ),
				'std'        => '',
				'value'      => array(
					esc_html__( 'Login', 'authow' )    => 'login',
					esc_html__( 'Register', 'authow' ) => 'register',
				)
			)
		),
		Goso_Vc_Params_Helper::heading_block_params(),
		Goso_Vc_Params_Helper::params_heading_typo_color(),
		array(
			array(
				'type'             => 'textfield',
				'param_name'       => 'color_genral_css',
				'heading'          => esc_html__( 'Form colors', 'authow' ),
				'value'            => '',
				'group'            => $group_color,
				'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Text color', 'authow' ),
				'param_name'       => 'form_text_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Input Text Color', 'authow' ),
				'param_name'       => 'form_input_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Input Placeholder Color', 'authow' ),
				'param_name'       => 'form_place_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Input Border Color', 'authow' ),
				'param_name'       => 'form_inputborder_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Link Color', 'authow' ),
				'param_name'       => 'form_link_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Link Hover Color', 'authow' ),
				'param_name'       => 'form_link_hcolor',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),

			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Button Text Color', 'authow' ),
				'param_name'       => 'form_button_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Button Background Color', 'authow' ),
				'param_name'       => 'form_button_bgcolor',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Button Text Hover Color', 'authow' ),
				'param_name'       => 'form_button_hcolor',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Button Hover Background Color', 'authow' ),
				'param_name'       => 'form_button_hbgcolor',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Login & Register Links Color', 'authow' ),
				'param_name'       => 'ploginregis_link',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
		),
		Goso_Vc_Params_Helper::extra_params()
	)
) );
