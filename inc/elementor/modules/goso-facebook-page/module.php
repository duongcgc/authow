<?php
namespace GosoAuthowElementor\Modules\GosoFacebookPage;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-facebook-page';
	}

	public function get_widgets() {
		return array( 'GosoFacebookPage' );
	}
}
