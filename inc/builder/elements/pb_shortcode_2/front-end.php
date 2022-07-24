<?php
$shortcode_html  = goso_get_builder_mod( 'goso_header_builder_pb_shortcode_2_name', false );
$shortcode_class = goso_get_builder_mod( 'goso_header_builder_pb_shortcode_2_class' );
if ( empty( $shortcode_html ) ) {
	return false;
}
?>

<div class="goso-builder-element goso-shortcodes-2 <?php echo esc_attr( $shortcode_class ); ?>">
	<?php echo do_shortcode( $shortcode_html ); ?>
</div>
