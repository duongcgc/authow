<?php if ( is_active_sidebar( 'top-instagram' ) ): ?>
	<div class="footer-instagram goso-top-instagram<?php if( get_theme_mod('goso_top_insta_overlay_image') ): echo ' goso-insta-title-overlay'; endif; ?>">
		<?php dynamic_sidebar( 'top-instagram' ); ?>
	</div>
<?php endif; ?>