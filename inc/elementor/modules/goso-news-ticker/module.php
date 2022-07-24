<?php
namespace GosoAuthowElementor\Modules\GosoNewsTicker;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-news-ticker';
	}

	public function get_widgets() {
		return array( 'GosoNewsTicker' );
	}
}
