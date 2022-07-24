<?php
$output = $goso_block_width = $el_class = $css_animation = $css = '';

$title_page          = $page_url = $page_height = $hide_faces = $hide_stream = '';
$heading_title_style = $heading = $heading_title_link = $heading_title_align = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );


$css_class = 'goso-block-vc goso_instagram_widget-sc goso_instagram_widget goso_insta-' .  ( isset( $atts['template'] ) ? $atts['template'] : '' );
$css_class .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$block_id  = Goso_Vc_Helper::get_unique_id_block( 'instagram' );
?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>">
	<?php Goso_Vc_Helper::markup_block_title( $atts ); ?>
	<div class="goso-block_content">
		<?php
		$defaults = array(
			'title'            => '',
			'attachment'       => '',
			'template'         => '',
			'images_link'      => '',
			'custom_url'       => '',
			'orderby'          => '',
			'images_number'    => '',
			'columns'          => '',
			'refresh_hour'     => '',
			'image_size'       => '',
			'image_link_rel'   => '',
			'image_link_class' => '',
			'no_pin'           => '',
			'controls'         => '',
			'animation'        => '',
			'caption_words'    => '',
			'slidespeed'       => '',
			'description'      => array( 'username', 'time', 'caption' ),
		);


		$instance = shortcode_atts( $defaults, $atts );
		Goso_Instagram_Feed::display_images( $instance );
		?>
	</div>
</div>
<?php

$id_instagram = '#' . $block_id;
$css_custom   = Goso_Vc_Helper::get_heading_block_css( $id_instagram, $atts );

if ( $css_custom ) {
	echo '<style>';
	echo $css_custom;
	echo '</style>';
}
?>
