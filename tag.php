<?php
/**
 * The template for displaying tag pages.
 *
 * @package Wordpress
 * @since 1.0
 */
get_header();

/* Sidebar position */
$sidebar_position = goso_get_sidebar_position_archive();

/* Tag layout */
$layout_this = get_theme_mod( 'goso_archive_layout' );
if ( ! isset( $layout_this ) || empty( $layout_this ) ): $layout_this = 'standard'; endif;
$class_layout = '';
if ( $layout_this == 'classic' ): $class_layout = ' classic-layout'; endif;
$two_sidebar_class = '';
if ( 'two-sidebar' == $sidebar_position ): $two_sidebar_class = ' two-sidebar'; endif;
$archive_desc_align = get_theme_mod( 'goso_archive_descalign', '' );
if ( $archive_desc_align ) {
	$archive_desc_align = ' pcdesc-' . $archive_desc_align;
}
?>

<?php if ( ! get_theme_mod( 'goso_disable_breadcrumb' ) && ! get_theme_mod( 'goso_move_breadcrumbs' ) ): ?>
	<?php
	$yoast_breadcrumb = '';
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		$yoast_breadcrumb = yoast_breadcrumb( '<div class="container goso-breadcrumb' . $two_sidebar_class . '">', '</div>', false );
	}

	if ( $yoast_breadcrumb ) {
		echo $yoast_breadcrumb;
	} else { ?>
        <div class="container goso-breadcrumb<?php echo $two_sidebar_class; ?>">
            <span><a class="crumb"
                     href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo goso_get_setting( 'goso_trans_home' ); ?></a></span><?php goso_fawesome_icon( 'fas fa-angle-right' ); ?>
            <span><?php echo goso_get_setting( 'goso_trans_tags' ); ?></span><?php goso_fawesome_icon( 'fas fa-angle-right' ); ?>
            <span><?php printf( goso_get_setting( 'goso_trans_posts_tagged' ) . ' "%s"', single_tag_title( '', false ) ); ?></span>
        </div>
	<?php } ?>
<?php endif; ?>

<?php if ( goso_featured_exclude_posts() ): ?>

    <div class="archive-box">
        <div class="title-bar">
			<?php if ( ! get_theme_mod( 'goso_remove_tag_words' ) ): ?>
                <span><?php echo goso_get_setting( 'goso_trans_tag' ); ?> </span><?php endif; ?>
            <h1><?php printf( esc_html__( '%s', 'authow' ), single_tag_title( '', false ) ); ?></h1>
        </div>
    </div>

	<?php if ( tag_description() && ! get_theme_mod( 'goso_archive_move_desc' ) ) : // Show an optional tag description ?>
        <div class="container <?php echo $two_sidebar_class; ?>">
            <div class="goso-category-description<?php echo $archive_desc_align; ?>"><?php echo do_shortcode( tag_description() ); ?></div>
        </div>
	<?php endif; ?>

<?php endif; ?>

<?php do_action( 'goso_featured_archive_posts' ); ?>

<div class="container<?php echo esc_attr( $class_layout );
if ( goso_get_setting( 'goso_sidebar_archive' ) ) : ?> goso_sidebar <?php echo esc_attr( $sidebar_position ); ?><?php endif; ?>">
    <div id="main"
         class="goso-layout-<?php echo esc_attr( $layout_this ); ?><?php if ( get_theme_mod( 'goso_sidebar_sticky' ) ): ?> goso-main-sticky-sidebar<?php endif; ?>">
        <div class="theiaStickySidebar">

			<?php if ( ! get_theme_mod( 'goso_disable_breadcrumb' ) && get_theme_mod( 'goso_move_breadcrumbs' ) ): ?>
				<?php
				$yoast_breadcrumb = '';
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					$yoast_breadcrumb = yoast_breadcrumb( '<div class="container goso-breadcrumb goso-crumb-inside' . $two_sidebar_class . '">', '</div>', false );
				}

				if ( $yoast_breadcrumb ) {
					echo $yoast_breadcrumb;
				} else { ?>
                    <div class="container goso-breadcrumb goso-crumb-inside<?php echo $two_sidebar_class; ?>">
                            <span><a class="crumb"
                                     href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo goso_get_setting( 'goso_trans_home' ); ?></a></span><?php goso_fawesome_icon( 'fas fa-angle-right' ); ?>
                        <span><?php echo goso_get_setting( 'goso_trans_tags' ); ?></span><?php goso_fawesome_icon( 'fas fa-angle-right' ); ?>
                        <span><?php printf( goso_get_setting( 'goso_trans_posts_tagged' ) . ' "%s"', single_tag_title( '', false ) ); ?></span>
                    </div>
				<?php } ?>
			<?php endif; ?>

			<?php if ( ! goso_featured_exclude_posts() ) { ?>

                <div class="archive-box">
                    <div class="title-bar">
						<?php if ( ! get_theme_mod( 'goso_remove_tag_words' ) ): ?>
                            <span><?php echo goso_get_setting( 'goso_trans_tag' ); ?> </span><?php endif; ?>
                        <h1><?php printf( esc_html__( '%s', 'authow' ), single_tag_title( '', false ) ); ?></h1>
                    </div>
                </div>

				<?php if ( tag_description() && ! get_theme_mod( 'goso_archive_move_desc' ) ) : // Show an optional tag description ?>
                    <div class="goso-category-description<?php echo $archive_desc_align; ?>"><?php echo do_shortcode( tag_description() ); ?></div>
				<?php endif; ?>

			<?php } else {
				$format_title = goso_get_setting( 'goso_arf_title' );
				if ( $format_title && ! goso_featured_title_check() ) {
					$heading_widget_title = get_theme_mod( 'goso_sidebar_heading_style' ) ? get_theme_mod( 'goso_sidebar_heading_style' ) : 'style-1';
					$heading_widget_align = get_theme_mod( 'goso_sidebar_heading_align' ) ? get_theme_mod( 'goso_sidebar_heading_align' ) : 'pcalign-center';
					$heading_title        = get_theme_mod( 'goso_featured_cat_style' ) ? get_theme_mod( 'goso_featured_cat_style' ) : $heading_widget_title;
					$heading_align        = get_theme_mod( 'goso_featured_cat_align' ) ? get_theme_mod( 'goso_featured_cat_align' ) : $heading_widget_align;
					$sb_icon_pos          = get_theme_mod( 'goso_sidebar_icon_align' ) ? get_theme_mod( 'goso_sidebar_icon_align' ) : 'pciconp-right';
					$sidebar_icon_pos     = get_theme_mod( 'goso_homep_icon_align' ) ? get_theme_mod( 'goso_homep_icon_align' ) : $sb_icon_pos;
					$sb_icon_design       = get_theme_mod( 'goso_sidebar_icon_design' ) ? get_theme_mod( 'goso_sidebar_icon_design' ) : 'pcicon-right';
					$sidebar_icon_design  = get_theme_mod( 'goso_homep_icon_design' ) ? get_theme_mod( 'goso_homep_icon_design' ) : $sb_icon_design;
					$heading_title        = get_theme_mod( 'goso_arf_title_style', $heading_title );
					?>
                    <div class="featured-list-title goso-border-arrow goso-homepage-title goso-magazine-title <?php echo esc_attr( $heading_title . ' ' . $heading_align . ' ' . $sidebar_icon_pos . ' ' . $sidebar_icon_design ); ?>">
                        <h2 class="inner-arrow">
							<?php
							echo str_replace( '{name}', single_tag_title( '', false ), $format_title );
							?>
                        </h2>
                    </div>

				<?php }
			} ?>

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

				if ( in_array( $layout_this, $class_grid_arr ) ) {
					echo '<ul class="goso-wrapper-data goso-grid">';
				} elseif ( in_array( $layout_this, array( 'masonry', 'masonry-2' ) ) ) {
					echo '<div class="goso-wrap-masonry"><div class="goso-wrapper-data masonry goso-masonry">';
				} elseif ( get_theme_mod( 'goso_archive_nav_ajax' ) || get_theme_mod( 'goso_archive_nav_scroll' ) ) {
					echo '<div class="goso-wrapper-data">';
				}

				$infeed_ads  = get_theme_mod( 'goso_infeedads_archi_code' ) ? get_theme_mod( 'goso_infeedads_archi_code' ) : '';
				$infeed_num  = get_theme_mod( 'goso_infeedads_archi_num' ) ? get_theme_mod( 'goso_infeedads_archi_num' ) : 3;
				$infeed_full = get_theme_mod( 'goso_infeedads_archi_layout' ) ? get_theme_mod( 'goso_infeedads_archi_layout' ) : '';

				while ( have_posts() ) : the_post();
					include( locate_template( 'content-' . $layout_this . '.php' ) );
				endwhile;

				if ( in_array( $layout_this, $class_grid_arr ) ) {
					echo '</ul>';
				} elseif ( in_array( $layout_this, array( 'masonry', 'masonry-2' ) ) ) {
					echo '</div></div>';
				} elseif ( get_theme_mod( 'goso_archive_nav_ajax' ) || get_theme_mod( 'goso_archive_nav_scroll' ) ) {
					echo '</div>';
				}
				goso_authow_archive_pag_style( $layout_this );
				?>
			<?php endif;
			wp_reset_postdata(); /* End if of the loop */ ?>

			<?php if ( tag_description() && get_theme_mod( 'goso_archive_move_desc' ) ) : // Show an optional tag description ?>
                <div class="goso-category-description goso-acdes-below<?php echo $archive_desc_align; ?>"><?php echo do_shortcode( tag_description() ); ?></div>
			<?php endif; ?>

			<?php echo goso_render_google_adsense( 'goso_archive_ad_below' ); ?>

        </div>
    </div>

	<?php if ( goso_get_setting( 'goso_sidebar_archive' ) ) : ?>
		<?php get_sidebar(); ?>
		<?php if ( get_theme_mod( 'goso_two_sidebar_archive' ) ) : get_sidebar( 'left' ); endif; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
