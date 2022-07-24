<?php
/**
 * Customizer Control: password.
 *
 * Creates a password
 *
 * @author GosoDesign
 * @since 1.0.0
 * @package authow
 */

namespace AuthowFW\Customizer\Control;

/**
 * Password control.
 */
class Password extends Text {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'authow-fw-password';

	/**
	 * The input type.
	 *
	 * @access public
	 * @var string
	 */
	public $input_type = 'password';
}
