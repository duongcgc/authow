<?php
vc_map( array(
	'base'          => 'goso_facebook_page',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => goso_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/facebook_page/frontend.php',
	'weight'        => 700,
	'name'          => goso_get_theme_name('Goso').' '.esc_html__( 'Facebook Page', 'authow' ),
	'description'   => __( 'Facebook Page Block', 'authow' ),
	'controls'      => 'full',
	'params'        => array_merge(
		array(
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Facebook Page Title:', 'authow' ),
				'param_name' => 'title_page',
				'std'        => esc_html__( 'Facebook', 'authow' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Facebook Page URL:', 'authow' ),
				'param_name'  => 'page_url',
				'admin_label' => true,
				'std'         => 'https://www.facebook.com/GosoDesign',
				'value'       => 'https://www.facebook.com/GosoDesign',
				'description' => esc_html__( 'EG. https://www.facebook.com/your-page/', 'authow' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Facebook Page Height::', 'authow' ),
				'param_name'  => 'page_height',
				'std'         => 290,
				'description' => esc_html__( 'This option is only applied when "Show Stream" option is checked', 'authow' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Hide Cover Image?', 'authow' ),
				'param_name' => 'hide_cover',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Hide Faces?', 'authow' ),
				'param_name' => 'hide_faces',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Hide Stream?', 'authow' ),
				'param_name' => 'hide_stream',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Custom Language', 'authow' ),
				'param_name'  => 'language',
				'admin_label' => true,
				'std'         => '',
				'value'       => '',
				'description' => __( 'Fill the language code to use on Facebook Page Box here( E.g: de_DE ). By default, the language will follow the site language. See more <a href="https://developers.facebook.com/docs/internationalization/" target="_blank">here</a>', 'authow' ),
			)
		),
		Goso_Vc_Params_Helper::heading_block_params(),
		Goso_Vc_Params_Helper::params_heading_typo_color(),
		Goso_Vc_Params_Helper::extra_params()
	)
) );
