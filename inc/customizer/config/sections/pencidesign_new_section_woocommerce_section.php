<?php
$options   = [];
$options[] = array(
	'id'       => 'penci_general_heading_1',
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Header Area', 'authow' ),
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'id'        => 'penci_woo_shop_hide_cart_icon',
	'default'   => false,
	'transport' => 'refresh',
	'sanitize'  => 'penci_sanitize_checkbox_field',
	'label'     => 'Hide Header Shopping Cart Icon',
	'type'      => 'authow-fw-toggle'
);
$options[] = array(
	'id'          => 'penci_woo_cart_style',
	'default'     => 'side-right',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Header Shopping Cart Style',
	'description' => 'Select the shopping cart detail style.',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'dropdown'   => 'Dropdown',
		'side-left'  => 'Side Left',
		'side-right' => 'Side Right',
	)
);
$options[] = array(
	'id'       => 'size_header_cart_icon_check',
	'default'  => '17',
	'sanitize' => 'penci_sanitize_number_field',
	'label'    => 'Custom Size for Woocommerce Icons at the Header',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'size_header_cart_icon_check',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'          => 'penci_woo_disable_breadcrumb',
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Disable Breadcrumb',
	'description' => 'This option apply for shop archive page only.<br/>If you want to modify the single product breadcrumb, please navigate to <strong>WooCommerce > Single Product > Breadcrumb Position</strong>.',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_general_heading_2',
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Sidebar Settings', 'authow' ),
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'id'       => 'penci_woo_shop_enable_sidebar',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Sidebar On Shop Page',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'penci_woo_cat_enable_sidebar',
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Enable Sidebar On Shop Archive',
	'description' => 'Show sidebar widget on Product Category/Tags/Atribute/Search Result pages',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_woo_single_enable_sidebar',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Sidebar On Single Product',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'penci_woo_single_sidebar_style',
	'default'     => 'bottom',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Single Product Sidebar Placement',
	'description' => 'Select the position of the sidebar display on single product.',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'bottom' => 'Bottom Content',
		'both'   => 'Top & Bottom',
	)
);
$options[] = array(
	'id'       => 'penci_woo_left_sidebar',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Left Sidebar',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_woo_widgets_scroll',
	'default'  => true,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Scrollable For Filter Widget',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'label'       => '',
	'id'          => 'penci_woo_widgets_scroll_m_height',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Custom Maximium Height For Filter Widget',
	'id'          => 'penci_woo_widgets_scroll_height',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'penci_woo_widgets_scroll_height',
		'mobile'  => 'penci_woo_widgets_scroll_m_height',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 300,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 300,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'id'       => 'penci_general_heading_4',
	'label'    => esc_html__( 'Pagination Settings', 'authow' ),
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'     => 'pagination',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Products pagination',
	'description' => 'Choose a type for the pagination on your shop page.',
	'id'          => 'penci_shop_product_pagination',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'pagination' => 'Pagination',
		'loadmore'   => 'Load More Button',
		'infinit'    => 'Infinit Scrolling',
	)
);
$options[] = array(
	'default'  => 'center',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Page Navigation Alignment',
	'id'       => 'penci_woo_paging_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'center' => 'Center',
		'left'   => 'Left',
		'right'  => 'Right'
	)
);
$options[] = array(
	'default'     => '400',
	'sanitize'    => 'penci_sanitize_number_field',
	'label'       => 'Infinit Ajax Scroll Threshold',
	'description' => 'Sets the distance between the viewport to scroll area for scrollThreshold event to be triggered. <a target="_blank" href="https://infinite-scroll.com/options.html#scrollthreshold">Click here</a> for more information.',
	'id'          => 'penci_shop_product_pagination_ajax_threshold',
	'type'        => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_shop_product_pagination_ajax_threshold',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'     => 'false',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Infinit Scroll History Options',
	'description' => 'Changes page URL and browser history. <a target="_blank" href="https://infinite-scroll.com/options.html#history-options">Click here</a> for more information.',
	'id'          => 'penci_shop_product_pagination_ajax_history',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'false'   => 'Disable',
		'push'    => 'Push',
		'replace' => 'Replace',
	)
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'History Title',
	'description' => 'Updates the window title. Requires history enabled. <a target="_blank" href="https://infinite-scroll.com/options.html#historytitle">Click here</a> for more information.',
	'id'          => 'penci_shop_product_pagination_ajax_title',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => true,
	'id'          => 'penci_shop_mini_cart_quantity',
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Side Cart Product Quantity Input',
	'description' => 'Show quantity input on side cart product item.',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'id'       => 'penci_shop_stock_progress_bar',
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Show Stock Progress Bar on Product',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_general_heading_5',
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Other Settings', 'authow' ),
	'type'     => 'authow-fw-header',
);

$options[] = array(
	'id'       => 'penci_woocommerce_search_included_posts',
	'default'  => true,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Show blog search results below of product search',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_woocommerce_search_included_total',
	'default'  => 5,
	'sanitize' => 'penci_sanitize_number_field',
	'label'    => 'Total blog item Display under product serch',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_woocommerce_search_included_total',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
		),
	),
);

return $options;
