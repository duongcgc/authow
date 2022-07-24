<?php
$options        = [];
$options[]      = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Page Title Color',
	'id'       => 'penci_pagetitle_color',
);
$options[]      = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => '"Share" Text Color',
	'id'       => 'penci_psharetext_color',
);
$options[]      = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Share Icons Color',
	'id'       => 'penci_pageshareicon_color',
);
$options[]      = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Share Icons Hover Color',
	'id'       => 'penci_pageshareicon_hcolor',
);
$options[]      = array(
	'sanitize'    => 'esc_url_raw',
	'label'       => esc_html__( 'Page Header', 'authow' ),
	'description' => 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/page-header.png">this image</a> to know what is "Page Header"',
	'id'          => 'penci_pheader_colors_heading',
	'type'        => 'authow-fw-header',
);
$pheader_colors = array(
	'penci_pheader_bgcolor'      => esc_html__( 'Background Color', 'authow' ),
	'penci_pheader_title_color'  => esc_html__( 'Title Color', 'authow' ),
	'penci_pheader_line_color'   => esc_html__( 'Line Color', 'authow' ),
	'penci_pheader_bread_color'  => esc_html__( 'Breadcrumbs Text Color', 'authow' ),
	'penci_pheader_bread_hcolor' => esc_html__( 'Breadcrumbs Hover Text Color', 'authow' ),
);
foreach ( $pheader_colors as $key => $label ) {
	$options[] = array(
		'sanitize' => 'sanitize_hex_color',
		'type'     => 'authow-fw-color',
		'label'    => $label,
		'id'       => $key,
	);
}
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => esc_html__( '404 Page', 'authow' ),
	'id'       => 'penci_pheader_404_heading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Color for Line Above the Message Text',
	'id'       => 'penci_404_line_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Message Text Color',
	'id'       => 'penci_404_message_ctext',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Search Form Text Color',
	'id'       => 'penci_404_input_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Search Form Borders Color',
	'id'       => 'penci_404_formborder_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => '"Back To Homepage" Color',
	'id'       => 'penci_404_backhome_color',
);

return $options;
