<?php
$options   = [];
$options[] = array(
	'label'       => 'Add Google Adsense/Custom HTML Code Above Footer',
	'id'          => 'goso_footer_adsense',
	'description' => '',
	'type'        => 'authow-fw-textarea',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_textarea_field'
);
$options[] = array(
	'label'    => 'Footer Container Width',
	'id'       => 'goso_footer_width',
	'type'     => 'authow-fw-select',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'choices'  => array(
		''          => esc_html__( 'Width: 1170px', 'authow' ),
		'1400'      => esc_html__( 'Width: 1400px', 'authow' ),
		'fullwidth' => esc_html__( 'Full Width', 'authow' )
	)
);
$options[] = array(
	'label'    => 'Re-order Sections on the Footer',
	'id'       => 'goso_footer_order_sections',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'widgets-instagram-signupform-footersocial' => 'Widgets Area - Instagram - SignUp Form - Social Icons',
		'widgets-instagram-footersocial-signupform' => 'Widgets Area - Instagram - Social Icons - SignUp Form',
		'widgets-footersocial-instagram-signupform' => 'Widgets Area - Social Icons - Instagram - SignUp Form',
		'widgets-footersocial-signupform-instagram' => 'Widgets Area - Social Icons - SignUp Form - Instagram',
		'widgets-signupform-footersocial-instagram' => 'Widgets Area - SignUp Form - Social Icons - Instagram',
		'widgets-signupform-instagram-footersocial' => 'Widgets Area - SignUp Form - Instagram - Social Icons',
		'instagram-widgets-signupform-footersocial' => 'Instagram - Widgets Area - SignUp Form - Social Icons',
		'instagram-widgets-footersocial-signupform' => 'Instagram - Widgets Area - Social Icons - SignUp Form',
		'instagram-footersocial-widgets-signupform' => 'Instagram - Social Icons - Widgets Area - SignUp Form',
		'instagram-footersocial-signupform-widgets' => 'Instagram - Social Icons - SignUp Form - Widgets Area',
		'instagram-signupform-footersocial-widgets' => 'Instagram - SignUp Form - Social Icons - Widgets Area',
		'instagram-signupform-widgets-footersocial' => 'Instagram - SignUp Form - Widgets Area - Social Icons',
		'signupform-widgets-footersocial-instagram' => 'SignUp Form - Widgets Area - Social Icons - Instagram',
		'signupform-widgets-instagram-footersocial' => 'SignUp Form - Widgets Area - Instagram - Social Icons',
		'signupform-footersocial-widgets-instagram' => 'SignUp Form - Social Icons - Widgets Area - Instagram',
		'signupform-footersocial-instagram-widgets' => 'SignUp Form - Social Icons - Instagram - Widgets Area',
		'signupform-instagram-widgets-footersocial' => 'SignUp Form - Instagram - Widgets Area - Social Icons',
		'signupform-instagram-footersocial-widgets' => 'SignUp Form - Instagram - Social Icons - Widgets Area',
		'footersocial-widgets-instagram-signupform' => 'Social Icons - Widgets Area - Instagram - SignUp Form',
		'footersocial-widgets-signupform-instagram' => 'Social Icons - Widgets Area - SignUp Form - Instagram',
		'footersocial-instagram-signupform-widgets' => 'Social Icons - Instagram - SignUp Form - Widgets Area',
		'footersocial-instagram-widgets-signupform' => 'Social Icons - Instagram - Widgets Area - SignUp Form',
		'footersocial-signupform-widgets-instagram' => 'Social Icons - SignUp Form - Widgets Area - Instagram',
		'footersocial-signupform-instagram-widgets' => 'Social Icons - SignUp Form - Instagram - Widgets Area',
	),
	'default'  => 'widgets-instagram-signupform-footersocial',
	'sanitize' => 'goso_sanitize_choices_field'
);
$options[] = array(
	'label'    => 'Disable Footer Social Icons',
	'id'       => 'goso_footer_social',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Disable Border Around Footer Social Icons',
	'id'       => 'goso_footer_social_around',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Enable Use Brand Colors for Footer Social Icons',
	'id'       => 'goso_footer_brand_social',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Disable Border Radius on Border of Social Icons',
	'id'       => 'goso_footer_disable_radius_social',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Hide Footer Social Icons Text',
	'id'       => 'goso_footer_social_remove_text',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Make Footer Social Text Drop In New Line',
	'id'       => 'goso_footer_social_drop_line',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => __( 'Font Size for Icons on Footer Social Icons', 'authow' ),
	'id'       => 'goso_footer_social_size',
	'default'  => '14',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_footer_social_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '14',
		),
	),
);
$options[] = array(
	'label'    => 'Disable Uppercase on Footer Social Icons Text',
	'id'       => 'goso_footer_social_lowercase',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => __( 'Font Size for Footer Social Icons Text', 'authow' ),
	'id'       => 'goso_footer_social_text_size',
	'default'  => '14',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_footer_social_text_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '14',
		),
	),
);
$options[] = array(
	'label'    => 'Disable Footer Logo',
	'section'  => 'goso_section_footer_general',
	'id'       => 'goso_hide_footer_logo',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'label'    => 'Footer Logo',
	'section'  => 'goso_section_footer_general',
	'id'       => 'goso_footer_logo',
	'default'  => '',
	'sanitize' => 'esc_url_raw',
	'type'     => 'authow-fw-image'
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'goso_footer_mwlogo_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Set A Max-Width for Footer Logo',
	'id'          => 'goso_footer_mwlogo',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'goso_footer_mwlogo',
		'mobile'  => 'goso_footer_mwlogo_mobile',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => 'Custom Link for Footer Logo Image',
	'id'          => 'goso_custom_url_logo_footer',
	'description' => 'By default, footer logo image will link to homepage url. If you want to link the footer logo for another URL - fill here. Include http:// or https:// on the link',
	'type'        => 'authow-fw-text',
	'default'     => '',
	'sanitize'    => 'sanitize_text_field'
);
$options[] = array(
	'label'    => 'Disable Go To Top Button on Footer',
	'id'       => 'goso_go_to_top',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Enable Go To Top Button Floating on The Bottom Right',
	'id'       => 'goso_go_to_top_floating',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'       => 'Enable Footer Menu',
	'id'          => 'goso_footer_menu',
	'description' => 'You can setup your footer menu by go to admin > Appearance > Menus > Create/Select your menu > scroll down and check to "Footer Menu" at the bottom.',
	'type'        => 'authow-fw-toggle',
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label' => __( 'Font Size for Footer Menu', 'authow' ),
	'id'          => 'goso_footer_menu_size',
	'default'     => '14',
	'sanitize'    => 'absint',
	'type'        => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_footer_menu_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '14',
		),
	),
);
$options[] = array(
	'label'    => 'Footer Copyright Text',
	'id'       => 'goso_footer_copyright',
	'type'     => 'authow-fw-textarea',
	'default'  => '@2020 - All Right Reserved. Designed and Developed by <a rel="nofollow" href="https://1.envato.market/YYJ4P" target="_blank">GosoDesign</a>',
	'sanitize' => 'goso_sanitize_textarea_field'
);
$options[] = array(
	'label'    => 'Disable Italic on Footer Copyright Text',
	'id'       => 'goso_footer_copyright_remove_italic',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => __( 'Font Size for Footer Copyright Text', 'authow' ),
	'id'       => 'goso_footer_copyright_size',
	'default'  => '14',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_footer_copyright_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '14',
		),
	),
);
$options[] = array(
	'label'    => 'Add Custom HTML code before close &lt;/body&gt; tag / Google Analytics Code',
	'id'       => 'goso_footer_analytics',
	'type'     => 'authow-fw-textarea',
	'default'  => '',
	'sanitize' => 'goso_sanitize_textarea_field'
);

return $options;
