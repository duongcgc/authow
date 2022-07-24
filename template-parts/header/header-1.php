<?php $navigation_class = goso_authow_sitenavigation_classes(); ?>
<?php if ( ! get_theme_mod( 'goso_vertical_nav_show' ) ) : ?>

	<?php
	$header_trans      = goso_is_header_transparent();
	$dis_sticky_header = get_theme_mod( 'goso_disable_sticky_header' );
	if ( $dis_sticky_header ) {
		echo '<div class="sticky-wrapper">';
	}
	?>
    <nav id="navigation" class="<?php echo esc_attr( $navigation_class ); ?>" role="navigation"
	     <?php if ( ! get_theme_mod( 'goso_schema_sitenav' ) ): ?>itemscope
         itemtype="https://schema.org/SiteNavigationElement"<?php endif; ?>>
        <div class="<?php goso_authow_get_header_width(); ?>">
            <div class="button-menu-mobile header-1"><?php goso_svg_menu_icon(); ?></div>
			<?php
			get_template_part( 'template-parts/header/logo-mobile' );
			get_template_part( 'template-parts/header/menu' );
			?>

			<?php
			if ( ! get_theme_mod( 'goso_topbar_search_check' ) ) {
				get_template_part( 'template-parts/header/top-search' );
			}
			get_template_part( 'template-parts/menu-hamburger-icon' );
			?>
			<?php if ( class_exists( 'WooCommerce' ) ): ?>
				<?php get_template_part( 'template-parts/header/shop-icon' ); ?>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'goso_header_social_nav' ) ) : ?>
                <div class="main-nav-social <?php if ( get_theme_mod( 'goso_header_social_brand' ) ): echo ' goso-social-textcolored'; endif; ?>">
					<?php get_template_part( 'inc/modules/socials' ); ?>
                </div>
			<?php endif; ?>
        </div>
		<?php
		if( $dis_sticky_header ){
			echo '</div>';
		}
		?>
	</nav><!-- End Navigation -->
<?php endif; ?>
<?php get_template_part( 'template-parts/header/header-second' ); ?>

