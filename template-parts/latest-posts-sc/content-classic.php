<?php
/**
 * Content classic homepage, archive page
 *
 * @since 1.0
 */
if ( ! isset ( $n ) ) {
	$n = 1;
} else {
	$n = $n;
}
$block_style = get_theme_mod( 'goso_blockquote_style' ) ? get_theme_mod( 'goso_blockquote_style' ) : 'style-1';
$thumb_alt   = $thumb_title_html = '';

$post_class     = get_post_class( '', get_the_ID() );
$standard_class = 'standard-article classic-pitem ' . esc_attr( implode( ' ', $post_class ) );

if ( has_post_thumbnail() ) {
	$thumb_id         = get_post_thumbnail_id( get_the_ID() );
	$thumb_alt        = goso_get_image_alt( $thumb_id, get_the_ID() );
	$thumb_title_html = goso_get_image_title( $thumb_id );
}
?>
<article id="post-<?php the_ID(); ?>" class="<?php echo $standard_class; ?>">

    <div class="header-standard header-classic">
		<?php if ( 'yes' != $standard_cat ) : ?>
            <div class="goso-standard-cat"><span class="cat"><?php goso_category( '' ); ?></span></div>
		<?php endif; ?>

        <h2 class="goso-entry-title entry-title entry-title"><a
                    href="<?php the_permalink(); ?>"><?php goso_trim_post_title( get_the_ID(), $standard_title_length ); ?></a>
        </h2>
		<?php goso_authow_meta_schema(); ?>
		<?php if ( 'yes' != $standard_author || goso_isshow_reading_time( $standard_readtime ) ) : ?>
            <div class="standard-top-meta author-post byline">
				<?php if ( 'yes' != $standard_author ) : ?>
                    <span class="author vcard"><?php echo goso_get_setting( 'goso_trans_written_by' ); ?> <a
                                class="url fn n"
                                href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
				<?php endif; ?>
				<?php if ( goso_isshow_reading_time( $standard_readtime ) ) : ?>
                    <span class="goso-readtime"><?php goso_reading_time(); ?></span>
				<?php endif; ?>
            </div>
		<?php endif; ?>
    </div>

	<?php if ( 'yes' != $atts['standard_thumbnail'] ): ?>

		<?php if ( goso_get_post_format( 'link' ) || goso_get_post_format( 'quote' ) ) : ?>
            <div class="standard-post-special<?php if ( goso_get_post_format( 'quote' ) ): ?> goso-special-format-quote<?php endif; ?><?php if ( ! has_post_thumbnail() || 'yes' == $atts['standard_thumbnail'] ) : echo ' no-thumbnail'; endif; ?>">
				<?php if ( has_post_thumbnail() && 'yes' != $atts['standard_thumbnail'] ) : ?>
					<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                        <a <?php if ( 'yes' == $standard_thumb_crop ): ?> class="goso-image-holder goso-lazy" data-bgset="<?php echo goso_get_featured_image_size( get_the_ID(), 'goso-full-thumb' ); ?>"<?php endif; ?>
                                href="<?php the_permalink() ?>">
							<?php if ( 'yes' != $standard_thumb_crop ): ?><img
                                class="attachment-goso-full-thumb size-goso-full-thumb goso-lazy wp-post-image"
                                width="<?php goso_get_image_data_based_post_id( get_the_ID(), 'goso-full-thumb', 'w' ); ?>"
                                height="<?php goso_get_image_data_based_post_id( get_the_ID(), 'goso-full-thumb', 'h' ); ?>"
                                src="<?php echo goso_holder_image_base( goso_get_image_data_based_post_id( get_the_ID(), 'goso-full-thumb', 'w',false ), goso_get_image_data_based_post_id( get_the_ID(), 'goso-full-thumb', 'h',false ) ); ?>" alt="<?php echo $thumb_alt; ?>"<?php echo $thumb_title_html; ?>
                                data-src="<?php echo goso_get_featured_image_size( get_the_ID(), 'goso-full-thumb' ); ?>"><?php endif; ?>
                        </a>
					<?php } else { ?>
                        <a <?php if ( 'yes' == $standard_thumb_crop ): ?> class="goso-image-holder" style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), 'goso-full-thumb' ); ?>');"<?php endif; ?>
                                href="<?php the_permalink() ?>">
							<?php if ( 'yes' != $standard_thumb_crop ): ?><?php the_post_thumbnail( 'goso-full-thumb' ); ?><?php endif; ?>
                        </a>
					<?php } ?>
				<?php endif; ?>
                <div class="standard-content-special">
					<?php if ( goso_get_post_format( 'quote' ) ): ?><a href="<?php the_permalink(); ?>"><?php endif; ?>
                        <div class="format-post-box<?php if ( goso_get_post_format( 'quote' ) ) {
							echo ' goso-format-quote';
						} else {
							echo ' goso-format-link';
						} ?>">
                            <span class="post-format-icon"><?php goso_fawesome_icon( 'fas fa-' . ( goso_get_post_format( 'quote' ) ? 'quote-left' : 'link' ) ); ?></span>
                            <p class="dt-special">
								<?php
								if ( goso_get_post_format( 'quote' ) ) {
									$dt_content = get_post_meta( get_the_ID(), '_format_quote_source_name', true );
									if ( ! empty( $dt_content ) ): echo sanitize_text_field( $dt_content ); endif;
								} else {
									$dt_content = get_post_meta( get_the_ID(), '_format_link_url', true );
									if ( ! empty( $dt_content ) ):
										echo '<a href="' . esc_url( get_permalink() ) . '">' . sanitize_text_field( $dt_content ) . '</a>';
									endif;
								}
								?>
                            </p>
							<?php
							if ( goso_get_post_format( 'quote' ) ):
								$quote_author = get_post_meta( get_the_ID(), '_format_quote_source_url', true );
								if ( ! empty( $quote_author ) ):
									echo '<div class="author-quote"><span>' . sanitize_text_field( $quote_author ) . '</span></div>';
								endif;
							endif; ?>
                        </div>
						<?php if ( goso_get_post_format( 'quote' ) ): ?></a><?php endif; ?>
                </div>
            </div>

		<?php elseif ( goso_get_post_format( 'gallery' ) ) : ?>

			<?php $images = get_post_meta( get_the_ID(), '_format_gallery_images', true ); ?>

			<?php if ( $images ) :
				$autoplay = 'yes' != $atts['std_dis_at_gallery'] ? 'true' : 'false';
				?>
                <div class="standard-post-image classic-post-image">
                    <div class="goso-owl-carousel goso-owl-carousel-slider goso-nav-visible"
                         data-auto="<?php echo $autoplay; ?>">
						<?php foreach ( $images as $image ) : ?>

							<?php $the_image = wp_get_attachment_image_src( $image, 'goso-full-thumb' ); ?>
							<?php $the_caption = get_post_field( 'post_excerpt', $image );
							$image_alt         = goso_get_image_alt( $image, get_the_ID() );
							$image_title_html  = goso_get_image_title( $image );
							?>
                            <figure class="item-link-relative goso-gallery-images"
                                    alt="<?php the_title(); ?>"<?php if ( $the_caption ) : ?> title="<?php echo esc_attr( $the_caption ); ?>"<?php endif; ?>>
								<?php echo goso_get_ratio_img_format_gallery( $the_image ); ?>
                                <img src="<?php echo esc_url( $the_image[0] ); ?>" width="<?php echo $the_image[1]; ?>"
                                     height="<?php echo $the_image[2]; ?>"
                                     alt="<?php echo $image_alt; ?>"<?php echo $image_title_html; ?>>
                            </figure>

						<?php endforeach; ?>
                    </div>
                </div>
			<?php endif; ?>

		<?php elseif ( goso_get_post_format( 'video' ) ) : ?>

            <div class="standard-post-image classic-post-image video-post">
				<?php $goso_video = get_post_meta( get_the_ID(), '_format_video_embed', true ); ?>
				<?php if ( wp_oembed_get( $goso_video ) ) : ?>
					<?php echo wp_oembed_get( $goso_video ); ?>
				<?php else : ?>
					<?php echo $goso_video; ?>
				<?php endif; ?>
            </div>

		<?php elseif ( goso_get_post_format( 'audio' ) ) : ?>

            <div class="standard-post-image classic-post-image audio<?php if ( ! has_post_thumbnail() ) : echo ' no-thumbnail'; endif; ?>">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                        <a <?php if ( 'yes' == $standard_thumb_crop ): ?> class="goso-image-holder goso-lazy" data-bgset="<?php echo goso_image_srcset( get_the_ID(), 'goso-full-thumb' ); ?>"<?php endif; ?>
                                href="<?php the_permalink() ?>">
							<?php if ( 'yes' != $standard_thumb_crop ): ?><img
                                class="attachment-goso-full-thumb size-goso-full-thumb goso-lazy wp-post-image"
                                width="<?php goso_get_image_data_based_post_id( get_the_ID(), 'goso-full-thumb', 'w' ); ?>"
                                height="<?php goso_get_image_data_based_post_id( get_the_ID(), 'goso-full-thumb', 'h' ); ?>"
                                src="<?php echo goso_holder_image_base( goso_get_image_data_based_post_id( get_the_ID(), 'goso-full-thumb', 'w',false ), goso_get_image_data_based_post_id( get_the_ID(), 'goso-full-thumb', 'h',false ) ); ?>" alt="<?php echo $thumb_alt; ?>"<?php echo $thumb_title_html; ?>
                                data-src="<?php echo goso_get_featured_image_size( get_the_ID(), 'goso-full-thumb' ); ?>"><?php endif; ?>
                        </a>
					<?php } else { ?>
                        <a <?php if ( 'yes' == $standard_thumb_crop ): ?> class="goso-image-holder" style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), 'goso-full-thumb' ); ?>');"<?php endif; ?>
                                href="<?php the_permalink() ?>">
							<?php if ( 'yes' != $standard_thumb_crop ): ?><?php the_post_thumbnail( 'goso-full-thumb' ); ?><?php endif; ?>
                        </a>
					<?php } ?>
				<?php endif; ?>
                <div class="audio-iframe">
					<?php $goso_audio = get_post_meta( get_the_ID(), '_format_audio_embed', true );
					$goso_audio_str   = substr( $goso_audio, - 4 );
					?>
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
                <div class="standard-post-image classic-post-image">
					<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                        <a <?php if ( 'yes' == $standard_thumb_crop ): ?> class="goso-image-holder goso-lazy" data-bgset="<?php echo goso_image_srcset( get_the_ID(), 'goso-full-thumb' ); ?>"<?php endif; ?>
                                href="<?php the_permalink() ?>">
							<?php if ( 'yes' != $standard_thumb_crop ): ?><img
                                class="attachment-goso-full-thumb size-goso-full-thumb goso-lazy wp-post-image"
                                width="<?php goso_get_image_data_based_post_id( get_the_ID(), 'goso-full-thumb', 'w' ); ?>"
                                height="<?php goso_get_image_data_based_post_id( get_the_ID(), 'goso-full-thumb', 'h' ); ?>"
                                src="<?php echo goso_holder_image_base( goso_get_image_data_based_post_id( get_the_ID(), 'goso-full-thumb', 'w',false ), goso_get_image_data_based_post_id( get_the_ID(), 'goso-full-thumb', 'h',false ) ); ?>" alt="<?php echo $thumb_alt; ?>"<?php echo $thumb_title_html; ?>
                                data-src="<?php echo goso_get_featured_image_size( get_the_ID(), 'goso-full-thumb' ); ?>"><?php endif; ?>
                        </a>
					<?php } else { ?>
                        <a <?php if ( 'yes' == $standard_thumb_crop ): ?> class="goso-image-holder" style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), 'goso-full-thumb' ); ?>');"<?php endif; ?>
                                href="<?php the_permalink() ?>">
							<?php if ( 'yes' != $standard_thumb_crop ): ?><?php the_post_thumbnail( 'goso-full-thumb' ); ?><?php endif; ?>
                        </a>
					<?php } ?>
                </div>
			<?php endif; ?>

		<?php endif; /* End Thumbnail */ ?>
	<?php endif; ?>

    <div class="standard-content">
		<?php if ( 'yes' != $standard_remove_excerpt ) { ?>
            <div class="standard-main-content entry-content">
                <div class="post-entry standard-post-entry classic-post-entry <?php echo 'blockquote-' . $block_style; ?>">
					<?php if ( 'yes' == $standard_auto_excerpt ) { ?>
						<?php goso_the_excerpt( $standard_excerpt_length ); ?>
                        <div class="goso-more-link<?php if ( 'yes' == $atts['std_continue_btn'] ): echo ' goso-more-link-button'; endif; ?>">
                            <a href="<?php the_permalink(); ?>"
                               class="more-link"><?php echo goso_get_setting( 'goso_trans_continue_reading' ); ?></a>
                        </div>
					<?php } else { ?>
						<?php the_content( goso_get_setting( 'goso_trans_continue_reading' ) ); ?>
						<?php wp_link_pages(); ?>
					<?php } ?>
                </div>
            </div>
		<?php } ?>

		<?php if ( 'yes' != $standard_share_box || 'yes' != $standard_date || 'yes' != $standard_comment || 'yes' == $standard_viewscount ) : ?>
            <div class="goso-post-box-meta<?php if ( 'yes' == $standard_share_box || ( 'yes' == $standard_date && 'yes' == $standard_comment && 'yes' != $standard_viewscount ) ): echo ' center-inner'; endif; ?>">
				<?php if ( 'yes' != $standard_date || 'yes' != $standard_comment || 'yes' == $standard_viewscount ) : ?>
                    <div class="goso-box-meta">
						<?php if ( 'yes' != $standard_date ) : ?>
                            <span><?php goso_fawesome_icon( 'far fa-clock' ); ?><?php goso_authow_time_link(); ?></span>
						<?php endif; ?>
						<?php if ( 'yes' != $standard_comment ) : ?>
                            <span><a href="<?php comments_link(); ?> "><?php goso_fawesome_icon( 'far fa-comment' ); ?><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a></span>
						<?php endif; ?>
						<?php
						if ( 'yes' == $standard_viewscount ) {
							echo '<span>';
							echo goso_get_post_views( get_the_ID() );
							echo ' ' . goso_get_setting( 'goso_trans_countviews' );
							echo '</span>';
						}
						?>
                    </div>
				<?php endif; ?>
				<?php if ( 'yes' != $standard_share_box ) : ?>
                    <div class="goso-post-share-box">
						<?php echo goso_getPostLikeLink( get_the_ID() ); ?>
						<?php goso_authow_social_share(); ?>
                    </div>
				<?php endif; ?>
            </div>
		<?php endif; ?>
    </div>

</article>
<?php
if ( isset( $infeed_ads ) && $infeed_ads ) {
	goso_get_markup_infeed_ad(
		array(
			'wrapper'    => 'article',
			'classes'    => 'standard-article classic-pitem post goso-infeed-data goso-infeed-vcele',
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
