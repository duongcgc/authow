<?php

namespace GosoAuthowElementor\Modules\GosoPricingTable\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Control_Media;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoPricingTable extends Base_Widget {

	public function get_name() {
		return 'penci-pricing-table';
	}

	public function get_title() {
		return penci_get_theme_name('Goso').' '.esc_html__( ' Pricing Table', 'authow' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}
	
	public function get_categories() {
		return [ 'penci-elements' ];
	}

	public function get_keywords() {
		return array( 'Pricing', 'Table' );
	}

	protected function register_controls() {
		

		$this->start_controls_section(
			'section_general', array(
				'label' => esc_html__( 'Pricing Table', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'_design_style', array(
				'label'   => __( 'Choose Style', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 's1',
				'options' => array(
					's1' => esc_html__( 'Style 1', 'authow' ),
					's2' => esc_html__( 'Style 2', 'authow' ),
				)
			)
		);

		$this->add_control(
			'_featured_header', array(
				'label'     => esc_html__( 'Featured Header?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
				'separator' => 'before',
			)
		);

		$this->add_control(
			'_use_img', array(
				'label'     => esc_html__( 'Add image', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
			)
		);

		$this->add_control(
			'_image',
			array(
				'label'     => __( 'Choose Image', 'authow' ),
				'type'      => Controls_Manager::MEDIA,
				'condition' => array( '_use_img' => 'yes' ),
			)
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(), array(
				'name'      => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'default'   => 'thumbnail',
				'separator' => 'none',
				'condition' => array( '_use_img' => 'yes' ),
			)
		);

		$this->add_responsive_control(
			'image_width', array(
				'label'     => __( 'Image Width', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 600, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-image' => 'max-width: {{SIZE}}px; width: 100%;' ),
				'condition' => array( '_use_img' => 'yes' ),
			)
		);
		$this->add_responsive_control(
			'image_height', array(
				'label'     => __( 'Image Height', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-image' => 'height: {{SIZE}}px;' ),
				'condition' => array( '_use_img' => 'yes' ),
			)
		);
		$this->add_responsive_control(
			'image_mar_top', array(
				'label'     => __( 'Image margin top', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-image' => 'margin-top: {{SIZE}}px;' ),
				'condition' => array( '_use_img' => 'yes' )
			)
		);
		$this->add_responsive_control(
			'image_mar_bottom', array(
				'label'     => __( 'Image margin bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-image' => 'margin-bottom: {{SIZE}}px;' ),
				'condition' => array( '_use_img' => 'yes' ),
				'separator' => 'after',
			)
		);

		$this->add_control(
			'_use_icon', array(
				'label'     => esc_html__( 'Add Icon', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
			)
		);

		$this->add_control(
			'_icon', array(
				'label'     => esc_html__( 'Select Icon', 'authow' ),
				'type'      => Controls_Manager::ICONS,
				'default'   => array(
					'value'   => 'fas fa-star',
					'library' => 'solid',
				),
				'condition' => array( '_use_icon' => 'yes' ),
			)
		);

		$this->add_responsive_control(
			'icon_mar_top', array(
				'label'     => __( 'Icon margin top', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-icon' => 'margin-top: {{SIZE}}px;' ),
				'condition' => array( '_use_icon' => 'yes' )
			)
		);

		$this->add_responsive_control(
			'icon_mar_bottom', array(
				'label'     => __( 'Icon margin bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-icon' => 'margin-bottom: {{SIZE}}px;' ),
				'condition' => array( '_use_icon' => 'yes' ),
				'separator' => 'after',
			)
		);

		$this->add_control(
			'_heading', array(
				'label'   => __( 'Pricing Name / Title', 'authow' ),
				'default' => __( 'Pricing Plan', 'authow' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'_subheading', array(
				'label'   => __( 'Pricing  Subtitle', 'authow' ),
				'default' => __( 'Pricing Short Text', 'authow' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'_price', array(
				'label'   => __( 'Pricing', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '$99', 'authow' ),
			)
		);

		$this->add_control(
			'_unit', array(
				'label'   => __( 'Pricing Unit', 'authow' ),
				'default' => __( '/month', 'authow' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'pricing_oneline', array(
				'label'     => esc_html__( 'Display Pricing & Pricing Unit in One Line?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
			)
		);
		$this->add_control(
			'content', array(
				'label'   => '',
				'type'    => Controls_Manager::WYSIWYG,
				'dynamic' => array( 'active' => true ),
				'default' => '<ul><li>Example Feature 1</li><li>Example Feature 2</li><li>Example Feature 3</li><li>Example Feature 4</li></ul>',
			)
		);
		$this->add_control(
			'_btn_text', array(
				'label'     => __( 'Button Text', 'authow' ),
				'type'      => Controls_Manager::TEXT,
				'separator' => 'before',
				'default'   => __( 'Sign Up', 'authow' ),
			)
		);

		$this->add_control(
			'_btn_link',
			array(
				'label'       => __( 'Button Link', 'authow' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'authow' ),
				'separator'   => 'after',
			)
		);

		$this->add_control(
			'_btn_pos', array(
				'label'   => __( 'Button Position', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'below',
				'options' => array(
					'below' => esc_html__( 'Below Content', 'authow' ),
					'above' => esc_html__( 'Above Content', 'authow' ),
				)
			)
		);

		$this->add_control(
			'_featured', array(
				'label'     => esc_html__( 'Make this pricing box as featured', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
				'separator' => 'before',
			)
		);

		$this->add_control(
			'_featured_style', array(
				'label'     => __( 'Featured Style', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'hheight',
				'options'   => array(
					'hheight' => esc_html__( 'Highlight Height', 'authow' ),
					'scale'   => esc_html__( 'Scale Up', 'authow' ),
				),
				'condition' => array(
					'_featured' => 'yes',
				)
			)
		);

		$this->add_control(
			'add_ribb', array(
				'label'   => __( 'Add Ribbon?', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''         => esc_html__( 'None', 'authow' ),
					'rib_icon' => esc_html__( 'Ribbon Icon', 'authow' ),
					'rib_text' => esc_html__( 'Ribbon Text', 'authow' ),
				),
			)
		);

		$this->add_control(
			'ribb_icon', array(
				'label'     => __( 'Custom Ribbon Icon', 'authow' ),
				'type'      => Controls_Manager::ICONS,
				'default'   => array(
					'value'   => 'fas fa-star',
					'library' => 'solid',
				),
				'condition' => array( 'add_ribb' => 'rib_icon' )
			)
		);

		$this->add_control(
			'ribb_text', array(
				'label'     => __( 'Custom Ribbon Text', 'authow' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => __( 'Best Value', 'authow' ),
				'condition' => array( 'add_ribb' => 'rib_text' )
			)
		);

		$this->add_control(
			'min_height', array(
				'label'     => __( 'Minimum height for pricing item', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1000, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-item' => 'min-height: {{SIZE}}px' ),
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_content',
			array(
				'label' => __( 'Pricing Table', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'_bg_color', array(
				'label'     => __( 'Background Color for Pricing Table', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-item' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'_pborder_color', array(
				'label'     => __( 'Border Color for Pricing Table', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-item' => 'border-color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'_featured_header_bg', array(
				'label'     => __( 'Featured Header Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-fheader .penci-pricing-header' => 'background-color: {{VALUE}};' ),
				'condition' => array( '_featured_header' => 'yes' ),
			)
		);

		$this->add_control(
			'icon_heading_settings',
			array(
				'label'     => __( 'Icon', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'condition' => array( '_use_icon' => 'yes' ),
			)
		);

		$this->add_control(
			'_icon_color', array(
				'label'     => __( 'Icon Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-icon' => 'color: {{VALUE}};' ),
				'condition' => array( '_use_icon' => 'yes' ),
			)
		);

		$this->add_responsive_control(
			'_icon_font_size', array(
				'label'     => __( 'Icon Font Size', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-icon' => 'font-size: {{SIZE}}px' ),
				'condition' => array( '_use_icon' => 'yes' ),
			)
		);

		$this->add_control(
			'title_heading_settings',
			array(
				'label' => __( 'Title', 'authow' ),
				'type'  => Controls_Manager::HEADING,
			)
		);

		$this->add_control(
			'_heading_color', array(
				'label'     => __( 'Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-title' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => '_heading_typo',
				'label'    => __( 'Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .penci-pricing-title',
			)
		);
		$this->add_responsive_control(
			'_heading_mar_bottom', array(
				'label'     => __( 'Margin Bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-title' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		// Sub title
		$this->add_control(
			'subtitle_heading_settings',
			array(
				'label' => __( 'Subtitle', 'authow' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'_subheading_color', array(
				'label'     => __( 'Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-subtitle' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => '_subheading_typo',
				'label'    => __( 'Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .penci-pricing-subtitle',
			)
		);
		$this->add_responsive_control(
			'_subheading_mar_bottom', array(
				'label'     => __( 'Margin Bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-subtitle' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		// Price title
		$this->add_control(
			'_price_heading_settings',
			array(
				'label' => __( 'Price', 'authow' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'_price_color', array(
				'label'     => __( 'Price Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-price' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => '_price_typo',
				'label'    => __( 'Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .penci-pricing-price',
			)
		);
		$this->add_responsive_control(
			'_price_mar_bottom', array(
				'label'     => __( 'Margin Bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200 ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-price' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		// Price Unit
		$this->add_control(
			'_unit_heading_settings',
			array(
				'label' => __( 'Price Unit', 'authow' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'_unit_color', array(
				'label'     => __( 'Price Unit Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-unit' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => '_unit_typo',
				'label'    => __( 'Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .penci-pricing-unit',
			)
		);
		$this->add_responsive_control(
			'_unit_mar_bottom', array(
				'label'     => __( 'Margin Bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-unit' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		// Features
		$this->add_control(
			'features_heading_settings',
			array(
				'label' => __( 'Features', 'authow' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'features_color', array(
				'label'     => __( 'Features Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-featured' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'features_typo',
				'label'    => __( 'Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .penci-pricing-featured',
			)
		);
		$this->add_responsive_control(
			'features_mar_bottom', array(
				'label'     => __( 'Margin Bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-featured' => 'margin-bottom: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'item_fea_bottom', array(
				'label'     => __( 'Item of list features margin bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1000, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-featured li, .penci-pricing-featured p' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		$this->add_control(
			'_ribbon_color', array(
				'label'     => __( 'Ribbon Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing_featured .penci-pricing-ribbon, {{WRAPPER}} .penci-pricing_featured .penci-pricing-ribbon-text' => 'background-color: {{VALUE}};' ),
				'condition' => array(
					'add_ribb' => array( 'rib_text', 'rib_icon' )
				)
			)
		);

		$this->add_control(
			'_ribbon_tcolor', array(
				'label'     => __( 'Ribbon Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing_featured .penci-pricing-ribbon, {{WRAPPER}} .penci-pricing_featured .penci-pricing-ribbon-text' => 'color: {{VALUE}};' ),
				'condition' => array(
					'add_ribb' => array( 'rib_text', 'rib_icon' )
				)
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'      => 'ribbon_typo',
				'label'     => __( 'Ribbon Text Typography', 'authow' ),
				'selector'  => '{{WRAPPER}} .penci-pricing_featured .penci-pricing-ribbon-text',
				'condition' => array(
					'add_ribb' => 'rib_text',
				)
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_button',
			array(
				'label' => __( 'Pricing Table Button', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'button_style', array(
				'label'   => __( 'Button Style', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'filled',
				'options' => array(
					'filled'   => esc_html__( 'Filled', 'authow' ),
					'bordered' => esc_html__( 'Bordered', 'authow' ),
				),
			)
		);

		$this->add_control(
			'psubmitbtn_color',
			array(
				'label'     => __( 'Button Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-pricing-btn' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'psubmitbtn_bgcolor',
			array(
				'label'     => __( 'Button Background & Border Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-pricing-btn' => 'background-color: {{VALUE}};border-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'psubmitbtn_hcolor',
			array(
				'label'     => __( 'Button Hover Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-pricing-btn:hover' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'psubmitbtn_hbgcolor',
			array(
				'label'     => __( 'Button Background & Border Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-pricing-btn:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'psubmitbtn_typo',
				'label'    => __( 'Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .penci-pricing-btn',
			)
		);

		$this->add_responsive_control(
			'button_radius', array(
				'label'      => __( 'Borders Radius', 'authow' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .penci-pricing-item .penci-pricing-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			)
		);

		$this->add_responsive_control(
			'button_borders_width', array(
				'label'      => __( 'Borders Width', 'authow' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .penci-pricing-item .penci-pricing-btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			)
		);

		$this->add_control(
			'btn_mar_top', array(
				'label'     => __( 'Button margin top', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1000, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-btn' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'btn_mar_bt', array(
				'label'     => __( 'Button margin bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1000, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-btn' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		$this->add_control(
			'btn_width', array(
				'label'     => __( 'Button width', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1000, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-btn' => 'width: {{SIZE}}px' ),
			)
		);

		$this->add_control(
			'btn_height', array(
				'label'     => __( 'Button Height', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1000, ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-pricing-btn' => 'line-height: {{SIZE}}px; padding-top: 0; padding-bottom: 0;',
				),
			)
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$class_block    = 'penci-block-vc penci-pricing-table penci-pricing-item';
		$class_block    .= $settings['_featured'] ? ' penci-pricing_featured' : '';
		$class_block    .= $settings['pricing_oneline'] ? ' penci-pricing-oneline' : '';
		$class_block    .= 'bordered' == $settings['button_style'] ? ' penci-pricing-btn-borders' : '';
		$class_block    .= $settings['_featured_style'] ? ' penci-pricing-f-' . $settings['_featured_style'] : ' penci-pricing-f-hheight';
		$class_block    .= $settings['_btn_pos'] ? ' penci-pricing-btn-' . $settings['_btn_pos'] : ' penci-pricing-btn-below';
		$class_block    .= 'yes' == $settings['_featured_header'] ? ' penci-pricing-fheader' : '';
		$class_block    .= $settings['_design_style'] ? ' penci-pricing-' . esc_attr( $settings['_design_style'] ) : '';
		$_btn_pos       = isset( $settings['_btn_pos'] ) ? $settings['_btn_pos'] : 'below';
		$featured_style = isset( $settings['_featured_style'] ) ? $settings['_featured_style'] : 'hheight';
		$add_ribb       = isset( $settings['add_ribb'] ) ? $settings['add_ribb'] : '';
		$ribb_text      = isset( $settings['ribb_text'] ) ? $settings['ribb_text'] : 'Best Value';
		?>
        <div class="<?php echo esc_attr( $class_block ); ?>">
			<?php
			if ( 'rib_icon' == $add_ribb ) {
				if ( ! empty( $settings['ribb_icon'] ) ) {
					echo '<span class="penci-pricing-ribbon">';
					\Elementor\Icons_Manager::render_icon( $settings['ribb_icon'] );
					echo '</span>';
				} else {
					echo '<span class="penci-pricing-ribbon">' . penci_icon_by_ver( 'fas fa-star' ) . '</span>';
				}
			}
			if ( 'rib_text' == $add_ribb ) {
				echo '<span class="penci-pricing-ribbon-text">' . do_shortcode( $ribb_text ) . '</span>';
			}
			?>
            <div class="penci-block_content penci-pricing-inner">
				<?php
				$button_html = '';
				if ( $settings['_btn_text'] ) {
					$a_before = '<a class="penci-pricing-btn penci-button">';
					$a_after  = '</a>';

					if ( ! empty( $settings['_btn_link']['url'] ) ) {
						$this->add_render_attribute( '_btn_link', 'href', $settings['_btn_link']['url'] );

						if ( $settings['_btn_link']['is_external'] ) {
							$this->add_render_attribute( '_btn_link', 'target', '_blank' );
						}

						if ( $settings['_btn_link']['nofollow'] ) {
							$this->add_render_attribute( '_btn_link', 'rel', 'nofollow' );
						}

						$a_before = '<a class="penci-pricing-btn penci-button" ' . $this->get_render_attribute_string( '_btn_link' ) . '>';
						$a_after  = '</a>';
					}

					$button_html = '<div class="penci-pricing-pbutton">' . $a_before . do_shortcode( $settings['_btn_text'] ) . $a_after . '</div>';
				}

				echo '<div class="penci-pricing-header">';
				if ( ! empty( $settings['_image']['url'] ) && $settings['_use_img'] ) {
					$this->add_render_attribute( 'image', 'src', $settings['_image']['url'] );
					$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['_image'] ) );
					$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['_image'] ) );

					echo '<div class="penci-pricing-image">';
					echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', '_image' );
					echo '</div>';
				}

				if ( ! empty( $settings['_icon'] ) && ( 'yes' == $settings['_use_icon'] ) ) {
					echo '<div class="penci-pricing-icon">';
					\Elementor\Icons_Manager::render_icon( $settings['_icon'] );
					echo '</div>';
				}

				if ( $settings['_heading'] ) {
					echo '<div class="penci-pricing-title">' . do_shortcode( $settings['_heading'] ) . '</div>';
				}

				if ( $settings['_subheading'] ) {
					echo '<div class="penci-pricing-subtitle">' . do_shortcode( $settings['_subheading'] ) . '</div>';
				}

				echo '</div>';

				if ( $settings['_price'] || $settings['_unit'] ) {
					echo '<div class="penci-price-unit">';

					if ( $settings['_price'] ) {
						echo '<span class="penci-pricing-price">' . do_shortcode( $settings['_price'] ) . '</span>';
					}

					if ( $settings['_unit'] ) {
						echo '<span class="penci-pricing-unit">' . do_shortcode( $settings['_unit'] ) . '</span>';
					}

					echo '</div>';
				}

				if ( 'above' == $_btn_pos ) {
					echo $button_html;
				}

				if ( $settings['content'] ) {
					$content = wpautop( preg_replace( '/<\/?p\>/', "\n", $settings['content'] ) . "\n" );
					$content = do_shortcode( shortcode_unautop( $content ) );


					echo '<div class="penci-pricing-featured">' . $content . '</div>';
				}

				if ( 'below' == $_btn_pos ) {
					echo $button_html;
				}
				?>
            </div>
        </div>
		<?php
	}
}
