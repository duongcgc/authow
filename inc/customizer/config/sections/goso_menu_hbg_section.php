<?php
$options   = [];
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => esc_html__( 'Enable Menu Hamburger', 'authow' ),
	'type'     => 'authow-fw-toggle',
	'id'       => 'goso_menu_hbg_show',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => esc_html__( 'Enable Vertical Navigation', 'authow' ),
	'type'     => 'authow-fw-toggle',
	'id'       => 'goso_vertical_nav_show',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => esc_html__( 'Completely Delete The Header When Enable Vertical Navigation', 'authow' ),
	'type'     => 'authow-fw-toggle',
	'id'       => 'goso_vertical_nav_remove_header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => esc_html__( 'Hide Menu Hamburger Icon Display on Horizontal Navigation on Mobile', 'authow' ),
	'type'     => 'authow-fw-toggle',
	'id'       => 'goso_menu_hbg_mobile',
);
$options[] = array(
	'type'     => 'authow-fw-image',
	'sanitize' => 'esc_url_raw',
	'label'    => esc_html__( 'Set A Background Image', 'authow' ),
	'id'       => 'goso_menu_hbg_bgimg',
);
$options[] = array(
	'default'     => '330',
	'sanitize'    => 'absint',
	'label'       => __( 'Custom Width for Vertical Nav & Menu Hamburger', 'authow' ),
	'description' => __( 'Min is 250px, Max is 500px', 'authow' ),
	'id'          => 'goso_hbg_width',
	'type'        => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_hbg_width',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'     => '330',
		),
	),
);
$options[] = array(
	'default'     => '18',
	'sanitize'    => 'absint',
	'label'       => __( 'Custom Size for Hamburger Menu Icon', 'authow' ),
	'description' => __( 'Min is 14px, Max is 30px', 'authow' ),
	'id'          => 'goso_hbg_size_icon',
	'type'        => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_hbg_size_icon',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'     => '18',
		),
	),
);
$options[] = array(
	'default'  => 'left',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => esc_html__( 'Position in Page', 'authow' ),
	'id'       => 'goso_menu_hbg_pos',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'left'  => esc_html__( 'Left', 'authow' ),
		'right' => esc_html__( 'Right', 'authow' )
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => esc_html__( 'Hide Logo', 'authow' ),
	'type'     => 'authow-fw-toggle',
	'id'       => 'goso_menu_hbg_hide_logo',
);
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => esc_html__( 'Custom Logo Image', 'authow' ),
	'id'       => 'goso_menu_hbg_logo',
	'type'     => 'authow-fw-image',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Custom Link for Logo Image',
	'id'       => 'goso_custom_logo_hamburger',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Set A Max Width for Logo Image', 'authow' ),
	'id'       => 'goso_hbg_logo_max_width',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_hbg_logo_max_width',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_textarea_field',
	'label'    => esc_html__( 'Add Site Title', 'authow' ),
	'id'       => 'goso_menu_hbg_sitetitle',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'default'  => '18',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Site Title', 'authow' ),
	'id'       => 'goso_hbg_sitetitle_size',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_hbg_sitetitle_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'     => '18',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_textarea_field',
	'label'    => esc_html__( 'Add Site Description', 'authow' ),
	'id'       => 'goso_menu_hbg_desc',
	'type'     => 'authow-fw-textarea',
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Site Description', 'authow' ),
	'id'       => 'goso_hbg_sitedes_size',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_hbg_sitedes_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'     => '14',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => esc_html__( 'Add Search Form Below Site Description', 'authow' ),
	'type'     => 'authow-fw-toggle',
	'id'       => 'goso_menu_hbg_show_search',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Select Custom Menu to Display on Primary Menu',
	'id'       => 'goso_menu_hbg_primary',
	'type'     => 'authow-fw-ajax-select',
	'choices'  => call_user_func( function () {
		$menu_list = [ '' => '' ];
		$menus     = wp_get_nav_menus();
		if ( ! empty( $menus ) ) {
			foreach ( $menus as $menu ) {
				$menu_list[ $menu->slug ] = $menu->name;
			}
		}

		return $menu_list;
	} ),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => esc_html__( 'Hide Primary Menu', 'authow' ),
	'type'     => 'authow-fw-toggle',
	'id'       => 'goso_menu_hbg_hide_menu',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Enable click on Parent Menu Item to open Child Menu Items',
	'description' => __( 'By default, you need to click to the arrow on the right side to open child menu items - this option will help you click on the parent menu items to open child menu items', 'authow' ),
	'id'          => 'goso_menu_hbg_click_parent',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => esc_html__( 'Disable Uppercase on Primary Menu Items', 'authow' ),
	'type'     => 'authow-fw-toggle',
	'id'       => 'goso_menu_hbg_lowcase',
);
$options[] = array(
	'default'  => '13',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Primary Menu Items', 'authow' ),
	'id'       => 'goso_font_size_menu_hbg',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_font_size_menu_hbg',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'     => '13',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Sub-menu Items', 'authow' ),
	'id'       => 'goso_font_size_submenu_hbg',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_font_size_submenu_hbg',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => esc_html__( 'Hide Footer Text', 'authow' ),
	'type'     => 'authow-fw-toggle',
	'id'       => 'goso_menu_hbg_hideftext',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => esc_html__( 'Hide Social Icons', 'authow' ),
	'type'     => 'authow-fw-toggle',
	'id'       => 'goso_menu_hbg_hidesocial',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => esc_html__( 'Select Style for Social Icons', 'authow' ),
	'id'          => 'goso_menuhbg_social_style',
	'description' => 'The options for custom colors, background color, border for social icons will does not apply for Brand Color styles',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		''                                                => esc_html__( 'Default', 'authow' ),
		'style-6 goso-social-textcolored'                => esc_html__( 'Icons with Brand Color', 'authow' ),
		'style-2'                                         => esc_html__( 'Round with Border', 'authow' ),
		'style-2 hgb-social-style-3'                      => esc_html__( 'Square with Border', 'authow' ),
		'style-4 goso-social-colored'                    => esc_html__( 'Round with Brand Color', 'authow' ),
		'style-4 hgb-social-style-5 goso-social-colored' => esc_html__( 'Square with Brand Color', 'authow' ),
	)
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Social Media Icons', 'authow' ),
	'id'       => 'goso_menuhbg_icon_size',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_menuhbg_icon_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'     => '14',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_textarea_field',
	'label'    => esc_html__( 'Custom Footer Text', 'authow' ),
	'id'       => 'goso_menu_hbg_footer_text',
	'type'     => 'authow-fw-textarea',
);

return $options;
