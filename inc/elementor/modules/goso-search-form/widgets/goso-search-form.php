<?php

namespace GosoAuthowElementor\Modules\GosoSearchForm\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use GosoAuthowElementor\Base\Base_Color;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoSearchForm extends Base_Widget {

	public function get_name() {
		return 'goso-search-form';
	}

	public function get_title() {
		return goso_get_theme_name( 'Goso' ) . ' ' . esc_html__( ' Search Box', 'authow' );
	}

	public function get_icon() {
		return 'eicon-search';
	}

	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'category' );
	}

	protected function register_controls() {


		// Section layout
		$this->start_controls_section( 'section_style', array(
			'label' => esc_html__( 'General', 'authow' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		) );

		$this->add_control( 'style', array(
			'label'   => __( 'Search Box Style', 'authow' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'default',
			'options' => [
				'default'     => 'Default',
				'text-button' => 'Text Button',
				'icon-button' => 'Icon Button',
			],
		) );

		$this->add_responsive_control( 'mwidth', array(
			'label'     => __( 'Max Width ( px )', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 2000 ) ),
			'selectors' => array( '{{WRAPPER}} .pc-widget-searchform' => 'max-width: {{SIZE}}px;width:100%' ),
		) );

		$this->add_control( 'text_align', array(
			'label'                => __( 'Alignment', 'authow' ),
			'type'                 => Controls_Manager::CHOOSE,
			'options'              => array(
				'left'   => array(
					'title' => __( 'Left', 'elementor' ),
					'icon'  => 'eicon-text-align-left',
				),
				'center' => array(
					'title' => __( 'Center', 'elementor' ),
					'icon'  => 'eicon-text-align-center',
				),
				'right'  => array(
					'title' => __( 'Right', 'elementor' ),
					'icon'  => 'eicon-text-align-right',
				)
			),
			'selectors_dictionary' => array(
				'left'   => 'margin-right: auto',
				'center' => 'margin-left: auto; margin-right: auto;',
				'right'  => 'margin-left: auto',
			),
			'selectors'            => array(
				'{{WRAPPER}} .pc-widget-searchform' => '{{VALUE}}',
			),
		) );

		$this->end_controls_section();

		$this->register_block_title_section_controls();

		$this->start_controls_section( 'section_style_image', array(
			'label' => __( 'Color & Style', 'authow' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		) );

		$this->add_control( 'bg_color', array(
			'label'     => __( 'Background Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .pc-widget-searchform form.pc-searchform input.search-input' => 'background-color: {{VALUE}};' ),
		) );

		$this->add_control( 'bd_color', array(
			'label'     => __( 'Border Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .pc-widget-searchform form.pc-searchform input.search-input' => 'border-color: {{VALUE}};' ),
		) );

		$this->add_control( 'txt_color', array(
			'label'     => __( 'Text Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array(
				'{{WRAPPER}} form.pc-searchform input.search-input'                            => 'color: {{VALUE}};',
				'{{WRAPPER}} form.pc-searchform input.search-input::-webkit-input-placeholder' => 'color: {{VALUE}};',
				'{{WRAPPER}} form.pc-searchform input.search-input:-ms-input-placeholder '     => 'color: {{VALUE}};',
				'{{WRAPPER}} form.pc-searchform input.search-input::placeholder'               => 'color: {{VALUE}};',
			),
		) );

		$this->add_control( 'btn_color', array(
			'label'     => __( 'Button Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .pc-widget-searchform.search-style-default i,{{WRAPPER}} .pc-widget-searchform.search-style-icon-button .searchsubmit, {{WRAPPER}} .pc-widget-searchform.pc-search-form.search-style-text-button .searchsubmit' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'btn_hcolor', array(
			'label'     => __( 'Button Hover Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .pc-widget-searchform.search-style-icon-button .searchsubmit:hover, {{WRAPPER}} .pc-widget-searchform.pc-search-form.search-style-text-button .searchsubmit:hover' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'btn_bgcolor', array(
			'label'     => __( 'Button Background Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .pc-widget-searchform.search-style-icon-button .searchsubmit, {{WRAPPER}} .pc-widget-searchform.pc-search-form.search-style-text-button .searchsubmit' => 'background-color: {{VALUE}};' ),
		) );

		$this->add_control( 'btn_bghcolor', array(
			'label'     => __( 'Button Background Hover Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .pc-widget-searchform.search-style-icon-button .searchsubmit:hover, {{WRAPPER}} .pc-widget-searchform.pc-search-form.search-style-text-button .searchsubmit:hover' => 'background-color: {{VALUE}};' ),
		) );

		$this->add_responsive_control( 'input_padding', array(
			'label'              => __( 'Input Padding', 'authow' ),
			'type'               => Controls_Manager::DIMENSIONS,
			'allowed_dimensions' => 'horizontal',
			'placeholder'        => [
				'top'      => 'auto',
				'right'    => '',
				'bottom'   => 'auto',
				'left'     => '',
				'isLinked' => false,
			],
			'selectors'          => array(
				'{{WRAPPER}} form.pc-searchform input.search-input'               => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				'{{WRAPPER}} .search-style-default form.pc-searchform i'          => 'right: {{RIGHT}}{{UNIT}};',
				'body.rtl {{WRAPPER}} .search-style-default form.pc-searchform i' => 'right:auto;left: {{LEFT}}{{UNIT}};',
			),
		) );

		$this->add_responsive_control( 'btn_padding', array(
			'label'              => __( 'Button Padding', 'authow' ),
			'type'               => Controls_Manager::DIMENSIONS,
			'condition'          => [ 'style!' => [ 'default' ] ],
			'allowed_dimensions' => 'horizontal',
			'placeholder'        => [
				'top'      => 'auto',
				'right'    => '',
				'bottom'   => 'auto',
				'left'     => '',
				'isLinked' => false,
			],
			'selectors'          => array( '{{WRAPPER}} .pc-widget-searchform.search-style-icon-button .searchsubmit, {{WRAPPER}} .pc-widget-searchform.pc-search-form.search-style-text-button .searchsubmit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ),
		) );

		$this->add_responsive_control( 'form_height', array(
			'label'      => __( 'Search Form Height', 'authow' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => [ 'px' ],
			'range'      => array(
				'px' => array( 'max' => 500 ),
			),
			'selectors'  => array( '{{WRAPPER}} .pc-widget-searchform form.pc-searchform input.search-input, {{WRAPPER}} .pc-widget-searchform.search-style-icon-button .searchsubmit:before, {{WRAPPER}} .pc-widget-searchform.search-style-text-button .searchsubmit' => 'line-height: {{SIZE}}px;' ),
		) );

		$this->add_group_control( Group_Control_Typography::get_type(), array(
			'name'     => 'input_text_typo',
			'label'    => __( 'Input Text Typography', 'authow' ),
			'selector' => '{{WRAPPER}} .pc-widget-searchform form.pc-searchform input.search-input',
		) );

		$this->add_group_control( Group_Control_Typography::get_type(), array(
			'name'      => 'btn_text_typo',
			'label'     => __( 'Button Text Typography', 'authow' ),
			'selector'  => '{{WRAPPER}} .pc-widget-searchform.search-style-text-button .searchsubmit',
			'condition' => [ 'style' => 'text-button' ],
		) );

		$this->add_control( 'icon_btn_size', array(
			'label'      => __( 'Icon Size', 'authow' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => [ 'px' ],
			'range'      => array(
				'px' => array( 'max' => 500 ),
			),
			'condition'  => [ 'style!' => 'text-button' ],
			'selectors'  => array( '{{WRAPPER}} .pc-widget-searchform.search-style-default i, {{WRAPPER}} .pc-widget-searchform.search-style-icon-button .searchsubmit:before' => 'font-size: {{SIZE}}px;' ),
		) );

		$this->end_controls_section();
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();
		$style    = isset( $settings['style'] ) && $settings['style'] ? $settings['style'] : 'default';
		$this->markup_block_title( $settings, $this );
		?>
        <div class="pcwg-widget el pc-widget-searchform goso-builder-element pc-search-form search-style-<?php echo $style; ?>">
            <form role="search" method="get" class="pc-searchform"
                  action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="pc-searchform-inner">
                    <input type="text" class="search-input"
                           placeholder="<?php echo goso_get_setting( 'goso_trans_type_and_hit' ); ?>" name="s"/>
                    <i class="gosoicon-magnifiying-glass"></i>
                    <button type="submit"
                            class="searchsubmit"><?php echo goso_get_setting( 'goso_trans_search' ); ?></button>
                </div>
            </form>
        </div>
		<?php
	}

}
