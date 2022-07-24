<?php
$group_color  = 'Typo & Color';
$group_custom = 'Custom Grid Items';
vc_map( array(
	'base'          => 'penci_big_grid',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => penci_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/big_grid/frontend.php',
	'weight'        => 700,
	'name'          => penci_get_theme_name('Goso').' '.esc_html__( 'Big Grid', 'authow' ),
	'description'   => __( 'Posts Big Grid', 'authow' ),
	'controls'      => 'full',
	'params'        => array_merge(
		array(
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Query Type:', 'authow' ),
				'value'      => array(
					esc_html__( 'Base Post', 'authow' ) => 'post',
					esc_html__( 'Custom', 'authow' )    => 'custom',
				),
				'std'        => 'post',
				'param_name' => 'bgquery_type',
			),
			array(
				'type'        => 'loop',
				'heading'     => __( '', 'authow' ),
				'param_name'  => 'build_query',
				'value'       => 'post_type:post|size:10',
				'settings'    => array(
					'size'      => array( 'value' => 10, 'hidden' => false ),
					'post_type' => array( 'value' => 'post', 'hidden' => false )
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'authow' ),
				'dependency'  => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Select Style for This Slider', 'authow' ),
				'value'      => array(
					esc_html__( 'Grid ( Default )', 'authow' ) => 'style-1',
					esc_html__( 'Masonry', 'authow' )          => 'style-2',
					esc_html__( 'Style 3', 'authow' )          => 'style-3',
					esc_html__( 'Style 4', 'authow' )          => 'style-4',
					esc_html__( 'Style 5', 'authow' )          => 'style-5',
					esc_html__( 'Style 6', 'authow' )          => 'style-6',
					esc_html__( 'Style 7', 'authow' )          => 'style-7',
					esc_html__( 'Style 8', 'authow' )          => 'style-8',
					esc_html__( 'Style 9', 'authow' )          => 'style-9',
					esc_html__( 'Style 10', 'authow' )         => 'style-10',
					esc_html__( 'Style 11', 'authow' )         => 'style-11',
					esc_html__( 'Style 12', 'authow' )         => 'style-12',
					esc_html__( 'Style 13', 'authow' )         => 'style-13',
					esc_html__( 'Style 14', 'authow' )         => 'style-14',
					esc_html__( 'Style 15', 'authow' )         => 'style-15',
					esc_html__( 'Style 16', 'authow' )         => 'style-16',
					esc_html__( 'Style 17', 'authow' )         => 'style-17',
					esc_html__( 'Style 18', 'authow' )         => 'style-18',
					esc_html__( 'Style 19', 'authow' )         => 'style-19',
					esc_html__( 'Style 20', 'authow' )         => 'style-20',
					esc_html__( 'Style 21', 'authow' )         => 'style-21',
					esc_html__( 'Style 22', 'authow' )         => 'style-22',
				),
				'std'        => 'style-1',
				'param_name' => 'style',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Grid/Masonry Style Columns', 'authow' ),
				'value'      => array(
					esc_html__( '1 Column', 'authow' )  => '1',
					esc_html__( '2 Columns', 'authow' ) => '2',
					esc_html__( '3 Columns', 'authow' ) => '3',
					esc_html__( '4 Columns', 'authow' ) => '4',
					esc_html__( '5 Columns', 'authow' ) => '5',
					esc_html__( '6 Columns', 'authow' ) => '6'
				),
				'std'        => '3',
				'param_name' => 'bg_columns',
				'dependency' => array( 'element' => 'style', 'value' => array( 'style-1', 'style-2' ) ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Grid/Masonry Style Columns on Tablet', 'authow' ),
				'value'      => array(
					esc_html__( 'Default', 'authow' )  => '',
					esc_html__( '1 Column', 'authow' )  => '1',
					esc_html__( '2 Columns', 'authow' ) => '2',
					esc_html__( '3 Columns', 'authow' ) => '3',
					esc_html__( '4 Columns', 'authow' ) => '4',
				),
				'std'        => '',
				'param_name' => 'bg_columns_tablet',
				'dependency' => array( 'element' => 'style', 'value' => array( 'style-1', 'style-2' ) ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Grid/Masonry Style Columns on Mobile', 'authow' ),
				'value'      => array(
					esc_html__( '1 Column', 'authow' )  => '1',
					esc_html__( '2 Columns', 'authow' ) => '2',
					esc_html__( '3 Columns', 'authow' ) => '3',
				),
				'std'        => '1',
				'param_name' => 'bg_columns_mobile',
				'dependency' => array( 'element' => 'style', 'value' => array( 'style-1', 'style-2' ) ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Showing Post Data', 'authow' ),
				'value'      => array(
					esc_html__( 'Categories', 'authow' )   => 'cat',
					esc_html__( 'Title', 'authow' )        => 'title',
					esc_html__( 'Author', 'authow' )       => 'author',
					esc_html__( 'Date', 'authow' )         => 'date',
					esc_html__( 'Comments', 'authow' )     => 'comment',
					esc_html__( 'Views', 'authow' )        => 'views',
					esc_html__( 'Reading Time', 'authow' ) => 'reading',
				),
				'std'        => 'cat,title,author,date',
				'param_name' => 'bg_postmeta',
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => __( 'Custom Title Words Length', 'authow' ),
				'std'        => 10,
				'param_name' => 'title_length',
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Show Primary Category Only', 'authow' ),
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'param_name' => 'primary_cat',
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Hide Post Categories on Small Grid Items', 'authow' ),
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'param_name' => 'hide_cat_small',
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Hide Post Meta( Author, Date.. ) on Small Grid Items', 'authow' ),
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'param_name' => 'hide_meta_small',
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Hide Post Categories/Sub Title on Mobile', 'authow' ),
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'param_name' => 'hide_subtitle_mobile',
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Hide Post Meta/Description on Mobile', 'authow' ),
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'param_name' => 'hide_desc_mobile',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Show Read More Button', 'authow' ),
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'param_name' => 'show_readmore',
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Hide Read More Button on Small Grid Items', 'authow' ),
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'param_name' => 'hide_rm_small',
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Hide Read More Button on Mobile', 'authow' ),
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'param_name' => 'hide_readmore_mobile',
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Show Post Format Icons', 'authow' ),
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'param_name' => 'show_formaticon',
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Post Format Icon Position', 'authow' ),
				'value'      => array(
					esc_html__( 'Top Right', 'authow' )    => 'top-right',
					esc_html__( 'Top Left', 'authow' )     => 'top-left',
					esc_html__( 'Bottom Right', 'authow' ) => 'bottom-right',
					esc_html__( 'Bottom Left', 'authow' )  => 'bottom-left',
					esc_html__( 'Center', 'authow' )       => 'center',
				),
				'std'        => 'top-right',
				'param_name' => 'formaticon_pos',
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Show Review Scores from Goso Review plugin', 'authow' ),
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'param_name' => 'show_reviewpie',
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Review Scores Position', 'authow' ),
				'value'      => array(
					esc_html__( 'Top Right', 'authow' )    => 'top-right',
					esc_html__( 'Top Left', 'authow' )     => 'top-left',
					esc_html__( 'Bottom Right', 'authow' ) => 'bottom-right',
					esc_html__( 'Bottom Left', 'authow' )  => 'bottom-left',
					esc_html__( 'Center', 'authow' )       => 'center',
				),
				'std'        => 'top-left',
				'param_name' => 'reviewpie_pos',
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Display One Column on Mobile?', 'authow' ),
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'param_name' => 'onecol_mobile',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Display Grid Items Same Height on Mobile?', 'authow' ),
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'param_name' => 'sameh_mobile',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Big Grid Content Position', 'authow' ),
				'value'      => array(
					esc_html__( 'On Image', 'authow' )    => 'on',
					esc_html__( 'Below Image', 'authow' ) => 'below',
					esc_html__( 'Above Image', 'authow' ) => 'above',
				),
				'std'        => 'on',
				'param_name' => 'bgcontent_pos',
			),
			array(
				'type'       => 'penci_only_number',
				'heading'    => __( 'Gap Between Grid & Masonry Items', 'authow' ),
				'std'        => '',
				'param_name' => 'bg_gap',
				'dependency' => array( 'element' => 'style', 'value' => array( 'style-1', 'style-2' ) ),
			),
			array(
				'type'       => 'penci_only_number',
				'heading'    => __( 'Gap Between Items', 'authow' ),
				'std'        => '',
				'param_name' => 'bg_othergap',
				'dependency' => array( 'element' => 'style', 'value_not_equal_to' => array( 'style-1', 'style-2' ) ),
			),
			array(
				'type'       => 'penci_only_number',
				'heading'    => __( 'Adjust Ratio of Images( Unit % )', 'authow' ),
				'std'        => '',
				'param_name' => 'penci_img_ratio',
			),
			array(
				'type'       => 'penci_only_number',
				'heading'    => __( 'Custom Big Grid Height (Unit is px)', 'authow' ),
				'std'        => '',
				'param_name' => 'bg_height',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Disable Lazyload Images?', 'authow' ),
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'param_name' => 'disable_lazy',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => __( 'Page Navigation Style', 'authow' ),
				'description' => __( 'Load More Posts Button & Infinite Scroll just works on frontend only.', 'authow' ),
				'value'       => array(
					esc_html__( 'None', 'authow' )                    => 'none',
					esc_html__( 'Page Navigation Numbers', 'authow' ) => 'numbers',
					esc_html__( 'Load More Posts Button', 'authow' )  => 'loadmore',
					esc_html__( 'Infinite Scroll', 'authow' )         => 'scroll',
				),
				'std'         => 'none',
				'param_name'  => 'paging',
				'dependency'  => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Page Navigation Align', 'authow' ),
				'value'      => array(
					esc_html__( 'Center', 'authow' ) => 'align-center',
					esc_html__( 'Left', 'authow' )   => 'align-left',
					esc_html__( 'Right', 'authow' )  => 'align-right',
				),
				'std'        => 'align-center',
				'param_name' => 'paging_align',
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
			array(
				'type'       => 'penci_only_number',
				'heading'    => __( 'Margin Top for Page Navigation', 'authow' ),
				'std'        => '',
				'param_name' => 'paging_matop',
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
			),
		),
		Goso_Vc_Params_Helper::params_heading(),
		Goso_Vc_Params_Helper::params_heading_typo_color(),

		/* Custom */

		array(
			array(
				'type'             => 'textfield',
				'param_name'       => 'penci_separator_cs_items',
				'heading'          => __( 'Custom Grid Items', 'authow' ),
				'description'      => __( 'Add your custom grid item here', 'authow' ),
				'group'            => $group_custom,
				'dependency'       => array( 'element' => 'bgquery_type', 'value' => array( 'post' ) ),
				'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'       => 'param_group',
				'param_name' => 'biggrid_items',
				'heading'    => esc_html__( 'Custom Grid Items', 'authow' ),
				'group'      => $group_custom,
				'dependency' => array( 'element' => 'bgquery_type', 'value' => array( 'custom' ) ),
				'value'      => urlencode( json_encode( array(
					array(
						'image'        => vc_asset_url( 'vc/vc_gitem_image.png' ),
						'sub_title'    => __( 'Sub Title', 'authow' ),
						'title'        => __( 'Big Grid Item #1', 'authow' ),
						'desc'         => __( 'I am demo text. Edit grid items to edit me', 'authow' ),
						'button_text'  => __( 'Click Here', 'authow' ),
						'custom_style' => false,
					),
					array(
						'image'        => vc_asset_url( 'vc/vc_gitem_image.png' ),
						'sub_title'    => __( 'Sub Title', 'authow' ),
						'title'        => __( 'Big Grid Item #2', 'authow' ),
						'desc'         => __( 'I am demo text. Edit grid items to edit me', 'authow' ),
						'button_text'  => __( 'Click Here', 'authow' ),
						'custom_style' => false,
					),
					array(
						'image'        => vc_asset_url( 'vc/vc_gitem_image.png' ),
						'sub_title'    => __( 'Sub Title', 'authow' ),
						'title'        => __( 'Big Grid Item #3', 'authow' ),
						'desc'         => __( 'I am demo text. Edit grid items to edit me', 'authow' ),
						'button_text'  => __( 'Click Here', 'authow' ),
						'custom_style' => false,
					),
					array(
						'image'        => vc_asset_url( 'vc/vc_gitem_image.png' ),
						'sub_title'    => __( 'Sub Title', 'authow' ),
						'title'        => __( 'Big Grid Item #4', 'authow' ),
						'desc'         => __( 'I am demo text. Edit grid items to edit me', 'authow' ),
						'button_text'  => __( 'Click Here', 'authow' ),
						'custom_style' => false,
					),
					array(
						'image'        => vc_asset_url( 'vc/vc_gitem_image.png' ),
						'sub_title'    => __( 'Sub Title', 'authow' ),
						'title'        => __( 'Big Grid Item #5', 'authow' ),
						'desc'         => __( 'I am demo text. Edit grid items to edit me', 'authow' ),
						'button_text'  => __( 'Click Here', 'authow' ),
						'custom_style' => false,
					),
					array(
						'image'        => vc_asset_url( 'vc/vc_gitem_image.png' ),
						'sub_title'    => __( 'Sub Title', 'authow' ),
						'title'        => __( 'Big Grid Item #6', 'authow' ),
						'desc'         => __( 'I am demo text. Edit grid items to edit me', 'authow' ),
						'button_text'  => __( 'Click Here', 'authow' ),
						'custom_style' => false,
					),
				) ) ),
				'params'     => array(
					array(
						'type'       => 'attach_image',
						'holder'     => 'img',
						'class'      => '',
						'heading'    => __( 'Select Image', 'authow' ),
						'param_name' => 'image',
					),
					array(
						'type'       => 'textfield',
						'heading'    => __( 'Sub title', 'authow' ),
						'param_name' => 'sub_title',
					),
					array(
						'type'       => 'textfield',
						'heading'    => __( 'Title', 'authow' ),
						'param_name' => 'title',
					),
					array(
						'type'       => 'vc_link',
						'heading'    => __( 'Add Link for Title & Image', 'authow' ),
						'param_name' => 'title_link',
					),
					array(
						'type'       => 'textarea',
						'heading'    => __( 'Description', 'authow' ),
						'param_name' => 'desc',
					),
					array(
						'type'       => 'textfield',
						'heading'    => __( 'Button Text', 'authow' ),
						'param_name' => 'button_text',
					),
					array(
						'type'       => 'vc_link',
						'heading'    => __( 'Button Link', 'authow' ),
						'param_name' => 'button_link',
					),

					/* Style */
					array(
						'type'       => 'checkbox',
						'heading'    => __( 'Custom Style ?', 'authow' ),
						'param_name' => 'custom_style',
						'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
					),

					array(
						'type'             => 'dropdown',
						'heading'          => __( 'Horizontal Position', 'authow' ),
						'param_name'       => 'horizontal_position',
						'value'            => array(
							esc_html__( 'Center', 'authow' ) => 'align-center',
							esc_html__( 'Left', 'authow' )   => 'align-left',
							esc_html__( 'Right', 'authow' )  => 'align-right',
						),
						'dependency'       => array( 'element' => 'custom_style', 'value' => 'yes' ),
						'edit_field_class' => 'vc_col-sm-4',
					),

					array(
						'type'             => 'dropdown',
						'heading'          => __( 'Verical Position', 'authow' ),
						'param_name'       => 'vertical_position',
						'value'            => array(
							esc_html__( 'Top', 'authow' )    => 'top',
							esc_html__( 'Middle', 'authow' ) => 'middle',
							esc_html__( 'Bottom', 'authow' ) => 'bottom',
						),
						'dependency'       => array( 'element' => 'custom_style', 'value' => 'yes' ),
						'edit_field_class' => 'vc_col-sm-4',
					),

					array(
						'type'             => 'dropdown',
						'heading'          => __( 'Text Align', 'authow' ),
						'param_name'       => 'text_align',
						'std'              => 'align-left',
						'value'            => array(
							esc_html__( 'Center', 'authow' ) => 'align-center',
							esc_html__( 'Left', 'authow' )   => 'align-left',
							esc_html__( 'Right', 'authow' )  => 'align-right',
						),
						'dependency'       => array( 'element' => 'custom_style', 'value' => 'yes' ),
						'edit_field_class' => 'vc_col-sm-4',
					),

					array(
						'type'             => 'colorpicker',
						'heading'          => __( 'Sub Title Color', 'authow' ),
						'param_name'       => 'subtitle_color',
						'dependency'       => array( 'element' => 'custom_style', 'value' => 'yes' ),
						'edit_field_class' => 'vc_col-sm-6',
					),

					array(
						'type'             => 'colorpicker',
						'heading'          => __( 'Title Color', 'authow' ),
						'param_name'       => 'title_color',
						'dependency'       => array( 'element' => 'custom_style', 'value' => 'yes' ),
						'edit_field_class' => 'vc_col-sm-6',
					),

					array(
						'type'             => 'colorpicker',
						'heading'          => __( 'Title Hover Color', 'authow' ),
						'param_name'       => 'title_hcolor',
						'dependency'       => array( 'element' => 'custom_style', 'value' => 'yes' ),
						'edit_field_class' => 'vc_col-sm-6',
					),

					array(
						'type'             => 'colorpicker',
						'heading'          => __( 'Description Color', 'authow' ),
						'param_name'       => 'desc_color',
						'dependency'       => array( 'element' => 'custom_style', 'value' => 'yes' ),
						'edit_field_class' => 'vc_col-sm-6',
					),

					array(
						'type'             => 'colorpicker',
						'heading'          => __( 'Button Text Color', 'authow' ),
						'param_name'       => 'button_color',
						'dependency'       => array( 'element' => 'custom_style', 'value' => 'yes' ),
						'edit_field_class' => 'vc_col-sm-6',
					),

					array(
						'type'             => 'colorpicker',
						'heading'          => __( 'Button Text Hover Color', 'authow' ),
						'param_name'       => 'button_hcolor',
						'dependency'       => array( 'element' => 'custom_style', 'value' => 'yes' ),
						'edit_field_class' => 'vc_col-sm-6',
					),

					array(
						'type'             => 'colorpicker',
						'heading'          => __( 'Button Border Color', 'authow' ),
						'param_name'       => 'button_border_color',
						'dependency'       => array( 'element' => 'custom_style', 'value' => 'yes' ),
						'edit_field_class' => 'vc_col-sm-6',
					),

					array(
						'type'             => 'colorpicker',
						'heading'          => __( 'Button Border Hover Color', 'authow' ),
						'param_name'       => 'button_border_hcolor',
						'dependency'       => array( 'element' => 'custom_style', 'value' => 'yes' ),
						'edit_field_class' => 'vc_col-sm-6',
					),

					array(
						'type'             => 'colorpicker',
						'heading'          => __( 'Button Background Color', 'authow' ),
						'param_name'       => 'button_bg_color',
						'dependency'       => array( 'element' => 'custom_style', 'value' => 'yes' ),
						'edit_field_class' => 'vc_col-sm-6',
					),

					array(
						'type'             => 'colorpicker',
						'heading'          => __( 'Button Background Hover Color', 'authow' ),
						'param_name'       => 'button_bg_hcolor',
						'dependency'       => array( 'element' => 'custom_style', 'value' => 'yes' ),
						'edit_field_class' => 'vc_col-sm-6',
					),

					array(
						'type'             => 'textfield',
						'heading'          => __( 'Content Text Padding', 'authow' ),
						'param_name'       => 'bgoverlay_padding',
						'dependency'       => array( 'element' => 'custom_style', 'value' => 'yes' ),
						'edit_field_class' => 'vc_col-sm-6',
					),

					array(
						'type'             => 'textfield',
						'heading'          => __( 'Content Text Margin', 'authow' ),
						'param_name'       => 'bgoverlay_margin',
						'dependency'       => array( 'element' => 'custom_style', 'value' => 'yes' ),
						'edit_field_class' => 'vc_col-sm-6',
					),
				),
			),
		),

		/* end custom */

		array(
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Custom Image Size', 'authow' ),
				'param_name' => 'thumb_size',
				'std'        => 'penci-masonry-thumb',
				'group'      => 'Other',
				'value'      => Goso_Vc_Params_Helper::get_list_image_sizes( true ),
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Image Size for Big Items', 'authow' ),
				'param_name' => 'bthumb_size',
				'std'        => 'penci-masonry-thumb',
				'group'      => 'Other',
				'value'      => Goso_Vc_Params_Helper::get_list_image_sizes( true ),
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Custom Image Size for Mobile', 'authow' ),
				'param_name' => 'mthumb_size',
				'std'        => 'penci-masonry-thumb',
				'group'      => 'Other',
				'value'      => Goso_Vc_Params_Helper::get_list_image_sizes( true ),
			),
		),

		/* Color */
		array(
			array(
				'type'             => 'textfield',
				'param_name'       => 'penci_separator_bgstyle_',
				'heading'          => esc_html__( 'Big Grid Style', 'authow' ),
				'value'            => '',
				'group'            => $group_color,
				'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Content Text Horizontal Position', 'authow' ),
				'param_name' => 'content_horizontal_position',
				'std'        => 'left',
				'value'      => array(
					esc_html__( 'Center', 'authow' ) => 'center',
					esc_html__( 'Left', 'authow' )   => 'left',
					esc_html__( 'Right', 'authow' )  => 'right',
				),
				'group'      => $group_color,
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Content Text Vertical Position', 'authow' ),
				'param_name' => 'content_vertical_position',
				'value'      => array(
					esc_html__( 'Top', 'authow' )    => 'top',
					esc_html__( 'Middle', 'authow' ) => 'middle',
					esc_html__( 'Bottom', 'authow' ) => 'bottom',
				),
				'group'      => $group_color,
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Content Text Align', 'authow' ),
				'param_name' => 'content_text_align',
				'std'        => 'left',
				'value'      => array(
					esc_html__( 'Center', 'authow' ) => 'center',
					esc_html__( 'Left', 'authow' )   => 'left',
					esc_html__( 'Right', 'authow' )  => 'right',
				),
				'group'      => $group_color,
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Content Text Display', 'authow' ),
				'param_name' => 'content_display',
				'value'      => array(
					esc_html__( 'Block', 'authow' )        => 'block',
					esc_html__( 'Inline Block', 'authow' ) => 'inline-block',
				),
				'group'      => $group_color,
			),

			array(
				'type'       => 'penci_only_number',
				'heading'    => __( 'Content Text Max-Width', 'authow' ),
				'param_name' => 'content_width',
				'group'      => $group_color,
			),

			array(
				'type'       => 'penci_only_number',
				'heading'    => __( 'Content Text Padding', 'authow' ),
				'param_name' => 'content_padding',
				'group'      => $group_color,
			),

			array(
				'type'       => 'penci_only_number',
				'heading'    => __( 'Content Text Margin', 'authow' ),
				'param_name' => 'content_margin',
				'group'      => $group_color,
			),

			array(
				'type'             => 'textfield',
				'param_name'       => 'penci_separator_bgoverlay',
				'heading'          => __( 'Big Grid Overlay', 'authow' ),
				'group'            => $group_color,
				'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Apply Overlay On:', 'authow' ),
				'param_name' => 'overlay_type',
				'value'      => array(
					esc_html__( 'Whole', 'authow' )              => 'whole',
					esc_html__( 'Whole Content Text', 'authow' ) => 'text',
					esc_html__( 'None', 'authow' )               => 'none',
				),
				'group'      => $group_color,
			),

			array(
				'type'       => 'penci_only_number',
				'heading'    => __( 'Overlay Opacity(%)', 'authow' ),
				'param_name' => 'overlay_opacity',
				'group'      => $group_color,
			),

			array(
				'type'       => 'penci_only_number',
				'heading'    => __( 'Overlay Hover Opacity(%)', 'authow' ),
				'param_name' => 'overlay_hopacity',
				'group'      => $group_color,
			),

			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Apply Separate Background for Categories/Sub Title', 'authow' ),
				'param_name' => 'apply_spe_bg_subtitle',
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Background for Categories/Sub Title', 'authow' ),
				'param_name' => 'spe_bg_subtitle',
				'group'      => $group_color,
				'dependency' => array( 'element' => 'apply_spe_bg_subtitle', 'value' => 'yes' ),
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Background for Categories/Sub Title on Hover', 'authow' ),
				'param_name' => 'spe_bg_hsubtitle',
				'group'      => $group_color,
				'dependency' => array( 'element' => 'apply_spe_bg_subtitle', 'value' => 'yes' ),
			),

			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Apply Separate Background for Title', 'authow' ),
				'param_name' => 'apply_spe_bg_title',
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Background for Title', 'authow' ),
				'param_name' => 'spe_bg_title',
				'group'      => $group_color,
				'dependency' => array( 'element' => 'apply_spe_bg_title', 'value' => 'yes' ),
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Background for Title on Hover', 'authow' ),
				'param_name' => 'spe_bg_htitle',
				'group'      => $group_color,
				'dependency' => array( 'element' => 'apply_spe_bg_title', 'value' => 'yes' ),
			),

			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Apply Separate Background for Post Meta/Description', 'authow' ),
				'param_name' => 'apply_spe_bg_meta',
				'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Background for Post Meta/Description', 'authow' ),
				'param_name' => 'spe_bg_meta',
				'group'      => $group_color,
				'dependency' => array( 'element' => 'apply_spe_bg_meta', 'value' => 'yes' ),
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Background for Post Meta/Description on Hover', 'authow' ),
				'param_name' => 'spe_bg_hmeta',
				'group'      => $group_color,
				'dependency' => array( 'element' => 'apply_spe_bg_meta', 'value' => 'yes' ),
			),

			array(
				'type'             => 'textfield',
				'param_name'       => 'penci_separator_hover_effect',
				'heading'          => __( 'Big Grid Hover Effects', 'authow' ),
				'group'            => $group_color,
				'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Image Hover Effect', 'authow' ),
				'param_name' => 'image_hover',
				'value'      => array(
					'Zoom-In'        => 'zoom-in',
					'Zoom-out'       => 'zoom-out',
					'Move to Left'   => 'move-left',
					'Move to Right'  => 'move-right',
					'Move to Bottom' => 'move-bottom',
					'Move to Top'    => 'move-top',
					'None'           => 'none',
				),
				'group'      => $group_color,
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Content Text Hover Type', 'authow' ),
				'param_name' => 'text_overlay',
				'value'      => array(
					'None'          => 'none',
					'Show on Hover' => 'show-in',
					'Hide on Hover' => 'hide-in',
				),
				'group'      => $group_color,
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Content Text Hover Animation', 'authow' ),
				'param_name' => 'text_overlay_ani',
				'value'      => array(
					'Move to Top'    => 'movetop',
					'Move to Bottom' => 'movebottom',
					'Move to Left'   => 'moveleft',
					'Move to Right'  => 'moveright',
					'Zoom In'        => 'zoomin',
					'Zoom Out'       => 'zoomout',
					'Fade'           => 'fade',
				),
				'group'      => $group_color,
			),

			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Makes Titles Always Visible?', 'authow' ),
				'param_name' => 'title_anivisi',
				'group'      => $group_color,
				'dependency' => array( 'element' => 'text_overlay', 'value_not_equal_to' => array( 'none' ) ),
			),

			array(
				'type'             => 'textfield',
				'param_name'       => 'penci_separator_typo_color',
				'heading'          => __( 'Big Grid Typo & Color', 'authow' ),
				'group'            => $group_color,
				'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Background Color', 'authow' ),
				'param_name' => 'bgitem_bg',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Border Color', 'authow' ),
				'param_name' => 'bgitem_borders',
				'group'      => $group_color,
			),

			array(
				'type'       => 'penci_number',
				'heading'    => __( 'Borders Width', 'authow' ),
				'param_name' => 'bgitem_borderwidth',
				'group'      => $group_color,
			),

			array(
				'type'       => 'penci_only_number',
				'heading'    => __( 'Padding', 'authow' ),
				'param_name' => 'bgitem_padding',
				'group'      => $group_color,
			),

			array(
				'type'             => 'textfield',
				'param_name'       => 'penci_separator_bgtitle_design',
				'heading'          => __( 'Big Grid Title Design', 'authow' ),
				'group'            => $group_color,
				'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Text & Link Color', 'authow' ),
				'param_name' => 'bgsub_title',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Link Hover Color', 'authow' ),
				'param_name' => 'bgsub_title_hover',
				'group'      => $group_color,
			),

			array(
				'type'       => 'font_container',
				'heading'    => __( 'Typography', 'authow' ),
				'param_name' => 'bgsub_title_typo',
				'value'      => '',
				'group'      => $group_color,
				'settings'   => array(
					'fields' => array(
						//'tag'                     => 'h2',
						'text_align',
						'font_size',
						'line_height',
						'color',
						'tag_description'         => esc_html__( 'Select element tag.', 'js_composer' ),
						'text_align_description'  => esc_html__( 'Select text alignment.', 'js_composer' ),
						'font_size_description'   => esc_html__( 'Enter font size.', 'js_composer' ),
						'line_height_description' => esc_html__( 'Enter line height.', 'js_composer' ),
						'color_description'       => esc_html__( 'Select color for your element.', 'js_composer' ),
					),
				),
			),

			array(
				'type'             => 'textfield',
				'param_name'       => 'penci_separator_bgtitle',
				'heading'          => __( 'Big Grid Title', 'authow' ),
				'group'            => $group_color,
				'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Title Color', 'authow' ),
				'param_name' => 'bgtitle_color',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Title Hover Color', 'authow' ),
				'param_name' => 'bgtitle_color_hover',
				'group'      => $group_color,
			),

			array(
				'type'       => 'font_container',
				'heading'    => __( 'Title Typography for Big Items', 'authow' ),
				'param_name' => 'bgtitle_typo_big',
				'value'      => '',
				'group'      => $group_color,
				'settings'   => array(
					'fields' => array(
						//'tag'                     => 'h2',
						'text_align',
						'font_size',
						'line_height',
						'color',
						'tag_description'         => esc_html__( 'Select element tag.', 'js_composer' ),
						'text_align_description'  => esc_html__( 'Select text alignment.', 'js_composer' ),
						'font_size_description'   => esc_html__( 'Enter font size.', 'js_composer' ),
						'line_height_description' => esc_html__( 'Enter line height.', 'js_composer' ),
						'color_description'       => esc_html__( 'Select color for your element.', 'js_composer' ),
					),
				),
			),

			array(
				'type'       => 'font_container',
				'heading'    => __( 'Title Typography', 'authow' ),
				'param_name' => 'bgtitle_typo',
				'value'      => '',
				'group'      => $group_color,
				'settings'   => array(
					'fields' => array(
						//'tag'                     => 'h2',
						'text_align',
						'font_size',
						'line_height',
						'color',
						'tag_description'         => esc_html__( 'Select element tag.', 'js_composer' ),
						'text_align_description'  => esc_html__( 'Select text alignment.', 'js_composer' ),
						'font_size_description'   => esc_html__( 'Enter font size.', 'js_composer' ),
						'line_height_description' => esc_html__( 'Enter line height.', 'js_composer' ),
						'color_description'       => esc_html__( 'Select color for your element.', 'js_composer' ),
					),
				),
			),

			array(
				'type'             => 'textfield',
				'param_name'       => 'penci_separator_post_meta',
				'heading'          => __( 'Post Meta & Description Text', 'authow' ),
				'group'            => $group_color,
				'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Text Color', 'authow' ),
				'param_name' => 'bgdesc_color',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Links Color', 'authow' ),
				'param_name' => 'bgdesc_link_color',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Links Hover Color', 'authow' ),
				'param_name' => 'bgdesc_link_hcolor',
				'group'      => $group_color,
			),

			array(
				'type'       => 'font_container',
				'heading'    => __( 'Typography', 'authow' ),
				'param_name' => 'title_typo',
				'value'      => '',
				'group'      => $group_color,
				'settings'   => array(
					'fields' => array(
						//'tag'                     => 'h2',
						'text_align',
						'font_size',
						'line_height',
						'color',
						'tag_description'         => esc_html__( 'Select element tag.', 'js_composer' ),
						'text_align_description'  => esc_html__( 'Select text alignment.', 'js_composer' ),
						'font_size_description'   => esc_html__( 'Enter font size.', 'js_composer' ),
						'line_height_description' => esc_html__( 'Enter line height.', 'js_composer' ),
						'color_description'       => esc_html__( 'Select color for your element.', 'js_composer' ),
					),
				),
			),

			array(
				'type'             => 'textfield',
				'param_name'       => 'penci_separator_readmore',
				'heading'          => __( 'Read More Button', 'authow' ),
				'group'            => $group_color,
				'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Text Color', 'authow' ),
				'param_name' => 'readmore_color',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Text Hover Color', 'authow' ),
				'param_name' => 'readmore_hcolor',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Border Color', 'authow' ),
				'param_name' => 'bgreadmore_color',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Border Hover Color', 'authow' ),
				'param_name' => 'bgreadmore_hcolor',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Background Color', 'authow' ),
				'param_name' => 'bgreadmore_bgcolor',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Background Hover Color', 'authow' ),
				'param_name' => 'bgreadmore_hbgcolor',
				'group'      => $group_color,
			),

			array(
				'type'       => 'font_container',
				'heading'    => __( 'Typography', 'authow' ),
				'param_name' => 'bgreadm_typo',
				'value'      => '',
				'group'      => $group_color,
				'settings'   => array(
					'fields' => array(
						//'tag'                     => 'h2',
						'text_align',
						'font_size',
						'line_height',
						'color',
						'tag_description'         => esc_html__( 'Select element tag.', 'js_composer' ),
						'text_align_description'  => esc_html__( 'Select text alignment.', 'js_composer' ),
						'font_size_description'   => esc_html__( 'Enter font size.', 'js_composer' ),
						'line_height_description' => esc_html__( 'Enter line height.', 'js_composer' ),
						'color_description'       => esc_html__( 'Select color for your element.', 'js_composer' ),
					),
				),
			),

			array(
				'type'             => 'penci_only_number',
				'heading'          => __( 'Borders Width', 'authow' ),
				'param_name'       => 'bgreadmore_borderwidth',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-4',
			),

			array(
				'type'             => 'penci_only_number',
				'heading'          => __( 'Borders Radius', 'authow' ),
				'param_name'       => 'bgreadmore_borderradius',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-4',
			),

			array(
				'type'             => 'penci_only_number',
				'heading'          => __( 'Padding', 'authow' ),
				'param_name'       => 'bgreadmore_padding',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-4',
			),

			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Add Icon to "Read More" Button', 'authow' ),
				'param_name' => 'add_icon_readmore',
				'group'      => $group_color,
			),

			array(
				'type'             => 'iconpicker',
				'heading'          => __( 'Add Icon to "Read More" Button', 'authow' ),
				'param_name'       => 'readmore_icon',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),

			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Icon position', 'authow' ),
				'param_name'       => 'readmore_icon_pos',
				'group'            => $group_color,
				'value'            => array(
					'Right' => 'right',
					'Left'  => 'left',
				),
				'edit_field_class' => 'vc_col-sm-6',
			),

			array(
				'type'             => 'textfield',
				'param_name'       => 'penci_separator_pagenavi',
				'heading'          => __( 'Page Navigation', 'authow' ),
				'group'            => $group_color,
				'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),

			array(
				'type'       => 'penci_only_number',
				'heading'    => __( 'Load More Posts Button Max Width', 'authow' ),
				'param_name' => 'pagi_mwidth',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Text Color', 'authow' ),
				'param_name' => 'pagi_color',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Text Hove & Active Color', 'authow' ),
				'param_name' => 'pagi_hcolor',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Border Color', 'authow' ),
				'param_name' => 'bgpagi_color',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Border Hove & Active Color', 'authow' ),
				'param_name' => 'bgpagi_hcolor',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Background Color', 'authow' ),
				'param_name' => 'bgpagi_bgcolor',
				'group'      => $group_color,
			),

			array(
				'type'       => 'colorpicker',
				'heading'    => __( 'Hove & Active Background Color', 'authow' ),
				'param_name' => 'bgpagi_hbgcolor',
				'group'      => $group_color,
			),

			array(
				'type'       => 'font_container',
				'heading'    => __( 'Typography', 'authow' ),
				'param_name' => 'bgpagi_typo',
				'value'      => '',
				'group'      => $group_color,
				'settings'   => array(
					'fields' => array(
						//'tag'                     => 'h2',
						'text_align',
						'font_size',
						'line_height',
						'color',
						'tag_description'         => esc_html__( 'Select element tag.', 'js_composer' ),
						'text_align_description'  => esc_html__( 'Select text alignment.', 'js_composer' ),
						'font_size_description'   => esc_html__( 'Enter font size.', 'js_composer' ),
						'line_height_description' => esc_html__( 'Enter line height.', 'js_composer' ),
						'color_description'       => esc_html__( 'Select color for your element.', 'js_composer' ),
					),
				),
			),

			array(
				'type'             => 'penci_only_number',
				'heading'          => __( 'Borders Width', 'authow' ),
				'param_name'       => 'bgreadmore_borderwidth',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-4',
			),

			array(
				'type'             => 'penci_only_number',
				'heading'          => __( 'Borders Radius', 'authow' ),
				'param_name'       => 'bgreadmore_borderradius',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-4',
			),

			array(
				'type'             => 'penci_only_number',
				'heading'          => __( 'Padding', 'authow' ),
				'param_name'       => 'bgpagi_padding',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-4',
			),

		),
		Goso_Vc_Params_Helper::extra_params()
	)
) );
