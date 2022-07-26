<?php
// No direct access, please
function goso_is_new_update( $version = null ){
	if( ! is_admin() || get_theme_mod( 'goso_disable_notice_updates' ) ){
		return false;
	}
	
	$url = 'https://goso-api.s3.amazonaws.com/datas.json';
	// Namespace in case of collision, since transients don't support groups like object caching.
	$cache_key = md5( 'remote_apis|' . $url );
	$request = get_transient( $cache_key );

	if ( false === $request ) {
		$request = wp_remote_get( $url );

		if ( is_wp_error( $request ) ) {
			// Cache failures for a short time, will speed up page rendering in the event of remote failure. Cache for 15 mins = 60 * 15 = 900
			set_transient( $cache_key, $request, 900 );
			return false;
		}
		// Success, cache for a longer time - 24 hours = 60 * 60 * 24 = 86400
		set_transient( $cache_key, $request, 86400 );
	}

	if ( is_wp_error( $request ) ) {
		return false;
	}

	$body = wp_remote_retrieve_body( $request );
	$data = json_decode( $body );

	if ( ! empty( $data ) ) {
		$current_version = $data->authow->version;
		if( isset( $current_version ) ){
			if( 'version' == $version ){
				return $current_version;
			}
			if( ! defined('GOSO_SOLEDAD_VERSION') || empty( GOSO_SOLEDAD_VERSION ) || version_compare( $current_version, GOSO_SOLEDAD_VERSION, '<=' ) ) {
				return false;
			} else {
				return true;
			}
		}
	}
}