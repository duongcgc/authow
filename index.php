<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package    WordPress
 * @subpackage Authow Theme
 * @since      1.0
 */
get_header(); ?>

<?php if( get_theme_mod( 'goso_home_adsense_below_slider' ) ): ?>
	<div class="container goso-adsense-below-slider">
		<?php echo do_shortcode( get_theme_mod( 'goso_home_adsense_below_slider' ) ); ?>
	</div>
<?php endif; ?>

<?php
if ( ! get_theme_mod( 'goso_home_hide_boxes' ) && ( get_theme_mod( 'goso_home_box_img1' ) || get_theme_mod( 'goso_home_box_img2' ) || get_theme_mod( 'goso_home_box_img3' ) || get_theme_mod( 'goso_home_box_img4' ) ) ):
	get_template_part( 'inc/modules/home_boxes' );
endif;

/* Homepage Popular Post */
if( get_theme_mod( 'goso_enable_home_popular_posts' ) ) {
	get_template_part( 'inc/modules/home_popular' );
}

/* Home layout */
$layout_this = get_theme_mod( "goso_home_layout" );
$sidebar_position = 'right-sidebar';
if ( get_theme_mod( "goso_two_sidebar_home" ) ) {
	$sidebar_position = 'two-sidebar';
}elseif ( get_theme_mod( "goso_left_sidebar_home" ) ) {
	$sidebar_position = 'left-sidebar';
}

if ( ! isset( $layout_this ) || empty( $layout_this ) ): $layout_this = 'standard'; endif;
$class_layout = '';
if( $layout_this == 'classic' ): $class_layout = ' classic-layout'; endif;
?>

	<div class="container<?php echo esc_attr( $class_layout ); if ( goso_get_setting( 'goso_sidebar_home' ) ) : ?> goso_sidebar <?php echo esc_attr( $sidebar_position ); ?><?php endif; ?>">
		<div id="main" class="goso-layout-<?php echo esc_attr( $layout_this ); ?><?php if ( get_theme_mod( 'goso_sidebar_sticky' ) ): ?> goso-main-sticky-sidebar<?php endif; ?>">
			<div class="theiaStickySidebar">

				<?php
				/**
				 * Featured categories for magazine layouts
				 *
				 * @since 1.0
				 */
				if( ! get_theme_mod( 'goso_move_latest_posts_above' ) && ( ( get_theme_mod( 'goso_home_featured_cat' ) && ( $layout_this == 'magazine-1' || $layout_this == 'magazine-2' ) ) || get_theme_mod( 'goso_enable_featured_cat_all_layouts' ) ) ):
					get_template_part( 'inc/modules/featured-categories' );
				endif;
				?>

				<?php if( ! get_theme_mod( 'goso_hide_latest_post_homepage' ) ): ?>

					<?php
					$heading_widget_title = get_theme_mod( 'goso_sidebar_heading_style' ) ? get_theme_mod( 'goso_sidebar_heading_style' ) : 'style-1';
					$heading_widget_align = get_theme_mod( 'goso_sidebar_heading_align' ) ? get_theme_mod( 'goso_sidebar_heading_align' ) : 'pcalign-center';
					$heading_title        = get_theme_mod( 'goso_featured_cat_style' ) ? get_theme_mod( 'goso_featured_cat_style' ) : $heading_widget_title;
					$heading_align        = get_theme_mod( 'goso_heading_latest_align' ) ? get_theme_mod( 'goso_heading_latest_align' ) : $heading_widget_align;
					$sb_icon_pos          = get_theme_mod( 'goso_sidebar_icon_align' ) ? get_theme_mod( 'goso_sidebar_icon_align' ) : 'pciconp-right';
					$sidebar_icon_pos     = get_theme_mod( 'goso_homep_icon_align' ) ? get_theme_mod( 'goso_homep_icon_align' ) : $sb_icon_pos;
					$sb_icon_design       = get_theme_mod( 'goso_sidebar_icon_design' ) ? get_theme_mod( 'goso_sidebar_icon_design' ) : 'pcicon-right';
					$sidebar_icon_design  = get_theme_mod( 'goso_homep_icon_design' ) ? get_theme_mod( 'goso_homep_icon_design' ) : $sb_icon_design;
					?>

					<?php if ( get_theme_mod( 'goso_home_title' ) ) : ?>
                        <div class="goso-border-arrow goso-homepage-title goso-home-latest-posts <?php echo esc_attr( $heading_title . ' ' . $heading_align . ' ' . $sidebar_icon_pos . ' ' . $sidebar_icon_design ); ?>">
                            <h3 class="inner-arrow"><?php echo goso_get_setting( 'goso_home_title' ); ?></h3>
                        </div>
					<?php endif; ?>

                    <div class="goso-wrapper-posts-content">

						<?php  if (have_posts()) : ?>
							<?php if ( in_array( $layout_this, array(
								'standard',
								'classic',
								'overlay',
								'featured'
							) ) ): ?><div class="goso-wrapper-data"><?php endif; ?>
							<?php if ( in_array( $layout_this, array(
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
						) ) ) : ?>
                            <ul class="goso-wrapper-data goso-grid"><?php endif; ?>
							<?php if ( in_array( $layout_this, array( 'masonry', 'masonry-2' ) ) ) : ?>
                            <div class="goso-wrap-masonry">
                            <div class="goso-wrapper-data masonry goso-masonry"><?php endif; ?>

							<?php
							$infeed_ads = get_theme_mod( 'goso_infeedads_home_code' ) ? get_theme_mod( 'goso_infeedads_home_code' ) : '';
							$infeed_num = get_theme_mod( 'goso_infeedads_home_num' ) ? get_theme_mod( 'goso_infeedads_home_num' ) : 3;
							$infeed_full = get_theme_mod( 'goso_infeedads_home_layout' ) ? get_theme_mod( 'goso_infeedads_home_layout' ) : '';
							while ( have_posts() ) : the_post();
								include( locate_template( 'content-' . $layout_this . '.php' ) );
							endwhile;
							?>

							<?php if ( in_array( $layout_this, array( 'masonry', 'masonry-2' ) ) ) : ?></div>
                            </div><?php endif; ?>
							<?php if ( in_array( $layout_this, array(
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
						) ) ) : ?></ul><?php endif; ?>
							<?php if ( in_array( $layout_this, array(
								'standard',
								'classic',
								'overlay',
								'featured'
							) ) ): ?></div><?php endif; ?>

							<?php if ( get_theme_mod( 'goso_page_navigation_ajax' ) || get_theme_mod( 'goso_page_navigation_scroll' ) ) { ?>
								<?php
								$button_class = 'goso-ajax-more goso-ajax-home goso-ajax-more-click';
								if ( get_theme_mod( 'goso_page_navigation_scroll' ) ):
									$button_class = 'goso-ajax-more goso-ajax-home goso-ajax-more-scroll';
								endif;
								/* Get data template */
								$data_layout = $layout_this;
								if ( in_array( $layout_this, array(
									'standard-grid',
									'classic-grid',
									'overlay-grid'
								) ) ) {
									$data_layout = 'grid';
								} elseif ( in_array( $layout_this, array( 'standard-grid-2', 'classic-grid-2' ) ) ) {
									$data_layout = 'grid-2';
								} elseif ( in_array( $layout_this, array(
									'standard-list',
									'classic-list',
									'overlay-list'
								) ) ) {
									$data_layout = 'list';
								} elseif ( in_array( $layout_this, array( 'standard-boxed-1', 'classic-boxed-1' ) ) ) {
									$data_layout = 'boxed-1';
								} elseif ( in_array( $layout_this, array( 'mixed-3', 'mixed-4' ) ) ) {
									$data_layout = 'small-list';
								}

								$data_template = 'sidebar';

								if( ! goso_get_setting( 'goso_sidebar_home' ) ):
								$data_template = 'no-sidebar';
								endif;

								/* Get data offset */
								$offset_number = get_option('posts_per_page');
								if( get_theme_mod( 'goso_home_lastest_posts_numbers' ) && 0 != get_theme_mod( 'goso_home_lastest_posts_numbers' ) ):
									$offset_number = get_theme_mod( 'goso_home_lastest_posts_numbers' );
								endif;
								$num_load = 6;
								if( get_theme_mod( 'goso_number_load_more' ) && 0 != get_theme_mod( 'goso_number_load_more' ) ):
									$num_load = get_theme_mod( 'goso_number_load_more' );
								endif;
								?>
								<div class="goso-pagination <?php echo $button_class; ?>">
									<a class="goso-ajax-more-button" href="#" data-mes="<?php echo goso_get_setting('goso_trans_no_more_posts'); ?>" data-layout="<?php echo esc_attr( $data_layout ); ?>" data-number="<?php echo absint($num_load); ?>" data-offset="<?php echo absint($offset_number); ?>"
									   data-from="customize" data-template="<?php echo $data_template; ?>">
										<span class="ajax-more-text"><?php echo goso_get_setting('goso_trans_load_more_posts'); ?></span><span class="ajaxdot"></span><?php goso_fawesome_icon('fas fa-sync'); ?>
									</a>
								</div>
							<?php } else { ?>
							<?php goso_authow_pagination(); ?>
							<?php } ?>
						<?php endif; wp_reset_postdata(); /* End if of the loop */ ?>
					</div>
				<?php endif; /* End check if not hide latest on homepage */ ?>

				<?php
				/**
				 * Featured categories for magazine layouts
				 *
				 * @since 1.0
				 */
				if( get_theme_mod( 'goso_move_latest_posts_above' ) && ( ( get_theme_mod( 'goso_home_featured_cat' ) && ( $layout_this == 'magazine-1' || $layout_this == 'magazine-2' ) ) || get_theme_mod( 'goso_enable_featured_cat_all_layouts' ) ) ):
					get_template_part( 'inc/modules/featured-categories' );
				endif;
				?>

			</div>
		</div>

		<?php if ( goso_get_setting( 'goso_sidebar_home' ) ) : ?>
			<?php get_sidebar(); ?>
			<?php if ( get_theme_mod( "goso_two_sidebar_home" ) ) : get_sidebar( 'left' ); endif; ?>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>
