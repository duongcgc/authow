<?php
$options   = [];
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => esc_html__( 'Enable Page Header for Pages', 'authow' ),
	'type'     => 'authow-fw-toggle',
	'id'       => 'penci_pheader_show',
);
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => esc_html__( 'Background Image for Page Header', 'authow' ),
	'id'       => 'penci_pheader_bgimg',
	'type'     => 'authow-fw-image',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => esc_html__( 'Hide Line Below Title', 'authow' ),
	'type'     => 'authow-fw-toggle',
	'id'       => 'penci_pheader_hideline',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => esc_html__( 'Hide Breadcrumbs', 'authow' ),
	'type'     => 'authow-fw-toggle',
	'id'       => 'penci_pheader_hidebead',
);
$options[] = array(
	'default'  => 'center',
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Text Align', 'authow' ),
	'id'       => 'penci_pheader_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'left'   => esc_html__( 'Left', 'authow' ),
		'center' => esc_html__( 'Center', 'authow' ),
		'right'  => esc_html__( 'Right', 'authow' ),
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'By default, container width for page header will follow the container width for header', 'authow' ),
	'id'       => 'penci_pheader_width',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_pheader_width',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Padding top', 'authow' ),
	'id'       => 'penci_pheader_ptop',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_pheader_ptop',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Padding Bottom', 'authow' ),
	'id'       => 'penci_pheader_pbottom',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_pheader_pbottom',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);

$options[] = array(
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => esc_html__( 'Turn Off Uppercase for Title', 'authow' ),
	'type'     => 'authow-fw-toggle',
	'id'       => 'penci_pheader_turn_offup',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Padding Bottom for Page Title', 'authow' ),
	'id'       => 'penci_pheader_title_pbottom',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_pheader_title_pbottom',
		'mobile' => 'penci_pheader_title_mbottom',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Margin Bottom for Page Title', 'authow' ),
	'id'       => 'penci_pheader_title_mbottom',
	'type'     => 'authow-fw-hidden',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Page Title', 'authow' ),
	'id'       => 'penci_pheader_title_fsize',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_pheader_title_fsize',
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
	'default'  => '600',
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Font Weight For Title', 'authow' ),
	'id'       => 'penci_pheader_fwtitle',
	'type'     => 'authow-fw-select',
	'choices'  => array(
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
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Breadcrumb on Page Header', 'authow' ),
	'id'       => 'penci_pheader_bread_fsize',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_pheader_bread_fsize',
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

return $options;
