<?php
namespace GosoAuthowElementor\Modules\GosoProgressBar;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-progress-bar';
	}

	public function get_widgets() {
		return array( 'GosoProgressBar' );
	}
}
