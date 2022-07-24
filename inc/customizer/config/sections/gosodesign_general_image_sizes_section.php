<?php
$options          = [];
$list_image_sizes = array(
	'goso_dthumb_1920_auto' => esc_html__( 'Disable Image Size - 1920 x auto', 'authow' ),
	'goso_dthumb_1920_800'  => esc_html__( 'Disable Image Size - 1920 x 800px', 'authow' ),
	'goso_dthumb_1170_auto' => esc_html__( 'Disable Image Size - 1170 x auto', 'authow' ),
	'goso_dthumb_1170_663'  => esc_html__( 'Disable Image Size - 1170 x 663px', 'authow' ),
	'goso_dthumb_780_516'   => esc_html__( 'Disable Image Size - 780 x 516px', 'authow' ),
	'goso_dthumb_585_390'   => esc_html__( 'Disable Image Size - 585 x 390px', 'authow' ),
	'goso_dthumb_585_auto'  => esc_html__( 'Disable Image Size - 585 x auto', 'authow' ),
	'goso_dthumb_585_585'   => esc_html__( 'Disable Image Size - 585 x 585px', 'authow' ),
	'goso_dthumb_480_650'   => esc_html__( 'Disable Image Size - 480 x 650px', 'authow' ),
	'goso_dthumb_263_175'   => esc_html__( 'Disable Image Size - 263 x 175px', 'authow' )
);
foreach ( $list_image_sizes as $id_size => $label_size ) {

	$options[] = array(
		'label'    => $label_size,
		'id'       => $id_size,
		'type'     => 'authow-fw-toggle',
		'default'  => false,
		'sanitize' => 'goso_sanitize_checkbox_field'
	);
}

return $options;
