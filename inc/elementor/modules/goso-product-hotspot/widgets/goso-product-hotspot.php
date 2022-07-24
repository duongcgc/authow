<?php
/**
 * Image hotspot map.
 */

namespace GosoAuthowElementor\Modules\GosoProductHotspot\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

/**
 * Elementor widget that inserts an embeddable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class GosoProductHotspot extends Widget_Base {
	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'goso_product_hotspot';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' - Product Hotspot', 'authow' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'eicon-hotspot';
	}

	/**
	 * Get widget categories.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_categories() {
		return [ 'goso-elements' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * @since 1.0.0
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
			'image',
			[
				'label'   => esc_html__( 'Choose image', 'authow' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'image',
				'default'   => 'large',
				'separator' => 'none',
			]
		);

		$this->end_controls_section();

		/**
		 * Items settings.
		 */
		$this->start_controls_section(
			'items_content_section',
			[
				'label' => esc_html__( 'Items', 'authow' ),
			]
		);

		$repeater = new Repeater();

		$repeater->start_controls_tabs( 'hotspot_tabs' );

		$repeater->start_controls_tab(
			'content_tab',
			[
				'label' => esc_html__( 'Content', 'authow' ),
			]
		);

		$repeater->add_control(
			'hotspot_type',
			[
				'label'   => esc_html__( 'Type', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'text'    => esc_html__( 'Text', 'authow' ),
					'product' => esc_html__( 'Product', 'authow' ),
				],
				'default' => 'product',
			]
		);

		$repeater->add_control(
			'hotspot_dropdown_side',
			[
				'label'       => esc_html__( 'Dropdown side', 'authow' ),
				'description' => esc_html__( 'Show the content on left or right side, top or bottom.', 'authow' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'left'   => esc_html__( 'Left', 'authow' ),
					'right'  => esc_html__( 'Right', 'authow' ),
					'top'    => esc_html__( 'Top', 'authow' ),
					'bottom' => esc_html__( 'Bottom', 'authow' ),
				],
				'default'     => 'left',
			]
		);

		/**
		 * Text settings
		 */
		$repeater->add_control(
			'title',
			[
				'label'     => esc_html__( 'Title', 'authow' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'Title, click to edit.',
				'condition' => [
					'hotspot_type' => [ 'text' ],
				],
			]
		);

		$repeater->add_control(
			'image',
			[
				'label'     => esc_html__( 'Choose image', 'authow' ),
				'type'      => Controls_Manager::MEDIA,
				'condition' => [
					'hotspot_type' => [ 'text' ],
				],
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'image',
				'default'   => 'large',
				'separator' => 'none',
				'condition' => [
					'hotspot_type' => [ 'text' ],
				],
			]
		);

		$repeater->add_control(
			'link_text',
			[
				'label'     => esc_html__( 'Link text', 'authow' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => 'Button',
				'condition' => [
					'hotspot_type' => [ 'text' ],
				],
			]
		);

		$repeater->add_control(
			'link',
			[
				'label'     => esc_html__( 'Link', 'authow' ),
				'type'      => Controls_Manager::URL,
				'default'   => [
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				],
				'condition' => [
					'hotspot_type' => [ 'text' ],
				],
			]
		);

		$repeater->add_control(
			'content',
			[
				'label'     => esc_html__( 'Content', 'authow' ),
				'type'      => Controls_Manager::TEXTAREA,
				'condition' => [
					'hotspot_type' => [ 'text' ],
				],
			]
		);

		/**
		 * Product settings
		 */
		$repeater->add_control(
			'product_id',
			[
				'label'       => esc_html__( 'Select product', 'authow' ),
				'type'        => 'goso_el_autocomplete',
				'search'      => 'goso_get_posts_by_query',
				'render'      => 'goso_get_posts_title_by_id',
				'post_type'   => 'product',
				'multiple'    => false,
				'label_block' => true,
				'condition'   => [
					'hotspot_type' => [ 'product' ],
				],
			]
		);

		$repeater->end_controls_tab();

		$repeater->start_controls_tab(
			'position_tab',
			[
				'label' => esc_html__( 'Position', 'authow' ),
			]
		);

		$repeater->add_responsive_control(
			'hotspot_position_horizontal',
			[
				'label'     => esc_html__( 'Horizontal position (%)', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 50,
				],
				'range'     => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}.goso-image-hotspot' => 'left: {{SIZE}}%;',
				],
			]
		);

		$repeater->add_responsive_control(
			'hotspot_position_vertical',
			[
				'label'     => esc_html__( 'Vertical position (%)', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 50,
				],
				'range'     => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}.goso-image-hotspot' => 'top: {{SIZE}}%;',
				],
			]
		);

		$repeater->end_controls_tab();

		$repeater->end_controls_tabs();

		/**
		 * Repeater settings
		 */
		$this->add_control(
			'items',
			[
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
					[
						'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
					],
				],
			]
		);

		$this->end_controls_section();

		/**
		 * Style tab.
		 */

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

		$this->add_control(
			'icon',
			[
				'label'   => esc_html__( 'Hotspot icon', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'default' => esc_html__( 'Style 1', 'authow' ),
					'alt'     => esc_html__( 'Style 2', 'authow' ),
				],
				'default' => 'default',
			]
		);

		$this->add_control(
			'action',
			[
				'label'       => esc_html__( 'Hotspot action', 'authow' ),
				'description' => esc_html__( 'Open hotspot content on click or hover', 'authow' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'hover' => esc_html__( 'Hover', 'authow' ),
					'click' => esc_html__( 'Click', 'authow' ),
				],
				'default'     => 'hover',
			]
		);

		$this->end_controls_section();

		/**
		 * Color settings.
		 */
		$this->start_controls_section(
			'general_color_section',
			[
				'label' => esc_html__( 'Color', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'item_hotspot_color', array(
				'label'     => __( 'Hotspot Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hotspot-icon-default .hotspot-btn:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .hotspot-icon-alt .hotspot-btn::after'    => 'color: {{VALUE}};',
				],
			)
		);

		$this->add_control(
			'item_hotspot_bg_color', array(
				'label'     => __( 'Hotspot Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hotspot-icon-default .hotspot-sonar' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .hotspot-icon-alt .hotspot-sonar'     => 'background-color: {{VALUE}};',
				],
			)
		);

		$this->add_control(
			'item_hotspot_shadow_color', array(
				'label'     => __( 'Hotspot Shadow Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .goso-image-hotspot' => 'box-shadow: 0 0 3px {{VALUE}};',
				],
			)
		);

		$this->add_control(
			'item_bg_color', array(
				'label'     => __( 'Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .hotspot-content' => 'background-color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'item_title_color', array(
				'label'     => __( 'Product Title Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .hotspot-content .goso-product-title a' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'item_title_hover_color', array(
				'label'     => __( 'Product Title Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .hotspot-content .goso-product-title a:hover' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'item_title_typo',
				'label'    => __( 'Product Title Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .hotspot-content .goso-product-title',
			)
		);

		$this->add_control(
			'item_title_price_color', array(
				'label'     => __( 'Product Price Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .hotspot-content .price' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'item_price_typo',
				'label'    => __( 'Product Price Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .hotspot-content .price',
			)
		);

		$this->add_control(
			'item_title_btn_bg_color', array(
				'label'     => __( 'Button Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .hotspot-content a.button' => 'background-color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'item_title_btn_bg_hover_color', array(
				'label'     => __( 'Button Background Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .hotspot-content a.button:hover' => 'background-color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'item_title_btn_txt_color', array(
				'label'     => __( 'Button Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .hotspot-content a.button' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'item_title_btn_txt_hv_color', array(
				'label'     => __( 'Button Text Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .hotspot-content a.button:hover' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'item_title_btn_typo',
				'label'    => __( 'Product Button Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .hotspot-content a.button',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$default_settings = [
			'image'  => '',
			'action' => 'hover',
			'icon'   => 'default',
			'items'  => [],
		];

		$settings     = wp_parse_args( $this->get_settings_for_display(), $default_settings );
		$image_output = '';

		$this->add_render_attribute(
			[
				'wrapper' => [
					'class' => [
						'goso-image-hotspot-wrapper',
						'hotspot-action-' . $settings['action'],
						'hotspot-icon-' . $settings['icon'],
					],
				],
			]
		);

		if ( isset( $settings['image']['id'] ) && $settings['image']['id'] ) {
			$image_url    = goso_get_image_url( $settings['image']['id'], 'image', $settings );
			$image_output = '<img class="goso-image-hotspot-img" src="' . esc_url( $image_url ) . '">';
		} elseif ( isset( $settings['image']['url'] ) ) {
			$image_output = '<img class="goso-image-hotspot-img" src="' . esc_url( $settings['image']['url'] ) . '">';
		}

		?>
        <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
            <div class="goso-image-hotspot-hotspots">
				<?php if ( $image_output ) : ?>
					<?php echo $image_output; // phpcs:ignore ?>
				<?php endif; ?>

				<?php foreach ( $settings['items'] as $index => $item ) : ?>
					<?php
					$default_settings = [
						'hotspot'               => '',
						'hotspot_type'          => 'product',
						'hotspot_dropdown_side' => 'left',
						'product_id'            => '',
						'title'                 => '',
						'link_text'             => '',
						'link'                  => '',
						'image'                 => '',
					];

					$settings   = wp_parse_args( $item, $default_settings );
					$attributes = '';
					$args       = [];

					if ( 'product' === $settings['hotspot_type'] && $settings['product_id'] ) {
						$product = wc_get_product( $settings['product_id'] );

						if ( ! $product ) {
							return;
						}

						$args = array(
							'class'      => implode(
								' ',
								array_filter(
									array(
										'button',
										'product_type_' . $product->get_type(),
										$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
										$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
									)
								)
							),
							'attributes' => wc_implode_html_attributes(
								array(
									'data-product_id' => $product->get_id(),
									'rel'             => 'nofollow',
								)
							),
						);

					}

					if ( 'text' === $settings['hotspot_type'] && ( $settings['title'] || $settings['content'] || $settings['link_text'] || isset( $settings['image']['id'] ) ) ) {
						$attributes   = goso_get_link_attrs( $settings['link'] );
						$image_output = '';

						if ( isset( $settings['image']['id'] ) && $settings['image']['id'] ) {
							$image_output = goso_get_image_html( $settings, 'image' );
						}
					}

					?>
                    <div class="woocommerce goso-image-hotspot hotspot-type-<?php echo esc_attr( $settings['hotspot_type'] ); ?> elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
                        <span class="hotspot-sonar"></span>
                        <div class="hotspot-btn goso-fill"></div>

						<?php if ( 'product' === $settings['hotspot_type'] && isset( $product ) && $product ) : ?>
                            <div class="hotspot-product hotspot-content hotspot-dropdown-<?php echo esc_attr( $settings['hotspot_dropdown_side'] ); ?>">
                                <div class="hotspot-content-image">
                                    <a href="<?php echo esc_url( get_permalink( $product->get_ID() ) ); ?>">
										<?php echo $product->get_image(); ?>
                                    </a>
                                </div>

                                <h4 class="goso-product-title">
                                    <a href="<?php echo esc_url( get_permalink( $product->get_ID() ) ); ?>">
										<?php echo esc_html( $product->get_title() ); ?>
                                    </a>
                                </h4>

								<?php if ( wc_review_ratings_enabled() ) : ?>
									<?php echo wc_get_rating_html( $product->get_average_rating(), $product->get_rating_count() ); ?>
								<?php endif; ?>

                                <div class="price">
									<?php echo $product->get_price_html(); ?>
                                </div>

                                <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>"
                                   class="<?php echo esc_attr( $args['class'] ); ?>" <?php echo $args['attributes']; ?>>
									<?php echo esc_html( $product->add_to_cart_text() ); ?>
                                </a>
                            </div>
						<?php else : ?>
                            <div class="hotspot-text hotspot-content hotspot-dropdown-<?php echo esc_attr( $settings['hotspot_dropdown_side'] ); ?>">
                                <div class="hotspot-content-image">
									<?php echo $image_output; ?>
                                </div>

                                <h4 class="goso-product-title">
									<?php echo esc_html( $settings['title'] ); ?>
                                </h4>

                                <div class="hotspot-content-text set-cont-mb-s reset-last-child">
									<?php echo esc_html( $settings['content'] ); ?>
                                </div>

                                <a class="btn btn-color-primary btn-size-small" <?php echo $attributes; ?>>
									<?php echo esc_html( $settings['link_text'] ); ?>
                                </a>
                            </div>
						<?php endif; ?>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
		<?php
	}
}
