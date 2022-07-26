<?php

namespace GosoAuthowElementor\Modules\GosoMap\Widgets;

use Elementor\Controls_Manager;
use GosoAuthowElementor\Base\Base_Widget;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoMap extends Base_Widget {

	public function get_name() {
		return 'goso-map';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Map', 'authow' );
	}

	public function get_icon() {
		return 'eicon-google-maps';
	}

	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'map' );
	}

	public function get_script_depends() {
		return array( 'google-map' );
	}

	protected function register_controls() {
		

		$this->start_controls_section(
			'section_general', array(
				'label' => esc_html__( 'Map', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'map_api', array(
				'label'   => __( 'Google Map API key', 'authow' ),
				'type'    => Controls_Manager::HIDDEN,
				'default' => get_theme_mod( 'goso_map_api_key', '' ),
			)
		);
		$query['autofocus[control]'] = 'goso_map_api_key';
		$google_map_api_link         = add_query_arg( $query, admin_url( 'customize.php' ) );
		$this->add_control(
			'map_desc',
			[
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => '<span style="color: #fff;">Note Important: </span>If you want to use full features of Google Map, you need to enter the Google MAP API on <a
                            href="' . esc_url( $google_map_api_link ) . '"
                            target="_blank">this page</a> first.',
				'separator'       => 'after',
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
			]
		);
		$this->add_control(
			'map_using', array(
				'label'   => __( 'Insert Map Using', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'address',
				'options' => array(
					'address'     => esc_html__( 'Address', 'authow' ),
					'coordinates' => esc_html__( 'Coordinates', 'authow' ),
				)
			)
		);
		$this->add_control(
			'address', array(
				'label'     => __( 'Address', 'authow' ),
				'type'      => Controls_Manager::TEXT,
				'condition' => array( 'map_using' => 'address' ),
			)
		);
		$this->add_control(
			'latitude', array(
				'label'     => __( 'Latitude', 'authow' ),
				'type'      => Controls_Manager::TEXT,
				'condition' => array( 'map_using' => 'coordinates' ),
			)
		);
		$this->add_control(
			'longtitude', array(
				'label'     => __( 'Longtitude', 'authow' ),
				'type'      => Controls_Manager::TEXT,
				'condition' => array( 'map_using' => 'coordinates' ),
				'separator' => 'after',
			)
		);
		$this->add_control(
			'map_type', array(
				'label'     => __( 'Map type', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'road',
				'options'   => array(
					'road'      => esc_html__( 'Road', 'authow' ),
					'satellite' => esc_html__( 'Satellite', 'authow' ),
					'hybrid'    => esc_html__( 'Hybrid', 'authow' ),
					'terrain'   => esc_html__( 'Terrain', 'authow' ),
					'custom'    => esc_html__( 'Custom', 'authow' ),
				),
				'condition' => [ 'map_api!' => '' ],
			)
		);
		$this->add_control(
			'map_width', array(
				'label'      => __( 'Width', 'authow' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => array(
					'%'  => array( 'min' => 0, 'max' => 100 ),
					'px' => array( 'min' => 0, 'max' => 2000 )
				),
				'size_units' => array( '%', 'px' ),
			)
		);
		$this->add_control(
			'map_height', array(
				'label' => __( 'Height', 'authow' ),
				'type'  => Controls_Manager::NUMBER,
			)
		);
		$this->add_control(
			'marker_img',
			array(
				'label'     => __( 'Marker Image', 'authow' ),
				'type'      => Controls_Manager::MEDIA,
				'separator' => 'before',
				'condition' => [ 'map_api!' => '' ],
			)
		);
		$this->add_control(
			'marker_title', array(
				'label'     => __( 'Marker Title', 'authow' ),
				'type'      => Controls_Manager::TEXT,
				'condition' => [ 'map_api!' => '' ],
			)
		);
		$this->add_control(
			'info_window', array(
				'label'     => __( 'Info Window', 'authow' ),
				'type'      => Controls_Manager::TEXTAREA,
				'separator' => 'after',
				'condition' => [ 'map_api!' => '' ],
			)
		);
		$pmetas = array(
			'map_is_zoom'     => array( 'label' => __( 'Zoom', 'authow' ) ),
			'map_pan'         => array( 'label' => __( 'Pan', 'authow' ) ),
			'map_scale'       => array( 'label' => __( 'Map scale', 'authow' ) ),
			'map_street_view' => array( 'label' => __( 'Street view', 'authow' ) ),
			'map_rotate'      => array( 'label' => __( 'Rotate', 'authow' ) ),
			'map_overview'    => array( 'label' => __( 'Overview map', 'authow' ) ),
			'map_scrollwheel' => array( 'label' => __( 'Scrollwheel', 'authow' ) ),
		);

		foreach ( $pmetas as $key => $pmeta ) {
			$this->add_control(
				$key, array(
					'label'     => $pmeta['label'],
					'type'      => Controls_Manager::SWITCHER,
					'label_on'  => __( 'Yes', 'authow' ),
					'label_off' => __( 'No', 'authow' ),
					'condition' => [ 'map_api!' => '' ],
				)
			);
		}

		$this->add_control(
			'map_zoom', array(
				'label'   => __( 'Zoom', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '8',
				'options' => array(
					6  => 6,
					7  => 7,
					8  => 8,
					9  => 9,
					10 => 10,
					11 => 11,
					12 => 12,
					13 => 13,
					14 => 14,
					15 => 15,
					16 => 16,
				)
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();


		$default = array(
			'goso_block_width' => '3',
			'shortcode_id'      => 'map',
			'map_using'         => '',
			'address'           => '',
			'latitude'          => '',
			'longtitude'        => '',
			'map_type'          => '',
			'map_width'         => '',
			'map_height'        => '',
			'marker_img'        => '',
			'marker_title'      => '',
			'info_window'       => '',
			'map_is_zoom'       => '',
			'map_pan'           => '',
			'map_scale'         => '',
			'map_street_view'   => '',
			'map_rotate'        => '',
			'map_overview'      => '',
			'map_scrollwheel'   => '',
			'map_zoom'          => '',
			'come_from'         => 'vc'
		);

		$atts = shortcode_atts( $default, $settings );

		$css_class = 'goso-block-vc goso-google-map';

		$width  = isset( $settings['map_width']['size'] ) && $settings['map_width']['size'] ? $settings['map_width']['size'] . $settings['map_width']['unit'] : '100%';
		$height = intval( $settings['map_height'] ) ? $settings['map_height'] . 'px' : '500px';

		$atts['map_zoom']   = intval( $settings['map_zoom'] ? $settings['map_zoom'] : 8 );
		$atts['marker_img'] = $this->get_marker_img_el( $settings['marker_img'] );

		$option = htmlentities( json_encode( $atts ), ENT_QUOTES, "UTF-8" );

		$block_id = 'goso_map_' . rand( 1000, 100000 );

		$map_api = get_theme_mod( 'goso_map_api_key' );

		if ( 'address' == $settings['map_using'] ) {
			$map_address = $settings['address'];
		} else {
			$map_address = $settings['latitude'] . ',' . $settings['longtitude'];
		}

		if ( $map_api ) {
			printf( '<div style="width:%s;height:%s" id="%s" class="%s" data-map_options="%s"></div>', $width, $height, $block_id, $css_class, $option );
		} else {
			$params    = [
				rawurlencode( $map_address ),
				absint( $settings['map_zoom'] ),
				esc_attr( $settings['map_type'] ),
			];
			$map_url   = 'https://maps.google.com/maps?q=%1$s&amp;t=m&amp;z=%2$d&amp;output=embed&amp;iwloc=near&amp;maptype=%3$s';
			$map_url   = esc_url( vsprintf( $map_url, $params ) );
			$css_class = 'goso-block-vc goso-lazy no-api';
			printf( '<iframe style="width:%s;height:%s" id="%s" class="%s" data-src="%s"></iframe>', $width, $height, $block_id, $css_class, $map_url );
		}
	}

	public function get_marker_img_el( $image, $thumbnail_size = 'thumbnail' ) {
		if ( empty( $image['url'] ) ) {
			return '';
		}
		if ( ! empty( $image['id'] ) ) {
			$attr = wp_get_attachment_image_src( $image['id'], $thumbnail_size );
			if ( isset( $attr['url'] ) && $attr['url'] ) {
				$image['url'] = $attr['url'];
			}
		}

		return $image['url'];
	}

}
