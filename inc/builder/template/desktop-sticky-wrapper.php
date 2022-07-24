<?php
$sticky_layout              = goso_get_builder_mod( 'goso_header_desktop_sticky_wrap_all' );
$sticky_layout_custom_width = goso_get_builder_mod( 'goso_header_desktop_sticky_wrap_width' );

$sticky_enable = false;
$sticky_row    = [ 'top', 'mid', 'bottom' ];
$classess      = [];
foreach ( $sticky_row as $row ) {
	if ( goso_can_render_header( 'desktop_sticky', $row ) ) {
		$sticky_enable = true;
	}
}
if ( 'enable' == goso_get_builder_mod( 'goso_header_desktop_sticky_shadow' ) ) {
	$classess[] = 'shadow-enable';
}
if ( 'enable' == goso_get_builder_mod( 'goso_header_desktop_sticky_hide_down' ) ) {
	$classess[] = 'hide-scroll-down';
}
if ( 'enable' == $sticky_layout ) {
	$classess[] = 'container pchb-boxed-layout';
}
if ( 'enable' == $sticky_layout && $sticky_layout_custom_width ) {
	$classess[] = $sticky_layout_custom_width;
}
if ( $sticky_enable || is_customize_preview() ):
	?>
    <div class="goso_header goso-header-builder goso_builder_sticky_header_desktop <?php echo implode( ' ', $classess ); ?>">
        <div class="goso_container">
            <div class="goso_stickybar goso_navbar">
				<?php
				foreach ( $sticky_row as $row ) {
					if ( goso_can_render_header( 'desktop_sticky', $row ) || is_customize_preview() ) {
						load_template( PENCI_BUILDER_PATH . 'template/desktop-sticky-' . $row . '.php', false );
					}
				}
				?>
            </div>
        </div>
    </div>
<?php endif;
