<?php
namespace GosoAuthowElementor\Modules\GosoSocialMedia;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'penci-social-media';
	}

	public function get_widgets() {
		return array( 'GosoSocialMedia' );
	}
}
