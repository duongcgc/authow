<?php

namespace GosoAuthowElementor\Modules\GosoProductCategories\Widgets;

use Elementor\Controls_Manager;
use GosoAuthowElementor\Base\Base_Widget;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

/**
 * Elementor widget that inserts an embeddable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class GosoProductCategories extends Base_Widget {
	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'goso_product_categories';
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
		return goso_get_theme_name('Goso').' '.esc_html__( ' Product Categories', 'authow' );
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
		return 'eicon-product-categories';
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
			'number',
			[
				'label'       => esc_html__( 'Number', 'authow' ),
				'description' => esc_html__( 'Enter the number of categories to display for this element.', 'authow' ),
				'type'        => Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'   => esc_html__( 'Order by', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''           => '',
					'id'         => esc_html__( 'ID', 'authow' ),
					'date'       => esc_html__( 'Date', 'authow' ),
					'title'      => esc_html__( 'Title', 'authow' ),
					'menu_order' => esc_html__( 'Menu order', 'authow' ),
					'modified'   => esc_html__( 'Last modified date', 'authow' ),
				),
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => esc_html__( 'Sort order', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''     => esc_html__( 'Inherit', 'authow' ),
					'DESC' => esc_html__( 'Descending', 'authow' ),
					'ASC'  => esc_html__( 'Ascending', 'authow' ),
				),
			]
		);

		$this->add_control(
			'ids',
			[
				'label'       => esc_html__( 'Categories', 'authow' ),
				'description' => esc_html__( 'List of product categories.', 'authow' ),
				'type'        => 'goso_el_autocomplete',
				'search'      => 'goso_get_taxonomies_by_query',
				'render'      => 'goso_get_taxonomies_title_by_id',
				'taxonomy'    => 'product_cat',
				'multiple'    => true,
				'label_block' => true,
			]
		);

		$this->add_control(
			'hide_empty',
			[
				'label'        => esc_html__( 'Hide empty', 'authow' ),
				'description'  => esc_html__( 'Don’t display categories that don’t have any products assigned.', 'authow' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'label_on'     => esc_html__( 'Yes', 'authow' ),
				'label_off'    => esc_html__( 'No', 'authow' ),
				'return_value' => 'yes',
			]
		);

		$this->end_controls_section();

		/**
		 * Title settings.
		 */

		$this->register_block_title_section_controls();

		/**
		 * Style tab.
		 */

		/**
		 * Design settings.
		 */
		$this->start_controls_section(
			'design_style_section',
			[
				'label' => esc_html__( 'Design', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'categories_design',
			[
				'label'       => esc_html__( 'Categories design', 'authow' ),
				'description' => esc_html__( 'Overrides option from Appearance -> WooCommerce', 'authow' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'default',
				'options'     => array(
					''        => esc_html__( 'Default Theme Style', 'authow' ),
					'default' => esc_html__( 'Style 1', 'authow' ),
					'style-2' => esc_html__( 'Style 2', 'authow' ),
					'style-3' => esc_html__( 'Style 3', 'authow' ),
					'style-4' => esc_html__( 'Style 4', 'authow' ),
					'style-5' => esc_html__( 'Style 5', 'authow' ),
				),
			]
		);

		$this->end_controls_section();

		/**
		 * Layout settings.
		 */
		$this->start_controls_section(
			'layout_style_section',
			[
				'label' => esc_html__( 'Layout', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'style',
			[
				'label'       => esc_html__( 'Layout', 'authow' ),
				'description' => esc_html__( 'Try out our creative styles for categories block.', 'authow' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'default',
				'options'     => array(
					'default'  => esc_html__( 'Default', 'authow' ),
					'grid-1'   => esc_html__( 'Grid 1', 'authow' ),
					'grid-2'   => esc_html__( 'Grid 2', 'authow' ),
					'grid-3'   => esc_html__( 'Grid 3', 'authow' ),
					'grid-4'   => esc_html__( 'Grid 4', 'authow' ),
					'grid-5'   => esc_html__( 'Grid 5', 'authow' ),
					'carousel' => esc_html__( 'Carousel', 'authow' ),
				),
			]
		);

		$this->add_control(
			'columns',
			[
				'label'       => esc_html__( 'Columns', 'authow' ),
				'description' => esc_html__( 'Number of columns in the grid.', 'authow' ),
				'type'        => Controls_Manager::SLIDER,
				'default'     => [
					'size' => 4,
				],
				'size_units'  => '',
				'range'       => [
					'px' => [
						'min'  => 1,
						'max'  => 6,
						'step' => 1,
					],
				],
				'condition'   => [
					'style' => [ 'masonry', 'default' ],
				],
			]
		);

		$this->add_control(
			'spacing',
			[
				'label'   => esc_html__( 'Space between', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'no-spacing' => esc_html__( 'No Spacing', 'authow' ),
					'small'      => esc_html__( 'Small', 'authow' ),
					'medium'     => esc_html__( 'Medium', 'authow' ),
					'large'      => esc_html__( 'Large', 'authow' ),
				],
				'default' => 'no-spacing',
			]
		);

		$this->end_controls_section();

		$this->register_block_title_style_section_controls();

		/**
		 * Carousel settings.
		 */
		$this->start_controls_section(
			'carousel_style_section',
			[
				'label'     => esc_html__( 'Carousel', 'authow' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'style' => [ 'carousel' ],
				],
			]
		);

		$this->add_control(
			'slides_per_view',
			[
				'label'       => esc_html__( 'Slides per view', 'authow' ),
				'description' => esc_html__( 'Set numbers of slides you want to display at the same time on slider\'s container for carousel mode.', 'authow' ),
				'type'        => Controls_Manager::SLIDER,
				'default'     => [
					'size' => 3,
				],
				'size_units'  => '',
				'range'       => [
					'px' => [
						'min'  => 1,
						'max'  => 8,
						'step' => 1,
					],
				],
			]
		);

		$this->add_control(
			'hide_pagination_control',
			[
				'label'        => esc_html__( 'Hide pagination control', 'authow' ),
				'description'  => esc_html__( 'If "YES" pagination control will be removed.', 'authow' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
				'label_on'     => esc_html__( 'Yes', 'authow' ),
				'label_off'    => esc_html__( 'No', 'authow' ),
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'hide_prev_next_buttons',
			[
				'label'        => esc_html__( 'Hide prev/next buttons', 'authow' ),
				'description'  => esc_html__( 'If "YES" prev/next control will be removed', 'authow' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
				'label_on'     => esc_html__( 'Yes', 'authow' ),
				'label_off'    => esc_html__( 'No', 'authow' ),
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'wrap',
			[
				'label'        => esc_html__( 'Slider loop', 'authow' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
				'label_on'     => esc_html__( 'Yes', 'authow' ),
				'label_off'    => esc_html__( 'No', 'authow' ),
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'        => esc_html__( 'Slider autoplay', 'authow' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
				'label_on'     => esc_html__( 'Yes', 'authow' ),
				'label_off'    => esc_html__( 'No', 'authow' ),
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'speed',
			[
				'label'       => esc_html__( 'Slider speed', 'authow' ),
				'description' => esc_html__( 'Duration of animation between slides (in ms)', 'authow' ),
				'default'     => '5000',
				'type'        => Controls_Manager::NUMBER,
				'condition'   => [
					'autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'scroll_carousel_init',
			[
				'label'        => esc_html__( 'Init carousel on scroll', 'authow' ),
				'description'  => esc_html__( 'This option allows you to init carousel script only when visitor scroll the page to the slider. Useful for performance optimization.', 'authow' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
				'label_on'     => esc_html__( 'Yes', 'authow' ),
				'label_off'    => esc_html__( 'No', 'authow' ),
				'return_value' => 'yes',
			]
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
			// Query.
			'number'                  => null,
			'orderby'                 => '',
			'order'                   => 'ASC',
			'ids'                     => '',

			// Layout.
			'columns'                 => '4',
			'hide_empty'              => 'yes',
			'style'                   => 'default',

			// Design.
			'categories_design'       => get_theme_mod( 'goso_woocommerce_product_cat_style', 'style-1' ),

			// Extra.
			'slides_per_view'         => 3,
			'hide_pagination_control' => 'no',
			'hide_prev_next_buttons'  => 'no',
			'wrap'                    => 'no',
			'autoplay'                => 'no',
			'speed'                   => '500',
			'scroll_carousel_init'    => 'no',
			'custom_sizes'            => false,
		];

		$settings = wp_parse_args( $this->get_settings_for_display(), $default_settings );

		if ( ! $settings['spacing'] ) {
			$settings['spacing'] = get_theme_mod( 'goso-products_spacing' );
		}

		// Query.
		$query_args = array(
			'taxonomy'   => 'product_cat',
			'order'      => $settings['order'],
			'hide_empty' => 'yes' === $settings['hide_empty'],
			'include'    => $settings['ids'],
			'pad_counts' => true,
			'number'     => $settings['number'],
		);

		if ( $settings['orderby'] ) {
			$query_args['orderby'] = $settings['orderby'];
		}

		$categories = get_terms( $query_args );


		$settings['columns'] = isset( $settings['columns']['size'] ) ? $settings['columns']['size'] : 4;

		$columns = 'default' == $settings['style'] ? $settings['columns'] : 1;

		$style_class = ( 'default' == $settings['style'] || 'carousel' == $settings['style'] ) ? 'normal-grid' : 'goso-cat-grid';

		$loop_by_class = array(
			'default'  => 1,
			'carousel' => 1,
			'grid-1'   => 5,
			'grid-2'   => 6,
			'grid-3'   => 6,
			'grid-4'   => 5,
			'grid-5'   => 6,
			'grid-6'   => 6,
		);

		wc_set_loop_prop( 'loop_by', $loop_by_class[ $settings['style'] ] );
		wc_set_loop_prop( 'total', count( $categories ) );
		wc_set_loop_prop( 'products_columns', $columns );
		wc_set_loop_prop( 'product_categories_style', $settings['style'] );
		wc_set_loop_prop( 'cat-loop-style', $settings['categories_design'] );
		wc_set_loop_prop( 'elementor', true );

		$carousel_id = 'goso_categories_' . rand( 1000, 9999 );

		if ( 'carousel' === $settings['style'] ) {
			$settings['scroll_per_page'] = 'yes';
			$settings['carousel_id']     = $carousel_id;

			$this->add_render_attribute( 'wrapper', 'class', 'goso-owl-carousel goso-owl-carousel-slider ' );
			$this->add_render_attribute( 'wrapper', 'data-item', isset( $settings['slides_per_view']['size'] ) ? $settings['slides_per_view']['size'] : 3 );
			$this->add_render_attribute( 'wrapper', 'data-desktop', isset( $settings['slides_per_view']['size'] ) ? $settings['slides_per_view']['size'] : 3 );
			$this->add_render_attribute( 'wrapper', 'data-dots', $settings['hide_pagination_control'] );
			$this->add_render_attribute( 'wrapper', 'data-nav', $settings['hide_prev_next_buttons'] );
			$this->add_render_attribute( 'wrapper', 'data-loop', $settings['wrap'] );
			$this->add_render_attribute( 'wrapper', 'data-auto', $settings['autoplay'] );
			$this->add_render_attribute( 'wrapper', 'data-speed', $settings['speed'] );
			$this->add_render_attribute( 'wrapper', 'data-margin', 30 );
			$this->add_render_attribute( 'wrapper', 'data-lazy', $settings['scroll_carousel_init'] );

			if ( 'yes' === $settings['scroll_carousel_init'] ) {
				$this->add_render_attribute( 'wrapper', 'class', 'scroll-init' );
			}

			if ( get_theme_mod( 'goso_disable_owl_mobile_devices' ) ) {
				$this->add_render_attribute( 'wrapper', 'class', 'disable-owl-mobile' );
			}
		}

		// Wrapper classes.
		$this->add_render_attribute(
			[
				'wrapper' => [
					'class' => [
						'products',
						'woocommerce',
						'columns-' . $columns,
						'categories-style-' . $settings['style'],
						'grid-spacing-' . $settings['spacing'],
						$style_class,
					],
				],
			]
		);
		if ( $categories ) :
			?>
            <div class="woocommerce goso-product-categories">
				<?php $this->markup_block_title( $this->get_settings(), $this ); ?>
                <ul <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
					<?php if ( ! in_array( $settings['style'], array( 'default', 'carousel' ) ) )  { ?>
                    <ul>
						<?php } ?>
						<?php foreach ( $categories as $category ) : ?>
							<?php
							wc_get_template(
								'content-product-cat.php',
								array(
									'category' => $category,
								)
							);
							?>
						<?php endforeach; ?>
						<?php if ( ! in_array( $settings['style'], array( 'default', 'carousel' ) ) )  { ?>
                    </ul>
				<?php } ?>
                </ul>
            </div>
		<?php endif;
		wc_reset_loop();
	}
}
