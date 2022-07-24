<?php
/**
 * Template display for featured category style 4
 *
 * @since 2.0
 */
?>

<div class="mag-single-slider">
    <div class="magcat-thumb hentry">
        <a href="<?php goso_permalink_fix(); ?>"
           class="mag-single-slider-overlay<?php echo goso_class_lightbox_enable(); ?>"></a>
		<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
            <a class="goso-image-holder goso-lazy<?php echo goso_class_lightbox_enable(); ?>"
               data-bgset="<?php echo goso_image_srcset( get_the_ID(), 'goso-slider-thumb' ); ?>"
               href="<?php goso_permalink_fix(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
            </a>
		<?php } else { ?>
            <a class="goso-image-holder<?php echo goso_class_lightbox_enable(); ?>"
               style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), 'goso-slider-thumb' ); ?>');"
               href="<?php goso_permalink_fix(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
            </a>
		<?php } ?>
		<?php if ( has_post_thumbnail() && get_theme_mod( 'goso_home_featured_cat_icons' ) ): ?>
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
        <div class="magcat-detail">
            <h3 class="magcat-titlte entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php $hide_readtime = get_theme_mod( 'goso_home_cat_readtime' ); ?>
			<?php if ( ! get_theme_mod( 'goso_home_featured_cat_author' ) || ! get_theme_mod( 'goso_home_featured_cat_date' ) || get_theme_mod( 'goso_home_featured_cat_comment' ) || get_theme_mod( 'goso_home_cat_views' ) || goso_isshow_reading_time( $hide_readtime ) ): ?>
                <div class="grid-post-box-meta mag-meta">
					<?php if ( ! get_theme_mod( 'goso_home_featured_cat_author' ) ) : ?>
                        <span class="featc-author author vcard"><a class="url fn n"
                                                                   href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
					<?php endif; ?>
					<?php if ( ! get_theme_mod( 'goso_home_featured_cat_date' ) ) : ?>
                        <span class="featc-date"><?php goso_authow_time_link(); ?></span>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'goso_home_featured_cat_comment' ) ) : ?>
                        <span class="featc-comment"><a
                                    href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a></span>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'goso_home_cat_views' ) ) {
						echo '<span class="featc-views">';
						echo goso_get_post_views( get_the_ID() );
						echo ' ' . goso_get_setting( 'goso_trans_countviews' );
						echo '</span>';
					} ?>
					<?php if ( goso_isshow_reading_time( $hide_readtime ) ): ?>
                        <span class="featc-readtime"><?php goso_reading_time(); ?></span>
					<?php endif; ?>
                </div>
			<?php endif; ?>
			<?php goso_authow_meta_schema(); ?>
        </div>
    </div>
</div>
