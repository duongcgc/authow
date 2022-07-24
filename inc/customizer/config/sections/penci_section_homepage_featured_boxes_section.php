<?php
$options   = [];
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Home Featured Boxes',
	'id'       => 'penci_home_hide_boxes',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Home Featured Boxes Style 2',
	'id'       => 'penci_home_box_style_2',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Home Featured Boxes Style 3',
	'id'       => 'penci_home_box_style_3',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => 'normal',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Custom Font Weight for Text on Featured Boxes',
	'id'       => 'penci_home_box_weight',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'bold'   => 'Bold',
		'normal' => 'Normal'
	)
);
$options[] = array(
	'default'  => '3',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Home Featured Boxes Columns',
	'id'       => 'penci_home_box_column',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'3' => '3 Columns',
		'4' => '4 Columns'
	)
);
$options[] = array(
	'default'  => 'horizontal',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Home Featured Boxes Size Type',
	'id'       => 'penci_home_box_type',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'horizontal' => 'Horizontal Size',
		'square'     => 'Square Size',
		'vertical'   => 'Vertical Size'
	)
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Open Home Featured Boxes in New Tab',
	'id'       => 'penci_home_boxes_new_tab',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => 'Homepage Featured Box 1st Image',
	'id'       => 'penci_home_box_img1',
	'type'     => 'authow-fw-image',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 1st Text',
	'id'       => 'penci_home_box_text1',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 1st URL',
	'id'       => 'penci_home_box_url1',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => 'Homepage Featured Box 2nd Image',
	'id'       => 'penci_home_box_img2',
	'type'     => 'authow-fw-image',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 2nd Text',
	'id'       => 'penci_home_box_text2',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 2nd URL',
	'id'       => 'penci_home_box_url2',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => 'Homepage Featured Box 3rd Image',
	'id'       => 'penci_home_box_img3',
	'type'     => 'authow-fw-image',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 3rd Text',
	'id'       => 'penci_home_box_text3',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 3rd URL',
	'id'       => 'penci_home_box_url3',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => 'Homepage Featured Box 4th Image',
	'id'       => 'penci_home_box_img4',
	'type'     => 'authow-fw-image',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 4th Text',
	'id'       => 'penci_home_box_text4',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 4th URL',
	'id'       => 'penci_home_box_url4',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => 'Homepage Featured Box 5th Image',
	'id'       => 'penci_home_box_img5',
	'type'     => 'authow-fw-image',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 5th Text',
	'id'       => 'penci_home_box_text5',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 5th URL',
	'id'       => 'penci_home_box_url5',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => 'Homepage Featured Box 6th Image',
	'id'       => 'penci_home_box_img6',
	'type'     => 'authow-fw-image',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 6th Text',
	'id'       => 'penci_home_box_text6',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 6th URL',
	'id'       => 'penci_home_box_url6',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => 'Homepage Featured Box 7th Image',
	'id'       => 'penci_home_box_img7',
	'type'     => 'authow-fw-image',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 7th Text',
	'id'       => 'penci_home_box_text7',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 7th URL',
	'id'       => 'penci_home_box_url7',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => 'Homepage Featured Box 8th Image',
	'id'       => 'penci_home_box_img8',
	'type'     => 'authow-fw-image',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 8th Text',
	'id'       => 'penci_home_box_text8',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 8th URL',
	'id'       => 'penci_home_box_url8',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => 'Homepage Featured Box 9th Image',
	'id'       => 'penci_home_box_img9',
	'type'     => 'authow-fw-image',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 9th Text',
	'id'       => 'penci_home_box_text9',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Homepage Featured Box 9th URL',
	'id'       => 'penci_home_box_url9',
	'type'     => 'authow-fw-text',
);

return $options;
