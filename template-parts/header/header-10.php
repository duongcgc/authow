<?php $header_class_main = goso_authow_wpheader_classes(); ?>
<header id="header" class="<?php echo esc_attr( $header_class_main ); ?>" <?php if( ! get_theme_mod('goso_schema_wphead') ): ?>itemscope="itemscope" itemtype="https://schema.org/WPHeader"<?php endif;?>>
	<?php if ( ! get_theme_mod( 'goso_vertical_nav_show' ) ) : ?>
		<?php $class_layout_bottom = goso_authow_sitenavigation_classes(); ?>
		<?php
		$header_trans      = goso_is_header_transparent();
		$dis_sticky_header = get_theme_mod( 'goso_disable_sticky_header' );
		if( $dis_sticky_header ){
			echo '<div class="sticky-wrapper">';
		}
		?>
		<nav id="navigation" class="<?php echo esc_attr( $class_layout_bottom ); ?>" role="navigation" <?php if( ! get_theme_mod('goso_schema_sitenav') ): ?>itemscope itemtype="https://schema.org/SiteNavigationElement"<?php endif; ?>>
            <div class="<?php goso_authow_get_header_width(); ?>">
                <div class="button-menu-mobile header-10"><?php goso_svg_menu_icon(); ?></div>
				<?php
				get_template_part( 'template-parts/header/logo-mobile' );
				if ( ( is_home() || is_front_page() ) && get_theme_mod( 'goso_home_h1content' ) ): echo '<h1 class="goso-hide-tagupdated">' . get_theme_mod( 'goso_home_h1content' ) . '</h1>'; endif;
				echo '<div class="goso-menu-wrap">';
				get_template_part( 'template-parts/header/menu' );
				echo '</div>';

				$topbar_search = get_theme_mod( 'goso_topbar_search_check' );

				if ( ! $topbar_search || get_theme_mod( 'goso_header_social_nav' ) || get_theme_mod( 'goso_menu_hbg_show' ) || ( class_exists( 'WooCommerce' ) && ! $cart_icon ) ) {
					echo '<div class="goso-header-extra">';
					if ( ! $topbar_search ) {
						get_template_part( 'template-parts/header/top-search' );
					}
					get_template_part( 'template-parts/menu-hamburger-icon' );
					if ( class_exists( 'WooCommerce' )) {
						get_template_part( 'template-parts/header/shop-icon' );
					}
					if ( get_theme_mod( 'goso_header_social_nav' ) ) :
						?>
                        <div class="main-nav-social<?php if ( get_theme_mod( 'goso_header_social_brand' ) ): echo ' goso-social-textcolored'; endif; ?>">
							<?php get_template_part( 'inc/modules/socials' ); ?>
                        </div>
					<?php
					endif;
					echo '</div>';
				}
				?>
			</div>
		</nav>
		<?php
		if( $dis_sticky_header ){
			echo '</div>';
		}
		?>
	<?php endif; ?>
</header>
<!-- end #header -->
