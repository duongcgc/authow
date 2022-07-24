<?php
$options   = [];
$options[] = array(
	'default'     => 'top',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Breadcrumb Position',
	'description' => 'Select the breadcrumb position on single product',
	'id'          => 'goso_single_product_breadcrumb_position',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'top'     => 'Top of page',
		'summary' => 'Top of product summary',
		'hidden'  => 'Hidden',
	)
);
$options[] = array(
	'default'     => 'standard',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Product image width',
	'description' => 'You can choose different page layout depending on the product image size you need',
	'id'          => 'goso_single_product_img_width',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'standard'            => 'Standard',
		'medium'              => 'Medium',
		'large'               => 'Large',
		'fullwidth-container' => 'Full Width (Container)',
		'fullwidth'           => 'Full Width',
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Custom Max Width for Product Detail on Full Width Images Style', 'authow' ),
	'id'       => 'goso_single_product_summary_width',
	'ids'         => array(
		'desktop' => 'goso_single_product_summary_width',
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
	'default'     => 'thumbnail-left',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Thumbnails position',
	'description' => 'Use vertical or horizontal position for thumbnails.',
	'id'          => 'goso_single_product_thumbnail_position',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'thumbnail-left'         => 'Left',
		'thumbnail-right'        => 'Right',
		'thumbnail-bottom'       => 'Bottom',
		'thumbnail-bottom-1-col' => 'Bottom 1 Column',
		'thumbnail-bottom-2-col' => 'Bottom 2 Column',
		'thumbnail-grid'         => 'Grid',
		'thumbnail-without'      => 'Without',
	)
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Disable Zoom on Gallery Product',
	'id'       => 'goso_woo_disable_zoom',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Sticky Product Image & Content',
	'description' => 'Check to enable sticky content & product images',
	'id'          => 'goso_single_product_sticky_thumbnail_content',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Disable Single Product Ajax Add to Cart',
	'description' => 'Turn on this option if the addon product doesn\'t add to cart.',
	'id'          => 'goso_single_product_disable_ajax_atc',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_single_product_top_related_product',
	'default'     => true,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Enable Top Next/Previous Products',
	'description' => 'Check to show the next/prvious post on the top of product.',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => 'default',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Tabs Content Display Style',
	'id'       => 'goso_single_product_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'default'           => 'Standard',
		'accordion-tab'     => 'Accordion Toggle',
		'accordion-content' => 'Accordion Content',
	)
);
$options[] = array(
	'default'     => 'standard',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Product Summary Align',
	'description' => 'Select default product summary align style',
	'id'          => 'goso_single_product_summary_align',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'standard' => 'Standard',
		'center'   => 'Center',
	)
);
$options[] = array(
	'default'  => 'disable',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Enable sticky add to cart ?',
	'id'       => 'gosodesign_woo_single_sticky_add_to_cart',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'enable'  => 'Enable',
		'disable' => 'Disable',
	)
);
$options[] = array(
	'default'     => 'disable',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Add shadow to product summary block',
	'description' => 'Useful when you set background color for the single product page to gray for example.',
	'id'          => 'woo_single_add_shadow_to_summary',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'enable'  => 'Enable',
		'disable' => 'Disable',
	)
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Enable Custom Tab',
	'id'       => 'goso_woo_custom_tab',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Custom Tab Title',
	'id'       => 'goso_woo_custom_tab_title',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_textarea_field',
	'label'    => 'Custom Tab Content',
	'id'       => 'goso_woo_custom_tab_content',
	'type'     => 'authow-fw-textarea',
);
$options[] = array(
	'default'  => 50,
	'sanitize' => 'goso_sanitize_number_field',
	'label'    => 'Custom Tab Priority',
	'id'       => 'goso_woo_custom_tab_priority',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_woo_custom_tab_priority',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'     => '50',
		),
	),
);
$options[] = array(
	'default'     => true,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Convert select into the button',
	'description' => 'Convert the select into button on the no-swatches field.',
	'id'          => 'gosodesign_woo_single_select2button',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_woo_social_share_style',
	'default'     => 'style-1',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Product Social Sharing Style',
	'description' => 'Select the social sharing style.',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'style-1' => 'Style 1',
		'style-2' => 'Style 2',
		'style-3' => 'Style 3',
		'style-4' => 'Style 4',
	)
);
$options[] = array(
	'id'          => 'goso_woo_social_icon_style',
	'default'     => 'circle',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Product Social Icon Style',
	'description' => 'Select the social sharing style.',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'circle' => 'Circle',
		'square' => 'Square',
	)
);
$options[] = array(
	'id'          => 'goso_shop_product_related_columns',
	'default'     => 4,
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Related Product Columns',
	'description' => 'How many products should be shown per row on related section ?',
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
	'default'  => '4',
	'sanitize' => 'goso_sanitize_number_field',
	'label'    => 'Custom Amount of Related Products',
	'id'       => 'goso_woo_number_related_products',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_woo_number_related_products',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'     => '4',
		),
	),
);
$options[] = array(
	'id'          => 'goso_shop_product_up_sell_columns',
	'default'     => 4,
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Up Sell Product Columns',
	'description' => 'How many products should be shown per row on up sell section ?',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		2 => '2 Columns',
		3 => '3 Columns',
		4 => '4 Columns',
		5 => '5 Columns',
		6 => '6 Columns',
	)
);

return $options;
