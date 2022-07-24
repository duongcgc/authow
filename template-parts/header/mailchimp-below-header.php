<?php
/**
 * Display sign-up mailchimp form below the header
 * Check if 'header-signup-form' has widget, if true display it
 *
 * @since 2.0
 */
if ( ! is_page_template( array( 'page-fullwidth.php' ) ) ) {
if( ( ( is_home() || is_front_page() ) && get_theme_mod( 'goso_signup_display_homepage' ) ) || ! get_theme_mod( 'goso_signup_display_homepage' ) ):
	if ( is_active_sidebar( 'header-signup-form' ) && ! get_theme_mod( 'goso_move_signup_below' ) ): ?>
		<div class="goso-header-signup-form">
			<div class="container">
				<?php dynamic_sidebar( 'header-signup-form' ); ?>
			</div>
		</div>
	<?php endif; ?>
<?php endif; } ?>