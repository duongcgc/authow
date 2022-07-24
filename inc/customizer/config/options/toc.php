<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW\Customizer;

/**
 * Class Theme Authow Customizer
 */
class TocOptions extends CustomizerOptionAbstract {

	public $panelID = 'goso_toc_panel';

	public function set_option() {
		$this->set_panel();
		$this->set_section();
	}

	public function set_panel() {
		$this->customizer->add_panel( [
			'id'       => $this->panelID,
			'title'    => esc_html__( 'Table of Contents', 'authow' ),
			'priority' => $this->id,
		] );
	}

	public function set_section() {
		$this->add_lazy_section( 'gosodesign_toc_general_section', esc_html__( 'General', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_toc_styles_section', esc_html__( 'Font Sizes & Colors', 'authow' ), $this->panelID );
	}
}
