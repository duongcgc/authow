<?php

namespace GosoAuthowElementor\Modules\GosoProductHotspot;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso_product_hotspot';
	}

	public function get_widgets() {
		return array( 'GosoProductHotspot' );
	}
}
