<?php
vc_map( array(
	'base'                    => 'goso_container_inner',
	'icon'                    => get_template_directory_uri() . '/images/vc-icon.png',
	'category'                => goso_get_theme_name('Authow'),
	'html_template'           => get_template_directory() . '/inc/js_composer/shortcodes/goso_container_inner/frontend.php',
	'name'                    => goso_get_theme_name('Goso').' '.__( 'Container', 'authow' ),
	'description'             => esc_html__( 'Place content elements inside the container', 'js_composer' ),
	'weight'                  => 1000,
	'is_container'            => true,
	'show_settings_on_create' => false,
	'as_child'                => array( 'only' => 'goso_column_inner' ),
	'params'                  => array(
		array(
			'type'       => 'hidden',
			'param_name' => 'el_width',
			'std'        => 'w1080',
			'value'      => 'w1080',
		),
		array(
			'type'       => 'hidden',
			'param_name' => 'container_layout',
		),
		array(
			'type'       => 'checkbox',
			'heading'    => __( 'Disable sticky content & sidebar.', 'authow' ),
			'param_name' => 'el_disable_sticky',
			'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
		),
		array(
			'type'        => 'el_id',
			'heading'     => __( 'Row ID', 'authow' ),
			'param_name'  => 'el_id',
			'description' => sprintf( __( 'Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'authow' ), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . __( 'link', 'authow' ) . '</a>' ),
		),
	),
	'js_view'          => 'VcGosoContainerView',
	'default_content'  => '[goso_column_inner width="1/3"][/goso_column_inner][goso_column_inner width="2/3"][/goso_column_inner]',
) );
