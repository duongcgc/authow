<?php
$options   = [];
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Select Sidebar Style',
	'id'       => 'penci_sidebar_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''                  => 'Default',
		'pcsb-boxed-whole'  => 'Boxed Whole Sidebar',
		'pcsb-boxed-widget' => 'Boxed Widgets on Sidebar',
	)
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Disable Boxed on "Custom HTML" widget?',
	'id'          => 'penci_sidebar_disable_phtml',
	'description' => __( 'This option just applies on "Custom HTML" widget & you\'ve selected sidebar style is "Boxed Widgets"', 'authow' ),
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Custom Padding Value on Boxed Sidebar Styles', 'authow' ),
	'id'       => 'penci_sidebar_padding',
	'ids'      => array(
		'desktop' => 'penci_sidebar_padding',
		'mobile'  => 'penci_sidebar_padding_mobile',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
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
	'type'     => 'authow-fw-hidden',
	'label'    => __( 'Custom Padding Value on Boxed Sidebar Styles', 'authow' ),
	'id'       => 'penci_sidebar_padding_mobile',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Select Borders Type on Sidebar Boxed Styles',
	'id'          => 'penci_sbbx_bdstyle',
	'description' => __( 'Some types need to adjust the borders width below to a minimum of 4px to see how it works.', 'authow' ),
	'type'        => 'authow-fw-select',
	'choices'     => array(
		''       => 'Default ( Solid )',
		'dotted' => 'Dotted',
		'dashed' => 'Dashed',
		'double' => 'Double',
		'groove' => 'Groove',
		'ridge'  => 'Ridge',
		'inset'  => 'Inset',
		'outset' => 'Outset',
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Custom Borders Width on Sidebar Boxed Styles', 'authow' ),
	'id'       => 'penci_sidebar_boxed_bdw',
	'ids'      => array(
		'desktop' => 'penci_sidebar_boxed_bdw',
	),
	'choices'  => array(
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
	'default'  => '29.1',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Sidebar Width', 'authow' ),
	'id'       => 'penci_sidebar_width',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'penci_sidebar_width',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 2000,
			'step'    => 1,
			'edit'    => true,
			'unit'    => '%',
			'default' => '29.1',
		),
	),
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'absint',
	'description' => __( 'This option will override the sidebar width set by % above. Default is 340px.', 'authow' ),
	'label'       => __( 'Custom Sidebar Width in Pixel', 'authow' ),
	'id'          => 'penci_sidebar_width_px',
	'type'        => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_sidebar_width_px',
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
	'default'  => '21.5',
	'sanitize' => 'absint',
	'label'    => __( 'Sidebar Width on Two Sidebars Layout', 'authow' ),
	'id'       => 'penci_2sidebar_width',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'penci_2sidebar_width',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 2000,
			'step'    => 1,
			'edit'    => true,
			'unit'    => '%',
			'default' => '21.5',
		),
	),
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'absint',
	'description' => __( 'This option will override the sidebar width set by % above. Default is 300px.', 'authow' ),
	'label'       => __( 'Sidebar Width on Two Sidebars Layout in Pixel', 'authow' ),
	'id'          => 'penci_2sidebar_width_px',
	'type'        => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_2sidebar_width_px',
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
	'default'  => '50',
	'sanitize' => 'absint',
	'label'    => __( 'Space Between Sidebar & Content', 'authow' ),
	'id'       => 'penci_sidebar_space',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'penci_sidebar_space',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 2000,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '50',
		),
	),

);
$options[] = array(
	'default'  => '60',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Space Between Widgets', 'authow' ),
	'id'       => 'penci_sidebar_widget_margin',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'penci_sidebar_widget_margin',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 2000,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '60',
		),
	),
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Turn Off Uppercase Widget Heading',
	'id'       => 'penci_sidebar_heading_lowcase',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Remove Border Bottom on the list in Widgets',
	'description' => __( 'This option will remove the border-bottom on widgets: Authow Latest Posts, Authow Popular Posts, Categories,...', 'authow' ),
	'id'          => 'penci_sidebar_rm_bdbottom',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => 'style-1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Sidebar Widget Heading Style',
	'id'       => 'penci_sidebar_heading_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'style-1'           => 'Default Style',
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
	'label'    => 'Custom Background Image for Style 9',
	'id'       => 'penci_sidebar_heading_image_8',
	'type'     => 'authow-fw-image',
);
$options[] = array(
	'default'  => 'no-repeat',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Background Image Repeat for Style 9',
	'id'       => 'penci_sidebar_heading8_repeat',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'no-repeat' => 'No Repeat',
		'repeat'    => 'Repeat'
	)
);
$options[] = array(
	'default'  => 'pcalign-center',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Sidebar Widget Heading Align',
	'id'       => 'penci_sidebar_heading_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'pcalign-center' => 'Center',
		'pcalign-left'   => 'Left',
		'pcalign-right'  => 'Right'
	)
);
$options[] = array(
	'default'  => 'pciconp-right',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Align Icon on Style 15',
	'id'       => 'penci_sidebar_icon_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'pciconp-right' => 'Right',
		'pciconp-left'  => 'Left',
	)
);
$options[] = array(
	'default'  => 'pcicon-right',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Custom Icon on Style 15',
	'id'       => 'penci_sidebar_icon_design',
	'type'     => 'authow-fw-select',
	'choices'  => array(
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
	'id'       => 'penci_sidebar_remove_border_outer',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Arrow Down on Widget Heading',
	'id'       => 'penci_sidebar_remove_arrow_down',
	'type'     => 'authow-fw-toggle',
);

return $options;
