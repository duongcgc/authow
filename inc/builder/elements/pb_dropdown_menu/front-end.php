<?php
$menu_id      = goso_get_builder_mod( 'goso_header_pb_dropdown_menu_name', '' );
$parent_click = goso_get_builder_mod( 'goso_header_pb_dropdown_menu_goso_vernav_click_parent' );
$classes      = [];
$classes[]    = goso_get_builder_mod( 'goso_header_pb_dropdown_menu_class', 'no-class' );
$classes[]    = 'enable' == $parent_click ? 'goso-vernav-cparent' : 'normal-click';
if ( goso_get_builder_mod( 'goso_header_pb_dropdown_menu_goso_vernav_click_parent' ) == 'enable' ) {
	$classes[] = 'pchb-cparent';
}
?>
    <div class="pc-builder-element pc-builder-menu pc-dropdown-menu">
        <nav class="<?php echo implode( ' ', $classes ); ?>" role="navigation"
		     <?php if ( ! goso_get_builder_mod( 'goso_schema_sitenav' ) ): ?>itemscope
             itemtype="https://schema.org/SiteNavigationElement"<?php endif; ?>>
			<?php
			$args = array(
				'container'   => false,
				'menu_class'  => 'menu menu-hgb-main',
				'fallback_cb' => 'goso_menu_fallback',
				'walker'      => new goso_menu_builder_walker_nav_menu()
			);
			if ( $menu_id ) {
				$args['menu'] = $menu_id;
			} else {
				$args['location'] = 'primary-menu';
			}
			wp_nav_menu( $args );
			?>
        </nav>
    </div>
<?php


