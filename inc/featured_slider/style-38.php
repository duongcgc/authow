<?php
/**
 * Template part for Slider Style 38
 */

$feat_query = goso_get_query_featured_slider();
if ( ! $feat_query ) {
	return;
}
$slider_title_length = get_theme_mod( 'goso_slider_title_length' ) ? get_theme_mod( 'goso_slider_title_length' ) : 12;
$image_size = get_theme_mod( 'featured_slider_imgsize' ) ? get_theme_mod( 'featured_slider_imgsize' ) : 'goso-thumb-vertical';
if( goso_is_mobile() ){
	$image_size = get_theme_mod( 'featured_slider_imgsize_mobile' ) ? get_theme_mod( 'featured_slider_imgsize_mobile' ) : 'goso-masonry-thumb';
}
?>
<?php if ( $feat_query->have_posts() ) : while ( $feat_query->have_posts() ) : $feat_query->the_post(); ?>
	<div class="item">
		<a class="goso-slider38-overlay" aria-label="<?php echo wp_strip_all_tags( get_the_title() ); ?>" href="<?php the_permalink(); ?>"></a>
		<a class="goso-image-holder" style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $image_size ); ?>');" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
		
		<?php if ( ! get_theme_mod( 'goso_featured_center_box' ) ): ?>
			<div class="goso-featured-content">
				<div class="feat-text<?php if ( get_theme_mod( 'goso_featured_meta_date' ) ): echo ' slider-hide-date'; endif;?>">
					<?php if ( ! get_theme_mod( 'goso_featured_hide_categories' ) ): ?>
						<div class="cat featured-cat"><?php goso_category( '' ); ?></div>
					<?php endif; ?>
					<h3><a href="<?php the_permalink() ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"><?php echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $slider_title_length, '...' ); ?></a></h3>
					<?php if( ( get_the_excerpt() && ! get_theme_mod( 'goso_featured_meta_excerpt' ) ) || ! get_theme_mod( 'goso_featured_meta_comment' ) || ! get_theme_mod( 'goso_featured_meta_date' ) || get_theme_mod( 'goso_featured_meta_author' ) ): ?>
						<div class="feat-meta">
							<?php if ( get_theme_mod( 'goso_featured_meta_author' ) ): ?>
								<span class="feat-author"><?php echo goso_get_setting('goso_trans_by'); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
							<?php endif; ?>
							<?php if ( ! get_theme_mod( 'goso_featured_meta_date' ) ): ?>
								<span class="feat-time"><?php goso_authow_time_link(); ?></span>
							<?php endif; ?>
							<?php if ( ! get_theme_mod( 'goso_featured_meta_comment' ) ): ?>
								<span class="feat-comments"><a href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 '. goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a></span>
							<?php endif; ?>
							<?php if( get_the_excerpt() && ! get_theme_mod( 'goso_featured_meta_excerpt' ) ): ?>
								<div class="featured-slider-excerpt"><p><?php $excerpt = get_the_excerpt(); echo wp_trim_words( $excerpt, 20, '...' ); ?></p></div>
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
<?php endwhile; wp_reset_postdata(); endif; ?>
