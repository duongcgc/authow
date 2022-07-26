<?php
vc_map( array(
	'base'                      => "goso_column",
	'icon'                      => get_template_directory_uri() . '/images/vc-icon.png',
	'category'                  => 'Authow',
	'html_template'             => get_template_directory() . '/inc/js_composer/shortcodes/column/frontend.php',
	'weight'                    => 700,
	'name'                      => __( 'Column', 'authow' ),
	'class'                     => 'vc_main-sortable-element',
	'wrapper_class'             => '',
	'controls'                  => 'full',
	'allowed_container_element' => false,
	'content_element'           => false,
	'is_container'              => true,
	'params'                    => array(
		array(
			'type'       => 'hidden',
			'param_name' => 'width',
		),
		array(
			'type'       => 'hidden',
			'param_name' => 'class_layout',
		),
		array(
			'type'       => 'hidden',
			'param_name' => 'order',
		),
	),
	'js_view'                   => 'VcColumnView',
) );