<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
/* Check page header has enable or not */

if ( ! function_exists( 'goso_is_pageheader' ) ):
	function goso_is_pageheader() {
		if ( ! is_page() ): return false; endif;

		static $show_page_title;
		$show_page_title  = get_theme_mod( 'goso_pheader_show' );
		$goso_page_title = get_post_meta( get_the_ID(), 'goso_pmeta_page_title', true );

		$pheader_show = isset( $goso_page_title['pheader_show'] ) ? $goso_page_title['pheader_show'] : '';
		if ( 'enable' == $pheader_show ) {
			$show_page_title = true;
		} elseif ( 'disable' == $pheader_show ) {
			$show_page_title = false;
		}

		return $show_page_title;
	}
endif;
if ( ! function_exists( 'goso_authow_get_header_layout' ) ):
	function goso_authow_get_header_layout() {
		$header_layout = get_theme_mod( 'goso_header_layout' );
		if ( is_page() ) {
			$pmeta_page_header = get_post_meta( get_the_ID(), 'goso_pmeta_page_header', true );
			if ( isset( $pmeta_page_header['header_style'] ) && $pmeta_page_header['header_style'] ) {
				$header_layout = $pmeta_page_header['header_style'];
			}
		}

		if ( empty( $header_layout ) ) {
			$header_layout = 'header-1';
		}

		return $header_layout;
	}
endif;

if ( ! function_exists( 'goso_authow_get_header_width' ) ):
	function goso_authow_get_header_width() {
		$header_width = get_theme_mod( 'goso_header_ctwidth' );
		if ( is_page() ) {
			$pmeta_page_header = get_post_meta( get_the_ID(), 'goso_pmeta_page_header', true );
			if ( isset( $pmeta_page_header['goso_header_width'] ) && $pmeta_page_header['goso_header_width'] ) {
				$header_width = $pmeta_page_header['goso_header_width'];
			}
		}

		$output = 'container';
		if ( $header_width ) {
			$output .= ' container-' . $header_width;
		}

		echo $output;
	}
endif;

if ( ! function_exists( 'goso_authow_get_header_container_width' ) ):
	function goso_authow_get_header_container_width() {
		$header_width = get_theme_mod( 'goso_header_ctwidth' );
		if ( is_page() ) {
			$pmeta_page_header = get_post_meta( get_the_ID(), 'goso_pmeta_page_header', true );
			if ( isset( $pmeta_page_header['goso_header_width'] ) && $pmeta_page_header['goso_header_width'] ) {
				$header_width = $pmeta_page_header['goso_header_width'];
			}
		}

		$output = '1170';
		if ( $header_width ) {
			$output = $header_width;
		}

		return $output;
	}
endif;

if ( ! function_exists( 'goso_authow_wpheader_classes' ) ):
	function goso_authow_wpheader_classes( $class = '' ) {
		$_featured_slider_all_page   = get_theme_mod( 'goso_featured_slider_all_page' );
		$_featured_slider            = get_theme_mod( 'goso_featured_slider' );
		$_vertical_nav_remove_header = get_theme_mod( 'goso_vertical_nav_remove_header' );
		$_vertical_nav_show          = get_theme_mod( 'goso_vertical_nav_show' );
		$header_layout               = goso_authow_get_header_layout();

		$classes = 'header-' . $header_layout;
		if ( ( ( ! is_home() || ! is_front_page() ) && ! $_featured_slider_all_page ) || ( ( is_home() || is_front_page() ) && ! $_featured_slider ) ) {
			$classes .= ' has-bottom-line';
		}
		if ( $_vertical_nav_remove_header && $_vertical_nav_show ) {
			$classes .= ' goso-vernav-hide-innerhead';
		}

		if ( $class ) {
			$classes .= ' ' . $class;
		}

		return $classes;
	}
endif;

if ( ! function_exists( 'goso_authow_sitenavigation_classes' ) ):
	function goso_authow_sitenavigation_classes( $class = '' ) {
		$menu_style    = get_theme_mod( 'goso_header_menu_style' );
		$header_layout = goso_authow_get_header_layout();

		$classes = '';

		if ( in_array( $header_layout, array( 'header-1', 'header-4', 'header-7' ) ) ) {
			$classes .= 'header-layout-top';
		} else {
			$classes .= 'header-layout-bottom';
		}

		if ( $header_layout == 'header-9' ) {
			$classes .= ' header-6';
		}

		if ( $header_layout == 'header-10' || $header_layout == 'header-11' ) {
			$overflow_logo = get_theme_mod( 'goso_overflow_logo' );
			if ( $overflow_logo ) {
				$class .= ' goso-logo-overflow';
			}
		}

		$classes .= ' ' . $header_layout;
		$classes .= ' ' . ( $menu_style ? $menu_style : 'menu-style-1' );

		if ( get_theme_mod( 'goso_header_enable_padding' ) ) {
			$classes .= ' menu-item-padding';
		}
		if ( get_theme_mod( 'goso_disable_sticky_header' ) ) {
			$classes .= ' goso-disable-sticky-nav';
		}

		if ( $class ) {
			$classes .= ' ' . $class;
		}

		return $classes;
	}
endif;

if ( ! function_exists( 'goso_authow_body_classes' ) ):
	function goso_authow_body_classes( $classes ) {

		$fontawesome_ver5 = get_theme_mod( 'goso_fontawesome_ver5' );
		if ( $fontawesome_ver5 ) {
			$classes[] = 'goso-fawesome-ver5';
		}

		if ( is_singular( 'portfolio' ) ) {

			if ( get_theme_mod( "goso_portfolio_single_enable_2sidebar" ) ) {
				$classes[] = 'goso-two-sidebar';
			}
		} elseif ( is_home() || is_front_page() ) {

			$show_on_front = get_option( 'show_on_front' );
			if ( 'page' == $show_on_front ) {

				$sidebar_layout   = get_theme_mod( 'goso_page_default_template_layout' );
				$sidebar_position = get_post_meta( get_the_ID(), 'goso_sidebar_page_pos', true );
				if ( $sidebar_position ) {
					$sidebar_layout = $sidebar_position;
				}

				if ( 'two-sidebar' == $sidebar_layout ) {
					$classes[] = 'goso-two-sidebar';
				}

				// Header transparent
				$header_trans = goso_is_header_transparent();
				if ( $header_trans ) {
					$classes[] = 'goso-header-trans';
				}

			} else {
				if ( get_theme_mod( "goso_two_sidebar_home" ) ) {
					$classes[] = 'goso-two-sidebar';
				}
			}

		} elseif ( is_archive() || is_search() || is_404() ) {

			$is_two_sidebar_archive = get_theme_mod( 'goso_two_sidebar_archive' );

			if ( is_category() ) {
				$category_oj  = get_queried_object();
				$fea_cat_id   = $category_oj->term_id;
				$cat_meta     = get_option( "category_$fea_cat_id" );
				$sidebar_opts = isset( $cat_meta['cat_sidebar_display'] ) ? $cat_meta['cat_sidebar_display'] : '';
				if ( $sidebar_opts == 'two' ) {
					$is_two_sidebar_archive = true;
				} else if ( $sidebar_opts ) {
					$is_two_sidebar_archive = false;
				}
			}

			if ( $is_two_sidebar_archive ) {
				$classes[] = 'goso-two-sidebar';
			}
		} elseif ( is_page() ) {
			$sidebar_layout   = get_theme_mod( 'goso_page_default_template_layout' );
			$sidebar_position = get_post_meta( get_the_ID(), 'goso_sidebar_page_pos', true );
			if ( $sidebar_position ) {
				$sidebar_layout = $sidebar_position;
			}

			if ( 'two-sidebar' == $sidebar_layout ) {
				$classes[] = 'goso-two-sidebar';
			}

			$show_page_title = goso_is_pageheader();
			if ( $show_page_title ):
				$classes[] = 'goso-body-epageheader';
			endif;

			// Header transparent
			$header_trans = goso_is_header_transparent();
			if ( $header_trans ) {
				$classes[] = 'goso-header-trans';
			}

		} elseif ( is_single() ) {
			$sidebar_single_layout   = get_theme_mod( 'goso_single_layout' );
			$sidebar_single_position = get_post_meta( get_the_ID(), 'goso_post_sidebar_display', true );
			if ( $sidebar_single_position ) {
				$sidebar_single_layout = $sidebar_single_position;
			}

			if ( 'two' == $sidebar_single_layout ) {
				$classes[] = 'goso-two-sidebar';
			}
		}


		if ( is_singular( 'portfolio' ) || is_singular( 'product' ) ) {
			$classes[] = 'goso-port-product';
		}


		return $classes;
	}

	add_filter( 'body_class', 'goso_authow_body_classes' );
endif;

/**
 * Get class sidebar position
 */
if ( ! function_exists( 'goso_is_header_transparent' ) ):
	function goso_is_header_transparent() {
		$header_trans = false;
		if ( is_page() ) {
			$header_trans = get_theme_mod( 'goso_header_enable_transparent' );
		}

		$pmeta_page_header = get_post_meta( get_the_ID(), 'goso_pmeta_page_header', true );
		if ( isset( $pmeta_page_header['goso_edeader_trans'] ) ) {
			if ( 'yes' == $pmeta_page_header['goso_edeader_trans'] ) {
				$header_trans = true;
			} elseif ( 'no' == $pmeta_page_header['goso_edeader_trans'] ) {
				$header_trans = false;
			}
		}

		return $header_trans;
	}
endif;

/**
 * Get class sidebar position
 */
if ( ! function_exists( 'goso_get_sidebar_position_archive' ) ):
	function goso_get_sidebar_position_archive() {
		$sidebar_position = 'right-sidebar';
		if ( get_theme_mod( 'goso_two_sidebar_archive' ) ) {
			$sidebar_position = 'two-sidebar';
		} elseif ( get_theme_mod( "goso_left_sidebar_archive" ) ) {
			$sidebar_position = 'left-sidebar';
		}

		return $sidebar_position;
	}
endif;

if ( ! function_exists( 'get_list_custom_sidebar_option' ) ):
	function get_list_custom_sidebar_option() {
		$list_sidebar = array(
			'main-sidebar'      => 'Main Sidebar',
			'main-sidebar-left' => 'Main Sidebar Left',
			'custom-sidebar-1'  => 'Custom Sidebar 1',
			'custom-sidebar-2'  => 'Custom Sidebar 2',
			'custom-sidebar-3'  => 'Custom Sidebar 3',
			'custom-sidebar-4'  => 'Custom Sidebar 4',
			'custom-sidebar-5'  => 'Custom Sidebar 5',
			'custom-sidebar-6'  => 'Custom Sidebar 6',
			'custom-sidebar-7'  => 'Custom Sidebar 7',
			'custom-sidebar-8'  => 'Custom Sidebar 8',
			'custom-sidebar-9'  => 'Custom Sidebar 9',
			'custom-sidebar-10' => 'Custom Sidebar 10'
		);

		$custom_sidebars = get_option( 'authow_custom_sidebars' );
		if ( empty( $custom_sidebars ) || ! is_array( $custom_sidebars ) ) {
			return $list_sidebar;
		}

		foreach ( $custom_sidebars as $sidebar_id => $custom_sidebar ) {

			if ( empty( $custom_sidebar['name'] ) ) {
				continue;
			}
			$list_sidebar[ $sidebar_id ] = $custom_sidebar['name'];
		}

		return $list_sidebar;
	}
endif;

if ( ! function_exists( 'goso_get_option_yesno' ) ) {
	function goso_get_option_yesno( $default = false ) {
		$output = array();

		if ( $default ) {
			$output[''] = esc_html__( 'Default( follow Customize )', 'authow' );
		}

		$output['no']  = esc_html__( 'No', 'authow' );
		$output['yes'] = esc_html__( 'Yes', 'authow' );

		return $output;
	}
}

if ( ! function_exists( 'goso_get_option_menus' ) ) {
	function goso_get_option_menus( $hide_empty = false ) {
		$output = array( '' => esc_html__( '-- Default Select -- ', 'authow' ) );

		$menus = get_terms( 'nav_menu', array( 'hide_empty' => $hide_empty ) );

		foreach ( $menus as $menu ) {
			$output[ $menu->term_id ] = $menu->name;
		}

		return $output;
	}
}

if ( ! function_exists( 'goso_get_data_slider' ) ):
	function goso_get_data_slider( $args ) {
		$items = $autoplay = $autotime = $speed = $loop = $showdots = $shownav = '';

		$args = wp_parse_args( $args, array(
			'items'    => '1',
			'autoplay' => '',
			'autotime' => '',
			'speed'    => '',
			'loop'     => '',
			'showdots' => '0',
			'shownav'  => '0',
		) );
		extract( $args );

		$data = ' data-items="' . $items . '"';
		$data .= ' data-auto="' . ( 'yes' == $autoplay ? 'true' : 'false' ) . '"';

		$data .= $autotime ? ' data-autotime="' . $autotime . '"' : '';
		$data .= $speed ? ' data-speed="' . $speed . '"' : '';
		$data .= ! $loop ? ' data-loop="false"' : '';
		$data .= $showdots ? ' data-dots="true"' : '';
		$data .= ! $shownav ? ' data-nav="true"' : '';

		return $data;
	}
endif;

if ( defined( 'ELEMENTOR_VERSION' ) || defined( 'WPB_VC_VERSION' ) ) {
	if ( ! function_exists( 'custom_css_title_block_pagebuilder' ) ) {
		add_action( 'authow_theme/custom_css', 'custom_css_title_block_pagebuilder' );
		function custom_css_title_block_pagebuilder() {
			if ( get_theme_mod( 'goso_sidebar_heading_lowcase' ) ): ?>
                .goso-block-vc .goso-border-arrow .inner-arrow { text-transform: none; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'goso_sidebar_heading_size' ) ): ?>
                .goso-block-vc .goso-border-arrow .inner-arrow { font-size: <?php echo get_theme_mod( 'goso_sidebar_heading_size' ); ?>px; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'goso_sidebar_heading_image_8' ) ): ?>
                .goso-block-vc .style-8.goso-border-arrow .inner-arrow { background-image: url(<?php echo get_theme_mod( 'goso_sidebar_heading_image_8' ); ?>); }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'goso_sidebar_heading8_repeat' ) ): ?>
                .goso-block-vc .style-8.goso-border-arrow .inner-arrow { background-repeat: <?php echo get_theme_mod( 'goso_sidebar_heading8_repeat' ); ?>; background-size: auto; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'goso_sidebar_heading_bg' ) ): ?>
                .goso-block-vc .goso-border-arrow .inner-arrow { background-color: <?php echo get_theme_mod( 'goso_sidebar_heading_bg' ); ?>; }
                .goso-block-vc .style-2.goso-border-arrow:after{ border-top-color: <?php echo get_theme_mod( 'goso_sidebar_heading_bg' ); ?>; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'goso_sidebar_heading_outer_bg' ) ): ?>
                .goso-block-vc .goso-border-arrow:after { background-color: <?php echo get_theme_mod( 'goso_sidebar_heading_outer_bg' ); ?>; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'goso_sidebar_heading_border_color' ) ): ?>
                .goso-block-vc .goso-border-arrow .inner-arrow, .goso-block-vc.style-4 .goso-border-arrow .inner-arrow:before, .goso-block-vc.style-4 .goso-border-arrow .inner-arrow:after, .goso-block-vc.style-5 .goso-border-arrow, .goso-block-vc.style-7
                .goso-border-arrow, .goso-block-vc.style-9 .goso-border-arrow { border-color: <?php echo get_theme_mod( 'goso_sidebar_heading_border_color' ); ?>; }
                .goso-block-vc .goso-border-arrow:before { border-top-color: <?php echo get_theme_mod( 'goso_sidebar_heading_border_color' ); ?>; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'goso_sidebar_heading_border_color5' ) ): ?>
                .goso-block-vc .style-5.goso-border-arrow { border-color: <?php echo get_theme_mod( 'goso_sidebar_heading_border_color5' ); ?>; }
                .goso-block-vc .style-5.goso-border-arrow .inner-arrow{ border-bottom-color: <?php echo get_theme_mod( 'goso_sidebar_heading_border_color5' ); ?>; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'goso_sidebar_heading_border_color7' ) ): ?>
                .goso-block-vc .style-7.goso-border-arrow .inner-arrow:before, .goso-block-vc.style-9 .goso-border-arrow .inner-arrow:before { background-color: <?php echo get_theme_mod( 'goso_sidebar_heading_border_color7' ); ?>; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'goso_sidebar_heading_border_inner_color' ) ): ?>
                .goso-block-vc .goso-border-arrow:after { border-color: <?php echo get_theme_mod( 'goso_sidebar_heading_border_inner_color' ); ?>; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'goso_sidebar_heading_color' ) ): ?>
                .goso-block-vc .goso-border-arrow .inner-arrow { color: <?php echo get_theme_mod( 'goso_sidebar_heading_color' ); ?>; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'goso_sidebar_remove_border_outer' ) ): ?>
                .goso-block-vc .goso-border-arrow:after { content: none; display: none; }
                .goso-block-vc .widget-title{ margin-left: 0; margin-right: 0; margin-top: 0; }
                .goso-block-vc .goso-border-arrow:before{ bottom: -6px; border-width: 6px; margin-left: -6px; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'goso_sidebar_remove_arrow_down' ) ): ?>
                .goso-block-vc .goso-border-arrow:before, .goso-block-vc .style-2.goso-border-arrow:after { content: none; display: none; }
			<?php endif;
		}
	}
}

/**
 * Get icon font awesome with each version
 *
 * Note important : if edit function
 * @see goso_icon_by_ver()
 */
if ( ! function_exists( 'goso_icon_by_ver' ) ):
	function goso_icon_by_ver( $class, $style = '', $sharing = false ) {

		if ( ( get_theme_mod( 'goso_outline_social_icon' ) && true != $sharing ) || ( get_theme_mod( 'goso_outline_social_share' ) && true == $sharing ) ) {
			if ( 'fab fa-facebook-f' == $class ) {
				$class = 'gosoicon-facebook';
			} elseif ( 'fab fa-facebook-f' == $class ) {
				$class = 'gosoicon-facebook';
			} elseif ( 'fab fa-twitter' == $class ) {
				$class = 'gosoicon-twitter';
			} elseif ( 'fab fa-instagram' == $class ) {
				$class = 'gosoicon-instagram';
			} elseif ( 'fab fa-pinterest' == $class ) {
				$class = 'gosoicon-pinterest';
			} elseif ( 'fab fa-linkedin-in' == $class ) {
				$class = 'gosoicon-linkedin';
			} elseif ( 'fab fa-flickr' == $class ) {
				$class = 'gosoicon-flickr';
			} elseif ( 'fab fa-behance' == $class ) {
				$class = 'gosoicon-behance';
			} elseif ( 'fab fa-tumblr' == $class ) {
				$class = 'gosoicon-tumblr';
			} elseif ( 'fab fa-youtube' == $class ) {
				$class = 'gosoicon-youtube';
			} elseif ( 'fas fa-envelope' == $class ) {
				$class = 'gosoicon-email';
			} elseif ( 'fab fa-vk' == $class ) {
				$class = 'gosoicon-vk';
			} elseif ( 'fab fa-vine' == $class ) {
				$class = 'gosoicon-vine';
			} elseif ( 'fab fa-soundcloud' == $class ) {
				$class = 'gosoicon-soundcloud';
			} elseif ( 'fab fa-snapchat' == $class ) {
				$class = 'gosoicon-snapchat';
			} elseif ( 'fab fa-spotify' == $class ) {
				$class = 'gosoicon-spotify';
			} elseif ( 'fab fa-github' == $class ) {
				$class = 'gosoicon-github';
			} elseif ( 'fab fa-stack-overflow' == $class ) {
				$class = 'gosoicon-stack-overflow';
			} elseif ( 'fab fa-twitch' == $class ) {
				$class = 'gosoicon-twitch';
			} elseif ( 'fab fa-vimeo-v' == $class ) {
				$class = 'gosoicon-vimeo';
			} elseif ( 'fab fa-steam' == $class ) {
				$class = 'gosoicon-steam';
			} elseif ( 'fab fa-xing' == $class ) {
				$class = 'gosoicon-xing';
			} elseif ( 'fab fa-whatsapp' == $class ) {
				$class = 'gosoicon-whatsapp';
			} elseif ( 'fab fa-telegram' == $class ) {
				$class = 'gosoicon-telegram';
			} elseif ( 'fab fa-reddit-alien' == $class ) {
				$class = 'gosoicon-reddit';
			} elseif ( 'fab fa-odnoklassniki' == $class ) {
				$class = 'gosoicon-odnoklassniki';
			} elseif ( 'fab fa-stumbleupon' == $class ) {
				$class = 'gosoicon-stumbleupon';
			} elseif ( 'fab fa-weixin' == $class ) {
				$class = 'gosoicon-wechat';
			} elseif ( 'fab fa-weibo' == $class ) {
				$class = 'gosoicon-sina-weibo';
			} elseif ( 'gosoicon-line' == $class ) {
				$class = 'gosoicon-line-1';
			} elseif ( 'gosoicon-viber' == $class ) {
				$class = 'gosoicon-viber-1';
			} elseif ( 'gosoicon-discord' == $class ) {
				$class = 'gosoicon-discord-1';
			} elseif ( 'fas fa-rss' == $class ) {
				$class = 'gosoicon-rss';
			} elseif ( 'fab fa-slack' == $class ) {
				$class = 'gosoicon-slack';
			} elseif ( 'fab fa-tripadvisor' == $class ) {
				$class = 'gosoicon-tripadvisor';
			} elseif ( 'gosoicon-tik-tok' == $class ) {
				$class = 'gosoicon-tik-tok-1';
			} elseif ( 'gosoicon-blogger-1' == $class ) {
				$class = 'gosoicon-blogger';
			} elseif ( 'gosoicon-deviantart-1' == $class ) {
				$class = 'gosoicon-deviantart';
			} elseif ( 'gosoicon-evernote' == $class ) {
				$class = 'gosoicon-evernote-1';
			} elseif ( 'gosoicon-forrst' == $class ) {
				$class = 'gosoicon-forrst-1';
			} elseif ( 'gosoicon-grooveshark' == $class ) {
				$class = 'gosoicon-grooveshark-1';
			} elseif ( 'gosoicon-myspace-logo' == $class ) {
				$class = 'gosoicon-myspace';
			} elseif ( 'fab fa-paypal' == $class ) {
				$class = 'gosoicon-brand';
			} elseif ( 'fab fa-skype' == $class ) {
				$class = 'gosoicon-skype';
			} elseif ( 'fab fa-windows' == $class ) {
				$class = 'gosoicon-windows';
			} elseif ( 'fab fa-wordpress' == $class ) {
				$class = 'gosoicon-wordpress-logo';
			}
		}

		$fontawesome_ver5 = get_theme_mod( 'goso_fontawesome_ver5' );
		if ( ! $fontawesome_ver5 ) {
			$class = str_replace( array( 'fab ', 'fal ', 'far ', 'fas ' ), 'fa ', $class );

			if ( 'fa fa-facebook-f' == $class ) {
				$class = str_replace( 'facebook-f', 'facebook', $class );
			} elseif ( 'fa fa-thumbtack' == $class ) {
				$class = str_replace( 'thumbtack', 'thumb-tack', $class );
			} elseif ( 'fa fa-linkedin-in' == $class ) {
				$class = str_replace( 'linkedin-in', 'linkedin', $class );
			} elseif ( 'fa fa-image' == $class ) {
				$class = str_replace( 'fa-image', 'fa-picture-o', $class );
			} elseif ( 'fa fa-clock' == $class ) {
				$class = str_replace( 'fa-clock', 'fa-clock-o', $class );
			} elseif ( 'fa fa-user-circle-o' == $class ) {
				$class = str_replace( 'fa-user-circle-o', 'fa-user-circle', $class );
			} elseif ( 'fa fa-sign-out-alt' == $class ) {
				$class = str_replace( 'fa-sign-out-alt', 'fa-sign-out', $class );
			} elseif ( 'fa fa-sync' == $class ) {
				$class = str_replace( 'fa-sync', 'fa-refresh', $class );
			} elseif ( 'fa fa-youtube' == $class ) {
				$class = str_replace( 'fa-youtube', 'fa-youtube-play', $class );
			} elseif ( 'fa fa-envelope-o' == $class ) {
				$class = str_replace( 'fa-envelope-o', 'fa-envelope', $class );
			} elseif ( 'fa fa-snapchat-ghost' == $class ) {
				$class = str_replace( 'fa-snapchat-ghost', 'fa-snapchat', $class );
			} elseif ( 'fa fa-vimeo-v' == $class ) {
				$class = str_replace( 'fa-vimeo-v', 'fa-vimeo', $class );
			} elseif ( 'fa fa-times' == $class ) {
				$class = str_replace( 'fa-times', 'fa-close', $class );
			} elseif ( 'fa fa-heart' == $class ) {
				$class = str_replace( 'fa-heart', 'fa-heart-o', $class );
			} elseif ( 'fa fa-comment' == $class ) {
				$class = str_replace( 'fa-comment', 'fa-comment-o', $class );
			}
		}

		return '<i class="goso-faicon ' . esc_attr( $class ) . '" ' . ( $style ? ' ' . $style : '' ) . '></i>';
	}
endif;
/**
 * Show icon font awesome with each version
 *
 */
if ( ! function_exists( 'goso_fawesome_icon' ) ):
	function goso_fawesome_icon( $class, $style = '' ) {
		echo goso_icon_by_ver( $class, $style );
	}
endif;

if ( ! function_exists( 'goso_svg_menu_icon' ) ):
	function goso_svg_menu_icon() {
		echo '<svg width=18px height=18px viewBox="0 0 512 384" version=1.1 xmlns=http://www.w3.org/2000/svg xmlns:xlink=http://www.w3.org/1999/xlink><g stroke=none stroke-width=1 fill-rule=evenodd><g transform="translate(0.000000, 0.250080)"><rect x=0 y=0 width=512 height=62></rect><rect x=0 y=161 width=512 height=62></rect><rect x=0 y=321 width=512 height=62></rect></g></g></svg>';
	}
endif;

/**
 * Trims post title.
 *
 * @param $id
 * @param int $length
 * @param null $more
 *
 * @return string
 */
if ( ! function_exists( 'goso_get_trim_post_title' ) ) {
	function goso_get_trim_post_title( $id = '', $length = 20, $more = '...' ) {
		if ( empty( $id ) ) {
			$id = get_the_ID();
		}

		if ( ! $length || ! is_numeric( $length ) ) {
			return get_the_title( $id );
		}

		return sanitize_text_field( wp_trim_words( wp_strip_all_tags( get_the_title( $id ) ), $length, $more ) );
	}
}
if ( ! function_exists( 'goso_trim_post_title' ) ) {
	function goso_trim_post_title( $id = '', $length = 20, $more = '...' ) {
		echo goso_get_trim_post_title( $id, $length, $more );
	}
}

if ( ! function_exists( 'goso_get_post_countview' ) ) {
	function goso_get_post_countview( $post_id = null ) {

		echo '<span>';
		goso_fawesome_icon( 'fas fa-eye' );
		echo goso_get_post_views( $post_id );
		echo ' ' . goso_get_setting( 'goso_trans_countviews' );
		echo '</span>';
	}
}


/* Hook for Authow Goso Page Speed */
/* Options from Authow */
if ( ! function_exists( 'goso_classes_slider_lazy' ) ) {
	function goso_classes_slider_lazy() {
		/*$class = 'owl-lazy';
		if( ! is_user_logged_in() && get_theme_mod( 'goso_enable_spoptimizer' ) ){
			$class = 'goso-lazy';
		}
		
		return $class;*/
		return 'goso-lazy';
	}
}

/*
add_action('hpp_print_initjs', function(){
	echo '_HWIO.data.gencss=1;';
});
*/

if ( ! is_user_logged_in() && get_theme_mod( 'goso_enable_spoptimizer' ) && function_exists( 'hpp_shouldlazy' ) && hpp_shouldlazy() ) {

	add_filter( 'hpp_allow_generate_css', function ( $ok ) {
		return get_option( 'goso_authow_is_activated' ) ? true : false;
	} );

	add_filter( 'hpp_merge_file', function ( $code, $handle, $ext, $script_path ) {
		if ( $ext == 'js' && strpos( $script_path, '/contact-form-7/includes/js/scripts.js' ) !== false ) {
			$code = str_replace( '$( function() {', 'setTimeout( function() {', $code );
		}

		return $code;
	}, 10, 4 );

	/*
	add_filter('hpp_inline_script_part', function($js, $handle){
		if($handle=='contact-form-7') {
			//disable wp-json/contact-form-7/refill for boot speed
			$js = str_replace('"cached":"1"', '"cached":0', $js);
		}
		return $js;
	}, 10, 2);
	*/

	/* CDN */
	if ( get_theme_mod( 'goso_speed_cdnbase' ) ) {
		add_filter( 'hpp_cache_url', function () {
			$cdn_base = get_theme_mod( 'goso_speed_cdnbase' );

			return $cdn_base . '/wp-content/mmr';
		} );
	}

	add_filter( 'elementor/widget/render_content', 'hpp_defer_content' );

	add_filter( 'hpp_merge_file', function ( $js, $handle, $ext, $script_path ) {
		if ( $ext == 'js' && strpos( $script_path, '/elementor/assets/js/frontend.js' ) !== false ) {
			$js = str_replace( 'function runElementsHandlers() {', 'function runElementsHandlers() {let t=this;_HWIO.readyjs(function(){t.elements.$elements.each(function (index, element) {return elementorFrontend.elementsHandler.runReadyTrigger(element)});})', $js );

			$js = str_replace( 'this.elements.$elements.each(function', 'if(0)this.elements.$elements.each(function', $js );
			$js = str_replace( 'return $element.elementorWaypoint(', 'if(!jQuery.fn.elementorWaypoint && typeof jQuery_elementorWaypoint!="undefined")jQuery.fn.elementorWaypoint = jQuery_elementorWaypoint;return $element.elementorWaypoint(', $js );
		}
		if ( $ext == 'js' && strpos( $script_path, '/elementor/assets/js/frontend.min.js' ) !== false ) {
			if ( strpos( $js, '_HWIO.readyjs(function(){' ) === false ) {
				$js = str_replace( 'function runElementsHandlers(){this.elements', 'function runElementsHandlers(){let t=this;_HWIO.readyjs(function(){t.elements', $js );
				if ( strpos( $js, '.runReadyTrigger(t)}))' ) !== false ) {
					$js = str_replace( 'elementorFrontend.elementsHandler.runReadyTrigger(t)}))', 'elementorFrontend.elementsHandler.runReadyTrigger(t)}))})', $js );
				} else {
					$js = str_replace( 'elementorFrontend.elementsHandler.runReadyTrigger(t)})}}', 'elementorFrontend.elementsHandler.runReadyTrigger(t)})})}}', $js );
				}

				$js = str_replace( 'return e.elementorWaypoint(', 'if(!jQuery.fn.elementorWaypoint && typeof jQuery_elementorWaypoint!="undefined")jQuery.fn.elementorWaypoint = jQuery_elementorWaypoint;return e.elementorWaypoint(', $js );

			}
		}
		if ( $ext == 'js' && strpos( $script_path, '/elementor/assets/lib/waypoints/waypoints.js' ) !== false ) {
			if ( strpos( $js, 'jQuery_elementorWaypoint' ) !== false ) {
				$js = str_replace( 'window.jQuery.fn.elementorWaypoint =', 'window.jQuery_elementorWaypoint=window.jQuery.fn.elementorWaypoint =', $js );
			}
		}
		if ( $ext == 'js' && strpos( $script_path, '/elementor/assets/lib/waypoints/waypoints.min.js' ) !== false ) {
			if ( strpos( $js, 'jQuery_elementorWaypoint' ) !== false ) {
				$js = str_replace( 'window.jQuery.fn.elementorWaypoint=', 'window.jQuery_elementorWaypoint=window.jQuery.fn.elementorWaypoint=', $js );
			}
		}

		return $js;
	}, 10, 4 );


	add_filter( 'hpp_delay_asset_att', function ( $att, $tp ) {
		if ( $tp == 'js' ) { //&& !hw_config('merge_js')
			if ( $att['id'] == 'wc-single-product' ) {
				$att['deps'] .= ',photoswipe';
			}
		}

		if ( $tp == 'js' ) {
			if ( $att['id'] == 'main-script' ) {
				$att['deps'] .= ',goso-libs-js';
			}
		}

		return $att;

	}, 10, 2 );

	add_filter( 'woocommerce_queued_js', function ( $js ) {
		if ( function_exists( 'hpp_delay_it_script' ) ) {
			$js = hpp_delay_it_script( $js );
		}

		return $js;
	} );

	add_filter( 'hpp_critical_css', function ( $css, $file ) {
		$css .= '#navigation ul.menu > li.menu-item-has-children > a:after, #navigation ul.menu > li.goso-mega-menu > a:after{width: 9xp;}.goso-post-gallery-container .caption { opacity:0; }.goso-owl-carousel:not(.owl-loaded){display:block}.goso-owl-carousel:not(.owl-loaded)>div,.goso-owl-carousel:not(.owl-loaded)>img,.goso-owl-carousel:not(.owl-loaded)>figure,.goso-owl-carousel:not(.owl-loaded) .goso-featured-content-right{display:none}.goso-owl-carousel:not(.owl-loaded)>div:first-child,.goso-owl-carousel:not(.owl-loaded)>figure:first-child,.goso-owl-carousel:not(.owl-loaded)>img:first-child{display:block}.featured-style-2 .goso-owl-carousel:not(.owl-loaded)>.item{width:900px;margin-left:auto;margin-right:auto}.featured-style-38 .goso-owl-carousel:not(.owl-loaded)>.item{width:450px;width:25vw;margin-left:auto;margin-right:auto;position:relative}@media only screen and (max-width:1200px){.featured-style-38 .goso-owl-carousel:not(.owl-loaded)>.item{width:400px}}@media only screen and (max-width:960px){.featured-style-2 .goso-owl-carousel:not(.owl-loaded)>.item{width:760px}}@media only screen and (max-width:767px){.featured-style-2 .goso-owl-carousel:not(.owl-loaded)>.item{width:480px}}@media only screen and (max-width:479px){.featured-style-2 .goso-owl-carousel:not(.owl-loaded)>.item,.featured-style-38 .goso-owl-carousel:not(.owl-loaded)>.item{width:360px}}.goso-owl-carousel:not(.owl-loaded) .goso-featured-content{display:none}.goso-owl-carousel:not(.owl-loaded):before,.goso-owl-carousel:not(.owl-loaded):after{content:"";clear:both;display:table}.goso-owl-carousel.goso-headline-posts:not(.owl-loaded):before,.goso-owl-carousel.goso-headline-posts:not(.owl-loaded):after{content:none;clear:none;display:none}@media only screen and (min-width:1170px){.goso-owl-carousel:not(.owl-loaded)[data-item="4"]>div{width:25%;float:left}.goso-owl-carousel:not(.owl-loaded)[data-item="4"]>div:nth-child(2),.goso-owl-carousel:not(.owl-loaded)[data-item="4"]>div:nth-child(3),.goso-owl-carousel:not(.owl-loaded)[data-item="4"]>div:nth-child(4){display:block}.goso-owl-carousel:not(.owl-loaded)[data-item="3"]>div{width:33.3333%;float:left}.goso-owl-carousel:not(.owl-loaded)[data-item="3"]>div:nth-child(2),.goso-owl-carousel:not(.owl-loaded)[data-item="3"]>div:nth-child(3){display:block}.goso-owl-carousel:not(.owl-loaded)[data-item="2"]>div{width:50%;float:left}.goso-owl-carousel:not(.owl-loaded)[data-item="2"]>div:nth-child(2){display:block}}@media only screen and (max-width:1169px) and (min-width:769px){.goso-owl-carousel:not(.owl-loaded)[data-tablet="4"]>div{width:25%;float:left}.goso-owl-carousel:not(.owl-loaded)[data-tablet="4"]>div:nth-child(2),.goso-owl-carousel:not(.owl-loaded)[data-tablet="4"]>div:nth-child(3),.goso-owl-carousel:not(.owl-loaded)[data-tablet="4"]>div:nth-child(4){display:block}.goso-owl-carousel:not(.owl-loaded)[data-tablet="3"]>div{width:33.3333%;float:left}.goso-owl-carousel:not(.owl-loaded)[data-tablet="3"]>div:nth-child(2),.goso-owl-carousel:not(.owl-loaded)[data-tablet="3"]>div:nth-child(3){display:block}.goso-owl-carousel:not(.owl-loaded)[data-tablet="2"]>div{width:50%;float:left}.goso-owl-carousel:not(.owl-loaded)[data-tablet="2"]>div:nth-child(2){display:block}}@media only screen and (max-width:768px) and (min-width:481px){.goso-owl-carousel:not(.owl-loaded)[data-tabsmall="4"]>div{width:25%;float:left}.goso-owl-carousel:not(.owl-loaded)[data-tabsmall="4"]>div:nth-child(2),.goso-owl-carousel:not(.owl-loaded)[data-tabsmall="4"]>div:nth-child(3),.goso-owl-carousel:not(.owl-loaded)[data-tabsmall="4"]>div:nth-child(4){display:block}.goso-owl-carousel:not(.owl-loaded)[data-tabsmall="3"]>div{width:33.3333%;float:left}.goso-owl-carousel:not(.owl-loaded)[data-tabsmall="3"]>div:nth-child(2),.goso-owl-carousel:not(.owl-loaded)[data-tabsmall="3"]>div:nth-child(3){display:block}.goso-owl-carousel:not(.owl-loaded)[data-tabsmall="2"]>div{width:50%;float:left}.goso-owl-carousel:not(.owl-loaded)[data-tabsmall="2"]>div:nth-child(2){display:block}}.goso-go-to-top-floating{transform:translate3d(0,60px,0);-webkit-transform:translate3d(0,60px,0)}.goso-rlt-popup{-webkit-transform:translate(0,100%);transform:translate(0,100%)}.pctopbar-login-btn{display:inline-block;vertical-align:top;}@media only screen and (min-width: 1170px){.goso-top-bar{height: 32px;}}';
		if ( 'header-3' == get_theme_mod( 'goso_header_layout' ) ) {
			$css .= '#header .inner-header{height: 155px;}@media only screen and (max-width: 479px){#header .inner-header { height: 207px; }}';
		}
		if ( get_theme_mod( 'goso_speed_criticalcss' ) ) {
			$add_criticalcss    = get_theme_mod( 'goso_speed_criticalcss' );
			$minify_criticalcss = trim( preg_replace( '/\s+/', ' ', $add_criticalcss ) );
			$css                .= $minify_criticalcss;
		}

		return $css;
	}, 10, 2 );

	add_action( 'hpp_print_initjs', function () {
		?>
        _HWIO.docReady(function(){
        document.querySelectorAll('.goso-lazy').forEach(function(e){e.classList.add('lazy');})
        document.addEventListener('lazybeforeunveil', function(e){
        var bg = e.target.getAttribute('data-src');
        if(bg && ['a','span','div', 'footer','figure'].indexOf(e.target.tagName.toLowerCase())!==-1){
        e.target.style.backgroundImage = 'url(' + bg + ')';
        e.target.removeAttribute("data-src");
        }
        });
        });
		<?php if ( get_theme_mod( 'goso_speed_showbg' ) ): ?>
            _HWIO.docReady(function(){
            document.querySelector('style[media="not all"]').removeAttribute('media');
            });
		<?php
		endif; /* End check if showing BG on GG Page Speed Preview */
	} );

	/* Disalbe other speed optimizer if enable speed optimizer is checked */
	/*
	add_filter( 'theme_mod_goso_topbar_mega_disable_lazy', function(){ return true; } );
	add_filter( 'theme_mod_goso_disable_lazyload_slider', function(){ return true; } );
	add_filter( 'theme_mod_goso_disable_lazyload_layout', function(){ return true; } );
	add_filter( 'theme_mod_goso_disable_lazyload_single', function(){ return true; } );
	*/
	add_filter( 'theme_mod_goso_spcss_render', function () {
		return 'inline';
	} );
	add_filter( 'theme_mod_goso_preload_font_icons', function () {
		return false;
	} );
	add_filter( 'theme_mod_goso_preload_google_fonts', function () {
		return false;
	} );
	add_filter( 'theme_mod_goso_speed_move_icons', function () {
		return false;
	} );
	add_filter( 'theme_mod_goso_preload_all_stylesheets', function () {
		return false;
	} );
	add_filter( 'theme_mod_goso_preload_exclude_name', function () {
		return '';
	} );
	add_filter( 'theme_mod_goso_preload_include_name', function () {
		return '';
	} );
	add_filter( 'theme_mod_goso_speed_move_jquery_footer', function () {
		return false;
	} );
	add_filter( 'theme_mod_goso_speed_lazy_adsense', function () {
		return false;
	} );
	add_filter( 'theme_mod_goso_speed_add_defer', function () {
		return false;
	} );
	add_filter( 'theme_mod_goso_speed_add_more_defer', function () {
		return '';
	} );
	add_filter( 'theme_mod_goso_speed_html_minify', function () {
		return false;
	} );

	if ( get_theme_mod( 'goso_speed_disablelazyvideo' ) ) {
		//turn off lazy for all video
		add_filter( 'hpp_allow_lazy_video', '__return_false' );

		/**
		 * @param $ok - 0/false: disable lazy
		 * @param $str - embed code
		 */
		add_filter( 'hpp_allow_lazy_video', function ( $ok, $str ) {
			return $ok;
		}, 10, 2 );
	}

	add_filter( 'oembed_result', function ( $iframe_html, $video_url, $frame_attributes ) {
		//leave iframe tag but use lazyload feature
		return hpp_lazy_video( $iframe_html, 2 );
	}, 20, 3 );

	/* Exclude CSS from lazyload images/iframe */
	if ( get_theme_mod( 'goso_speed_excludelazyload' ) ) {
		add_filter( 'hpp_disallow_lazyload', function ( $ok, $tag ) {
			$exclude_lazy         = get_theme_mod( 'goso_speed_excludelazyload' );
			$exclude_lazy_options = explode( ",", str_replace( ' ', '', $exclude_lazy ) );
			$exclude_default      = array( 'pc-hdbanner3', 'goso-mainlogo', 'pc-singlep-img' );
			$exclude_lazy_array   = array_merge( $exclude_lazy_options, $exclude_default );
			//class,src,srcset,.. ->attributes
			foreach ( $exclude_lazy_array as $val1 ) {
				if ( strpos( $tag, $val1 ) !== false ) {
					return 1;
				}
			}

			return $ok;
		}, 10, 2 );

		add_filter( 'hpp_disallow_lazyload_attr', function ( $ok, $tag ) {
			$exclude_lazy         = get_theme_mod( 'goso_speed_excludelazyload' );
			$exclude_lazy_options = explode( ",", str_replace( ' ', '', $exclude_lazy ) );
			$exclude_default      = array( 'pc-hdbanner3', 'goso-mainlogo', 'pc-singlep-img' );
			$exclude_lazy_array   = array_merge( $exclude_lazy_options, $exclude_default );
			foreach ( $exclude_lazy_array as $val2 ) {
				if ( strpos( $tag['class'], $val2 ) !== false ) {
					return 1;
				}
			}

			return $ok;
		}, 10, 2 );
	} else {
		add_filter( 'hpp_disallow_lazyload', function ( $ok, $tag ) {
			$exclude_lazy_array = array( 'pc-hdbanner3', 'goso-mainlogo', 'pc-singlep-img' );
			//class,src,srcset,.. ->attributes
			foreach ( $exclude_lazy_array as $val1 ) {
				if ( strpos( $tag, $val1 ) !== false ) {
					return 1;
				}
			}

			return $ok;
		}, 10, 2 );

		add_filter( 'hpp_disallow_lazyload_attr', function ( $ok, $tag ) {
			$exclude_lazy_array = array( 'pc-hdbanner3', 'goso-mainlogo', 'pc-singlep-img' );
			foreach ( $exclude_lazy_array as $val2 ) {
				if ( strpos( $tag['class'], $val2 ) !== false ) {
					return 1;
				}
			}

			return $ok;
		}, 10, 2 );
	}

} /* End check should lazy */

if ( ! function_exists( 'goso_get_html_animation_loading' ) ) {
	function goso_get_html_animation_loading( $style_animation ) {

		$style_animation = $style_animation == 'df' ? get_theme_mod( 'goso_block_lajax', 's9' ) : $style_animation;

		$animation = array(
			's1' => '<div class="goso-loader-effect goso-loading-animation-1"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div></div>',
			's2' => '<div class="goso-loader-effect goso-loading-animation-2"><div class="goso-loading-animation"></div></div>',
			's3' => '<div class="goso-loader-effect goso-loading-animation-3"><div class="goso-loading-animation"></div></div>',
			's4' => '<div class="goso-loader-effect goso-loading-animation-4"><div class="goso-loading-animation"></div></div>',
			's5' => '<div class="goso-loader-effect goso-loading-animation-5 goso-three-bounce"><div class="goso-loading-animation one"></div><div class="goso-loading-animation two"></div><div class="goso-loading-animation three"></div></div>',
			's6' => '<div class="goso-loader-effect goso-loading-animation-6 goso-load-thecube"><div class="goso-loading-animation goso-load-cube goso-load-c1"></div><div class="goso-loading-animation goso-load-cube goso-load-c2"></div><div class="goso-loading-animation goso-load-cube goso-load-c4"></div><div class="goso-loading-animation goso-load-cube goso-load-c3"></div></div>',
			's7' => '<div class="goso-loader-effect goso-loading-animation-7"><div class="goso-loading-animation"></div><div class="goso-loading-animation goso-loading-animation-inner-2"></div><div class="goso-loading-animation goso-loading-animation-inner-3"></div><div class="goso-loading-animation goso-loading-animation-inner-4"></div><div class="goso-loading-animation goso-loading-animation-inner-5"></div><div class="goso-loading-animation goso-loading-animation-inner-6"></div><div class="goso-loading-animation goso-loading-animation-inner-7"></div><div class="goso-loading-animation goso-loading-animation-inner-8"></div><div class="goso-loading-animation goso-loading-animation-inner-9"></div></div>',
			's8' => '<div class="goso-loader-effect goso-loading-animation-8"><div class="goso-loading-animation"></div><div class="goso-loading-animation goso-loading-animation-inner-2"></div></div>',
			's9' => '<div class="goso-loader-effect goso-loading-animation-9"> <div class="goso-loading-circle"> <div class="goso-loading-circle1 goso-loading-circle-inner"></div> <div class="goso-loading-circle2 goso-loading-circle-inner"></div> <div class="goso-loading-circle3 goso-loading-circle-inner"></div> <div class="goso-loading-circle4 goso-loading-circle-inner"></div> <div class="goso-loading-circle5 goso-loading-circle-inner"></div> <div class="goso-loading-circle6 goso-loading-circle-inner"></div> <div class="goso-loading-circle7 goso-loading-circle-inner"></div> <div class="goso-loading-circle8 goso-loading-circle-inner"></div> <div class="goso-loading-circle9 goso-loading-circle-inner"></div> <div class="goso-loading-circle10 goso-loading-circle-inner"></div> <div class="goso-loading-circle11 goso-loading-circle-inner"></div> <div class="goso-loading-circle12 goso-loading-circle-inner"></div> </div> </div>',
		);

		return isset( $animation[ $style_animation ] ) ? $animation[ $style_animation ] : $animation[9];
	}
}
if ( ! function_exists( 'goso_add_postviews_col' ) ) {
	add_filter( 'manage_post_posts_columns', 'goso_add_postviews_col' );
	function goso_add_postviews_col( $columns ) {
		$columns['goso_thumbnail'] = __( 'Thumbnail', 'authow' );
		$columns['goso_views']     = '<span title="Total Views" class="dashicons dashicons-chart-bar"></span><span class="dash-title title">Total Views</span>';

		return $columns;
	}
}

if ( ! function_exists( 'goso_register_totalview_sortable' ) ) {
	function goso_register_totalview_sortable( $columns ) {
		$columns['goso_views'] = 'views';

		return $columns;
	}
}
add_filter( 'manage_edit-post_sortable_columns', 'goso_register_totalview_sortable' );

if ( ! function_exists( 'goso_register_totalview_order' ) ) {
	add_action( 'pre_get_posts', 'goso_register_totalview_order' );
	function goso_register_totalview_order( $query ) {
		if ( ! is_admin() ) {
			return;
		}

		$orderby = $query->get( 'orderby' );

		if ( 'views' == $orderby ) {
			$count_key = goso_get_postviews_key();
			$query->set( 'meta_key', $count_key );
			$query->set( 'orderby', 'meta_value_num' );
		}
	}
}

if ( ! function_exists( 'goso_posts_column_order' ) ) {
	add_filter( 'manage_post_posts_columns', 'goso_posts_column_order' );
	function goso_posts_column_order( $columns ) {
		$n_columns = array();
		$move      = 'goso_thumbnail'; // what to move
		$before    = 'title'; // move before this
		foreach ( $columns as $key => $value ) {
			if ( $key == $before ) {
				$n_columns[ $move ] = $move;
			}
			$n_columns[ $key ] = $value;
		}

		return $n_columns;
	}
}

if ( ! function_exists( 'goso_add_postviews_col_content' ) ) {
	add_action( 'manage_post_posts_custom_column', 'goso_add_postviews_col_content', 10, 2 );
	function goso_add_postviews_col_content( $column, $post_id ) {
		switch ( $column ) {
			case 'goso_views' :

				$count_key = goso_get_postviews_key();
				$count     = get_post_meta( $post_id, $count_key, true );

				echo $count;
				break;
			case 'goso_thumbnail':
				if ( has_post_thumbnail( $post_id ) ) {
					echo wp_get_attachment_image( get_post_thumbnail_id( $post_id ), [ 50, 50 ] );
				} else {
					echo '<img width="50" height="50" src="' . get_template_directory_uri() . '/images/nothumb.jpg" alt=""/>';
				}
				break;
		}
	}
}