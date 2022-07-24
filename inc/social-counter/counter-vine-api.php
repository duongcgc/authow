<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Goso_Social_Counter_Vine_API' ) ):
	class Goso_Social_Counter_Vine_API {
		public static function get_count( $data, $cache_period ) {

			$page_id      = preg_replace( '/\s+/', '', $data['name'] );
			$data['url']  = $page_id;
			$data['icon'] = goso_icon_by_ver( 'fab fa-vine' );

			$default_count = goso_get_social_counter_option( 'vine_default' );


			$data['count'] = $default_count ? $default_count : 0;


			return $data;
		}
	}

endif;
