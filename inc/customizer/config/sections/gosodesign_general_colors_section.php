<?php
$options   = [];
$options[] = array(
	'label'    => 'General Text Colors',
	'id'       => 'penci_general_text_color',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Accent Colors',
	'id'       => 'penci_color_accent',
	'default'  => '#6eb48c',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Custom General Buttons Background Color',
	'id'       => 'penci_buttons_bg',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Custom General Buttons Text Color',
	'id'       => 'penci_buttons_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Custom General Buttons Hover Background Color',
	'id'       => 'penci_buttons_bghover',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Custom General Buttons Hover Text Color',
	'id'       => 'penci_buttons_colorhver',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Custom Background Color for Body',
	'id'       => 'penci_bg_color_dark',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Custom General Border Color',
	'id'       => 'penci_border_color_dark',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Breadcrumbs Text Color',
	'id'       => 'penci_breadcrumbs_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Breadcrumbs Text Hover Color',
	'id'       => 'penci_breadcrumbs_hcolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Archive Page Titles Prefix Color',
	'id'       => 'penci_archivetitle_prefix_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Archive Page Titles Color',
	'id'       => 'penci_archivetitle_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'       => 'Enable Dark Theme',
	'id'          => 'penci_enable_dark_layout',
	'description' => 'All options below only apply when you enable dark theme. And all other elements, please change it via other colors options for those elements.',
	'type'        => 'authow-fw-toggle',
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Custom Text Color for Dark Theme',
	'id'       => 'penci_text_color_dark',
	'default'  => '#afafaf',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);

$options[] = array(
	'label'    => 'Custom Posts Meta Color for Dark Theme',
	'id'       => 'penci_meta_color_dark',
	'default'  => '#949494',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'       => esc_html__( 'Filled Categories Styles', 'authow' ),
	'description' => __( 'The options below apply for categories listing filled styles you selected via General > General Settings > Style for Post Categories Listing', 'authow' ),
	'id'          => 'penci_catfil_bheading',
	'type'        => 'authow-fw-header',
	'sanitize'    => 'sanitize_text_field'
);
$options[] = array(
	'label'    => 'Text Color',
	'id'       => 'penci_cfiled_cl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Background Color',
	'id'       => 'penci_cfiled_bgcl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Text Hover Color',
	'id'       => 'penci_cfiled_hcl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Background Hover Color',
	'id'       => 'penci_cfiled_hbgcl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);

$options[] = array(
	'label'    => esc_html__( 'Pagination/Load More Post Button', 'authow' ),
	'id'       => 'penci_pagination_bheading',
	'type'     => 'authow-fw-header',
	'sanitize' => 'sanitize_text_field'
);
$options[] = array(
	'label'    => 'Color for Pagination',
	'id'       => 'penci_pagination_color',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Accent Color for Pagination',
	'id'       => 'penci_pagination_hcolor',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Color for "Load More Posts" Button',
	'id'       => 'penci_loadmorebtn_color',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Borders Color for "Load More Posts" Button',
	'id'       => 'penci_loadmorebtn_borders',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Background Color for "Load More Posts" Button',
	'id'       => 'penci_loadmorebtn_bg',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Color on Hover for "Load More Posts" Button',
	'id'       => 'penci_loadmorebtn_hcolor',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Borders Color on Hover for "Load More Posts" Button',
	'id'       => 'penci_loadmorebtn_hborders',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Background Color on Hover for "Load More Posts" Button',
	'id'       => 'penci_loadmorebtn_hbg',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);

return $options;
