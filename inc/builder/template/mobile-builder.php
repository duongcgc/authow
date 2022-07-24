<?php
$class = [];
if ( 'enable' == goso_get_builder_mod( 'goso_header_mobile_sticky_shadow' ) ) {
	$class[] = 'shadow-enable';
}
if ( 'enable' == goso_get_builder_mod( 'goso_header_mobile_sticky_hide_down' ) ) {
	$class[] = 'hide-scroll-down';
}
?>
<div class="goso_navbar_mobile <?php echo implode( ' ', $class ); ?>">
	<?php
	$rows = array( 'top', 'mid', 'bottom' );
	foreach ( $rows as $row ) {
		if ( goso_can_render_header( 'mobile', $row ) || is_customize_preview() ) {
			load_template( PENCI_BUILDER_PATH . 'template/mobile-' . $row . '.php' );
		}
	}
	?>
</div>
