<?php
/**
 * Template loop for typography style
 */
if ( ! isset ( $n ) ) {
	$n = 1;
} else {
	$n = $n;
}
$goso_featimg_size = isset( $goso_featimg_size ) ? $goso_featimg_size : '';
$thumb_size         = isset( $thumb_size ) ? $thumb_size : '';
?>
    <li class="grid-style grid-2-style typography-style">
        <article id="post-<?php the_ID(); ?>" class="item hentry">

            <div class="thumbnail">
				<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                    <a class="goso-image-holder goso-lazy"
                       data-bgset="<?php echo goso_image_srcset( get_the_ID(), goso_featured_images_size_vcel( 'normal', $goso_featimg_size, $thumb_size ) ); ?>"
                       href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                    </a>
				<?php } else { ?>
                    <a class="goso-image-holder"
                       style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), goso_featured_images_size_vcel( 'normal', $goso_featimg_size, $thumb_size ) ); ?>');"
                       href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                    </a>
				<?php } ?>

                <div class="content-typography">
                    <a href="<?php the_permalink(); ?>" class="overlay-typography"></a>
                    <div class="main-typography">
						<?php if ( 'yes' != $grid_cat ) : ?>
                            <span class="cat"><?php goso_category( '' ); ?></span>
						<?php endif; ?>

                        <h2 class="entry-title grid-title"><a
                                    href="<?php the_permalink(); ?>"><?php goso_trim_post_title( get_the_ID(), $grid_title_length ); ?></a>
                        </h2>
						<?php goso_authow_meta_schema(); ?>

						<?php if ( 'yes' != $grid_date || 'yes' != $grid_author || 'yes' == $grid_viewscount || 'yes' == $grid_comment_other || goso_isshow_reading_time( $grid_readtime ) ) : ?>
                            <div class="grid-post-box-meta">
								<?php if ( 'yes' != $grid_author ) : ?>
                                    <span class="otherl-date-author author-italic author vcard"><?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                                class="url fn n"
                                                href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
								<?php endif; ?>
								<?php if ( 'yes' != $grid_date ) : ?>
                                    <span class="otherl-date"><?php goso_authow_time_link(); ?></span>
								<?php endif; ?>
								<?php if ( 'yes' == $grid_comment_other ) : ?>
                                    <span class="otherl-comment"><a
                                                href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a></span>
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
                </div>
            </div>

        </article>
    </li>
<?php
if ( isset( $infeed_ads ) && $infeed_ads ) {
	goso_get_markup_infeed_ad(
		array(
			'wrapper'    => 'li',
			'classes'    => 'grid-style grid-2-style typography-style goso-infeed-data goso-infeed-vcele',
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
