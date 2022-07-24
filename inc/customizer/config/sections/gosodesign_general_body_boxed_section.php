<?php
$options   = [];
$options[] = array(
	'label'       => 'Enable Body Boxed Layout',
	'description' => 'This option does not apply when you enable vertical navigation',
	'id'          => 'goso_body_boxed_layout',
	'type'        => 'authow-fw-toggle',
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Background Color for Body Boxed',
	'id'       => 'goso_body_boxed_bg_color',
	'default'  => '',
	'type'     => 'authow-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => 'Background Image for Body Boxed',
	'id'       => 'goso_body_boxed_bg_image',
	'sanitize' => 'esc_url_raw',
	'type'     => 'authow-fw-image'
);
$options[] = array(
	'label'    => 'Background Body Boxed Repeat',
	'id'       => 'goso_body_boxed_bg_repeat',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'no-repeat' => 'No Repeat',
		'repeat'    => 'Repeat'
	),
	'default'  => 'no-repeat',
	'sanitize' => 'goso_sanitize_choices_field'
);
$options[] = array(
	'label'    => 'Background Body Boxed Attachment',
	'id'       => 'goso_body_boxed_bg_attachment',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'fixed'  => 'Fixed',
		'scroll' => 'Scroll',
		'local'  => 'Local'
	),
	'default'  => 'fixed',
	'sanitize' => 'goso_sanitize_choices_field'
);
$options[] = array(
	'label'    => 'Background Body Boxed Size',
	'id'       => 'goso_body_boxed_bg_size',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'cover' => 'Cover',
		'auto'  => 'Auto',
	),
	'default'  => 'cover',
	'sanitize' => 'goso_sanitize_choices_field'
);

return $options;
