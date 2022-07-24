<?php
/**
 * Template part for Slider Style 38
 */

$post_thumb_size = ! empty( $post_thumb_size ) ? $post_thumb_size : 'goso-thumb-vertical';
$goso_is_mobile = goso_is_mobile();
if ( $goso_is_mobile ) {
	$post_thumb_size = ! empty( $post_thumb_size_mobile ) ? $post_thumb_size_mobile : 'goso-masonry-thumb';
}
?>
<?php if ( $feat_query->have_posts() ) : while ( $feat_query->have_posts() ) : $feat_query->the_post(); ?>
    <div class="item">
        <a class="goso-slider38-overlay" href="<?php the_permalink(); ?>"></a>
        <a class="goso-image-holder"
           style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $post_thumb_size ); ?>');"
           href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
        </a>
		<?php if ( ! $center_box ): ?>
            <div class="goso-featured-content">
                <div class="feat-text<?php if ( $meta_date_hide ): echo ' slider-hide-date'; endif; ?>">
					<?php if ( ! $hide_categories ): ?>
                        <div class="cat featured-cat"><?php goso_category( '' ); ?></div>
					<?php endif; ?>
                    <h3><a href="<?php the_permalink() ?>"
                           title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"><?php echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $slider_title_length, '...' ); ?></a>
                    </h3>
					<?php if ( ( get_the_excerpt() && ! $hide_meta_excerpt ) || ! $hide_meta_comment || ! $meta_date_hide || $show_meta_author ): ?>
                        <div class="feat-meta">
							<?php if ( $show_meta_author ): ?>
                                <span class="feat-author"><?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                            href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
							<?php endif; ?>
							<?php if ( ! $meta_date_hide ): ?>
                                <span class="feat-time"><?php goso_authow_time_link(); ?></span>
							<?php endif; ?>
							<?php if ( ! $hide_meta_comment ): ?>
                                <span class="feat-comments"><a
                                            href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a></span>
							<?php endif; ?>
							<?php if ( get_the_excerpt() && ! $hide_meta_excerpt ): ?>
                                <div class="featured-slider-excerpt"><p><?php $excerpt = get_the_excerpt();
										echo wp_trim_words( $excerpt, 20, '...' ); ?></p></div>
							<?php endif; ?>
                        </div>
					<?php endif; ?>
                    <div class="goso-featured-slider-button">
                        <a href="<?php the_permalink() ?>"><?php echo goso_get_setting( 'goso_trans_read_more' ); ?></a>
                    </div>
                </div>
            </div>
		<?php endif; ?>
    </div>
<?php endwhile;
	wp_reset_postdata(); endif; ?>
