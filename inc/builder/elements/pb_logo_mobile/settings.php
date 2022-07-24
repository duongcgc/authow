<?php
$options   = [];
$options[] = array(
	'id'              => 'penci_header_pb_logo_mobile_logo_display',
	'default'         => 'image',
	'sanitize'        => 'penci_sanitize_choices_field',
	'type'            => 'authow-fw-radio',
	
	'label'           => esc_html__( 'Display Logo as', 'authow' ),
	'priority'        => 10,
	'choices'         => [
		'image' => esc_html__( 'Logo Image', 'authow' ),
		'text'  => esc_html__( 'Text', 'authow' ),
	],
	'partial_refresh' => [
		'penci_header_pb_logo_mobile_logo_display' => [
			'selector'        => '.pc-wrapbuilder-header-inner',
			'render_callback' => function () {
				load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
			},
		],
	],
);
$options[] = array(
	'id'          => 'penci_header_pb_logo_mobile_image_setting_url',
	'default'     => '',
	'transport'   => 'postMessage',
	'sanitize'    => 'penci_sanitize_choices_field',
	'type'        => 'authow-fw-image',
	
	'label'       => esc_html__( 'Logo Image', 'authow' ),
	'description' => esc_html__( 'Upload your image logo here', 'authow' ),
	'partial_refresh' => [
		'penci_header_pb_logo_mobile_image_setting_url' => [
			'selector'        => '.pc-wrapbuilder-header-inner',
			'render_callback' => function () {
				load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
			},
		],
	],
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_mobile_size_logo_mw',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-size',
	'label'     => __( 'Maxium Width for Logo Image', 'authow' ),
	'ids'       => array(
		'desktop' => 'penci_header_pb_logo_mobile_size_logo_mw',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_mobile_size_logo_mh',
	'default'   => '60',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-size',
	'sanitize'  => 'absint',
	'label'     => __( 'Maxium Height for Logo Image', 'authow' ),
	'ids'       => array(
		'desktop' => 'penci_header_pb_logo_mobile_size_logo_mh',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_mobile_image_setting_href',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'authow-fw-text',
	
	'label'     => __( 'Custom Logo Link', 'authow' ),
	'priority'  => 10,
);
$options[] = array(
	'id'              => 'penci_header_pb_logo_mobile_site_title',
	'default'         => '',
	'transport'       => 'postMessage',
	'sanitize'        => 'penci_sanitize_choices_field',
	'type'            => 'authow-fw-text',
	
	'label'           => esc_html__( 'Text Logo', 'authow' ),
	'partial_refresh' => [
		'penci_header_pb_logo_mobile_site_title' => [
			'selector'        => '.pc-wrapbuilder-header-inner',
			'render_callback' => function () {
				load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
			},
		],
	],
);
$options[] = array(
	'id'              => 'penci_header_pb_logo_mobile_site_description',
	'default'         => '',
	'transport'       => 'postMessage',
	'sanitize'        => 'penci_sanitize_choices_field',
	'type'            => 'authow-fw-textarea',
	
	'label'           => esc_html__( 'Slogan Text', 'authow' ),
	'partial_refresh' => [
		'penci_header_pb_logo_mobile_site_description' => [
			'selector'        => '.pc-wrapbuilder-header-inner',
			'render_callback' => function () {
				load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
			},
		],
	],
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_mobile_font_size_logo',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-size',
	'label'     => __( 'Font Size for Text Logo', 'authow' ),
	'ids'       => array(
		'desktop' => 'penci_header_pb_logo_mobile_font_size_logo',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
/* Text Logo */
$options[] = array(
	'id'        => 'penci_header_pb_logo_mobile_color_logo',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Color for Text Logo',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'          => 'penci_header_pb_logo_mobile_penci_font_for_title',
	'default'     => '',
	'transport'   => 'postMessage',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Font for Text Logo',
	
	'description' => 'Default font is "PT Serif"',
	'type'        => 'authow-fw-select',
	'choices'     => penci_all_fonts( 'select' )
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_mobile_penci_font_weight_title',
	'default'   => 'bold',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Font Weight for Text Logo',
	
	'type'      => 'authow-fw-select',
	'choices'   => array(
		'normal'  => 'Normal',
		'bold'    => 'Bold',
		'bolder'  => 'Bolder',
		'lighter' => 'Lighter',
		'100'     => '100',
		'200'     => '200',
		'300'     => '300',
		'400'     => '400',
		'500'     => '500',
		'600'     => '600',
		'700'     => '700',
		'800'     => '800',
		'900'     => '900'
	)
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_mobile_penci_font_style_title',
	'default'   => 'normal',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Font Style for Text Logo',
	
	'type'      => 'authow-fw-select',
	'choices'   => array(
		'normal' => 'Normal',
		'italic' => 'Italic'
	)
);
/* Slogan*/
$options[] = array(
	'id'        => 'penci_header_pb_logo_mobile_font_size_slogan',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-size',
	'label'     => __( 'Font Size for Slogan', 'authow' ),
	'ids'       => array(
		'desktop' => 'penci_header_pb_logo_mobile_font_size_slogan',
	),
	'choices'   => array(
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
	'id'        => 'penci_header_pb_logo_mobile_color_slogan',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Color Header Slogan',
	'type'      => 'authow-fw-color',
);
$options[] = array(
	'id'          => 'penci_header_pb_logo_mobile_penci_font_for_slogan',
	'default'     => '',
	'transport'   => 'postMessage',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Font for Slogan Text',
	
	'description' => 'Default font is "PT Serif"',
	'type'        => 'authow-fw-select',
	'choices'     => penci_all_fonts( 'select' )
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_mobile_penci_font_weight_slogan',
	'default'   => 'bold',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Font Weight for Slogan Text',
	
	'type'      => 'authow-fw-select',
	'choices'   => array(
		'normal'  => 'Normal',
		'bold'    => 'Bold',
		'bolder'  => 'Bolder',
		'lighter' => 'Lighter',
		'100'     => '100',
		'200'     => '200',
		'300'     => '300',
		'400'     => '400',
		'500'     => '500',
		'600'     => '600',
		'700'     => '700',
		'800'     => '800',
		'900'     => '900'
	)
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_mobile_penci_font_style_slogan',
	'default'   => 'normal',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Font Style for Slogan Text',
	
	'type'      => 'authow-fw-select',
	'choices'   => array(
		'normal' => 'Normal',
		'italic' => 'Italic'
	)
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_mobile_spacing',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'authow-fw-box-model',
	'label'     => __( 'Element Spacing', 'authow' ),
	'choices'   => array(
		'margin'  => array(
			'margin-top'    => '',
			'margin-right'  => '',
			'margin-bottom' => '',
			'margin-left'   => '',
		),
		'padding' => array(
			'padding-top'    => '',
			'padding-right'  => '',
			'padding-bottom' => '',
			'padding-left'   => '',
		),
	),
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_mobileclass',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_textarea_field',
	'type'      => 'authow-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'authow' ),
);

return $options;
