<?php
/**
 * Template part for Slider Style 20
 */

$post_thumb_size  = ! empty( $post_thumb_size ) ? $post_thumb_size : 'goso-thumb';
$bpost_thumb_size = ! empty( $bpost_thumb_size ) ? $bpost_thumb_size : 'goso-magazine-slider';
$goso_is_mobile  = goso_is_mobile();
?>
<?php if ( $feat_query->have_posts() ) : ?>
    <div class="item">
        <div class="wrapper-item wrapper-item-classess">
			<?php $i   = 1;
			$num_posts = $feat_query->post_count;
			while ( $feat_query->have_posts() ) : $feat_query->the_post();
				$thumb = $post_thumb_size;
				if ( $i % 5 == 1 || $i % 5 == 2 ): $thumb = $bpost_thumb_size; endif;

					$thumb_mobile = ! empty( $post_thumb_size_mobile ) ? $post_thumb_size_mobile : 'goso-masonry-thumb';

				?>
                <div class="goso-item-mag goso-item-<?php echo( $i % 5 ); ?> <?php echo( ( $i % 5 == 1 || $i % 5 == 2 ) ? 'goso-pitem-big' : 'goso-pitem-small' ) ?>">
					<?php if ( ! $disable_lazyload ) { ?>
                        <a class="goso-image-holder <?php echo goso_classes_slider_lazy(); ?>"
                           data-bgset="<?php echo goso_image_srcset( get_the_ID(),$thumb,$thumb_mobile ); ?>"
                           href="<?php the_permalink(); ?>"
                           title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
					<?php } else { ?>
                        <a class="goso-image-holder"
                           style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $goso_is_mobile ? $thumb_mobile : $thumb ); ?>');"
                           href="<?php the_permalink(); ?>"
                           title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
					<?php } ?>

                    <div class="goso-slide-overlay goso-slider6-overlay">
                        <a class="overlay-link"
                           aria-label="<?php echo wp_trim_words( wp_strip_all_tags( get_the_title() ), 6, '...' ); ?>"
                           href="<?php the_permalink(); ?>"></a>
						<?php if ( ! $hide_format_icons && ( has_post_format( 'video' ) || has_post_format( 'audio' ) || has_post_format( 'link' ) || has_post_format( 'quote' ) || has_post_format( 'gallery' ) ) ): ?>
                            <a href="<?php the_permalink(); ?>"
                               class="overlay-icon-format <?php if ( $i % 5 == 1 || $i % 5 == 2 ): echo ' lager-size-icon'; endif; ?>">
								<?php if ( has_post_format( 'video' ) ) : ?>
									<?php goso_fawesome_icon( 'fas fa-play' ); ?>
								<?php endif; ?>
								<?php if ( has_post_format( 'audio' ) ) : ?>
									<?php goso_fawesome_icon( 'fas fa-music' ); ?>
								<?php endif; ?>
								<?php if ( has_post_format( 'link' ) ) : ?>
									<?php goso_fawesome_icon( 'fas fa-link' ); ?>
								<?php endif; ?>
								<?php if ( has_post_format( 'quote' ) ) : ?>
									<?php goso_fawesome_icon( 'fas fa-quote-left' ); ?>
								<?php endif; ?>
								<?php if ( has_post_format( 'gallery' ) ) : ?>
									<?php goso_fawesome_icon( 'far fa-image' ); ?>
								<?php endif; ?>
                            </a>
						<?php endif; ?>
                        <div class="goso-mag-featured-content">
                            <div class="feat-text<?php if ( $meta_date_hide ): echo ' slider-hide-date'; endif; ?>">
								<?php if ( ! $hide_categories && $show_cat ): ?>
                                    <div class="cat featured-cat"><?php goso_category( '' ); ?></div>
								<?php endif; ?>
                                <h3><a title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"
                                       href="<?php the_permalink() ?>"><?php echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $slider_title_length, '...' ); ?></a>
                                </h3>
								<?php if ( ! $hide_meta_comment || ! $meta_date_hide || $show_viewscount || $show_meta_author ): ?>
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
										<?php
										if ( $show_viewscount ) {
											echo '<span class="feat-countviews">';
											echo goso_get_post_views( get_the_ID() );
											echo ' ' . goso_get_setting( 'goso_trans_countviews' );
											echo '</span>';
										}
										?>
                                    </div>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

				<?php if ( $i % 5 == 0 && $i > 1 && $i < $num_posts ): echo '</div></div><div class="item"><div class="wrapper-item wrapper-item-classess">'; endif; ?>

				<?php $i ++; endwhile;
			wp_reset_postdata(); ?>
        </div>
    </div>
<?php endif; ?>
