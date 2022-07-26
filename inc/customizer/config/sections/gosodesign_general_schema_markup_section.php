<?php
$options   = [];
$options[] = array(
	'label'    => 'Custom General Logo for Schema Markup',
	'type'     => 'authow-fw-image',
	'id'       => 'goso_logo_schema',
	'sanitize' => 'esc_url_raw'
);
$options[] = array(
	'label'    => 'Remove WPHeader Schema Data',
	'id'       => 'goso_schema_wphead',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Remove WPFooter Schema Data',
	'id'       => 'goso_schema_wpfoot',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Remove Site Navigation Schema Data',
	'id'       => 'goso_schema_sitenav',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Remove Hentry Schema Data',
	'id'       => 'goso_schema_hentry',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Remove General Organization Schema Data',
	'id'       => 'goso_schema_organization',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Remove Website Schema Data',
	'id'       => 'goso_schema_website',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Remove Breadcrumbs Schema Data',
	'id'       => 'goso_schema_breadcrumbs',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Remove Schema Data for Single Posts/Pages',
	'id'       => 'goso_schema_single',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Use NewsArticle Schema for All Posts',
	'id'       => 'goso_post_use_newsarticle',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field'
);

return $options;
