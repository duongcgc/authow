<?php
namespace GosoAuthowElementor\Modules\GosoTestimonials;

use GosoAuthowElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'goso-testimonials';
	}

	public function get_widgets() {
		return array( 'GosoTestimonials' );
	}
}
