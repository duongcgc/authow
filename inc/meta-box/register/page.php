<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'goso_meta_boxes', 'goso_page_meta_box' );
function goso_page_meta_box( $meta_boxes ) {

	$tabs = array(
		'page_general'    => array(
			'label' => esc_html__( 'General', 'authow' ),
			'icon'  => 'dashicons dashicons-admin-site',
		),
		'page_header'    => array(
			'label' => esc_html__( 'Header', 'authow' ),
			'icon'  => 'dashicons dashicons-media-text',
		),
		'page_footer'    => array(
			'label' => esc_html__( 'Footer', 'authow' ),
			'icon'  => 'dashicons dashicons-media-text',
		),
		'page_title'      => array(
			'label' => esc_html__( 'Page Header', 'authow' ),
			'icon'  => 'dashicons dashicons-media-text',
		),
		'page_background' => array(
			'label' => esc_html__( 'Background', 'authow' ),
			'icon'  => 'dashicons dashicons-media-text',
		),
		'page_custom_css' => array(
			'label' => esc_html__( 'Custom CSS', 'authow' ),
			'icon'  => 'dashicons dashicons-media-text',
		),
	);

	$header_layout = [];
	$footer_layout = [];

	$header_layout[''] = esc_attr__( 'Default Customizer Settings' );
	$footer_layout[''] = esc_attr__( 'Default Customizer Settings' );

	$header_layouts = get_posts( [
		'post_type'      => 'goso_builder',
		'posts_per_page' => - 1,
	] );
	foreach ( $header_layouts as $header ) {
		$header_layout[ $header->ID ] = $header->post_title;
	}

	$footer_layouts = get_posts( [
		'post_type'      => 'goso-block',
		'posts_per_page' => - 1,
	] );
	foreach ( $footer_layouts as $footer ) {
		$footer_layout[ $footer->ID ] = $footer->post_title;
	}

	$fields = array(
		array(
			'tab'     => 'page_general',
			'id'      => 'goso_page_style',
			'name'    => esc_html__( 'Page Template', 'authow' ),
			'type'    => 'tab_general_options',
			),

		// Hide footer and header
		array(
			'tab'     => 'page_header',
			'id'      => 'header_builder_layout',
			'name'    => esc_html__( 'Header Builder Layout', 'authow' ),
			'type'    => 'select',
			'std'     => '',
			'options' => $header_layout,
			'desc'    => esc_html__( 'Override header builder layout for this page.', 'authow' ),
		),

		array(
			'tab'     => 'page_header',
			'id'      => 'header_style',
			'name'    => esc_html__( 'Header Style', 'authow' ),
			'type'    => 'select',
			'std'     => '',
			'options' => array(
				''          => 'Default Value ( on Customize )',
				'header-1' => 'Header 1',
				'header-2' => 'Header 2',
				'header-3' => 'Header 3',
				'header-4' => 'Header 4 ( Centered )',
				'header-5' => 'Header 5 ( Centered )',
				'header-6' => 'Header 6',
				'header-7' => 'Header 7',
				'header-8' => 'Header 8',
				'header-9' => 'Header 9',
				'header-10' => 'Header 10',
				'header-11' => 'Header 11'
			),
			'desc'    => esc_html__( 'Override header style for this page.', 'authow' ),
		),
		array(
			'id'      => 'goso_header_width',
			'name'    => esc_html__( 'Custom Header Container Width', 'authow' ),
			'type'    => 'select',
			'options' => array(
				''          => esc_html__( 'Default( follow Customize )', 'authow' ),
				'1170'      => esc_html__( 'Width: 1170px', 'authow' ),
				'1400'      => esc_html__( 'Width: 1400px', 'authow' ),
				'fullwidth' => esc_html__( 'FullWidth', 'authow' ),
			),
			'tab'     => 'page_header',
			'desc'    => esc_html__( 'Replace & change header with for this page.', 'authow' ),
		),
		array(
			'id'    => 'goso_mainmenu_height',
			'type'  => 'number',
			'name'  => esc_html__( 'Custom Main Nav Height( min 30px )', 'authow' ),
			'min'   => '1',
			'max'   => '500',
			'tab'   => 'page_header',
		),
		array(
			'id'    => 'goso_mainmenu_height_sticky',
			'type'  => 'number',
			'name'  => esc_html__( 'Custom Main Nav Height when Sticky Header( min 30px )', 'authow' ),
			'min'   => '1',
			'max'   => '500',
			'tab'   => 'page_header',
		),
		array(
			'id'      => 'topbar_menu',
			'name'    => esc_html__( 'Custom TopBar Menu', 'authow' ),
			'type'    => 'select',
			'options' => goso_get_option_menus(),
			'tab'     => 'page_header',
			'desc'    => esc_html__( 'Replace & change Topbar Menu for this page.', 'authow' ),
		),
		array(
			'id'      => 'main_nav_menu',
			'name'    => esc_html__( 'Custom Primary Menu', 'authow' ),
			'type'    => 'select',
			'options' => goso_get_option_menus(),
			'tab'     => 'page_header',
			'desc'    => esc_html__( 'Replace & change Primary Menu for this page.', 'authow' ),
		),
		array(
			'id'   => 'custom_logo',
			'name' => esc_html__( 'Custom Logo Image', 'authow' ),
			'type' => 'image',
			'desc' => esc_html__( 'You can override default site logo for this page.', 'authow' ),
			'tab'  => 'page_header',
		),
		array(
			'id'   => 'header_bgcolor',
			'name' => esc_html__( 'Header Background Color', 'authow' ),
			'desc' => esc_html__( 'You can change header background color with this option.', 'authow' ),
			'type' => 'color',
			'tab'  => 'page_header',
		),
		array(
			'id'   => 'header_bgimg',
			'name' => esc_html__( 'Header Background Image', 'authow' ),
			'type' => 'image',
			'desc' => esc_html__( 'You can change header background image color with this option. You should use image with minimum width 1920px and minimum height 300px', 'authow' ),
			'tab'  => 'page_header',
		),

		array(
			'id'   => 'main_bar_bg',
			'name' => esc_html__( 'Main Bar Background Color', 'authow' ),
			'desc' => esc_html__( 'You can change main nav background color with this option.', 'authow' ),
			'type' => 'color',
			'tab'  => 'page_header',
		),
		array(
			'id'   => 'main_bar_bgimg',
			'name' => esc_html__( 'Main Bar Background Image', 'authow' ),
			'type' => 'image',
			'desc' => esc_html__( 'You can change main bar background image color with this option.', 'authow' ),
			'tab'  => 'page_header',
		),
		array(
			'id'      => 'goso_edeader_trans',
			'name'    => esc_html__( 'Enable Header Transparent', 'authow' ),
			'type'    => 'select',
			'options' => array(
				''    => esc_html__( 'Default', 'authow' ),
				'no'  => esc_html__( 'No', 'authow' ),
				'yes' => esc_html__( 'Yes', 'authow' )
			),
			'std'     => '',
			'tab'     => 'page_header',
		),
		array(
			'id'   => 'hlogo_trans',
			'name' => esc_html__( 'Upload Logo for Transparent Header style 6, 9, 10 & 11', 'authow' ),
			'type' => 'image',
			'desc' => esc_html__( 'Important Note: This option apply when you use transparent header only', 'authow' ),
			'tab'  => 'page_header',
		),
		array(
			'id'   => 'tran_slogan_color',
			'name' => esc_html__( 'Header Slogan Text Color', 'authow' ),
			'type' => 'color',
			'tab'  => 'page_header',
			'style' => 'goso-col-6'
		),
		array(
			'id'   => 'tran_slogan_line_color',
			'name' => esc_html__( 'Header Slogan Line Color', 'authow' ),
			'type' => 'color',
			'tab'  => 'page_header',
			'style' => 'goso-col-6'
		),
		array(
			'id'   => 'tran_social_color',
			'name' => esc_html__( 'Header Social Icons Color', 'authow' ),
			'type' => 'color',
			'tab'  => 'page_header',
			'style' => 'goso-col-6'
		),
		array(
			'id'   => 'tran_social_color_hover',
			'name' => esc_html__( 'Header Social Icons Color Hover', 'authow' ),
			'type' => 'color',
			'tab'  => 'page_header',
			'style' => 'goso-col-6'
		),
		array(
			'id'   => 'tran_main_bar_nav_color',
			'name' => esc_html__( 'Main Bar Menu Text Color', 'authow' ),
			'type' => 'color',
			'tab'  => 'page_header',
			'style' => 'goso-col-6'
		),
		array(
			'id'   => 'tran_bar_color_active',
			'name' => esc_html__( 'Main Bar Menu Text Hover & Active Color', 'authow' ),
			'type' => 'color',
			'tab'  => 'page_header',
			'style' => 'goso-col-6'
		),
		array(
			'id'   => 'tran_main_bar_padding_color',
			'name' => esc_html__( 'Main Bar Padding Menu Items Background Color', 'authow' ),
			'type' => 'color',
			'tab'  => 'page_header',
			'style' => 'goso-col-6'
		),
		array(
			'id'   => 'tran_main_bar_search_magnify',
			'name' => esc_html__( 'Main Bar Search Icon Color', 'authow' ),
			'type' => 'color',
			'tab'  => 'page_header',
			'style' => 'goso-col-6'
		),
		array(
			'id'   => 'tran_main_bar_close_color',
			'name' => esc_html__( 'Main Bar Icon Close Search Color', 'authow' ),
			'type' => 'color',
			'tab'  => 'page_header',
			'style' => 'goso-col-6'
		),

		// Footer
		array(
			'tab'     => 'page_footer',
			'id'      => 'footer_builder_layout',
			'name'    => esc_html__( 'Footer Builder Layout', 'authow' ),
			'type'    => 'select',
			'std'     => '',
			'options' => $footer_layout,
			'desc'    => esc_html__( 'Override footer builder layout for this page.', 'authow' ),
		),
		array(
			'id'      => 'goso_hide_fwidget',
			'name'    => esc_html__( 'Disable Footer Widget Area', 'authow' ),
			'type'    => 'select',
			'options' => array(
				''    => esc_html__( 'Default', 'authow' ),
				'no'  => esc_html__( 'No', 'authow' ),
				'yes' => esc_html__( 'Yes', 'authow' )
			),
			'std'     => '',
			'tab'     => 'page_footer',
		),
		array(
			'id'      => 'goso_footer_width',
			'name'    => esc_html__( 'Footer Container Width', 'authow' ),
			'type'    => 'select',
			'options' => array(
				''          => esc_html__( 'Default( follow Customize )', 'authow' ),
				'1170'      => esc_html__( 'Width: 1170px', 'authow' ),
				'1400'      => esc_html__( 'Width: 1400px', 'authow' ),
				'fullwidth' => esc_html__( 'FullWidth', 'authow' ),
			),
			'std'     => '',
			'tab'     => 'page_footer',
		),
		array(
			'id'   => 'goso_fw_padding_top_bottom',
			'type' => 'number',
			'name' => esc_html__( 'Footer Widget Area Padding Top & Bottom', 'authow' ),
			'desc' => esc_html__( 'Numeric value only, unit is pixel', 'authow' ),
			'min'  => 1,
			'step' => 1,
			'max'  => 200,
			'tab'  => 'page_footer',
		),
		array(
			'tab'     => 'page_footer',
			'id'      => 'goso_footer_style',
			'name'    => esc_html__( 'Footer Widget Area Columns Layout', 'authow' ),
			'type'    => 'select',
			'std'     => '',
			'options' => array(
				''         => esc_html__( 'Default', 'authow' ),
				'style-1'  => '1/3 + 1/3 + 1/3',
				'style-2'  => '1/3 + 2/3',
				'style-3'  => '2/3 + 1/3',
				'style-4'  => '1/4 + 1/4 + 1/4 + 1/4',
				'style-5'  => '2/4 + 1/4 + 1/4',
				'style-6'  => '1/4 + 2/4 + 1/4',
				'style-7'  => '1/4 + 1/4 + 2/4',
				'style-8'  => '1/4 + 3/4',
				'style-9'  => '3/4 + 1/4',
				'style-10' => '1/2 + 1/2',
			),
			'desc'    => esc_html__( 'Override footer layout for this page.', 'authow' ),
		),
		// Page header
		array(
			'name'    => esc_html__( 'Enable/Disable Page Header', 'authow' ),
			'id'      => "pheader_show",
			'type'    => 'select',
			'options' => array(
				''        => esc_html__( 'Default', 'authow' ),
				'enable'  => esc_html__( 'Enable', 'authow' ),
				'disable' => esc_html__( 'Disable', 'authow' )
			),
			'tab'     => 'page_title',
		),
		array(
			'name'    => esc_html__( 'Hide/Show Line Below Title', 'authow' ),
			'id'      => 'pheader_hideline',
			'type'    => 'select',
			'options' => array(
				''     => esc_html__( 'Default', 'authow' ),
				'hide' => esc_html__( 'Hide', 'authow' ),
				'show' => esc_html__( 'Show', 'authow' ),
			),
			'tab'     => 'page_title',
			'style'   => 'goso-col-6'
		),
		array(
			'name'    => esc_html__( 'Hide/Show Breadcrumbs', 'authow' ),
			'id'      => 'pheader_hidebead',
			'type'    => 'select',
			'options' => array(
				''     => esc_html__( 'Default', 'authow' ),
				'hide' => esc_html__( 'Hide', 'authow' ),
				'show' => esc_html__( 'Show', 'authow' ),
			),
			'tab'     => 'page_title',
			'style'   => 'goso-col-6'
		),
		array(
			'name'    => esc_html__( 'Text Align', 'authow' ),
			'id'      => 'pheader_align',
			'type'    => 'select',
			'options' => array(
				''       => esc_html__( 'Default', 'authow' ),
				'left'   => esc_html__( 'Left', 'authow' ),
				'center' => esc_html__( 'Center', 'authow' ),
				'right'  => esc_html__( 'Right', 'authow' )
			),
			'tab'     => 'page_title',
			'style'   => 'goso-col-6'
		),
		array(
			'id'    => 'pheader_width',
			'type'  => 'number',
			'name'  => esc_html__( 'Custom Container Width for Page Header', 'authow' ),
			'desc'  => esc_html__( 'Numeric value only, unit is pixel', 'authow' ),
			'min'   => '1',
			'max'   => '2000',
			'tab'   => 'page_title',
			'style' => 'goso-col-6'
		),
		array(
			'id'    => 'pheader_ptop',
			'type'  => 'number',
			'name'  => esc_html__( 'Padding top', 'authow' ),
			'desc'  => esc_html__( 'Numeric value only, unit is pixel', 'authow' ),
			'min'   => '1',
			'max'   => '100',
			'tab'   => 'page_title',
			'style' => 'goso-col-6'
		),

		array(
			'id'    => 'pheader_pbottom',
			'type'  => 'number',
			'name'  => esc_html__( 'Padding bottom', 'authow' ),
			'desc'  => esc_html__( 'Numeric value only, unit is pixel', 'authow' ),
			'min'   => '1',
			'max'   => '100',
			'tab'   => 'page_title',
			'style' => 'goso-col-6'
		),
		array(
			'name'    => esc_html__( 'On/Off Uppercase for Title', 'authow' ),
			'id'      => 'pheader_turn_offup',
			'type'    => 'select',
			'options' => array(
				''    => esc_html__( 'Default', 'authow' ),
				'on'  => esc_html__( 'On', 'authow' ),
				'off' => esc_html__( 'Off', 'authow' ),
			),
			'tab'     => 'page_title',
			'style'   => 'goso-col-6'
		),
		array(
			'name'    => esc_html__( 'Font Weight For Title', 'authow' ),
			'id'      => 'pheader_fwtitle',
			'type'    => 'select',
			'options' => array(
				''        => esc_html__( 'Default', 'authow' ),
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
			),
			'tab'     => 'page_title',
			'style'   => 'goso-col-6'
		),
		array(
			'id'    => 'pheader_title_pbottom',
			'type'  => 'number',
			'name'  => esc_html__( 'Custom Padding Bottom for Title', 'authow' ),
			'desc'  => esc_html__( 'Numeric value only, unit is pixel', 'authow' ),
			'min'   => '1',
			'max'   => '100',
			'tab'   => 'page_title',
			'style' => 'goso-col-6'
		),
		array(
			'id'    => 'pheader_title_mbottom',
			'type'  => 'number',
			'name'  => esc_html__( 'Custom Margin Bottom for Title', 'authow' ),
			'desc'  => esc_html__( 'Numeric value only, unit is pixel', 'authow' ),
			'min'   => '1',
			'max'   => '100',
			'tab'   => 'page_title',
			'style' => 'goso-col-6'
		),
		array(
			'id'    => 'pheader_title_fsize',
			'type'  => 'number',
			'name'  => esc_html__( 'Custom size for Title', 'authow' ),
			'desc'  => esc_html__( 'Numeric value only, unit is pixel', 'authow' ),
			'min'   => '1',
			'max'   => '100',
			'tab'   => 'page_title',
			'style' => 'goso-col-6'
		),
		array(
			'id'    => 'pheader_bread_fsize',
			'type'  => 'number',
			'name'  => esc_html__( 'Custom size for Breadcrumb', 'authow' ),
			'desc'  => esc_html__( 'Numeric value only, unit is pixel', 'authow' ),
			'min'   => '1',
			'max'   => '100',
			'tab'   => 'page_title',
		),
		array(
			'id'    => 'pheader_bgimg',
			'type'  => 'image',
			'name'  => esc_html__( 'Background Image', 'authow' ),
			'tab'   => 'page_title',
			'style' => 'goso-col-6'

		),
		array(
			'id'    => 'pheader_bgcolor',
			'type'  => 'color',
			'name'  => esc_html__( 'Background Color', 'authow' ),
			'tab'   => 'page_title',
			'style' => 'goso-col-6'
		),
		array(
			'id'    => 'pheader_title_color',
			'type'  => 'color',
			'name'  => esc_html__( 'Title Color', 'authow' ),
			'tab'   => 'page_title',
			'style' => 'goso-col-6'
		),
		array(
			'id'    => 'pheader_line_color',
			'type'  => 'color',
			'name'  => esc_html__( 'Line Color', 'authow' ),
			'tab'   => 'page_title',
			'style' => 'goso-col-6'
		),
		array(
			'id'    => 'pheader_bread_color',
			'type'  => 'color',
			'name'  => esc_html__( 'Breadcrumbs Text Color', 'authow' ),
			'tab'   => 'page_title',
			'style' => 'goso-col-6'
		),
		array(
			'id'    => 'pheader_bread_hcolor',
			'type'  => 'color',
			'name'  => esc_html__( 'Breadcrumbs Hover Text Color', 'authow' ),
			'tab'   => 'page_title',
			'style' => 'goso-col-6'
		),
		// Background
		array(
			'id'   => 'page_wrap_bgcolor',
			'type' => 'color',
			'name' => esc_html__( 'Background Color', 'authow' ),
			'tab'  => 'page_background',
		),
		array(
			'id'   => 'page_wrap_bgimg',
			'type' => 'image',
			'name' => esc_html__( 'Background Image', 'authow' ),
			'tab'  => 'page_background',
		),
		array(
			'name'    => esc_html__( 'Background Position', 'authow' ),
			'id'      => 'page_wrap_bg_pos',
			'type'    => 'select',
			'options' => array(
				'center'        => esc_html__( 'Center', 'authow' ),
				'left_top'      => esc_html__( 'Left Top', 'authow' ),
				'left_center'   => esc_html__( 'Left Center', 'authow' ),
				'left_bottom'   => esc_html__( 'Left Bottom', 'authow' ),
				'right_top'     => esc_html__( 'Right Top', 'authow' ),
				'right_center'  => esc_html__( 'Right Center', 'authow' ),
				'right_bottom'  => esc_html__( 'Right Bottom', 'authow' ),
				'center_top'    => esc_html__( 'Center Top', 'authow' ),
				'center_bottom' => esc_html__( 'Center Bottom', 'authow' ),
			),
			'std'     => 'center',
			'tab'     => 'page_background',
			'style'   => 'goso-col-6'
		),
		array(
			'name'    => esc_html__( 'Background Size', 'authow' ),
			'id'      => 'page_wrap_bg_size',
			'type'    => 'select',
			'std'     => 'cover',
			'options' => array(
				'cover'   => esc_html__( 'Cover', 'authow' ),
				'auto'    => esc_html__( 'Auto', 'authow' ),
				'contain' => esc_html__( 'Contain', 'authow' ),
			),
			'tab'     => 'page_background',
			'style'   => 'goso-col-6'
		),
		array(
			'name'    => esc_html__( 'Background Repeat', 'authow' ),
			'id'      => 'page_wrap_bg_repeat',
			'type'    => 'select',
			'std'     => 'no-repeat',
			'options' => array(
				'repeat'    => esc_html__( 'Repeat', 'authow' ),
				'no-repeat' => esc_html__( 'No repeat', 'authow' ),
			),
			'tab'     => 'page_background',
			'style'   => 'goso-col-6'
		),

		// Custom css

		array(
			'name'        => esc_html__( 'Custom CSS Code', 'authow' ),
			'id'          => 'page_custom_css',
			'type'        => 'textarea',
			'tab'         => 'page_custom_css',
			'placeholder' => '.class{ color: #fff; }',
			'desc'        => __( 'Enter your CSS code. In some case, the <code>!important</code> tag may be needed', 'authow' ),
		),
	);

	$meta_boxes[] = array(
		'id'         => 'goso-metabox-page',
		'title'      => esc_html__( 'Page Options', 'authow' ),
		'post_types' => array( 'page' ),
		'context'    => 'advanced',
		'priority'   => 'default',
		'autosave'   => 'false',
		'tabs'       => apply_filters( 'goso_page_meta_box_tabs', $tabs ),
		'fields'     => apply_filters( 'goso_page_meta_box_fields', $fields ),
	);

	return $meta_boxes;
}
