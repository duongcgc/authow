<?php
$options   = [];
$options[] = array(
	'label'       => 'Font For Heading Titles',
	'id'          => 'penci_font_for_title',
	'description' => 'Default font is "Raleway"',
	'type'        => 'authow-fw-select',
	'choices'     => penci_all_fonts(),
	'default'     => '"Raleway", "100:200:300:regular:500:600:700:800:900", sans-serif',
	'sanitize'    => 'penci_sanitize_choices_field'
);
$options[] = array(
	'label'    => 'Font Weight For Heading Titles',
	'id'       => 'penci_font_weight_title',
	'type'     => 'authow-fw-select',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'choices'  => array(
		''        => '- Select -',
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
	'label'       => 'Font For Body Text',
	'id'          => 'penci_font_for_body',
	'description' => 'Default font is "PT Serif"',
	'type'        => 'authow-fw-select',
	'choices'     => penci_all_fonts(),
	'default'     => '"PT Serif", "regular:italic:700:700italic", serif',
	'sanitize'    => 'penci_sanitize_choices_field'
);
$options[] = array(
	'label'    => 'Font Weight For Body Text',
	'id'       => 'penci_font_weight_bodytext',
	'type'     => 'authow-fw-select',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'choices'  => array(
		''        => '- Select -',
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
	'label'    => '',
	'id'       => 'penci_font_mfor_size_body',
	'type'     => 'authow-fw-hidden',
	'sanitize' => 'absint',
	'default'  => '14',
);
$options[] = array(
	'label'    => 'General Font Size for Text',
	'id'       => 'penci_font_for_size_body',
	'type'     => 'authow-fw-size',
	'default'  => '14',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'penci_font_for_size_body',
		'mobile'  => 'penci_font_mfor_size_body',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '14',
		),
		'mobile'  => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '14',
		),
	),
);
$options[] = array(
	'label'    => __( 'General Line Height for Text', 'authow' ),
	'type'     => 'authow-fw-size',
	'id'       => 'penci_body_line_height',
	'default'  => '1.8',
	'sanitize' => 'penci_sanitize_decimal_empty_field',
	'ids'      => array(
		'desktop' => 'penci_body_line_height',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '1.8',
		),
	),
);
$options[] = array(
	'label'    => '',
	'id'       => 'penci_archive_mobile_fpagetitle',
	'type'     => 'authow-fw-hidden',
	'sanitize' => 'absint',
	'default'  => '16',
);
$options[] = array(
	'label'       => 'Font Size for Archive Page Title',
	'description' => 'Apply for Category Page Title, Tag Page Title, Search Page Title, Archive Page Title - check more on <a href="https://imgresources.s3.amazonaws.com/archive-page-title.png" target="_blank">this image</a>',
	'id'          => 'penci_archive_fpagetitle',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'default'     => '24',
	'ids'         => array(
		'desktop' => 'penci_archive_fpagetitle',
		'mobile'  => 'penci_archive_mobile_fpagetitle',
	),
	'choices'     => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '24',
		),
		'mobile'  => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '16',
		),
	),
);
$options[] = array(
	'label'    => 'Disable Uppercase on Archive Page Title',
	'id'       => 'penci_archive_uppagetitle',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'id'       => 'penci_body_breadcrumbs',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Breadcrumbs', 'authow' ),
	'default'  => '13',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'penci_body_breadcrumbs',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '13',
		),
	),
);
$options[] = array(
	'label'    => __( 'Font Size for "Load More Posts" & Pagination Button', 'authow' ),
	'id'       => 'penci_home_loadmore_size',
	'type'     => 'authow-fw-size',
	'default'  => '12',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'penci_home_loadmore_size',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '12',
		),
	),
);

return $options;
