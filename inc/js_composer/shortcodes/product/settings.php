<?php
$group_color = 'Typo & Color';
vc_map( array(
	'base'          => 'penci_product',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => penci_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/product/frontend.php',
	'weight'        => 700,
	'name'          => penci_get_theme_name('Goso').' '.esc_html__( 'Product', 'authow' ),
	'description'   => __( 'Show the latest product', 'authow' ),
	'controls'      => 'full',
	'params'        => array_merge(
		array(
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Date Source', 'authow' ),
				'value'            => array(
					esc_html__( 'All Products', 'authow' )            => 'product',
					esc_html__( 'Featured Products', 'authow' )       => 'featured',
					esc_html__( 'Sale Products', 'authow' )           => 'sale',
					esc_html__( 'Products with NEW label', 'authow' ) => 'new',
					esc_html__( 'Bestsellers', 'authow' )             => 'bestselling',
					esc_html__( 'List of IDs', 'authow' )             => 'ids',
					esc_html__( 'Top Rated Products', 'authow' )      => 'top_rated_products',
				),
				'std'              => 'product',
				'param_name'       => 'post_type',
				'edit_field_class' => 'vc_col-sm-12',
			),
			array(
				'type'             => 'autocomplete',
				'heading'          => __( 'Included Only', 'authow' ),
				'value'            => '',
				'param_name'       => 'include',
				'edit_field_class' => 'vc_col-sm-4',
				'hint'             => esc_html__( 'Add products by title.', 'authow' ),
				'settings'         => array(
					'multiple' => true,
					'sortable' => true,
					'groups'   => true
				),
			),
			array(
				'type'             => 'autocomplete',
				'heading'          => __( 'Excluded', 'authow' ),
				'value'            => '',
				'param_name'       => 'exclude',
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'             => 'autocomplete',
				'heading'          => __( 'Categories OR Tags', 'authow' ),
				'value'            => '',
				'param_name'       => 'taxonomies',
				'edit_field_class' => 'vc_col-sm-4',
				'settings'         => array(
					'multiple'       => true,
					// is multiple values allowed? default false
					// 'sortable' => true, // is values are sortable? default false
					'min_length'     => 1,
					// min length to start search -> default 2
					// 'no_hide' => true, // In UI after select doesn't hide an select list, default false
					'groups'         => true,
					// In UI show results grouped by groups, default false
					'unique_values'  => true,
					// In UI show results except selected. NB! You should manually check values in backend, default false
					'display_inline' => true,
					// In UI show results inline view, default false (each value in own line)
					'delay'          => 500,
					// delay for search. default 500
					'auto_focus'     => true,
					// auto focus input, default true
				),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Order by', 'authow' ),
				'value'            => array(
					''                                            => '',
					esc_html__( 'Date', 'authow' )               => 'date',
					esc_html__( 'ID', 'authow' )                 => 'id',
					esc_html__( 'Author', 'authow' )             => 'author',
					esc_html__( 'Title', 'authow' )              => 'title',
					esc_html__( 'Last modified date', 'authow' ) => 'modified',
					esc_html__( 'Number of comments', 'authow' ) => 'comment_count',
					esc_html__( 'Menu order', 'authow' )         => 'menu_order',
					esc_html__( 'Meta value', 'authow' )         => 'meta_value',
					esc_html__( 'Meta value number', 'authow' )  => 'meta_value_num',
					esc_html__( 'Random order', 'authow' )       => 'rand',
					esc_html__( 'Price', 'authow' )              => 'price',
				),
				'std'              => '',
				'edit_field_class' => 'vc_col-sm-6',
				'param_name'       => 'orderby',
			),
			array(
				'type'             => 'textfield',
				'heading'          => __( 'Offset', 'authow' ),
				'value'            => '',
				'param_name'       => 'offset',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Query Type', 'authow' ),
				'value'            => array(
					esc_html__( 'OR', 'authow' )  => 'or',
					esc_html__( 'AND', 'authow' ) => 'and',
				),
				'std'              => 'or',
				'param_name'       => 'query_type',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Sort order', 'authow' ),
				'value'            => array(
					esc_html__( 'Inherit', 'authow' )    => '',
					esc_html__( 'Descending', 'authow' ) => 'DESC',
					esc_html__( 'Ascending', 'authow' )  => 'ASC',
				),
				'std'              => 'DESC',
				'param_name'       => 'order',
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Meta Key', 'authow' ),
				'description' => esc_html__( 'Input meta key for grid ordering.', 'authow' ),
				'value'       => '',
				'std'         => '',
				'param_name'  => 'meta_key',
			),
		),
		array(
			array(
				'type'             => 'dropdown',
				'group'            => 'Layout & Design',
				'heading'          => __( 'Products Display', 'authow' ),
				'value'            => array(
					esc_html__( 'Grid', 'authow' )     => 'grid',
					esc_html__( 'List', 'authow' )     => 'list',
					esc_html__( 'Carousel', 'authow' ) => 'carousel',
				),
				'std'              => 'grid',
				'param_name'       => 'layout',
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'             => 'dropdown',
				'group'            => 'Layout & Design',
				'heading'          => __( 'Columns', 'authow' ),
				'value'            => array(
					esc_html__( '2 Columns', 'authow' ) => 2,
					esc_html__( '3 Columns', 'authow' ) => 3,
					esc_html__( '4 Columns', 'authow' ) => 4,
					esc_html__( '5 Columns', 'authow' ) => 5,
					esc_html__( '6 Columns', 'authow' ) => 6,
				),
				'std'              => 3,
				'param_name'       => 'columns',
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'             => 'dropdown',
				'group'            => 'Layout & Design',
				'heading'          => __( 'Tablet Columns', 'authow' ),
				'value'            => array(
					esc_html__( '2 Columns', 'authow' ) => 2,
					esc_html__( '3 Columns', 'authow' ) => 3,
					esc_html__( '4 Columns', 'authow' ) => 4,
					esc_html__( '5 Columns', 'authow' ) => 5,
					esc_html__( '6 Columns', 'authow' ) => 6,
				),
				'std'              => 2,
				'param_name'       => 'tablet_columns',
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'             => 'dropdown',
				'group'            => 'Layout & Design',
				'heading'          => __( 'Mobile Columns', 'authow' ),
				'value'            => array(
					esc_html__( '2 Columns', 'authow' ) => 2,
					esc_html__( '3 Columns', 'authow' ) => 3,
					esc_html__( '4 Columns', 'authow' ) => 4,
					esc_html__( '5 Columns', 'authow' ) => 5,
					esc_html__( '6 Columns', 'authow' ) => 6,
				),
				'std'              => 1,
				'param_name'       => 'mobile_columns',
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'             => 'textfield',
				'group'            => 'Layout & Design',
				'heading'          => __( 'Items per page', 'authow' ),
				'std'              => '12',
				'param_name'       => 'items_per_page',
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'             => 'dropdown',
				'group'            => 'Layout & Design',
				'heading'          => __( 'Paginations', 'authow' ),
				'value'            => array(
					esc_html__( 'Inherit', 'authow' )           => '',
					esc_html__( 'Load more button', 'authow' )  => 'loadmore',
					esc_html__( 'Infinit scrolling', 'authow' ) => 'infinit',
					esc_html__( 'Links', 'authow' )             => 'links',
					esc_html__( 'Hidden', 'authow' )            => 'none',
				),
				'std'              => '',
				'param_name'       => 'pagination',
				'edit_field_class' => 'vc_col-sm-6',
			),

			// Carousel Settings
			array(
				'type'       => 'checkbox',
				'group'      => 'Layout & Design',
				'heading'    => __( 'Scroll per page', 'authow' ),
				'std'        => '3',
				'param_name' => 'scroll_per_page',
				'dependency' => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),

			array(
				'type'       => 'checkbox',
				'group'      => 'Layout & Design',
				'heading'    => __( 'Show Next Previous Button', 'authow' ),
				'std'        => '',
				'param_name' => 'hide_prev_next_buttons',
				'dependency' => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),

			array(
				'type'       => 'checkbox',
				'group'      => 'Layout & Design',
				'heading'    => __( 'Show Pagination Control', 'authow' ),
				'std'        => '',
				'param_name' => 'hide_pagination_control',
				'dependency' => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),

			array(
				'type'       => 'checkbox',
				'group'      => 'Layout & Design',
				'heading'    => __( 'Slider Loop', 'authow' ),
				'std'        => '',
				'param_name' => 'wrap',
				'dependency' => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),

			array(
				'type'       => 'checkbox',
				'group'      => 'Layout & Design',
				'heading'    => __( 'Slider Autoplay', 'authow' ),
				'std'        => '',
				'param_name' => 'autoplay',
				'dependency' => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),

			array(
				'type'       => 'textfield',
				'group'      => 'Layout & Design',
				'heading'    => __( 'Carousel Speed', 'authow' ),
				'std'        => '300',
				'param_name' => 'speed',
				'dependency' => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),

			array(
				'type'       => 'checkbox',
				'group'      => 'Layout & Design',
				'heading'    => __( 'Init carousel on scroll', 'authow' ),
				'std'        => '',
				'param_name' => 'scroll_carousel_init',
				'dependency' => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
		),
		array(
			array(
				'type'       => 'dropdown',
				'group'      => 'Product Style',
				'heading'    => __( 'Product Style', 'authow' ),
				'value'      => array(
					esc_html__( 'Inherit from Theme Settings', 'authow' ) => 'inherit',
					'Default'                                              => 'standard',
					'Style 1'                                              => 'style-1',
					'Style 2'                                              => 'style-2',
					'Style 3'                                              => 'style-3',
					'Style 4'                                              => 'style-4',
					'Style 5'                                              => 'style-5',
					'Style 6'                                              => 'style-6',
				),
				'std'        => 'style-1',
				'param_name' => 'product_style',
			),
			array(
				'type'       => 'dropdown',
				'group'      => 'Product Style',
				'heading'    => __( 'Image Size', 'authow' ),
				'value'      => Goso_Vc_Params_Helper::get_list_image_sizes( true ),
				'param_name' => 'img_size',
			),
			array(
				'type'       => 'textfield',
				'group'      => 'Product Style',
				'heading'    => __( 'Custom Image Size', 'authow' ),
				'value'      => '',
				'param_name' => 'img_custom_size',
			),
			array(
				'type'       => 'checkbox',
				'group'      => 'Product Style',
				'heading'    => __( 'Sale Countdown', 'authow' ),
				'value'      => '',
				'param_name' => 'sale_countdown',
			),
			array(
				'type'       => 'checkbox',
				'group'      => 'Product Style',
				'heading'    => __( 'Stock Progress Bar', 'authow' ),
				'value'      => '',
				'param_name' => 'stock_progress_bar',
			),
			array(
				'type'       => 'checkbox',
				'group'      => 'Product Style',
				'heading'    => __( 'Product Category', 'authow' ),
				'value'      => '',
				'param_name' => 'product_categories',
			),
			array(
				'type'       => 'checkbox',
				'group'      => 'Product Style',
				'heading'    => __( 'Product Rating', 'authow' ),
				'value'      => '',
				'param_name' => 'product_rating',
			),
		),
		array(
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Product Title Color', 'authow' ),
				'param_name'       => 'product_title_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'penci_number',
				'heading'          => esc_html__( 'Product Title Font Size', 'authow' ),
				'param_name'       => 'product_title_font_size',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Product Category Color', 'authow' ),
				'param_name'       => 'product_category_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'penci_number',
				'heading'          => esc_html__( 'Product Category Font Size', 'authow' ),
				'param_name'       => 'product_category_font_size',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Product Price Color', 'authow' ),
				'param_name'       => 'product_price_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'penci_number',
				'heading'          => esc_html__( 'Product Price Font Size', 'authow' ),
				'param_name'       => 'product_price_font_size',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Pagination Color', 'authow' ),
				'param_name'       => 'product_pagination_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Pagination Border Color', 'authow' ),
				'param_name'       => 'product_pagination_boder_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Pagination Hover Color', 'authow' ),
				'param_name'       => 'product_pagination_hover_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Pagination Border Hover Color', 'authow' ),
				'param_name'       => 'product_pagination_border_hover_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Pagination Current Item Color', 'authow' ),
				'param_name'       => 'product_pagination_current_item_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Pagination Current Item Border Color', 'authow' ),
				'param_name'       => 'product_pagination_current_item_border_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Pagination Current Background Color', 'authow' ),
				'param_name'       => 'product_pagination_current_bg_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Pagination View More Background Color', 'authow' ),
				'param_name'       => 'product_pagination_viewmore_bg_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Pagination View More Hover Background Color', 'authow' ),
				'param_name'       => 'product_pagination_viewmore_hover_bg_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Pagination View More Text Color', 'authow' ),
				'param_name'       => 'product_pagination_viewmore_text_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Pagination View More Hover Text Color', 'authow' ),
				'param_name'       => 'product_pagination_viewmore_hover_text_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
		),
		Goso_Vc_Params_Helper::heading_block_params(),
		Goso_Vc_Params_Helper::params_heading_typo_color(),
		Goso_Vc_Params_Helper::extra_params()
	)
) );
