<?php
$options   = [];
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'label'       => 'Custom Border Radius for Images on Category Mega Menu',
	'id'          => 'goso_megamenu_border_radius',
	'type'        => 'authow-fw-text',
	'description' => 'You can use pixel or percent. E.g:  <strong>10px</strong>  or  <strong>10%</strong>. If you want to disable border radius for it - fill 0',
);
$options[] = array(
	'default'  => 'horizontal',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Featured Images Type for Category Mega Menu',
	'id'       => 'goso_mega_featured_image_size',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'horizontal' => 'Horizontal Size',
		'square'     => 'Square Size',
		'vertical'   => 'Vertical Size',
		'custom'     => 'Custom',
	)
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'type'        => 'authow-fw-text',
	'label'       => 'Custom Aspect Ratio for Featured Images Type for Category Mega Menu',
	'id'          => 'goso_mega_featured_image_ratio',
	'description' => 'The aspect ratio of an element describes the proportional relationship between its width and its height. E.g: <strong>3:2</strong>. Default is 3:2 . This option apply  for <strong>Featured Images Type for Category Mega Menu is Custom</strong>',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide "All" tab on Category Mega Menu',
	'id'       => 'goso_topbar_mega_hide_alltab',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '8',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Words Length for Post Titles on Category Mega Menu', 'authow' ),
	'id'       => 'goso_megamenu_title_length',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_megamenu_title_length',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'     => '8',
		),
	),
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Enable Post Format Icons on Category Mega Menu',
	'id'       => 'goso_topbar_mega_icons',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Post Category On Category Mega Menu',
	'id'       => 'goso_topbar_mega_category',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Post Date On Category Mega Menu',
	'id'       => 'goso_topbar_mega_date',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Turn Off Uppercase Post Titles On Category Mega Menu',
	'id'       => 'goso_off_uppercase_cat_mega',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '12',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Child Categories On Category Mega Menu', 'authow' ),
	'id'       => 'goso_font_size_child_cat_mega',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_font_size_child_cat_mega',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'     => '12',
		),
	),
);
$options[] = array(
	'default'  => '10',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Category Name On Category Mega Menu', 'authow' ),
	'id'       => 'goso_font_size_cat_mega',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_font_size_cat_mega',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'     => '10',
		),
	),
);
$options[] = array(
	'default'  => '12',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Post Titles On Category Mega Menu', 'authow' ),
	'id'       => 'goso_font_size_title_cat_mega',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_font_size_title_cat_mega',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'     => '12',
		),
	),
);
$options[] = array(
	'default'  => '12',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Post Date On Category Mega Menu', 'authow' ),
	'id'       => 'goso_font_size_date_mega',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_font_size_date_mega',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'     => '12',
		),
	),
);

return $options;
