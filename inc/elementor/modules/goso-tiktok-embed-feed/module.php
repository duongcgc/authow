<?php

namespace GosoAuthowElementor\Modules\GosoTiktokEmbedFeed;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-tiktok-embed-feed';
	}

	public function get_widgets() {
		return array( 'GosoTiktokEmbedFeed' );
	}
}
