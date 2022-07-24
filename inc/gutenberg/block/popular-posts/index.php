<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if(  ! class_exists( 'Goso_Gutenberg_Authow_Popular_Posts' ) ):
class Goso_Gutenberg_Authow_Popular_Posts {

	public function render( $attributes, $content ) {
		$param = ' wpblock="true"';
		if( $attributes ){
			foreach ( (array)$attributes as $k => $v ){
				if( $v ){
					$param .= ' ' . $k . '="' . $v . '"';
				}
			}
		}

		$output = '<div class="goso-wpblock">';
		$output .= Goso_Authow_Gutenberg::message( 'Goso Popular Posts', esc_html__( 'Click to edit this block', 'authow' ) );
		$output .= do_shortcode( '[popular_posts  ' . $param . ']' );
		$output .= '</div><!--endgoso-block-->';

		return $output;
	}

	public function attributes() {
		$options = array(
			'title'    => array(
				'type'    => 'string',
				'default' => esc_html__( 'Popular Posts', 'authow' ),
			),
			'type'     => array(
				'type'    => 'string',
				'default' => 'all',
			),
			'category' => array(
				'type' => 'string',
			),
			'number'   => array(
				'type'    => 'string',
				'default' => '12',
			),
			'columns'  => array(
				'type'    => 'string',
				'default' => '4',
			)
		);

		return $options;
	}
}
endif;