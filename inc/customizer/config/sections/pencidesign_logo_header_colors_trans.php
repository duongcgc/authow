<?php
$options   = [];
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Header Social Icons Color',
	'id'       => 'penci_header_tran_social_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Header Social Icons Color Hover',
	'id'       => 'penci_header_tran_social_color_hover',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Search, Shopping Cart & Mobile Bars Icons Color',
	'id'       => 'penci_tran_main_bar_search_magnify',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Icon Close Search Color',
	'id'       => 'penci_tran_main_bar_close_color',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Slogan Text', 'authow' ),
	'id'       => 'penci_section_trslogan_text_heading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Header Slogan Text Color',
	'id'       => 'penci_header_tran_slogan_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Header Slogan Line Color',
	'id'       => 'penci_header_tran_slogan_line_color',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Primary Menu', 'authow' ),
	'id'       => 'penci_section_traprimary_menu_heading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Menu Text Color',
	'id'       => 'penci_tran_main_bar_nav_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Menu Text Hover & Active Color',
	'id'       => 'penci_tran_main_bar_color_active',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Padding Menu Items Background Color',
	'id'       => 'penci_tran_main_bar_padding_color',
);

return $options;
