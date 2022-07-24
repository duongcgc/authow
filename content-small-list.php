<?php
/**
 * Template loop for small list style
 */
if ( ! isset ( $j ) ) {
	$j = 1;
} else {
	$j = $j;
}
?>
    <li class="list-post goso-item-listp goso-slistp">
        <article id="post-<?php the_ID(); ?>" class="item hentry">
			<?php if ( has_post_thumbnail() ) : ?>
                <div class="thumbnail">
					<?php
					$thumbnail_load = goso_featured_images_size();
					$class_load     = '';
					if ( get_theme_mod( 'goso_grid_nocrop_list' ) ):
						$thumbnail_load = 'goso-masonry-thumb';
						$class_load     = ' goso-list-nocrop-thumb';
					endif;
					?>

					<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                        <a class="goso-image-holder goso-lazy<?php echo goso_class_lightbox_enable() . $class_load; ?>"<?php if ( get_theme_mod( 'goso_grid_nocrop_list' ) ): echo ' style="padding-bottom: ' . goso_get_featured_image_ratio( get_the_ID(), 'goso-masonry-thumb' ) . '%"'; endif; ?>
                           data-bgset="<?php echo goso_image_srcset( get_the_ID(),$thumbnail_load ); ?>"
                           href="<?php goso_permalink_fix(); ?>"
                           title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                        </a>
					<?php } else { ?>
                        <a class="goso-image-holder<?php echo goso_class_lightbox_enable() . $class_load; ?>"
                           style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $thumbnail_load ); ?>');<?php if ( get_theme_mod( 'goso_grid_nocrop_list' ) ): echo 'padding-bottom: ' . goso_get_featured_image_ratio( get_the_ID(), 'goso-masonry-thumb' ) . '%;'; endif; ?>"
                           href="<?php goso_permalink_fix(); ?>"
                           title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                        </a>
					<?php } ?>

					<?php if ( ! get_theme_mod( 'goso_grid_icon_format' ) ): ?>
						<?php if ( has_post_format( 'video' ) ) : ?>
                            <a href="<?php the_permalink() ?>" class="icon-post-format"
                               aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-play' ); ?></a>
						<?php endif; ?>
						<?php if ( has_post_format( 'gallery' ) ) : ?>
                            <a href="<?php the_permalink() ?>" class="icon-post-format"
                               aria-label="Icon"><?php goso_fawesome_icon( 'far fa-image' ); ?></a>
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
					<?php endif; ?>
                </div>
			<?php endif; ?>

            <div class="content-list-right content-list-center<?php if ( ! has_post_thumbnail() ) : echo ' fullwidth'; endif; ?>">
                <div class="header-list-style">
					<?php if ( ! get_theme_mod( 'goso_grid_cat' ) ) : ?>
                        <span class="cat"><?php goso_category( '' ); ?></span>
					<?php endif; ?>

                    <h2 class="goso-entry-title entry-title grid-title"><a
                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
        </article>
    </li>
<?php
if ( isset( $infeed_ads ) && $infeed_ads ) {
	goso_get_markup_infeed_ad(
		array(
			'wrapper'    => 'li',
			'classes'    => 'list-post goso-item-listp goso-slistp goso-infeed-data',
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
