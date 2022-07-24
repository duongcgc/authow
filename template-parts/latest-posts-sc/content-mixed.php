<?php
/**
 * Template loop for mixed style
 */
?>
<?php
$goso_featimg_size = isset( $goso_featimg_size ) ? $goso_featimg_size : '';
$goso_mixed_style = isset( $goso_mixed_style ) ? $goso_mixed_style : '';
/**
* Create var $j to count order posts
* If $j = 1, to show mixed post, $j > 1 to show grid post
*
* @since 1.0
*/
$k = 3;
if ( ! isset ( $j ) ) { $j = 1; } else { $j = $j; }
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

if ( ( $j % $k ) == 1 ) {
	include( locate_template( 'template-parts/latest-posts-sc/content-mixed-post.php' ) );
}
else {
	include( locate_template( 'template-parts/latest-posts-sc/content-grid.php' ) );
}

$j++;
?>