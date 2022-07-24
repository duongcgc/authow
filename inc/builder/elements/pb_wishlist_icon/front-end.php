<?php
$wishlist_page_id = get_theme_mod( 'goso_woocommerce_wishlist_page' );
if ( $wishlist_page_id ) :
	?>
    <div id="top-header-wishlist"
         class="pc-builder-element goso-builder-elements top-search-classes pcheader-icon wishlist-icon">
        <a class="wishlist-contents pc-button-define-<?php echo goso_get_builder_mod( 'goso_header_pb_wishlist_icon_section_btnstyle','customize' ); ?>" href="<?php echo esc_url( get_page_link( $wishlist_page_id ) ); ?>"
           title="<?php echo goso_woo_translate_text( 'goso_woo_trans_viewwishlist' ); ?>">

            <i class="gosoicon-heart"></i>
            <span><?php do_action( 'goso_current_wishlist' ); ?></span>
        </a>
    </div>
<?php endif;
