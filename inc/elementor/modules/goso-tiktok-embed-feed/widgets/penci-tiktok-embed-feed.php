<?php

namespace GosoAuthowElementor\Modules\GosoTiktokEmbedFeed\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use GosoAuthowElementor\Base\Base_Widget;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoTiktokEmbedFeed extends Base_Widget {

	public function get_name() {
		return 'penci-tiktok-embed-feed';
	}

	public function get_title() {
		return penci_get_theme_name( 'Goso' ) . ' ' . esc_html__( ' TikTok Feed', 'authow' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'penci-elements' ];
	}

	public function get_keywords() {
		return array( 'tiktok', 'social' );
	}

	public function get_script_depends() {
		return array( 'penci_tiktok_embed' );
	}

	protected function register_controls() {


		// Section layout
		$this->start_controls_section( 'section_page', array(
			'label' => esc_html__( 'TikTok Data', 'authow' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		) );
		$this->add_control( 'username', array(
			'label'   => __( 'Username ( Without @ )', 'authow' ),
			'type'    => Controls_Manager::TEXT,
			'default' => '',
		) );

		$this->add_responsive_control( 'width', array(
			'label'      => __( 'Width', 'authow' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => [ 'px' ],
			'range'      => array(
				'px' => array( 'max' => 2000 ),
			),
			'selectors'  => [
				'{{WRAPPER}} .tiktok-embed' => 'max-width:{{SIZE}}px'
			]
		) );

		$this->add_control( 'content_horizontal_position', array(
			'label'                => __( 'Content Text Horizontal Position', 'authow' ),
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
			'selectors'            => array(
				'{{WRAPPER}} .tiktok-embed' => '{{VALUE}}',
			),
			'selectors_dictionary' => array(
				'left'   => 'margin-right: auto',
				'center' => 'margin-left: auto; margin-right: auto;',
				'right'  => 'margin-left: auto',
			),
		) );

		$this->end_controls_section();
		$this->register_block_title_section_controls();
		$this->start_controls_section( 'section_latest_tiktok_style', array(
			'label' => __( 'TikTok', 'authow' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		) );
		$this->add_group_control( Group_Control_Typography::get_type(), array(
			'name'     => 'tiktok_text_typo',
			'label'    => __( 'Username Typography', 'authow' ),
			'selector' => '{{WRAPPER}} section a',
		) );
		$this->add_control( 'tiktok_u_color', array(
			'label'     => __( 'Username Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array(
				'{{WRAPPER}} section a' => 'color: {{VALUE}};',
			)
		) );
		$this->add_control( 'tiktok_u_hcolor', array(
			'label'     => __( 'Username Hover Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array(
				'{{WRAPPER}} section a:hover' => 'color: {{VALUE}};',
			)
		) );

		$this->end_controls_section();

		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();
		$username = $settings['username'] ? $settings['username'] : '';
		wp_enqueue_script( 'penci_tiktok_embed' );
		?>
        <div class="pc-tiktok-embed-feed-el">
			<?php
			$this->markup_block_title( $settings, $this );
			if ( $username ) {
				wp_enqueue_script( 'penci_tiktok_embed' );
				?>
                <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@<?php echo esc_attr( $username ); ?>"
                            data-unique-id="<?php echo esc_attr( $username ); ?>"
                            data-embed-type="creator"
                            style="width: 100%;">
                    <section><a target="_blank"
                                href="https://www.tiktok.com/@<?php echo esc_attr( $username ); ?>">@<?php echo esc_attr( $username ); ?></a>
                    </section>
                </blockquote>
				<?php
			} else {
				_e( 'Please enter your Tiktok username', 'authow' );
			}
			?>
        </div>
		<?php
	}
}
