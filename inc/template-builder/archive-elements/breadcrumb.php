<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class GosoArchiveBreadcrumb extends \Elementor\Widget_Base {

	public function get_title() {
		return esc_html__( 'Archive - Breadcrumb', 'authow' );
	}

	public function get_icon() {
		return 'eicon-navigation-horizontal';
	}

	public function get_categories() {
		return [ 'goso-custom-archive-builder' ];
	}

	public function get_keywords() {
		return [ 'archive', 'breadcrumb' ];
	}

	protected function get_html_wrapper_class() {
		return 'pcab-abrcrb elementor-widget-' . $this->get_name();
	}

	public function get_name() {
		return 'goso-archive-breadcrumb';
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
			'selectors' => [ '{{WRAPPER}} .goso-breadcrumb,{{WRAPPER}} .goso-breadcrumb span,{{WRAPPER}} .goso-breadcrumb i,{{WRAPPER}} .goso-breadcrumb a' => 'color:{{VALUE}} !important' ],
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

		if ( is_category() ) {
			$this->builder_category_content();
		} elseif ( is_tag() ) {
			$this->builder_tag_content();
		} else {
			$this->builder_archive_content();
		}

	}

	protected function builder_category_content() {
		$settings          = $this->get_settings_for_display();
		$sidebar_position  = goso_get_sidebar_position_archive();
		$two_sidebar_class = '';
		if ( 'two-sidebar' == $sidebar_position ): $two_sidebar_class = ' two-sidebar'; endif;
		$yoast_breadcrumb = '';

		$category_oj = get_queried_object();
		$fea_cat_id  = $category_oj->term_id;

		if ( function_exists( 'yoast_breadcrumb' ) ) {
			$yoast_breadcrumb = yoast_breadcrumb( '<div class="container goso-breadcrumb' . $two_sidebar_class . '">', '</div>', false );
		}

		if ( $yoast_breadcrumb ) {
			echo $yoast_breadcrumb;
		} else { ?>
            <div class="container goso-breadcrumb<?php echo $two_sidebar_class; ?>">
            <span><a class="crumb"
                     href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo goso_get_setting( 'goso_trans_home' ); ?></a></span><?php goso_fawesome_icon( 'fas fa-angle-right' ); ?>
				<?php
				$parent_ID = goso_get_category_parent_id( $fea_cat_id );
				if ( $parent_ID ):
					echo goso_get_category_parents( $parent_ID );
				endif;
				?>
                <span><?php single_cat_title( '', true ); ?></span>
            </div>
		<?php }
	}

	protected function builder_tag_content() {
		$sidebar_position  = goso_get_sidebar_position_archive();
		$two_sidebar_class = '';
		if ( 'two-sidebar' == $sidebar_position ): $two_sidebar_class = ' two-sidebar'; endif;
		$yoast_breadcrumb = '';
		if ( function_exists( 'yoast_breadcrumb' ) ) {
			$yoast_breadcrumb = yoast_breadcrumb( '<div class="container goso-breadcrumb goso-crumb-inside' . $two_sidebar_class . '">', '</div>', false );
		}

		if ( $yoast_breadcrumb ) {
			echo $yoast_breadcrumb;
		} else { ?>
            <div class="container goso-breadcrumb goso-crumb-inside<?php echo $two_sidebar_class; ?>">
                            <span><a class="crumb"
                                     href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo goso_get_setting( 'goso_trans_home' ); ?></a></span><?php goso_fawesome_icon( 'fas fa-angle-right' ); ?>
                <span><?php echo goso_get_setting( 'goso_trans_tags' ); ?></span><?php goso_fawesome_icon( 'fas fa-angle-right' ); ?>
                <span><?php printf( goso_get_setting( 'goso_trans_posts_tagged' ) . ' "%s"', single_tag_title( '', false ) ); ?></span>
            </div>
		<?php }
	}

	protected function builder_archive_content() {
		$sidebar_position  = goso_get_sidebar_position_archive();
		$two_sidebar_class = '';
		if ( 'two-sidebar' == $sidebar_position ): $two_sidebar_class = ' two-sidebar'; endif;
		$yoast_breadcrumb = '';
		if ( function_exists( 'yoast_breadcrumb' ) ) {
			$yoast_breadcrumb = yoast_breadcrumb( '<div class="container goso-breadcrumb goso-crumb-inside' . $two_sidebar_class . '">', '</div>', false );
		}
		if ( $yoast_breadcrumb ) {
			echo $yoast_breadcrumb;
		} else { ?>
            <div class="container goso-breadcrumb goso-crumb-inside">
                            <span><a class="crumb"
                                     href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo goso_get_setting( 'goso_trans_home' ); ?></a></span><?php goso_fawesome_icon( 'fas fa-angle-right' ); ?>
				<?php
				echo '<span>';
				echo goso_get_setting( 'goso_trans_archives' );
				echo '</span>';
				?>
            </div>
		<?php }
	}

	protected function preview_content() {
		$settings    = $this->get_settings_for_display();
		$heading_tag = $settings['heading_markup'];
		?>
        <div class="archive-box">
            <div class="title-bar">
                <<?php echo $heading_tag; ?> class="page-title">
				<?php _e( 'General Archive Title', 'authow' ); ?>
            </<?php echo $heading_tag; ?>>
        </div>
        </div>
		<?php
	}
}
