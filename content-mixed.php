<?php
/**
 * Template loop for mixed style
 */
?>
<?php

$goso_mixed_style = isset( $goso_mixed_style ) ? $goso_mixed_style : '';
/**
* Create var $jj to count order posts
* If $jj = 1, to show mixed post, $jj > 1 to show grid post
*
* @since 1.0
*/
$k = 3;
if ( ! isset ( $jj ) ) { $jj = 1; } else { $jj = $jj; }
if( ( is_home() && ! goso_get_setting( 'goso_sidebar_home' ) ) || ( is_archive() && ! goso_get_setting( 'goso_sidebar_archive' ) ) || is_page_template( 'page-vc.php' ) || is_page_template( 'page-goso-full-width.php' ) ):
	$k = 4;
endif;

if( isset( $template ) && $template == 'no-sidebar' ) {
	$k = 4;
}

if( 's1' == $goso_mixed_style ) {
	$k = 4;
} elseif( 's2' == $goso_mixed_style ) {
	$k = 3;
}

if ( ( $jj % $k ) == 1 ) {
	include( locate_template( 'content-mixed-post.php' ) );
}
else {
	include( locate_template( 'content-grid.php' ) );
}

$jj++;
?>