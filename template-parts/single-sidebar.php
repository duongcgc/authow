<?php
$single_layout = get_theme_mod( "goso_single_layout" );

if ( ! $single_layout ) {
	if ( get_theme_mod( 'goso_left_sidebar_posts' ) ) {
		$single_layout = 'left';
	}else{
		$single_layout = 'right';
	}
}

$single_layout_meta = get_post_meta( get_the_ID(), 'goso_post_sidebar_display', true );
if ( $single_layout_meta ) {
	$single_layout = $single_layout_meta;
}

if ( in_array( $single_layout, array( 'left', 'right', 'two' ) ) ) {
	get_sidebar();
}
if ( $single_layout == 'two' ) {
	get_sidebar( 'left' );
}
