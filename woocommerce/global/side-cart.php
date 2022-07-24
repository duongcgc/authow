<?php
defined( 'ABSPATH' ) || exit;
$cart_style = get_theme_mod( 'goso_woo_cart_style', 'side-right' );
?>
<nav id="sidebar-sidebar-cart" class="woocommerce goso-sidebar-cart <?php echo esc_attr( $cart_style ); ?>">
    <div class="sidebar-cart-container">
        <div class="sidecart-heading">
            <h3><?php echo goso_woo_translate_text( 'goso_woo_trans_shopppingcart' ); ?></h3>
            <span class="close sidebar-cart-close"><i
                        class="gosoicon-close-button"></i><?php echo goso_woo_translate_text( 'goso_woo_trans_close' ); ?></span>
        </div>
        <div class="sidecart-content">
            <div class="widget_shopping_cart_content">
				<?php woocommerce_mini_cart(); ?>
            </div>
        </div>
    </div>
</nav>
<div class="goso-sidebar-cart-close sidebar-cart-close"><?php echo goso_woo_translate_text( 'goso_woo_trans_close' ); ?></div>
