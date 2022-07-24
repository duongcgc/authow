<?php

namespace GosoAuthowElementor\Modules\GosoFancyHeading\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoFancyHeading extends Base_Widget {

	public function get_name() {
		return 'goso-fancy_heading';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Fancy Heading', 'authow' );
	}

	public function get_icon() {
		return 'eicon-t-letter';
	}
	
	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'fancy_heading', 'block', 'goso', 'heading', 'authow' );
	}

	protected function register_controls() {
		

		$this->start_controls_section(
			'section_general', array(
				'label' => esc_html__( 'General', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'_text_align', array(
				'label'   => __( 'Text Align', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'center',
				'options' => array(
					'left'   => esc_html__( 'Left', 'authow' ),
					'center' => esc_html__( 'Center', 'authow' ),
					'right'  => esc_html__( 'Right', 'authow' ),
				),
			)
		);
		
		$this->add_responsive_control(
			'fancy_width', array(
				'label'     => __( 'Limit Width for Fancy Heading', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 2000, ) ),
				'selectors' => array( '{{WRAPPER}}  .goso-fancy-heading' => 'width: 100%; max-width: {{SIZE}}px;' ),
			)
		);
		
		$this->add_control( 'fancy_alignment', array(
			'label'                => __( 'Block Alignment', 'authow' ),
			'description'                => __( 'Applies changes when you set a limit width for Fancy Heading', 'authow' ),
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
			'default' => 'center',
			'selectors'            => array(
				'{{WRAPPER}} .goso-fancy-heading' => '{{VALUE}}',
			),
			'selectors_dictionary' => array(
				'left'   => 'margin-right: auto',
				'center' => 'margin-left: auto; margin-right: auto;',
				'right'  => 'margin-left: auto',
			),
		) );
		
		// Subtag
		$this->end_controls_section();

		$this->start_controls_section( 'section_fcsubtitle', array(
			'label' => esc_html__( 'Subtitle', 'authow' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		) );
		
		$this->add_control(
			'p_subtitle', array(
				'label'       => __( 'Subtitle Text', 'authow' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'This is the subtitle', 'authow' ),
				'placeholder' => __( 'Add Your Subtitle Text Here', 'authow' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'subtitle_tag', array(
				'label'   => __( 'Subtitle Tag', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				),
				'default' => 'div',
			)
		);
		$this->add_control(
			'subtitle_pos', array(
				'label'   => __( 'Subtitle Position', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'above'     => __( 'Above the title', 'authow' ),
					'below'     => __( 'Below the title', 'authow' ),
					'belowline' => __( 'Below the separator', 'authow' ),
				),
				'default' => 'above',
			)
		);
		
		$this->add_control(
			'subtitle_margin_top', array(
				'label'     => __( 'Subtitle Spacing Top', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}}  .goso-heading-subtitle' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'subtitle_margin_bottom', array(
				'label'     => __( 'Subtitle Spacing Bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}}  .goso-heading-subtitle' => 'margin-bottom: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'subtitle_width', array(
				'label'     => __( 'Limit Width for Subtitle', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 2000, ) ),
				'selectors' => array( '{{WRAPPER}}  .goso-heading-subtitle' => 'width: 100%; max-width: {{SIZE}}px;' ),
			)
		);

		// Title
		$this->end_controls_section();

		$this->start_controls_section( 'section_fctitle', array(
			'label' => esc_html__( 'Title', 'authow' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		) );
		
		$this->add_control(
			'p_title', array(
				'label'       => __( 'Title Text', 'authow' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'This is the title', 'authow' ),
				'placeholder' => __( 'Add Your title Text Here', 'authow' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'title_tag', array(
				'label'   => __( 'Title Tag', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				),
				'default' => 'h2',
			)
		);
		$this->add_control(
			'title_link', array(
				'label'   => __( 'Add Link to Title?', 'authow' ),
				'type'    => Controls_Manager::URL,
				'dynamic' => array( 'active' => true ),
				'default' => array( 'url' => '' )
			)
		);
		
		$this->add_control(
			'add_line', array(
				'label'     => __( 'Add Lines on Left & Right of Title?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
				'separator' => 'before',
			)
		);
		
		$this->add_control(
			'lines_height', array(
				'label'     => __( 'Lines Height', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array(
					'{{WRAPPER}} .goso-fancy-heading.pc-fctline .inner-tit:before,{{WRAPPER}} .goso-fancy-heading.pc-fctline .inner-tit:after' => 'height: {{SIZE}}px; margin-top: calc( {{SIZE}}px * -1 / 2 );',
				),
				'condition' => array( 'add_line' => 'yes' ),
			)
		);
		
		$this->add_control(
			'lines_width', array(
				'label'     => __( 'Lines Width', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1000, ) ),
				'selectors' => array(
					'{{WRAPPER}} .goso-fancy-heading.pc-fctline .inner-tit:before,{{WRAPPER}} .goso-fancy-heading.pc-fctline .inner-tit:after' => 'width: {{SIZE}}px;',
				),
				'condition' => array( 'add_line' => 'yes' ),
			)
		);
		
		$this->add_control(
			'lines_spacing', array(
				'label'     => __( 'Spacing Between Lines & Title', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array(
					'{{WRAPPER}} .goso-fancy-heading.pc-fctline .inner-tit' => 'padding-left: {{SIZE}}px; padding-right: {{SIZE}}px;',
				),
				'condition' => array( 'add_line' => 'yes' ),
			)
		);
		
		$this->end_controls_section();
		
		// Line
		$this->start_controls_section( 'section_fcseparator', array(
			'label' => esc_html__( 'Separator', 'authow' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		) );
		
		$this->add_control(
			'_use_separator', array(
				'label'     => __( 'Use separator?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
			)
		);
		$this->add_control(
			'separator_style', array(
				'label'     => __( 'Border Style:', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					''       => 'Solid',
					'dashed' => 'Dashed',
					'dotted' => 'Dotted',
					'double' => 'Double',
				),
				'condition' => array( '_use_separator!' => '' ),
			)
		);
		$this->add_control(
			'add_separator_icon', array(
				'label'     => __( 'Add Separator Icon?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
				'condition' => array( '_use_separator!' => '' ),
			)
		);
		
		$this->add_control(
			'p_icon', array(
				'label'     => __( 'Icon', 'authow' ),
				'type'      => Controls_Manager::ICON,
				'label_block' => true,
				'default'   => 'fas fa-star',
				'condition' => array( 'add_separator_icon!' => '' ),
			)
		);

		$this->add_control(
			'separator_border_width', array(
				'label'     => __( 'Separator Height', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array(
					'{{WRAPPER}}  .goso-separator .goso-sep_line'               => 'border-width: {{SIZE}}px;top: calc( -{{SIZE}}px / 2 ); border-bottom: none; border-left: none; border-right: none;',
					'{{WRAPPER}}  .goso-separator.goso-separator-double:after'  => 'border-top-width: {{SIZE}}px;',
				),
				'condition' => array( '_use_separator!' => '' ),
			)
		);
		
		$this->add_control(
			'separator_width', array(
				'label'     => __( 'Separator Width', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => array( '{{WRAPPER}}  .goso-separator' => 'max-width: {{SIZE}}px' ),
				'condition' => array( '_use_separator!' => '' ),
			)
		);
		
		$this->add_control(
			'p_icon_martop', array(
				'label'     => __( 'Separator Icon Spacing Top & Bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}}  .goso-heading-icon' => 'margin-top: {{SIZE}}px;margin-bottom: {{SIZE}}px' ),
				'condition' => array( '_use_separator!' => '' ),
			)
		);
		
		$this->add_control(
			'p_icon_marlr', array(
				'label'     => __( 'Separator Icon Spacing Right & Left', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( 
					'{{WRAPPER}}  .goso-heading-icon' => 'margin-left: {{SIZE}}px;margin-right: {{SIZE}}px;',
				),
				'condition' => array( '_use_separator!' => '' ),
			)
		);
		
		$this->add_control(
			'separator_margin_top', array(
				'label'     => __( 'Separator Spacing Top', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}}  .goso-separator' => 'margin-top: {{SIZE}}px' ),
				'condition' => array( '_use_separator!' => '' ),
			)
		);
		
		$this->end_controls_section();
		
		// Description
		$this->start_controls_section( 'section_fcdesc', array(
			'label' => esc_html__( 'Descrition', 'authow' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		) );
		
		$this->add_control(
			'content', array(
				'label'   => __( 'Description', 'authow' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( '<p>I am text block. Click edit button to change this text.</p>', 'authow' ),
			)
		);
		$this->add_control(
			'content_margin_top', array(
				'label'     => __( 'Content Spacing Top', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}}  .goso-heading-content' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_responsive_control(
			'content_width', array(
				'label'     => __( 'Limit Content Width', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 2000, ) ),
				'selectors' => array( '{{WRAPPER}}  .goso-heading-content' => 'max-width: {{SIZE}}px;width:100%;' ),
			)
		);

		$this->end_controls_section();

		// Design
		$this->start_controls_section(
			'section_design_content',
			array(
				'label' => __( 'Fancy Heading', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		
		
		$this->add_responsive_control( 'fancy_padding', array(
			'label'      => __( 'Fancy Heading Padding', 'authow' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em' ),
			'selectors'  => array(
				'{{WRAPPER}} .goso-fancy-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		) );
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name' => 'fancy_shadow',
				'label' => __( 'Add Box Shadow?', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-fancy-heading',
			)
		);
		
		// Title
		$this->add_control(
			'ssubtitle_heading',
			array(
				'label'     => __( 'SubTitle', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		
		$this->add_control(
			'psubtitle_color',
			array(
				'label'     => __( 'SubTitle Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .goso-heading-subtitle' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'psubtitle_typo',
				'label'    => __( 'SubTitle Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-heading-subtitle',
			)
		);
		
		$this->add_control(
			'stitle_heading',
			array(
				'label'     => __( 'Title', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		
		$this->add_control(
			'ptitle_color',
			array(
				'label'     => __( 'Title Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .goso-heading-title,{{WRAPPER}} .goso-heading-title a' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'ptitle_hcolor',
			array(
				'label'     => __( 'Title Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .goso-heading-title a:hover' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'ptitle_typo',
				'label'    => __( 'Title Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-heading-title',
			)
		);
		
		$this->add_control(
			'lines_bgcolor',
			array(
				'label'     => __( 'Lines Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .goso-fancy-heading.pc-fctline .inner-tit:before,{{WRAPPER}} .goso-fancy-heading.pc-fctline .inner-tit:after' => 'background-color: {{VALUE}};' ),
				'condition' => array( 'add_line' => 'yes' ),
			)
		);
		
		$this->add_control(
			'sseparator_heading',
			array(
				'label'     => __( 'Separator', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		
		$this->add_control(
			'pseparator_color',
			array(
				'label'     => __( 'Separator Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .goso-separator .goso-sep_line' => 'border-color: {{VALUE}};' ),
				'condition' => array( '_use_separator!' => '' ),
			)
		);
		$this->add_control(
			'picon_color',
			array(
				'label'     => __( 'Icon Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .goso-heading-icon' => 'color: {{VALUE}};' ),
				'condition' => array( 'add_separator_icon!' => '' ),
			)
		);
		$this->add_responsive_control(
			'picon_size', array(
				'label'     => __( 'Font size for Icon', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .goso-heading-icon' => 'font-size: {{SIZE}}px' ),
				'condition' => array( 'add_separator_icon!' => '' ),
			)
		);
		
		// Content
		$this->add_control(
			'sdesc_heading',
			array(
				'label'     => __( 'Descrition', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		
		$this->add_control(
			'pdesc_color',
			array(
				'label'     => __( 'Descrition Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .goso-heading-content' => 'color: {{VALUE}};' ),
			)
		);
		
		$this->add_control(
			'pdesc_acolor',
			array(
				'label'     => __( 'Descrition Links Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .goso-heading-content a' => 'color: {{VALUE}};' ),
			)
		);
		
		$this->add_control(
			'pdesc_ahcolor',
			array(
				'label'     => __( 'Descrition Links Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .goso-heading-content a:hover' => 'color: {{VALUE}};' ),
			)
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pdesc_typo',
				'label'    => __( 'Descrition Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-heading-content',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$markup_subtitle = $title_line_class = '';
		$subtitle_pos    = $settings['subtitle_pos'];

		if ( $settings['p_subtitle'] ) {
			$markup_subtitle = '<' . esc_attr( $settings['subtitle_tag'] ) . ' class="goso-heading-subtitle">' . $settings['p_subtitle'] . '</' . esc_attr( $settings['subtitle_tag'] ) . '>';
		}
		if( isset( $settings['add_line'] ) && 'yes' == $settings['add_line'] ){
			$title_line_class = ' pc-fctline';
		}
		?>
		<div class="goso-fancy-heading goso-heading-text-<?php echo esc_attr( $settings['_text_align'] ) . $title_line_class ; ?>">
			<div class="goso-fancy-heading-inner">
				<?php

				if ( $markup_subtitle && 'above' == $subtitle_pos ) {
					echo $markup_subtitle;
				}
				if ( $settings['p_title'] ) {

					$title = $settings['p_title'];
					if ( ! empty( $settings['title_link']['url'] ) ) {
						$this->add_render_attribute( 'url', 'href', $settings['title_link']['url'] );

						if ( $settings['title_link']['is_external'] ) {
							$this->add_render_attribute( 'url', 'target', '_blank' );
						}

						if ( ! empty( $settings['title_link']['nofollow'] ) ) {
							$this->add_render_attribute( 'url', 'rel', 'nofollow' );
						}

						$title = sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'url' ), $settings['p_title'] );
					}

					echo '<' . esc_attr( $settings['title_tag'] ) . ' class="goso-heading-title"><span class="inner-tit">' . $title . '</span></' . esc_attr( $settings['title_tag'] ) . '>';
				}

				if ( $markup_subtitle && 'below' == $subtitle_pos ) {
					echo $markup_subtitle;
				}

				if ( $settings['_use_separator'] ) {
					echo '<div class="goso-separator goso-separator-' . esc_attr( $settings['separator_style'] ) . ' goso-separator-' . $settings['_text_align'] . '">';
					echo '<span class="goso-sep_holder goso-sep_holder_l"><span class="goso-sep_line"></span></span>';

					if ( $settings['add_separator_icon'] ) {
						echo '<span class="goso-heading-icon ' . esc_attr( $settings['p_icon'] ? $settings['p_icon'] : 'fa fa-adjust' ) . '"></span>';
					}

					echo '<span class="goso-sep_holder goso-sep_holder_r"><span class="goso-sep_line"></span></span>';
					echo '</div>';
				}

				if ( $markup_subtitle && 'belowline' == $subtitle_pos ) {
					echo $markup_subtitle;
				}

				if ( $settings['content'] ) {
					$content = wpautop( preg_replace( '/<\/?p\>/', "\n", $settings['content'] ) . "\n" );
					$content = do_shortcode( shortcode_unautop( $content ) );

					echo '<div class="goso-heading-content entry-content">' . $content . '</div>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
