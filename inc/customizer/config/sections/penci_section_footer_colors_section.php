<?php
$options   = [];
$options[] = array(
	'label'    => 'Footer Section Background Color',
	'id'       => 'penci_footer_copyright_bg_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'Footer Section Background Image',
	'id'       => 'penci_footer_copyright_bg_image',
	'sanitize' => 'esc_url_raw',
	'type'     => 'authow-fw-image',
);
$options[] = array(
	'label'    => esc_html__( 'Footer Widgets Area', 'authow' ),
	'id'       => 'penci_footer_warea_heading',
	'type'     => 'authow-fw-header',
	'sanitize' => 'sanitize_text_field',
);
$options[] = array(
	'label'    => 'Footer Widget Area Background',
	'id'       => 'penci_footer_widget_area_bg',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Widget Area Border Top Color',
	'id'       => 'penci_footer_widget_area_border',
);
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => 'Footer Widget Area Background Image',
	'id'       => 'penci_footer_widget_bg_image',
	'type'     => 'authow-fw-image',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Widget Area Text Color',
	'id'       => 'penci_footer_widget_area_text_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Widget Area Borders Color for List',
	'id'       => 'penci_footer_widget_area_list_border',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Widget Title Text Color',
	'id'       => 'penci_footer_widget_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Widget Title Border Color',
	'id'       => 'penci_footer_widget_title_border_color',
);
$options[] = array(
	'default'  => '3',
	'sanitize' => 'absint',
	'label'    => __( 'Border Width of Footer Widget Titles', 'authow' ),
	'id'       => 'penci_footer_widget_title_border_width',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_footer_widget_title_border_width',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => 3,
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Widget Accent Color',
	'id'       => 'penci_footer_widget_accent_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Widget Accent Hover Color',
	'id'       => 'penci_footer_widget_accent_hover_color',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Footer Instagram', 'authow' ),
	'id'       => 'penci_footer_instagram_bheading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Instagram Border Top Color',
	'id'       => 'footer_instagram_border_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Instagram Title Color',
	'id'       => 'penci_footer_instagram_title_color',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Footer Social Icons', 'authow' ),
	'id'       => 'penci_footer_socialicons_bheading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Social Icons Border & Color',
	'id'       => 'penci_footer_icon_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Social Icons Hover Icons Color',
	'id'       => 'penci_footer_icon_hover_icon_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Social Icons Hover Border & Background Color',
	'id'       => 'penci_footer_icon_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Social Text Color',
	'id'       => 'penci_footer_social_text_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Social Hover Text Color',
	'id'       => 'penci_footer_social_hover_text_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Social Section Border Color',
	'id'       => 'penci_footer_social_border_color',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'authow-fw-color',
	'label'       => 'Footer Social Section Background Color',
	'id'          => 'penci_footer_social_bgcolor',
	'description' => 'This option just applies when you re-order the social icons section to higher than other sections',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Footer Menu', 'authow' ),
	'id'       => 'penci_footer_menu_bheading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Menu Text Color',
	'id'       => 'penci_footer_menu_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Menu Text Color Hover',
	'id'       => 'penci_footer_menu_color_hover',
);
$options[] = array(
	'label'    => esc_html__( 'Footer Copyright Text', 'authow' ),
	'id'       => 'penci_footer_copyright_bheading',
	'type'     => 'authow-fw-header',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Footer Copyright Text Color',
	'id'       => 'penci_footer_copyright_text_color',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Footer Copyright Accent Color',
	'id'       => 'penci_footer_copyright_accent_color',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Go to Top Button', 'authow' ),
	'id'       => 'penci_footer_gototop_bheading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Go To Top Text & Icon Color',
	'id'       => 'penci_footer_go_top_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Go To Top Text & Icon Hover Color',
	'id'       => 'penci_footer_go_top_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Go To Top Button Floating Background Color',
	'id'       => 'penci_footer_go_top_float_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Go To Top Button Floating Icon Color',
	'id'       => 'penci_footer_go_top_float_icon_color',
);

return $options;
