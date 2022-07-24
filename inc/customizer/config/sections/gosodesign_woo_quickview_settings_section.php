<?php
$options   = [];
$options[] = array(
	'default'     => true,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Quick View',
	'description' => 'Enable Quick view option. Ability to see the product information with AJAX.',
	'id'          => 'goso_woocommerce_quickview',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Show variations information on quick view',
	'description' => 'Enable Quick show all product summary information for variable products.',
	'id'          => 'goso_woocommerce_quickview_variations',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'type'        => 'authow-fw-size',
	'default'     => '960',
	'sanitize'    => 'absint',
	'label'       => 'Quick view width',
	'description' => 'Set width of the quick view in pixels.',
	'id'          => 'goso_woocommerce_quickview_width',
	'ids'         => array(
		'desktop' => 'goso_woocommerce_quickview_width',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'     => '960',
		),
	),
);

return $options;
