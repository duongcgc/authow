<?php
/**
 * Main sidebar of Authow theme
 * Display all widgets on right sidebar
 *
 * @package Wordpress
 * @since   1.0
 */
$heading_title       = get_theme_mod( 'goso_sidebar_heading_style' ) ? get_theme_mod( 'goso_sidebar_heading_style' ) : 'style-1';
$heading_align       = get_theme_mod( 'goso_sidebar_heading_align' ) ? get_theme_mod( 'goso_sidebar_heading_align' ) : 'pcalign-center';
$sidebar_style       = get_theme_mod( 'goso_sidebar_style' ) ? get_theme_mod( 'goso_sidebar_style' ) : '';
$sidebar_icon_pos    = get_theme_mod( 'goso_sidebar_icon_align' ) ? get_theme_mod( 'goso_sidebar_icon_align' ) : 'pciconp-right';
$sidebar_icon_design = get_theme_mod( 'goso_sidebar_icon_design' ) ? get_theme_mod( 'goso_sidebar_icon_design' ) : 'pcicon-right';
?>

<div id="sidebar"
     class="goso-sidebar-content <?php echo esc_attr( $heading_title . ' ' . $heading_align . ' ' . $sidebar_style . ' ' . $sidebar_icon_pos . ' ' . $sidebar_icon_design ); ?><?php if ( get_theme_mod( 'goso_sidebar_sticky' ) ): echo ' goso-sticky-sidebar'; endif; ?>">
    <div class="theiaStickySidebar">
		<?php
		if ( is_active_sidebar( 'goso-bbpress' ) ) {
			dynamic_sidebar( 'goso-bbpress' );
		} elseif ( is_active_sidebar( 'main-sidebar' ) ) {
			dynamic_sidebar( 'main-sidebar' );
		}
		?>
    </div>
</div>
