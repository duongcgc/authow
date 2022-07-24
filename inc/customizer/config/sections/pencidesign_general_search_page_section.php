<?php
$options   = [];
$options[] = array(
	'label'    => 'Include Pages on Search Results Page',
	'id'       => 'penci_include_search_page',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);

return $options;
