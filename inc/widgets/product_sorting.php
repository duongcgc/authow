<?php
/**
 * Widget sort by
 *
 */

if ( ! class_exists( 'Goso_Widget_Sorting' ) ) {
	class Goso_Widget_Sorting extends WPH_Widget {

		function __construct() {
			if ( ! function_exists( 'wc_get_attribute_taxonomies' ) ) {
				return;
			}

			// Configure widget array
			$args = array(
				// Widget Backend label
				'label'       => goso_get_theme_name('.Authow',true).esc_html__( 'WooCommerce Sort by', 'authow' ),
				// Widget Backend Description
				'description' => esc_html__( 'Sort products by name, price, popularity etc.', 'authow' ),
				'slug'        => 'authow-woocommerce-sort-by',
			);

			// Configure the widget fields

			// fields array
			$args['fields'] = array(
				array(
					'id'   => 'title',
					'type' => 'text',
					'std'  => esc_html__( 'Sort by', 'authow' ),
					'name' => esc_html__( 'Title', 'authow' )
				),
			);

			// create widget
			$this->create_widget( $args );
		}

		// Output function
		// Based on woo widget @version  2.3.0
		function widget( $args, $instance ) {
			global $wp_query;

			if ( ! woocommerce_products_will_display() ) {
				return;
			}

			$orderby                 = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
			$show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
			$catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
				'menu_order' => esc_html__( 'Default', 'authow' ),
				'popularity' => esc_html__( 'Popularity', 'authow' ),
				'rating'     => esc_html__( 'Average rating', 'authow' ),
				'date'       => esc_html__( 'Newness', 'authow' ),
				'price'      => esc_html__( 'Price: low to high', 'authow' ),
				'price-desc' => esc_html__( 'Price: high to low', 'authow' )
			) );

			if ( ! $show_default_orderby ) {
				unset( $catalog_orderby_options['menu_order'] );
			}

			if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
				unset( $catalog_orderby_options['rating'] );
			}

			echo wp_kses_post( $args['before_widget'] );

			if ( $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance ) ) {
				echo wp_kses_post( $args['before_title'] ) . $title . wp_kses_post( $args['after_title'] );
			}

			wc_get_template( 'loop/orderby.php', array(
				'catalog_orderby_options' => $catalog_orderby_options,
				'orderby'                 => $orderby,
				'show_default_orderby'    => $show_default_orderby,
				'list'                    => true
			) );

			echo wp_kses_post( $args['after_widget'] );
		}

		function form( $instance ) {
			parent::form( $instance );
		}

	} // class
	add_action( 'widgets_init', function () {
		register_widget( 'Goso_Widget_Sorting' );
	} );
}
