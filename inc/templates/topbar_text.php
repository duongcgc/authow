<?php if( goso_get_setting( 'goso_tb_date_text' ) ){
$custom_text = goso_get_setting( 'goso_tb_date_text' );
?>
<div class="pctopbar-item goso-topbar-ctext">
	<?php echo do_shortcode( $custom_text ); ?>
</div>
<?php } ?>