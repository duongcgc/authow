<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if(  ! class_exists( 'Goso_Gutenberg_Authow_Featured_Cat' ) ):
class Goso_Gutenberg_Authow_Featured_Cat {

	public function render( $attributes, $content ) {


		if( ! isset(  $attributes['category'] ) || ! $attributes['category'] ){
			$mess = esc_html__( 'Please fill the category slug.', 'authow' );
			return  '<div class="goso-wpblock">' . Goso_Authow_Gutenberg::message( 'Goso Featured Cat', $mess ) . '</div>';
		}

		$param = '';
		if( $attributes ){
			foreach ( (array)$attributes as $k => $v ){
				if( $v ){
					$param .= ' ' . $k . '="' . $v . '"';
				}
			}
		}

		$output = '<div class="goso-wpblock">';
		$output .= Goso_Authow_Gutenberg::message( 'Goso Featured Cat', esc_html__( 'Click to edit this block', 'authow' ) );
		$output .= do_shortcode( '[featured_cat  ' . $param . ']' );
		$output .= '</div><!--endgoso-block-->';
		return $output;
	}

	public function attributes() {
	$options = array(
		'style'    => array(
			'type'    => 'string',
			'default' => 'style-1',
		),
		'category' => array(
			'type' => 'string',
		),
		'number'   => array(
			'type'    => 'number',
			'default' => '5',
		),
		'orderby'  => array(
			'type'    => 'string',
			'default' => 'date',
		),
		'order'    => array(
			'type'    => 'string',
			'default' => 'DESC',
		)
	);

	return $options;
}
}
endif;