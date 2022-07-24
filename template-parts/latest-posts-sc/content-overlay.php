<?php
/**
 * Template loop for overlay style
 */
if ( ! isset ( $n ) ) {
	$n = 1;
} else {
	$n = $n;
}
$thumbbsize         = 'goso-full-thumb';
$goso_featimg_size = isset( $goso_featimg_size ) ? $goso_featimg_size : '';
if ( 'custom' == $goso_featimg_size ) {
	$thumb_bigsize = isset( $thumb_bigsize ) ? $thumb_bigsize : '';
	if ( $thumb_bigsize ) {
		$thumbbsize = $thumb_bigsize;
	}
}
?>
    <section class="grid-style grid-overlay">
        <article id="post-<?php the_ID(); ?>" class="item overlay-layout hentry">
            <div class="goso-overlay-over">
                <div class="thumbnail">
					<?php
					/* Display Review Piechart  */
					if ( function_exists( 'goso_display_piechart_review_html' ) ) {
						goso_display_piechart_review_html( get_the_ID() );
					}
					?>
					<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                        <a class="goso-image-holder goso-lazy"
                           data-bgset="<?php echo goso_image_srcset( get_the_ID(), $thumbbsize ); ?>"
                           href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                        </a>
					<?php } else { ?>
                        <a class="goso-image-holder"
                           style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $thumbbsize ); ?>');"
                           href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                        </a>
					<?php } ?>
                </div>

                <a class="overlay-border" href="<?php the_permalink() ?>"></a>

                <div class="overlay-header-box">
					<?php if ( 'yes' != $grid_cat ) : ?>
                        <span class="cat"><?php goso_category( '' ); ?></span>
					<?php endif; ?>

                    <h2 class="goso-entry-title entry-title overlay-title"><a
                                href="<?php the_permalink(); ?>"><?php goso_trim_post_title( get_the_ID(), $grid_title_length ); ?></a>
                    </h2>
					<?php goso_authow_meta_schema(); ?>
					<?php if ( 'yes' != $grid_author ) : ?>
                        <div class="goso-meta-author overlay-author byline"><span
                                    class="author-italic author vcard"><?php echo goso_get_setting( 'goso_trans_written_by' ); ?> <a
                                        class="url fn n"
                                        href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
                        </div>
					<?php endif; ?>
                </div>
            </div>

			<?php if ( 'yes' != $grid_date || 'yes' != $grid_comment || 'yes' != $grid_share_box || 'yes' == $grid_viewscount || goso_isshow_reading_time( $grid_readtime ) ) : ?>
                <div class="goso-post-box-meta grid-post-box-meta overlay-post-box-meta">
					<?php if ( 'yes' != $grid_date ) : ?>
                        <div class="overlay-share overlay-style-date"><?php goso_fawesome_icon( 'far fa-clock' ); ?><?php goso_authow_time_link(); ?></div>
					<?php endif; ?>
					<?php if ( 'yes' != $grid_comment ) : ?>
                        <div class="overlay-share overlay-style-comment"><a
                                    href="<?php comments_link(); ?> "><?php goso_fawesome_icon( 'far fa-comment' ); ?><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a>
                        </div>
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
                        <div class="overlay-share overlay-style-readtime"><?php goso_reading_time(); ?></div>
					<?php endif; ?>
					<?php if ( 'yes' != $grid_share_box ) : ?>
                        <div class="goso-post-share-box">
							<?php echo goso_getPostLikeLink( get_the_ID() ); ?>
							<?php goso_authow_social_share(); ?>
                        </div>
					<?php endif; ?>
                </div>
			<?php endif; ?>

        </article>
    </section>
<?php
if ( isset( $infeed_ads ) && $infeed_ads ) {
	goso_get_markup_infeed_ad(
		array(
			'wrapper'    => 'section',
			'classes'    => 'grid-style grid-overlay goso-infeed-data goso-infeed-vcele',
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
