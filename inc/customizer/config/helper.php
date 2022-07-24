<?php
if ( ! function_exists( 'goso_fw_customizer' ) ) {
	function goso_fw_customizer() {
		return AuthowFW\Customizer\Customizer::get_instance();
	}
}
