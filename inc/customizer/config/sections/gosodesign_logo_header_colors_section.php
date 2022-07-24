<?php
$options   = [];
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Header Background Color',
	'id'       => 'goso_header_background_color',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'esc_url_raw',
	'type'        => 'authow-fw-image',
	'label'       => 'Header Background Image',
	'description' => 'You should use image with minimum width 1920px and minimum height 300px',
	'id'          => 'goso_header_background_image',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Header Social Icons Color',
	'id'       => 'goso_header_social_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Header Social Icons Color Hover',
	'id'       => 'goso_header_social_color_hover',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Slogan Text', 'authow' ),
	'id'       => 'goso_section_slogan_heading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Header Slogan Text Color',
	'id'       => 'goso_header_slogan_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Header Slogan Line Color',
	'id'       => 'goso_header_slogan_line_color',
);
$options[] = array(
	'sanitize'    => 'sanitize_text_field',
	'label'       => esc_html__( 'Main Bar', 'authow' ),
	'id'          => 'goso_section_mainbar_heading',
	'description' => __( 'Check <a target="_blank" href="https://imgresources.s3.amazonaws.com/main-bar.png">this image</a> to know what is Main Bar', 'authow' ),
	'type'        => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Main Bar Background',
	'id'       => 'goso_main_bar_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Main Bar Border Color',
	'id'       => 'goso_main_bar_border_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Search, Shopping Cart & Mobile Bars Icons Color',
	'id'       => 'goso_main_bar_search_magnify',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Icon Close Search Color',
	'id'       => 'goso_main_bar_close_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Search Overlay Background Color',
	'id'       => 'goso_search_obg_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Search Overlay Input Color',
	'id'       => 'goso_search_oinput_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Search Overlay Border Color',
	'id'       => 'goso_search_obd_color',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Primary Menu', 'authow' ),
	'id'       => 'goso_section_primary_menu_heading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Menu Text Color',
	'id'       => 'goso_main_bar_nav_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Menu Text Hover & Active Color',
	'id'       => 'goso_main_bar_color_active',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'authow-fw-color',
	'label'       => 'Padding Menu Items Background Color',
	'description' => 'Use when you enable padding for menu items',
	'id'          => 'goso_main_bar_padding_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Dropdown Background Color',
	'id'       => 'goso_drop_bg_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Dropdown Menu Items Border Color',
	'id'       => 'goso_drop_items_border',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Dropdown Text Color',
	'id'       => 'goso_drop_text_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Dropdown Text Hover & Active Color',
	'id'       => 'goso_drop_text_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Dropdown Border When Hover for Menu Style2',
	'id'       => 'goso_drop_border_style2',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Category Mega Menu', 'authow' ),
	'id'       => 'goso_section_category_megamenu_heading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Category Mega Menu Background Color',
	'id'       => 'goso_mega_bg_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Category Mega Menu List Child Categories Background Color',
	'id'       => 'goso_mega_child_cat_bg_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Category Mega Menu Post Date Color',
	'id'       => 'goso_mega_post_date_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Mega Menu Post Category Color',
	'id'       => 'goso_mega_post_category_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Category Mega Menu Accent Color',
	'id'       => 'goso_mega_accent_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Border Color for Category Mega on Menu Style2',
	'id'       => 'goso_mega_border_style2',
);
$options[] = array(
	'sanitize'    => 'sanitize_text_field',
	'label'       => esc_html__( 'Vertical Mobile Navigation', 'authow' ),
	'id'          => 'goso_section_mobilevernav_color_heading',
	'description' => __( 'Check <a target="_blank" href="https://imgresources.s3.amazonaws.com/vertical-mobile-navigation.png">this image</a> to know what is Vertical Mobile Navigation.', 'authow' ),
	'type'        => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Mobile Nav Close Overlay Color',
	'id'       => 'goso_ver_nav_overlay_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Mobile Nav Close Button Background',
	'id'       => 'goso_ver_nav_close_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Mobile Nav Close Button Icon Color',
	'id'       => 'goso_ver_nav_close_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Mobile Nav Background',
	'id'       => 'goso_ver_nav_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Search Form Borders Color',
	'id'       => 'goso_ver_nav_searchborder',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Search Form Text Color',
	'id'       => 'goso_ver_nav_textcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Search Form Search Icon Color',
	'id'       => 'goso_ver_nav_iconcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Mobile Nav Accent Color',
	'id'       => 'goso_ver_nav_accent_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Mobile Nav Accent Hover Color',
	'id'       => 'goso_ver_nav_accent_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Mobile Nav Menu Items Border Color',
	'id'       => 'goso_ver_nav_items_border',
);

return $options;
