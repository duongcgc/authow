<?php
/**
 * The Template for displaying all single posts
 *
 * @package Wordpress
 * @since   1.0
 */
get_header();

$sidebar_position = 'right-sidebar';

$dis_sidebar_bbforums = get_theme_mod( 'goso_dis_sidebar_bbforums' );
$dis_sidebar_bbforum  = get_theme_mod( 'goso_dis_sidebar_bbforum' );
$dis_sidebar_bbtoppic = get_theme_mod( 'goso_dis_sidebar_bbtoppic' );

$sidebar_opts = get_post_meta( get_the_ID(), 'goso_post_sidebar_display', true );
if( get_theme_mod( "goso_left_sidebar_posts" ) ) { $sidebar_position = 'left-sidebar'; }
if( $sidebar_opts == 'left' ) {
	$sidebar_position = 'left-sidebar';
} elseif( $sidebar_opts == 'right' ) {
	$sidebar_position = 'right-sidebar';
}

if ( $dis_sidebar_bbtoppic && ( is_singular( 'topic' ) || is_single( 'topic' ) ) ) {
	$sidebar_opts = 'no';
}elseif ( $dis_sidebar_bbforum && ( is_singular( 'forum' ) || is_single( 'forum' ) ) ) {
	$sidebar_opts = 'no';
}elseif ( $dis_sidebar_bbforums && ( is_post_type_archive( 'forum' ) || is_tax( 'forum' ) ) ) {
	$sidebar_opts = 'no';
}
?>
<?php if ( get_theme_mod( 'goso_enable_single_style2' ) ) : ?>
	<div class="container container-single<?php if( get_theme_mod( 'goso_home_layout' ) == 'magazine-1' || get_theme_mod( 'goso_home_layout' ) == 'magazine-2' ): ?> container-single-magazine<?php endif;?> container-single-fullwidth">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'single-full' ); ?>
		<?php endwhile; endif; ?>
	</div>
<?php endif; ?>

<div class="container container-single<?php if( get_theme_mod( 'goso_home_layout' ) == 'magazine-1' || get_theme_mod( 'goso_home_layout' ) == 'magazine-2' ): ?> container-single-magazine<?php endif;?><?php if ( ( goso_get_setting( 'goso_sidebar_posts' ) && $sidebar_opts != 'no' ) || $sidebar_opts == 'left' || $sidebar_opts == 'right' ) : ?> goso_sidebar <?php echo esc_attr( $sidebar_position ); ?><?php endif; ?><?php if( ! get_theme_mod( 'goso_disable_lightbox_single' ) ): ?> goso-enable-lightbox<?php endif; ?>">
	<div id="main"<?php if ( get_theme_mod( 'goso_sidebar_sticky' ) ): ?> class="goso-main-sticky-sidebar"<?php endif; ?>>
		<div class="theiaStickySidebar">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php /* Count viewed posts */ goso_set_post_views( $post->ID ); ?>
				<?php get_template_part( 'content', 'single-bbpress' ); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
	<?php if ( ( goso_get_setting( 'goso_sidebar_posts' ) && $sidebar_opts != 'no' ) || $sidebar_opts == 'left' || $sidebar_opts == 'right' ) : ?>
		<?php get_sidebar('bbpress'); ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>