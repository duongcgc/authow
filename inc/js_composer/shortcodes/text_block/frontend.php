<?php
$output = $goso_block_width = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_class = 'goso-block-vc goso-text-block';
$css_class .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$block_id = Goso_Vc_Helper::get_unique_id_block( 'text_block' );
?>
	<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>">
		<?php Goso_Vc_Helper::markup_block_title( $atts ); ?>
		<div class="goso-block_content">
			<?php echo wpb_js_remove_wpautop( $content, true ); ?>
		</div>
	</div>
<?php
$id_facebook_page = '#' . $block_id;
$css_custom = Goso_Vc_Helper::get_heading_block_css( $id_facebook_page, $atts );

if ( $css_custom ) {
	echo '<style>';
	echo $css_custom;
	echo '</style>';
}
