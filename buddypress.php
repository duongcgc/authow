<?php
/**
 * The Template for displaying all single posts
 *
 * @package Wordpress
 * @since   1.0
 */
get_header();

$sidebar_position = 'right-sidebar';
$sidebar_opts     = get_post_meta( get_the_ID(), 'goso_post_sidebar_display', true );
if ( get_theme_mod( "goso_left_sidebar_posts" ) ) {
	$sidebar_position = 'left-sidebar';
}
if ( $sidebar_opts == 'left' ) {
	$sidebar_position = 'left-sidebar';
} elseif ( $sidebar_opts == 'right' ) {
	$sidebar_position = 'right-sidebar';
}
?>
<?php if ( ! get_theme_mod( 'goso_disable_breadcrumb' ) && ! get_theme_mod( 'goso_move_breadcrumbs' ) ): ?>
	<?php
	$yoast_breadcrumb = '';
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		$yoast_breadcrumb = yoast_breadcrumb( '<div class="container goso-breadcrumb single-breadcrumb">', '</div>', false );
	}

	if ( $yoast_breadcrumb ) {
		echo $yoast_breadcrumb;
	} else { ?>
        <div class="container goso-breadcrumb single-breadcrumb">
		<span><a class="crumb" href="<?php echo esc_url( home_url('/') ); ?>"><?php echo goso_get_setting( 'goso_trans_home' ); ?></a></span><?php goso_fawesome_icon('fas fa-angle-right'); ?>
		<?php
		$goso_cats = get_the_category( get_the_ID() );
		$goso_cat  = array_shift( $goso_cats );
		echo goso_get_category_parents( $goso_cat );
		?>
            <span><?php the_title(); ?></span>
        </div>
	<?php } ?>
<?php endif; ?>

    <div class="container container-single<?php if ( get_theme_mod( 'goso_home_layout' ) == 'magazine-1' || get_theme_mod( 'goso_home_layout' ) == 'magazine-2' ): ?> container-single-magazine<?php endif; ?><?php if ( ( goso_get_setting( 'goso_sidebar_posts' ) && $sidebar_opts != 'no' ) || $sidebar_opts == 'left' || $sidebar_opts == 'right' ) : ?> goso_sidebar <?php echo esc_attr( $sidebar_position ); ?><?php endif; ?><?php if ( ! get_theme_mod( 'goso_disable_lightbox_single' ) ): ?> goso-enable-lightbox<?php endif; ?>">
        <div id="main"<?php if ( get_theme_mod( 'goso_sidebar_sticky' ) ): ?> class="goso-main-sticky-sidebar"<?php endif; ?>>
            <div class="theiaStickySidebar">

				<?php if ( ! get_theme_mod( 'goso_disable_breadcrumb' ) && get_theme_mod( 'goso_move_breadcrumbs' ) ): ?>
					<?php
					$yoast_breadcrumb = '';
					if ( function_exists( 'yoast_breadcrumb' ) ) {
						$yoast_breadcrumb = yoast_breadcrumb( '<div class="container goso-breadcrumb goso-crumb-inside single-breadcrumb">', '</div>', false );
					}

					if ( $yoast_breadcrumb ) {
						echo $yoast_breadcrumb;
					} else { ?>
                        <div class="container goso-breadcrumb goso-crumb-inside single-breadcrumb">
                            <span><a class="crumb"
                                     href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo goso_get_setting( 'goso_trans_home' ); ?></a></span><?php goso_fawesome_icon( 'fas fa-angle-right' ); ?>
							<?php
							$goso_cats = get_the_category( get_the_ID() );
							$goso_cat  = array_shift( $goso_cats );
							echo goso_get_category_parents( $goso_cat );
							?>
                            <span><?php the_title(); ?></span>
                        </div>
					<?php } ?>
				<?php endif; ?>

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php /* Count viewed posts */
					goso_set_post_views( $post->ID ); ?>
					<?php get_template_part( 'content', 'single-buddypress' ); ?>
				<?php endwhile; endif; ?>
            </div>
        </div>
		<?php if ( ( goso_get_setting( 'goso_sidebar_posts' ) && $sidebar_opts != 'no' ) || $sidebar_opts == 'left' || $sidebar_opts == 'right' ) : ?>
			<?php get_sidebar( 'buddypress' ); ?>
		<?php endif; ?>
    </div>

<?php get_footer(); ?>
