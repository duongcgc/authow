<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW\Customizer;

/**
 * Class Theme Authow Customizer
 */
class PortfolioOption extends CustomizerOptionAbstract {

	public $panelID = 'goso_portfolio_section_panel';

	public function set_option() {
		$this->set_panel();
		$this->set_section();
	}

	public function set_panel() {
		$this->customizer->add_panel( [
			'id'       => $this->panelID,
			'title'    => esc_html__( 'Portfolio', 'authow' ),
			'priority' => $this->id,
		] );
	}

	public function set_section() {
		$this->add_lazy_section( 'gosodesign_portfolio_sgeneral_section', esc_html__( 'General', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_portfolio_scolor_section', esc_html__( 'Colors', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_portfolio_sfontsize_section', esc_html__( 'Font Size', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_portfolio_sadvanced_section', esc_html__( 'Advanced', 'authow' ), $this->panelID );
	}
}
