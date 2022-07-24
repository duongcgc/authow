<?php
$options   = [];
$options[] = array(
	'id'          => 'goso_shop_product_cross_sell_columns',
	'default'     => 4,
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Cross Sell Product Columns',
	'description' => 'How many products should be shown per row on cross sell section ?',
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
	'id'        => 'goso_woo_cart_breadcrumb_active_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Breadcrumb Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_breadcrumb_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Breadcrumb Active Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_tablehead_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Table Head Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_table_border_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Table General Border Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_table_txt_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Table General Text Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_table_product_title_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Product Title Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_table_product_title_hover_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Product Title Hover Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_table_product_price_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Product Price Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_btn_bg_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Button Background Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_btn_txt_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Button Text Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_btn_hover_bg_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Button Hover Background Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_btn_hover_txt_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Button Hover Text Color',
);
// secondary button
$options[] = array(
	'id'        => 'goso_woo_cart_sbtn_bg_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Alt Button Background Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_sbtn_txt_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Alt Button Text Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_sbtn_hover_bg_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Alt Button Hover Background Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_sbtn_hover_txt_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Alt Button Hover Text Color',
);
// delete button
$options[] = array(
	'id'        => 'goso_woo_cart_del_btn_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Delete Item Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_del_btn_hv_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Delete Item Hover Color',
);
$options[] = array(
	'id'        => 'goso_woo_cart_empty_title',
	'default'   => 'Your cart is currently empty',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_text_field',
	'label'     => 'Empty Cart Title',
	'type'      => 'authow-fw-text'
);
$options[] = array(
	'id'        => 'goso_woo_cart_empty_textarea',
	'default'   => 'You don\'t have any products in the shop yet. <br> You will find a lot of interesting products on our "Shop" page.',
	'transport' => 'refresh',
	'sanitize'  => 'goso_sanitize_textarea_field',
	'label'     => 'Empty Cart Text',
	'type'      => 'authow-fw-textarea'
);
$options[] = array(
	'id'        => 'goso_woo_cart_before_content',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'goso_sanitize_textarea_field',
	'label'     => 'Custom Content Before Cart Table',
	'type'      => 'authow-fw-textarea'
);
$options[] = array(
	'id'        => 'goso_woo_cart_after_content',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'goso_sanitize_textarea_field',
	'label'     => 'Custom Content After Cart Table',
	'type'      => 'authow-fw-textarea',
);

return $options;
