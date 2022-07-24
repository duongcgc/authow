<?php
namespace GosoAuthowElementor\Modules\GosoInfoBox;

use GosoAuthowElementor\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class Module extends Module_Base {

	public function get_name() {
		return 'goso-info-box';
	}

	public function get_widgets() {
		return array( 'GosoInfoBox' );
	}
}
