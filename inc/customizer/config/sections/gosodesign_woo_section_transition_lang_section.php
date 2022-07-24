<?php
$options                      = [];
$options[]                    = array(
	'default'  => 'Shop by Department',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Shop by Department',
	'id'       => 'goso_woo_vertical_menu_title',
	'type'     => 'authow-fw-text',
);
$gosowoo_translate_texts     = goso_woo_get_translate_text();
$goso_woo_already_translates = array(
	'goso_woocommerce_wishlist_empty_text',
	'goso_woocommerce_compare_empty_text',
	'goso_woo_trans_compare_empty_title',
	'goso_woo_trans_wishlist_empty_title',
	'goso_woo_cart_empty_title',
	'goso_woo_cart_empty_textarea',
);
foreach ( $goso_woo_already_translates as $untranslate ) {
	unset( $gosowoo_translate_texts[ $untranslate ] );
}
foreach ( $gosowoo_translate_texts as $translate_option => $translate_default ) {
	$options[] = array(
		'id'       => $translate_option,
		'default'  => $translate_default,
		'sanitize' => 'sanitize_text_field',
		'label'    => 'Text: ' . $translate_default,
		'type'     => 'authow-fw-text',
	);
}

return $options;
