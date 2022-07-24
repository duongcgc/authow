<?php
/**
 * This is footer template of Authow theme
 *
 * @package Wordpress
 * @since   1.0
 */

$goso_hide_footer  = '';
$hide_fwidget       = get_theme_mod( 'goso_footer_widget_area' );
$footer_layout      = get_theme_mod( 'goso_footer_widget_area_layout' ) ? get_theme_mod( 'goso_footer_widget_area_layout' ) : 'style-1';
$goso_footer_width = get_theme_mod( 'goso_footer_width' );

if ( is_page() ) {
	$goso_hide_footer = get_post_meta( get_the_ID(), 'goso_page_hide_footer', true );

	$pmeta_page_footer = get_post_meta( get_the_ID(), 'goso_pmeta_page_footer', true );
	if ( isset( $pmeta_page_footer['goso_footer_style'] ) && $pmeta_page_footer['goso_footer_style'] ) {
		$footer_layout = $pmeta_page_footer['goso_footer_style'];
	}

	if ( isset( $pmeta_page_footer['goso_hide_fwidget'] ) ) {
		if ( 'yes' == $pmeta_page_footer['goso_hide_fwidget'] ) {
			$hide_fwidget = true;
		} elseif ( 'no' == $pmeta_page_footer['goso_hide_fwidget'] ) {
			$hide_fwidget = false;
		}
	}

	if ( isset( $pmeta_page_footer['goso_footer_width'] ) && $pmeta_page_footer['goso_footer_width'] ) {
		$goso_footer_width = $pmeta_page_footer['goso_footer_width'];
	}
} else if ( is_single() ) {
	$goso_hide_footer = goso_is_hide_footer();
}

$footer_logo_url = esc_url( home_url( '/' ) );
if ( get_theme_mod( 'goso_custom_url_logo_footer' ) ) {
	$footer_logo_url = get_theme_mod( 'goso_custom_url_logo_footer' );
}
?>

<?php
if ( ( function_exists( 'is_shop' ) && is_shop() ) || ( function_exists( 'is_product_category' ) && is_product_category() ) || ( function_exists( 'is_product_tag' ) && is_product_tag() ) || ( function_exists( 'is_product' ) && is_product() ) ) {
	echo '</div>';
}
?>

<?php if ( ! $goso_hide_footer ): ?>
    <div class="clear-footer"></div>

	<?php if ( get_theme_mod( 'goso_footer_adsense' ) ): echo '<div class="container goso-google-adsense goso-google-adsense-footer">' . do_shortcode( get_theme_mod( 'goso_footer_adsense' ) ) . '</div>'; endif; ?>
	<?php
	// footer builder start here
	if ( function_exists('goso_can_render_footer') && goso_can_render_footer() ) {
		goso_footer_builder_content();
	} else {
		$footerreorder       = get_theme_mod( 'goso_footer_order_sections' ) ? get_theme_mod( 'goso_footer_order_sections' ) : 'widgets-instagram-signupform-footersocial';
		$social_end_array    = array(
			'widgets-instagram-signupform-footersocial',
			'widgets-signupform-instagram-footersocial',
			'instagram-widgets-signupform-footersocial',
			'instagram-signupform-widgets-footersocial',
			'signupform-widgets-instagram-footersocial',
			'signupform-instagram-widgets-footersocial'
		);
		$footerreorder_array = explode( '-', $footerreorder );
		if ( ! empty( $footerreorder_array ) ) {
			foreach ( $footerreorder_array as $ftsec ) {
				if ( $ftsec == 'widgets' && ! $hide_fwidget ) :
					?>
					<?php if ( ( in_array( $footer_layout, array(
							'style-2',
							'style-3',
							'style-8',
							'style-9',
							'style-10'
						) ) && ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) ) ) || ( in_array( $footer_layout, array(
							'style-1',
							'style-5',
							'style-6',
							'style-7'
						) ) && ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) ) || ( $footer_layout == 'style-4' && ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) ) ): ?>
                    <div id="widget-area"<?php if ( get_theme_mod( 'goso_footer_widget_bg_image' ) ): echo ' class="goso-lazy" data-bgset="' . get_theme_mod( 'goso_footer_widget_bg_image' ) . '"'; endif; ?>>
                        <div class="container<?php echo esc_attr( $goso_footer_width ? ' container-' . $goso_footer_width : '' ) ?>">
							<?php if ( in_array( $footer_layout, array(
								'style-1',
								'style-5',
								'style-6',
								'style-7'
							) ) ) { ?>
                                <div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?>">
									<?php dynamic_sidebar( 'footer-1' ); ?>
                                </div>
                                <div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?>">
									<?php dynamic_sidebar( 'footer-2' ); ?>
                                </div>
                                <div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?> last">
									<?php dynamic_sidebar( 'footer-3' ); ?>
                                </div>
							<?php } elseif ( in_array( $footer_layout, array(
								'style-2',
								'style-3',
								'style-8',
								'style-9',
								'style-10'
							) ) ) { ?>
                                <div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?>">
									<?php dynamic_sidebar( 'footer-1' ); ?>
                                </div>
                                <div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?> last">
									<?php dynamic_sidebar( 'footer-2' ); ?>
                                </div>
							<?php } elseif ( $footer_layout == 'style-4' ) { ?>
                                <div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?>">
									<?php dynamic_sidebar( 'footer-1' ); ?>
                                </div>
                                <div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?>">
									<?php dynamic_sidebar( 'footer-2' ); ?>
                                </div>
                                <div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?>">
									<?php dynamic_sidebar( 'footer-3' ); ?>
                                </div>
                                <div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?> last">
									<?php dynamic_sidebar( 'footer-4' ); ?>
                                </div>
							<?php } ?>
                        </div>
                    </div>
				<?php endif; ?>
				<?php
				endif;
				if ( $ftsec == 'instagram' && is_active_sidebar( 'footer-instagram' ) ) :
					?>
                    <div class="footer-instagram footer-instagram-html<?php if ( get_theme_mod( 'goso_footer_insta_title_overlay' ) ): echo ' goso-insta-title-overlay'; endif; ?>">
						<?php dynamic_sidebar( 'footer-instagram' ); ?>
                    </div>
				<?php
				endif;
				if ( $ftsec == 'signupform' && is_active_sidebar( 'footer-signup-form' ) ) :
					?>
                    <div class="footer-subscribe">
						<?php dynamic_sidebar( 'footer-signup-form' ); ?>
                    </div>
				<?php
				endif;
				if ( $ftsec == 'footersocial' && ! get_theme_mod( 'goso_footer_social' ) && ! in_array( $footerreorder, $social_end_array ) ) :
					?>
                    <div class="goso-footer-social-media goso-footer-social-moved<?php if ( get_theme_mod( 'goso_footer_social_around' ) ): echo ' footer-social-remove-circle'; endif;
					if ( get_theme_mod( 'goso_footer_social_drop_line' ) ): echo ' footer-social-drop-line'; endif;
					if ( get_theme_mod( 'goso_footer_disable_radius_social' ) ): echo ' footer-social-remove-radius'; endif;
					if ( get_theme_mod( 'goso_footer_social_remove_text' ) ): echo ' footer-social-remove-text'; endif; ?>">
                        <div class="container<?php echo esc_attr( $goso_footer_width ? ' container-' . $goso_footer_width : '' ); ?>">
                            <div class="footer-socials-section<?php if ( get_theme_mod( 'goso_footer_brand_social' ) && ! get_theme_mod( 'goso_footer_social_around' ) ) {
								echo ' goso-social-colored';
							} elseif ( get_theme_mod( 'goso_footer_brand_social' ) && get_theme_mod( 'goso_footer_social_around' ) ) {
								echo ' goso-social-textcolored';
							} ?>">
                                <ul class="footer-socials">
									<?php
									$social_data = goso_social_media_array();
									foreach ( $social_data as $name => $sdata ) {
										if ( $sdata[0] ) {
											$icon_html = goso_icon_by_ver( $sdata[1] );
											?>
                                            <li><a href="<?php echo esc_url( do_shortcode( $sdata[0] ) ); ?>"
                                                   aria-label="<?php echo ucwords( $name ); ?>" <?php echo goso_reltag_social_icons(); ?>
                                                   target="_blank"><?php echo $icon_html; ?>
                                                    <span><?php echo ucwords( $name ); ?></span></a></li>
											<?php
										}
									}
									?>
                                </ul>
                            </div>
                        </div>
                    </div>
				<?php
				endif;
			}
		}
		?>
        <footer id="footer-section"
                class="goso-footer-social-media goso-lazy<?php if ( get_theme_mod( 'goso_footer_social_around' ) ): echo ' footer-social-remove-circle'; endif;
		        if ( get_theme_mod( 'goso_footer_social_drop_line' ) ): echo ' footer-social-drop-line'; endif;
		        if ( get_theme_mod( 'goso_footer_disable_radius_social' ) ): echo ' footer-social-remove-radius'; endif;
		        if ( get_theme_mod( 'goso_footer_social_remove_text' ) ): echo ' footer-social-remove-text'; endif; ?>"<?php if ( get_theme_mod( 'goso_footer_copyright_bg_image' ) ): echo ' data-bgset="' . get_theme_mod( 'goso_footer_copyright_bg_image' ) . '"'; endif; ?>
		        <?php if ( ! get_theme_mod( 'goso_schema_wpfoot' ) ): ?>itemscope itemtype="https://schema.org/WPFooter"<?php endif; ?>>
            <div class="container<?php echo esc_attr( $goso_footer_width ? ' container-' . $goso_footer_width : '' ); ?>">
				<?php if ( ! get_theme_mod( 'goso_footer_social' ) && in_array( $footerreorder, $social_end_array ) ) : ?>
                    <div class="footer-socials-section<?php if ( get_theme_mod( 'goso_footer_brand_social' ) && ! get_theme_mod( 'goso_footer_social_around' ) ) {
						echo ' goso-social-colored';
					} elseif ( get_theme_mod( 'goso_footer_brand_social' ) && get_theme_mod( 'goso_footer_social_around' ) ) {
						echo ' goso-social-textcolored';
					} ?>">
                        <ul class="footer-socials">
							<?php
							$social_data = goso_social_media_array();
							foreach ( $social_data as $name => $sdata ) {
								if ( $sdata[0] ) {
									$icon_html = goso_icon_by_ver( $sdata[1] );
									?>
                                    <li><a href="<?php echo esc_url( do_shortcode( $sdata[0] ) ); ?>"
                                           aria-label="<?php echo ucwords( $name ); ?>" <?php echo goso_reltag_social_icons(); ?>
                                           target="_blank"><?php echo $icon_html; ?>
                                            <span><?php echo ucwords( $name ); ?></span></a>
                                    </li>
									<?php
								}
							}
							?>
                        </ul>
                    </div>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'goso_related_post_popup' ) ) : ?>
                    <div class="goso-flag-rlt-popup"></div><?php endif; ?>
				<?php if ( ( get_theme_mod( 'goso_footer_logo' ) && ! get_theme_mod( 'goso_hide_footer_logo' ) ) || get_theme_mod( 'goso_footer_copyright' ) || ! get_theme_mod( 'goso_go_to_top' ) || get_theme_mod( 'goso_footer_menu' ) ) : ?>
                    <div class="footer-logo-copyright<?php if ( ! get_theme_mod( 'goso_footer_logo' ) || get_theme_mod( 'goso_hide_footer_logo' ) ) : echo ' footer-not-logo'; endif; ?><?php if ( get_theme_mod( 'goso_go_to_top' ) ) : echo ' footer-not-gotop'; endif; ?>">
						<?php if ( get_theme_mod( 'goso_footer_logo' ) && ! get_theme_mod( 'goso_hide_footer_logo' ) ) : 
						$logo_src = get_theme_mod( 'goso_footer_logo' );
						$flogow = goso_get_image_data_basedurl( $logo_src, 'w' );
						$flogoh = goso_get_image_data_basedurl( $logo_src, 'h' );
						?>
                            <div id="footer-logo">
                                <a href="<?php echo $footer_logo_url; ?>">
									<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                                        <img class="goso-lazy"
                                             src="<?php echo goso_holder_image_base( $flogow, $flogoh );?>"
                                             data-src="<?php echo esc_url( get_theme_mod( 'goso_footer_logo' ) ); ?>"
                                             alt="<?php esc_html_e( 'Footer Logo', 'authow' ); ?>" width="<?php echo $flogow; ?>" height="<?php echo $flogoh; ?>" />
									<?php } else { ?>
                                        <img src="<?php echo esc_url( get_theme_mod( 'goso_footer_logo' ) ); ?>"
                                             alt="<?php esc_html_e( 'Footer Logo', 'authow' ); ?>" width="<?php echo $flogow; ?>" height="<?php echo $flogoh; ?>" />
									<?php } ?>
                                </a>
                            </div>
						<?php endif; ?>

						<?php if ( get_theme_mod( 'goso_footer_menu' ) ): ?>
                            <div class="footer-menu-wrap" role="navigation"
							     <?php if ( ! get_theme_mod( 'goso_schema_sitenav' ) ): ?>itemscope
                                 itemtype="https://schema.org/SiteNavigationElement"<?php endif; ?>>
								<?php
								/**
								 * Display main navigation
								 */
								wp_nav_menu( array(
									'container'      => false,
									'theme_location' => 'footer-menu',
									'menu_class'     => 'footer-menu'
								) );
								?>
                            </div>
						<?php endif; /* End check if enable footer menu */ ?>

						<?php if ( goso_get_setting( 'goso_footer_copyright' ) ) : ?>
                            <div id="footer-copyright">
                                <p><?php echo goso_get_setting( 'goso_footer_copyright' ); ?></p>
                            </div>
						<?php endif; ?>
						<?php if ( ! get_theme_mod( 'goso_go_to_top' ) ) : ?>
                            <div class="go-to-top-parent"><a href="#" class="go-to-top"><span><i
                                                class="gosoicon-up-chevron"></i> <br><?php echo goso_get_setting( 'goso_trans_back_to_top' ); ?></span></a>
                            </div>
						<?php endif; ?>
                    </div>
				<?php endif; ?>
            </div>
        </footer>
	<?php } endif; //Hide footer  ?>
</div><!-- End .wrapper-boxed -->

<?php if ( get_theme_mod( 'goso_go_to_top_floating' ) ) : ?>
	<div class="goso-go-to-top-floating"><i class="gosoicon-up-chevron"></i></div>
<?php endif;

/* Vertical Mobile Nav */
get_template_part( 'template-parts/header/vertical-nav' );
/* Menu Hamburger */
if ( get_theme_mod( 'goso_menu_hbg_show' ) && ! get_theme_mod( 'goso_vertical_nav_show' ) ) {
	get_template_part( 'template-parts/menu-hamburger' );
}
?>
<?php
/* Get menu related posts popup */
if ( is_singular( 'post' ) && get_theme_mod( 'goso_related_post_popup' ) ):
	get_template_part( 'inc/templates/related_posts-popup' );
endif; ?>

<?php
$gprd_desc       = goso_get_setting( 'goso_gprd_desc' );
$gprd_accept     = goso_get_setting( 'goso_gprd_btn_accept' );
$gprd_rmore      = goso_get_setting( 'goso_gprd_rmore' );
$gprd_rmore_link = goso_get_setting( 'goso_gprd_rmore_link' );
$goso_gprd_text = goso_get_setting( 'goso_gprd_policy_text' );
if ( get_theme_mod( 'goso_enable_cookie_law' ) && $gprd_desc && $gprd_accept ) :
	?>
    <div class="goso-wrap-gprd-law goso-wrap-gprd-law-close goso-close-all">
        <div class="goso-gprd-law">
            <p>
				<?php if ( $gprd_desc ): echo $gprd_desc; endif; ?>
				<?php if ( $gprd_accept ): echo '<a class="goso-gprd-accept" href="#">' . $gprd_accept . '</a>'; endif; ?>
				<?php if ( $gprd_rmore ): echo '<a class="goso-gprd-more" href="' . $gprd_rmore_link . '">' . $gprd_rmore . '</a>'; endif; ?>
            </p>
        </div>
		<?php if ( ! get_theme_mod( 'goso_show_cookie_law' ) ): ?>
            <a class="goso-gdrd-show" href="#"><?php echo $goso_gprd_text; ?></a>
		<?php endif; ?>
    </div>

<?php endif; ?>

<?php /* Login/register popup */
if ( get_theme_mod( 'goso_tblogin' ) || 'header-ecommerce' == get_theme_mod( 'goso_header_layout' ) ) {
	goso_authow_login_register_popup();
}
?>

<?php wp_footer(); ?>

<?php if ( get_theme_mod( 'goso_footer_analytics' ) ):
	echo get_theme_mod( 'goso_footer_analytics' );
endif; ?>

</body>
</html>
