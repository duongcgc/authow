<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if(  ! class_exists( 'Goso_Gutenberg_Authow_Portfolio' ) ):
class Goso_Gutenberg_Authow_Portfolio {

	public function render( $attributes, $content ) {

		if( ! function_exists( 'penci_portfolio_shortcode' ) ){
			$mess = esc_html__( 'Please active Goso Portfolio plugin', 'authow' );
			return  '<div class="penci-wpblock">' . Goso_Authow_Gutenberg::message( 'Goso Portfolio', $mess ) . '</div>';
		}

		$param = ' wpblock="true"';
		if( $attributes ){
			foreach ( (array)$attributes as $k => $v ){
				if( $v ){
					$param .= ' ' . $k . '="' . $v . '"';
				}
			}
		}
		$output = '<div class="penci-wpblock">';
		$output .= Goso_Authow_Gutenberg::message( 'Goso Portfolio', esc_html__( 'Click to edit this block', 'authow' ) );
		$output .=  do_shortcode( '[portfolio ' . $param . ']' );
		$output .= '</div><!--endpenci-block-->';

		return $output;
	}
	public function attributes() {
		$options = array(
			'style'      => array(
				'type'    => 'string',
				'default' => 'masonry',
			),
			'cat'        => array(
				'type' => 'string',
			),
			'number'     => array(
				'type'    => 'number',
				'default' => '15',
			),
			'pagination' => array(
				'type'    => 'string',
				'default' => 'number',
			),
			'numbermore' => array(
				'type'    => 'number',
				'default' => '6',
			),
			'image_type' => array(
				'type'    => 'string',
				'default' => 'landscape',
			),
			'filter'     => array(
				'type'    => 'string',
				'default' => 'true',
			),
			'column'     => array(
				'type'    => 'number',
				'default' => '3',
			),
			'all_text'   => array(
				'type'    => 'string',
				'default' => esc_html__( 'All', 'authow' ),
			),
		);

		return $options;
	}
}
endif;