<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW\Customizer;

/**
 * Class Theme Authow Customizer
 */
class CustomCSSOption extends CustomizerOptionAbstract {


	public function set_option() {
		$this->set_section();
	}

	public function set_section() {
		$this->add_lazy_section( 'pencidesign_new_section_custom_css_section', esc_html__( 'Custom CSS', 'authow' ), '', esc_html__( 'Add your custom CSS which will overwrite the theme CSS', 'authow' ) );
	}
}
