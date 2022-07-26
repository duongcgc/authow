<?php
$social_icon_section         = 'goso_header_pb_social_icon_mobile_section';
$general_config              = 'goso_builder_mods';
$query                       = [];
$query['autofocus[section]'] = 'gosodesign_new_section_social';
$options                     = [];
$options[]                   = array(
	'id'        => $social_icon_section . '_icon_size',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'label'     => 'Social Icon Size',
	'type'      => 'authow-fw-size',
	
	'ids'  => array(
		'desktop' => $social_icon_section . '_icon_size',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 50,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[]                   = array(
	'id'        => $social_icon_section . '_icon_w',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'authow-fw-size',
	'label'     => 'Social Icon Width',
	
	'ids'  => array(
		'desktop' => $social_icon_section . '_icon_w',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 50,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[]                   = array(
	'id'        => $social_icon_section . '_item_spacing',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'authow-fw-size',
	'sanitize'  => 'absint',
	'label'     => 'Spacing Between Item',
	
	'ids'  => array(
		'desktop' => $social_icon_section . '_item_spacing',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 1000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[]                   = array(
	'id'        => $social_icon_section . '_icon_style',
	'default'   => 'simple',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Social Icon Style',
	
	'type'      => 'authow-fw-select',
	'choices'   => array(
		'simple' => 'Simple',
		'square' => 'Square',
		'circle' => 'Circle',
	)
);
$options[]                   = array(
	'id'        => $social_icon_section . '_icon_color',
	'default'   => 'normal',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Social Icon Color',
	
	'type'      => 'authow-fw-select',
	'choices'   => array(
		'textaccent'  => 'Custom Color',
		'textcolored' => 'Brand Text Color',
		'colored'     => 'Brand Background Color',
	)
);
$options[]                   = array(
	'id'        => $social_icon_section . '_spacing',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
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
$options[]                   = array(
	'id'        => $social_icon_section . '_goso_rel_type_social',
	'default'   => 'noreferrer',
	'transport' => 'postMessage',
	'sanitize'  => 'goso_sanitize_choices_field',
	'label'     => 'Select "rel" Attribute Type for Social Media & Social Share Icons',
	
	'type'      => 'authow-fw-select',
	'choices'   => array(
		'none'                         => 'None',
		'nofollow'                     => 'nofollow',
		'noreferrer'                   => 'noreferrer',
		'noopener'                     => 'noopener',
		'noreferrer_noopener'          => 'noreferrer noopener',
		'nofollow_noreferrer'          => 'nofollow noreferrer',
		'nofollow_noopener'            => 'nofollow noopener',
		'nofollow_noreferrer_noopener' => 'nofollow noreferrer noopener',
	)
);
$options[]                   = array(
	'id'        => $social_icon_section . '_bg_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Custom Background Color',
	
);
$options[]                   = array(
	'id'        => $social_icon_section . '_bg_hv_color',
	'type'      => 'authow-fw-color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Custom Background Hover Color',
	
);
$options[]                   = array(
	'id'        => $social_icon_section . '_border_color',
	'type'      => 'authow-fw-color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Custom Borders Color',
	
);
$options[]                   = array(
	'id'        => $social_icon_section . '_border_hv_color',
	'type'      => 'authow-fw-color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Custom Borders Hover Color',
	
);
$options[]                   = array(
	'id'        => $social_icon_section . '_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => 'Custom Color',
	
);
$options[]                   = array(
	'id'        => $social_icon_section . '_hv_color',
	'type'      => 'authow-fw-color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Custom Hover Color',
	
);

return $options;
/*$wp_customize->selective_refresh->add_partial( 'goso_header_pb_social_icon_mobile_section_icon_size', array(
	'selector'            => '.header-social.goso-builder-element',
	'settings'            => [
		'goso_header_pb_social_icon_mobile_section_icon_size',
		'goso_header_pb_social_icon_mobile_section_icon_w',
		'goso_header_pb_social_icon_mobile_section_icon_h',
		'goso_header_pb_social_icon_mobile_section_item_spacing',
		'goso_header_pb_social_icon_mobile_section_icon_style',
		'goso_header_pb_social_icon_mobile_section_icon_color',
		'goso_header_pb_social_icon_mobile_section_spacing',
		'goso_header_pb_social_icon_mobile_section_goso_rel_type_social',
		'goso_header_pb_social_icon_mobile_section_bg_color',
		'goso_header_pb_social_icon_mobile_section_bg_hv_color',
		'goso_header_pb_social_icon_mobile_section_border_color',
		'goso_header_pb_social_icon_mobile_section_border_hv_color',
		'goso_header_pb_social_icon_mobile_section_color',
		'goso_header_pb_social_icon_mobile_section_hv_color',
	],
	'container_inclusive' => true,
	'render_callback'     => function () {
		load_template( GOSO_BUILDER_PATH . '/elements/pb_social_icon_mobile/front-end.php' );
	},
	'fallback_refresh'    => false,
) );*/
