<?php
namespace GosoAuthowElementor\Modules\GosoPortfolio;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'penci-portfolio';
	}

	public function get_widgets() {
		return array( 'GosoPortfolio' );
	}

	public static function is_active() {
		return class_exists( 'Goso_Portfolio' );
	}
}
