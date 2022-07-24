<?php
$options   = [];
$options[] = array(
	'label'    => __( 'Custom Padding to Top', 'authow' ),
	'id'       => 'goso_footer_signup_ptop',
	'default'  => '50',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_footer_signup_ptop',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '50',
		),
	),
);
$options[] = array(
	'label'    => __( 'Custom Padding to Bottom', 'authow' ),
	'id'       => 'goso_footer_signup_pbottom',
	'default'  => '40',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_footer_signup_pbottom',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '40',
		),
	),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'goso_footer_signup_fstitle_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
	'default'    => '24',
);
$options[] = array(
	'label'    => 'Font Size for Heading',
	'id'       => 'goso_footer_signup_fstitle',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'default'    => '32',
	'ids'      => array(
		'desktop' => 'goso_footer_signup_fstitle',
		'mobile'  => 'goso_footer_signup_fstitle_mobile',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'    => '32',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'    => '24',
		),
	),
);
$options[] = array(
	'label'    => __( 'Font Size for Description', 'authow' ),
	'id'       => 'goso_footer_signup_fsdesc',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'default'    => '18',
	'ids'      => [ 'desktop' => 'goso_footer_signup_fsdesc', 'mobile' => 'goso_footer_signup_fsdesc_mobile' ],
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'    => '18',
		),
		'mobile' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'    => '16',
		),
	),
);
$options[] = array(
	'label'    => __( 'Font Size for Description', 'authow' ),
	'id'       => 'goso_footer_signup_fsdesc_mobile',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-hidden',
	'default'    => '16',
);
$options[] = array(
	'label'    => __( 'Font Size for Inputs', 'authow' ),
	'id'       => 'goso_footer_signup_fsinputs',
	'sanitize' => 'absint',
	'default'    => '14',
	'ids'       => ['desktop'=>'goso_footer_signup_fsinputs'],
	'type'     => 'authow-fw-size',
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'    => '14',
		),
	),
);
$options[] = array(
	'label'    => __( 'Font Size for Submit Button', 'authow' ),
	'id'       => 'goso_footer_signup_fsisubmit',
	'sanitize' => 'absint',
	'ids'       => ['desktop'=>'goso_footer_signup_fsisubmit'],
	'type'     => 'authow-fw-size',
	'default'    => '14',
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'    => '14',
		),
	),
);
$options[] = array(
	'label'    => 'Display Name Field on Footer SignUp Form',
	'id'       => 'goso_footer_signup_showemail',
	'type'     => 'authow-fw-toggle',
	'sanitize' => 'absint',
);
$options[] = array(
	'label'    => 'Footer SignUp Form Area Background Color',
	'id'       => 'goso_footer_signup_area_bg',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
);
$options[] = array(
	'label'    => 'SignUp Form Heading Text Color',
	'id'       => 'goso_footer_signup_heading_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'SignUp Form Description Text Color',
	'id'       => 'goso_footer_signup_des_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'SignUp Form Email Input Border Color',
	'id'       => 'goso_footer_signup_email_border',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'SignUp Form Email Input Hover Border Color',
	'id'       => 'footer_signup_email_border_hover',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'SignUp Form Email Text Color',
	'id'       => 'goso_footer_signup_email_text_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'SignUp Form Submit Background Color',
	'id'       => 'goso_footer_signup_button_bg',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'SignUp Form Submit Hover Background Color',
	'id'       => 'goso_footer_signup_button_bg_hover',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'SignUp Form Submit Text Color',
	'id'       => 'goso_footer_signup_button_text',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'SignUp Form Submit Hover Text Color',
	'id'       => 'goso_footer_signup_button_text_hover',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);

return $options;
