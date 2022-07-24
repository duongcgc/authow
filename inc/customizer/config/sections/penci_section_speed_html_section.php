<?php
$options   = [];
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Minify HTML',
	'description' => __( "Minify HTML won't apply for admin users logged in, so let check how it works without logged in.", "authow" ),
	'id'          => 'penci_speed_html_minify',
	'type'        => 'authow-fw-toggle',
);
return $options;
