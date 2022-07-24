<?php

namespace GosoAuthowElementor\Modules\GosoCountDown\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoCountDown extends Base_Widget {

	public function get_name() {
		return 'penci-count-down';
	}

	public function get_title() {
		return penci_get_theme_name('Goso').' '.esc_html__( ' Countdown', 'authow' );
	}

	public function get_icon() {
		return 'eicon-countdown';
	}
	
	public function get_categories() {
		return [ 'penci-elements' ];
	}

	public function get_keywords() {
		return array( 'count', 'count_down' );
	}

	public function get_script_depends() {
		return array( 'jquery.plugin', 'countdown' );
	}

	protected function register_controls() {


		$this->start_controls_section(
			'section_general', array(
				'label' => esc_html__( 'Count Down', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'count_down_style', array(
				'label'   => __( 'Choose Style', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 's1',
				'options' => array(
					's1' => esc_html__( 'Style 1', 'authow' ),
					's5' => esc_html__( 'Style 2', 'authow' ),
					's3' => esc_html__( 'Style 3', 'authow' ),
					's4' => esc_html__( 'Style 4', 'authow' ),
				)
			)
		);
		$this->add_control(
			'count_down_posttion', array(
				'label'   => __( 'Posttion', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'center',
				'options' => array(
					'left'   => esc_html__( 'Left', 'authow' ),
					'center' => esc_html__( 'Center', 'authow' ),
					'right'  => esc_html__( 'Right', 'authow' ),
				)
			)
		);

		$this->add_control(
			'count_year', array(
				'label'   => __( 'Year', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'separator'   => 'before',
			)
		);
		$this->add_control(
			'count_month', array(
				'label'   => __( 'Month', 'authow' ),
				'type'    => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'count_day', array(
				'label'   => __( 'Day', 'authow' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'count_hour', array(
				'label'   => __( 'Hour', 'authow' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'count_minus', array(
				'label'   => __( 'Minus', 'authow' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'count_sec', array(
				'label'   => __( 'Sec', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'separator'   => 'after',
			)
		);

		$this->add_control(
			'countdown_opts',
			array(
				'label' => __( 'Select time units to display in countdown timer', 'authow' ),
				'type'  => Controls_Manager::HEADING,
			)
		);

		$countdown_opts = array(
			esc_html__( "Years", "penci-framework" )   => "Y",
			esc_html__( "Months", "penci-framework" )  => "O",
			esc_html__( "Weeks", "penci-framework" )   => "W",
			esc_html__( "Days", "penci-framework" )    => "D",
			esc_html__( "Hours", "penci-framework" )   => "H",
			esc_html__( "Minutes", "penci-framework" ) => "M",
			esc_html__( "Seconds", "penci-framework" ) => "S",
		);

		foreach ( $countdown_opts as $countdown_opt_lab => $countdown_opt ) {

			$default = '';
			if( in_array( $countdown_opt, array( 'D','H','M','S' ) ) ){
				$default = 'yes';
			}

			$this->add_control(
				'countdown_'. $countdown_opt , array(
					'label'     => $countdown_opt_lab,
					'type'      => Controls_Manager::SWITCHER,
					'label_on'  => __( 'Show', 'authow' ),
					'label_off' => __( 'Hide', 'authow' ),
					'default'   => $default,
				)
			);
		}

		$this->add_control(
			'digit_border', array(
				'label'   => __( 'Timer digit border style', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''       => esc_html__( 'None', 'authow' ),
					'solid'  => esc_html__( 'Solid', 'authow' ),
					'dashed' => esc_html__( 'Dashed', 'authow' ),
					'dotted' => esc_html__( 'Dotted', 'authow' ),
				),
				'separator'   => 'before',
				'condition' => array( 'count_down_style' => array( 's1','s2' ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-countdown-s1 .penci-countdown-amount' => 'border-style: {{VALUE}};',
					'{{WRAPPER}} .penci-countdown-s2 .penci-countdown-amount' => 'border-style: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'digit_border_width', array(
				'label'     => __( 'Timer digit border width', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-countdown-s1 .penci-countdown-amount' => 'border-width: {{SIZE}}px',
					'{{WRAPPER}} .penci-countdown-s2 .penci-countdown-amount' => 'border-width: {{SIZE}}px',
				),

				'condition' => array( 'digit_border' => array( 'solid', 'dashed', 'dotted', 'double' ),'count_down_style' => array( 's1','s2') ),
			)
		);
		$this->add_control(
			'digit_border_radius', array(
				'label'     => __( 'Timer digit border radius', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 500, ) ),
				'selectors' => array(
                      '{{WRAPPER}} .penci-countdown-s1 .penci-countdown-amount' => 'border-radius: {{SIZE}}px',
                      '{{WRAPPER}} .penci-countdown-s2 .penci-countdown-amount' => 'border-radius: {{SIZE}}px',
					),
				'condition' => array( 'digit_border' => array( 'solid', 'dashed', 'dotted', 'double' ),'count_down_style' => array( 's1','s2') ),
			)
		);
		$this->add_control(
			'digit_padding', array(
				'label'     => __( 'Timer digit padding', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-countdown-amount' => 'padding: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'digit_margin_top', array(
				'label'     => __( 'Timer digit margin top', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => -200, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-countdown-amount' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'unit_margin_top', array(
				'label'     => __( 'Timer unit margin top', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-countdown-period' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_responsive_control(
			'countdown_item_width', array(
				'label'     => __( 'Width of Countdown Section', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 500, ) ),
				'condition' => array( 'count_down_style' => array( 's3','s4','s5' ) ),
				'selectors' => array( '{{WRAPPER}} .penci-countdown-section' => 'width: {{SIZE}}px;' ),
			)
		);
		$this->add_responsive_control(
			'countdown_item_height', array(
				'label'     => __( 'Height of Countdown Section', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 500, ) ),
				'condition' => array( 'count_down_style' => array( 's3','s4','s5' ) ),
				'selectors' => array( '{{WRAPPER}} .penci-countdown-section' => 'height: {{SIZE}}px;' ),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_translation', array(
				'label' => esc_html__( 'Strings Translation', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'str_days', array(
				'label'   => __( 'Day (Singular)', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Day', 'authow' ),
			)
		);
		$this->add_control(
			'str_days2', array(
				'label'   => __( 'Days (Plural)', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Days', 'authow' ),
			)
		);
		$this->add_control(
			'str_weeks', array(
				'label'   => __( 'Week (Singular)', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Week', 'authow' ),
			)
		);
		$this->add_control(
			'str_weeks2', array(
				'label'   => __( 'Weeks (Singular)', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Weeks', 'authow' ),
			)
		);

		$this->add_control(
			'str_months', array(
				'label'   => __( 'Month (Singular)', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Month', 'authow' ),
			)
		);
		$this->add_control(
			'str_months2', array(
				'label'   => __( 'Months (Singular)', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Months', 'authow' ),
			)
		);

		$this->add_control(
			'str_years', array(
				'label'   => __( 'Year (Singular)', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Year', 'authow' ),
			)
		);
		$this->add_control(
			'str_years2', array(
				'label'   => __( 'Years (Singular)', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Years', 'authow' ),
			)
		);

		$this->add_control(
			'str_hours', array(
				'label'   => __( 'Hour (Singular)', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Hour', 'authow' ),
			)
		);
		$this->add_control(
			'str_hours2', array(
				'label'   => __( 'Hours (Singular)', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Hours', 'authow' ),
			)
		);

		$this->add_control(
			'str_minutes', array(
				'label'   => __( 'Minute (Singular)', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Minute', 'authow' ),
			)
		);
		$this->add_control(
			'str_minutes2', array(
				'label'   => __( 'Minutes (Singular)', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Minutes', 'authow' ),
			)
		);

		$this->add_control(
			'str_seconds', array(
				'label'   => __( 'Second (Singular)', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Second', 'authow' ),
			)
		);
		$this->add_control(
			'str_seconds2', array(
				'label'   => __( 'Seconds (Singular)', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Seconds', 'authow' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			array(
				'label' => __( 'Content', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'time_digit_color',
			array(
				'label'     => __( 'Timer Digit Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-countdown-amount' => 'color: {{VALUE}} !important;' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'time_digit_typo',
				'label'     => __( 'Timer Digit Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .penci-countdown-amount',
			)
		);

		$this->add_control(
			'time_digit_bordercolor',
			array(
				'label'     => __( 'Timer Digit Border Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-countdown-s1 .penci-countdown-amount' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .penci-countdown-s2 .penci-countdown-amount' => 'border-color: {{VALUE}};'
				),
				'condition' => array( 'count_down_style' => array( 's1','s2' ) ),
			)
		);

		$this->add_control(
			'time_digit_bgcolor',
			array(
				'label'     => __( 'Timer Digit Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-countdown-s1 .penci-countdown-amount' => 'background-color: {{VALUE}} !important;' ),
				'condition' => array( 'count_down_style' => array( 's1' ) ),
			)
		);
		$this->add_control(
			'unit_color',
			array(
				'label'     => __( 'Timer Unit Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-countdown-period' => 'color: {{VALUE}} !important;' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'unit_typo',
				'label'     => __( 'Timer Unit Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .penci-countdown-period',
			)
		);
		$this->add_control(
			'countdown_item_bg', array(
				'label'     => __( 'Countdown Section Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'count_down_style' => array( 's3','s4' ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-countdown-s3 .penci-span-inner' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-countdown-s4 .penci-span-inner' => 'background-color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'countdown_item_border', array(
				'label'     => __( 'Countdown Section Border Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'count_down_style' => array( 's3' ) ),
				'selectors' => array( '{{WRAPPER}} .penci-countdown-s3 .penci-span-inner' => 'border-color: {{VALUE}};' ),
			)
		);
		$this->end_controls_section();
	}

	public function get_time_format( $settings ) {
		$data_format = '';

		$opts = array(
			'countdown_Y' => 'Y',
			'countdown_O' => 'O',
			'countdown_W' => 'W',
			'countdown_D' => 'D',
			'countdown_H' => 'H',
			'countdown_M' => 'M',
			'countdown_S' => 'S',
		);

		foreach ( $opts as $k => $v ) {
			if ( isset( $settings[ $k ] ) && $settings[ $k ] ) {
				$data_format .= $v;
			}
		}

		if ( ! $data_format ) {
			$data_format = 'DHMS';
		}

		return $data_format;
	}

	protected function render() {
		$settings              = $this->get_settings();

		$block_id = 'penci_countdown_' . rand( 1000, 100000 );

		$css_class = 'penci-countdown-bsc';
		$css_class .= ' penci-countdown-' . $settings['count_down_style'];
		$css_class .= ' penci-style-' . $settings['count_down_posttion'];

		$labels  = sprintf( "['%s', '%s', '%s', '%s', '%s', '%s', '%s']",
			$settings['str_years2'], $settings['str_weeks2'],
			$settings['str_months2'], $settings['str_days2'],
			$settings['str_hours2'], $settings['str_minutes2'],
			$settings['str_seconds2']
		);
		$labels1 = sprintf( "['%s', '%s', '%s', '%s', '%s', '%s', '%s']",
			$settings['str_years'], $settings['str_weeks'],
			$settings['str_months'], $settings['str_days'],
			$settings['str_hours'], $settings['str_minutes'],
			$settings['str_seconds']
		);

		$data_format = $this->get_time_format( $settings );

		// Data Until
		$data_time = '';
		$data_time .= $settings['count_year'] ? $settings['count_year'] : 0;
		$data_time .= ',';
		$data_time .= $settings['count_month'] ? intval( $settings['count_month'] ) - 1 : 0;
		$data_time .= ',';
		$data_time .= $settings['count_day'] ? $settings['count_day'] : 0;
		$data_time .= ',';
		$data_time .= $settings['count_hour'] ? $settings['count_hour'] : 0;
		$data_time .= ',';
		$data_time .= $settings['count_minus'] ? $settings['count_minus'] : 0;
		$data_time .= ',';
		$data_time .= $settings['count_sec'] ? $settings['count_sec'] : 0;
		?>
		<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>"></div>
		<script type="text/javascript">
			jQuery( function ( $ ) {
				if ( $.fn.countdown ) {
					var <?php echo esc_attr( $block_id ); ?>newDateTime = new Date(<?php echo $data_time; ?> );

					$( '#<?php echo esc_attr( $block_id ); ?>' ).countdown( {
						until: <?php echo esc_attr( $block_id ); ?>newDateTime,
						labels: <?php echo $labels; ?>,
						labels1: <?php echo $labels1; ?>,
						timezone: <?php echo get_option( 'gmt_offset' ); ?>,
						format: '<?php echo $data_format; ?>',
						<?php echo( is_rtl() ? 'isRTL: true' : '' ); ?>
					} );
				}
			} );
		</script>
		<?php
	}
}
