<?php
$options   = [];
$options[] = array(
	'label'    => 'Disable Footer Widget Area',
	'id'       => 'goso_footer_widget_area',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Footer Widget Area Columns Layout',
	'id'       => 'goso_footer_widget_area_layout',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'style-1'  => '1/3 + 1/3 + 1/3',
		'style-2'  => '1/3 + 2/3',
		'style-3'  => '2/3 + 1/3',
		'style-4'  => '1/4 + 1/4 + 1/4 + 1/4',
		'style-5'  => '2/4 + 1/4 + 1/4',
		'style-6'  => '1/4 + 2/4 + 1/4',
		'style-7'  => '1/4 + 1/4 + 2/4',
		'style-8'  => '1/4 + 3/4',
		'style-9'  => '3/4 + 1/4',
		'style-10' => '1/2 + 1/2',
	),
	'default'  => 'style-1',
	'sanitize' => 'goso_sanitize_choices_field'
);
$options[] = array(
	'id'       => 'goso_footer_widget_padding',
	'label'    => __( 'Footer Widget Area Padding Top & Bottom', 'authow' ),
	'desktop'  => 'goso_footer_widget_padding',
	'default'  => '60',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_footer_widget_padding',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '60',
		),
	),
);
$options[] = array(
	'label'    => 'Align Center Footer Widget Title',
	'id'       => 'goso_footer_widget_title_center',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => __( 'Font Size for Footer Widget Titles', 'authow' ),
	'id'       => 'goso_footer_widget_titlefsize',
	'ids'      => [
		'desktop' => 'goso_footer_widget_titlefsize'
	],
	'default'  => '14',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
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
