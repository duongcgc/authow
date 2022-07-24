<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW\Customizer;

/**
 * Class Theme Authow Customizer
 */
class SpeedOptimizationOption extends CustomizerOptionAbstract {

	public $panelID = 'goso_speed_section_panel';

	public function set_option() {
		$this->set_panel();
		$this->set_section();
	}

	public function set_panel() {
		$this->customizer->add_panel( [
			'id'       => $this->panelID,
			'title'    => esc_html__( 'Speed Optimization', 'authow' ),
			'priority' => $this->id,
		] );
	}

	public function set_section() {
		$this->add_lazy_section( 'goso_section_speed_general_section', esc_html__( 'General & Lazyload', 'authow' ), $this->panelID, __( 'To use options here in the right way - please check <a target="_blank" href="https://authow.gosodesign.net/authow-document/#speed-optimization">this guide</a> first - on <strong>Speed Optimization</strong> section', 'authow' ) );
		$this->add_lazy_section( 'goso_section_speed_css_section', esc_html__( 'Optimize CSS', 'authow' ), $this->panelID, __( 'To use options here in the right way - please check <a target="_blank" href="https://authow.gosodesign.net/authow-document/#speed-optimization">this guide</a> first - on <strong>Speed Optimization</strong> section', 'authow' ) );
		$this->add_lazy_section( 'goso_section_speed_javascript_section', esc_html__( 'Optimize JavaScript', 'authow' ), $this->panelID, __( 'To use options here in the right way - please check <a target="_blank" href="https://authow.gosodesign.net/authow-document/#speed-optimization">this guide</a> first - on <strong>Speed Optimization</strong> section', 'authow' ) );
		$this->add_lazy_section( 'goso_section_speed_html_section', esc_html__( 'Optimize HTML', 'authow' ), $this->panelID, __( 'To use options here in the right way - please check <a target="_blank" href="https://authow.gosodesign.net/authow-document/#speed-optimization">this guide</a> first - on <strong>Speed Optimization</strong> section', 'authow' ) );
	}
}
