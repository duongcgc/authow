<?php
$options   = [];
$options[] = array(
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Enable Post Meta Overlay Featured Image',
	'description' => 'This option just apply for Standard Layout Only',
	'id'          => 'goso_standard_meta_overlay',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Post Thumbnail',
	'id'       => 'goso_standard_thumbnail',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Disable Autoplay for Slider on Posts Format Gallery',
	'id'       => 'goso_standard_disable_autoplay_gallery',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Make Featured Image Auto Crop',
	'id'       => 'goso_standard_thumb_crop',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Enable Uppercase in Post Categories',
	'id'       => 'goso_standard_on_uppercase_cat',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Turn Off Uppercase in Post Title',
	'id'       => 'goso_standard_off_uppercase_title',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Share Box',
	'id'       => 'goso_standard_share_box',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Category',
	'id'       => 'goso_standard_cat',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Post Author',
	'id'       => 'goso_standard_author',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Reading Time',
	'id'       => 'goso_standard_readingtime',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Post Date',
	'id'       => 'goso_standard_date',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Hide Comment Count',
	'id'       => 'goso_standard_comment',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Show Views Count',
	'id'       => 'goso_standard_viewcount',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Remove Line Above Post Excerpt',
	'id'       => 'goso_standard_remove_line',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Display Post Excerpt Instead of Full Content',
	'id'       => 'goso_standard_auto_excerpt',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Disable Hover Effect on "Continue Reading" Button',
	'id'       => 'goso_standard_effect_button',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Make "Continue Reading" is A Button',
	'id'       => 'goso_standard_continue_reading_button',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => '30',
	'sanitize'    => 'absint',
	'label' => __( 'Custom Excerpt Length', 'authow' ),
	'id'          => 'goso_standard_excerpt_length',
	'type'        => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_standard_excerpt_length',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'     => '30',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Header Alignment',
	'id'       => 'goso_stahea_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''       => esc_html__( 'Default', 'authow' ),
		'left'   => esc_html__( 'Left', 'authow' ),
		'center' => esc_html__( 'Center', 'authow' ),
		'right'  => esc_html__( 'Right', 'authow' ),
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Post Excerpt Alignment',
	'id'       => 'goso_staex_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''        => esc_html__( 'Default', 'authow' ),
		'left'    => esc_html__( 'Left', 'authow' ),
		'center'  => esc_html__( 'Center', 'authow' ),
		'right'   => esc_html__( 'Right', 'authow' ),
		'justify' => esc_html__( 'Justify', 'authow' ),
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => '"Continue Reading" Button Alignment',
	'id'       => 'goso_stacoti_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''       => esc_html__( 'Default', 'authow' ),
		'left'   => esc_html__( 'Left', 'authow' ),
		'center' => esc_html__( 'Center', 'authow' ),
		'right'  => esc_html__( 'Right', 'authow' ),
	)
);

return $options;
