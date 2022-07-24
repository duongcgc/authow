<?php

namespace GosoAuthowElementor\Modules\GosoProductCategoriesGrid;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'penci_product_categories_grid';
	}

	public function get_widgets() {
		return array( 'GosoProductCategoriesGrid' );
	}
}
