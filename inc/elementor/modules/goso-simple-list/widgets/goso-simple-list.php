<?php

namespace GosoAuthowElementor\Modules\GosoSimpleList\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use GosoAuthowElementor\Base\Base_Widget;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

/**
 * Elementor widget that inserts an embeddable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class GosoSimpleList extends Base_Widget {
	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 * @since  1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'goso_simple_list';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 * @since  1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Simple List', 'authow' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 * @since  1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'eicon-editor-list-ul';
	}

	/**
	 * Get widget categories.
	 *
	 * @return array Widget categories.
	 * @since  1.0.0
	 * @access public
	 *
	 */
	public function get_categories() {
		return [ 'goso-elements' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		/**
		 * Content tab.
		 */

		/**
		 * General settings.
		 */
		$this->start_controls_section(
			'general_content_section',
			[
				'label' => esc_html__( 'General', 'authow' ),
			]
		);
		
		$this->add_control(
			'align',
			[
				'label'   => esc_html__( 'Align', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'left'   => esc_attr__( 'Left', 'authow' ),
					'right'  => esc_attr__( 'Right', 'authow' ),
					'center' => esc_attr__( 'Center', 'authow' ),
				],
				'default' => 'left',
			]
		);
		
		$this->add_control(
			'list_type',
			[
				'label'   => esc_html__( 'Type', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'icon'      => esc_html__( 'With icon', 'authow' ),
					'ordered'   => esc_html__( 'Ordered', 'authow' ),
					'unordered' => esc_html__( 'Unordered', 'authow' ),
					'without'   => esc_html__( 'Without icon', 'authow' ),
				],
				'default' => 'icon',
			]
		);

		$this->add_control(
			'icon',
			[
				'label'     => esc_html__( 'Icon', 'authow' ),
				'type'      => Controls_Manager::ICONS,
				'default'   => [
					'value'   => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'condition' => [
					'list_type' => [ 'icon' ],
				],
			]
		);
		
		$this->add_control(
			'icon_pos',
			[
				'label'   => esc_html__( 'Icon Position', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'left'   => esc_attr__( 'Left', 'authow' ),
					'right'  => esc_attr__( 'Right', 'authow' ),
				],
				'default' => 'left',
				'condition' => [
					'list_type' => [ 'icon', 'unordered' ],
				],
			]
		);
		
		$this->add_responsive_control(
			'icon_space', array(
				'label'     => __( 'Icon Spacing', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 1, 'max' => 100, 'step' => 1 ) ),
				'selectors' => array(
					'{{WRAPPER}} .goso-iconp-left li .list-icon, {{WRAPPER}} .goso-simplelist.goso-simplelist-type-unordered li:before' => 'margin-right: {{SIZE}}px;',
					'{{WRAPPER}} .goso-iconp-right li .list-icon, .goso-simplelist.goso-iconp-right.goso-simplelist-type-unordered li:before' => 'margin-left: {{SIZE}}px;',
				),
				'condition' => [
					'list_type' => [ 'icon', 'unordered' ],
				],
			)
		);
		
		$this->add_responsive_control(
			'spacing', array(
				'label'     => __( 'Spacing Between Items', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 1, 'max' => 100, 'step' => 1 ) ),
				'selectors' => array(
					'{{WRAPPER}} .goso-simplelist li' => 'margin-bottom: {{SIZE}}px;',
				),
			)
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'list_items_section',
			[
				'label' => esc_html__( 'List Items', 'authow' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_content',
			[
				'label'   => esc_html__( 'Content', 'authow' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => 'Far far away there live the blind live in Bookmarksgrove right.',
			]
		);

		$repeater->add_control(
			'link',
			[
				'label'       => esc_html__( 'Link', 'authow' ),
				'description' => esc_html__( 'Enter URL if you want this text to have a link.', 'authow' ),
				'type'        => Controls_Manager::URL,
				'default'     => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);

		$this->add_control(
			'list_items',
			[
				'type'        => Controls_Manager::REPEATER,
				'title_field' => '{{{ list_content }}}',
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'list_content' => 'Cottage cheese the big cheese hard cheese',
					],
					[
						'list_content' => 'Croque monsieur when the cheese comes out everybody.',
					],
					[
						'list_content' => 'Cut the cheese.',
					],
				],
			]
		);

		$this->end_controls_section();

		/**
		 * General settings.
		 */
		$this->start_controls_section(
			'general_style_section',
			[
				'label' => esc_html__( 'General', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'text_typo',
				'label'    => __( 'List Typography', 'authow' ),
				'selector' => '.post-entry {{WRAPPER}} li',
			)
		);

		$this->add_control(
			'text_color',
			[
				'label'     => esc_html__( 'Text color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} li' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'text_color_hover',
			[
				'label'     => esc_html__( 'Text color hover', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} li:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * Icon settings.
		 */
		$this->start_controls_section(
			'icon_style_section',
			[
				'label'     => esc_html__( 'Icon', 'authow' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'list_type!' => [ 'without' ],
				],
			]
		);

		$this->add_control(
			'list_style',
			[
				'label'     => esc_html__( 'Style', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'default' => esc_html__( 'Default', 'authow' ),
					'rounded' => esc_html__( 'Circle', 'authow' ),
					'square'  => esc_html__( 'Square', 'authow' ),
				],
				'default'   => 'default',
				'condition' => [
					'list_type' => [ 'icon' ],
				],
			]
		);

		$this->add_control(
			'icons_color',
			[
				'label'     => esc_html__( 'Icons color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#2C2C2C',
				'selectors' => [
					'{{WRAPPER}} .list-icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .goso-simplelist.goso-simplelist-type-unordered li:before' => 'color: {{VALUE}}',
				],
				'condition' => [
					'list_type' => [ 'icon', 'ordered', 'unordered' ],
				],
			]
		);

		$this->add_control(
			'icons_color_hover',
			[
				'label'     => esc_html__( 'Icons color hover', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} li:hover .list-icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .goso-simplelist.goso-simplelist-type-unordered li:hover:before' => 'color: {{VALUE}}',
				],
				'condition' => [
					'list_type' => [ 'icon', 'ordered', 'unordered' ],
				],
			]
		);

		$this->add_control(
			'icons_bg_color',
			[
				'label'     => esc_html__( 'Icons background color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#EAEAEA',
				'selectors' => [
					'{{WRAPPER}} .list-icon' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'list_style' => [ 'rounded', 'square' ],
				],
			]
		);

		$this->add_control(
			'icons_bg_color_hover',
			[
				'label'     => esc_html__( 'Icons background color hover', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} li:hover .list-icon' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'list_style' => [ 'rounded', 'square' ],
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label'     => esc_html__( 'Icon size', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => 1,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .goso-simplelist .list-icon' => 'font-size: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .goso-simplelist.goso-simplelist-type-unordered li:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'list_type!' => [ 'without' ],
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$default_settings = [
			'icon'  => '',
			'image' => '',

			'size'  => 'default',
			'align' => 'left',

			'list'       => '',
			'list_type'  => 'icon',
			'list_style' => 'default',
			'list_items' => '',
		];

		$settings    = wp_parse_args( $this->get_settings_for_display(), $default_settings );
		$icon_output = '';

		if ( ! $settings['list_items'] ) {
			return;
		}

		$this->add_render_attribute(
			[
				'list' => [
					'class' => [
						'goso-simplelist',
						'size-' . $settings['size'],
						'goso-simplelist-type-' . $settings['list_type'],
						'goso-simplelist-style-' . $settings['list_style'],
						'goso-justify-' . $settings['align'],
						'goso-iconp-' . $settings['icon_pos'],
					],
				],
			]
		);

		if ( 'rounded' === $settings['list_style'] || 'square' === $settings['list_style'] ) {
			$this->add_render_attribute( 'list', 'class', 'goso-simplelist-shape-icon' );
		}

		if ( 'icon' === $settings['list_type'] && $settings['icon'] ) {
			$icon_output = goso_elementor_get_render_icon( $settings['icon'] );
		}
		?>
        <ul <?php echo $this->get_render_attribute_string( 'list' ); ?>>
			<?php foreach ( $settings['list_items'] as $index => $item ) : ?>
				<?php
				$repeater_label_key = $this->get_repeater_setting_key( 'list_content', 'list_items', $index );
				$this->add_render_attribute(
					[
						$repeater_label_key => [
							'class' => [
								'list-content',
							],
						],
					]
				);

				$this->add_inline_editing_attributes( $repeater_label_key );

				// Link settings.
				$item['link']['class'] = 'goso-fill';
				$link_attrs            = goso_get_link_attrs( $item['link'] );
				$open_link = $close_link = '';
				if ( isset( $item['link']['url'] ) && $item['link']['url'] ) :
					$open_link = '<a ' . $link_attrs . '>';
					$close_link = '</a>';
				endif;
				?>
                <li class="elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
					<?php if ( 'icon' == $settings['list_type'] ) : ?>
                        <span class="list-icon">
							<?php echo $icon_output; ?>
						</span>
					<?php endif ?>
					<?php echo $open_link; ?>
                    <span <?php echo $this->get_render_attribute_string( $repeater_label_key ); ?>>
						<?php echo $item['list_content']; ?>
					</span>
					<?php echo $close_link; ?>
                </li>
			<?php endforeach ?>
        </ul>

		<?php
	}
}
