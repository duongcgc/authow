<?php
$options   = [];
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Enable Post Meta Overlay Featured Image',
	'description' => 'This option just apply for Standard Layout Only',
	'id'          => 'penci_standard_meta_overlay',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Post Thumbnail',
	'id'       => 'penci_standard_thumbnail',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Autoplay for Slider on Posts Format Gallery',
	'id'       => 'penci_standard_disable_autoplay_gallery',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Make Featured Image Auto Crop',
	'id'       => 'penci_standard_thumb_crop',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Uppercase in Post Categories',
	'id'       => 'penci_standard_on_uppercase_cat',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Turn Off Uppercase in Post Title',
	'id'       => 'penci_standard_off_uppercase_title',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Share Box',
	'id'       => 'penci_standard_share_box',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Category',
	'id'       => 'penci_standard_cat',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Post Author',
	'id'       => 'penci_standard_author',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Reading Time',
	'id'       => 'penci_standard_readingtime',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Post Date',
	'id'       => 'penci_standard_date',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Comment Count',
	'id'       => 'penci_standard_comment',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Show Views Count',
	'id'       => 'penci_standard_viewcount',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Line Above Post Excerpt',
	'id'       => 'penci_standard_remove_line',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Display Post Excerpt Instead of Full Content',
	'id'       => 'penci_standard_auto_excerpt',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Hover Effect on "Continue Reading" Button',
	'id'       => 'penci_standard_effect_button',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Make "Continue Reading" is A Button',
	'id'       => 'penci_standard_continue_reading_button',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => '30',
	'sanitize'    => 'absint',
	'label' => __( 'Custom Excerpt Length', 'authow' ),
	'id'          => 'penci_standard_excerpt_length',
	'type'        => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'penci_standard_excerpt_length',
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
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Header Alignment',
	'id'       => 'penci_stahea_align',
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
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Post Excerpt Alignment',
	'id'       => 'penci_staex_align',
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
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => '"Continue Reading" Button Alignment',
	'id'       => 'penci_stacoti_align',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''       => esc_html__( 'Default', 'authow' ),
		'left'   => esc_html__( 'Left', 'authow' ),
		'center' => esc_html__( 'Center', 'authow' ),
		'right'  => esc_html__( 'Right', 'authow' ),
	)
);

return $options;
