<?php
$options   = [];
$options[] = array(
	'id'       => 'goso_agepopup_enable',
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Enable age verification popup ',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_agepopup_message',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_textarea_field',
	'label'       => 'Popup Message',
	'description' => 'Write a message warning your visitors about age restriction on your website',
	'type'        => 'authow-fw-textarea',
);
$options[] = array(
	'id'          => 'goso_agepopup_error_message',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_textarea_field',
	'label'       => 'Error Message',
	'description' => 'This message will be displayed when the visitor don\'t verify his age.',
	'type'        => 'authow-fw-textarea',
);
$options[] = array(
	'id'       => 'goso_agepopup_agree_text',
	'default'  => 'I am 18 or Older',
	'sanitize' => 'goso_sanitize_tex_field',
	'label'    => 'Agree Text',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'id'       => 'goso_agepopup_cancel_text',
	'default'  => 'I am Under 18',
	'sanitize' => 'goso_sanitize_tex_field',
	'label'    => 'Cancel Text',
	'type'     => 'authow-fw-text',
);
/* Style & Size */
$options[] = array(
	'id'       => 'goso_heading_ageverify',
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Popup Content Styles', 'authow' ),
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'id'       => 'goso_agepopup_animation',
	'default'  => 'move-to-top',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Popup Open Animation',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'move-to-left'   => 'Move To Left',
		'move-to-right'  => 'Move To Right',
		'move-to-top'    => 'Move To Top',
		'move-to-bottom' => 'Move To Bottom',
		'fadein'         => 'Fade In',
	]
);
$options[] = array(
	'id'       => 'goso_agepopup_bgimg',
	'default'  => '',
	'type'     => 'authow-fw-image',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Popup Background Image',
);
$options[] = array(
	'id'          => 'goso_agepopup_bgcolor',
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'label'       => 'Popup Background Color',
	'type'        => 'authow-fw-color',
	'description' => 'Set background image or color for age popup',
);
$options[] = array(
	'id'       => 'goso_agepopup_bgrepeat',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Popup Background Repeat',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'repeat'    => 'repeat',
		'repeat-x'  => 'repeat-x',
		'repeat-y'  => 'repeat-y',
		'no-repeat' => 'no-repeat',
		'initial'   => 'initial',
		'inherit'   => 'inherit'
	]
);
$options[] = array(
	'id'       => 'goso_agepopup_bgposition',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Popup Background Position',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'left top'      => 'left top',
		'left center'   => 'left center',
		'left bottom'   => 'left bottom',
		'right top'     => 'right top',
		'right center'  => 'right center',
		'right bottom'  => 'right bottom',
		'center top'    => 'center top',
		'center center' => 'center center',
		'center bottom' => 'center bottom',
	]
);
$options[] = array(
	'id'       => 'goso_agepopup_bgsize',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Popup Background Size',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'auto'    => 'auto',
		'length'  => 'length',
		'cover'   => 'cover',
		'contain' => 'contain',
		'initial' => 'initial',
		'inherit' => 'inherit'
	]
);
$options[] = array(
	'id'       => 'goso_agepopup_bgscroll',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Popup Background Scroll',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'scroll'  => 'scroll',
		'fixed'   => 'fixed',
		'local'   => 'local',
		'initial' => 'initial',
		'inherit' => 'inherit'
	]
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'goso_agepopup_width_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => 'Popup Width',
	'description' => 'Set width of the age popup in pixels.',
	'id'          => 'goso_agepopup_width_desktop',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'goso_agepopup_width_desktop',
		'mobile'  => 'goso_agepopup_width_mobile',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'       => 'goso_agepopup_txtcolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Popup Text Color',
);
$options[] = array(
	'id'       => 'goso_agepopup_txt_msize',
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-hidden',
	'label'    => 'Popup Text Size on Mobile',
);
$options[] = array(
	'id'       => 'goso_agepopup_txt_size',
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => 'Popup Text Size',
	'type'     => 'authow-fw-size',
	'ids'         => array(
		'desktop' => 'goso_agepopup_txt_size',
		'mobile'  => 'goso_agepopup_txt_msize',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'       => 'goso_agepopup_bordercolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Popup Border Color',
);
$options[] = array(
	'id'       => 'goso_agepopup_btn1_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Agree Button Color',
);
$options[] = array(
	'id'       => 'goso_agepopup_btn1_hcolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Agree Button Hover Color',
);
$options[] = array(
	'id'       => 'goso_agepopup_btn1_bgcolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Agree Button Background Color',
);
$options[] = array(
	'id'       => 'goso_agepopup_btn1_hbgcolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Agree Button Hover Background Color',
);
$options[] = array(
	'id'       => 'goso_agepopup_btn2_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Cancel Button Color',
);
$options[] = array(
	'id'       => 'goso_agepopup_btn2_hcolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Cancel Button Hover Color',
);
$options[] = array(
	'id'       => 'goso_agepopup_btn2_bgcolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Cancel Button Background Color',
);
$options[] = array(
	'id'       => 'goso_agepopup_btn2_hbgcolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Cancel Button Hover Background Color',
);
$options[] = array(
	'id'       => 'goso_agepopup_spacing',
	'default'  => '',
	'sanitize' => 'goso_sanitize_choices_field',
	'type'     => 'authow-fw-box-model',
	'label'    => __( 'Popup Spacing', 'authow' ),
	'choices'  => array(
		'padding'       => array(
			'padding-top'    => '',
			'padding-right'  => '',
			'padding-bottom' => '',
			'padding-left'   => '',
		),
		'border'        => array(
			'border-top'    => '',
			'border-right'  => '',
			'border-bottom' => '',
			'border-left'   => '',
		),
		'border-radius' => array(
			'border-radius-top'    => '',
			'border-radius-right'  => '',
			'border-radius-bottom' => '',
			'border-radius-left'   => '',
		),
	),
);

return $options;
