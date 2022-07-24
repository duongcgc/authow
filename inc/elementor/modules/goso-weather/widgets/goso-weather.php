<?php
namespace GosoAuthowElementor\Modules\GosoWeather\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoWeather extends Base_Widget {

	public function get_name() {
		return 'goso-weather';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Weather', 'authow' );
	}

	public function get_icon() {
		return 'eicon-image';
	}
	
	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'weather' );
	}

    public function get_style_depends(){
	    return ['goso-font-iweather'];
    }

	protected function register_controls() {
		

		$this->start_controls_section(
			'section_layout', array(
				'label' => esc_html__( 'Layout', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'goso_location', array(
				'label'       => __( 'Search your for location:', 'authow' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'London',
				'description' => sprintf( '%s - You can use "city name" (ex: London) or "city name,country code" (ex: London,uk)',
					'<a href="' . esc_url( 'http://openweathermap.org/find' ) . '">' . esc_html__( 'Find your location', 'authow' ) . '</a>' ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'goso_location_show', array(
				'label'       => __( 'Location display', 'authow' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'If the option is empty,will display results from ', 'authow' ) . '<a href="' . esc_url( 'http://openweathermap.org/find' ) . '">openweathermap.org</a>',
				'label_block' => true,
			)
		);

		$this->add_control(
			'goso_units', array(
				'label'   => __( 'Units', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'metric',
				'options' => array(
					'imperial' => esc_html__( 'F', 'authow' ),
					'metric'   => esc_html__( 'C', 'authow' ),
				),
			)
		);

		$this->add_control(
			'goso_forcast', array(
				'label'   => __( 'Forcast', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '5',
				'options' => array(
					'1' => esc_html__( '1 Day', 'authow' ),
					'2' => esc_html__( '2 Day', 'authow' ),
					'3' => esc_html__( '3 Day', 'authow' ),
					'4' => esc_html__( '4 Day', 'authow' ),
					'5' => esc_html__( '5 Day', 'authow' ),
				),
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
			'w_genneral_color',
			array(
				'label'     => __( 'General color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .goso-weather-condition,' .
					'{{WRAPPER}} .goso-weather-information,' .
					'{{WRAPPER}} .goso-weather-lo-hi__content .fa,' .
					'{{WRAPPER}} .goso-circle,' .
					'{{WRAPPER}} .goso-weather-animated-icon i,' .
					'{{WRAPPER}} .goso-weather-unit' => 'color: {{VALUE}};  opacity: 1;',
				),
			)
		);

		$this->add_control(
			'w_localtion_color',
			array(
				'label'     => __( 'Localtion color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-weather-city' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'w_location_typo',
				'label'    => __( 'Typography for Location', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-weather-city',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'w_condition_typo',
				'label'    => __( 'Typography for Cloudiness', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-weather-condition',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'w_whc_info_typo',
				'label'    => __( 'Typography for Wind,Humidity, Clouds', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-weather-information',
			)
		);

		$this->add_control(
			'w_border_color',
			array(
				'label'     => __( 'Border color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-weather-information' => 'border-color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'w_degrees_color',
			array(
				'label'     => __( 'Degrees color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-big-degrees,{{WRAPPER}} .goso-small-degrees' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'w_temp_typo',
				'label'    => __( 'Typography for Temperature', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-weather-now .goso-big-degrees',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'w_tempsmall_typo',
				'label'    => __( 'Typography for Min/Max Temperature', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-weather-degrees-wrap .goso-small-degrees',
			)
		);

		$this->add_control(
			'w_forecast_text_color',
			array(
				'label'     => __( 'Custom color for forecast weather in next days', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-weather-week' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'w_forecast_bg_color',
			array(
				'label'     => __( 'Custom background for forecast weather in next days', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-weather-week:before' => 'background-color: {{VALUE}}; opacity: 1;' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'w_forecast_typo',
				'label'    => __( 'Typography for Weather Forecast', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-weather-days .goso-day-degrees',
			)
		);


		$this->end_controls_section();
		
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		$css_class = 'goso-block-vc goso_block_weather goso-weather';
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="goso-block_content">
				<?php
				$weather_data = \Goso_Weather::show_forecats( array(
					'location'      => $settings['goso_location'],
					'location_show' => $settings['goso_location_show'],
					'forecast_days' => $settings['goso_forcast'],
					'units'         => $settings['goso_units'],
				) );

				if( $weather_data ) {
					echo $weather_data;
				}else {
					echo '<div class="goso-block-error">';
					echo '<span>Weather widget</span>';
					echo ' You need to fill API key to Customize > General > Extra Options > Weather API Key to get this widget work.';
					echo '</div>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
