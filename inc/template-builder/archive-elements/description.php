<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class GosoArchiveDescription extends \Elementor\Widget_Base {

	public function get_title() {
		return esc_html__( 'Archive - Description', 'authow' );
	}

	public function get_icon() {
		return 'eicon-text';
	}

	public function get_categories() {
		return [ 'goso-custom-archive-builder' ];
	}

	public function get_keywords() {
		return [ 'archive', 'description' ];
	}

	protected function get_html_wrapper_class() {
		return 'pcab-adesc elementor-widget-' . $this->get_name();
	}

	public function get_name() {
		return 'goso-archive-description';
	}

	protected function register_controls() {

		$this->start_controls_section( 'content_section', [
			'label' => esc_html__( 'General', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		] );

		$this->add_control( 'desc_align', [
			'label'     => __( 'Text Align', 'authow' ),
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
			'selectors' => [ '{{WRAPPER}} .goso-category-description.post-entry' => 'text-align:{{VALUE}}' ],
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'color_style', [
			'label' => esc_html__( 'Color & Styles', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), array(
			'name'     => 'desc_typo',
			'label'    => __( 'Typography for Archive Description', 'authow' ),
			'selector' => '{{WRAPPER}} .goso-archive-description.post-entry',
		) );

		$this->add_control( 'text-color', [
			'label'     => 'Text Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .goso-archive-description.post-entry' => 'color:{{VALUE}} !important' ],
		] );

		$this->add_control( 'main-text-color', [
			'label'     => 'Link Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .goso-archive-description.post-entry a' => 'color:{{VALUE}} !important' ],
		] );

		$this->add_control( 'main-text-hcolor', [
			'label'     => 'Link Hover Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .goso-archive-description.post-entry a:hover' => 'color:{{VALUE}} !important' ],
		] );

		$this->end_controls_section();

	}

	protected function render() {

		if ( goso_elementor_is_edit_mode() ) {
			$this->preview_content();
		} else {
			$this->builder_content();
		}

	}

	protected function preview_content() {
		?>
        <div class="post-entry goso-category-description goso-archive-description">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consequuntur eius iste mollitia quo
                veritatis, voluptatum. Atque culpa deleniti eligendi est explicabo modi officia optio porro reiciendis
                tempore, ut voluptas!</p>
        </div>
		<?php
	}

	protected function builder_content() {
		if ( is_tag() && tag_description() ) {
			echo '<div class="goso-archive-description goso-tag-description">' . do_shortcode( tag_description() ) . '</div>';
		} elseif ( is_category() && category_description() ) {
			echo '<div class="goso-archive-description goso-category-description">' . do_shortcode( category_description() ) . '</div>';
		} elseif ( is_archive() ) {
			the_archive_description( '<div class="post-entry goso-category-description goso-archive-description goso-acdes-below">', '</div>' );
		}
	}
}
