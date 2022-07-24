<?php
namespace GosoAuthowElementor\Modules\GosoPopularCat\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoPopularCat extends Base_Widget {

	public function get_name() {
		return 'penci-popular-cat';
	}

	public function get_title() {
		return penci_get_theme_name('Goso').' '.esc_html__( ' Popular Categories', 'authow' );
	}

	public function get_icon() {
		return 'eicon-bullet-list';
	}
	
	public function get_categories() {
		return [ 'penci-elements' ];
	}

	public function get_keywords() {
		return array( 'facebook', 'social', 'embed', 'page' );
	}

	protected function register_controls() {
		

		// Section layout
		$this->start_controls_section(
			'section_general', array(
				'label' => esc_html__( 'General', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'plimit', array(
				'label'     => __( 'Amount', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 10,
			)
		);
		$this->add_control(
			'pcat_type', array(
				'label'   => __( 'Categories type', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => array(
					'default'            => esc_html__( 'Popular categories by number posts', 'authow' ),
					'alphabetical_order' => esc_html__( 'Popular categories sort by name A->Z', 'authow' ),
				)
			)
		);

		$this->add_control(
			'pcount', array(
				'label'     => __( 'Show posts count', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
				'default'   => '',
			)
		);
		$this->add_control(
			'phierarchical', array(
				'label'     => __( 'Show hierarchy', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
				'default'   => '',
			)
		);

		$this->add_control(
			'phide_uncat', array(
				'label'     => __( 'Hide Uncategorized category', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
				'default'   => '',
				'separator' => 'before',
			)
		);

		$this->end_controls_section();
		$this->register_block_title_section_controls();

		// Color and typo
		$this->start_controls_section(
			'section_color_typo',
			array(
				'label' => __( 'Colors', 'authow' ),
				'tab' => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'plink_color', array(
				'label'     => __( 'Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} li a' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'plink_hcolor', array(
				'label'     => __( 'Text Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} li a:hover' => 'color: {{VALUE}};',
				),
			)
		);
		
		$this->add_control(
			'borders_color', array(
				'label'     => __( 'Border Bottom Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-block-popular-cat li, .penci-block-popular-cat ul ul' => 'border-color: {{VALUE}};',
				),
			)
		);
		
		$this->add_responsive_control(
			'pmeta_size', array(
				'label'     => __( 'Font size', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} li a' => 'font-size: {{SIZE}}px' ),
			)
		);

		$this->add_control(
			'ppcount_color', array(
				'label'     => __( 'Post Counts  Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .category-item-count' => 'color: {{VALUE}};',
				),
			)
		);
		
		$this->add_responsive_control(
			'cat_spacing', array(
				'label'     => __( 'Spacing Between Categories', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 1, 'max' => 100 ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-block-popular-cat li' => 'padding-bottom: calc( {{SIZE}}px / 2 ); margin-bottom: calc( {{SIZE}}px / 2 );',
					'{{WRAPPER}} .penci-block-popular-cat ul ul' => 'padding-top: calc( {{SIZE}}px / 2 ); margin-top: calc( {{SIZE}}px / 2 );',
					'{{WRAPPER}} .penci-block-popular-cat li:last-child' => 'padding-bottom: 0; margin-bottom: 0;',
				),
			)
		);
		
		$this->end_controls_section();
		
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		$css_class = 'penci-block-vc penci-block-popular-cat widget_categories widget widget_categories';

		$c          = ! empty( $settings['pcount'] ) ? '1' : '0';
		$h          = ! empty( $settings['phierarchical'] ) ? '1' : '0';
		$limit      = ! empty( $settings['plimit'] ) ? $settings['plimit'] : 6;
		$exclude    = ! empty( $settings['phide_uncat'] ) ? '1' : '';
		$hide_empty = empty( $settings['pcount'] ) ? false : true;

		$cat_args = array(
			'show_count'   => $c,
			'hierarchical' => $h,
			'hide_empty'   => $hide_empty,
			'number'       => $limit,
			'title_li'     => '',
			'exclude'      => $exclude
		);
		if ( isset( $settings['pcat_type'] ) && 'default' == $settings['pcat_type'] ) {
			$cat_args['orderby'] = 'count';
			$cat_args['order']   = 'DESC';
		}

		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="penci-block_content penci-div-inner">
				<ul>
					<?php
					wp_list_categories( $cat_args );
					?>
				</ul>
			</div>
		</div>
		<?php
	}
}
