<?php
$options   = [];
$options[] = array(
	'id'          => 'penci_popup_enable',
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Enable Promo Popup',
	'description' => 'Show promo popup to users when they enter the site.',
	'section'     => 'penci_popup_section_general',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'penci_popup_disable_mobile',
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Hide for Mobile Devices',
	'description' => 'You can disable this option for mobile devices completely.',
	'section'     => 'penci_popup_section_general',
	'type'        => 'authow-fw-toggle',
);

return $options;
