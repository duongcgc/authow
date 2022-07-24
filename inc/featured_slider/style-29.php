<?php
/**
 * Template part for Slider Style 29
 */

$feat_query = goso_get_query_featured_slider();
if ( ! $feat_query ) {
	return;
}
$slider_title_length = get_theme_mod( 'goso_slider_title_length' ) ? get_theme_mod( 'goso_slider_title_length' ) : 20;
$image_size          = get_theme_mod( 'featured_slider_imgsize' ) ? get_theme_mod( 'featured_slider_imgsize' ) : 'goso-slider-full-thumb';

	$image_size_m = get_theme_mod( 'featured_slider_imgsize_mobile' ) ? get_theme_mod( 'featured_slider_imgsize_mobile' ) : 'goso-masonry-thumb';

?>
<?php if ( $feat_query->have_posts() ) : while ( $feat_query->have_posts() ) : $feat_query->the_post(); ?>
    <div class="item">
		<?php if ( ! get_theme_mod( 'goso_disable_lazyload_slider' ) ) { ?>
            <a class="goso-image-holder <?php echo goso_classes_slider_lazy(); ?>"
               data-bgset="<?php echo goso_image_srcset( get_the_ID(), $image_size,$image_size_m ); ?>"
               href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
		<?php } else { ?>
            <a class="goso-image-holder"
               style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), goso_is_mobile() ? $image_size_m : $image_size ); ?>');"
               href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
		<?php } ?>
        <a href="<?php the_permalink() ?>" class="featured-slider-overlay"></a>
		<?php if ( ! get_theme_mod( 'goso_featured_center_box' ) ): ?>
            <div class="goso-featured-content">
                <div class="feat-text<?php if ( get_theme_mod( 'goso_featured_meta_date' ) ): echo ' slider-hide-date'; endif; ?>">
					<?php if ( ! get_theme_mod( 'goso_featured_hide_categories' ) ): ?>
                        <div class="cat featured-cat"><?php goso_category( '' ); ?></div>
					<?php endif; ?>
                    <h3><a title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"
                           href="<?php the_permalink() ?>"><?php echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $slider_title_length, '...' ); ?></a>
                    </h3>
                    <div class="goso-featured-slider-button">
                        <a href="<?php the_permalink() ?>"><?php echo goso_get_setting( 'goso_trans_read_more' ); ?></a>
                    </div>
                </div>
            </div>
		<?php endif; ?>
    </div>
<?php endwhile;
	wp_reset_postdata(); endif; ?>
