<?php
namespace GosoAuthowElementor\Modules\GosoLatestPosts;

use GosoAuthowElementor\Base\Module_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class Module extends Module_Base {

	public function get_name() {
		return 'penci-latest-posts';
	}

	public function get_widgets() {
		return array( 'GosoLatestPosts' );
	}
}
