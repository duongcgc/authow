<?php
$classes = 'goso-vernav-hide';
$pos     = get_theme_mod( 'goso_menu_hbg_pos' );
$pos     = $pos ? $pos : 'left';

$hide_logo   = get_theme_mod( 'goso_menu_hbg_hide_logo' );
$hide_social = get_theme_mod( 'goso_menu_hbg_hidesocial' );

$footer_text  = get_theme_mod( 'goso_menu_hbg_footer_text' );
$social_style = get_theme_mod( 'goso_menuhbg_social_style' ) ? get_theme_mod( 'goso_menuhbg_social_style' ) : 'style-1';

$heading_sidebar = get_theme_mod( 'goso_sidebar_heading_style' ) ? get_theme_mod( 'goso_sidebar_heading_style' ) : 'style-1';
$heading_title   = get_theme_mod( 'goso_mhbgwidget_heading_style' ) ? get_theme_mod( 'goso_mhbgwidget_heading_style' ) : $heading_sidebar;

$heading_align_sidebar = get_theme_mod( 'goso_sidebar_heading_align' ) ? get_theme_mod( 'goso_sidebar_heading_align' ) : 'pcalign-center';
$heading_align         = get_theme_mod( 'goso_mhbgwidget_heading_align' ) ? get_theme_mod( 'goso_mhbgwidget_heading_align' ) : $heading_align_sidebar;

$sb_icon_pos      = get_theme_mod( 'goso_sidebar_icon_align' ) ? get_theme_mod( 'goso_sidebar_icon_align' ) : 'pciconp-right';
$sidebar_icon_pos = get_theme_mod( 'goso_hbg_icon_align' ) ? get_theme_mod( 'goso_hbg_icon_align' ) : $sb_icon_pos;

$sb_icon_design      = get_theme_mod( 'goso_sidebar_icon_design' ) ? get_theme_mod( 'goso_sidebar_icon_design' ) : 'pcicon-right';
$sidebar_icon_design = get_theme_mod( 'goso_hbg_icon_design' ) ? get_theme_mod( 'goso_hbg_icon_design' ) : $sb_icon_design;

$logo_url_hamburger = esc_url( home_url( '/' ) );
if ( get_theme_mod( 'goso_custom_logo_hamburger' ) ) {
	$logo_url_hamburger = get_theme_mod( 'goso_custom_logo_hamburger' );
}
if ( get_theme_mod( 'goso_vertical_nav_show' ) ) {
	$classes = 'goso-vernav-show';
}
?>
<?php if ( $classes == 'goso-vernav-hide' ): ?>
    <div class="goso-menu-hbg-overlay"></div>
<?php endif; ?>
<?php if ( $classes == 'goso-vernav-show' ): ?>
    <a class="goso-vernav-toggle" href="#"><?php goso_svg_menu_icon(); ?></a>
<?php endif; ?>
<div class="goso-menu-hbg <?php echo $classes; ?> goso-menu-hbg-<?php echo esc_attr( $pos ); ?>">
    <div class="goso-menu-hbg-inner">
		<?php if ( $classes == 'goso-vernav-hide' ): ?>
            <a id="goso-close-hbg"><?php goso_fawesome_icon( 'fas fa-times' ); ?></a>
		<?php endif; ?>
		<?php if ( ! get_theme_mod( 'goso_menu_hbg_hide_logo' ) || get_theme_mod( 'goso_menu_hbg_sitetitle' ) || get_theme_mod( 'goso_menu_hbg_desc' ) ): ?>
            <div class="goso-hbg-header">
				<?php
				$hbg_sitetitle = get_theme_mod( 'goso_menu_hbg_sitetitle' );
				$hbg_desc      = get_theme_mod( 'goso_menu_hbg_desc' );
				if ( ! $hide_logo ) {
					$logo_img = get_theme_mod( 'goso_menu_hbg_logo' );
					?>
                    <div class="goso-hbg-logo site-branding">
						<?php if ( $logo_img ) { ?>
                            <a href="<?php echo $logo_url_hamburger; ?>"><img class="goso-lazy"
                                                                              width="<?php echo goso_get_image_data_basedurl( $logo_img, 'w' ); ?>"
                                                                              height="<?php echo goso_get_image_data_basedurl( $logo_img, 'h' ); ?>"
                                                                              src="<?php echo goso_holder_image_base(goso_get_image_data_basedurl( $logo_img, 'w' ),goso_get_image_data_basedurl( $logo_img, 'h' ));?>"
                                                                              data-src="<?php echo esc_url( $logo_img ); ?>"
                                                                              alt="<?php bloginfo( 'name' ); ?>"/></a>
						<?php } elseif ( get_theme_mod( 'goso_logo' ) ) { ?>
                            <a href="<?php echo $logo_url_hamburger; ?>"><img class="goso-lazy"
                                                                              width="<?php echo goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_logo' ) ), 'w' ); ?>"
                                                                              height="<?php echo goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_logo' ) ), 'h' ); ?>"
                                                                              src="<?php echo goso_holder_image_base(goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_logo' ) ), 'w' ),goso_get_image_data_basedurl( esc_url( get_theme_mod( 'goso_logo' ) ), 'h' ));?>"
                                                                              data-src="<?php echo esc_url( get_theme_mod( 'goso_logo' ) ); ?>"
                                                                              alt="<?php bloginfo( 'name' ); ?>"/></a>
						<?php } else { ?>
                            <a href="<?php echo $logo_url_hamburger; ?>"><img class="goso-lazy" width="125" height="36"
                                                                              src="<?php echo goso_holder_image_base(125,36);?>"
                                                                              data-src="<?php echo get_template_directory_uri(); ?>/images/mobile-logo.png"
                                                                              alt="<?php bloginfo( 'name' ); ?>"/></a>
						<?php } ?>
                    </div>
					<?php
				}

				if ( $hbg_sitetitle ) {
					echo '<div class="goso-hbg_sitetitle">' . do_shortcode( $hbg_sitetitle ) . '</div>';
				}
				if ( $hbg_desc ) {
					echo '<div class="goso-hbg_desc">' . do_shortcode( $hbg_desc ) . '</div>';
				}
				?>
            </div>
		<?php endif; /* Hide hambuger header tag */ ?>
		<?php if ( get_theme_mod( 'goso_menu_hbg_show_search' ) ): ?>
            <div class="goso-hbg-search-box">
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
        <div class="goso-hbg-content goso-sidebar-content <?php echo sanitize_text_field( $heading_title . ' ' . $heading_align . ' ' . $sidebar_icon_pos . ' ' . $sidebar_icon_design ); ?>">
			<?php if ( is_active_sidebar( 'menu_hamburger_1' ) ) { ?>
                <div class="goso-menu-hbg-widgets1">
					<?php dynamic_sidebar( 'menu_hamburger_1' ); ?>
                </div>
			<?php } ?>
			<?php
			if ( has_nav_menu( 'main-menu' ) && ! get_theme_mod( 'goso_menu_hbg_hide_menu' ) ) {
				$args = array(
					'container'      => false,
					'theme_location' => 'main-menu',
					'menu_class'     => 'menu menu-hgb-main',
					'fallback_cb'    => 'goso_menu_fallback',
					'walker'         => new goso_menu_walker_nav_menu()
				);

				if ( get_theme_mod( 'goso_menu_hbg_primary' ) ) {
					$custom_menu = get_theme_mod( 'goso_menu_hbg_primary' );
					$args        = array(
						'container'   => false,
						'menu'        => $custom_menu,
						'menu_class'  => 'menu menu-hgb-main',
						'fallback_cb' => 'goso_menu_fallback',
						'walker'      => new goso_menu_walker_nav_menu()
					);
				}
				wp_nav_menu( $args );
			}
			?>
			<?php if ( is_active_sidebar( 'menu_hamburger_2' ) ) { ?>
                <div class="goso-menu-hbg-widgets2">
					<?php dynamic_sidebar( 'menu_hamburger_2' ); ?>
                </div>
			<?php } ?>
        </div>
        <div class="goso-hbg-footer">
			<?php
			$footer_text      = get_theme_mod( 'goso_menu_hbg_footer_text' );
			$footer_text      = do_shortcode( $footer_text );
			$hide_footer_text = get_theme_mod( 'goso_menu_hbg_hideftext' );

			if ( ! $footer_text ) {
				$footer_text = goso_get_setting( 'goso_footer_copyright' );
			}
			if ( $footer_text && ! $hide_footer_text ) {
				echo '<div class="goso_menu_hbg_ftext">';
				echo $footer_text;
				echo '</div>';
			}
			?>
			<?php if ( ! $hide_social ): ?>
				<?php if ( get_theme_mod( 'goso_email_me' ) || get_theme_mod( 'goso_vk' ) || goso_get_setting( 'goso_facebook' ) || goso_get_setting( 'goso_twitter' ) || get_theme_mod( 'goso_google' ) || get_theme_mod( 'goso_instagram' ) || get_theme_mod( 'goso_pinterest' ) || get_theme_mod( 'goso_linkedin' ) || get_theme_mod( 'goso_flickr' ) || get_theme_mod( 'goso_behance' ) || get_theme_mod( 'goso_tumblr' ) || get_theme_mod( 'goso_youtube' ) || get_theme_mod( 'goso_rss' ) || get_theme_mod( 'goso_slack' ) ) : ?>
                    <div class="header-social sidebar-nav-social goso-hbg-social-<?php echo $social_style; ?>">
						<?php get_template_part( 'inc/modules/socials' ); ?>
                    </div>
				<?php endif; ?>
			<?php endif; ?>

        </div>
    </div>
</div>
