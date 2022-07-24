<?php
$options   = [];
$options[] = [
	'id'          => 'goso_custom_css',
	'transport'   => 'refresh',
	'type'        => 'authow-fw-textarea',
	'label'       => esc_html__( 'Custom CSS', 'authow' ),
	'input_attrs' => array(
		'aria-describedby' => 'editor-keyboard-trap-help-1 editor-keyboard-trap-help-2 editor-keyboard-trap-help-3 editor-keyboard-trap-help-4',
	),
];

return $options;
