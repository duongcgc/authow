<?php
$options = [];
/* Advanced */
$options[] = array(
	'sanitize'    => 'sanitize_text_field',
	'label'       => esc_html__( 'Custom portfolio item URL prefix', 'authow' ),
	'id'          => 'goso_pfl_custom_slug',
	'type'        => 'authow-fw-text',
	'description' => sprintf( __( 'When you change this setting you need to Save Changes again the  %s permalinks rules here. %s', 'authow' ), '<a href="' . admin_url( 'options-permalink.php' ) . '" target="_bank">', '</a>' ),
	'input_attrs' => array(
		'placeholder' => __( 'Current portfolio slug: portfolio', 'authow' ),
	),
);
$options[] = array(
	'sanitize'    => 'sanitize_text_field',
	'type'        => 'authow-fw-text',
	'label'       => esc_html__( 'Custom portfolio category URL prefix', 'authow' ),
	'id'          => 'goso_pfl_custom_catslug',
	'description' => sprintf( __( 'When you change this setting you need to Save Changes again the  %s permalinks rules here. %s', 'authow' ), '<a href="' . admin_url( 'options-permalink.php' ) . '" target="_bank">', '</a>' ),
	'input_attrs' => array(
		'placeholder' => __( 'Current category slug: portfolio-category', 'authow' ),
	),
);

return $options;
