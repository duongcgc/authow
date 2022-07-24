<?php

namespace GosoAuthowElementor\Modules\GosoOpenHour\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoOpenHour extends Base_Widget {

	public function get_name() {
		return 'penci-open-hour';
	}

	public function get_title() {
		return penci_get_theme_name('Goso').' '.esc_html__( ' Open Hour', 'authow' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}
	
	public function get_categories() {
		return [ 'penci-elements' ];
	}

	public function get_keywords() {
		return array( 'open hour' );
	}

	protected function register_controls() {
		

		$this->start_controls_section(
			'section_images', array(
				'label' => esc_html__( 'Openings Hours / Menu', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'icon', array(
				'label'   => __( 'Icon', 'authow' ),
				'type'    => Controls_Manager::ICON,
				'default' => 'far fa-clock',
				'label_block' => true,
			)
		);
		$repeater->add_control(
			'title', array(
				'label'   => __( 'Custom title', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Monday', 'authow' ),
			)
		);
		$repeater->add_control(
			'subtitle', array(
				'label' => __( 'Subtitle', 'authow' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'hours', array(
				'label' => __( 'Hours or Price', 'authow' ),
				'type'  => Controls_Manager::TEXT,
			)
		);


		$this->add_control(
			'working_hours', array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'icon'  => 'far fa-clock',
						'title' => 'Monday',
						'hours' => '8:00 AM - 9:00 PM'
					),
					array(
						'icon'  => 'far fa-clock',
						'title' => 'Tuesday',
						'hours' => '8:00 AM - 9:00 PM'
					),
					array(
						'icon'  => 'far fa-clock',
						'title' => 'Wednessday',
						'hours' => '8:00 AM - 9:00 PM'
					)
				),
				'title_field' => '{{{ title }}}',
			)
		);
		$this->add_control(
			'row_gap', array(
				'label'     => __( 'Space Item', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}}  .penci-workingh-lists li' => 'margin-bottom: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'subtitle_martop', array(
				'label'     => __( 'Subtitle Margin Top', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}}  .penci-listitem-subtitle' => 'margin-top: {{SIZE}}px' ),
			)
		);

		$this->end_controls_section();
		$this->register_block_title_section_controls();
		// Design
		$this->start_controls_section(
			'section_design_content',
			array(
				'label' => __( 'Content', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'ophour_icon_color',
			array(
				'label'     => __( 'Icon Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-workingh-lists .penci-listitem-icon' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_responsive_control(
			'ophour_icon_size', array(
				'label'     => __( 'Font size for Icon', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-workingh-lists .penci-listitem-icon' => 'font-size: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'ophour_title_color',
			array(
				'label'     => __( 'Title Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-workingh-lists .penci-listitem-title' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'label'    => __( 'Typhography for Title', 'authow' ),
				'name'     => 'ophour_title_typo',
				'selector' => '{{WRAPPER}} .penci-workingh-lists .penci-listitem-title',
			)
		);
		$this->add_control(
			'ophour_subtitle_color',
			array(
				'label'     => __( 'Subtitle Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-workingh-lists .penci-listitem-subtitle' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'label'    => __( 'Typhography for Subtitle', 'authow' ),
				'name'     => 'ophour_subtitle_typo',
				'selector' => '{{WRAPPER}} .penci-workingh-lists .penci-listitem-subtitle',
			)
		);

		$this->add_responsive_control(
			'ophour_subtitle_size', array(
				'label'     => __( 'Font size for Subtitle', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-workingh-lists .penci-listitem-subtitle' => 'font-size: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'ophour_hour_color',
			array(
				'label'     => __( 'Hours or Price Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-workingh-lists .penci-listitem-hours' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'label'    => __( 'Typhography for Subtitle', 'authow' ),
				'name'     => 'ophour_hour_typo',
				'selector' => '{{WRAPPER}} .penci-workingh-lists .penci-listitem-hours',
			)
		);
		$this->end_controls_section();

		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		if( ! $settings['working_hours'] ) {
			return;
		}

		$css_class = 'penci-block-vc penci-working-hours';
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="penci-block_content">
				<div class="penci-workingh-lists">
					<ul>
						<?php foreach ( (array)$settings['working_hours'] as $hour ):
							$icon = isset( $hour['icon'] ) ? $hour['icon'] : '';
							$title = isset( $hour['title'] ) ? $hour['title'] : '';
							$hours = isset( $hour['hours'] ) ? $hour['hours'] : '';
							$subtitle = isset( $hour['subtitle'] ) ? $hour['subtitle'] : '';

							?>
							<li class="penci-workingh-item">
								<div class="penci-workingh-item-inner">
									<div class="penci-workingh-line1">
										<div class="penci-icontitle">
											<?php
											if ( $icon ) {
												echo '<i class="penci-listitem-icon ' . $icon . '"></i>';
											}
											if ( $title ) {
												echo '<span class="penci-listitem-title">' . $title . '</span>';
											}
											?>
										</div>
										<?php
										if ( $hours ) {
											echo '<span class="penci-listitem-hours">' . $hours . '</span>';
										}
										?>
									</div>
									<?php
									if ( $subtitle ) {
										echo '<span class="penci-listitem-subtitle">' . $subtitle . '</span>';
									}
									?>
								</div>
							</li>
						<?php endforeach; ?>

					</ul>
				</div>
			</div>
		</div>
		<?php
	}
}
