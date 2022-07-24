<?php

namespace GosoAuthowElementor\Modules\GosoProduct;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'penci_product';
	}

	public function get_widgets() {
		return array( 'GosoProduct' );
	}
}
