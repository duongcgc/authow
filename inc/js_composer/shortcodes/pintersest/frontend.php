<?php
$output = $goso_block_width = $el_class = $css_animation = $css = '';

$pusername = $pnumbers = $pcache = $pfollow = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_class = 'goso-block-vc goso-pintersest';
$css_class .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$block_id  = Goso_Vc_Helper::get_unique_id_block( 'pintersest' );
?>
	<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>">
		<?php Goso_Vc_Helper::markup_block_title( $atts ); ?>
		<div class="goso-block_content">
			<div class="goso-pinterest-widget-container">
				<?php
				if ( ! $pusername ) {
					esc_html_e( 'Pinterest data error: pinterest data is not set, please check the ID', 'authow' );
				}
				$pinboard = new Goso_Pinterest();
				$pinboard->render_html( $pusername, $pnumbers, $pcache, $pfollow );
				?>
			</div>
		</div>
	</div>
<?php

$id_pintersest = '#' . $block_id;
$css_custom    = Goso_Vc_Helper::get_heading_block_css( $id_pintersest, $atts );

if ( $css_custom ) {
	echo '<style>';
	echo $css_custom;
	echo '</style>';
}
