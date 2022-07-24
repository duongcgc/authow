<?php

namespace GosoAuthowElementor;

use GosoAuthowElementor\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

final class Manager {
	/**
	 * @var Module_Base
	 */
	private $modules = array();
	private $column_order = 1;

	public function __construct() {

		// Register controls
		$modules = array(
			'goso-sticky',
			'query-control',
			'goso-big-grid',
			'goso-featured-sliders',
			'goso-latest-posts',
			'goso-featured-cat',
			'goso-small-list',
			'goso-custom-sliders',
			'goso-popular-posts',
			'goso-portfolio',
			'goso-featured-boxes',
			'goso-fullwidth-hero-overlay',
			'goso-news-ticker',
			'goso-media-carousel',
			'goso-about-me',
			'goso-button',
			'goso-button-popup',
			'goso-posts-slider',
			'goso-recent-posts',
			'goso-instagram',
			'goso-pintersest',
			'goso-social-media',
			'goso-block-heading-title',

			'goso-facebook-page',
			'goso-count-down',
			'goso-counter-up',
			'goso-fancy-heading',
			'goso-map',
			'goso-info-box',
			'goso-image-gallery',
			'goso-latest-tweets',
			'goso-mail-chimp',
			'goso-open-hour',
			'goso-popular-cat',
			'goso-text-block',
			'goso-pricing-table',
			'goso-progress-bar',
			'goso-social-counter',
			'goso-team-member',
			'goso-video-playlist',
			'goso-weather',
			'goso-testimonials',
			'goso-login-form',
			'goso-sidebar',
			'goso-advanced-list',
			'goso-simple-list',
			'goso-footer-navmenu',
			'goso-tiktok-embed-feed',
			'goso-advanced-categories',
			'goso-author-list',
			'goso-search-form',
			'goso-posts-tabs',
			'goso-snapchat',
			'goso-comments-list',
		);

		if ( class_exists( 'WooCommerce' ) ) {
			$woocommerce_modules = array(
				'goso-product',
				'goso-product-brand',
				'goso-product-filter',
				'goso-product-categories-grid',
				'goso-product-tabs',
				'goso-product-hotspot',
				'goso-product-list',
			);
			foreach ( $woocommerce_modules as $module ) {
				$modules[] = $module;
			}
		}

		foreach ( $modules as $module_name ) {
			$class_name = str_replace( '-', ' ', $module_name );
			$class_name = str_replace( ' ', '', ucwords( $class_name ) );
			$class_name = __NAMESPACE__ . '\\Modules\\' . $class_name . '\Module';

			if ( $class_name::is_active() ) {
				$this->modules[ $module_name ] = $class_name::instance();
			}
		}

		$this->add_actions();
	}

	/**
	 * Add sticky class for sticky content and sticky sidebar
	 */
	protected function add_actions() {
		add_action( 'elementor/frontend/column/before_render', array( $this, 'add_column_attribute' ) );
		add_action( 'elementor/frontend/section/before_render', array( $this, 'add_section_attribute' ) );

		add_action( 'elementor/frontend/column/after_add_attributes', array( $this, 'add_column_attribute' ) );
		add_action( 'elementor/frontend/section/after_add_attributes', array( $this, 'add_section_attribute' ) );
	}


	/**
	 * @param string $module_name
	 *
	 * @return Module_Base|Module_Base[]
	 */
	public function get_modules( $module_name ) {
		if ( $module_name ) {
			if ( isset( $this->modules[ $module_name ] ) ) {
				return $this->modules[ $module_name ];
			}

			return null;
		}

		return $this->modules;
	}

	public function add_column_attribute( $element ) {
		$settings = $element->get_settings();

		$current_column_order = $this->column_order;
		$element->add_render_attribute( array(
			'_inner_wrapper' => array( 'class' => 'theiaStickySidebar' ),
			'_wrapper'       => array(
				'class' => array(
					'goso-ercol-' . $settings['_column_size'],
					'goso-ercol-order-' . $current_column_order,
					in_array( $settings['_column_size'], array( 33, 25 ) ) ? 'goso-sticky-sb' : 'goso-sticky-ct',
					in_array( $settings['_column_size'], array( 33, 25 ) ) ? 'goso-sidebarSC' : ''
				)
			)
		) );

		$this->column_order = $current_column_order + 1;
	}

	public function add_section_attribute( $element ) {
		$settings = $element->get_settings();

		$enable_sticky       = isset( $settings['goso_enable_sticky'] ) ? $settings['goso_enable_sticky'] : false;
		$enable_repons_twosb = isset( $settings['goso_enable_repons_section'] ) ? $settings['goso_enable_repons_section'] : false;
		$ctsidebar_mb        = isset( $settings['goso_ctsidebar_mb'] ) ? $settings['goso_ctsidebar_mb'] : 'con_sb2_sb1';
		$structure           = isset( $settings['structure'] ) ? $settings['structure'] : '';

		$this->column_order = 1;

		$class = 'goso-section';

		if ( ! $enable_sticky ) {
			$class .= ' goso-disSticky';
		} else {
			$class .= ' goso-enSticky';
		}

		if ( $enable_repons_twosb ) {
			$class .= ' goso-repons-elsection';

			$class .= ' goso-' . $ctsidebar_mb;
		}

		if ( $structure ) {
			$class .= ' goso-structure-' . $structure;
		}

		$element->add_render_attribute( '_wrapper', array(
			'class' => $class,
		) );
	}

}
