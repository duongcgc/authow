<?php
/**
 * Template loop for list style
 */
?>
<li class="list-post pclist-layout">
    <article id="post-<?php the_ID(); ?>" class="item hentry">
		<?php if ( goso_get_post_format( 'gallery' ) ) : ?>
			<?php $images = get_post_meta( get_the_ID(), '_format_gallery_images', true ); ?>
			<?php if ( $images ) : ?>
                <div class="thumbnail">
                    <div class="goso-owl-carousel goso-owl-carousel-slider goso-nav-visible" data-auto="true">
						<?php foreach ( $images as $image ) : ?>

							<?php $the_image = wp_get_attachment_image_src( $image, goso_featured_images_size() ); ?>
							<?php $the_caption = get_post_field( 'post_excerpt', $image ); ?>

							<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                                <figure class="goso-image-holder goso-lazy"
                                        <?php if ( $the_caption ) : ?> title="<?php echo esc_attr( $the_caption ); ?>"<?php endif; ?>
                                        data-bgset="<?php echo esc_url( $the_image[0] ); ?>">
                                </figure>
							<?php } else { ?>
                                <figure class="goso-image-holder"
                                        <?php if ( $the_caption ) : ?> title="<?php echo esc_attr( $the_caption ); ?>"<?php endif; ?>
                                        style="background-image: url('<?php echo esc_url( $the_image[0] ); ?>');">
                                </figure>
							<?php } ?>

						<?php endforeach; ?>
                    </div>
                </div>
			<?php endif; ?>

		<?php elseif ( has_post_thumbnail() ) : ?>
            <div class="thumbnail">
				<?php
				/* Display Review Piechart  */
				if ( function_exists( 'goso_display_piechart_review_html' ) ) {
					goso_display_piechart_review_html( get_the_ID() );
				}
				?>

				<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                    <a class="goso-image-holder goso-lazy<?php echo goso_class_lightbox_enable(); ?>"
                       data-bgset="<?php echo goso_get_featured_image_size( get_the_ID(), goso_featured_images_size() ); ?>"
                       href="<?php goso_permalink_fix(); ?>"
                       title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
                    </a>
				<?php } else { ?>
                    <a class="goso-image-holder<?php echo goso_class_lightbox_enable(); ?>"
                       style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), goso_featured_images_size() ); ?>');"
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
                <h2 class="grid-title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php $hide_readtime = get_theme_mod( 'goso_home_cat_readtime' ); ?>
				<?php if ( ! get_theme_mod( 'goso_home_featured_cat_date' ) || ! get_theme_mod( 'goso_home_featured_cat_author' ) || get_theme_mod( 'goso_home_featured_cat_comment' ) || get_theme_mod( 'goso_home_cat_views' ) || goso_isshow_reading_time( $hide_readtime ) ) : ?>
                    <div class="grid-post-box-meta">
						<?php if ( ! get_theme_mod( 'goso_home_featured_cat_author' ) ) : ?>
                            <span class="featc-author author-italic author"><?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                        class="url fn n"
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
            </div>

			<?php if ( get_the_excerpt() && ! get_theme_mod( 'goso_home_featured_cat_remove_excerpt' ) ): ?>
                <div class="item-content entry-content">
					<?php 
					if( ! get_theme_mod( 'goso_excerptcharac' ) ){
						the_excerpt();
					} else {
						$excerpt_length = get_theme_mod( 'goso_post_excerpt_length', 30 );
						goso_the_excerpt( $excerpt_length );
					}
					?>
                </div>
			<?php endif; ?>

        </div>
		<?php goso_authow_meta_schema(); ?>
    </article>
</li>
