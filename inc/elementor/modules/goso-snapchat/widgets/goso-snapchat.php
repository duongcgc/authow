<?php

namespace GosoAuthowElementor\Modules\GosoSnapchat\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use GosoAuthowElementor\Base\Base_Color;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoSnapchat extends Base_Widget {

	public function get_name() {
		return 'goso-snapchat';
	}

	public function get_title() {
		return goso_get_theme_name( 'Goso' ) . ' ' . esc_html__( ' Snapchat', 'authow' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'category' );
	}

	protected function register_controls() {


		// Section layout
		$this->start_controls_section( 'section_settings', array(
			'label' => esc_html__( 'General', 'authow' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		) );

		$this->add_control( 'username', array(
			'label' => __( 'Account Name:', 'authow' ),
			'type'  => Controls_Manager::TEXT,
		) );

		$this->add_control( 'userid', array(
			'label' => __( 'Account ID:', 'authow' ),
			'type'  => Controls_Manager::TEXT,
		) );

		$this->add_control( 'avatar', array(
			'label' => __( 'Avatar', 'authow' ),
			'type'  => Controls_Manager::MEDIA,
		) );

		$this->add_responsive_control( 'avatar_size', array(
			'label'      => __( 'Avatar Size', 'authow' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => array(
				'%'  => array( 'min' => 0, 'max' => 100 ),
				'px' => array( 'min' => 0, 'max' => 2000 )
			),
			'size_units' => array( '%', 'px' ),
			'selectors'  => array(
				'{{WRAPPER}} .goso_snapchat_widget .pc-snapchat-avatar' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};'
			)
		) );

		$this->add_control( 'style', array(
			'label'   => __( 'Style', 'authow' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'rounded',
			'options' => [
				'rounded' => 'Rounded',
				'circle'  => 'Circle',
			]
		) );

		$this->add_control( 'bgstyle', array(
			'label'   => __( 'Background Style', 'authow' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'flat',
			'options' => [
				'flat' => 'Flat',
				'dots' => 'Dots',
			]
		) );

		$this->add_responsive_control( 'badge_size', array(
			'label'      => __( 'Custom Badge Size', 'authow' ),
			'type'       => Controls_Manager::SLIDER,
			'range'      => array(
				'%'  => array( 'min' => 0, 'max' => 100 ),
				'px' => array( 'min' => 0, 'max' => 2000 )
			),
			'size_units' => array( '%', 'px' ),
			'selectors'  => array(
				'{{WRAPPER}} .goso_snapchat_widget .pc-snapchat-badge' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};'
			)
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
		) );

		$this->end_controls_section();

		$this->register_block_title_section_controls();

		$this->start_controls_section( 'section_style_image', array(
			'label' => __( 'Color & Style', 'authow' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		) );


		$this->add_group_control( Group_Control_Typography::get_type(), array(
			'name'     => 'author_name_typo',
			'label'    => __( 'Account Name Typography', 'authow' ),
			'selector' => '{{WRAPPER}} .pc-snapchat-wrapper .pc-snapchat-name',
		) );

		$this->add_control( 'name_color', array(
			'label'     => __( 'Account Name Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .pc-snapchat-wrapper .pc-snapchat-name' => 'color: {{VALUE}};' ),
		) );

		$this->add_group_control( Group_Control_Typography::get_type(), array(
			'name'     => 'author_id_typo',
			'label'    => __( 'Account ID Typography', 'authow' ),
			'selector' => '{{WRAPPER}} .pc-snapchat-wrapper .pc-snapchat-id',
		) );

		$this->add_control( 'id_color', array(
			'label'     => __( 'Account ID Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .pc-snapchat-wrapper .pc-snapchat-id' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'badge_bcolor', array(
			'label'     => __( 'Badge Border Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .goso_snapchat_widget .pc-snapchat-badge' => 'border-color: {{VALUE}};' ),
		) );

		$this->end_controls_section();
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$instance   = $this->get_settings();
		$ptext_align = isset( $instance['text_align'] ) ? $instance['text_align'] : 'center';
		if ( ! empty( $instance['username'] ) && ! empty( $instance['userid'] ) && ! empty( $instance['avatar'] ) ) {
			$img_class = ! empty( $instance['style'] ) ? 'is-' . $instance['style'] : 'is-rounded';
			$imgstyle  = ! empty( $instance['bgstyle'] ) ? $instance['bgstyle'] : 'flat';
			$userid    = str_replace( '@', '', $instance['userid'] );

			$bghtmlbg_src = 'data-bgset="' . get_template_directory_uri() . '/images/snapchat_' . $imgstyle . '.png"';
			$bghtml_src   = 'data-bgset="' . $instance['avatar']['url'] . '"';
			$this->markup_block_title( $instance, $this );
			?>
            <div class="goso_snapchat_widget <?php echo 'pcsnapal-' . $ptext_align; ?>">
                <div class="pc-snapchat-wrapper">
                    <a href="https://snapchat.com/add/<?php echo $userid ?>" rel="external noopener nofollow">
						<span class="pc-snapchat-badge <?php echo $img_class; ?>">
                            <span class="pc-snapchat-badge-over goso-image-holder goso-lazy" <?php echo $bghtmlbg_src; ?>></span>
                            <span class="pc-snapchat-avatar goso-image-holder goso-lazy" <?php echo $bghtml_src; ?>></span>
						</span>
                        <span class="pc-snapchat-name"><?php echo $instance['username'] ?></span>
                        <span class="pc-snapchat-id">@<?php echo $userid ?></span>
                    </a>
                </div>
            </div>
			<?php
		} else {
			echo __( 'Enter the required account info.', 'authow' );
		}

	}
}
