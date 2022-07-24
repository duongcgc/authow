<?php
remove_action( 'admin_footer', 'vc_loop_include_templates', 1 );
add_action( 'wp_ajax_vc_edit_form', 'goso_remove_shortcode_param_loop', 1 );
if ( ! function_exists( 'goso_remove_shortcode_param_loop' ) ) {
	function goso_remove_shortcode_param_loop() {
		global $vc_params_list;

		$key = array_search( 'loop', $vc_params_list, true );
		if ( false !== $key ) {
			unset( $vc_params_list[ $key ] );
		}

	}
}

require get_template_directory() . '/inc/js_composer/params/loop/register.php';
require get_template_directory() . '/inc/js_composer/params/number/register.php';
require get_template_directory() . '/inc/js_composer/params/only_number/register.php';
require get_template_directory() . '/inc/js_composer/params/post_metas/register.php';
require get_template_directory() . '/inc/js_composer/params/separator/register.php';
require get_template_directory() . '/inc/js_composer/params/custom_markup/register.php';
require get_template_directory() . '/inc/js_composer/params/heading_title/register.php';

vc_add_shortcode_param( 'loop', 'goso_authow_vc_param_loop' );
vc_add_shortcode_param( 'goso_number', 'goso_vc_param_number' );
vc_add_shortcode_param( 'goso_only_number', 'goso_vc_param_only_number' );
vc_add_shortcode_param( 'goso_post_metas', 'goso_vc_param_post_metas' );
vc_add_shortcode_param( 'goso_separator', 'goso_vc_param_separator' );
vc_add_shortcode_param( 'goso_custom_markup', 'goso_vc_param_custom_markup' );
vc_add_shortcode_param( 'goso_heading_title', 'goso_vc_param_heading_title' );
