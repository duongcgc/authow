<?php
if ( ! class_exists( 'Goso_Vc_Params_Helper' ) ):
	class Goso_Vc_Params_Helper {
		public static function params_heading() {

			$group_name = 'Heading';

			return array(
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Show / Hide Block Heading', 'authow' ),
					'param_name' => 'is_block_heading',
					'value'      => array(
						__( 'Show', 'authow' ) => 'show',
						__( 'Hide', 'authow' ) => 'hide',
					),
					'std'        => 'show',
					'group'      => $group_name,
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Heading Title Style', 'authow' ),
					'param_name' => 'heading_title_style',
					'std'        => '',
					'value'      => array(
						esc_html__( 'Default ', 'authow' ) => '',
						esc_html__( 'Style 1', 'authow' )  => 'style-1',
						esc_html__( 'Style 2', 'authow' )  => 'style-2',
						esc_html__( 'Style 3', 'authow' )  => 'style-3',
						esc_html__( 'Style 4', 'authow' )  => 'style-4',
						esc_html__( 'Style 5', 'authow' )  => 'style-5',
						esc_html__( 'Style 6', 'authow' )  => 'style-6',
						esc_html__( 'Style 7', 'authow' )  => 'style-7',
						esc_html__( 'Style 8', 'authow' )  => 'style-9',
						esc_html__( 'Style 9', 'authow' )  => 'style-8',
						esc_html__( 'Style 10', 'authow' ) => 'style-10',
						esc_html__( 'Style 11', 'authow' ) => 'style-11',
						esc_html__( 'Style 12', 'authow' ) => 'style-12',
						esc_html__( 'Style 13', 'authow' ) => 'style-13',
						esc_html__( 'Style 14', 'authow' ) => 'style-14',
						esc_html__( 'Style 15', 'authow' ) => 'style-15',
						esc_html__( 'Style 16', 'authow' ) => 'style-16',
						esc_html__( 'Style 17', 'authow' ) => 'style-2 style-17',
						esc_html__( 'Style 18', 'authow' ) => 'style-18',
						esc_html__( 'Style 19', 'authow' ) => 'style-18 style-19',
						esc_html__( 'Style 20', 'authow' ) => 'style-18 style-20',
					),
					'group'      => $group_name,
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Heading Title', 'authow' ),
					'param_name'  => 'heading',
					'value'       => 'Block title',
					'std'         => 'Block title',
					'admin_label' => true,
					'description' => esc_html__( 'A title for this block, if you leave it blank the block will not have a title', 'authow' ),
					'group'       => $group_name,
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Title url', 'authow' ),
					'param_name'  => 'heading_title_link',
					'std'         => '',
					'description' => esc_html__( 'A custom url when the block title is clicked', 'authow' ),
					'group'       => $group_name,
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Add icon for title?', 'authow' ),
					'param_name' => 'add_title_icon',
					'group'      => $group_name,
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'authow' ),
					'param_name' => 'block_title_icon',
					'std'        => 'block_title_icon',
					'settings'   => array(
						'emptyIcon'    => true,
						'type'         => 'fontawesome',
						'iconsPerPage' => 4000,
					),
					'dependency' => array( 'element' => 'add_title_icon', 'value' => 'true', ),
					'group'      => $group_name,
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Icon Alignment', 'authow' ),
					'description' => __( 'Select icon alignment.', 'authow' ),
					'param_name'  => 'block_title_ialign',
					'value'       => array(
						__( 'Left', 'authow' )  => 'left',
						__( 'Right', 'authow' ) => 'right',
					),
					'dependency'  => array( 'element' => 'add_title_icon', 'value' => 'true', ),
					'group'       => $group_name,
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Heading Align', 'authow' ),
					'param_name' => 'block_title_align',
					'std'        => '',
					'value'      => array(
						esc_html__( 'Default ( follow Customize )', 'authow' ) => '',
						esc_html__( 'Left', 'authow' )                         => 'pcalign-left',
						esc_html__( 'Center', 'authow' )                       => 'pcalign-center',
						esc_html__( 'Right', 'authow' )                        => 'pcalign-right',
					),
					'group'      => $group_name,
				),
				array(
					'type'        => 'dropdown',
					'heading'     => 'Align Icon on Style 15',
					'value'       => array(
						'Default( follow Customize )' => '',
						'Right'                       => 'pciconp-right',
						'Left'                        => 'pciconp-left',
					),
					'param_name'  => 'heading_icon_pos',
					'description' => '',
					'dependency'  => array( 'element' => 'heading_title_style', 'value' => array( 'style-15' ) ),
					'group'       => $group_name,
				),
				array(
					'type'        => 'dropdown',
					'heading'     => 'Custom Icon on Style 15',
					'value'       => array(
						'Default( follow Customize )' => '',
						'Arrow Right'                 => 'pcicon-right',
						'Arrow Left'                  => 'pcicon-left',
						'Arrow Down'                  => 'pcicon-down',
						'Arrow Up'                    => 'pcicon-up',
						'Star'                        => 'pcicon-star',
						'Bars'                        => 'pcicon-bars',
						'File'                        => 'pcicon-file',
						'Fire'                        => 'pcicon-fire',
						'Book'                        => 'pcicon-book',
					),
					'param_name'  => 'heading_icon',
					'description' => '',
					'dependency'  => array( 'element' => 'heading_title_style', 'value' => array( 'style-15' ) ),
					'group'       => $group_name,
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__( 'Turn off Uppercase Block Title', 'authow' ),
					'param_name' => 'block_title_offupper',
					'group'      => $group_name,
				),
				array(
					'type'       => 'goso_number',
					'param_name' => 'block_title_marginbt',
					'heading'    => __( 'Margin Bottom', 'authow' ),
					'value'      => '',
					'std'        => '',
					'suffix'     => 'px',
					'min'        => 1,
					'group'      => $group_name,
				),
			);
		}

		public static function params_heading_typo_color( $group_color = '' ) {
			if ( ! $group_color ) {
				$group_color = 'Typo & Color';
			}

			return array(
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_meta_settings',
					'heading'          => esc_html__( 'Block Heading Title', 'authow' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Title Color', 'authow' ),
					'param_name'       => 'block_title_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Title Hover Color', 'authow' ),
					'param_name'       => 'block_title_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Border Color', 'authow' ),
					'param_name'       => 'btitle_bcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Border Outer Color', 'authow' ),
					'param_name'       => 'btitle_outer_bcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Border Bottom for Heading Style 5, 10, 11, 12', 'authow' ),
					'param_name'       => 'btitle_style5_bcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'heading_title_style', 'value' => array( 'style-5', 'style-10', 'style-11', 'style-12' ) ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Small Border Bottom for Heading Style 7 & Style 8', 'authow' ),
					'param_name'       => 'btitle_style78_bcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'heading_title_style', 'value' => array( 'style-7', 'style-9' ) ),
				),

				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Border Top for Heading Style 10', 'authow' ),
					'param_name'       => 'btitle_style10_btopcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'heading_title_style', 'value' => array( 'style-10' ) ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Background Shapes for Heading Styles 11, 12, 13', 'authow' ),
					'param_name'       => 'btitle_shapes_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array(
						'element' => 'heading_title_style',
						'value'   => array( 'style-13', 'style-11', 'style-12' )
					),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Background Color for Icon on Style 15', 'authow' ),
					'param_name'       => 'bgstyle15_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'heading_title_style', 'value' => array( 'style-15' ) ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Icon Color on Style 15', 'authow' ),
					'param_name'       => 'iconstyle15_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'heading_title_style', 'value' => array( 'style-15' ) ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Color for Lines on Styles 18, 19, 20', 'authow' ),
					'param_name'       => 'cl_lines',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array(
						'element' => 'heading_title_style',
						'value'   => array(
							'style-18',
							'style-18 style-19',
							'style-18 style-20'
						)
					),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Background Color', 'authow' ),
					'param_name'       => 'btitle_bgcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6'
				),

				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Background Outer Color', 'authow' ),
					'param_name'       => 'btitle_outer_bgcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'attach_image',
					'heading'    => esc_html__( 'Custom Background Image for Style 9', 'authow' ),
					'param_name' => 'btitle_style9_bgimg',
					'group'      => $group_color,
					'dependency' => array( 'element' => 'heading_title_style', 'value' => array( 'style-8' ) ),
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Custom Font Family for Block Title', 'authow' ),
					'param_name' => 'use_btitle_typo',
					'value'      => array( __( 'Yes', 'authow' ) => 'yes' ),
					'group'      => $group_color,
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'btitle_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_btitle_typo', 'value' => 'yes' ),
				),
				array(
					'type'       => 'goso_number',
					'param_name' => 'btitle_fsize',
					'heading'    => __( 'Font Size for Block Title', 'authow' ),
					'value'      => '',
					'std'        => '',
					'suffix'     => 'px',
					'min'        => 1,
					'group'      => $group_color,
				)
			);
		}

		public static function params_container_width( $default = 3 ) {
			return array(
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Element Columns', 'authow' ),
					'param_name' => 'goso_block_width',
					'std'        => $default,
					'value'      => array(
						__( '1 Column ( Small Container Width)', 'authow' )    => '1',
						__( '2 Columns ( Medium Container Width )', 'authow' ) => '2',
						__( '3 Columns ( Large Container Width )', 'authow' )  => '3',
					),
				)
			);
		}

		public static function extra_params() {
			return array(
				array(
					'type'       => 'css_editor',
					'heading'    => __( 'CSS box', 'authow' ),
					'param_name' => 'css',
					'group'      => __( 'Design Options', 'authow' ),
				)
			);
		}

		public static function heading_block_params( $block_title_df = true ) {
			return array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Heading Title Style', 'authow' ),
					'param_name' => 'heading_title_style',
					'std'        => '',
					'value'      => array(
						esc_html__( 'Default ( follow Customize )', 'authow' ) => '',
						esc_html__( 'Style 1', 'authow' )                      => 'style-1',
						esc_html__( 'Style 2', 'authow' )                      => 'style-2',
						esc_html__( 'Style 3', 'authow' )                      => 'style-3',
						esc_html__( 'Style 4', 'authow' )                      => 'style-4',
						esc_html__( 'Style 5', 'authow' )                      => 'style-5',
						esc_html__( 'Style 6', 'authow' )                      => 'style-6',
						esc_html__( 'Style 7', 'authow' )                      => 'style-7',
						esc_html__( 'Style 8', 'authow' )                      => 'style-9',
						esc_html__( 'Style 9', 'authow' )                      => 'style-8',
						esc_html__( 'Style 10', 'authow' )                     => 'style-10',
						esc_html__( 'Style 11', 'authow' )                     => 'style-11',
						esc_html__( 'Style 12', 'authow' )                     => 'style-12',
						esc_html__( 'Style 13', 'authow' )                     => 'style-13',
						esc_html__( 'Style 14', 'authow' )                     => 'style-14',
						esc_html__( 'Style 15', 'authow' )                     => 'style-15',
						esc_html__( 'Style 16', 'authow' )                     => 'style-16',
						esc_html__( 'Style 17', 'authow' )                     => 'style-2 style-17',
						esc_html__( 'Style 18', 'authow' )                     => 'style-18',
						esc_html__( 'Style 19', 'authow' )                     => 'style-18 style-19',
						esc_html__( 'Style 20', 'authow' )                     => 'style-18 style-20',
					),
					'group'      => 'Heading',
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Heading Title', 'authow' ),
					'param_name'  => 'heading',
					'value'       => $block_title_df ? esc_html__( 'Block Title', 'authow' ) : '',
					'std'         => $block_title_df ? esc_html__( 'Block Title', 'authow' ) : '',
					'admin_label' => true,
					'description' => esc_html__( 'A title for this block, if you leave it blank the block will not have a title', 'authow' ),
					'group'       => 'Heading',
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Title Url', 'authow' ),
					'param_name'  => 'heading_title_link',
					'std'         => '',
					'description' => esc_html__( 'A custom url when the block title is clicked', 'authow' ),
					'group'       => 'Heading',
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Heading Align', 'authow' ),
					'param_name' => 'heading_title_align',
					'std'        => '',
					'value'      => array(
						esc_html__( 'Default ( follow Customize )', 'authow' ) => '',
						esc_html__( 'Left', 'authow' )                         => 'pcalign-left',
						esc_html__( 'Center', 'authow' )                       => 'pcalign-center',
						esc_html__( 'Right', 'authow' )                        => 'pcalign-right',
					),
					'group'      => 'Heading',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => 'Align Icon on Style 15',
					'value'       => array(
						'Default( follow Customize )' => '',
						'Right'                       => 'pciconp-right',
						'Left'                        => 'pciconp-left',
					),
					'param_name'  => 'heading_icon_pos',
					'description' => '',
					'dependency'  => array( 'element' => 'heading_title_style', 'value' => array( 'style-15' ) ),
					'group'       => 'Heading',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => 'Custom Icon on Style 15',
					'value'       => array(
						'Default( follow Customize )' => '',
						'Arrow Right'                 => 'pcicon-right',
						'Arrow Left'                  => 'pcicon-left',
						'Arrow Down'                  => 'pcicon-down',
						'Arrow Up'                    => 'pcicon-up',
						'Star'                        => 'pcicon-star',
						'Bars'                        => 'pcicon-bars',
						'File'                        => 'pcicon-file',
						'Fire'                        => 'pcicon-fire',
						'Book'                        => 'pcicon-book',
					),
					'param_name'  => 'heading_icon',
					'description' => '',
					'dependency'  => array( 'element' => 'heading_title_style', 'value' => array( 'style-15' ) ),
					'group'       => 'Heading',
				),
			);
		}

		public static function params_latest_posts_typo_color() {
			$group_color = 'Typo & Color';

			$style_big_post = array(
				'mixed',
				'mixed-4',
				'mixed-2',
				'standard-grid',
				'standard-grid-2',
				'standard-list',
				'standard-boxed-1',
				'classic-grid',
				'classic-grid-2',
				'classic-list',
				'classic-boxed-1',
				'overlay-grid',
				'overlay-grid-2',
				'overlay-list',
				'overlay-boxed-1'
			);
			$color_big_post = array( 'mixed-2', 'overlay-grid', 'overlay-grid-2', 'overlay-list', 'overlay-boxed-1' );

			return array(
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_ptittle_settings',
					'heading'          => esc_html__( 'General Posts', 'authow' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),

				// Post title
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Border Color', 'authow' ),
					'param_name'       => 'pborder_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'boxed-1', 'boxed-2', 'mixed', 'mixed-2', 'standard-boxed-1' ) ),
				),

				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Color', 'authow' ),
					'param_name'       => 'ptitle_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Hover Color', 'authow' ),
					'param_name'       => 'ptitle_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'ptitle_fsize',
					'heading'          => __( 'Font Size for Post Title', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Title', 'authow' ),
					'param_name'       => 'use_ptitle_typo',
					'value'            => array( __( 'Yes', 'authow' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'ptitle_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_ptitle_typo', 'value' => 'yes' ),
				),
				array(
					'type'       => 'goso_separator',
					'param_name' => 'goso_separator1',
					'group'      => $group_color,
				),
				// Post meta
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Color', 'authow' ),
					'param_name'       => 'pmeta_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Hover Color', 'authow' ),
					'param_name'       => 'pmeta_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Author Color', 'authow' ),
					'param_name'       => 'pauthor_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Border Color', 'authow' ),
					'param_name'       => 'pmeta_border_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'pmeta_fsize',
					'heading'          => __( 'Font Size for Post Meta', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Meta', 'authow' ),
					'param_name'       => 'use_pmeta_typo',
					'value'            => array( __( 'Yes', 'authow' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'pmeta_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_pmeta_typo', 'value' => 'yes' ),
				),

				array(
					'type'       => 'goso_separator',
					'param_name' => 'goso_separator2',
					'group'      => $group_color,
				),

				// Post Excrept
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Excrept Color', 'authow' ),
					'param_name'       => 'pexcrept_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'pexcrept_fsize',
					'heading'          => __( 'Font Size for Post Excrept', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Excrept', 'authow' ),
					'param_name'       => 'use_pexcrept_typo',
					'value'            => array( __( 'Yes', 'authow' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'pexcrept_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_pexcrept_typo', 'value' => 'yes' ),
				),
				array(
					'type'       => 'goso_separator',
					'param_name' => 'goso_separator2',
					'group'      => $group_color,
				),
				// Category
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Categories Color', 'authow' ),
					'param_name'       => 'pcat_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Categories Hover Color', 'authow' ),
					'param_name'       => 'pcat_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'pcat_fsize',
					'heading'          => __( 'Font Size for Post Categories', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Categories', 'authow' ),
					'param_name'       => 'use_pcat_typo',
					'value'            => array( __( 'Yes', 'authow' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'pcat_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_pcat_typo', 'value' => 'yes' ),
				),
				array(
					'type'       => 'goso_separator',
					'param_name' => 'goso_separator2',
					'group'      => $group_color,
				),
				// Continue reading
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Continue reading Color', 'authow' ),
					'param_name'       => 'prmore_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Continue reading Hover Color', 'authow' ),
					'param_name'       => 'prmore_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'prmore_fsize',
					'heading'          => __( 'Font Size for Continue reading', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Continue reading', 'authow' ),
					'param_name'       => 'use_prmore_typo',
					'value'            => array( __( 'Yes', 'authow' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'prmore_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_prmore_typo', 'value' => 'yes' ),
				),
				array(
					'type'       => 'goso_separator',
					'param_name' => 'goso_separator2',
					'group'      => $group_color,
				),

				// Share
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Social Share Color', 'authow' ),
					'param_name'       => 'pshare_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Social Share Hover Color', 'authow' ),
					'param_name'       => 'pshare_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Social Share Border Color', 'authow' ),
					'param_name'       => 'pshare_border_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'pshare_fsize',
					'heading'          => __( 'Font Size for Social Share Icons', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),

				// Big Post
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_bptittle_settings',
					'heading'          => esc_html__( 'Big Posts', 'authow' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
					'dependency'       => array( 'element' => 'style', 'value' => $style_big_post ),
				),

				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Color', 'authow' ),
					'param_name'       => 'bptitle_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => $color_big_post ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Hover Color', 'authow' ),
					'param_name'       => 'bptitle_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => $color_big_post ),
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'bptitle_fsize',
					'heading'          => __( 'Font Size for Post Title', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => $style_big_post ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Author Color', 'authow' ),
					'param_name'       => 'bpauthor_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => $color_big_post ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Border Color', 'authow' ),
					'param_name'       => 'bpmeta_border_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => $color_big_post ),
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'bpmeta_fsize',
					'heading'          => __( 'Font Size for Post Meta', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => $style_big_post ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Categories Color', 'authow' ),
					'param_name'       => 'bpcat_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => $color_big_post ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Categories Hover Color', 'authow' ),
					'param_name'       => 'bpcat_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => $color_big_post ),
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'bpcat_fsize',
					'heading'          => __( 'Font Size for Post Categories', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => $style_big_post ),
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'bpexcerpt_size',
					'heading'          => __( 'Font Size for Post Excerpt', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array(
						'element' => 'style',
						'value'   => array(
							'mixed',
							'mixed-4',
							'standard-grid',
							'standard-grid-2',
							'standard-list',
							'standard-boxed-1',
							'classic-grid',
							'classic-grid-2',
							'classic-list'
						)
					),
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'bsocialshare_size',
					'heading'          => __( 'Font Size for Post Social Share', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => $style_big_post ),
				),

				// Pagination
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_pag_settings',
					'heading'          => esc_html__( 'Pagination', 'authow' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'pagination_icon',
					'heading'          => __( 'Font size for Load More Icon', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'pagination_size',
					'heading'          => __( 'Font Size for Pagination', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Pagination Text Color', 'authow' ),
					'param_name'       => 'pagination_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Pagination Border Color', 'authow' ),
					'param_name'       => 'pagination_bordercolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Pagination Background Color', 'authow' ),
					'param_name'       => 'pagination_bgcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Pagination Hover Text Color', 'authow' ),
					'param_name'       => 'pagination_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Pagination Hover Border Color', 'authow' ),
					'param_name'       => 'pagination_hbordercolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Pagination Hover Background Color', 'authow' ),
					'param_name'       => 'pagination_hbgcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
			);
		}

		public static function params_featured_cat_typo_color() {
			$group_color = 'Typo & Color';

			return array(
				// Post title
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_ptittle_settings',
					'heading'          => esc_html__( 'Posts General Options', 'authow' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Border Color', 'authow' ),
					'param_name'       => 'pborder_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				// Post title
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_ptittle_settings',
					'heading'          => esc_html__( 'Posts Title', 'authow' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Color', 'authow' ),
					'param_name'       => 'ptitle_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Hover Color', 'authow' ),
					'param_name'       => 'ptitle_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Color of Big Post', 'authow' ),
					'param_name'       => 'bptitle_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'style-14', 'style-15' ) ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Hover Color of Big Post', 'authow' ),
					'param_name'       => 'bptitle_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'style-14', 'style-15' ) ),
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'ptitle_fsize',
					'heading'          => __( 'Font Size for Post Title', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'bptitle_fsize',
					'heading'          => __( 'Font Size for Title of Big Post', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array(
						'element' => 'style',
						'value'   => array(
							'style-1',
							'style-2',
							'style-6',
							'style-10',
							'style-14',
							'style-15'
						)
					),
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Title', 'authow' ),
					'param_name'       => 'use_ptitle_typo',
					'value'            => array( __( 'Yes', 'authow' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'ptitle_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_ptitle_typo', 'value' => 'yes' ),
				),

				// Post meta
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_pmeta_settings',
					'heading'          => esc_html__( 'Posts Meta', 'authow' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Color', 'authow' ),
					'param_name'       => 'pmeta_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Hover Color', 'authow' ),
					'param_name'       => 'pmeta_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Color for Big Posts', 'authow' ),
					'param_name'       => 'bpmeta_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'style-14', 'style-15' ) ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Hover Color for Big Posts', 'authow' ),
					'param_name'       => 'bpmeta_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'style-14', 'style-15' ) ),
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'pmeta_fsize',
					'heading'          => __( 'Font Size for Post Meta', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Meta', 'authow' ),
					'param_name'       => 'use_pmeta_typo',
					'value'            => array( __( 'Yes', 'authow' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'pmeta_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_pmeta_typo', 'value' => 'yes' ),
				),
				// Post excrept
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_pexcrept_settings',
					'heading'          => esc_html__( 'Posts Excerpt', 'authow' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Excerpt Color', 'authow' ),
					'param_name'       => 'pexcerpt_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'pexcerpt_fsize',
					'heading'          => __( 'Font Size for Post Excerpt', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Excerpt', 'authow' ),
					'param_name'       => 'use_pexcerpt_typo',
					'value'            => array( __( 'Yes', 'authow' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'pexcerpt_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_pexcerpt_typo', 'value' => 'yes' ),
				),

				// Category
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_pcat_settings',
					'heading'          => esc_html__( 'Categories', 'authow' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
					'dependency'       => array( 'element' => 'style', 'value' => 'style-8' ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Categories Color', 'authow' ),
					'param_name'       => 'pcat_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => 'style-8' ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Categories Hover Color', 'authow' ),
					'param_name'       => 'pcat_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => 'style-8' ),
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'pcat_fsize',
					'heading'          => __( 'Font Size for Post Categories', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => 'style-8' ),
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'pcat_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'style', 'value' => 'style-8' ),
				),
			);
		}

		public static function params_popular_posts_typo_color() {
			$group_color = 'Typo & Color';

			return array(
				// Post title
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_ptittle_settings',
					'heading'          => esc_html__( 'Posts Title', 'authow' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Color', 'authow' ),
					'param_name'       => 'ptitle_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Hover Color', 'authow' ),
					'param_name'       => 'ptitle_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'ptitle_fsize',
					'heading'          => __( 'Font Size for Post Title', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Title', 'authow' ),
					'param_name'       => 'use_ptitle_typo',
					'value'            => array( __( 'Yes', 'authow' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'ptitle_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_ptitle_typo', 'value' => 'yes' ),
				),

				// Post meta
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_pmeta_settings',
					'heading'          => esc_html__( 'Posts Meta', 'authow' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Color', 'authow' ),
					'param_name'       => 'pmeta_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'goso_number',
					'param_name'       => 'pmeta_fsize',
					'heading'          => __( 'Font Size for Post Meta', 'authow' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Meta', 'authow' ),
					'param_name'       => 'use_pmeta_typo',
					'value'            => array( __( 'Yes', 'authow' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'pmeta_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_pmeta_typo', 'value' => 'yes' ),
				),

				// Dot style
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_pmeta_settings',
					'heading'          => esc_html__( 'Dots Slider', 'authow' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Dot background color', 'authow' ),
					'param_name'       => '_dot_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Dot border and background active color', 'authow' ),
					'param_name'       => 'dot_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
			);
		}

		/**
		 * Get image sizes.
		 *
		 * Retrieve available image sizes after filtering `include` and `exclude` arguments.
		 */
		public static function get_list_image_sizes( $default = false ) {
			$wp_image_sizes = self::get_all_image_sizes();

			$image_sizes = array();

			if ( $default ) {
				$image_sizes[ esc_html__( 'Default', 'authow' ) ] = '';
			}

			foreach ( $wp_image_sizes as $size_key => $size_attributes ) {
				$control_title = ucwords( str_replace( '_', ' ', $size_key ) );
				if ( is_array( $size_attributes ) ) {
					$control_title .= sprintf( ' - %d x %d', $size_attributes['width'], $size_attributes['height'] );
				}

				$image_sizes[ $control_title ] = $size_key;
			}

			$image_sizes[ esc_html__( 'Full', 'authow' ) ] = 'full';

			return $image_sizes;
		}

		public static function get_all_image_sizes() {
			global $_wp_additional_image_sizes;

			$default_image_sizes = array( 'thumbnail', 'medium', 'medium_large', 'large' );

			$image_sizes = array();

			foreach ( $default_image_sizes as $size ) {
				$image_sizes[ $size ] = [
					'width'  => (int) get_option( $size . '_size_w' ),
					'height' => (int) get_option( $size . '_size_h' ),
					'crop'   => (bool) get_option( $size . '_crop' ),
				];
			}

			if ( $_wp_additional_image_sizes ) {
				$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
			}

			return $image_sizes;
		}
	}
endif;
