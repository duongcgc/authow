<?php
namespace GosoAuthowElementor\Modules\GosoTextBlock;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-text-block';
	}

	public function get_widgets() {
		return array( 'GosoTextBlock' );
	}
}
