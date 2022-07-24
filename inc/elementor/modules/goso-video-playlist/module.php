<?php
namespace GosoAuthowElementor\Modules\GosoVideoPlaylist;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-video-playlist';
	}

	public function get_widgets() {
		return array( 'GosoVideoPlaylist' );
	}
}
