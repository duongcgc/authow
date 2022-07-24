<?php
namespace GosoAuthowElementor\Modules\GosoFeaturedSliders;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'penci-featured-sliders';
	}

	public function get_widgets() {
		return array( 'GosoFeaturedSliders' );
	}
}
