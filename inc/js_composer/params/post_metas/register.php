<?php
/**
 * Callback for new param 'goso_post_metas'.
 *
 * @param array $settings
 * @param string $value
 *
 * @return string
 */
function goso_vc_param_post_metas( $settings, $value ) {
	$output = '';

	$post_metas = array(
		'pauthor'    => __( 'Author', GOSO_SNORLAX_FW ),
		'pdate'      => __( 'Date', GOSO_SNORLAX_FW ),
		'minread'    => __( 'Min Read', GOSO_SNORLAX_FW ),
		'pcomment'   => __( 'Comments', GOSO_SNORLAX_FW ),
		'pcountview' => __( 'Post Count Views', GOSO_SNORLAX_FW ),
	);

	foreach ( $post_metas as $k => $v ) {
		$checked = '';

		$array_vaule = $value ? explode( ',', $value ) : array();
		if ( $array_vaule && in_array( $k, $array_vaule ) ) {
			$checked = ' checked="checked"';
		}

		$output .= ' <label class="vc_checkbox-label"><input id="'
		           . $settings['param_name'] . '-' . $k . '" value="'
		           . $k . '" class="wpb_vc_param_value '
		           . $settings['param_name']
		           . ' ' . $settings['type']
		           . '" type="checkbox" name="'
		           . $settings['param_name'] . '"' . $checked . '> '
		           . $v . '</label><br>';

	}

	return $output;
}

