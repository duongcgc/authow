<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW\Customizer;

/**
 * Class Theme Authow Customizer
 */
class LogoHeaderOption extends CustomizerOptionAbstract {

	public $panelID = 'goso_logoheader_panel';

	public function set_option() {
		$this->set_panel();
		$this->set_section();
	}

	public function set_panel() {
		$this->customizer->add_panel( [
			'id'       => $this->panelID,
			'title'    => esc_html__( 'Logo & Header', 'authow' ),
			'priority' => $this->id,
		] );
	}

	public function set_section() {
		$this->add_lazy_section( 'goso_builder_general_section', esc_html__( 'Header Builder', 'authow' ), $this->panelID, __( 'You can add new and edit a header builder on <a target="_blank" href="' . esc_url( admin_url( '/edit.php?post_type=goso_builder' ) ) . '">this page</a>.<br>Please check <a href="https://www.youtube.com/watch?v=kUFqsVYyJig&list=PL1PBMejQ2VTwp9ppl8lTQ9Tq7I3FJTT04&index=4" target="_blank">this video tutorial</a> to know how to setup your header builder.', 'authow' ) );
		$this->add_lazy_section( 'gosodesign_logo_header_general_section', esc_html__( 'General', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_logo_header_logo_section', esc_html__( 'Logo', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_logo_header_slogan_section', esc_html__( 'Slogan Text', 'authow' ), $this->panelID, __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/slogan-text.png">this image</a> to know what is Slogan text. Note that slogan text does not supports on some header styles', 'authow' ) );
		$this->add_lazy_section( 'gosodesign_logo_header_primary_menu_section', esc_html__( 'Main Bar & Primary Menu', 'authow' ), $this->panelID, __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/mainbar-primary.png">this image</a> to know what is "Main Bar" and "Primary Menu"', 'authow' ) );
		$this->add_lazy_section( 'gosodesign_logo_header_category_megamenu_section', esc_html__( 'Category Mega Menu', 'authow' ), $this->panelID, __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/category-mega-menu.png">this image</a> to know what is Category Mega Menu. To config a category mega menu, please check <a target="_blank" href="https://authow.gosodesign.net/authow-document/#menu">this guide</a>', 'authow' ) );
		$this->add_lazy_section( 'goso_section_header_signupform_section', esc_html__( 'Header SignUp Form', 'authow' ), $this->panelID, __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/header-signup-form.png">this image</a> to know where is "Header Sign-Up Form".<br>To config Header SignUp Form, please use the HTML markup like we said on the documentation <a target="_blank" href="https://authow.gosodesign.net/authow-document/#setup_mailchimp">here</a>, after that go to <strong>Appearance > Widgets > drag & drop widget "Mailchimp Sign-Up Form" to "Header Sign-Up Form"</strong> - check <a target="_blank" href="https://imgresources.s3.amazonaws.com/header-signup-form-widget.png">this image</a>.<br>If you use Elementor or WPBakery Page Builder to config your page, you can use element "Goso Mailchimp" to get it display.', 'authow' ) );
		$this->add_lazy_section( 'gosodesign_logo_header_verticalnav_section', esc_html__( 'Vertical Mobile Navigation', 'authow' ), $this->panelID, __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/vertical-mobile-navigation.png">this image</a> to know what is Vertical Mobile Navigation.', 'authow' ) );
		$this->add_lazy_section( 'gosodesign_logo_header_colors_section', esc_html__( 'Colors', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_logo_header_colors_trans_section', esc_html__( 'Colors for Transparent Header', 'authow' ), $this->panelID );
	}
}
