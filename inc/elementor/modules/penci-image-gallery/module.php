<?php
namespace GosoAuthowElementor\Modules\GosoImageGallery;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'penci-image-gallery';
	}

	public function get_widgets() {
		return array( 'GosoImageGallery' );
	}
}
