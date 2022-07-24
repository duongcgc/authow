<?php
$options   = [];
$options[] = array(
	'label'    => 'General Text Colors',
	'id'       => 'goso_general_text_color',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Accent Colors',
	'id'       => 'goso_color_accent',
	'default'  => '#6eb48c',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Custom General Buttons Background Color',
	'id'       => 'goso_buttons_bg',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Custom General Buttons Text Color',
	'id'       => 'goso_buttons_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Custom General Buttons Hover Background Color',
	'id'       => 'goso_buttons_bghover',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Custom General Buttons Hover Text Color',
	'id'       => 'goso_buttons_colorhver',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Custom Background Color for Body',
	'id'       => 'goso_bg_color_dark',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Custom General Border Color',
	'id'       => 'goso_border_color_dark',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Breadcrumbs Text Color',
	'id'       => 'goso_breadcrumbs_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Breadcrumbs Text Hover Color',
	'id'       => 'goso_breadcrumbs_hcolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Archive Page Titles Prefix Color',
	'id'       => 'goso_archivetitle_prefix_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Archive Page Titles Color',
	'id'       => 'goso_archivetitle_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'       => 'Enable Dark Theme',
	'id'          => 'goso_enable_dark_layout',
	'description' => 'All options below only apply when you enable dark theme. And all other elements, please change it via other colors options for those elements.',
	'type'        => 'authow-fw-toggle',
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Custom Text Color for Dark Theme',
	'id'       => 'goso_text_color_dark',
	'default'  => '#afafaf',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);

$options[] = array(
	'label'    => 'Custom Posts Meta Color for Dark Theme',
	'id'       => 'goso_meta_color_dark',
	'default'  => '#949494',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'       => esc_html__( 'Filled Categories Styles', 'authow' ),
	'description' => __( 'The options below apply for categories listing filled styles you selected via General > General Settings > Style for Post Categories Listing', 'authow' ),
	'id'          => 'goso_catfil_bheading',
	'type'        => 'authow-fw-header',
	'sanitize'    => 'sanitize_text_field'
);
$options[] = array(
	'label'    => 'Text Color',
	'id'       => 'goso_cfiled_cl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Background Color',
	'id'       => 'goso_cfiled_bgcl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Text Hover Color',
	'id'       => 'goso_cfiled_hcl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Background Hover Color',
	'id'       => 'goso_cfiled_hbgcl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);

$options[] = array(
	'label'    => esc_html__( 'Pagination/Load More Post Button', 'authow' ),
	'id'       => 'goso_pagination_bheading',
	'type'     => 'authow-fw-header',
	'sanitize' => 'sanitize_text_field'
);
$options[] = array(
	'label'    => 'Color for Pagination',
	'id'       => 'goso_pagination_color',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Accent Color for Pagination',
	'id'       => 'goso_pagination_hcolor',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Color for "Load More Posts" Button',
	'id'       => 'goso_loadmorebtn_color',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Borders Color for "Load More Posts" Button',
	'id'       => 'goso_loadmorebtn_borders',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Background Color for "Load More Posts" Button',
	'id'       => 'goso_loadmorebtn_bg',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Color on Hover for "Load More Posts" Button',
	'id'       => 'goso_loadmorebtn_hcolor',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Borders Color on Hover for "Load More Posts" Button',
	'id'       => 'goso_loadmorebtn_hborders',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Background Color on Hover for "Load More Posts" Button',
	'id'       => 'goso_loadmorebtn_hbg',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);

return $options;
