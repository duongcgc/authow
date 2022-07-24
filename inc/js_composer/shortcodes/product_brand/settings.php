<?php
$group_color = 'Typo & Color';
vc_map( array(
	'base'          => 'goso_product_brand',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => goso_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/product_brand/frontend.php',
	'weight'        => 700,
	'name'          => goso_get_theme_name('Goso').' '.esc_html__( 'Product Brand', 'authow' ),
	'description'   => __( 'Show the product brand list', 'authow' ),
	'controls'      => 'full',
	'params'        => array_merge(
		array(
			array(
				'type'             => 'textfield',
				'heading'          => __( 'Number', 'authow' ),
				'value'            => '',
				'param_name'       => 'number',
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Order by', 'authow' ),
				'param_name'       => 'orderby',
				'edit_field_class' => 'vc_col-sm-4',
				'value'            => array(
					''                                      => '',
					esc_html__( 'Name', 'authow' )         => 'name',
					esc_html__( 'ID', 'authow' )           => 'term_id',
					esc_html__( 'Slug', 'authow' )         => 'slug',
					esc_html__( 'Random order', 'authow' ) => 'random',
				),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Sort order', 'authow' ),
				'param_name'       => 'order',
				'edit_field_class' => 'vc_col-sm-4',
				'value'            => array(
					esc_html__( 'Inherit', 'authow' )    => '',
					esc_html__( 'Descending', 'authow' ) => 'DESC',
					esc_html__( 'Ascending', 'authow' )  => 'ASC',
				),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => __( 'Hide Empty', 'authow' ),
				'param_name'       => 'order',
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'             => 'autocomplete',
				'heading'          => __( 'Brand', 'authow' ),
				'param_name'       => 'ids',
				'edit_field_class' => 'vc_col-sm-4',
			),
		),
		array(
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Brand images hover', 'authow' ),
				'param_name'       => 'hover',
				'edit_field_class' => 'vc_col-sm-4',
				'value'            => array(
					esc_html__( 'Default', 'authow' )   => 'default',
					esc_html__( 'Simple', 'authow' )    => 'simple',
					esc_html__( 'Alternate', 'authow' ) => 'alt',
				),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Style', 'authow' ),
				'param_name'       => 'style',
				'edit_field_class' => 'vc_col-sm-4',
				'value'            => array(
					esc_html__( 'Default', 'authow' )  => 'default',
					esc_html__( 'Bordered', 'authow' ) => 'bordered',
				),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Layout', 'authow' ),
				'param_name'       => 'layout',
				'edit_field_class' => 'vc_col-sm-4',
				'value'            => array(
					esc_html__( 'Carousel', 'authow' )   => 'carousel',
					esc_html__( 'Grid', 'authow' )       => 'grid',
					esc_html__( 'Links List', 'authow' ) => 'list',
				),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Columns', 'authow' ),
				'param_name'       => 'columns',
				'edit_field_class' => 'vc_col-sm-4',
				'value'            => array(
					esc_html__( '2 Columns', 'authow' ) => 2,
					esc_html__( '3 Columns', 'authow' ) => 3,
					esc_html__( '4 Columns', 'authow' ) => 4,
					esc_html__( '5 Columns', 'authow' ) => 5,
					esc_html__( '6 Columns', 'authow' ) => 6,
				),
				'dependency'       => array( 'element' => 'style', 'value' => array( 'grid', 'list' ) ),
			),
		),
		array(
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Slides per view', 'authow' ),
				'param_name'       => 'slides_per_view',
				'edit_field_class' => 'vc_col-sm-4',
				'value'            => array(
					esc_html__( '2 Columns', 'authow' ) => 2,
					esc_html__( '3 Columns', 'authow' ) => 3,
					esc_html__( '4 Columns', 'authow' ) => 4,
					esc_html__( '5 Columns', 'authow' ) => 5,
					esc_html__( '6 Columns', 'authow' ) => 6,
				),
				'dependency'       => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => __( 'Hide pagination control', 'authow' ),
				'param_name'       => 'hide_pagination_control',
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'       => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => __( 'Hide prev/next buttons', 'authow' ),
				'param_name'       => 'hide_prev_next_buttons',
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'       => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => __( 'Slider loop', 'authow' ),
				'param_name'       => 'wrap',
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'       => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => __( 'Slider autoplay', 'authow' ),
				'param_name'       => 'autoplay',
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'       => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
			array(
				'type'             => 'textfield',
				'heading'          => __( 'Slider speed', 'authow' ),
				'param_name'       => 'speed',
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'       => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
			array(
				'type'             => 'textfield',
				'heading'          => __( 'Init carousel on scroll', 'authow' ),
				'param_name'       => 'scroll_carousel_init',
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'       => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
		),
		Goso_Vc_Params_Helper::heading_block_params(),
		Goso_Vc_Params_Helper::params_heading_typo_color(),
		Goso_Vc_Params_Helper::extra_params()
	)
) );
