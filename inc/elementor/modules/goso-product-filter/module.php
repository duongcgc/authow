<?php

namespace GosoAuthowElementor\Modules\GosoProductFilter;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso_product_filters';
	}

	public function get_widgets() {
		return array( 'GosoProductFilter' );
	}
}
