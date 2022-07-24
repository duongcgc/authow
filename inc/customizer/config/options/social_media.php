<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW\Customizer;

/**
 * Class Theme Authow Customizer
 */
class SocialMediaOption extends CustomizerOptionAbstract {


	public function set_option() {
		$this->set_section();
	}

	public function set_section() {
		$this->add_lazy_section( 'gosodesign_new_section_social_section', esc_html__( 'Social Media', 'authow' ), '', esc_html__( 'Enter full your social URL ( include http:// or https:// on the URL ), Icons will not show if left blank.', 'authow' ) );
	}
}
