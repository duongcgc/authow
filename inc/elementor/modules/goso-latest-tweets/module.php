<?php
namespace GosoAuthowElementor\Modules\GosoLatestTweets;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'penci-latest-tweets';
	}

	public function get_widgets() {
		return array( 'GosoLatestTweets' );
	}
}
