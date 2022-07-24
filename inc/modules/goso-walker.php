<?php

/**
 * Class goso_main_menu
 * Hook to create options mega menu on Appearance > Menu
 * Render content mega menu if mega menu is selected
 * We hook only for categories
 *
 * @since     1.0
 * @construct hook
 *            - action wp_update_nav_menu_item
 *            - filter wp_edit_nav_menu_walker
 *            - filter wp_nav_menu_objects
 */
class goso_main_menu {

	function __construct() {
		if ( is_admin() ) {
			add_action( 'wp_update_nav_menu_item', array( $this, 'goso_wp_update_nav_menu_item' ), 10, 3 );
			add_filter( 'wp_edit_nav_menu_walker', array( $this, 'goso_wp_edit_nav_menu_walker' ) );
		}
		add_filter( 'wp_nav_menu_objects', array( $this, 'hook_wp_nav_menu_objects' ), 10, 2 );
	}

	function goso_wp_edit_nav_menu_walker() {
		include_once( trailingslashit( get_template_directory() ) . 'inc/modules/goso-menu-callback.php' );

		return 'goso_nav_menu_edit_walker';
	}

	function goso_wp_update_nav_menu_item( $menu_id, $menu_item_id, $args ) {

		$update_list = [
			'goso_cat_mega_menu',
			'goso_number_mega_menu',
			'goso_menu_pos',
			'goso_menu_type',
			'goso_menu_bgimg',
			'goso_menu_block',
			'goso_menu_load',
			'goso_menu_mw',
			'goso_menu_mh',
			'goso_menu_bgcl',
			'goso_menu_lbtxt',
			'goso_menu_lbs',
			'goso_menu_lbbg',
			'goso_menu_lbcl',
		];

		foreach ( $update_list as $list ) {
			if ( isset( $_POST[ $list ][ $menu_item_id ] ) ) {
				update_post_meta( $menu_item_id, $list, $_POST[ $list ][ $menu_item_id ] );
			}
		}

	}

	function hook_wp_nav_menu_objects( $items, $args = '' ) {
		$menu_items = array();

		foreach ( $items as &$item ) {
			$item->is_mega_menu = false;

			// if menu is mega menu, render mega menu
			$goso_menu_type        = get_post_meta( $item->ID, 'goso_menu_type', true );
			$goso_menu_pos         = get_post_meta( $item->ID, 'goso_menu_pos', true );
			$goso_menu_load        = get_post_meta( $item->ID, 'goso_menu_load', true );
			$goso_menu_block       = get_post_meta( $item->ID, 'goso_menu_block', true );
			$goso_catid_mega_menu  = get_post_meta( $item->ID, 'goso_cat_mega_menu', true );
			$goso_number_mega_menu = get_post_meta( $item->ID, 'goso_number_mega_menu', true );

			// label text
			$goso_menu_lbtxt = get_post_meta( $item->ID, 'goso_menu_lbtxt', true );
			$goso_menu_lbs   = get_post_meta( $item->ID, 'goso_menu_lbs', true );
			$goso_menu_lbbg  = get_post_meta( $item->ID, 'goso_menu_lbbg', true );
			$goso_menu_lbcl  = get_post_meta( $item->ID, 'goso_menu_lbcl', true );

			if ( $goso_menu_lbtxt ) {
				$item->classes[] = 'menu-item-has-label';
				$goso_menu_lbs  = $goso_menu_lbs ? $goso_menu_lbs : 1;
				$label_css       = '';
				if ( $goso_menu_lbbg ) {
					$label_css .= '.menu-item-' . $item->ID . '.menu-item-has-label > a > .menu-label{background-color:' . $goso_menu_lbbg . ';}';
					$label_css .= '.menu-item-' . $item->ID . '.menu-item-has-label > a > .menu-label:before{border-color:' . $goso_menu_lbbg . ';}';
				}
				if ( $goso_menu_lbcl ) {
					$label_css .= '.menu-item-' . $item->ID . '.menu-item-has-label > a > .menu-label{color:' . $goso_menu_lbcl . ';}';
				}
				if ( $label_css ) {
					$label_css = '<style>' . $label_css . '</style>';
				}
				$label       = '<span class="menu-label label-style-' . $goso_menu_lbs . '">' . esc_attr( $goso_menu_lbtxt ) . '</span>';
				$item->title = $label_css . $item->title . $label;
			}

			if ( 'yes' === $goso_menu_load ) {
				$item->classes[] = 'ajax-mega-menu';
			}

			if ( empty ( $goso_number_mega_menu ) ): $goso_number_mega_menu = '1'; endif;

			if ( ( $goso_menu_type != 'mega-menu' && $goso_catid_mega_menu ) || ( $goso_menu_type == 'mega-menu' && $goso_menu_block ) ) {
				$goso_menu_pos  = $goso_menu_pos ? $goso_menu_pos : 'flexible';
				$item->classes[] = 'goso-megapos-' . $goso_menu_pos;
				$item->classes[] = 'goso-mega-menu';


				if ( ! empty( $goso_menu_block ) && $goso_menu_type == 'mega-menu' ) {
					$item->classes[] = 'goso-block-mega goso-block-wrap-mega-' . $item->ID;
				}

				if ( ! empty( $goso_catid_mega_menu ) ) {
					$child_categories = get_categories( array(
						'parent'     => $goso_catid_mega_menu,
						'orderby'      => 'name',
						'order'        => 'ASC',
						'hide_empty'   => true,
						'hierarchical' => 1,
						'taxonomy'     => 'category',
					) );

					if ( ! empty( $child_categories ) ) {
						$item->classes[] = 'menu-item-has-children';
					}
				}

				// add the parent menu
				$menu_items[] = $item;

				// create mega menu item
				$post                 = new stdClass;
				$post->ID             = 0;
				$post->post_author    = '';
				$post->post_date      = '';
				$post->post_date_gmt  = '';
				$post->post_password  = '';
				$post->post_type      = 'menu_goso';
				$post->post_status    = 'draft';
				$post->to_ping        = '';
				$post->pinged         = '';
				$post->comment_status = get_option( 'default_comment_status' );
				$post->ping_status    = get_option( 'default_ping_status' );
				$post->post_pingback  = get_option( 'default_pingback_flag' );
				$post->post_category  = get_option( 'default_category' );
				$post->page_template  = 'default';
				$post->post_parent    = 0;
				$post->menu_order     = 0;
				$new_item             = new WP_Post( $post );

				/*
				 * if this is mega menu
				 * set the is_mega_menu flag
				 * render content of this mega menu
				 */
				$new_item->is_mega_menu = true; // sent to the menu walkers

				$new_item->menu_item_parent = $item->ID;

				$extra_class = $goso_menu_type == 'mega-menu' ? 'goso-block-mega' : 'goso-megamenu  normal-cat-menu';

				$new_item->url   = '';
				$new_item->title = '';
				$new_item->title .= '<div class="' . $extra_class . ' penc-menu-' . $item->ID . '">';
				if ( $goso_menu_type !== 'mega-menu' && $goso_catid_mega_menu ) {
					$new_item->title .= goso_return_html_mega_menu( $goso_catid_mega_menu, $goso_number_mega_menu );
				}

				if ( $goso_menu_type == 'mega-menu' ) {
					$new_item->title .= goso_return_html_block_menu( $goso_menu_block, $item->ID );
				}

				$new_item->title .= '</div>';

				$menu_items[] = $new_item;

			} else {
				$menu_items[] = $item;
			}
		} //end foreach

		return $menu_items;
	}
}

new goso_main_menu();

/**
 * Class goso_menu_walker_nav_menu
 * This class will remove wrap </a> around mega menu
 * Callback on wp_nav_menu() in header.php file
 *
 * @since 1.0
 */
class goso_menu_walker_nav_menu extends Walker_Nav_Menu {
	private $logo_break_point = null;
	private $count_item_parent = 0;
	private $curItem;

	/**
	 * Starts the list before the elements are added.
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param mixed $args An array of arguments. @see wp_nav_menu().
	 *
	 * @since 3.0.0
	 *
	 * @see   Walker::start_lvl()
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$menu_item       = $this->curItem;
		$goso_menu_type = get_post_meta( $menu_item->ID, 'goso_menu_type', true );
		$goso_menu_mw   = get_post_meta( $menu_item->ID, 'goso_menu_mw', true );

		$indent  = str_repeat( "\t", $depth );
		$classes = '';
		if ( 0 === $depth && 'mega-menu' == $goso_menu_type ) {

			$classes .= ' goso-dropdown-menu goso-dropdown';

			$classes .= $goso_menu_mw ? ' goso-mega-custom-width' : ' goso-mega-full-width';

			$output .= $indent . '<div class="' . trim( $classes ) . '">';
			$output .= $indent . '<div class="container">';
		}

		if ( 0 === $depth && 'mega-menu' == $goso_menu_type ) {
			$sub_menu_class = 'goso-megamenu-sub sub-sub-menu';
		} else {
			$sub_menu_class = 'sub-menu';
		}

		$output .= "\n$indent<ul class=\"$sub_menu_class\">\n";
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param mixed $args An array of arguments. @see wp_nav_menu().
	 *
	 * @since 3.0.0
	 *
	 * @see   Walker::end_lvl()
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$menu_item       = $this->curItem;
		$goso_menu_type = get_post_meta( $menu_item->ID, 'goso_menu_type', true );
		$indent          = str_repeat( "\t", $depth );
		$output          .= "$indent</ul>\n";

		if ( 0 === $depth && 'mega-menu' == $goso_menu_type ) {
			$output .= "$indent</div>\n";
			$output .= "$indent</div>\n";
		}
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$this->curItem = $item;
		$header_style  = goso_authow_get_header_layout();
		if ( in_array( $header_style, array( 'header-10', 'header-11' ) ) && ! isset( $this->logo_break_point ) ) {
			$goso_nav_menu_items = wp_get_nav_menu_items( $args->menu );
			$middle_menu_elements = 0;

			if ( is_array( $goso_nav_menu_items ) || is_object( $goso_nav_menu_items ) ) {
				foreach ( $goso_nav_menu_items as $menu_element ) {
					$menu_item_parent = isset( $menu_element->menu_item_parent ) && $menu_element->menu_item_parent ? $menu_element->menu_item_parent : '0';
					if ( '0' === $menu_item_parent ) {
						$middle_menu_elements ++;
					}
				}
			}
			$top_level_menu_items_count = $middle_menu_elements;
			if ( 0 === $top_level_menu_items_count ) {
				$this->logo_break_point = $middle_menu_elements / 2;
			} else {
				$this->logo_break_point = ceil( $middle_menu_elements / 2 );
			}
		}

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		/**
		 * Filter the CSS classes applied to a menu items
		 *
		 * @param array $classes The CSS classes that are applied to the menu items
		 * @param object $item Current menu item
		 * @param array $args Array of arguments
		 *
		 * @since 1.0
		 *
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filter the ID applied to a menu items
		 *
		 * @param string       ID that is applied to the menu items
		 * @param object $item Current menu item.
		 * @param array $args Array of arguments
		 *
		 * @since 1.0
		 *
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . '>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';

		/**
		 * Filter the HTML attributes applied to a menu items
		 *
		 * @param array $atts
		 * @param object $item The current menu item.
		 * @param array $args An array of arguments
		 *
		 * @since 1.0
		 *
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value      = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;

		if ( $item->is_mega_menu == false ) {
			$item_output .= '<a' . $attributes . '>';
		}

		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

		if ( $item->is_mega_menu == false ) {
			$item_output .= '</a>';
		}
		$item_output .= $args->after;

		/**
		 * Filter a menu item's starting output
		 *
		 * @param string $item_output The menu items starting HTML output
		 * @param object $item Menu item data object
		 * @param int $depth Depth of menu item
		 * @param array $args Array of arguments
		 *
		 * @since 1.0
		 *
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$output .= "</li>{$n}";

		$item_parent = $item->menu_item_parent ? $item->menu_item_parent : '0';

		if ( '0' === $item_parent ) {
			$this->count_item_parent ++;
		}

		$header_style = goso_authow_get_header_layout();
		$break_point  = $this->logo_break_point;

		if ( in_array( $header_style, array(
				'header-10',
				'header-11'
			) ) && '0' === $item_parent && $break_point == $this->count_item_parent && ! goso_check_theme_mod( 'goso_enable_builder' ) ) {

			if ( isset( $args->menu_id ) && $args->menu_id ) {
				$wrap_id = $args->menu_id;
			} elseif ( isset( $args->menu ) && $args->menu ) {
				$menu    = $args->menu;
				$wrap_id = 'menu-' . ( isset( $menu->slug ) ? $menu->slug : '' ) . '-second';
			} else {
				$wrap_id = 'menu-second';
			}

			$wrap_class = isset( $args->menu_class ) ? str_replace( 'gosomn-left', 'gosomn-right', $args->menu_class ) : 'gosomn-right';

			$output .= '</ul>';

			ob_start();
			get_template_part( 'template-parts/header/logo-has-trans' );
			$output .= ob_get_clean();

			$output .= sprintf( '<ul id="%s" class="%s">', esc_attr( $wrap_id ), esc_attr( $wrap_class ) );

		}
	}
}
