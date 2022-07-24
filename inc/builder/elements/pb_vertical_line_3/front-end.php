<?php
// verical line
$line3_width = goso_get_builder_mod( 'goso_header_pb_vertical_line3_width' );
$line3_height = goso_get_builder_mod( 'goso_header_pb_vertical_line3_height' );
$line3_color = goso_get_builder_mod( 'goso_header_pb_vertical_line3_color' );
$line3_class = goso_get_builder_mod( 'goso_header_pb_vertical_line3_class' );
$data_attr   = [];
if ( ! empty( $line3_width ) ) {
	$data_attr[] = 'width:' . $line3_width . 'px;';
}
if ( ! empty( $line3_height ) ) {
	$data_attr[] = 'height:' . $line3_height . 'px;';
}
if ( ! empty( $line3_color ) ) {
	$data_attr[] = 'background-color:' . $line3_color . ';';
}
$data_attr = implode( ' ', $data_attr );
?>
<div style="<?php echo $data_attr; ?>"
     class="goso-builder-element goso-vertical-line vertical-line-3 <?php echo esc_attr( $line3_class ); ?>"></div>
