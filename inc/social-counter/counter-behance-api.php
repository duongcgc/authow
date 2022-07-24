<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Goso_Social_Counter_Behance_API' ) ):
	class Goso_Social_Counter_Behance_API {
		public static function get_count( $data, $cache_period ) {

			$user_id      = preg_replace( '/\s+/', '', $data['name'] );
			$data['url']  = "https://www.behance.net/$user_id";
			$data['icon'] = goso_icon_by_ver( 'fab fa-behance' );

			$behance_api           = goso_get_social_counter_option( 'behance_api' );
			$behance_count_default = goso_get_social_counter_option( 'behance_default' );
			$behance_count         = $behance_count_default ? $behance_count_default : get_transient( 'goso_counter_behance' . $user_id );

			if ( ! $behance_count && $behance_api ) {
				try {
					$data  = @goso_remote_get( "http://www.behance.net/v2/users/$user_id?api_key=$behance_api" );
					$count = (int) $data['user']['stats']['followers'];
				} catch ( Exception $e ) {
					$count = 0;
				}
				set_transient( 'goso_counter_behance' . $user_id, $count, $cache_period );
			} else {
				$count = $behance_count;
			}

			if ( $count ) {
				$data['count'] = $count;
			}

			return $data;
		}
	}

endif;
