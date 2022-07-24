<?php
/**
 * Lastest post widget
 * Get recent posts and display in widget
 *
 * @package Wordpress
 * @since 1.0
 */

add_action( 'widgets_init', 'penci_latest_news_load_widget' );

function penci_latest_news_load_widget() {
	register_widget( 'penci_latest_news_widget' );
}

if ( ! class_exists( 'penci_latest_news_widget' ) ) {
	class penci_latest_news_widget extends WP_Widget {

		/**
		 * Widget setup.
		 */
		function __construct() {
			/* Widget settings. */
			$widget_ops = array(
				'classname'   => 'penci_latest_news_widget',
				'description' => esc_html__( 'A widget that displays your recent posts from all categories or a category', 'authow' )
			);

			/* Widget control settings. */
			$control_ops = array( 'id_base' => 'penci_latest_news_widget' );

			/* Create the widget. */
			global $wp_version;
			if ( 4.3 > $wp_version ) {
				$this->WP_Widget( 'penci_latest_news_widget', penci_get_theme_name('.Authow',true).esc_html__( 'Recent Posts', 'authow' ), $widget_ops, $control_ops );
			} else {
				parent::__construct( 'penci_latest_news_widget', penci_get_theme_name('.Authow',true).esc_html__( 'Recent Posts', 'authow' ), $widget_ops, $control_ops );
			}
		}

		/**
		 * How to display the widget on the screen.
		 */
		function widget( $args, $instance ) {
			extract( $args );

			/* Our variables from the widget settings. */
			$title      = isset( $instance['title'] ) ? $instance['title'] : '';
			$title      = apply_filters( 'widget_title', $title );
			$categories = isset( $instance['categories'] ) ? $instance['categories'] : '';
			$orderby    = isset( $instance['orderby'] ) ? $instance['orderby'] : 'date';
			$order      = isset( $instance['order'] ) ? $instance['order'] : 'DESC';
			$number     = isset( $instance['number'] ) ? $instance['number'] : '';
			$offset     = isset( $instance['offset'] ) ? $instance['offset'] : '';
			$ptype      = isset( $instance['ptype'] ) ? $instance['ptype'] : '';
			if ( ! $ptype ): $ptype = 'post'; endif;
			$taxonomy     = isset( $instance['taxonomy'] ) ? $instance['taxonomy'] : '';
			$tax_ids      = isset( $instance['tax_ids'] ) ? $instance['tax_ids'] : 'tax_ids';
			$sticky       = isset( $instance['sticky'] ) ? $instance['sticky'] : true;
			$sticky_value = ( false == $sticky ) ? 0 : 1;
			$title_length = isset( $instance['title_length'] ) ? $instance['title_length'] : '';
			$dotstyle = isset( $instance['dotstyle'] ) ? $instance['dotstyle'] : '';
			$movemeta     = isset( $instance['movemeta'] ) ? $instance['movemeta'] : false;
			$featured     = isset( $instance['featured'] ) ? $instance['featured'] : false;
			$twocolumn    = isset( $instance['twocolumn'] ) ? $instance['twocolumn'] : false;
			$featured2    = isset( $instance['featured2'] ) ? $instance['featured2'] : false;
			$allfeatured  = isset( $instance['allfeatured'] ) ? $instance['allfeatured'] : false;
			$thumbright   = isset( $instance['thumbright'] ) ? $instance['thumbright'] : false;
			$postdate     = isset( $instance['postdate'] ) ? $instance['postdate'] : false;
			$icon         = isset( $instance['icon'] ) ? $instance['icon'] : false;
			$image_type   = isset( $instance['image_type'] ) ? $instance['image_type'] : 'default';
			$ptfsfe       = isset( $instance['ptfsfe'] ) ? absint( $instance['ptfsfe'] ) : '';
			$ptfs         = isset( $instance['ptfs'] ) ? absint( $instance['ptfs'] ) : '';
			$pmfs         = isset( $instance['pmfs'] ) ? absint( $instance['pmfs'] ) : '';
			$row_gap      = isset( $instance['row_gap'] ) ? absint( $instance['row_gap'] ) : '';
			$imgwidth     = isset( $instance['imgwidth'] ) ? absint( $instance['imgwidth'] ) : '';
			$hide_thumb   = isset( $instance['hide_thumb'] ) ? $instance['hide_thumb'] : false;
			$showauthor   = isset( $instance['show_author'] ) ? $instance['show_author'] : false;
			$showcomment  = isset( $instance['show_comment'] ) ? $instance['show_comment'] : false;
			$showviews    = isset( $instance['show_postviews'] ) ? $instance['show_postviews'] : false;
			$ordernum     = isset( $instance['ordernum'] ) ? $instance['ordernum'] : false;
			$showborder   = isset( $instance['showborder'] ) ? $instance['showborder'] : false;
			$cats_id      = ! empty( $instance['cats_id'] ) ? explode( ',', $instance['cats_id'] ) : array();
			$tags_id      = ! empty( $instance['tags_id'] ) ? explode( ',', $instance['tags_id'] ) : array();

			$query = array(
				'posts_per_page'      => $number,
				'post_type'           => $ptype,
				'ignore_sticky_posts' => $sticky_value
			);

			if ( 'post' == $ptype ) {
				if ( isset( $instance['cats_id'] ) ) {
					if ( ! empty( $cats_id ) && ! in_array( 'all', $cats_id ) ) {
						$query['tax_query'][] = [
							'taxonomy' => 'category',
							'field'    => 'term_id',
							'terms'    => $cats_id,
						];
					}
				} else {
					$term_name = get_cat_name( $categories );
					$term      = term_exists( $term_name, 'category' );

					if ( $term !== 0 && $term !== null ) {
						$query['cat'] = $categories;
					}
				}

				if ( ! empty( $tags_id ) ) {
					if ( ! in_array( 'all', $tags_id ) ) {
						$query['tax_query'][] = [
							'taxonomy' => 'post_tag',
							'field'    => 'term_id',
							'terms'    => $tags_id,
						];
					}
				}
			}

			if ( $orderby ) {
				$query['orderby'] = $orderby;
			}
			if ( $order ) {
				$query['order'] = $order;
			}
			if ( $offset ) {
				$query['offset'] = $offset;
			}

			if ( $taxonomy && ( 'post' != $ptype ) ) {
				$taxonomy  = str_replace( ' ', '', $taxonomy );
				$tax_array = explode( ',', $taxonomy );

				foreach ( $tax_array as $tax ) {
					$tax_ids_array = array();
					if ( $tax_ids ) {
						$tax_ids       = str_replace( ' ', '', $tax_ids );
						$tax_ids_array = explode( ',', $tax_ids );
					} else {
						$get_all_terms = get_terms( $tax );
						if ( ! empty( $get_all_terms ) ) {
							foreach ( $get_all_terms as $term ) {
								$tax_ids_array[] = $term->term_id;
							}
						}
					}

					if ( ! empty( $tax_ids_array ) ) {
						$query['tax_query'][] = array(
							'taxonomy' => $tax,
							'field'    => 'term_id',
							'terms'    => $tax_ids_array
						);
					}
				}
			}

			$loop = new WP_Query( $query );
			if ( $loop->have_posts() ) :

				/* Before widget (defined by themes). */
				echo ent2ncr( $before_widget );

				/* Display the widget title if one was input (before and after defined by themes). */
				if ( $title ) {
					echo ent2ncr( $before_title ) . $title . ent2ncr( $after_title );
				}

				$rand = rand( 1000, 10000 );
				?>
                <ul id="penci-latestwg-<?php echo sanitize_text_field( $rand ); ?>" class="side-newsfeed<?php if ( $twocolumn && ! $allfeatured ): echo ' penci-feed-2columns'; if ( $featured ) { echo ' penci-2columns-featured'; } else { echo ' penci-2columns-feed'; } endif; if ( $showborder ) { echo ' penci-rcpw-hborders'; } if ( $dotstyle ) { echo ' pctlst pctl-' . $dotstyle; } ?>">
					<?php $num = 1;
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <li class="penci-feed<?php if ( ( ( $num == 1 ) && $featured ) || $allfeatured ): echo ' featured-news';
							if ( $featured2 ): echo ' featured-news2'; endif; endif; ?><?php if ( $allfeatured ): echo ' all-featured-news'; endif; ?>">
							<?php if ( $ordernum && has_post_thumbnail() && ! $hide_thumb ): ?>
                                <span class="order-border-number<?php if ( $thumbright && ! $twocolumn ): echo ' right-side'; endif; ?>">
									<span class="number-post"><?php echo sanitize_text_field( $num ); ?></span>
								</span>
							<?php endif; ?>
                            <div class="side-item">				
								<?php if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) && ! $hide_thumb ) : ?>
                                    <div class="side-image<?php if ( $thumbright ): echo ' thumbnail-right'; endif; ?>">
										<?php
										/* Display Review Piechart  */
										if ( function_exists( 'penci_display_piechart_review_html' ) ) {
											$size_pie = 'small';
											if ( ( ( $num == 1 ) && $featured ) || $allfeatured ): $size_pie = 'normal'; endif;
											penci_display_piechart_review_html( get_the_ID(), $size_pie );
										}
										$thumb = penci_featured_images_size( 'small' );
										if ( ( ( $num == 1 ) && $featured ) || $allfeatured ): $thumb = penci_featured_images_size(); endif;
										if ( $image_type == 'horizontal' ) {
											$thumb = 'penci-thumb-small';
											if ( ( ( $num == 1 ) && $featured ) || $allfeatured ): $thumb = 'penci-thumb'; endif;
										} elseif ( $image_type == 'square' ) {
											$thumb = 'penci-thumb-square';
										} elseif ( $image_type == 'vertical' ) {
											$thumb = 'penci-thumb-vertical';
										}
										?>
										<?php if ( ! get_theme_mod( 'penci_disable_lazyload_layout' ) ) { ?>
                                            <a class="penci-image-holder penci-lazy<?php if ( ( ( $num == 1 ) && $featured ) || $allfeatured ) {
												echo '';
											} else {
												echo ' small-fix-size';
											} ?>" rel="bookmark"
                                               data-bgset="<?php echo penci_image_srcset( get_the_ID(),$thumb ); ?>"
                                               href="<?php the_permalink(); ?>"
                                               title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
										<?php } else { ?>
                                            <a class="penci-image-holder<?php if ( ( ( $num == 1 ) && $featured ) || $allfeatured ) {
												echo '';
											} else {
												echo ' small-fix-size';
											} ?>" rel="bookmark"
                                               style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), $thumb ); ?>');"
                                               href="<?php the_permalink(); ?>"
                                               title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
										<?php } ?>

										<?php if ( $icon ): ?>
											<?php if ( has_post_format( 'video' ) ) : ?>
                                                <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                   aria-label="Icon"><?php penci_fawesome_icon( 'fas fa-play' ); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'audio' ) ) : ?>
                                                <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                   aria-label="Icon"><?php penci_fawesome_icon( 'fas fa-music' ); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'link' ) ) : ?>
                                                <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                   aria-label="Icon"><?php penci_fawesome_icon( 'fas fa-link' ); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'quote' ) ) : ?>
                                                <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                   aria-label="Icon"><?php penci_fawesome_icon( 'fas fa-quote-left' ); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'gallery' ) ) : ?>
                                                <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                   aria-label="Icon"><?php penci_fawesome_icon( 'far fa-image' ); ?></a>
											<?php endif; ?>
										<?php endif; ?>
                                    </div>
								<?php endif; ?>
                                <div class="side-item-text">
									<?php if ( $movemeta && ( ! $postdate || $showauthor || $showcomment || $showviews ) ): ?>
                                        <div class="grid-post-box-meta penci-side-item-meta pcsnmt-above">
											<?php if ( $showauthor ): ?>
                                                <span class="side-item-meta side-wauthor"><?php echo penci_get_setting( 'penci_trans_by' ); ?> <a
                                                            class="url fn n"
                                                            href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
											<?php endif; ?>
											<?php if ( ! $postdate ): ?>
                                                <span class="side-item-meta side-wdate"><?php penci_authow_time_link(); ?></span>
											<?php endif; ?>
											<?php if ( $showcomment ): ?>
                                                <span class="side-item-meta side-wcomments"><a
                                                            href="<?php comments_link(); ?> "><?php comments_number( '0 ' . penci_get_setting( 'penci_trans_comment' ), '1 ' . penci_get_setting( 'penci_trans_comment' ), '% ' . penci_get_setting( 'penci_trans_comments' ) ); ?></a></span>
											<?php endif; ?>
											<?php if ( $showviews ): ?>
                                                <span class="side-item-meta side-wviews"><?php echo penci_get_post_views( get_the_ID() ) . ' ' . penci_get_setting( 'penci_trans_countviews' ); ?></span>
											<?php endif; ?>
                                        </div>
									<?php endif; ?>
									
                                    <h4 class="side-title-post">
                                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
											<?php
											if ( ! $title_length || ! is_numeric( $title_length ) ) {
												if ( $featured2 && ( ( ( $num == 1 ) && $featured ) || $allfeatured ) ) {
													echo wp_trim_words( wp_strip_all_tags( get_the_title() ), 12, '...' );
												} else {
													the_title();
												}
											} else {
												echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $title_length, '...' );
											}
											?>
                                        </a>
                                    </h4>
									<?php if ( ! $movemeta && ( ! $postdate || $showauthor || $showcomment || $showviews ) ): ?>
                                        <div class="grid-post-box-meta penci-side-item-meta pcsnmt-below">
											<?php if ( $showauthor ): ?>
                                                <span class="side-item-meta side-wauthor"><?php echo penci_get_setting( 'penci_trans_by' ); ?> <a
                                                            class="url fn n"
                                                            href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
											<?php endif; ?>
											<?php if ( ! $postdate ): ?>
                                                <span class="side-item-meta side-wdate"><?php penci_authow_time_link(); ?></span>
											<?php endif; ?>
											<?php if ( $showcomment ): ?>
                                                <span class="side-item-meta side-wcomments"><a
                                                            href="<?php comments_link(); ?> "><?php comments_number( '0 ' . penci_get_setting( 'penci_trans_comment' ), '1 ' . penci_get_setting( 'penci_trans_comment' ), '% ' . penci_get_setting( 'penci_trans_comments' ) ); ?></a></span>
											<?php endif; ?>
											<?php if ( $showviews ): ?>
                                                <span class="side-item-meta side-wviews"><?php echo penci_get_post_views( get_the_ID() ) . ' ' . penci_get_setting( 'penci_trans_countviews' ); ?></span>
											<?php endif; ?>
                                        </div>
									<?php endif; ?>
                                </div>
                            </div>
                        </li>
						<?php $num ++; endwhile; ?>
                </ul>
				<?php
				$attrstyle = '';
				if ( $ptfsfe ) {
					$attrstyle .= '.widget ul#penci-latestwg-' . $rand . ' li.featured-news .side-item .side-item-text h4 a{ font-size: ' . $ptfsfe . 'px; }';
				}
				if ( $ptfs ) {
					$attrstyle .= '.widget ul#penci-latestwg-' . $rand . ' li:not(.featured-news) .side-item .side-item-text h4 a{ font-size: ' . $ptfs . 'px; }';
				}
				if ( $pmfs ) {
					$attrstyle .= '.widget ul#penci-latestwg-' . $rand . ' li .side-item .side-item-text .side-item-meta{ font-size: ' . $pmfs . 'px; }';
				}
				if ( $imgwidth ) {
					$attrstyle .= '.widget ul#penci-latestwg-' . $rand . ' li .penci-image-holder.small-fix-size{ width: ' . $imgwidth . 'px; }';
				}
				if ( $row_gap ) {
					$attrstyle .= '.widget ul#penci-latestwg-' . $rand . '.side-newsfeed:not(.penci-feed-2columns) li{ margin-bottom: ' . $row_gap . 'px; padding-bottom: ' . $row_gap . 'px; }';
					$attrstyle .= '.widget ul#penci-latestwg-' . $rand . '.penci-feed-2columns li{ margin-bottom: ' . $row_gap . 'px; }';
				}
				if ( $image_type == 'horizontal' ) {
					$attrstyle .= '#penci-latestwg-' . $rand . ' .penci-image-holder:before{ padding-top: 66.6667%; }';
				} elseif ( $image_type == 'square' ) {
					$attrstyle .= '#penci-latestwg-' . $rand . ' .penci-image-holder:before{ padding-top: 100%; }';
				} elseif ( $image_type == 'vertical' ) {
					$attrstyle .= '#penci-latestwg-' . $rand . ' .penci-image-holder:before{ padding-top: 135.4%; }';
				}

				if ( $attrstyle ) {
					echo '<style type="text/css">' . $attrstyle . '</style>';
				}

				/* After widget (defined by themes). */
				echo ent2ncr( $after_widget );

				wp_reset_postdata();
			endif;
		}

		/**
		 * Update the widget settings.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$data_instance = $this->authow_widget_defaults();

			foreach ( $data_instance as $data => $value ) {
				$instance[ $data ] = ! empty( $new_instance[ $data ] ) ? $new_instance[ $data ] : '';
			}

			if ( ! empty( $new_instance['cats_id'] ) ) {
				if ( is_array( $new_instance['cats_id'] ) ) {
					$instance['cats_id'] = implode( ',', $new_instance['cats_id'] );
				} else {
					$instance['cats_id'] = esc_sql( $new_instance['cats_id'] );
				}
			} else {
				$instance['cats_id'] = false;
			}

			if ( ! empty( $new_instance['tags_id'] ) ) {
				if ( is_array( $new_instance['tags_id'] ) ) {
					$instance['tags_id'] = implode( ',', $new_instance['tags_id'] );
				} else {
					$instance['tags_id'] = esc_sql( $new_instance['tags_id'] );
				}
			} else {
				$instance['tags_id'] = false;
			}

			return $instance;
		}

		public function authow_widget_defaults() {
			$defaults = array(
				'title'          => esc_html__( 'Recent Posts', 'authow' ),
				'hide_thumb'     => false,
				'movemeta'     => false,
				'ptype'          => '',
				'taxonomy'       => '',
				'tax_ids'        => '',
				'dotstyle'        => '',
				'sticky'         => true,
				'show_author'    => false,
				'show_comment'   => false,
				'show_postviews' => false,
				'ordernum'       => false,
				'showborder'     => false,
				'row_gap'        => '',
				'imgwidth'       => '',
				'ptfsfe'         => '',
				'ptfs'           => '',
				'orderby'        => 'date',
				'order'          => 'DESC',
				'pmfs'           => '',
				'image_type'     => 'default',
				'title_length'   => '',
				'number'         => 5,
				'offset'         => '',
				'categories'     => '',
				'featured'       => false,
				'allfeatured'    => false,
				'thumbright'     => false,
				'twocolumn'      => false,
				'featured2'      => false,
				'postdate'       => false,
				'icon'           => false
			);

			return $defaults;
		}

		function form( $instance ) {

			/* Set up some default widget settings. */
			$defaults = $this->authow_widget_defaults();

			$cats_id = array();
			$tags_id = array();

			if ( isset( $instance['cats_id'] ) && ! empty( $instance['cats_id'] ) ) {
				$cats_id = explode( ',', $instance['cats_id'] );
			}
			if ( isset( $instance['tags_id'] ) && ! empty( $instance['tags_id'] ) ) {
				$tags_id = explode( ',', $instance['tags_id'] );
			}

			$instance = wp_parse_args( (array) $instance, $defaults );

			$instance_title = $instance['title'] ? str_replace( '"', '&quot;', $instance['title'] ) : '';
			?>
            <style>span.description {
                    font-style: italic;
                    font-size: 13px;
                }</style>
            <!-- Widget Title: Text Input -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'authow' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                       value="<?php echo $instance_title; ?>"/>
            </p>

            <!-- Category -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'cats_id' ) ); ?>"><?php esc_html_e( 'Include Categories:', 'authow' ); ?></label>
                <select multiple="multiple" id="<?php echo esc_attr( $this->get_field_id( 'cats_id' ) ); ?>[]"
                        name="<?php echo esc_attr( $this->get_field_name( 'cats_id' ) ); ?>[]"
                        class="widefat categories" style="width:100%; height: 125px;">
                    <option value='all' <?php if ( in_array( 'all', $cats_id ) ) {
						echo 'selected="selected"';
					} ?>><?php esc_html_e( 'All categories', 'authow' ); ?></option>
					<?php $categories = get_categories( 'hide_empty=0&depth=1&type=post' ); ?>
					<?php foreach ( $categories as $category ) { ?>
                        <option value='<?php echo esc_attr( $category->term_id ); ?>' <?php if ( in_array( $category->term_id, $cats_id ) ) {
							echo 'selected="selected"';
						} ?>><?php echo sanitize_text_field( $category->name ); ?></option>
					<?php } ?>
                </select>
                <span class="description"><?php _e( 'Hold the "Ctrl" on the keyboard and click to select/un-select multiple categories.', 'authow' ); ?></span>
            </p>

            <!-- Tags -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'tags_id' ) ); ?>"><?php esc_html_e( 'Include Tags:', 'authow' ); ?></label>
                <select multiple="multiple" id="<?php echo esc_attr( $this->get_field_id( 'tags_id' ) ); ?>[]"
                        name="<?php echo esc_attr( $this->get_field_name( 'tags_id' ) ); ?>[]"
                        class="widefat categories" style="width:100%; height: 125px;">
                    <option value='all' <?php if ( in_array( 'all', $tags_id ) ) {
						echo 'selected="selected"';
					} ?>><?php esc_html_e( 'All tags', 'authow' ); ?></option>
					<?php $tags = get_tags( 'hide_empty=0&depth=1&type=post' ); ?>
					<?php foreach ( $tags as $tag ) { ?>
                        <option value='<?php echo esc_attr( $tag->term_id ); ?>' <?php if ( in_array( $tag->term_id, $tags_id ) ) {
							echo 'selected="selected"';
						} ?>><?php echo sanitize_text_field( $tag->name ); ?></option>
					<?php } ?>
                </select>
                <span class="description"><?php _e( 'Hold the "Ctrl" on the keyboard and click to select/un-select multiple tags.', 'authow' ); ?></span>
            </p>

            <!-- Custom Post Type -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'ptype' ) ); ?>"><?php esc_html_e( 'Query for Custom Post Type:', 'authow' ); ?></label>
                <select id="<?php echo esc_attr( $this->get_field_id( 'ptype' ) ); ?>"
                        name="<?php echo esc_attr( $this->get_field_name( 'ptype' ) ); ?>" class="widefat categories"
                        style="width:100%;">
                    <option value='' <?php if ( '' == $instance['ptype'] ) {
						echo 'selected="selected"';
					} ?>><?php esc_html_e( '- Default( Posts ) -', 'authow' ); ?></option>
					<?php $all_post_types = get_post_types( array(
						'public'            => true,
						'show_in_nav_menus' => true
					), 'objects' );
					unset( $all_post_types['post'] );
					if ( ! empty( $all_post_types ) ) {
						foreach ( $all_post_types as $p_type => $ptobject ) {
							?>
                            <option value='<?php echo esc_attr( $p_type ); ?>' <?php if ( $p_type == $instance['ptype'] ) {
								echo 'selected="selected"';
							} ?>><?php echo $ptobject->label; ?></option>
						<?php }
					}
					?>
                </select>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'taxonomy' ) ); ?>"><?php esc_html_e( 'Custom taxonomies to query:', 'authow' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'taxonomy' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'taxonomy' ) ); ?>"
                       value="<?php echo esc_attr( $instance['taxonomy'] ); ?>" size="3"/>
                <span class="description"><?php _e( 'Fill taxonomy slug(s) here. Separate by commas to query multiple taxonomies. Check <a href="https://imgresources.s3.amazonaws.com/custom-taxonomy.png" style="color: #007cba;" target="_blank">this image</a> for understand more.', 'authow' ); ?></span>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'tax_ids' ) ); ?>"><?php esc_html_e( 'Taxonomy IDs to query:', 'authow' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tax_ids' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'tax_ids' ) ); ?>"
                       value="<?php echo esc_attr( $instance['tax_ids'] ); ?>" size="3"/>
                <span class="description"><?php _e( 'Fill taxonomy ID(s) here. Separate by commas to query multiple taxonomies. Check <a href="https://imgresources.s3.amazonaws.com/custom-taxonomy.png" style="color: #007cba;" target="_blank">this image</a> for understand more.', 'authow' ); ?></span>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'sticky' ) ); ?>"><?php esc_html_e( 'Ignore Sticky Posts?:', 'authow' ); ?></label>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'sticky' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'sticky' ) ); ?>" <?php checked( (bool) $instance['sticky'], true ); ?> /><br>
                <span class="description"><?php _e( 'Note that: Ignore sticky posts doesn\'t work if you filter your posts by a taxonomy or multiple taxonomies (categories, tags... ) - because it doesn\'t support by WordPress itself.', 'authow' ); ?></span>
            </p>

            <!-- Image Size -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'image_type' ) ); ?>"><?php esc_html_e( 'Featured Images Type:', 'authow' ); ?></label>
                <select id="<?php echo esc_attr( $this->get_field_id( 'image_type' ) ); ?>"
                        name="<?php echo esc_attr( $this->get_field_name( 'image_type' ) ); ?>"
                        class="widefat image_type" style="width:100%;">
                    <option value='default' <?php if ( 'default' == $instance['image_type'] ) {
						echo 'selected="selected"';
					} ?>><?php esc_html_e( 'Default ( follow on Customize )', 'authow' ); ?></option>
                    <option value='horizontal' <?php if ( 'horizontal' == $instance['image_type'] ) {
						echo 'selected="selected"';
					} ?>><?php esc_html_e( 'Horizontal Size', 'authow' ); ?></option>
                    <option value='square' <?php if ( 'square' == $instance['image_type'] ) {
						echo 'selected="selected"';
					} ?>><?php esc_html_e( 'Square Size', 'authow' ); ?></option>
                    <option value='vertical' <?php if ( 'vertical' == $instance['image_type'] ) {
						echo 'selected="selected"';
					} ?>><?php esc_html_e( 'Vertical Size', 'authow' ); ?></option>
                </select>
            </p>

            <!-- Order by -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php esc_html_e( 'Order By:', 'authow' ); ?></label>
                <select id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"
                        name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" class="widefat orderby"
                        style="width:100%;">
                    <option value='date' <?php if ( 'date' == $instance['orderby'] ) {
						echo 'selected="selected"';
					} ?>><?php esc_html_e( 'Published Date', 'authow' ); ?></option>
                    <option value='ID' <?php if ( 'ID' == $instance['orderby'] ) {
						echo 'selected="selected"';
					} ?>><?php esc_html_e( 'Posts ID', 'authow' ); ?></option>
                    <option value='title' <?php if ( 'title' == $instance['orderby'] ) {
						echo 'selected="selected"';
					} ?>><?php esc_html_e( 'Posts Titles', 'authow' ); ?></option>
                    <option value='modified' <?php if ( 'modified' == $instance['orderby'] ) {
						echo 'selected="selected"';
					} ?>><?php esc_html_e( 'Modified Date', 'authow' ); ?></option>
                    <option value='comment_count' <?php if ( 'comment_count' == $instance['orderby'] ) {
						echo 'selected="selected"';
					} ?>><?php esc_html_e( 'Comment Count', 'authow' ); ?></option>
                    <option value='rand' <?php if ( 'rand' == $instance['orderby'] ) {
						echo 'selected="selected"';
					} ?>><?php esc_html_e( 'Random', 'authow' ); ?></option>
                </select>
            </p>

            <!-- Order -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"><?php esc_html_e( 'Select Order Type:', 'authow' ); ?></label>
                <select id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"
                        name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" class="widefat orderby"
                        style="width:100%;">
                    <option value='DESC' <?php if ( 'DESC' == $instance['order'] ) {
						echo 'selected="selected"';
					} ?>><?php esc_html_e( 'DESC ( Descending Order )', 'authow' ); ?></option>
                    <option value='ASC' <?php if ( 'ASC' == $instance['order'] ) {
						echo 'selected="selected"';
					} ?>><?php esc_html_e( 'ASC ( Ascending Order )', 'authow' ); ?></option>
                </select>
            </p>

            <!-- Number of posts -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'authow' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>"
                       value="<?php echo esc_attr( $instance['number'] ); ?>" size="3"/>
            </p>

            <!-- Offset of posts -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Number of offset Posts:', 'authow' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>"
                       value="<?php echo esc_attr( $instance['offset'] ); ?>" size="3"/>
            </p>

            <!-- Custom trim post titles -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title_length' ) ); ?>"><?php esc_html_e( 'Custom words length for post titles:', 'authow' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_length' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'title_length' ) ); ?>"
                       value="<?php echo esc_attr( $instance['title_length'] ); ?>" size="3"/>
                <span class="description" style="display: block; padding: 0;font-size: 12px;">If your post titles is too long - You can use this option for trim it. Fill number value here.</span>
            </p>
			
			<!-- Timeline dots style -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'dotstyle' ) ); ?>"><?php esc_html_e( 'Show Timeline Dots?', 'authow' ); ?></label>
                <select id="<?php echo esc_attr( $this->get_field_id( 'dotstyle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dotstyle' ) ); ?>" class="widefat orderby" style="width:100%;">
                    <option value='' <?php if ( '' == $instance['dotstyle'] ) { echo 'selected="selected"'; } ?>><?php esc_html_e( "Don't Show", 'authow' ); ?></option>
                    <option value='s1' <?php if ( 's1' == $instance['dotstyle'] ) { echo 'selected="selected"'; } ?>><?php esc_html_e( 'Show with Color Style', 'authow' ); ?></option>
                    <option value='s2' <?php if ( 's2' == $instance['dotstyle'] ) { echo 'selected="selected"'; } ?>><?php esc_html_e( 'Show with Hover Style', 'authow' ); ?></option>
                    <option value='s3' <?php if ( 's3' == $instance['dotstyle'] ) { echo 'selected="selected"'; } ?>><?php esc_html_e( 'Show with Animation Style', 'authow' ); ?></option>
                </select>
            </p>
			
			<!-- Move post meta -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'movemeta' ) ); ?>"><?php esc_html_e( 'Move post meta to display above post title?', 'authow' ); ?></label>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'movemeta' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'movemeta' ) ); ?>" <?php checked( (bool) $instance['movemeta'], true ); ?> />
            </p>

            <!-- Display thumbnail right -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'hide_thumb' ) ); ?>"><?php esc_html_e( 'Hide thumbnail(Featured Image)?', 'authow' ); ?></label>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'hide_thumb' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'hide_thumb' ) ); ?>" <?php checked( (bool) $instance['hide_thumb'], true ); ?> />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'thumbright' ) ); ?>"><?php esc_html_e( 'Display thumbnail on right?:', 'authow' ); ?></label>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'thumbright' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'thumbright' ) ); ?>" <?php checked( (bool) $instance['thumbright'], true ); ?> />
            </p>

            <!-- 2 Columns -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'twocolumn' ) ); ?>"><?php esc_html_e( 'Display on 2 columns?:', 'authow' ); ?></label>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'twocolumn' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'twocolumn' ) ); ?>" <?php checked( (bool) $instance['twocolumn'], true ); ?> />
                <span class="description" style="display: block; padding: 0;font-size: 12px;">If you use 2 columns option, it will ignore option display thumbnail on right.</span>
            </p>

            <!-- Display latest post featured -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'featured' ) ); ?>"><?php esc_html_e( 'Display 1st post featured?:', 'authow' ); ?></label>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'featured' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'featured' ) ); ?>" <?php checked( (bool) $instance['featured'], true ); ?> />
            </p>

            <!-- Display latest post featured style 2 -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'featured2' ) ); ?>"><?php esc_html_e( 'Display featured post style 2?:', 'authow' ); ?></label>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'featured2' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'featured2' ) ); ?>" <?php checked( (bool) $instance['featured2'], true ); ?> />
            </p>

            <!-- Display big post -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'allfeatured' ) ); ?>"><?php esc_html_e( 'Display all post featured?:', 'authow' ); ?></label>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'allfeatured' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'allfeatured' ) ); ?>" <?php checked( (bool) $instance['allfeatured'], true ); ?> />
                <span class="description" style="display: block; padding: 0;font-size: 12px;">If you use all post featured option, it will ignore option display thumbnail on right & 2 columns.</span>
            </p>

            <!-- Post Meta -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_author' ) ); ?>"><?php esc_html_e( 'Show Author Name?:', 'authow' ); ?></label>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_author' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'show_author' ) ); ?>" <?php checked( (bool) $instance['show_author'], true ); ?> />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'postdate' ) ); ?>"><?php esc_html_e( 'Hide post date?:', 'authow' ); ?></label>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'postdate' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'postdate' ) ); ?>" <?php checked( (bool) $instance['postdate'], true ); ?> />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_comment' ) ); ?>"><?php esc_html_e( 'Show Comment Count?:', 'authow' ); ?></label>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_comment' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'show_comment' ) ); ?>" <?php checked( (bool) $instance['show_comment'], true ); ?> />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_postviews' ) ); ?>"><?php esc_html_e( 'Show Post Views?:', 'authow' ); ?></label>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_postviews' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'show_postviews' ) ); ?>" <?php checked( (bool) $instance['show_postviews'], true ); ?> />
            </p>

            <!-- Enable post format icon -->
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>"><?php esc_html_e( 'Show icon post format?:', 'authow' ); ?></label>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'icon' ) ); ?>" <?php checked( (bool) $instance['icon'], true ); ?> />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'ordernum' ) ); ?>"><?php esc_html_e( 'Show the order numbers?:', 'authow' ); ?></label>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'ordernum' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'ordernum' ) ); ?>" <?php checked( (bool) $instance['ordernum'], true ); ?> />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'showborder' ) ); ?>"><?php esc_html_e( 'Remove Border at The Bottom?:', 'authow' ); ?></label>
                <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'showborder' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'showborder' ) ); ?>" <?php checked( (bool) $instance['showborder'], true ); ?> />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'row_gap' ) ); ?>"><?php esc_html_e( 'Rows Gap Between Post Items ( Default: 20 )', 'authow' ); ?></label>
                <input type="number" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'row_gap' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'row_gap' ) ); ?>"
                       value="<?php echo esc_attr( $instance['row_gap'] ); ?>" size="3"/>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'imgwidth' ) ); ?>"><?php esc_html_e( 'Custom Image Width ( Default: 120 )', 'authow' ); ?></label>
                <input type="number" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'imgwidth' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'imgwidth' ) ); ?>"
                       value="<?php echo esc_attr( $instance['imgwidth'] ); ?>" size="3"/>
                <span class="description"
                      style="display: block; padding: 0;font-size: 12px;"><?php esc_html_e( 'This option doesn\'t apply for featured posts. It should be between 80 to 200.', 'authow' ); ?></span>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'ptfsfe' ) ); ?>"><?php esc_html_e( 'Post Title Font Size on Featured Posts ( Default: 18 )', 'authow' ); ?></label>
                <input type="number" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ptfsfe' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'ptfsfe' ) ); ?>"
                       value="<?php echo esc_attr( $instance['ptfsfe'] ); ?>" size="3"/>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'ptfs' ) ); ?>"><?php esc_html_e( 'Post Title Font Size ( Default: 16 )', 'authow' ); ?></label>
                <input type="number" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ptfs' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'ptfs' ) ); ?>"
                       value="<?php echo esc_attr( $instance['ptfs'] ); ?>" size="3"/>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'pmfs' ) ); ?>"><?php esc_html_e( 'Post Meta Font Size ( Default: 13 )', 'authow' ); ?></label>
                <input type="number" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pmfs' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'pmfs' ) ); ?>"
                       value="<?php echo esc_attr( $instance['pmfs'] ); ?>" size="3"/>
            </p>

			<?php
		}
	}
}
?>
