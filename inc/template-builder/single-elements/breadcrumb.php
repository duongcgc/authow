<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class GosoSingleBreadcrumb extends \Elementor\Widget_Base {

	public function get_title() {
		return esc_html__( 'Post - Breadcrumb', 'authow' );
	}

	public function get_icon() {
		return 'eicon-navigation-horizontal';
	}

	public function get_categories() {
		return [ 'goso-single-builder' ];
	}

	public function get_keywords() {
		return [ 'single', 'breadcrumb' ];
	}

	protected function get_html_wrapper_class() {
		return 'pcsb-brcrb elementor-widget-' . $this->get_name();
	}

	public function get_name() {
		return 'goso-single-breadcrumb';
	}

	protected function register_controls() {

		$this->start_controls_section( 'content_section', [
			'label' => esc_html__( 'General', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		] );

		$this->add_control( 'breadcrumb_align', [
			'label'     => __( 'Breadcrumb Align', 'authow' ),
			'type'      => \Elementor\Controls_Manager::CHOOSE,
			'default'   => 'left',
			'options'   => array(
				'left'   => array(
					'title' => __( 'Left', 'authow' ),
					'icon'  => 'eicon-text-align-left',
				),
				'center' => array(
					'title' => __( 'Center', 'authow' ),
					'icon'  => 'eicon-text-align-center',
				),
				'right'  => array(
					'title' => __( 'Right', 'authow' ),
					'icon'  => 'eicon-text-align-right',
				),
			),
			'toggle'    => true,
			'selectors' => [ '{{WRAPPER}} .goso-breadcrumb' => 'text-align:{{VALUE}}' ],
		] );

		$this->add_control( 'enable_pri_cat_yoast_seo', [
			'label' => 'Show Only Primary Category from "Yoast SEO" or "Rank Math" plugin for Breadcrumb',
			'type'  => \Elementor\Controls_Manager::SWITCHER,
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'color_style', [
			'label' => esc_html__( 'Color & Styles', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), array(
			'name'     => 'breadcrumb-typo',
			'label'    => __( 'Typography for BreadCrumb', 'authow' ),
			'selector' => '{{WRAPPER}} .goso-breadcrumb,{{WRAPPER}} .goso-breadcrumb *',
		) );

		$this->add_control( 'breadcrumb-t-color', [
			'label'     => 'BreadCrumb Text Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .goso-breadcrumb,{{WRAPPER}} .goso-breadcrumb span,{{WRAPPER}} .goso-breadcrumb a' => 'color:{{VALUE}} !important' ],
		] );

		$this->add_control( 'breadcrumb-l-hcolor', [
			'label'     => 'BreadCrumb Text Hover Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .goso-breadcrumb a:hover' => 'color:{{VALUE}} !important' ],
		] );

		$this->add_control( 'breadcrumb-spacing', [
			'label'     => 'BreadCrumb Spacing',
			'type'      => \Elementor\Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 1, 'max' => 300, 'step' => 0.5 ) ),
			'selectors' => [ '{{WRAPPER}} .container.goso-breadcrumb i' => 'margin-left:{{SIZE}}px;margin-right:calc({{SIZE}}px - 4px)' ],
		] );

		$this->end_controls_section();

	}

	protected function render() {

		$yoast_breadcrumb = '';
		if ( function_exists( 'yoast_breadcrumb' ) ) {
			$yoast_breadcrumb = yoast_breadcrumb( '<div class="container goso-breadcrumb single-breadcrumb">', '</div>', false );
		}

		if ( $yoast_breadcrumb ) {
			echo $yoast_breadcrumb;
		} else {
			$yoast_breadcrumb = '';
			if ( function_exists( 'yoast_breadcrumb' ) ) {
				$yoast_breadcrumb = yoast_breadcrumb( '<div class="container goso-breadcrumb single-breadcrumb">', '</div>', false );
			}

			if ( $yoast_breadcrumb ) {
				echo $yoast_breadcrumb;
			} else { ?>
                <div class="container goso-breadcrumb single-breadcrumb">
                    <span><a class="crumb"
                             href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo goso_get_setting( 'goso_trans_home' ); ?></a></span><?php goso_fawesome_icon( 'fas fa-angle-right' ); ?>
					<?php
					if ( get_theme_mod( 'enable_pri_cat_yoast_seo' ) ) {
						$primary_term = goso_get_wpseo_primary_term();

						if ( $primary_term ) {
							echo $primary_term;
						} else {
							$goso_cats = get_the_category( get_the_ID() );
							$goso_cat  = array_shift( $goso_cats );
							echo goso_get_category_parents( $goso_cat );
						}
					} else {
						$goso_cats = get_the_category( get_the_ID() );
						$goso_cat  = array_shift( $goso_cats );
						echo goso_get_category_parents( $goso_cat );
					}
					?>
                    <span><?php the_title(); ?></span>
                </div>
			<?php } ?>
		<?php }

	}
}
