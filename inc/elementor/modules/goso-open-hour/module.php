<?php
namespace GosoAuthowElementor\Modules\GosoOpenHour;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-open-hour';
	}

	public function get_widgets() {
		return array( 'GosoOpenHour' );
	}
}
