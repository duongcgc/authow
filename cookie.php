<?php
if( isset( $_POST['data'] ) ) {
	$cookie = isset( $_POST['data'] ) ? $_POST['data'] : 'show';
	
	if( $cookie == 'show' ) {
		setcookie( 'goso_law_footer', 'hide', time()+2592000, '/', $_SERVER['HTTP_HOST']);
	} else {
		setcookie( 'goso_law_footer', 'show',time()+2592000, '/', $_SERVER['HTTP_HOST']);
	}
	return '';
	
	exit;
}