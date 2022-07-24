<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW\Customizer;

/**
 * Class Theme Authow Customizer
 */
class VerticalNavHamburgeOption extends CustomizerOptionAbstract {

	public $panelID = 'goso_vernav_hamburger_panel';

	public function set_option() {
		$this->set_panel();
		$this->set_section();
	}

	public function set_panel() {
		$this->customizer->add_panel( [
			'id'          => $this->panelID,
			'title'       => esc_html__( 'Vertical Navigation & Hamburger Menu', 'authow' ),
			'description' => __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/vertical-navigation.png">this image</a> to know what is Vertical Navigation and <a target="_blank" href="https://imgresources.s3.amazonaws.com/hamburger.png">this image</a> to know what is Hamburger Menu.<br>Most of the options here applies for both Vertical Navigation & Hamburger Menu. When you enable Vertical Navigation - of course, the Hamburger Menu will does not display.', 'authow' ),
			'priority'    => $this->id,
		] );
	}

	public function set_section() {
		$this->add_lazy_section( 'goso_menu_hbg_section', esc_html__( 'General', 'authow' ), $this->panelID, __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/vertical-navigation.png">this image</a> to know what is Vertical Navigation and <a target="_blank" href="https://imgresources.s3.amazonaws.com/hamburger.png">this image</a> to know what is Hamburger Menu.<br>Most of the options here applies for both Vertical Navigation & Hamburger Menu. When you enable Vertical Navigation - of course, the Hamburger Menu will does not display.', 'authow' ) );
		$this->add_lazy_section( 'goso_menu_hbg_widgets_section', esc_html__( 'Widgets', 'authow' ), $this->panelID, __( 'When you use Vertical Navigation or Hamburger Menu, you can add widgets display above or below the menu like on <a target="_blank" href="https://imgresources.s3.amazonaws.com/hamburger-widgets.png">this image</a> via Appearance > Widgets > drag & drop widgets on the left side to "Sidebar Hamburger Widgets Above Menu" and "Sidebar Hamburger Widgets Below Menu" - check <a target="_blank" href="https://imgresources.s3.amazonaws.com/hamburger-widgets2.png">this image</a>.', 'authow' ) );
		$this->add_lazy_section( 'goso_menu_hbg_colors_section', esc_html__( 'Colors', 'authow' ), $this->panelID );
	}
}
