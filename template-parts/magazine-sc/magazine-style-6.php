<?php
/**
 * Template display for featured category style 6
 *
 * @since 1.0
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
<?php if ( $m == 1 ): ?>
<div class="cat-left"><?php endif; ?>
    <div class="mag-post-box hentry<?php if ( $m == 1 ): echo ' first-post';
		if ( ! has_post_thumbnail() ): echo ' full-mag-cat'; endif; endif; ?>">
        <div class="magcat-thumb">
			<?php
			/* Display Review Piechart  */
			if ( function_exists( 'goso_display_piechart_review_html' ) ) {
				$size_pie = 'small';
				if ( $m == 1 ): $size_pie = 'normal'; endif;
				goso_display_piechart_review_html( get_the_ID(), $size_pie );
			}
			?>
			<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                <a class="goso-image-holder goso-lazy<?php if ( $m > 1 ): echo ' small-fix-size'; endif; ?><?php echo goso_class_lightbox_enable(); ?>"
                   data-bgset="<?php echo goso_image_srcset( get_the_ID(),$thumbsize ); ?>"
                   href="<?php goso_permalink_fix(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                </a>
			<?php } else { ?>
                <a class="goso-image-holder<?php if ( $m > 1 ): echo ' small-fix-size'; endif; ?><?php echo goso_class_lightbox_enable(); ?>"
                   style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $thumbsize ); ?>');"
                   href="<?php goso_permalink_fix(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                </a>
			<?php } ?>
			<?php if ( has_post_thumbnail() && 'yes' != $hide_icon_format ): ?>
				<?php if ( has_post_format( 'video' ) ) : ?>
                    <a href="<?php the_permalink() ?>" class="icon-post-format"
                       aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-play' ); ?></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'audio' ) ) : ?>
                    <a href="<?php the_permalink() ?>" class="icon-post-format"
                       aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-music' ); ?></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'link' ) ) : ?>
                    <a href="<?php the_permalink() ?>" class="icon-post-format"
                       aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-link' ); ?></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'quote' ) ) : ?>
                    <a href="<?php the_permalink() ?>" class="icon-post-format"
                       aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-quote-left' ); ?></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'gallery' ) ) : ?>
                    <a href="<?php the_permalink() ?>" class="icon-post-format"
                       aria-label="Icon"><?php goso_fawesome_icon( 'far fa-image' ); ?></a>
				<?php endif; ?>
			<?php endif; ?>
        </div>
        <div class="magcat-detail">
			<?php if ( $m == 1 ): ?>
            <div class="mag-header"><?php endif; ?>
                <h3 class="magcat-titlte entry-title"><a
                            href="<?php the_permalink(); ?>"><?php goso_trim_post_title( get_the_ID(), ( $m == 1 ? $big_title_length : $_title_length ) ); ?></a>
                </h3>
				<?php if ( ( ( $m == 1 || $show_author_sposts ) && 'yes' != $hide_author ) || 'yes' != $hide_date || 'yes' == $show_viewscount || 'yes' == $show_commentcount || goso_isshow_reading_time( $hide_readtime ) ): ?>
                    <div class="grid-post-box-meta mag-meta">
						<?php if ( ( $m == 1 || $show_author_sposts ) && 'yes' != $hide_author ) : ?>
                            <span class="featc-author author-italic author"><?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                        class="url fn n"
                                        href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span>
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
				<?php if ( $m == 1 ): ?></div><?php endif; ?>
			<?php if ( $m == 1 && get_the_excerpt() && 'yes' != $hide_excerpt ): ?>
                <div class="mag-excerpt entry-content">
					<?php
					if ( isset( $_excerpt_length ) ) {
						$_excerpt_length = $_excerpt_length ? $_excerpt_length : 25;
						goso_the_excerpt( $_excerpt_length );
					} else {
						the_excerpt();
					}
					?>
                </div>
			<?php endif; ?>
			<?php goso_authow_meta_schema(); ?>
        </div>
    </div>
	<?php if ( $m == 1 ): ?></div>
<div class="cat-right"><?php endif; ?>
	<?php if ( $m == $numers_results ): ?></div><?php endif; ?>
