<?php
if ( get_theme_mod( 'goso_header_logo_mobile' ) ) {
	$logo_url = esc_url( home_url( '/' ) );
	if ( get_theme_mod( 'goso_custom_url_logo' ) ) {
		$logo_url = get_theme_mod( 'goso_custom_url_logo' );
	}

	$logo_src = get_template_directory_uri() . '/images/logo.png';
	if ( get_theme_mod( 'goso_logo' ) ) {
		$logo_src = get_theme_mod( 'goso_logo' );
	}
	?>
	<div class="goso-mobile-hlogo">
		<a href="<?php echo esc_url( $logo_url ); ?>"><img class="goso-mainlogo goso-mainlogo-mb" src="<?php echo esc_url( $logo_src ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="<?php echo goso_get_image_data_basedurl( $logo_src, 'w' ); ?>" height="<?php echo goso_get_image_data_basedurl( $logo_src, 'h' ); ?>" /></a>
	</div>
	<?php
}