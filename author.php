<?php
/**
 * The template for displaying author pages
 *
 * @package Wordpress
 * @since 1.0
 */
get_header();

/* Sidebar position */
$sidebar_position = goso_get_sidebar_position_archive();

/* Archive layout */
$layout_this = get_theme_mod( 'goso_archive_layout' );
if ( ! isset( $layout_this ) || empty( $layout_this ) ): $layout_this = 'standard'; endif;
$class_layout = '';
if ( $layout_this == 'classic' ): $class_layout = ' classic-layout'; endif;
?>

<?php if ( ! get_theme_mod( 'goso_disable_breadcrumb' ) && ! get_theme_mod( 'goso_move_breadcrumbs' ) ): ?>
	<?php
	$yoast_breadcrumb = '';
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		$yoast_breadcrumb = yoast_breadcrumb( '<div class="container goso-breadcrumb">', '</div>', false );
	}

	if ( $yoast_breadcrumb ) {
		echo $yoast_breadcrumb;
	} else { ?>
        <div class="container goso-breadcrumb">
				<span><a class="crumb" href="<?php echo esc_url( home_url('/') ); ?>"><?php echo goso_get_setting( 'goso_trans_home' ); ?></a></span><?php goso_fawesome_icon('fas fa-angle-right'); ?>
				<?php
				echo '<span>';
				echo goso_get_setting( 'goso_trans_author' );
				echo '</span>';
				?>
        </div>
	<?php } ?>
<?php endif; ?>

    <div class="container<?php echo esc_attr( $class_layout );
	if ( goso_get_setting( 'goso_sidebar_archive' ) ) : ?> goso_sidebar <?php echo esc_attr( $sidebar_position ); ?><?php endif; ?>">
        <div id="main"
             class="goso-layout-<?php echo esc_attr( $layout_this ); ?><?php if ( get_theme_mod( 'goso_sidebar_sticky' ) ): ?> goso-main-sticky-sidebar<?php endif; ?>">
            <div class="theiaStickySidebar">

				<?php if ( ! get_theme_mod( 'goso_disable_breadcrumb' ) && get_theme_mod( 'goso_move_breadcrumbs' ) ): ?>
					<?php
					$yoast_breadcrumb = '';
					if ( function_exists( 'yoast_breadcrumb' ) ) {
						$yoast_breadcrumb = yoast_breadcrumb( '<div class="container goso-breadcrumb goso-crumb-inside">', '</div>', false );
					}

					if ( $yoast_breadcrumb ) {
						echo $yoast_breadcrumb;
					} else { ?>
                        <div class="container goso-breadcrumb goso-crumb-inside">
                            <span><a class="crumb"
                                     href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo goso_get_setting( 'goso_trans_home' ); ?></a></span><?php goso_fawesome_icon( 'fas fa-angle-right' ); ?>
							<?php
							echo '<span>';
							echo goso_get_setting( 'goso_trans_author' );
							echo '</span>';
							?>
                        </div>
					<?php } ?>
				<?php endif; ?>

                <div class="archive-box">
                    <div class="title-bar">
						<?php
						$author_name = get_the_author();
						$author      = get_user_by( 'slug', get_query_var( 'author_name' ) );
						if ( $author ) {
							$author_id   = $author->ID;
							$author_name = get_the_author_meta( 'display_name', $author_id );
						}
						echo '<span>';
							echo goso_get_setting( 'goso_trans_author' );
							echo ' </span>';
							printf( __( '<h1 class="page-title">%s</h1>', 'authow' ), $author_name );
							?>
						</div>
					</div>

					<?php get_template_part( 'inc/templates/about_author' ); ?>

					<?php echo goso_render_google_adsense( 'goso_archive_ad_above' ); ?>

					<?php if ( have_posts() ) : ?>
						<?php
						$class_grid_arr = array(
							'mixed',
							'mixed-2',
							'mixed-3',
							'mixed-4',
							'small-list',
							'overlay-grid',
							'overlay-list',
							'photography',
							'grid',
							'grid-2',
							'list',
							'boxed-1',
							'boxed-2',
							'boxed-3',
							'standard-grid',
							'standard-grid-2',
							'standard-list',
							'standard-boxed-1',
							'classic-grid',
							'classic-grid-2',
							'classic-list',
							'classic-boxed-1',
							'magazine-1',
							'magazine-2'
						);
						if( in_array( $layout_this, $class_grid_arr ) ) {
							echo '<ul class="goso-wrapper-data goso-grid">';
						}elseif( in_array( $layout_this, array( 'masonry', 'masonry-2' ) ) ) {
							echo '<div class="goso-wrap-masonry"><div class="goso-wrapper-data masonry goso-masonry">';
						}elseif( get_theme_mod( 'goso_archive_nav_ajax' ) || get_theme_mod( 'goso_archive_nav_scroll' ) ) {
							echo '<div class="goso-wrapper-data">';
						}
						
						$infeed_ads = get_theme_mod( 'goso_infeedads_archi_code' ) ? get_theme_mod( 'goso_infeedads_archi_code' ) : '';
						$infeed_num = get_theme_mod( 'goso_infeedads_archi_num' ) ? get_theme_mod( 'goso_infeedads_archi_num' ) : 3;
						$infeed_full = get_theme_mod( 'goso_infeedads_archi_layout' ) ? get_theme_mod( 'goso_infeedads_archi_layout' ) : '';
						while ( have_posts() ) : the_post();
							include( locate_template( 'content-' . $layout_this . '.php' ) );
						endwhile;

						if( in_array( $layout_this, $class_grid_arr ) ) {
							echo '</ul>';
						}elseif( in_array( $layout_this, array( 'masonry', 'masonry-2' ) ) ) {
							echo '</div></div>';
						}elseif( get_theme_mod( 'goso_archive_nav_ajax' ) || get_theme_mod( 'goso_archive_nav_scroll' ) ) {
							echo '</div>';
						}

						goso_authow_archive_pag_style( $layout_this );
						?>
					<?php endif; wp_reset_postdata(); /* End if of the loop */ ?>

					<?php echo goso_render_google_adsense( 'goso_archive_ad_below' ); ?>

				</div>
			</div>

			<?php if ( goso_get_setting( 'goso_sidebar_archive' ) ) : ?>
				<?php get_sidebar(); ?>
				<?php if ( get_theme_mod( 'goso_two_sidebar_archive' ) ) : get_sidebar( 'left' ); endif; ?>
			<?php endif; ?>
		</div>
<?php get_footer(); ?>
