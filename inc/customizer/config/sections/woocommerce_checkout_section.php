<?php
$options   = [];
$options[] = array(
	'id'        => 'penci_woo_checkout_breadcrumb_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Breadcrumb Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_breadcrumb_active_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Breadcrumb Active Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_form_label_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Label Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_form_border_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Form Input Border Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_form_border_focus_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Form Input Focus Border Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_form_bg_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Form Input Background Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_form_bg_focus_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Form Input Focus Background Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_order_bg_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Order Form Background Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_order_table_bg_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Order Form Table Background Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_order_table_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Order Form Table Text Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_order_head_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Order Form Table Head Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_order_accent_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Order Form Table Accent Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_order_table_border_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Order Form Table Border Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_btn_bg_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Button Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_btn_txt_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Button Text Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_btn_hover_bg_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Button Hover Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_btn_hover_txt_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Button Hover Text Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_review_order_bg_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Review Order Background Color',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_before_content',
	'default'  => '',
	'sanitize' => 'penci_sanitize_textarea_field',
	'label'    => 'Custom Content Before Checkout Form',
	'type'     => 'authow-fw-textarea',
);
$options[] = array(
	'id'       => 'penci_woo_checkout_after_content',
	'default'  => '',
	'sanitize' => 'penci_sanitize_textarea_field',
	'label'    => 'Custom Content After Checkout Form',
	'type'     => 'authow-fw-textarea',
);

return $options;
