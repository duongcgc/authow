<?php
/**
 * Top bar template
 * Options for it in Customize > Top Bar Options & Colors For Top Bar
 *
 * @since 1.0
 */
?>
<div class="goso-top-bar<?php if( get_theme_mod( 'goso_top_bar_hide_social' ) ): echo ' no-social'; endif; if( get_theme_mod( 'goso_top_bar_enable_menu' ) ): echo ' topbar-menu'; endif; if( get_theme_mod( 'goso_top_bar_1400' ) ): echo ' topbar-1400px'; endif; if( get_theme_mod( 'goso_top_bar_full_width' ) ): echo ' topbar-fullwidth'; endif; ?>">
	<div class="container<?php if( get_theme_mod( 'goso_top_bar_1400' ) ): echo ' container-1400'; endif; ?>">
		<div class="goso-headline" role="navigation" <?php if( ! get_theme_mod('goso_schema_sitenav') ): ?>itemscope itemtype="https://schema.org/SiteNavigationElement"<?php endif; ?>>
			<?php 
			$tbreorder = get_theme_mod('goso_topbar_ordersec') ? get_theme_mod('goso_topbar_ordersec') : 'toptext-topposts-topmenu-topsocial';
			$tbreorderarray = explode( '-', $tbreorder );
			if( ! empty( $tbreorderarray ) ) {
				foreach( $tbreorderarray as $tbsec ) {
					if ( $tbsec == 'toptext' && get_theme_mod( 'goso_tbtext_enable' ) ) :
						get_template_part( 'inc/templates/topbar_text' );
					endif;
					if ( $tbsec == 'topposts' && goso_get_setting( 'goso_toppost_enable' ) ) :
						get_template_part( 'inc/templates/topbar_topposts' );
					endif;
					if ( $tbsec == 'topmenu' && get_theme_mod( 'goso_top_bar_enable_menu' ) ) :
						get_template_part( 'inc/templates/topbar_menu' );
					endif;
					if ( $tbsec == 'topsocial' && ( ! get_theme_mod( 'goso_top_bar_hide_social' ) || get_theme_mod( 'goso_tblogin' ) ) ) :
						get_template_part( 'inc/templates/topbar_social' );
					endif;
				}
			}
			?>
		</div>
	</div>
</div>