<?php
$options   = [];
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Sidebar Widget Heading', 'authow' ),
	'id'       => 'goso_sidebar_heading_size',
	'ids'         => array(
		'desktop' => 'goso_sidebar_heading_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '14',
		),
	),
);

return $options;
