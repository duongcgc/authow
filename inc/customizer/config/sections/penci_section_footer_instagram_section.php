<?php
$options   = [];
$options[] = array(
	'label'    => 'Display Footer Instagram Widget Title Overlay Images',
	'id'       => 'penci_footer_insta_title_overlay',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Hide Instagram Icon on Footer Instagram',
	'id'       => 'penci_footer_insta_hide_icon',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'penci_footer_insta_title_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
	'default'   => '14',
);
$options[] = array(
	'label'     => 'Font Size for Widget Title',
	'id'        => 'penci_footer_insta_title',
	'type'      => 'authow-fw-size',
	'default' => '16',
	'sanitize'  => 'absint',
	'ids'       => array(
		'desktop' => 'penci_footer_insta_title',
		'mobile'  => 'penci_footer_insta_title_mobile',
	),
	'choices'   => array(
		'desktop' => array(
			'min'       => 1,
			'max'       => 100,
			'step'      => 1,
			'edit'      => true,
			'unit'      => 'px',
			'default' => '16',
		),
		'mobile'  => array(
			'min'       => 1,
			'max'       => 100,
			'step'      => 1,
			'edit'      => true,
			'unit'      => 'px',
			'default' => '14',
		),
	),
);

return $options;
