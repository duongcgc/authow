<?php
$options   = [];
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Home Title Box Style',
	'id'       => 'penci_featured_cat_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''                  => 'Default( follow Sidebar )',
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
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Border Outer on Title Box',
	'id'       => 'penci_home_remove_border_outer',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Arrow Down on Title Box',
	'id'       => 'penci_home_remove_arrow_down',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'esc_url_raw',
	'type' => 'authow-fw-image',
	'label'    => 'Custom Background Image for Style 9',
	'id'       => 'penci_featured_cat_image_8',
);
$options[] = array(
	'default'  => 'no-repeat',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Background Image Repeat for Style 9',
	'id'       => 'penci_featured_cat8_repeat',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'no-repeat' => 'No Repeat',
		'repeat'    => 'Repeat'
	)
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Turn Off Uppercase on Home Title Box',
	'id'       => 'penci_home_featured_cat_lowcase',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => 'pcalign-left',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Homepage Featured Categories Title Box Align',
	'id'       => 'penci_featured_cat_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'pcalign-left'   => 'Left',
		'pcalign-center' => 'Center',
		'pcalign-right'  => 'Right'
	)
);
$options[] = array(
	'default'  => 'pcalign-center',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Homepage Heading Latest Post Titles Align',
	'id'       => 'penci_heading_latest_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'pcalign-center' => 'Center',
		'pcalign-left'   => 'Left',
		'pcalign-right'  => 'Right'
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Align Icon on Style 15',
	'id'       => 'penci_homep_icon_align',
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
	'id'       => 'penci_homep_icon_design',
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

return $options;
