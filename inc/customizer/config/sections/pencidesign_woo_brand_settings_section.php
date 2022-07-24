<?php
$options = [];
if ( function_exists( 'penci_product_attributes_array' ) ) {
	$options[] = array(
		'default'     => false,
		'sanitize'    => 'penci_sanitize_choices_field',
		'label'       => 'Brand attribute',
		'description' => 'If you want to show brand image on your product page select desired attribute here',
		'id'          => 'penci_woocommerce_brand_attr',
		'type'        => 'authow-fw-select',
		'choices'     => penci_product_attributes_array(),
	);
}
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Show brand on the single product page',
	'description' => 'You can disable/enable products brand image on the single page .',
	'id'          => 'penci_woocommerce_brand',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Show tab with brand information',
	'description' => 'If enabled you will see an additional tab with brand description on the single product page. Text will be taken from the "Description" field for each brand (attribute term).',
	'id'          => 'penci_woocommerce_brand_tab',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Use brand name for tab title',
	'description' => 'If you enable this option, the tab with the brand information will be called "About [Brand name]"..',
	'id'          => 'penci_woocommerce_brand_tab_title',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'penci_woocommerce_brand_display',
	'default'     => 'summary',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Brand Display Position',
	'description' => 'Select the brand logo placement you want to display at single product',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'top'     => esc_attr__( 'Top', 'authow' ),
		'summary' => esc_attr__( 'Summary', 'authow' ),
	),
);

return $options;
