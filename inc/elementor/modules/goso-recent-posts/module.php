<?php

namespace GosoAuthowElementor\Modules\GosoRecentPosts;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-recent-posts';
	}

	public function get_widgets() {
		return array( 'GosoRecentPosts' );
	}
}
