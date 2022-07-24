<?php
$date_time_format = goso_get_builder_mod( 'goso_header_pb_data_time_format' );
$class            = goso_get_builder_mod( 'goso_header_pb_data_time_css_class' );
if ( empty( $date_time_format ) ) {
	return false;
}
?>

<div class="goso-builder-element goso-data-time-format <?php echo esc_attr( $class ); ?>">
	<?php
	if ( function_exists( 'wp_date' ) ) {
		$return = wp_date( $date_time_format );
	} else {
		$return = current_time( $date_time_format );
	}
	?>
    <span><?php echo $return; ?></span>
</div>
