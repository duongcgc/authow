<?php
namespace GosoAuthowElementor\Modules\GosoCustomSliders;

use GosoAuthowElementor\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class Module extends Module_Base {

	public function get_name() {
		return 'goso-custom-sliders';
	}

	public function get_widgets() {
		return array( 'GosoCustomSliders' );
	}
}
