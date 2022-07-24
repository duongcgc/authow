<?php
/**
 * Add on for Visual Composer
 * If VC installed, this file will load
 * This add-on only use for Authow theme
 *
 * @since 2.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Authow_VC_Shortcodes' ) ) {
	class Authow_VC_Shortcodes {
		/**
		 * Add shortcodes
		 */
		public static function init() {
			$shortcodes = array(
				'latest_posts',
				'featured_cat',
				'popular_posts',
				'authow_sidebar',
				'authow_featured_boxes',
				'inline_related_posts'
			);

			foreach ( $shortcodes as $shortcode ) {
				add_shortcode( $shortcode, array( __CLASS__, $shortcode ) );
			}
		}

		/**
		 * Retrieve HTML markup of latest_posts shortcode
		 *
		 * @param array $atts
		 * @param string $content
		 *
		 * @return string
		 */
		public static function latest_posts( $atts, $content = null ) {
			$atts = shortcode_atts( array(
				'style'               => 'standard',
				'heading'             => '',
				'heading_title_style' => '',
				'heading_title_link'  => '',
				'heading_title_align' => '',
				'hide_block_heading'  => '',
				'heading_icon_pos'    => '',
				'heading_icon'        => '',
				'number'              => '10',
				'paging'              => 'numbers',
				'morenum'             => '6',
				'exclude'             => '',
				'build_query'         => '',
				'elementor_query'     => '',
				'wpblock'             => '',
				'goso_mixed_style'   => 's1',
				'post_alignment'      => '',
				'share_alignment'     => '',
				'goso_items_martop'  => '',
				'goso_bitems_martop' => '',
				'goso_sitems_martop' => '',
				'list_imgwidth'       => '',

				'block_title_color'     => '',
				'block_title_hcolor'    => '',
				'btitle_bcolor'         => '',
				'btitle_outer_bcolor'   => '',
				'btitle_style5_bcolor'  => '',
				'btitle_style78_bcolor' => '',
				'btitle_bgcolor'        => '',
				'btitle_outer_bgcolor'  => '',
				'btitle_style9_bgimg'   => '',
				'use_btitle_typo'       => '',
				'btitle_typo'           => '',
				'btitle_fsize'          => '',
				'block_title_offupper'  => '',
				'block_title_marginbt'  => '',
				'btitle_shapes_color'   => '',
				'bgstyle15_color'       => '',
				'iconstyle15_color'     => '',
				'cl_lines'              => '',

				'pborder_color'   => '',
				'ptitle_color'    => '',
				'ptitle_hcolor'   => '',
				'use_ptitle_typo' => '',
				'ptitle_typo'     => '',
				'ptitle_fsize'    => '',

				'pmeta_color'        => '',
				'pmeta_hcolor'       => '',
				'pauthor_color'      => '',
				'pmeta_border_color' => '',
				'use_pmeta_typo'     => '',
				'pmeta_fsize'        => '',
				'pmeta_typo'         => '',

				'pexcrept_color'    => '',
				'use_pexcrept_typo' => '',
				'pexcrept_fsize'    => '',
				'pexcrept_typo'     => '',

				'pcat_color'    => '',
				'pcat_hcolor'   => '',
				'use_pcat_typo' => '',
				'pcat_fsize'    => '',
				'pcat_typo'     => '',

				'prmore_color'    => '',
				'prmore_hcolor'   => '',
				'use_prmore_typo' => '',
				'prmore_fsize'    => '',
				'prmore_typo'     => '',
				'pag_icon_fsize'  => '',

				'pshare_color'        => '',
				'pshare_hcolor'       => '',
				'pshare_border_color' => '',
				'pshare_fsize'        => '',

				'pagination_icon'         => '',
				'pagination_size'         => '',
				'pagination_color'        => '',
				'pagination_bordercolor'  => '',
				'pagination_bgcolor'      => '',
				'pagination_hcolor'       => '',
				'pagination_hbordercolor' => '',
				'pagination_hbgcolor'     => '',

				'standard_meta_overlay'   => '',
				'standard_thumbnail'      => '',
				'std_dis_at_gallery'      => '',
				'standard_thumb_crop'     => '',
				'standard_share_box'      => '',
				'standard_cat'            => '',
				'standard_author'         => '',
				'standard_date'           => '',
				'standard_comment'        => '',
				'standard_viewscount'     => '',
				'standard_readtime'       => '',
				'standard_remove_line'    => '',
				'standard_auto_excerpt'   => '',
				'standard_remove_excerpt' => '',
				'standard_effect_button'  => '',
				'std_continue_btn'        => '',
				'grid_icon_format'        => '',
				'grid_meta_overlay'       => '',
				'grid_uppercase_cat'      => '',
				'grid_lightbox_video'     => '',
				'grid_nocrop_list'        => '',
				'grid_share_box'          => '',
				'grid_cat'                => '',
				'grid_author'             => '',
				'grid_date'               => '',
				'grid_comment'            => '',
				'grid_comment_other'      => '',
				'grid_viewscount'         => '',
				'grid_readtime'           => '',
				'grid_remove_line'        => '',
				'grid_remove_excerpt'     => '',
				'grid_add_readmore'       => '',
				'grid_remove_arrow'       => '',
				'grid_readmore_button'    => '',
				'grid_readmore_align'     => '',
				'grid_excerpt_length'     => '',
				'standard_excerpt_length' => '',
				'std_continue_align'      => '',
				'std_excerpt_align'       => '',
				'grid_excerpt_align'      => '',

				'order_columns'              => '',
				'order_columns_tablet'       => '',
				'order_columns_mobile'       => '',
				'order_column_gap'           => '',
				'order_row_gap'              => '',
				'infeed_num'                 => '',
				'infeed_code'                => '',
				'infeed_layout'              => '',

				// Big Post
				'bptitle_color'              => '',
				'bptitle_hcolor'             => '',
				'bptitle_fsize'              => '',
				'bpmeta_color'               => '',
				'bpmeta_hcolor'              => '',
				'bpauthor_color'             => '',
				'bpmeta_border_color'        => '',
				'bpmeta_fsize'               => '',
				'bpcat_color'                => '',
				'bpcat_hcolor'               => '',
				'bpcat_fsize'                => '',
				'bpexcerpt_size'             => '',
				'bsocialshare_size'          => '',
				'standard_title_length'      => '',
				'grid_title_length'          => '',
				'goso_featimg_size'         => '',
				'goso_featimg_ratio'        => '',
				'thumb_size'                 => '',
				'thumb_bigsize'              => '',
				'archive_buider_check'       => '',
				'biggrid_ajaxfilter_cat'     => '',
				'biggrid_ajaxfilter_tag'     => '',
				'biggrid_ajaxfilter_author'  => '',
				'group_more_link_text'       => '',
				'group_more_defaultab_text'  => '',
				'biggrid_ajax_loading_style' => '',

			), $atts, 'latest_posts' );

			$goso_mixed_style = 's1';

			extract( $atts );

			$standard_title_length = $standard_title_length ? $standard_title_length : '';
			$grid_title_length     = $grid_title_length ? $grid_title_length : '';

			$return = '';

			$is_el_builder = false;

			if ( $atts['elementor_query'] ) {
				$args          = $atts['elementor_query'];
				$number        = isset( $args['posts_per_page'] ) ? $args['posts_per_page'] : 10;
				$args['paged'] = max( get_query_var( 'paged' ), get_query_var( 'page' ), 1 );
				$is_el_builder = true;

			} elseif ( $atts['build_query'] ) {
				$args          = goso_build_args_query( $atts['build_query'] );
				$args['paged'] = max( get_query_var( 'paged' ), get_query_var( 'page' ), 1 );
				$number        = isset( $args['posts_per_page'] ) ? $args['posts_per_page'] : 10;
			} else {
				if ( ! isset( $number ) || ! is_numeric( $number ) ): $number = '10'; endif;
				if ( ! isset( $morenum ) || ! is_numeric( $morenum ) ): $morenum = '6'; endif;
				$paged = max( get_query_var( 'paged' ), get_query_var( 'page' ), 1 );
				$args  = array( 'post_type' => 'post', 'paged' => $paged, 'posts_per_page' => $number );
				if ( ! empty( $exclude ) ) {
					$exclude_cats      = str_replace( ' ', '', $exclude );
					$exclude_array     = explode( ',', $exclude_cats );
					$args['tax_query'] = array(
						array(
							'taxonomy' => 'category',
							'field'    => 'slug',
							'terms'    => $exclude_array,
							'operator' => 'NOT IN'
						)
					);
				}
			}

			$block_id = '';
			if ( class_exists( 'Goso_Vc_Helper' ) ) {
				$block_id = Goso_Vc_Helper::get_unique_id_block( 'latest_posts' );
			}

			$data_pag_arg = htmlentities( json_encode( $args ), ENT_QUOTES, "UTF-8" );
			$query_custom = new WP_Query( $args );


			if ( ! $query_custom->have_posts() ) {
				return self::show_missing_settings( 'Latest Posts', goso_get_setting( 'goso_ajaxsearch_no_post' ) );
			}

			if ( $query_custom->have_posts() ) :
				ob_start();

				$class_wrap = 'goso-latest-posts-sc';
				$class_wrap .= ' goso-latest-posts-' . $style;
				$class_wrap .= $is_el_builder ? ' goso-latest-posts-el' : '';

				if ( 'mixed-larger' == $style ) {
					$class_wrap        .= ' goso-latest-posts-mixed';
					$goso_mixed_style = 's1';
				}

				$class_wrap .= ' goso-el-mixed-' . $goso_mixed_style;

				if ( ! in_array( $style, array( 'overlay', 'boxed-2', 'photography' ) ) ) {
					if ( $atts['post_alignment'] ) {
						$class_wrap .= ' goso-latest-posts-' . esc_attr( $atts['post_alignment'] );
					}

					if ( $atts['std_continue_align'] ) {
						$class_wrap .= ' goso-std-continue-' . esc_attr( $atts['std_continue_align'] );
					}
					if ( $atts['std_excerpt_align'] ) {
						$class_wrap .= ' goso-std-excerpt-' . esc_attr( $atts['std_excerpt_align'] );
					}
					if ( $atts['grid_excerpt_align'] ) {
						$class_wrap .= ' goso-grid-excerpt-' . esc_attr( $atts['grid_excerpt_align'] );
					}
				}
				if ( in_array( $style, array( 'grid', 'masonry' ) ) ) {
					if ( $atts['order_columns'] ) {

						$class_wrap .= ' goso-lposts-ctcol';
						$class_wrap .= ' gososc-grid-' . esc_attr( $atts['order_columns'] );

						if ( $atts['order_columns_tablet'] ) {
							$class_wrap .= ' gososc-grid-tablet-' . esc_attr( $atts['order_columns_tablet'] );
						}
						if ( $atts['order_columns_mobile'] ) {
							$class_wrap .= ' gososc-grid-mobile-' . esc_attr( $atts['order_columns_mobile'] );
						}
					}

				}

				$data_infeed_ads       = '';
				$data_infeed_ads_array = array();
				if ( isset( $infeed_code ) && $infeed_code ) {
					$data_infeed_ads_array['ads_code'] = $infeed_code;
					$infeed_num_data                   = ( isset( $infeed_num ) && $infeed_num ) ? $infeed_num : 3;
					$infeed_full_data                  = ( isset( $infeed_layout ) && $infeed_layout ) ? $infeed_layout : '';
					$data_infeed_ads_array['ads_num']  = $infeed_num_data;
					$data_infeed_ads_array['ads_full'] = $infeed_full_data;
				}
				/* Get data template */
				$data_layout   = $style;
				$data_template = 'sidebar';
				if ( in_array( $style, array( 'standard-grid', 'classic-grid', 'overlay-grid' ) ) ) {
					$data_layout = 'grid';
				} elseif ( in_array( $style, array(
					'standard-grid-2',
					'classic-grid-2',
					'overlay-grid-2',
				) ) ) {
					$data_layout = 'grid-2';
				} elseif ( in_array( $style, array( 'standard-list', 'classic-list', 'overlay-list' ) ) ) {
					$data_layout = 'list';
				} elseif ( in_array( $style, array(
					'standard-boxed-1',
					'classic-boxed-1',
					'overlay-boxed-1'
				) ) ) {
					$data_layout = 'boxed-1';
				} elseif ( in_array( $style, array( 'mixed-3', 'mixed-4' ) ) ) {
					$data_layout = 'small-list';
				}

				if ( is_page_template( 'page-vc.php' ) ) {
					$data_template = 'no-sidebar';
				}
				if ( ! empty( $data_infeed_ads_array ) ) {
					$data_infeed_array = htmlentities( json_encode( $data_infeed_ads_array ), ENT_QUOTES, "UTF-8" );
					$data_infeed_ads   = ' data-infeedads="' . $data_infeed_array . '"';
				}
				$data_archive_type  = '';
				$data_archive_value = '';
				if ( is_category() ) :
					$category           = get_category( get_query_var( 'cat' ) );
					$cat_id             = isset( $category->cat_ID ) ? $category->cat_ID : '';
					$data_archive_type  = 'cat';
					$data_archive_value = $cat_id;
					$opt_cat            = 'category_' . $cat_id;
					$cat_meta           = get_option( $opt_cat );
					$sidebar_opts       = isset( $cat_meta['cat_sidebar_display'] ) ? $cat_meta['cat_sidebar_display'] : '';
					if ( $sidebar_opts == 'no' ):
						$data_template = 'no-sidebar';
                    elseif ( $sidebar_opts == 'left' || $sidebar_opts == 'right' ):
						$data_template = 'sidebar';
					endif;

                elseif ( is_tag() ) :
					$tag                = get_queried_object();
					$tag_id             = isset( $tag->term_id ) ? $tag->term_id : '';
					$data_archive_type  = 'tag';
					$data_archive_value = $tag_id;
                elseif ( is_day() ) :
					$data_archive_type  = 'day';
					$data_archive_value = get_the_date( 'm|d|Y' );
                elseif ( is_month() ) :
					$data_archive_type  = 'month';
					$data_archive_value = get_the_date( 'm|d|Y' );
                elseif ( is_year() ) :
					$data_archive_type  = 'year';
					$data_archive_value = get_the_date( 'm|d|Y' );
                elseif ( is_search() ) :
					$data_archive_type  = 'search';
					$data_archive_value = get_search_query();
                elseif ( is_author() ) :

					global $authordata;
					$user_id = isset( $authordata->ID ) ? $authordata->ID : 0;

					$data_archive_type  = 'author';
					$data_archive_value = $user_id;
                elseif ( is_archive() ) :
					$queried_object = get_queried_object();
					$term_id        = isset( $queried_object->term_id ) ? $queried_object->term_id : '';
					$tax            = get_taxonomy( get_queried_object()->taxonomy );
					$tax_name       = isset( $tax->name ) ? $tax->name : '';

					if ( $term_id && $tax_name ) {
						$data_archive_type  = $tax_name;
						$data_archive_value = $term_id;
					}
				endif;


				$link_group_cats   = isset( $atts['biggrid_ajaxfilter_cat'] ) ? $atts['biggrid_ajaxfilter_cat'] : '';
				$link_group_tags   = isset( $atts['biggrid_ajaxfilter_tag'] ) ? $atts['biggrid_ajaxfilter_tag'] : '';
				$link_group_author = isset( $atts['biggrid_ajaxfilter_author'] ) ? $atts['biggrid_ajaxfilter_author'] : '';
				$more_link_text    = isset( $atts['group_more_link_text'] ) ? $atts['group_more_link_text'] : 'More';
				$link_group_out    = $link_group_out_before = $link_group_out_after = '';

				$morenum = 'nextprev' == $atts['paging'] ? $number : $morenum;

				$link_group_out_before .= '<nav data-query="' . $data_pag_arg . '"
				               data-blockid="' . $block_id . '"
                               data-layout="' . $data_layout . '"
                               data-number="' . absint( $number ) . '"
                               data-numbermore="' . absint( $morenum ) . '"
                               data-offset="0" data-exclude="' . $exclude . '" data-from="vc" data-come_from="vc-elementor"
                               data-template="' . $data_template . '"
                               data-mixed="' . esc_attr( $goso_mixed_style ) . '" ' . $data_infeed_ads . ' data-query_type="ajaxtab" data-more="' . esc_attr( $more_link_text ) . '" class="pcnav-lgroup"><ul class="pcflx">';
				$link_group_out_after  = '</ul></nav>';
				$has_link              = false;
				if ( ! empty( $link_group_cats ) ) {
					$has_link = true;
					foreach ( $link_group_cats as $link_cat ) {
						$link_group_out .= '<li><a href="#" data-id="' . md5( 'cat-link-' . $link_cat ) . '" class="pc-ajaxfil-link" data-paged="1" data-cat="' . esc_attr( $link_cat ) . '">' . get_term_field( 'name', $link_cat ) . '</a></li>';
					}
				}

				if ( ! empty( $link_group_tags ) ) {
					$has_link = true;
					foreach ( $link_group_tags as $link_tag ) {
						$link_group_out .= '<li><a href="#" data-id="' . md5( 'tag-link-' . $link_tag ) . '" class="pc-ajaxfil-link" data-paged="1" data-tag="' . esc_attr( $link_tag ) . '">' . get_term_field( 'name', $link_tag ) . '</a></li>';
					}
				}

				if ( ! empty( $link_group_author ) ) {
					$has_link = true;
					foreach ( $link_group_author as $author ) {
						$link_group_out .= '<li><a data-id="' . md5( 'author-link-' . $author ) . '" href="#" class="pc-ajaxfil-link" data-paged="1" data-author="' . esc_attr( $author ) . '">' . get_the_author_meta( 'nicename', $author ) . '</a></li>';
					}
				}

				if ( 'nextprev' == $atts['paging'] ) {
					$link_group_out .= '</ul><ul class="pcflx-nav">';
					$link_group_out .= '<li class="pcaj-nav-item pcaj-prev"><a class="disable pc-ajaxfil-link pcaj-nav-link prev" data-id="" href="#"><i class="gosoicon-left-chevron"></i></a></li>';
					$link_group_out .= '<li class="pcaj-nav-item pcaj-next"><a class="pc-ajaxfil-link pcaj-nav-link next" data-id="" href="#"><i class="gosoicon-right-chevron"></i></a></li>';
				}

				if ( 'nextprev' == $atts['paging'] || 'numbers' == $atts['paging'] ) {
					$link_group_out_after .= self::get_block_script( $block_id, $atts, false );
				}

				?>
                <div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_wrap ); ?>">
					<?php if ( $heading && ! $atts['hide_block_heading'] ) : ?>
						<?php
						$sb_heading_title    = get_theme_mod( 'goso_sidebar_heading_style' ) ? get_theme_mod( 'goso_sidebar_heading_style' ) : 'style-1';
						$sb_heading_align    = get_theme_mod( 'goso_sidebar_heading_align' ) ? get_theme_mod( 'goso_sidebar_heading_align' ) : 'pcalign-center';
						$heading_title_style = get_theme_mod( 'goso_featured_cat_style' ) ? get_theme_mod( 'goso_featured_cat_style' ) : $sb_heading_title;
						$heading_align       = get_theme_mod( 'goso_heading_latest_align' ) ? get_theme_mod( 'goso_heading_latest_align' ) : $sb_heading_align;

						if ( $atts['heading_title_style'] ) {
							$heading_title_style = $atts['heading_title_style'];
						}

						if ( $atts['heading_title_align'] ) {
							$heading_align = $atts['heading_title_align'];
						}

						$sb_icon_pos         = get_theme_mod( 'goso_sidebar_icon_align' ) ? get_theme_mod( 'goso_sidebar_icon_align' ) : 'pciconp-right';
						$heading_icon_pos    = get_theme_mod( 'goso_homep_icon_align' ) ? get_theme_mod( 'goso_homep_icon_align' ) : $sb_icon_pos;
						$sb_icon_design      = get_theme_mod( 'goso_sidebar_icon_design' ) ? get_theme_mod( 'goso_sidebar_icon_design' ) : 'pcicon-right';
						$heading_icon_design = get_theme_mod( 'goso_homep_icon_design' ) ? get_theme_mod( 'goso_homep_icon_design' ) : $sb_icon_design;

						if ( $atts['heading_icon_pos'] ) {
							$heading_icon_pos = $atts['heading_icon_pos'];
						}

						if ( $atts['heading_icon'] ) {
							$heading_icon_design = $atts['heading_icon'];
						}
						?>
                        <div class="goso-border-arrow goso-homepage-title goso-home-latest-posts <?php echo esc_attr( $heading_title_style . ' ' . $heading_align . ' ' . $heading_icon_pos . ' ' . $heading_icon_design ); ?>">
                            <h3 class="inner-arrow">
                                <span>
								<?php
								if ( $atts['heading_title_link'] ) {
									echo '<a href="' . esc_url( $atts['heading_title_link'] ) . '" title="' . esc_attr( $heading ) . '">';
								}
								echo do_shortcode( $heading );
								if ( $atts['heading_title_link'] ) {
									echo '</a>';
								}
								?>
                                </span>
                            </h3>
							<?php
							if ( $link_group_out ) {
								/*$args_count                   = $args;
								$args_count['posts_per_page'] = - 1;
								$query_custom_count           = new WP_Query( $args_count );*/
								$first_class = $has_link ? 'visible' : 'hidden-item';
								//$total_posts = isset($args_count['offset']) && $args_count['offset'] ? $query_custom_count->post_count - $args_count['offset'] : $query_custom_count->post_count;
								$maxp_out = '';
								if ( 'nextprev' == $atts['paging'] ) {
									$maxp_out = 'data-maxp="' . $query_custom->max_num_pages . '" ';
								}
								$link_group_out_before .= '<li class="all ' . $first_class . '"><a data-paged="1" ' . $maxp_out . 'class="pc-ajaxfil-link current-item" data-id="default" href="#">' . $atts['group_more_defaultab_text'] . '</a></li>';
								wp_enqueue_script( 'goso_ajax_filter_latest' );
								echo $link_group_out_before . $link_group_out . $link_group_out_after;
							}
							?>
                        </div>
					<?php endif; ?>
                    <div class="goso-wrapper-posts-ajax">

                        <div class="goso-wrapper-posts-content pwid-default">

							<?php if ( in_array( $style, array( 'standard', 'classic', 'overlay', 'featured' ) ) ): ?>
                            <div class="goso-wrapper-data"><?php endif; ?>
								<?php if ( in_array( $style, array(
									'mixed',
									'mixed-3',
									'mixed-4',
									'small-list',
									'mixed-larger',
									'mixed-2',
									'overlay-grid',
									'overlay-grid-2',
									'overlay-boxed-1',
									'overlay-list',
									'photography',
									'grid',
									'grid-2',
									'list',
									'boxed-1',
									'boxed-2',
									'boxed-3',
									'standard-grid',
									'standard-grid-2',
									'standard-list',
									'standard-boxed-1',
									'classic-grid',
									'classic-grid-2',
									'classic-list',
									'classic-boxed-1',
									'magazine-1',
									'magazine-2'
								) ) ) : ?>
                                <ul class="goso-wrapper-data goso-grid goso-shortcode-render"><?php endif; ?>
									<?php if ( in_array( $style, array( 'masonry', 'masonry-2' ) ) ) : ?>
                                    <div class="goso-wrap-masonry">
                                        <div class="goso-wrapper-data masonry goso-masonry"><?php endif; ?>
											<?php /* The loop */
											$infeed_ads  = ( isset( $infeed_code ) && $infeed_code ) ? rawurldecode( base64_decode( $infeed_code ) ) : '';
											$infeed_num  = ( isset( $infeed_num ) && $infeed_num ) ? $infeed_num : 3;
											$infeed_full = ( isset( $infeed_layout ) && $infeed_layout ) ? $infeed_layout : '';
											while ( $query_custom->have_posts() ) : $query_custom->the_post();
												include( locate_template( 'template-parts/latest-posts-sc/content-' . $style . '.php' ) );
											endwhile;
											?>

											<?php if ( in_array( $style, array(
												'standard',
												'classic',
												'overlay',
												'featured'
											) ) ): ?></div><?php endif; ?>
										<?php if ( in_array( $style, array( 'masonry', 'masonry-2' ) ) ) : ?></div>
                            </div><?php endif; ?>
							<?php if ( in_array( $style, array(
								'mixed',
								'mixed-3',
								'mixed-4',
								'small-list',
								'mixed-larger',
								'mixed-2',
								'overlay-grid',
								'overlay-grid-2',
								'overlay-boxed-1',
								'overlay-list',
								'photography',
								'grid',
								'grid-2',
								'list',
								'boxed-1',
								'boxed-2',
								'boxed-3',
								'standard-grid',
								'standard-grid-2',
								'standard-list',
								'standard-boxed-1',
								'classic-grid',
								'classic-grid-2',
								'classic-list',
								'classic-boxed-1',
								'magazine-1',
								'magazine-2'
							) ) ) : ?></ul><?php endif; ?>

							<?php

							if ( $paging == 'loadmore' || $paging == 'scroll'  ) {
							$button_class = 'goso-ajax-more goso-ajax-home goso-ajax-more-click';
							if ( $paging == 'loadmore' ):
								wp_enqueue_script( 'goso_ajax_more_posts' );
								wp_localize_script( 'goso_ajax_more_posts', 'ajax_var_more', array(
									'url'   => admin_url( 'admin-ajax.php' ),
									'nonce' => wp_create_nonce( 'ajax-nonce' )
								) );
							endif;
							if ( $paging == 'scroll' ):
								$button_class = 'goso-ajax-more goso-ajax-home goso-ajax-more-scroll';
								wp_enqueue_script( 'goso_ajax_more_scroll' );
								wp_localize_script( 'goso_ajax_more_scroll', 'ajax_var_more', array(
									'url'   => admin_url( 'admin-ajax.php' ),
									'nonce' => wp_create_nonce( 'ajax-nonce' )
								) );
							endif;
							?>
                            <div class="goso-pagination <?php echo $button_class; ?>">
                                <a class="goso-ajax-more-button" href="#" data-blockuid="<?php echo $block_id; ?>"
									<?php if ( $data_archive_type && $data_archive_value ): ?>
                                        data-archivetype="<?php echo $data_archive_type; ?>"
                                        data-archivevalue="<?php echo $data_archive_value; ?>"
									<?php endif; ?>
                                   data-query="<?php echo $data_pag_arg; ?>"
                                   data-query_type="<?php echo $archive_buider_check; ?>"
                                   data-mes="<?php echo goso_get_setting( 'goso_trans_no_more_posts' ); ?>"
                                   data-layout="<?php echo esc_attr( $data_layout ); ?>"
                                   data-number="<?php echo absint( $morenum ); ?>"
                                   data-offset="<?php echo absint( $number ); ?>" data-exclude="<?php
								echo $exclude; ?>" data-from="vc" data-come_from="vc-elementor"
                                   data-template="<?php echo $data_template; ?>"
                                   data-mixed="<?php echo esc_attr( $goso_mixed_style ); ?>"<?php echo $data_infeed_ads; ?>>
                                    <span class="ajax-more-text"><?php echo goso_get_setting( 'goso_trans_load_more_posts' ); ?></span><span
                                            class="ajaxdot"></span><?php goso_fawesome_icon( 'fas fa-sync' ); ?>
                                </a>
                            </div>
							<?php echo self::get_block_script( $block_id, $atts ); ?>
							<?php } elseif ( 'numbers' == $paging) { ?>
							<?php echo goso_pagination_numbers( $query_custom ); ?>
							<?php }?>
                        </div>

						<?php
						if ( $link_group_out ) {
							echo goso_get_html_animation_loading( $atts['biggrid_ajax_loading_style'] );
						} ?>
                    </div>
                </div>
			<?php
			endif;
			wp_reset_postdata();

			$block_id_css = '#' . $block_id;
			?>
            <style>
                <?php if( $share_alignment ): ?>
                <?php echo $block_id_css; ?>
				.goso-post-box-meta.goso-post-box-grid {
					text-align: <?php echo $share_alignment; ?>;
				}
                <?php if( 'left' == $share_alignment ) { ?>
                <?php echo $block_id_css; ?>
				.goso-post-box-meta.goso-post-box-grid .goso-post-share-box {
					padding-left: 0;
					padding-right: 10px;
				}
                <?php } else if( 'right' == $share_alignment ) { ?>
                <?php echo $block_id_css; ?>
				.goso-post-box-meta.goso-post-box-grid .goso-post-share-box {
					padding-right: 0;
					padding-left: 10px;
				}
                <?php } else if( 'center' == $share_alignment ) { ?>
                <?php echo $block_id_css; ?>
				.goso-post-box-meta.goso-post-box-grid .goso-post-share-box {
					padding-right: 10px;
					padding-left: 10px;
				}
                <?php } ?>
                <?php endif ?>
                <?php if( $goso_items_martop ): ?>
                <?php echo $block_id_css; ?>
				.goso-grid > li, <?php echo $block_id_css; ?> .grid-featured, <?php echo $block_id_css; ?> .goso-grid li.typography-style, <?php echo $block_id_css; ?> .grid-mixed, <?php echo $block_id_css; ?> .goso-grid .list-post.list-boxed-post, <?php echo $block_id_css; ?> .goso-masonry .item-masonry, <?php echo $block_id_css; ?> article.standard-article, <?php echo $block_id_css; ?> .goso-grid li.list-post, <?php echo $block_id_css; ?> .grid-overlay {
					margin-bottom: <?php echo $goso_items_martop; ?>;
				}
                <?php echo $block_id_css; ?>
				.goso-grid li.list-post {
					padding-bottom: <?php echo $goso_items_martop; ?>;
				}
				<?php echo $block_id_css; ?>.goso-latest-posts-mixed-3 .goso-grid li.goso-slistp, <?php echo $block_id_css; ?>.goso-latest-posts-mixed-4 .goso-grid li.goso-slistp {
					padding-bottom: 0px;
					margin-bottom: 0px;
					padding-top: <?php echo $goso_items_martop; ?>;
				}
				<?php echo $block_id_css; ?>.goso-latest-posts-mixed-3 .goso-grid li.goso-slistp ~ .goso-slistp, <?php echo $block_id_css; ?>.goso-latest-posts-mixed-4 .goso-grid li.goso-slistp ~ .goso-slistp {
					margin-top: <?php echo $goso_items_martop; ?>;
				}
				<?php echo $block_id_css; ?>.goso-latest-posts-mixed-3 .goso-grid li.list-post.goso-slistp:last-child, <?php echo $block_id_css; ?>.goso-latest-posts-mixed-4 .goso-grid li.list-post.goso-slistp:last-child {
					margin-bottom: <?php echo $goso_items_martop; ?>;
				}
                <?php endif; ?>
                <?php if( $goso_bitems_martop ): ?>
                <?php echo $block_id_css; ?>
				.grid-featured, <?php echo $block_id_css; ?> .grid-mixed, <?php echo $block_id_css; ?> article.standard-article, <?php echo $block_id_css; ?> .grid-overlay {
					margin-bottom: <?php echo $goso_bitems_martop; ?>;
				}
                <?php endif; ?>
                <?php if( $goso_sitems_martop ): ?>
                <?php echo $block_id_css; ?>
				.goso-grid li.goso-slistp {
					margin-bottom: <?php echo $goso_sitems_martop; ?>;
					padding-bottom: <?php echo $goso_sitems_martop; ?>;
				}
				<?php echo $block_id_css; ?>.goso-latest-posts-mixed-3 .goso-grid li.goso-slistp, <?php echo $block_id_css; ?>.goso-latest-posts-mixed-4 .goso-grid li.goso-slistp {
					padding-bottom: 0px;
					margin-bottom: 0px;
					padding-top: <?php echo $goso_sitems_martop; ?>;
				}
				<?php echo $block_id_css; ?>.goso-latest-posts-mixed-3 .goso-grid li.goso-slistp ~ .goso-slistp, <?php echo $block_id_css; ?>.goso-latest-posts-mixed-4 .goso-grid li.goso-slistp ~ .goso-slistp {
					margin-top: <?php echo $goso_sitems_martop; ?>;
				}
                <?php endif; ?>
                <?php if( $list_imgwidth ): ?>
				@media only screen and (min-width: 768px) {
                <?php echo $block_id_css; ?> .goso-grid li.list-post.goso-slistp .item > .thumbnail, <?php echo $block_id_css; ?>.goso-latest-posts-sc .goso-grid li.list-post .item > .thumbnail {
					width: <?php echo $list_imgwidth; ?>;
				}
					<?php echo $block_id_css; ?>.goso-latest-posts-sc .goso-grid li.goso-item-listp .item .content-list-right {
						width: calc(100% - <?php echo $list_imgwidth; ?> );
					}
				}
                <?php endif; ?>
                <?php if( 'yes' == $standard_meta_overlay ): ?>
                <?php echo $block_id_css; ?>
				.goso-wrapper-data .standard-post-image:not(.classic-post-image) {
					margin-bottom: 0;
				}
                <?php echo $block_id_css; ?>
				.header-standard.standard-overlay-meta {
					margin: -30px 30px 19px;
					background: #fff;
					padding-top: 25px;
					padding-left: 5px;
					padding-right: 5px;
					z-index: 10;
					position: relative;
				}
                <?php echo $block_id_css; ?>
				.goso-wrapper-data .standard-post-image:not(.classic-post-image) .audio-iframe, .goso-wrapper-data .standard-post-image:not(.classic-post-image) .standard-content-special {
					bottom: 50px;
				}
				@media only screen and (max-width: 479px) {
                <?php echo $block_id_css; ?> .header-standard.standard-overlay-meta {
					margin-left: 10px;
					margin-right: 10px;
				}
				}
                <?php if( get_theme_mod( 'goso_bg_color_dark' ) ): ?>
                <?php echo $block_id_css; ?>
				.header-standard.standard-overlay-meta {
					background-color: <?php echo goso_get_setting( 'goso_bg_color_dark' ); ?>;
				}
                <?php endif; ?>
                <?php endif ?>
                <?php if( 'yes' == $grid_remove_line ): ?>
                <?php echo $block_id_css; ?>
				.list-post .header-list-style:after,
                <?php echo $block_id_css; ?> .grid-header-box:after,
                <?php echo $block_id_css; ?> .goso-overlay-over .overlay-header-box:after,
                <?php echo $block_id_css; ?> .home-featured-cat-content .first-post .magcat-detail .mag-header:after {
					content: none;
				}
                <?php echo $block_id_css; ?>
				.list-post .header-list-style, <?php echo $block_id_css; ?> .grid-header-box,
                <?php echo $block_id_css; ?> .goso-overlay-over .overlay-header-box,
                <?php echo $block_id_css; ?> .home-featured-cat-content .first-post .magcat-detail .mag-header {
					padding-bottom: 0;
				}
                <?php endif; ?>
                <?php if( 'yes' == $standard_remove_line ): ?>
                <?php echo $block_id_css; ?>
				.header-standard:after {
					content: none;
				}
                <?php echo $block_id_css; ?>
				.header-standard {
					padding-bottom: 0;
				}
                <?php endif; ?>
                <?php if( 'yes' == $standard_effect_button ): ?>
                <?php echo $block_id_css; ?>
				.goso-more-link a.more-link:hover:before {
					right: 100%;
					margin-right: 10px;
					width: 60px;
				}
                <?php echo $block_id_css; ?>
				.goso-more-link a.more-link:hover:after {
					left: 100%;
					margin-left: 10px;
					width: 60px;
				}
                <?php echo $block_id_css; ?>
				.standard-post-entry a.more-link:hover,
                <?php echo $block_id_css; ?> .standard-post-entry a.more-link:hover:before,
                <?php echo $block_id_css; ?> .standard-post-entry a.more-link:hover:after {
					opacity: 0.8;
				}
                <?php endif; ?>
                <?php if( $pshare_fsize ): ?>
                <?php echo $block_id_css; ?>
				.goso-post-box-meta .goso-post-share-box a {
					font-size: <?php echo $pshare_fsize; ?>;
				}
                <?php echo $block_id_css; ?>
				.goso-post-box-meta .goso-post-share-box .goso-svg-messenger {
					width: <?php echo $pshare_fsize; ?>;
				}
                <?php endif; ?>
            </style>
			<?php
			$return = ob_get_clean();

			if ( $block_id && class_exists( 'Goso_Custom_CSS_Shortcode_Old' ) ) {
				$return .= Goso_Custom_CSS_Shortcode_Old::latest_posts( $block_id, $atts );
			}

			return $return;
		}

		/**
		 * Retrieve HTML markup of featured_cat shortcode
		 *
		 * @param array $atts
		 * @param string $content
		 *
		 * @return string
		 */
		public static function featured_cat( $atts, $content = null ) {

			$orderby = $order = '';
			$atts    = shortcode_atts( array(
				'style'    => 'style-1',
				'category' => '',
				'number'   => '5',
				'orderby'  => 'date',
				'order'    => 'DESC',

				'goso_columns'        => '',
				'goso_columns_tablet' => '',
				'goso_columns_mobile' => '',
				'goso_column_gap'     => '',
				'goso_row_gap'        => '',

				'hide_block_heading'  => '',
				'heading'             => '',
				'heading_title_style' => '',
				'heading_title_link'  => '',
				'heading_title_align' => '',
				'heading_icon_pos'    => '',
				'heading_icon'        => '',
				'build_query'         => '',
				'elementor_query'     => '',

				// View all button
				'cat_seemore'         => '',
				'cat_view_link'       => '',
				'cat_remove_arrow'    => '',
				'cat_readmore_button' => '',
				'cat_readmore_align'  => '',

				'block_title_color'     => '',
				'block_title_hcolor'    => '',
				'btitle_bcolor'         => '',
				'btitle_outer_bcolor'   => '',
				'btitle_style5_bcolor'  => '',
				'btitle_style78_bcolor' => '',
				'btitle_bgcolor'        => '',
				'btitle_outer_bgcolor'  => '',
				'btitle_style9_bgimg'   => '',
				'use_btitle_typo'       => '',
				'btitle_typo'           => '',
				'btitle_fsize'          => '',
				'block_title_offupper'  => '',
				'block_title_marginbt'  => '',
				'btitle_shapes_color'   => '',
				'bgstyle15_color'       => '',
				'iconstyle15_color'     => '',
				'cl_lines'              => '',
				'simgwidth'             => '',

				'pborder_color'     => '',
				'ptitle_color'      => '',
				'ptitle_hcolor'     => '',
				'bptitle_color'     => '',
				'bptitle_hcolor'    => '',
				'ptitle_fsize'      => '',
				'use_ptitle_typo'   => '',
				'ptitle_typo'       => '',
				'bptitle_fsize'     => '',
				'pmeta_color'       => '',
				'pmeta_hcolor'      => '',
				'bpmeta_color'      => '',
				'bpmeta_hcolor'     => '',
				'pmeta_bordercolor' => '',
				'use_pmeta_typo'    => '',
				'pmeta_fsize'       => '',
				'pmeta_typo'        => '',
				'pexcerpt_color'    => '',
				'use_pexcerpt_typo' => '',
				'pexcerpt_fsize'    => '',
				'pexcerpt_typo'     => '',
				'pcat_color'        => '',
				'pcat_hcolor'       => '',
				'pcat_fsize'        => '',
				'pcat_typo'         => '',

				'enable_meta_overlay'        => '',
				'hide_author'                => '',
				'show_author_sposts'         => '',
				'hide_readtime'              => '',
				'hide_cat'                   => '',
				'hide_icon_format'           => '',
				'thumb15'                    => '',
				'hide_date'                  => '',
				'show_commentcount'          => '',
				'show_viewscount'            => '',
				'hide_excerpt'               => '',
				'hide_excerpt_line'          => '',
				'cat_autoplay'               => 'false',
				'_excerpt_length'            => '',
				'big_title_length'           => '',
				'_title_length'              => '',
				'goso_featimg_size'         => '',
				'thumb_size'                 => '',
				'goso_featimg_ratio'        => '',
				'biggrid_ajaxfilter_cat'     => '',
				'biggrid_ajaxfilter_tag'     => '',
				'biggrid_ajaxfilter_author'  => '',
				'group_more_link_text'       => '',
				'group_more_defaultab_text'  => '',
				'biggrid_ajax_loading_style' => '',
				'paging'                     => '',
				'',
			), $atts, 'featured_cat' );

			extract( $atts );

			$big_title_length    = $big_title_length ? $big_title_length : '';
			$_title_length       = $_title_length ? $_title_length : '';
			$goso_featimg_size  = $atts['goso_featimg_size'] ? $atts['goso_featimg_size'] : '';
			$thumb_size          = $atts['thumb_size'] ? $atts['thumb_size'] : '';
			$goso_featimg_ratio = $atts['goso_featimg_ratio'] ? $atts['goso_featimg_ratio'] : '';

			$block_id = '';
			if ( class_exists( 'Goso_Vc_Helper' ) ) {
				$block_id = Goso_Vc_Helper::get_unique_id_block( 'featured_cat' );
			}

			$return = $block_heading = $block_heading_url = $cat_ads_code = '';

			$is_page_builder = false;

			$query_args = array();
			if ( $atts['elementor_query'] ) {
				$query_args = $atts['elementor_query'];

				$is_page_builder = true;
			} elseif ( $atts['build_query'] ) {
				$query_args = goso_build_args_query( $atts['build_query'] );

				$is_page_builder = true;
			} else {
				if ( ! isset( $number ) || ! is_numeric( $number ) ): $number = '5'; endif;
				$fea_oj = get_category_by_slug( $category );

				if ( ! empty ( $fea_oj ) ) {
					$fea_cat_id   = $fea_oj->term_id;
					$fea_cat_name = $fea_oj->name;
					$cat_meta     = get_option( "category_$fea_cat_id" );
					$cat_ads_code = isset( $cat_meta['mag_ads'] ) ? $cat_meta['mag_ads'] : '';

					$block_heading     = sanitize_text_field( $fea_cat_name );
					$block_heading_url = get_category_link( $fea_cat_id );

					$query_args = array(
						'post_type' => 'post',
						'showposts' => $number,
						'orderby'   => $orderby,
						'order'     => $order,
						'tax_query' => array(
							array(
								'taxonomy' => 'category',
								'field'    => 'slug',
								'terms'    => $category
							)
						)
					);
				}
			}
			$fea_query = new WP_Query( $query_args );

			$numers_results = $fea_query->post_count;

			if ( ! $fea_query->have_posts() ) {
				return self::show_missing_settings( 'Featured Cat', goso_get_setting( 'goso_ajaxsearch_no_post' ) );
			}

			if ( $atts['heading_title_style'] ) {
				$heading_title_style = $atts['heading_title_style'];
			} elseif ( get_theme_mod( 'goso_featured_cat_style' ) ) {
				$heading_title_style = get_theme_mod( 'goso_featured_cat_style' );
			} elseif ( get_theme_mod( 'goso_sidebar_heading_style' ) ) {
				$heading_title_style = get_theme_mod( 'goso_sidebar_heading_style' );
			} else {
				$heading_title_style = 'style-1';
			}

			if ( $atts['heading_title_align'] ) {
				$heading_align = $atts['heading_title_align'];
			} elseif ( get_theme_mod( 'goso_featured_cat_align' ) ) {
				$heading_align = get_theme_mod( 'goso_featured_cat_align' );
			} elseif ( get_theme_mod( 'goso_sidebar_heading_align' ) ) {
				$heading_align = get_theme_mod( 'goso_sidebar_heading_align' );
			} else {
				$heading_align = 'pcalign-left';
			}

			$sb_icon_pos         = get_theme_mod( 'goso_sidebar_icon_align' ) ? get_theme_mod( 'goso_sidebar_icon_align' ) : 'pciconp-right';
			$heading_icon_pos    = get_theme_mod( 'goso_homep_icon_align' ) ? get_theme_mod( 'goso_homep_icon_align' ) : $sb_icon_pos;
			$sb_icon_design      = get_theme_mod( 'goso_sidebar_icon_design' ) ? get_theme_mod( 'goso_sidebar_icon_design' ) : 'pcicon-right';
			$heading_icon_design = get_theme_mod( 'goso_homep_icon_design' ) ? get_theme_mod( 'goso_homep_icon_design' ) : $sb_icon_design;

			if ( $atts['heading_icon_pos'] ) {
				$heading_icon_pos = $atts['heading_icon_pos'];
			}

			if ( $atts['heading_icon'] ) {
				$heading_icon_design = $atts['heading_icon'];
			}

			if ( $atts['heading'] ) {
				$block_heading = $atts['heading'];
			}
			if ( $atts['heading_title_link'] ) {
				$block_heading_url = $atts['heading_title_link'];
			}

			$slider_autoplay = 'true';
			if ( $atts['cat_autoplay'] ) {
				$slider_autoplay = 'false';
			}

			$class_wrap = 'goso-featured-cat-sc';

			if ( in_array( $atts['style'], array( 'style-3', 'style-11' ) ) ) {
				if ( $atts['goso_columns'] ) {
					$class_wrap .= ' goso-featured-cat-ctcol';
					$class_wrap .= ' gososc-grid-' . esc_attr( $atts['goso_columns'] );

					if ( $atts['goso_columns_tablet'] ) {
						$class_wrap .= ' gososc-grid-tablet-' . esc_attr( $atts['goso_columns_tablet'] );
					}
					if ( $atts['goso_columns_mobile'] ) {
						$class_wrap .= ' gososc-grid-mobile-' . esc_attr( $atts['goso_columns_mobile'] );
					}
				}
			}

			$link_group_cats   = isset( $atts['biggrid_ajaxfilter_cat'] ) ? $atts['biggrid_ajaxfilter_cat'] : '';
			$link_group_tags   = isset( $atts['biggrid_ajaxfilter_tag'] ) ? $atts['biggrid_ajaxfilter_tag'] : '';
			$link_group_author = isset( $atts['biggrid_ajaxfilter_author'] ) ? $atts['biggrid_ajaxfilter_author'] : '';
			$more_link_text    = isset( $atts['group_more_link_text'] ) ? $atts['group_more_link_text'] : 'More';
			$link_group_out    = $link_group_out_before = $link_group_out_after = '';
			$df_post_per_page  = isset( $elementor_query['posts_per_page'] ) && $elementor_query['posts_per_page'] ? $elementor_query['posts_per_page'] : get_option( 'posts_per_page' );


			$link_group_out_before .= '<nav data-ppp="' . $df_post_per_page . '" data-query_type="ajaxtab" data-blockid="' . $block_id . '" data-more="' . esc_attr( $more_link_text ) . '" class="pcnav-lgroup"><ul class="pcflx">';
			$link_group_out_after  = '</ul></nav>';
			$has_link              = false;
			if ( ! empty( $link_group_cats ) ) {
				$has_link = true;
				foreach ( $link_group_cats as $link_cat ) {
					$link_group_out .= '<li><a href="#" data-id="' . md5( 'cat-link-' . $link_cat ) . '" class="pc-ajaxfil-link" data-paged="1" data-cat="' . esc_attr( $link_cat ) . '">' . get_term_field( 'name', $link_cat ) . '</a></li>';
				}
			}

			if ( ! empty( $link_group_tags ) ) {
				$has_link = true;
				foreach ( $link_group_tags as $link_tag ) {
					$link_group_out .= '<li><a href="#" data-id="' . md5( 'tag-link-' . $link_tag ) . '" class="pc-ajaxfil-link" data-paged="1" data-tag="' . esc_attr( $link_tag ) . '">' . get_term_field( 'name', $link_tag ) . '</a></li>';
				}
			}

			if ( ! empty( $link_group_author ) ) {
				$has_link = true;
				foreach ( $link_group_author as $author ) {
					$link_group_out .= '<li><a data-id="' . md5( 'author-link-' . $author ) . '" href="#" class="pc-ajaxfil-link" data-paged="1" data-author="' . esc_attr( $author ) . '">' . get_the_author_meta( 'nicename', $author ) . '</a></li>';
				}
			}

			if ( $atts['paging'] ) {
				$link_group_out .= '</ul><ul class="pcflx-nav">';
				$link_group_out .= '<li class="pcaj-nav-item pcaj-prev"><a class="disable pc-ajaxfil-link pcaj-nav-link prev" data-id="" href="#"><i class="gosoicon-left-chevron"></i></a></li>';
				$link_group_out .= '<li class="pcaj-nav-item pcaj-next"><a class="pc-ajaxfil-link pcaj-nav-link next" data-id="" href="#"><i class="gosoicon-right-chevron"></i></a></li>';
			}

			if ( $link_group_out ) {
				$first_class = $has_link ? 'visible' : 'hidden-item';
				$maxout = '';
				if ( $atts['paging'] ) {
					$maxout = 'data-maxp="' . $fea_query->max_num_pages . '" ';
				}
				$link_group_out_before .= '<li class="all ' . $first_class . '"><a data-paged="1" ' . $maxout . 'class="pc-ajaxfil-link current-item" data-id="default" href="#">' . $atts['group_more_defaultab_text'] . '</a></li>';
			}

			$link_group_out_after .= self::get_block_script( $block_id, $atts, false );

			ob_start();
			?>
            <div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_wrap ); ?>">
				<?php if ( $style == 'style-2' || $style == 'style-14' ) {
				$wrap_class = '';
				if ( $style == 'style-14' ): $wrap_class = ' mag-cat-style-14'; endif;
				?>
                <div class="home-featured-cat mag-cat-style-2<?php echo $wrap_class; ?>">
					<?php } else { ?>
                    <section class="home-featured-cat mag-cat-<?php echo esc_attr( $style ); ?>">
						<?php } ?>
						<?php if ( $block_heading && ! $atts['hide_block_heading'] ) { ?>
                            <div class="goso-border-arrow goso-homepage-title goso-magazine-title <?php echo esc_attr( $heading_title_style . ' ' . $heading_align . ' ' . $heading_icon_pos . ' ' . $heading_icon_design ); ?>">
                                <h3 class="inner-arrow">
                                    <span>
									<?php
									if ( $block_heading_url ) {
										echo '<a href="' . esc_url( $block_heading_url ) . '">';
									}
									echo do_shortcode( $block_heading );
									if ( $block_heading_url ) {
										echo '</a>';
									}
									?>
                                    </span>
                                </h3>
								<?php if ( $link_group_out ) {
									echo $link_group_out_before . $link_group_out . $link_group_out_after;
									wp_enqueue_script( 'goso_ajax_filter_fcat' );
								} ?>
                            </div>
						<?php } ?>
                        <div class="home-featured-cat-wrapper">
                            <div class="home-featured-cat-content pwf-id-default <?php echo esc_attr( $style ); ?>">
								<?php if ( $style == 'style-4' ): ?>
                                <div class="goso-single-mag-slider goso-owl-carousel goso-owl-carousel-slider"
                                     data-auto="<?php echo $slider_autoplay; ?>" data-dots="true" data-nav="false">
									<?php endif; ?>
									<?php if ( $style == 'style-5' || $style == 'style-12' ):
									$data_item = 2;
									if ( $style == 'style-12' ): $data_item = 3; endif;
									?>
                                    <div class="goso-magcat-carousel-wrapper">
                                        <div class="goso-owl-carousel goso-owl-carousel-slider goso-magcat-carousel"
                                             data-speed="400" data-auto="<?php echo $slider_autoplay; ?>"
                                             data-item="<?php echo $data_item; ?>"
                                             data-desktop="<?php echo $data_item; ?>"
                                             data-tablet="2" data-tabsmall="1">
											<?php endif; ?>
											<?php if ( $style == 'style-7' || $style == 'style-8' || $style == 'style-13' ): ?>
                                            <ul class="goso-grid goso-grid-maglayout goso-fea-cat-<?php echo $style; ?>">
												<?php endif; ?>
												<?php
												$m = 1;
												while ( $fea_query->have_posts() ): $fea_query->the_post();
													include( locate_template( 'template-parts/magazine-sc/magazine-' . $style . '.php' ) );
													$m ++; endwhile;
												?>
												<?php if ( $style == 'style-7' || $style == 'style-8' || $style == 'style-13' ): ?>
                                            </ul>
										<?php endif; ?>
											<?php if ( $style == 'style-5' || $style == 'style-12' ): ?>
                                        </div>
                                    </div>
								<?php endif; ?>
									<?php if ( $style == 'style-4' ): ?>
                                </div>
							<?php endif; ?>
                            </div>
							<?php
							if ( $is_page_builder ): ?>
								<?php
								if ( $atts['cat_seemore'] ) {
									$viewall_class = '';

									if ( $atts['cat_remove_arrow'] ): $viewall_class .= ' goso-btn-remove-arrow'; endif;
									if ( $atts['cat_readmore_button'] ) : $viewall_class .= ' goso-btn-make-button'; endif;
									if ( $atts['cat_readmore_align'] ) : $viewall_class .= ' goso-btn-align-' . esc_attr( $atts['cat_readmore_align'] ); endif;
									?>
                                    <div class="goso-featured-cat-seemore goso-seemore-<?php echo esc_attr( $style );
									echo $viewall_class; ?>">
                                        <a href="<?php echo esc_url( $atts['cat_view_link'] ); ?>"><?php echo goso_get_setting( 'goso_trans_view_all' ); ?>
											<?php goso_fawesome_icon( 'fas fa-angle-double-right' ); ?>
                                        </a>
                                    </div>
									<?php
								}
								?>
							<?php elseif ( get_theme_mod( 'goso_home_featured_cat_seemore' ) ):
								$viewall_class = '';
								if ( get_theme_mod( 'goso_home_featured_cat_remove_arrow' ) ): $viewall_class .= ' goso-btn-remove-arrow'; endif;
								if ( get_theme_mod( 'goso_home_featured_cat_readmore_button' ) ): $viewall_class .= ' goso-btn-make-button'; endif;
								if ( get_theme_mod( 'goso_home_featured_cat_readmore_align' ) ): $viewall_class .= ' goso-btn-align-' . get_theme_mod( 'goso_home_featured_cat_readmore_align' ); endif;
								?>
                                <div class="goso-featured-cat-seemore goso-seemore-<?php echo esc_attr( $style );
								echo $viewall_class; ?>">
                                    <a href="<?php echo esc_url( get_category_link( $fea_cat_id ) ); ?>"><?php echo goso_get_setting( 'goso_trans_view_all' ); ?>
										<?php goso_fawesome_icon( 'fas fa-angle-double-right' ); ?>
                                    </a>
                                </div>
							<?php endif; ?>

							<?php if ( $cat_ads_code && ! $is_page_builder ): ?>
                                <div class="goso-featured-cat-custom-ads">
									<?php echo stripslashes( $cat_ads_code ); ?>
                                </div>
							<?php endif;
							if ( $link_group_out ) {
								echo goso_get_html_animation_loading( $atts['biggrid_ajax_loading_style'] );
							}
							?>

                        </div>

						<?php if ( $style == 'style-2' || $style == 'style-14' ) { ?>
                </div>
			<?php } else { ?>
                </section>
			<?php } ?>

            </div><!-- goso-featured-cat-sc -->
			<?php
			wp_reset_postdata();

			$block_id_css = '#' . $block_id;
			?>
            <style>
                <?php if( 'yes' == $hide_excerpt_line ): ?>
                <?php echo $block_id_css; ?>
				.first-post .magcat-detail .mag-header:after,
                <?php echo $block_id_css; ?> .list-post .header-list-style:after,
                <?php echo $block_id_css; ?> .home-featured-cat-content.style-7 .grid-header-box:after {
					content: none;
				}
                <?php echo $block_id_css; ?>
				.grid-header-box,
                <?php echo $block_id_css; ?> .list-post .header-list-style,
                <?php echo $block_id_css; ?> .first-post .magcat-detail .mag-header {
					padding-bottom: 0;
				}
                <?php endif; ?>
            </style>
			<?php
			$return = ob_get_clean();

			if ( $block_id && class_exists( 'Goso_Custom_CSS_Shortcode_Old' ) ) {
				$return .= Goso_Custom_CSS_Shortcode_Old::featured_cat( $block_id, $atts );
			}

			return $return;
		}

		public static function goso_authow_archive_pag_style( $layout_this, $settings ) {

			if ( $settings['goso_archive_nav_ajax'] || $settings['goso_archive_nav_scroll'] ) {

				$button_class = 'goso-ajax-more goso-ajax-arch';
				if ( $settings['goso_archive_nav_scroll'] ) {
					$button_class .= ' goso-infinite-scroll';
				}

				$data_layout = $layout_this;
				if ( in_array( $layout_this, array( 'standard-grid', 'classic-grid', 'overlay-grid' ) ) ) {
					$data_layout = 'grid';
				} elseif ( in_array( $layout_this, array( 'standard-grid-2', 'classic-grid-2' ) ) ) {
					$data_layout = 'grid-2';
				} elseif ( in_array( $layout_this, array( 'standard-list', 'classic-list', 'overlay-list' ) ) ) {
					$data_layout = 'list';
				} elseif ( in_array( $layout_this, array( 'standard-boxed-1', 'classic-boxed-1' ) ) ) {
					$data_layout = 'boxed-1';
				} elseif ( in_array( $layout_this, array( 'mixed-3', 'mixed-4' ) ) ) {
					$data_layout = 'small-list';
				}

				$data_template = 'sidebar';

				$offset_number = get_option( 'posts_per_page' );

				if ( isset( $settings['offset'] ) ) {
					$offset_number = $settings['offset'];
				}

				$num_load = 6;
				if ( isset( $settings['goso_arc_number_load_more'] ) && 0 != $settings['goso_arc_number_load_more'] ):
					$num_load = $settings['goso_arc_number_load_more'];
				endif;
				?>
				<?php

				$data_archive_type  = '';
				$data_archive_value = '';
				if ( is_category() ) :
					$category           = get_category( get_query_var( 'cat' ) );
					$cat_id             = isset( $category->cat_ID ) ? $category->cat_ID : '';
					$data_archive_type  = 'cat';
					$data_archive_value = $cat_id;
					$opt_cat            = 'category_' . $cat_id;
					$cat_meta           = get_option( $opt_cat );
					$sidebar_opts       = isset( $cat_meta['cat_sidebar_display'] ) ? $cat_meta['cat_sidebar_display'] : '';
					if ( $sidebar_opts == 'no' ):
						$data_template = 'no-sidebar';
                    elseif ( $sidebar_opts == 'left' || $sidebar_opts == 'right' ):
						$data_template = 'sidebar';
					endif;

                elseif ( is_tag() ) :
					$tag                = get_queried_object();
					$tag_id             = isset( $tag->term_id ) ? $tag->term_id : '';
					$data_archive_type  = 'tag';
					$data_archive_value = $tag_id;
                elseif ( is_day() ) :
					$data_archive_type  = 'day';
					$data_archive_value = get_the_date( 'm|d|Y' );
                elseif ( is_month() ) :
					$data_archive_type  = 'month';
					$data_archive_value = get_the_date( 'm|d|Y' );
                elseif ( is_year() ) :
					$data_archive_type  = 'year';
					$data_archive_value = get_the_date( 'm|d|Y' );
                elseif ( is_search() ) :
					$data_archive_type  = 'search';
					$data_archive_value = get_search_query();
                elseif ( is_author() ) :

					global $authordata;
					$user_id = isset( $authordata->ID ) ? $authordata->ID : 0;

					$data_archive_type  = 'author';
					$data_archive_value = $user_id;
                elseif ( is_archive() ) :
					$queried_object = get_queried_object();
					$term_id        = isset( $queried_object->term_id ) ? $queried_object->term_id : '';
					$tax            = get_taxonomy( get_queried_object()->taxonomy );
					$tax_name       = isset( $tax->name ) ? $tax->name : '';

					if ( $term_id && $tax_name ) {
						$data_archive_type  = $tax_name;
						$data_archive_value = $term_id;
					}
				endif;

				$button_data = 'data-mes="' . goso_get_setting( 'goso_trans_no_more_posts' ) . '"';
				$button_data .= ' data-layout="' . esc_attr( $data_layout ) . '"';
				$button_data .= ' data-number="' . absint( $num_load ) . '"';
				$button_data .= ' data-offset="' . absint( $offset_number ) . '"';
				$button_data .= ' data-from="customize"';
				$button_data .= ' data-template="' . $data_template . '"';
				$button_data .= ' data-archivetype="' . $data_archive_type . '"';
				$button_data .= ' data-archivevalue="' . $data_archive_value . '"';
				?>
                <div class="goso-pagination <?php echo $button_class; ?>">
                    <a href="#" class="goso-ajax-more-button" <?php echo $button_data; ?>>
                        <span class="ajax-more-text"><?php echo goso_get_setting( 'goso_trans_load_more_posts' ); ?></span>
                        <span class="ajaxdot"></span><?php goso_fawesome_icon( 'fas fa-sync' ); ?>
                    </a>
                </div>
				<?php
			} else {
				goso_authow_pagination();
			}
		}

		/**
		 * Retrieve HTML markup for popular posts element
		 *
		 * @param array $atts
		 * @param string $content
		 *
		 * @return string
		 */
		public static function popular_posts( $atts, $content = null ) {
			$atts = shortcode_atts( array(
				'title'         => 'Popular Posts',
				'type'          => 'all',
				'category'      => '',
				'number'        => '12',
				'columns'       => '4',
				'_title_length' => '10',

				'heading'             => '',
				'hide_block_heading'  => '',
				'heading_title_style' => '',
				'heading_title_link'  => '',
				'heading_title_align' => '',
				'heading_icon_pos'    => '',
				'heading_icon'        => '',
				'build_query'         => '',
				'elementor_query'     => '',

				'block_title_color'     => '',
				'block_title_hcolor'    => '',
				'btitle_bcolor'         => '',
				'btitle_outer_bcolor'   => '',
				'btitle_style5_bcolor'  => '',
				'btitle_style78_bcolor' => '',
				'btitle_bgcolor'        => '',
				'btitle_outer_bgcolor'  => '',
				'btitle_style9_bgimg'   => '',
				'use_btitle_typo'       => '',
				'btitle_typo'           => '',
				'btitle_fsize'          => '',
				'block_title_offupper'  => '',
				'block_title_marginbt'  => '',
				'btitle_shapes_color'   => '',
				'bgstyle15_color'       => '',
				'iconstyle15_color'     => '',
				'cl_lines'              => '',
				'goso_featimg_size'    => '',
				'goso_featimg_ratio'   => '',
				'thumb_size'            => '',
				'show_navs'             => '',
				'hide_dots'             => '',

				'ptitle_color'    => '',
				'ptitle_hcolor'   => '',
				'ptitle_fsize'    => '',
				'use_ptitle_typo' => '',
				'ptitle_typo'     => '',
				'pmeta_color'     => '',
				'pmeta_hcolor'    => '',
				'pmeta_fsize'     => '',
				'use_pmeta_typo'  => '',
				'pmeta_typo'      => '',
				'_dot_color'      => '',
				'dot_hcolor'      => '',
			), $atts, 'popular_posts' );

			extract( $atts );

			$return = '';

			$_title_length = $_title_length ? $_title_length : 10;
			if ( $heading ): $title = $heading; endif;

			if ( ! isset( $columns ) || ! is_numeric( $columns ) ): $columns = '4'; endif;

			if ( $atts['elementor_query'] ) {
				$query_args = $atts['elementor_query'];
			} elseif ( $atts['build_query'] ) {
				$query_args = goso_build_args_query( $atts['build_query'] );
			} else {
				if ( ! isset( $number ) || ! is_numeric( $number ) ): $number = '12'; endif;

				$query_args = array(
					'posts_per_page' => $number,
					'post_type'      => 'post',
					'meta_key'       => goso_get_postviews_key(),
					'orderby'        => 'meta_value_num',
					'order'          => 'DESC'
				);

				if ( $type == 'week' ) {
					$query_args = array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'meta_key'       => 'goso_post_week_views_count',
						'orderby'        => 'meta_value_num',
						'order'          => 'DESC'
					);
				} elseif ( $type == 'month' ) {
					$query_args = array(
						'posts_per_page' => $number,
						'post_type'      => 'post',
						'meta_key'       => 'goso_post_month_views_count',
						'orderby'        => 'meta_value_num',
						'order'          => 'DESC'
					);
				}

				if ( $category ) {
					$query_args['category_name'] = $category;
				}
			}

			$popular = new WP_Query( $query_args );

			if ( ! $popular->have_posts() ) {
				return self::show_missing_settings( 'Popular Posts', goso_get_setting( 'goso_ajaxsearch_no_post' ) );
			}
			$popular_title_length = $_title_length ? $_title_length : 10;
			$data_loop            = '';
			$number_posts_display = $popular->post_count;
			if ( ( $columns == '4' && $number_posts_display < 5 ) || ( $columns == '3' && $number_posts_display < 4 ) ):
				$data_loop = ' data-loop="false"';
			endif;

			$heading_title_style = '';
			$heading_align       = '';

			if ( $atts['heading_title_style'] ) {
				$heading_title_style = $atts['heading_title_style'];
			}

			$sb_icon_pos         = get_theme_mod( 'goso_sidebar_icon_align' ) ? get_theme_mod( 'goso_sidebar_icon_align' ) : 'pciconp-right';
			$heading_icon_pos    = get_theme_mod( 'goso_homep_icon_align' ) ? get_theme_mod( 'goso_homep_icon_align' ) : $sb_icon_pos;
			$sb_icon_design      = get_theme_mod( 'goso_sidebar_icon_design' ) ? get_theme_mod( 'goso_sidebar_icon_design' ) : 'pcicon-right';
			$heading_icon_design = get_theme_mod( 'goso_homep_icon_design' ) ? get_theme_mod( 'goso_homep_icon_design' ) : $sb_icon_design;

			if ( $atts['heading_icon_pos'] ) {
				$heading_icon_pos = $atts['heading_icon_pos'];
			}

			if ( $atts['heading_icon'] ) {
				$heading_icon_design = $atts['heading_icon'];
			}

			$data_nav  = ( $atts['show_navs'] ) ? 'true' : 'false';
			$data_dots = ( $atts['hide_dots'] ) ? 'false' : 'true';

			if ( $atts['heading_title_align'] ) {
				$heading_align = $atts['heading_title_align'];
			}
			$block_id = '';
			if ( class_exists( 'Goso_Vc_Helper' ) ) {
				$block_id = Goso_Vc_Helper::get_unique_id_block( 'popular_posts' );
			}

			$thumbsize = goso_featured_images_size();
			if ( 'horizontal' == $goso_featimg_size ) {
				$thumbsize = 'goso-thumb';
			} else if ( 'square' == $goso_featimg_size ) {
				$thumbsize = 'goso-thumb-square';
			} else if ( 'vertical' == $goso_featimg_size ) {
				$thumbsize = 'goso-thumb-vertical';
			} else if ( 'custom' == $goso_featimg_size ) {
				if ( $thumb_size ) {
					$thumbsize = $thumb_size;
				}
			}

			ob_start();
			?>
            <div id="<?php echo esc_attr( $block_id ); ?>" class="goso-popular-posts-sc">
                <div class="goso-home-popular-posts<?php echo( ! $heading_title_style ? ' use-heading-default' : '' ); ?>">
					<?php if ( $title && ! $atts['hide_block_heading'] ) { ?>
						<?php if ( ! $heading_title_style ) { ?>
                            <h2 class="home-pupular-posts-title <?php echo sanitize_text_field( $heading_align ); ?>">
								<?php
								echo( $atts['heading_title_link'] ? '<a href="' . esc_url( $atts['heading_title_link'] ) . '">' : '<span>' );
								echo do_shortcode( $title );
								echo( $atts['heading_title_link'] ? '</a>' : '</span>' );
								?>
                            </h2>
						<?php } else { ?>
                            <div class="goso-border-arrow goso-homepage-title goso-magazine-title <?php echo esc_attr( $heading_title_style . ' ' . $heading_align . ' ' . $heading_icon_pos . ' ' . $heading_icon_design ); ?>">
                                <h3 class="inner-arrow">
									<?php
									if ( $atts['heading_title_link'] ) {
										echo '<a href="' . esc_url( $atts['heading_title_link'] ) . '">';
									}
									echo do_shortcode( $title );
									if ( $atts['heading_title_link'] ) {
										echo '</a>';
									}
									?>
                                </h3>
                            </div>
						<?php } ?>
					<?php } ?>

                    <div class="goso-owl-carousel goso-owl-carousel-slider goso-related-carousel goso-home-popular-post"<?php echo $data_loop; ?>
                         data-lazy="true" data-item="<?php echo $columns; ?>" data-desktop="<?php echo $columns; ?>"
                         data-tablet="3" data-tabsmall="2" data-auto="false" data-speed="300"
                         data-dots="<?php echo $data_dots; ?>" data-nav="<?php echo $data_nav; ?>">
						<?php while ( $popular->have_posts() ) : $popular->the_post(); ?>
                            <div class="item-related">
								<?php if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) : ?>
								<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                                <a class="related-thumb goso-image-holder <?php echo goso_classes_slider_lazy(); ?>"
                                   href="<?php the_permalink() ?>"
                                   title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"
                                   data-bgset="<?php echo goso_image_srcset( get_the_ID(), $thumbsize ); ?>">
									<?php } else { ?>
                                    <a class="related-thumb goso-image-holder" href="<?php the_permalink() ?>"
                                       title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"
                                       style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $thumbsize ); ?>');">
										<?php } ?>
										<?php if ( has_post_thumbnail() && get_theme_mod( 'goso_enable_home_popular_icons' ) ): ?>
											<?php if ( has_post_format( 'video' ) ) : ?>
												<?php goso_fawesome_icon( 'fas fa-play' ); ?>
											<?php endif; ?>
											<?php if ( has_post_format( 'audio' ) ) : ?>
												<?php goso_fawesome_icon( 'fas fa-music' ); ?>
											<?php endif; ?>
											<?php if ( has_post_format( 'link' ) ) : ?>
												<?php goso_fawesome_icon( 'fas fa-link' ); ?>
											<?php endif; ?>
											<?php if ( has_post_format( 'quote' ) ) : ?>
												<?php goso_fawesome_icon( 'fas fa-quote-left' ); ?>
											<?php endif; ?>
											<?php if ( has_post_format( 'gallery' ) ) : ?>
												<?php goso_fawesome_icon( 'far fa-image' ); ?>
											<?php endif; ?>
										<?php endif; ?>
                                    </a>
									<?php endif; ?>

                                    <h3><a title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"
                                           href="<?php the_permalink(); ?>"><?php echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $popular_title_length, '...' ); ?></a>
                                    </h3>
									<?php if ( ! get_theme_mod( 'goso_hide_date_home_popular' ) ) : ?>
                                        <span class="date"><?php goso_authow_time_link(); ?></span>
									<?php endif; ?>
                            </div>
						<?php
						endwhile;
						?>
                    </div>
                </div>
            </div><!-- goso-popular_posts-sc -->
			<?php
			$return = ob_get_clean();
			wp_reset_postdata();

			if ( $block_id && class_exists( 'Goso_Custom_CSS_Shortcode_Old' ) ) {
				$return .= Goso_Custom_CSS_Shortcode_Old::popular_posts( $block_id, $atts );
			}

			return $return;
		}


		/**
		 * Retrieve HTML markup for sidebar element
		 *
		 * @param array $atts
		 * @param string $content
		 *
		 * @return string
		 */
		public static function authow_sidebar( $atts, $content = null ) {
			extract( shortcode_atts( array(
				'sidebar'  => 'main-sidebar',
				'style'    => '',
				'layout'   => '',
				'icon_pos' => '',
				'icon'     => '',
				'align'    => ''
			), $atts ) );

			$heading_title       = get_theme_mod( 'goso_sidebar_heading_style' ) ? get_theme_mod( 'goso_sidebar_heading_style' ) : 'style-1';
			$heading_align       = get_theme_mod( 'goso_sidebar_heading_align' ) ? get_theme_mod( 'goso_sidebar_heading_align' ) : 'pcalign-center';
			$sidebar_style       = get_theme_mod( 'goso_sidebar_style' ) ? get_theme_mod( 'goso_sidebar_style' ) : '';
			$sidebar_icon_pos    = get_theme_mod( 'goso_sidebar_icon_align' ) ? get_theme_mod( 'goso_sidebar_icon_align' ) : 'pciconp-right';
			$sidebar_icon_design = get_theme_mod( 'goso_sidebar_icon_design' ) ? get_theme_mod( 'goso_sidebar_icon_design' ) : 'pcicon-right';

			if ( ! isset( $sidebar ) ): $sidebar = 'main-sidebar'; endif;
			if ( ! isset( $layout ) || ! $layout ): $layout = $sidebar_style; endif;
			if ( ! isset( $style ) || ! $style ): $style = $heading_title; endif;
			if ( ! isset( $icon_pos ) || ! $icon_pos ): $icon_pos = $sidebar_icon_pos; endif;
			if ( ! isset( $icon ) || ! $icon ): $icon = $sidebar_icon_design; endif;
			if ( ! in_array( $align, array(
				'pcalign-center',
				'pcalign-left',
				'pcalign-right'
			) ) ): $align = $heading_align; endif;

			ob_start();
			?>

            <div id="sidebar"
                 class="goso-sidebar-content goso-sidebar-content-vc <?php echo esc_attr( $style . ' ' . $align . ' ' . $layout . ' ' . $icon_pos . ' ' . $icon ); ?>">
                <div class="theiaStickySidebar">
					<?php
					if ( is_active_sidebar( $sidebar ) ) {
						dynamic_sidebar( $sidebar );
					} else {
						dynamic_sidebar( 'main-sidebar' );
					}
					?>
                </div>
            </div>

			<?php
			$return = ob_get_clean();

			return $return;
		}

		/**
		 * Retrieve HTML markup for featured boxes - like homepage featured boxes
		 *
		 * @param array $atts
		 * @param string $content
		 *
		 * @return string
		 */
		public static function authow_featured_boxes( $atts, $content = null ) {
			$atts = shortcode_atts( array(
				'style'         => 'boxes-style-1',
				'columns'       => 'boxes-3-columns',
				'size'          => 'horizontal',
				'margin_top'    => '0',
				'margin_bottom' => '0',
				'boxes_data'    => '',
				'new_tab'       => 'no',

				'img_box_border_color' => '',
				'img_box_text_color'   => '',
				'img_box_text_hcolor'  => '',
				'img_box_fsize'        => '',
				'use_img_box_typo'     => '',
				'img_box_typo'         => '',
				''
			), $atts );

			extract( $atts );

			if ( ! function_exists( 'vc_param_group_parse_atts' ) ) {
				return;
			}

			if ( empty( $atts['boxes_data'] ) ) {
				return;
			}

			$featured_boxes = (array) vc_param_group_parse_atts( $atts['boxes_data'] );

			if ( empty( $featured_boxes ) ) {
				return;
			}

			if ( ! isset( $style ) ): $style = 'boxes-style-1'; endif;
			if ( ! isset( $columns ) ): $columns = 'boxes-3-columns'; endif;
			if ( ! isset( $size ) ): $size = 'horizontal'; endif;
			if ( ! isset( $new_tab ) ): $new_tab = 'no'; endif;
			if ( ! is_numeric( $margin_top ) ): $margin_top = '0'; endif;
			if ( ! is_numeric( $margin_bottom ) ): $margin_bottom = '0'; endif;
			$style_css   = ' style="margin-top: ' . $margin_top . 'px; margin-bottom: ' . $margin_bottom . 'px;"';
			$weight_text = get_theme_mod( 'goso_home_box_weight' ) ? get_theme_mod( 'goso_home_box_weight' ) : 'normal';
			$thumb       = 'goso-thumb';
			if ( $size == 'square' ) {
				$thumb = 'goso-thumb-square';
			} elseif ( $size == 'vertical' ) {
				$thumb = 'goso-thumb-vertical';
			}

			$block_id = '';
			if ( class_exists( 'Goso_Vc_Helper' ) ) {
				$block_id = Goso_Vc_Helper::get_unique_id_block( 'featured_boxes' );
			}

			ob_start();
			?>
            <div id="<?php echo esc_attr( $block_id ); ?>"
                 class="container home-featured-boxes home-featured-boxes-sc home-featured-boxes-vc boxes-weight-<?php echo $weight_text; ?> boxes-size-<?php echo $size; ?>"<?php echo $style_css; ?>>
                <ul class="homepage-featured-boxes <?php echo $columns; ?>">
					<?php
					foreach ( $featured_boxes as $item ) {
						if ( isset( $item['image'] ) ):
							$homepage_box_image = wp_get_attachment_url( $item['image'] );
							$homepage_box_text = isset( $item['text'] ) ? $item['text'] : '';
							$homepage_box_url = isset( $item['url'] ) ? $item['url'] : '';

							$open_url  = '';
							$close_url = '';
							$target    = '';
							if ( 'yes' == $new_tab ):
								$target = ' target="_blank"';
							endif;
							if ( $homepage_box_url ) {
								$open_url  = '<a href="' . do_shortcode( $homepage_box_url ) . '"' . $target . '>';
								$close_url = '</a>';
							}
							?>
                            <li class="goso-featured-ct">
								<?php echo wp_kses( $open_url, goso_allow_html() ); ?>
                                <div class="goso-fea-in <?php echo $style; ?>">
									<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                                        <div class="fea-box-img goso-image-holder goso-holder-load goso-lazy"
                                             data-bgset="<?php echo goso_get_image_size_url( $homepage_box_image, $thumb ); ?>"></div>
									<?php } else { ?>
                                        <div class="fea-box-img goso-image-holder"
                                             style="background-image: url('<?php echo goso_get_image_size_url( $homepage_box_image, $thumb ); ?>');"></div>
									<?php } ?>

									<?php if ( $homepage_box_text ): ?>
                                        <h4><span class="boxes-text"><span
                                                        style="font-weight: <?php echo $weight_text; ?>"><?php echo do_shortcode( $homepage_box_text ); ?></span></span>
                                        </h4>
									<?php endif; ?>
                                </div>
								<?php echo wp_kses( $close_url, goso_allow_html() ); ?>
                            </li>
						<?php
						endif;
					}
					?>
                </ul>
            </div>

			<?php
			$return = ob_get_clean();

			if ( $block_id && class_exists( 'Goso_Custom_CSS_Shortcode_Old' ) ) {
				$return .= Goso_Custom_CSS_Shortcode_Old::featured_boxes( $block_id, $atts );
			}

			return $return;
		}

		/**
		 * Retrieve HTML markup for inline-related posts shortcodes
		 *
		 * @param array $atts
		 * @param string $content
		 *
		 * @return string
		 */
		public static function inline_related_posts( $atts, $content = null ) {
			if ( ! is_singular() ) {
				return;
			}
			$atts = shortcode_atts( array(
				'style'        => 'list',
				'title'        => 'You Might Be Interested In',
				'title_align'  => 'left',
				'number'       => 6,
				'align'        => 'none',
				'ids'          => '',
				'by'           => 'categories',
				'order'        => 'DESC',
				'orderby'      => 'rand',
				'hide_thumb'   => 'no',
				'thumb_right'  => 'no',
				'date'         => 'yes',
				'views'        => 'no',
				'grid_columns' => '2',
				'post_type'    => '',
				'tax'          => ''
			), $atts );

			extract( $atts );
			$args = array();
			if ( $post_type != 'post' && $post_type && is_singular( $post_type ) ) {
				$post_id = get_the_ID();
				$args    = array(
					'post_type'           => $post_type,
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => $number,
					'post__not_in'        => array( $post_id ),
					'orderby'             => $orderby,
					'order'               => $order
				);
				if ( $tax ) {
					$_terms = get_the_terms( get_the_ID(), $tax );
					if ( $_terms && ! is_wp_error( $_terms ) ) {
						$id_terms = array();
						foreach ( $_terms as $_term ) {
							$id_terms[] = $_term->term_id;
						}

						if ( $id_terms ) {
							$args['tax_query'] = array(
								array(
									'taxonomy' => $tax,
									'field'    => 'term_id',
									'terms'    => $id_terms
								),
							);
						}
					}
				}
			} else if ( $ids ) {
				$ids_trim  = str_replace( ' ', '', $ids );
				$ids_array = explode( ',', $ids_trim );
				$args      = array(
					'post__in'     => $ids_array,
					'post__not_in' => get_the_ID(),
					'order'        => $order
				);
			} else {
				$args = goso_get_query_related_posts( get_the_ID(), $by, $order, $orderby, $number );
			}

			if ( ! empty( $args ) ) {
				$query = new wp_query( $args );
				if ( $query->have_posts() ) {
					$align        = $align ? $align : 'none';
					$title_align  = $title_align ? $title_align : 'left';
					$grid_columns = in_array( $grid_columns, array( '1', '2', '3' ) ) ? $grid_columns : '2';
					if ( 'left' == $align || 'right' == $align ) {
						$grid_columns = '1';
					}
					$wrapper_class = 'goso-ilrelated-posts';
					$style         = in_array( $style, array( 'list', 'grid' ) ) ? $style : 'list';
					$wrapper_class .= ' pcilrt-' . $style . ' pcilrt-' . $align . ' pcilrt-col-' . $grid_columns;
					if ( 'yes' == $thumb_right ) {
						$wrapper_class .= ' pcilrt-thumbright';
					}

					ob_start();
					?>
                    <div class="<?php echo $wrapper_class; ?>">
						<?php if ( $title ) { ?>
                            <div class="pcilrp-heading pcilrph-align-<?php echo $title_align; ?>">
                                <span><?php echo do_shortcode( $title ); ?></span></div>
						<?php } ?>
                        <ul class="pcilrp-content">
							<?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <li class="pcilrp-item pcilrp-item-<?php echo $style; ?><?php if ( 'yes' == $hide_thumb ): echo ' pcilrp-item-hidethumb'; endif; ?>">
									<?php if ( 'list' == $style ) { ?>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									<?php } else { ?>
                                        <div class="pcilrp-flex">
											<?php if ( 'yes' != $hide_thumb ): ?>
                                                <div class="pcilrp-thumb">
													<?php if ( ! get_theme_mod( 'goso_disable_lazyload_single' ) ) { ?>
                                                        <a class="goso-image-holder goso-lazy"
                                                           data-bgset="<?php echo goso_image_srcset( get_the_ID(), goso_featured_images_size( 'small' ) ); ?>"
                                                           href="<?php the_permalink(); ?>"
                                                           title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
													<?php } else { ?>
                                                        <a class="goso-image-holder"
                                                           style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), goso_featured_images_size( 'small' ) ); ?>');"
                                                           href="<?php the_permalink(); ?>"
                                                           title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
													<?php } ?>
                                                </div>
											<?php endif; ?>
                                            <div class="pcilrp-body">
                                                <div class="pcilrp-title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </div>
												<?php if ( 'yes' == $date || 'yes' == $views ): ?>
                                                    <div class="pcilrp-meta">
														<?php if ( 'yes' == $date ) { ?>
                                                            <span class="pcilrp-date"><?php goso_fawesome_icon( 'far fa-clock' ) . goso_authow_time_link(); ?></span>
														<?php } ?>
														<?php if ( 'yes' == $views ) {
															echo '<span class="pcilrp-views">';
															goso_fawesome_icon( 'far fa-eye' );
															echo goso_get_post_views( get_the_ID() );
															echo '</span>';
														} ?>
                                                    </div>
												<?php endif; ?>
                                            </div>
                                        </div>
									<?php } ?>
                                </li>
							<?php endwhile; ?>
                        </ul>
                    </div>

					<?php
					$return = ob_get_clean();
					wp_reset_postdata();

					return $return;
				}
				wp_reset_postdata();
			}
		}

		public static function show_missing_settings( $label, $mess ) {
			$output = '';
			if ( current_user_can( 'manage_options' ) ) {
				$output .= '<div class="goso-missing-settings">';
				$output .= '<p style="margin-bottom: 4px;">This message appears for administrator users only</p>';
				$output .= '<span>' . $label . '</span>';
				$output .= $mess;
				$output .= '</div>';
			}

			return $output;
		}

		public static function get_block_script( $unique_id, $atts, $echo = true ) {
			$atts['category_ids'] = '';
			$atts['taxonomy']     = '';

			if ( isset( $atts['title'] ) ) {
				unset( $atts['title'] );
			}

			$output = '<script>';

			$output .= 'if( typeof(gosoBlock) === "undefined" ) {';
			$output .= "function gosoBlock() { this.atts_json = ''; this.content = ''; }";
			$output .= '}';
			$output .= 'var gosoBlocksArray = gosoBlocksArray || [];';
			$output .= 'var GOSOLOCALCACHE = GOSOLOCALCACHE || {};';
			$output .= 'var ' . $unique_id . ' = new gosoBlock();';
			$output .= $unique_id . '.blockID="' . $unique_id . '";';
			$output .= $unique_id . ".atts_json = '" . json_encode( $atts ) . "';";
			$output .= "gosoBlocksArray.push(" . $unique_id . ");";
			$output .= '</script>';

			if ( $echo ) {
				echo $output;
			} else {
				return $output;
			}

		}

	}

	Authow_VC_Shortcodes::init();
}

if ( ! class_exists( 'Goso_Custom_Sidebar' ) ) {
	die();
}
