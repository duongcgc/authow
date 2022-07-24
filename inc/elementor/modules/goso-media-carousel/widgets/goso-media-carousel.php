<?php

namespace GosoAuthowElementor\Modules\GosoMediaCarousel\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
//use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;
use GosoAuthowElementor\Loader;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoMediaCarousel extends Base_Widget {

	public function get_name() {
		return 'goso-media-carousel';
	}

	public function get_script_depends() {
		return array( 'imagesloaded' );
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Advanced Carousel', 'authow' );
	}

	public function get_icon() {
		return 'eicon-media-carousel';
	}
	
	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'media', 'carousel', 'image', 'video', 'lightbox' );
	}

	protected function register_controls() {
		
		
		$this->start_controls_section(
			'section_slider_options',
			array(
				'label' => __( 'General', 'authow' ),
				'type'  => Controls_Manager::SECTION,
			)
		);
		
		$this->add_control(
			'contentpos', array(
				'label'     => __( 'Slider Content Position', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'below',
				'options'   => array(
					'below' => esc_html__( 'Below Image', 'authow' ),
					'above' => esc_html__( 'Above Image', 'authow' ),
					'on'    => esc_html__( 'On Image', 'authow' ),
				),
			)
		);
		
		$this->add_control(
			'overlap_imgurl', array(
				'label'     => __( 'Image link overlap on the whole slide?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
				'selectors' => array(
					'{{WRAPPER}} .pc-ctpos-on .goso-media-content > a' => 'z-index: 5;',
				),
				'condition' => array( 'contentpos' => 'on' )
			)
		);
		
		$this->add_responsive_control(
			'slides_item_gap', array(
				'label'   => __( 'Gap Between Items', 'authow' ),
				'type'    => Controls_Manager::NUMBER,
				'selectors' => array(
					'{{WRAPPER}} .goso-advanced-carousel-mg' => 'margin-left: calc( {{SIZE}}px * -1 / 2 ); margin-right: calc( {{SIZE}}px * -1 / 2 );',
					'{{WRAPPER}} .goso-media-inner' => 'padding-left: calc( {{SIZE}}px / 2 ); padding-right: calc( {{SIZE}}px / 2 );',
					'{{WRAPPER}} .goso-owl-carousel .owl-nav .owl-prev' => 'left: calc( 15px + {{SIZE}}px / 2 );',
					'{{WRAPPER}} .goso-owl-carousel .owl-nav .owl-next' => 'right: calc( 15px + {{SIZE}}px / 2 );',
				),
			)
		);
		$slides_per_view = range( 1, 10 );
		$slides_per_view = array_combine( $slides_per_view, $slides_per_view );
		$this->add_responsive_control(
			'slides_per_view', array(
				'type'               => Controls_Manager::SELECT,
				'label'              => __( 'Slides Per View', 'authow' ),
				'options'            => $slides_per_view,
				'frontend_available' => true,
				'default'            => '3',
				'tablet_default'     => '2',
				'mobile_default'     => '1',
			)
		);
		
		$this->add_responsive_control(
			'img_ratio', array(
				'label'     => __( 'Ratio Height/Width of Images', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0.1, 'max' => 3, 'step' => 0.01 ) ),
				'selectors' => array(
					'{{WRAPPER}} .goso-media-carousels .goso-image-holder:before' => 'padding-top:calc( {{SIZE}} * 100% );',
				),
			)
		);

		$this->add_control(
			'autoplay', array(
				'label'   => __( 'Autoplay', 'authow' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator'          => 'before',
			)
		);
		$this->add_control(
			'loop', array(
				'label'   => __( 'Slider Loop', 'authow' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);
		$this->add_control(
			'auto_time', array(
				'label'   => __( 'Slider Auto Time (at x seconds)', 'authow' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4000,
			)
		);
		$this->add_control(
			'speed', array(
				'label'   => __( 'Slider Speed (at x seconds)', 'authow' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 800,
			)
		);
		$this->add_control(
			'shownav', array(
				'label'   => __( 'Show next/prev buttons', 'authow' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);
		$this->add_control(
			'showdots', array(
				'label' => __( 'Show dots navigation', 'authow' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		$this->add_control(
			'image_size', array(
				'label'     => __( 'Image size', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'separator' => 'before',
				'options'   => $this->get_list_image_sizes( true ),
			)
		);
		
		$this->add_control(
			'image_size_mobile', array(
				'label'     => __( 'Image size on Mobile', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => $this->get_list_image_sizes( true ),
			)
		);

		$this->add_control(
			'image_fit', array(
				'label'     => __( 'Image Fit', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => array(
					''        => __( 'Cover', 'authow' ),
					'contain' => __( 'Contain', 'authow' ),
					'100% auto'    => __( 'Width:100% x Height: Auto', 'authow' ),
					'auto 100%'    => __( 'Width:Auto x Height: 100%', 'authow' ),
				),
				'selectors' => array( '{{WRAPPER}} .goso-media-item .goso-image-holder' => 'background-size: {{VALUE}}' )
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_slides', array(
				'label' => esc_html__( 'Slider Items', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();
		
		$repeater->start_controls_tabs( 'carousel_repeater' );
		$repeater->start_controls_tab( 'content', array( 'label' => __( 'Content', 'authow' ) ) );
		
		$repeater->add_control(
			'type', array(
				'type'        => Controls_Manager::CHOOSE,
				'label'       => __( 'Type', 'authow' ),
				'default'     => 'image',
				'options'     => array(
					'image' => array(
						'title' => __( 'Image', 'authow' ),
						'icon'  => 'eicon-image-bold'
					),
					'video' => array(
						'title' => __( 'Video', 'authow' ),
						'icon'  => 'eicon-video-camera'
					)
				),
				'label_block' => false,
				'toggle'      => false,
			)
		);

		$repeater->add_control(
			'image', array(
				'label' => __( 'Image', 'authow' ),
				'type'  => Controls_Manager::MEDIA
			)
		);
		$repeater->add_control(
			'image_link_to_type', array(
				'label'     => __( 'Link', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					''       => __( 'None', 'authow' ),
					'file'   => __( 'Media File', 'authow' ),
					'custom' => __( 'Custom URL', 'authow' )
				),
				'condition' => array( 'type' => 'image' )
			)
		);

		$repeater->add_control(
			'image_link_to', array(
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'authow' ),
				'condition'   => array(
					'type'               => 'image',
					'image_link_to_type' => 'custom'
				),
				'separator'   => 'none',
				'show_label'  => false
			)
		);

		$repeater->add_control(
			'video', array(
				'label'         => __( 'Video Link', 'authow' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'Enter your video link', 'authow' ),
				'description'   => __( 'YouTube or Vimeo link', 'authow' ),
				'show_external' => false,
				'condition'     => array( 'type' => 'video' )
			)
		);
		
		$repeater->add_control(
			'stitle_text', array(
				'label'       => __( 'Sub Title', 'authow' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( '', 'authow' ),
				'placeholder' => __( 'Enter your sub title', 'authow' ),
				'label_block' => true,
				'separator' => 'before',
			)
		);

		$repeater->add_control(
			'title_text', array(
				'label'       => __( 'Title', 'authow' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'This is the heading', 'authow' ),
				'placeholder' => __( 'Enter your title', 'authow' ),
				'label_block' => true,
			)
		);
		$repeater->add_control(
			'description_text', array(
				'label'       => __( 'Description', 'authow' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'authow' ),
				'placeholder' => __( 'Enter your description', 'authow' ),
				'separator'   => 'none',
			)
		);
		
		$repeater->add_control(
			'heading_rmbtn', array(
				'label'     => __( 'Add Read More Button', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		
		$repeater->add_control(
			'treadmore', array(
				'label'     => __( 'Button Text', 'authow' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '',
			)
		);
		
		$repeater->add_control(
			'rmlink', array(
				'label'       => __( 'Button Link', 'authow' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'authow' ),
			)
		);
		
		$repeater->add_control(
			'btnadd_icon', array(
				'label'     => __( 'Add Icon to Button?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
				'return_value' => 'yes',
			)
		);
		
		$repeater->add_control(
			'rmicon', array(
				'label'     => __( 'Button Icon', 'authow' ),
				'type'      => Controls_Manager::ICONS,
				'default'   => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				'condition' => array( 'btnadd_icon' => 'yes' ),
			)
		);
		
		$repeater->add_control(
			'icon_pos', array(
				'label'   => __( 'Icon Position', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'left'   => 'Before',
					'right'   => 'After',
				),
				'default' => 'left',
				'condition' => array( 'btnadd_icon' => 'yes' ),
			)
		);
		
		$repeater->add_responsive_control(
			'icon_space', array(
				'label'   => __( 'Icon Spacing', 'authow' ),
				'type'    => Controls_Manager::SLIDER,
				'range'   => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
				'selectors' => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} .pc-icpos-left i, {{WRAPPER}} {{CURRENT_ITEM}} .pc-icpos-left svg' => 'margin-right: {{SIZE}}px;',
					'{{WRAPPER}} {{CURRENT_ITEM}} .pc-icpos-right i, {{WRAPPER}} {{CURRENT_ITEM}} .pc-icpos-right svg' => 'margin-left: {{SIZE}}px;',
				),
				'condition'   => array( 'btnadd_icon' => 'yes' ),
			)
		);
		
		$repeater->end_controls_tab();

		$repeater->start_controls_tab( 'overlay', array( 'label' => __( 'Overlay', 'authow' ) ) );
		
		$repeater->add_control(
			'iheading_overlayimg', array(
				'label'     => __( 'Overlay on Image', 'authow' ),
				'type'      => Controls_Manager::HEADING,
			)
		);
		
		$repeater->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'iimg_overlay',
				'label'    => __( 'Image Overlay Background', 'authow' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .pc-adcr-overlay',
			)
		);
		
		$repeater->add_responsive_control(
			'ioverlay_opacity', array(
				'label'     => __( 'Overlay Opacity', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1, 'step' => 0.05 ) ),
				'selectors' => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} .pc-adcr-overlay' => 'opacity: {{SIZE}};'
				)
			)
		);
		
		$repeater->add_responsive_control(
			'ioverlay_hopacity', array(
				'label'     => __( 'Overlay Opacity on Hover', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1, 'step' => 0.05 ) ),
				'selectors' => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} .goso-media-inct:hover .pc-adcr-overlay' => 'opacity: {{SIZE}};'
				)
			)
		);
		
		$repeater->add_control(
			'iheading_overlayct', array(
				'label'     => __( 'Overlay on Content', 'authow' ),
				'type'      => Controls_Manager::HEADING,
			)
		);
		
		$repeater->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'ict_overlay',
				'label'    => __( 'Content Overlay Background', 'authow' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .pc-media-ctinner:before',
			)
		);
		
		$repeater->add_responsive_control(
			'ictoverlay_opacity', array(
				'label'     => __( 'Overlay Opacity', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1, 'step' => 0.05 ) ),
				'selectors' => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} .pc-media-ctinner:before' => 'opacity: {{SIZE}};'
				)
			)
		);
		
		$repeater->add_responsive_control(
			'ictoverlay_hopacity', array(
				'label'     => __( 'Overlay Opacity on Hover', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1, 'step' => 0.05 ) ),
				'selectors' => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} .goso-media-inct:hover .pc-media-ctinner:before' => 'opacity: {{SIZE}};'
				)
			)
		);
		
		$repeater->end_controls_tab();

		$repeater->start_controls_tab( 'style', array( 'label' => __( 'Style', 'authow' ) ) );
		
		$repeater->add_control(
			'icustom', array(
				'label'       => __( 'Custom', 'authow' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => __( 'Set custom style that will only affect this item only. To adjust the style for all items, check options on the "Style" tab at the top.', 'authow' ),
			)
		);
		
		$repeater->add_responsive_control(
			'itext_align', array(
				'label'     => __( 'Alignment', 'authow' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => __( 'Left', 'elementor-pro' ),
						'icon'  => 'eicon-text-align-left'
					),
					'center' => array(
						'title' => __( 'Center', 'elementor-pro' ),
						'icon'  => 'eicon-text-align-center'
					),
					'right'  => array(
						'title' => __( 'Right', 'elementor-pro' ),
						'icon'  => 'eicon-text-align-right'
					)
				),
				'condition'   => array( 'icustom' => 'yes' ),
				'selectors' => array(
					'{{WRAPPER}} .goso-media-carousels {{CURRENT_ITEM}} .goso-media-content' => 'text-align: {{VALUE}};'
				)
			)
		);
		
		$repeater->add_control(
			'icontent_position',
			array(
				'label'                => __( 'Vertical Position', 'authow' ),
				'type'                 => Controls_Manager::CHOOSE,
				'label_block'          => false,
				'description'          => __( 'This option just applies when you selected content to display on the image.', 'authow' ),
				'condition'   => array( 'icustom' => 'yes' ),
				'options'              => array(
					'top'    => array(
						'title' => __( 'Top', 'authow' ),
						'icon'  => 'eicon-v-align-top',
					),
					'middle' => array(
						'title' => __( 'Middle', 'authow' ),
						'icon'  => 'eicon-v-align-middle',
					),
					'bottom' => array(
						'title' => __( 'Bottom', 'authow' ),
						'icon'  => 'eicon-v-align-bottom',
					),
				),
				'selectors'            => array(
					'{{WRAPPER}} .pc-ctpos-on {{CURRENT_ITEM}} .goso-media-content' => 'align-items: {{VALUE}}',
				),
				'selectors_dictionary' => array(
					'top'    => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				),
			)
		);
		
		$repeater->add_control(
			'istitle_color', array(
				'label'     => __( 'Sub Title Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition'   => array( 'icustom' => 'yes' ),
				'selectors' => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} .goso-media-stit' => 'color: {{VALUE}};'
				)
			)
		);

		$repeater->add_control(
			'ititle_color', array(
				'label'     => __( 'Title Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition'   => array( 'icustom' => 'yes' ),
				'selectors' => array(
					'{{WRAPPER}} .goso-media-carousels {{CURRENT_ITEM}} .goso-media-title' => 'color: {{VALUE}};'
				)
			)
		);

		$repeater->add_control(
			'idescription_color', array(
				'label'     => __( 'Description Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition'   => array( 'icustom' => 'yes' ),
				'selectors' => array(
					'{{WRAPPER}} .goso-media-carousels {{CURRENT_ITEM}} .goso-media-desc' => 'color: {{VALUE}};'
				)
			)
		);
		
		$repeater->add_control(
			'idescription_linkcolor', array(
				'label'     => __( 'Links Color on Description', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition'   => array( 'icustom' => 'yes' ),
				'selectors' => array(
					'{{WRAPPER}} .goso-media-carousels {{CURRENT_ITEM}} .goso-media-desc a' => 'color: {{VALUE}};'
				)
			)
		);
		
		$repeater->add_control(
			'irm_bgcolor',
			array(
				'label'     => __( 'Button Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition'   => array( 'icustom' => 'yes' ),
				'selectors' => array( '{{WRAPPER}} {{CURRENT_ITEM}} .goso-media-rmbtn a' => 'background-color: {{VALUE}};' ),
			)
		);
		$repeater->add_control(
			'irm_bghcolor',
			array(
				'label'     => __( 'Button Hover Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition'   => array( 'icustom' => 'yes' ),
				'selectors' => array( '{{WRAPPER}} {{CURRENT_ITEM}} .goso-media-rmbtn a:hover' => 'background-color: {{VALUE}};' ),
			)
		);
		$repeater->add_control(
			'irm_color',
			array(
				'label'     => __( 'Button Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition'   => array( 'icustom' => 'yes' ),
				'selectors' => array( '{{WRAPPER}} {{CURRENT_ITEM}} .goso-media-rmbtn a' => 'color: {{VALUE}};' ),
			)
		);
		$repeater->add_control(
			'irm_hcolor',
			array(
				'label'     => __( 'Button Hover Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition'   => array( 'icustom' => 'yes' ),
				'selectors' => array( '{{WRAPPER}} {{CURRENT_ITEM}} .goso-media-rmbtn a:hover' => 'color: {{VALUE}};' ),
			)
		);
		
		$repeater->add_control(
			'irm_bcolor',
			array(
				'label'     => __( 'Button Borders Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} {{CURRENT_ITEM}} .goso-media-rmbtn a' => 'border-color: {{VALUE}};' ),
				'condition' => array( 'icustom' => 'yes' ),
			)
		);
		$repeater->add_control(
			'irm_hbcolor',
			array(
				'label'     => __( 'Button Hover Borders Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} {{CURRENT_ITEM}} .goso-media-rmbtn a:hover' => 'border-color: {{VALUE}};' ),
				'condition' => array( 'icustom' => 'yes' ),
			)
		);
		
		$repeater->end_controls_tab();

		$repeater->end_controls_tabs();
		

		$this->add_control(
			'slides', array(
				'label'     => __( 'Slides', 'authow' ),
				'type'      => Controls_Manager::REPEATER,
				'fields'    => $repeater->get_controls(),
				'default'   => array(
					array(
						'image'            => array( 'url' => Utils::get_placeholder_image_src() ),
						'title_text'       => 'This is the heading',
						'description_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
					),
					array(
						'image'            => array( 'url' => Utils::get_placeholder_image_src() ),
						'title_text'       => 'This is the heading',
						'description_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
					),
					array(
						'image'            => array( 'url' => Utils::get_placeholder_image_src() ),
						'title_text'       => 'This is the heading',
						'description_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
					),
					array(
						'image'            => array( 'url' => Utils::get_placeholder_image_src() ),
						'title_text'       => 'This is the heading',
						'description_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
					),
					array(
						'image'            => array( 'url' => Utils::get_placeholder_image_src() ),
						'title_text'       => 'This is the heading',
						'description_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
					),
					array(
						'image'            => array( 'url' => Utils::get_placeholder_image_src() ),
						'title_text'       => 'This is the heading',
						'description_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
					),
				),
				'separator' => 'after',
			)
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_spacing', array(
				'label' => __( 'Spacing', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE
			)
		);
		
		$this->add_responsive_control(
			'slides_padding', array(
				'label'      => __( 'Padding for Whole Slides', 'authow' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .goso-media-carousels .goso-media-inct' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			)
		);
		
		$this->add_responsive_control(
			'title_top_space', array(
				'label'     => __( 'Content Margin Top', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100 ) ),
				'condition'   => array( 'contentpos' => 'below' ),
				'selectors' => array(
					'{{WRAPPER}} .goso-media-carousels.pc-ctpos-below .goso-media-content' => 'margin-top: {{SIZE}}px;'
				)
			)
		);
		
		$this->add_responsive_control(
			'title_bottom_space', array(
				'label'     => __( 'Content Margin Bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100 ) ),
				'condition'   => array( 'contentpos' => 'above' ),
				'selectors' => array(
					'{{WRAPPER}} .goso-media-carousels.pc-ctpos-above .goso-media-content' => 'margin-bottom: {{SIZE}}px;'
				)
			)
		);
		
		$this->add_responsive_control(
			'content_space', array(
				'label'      => __( 'Content Margin', 'authow' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .goso-media-carousels.pc-ctpos-on .pc-media-ctinner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition'   => array( 'contentpos' => 'on' ),
			)
		);
		
		$this->add_responsive_control(
			'content_padding', array(
				'label'      => __( 'Content Padding', 'authow' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .goso-media-carousels .pc-media-ctinner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			)
		);
		
		$this->add_responsive_control(
			'stit_bottom_space', array(
				'label'     => __( 'Sub Title Margin Bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100 ) ),
				'selectors' => array(
					'{{WRAPPER}} .goso-media-carousels .goso-media-stit' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				)
			)
		);
		
		$this->add_responsive_control(
			'desc_top_space', array(
				'label'     => __( 'Description Margin Top', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100 ) ),
				'selectors' => array(
					'{{WRAPPER}} .goso-media-carousels .goso-media-desc' => 'margin-top: {{SIZE}}{{UNIT}};'
				)
			)
		);
		
		$this->add_responsive_control(
			'button_top_space', array(
				'label'     => __( 'Read More Button Margin Top', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100 ) ),
				'selectors' => array(
					'{{WRAPPER}} .goso-media-rmbtn' => 'margin-top: {{SIZE}}{{UNIT}};'
				)
			)
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_overlay', array(
				'label' => __( 'Slides Overlay', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE
			)
		);
		
		$this->add_control(
			'heading_overlayimg', array(
				'label'     => __( 'Overlay on Image', 'authow' ),
				'type'      => Controls_Manager::HEADING,
			)
		);
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'img_overlay',
				'label'    => __( 'Image Overlay Background', 'authow' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .pc-adcr-overlay',
			)
		);
		
		$this->add_responsive_control(
			'overlay_opacity', array(
				'label'     => __( 'Overlay Opacity', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1, 'step' => 0.05 ) ),
				'selectors' => array(
					'{{WRAPPER}} .pc-adcr-overlay' => 'opacity: {{SIZE}};'
				)
			)
		);
		
		$this->add_responsive_control(
			'overlay_hopacity', array(
				'label'     => __( 'Overlay Opacity on Hover', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1, 'step' => 0.05 ) ),
				'selectors' => array(
					'{{WRAPPER}} .goso-media-inct:hover .pc-adcr-overlay' => 'opacity: {{SIZE}};'
				)
			)
		);
		
		$this->add_control(
			'heading_overlayct', array(
				'label'     => __( 'Overlay on Content', 'authow' ),
				'type'      => Controls_Manager::HEADING,
			)
		);
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'ct_overlay',
				'label'    => __( 'Content Overlay Background', 'authow' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .pc-media-ctinner:before',
			)
		);
		
		$this->add_responsive_control(
			'ctoverlay_opacity', array(
				'label'     => __( 'Overlay Opacity', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1, 'step' => 0.05 ) ),
				'selectors' => array(
					'{{WRAPPER}} .pc-media-ctinner:before' => 'opacity: {{SIZE}};'
				)
			)
		);
		
		$this->add_responsive_control(
			'ctoverlay_hopacity', array(
				'label'     => __( 'Overlay Opacity on Hover', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1, 'step' => 0.05 ) ),
				'selectors' => array(
					'{{WRAPPER}} .goso-media-inct:hover .pc-media-ctinner:before' => 'opacity: {{SIZE}};'
				)
			)
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_content', array(
				'label' => __( 'Advanced Carousel Style', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE
			)
		);
		
		$this->add_control(
			'heading_carousel_slides', array(
				'label'     => __( 'Carousel Slides', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'slides_bg',
				'label'    => __( 'Slides Background', 'authow' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .goso-media-inct',
			)
		);
		
		$this->add_control(
			'slides_borders', array(
				'label'     => __( 'Borders Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .goso-media-inct' => 'border: 1px solid {{VALUE}};'
				)
			)
		);
		
		$this->add_responsive_control(
			'slides_borders_width', array(
				'label'      => __( 'Borders Width', 'authow' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .goso-media-inct' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			)
		);
		
		$this->add_control(
			'heading_carousel_content', array(
				'label'     => __( 'Carousel Content', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_responsive_control(
			'text_align', array(
				'label'     => __( 'Alignment', 'authow' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => __( 'Left', 'elementor-pro' ),
						'icon'  => 'eicon-text-align-left'
					),
					'center' => array(
						'title' => __( 'Center', 'elementor-pro' ),
						'icon'  => 'eicon-text-align-center'
					),
					'right'  => array(
						'title' => __( 'Right', 'elementor-pro' ),
						'icon'  => 'eicon-text-align-right'
					)
				),
				'selectors' => array(
					'{{WRAPPER}} .goso-media-carousels .goso-media-content' => 'text-align: {{VALUE}};'
				)
			)
		);
		
		$this->add_control(
			'content_position',
			array(
				'label'                => __( 'Vertical Position', 'authow' ),
				'type'                 => Controls_Manager::CHOOSE,
				'label_block'          => false,
				'condition'   => array( 'contentpos' => 'on' ),
				'options'              => array(
					'top'    => array(
						'title' => __( 'Top', 'authow' ),
						'icon'  => 'eicon-v-align-top',
					),
					'middle' => array(
						'title' => __( 'Middle', 'authow' ),
						'icon'  => 'eicon-v-align-middle',
					),
					'bottom' => array(
						'title' => __( 'Bottom', 'authow' ),
						'icon'  => 'eicon-v-align-bottom',
					),
				),
				'selectors'            => array(
					'{{WRAPPER}} .pc-ctpos-on .goso-media-content' => 'align-items: {{VALUE}}',
				),
				'selectors_dictionary' => array(
					'top'    => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				),
			)
		);
		
		$this->add_control(
			'heading_stitle', array(
				'label'     => __( 'Sub Title', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		
		$this->add_control(
			'stitle_color', array(
				'label'     => __( 'Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .goso-media-stit' => 'color: {{VALUE}};'
				)
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'stitle_typography',
				'selector' => '{{WRAPPER}} .goso-media-stit'
			)
		);

		$this->add_control(
			'heading_title', array(
				'label'     => __( 'Title', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'title_color', array(
				'label'     => __( 'Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .goso-media-carousels .goso-media-title' => 'color: {{VALUE}};'
				)
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .goso-media-carousels .goso-media-title'
			)
		);

		$this->add_control(
			'heading_description', array(
				'label'     => __( 'Description', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			)
		);
		
		$this->add_control(
			'description_color', array(
				'label'     => __( 'Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .goso-media-carousels .goso-media-desc' => 'color: {{VALUE}};'
				)
			)
		);
		
		$this->add_control(
			'description_linkcolor', array(
				'label'     => __( 'Links Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .goso-media-carousels .goso-media-desc a' => 'color: {{VALUE}};'
				)
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .goso-media-carousels .goso-media-desc'
			)
		);
		
		$this->add_control(
			'rm_style',
			array(
				'label' => __( 'Read More Button', 'authow' ),
				'type'  => Controls_Manager::HEADING,
				'separator'   => 'before',
			)
		);
		
		$this->add_control(
			'rm_bgcolor',
			array(
				'label'     => __( 'Button Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-media-rmbtn a' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'rm_bghcolor',
			array(
				'label'     => __( 'Button Hover Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-media-rmbtn a:hover' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'rm_color',
			array(
				'label'     => __( 'Button Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-media-rmbtn a' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'rm_hcolor',
			array(
				'label'     => __( 'Button Hover Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-media-rmbtn a:hover' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'rm_typo',
				'label'    => __( 'Button Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-media-rmbtn a',
			)
		);
		
		$this->add_responsive_control(
			'btn_padding', array(
				'label'      => __( 'Button Padding', 'authow' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .goso-media-rmbtn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			)
		);
		
		$this->add_responsive_control(
			'btn_bdradius', array(
				'label'      => __( 'Button Borders Radius', 'authow' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .goso-media-rmbtn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			)
		);
		
		$this->add_control(
			'addrmborder', array(
				'label'     => __( 'Add Button Borders', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
				'return_value' => 'yes',
			)
		);
		
		$this->add_responsive_control(
			'btn_bdwidth', array(
				'label'      => __( 'Button Borders Width', 'authow' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em' ),
				'condition' => array( 'addrmborder' => 'yes' ),
				'selectors'  => array(
					'{{WRAPPER}} .goso-media-rmbtn a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			)
		);
		
		$this->add_control(
			'rm_bcolor',
			array(
				'label'     => __( 'Button Borders Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-media-rmbtn a' => 'border-color: {{VALUE}};' ),
				'condition' => array( 'addrmborder' => 'yes' ),
			)
		);
		$this->add_control(
			'rm_hbcolor',
			array(
				'label'     => __( 'Button Hover Borders Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-media-rmbtn a:hover' => 'border-color: {{VALUE}};' ),
				'condition' => array( 'addrmborder' => 'yes' ),
			)
		);

		$this->end_controls_section();
	}

	protected function get_repeater_defaults() {
		$placeholder_image_src = Utils::get_placeholder_image_src();

		return array_fill( 0, 5, array(
			'image' => array( 'url' => $placeholder_image_src )
		) );
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
		$settings = $this->get_settings();

		if ( empty( $settings['slides'] ) ) {
			return;
		}

		$css_class = 'goso-block-vc goso-media-carousels';
		$contentpos = $settings['contentpos'] ? $settings['contentpos'] : 'below';
		$css_class .= ' pc-ctpos-' . $contentpos;

		$data_slider = $settings['showdots'] ? ' data-dots="true"' : '';
		$data_slider .= ! $settings['shownav'] ? ' data-nav="true"' : '';
		$data_slider .= ! $settings['loop'] ? ' data-loop="true"' : '';
		$data_slider .= ' data-auto="' . ( 'yes' == $settings['autoplay'] ? 'true' : 'false' ) . '"';
		$data_slider .= $settings['auto_time'] ? ' data-autotime="' . $settings['auto_time'] . '"' : '';
		$data_slider .= $settings['speed'] ? ' data-speed="' . $settings['speed'] . '"' : '';


		//$data_slider .= ' data-margin="' . ( isset( $settings['slides_item_gap'] ) && $settings['slides_item_gap'] ? $settings['slides_item_gap'] : '10' ) . '"';
		$data_slider .= ' data-item="' . ( isset( $settings['slides_per_view'] ) && $settings['slides_per_view'] ? $settings['slides_per_view'] : '3' ) . '"';
		$data_slider .= ' data-desktop="' . ( isset( $settings['slides_per_view'] ) && $settings['slides_per_view'] ? $settings['slides_per_view'] : '3' ) . '" ';
		$data_slider .= ' data-tablet="' . ( isset( $settings['slides_per_view_tablet'] ) && $settings['slides_per_view_tablet'] ? $settings['slides_per_view_tablet'] : '2' ) . '"';
		$data_slider .= ' data-tabsmall="' . ( isset( $settings['slides_per_view_tablet'] ) && $settings['slides_per_view_tablet'] ? $settings['slides_per_view_tablet'] : '2' ) . '"';
		$data_slider .= ' data-mobile="' . ( isset( $settings['slides_per_view_mobile'] ) && $settings['slides_per_view_mobile'] ? $settings['slides_per_view_mobile'] : '1' ) . '"';
		?>

		<div class="<?php echo esc_attr( $css_class ); ?>">
			<div class="goso-advanced-carousel-mg">
				<div class="goso-block_content goso-owl-carousel goso-advanced-carousel goso-owl-carousel-slider" <?php echo $data_slider; ?>>
					<?php
					$slide_prints_count = 0;
					$image_size = isset( $settings['image_size'] ) && $settings['image_size'] ? $settings['image_size'] : 'goso-thumb';
					$image_size_mobile = isset( $settings['image_size_mobile'] ) && $settings['image_size_mobile'] ? $settings['image_size_mobile'] : '';
					$border_class = $settings['addrmborder'] ? ' pc-rmbtn-borders' : '';
					if ( goso_is_mobile() && $image_size_mobile ) {
						$image_size = $image_size_mobile;
					}
					
					foreach ( $settings['slides'] as $index => $slide ) {
						$slide_prints_count ++;

						$slide_stitle = $slide['stitle_text'] ? $slide['stitle_text'] : '';
						$slide_title = $slide['title_text'] ? $slide['title_text'] : '';
						$desc_title  = $slide['description_text'] ? $slide['description_text'] : '';
						$button_text  = $slide['treadmore'] ? $slide['treadmore'] : '';
						$btnadd_icon  = $slide['btnadd_icon'] ? $slide['btnadd_icon'] : '';
						$icon_pos  = $slide['icon_pos'] ? $slide['icon_pos'] : 'left';
						$item_id     = $slide['_id'] ? ' elementor-repeater-item-' . $slide['_id'] : '';

						$element_key = 'slide-' . $index . '-' . $slide_prints_count;
						$slider_img = $this->get_slide_image_url( $slide, $settings );
						$slider_img_display = goso_get_image_size_url( $slider_img, $image_size );
						
						$this->add_render_attribute( $element_key . '-image', array(
							'class' => 'goso-image-holder',
							'style' => 'background-image: url(' . $slider_img_display . ')',
						) );

						$a_before = $a_after = '';
						$reders_href = false;

						$slide_type = isset( $slide['type'] ) ? $slide['type'] : 'image';
						
						if( 'image' == $slide_type ){
							if ( 'custom' === $slide['image_link_to_type'] ) {
								if ( $slide['image_link_to']['is_external'] ) {
									$this->add_render_attribute( $element_key . '_link', 'target', '_blank' );
								}
								if ( $slide['image_link_to']['nofollow'] ) {
									$this->add_render_attribute( $element_key . '_link', 'nofollow', '' );
								}
								if ( $slide['image_link_to']['url'] ) {
									$this->add_render_attribute( $element_key . '_link', 'href', $slide['image_link_to']['url'] );
								}
								$reders_href = true;
							} else if( 'file' === $slide['image_link_to_type'] ){
								$this->add_render_attribute( $element_key . '_link', array(
									'class' => 'elementor-clickable',
									'href' => $slider_img,
								) );
								$reders_href = true;
							}
							
						} else if ( 'video' == $slide_type && $slide['video']['url'] ) {
							$this->add_render_attribute( $element_key . '_link', 'class', 'goso-other-layouts-lighbox' );
							$this->add_render_attribute( $element_key . '_link', 'href', $slide['video']['url'] );
							$reders_href = true;
						}
							
						if( $reders_href ){
							$a_before = '<a ' . $this->get_render_attribute_string( $element_key . '_link' ) . '>';
							$a_after  = '</a>';
						}
						?>
						<div class="goso-media-item<?php echo $item_id;?>">
							<div class="goso-media-inner">
								<div class="goso-media-inct">
									<div class="goso-media-img">
										<?php if( 'on' != $contentpos ): echo $a_before; endif; ?>
										<div class="pc-adcr-overlay"></div>
										<?php if( 'on' != $contentpos ): echo $a_after; endif; ?>
										<div <?php echo $this->get_render_attribute_string( $element_key . '-image' ); ?>>
											<?php
											if ( 'video' === $slide['type'] ) {
												echo '<div class="overlay-icon-format normal-size-icon">';
												goso_fawesome_icon( 'fas fa-play' );
												echo '</div>';
											}
											?>
										</div>
									</div>
									<?php if ( $slide_stitle || $slide_title || $desc_title || $button_text ) : ?>
										<div class="goso-media-content">
											<?php if( 'on' == $contentpos && $a_before && $a_after ) { ?>
											<?php echo $a_before . $a_after; ?>
											<?php } ?>
											<div class="pc-media-ctinner">
												<?php if ( $slide_stitle ): ?>
													<div class="goso-media-stit"><?php echo $slide_stitle; ?></div>
												<?php endif; ?>
												<?php if ( $slide_title ): ?>
													<h3 class="goso-media-title"><?php echo $slide_title; ?></h3>
												<?php endif; ?>
												<?php if ( $desc_title ): ?>
													<div class="goso-media-desc"><?php echo $desc_title ?></div>
												<?php endif; ?>
												<?php if ( $button_text || 'yes' == $btnadd_icon ): 
												$button_href = $slide['rmlink']['url'] ? $slide['rmlink']['url'] : '';
												$button_target = $slide['rmlink']['is_external'] ? ' target="_blank"' : '';
												$button_nofollow = $slide['rmlink']['nofollow'] ? ' rel="nofollow"' : '';
												?>
													<div class="goso-media-rmbtn<?php echo $border_class; ?>"><a href="<?php echo $button_href; ?>"<?php echo $button_target . $button_nofollow; ?>>
														<?php if( 'yes' == $btnadd_icon && 'left' == $icon_pos ) { \Elementor\Icons_Manager::render_icon( $slide['rmicon'], [ 'aria-hidden' => 'true' ] ); } ?>
														<?php if( $button_text ) { echo $button_text; } ?>
														<?php if( 'yes' == $btnadd_icon && 'right' == $icon_pos ) { \Elementor\Icons_Manager::render_icon( $slide['rmicon'], [ 'aria-hidden' => 'true' ] ); } ?>
													</a></div>
												<?php endif; ?>
											</div>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>

		<?php
	}

	protected function get_slide_image_url( $slide, array $settings ) {
		$image_url = '';

		if ( ! $image_url ) {
			$image_url = $slide['image']['url'];
		}

		return $image_url;
	}

	protected function get_image_link_click( $slide ) {
		if ( $slide['video']['url'] ) {
			return $slide['image']['url'];
		}

		if ( ! $slide['image_link_to_type'] ) {
			return '';
		}

		if ( 'custom' === $slide['image_link_to_type'] ) {
			return $slide['image_link_to']['url'];
		}

		return $slide['image']['url'];
	}
}
