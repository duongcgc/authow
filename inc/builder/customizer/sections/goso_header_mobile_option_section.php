<?php
/* Mobile Control */
$options   = [];
$options[] = array(
	'id'                => 'goso_header_mobile_sticky_shadow',
	'default'           => 'disable',
	'sanitize_callback' => 'goso_sanitize_choices_field',
	'label'             => esc_attr__( 'Enable Sticky Shadow ?', 'authow' ),
	'section'           => 'goso_header_mobile_option_section',
	'type'              => 'authow-fw-select',
	'choices'           => [
		'disable' => 'No',
		'enable'  => 'Yes',
	]
);

$options[] = array(
	'id'                => 'goso_header_mobile_sticky_hide_down',
	'default'           => 'disable',
	'sanitize_callback' => 'goso_sanitize_choices_field',
	'label'             => esc_attr__( 'Hide When Scrolling Down', 'authow' ),
	'section'           => 'goso_header_mobile_option_section',
	'type'              => 'authow-fw-select',
	'choices'           => [
		'disable' => 'No',
		'enable'  => 'Yes',
	]
);
return $options;
