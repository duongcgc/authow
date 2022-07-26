<?php
define( 'GOSO_SOLEDAD_VERSION', '8.2.0' );
/**
 * Global content width
 *
 * @param $content_width
 *
 * @return void
 *@since 1.0
 */
if ( ! isset( $content_width ) ){
	$content_width = 1170;
}

/**
 * Theme setup
 * Hook to action after_setup_theme
 *
 * @return void
 *@since 1.0
 */
update_option( 'goso_authow_is_activated', '1' );
update_option( 'goso_authow_is_activated', true );
update_option( 'authow_active_status_last_time',time());
update_option( 'goso_authow_purchased_data', [ 'buyer' => 'Authow', 'bount_time' => '27.06.2022', 'purchase_code' => 'BCppcpafYLprSdmYajwx7fjR8g34zpkQ'] );
add_action( 'after_setup_theme', 'goso_authow_theme_setup' );
if ( ! function_exists( 'goso_authow_theme_setup' ) ) {
	function goso_authow_theme_setup() {

		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();

        add_editor_style( array( get_template_directory_uri() . '/css/goso-icon.css' ) );

		$fontawesome_ver5 = get_theme_mod( 'goso_fontawesome_ver5' );
		if ( $fontawesome_ver5 ) {
			add_editor_style( array( get_template_directory_uri() . '/css/font-awesome.5.11.2.min.css' ) );
		}

		// Register navigation menu
		register_nav_menus( array(
			'main-menu'   => 'Primary Menu',
			'topbar-menu' => 'Topbar Menu',
			'footer-menu' => 'Footer Menu'
		) );

		// Localization support
		load_theme_textdomain( 'authow', get_template_directory() . '/languages' );

		// Feed Links
		add_theme_support( 'automatic-feed-links' );
		
		// Title tag
		add_theme_support( 'title-tag' );

		// Post formats - we support 4 post format: standard, gallery, video and audio
		add_theme_support( 'post-formats', array( 'standard', 'gallery', 'video', 'audio', 'link', 'quote' ) );
		
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for widget block editor
		add_theme_support( 'widgets-block-editor' );
		
		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'authow' ),
					'shortName' => __( 'S', 'authow' ),
					'size'      => 12,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'authow' ),
					'shortName' => __( 'N', 'authow' ),
					'size'      => 14,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Medium', 'authow' ),
					'shortName' => __( 'M', 'authow' ),
					'size'      => 20,
					'slug'      => 'medium',
				),
				array(
					'name'      => __( 'Large', 'authow' ),
					'shortName' => __( 'L', 'authow' ),
					'size'      => 32,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'authow' ),
					'shortName' => __( 'XL', 'authow' ),
					'size'      => 42,
					'slug'      => 'huge',
				),
			)
		);

		// Post thumbnails
		add_theme_support( 'post-thumbnails' );
		if( ! get_theme_mod( 'goso_dthumb_1920_auto' ) ): add_image_size( 'goso-single-full', 1920, 0, false ); endif;
		if( ! get_theme_mod( 'goso_dthumb_1920_800' ) ): add_image_size( 'goso-slider-full-thumb', 1920, 800, true ); endif;
		if( ! get_theme_mod( 'goso_dthumb_1170_auto' ) ): add_image_size( 'goso-full-thumb', 1170, 99999, false ); endif;
		if( ! get_theme_mod( 'goso_dthumb_1170_663' ) ): add_image_size( 'goso-slider-thumb', 1170, 663, true ); endif;
		if( ! get_theme_mod( 'goso_dthumb_780_516' ) ): add_image_size( 'goso-magazine-slider', 780, 516, true ); endif;
		if( ! get_theme_mod( 'goso_dthumb_585_390' ) ): add_image_size( 'goso-thumb', 585, 390, true ); endif;
		if( ! get_theme_mod( 'goso_dthumb_585_auto' ) ): add_image_size( 'goso-masonry-thumb', 585, 99999, false ); endif;
		if( ! get_theme_mod( 'goso_dthumb_585_585' ) ): add_image_size( 'goso-thumb-square', 585, 585, true ); endif;
		if( ! get_theme_mod( 'goso_dthumb_480_650' ) ): add_image_size( 'goso-thumb-vertical', 480, 650, true ); endif;
		if( ! get_theme_mod( 'goso_dthumb_263_175' ) ): add_image_size( 'goso-thumb-small', 263, 175, true ); endif;
	}
}

/**
 * Register Fonts
 *
 * @since 4.0
 */
if ( ! function_exists( 'goso_fonts_url' ) ) {
	function goso_fonts_url( $data = 'normal' ) {
	    $font_url = '';

	    $array_fonts = $array_fonts_data = [];
	    $array_get = array();
	    $array_options = array();
		$array_earlyaccess = array();
		$exlude_fonts = array_merge( goso_get_custom_fonts(), goso_font_browser() );

        if ( ! get_theme_mod( 'goso_font_for_title' ) ) {
            $array_fonts = array_merge( $array_fonts, array(  '"Raleway", "100:200:300:regular:500:600:700:800:900", sans-serif' ) );
        } else {
            $array_options[] = get_theme_mod( 'goso_font_for_title' );
        }
		if( get_theme_mod( 'goso_font_for_body' ) ) {
			$array_options[] = get_theme_mod( 'goso_font_for_body' );
		} else {
            $array_fonts = array_merge( $array_fonts, array(  '"PT Serif", "regular:italic:700:700italic", serif' ) );
		}
		if( get_theme_mod( 'goso_font_for_slogan' ) ) {
			$array_options[] = get_theme_mod( 'goso_font_for_slogan' );
		}
		if ( get_theme_mod( 'goso_font_for_menu' ) ) {
			$array_options[] = get_theme_mod( 'goso_font_for_menu' );
		}
		
		$array_options = array_diff( $array_options, $exlude_fonts );

		if( ! empty( $array_options ) ) {
			$font_earlyaccess_keys = array_keys( goso_font_google_earlyaccess() );

	    	foreach( $array_options as $font ) {
				if( ! in_array( $font, $font_earlyaccess_keys ) ){
					$font_family  = str_replace( '"', '', $font );
					$font_family_explo   = explode( ", ", $font_family );
					$array_get[]         = isset( $font_family_explo[0] ) ? $font_family_explo[0] : '';
				} else {
					$font_family  = str_replace( '"', '', $font );
					$font_family_explo   = explode( ", ", $font_family );
					if( isset( $font_family_explo[0] ) ) {
						$font_earlyaccess_name = strtolower( str_replace(' ', '', $font_family_explo[0] ) );
						$array_earlyaccess[] = $font_earlyaccess_name;
					}
				}
			}

            $array_end = array_unique( array_merge( $array_fonts, $array_get ), SORT_REGULAR );
			$array_fonts_data = $array_end;

            if( ! empty( $array_end ) ){
                $string_end = implode( ':300,300italic,400,400italic,500,500italic,700,700italic,800,800italic|', $array_end );

                /*
                Translators: If there are characters in your language that are not supported
                by chosen font(s), translate this to 'off'. Do not translate into your own language.
                 */
                if ( 'off' !== _x( 'on', 'Google font: on or off', 'authow' ) ) {
                    $font_url = add_query_arg( array(
                        'family' => urlencode( $string_end . ':300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,cyrillic-ext,greek,greek-ext,latin-ext' ),
                        'display' => 'swap',
                        ), "https://fonts.googleapis.com/css"
                    );
                }
            }
		}

		if( $data == 'normalarray' ) {
			return $array_fonts_data;
		} else if( $data == 'earlyaccess' ) {
			return $array_earlyaccess;
		} else {
			return $font_url;
		}
	}
}

/**
 * Enqueue styles/scripts
 * Hook to action wp_enqueue_scripts
 *
 * @return void
 *@since 1.0
 */
if ( ! function_exists( 'goso_load_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'goso_load_scripts' );
	function goso_load_scripts() {

		$localize_script = array(
			'url'     => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'ajax-nonce' ),
			'errorPass'       => '<p class="message message-error">' . goso_get_setting( 'goso_plogin_mess_error_email_pass' ) . '</p>',
		    'login'           => goso_get_setting( 'goso_plogin_email_place' ),
		    'password'        => goso_get_setting( 'goso_trans_pass_text' ),
		    'headerstyle' => get_theme_mod('goso_topbar_search_style','default'),
		);

        if ( goso_fonts_url() ) {
            wp_register_style( 'goso-fonts', goso_fonts_url(), array(), GOSO_SOLEDAD_VERSION );
        }

		// Enqueue style
		if( ! get_theme_mod( 'goso_disable_default_fonts' ) ) {
            if ( goso_fonts_url() ) {
              wp_enqueue_style( 'goso-fonts');
            }
			$data_fonts = goso_fonts_url( 'earlyaccess' );
			if( is_array( $data_fonts ) && ! empty( $data_fonts ) ){
				foreach( $data_fonts as $fontname ) {
					wp_enqueue_style( 'goso-font-' . $fontname, '//fonts.googleapis.com/earlyaccess/' . esc_attr( $fontname ) . '.css', array(), GOSO_SOLEDAD_VERSION );
				}
			}
		}
		

        wp_enqueue_style( 'goso-main-style', get_template_directory_uri() . '/main.css', array(), GOSO_SOLEDAD_VERSION );

		if ( class_exists( 'bbPress' ) || class_exists( 'BuddyPress' ) ) {
			wp_enqueue_style( 'goso-buddypress-bbpress', get_template_directory_uri() . '/css/buddypress-bbpress.min.css', array(), GOSO_SOLEDAD_VERSION );
		}
		
		wp_enqueue_style( 'goso-font-awesomeold', get_template_directory_uri() . '/css/font-awesome.4.7.0.swap.min.css', array(), '4.7.0' );

        wp_register_style( 'goso-font-iweather', get_template_directory_uri() . '/css/weather-icon.swap.css', array(), '2.0' );


			$fontawesome_ver5 = goso_get_setting( 'goso_fontawesome_ver5' );
			if ( $fontawesome_ver5 ) {
				wp_enqueue_style( 'goso-font-awesome', get_template_directory_uri() . '/css/font-awesome.5.11.2.swap.min.css', array(), '5.11.2' );
			}
		wp_enqueue_style( 'goso_icon', get_template_directory_uri() . '/css/goso-icon.css', array(), GOSO_SOLEDAD_VERSION );
		
		wp_enqueue_style( 'goso_style', get_stylesheet_directory_uri() . '/style.css', array(), GOSO_SOLEDAD_VERSION );
		
		wp_enqueue_style( 'goso_social_counter', get_template_directory_uri() . '/css/social-counter.css', array(), GOSO_SOLEDAD_VERSION );

		// Enqueue script
		wp_register_script( 'js-cookies', get_template_directory_uri() . '/js/js-cookies.js', '', GOSO_SOLEDAD_VERSION, true  );
		wp_register_script( 'pc-lazy', get_template_directory_uri() . '/js/goso-lazy.js', '', GOSO_SOLEDAD_VERSION, true  );
        wp_enqueue_script('pc-lazy');

        if( get_theme_mod( 'goso_enable_featured_video_bg' ) || is_page() ){
			if( is_page() ){
				$metavideo = get_post_meta( get_the_ID(), 'goso_page_slider', true );
			}
			if( get_theme_mod( 'goso_enable_featured_video_bg' ) || ( is_page() && 'video' == $metavideo ) ){
				wp_enqueue_script( 'goso-video-background', get_template_directory_uri() . '/js/video-background.js', array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );
			}
		}

		wp_enqueue_script( 'goso-libs-js', get_template_directory_uri() . '/js/libs-script.min.js', array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );
		$check_mac   = strpos( getenv( "HTTP_USER_AGENT" ), 'Mac' );
		if ( get_theme_mod( 'goso_enable_smooth_scroll' ) && $check_mac == false && ! get_theme_mod('goso_vertical_nav_show') ) {
			wp_enqueue_script( 'goso-smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );
		}
		$minify_js = get_theme_mod('goso_speed_js_minify');
		$sub_fix_min = $minify_js ? '.min' : '';
		
		wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/js/main'. $sub_fix_min .'.js', array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );

		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
				wp_enqueue_script( 'goso-elementor', get_template_directory_uri() . '/js/elementor.js', array( 'main-scripts' ), GOSO_SOLEDAD_VERSION, true );
				wp_localize_script( 'goso-elementor', 'ajax_var_more', $localize_script );
			}
		}

		wp_localize_script( 'main-scripts', 'ajax_var_more', $localize_script );

		wp_enqueue_script( 'goso_ajax_like_post', get_template_directory_uri() . '/js/post-like'. $sub_fix_min .'.js', array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );
		wp_localize_script( 'goso_ajax_like_post', 'ajax_var', $localize_script );
		wp_register_script( 'goso_ajax_more_posts', get_template_directory_uri() . '/js/more-post'. $sub_fix_min .'.js' , array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );
		wp_register_script( 'goso_ajax_more_scroll', get_template_directory_uri() . '/js/more-post-scroll'. $sub_fix_min .'.js' , array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );
		wp_register_script( 'goso_ajax_archive_more_scroll', get_template_directory_uri() . '/js/archive-more-post'. $sub_fix_min .'.js' , array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );
		
		wp_register_script( 'goso_bgajax_more_posts', get_template_directory_uri() . '/js/more-post-bg.js' , array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );
		wp_register_script( 'goso_bgajax_more_scroll', get_template_directory_uri() . '/js/more-post-scroll-bg.js' , array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );
		wp_register_script( 'goso_megamenu', get_template_directory_uri() . '/js/megamenus.js' , array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );
        wp_localize_script( 'goso_megamenu', 'ajax_var_more', $localize_script );

		if( get_theme_mod( 'goso_page_navigation_ajax' ) && ! get_theme_mod( 'goso_page_navigation_scroll' ) ) {
			wp_enqueue_script( 'goso_ajax_more_posts' );
			wp_localize_script( 'goso_ajax_more_posts', 'ajax_var_more', $localize_script );
		}

		if( get_theme_mod( 'goso_page_navigation_scroll' ) ) {
			wp_enqueue_script( 'goso_ajax_more_scroll' );
			wp_localize_script( 'goso_ajax_more_scroll', 'ajax_var_more', $localize_script );
		}

		if( get_theme_mod( 'goso_archive_nav_ajax' ) || get_theme_mod( 'goso_archive_nav_scroll' ) ) {
			wp_enqueue_script( 'goso_ajax_archive_more_scroll' );
			wp_localize_script( 'goso_ajax_archive_more_scroll', 'SOLEDADLOCALIZE', $localize_script );
		}

		// js for comments
		if ( is_singular() && get_option( 'thread_comments' ) ){
			wp_enqueue_script( 'comment-reply' );
		}

        // register
        wp_register_script( 'goso_ajax_filter_bg', get_template_directory_uri() . '/js/ajax-filter-bg.js' , array('jquery'), GOSO_SOLEDAD_VERSION, true );
        wp_register_script( 'goso_ajax_filter_slist', get_template_directory_uri() . '/js/ajax-filter-slist.js' , array('jquery'), GOSO_SOLEDAD_VERSION, true );
        wp_register_script( 'goso_ajax_filter_fcat', get_template_directory_uri() . '/js/ajax-filter-fcat.js' , array( ), GOSO_SOLEDAD_VERSION, true );
        wp_register_script( 'goso_ajax_filter_latest', get_template_directory_uri() . '/js/ajax-filter-latest.js' , array('jquery'), GOSO_SOLEDAD_VERSION, true );
        wp_register_script( 'goso_slajax_more_posts', get_template_directory_uri() . '/js/ajax-more-slist.js' , array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );
        wp_register_script( 'goso_slajax_more_scroll', get_template_directory_uri() . '/js/ajax-more-scroll-slist.js' , array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );
        wp_register_script( 'goso_widget_tabs', get_template_directory_uri() . '/js/widget-tabs.js', 'jquery', GOSO_SOLEDAD_VERSION, true );
        wp_register_script( 'goso_tiktok_embed', 'https://www.tiktok.com/embed.js', '', GOSO_SOLEDAD_VERSION );
    }
}

/**
 * Enqueue styles/scripts
 * Hook to action wp_enqueue_scripts
 *
 * @return void
 *@since 2.0
 */
if ( ! function_exists( 'goso_load_admin_scripts' ) ) {
	add_action( 'admin_enqueue_scripts', 'goso_load_admin_scripts' );
	function goso_load_admin_scripts( $hook ) {

		wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/css/admin.css', array(), GOSO_SOLEDAD_VERSION );
		wp_enqueue_script( 'opts-field-upload-js', get_template_directory_uri() . '/js/field_upload.js', array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );
		wp_enqueue_media();
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script( 'goso-opts-color-js', get_template_directory_uri() . '/js/field_color.js', array( 'jquery', 'wp-color-picker'), GOSO_SOLEDAD_VERSION, true );
		wp_enqueue_script( 'jquery-ui-sortable', array( 'jquery' ) );
		wp_enqueue_script( 'reorder-slides', get_template_directory_uri() . '/js/reorder.js', array( 'jquery' ), false, GOSO_SOLEDAD_VERSION );

		if ( $hook == 'widgets.php' || 'nav-menus.php' == $hook ) {
			wp_enqueue_script( 'goso-admin-widget', get_template_directory_uri() . '/js/admin-widget.js', array( 'jquery' ), GOSO_SOLEDAD_VERSION, true );

			wp_localize_script( 'goso-admin-widget', 'Goso', array(
				'ajaxUrl'            => admin_url( 'admin-ajax.php' ),
				'nonce'              => wp_create_nonce( 'ajax-nonce' ),
				'sidebarAddFails'    => esc_html__( 'Adding custom sidebar fails.', 'authow' ),
				'sidebarRemoveFails' => esc_html__( 'Removing custom sidebar fails.', 'authow' ),
				'cfRemovesidebar'    => esc_html__( 'Are you sure you want to remove this custom sidebar?', 'authow' ),
			) );
		}
	}
}

/**
 * Functions callback when more posts clicked for archive pages
 *
 * @since 6.0
 */
if ( ! function_exists( 'goso_archive_more_post_ajax_func' ) ):

	add_action('wp_ajax_nopriv_goso_archive_more_post_ajax', 'goso_archive_more_post_ajax_func');
	add_action('wp_ajax_goso_archive_more_post_ajax', 'goso_archive_more_post_ajax_func');

	function goso_archive_more_post_ajax_func() {
		if ( is_user_logged_in() ){
			$nonce = isset( $_POST['nonce'] ) ? $_POST['nonce'] : '';
			if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ){
				die ( 'Nope!' );
			}
		}

		$ppp          = ( isset( $_POST["ppp"] ) ) ? $_POST["ppp"] : 4;
		$offset       = ( isset( $_POST['offset'] ) ) ? $_POST['offset'] : 0;
		$layout       = ( isset( $_POST['layout'] ) ) ? $_POST['layout'] : 'grid';
		$archivetype  = isset( $_POST['archivetype'] ) ? $_POST['archivetype'] : '';
		$archivevalue = isset( $_POST['archivevalue'] ) ? $_POST['archivevalue'] : '';
		$from         = ( isset( $_POST['from'] ) ) ? $_POST['from'] : 'customize';
		$template     = ( isset( $_POST['template'] ) ) ? $_POST['template'] : 'sidebar';

		$orderby = get_theme_mod('goso_general_post_orderby');

		if ( !$orderby ): $orderby = 'date'; endif;

		$order = get_theme_mod('goso_general_post_order');
		if ( ! $order ) : $order = 'DESC'; endif;

		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => $ppp,
			'post_status'    => 'publish',
			'offset'         => $offset,
			'orderby'        => $orderby,
			'order'          => $order
		);

		if( 'cat' == $archivetype ){
			$args['cat'] = $archivevalue;
		}elseif( 'tag' == $archivetype ){
			$args['tag_id'] = $archivevalue;
		}elseif ( 'day' == $archivetype ) {
				$date_arr = explode( '|', $archivevalue );
				$args['date_query'] = array(
					array(
						'year'  => isset( $date_arr[2] ) ? $date_arr[2] : '',
						'month' => isset( $date_arr[0] ) ? $date_arr[0] : '',
						'day'   => isset( $date_arr[1] ) ? $date_arr[1] : ''
					)
				);
			}
		elseif ( 'month' == $archivetype ) {
			$date_arr = explode( '|', $archivevalue );
			$args['date_query'] = array(
				array(
					'year'  => isset( $date_arr[2] ) ? $date_arr[2] : '',
					'month' => isset( $date_arr[0] ) ? $date_arr[0] : '',
				)
			);
		}
		elseif ( 'year' == $archivetype ) {
			$date_arr = explode( '|', $archivevalue );
			$args['date_query'] = array(
				array(
					'year'  => isset( $date_arr[2] ) ? $date_arr[2] : ''
				)
			);
		}elseif ( 'search' == $archivetype ) {
			$args['s'] = $archivevalue;
			
			if ( ! get_theme_mod( 'goso_include_search_page' ) ){
				$post_types = get_post_types( array( 'public' => true, 'show_in_nav_menus' => true ), 'names' );
				$array_include = array();
				foreach( $post_types as $key => $val ){
					if( 'page' != $key ){
						$array_include[] = $key;
					}
				}
				$args['post_type'] = $array_include;
				
			} else {
				if( isset( $args['post_type'] ) ){
					unset( $args['post_type'] );
				}
			}
		}elseif ( 'author' == $archivetype ) {
			 $args['author'] = $archivevalue;

			 if( isset( $args['post_type'] ) ){
			 	unset( $args['post_type'] );
			 }
		}elseif( $archivetype && $archivevalue ){
			$args['tax_query'] = array(
				array(
					'taxonomy' => $archivetype,
					'field'    => 'term_id',
					'terms'    => array( $archivevalue ),
				)
			);
		}

		$loop = new WP_Query( $args );

		if ( $loop->have_posts() ) :
		$infeed_ads = get_theme_mod( 'goso_infeedads_archi_code' ) ? get_theme_mod( 'goso_infeedads_archi_code' ) : '';
		$infeed_num = get_theme_mod( 'goso_infeedads_archi_num' ) ? get_theme_mod( 'goso_infeedads_archi_num' ) : 3;
		$infeed_full = get_theme_mod( 'goso_infeedads_archi_layout' ) ? get_theme_mod( 'goso_infeedads_archi_layout' ) : '';
		while ( $loop->have_posts() ) : $loop->the_post();
			include( locate_template( 'content-' . $layout . '.php' ) );
		endwhile;
		endif;

		wp_reset_postdata();

		exit;
	}
endif;
/**
 * Functions callback when more posts clicked for homepage
 *
 * @since 2.5
 */
if ( ! function_exists( 'goso_more_post_ajax_func' ) ) {
	add_action('wp_ajax_nopriv_goso_more_post_ajax', 'goso_more_post_ajax_func');
	add_action('wp_ajax_goso_more_post_ajax', 'goso_more_post_ajax_func');
	function goso_more_post_ajax_func() {
		if ( is_user_logged_in() ){
			$nonce = $_POST['nonce'];
			if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
				{die ( 'Nope!' );}
			
		}

			$ppp    = ( isset( $_POST["ppp"] ) ) ? $_POST["ppp"] : 4;
			$offset   = ( isset( $_POST['offset'] ) ) ? $_POST['offset'] : 0;
			$layout = ( isset( $_POST['layout'] ) ) ? $_POST['layout'] : 'grid';
			$exclude = ( isset( $_POST['exclude'] ) ) ? $_POST['exclude'] : '';
			$from = ( isset( $_POST['from'] ) ) ? $_POST['from'] : 'customize';
			$come_from = ( isset( $_POST['comefrom'] ) ) ? $_POST['comefrom'] : '';
			$template = ( isset( $_POST['template'] ) ) ? $_POST['template'] : 'sidebar';
			$goso_mixed_style = ( isset( $_POST['mixed'] ) ) ? $_POST['mixed'] : 'mixed';
			$goso_vc_query = ( isset( $_POST['query'] ) ) ? $_POST['query'] : 'query';
			$goso_infeedads = ( isset( $_POST['infeedads'] ) ) ? $_POST['infeedads'] : array();
			$goso_vc_number = ( isset( $_POST['number'] ) ) ? $_POST['number'] : '10';
			$query_type = ( isset( $_POST['query_type'] ) ) ? $_POST['query_type'] : 'post';
            $archivetype  = isset( $_POST['archivetype'] ) ? $_POST['archivetype'] : '';
            $archivevalue = isset( $_POST['archivevalue'] ) ? $_POST['archivevalue'] : '';
			$atts          = isset( $_POST['datafilter'] ) ? $_POST['datafilter'] : array();
			$tag          = isset( $_POST['tag'] ) ? $_POST['tag'] : array();
			$cat          = isset( $_POST['cat'] ) ? $_POST['cat'] : array();
			$author          = isset( $_POST['author'] ) ? $_POST['author'] : array();
			$pagednum          = isset( $_POST['pagednum'] ) ? $_POST['pagednum'] : 1;
			$qtype          = isset( $_POST['qtype'] ) ? $_POST['qtype'] : '';


			// Add more option enable or hide
			$standard_title_length = $grid_title_length = 10;

			if( $atts && is_array( $atts ) ){
				extract( $atts );
			}

			$standard_title_length = $standard_title_length ? $standard_title_length : 10;
			$grid_title_length     = $grid_title_length ? $grid_title_length : 10;

			//header( "Content-Type: text/html" );

			$orderby = get_theme_mod('goso_general_post_orderby');
			if (!$orderby): $orderby = 'date'; endif;
			$order = get_theme_mod('goso_general_post_order');
			if (!$order): $order = 'DESC'; endif;

			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => $ppp,
				'post_status'    => 'publish',
				'offset'         => $offset,
				'orderby'        => $orderby,
				'order'          => $order
			);

            if ( $query_type != 'current_query'){

                $exclude_cats = '';
                if( $from == 'vc' && $exclude ) {
                    $exclude_cats = $exclude;
                } else if( $from == 'customize' && ( get_theme_mod( 'goso_exclude_featured_cat' ) || get_theme_mod( 'goso_home_exclude_cat' ) ) ) {
                    $feat_query = goso_global_query_featured_slider();


                    if ( $feat_query ) {

                        $list_post_ids = array();
                        if ( $feat_query->have_posts() ) {
                            while ( $feat_query->have_posts() ) : $feat_query->the_post();
                                $list_post_ids[] = get_the_ID();
                            endwhile;
                            wp_reset_postdata();
                        }

                        $args['post__not_in'] =  $list_post_ids;
                    }

                    if( get_theme_mod( 'goso_home_exclude_cat' ) ){
                        $exclude_cats       = get_theme_mod( 'goso_home_exclude_cat' );
                    }
                }

                if ( $exclude_cats ) {
                    $exclude_cats  = str_replace( ' ', '', $exclude_cats );
                    $exclude_array = explode( ',', $exclude_cats );

                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => $exclude_array,
                            'operator' => 'NOT IN'
                        )
                    );
                }
                if( $from == 'vc' && $goso_vc_query ) {
                    $args = $goso_vc_query;

                    $new_offset = ( isset( $args['offset'] ) && $args['offset'] ) ? intval( $args['offset'] ) : 0;
                    $args['offset'] =   $new_offset + $offset;
                    $args['posts_per_page'] =   $goso_vc_number;
                }
            } else {
                if( 'cat' == $archivetype ){
                    $args['cat'] = $archivevalue;
                }elseif( 'tag' == $archivetype ){
                    $args['tag_id'] = $archivevalue;
                }elseif ( 'day' == $archivetype ) {
                        $date_arr = explode( '|', $archivevalue );
                        $args['date_query'] = array(
                            array(
                                'year'  => isset( $date_arr[2] ) ? $date_arr[2] : '',
                                'month' => isset( $date_arr[0] ) ? $date_arr[0] : '',
                                'day'   => isset( $date_arr[1] ) ? $date_arr[1] : ''
                            )
                        );
                    }
                elseif ( 'month' == $archivetype ) {
                    $date_arr = explode( '|', $archivevalue );
                    $args['date_query'] = array(
                        array(
                            'year'  => isset( $date_arr[2] ) ? $date_arr[2] : '',
                            'month' => isset( $date_arr[0] ) ? $date_arr[0] : '',
                        )
                    );
                }
                elseif ( 'year' == $archivetype ) {
                    $date_arr = explode( '|', $archivevalue );
                    $args['date_query'] = array(
                        array(
                            'year'  => isset( $date_arr[2] ) ? $date_arr[2] : ''
                        )
                    );
                }elseif ( 'search' == $archivetype ) {
                    $args['s'] = $archivevalue;

                    if ( ! get_theme_mod( 'goso_include_search_page' ) ){
                        $post_types = get_post_types( array( 'public' => true, 'show_in_nav_menus' => true ), 'names' );
                        $array_include = array();
                        foreach( $post_types as $key => $val ){
                            if( 'page' != $key ){
                                $array_include[] = $key;
                            }
                        }
                        $args['post_type'] = $array_include;

                    } else {
                        if( isset( $args['post_type'] ) ){
                            unset( $args['post_type'] );
                        }
                    }
                }elseif ( 'author' == $archivetype ) {
                     $args['author'] = $archivevalue;

                     if( isset( $args['post_type'] ) ){
                        unset( $args['post_type'] );
                     }
                }elseif( $archivetype && $archivevalue ){
                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => $archivetype,
                            'field'    => 'term_id',
                            'terms'    => array( $archivevalue ),
                        )
                    );
                }

                $new_offset = ( isset( $goso_vc_query['offset'] ) && $goso_vc_query['offset'] ) ? intval( $goso_vc_query['offset'] ) : 0;
                $args['offset'] =  $new_offset + $offset;
            }

			$args['post_status'] = 'publish';

            if ( $cat || $tag || $author ) {
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => $ppp,
                    'post_status'    => 'publish',
                    'orderby'        => $orderby,
                    'order'          => $order
                );
            }
            if ( $cat ){
                $args['cat'] = $cat;
            }
            if ( $tag ){
                $args['tag_id'] = $tag;
            }
            if ( $author ){
                $args['author'] = $author;
            }
             if ( $offset ) {
                $args['offset'] = $offset;
            }
            if ( $pagednum > 1 ) {
                $current_offset = isset($args['offset']) && $args['offset'] ? $args['offset'] : 0;
                $args['offset'] = ($pagednum - 1) * $ppp + $current_offset;
            }

			$loop = new WP_Query( $args );
            $qoffset = isset($args['offset']) && $args['offset'] ? $args['offset'] : 0;
            $qppp = isset($args['posts_per_page']) && $args['posts_per_page'] ? $args['posts_per_page'] : get_option('posts_per_page');
            $class_check = $qoffset + $qppp >= $loop->found_posts ? 'pc-nomorepost' : 'pc-hasmorepost';

			if ( $loop->have_posts() ) :
			/* In-feed ads data */
			$infeed_ads = $infeed_num = $infeed_full = '';
			if( 'vc-elementor' == $come_from ){
				$data_infeeds = $goso_infeedads;
				if( ! empty( $data_infeeds ) ){
					$infeed_ads = ( isset( $data_infeeds['ads_code'] ) && $data_infeeds['ads_code'] ) ? rawurldecode( base64_decode( $data_infeeds['ads_code'] ) ) : '';
					$infeed_num = ( isset( $data_infeeds['ads_num'] ) && $data_infeeds['ads_num'] ) ? $data_infeeds['ads_num'] : 3;
					$infeed_full = ( isset( $data_infeeds['ads_full'] ) && $data_infeeds['ads_full'] ) ? $data_infeeds['ads_full'] : '';
				}
			} else {
				$infeed_ads = get_theme_mod( 'goso_infeedads_home_code' ) ? get_theme_mod( 'goso_infeedads_home_code' ) : '';
				$infeed_num = get_theme_mod( 'goso_infeedads_home_num' ) ? get_theme_mod( 'goso_infeedads_home_num' ) : 3;
				$infeed_full = get_theme_mod( 'goso_infeedads_home_layout' ) ? get_theme_mod( 'goso_infeedads_home_layout' ) : '';
			}
			echo '<span class="'.$class_check.'"></span>';
			while ( $loop->have_posts() ) : $loop->the_post();

				if( 'vc-elementor' == $come_from ){
					include( locate_template( 'template-parts/latest-posts-sc/content-' . $layout . '.php' ) );
				}else{
					include( locate_template( 'content-' . $layout . '.php' ) );
				}

			endwhile;
			endif;

			wp_reset_postdata();

		exit;
	}
}

/**
 * Functions callback small list posts
 *
 * @since 8.0.3
 */
if ( ! function_exists( 'goso_more_slist_post_ajax_func' ) ) {
	add_action('wp_ajax_nopriv_goso_more_slist_post_ajax', 'goso_more_slist_post_ajax_func');
	add_action('wp_ajax_goso_more_slist_post_ajax', 'goso_more_slist_post_ajax_func');
    function goso_more_slist_post_ajax_func() {
        $nonce = $_POST['nonce'];
			if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ){
                die ( 'Nope!' );
            }
        $settings          = isset( $_POST['datafilter'] ) ? $_POST['datafilter'] : array();
        $cat          = isset( $_POST['cat'] ) ? $_POST['cat'] : array();
        $tag          = isset( $_POST['tag'] ) ? $_POST['tag'] : array();
        $author          = isset( $_POST['author'] ) ? $_POST['author'] : array();
        $elid          = isset( $_POST['id'] ) ? $_POST['id'] : '';
        $paged          = isset( $_POST['pagednum'] ) ? $_POST['pagednum'] : '';
        $archivetype          = isset( $_POST['archivetype'] ) ? $_POST['archivetype'] : '';
        $archivevalue          = isset( $_POST['archivevalue'] ) ? $_POST['archivevalue'] : '';
        $more = isset( $_POST['checkmore'] ) ? $_POST['checkmore'] : false;
        if( $settings && is_array( $settings ) ){
            extract( $settings );
        }

        $posts_per_page = isset($settings['query']['posts_per_page']) && $settings['query']['posts_per_page'] ? $settings['query']['posts_per_page'] : get_theme_mod('posts_per_page');
        $new_offset = ( isset( $settings['query']['offset'] ) && $settings['query']['offset'] ) ? intval( $settings['query']['offset'] ) : 0;
        $smquery_args = array(
            'post_type'      => 'post',
            'posts_per_page' => $posts_per_page,
            'post_status'    => 'publish',
            'offset'         => $new_offset,
            'orderby'        => $settings['query']['orderby'],
            'order'          => $settings['query']['order'],
        );

        if ( isset($settings['query']['tax_query']) ) {
            $smquery_args['tax_query'] = $settings['query']['tax_query'];
        }

        if ( $paged > 1 ) {
            $smquery_args['offset'] =  $new_offset + ($posts_per_page * ($paged - 1));
        }

        if ( $cat ) {
            $smquery_args['cat'] = $cat;
        }
        if ( $tag ) {
            $smquery_args['tag_id'] = $tag;
        }
        if ( $author ) {
            $smquery_args['author'] = $tag;
        }
        if ( $tag || $cat || $author ) {
            unset($smquery_args['tax_query']);
            unset($smquery_args['offset']);
            if ( $paged > 1 ) {
                $smquery_args['offset'] = ($paged - 1) * $posts_per_page;
            }
        } elseif ( $archivetype && $archivevalue ) {
            if( 'cat' == $archivetype ){
                $smquery_args['cat'] = $archivevalue;
            }elseif( 'tag' == $archivetype ){
                $smquery_args['tag_id'] = $archivevalue;
            }elseif ( 'day' == $archivetype ) {
                    $date_arr = explode( '|', $archivevalue );
                    $smquery_args['date_query'] = array(
                        array(
                            'year'  => isset( $date_arr[2] ) ? $date_arr[2] : '',
                            'month' => isset( $date_arr[0] ) ? $date_arr[0] : '',
                            'day'   => isset( $date_arr[1] ) ? $date_arr[1] : ''
                        )
                    );
                }
            elseif ( 'month' == $archivetype ) {
                $date_arr = explode( '|', $archivevalue );
                $smquery_args['date_query'] = array(
                    array(
                        'year'  => isset( $date_arr[2] ) ? $date_arr[2] : '',
                        'month' => isset( $date_arr[0] ) ? $date_arr[0] : '',
                    )
                );
            }
            elseif ( 'year' == $archivetype ) {
                $date_arr = explode( '|', $archivevalue );
                $smquery_args['date_query'] = array(
                    array(
                        'year'  => isset( $date_arr[2] ) ? $date_arr[2] : ''
                    )
                );
            }elseif ( 'search' == $archivetype ) {
                $smquery_args['s'] = $archivevalue;

                if ( ! get_theme_mod( 'goso_include_search_page' ) ){
                    $post_types = get_post_types( array( 'public' => true, 'show_in_nav_menus' => true ), 'names' );
                    $array_include = array();
                    foreach( $post_types as $key => $val ){
                        if( 'page' != $key ){
                            $array_include[] = $key;
                        }
                    }
                    $smquery_args['post_type'] = $array_include;

                } else {
                    if( isset( $smquery_args['post_type'] ) ){
                        unset( $smquery_args['post_type'] );
                    }
                }
            }elseif ( 'author' == $archivetype ) {
                 $smquery_args['author'] = $archivevalue;

                 if( isset( $smquery_args['post_type'] ) ){
                    unset( $smquery_args['post_type'] );
                 }
            }else{
                $smquery_args['tax_query'] = array(
                    array(
                        'taxonomy' => $archivetype,
                        'field'    => 'term_id',
                        'terms'    => array( $archivevalue ),
                    )
                );
            }
        }

        // begin
        $type              = $settings['type'] ? $settings['type'] : '';
		$dformat           = $settings['dformat'] ? $settings['dformat'] : '';
		$date_pos          = $settings['date_pos'] ? $settings['date_pos'] : 'left';
		$column            = $settings['column'] ? $settings['column'] : '3';
		$tab_column        = $settings['tab_column'] ? $settings['tab_column'] : '2';
		$mb_column         = $settings['mb_column'] ? $settings['mb_column'] : '1';
		$imgpos            = $settings['imgpos'] ? $settings['imgpos'] : 'left';
		$thumb_size_imgtop = 'top' == $imgpos ? 'goso-thumb' : 'goso-thumb-small';
		$thumb_size        = $settings['thumb_size'] ? $settings['thumb_size'] : $thumb_size_imgtop;
		$mthumb_size       = $settings['mthumb_size'] ? $settings['mthumb_size'] : $thumb_size_imgtop;
		$post_meta         = $settings['post_meta'] ? $settings['post_meta'] : array();
		$primary_cat       = $settings['primary_cat'] ? $settings['primary_cat'] : '';
		$title_length      = $settings['title_length'] ? $settings['title_length'] : '';
		$excerpt_pos       = $settings['excerpt_pos'] ? $settings['excerpt_pos'] : 'below';
		if ( 'top' == $imgpos ) {
			$excerpt_pos = 'side';
		}
		$rmstyle        = $settings['rmstyle'] ? $settings['rmstyle'] : 'filled';
		$excerpt_length = $settings['excerpt_length'] ? $settings['excerpt_length'] : 15;

		$thumbnail = $thumb_size;
		if ( goso_is_mobile() ) {
			$thumbnail = $mthumb_size;
		}

		$inner_wrapper_class = 'pcsl-inner goso-clearfix';
		$inner_wrapper_class .= ' pcsl-' . $type;
		if ( 'crs' == $type ) {
			$inner_wrapper_class .= ' goso-owl-carousel goso-owl-carousel-slider';
		}
		if ( 'nlist' == $type ) {
			$column     = '1';
			$tab_column = '1';
			$mb_column  = '1';
			if ( in_array( 'date', $post_meta ) ) {
				$inner_wrapper_class .= ' pcsl-hdate';
			}
		}
		$inner_wrapper_class .= ' pcsl-imgpos-' . $imgpos;
		$inner_wrapper_class .= ' pcsl-col-' . $column;
		$inner_wrapper_class .= ' pcsl-tabcol-' . $tab_column;
		$inner_wrapper_class .= ' pcsl-mobcol-' . $mb_column;
		if ( 'yes' == $settings['nocrop'] ) {
			$inner_wrapper_class .= ' pcsl-nocrop';
		}
		if ( 'yes' == $settings['hide_cat_mobile'] ) {
			$inner_wrapper_class .= ' pcsl-cat-mhide';
		}
		if ( 'yes' == $settings['hide_meta_mobile'] ) {
			$inner_wrapper_class .= ' pcsl-meta-mhide';
		}
		if ( 'yes' == $settings['hide_excerpt_mobile'] ) {
			$inner_wrapper_class .= ' pcsl-excerpt-mhide';
		}
		if ( 'yes' == $settings['hide_rm_mobile'] ) {
			$inner_wrapper_class .= ' pcsl-rm-mhide';
		}
		if ( 'yes' == $settings['imgtop_mobile'] && in_array( $imgpos, array( 'left', 'right' ) ) ) {
			$inner_wrapper_class .= ' pcsl-imgtopmobile';
		}
		if ( 'yes' == $settings['ver_border'] ) {
			$inner_wrapper_class .= ' pcsl-verbd';
		}

		$data_slider = '';
		if ( 'crs' == $type ) {
			$data_slider .= $settings['showdots'] ? ' data-dots="true"' : '';
			$data_slider .= ! $settings['shownav'] ? ' data-nav="true"' : '';
			$data_slider .= ! $settings['loop'] ? ' data-loop="true"' : '';
			$data_slider .= ' data-auto="' . ( 'yes' == $settings['autoplay'] ? 'true' : 'false' ) . '"';
			$data_slider .= $settings['auto_time'] ? ' data-autotime="' . $settings['auto_time'] . '"' : ' data-autotime="4000"';
			$data_slider .= $settings['speed'] ? ' data-speed="' . $settings['speed'] . '"' : ' data-speed="600"';

			$data_slider .= ' data-item="' . ( isset( $settings['column'] ) && $settings['column'] ? $settings['column'] : '3' ) . '"';
			$data_slider .= ' data-desktop="' . ( isset( $settings['column'] ) && $settings['column'] ? $settings['column'] : '3' ) . '" ';
			$data_slider .= ' data-tablet="' . ( isset( $settings['tab_column'] ) && $settings['tab_column'] ? $settings['tab_column'] : '2' ) . '"';
			$data_slider .= ' data-tabsmall="' . ( isset( $settings['tab_column'] ) && $settings['tab_column'] ? $settings['tab_column'] : '2' ) . '"';
			$data_slider .= ' data-mobile="' . ( isset( $settings['mb_column'] ) && $settings['mb_column'] ? $settings['mb_column'] : '1' ) . '"';
		}
        $query_smalllist = new WP_Query( $smquery_args );
        $qoffset = isset($smquery_args['offset']) && $smquery_args['offset'] ? $smquery_args['offset'] : 0;
        $qppp = isset($smquery_args['posts_per_page']) && $smquery_args['posts_per_page'] ? $smquery_args['posts_per_page'] : get_option('posts_per_page');
        $class_check = $qoffset + $qppp >= $query_smalllist->found_posts ? 'pc-nomorepost' : 'pc-hasmorepost';
        if ( $query_smalllist->have_posts() ) {
            if ( ! $more ) :
            $wrapper_id = $elid ? $class_check.' pwsl-id-'.$elid : 'pwsl-id-default';
				?>
                <div class="goso-smalllist pcsl-wrapper <?php echo $wrapper_id;?>">
                    <div class="<?php echo $inner_wrapper_class; ?>"<?php echo $data_slider; ?>>
                    <?php endif;?>
						<?php while ( $query_smalllist->have_posts() ) : $query_smalllist->the_post();?>
                            <div class="pcsl-item<?php if ( 'yes' == $settings['hide_thumb'] || ! has_post_thumbnail() ) {
								echo ' pcsl-nothumb';
							} ?>">
                                <div class="pcsl-itemin">
                                    <div class="pcsl-iteminer">
										<?php if ( in_array( 'date', $post_meta ) && 'nlist' == $type ) { ?>
                                            <div class="pcsl-date pcsl-dpos-<?php echo $date_pos; ?>">
                                                <span class="sl-date"><?php goso_authow_time_link( null, $dformat ); ?></span>
                                            </div>
										<?php } ?>

										<?php if ( 'yes' != $settings['hide_thumb'] && has_post_thumbnail() ) { ?>
                                            <div class="pcsl-thumb">
												<?php
												/* Display Review Piechart  */
												if ( 'yes' == $settings['show_reviewpie'] && function_exists( 'goso_display_piechart_review_html' ) ) {
													goso_display_piechart_review_html( get_the_ID(), 'small' );
												}
												?>
												<?php if ( 'yes' == $settings['show_formaticon'] ): ?>
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
												<?php if ( 'yes' != $settings['disable_lazy'] ) { ?>
                                                    <a href="<?php the_permalink(); ?>"
                                                       title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"
                                                       class="goso-image-holder goso-lazy"<?php if ( 'yes' == $settings['nocrop'] ) {
														echo ' style="padding-bottom: ' . goso_get_featured_image_padding_markup( get_the_ID(), $thumbnail, true ) . '%"';
													} ?>
                                                       data-bgset="<?php echo goso_get_featured_image_size( get_the_ID(), $thumbnail ); ?>">
                                                    </a>
												<?php } else { ?>
                                                    <a title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"
                                                       href="<?php the_permalink(); ?>" class="goso-image-holder"
                                                       style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $thumbnail ); ?>');<?php if ( 'yes' == $settings['nocrop'] ) {
														   echo 'padding-bottom: ' . goso_get_featured_image_padding_markup( get_the_ID(), $thumbnail, true ) . '%';
													   } ?>">
                                                    </a>
												<?php } ?>
                                            </div>
										<?php } ?>
                                        <div class="pcsl-content">
											<?php if ( in_array( 'cat', $post_meta ) ) : ?>
                                                <div class="cat pcsl-cat">
													<?php goso_category( '', $primary_cat ); ?>
                                                </div>
											<?php endif; ?>

											<?php if ( in_array( 'title', $post_meta ) ) : ?>
                                                <div class="pcsl-title">
                                                    <a href="<?php the_permalink(); ?>"<?php if ( $title_length ): echo ' title="' . wp_strip_all_tags( get_the_title() ) . '"'; endif; ?>><?php if ( ! $title_length ) {
															the_title();
														} else {
															echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $title_length, '...' );
														} ?></a>
                                                </div>
											<?php endif; ?>

											<?php if ( ( count( array_intersect( array(
														'author',
														'date',
														'comment',
														'views',
														'reading'
													), $post_meta ) ) > 0 && 'nlist' != $type ) || ( count( array_intersect( array(
														'author',
														'comment',
														'views',
														'reading'
													), $post_meta ) ) > 0 && 'nlist' == $type ) ) { ?>
                                                <div class="grid-post-box-meta pcsl-meta">
													<?php if ( in_array( 'author', $post_meta ) ) : ?>
                                                        <span class="sl-date-author author-italic">
													<?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                                                    class="url fn n"
                                                                    href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
													</span>
													<?php endif; ?>
													<?php if ( in_array( 'date', $post_meta ) && 'nlist' != $type ) : ?>
                                                        <span class="sl-date"><?php goso_authow_time_link( null, $dformat ); ?></span>
													<?php endif; ?>
													<?php if ( in_array( 'comment', $post_meta ) ) : ?>
                                                        <span class="sl-comment">
												<a href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a>
											</span>
													<?php endif; ?>
													<?php
													if ( in_array( 'views', $post_meta ) ) {
														echo '<span class="sl-views">';
														echo goso_get_post_views( get_the_ID() );
														echo ' ' . goso_get_setting( 'goso_trans_countviews' );
														echo '</span>';
													}
													?>
													<?php
													$hide_readtime = in_array( 'reading', $post_meta ) ? false : true;
													if ( goso_isshow_reading_time( $hide_readtime ) ): ?>
                                                        <span class="sl-readtime"><?php goso_reading_time(); ?></span>
													<?php endif; ?>
                                                </div>
											<?php } ?>

											<?php if ( 'yes' == $settings['show_excerpt'] && 'side' == $excerpt_pos ) { ?>
                                                <div class="pcbg-pexcerpt pcsl-pexcerpt">
													<?php goso_the_excerpt( $excerpt_length ); ?>
                                                </div>
											<?php } ?>
											<?php if ( 'yes' == $settings['show_readmore'] && 'side' == $excerpt_pos ) { ?>
                                                <div class="pcsl-readmore">
                                                    <a href="<?php the_permalink(); ?>"
                                                       class="pcsl-readmorebtn pcsl-btns-<?php echo $rmstyle; ?>">
														<?php echo goso_get_setting( 'goso_trans_read_more' ); ?>
                                                    </a>
                                                </div>
											<?php } ?>
                                        </div>

										<?php if ( ( 'yes' == $settings['show_excerpt'] || 'yes' == $settings['show_readmore'] ) && 'below' == $excerpt_pos ) { ?>
                                            <div class="pcsl-flex-full">
												<?php if ( 'yes' == $settings['show_excerpt'] ) { ?>
                                                    <div class="pcbg-pexcerpt pcsl-pexcerpt">
														<?php goso_the_excerpt( $excerpt_length ); ?>
                                                    </div>
												<?php } ?>
												<?php if ( 'yes' == $settings['show_readmore'] ) { ?>
                                                    <div class="pcsl-readmore">
                                                        <a href="<?php the_permalink(); ?>"
                                                           class="pcsl-readmorebtn pcsl-btns-<?php echo $rmstyle; ?>">
															<?php echo goso_get_setting( 'goso_trans_read_more' ); ?>
                                                        </a>
                                                    </div>
												<?php } ?>
                                            </div>
										<?php } ?>
                                    </div>
                                </div>
                            </div>
						<?php endwhile;

                         if ( !$more ) :?>

                    </div>
                </div>
				<?php
                endif;

			} /* End check if query exists posts */
			wp_reset_postdata();
            exit;
    }
}

/**
 * Functions callback featured posts
 *
 * @since 8.0.3
 */
if ( ! function_exists( 'goso_more_featured_post_ajax_func' ) ) {
	add_action('wp_ajax_nopriv_goso_more_featured_post_ajax', 'goso_more_featured_post_ajax_func');
	add_action('wp_ajax_goso_more_featured_post_ajax', 'goso_more_featured_post_ajax_func');
	function goso_more_featured_post_ajax_func() {
        if ( is_user_logged_in() ){
			$nonce = $_POST['nonce'];
			if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
				{die ( 'Nope!' );}
		}
        $atts          = isset( $_POST['datafilter'] ) ? $_POST['datafilter'] : array();
        $cat          = isset( $_POST['cat'] ) ? $_POST['cat'] : array();
        $tag          = isset( $_POST['tag'] ) ? $_POST['tag'] : array();
        $author          = isset( $_POST['author'] ) ? $_POST['author'] : array();
        $id          = isset( $_POST['id'] ) ? $_POST['id'] : '';
        $paged          = isset( $_POST['pagednum'] ) ? $_POST['pagednum'] : '';
        if( $atts && is_array( $atts ) ){
            extract( $atts );
        }
        $query_args = $atts['elementor_query'];
        $custom_query_tab = false;
        if ( $cat ) {
            $query_args['cat'] = $cat;
        }

        if ( $tag ) {
            $query_args['tag_id'] = $tag;
        }

        if ( $author ) {
            $query_args['author'] = $author;
        }

        if ( $cat || $tag || $author ) {
            unset($query_args['offset']);
            unset($query_args['tax_query']);
            $custom_query_tab = true;
        }

        $dppp = isset($query_args['posts_per_page']) && $query_args['posts_per_page'] ? $query_args['posts_per_page'] : get_option('posts_per_page');
        $num_check = 0;
        if ( $paged ) {
            if ( isset($query_args['offset']) && $query_args['offset'] && ! $custom_query_tab ) {
                $query_args['offset'] = $paged * $query_args['offset'];
                $num_check = $query_args['offset'] + $dppp;
            } else {
                $query_args['paged'] = $paged;
                $num_check = $paged * $dppp;
            }
        }

        $fea_query      = new WP_Query( $query_args );
        $numers_results = $fea_query->post_count;
        $max_paged = $fea_query->max_num_pages;
        $doffset = isset($query_args['offset']) && $query_args['offset'] ? $query_args['offset'] : 0;
        $class_check = $num_check >= $fea_query->found_posts ? 'pc-nomorepost' : 'pc-hasmorepost';
        $slider_autoplay = 'true';
        if ( $atts['cat_autoplay'] ) {
            $slider_autoplay = 'false';
        }
        ?>
        <div class="home-featured-cat-content <?php echo esc_attr( $class_check.' pwf-id-'.$id.' '.$style ); ?>">
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
                         data-item="<?php echo $data_item; ?>" data-desktop="<?php echo $data_item; ?>"
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
                                wp_reset_postdata();
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
        exit;
	}
}

/**
 * Functions callback when using ajax load more posts on Big Grid
 *
 * @since 7.9
 */
if ( ! function_exists( 'goso_big_grid_more_post_ajax_func' ) ) {
	add_action('wp_ajax_nopriv_goso_bgmore_post_ajax', 'goso_big_grid_more_post_ajax_func');
	add_action('wp_ajax_goso_bgmore_post_ajax', 'goso_big_grid_more_post_ajax_func');
	function goso_big_grid_more_post_ajax_func() {
		if ( is_user_logged_in() ){
			$nonce = $_POST['nonce'];
			if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ){
				die ( 'Nope!' );
			}
		}

			$settings    = ( isset( $_POST["settings"] ) ) ? $_POST["settings"] : array();
			$pagednum   = ( isset( $_POST['pagednum'] ) ) ? (int) $_POST['pagednum'] : 1;
            $query_type = ( isset( $_POST['query_type'] ) ) ? $_POST['query_type'] : 'post';
            $archivetype  = isset( $_POST['archivetype'] ) ? $_POST['archivetype'] : '';
            $archivevalue = isset( $_POST['archivevalue'] ) ? $_POST['archivevalue'] : '';
            $arppp = isset( $_POST['arppp'] ) ? (int) $_POST['arppp'] : '';
            $cat = isset( $_POST['cat'] ) ? $_POST['cat'] : '';
            $tag = isset( $_POST['tag'] ) ? $_POST['tag'] : '';
            $author = isset( $_POST['author'] ) ? $_POST['author'] : '';
            $scroll = isset( $_POST['scroll'] ) ? $_POST['scroll'] : '';

			/* Get settings data */
			$flag_style = false;
			$biggid_style = $settings['style'] ? $settings['style'] : 'style-1';
			$overlay_type = $settings['overlay_type'] ? $settings['overlay_type'] : 'whole';
			$bgcontent_pos = $settings['bgcontent_pos'] ? $settings['bgcontent_pos'] : 'on';
			$content_display = $settings['content_display'] ? $settings['content_display'] : 'block';
			$disable_lazy = $settings['disable_lazy'] ? $settings['disable_lazy'] : '';
			$image_hover = $settings['image_hover'] ? $settings['image_hover'] : 'zoom-in';
			$text_overlay = $settings['text_overlay'] ? $settings['text_overlay'] : 'none';
			$text_overlay_ani = $settings['text_overlay_ani'] ? $settings['text_overlay_ani'] : 'movetop';
			$thumb_size = $settings['thumb_size'] ? $settings['thumb_size'] : 'goso-masonry-thumb';
			$bthumb_size = $settings['bthumb_size'] ? $settings['bthumb_size'] : 'goso-full-thumb';
			$mthumb_size = $settings['mthumb_size'] ? $settings['mthumb_size'] : 'goso-masonry-thumb';
			$readmore_icon = $settings['readmore_icon'] ? $settings['readmore_icon'] : '';
			$hide_cat_small = $settings['hide_cat_small'] ? $settings['hide_cat_small'] : '';
			$hide_meta_small = $settings['hide_meta_small'] ? $settings['hide_meta_small'] : '';
			$hide_excerpt_small = $settings['hide_excerpt_small'] ? $settings['hide_excerpt_small'] : '';
			$hide_rm_small = $settings['hide_rm_small'] ? $settings['hide_rm_small'] : '';
			$show_formaticon = $settings['show_formaticon'] ? $settings['show_formaticon'] : '';
			$show_reviewpie = $settings['show_reviewpie'] ? $settings['show_reviewpie'] : '';
			$readmore_icon_pos = $settings['readmore_icon_pos'] ? $settings['readmore_icon_pos'] : 'right';
			
			$post_meta = $settings['bg_postmeta'] ? $settings['bg_postmeta'] : array();
			$primary_cat = $settings['primary_cat'] ? $settings['primary_cat'] : '';
			$title_length = $settings['title_length'] ? $settings['title_length'] : '';
			$show_readmore = $settings['show_readmore'] ? $settings['show_readmore'] : '';
			$excerpt_length = $settings['excerpt_length'] ? $settings['excerpt_length'] : 10;
			if( ! in_array( $biggid_style, array( 'style-1', 'style-2' ) ) ){
				$flag_style = true;
			}

            $args = array(
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'orderby'        => $settings['query']['orderby'],
                'order'          => $settings['query']['order'],
            );

            $pper_page = isset( $settings['query']['posts_per_page'] ) ? $settings['query']['posts_per_page'] : 10;
            $per_page = $arppp ? $arppp : $pper_page;
            $args['posts_per_page'] = $per_page;


            if ( isset($settings['query']['tax_query']) ) {
                $args['tax_query'] = $settings['query']['tax_query'];
            }

            if ( $query_type != 'current_query'){
                $args = $settings['query'] ? $settings['query'] : array();
                $args['paged'] = $pagednum;
                $flag_offset = false;
                if( isset( $args['offset'] ) && (int)$args['offset'] > 0 ){
                    $flag_offset = true;
                    $data_offset = $args['offset'];
                    $data_paged = isset( $args['paged'] ) ? $args['paged'] : 1;
                    unset( $args['paged'] );
                    $args['offset'] = $per_page * ( $data_paged - 1 ) + $data_offset;
                }
            } else if ($archivetype && $archivevalue) {

                $orderby = get_theme_mod('goso_general_post_orderby');
                if ( !$orderby ): $orderby = 'date'; endif;

                $order = get_theme_mod('goso_general_post_order');
                if ( ! $order ) : $order = 'DESC'; endif;

                $args = array(
				    'post_type'      => 'post',
                    'post_status'    => 'publish',
                    'posts_per_page' => $arppp ? $arppp : 10,
                    'offset'         => $arppp * ($pagednum - 1),
                    'orderby'        => $orderby,
                    'order'          => $order
                );

                $new_offset = ( isset( $settings['query']['offset'] ) && $settings['query']['offset'] ) ? intval( $settings['query']['offset'] ) : 0;
                $args['offset'] =  $new_offset + ($arppp * ($pagednum - 1));

                if( 'cat' == $archivetype ){
                    $args['cat'] = $archivevalue;
                }elseif( 'tag' == $archivetype ){
                    $args['tag_id'] = $archivevalue;
                }elseif ( 'day' == $archivetype ) {
                        $date_arr = explode( '|', $archivevalue );
                        $args['date_query'] = array(
                            array(
                                'year'  => isset( $date_arr[2] ) ? $date_arr[2] : '',
                                'month' => isset( $date_arr[0] ) ? $date_arr[0] : '',
                                'day'   => isset( $date_arr[1] ) ? $date_arr[1] : ''
                            )
                        );
                    }
                elseif ( 'month' == $archivetype ) {
                    $date_arr = explode( '|', $archivevalue );
                    $args['date_query'] = array(
                        array(
                            'year'  => isset( $date_arr[2] ) ? $date_arr[2] : '',
                            'month' => isset( $date_arr[0] ) ? $date_arr[0] : '',
                        )
                    );
                }
                elseif ( 'year' == $archivetype ) {
                    $date_arr = explode( '|', $archivevalue );
                    $args['date_query'] = array(
                        array(
                            'year'  => isset( $date_arr[2] ) ? $date_arr[2] : ''
                        )
                    );
                }elseif ( 'search' == $archivetype ) {
                    $args['s'] = $archivevalue;

                    if ( ! get_theme_mod( 'goso_include_search_page' ) ){
                        $post_types = get_post_types( array( 'public' => true, 'show_in_nav_menus' => true ), 'names' );
                        $array_include = array();
                        foreach( $post_types as $key => $val ){
                            if( 'page' != $key ){
                                $array_include[] = $key;
                            }
                        }
                        $args['post_type'] = $array_include;

                    } else {
                        if( isset( $args['post_type'] ) ){
                            unset( $args['post_type'] );
                        }
                    }
                }elseif ( 'author' == $archivetype ) {
                     $args['author'] = $archivevalue;

                     if( isset( $args['post_type'] ) ){
                        unset( $args['post_type'] );
                     }
                }else{
                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => $archivetype,
                            'field'    => 'term_id',
                            'terms'    => array( $archivevalue ),
                        )
                    );
                }
            }

            if ( $cat || $tag || $author ) {
                $orderby = get_theme_mod('goso_general_post_orderby');
                if ( !$orderby ): $orderby = 'date'; endif;

                $order = get_theme_mod('goso_general_post_order');
                if ( ! $order ) : $order = 'DESC'; endif;
                $args = array(
				    'post_type'      => isset($settings['query']['post_type']) ? $settings['query']['post_type'] : 'post',
                    'post_status'    => 'publish',
                    'posts_per_page' => $per_page,
                    'orderby'        => isset($settings['query']['orderby']) ? isset($settings['query']['orderby']) : $orderby,
                    'order'          => isset($settings['query']['order']) ? isset($settings['query']['order']) : $order,
                );
                if ( $pagednum > 1 ) {
                    $args['offset'] = $per_page * ($pagednum - 1);
                }
            }

            if ( $cat ) {
                $args['cat'] = $cat;
            }

            if ( $tag ) {
                $args['tag_id'] = $tag;
            }

            if ( $author ) {
                $args['author'] = $tag;
            }

            if ( $pagednum ) {
                $args['paged'] = $pagednum;
            }
			$loop = new WP_Query( $args );

            $class_check = $args['paged'] >= $loop->max_num_pages ? 'pc-nomorepost' : 'pc-hasmorepost';
			if ( $loop->have_posts() ) :
			$num_posts = $loop->post_count;
			$big_items = goso_big_grid_is_big_items( $biggid_style );
			$bg = 1;
			if( $flag_style ){
				echo '<div class="goso-clearfix goso-biggrid-data goso-dblock goso-fixh">';
			}
			while ( $loop->have_posts() ) : $loop->the_post();
				$hide_cat_small_flag = $hide_meta_small_flag = $hide_rm_small_flag = $hide_excerpt_small_flag = false;
				$is_big_item = '';
				$surplus = goso_big_grid_count_classes( $bg, $biggid_style, true );
				$thumbnail = $thumb_size;
				if( ! empty( $big_items ) && in_array( $surplus, $big_items ) ){
					$thumbnail = $bthumb_size;
					$is_big_item = ' pcbg-big-item';
				}
				if( goso_is_mobile() ){
					$thumbnail = $mthumb_size;
				}
				if( ! $is_big_item ){
					if( 'yes' == $hide_cat_small ){
						$hide_cat_small_flag = true;
					}
					if( 'yes' == $hide_meta_small ){
						$hide_meta_small_flag = true;
					}
					if ( 'yes' == $hide_excerpt_small ) {
						$hide_excerpt_small_flag = true;
					}
					if( 'yes' == $hide_rm_small ){
						$hide_rm_small_flag = true;
					}
				}

				if( 'style-1' == $biggid_style || 'style-2' == $biggid_style ){
				    $hide_cat_small_flag = $hide_meta_small_flag = $hide_rm_small_flag = $hide_excerpt_small_flag = false;
				}
				
				include( locate_template( 'inc/elementor/modules/goso-big-grid/widgets/based-post.php' ) );
				
				if( $flag_style && $surplus == 0 && $bg < $num_posts ){
					echo '</div><div class="goso-clearfix goso-biggrid-data goso-dblock goso-fixh">';
				}
				
				$bg++;
			endwhile;
			
			if( $flag_style ){
				echo '</div>';
			}

            echo '<span class="'.$class_check.'"></span>';
			
			endif; /* End check if no posts */

			wp_reset_postdata();

		exit;
	}
}

/* Define item posts per page for each big grid style */
if ( ! function_exists( 'goso_big_grid_count_item' ) ) {
	function goso_big_grid_count_item( $biggid_style ){
		$count = 5;
		if( in_array( $biggid_style, array( 'style-3', 'style-5', 'style-13', 'style-17' ) ) ){
			$count = 3;
		} else if( in_array( $biggid_style, array( 'style-7', 'style-8', 'style-11', 'style-12', 'style-14', 'style-16', 'style-18' ) ) ){
			$count = 4;
		} else if( in_array( $biggid_style, array( 'style-15' ) ) ){
			$count = 6;
		} else if( in_array( $biggid_style, array( 'style-19', 'style-20', 'style-21', 'style-22' ) ) ){
			$count = 7;
		}

		return $count;
	}
}

/* Define big grid current item is big items or not */
if ( ! function_exists( 'goso_big_grid_is_big_items' ) ) {
	function goso_big_grid_is_big_items( $biggid_style ){
		$return = array();

		if( in_array( $biggid_style, array( 'style-3', 'style-4', 'style-5', 'style-6', 'style-8', 'style-12', 'style-13', 'style-14', 'style-15', 'style-17' ) ) ){
			$return = array( 1 );
		} else if( in_array( $biggid_style, array( 'style-7', 'style-9' ) ) ){
			$return = array( 1, 2 );
		} else if( in_array( $biggid_style, array( 'style-10', 'style-11' ) ) ){
			$return = array( 4, 0 );
		} else if( in_array( $biggid_style, array( 'style-16', 'style-18' ) ) ){
			$return = array( 1, 0 );
		} else if( in_array( $biggid_style, array( 'style-19' ) ) ){
			$return = array( 3, 0 );
		} else if( in_array( $biggid_style, array( 'style-20' ) ) ){
			$return = array( 1, 6 );
		} else if( in_array( $biggid_style, array( 'style-21' ) ) ){
			$return = array( 1, 2, 3 );
		} else if( in_array( $biggid_style, array( 'style-22' ) ) ){
			$return = array( 5, 6, 0 );
		}
		
		return $return;
	}
}

/* Get item counter for big grid */
if ( ! function_exists( 'goso_big_grid_count_classes' ) ) {
	function goso_big_grid_count_classes( $bg, $biggid_style, $surplus = false ){
		$classes = $num = '';
		
		if( ! in_array( $biggid_style, array( 'style-1', 'style-2' ) ) ){
			$num = goso_big_grid_count_item( $biggid_style );
		}
		
		if( $num ){
			$sur_plus = $bg % $num;
			$classes = ' bgitem-' . $sur_plus;
			if( $surplus == true ){
				$classes = $sur_plus;
			}
		}
		
		return $classes;
	}
}

/**
 * Fallback when menu location is not checked
 * Callback function in wp_nav_menu() on header.php
 *
 * @since 1.0
 */
if ( ! function_exists( 'goso_menu_fallback' ) ) {
	function goso_menu_fallback() {
		if ( ! current_user_can( 'manage_options' ) ) {
			echo '<ul class="menu goso-topbar-menu"><li class="menu-item-first"><a href="' . esc_url( home_url('/') ) . '">Home</a></li></ul>';
		} else {
			echo '<ul class="menu goso-topbar-menu"><li class="menu-item-first"><a href="' . esc_url( home_url('/') ) . 'wp-admin/nav-menus.php?action=locations">Create or select a menu</a></li></ul>';
		}
	}
}

/**
 * Add more goso-body-boxed to body_class() function
 * This class will add more when body boxed is enable
 *
 * @package Wordpress
 * @since 1.0
 */

if ( ! function_exists( 'goso_add_more_body_boxed_class' ) ) {
	add_filter( 'body_class', 'goso_add_more_body_boxed_class' );
	function goso_add_more_body_boxed_class( $classes ) {
		if ( get_theme_mod( 'goso_body_boxed_layout' ) && ! get_theme_mod( 'goso_vertical_nav_show' ) ){
			// add 'goso-body-boxed' to the $classes array
			$classes[] = 'goso-body-boxed';
		}
		
		if( defined( 'GOSO_SOLEDAD_VERSION' ) ){
			$version = GOSO_SOLEDAD_VERSION;
			$version_render = 'authow-ver-'. str_replace( '.', '-', $version );
			$classes[] = $version_render;
		}
		
		if( get_theme_mod( 'goso_vertical_nav_show' ) ) {
			$classes[] = 'goso-vernav-enable';
			$class_post = 'goso-vernav-poleft';
			if( get_theme_mod( 'goso_menu_hbg_pos' ) == 'right' ) {
				$class_post = 'goso-vernav-poright';
			}
			$classes[] = $class_post;
		}
		
		if( get_theme_mod( 'goso_vernav_click_parent' ) ){
			$classes[] = 'goso-vernav-cparent';
		}
		
		if( get_theme_mod( 'goso_menu_hbg_click_parent' ) ){
			$classes[] = 'goso-hbg-cparent';
		}

		if( get_theme_mod( 'goso_enable_dark_layout' ) ){
			$classes[] = 'pcdark-mode';
		} else {
			$classes[] = 'pclight-mode';
		}
		
		if( get_theme_mod( 'goso_catdesign' ) ){
			$pccat_design = get_theme_mod( 'goso_catdesign' );
			if( $pccat_design ){
				$classes[] = 'pccatds-filled';
				$classes[] = 'pccatdss-' . $pccat_design;
			}
		}

		if( is_singular() && ! is_page() ){
			$single_style = goso_get_single_style();

			if ( in_array( $single_style, array( 'style-1', 'style-2' ) ) ) {
				return $classes;
			}

			$classes[] = 'goso-body-single-' . $single_style;

			if( get_theme_mod( 'goso_move_title_bellow' ) ){
				$classes[] = 'goso-body-title-bellow';
			}

			$post_format = get_post_format();
			if( ! has_post_thumbnail() || ( get_theme_mod( 'goso_post_thumb' ) && ! in_array( $post_format, array( 'link', 'quote','gallery','video', 'audio' ) ) )  ) {
				$classes[] = 'goso-hide-pthumb';
			}else{
				$classes[] = 'goso-show-pthumb';
			}
		}

		return $classes;
	}
}

add_filter('body_class',function ($classes){
    $classes[] = 'pcmn-drdw-style-'.get_theme_mod('goso_header_menu_ani_style','slide_down');
    return $classes;
});

/**
 * Define class for call in javascript when enable lightbox videos for video posts format
 *
 * @since 4.0.3
 */
if ( ! function_exists( 'goso_class_lightbox_enable' ) ) {
	function goso_class_lightbox_enable() {
		$return = '';
		$post_id = get_the_ID();

		if( has_post_format( 'video', $post_id ) && get_theme_mod('goso_grid_lightbox_video') ) {
			$goso_video_data = get_post_meta( $post_id, '_format_video_embed', true );
			if( $goso_video_data ) {
				$return = ' goso-other-layouts-lighbox';
			}
		}

		return $return;
	}
}

/**
 * Define permalink for enable lightbox videos for video posts format
 *
 * @since 4.0.3
 */
if ( ! function_exists( 'goso_permalink_fix' ) ) {
	function goso_permalink_fix() {
		$return = get_the_permalink();
		$post_id = get_the_ID();


		if( has_post_format( 'video', $post_id ) && get_theme_mod('goso_grid_lightbox_video') ) {
			$goso_video_data = get_post_meta( $post_id, '_format_video_embed', true );
			if( $goso_video_data ) {
				if ( wp_oembed_get( $goso_video_data ) ) {
					$return = $goso_video_data;
				} else {
					if (strpos( $goso_video_data, 'youtube.com') > 0) {
						preg_match('/embed\/([\w+\-+]+)[\"\?]/', $goso_video_data, $matches);
						if( $matches[1] ) {
							$return = 'https://www.youtube.com/watch?v=' . $matches[1];
						}
					}  elseif (strpos( $goso_video_data, 'vimeo.com') > 0) {
						preg_match('/player\.vimeo\.com\/video\/([0-9]*)/', $goso_video_data, $matches);
						if( $matches[1] ) {
							$return = 'https://vimeo.com/' . $matches[1];
						}
					}
				}
			}
		}

		echo $return;
	}
}

/**
 * Goso Allow HTML use in data validation wp_kses()
 *
 * @return array HTML allow
 *@since 1.0
 */
if ( ! function_exists( 'goso_allow_html' ) ) {
	function goso_allow_html() {
		$return = array(
			'a'      => array(
				'href'   => array(),
				'title'  => array(),
				'target' => array(),
				'title'  => array()
			),
			'div'    => array(
				'class' => array(),
				'id'    => array(),
			),
			'ul'     => array(
				'class' => array(),
				'id'    => array()
			),
			'ol'     => array(
				'class' => array(),
				'id'    => array()
			),
			'li'     => array(
				'class' => array(),
				'id'    => array()
			),
			'br'     => array(),
			'h1'     => array(
				'class' => array(),
				'id'    => array()
			),
			'h2'     => array(
				'class' => array(),
				'id'    => array()
			),
			'h3'     => array(
				'class' => array(),
				'id'    => array()
			),
			'h4'     => array(
				'class' => array(),
				'id'    => array()
			),
			'h5'     => array(
				'class' => array(),
				'id'    => array()
			),
			'h6'     => array(
				'class' => array(),
				'id'    => array()
			),
			'img'    => array(
				'alt'   => array(),
				'src'   => array(),
				'title' => array()
			),
			'em'     => array(),
			'b'      => array(),
			'i'      => array(
				'class' => array(),
				'id'    => array()
			),
			'strong' => array(
				'class' => array(),
				'id'    => array()
			),
			'span'   => array(
				'class' => array(),
				'id'    => array()
			),
		);

		return $return;
	}
}

/**
 * Get categories array
 *
 * @return array $categories
 *@since 1.0
 */
if ( ! function_exists( 'goso_list_categories' ) ) {
	function goso_list_categories() {
		$categories = get_categories( array(
			'hide_empty' => 0
		) );

		$return = array();
		foreach ( $categories as $cat ) {
			$return[$cat->cat_name] = $cat->term_id;
		}

		return $return;
	}
}


/**
 * Modify more tag
 *
 * @return new markup more tags
 *@since 1.0
 */
if ( ! function_exists( 'goso_modify_more_tags' ) ) {
	/**
	 * @param $link
	 *
	 * @return string
	 */
	function goso_modify_more_tags( $link ) {
		
		$class = 'goso-more-link';
		if( get_theme_mod('goso_standard_continue_reading_button') ):
			$class = 'goso-more-link goso-more-link-button';
		endif;

		return '<div class="'. $class .'">' . $link . '</div>';
	}

	add_filter('the_content_more_link', 'goso_modify_more_tags');
}

/**
 * Include Files
 *
 * @return void
 *@since 1.0
 */
 
// Customizer
include( trailingslashit( get_template_directory() ). 'inc/customizer/default.php' );
//include( trailingslashit( get_template_directory() ). 'inc/customizer/controller.php' );
include( trailingslashit( get_template_directory() ). 'inc/customizer/sanitizing.php' );
include( trailingslashit( get_template_directory() ). 'inc/customizer/generate-css-file.php');
include( trailingslashit( get_template_directory() ). 'inc/customizer/framework/bootstrap.php' );
include( trailingslashit( get_template_directory() ). 'inc/customizer/style.php' );
include( trailingslashit( get_template_directory() ). 'inc/customizer/style-page-header-title.php' );
include( trailingslashit( get_template_directory() ). 'inc/customizer/style-page-header-transparent.php' );
include( trailingslashit( get_template_directory() ). 'inc/fonts/fonts.php' );

// Modules
include( trailingslashit( get_template_directory() ). 'inc/detect_mobile.php' );
include( trailingslashit( get_template_directory() ). 'inc/theme-updates.php' );
include( trailingslashit( get_template_directory() ). 'inc/modules/goso-render.php' );
include( trailingslashit( get_template_directory() ). 'inc/modules/goso-walker.php' );
include( trailingslashit( get_template_directory() ). 'inc/modules/svg-social.php' );
include( trailingslashit( get_template_directory() ). 'inc/template-function.php' );
include( trailingslashit( get_template_directory() ). 'inc/videos-playlist.php' );
include( trailingslashit( get_template_directory() ). 'inc/weather.php' );
include( trailingslashit( get_template_directory() ). 'inc/login-popup.php' );
include( trailingslashit( get_template_directory() ). 'inc/popup.php' );
include( trailingslashit( get_template_directory() ). 'inc/age-verify.php' );
include( trailingslashit( get_template_directory() ). 'inc/social-counter/social-counter.php' );

// Widgets
if ( ! function_exists( 'goso_use_widget_title_html' ) ) {
	add_action( 'init', 'goso_use_widget_title_html',999 );
	function goso_use_widget_title_html() {
		remove_filter( 'widget_title', 'esc_html' );
	}
}
include( trailingslashit( get_template_directory() ). 'inc/widgets/social_widget.php' );
include( trailingslashit( get_template_directory() ). 'inc/widgets/about_widget.php' );
include( trailingslashit( get_template_directory() ). 'inc/widgets/lastest_post_widget.php' );
include( trailingslashit( get_template_directory() ). 'inc/widgets/popular_post_widget.php' );
include( trailingslashit( get_template_directory() ). 'inc/widgets/block_heading.php' );
include( trailingslashit( get_template_directory() ). 'inc/widgets/facebook_widget.php' );
include( trailingslashit( get_template_directory() ). 'inc/widgets/related_post_widget.php' );
include( trailingslashit( get_template_directory() ). 'inc/widgets/posts_slider_widget.php' );
include( trailingslashit( get_template_directory() ). 'inc/widgets/quote_widget.php' );
include( trailingslashit( get_template_directory() ). 'inc/widgets/pinterest_widget.php' );
include( trailingslashit( get_template_directory() ). 'inc/widgets/list_banner.php' );
include( trailingslashit( get_template_directory() ). 'inc/widgets/login_register_widgets.php' );
include( trailingslashit( get_template_directory() ). 'inc/widgets/video_playlist.php' );
include( trailingslashit( get_template_directory() ). 'inc/widgets/social_counter.php' );
include( trailingslashit( get_template_directory() ). 'inc/widgets/advanced_categories.php');
include( trailingslashit( get_template_directory() ). 'inc/widgets/authors_list.php');
include( trailingslashit( get_template_directory() ). 'inc/widgets/posts_tabs.php');
include( trailingslashit( get_template_directory() ). 'inc/widgets/search_box.php');
include( trailingslashit( get_template_directory() ). 'inc/widgets/snapchat.php');
include( trailingslashit( get_template_directory() ). 'inc/widgets/tiktok_embed.php');
include( trailingslashit( get_template_directory() ). 'inc/widgets/comments.php');

if ( defined( 'GOSO_SOLEDAD_SOCIAL_FEED' ) ) {
	include( trailingslashit( get_template_directory() ). 'inc/widgets/latest_tweets.php' );
}

// Like post
include( trailingslashit( get_template_directory() ). 'inc/like_post/post-like.php' );

// Meta box
include( trailingslashit( get_template_directory() ). 'inc/meta-box/meta-box.php' );
include( trailingslashit( get_template_directory() ). 'inc/meta-box/categories-meta-box.php' );
include( trailingslashit( get_template_directory() ). 'inc/custom-sidebar.php' );

/**
 * Register main sidebar and sidebars in footer
 *
 * @return void
 *@since 1.0
 */
if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'authow' ),
		'id'            => 'main-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title goso-border-arrow"><span class="inner-arrow">',
		'after_title'   => '</span></h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar Left', 'authow' ),
		'id'            => 'main-sidebar-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title goso-border-arrow"><span class="inner-arrow">',
		'after_title'   => '</span></h3>',
	) );

	for ( $i = 1; $i <= 4; $i ++ ) {
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Footer Column #%s', 'authow' ), $i ),
			'id'            => 'footer-' . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title goso-border-arrow"><span class="inner-arrow">',
			'after_title'   => '</span></h4>',
		) );
	}

	register_sidebar( array(
		'name'          => esc_html__( 'Header Signup Form', 'authow' ),
		'id'            => 'header-signup-form',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="header-signup-form">',
		'after_title'   => '</h4>',
		'description'   => 'Only use for MailChimp Sign-Up Form widget. Display your Sign-Up Form widget below the header. Please use markup we provide here: https://authow.gosodesign.net/authow-document/#widgets to display exact',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Signup Form', 'authow' ),
		'id'            => 'footer-signup-form',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="footer-subscribe-title">',
		'after_title'   => '</h4>',
		'description'   => 'Only use for MailChimp Sign-Up Form widget. Display your Sign-Up Form widget below on the footer. Please use markup we provide here: https://authow.gosodesign.net/authow-document/#widgets to display exact',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Instagram', 'authow' ),
		'id'            => 'footer-instagram',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="footer-instagram-title"><span><span class="title">',
		'after_title'   => '</span></span></h4>',
		'description'   => esc_html__( 'Only use for Instagram Slider widget. Display instagram images on your website footer', 'authow' ),
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Top Instagram', 'authow' ),
		'id'            => 'top-instagram',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="footer-instagram-title top-instagram-title"><span><span class="title">',
		'after_title'   => '</span></span></h4>',
		'description'   => esc_html__( 'Only use for Instagram Slider widget. Display instagram images on the top of your website', 'authow' ),
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Hamburger Widgets Above Menu', 'authow' ),
		'id'            => 'menu_hamburger_1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title goso-border-arrow"><span class="inner-arrow">',
		'after_title'   => '</span></h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Hamburger Widgets Below Menu', 'authow' ),
		'id'            => 'menu_hamburger_2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title goso-border-arrow"><span class="inner-arrow">',
		'after_title'   => '</span></h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar For Shop Page & Shop Archive', 'authow' ),
		'id'            => 'goso-shop-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title goso-border-arrow"><span class="inner-arrow">',
		'after_title'   => '</span></h4>',
		'description'   => 'This sidebar for Shop Page & Shop Archive, if this sidebar is empty, will display Main Sidebar',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar For Single Product', 'authow' ),
		'id'            => 'goso-shop-single',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title goso-border-arrow"><span class="inner-arrow">',
		'after_title'   => '</span></h4>',
		'description'   => 'This sidebar for Single Product, if this sidebar is empty, will display Main Sidebar',
	) );

	if ( class_exists( 'bbPress' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar For BbPress', 'authow' ),
			'id'            => 'goso-bbpress',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title goso-border-arrow"><span class="inner-arrow">',
			'after_title'   => '</span></h4>',
			'description'   => 'This sidebar for Single Product, if this sidebar is empty, will display Main Sidebar',
		) );
	}

	if ( class_exists( 'BuddyPress' ) ) {
		register_sidebar( array(
		'name'          => esc_html__( 'Sidebar For BuddyPress', 'authow' ),
		'id'            => 'goso-buddypress',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title goso-border-arrow"><span class="inner-arrow">',
		'after_title'   => '</span></h4>',
		'description'   => 'This sidebar for Single Product, if this sidebar is empty, will display Main Sidebar',
		) );
	}

	for ( $i = 1; $i <= 10; $i ++ ) {
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Custom Sidebar %s', 'authow' ), $i ),
			'id'            => 'custom-sidebar-' . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title goso-border-arrow"><span class="inner-arrow">',
			'after_title'   => '</span></h4>',
		) );
	}
}

/**
 * Include default fonts support by browser
 *
 * @return array list $goso_font_browser_arr
 *@since 2.0
 */
if ( ! function_exists( 'goso_font_browser' ) ) {
	function goso_font_browser() {
		$goso_font_browser_arr = array( '-apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"' => 'System Font' );
		$goso_font_browser     = array(
			'Arial, Helvetica, sans-serif',
			'Helvetica, sans-serif',
			'"Arial Black", Gadget, sans-serif',
			'"Comic Sans MS", cursive, sans-serif',
			'Impact, Charcoal, sans-serif',
			'"Lucida Sans Unicode", "Lucida Grande", sans-serif',
			'Tahoma, Geneva, sans-serif',
			'"Trebuchet MS", Helvetica, sans-serif',
			'Verdana, Geneva, sans-serif',
			'Georgia, serif',
			'"Palatino Linotype", "Book Antiqua", Palatino, serif',
			'"Times New Roman", Times, serif',
			'"Courier New", Courier, monospace',
			'"Lucida Console", Monaco, monospace',
		);
		foreach ( $goso_font_browser as $font ) {
			$goso_font_browser_arr[$font] = $font;
		}

		return $goso_font_browser_arr;
	}
}

/**
 * Merge 2 array fonts to one array
 *
 * @return array fonts $goso_font_browser_arr
 *@since 1.0
 */
if ( ! function_exists( 'goso_all_fonts' ) ) {
	function goso_all_fonts( $df = null ) {
		$array_df = array();
		if( 'select' == $df ){
			$array_df = array( '' => '- Select -' );
		}
		return array_merge(
			$array_df,
			goso_get_custom_fonts(),
			goso_font_browser(),
			goso_list_google_fonts_array()
		);
	}
}

if (!function_exists('goso_get_option')) {
	function goso_get_option($key = null, $default = false){
		static $data;

		$data = get_option('goso_authow_options');

		if (empty($data)) {
			return '';
		}

		if ($key === null) {
			return $data;
		}

		if (isset($data[$key])) {
			return $data[$key];
		}

		return get_option($key, $default);
	}
}

if ( ! function_exists( 'goso_get_custom_fonts' ) ) {
	function goso_get_custom_fonts() {
		$fontfamily1 = goso_get_option( 'authow_custom_fontfamily1' );
		$fontfamily2 = goso_get_option( 'authow_custom_fontfamily2' );
		$fontfamily3 = goso_get_option( 'authow_custom_fontfamily3' );
		$fontfamily4 = goso_get_option( 'authow_custom_fontfamily4' );
		$fontfamily5 = goso_get_option( 'authow_custom_fontfamily5' );
		$fontfamily6 = goso_get_option( 'authow_custom_fontfamily6' );
		$fontfamily7 = goso_get_option( 'authow_custom_fontfamily7' );
		$fontfamily8 = goso_get_option( 'authow_custom_fontfamily8' );
		$fontfamily9 = goso_get_option( 'authow_custom_fontfamily9' );
		$fontfamily10 = goso_get_option( 'authow_custom_fontfamily10' );


		$list_fonts = array();

		if ( $fontfamily1 ) {
			$list_fonts[ $fontfamily1 ] = $fontfamily1;
		}
		if ( $fontfamily2 ) {
			$list_fonts[ $fontfamily2 ] = $fontfamily2;
		}

		if ( $fontfamily3 ) {
			$list_fonts[ $fontfamily3 ] = $fontfamily3;
		}

		if ( $fontfamily4 ) {
			$list_fonts[ $fontfamily4 ] = $fontfamily4;
		}

		if ( $fontfamily5 ) {
			$list_fonts[ $fontfamily5 ] = $fontfamily5;
		}

		if ( $fontfamily6 ) {
			$list_fonts[ $fontfamily6 ] = $fontfamily6;
		}

		if ( $fontfamily7 ) {
			$list_fonts[ $fontfamily7 ] = $fontfamily7;
		}

		if ( $fontfamily8 ) {
			$list_fonts[ $fontfamily8 ] = $fontfamily8;
		}

		if ( $fontfamily9 ) {
			$list_fonts[ $fontfamily9 ] = $fontfamily9;
		}

		if ( $fontfamily10 ) {
			$list_fonts[ $fontfamily10 ] = $fontfamily10;
		}

		return $list_fonts;

	}
}

/**
 * Modify category widget defaults
 * Hook to wp_list_categories
 *
 * @since 1.0
 */
if ( ! function_exists( 'goso_add_more_span_cat_count' ) ) {
	add_filter( 'wp_list_categories', 'goso_add_more_span_cat_count' );
	function goso_add_more_span_cat_count( $links ) {

		$links = preg_replace( '/<\/a> \(([0-9.,]+)\)/', ' <span class="category-item-count">(\\1)</span></a>', $links );

		return $links;
	}
}

/**
 * Custom number posts per page on homepage
 *
 * @return void
 *@since 1.0
 */
if( get_theme_mod( 'goso_home_lastest_posts_numbers' ) ) {
	if ( ! function_exists( 'goso_custom_posts_per_page_for_home' ) ) {
		function goso_custom_posts_per_page_for_home( $query ) {
			$blog_posts = get_option('posts_per_page ');
			$posts_page = get_theme_mod( 'goso_home_lastest_posts_numbers' );
			if( is_numeric( $posts_page ) && $posts_page > 0 && $posts_page != $blog_posts ) {
				if ( $query->is_home() && $query->is_main_query() ) {
					$query->set( 'posts_per_page', $posts_page );
				}
			}
		}

		add_action('pre_get_posts','goso_custom_posts_per_page_for_home');
	}
}

/**
 * Custom number posts per page on portfolio
 *
 * @return void
 *@since 1.0
 */
if ( ! function_exists( 'goso_portfolio_posts_numbers' ) ) {
	function goso_portfolio_posts_numbers( $query ) {
		$blog_posts = get_option('posts_per_page ');
		if ( $query->is_tax('portfolio-category') && $query->is_main_query() ) {
			$query->set( 'posts_per_page', $blog_posts );
		}
	}

	add_action('pre_get_posts','goso_portfolio_posts_numbers');
}

/**
 * Custom orderby & order post
 *
 * @return void
 *@since 1.0
 */
if ( ! function_exists( 'goso_custom_posts_oderby' ) ) {
	function goso_custom_posts_oderby( $query ) {
		if ( ( $query->is_home() && $query->is_main_query() ) || ( $query->is_archive() && $query->is_main_query() ) ) {
			$orderby = get_theme_mod( 'goso_general_post_orderby' );
			if( !$orderby ): $orderby = 'date'; endif;
			$order = get_theme_mod( 'goso_general_post_order' );
			if( !$order ): $order = 'DESC'; endif;
			
			if( ! function_exists( 'is_woocommerce' ) || ( function_exists( 'is_woocommerce' ) && ! is_woocommerce() ) ) {
				$query->set( 'orderby', $orderby );
				$query->set( 'order', $order );
			}
		}
	}

	add_action('pre_get_posts','goso_custom_posts_oderby');
}

/**
 * Add lightbox for single post by filter
 * Hook to the_content() function
 *
 * @since 1.0
 */
if ( ! function_exists( 'goso_filter_image_attr' ) ) {
	if ( ! get_theme_mod( 'goso_disable_lightbox_single' ) ) {
		add_filter( 'the_content', 'goso_filter_image_attr' );
		function goso_filter_image_attr( $content ) {
			global $post;

			if( !is_home() && !is_archive() ):
				$pattern     = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)><img/i";
				$replacement = '<a$1href=$2$3.$4$5 data-rel="goso-gallery-image-content" $6><img';
				$content     = preg_replace( $pattern, $replacement, $content );
			endif;

			return $content;
		}
	}
}

/**
 * Pagination next post and previous post
 *
 * @return void
 *@since 1.0
 */
if ( ! function_exists( 'goso_authow_archive_pag_style' ) ):
function goso_authow_archive_pag_style( $layout_this ) {

	if( get_theme_mod( 'goso_archive_nav_ajax' ) || get_theme_mod( 'goso_archive_nav_scroll' ) ) {

		$button_class = 'goso-ajax-more goso-ajax-arch';
		if( get_theme_mod( 'goso_archive_nav_scroll' ) ){
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
		if( ! goso_get_setting( 'goso_sidebar_archive' ) ):
		$data_template = 'no-sidebar';
		endif;

		$offset_number = get_option('posts_per_page');

        $goso_cat_featured_layout = get_theme_mod( 'goso_cat_featured_layout', '' );
        $goso_tag_featured_layout = get_theme_mod( 'goso_tag_featured_layout', '' );

        if ( ( is_category() && $goso_cat_featured_layout ) || ( is_tag() && $goso_tag_featured_layout ) ) {
            $goso_featured_layout            = is_category() ? $goso_cat_featured_layout : $goso_tag_featured_layout;
            $grid_per_page                    = goso_featured_archive_ppl( $goso_featured_layout );
            $offset_number = $offset_number + $grid_per_page;
        }

		$num_load = 6;
		if( get_theme_mod( 'goso_arc_number_load_more' ) && 0 != get_theme_mod( 'goso_arc_number_load_more' ) ):
			$num_load = get_theme_mod( 'goso_arc_number_load_more' );
		endif;
		?>
		<?php

		$data_archive_type = '';
		$data_archive_value = '';
		if ( is_category() ) :
			$category = get_category( get_query_var( 'cat' ) );
			$cat_id = isset( $category->cat_ID ) ? $category->cat_ID : '';
			$data_archive_type = 'cat';
			$data_archive_value = $cat_id;
			$opt_cat = 'category_' . $cat_id;
			$cat_meta     = get_option( $opt_cat );
			$sidebar_opts = isset( $cat_meta['cat_sidebar_display'] ) ? $cat_meta['cat_sidebar_display'] : '';
			if( $sidebar_opts == 'no' ):
				$data_template = 'no-sidebar';
			elseif( $sidebar_opts == 'left' || $sidebar_opts == 'right' ):
				$data_template = 'sidebar';
			endif;
			
		elseif ( is_tag() ) :
			$tag = get_queried_object();
			$tag_id = isset( $tag->term_id ) ? $tag->term_id : '';
			$data_archive_type = 'tag';
			$data_archive_value = $tag_id;
		elseif ( is_day() ) :
			$data_archive_type = 'day';
			$data_archive_value = get_the_date( 'm|d|Y' );
		elseif ( is_month() ) :
			$data_archive_type = 'month';
			$data_archive_value = get_the_date( 'm|d|Y' );
		elseif ( is_year() ) :
			$data_archive_type = 'year';
			$data_archive_value = get_the_date( 'm|d|Y' );
		elseif ( is_search() ) :
			$data_archive_type = 'search';
			$data_archive_value = get_search_query();
		elseif ( is_author() ) :

			global $authordata;
			$user_id = isset( $authordata->ID ) ? $authordata->ID : 0;

			$data_archive_type = 'author';
			$data_archive_value = $user_id;
		elseif ( is_archive() ) :
			$queried_object = get_queried_object();
			$term_id = isset( $queried_object->term_id ) ? $queried_object->term_id : '';
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			$tax_name = isset( $tax->name ) ? $tax->name : '';

			if( $term_id && $tax_name ){
				$data_archive_type = $tax_name;
				$data_archive_value = $term_id;
			}
		endif;

		$button_data = 'data-mes="' . goso_get_setting('goso_trans_no_more_posts') . '"';
		$button_data .= ' data-layout="' . esc_attr( $data_layout ) . '"';
		$button_data .= ' data-number="' . absint($num_load) . '"';
		$button_data .= ' data-offset="' . absint($offset_number) . '"';
		$button_data .= ' data-from="customize"';
		$button_data .= ' data-template="' . $data_template . '"';
		$button_data .= ' data-archivetype="' . $data_archive_type . '"';
		$button_data .= ' data-archivevalue="' . $data_archive_value . '"';
		?>
		<div class="goso-pagination <?php echo $button_class; ?>">
			<a href="#" class="goso-ajax-more-button" <?php echo $button_data; ?>>
				<span class="ajax-more-text"><?php echo goso_get_setting('goso_trans_load_more_posts'); ?></span>
				<span class="ajaxdot"></span><?php goso_fawesome_icon('fas fa-sync'); ?>
			</a>
		</div>
		<?php
	}else {
		goso_authow_pagination();
	}
}
endif;

if ( ! function_exists( 'goso_authow_pagination' ) ) {
	function goso_authow_pagination() {

		if( get_theme_mod( 'goso_page_navigation_numbers' ) ) {
			echo goso_pagination_numbers();
		} else {
			global $wp_query;
			if ( $wp_query->max_num_pages > 1 ) :
				?>
				<div class="goso-pagination">
					<div class="newer">
						<?php if( get_previous_posts_link() ) { ?>
							<?php previous_posts_link( '<span>' . goso_icon_by_ver('fas fa-angle-left') . goso_get_setting('goso_trans_newer_posts') .'</span>' ); ?>
						<?php } else { ?>
							<?php echo '<div class="disable-url"><span>'. goso_icon_by_ver('fas fa-angle-left') . goso_get_setting('goso_trans_newer_posts') .'</span></div>'; ?>
						<?php } ?>
					</div>
					<div class="older">
						<?php if( get_next_posts_link() ) { ?>
							<?php next_posts_link( '<span>'. goso_get_setting('goso_trans_older_posts') . ' ' .  goso_icon_by_ver('fas fa-angle-right') . '</span>' ); ?>
						<?php } else { ?>
							<?php echo '<div class="disable-url"><span>'. goso_get_setting('goso_trans_older_posts') . ' ' .  goso_icon_by_ver('fas fa-angle-right') . '</span></div>'; ?>
						<?php } ?>
					</div>
				</div>
			<?php
			endif;
		}
	}
}

/**
 * Pagination numbers
 *
 * @return void
 *@since 1.0
 */
if ( ! function_exists( 'goso_pagination_numbers' ) ) {
	function goso_pagination_numbers( $custom_query = false, $align = null ) {
		global $wp_query;
		if ( !$custom_query ) {$custom_query = $wp_query;}
		$paged_get = 'paged';
		if( is_front_page() && ! is_home() ):
			$paged_get = 'page';
		endif;

        $found_posts = $custom_query->found_posts;
        $posts_per_page = isset($custom_query->query['posts_per_page']) ? $custom_query->query['posts_per_page'] : get_option('posts_per_page');

        if (isset($custom_query->query['offset']) && $custom_query->query['offset'] > 0 ) {

            $offset = $custom_query->query['offset'];
            $current_paged = max( 1, get_query_var( $paged_get ) );

            if ( $current_paged > 1 ) {
                $offset = $offset - ($posts_per_page * ( $current_paged - 1) );
            }

            $total_pages = ceil(( $found_posts - $offset ) / $posts_per_page);
            $custom_query->max_num_pages = $total_pages;
        }

		$big = 999999999; // need an unlikely integer
		$pagination = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var( $paged_get ) ),
			'total' => $custom_query->max_num_pages,
			'type'   => 'list',
			'prev_text'    => goso_icon_by_ver('fas fa-angle-left'),
			'next_text'    => goso_icon_by_ver('fas fa-angle-right'),
		) );

		$pagenavi_align = get_theme_mod( 'goso_page_navigation_align' ) ? get_theme_mod( 'goso_page_navigation_align' ) : 'align-left';
		if( $align ): $pagenavi_align = $align; endif;

		if ( $pagination ) {
			return '<div class="goso-pagination '. esc_attr( $pagenavi_align ) .'">'. $pagination . '</div>';
		}
	}
}

/**
 * Comments template
 *
 * @return void
 *@since 1.0
 */
if ( ! function_exists( 'goso_comments_template' ) ) {
	function goso_comments_template( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;


		$attr_date = 'datetime="' . get_comment_time( 'Y-m-d\TH:i:sP' ) . '"';
		$attr_date .= 'title="' . get_comment_time( 'l, F j, Y, g:i a' ) . '"';
		$attr_date .= 'itemprop="commentTime"';

		?>
		<div <?php comment_class(); ?> id="comment-<?php comment_ID() ?>" itemprop="" itemscope="itemscope" itemtype="https://schema.org/UserComments">
			<meta itemprop="discusses" content="<?php echo esc_attr( get_the_title() ); ?>"/>
            <link itemprop="url" href="#comment-<?php comment_ID() ?>">
			<div class="thecomment">
				<div class="author-img">
					<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>
				<div class="comment-text">
					<span class="author" itemprop="creator" itemtype="https://schema.org/Person"><span itemprop="name"><?php echo get_comment_author_link(); ?></span></span>
					<span class="date" <?php echo $attr_date; ?>><?php goso_fawesome_icon('far fa-clock'); ?><?php printf( esc_html__( '%1$s - %2$s', 'authow' ), get_comment_date(), get_comment_time() ) ?></span>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><i class="icon-info-sign"></i> <?php echo goso_get_setting( 'goso_trans_wait_approval_comment' ); ?></em>
					<?php endif; ?>
					<div class="comment-content" itemprop="commentText"><?php comment_text(); ?></div>
					<span class="reply">
						<?php comment_reply_link( array_merge( $args, array(
							'reply_text' => goso_get_setting( 'goso_trans_reply_comment' ),
							'depth'      => $depth,
							'max_depth'  => $args['max_depth']
						) ), $comment->comment_ID ); ?>
						<?php edit_comment_link( goso_get_setting( 'goso_trans_edit_comment' ) ); ?>
					</span>
				</div>
			</div>
	<?php
	}
}

/**
 * Author socials url
 *
 * @param array $contactmethods
 *
 * @return new array $contactmethods
 *@since 1.0
 *
 */
if ( ! function_exists( 'goso_author_social' ) ) {
	function goso_author_social( $contactmethods ) {
		unset($contactmethods['googleplus']);
		$contactmethods['twitter']   = 'Twitter Username';
		$contactmethods['facebook']  = 'Facebook Username';
		$contactmethods['google']    = 'Google Plus Username';
		$contactmethods['tumblr']    = 'Tumblr Username';
		$contactmethods['instagram'] = 'Instagram Username';
		$contactmethods['linkedin'] = 'LinkedIn Profile URL';
		$contactmethods['pinterest'] = 'Pinterest Username';
		$contactmethods['soundcloud'] = 'Soundcloud Profile URL';
		$contactmethods['youtube'] = 'Youtube Profile URL';

		return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'goso_author_social', 10, 1 );
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package       TGM-Plugin-Activation
 * @subpackage    Example
 * @version       2.5.0-alpha
 * @author        Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author        Gary Jones <gamajo@gamajo.com>
 * @copyright     Copyright (c) 2012, Thomas Griffin
 * @license       http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link          https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once trailingslashit( get_template_directory() ) . 'class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'goso_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
if ( ! function_exists( 'goso_register_required_plugins' ) ) {
	function goso_register_required_plugins() {
		$link_server = 'https://s3.amazonaws.com/authow-plugins/';

		/**
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(
			array(
				'name'               => 'Goso Shortcodes & Performance', // The plugin name
				'slug'               => 'goso-shortcodes', // The plugin slug (typically the folder name)
				'source'             => $link_server . 'goso-shortcodes.zip', // The plugin source
				'required'           => true, // If false, the plugin is only 'recommended' instead of required
				'version'            => '4.9', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => 'Vafpress Post Formats UI', // The plugin name
				'slug'               => 'vafpress-post-formats-ui-develop', // The plugin slug (typically the folder name)
				'source'             => $link_server . 'vafpress-post-formats-ui-develop.zip', // The plugin source
				'required'           => false, // If false, the plugin is only 'recommended' instead of required
				'version'            => '1.7', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => 'Elementor Page Builder', // The plugin name
				'slug'               => 'elementor', // The plugin slug (typically the folder name)
				'required'           => false, // If false, the plugin is only 'recommended' instead of required
				'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => 'Goso Slider', // The plugin name
				'slug'               => 'goso-authow-slider', // The plugin slug (typically the folder name)
				'source'             => $link_server . 'goso-authow-slider.zip', // The plugin source
				'required'           => false, // If false, the plugin is only 'recommended' instead of required
				'version'            => '1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => 'Goso Portfolio', // The plugin name
				'slug'               => 'goso-portfolio', // The plugin slug (typically the folder name)
				'source'             => $link_server . 'goso-portfolio.zip', // The plugin source
				'required'           => false, // If false, the plugin is only 'recommended' instead of required
				'version'            => '3.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => 'Goso Recipe', // The plugin name
				'slug'               => 'goso-recipe', // The plugin slug (typically the folder name)
				'source'             => $link_server . 'goso-recipe.zip', // The plugin source
				'required'           => false, // If false, the plugin is only 'recommended' instead of required
				'version'            => '3.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => 'Goso Review', // The plugin name
				'slug'               => 'goso-review', // The plugin slug (typically the folder name)
				'source'             => $link_server . 'goso-review.zip', // The plugin source
				'required'           => false, // If false, the plugin is only 'recommended' instead of required
				'version'            => '2.7', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => 'Goso Authow Demo Importer', // The plugin name
				'slug'               => 'goso-authow-demo-importer', // The plugin slug (typically the folder name)
				'source'             => $link_server . 'goso-authow-demo-importer.zip', // The plugin source
				'required'           => false, // If false, the plugin is only 'recommended' instead of required
				'version'            => '4.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
            array(
				'name'               => 'Goso Social Feed', // The plugin name
				'slug'               => 'goso-tiktok-twitter-feed', // The plugin slug (typically the folder name)
				'source'             => $link_server . 'goso-tiktok-twitter-feed.zip', // The plugin source
				'required'           => false, // If false, the plugin is only 'recommended' instead of required
				'version'            => '1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => 'Contact Form 7', // The plugin name
				'slug'               => 'contact-form-7', // The plugin slug (typically the folder name)
				'required'           => false, // If false, the plugin is only 'recommended' instead of required
				'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => 'MailChimp for WordPress', // The plugin name
				'slug'               => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
				'required'           => false, // If false, the plugin is only 'recommended' instead of required
				'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => 'WPForms', // The plugin name
				'slug'               => 'wpforms-lite', // The plugin slug (typically the folder name)
				'required'           => false, // If false, the plugin is only 'recommended' instead of required
				'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => 'HubSpot - All-in-One Marketing', // The plugin name
				'slug'               => 'leadin', // The plugin slug (typically the folder name)
				'required'           => false, // If false, the plugin is only 'recommended' instead of required
				'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			)
		);
		
		if( function_exists( 'goso_amp_init' ) ){
			$plugins[] = array(
				'name'               => 'PenCi Authow AMP', // The plugin name
				'slug'               => 'goso-authow-amp', // The plugin slug (typically the folder name)
				'source'             => $link_server . 'goso-authow-amp.zip', // The plugin source
				'required'           => false, // If false, the plugin is only 'recommended' instead of required
				'version'            => '4.6', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			);
		}

		/*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 *
		 * Some of the strings are wrapped in a sprintf(), so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'id'           => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '', // Default absolute path to pre-packaged plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php', // Parent menu slug.
			'capability'   => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true, // Show admin notices or not.
			'dismissable'  => true, // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '', // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true, // Automatically activate plugins after installation or not.
			'message'      => '', // Message to output right before the plugins table.
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'authow' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'authow' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'authow' ),
				// %s = plugin name.
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'authow' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'authow' ),
				// %1$s = plugin name(s).
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'authow' ),
				// %1$s = plugin name(s).
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %1$s plugin.', 'Sorry, but you do not have the correct permissions to install the %1$s plugins.', 'authow' ),
				// %1$s = plugin name(s).
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'authow' ),
				// %1$s = plugin name(s).
				'notice_ask_to_update_maybe'      => _n_noop( 'There is an update available for: %1$s.', 'There are updates available for the following plugins: %1$s.', 'authow' ),
				// %1$s = plugin name(s).
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %1$s plugin.', 'Sorry, but you do not have the correct permissions to update the %1$s plugins.', 'authow' ),
				// %1$s = plugin name(s).
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'authow' ),
				// %1$s = plugin name(s).
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'authow' ),
				// %1$s = plugin name(s).
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %1$s plugin.', 'Sorry, but you do not have the correct permissions to activate the %1$s plugins.', 'authow' ),
				// %1$s = plugin name(s).
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'authow' ),
				'update_link'                     => _n_noop( 'Begin updating plugin', 'Begin updating plugins', 'authow' ),
				'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'authow' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'authow' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'authow' ),
				'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'authow' ),
				'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'authow' ),
				// %1$s = plugin name(s).
				'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'authow' ),
				// %1$s = plugin name(s).
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'authow' ),
				// %s = dashboard link.
				'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'authow' ),
				'nag_type'                        => 'updated',
				// Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
			)
		);

		tgmpa( $plugins, $config );

	}
}


/**
 * Featured category to display in top slider
 *
 * @param string $separator
 *
 * @return void
 *@since 1.0
 *
 */
if ( ! function_exists( 'goso_category' ) ) {
	function goso_category( $separator = '', $show_pricat = null ) {

		$show_pricat_only  = get_theme_mod( 'goso_show_pricat_yoast_only' );
		$show_pricat_first = get_theme_mod( 'goso_show_pricat_first_yoast' );
		
		if( $show_pricat ){
			$show_pricat_only = true;
		}
		
		$the_category = get_the_category();
		$loop_cats    = $the_category;

		$primary_cat = '';
		$primary_catid = goso_get_primary_cat_id();
		if( ( $show_pricat_only || $show_pricat_first ) && $primary_catid ){
			$term               = get_term( $primary_catid );
			if ( ! is_wp_error( $term ) ) {
				$primary_cat = $term;

				if( $show_pricat_only ){
					$loop_cats = array( $term );
				}else{
					$loop_cats = array_merge( array( $term ), $the_category );
				}
			}
		}

		if ( get_theme_mod( 'goso_featured_cat_hide' ) == true ) {

			$excluded_cat = get_theme_mod( 'goso_featured_cat' );
			$first_time = 1;

			$count_the_category = count( (array)$the_category );

			if( $show_pricat_only & isset( $primary_cat->term_taxonomy_id ) && $primary_cat->term_taxonomy_id == $excluded_cat && $count_the_category > 1 ){
				$loop_cats = array();
				foreach ( $the_category as $cat ){
					if( $loop_cats ){
						continue;
					}

					if( isset( $cat->cat_ID ) && $cat->cat_ID == $excluded_cat ){
						continue;
					}

					$loop_cats = array( $cat );
				}
			}

			$cat_show_arr =array();
			foreach ( (array)$loop_cats as $category ) {

				$cat_ID = '';
				if( isset( $category->cat_ID ) && $category->cat_ID ){
					$cat_ID = $category->cat_ID;
				}elseif( isset( $category->term_taxonomy_id ) && $category->term_taxonomy_id ){
					$cat_ID = $category->term_taxonomy_id;
				}

				if( $cat_ID == $excluded_cat ){
					continue;
				}

				if( $show_pricat_first ){
					if( in_array( $category->term_id, $cat_show_arr ) ){
						continue;
					}

					$cat_show_arr[] = $category->term_id;
				}


				if ( $first_time == 1 ) {
					echo '<a class="goso-cat-name goso-cat-'. $category->term_id .'" href="' . get_category_link( $category->term_id ) . '"  rel="category tag">' . $category->name . '</a>';
					$first_time = 0;
				}
				else {
					echo wp_kses( $separator, goso_allow_html() ) . '<a class="goso-cat-name goso-cat-'. $category->term_id .'" href="' . get_category_link( $category->term_id ) . '"  rel="category tag">' . $category->name . '</a>';
				}
			}
		}else {
			$cat_show_arr =array();
			$first_time = 1;
			foreach ( (array)$loop_cats as $category ) {
				if( $show_pricat_first ){
					if( in_array( $category->term_id, $cat_show_arr ) ){
						continue;
					}

					$cat_show_arr[] = $category->term_id;
				}

				if ( $first_time == 1 ) {
					echo '<a class="goso-cat-name goso-cat-'. $category->term_id .'" href="' . get_category_link( $category->term_id ) . '"  rel="category tag">' . $category->name . '</a>';
					$first_time = 0;
				}
				else {
					echo wp_kses( $separator, goso_allow_html() ) . '<a class="goso-cat-name goso-cat-'. $category->term_id .'" href="' . get_category_link( $category->term_id ) . '"  rel="category tag">' . $category->name . '</a>';
				}
			}
		}

		unset( $primary_cat , $the_category, $cat_show_arr );
	}
}

/**
 * List all social media data
 *
 */
function goso_social_media_array() {
	$array = array(
		'facebook' => array( goso_get_setting( 'goso_facebook' ), 'fab fa-facebook-f' ),
		'twitter' => array( goso_get_setting( 'goso_twitter' ), 'fab fa-twitter' ),
		'instagram' => array( get_theme_mod( 'goso_instagram' ), 'fab fa-instagram' ),
		'pinterest' => array( get_theme_mod( 'goso_pinterest' ), 'fab fa-pinterest' ),
		'linkedin' => array( get_theme_mod( 'goso_linkedin' ), 'fab fa-linkedin-in' ),
		'flickr' => array( get_theme_mod( 'goso_flickr' ), 'fab fa-flickr' ),
		'behance' => array( get_theme_mod( 'goso_behance' ), 'fab fa-behance' ),
		'tumblr' => array( get_theme_mod( 'goso_tumblr' ), 'fab fa-tumblr' ),
		'youtube' => array( get_theme_mod( 'goso_youtube' ), 'fab fa-youtube' ),
		'email' => array( get_theme_mod( 'goso_email_me' ), 'fas fa-envelope' ),
		'vk' => array( get_theme_mod( 'goso_vk' ), 'fab fa-vk' ),
		'bloglovin' => array( get_theme_mod( 'goso_bloglovin' ), 'far fa-heart' ),
		'vine' => array( get_theme_mod( 'goso_vine' ), 'fab fa-vine' ),
		'soundcloud' => array( get_theme_mod( 'goso_soundcloud' ), 'fab fa-soundcloud' ),
		'snapchat' => array( get_theme_mod( 'goso_snapchat' ), 'fab fa-snapchat' ),
		'spotify' => array( get_theme_mod( 'goso_spotify' ), 'fab fa-spotify' ),
		'github' => array( get_theme_mod( 'goso_github' ), 'fab fa-github' ),
		'stack-overflow' => array( get_theme_mod( 'goso_stack' ), 'fab fa-stack-overflow' ),
		'twitch' => array( get_theme_mod( 'goso_twitch' ), 'fab fa-twitch' ),
		'vimeo' => array( get_theme_mod( 'goso_vimeo' ), 'fab fa-vimeo-v' ),
		'steam' => array( get_theme_mod( 'goso_steam' ), 'fab fa-steam' ),
		'xing' => array( get_theme_mod( 'goso_xing' ), 'fab fa-xing' ),
		'whatsapp' => array( get_theme_mod( 'goso_whatsapp' ), 'fab fa-whatsapp' ),
		'telegram' => array( get_theme_mod( 'goso_telegram' ), 'fab fa-telegram' ),
		'reddit' => array( get_theme_mod( 'goso_reddit' ), 'fab fa-reddit-alien' ),
		'ok' => array( get_theme_mod( 'goso_ok' ), 'fab fa-odnoklassniki' ),
		'500px' => array( get_theme_mod( 'goso_500px' ), 'fab fa-500px' ),
		'stumbleupon' => array( get_theme_mod( 'goso_stumbleupon' ), 'fab fa-stumbleupon' ),
		'wechat' => array( get_theme_mod( 'goso_wechat' ), 'fab fa-weixin' ),
		'weibo' => array( get_theme_mod( 'goso_weibo' ), 'fab fa-weibo' ),
		'line' => array( get_theme_mod( 'goso_line' ), 'gosoicon-line' ),
		'viber' => array( get_theme_mod( 'goso_viber' ), 'gosoicon-viber' ),
		'discord' => array( get_theme_mod( 'goso_discord' ), 'gosoicon-discord' ),
		'rss' => array( get_theme_mod( 'goso_rss' ), 'fas fa-rss' ),
		'slack' => array( get_theme_mod( 'goso_slack' ), 'fab fa-slack' ),
		'mixcloud' => array( get_theme_mod( 'goso_mixcloud' ), 'fab fa-mixcloud' ),
		'goodreads' => array( get_theme_mod( 'goso_goodreads' ), 'gosoicon-goodreads' ),
		'tripadvisor' => array( get_theme_mod( 'goso_tripadvisor' ), 'fab fa-tripadvisor' ),
		'tiktok' => array( get_theme_mod( 'goso_tiktok' ), 'gosoicon-tik-tok' ),
		'dailymotion' => array( get_theme_mod( 'goso_dailymotion' ), 'gosoicon-letter-d' ),
		'blogger' => array( get_theme_mod( 'goso_blogger' ), 'gosoicon-blogger-1' ),
		'delicious' => array( get_theme_mod( 'goso_delicious' ), 'fab fa-delicious' ),
		'deviantart' => array( get_theme_mod( 'goso_deviantart' ), 'gosoicon-deviantart-1' ),
		'digg' => array( get_theme_mod( 'goso_digg' ), 'fab fa-digg' ),
		'evernote' => array( get_theme_mod( 'goso_evernote' ), 'gosoicon-evernote' ),
		'forrst' => array( get_theme_mod( 'goso_forrst' ), 'gosoicon-forrst' ),
		'grooveshark' => array( get_theme_mod( 'goso_grooveshark' ), 'gosoicon-grooveshark' ),
		'lastfm' => array( get_theme_mod( 'goso_lastfm' ), 'gosoicon-lastfm' ),
		'myspace' => array( get_theme_mod( 'goso_myspace' ), 'gosoicon-myspace-logo' ),
		'paypal' => array( get_theme_mod( 'goso_paypal' ), 'fab fa-paypal' ),
		'skype' => array( get_theme_mod( 'goso_skype' ), 'fab fa-skype' ),
		'window' => array( get_theme_mod( 'goso_window' ), 'fab fa-windows' ),
		'wordPress' => array( get_theme_mod( 'goso_wordpress' ), 'fab fa-wordpress' ),
		'yahoo' => array( get_theme_mod( 'goso_yahoo' ), 'gosoicon-yahoo-logo' ),
		'yandex' => array( get_theme_mod( 'goso_yandex' ), 'gosoicon-y' ),
		'douban' => array( get_theme_mod( 'goso_douban' ), 'gosoicon-douban-logo' ),
		'qq' => array( get_theme_mod( 'goso_qq' ), 'gosoicon-qq-social-logo-of-a-penguin' ),
	);
	
	return $array;
}

function goso_social_goso_icons_array(){
	return array( 'line', 'viber', 'discord', 'goodreads', 'tiktok', 'douban', 'qq' );
}

/**
 * Custom the_excerpt() length function
 *
 * @param number $length of the_excerpt
 *
 * @return new number excerpt length
 *@since 1.0
 *
 */
if ( ! function_exists( 'goso_custom_excerpt_length' ) ) {
	function goso_custom_excerpt_length( $length ) {
		$number_excerpt_length = get_theme_mod('goso_post_excerpt_length') ? get_theme_mod('goso_post_excerpt_length') : 30;
		return $number_excerpt_length;
	}

	add_filter( 'excerpt_length', 'goso_custom_excerpt_length', 999 );
}

/**
 * Custom the_excerpt() more string
 *
 * @param string $more
 *
 * @return new more string of the_excerpt() function
 *@since 1.0
 *
 */
if ( ! function_exists( 'goso_new_excerpt_more' ) ) {
	function goso_new_excerpt_more( $more ) {
		return '&hellip;';
	}

	add_filter( 'excerpt_more', 'goso_new_excerpt_more' );
}

/**
 * Exclude pages form search results page
 * Hook to init action
 *
 * @return void
 *@since 1.0
 */
if ( ! function_exists( 'goso_remove_pages_from_search' ) ) {
	add_action('pre_get_posts','goso_remove_pages_from_search');
	function goso_remove_pages_from_search( $query ) {

		if ( ! is_admin() && $query->is_main_query() && $query->is_search ){

            $post_types = get_post_types( array( 'public' => true, 'show_in_nav_menus' => true ), 'names' );
			$array_include = array();
			foreach( $post_types as $key => $val ){
			    $array_include[] = $key;
			}
			$exclude = array(
				'web-story',
				'e-landing-page',
				'goso-block',
				'goso_builder',
				'archive-template',
				'custom-post-template'
			);

			if ( ! get_theme_mod( 'goso_include_search_page' ) ) {
			    $exclude[] = 'page';
			}

		    $array_include = array_diff($array_include,$exclude);
			$query->set( 'post_type', $array_include );
		}

	}
}

/**
 * Get the featured image size url from post
 *
 * @since 3.1
 * @developed GosoDesign
 */
if ( ! function_exists( 'goso_get_featured_image_size' ) ) {
	function goso_get_featured_image_size( $id, $size = 'full' ) {
		if ( ! has_post_thumbnail( $id ) ) {
			$image_holder = get_template_directory_uri() . '/images/no-image.jpg';
			return $image_holder;
		} else {
			$image_html = get_the_post_thumbnail( $id, $size );
			preg_match( '@src="([^"]+)"@', $image_html, $match );
			$src = array_pop( $match );
			$src_check = substr( $src, -4 );

			if( $src_check == '.gif' ){
				$image_full = get_the_post_thumbnail( $id, 'full' );
				preg_match( '@src="([^"]+)"@', $image_full, $match_full );
				$src = array_pop( $match_full );
			}

			return esc_url( $src );
		}
	}
}

if ( ! function_exists( 'goso_get_featured_single_image_size' ) ) {
	function goso_get_featured_single_image_size( $id, $size = 'full', $enable_jarallax = false, $thumb_alt = '' ) {
		$ratio = '67';
		$src = get_template_directory_uri() . '/images/no-image.jpg';

		if(  has_post_thumbnail( $id ) ) {
			$image_html = get_the_post_thumbnail( $id, $size );
			preg_match( '@src="([^"]+)"@', $image_html, $match );
			$src = array_pop( $match );
			$src_check = substr( $src, -4 );

			if( $src_check == '.gif' ){
				$image_full = get_the_post_thumbnail( $id, 'full' );
				$image_html = get_the_post_thumbnail( $id, 'full' );
				preg_match( '@src="([^"]+)"@', $image_full, $match_full );
				$src = array_pop( $match_full );
			}

			if ( preg_match_all( '#(width|height)=(\'|")?(?<dimensions>[0-9]+)(\'|")?#i', $image_html, $image_dis ) && 2 == count( (array)$image_dis['dimensions'] ) ) {
				$width  =  isset( $image_dis['dimensions'][0] ) ? $image_dis['dimensions'][0] : 0;
				$height =  isset( $image_dis['dimensions'][1] ) ? $image_dis['dimensions'][1] : 0;

				if( $width && $height ) {
					$ratio = number_format( $height / $width * 100, 4 );
				}
			}
		}


		$class = 'attachment-goso-full-thumb size-goso-full-thumb goso-single-featured-img wp-post-image';
		$style_ratio = 'padding-top: ' . $ratio . '%;';

		if ( $enable_jarallax ) {
			$image_html = '<img class="jarallax-img" src="'. $src .'" alt="'. $thumb_alt .'">';
		}elseif ( ! get_theme_mod( 'goso_speed_disable_first_screen' ) || get_theme_mod('goso_disable_lazyload_fsingle') ) {
			$image_html = '<span class="' . $class . ' goso-disable-lazy" style="background-image: url('. $src .');' . $style_ratio . '"></span>';
		}else{
            $src = goso_image_srcset($id,$size,'goso-masonry-thumb');
			$image_html = '<span class="' . $class . ' goso-lazy" data-bgset="'. $src .'" style="' . $style_ratio . '"></span>';
		}

		return $image_html;
	}
}

/*
 * Get featured image ratio based on the post ID & thumbnail size.
 */

if ( ! function_exists( 'goso_get_featured_image_padding_markup' ) ) {
	function goso_get_featured_image_padding_markup( $postid, $image_thumb = 'full', $return_ratio = null ) {
		$ratio = '66.6666667';
		
		if ( has_post_thumbnail( $postid ) ) {
			$image = get_the_post_thumbnail( $postid, $image_thumb );
		} else {
			$image = '<img src="' . get_template_directory_uri() . '/images/no-image.jpg" alt="' . __( "No Thumbnail", "gosodesign" ) . '" />';
		}

		if ( preg_match_all( '#(width|height)=(\'|")?(?<dimensions>[0-9]+)(\'|")?#i', $image, $image_dis ) && 2 == count( (array)$image_dis['dimensions'] ) ) {
			$ratio = number_format( ( $image_dis['dimensions'][1] / $image_dis['dimensions'][0] ) * 100, 8 );
		}
		
		$output = '<span class="goso-isotope-padding" style="padding-bottom:' . $ratio . '%;"></span>';
		
		if( $return_ratio ){
			$output = $ratio;
		}
		
		return $output;
	}
}

/* Get ratio markup for post format gallery */
if ( ! function_exists( 'goso_get_ratio_img_format_gallery' ) ){
	function goso_get_ratio_img_format_gallery( $image ) {
		$ratio = '66.6666667';
		/* $image = wp_get_attachment_image_src( $image_id, $thumbnail_size ); */
		
		if ( ! empty( $image ) ) {
			$img_width = isset( $image[1] ) ? $image[1] : '';
			$img_height = isset( $image[2] ) ? $image[2] : '';
			if( $img_width && $img_height ){
				$ratio = number_format( ( $img_height / $img_width ) * 100, 8 );
			}
		}
		
		$output = '<span class="goso-isotope-padding" style="padding-bottom:' . $ratio . '%;"></span>';
		
		return $output;
	}
}

/**
 * Get image ratio based on image size
 *
 * @since 6.3
 * @developed GosoDesign
 */
if ( ! function_exists( 'goso_get_featured_image_ratio' ) ) {
	function goso_get_featured_image_ratio( $id, $size = 'full' ) {
		$ratio = '66.6667';

		if(  has_post_thumbnail( $id ) ) {
			$image_html = get_the_post_thumbnail( $id, $size );
			preg_match( '@src="([^"]+)"@', $image_html, $match );
			$src = array_pop( $match );
			$src_check = substr( $src, -4 );

			if( $src_check == '.gif' ){
				$image_html = get_the_post_thumbnail( $id, 'full' );
			}

			if ( preg_match_all( '#(width|height)=(\'|")?(?<dimensions>[0-9]+)(\'|")?#i', $image_html, $image_dis ) && 2 == count( (array)$image_dis['dimensions'] ) ) {
				$width  =  isset( $image_dis['dimensions'][0] ) ? $image_dis['dimensions'][0] : 0;
				$height =  isset( $image_dis['dimensions'][1] ) ? $image_dis['dimensions'][1] : 0;

				if( $width && $height ) {
					$ratio = number_format( $height / $width * 100, 4 );
				}
			}
		}

		return $ratio;
	}
}

/**
 * Get the featured image size url based on featured image full url
 *
 * @since 3.1
 * @developed GosoDesign
 */
if ( ! function_exists( 'goso_get_image_size_url' ) ) {
	function goso_get_image_size_url( $image_url, $size = 'full' ) {
		$image_thumb_html = $image_url;
		if ( function_exists( 'goso_get_imageid_from_url' ) ) {
			$image_id = goso_get_imageid_from_url( $image_url );
			if( $image_id && ( 0 != $image_id ) ){
				$image_thumb = wp_get_attachment_image_src($image_id, $size);
				if( isset( $image_thumb[0] ) && $image_thumb[0] ){
					$image_thumb_html = $image_thumb[0];
				}
			}
		}

		return $image_thumb_html;
	}
}

/**
 * Get image ratio based on the image URL
 *
 * @since 7.9
 * @developed GosoDesign
 */
if ( ! function_exists( 'goso_get_ratio_size_based_url' ) ) {
	function goso_get_ratio_size_based_url( $image_url ) {
		$return = '66.66667';
		if ( function_exists( 'goso_get_imageid_from_url' ) ) {
			$image_id = goso_get_imageid_from_url( $image_url );
			if( $image_id && ( 0 != $image_id ) ){
				$image_data = wp_get_attachment_image_src( $image_id, 'full' );
				$image_width = $image_height = '';
				if( isset( $image_data[1] ) && $image_data[1] ){
					$image_width = $image_data[1];
				}
				if( isset( $image_data[2] ) && $image_data[2] ){
					$image_height = $image_data[2];
				}
				if( $image_width && $image_height ){
					$return = number_format( ( $image_height / $image_width ) * 100, 5 );
				}
			}
		}

		return $return;
	}
}

/**
 * Get the image width/height based on the image URL
 *
 * @since 3.1
 * @developed GosoDesign
 */
if ( ! function_exists( 'goso_get_image_data_basedurl' ) ) {
	function goso_get_image_data_basedurl( $image_url, $data = 'w' ) {
		$return = '';
		if ( function_exists( 'goso_get_imageid_from_url' ) ) {
			$image_id = goso_get_imageid_from_url( $image_url );
			if( $image_id && ( 0 != $image_id ) ){
				$image_data = wp_get_attachment_image_src( $image_id, 'full' );
				if( isset( $image_data[1] ) && $image_data[1] && $data == 'w' ){
					$return = $image_data[1];
				} else if( isset( $image_data[2] ) && $image_data[2] && $data == 'h' ){
					$return = $image_data[2];
				} else if( isset( $image_data[0] ) && $image_data[0] && $data == 'url' ){
					$return = $image_data[0];
				}
			} else {
				if( $data == 'url' ){
					$return = $image_url;
				}
			}
		}

		return $return;
	}
}

/**
 * Get the featured image width/height based on the post ID
 *
 * @since 8.0
 */
if ( ! function_exists( 'goso_get_image_data_based_post_id' ) ) {
	function goso_get_image_data_based_post_id( $postid, $image_thumb, $data = 'w', $echo = true ) {
		$return = '';
		if ( has_post_thumbnail( $postid ) ) {
			$image      = get_the_post_thumbnail( $postid, $image_thumb );
			if ( preg_match_all( '#(width|height)=(\'|")?(?<dimensions>[0-9]+)(\'|")?#i', $image, $image_dis ) && 2 == count( (array) $image_dis['dimensions'] ) ) {
				$height = $image_dis['dimensions'][1];
				$width = $image_dis['dimensions'][0];
				if( 'h' == $data ){
					$return = $height;
				} else if( 'w' == $data ){
					$return = $width;
				}
			}
		}

		if ( ! $echo ) {
			return $return;
		} else {
			echo $return;
		}
	}
}

/**
 * Get the featured image type display on the layouts
 *
 * @since 5.3
 * @developed GosoDesign
 */
if ( ! function_exists( 'goso_featured_images_size' ) ) {
	function goso_featured_images_size( $size = 'normal' ) {
		
		$return_size = 'goso-thumb';
		if( 'small' == $size ) {
			$return_size = 'goso-thumb-small';
		} elseif( 'large' == $size ) {
			$return_size = 'goso-magazine-slider';
		}
		
		$customize_data = get_theme_mod( 'goso_featured_image_size' );
		if( 'square' == $customize_data ) {
			$return_size = 'goso-thumb-square';
			if( 'large' == $size ) {
				$return_size = 'goso-full-thumb';
			}
		} elseif( 'vertical' == $customize_data ) {
			$return_size = 'goso-thumb-vertical';
			if( 'large' == $size ) {
				$return_size = 'goso-full-thumb';
			}
		}

		return $return_size;
	}
}

/**
 * Get the featured image type display on the layouts
 *
 * @since 5.3
 * @developed GosoDesign
 */
if ( ! function_exists( 'goso_featured_images_size_vcel' ) ) {
	function goso_featured_images_size_vcel( $size = 'normal', $image_size = '', $custom_size = null ) {

		$return_size = 'goso-thumb';
		if( 'small' == $size ) {
			$return_size = 'goso-thumb-small';
		} elseif( 'large' == $size ) {
			$return_size = 'goso-magazine-slider';
		}

		$customize_data = get_theme_mod( 'goso_featured_image_size' );
		if( $image_size ){
			$customize_data = $image_size;
		}
		
		if( 'horizontal' == $customize_data ){
			$return_size = 'goso-thumb';
			if( 'small' == $size ) {
				$return_size = 'goso-thumb-small';
			} elseif( 'large' == $size ) {
				$return_size = 'goso-magazine-slider';
			}
		} elseif( 'square' == $customize_data ) {
			$return_size = 'goso-thumb-square';
			if( 'large' == $size ) {
				$return_size = 'goso-full-thumb';
			}
		} elseif( 'vertical' == $customize_data ) {
			$return_size = 'goso-thumb-vertical';
			if( 'large' == $size ) {
				$return_size = 'goso-full-thumb';
			}
		} elseif( 'custom' == $customize_data ) {
			if( $custom_size ){
				$return_size = $custom_size;
			}
		}

		return $return_size;
	}
}

/**
 * Get the author posts link
 *
 * @since 8.0
 * @developed GosoDesign
 */
if ( ! function_exists( 'goso_get_the_author_posts_link' ) ) {
	function goso_get_the_author_posts_link( $author_id = null ) {
		
		global $authordata;
		if ( ! is_object( $authordata ) ) {
			return '';
		}
		$authorID = $authordata->ID;
		$authorNicename = $authordata->user_nicename;
		$authorDisplay = get_the_author();
		if( $author_id ){
			$authorID = $author_id;
			$authorNicename = get_the_author_meta( 'user_nicename', $authorID );
			$authorDisplay = get_the_author_meta( 'display_name', $authorID );
		}
		
		$link = sprintf(
			'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
			esc_url( get_author_posts_url( $authorID, $authorNicename ) ),
			/* translators: %s: Author's display name. */
			esc_attr( goso_get_setting( 'goso_trans_author' ) . ' ' . $authorDisplay ),
			$authorDisplay
		);

		return apply_filters( 'the_author_posts_link', $link );
	}
}

/**
 * Get the featured image type display on category mega menu items
 *
 * @since 5.3
 * @developed GosoDesign
 */
if ( ! function_exists( 'goso_megamenu_featured_images_size' ) ) {
	function goso_megamenu_featured_images_size() {
		
		$return_size = 'goso-thumb';
		
		$customize_data = get_theme_mod( 'goso_mega_featured_image_size' );
		if( 'square' == $customize_data ) {
			$return_size = 'goso-thumb-square';
		} elseif( 'vertical' == $customize_data ) {
			$return_size = 'goso-thumb-vertical';
		}

		return $return_size;
	}
}

/**
 * Setup functions to count viewed posts to create popular posts
 *
 * @param string $postID - post ID of this post
 *
 * @return numbers viewed posts
 * @since 1.0
 */
if ( ! function_exists( 'goso_get_postviews_key' ) ) {
	function goso_get_postviews_key() {
		$count_key = 'goso_post_views_count';
		if( ( 'custom' == get_theme_mod( 'goso_general_views_meta' ) ) && get_theme_mod( 'goso_general_views_key' ) ){
			$count_key = get_theme_mod( 'goso_general_views_key' );
		}

		return $count_key;
	}
}

/**
 * Setup functions to count viewed posts to create popular posts
 *
 * @param string $postID - post ID of this post
 *
 * @return numbers viewed posts
 * @since 1.0
 */
if ( ! function_exists( 'goso_get_post_views' ) ) {
	function goso_get_post_views( $postID ) {
		$count_key = goso_get_postviews_key();
		$count     = get_post_meta( $postID, $count_key, true );
		$return = $count;
		if ( $count == '' ) {
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );

			$return = 0;
		}

		return apply_filters( 'goso_filter_post_views_number', number_format_i18n( (float)$return ) );
	}
}

if ( ! function_exists( 'goso_set_post_views' ) ) {
	function goso_set_post_views( $postID ) {
		if( get_theme_mod( 'goso_enable_ajax_view' ) ) {
			add_action( 'wp_footer', 'goso_cview_ajax_footer_script', 999 );
			return;
		}

		$count_key = goso_get_postviews_key();
		$count_wkey = 'goso_post_week_views_count';
		$count_mkey = 'goso_post_month_views_count';
		$count     = get_post_meta( $postID, $count_key, true );
		$count_w     = get_post_meta( $postID, $count_wkey, true );
		$count_m     = get_post_meta( $postID, $count_mkey, true );

		/* Update views count all time */
		if ( $count == '' ) {
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, $count );
		}
		else {
			$count ++;
			update_post_meta( $postID, $count_key, $count );
		}

		/* Update views count week */
		if ( $count_w == '' ) {
			$count_w = 0;
			delete_post_meta( $postID, $count_wkey );
			add_post_meta( $postID, $count_wkey, $count_w );
		}
		else {
			$count_w ++;
			update_post_meta( $postID, $count_wkey, $count_w );
		}

		/* Update views count month */
		if ( $count_m == '' ) {
			$count_m = 0;
			delete_post_meta( $postID, $count_mkey );
			add_post_meta( $postID, $count_mkey, $count_m );
		}
		else {
			$count_m ++;
			update_post_meta( $postID, $count_mkey, $count_m );
		}
	}
}

if( ! function_exists( 'goso_cview_ajax_footer_script' ) ):
function goso_cview_ajax_footer_script(){
?>
<script type="text/javascript">
	function GosoSimplePopularPosts_AddCount(id, endpoint)
	{
		var xmlhttp;
		var params = "/?goso_spp_count=1&goso_spp_post_id=" + id + "&cachebuster=" +  Math.floor((Math.random() * 100000));
		// code for IE7+, Firefox, Chrome, Opera, Safari

		if (window.XMLHttpRequest){
			xmlhttp=new XMLHttpRequest();
		}else{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange=function(){
			if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
				var data = JSON.parse( xmlhttp.responseText );
				document.getElementsByClassName( "goso-post-countview-number" )[0].innerHTML = data.visits;
			}
		}

		xmlhttp.open("GET", endpoint + params, true);
		xmlhttp.send();
	}
	GosoSimplePopularPosts_AddCount(<?php echo get_the_ID(); ?>, '<?php echo get_site_url(); ?>');
</script>
<?php
}
endif;
if( ! function_exists( 'goso_cview_ajax_query_vars' ) ):
function goso_cview_ajax_query_vars( $query_vars ){
	if( get_theme_mod( 'goso_enable_ajax_view' ) ) {
		$query_vars[] = 'goso_spp_count';
		$query_vars[] = 'goso_spp_post_id';
	}

	return $query_vars;
}
add_filter( 'query_vars', 'goso_cview_ajax_query_vars' );
endif;

if( ! function_exists( 'goso_cview_ajax_count' ) ):
function goso_cview_ajax_count(){
	/**
	 * Endpoint for counting visits
	 */
	if(intval(get_query_var('goso_spp_count')) === 1 && intval(get_query_var('goso_spp_post_id')) !== 0)
	{
		//JSON response
		header('Content-Type: application/json');
		$postID = intval(get_query_var('goso_spp_post_id'));
		$count_key = goso_get_postviews_key();
		$count_wkey = 'goso_post_week_views_count';
		$count_mkey = 'goso_post_month_views_count';
		$count     = get_post_meta( $postID, $count_key, true );
		$count_w     = get_post_meta( $postID, $count_wkey, true );
		$count_m     = get_post_meta( $postID, $count_mkey, true );
		$current_count = 0;

		/* Update views count all time */
		if ( $count == '' ) {
			$count = 0;

			$current_count = $count;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, $count );
		}
		else {
			$count ++;

			$current_count = $count;
			update_post_meta( $postID, $count_key, $count );
		}

		/* Update views count week */
		if ( $count_w == '' ) {
			$count_w = 0;
			delete_post_meta( $postID, $count_wkey );
			add_post_meta( $postID, $count_wkey, $count_w );
		}
		else {
			$count_w ++;
			update_post_meta( $postID, $count_wkey, $count_w );
		}

		/* Update views count month */
		if ( $count_m == '' ) {
			$count_m = 0;
			delete_post_meta( $postID, $count_mkey );
			add_post_meta( $postID, $count_mkey, $count_m );
		}
		else {
			$count_m ++;
			update_post_meta( $postID, $count_mkey, $count_m );
		}

		echo json_encode( array( 'status' => 'OK', 'visits' => intval( $current_count ) ) );
		die();
	}
}
add_action( 'wp', 'goso_cview_ajax_count' );
endif;

/**
 * Add schedules intervals
 *
 * @param  array $schedules
 *
 * @return array
 *@since  2.5.1
 *
 */
add_filter( 'cron_schedules', 'goso_add_schedules_intervals' );
if ( ! function_exists( 'goso_add_schedules_intervals' ) ) {
	function goso_add_schedules_intervals( $schedules ) {
		$schedules['weekly'] = array(
			'interval' => 604800,
			'display'  => __( 'Weekly', 'authow' )
		);

		$schedules['monthly'] = array(
			'interval' => 2635200,
			'display'  => __( 'Monthly', 'authow' )
		);

		return $schedules;
	}
}

/**
 * Add scheduled event during theme activation
 *
 * @return void
 *@since  2.5.1
 */
add_action( 'after_switch_theme', 'goso_add_schedule_events' );
if ( ! function_exists( 'goso_add_schedule_events' ) ) {
	function goso_add_schedule_events() {
		if ( ! wp_next_scheduled( 'goso_reset_track_data_weekly' ) )
			{wp_schedule_event( time(), 'weekly', 'goso_reset_track_data_weekly' );}

		if ( ! wp_next_scheduled( 'goso_reset_track_data_monthly' ) )
			{wp_schedule_event( time(), 'monthly', 'goso_reset_track_data_monthly' );}
	}
}

/**
 * Remove scheduled events when theme deactived
 *
 * @return void
 *@since  2.5.1
 */
add_action( 'switch_theme', 'goso_remove_schedule_events' );
if ( ! function_exists( 'goso_remove_schedule_events' ) ) {
	function goso_remove_schedule_events() {
		wp_clear_scheduled_hook( 'goso_reset_track_data_weekly' );
		wp_clear_scheduled_hook( 'goso_reset_track_data_monthly' );
	}
}


/**
 * Reset view counter of week
 *
 * @return void
 *@since  2.5.1
 */
add_action( 'goso_reset_track_data_weekly', 'goso_reset_week_view' );
if ( ! function_exists( 'goso_reset_week_view

' ) ) {
	function goso_reset_week_view() {
		global $wpdb;

		$meta_key = 'goso_post_week_views_count';
		$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->postmeta SET meta_value = '0' WHERE meta_key = %s", $meta_key ) );
	}
}

/**
 * Reset view counter of month
 *
 * @return void
 *@since  2.5.1
 */
add_action( 'goso_reset_track_data_monthly', 'goso_reset_month_view' );
if ( ! function_exists( 'goso_reset_month_view' ) ) {
	function goso_reset_month_view() {
		global $wpdb;

		$meta_key = 'goso_post_month_views_count';
		$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->postmeta SET meta_value = '0' WHERE meta_key = %s", $meta_key ) );
	}
}

/**
 * Get custom excerpt length from the_content() function
 * Will use this function and call it in goso_add_fb_open_graph_tags() function
 *
 * @return excerpt content from the_content
 *@since 1.1
 */

if ( ! function_exists( 'goso_trim_excerpt_from_content' ) ) {
	function goso_trim_excerpt_from_content( $text, $excerpt ) {

		if ( $excerpt )
			{return $excerpt;}

		$text = strip_shortcodes( $text );

		$text           = apply_filters( 'the_content', $text );
		$text           = str_replace( ']]>', ']]&gt;', $text );
		$text           = strip_tags( $text );
		$excerpt_length = apply_filters( 'excerpt_length', 55 );
		$excerpt_more   = apply_filters( 'excerpt_more', ' ' . '...' );
		$words          = preg_split( "/[\n
	 ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY );
		if ( count( $words ) > $excerpt_length ) {
			array_pop( $words );
			$text = implode( ' ', $words );
			$text = $text . $excerpt_more;
		}
		else {
			$text = implode( ' ', $words );
		}

		return apply_filters( 'wp_trim_excerpt', $text, $excerpt );
	}
}

/**
 * Get categories parent list
 *
 * @since 3.2
 */
if ( ! function_exists( 'goso_get_category_parents' ) ) {
	function goso_get_category_parents( $id ) {
		$chain  = '';
		$parent = get_term( $id, 'category' );

		if ( is_wp_error( $parent ) )
			{return '';}

		$name = $parent->name;

		if ( $parent->parent && ( $parent->parent != $parent->term_id ) ) {
			$chain .= goso_get_category_parents( $parent->parent );
		}

		$chain .= '<span><a class="crumb" href="' . esc_url( get_category_link( $parent->term_id ) ) . '">' . $name . '</a></span>' . goso_icon_by_ver('fas fa-angle-right') . '</i>';

		return $chain;
	}
}

/**
 * Get category parent of a category
 *
 * @since 3.2
 */
if ( ! function_exists( 'goso_get_category_parent_id' ) ) {
	function goso_get_category_parent_id( $id ) {
		$return  = '';
		$parent = get_term( $id, 'category' );

		if ( is_wp_error( $parent ) )
			{return '';}

		if ( $parent->parent && $parent->parent != $parent->term_id ) {
			$return = $parent->parent;
		}

		return $return;
	}
}

/**
 * Return google adsense markup
 *
 * @since 3.2
 */
if ( ! function_exists( 'goso_render_google_adsense' ) ) {
	function goso_render_google_adsense( $option ) {
		if( ! get_theme_mod( $option ) )
			{return '';}

		return '<div class="goso-google-adsense '. $option .'">'. do_shortcode( get_theme_mod( $option ) ) .'</div>';
	}
}

/**
 * Add Next Page/Page Break Button to WordPress Visual Editor
 *
 * @since 4.0.3
 */
if( ! function_exists( 'goso_add_next_page_button_to_editor' ) ) {
	add_filter( 'mce_buttons', 'goso_add_next_page_button_to_editor', 1, 2 );
	function goso_add_next_page_button_to_editor( $buttons, $id ){
	 
		/* only add this for content editor */
		if ( 'content' != $id )
			{return $buttons;}
	 
		/* add next page after more tag button */
		array_splice( $buttons, 13, 0, 'wp_page' );
	 
		return $buttons;
	}
}

/**
 * Exclude specific categories from latest posts on Homepage
 *
 * @since 2.4
 */
if( ! function_exists( 'goso_exclude_specific_categories_display_on_home' ) ) {
	function goso_exclude_specific_categories_display_on_home( $query ) {
		if( get_theme_mod( 'goso_home_exclude_cat' ) ) {

			$exclude_cat = get_theme_mod( 'goso_home_exclude_cat' );
			$exclude_cats       = str_replace( ' ', '', $exclude_cat );
			$exclude_array = explode( ',', $exclude_cats );

			if ( $query->is_home() && $query->is_main_query() ) {
				$query->set( 'tax_query', array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => $exclude_array,
						'operator' => 'NOT IN'
					),
				) );
			}
		}
	}

	add_action('pre_get_posts','goso_exclude_specific_categories_display_on_home');
}


/**
 * Anbles shortcodes in wordpress widget text
 *
 * @since 1.2.3
 */
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Get image alt by image ID
 * If the alt is null - return posts ID
 *
 * @since 5.2
 */
if ( ! function_exists( 'goso_get_image_alt' ) ) {
	function goso_get_image_alt( $thumb_id, $postID = null ) {
		$thumb_alt = '';
		$thumb_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
		
		if( $thumb_alt ) {
			$thumb_alt = $thumb_alt;
		}
		
		return esc_attr( $thumb_alt );
	}
}

/**
 * Check if post format + data of post format is available
 *
 * @return boolean or data of post format
 */
if ( ! function_exists( 'goso_get_post_format' ) ) {
	function goso_get_post_format( $format, $getdata = null ) {
		$return = false;
		$post_id = get_the_ID();
		$data = '';
		if( has_post_format( 'link' ) && ( $format == 'link' ) ){
			$data = get_post_meta( $post_id, '_format_link_url', true );
		} else if( has_post_format( 'quote' ) && ( $format == 'quote' ) ){
			$data = get_post_meta( $post_id, '_format_quote_source_name', true );
		} else if( has_post_format( 'gallery' ) && ( $format == 'gallery' ) ){
			$data = get_post_meta( $post_id, '_format_gallery_images', true );
		} else if( has_post_format( 'video' ) && ( $format == 'video' ) ){
			$data = get_post_meta( $post_id, '_format_video_embed', true );
		} else if( has_post_format( 'audio' ) && ( $format == 'audio' ) ){
			$data = get_post_meta( $post_id, '_format_audio_embed', true );
		}
		
		if( $data ){
			$return = true;
		}
		
		if( 'data' == $getdata && $data ){
			return $data;
		}
		
		return $return;
	}
}

/**
 * Get image title by image ID
 *
 * @since 5.2
 */
if ( ! function_exists( 'goso_get_image_title' ) ) {
	function goso_get_image_title( $thumb_id ) {
		if( get_theme_mod('goso_disable_image_titles_galleries') ){
			return '';
		}
		
		$thumb_title = $thumb_title_html = '';
		$thumb_title = get_the_title($thumb_id);
		
		if( $thumb_title ) {
			$thumb_title_html = ' title="'. esc_attr( $thumb_title ) .'"';
		}
		
		return $thumb_title_html;
	}
}

/* Build Inline related posts shortcode based on the options from Customizer */
if ( ! function_exists( 'goso_inline_related_posts_shortcode' ) ) {
	function goso_inline_related_posts_shortcode( $beaf = false ) {

		$style = get_theme_mod('goso_inlinerp_style') ? get_theme_mod('goso_inlinerp_style') : 'list';
		$title = goso_get_setting('goso_inlinerp_title') ? goso_get_setting('goso_inlinerp_title') : '';
		$title_align = get_theme_mod('goso_inlinerp_titalign') ? get_theme_mod('goso_inlinerp_titalign') : 'left';
		$number = get_theme_mod('goso_inlinerp_num') ? get_theme_mod('goso_inlinerp_num') : '6';
		$align = get_theme_mod('goso_inlinerp_align') ? get_theme_mod('goso_inlinerp_align') : 'none';
		$by = get_theme_mod('goso_inlinerp_by') ? get_theme_mod('goso_inlinerp_by') : 'categories';
		$order = get_theme_mod('goso_inlinerp_order') ? get_theme_mod('goso_inlinerp_order') : 'rand';
		$orderby = get_theme_mod('goso_inlinerp_orderby') ? get_theme_mod('goso_inlinerp_orderby') : 'DESC';
		$hide_thumb = get_theme_mod('goso_inlinerp_hide_thumb') ? 'yes' : 'no';
		$thumb_right = get_theme_mod('goso_inlinerp_thumb_right') ? 'yes' : 'no';
		$date = get_theme_mod('goso_inlinerp_date') ? 'no' : 'yes';
		$views = get_theme_mod('goso_inlinerp_views') ? 'yes' : 'no';
		$grid_columns = get_theme_mod('goso_inlinerp_col') ? get_theme_mod('goso_inlinerp_col') : '2';

		if( true == $beaf ){
			$style = get_theme_mod('goso_inlinerp_style_insert') ? get_theme_mod('goso_inlinerp_style_insert') : 'list';
			$align = get_theme_mod('goso_inlinerp_align_insert') ? get_theme_mod('goso_inlinerp_align_insert') : 'none';
			$by = get_theme_mod('goso_inlinerpis_by') ? get_theme_mod('goso_inlinerpis_by') : 'categories';
			$order = get_theme_mod('goso_inlinerpis_order') ? get_theme_mod('goso_inlinerpis_order') : 'rand';
			$orderby = get_theme_mod('goso_inlinerpis_orderby') ? get_theme_mod('goso_inlinerpis_orderby') : 'DESC';
		}

		$shortcode = '[inline_related_posts style="'.$style.'" title="'.esc_attr( $title ).'" title_align="'.$title_align.'" number="'.$number.'" align="'.$align.'" by="'.$by.'" order="'.$order.'" orderby="'.$orderby.'" hide_thumb="'.$hide_thumb.'" thumb_right="'.$thumb_right.'" date="'.$date.'" views="'.$views.'" grid_columns="'.$grid_columns.'"]';

		return $shortcode;
	}
}

if ( get_theme_mod( 'goso_ads_inside_content_html' ) || get_theme_mod( 'goso_show_inlinerp_inside' ) ) {
	require 'inc/modules/insert_ads.php';
}

if ( ! function_exists( 'goso_insert_post_content_ads' ) && get_theme_mod( 'goso_ads_inside_content_html' ) ) {
	add_filter( 'the_content', 'goso_insert_post_content_ads' );
	function goso_insert_post_content_ads( $content ) {
		// Check if the plugin WP Insert Content is activated.
		if ( ! function_exists( 'GosoDesign\Insert_Content\insert_content' ) ) {
			return $content;
		}
	 
		// Check if we're inside the main loop in a single post page.
		if ( !( ! is_admin() && is_single() && in_the_loop() && is_main_query() ) ) {
			// Nope.
			return $content;
		}
		
		$ad_code = '<div class="goso-custom-html-inside-content">' . get_theme_mod( 'goso_ads_inside_content_html' ) . '</div>';
		$numpara = get_theme_mod( 'goso_ads_inside_content_num' ) ? get_theme_mod( 'goso_ads_inside_content_num' ) : 4;
		
		$args = array(
			'parent_element_id' => '',
			'insert_element'   => 'div',
			'insert_after_p'   => '',
			'insert_every_p'   => $numpara,
			'insert_if_no_p'   => false,
			'top_level_p_only' => true,
		);
		
		if( get_theme_mod( 'goso_ads_inside_content_style' ) == 'style-2' ){
			$args['insert_after_p'] = $numpara;
			$args['insert_every_p'] = '';
		}
		
		$content = GosoDesign\Insert_Content\insert_content( $content, $ad_code, $args );
		
		return $content;

	}
}

/* Inline related posts hooks to the_content() */
if ( ! function_exists( 'goso_insert_post_content_inline_rltposts' ) && get_theme_mod( 'goso_show_inlinerp_inside' ) ) {
	add_filter( 'the_content', 'goso_insert_post_content_inline_rltposts' );
	function goso_insert_post_content_inline_rltposts( $content ) {
		// Check if the plugin WP Insert Content is activated.
		if ( ! function_exists( 'GosoDesign\Insert_Content\insert_content' ) ) {
			return $content;
		}

		// Check if we're inside the main loop in a single post page.
		if ( !( ! is_admin() && is_single() && in_the_loop() && is_main_query() ) ) {
			// Nope.
			return $content;
		}


		$shortcode = goso_inline_related_posts_shortcode( true );
		$inline_rtlposts = '<div class="goso-ilrltpost-insert">' . do_shortcode( $shortcode ) . '</div>';
		$numpara = get_theme_mod( 'goso_show_inlinerp_p' ) ? get_theme_mod( 'goso_show_inlinerp_p' ) : 4;

		$args = array(
			'parent_element_id' => '',
			'insert_element'   => 'div',
			'insert_after_p'   => '',
			'insert_every_p'   => $numpara,
			'insert_if_no_p'   => false,
			'top_level_p_only' => true,
		);

		if( get_theme_mod( 'goso_show_inlinerp_inside' ) == 'norepeat' ){
			$args['insert_after_p'] = $numpara;
			$args['insert_every_p'] = '';
		}

		$content = GosoDesign\Insert_Content\insert_content( $content, $inline_rtlposts, $args );

		return $content;

	}
}

if ( ! function_exists( 'goso_insert_inline_rltposts_before_after' ) && get_theme_mod( 'goso_show_inlinerp' ) ) {
	add_filter( 'the_content', 'goso_insert_inline_rltposts_before_after' );
	function goso_insert_inline_rltposts_before_after( $content ) {
		// Check if we're inside the main loop in a single post page.
		if ( !( ! is_admin() && is_single() && in_the_loop() && is_main_query() ) ) {
			// Nope.
			return $content;
		}

		$pos = get_theme_mod( 'goso_show_inlinerp' );
		$shortcode = goso_inline_related_posts_shortcode();
		$inline_rtlposts = '<div class="goso-ilrltpost-beaf">' . do_shortcode( $shortcode ) . '</div>';

		if( 'before' == $pos || 'be_af' == $pos ){
			$content = $inline_rtlposts . $content;
		}

		if( 'after' == $pos || 'be_af' == $pos ){
			$content = $content . $inline_rtlposts;
		}

		return $content;
		
	}
}


/**
 * Get image title by image ID
 *
 * @since 5.2
 */
if ( ! function_exists( 'goso_add_meta_description_home' ) ) {
	function goso_add_meta_description_home() {
		if( is_home() && get_theme_mod('goso_home_metadesc') ){
			$meta_description = esc_attr( get_theme_mod('goso_home_metadesc') );
			echo '<meta name="description" content="'. $meta_description .'"/>';
		}
	}
	add_action( 'wp_head', 'goso_add_meta_description_home', 1 );
}

/**
 * Hook to change gallery
 *
 * @since 2.4.2
 */
if( ! get_theme_mod( 'goso_post_disable_gallery' ) ):
	include( trailingslashit( get_template_directory() ). 'inc/modules/gallery.php' );
endif;

if ( ! function_exists( 'goso_get_ratio_img_basedid' ) ){
	function goso_get_ratio_img_basedid( $id, $thumb = 'full' ) {
		$ratio = '66.6666667';
		$image = wp_get_attachment_image_src( $id, $thumb );
		
		if ( ! empty( $image ) ) {
			$img_width = isset( $image[1] ) ? $image[1] : '';
			$img_height = isset( $image[2] ) ? $image[2] : '';
			if( $img_width && $img_height ){
				$ratio = number_format( ( $img_height / $img_width ) * 100, 8 );
			}
		}
		
		$output = '<span class="goso-isotope-padding" style="padding-bottom:' . $ratio . '%;"></span>';
		
		return $output;
	}
}

/**
 * Hook to change markup for gallery
 *
 * @since 2.3
 */
if ( ! function_exists( 'goso_custom_markup_for_gallery' ) && ! get_theme_mod( 'goso_post_disable_gallery' ) ) {
	add_filter( 'post_gallery', 'goso_custom_markup_for_gallery', 10, 3 );
	function goso_custom_markup_for_gallery( $string, $attr ) {
		
		/* Support Enhanced Media Library plugin */
		if( function_exists( 'wpuxss_eml_shortcode_atts' ) ){
			$attr = shortcode_atts(
				// defaults values
				array(
					'order'      => '',
					'orderby'    => '',
					'id'         => '',
					'ids'         => '',
					'type'         => 'justified',
					'columns'    => '',
					'include'    => '',
				),
				$attr,
				'gallery'
			);
		}
		
		$data_height = '150';
		if( is_numeric( get_theme_mod( 'goso_image_height_gallery' ) ) && ( 60 < get_theme_mod( 'goso_image_height_gallery' ) ) ) {
			$data_height = get_theme_mod( 'goso_image_height_gallery' );
		}

		$id = '';
		$type = 'justified';
		$columns = '3';
		
		if( get_theme_mod('goso_gallery_dstyle') ){
			$type = get_theme_mod('goso_gallery_dstyle');
		}

		if( isset( $attr['ids'] ) ) {
			$id = $attr['ids'];
		}
		if( isset( $attr['type'] ) ) {
			$type_name = $attr['type'];
			if( in_array( $type_name, array( 'justified', 'masonry', 'grid', 'single-slider', 'none' ) ) ){
				$type = $attr['type'];
			}
		}
		if( $type == 'grid' ):
			$type = 'masonry grid';
		endif;

		if( isset( $attr['columns'] ) && in_array( $attr['columns'], array( '2', '3', '4' ) ) ) {
			$columns = $attr['columns'];
		}

		if( $type == 'none' )
			{return;}

		$block_id = 'goso-post-gallery__' . rand( 1000, 100000 );

		$output = '<div id="' . $block_id . '" class="goso-post-gallery-container '. $type .' column-'. $columns .'" data-height="'. $data_height .'" data-margin="3">';

		if( $type == 'masonry' || $type == 'masonry grid' ):
			$output .= '<div class="inner-gallery-masonry-container">';
		endif;

		if( $type == 'single-slider' ):
			$autoplay = ! get_theme_mod('goso_disable_autoplay_single_slider') ? 'true' : 'false';
			$output .= '<div class="goso-owl-carousel goso-owl-carousel-slider goso-nav-visible" data-auto="'. $autoplay .'" data-lazy="true">';
		endif;

		$order = isset( $attr['order'] ) ?  $attr['order'] : '';
		$orderby = isset( $attr['orderby'] ) ?  $attr['orderby'] : '';

		$posts  = get_posts( array( 'include' => $id, 'post_type' => 'attachment', 'order' => $order, 'orderby' => $orderby ) );

		if( $posts ) {
			foreach ( $posts as $imagePost ) {
				$caption = '';
				$gallery_title = '';
				if( $imagePost->post_excerpt ):
					$caption = $imagePost->post_excerpt;
				endif;
				if( $caption ) {
					$gallery_title = ' data-cap="'. esc_attr( $caption ) .'"';
				}

				$get_full = wp_get_attachment_image_src( $imagePost->ID, 'full' );
				$get_masonry = wp_get_attachment_image_src( $imagePost->ID, 'goso-masonry-thumb' );
				$thumbsize = 'goso-masonry-thumb';
				
				$image_alt = goso_get_image_alt( $imagePost->ID, get_the_ID() );
				$image_title_html = goso_get_image_title( $imagePost->ID );
				
				$class_a_item = 'goso-gallery-ite';
				if( ! ( $type == 'masonry' || $type == 'masonry grid' ) ){
					$class_a_item = 'goso-gallery-ite item-gallery-' . $type;
				}
				
				if( $type == 'masonry' || $type == 'masonry grid' || $type == 'single-slider' ){
					$class_a_item .= ' item-link-relative';
				}

				if( $type == 'single-slider' ):
					$output .= '<figure>';
					$get_masonry = wp_get_attachment_image_src( $imagePost->ID, 'goso-full-thumb' );
					$thumbsize = 'goso-full-thumb';
				endif;

				if( $type == 'masonry grid' ):
					$get_masonry = wp_get_attachment_image_src( $imagePost->ID, 'goso-thumb' );
					$thumbsize = 'goso-thumb';
				endif;

				if( $type == 'masonry' || $type == 'masonry grid' ){
					$output .= '<div class="item-gallery-' . $type . '">';
				}

				$output .= '<a class="'. $class_a_item .'" href="'. $get_full[0] .'"'. $gallery_title .'>';

				if( $type == 'masonry' || $type == 'masonry grid' ):
					$output .= '<div class="inner-item-masonry-gallery">';
				endif;
				
				if( $type == 'masonry' || $type == 'masonry grid' || $type == 'single-slider' ){
					$output .= goso_get_ratio_img_basedid( $imagePost->ID, $thumbsize );
				}
				
				$output .= '<img src="'. $get_masonry[0] .'" alt="'. $image_alt .'"'. $image_title_html .'>';
				
				if( $type == 'justified' && $caption ) {
                    $output .= '<div class="caption">'. wp_kses( $caption, array( 'em' => array(), 'strong' => array(), 'b' => array(), 'i' => array() ) ) .'</div>';
                }

				if( $type == 'masonry' || $type == 'masonry grid' ):
					$output .= '</div>';
				endif;

				$output .= '</a>';

				// Close item-gallery-' . $style_gallery . '-wrap
				if( $type == 'masonry' || $type == 'masonry grid' ){
					$output .= '</div>';
				}

				if( $type == 'single-slider' ):
					if( $caption ):
						$output .= '<p class="goso-single-gallery-captions">'. $caption .'</p>';
					endif;
					$output .= '</figure>';
				endif;

			}
		}

		if( $type == 'masonry' || $type == 'single-slider' || $type == 'masonry grid' ):
			$output .= '</div>';
		endif;

		$output .= '</div>';

		return $output;
	}
}

/*
 * Create filter to hide header & footer
 */
if( ! function_exists( 'goso_is_hide_header' ) ) {
	function goso_is_hide_header(){
		$return = false;

		return apply_filters( 'goso_filter_hide_header', $return );
	}
}

if( ! function_exists( 'goso_is_hide_footer' ) ) {
	function goso_is_hide_footer(){
		$return = false;

		return apply_filters( 'goso_filter_hide_footer', $return );
	}
}

/**
 * Get next/prev posts data for current posts
 *
 */
if ( ! function_exists( 'goso_get_next_prev_posts' ) ) {
	function goso_get_next_prev_posts() {
		
		$type = get_theme_mod( 'goso_loadnp_type' ) ? get_theme_mod( 'goso_loadnp_type' ) : 'prev';
		$exclude = get_theme_mod( 'goso_loadnp_exclude' ) ? get_theme_mod( 'goso_loadnp_exclude' ) : '';
		$return = get_previous_post( false, $exclude );
		
		if( $type == 'next' ) {
			$return = get_next_post( false, $exclude );
		} else if( $type == 'prev_cat' ) {
			$return = get_previous_post( true, $exclude, 'category' );
		} else if( $type == 'next_cat' ) {
			$return = get_next_post( true, $exclude, 'category' );
		} else if( $type == 'prev_tag' ) {
			$return = get_previous_post( true, $exclude, 'post_tag' );
		} else if( $type == 'next_tag' ) {
			$return = get_next_post( true, $exclude, 'post_tag' );
		}
		
		return $return;
	}
}

if ( ! function_exists( 'goso_authow_time_link' ) ) :
	/**
	* Gets a nicely formatted string for the published date.
	*/
	function goso_authow_time_link( $single = null, $dformat = null ) {
		$get_the_date = get_the_date( DATE_W3C );
		$get_the_time = get_the_time( get_option('date_format') );
		$get_the_datem = get_the_modified_date( DATE_W3C );
		$get_the_timem = get_the_modified_date( get_option('date_format') );
		$classes = 'published';
		$format = get_theme_mod( 'goso_date_format' );
		if( 'timeago' == $dformat ){
			$format = 'timeago';
		} else if( 'normal' == $dformat ){
			$format = 'normal';
		}
		if( $single == null || ( is_single() && ! get_theme_mod( 'goso_single_publishmodified' ) ) ){
			if( get_theme_mod( 'goso_show_modified_date' ) ){
				$get_the_date = $get_the_datem;
				$get_the_time = $get_the_timem;
			}
			
			if( 'timeago' == $format ){
				$current_time  = current_time( 'timestamp' );
				$post_time = get_the_time( 'U' );
				if( get_theme_mod( 'goso_show_modified_date' ) ){
					$post_time = get_the_modified_time( 'U' );
				}
				if ( $current_time > $post_time ){
					$get_the_time = goso_get_setting( 'goso_trans_beforeago' ) . " " . human_time_diff( $post_time, $current_time ) . " " . goso_get_setting( 'goso_trans_tago' );
				}
			}
			
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				if( get_theme_mod( 'goso_show_modified_date' ) ){
					$classes = 'updated';
				}
				$time_string = '<time class="entry-date '. $classes .'" datetime="%1$s">%2$s</time>';
			}

			printf( $time_string,
				$get_the_date,
				$get_the_time
			);
		} else if( is_single() && get_theme_mod( 'goso_single_publishmodified' ) ) {
			if( $get_the_time == $get_the_timem ){
				if( 'timeago' == $format ){
					$current_time  = current_time( 'timestamp' );
					$post_time = get_the_time( 'U' );
					if( get_theme_mod( 'goso_show_modified_date' ) ){
						$post_time = get_the_modified_time( 'U' );
					}
					if ( $current_time > $post_time ){
						$get_the_time = goso_get_setting( 'goso_trans_beforeago' ) . " " . human_time_diff( $post_time, $current_time ) . " " . goso_get_setting( 'goso_trans_tago' );
					}
				}
				
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
				printf( $time_string,
					$get_the_date,
					$get_the_time
				);
			} else{
				$time_string = '<strong>%1$s</strong> <time class="entry-date published" datetime="%2$s">%3$s</time></span><span><strong>%4$s</strong> <time class="entry-date modified" datetime="%5$s">%6$s</time>';
				printf( $time_string,
					goso_get_setting( 'goso_trans_published' ),
					$get_the_date,
					$get_the_time,
					goso_get_setting( 'goso_trans_modifiedat' ),
					$get_the_datem,
					$get_the_timem
				);
			}
		}
	}
endif;

if ( ! function_exists( 'goso_authow_meta_schema' ) ) {
	/**
	 * Gets a nicely formatted string for the published date.
	 */
	function goso_authow_meta_schema() {
		if( ! get_theme_mod('goso_schema_hentry') ) {
		?>
		<div class="goso-hide-tagupdated">
			<span class="author-italic author vcard"><?php echo goso_get_setting('goso_trans_by'); ?> <a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span>
			<?php goso_authow_time_link() ?>
		</div>
		<?php
		}
	}
}

if( ! function_exists( 'goso_get_the_title' ) ) {
	function goso_get_the_title( $post = 0 ) {
		
		$post = get_post( $post );
		$title = isset( $post->post_title ) ? $post->post_title : '';
	 
		return $title;
	}
}

if( ! function_exists( 'goso_authow_social_share' ) ) {
	function goso_authow_social_share( $pos = '' ){
		
		
		$list_social = array( 
			'facebook',
			'twitter', 
			'pinterest', 
			'linkedin', 
			'tumblr',
			/* 'messenger', */
			'vk',
			'ok',
			'reddit',
			'stumbleupon',
			'whatsapp',
			'telegram',
			'line',
			'pocket',
			'skype',
			'viber',
			'email'
		) ;

		$option_prefix = 'goso__hide_share_';

		$output = '';

        $count = 1;

		foreach ( $list_social as $k => $social_key ) {
			$list_social_item = goso_get_setting( $option_prefix . $social_key );
			if ( $list_social_item ) {
				continue;
			}

            $class = 'new-ver-share';

			$link     = get_permalink( );
			$text     = goso_get_the_title();
			$img_link = get_the_post_thumbnail_url();

			switch ( $social_key ) {
				case 'facebook':
					$facebook_share  = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink();
					$output .= '<a class="'.$class.' post-share-item post-share-facebook" aria-label="Share on Facebook" target="_blank" '. goso_reltag_social_icons() .' href="'. esc_url( $facebook_share ) .'">' . goso_icon_by_ver('fab fa-facebook-f', '', true ) . '<span class="dt-share">'. esc_html__( 'Facebook', 'authow' ) . '</span></a>';
					break;
				case 'twitter':
					$twitter_text = 'Check out this article';
					if( get_theme_mod( 'goso_post_twitter_share_text' ) ){
						$twitter_text = do_shortcode( get_theme_mod( 'goso_post_twitter_share_text' ) );
					}
					$twitter_text = trim( $twitter_text );
					
					$twitter_share   = 'https://twitter.com/intent/tweet?text=' . rawurlencode( $twitter_text ) . ':%20' . rawurlencode( $text ) . '%20-%20' . get_the_permalink();
					$output .= '<a class="'.$class.' post-share-item post-share-twitter" aria-label="Share on Twitter" target="_blank" '. goso_reltag_social_icons() .' href="'. esc_url( $twitter_share ) .'">' . goso_icon_by_ver('fab fa-twitter', '', true) . '<span class="dt-share">' . esc_html__( 'Twitter', 'authow' ) . '</span></a>';
					
					break;
				case 'pinterest':
				
					if( 'single' == $pos ){
						$output .=  '<a class="'.$class.' post-share-item post-share-pinterest" aria-label="Pin to Pinterest" data-pin-do="none" '. goso_reltag_social_icons() .' onclick="var e=document.createElement(\'script\');';
						$output .=  'e.setAttribute(\'type\',\'text/javascript\');';
						$output .=  'e.setAttribute(\'charset\',\'UTF-8\');';
						$output .=  'e.setAttribute(\'src\',\'//assets.pinterest.com/js/pinmarklet.js?r=\'+Math.random()*99999999);';
						$output .=  'document.body.appendChild(e);';
						$output .=  '">';
						$output .= goso_icon_by_ver('fab fa-pinterest', '', true) . '<span class="dt-share">' . esc_html__( 'Pinterest', 'authow' ) . '</span></a>';
					} else {
						$output .= '<a class="'.$class.' post-share-item post-share-pinterest" aria-label="Pin to Pinterest" data-pin-do="none" '. goso_reltag_social_icons() .' target="_blank" href="';
						$output .= 'https://www.pinterest.com/pin/create/button/?url=' . urlencode( $link );
						if( has_post_thumbnail() ){
							$output .= '&media=' . urlencode( $img_link );
						}
						if( $text ){ $output .= '&description=' . urlencode( $text ); }
						$output .= '">'. goso_icon_by_ver('fab fa-pinterest', '', true) .'<span class="dt-share">' . esc_html__( 'Pinterest', 'authow' ) . '</span></a>';
					}
					
					break;

				case 'linkedin':
					$link = htmlentities( add_query_arg( array(
						'url'   => rawurlencode( $link ),
						'title' => rawurlencode( $text ),
					), 'https://www.linkedin.com/shareArticle?mini=true' ) );

					$output .= '<a class="'.$class.' post-share-item post-share-linkedin" aria-label="Share on LinkedIn" target="_blank" '. goso_reltag_social_icons() .' href="' . esc_url( $link ) . '">' . goso_icon_by_ver('fab fa-linkedin-in', '', true ) . '<span class="dt-share">' . esc_html__( 'Linkedin', 'authow' ) . '</span></a>';
					break;

				case 'tumblr':
					$link = htmlentities( add_query_arg( array(
						'url'  => rawurlencode( $link ),
						'name' => rawurlencode( $text ),
					), 'https://www.tumblr.com/share/link' ) );
					$output .= '<a class="'.$class.' post-share-item post-share-tumblr" aria-label="Share on Tumblr" target="_blank" '. goso_reltag_social_icons() .' href="' . esc_url( $link ) . '">' . goso_icon_by_ver( 'fab fa-tumblr', '', true ) . '<span class="dt-share">' . esc_html__( 'Tumblr', 'authow' ) . '</span></a>';
					break;
					
				case 'messenger':
					$link = htmlentities( add_query_arg( array(
						'link'  => rawurlencode( $link ),
						'redirect_uri' => rawurlencode( $text ),
					), 'https://www.facebook.com/dialog/send?app_id=5303202981&display=popup' ) );
					$output .= '<a class="'.$class.' post-share-item post-share-messenger show-on-mobile" aria-label="Share on Messenger" target="_blank" '. goso_reltag_social_icons() .' href="fb-messenger://share?app_id=5303202981&display=popup&link='. rawurlencode( $link ) .'&redirect_uri='. rawurlencode( $link ) .'">' . goso_icon_by_ver( 'gosoicon-messenger', '', true ) . '<span class="dt-share">' . esc_html__( 'Messenger', 'authow' ) . '</span></a>';
					$output .= '<a class="'.$class.' post-share-item post-share-messenger show-on-desktop" aria-label="Share on Messenger" target="_blank" '. goso_reltag_social_icons() .' href="' . esc_url( $link ) . '">' . goso_icon_by_ver( 'gosoicon-messenger', '', true ) . '<span class="dt-share">' . esc_html__( 'Messenger', 'authow' ) . '</span></a>';
					break;
					
				case 'vk':
					$link = 'https://vk.com/share.php?url=' . get_the_permalink();
					$output .= '<a class="'.$class.' post-share-item post-share-vk" aria-label="Share on VK" target="_blank" '. goso_reltag_social_icons() .' href="' . esc_url( $link ) . '">' . goso_icon_by_ver( 'fab fa-vk', '', true ) . '<span class="dt-share">' . esc_html__( 'VK', 'authow' ) . '</span></a>';
					break;
					
				case 'ok':
					$link = 'https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&st.shareUrl='. $link .'&amp;description='. $text .'&amp;media='. $img_link;
					$output .= '<a class="'.$class.' post-share-item post-share-ok" aria-label="Share on Odnoklassniki" target="_blank" '. goso_reltag_social_icons() .' href="' . esc_url( $link ) . '">' . goso_icon_by_ver( 'fab fa-odnoklassniki', '', true ) . '<span class="dt-share">' . esc_html__( 'Odnoklassniki', 'authow' ) . '</span></a>';
					break;
				
				case 'reddit':
					$link = htmlentities( add_query_arg( array(
						'url'   => rawurlencode( $link ),
						'title' => rawurlencode( $text ),
					), 'https://reddit.com/submit' ) );
					$output .= '<a class="'.$class.' post-share-item post-share-reddit" aria-label="Share on Reddit" target="_blank" '. goso_reltag_social_icons() .' href="' . esc_url( $link ) . '">' . goso_icon_by_ver( 'fab fa-reddit-alien', '', true ) . '<span class="dt-share">' . esc_html__( 'Reddit', 'authow' ) . '</span></a>';
					break;
					
				case 'stumbleupon':
					$link = htmlentities( add_query_arg( array(
						'url'   => rawurlencode( $link ),
						'title' => rawurlencode( $text ),
					), 'https://www.stumbleupon.com/submit' ) );
					$output .= '<a class="'.$class.' post-share-item post-share-stumbleupon" aria-label="Share on Stumbleupon" target="_blank" '. goso_reltag_social_icons() .' href="' . esc_url( $link ) . '">' . goso_icon_by_ver( 'fab fa-stumbleupon', '', true ) . '<span class="dt-share">' . esc_html__( 'Stumbleupon', 'authow' ) . '</span></a>';
					break;
					
				case 'email':
					$link = esc_url ( 'mailto:?subject=' . $text . '&BODY=' . $link );
					$output .= '<a class="'.$class.' post-share-item post-share-email" target="_blank" aria-label="Share via Email" '. goso_reltag_social_icons() .' href="' . esc_url( $link ) . '">' . goso_icon_by_ver( 'fas fa-envelope', '', true ) . '<span class="dt-share">' . esc_html__( 'Email', 'authow' ) . '</span></a>';
					break;
					
				case 'telegram':
					$link = htmlentities( add_query_arg( array(
						'url'  => rawurlencode( $link ),
						'text' => rawurlencode( $text ),
					), 'https://telegram.me/share/url' ) );
					$output .= '<a class="'.$class.' post-share-item post-share-telegram" aria-label="Share on Telegram" target="_blank" '. goso_reltag_social_icons() .' href="' . esc_url( $link ) . '">' . goso_icon_by_ver( 'fab fa-telegram', '', true ) . '<span class="dt-share">' . esc_html__( 'Telegram', 'authow' ) . '</span></a>';
					break;

				case 'whatsapp':
					$link = htmlentities( add_query_arg( array(
						'text' => rawurlencode( $text ) . ' %0A%0A ' . rawurlencode( $link ),
					), 'https://api.whatsapp.com/send' ) );
					$output .= '<a class="'.$class.' post-share-item post-share-whatsapp" aria-label="Share on Whatsapp" target="_blank" '. goso_reltag_social_icons() .' href="' . ( $link ) . '">' . goso_icon_by_ver( 'fab fa-whatsapp', '', true ) . '<span class="dt-share">' . esc_html__( 'Whatsapp', 'authow' ) . '</span></a>';
					break;
					
				case 'line':
					$line_share  = 'https://line.me/R/msg/text/?' . rawurlencode( $text ) . '%20' . rawurlencode( $link );
					$output .= '<a class="'.$class.' post-share-item post-share-line" target="_blank" '. goso_reltag_social_icons() .' href="'. esc_url( $line_share ) .'">'. goso_icon_by_ver( 'gosoicon-line', '', true ) .'<span class="dt-share">'. esc_html__( 'LINE', 'authow' ) . '</span></a>';
					break;
					
				case 'pocket':
					$link = 'https://getpocket.com/save?title='. $text .'&amp;url='. $link;
					$output .= '<a class="'.$class.' post-share-item post-share-pocket" aria-label="Share on Pocket" target="_blank" '. goso_reltag_social_icons() .' href="' . esc_url( $link ) . '">' . goso_icon_by_ver( 'fab fa-get-pocket', '', true ) . '<span class="dt-share">' . esc_html__( 'Pocket', 'authow' ) . '</span></a>';
					break;
					
				case 'skype':
					$link = 'https://web.skype.com/share?url='. $link .'&text='. $text;
					$output .= '<a class="'.$class.' post-share-item post-share-skype" aria-label="Share on Skype" target="_blank" '. goso_reltag_social_icons() .' href="' . esc_url( $link ) . '">' . goso_icon_by_ver( 'fab fa-skype', '', true ) . '<span class="dt-share">' . esc_html__( 'Skype', 'authow' ) . '</span></a>';
					break;
					
				case 'viber':
					$link = 'viber://forward?text=' . rawurlencode( $text ) . '%20' . rawurlencode( $link );
					$output .= '<a class="'.$class.' post-share-item post-share-viber" aria-label="Share on Viber" target="_blank" '. goso_reltag_social_icons() .' href="' . ( $link ) . '">' . goso_icon_by_ver( 'gosoicon-viber', '', true ) . '<span class="dt-share">' . esc_html__( 'Viber', 'authow' ) . '</span></a>';
					break;
				
				default:
					$output .= '';	
				break;	
			}
		}

        if ( is_single() || is_page() ) {
            $output .= '<a class="post-share-item post-share-expand" href="#">' . goso_icon_by_ver( 'gosoicon-add', '', true ) . '</a>';
        }

		
		if( $output ){
			if( 'single' == $pos ){
				echo '<div class="list-posts-share">';
			}
			echo $output;

			if( 'single' == $pos ){
				echo '</div>';
			}
		}
	}
}

if( ! function_exists( 'goso_get_single_style' ) ){
	function goso_get_single_style(){
		static $single_style;
		$single_style = 'style-1';

		$style_psingle   = get_post_meta( get_the_ID(), 'goso_single_style', true );
		if( $style_psingle ){
			$single_style = $style_psingle;

			return $single_style;
		}

		$style          = get_theme_mod('goso_single_style');
		$enable_style2  = get_theme_mod('goso_enable_single_style2');

		if( ! get_theme_mod('goso_single_style') && $enable_style2 ) {
		    $single_style = 'style-2';
		} elseif( $style ) {
		    $single_style = $style;
		}

		return $single_style;
	}
}

if( ! function_exists( 'goso_get_primary_cat_id' ) ){
	function goso_get_primary_cat_id( $taxonomy_name = 'category' ){
		$primary_term_id = '';
		
		if ( ! function_exists( 'yoast_get_primary_term_id' ) && ! class_exists( 'RankMath' ) ) {
			$the_category = get_the_category();
			if( ! empty( $the_category ) ){
				$primary_term_id = $the_category[0]->term_id;
			}
		}
		
		// Get primary cat from Yoast
		if( function_exists( 'yoast_get_primary_term_id' ) ){
			$primary_term_id = yoast_get_primary_term_id( $taxonomy_name, get_the_id() );
		}
		// Get primary cat from Rank Math
		if( class_exists( 'RankMath' ) ){
			$primary_term_id = get_post_meta( get_the_id(), 'rank_math_primary_category', true );
		}
		
		return $primary_term_id;
	}
}

if( ! function_exists( 'goso_get_wpseo_primary_term' ) ){
	function goso_get_wpseo_primary_term( $taxonomy_name = 'category' ){
		$primary_term_id = goso_get_primary_cat_id( $taxonomy_name );
		if ( $primary_term_id ) {
			$term = get_term( $primary_term_id, $taxonomy_name );
			
			if ( is_wp_error( $term ) ) {
				return '';
			}
			
			// Primary category
			$category_display = $term->name;
			$category_link    = get_category_link( $term->term_id );

			return '<span><a class="crumb" href="' . esc_url( $category_link ) . '">' . $category_display . '</a></span>' . goso_icon_by_ver('fas fa-angle-right');
		}
	}
}

/**
 * Exclude specific categories from latest posts on Homepage
 *
 * @since 2.4
 */
if( ! function_exists( 'goso_exclude_specific_categories_display_on_home2' ) ) {
	function goso_exclude_specific_categories_display_on_home2( $query ) {

		$feat_query = goso_global_query_featured_slider();

		if ( get_theme_mod( 'goso_exclude_featured_cat' ) && $feat_query && $query->is_main_query() & is_home() ) {

			$list_post_ids = array();
			if ( $feat_query->have_posts() ) {
				while ( $feat_query->have_posts() ) : $feat_query->the_post();
					$list_post_ids[] = get_the_ID();
				endwhile;
				wp_reset_postdata();
			}

			if( ! $list_post_ids ){
				return $query;
			}

			$query->set( 'post__not_in', $list_post_ids );
		}
		return $query;
	}

	add_action('pre_get_posts','goso_exclude_specific_categories_display_on_home2');
}

/**
 * Get query for related posts of current posts
 * 
 * Return $array
 */
if( ! function_exists( 'goso_get_query_related_posts' ) ){
	function goso_get_query_related_posts( $id, $based, $orderby, $order, $numbers ){

		$return = array();
		$post_type = get_post_type( $id );
		$categories = get_the_category( $id );
		$primary_catid = goso_get_primary_cat_id();
		if( 'primary_cat' == $based && $primary_catid ){
			$term               = get_term( $primary_catid );
			if ( ! is_wp_error( $term ) ) {
				$categories = array( $term );
			}
		}

		if( 'tags' == $based ):
			$categories = wp_get_post_terms( $id, 'post_tag', array( 'fields' => 'ids' ) );
		endif;

		if ( $categories ) {
			if( $based == 'tags' ) {
				$return = array(
					'post_type'      => $post_type,
					'ignore_sticky_posts' => 1,
					'posts_per_page' => $numbers,
					'tax_query'      => array(
						array(
							'taxonomy' => 'post_tag',
							'terms'    => $categories
						),
					),
					'post__not_in'        => array( $id ),
					'orderby'             => $orderby,
					'order'               => $order
				);
			} else {
				$category_ids = array();
				$featured_cat = '';
				/* Get featured category when slider is enabled */
				if( get_theme_mod('goso_featured_slider') && ( get_theme_mod('goso_featured_slider_filter_type') != 'tags' ) ):
					$featured_cat = get_theme_mod('goso_featured_cat');
				endif;
				
				foreach ( $categories as $individual_category ) {
					/* Remove featured slider categories to related posts */
					$term_related = $individual_category->term_id;
					if( ! get_theme_mod('goso_post_related_exclusive_cat') || ( get_theme_mod('goso_post_related_exclusive_cat') && ( $term_related != $featured_cat ) ) ){
						$category_ids[] = $term_related;
					}
				}

				$return = array(
					'category__in'        => $category_ids,
					'post__not_in'        => array( $id ),
					'posts_per_page'      => $numbers,
					'ignore_sticky_posts' => 1,
					'orderby'             => $orderby,
					'order'               => $order
				);
			}

			if( 'popular' ==  $orderby ) {
				$return['meta_key']       = goso_get_postviews_key();
				$return['orderby']       = 'meta_value_num';
			}elseif( 'popular7' ==  $orderby ) {
				$return['meta_key']       = 'goso_post_week_views_count';
				$return['orderby']       = 'meta_value_num';
			}elseif( 'popular_month' ==  $orderby ) {
				$return['meta_key']       = 'goso_post_month_views_count';
				$return['orderby']       = 'meta_value_num';
			}
		}
		
		return $return;
		
	}
}

/**
 * Get class for detect sidebar use for single posts page.
 * 
 * Return $string
 */
if( ! function_exists( 'goso_get_posts_sidebar_class' ) ){
	function goso_get_posts_sidebar_class(){
		$sidebar_customize = get_theme_mod( "goso_single_layout" ) ? get_theme_mod( "goso_single_layout" ) : 'right-sidebar';
		$sidebar_opts = get_post_meta( get_the_ID(), 'goso_post_sidebar_display', true );
		$sidebar_pos = $sidebar_opts ? $sidebar_opts : $sidebar_customize;

		$sidebar_position = '';
		if( $sidebar_pos == 'left' ) {
			$sidebar_position = 'left-sidebar';
		} elseif( $sidebar_pos == 'right' ) {
			$sidebar_position = 'right-sidebar';
		} elseif( $sidebar_pos == 'two' ) {
			$sidebar_position = 'two-sidebar';
		}
		
		return $sidebar_position;
	}
}

/**
 * Apply logo image to WP Block Embed
 * 
 * Return $string
 */
add_filter( 'get_site_icon_url', 'goso_custom_wp_block_embedded_icon' );
function goso_custom_wp_block_embedded_icon( $url ){
	$icon = get_theme_mod( 'goso_favicon' );
	if ( $icon ) {
		return $icon;
	} else {
		return $url;
	}
}

function goso_custom_login_logo_url( $url ) {
	if( get_theme_mod( 'activate_white_label' ) ) {
		return get_bloginfo( 'url' );
	} else {
		return $url;
	}
}
add_filter( 'login_headerurl', 'goso_custom_login_logo_url', 10, 1 );

/**
 * Check if single has sidebar or not
 * 
 * Return $string
 */
if( ! function_exists( 'goso_single_sidebar_return' ) ){
	function goso_single_sidebar_return(){

		$single_sidebar = true;
		$sidebar_old = get_theme_mod( "goso_sidebar_posts" );
		$sidebar_customize = get_theme_mod( "goso_single_layout" );
		$sidebar_opts = get_post_meta( get_the_ID(), 'goso_post_sidebar_display', true );

		if( $sidebar_opts == 'no' || $sidebar_opts == 'small_width' ) {
			$single_sidebar = false;
		} elseif( ! $sidebar_opts ) {
			if( $sidebar_customize == 'no' || $sidebar_customize == 'small_width' ) {
				$single_sidebar = false;
			} elseif( ! get_theme_mod( "goso_single_layout" ) ) {
				if( ! goso_get_setting( 'goso_sidebar_posts' ) ) {
					$single_sidebar = false;
				}
			}
		}

		return $single_sidebar;
	}
}

/**
 * Get inline-ads markup
 *
 */
if( !function_exists( 'goso_get_markup_infeed_ad' ) ) {
	function goso_get_markup_infeed_ad( $args ) {

		$defaults = array(
			'wrapper'     => 'div',
			'classes'      => 'goso-infeed-ads',
			'fullwidth'	 => '',
			'order_ad'   => 3,
			'order_post' => '',
			'code'       => '',
			'echo'       => false
		);

		$parse = wp_parse_args( $args, $defaults );

		$before = $after = $order_ad = $order_post = $code = '';
		extract( $parse );

		if ( ( $order_post % $order_ad != 0 ) || ! $code ) {
			return;
		}
		
		if( 'full' == $fullwidth ){
			$classes = $classes . ' goso-infeed-fullwidth-ads';
			$wrapper = 'div';
		}

		$output = '<' . $wrapper . ' class="' . $classes . '">';
		$output .= '<div class="goso-inner-infeed-data">';
		$output .= do_shortcode( $code );
		$output .= '</div>';
		$output .= '</' . $wrapper . '>';

		if ( ! $parse['echo'] ) {
			return $output;
		}

		echo $output;
	}
}

/**
 * Check showing reading time or not
 *
 * $option - the option to passed show/hide reading time
 */
if( !function_exists( 'goso_isshow_reading_time' ) ) {
	function goso_isshow_reading_time( $option ) {
		$return = false;
		$post_id = get_the_ID();
		if( $post_id ){
			$default_reading = get_theme_mod( 'goso_readtime_default' ) ? get_theme_mod( 'goso_readtime_default' ) : '';
			$reading_time = get_post_meta( $post_id, 'goso_reading_time', true );
			if( ( $reading_time || $default_reading ) && ! $option ){
				$return = true;
			}
		}
		
		return $return;
	}
}

/**
 * Get reading time data
 *
 */
if( ! function_exists( 'goso_reading_time' ) ) {
	function goso_reading_time( $echo = true ) {
		$return = get_theme_mod( 'goso_readtime_default' ) ? get_theme_mod( 'goso_readtime_default' ) : '';
		$post_id = get_the_ID();
		if( $post_id ){
			$reading_time = get_post_meta( $post_id, 'goso_reading_time', true );
			if( $reading_time ){
				$return = $reading_time;
			}
		}
		
		if( $return && goso_get_setting( 'goso_trans_read' ) ){
			$return = $return . ' ' . goso_get_setting( 'goso_trans_read' );
		}
		
		if( $echo == false ){
			return $return;
		}
		
		echo $return;
	}
}

/*
 * run do_shortcode for get_theme_mod
 */
if( ! function_exists( 'goso_theme_mod' ) ) {
	function goso_theme_mod( $option ) {
		if( ! get_theme_mod( $option ) ){
			return false;
		} else {
			return do_shortcode( get_theme_mod( $option ) );
		}
	}
}

/**
 * Check if single has layout smaller content
 * 
 * Return $string
 */
if( ! function_exists( 'goso_single_smaller_content_enable' ) ){
	function goso_single_smaller_content_enable(){

		$single_smaller_content = false;
		$sidebar_customize = get_theme_mod( "goso_single_layout" );
		$sidebar_opts = get_post_meta( get_the_ID(), 'goso_post_sidebar_display', true );
		
		if( $sidebar_opts == 'small_width' ) {
			$single_smaller_content = true;
		} elseif( ! $sidebar_opts ) {
			if( $sidebar_customize == 'small_width' ) {
				$single_smaller_content = true;
			}
		}
		
		return $single_smaller_content;
	}
}

if( ! function_exists( 'goso_get_query_featured_slider' ) ){
	function goso_get_query_featured_slider(){

		if( !get_theme_mod( 'goso_exclude_featured_cat' ) ){
			$feat_query = goso__query_featured_slider();
		}else {
			$feat_query = goso_global_query_featured_slider();
			if( ! $feat_query ){
				$feat_query = goso__query_featured_slider();
			}
		}
		return $feat_query;
	}
}

if( ! function_exists( 'goso_global_query_featured_slider' ) ){
	function goso_global_query_featured_slider(){
		$feat_query = array();
		if ( isset( $GLOBALS['goso_query_featured_slider'] ) && $GLOBALS['goso_query_featured_slider'] ) {
			$feat_query = $GLOBALS['goso_query_featured_slider'];
		}
		return $feat_query;
	}
}

if( ! function_exists( 'goso__query_featured_slider' ) ):
function goso__query_featured_slider(){
	$feat_query = array();
	if( get_theme_mod( 'goso_featured_slider' ) ) {
		$slider_style = get_theme_mod( 'goso_featured_slider_style' ) ? get_theme_mod( 'goso_featured_slider_style' ) : 'style-1';

		if( in_array( $slider_style, array( 'style-31','style-32' ) ) ){
			return array();
		}

		$featured_cat = get_theme_mod( 'goso_featured_cat' );
		$number       = get_theme_mod( 'goso_featured_slider_slides' );

		if ( ! $number ){
			$number = 6;
			if( in_array( $slider_style, array( 'style-7', 'style-8', 'style-10','style-19','style-23','style-24','style-25' ) ) ){
				 $number = 8;
			}elseif( in_array( $slider_style, array( 'style-17','style-18','style-20','style-21','style-26','style-27' ) ) ){
				 $number = 10;
			}elseif( in_array( $slider_style, array( 'style-22','style-28' ) ) ){
				 $number = 14;
			}elseif( $number < 3 && $slider_style == 'style-37' ){
				 $number = 6;
			}
		}
		$featured_args = array( 'posts_per_page' => $number, 'post_type' => 'post', 'post_status' => 'publish' );

		if( ! get_theme_mod( 'goso_featured_tags' ) || get_theme_mod( 'goso_featured_slider_filter_type' ) != 'tags' ) {
			if ( $featured_cat && '0' != $featured_cat ):
				$featured_args['cat'] = $featured_cat;
			endif;
		} elseif ( get_theme_mod( 'goso_featured_tags' ) && get_theme_mod( 'goso_featured_slider_filter_type' ) == 'tags' ) {
			$list_tag = get_theme_mod( 'goso_featured_tags' );
			$list_tag_trim = str_replace( ' ', '', $list_tag );
			$list_tags = explode( ',', $list_tag_trim );
			$featured_args['tax_query'] = array(
				array(
					'taxonomy' => 'post_tag',
					'field'    => 'slug',
					'terms'    => $list_tags
				),
			);
		}

		$orderby = get_theme_mod('featured_slider_orderby');
		$order   = get_theme_mod('featured_slider_order');

		$featured_args['orderby'] = $orderby ? $orderby : 'date';
		$featured_args['order']   = $order ? $order : 'DESC';

		$feat_query = new WP_Query( $featured_args );
	}

	return $feat_query;
}
endif;

if( ! function_exists( 'goso_set_query_featured_slider' ) ):
	function goso_set_query_featured_slider(){

		$query = array();
		if( get_theme_mod( 'goso_exclude_featured_cat' ) ){
			$query = goso__query_featured_slider();
		}

		$GLOBALS['goso_query_featured_slider'] = $query;
	}
add_action( 'init', 'goso_set_query_featured_slider' );
endif;


if( ! function_exists( 'goso_reltag_social_icons' ) ):
	function goso_reltag_social_icons(){
		$dataref = get_theme_mod('goso_rel_type_social') ? get_theme_mod('goso_rel_type_social') : 'noreferrer';
		$data_return = str_replace( '_', ' ', $dataref );
		if( 'none' != $data_return ){
			$return = ' rel="' . $data_return . '"';
		} else {
			$return = '';
		}
		
		return $return;
	}
endif;

/* Allow Upload SVG & JSon & Some file types */
if( ! function_exists( 'goso_allows_upload_custom_file_types' ) ){
	function goso_allows_upload_custom_file_types($mimes) {
		$mimes['json'] = 'text/plain';
		$mimes['svg'] = 'image/svg+xml';
		$mimes['csv'] = 'text/csv';
		$mimes['svgz'] = 'image/svg+xml';
		$mimes['doc']  = 'application/msword';
		
		return $mimes;
	}
	add_filter('upload_mimes', 'goso_allows_upload_custom_file_types');
}

/* Get typo data for WPBakery */
if ( ! function_exists( 'goso_authow_vc_extract_font_prop' ) ) {
	function goso_authow_vc_extract_font_prop( $param ) {
		if ( function_exists( 'vc_parse_multi_attribute' ) ) {
			$typo = vc_parse_multi_attribute( $param );
			$prop = '';
			unset( $typo['tag'] );
			foreach ( $typo as $tag => $properties ) {
				$prop .= str_replace( '_', '-', $tag ) . ':' . $properties . ';';
			}

			return $prop;
		}
	}
}

/* Detect if is using Gutenberg editor or not */
if ( ! function_exists( 'goso_is_using_gutenberg' ) ) {
	function goso_is_using_gutenberg() {
		$return = false;
		$wp_version = $GLOBALS['wp_version'];
		if( version_compare( $wp_version, '5.0-beta', '>' ) ) {
			$edit_screen = get_current_screen();
			if ( $edit_screen && method_exists( $edit_screen, 'is_block_editor' ) && $edit_screen->is_block_editor() ) {
				$return = true;
			}
		}
		return $return;
	}
}

/* Filter support post type for meta boxes */
if ( ! function_exists( 'goso_post_types_allow_meta_boxes' ) ) {
	function goso_post_types_allow_meta_boxes(){
		$default = array( 'post' );

		// Filter to add more allow post type
		$allow_post_type = apply_filters( 'goso_filter_allow_post_type', $default );

		if( ! empty( $allow_post_type ) && is_array( $allow_post_type ) ){
			return $allow_post_type;
		}

		return $default;
	}
}

/* Get the sub title for posts */
if ( ! function_exists( 'goso_display_post_subtitle' ) ) {
	function goso_display_post_subtitle( $class = '', $echo = true ){
		$sub_title = get_post_meta( get_the_ID(), 'goso_post_sub_title', true );
		$html_return = '';
		if( $sub_title ){
			$html_return = '<h2 class="goso-psub-title '. $class .'">'. $sub_title .'</h2>';
		}

		if( $echo ){
			echo $html_return;
		} else {
			return $html_return;
		}
	}
}

if ( ! function_exists( 'goso_get_publish_post_types_for_search' ) ) {
	function goso_get_publish_post_types_for_search( $args = [] ){
		$post_type_args = [
				// Default is the value $public.
				'show_in_nav_menus' => true,
			];

			if ( ! empty( $args['post_type'] ) ) {
				$post_type_args['name'] = $args['post_type'];
			}

			$_post_types = get_post_types( $post_type_args, 'objects' );

			$post_types = [];

			$ex_post_types = [
					'e-landing-page',
					'page',
					];

			foreach ( $_post_types as $post_type => $object ) {
				$post_types[ $object->name ] = array(
						'name' => $object->label,
						'value' => $object->name
				);
			}

			foreach ($ex_post_types as $post_type){
				unset($post_types[$post_type]);
			}

			return $post_types;
	}
}

if ( ! function_exists( 'goso_holder_image_base' ) ) {
	function goso_holder_image_base( $width = null, $height = null ){
		if( null == $width || null == $height || '' == $width || '' == $height ){
			$width = 3;
			$height = 2;
		}
		$return = "data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20". $width ."%20". $height ."'%3E%3C/svg%3E";
		/* Decode: $return = "data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 $width $height'></svg> */
		return esc_attr( $return );
	}
}

if ( ! function_exists( 'goso_image_srcset' ) ) {
	function goso_image_srcset( $post_id,$desktop_size='full',$mobile_size='' ){

        $return = '';

        /*$img_lists = [];
        if ( $mobile_size ) {
            $img_lists[] = goso_get_featured_image_size($post_id,$mobile_size).' [(max-width: 767px)]';
        }*/

        // desktop image
        //$img_lists[] = goso_get_featured_image_size($post_id,$desktop_size);

        $return .= goso_get_featured_image_size($post_id,$desktop_size);

        if ( $mobile_size ) {
            $return .= '" data_bg_hidpi="'.goso_get_featured_image_size($post_id,$mobile_size);
        }

        //return implode(' | ',$img_lists);

        return $return;
	}
}

if ( ! function_exists( 'goso_image_img_srcset' ) ) {
	function goso_image_img_srcset( $post_id,$desktop_size='full',$mobile_size='' ){

        $img_lists = [];
        $image_sizes = goso_image_size_thumb();
        if ( $mobile_size && isset($image_sizes[$mobile_size]['width']) && $image_sizes[$mobile_size]['width'] ) {
            $img_lists[] = goso_get_featured_image_size($post_id,$mobile_size).' '.$image_sizes[$mobile_size]['width'].'w';
        } else {
            return '';
        }

        // desktop image
        $img_lists[] = goso_get_featured_image_size($post_id,$desktop_size);

        return implode(',',$img_lists);
	}
}

if ( ! function_exists('goso_image_size_thumb')) {
    function goso_image_size_thumb() {
        global $_wp_additional_image_sizes;

		$default_image_sizes = [ 'thumbnail', 'medium', 'medium_large', 'large' ];

		$image_sizes = [];

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

if ( ! function_exists( 'goso_image_datasize' ) ) {
	function goso_image_datasize($desktop='',$mobile='') {

        $meta_size = [];

        $image_sizes = goso_image_size_thumb();

        if ( $mobile ) {
            $mobile_size = isset($image_sizes[$mobile]['width']) && $image_sizes[$mobile]['width'] ? $mobile : '';
            if ( $mobile_size ) {
             $meta_size[] = '(max-width: 767px) '.$image_sizes[$mobile_size]['width'].'px';
            } else {
                return 'auto';
            }
        }

        $desktop_size = isset($image_sizes[$desktop]) && $image_sizes[$desktop] ? $desktop : 'full';

        $meta_size[] = $image_sizes[$desktop_size]['width'].'px';

		return implode(', ' ,$meta_size);
	}
}

/**
 * Exclude post types from XML sitemaps from Yoast SEO.
 *
 * @param boolean $excluded  Whether the post type is excluded by default.
 * @param string  $post_type The post type to exclude.
 *
 * @return bool Whether or not a given post type should be excluded.
 */
function goso_yoast_sitemap_exclude_post_type( $excluded, $post_type ) {
	if( in_array( $post_type, array( 'archive-template', 'custom-post-template', 'goso_builder', 'goso-block', 'e-landing-page' ) ) ){
		return;
	}
}
add_filter( 'wpseo_sitemap_exclude_post_type', 'goso_yoast_sitemap_exclude_post_type', 10, 2 );

if ( !function_exists('goso_get_imageid_from_url')){
    function goso_get_imageid_from_url($attachment_url) {
        global $wpdb;
        $attachment_id = false;

        // Get the upload directory paths
        $upload_dir_paths = wp_upload_dir();

        // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
        if ( $attachment_url && false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {

            // If this is the URL of an auto-generated thumbnail, get the URL of the original image
            $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );

            // Remove the upload path base directory from the attachment URL
            $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

            // Finally, run a custom database query to get the attachment ID from the modified attachment URL
            $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );

        }

        return $attachment_id;
    }
}

if( ! is_admin() ) {
	require get_template_directory() . '/inc/video-format.php';
	new Goso_Sodedad_Video_Format;
}
include( trailingslashit( get_template_directory() ). 'inc/excerpt.php' );
include( trailingslashit( get_template_directory() ). 'inc/instagram/instagram.php' );
include( trailingslashit( get_template_directory() ). 'inc/twitter/dashpage.php' );
include( trailingslashit( get_template_directory() ) . 'inc/global-js.php' );
include( trailingslashit( get_template_directory() ) . 'authow_vc.php' );

// Visual Composer add on
if ( defined( 'WPB_VC_VERSION' ) ) {
	include( trailingslashit( get_template_directory() ) . 'inc/js_composer/js_composer.php' );
	include( trailingslashit( get_template_directory() ) . 'inc/js_composer/authow_vc.php' );
}

if ( defined( 'ELEMENTOR_VERSION' ) ) {
	require get_template_directory() . '/inc/elementor/elementor.php';
	require get_template_directory() . '/inc/blocks/blocks.php';
}

// Function work with elementor, vc, widgets
require get_template_directory() . '/inc/js_composer/inc/helper.php';
require get_template_directory() . '/inc/json-schema-validar.php';

if ( is_admin() && ! class_exists( 'RWMB_Loader' ) ) {
    require_once get_template_directory() . '/inc/dashboard/lib/meta-box/meta-box.php';
}

if ( is_admin() && class_exists( 'RWMB_Loader' ) ) {
    require_once get_template_directory() . '/inc/dashboard/lib/mb-settings-page/mb-settings-page.php';
    require_once get_template_directory() . '/inc/dashboard/lib/meta-box-conditional-logic/meta-box-conditional-logic.php';
}

require get_template_directory() . '/inc/dashboard/class-goso-dashboard.php';
new Goso_Authow_Dashboard();

if ( function_exists( 'register_block_type' ) ) {
	require get_template_directory() . '/inc/gutenberg/gutenberg.php';
}

if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory(). '/inc/woocommerce/woocommerce.php';
}
add_filter('body_class',function($class){
   $header_builder      = function_exists( 'goso_check_theme_mod' ) && goso_check_theme_mod( 'goso_enable_builder' ) ? goso_check_theme_mod( 'goso_enable_builder' ) : '';
    $header_search_style = ! empty( $header_builder ) ? goso_get_builder_mod( 'goso_header_search_style', 'showup' ) : get_theme_mod( 'goso_topbar_search_style', 'default' );
    $class[] = 'pchds-' . esc_attr( $header_search_style );
    return $class;
});
require get_template_directory(). '/inc/block.php';
require get_template_directory(). '/inc/featured_archive_posts.php';
require get_template_directory(). '/inc/builder/goso-builder.php';
require get_template_directory(). '/inc/data-imex/goso-imex.php';
require get_template_directory(). '/inc/template-builder/init.php';
require get_template_directory(). '/inc/toc/init.php';