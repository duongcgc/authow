<?php

namespace GosoAuthowElementor\Modules\GosoTeamMember\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use GosoAuthowElementor\Base\Base_Widget;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoTeamMember extends Base_Widget {

	public function get_name() {
		return 'goso-team-member';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Team Members', 'authow' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'team memeber' );
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

	protected function register_controls() {
		

		$this->start_controls_section(
			'section_temmembers', array(
				'label' => esc_html__( 'Team memebers', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'image',
			array(
				'label'   => __( 'Choose Image', 'authow' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array( 'url' => Utils::get_placeholder_image_src() ),
			)
		);
		$repeater->add_control(
			'name', array(
				'label' => __( 'Name', 'authow' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'position', array(
				'label' => __( 'Position', 'authow' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'desc', array(
				'label' => __( 'Description', 'authow' ),
				'type'  => Controls_Manager::TEXTAREA,
			)
		);
		$repeater->add_control(
			'link_website', array(
				'label' => __( 'Website URL', 'authow' ),
				'type'  => Controls_Manager::TEXT,
				'placeholder' => 'https://your-link.com/',
			)
		);
		$repeater->add_control(
			'link_facebook', array(
				'label' => __( 'Facebook URL', 'authow' ),
				'type'  => Controls_Manager::TEXT,
				'placeholder' => 'https://your-link.com/',
			)
		);
		$repeater->add_control(
			'link_twitter', array(
				'label' => __( 'Twitter URL', 'authow' ),
				'type'  => Controls_Manager::TEXT,
				'placeholder' => 'https://your-link.com/',
			)
		);
		$repeater->add_control(
			'link_linkedin', array(
				'label' => __( 'Linkedin URL', 'authow' ),
				'type'  => Controls_Manager::TEXT,
				'placeholder' => 'https://your-link.com/',
			)
		);
		$repeater->add_control(
			'link_instagram', array(
				'label' => __( 'Instagram URL', 'authow' ),
				'type'  => Controls_Manager::TEXT,
				'placeholder' => 'https://your-link.com/',
			)
		);
		$repeater->add_control(
			'link_youtube', array(
				'label' => __( 'Youtube URL', 'authow' ),
				'type'  => Controls_Manager::TEXT,
				'placeholder' => 'https://your-link.com/',
			)
		);
		$repeater->add_control(
			'link_vimeo', array(
				'label' => __( 'Vimeo URL', 'authow' ),
				'type'  => Controls_Manager::TEXT,
				'placeholder' => 'https://your-link.com/',
			)
		);
		$repeater->add_control(
			'link_pinterest', array(
				'label' => __( 'Pinterest URL', 'authow' ),
				'type'  => Controls_Manager::TEXT,
				'placeholder' => 'https://your-link.com/',
			)
		);
		$repeater->add_control(
			'link_dribbble', array(
				'label' => __( 'Dribbble URL', 'authow' ),
				'type'  => Controls_Manager::TEXT,
				'placeholder' => 'https://your-link.com/',
			)
		);

		$this->add_control(
			'teammembers', array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'name'          => __( 'Team member #1', 'authow' ),
						'desc'          => 'I am text block. Click edit button to change this text.',
						'link'          => __( 'https://your-link.com', 'authow' ),
						'image'         => array( 'url' => Utils::get_placeholder_image_src() ),
						'link_website'  => '#',
						'link_facebook' => '#',
						'link_twitter'  => '#',
					),
					array(
						'name'          => __( 'Team member #1', 'authow' ),
						'desc'          => 'I am text block. Click edit button to change this text.',
						'link'          => __( 'https://your-link.com', 'authow' ),
						'image'         => array( 'url' => Utils::get_placeholder_image_src() ),
						'link_website'  => '#',
						'link_facebook' => '#',
						'link_twitter'  => '#',
					),
					array(
						'name'          => __( 'Team member #1', 'authow' ),
						'desc'          => 'I am text block. Click edit button to change this text.',
						'link'          => __( 'https://your-link.com', 'authow' ),
						'image'         => array( 'url' => Utils::get_placeholder_image_src() ),
						'link_website'  => '#',
						'link_facebook' => '#',
						'link_twitter'  => '#',
					)
				),
				'title_field' => '{{{ name }}}',
			)
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_layout', array(
				'label' => esc_html__( 'Layout', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'style', array(
				'label'   => __( 'Choose Style', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 's1',
				'options' => array(
					's1' => esc_html__( 'Bordered', 'authow' ),
					's2' => esc_html__( 'Background', 'authow' ),
					's3' => esc_html__( 'Extended', 'authow' ),
					's4' => esc_html__( 'Overlay Slide Up', 'authow' ),
					's5' => esc_html__( 'Overlay', 'authow' ),
				)
			)
		);
		$this->add_responsive_control(
			'columns', array(
				'label'          => __( 'Columns', 'authow' ),
				'type'           => Controls_Manager::SELECT,
				'default'        => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options'        => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				)
			)
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			array(
				'name'      => 'goso_img',
				'default'   => 'goso-masonry-thumb',
				'separator' => 'none',
			)
		);
		
		$this->add_responsive_control(
			'imageratio', array(
				'label'     => __( 'Custom Image Ratio Height/Width (%)', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
				'selectors' => array( 
					'{{WRAPPER}} .goso-teammb-bsc .goso-teammb-img:before' => 'padding-top: {{SIZE}}%;',
					'{{WRAPPER}} .goso-teammb-bsc .goso-teammb-img:before' => 'height: auto;',
				),
			)
		);
		
		$this->add_responsive_control(
			'width_img', array(
				'label'     => __( 'Custom Image Width', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .goso-teammb-item .goso-teammb-img' => 'max-width: {{SIZE}}px;width: 100%; height: auto;' ),
			)
		);
		
		$this->add_responsive_control( 'imgradius', array(
			'label'      => __( 'Image Border Radius', 'authow' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .goso-teammb-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
			'condition' => array( 'style' => array( 's1', 's2', 's3' ) ),
		) );
		
		$this->add_control(
			'titpos', array(
				'label'          => __( 'Title Position', 'authow' ),
				'type'           => Controls_Manager::SELECT,
				'default'        => 'default',
				'options'        => array(
					'default' => 'Default',
					'above' => 'Above Position Text',
					'below' => 'Below Position Text',
				)
			)
		);
		
		$this->add_control(
			'social_shape', array(
				'label'          => __( 'Social Icons Shape', 'authow' ),
				'type'           => Controls_Manager::SELECT,
				'default'        => 'default',
				'options'        => array(
					'default' => 'Default',
					'circle' => 'Circle',
					'square' => 'Square',
					'round' => 'Round',
				)
			)
		);
		
		$this->add_control(
			'social_style', array(
				'label'          => __( 'Social Icons Style', 'authow' ),
				'type'           => Controls_Manager::SELECT,
				'default'        => 'default',
				'options'        => array(
					'default' => 'Default',
					'filled' => 'Filled',
					'bordered' => 'Bordered',
				)
			)
		);
		
		$this->add_control(
			'social_colors', array(
				'label'          => __( 'Social Icons Colors Style', 'authow' ),
				'type'           => Controls_Manager::SELECT,
				'default'        => 'default',
				'options'        => array(
					'default' => 'Custom Colors',
					'brandbg' => 'Brands Color',
					'brandtext' => 'Brands Text Color',
				)
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_spacing', array(
				'label' => esc_html__( 'Elements Spacing', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		
		$this->add_responsive_control(
			'row_gap', array(
				'label'     => __( 'Member Items Rows Gap', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}}  .gososc-grid' => 'grid-row-gap: {{SIZE}}px' ),
			)
		);
		
		$this->add_responsive_control(
			'col_gap', array(
				'label'     => __( 'Member Items Columns Gap', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}}  .gososc-grid' => 'grid-column-gap: {{SIZE}}px' ),
			)
		);
		
		$this->add_control(
			'team_image_martop', array(
				'label'     => __( 'Image Bottom Spacing', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array(
					'{{WRAPPER}} .goso-teammb-s2 .goso-teammb-img'       => 'margin-bottom: {{SIZE}}px',
					'{{WRAPPER}} .goso-teammb-s1 .goso-teammb-img'       => 'margin-bottom: {{SIZE}}px',
				),
				'condition' => array( 'style' => array( 's1', 's2' ) ),
			)
		);
		
		$this->add_control(
			'team_name_martop', array(
				'label'     => __( 'Name Top Spacing', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array(
					'{{WRAPPER}} .goso-teammb-bsc .goso-team_member_name' => 'margin-top: {{SIZE}}px',
				),
			)
		);
		
		$this->add_control(
			'team_pos_martop', array(
				'label'     => __( 'Position Text Top Spacing', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .goso-team_member_pos, {{WRAPPER}} .goso-team_member_name + .goso-team_member_pos' => 'margin-top: {{SIZE}}px' ),
			)
		);
		
		$this->add_control(
			'team_desc_martop', array(
				'label'     => __( 'Description Top Spacing', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .goso-team_member_desc' => 'margin-top: {{SIZE}}px' ),
			)
		);
		
		$this->add_responsive_control(
			'social_space', array(
				'label'     => __( 'Spacing Between Icons', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}} .goso-team_member_socails .goso-social-item' => 'margin-left: calc( {{SIZE}}px / 2 );margin-right: calc( {{SIZE}}px / 2 );' ),
			)
		);
		
		$this->add_control(
			'team_social_martop', array(
				'label'     => __( 'Social Icons Top Spacing', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .goso-team_member_socails' => 'margin-top: {{SIZE}}px' ),
			)
		);
		
		$this->end_controls_section();

		$this->register_block_title_section_controls();

		$this->start_controls_section(
			'section_style_content',
			array(
				'label' => __( 'Team Members', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'heading_all',
			array(
				'label' => __( 'Team Members', 'authow' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		
		$this->add_responsive_control( 'team_padding', array(
			'label'      => __( 'Content Padding', 'authow' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .goso-teammb-s1 .goso-teammb-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .goso-teammb-s2 .goso-teammb-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .goso-teammb-s3 .goso-team_item__info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
			'condition' => array( 'style' => array( 's1', 's2', 's3' ) ),
		) );
		
		$this->add_control(
			'team_bghcolor',
			array(
				'label'     => __( 'Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-teammb-inner' => 'background-color: {{VALUE}};' ),
			)
		);
		
		$this->add_control(
			'team_borderhcolor',
			array(
				'label'     => __( 'Borders Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-teammb-inner' => 'border:1px solid {{VALUE}};' ),
			)
		);
		
		$this->add_responsive_control( 'team_bdw', array(
			'label'      => __( 'Borders Width', 'authow' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .goso-teammb-s1 .goso-teammb-inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .goso-teammb-s2 .goso-teammb-inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
			'condition' => array( 'style' => array( 's1', 's2' ) ),
		) );

		$this->add_control(
			'heading_team_name',
			array(
				'label' => __( 'Name', 'authow' ),
				'type'  => Controls_Manager::HEADING,
			)
		);

		$this->add_control(
			'team_name_color',
			array(
				'label'     => __( 'Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-team_member_name' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'team_name_typo',
				'selector' => '{{WRAPPER}} .goso-team_member_name',
			)
		);
		
		$this->add_control(
			'heading_team_pos',
			array(
				'label'     => __( 'Position', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'team_pos_color',
			array(
				'label'     => __( 'Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-team_member_pos' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'team_pos_typo',
				'selector' => '{{WRAPPER}} .goso-team_member_pos',
			)
		);

		$this->add_control(
			'heading_team_desc',
			array(
				'label'     => __( 'Description', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		
		$this->add_control(
			'team_desc_hcolor',
			array(
				'label'     => __( 'Description Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-team_member_desc' => 'color: {{VALUE}};' ),
			)
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'team_desc_typo',
				'selector' => '{{WRAPPER}} .goso-team_member_desc',
			)
		);

		$this->add_control(
			'heading_team_social',
			array(
				'label'     => __( 'Social Icons', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'team_social_color',
			array(
				'label'     => __( 'Social Icons Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-social-wrap .goso-social-item, {{WRAPPER}} .goso-social-wrap .goso-social-item i' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'team_social_hcolor',
			array(
				'label'     => __( 'Social Icons Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-social-wrap .goso-social-item:hover, {{WRAPPER}} .goso-social-wrap .goso-social-item:hover i' => 'color: {{VALUE}};' ),
			)
		);
		
		$this->add_control(
			'social_bgcolor',
			array(
				'label'     => __( 'Social Icons Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-social-wrap .goso-social-item i' => 'background-color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'social_bghcolor',
			array(
				'label'     => __( 'Social Icons Hover Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-social-wrap .goso-social-item:hover i' => 'background-color: {{VALUE}};' ),
			)
		);
		
		$this->add_control(
			'social_bdcolor',
			array(
				'label'     => __( 'Social Icons Borders Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-social-wrap .goso-social-item i' => 'border-color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'social_bdhcolor',
			array(
				'label'     => __( 'Social Icons Hover Borders Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-social-wrap .goso-social-item:hover i' => 'border-color: {{VALUE}};' ),
			)
		);
		
		$this->add_responsive_control(
			'social_size', array(
				'label'     => __( 'Icons Size', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( 
					'{{WRAPPER}} .goso-social-wrap .goso-social-item i' => 'font-size: {{SIZE}}px;'
				),
			)
		);
		
		$this->add_responsive_control(
			'social_width', array(
				'label'     => __( 'Social Icons Width/Height', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( 
					'{{WRAPPER}} .goso-teammb-bsc' => '--pcteammb-w: {{SIZE}}px;'
				),
			)
		);
		
		$this->add_responsive_control(
			'social_bdw', array(
				'label'     => __( 'Social Icons Borders Width', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( 
					'{{WRAPPER}} .pcteam-shape .goso-social-item i' => 'border-width: {{SIZE}}px;'
				),
			)
		);

		$this->end_controls_section();

		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		if ( ! $settings['teammembers'] ) {
			return;
		}
		$social_colorcss = '';
		$team_members = (array) $settings['teammembers'];
		$style   = isset( $settings['style'] ) ? $settings['style'] : 's1';
		$image_size   = isset( $settings['goso_img_size'] ) ? $settings['goso_img_size'] : 'goso-masonry-thumb';
		$social_shape   = isset( $settings['social_shape'] ) ? $settings['social_shape'] : 'default';
		$social_style   = isset( $settings['social_style'] ) ? $settings['social_style'] : 'default';
		$social_colors   = isset( $settings['social_colors'] ) ? $settings['social_colors'] : 'default';
		if( 'default' != $social_shape && 'default' == $social_style ){
			$social_style = 'filled';
		}
		$titpos   = isset( $settings['titpos'] ) ? $settings['titpos'] : 'default';
		if( 'brandbg' == $social_colors ){
			$social_colorcss = ' goso-social-colored';
		} else if ( 'brandtext' == $social_colors ){
			$social_colorcss = ' goso-social-textcolored';
		}
		
		$css_class     = 'goso-block-vc goso-teammb-bsc';
		if( 's5' == $style ){
			$css_class     .= ' goso-teammb-s4';
		}
		$css_class     .= ' goso-teammb-' . $style;
		$css_class     .= ' gososc-grid-' . $settings['columns'];
		$column_tablet = isset( $settings['columns_tablet'] ) ? $settings['columns_tablet'] : '2';
		$column_mobile = isset( $settings['columns_mobile'] ) ? $settings['columns_mobile'] : '1';
		$css_class     .= ' gososc-grid-tablet-' . $column_tablet;
		$css_class     .= ' gososc-grid-mobile-' . $column_mobile;
		if( 'default' != $social_shape || 'default' != $social_style ){
			$css_class     .= ' pcteam-shape';
		}
		$css_class     .= ' pcsc-shape-' . $social_shape;
		$css_class     .= ' pcsc-st-' . $social_style;
		$title_pos = 'below';
		if( 's1' == $style ){
			$title_pos = 'above';
		}
		if( 'above' == $titpos || 'below' == $titpos ){
			$title_pos = $titpos;
		}
		?>
        <div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
            <div class="goso-block_content gososc-grid">
				<?php
				$link_target = 'target="_blank"';

				if ( ! get_theme_mod( 'goso_dis_noopener' ) ) {
					$link_target .= ' rel="noopener"';
				}
				foreach ( (array) $team_members as $item ) {

					$name_item     = isset( $item['name'] ) ? $item['name'] : '';
					$desc_item     = isset( $item['desc'] ) ? $item['desc'] : '';
					$position_item = isset( $item['position'] ) ? $item['position'] : '';

					$link_website_item   = isset( $item['link_website'] ) ? $item['link_website'] : '';
					$link_facebook_item  = isset( $item['link_facebook'] ) ? $item['link_facebook'] : '';
					$link_twitter_item   = isset( $item['link_twitter'] ) ? $item['link_twitter'] : '';
					$link_linkedin_item  = isset( $item['link_linkedin'] ) ? $item['link_linkedin'] : '';
					$link_instagram_item = isset( $item['link_instagram'] ) ? $item['link_instagram'] : '';
					$link_dribbble_item  = isset( $item['link_dribbble'] ) ? $item['link_dribbble'] : '';

					$link_youtube_item   = isset( $item['link_youtube'] ) ? $item['link_youtube'] : '';
					$link_vimeo_item     = isset( $item['link_vimeo'] ) ? $item['link_vimeo'] : '';
					$link_pinterest_item = isset( $item['link_pinterest'] ) ? $item['link_pinterest'] : '';
					$image_id            = isset( $item['image']['id'] ) ? $item['image']['id'] : '';
					$url_img_item        = Utils::get_placeholder_image_src();
					if ( $image_id ) {
						$url_img_item_array = wp_get_attachment_image_src( $image_id, $image_size );
						if ( isset( $url_img_item_array[0] ) && $url_img_item_array[0] ) {
							$url_img_item = $url_img_item_array[0];
						} else {
							$url_img_item = $item['image']['url'];
						}
					}
					?>
                    <div class="goso-teammb-item gososc-grid-item">
                        <div class="goso-teammb-inner">
							<?php
							if ( $url_img_item ) {
								$dis_lazy = get_theme_mod( 'goso_disable_lazyload_layout' );
								if ( $dis_lazy ) {
									echo '<span class="goso-image-holder goso-teammb-img goso-disable-lazy" style="background-image: url(' . esc_url( $url_img_item ) . ');"></span>';
								} else {
									echo '<span class="goso-image-holder goso-teammb-img goso-lazy" data-bgset="' . esc_url( $url_img_item ) . '"></span>';
								}
							}
							?>
                            <div class="goso-team_item__info">
								<?php if ( $position_item && ( 'below' == $title_pos ) ): ?>
                                    <div class="goso-team_member_pos"><?php echo $position_item; ?></div>
								<?php endif; ?>
								<?php if ( $name_item ): ?>
                                    <h5 class="goso-team_member_name"><?php echo $name_item; ?></h5>
								<?php endif; ?>
								<?php if ( $position_item && ( 'above' == $title_pos ) ): ?>
                                    <div class="goso-team_member_pos"><?php echo $position_item; ?></div>
								<?php endif; ?>
								<?php if ( $desc_item ): ?>
                                    <div class="goso-team_member_desc"><?php echo $desc_item; ?></div>
								<?php endif; ?>
                                <div class="goso-team_member_socails goso-social-wrap<?php echo $social_colorcss; ?>">
									<?php if ( $link_website_item ): ?>
                                        <a <?php echo $link_target ?>class="goso-social-item goso-social-item website"
                                                                     href="<?php echo esc_url( $link_website_item ); ?>"><?php goso_fawesome_icon( 'fas fa-globe' ); ?></a>
									<?php endif; ?>
									<?php if ( $link_facebook_item ): ?>
                                        <a <?php echo $link_target ?>
                                                class="goso-social-item goso-social-item facebook-f"
                                                href="<?php echo esc_url( $link_facebook_item ); ?>"><?php goso_fawesome_icon( 'fab fa-facebook-f' ); ?></a>
									<?php endif; ?>
									<?php if ( $link_twitter_item ): ?>
                                        <a <?php echo $link_target ?>class="goso-social-item goso-social-item twitter"
                                                                     href="<?php echo esc_url( $link_twitter_item ); ?>"><?php goso_fawesome_icon( 'fab fa-twitter' ); ?></a>
									<?php endif; ?>

									<?php if ( $link_linkedin_item ): ?>
                                        <a <?php echo $link_target ?>
                                                class="goso-social-item goso-social-item linkedin"
                                                href="<?php echo esc_url( $link_linkedin_item ); ?>"><?php goso_fawesome_icon( 'fab fa-linkedin-in' ); ?></a>
									<?php endif; ?>
									<?php if ( $link_instagram_item ): ?>
                                        <a <?php echo $link_target ?>
                                                class="goso-social-item goso-social-item instagram"
                                                href="<?php echo esc_url( $link_instagram_item ); ?>"><?php goso_fawesome_icon( 'fab fa-instagram' ); ?></a>
									<?php endif; ?>
									<?php if ( $link_youtube_item ): ?>
                                        <a <?php echo $link_target ?>class="goso-social-item goso-social-item youtube"
                                                                     href="<?php echo esc_url( $link_youtube_item ); ?>"><?php goso_fawesome_icon( 'fab fa-youtube' ); ?></a>
									<?php endif; ?>
									<?php if ( $link_vimeo_item ): ?>
                                        <a <?php echo $link_target ?> class="goso-social-item goso-social-item vimeo"
                                                                      href="<?php echo esc_url( $link_vimeo_item ); ?>"><?php goso_fawesome_icon( 'fab fa-vimeo-v' ); ?></a>
									<?php endif; ?>
									<?php if ( $link_pinterest_item ): ?>
                                        <a <?php echo $link_target ?>
                                                class="goso-social-item goso-social-item pinterest"
                                                href="<?php echo esc_url( $link_pinterest_item ); ?>"><?php goso_fawesome_icon( 'fab fa-pinterest' ); ?></a>
									<?php endif; ?>
									<?php if ( $link_dribbble_item ): ?>
                                        <a <?php echo $link_target ?>
                                                class="goso-social-item goso-social-item dribbble"
                                                href="<?php echo esc_url( $link_dribbble_item ); ?>"><?php goso_fawesome_icon( 'fab fa-dribbble' ); ?></a>
									<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
				}
				?>
            </div>
        </div>
		<?php
	}
}
