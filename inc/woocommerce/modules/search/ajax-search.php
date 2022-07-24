<?php
include dirname( __FILE__ ) . "/penci_custom_walker_category.php";
if ( ! function_exists( 'penci_search_form' ) ) {
	function penci_search_form( $args = array() ) {
		$args = wp_parse_args( $args, array(
			'ajax'                   => true,
			'post_type'              => 'product',
			'show_categories'        => true,
			'type'                   => 'form',
			'thumbnail'              => true,
			'price'                  => true,
			'count'                  => 20,
			'icon_type'              => '',
			'search_style'           => '',
			'custom_icon'            => '',
			'el_classes'             => '',
			'wrapper_custom_classes' => '',
		) );

		extract( $args );

		ob_start();

		$class             = '';
		$btn_classes       = '';
		$data              = '';
		$wrapper_classes   = '';
		$dropdowns_classes = '';

		if ( $show_categories && $post_type == 'product' ) {
			$class .= ' penci-with-cat has-categories-dropdown';
		}

		if ( $icon_type == 'custom' ) {
			$btn_classes .= ' penci-with-img penci-searchform-custom-icon';
		}

		if ( $search_style ) {
			$class .= ' search-style-' . $search_style;
		}

		$ajax_args = array(
			'thumbnail'     => $thumbnail,
			'price'         => $price,
			'post_type'     => $post_type,
			'count'         => $count,
			'sku'           => '1',
			'symbols_count' => 3,
		);

		if ( $ajax ) {
			$class .= ' penci-ajax-search';
			foreach ( $ajax_args as $key => $value ) {
				$data .= ' data-' . $key . '="' . $value . '"';
			}
		}

		switch ( $post_type ) {
			case 'product':
				$placeholder = penci_woo_translate_text( 'penci_woo_trans_sepproduct' );
				$description = penci_woo_translate_text( 'penci_woo_trans_sepproduct_desc' );
				break;

			case 'portfolio':
				$placeholder = penci_woo_translate_text( 'penci_woo_trans_sepproject' );
				$description = penci_woo_translate_text( 'penci_woo_trans_sepproject_desc' );
				break;

			default:
				$placeholder = penci_woo_translate_text( 'penci_woo_trans_seppost' );
				$description = penci_woo_translate_text( 'penci_woo_trans_seppost_desc' );
				break;
		}

		if ( $el_classes ) {
			$class .= ' ' . $el_classes;
		}

		if ( $wrapper_custom_classes ) {
			$wrapper_classes .= ' ' . $wrapper_custom_classes;
		}

		if ( 'dropdown' === $type ) {
			$wrapper_classes .= ' penci-dropdown';
		}

		if ( 'full-screen' === $type ) {
			$wrapper_classes .= ' penci-fill';
		} else {
			$dropdowns_classes .= ' penci-dropdown';
		}

		$wrapper_classes   .= ' penci-search-' . $type;
		$dropdowns_classes .= ' penci-search-results';

		?>
        <div class="penci-search-<?php echo esc_attr( $type ); ?><?php echo esc_attr( $wrapper_classes ); ?>">
			<?php if ( $type == 'full-screen' ): ?>
                <span class="penci-close-search penci-action-btn penci-style-icon penci-cross-icon"><a></a></span>
			<?php endif ?>
            <form role="search" method="get" class="searchform <?php echo esc_attr( $class ); ?>"
                  action="<?php echo esc_url( home_url( '/' ) ); ?>" <?php echo ! empty( $data ) ? $data : ''; ?>>
                <input type="text" class="s" placeholder="<?php echo esc_attr( $placeholder ); ?>"
                       value="<?php echo get_search_query(); ?>" name="s"
                       aria-label="<?php echo penci_woo_translate_text( 'penci_woo_trans_search' ); ?>"
                       title="<?php echo esc_attr( $placeholder ); ?>"/>
                <input type="hidden" name="post_type" value="<?php echo esc_attr( $post_type ); ?>">
				<?php if ( $show_categories && $post_type == 'product' ) {
					penci_show_categories_dropdown();
				} ?>
                <button type="submit" class="searchsubmit<?php echo esc_attr( $btn_classes ); ?>">
						<span>
							<?php echo penci_woo_translate_text( 'penci_woo_trans_search' ); ?>
						</span>
					<?php
					if ( $icon_type == 'custom' ) {
						echo $custom_icon;
					}
					?>
                </button>
            </form>
			<?php if ( $type == 'full-screen' ): ?>
                <div class="search-info-text"><span><?php echo esc_html( $description ); ?></span></div>
			<?php endif ?>
			<?php if ( $ajax ): ?>
                <div class="search-results-wrapper">
                    <div class="penci-dropdown-results penci-scroll<?php echo esc_attr( $dropdowns_classes ); ?>">
                        <div class="penci-scroll-content"></div>
                    </div>

					<?php if ( 'full-screen' === $type ) : ?>
                        <div class="penci-search-loader"></div>
					<?php endif; ?>
                </div>
			<?php endif ?>
        </div>
		<?php

		echo apply_filters( 'get_search_form', ob_get_clean() );
	}
}

if ( ! function_exists( 'penci_show_categories_dropdown' ) ) {
	function penci_show_categories_dropdown() {
		$search_in_cat = get_theme_mod( 'penci_header_woo_search_cat' );
		$search_ex_cat = get_theme_mod( 'penci_header_woo_search_cat_ex' );
		$args          = array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => 1,
			'parent'     => 0,
		);
		if ( $search_in_cat ) {
			$args['include'] = $search_in_cat;
		}
		if ( $search_ex_cat ) {
			$args['exclude'] = $search_ex_cat;
		}
		$terms = get_terms( $args );
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			$dropdown_classes = '';


			$dropdown_classes .= ' list-wrapper';

			?>
            <div class="penci-search-cat penci-scroll">
                <input type="hidden" name="product_cat" value="0">
                <a href="#" rel="nofollow" data-val="0">
					<span>
						<?php echo penci_woo_translate_text( 'penci_woo_trans_selectcat' ); ?>
					</span>
                </a>
                <div class="penci-dropdown penci-dropdown-search-cat penci-dropdown-menu penci-scroll-content penci-design-default<?php echo esc_attr( $dropdown_classes ); ?>">
                    <ul class="penci-sub-menu">
                        <li class="placeholder"><a href="#"
                                                   data-val="0"><?php echo penci_woo_translate_text( 'penci_woo_trans_selectcat' ); ?></a>
                        </li>
						<?php
						foreach ( $terms as $term ) {
							?>
                            <li><a href="#"
                                   data-val="<?php echo esc_attr( $term->slug ); ?>"><?php echo esc_attr( $term->name ); ?></a>
                            </li>
							<?php
						}
						?>
                    </ul>
                </div>
            </div>
			<?php
		}
	}
}

/**
 * ------------------------------------------------------------------------------------------------
 * Ajax search
 * ------------------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'penci_init_search_by_sku' ) ) {
	function penci_init_search_by_sku() {
		add_filter( 'posts_search', 'penci_product_search_sku', 9 );
	}

	add_action( 'init', 'penci_init_search_by_sku', 10 );
}

if ( ! function_exists( 'penci_ajax_suggestions' ) ) {
	function penci_ajax_suggestions() {

		$allowed_types = array( 'post', 'product', 'portfolio' );
		$post_type     = 'product';

		add_filter( 'posts_search', 'penci_product_ajax_search_sku', 10 );

		$query_args = array(
			'posts_per_page' => 5,
			'post_status'    => 'publish',
			'post_type'      => $post_type,
			'no_found_rows'  => 1,
		);

		if ( ! empty( $_REQUEST['post_type'] ) && in_array( $_REQUEST['post_type'], $allowed_types ) ) {
			$post_type               = strip_tags( $_REQUEST['post_type'] );
			$query_args['post_type'] = $post_type;
		}

		if ( $post_type == 'product' ) {

			$product_visibility_term_ids         = wc_get_product_visibility_term_ids();
			$query_args['tax_query']['relation'] = 'AND';

			$query_args['tax_query'][] = array(
				'taxonomy' => 'product_visibility',
				'field'    => 'term_taxonomy_id',
				'terms'    => $product_visibility_term_ids['exclude-from-search'],
				'operator' => 'NOT IN',
			);

			if ( apply_filters( 'penci_ajax_search_product_cat_args_old_style', false ) ) {
				if ( ! empty( $_REQUEST['product_cat'] ) ) {
					$query_args['product_cat'] = strip_tags( $_REQUEST['product_cat'] );
				}
			} else {
				if ( ! empty( $_REQUEST['product_cat'] ) ) {
					$query_args['tax_query'][] = array(
						'taxonomy' => 'product_cat',
						'field'    => 'slug',
						'terms'    => strip_tags( $_REQUEST['product_cat'] ),
					);
				}
			}
		}

		if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) && $post_type == 'product' ) {
			$query_args['meta_query'][] = array(
				'key'     => '_stock_status',
				'value'   => 'outofstock',
				'compare' => 'NOT IN'
			);
		}

		if ( ! empty( $_REQUEST['query'] ) ) {
			$query_args['s'] = sanitize_text_field( $_REQUEST['query'] );
		}

		if ( ! empty( $_REQUEST['number'] ) ) {
			$query_args['posts_per_page'] = (int) $_REQUEST['number'];
		}

		$results = new WP_Query( apply_filters( 'penci_ajax_search_args', $query_args ) );

		if ( get_theme_mod( 'penci_woo_relevanssi_search' ) && function_exists( 'relevanssi_do_query' ) ) {
			relevanssi_do_query( $results );
		}

		$suggestions = array();

		if ( $results->have_posts() ) {

			if ( $post_type == 'product' ) {
				$factory = new WC_Product_Factory();
			}

			while ( $results->have_posts() ) {
				$results->the_post();

				if ( $post_type == 'product' ) {
					$product = $factory->get_product( get_the_ID() );

					$suggestions[] = array(
						'value'     => html_entity_decode( get_the_title() ),
						'permalink' => get_the_permalink(),
						'price'     => $product->get_price_html(),
						'thumbnail' => $product->get_image(),
						'sku'       => $product->get_sku() ? penci_woo_translate_text( 'penci_woo_trans_sku' ) . ' ' . $product->get_sku() : '',
					);
				} else {
					$suggestions[] = array(
						'value'     => html_entity_decode( get_the_title() ),
						'permalink' => get_the_permalink(),
						'thumbnail' => get_the_post_thumbnail( null, 'medium', '' ),
					);
				}
			}

			wp_reset_postdata();
		} else {
			$suggestions[] = array(
				'value'     => ( $post_type == 'product' ) ? penci_woo_translate_text( 'penci_woo_trans_noproductfount' ) : penci_woo_translate_text( 'penci_woo_trans_npostfound' ),
				'no_found'  => true,
				'permalink' => ''
			);
		}

		if ( get_theme_mod( 'penci_woo_enqueue_posts_results' ) && 'post' !== $post_type ) {
			$post_suggestions = penci_get_post_suggestions();
			$suggestions      = array_merge( $suggestions, $post_suggestions );
		}

		echo json_encode( array(
			'suggestions' => $suggestions,
		) );

		die();
	}

	add_action( 'wp_ajax_penci_ajax_search', 'penci_ajax_suggestions', 10 );
	add_action( 'wp_ajax_nopriv_penci_ajax_search', 'penci_ajax_suggestions', 10 );
}

if ( ! function_exists( 'penci_get_post_suggestions' ) ) {
	function penci_get_post_suggestions() {
		$query_args = array(
			'posts_per_page' => 5,
			'post_status'    => 'publish',
			'post_type'      => 'post',
			'no_found_rows'  => 1,
		);

		if ( ! empty( $_REQUEST['query'] ) ) {
			$query_args['s'] = sanitize_text_field( $_REQUEST['query'] );
		}

		if ( ! empty( $_REQUEST['number'] ) ) {
			$query_args['posts_per_page'] = (int) $_REQUEST['number'];
		}

		$results     = new WP_Query( $query_args );
		$suggestions = array();

		if ( $results->have_posts() ) {

			$suggestions[] = array(
				'value'   => '',
				'divider' => penci_woo_translate_text( 'penci_woo_trans_resfblog' ),
			);

			while ( $results->have_posts() ) {
				$results->the_post();

				$suggestions[] = array(
					'value'     => html_entity_decode( get_the_title() ),
					'permalink' => get_the_permalink(),
					'thumbnail' => get_the_post_thumbnail( null, 'medium', '' ),
				);
			}

			wp_reset_postdata();
		}

		return $suggestions;
	}
}

if ( ! function_exists( 'penci_product_search_sku' ) ) {
	function penci_product_search_sku( $where, $class = false ) {
		global $pagenow, $wpdb, $wp;

		$type = array( 'product', 'jam' );

		if ( ( is_admin() ) //if ((is_admin() && 'edit.php' != $pagenow) 
		     || ! is_search()
		     || ! isset( $wp->query_vars['s'] )
		     //post_types can also be arrays..
		     || ( isset( $wp->query_vars['post_type'] ) && 'product' != $wp->query_vars['post_type'] )
		     || ( isset( $wp->query_vars['post_type'] ) && is_array( $wp->query_vars['post_type'] ) && ! in_array( 'product', $wp->query_vars['post_type'] ) )
		) {
			return $where;
		}

		$s = $wp->query_vars['s'];

		//WC 3.6.0
		if ( function_exists( 'WC' ) && version_compare( WC()->version, '3.6.0', '<' ) ) {
			return penci_sku_search_query( $where, $s );
		} else {
			return penci_sku_search_query_new( $where, $s );
		}
	}
}

if ( ! function_exists( 'penci_product_ajax_search_sku' ) ) {
	function penci_product_ajax_search_sku( $where ) {
		if ( ! empty( $_REQUEST['query'] ) ) {
			$s = sanitize_text_field( $_REQUEST['query'] );

			//WC 3.6.0
			if ( function_exists( 'WC' ) && version_compare( WC()->version, '3.6.0', '<' ) ) {
				return penci_sku_search_query( $where, $s );
			} else {
				return penci_sku_search_query_new( $where, $s );
			}
		}

		return $where;
	}
}

if ( ! function_exists( 'penci_sku_search_query' ) ) {
	function penci_sku_search_query( $where, $s ) {
		global $wpdb;

		$search_ids = array();
		$terms      = explode( ',', $s );

		foreach ( $terms as $term ) {
			//Include the search by id if admin area.
			if ( is_admin() && is_numeric( $term ) ) {
				$search_ids[] = $term;
			}
			// search for variations with a matching sku and return the parent.

			$sku_to_parent_id = $wpdb->get_col( $wpdb->prepare( "SELECT p.post_parent as post_id FROM {$wpdb->posts} as p join {$wpdb->postmeta} pm on p.ID = pm.post_id and pm.meta_key='_sku' and pm.meta_value LIKE '%%%s%%' where p.post_parent <> 0 group by p.post_parent", wc_clean( $term ) ) );

			//Search for a regular product that matches the sku.
			$sku_to_id = $wpdb->get_col( $wpdb->prepare( "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key='_sku' AND meta_value LIKE '%%%s%%';", wc_clean( $term ) ) );

			$search_ids = array_merge( $search_ids, $sku_to_id, $sku_to_parent_id );
		}

		$search_ids = array_filter( array_map( 'absint', $search_ids ) );

		if ( sizeof( $search_ids ) > 0 ) {
			$where = str_replace( ')))', ") OR ({$wpdb->posts}.ID IN (" . implode( ',', $search_ids ) . "))))", $where );
		}

		return $where;
	}
}

if ( ! function_exists( 'penci_sku_search_query_new' ) ) {
	function penci_sku_search_query_new( $where, $s ) {
		global $wpdb;

		$search_ids = array();
		$terms      = explode( ',', $s );

		foreach ( $terms as $term ) {
			//Include the search by id if admin area.
			if ( is_admin() && is_numeric( $term ) ) {
				$search_ids[] = $term;
			}
			// search for variations with a matching sku and return the parent.

			$sku_to_parent_id = $wpdb->get_col( $wpdb->prepare( "SELECT p.post_parent as post_id FROM {$wpdb->posts} as p join {$wpdb->wc_product_meta_lookup} ml on p.ID = ml.product_id and ml.sku LIKE '%%%s%%' where p.post_parent <> 0 group by p.post_parent", wc_clean( $term ) ) );

			//Search for a regular product that matches the sku.
			$clean_term = wc_clean( $term );
			$sku_to_id  = $wpdb->get_results( "SELECT product_id FROM {$wpdb->wc_product_meta_lookup} WHERE sku LIKE '%{$clean_term}%';", ARRAY_N );

			$sku_to_id_results = array();
			if ( is_array( $sku_to_id ) ) {
				foreach ( $sku_to_id as $id ) {
					$sku_to_id_results[] = $id[0];
				}
			}

			$search_ids = array_merge( $search_ids, $sku_to_id_results, $sku_to_parent_id );
		}

		$search_ids = array_filter( array_map( 'absint', $search_ids ) );

		if ( sizeof( $search_ids ) > 0 ) {
			$where = str_replace( ')))', ")) OR ( {$wpdb->posts}.ID IN (" . implode( ',', $search_ids ) . ")))", $where );
		}

		return $where;
	}
}

if ( ! function_exists( 'penci_rlv_index_variation_skus' ) ) {
	function penci_rlv_index_variation_skus( $content, $post ) {
		if ( ! get_theme_mod( 'penci_wooo_search_by_sku' ) || ! get_theme_mod( 'penci_wooo_relevanssi_search' ) || ! function_exists( 'relevanssi_do_query' ) ) {
			return $content;
		}

		if ( $post->post_type == 'product' ) {

			$args       = array(
				'post_parent'    => $post->ID,
				'post_type'      => 'product_variation',
				'posts_per_page' => - 1
			);
			$variations = get_posts( $args );
			if ( ! empty( $variations ) ) {
				foreach ( $variations as $variation ) {
					$sku     = get_post_meta( $variation->ID, '_sku', true );
					$content .= " $sku";
				}
			}
		}

		return $content;
	}

	add_filter( 'relevanssi_content_to_index', 'penci_rlv_index_variation_skus', 10, 2 );
}
