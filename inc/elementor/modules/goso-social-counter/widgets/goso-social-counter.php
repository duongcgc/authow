<?php

namespace GosoAuthowElementor\Modules\GosoSocialCounter\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use GosoAuthowElementor\Base\Base_Widget;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoSocialCounter extends Base_Widget {

	public function get_name() {
		return 'goso-social-counter';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Social Counter', 'authow' );
	}

	public function get_icon() {
		return 'eicon-share';
	}

	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'social counter' );
	}


	protected function register_controls() {
		

		$this->start_controls_section(
			'section_general', array(
				'label' => esc_html__( 'General', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'app_id', array(
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => '<span style="color: red;font-weight: bold;">Note</span>: You need to setup data for socials sharing via <strong>Dashboard > Authow > Social Counter</strong> to get the counter number work.',
				'content_classes' => 'elementor-descriptor',

			)
		);

		$this->add_control(
			'hide_count', array(
				'label'     => __( 'Hide Counter Data & Show Social Name?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
			)
		);

		$this->add_control(
			'social_style', array(
				'label'   => __( 'Select Pre-Build Design', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 's1',
				'options' => array(
					's1' => esc_html__( 'Style 1', 'authow' ),
					's2' => esc_html__( 'Style 2', 'authow' ),
					's3' => esc_html__( 'Style 3', 'authow' ),
					's4' => esc_html__( 'Style 4', 'authow' ),
				)
			)
		);

		$this->add_control(
			'fill', array(
				'label'   => __( 'Filled or Bordered Style?', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'border',
				'options' => array(
					'fill'   => esc_html__( 'Filled', 'authow' ),
					'border' => esc_html__( 'Bordered', 'authow' ),
				)
			)
		);

		$this->add_control(
			'shape', array(
				'label'   => __( 'Shape', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'rectangle',
				'options' => array(
					'rectangle' => esc_html__( 'Rectangle', 'authow' ),
					'round'     => esc_html__( 'Round', 'authow' ),
					'circle'    => esc_html__( 'Circle', 'authow' ),
				)
			)
		);

		$this->add_control(
			'column', array(
				'label'     => __( 'Select Columns', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => array(
					''  => esc_html__( 'Default', 'authow' ),
					'1' => esc_html__( '1 Column', 'authow' ),
					'2' => esc_html__( '2 Columns', 'authow' ),
					'3' => esc_html__( '3 Columns', 'authow' ),
					'4' => esc_html__( '4 Columns', 'authow' ),
				),
				'condition' => array( 'social_style!' => array( 's4' ) ),
			)
		);

		$this->add_control(
			'tab_column', array(
				'label'     => __( 'Select Columns for Tablet', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => array(
					''  => esc_html__( 'Default', 'authow' ),
					'1' => esc_html__( '1 Column', 'authow' ),
					'2' => esc_html__( '2 Columns', 'authow' ),
					'3' => esc_html__( '3 Columns', 'authow' ),
					'4' => esc_html__( '4 Columns', 'authow' ),
				),
				'condition' => array( 'social_style!' => array( 's4' ) ),
			)
		);

		$this->add_control(
			'mobile_column', array(
				'label'     => __( 'Select Columns for Mobile', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => array(
					''  => esc_html__( 'Default', 'authow' ),
					'1' => esc_html__( '1 Column', 'authow' ),
					'2' => esc_html__( '2 Columns', 'authow' ),
					'3' => esc_html__( '3 Columns', 'authow' ),
				),
				'condition' => array( 'social_style!' => array( 's4' ) ),
			)
		);

		$this->add_control(
			'color_style', array(
				'label'   => __( 'Colors Style', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'custom',
				'options' => array(
					'custom'    => esc_html__( 'Custom Color', 'authow' ),
					'brandbg'   => esc_html__( 'Brands Background Color', 'authow' ),
					'brandtext' => esc_html__( 'Brands Icons Color', 'authow' ),
				),
			)
		);

		$this->add_responsive_control(
			'hospace', array(
				'label'     => __( 'Horizontal Spacing Between Social Icons', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array(
					'{{WRAPPER}} .pcsoc-wrapper' => '--pcsoc-space: {{SIZE}}px;',
				),
			)
		);

		$this->add_responsive_control(
			'verspace', array(
				'label'     => __( 'Vertical Spacing Between Social Icons', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array(
					'{{WRAPPER}} .pcsoc-wrapper' => '--pcsoc-bspace: {{SIZE}}px;',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_showhide', array(
				'label' => esc_html__( 'Show/Hide Social Icons', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$pmetas = array(
			'facebook'   => array( 'label' => __( 'Facebook', 'authow' ), 'default' => 'yes' ),
			'twitter'    => array( 'label' => __( 'Twitter', 'authow' ), 'default' => 'yes' ),
			'youtube'    => array( 'label' => __( 'Youtube', 'authow' ), 'default' => 'yes' ),
			'instagram'  => array( 'label' => __( 'Instagram', 'authow' ), 'default' => '' ),
			'pinterest'  => array( 'label' => __( 'Pinterest', 'authow' ), 'default' => '' ),
			'flickr'     => array( 'label' => __( 'Flickr', 'authow' ), 'default' => '' ),
			'vimeo'      => array( 'label' => __( 'Vimeo', 'authow' ), 'default' => '' ),
			'soundcloud' => array( 'label' => __( 'SoundCloud', 'authow' ), 'default' => '' ),
			'behance '   => array( 'label' => __( 'Behance', 'authow' ), 'default' => '' ),
			'vk'         => array( 'label' => __( 'VK', 'authow' ), 'default' => '' ),
			'tiktok'     => array( 'label' => __( 'Tiktok', 'authow' ), 'default' => '' ),
			'twitch'     => array( 'label' => __( 'Twitch', 'authow' ), 'default' => '' ),
			'rss'        => array( 'label' => __( 'RSS', 'authow' ), 'default' => '' ),
		);

		foreach ( $pmetas as $key => $pmeta ) {
			$this->add_control( 'social_' . $key, array(
					'label'       => $pmeta['label'],
					'type'        => Controls_Manager::SWITCHER,
					'label_on'    => __( 'Show', 'authow' ),
					'label_off'   => __( 'Hide', 'authow' ),
					'default'     => $pmeta['default'],
					'separator'   => '',
					'description' => __( 'Setup ' . esc_attr( $pmeta['label'] ) . ' counter data <a target="_blank" href="' . esc_url( admin_url( 'admin.php?page=goso_social_counter_settings#tab-' . $key ) ) . '">here</a>.' ),
				)
			);
		}

		$this->end_controls_section();
		$this->register_block_title_section_controls();
		$this->start_controls_section(
			'section_content_style',
			array(
				'label' => __( 'Social Items Settings', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'style_des', array(
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => __( 'Please note that: If you selected to use Brands Background Color or Brands Icons Color, some colors options below can not apply.', 'authow' ),
				'content_classes' => 'elementor-descriptor',
			)
		);

		$this->add_responsive_control(
			'counter_item_icon_size',
			[
				'label'      => __( 'Icon Size', 'authow' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 500,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .pcsoc-icon i' => 'font-size: {{SIZE}}px;',
					'{{WRAPPER}} .pcsocs-s3 i'  => 'line-height: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'bgcl',
			array(
				'label'     => __( 'Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .pcsocs-s1 .pcsoc-item' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .pcsocs-s2 .pcsoc-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .pcsocs-s3 .pcsoc-item' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .pcsocs-s4 .pcsoc-icon' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'hbgcl',
			array(
				'label'     => __( 'Background Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .pcsocs-s1 .pcsoc-item:hover'             => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .pcsocs-s2 .pcsoc-item:hover .pcsoc-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .pcsocs-s3 .pcsoc-item:hover'             => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .pcsocs-s4 .pcsoc-item:hover .pcsoc-icon' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'bordercl',
			array(
				'label'     => __( 'Borders Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'fill' => 'border' ),
				'selectors' => array(
					'{{WRAPPER}} .pcsocs-s1 .pcsoc-item' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .pcsocs-s2 .pcsoc-icon' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .pcsocs-s3 .pcsoc-item' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .pcsocs-s4 .pcsoc-icon' => 'border-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'borderhcl',
			array(
				'label'     => __( 'Borders Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'fill' => 'border' ),
				'selectors' => array(
					'{{WRAPPER}} .pcsocs-s1 .pcsoc-item:hover'             => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .pcsocs-s2 .pcsoc-item:hover .pcsoc-icon' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .pcsocs-s3 .pcsoc-item:hover'             => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .pcsocs-s4 .pcsoc-item:hover .pcsoc-icon' => 'border-color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'textcl',
			array(
				'label'     => __( 'Icons Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .pcsoc-item i' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'texthcl',
			array(
				'label'     => __( 'Icons Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .pcsoc-item:hover i' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'countcl',
			array(
				'label'     => __( 'Counter Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .pcsoc-counter' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'counthcl',
			array(
				'label'     => __( 'Counter Text Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .pcsoc-item:hover .pcsoc-counter' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'fanscl',
			array(
				'label'     => __( '"Fans" Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .pcsoc-item .pcsoc-fan' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'fanshcl',
			array(
				'label'     => __( '"Fans" Text Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .pcsoc-item:hover .pcsoc-fan' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'followcl',
			array(
				'label'     => __( '"Follow" Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .pcsoc-item .pcsoc-like' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'followhcl',
			array(
				'label'     => __( '"Follow" Text Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .pcsoc-item:hover .pcsoc-like' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'counter_item_typo_number',
				'label'    => __( 'Number Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .pcsoc-counter',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'counter_item_typo_infotext',
				'label'    => __( 'Info Text Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .pcsoc-fan, {{WRAPPER}} .pcsoc-like',
			)
		);

		$this->add_control(
			'use_shadow', array(
				'label'     => __( 'Use Shadow?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
				'separator' => 'before'
			)
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'      => 'shadow',
				'label'     => __( 'Box Shadow', 'authow' ),
				'selector'  => '{{WRAPPER}} .pcsocshadow .pcsc-brandflag',
				'condition' => array( 'use_shadow' => 'yes' ),
			)
		);

		$this->end_controls_section();

		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		$css_class     = 'goso-block-vc goso-social-counter';
		$wrapper_class = 'pcsoc-wrapper';
		$social_style  = isset( $settings['social_style'] ) && $settings['social_style'] && in_array( $settings['social_style'], array(
			's1',
			's2',
			's3',
			's4'
		) ) ? $settings['social_style'] : 's1';
		$fill          = $settings['fill'] ? $settings['fill'] : 'border';
		$shape         = $settings['shape'] ? $settings['shape'] : 'rectangle';
		$color_style   = $settings['color_style'] ? $settings['color_style'] : 'custom';
		$brand_class   = $brand_class_icon = '';
		if ( in_array( $social_style, array( 's2', 's4' ) ) ) {
			$brand_class_icon = ' pcsc-brandflag';
		} else if ( in_array( $social_style, array( 's1', 's3' ) ) ) {
			$brand_class = ' pcsc-brandflag';
		}

		$wrapper_class .= ' pcsocs-' . $social_style;
		$wrapper_class .= ' pcsocf-' . $fill;
		$wrapper_class .= ' pcsocs-' . $shape;
		$wrapper_class .= ' pcsoccl-' . $color_style;

		if ( 's4' != $social_style ) {
			$column_default        = in_array( $social_style, array( 's3' ) ) ? '3' : '1';
			$column                = $settings['column'] ? $settings['column'] : $column_default;
			$tab_column_default    = in_array( $social_style, array( 's3' ) ) ? 'default' : '1';
			$mobile_column_default = in_array( $social_style, array( 's3' ) ) ? '2' : '1';
			$tab_column            = $settings['tab_column'] ? $settings['tab_column'] : $tab_column_default;
			$mobile_column         = $settings['mobile_column'] ? $settings['mobile_column'] : $mobile_column_default;
			$wrapper_class         .= ' pcsocc-' . $column;
			$wrapper_class         .= ' pcsocc-tabcol-' . $tab_column;
			$wrapper_class         .= ' pcsocc-mocol-' . $mobile_column;
		}

		if ( 'yes' == $settings['use_shadow'] ) {
			$wrapper_class .= ' pcsocshadow';
		}
		?>
        <div class="pcsoc-wrapper-outside">
			<?php $this->markup_block_title( $settings, $this ); ?>
            <div class="<?php echo $wrapper_class; ?>">
				<?php
				$socials = array(
					'facebook',
					'twitter',
					'youtube',
					'instagram',
					'pinterest',
					'flickr',
					'vimeo',
					'soundcloud',
					'behance ',
					'vk',
					'tiktok',
					'twitch',
					'rss',
				);

				$error = array();

				$has_data = false;

				foreach ( $socials as $social ) {


					if ( empty( $settings[ 'social_' . $social ] ) ) {
						continue;
					}

					$social_info = \PENCI_FW_Social_Counter::get_social_counter( $social );

					$social_info_name = $social_info['name'] ?? '';

					if ( ! $social_info || ! $social_info_name ) {
						continue;
					}

					$has_data = true;
					if ( 'tiktok' === $social ) {
						$count = $social_info['count'];
					} else {
						$count = \PENCI_FW_Social_Counter::format_followers( $social_info['count'] );
					}

					$count = $count ? $count : '';

					$social_icon     = $social_info['icon'];
					$social_follower = isset( $social_info['text_below'] ) && $social_info['text_below'] ? $social_info['text_below'] : '';
					$social_follow   = isset( $social_info['text_btn'] ) && $social_info['text_btn'] ? $social_info['text_btn'] : '';
					$social_url      = isset( $social_info['url'] ) && $social_info['url'] ? $social_info['url'] : '';
					// $count = '10000';
					// $social_follower = 'Fans';
					// $social_icon = '<i class="goso-faicon fa fa-facebook"></i>';
					// $social_url = '#';
					// $social_follow = 'Like';
					?>
                    <div class="pcsoc-item-wrap">
                        <a class="pcsoc-item pcsoci-<?php echo $social . $brand_class; ?><?php if ( ! $count ) {
							echo ' empty-count';
						} ?>" href="<?php echo esc_url( $social_url ); ?>"
                           target="_blank" <?php echo goso_reltag_social_icons(); ?>>
                            <span class="pcsoc-icon pcsoci-<?php echo $social . $brand_class_icon; ?>"><?php echo $social_icon; ?></span>
							<?php if ( $count && 'yes' != $settings['hide_count'] ) { ?>
                                <span class="pcsoc-counter"><?php echo $count; ?></span>
                                <span class="pcsoc-fan"><?php echo $social_follower; ?></span>
							<?php } else { ?>
								<span class="pcsoc-counter pcsoc-socname"><?php echo $social; ?></span>
							<?php } ?>
							<?php if ( in_array( $social_style, array( 's1', 's2' ) ) ) { ?>
                                <span class="pcsoc-like"><?php echo $social_follow; ?></span>
							<?php } ?>
                        </a>
                    </div>
					<?php
				}
				?>
            </div>
        </div>
		<?php
	}
}
