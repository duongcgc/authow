<?php

namespace GosoAuthowElementor\Modules\GosoPortfolio\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use GosoAuthowElementor\Base\Base_Widget;
use GosoAuthowElementor\Modules\QueryControl\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoPortfolio extends Base_Widget {

	public function get_name() {
		return 'goso-portfolio';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Portfolio', 'authow' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'portfolio' );
	}

	protected function register_controls() {
		

		$this->register_query_section_controls();

		// Section layout
		$this->start_controls_section(
			'section_page', array(
				'label' => esc_html__( 'Portfolio', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'goso_style', array(
				'label'   => __( 'Choose Style', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'masonry',
				'options' => array(
					'masonry' => esc_html__( 'Masonry', 'authow' ),
					'grid'    => esc_html__( 'Grid', 'authow' ),
				)
			)
		);

		$this->add_control(
			'goso_item_style', array(
				'label'   => __( 'Choose Item Style', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'text_overlay',
				'options' => array(
					'text_overlay' => esc_html__( 'Text Overlay', 'authow' ),
					'below_img'    => esc_html__( 'Text Below Image', 'authow' ),
				)
			)
		);

		$this->add_control(
			'goso_column', array(
				'label'   => __( 'Number Columns', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '3',
				'options' => array(
					'3' => esc_html__( '3 Columns', 'authow' ),
					'2' => esc_html__( '2 Columns', 'authow' ),
				)
			)
		);
		$this->add_control(
			'goso_image_type', array(
				'label'       => __( 'Image Type', 'authow' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'landscape',
				'options'     => array(
					'square'    => esc_html__( 'Square', 'authow' ),
					'vertical'  => esc_html__( 'Vertical', 'authow' ),
					'landscape' => esc_html__( 'Landscape', 'authow' ),
				),
				'description' => esc_html__( 'This option does not apply for "Masonry" Style', 'authow' ),
			)
		);

		$this->add_control(
			'goso_filter', array(
				'label'     => __( 'Display Filter?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Show', 'authow' ),
				'label_off' => __( 'Hide', 'authow' ),
				'default'   => 'yes',
			)
		);
		$this->add_control(
			'goso_all_text', array(
				'label' => __( 'All Portfolio Text', 'authow' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'goso_pagination', array(
				'label'   => __( 'Pagination', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'number',
				'options' => array(
					'number'        => esc_html__( 'Numeric Pagination', 'authow' ),
					'load_more'     => esc_html__( 'Load More Button', 'authow' ),
					'infinite'      => esc_html__( 'Infinite Load', 'authow' ),
					'next_previous' => esc_html__( 'Next/Previous', 'authow' ),
					'none'          => esc_html__( 'None', 'authow' ),
				)
			)
		);
		$this->add_control(
			'goso_numbermore', array(
				'label'     => __( 'Number of Posts Each Time Load More Posts', 'elementor' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 6,
				'condition' => array( 'goso_pagination' => array( 'load_more', 'infinite' ) )
			)
		);
		$this->add_control(
			'goso_lightbox', array(
				'label'     => __( 'Enable Click on Thumbnails to Open Lightbox?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
				'default'   => '',
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_portfolio',
			array(
				'label' => __( 'Portfolio', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'goso_filter_heading',
			array(
				'label' => __( 'Filter', 'authow' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'pfilter_color',
			array(
				'label'     => __( 'Link Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} post-entry .goso-portfolio-filter ul li a,{{WRAPPER}} .goso-portfolio-filter ul li a' => 'color: {{VALUE}};'
				),
			)
		);
		$this->add_control(
			'pfilter_hcolor',
			array(
				'label'     => __( 'Link Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} post-entry .goso-portfolio-filter ul li a:hover'  => 'color: {{VALUE}};',
					'{{WRAPPER}} post-entry .goso-portfolio-filter ul li.active a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .goso-portfolio-filter ul li a:hover'             => 'color: {{VALUE}};',
					'{{WRAPPER}} .goso-portfolio-filter ul li.active a'            => 'color: {{VALUE}};'
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pfilter_typo',
				'selector' => '{{WRAPPER}} post-entry .goso-portfolio-filter ul li a,{{WRAPPER}} .goso-portfolio-filter ul li a',
			)
		);

		$this->add_control(
			'pbgoverlay_color',
			array(
				'label'     => __( 'Portfolio Background Overlay Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .goso-portfolio-thumbnail a:after' => 'background-color: {{VALUE}};' ),
			)
		);
		// Title
		$this->add_control(
			'ptitle_heading',
			array(
				'label' => __( 'Title', 'authow' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'ptitle_color',
			array(
				'label'     => __( 'Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .inner-item-portfolio .portfolio-desc h3' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'ptitle_hcolor',
			array(
				'label'     => __( 'Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .inner-item-portfolio .portfolio-desc h3:hover' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'ptitle_typo',
				'selector' => '{{WRAPPER}} .inner-item-portfolio .portfolio-desc h3',
			)
		);

		// Cat
		$this->add_control(
			'pcat_heading',
			array(
				'label' => __( 'Category', 'authow' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'pcat_color',
			array(
				'label'     => __( 'Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .inner-item-portfolio .portfolio-desc span' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'pcat_hcolor',
			array(
				'label'     => __( 'Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .inner-item-portfolio .portfolio-desc span:hover' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pcat_typo',
				'selector' => '{{WRAPPER}} .inner-item-portfolio .portfolio-desc span',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$atts = array(
			'style',
			'image_type',
			'item_style',
			'number',
			'column',
			'cat',
			'all_text',
			'pagination',
			'numbermore',
			'loop',
			'elementor_query'
		);

		$atts_shortcode = array();

		foreach ( $atts as $att ) {
			if ( empty( $settings[ 'goso_' . $att ] ) ) {
				continue;
			}

			$atts_shortcode[ $att ] = $settings[ 'goso_' . $att ];
		}

		if ( 'yes' == $settings['goso_filter'] ) {
			$atts_shortcode['filter'] = 'true';
		} else {
			$atts_shortcode['filter'] = 'false';
		}

		if ( 'yes' == $settings['goso_lightbox'] ) {
			$atts_shortcode['lightbox'] = 'true';
		} else {
			$atts_shortcode['lightbox'] = 'false';
		}

		$query_args = Module::get_query_args( 'posts', $settings );
		$post_type  = $settings['posts_post_type'];

		$tax_query = array();
		if ( 'by_id' != $post_type ) {
			if ( 'post' == $post_type ) {
				$tax_query = isset( $settings['posts_category_ids'] ) ? $settings['posts_category_ids'] : array();
			} elseif ( 'portfolio' == $post_type ) {
				$tax_query = isset( $settings['posts_portfolio-category_ids'] ) ? $settings['posts_portfolio-category_ids'] : array();
			} elseif ( 'product' == $post_type ) {
				$tax_query = isset( $settings['posts_product_cat_ids'] ) ? $settings['posts_product_cat_ids'] : array();
			} elseif ( $post_type ) {
				$taxonomy_objects = get_object_taxonomies( $post_type );

				if ( isset( $taxonomy_objects[0] ) ) {
					$tax_first = $taxonomy_objects[0];

					$setting_key = 'posts_' . $tax_first . '_ids';
					$tax_query   = isset( $settings[ $setting_key ] ) ? $settings[ $setting_key ] : array();
				}
			}
		}

		if ( $tax_query ) {
			$query_args['filter_bar_ids'] = implode( ',', $tax_query );
		}

		$atts_shortcode['elementor_query'] = $query_args;

		if ( class_exists( 'Goso_Authow_Portfolio_Shortcode' ) ) {
			$portfolio = new \Goso_Authow_Portfolio_Shortcode;
			echo $portfolio->portfolio_shortcode( $atts_shortcode );
		}
	}
}
