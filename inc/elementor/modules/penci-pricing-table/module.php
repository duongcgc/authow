<?php
namespace GosoAuthowElementor\Modules\GosoPricingTable;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'penci-pricing-table';
	}

	public function get_widgets() {
		return array( 'GosoPricingTable' );
	}
}
