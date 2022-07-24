<?php
$options   = [];
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Portfolio Overlay Hover Color',
	'id'       => 'penci_portfolio_overlay_color',
);
$options[] = array(
	'default'  => '0.85',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Portfolio Overlay Hover Opacity',
	'id'       => 'penci_portfolio_overlay_opacity',
	'type'     => 'authow-fw-select',
	'choices'  => array(
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
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Portfolio Post Title Color',
	'id'       => 'penci_portfolio_title_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Portfolio Post Title Hover Color',
	'id'       => 'penci_portfolio_title_hcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Portfolio Post Categories Color',
	'id'       => 'penci_portfolio_cate_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Portfolio Post Categories Hover Color',
	'id'       => 'penci_portfolio_cate_hcolor',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Single Portfolio Color', 'authow' ),
	'id'       => 'penci_portfolio_single_color',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'id'       => 'penci_portfolio_single_title_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Portfolio Title Color',
);
$options[] = array(
	'default'  => '',
	'id'       => 'penci_portfolio_single_text_color',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Portfolio General Text Color',
);
$options[] = array(
	'default'  => '',
	'id'       => 'penci_portfolio_single_text_link_color',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Portfolio Text Link Color',
);
$options[] = array(
	'default'  => '',
	'id'       => 'penci_portfolio_single_text_link_hover_color',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Portfolio Text Link Hover Color',
);
$options[] = array(
	'default'  => '',
	'id'       => 'penci_portfolio_single_meta_label_color',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Meta Text: Label Color',
);
$options[] = array(
	'default'  => '',
	'id'       => 'penci_portfolio_single_meta_value_color',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Meta Text: Value Color',
);
$options[] = array(
	'default'  => '',
	'id'       => 'penci_portfolio_single_border_color',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'General Border Color',
);
$options[] = array(
	'default'  => '',
	'id'       => 'penci_portfolio_single_relate_title_color',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Relate Project Title Color',
);
$options[] = array(
	'default'  => '',
	'id'       => 'penci_portfolio_single_relate_title_hover_color',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Relate Project Title Hover Color',
);
$options[] = array(
	'default'  => '',
	'id'       => 'penci_portfolio_single_relate_cat_color',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Relate Project Category Color',
);
$options[] = array(
	'default'  => '',
	'id'       => 'penci_portfolio_single_relate_cat_hover_color',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Relate Project Category Hover Color',
);
$options[] = array(
	'default'  => '',
	'id'       => 'penci_portfolio_single_carousel_background_color',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Relate Project Carousel Background Color',
);
$options[] = array(
	'default'  => '',
	'id'       => 'penci_portfolio_single_carousel_border_color',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Relate Project Carousel Border Color',
);
$options[] = array(
	'default'  => '',
	'id'       => 'penci_portfolio_single_carousel_active_background_color',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Relate Project Carousel Active Background Color',
);
$options[] = array(
	'default'  => '',
	'id'       => 'penci_portfolio_single_carousel_active_border_color',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Relate Project Carousel Active Border Color',
);

return $options;
