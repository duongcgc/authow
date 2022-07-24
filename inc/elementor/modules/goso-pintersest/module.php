<?php
namespace GosoAuthowElementor\Modules\GosoPintersest;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'penci-pintersest';
	}

	public function get_widgets() {
		return array( 'GosoPintersest' );
	}
}
