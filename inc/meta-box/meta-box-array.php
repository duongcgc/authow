<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if( ! class_exists( 'GOSO_FW_MetaBox' ) ):
	class GOSO_FW_MetaBox{

		private static $_instance = null;

		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		public function __construct() {

			// Uses priority 20 to support custom port types registered using the default priority.
			add_action( 'init', array( $this, 'register_meta_boxes' ), 20 );

			add_action( 'admin_enqueue_scripts', array( $this, 'add_admin_scripts' ), 10, 1 );

			$this->load_files();
		}

		public function load_files() {
			// Creating meta boxes
			require_once  get_template_directory() . '/inc/meta-box/inc/add-meta-box.php';
			require_once  get_template_directory() . '/inc/meta-box/inc/fields.php';
			require_once  get_template_directory() . '/inc/meta-box/register/page.php';
		}

		/**
		 * Register meta boxes.
		 */
		public function register_meta_boxes() {
			$configs = apply_filters( 'goso_meta_boxes', array() );

			foreach ( $configs as $config ) {
				new Goso_Add_Meta_Box( $config );
			}
		}

		/**
		 * Enqueue scripts on custom post add/edit pages
		 *
		 * @param $hook
		 */
		function add_admin_scripts( $hook ) {
			if ( in_array( $hook, array( 'post-new.php','post.php', 'edit-tags.php','term.php' ) ) ) {

				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_script( 'wp-color-picker' );
				wp_enqueue_media();

				wp_enqueue_script(  'goso-custom-gallery-options', get_stylesheet_directory_uri() .'/js/admin-gallery.js', array( 'jquery','media-views', 'wp-color-picker' ), GOSO_SOLEDAD_VERSION, true );
				wp_localize_script( 'goso-custom-gallery-options', 'GosoObject', array(
					'WidgetImageTitle'   => esc_html__( 'Select an image', 'authow' ),
					'WidgetImageButton'  => esc_html__( 'Insert into widget', 'authow' ),
					'ajaxUrl'            => admin_url( 'admin-ajax.php' ),
					'nonce'              => wp_create_nonce( 'ajax-nonce' ),
				) );

				wp_enqueue_style( 'goso-admin-post', get_stylesheet_directory_uri() . '/css/admin.css', '', GOSO_SOLEDAD_VERSION );
			}
		}
	}

	new GOSO_FW_MetaBox;
endif;
