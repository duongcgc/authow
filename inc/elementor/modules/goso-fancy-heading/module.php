<?php
namespace GosoAuthowElementor\Modules\GosoFancyHeading;

use GosoAuthowElementor\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class Module extends Module_Base {

	public function get_name() {
		return 'goso-fancy-heading';
	}

	public function get_widgets() {
		return array( 'GosoFancyHeading' );
	}
}
