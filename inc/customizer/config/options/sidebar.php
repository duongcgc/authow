<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW\Customizer;

/**
 * Class Theme Authow Customizer
 */
class SidebarOption extends CustomizerOptionAbstract {

	public $panelID = 'goso_sidebar_panel';

	public function set_option() {
		$this->set_panel();
		$this->set_section();
	}

	public function set_panel() {
		$this->customizer->add_panel( [
			'id'       => $this->panelID,
			'title'    => esc_html__( 'Sidebar', 'authow' ),
			'priority' => $this->id,
		] );
	}

	public function set_section() {
		$this->add_lazy_section( 'goso_section_sidebar_general_section', esc_html__( 'General', 'authow' ), $this->panelID, __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/widget-heading-title.png">this image</a> to know what is "Sidebar Widget Heading"', 'authow' ) );
		$this->add_lazy_section( 'goso_section_sidebar_fsize_section', esc_html__( 'Font Size', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'goso_section_sidebar_colors_section', esc_html__( 'Colors', 'authow' ), $this->panelID );
	}
}
