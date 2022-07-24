<?php
$options   = [];
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Infinity Scrolling Load Posts',
	'id'       => 'penci_loadnp_posts',
	'type'     => 'authow-fw-toggle',
);

$options[] = array(
	'default'     => 'prev',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Load Posts Type',
	'id'          => 'penci_loadnp_type',
	'description' => '',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'prev'     => 'Previous Posts',
		'next'     => 'Next Posts',
		'prev_cat' => 'Previous Posts has Same Categories',
		'next_cat' => 'Next Posts has Same Categories',
		'prev_tag' => 'Previous Posts has Same Tags',
		'next_tag' => 'Next Posts has Same Tags',
	)
);

$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => 'Exclude Specific Posts from Loads',
	'id'          => 'penci_loadnp_exclude',
	'description' => __( 'Exclude Posts by ID Separated by the comma. E.g: 12, 22, 335. You can check <a href="https://pagely.com/blog/find-post-id-wordpress/" target="_blank">this guide</a> to know how to find the ID of a post', 'authow' ),
	'type'        => 'authow-fw-textarea',
);

$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => 'Add Google Adsense/Custom HTML code Between Posts When Load Posts',
	'description' => __( 'If you use Google Ads here, please use normal Google Ads here - don\'t use Google Auto Ads to get it appears in the correct place.', 'authow' ),
	'id'          => 'penci_loadnp_ads',
	'type'        => 'authow-fw-textarea',
);

$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Custom Color for Loading Icon',
	'id'       => 'penci_loadnp_ldscolor',
);

return $options;
