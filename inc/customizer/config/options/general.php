<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW\Customizer;

/**
 * Class Theme Authow Customizer
 */
class GeneralOption extends CustomizerOptionAbstract {

	public $panelID = 'goso_general_panel';

	public function set_option() {
		$this->set_panel();
		$this->set_section();
	}

	public function set_panel() {
		$this->customizer->add_panel( [
			'id'       => $this->panelID,
			'title'    => esc_html__( 'General', 'authow' ),
			'priority' => $this->id,
		] );
	}

	public function set_section() {
		$this->add_lazy_section( 'gosodesign_new_section_general_section', esc_html__( 'General Settings', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_general_body_boxed_section', esc_html__( 'Body Boxed', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_general_archive_page_section', esc_html__( 'Category, Tags, Search, Archive Pages', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_general_search_page_section', esc_html__( 'Search Pages Queries', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_general_gdpr_section', esc_html__( 'GDPR Policy', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_general_social_sharing_section', esc_html__( 'Like Posts & Social Sharing', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_general_image_sizes_section', esc_html__( 'Manage Image Sizes', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_general_schema_markup_section', esc_html__( 'Schema Markup', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_general_extra_section', esc_html__( 'Extra Options', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_general_typography_section', esc_html__( 'Typography', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'gosodesign_general_colors_section', esc_html__( 'Colors', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'goso_ageverify_section', esc_html__( 'Age Verify', 'authow' ), $this->panelID );
	}
}
