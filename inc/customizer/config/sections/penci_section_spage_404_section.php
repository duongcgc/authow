<?php
$options          = [];
$page_options     = [];
$page_options[''] = '- Default Theme Template -';
$page_layouts     = get_pages();
foreach ( $page_layouts as $page_builder ) {
	$page_options[ $page_builder->post_name ] = $page_builder->post_title;
}
$options   = [];
$options[] = array(
	'id'          => 'fof_page',
	'default'     => '',
	'sanitize'    => 'penci_sanitize_choices_field',
	'type'        => 'authow-fw-select',
	'label'       => esc_html__( '404 Page Template', 'authow' ),
	'description' => esc_html__( 'Select the page you\'ve buit with the Elementor.', 'authow' ),
	'choices'     => $page_options,
);
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'type'     => 'authow-fw-image',
	'label'    => '404 Custom Main Image',
	'id'       => 'penci_not_found_image',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Line Below Main Image',
	'id'       => 'penci_not_found_removeline',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => "OOPS! Page you're looking for doesn't exist. Please use search for help",
	'sanitize' => 'penci_sanitize_textarea_field',
	'label'    => '404 Custom Message Text',
	'id'       => 'penci_not_found_sub_heading',
	'type'     => 'authow-fw-textarea',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Search Form',
	'id'       => 'penci_not_found_hide_search',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide "BACK TO HOME PAGE"',
	'id'       => 'penci_not_found_hide_backhome',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Message Text', 'authow' ),
	'id'       => 'penci_notfound_message_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'penci_notfound_message_fsize',
	),
	'choices'  => array(
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
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Text on Search Form', 'authow' ),
	'id'       => 'penci_notfound_input_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'penci_notfound_input_fsize',
	),
	'choices'  => array(
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
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for "Back To Homepage"', 'authow' ),
	'id'       => 'penci_notfound_backhome_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'penci_notfound_backhome_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);

return $options;
