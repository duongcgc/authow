<?php
/**
 * Callback for new param 'goso_number'.
 *
 * @param array $settings
 * @param string $value
 *
 * @return string
 */
function goso_vc_param_number( $settings, $value ) {

	$units = array( 'px', 'em', 'rem', '%' );

	$input = $unit  = $prefix = '';

	if ( preg_match( '/(-|)(\d*)(px|em|rem|%)/', $value, $matches ) ) {
		$prefix = $matches[1];
		$input  = $matches[2];
		$unit   = $matches[3];
	}
	$output = '<div class="goso-number">';

	// Hidden input
	$output .= sprintf(
		'<input type="hidden" class="wpb_vc_param_value" name="%s" value="%s">',
		esc_attr( $settings['param_name'] ),
		esc_attr( $value )
	);

	// Input and units
	$output .= sprintf( '<input type="number" class="goso-number-input" value="%s">',  esc_attr( $prefix ) . esc_attr( $input ) );
	$output .= '<select class="goso-number-suffix">';
	foreach ( $units as $v ) {
		$output .= '<option value="' . esc_attr( $v ) . '" ' . selected( $v, $unit, false ) . '>' . esc_html( $v ) . '</option>';
	}
	$output .= '</select>';
	$output .= '</div>';

	return $output;
}