<?php

namespace GosoAuthowElementor\Modules\GosoSimpleList;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-simple-list';
	}

	public function get_widgets() {
		return array( 'GosoSimpleList' );
	}
}
