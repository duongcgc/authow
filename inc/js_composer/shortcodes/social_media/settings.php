<?php
$group_color = 'Typo & Color';

vc_map( array(
	'base'          => 'goso_social_media',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => goso_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/social_media/frontend.php',
	'weight'        => 700,
	'name'          => goso_get_theme_name('Goso').' '.esc_html__( 'Social Media', 'authow' ),
	'description'   => __( 'Social Media Block', 'authow' ),
	'controls'      => 'full',
	'params'        => array_merge(
		//Goso_Vc_Params_Helper::params_container_width(),
		array(
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Display Social Text on Right Icons', 'authow' ),
				'param_name' => 'text_right',
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Alignment', 'authow' ),
				'param_name'  => 'alignment',
				'std'         => 'pc_alignleft',
				'value'       => array(
					__( 'Center', 'authow' ) => 'pc_aligncenter',
					__( 'Left', 'authow' )   => 'pc_alignleft',
					__( 'Right', 'authow' )  => 'pc_alignright',
				),
				'description' => __( 'This option only apply when you hide text on the right side of social icons', 'authow' )
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Remove Border Around Icons ?', 'authow' ),
				'param_name' => 'dis_circle',
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Remove Border Radius on Border of Icons ?', 'authow' ),
				'param_name' => 'dis_border_radius',
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Use Brand Colors for Social Icons ?', 'authow' ),
				'param_name' => 'brand_color',
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
			),
			array(
				'type'             => 'goso_number',
				'param_name'       => 'size_icon',
				'heading'          => __( 'Custom Font Size for Icons', 'authow' ),
				'value'            => '',
				'std'              => '',
				'suffix'           => 'px',
				'min'              => 1,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Disable Uppercase Text on Right Icons ?', 'authow' ),
				'param_name' => 'size_upper',
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
			),
			array(
				'type'             => 'goso_number',
				'param_name'       => 'size_text',
				'heading'          => __( 'Custom Font Size for Text on Right Icons', 'authow' ),
				'value'            => '',
				'std'              => '',
				'suffix'           => 'px',
				'min'              => 1,
				'edit_field_class' => 'vc_col-sm-6',
			),

			// Tab social
			array(
				'param_name'  => 'custom_markup_1',
				'type'        => 'custom_markup',
				'description' => esc_html__( 'Note: You can setup the URL for each social media icon via Appearance > Customizer > Social Media', 'authow' ),
				'group'       => 'Socials'
			),
			array(
				'type'             => "checkbox",
				'heading'          => ' ',
				'edit_field_class' => 'goso-show-social',
				'param_name'       => 'show_socials',
				'std'              => 'facebook,twitter,instagram,pinterest',
				'value'            => array(
					'Show facebook'    => 'facebook',
					'Show twitter'     => 'twitter',
					'Show instagram'   => 'instagram',
					'Show pinterest'   => 'pinterest',
					'Show linkedin'    => 'linkedin',
					'Show behance'     => 'behance',
					'Show flickr'      => 'flickr',
					'Show tumblr'      => 'tumblr',
					'Show youtube'     => 'youtube',
					'Show email'       => 'email',
					'Show vk'          => 'vk',
					'Show bloglovin'   => 'bloglovin',
					'Show vine'        => 'vine',
					'Show soundcloud'  => 'soundcloud',
					'Show snapchat'    => 'snapchat',
					'Show spotify'     => 'spotify',
					'Show github'      => 'github',
					'Show stack overflow'       => 'stack-overflow',
					'Show twitch'      => 'twitch',
					'Show vimeo'       => 'vimeo',
					'Show steam'       => 'steam',
					'Show xing'        => 'xing',
					'Show whatsapp'    => 'whatsapp',
					'Show telegram'    => 'telegram',
					'Show reddit'      => 'reddit',
					'Show ok'          => 'ok',
					'Show 500px'       => '500px',
					'Show stumbleupon' => 'stumbleupon',
					'Show wechat'      => 'wechat',
					'Show weibo'       => 'weibo',
					'Show line'        => 'line',
					'Show viber'       => 'viber',
					'Show discord'     => 'discord',
					'Show rss'         => 'rss',
					'Show Slack'       => 'slack',
					'Show Mixcloud'    => 'mixcloud',
					'Show Goodreads'   => 'goodreads',
					'Show Tripadvisor' => 'tripadvisor',
					'Show Tiktok'     => 'tiktok',
					'Show dailymotion'        => 'dailymotion',
					'Show blogger'        => 'blogger',
					'Show delicious'        => 'delicious',
					'Show deviantart'        => 'deviantart',
					'Show digg'        => 'digg',
					'Show evernote'        => 'evernote',
					'Show forrst'        => 'forrst',
					'Show grooveshark'        => 'grooveshark',
					'Show lastfm'        => 'lastfm',
					'Show myspace'        => 'myspace',
					'Show paypal'        => 'paypal',
					'Show skype'        => 'skype',
					'Show window'        => 'window',
					'Show wordPress'        => 'wordPress',
					'Show yahoo'        => 'yahoo',
					'Show yandex'        => 'yandex',
					'Show Douban'     => 'douban',
					'Show QQ'     => 'qq',
				),
				'group'            => 'Socials'
			),
		),
		Goso_Vc_Params_Helper::heading_block_params(),
		Goso_Vc_Params_Helper::params_heading_typo_color(),
		array(
			array(
				'type'             => 'textfield',
				'param_name'       => 'heading_social_media_settings',
				'heading'          => esc_html__( 'Social Media', 'authow' ),
				'value'            => '',
				'group'            => $group_color,
				'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Icons Color', 'authow' ),
				'param_name'       => 'social_text_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Icons Hover Color', 'authow' ),
				'param_name'       => 'social_text_hcolor',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Icons Border Color', 'authow' ),
				'param_name'       => 'social_bodcolor',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Icons Border Hover Color', 'authow' ),
				'param_name'       => 'social_hbodcolor',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Icons Background Color', 'authow' ),
				'param_name'       => 'social_bgcolor',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Icons Hover Background Color', 'authow' ),
				'param_name'       => 'social_bghcolor',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Text Color', 'authow' ),
				'param_name'       => 'social_textcolor',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Text Hover Color', 'authow' ),
				'param_name'       => 'social_htextcolor',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			)
		),
		Goso_Vc_Params_Helper::extra_params()
	)
) );
