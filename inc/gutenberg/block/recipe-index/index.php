<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if(  ! class_exists( 'Goso_Gutenberg_Authow_Recipe_Index' ) ):
class Goso_Gutenberg_Authow_Recipe_Index {

	public function render( $attributes, $content ) {
		if( ! function_exists( 'goso_recipe_index_function' ) ){
			$mess = esc_html__( 'Please active Goso Recipe plugin', 'authow' );
			return  '<div class="goso-wpblock">' . Goso_Authow_Gutenberg::message( 'Goso Recipe', $mess ) . '</div>';
		}

		$param = ' wpblock="true"';
		if( $attributes ){
			foreach ( (array)$attributes as $k => $v ){
				if( in_array( $k , array( 'display_title','display_cat','display_date','display_image','cat_link' ) ) ){
					$param .= ' ' . $k . '="' . ( $v ? 'yes' : 'no' ) . '"';
				}elseif( $v ){
					$param .= ' ' . $k . '="' . $v . '"';
				}
			}
		}
		$output = '<div class="goso-wpblock">';
		$output .= Goso_Authow_Gutenberg::message( 'Goso Recipe Index', esc_html__( 'Click to edit this block', 'authow' ) );
		$output .=  do_shortcode( '[goso_index' . $param . ']' );
		$output .= '</div><!--endgoso-block-->';
		return $output;
	}
	public function attributes() {
		$options = array(
			'title'         => array(
				'type'    => 'string',
				'default' => esc_html__( 'Recipe Index Title', 'authow' ),
			),
			'cat'           => array(
				'type'    => 'string',
				'default' => '',
			),
			'numbers_posts' => array(
				'type'    => 'number',
				'default' => '3',
			),
			'columns'       => array(
				'type'    => 'string',
				'default' => '3',
			),
			'display_title' => array(
				'type'    => 'boolean',
				'default' => true,
			),
			'display_cat'   => array(
				'type'    => 'boolean',
				'default' => false,
			),
			'display_date'  => array(
				'type'    => 'boolean',
				'default' => true,
			),
			'display_image' => array(
				'type'    => 'boolean',
				'default' => true,
			),
			'image_size'    => array(
				'type'    => 'string',
				'default' => 'landscape',
			),
			'cat_link'      => array(
				'type'    => 'boolean',
				'default' => true,
			),
			'cat_link_text' => array(
				'type'    => 'string',
				'default' => esc_html__( 'View All', 'authow' ),
			),
		);

		return $options;
	}
}
endif;