<?php
if ( ! class_exists( 'Goso_Mobile_Detect' ) ){
	require_once ( 'Mobile_Detect.php' );
}
if ( ! function_exists( 'goso_is_mobile' ) ) {
	function goso_is_mobile(){
		if ( ! wp_is_mobile() ) {
			return false;
		}
		$return = false;
		if ( class_exists( 'Goso_Mobile_Detect' ) ){
			$detect = new Goso_Mobile_Detect;
			
			if ( $detect->isMobile() && !$detect->isTablet() ) {
				$return = true;
			}
		}
		
		return $return;
	}
}

if ( ! function_exists( 'goso_is_tablet' ) ) {
	function goso_is_tablet(){
		
		$return = false;
		if ( class_exists( 'Goso_Mobile_Detect' ) ){
			$detect = new Goso_Mobile_Detect;
			
			if ( $detect->isTablet() ) {
				$return = true;
			}
		}
		
		return $return;
	}
}