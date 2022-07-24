<?php
$options   = [];
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'General Colors', 'authow' ),
	'id'       => 'goso_hmhbg_general_color',
	'type'     => 'authow-fw-header',
);

$options_color_menu_hbg1 = array(
	'goso_mhbg_icon_toggle_color'   => esc_html__( 'Menu Hamburger Icon Color on Horizontal Navigation', 'authow' ),
	'goso_mhbg_icon_toggle_hcolor'  => esc_html__( 'Menu Hamburger Icon Hover Color on Horizontal Navigation', 'authow' ),
	'goso_mhbg_mobilebgcl'          => esc_html__( 'Mobile Bars Icon Background Color( for Vertical Navigation )', 'authow' ),
	'goso_mhbg_mobilecl'            => esc_html__( 'Mobile Bars Icon Color( for Vertical Navigation )', 'authow' ),
	'goso_mhbg_bgcolor'             => esc_html__( 'Background Color', 'authow' ),
	'goso_mhbg_textcolor'           => esc_html__( 'General Text Color', 'authow' ),
	'goso_mhbg_closecolor'          => esc_html__( 'Menu Hamburger Close Icon Color', 'authow' ),
	'goso_mhbg_closehover'          => esc_html__( 'Menu Hamburger Close Icon Hover Color', 'authow' ),
	'goso_mhbg_bordercolor'         => esc_html__( 'General Border Color', 'authow' ),
	'goso_mhbgtitle_color'          => esc_html__( 'Site Title Color', 'authow' ),
	'goso_mhbgdesc_hcolor'          => esc_html__( 'Site Description Color', 'authow' ),
	'goso_mhbg_search_border'       => esc_html__( 'Custom Border Colors for Search Box', 'authow' ),
	'goso_mhbg_search_border_hover' => esc_html__( 'Custom Border Colors for Search Box on Focus', 'authow' ),
	'goso_mhbg_search_color'        => esc_html__( 'Custom Text Colors for Search Box', 'authow' ),
	'goso_mhbg_search_icon'         => esc_html__( 'Custom Colors for Search Icon', 'authow' ),
	'goso_mhbgaccent_color'         => esc_html__( 'Accent Color', 'authow' ),
	'goso_mhbgaccent_hover_color'   => esc_html__( 'Accent Hover Color', 'authow' ),
	'goso_mhbgfooter_color'         => esc_html__( 'Footer Text Color', 'authow' ),
	'goso_mhbgicon_color'           => esc_html__( 'Social Icons Color', 'authow' ),
	'goso_mhbgicon_hover_color'     => esc_html__( 'Social Icons Hover Color', 'authow' ),
	'goso_mhbgicon_border'          => esc_html__( 'Social Icons Border Color', 'authow' ),
	'goso_mhbgicon_border_hover'    => esc_html__( 'Social Icons Border Hover Color', 'authow' ),
	'goso_mhbgicon_bg'              => esc_html__( 'Social Icons Background Color', 'authow' ),
	'goso_mhbgicon_bg_hover'        => esc_html__( 'Social Icons Background Hover Color', 'authow' ),
);

foreach ( $options_color_menu_hbg1 as $key => $label ) {
	$options[] = array(
		'sanitize' => 'sanitize_hex_color',
		'type'     => 'authow-fw-color',
		'label'    => $label,
		'id'       => $key,
	);
}

$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Widgets Colors', 'authow' ),
	'id'       => 'goso_hmhbg_widgets_color',
	'type'     => 'authow-fw-header',
);

$options_color_menu_hbg2 = array(
	'goso_mhwidget_heading_bg'           => esc_html__( 'Widget Heading Background Color', 'authow' ),
	'goso_mhwidget_heading_outer_bg'     => esc_html__( 'Widget Heading Background Outer Color', 'authow' ),
	'goso_mhwidget_heading_bcolor'       => esc_html__( 'Sidebar Widget Heading Border Color', 'authow' ),
	'goso_mhwidget_heading_binner_color' => esc_html__( 'Widget Heading Border Outer Color', 'authow' ),
	'goso_mhwidget_heading_bcolor5'      => esc_html__( 'Custom Color for Border Bottom on Widget Heading Style 5', 'authow' ),
	'goso_mhwidget_heading_bcolor7'      => esc_html__( 'Custom Color for Small Border Bottom on Widget Heading Style 7 & Style 8', 'authow' ),
	'goso_mhwidget_bordertop_color10'    => esc_html__( 'Custom Color for Border Top on Widget Heading Style 10', 'authow' ),
	'goso_mhwidget_shapes_color'         => esc_html__( 'Custom Shapes Background Color on Widget Heading Styles 11, 12, 13', 'authow' ),
	'goso_mhwidget_bgstyle15'            => esc_html__( 'Background Color for Icon on Style 15', 'authow' ),
	'goso_mhwidget_iconstyle15'          => esc_html__( 'Icon Color on Style 15', 'authow' ),
	'goso_mhwidget_cllines'              => esc_html__( 'Color for Lines on Styles 18, 19, 20', 'authow' ),
	'goso_mhwidget_heading_color'        => esc_html__( 'Widget Heading Text Color', 'authow' ),
);

foreach ( $options_color_menu_hbg2 as $key => $label ) {
	$options[] = array(
		'sanitize' => 'sanitize_hex_color',
		'type'     => 'authow-fw-color',
		'label'    => $label,
		'id'       => $key,
	);
}

return $options;
