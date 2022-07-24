<?php
/**
 * Template part for Slider Style 31
 */
$image_size = get_theme_mod( 'featured_slider_imgsize' ) ? get_theme_mod( 'featured_slider_imgsize' ) : 'goso-single-full';
if ( goso_is_mobile() ) {
	$image_size = get_theme_mod( 'featured_slider_imgsize_mobile' ) ? get_theme_mod( 'featured_slider_imgsize_mobile' ) : 'goso-masonry-thumb';
}
$number = get_theme_mod( 'goso_featured_slider_slides' );
if ( ! $number ): $number = - 1; endif;
$goso_slider_height = get_theme_mod( 'goso_featured_goso_slider_height' );
if ( ! $goso_slider_height || ! is_numeric( $goso_slider_height ) ): $goso_slider_height = 550; endif;
$orderby = 'menu_order';
if ( get_theme_mod( 'goso_featured_slider_random' ) ):
	$orderby = 'rand';
endif;

$featured_args = array(
	'post_type'      => 'goso_slider',
	'order'          => 'ASC',
	'orderby'        => $orderby,
	'posts_per_page' => $number
);

$feat_query = new WP_Query( $featured_args );
?>
<?php if ( $feat_query->have_posts() ) : while ( $feat_query->have_posts() ) : $feat_query->the_post(); ?>
	<?php
	/* Get data of this slide */
	$image_url       = get_post_meta( $post->ID, '_goso_slider_image', true );
	$image_url       = ! $image_url ? '' : $image_url;
	$slider_title    = get_post_meta( $post->ID, '_goso_slider_title', true );
	$slider_title    = ! $slider_title ? '' : $slider_title;
	$caption         = get_post_meta( $post->ID, '_goso_slider_caption', true );
	$caption         = ! $caption ? '' : $caption;
	$button_text     = get_post_meta( $post->ID, '_goso_slider_button', true );
	$button_text     = ! $button_text ? '' : $button_text;
	$title_color     = get_post_meta( $post->ID, '_goso_slider_title_color', true );
	$title_style     = ! $title_color ? '' : ' style="color: ' . $title_color . '"';
	$title_bgcolor   = get_post_meta( $post->ID, '_goso_slider_title_bgcolor', true );
	$title_bgcolor   = ! $title_bgcolor ? '' : ' style="background-color: ' . goso_cover_hex_to_rgb( $title_bgcolor, '0.4' ) . '"';
	$caption_color   = get_post_meta( $post->ID, '_goso_slider_caption_color', true );
	$caption_style   = ! $caption_color ? '' : ' style="color: ' . $caption_color . '"';
	$caption_bgcolor = get_post_meta( $post->ID, '_goso_slider_caption_bgcolor', true );
	$caption_bgcolor = ! $caption_bgcolor ? '' : ' style="background-color: ' . goso_cover_hex_to_rgb( $caption_bgcolor, '0.4' ) . '"';
	$button_bg       = get_post_meta( $post->ID, '_goso_slider_button_bg', true );
	$button_bg       = ! $button_bg ? '' : 'background: ' . $button_bg . ';';
	$button_color    = get_post_meta( $post->ID, '_goso_slider_button_text_color', true );
	$button_color    = ! $button_color ? '' : 'color: ' . $button_color;
	$animation       = get_post_meta( $post->ID, '_goso_slide_element_animation', true );
	$animation       = ! $animation ? 'fadeInUp' : $animation;

	$style_button = '';
	if ( ! empty( $button_bg ) || ! empty( $button_color ) ): $style_button = ' style="' . $button_bg . $button_color . '"'; endif;
	$button_html = '';

	if ( ! empty( $button_text ) ) {
		$button_html = '<div class="goso-button"><a class="gososlider-button"' . $style_button . '>' . sanitize_text_field( do_shortcode( $button_text ) ) . '</a></div>';
		$button_url  = get_post_meta( $post->ID, '_goso_slider_button_url', true );
		$button_url  = ! $button_url ? '' : $button_url;
		if ( ! empty( $button_url ) ):
			$button_html = '<div class="goso-button"><a class="gososlider-button"' . $style_button . ' href="' . esc_url( do_shortcode( $button_url ) ) . '">' . sanitize_text_field( do_shortcode( $button_text ) ) . '</a></div>';
		endif;
	}
	$slider_align = get_post_meta( $post->ID, '_goso_slide_alignment', true );
	$slider_align = ! $slider_align ? 'center' : $slider_align;

	$buttonlink_url  = get_post_meta( $post->ID, '_goso_slider_button_url', true );
	$open_link_html  = '';
	$close_link_html = '';
	if ( $buttonlink_url ) {
		$open_link_html  = '<a href="' . esc_url( do_shortcode( $buttonlink_url ) ) . '">';
		$close_link_html = '</a>';
	}

	if ( ! empty( $image_url ) ):
		?>
        <div class="item gososlider-item">
			<?php if ( ! get_theme_mod( 'goso_disable_lazyload_slider' ) ) { ?>
                <div class="goso-image-holder <?php echo goso_classes_slider_lazy(); ?>"
                     data-bgset="<?php echo goso_get_image_size_url( $image_url, $image_size ); ?>"
                     style="height: <?php echo $goso_slider_height; ?>px;"><?php echo $open_link_html . $close_link_html; ?></div>
			<?php } else { ?>
                <div class="goso-image-holder"
                     style="background-image: url('<?php echo goso_get_image_size_url( $image_url, $image_size ); ?>'); height: <?php echo $goso_slider_height; ?>px;"><?php echo $open_link_html . $close_link_html; ?></div>
			<?php } ?>

            <div class="gososlider-container goso-<?php echo esc_attr( $animation ); ?> align-<?php echo esc_attr( $slider_align ); ?>">
                <div class="gososlider-content">
					<?php if ( ! empty( $slider_title ) ): ?>
                        <h2 class="gososlider-title"<?php echo( $title_style ); ?>><?php echo $open_link_html . '<span class="gosotitle-inner-bg"' . $title_bgcolor . '>' . do_shortcode( $slider_title ) . '</span>' . $close_link_html; ?></h2>
					<?php endif; ?>
					<?php if ( ! empty( $caption ) ): ?>
                        <p class="gososlider-caption"<?php echo( $caption_style ); ?>><span
                                    class="gosocaption-inner-bg"<?php echo $caption_bgcolor; ?>><?php echo do_shortcode( $caption ); ?></span>
                        </p>
					<?php endif; ?>
					<?php echo( $button_html ); ?>
                </div>
            </div>
        </div>
	<?php endif; /* Igrone if doesn't exists image */ ?>
<?php endwhile;
	wp_reset_postdata(); endif; ?>
