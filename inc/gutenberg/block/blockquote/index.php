<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if(  ! class_exists( 'Goso_Gutenberg_Authow_Blockquote' ) ):
class Goso_Gutenberg_Authow_Blockquote {

	public function render( $attributes, $content ) {
		if( ! function_exists( 'penci_blockquote_shortcode' ) ){
			$mess = esc_html__( 'Please active Goso Shortcodes plugin', 'authow' );
			return  '<div class="penci-wpblock">' . Goso_Authow_Gutenberg::message( 'Goso Blockquote', $mess ) . '</div>';
		}

		$param = ' wpblock="true"';
		if( $attributes ){
			foreach ( (array)$attributes as $k => $v ){
				if( $v && 'content' != $k ){
					$param .= ' ' . $k . '="' . $v . '"';
				}
			}
		}
		
		$block_style = get_theme_mod('penci_blockquote_style') ? get_theme_mod('penci_blockquote_style') : 'style-1';
		$output = '<div class="penci-wpblock blockquote-' . $block_style . '">';
		$output .= Goso_Authow_Gutenberg::message( 'Goso Block Quote', esc_html__( 'Click to edit this block', 'authow' ) );
		$output .=  do_shortcode( '[blockquote  ' . $param . ']' . ( $attributes['content'] ? $attributes['content'] : '' ) . '[/blockquote]' );
		$output .= '</div><!--endpenci-block-->';

		return $output;
	}
	public function attributes() {
		$options = array(
			'content' => array(
				'type'    => 'string',
				'default' => esc_html__( 'Add Quote Content...', 'authow' ),
			),
			'author'  => array(
				'type'    => 'string',
				'default' => esc_html__( 'Add Quote Author...', 'authow' ),
			),
			'align' => array(
				'type'    => 'none',
				'default' => ''
			),
		);

		return $options;
	}
}
endif;