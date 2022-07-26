<?php
$options   = [];
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Product Item Font Size', 'authow' ),
	'id'       => 'goso_woo_section_product_loop_typo',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'label'       => '',
	'id'          => 'gosodesign_woo_product_loop_title_m_font_size',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Product Item Title',
	'id'          => 'gosodesign_woo_product_loop_title_font_size',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_product_loop_title_font_size',
		'mobile'  => 'gosodesign_woo_product_loop_title_m_font_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'id'          => 'gosodesign_woo_product_loop_list_title_m_font_size',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Product Item Title on Listing Layout',
	'id'          => 'gosodesign_woo_product_loop_list_title_font_size',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_product_loop_list_title_font_size',
		'mobile'  => 'gosodesign_woo_product_loop_list_title_m_font_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_product_loop_meta_m_font_size',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Product Meta',
	'id'          => 'gosodesign_woo_product_loop_meta_font_size',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_product_loop_meta_font_size',
		'mobile'  => 'gosodesign_woo_product_loop_meta_m_font_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_product_loop_price_m_font_size',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Product Price',
	'id'          => 'gosodesign_woo_product_loop_price_font_size',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_product_loop_price_font_size',
		'mobile'  => 'gosodesign_woo_product_loop_price_m_font_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_product_loop_button_icon_m_size',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Button Icon',
	'id'          => 'gosodesign_woo_product_loop_button_icon_size',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_product_loop_button_icon_size',
		'mobile'  => 'gosodesign_woo_product_loop_button_icon_m_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_product_loop_button_3_m_size',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Button - Product Style 3',
	'id'          => 'gosodesign_woo_product_loop_button_3_size',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_product_loop_button_3_size',
		'mobile'  => 'gosodesign_woo_product_loop_button_3_m_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_product_loop_button_4_m_size',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Button - Product Style 4',
	'id'          => 'gosodesign_woo_product_loop_button_4_size',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_product_loop_button_4_size',
		'mobile'  => 'gosodesign_woo_product_loop_button_4_m_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_product_loop_button_5_m_size',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Button - Product Style 5',
	'id'          => 'gosodesign_woo_product_loop_button_5_size',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_product_loop_button_5_size',
		'mobile'  => 'gosodesign_woo_product_loop_button_5_m_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
/* Product Category Loop */
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Product Category Loop Font Size', 'authow' ),
	'id'       => 'goso_woo_section_product_cat_typo',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'goso_woo_loop_cat_font_size_m',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Product Category Title',
	'id'          => 'goso_woo_loop_cat_font_size',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'goso_woo_loop_cat_font_size',
		'mobile'  => 'goso_woo_loop_cat_font_size_m',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'goso_woo_loop_meta_font_size_m',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Product Category Meta',
	'id'          => 'goso_woo_loop_meta_font_size',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'goso_woo_loop_meta_font_size',
		'mobile'  => 'goso_woo_loop_meta_font_size_m',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
/* Single Product */
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Single Product Font Size', 'authow' ),
	'id'       => 'goso_woo_section_product_single_typo',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_m_product_price',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Product Title',
	'id'          => 'gosodesign_woo_fontsize_product_single_title',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_product_single_title',
		'mobile'  => 'gosodesign_woo_fontsize_product_single_m_title',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_m_product_price',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Product Price',
	'id'          => 'gosodesign_woo_fontsize_product_price',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_product_price',
		'mobile'  => 'gosodesign_woo_fontsize_m_product_price',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_m_product_breadcrumb',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Product Breadcrumb',
	'id'          => 'gosodesign_woo_fontsize_product_meta',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_product_breadcrumb',
		'mobile'  => 'gosodesign_woo_fontsize_m_product_breadcrumb',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Product General Text', 'authow' ),
	'id'       => 'gosodesign_woo_fontsize_product_general',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_product_general',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 300,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_product_tab_m_title',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Product Tab Title',
	'id'          => 'gosodesign_woo_fontsize_product_meta',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_product_tab_title',
		'mobile'  => 'gosodesign_woo_fontsize_product_tab_m_title',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_m_product_meta',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Product Meta',
	'id'          => 'gosodesign_woo_fontsize_product_meta',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_product_meta',
		'mobile'  => 'gosodesign_woo_fontsize_m_product_meta',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
/* Cart/Checkout/Thank you page */
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Additional Pages Font Size', 'authow' ),
	'id'       => 'goso_woo_section_product_additional_pages_typo',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_pages_nav_font_size_m',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Navigation Step',
	'id'          => 'gosodesign_woo_fontsize_pages_nav_font_size',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_pages_nav_font_size',
		'mobile'  => 'gosodesign_woo_fontsize_pages_nav_font_size_m',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_pages_table_th_m',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Table Head',
	'id'          => 'gosodesign_woo_fontsize_pages_table_th',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_pages_table_th',
		'mobile'  => 'gosodesign_woo_fontsize_pages_table_th_m',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_pages_table_product_title_m',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Table Product Title',
	'id'          => 'gosodesign_woo_fontsize_pages_table_product_title',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_pages_table_product_title',
		'mobile'  => 'gosodesign_woo_fontsize_pages_table_product_title_m',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_pages_table_product_price_m',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Table Product Price',
	'id'          => 'gosodesign_woo_fontsize_pages_table_product_price',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_pages_table_product_price',
		'mobile'  => 'gosodesign_woo_fontsize_pages_table_product_price_m',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_pages_table_product_subtotal_m',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Table Product Sub Total',
	'id'          => 'gosodesign_woo_fontsize_pages_table_product_subtotal',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_pages_table_product_subtotal',
		'mobile'  => 'gosodesign_woo_fontsize_pages_table_product_subtotal_m',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_pages_table_product_quantity_m',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Table Product Quantity Input',
	'id'          => 'gosodesign_woo_fontsize_pages_table_product_quantity',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_pages_table_product_quantity',
		'mobile'  => 'gosodesign_woo_fontsize_pages_table_product_quantity_m',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_pages_cart_total_h2_m',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Cart Total Heading',
	'id'          => 'gosodesign_woo_fontsize_pages_cart_total_h2',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_pages_cart_total_h2',
		'mobile'  => 'gosodesign_woo_fontsize_pages_cart_total_h2_m',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_pages_button_m',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Button',
	'id'          => 'gosodesign_woo_fontsize_pages_button',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_pages_button',
		'mobile'  => 'gosodesign_woo_fontsize_pages_button_m',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
/* Checkout Form Font Size */
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Check out Form Font Size', 'authow' ),
	'id'       => 'goso_woo_section_checkout_font_size',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_checkout_form_label_m',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Form Label',
	'id'          => 'gosodesign_woo_fontsize_checkout_form_label',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_checkout_form_label_m',
		'mobile'  => 'gosodesign_woo_fontsize_checkout_form_label',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_checkout_form_input_m',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Form Input',
	'id'          => 'gosodesign_woo_fontsize_checkout_form_input',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_checkout_form_input',
		'mobile'  => 'gosodesign_woo_fontsize_checkout_form_input_m',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_checkout_order_heading_m',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Heading',
	'id'          => 'gosodesign_woo_fontsize_checkout_order_heading',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_checkout_order_heading',
		'mobile'  => 'gosodesign_woo_fontsize_checkout_order_heading_m',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_checkout_order_button_m',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Order Button',
	'id'          => 'gosodesign_woo_fontsize_checkout_order_button',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_checkout_order_button',
		'mobile'  => 'gosodesign_woo_fontsize_checkout_order_button_m',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
/* Other Font Size */
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Other Product Font Size', 'authow' ),
	'id'       => 'goso_woo_section_product_other_typo',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'gosodesign_woo_fontsize_m_product_label',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Font Size for Product Label',
	'id'          => 'gosodesign_woo_fontsize_product_label',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'gosodesign_woo_fontsize_product_label',
		'mobile'  => 'gosodesign_woo_fontsize_m_product_label',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
return $options;
