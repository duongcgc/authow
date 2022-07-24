<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW\Customizer;

/**
 * Class Theme Authow Customizer
 */
class WooCommerceOption extends CustomizerOptionAbstract {

	public $panelID = 'woocommerce';

	public function set_option() {
		$this->set_section();
	}

	public function set_section() {
		$this->add_lazy_section( 'pencidesign_new_section_woocommerce_section', esc_html__( 'General', 'authow' ), $this->panelID, 'You can check <a href="https://authow.pencidesign.net/authow-document/#create_store" target="_blank">this guide</a> to know how to configure your online store.' );
		$this->add_lazy_section( 'pencidesign_woo_product_catalog_section', esc_html__( 'Shop Settings', 'authow' ), $this->panelID, 'You can check <a href="https://authow.pencidesign.net/authow-document/#create_store" target="_blank">this guide</a> to know how to configure your online store.' );
		$this->add_lazy_section( 'pencidesign_woo_wishlist_settings_section', esc_html__( 'Product Wishlist', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'pencidesign_woo_compare_settings_section', esc_html__( 'Product Compare', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'pencidesign_woo_quickview_settings_section', esc_html__( 'Product Quickview', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'pencidesign_woo_label_settings_section', esc_html__( 'Product Label', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'pencidesign_woo_brand_settings_section', esc_html__( 'Product Brands', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'pencidesign_woo_single_settings_section', esc_html__( 'Single Product', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'pencidesign_woo_cart_page_section', esc_html__( 'Cart Page', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'pencidesign_woo_ordercompleted_page_section', esc_html__( 'Order Completed Page', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'pencidesign_woo_mobile_settings_section', esc_html__( 'Mobile Settings', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'pencidesign_woo_toast_notify_section', esc_html__( 'Toast Notification', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'pencidesign_woo_filter_sidebar_section', esc_html__( 'Sidebar Filter', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'pencidesign_woo_typo_settings_section', esc_html__( 'Font Size', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'pencidesign_woo_colors_settings_section', esc_html__( 'Colors', 'authow' ), $this->panelID );
	}
}
