<?php
$logo_url = esc_url( home_url( '/' ) );
if ( get_theme_mod( 'goso_custom_url_logo' ) ) {
	$logo_url = get_theme_mod( 'goso_custom_url_logo' );
}
$logo_src = get_template_directory_uri() . '/images/logo.png';
if ( get_theme_mod( 'goso_logo' ) ) {
	$logo_src = get_theme_mod( 'goso_logo' );
}

if ( is_page() ) {
	$pmeta_page_header = get_post_meta( get_the_ID(), 'goso_pmeta_page_header', true );
	if ( isset( $pmeta_page_header['custom_logo'] ) && $pmeta_page_header['custom_logo'] ) {

		$logo_src_meta = wp_get_attachment_url( intval( $pmeta_page_header['custom_logo'] ) );
		if ( $logo_src_meta ) {
			$logo_src = $logo_src_meta;
		}
	}
}
$extra_logo_class = '';
$header_layout    = goso_authow_get_header_layout();
if ( in_array( $header_layout, array( 'header-1', 'header-2', 'header-4', 'header-5', 'header-7', 'header-8' ) ) ) {
	$extra_logo_class = ' pclogo-cls';
}
?>
<a href="<?php echo $logo_url; ?>"><img class="goso-mainlogo<?php echo $extra_logo_class; ?>" src="<?php echo esc_url( $logo_src ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="<?php echo goso_get_image_data_basedurl( $logo_src, 'w' ); ?>" height="<?php echo goso_get_image_data_basedurl( $logo_src, 'h' ); ?>"></a>
