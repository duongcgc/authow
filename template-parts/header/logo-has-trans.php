<div id="logo">
	<?php
	$logo_url = esc_url( home_url( '/' ) );
	if ( get_theme_mod( 'goso_custom_url_logo' ) ) {
		$logo_url = get_theme_mod( 'goso_custom_url_logo' );
	}
	$logo_src = get_template_directory_uri() . '/images/logo.png';

	if ( get_theme_mod( 'goso_logo' ) ) {
		$logo_src = get_theme_mod( 'goso_logo' );
	}
	$logo_sticky = $logo_src_tran = $logo_src;

	$header_trans  = goso_is_header_transparent();
	if( $header_trans ) {
		$hlogo_trans_sticky = get_theme_mod( 'goso_upload_transparent_logo' );
		if ( $hlogo_trans_sticky ) {
			$logo_src_tran = $hlogo_trans_sticky;
		}
	}

	if ( is_page() ) {
		$pmeta_page_header = get_post_meta( get_the_ID(), 'goso_pmeta_page_header', true );
		if ( isset( $pmeta_page_header['custom_logo'] ) && $pmeta_page_header['custom_logo'] ) {
			$url_logo_src = wp_get_attachment_url( intval( $pmeta_page_header['custom_logo'] ) );
			if ( $url_logo_src ) {
				$logo_src = $url_logo_src;
			}
		}

		if( $header_trans ){
			if ( isset( $pmeta_page_header['hlogo_trans'] ) && $pmeta_page_header['hlogo_trans'] ) {
				$url_hlogo_trans = wp_get_attachment_url( intval( $pmeta_page_header['hlogo_trans'] ) );
				if ( $url_hlogo_trans ) {
					$logo_src_tran = $url_hlogo_trans;
				}
			}
		}
	}
	if( $header_trans && $logo_src_tran ){
		$logo_sticky = $logo_src;
		$logo_src = $logo_src_tran;
	}
	?>
	<a href="<?php echo $logo_url; ?>">
		<img class="goso-mainlogo goso-logo" src="<?php echo esc_url( $logo_src ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="<?php echo goso_get_image_data_basedurl( $logo_src, 'w' ); ?>" height="<?php echo goso_get_image_data_basedurl( $logo_src, 'h' ); ?>" />
		<?php if( $header_trans ): ?>
			<img class="goso-mainlogo goso-logo-sticky" src="<?php echo esc_url( $logo_sticky ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="<?php echo goso_get_image_data_basedurl( $logo_src, 'w' ); ?>" height="<?php echo goso_get_image_data_basedurl( $logo_src, 'h' ); ?>" />
		<?php endif; ?>
	</a>
	<?php
	if ( ( is_home() || is_front_page() ) && get_theme_mod( 'goso_home_h1content' ) ) {
		echo '<h1 class="goso-hide-tagupdated">' . get_theme_mod( 'goso_home_h1content' ) . '</h1>';
	}
	?>
</div>