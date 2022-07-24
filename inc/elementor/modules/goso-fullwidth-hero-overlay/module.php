<?php
namespace GosoAuthowElementor\Modules\GosoFullwidthHeroOverlay;

use GosoAuthowElementor\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class Module extends Module_Base {

	public function get_name() {
		return 'goso-fullwidth-hero-overlay';
	}

	public function get_widgets() {
		return array( 'GosoFullwidthHeroOverlay' );
	}
}
