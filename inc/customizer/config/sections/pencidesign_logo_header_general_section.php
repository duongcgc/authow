<?php
$options               = [];
$header_layout_options = array(
	'header-1'  => 'Header 1',
	'header-2'  => 'Header 2',
	'header-3'  => 'Header 3',
	'header-4'  => 'Header 4 ( Centered )',
	'header-5'  => 'Header 5 ( Centered )',
	'header-6'  => 'Header 6',
	'header-7'  => 'Header 7',
	'header-8'  => 'Header 8',
	'header-9'  => 'Header 9',
	'header-10' => 'Header 10',
	'header-11' => 'Header 11',
);
$options[]             = array(
	'default'  => 'header-1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Header Layout',
	'id'       => 'penci_header_layout',
	'type'     => 'authow-fw-select',
	'choices'  => $header_layout_options,
);
$options[]             = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Custom Header Container Width',
	'id'       => 'penci_header_ctwidth',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''          => esc_html__( 'Width: 1170px', 'authow' ),
		'1400'      => esc_html__( 'Width: 1400px', 'authow' ),
		'fullwidth' => esc_html__( 'FullWidth', 'authow' ),
	)
);
$options[]             = array(
	'sanitize'    => 'esc_url_raw',
	'type'        => 'authow-fw-image',
	'label'       => 'Banner Header Right For Header 3',
	'id'          => 'penci_header_3_banner',
	'description' => 'You should choose banner with 728px width and 90px - 100px height for the best result',
);
$options[]             = array(
	'default'     => '#',
	'sanitize'    => 'esc_url_raw',
	'label'       => 'Link To Go When Click Banner Header Right on Header 3',
	'id'          => 'penci_header_3_banner_url',
	'description' => '',
	'type'        => 'authow-fw-text',
);
$options[]             = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => 'Google adsense/custom HTML code to display in header 3',
	'id'          => 'penci_header_3_adsense',
	'description' => 'If you want use google adsense/custom HTML code in header style 3, paste your google adsense/custom HTML code here',
	'type'        => 'authow-fw-textarea',
);
$options[]             = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Remove Border Bottom on The Header',
	'id'          => 'penci_remove_border_bottom_header',
	'description' => 'This option just apply for header styles 1, 4, 7',
	'type'        => 'authow-fw-toggle',
);
$options[]             = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Header Social Icons',
	'id'       => 'penci_header_social_check',
	'type'     => 'authow-fw-toggle',
);
$options[]             = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Use Brand Colors for Social Icons on Header',
	'id'       => 'penci_header_social_brand',
	'type'     => 'authow-fw-toggle',
);
$options[]             = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Font Size for Social Icons', 'authow' ),
	'id'       => 'penci_size_header_social_check',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_size_header_social_check',
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
$options[]             = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Display Top Instagram Widget Title Overlay Images',
	'id'       => 'penci_top_insta_overlay_image',
	'type'     => 'authow-fw-toggle',
);
$options[]             = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Instagram Icon on Top Instagram Widget',
	'id'       => 'penci_top_insta_hide_icon',
	'type'     => 'authow-fw-toggle',
);
$options[]             = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_textarea_field',
	'label'    => 'Add Custom Code Inside &lt;head&gt; tag',
	'id'       => 'penci_custom_code_inside_head_tag',
	'type'     => 'authow-fw-textarea',
);
$options[]             = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_textarea_field',
	'label'    => 'Add Custom Code After &lt;body&gt; tag',
	'id'       => 'penci_custom_code_after_body_tag',
	'type'     => 'authow-fw-textarea',
);
/* Slogan Text */
$options[] = array(
	'default'     => 'keep your memories alive',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => 'Header Slogan Text',
	'id'          => 'penci_header_slogan_text',
	'description' => 'If you want to hide the slogan text, let make it blank',
	'type'        => 'authow-fw-textarea',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove the Lines on Left & Right of Header Slogan',
	'id'       => 'penci_header_remove_line_slogan',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Slogan', 'authow' ),
	'id'       => 'penci_font_size_slogan',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_font_size_slogan',
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
	'default'     => '"PT Serif", "regular:italic:700:700italic", serif',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Font For Header Slogan',
	'id'          => 'penci_font_for_slogan',
	'description' => 'Default font is "PT Serif"',
	'type'        => 'authow-fw-select',
	'choices'     => penci_all_fonts()
);
$options[] = array(
	'default'  => 'bold',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Font Weight For Slogan',
	'id'       => 'penci_font_weight_slogan',
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
	'default'  => 'italic',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Font Style for Slogan',
	'id'       => 'penci_font_style_slogan',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'italic' => 'Italic',
		'normal' => 'Normal'
	)
);

return $options;
