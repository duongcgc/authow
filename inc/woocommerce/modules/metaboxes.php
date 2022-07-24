<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'goso_meta_boxes', 'goso_product_meta_box' );
function goso_product_meta_box( $meta_boxes ) {

	$tabs = array(
		'product_general'       => array(
			'label' => esc_html__( 'General', 'authow' ),
			'icon'  => 'dashicons dashicons-admin-settings',
		),
		'product_background'    => array(
			'label' => esc_html__( 'Background', 'authow' ),
			'icon'  => 'dashicons dashicons-admin-customizer',
		),
		'product_sidebar'       => array(
			'label' => esc_html__( 'Sidebar', 'authow' ),
			'icon'  => 'dashicons dashicons-welcome-widgets-menus',
		),
		'product_custom_tab'    => array(
			'label' => esc_html__( 'Custom Tab', 'authow' ),
			'icon'  => 'dashicons dashicons-table-row-after',
		),
		'product_extra_options' => array(
			'label' => esc_html__( 'Extra Options', 'authow' ),
			'icon'  => 'dashicons dashicons-cart',
		),
		'product_custom_css'    => array(
			'label' => esc_html__( 'Custom CSS', 'authow' ),
			'icon'  => 'dashicons dashicons-editor-code',
		),
	);

	$authow_sidebar_area                      = array();
	$authow_sidebar_area['']                  = 'Default Value';
	$authow_sidebar_area['main-sidebar']      = esc_attr__( "Main Sidebar", "authow" );
	$authow_sidebar_area['main-sidebar-left'] = esc_attr__( "Main Sidebar Left", "authow" );
	$authow_sidebar_area['goso-shop-single'] = esc_attr__( "Sidebar For Single Product", "authow" );
	for ( $i = 1; $i <= 10; $i ++ ) {
		$authow_sidebar_area[ 'custom-sidebar-' . $i ] = sprintf( esc_attr__( 'Custom Sidebar %s', 'authow' ), $i );
	}

	$authow_sidebar_area = apply_filters( 'goso_woo_settings_sidebars', $authow_sidebar_area );

	$fields = array(

		array(
			'tab'     => 'product_general',
			'id'      => 'product_summary_align',
			'name'    => esc_html__( 'Product Summary Align', 'authow' ),
			'type'    => 'select',
			'std'     => '',
			'options' => array(
				''       => 'Default Value ( on Customize )',
				'left'   => 'Align Left',
				'center' => 'Align Center',
			),
			'desc'    => esc_html__( 'Override main product summary content for this product.', 'authow' ),
		),

		array(
			'tab'     => 'product_general',
			'id'      => 'goso_single_product_img_width',
			'name'    => esc_html__( 'Product image width', 'authow' ),
			'type'    => 'select',
			'std'     => '',
			'options' => array(
				''                    => 'Default Value ( on Customize )',
				'standard'            => 'Standard',
				'medium'              => 'Medium',
				'large'               => 'Large',
				'fullwidth-container' => 'Full Width (Container)',
				'fullwidth'           => 'Full Width',
			),
			'desc'    => esc_html__( 'You can choose different page layout depending on the product image size you need', 'authow' ),
		),

		array(
			'tab'     => 'product_general',
			'id'      => 'goso_single_product_thumbnail_position',
			'name'    => esc_html__( 'Thumbnails position', 'authow' ),
			'type'    => 'select',
			'std'     => '',
			'options' => array(
				''                       => 'Default Value ( on Customize )',
				'thumbnail-left'         => 'Left',
				'thumbnail-right'        => 'Right',
				'thumbnail-bottom'       => 'Bottom',
				'thumbnail-bottom-1-col' => 'Bottom 1 Column',
				'thumbnail-bottom-2-col' => 'Bottom 2 Column',
				'thumbnail-grid'         => 'Grid',
				'thumbnail-without'      => 'Without',
			),
			'desc'    => esc_html__( 'Use vertical or horizontal position for thumbnails.', 'authow' ),
		),

		array(
			'tab'     => 'product_general',
			'id'      => 'goso_single_product_style',
			'name'    => esc_html__( 'Product Style', 'authow' ),
			'type'    => 'select',
			'std'     => '',
			'options' => array(
				''                  => 'Default Value ( on Customize )',
				'default'           => 'Standard',
				'accordion-tab'     => 'Accordion Toggle',
				'accordion-content' => 'Accordion Content',
			),
			'desc'    => esc_html__( 'Select default product style', 'authow' ),
		),

		array(
			'tab'     => 'product_general',
			'id'      => 'goso_single_sticky_atc',
			'name'    => esc_html__( 'Enable sticky add to cart ?', 'authow' ),
			'type'    => 'select',
			'options' => array(
				''        => 'Default Value ( on Customize )',
				'enable'  => 'Enable',
				'disable' => 'Disable',
			),
			'desc'    => esc_html__( 'Enable sticky add to cart on the bottom of the page', 'authow' ),
		),

		// Sidebar
		array(
			'tab'     => 'product_sidebar',
			'id'      => 'sidebar_position',
			'name'    => esc_html__( 'Sidebar position', 'authow' ),
			'type'    => 'select',
			'std'     => '',
			'options' => array(
				''        => 'Default Value ( on Customize )',
				'left'    => 'Sidebar Left',
				'right'   => 'Sidebar Right',
				'disable' => 'Disable Sidebar',
			),
			'desc'    => esc_html__( 'Select main content and sidebar alignment.', 'authow' ),
		),

		array(
			'tab'     => 'product_sidebar',
			'id'      => 'sidebar_placement',
			'name'    => esc_html__( 'Sidebar Placement', 'authow' ),
			'type'    => 'select',
			'std'     => '',
			'options' => array(
				''       => 'Default Value ( on Customize )',
				'bottom' => 'Bottom Content',
				'both'   => 'Top & Bottom',
			),
		),

		/*array(
			'tab'     => 'product_sidebar',
			'id'      => 'sidebar_size',
			'name'    => esc_html__( 'Sidebar size', 'authow' ),
			'type'    => 'select',
			'std'     => '',
			'options' => array(
				''       => 'Default Value ( on Customize )',
				'small'  => 'Small Sidebar',
				'medium' => 'Medium Sidebar',
				'large'  => 'Large Sidebar',
			),
			'desc'    => esc_html__( 'You can set different sizes for your pages sidebar', 'authow' ),
		),*/


		array(
			'tab'     => 'product_sidebar',
			'id'      => 'sidebar_area',
			'name'    => esc_html__( 'Custom sidebar for this product', 'authow' ),
			'type'    => 'select',
			'std'     => '',
			'options' => $authow_sidebar_area,
		),

		// Background
		array(
			'id'   => 'product_wrap_bgcolor',
			'type' => 'color',
			'name' => esc_html__( 'Background Color', 'authow' ),
			'tab'  => 'product_background',
		),
		array(
			'id'   => 'product_wrap_bgimg',
			'type' => 'image',
			'name' => esc_html__( 'Background Image', 'authow' ),
			'tab'  => 'product_background',
		),
		array(
			'name'    => esc_html__( 'Background Position', 'authow' ),
			'id'      => 'product_wrap_bg_pos',
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
			'tab'     => 'product_background',
			'style'   => 'goso-col-6'
		),
		array(
			'name'    => esc_html__( 'Background Size', 'authow' ),
			'id'      => 'product_wrap_bg_size',
			'type'    => 'select',
			'std'     => 'cover',
			'options' => array(
				'cover'   => esc_html__( 'Cover', 'authow' ),
				'auto'    => esc_html__( 'Auto', 'authow' ),
				'contain' => esc_html__( 'Contain', 'authow' ),
			),
			'tab'     => 'product_background',
			'style'   => 'goso-col-6'
		),
		array(
			'name'    => esc_html__( 'Background Repeat', 'authow' ),
			'id'      => 'product_wrap_bg_repeat',
			'type'    => 'select',
			'std'     => 'no-repeat',
			'options' => array(
				'repeat'    => esc_html__( 'Repeat', 'authow' ),
				'no-repeat' => esc_html__( 'No repeat', 'authow' ),
			),
			'tab'     => 'product_background',
			'style'   => 'goso-col-6'
		),

		// Custom Tab
		array(
			'name' => esc_html__( 'Hidden Tab Title', 'authow' ),
			'id'   => 'tab_title_visible',
			'type' => 'checkbox',
			'tab'  => 'product_custom_tab',
		),

		array(
			'name' => esc_html__( 'Custom Tab Title', 'authow' ),
			'id'   => 'tab_title',
			'type' => 'text',
			'tab'  => 'product_custom_tab',
		),

		array(
			'name' => esc_html__( 'Custom Tab Content', 'authow' ),
			'id'   => 'tab_content',
			'type' => 'wysiwyg',
			'tab'  => 'product_custom_tab',
		),

		array(
			'name' => esc_html__( 'Priority', 'authow' ),
			'id'   => 'tab_priority',
			'type' => 'number',
			'std'  => 50,
			'tab'  => 'product_custom_tab',
		),

		// Extra Options
		array(
			'name'    => esc_html__( 'Brands Display', 'authow' ),
			'id'      => 'brand_locate',
			'type'    => 'select',
			'std'     => '',
			'options' => array(
				''        => esc_html__( 'Default Theme Locate', 'authow' ),
				'top'     => esc_html__( 'Top', 'authow' ),
				'summary' => esc_html__( 'Summary', 'authow' ),
			),
			'tab'     => 'product_extra_options',
		),
		array(
			'name' => esc_html__( 'Permanent "New" label', 'authow' ),
			'id'   => 'permanent_new_label',
			'type' => 'checkbox',
			'tab'  => 'product_extra_options',
			'desc' => __( 'Enable this option to make your product have "New" status forever.', 'authow' ),
		),

		array(
			'name' => esc_html__( 'Hide related products', 'authow' ),
			'id'   => 'hide_related_products',
			'type' => 'checkbox',
			'tab'  => 'product_extra_options',
			'desc' => __( 'You can hide related products on this page', 'authow' ),
		),

		array(
			'name'    => esc_html__( 'Grid swatch attribute to display', 'authow' ),
			'id'      => 'grid_swatch',
			'type'    => 'select',
			'tab'     => 'product_extra_options',
			'options' => goso_product_attributes_array( true ),
			'desc'    => __( 'Choose attribute that will be shown on products grid for this particular product', 'authow' ),
		),

		// Custom css

		array(
			'name'        => esc_html__( 'Custom CSS Code', 'authow' ),
			'id'          => 'product_custom_css',
			'type'        => 'textarea',
			'tab'         => 'product_custom_css',
			'placeholder' => '.class{ color: #fff; }',
			'desc'        => __( 'Enter your CSS code. In some case, the <code>!important</code> tag may be needed', 'authow' ),
		),
	);

	$meta_boxes[] = array(
		'id'         => 'goso-metabox-product',
		'title'      => esc_html__( 'Product Options', 'authow' ),
		'post_types' => array( 'product' ),
		'context'    => 'advanced',
		'priority'   => 'default',
		'autosave'   => 'false',
		'tabs'       => apply_filters( 'goso_product_meta_box_tabs', $tabs ),
		'fields'     => apply_filters( 'goso_product_meta_box_fields', $fields ),
	);

	return $meta_boxes;
}
