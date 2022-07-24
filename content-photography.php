<?php
/**
 * Template loop for typography style
 */
if ( ! isset ( $j ) ) {
	$j = 1;
} else {
	$j = $j;
}
?>
<li class="grid-style grid-2-style typography-style">
    <article id="post-<?php the_ID(); ?>" class="item hentry">

        <div class="thumbnail">
			<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                <a class="goso-image-holder goso-lazy"
                   data-bgset="<?php echo goso_image_srcset( get_the_ID(), goso_featured_images_size() ); ?>"
                   href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                </a>
			<?php } else { ?>
                <a class="goso-image-holder"
                   style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), goso_featured_images_size() ); ?>');"
                   href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                </a>
			<?php } ?>

            <div class="content-typography">
                <a href="<?php the_permalink(); ?>" class="overlay-typography"></a>
                <div class="main-typography">
					<?php if ( ! get_theme_mod( 'goso_grid_cat' ) ) : ?>
                        <span class="cat"><?php goso_category( '' ); ?></span>
					<?php endif; ?>

                    <h2 class="entry-title grid-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
					<?php goso_authow_meta_schema(); ?>

					<?php $hide_readtime = get_theme_mod( 'goso_grid_readingtime' ); ?>
					<?php if ( ! get_theme_mod( 'goso_grid_date' ) || ! get_theme_mod( 'goso_grid_author' ) || get_theme_mod( 'goso_grid_countviews' ) || get_theme_mod( 'goso_grid_comment_other' ) || goso_isshow_reading_time( $hide_readtime ) ) : ?>
                        <div class="grid-post-box-meta">
							<?php if ( ! get_theme_mod( 'goso_grid_author' ) ) : ?>
                                <span class="otherl-date-author author-italic author vcard"><?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                            class="url fn n"
                                            href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
							<?php endif; ?>
							<?php if ( ! get_theme_mod( 'goso_grid_date' ) ) : ?>
                                <span class="otherl-date"><?php goso_authow_time_link(); ?></span>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'goso_grid_comment_other' ) ) : ?>
                                <span class="otherl-comment"><a
                                            href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a></span>
							<?php endif; ?>
							<?php
							if ( get_theme_mod( 'goso_grid_countviews' ) ) {
								echo '<span>';
								echo goso_get_post_views( get_the_ID() );
								echo ' ' . goso_get_setting( 'goso_trans_countviews' );
								echo '</span>';
							}
							?>
							<?php if ( goso_isshow_reading_time( $hide_readtime ) ): ?>
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
			'classes'    => 'grid-style grid-2-style typography-style goso-infeed-data',
			'fullwidth'  => $infeed_full,
			'order_ad'   => $infeed_num,
			'order_post' => $j,
			'code'       => $infeed_ads,
			'echo'       => true
		)
	);
}
?>
<?php $j ++; ?>
