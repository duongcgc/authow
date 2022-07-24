<?php
namespace GosoAuthowElementor\Modules\GosoTeamMember;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'penci-team-member';
	}

	public function get_widgets() {
		return array( 'GosoTeamMember' );
	}
}
