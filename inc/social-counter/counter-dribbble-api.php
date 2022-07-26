<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Goso_Social_Counter_Dribbble_API' ) ):
	class Goso_Social_Counter_Dribbble_API {
		public static function get_count( $data, $cache_period ) {

			$page_id      = preg_replace( '/\s+/', '', $data['name'] );
			$data['url']  = "https://dribbble.com/$page_id";
			$data['icon'] = goso_icon_by_ver( 'fab fa-dribbble' );

			$count = goso_get_social_counter_option( 'dribbble_default' );

			$data['count'] = $count ? $count : 0;

			return $data;
		}
	}

endif;
