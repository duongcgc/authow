<?php
$options   = [];
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Move Header Sign-Up Form To Below Featured Slider',
	'id'          => 'penci_move_signup_below',
	'description' => 'If you using Sign-Up form on the header, this option will help you move Sign-Up form to below the featured slider',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Make Header Sign-Up Form Below Featured Slider Full Width',
	'id'       => 'penci_move_signup_full_width',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Display Header Sign-Up Form only on Homepage',
	'id'       => 'penci_signup_display_homepage',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => '20',
	'sanitize'    => 'absint',
	'label' => __( 'Header Sign-Up Form Padding Top & Bottom', 'authow' ),
	'id'          => 'penci_header_signup_padding',
	'type'          => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_header_signup_padding',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'     => '20',
		),
	),
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'absint',
	'label' => __( 'Font Size for Description on Sign-Up Form', 'authow' ),
	'id'          => 'penci_header_signup_fdesc',
	'type'          => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_header_signup_fdesc',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'     => '13',
	'sanitize'    => 'absint',
	'label' => __( 'Font Size for Text on "Name" & "Email" fields', 'authow' ),
	'id'          => 'penci_header_signup_finput',
	'type'          => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_header_signup_finput',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'     => '13',
		),
	),
);
$options[] = array(
	'default'     => '14',
	'sanitize'    => 'absint',
	'label' => __( 'Font Size for "Subscrible" button', 'authow' ),
	'id'          => 'penci_header_signup_fsubmit',
	'type'          => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_header_signup_fsubmit',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'     => '14',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Header Sign-Up Form Area Background Color',
	'id'       => 'penci_header_signup_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Text Color',
	'id'       => 'penci_header_signup_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Input Border Color',
	'id'       => 'penci_header_signup_input_border',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Input Text Color',
	'id'       => 'penci_header_signup_input_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Submit Button Background Color',
	'id'       => 'penci_header_signup_submit_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Submit Button Text Color',
	'id'       => 'penci_header_signup_submit_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Submit Button Hover Background Color',
	'id'       => 'penci_header_signup_submit_bg_hover',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Submit Button Hover Text Color',
	'id'       => 'penci_header_signup_submit_color_hover',
);
return $options;
