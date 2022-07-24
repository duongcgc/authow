<?php
$options   = [];
$options[] = array(
	'default'  => '24',
	'sanitize' => 'goso_sanitize_number_field',
	'label'    => 'Total Products Display Per Page',
	'id'       => 'goso_woo_post_per_page',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_woo_post_per_page',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '24',
		),
	),
);
$options[] = array(
	'id'       => 'goso_catalog_heading_1',
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Catalog Tools Settings', 'authow' ),
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '9,24,36',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Products Per Page Variations',
	'id'       => 'goso_woo_post_per_page_variations',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'id'       => 'goso_woo_per_row_columns_selector',
	'default'  => true,
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Show Columns Selector on Shop page',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => 'list-grid',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Shop products view',
	'description' => 'You can set different view mode for the shop page',
	'id'          => 'goso_shop_product_view',
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
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'AJAX shop',
	'description' => 'Enable AJAX functionality for filter widgets, categories navigation, and pagination on the shop page.',
	'id'          => 'goso_woocommerce_ajax_shop',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => true,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Scroll to top after AJAX',
	'description' => 'Disable - Enable scroll to top after AJAX.',
	'id'          => 'goso_woocommerce_ajax_shop_auto_top',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'goso_general_heading_5',
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Other Settings', 'authow' ),
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'id'       => 'goso_woocommerce_search_included_posts',
	'default'  => true,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Show blog search results below of product search',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'goso_woocommerce_search_included_total',
	'default'  => 5,
	'sanitize' => 'goso_sanitize_number_field',
	'label'    => 'Total blog item Display under product serch',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_woocommerce_search_included_total',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => 5,
		),
	),
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Product Item Settings', 'authow' ),
	'id'       => 'goso_calalog_heading_1',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'     => 'style-1',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Product Category Style',
	'description' => 'Select the style of the category showing on archive/categories/tags/search',
	'id'          => 'goso_woocommerce_product_cat_style',
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
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Product Item Style',
	'description' => 'Select the style of the product showing on shop/archive/categories/tags/search<br/>.',
	'id'          => 'goso_woocommerce_product_style',
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
	'default'     => 'round',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Icon Hover Style',
	'description' => 'Select icon hover style on Product Item',
	'id'          => 'goso_woocommerce_product_icon_hover_style',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'round' => 'Separate Round',
		'group' => 'Group in Rectangle',
	)
);
$options[] = array(
	'default'     => 'top-left',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Icon Hover Position',
	'description' => 'Select icon hover position on Product Item',
	'id'          => 'goso_woocommerce_product_icon_hover_position',
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
	'default'     => 'move-right',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Icon Hover Animation',
	'description' => 'Select icon hover animation on Product Item',
	'id'          => 'goso_woocommerce_product_icon_hover_animation',
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
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Enable Hover Image on Product Catalog ?',
	'id'       => 'goso_woocommerce_product_hover_img',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => true,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Show product category ?',
	'description' => 'Display product category link below the product title.',
	'id'          => 'goso_woocommerce_loop_category',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_woocommerce_loop_rating',
	'default'     => true,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Show product star rating ?',
	'description' => 'Display product loop rating below the product title.',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Login to see add to cart and prices',
	'description' => 'You can restrict shopping functions only for logged in customers.',
	'id'          => 'goso_woocommerce_restrict_cart_price',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Enable Quick Select Options on Product',
	'description' => 'Allow customers purchase product on hover content.',
	'id'          => 'goso_woocommerce_product_quick_shop',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_number_field',
	'label'    => 'Limit Product Title Length',
	'desc'     => 'Enter the custom length of the product title you want to display',
	'id'       => 'goso_woo_limit_product_title',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_woo_limit_product_title',
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
	'default'  => '',
	'sanitize' => 'goso_sanitize_number_field',
	'label'    => 'Limit Product Excerpt Length',
	'desc'     => 'Enter the custom length of the product summary you want to display',
	'id'       => 'goso_woo_limit_product_excerpt',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_woo_limit_product_excerpt',
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
if ( function_exists( 'goso_product_attributes_array' ) && function_exists( 'wc_get_attribute_taxonomies' ) ) {
	$options[] = array(
		'default'     => false,
		'sanitize'    => 'goso_sanitize_choices_field',
		'label'       => 'Grid swatch attribute to display',
		'description' => 'Choose the attribute that will be shown on the product grid.',
		'id'          => 'goso_woocommerce_grid_swatch',
		'type'        => 'authow-fw-ajax-select',
		'choices'     => call_user_func( function () {
			$attributes = array();
			foreach ( wc_get_attribute_taxonomies() as $attribute ) {
				$attributes[ 'pa_' . $attribute->attribute_name ] = $attribute->attribute_label;
			}

			return $attributes;
		} ),
	);
}
$options[] = array(
	'default'  => '5',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'label'    => 'Limit swatches on grid ',
	'id'       => 'goso_woocommerce_grid_swatch_limit',
	'ids'      => array(
		'desktop' => 'goso_woocommerce_grid_swatch_limit',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '5',
		),
	),
);
$options[] = array(
	'default'     => true,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Enable Product Swatches Shop Cache',
	'description' => 'By default, Authow using cache to speed up Query for swatch image. Uncheck this option to disable/debug.',
	'id'          => 'goso_woocommerce_grid_swatch_cache',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Catalog Columns Settings', 'authow' ),
	'id'       => 'goso_catalog_heading_4',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'     => 4,
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Categories Columns',
	'description' => 'How many category should be shown per row on section ?',
	'id'          => 'goso_shop_cat_columns',
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
	'default'     => 'grid',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Categories Display Style',
	'description' => 'Select the category displays style on shop/category page',
	'id'          => 'goso_shop_cat_display_type',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'grid'     => 'Grid',
		'carousel' => 'Carousel',
	)
);
$options[] = array(
	'default'     => 3,
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Products per row on Desktop',
	'description' => 'How many products should be shown per row on desktop ?',
	'type'        => 'authow-fw-select',
	'id'          => 'goso_shop_product_columns',
	'choices'     => array(
		2 => '2 Columns',
		3 => '3 Columns',
		4 => '4 Columns',
		5 => '5 Columns',
		6 => '6 Columns',
	)
);
$options[] = array(
	'default'     => 2,
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Products per row on Mobile',
	'description' => 'How many products should be shown per row on mobile ?',
	'id'          => 'goso_shop_product_mobile_columns',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		1 => '1 Column',
		2 => '2 Columns',
	)
);

return $options;
