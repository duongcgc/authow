<?php
vc_map( array(
	'base'          => "goso_pintersest",
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => goso_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/pintersest/frontend.php',
	'weight'        => 775,
	'name'          => goso_get_theme_name('Goso').' '.esc_html__( 'Pintersest', 'authow' ),
	'description'   => 'Pintersest Block',
	'controls'      => 'full',
	'params'        => array_merge(
		array(
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Enter the <strong style="color: #ff0000;">username</strong> or <strong style="color: #ff0000;">username/board_name</strong> for load images:', 'authow' ),
				'param_name'  => 'pusername',
				'admin_label' => true,
				'std'         => 'thefirstmess/animals-cuteness',
				'default'     => 'thefirstmess/animals-cuteness',
				'description' => 'Example if you want to load a board has url <strong style="color: #ff0000;"><a href="https://www.pinterest.com/thefirstmess/animals-cuteness" target="_blank">https://www.pinterest.com/thefirstmess/animals-cuteness</a></strong> You need to fill <strong style="color: #ff0000;">thefirstmess/animals-cuteness</strong>',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Numbers image to show:', 'authow' ),
				'param_name' => 'pnumbers',
				'std'        => 9
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Cache life time ( unit is seconds ):', 'authow' ),
				'param_name' => 'pcache',
				'std'        => 1200
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Display more link with username text?', 'authow' ),
				'param_name' => 'pfollow',
				'std'        => true
			)
		),
		Goso_Vc_Params_Helper::heading_block_params(),
		Goso_Vc_Params_Helper::params_heading_typo_color(),
		Goso_Vc_Params_Helper::extra_params()
	)
) );
