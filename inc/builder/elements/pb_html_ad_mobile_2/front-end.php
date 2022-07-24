<?php
$ads_html = goso_get_builder_mod( 'goso_header_builder_pb_html_mobile_2_name', false );
if ( empty( $ads_html ) ) {
	return false;
}
?>

<div class="goso-builder-element goso-html-ads goso-html-ads-mobile-2">
	<?php echo do_shortcode( $ads_html ); ?>
</div>
