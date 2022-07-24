<?php
defined( 'GOSO_FW' ) || define( 'GOSO_FW', 'authow' );
defined( 'GOSO_FW_VERSION' ) || define( 'GOSO_FW_VERSION', '10.0.0' );
defined( 'GOSO_FW_URL' ) || define( 'GOSO_FW_URL', get_template_directory_uri() );
defined( 'GOSO_FW_FILE' ) || define( 'GOSO_FW_FILE', __FILE__ );
defined( 'GOSO_FW_DIR' ) || define( 'GOSO_FW_DIR', get_template_directory_uri() );
defined( 'GOSO_THEME_URL' ) || define( 'GOSO_THEME_URL', GOSO_FW_URL );

// Need to define GOSO_URL on plugin / Themes.
defined( 'GOSO_URL' ) || define( 'GOSO_URL', GOSO_THEME_URL . '/inc/customizer/framework' );
defined( 'GOSO_VERSION' ) || define( 'GOSO_VERSION', '1.2.6' );
defined( 'GOSO_DIR' ) || define( 'GOSO_DIR', dirname( __FILE__ ) );
defined( 'GOSO_CLASSPATH' ) || define( 'GOSO_CLASSPATH', GOSO_DIR );

require_once 'autoload.php';
require_once get_template_directory() . '/inc/customizer/config/autoload.php';
require_once get_template_directory() . '/inc/customizer/config/classes/class-customizer.php';
require_once get_template_directory() . '/inc/customizer/config/options/init.php';
require_once get_template_directory() . '/inc/customizer/config/settings.php';
\AuthowFW\Customizer::getInstance();

add_action( 'init', 'authow_fw_initialize_customizer' );

/**
 * Initialize Customizer
 */
if ( ! function_exists( 'authow_fw_initialize_customizer' ) ) {
	function authow_fw_initialize_customizer() {
		// Instantiate Customizer.
		AuthowFW\Customizer\Customizer::get_instance();
	}
}
