<?php
$output              = $goso_block_width = $el_class = $css_animation = $css = '';
$heading_title_style = $heading = $heading_title_link = $heading_title_align = '';
$build_query         = $goso_style = $goso_size = $goso_img_ratio = '';
$hide_pdate          = $dis_lazyload = '';

$ptitle_color  = $ptitle_hcolor = $ptitle_fsize = $use_ptitle_typo = $ptitle_typo = '';
$pmeta_color   = $pmeta_hcolor = $pmeta_fsize = $use_pmeta_typo = $pmeta_typo = '';
$_title_length = 10;

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_class = 'goso-block-vc goso_post-slider-sc';
$css_class .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$block_id  = Goso_Vc_Helper::get_unique_id_block( 'post_slider' );

$thumbsize = goso_featured_images_size();
if ( 'horizontal' == $goso_size ) {
	$thumbsize = 'goso-thumb';
} else if ( 'square' == $goso_size ) {
	$thumbsize = 'goso-thumb-square';
} else if ( 'vertical' == $goso_size ) {
	$thumbsize = 'goso-thumb-vertical';
}

$query_args = goso_build_args_query( $build_query );
$loop       = new WP_Query( $query_args );

if ( ! $loop->have_posts() ) {
	return;
}

$rand = rand( 100, 10000 );

if ( get_theme_mod( 'goso_disable_lazyload_layout' ) ) {
	$dis_lazyload = false;
}

$style    = $goso_style ? $goso_style : 'style-1';
$dataauto = 'false';
if ( $autoplay ) {
	$dataauto = 'true';
}
?>
    <div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>">
		<?php Goso_Vc_Helper::markup_block_title( $atts ); ?>
        <div class="goso-block_content">
            <div id="goso-postslidewg-<?php echo sanitize_text_field( $rand ); ?>"
                 class="goso-owl-carousel goso-owl-carousel-slider goso-widget-slider goso-post-slider-<?php echo $style; ?>"
                 data-lazy="true" data-auto="<?php echo $dataauto; ?>">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class="goso-slide-widget">
                        <div class="goso-slide-content">
							<?php if ( $style != 'style-3' ) { ?>
								<?php if ( ! $dis_lazyload ) { ?>
                                    <span class="goso-image-holder <?php echo goso_classes_slider_lazy(); ?>"
                                          title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></span>
								<?php } else { ?>
                                    <span class="goso-image-holder"
                                          style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $thumbsize ); ?>');"
                                          title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></span>
								<?php } ?>
                                <a href="<?php the_permalink() ?>" class="goso-widget-slider-overlay"
                                   title="<?php the_title(); ?>"></a>
							<?php } else { ?>
								<?php if ( ! $dis_lazyload ) { ?>
                                    <a href="<?php the_permalink() ?>" class="goso-image-holder goso-lazy"
                                       data-bgset="<?php echo goso_image_srcset( get_the_ID(),$thumbsize ); ?>"
                                       title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
								<?php } else { ?>
                                    <a href="<?php the_permalink() ?>" class="goso-image-holder"
                                       style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $thumbsize ); ?>')"
                                       title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
								<?php } ?>
							<?php } ?>
                            <div class="goso-widget-slide-detail">
                                <h4>
                                    <a href="<?php the_permalink() ?>" rel="bookmark"
                                       title="<?php the_title(); ?>"><?php goso_trim_post_title( get_the_ID(), $_title_length ); ?></a>
                                </h4>
								<?php if ( ! $hide_pdate ) : ?>
									<?php
									$date_format = get_option( 'date_format' );
									?>
									<?php if ( ! get_theme_mod( 'goso_show_modified_date' ) ) { ?>
                                        <span class="slide-item-date"><?php the_time( $date_format ); ?></span>
									<?php } else { ?>
                                        <span class="slide-item-date"><?php echo get_the_modified_date( $date_format ); ?></span>
									<?php } ?>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
				<?php endwhile; ?>
            </div>
			<?php
			wp_reset_postdata();
			?>
        </div>
    </div>
<?php

$id_post_slider = '#' . $block_id;
$css_custom     = Goso_Vc_Helper::get_heading_block_css( $id_post_slider, $atts );

if ( 'horizontal' == $goso_size ) {
	$css_custom .= $id_post_slider . ' .goso-widget-slider .goso-image-holder:before{ padding-top: 66.6667%; }';
}
if ( 'square' == $goso_size ) {
	$css_custom .= $id_post_slider . ' .goso-widget-slider .goso-image-holder:before{ padding-top: 100%; }';
}
if ( 'vertical' == $goso_size ) {
	$css_custom .= $id_post_slider . ' .goso-widget-slider .goso-image-holder:before{ padding-top: 135.4%; }';
}
if ( 'custom' == $goso_size && $goso_img_ratio ) {
	$css_custom .= $id_post_slider . ' .goso-widget-slider .goso-image-holder:before{ padding-top: ' . esc_attr( $goso_img_ratio ) . '%; }';
}
if ( $ptitle_color ) {
	$css_custom .= $id_post_slider . ' .goso-widget-slider .goso-widget-slide-detail h4,';
	$css_custom .= $id_post_slider . ' .goso-widget-slider .goso-widget-slide-detail h4 a{ color: ' . esc_attr( $ptitle_color ) . ' !important;}';
}
if ( $ptitle_hcolor ) {
	$css_custom .= $id_post_slider . ' .goso-widget-slider .goso-widget-slide-detail h4 a:hover{ color: ' . esc_attr( $ptitle_hcolor ) . ' !important;}';
}
$css_custom .= Goso_Vc_Helper::vc_google_fonts_parse_attributes( array(
	'font_size'  => $ptitle_fsize,
	'font_style' => $use_ptitle_typo ? $ptitle_typo : '',
	'template'   => "{$id_post_slider} .goso-widget-slider .goso-widget-slide-detail h4 a,{$id_post_slider} .goso-widget-slider .goso-widget-slide-detail h4" . '{ %s }',
) );

if ( $pmeta_color ) {
	$css_custom .= $id_post_slider . ' .goso-widget-slide-detail .slide-item-date { color: ' . esc_attr( $pmeta_color ) . ' !important;}';
}
$css_custom .= Goso_Vc_Helper::vc_google_fonts_parse_attributes( array(
	'font_size'  => $pmeta_fsize,
	'font_style' => $use_pmeta_typo ? $pmeta_typo : '',
	'template'   => "{$id_post_slider} .goso-widget-slide-detail .slide-item-date" . '{ %s }',
) );

if ( $css_custom ) {
	echo '<style>';
	echo $css_custom;
	echo '</style>';
}
