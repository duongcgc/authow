<?php
namespace GosoAuthowElementor\Modules\GosoSidebar;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-sidebar';
	}

	public function get_widgets() {
		return array( 'GosoSidebar' );
	}
}
