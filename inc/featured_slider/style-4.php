<?php
/**
 * Template part for Slider Style 4
 */

$feat_query = goso_get_query_featured_slider();
if ( ! $feat_query ) {
	return;
}
$slider_title_length = get_theme_mod( 'goso_slider_title_length' ) ? get_theme_mod( 'goso_slider_title_length' ) : 12;
$image_size          = get_theme_mod( 'featured_slider_imgsize' ) ? get_theme_mod( 'featured_slider_imgsize' ) : 'goso-magazine-slider';
$image_mobile_size = get_theme_mod( 'featured_slider_imgsize_mobile' ) ? get_theme_mod( 'featured_slider_imgsize_mobile' ) : 'goso-masonry-thumb';
?>
<?php if ( $feat_query->have_posts() ) : while ( $feat_query->have_posts() ) : $feat_query->the_post(); ?>
    <div class="item">
		<?php if ( ! get_theme_mod( 'goso_disable_lazyload_slider' ) ) { ?>
            <a class="goso-image-holder <?php echo goso_classes_slider_lazy(); ?>"
               data-bgset="<?php echo goso_image_srcset( get_the_ID(),$image_size,$image_mobile_size ); ?>"
               href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
		<?php } else { ?>
            <a class="goso-image-holder"
               style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), goso_is_mobile() ? $image_mobile_size : $image_size ); ?>');"
               href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
		<?php } ?>
        <div class="goso-slider4-overlay">
            <a class="overlay-link"
               aria-label="<?php echo wp_trim_words( wp_strip_all_tags( get_the_title() ), 6, '...' ); ?>"
               href="<?php the_permalink(); ?>"></a>
            <div class="goso-featured-content">
                <div class="feat-text<?php if ( get_theme_mod( 'goso_featured_meta_date' ) ): echo ' slider-hide-date'; endif; ?>">
                    <div class="featured-slider-overlay"></div>
					<?php if ( ! get_theme_mod( 'goso_featured_hide_categories' ) ): ?>
                        <div class="cat featured-cat"><?php goso_category( '' ); ?></div>
					<?php endif; ?>
                    <h3><a title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"
                           href="<?php the_permalink() ?>"><?php echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $slider_title_length, '...' ); ?></a>
                    </h3>
					<?php if ( ! get_theme_mod( 'goso_featured_meta_comment' ) || ! get_theme_mod( 'goso_featured_meta_date' ) || get_theme_mod( 'goso_featured_meta_author' ) ): ?>
                        <div class="feat-meta">
							<?php if ( get_theme_mod( 'goso_featured_meta_author' ) ): ?>
                                <span class="feat-author"><?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                            href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
							<?php endif; ?>
							<?php if ( ! get_theme_mod( 'goso_featured_meta_date' ) ): ?>
                                <span class="feat-time"><?php goso_authow_time_link(); ?></span>
							<?php endif; ?>
							<?php if ( ! get_theme_mod( 'goso_featured_meta_comment' ) ): ?>
                                <span class="feat-comments"><a
                                            href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a></span>
							<?php endif; ?>
                        </div>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile;
	wp_reset_postdata(); endif; ?>
