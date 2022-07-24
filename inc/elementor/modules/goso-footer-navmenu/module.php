<?php

namespace GosoAuthowElementor\Modules\GosoFooterNavmenu;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-footer-navmenu';
	}

	public function get_widgets() {
		return array( 'GosoFooterNavmenu' );
	}
}
