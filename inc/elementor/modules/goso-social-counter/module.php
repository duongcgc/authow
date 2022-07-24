<?php
namespace GosoAuthowElementor\Modules\GosoSocialCounter;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-social-counter';
	}

	public function get_widgets() {
		return array( 'GosoSocialCounter' );
	}
}
