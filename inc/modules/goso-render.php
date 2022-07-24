<?php
/**
 * Content in mega menu
 *
 * @return HTML inner mega menu
 * @since 1.0
 */

use Elementor\Plugin;

if ( ! function_exists( 'goso_return_html_mega_menu' ) ) {
	function goso_return_html_mega_menu( $catID, $row ) {
		$args              = array(
			'parent'       => (int) $catID,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => true,
			'hierarchical' => 1,
			'taxonomy'     => 'category',
		);
		$child_categories  = get_terms( $args );
		$mega_title_length = get_theme_mod( 'goso_megamenu_title_length' ) ? get_theme_mod( 'goso_megamenu_title_length' ) : 8;
		$all_text          = goso_get_setting( 'goso_trans_all' );
		$list_cats         = array( $all_text => $catID );
		$menu_style        = get_theme_mod( 'goso_header_menu_style' );

		if ( ( ( get_theme_mod( 'goso_topbar_mega_hide_alltab' ) && $menu_style != 'menu-style-2' ) || $menu_style == 'menu-style-2' ) && ! empty( $child_categories ) ):
			$list_cats = array();
		endif;

		if ( ! empty( $child_categories ) ):
			foreach ( $child_categories as $child_cat ) {
				$list_cats[ $child_cat->name ] = $child_cat->term_id;
			}
		endif;

		if ( ! get_theme_mod( 'goso_topbar_mega_hide_alltab' ) && $menu_style == 'menu-style-2' && ! empty( $child_categories ) ):
			$list_cats[ $all_text ] = $catID;
		endif;

		/* Check rows to show number posts */
		if ( ! isset ( $row ) || empty( $row ) ): $row = '1'; endif;
		$col           = 'col-mn-5 mega-row-1';
		$numbers       = 5;
		$class_content = '';
		if ( ! empty( $child_categories ) ) {
			$col     = 'col-mn-4 mega-row-1';
			$numbers = 4;
		}

		if ( '2' == $row ) {
			$col     = 'col-mn-5 mega-row-2';
			$numbers = 10;
			if ( ! empty( $child_categories ) ) {
				$col     = 'col-mn-4 mega-row-2';
				$numbers = 8;
			}
		} elseif ( '3' == $row ) {
			$col     = 'col-mn-5 mega-row-3';
			$numbers = 15;
			if ( ! empty( $child_categories ) ) {
				$col     = 'col-mn-4 mega-row-3';
				$numbers = 12;
			}
		}

		$header_layout    = goso_authow_get_header_layout();
		$header_container = goso_authow_get_header_container_width();
		if ( ( in_array( $header_layout, array(
					'header-7',
					'header-8',
					'header-9'
				) ) || 'fullwidth' == $header_container ) && ! get_theme_mod( 'goso_body_boxed_layout' ) ) {
			$class_content = ' goso-mega-fullct';
			$col           = 'col-mn-7 mega-row-1';
			$numbers       = 7;
			if ( ! empty( $child_categories ) ) {
				$col     = 'col-mn-6 mega-row-1';
				$numbers = 6;
			}

			if ( '2' == $row ) {
				$col     = 'col-mn-7 mega-row-2';
				$numbers = 14;
				if ( ! empty( $child_categories ) ) {
					$col     = 'col-mn-6 mega-row-2';
					$numbers = 12;
				}
			} elseif ( '3' == $row ) {
				$col     = 'col-mn-7 mega-row-3';
				$numbers = 21;
				if ( ! empty( $child_categories ) ) {
					$col     = 'col-mn-6 mega-row-3';
					$numbers = 18;
				}
			}
		}

		ob_start();
		?>
		<?php if ( ! empty( $child_categories ) ): ?>
            <div class="goso-mega-child-categories hihi">
				<?php $i = 1;
				foreach ( $list_cats as $child_name => $child_id ): ?>
                    <a class="mega-cat-child<?php if ( ( $menu_style != 'menu-style-2' && $i == 1 ) || ( $menu_style == 'menu-style-2' && ( ( get_theme_mod( 'goso_topbar_mega_hide_alltab' ) && $i == 1 ) || ( ! get_theme_mod( 'goso_topbar_mega_hide_alltab' ) && $child_id == $catID ) ) ) ): echo ' cat-active'; endif; ?><?php if ( ! get_theme_mod( 'goso_topbar_mega_hide_alltab' ) && $child_id == $catID ): echo ' all-style'; endif; ?>"
                       href="<?php echo esc_url( get_category_link( $child_id ) ); ?>"
                       data-id="goso-mega-<?php echo esc_attr( $child_id ); ?>"><span><?php echo sanitize_text_field( $child_name ); ?></span></a>
					<?php $i ++; endforeach; ?>
            </div>
		<?php endif; ?>

        <div class="goso-content-megamenu<?php echo $class_content; ?>">
            <div class="goso-mega-latest-posts <?php echo esc_attr( $col ); ?>">
				<?php $j = 1;
				foreach ( $list_cats as $cat_name => $cat_id ): ?>
                    <div class="goso-mega-row goso-mega-<?php echo esc_attr( $cat_id ); ?><?php if ( ( $menu_style != 'menu-style-2' && $j == 1 ) || ( $menu_style == 'menu-style-2' && ( ( get_theme_mod( 'goso_topbar_mega_hide_alltab' ) && $j == 1 ) || ( ! get_theme_mod( 'goso_topbar_mega_hide_alltab' ) && $cat_id == $catID ) ) ) ): echo ' row-active'; endif; ?>">
						<?php
						$thumbsize = 'goso-thumb-small';
						if ( '1400' == $header_container ) {
							$thumbsize = 'goso-thumb';
						}
						$customize_data = get_theme_mod( 'goso_mega_featured_image_size' );
						if ( 'square' == $customize_data ) {
							$thumbsize = 'goso-thumb-square';
						} elseif ( 'vertical' == $customize_data ) {
							$thumbsize = 'goso-thumb-vertical';
						}
						$attr        = array(
							'post_type' => 'post',
							'showposts' => $numbers,
							'tax_query' => array(
								array(
									'taxonomy' => 'category',
									'field'    => 'term_id',
									'terms'    => (int) $cat_id,
								),
							),
						);
						$latest_mega = new WP_Query( $attr );
						if ( $latest_mega->have_posts() ):
							while ( $latest_mega->have_posts() ): $latest_mega->the_post();

								$category = get_the_category( get_the_ID() );
								?>
                                <div class="goso-mega-post">
                                    <div class="goso-mega-thumbnail">
										<?php
										/* Display Review Piechart  */
										if ( function_exists( 'goso_display_piechart_review_html' ) ) {
											goso_display_piechart_review_html( get_the_ID(), 'small' );
										}
										?>
										<?php if ( ! get_theme_mod( 'goso_topbar_mega_category' ) ): ?>
                                            <span class="mega-cat-name">
									<?php if ( $numbers == 5 || $numbers == 10 || $numbers == 15 ) { ?>
                                        <a href="<?php echo esc_url( get_category_link( $cat_id ) ); ?>">
											<?php echo sanitize_text_field( get_cat_name( $cat_id ) ); ?>
										</a>
									<?php } else { ?>
										<?php if ( $j == 1 && ! get_theme_mod( 'goso_topbar_mega_hide_alltab' ) ) {
											echo '<a href="' . esc_url( get_category_link( $category[0]->term_id ) ) . '">';
											echo sanitize_text_field( $category[0]->cat_name );
											echo '</a>';
										} else {
											echo '<a href="' . esc_url( get_category_link( $cat_id ) ) . '">';
											echo sanitize_text_field( get_cat_name( $cat_id ) );
											echo '</a>';
										} ?>
									<?php } ?>
								</span>
										<?php endif; ?>
										<?php if ( ! get_theme_mod( 'goso_topbar_mega_disable_lazy' ) ) { ?>
                                        <a class="goso-image-holder goso-lazy"
                                           data-bgset="<?php echo goso_image_srcset( get_the_ID(), $thumbsize ); ?>"
                                           href="<?php the_permalink(); ?>"
                                           title="<?php echo esc_attr( wp_strip_all_tags( get_the_title() ) ); ?>">
											<?php } else { ?>
                                            <a class="goso-image-holder"
                                               style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $thumbsize ); ?>')"
                                               href="<?php the_permalink(); ?>"
                                               title="<?php echo esc_attr( wp_strip_all_tags( get_the_title() ) ); ?>">
												<?php } ?>
												<?php if ( has_post_thumbnail() && get_theme_mod( 'goso_topbar_mega_icons' ) ): ?>
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
                                    </div>
                                    <div class="goso-mega-meta">
                                        <h3 class="post-mega-title">
                                            <a href="<?php the_permalink(); ?>"
                                               title="<?php echo esc_attr( wp_strip_all_tags( get_the_title() ) ); ?>"><?php echo sanitize_text_field( wp_trim_words( wp_strip_all_tags( get_the_title() ), $mega_title_length, '...' ) ); ?></a>
                                        </h3>
										<?php if ( ! get_theme_mod( 'goso_topbar_mega_date' ) ): ?>
                                            <p class="goso-mega-date"><?php goso_authow_time_link(); ?></p>
										<?php endif; ?>
                                    </div>
                                </div>
							<?php endwhile;
							wp_reset_postdata();
						endif;
						?>
                    </div>
					<?php $j ++; endforeach; ?>
            </div>
        </div>

		<?php
		return ob_get_clean();
	}
}

if ( ! function_exists( 'goso_return_html_block_menu' ) ) {
	function goso_return_html_block_menu( $mega_block_id, $menuid ) {

		$css        = $css_out = $content = '';
		$css_prefix = '#navigation .menu li.goso-mega-menu.goso-block-wrap-mega-' . $menuid . ' .goso-dropdown-menu,
		.navigation .menu li.goso-mega-menu.goso-block-wrap-mega-' . $menuid . ' .goso-dropdown-menu';

		// mega menu style
		$goso_menu_bgimg = get_post_meta( $menuid, 'goso_menu_bgimg', true );
		$goso_menu_mw    = get_post_meta( $menuid, 'goso_menu_mw', true );
		$goso_menu_mh    = get_post_meta( $menuid, 'goso_menu_mh', true );
		$goso_menu_bgcl  = get_post_meta( $menuid, 'goso_menu_bgcl', true );
		$goso_menu_load  = get_post_meta( $menuid, 'goso_menu_load', true );

		if ( $goso_menu_bgimg || $goso_menu_bgcl || $goso_menu_mh || $goso_menu_mw ) {
			if ( $goso_menu_bgimg ) {
				$css .= 'background-image:url(' . esc_url( wp_get_attachment_image_url( $goso_menu_bgimg, 'full' ) ) . ');';
			}

			if ( $goso_menu_bgcl ) {
				$css .= 'background-color:' . $goso_menu_bgcl . ';';
			}
			$css_out .= '<style>';
			if ( $goso_menu_bgimg || $goso_menu_bgcl ) {
				$css_out .= $css_prefix . '{' . $css . '}';
			}
			if ( $goso_menu_mh ) {
				$goso_menu_mh = is_numeric( $goso_menu_mh ) ? $goso_menu_mh . 'px' : $goso_menu_mh;
				$css_out       .= '#navigation .menu li.goso-mega-menu.goso-block-wrap-mega-' . $menuid . ' .goso-dropdown-menu,
							.navigation .menu li.goso-mega-menu.goso-block-wrap-mega-' . $menuid . ' .goso-dropdown-menu{min-height:' . $goso_menu_mh . ';}';
			}
			if ( $goso_menu_mw ) {
				$goso_menu_mw = is_numeric( $goso_menu_mw ) ? $goso_menu_mw . 'px' : $goso_menu_mw;

				if ( strpos( $goso_menu_mw, '%' ) !== false ) {
					$goso_menu_mw_percent = ( (int) str_replace( '%', '', $goso_menu_mw ) ) / 100;
					$goso_menu_mw         = 'calc(var(--pcctain) * ' . $goso_menu_mw_percent . ')';
				}
				$css_out .= '#navigation .menu li.goso-mega-menu.goso-block-wrap-mega-' . $menuid . ' .goso-mega-custom-width,.navigation .menu li.goso-mega-menu.goso-block-wrap-mega-' . $menuid . ' .goso-mega-custom-width{width:' . $goso_menu_mw . ';}';
			}
			$css_out .= '</style>';
		}

		$mega_block_id = get_page_by_path( $mega_block_id, OBJECT, 'goso-block' );
		$mega_block_id = isset( $mega_block_id->ID ) && $mega_block_id->ID ? $mega_block_id->ID : '';

		// mega menu content
		if ( $mega_block_id ) {
			$content = '<div data-blockid="' . $mega_block_id . '" class="goso-mega-content-container goso-mega-content-' . $menuid . '">';
			if ( defined( 'ELEMENTOR_VERSION' ) ) {
				wp_enqueue_style( 'elementor-frontend' );
			}
			if ( defined( 'WPB_VC_VERSION' ) ) {
				wp_enqueue_style( 'js_composer_front' );
			}
			do_action( 'authow_megamenu_loaded' );
			wp_enqueue_script( 'goso_megamenu' );
			if ( 'yes' !== $goso_menu_load ) {

				$mega_block_content = get_post( $mega_block_id );

				if ( $mega_block_content ) {

					if ( did_action( 'elementor/loaded' ) && Plugin::$instance->documents->get( $mega_block_id )->is_built_with_elementor() ) {
						$content .= \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $mega_block_id );
					} else {
						$content .= do_shortcode( $mega_block_content->post_content );

						$shortcodes_custom_css = get_post_meta( $mega_block_id, '_wpb_shortcodes_custom_css', true );

						$content .= '<style data-type="vc_shortcodes-custom-css">';
						if ( ! empty( $shortcodes_custom_css ) ) {
							$content .= $shortcodes_custom_css;
						}
						$content .= '</style>';
					}
				}
				$content .= '</div>';
			} else {
				if ( did_action( 'elementor/frontend/before_register_scripts' ) ) {
					wp_enqueue_script( 'jquery.plugin' );
					wp_enqueue_script( 'countdown' );
					wp_enqueue_script( 'waypoints' );
					wp_enqueue_script( 'jquery-counterup' );
				}
				if ( defined( 'WPB_VC_VERSION' ) ) {
					wp_enqueue_script( 'wpb_composer_front_js' );
				}
			}
		}

		return $css_out . $content;
	}
}
