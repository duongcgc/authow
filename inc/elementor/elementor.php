<?php
define( 'GOSO_ELEMENTOR_PATH', get_template_directory()  . '/inc/elementor/'  );
define( 'GOSO_ELEMENTOR_URL', get_template_directory_uri()  . '/inc/elementor/'  );

if ( ! class_exists( 'Goso_Authow_Elementor_Extension' ) ):
	final class Goso_Authow_Elementor_Extension {
		private static $_instance = null;
		
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}
		
		public function __construct() {
			require GOSO_ELEMENTOR_PATH . 'loader.php';
		}
	}

	Goso_Authow_Elementor_Extension::instance();
endif;