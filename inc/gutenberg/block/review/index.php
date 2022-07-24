<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if(  ! class_exists( 'Goso_Gutenberg_Authow_Review' ) ):
class Goso_Gutenberg_Authow_Review {

	public function render( $attributes, $content ) {
		$post_ID = ( isset( $attributes['postID'] ) && $attributes['postID'] ) ? $attributes['postID'] : get_the_ID();
		
		if( ! $post_ID ){
			return esc_html__( 'Empty post id, Enter post Id' );
		}

		if( ! function_exists( 'goso_review_shortcode_function' ) ){
			$mess = esc_html__( 'Please active Goso Review plugin', 'authow' );
			return  '<div class="goso-wpblock">' . Goso_Authow_Gutenberg::message( 'Goso Review', $mess ) . '</div>';
		}

		$output = '<div class="goso-wpblock">';
		$output .= Goso_Authow_Gutenberg::message( 'Goso Review', esc_html__( 'Click to edit this block', 'authow' ) );
		$output .= do_shortcode( '[goso_review id="' . $post_ID . '"]' );
		$output .= '</div><!--endgoso-block-->';

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