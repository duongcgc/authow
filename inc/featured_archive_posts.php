<?php
// get settings
if ( ! function_exists( 'goso_featured_archive_posts_content' ) ) {
	add_action( 'goso_featured_archive_posts', 'goso_featured_archive_posts_content' );
	function goso_featured_archive_posts_content() {
		$goso_featured_layout     = '';
		$goso_cat_featured_layout = get_theme_mod( 'goso_cat_featured_layout', '' );
		$goso_tag_featured_layout = get_theme_mod( 'goso_tag_featured_layout', '' );

		if ( is_category() && $goso_cat_featured_layout ) {
			$goso_featured_layout = $goso_cat_featured_layout;
		}

		if ( is_tag() && $goso_tag_featured_layout ) {
			$goso_featured_layout = $goso_tag_featured_layout;
		}

		$grid_per_page = goso_featured_archive_ppl( $goso_featured_layout );

		if ( $goso_featured_layout ) {


			$biggid_style = $goso_featured_layout;
			// setup biggrid style
			$wrapper_class = $data_class = '';
			$flag_style    = false;
			if ( in_array( $goso_featured_layout, [
				'style-1 goso-grid-col-2',
				'style-1 goso-grid-col-3',
				'style-1 goso-grid-col-4',
				'style-1 goso-grid-col-5'
			] ) ) {
				$data_class   .= ' goso-dflex';
				$biggid_style = 'style-1';
			} else {
				$data_class .= ' goso-dblock';
				$flag_style = true;
				$data_class .= ' goso-fixh';
			}

			$two_sidebar_class = '';
			$sidebar_position = goso_get_sidebar_position_archive();
			if ( 'two-sidebar' == $sidebar_position ): $two_sidebar_class = ' two-sidebar'; endif;

			$wrapper_class .= ' container biggrid-archive-wrapper';
			$wrapper_class .= $two_sidebar_class;

			$wrapper_class .= is_category() ? ' biggrid-cat-wrapper' : ' biggrid-tag-wrapper';

			$wrapper_class .= ' goso-bgrid-based-post goso-bgrid-' . $goso_featured_layout . ' pcbg-ficonpo-top-right pcbg-reiconpo-top-left goso-bgrid-content-on gosobg-imageh-zoom-in gosobg-texth-none gosobg-textani-movetop';

			if ( get_theme_mod( 'goso_arcf_mmeta' ) ) {
				$wrapper_class .= ' hide-mdesc';
			}

			if ( get_theme_mod( 'goso_arcf_mcat' ) ) {
				$wrapper_class .= ' hide-msubtitle';
			}

			$featured_posts = new WP_Query( goso_get_query_archive_first_posts_featured() );
			$big_items      = goso_big_grid_is_big_items( $biggid_style );

			//gettings category settings
			$post_meta      = [ 'title', 'cat', 'date' ];
			$disable_lazy   = get_theme_mod( 'goso_disable_lazyload_layout' );
			$show_reviewpie = true;

			if ( get_theme_mod( 'goso_review_hide_piechart' ) ) {
				$show_reviewpie = false;
			}
			$primary_cat = get_theme_mod( 'goso_show_pricat_yoast_only' );
			if ( get_theme_mod( 'goso_arcf_cat' ) ) {
				unset( $post_meta[1] );
			}
			if ( get_theme_mod( 'goso_arcf_date' ) ) {
				unset( $post_meta[2] );
			}
			if ( get_theme_mod( 'goso_arcf_author' ) ) {
				$post_meta[] = 'author';
			}
			if ( get_theme_mod( 'goso_arcf_cm' ) ) {
				$post_meta[] = 'comment';
			}
			if ( get_theme_mod( 'goso_arcf_view' ) ) {
				$post_meta[] = 'views';
			}
			if ( get_theme_mod( 'goso_arcf_reading' ) ) {
				$post_meta[] = 'reading';
			}
			$show_formaticon = get_theme_mod( 'goso_grid_icon_format' );
			if ( $featured_posts->have_posts() ) {
				$bg          = 1;
				$thumb_size  = $mthumb_size = 'goso-masonry-thumb';
				$bthumb_size = 'goso-full-thumb';
				$num_posts   = $featured_posts->post_count;
				?>
                <div class="goso-clearfix goso-biggrid-wrapper<?php echo $wrapper_class; ?>">
                    <div class="goso-clearfix goso-biggrid goso-bg<?php echo $biggid_style; ?> goso-bgel">
                        <div class="goso-biggrid-inner">
							<?php
							if ( $flag_style ) {
								echo '<div class="goso-big-grid-ajax-data">';
							}
							echo '<div class="goso-clearfix goso-biggrid-data' . $data_class . '">';
							while ( $featured_posts->have_posts() ) {
								$featured_posts->the_post();

								if ( $bg <= $grid_per_page ) {

									$is_big_item = '';
									$surplus     = goso_big_grid_count_classes( $bg, $biggid_style, true );
									$thumbnail   = $thumb_size;
									if ( ! empty( $big_items ) && in_array( $surplus, $big_items ) ) {
										$thumbnail   = $bthumb_size;
										$is_big_item = ' pcbg-big-item';
									}
									if ( goso_is_mobile() ) {
										$thumbnail = $mthumb_size;
									}
									?>
                                    <div class="goso-bgitem<?php echo $is_big_item . goso_big_grid_count_classes( $bg, $biggid_style ); ?>">
                                        <div class="goso-bgitin">
                                            <div class="goso-bgmain">
                                                <div class="pcbg-thumb">
													<?php
													/* Display Review Piechart  */
													if ( $show_reviewpie && function_exists( 'goso_display_piechart_review_html' ) ) {
														goso_display_piechart_review_html( get_the_ID() );
													}
													?>
													<?php if ( $show_formaticon ): ?>
														<?php if ( has_post_format( 'video' ) ) : ?>
                                                            <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                               aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-play' ); ?></a>
														<?php endif; ?>
														<?php if ( has_post_format( 'gallery' ) ) : ?>
                                                            <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                               aria-label="Icon"><?php goso_fawesome_icon( 'far fa-image' ); ?></a>
														<?php endif; ?>
														<?php if ( has_post_format( 'audio' ) ) : ?>
                                                            <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                               aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-music' ); ?></a>
														<?php endif; ?>
														<?php if ( has_post_format( 'link' ) ) : ?>
                                                            <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                               aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-link' ); ?></a>
														<?php endif; ?>
														<?php if ( has_post_format( 'quote' ) ) : ?>
                                                            <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                               aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-quote-left' ); ?></a>
														<?php endif; ?>
													<?php endif; ?>
                                                    <div class="pcbg-thumbin">
                                                        <a class="pcbg-bgoverlay active-overlay"
                                                           href="<?php the_permalink(); ?>"
                                                           title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
														<?php if ( ! $disable_lazy ) { ?>
                                                            <div class="goso-image-holder goso-lazy"
                                                                 data-bgset="<?php echo goso_get_featured_image_size( get_the_ID(), $thumbnail ); ?>"></div>
														<?php } else { ?>
                                                            <div class="goso-image-holder"
                                                                 style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $thumbnail ); ?>');">
                                                            </div>
														<?php } ?>
                                                    </div>
                                                </div>
                                                <div class="pcbg-content">
                                                    <div class="pcbg-content-flex">
                                                        <a class="pcbg-bgoverlay active-overlay"
                                                           href="<?php the_permalink(); ?>"
                                                           title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
                                                        <div class="pcbg-content-inner bgcontent-block">
                                                            <a href="<?php the_permalink(); ?>"
                                                               title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"
                                                               class="pcbg-bgoverlaytext item-hover"></a>

															<?php if ( in_array( 'cat', $post_meta ) ) : ?>
                                                                <div class="pcbg-above item-hover">
                                                                <span class="cat pcbg-sub-title">
                                                                    <?php goso_category( '', $primary_cat ); ?>
                                                                </span>
                                                                </div>
															<?php endif; ?>

															<?php if ( in_array( 'title', $post_meta ) ) :
															$title_length = get_theme_mod( 'goso_arf_titlength', '' );
															?>
                                                                <div class="pcbg-heading item-hover">
                                                                    <h3 class="pcbg-title">
                                                                        <a href="<?php the_permalink(); ?>">
																			<?php
																				if( ! $title_length ){
																					the_title();
																				} else {
																					echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $title_length, '...' );
																				}
																			?>
                                                                        </a>
                                                                    </h3>
                                                                </div>
															<?php endif; ?>

															<?php if ( count( array_intersect( array(
																	'author',
																	'date',
																	'comment',
																	'views',
																	'reading',
																	'excerpt'
																), $post_meta ) ) > 0 ) { ?>
                                                                <div class="grid-post-box-meta pcbg-meta item-hover">
                                                                    <div class="pcbg-meta-desc">
																		<?php if ( in_array( 'author', $post_meta ) ) : ?>
                                                                            <span class="bg-date-author author-italic author vcard">
                                                                            <?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                                                                        class="url fn n"
                                                                                        href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
                                                                        </span>
																		<?php endif; ?>
																		<?php if ( in_array( 'date', $post_meta ) ) : ?>
                                                                            <span class="bg-date"><?php goso_authow_time_link(); ?></span>
																		<?php endif; ?>
																		<?php if ( in_array( 'comment', $post_meta ) ) : ?>
                                                                            <span class="bg-comment">
                                                                            <a href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a>
                                                                        </span>
																		<?php endif; ?>
																		<?php
																		if ( in_array( 'views', $post_meta ) ) {
																			echo '<span>';
																			echo goso_get_post_views( get_the_ID() );
																			echo ' ' . goso_get_setting( 'goso_trans_countviews' );
																			echo '</span>';
																		}
																		?>
																		<?php
																		$hide_readtime = in_array( 'reading', $post_meta ) ? false : true;
																		if ( goso_isshow_reading_time( $hide_readtime ) ): ?>
                                                                            <span class="bg-readtime"><?php goso_reading_time(); ?></span>
																		<?php endif; ?>
                                                                    </div>
                                                                </div>
															<?php } ?>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
									<?php
								}
								$bg ++;
								/* end loop content*/
							}
							?>
                        </div>
                    </div>
					<?php
					if ( $flag_style ) {
						echo '</div>';
					}
					?>
                </div>
                </div>

				<?php if( get_theme_mod( 'goso_arcf_adbelow' ) ){ ?>
					<div class="container container-arc-banner<?php echo $two_sidebar_class;?>">
					<?php echo goso_render_google_adsense( 'goso_arcf_adbelow' ); ?>
					</div>
				<?php } ?>

				<?php
				wp_reset_postdata();
			}
		}
	}
}

if ( ! function_exists( 'goso_featured_archive_ppl' ) ) {
	function goso_featured_archive_ppl( $biggid_style ) {

		$count = 5;

		if ( in_array( $biggid_style, array(
			'style-3',
			'style-5',
			'style-13',
			'style-17',
			'style-1 goso-grid-col-3'
		) ) ) {
			$count = 3;
		} else if ( in_array( $biggid_style, array(
			'style-7',
			'style-8',
			'style-11',
			'style-12',
			'style-14',
			'style-16',
			'style-18',
			'style-1 goso-grid-col-4'
		) ) ) {
			$count = 4;
		} else if ( in_array( $biggid_style, array( 'style-15' ) ) ) {
			$count = 6;
		} else if ( in_array( $biggid_style, array( 'style-19', 'style-20','style-21','style-22' ) ) ) {
			$count = 7;
		} else if ( $biggid_style == 'style-1 goso-grid-col-2' ) {
			$count = 2;
		}

		return $count;
	}
}

if ( ! function_exists( 'goso_featured_exclude_posts' ) ) {
	function goso_featured_exclude_posts() {
		$goso_featured_layout     = '';
		$goso_cat_featured_layout = get_theme_mod( 'goso_cat_featured_layout', '' );
		$goso_tag_featured_layout = get_theme_mod( 'goso_tag_featured_layout', '' );

		if ( is_category() && $goso_cat_featured_layout ) {
			$goso_featured_layout = $goso_cat_featured_layout;
		}

		if ( is_tag() && $goso_tag_featured_layout ) {
			$goso_featured_layout = $goso_tag_featured_layout;
		}

		return (bool) $goso_featured_layout;
	}
}

function goso_get_query_archive_first_posts_featured() {
	$featured_query            = [];
	$goso_cat_featured_layout = get_theme_mod( 'goso_cat_featured_layout', '' );
	$goso_tag_featured_layout = get_theme_mod( 'goso_tag_featured_layout', '' );


	if ( ( is_category() && $goso_cat_featured_layout ) || ( is_tag() && $goso_tag_featured_layout ) ) {
		$term                             = get_queried_object();
		$goso_featured_layout            = is_category() ? $goso_cat_featured_layout : $goso_tag_featured_layout;
		$featured_query['tax_query']      = array(
			array(
				'taxonomy' => $term->taxonomy,
				'terms'    => $term->term_id,
			),
		);
		$grid_per_page                    = goso_featured_archive_ppl( $goso_featured_layout );
		$featured_query['posts_per_page'] = $grid_per_page;

		$sortby   = get_theme_mod( 'goso_arf_sortby', 'desc' );
		$order_by = get_theme_mod( 'goso_arf_orderby', '' );

		$featured_query['orderby'] = $order_by;
		$featured_query['order']   = $sortby;

		if ( 'popular' == $order_by ) {
			$featured_query['meta_key'] = goso_get_postviews_key();
			$featured_query['orderby']  = 'meta_value_num';
		} elseif ( 'popular7' == $order_by ) {
			$featured_query['meta_key'] = 'goso_post_week_views_count';
			$featured_query['orderby']  = 'meta_value_num';
		} elseif ( 'popular_month' == $order_by ) {
			$featured_query['meta_key'] = 'goso_post_month_views_count';
			$featured_query['orderby']  = 'meta_value_num';
		}
	}

	return $featured_query;
}

if ( ! function_exists( 'goso_featured_exclude_ids' ) ) {
	function goso_featured_exclude_ids(): array {
		$ids  = [];
		$args = goso_get_query_archive_first_posts_featured();

		if ( ! empty( $args ) ) {

			$checkquery_posts = get_posts( $args );
			foreach ( $checkquery_posts as $post ) {
				$ids[] = $post->ID;
			}

		}

		return $ids;
	}
}


if ( ! function_exists( 'goso_featured_exclude_query_posts' ) ) {
	add_action( 'pre_get_posts', 'goso_featured_exclude_query_posts' );
	function goso_featured_exclude_query_posts( $query ) {
		if ( goso_featured_exclude_posts() && ! is_admin() && $query->is_main_query() ) {
			$featured_ids = goso_featured_exclude_ids();
			$query->set( 'post__not_in', $featured_ids );
		}
	}
}

if ( ! function_exists( 'goso_featured_custom_css' ) ) {
	add_action( 'authow_theme/custom_css', 'goso_featured_custom_css' );
	function goso_featured_custom_css() {

		$custom_colors = [
			'goso_arf_t_cl'                    => [
				'color' => '.biggrid-archive-wrapper .pcbg-content-inner .pcbg-title, .biggrid-archive-wrapper .pcbg-content-inner .pcbg-title a',
			],
			'goso_arf_t_hcl'                   => [
				'color' => '.biggrid-archive-wrapper .pcbg-content-inner .pcbg-title:hover, .biggrid-archive-wrapper .pcbg-content-inner .pcbg-title a:hover',
			],
			'goso_arf_meta_cl'                 => [
				'color' => '.biggrid-archive-wrapper .pcbg-meta, .biggrid-archive-wrapper .pcbg-meta span, .biggrid-archive-wrapper .pcbg-meta span a',
			],
			'goso_arf_meta_lcl'                => [
				'color' => '.biggrid-archive-wrapper .pcbg-meta span a',
			],
			'goso_arf_meta_hcl'                => [
				'color' => '.biggrid-archive-wrapper .pcbg-meta span a:hover',
			],
			'goso_arf_cat_cl'                  => [
				'color' => '.biggrid-archive-wrapper .pcbg-content-inner .cat > a.goso-cat-name',
			],
			'goso_arf_cat_hcl'                 => [
				'color' => '.biggrid-archive-wrapper .pcbg-content-inner .cat > a.goso-cat-name:hover',
			],
			'goso_arf_catfs'                    => [
				'font-size' => '.biggrid-archive-wrapper .cat > a.goso-cat-name',
			],
			'goso_arf_t_fs'                    => [
				'font-size' => '.biggrid-archive-wrapper .pcbg-content-inner .pcbg-title, .biggrid-archive-wrapper .pcbg-content-inner .pcbg-title a',
			],
			'goso_arf_t_bfs'                   => [
				'font-size' => '.biggrid-archive-wrapper .goso-biggrid-data.goso-fixh .pcbg-big-item .pcbg-content-inner .pcbg-title, .biggrid-archive-wrapper .goso-biggrid-data.goso-fixh .pcbg-big-item .pcbg-content-inner .pcbg-title a',
			],
			'goso_arf_meta_fs'                 => [
				'font-size' => '.biggrid-archive-wrapper .pcbg-meta, .biggrid-archive-wrapper .pcbg-meta span, .biggrid-archive-wrapper .pcbg-meta span a',
			],
			'goso_arf_gap'                     => [
				'--pcgap' => '.biggrid-archive-wrapper .goso-biggrid',
			],
			'goso_arf_img_ratio'               => [
				'padding-top' => '.biggrid-archive-wrapper .goso-bgitem .goso-image-holder:before',
			],
			'goso_category_featured_img_ratio' => [
				'padding-top' => '.biggrid-category-wrapper .goso-bgitem .goso-image-holder:before',
			],
			'goso_tag_featured_img_ratio'      => [
				'padding-top' => '.biggrid-tag-wrapper .goso-bgitem .goso-image-holder:before',
			],
			'goso_arf_exp_cl'                  => [
				'color' => '.biggrid-archive-wrapper .pcbg-content-inner .pcbg-meta .pcbg-pexcerpt',
			],
			'goso_arf_height'                  => [
				'--bgh' => '.biggrid-archive-wrapper .goso-biggrid .goso-fixh',
			],
			'goso_category_featured_height'    => [
				'--bgh' => '.biggrid-cat-wrapper .goso-biggrid .goso-fixh',
			],
			'goso_tag_featured_height'         => [
				'--bgh' => '.biggrid-tag-wrapper .goso-biggrid .goso-fixh',
			],
		];

		$mobile_css = [
			'goso_arf_mheight'               => [
				'--bgh' => '.biggrid-archive-wrapper .goso-biggrid .goso-fixh',
			],
			'goso_category_featured_mheight' => [
				'--bgh' => '.biggrid-cat-wrapper .goso-biggrid .goso-fixh',
			],
			'goso_tag_featured_mheight'      => [
				'--bgh' => '.biggrid-tag-wrapper .goso-biggrid .goso-fixh',
			],
			'goso_arf_t_mfs'                 => [
				'font-size' => '.biggrid-archive-wrapper .goso-bgrid-content-on .pcbg-content-inner .pcbg-title, .biggrid-archive-wrapper .goso-bgrid-content-on .pcbg-content-inner .pcbg-title a',
			],
			'goso_arf_t_bmfs'                => [
				'font-size' => '.biggrid-archive-wrapper .goso-biggrid-data.goso-fixh .pcbg-big-item .pcbg-content-inner .pcbg-title, .biggrid-archive-wrapper .goso-biggrid-data.goso-fixh .pcbg-big-item .pcbg-content-inner .pcbg-title a',
			],
		];

		$tablet_css = [
			'goso_arf_theight'          => [
				'--bgh' => '.biggrid-archive-wrapper .goso-biggrid .goso-fixh',
			],
			'goso_cat_featured_theight' => [
				'--bgh' => '.biggrid-cat-wrapper .goso-biggrid .goso-fixh',
			],
			'goso_tag_featured_theight' => [
				'--bgh' => '.biggrid-tag-wrapper .goso-biggrid .goso-fixh',
			],
		];

		goso_featured_render_css( $custom_colors );
		goso_featured_render_css( $mobile_css, 'mobile' );
		goso_featured_render_css( $tablet_css, 'tablet' );

		$gap_size = get_theme_mod( 'goso_arf_gap' );
		if ( $gap_size ) {
			echo '.biggrid-archive-wrapper .goso-bgstyle-1 .goso-dflex{';
			echo 'margin-left: calc(-' . $gap_size . 'px/2); margin-right: calc(-' . $gap_size . 'px/2); width: calc(100% + ' . $gap_size . 'px);';
			echo '}';
			echo '.biggrid-archive-wrapper .goso-bgstyle-1 .goso-bgitem{';
			echo 'padding-left: calc(' . $gap_size . 'px/2); padding-right: calc(' . $gap_size . 'px/2); margin-bottom: ' . $gap_size . 'px';
			echo '}';
		}
	}
}

if ( ! function_exists( 'goso_featured_render_css' ) ) {
	function goso_featured_render_css( $custom_colors, $mobile = false ) {

		$before = $after = '';

		if ( 'mobile' == $mobile ) {
			$before = '@media only screen and (max-width: 767px){';
			$after  = '}';
		}

		if ( 'tablet' == $mobile ) {
			$before = '@media only screen and (min-width: 768px) and (max-width: 1169px){';
			$after  = '}';
		}

		foreach ( $custom_colors as $option => $rules ) {
			$value  = get_theme_mod( $option );
			$prefix = is_numeric( $value ) ? 'px' : '';
			$prefix = strpos( $option, 'img_ratio' ) !== false ? '%' : $prefix;
			if ( $value ) {
				foreach ( $rules as $prop => $selector ) {
					echo $before . $selector . '{' . $prop . ':' . $value . $prefix . ';}' . $after;
				}
			}
		}
	}
}

if ( ! function_exists( 'goso_featured_title_check' ) ) {
	function goso_featured_title_check() {
		$category     = get_queried_object();
		$featured_ids = count( goso_featured_exclude_ids() );

		return $featured_ids == $category->count;
	}
}
