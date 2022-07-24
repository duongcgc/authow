<?php
/**
 * Template part for Slider Style 30
 */

$post_thumb_size = ! empty( $post_thumb_size ) ? $post_thumb_size : 'goso-slider-thumb';
$goso_is_mobile = goso_is_mobile();

$post_thumb_msize = ! empty( $post_thumb_size_mobile ) ? $post_thumb_size_mobile : 'goso-masonry-thumb';

?>
<?php if ( $feat_query->have_posts() ) : while ( $feat_query->have_posts() ) : $feat_query->the_post(); ?>
    <div class="item">
		<?php if ( ! $disable_lazyload ) { ?>
            <a class="goso-image-holder <?php echo goso_classes_slider_lazy(); ?>"
               data-bgset="<?php echo goso_image_srcset( get_the_ID(), $post_thumb_size,$post_thumb_msize ); ?>"
               href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
		<?php } else { ?>
            <a class="goso-image-holder"
               style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $goso_is_mobile ? $post_thumb_msize : $post_thumb_size ); ?>');"
               href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
		<?php } ?>

        <a href="<?php the_permalink() ?>" class="featured-slider-overlay"></a>
		<?php if ( ! $center_box ): ?>
            <div class="goso-featured-content">
                <div class="feat-text<?php if ( $meta_date_hide ): echo ' slider-hide-date'; endif; ?>">
					<?php if ( ! $hide_categories ): ?>
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
