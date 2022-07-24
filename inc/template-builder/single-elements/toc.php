<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class GosoSingleToc extends \Elementor\Widget_Base {

	public function get_name() {
		return 'goso-single-toc';
	}

	public function get_title() {
		return esc_html__( 'Post - Table of Content', 'authow' );
	}

	public function get_icon() {
		return 'eicon-table-of-contents';
	}

	public function get_categories() {
		return [ 'goso-single-builder' ];
	}

	public function get_keywords() {
		return [ 'single', 'toc', 'table' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'General', 'authow' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'html_tag',
			[
				'label'    => esc_html__( 'HTMl Tag', 'authow' ),
				'type'     => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'default'  => 'h2',
				'options'  => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				]
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label'   => esc_html__( 'Heading Title', 'authow' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Table of content', 'authow' )
			]
		);

		$this->add_control(
			'marker_view',
			[
				'label'   => esc_html__( 'Marker View', 'authow' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'number',
				'options' => [
					'none'    => 'None',
					'number'  => 'Number',
					'bullets' => 'Bullets',
				]
			]
		);

		$this->add_responsive_control(
			'table_width',
			[
				'label'     => esc_html__( 'Table of Content Width', 'authow' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 200,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .goso-toc-wrapper' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'color_style',
			[
				'label' => esc_html__( 'Color & Styles', 'authow' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'toc-heading-genr-style',
			[
				'label' => 'General Style',
				'type'  => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'toc-bg',
			[
				'label'     => 'General Background Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .goso-toc-wrapper' => 'background-color:{{VALUE}}' ],
			]
		);

		$this->add_control(
			'toc-border-cl',
			[
				'label'     => 'General Borders Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .goso-toc ol ol, {{WRAPPER}} .goso-toc ol li, {{WRAPPER}} .goso-toc ul li, {{WRAPPER}} .goso-toc ul ul, {{WRAPPER}} .goso-toc-wrapper .goso-toc-head' => 'border-color:{{VALUE}}' ],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), array(
				'name'     => 'toc_typo',
				'label'    => __( 'Typography for Heading', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-toc-wrapper .goso-toc-head',
			)
		);

		$this->add_control(
			'toc-heading-color',
			[
				'label'     => 'Heading Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .goso-toc-wrapper .goso-toc-head' => 'color:{{VALUE}}' ],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), array(
				'name'     => 'toc_1st_class',
				'label'    => __( 'Typography for Parent Heading', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-toc ul a, {{WRAPPER}} .goso-toc ol a',
			)
		);

		$this->add_control(
			'toc_1st_color',
			[
				'label'     => 'Parent Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .goso-toc ul > li > a, {{WRAPPER}} .goso-toc ol > li > a' => 'color:{{VALUE}}' ],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(), array(
				'name'     => 'toc_child_class',
				'label'    => __( 'Typography for Child Heading', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-toc ul ul a, {{WRAPPER}} .goso-toc ol ol a',
			)
		);

		$this->add_control(
			'toc_child_color',
			[
				'label'     => 'Child Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .goso-toc ul ul a, {{WRAPPER}} .goso-toc ol ol a' => 'color:{{VALUE}}' ],
			]
		);

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
		$settings = $this->get_settings_for_display();
		$marker   = $settings['marker_view'];
		?>
        <div class="goso-toc-wrapper style-<?php echo esc_attr( $marker ); ?>">
            <div class="goso-toc-head"><?php echo esc_attr( $settings['heading_title'] ); ?></div>

            <nav class="js-toc goso-toc">
                <ol class="toc-list ">
                    <li class="toc-list-item is-active-li"><a href="#"
                                                              class="toc-link node-name--H2  is-active-link">Parent
                            Title</a>
                        <ol class="toc-list  is-collapsible">
                            <li class="toc-list-item"><a href="#" class="toc-link node-name--H3 ">Child name - 1</a>
                            </li>
                            <li class="toc-list-item"><a href="#" class="toc-link node-name--H3 ">Child name - 2</a>
                            </li>
                            <li class="toc-list-item"><a href="#" class="toc-link node-name--H3 ">Child name - 3</a>
                            </li>
                        </ol>
                    </li>
                    <li class="toc-list-item"><a href="#" class="toc-link node-name--H2 ">Parent Title</a></li>
                    <li class="toc-list-item"><a href="#" class="toc-link node-name--H2 ">Parent Title</a>
                        <ol class="toc-list is-collapsible is-collapsed">
                            <li class="toc-list-item"><a href="#" class="toc-link node-name--H3 ">Child name - 1</a>
                            </li>
                        </ol>
                    </li>
                    <li class="toc-list-item"><a href="#" class="toc-link node-name--H2 ">Parent Title</a>
                        <ol class="toc-list  is-collapsible is-collapsed">
                            <li class="toc-list-item"><a href="#" class="toc-link node-name--H3 ">Child name - 1</a>
                            </li>
                            <li class="toc-list-item"><a href="#" class="toc-link node-name--H3 ">Child name - 2</a>
                                <ol class="toc-list  is-collapsible is-collapsed">
                                    <li class="toc-list-item"><a href="#" class="toc-link node-name--H4 ">Sub Child name
                                            - 1</a></li>
                                    <li class="toc-list-item"><a href="#"
                                                                 class="toc-link node-name--H4 ">Sub Child name - 2</a>
                                    </li>
                                    <li class="toc-list-item"><a href="#"
                                                                 class="toc-link node-name--H4 ">Sub Child name - 3</a>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                    </li>
                    <li class="toc-list-item"><a href="#" class="toc-link node-name--H2 ">Parent Title</a>
                    </li>
                </ol>
            </nav>
        </div>
		<?php
	}

	protected function builder_content() {
		$settings      = $this->get_settings_for_display();
		$tags          = $settings['html_tag'];
		$marker        = $settings['marker_view'];
		$validate_tags = is_array( $tags ) ? implode( ',', $settings['html_tag'] ) : $settings['html_tag'];
		wp_enqueue_script( 'goso-toc', get_template_directory_uri() . '/js/jquery.toc.js', '', PENCI_SOLEDAD_VERSION, true );
		wp_add_inline_script( 'goso-toc', 'jQuery(".js-toc").toc({content: "div.post-entry", headings: "' . $validate_tags . '"})' );
		?>
        <div class="goso-toc-wrapper style-<?php echo esc_attr( $marker ); ?>">
            <div class="goso-toc-head"><?php echo esc_attr( $settings['heading_title'] ); ?></div>
            <nav class="goso-toc">
                <ul class="js-toc"></ul>
            </nav>
        </div>
		<?php
	}
}
