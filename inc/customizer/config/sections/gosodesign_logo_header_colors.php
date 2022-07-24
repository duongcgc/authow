<?php
$options   = [];
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Slide Up Search Form', 'authow' ),
	'id'       => 'penci_section_searchform_color',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'id'       => 'penci_section_searchform_form_bg',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Search Form Background Color',
);
$options[] = array(
	'id'       => 'penci_section_searchform_top_border_cl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Search Form Border Top Color',
);
$options[] = array(
	'id'       => 'penci_section_searchform_text_bg',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Search Field Background Color',
);
$options[] = array(
	'id'       => 'penci_section_searchform_text_cl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Search Field Text Color',
);
$options[] = array(
	'id'       => 'penci_section_searchform_bd_cl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Search Field Border Color',
);
$options[] = array(
	'id'       => 'penci_section_searchform_btn_bg',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Submit Button Background Color',
);
$options[] = array(
	'id'       => 'penci_section_searchform_btn_hv_bg',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Submit Button Hover Background Color',
);
$options[] = array(
	'id'       => 'penci_section_searchform_btn_cl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Submit Button Text Color',
);
$options[] = array(
	'id'       => 'penci_section_searchform_btn_hv_cl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Submit Button Hover Text Color',
);

return $options;
