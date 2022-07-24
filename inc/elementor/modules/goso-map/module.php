<?php
namespace GosoAuthowElementor\Modules\GosoMap;

use GosoAuthowElementor\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class Module extends Module_Base {

	public function get_name() {
		return 'goso-map';
	}

	public function get_widgets() {
		return array( 'GosoMap' );
	}
}
