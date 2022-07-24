<?php
vc_map( array(
	'base'                      => 'goso_column_inner',
	'icon'                      => get_template_directory_uri() . '/images/vc-icon.png',
	'category'                  => 'Authow',
	'html_template'             => get_template_directory() . '/inc/js_composer/shortcodes/goso_column_inner/frontend.php',
	'name'                      => __( 'Column Inner', 'authow' ),
	'class'                     => '',
	'wrapper_class'             => '',
	'controls'                  => 'full',
	'allowed_container_element' => false,
	'content_element'           => false,
	'is_container'              => true,
	'as_child'                  => array( 'only' => 'goso_container_inner' ),
	'params'                    => array(
		array(
			'type'       => 'hidden',
			'param_name' => 'width',
		),
		array(
			'type'       => 'hidden',
			'param_name' => 'class_layout',
		),
	),
	'js_view'                   => 'VcColumnView',
) );