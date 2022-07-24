<?php
namespace GosoAuthowElementor\Modules\GosoPintersest\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoPintersest extends Base_Widget {

	public function get_name() {
		return 'goso-pintersest';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Pinterest', 'authow' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}
	
	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'pinterest' );
	}
	
	protected function register_controls() {
		

		$this->start_controls_section(
			'section_pinterest', array(
				'label' => esc_html__( 'Pinterest', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'pusername', array(
				'label'       =>  __( 'Enter the <strong style="color: #ff0000;">username</strong> or <strong style="color: #ff0000;">username/board_name</strong> for load images:', 'authow' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'thefirstmess/animals-cuteness',
				'label_block' => true,
				'description' => 'Example if you want to load a board has url <strong style="color: #ff0000;"><a href="https://www.pinterest.com/thefirstmess/animals-cuteness" target="_blank">https://www.pinterest.com/thefirstmess/animals-cuteness</a></strong> You need to fill <strong style="color: #ff0000;">thefirstmess/animals-cuteness</strong>',
			)
		);
		$this->add_control(
			'pnumbers', array(
				'label'       => __( 'Number of images to show', 'authow' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 9,
			)
		);

		$this->add_control(
			'pcache', array(
				'label'       => __( 'Cache life time ( unit is seconds )', 'authow' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 1200,
			)
		);

		$this->add_control(
			'pfollow', array(
				'label'     => esc_html__( 'Display more link with username text?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
				'default'   => 'yes',
			)
		);


		$this->end_controls_section();
		$this->register_block_title_section_controls();
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		$css_class = 'goso-block-vc goso-pintersest';

		$pusername = $settings['pusername'];
		$pnumbers  = $settings['pnumbers'];
		$pcache    = $settings['pcache'];
		$pfollow   = $settings['pfollow'];
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="goso-block_content">
				<div class="goso-pinterest-widget-container">
					<?php
					if ( ! $pusername ) {
						esc_html_e( 'Pinterest data error: pinterest data is not set, please check the ID', 'authow' );
					}
					$pinboard = new \Goso_Pinterest();
					$pinboard->render_html( $pusername, $pnumbers, $pcache, $pfollow );
					?>
				</div>
			</div>
		</div>
		<?php
	}
}
