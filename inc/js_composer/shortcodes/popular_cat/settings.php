<?php
$group_color   = 'Typo & Color';

$params_heading           = Goso_Vc_Params_Helper::params_heading();
$extra_params             = Goso_Vc_Params_Helper::extra_params();
$param_heading_typo_color = Goso_Vc_Params_Helper::params_heading_typo_color();

$main_params = array(
	array(
		'type'       => 'textfield',
		'heading'    => esc_html__( 'Amount', 'authow' ),
		'param_name' => 'plimit',
		'std'        => '10',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Categories type', 'authow' ),
		'param_name' => 'pcat_type',
		'value'      => array(
			__( 'Popular categories by number posts', 'authow' )   => 'default',
			__( 'Popular categories sort by name A->Z', 'authow' ) => 'alphabetical_order',
		),
		'std'        => 'default',
	),
	array(
		'type'             => 'checkbox',
		'heading'          => esc_html__( 'Show posts count', 'authow' ),
		'param_name'       => 'pcount',
		'edit_field_class' => 'vc_col-sm-6',
		'value'            => array( __( 'Yes', 'authow' ) => 'yes' ),
	),
	array(
		'type'             => 'checkbox',
		'heading'          => esc_html__( 'Show hierarchy', 'authow' ),
		'param_name'       => 'phierarchical',
		'edit_field_class' => 'vc_col-sm-6',
		'value'            => array( __( 'Yes', 'authow' ) => 'yes' ),
	),
	array(
		'type'             => 'checkbox',
		'heading'          => esc_html__( 'Hide Uncategorized category', 'authow' ),
		'param_name'       => 'phide_uncat',
		'edit_field_class' => 'vc_col-sm-6',
		'value'            => array( __( 'Yes', 'authow' ) => 'yes' ),
	)
);
$typo_params = array(
	array(
		'type'             => 'textfield',
		'param_name'       => 'heading_popularcat_settings',
		'heading'          => esc_html__( 'Popular cats', 'authow' ),
		'value'            => '',
		'group'            => $group_color,
		'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Link Color', 'authow' ),
		'param_name'       => 'plink_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Link Hover Color', 'authow' ),
		'param_name'       => 'plink_hcolor',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'       => 'goso_number',
		'param_name' => 'pcat_item_size',
		'heading'    => __( 'Font size for Link', 'authow' ),
		'value'      => '',
		'std'        => '',
		'suffix'     => 'px',
		'min'        => 1,
		'group'      => $group_color,
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Post Counts  Text Color', 'authow' ),
		'param_name'       => 'ppcount_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	)
);

vc_map( array(
	'base'          => "goso_popular_cat",
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => goso_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/popular_cat/frontend.php',
	'weight'        => 700,
	'name'          => goso_get_theme_name('Goso').' '.__( 'Popular Cat', 'authow' ),
	'description'   => __( 'Popular Cat Block', 'authow' ),
	'controls'      => 'full',
	'params'        => array_merge( $main_params, $params_heading, $param_heading_typo_color, $typo_params, $extra_params )
) );
