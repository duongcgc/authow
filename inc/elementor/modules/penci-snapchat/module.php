<?php
namespace GosoAuthowElementor\Modules\GosoSnapchat;

use GosoAuthowElementor\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class Module extends Module_Base {

	public function get_name() {
		return 'penci-snapchat';
	}

	public function get_widgets() {
		return array( 'GosoSnapchat' );
	}
}
