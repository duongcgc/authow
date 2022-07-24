<?php
$options   = [];
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Enable Wishlist',
	'description' => 'Enable wishlist functionality built in with the theme.',
	'id'          => 'penci_woocommerce_wishlist',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_woo_shop_hide_wishlist_icon',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Header Wishlist Icon',
	'type'     => 'authow-fw-toggle'
);
if ( function_exists( 'penci_get_pages_option' ) ) {
	$options[] = array(
		'default'     => '',
		'sanitize'    => 'penci_sanitize_choices_field',
		'label'       => 'Wishlist page',
		'description' => 'Select a page for the wishlist table. It should contain the shortcode: [penci_wishlist]',
		'id'          => 'penci_woocommerce_wishlist_page',
		'type'        => 'authow-fw-select',
		'choices'     => penci_get_pages_option()
	);
}
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Only for logged in',
	'description' => 'Disable wishlist for guests customers.',
	'id'          => 'penci_woocommerce_wishlist_only_logged_in',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => true,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Show button on product grid',
	'description' => 'Display wishlist product button on all products grids and lists.',
	'id'          => 'penci_woocommerce_wishlist_show',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Quick Text Translate', 'authow' ),
	'id'       => 'penci_woo_section_wishlist_heading_01',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'id'       => 'penci_woo_trans_wishlist_empty_title',
	'default'  => 'Wishlist is empty.',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Empty wishlist heading text',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'default'     => 'You don\'t have any products in the wishlist yet. <br> You will find a lot of interesting products on our "Shop" page.',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => 'Empty wishlist text',
	'description' => 'Text will be displayed if user don\'t add any products to wishlist',
	'id'          => 'penci_woocommerce_wishlist_empty_text',
	'type'        => 'authow-fw-textarea',
);

return $options;
