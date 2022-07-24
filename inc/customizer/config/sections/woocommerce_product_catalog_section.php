<?php
$options   = [];
$options[] = array(
	'id'       => 'penci_woo_post_per_page',
	'default'  => '24',
	'sanitize' => 'penci_sanitize_number_field',
	'label'    => 'Total Products Display Per Page',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_woo_post_per_page',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'     => '24',
		),
	),
);
$options[] = array(
	'id'       => 'penci_catalog_heading_1',
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Catalog Tools Settings', 'authow' ),
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '9,24,36',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Products Per Page Variations',
	'id'       => 'penci_woo_post_per_page_variations',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'id'       => 'penci_woo_per_row_columns_selector',
	'default'  => true,
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Show Columns Selector on Shop page',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => 'list-grid',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Shop products view',
	'description' => 'You can set different view mode for the shop page',
	'id'          => 'penci_shop_product_view',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'grid'      => 'Grid',
		'list'      => 'List',
		'grid-list' => 'Grid/List',
		'list-grid' => 'List/Grid',
	)
);
$options[] = array(
	'default'     => true,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'AJAX shop',
	'description' => 'Enable AJAX functionality for filter widgets, categories navigation, and pagination on the shop page.',
	'id'          => 'penci_woocommerce_ajax_shop',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => true,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Scroll to top after AJAX',
	'description' => 'Disable - Enable scroll to top after AJAX.',
	'id'          => 'penci_woocommerce_ajax_shop_auto_top',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_calalog_heading_1',
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Product Item Settings', 'authow' ),
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'     => 'style-1',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Product Category Style',
	'description' => 'Select the style of the category showing on archive/categories/tags/search',
	'id'          => 'penci_woocommerce_product_cat_style',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'style-1' => 'Style 1',
		'style-2' => 'Style 2',
		'style-3' => 'Style 3',
		'style-4' => 'Style 4',
		'style-5' => 'Style 5',
	)
);
$options[] = array(
	'default'     => 'style-1',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Product Item Style',
	'description' => 'Select the style of the product showing on shop/archive/categories/tags/search<br/>.',
	'id'          => 'penci_woocommerce_product_style',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'standard' => 'Default',
		'style-1'  => 'Style 1',
		'style-2'  => 'Style 2',
		'style-3'  => 'Style 3',
		'style-4'  => 'Style 4',
		'style-5'  => 'Style 5',
		'style-6'  => 'Style 6',
		'style-7'  => 'Style 7',
	)
);
$options[] = array(
	'id'          => 'penci_woocommerce_product_icon_hover_style',
	'default'     => 'round',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Icon Hover Style',
	'description' => 'Select icon hover style on Product Item',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'round' => 'Separate Round',
		'group' => 'Group in Rectangle',
	)
);
$options[] = array(
	'id'          => 'penci_woocommerce_product_icon_hover_position',
	'default'     => 'top-left',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Icon Hover Position',
	'description' => 'Select icon hover position on Product Item',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'top-left'      => 'Top left',
		'top-right'     => 'Top Right',
		'bottom-left'   => 'Bottom Left',
		'bottom-right'  => 'Bottom Right',
		'center-top'    => 'Center Top',
		'center-center' => 'Center Center',
		'center-bottom' => 'Center Bottom',
	)
);
$options[] = array(
	'id'          => 'penci_woocommerce_product_icon_hover_animation',
	'default'     => 'move-right',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Icon Hover Animation',
	'description' => 'Select icon hover animation on Product Item',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'move-left'   => 'Move to left',
		'move-right'  => 'Move to Right',
		'move-top'    => 'Move to Top',
		'move-bottom' => 'Move to Bottom',
		'fade'        => 'Fade In',
		'zoom'        => 'Zoom In',
	)
);
$options[] = array(
	'id'       => 'penci_woocommerce_product_hover_img',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Hover Image on Product Catalog ?',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => true,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Show product category ?',
	'description' => 'Display product category link below the product title.',
	'id'          => 'penci_woocommerce_loop_category',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'penci_woocommerce_loop_rating',
	'default'     => true,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Show product star rating ?',
	'description' => 'Display product loop rating below the product title.',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Login to see add to cart and prices',
	'description' => 'You can restrict shopping functions only for logged in customers.',
	'id'          => 'penci_woocommerce_restrict_cart_price',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Enable Quick Select Options on Product',
	'description' => 'Allow customers purchase product on hover content.',
	'id'          => 'penci_woocommerce_product_quick_shop',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_number_field',
	'label'    => 'Limit Product Title Length',
	'desc'     => 'Enter the custom length of the product title you want to display',
	'id'       => 'penci_woo_limit_product_title',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_woo_limit_product_title',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
		),
	),
);
$options[] = array(
	'id'       => 'penci_woo_limit_product_excerpt',
	'default'  => '',
	'sanitize' => 'penci_sanitize_number_field',
	'label'    => 'Limit Product Excerpt Length',
	'desc'     => 'Enter the custom length of the product summary you want to display',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_woo_limit_product_excerpt',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
		),
	),
);
if ( function_exists( 'penci_product_attributes_array' ) ) {
	$options[] = array(
		'id'          => 'penci_woocommerce_grid_swatch',
		'default'     => false,
		'sanitize'    => 'penci_sanitize_choices_field',
		'label'       => 'Grid swatch attribute to display',
		'description' => 'Choose the attribute that will be shown on the product grid.',
		'type'        => 'authow-fw-ajax-select',
		'choices'     => penci_product_attributes_array(),
	);
}
$options[] = array(
	'id'       => 'penci_woocommerce_grid_swatch_limit',
	'default'  => '5',
	'sanitize' => 'absint',
	'label'    => 'Limit swatches on grid ',
);
$options[] = array(
	'id'          => 'penci_woocommerce_grid_swatch_cache',
	'default'     => true,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Enable Product Swatches Shop Cache',
	'description' => 'By default, Authow using cache to speed up Query for swatch image. Uncheck this option to disable/debug.',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_catalog_heading_4',
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Catalog Columns Settings', 'authow' ),
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'id'          => 'penci_shop_cat_columns',
	'default'     => 4,
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Categories Columns',
	'description' => 'How many category should be shown per row on section ?',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		2 => '2 Columns',
		3 => '3 Columns',
		4 => '4 Columns',
		5 => '5 Columns',
		6 => '6 Columns',
	)
);
$options[] = array(
	'id'          => 'penci_shop_cat_display_type',
	'default'     => 'grid',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Categories Display Style',
	'description' => 'Select the category displays style on shop/category page',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'grid'     => 'Grid',
		'carousel' => 'Carousel',
	)
);
$options[] = array(
	'id'          => 'penci_shop_product_columns',
	'default'     => 3,
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Products per row on Desktop',
	'description' => 'How many products should be shown per row on desktop ?',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		2 => '2 Columns',
		3 => '3 Columns',
		4 => '4 Columns',
		5 => '5 Columns',
		6 => '6 Columns',
	)
);
$options[] = array(
	'id'          => 'penci_shop_product_mobile_columns',
	'default'     => 2,
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Products per row on Mobile',
	'description' => 'How many products should be shown per row on mobile ?',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		1 => '1 Column',
		2 => '2 Columns',
	)
);

return $options;
