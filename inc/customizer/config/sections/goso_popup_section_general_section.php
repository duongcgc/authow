<?php
$options   = [];
$options[] = array(
	'id'          => 'goso_popup_enable',
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Enable Promo Popup',
	'description' => 'Show promo popup to users when they enter the site.',
	'section'     => 'goso_popup_section_general',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_popup_disable_mobile',
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Hide for Mobile Devices',
	'description' => 'You can disable this option for mobile devices completely.',
	'section'     => 'goso_popup_section_general',
	'type'        => 'authow-fw-toggle',
);

return $options;
