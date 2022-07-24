<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW;

/**
 * Class Theme Authow Customizer
 */
class Customizer {
	/**
	 * @var Customizer
	 */
	private static $instance;

	/**
	 * Package name
	 *
	 * @var string
	 */
	private static $package = 'Authow';

	/**
	 * @var Customizer
	 */
	private $customizer = null;

	/**
	 * Section of Customizer
	 */
	private $list_section = array(
		'goso_ageverify_section',
		'goso_menu_hbg_section',
		'goso_menu_hbg_widgets_section',
		'goso_popup_section_display_section',
		'goso_popup_section_general_section',
		'goso_popup_section_styles_section',
		'goso_section_footer_colors_section',
		'goso_section_footer_general_section',
		'goso_section_footer_instagram_section',
		'goso_section_footer_signupform_section',
		'goso_section_footer_widgets_section',
		'goso_section_fslider_colors_section',
		'goso_section_fslider_fsize_section',
		'goso_section_fslider_general_section',
		'goso_section_header_signupform_section',
		'goso_section_homepage_colors_section',
		'goso_section_homepage_featured_boxes_section',
		'goso_section_homepage_featured_cat_section',
		'goso_section_homepage_fontsize_section',
		'goso_section_homepage_general_section',
		'goso_section_homepage_popular_posts_section',
		'goso_section_homepage_title_box_section',
		'goso_section_layout_colors_section',
		'goso_section_layout_fontsize_section',
		'goso_section_layout_rowsgap_section',
		'goso_section_other_layouts_section',
		'goso_section_sidebar_colors_section',
		'goso_section_sidebar_fsize_section',
		'goso_section_sidebar_general_section',
		'goso_section_spage_404_section',
		'goso_section_spage_colors_section',
		'goso_section_spage_general_section',
		'goso_section_spage_header_section',
		'goso_section_speed_css_section',
		'goso_section_speed_general_section',
		'goso_section_speed_html_section',
		'goso_section_speed_javascript_section',
		'goso_section_spost_colors_section',
		'goso_section_spost_fontsize_section',
		'goso_section_spost_general_section',
		'goso_section_spost_inline_reposts_section',
		'goso_section_spost_related_posts_section',
		'goso_section_standard_classic_section',
		'gosodesign_general_archive_page_section',
		'gosodesign_general_body_boxed_section',
		'gosodesign_general_colors_section',
		'gosodesign_general_extra_section',
		'gosodesign_general_gdpr_section',
		'gosodesign_general_image_sizes_section',
		'gosodesign_general_schema_markup_section',
		'gosodesign_general_search_page_section',
		'gosodesign_general_social_sharing_section',
		'gosodesign_general_typography_section',
		'gosodesign_logo_header_category_megamenu_section',
		'gosodesign_logo_header_colors',
		'gosodesign_logo_header_colors_section',
		'gosodesign_logo_header_colors_trans',
		'gosodesign_logo_header_general_section',
		'gosodesign_logo_header_logo_section',
		'gosodesign_logo_header_primary_menu_section',
		'gosodesign_logo_header_verticalnav_section',
		'gosodesign_new_section_custom_css_section',
		'gosodesign_new_section_general_section',
		'gosodesign_new_section_social_section',
		'gosodesign_new_section_topbar_section',
		'gosodesign_new_section_transition_lang_section',
		'gosodesign_new_section_woocommerce_section',
		'gosodesign_portfolio_sadvanced_section',
		'gosodesign_portfolio_scolor_section',
		'gosodesign_portfolio_sfontsize_section',
		'gosodesign_portfolio_sgeneral_section',
		'gosodesign_section_fvideo_colors_section',
		'gosodesign_section_fvideo_general_section',
		'gosodesign_topbar_section_colors_section',
		'gosodesign_topbar_section_fontsize_section',
		'goso_section_spost_comments_section',
		'goso_section_spost_autoload_section',
		'goso_menu_hbg_colors_section',
		'gosodesign_logo_header_slogan_section',
		'gosodesign_logo_header_colors_trans_section',
		'goso_builder_general_section',
		'goso_footer_builder_config_section',
		'gosodesign_toc_general_section',
		'gosodesign_toc_styles_section',
	);

	/**
	 * Construct
	 */
	private function __construct() {
		// Need to load Customizer early for this kind of request.
		if ( isset( $_REQUEST['action'] ) && 'goso_fw_customizer_disable_panel' === $_REQUEST['action'] ) {
			$this->customizer = goso_fw_customizer();
		}

		if ( class_exists( 'woocommerce' ) ) {
			$woocommerce_section = [
				'gosodesign_woo_brand_settings_section',
				'gosodesign_woo_cart_page_section',
				'gosodesign_woo_colors_settings_section',
				'gosodesign_woo_compare_settings_section',
				'gosodesign_woo_filter_sidebar_section',
				'gosodesign_woo_label_settings_section',
				'gosodesign_woo_mobile_settings_section',
				'gosodesign_woo_ordercompleted_page_section',
				'gosodesign_woo_quickview_settings_section',
				'gosodesign_woo_section_transition_lang_section',
				'gosodesign_woo_single_settings_section',
				'gosodesign_woo_toast_notify_section',
				'gosodesign_woo_typo_settings_section',
				'gosodesign_woo_wishlist_settings_section',
				'gosodesign_woo_product_catalog_section',
				'woocommerce_checkout_section',
				'woocommerce_product_catalog_section',
			];
			$this->list_section  = array_merge( $this->list_section, $woocommerce_section );
		}

		if ( is_customize_preview() || ! is_admin() ) {
			add_filter( 'authow_fw_customizer_get_lazy_options', array( $this, 'prepare_lazy_option' ) );
			add_filter( 'authow_fw_register_lazy_section', array( $this, 'register_lazy_section' ) );
			add_action( 'authow_fw_register_customizer_option', array( $this, 'load_customizer' ), 91 );
			add_filter( 'authow_fw_customizer_add_field', array( $this, 'prepare_add_section' ) );
		}
	}

	/**
	 * @return Customizer
	 */
	public static function getInstance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	public function prepare_lazy_option( $options ) {
		if ( is_array( $options ) ) {
			foreach ( $options as &$option ) {
				if ( isset( $option['type'] ) ) {
					//$option['type'] = str_replace( 'authow-fw-', 'authow-', $option['type'] );
				}
			}
		}

		return $options;
	}

	public function register_lazy_section( $result ) {
		$array = $this->list_section;

		$path = get_template_directory() . '/inc/customizer/config/sections/';

		foreach ( $array as $id ) {
			$result[ $id ][] = "{$path}{$id}.php";
		}

		return $result;
	}

	public function load_customizer() {
		$this->customizer = Customizer\Customizer::get_instance();
		new Customizer\GeneralOption( $this->customizer, 1 );
		new Customizer\TopbarOption( $this->customizer, 2 );
		new Customizer\LogoHeaderOption( $this->customizer, 3 );
		new Customizer\VerticalNavHamburgeOption( $this->customizer, 4 );
		new Customizer\HomepageOption( $this->customizer, 5 );
		new Customizer\FeaturedSliderOption( $this->customizer, 6 );
		new Customizer\FeaturedVideoOption( $this->customizer, 7 );
		new Customizer\PostLayoutOption( $this->customizer, 8 );
		new Customizer\SidebarOption( $this->customizer, 9 );
		new Customizer\SinglePostOption( $this->customizer, 10 );
		new Customizer\TocOptions( $this->customizer, 10 );
		new Customizer\PagesOption( $this->customizer, 11 );
		new Customizer\FooterOption( $this->customizer, 12 );
		new Customizer\PopupOption( $this->customizer, 12 );
		new Customizer\SocialMediaOption( $this->customizer, 13 );
		new Customizer\CustomCSSOption( $this->customizer, 14 );
		new Customizer\PortfolioOption( $this->customizer, 15 );
		new Customizer\TextTranslationOption( $this->customizer, 16 );
		new Customizer\SpeedOptimizationOption( $this->customizer, 17 );

		if ( class_exists( 'WooCommerce' ) ) {
			new Customizer\WooCommerceOption( $this->customizer, 17 );
			new Customizer\WooTranslationOption( $this->customizer, 200 );
		}

	}
}
