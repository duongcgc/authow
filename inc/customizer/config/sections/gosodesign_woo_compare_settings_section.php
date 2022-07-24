<?php
$options   = [];
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Enable compare',
	'description' => 'Enable compare functionality built in with the theme.',
	'id'          => 'penci_woocommerce_compare',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'id'       => 'penci_woo_shop_hide_compare_icon',
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Header Compare Icon',
	'type'     => 'authow-fw-toggle'
);
if ( function_exists( 'penci_get_pages_option' ) ) {
	$options[] = array(
		'default'     => '',
		'sanitize'    => 'penci_sanitize_choices_field',
		'label'       => 'Compare page',
		'description' => 'Select a page for the compare table. It should contain the shortcode: [penci_compare_table]',
		'id'          => 'penci_woocommerce_compare_page',
		'type'        => 'authow-fw-select',
		'choices'     => penci_get_pages_option(),
	);
}
$options[] = array(
	'default'     => true,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Show button on product grid',
	'description' => 'Display compare product button on all products grids and lists.',
	'id'          => 'penci_woocommerce_compare_show',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => '',
	'type'        => 'authow-fw-multi-check',
	'sanitize'    => 'penci_sanitize_multiple_checkbox',
	'label'       => 'Select compare fields',
	'description' => 'Check a fields display on compare page.',
	'id'          => 'penci_woocommerce_compare_fields',
	'multiple'    => 999,
	'choices'     => call_user_func( function () {
		$product_attributes = array();

		if ( function_exists( 'wc_get_attribute_taxonomies' ) ) {
			$product_attributes = wc_get_attribute_taxonomies();
		}


		$options = array(
			'description'  => array(
				'name'  => penci_woo_translate_text( 'penci_woo_trans_desc' ),
				'value' => 'description',
			),
			'dimensions'   => array(
				'name'  => penci_woo_translate_text( 'penci_woo_trans_demensions' ),
				'value' => 'dimensions',
			),
			'weight'       => array(
				'name'  => penci_woo_translate_text( 'penci_woo_trans_weight' ),
				'value' => 'weight',
			),
			'availability' => array(
				'name'  => penci_woo_translate_text( 'penci_woo_trans_availability' ),
				'value' => 'availability',
			),
			'sku'          => array(
				'name'  => penci_woo_translate_text( 'penci_woo_trans_sku' ),
				'value' => 'sku',
			),

		);

		if ( count( $product_attributes ) > 0 ) {
			foreach ( $product_attributes as $attribute ) {
				$options[ 'pa_' . $attribute->attribute_name ] = array(
					'name'  => wc_attribute_label( $attribute->attribute_label ),
					'value' => 'pa_' . $attribute->attribute_name,
				);
			}
		}

		return $options;

	} )
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Quick Text Translate', 'authow' ),
	'id'       => 'penci_woo_section_compare_heading_01',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'id'       => 'penci_woo_trans_compare_empty_title',
	'default'  => 'Compare list is empty.',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Empty compare heading text',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'default'     => 'No products added in the compare list. You must add some products to compare them.<br> You will find a lot of interesting products on our "Shop" page.',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => 'Empty compare text',
	'description' => 'Text will be displayed if user don\'t add any products to compare',
	'id'          => 'penci_woocommerce_compare_empty_text',
	'type'        => 'authow-fw-textarea',
);

return $options;
