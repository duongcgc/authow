<?php
namespace GosoAuthowElementor\Modules\GosoSmallList;

use GosoAuthowElementor\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class Module extends Module_Base {

	public function get_name() {
		return 'goso-small-list';
	}

	public function get_widgets() {
		return array( 'GosoSmallList' );
	}
}
