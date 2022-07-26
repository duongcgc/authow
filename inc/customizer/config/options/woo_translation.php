<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW\Customizer;

/**
 * Class Theme Authow Customizer
 */
class WooTranslationOption extends CustomizerOptionAbstract {

	public function set_option() {
		$this->set_section();
	}

	public function set_section() {
		$this->add_lazy_section( 'gosodesign_woo_section_transition_lang_section', esc_html__( 'WooCommerce Text Translation', 'authow' ), '', "If you are using WPML or Polylang - Use shortcode [gosolang] inside fields below with multiple languages - Example: <strong>[gosolang en_US='Share' fr_FR='Partager' language_code='Your language text' /]</strong><br>Make sure plugin Goso Shortcodes are activated. You can check languages code <a href='https://make.wordpress.org/polyglots/teams/' target='_blank'>here</a>" );
	}
}
