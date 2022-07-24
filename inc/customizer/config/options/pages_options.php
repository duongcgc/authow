<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW\Customizer;

/**
 * Class Theme Authow Customizer
 */
class PagesOption extends CustomizerOptionAbstract {

	public $panelID = 'penci_single_page_panel';

	public function set_option() {
		$this->set_panel();
		$this->set_section();
	}

	public function set_panel() {
		$this->customizer->add_panel( [
			'id'       => $this->panelID,
			'title'    => esc_html__( 'Pages', 'authow' ),
			'priority' => $this->id,
		] );
	}

	public function set_section() {
		$this->add_lazy_section( 'penci_section_spage_general_section', esc_html__( 'General', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'penci_section_spage_header_section', esc_html__( 'Page Header', 'authow' ), $this->panelID, 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/page-header.png">this image</a> to know what is "Page Header"' );
		$this->add_lazy_section( 'penci_section_spage_404_section', esc_html__( '404 Page', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'penci_section_spage_colors_section', esc_html__( 'Colors', 'authow' ), $this->panelID );
	}
}
