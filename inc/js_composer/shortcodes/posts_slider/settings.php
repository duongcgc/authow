<?php
$group_color = 'Typo & Color';
vc_map( array(
	'base'          => 'penci_posts_slider',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => penci_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/posts_slider/frontend.php',
	'weight'        => 700,
	'name'          => penci_get_theme_name('Goso').' '.esc_html__( 'Widget Posts Slider', 'authow' ),
	'description'   => __( 'Posts Slider Block', 'authow' ),
	'controls'      => 'full',
	'params'        => array_merge(
		array(
            array(
                'type'        => 'loop',
                'heading'     => __( '', 'authow' ),
                'param_name'  => 'build_query',
                'value'       => 'post_type:post|size:10',
                'settings'    => array(
                    'size'      => array( 'value' => 10, 'hidden' => false ),
                    'post_type' => array( 'value' => 'post', 'hidden' => false )
                ),
                'description' => __( 'Create WordPress loop, to populate content from your site.', 'authow' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Select Style for This Slider', 'authow'),
                'value' => array(
                    'Style 1' => 'style-1',
                    'Style 2' => 'style-2',
                    'Style 3' => 'style-3',
                ),
                'std' => 'style-1',
                'param_name' => 'penci_style',
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Image Size Type', 'authow'),
                'value' => array(
                    'Horizontal Size' => 'horizontal',
                    'Square Size' => 'square',
                    'Vertical Size' => 'vertical',
                ),
                'std' => 'horizontal',
                'param_name' => 'penci_size',
            ),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Hide post date?', 'authow' ),
				'param_name' => 'hide_pdate',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Disable lazyload?', 'authow' ),
				'param_name' => 'dis_lazyload',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Enable Autoplay Slider?', 'authow' ),
				'param_name' => 'autoplay',
			),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__( 'Custom Words Length for Post Titles', 'authow' ),
                'param_name' => '_title_length',
                'value'      => '',
            ),
		),
		Goso_Vc_Params_Helper::heading_block_params(),
		Goso_Vc_Params_Helper::params_heading_typo_color(),
		array(
            array(
                'type'             => 'textfield',
                'param_name'       => 'heading_ptittle_settings',
                'heading'          => esc_html__( 'General Posts', 'authow' ),
                'value'            => '',
                'group'            => $group_color,
                'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
            ),

            // Post title
            array(
                'type'             => 'colorpicker',
                'heading'          => esc_html__( 'Post Title Color', 'authow' ),
                'param_name'       => 'ptitle_color',
                'group'            => $group_color,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'             => 'colorpicker',
                'heading'          => esc_html__( 'Post Title Hover Color', 'authow' ),
                'param_name'       => 'ptitle_hcolor',
                'group'            => $group_color,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'             => 'penci_number',
                'param_name'       => 'ptitle_fsize',
                'heading'          => __( 'Font Size for Post Title', 'authow' ),
                'value'            => '',
                'std'              => '',
                'suffix'           => 'px',
                'min'              => 1,
                'group'            => $group_color,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'             => 'checkbox',
                'heading'          => __( 'Custom Font Family for Post Title', 'authow' ),
                'param_name'       => 'use_ptitle_typo',
                'value'            => array( __( 'Yes', 'authow' ) => 'yes' ),
                'group'            => $group_color,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'       => 'google_fonts',
                'group'      => $group_color,
                'param_name' => 'ptitle_typo',
                'value'      => '',
                'dependency' => array( 'element' => 'use_ptitle_typo', 'value' => 'yes' ),
            ),
            array(
                'type'       => 'penci_separator',
                'param_name' => 'penci_separator1',
                'group'      => $group_color,
            ),
            // Post meta
            array(
                'type'             => 'colorpicker',
                'heading'          => esc_html__( 'Post Meta Color', 'authow' ),
                'param_name'       => 'pmeta_color',
                'group'            => $group_color,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'             => 'penci_number',
                'param_name'       => 'pmeta_fsize',
                'heading'          => __( 'Font Size for Post Meta', 'authow' ),
                'value'            => '',
                'std'              => '',
                'suffix'           => 'px',
                'min'              => 1,
                'group'            => $group_color,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'             => 'checkbox',
                'heading'          => __( 'Custom Font Family for Post Meta', 'authow' ),
                'param_name'       => 'use_pmeta_typo',
                'value'            => array( __( 'Yes', 'authow' ) => 'yes' ),
                'group'            => $group_color,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'       => 'google_fonts',
                'group'      => $group_color,
                'param_name' => 'pmeta_typo',
                'value'      => '',
                'dependency' => array( 'element' => 'use_pmeta_typo', 'value' => 'yes' ),
            ),
        ),
		Goso_Vc_Params_Helper::extra_params()
	)
) );
