<?php
namespace GosoAuthowElementor\Modules\GosoBigGrid;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-big-grid';
	}

	public function get_widgets() {
		return array( 'GosoBigGrid' );
	}
}
