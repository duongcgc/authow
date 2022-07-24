<?php
/**
 * Display part top of full width single style
 * Call this file when enable single style 2
 *
 * @since 1.0
 */
$thumb_alt = $thumb_title_html = '';

if ( has_post_thumbnail() ) {
	$thumb_id         = get_post_thumbnail_id( get_the_ID() );
	$thumb_alt        = goso_get_image_alt( $thumb_id, get_the_ID() );
	$thumb_title_html = goso_get_image_title( $thumb_id );
}
$sidebar_position = goso_get_posts_sidebar_class();

$featured_image_size = get_theme_mod( 'goso_single_custom_thumbnail_size' ) ? get_theme_mod( 'goso_single_custom_thumbnail_size' ) : 'goso-full-thumb';
if ( 'two-sidebar' == $sidebar_position ) {
	$featured_image_size = 'goso-single-full';
}
if ( goso_is_mobile() ) {
	$featured_image_size = 'goso-masonry-thumb';
}
if ( has_post_thumbnail() ) {
	$thumb_id         = get_post_thumbnail_id( get_the_ID() );
	$thumb_alt        = goso_get_image_alt( $thumb_id, get_the_ID() );
	$thumb_title_html = goso_get_image_title( $thumb_id );

	$image_width  = goso_get_image_data_based_post_id( get_the_ID(), $featured_image_size, 'w', false );
	$image_height = goso_get_image_data_based_post_id( get_the_ID(), $featured_image_size, 'h', false );
}
$hide_featuimg    = get_post_meta( get_the_ID(), 'goso_post_hide_featuimg', true );
$show_featuredimg = true;
if ( get_theme_mod( 'goso_post_thumb' ) ) {
	$show_featuredimg = false;
}
if ( $hide_featuimg == 'yes' ) {
	$show_featuredimg = false;
}
if ( $hide_featuimg == 'no' ) {
	$show_featuredimg = true;
}
?>
<?php if ( ! get_theme_mod( 'goso_move_title_bellow' ) ): ?>

    <div class="header-standard header-classic single-header">
		<?php if ( ! get_theme_mod( 'goso_post_cat' ) ) : ?>
            <div class="goso-standard-cat goso-single-cat"><span class="cat"><?php goso_category( '' ); ?></span>
            </div>
		<?php endif; ?>

        <h1 class="post-title single-post-title entry-title"><?php the_title(); ?></h1>
		<?php goso_display_post_subtitle(); ?>
		<?php goso_authow_meta_schema(); ?>
		<?php $hide_readtime = get_theme_mod( 'goso_single_hreadtime' ); ?>
		<?php if ( ! get_theme_mod( 'goso_single_meta_author' ) || ! get_theme_mod( 'goso_single_meta_date' ) || ! get_theme_mod( 'goso_single_meta_comment' ) || get_theme_mod( 'goso_single_show_cview' ) || goso_isshow_reading_time( $hide_readtime ) ) : ?>
            <div class="post-box-meta-single">
				<?php if ( ! get_theme_mod( 'goso_single_meta_author' ) ) : ?>
                    <span class="author-post byline"><span
                                class="author vcard"><?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                    class="author-url url fn n"
                                    href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span></span>
				<?php endif; ?>
				<?php if ( ! get_theme_mod( 'goso_single_meta_date' ) ) : ?>
                    <span><?php goso_authow_time_link( 'single' ); ?></span>
				<?php endif; ?>
				<?php if ( ! get_theme_mod( 'goso_single_meta_comment' ) ) : ?>
                    <span><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></span>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'goso_single_show_cview' ) ) : ?>
                    <span><i class="goso-post-countview-number"><?php echo goso_get_post_views( get_the_ID() ); ?></i> <?php echo goso_get_setting( 'goso_trans_countviews' ); ?></span>
				<?php endif; ?>
				<?php if ( goso_isshow_reading_time( $hide_readtime ) ): ?>
                    <span class="single-readtime"><?php goso_reading_time(); ?></span>
				<?php endif; ?>
            </div>
		<?php endif; ?>
		<?php

		$recipe_title = get_post_meta( get_the_ID(), 'goso_recipe_title', true );
		if ( has_shortcode( get_the_content(), 'goso_recipe' ) || $recipe_title ) {
			do_action( 'goso_recipes_action_hook' );
		} ?>
    </div>

    <?php
        if ( 'btitle-bcontent' == get_theme_mod( 'goso_single_poslcscount' ) || 'btitle' == get_theme_mod( 'goso_single_poslcscount' ) ) {
            get_template_part( 'template-parts/single-meta-comment-top' );
        }

endif; /* End check move title bellow featured image */ ?>

<?php if ( goso_get_post_format( 'link' ) || goso_get_post_format( 'quote' ) ) : ?>
    <div class="standard-post-special post-image<?php if ( goso_get_post_format( 'quote' ) ): ?> goso-special-format-quote<?php endif; ?><?php if ( ! has_post_thumbnail() || get_theme_mod( 'goso_standard_thumbnail' ) ) : echo ' no-thumbnail'; endif; ?>">
		<?php if ( has_post_thumbnail() && ! get_theme_mod( 'goso_standard_thumbnail' ) ) : ?>
			<?php if ( get_theme_mod( 'goso_speed_disable_first_screen' ) || ! get_theme_mod( 'goso_disable_lazyload_fsingle' ) ) { ?>
                <img class="attachment-goso-full-thumb size-goso-full-thumb goso-lazy wp-post-image pc-singlep-img"
                     width="<?php goso_get_image_data_based_post_id( get_the_ID(), $featured_image_size, 'w' ); ?>"
                     height="<?php goso_get_image_data_based_post_id( get_the_ID(), $featured_image_size, 'h' ); ?>"
                     src="<?php echo goso_holder_image_base( $image_width, $image_height ); ?>"
                     alt="<?php echo $thumb_alt; ?>"<?php echo $thumb_title_html; ?>
                     data-sizes="<?php echo goso_image_datasize( $featured_image_size, 'goso-masonry-thumb' ); ?>"
                     data-srcset="<?php echo goso_image_img_srcset( get_the_ID(), $featured_image_size, 'goso-masonry-thumb' ); ?>"
                     data-src="<?php echo goso_get_featured_image_size( get_the_ID(), $featured_image_size ); ?>">
			<?php } else { ?>
				<?php the_post_thumbnail( $featured_image_size, array( 'class' => 'pc-singlep-img' ) ); ?>
			<?php } ?>
		<?php endif; ?>
        <div class="standard-content-special">
            <div class="format-post-box<?php if ( goso_get_post_format( 'quote' ) ) {
				echo ' goso-format-quote';
			} else {
				echo ' goso-format-link';
			} ?>">
                <span class="post-format-icon"><?php goso_fawesome_icon( 'fas fa-' . ( goso_get_post_format( 'quote' ) ? 'quote-left' : 'link' ) ); ?></span>
                <p class="dt-special">
					<?php
					if ( goso_get_post_format( 'quote' ) ) {
						$dt_content = get_post_meta( $post->ID, '_format_quote_source_name', true );
						if ( ! empty( $dt_content ) ): echo sanitize_text_field( $dt_content ); endif;
					} else {
						$dt_content = get_post_meta( $post->ID, '_format_link_url', true );
						if ( ! empty( $dt_content ) ):
							echo '<a href="' . esc_url( $dt_content ) . '" target="_blank">' . sanitize_text_field( $dt_content ) . '</a>';
						endif;
					}
					?>
                </p>
				<?php
				if ( goso_get_post_format( 'quote' ) ):
					$quote_author = get_post_meta( $post->ID, '_format_quote_source_url', true );
					if ( ! empty( $quote_author ) ):
						echo '<div class="author-quote"><span>' . sanitize_text_field( $quote_author ) . '</span></div>';
					endif;
				endif; ?>
            </div>
        </div>
    </div>

<?php elseif ( goso_get_post_format( 'gallery' ) ) : ?>

	<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>

	<?php if ( $images ) :
		$autoplay = ! get_theme_mod( 'goso_disable_autoplay_single_slider' ) ? 'true' : 'false';
		?>
        <div class="post-image">
            <div class="goso-owl-carousel goso-owl-carousel-slider goso-nav-visible"
                 data-auto="<?php echo $autoplay; ?>" data-lazy="true">
				<?php foreach ( $images as $image ) : ?>

					<?php $the_image = wp_get_attachment_image_src( $image, $featured_image_size ); ?>
					<?php $the_caption = get_post_field( 'post_excerpt', $image );
					$image_alt         = goso_get_image_alt( $image, get_the_ID() );
					$image_title_html  = goso_get_image_title( $image );
					?>
                    <figure class="item-link-relative">
						<?php if ( get_theme_mod( 'goso_speed_disable_first_screen' ) || ! get_theme_mod( 'goso_disable_lazyload_fsingle' ) ) { ?>
							<?php echo goso_get_ratio_img_format_gallery( $the_image ); ?>
                            <img class="goso-lazy"
                                 src="<?php echo goso_holder_image_base( $the_image[1], $the_image[2] ); ?>"
                                 data-src="<?php echo esc_url( $the_image[0] ); ?>" width="<?php echo $the_image[1]; ?>"
                                 height="<?php echo $the_image[2]; ?>"
                                 alt="<?php echo $image_alt; ?>"<?php echo $image_title_html; ?> />
						<?php } else { ?>
                            <img src="<?php echo esc_url( $the_image[0] ); ?>" width="<?php echo $the_image[1]; ?>"
                                 height="<?php echo $the_image[2]; ?>"
                                 alt="<?php echo $image_alt; ?>"<?php echo $image_title_html; ?> />
						<?php } ?>
						<?php if ( get_theme_mod( 'goso_post_gallery_caption' ) && $the_caption ): ?>
                            <p class="goso-single-gallery-captions goso-single-gaformat-caption"><?php echo $the_caption; ?></p>
						<?php endif; ?>
                    </figure>

				<?php endforeach; ?>
            </div>
        </div>
	<?php endif; ?>

<?php elseif ( goso_get_post_format( 'video' ) ) : ?>

    <div class="post-image">
		<?php $goso_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
		<?php if ( wp_oembed_get( $goso_video ) ) : ?>
			<?php echo wp_oembed_get( $goso_video ); ?>
		<?php else : ?>
			<?php echo $goso_video; ?>
		<?php endif; ?>
    </div>

<?php elseif ( goso_get_post_format( 'audio' ) ) : ?>

    <div class="standard-post-image post-image audio<?php if ( ! has_post_thumbnail() || get_theme_mod( 'goso_post_thumb' ) ) : echo ' no-thumbnail'; endif; ?>">
		<?php if ( has_post_thumbnail() && ! get_theme_mod( 'goso_post_thumb' ) ) : ?>
			<?php if ( get_theme_mod( 'goso_speed_disable_first_screen' ) || ! get_theme_mod( 'goso_disable_lazyload_fsingle' ) ) { ?>
                <img class="attachment-goso-full-thumb size-goso-full-thumb goso-lazy wp-post-image pc-singlep-img"
                     width="<?php goso_get_image_data_based_post_id( get_the_ID(), $featured_image_size, 'w' ); ?>"
                     height="<?php goso_get_image_data_based_post_id( get_the_ID(), $featured_image_size, 'h' ); ?>"
                     src="<?php echo goso_holder_image_base( $image_width, $image_height ); ?>"
                     alt="<?php echo $thumb_alt; ?>"<?php echo $thumb_title_html; ?>
                     data-sizes="<?php echo goso_image_datasize( $featured_image_size, 'goso-masonry-thumb' ); ?>"
                     data-srcset="<?php echo goso_image_img_srcset( get_the_ID(), $featured_image_size, 'goso-masonry-thumb' ); ?>"
                     data-src="<?php echo goso_get_featured_image_size( get_the_ID(), $featured_image_size ); ?>">
			<?php } else { ?>
				<?php the_post_thumbnail( $featured_image_size, array( 'class' => 'pc-singlep-img' ) ); ?>
			<?php } ?>
		<?php endif; ?>
        <div class="audio-iframe">
			<?php $goso_audio = get_post_meta( $post->ID, '_format_audio_embed', true );
			$goso_audio_str   = substr( $goso_audio, - 4 ); ?>
			<?php if ( wp_oembed_get( $goso_audio ) ) : ?>
				<?php echo wp_oembed_get( $goso_audio ); ?>
			<?php elseif ( $goso_audio_str == '.mp3' ) : ?>
				<?php echo do_shortcode( '[audio src="' . esc_url( $goso_audio ) . '"]' ); ?>
			<?php else : ?>
				<?php echo $goso_audio; ?>
			<?php endif; ?>
        </div>
    </div>

<?php else : ?>

	<?php if ( has_post_thumbnail() ) : ?>
		<?php if ( $show_featuredimg == true ) : ?>
            <div class="post-image">
				<?php
				if ( ! get_theme_mod( 'goso_disable_lightbox_single' ) ) {
					$thumb_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
					echo '<a href="' . esc_url( $thumb_url ) . '" data-rel="goso-gallery-image-content">';
					?>
					<?php if ( get_theme_mod( 'goso_speed_disable_first_screen' ) || ! get_theme_mod( 'goso_disable_lazyload_fsingle' ) ) { ?>
                        <img class="attachment-goso-full-thumb size-goso-full-thumb goso-lazy wp-post-image pc-singlep-img"
                             width="<?php goso_get_image_data_based_post_id( get_the_ID(), $featured_image_size, 'w' ); ?>"
                             height="<?php goso_get_image_data_based_post_id( get_the_ID(), $featured_image_size, 'h' ); ?>"
                             src="<?php echo goso_holder_image_base( $image_width, $image_height ); ?>"
                             alt="<?php echo $thumb_alt; ?>"<?php echo $thumb_title_html; ?>
                             data-sizes="<?php echo goso_image_datasize( $featured_image_size, 'goso-masonry-thumb' ); ?>"
                             data-srcset="<?php echo goso_image_img_srcset( get_the_ID(), $featured_image_size, 'goso-masonry-thumb' ); ?>"
                             data-src="<?php echo goso_get_featured_image_size( get_the_ID(), $featured_image_size ); ?>">
					<?php } else { ?>
						<?php the_post_thumbnail( $featured_image_size, array( 'class' => 'pc-singlep-img' ) ); ?>
					<?php } ?>
					<?php
					echo '</a>';
				} else {
					?>
					<?php if ( get_theme_mod( 'goso_speed_disable_first_screen' ) || ! get_theme_mod( 'goso_disable_lazyload_fsingle' ) ) { ?>
                        <img class="attachment-goso-full-thumb size-goso-full-thumb goso-lazy wp-post-image pc-singlep-img"
                             width="<?php goso_get_image_data_based_post_id( get_the_ID(), $featured_image_size, 'w' ); ?>"
                             height="<?php goso_get_image_data_based_post_id( get_the_ID(), $featured_image_size, 'h' ); ?>"
                             src="<?php echo goso_holder_image_base( $image_width, $image_height ); ?>"
                             alt="<?php echo $thumb_alt; ?>"<?php echo $thumb_title_html; ?>
                             data-sizes="<?php echo goso_image_datasize( $featured_image_size, 'goso-masonry-thumb' ); ?>"
                             data-srcset="<?php echo goso_image_img_srcset( get_the_ID(), $featured_image_size, 'goso-masonry-thumb' ); ?>"
                             data-src="<?php echo goso_get_featured_image_size( get_the_ID(), $featured_image_size ); ?>">
					<?php } else { ?>
						<?php the_post_thumbnail( $featured_image_size, array( 'class' => 'pc-singlep-img' ) ); ?>
					<?php } ?>
					<?php
				}

				if ( get_the_post_thumbnail_caption() && get_theme_mod( 'goso_post_thumb_caption' ) ) {
					echo '<div class="goso-featured-caption">' . get_the_post_thumbnail_caption() . '</div>';
				}
				?>
            </div>
		<?php endif; ?>
	<?php endif; ?>

<?php endif; ?>

<?php if ( get_theme_mod( 'goso_move_title_bellow' ) ): ?>

    <div class="header-standard header-classic single-header goso-title-bellow">
		<?php if ( ! get_theme_mod( 'goso_post_cat' ) ) : ?>
            <div class="goso-standard-cat goso-single-cat"><span class="cat"><?php goso_category( '' ); ?></span>
            </div>
		<?php endif; ?>

        <h1 class="post-title single-post-title entry-title"><?php the_title(); ?></h1>
		<?php goso_display_post_subtitle(); ?>

		<?php if ( ! get_theme_mod( 'goso_single_meta_author' ) || ! get_theme_mod( 'goso_single_meta_date' ) || ! get_theme_mod( 'goso_single_meta_comment' ) || get_theme_mod( 'goso_single_show_cview' ) ) : ?>
            <div class="post-box-meta-single">
				<?php if ( ! get_theme_mod( 'goso_single_meta_author' ) ) : ?>
                    <span class="author-post byline"><span
                                class="author vcard"><?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                    class="author-url url fn n"
                                    href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span></span>
				<?php endif; ?>
				<?php if ( ! get_theme_mod( 'goso_single_meta_date' ) ) : ?>
                    <span><?php goso_authow_time_link( 'single' ); ?></span>
				<?php endif; ?>
				<?php if ( ! get_theme_mod( 'goso_single_meta_comment' ) ) : ?>
                    <span><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></span>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'goso_single_show_cview' ) ) : ?>
                    <span><i class="goso-post-countview-number"><?php echo goso_get_post_views( get_the_ID() ); ?></i> <?php echo goso_get_setting( 'goso_trans_countviews' ); ?></span>
				<?php endif; ?>
            </div>
		<?php endif; ?>

		<?php $recipe_title = get_post_meta( get_the_ID(), 'goso_recipe_title', true );
		if ( has_shortcode( get_the_content(), 'goso_recipe' ) || $recipe_title ) {
			do_action( 'goso_recipes_action_hook' );
		} ?>

    </div>

<?php endif; /* End check move title bellow featured image */ ?>
