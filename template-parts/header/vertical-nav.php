<?php
$header_layout = goso_authow_get_header_layout();
$logo_url_nav  = esc_url( home_url( '/' ) );
if ( get_theme_mod( 'goso_custom_url_logo' ) ) {
	$logo_url = get_theme_mod( 'goso_custom_url_logo' );
}
if ( get_theme_mod( 'goso_custom_url_logo_vertical' ) ) {
	$logo_url_nav = get_theme_mod( 'goso_custom_url_logo_vertical' );
}

if ( ! get_theme_mod( 'goso_vertical_nav_show' ) ) { ?>
    <a id="close-sidebar-nav"
       class="<?php echo esc_attr( $header_layout ); ?>"><?php goso_fawesome_icon( 'fas fa-times' ); ?></a>
    <nav id="sidebar-nav" class="<?php echo esc_attr( $header_layout ); ?>" role="navigation"
	     <?php if ( ! get_theme_mod( 'goso_schema_sitenav' ) ): ?>itemscope
         itemtype="https://schema.org/SiteNavigationElement"<?php endif; ?>>

		<?php if ( ! get_theme_mod( 'goso_header_logo_vertical' ) ) : ?>
            <div id="sidebar-nav-logo">
				<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
					<?php if ( get_theme_mod( 'goso_mobile_nav_logo' ) ) { ?>
                        <a href="<?php echo $logo_url_nav; ?>"><img class="goso-lazy"
                                                                    src="<?php echo goso_holder_image_base( goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_mobile_nav_logo' ) ), 'w' ), goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_mobile_nav_logo' ) ), 'h' ) ); ?>"
                                                                    width="<?php echo goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_mobile_nav_logo' ) ), 'w' ); ?>"
                                                                    height="<?php echo goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_mobile_nav_logo' ) ), 'h' ); ?>"
                                                                    data-src="<?php echo esc_url( get_theme_mod( 'goso_mobile_nav_logo' ) ); ?>"
                                                                    alt="<?php bloginfo( 'name' ); ?>"/></a>
					<?php } elseif ( get_theme_mod( 'goso_logo' ) ) { ?>
                        <a href="<?php echo $logo_url_nav; ?>"><img class="goso-lazy"
                                                                    src="<?php echo goso_holder_image_base( goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_logo' ) ), 'w' ), goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_logo' ) ), 'h' ) ); ?>"
                                                                    width="<?php echo goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_logo' ) ), 'w' ); ?>"
                                                                    height="<?php echo goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_logo' ) ), 'h' ); ?>"
                                                                    data-src="<?php echo esc_url( get_theme_mod( 'goso_logo' ) ); ?>"
                                                                    alt="<?php bloginfo( 'name' ); ?>"/></a>
					<?php } else { ?>
                        <a href="<?php echo $logo_url_nav; ?>"><img class="goso-lazy"
                                                                    src="<?php echo goso_holder_image_base( 12, 36 ); ?>"
                                                                    width="125" height="36"
                                                                    data-src="<?php echo get_template_directory_uri(); ?>/images/mobile-logo.png"
                                                                    alt="<?php bloginfo( 'name' ); ?>"/></a>
					<?php } ?>
				<?php } else { ?>
					<?php if ( get_theme_mod( 'goso_mobile_nav_logo' ) ) { ?>
                        <a href="<?php echo $logo_url_nav; ?>"><img
                                    src="<?php echo esc_url( get_theme_mod( 'goso_mobile_nav_logo' ) ); ?>"
                                    width="<?php echo goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_mobile_nav_logo' ) ), 'w' ); ?>"
                                    height="<?php echo goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_mobile_nav_logo' ) ), 'h' ); ?>"
                                    alt="<?php bloginfo( 'name' ); ?>"/></a>
					<?php } elseif ( get_theme_mod( 'goso_logo' ) ) { ?>
                        <a href="<?php echo $logo_url_nav; ?>"><img
                                    src="<?php echo esc_url( get_theme_mod( 'goso_logo' ) ); ?>"
                                    width="<?php echo goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_logo' ) ), 'w' ); ?>"
                                    height="<?php echo goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_logo' ) ), 'h' ); ?>"
                                    alt="<?php bloginfo( 'name' ); ?>"/></a>
					<?php } else { ?>
                        <a href="<?php echo $logo_url_nav; ?>"><img
                                    src="<?php echo get_template_directory_uri(); ?>/images/mobile-logo.png" width="125"
                                    height="36" alt="<?php bloginfo( 'name' ); ?>"/></a>
					<?php } ?>
				<?php } ?>
            </div>
		<?php endif; ?>

		<?php if ( ! get_theme_mod( 'goso_header_social_vertical' ) ) : ?>
            <div class="header-social sidebar-nav-social<?php if ( get_theme_mod( 'goso_header_social_vertical_brand' ) ): echo ' goso-social-textcolored'; endif; ?>">
				<?php get_template_part( 'inc/modules/socials' ); ?>
            </div>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'goso_vernav_searchform' ) ): ?>
            <div class="goso-hbg-search-box goso-vernav-search-box">
                <form role="search" method="get" class="pc-searchform goso-hbg-search-form"
                      action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="inner-hbg-search-form">
                        <input type="text" class="search-input"
                               placeholder="<?php echo goso_get_setting( 'goso_trans_type_and_hit' ); ?>" name="s"/>
                        <i class="gosoicon-magnifiying-glass"></i>
                    </div>
                </form>
            </div>
		<?php endif; ?>

		<?php
		/**
		 * Display main navigation
		 */
		$menu_id            = '';
		$custom_menu_vernav = get_theme_mod( 'goso_moble_vertical_menu' );
		if ( $custom_menu_vernav ) {
			$menu_id = $custom_menu_vernav;
		}
		if ( is_page() ) {
			$pmeta_page_header = get_post_meta( get_the_ID(), 'goso_pmeta_page_header', true );
			if ( isset( $pmeta_page_header['main_nav_menu'] ) && $pmeta_page_header['main_nav_menu'] ) {
				$menu_id = $pmeta_page_header['main_nav_menu'];
			}
		}
		wp_nav_menu( array(
			'menu'           => $menu_id,
			'container'      => false,
			'theme_location' => 'main-menu',
			'menu_class'     => 'menu',
			'fallback_cb'    => 'goso_menu_fallback',
			'walker'         => new goso_menu_walker_nav_menu()
		) );
		?>
    </nav>
<?php } ?>
