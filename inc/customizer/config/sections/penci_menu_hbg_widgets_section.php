<?php
$options   = [];
$options[] = array(
	'default'     => '',
	'sanitize'    => 'absint',
	'type'        => 'authow-fw-size',
	'label' => __( 'Custom Space Between Widgets', 'authow' ),
	'id'          => 'penci_mhbg_widget_margin',
	'ids'         => array(
		'desktop' => 'penci_mhbg_widget_margin',
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
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Turn Off Uppercase Widget Heading',
	'id'       => 'penci_mhbgwidget_heading_lowcase',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'absint',
	'type'        => 'authow-fw-size',
	'label' => __( 'Custom Widget Heading Text Size', 'authow' ),
	'id'          => 'penci_mhbgwidget_heading_size',
	'ids'         => array(
		'desktop' => 'penci_mhbgwidget_heading_size',
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
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Sidebar Widget Heading Style',
	'id'       => 'penci_mhbgwidget_heading_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''                  => 'Default',
		'style-1'           => 'Style 1',
		'style-2'           => 'Style 2',
		'style-3'           => 'Style 3',
		'style-4'           => 'Style 4',
		'style-5'           => 'Style 5',
		'style-6'           => 'Style 6 - Only Text',
		'style-7'           => 'Style 7',
		'style-9'           => 'Style 8',
		'style-8'           => 'Style 9 - Custom Background Image',
		'style-10'          => 'Style 10',
		'style-11'          => 'Style 11',
		'style-12'          => 'Style 12',
		'style-13'          => 'Style 13',
		'style-14'          => 'Style 14',
		'style-15'          => 'Style 15',
		'style-16'          => 'Style 16',
		'style-2 style-17'  => 'Style 17',
		'style-18'          => 'Style 18',
		'style-18 style-19' => 'Style 19',
		'style-18 style-20' => 'Style 20',
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'esc_url_raw',
	'type'     => 'authow-fw-image',
	'label'    => 'Custom Background Image for Style 9',
	'id'       => 'penci_mhbgwidget_heading_image_9',
);
$options[] = array(
	'default'  => 'no-repeat',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Background Image Repeat for Style 9',
	'id'       => 'penci_mhbgwidget_heading9_repeat',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'no-repeat' => 'No Repeat',
		'repeat'    => 'Repeat'
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Sidebar Widget Heading Align',
	'id'       => 'penci_mhbgwidget_heading_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''               => 'Default',
		'pcalign-center' => 'Center',
		'pcalign-left'   => 'Left',
		'pcalign-right'  => 'Right'
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Align Icon on Style 15',
	'id'       => 'penci_hbg_icon_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''              => 'Default( follow Sidebar )',
		'pciconp-right' => 'Right',
		'pciconp-left'  => 'Left',
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Custom Icon on Style 15',
	'id'       => 'penci_hbg_icon_design',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''             => 'Default( follow Sidebar )',
		'pcicon-right' => 'Arrow Right',
		'pcicon-left'  => 'Arrow Left',
		'pcicon-down'  => 'Arrow Down',
		'pcicon-up'    => 'Arrow Up',
		'pcicon-star'  => 'Star',
		'pcicon-bars'  => 'Bars',
		'pcicon-file'  => 'File',
		'pcicon-fire'  => 'Fire',
		'pcicon-book'  => 'Book',
	)
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Border Outer on Widget Heading',
	'id'       => 'penci_mhbgwidget_remove_border_outer',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Arrow Down on Widget Heading',
	'id'       => 'penci_mhbgwidget_remove_arrow_down',
	'type'     => 'authow-fw-toggle',
);

return $options;
