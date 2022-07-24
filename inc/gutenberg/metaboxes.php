<?php
if ( ! class_exists( 'Goso_Gutenberg_Post_Format' ) ):
	class Goso_Gutenberg_Post_Format {
		public function __construct() {
			if ( is_admin()  ) {
				add_action( 'load-post.php', array( $this, 'init_metabox' ) );
				add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
			}
		}

		public function init_metabox() {
			add_action( 'add_meta_boxes', array( $this, 'add_metabox' ) );
		}

		public function add_metabox( $post_type ) {
			add_meta_box( 'goso-gutenberg-format', esc_html__( 'Post Format Data', 'authow' ), array( $this, 'render_metabox' ), array( 'post' ), 'side', 'high' );

			if ( post_type_supports( $post_type, 'post-formats' ) && current_theme_supports( 'post-formats' ) ) {
				wp_enqueue_script( 'goso-gutenberg-formats-ui', get_template_directory_uri() . '/inc/gutenberg/admin.js', array( 'vp-post-formats-ui' ), '1.7' );
			}
		}

		public function render_metabox( $post ) {
			vp_pfui_post_admin_setup();
		}
	}

	new Goso_Gutenberg_Post_Format();
endif;