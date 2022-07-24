<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class GosoSingleSubtitle extends \Elementor\Widget_Base {

	public function get_title() {
		return esc_html__( 'Post - Sub Title', 'authow' );
	}

	public function get_icon() {
		return 'eicon-post-title';
	}

	public function get_categories() {
		return [ 'goso-single-builder' ];
	}

	public function get_keywords() {
		return [ 'single', 'subtitle' ];
	}

	protected function get_html_wrapper_class() {
		return 'pcsb-subtt elementor-widget-' . $this->get_name();
	}

	public function get_name() {
		return 'goso-single-sub-title';
	}

	protected function register_controls() {

		$this->start_controls_section( 'content_section', [
			'label' => esc_html__( 'General', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		] );

		$this->add_control( 'heading_markup', [
			'label'   => esc_html__( 'Title Markup', 'authow' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'default' => 'h2',
			'options' => [
				'h1' => 'H1',
				'h2' => 'H2',
				'h3' => 'H3',
				'h4' => 'H4',
				'h5' => 'H5',
				'h6' => 'H6',
			]
		] );

		$this->add_control( 'heading_align', [
			'label'     => __( 'Post Sub Title Align', 'authow' ),
			'type'      => \Elementor\Controls_Manager::CHOOSE,
			'default'   => 'left',
			'options'   => array(
				'left'   => array(
					'title' => __( 'Left', 'authow' ),
					'icon'  => 'eicon-text-align-left',
				),
				'center' => array(
					'title' => __( 'Center', 'authow' ),
					'icon'  => 'eicon-text-align-center',
				),
				'right'  => array(
					'title' => __( 'Right', 'authow' ),
					'icon'  => 'eicon-text-align-right',
				),
			),
			'toggle'    => true,
			'selectors' => [ '{{WRAPPER}} .goso-psub-title' => 'text-align:{{VALUE}}' ],
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'color_style', [
			'label' => esc_html__( 'Color & Styles', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), array(
			'name'     => 'heading_typo',
			'label'    => __( 'Typography for Post Sub Title', 'authow' ),
			'selector' => '{{WRAPPER}} .goso-psub-title',
		) );

		$this->add_control( 'main-text-color', [
			'label'     => 'Post Sub Title Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .goso-psub-title' => 'color:{{VALUE}} !important' ],
		] );

		$this->add_control( 'main-text-gcolor-enable', [
			'label' => 'Enable Gradient Color for Post Sub Title',
			'type'  => \Elementor\Controls_Manager::SWITCHER,
		] );

		$this->add_group_control( \Elementor\Group_Control_Background::get_type(), array(
			'name'      => 'main-text-gcolor',
			'label'     => __( 'Gradient Color', 'authow' ),
			'types'     => array( 'gradient' ),
			'selector'  => '{{WRAPPER}} .goso-psub-title span',
			'condition' => [ 'main-text-gcolor-enable' => 'yes' ]
		) );

		$this->add_control( 'main-text-inlinecolor-e', [
			'label'     => 'Use Inline Background Color?',
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [
				'{{WRAPPER}} .goso-psub-title' => 'background-color:var(--pcaccent-cl);display:inline;box-decoration-break: clone;padding: 3px 8px;',
			],
		] );

		$this->add_control( 'main-text-inlinecolor', [
			'label'     => 'Inline Background Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .goso-psub-title' => 'background-color:{{VALUE}}' ],
			'condition' => [ 'main-text-inlinecolor-e' => 'yes' ]
		] );

		$this->add_control( 'main-text-inline-d', [
			'label'      => 'Inline Background Padding',
			'type'       => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px' ],
			'selectors'  => [
				'{{WRAPPER}} .goso-psub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
			'condition'  => [ 'main-text-inlinecolor-e' => 'yes' ]
		] );

		$this->end_controls_section();

	}

	protected function render() {

		if ( goso_elementor_is_edit_mode() ) {
			$this->preview_content();
		} else {
			$this->builder_content();
		}

	}

	protected function preview_content() {
		$settings    = $this->get_settings_for_display();
		$heading_tag = $settings['heading_markup'];
		$class       = $settings['main-text-gcolor-enable'] ? ' gradient-enable' : '';
		echo '<' . $heading_tag . ' class="goso-psub-title' . $class . '"><span>Sub Title Heading of The Post</span></' . $heading_tag . '>';
	}

	protected function builder_content() {
		$settings    = $this->get_settings_for_display();
		$heading_tag = $settings['heading_markup'];
		$class       = $settings['main-text-gcolor-enable'] ? ' gradient-enable' : '';
		$sub_title   = get_post_meta( get_the_ID(), 'goso_post_sub_title', true );
		if ( $sub_title ) {
			echo '<' . $heading_tag . ' class="goso-psub-title' . $class . '"><span>' . $sub_title . '</span></' . $heading_tag . '>';
		}
	}
}
