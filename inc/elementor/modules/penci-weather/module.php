<?php
namespace GosoAuthowElementor\Modules\GosoWeather;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'penci-weather';
	}

	public function get_widgets() {
		return array( 'GosoWeather' );
	}
}
