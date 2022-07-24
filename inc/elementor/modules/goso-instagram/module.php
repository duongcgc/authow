<?php
namespace GosoAuthowElementor\Modules\GosoInstagram;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-instagram';
	}

	public function get_widgets() {
		return array( 'GosoInstagram' );
	}
}
