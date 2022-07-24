<?php
$options   = [];
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Rows Gap Between Post Items', 'authow' ),
	'id'       => 'goso_rgap_pitems',
	'ids'         => array(
		'desktop' => 'goso_rgap_pitems',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Rows Gap for Big Post Items', 'authow' ),
	'id'       => 'goso_rgap_pbitems',
	'ids'         => array(
		'desktop' => 'goso_rgap_pbitems',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Rows Gap for Small List Post Items', 'authow' ),
	'id'       => 'goso_rgap_psitems',
	'ids'         => array(
		'desktop' => 'goso_rgap_psitems',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);

return $options;
