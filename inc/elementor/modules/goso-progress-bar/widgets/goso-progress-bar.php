<?php
namespace GosoAuthowElementor\Modules\GosoProgressBar\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoProgressBar extends Base_Widget {

	public function get_name() {
		return 'goso-progress-bar';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Progress Bar', 'authow' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}
	
	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'progress bar', 'progress', 'bar' );
	}

	protected function register_controls() {
		

		$this->start_controls_section(
			'section_progressbar', array(
				'label' => esc_html__( 'Progressbar', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'label', array(
				'label'   => __( 'Custom Label', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Custom Label #1', 'authow' ),
			)
		);
		$repeater->add_control(
			'value', array(
				'label' => __( 'Value', 'authow' ),
				'type'  => Controls_Manager::NUMBER
			)
		);
		$repeater->add_control(
			'textcolor',
			array(
				'label' => __( 'Custom text color', 'authow' ),
				'type'  => Controls_Manager::COLOR,
			)
		);
		$repeater->add_control(
			'bgcolor',
			array(
				'label' => __( 'Custom background color', 'authow' ),
				'type'  => Controls_Manager::COLOR,
			)
		);

		$this->add_control(
			'progressbar', array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'label' => __( 'Custom Label #1', 'authow' ),
						'value' => '90',
					),
					array(
						'label' => __( 'Custom Label #2', 'authow' ),
						'value' => '80',
					),
					array(
						'label' => __( 'Custom Label #3', 'authow' ),
						'value' => '70',
					),
				),
				'title_field' => '{{{ label }}}',
			)
		);

		$this->add_control(
			'units', array(
				'label'       => __( 'Units', 'authow' ),
				'type'        => Controls_Manager::TEXT,
				'description' => __( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'authow' ),

			)
		);
		$this->add_control(
			'options', array(
				'label'   => __( 'Options', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'striped',
				'options' => array(
					'striped'  => esc_html__( 'Add stripes', 'authow' ),
					'animated' => esc_html__( 'Add animation (Note: visible only with striped bar)', 'authow' )
				)
			)
		);

		$this->add_control(
			'bar_height', array(
				'label'     => __( 'Custom Height for Process Bar', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .goso-review-process' => 'height: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'bar_border_radius', array(
				'label'     => __( 'Border Radius for Process Bar', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .goso-review-process' => 'border-radius: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'bar_mar_top', array(
				'label'     => __( 'Custom Margin Top for Process Bar', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .goso-review-process' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'bar_mar_bottom', array(
				'label'     => __( 'Custom Margin Bottom for Process Bar', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .goso-review-process' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		$this->end_controls_section();
		// Options colors
		$this->start_controls_section(
			'section_style_content',
			array(
				'label' => __( 'Content', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'bar_title_color',
			array(
				'label'     => __( 'Process Bar Title Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .goso-probar-point' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_responsive_control(
			'bar_title_size', array(
				'label'     => __( 'Font size for Process Bar Title', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .goso-probar-point' => 'font-size: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'bar_score_color',
			array(
				'label'     => __( 'Process Bar Score Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .goso-probar-score' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_responsive_control(
			'bar_score_size', array(
				'label'     => __( 'Font size for Process Bar Score', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .goso-probar-score' => 'font-size: {{SIZE}}px' ),
			)
		);

		$this->add_control(
			'bar_run_bgcolor',
			array(
				'label'     => __( 'Process Bar Run Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .goso-review-process span' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'bar_bgcolor',
			array(
				'label'     => __( 'Process Bar Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .goso-review-process' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		if ( ! $settings['progressbar'] ) {
			return;
		}
		$values = (array)$settings['progressbar'];


		$css_class = 'goso-block-vc goso-progress-bar';

		$bar_options = array();
		$options     = explode( ',', $settings['options'] );
		if ( in_array( 'animated', $options ) ) {
			$bar_options[] = 'animated goso-probar-animated';
		}
		if ( in_array( 'striped', $options ) ) {
			$bar_options[] = 'goso-probar-striped';
		}
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<div class="goso-block_content">
				<ul class="goso-probar-items">
					<?php
					$line_output = '';

					$max_value        = 0.0;
					$graph_lines_data = array();
					foreach ( $values as $data ) {
						$new_line             = $data;
						$new_line['value']    = isset( $data['value'] ) ? $data['value'] : 0;
						$new_line['label']    = isset( $data['label'] ) ? $data['label'] : '';
						$new_line['bgcolor']  = isset( $data['bgcolor'] ) ? ' style="background-color: ' . esc_attr( $data['bgcolor'] ) . ';"' : '';
						$new_line['txtcolor'] = isset( $data['textcolor'] ) ? ' style="color: ' . esc_attr( $data['textcolor'] ) . ';"' : '';

						if ( $max_value < (float) $new_line['value'] ) {
							$max_value = $new_line['value'];
						}
						$graph_lines_data[] = $new_line;
					}

					foreach ( $graph_lines_data as $line ) {

						if ( $max_value > 100.00 ) {
							$percentage_value = (float) $line['value'] > 0 && $max_value > 100.00 ? round( (float) $line['value'] / $max_value * 100, 4 ) : 0;
						} else {
							$percentage_value = $line['value'];
						}
						$percentage_value = number_format( intval( $percentage_value / 10 ), 1, '.', '' );

						$line_output .= '<li class="goso-probar-item">';
						$line_output .= '<div class="goso-probar-text"' . $line['txtcolor'] . '>';
						$line_output .= '<span class="goso-probar-point">' . do_shortcode( $line['label'] ) . '</span>';
						$line_output .= '<span class="goso-probar-score">' . $line['value'] . ( isset( $settings['units'] ) ? $settings['units'] : '' ) . '</span>';
						$line_output .= '</div>';
						$line_output .= '<div class="goso-review-process">';
						$line_output .= '<span class="goso-probar-run ' . esc_attr( implode( ' ', $bar_options ) ) . '" data-width="' . $percentage_value . '"' . $line['bgcolor'] . '></span>';
						$line_output .= '</div>';
						$line_output .= '</li>';
					}

					echo $line_output;
					?>
				</ul>
			</div>
		</div>
		<?php
	}
}
