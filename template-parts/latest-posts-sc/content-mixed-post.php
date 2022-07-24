<?php
/**
 * Template loop for mixed style
 */
if ( ! isset ( $n ) ) {
	$n = 1;
} else {
	$n = $n;
}
$goso_featimg_size = isset( $goso_featimg_size ) ? $goso_featimg_size : '';
$thumb_bigsize      = isset( $thumb_bigsize ) ? $thumb_bigsize : '';
?>
    <div class="grid-style grid-mixed">
        <article id="post-<?php the_ID(); ?>" class="item hentry">

			<?php if ( has_post_thumbnail() ) : ?>
                <div class="thumbnail thumb-left">
					<?php
					/* Display Review Piechart  */
					if ( function_exists( 'goso_display_piechart_review_html' ) ) {
						goso_display_piechart_review_html( get_the_ID() );
					}
					?>
					<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                        <a class="goso-image-holder goso-lazy<?php echo goso_class_lightbox_enable(); ?>"
                           data-bgset="<?php echo goso_image_srcset( get_the_ID(), goso_featured_images_size_vcel( 'large', $goso_featimg_size, $thumb_bigsize ) ); ?>"
                           href="<?php goso_permalink_fix(); ?>" title="<?php echo
						wp_strip_all_tags(
							get_the_title() ); ?>">
                        </a>
					<?php } else { ?>
                        <a class="goso-image-holder<?php echo goso_class_lightbox_enable(); ?>"
                           style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), goso_featured_images_size_vcel( 'large', $goso_featimg_size, $thumb_bigsize ) ); ?>');"
                           href="<?php goso_permalink_fix(); ?>" title="<?php
						echo wp_strip_all_tags
						( get_the_title() ); ?>">
                        </a>
					<?php } ?>
                </div>
			<?php endif; ?>

            <div class="mixed-detail">
                <div class="grid-header-box">
					<?php if ( 'yes' != $grid_cat ) : ?>
                        <span class="cat"><?php goso_category( '' ); ?></span>
					<?php endif; ?>
                    <h2 class="goso-entry-title entry-title grid-title"><a
                                href="<?php the_permalink(); ?>"><?php goso_trim_post_title( get_the_ID(), $grid_title_length ); ?></a>
                    </h2>
					<?php goso_authow_meta_schema(); ?>
					<?php if ( 'yes' != $grid_date || 'yes' != $grid_author || 'yes' == $grid_viewscount || goso_isshow_reading_time( $grid_readtime ) ) : ?>
                        <div class="grid-post-box-meta">
							<?php if ( 'yes' != $grid_author ) : ?>
                                <span class="author-italic author vcard"><?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                            class="url fn n"
                                            href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
							<?php endif; ?>
							<?php if ( 'yes' != $grid_date ) : ?>
                                <span><?php goso_authow_time_link(); ?></span>
							<?php endif; ?>
							<?php
							if ( 'yes' == $grid_viewscount ) {
								echo '<span>';
								echo goso_get_post_views( get_the_ID() );
								echo ' ' . goso_get_setting( 'goso_trans_countviews' );
								echo '</span>';
							}
							?>
							<?php if ( goso_isshow_reading_time( $grid_readtime ) ): ?>
                                <span class="otherl-readtime"><?php goso_reading_time(); ?></span>
							<?php endif; ?>
                        </div>
					<?php endif; ?>
                </div>

				<?php if ( get_the_excerpt() && 'yes' != $grid_remove_excerpt ): ?>
                    <div class="item-content entry-content">
						<?php goso_the_excerpt( $grid_excerpt_length ); ?>
                    </div>
				<?php endif; ?>

				<?php if ( 'yes' == $grid_add_readmore ):
					$class_button = '';
					if ( 'yes' == $grid_remove_arrow ): $class_button .= ' goso-btn-remove-arrow'; endif;
					if ( 'yes' == $grid_readmore_button ): $class_button .= ' goso-btn-make-button'; endif;
					if ( $grid_readmore_align ): $class_button .= ' goso-btn-align-' . $grid_readmore_align; endif;
					?>
                    <div class="goso-readmore-btn<?php echo $class_button; ?>">
                        <a class="goso-btn-readmore"
                           href="<?php the_permalink(); ?>"><?php echo goso_get_setting( 'goso_trans_read_more' ); ?><?php goso_fawesome_icon( 'fas fa-angle-double-right' ); ?></a>
                    </div>
				<?php endif; ?>

				<?php if ( 'yes' != $grid_share_box || 'yes' != $grid_comment ) : ?>
                    <div class="goso-post-box-meta<?php if ( 'yes' == $grid_share_box || 'yes' == $grid_comment ): echo ' center-inner'; endif; ?>">
						<?php if ( 'yes' != $grid_comment ) : ?>
                            <div class="goso-box-meta">
                                <span><a href="<?php comments_link(); ?> "><?php goso_fawesome_icon( 'far fa-comment' ); ?><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a></span>
                            </div>
						<?php endif; ?>
						<?php if ( 'yes' != $grid_share_box ) : ?>
                            <div class="goso-post-share-box">
								<?php echo goso_getPostLikeLink( get_the_ID() ); ?>
								<?php goso_authow_social_share(); ?>
                            </div>
						<?php endif; ?>
                    </div>
				<?php endif; ?>
            </div>

			<?php if ( has_post_thumbnail() ) : ?>
                <div class="thumbnail thumb-right">
					<?php
					/* Display Review Piechart  */
					if ( function_exists( 'goso_display_piechart_review_html' ) ) {
						goso_display_piechart_review_html( get_the_ID() );
					}
					?>
					<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                        <a class="goso-image-holder goso-lazy<?php echo goso_class_lightbox_enable(); ?>"
                           data-bgset="<?php echo goso_image_srcset( get_the_ID(), goso_featured_images_size_vcel( 'large', $goso_featimg_size, $thumb_bigsize ) ); ?>"
                           href="<?php goso_permalink_fix(); ?>" title="<?php echo wp_strip_all_tags(
							get_the_title() ); ?>">
                        </a>
					<?php } else { ?>
                        <a class="goso-image-holder<?php echo goso_class_lightbox_enable(); ?>"
                           style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), goso_featured_images_size_vcel( 'large', $goso_featimg_size, $thumb_bigsize ) ); ?>');"
                           href="<?php goso_permalink_fix(); ?>"
                           title="<?php echo
						   wp_strip_all_tags( get_the_title() ); ?>">
                        </a>
					<?php } ?>
                </div>
			<?php endif; ?>

        </article>
    </div>
<?php
if ( isset( $infeed_ads ) && $infeed_ads ) {
	goso_get_markup_infeed_ad(
		array(
			'wrapper'    => 'div',
			'classes'    => 'grid-style grid-mixed goso-infeed-data goso-infeed-vcele',
			'fullwidth'  => $infeed_full,
			'order_ad'   => $infeed_num,
			'order_post' => $n,
			'code'       => $infeed_ads,
			'echo'       => true
		)
	);
}
?>
<?php $n ++; ?>
