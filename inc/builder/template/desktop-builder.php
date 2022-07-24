<div class="pc-wrapbuilder-header-inner">
	<?php
	load_template( PENCI_BUILDER_PATH . 'template/desktop-sticky-wrapper.php' );
	$overlap           = goso_get_builder_mod( 'goso_header_overlap_setting' );
	$header_width      = goso_get_builder_mod( 'goso_header_wrap_all', 'normal-width' );
	$header_shadow     = goso_get_builder_mod( 'goso_header_shadow' );
	$header_wrap_width = goso_get_builder_mod( 'goso_header_wrap_width' );
	$classes           = [];
	$classes[]         = 'goso_header goso-header-builder main-builder-header';
	$classes[]         = 'enable' == $overlap ? 'goso_header_overlap' : '';
	$classes[]         = 'enable' == $header_width ? 'container' : 'normal';
	$classes[]         = 'enable' == $header_shadow ? 'shadow-enable' : 'no-shadow';
	$classes[]         = 'enable' == $header_width && $header_wrap_width ? $header_wrap_width : '';
	$classes[]         = 'enable' == $header_width ? 'pchb-boxed-layout' : '';
	?>
	<div class="<?php echo implode( ' ', $classes ); ?>">
		<?php
		$rows = goso_get_builder_mod( 'goso_hb_arrange_bar', 'topblock,top,mid,bottom,bottomblock' );

		$rows = explode( ',', $rows );

		foreach ( $rows as $row ) {
			if ( ( ! empty( $row ) && goso_can_render_header( 'desktop', $row ) ) || is_customize_preview() ) {
				load_template( PENCI_BUILDER_PATH . 'template/desktop-' . $row . '.php' );
			}
		}
		?>
	</div>
	<?php
	load_template( PENCI_BUILDER_PATH . 'template/mobile-builder.php' );
	load_template( PENCI_BUILDER_PATH . 'template/mobile-menu.php' );
	?>
</div>
