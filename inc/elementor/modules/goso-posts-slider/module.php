<?php
namespace GosoAuthowElementor\Modules\GosoPostsSlider;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-posts-slider';
	}

	public function get_widgets() {
		return array( 'GosoPostsSlider' );
	}
}
