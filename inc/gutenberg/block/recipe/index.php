<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if(  ! class_exists( 'Goso_Gutenberg_Authow_Recipe' ) ):
class Goso_Gutenberg_Authow_Recipe {

	public function render( $attributes, $content ) {
		$post_ID = ( isset( $attributes['postID'] ) && $attributes['postID'] ) ? $attributes['postID'] : get_the_ID();
		
		if( ! $post_ID ){
			return esc_html__( 'Empty post id, Enter post Id' );
		}

		if( ! function_exists( 'penci_recipe_shortcode_function' ) ){
			$mess = esc_html__( 'Please active Goso Recipe plugin', 'authow' );
			return  '<div class="penci-wpblock">' . Goso_Authow_Gutenberg::message( 'Goso Recipe', $mess ) . '</div>';
		}
		$output = '<div class="penci-wpblock">';
		$output .= Goso_Authow_Gutenberg::message( 'Goso Recipe', esc_html__( 'Click to edit this block', 'authow' ) );
		$shortcode =  do_shortcode( '[penci_recipe id="' . $post_ID . '"]' );
		$output .= str_replace( array( "\r\n", "\r", "\n\n", "\n" ), '', $shortcode );
		$output .= '</div><!--endpenci-block-->';

		return $output;
	}
	public function attributes() {
		$post_id = isset( $_GET['post'] ) ? $_GET['post'] : '';

		$options = array(
			'postID' => array(
				'type' => 'string',
				'default' =>  $post_id,
			)
		);

		return $options;
	}
}
endif;