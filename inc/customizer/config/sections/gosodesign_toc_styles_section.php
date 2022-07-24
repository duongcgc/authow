<?php
$options = [];
/* Font Size */
$options[] = array(
	'default'  => 'none',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Font Sizes',
	'id'       => 'goso_toc_heading_fsize',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'label'    => '',
	'id'       => 'goso_toc_heading_mfs',
	'type'     => 'authow-fw-hidden',
	'sanitize' => 'absint',
);
$options[] = array(
	'label'    => 'Font Size for Heading Text',
	'id'       => 'goso_toc_heading_fs',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_toc_heading_fs',
		'mobile'  => 'goso_toc_heading_mfs',
	),
	'choices'  => array(
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
	'label'    => '',
	'id'       => 'goso_toc_l1_mfs',
	'type'     => 'authow-fw-hidden',
	'sanitize' => 'absint',
);
$options[] = array(
	'label'    => 'Font Size for Parent Items',
	'id'       => 'goso_toc_l1_fs',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_toc_l1_fs',
		'mobile'  => 'goso_toc_l1_mfs',
	),
	'choices'  => array(
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
	'label'    => '',
	'id'       => 'goso_toc_l2_mfs',
	'type'     => 'authow-fw-hidden',
	'sanitize' => 'absint',
);
$options[] = array(
	'label'    => 'Font Size for Child Items',
	'id'       => 'goso_toc_l2_fs',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_toc_l2_fs',
		'mobile'  => 'goso_toc_l2_mfs',
	),
	'choices'  => array(
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
/* Sticky Color */
$options[] = array(
	'default'  => 'none',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Color',
	'id'       => 'goso_toc_color_style',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'id'        => 'goso_toc_heading_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Table Heading Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_l1_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Parent Items Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_l1_hcolor',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Parent Items Hover Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_l2_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Child Items Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_l2_hcolor',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Child Items Hover Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_bd_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Table Border Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_bg_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Table Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_tgbtn_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Toggle Button Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_tgbtn_bgcolor',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Toggle Button Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_tgbtn_hcolor',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Toggle Button Hover Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_tgbtn_hbgcolor',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Toggle Button Background Hover Color', 'authow' ),
);
/* Color */
$options[] = array(
	'default'  => 'none',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Sticky Color',
	'id'       => 'goso_toc_sticky_color_style',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'id'        => 'goso_toc_sticky_heading_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Table Heading Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_sticky_l1_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Parent Items Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_sticky_l1_hcolor',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Parent Items Hover Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_sticky_l2_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Child Items Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_sticky_l2_hcolor',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Child Items Hover Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_sticky_bd_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Table Border Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_sticky_bg_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Table Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_sticky_tgbtn_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Toggle Button Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_sticky_tgbtn_bgcolor',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Toggle Button Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_sticky_tgbtn_hcolor',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Toggle Button Hover Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_sticky_tgbtn_hbgcolor',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Toggle Button Background Hover Color', 'authow' ),
);

/* Sticky Button Color */
$options[] = array(
	'default'  => 'none',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Sitcky Button on Mobile',
	'id'       => 'goso_toc_btnsticky_style',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'id'        => 'goso_toc_msticky_w_bgcolor',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Background Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_msticky_w_bdcolor',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Border Color', 'authow' ),
);
$options[] = array(
	'id'        => 'goso_toc_msticky_btn_bgcolor',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Button Background Color', 'authow' ),
);
/*$options[] = array(
	'id'        => 'goso_toc_msticky_btn_bghcolor',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Button Hover Background Color', 'authow' ),
);*/
$options[] = array(
	'id'        => 'goso_toc_msticky_btn_color',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Button Color', 'authow' ),
);
/*$options[] = array(
	'id'        => 'goso_toc_msticky_btn_hcolor',
	'default'   => '',
	'transport' => 'refresh',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'authow-fw-color',
	'label'     => __( 'Button Hover Color', 'authow' ),
);*/
return $options;
