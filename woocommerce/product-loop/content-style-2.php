<?php
/**
 * Hook: woocommerce_before_shop_loop_item.
 *
 * @hooked woocommerce_template_loop_product_link_open - 10
 */
?>
<div class="goso-product-loop-top">
    <div class="goso-product-loop-image">
		<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item_title.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );
		do_action( 'woocommerce_before_shop_loop_item_title' );
		do_action( 'goso_loop_product_image' );
		?>
    </div>
    <div class="goso-product-loop-buttons">
        <div class="goso-product-loop-button">
			<?php
			do_action( 'woocommerce_after_shop_loop_item' );
			do_action( 'goso_loop_product_buttons' );
			?>
        </div>
    </div>
</div>
<div class="goso-product-loop-title">

    <div class="product-title-top">
		<?php
		/**
		 * Hook: woocommerce_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		do_action( 'woocommerce_shop_loop_item_title' );
		?>
    </div>
    <div class="product-title-bottom">
		<?php
		/**
		 * Hook: woocommerce_after_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );
		do_action( 'goso_swatches_loop' );
		do_action( 'goso_after_shop_loop' );
		?>
    </div>
</div>
