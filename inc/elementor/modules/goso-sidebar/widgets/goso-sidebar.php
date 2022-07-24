<?php
namespace GosoAuthowElementor\Modules\GosoSidebar\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoSidebar extends Base_Widget {

	public function get_name() {
		return 'goso-sidebar';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Sidebar', 'authow' );
	}

	public function get_icon() {
		return 'eicon-sidebar';
	}
	
	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'Sidebar' );
	}

	protected function register_controls() {
		

		// Section layout
		$this->start_controls_section(
			'section_page', array(
				'label' => esc_html__( 'General', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'goso_sidebar', array(
				'label'   => __( 'Sidebar to Display', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'main-sidebar',
				'options' => \Goso_Custom_Sidebar::get_list_sidebar_el()
			)
		);
		$this->add_control(
			'goso_htitle_layout', array(
				'label'   => __( 'Select Sidebar Style', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''                  => esc_html__( 'Default( follow Customize )', 'authow' ),
					'pcsb-boxed-none'   => esc_html__( 'No Boxed', 'authow' ),
					'pcsb-boxed-whole'  => esc_html__( 'Boxed Whole Sidebar', 'authow' ),
					'pcsb-boxed-widget' => esc_html__( 'Boxed Widgets on Sidebar', 'authow' )
				)
			)
		);
		$this->add_control(
			'goso_htitle_style', array(
				'label'   => __( 'Sidebar Widget Heading Style', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''                  => esc_html__( 'Default( follow Customize )', 'authow' ),
					'style-1'           => esc_html__( 'Style 1', 'authow' ),
					'style-2'           => esc_html__( 'Style 2', 'authow' ),
					'style-3'           => esc_html__( 'Style 3', 'authow' ),
					'style-4'           => esc_html__( 'Style 4', 'authow' ),
					'style-5'           => esc_html__( 'Style 5', 'authow' ),
					'style-6'           => esc_html__( 'Style 6 - Only Text', 'authow' ),
					'style-7'           => esc_html__( 'Style 7', 'authow' ),
					'style-9'           => esc_html__( 'Style 8', 'authow' ),
					'style-8'           => esc_html__( 'Style 9', 'authow' ),
					'style-10'          => esc_html__( 'Style 10', 'authow' ),
					'style-11'          => esc_html__( 'Style 11', 'authow' ),
					'style-12'          => esc_html__( 'Style 12', 'authow' ),
					'style-13'          => esc_html__( 'Style 13', 'authow' ),
					'style-14'          => esc_html__( 'Style 14', 'authow' ),
					'style-15'          => esc_html__( 'Style 15', 'authow' ),
					'style-16'          => esc_html__( 'Style 16', 'authow' ),
					'style-2 style-17'  => esc_html__( 'Style 17', 'authow' ),
					'style-18'          => esc_html__( 'Style 18', 'authow' ),
					'style-18 style-19' => esc_html__( 'Style 19', 'authow' ),
					'style-18 style-20' => esc_html__( 'Style 20', 'authow' ),
				)
			)
		);
		$this->add_control(
			'goso_htitle_align', array(
				'label'   => __( 'Sidebar Widget Heading Align', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''               => esc_html__( 'Default( follow Customize )', 'authow' ),
					'pcalign-left'   => esc_html__( 'Left', 'authow' ),
					'pcalign-center' => esc_html__( 'Center', 'authow' ),
					'pcalign-right'  => esc_html__( 'Right', 'authow' )
				)
			)
		);

		$this->add_control(
			'goso_htitle_iconpo', array(
				'label'     => __( 'Align Icon on Style 15', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => array(
					''              => esc_html__( 'Default( follow Customize )', 'authow' ),
					'pciconp-right' => esc_html__( 'Right', 'authow' ),
					'pciconp-left'  => esc_html__( 'Left', 'authow' ),
				),
				'condition' => array( 'goso_htitle_style' => 'style-15' ),
			)
		);

		$this->add_control(
			'goso_htitle_icon', array(
				'label'     => __( 'Custom Icon on Style 15', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => array(
					''             => esc_html__( 'Default( follow Customize )', 'authow' ),
					'pcicon-right' => esc_html__( 'Arrow Right', 'authow' ),
					'pcicon-left'  => esc_html__( 'Arrow Left', 'authow' ),
					'pcicon-down'  => esc_html__( 'Arrow Down', 'authow' ),
					'pcicon-up'    => esc_html__( 'Arrow Up', 'authow' ),
					'pcicon-star'  => esc_html__( 'Star', 'authow' ),
					'pcicon-bars'  => esc_html__( 'Bars', 'authow' ),
					'pcicon-file'  => esc_html__( 'File', 'authow' ),
					'pcicon-fire'  => esc_html__( 'Fire', 'authow' ),
					'pcicon-book'  => esc_html__( 'Book', 'authow' ),
				),
				'condition' => array( 'goso_htitle_style' => 'style-15' ),
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$heading_title       = get_theme_mod( 'goso_sidebar_heading_style' ) ? get_theme_mod( 'goso_sidebar_heading_style' ) : 'style-1';
		$heading_align       = get_theme_mod( 'goso_sidebar_heading_align' ) ? get_theme_mod( 'goso_sidebar_heading_align' ) : 'pcalign-center';
		$sidebar_style       = get_theme_mod( 'goso_sidebar_style' ) ? get_theme_mod( 'goso_sidebar_style' ) : '';
		$sidebar_icon_pos    = get_theme_mod( 'goso_sidebar_icon_align' ) ? get_theme_mod( 'goso_sidebar_icon_align' ) : 'pciconp-right';
		$sidebar_icon_design = get_theme_mod( 'goso_sidebar_icon_design' ) ? get_theme_mod( 'goso_sidebar_icon_design' ) : 'pcicon-right';

		$sidebar  = $settings['goso_sidebar'] ? $settings['goso_sidebar'] : 'main-sidebar';
		$style    = $settings['goso_htitle_style'] ? $settings['goso_htitle_style'] : $heading_title;
		$align    = $settings['goso_htitle_align'] ? $settings['goso_htitle_align'] : $heading_align;
		$layout   = $settings['goso_htitle_layout'] ? $settings['goso_htitle_layout'] : $sidebar_style;
		$icon_pos = $settings['goso_htitle_iconpo'] ? $settings['goso_htitle_iconpo'] : $sidebar_icon_pos;
		$icon     = $settings['goso_htitle_icon'] ? $settings['goso_htitle_icon'] : $sidebar_icon_design;

		if ( ! isset( $sidebar ) ): $sidebar = 'main-sidebar'; endif;
		if ( ! isset( $style ) ): $style = 'style-1'; endif;
		if ( ! in_array( $align, array(
			'pcalign-center',
			'pcalign-left',
			'pcalign-right'
		) ) ): $align = 'pcalign-center'; endif;
		?>

        <div id="sidebar"
             class="goso-sidebar-content goso-sidebar-content-vc <?php echo esc_attr( $style . ' ' . $align . ' ' . $layout . ' ' . $icon_pos . ' ' . $icon ); ?>">
            <div class="theiaStickySidebar">
				<?php
				if ( is_active_sidebar( $sidebar ) ) {
					dynamic_sidebar( $sidebar );
				} else {
					dynamic_sidebar( 'main-sidebar' );
				}
				?>
            </div>
        </div>

		<?php
	}
}
