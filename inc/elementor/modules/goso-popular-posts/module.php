<?php
namespace GosoAuthowElementor\Modules\GosoPopularPosts;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-popular-posts';
	}

	public function get_widgets() {
		return array( 'GosoPopularPosts' );
	}
}
