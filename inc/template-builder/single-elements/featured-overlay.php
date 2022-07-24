<?php

use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class GosoSingleFeaturedOverlay extends \Elementor\Widget_Base {

	public function get_title() {
		return esc_html__( 'Post - Featured Image Overlay', 'authow' );
	}

	public function get_icon() {
		return 'eicon-parallax';
	}

	public function get_categories() {
		return [ 'goso-single-builder' ];
	}

	public function get_keywords() {
		return [ 'single', 'title' ];
	}

	protected function get_html_wrapper_class() {
		return 'pcsb-ft-o elementor-widget-' . $this->get_name();
	}

	public function get_name() {
		return 'goso-single-featured-overlay';
	}

	protected function register_controls() {

		$this->start_controls_section( 'content_section', [
			'label' => esc_html__( 'General', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		] );

		$this->add_control( 'goso_enable_jarallax_single', [
			'label' => esc_html__( 'Enable Parallax on Featured Image', 'authow' ),
			'type'  => \Elementor\Controls_Manager::SWITCHER,
		] );

		$this->add_control( 'img_size', [
			'label'   => esc_html__( 'Image Size', 'authow' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => $this->get_list_image_sizes( true ),
		] );

		$this->add_control( 'img_msize', [
			'label'   => esc_html__( 'Image Mobile Size', 'authow' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => $this->get_list_image_sizes( true ),
		] );

		$this->add_responsive_control( 'img_ratio', [
			'label'     => esc_html__( 'Image Ratio (in %)', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
			'selectors' => array(
				'{{WRAPPER}} .goso-single-featured-img,{{WRAPPER}} .goso-jarallax' => 'padding-top: {{SIZE}}% !important;',
			),
		] );


		$this->end_controls_section();

		$this->start_controls_section( 'content_overlay', [
			'label' => esc_html__( 'Overlay Content', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		] );

		$this->add_control( 'content_overlay_align', [
			'label'     => esc_html__( 'Text Align', 'authow' ),
			'type'      => \Elementor\Controls_Manager::CHOOSE,
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
			'selectors' => [ '{{WRAPPER}} .standard-post-special_wrapper,{{WRAPPER}} .standard-post-special_wrapper .goso-fto-ct,{{WRAPPER}} .standard-post-special_wrapper *,{{WRAPPER}} .post-box-meta-single' => 'text-align:{{VALUE}}' ],
		] );

		$this->add_control( 'content_overlay_calign', [
			'label'     => esc_html__( 'Content Align', 'authow' ),
			'type'      => \Elementor\Controls_Manager::CHOOSE,
			'options'   => array(
				'start'  => array(
					'title' => __( 'Top', 'authow' ),
					'icon'  => 'eicon-v-align-top',
				),
				'center' => array(
					'title' => __( 'Center', 'authow' ),
					'icon'  => 'eicon-v-align-middle',
				),
				'end'    => array(
					'title' => __( 'Bottom', 'authow' ),
					'icon'  => 'eicon-v-align-bottom',
				),
			),
			'default'   => 'end',
			'toggle'    => true,
			'selectors' => [ '{{WRAPPER}} .standard-post-special_wrapper' => 'bottom:20px;top:20px;display:flex;flex-wrap: wrap;flex-direction: column;justify-content:{{VALUE}}' ],
		] );

		$this->add_control( 'hide_breadcrumb', [
			'label'     => esc_html__( 'Hide Breadcrumb', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [ '{{WRAPPER}} .goso-breadcrumb' => 'display:none' ],
		] );

		$this->add_control( 'hide_title', [
			'label'     => esc_html__( 'Hide Post Title', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [ '{{WRAPPER}} .single-post-title' => 'display:none' ],
		] );

		$this->add_control( 'hide_subtitle', [
			'label' => esc_html__( 'Hide Post Sub Title', 'authow' ),
			'type'  => \Elementor\Controls_Manager::SWITCHER,
		] );

		$this->add_control( 'goso_post_cat', [
			'label' => esc_html__( 'Hide Post Categories', 'authow' ),
			'type'  => \Elementor\Controls_Manager::SWITCHER,
		] );

		$this->add_control( 'hide_info', [
			'label'     => esc_html__( 'Hide Post Meta', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [ '{{WRAPPER}} .post-box-meta-single' => 'display:none' ],
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'mobile_displayss', [
			'label' => esc_html__( 'Mobile Displays', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		] );

		$this->add_control( 'mobile_breadcrumb', [
			'label'     => esc_html__( 'Hide Breadcrumb on Mobile', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [ '(mobile) {{WRAPPER}} .container.goso-breadcrumb' => 'display:none' ]
		] );

		$this->add_control( 'mobile_categories', [
			'label'     => esc_html__( 'Hide Categories on Mobile', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [ '(mobile) {{WRAPPER}} .goso-single-cat' => 'display:none' ]
		] );

		$this->add_control( 'mobile_stitle', [
			'label'     => esc_html__( 'Hide Sub Title on Mobile', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [ '(mobile) {{WRAPPER}} .goso-psub-title' => 'display:none' ]
		] );

		$this->add_control( 'mobile_meta_head', [
			'label' => esc_html__( 'Post Meta on Mobile', 'authow' ),
			'type'  => \Elementor\Controls_Manager::HEADING,
		] );

		$this->add_control( 'mobile_malls', [
			'label'     => esc_html__( 'Hide all Post Meta on Mobile', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [ '(mobile) {{WRAPPER}} .post-box-meta-single' => 'display:none' ]
		] );

		$this->add_control( 'mobile_mauthor', [
			'label'     => esc_html__( 'Hide Post Author on Mobile', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [ '(mobile) {{WRAPPER}} .post-box-meta-single .author-post' => 'display:none' ]
		] );

		$this->add_control( 'mobile_mdate', [
			'label'     => esc_html__( 'Hide Post Date on Mobile', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [ '(mobile) {{WRAPPER}} .post-box-meta-single .pctmp-date-post' => 'display:none' ]
		] );

		$this->add_control( 'mobile_mcomments', [
			'label'     => esc_html__( 'Hide Comments on Mobile', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [ '(mobile) {{WRAPPER}} .post-box-meta-single .pctmp-comment-post' => 'display:none' ]
		] );

		$this->add_control( 'mobile_mview', [
			'label'     => esc_html__( 'Hide Post Views on Mobile', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [ '(mobile) {{WRAPPER}} .post-box-meta-single .pctmp-view-post' => 'display:none' ]
		] );

		$this->add_control( 'mobile_rtimes', [
			'label'     => esc_html__( 'Hide Reading Times on Mobile', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [ '(mobile) {{WRAPPER}} .post-box-meta-single .single-readtime' => 'display:none' ]
		] );

		$this->add_control( 'mobile_mdivider', [
			'label'     => esc_html__( 'Hide Meta Divider on Mobile', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [ '(mobile) {{WRAPPER}} .post-box-meta-single > span::before' => 'display:none' ]
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'content_elspacing', [
			'label' => esc_html__( 'Elements Spacing', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		] );

		$this->add_responsive_control( 'element_bspacing', [
			'label'     => esc_html__( 'Breadcrumb Spacing', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
			'selectors' => [
				'{{WRAPPER}} .container.goso-breadcrumb' => 'margin-bottom:{{SIZE}}px'
			],
		] );

		$this->add_responsive_control( 'element_catspacing', [
			'label'     => esc_html__( 'Categories Spacing', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
			'selectors' => [
				'{{WRAPPER}} .goso-standard-cat' => 'margin-bottom:{{SIZE}}px'
			],
		] );

		$this->add_responsive_control( 'element_titlespacing', [
			'label'     => esc_html__( 'Post Title Spacing', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
			'selectors' => [
				'{{WRAPPER}} .header-standard .post-title' => 'margin-bottom:{{SIZE}}px'
			],
		] );

		$this->add_responsive_control( 'element_subtitlespacing', [
			'label'     => esc_html__( 'Post Sub Title Spacing', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
			'selectors' => [
				'{{WRAPPER}} .header-standard .goso-psub-title' => 'margin-bottom:{{SIZE}}px'
			],
		] );

		$this->add_responsive_control( 'element_metaspacing', [
			'label'     => esc_html__( 'Meta Spacing', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
			'selectors' => [
				'{{WRAPPER}} .post-box-meta-single' => 'margin-top:{{SIZE}}px'
			],
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'post_meta', [
			'label'     => esc_html__( 'Post Meta', 'authow' ),
			'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
			'condition' => [ 'hide_info!' => 'yes' ],
		] );

		$this->add_control( 'hide_meta_label', [
			'label'     => esc_html__( 'Hide Meta Label?', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'label_on'  => __( 'Yes', 'authow' ),
			'label_off' => __( 'No', 'authow' ),
		] );

		$this->add_control( 'meta_divider', [
			'label'     => 'Remove Meta Divider Character',
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => array(
				'{{WRAPPER}} .post-box-meta-single > span:before' => 'display:none !important;'
			),
		] );

		$this->add_control( 'meta-item-spacing', [
			'label'      => 'Spacing Between Meta',
			'type'       => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px' ],
			'range'      => array(
				'px' => array( 'max' => 100 ),
			),
			'selectors'  => [
				'{{WRAPPER}} .post-box-meta-single > span:not(:last-child)' => 'margin-right:{{SIZE}}px;',
			],
		] );

		$this->add_control( 'goso_single_meta_author', [
			'label'     => esc_html__( 'Hide Author?', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'label_on'  => __( 'Yes', 'authow' ),
			'label_off' => __( 'No', 'authow' ),
		] );

		$this->add_control( 'goso_single_author_avatar', [
			'label'     => esc_html__( 'Hide Author Avatar?', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'label_on'  => __( 'Yes', 'authow' ),
			'label_off' => __( 'No', 'authow' ),
			'condition' => [ 'goso_single_meta_author!' => 'yes' ],
		] );

		$this->add_control( 'goso_single_meta_ava_icon_check', [
			'label'     => esc_html__( 'Hide Post Author Icon?', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'label_on'  => __( 'Yes', 'authow' ),
			'label_off' => __( 'No', 'authow' ),
			'condition' => [ 'goso_single_meta_author!' => 'yes' ],
		] );

		$this->add_control( 'goso_single_author_avatar_br', [
			'label'     => esc_html__( 'Author Borders Radius', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
			'selectors' => [ '{{WRAPPER}} .post-box-meta-single .avatar' => 'border-radius:{{SIZE}}px' ],
			'condition' => [ 'goso_single_author_avatar!' => 'yes' ],
		] );

		$this->add_control( 'goso_single_author_avatar_sp', [
			'label'     => esc_html__( 'Author Spacing', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
			'selectors' => [ '{{WRAPPER}} .post-box-meta-single .avatar' => 'margin-left:{{SIZE}}px;margin-right:{{SIZE}}px' ],
			'condition' => [ 'goso_single_author_avatar!' => 'yes' ],
		] );

		$this->add_control( 'goso_avatar_w', [
			'default'   => 30,
			'label'     => esc_html__( 'Author Avatar Width', 'authow' ),
			'type'      => \Elementor\Controls_Manager::NUMBER,
			'condition' => [ 'goso_single_author_avatar!' => 'yes' ],
		] );

		$this->add_control( 'goso_single_meta_date', [
			'label'     => esc_html__( 'Hide Post Date?', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'label_on'  => __( 'Yes', 'authow' ),
			'label_off' => __( 'No', 'authow' ),
		] );

		$this->add_control( 'goso_single_meta_date_icon_check', [
			'label'     => esc_html__( 'Hide Post Date Icon?', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'label_on'  => __( 'Yes', 'authow' ),
			'label_off' => __( 'No', 'authow' ),
			'condition' => [ 'goso_single_meta_date!' => 'yes' ],
		] );

		$this->add_control( 'goso_single_meta_comment', [
			'label'     => esc_html__( 'Hide Post Comments?', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'label_on'  => __( 'Yes', 'authow' ),
			'label_off' => __( 'No', 'authow' ),
		] );

		$this->add_control( 'goso_single_meta_comment_icon_check', [
			'label'     => esc_html__( 'Hide Post Comment Icon?', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'label_on'  => __( 'Yes', 'authow' ),
			'label_off' => __( 'No', 'authow' ),
			'condition' => [ 'goso_single_meta_comment!' => 'yes' ],
		] );

		$this->add_control( 'goso_single_show_cview', [
			'label'     => esc_html__( 'Hide Post Views?', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'label_on'  => __( 'Yes', 'authow' ),
			'label_off' => __( 'No', 'authow' ),
		] );

		$this->add_control( 'goso_single_meta_view_icon_check', [
			'label'     => esc_html__( 'Hide Post Views Icon?', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'label_on'  => __( 'Yes', 'authow' ),
			'label_off' => __( 'No', 'authow' ),
			'condition' => [ 'goso_single_show_cview!' => 'yes' ],
		] );

		$this->add_control( 'goso_single_hreadtime', [
			'label'     => esc_html__( 'Hide Post Reading Time ?', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'label_on'  => __( 'Yes', 'authow' ),
			'label_off' => __( 'No', 'authow' ),
		] );

		$this->add_control( 'goso_single_meta_reading_icon_check', [
			'label'     => esc_html__( 'Hide Post Reading Icon?', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'label_on'  => __( 'Yes', 'authow' ),
			'label_off' => __( 'No', 'authow' ),
			'condition' => [ 'goso_single_hreadtime!' => 'yes' ],
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'icon_settings', [
			'label' => esc_html__( 'Post Meta Icons', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		] );

		$this->add_control( 'meta_icon_style', [
			'label'   => esc_html__( 'Icons Style', 'authow' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'default' => 'default',
			'options' => [
				'default' => 'Default',
				's1'      => 'Style 1',
				's2'      => 'Style 2',
				's3'      => 'Style 3',
				's4'      => 'Style 4',
			],
		] );

		$this->add_control( 'meta_icon_size', [
			'label'     => esc_html__( 'Icon Width', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
			'selectors' => array(
				'{{WRAPPER}} .pcmt-icon' => 'width: {{SIZE}}px;height: {{SIZE}}px;line-height: {{SIZE}}px;',
			),
		] );

		$this->add_control( 'meta_icon_fsize', [
			'label'     => esc_html__( 'Icon Font Size', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
			'selectors' => array(
				'{{WRAPPER}} .pcmt-icon' => 'font-size: {{SIZE}}px;',
			),
		] );

		$this->add_control( 'meta_icon_border', [
			'label'     => esc_html__( 'Icon Borders Radius', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
			'selectors' => array(
				'{{WRAPPER}} .pcmt-icon' => 'border-radius: {{SIZE}}px;',
			),
		] );

		$this->add_control( 'meta_icon_borderw', [
			'label'     => esc_html__( 'Icon Borders Width', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 10, ) ),
			'selectors' => array(
				'{{WRAPPER}} .pcmt-icon' => 'border-width: {{SIZE}}px;',
			),
		] );

		$this->add_control( 'meta_icon_spacing', [
			'label'     => esc_html__( 'Icon Spacing', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 10, ) ),
			'selectors' => array(
				'{{WRAPPER}} .pcmt-icon' => 'margin-left: {{SIZE}}px;margin-right: {{SIZE}}px;',
			),
		] );

		$this->add_control( 'goso_single_meta_gnr_icon_color', [
			'label'     => esc_html__( 'Icon Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .pcmt-icon' => 'color:{{VALUE}}' ]
		] );

		$this->add_control( 'goso_single_meta_gnr_bg_color', [
			'label'     => esc_html__( 'Background Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pcmt-icon'                                       => 'background-color:{{VALUE}}',
				'{{WRAPPER}} .post-box-meta-single.style-s3 .pcmt-icon:after'  => 'border-left-color:{{VALUE}} !important',
				'{{WRAPPER}} .post-box-meta-single.style-s4 .pcmt-icon:before' => 'border-left-color:{{VALUE}} !important',

			]
		] );

		$this->add_control( 'goso_single_meta_gnr_bd_color', [
			'label'     => esc_html__( 'Borders Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pcmt-icon'                                      => 'border-color:{{VALUE}} !important',
				'{{WRAPPER}} .post-box-meta-single.style-s4 .pcmt-icon:after' => 'border-left-color:{{VALUE}} !important',
			]
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'author_icon_settings', [
			'label'     => esc_html__( 'Author Icon', 'authow' ),
			'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
			'condition' => [ 'goso_single_meta_ava_icon_check!' => 'yes' ],
		] );

		$this->add_control( 'goso_single_meta_ava_icon', [
			'label'            => esc_html__( 'Post Author Icon', 'authow' ),
			'type'             => \Elementor\Controls_Manager::ICONS,
			'fa4compatibility' => 'icon',
			'default'          => [
				'value'   => 'far fa-user',
				'library' => 'fa-regular',
			]
		] );

		$this->add_control( 'goso_single_meta_author_icon_color', [
			'label'     => esc_html__( 'Icon Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .ava-icon' => 'color:{{VALUE}}' ]
		] );

		$this->add_control( 'goso_single_meta_author_bg_color', [
			'label'     => esc_html__( 'Background Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .ava-icon'                                       => 'background-color:{{VALUE}}',
				'{{WRAPPER}} .post-box-meta-single.style-s3 .ava-icon:after'  => 'border-left-color:{{VALUE}} !important',
				'{{WRAPPER}} .post-box-meta-single.style-s4 .ava-icon:before' => 'border-left-color:{{VALUE}} !important',

			]
		] );

		$this->add_control( 'goso_single_meta_author_bd_color', [
			'label'     => esc_html__( 'Borders Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .ava-icon'                                      => 'border-color:{{VALUE}} !important',
				'{{WRAPPER}} .post-box-meta-single.style-s4 .ava-icon:after' => 'border-left-color:{{VALUE}} !important',
			]
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'date_icon_settings', [
			'label'     => esc_html__( 'Date Icon', 'authow' ),
			'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
			'condition' => [ 'goso_single_meta_date_icon_check!' => 'yes' ],
		] );

		$this->add_control( 'goso_single_meta_date_icon', [
			'label'            => esc_html__( 'Post Date Icon', 'authow' ),
			'type'             => \Elementor\Controls_Manager::ICONS,
			'fa4compatibility' => 'icon',
			'default'          => [
				'value'   => 'far fa-clock',
				'library' => 'fa-regular',
			]
		] );

		$this->add_control( 'goso_single_meta_date_icon_color', [
			'label'     => esc_html__( 'Icon Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .date-icon' => 'color:{{VALUE}}' ]
		] );

		$this->add_control( 'goso_single_meta_date_bg_color', [
			'label'     => esc_html__( 'Background Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .date-icon'                                       => 'background-color:{{VALUE}}',
				'{{WRAPPER}} .post-box-meta-single.style-s3 .date-icon:after'  => 'border-left-color:{{VALUE}} !important',
				'{{WRAPPER}} .post-box-meta-single.style-s4 .date-icon:before' => 'border-left-color:{{VALUE}} !important',

			]
		] );

		$this->add_control( 'goso_single_meta_date_bd_color', [
			'label'     => esc_html__( 'Borders Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .date-icon'                                      => 'border-color:{{VALUE}} !important',
				'{{WRAPPER}} .post-box-meta-single.style-s4 .date-icon:after' => 'border-left-color:{{VALUE}} !important',

			]
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'comment_icon_settings', [
			'label'     => esc_html__( 'Comment Icon', 'authow' ),
			'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
			'condition' => [ 'goso_single_meta_comment_icon_check!' => 'yes' ],
		] );

		$this->add_control( 'goso_single_meta_comment_icon', [
			'label'            => esc_html__( 'Post Comment Icon', 'authow' ),
			'type'             => \Elementor\Controls_Manager::ICONS,
			'fa4compatibility' => 'icon',
			'default'          => [
				'value'   => 'far fa-comment-dots',
				'library' => 'fa-regular',
			]
		] );

		$this->add_control( 'goso_single_meta_comment_icon_color', [
			'label'     => esc_html__( 'Icon Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .comment-icon' => 'color:{{VALUE}}' ]
		] );

		$this->add_control( 'goso_single_meta_comment_bg_color', [
			'label'     => esc_html__( 'Background Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .comment-icon'                                       => 'background-color:{{VALUE}}',
				'{{WRAPPER}} .post-box-meta-single.style-s3 .comment-icon:after'  => 'border-left-color:{{VALUE}} !important',
				'{{WRAPPER}} .post-box-meta-single.style-s4 .comment-icon:before' => 'border-left-color:{{VALUE}} !important',

			]
		] );

		$this->add_control( 'goso_single_meta_comment_bd_color', [
			'label'     => esc_html__( 'Borders Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .comment-icon'                                      => 'border-color:{{VALUE}} !important',
				'{{WRAPPER}} .post-box-meta-single.style-s4 .comment-icon:after' => 'border-left-color:{{VALUE}} !important',

			]
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'view_icon_settings', [
			'label'     => esc_html__( 'Post Views Icon', 'authow' ),
			'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
			'condition' => [ 'goso_single_meta_view_icon_check!' => 'yes' ],
		] );

		$this->add_control( 'goso_single_meta_view_icon', [
			'label'            => esc_html__( 'Post Views Icon', 'authow' ),
			'type'             => \Elementor\Controls_Manager::ICONS,
			'fa4compatibility' => 'icon',
			'default'          => [
				'value'   => 'far fa-eye',
				'library' => 'fa-regular',
			]
		] );

		$this->add_control( 'goso_single_meta_view_icon_color', [
			'label'     => esc_html__( 'Icon Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .view-icon' => 'color:{{VALUE}}' ]
		] );

		$this->add_control( 'goso_single_meta_view_bg_color', [
			'label'     => esc_html__( 'Background Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .view-icon'                                       => 'background-color:{{VALUE}}',
				'{{WRAPPER}} .post-box-meta-single.style-s3 .view-icon:after'  => 'border-left-color:{{VALUE}} !important',
				'{{WRAPPER}} .post-box-meta-single.style-s4 .view-icon:before' => 'border-left-color:{{VALUE}} !important',

			]
		] );

		$this->add_control( 'goso_single_meta_view_bd_color', [
			'label'     => esc_html__( 'Borders Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .view-icon'                                      => 'border-color:{{VALUE}} !important',
				'{{WRAPPER}} .post-box-meta-single.style-s4 .view-icon:after' => 'border-left-color:{{VALUE}} !important',

			]
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'reading_icon_settings', [
			'label'     => esc_html__( 'Reading Icon', 'authow' ),
			'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
			'condition' => [ 'goso_single_meta_reading_icon_check!' => 'yes' ],
		] );

		$this->add_control( 'goso_single_meta_reading_icon', [
			'label'            => esc_html__( 'Post Reading Icon', 'authow' ),
			'type'             => \Elementor\Controls_Manager::ICONS,
			'fa4compatibility' => 'icon',
			'default'          => [
				'value'   => 'fa fa-book',
				'library' => 'fa-regular',
			]
		] );

		$this->add_control( 'goso_single_meta_reading_icon_color', [
			'label'     => esc_html__( 'Icon Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .reading-icon' => 'color:{{VALUE}}' ]
		] );

		$this->add_control( 'goso_single_meta_reading_bg_color', [
			'label'     => esc_html__( 'Background Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .reading-icon'                                       => 'background-color:{{VALUE}}',
				'{{WRAPPER}} .post-box-meta-single.style-s3 .reading-icon:after'  => 'border-left-color:{{VALUE}} !important',
				'{{WRAPPER}} .post-box-meta-single.style-s4 .reading-icon:before' => 'border-left-color:{{VALUE}} !important',
			]

		] );

		$this->add_control( 'goso_single_meta_reading_bd_color', [
			'label'     => esc_html__( 'Borders Color', 'authow' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .reading-icon'                                      => 'border-color:{{VALUE}} !important',
				'{{WRAPPER}} .post-box-meta-single.style-s4 .reading-icon:after' => 'border-left-color:{{VALUE}} !important',
			]
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'color_style_settings', [
			'label' => esc_html__( 'General ', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		] );

		$this->add_control( 'overlay_color', [
			'label' => 'Background Style',
			'type'  => \Elementor\Controls_Manager::HEADING,
		] );

		$this->add_group_control( Group_Control_Background::get_type(), array(
			'name'     => 'overlay_bgcolor',
			'label'    => __( 'Overlay Background', 'authow' ),
			'types'    => array( 'classic', 'gradient' ),
			'selector' => '{{WRAPPER}} .goso-move-title-above:after',
		) );

		$this->add_control( 'overlay_ctbgcolor', [
			'label'     => 'Content Background Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .goso-fto-ct' => 'background-color:{{VALUE}}' ],
		] );

		$this->add_control( 'overlay_ctw', [
			'label'     => 'Content Width',
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 3000 ) ),
			'selectors' => [ '{{WRAPPER}} .goso-fto-ct' => 'max-width:{{SIZE}}px' ],
		] );

		$this->add_control( 'overlay_align', [
			'label'                => esc_html__( 'Content Width Align', 'authow' ),
			'type'                 => \Elementor\Controls_Manager::CHOOSE,
			'options'              => array(
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
			'selectors_dictionary' => array(
				'left'   => 'margin-right: auto !important',
				'center' => 'margin-left: auto !important; margin-right: auto !important;',
				'right'  => 'margin-left: auto !important',
			),
			'selectors'            => [ '{{WRAPPER}} .goso-fto-ct' => '{{VALUE}}' ],
		] );

		$this->add_responsive_control( 'overlay_ctpd', array(
			'label'      => __( 'Content Padding', 'authow' ),
			'type'       => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array( '{{WRAPPER}} .goso-fto-ct' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ),
		) );

		$this->add_control( 'overlay_ctbdr', [
			'label'     => 'Content Borders Radius',
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 50 ) ),
			'selectors' => [ '{{WRAPPER}} .goso-fto-ct' => 'border-radius:{{SIZE}}px' ],
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'style_breadcrumb', [
			'label'     => esc_html__( 'Breadcrumb', 'authow' ),
			'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
			'condition' => [ 'hide_breadcrumb!' => 'yes' ],
		] );

		$this->add_control( 'breadcrumb_head', [
			'label' => 'Breadcrumb Style',
			'type'  => \Elementor\Controls_Manager::HEADING,
		] );

		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), array(
			'name'     => 'breadcrumb_typo',
			'label'    => __( 'Typography for Breadcrumb', 'authow' ),
			'selector' => '{{WRAPPER}} .goso-breadcrumb.single-breadcrumb, {{WRAPPER}} .goso-breadcrumb.single-breadcrumb span, {{WRAPPER}} .goso-breadcrumb.single-breadcrumb a',
		) );

		$this->add_control( 'breadcrumb_color', [
			'label'     => 'Breadcrumb Text Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .goso-breadcrumb.single-breadcrumb span, {{WRAPPER}} .goso-breadcrumb.single-breadcrumb i,{{WRAPPER}} .goso-breadcrumb.single-breadcrumb a' => 'color:{{VALUE}} !important' ],
		] );

		$this->add_control( 'breadcrumb_lhcolor', [
			'label'     => 'Breadcrumb Text Hover Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .goso-breadcrumb.single-breadcrumb a:hover' => 'color:{{VALUE}}' ],
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'style_categories', [
			'label'     => esc_html__( 'Categories', 'authow' ),
			'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
			'condition' => [ 'goso_post_cat!' => 'yes' ],
		] );

		$this->add_control( 'cat_pre_style', [
			'label'   => 'Categories Style',
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => [
				''   => 'Default Theme Style',
				's1' => 'Style 1',
				's2' => 'Style 2',
				's3' => 'Style 3',
				's4' => 'Style 4',
			],
		] );

		$this->add_control( 'cat_head', [
			'label' => 'Categories Custom Style',
			'type'  => \Elementor\Controls_Manager::HEADING,
		] );

		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), array(
			'name'     => 'cat_typo',
			'label'    => __( 'Typography for Categories', 'authow' ),
			'selector' => '{{WRAPPER}} .cat > .goso-cat-name',
		) );

		$this->add_control( 'cat_color', [
			'label'     => 'Categories Text Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .cat > .goso-cat-name, {{WRAPPER}} .cat' => 'color:{{VALUE}}' ],
		] );

		$this->add_control( 'cat_lcolor', [
			'label'     => 'Categories Links Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .cat > a.goso-cat-name' => 'color:{{VALUE}}' ],
		] );

		$this->add_control( 'cat_lhcolor', [
			'label'     => 'Categories Links Hover Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .cat > a.goso-cat-name:hover' => 'color:{{VALUE}}' ],
		] );

		$this->add_control( 'cat_bgcolor', [
			'label'     => 'Categories Background Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .cat > a.goso-cat-name' => 'background-color:{{VALUE}}' ],
		] );

		$this->add_control( 'cat_bghcolor', [
			'label'     => 'Categories Background Hover Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .cat > a.goso-cat-name:hover' => 'background-color:{{VALUE}}' ],
		] );

		$this->add_control( 'cat_bcolor', [
			'label'     => 'Categories Borders Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .cat > a.goso-cat-name' => 'border-color:{{VALUE}}' ],
		] );

		$this->add_control( 'cat_bhcolor', [
			'label'     => 'Categories Borders Hover Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .cat > a.goso-cat-name:hover' => 'border-color:{{VALUE}}' ],
		] );

		$this->add_control( 'cat_padding', [
			'label'      => 'Categories Item Padding',
			'type'       => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .cat > a.goso-cat-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
			),
		] );

		$this->add_control( 'cat_border', [
			'label'      => 'Categories Item Border',
			'type'       => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .cat > a.goso-cat-name' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
			),
		] );

		$this->add_control( 'cat_border_style', [
			'label'     => 'Categories Borders Style',
			'type'      => \Elementor\Controls_Manager::SELECT,
			'options'   => [
				'dotted' => 'Dotted',
				'dashed' => 'Dashed',
				'solid'  => 'Solid',
				'double' => 'Double',
				'groove' => 'Groove',
				'ridge'  => 'Ridge',
				'inset'  => 'Inset',
				'outset' => 'Outset',
			],
			'selectors' => [ '{{WRAPPER}} .cat > a.goso-cat-name' => 'border-style:{{VALUE}}' ],
		] );

		$this->add_control( 'cat_border_radius', [
			'label'      => 'Categories Borders Radius',
			'type'       => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .cat > a.goso-cat-name' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
			),
		] );

		$this->add_control( 'cat_divider', [
			'label'     => 'Remove Categories Divider Character',
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => array(
				'{{WRAPPER}} .cat > a.goso-cat-name:after' => 'display:none !important;'
			),
		] );

		$this->end_controls_section();

		/* Post Title */
		$this->start_controls_section( 'style_title', [
			'label'     => esc_html__( 'Post Title', 'authow' ),
			'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
			'condition' => [ 'hide_title!' => 'yes' ],
		] );

		$this->add_control( 'title_head', [
			'label' => 'Title Style',
			'type'  => \Elementor\Controls_Manager::HEADING,
		] );

		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), array(
			'name'     => 'title_typo',
			'label'    => __( 'Typography for Post Title', 'authow' ),
			'selector' => '{{WRAPPER}} .header-standard .post-title',
		) );

		$this->add_control( 'title_color', [
			'label'     => 'Post Title Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .header-standard .post-title' => 'color:{{VALUE}}' ],
		] );

		$this->add_control( 'main-text-gcolor-enable', [
			'label' => 'Enable Gradient Color for Post Title',
			'type'  => \Elementor\Controls_Manager::SWITCHER,
		] );

		$this->add_group_control( \Elementor\Group_Control_Background::get_type(), array(
			'name'      => 'main-text-gcolor',
			'label'     => __( 'Gradient Color', 'authow' ),
			'types'     => array( 'gradient' ),
			'selector'  => '{{WRAPPER}} .post-title.single-post-title span',
			'condition' => [ 'main-text-gcolor-enable' => 'yes' ]
		) );

		$this->add_control( 'main-text-inlinecolor-e', [
			'label'     => 'Use Inline Background Color?',
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [
				'{{WRAPPER}} .post-title'      => 'background-color:var(--pcaccent-cl);display:inline;box-decoration-break: clone;padding: 3px 8px;',
				'{{WRAPPER}} .header-standard' => 'padding-top: 3px',
			],
		] );

		$this->add_control( 'main-text-inlinecolor', [
			'label'     => 'Inline Background Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .post-title' => 'background-color:{{VALUE}}' ],
			'condition' => [ 'main-text-inlinecolor-e' => 'yes' ]
		] );

		$this->add_control( 'main-text-inline-d', [
			'label'      => 'Inline Background Padding',
			'type'       => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px' ],
			'selectors'  => [
				'{{WRAPPER}} .post-title'      => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .header-standard' => 'padding-top: {{TOP}}{{UNIT}}',
			],
			'condition'  => [ 'main-text-inlinecolor-e' => 'yes' ]
		] );

		$this->add_control( 'title_bgcolor', [
			'label'     => 'Title Background Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .header-standard .post-title' => 'background-color:{{VALUE}}' ],
		] );

		$this->add_control( 'title_bcolor', [
			'label'     => 'Title Borders Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .header-standard .post-title' => 'border-color:{{VALUE}}' ],
		] );

		$this->add_control( 'title_padding', [
			'label'      => 'Title Padding',
			'type'       => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .header-standard .post-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
			),
		] );

		$this->add_control( 'title_border', [
			'label'      => 'Title Border',
			'type'       => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .header-standard .post-title' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
			),
		] );

		$this->add_control( 'title_border_style', [
			'label'     => 'Title Borders Style',
			'type'      => \Elementor\Controls_Manager::SELECT,
			'options'   => [
				'dotted' => 'Dotted',
				'dashed' => 'Dashed',
				'solid'  => 'Solid',
				'double' => 'Double',
				'groove' => 'Groove',
				'ridge'  => 'Ridge',
				'inset'  => 'Inset',
				'outset' => 'Outset',
			],
			'selectors' => [ '{{WRAPPER}} .header-standard .post-title' => 'border-style:{{VALUE}}' ],
		] );

		$this->add_control( 'title_border_radius', [
			'label'      => 'Title Borders Radius',
			'type'       => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .header-standard .post-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
			),
		] );

		$this->end_controls_section();

		/* Sub Title */
		$this->start_controls_section( 'style_subtitle', [
			'label'     => esc_html__( 'Sub Title', 'authow' ),
			'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
			'condition' => [ 'hide_subtitle!' => 'yes' ],
		] );

		$this->add_control( 'subtitle_head', [
			'label' => 'Sub Title Style',
			'type'  => \Elementor\Controls_Manager::HEADING,
		] );

		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), array(
			'name'     => 'subtitle_typo',
			'label'    => __( 'Typography for Post Sub Title', 'authow' ),
			'selector' => '{{WRAPPER}} .goso-psub-title',
		) );

		$this->add_control( 'subtitle_color', [
			'label'     => 'Post Sub Title Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .goso-psub-title' => 'color:{{VALUE}}' ],
		] );

		$this->add_control( 'subtitle_bgcolor', [
			'label'     => 'Sub Title Background Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .goso-psub-title' => 'background-color:{{VALUE}}' ],
		] );

		$this->add_control( 'subtitle_bcolor', [
			'label'     => 'Sub Title Borders Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .goso-psub-title' => 'border-color:{{VALUE}}' ],
		] );

		$this->add_control( 'subtitle_padding', [
			'label'      => 'Sub Title Padding',
			'type'       => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .goso-psub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
			),
		] );

		$this->add_control( 'subtitle_border', [
			'label'      => 'Sub Title Border',
			'type'       => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .goso-psub-title' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
			),
		] );

		$this->add_control( 'subtitle_border_style', [
			'label'     => 'Sub Title Borders Style',
			'type'      => \Elementor\Controls_Manager::SELECT,
			'options'   => [
				'dotted' => 'Dotted',
				'dashed' => 'Dashed',
				'solid'  => 'Solid',
				'double' => 'Double',
				'groove' => 'Groove',
				'ridge'  => 'Ridge',
				'inset'  => 'Inset',
				'outset' => 'Outset',
			],
			'selectors' => [ '{{WRAPPER}} .goso-psub-title' => 'border-style:{{VALUE}}' ],
		] );

		$this->add_control( 'subtitle_border_radius', [
			'label'      => 'Sub Title Borders Radius',
			'type'       => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .goso-psub-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
			),
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'meta_color_style', [
			'label' => esc_html__( 'Post Meta', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), array(
			'name'     => 'heading_typo',
			'label'    => __( 'Typography for Post Meta', 'authow' ),
			'selector' => '{{WRAPPER}} .post-box-meta-single',
		) );

		$this->add_control( 'meta-color', [
			'label'     => 'Meta Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .post-box-meta-single, {{WRAPPER}} .post-box-meta-single span' => 'color:{{VALUE}}' ],
		] );

		$this->add_control( 'meta-link-color', [
			'label'     => 'Meta Link Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .post-box-meta-single a' => 'color:{{VALUE}}' ],
		] );

		$this->add_control( 'meta-link-hcolor', [
			'label'     => 'Meta Link Hover Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .post-box-meta-single a:hover' => 'color:{{VALUE}}' ],
		] );
		$this->end_controls_section();

	}

	/**
	 * Get image sizes.
	 *
	 * Retrieve available image sizes after filtering `include` and `exclude` arguments.
	 */
	public function get_list_image_sizes( $default = false ) {
		$wp_image_sizes = $this->get_all_image_sizes();

		$image_sizes = array();

		if ( $default ) {
			$image_sizes[''] = esc_html__( 'Default', 'authow' );
		}

		foreach ( $wp_image_sizes as $size_key => $size_attributes ) {
			$control_title = ucwords( str_replace( '_', ' ', $size_key ) );
			if ( is_array( $size_attributes ) ) {
				$control_title .= sprintf( ' - %d x %d', $size_attributes['width'], $size_attributes['height'] );
			}

			$image_sizes[ $size_key ] = $control_title;
		}

		$image_sizes['full'] = esc_html__( 'Full', 'authow' );

		return $image_sizes;
	}

	public function get_all_image_sizes() {
		global $_wp_additional_image_sizes;

		$default_image_sizes = [ 'thumbnail', 'medium', 'medium_large', 'large' ];

		$image_sizes = [];

		foreach ( $default_image_sizes as $size ) {
			$image_sizes[ $size ] = [
				'width'  => (int) get_option( $size . '_size_w' ),
				'height' => (int) get_option( $size . '_size_h' ),
				'crop'   => (bool) get_option( $size . '_crop' ),
			];
		}

		if ( $_wp_additional_image_sizes ) {
			$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
		}

		return $image_sizes;
	}

	protected function render() {
		global $post;
		$settings             = $this->get_settings_for_display();
		$avatar               = $settings['goso_single_author_avatar'];
		$avatarw              = isset( $settings['goso_avatar_w'] ) && $settings['goso_avatar_w'] ? $settings['goso_avatar_w'] : 32;
		$ava_icon_enable      = $settings['goso_single_meta_ava_icon_check'];
		$ava_icon             = $settings['goso_single_meta_ava_icon'];
		$date_icon_enable     = $settings['goso_single_meta_date_icon_check'];
		$date_icon            = $settings['goso_single_meta_date_icon'];
		$commment_icon_enable = $settings['goso_single_meta_comment_icon_check'];
		$commment_icon        = $settings['goso_single_meta_comment_icon'];
		$view_icon_enable     = $settings['goso_single_meta_view_icon_check'];
		$view_icon            = $settings['goso_single_meta_view_icon'];
		$reading_icon_enable  = $settings['goso_single_meta_reading_icon_check'];
		$reading_icon         = $settings['goso_single_meta_reading_icon'];
		$icon_style           = $settings['meta_icon_style'];
		$thumb_alt            = '';
		$label_text           = $settings['hide_meta_label'];
		$gradient_class       = $settings['main-text-gcolor-enable'] ? ' gradient-enable' : '';

		if ( has_post_thumbnail() ) {
			$thumb_id  = get_post_thumbnail_id( get_the_ID() );
			$thumb_alt = goso_get_image_alt( $thumb_id, get_the_ID() );
		}

		if ( goso_elementor_is_edit_mode() ) {
			$attachments = get_posts( [ 'post_type' => 'attachment', 'numberposts' => 1 ] );
			if ( ! empty( $attachments ) ) {
				$thumb_id  = $attachments[0]->ID;
				$thumb_alt = goso_get_image_alt( $thumb_id, get_the_ID() );
			}
			add_filter( 'has_post_thumbnail', function () {
				return true;
			} );
		}

		$enable_jarallax     = $settings['goso_enable_jarallax_single'];
		$pmt_enable_jarallax = get_post_meta( get_the_ID(), 'goso_enable_jarallax_single', true );

		if ( $pmt_enable_jarallax ) {
			$enable_jarallax = $pmt_enable_jarallax;
		}

		$simage_size = get_theme_mod( 'goso_single_custom_thumbnail_size' ) ? get_theme_mod( 'goso_single_custom_thumbnail_size' ) : 'goso-full-thumb';
		$image_size  = $settings['img_size'] ? $settings['img_size'] : $simage_size;

		if ( goso_is_mobile() ) {
			$image_size = $settings['img_msize'] ? $settings['img_msize'] : 'goso-masonry-thumb';
		}


		$div_special_wrapper = '';

		$div_special_wrapper .= '<div class="';
		$div_special_wrapper .= 'standard-post-special_wrapper' . $gradient_class;
		$div_special_wrapper .= '">';

		if ( has_post_thumbnail() ) {
			$image_html = goso_get_featured_single_image_size( get_the_ID(), $image_size, $enable_jarallax, $thumb_alt );
		} else {
			$class = 'attachment-goso-full-thumb size-goso-full-thumb goso-single-featured-img wp-post-image';
			$src   = get_template_directory_uri() . '/images/no-image2.jpg';
			if ( $enable_jarallax ) {
				$image_html = '<img class="jarallax-img" src="' . $src . '" alt="' . $thumb_alt . '">';
			} elseif ( ! get_theme_mod( 'goso_speed_disable_first_screen' ) || get_theme_mod( 'goso_disable_lazyload_fsingle' ) ) {
				$image_html = '<span class="' . $class . ' goso-disable-lazy" style="background-image: url(' . $src . ');"></span>';
			} else {
				$image_html = '<span class="' . $class . ' goso-lazy" data-bgset="' . $src . '"></span>';
			}
		}

		if ( goso_elementor_is_edit_mode() ) {
			$class       = 'attachment-goso-full-thumb size-goso-full-thumb goso-single-featured-img wp-post-image';
			$src         = get_template_directory_uri() . '/inc/template-builder/placeholder.php?w=1200&h=800';
			$style_ratio = 'padding-top: 67%;';
			if ( $enable_jarallax ) {
				$image_html = '<img class="jarallax-img" src="' . $src . '" alt="' . $thumb_alt . '">';
			} elseif ( ! get_theme_mod( 'goso_speed_disable_first_screen' ) || get_theme_mod( 'goso_disable_lazyload_fsingle' ) ) {
				$image_html = '<span class="' . $class . ' goso-disable-lazy" style="background-image: url(' . $src . ');' . $style_ratio . '"></span>';
			} else {
				$image_html = '<span class="' . $class . ' goso-lazy" data-bgset="' . $src . '" style="' . $style_ratio . '"></span>';
			}
		}

		?>
		<?php if ( goso_get_post_format( 'link' ) || goso_get_post_format( 'quote' ) ) : ?>
			<?php
			$class_pimage_linkquote = 'standard-post-special post-image';
			if ( goso_get_post_format( 'quote' ) ) {
				$class_pimage_linkquote .= ' goso-special-format-quote';
			}
			if ( ! has_post_thumbnail() ) {
				//$class_pimage_linkquote .= ' no-thumbnail';
			}


			$class_pimage_linkquote .= ' goso-move-title-above';


			if ( $enable_jarallax ) {
				$class_pimage_linkquote .= ' goso-jarallax';
			}
			?>
            <div class="<?php echo( $class_pimage_linkquote ); ?>">
				<?php
				echo $image_html;
				?>
				<?php echo $div_special_wrapper; ?>
                <div class="standard-content-special">
                    <div class="format-post-box<?php if ( goso_get_post_format( 'quote' ) ) {
						echo ' goso-format-quote';
					} else {
						echo ' goso-format-link';
					} ?>">
                        <span class="post-format-icon"><?php goso_fawesome_icon( 'fas fa-' . ( goso_get_post_format( 'quote' ) ? 'quote-left' : 'link' ) ); ?></span>
                        <p class="dt-special">
							<?php
							if ( goso_get_post_format( 'quote' ) ) {
								$dt_content = get_post_meta( $post->ID, '_format_quote_source_name', true );
								if ( ! empty( $dt_content ) ): echo sanitize_text_field( $dt_content ); endif;
							} else {
								$dt_content = get_post_meta( $post->ID, '_format_link_url', true );
								if ( ! empty( $dt_content ) ):
									echo '<a href="' . esc_url( $dt_content ) . '" target="_blank">' . sanitize_text_field( $dt_content ) . '</a>';
								endif;
							}
							?>
                        </p>
						<?php
						if ( goso_get_post_format( 'quote' ) ):
							$quote_author = get_post_meta( $post->ID, '_format_quote_source_url', true );
							if ( ! empty( $quote_author ) ):
								echo '<div class="author-quote"><span>' . sanitize_text_field( $quote_author ) . '</span></div>';
							endif;
						endif; ?>
                    </div>
                </div>
                <div class="goso-fto-ct">
					<?php

					get_template_part( 'template-parts/single', 'breadcrumb' );


					get_template_part( 'inc/template-builder/single-elements/entry', 'header', $settings );

					?>
                </div>
            </div>
            </div>

		<?php elseif ( goso_get_post_format( 'video' ) ) : ?>
			<?php
			Goso_Sodedad_Video_Format::show_builder_video_embed( array(
				'post_id'             => $post->ID,
				'parallax'            => $enable_jarallax,
				'args'                => array( 'width' => '1920', 'height' => '1080' ),
				'show_title_inner'    => true,
				'move_title_bellow'   => false,
				'div_special_wrapper' => $div_special_wrapper,
				'single_style'        => 'style-1'
			), $settings );
			?>
		<?php elseif ( goso_get_post_format( 'audio' ) ) : ?>
			<?php
			$class_pimage_audio = 'standard-post-image post-image audio';

			if ( ! has_post_thumbnail() ) {
				//$class_pimage_audio .= ' no-thumbnail';
			}

			if ( $enable_jarallax ) {
				$class_pimage_audio .= ' goso-jarallax';
			}


			$class_pimage_audio .= ' goso-move-title-above';


			?>
            <div class="<?php echo $class_pimage_audio; ?>">
				<?php
				echo $image_html;
				?>
				<?php echo $div_special_wrapper; ?>
                <div class="audio-iframe">
					<?php $goso_audio = get_post_meta( $post->ID, '_format_audio_embed', true );
					$goso_audio_str   = substr( $goso_audio, - 4 ); ?>
					<?php if ( wp_oembed_get( $goso_audio ) ) : ?>
						<?php echo wp_oembed_get( $goso_audio ); ?>
					<?php elseif ( $goso_audio_str == '.mp3' ) : ?>
						<?php echo do_shortcode( '[audio src="' . esc_url( $goso_audio ) . '"]' ); ?>
					<?php else : ?>
						<?php echo $goso_audio; ?>
					<?php endif; ?>
                </div>
                <div class="goso-fto-ct">
					<?php

					get_template_part( 'template-parts/single', 'breadcrumb' );


					get_template_part( 'inc/template-builder/single-elements/entry', 'header', $settings );

					?>
                </div>
            </div>
            </div>

		<?php else : ?>


            <div class="post-image goso-move-title-above">
				<?php
				if ( ! get_theme_mod( 'goso_disable_lightbox_single' ) && ! $enable_jarallax ) {
					$thumb_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
					echo '<a href="' . esc_url( $thumb_url ) . '" data-rel="goso-gallery-bground-content">';
					echo $image_html;
					echo '</a>';
				} else {

					echo '<div class="' . ( $enable_jarallax ? 'goso-jarallax' : '' ) . '">';
					echo $image_html;
					echo '</div>';
				}

				echo $div_special_wrapper;
				echo '<div class="goso-fto-ct">';

				get_template_part( 'template-parts/single', 'breadcrumb' );


				?>
                <div class="header-standard header-classic single-header">
					<?php if ( ! $settings['goso_post_cat'] ) : ?>
                        <div class="goso-standard-cat goso-single-cat <?php echo $settings['cat_pre_style']; ?>"><span
                                    class="cat">
                                    <?php if ( goso_elementor_is_edit_mode() ) {
	                                    echo '<a class="goso-cat-name" href="#">Category Name 1</a> <a class="goso-cat-name" href="#">Category Name 2</a> <a class="goso-cat-name" href="#">Category Name 3</a>';
                                    } else {
	                                    goso_category( '' );
                                    } ?>
                                </span></div>
					<?php endif; ?>

					<?php if ( ! $settings['hide_title'] ): ?>
                        <h1 class="post-title single-post-title entry-title"><span><?php the_title(); ?></span></h1>
					<?php endif; ?>
					<?php
					if ( ! $settings['hide_subtitle'] ) {
						goso_display_post_subtitle();
					}
					?>
					<?php goso_authow_meta_schema(); ?>
					<?php $hide_readtime = get_theme_mod( 'goso_single_hreadtime' ); ?>
					<?php if ( ! $settings['goso_single_meta_author'] || ! $settings['goso_single_meta_date'] || ! $settings['goso_single_meta_comment'] || $settings['goso_single_show_cview'] || $settings[ $hide_readtime ] ) : ?>

                        <div class="post-box-meta-single style-<?php echo esc_attr( $icon_style ); ?>">
							<?php if ( ! $settings['goso_single_meta_author'] ) :
								global $post;
								?>
                                <span class="author-post byline">
                                        <span class="author vcard">
                                            <?php
                                            if ( ! $ava_icon_enable && $ava_icon ) {
	                                            echo '<span class="pcmt-icon ava-icon">';
	                                            \Elementor\Icons_Manager::render_icon( $ava_icon );
	                                            echo '</span>';
                                            }
                                            ?>
	                                        <?php if ( ! $label_text ) {
		                                        echo goso_get_setting( 'goso_trans_written_by' );
	                                        } ?>
                                            <a class="author-url url fn n"
                                               href="<?php echo get_author_posts_url( $post->post_author ); ?>">
                                                <?php
                                                if ( ! $avatar ) {
	                                                echo get_avatar( $post->post_author, $avatarw );
                                                }
                                                echo get_the_author_meta( 'display_name', $post->post_author ); ?>
                                            </a>
                                        </span>
                                    </span>
							<?php endif; ?>
							<?php if ( ! $settings['goso_single_meta_date'] ) : ?>
                                <span class="pctmp-date-post">
                                <?php
                                if ( ! $date_icon_enable && $date_icon ) {
	                                echo '<span class="pcmt-icon date-icon">';
	                                \Elementor\Icons_Manager::render_icon( $date_icon );
	                                echo '</span>';
                                }
                                ?>
                                <?php goso_authow_time_link( 'single' ); ?></span>
							<?php endif; ?>
							<?php if ( ! $settings['goso_single_meta_comment'] ) :
								?>
                                <span class="pctmp-comment-post">
                                    <?php
                                    if ( ! $commment_icon_enable && $commment_icon ) {
	                                    echo '<span class="pcmt-icon comment-icon">';
	                                    \Elementor\Icons_Manager::render_icon( $commment_icon );
	                                    echo '</span>';
                                    }
                                    $comment_text  = ! $label_text ? ' ' . goso_get_setting( 'goso_trans_comment' ) : '';
                                    $comments_text = ! $label_text ? ' ' . goso_get_setting( 'goso_trans_comments' ) : '';
                                    ?>
                                    <a href="<?php comments_link(); ?>">
                                        <?php comments_number( '0' . $comment_text, '1' . $comment_text, '%' . $comments_text ); ?></span>
                                </a>
							<?php endif; ?>
							<?php if ( ! $settings['goso_single_show_cview'] ) : ?>
                                <span class="pctmp-view-post">
                                    <?php
                                    if ( ! $view_icon_enable && $view_icon ) {
	                                    echo '<span class="pcmt-icon view-icon">';
	                                    \Elementor\Icons_Manager::render_icon( $view_icon );
	                                    echo '</span>';
                                    }
                                    ?>
                                        <i class="goso-post-countview-number"><?php echo goso_get_post_views( get_the_ID() ); ?></i><?php if ( ! $label_text ) {
										echo ' ' . goso_get_setting( 'goso_trans_countviews' );
									} ?></span>
							<?php endif; ?>
							<?php if ( goso_isshow_reading_time( $hide_readtime ) ):
								?>
                                <span class="single-readtime">
                                    <?php
                                    if ( ! $reading_icon_enable && $reading_icon ) {
	                                    echo '<span class="pcmt-icon reading-icon">';
	                                    \Elementor\Icons_Manager::render_icon( $reading_icon );
	                                    echo '</span>';
                                    }
                                    ?>
                                    <?php goso_reading_time(); ?></span>
							<?php endif; ?>
							<?php
							if ( get_the_post_thumbnail_caption() && get_theme_mod( 'goso_post_thumb_caption' ) ) {
								echo '<span class="goso-featured-caption goso-fixed-caption goso-caption-relative">' . get_the_post_thumbnail_caption() . '</span>';
							}
							?>
                        </div>
					<?php endif; ?>
					<?php
					$recipe_title = get_post_meta( get_the_ID(), 'goso_recipe_title', true );
					if ( has_shortcode( get_the_content(), 'goso_recipe' ) || $recipe_title ) {
						do_action( 'goso_recipes_action_hook' );
					} ?>
                </div><?php

				echo '</div>';
				echo '</div>';
				?>
            </div>


		<?php endif;
	}
}
