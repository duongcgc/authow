<?php

namespace GosoAuthowElementor\Modules\GosoProductTabs;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'penci_product_tabs';
	}

	public function get_widgets() {
		return array( 'GosoProductTabs' );
	}
}
