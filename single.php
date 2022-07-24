<?php
/**
 * The Template for displaying all single posts
 *
 * @package Wordpress
 * @since   1.0
 */
get_header();

$single_style = goso_get_single_style();

if ( ! in_array( $single_style, array( 'style-1', 'style-2' ) ) ) {
	get_template_part( 'template-parts/single', $single_style );
	return;
}

$sidebar_enable = goso_single_sidebar_return();
$sidebar_position = goso_get_posts_sidebar_class();
$sidebar_small_width = goso_single_smaller_content_enable();

$postID = get_the_ID();
$current_permalink = get_permalink( $postID );
$current_title = get_the_title( $postID );
$infinite_load  = get_theme_mod( 'goso_loadnp_posts' ) ? get_theme_mod( 'goso_loadnp_posts' ) : false;
$prev_post_id = $prev_post_url = $prev_post_title = $wrap_inficlass = $flag_infi = '';
$data_infiads = get_theme_mod( 'goso_loadnp_ads' ) ? '<div class="goso-single-infiads">' . get_theme_mod( 'goso_loadnp_ads' ) . '</div>' : '';
if( get_theme_mod( 'goso_loadnp_posts' ) ){
	$prev_post = goso_get_next_prev_posts();
	$flag_infi = 'no_data';
	if( ! empty( $prev_post ) && $prev_post != null && $prev_post != '' ) {
		$prev_post_id    = $prev_post->ID;
		$prev_post_url   = get_permalink( $prev_post_id );
		$prev_post_title = get_the_title( $prev_post_id );
		$wrap_inficlass  = ' goso-single-infiscroll';
		$flag_infi       = 'has_data';
	}
}
?>

    <div class="goso-single-wrapper<?php echo $wrap_inficlass; ?>"<?php if ( get_theme_mod( 'goso_loadnp_posts' ) && $data_infiads ) {
		echo ' data-infiads="' . htmlentities( $data_infiads ) . '"';
	} ?>>
        <div class="goso-single-block<?php if ( $flag_infi == 'no_data' ) {
			echo ' goso-single-infiblock-end';
		} ?>"<?php if ( get_theme_mod( 'goso_loadnp_posts' ) ): ?>
             data-prev-url="<?php echo esc_url( $prev_post_url ); ?>"
             data-current-url="<?php echo esc_url( $current_permalink ); ?>"
             data-post-title="<?php echo esc_attr( $current_title ); ?>"
             data-edit-post="<?php echo get_edit_post_link( $postID ); ?>"
             data-postid="<?php echo $postID; ?><?php endif; ?>">
			<?php if ( ! get_theme_mod( 'goso_disable_breadcrumb' ) && ( ! get_theme_mod( 'goso_move_breadcrumbs' ) || 'style-2' == $single_style ) ): ?>
				<?php
				$yoast_breadcrumb = '';
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					$yoast_breadcrumb = yoast_breadcrumb( '<div class="container goso-breadcrumb single-breadcrumb">', '</div>', false );
				}

				if ( $yoast_breadcrumb ) {
					echo $yoast_breadcrumb;
				} else {
					$yoast_breadcrumb = '';
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					$yoast_breadcrumb = yoast_breadcrumb( '<div class="container goso-breadcrumb single-breadcrumb">', '</div>', false );
				}

				if( $yoast_breadcrumb ){
					echo $yoast_breadcrumb;
				 }else{ ?>
				<div class="container goso-breadcrumb single-breadcrumb">
					<span><a class="crumb" href="<?php echo esc_url( home_url('/') ); ?>"><?php echo goso_get_setting( 'goso_trans_home' ); ?></a></span><?php goso_fawesome_icon('fas fa-angle-right'); ?>
					<?php
					if ( get_theme_mod( 'enable_pri_cat_yoast_seo' ) ) {
						$primary_term = goso_get_wpseo_primary_term();

						if ( $primary_term ) {
							echo $primary_term;
						} else {
							$goso_cats = get_the_category( get_the_ID() );
							$goso_cat  = array_shift( $goso_cats );
							echo goso_get_category_parents( $goso_cat );
						}
					} else {
						$goso_cats = get_the_category( get_the_ID() );
						$goso_cat  = array_shift( $goso_cats );
						echo goso_get_category_parents( $goso_cat );
					}
					?>
					<span><?php the_title(); ?></span>
				</div>
				<?php } ?>
			<?php } ?>
		<?php endif; ?>

		<?php if ( 'style-2' == $single_style ) : ?>
            <div class="goso-single-pheader container container-single<?php if ( get_theme_mod( 'goso_home_layout' ) == 'magazine-1' || get_theme_mod( 'goso_home_layout' ) == 'magazine-2' ): ?> container-single-magazine<?php endif; ?><?php if ( $sidebar_enable ) {
				echo ' ' . esc_attr( $sidebar_position );
			} else {
				echo ' goso_is_nosidebar';
			} ?> container-single-fullwidth hentry">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'single-full' ); ?>
				<?php endwhile; endif; ?>
            </div>
		<?php endif; ?>

            <div class="container container-single<?php if ( get_theme_mod( 'goso_home_layout' ) == 'magazine-1' || get_theme_mod( 'goso_home_layout' ) == 'magazine-2' ): ?> container-single-magazine<?php endif; ?><?php if ( $sidebar_enable ) { ?> goso_sidebar <?php echo esc_attr( $sidebar_position ); ?><?php } else {
				echo ' goso_is_nosidebar';
			} ?><?php if ( $sidebar_small_width ): ?> goso-single-smaller-width<?php endif; ?><?php if ( ! get_theme_mod( 'goso_disable_lightbox_single' ) ): ?> goso-enable-lightbox<?php endif; ?>">
                <div id="main"<?php if ( get_theme_mod( 'goso_sidebar_sticky' ) ): ?> class="goso-main-sticky-sidebar"<?php endif; ?>>
                    <div class="theiaStickySidebar">

						<?php if ( ! get_theme_mod( 'goso_disable_breadcrumb' ) && get_theme_mod( 'goso_move_breadcrumbs' ) && 'style-1' == $single_style ): ?>
							<?php
							$yoast_breadcrumb = '';
							if ( function_exists( 'yoast_breadcrumb' ) ) {
								$yoast_breadcrumb = yoast_breadcrumb( '<div class="container goso-breadcrumb goso-crumb-inside single-breadcrumb">', '</div>', false );
							}

							if ( $yoast_breadcrumb ) {
								echo $yoast_breadcrumb;
							} else {
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
										if ( get_theme_mod( 'enable_pri_cat_yoast_seo' ) ) {
											$primary_term = goso_get_wpseo_primary_term();

											if ( $primary_term ) {
												echo $primary_term;
											} else {
												$goso_cats = get_the_category( get_the_ID() );
												$goso_cat  = array_shift( $goso_cats );
												echo goso_get_category_parents( $goso_cat );
											}
										} else {
											$goso_cats = get_the_category( get_the_ID() );
											$goso_cat  = array_shift( $goso_cats );
											echo goso_get_category_parents( $goso_cat );
										}
										?>
                                        <span><?php the_title(); ?></span>
                                    </div>
								<?php } ?>
							<?php } ?>
						<?php endif; ?>

						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php /* Count viewed posts */
							goso_set_post_views( $post->ID ); ?>
							<?php get_template_part( 'content', 'single' ); ?>
						<?php endwhile; endif; ?>
                    </div>
                </div>
				<?php get_template_part( 'template-parts/single', 'sidebar' ); ?>
            </div>

			<?php do_action( 'goso_action_after_post_content' ); ?>
	</div>
</div>
<?php if( get_theme_mod( 'goso_loadnp_posts' ) && $flag_infi != 'no_data' ){ ?>
	<div class="goso-ldsingle"><div class="goso-ldspinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>
<?php } ?>
<?php get_footer(); ?>
