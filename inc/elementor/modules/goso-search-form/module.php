<?php
namespace GosoAuthowElementor\Modules\GosoSearchForm;

use GosoAuthowElementor\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class Module extends Module_Base {

	public function get_name() {
		return 'goso-search-form';
	}

	public function get_widgets() {
		return array( 'GosoSearchForm' );
	}
}
