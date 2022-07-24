<?php $header_class_main = goso_authow_wpheader_classes(); ?>
<header id="header" class="goso-header-second <?php echo esc_attr( $header_class_main ); ?>" <?php if( ! get_theme_mod('goso_schema_wphead') ): ?>itemscope="itemscope" itemtype="https://schema.org/WPHeader"<?php endif;?>>
	<?php if ( ! get_theme_mod( 'goso_vertical_nav_remove_header' ) ): ?>
		<div class="inner-header">
			<div class="<?php goso_authow_get_header_width(); ?>">
				<div id="logo">
					<?php get_template_part( 'template-parts/header/logo' ); ?>
					<?php if ( ( is_home() || is_front_page() ) && get_theme_mod( 'goso_home_h1content' ) ): echo '<h1 class="goso-hide-tagupdated">' . get_theme_mod( 'goso_home_h1content' ) . '</h1>'; endif; ?>
				</div>

				<?php if ( goso_get_setting( 'goso_header_slogan_text' ) ) : ?>
					<div class="header-slogan">
						<div class="header-slogan-text"><?php echo goso_get_setting( 'goso_header_slogan_text' ); ?></div>
					</div>
				<?php endif; ?>

				<?php if ( ! get_theme_mod( 'goso_header_social_check' ) ) : ?>
					<div class="header-social<?php if ( get_theme_mod( 'goso_header_social_brand' ) ): echo ' goso-social-textcolored'; endif; ?>">
						<?php get_template_part( 'inc/modules/socials' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
</header>
<!-- end #header -->