<?php
$thumb_alt = $thumb_title_html = '';

if ( has_post_thumbnail() ) {
	$thumb_id         = get_post_thumbnail_id( get_the_ID() );
	$thumb_alt        = goso_get_image_alt( $thumb_id, get_the_ID() );
	$thumb_title_html = goso_get_image_title( $thumb_id );
}

$single_style        = goso_get_single_style();
$move_title_bellow   = get_theme_mod( 'goso_move_title_bellow' );
$enable_jarallax     = get_theme_mod( 'goso_enable_jarallax_single' );
$pmt_enable_jarallax = get_post_meta( get_the_ID(), 'goso_enable_jarallax_single', true );

if ( $pmt_enable_jarallax ) {
	$enable_jarallax = $pmt_enable_jarallax;
}


$image_size = 'goso-single-full';

if( in_array( $single_style, array( 'style-3', 'style-6', 'style-8', 'style-9', 'style-10' ) ) ) {
	$image_size = get_theme_mod( 'goso_single_custom_thumbnail_size' ) ? get_theme_mod( 'goso_single_custom_thumbnail_size' ) : 'goso-full-thumb';
}

if ( goso_is_mobile() ) {
	$image_size = 'goso-masonry-thumb';
}

$sidebar_position = goso_get_posts_sidebar_class();

$div_special_wrapper = '';
if ( ! $move_title_bellow ) {
	$div_special_wrapper .= '<div class="';
	$div_special_wrapper .= 'standard-post-special_wrapper';
	if ( 'style-5' == $single_style || 'style-7' == $single_style ) {
		$div_special_wrapper .= ' container';
	}

	if( 'two-sidebar' == $sidebar_position ) {
		$div_special_wrapper .= ' ' . $sidebar_position;
	}

	$div_special_wrapper .= '">';
}

$image_html = goso_get_featured_single_image_size(  get_the_ID(), $image_size, $enable_jarallax, $thumb_alt );

?>
<?php if ( goso_get_post_format( 'link' ) || goso_get_post_format( 'quote' ) ) : ?>
	<?php
	$class_pimage_linkquote = 'standard-post-special post-image';
	if ( goso_get_post_format( 'quote' ) ) {
		$class_pimage_linkquote .= ' goso-special-format-quote';
	}
	if ( ! has_post_thumbnail() || get_theme_mod( 'goso_post_thumb' ) ) {
		$class_pimage_linkquote .= ' no-thumbnail';
	}

	if( ! $move_title_bellow ){
		$class_pimage_linkquote .= ' goso-move-title-above';
	}

	if ( $enable_jarallax ) {
		$class_pimage_linkquote .= ' goso-jarallax';
	}
	?>
	<div class="<?php echo( $class_pimage_linkquote ); ?>">
		<?php
		if ( has_post_thumbnail() && ! get_theme_mod( 'goso_post_thumb' ) ) {
			echo $image_html;
		}
		?>
		<?php echo $div_special_wrapper; ?>
			<div class="standard-content-special">
			<div class="format-post-box<?php if ( goso_get_post_format( 'quote' ) ) {
				echo ' goso-format-quote';
			} else {
				echo ' goso-format-link';
			} ?>">
				<span class="post-format-icon"><?php goso_fawesome_icon('fas fa-' . ( goso_get_post_format( 'quote' ) ? 'quote-left' : 'link' ) ); ?></span>
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
			<?php
			if ( ! $move_title_bellow && 'style-8' != $single_style ){
				get_template_part( 'template-parts/single', 'breadcrumb' );
			}
			if ( ! $move_title_bellow && has_post_thumbnail() && ! get_theme_mod( 'goso_post_thumb' ) ) {
				get_template_part( 'template-parts/single', 'entry-header' );
			}
			?>
		<?php if(! $move_title_bellow ): ?></div><?php endif; ?>
	</div>

<?php elseif ( goso_get_post_format( 'gallery' ) ) : ?>

	<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>

	<?php if ( ! $move_title_bellow && has_post_thumbnail() ) : ?>
		<?php if ( ! get_theme_mod( 'goso_post_thumb' ) ) : ?>
			<div class="post-image <?php echo ( ! $move_title_bellow ? ' goso-move-title-above' : '' ); ?> <?php echo( $enable_jarallax ? ' goso-jarallax' : '' ); ?>">
				<?php
				if ( ! get_theme_mod( 'goso_disable_lightbox_single' ) &&  ! $enable_jarallax  ) {
					$thumb_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
					echo '<a href="' . esc_url( $thumb_url ) . '" data-rel="goso-gallery-image-content">';
					echo $image_html;
					echo '</a>';
				} else {
					echo $image_html;
				}

				echo $div_special_wrapper;

				if ( ! $move_title_bellow && 'style-8' != $single_style ){
					get_template_part( 'template-parts/single', 'breadcrumb' );
				}
				if ( ! $move_title_bellow && has_post_thumbnail() && ! get_theme_mod( 'goso_post_thumb' ) ) {
					get_template_part( 'template-parts/single', 'entry-header' );
				}
				if(! $move_title_bellow ){
					echo '</div>';
				}
				?>
			</div>
		<?php endif; ?>
	<?php elseif ( $images ) :
		$autoplay = ! get_theme_mod( 'goso_disable_autoplay_single_slider' ) ? 'true' : 'false';
		?>
		<div class="post-image">
			<div class="goso-owl-carousel goso-owl-carousel-slider goso-nav-visible" data-auto="<?php echo $autoplay; ?>" data-lazy="true">
				<?php foreach ( $images as $image ) : ?>

					<?php $the_image = wp_get_attachment_image_src( $image, $image_size ); ?>
					<?php $the_caption = get_post_field( 'post_excerpt', $image );
					$image_alt         = goso_get_image_alt( $image, get_the_ID() );
					$image_title_html  = goso_get_image_title( $image );
					?>
					<figure>
						<?php if ( get_theme_mod( 'goso_speed_disable_first_screen' ) || ! get_theme_mod('goso_disable_lazyload_fsingle') ) { ?>
							<img class="goso-lazy" data-src="<?php echo esc_url( $the_image[0] ); ?>" alt="<?php echo $image_alt; ?>"<?php echo $image_title_html; ?> />
						<?php } else { ?>
							<img src="<?php echo esc_url( $the_image[0] ); ?>" alt="<?php echo $image_alt; ?>"<?php echo $image_title_html; ?> />
						<?php } ?>
						<?php if( get_theme_mod('goso_post_gallery_caption') && $the_caption ): ?>
							<p class="goso-single-gallery-captions goso-single-gaformat-caption"><?php echo $the_caption; ?></p>
						<?php endif; ?>
					</figure>

				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>

<?php elseif ( goso_get_post_format( 'video' ) ) : ?>
	<?php
	Goso_Sodedad_Video_Format::show_video_embed( array(
		'post_id'             => $post->ID,
		'parallax'            => $enable_jarallax,
		'args'                => array( 'width' => '1920', 'height' => '1080' ),
		'show_title_inner'    => true,
		'move_title_bellow'   => $move_title_bellow,
		'div_special_wrapper' => $div_special_wrapper,
		'single_style'        => $single_style
	) );
	?>
<?php elseif ( goso_get_post_format( 'audio' ) ) : ?>
	<?php
	$class_pimage_audio = 'standard-post-image post-image audio';

	if ( ! has_post_thumbnail() || get_theme_mod( 'goso_post_thumb' ) ) {
		$class_pimage_audio .= ' no-thumbnail';
	}

	if ( $enable_jarallax ) {
		$class_pimage_audio .= ' goso-jarallax';
	}

	if( ! $move_title_bellow ){
		$class_pimage_audio .= ' goso-move-title-above';
	}

	?>
	<div class="<?php echo $class_pimage_audio; ?>">
		<?php
		if ( has_post_thumbnail() && ! get_theme_mod( 'goso_post_thumb' ) ) {
				echo $image_html;
		}
		?>
		<?php echo $div_special_wrapper; ?>
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
		<?php
		if ( ! $move_title_bellow && 'style-8' != $single_style ){
			get_template_part( 'template-parts/single', 'breadcrumb' );
		}
		if ( ! $move_title_bellow && has_post_thumbnail() && ! get_theme_mod( 'goso_post_thumb' ) ) {
			get_template_part( 'template-parts/single', 'entry-header' );
		}
		?>
		<?php if(! $move_title_bellow ): ?></div><?php endif; ?>
	</div>

<?php else : ?>

	<?php if ( has_post_thumbnail() && ! get_theme_mod( 'goso_post_thumb' ) ) : ?>
		<div class="post-image <?php echo ( ! $move_title_bellow ? ' goso-move-title-above' : '' ); ?>">
			<?php
			if ( ! get_theme_mod( 'goso_disable_lightbox_single' ) &&  ! $enable_jarallax  ) {
				$thumb_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
				echo '<a href="' . esc_url( $thumb_url ) . '" data-rel="goso-gallery-bground-content">';
				echo $image_html;
				echo '</a>';
			} else {

				echo '<div class="' . ( $enable_jarallax ? 'goso-jarallax' : '' ) . '">';
				echo $image_html;
				echo '</div>';
			}

			 echo $div_special_wrapper;
			if ( ! $move_title_bellow && 'style-8' != $single_style ){
				get_template_part( 'template-parts/single', 'breadcrumb' );
			}

			if ( ! $move_title_bellow && has_post_thumbnail() && ! get_theme_mod( 'goso_post_thumb' ) ) {
				get_template_part( 'template-parts/single', 'entry-header' );
			}
			if(! $move_title_bellow ){
				echo '</div>';
			}
			
			if ( get_the_post_thumbnail_caption() && get_theme_mod( 'goso_post_thumb_caption' ) && $move_title_bellow ) {
				echo '<span class="goso-featured-caption goso-fixed-caption">' . get_the_post_thumbnail_caption() . '</span>';
			}
			?>
		</div>
	<?php endif; ?>

<?php endif; ?>
