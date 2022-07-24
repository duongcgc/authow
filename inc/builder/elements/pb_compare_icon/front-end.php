<?php
$compare_page_id = get_theme_mod( 'goso_woocommerce_compare_page' );
if ( $compare_page_id ):
	?>
    <div id="top-header-compare"
         class="top-search-classes goso-builder-elements pcheader-icon compare-icon">
        <a href="<?php echo esc_url( get_page_link( $compare_page_id ) ); ?>"
           class="pc-button-define-<?php echo goso_get_builder_mod( 'goso_header_pb_compare_icon_section_btnstyle','customize' ); ?> compare-contents"
           title="<?php echo goso_woo_translate_text( 'goso_woo_trans_viewcompare' ); ?>">

            <i class="gosoicon-exchange-2"></i>
            <span><?php do_action( 'goso_current_compare' ); ?></span>
        </a>
    </div>
<?php endif;
