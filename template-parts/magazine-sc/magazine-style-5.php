<?php
/**
 * Template display for featured category style 5
 *
 * @since 2.0
 */
$thumbsize = goso_featured_images_size();
if ( 'horizontal' == $goso_featimg_size ) {
	$thumbsize = 'goso-thumb';
} else if ( 'square' == $goso_featimg_size ) {
	$thumbsize = 'goso-thumb-square';
} else if ( 'vertical' == $goso_featimg_size ) {
	$thumbsize = 'goso-thumb-vertical';
} else if ( 'custom' == $goso_featimg_size ) {
	if ( $thumb_size ) {
		$thumbsize = $thumb_size;
	}
}
?>

<div class="magcat-carousel">
    <div class="magcat-thumb hentry">
        <a href="<?php goso_permalink_fix(); ?>" class="mag-post-thumb<?php echo goso_class_lightbox_enable(); ?>">
			<?php
			/* Display Review Piechart  */
			if ( function_exists( 'goso_display_piechart_review_html' ) ) {
				goso_display_piechart_review_html( get_the_ID() );
			}
			?>
			<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                <span class="goso-image-holder goso-lazy"
                      data-bgset="<?php echo goso_image_srcset( get_the_ID(),$thumbsize ); ?>"
                      href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
			</span>
			<?php } else { ?>
                <span class="goso-image-holder"
                      style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $thumbsize ); ?>');"
                      href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
			</span>
			<?php } ?>

			<?php if ( has_post_thumbnail() && 'yes' != $hide_icon_format ): ?>
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
			<?php endif; ?>
        </a>
        <div class="magcat-detail">
            <h3 class="magcat-titlte entry-title"><a
                        href="<?php the_permalink(); ?>"><?php goso_trim_post_title( get_the_ID(), $_title_length ); ?></a>
            </h3>
			<?php if ( 'yes' != $hide_author || 'yes' != $hide_date || 'yes' == $show_viewscount || 'yes' == $show_commentcount || goso_isshow_reading_time( $hide_readtime ) ): ?>
                <div class="grid-post-box-meta mag-meta">
					<?php if ( 'yes' != $hide_author ) : ?>
                        <span class="featc-author author vcard"><?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                    class="url fn n"
                                    href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
					<?php endif; ?>
					<?php if ( 'yes' != $hide_date ) : ?>
                        <span class="featc-date"><?php goso_authow_time_link(); ?></span>
					<?php endif; ?>
					<?php if ( 'yes' == $show_commentcount ) : ?>
                        <span class="featc-comment"><a
                                    href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a></span>
					<?php endif; ?>
					<?php
					if ( 'yes' == $show_viewscount ) {
						echo '<span>';
						echo goso_get_post_views( get_the_ID() );
						echo ' ' . goso_get_setting( 'goso_trans_countviews' );
						echo '</span>';
					}
					?>
					<?php if ( goso_isshow_reading_time( $hide_readtime ) ): ?>
                        <span class="featc-readtime"><?php goso_reading_time(); ?></span>
					<?php endif; ?>
                </div>
			<?php endif; ?>
			<?php goso_authow_meta_schema(); ?>
        </div>
    </div>
</div>
