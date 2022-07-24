<?php
$options = [];
/*Filter Sidebar*/
$options[] = array(
	'id'       => 'pencidesign_woo_filter_widget_enable',
	'default'  => true,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Slidebar Filter ?',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_woo_fw_panel_pst',
	'default'  => 'side-right',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Slidebar Filter Position',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'side-right' => 'Side Right',
		'side-left'  => 'Side Left',
	)
);
$options[] = array(
	'id'       => 'pencidesign_woo_filter_widget_margin',
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Custom Space Between Widgets', 'authow' ),
	'ids'         => array(
		'desktop' => 'pencidesign_woo_filter_widget_margin',
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
	'id'       => 'pencidesign_woo_filter_widget_heading_lowcase',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Turn Off Uppercase Widget Heading',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'pencidesign_woo_filter_widget_heading_size',
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Custom Widget Heading Text Size', 'authow' ),
	'ids'         => array(
		'desktop' => 'pencidesign_woo_filter_widget_heading_size',
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
	'id'       => 'pencidesign_woo_filter_widget_heading_style',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Sidebar Widget Heading Style',
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
	'id'       => 'pencidesign_woo_filter_widget_heading_image_9',
	'default'  => '',
	'sanitize' => 'esc_url_raw',
	'type'     => 'authow-fw-image',
	'label'    => 'Custom Background Image for Style 9',
);
$options[] = array(
	'id'       => 'pencidesign_woo_filter_widget_heading9_repeat',
	'default'  => 'no-repeat',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Background Image Repeat for Style 9',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'no-repeat' => 'No Repeat',
		'repeat'    => 'Repeat'
	)
);
$options[] = array(
	'id'       => 'pencidesign_woo_filter_widget_heading_align',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Sidebar Widget Heading Align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''               => 'Default',
		'pcalign-center' => 'Center',
		'pcalign-left'   => 'Left',
		'pcalign-right'  => 'Right'
	)
);
$options[] = array(
	'id'       => 'pencidesign_woo_filter_widget_remove_border_outer',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Border Outer on Widget Heading',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'pencidesign_woo_filter_widget_remove_arrow_down',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Arrow Down on Widget Heading',
	'type'     => 'authow-fw-toggle',
);

return $options;
