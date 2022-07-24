<?php
$options = [];
/*Product Label Settings*/
$options[] = array(
	'default'     => true,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Show HOT label ?',
	'description' => 'Display HOT label on featured product.',
	'id'          => 'goso_woo_label_hot_product',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => 'square',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Select Label Style',
	'id'       => 'goso_woo_label_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'square' => 'Rectangle',
		'round'  => 'Round',
	),
);
$options[] = array(
	'default'  => true,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Show Percentage on sale label ?',
	'id'       => 'goso_woo_label_percentage',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_woo_label_new_product',
	'default'     => true,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Show NEW label ?',
	'description' => 'Display NEW label on product.',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_woo_label_new_product_period',
	'default'     => 7,
	'sanitize'    => 'absint',
	'label'       => 'Automatic "New" label period',
	'description' => 'Set a number of days to keep your products marked as "New" after creation.',
	'type'        => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_woo_label_new_product_period',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'     => '7',
		),
	),
);
$options[] = array(
	'id'        => 'goso_woo_label_new_color',
	'default'   => '#8dd620',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'New Label Background Color',
);
$options[] = array(
	'id'        => 'goso_woo_label_hot_color',
	'default'   => '#fb1919',
	'transport' => 'refresh',
	'type'      => 'authow-fw-color',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Hot Label Background Color',
);
$options[] = array(
	'id'        => 'goso_woo_label_hot_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Sale Label Background Color',
);
$options[] = array(
	'id'        => 'goso_woo_label_outstock_color',
	'default'   => '#800000',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Out of Stock Label Background Color',
);

return $options;
