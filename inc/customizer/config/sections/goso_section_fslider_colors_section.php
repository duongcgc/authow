<?php
$options   = [];
$options[] = array(
	'label'       => 'Featured Slider Overlay Color',
	'description' => 'This option just apply for some featured slider styles has overlay color',
	'id'          => 'goso_featured_slider_overlay_bg',
	'default'     => '#000000',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'Featured Slider Overlay Color Opacity',
	'id'       => 'goso_featured_slider_overlay_bg_opacity',
	'default'  => '0.7',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'0'    => '0',
		'0.05' => '0.05',
		'0.1'  => '0.1',
		'0.15' => '0.15',
		'0.2'  => '0.2',
		'0.25' => '0.25',
		'0.3'  => '0.3',
		'0.35' => '0.35',
		'0.4'  => '0.4',
		'0.45' => '0.45',
		'0.5'  => '0.5',
		'0.55' => '0.55',
		'0.6'  => '0.6',
		'0.65' => '0.65',
		'0.7'  => '0.7',
		'0.75' => '0.75',
		'0.8'  => '0.8',
		'0.85' => '0.85',
		'0.9'  => '0.9',
		'0.95' => '0.95',
		'1'    => '1',
	)
);
$options[] = array(
	'label'    => 'Featured Slider Hover Overlay Color Opacity',
	'id'       => 'goso_featured_slider_overlay_bg_hover_opacity',
	'type'     => 'authow-fw-select',
	'default'  => '0.9',
	'sanitize' => 'goso_sanitize_choices_field',
	'choices'  => array(
		'0'    => '0',
		'0.05' => '0.05',
		'0.1'  => '0.1',
		'0.15' => '0.15',
		'0.2'  => '0.2',
		'0.25' => '0.25',
		'0.3'  => '0.3',
		'0.35' => '0.35',
		'0.4'  => '0.4',
		'0.45' => '0.45',
		'0.5'  => '0.5',
		'0.55' => '0.55',
		'0.6'  => '0.6',
		'0.65' => '0.65',
		'0.7'  => '0.7',
		'0.75' => '0.75',
		'0.8'  => '0.8',
		'0.85' => '0.85',
		'0.9'  => '0.9',
		'0.95' => '0.95',
		'1'    => '1',
	)
);
$options[] = array(
	'label'       => 'Center Box Background Color',
	'id'          => 'goso_featured_slider_box_bg_color',
	'description' => 'This option just apply for featured slider styles 1, 2, 3, 35, 36',
	'default'     => '#000000',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'Center Box Opacity',
	'id'       => 'goso_featured_slider_box_opacity',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'0'    => '0',
		'0.05' => '0.05',
		'0.1'  => '0.1',
		'0.15' => '0.15',
		'0.2'  => '0.2',
		'0.25' => '0.25',
		'0.3'  => '0.3',
		'0.35' => '0.35',
		'0.4'  => '0.4',
		'0.45' => '0.45',
		'0.5'  => '0.5',
		'0.55' => '0.55',
		'0.6'  => '0.6',
		'0.65' => '0.65',
		'0.7'  => '0.7',
		'0.75' => '0.75',
		'0.8'  => '0.8',
		'0.85' => '0.85',
		'0.9'  => '0.9',
		'0.95' => '0.95',
		'1'    => '1',
	),
	'default'  => '0.7',
	'sanitize' => 'goso_sanitize_choices_field'
);
$options[] = array(
	'label'    => 'Post Category Color',
	'id'       => 'goso_featured_slider_cat_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'Post Category Hover Color',
	'id'       => 'goso_featured_slider_cat_hover_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'Title Post Color',
	'id'       => 'goso_featured_slider_title_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'Title Post Hover Color',
	'id'       => 'goso_featured_slider_title_hover_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'Post Meta Color',
	'id'       => 'goso_featured_slider_meta_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'Post Excerpt Color',
	'id'       => 'goso_featured_slider_excerpt_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'Post Format Icons Color',
	'id'       => 'goso_featured_slider_icon_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'Overlay Color for Slider Style 29 & 30',
	'id'       => 'goso_featured_slider_color_29',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'Overlay Opacity for Slider Style 29 & 30',
	'id'       => 'goso_featured_slider_overlay_opacity29',
	'type'     => 'authow-fw-select',
	'default'  => '0.3',
	'sanitize' => 'goso_sanitize_choices_field',
	'choices'  => array(
		'0'    => '0',
		'0.05' => '0.05',
		'0.1'  => '0.1',
		'0.15' => '0.15',
		'0.2'  => '0.2',
		'0.25' => '0.25',
		'0.3'  => '0.3',
		'0.35' => '0.35',
		'0.4'  => '0.4',
		'0.45' => '0.45',
		'0.5'  => '0.5',
		'0.55' => '0.55',
		'0.6'  => '0.6',
		'0.65' => '0.65',
		'0.7'  => '0.7',
		'0.75' => '0.75',
		'0.8'  => '0.8',
		'0.85' => '0.85',
		'0.9'  => '0.9',
		'0.95' => '0.95',
		'1'    => '1',
	)
);
$options[] = array(
	'label'    => 'Color of Line on Slider Style 29 & 30',
	'id'       => 'goso_featured_slider_lines_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'Color Button Text & Button Border on Slider Style 29, 30, 35, 36',
	'id'       => 'goso_featured_slider_button_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'Background Color Hover of Buttor on Slider Style 29, 30, 35, 36, 38',
	'id'       => 'goso_featured_slider_button_hover_bg',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'Text Color Hover of Buttor on Slider Style 29, 30, 35, 36, 38',
	'id'       => 'goso_featured_slider_button_hover_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);

return $options;
