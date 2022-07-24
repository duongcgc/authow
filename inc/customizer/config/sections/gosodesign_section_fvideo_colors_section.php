<?php
$options   = [];
$options[] = array(
	'label'    => 'Heading Text Color',
	'id'       => 'goso_featured_video_heading_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);
$options[] = array(
	'label'    => 'Sub Heading Text Color',
	'id'       => 'goso_featured_video_sub_heading_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color'
);

return $options;
