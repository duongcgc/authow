<?php
namespace GosoAuthowElementor\Modules\GosoButtonPopup;

use GosoAuthowElementor\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class Module extends Module_Base {

	public function get_name() {
		return 'penci-button-popup';
	}

	public function get_widgets() {
		return array( 'GosoButtonPopup' );
	}
}
