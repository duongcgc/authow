<?php
namespace GosoAuthowElementor\Modules\GosoPopularCat;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-popular-cat';
	}

	public function get_widgets() {
		return array( 'GosoPopularCat' );
	}
}
