<?php
$menu_id = goso_get_builder_mod( 'goso_header_pb_third_menu_name', false );
if ( is_page() ) {
	$pmeta_page_header = get_post_meta( get_the_ID(), 'goso_pmeta_page_header', true );
	if ( isset( $pmeta_page_header['main_nav_menu'] ) && $pmeta_page_header['main_nav_menu'] ) {
		$menu_id = $pmeta_page_header['main_nav_menu'];
	}
}
$classes = [];

$classes[] = 'navigation';
$classes[] = get_theme_mod( 'goso_header_menu_style', 'menu-style-1' );
$classes[] = goso_get_builder_mod( 'goso_header_pb_third_menu_class', 'no-class' );
$classes[] = 'enable' == goso_get_builder_mod( 'goso_header_pb_third_menu_goso_header_enable_padding', false ) ? 'menu-item-padding' : 'menu-item-normal';
$classes[] = 'enable' == goso_get_builder_mod( 'goso_header_pb_third_menu_goso_header_remove_line_hover' ) ? 'pcremove-lineh' : '';

if ( $menu_id || is_customize_preview() ) {
	?>
    <div class="pc-builder-element pc-builder-menu pc-third-menu">
        <nav class="<?php echo implode( ' ', $classes ); ?>" role="navigation"
		     <?php if ( ! goso_get_builder_mod( 'goso_schema_sitenav' ) ): ?>itemscope
             itemtype="https://schema.org/SiteNavigationElement"<?php endif; ?>>

			<?php
			if ( $menu_id ) {
				wp_nav_menu( array(
					'menu'        => $menu_id,
					'container'   => false,
					'menu_class'  => 'menu',
					'fallback_cb' => 'goso_menu_fallback',
					'walker'      => new goso_menu_walker_nav_menu()
				) );
			}
			?>
        </nav>
    </div>
	<?php
}


