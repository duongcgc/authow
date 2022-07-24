<?php
$options   = [];
$options[] = array(
	'label'    => '',
	'id'       => 'penci_mainmenu_height_mobile',
	'type'     => 'authow-fw-hidden',
	'sanitize' => 'absint',
);
$options[] = array(
	'label'    => 'Custom Main Bar Height',
	'id'       => 'penci_mainmenu_height',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'penci_mainmenu_height',
		'mobile'  => 'penci_mainmenu_height_mobile',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 30,
			'max'  => 300,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 30,
			'max'  => 300,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Sticky Main Bar Height When Scroll Down ( Min 30px )', 'authow' ),
	'id'       => 'penci_mainmenu_height_sticky',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'penci_mainmenu_height_sticky',
	),
	'choices'  => array(
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
	'default'  => 'menu-style-1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Sub Menu Style',
	'id'       => 'penci_header_menu_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'menu-style-1' => 'Style 1',
		'menu-style-2' => 'Style 2',
	)
);
$options[] = array(
	'default'     => '"Raleway", "100:200:300:regular:500:600:700:800:900", sans-serif',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Custom Font For Primary Menu Items',
	'id'          => 'penci_font_for_menu',
	'description' => 'Default font is "Raleway"',
	'type'        => 'authow-fw-select',
	'choices'     => penci_all_fonts()
);
$options[] = array(
	'default'  => 'normal',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Font Weight For Primary Menu Items',
	'id'       => 'penci_font_weight_menu',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'normal'  => 'Normal',
		'bold'    => 'Bold',
		'bolder'  => 'Bolder',
		'lighter' => 'Lighter',
		'100'     => '100',
		'200'     => '200',
		'300'     => '300',
		'400'     => '400',
		'500'     => '500',
		'600'     => '600',
		'700'     => '700',
		'800'     => '800',
		'900'     => '900'
	)
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Turn Off Uppercase on Menu items',
	'id'       => 'penci_topbar_menu_uppercase',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '12',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Menu Items Level 1', 'authow' ),
	'id'       => 'penci_font_size_lv1',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'penci_font_size_lv1',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '12',
		),
	),
);
$options[] = array(
	'default'  => '12',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Dropdown Menu Items', 'authow' ),
	'id'       => 'penci_font_size_drop',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'penci_font_size_drop',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '12',
		),
	),
);
$options[] = array(
	'default'  => 'slide_down',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Dropdown Menu Animation Style',
	'id'       => 'penci_header_menu_ani_style',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'slide_down'   => esc_html__( 'Slide Down', 'authow' ),
		'fadein_up'    => esc_html__( 'Fade In Up', 'authow' ),
		'fadein_down'  => esc_html__( 'Fade In Down', 'authow' ),
		'fadein_left'  => esc_html__( 'Fade In Left', 'authow' ),
		'fadein_right' => esc_html__( 'Fade In Right', 'authow' ),
		'fadein_none'  => esc_html__( 'Fade In', 'authow' ),
	],
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Padding on Menu Item Level 1',
	'id'       => 'penci_header_enable_padding',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Line When Hover on Menu Items Level 1',
	'id'       => 'penci_header_remove_line_hover',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Sticky Main Bar When Scroll Down',
	'id'       => 'penci_disable_sticky_header',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Social Icons on Main Bar',
	'id'       => 'penci_header_social_nav',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Social Icons on Main Bar for Mobile',
	'id'       => 'penci_header_hidesocial_nav',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Search, Shopping Cart Icons', 'authow' ),
	'id'       => 'size_header_search_icon_check',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'size_header_search_icon_check',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '14',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Search Input Text', 'authow' ),
	'id'       => 'size_header_search_input',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'size_header_search_icon_check',
	),
	'choices'  => array(
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
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Display Logo on Main Bar on Mobile Devices',
	'id'          => 'penci_header_logo_mobile',
	'type'        => 'authow-fw-toggle',
	'description' => 'This option does not apply for Header Style 6 & Style 9',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Move Logo on Main Bar on Mobile to Center',
	'id'       => 'penci_header_logo_mobile_center',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Header Search',
	'id'       => 'penci_topbar_search_check',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_topbar_search_style',
	'default'  => 'default',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Header Search Style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'default' => esc_attr__( 'Default', 'authow' ),
		'showup'  => esc_attr__( 'Slide Up', 'authow' ),
		'overlay' => esc_attr__( 'Overlay', 'authow' ),
	)
);

return $options;
