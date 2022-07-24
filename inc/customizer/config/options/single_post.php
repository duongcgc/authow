<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW\Customizer;

/**
 * Class Theme Authow Customizer
 */
class SinglePostOption extends CustomizerOptionAbstract {

	public $panelID = 'goso_single_post_panel';

	public function set_option() {
		$this->set_panel();
		$this->set_section();
	}

	public function set_panel() {
		$this->customizer->add_panel( [
			'id'       => $this->panelID,
			'title'    => esc_html__( 'Single Posts', 'authow' ),
			'priority' => $this->id,
		] );
	}

	public function set_section() {
		$this->add_lazy_section( 'goso_section_spost_general_section', esc_html__( 'General', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'goso_section_spost_inline_reposts_section', esc_html__( 'Inline Related Posts', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'goso_section_spost_related_posts_section', esc_html__( 'Related Posts', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'goso_section_spost_comments_section', esc_html__( 'Comments Form', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'goso_section_spost_autoload_section', esc_html__( 'Infinity Scrolling Load Posts', 'authow' ), $this->panelID, esc_html__( 'When you viewing a single post page, scroll down and this feature can help you load the next/previous posts automatically.', 'authow' ) );
		$this->add_lazy_section( 'goso_section_spost_fontsize_section', esc_html__( 'Font Size', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'goso_section_spost_colors_section', esc_html__( 'Colors', 'authow' ), $this->panelID );
	}
}
