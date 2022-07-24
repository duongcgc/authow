<?php
defined( 'ABSPATH' ) || exit;
if ( ! get_theme_mod( 'gosodesign_woo_filter_widget_enable', true ) ) {
	return false;
}
$classes   = array();
$classes[] = get_theme_mod( 'gosodesign_woo_filter_widget_heading_style', get_theme_mod( 'goso_sidebar_heading_style', 'style-1' ) );
$classes[] = get_theme_mod( 'gosodesign_woo_filter_widget_heading_align', 'pcalign-center' );
$classes[] = get_theme_mod( 'gosodesign_woo_filter_widget_style', '' );
$classes[] = get_theme_mod( 'gosodesign_woo_filter_widget_icon_align', 'pciconp-right' );
$classes[] = get_theme_mod( 'gosodesign_woo_filter_widget_icon_design', 'pcicon-right' );
?>
<nav id="sidebar-product-filter"
     class="woocommerce goso-sidebar-filter <?php echo get_theme_mod( 'goso_woo_fw_panel_pst', 'side-right' ); ?>">
    <div class="sidebar-filter-container">
        <div class="sidefilter-heading">
            <h3><?php echo goso_woo_translate_text( 'goso_woo_trans_productfilter' ); ?></h3>
            <span class="close sidebar-filter-close-button"><i
                        class="gosoicon-close-button"></i><?php echo goso_woo_translate_text( 'goso_woo_trans_close' ); ?></span>
        </div>
        <div class="sidebar-filter-content goso-sidebar-content <?php echo esc_attr( implode( ' ', $classes ) ); ?>">
			<?php do_action( 'goso-mobile-filter' ); ?>
			<?php
			if ( is_active_sidebar( 'sidebar-filter' ) ) :
				dynamic_sidebar( 'sidebar-filter' );
			else: ?>
                <div class="notice notice-error">
                    <p><?php
						if ( current_user_can( 'manage_options' ) ) {
							_e( 'Please go to <strong>Appearance > Widgets</strong>, add the filter to <strong>Sidebar Filter</strong>.', 'authow' );
						} ?></p>
                </div>
			<?php endif; ?>
        </div>
    </div>
</nav>
<div class="goso-sidebar-filter-close sidebar-filter-close"><?php echo goso_woo_translate_text( 'goso_woo_trans_close' ); ?></div>
