<?php

namespace GosoAuthowElementor\Modules\GosoProductCategories;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso_product_categories';
	}

	public function get_widgets() {
		return array( 'GosoProductCategories' );
	}
}
