<?php
$logo_settings = 'goso_header_pb_logo_mobile';
$logo_url      = get_theme_mod( 'goso_custom_url_logo' ) ? get_theme_mod( 'goso_custom_url_logo' ) : esc_url( home_url( '/' ) );
$logo_display  = goso_get_builder_mod( $logo_settings . '_logo_display', 'image' );
$logo_title    = goso_get_builder_mod( $logo_settings . '_site_title' );
$logo_slogan   = goso_get_builder_mod( $logo_settings . '_site_description' );
$logo_class    = goso_get_builder_mod( $logo_settings . '_class' );
if ( goso_get_builder_mod( $logo_settings . '_image_setting_href' ) ) {
	$logo_url = goso_get_builder_mod( $logo_settings . '_image_setting_href' );
}
$logo_src = get_template_directory_uri() . '/images/logo.png';
if ( get_theme_mod( 'goso_logo' ) ) {
	$logo_src = get_theme_mod( 'goso_logo' );
}
if ( goso_get_builder_mod( $logo_settings . '_image_setting_url' ) ) {
	$logo_src = goso_get_builder_mod( $logo_settings . '_image_setting_url' );
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
$extra_logo_class = ' pclogo-cls';
if ( 'image' == $logo_display ):
	?>
    <div class="pc-builder-element pc-logo pb-logo-mobile goso-header-image-logo <?php echo esc_attr( $logo_class ); ?>">
        <a href="<?php echo $logo_url; ?>">
            <img class="goso-mainlogo<?php echo $extra_logo_class; ?>"
                 src="<?php echo esc_url( $logo_src ); ?>"
                 alt="<?php bloginfo( 'name' ); ?>"
                 width="<?php echo goso_get_image_data_basedurl( $logo_src, 'w' ); ?>"
                 height="<?php echo goso_get_image_data_basedurl( $logo_src, 'h' ); ?>">
			<?php if ( ! empty( $logo_slogan ) ): ?>
                <div class="site-slogan"><span><?php echo esc_attr( $logo_slogan ); ?></span></div>
			<?php endif; ?>
        </a>
    </div>
<?php else: ?>
    <div class="pc-builder-element pc-logo pb-logo-mobile goso-header-text-logo <?php echo esc_attr( $logo_class ); ?>">
        <a href="<?php echo $logo_url; ?>">
			<?php if ( ! empty( $logo_title )): ?>
                <div class="site-name"><?php echo esc_attr( $logo_title ); ?></div>
			<?php endif; ?>
			<?php if ( ! empty( $logo_slogan ) ): ?>
                <div class="site-slogan"><span><?php echo esc_attr( $logo_slogan ); ?></span></div>
			<?php endif; ?>
        </a>
    </div>
<?php endif;
