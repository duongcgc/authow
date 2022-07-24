<?php
$options = [];
$options[] = array(
	'label'    => esc_html__( 'Remove all default google fonts - load default fonts from located hosting', 'authow' ),
	'id'       => 'goso_disable_default_fonts',
	'type'     => 'authow-fw-toggle',
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'       => esc_html__( 'Remove all default fonts loads by the theme from located hosting', 'authow' ),
	'id'          => 'goso_disable_all_fonts',
	'description' => 'This option only works when you check to option "Remove all default google fonts" above.',
	'type'        => 'authow-fw-toggle',
	'sanitize'    => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => esc_html__( 'Enable Cookie Law Policy PopUp At The Footer', 'authow' ),
	'id'       => 'goso_enable_cookie_law',
	'type'     => 'authow-fw-toggle',
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => esc_html__( 'Remove "Privacy & Cookies Policy" notice after Accept clicked', 'authow' ),
	'id'       => 'goso_show_cookie_law',
	'type'     => 'authow-fw-toggle',
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => esc_html__( 'Custom Description on Cookie Law PopUp', 'authow' ),
	'id'       => 'goso_gprd_desc',
	'type'     => 'authow-fw-textarea',
	'default'  => goso_default_setting_customizer( 'goso_gprd_desc' ),
	'sanitize' => 'goso_sanitize_textarea_field'
);
$options[] = array(
	'label'    => esc_html__( 'Custom Text "Accept"', 'authow' ),
	'id'       => 'goso_gprd_btn_accept',
	'type'     => 'authow-fw-text',
	'default'  => goso_default_setting_customizer( 'goso_gprd_btn_accept' ),
	'sanitize' => 'sanitize_text_field'
);
$options[] = array(
	'label'    => esc_html__( 'Custom Text "Read More"', 'authow' ),
	'id'       => 'goso_gprd_rmore',
	'type'     => 'authow-fw-text',
	'default'  => goso_default_setting_customizer( 'goso_gprd_rmore' ),
	'sanitize' => 'sanitize_text_field'
);
$options[] = array(
	'label'    => esc_html__( 'Custom URL on "Read More" Button', 'authow' ),
	'id'       => 'goso_gprd_rmore_link',
	'type'     => 'authow-fw-text',
	'default'  => goso_default_setting_customizer( 'goso_gprd_rmore_link' ),
	'sanitize' => 'sanitize_text_field'
);
$options[] = array(
	'label'    => esc_html__( 'Custom Text "Privacy & Cookies Policy"', 'authow' ),
	'type'     => 'authow-fw-text',
	'id'       => 'goso_gprd_policy_text',
	'default'  => goso_default_setting_customizer( 'goso_gprd_policy_text' ),
	'sanitize' => 'sanitize_text_field'
);
$options_color_gprd = array(
	'goso_gprd_bgcolor'     => esc_html__( 'Background For Cookie Law Policy PopUp', 'authow' ),
	'goso_gprd_color'       => esc_html__( 'Text Color For Cookie Law Policy PopUp', 'authow' ),
	'goso_gprd_btn_color'   => esc_html__( 'Text Color For Accept Button', 'authow' ),
	'goso_gprd_btn_bgcolor' => esc_html__( 'Background For Accept Button', 'authow' ),
	'goso_gprd_border'      => esc_html__( 'Border Color For Cookie Law Policy PopUp', 'authow' ),
);
foreach ( $options_color_gprd as $key => $label ) {
	$options[] = array(
		'label'    => $label,
		'id'       => $key,
		'type'     => 'authow-fw-color',
		'sanitize' => 'sanitize_hex_color'
	);
}
return $options;
