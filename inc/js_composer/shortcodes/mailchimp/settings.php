<?php
$group_icon  = 'Icon';
$group_color = 'Typo & Color';

vc_map( array(
	'base'          => "penci_mailchimp",
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => penci_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/mailchimp/frontend.php',
	'weight'        => 775,
	'name'          => penci_get_theme_name('Goso').' '.esc_html__( 'Mailchimp', 'authow' ),
	'description'   => 'Mailchimp Block',
	'controls'      => 'full',
	'params'        => array_merge(
		array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Choose Style your sign-up form', 'authow' ),
				'param_name'  => 'mailchimp_style',
				'std'         => 's1',
				'value'       => array(
					esc_html__( 'Style 1', 'authow' ) => 's1',
					esc_html__( 'Style 2', 'authow' ) => 's2',
					esc_html__( 'Style 3', 'authow' ) => 's3',
				),
				'description' => sprintf( __( 'You can edit your sign-up form in the <a href="%s">MailChimp for WordPress form settings</a>.', 'authow' ), admin_url( 'admin.php?page=mailchimp-for-wp-forms' ) ),
			),
			array(
				'type'       => 'penci_number',
				'param_name' => 'mc4wp_des_width',
				'heading'    => esc_html__( 'Description width', 'authow' ),
				'value'      => '',
				'suffix'     => 'px',
				'min'        => 1,
			),
			array(
				'type'             => 'penci_number',
				'param_name'       => 'mc4wp_des_martop',
				'heading'          => esc_html__( 'Margin top', 'authow' ),
				'value'            => '',
				'suffix'           => 'px',
				'min'              => 1,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'penci_number',
				'param_name'       => 'mc4wp_des_marbottom',
				'heading'          => esc_html__( 'Margin bottom', 'authow' ),
				'value'            => '',
				'suffix'           => 'px',
				'min'              => 1,
				'edit_field_class' => 'vc_col-sm-6',
			)
		),
		Goso_Vc_Params_Helper::heading_block_params(),
		Goso_Vc_Params_Helper::params_heading_typo_color(),
		array(
			array(
				'type'             => 'textfield',
				'param_name'       => 'color_genral_css',
				'heading'          => esc_html__( ' Sign-up form colors', 'authow' ),
				'value'            => '',
				'group'            => $group_color,
				'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Background color', 'authow' ),
				'param_name'       => 'mc4wp_bg_color',
				'group'            => $group_color,
				'dependency'       => array( 'element' => 'mailchimp_style', 'value' => array( 's2', 's3' ) ),
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Description color', 'authow' ),
				'param_name'       => 'mc4wp_des_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Input name & email background color', 'authow' ),
				'param_name'       => 'mc4wp_bg_input_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( ' Input name & email border color', 'authow' ),
				'param_name'       => 'mc4wp_border_input_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Input name & email text color', 'authow' ),
				'param_name'       => 'mc4wp_text_input',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Placeholder input name & email color', 'authow' ),
				'param_name'       => 'mc4wp_placeh_input',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),

			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Button submit text color', 'authow' ),
				'param_name'       => 'mc4wp_submit_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Button submit background color', 'authow' ),
				'param_name'       => 'mc4wp_submit_bgcolor',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Button submit border color', 'authow' ),
				'param_name'       => 'mc4wp_submit_border_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Button submit hover text color', 'authow' ),
				'param_name'       => 'mc4wp_submit_hcolor',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Button submit hover background color', 'authow' ),
				'param_name'       => 'mc4wp_submit_hbgcolor',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Button submit hover border color', 'authow' ),
				'param_name'       => 'mc4wp_submit_hborder_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
		),
		Goso_Vc_Params_Helper::extra_params()
	)
) );
