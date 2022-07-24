<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW\Customizer;

/**
 * Class Theme Authow Customizer
 */
class PostLayoutOption extends CustomizerOptionAbstract {

	public $panelID = 'goso_post_layout_panel';

	public function set_option() {
		$this->set_panel();
		$this->set_section();
	}

	public function set_panel() {
		$this->customizer->add_panel( [
			'id'          => $this->panelID,
			'title'       => esc_html__( 'Posts Layouts', 'authow' ),
			'description' => 'All options here apply for Standard Layout, Classic Layout and 1st Posts of 1st Standard & 1st Classic Layout. For other layouts, check on "Other Layouts" section below.',
			'priority'    => $this->id,
		] );
	}

	public function set_section() {
		$this->add_lazy_section( 'goso_section_standard_classic_section', esc_html__( 'Standard & Classic', 'authow' ), $this->panelID, 'All options here apply for Standard Layout, Classic Layout and 1st Posts of 1st Standard & 1st Classic Layout. For other layouts, check on "Other Layouts" section below.' );
		$this->add_lazy_section( 'goso_section_other_layouts_section', esc_html__( 'Other Layouts', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'goso_section_layout_rowsgap_section', esc_html__( 'Row Gap', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'goso_section_layout_fontsize_section', esc_html__( 'Font Size', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'goso_section_layout_colors_section', esc_html__( 'Colors', 'authow' ), $this->panelID );
	}
}
