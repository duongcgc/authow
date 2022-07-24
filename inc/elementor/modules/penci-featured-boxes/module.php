<?php
namespace GosoAuthowElementor\Modules\GosoFeaturedBoxes;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'penci-featured-boxes';
	}

	public function get_widgets() {
		return array( 'GosoFeaturedBoxes' );
	}
}
