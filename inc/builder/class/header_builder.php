<?php
/**
 * @author : GosoDesign
 */

/**
 * Class Goso Header Builder
 */
class HeaderBuilder {
	/**
	 * @var HeaderBuilder
	 */
	private static $instance = null;

	public function __construct() {
		add_action( 'init', array( $this, 'builder_post_type' ) );
		add_action( 'customize_controls_print_footer_scripts', array( $this, 'header_builder_html' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'header_builder_js' ), 900 );
		add_action( 'wp_ajax_save_header_builder', array( $this, 'save_header_builder' ) );
		add_action( 'wp_ajax_get_header_builder', array( $this, 'get_header_builder' ) );
		add_action( 'wp_ajax_get_header_builder_custom_css', [ $this, 'get_css' ] );

		add_action( 'customize_register', array( $this, 'register_customizer_settings' ) );
		add_action( 'admin_init', array( $this, 'clear_settings' ) );
		add_action( 'admin_init', array( $this, 'preview_customize' ) );
		add_action( 'edit_form_after_title', [ $this, 'goso_builder_editpost_link' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'goso_builder_admin_css' ] );
		add_filter( 'customize_loaded_components', [ $this, 'customizer_cleaner' ] );
		add_filter( 'display_post_states', [ $this, 'goso_dashboard_title' ], 10, 2 );
		add_filter( 'post_type_link', [ $this, 'change_link' ], 10, 2 );
		add_filter( 'post_row_actions', [ $this, 'add_edit_link' ], 10, 2 );
		add_filter( 'template_include', [ $this, 'header_template' ] );
		add_filter( 'body_class', [ $this, 'preview_body_class' ], 10, 1 );
		add_action( 'customize_preview_init', [ $this, 'live_preview' ] );
	}

	/**
	 * @return HeaderBuilder
	 */
	public static function getInstance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	public static function remain_desktop_header_element() {
		return self::remain_desktop( 'goso_hb_element_desktop' );
	}

	public static function remain_desktop( $setting_prefix ) {
		$all_element = self::desktop_header_element();

		$rows_desktop    = array( 'topblock', 'top', 'mid', 'bottom', 'bottomblock' );
		$columns_desktop = array( 'left', 'center', 'right' );

		if ( $setting_prefix === 'goso_hb_element_desktop_sticky' ) {
			$rows_desktop = array( 'top', 'mid', 'bottom' );
		}

		$mobile_element = [
			'pb_logo_mobile',
			'pb_mobile_menu',
			'pb_social_icon_mobile',
			'pb_button_mobile',
			'pb_button_mobile_2',
			'pb_html_ad_mobile',
			'pb_html_ad_mobile_2',
			'pb_shortcode_mobile',
			'pb_vertical_line_mobile_1',
			'pb_vertical_line_mobile_2',
		];

		foreach ( $rows_desktop as $row ) {
			foreach ( $columns_desktop as $column ) {
				$setting_element = "{$setting_prefix}_{$row}_{$column}";
				$default_element = goso_get_builder_mod( $setting_element, '' );
				$default_element = $default_element ? explode( ',', $default_element ) : $default_element;
				if ( is_array( $default_element ) ) {
					$default_element = array_merge( $default_element, $mobile_element );
					foreach ( $default_element as $element ) {
						unset( $all_element[ $element ] );
					}
				}
			}
		}

		return $all_element;
	}

	public static function desktop_header_element() {
		$elements = array(
			'pb_logo'            => esc_attr__( 'Logo', 'authow' ),
			'pb_logo_sticky'     => esc_attr__( 'Sticky Logo', 'authow' ),
			'pb_main_menu'       => esc_attr__( 'Menu 1', 'authow' ),
			'pb_second_menu'     => esc_attr__( 'Menu 2', 'authow' ),
			'pb_third_menu'      => esc_attr__( 'Menu 3', 'authow' ),
			'pb_date_time'       => esc_attr__( 'Date Time', 'authow' ),
			'pb_search_icon'     => esc_attr__( 'Search Icon', 'authow' ),
			'pb_search_form'     => esc_attr__( 'Search Form', 'authow' ),
			'pb_social_icon'     => esc_attr__( 'Social Icon', 'authow' ),
			'pb_button'          => esc_attr__( 'Button 1', 'authow' ),
			'pb_button_2'        => esc_attr__( 'Button 2', 'authow' ),
			'pb_button_3'        => esc_attr__( 'Button 3', 'authow' ),
			'pb_news_ticker'     => esc_attr__( 'News Ticker', 'authow' ),
			'pb_hamburger_menu'  => esc_attr__( 'Hamburger Menu', 'authow' ),
			'pb_login_register'  => esc_attr__( 'Login/Register', 'authow' ),
			'pb_block'           => esc_attr__( 'Goso Block 1', 'authow' ),
			'pb_block_2'         => esc_attr__( 'Goso Block 2', 'authow' ),
			'pb_html_ad'         => esc_attr__( 'Custom HTML 1', 'authow' ),
			'pb_html_ad_2'       => esc_attr__( 'Custom HTML 2', 'authow' ),
			'pb_html_ad_3'       => esc_attr__( 'Custom HTML 3', 'authow' ),
			'pb_shortcode'       => esc_attr__( 'Shortcode 1', 'authow' ),
			'pb_shortcode_2'     => esc_attr__( 'Shortcode 2', 'authow' ),
			'pb_shortcode_3'     => esc_attr__( 'Shortcode 3', 'authow' ),
			'pb_vertical_line_1' => esc_attr__( 'Line Divider 1', 'authow' ),
			'pb_vertical_line_2' => esc_attr__( 'Line Divider 2', 'authow' ),
			'pb_vertical_line_3' => esc_attr__( 'Line Divider 3', 'authow' ),
			'pb_vertical_line_4' => esc_attr__( 'Line Divider 4', 'authow' ),
			'pb_vertical_line_5' => esc_attr__( 'Line Divider 5', 'authow' ),
		);
		if ( class_exists( 'WooCommerce' ) ) {
			$elements['pb_cart_icon']     = esc_attr__( 'Cart Icon', 'authow' );
			$elements['pb_compare_icon']  = esc_attr__( 'Compare Icon', 'authow' );
			$elements['pb_wishlist_icon'] = esc_attr__( 'WishList Icon', 'authow' );
		}

		return $elements;
	}

	public static function remain_sticky_header_element() {
		return self::remain_desktop( 'goso_hb_element_desktop_sticky' );
	}

	public static function remain_mobile_header_element() {
		$all_element = self::mobile_header_element();

		$blocks = array(
			'top' => array( 'center' ),
			'mid' => array( 'left', 'center', 'right' ),
		);

		foreach ( $blocks as $row => $columns ) {
			foreach ( $columns as $column ) {
				$setting_element = "goso_hb_element_mobile_{$row}_{$column}";
				$default_element = goso_get_builder_mod( $setting_element, array() );
				$default_element = $default_element ? explode( ',', $default_element ) : '';

				if ( is_array( $default_element ) ) {
					foreach ( $default_element as $element ) {
						unset( $all_element[ $element ] );
					}
				}
			}
		}

		return $all_element;
	}

	public static function mobile_header_element() {
		$elements = array(
			'pb_logo_mobile'            => esc_attr__( 'Mobile Logo', 'authow' ),
			'pb_mobile_menu'            => esc_attr__( 'Mobile Menu Icon', 'authow' ),
			'pb_date_time'              => esc_attr__( 'Date Time', 'authow' ),
			'pb_search_icon'            => esc_attr__( 'Search Icon', 'authow' ),
			'pb_search_form'            => esc_attr__( 'Search Form', 'authow' ),
			'pb_social_icon_mobile'     => esc_attr__( 'Social Icon', 'authow' ),
			'pb_button_mobile'          => esc_attr__( 'Mobile Button 1', 'authow' ),
			'pb_button_mobile_2'        => esc_attr__( 'Mobile Button 2', 'authow' ),
			'pb_news_ticker'            => esc_attr__( 'News Ticker', 'authow' ),
			'pb_hamburger_menu'         => esc_attr__( 'Hamburger Menu', 'authow' ),
			'pb_block'                  => esc_attr__( 'Goso Block 1', 'authow' ),
			'pb_block_2'                => esc_attr__( 'Goso Block 2', 'authow' ),
			'pb_html_ad_mobile'         => esc_attr__( 'Custom HTML', 'authow' ),
			'pb_html_ad_mobile_2'       => esc_attr__( 'Custom HTML 2', 'authow' ),
			'pb_shortcode_mobile'       => esc_attr__( 'Shortcode', 'authow' ),
			'pb_vertical_line_mobile_1' => esc_attr__( 'Line Divider 1', 'authow' ),
			'pb_vertical_line_mobile_2' => esc_attr__( 'Line Divider 2', 'authow' ),
		);
		if ( class_exists( 'WooCommerce' ) ) {
			$elements['pb_cart_icon']     = esc_attr__( 'Cart Icon', 'authow' );
			$elements['pb_compare_icon']  = esc_attr__( 'Compare Icon', 'authow' );
			$elements['pb_wishlist_icon'] = esc_attr__( 'WishList Icon', 'authow' );
		}

		return $elements;
	}

	public static function remain_mobile_drawer_element() {
		$all_element = self::mobile_drawer_element();

		$blocks = array(
			'top'    => array( 'center' ),
			'bottom' => array( 'center' ),
		);

		foreach ( $blocks as $row => $columns ) {
			foreach ( $columns as $column ) {
				$setting_element = "goso_hb_element_mobile_drawer_{$row}_{$column}";
				$default_element = goso_get_builder_mod( $setting_element, array() );
				$default_element = $default_element ? explode( ',', $default_element ) : '';

				if ( is_array( $default_element ) ) {
					foreach ( $default_element as $element ) {
						unset( $all_element[ $element ] );
					}
				}
			}
		}

		return $all_element;
	}

	public static function mobile_drawer_element() {
		return array(
			'pb_logo_sidebar'        => esc_attr__( 'Sidebar Logo', 'authow' ),
			'pb_dropdown_menu'       => esc_attr__( 'Mobile Sidebar Menu', 'authow' ),
			'pb_search_form_sidebar' => esc_attr__( 'Search Form Sidebar', 'authow' ),
			'pb_social_icon_mobile'  => esc_attr__( 'Social Icon', 'authow' ),
			'pb_html_ad_mobile'      => esc_attr__( 'Custom HTML', 'authow' ),
			'pb_html_ad_mobile_2'    => esc_attr__( 'Custom HTML 2', 'authow' ),
			'pb_date_time'           => esc_attr__( 'Date Time', 'authow' ),
			'pb_block'               => esc_attr__( 'Goso Block', 'authow' ),
			'pb_shortcode'           => esc_attr__( 'Shortcode', 'authow' ),
			'pb_button'              => esc_attr__( 'Button', 'authow' ),
		);
	}

	public static function goso_dashboard_title( $post_states, $post ) {

		if ( $post->post_type !== 'goso_builder' ) {
			return $post_states;
		}

		$header_all_id     = get_theme_mod( 'pchdbd_all' );
		$header_archive_id = get_theme_mod( 'pchdbd_archive' );
		$header_page_id    = get_theme_mod( 'pchdbd_page' );
		$header_post_id    = get_theme_mod( 'pchdbd_post' );
		$header_home_id    = get_theme_mod( 'pchdbd_homepage' );

		if ( $header_home_id && $post->post_name == $header_home_id ) {
			$post_states[] = esc_attr__( 'Homepage Header Template', 'authow' );
		}

		if ( $header_all_id && $post->post_name == $header_all_id ) {
			$post_states[] = esc_attr__( 'Entire Header Template', 'authow' );
		}

		if ( $header_archive_id && $post->post_name == $header_archive_id ) {
			$post_states[] = esc_attr__( 'Archive Header Template', 'authow' );
		}

		if ( $header_page_id && $post->post_name == $header_page_id ) {
			$post_states[] = esc_attr__( 'Pages Header Template', 'authow' );
		}

		if ( $header_post_id && $post->post_name == $header_post_id ) {
			$post_states[] = esc_attr__( 'Single Post Header Template', 'authow' );
		}

		return $post_states;
	}

	public static function register_all_elements(): array {
		$elements = array(
			'pb_logo'                   => esc_attr__( 'Logo Desktop', 'authow' ),
			'pb_logo_sticky'            => esc_attr__( 'Sticky Logo', 'authow' ),
			'pb_logo_sidebar'           => esc_attr__( 'Logo Sidebar', 'authow' ),
			'pb_main_menu'              => esc_attr__( 'Menu 1', 'authow' ),
			'pb_second_menu'            => esc_attr__( 'Menu 2', 'authow' ),
			'pb_third_menu'             => esc_attr__( 'Menu 3', 'authow' ),
			'pb_dropdown_menu'          => esc_attr__( 'Dropdown Menu', 'authow' ),
			'pb_mobile_menu'            => esc_attr__( 'Mobile Menu Button', 'authow' ),
			'pb_date_time'              => esc_attr__( 'Date Time', 'authow' ),
			'pb_search_icon'            => esc_attr__( 'Search Icon', 'authow' ),
			'pb_search_form'            => esc_attr__( 'Search Form', 'authow' ),
			'pb_search_form_sidebar'    => esc_attr__( 'Search Form Mobile', 'authow' ),
			'pb_social_icon'            => esc_attr__( 'Social Icon', 'authow' ),
			'pb_social_icon_mobile'     => esc_attr__( 'Social Icon', 'authow' ),
			'pb_button'                 => esc_attr__( 'Button 1', 'authow' ),
			'pb_button_2'               => esc_attr__( 'Button 2', 'authow' ),
			'pb_button_3'               => esc_attr__( 'Button 3', 'authow' ),
			'pb_news_ticker'            => esc_attr__( 'News Ticker', 'authow' ),
			'pb_hamburger_menu'         => esc_attr__( 'Hamburger Menu', 'authow' ),
			'pb_login_register'         => esc_attr__( 'Login/Register', 'authow' ),
			'pb_block'                  => esc_attr__( 'Goso Block 1', 'authow' ),
			'pb_block_2'                => esc_attr__( 'Goso Block 2', 'authow' ),
			'pb_html_ad'                => esc_attr__( 'Custom HTML 1', 'authow' ),
			'pb_html_ad_2'              => esc_attr__( 'Custom HTML 2', 'authow' ),
			'pb_html_ad_3'              => esc_attr__( 'Custom HTML 3', 'authow' ),
			'pb_shortcode'              => esc_attr__( 'Shortcode 1', 'authow' ),
			'pb_shortcode_2'            => esc_attr__( 'Shortcode 2', 'authow' ),
			'pb_shortcode_3'            => esc_attr__( 'Shortcode 3', 'authow' ),
			'pb_vertical_line_1'        => esc_attr__( 'Line Divider 1', 'authow' ),
			'pb_vertical_line_2'        => esc_attr__( 'Line Divider 2', 'authow' ),
			'pb_vertical_line_3'        => esc_attr__( 'Line Divider 3', 'authow' ),
			'pb_vertical_line_4'        => esc_attr__( 'Line Divider 4', 'authow' ),
			'pb_vertical_line_5'        => esc_attr__( 'Line Divider 5', 'authow' ),
			'pb_logo_mobile'            => esc_attr__( 'Logo Mobile', 'authow' ),
			'pb_mobile_nav'             => esc_attr__( 'Mobile Menu Navigation', 'authow' ),
			'pb_button_mobile'          => esc_attr__( 'Button 1', 'authow' ),
			'pb_button_mobile_2'        => esc_attr__( 'Button 2', 'authow' ),
			'pb_html_ad_mobile'         => esc_attr__( 'Custom HTML', 'authow' ),
			'pb_html_ad_mobile_2'       => esc_attr__( 'Custom HTML 2', 'authow' ),
			'pb_shortcode_mobile'       => esc_attr__( 'Shortcode', 'authow' ),
			'pb_vertical_line_mobile_1' => esc_attr__( 'Line Divider 1', 'authow' ),
			'pb_vertical_line_mobile_2' => esc_attr__( 'Line Divider 2', 'authow' ),
		);
		if ( class_exists( 'WooCommerce' ) ) {
			$elements['pb_cart_icon']     = esc_attr__( 'Cart Icon', 'authow' );
			$elements['pb_compare_icon']  = esc_attr__( 'Compare Icon', 'authow' );
			$elements['pb_wishlist_icon'] = esc_attr__( 'WishList Icon', 'authow' );
		}

		return $elements;
	}

	public function clear_settings() {
		global $wp_customize;
		if ( is_customize_preview() && isset( $_GET['layout_id'] ) ) {
			$panels   = $wp_customize->panels();
			$sections = $wp_customize->sections();
			$ex       = [
				'widgets',
				'nav_menus',
				'header_builder_config',
			];
			foreach ( $panels as $panel_id => $object ) {
				if ( ! in_array( $panel_id, $ex ) ) {
					$wp_customize->remove_panel( $panel_id );
				}
			}
			foreach ( $sections as $section_id => $object ) {
				if ( strpos( $section_id, 'goso_header_' ) === false ) {
					$wp_customize->remove_section( $section_id );
				}
			}
		} elseif ( is_customize_preview() ) {
			$wp_customize->remove_panel( 'header_builder_config' );
		}
	}

	public function register_customizer_settings( WP_Customize_Manager $wp_customize ) {
		require_once get_template_directory() . '/inc/builder/customizer/select2.php';
		require_once get_template_directory() . '/inc/builder/customizer/buider_config.php';
	}

	public function customizer_cleaner( $components ) {


		if ( isset( $_GET['layout_id'] ) && ! empty( $_GET['layout_id'] ) ) {
			$components = [];
		}

		return $components;
	}

	public function preview_customize() {
		global $wp_customize;
		$customizer_save = isset( $_GET['layout_id'] ) && ! empty( $_GET['layout_id'] ) ? $_GET['layout_id'] : '';
		if ( ! empty( $customizer_save ) ) {
			$header_data = get_post_meta( $customizer_save, 'settings_content', true );
			$header_data = wp_parse_args( $header_data, self::preview_default_data() );

			$mods         = get_theme_mods();
			$theme        = get_option( 'stylesheet' );
			$uncover_data = self::exclude_settings();

			foreach ( $mods as $theme_mod_id => $theme_mod_value ) {
				if ( strpos( $theme_mod_id, 'goso_header' ) !== false && ! in_array( $theme_mod_id, $uncover_data ) ) {
					unset( $mods[ $theme_mod_id ] );
				}
			}

			if ( is_array( $header_data ) && ! empty( $header_data ) ) {
				foreach ( $header_data as $save => $this_value ) {
					if ( ! in_array( $save, $uncover_data ) ) {
						unset( $mods[ $save ] );
						$mods[ $save ] = $this_value;
						$wp_customize->set_post_value( $save, $this_value );
					}
				}
			}
			update_option( "theme_mods_$theme", $mods );
		}
	}

	public function preview_default_data() {
		$default_element_data        = [];
		$builder_rows_desktop        = [ 'topblock', 'top', 'mid', 'bottom', 'bottomblock' ];
		$builder_rows_desktop_sticky = [ 'top' => 'Sticky Top', 'mid' => 'Sticky Middle', 'bottom' => 'Sticky Bottom' ];
		$builder_columns_desktop     = [ 'left', 'center', 'right' ];
		$builder_rows_mobile         = [ 'top', 'mid', 'bottom' ];
		$builder_columns_mobile      = [ 'left', 'center', 'right' ];
		$builder_row_sidebar         = [ 'top', 'bottom' ];
		$builder_columns_sidebar     = [ 'center' ];

		foreach ( $builder_rows_desktop as $row ) {
			foreach ( $builder_columns_desktop as $column ) {
				$default_element_data["goso_hb_element_desktop_{$row}_{$column}"] = "";
				$default_element_data["goso_hb_align_desktop_{$row}_{$column}"]   = $column;
			}
		}


		foreach ( $builder_rows_mobile as $row ) {
			foreach ( $builder_columns_mobile as $column ) {
				$default_element_data["goso_hb_element_mobile_{$row}_{$column}"] = "";
				$default_element_data["goso_hb_align_mobile_{$row}_{$column}"]   = $column;
			}
		}

		foreach ( $builder_rows_desktop_sticky as $row => $row_name ) {
			foreach ( $builder_columns_desktop as $column ) {
				$default_element_data["goso_hb_element_desktop_sticky_{$row}_{$column}"] = "";
				$default_element_data["goso_hb_align_desktop_sticky_{$row}_{$column}"]   = $column;
			}
		}

		foreach ( $builder_row_sidebar as $row ) {
			foreach ( $builder_columns_sidebar as $column ) {
				$default_element_data["goso_hb_element_mobile_drawer_{$row}_{$column}"] = "";
				$default_element_data["goso_hb_align_mobile_drawer_{$row}_{$column}"]   = $column;
			}
		}

		return $default_element_data;
	}

	public function exclude_settings() {
		return array(
			'goso_header_enable_transparent',
			'goso_header_padding',
			'goso_header_layout',
			'goso_header_menu_ani_style',
			'goso_header_ctwidth',
			'goso_header_3_banner',
			'goso_header_3_banner_url',
			'goso_header_3_adsense',
			'goso_header_social_check',
			'goso_header_social_brand',
			'goso_header_slogan_text',
			'goso_header_remove_line_slogan',
			'goso_header_menu_style',
			'goso_header_enable_padding',
			'goso_header_remove_line_hover',
			'goso_header_social_nav',
			'goso_header_hidesocial_nav',
			'goso_header_logo_mobile',
			'goso_header_logo_mobile_center',
			'goso_header_signup_padding',
			'goso_header_signup_fdesc',
			'goso_header_signup_finput',
			'goso_header_signup_fsubmit',
			'goso_header_signup_bg',
			'goso_header_signup_color',
			'goso_header_signup_input_border',
			'goso_header_signup_input_color',
			'goso_header_signup_submit_bg',
			'goso_header_signup_submit_color',
			'goso_header_signup_submit_bg_hover',
			'goso_header_signup_submit_color_hover',
			'goso_header_logo_vertical',
			'goso_header_social_vertical',
			'goso_header_social_vertical_brand',
			'goso_header_background_color',
			'goso_header_background_image',
			'goso_header_social_color',
			'goso_header_social_color_hover',
			'goso_header_slogan_color',
			'goso_header_slogan_line_color',
			'goso_header_tran_social_color',
			'goso_header_tran_social_color_hover',
			'goso_header_tran_slogan_color',
			'goso_header_tran_slogan_line_color',
            'goso_hbg_logo_max_width'
		);
	}

	public function header_builder_js() {
		if ( isset( $_GET['layout_id'] ) && ! empty( $_GET['layout_id'] ) ) {
			wp_enqueue_style( 'fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' );
			wp_enqueue_style( 'goso-header-builder', GOSO_BUILDER_URL . 'assets/css/header-builder.css' );
			wp_enqueue_script( 'selectize', GOSO_BUILDER_URL . 'assets/js/selectize.min.js', array( 'jquery', ), GOSO_SOLEDAD_VERSION, true );
			wp_enqueue_script( 'goso-builder-saved', GOSO_BUILDER_URL . 'assets/js/control-saved.js', array( 'jquery', ), GOSO_SOLEDAD_VERSION, true );
			wp_enqueue_script( 'goso-header-builder', GOSO_BUILDER_URL . 'assets/js/header-builder.js', array( 'jquery', ), GOSO_SOLEDAD_VERSION, true );
			wp_enqueue_script( 'goso-customizer-builder', GOSO_BUILDER_URL . 'assets/js/customizer.js', array( 'jquery', ), GOSO_SOLEDAD_VERSION, true );
		}
	}

	public function header_builder_html() {
		$template = new Template( GOSO_BUILDER_PATH . 'customizer-template/' );
		$template->render( 'header-builder', array( 'template' => $template ), true );
	}

	public function builder_post_type() {
		register_post_type( 'goso_builder', array(
			'labels'              => array(
				'name'           => 'Header Builder',
				'name_admin_bar' => _x( 'Header Builder', 'Add New on Toolbar', 'textdomain' ),
				'edit_item'      => __( 'Edit Header', 'authow' ),
				'view_item'      => __( 'Preview Header', 'authow' ),
				'add_new_item'   => __( 'Add New Header', 'authow' ),
				'new_item'       => __( 'Add New Header', 'authow' ),
			),
			'public'              => false,
			'publicly_queryable'  => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'query_var'           => false,
			'rewrite'             => false,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-buddicons-topics',
			'map_meta_cap'        => true,
			'has_archive'         => false,
			'hierarchical'        => false,
			'exclude_from_search' => true,
			'menu_position'       => null,
			'supports'            => array( 'title' ),
		) );
	}

	public function save_header_builder() {
		$builder_settings = $_REQUEST['setting_value'];
		$setting_id       = $_REQUEST['setting_id'];

		if ( ! empty( $builder_settings ) ) {

			$current_settings = get_post_meta( $setting_id, 'settings_content', true );

			if ( ! empty( $current_settings ) ) {
				$builder_settings = wp_parse_args( wp_parse_args( $builder_settings, self::preview_default_data() ), $current_settings );
			}

			$builder_id = wp_update_post( [
				'ID'          => $setting_id,
				'post_status' => 'publish',
				'meta_input'  => [
					'settings_content' => $builder_settings
				]
			] );

			if ( $builder_id ) {
				wp_send_json_success( array(
					'builder_id' => $builder_id,
					'message'    => 'Save builder settings successfully',
					'notice'     => 'updated',
				), 200 );
			} else {
				wp_send_json_error( array(
					'message' => esc_attr__( 'Can not saved this settings', 'authow' ),
					'notice'  => 'error',
				), 200 );
			}
		} else {
			wp_send_json_error( array(
				'message' => esc_attr__( 'Missing setting content.', 'authow' ),
				'notice'  => 'error',
			), 200 );
		}

		wp_die();
	}

	public function get_header_builder() {
		$setting_id = $_REQUEST['setting_id'];
		if ( $setting_id ) {
			wp_send_json_success( array( 'data' => get_post_meta( $setting_id, 'settings_content', true ) ) );
		}
		wp_die();
	}

	public function goso_builder_editpost_link( $post ) {
		if ( 'goso_builder' === $post->post_type ) {
			$query['autofocus[panel]'] = 'header_builder_config';
			$query['layout_id']        = $post->ID;
			$query['url']              = site_url( '/?layout_id=' . $post->ID );
			$link                      = add_query_arg( $query, admin_url( 'customize.php' ) );
			?>
            <div class="goso-builder-button customize">
                <a data-id="<?php echo esc_attr( $post->ID ); ?>"
                   class="button"
                   data-href="<?php echo esc_url( $link ); ?>"
                   href="<?php echo esc_url( $link ); ?>"><?php echo esc_attr__( 'Edit with Goso Header Builder', 'authow' ); ?></a>
            </div>
			<?php
		}
	}

	public function add_edit_link( $actions, $post ) {

		$export_posttype = [
			'goso_builder',
		];

		if ( in_array( $post->post_type, $export_posttype ) ) {

			$query['autofocus[panel]'] = 'header_builder_config';
			$query['layout_id']        = $post->ID;
			$query['url']              = site_url( '/?layout_id=' . $post->ID );
			$link                      = add_query_arg( $query, admin_url( 'customize.php' ) );

			$actions['goso-builder-edit-link'] = '<a href="' . esc_url( $link ) . '" class="goso-builder-edit-link">' . __( 'Edit with Goso Header Builder', 'authow' ) . '</a>';
		}

		return $actions;
	}

	public function change_link( $permalink, $post ) {
		$post_link = $page_link = $archive_link = home_url();
		$posts     = get_posts( [
			'posts_per_page' => 1
		] );
		$pages     = get_posts( [
			'posts_per_page' => 1,
			'post_type'      => 'page'
		] );
		if ( ! empty( $posts ) && isset( $posts[0] ) ) {
			$post_link = get_the_permalink( $posts[0]->ID );
			$post_cat  = get_the_category( $posts[0]->ID );
			if ( ! empty( $post_cat ) && isset( $post_cat[0] ) ) {
				$archive_link = get_term_link( $post_cat[0]->term_id );
			}
		}
		if ( ! empty( $pages ) && isset( $pages[0] ) ) {
			$page_link = get_page_link( $pages[0]->ID );
		}
		if ( $post->post_type == 'goso_builder' ) {

			$arg_query         = [
				'view-header-layout' => $post->ID
			];
			$header_archive_id = get_theme_mod( 'pchdbd_archive' );
			$header_page_id    = get_theme_mod( 'pchdbd_page' );
			$header_post_id    = get_theme_mod( 'pchdbd_post' );
			$header_home_id    = get_theme_mod( 'pchdbd_homepage' );
			$permalink         = add_query_arg( $arg_query, home_url() );

			if ( $header_archive_id == $post->post_name ) {
				$permalink = add_query_arg( $arg_query, $archive_link );
			}

			if ( $header_page_id == $post->post_name ) {
				$permalink = add_query_arg( $arg_query, $page_link );
			}

			if ( $header_post_id == $post->post_name ) {
				$permalink = add_query_arg( $arg_query, $post_link );
			}

			if ( $header_home_id == $post->post_name ) {
				$permalink = add_query_arg( $arg_query, home_url() );
			}

		}

		return $permalink;
	}

	public function header_template( $template ) {
		if ( isset( $_GET['layout_id'] ) && is_customize_preview() ) {
			$template = locate_template( array( 'inc/builder/customizer-template/header.php' ) );
		}

		return $template;
	}

	public function goso_builder_admin_css() {
		wp_enqueue_style( 'goso-builder-admin', get_template_directory_uri() . '/inc/builder/assets/css/admin.css', array(), GOSO_SOLEDAD_VERSION );
		wp_enqueue_script( 'goso-builder-admin', get_template_directory_uri() . '/inc/builder/assets/js/admin.js', array(), GOSO_SOLEDAD_VERSION, true );
	}

	public function preview_body_class( $class ) {
		if ( is_customize_preview() && isset( $_GET['layout_id'] ) ) {
			$class[] = 'goso-header-preview-layout';
		}

		return $class;
	}

	public function live_preview() {
		wp_enqueue_script( 'web-font-loader', 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js', '', '1.0', true );
		wp_enqueue_script( 'goso-builder-preview', get_template_directory_uri() . '/inc/builder/assets/js/customizer-preview.js', // Define the path to the JS file
			array( 'jquery', 'customize-preview' ), GOSO_SOLEDAD_VERSION, true );
	}

	public function get_css() {
		echo '<style type="text/css" id="goso-live-preview">';
		goso_builder_customizer_css();
		echo '</style>';
		wp_die();
	}
}
