<?php
$options   = [];
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Disable Filter Trigger Auto Scroll',
	'id'       => 'goso_woo_mobile_autoscroll',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Enable Bottom Navigation',
	'id'       => 'goso_woo_mobile_bottom_nav',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_multiple_checkbox',
	'label'    => 'Select navigation menu item',
	'id'       => 'goso_woo_mobile_nav_items',
	'multiple' => 999,
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'home'     => 'Home Page',
		'shop'     => 'Shop Page',
		'cart'     => 'Cart Page',
		'account'  => 'Account Page',
		'wishlist' => 'Wishlist Page',
		'compare'  => 'Compare Page',
		'filter'   => 'Category Filter Panel',
	),
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Show custom Navigation Menus',
	'id'       => 'goso_woo_mobile_show_custom_nav',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Select Custom Menu for Mobile Bottom Navigation',
	'id'       => 'goso_woo_mobile_nav_menu',
	'type'     => 'authow-fw-ajax-select',
	'choices'  => call_user_func( function () {
		$menu_list = [ '' => '' ];
		$menus     = wp_get_nav_menus();
		if ( ! empty( $menus ) ) {
			foreach ( $menus as $menu ) {
				$menu_list[ $menu->slug ] = $menu->name;
			}
		}

		return $menu_list;
	} ),
);

return $options;
