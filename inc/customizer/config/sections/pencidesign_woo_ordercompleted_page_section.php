<?php
$options   = [];
$options[] = array(
	'id'        => 'penci_woo_checkout_txt_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Text Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_head_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Heading Text Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_border_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'General Border Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_success_icon_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Sucess Icon Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_success_icon_bg_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Sucess Icon Background Color',
);
$options[] = array(
	'id'        => 'penci_woo_checkout_success_thankyou_text',
	'default'   => 'Thank you. Your order has been received.',
	'transport' => 'refresh',
	'sanitize'  => 'penci_sanitize_textarea_field',
	'label'     => 'Custom Thankyou Text',
	'type'      => 'authow-fw-textarea',
);

return $options;
