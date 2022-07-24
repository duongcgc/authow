<?php
// Exit if accessed directly
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Main class for Goso Block
 *
 * @author authow ( http://authow.com/ )
 * @since 1.0
 */
if ( ! class_exists( 'Goso_Block' ) ):

	class Goso_Block {

		/**
		 * A reference to an instance of this class.
		 */
		private static $instance;


		/**
		 * Returns an instance of this class.
		 */
		public static function get_instance() {

			if ( null == self::$instance ) {
				self::$instance = new Goso_Block();
			}

			return self::$instance;

		}

		/**
		 * Initializes the plugin by setting filters and administration functions.
		 */
		private function __construct() {

			// Register Portfolio Post Type
			add_action( 'init', array( $this, 'register_portfolio_post_type' ) );

			// Register Portfolio Category
			add_action( 'init', array( $this, 'register_portfolio_category' ) );

			// Add Custom Columns to Editor
			add_filter( 'manage_edit-goso-block_columns', array( $this, 'edit_goso_blocks_columns' ) );
			add_action( 'manage_goso-block_posts_custom_column', array(
				$this,
				'manage_goso_blocks_columns'
			), 10, 2 );

			// Register Elementor Support
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
			add_action( 'init', array( $this, 'add_elementor_support' ) );

			// Register WPBakery Suppot
			add_action( 'init', array( $this, 'add_wpbakery_support' ) );

			// Register Content Block Shortcode
			add_shortcode( 'block_content', array( $this, 'get_block_content_shortcode' ) );

			// Ajax Mega Content
			add_action( 'wp_ajax_goso_get_ajax_menu_mega_content', [ $this, 'get_ajax_menu_mega_content' ] );
			add_action( 'wp_ajax_nopriv_goso_get_ajax_menu_mega_content', [ $this, 'get_ajax_menu_mega_content' ] );
		}

		/**
		 * Register Portfolio Post Type
		 */
		public function register_portfolio_post_type() {
			$labels = array(
				'name'               => _x( 'Goso Block', 'post type general name', 'authow' ),
				'singular_name'      => _x( 'Block', 'post type singular name', 'authow' ),
				'add_new'            => __( 'Add New', 'authow' ),
				'add_new_item'       => __( 'Add New Block', 'authow' ),
				'edit_item'          => __( 'Edit Block', 'authow' ),
				'new_item'           => __( 'New Block', 'authow' ),
				'all_items'          => __( 'All Blocks', 'authow' ),
				'view_item'          => __( 'View Block', 'authow' ),
				'search_items'       => __( 'Search Block', 'authow' ),
				'not_found'          => __( 'No block found', 'authow' ),
				'not_found_in_trash' => __( 'No blocks found in Trash', 'authow' ),
				'parent_item_colon'  => '',
				'menu_name'          => _x( 'Goso Blocks', 'post type general name', 'authow' ),
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => 'goso-block',
				'capability_type'    => 'page',
				'menu_icon'          => 'dashicons-schedule',
				'has_archive'        => false,
				'hierarchical'       => false,
				'menu_position'      => null,
				'show_in_rest'       => true,
				'supports'           => array( 'title', 'editor' )
			);

			register_post_type( 'goso-block', $args );
		}

		/**
		 * Register Portfolio Categories
		 */
		public function register_portfolio_category() {
			$labels = array(
				'name'              => _x( 'Block Categories', 'taxonomy general name', 'authow' ),
				'singular_name'     => _x( 'Block Category', 'taxonomy singular name', 'authow' ),
				'search_items'      => __( 'Search Block Categories', 'authow' ),
				'all_items'         => __( 'All Block Categories', 'authow' ),
				'parent_item'       => __( 'Parent Block Category', 'authow' ),
				'parent_item_colon' => __( 'Parent Block Category:', 'authow' ),
				'edit_item'         => __( 'Edit Block Category', 'authow' ),
				'update_item'       => __( 'Update Block Category', 'authow' ),
				'add_new_item'      => __( 'Add New Block Category', 'authow' ),
				'new_item_name'     => __( 'New Block Category Name', 'authow' ),
				'menu_name'         => __( 'Block Categories', 'authow' )
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'goso_block_category' )
			);

			register_taxonomy( 'goso_block_category', array( 'goso-block' ), $args );
		}

		public function edit_goso_blocks_columns( $columns ) {
			unset( $columns['taxonomy-goso_block_category'] );

			$new_columns = array(
				'shortcode'        => esc_html__( 'Shortcode', 'authow' ),
				'goso_categories' => esc_html__( 'Block Categories', 'authow' ),
				'date'             => esc_html__( 'Date', 'authow' ),
			);

			$columns = $columns + $new_columns;

			return $columns;
		}


		public function manage_goso_blocks_columns( $column, $post_id ) {
			switch ( $column ) {
				case 'shortcode':
					echo '<strong>[block_content id="' . $post_id . '"]</strong>';
					break;
				case 'goso_categories':
					$terms = wp_get_post_terms( $post_id, 'goso_block_category' );
					$post_type = get_post_type( $post_id );
					$keys = array_keys( $terms );
					$last_key = end( $keys );

					if ( ! $terms ) {
						echo '—';
					}

					?>
					<?php foreach ( $terms as $key => $term ) : ?>
					<?php
					$name = $term->name;

					if ( $key !== $last_key ) {
						$name .= ',';
					}

					?>

                    <a href="<?php echo esc_url( 'edit.php?post_type=' . $post_type . '&goso_block_category=' . $term->slug ); ?>">
						<?php echo esc_html( $name ); ?>
                    </a>
				<?php endforeach; ?>
					<?php
					break;
			}
		}

		public function add_elementor_support() {
			$cpt_support = get_option( 'elementor_cpt_support' );
			if ( ! $cpt_support ) {
				$cpt_support = [ 'page', 'post', 'goso-block' ];
				update_option( 'elementor_cpt_support', $cpt_support );
			} else if ( ! in_array( 'goso-block', $cpt_support ) ) {
				$cpt_support[] = 'goso-block';
				update_option( 'elementor_cpt_support', $cpt_support );
			}
		}

		public function add_wpbakery_support() {
			if ( function_exists( 'vc_set_default_editor_post_types' ) ) {
				vc_set_default_editor_post_types( array( 'page', 'post', 'goso-block' ) );
			}
		}

		public function elementor_get_content( $id ) {
			return Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $id );
		}

		public function get_block_content( $id ) {
			$id      = apply_filters( 'wpml_object_id', $id, 'goso-block', true );
			$post    = get_post( $id );
			$content = '';
			if ( ! $post || $post->post_type != 'goso-block' ) {
				return false;
			}

			if ( did_action( 'elementor/loaded' ) && Plugin::$instance->documents->get( $id )->is_built_with_elementor() ) {
				$content .= $this->elementor_get_content( $id );
			} else {
				$content .= do_shortcode( $post->post_content );

				$shortcodes_custom_css = get_post_meta( $id, '_wpb_shortcodes_custom_css', true );

				$content .= '<style data-type="vc_shortcodes-custom-css">';
				if ( ! empty( $shortcodes_custom_css ) ) {
					$content .= $shortcodes_custom_css;
				}
				$content .= '</style>';
			}

			return $content;
		}

		public function get_block_content_shortcode( $atts, $content ) {
			extract( shortcode_atts( array(
				'id' => '',
			), $atts ) );

			if ( $id ) {
				return $this->get_block_content( $id );
			} else {
				return false;
			}
		}

		public function get_ajax_menu_mega_content() {
			$response = array(
				'status'  => 'error',
				'message' => 'Can\'t load HTML blocks with AJAX',
				'data'    => array(),
			);

			if ( class_exists( 'WPBMap' ) ) {
				WPBMap::addAllMappedShortcodes();
			}

			if ( isset( $_POST['ids'] ) ) {
				$id                  = (int) $_POST['ids'];
				$content             = $this->get_block_content( $id );
				$response['status']  = 'success';
				$response['message'] = 'At least one HTML block loaded';
				$response['data']    = $content;
			}

			wp_send_json_success( $response, 200 );

			wp_die();
		}

		public function enqueue_scripts() {

			if ( class_exists( '\Elementor\Plugin' ) ) {
				$elementor = \Elementor\Plugin::instance();
				$elementor->frontend->enqueue_styles();
			}

			if ( class_exists( '\ElementorPro\Plugin' ) ) {
				$elementor_pro = \ElementorPro\Plugin::instance();
				$elementor_pro->enqueue_styles();
			}

			if ( goso_can_render_footer() ) {
				$footer_id = goso_footer_builder_content_id();
				$css_file  = '';
				if ( class_exists( '\Elementor\Core\Files\CSS\Post' ) ) {
					$css_file = new \Elementor\Core\Files\CSS\Post( $footer_id );
				} elseif ( class_exists( '\Elementor\Post_CSS_File' ) ) {
					$css_file = new \Elementor\Post_CSS_File( $footer_id );
				}

				if ( $css_file ) {
					$css_file->enqueue();
				}
			}
		}
	}

	add_action( 'after_setup_theme', array( 'Goso_Block', 'get_instance' ) );

endif; /* End check if class exists */
