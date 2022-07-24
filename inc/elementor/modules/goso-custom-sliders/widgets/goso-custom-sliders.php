<?php
namespace GosoAuthowElementor\Modules\GosoCustomSliders\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use GosoAuthowElementor\Base\Base_Widget;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoCustomSliders extends Base_Widget {

	public function get_name() {
		return 'goso-custom-sliders';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( 'Custom Slider', 'authow' );
	}

	public function get_icon() {
		return 'eicon-slideshow';
	}
	
	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'slides', 'carousel', 'image', 'title', 'slider' );
	}

	protected function register_controls() {
		

		$this->start_controls_section(
			'section_slides', array(
				'label' => __( 'Slides', 'authow' )
			)
		);

		$repeater = new Repeater();
		$repeater->start_controls_tabs( 'slides_repeater' );

		$repeater->start_controls_tab( 'content', array( 'label' => __( 'Content', 'authow' ) ) );
		$repeater->add_control(
			'heading', array(
				'label'       => __( 'Title & Description', 'authow' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Slide Heading', 'authow' ),
				'label_block' => true,
			)
		);

		$repeater->add_control(
			'description', array(
				'label'      => __( 'Description', 'authow' ),
				'type'       => Controls_Manager::TEXTAREA,
				'default'    => __( 'I am slide content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'authow' ),
				'show_label' => false,
			)
		);

		$repeater->add_control(
			'button_text', array(
				'label'   => __( 'Button Text 1', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Click Here', 'authow' ),
			)
		);

		$repeater->add_control(
			'button_link', array(
				'label'       => __( 'Button Link 1', 'authow' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'authow' ),
			)
		);
		$repeater->add_control(
			'button_text2', array(
				'label'   => __( 'Button Text 2', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Click Here', 'authow' ),
			)
		);

		$repeater->add_control(
			'button_link2', array(
				'label'       => __( 'Button Link 2', 'authow' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'authow' ),
			)
		);

		$repeater->add_control(
			'add_url_feat_img', array(
				'label'       => __( 'Add image url', 'authow' ),
				'type'        => Controls_Manager::SWITCHER,
				'separator' => 'before',

			)
		);

		$repeater->add_control(
			'url_feat_img', array(
				'label'       => __( 'Image Url', 'authow' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'authow' ),
				'conditions'  => array(
					'terms' => array(
						array(
							'name'  => 'add_url_feat_img',
							'value' => 'yes',
						)
					),
				),
			)
		);

		$repeater->end_controls_tab();

		$repeater->start_controls_tab( 'background', array( 'label' => __( 'Background', 'authow' ) ) );

		$repeater->add_control(
			'background_color', array(
				'label'     => __( 'Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#bbbbbb',
				'selectors' => array( '{{WRAPPER}} {{CURRENT_ITEM}} .goso-ctslide-bg' => 'background-color: {{VALUE}}' ),
			)
		);

		$repeater->add_control(
			'background_image', array(
				'label'     => _x( 'Image', 'Background Control', 'authow' ),
				'type'      => Controls_Manager::MEDIA,
				'selectors' => array( '{{WRAPPER}} {{CURRENT_ITEM}} .goso-ctslide-bg' => 'background-image: url({{URL}})' ),
			)
		);
		$repeater->add_control(
			'background_size', array(
				'label'      => _x( 'Size', 'Background Control', 'authow' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'cover',
				'options'    => array(
					'cover'   => _x( 'Cover', 'Background Control', 'authow' ),
					'contain' => _x( 'Contain', 'Background Control', 'authow' ),
					'auto'    => _x( 'Auto', 'Background Control', 'authow' ),
				),
				'selectors'  => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} .goso-ctslide-bg' => 'background-size: {{VALUE}}'
				),
				'conditions' => array(
					'terms' => array(
						array(
							'name'     => 'background_image[url]',
							'operator' => '!=',
							'value'    => '',
						)
					),
				),
			)
		);

		$repeater->add_control(
			'background_ken_burns', array(
				'label'      => __( 'Ken Burns Effect', 'authow' ),
				'type'       => Controls_Manager::SWITCHER,
				'default'    => '',
				'separator'  => 'before',
				'conditions' => array(
					'terms' => array(
						array(
							'name'     => 'background_image[url]',
							'operator' => '!=',
							'value'    => '',
						)
					),
				)
			)
		);

		$repeater->add_control(
			'zoom_direction', array(
				'label'      => __( 'Zoom Direction', 'authow' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'in',
				'options'    => array(
					'in'  => __( 'In', 'authow' ),
					'out' => __( 'Out', 'authow' ),
				),
				'conditions' => array(
					'terms' => array(
						array(
							'name'     => 'background_ken_burns',
							'operator' => '!=',
							'value'    => '',
						)
					),
				),
			)
		);

		$repeater->add_control(
			'background_overlay', array(
				'label'      => __( 'Background Overlay', 'authow' ),
				'type'       => Controls_Manager::SWITCHER,
				'default'    => '',
				'separator'  => 'before',
				'conditions' => array(
					'terms' => array(
						array(
							'name'     => 'background_image[url]',
							'operator' => '!=',
							'value'    => '',
						),
					),
				),
			)
		);

		$repeater->add_control(
			'background_overlay_color', array(
				'label'      => __( 'Color', 'authow' ),
				'type'       => Controls_Manager::COLOR,
				'default'    => 'rgba(0,0,0,0.5)',
				'conditions' => array(
					'terms' => array(
						array(
							'name'  => 'background_overlay',
							'value' => 'yes',
						)
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} .goso-ctslide-inner .goso-ctslider-bg-overlay' => 'background-color: {{VALUE}}'
				)
			)
		);
		$repeater->add_control(
			'background_overlay_blend_mode', array(
				'label'      => __( 'Blend Mode', 'authow' ),
				'type'       => Controls_Manager::SELECT,
				'options'    => array(
					''            => __( 'Normal', 'authow' ),
					'multiply'    => 'Multiply',
					'screen'      => 'Screen',
					'overlay'     => 'Overlay',
					'darken'      => 'Darken',
					'lighten'     => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'color-burn'  => 'Color Burn',
					'hue'         => 'Hue',
					'saturation'  => 'Saturation',
					'color'       => 'Color',
					'exclusion'   => 'Exclusion',
					'luminosity'  => 'Luminosity',
				),
				'conditions' => array(
					'terms' => array(
						array(
							'name'  => 'background_overlay',
							'value' => 'yes',
						)
					),
				),
				'selectors'  => array( '{{WRAPPER}} {{CURRENT_ITEM}} .goso-ctslide-inner .goso-ctslider-bg-overlay' => 'mix-blend-mode: {{VALUE}}' ),
			)
		);

		$repeater->end_controls_tab();

		$repeater->start_controls_tab( 'style', array( 'label' => __( 'Style', 'authow' ) ) );

		$repeater->add_control(
			'custom_style', array(
				'label'       => __( 'Custom', 'authow' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => __( 'Set custom style that will only affect this specific slide.', 'authow' ),
			)
		);

		$repeater->add_control(
			'horizontal_position', array(
				'label'                => __( 'Horizontal Position', 'authow' ),
				'type'                 => Controls_Manager::CHOOSE,
				'label_block'          => false,
				'options'              => array(
					'left'   => array(
						'title' => __( 'Left', 'authow' ),
						'icon'  => 'eicon-h-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'authow' ),
						'icon'  => 'eicon-h-align-center',
					),
					'right'  => array(
						'title' => __( 'Right', 'authow' ),
						'icon'  => 'eicon-h-align-right',
					),
				),
				'selectors'            => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} .goso-ctslide-inner .goso-ctslider-content' => '{{VALUE}}',
				),
				'selectors_dictionary' => array(
					'left'   => 'margin-right: auto',
					'center' => 'margin: 0 auto',
					'right'  => 'margin-left: auto',
				),
				'conditions'           => array(
					'terms' => array(
						array(
							'name'  => 'custom_style',
							'value' => 'yes',
						)
					),
				),
			)
		);

		$repeater->add_control(
			'vertical_position',
			array(
				'label'                => __( 'Vertical Position', 'authow' ),
				'type'                 => Controls_Manager::CHOOSE,
				'label_block'          => false,
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
					'{{WRAPPER}} {{CURRENT_ITEM}} .goso-ctslide-inner' => 'align-items: {{VALUE}}',
				),
				'selectors_dictionary' => array(
					'top'    => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				),
				'conditions'           => array(
					'terms' => array(
						array(
							'name'  => 'custom_style',
							'value' => 'yes',
						)
					)
				),
			)
		);

		$repeater->add_control(
			'text_align', array(
				'label'       => __( 'Text Align', 'authow' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => array(
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
				'selectors'   => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} .goso-ctslide-inner' => 'text-align: {{VALUE}}'
				),
				'conditions'  => array(
					'terms' => array(
						array(
							'name'  => 'custom_style',
							'value' => 'yes',
						)
					)
				),
			)
		);

		$repeater->add_control(
			'content_color', array(
				'label'      => __( 'Content Color', 'authow' ),
				'type'       => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} .gososlider-title'                     => 'color: {{VALUE}}',
					'{{WRAPPER}} {{CURRENT_ITEM}} .gososlider-caption'                   => 'color: {{VALUE}}',
					'{{WRAPPER}} {{CURRENT_ITEM}} .goso-slider_btnwrap .gososlider-btn' => 'color: {{VALUE}}; border-color: {{VALUE}}',
				),
				'conditions' => array(
					'terms' => array(
						array(
							'name'  => 'custom_style',
							'value' => 'yes',
						)
					)
				)
			)
		);

		$repeater->add_control(
			'bg_item_overlay', array(
				'label'   => __( 'Enable Overlay Background Color', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''    => 'Default',
					'yes' => 'Yes',
					'no'  => 'No',
				),
				'separator' => 'before',
				'conditions' => array(
					'terms' => array(
						array(
							'name'  => 'custom_style',
							'value' => 'yes',
						)
					)
				)
			)
		);
		$repeater->add_control(
			'bgoverlay_opacity',array(
				'label' => __( 'Overlay Background Opacity', 'authow' ),
				'type' => Controls_Manager::SLIDER,
				'range' => array( 'px' => array( 'max' => 1, 'step' => 0.01 ) ),
				'selectors' => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} .gososlider-title-overlay .pslider-bgoverlay-inner:before' => 'opacity: {{SIZE}};',
					'{{WRAPPER}} {{CURRENT_ITEM}} .gososlider-caption-overlay .pslider-bgoverlay-inner:before' => 'opacity: {{SIZE}};',

				),
				'conditions' => array(
					'terms' => array(
						array(
							'name'  => 'custom_style',
							'value' => 'yes',
						)
					)
				)
			)
		);
		$repeater->add_control(
			'bgoverlay_color', array(
				'label'     => __( 'Overlay Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} .gososlider-title-overlay .pslider-bgoverlay-inner:before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} {{CURRENT_ITEM}} .gososlider-caption-overlay .pslider-bgoverlay-inner:before' => 'background-color: {{VALUE}}',
				),
				'default' => '',
				'conditions' => array(
					'terms' => array(
						array(
							'name'  => 'custom_style',
							'value' => 'yes',
						)
					)
				)
			)
		);
		$repeater->add_responsive_control(
			'bgoverlay_padding',array(
				'label' => __( 'Padding', 'authow' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px' ),
				'selectors' => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} .gososlider-title-overlay .pslider-bgoverlay-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} {{CURRENT_ITEM}} .gososlider-caption-overlay .pslider-bgoverlay-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'conditions' => array(
					'terms' => array(
						array(
							'name'  => 'custom_style',
							'value' => 'yes',
						)
					)
				)
			)
		);

		$repeater->end_controls_tab();

		$repeater->end_controls_tabs();

		$this->add_control(
			'goso_slides', array(
				'label'       => __( 'Slides', 'authow' ),
				'type'        => Controls_Manager::REPEATER,
				'show_label'  => true,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'heading'          => __( 'Slide 1 Heading', 'authow' ),
						'description'      => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'authow' ),
						'button_text'      => __( 'Click Here', 'authow' ),
						'button_text2'     => __( 'Click Here', 'authow' ),
						'background_color' => '#833ca3',
					),
					array(
						'heading'          => __( 'Slide 2 Heading', 'authow' ),
						'description'      => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'authow' ),
						'button_text'      => __( 'Click Here', 'authow' ),
						'button_text2'     => __( 'Click Here', 'authow' ),
						'background_color' => '#4054b2',
					),
					array(
						'heading'          => __( 'Slide 3 Heading', 'authow' ),
						'description'      => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'authow' ),
						'button_text'      => __( 'Click Here', 'authow' ),
						'button_text2'     => __( 'Click Here', 'authow' ),
						'background_color' => '#1abc9c',
					)
				),
				'title_field' => '{{{ heading }}}',
			)
		);


		$this->add_control(
			'use_ratio',array(
				'label' => __( 'Use Ratio Height/Width', 'elementor-pro' ),
				'type' => Controls_Manager::SWITCHER,
				'separator' => 'before',

			)
		);
		$this->add_responsive_control(
			'slides_height', array(
				'label'      => __( 'Height', 'authow' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => array(
					'px' => array( 'min' => 100, 'max' => 1500 ),
				),
				'default'    => array( 'size' => 400 ),
				'size_units' => array( 'px' ),
				'selectors'  => array( '{{WRAPPER}} .goso-ctslide-wrap' => 'height: {{SIZE}}{{UNIT}};' ),
				'condition' => array( 'use_ratio!' => 'yes' )

			)
		);
		$this->add_responsive_control(
			'slides_img_ratio', array(
				'label'     => __( 'Ratio Height/Width', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'default' => array( 'size' => 0.5 ),
				'range'     => array( 'px' => array( 'min' => 0.1, 'max' => 2, 'step' => 0.01 ) ),
				'selectors' => array(
					'{{WRAPPER}} .goso-ctslide-wrap'        => 'height: auto !important;',
					'{{WRAPPER}} .goso-ctslide-wrap:before' => 'content:"";padding-top:calc( {{SIZE}} * 100% );',
				),
				'condition' => array( 'use_ratio' => 'yes' )
			)
		);

		$this->add_control(
			'btn_2lines',array(
				'label' => __( 'Second button in a new line on mobile?', 'elementor-pro' ),
				'type' => Controls_Manager::SWITCHER,
				'description' => __( 'Use in case you\'re using 2 buttons and this option helps you can show 2 buttons on mobile in 2 separate rows in case your buttons have long text', 'authow' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_slider_options',
			array(
				'label' => __( 'Slider Options', 'authow' ),
				'type'  => Controls_Manager::SECTION,
			)
		);

		$this->add_control(
			'autoplay', array(
				'label'   => __( 'Autoplay', 'authow' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
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
				'render_type' => 'template',
				'selectors'   => [ '{{WRAPPER}} .goso-owl-carousel' => '--pcfs-delay:calc({{VALUE}}s / 1000 - 0.1s)' ]
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
			'transition',
			array(
				'label'   => __( 'Transition', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'slide',
				'options' => array(
					'slide' => __( 'Slide', 'authow' ),
					'fade'  => __( 'Fade', 'authow' ),
				),
			)
		);

		$this->add_control(
			'content_animation',
			array(
				'label'   => __( 'Content Animation', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'fadeInUp',
				'options' => array(
					''            => __( 'None', 'authow' ),
					'fadeInUp'    => 'Fade In Up',
					'fadeInDown'  => 'Fade In Down',
					'fadeInLeft'  => 'Fade In Left',
					'fadeInRight' => 'Fade In Right',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_slides', array(
				'label' => __( 'Slides', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'content_max_width', array(
				'label'          => __( 'Content Width', 'authow' ),
				'type'           => Controls_Manager::SLIDER,
				'range'          => array(
					'px' => array( 'min' => 0, 'max' => 1000 ),
					'%'  => array( 'min' => 0, 'max' => 100 )
				),
				'size_units'     => array( '%', 'px' ),
				'default'        => array( 'size' => '66', 'unit' => '%' ),
				'tablet_default' => array( 'unit' => '%' ),
				'mobile_default' => array( 'unit' => '%' ),
				'selectors'      => array( '{{WRAPPER}} .goso-ctslider-content' => 'max-width: {{SIZE}}{{UNIT}};' ),
			)
		);

		$this->add_responsive_control(
			'slides_padding', array(
				'label'      => __( 'Padding', 'authow' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array( '{{WRAPPER}} .goso-ctslide-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ),
			)
		);

		$this->add_control(
			'slides_horizontal_position', array(
				'label'        => __( 'Horizontal Position', 'authow' ),
				'type'         => Controls_Manager::CHOOSE,
				'label_block'  => false,
				'default'      => 'center',
				'options'      => array(
					'left'   => array(
						'title' => __( 'Left', 'authow' ),
						'icon'  => 'eicon-h-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'authow' ),
						'icon'  => 'eicon-h-align-center',
					),
					'right'  => array(
						'title' => __( 'Right', 'authow' ),
						'icon'  => 'eicon-h-align-right',
					),
				),
				'prefix_class' => 'goso-h-poswrap-',
			)
		);

		$this->add_control(
			'slides_vertical_position', array(
				'label'        => __( 'Vertical Position', 'authow' ),
				'type'         => Controls_Manager::CHOOSE,
				'label_block'  => false,
				'default'      => 'middle',
				'options'      => array(
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
				'prefix_class' => 'goso-v-poswrap-',
			)
		);

		$this->add_control(
			'slides_text_align', array(
				'label'       => __( 'Text Align', 'authow' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => array(
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
				'default'     => 'center',
				'selectors'   => array(
					'{{WRAPPER}} .goso-ctslide-inner' => 'text-align: {{VALUE}}'
				)
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_title', array(
				'label' => __( 'Title', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'heading_spacing', array(
				'label'     => __( 'Spacing', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100 ) ),
				'selectors' => array(
					'{{WRAPPER}} .gososlider-title' => 'margin-bottom: {{SIZE}}{{UNIT}}'
				)
			)
		);

		$this->add_control(
			'heading_color', array(
				'label'     => __( 'Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .gososlider-title' => 'color: {{VALUE}}' )
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'heading_typography',
				'selector' => '{{WRAPPER}} .gososlider-title',
			)
		);

		$this->add_control(
			'heading_overlay',array(
				'label' => __( 'Enable Overlay Background Color', 'elementor-pro' ),
				'type' => Controls_Manager::SWITCHER,
				'separator' => 'before'
			)
		);
		$this->add_control(
			'heading_bgoverlay_opacity',array(
				'label' => __( 'Overlay Background Opacity', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => array( 'size' => .4 ),
				'range' => array( 'px' => array( 'max' => 1, 'step' => 0.01 ) ),
				'selectors' => array( '{{WRAPPER}} .gososlider-title-overlay .pslider-bgoverlay-inner:before' => 'opacity: {{SIZE}};' ),
				'condition' => array( 'heading_overlay' => 'yes' )
			)
		);
		$this->add_control(
			'heading_bgoverlay_color', array(
				'label'     => __( 'Overlay Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .gososlider-title-overlay .pslider-bgoverlay-inner:before' => 'background-color: {{VALUE}}' ),
				'default' => '#000000',
				'condition' => array( 'heading_overlay' => 'yes' )
			)
		);
		$this->add_responsive_control(
			'heading_bgoverlay_padding',array(
				'label' => __( 'Padding', 'authow' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px' ),
				'condition' => array( 'heading_overlay' => 'yes' ),
				'selectors' => array( '{{WRAPPER}} .gososlider-title-overlay .pslider-bgoverlay-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' )
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_description', array(
				'label' => __( 'Description', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'description_spacing', array(
				'label'     => __( 'Spacing', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100 ) ),
				'selectors' => array(
					'{{WRAPPER}} .gososlider-caption' => 'margin-bottom: {{SIZE}}{{UNIT}}'
				)
			)
		);

		$this->add_control(
			'description_color', array(
				'label'     => __( 'Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .gososlider-caption' => 'color: {{VALUE}}' )
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .gososlider-caption',
			)
		);
		$this->add_control(
			'description_overlay',array(
				'label' => __( 'Enable Overlay Background Color', 'elementor-pro' ),
				'type' => Controls_Manager::SWITCHER,
				'separator' => 'before'
			)
		);
		$this->add_control(
			'desc_bgoverlay_opacity',array(
				'label' => __( 'Overlay Background Opacity', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => array( 'size' => .4 ),
				'range' => array( 'px' => array( 'max' => 1, 'step' => 0.01 ) ),
				'selectors' => array( '{{WRAPPER}} .gososlider-caption .pslider-bgoverlay-inner:before' => 'opacity: {{SIZE}};' ),
				'condition' => array( 'description_overlay' => 'yes' )
			)
		);
		$this->add_control(
			'desc_bgoverlay_color', array(
				'label'     => __( 'Overlay Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .gososlider-caption .pslider-bgoverlay-inner:before' => 'background-color: {{VALUE}}' ),
				'default' => '#000000',
				'condition' => array( 'description_overlay' => 'yes' )
			)
		);
		$this->add_responsive_control(
			'desc_bgoverlay_padding',array(
				'label' => __( 'Padding', 'authow' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px' ),
				'condition' => array( 'description_overlay' => 'yes' ),
				'selectors' => array( '{{WRAPPER}} .gososlider-caption-overlay .pslider-bgoverlay-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' )
			)
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_button', array(
				'label' => __( 'Button 1', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-1',
			)
		);
		$this->add_control(
			'button_width', array(
				'label'     => __( 'Button Width', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 400, ), ),
				'selectors' => array( '{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-1' => 'width: {{SIZE}}{{UNIT}};', ),
			)
		);
		$this->add_control(
			'button_height', array(
				'label'     => __( 'Button Height', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ), ),
				'selectors' => array( '{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-1' => 'height: {{SIZE}}{{UNIT}};', ),
			)
		);
		$this->add_control(
			'button_border_width',
			array(
				'label'     => __( 'Border Width', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 20,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-1' => 'border-width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'button_border_radius',
			array(
				'label'     => __( 'Border Radius', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-1' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
				'separator' => 'after',
			)
		);

		$this->start_controls_tabs( 'button_tabs' );

		$this->start_controls_tab( 'normal', array( 'label' => __( 'Normal', 'authow' ) ) );

		$this->add_control(
			'button_text_color',
			array(
				'label'     => __( 'Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-1' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'button_background_color',
			array(
				'label'     => __( 'Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-1' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'button_border_color',
			array(
				'label'     => __( 'Border Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-1' => 'border-color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover', array( 'label' => __( 'Hover', 'authow' ) ) );

		$this->add_control(
			'button_hover_text_color',
			array(
				'label'     => __( 'Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-1:hover' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'button_hover_background_color',
			array(
				'label'     => __( 'Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-1:hover' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'button_hover_border_color',
			array(
				'label'     => __( 'Border Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  .goso-slider_btnwrap .gososlider-btn-1:hover' => 'border-color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Button 2
		$this->start_controls_section(
			'section2_style_button', array(
				'label' => __( 'Button 2', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button2_typography',
				'selector' => '{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-2',
			)
		);
		$this->add_control(
			'button2_width', array(
				'label'     => __( 'Button Width', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 400, ), ),
				'selectors' => array( '{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-2' => 'width: {{SIZE}}{{UNIT}};', ),
			)
		);
		$this->add_control(
			'button2_height', array(
				'label'     => __( 'Button Height', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ), ),
				'selectors' => array( '{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-2' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};', ),
			)
		);
		$this->add_control(
			'button2_border_width',
			array(
				'label'     => __( 'Border Width', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 20,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-2' => 'border-width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'button2_border_radius',
			array(
				'label'     => __( 'Border Radius', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-2' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
				'separator' => 'after',
			)
		);
		$this->add_control(
			'button2_heading',
			array(
				'label'     => __( 'Button 2', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->start_controls_tabs( 'button2_tabs' );

		$this->start_controls_tab( 'normal2', array( 'label' => __( 'Normal', 'authow' ) ) );

		$this->add_control(
			'button2_text_color',
			array(
				'label'     => __( 'Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  .goso-slider_btnwrap .gososlider-btn-2' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'button2_background_color',
			array(
				'label'     => __( 'Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  .goso-slider_btnwrap .gososlider-btn-2' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'button2_border_color',
			array(
				'label'     => __( 'Border Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  .goso-slider_btnwrap .gososlider-btn-2' => 'border-color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover2', array( 'label' => __( 'Hover', 'authow' ) ) );

		$this->add_control(
			'button2_hover_text_color',
			array(
				'label'     => __( 'Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  .goso-slider_btnwrap .gososlider-btn-2:hover' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'button2_hover_background_color',
			array(
				'label'     => __( 'Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  .goso-slider_btnwrap .gososlider-btn-2:hover' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'button2_hover_border_color',
			array(
				'label'     => __( 'Border Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .goso-slider_btnwrap .gososlider-btn-2:hover' => 'border-color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_pagination', array(
				'label' => __( 'Pagination', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control( 'heading_pagi_style', array(
			'label'     => __( 'Dots Pagination', 'authow' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => array( 'style' => array( 'style-35', 'style-38' ) )
		) );

		$this->add_control( 'dots_bg_color', array(
			'label'     => __( 'Dot Background Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array( '{{WRAPPER}} .goso-custom-slides .goso-owl-carousel .owl-dot span,{{WRAPPER}} .goso-owl-carousel .owl-dot span' => 'background-color: {{VALUE}};' ),
		) );

		$this->add_control( 'dots_bd_color', array(
			'label'     => __( 'Dot Borders Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array( '{{WRAPPER}} .goso-owl-carousel .owl-dot span' => 'border-color: {{VALUE}};' ),
		) );

		$this->add_control( 'dots_bga_color', array(
			'label'     => __( 'Dot Borders Active Background Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array( '{{WRAPPER}} .goso-owl-carousel .owl-dot.active span,{{WRAPPER}} .goso-owl-carousel .owl-dot.active span' => 'background-color: {{VALUE}};' ),
		) );

		$this->add_control( 'dots_bda_color', array(
			'label'     => __( 'Dot Borders Active Background Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array( '{{WRAPPER}} .goso-owl-carousel .owl-dot.active span' => 'border-color: {{VALUE}};' ),
		) );

		$this->add_control( 'dots_cs_w', array(
			'label'     => __( 'Dot Width', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 5, 'max' => 200, ) ),
			'selectors' => array( '{{WRAPPER}} .goso-owl-carousel .owl-dot span' => 'width: {{SIZE}}px;height: {{SIZE}}px;' ),
		) );

		$this->add_control( 'dots_csbd_w', array(
			'label'     => __( 'Dot Borders Width', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 1, 'max' => 100, ) ),
			'selectors' => array( '{{WRAPPER}} .goso-owl-carousel .owl-dot span' => 'border-width: {{SIZE}}px;' ),
		) );

		$this->add_control( 'dots_csspc_w', array(
			'label'     => __( 'Dot Spacing', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 1, 'max' => 100, ) ),
			'selectors' => array( '{{WRAPPER}} .goso-custom-slides .goso-owl-carousel .owl-dot,{{WRAPPER}} .goso-owl-carousel .owl-dot' => 'margin-left: {{SIZE}}px;margin-right: {{SIZE}}px;' ),
		) );

		$this->add_control( 'heading_prenex_style', array(
			'label'     => __( 'Previous/Next Buttons', 'authow' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		) );

		$this->add_control( 'dots_nxpv_color', array(
			'label'     => __( 'Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array( '{{WRAPPER}} .goso-owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .goso-owl-carousel .owl-nav .owl-next' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'dots_nxpv_hcolor', array(
			'label'     => __( 'Hover Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array( '{{WRAPPER}} .goso-owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .goso-owl-carousel .owl-nav .owl-next:hover' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'dots_nxpv_bgcolor', array(
			'label'     => __( 'Background Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array( '{{WRAPPER}} .goso-owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .goso-owl-carousel .owl-nav .owl-next' => 'background-color: {{VALUE}};' ),
		) );

		$this->add_control( 'dots_nxpv_hbgcolor', array(
			'label'     => __( 'Hover Background Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array( '{{WRAPPER}} .goso-owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .goso-owl-carousel .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};' ),
		) );

		$this->add_control( 'dots_nxpv_sizes', array(
			'label'     => __( 'Button Size', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 1, 'max' => 100, ) ),
			'selectors' => array( '{{WRAPPER}} .goso-owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .goso-owl-carousel .owl-nav .owl-next' => 'width: {{SIZE}}px;height: {{SIZE}}px;line-height: {{SIZE}}px;margin-top:0;transform:translateY(-50%);' ),
		) );

		$this->add_control( 'dots_nxpv_isizes', array(
			'label'     => __( 'Icon Size', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 1, 'max' => 100, ) ),
			'selectors' => array( '{{WRAPPER}} .goso-owl-carousel .owl-nav .owl-prev i, {{WRAPPER}} .goso-owl-carousel .owl-nav .owl-next i' => 'font-size: {{SIZE}}px;' ),
		) );

		$this->add_control( 'dots_nxpv_bdradius', array(
			'label'     => __( 'Button Border Radius', 'authow' ),
			'type'      => Controls_Manager::DIMENSIONS,
			'range'     => array( 'px' => array( 'min' => 1, 'max' => 100, ) ),
			'selectors' => array( '{{WRAPPER}} .goso-owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .goso-owl-carousel .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ),
		) );

		$this->end_controls_section();
	}

	protected function render() {

		$settings              = $this->get_settings();
		$settings['come_from'] = 'er';
		$twolines_class = '';
		if( 'yes' == $settings['btn_2lines'] ){
			$twolines_class = ' btn-twoline';
		}

		$data_slider = goso_get_data_slider( $settings );

		echo '<div class="goso-block-vc goso-custom-slides">';
		echo '<div class="goso-block_content goso-slides-wrap goso-owl-carousel goso-owl-carousel-slider" ' . $data_slider . '>';

		$slide_count = 0;

		foreach ( (array) $settings['goso_slides'] as $slide ) {

			$heading_overlay     = isset( $settings['heading_overlay'] ) && $settings['heading_overlay'] ? 'yes' : '';
			$description_overlay = isset( $settings['description_overlay'] ) && $settings['description_overlay'] ? 'yes' : '';

			$add_url_feat_img = isset( $slide['add_url_feat_img'] ) && $slide['add_url_feat_img'] ? $slide['add_url_feat_img'] : '';
			$url_feat_img     = isset( $slide['url_feat_img'] ) && $slide['url_feat_img'] ? $slide['url_feat_img'] : '';

			if( isset( $slide['bg_item_overlay'] ) && $slide['bg_item_overlay'] ) {
				if( 'yes' == $slide['bg_item_overlay'] ){
					$heading_overlay = $description_overlay = 'yes';
				}elseif( 'no' == $slide['bg_item_overlay'] ){
					$heading_overlay = $description_overlay = '';
				}
			}

			echo '<div class="elementor-repeater-item-' . $slide['_id'] . ' goso-ctslide-wrap">';
			echo '<div class="goso-custom-slide">';

			$ken_class = '';
			if ( '' != $slide['background_ken_burns'] ) {
				$ken_class = ' goso-ctslider-ken-' . $slide['zoom_direction'];
			}
			echo '<div class="goso-ctslide-bg' . $ken_class . '"></div>';

			echo '<div class="goso-ctslide-inner'. $twolines_class .'">';

			// Add link to image
			$url_feat_img_markup = '';
			if ( 'yes' === $add_url_feat_img && $url_feat_img ) {

				if ( ! empty( $url_feat_img['url'] ) ) {
					$this->add_render_attribute( 'url_feat_img' . $slide_count, 'href', $url_feat_img['url'] );
					if ( $url_feat_img['is_external'] ) {
						$this->add_render_attribute( 'url_feat_img' . $slide_count, 'target', '_blank' );
					}

					$url_feat_img_markup =  '<a class="goso-ctslider-featimg" ' . $this->get_render_attribute_string( 'url_feat_img' . $slide_count ) . '></a>';
				}

				echo $url_feat_img_markup;
			}


			if ( 'yes' === $slide['background_overlay'] ) {
				echo '<div class="goso-ctslider-bg-overlay"></div>';
			}

			echo '<div class="goso-ctslider-content goso-' . esc_attr( $settings['content_animation'] ) . '">';

			if ( isset( $slide['heading'] ) && $slide['heading'] ) {

				if( $heading_overlay ) {
					echo '<h2 class="gososlider-title gososlider-title-overlay"><span class="pslider-bgoverlay-inner"><span>' . $slide['heading'] . '</span></span></h2>';
				}else{
					echo '<h2 class="gososlider-title">' . $slide['heading'] . '</h2>';
				}

			}

			if ( isset( $slide['description'] ) && $slide['description'] ) {
				if( $description_overlay ) {
					echo '<div class="gososlider-caption gososlider-caption-overlay"><span class="pslider-bgoverlay-inner"><span>' . $slide['description'] . '</span></span></div>';
				}else{
					echo '<div class="gososlider-caption">' . $slide['description'] . '</div>';
				}

			}

			$html_button = '';
			if ( isset( $slide['button_text'] ) && $slide['button_text'] ) {
				$button_link_data = 'href="#"';
				if ( ! empty( $slide['button_link']['url'] ) ) {
					$this->add_render_attribute( 'button_link' . $slide_count, 'href', $slide['button_link']['url'] );
					if ( $slide['button_link']['is_external'] ) {
						$this->add_render_attribute( 'button_link' . $slide_count, 'target', '_blank' );
					}
					$button_link_data = $this->get_render_attribute_string( 'button_link' . $slide_count );
				}

				$html_button .= '<a class="gososlider-btn gososlider-btn-1 goso-button" ' . $button_link_data . '><span>' . $slide['button_text'] . '</span></a>';
			}
			if ( isset( $slide['button_text2'] ) && $slide['button_text2'] ) {
				$button_link_data = 'href="#"';
				if ( ! empty( $slide['button_link2']['url'] ) ) {
					$this->add_render_attribute( 'button_link2' . $slide_count, 'href', $slide['button_link2']['url'] );
					if ( $slide['button_link2']['is_external'] ) {
						$this->add_render_attribute( 'button_link2' . $slide_count, 'target', '_blank' );
					}
					$button_link_data = $this->get_render_attribute_string( 'button_link2' . $slide_count );
				}

				$html_button .= '<a class="gososlider-btn gososlider-btn-2 goso-button" ' . $button_link_data . '><span>' . $slide['button_text2'] . '</span></a>';
			}

			if ( $html_button ) {
				echo '<div class="goso-slider_btnwrap">' . $html_button . '</div>';
			}

			echo '</div>'; // slider content


			echo '</div>'; // goso-ctslide-inner
			echo '</div>'; // goso-custom-slide
			echo '</div>'; // goso-ctslide-wrap

			$slide_count ++;
		}

		echo '</div></div>';
	}
}
