<?php
$options   = [];
$options[] = array(
	'id'       => 'penci_toc_enabled_post_types',
	'default'  => '',
	'sanitize' => 'penci_sanitize_multiple_checkbox',
	'label'    => 'Enable Support in Post Types',
	'type'     => 'authow-fw-select',
	'multiple' => 999,
	'choices'  => call_user_func( function () {
		$exclude    = array(
			'attachment',
			'revision',
			'nav_menu_item',
			'safecss',
			'penci-block',
			'penci_builder',
			'custom-post-template',
			'archive-template',
		);
		$registered = get_post_types( [ 'show_in_nav_menus' => true ], 'objects' );
		$types      = array();


		foreach ( $registered as $post ) {

			if ( in_array( $post->name, $exclude ) ) {

				continue;
			}

			$types[ $post->name ] = $post->label;
		}

		return $types;
	} )
);
$options[] = array(
	'id'       => 'penci_toc_position',
	'default'  => 'top',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Insert Table of Contents To',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'top'    => __( 'Before Post Content (Default)', 'authow' ),
		'bottom' => __( 'After Post Content', 'authow' ),
		'before' => __( 'Before First Heading', 'authow' ),
		'after'  => __( 'After First Heading', 'authow' ),
	]
);
$options[] = array(
	'default'  => 's1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Table of Contents Style',
	'id'       => 'penci_toc_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		's1' => __( 'Default', 'authow' ),
		's2' => __( 'Shadow', 'authow' ),
		's3' => __( 'Background', 'authow' ),
	)
);
$options[] = array(
	'default'  => 'left',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Sticky Position',
	'id'       => 'penci_toc_sticky',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'left'                => __( 'Top Left', 'authow' ),
		'right'               => __( 'Top Right', 'authow' ),
		'bottom sticky-left'  => __( 'Bottom Left', 'authow' ),
		'bottom sticky-right' => __( 'Bottom Right', 'authow' ),
		'disable'             => __( 'Disable', 'authow' ),
	)
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'absint',
	'type'        => 'authow-fw-size',
	'label'       => 'Width',
	'description' => 'Enter the custom table of contents width.',
	'id'          => 'penci_toc_styles_width',
	'ids'         => array(
		'desktop' => 'penci_toc_styles_width',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 9999,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'absint',
	'type'        => 'authow-fw-size',
	'label'       => 'Sticky Width',
	'description' => 'Enter the custom table of contents width when sticky.',
	'id'          => 'penci_toc_styles_swidth',
	'ids'         => array(
		'desktop' => 'penci_toc_styles_swidth',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 9999,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'  => 'none',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Table of Contents Float',
	'id'       => 'penci_toc_wrapping',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'none'  => __( 'None', 'authow' ),
		'left'  => __( 'Float Left', 'authow' ),
		'right' => __( 'Float Right', 'authow' ),
	)
);
$options[] = array(
	'id'          => 'penci_toc_start',
	'default'     => '3',
	'sanitize'    => 'penci_sanitize_number_field',
	'label'       => 'Show Table of Contents for Posts has How Many Minimum Heading Tags',
	'description' => 'By default, the table of contents does not show if the posts has lower than 3 heading tags',
	'type'        => 'authow-fw-number',
);
$options[] = array(
	'id'       => 'penci_toc_heading_text',
	'default'  => 'Table of Contents',
	'sanitize' => 'penci_sanitize_textarea_field',
	'label'    => 'Header Label',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'id'          => 'penci_toc_visibility',
	'default'     => '',
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Disable Toggle View',
	'description' => 'Disallow the user to toggle the visibility of the table of contents.',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'penci_toc_visibility_hide_by_default',
	'default'     => '',
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Always hide the table of contents',
	'description' => 'Only display the table heading. Initially hide the table of contents.',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_toc_show_hierarchy',
	'default'  => true,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Show as Hierarchy',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_toc_counter',
	'default'  => 'decimal',
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Counter',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'decimal' => __( 'Decimal (default)', 'authow' ),
		'numeric' => __( 'Numeric', 'authow' ),
		'roman'   => __( 'Roman', 'authow' ),
		'none'    => __( 'None', 'authow' ),
	]
);
$options[] = array(
	'id'       => 'penci_toc_smooth_scroll',
	'default'  => true,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Smooth Scroll',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'label'    => esc_html__( 'Advanced Settings', 'authow' ),
	'id'       => 'penci_toc_advanced_head_1',
	'type'     => 'authow-fw-header',
	'sanitize' => 'sanitize_text_field'
);
$options[] = array(
	'id'       => 'penci_toc_levels',
	'default'  => 3,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Maximum Level of Table of Contents',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'1' => __( '1', 'authow' ),
		'2' => __( '2', 'authow' ),
		'3' => __( '3', 'authow' ),
		'4' => __( '4', 'authow' ),
		'5' => __( '5', 'authow' ),
		'6' => __( '6', 'authow' ),
	],
);
$options[] = array(
	'id'       => 'penci_toc_prefix',
	'default'  => 'penci',
	'sanitize' => 'penci_sanitize_text_field',
	'label'    => 'Link Anchor Prefix',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'id'       => 'penci_toc_heading_levels',
	'default'  => [ '1', '2', '3', '4', '5', '6' ],
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Headings',
	'type'     => 'authow-fw-select',
	'multiple' => 999,
	'choices'  => [
		'1' => __( 'Heading 1 (h1)', 'authow' ),
		'2' => __( 'Heading 2 (h2)', 'authow' ),
		'3' => __( 'Heading 3 (h3)', 'authow' ),
		'4' => __( 'Heading 4 (h4)', 'authow' ),
		'5' => __( 'Heading 5 (h5)', 'authow' ),
		'6' => __( 'Heading 6 (h6)', 'authow' ),
	],
);

$options[] = array(
	'id'          => 'penci_toc_exclude',
	'sanitize'    => 'penci_sanitize_text_field',
	'label'       => 'Exclude Headings',
	'description' => 'Specify headings to be excluded from appearing in the table of contents. Separate multiple headings with a pipe |. Use an asterisk * as a wildcard to match other text.',
	'type'        => 'authow-fw-text',
);
$options[] = array(
	'id'          => 'penci_toc_smooth_scroll_offset',
	'sanitize'    => 'absint',
	'default'    =>  '120',
	'label'       => 'Smooth Scroll Offset',
	'description' => 'If you have a consistent menu across the top of your site, you can adjust the top offset to stop the headings from appearing underneath the top menu. A setting of 30 accommodates the WordPress admin bar. This setting only has an effect after you have enabled Smooth Scroll option.',
	'type'        => 'authow-fw-number',
);
$options[] = array(
	'id'          => 'penci_toc_mobile_smooth_scroll_offset',
	'sanitize'    => 'absint',
	'default'    =>  '90',
	'label'       => 'Mobile Smooth Scroll Offset',
	'description' => 'This provides the same function as the Smooth Scroll Offset option above but applied when the user is visiting your site on a mobile device.',
	'type'        => 'authow-fw-number',
);
$options[] = array(
	'id'       => 'penci_toc_nofollow_link',
	'sanitize' => 'absint',
	'label'    => 'Add "no-follow" to table of contents link.',
	'type'     => 'authow-fw-toggle',
);

return $options;
