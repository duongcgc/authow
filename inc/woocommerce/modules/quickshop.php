<?php

class goso_product_quickshop {
	function __construct() {
		add_action( 'wp_ajax_goso_quick_shop', array( $this, 'quick_shop' ) );
		add_action( 'wp_ajax_nopriv_goso_quick_shop', array( $this, 'quick_shop' ) );
		add_action( 'goso_loop_product_image', array( $this, 'quick_shop_wrapper' ) );
	}

	public function quick_shop( $id = false ) {
		if ( isset( $_GET['id'] ) ) {
			$id = sanitize_text_field( (int) $_GET['id'] );
		}
		if ( ! $id ) {
			return;
		}

		global $post;

		$args = array( 'post__in' => array( $id ), 'post_type' => 'product' );

		$quick_posts = get_posts( $args );

		foreach ( $quick_posts as $post ) :
			setup_postdata( $post );
			woocommerce_template_single_add_to_cart();
		endforeach;

		wp_reset_postdata();

		die();
	}

	function quick_shop_wrapper() {
		?>
        <div class="quick-shop-wrapper">
            <div class="quick-shop-close"><a href="#"
                                             rel="nofollow noopener"><?php goso_woo_translate_text( 'goso_woo_trans_close' ); ?></a>
            </div>
            <div class="quick-shop-form" data-pid="<?php echo get_the_ID(); ?>"></div>
        </div>
		<?php
	}
}

$goso_product_quickshop = new goso_product_quickshop();
