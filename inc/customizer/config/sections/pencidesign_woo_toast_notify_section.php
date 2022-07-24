<?php
$options   = [];
$options[] = array(
	'id'       => 'penci_general_heading_3',
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Notifications Settings', 'authow' ),
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'id'       => 'penci_woo_notify',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Notify',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_woo_add_to_cart_notify',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Show Added to Cart Notify',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'penci_woo_notify_position',
	'default'     => 'bottom-right',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Notify Position',
	'description' => 'Select the position of the notification you want to display',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'top-left'      => 'Top Left',
		'top-right'     => 'Top Right',
		'top-center'    => 'Top Center',
		'mid-center'    => 'Middle Center',
		'bottom-left'   => 'Bottom Left',
		'bottom-right'  => 'Bottom Right',
		'bottom-center' => 'Bottom Center',
	)
);
$options[] = array(
	'id'          => 'penci_woo_notify_text_align',
	'default'     => 'left',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Notify Text Align',
	'description' => 'Select the text align of the notification you want to display',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'left'   => 'Left',
		'right'  => 'Right',
		'center' => 'Center',
	)
);
$options[] = array(
	'id'          => 'penci_woo_notify_transition',
	'default'     => 'slide',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Notify Transition Effect',
	'description' => 'Select the transition effect of the notify',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'plain' => 'Plain',
		'fade'  => 'Fade',
		'slide' => 'Slide',
	)
);
$options[] = array(
	'id'       => 'penci_woo_notify_hide_after',
	'default'  => '5000',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Hide the Notify after miliseconds', 'authow' ),
	'ids'         => array(
		'desktop' => 'penci_woo_notify_hide_after',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'ms',
			'default'  => '5000',
		),
	),
);
$options[] = array(
	'id'        => 'penci_woo_notify_bg_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Notify Background Color',
);
$options[] = array(
	'id'        => 'penci_woo_notify_text_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Notify Text Color',
);

return $options;
