<?php

use function Authow\Table_Of_Contents\String\mb_find_replace;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'GosoTOC' ) ) {
	/**
	 * Class GosoTOC
	 */
	final class GosoTOC {
		private static $instance;
		private static $store = array();

		public function __construct() { /* Do nothing here */
		}

		public static function instance() {
			global $post;
			if ( ! self::is_eligible( $post ) || ! is_singular() ) {
				return false;
			}
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
				self::$instance = new self;
				self::includes();
				self::hooks();
			}

			return self::$instance;
		}

		private static function includes() {
			require_once( get_template_directory() . '/inc/toc/progress.php' );
			require_once( get_template_directory() . '/inc/toc/helper.php' );
		}

		private static function hooks() {
			add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueueScripts' ) );
			// Run after shortcodes are interpreted (priority 10).
			add_filter( 'the_content', array( __CLASS__, 'the_content' ), 100 );
			add_shortcode( 'goso-toc', array( __CLASS__, 'shortcode' ) );
			add_shortcode( apply_filters( 'goso_toc_shortcode', 'toc' ), array( __CLASS__, 'shortcode' ) );
			add_action( 'authow_theme/custom_css', array( __CLASS__, 'goso_toc_style' ) );
		}

		public static function enqueueScripts() {
			$js_vars = array();
			wp_enqueue_script( 'js-cookies' );
			wp_register_script( 'goso-smoothscroll', get_template_directory_uri() . '/js/smooth-scroll.min.js', array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );
			wp_register_script( 'goso-toc-lib', get_template_directory_uri() . '/inc/toc/goso-toc.js', array(
				'jquery',
				'js-cookies',
				'goso-smoothscroll',
			), GOSO_SOLEDAD_VERSION, true );
			if ( get_theme_mod( 'goso_toc_smooth_scroll', true ) ) {
				$js_vars['smooth_scroll'] = true;
			}
			if ( goso_get_setting( 'goso_toc_heading_text' ) && ! get_theme_mod( 'goso_toc_visibility' ) ) {
				$width                                 = get_theme_mod( 'goso_toc_styles_width', '320' ) . 'px';
				$js_vars['visibility_hide_by_default'] = get_theme_mod( 'goso_toc_visibility_hide_by_default' );
				$js_vars['width']                      = esc_js( $width );
			}
			$prefix                   = get_theme_mod( 'goso_toc_prefix', 'goso' );
			$js_vars['prefix']        = (string) $prefix ? $prefix : '';
			$offset                   = wp_is_mobile() ? get_theme_mod( 'goso_toc_mobile_smooth_scroll_offset', 90 ) : get_theme_mod( 'goso_toc_smooth_scroll_offset', 120 );
			$js_vars['scroll_offset'] = esc_js( $offset );
			if ( ! empty( $js_vars ) ) {
				wp_enqueue_script( 'goso-toc-lib' );
				wp_localize_script( 'goso-toc-lib', 'GosoTOC', $js_vars );
			}
		}

		public static function array_search_deep( $search, array $array, $mode = 'value' ) {
			foreach ( new RecursiveIteratorIterator( new RecursiveArrayIterator( $array ) ) as $key => $value ) {
				if ( $search === ${${"mode"}} ) {
					return true;
				}
			}

			return false;
		}

		public static function is_eligible( $post ) {
			if ( empty( $post ) || ! $post instanceof WP_Post ) {
				return false;
			}
			if ( has_shortcode( $post->post_content, apply_filters( 'goso_toc_shortcode', 'toc' ) ) || has_shortcode( $post->post_content, 'goso-toc' ) ) {
				return true;
			}
			if ( is_front_page() ) {
				return false;
			}
			$type    = get_post_type( $post->ID );
			$enabled = get_theme_mod( 'goso_toc_enabled_post_types' ) && in_array( $type, get_theme_mod( 'goso_toc_enabled_post_types', array() ), true );

			if ( $enabled && is_singular( $type ) ) {
				return true;
			}

			if ( 'yes' == get_post_meta( $post->ID, 'goso_toc_enable', true ) ) {
				return true;
			}

			return false;
		}

		public static function get( $id ) {
			$post = null;
			if ( isset( self::$store[ $id ] ) && self::$store[ $id ] instanceof AuthowToc_Post ) {
				$post = self::$store[ $id ];
			} else {
				$post = AuthowToc_Post::get( get_the_ID() );
				if ( $post instanceof AuthowToc_Post ) {
					self::$store[ $id ] = $post;
				}
			}

			return $post;
		}

		public static function shortcode( $atts, $content, $tag ) {
			static $run = true;
			$html = '';
			if ( $run ) {
				$post = self::get( get_the_ID() );
				if ( ! $post instanceof AuthowToc_Post ) {
					return $content;
				}
				$html = $post->getTOC();
				$run  = false;
			}

			return $html;
		}

		private static function maybeApplyTheContentFilter() {
			$apply = true;
			global $wp_current_filter;
			// Do not execute if root current filter is one of those in the array.
			if ( in_array( $wp_current_filter[0], array( 'get_the_excerpt', 'init', 'wp_head' ), true ) ) {
				$apply = false;
			}
			// bail if feed, search or archive
			if ( is_feed() || is_search() || is_archive() ) {
				$apply = false;
			}

			return apply_filters( 'goso_toc_maybe_apply_the_content_filter', $apply );
		}

		public static function the_content( $content ) {
			$maybeApplyFilter = self::maybeApplyTheContentFilter();
			if ( ! $maybeApplyFilter ) {
				return $content;
			}
			// Bail if post not eligible and widget is not active.
			$isEligible = self::is_eligible( get_post() );
			if ( ! $isEligible && ! is_active_widget( false, false, 'gosow_tco' ) ) {
				return $content;
			}
			$post = self::get( get_the_ID() );
			if ( ! $post instanceof AuthowToc_Post ) {
				return $content;
			}
			// Bail if no headings found.
			if ( ! $post->hasTOCItems() ) {
				return $content;
			}
			$find    = $post->getHeadings();
			$replace = $post->getHeadingsWithAnchors();
			$toc     = $post->getTOC();            // If shortcode used or post not eligible, return content with anchored headings.
			if ( strpos( $content, 'goso-toc-container' ) || ! $isEligible ) {
				return mb_find_replace( $find, $replace, $content );
			}
			$position = get_theme_mod( 'goso_toc_position', 'top' );            // else also add toc to content
			switch ( $position ) {
				case 'top':
					$content = $toc . mb_find_replace( $find, $replace, $content );
					break;
				case 'bottom':
					$content = mb_find_replace( $find, $replace, $content ) . $toc;
					break;
				case 'after':
					$replace[0] = $replace[0] . $toc;
					$content    = mb_find_replace( $find, $replace, $content );
					break;
				case 'before':
				default:
					//$replace[0] = $html . $replace[0];
					$content = mb_find_replace( $find, $replace, $content );
					/**
					 * @link https://wordpress.org/support/topic/php-notice-undefined-offset-8/
					 */
					if ( ! array_key_exists( 0, $replace ) ) {
						break;
					}
					$pattern = '`<h[1-6]{1}[^>]*' . preg_quote( $replace[0], '`' ) . '`msuU';
					$result  = preg_match( $pattern, $content, $matches );
					/*
					 * Try to place TOC before the first heading found in eligible heading, failing that,
					 * insert TOC at top of content.
					 */
					if ( 1 === $result ) {
						$start   = strpos( $content, $matches[0] );
						$content = substr_replace( $content, $toc, $start, 0 );
					}
			}

			return $content;
		}

		public static function goso_toc_style() {
			$css       = '';
			$toc_style = [
				'goso_toc_styles_width'          => [ 'max-width' => '.goso-toc-wrapper,.goso-toc-wrapper.goso-toc-default' ],
				'goso_toc_styles_swidth'         => [ 'max-width' => '.goso-sticky-toc' ],
				'goso_toc_heading_mfs'           => [ 'font-size' => '.goso-toc-wrapper .goso-toc-title' ],
				'goso_toc_heading_fs'            => [ 'font-size' => '.goso-toc-wrapper .goso-toc-title' ],
				'goso_toc_l1_mfs'                => [ 'font-size' => '.post-entry .goso-toc ul a,.goso-toc ul a' ],
				'goso_toc_l1_fs'                 => [ 'font-size' => '.post-entry .goso-toc ul a,.goso-toc ul a' ],
				'goso_toc_l2_mfs'                => [ 'font-size' => '.post-entry .goso-toc ul ul a,.goso-toc ul ul a' ],
				'goso_toc_l2_fs'                 => [ 'font-size' => '.post-entry .goso-toc ul ul a,.goso-toc ul ul a' ],
				'goso_toc_heading_color'         => [ 'color' => '.post-entry .goso-toc-wrapper .goso-toc-title,.goso-toc-wrapper .goso-toc-title' ],
				'goso_toc_l1_color'              => [ 'color' => '.post-entry .goso-toc ul a,.goso-toc ul a' ],
				'goso_toc_l1_hcolor'             => [ 'color' => '.post-entry .goso-toc ul a:hover,.goso-toc ul a:hover' ],
				'goso_toc_l2_color'              => [ 'color' => '.post-entry .goso-toc ul ul a,.goso-toc ul ul a' ],
				'goso_toc_l2_hcolor'             => [ 'color' => '.post-entry .goso-toc ul ul a:hover,.goso-toc ul ul a:hover' ],
				'goso_toc_bd_color'              => [ 'border-color' => '.goso-toc-wrapper,.goso-toc-wrapper .goso-toc > ul,.goso-toc ul li a' ],
				'goso_toc_bg_color'              => [ 'background-color' => '.goso-toc-wrapper' ],
				'goso_toc_tgbtn_color'           => [ 'color' => '.post-entry .goso-toc-wrapper .goso-toc-title-toggle' ],
				'goso_toc_tgbtn_hcolor'          => [ 'color' => '.post-entry .goso-toc-wrapper .goso-toc-title-toggle:hover' ],
				'goso_toc_tgbtn_bgcolor'         => [ 'background-color' => '.goso-toc-wrapper .goso-toc-title-toggle' ],
				'goso_toc_tgbtn_hbgcolor'        => [ 'background-color' => '.goso-toc-wrapper .goso-toc-title-toggle:hover' ],

				// sticky
				'goso_toc_sticky_heading_color'  => [ 'color' => '.goso-toc-wrapper.goso-sticky-toc .goso-toc-title' ],
				'goso_toc_sticky_l1_color'       => [ 'color' => '.goso-sticky-toc .goso-toc ul a' ],
				'goso_toc_sticky_l1_hcolor'      => [ 'color' => '.goso-sticky-toc .goso-toc ul a:hover' ],
				'goso_toc_sticky_l2_color'       => [ 'color' => '.goso-sticky-toc .goso-toc ul ul a' ],
				'goso_toc_sticky_l2_hcolor'      => [ 'color' => '.goso-sticky-toc .goso-toc ul ul a:hover' ],
				'goso_toc_sticky_bd_color'       => [ 'border-color' => '.goso-sticky-toc .goso-toc-wrapper,.goso-toc-wrapper .goso-toc > ul,.goso-toc ul li a' ],
				'goso_toc_sticky_bg_color'       => [ 'background-color' => '.goso-sticky-toc .goso-toc-wrapper' ],
				'goso_toc_sticky_tgbtn_color'    => [ 'color' => '.goso-sticky-toc .goso-toc-wrapper .goso-toc-title-toggle' ],
				'goso_toc_sticky_tgbtn_hcolor'   => [ 'color' => '.goso-sticky-toc .goso-toc-wrapper .goso-toc-title-toggle:hover' ],
				'goso_toc_sticky_tgbtn_bgcolor'  => [ 'background-color' => '.goso-sticky-toc .goso-toc-wrapper .goso-toc-title-toggle' ],
				'goso_toc_sticky_tgbtn_hbgcolor' => [ 'background-color' => '.goso-sticky-toc .goso-toc-wrapper .goso-toc-title-toggle:hover' ],

				// Mobile Sticky Button
				'goso_toc_msticky_w_bgcolor'     => [ 'background-color' => '.goso-toc-wrapper.hide-table' ],
				'goso_toc_msticky_w_bdcolor'     => [ 'border-color' => '.goso-toc-wrapper.hide-table' ],
				'goso_toc_msticky_btn_bgcolor'   => [ 'background-color' => '.goso-toc-wrapper.hide-table .sticky-toggle' ],
				'goso_toc_msticky_btn_bghcolor'  => [ 'background-color' => '.goso-toc-wrapper.hide-table .sticky-toggle:hover' ],
				'goso_toc_msticky_btn_color'     => [ 'color' => '.goso-toc-wrapper.hide-table .sticky-toggle' ],
				'goso_toc_msticky_btn_hcolor'    => [ 'color' => '.goso-toc-wrapper.hide-table .sticky-toggle:hover' ],


			];
			foreach ( $toc_style as $value => $props ) {
				$before = $after = '';
				if ( strpos( $value, 'm' ) !== false ) {
					$before = '@media only screen and (max-width: 767px){';
					$after  = '}';
				}
				$val = get_theme_mod( $value );
				if ( $val ) {
					foreach ( $props as $prop => $selector ) {
						$prefix = 'font-size' == $prop || 'max-width' == $prop ? 'px' : '';
						$css    .= $before . $selector . '{' . $prop . ':' . $val . $prefix . '}' . $after;
					}
				}
			}

			echo $css;
		}
	}

	function gosoTOC() {
		return gosoTOC::instance();
	}

	add_action( 'wp', 'gosoTOC' );
}
