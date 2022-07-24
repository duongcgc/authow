<?php
$options   = [];
$options[] = array(
	'default'  => '13',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for General Text on Topbar', 'authow' ),
	'type'     => 'authow-fw-size',
	'id'       => 'goso_topbar_ctsize',
	'ids'         => array(
		'desktop' => 'goso_topbar_ctsize',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '13',
		),
	),
);
$options[] = array(
	'default'  => '12',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for "Top Posts" text', 'authow' ),
	'id'       => 'goso_top_bar_top_post_size',
	'ids'         => array(
		'desktop' => 'goso_top_bar_top_post_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '12',
		),
	),
);
$options[] = array(
	'default'  => '12',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Post Titles on "Top Posts"', 'authow' ),
	'id'       => 'goso_top_bar_top_post_size_title',
	'ids'         => array(
		'desktop' => 'goso_top_bar_top_post_size_title',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '12',
		),
	),
);
$options[] = array(
	'default'  => '11',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Topbar Menu Level 1', 'authow' ),
	'id'       => 'goso_top_bar_menu_level_one',
	'ids'         => array(
		'desktop' => 'goso_top_bar_menu_level_one',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '11',
		),
	),
);
$options[] = array(
	'default'  => '11',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Sub-menu on Topbar Menu', 'authow' ),
	'id'       => 'goso_top_bar_sub_menu_size',
	'ids'         => array(
		'desktop' => 'goso_top_bar_sub_menu_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '11',
		),
	),
);
$options[] = array(
	'default'  => '13',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Social Icons on Topbar', 'authow' ),
	'id'       => 'goso_top_bar_social_size',
	'ids'         => array(
		'desktop' => 'goso_top_bar_social_size',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '13',
		),
	),
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Login/Register Popup Form', 'authow' ),
	'id'       => 'goso_lgpop_form_heading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'label'       => '',
	'id'          => 'goso_tbpop_title_size_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
	'default'    => '22',
);
$options[] = array(
	'label'       => 'Font Size for Titles',
	'id'          => 'goso_tbpop_title_size',
	'type'        => 'authow-fw-size',
	'sanitize'    => 'absint',
	'default'    => '24',
	'ids'         => array(
		'desktop' => 'goso_tbpop_title_size',
		'mobile'  => 'goso_tbpop_title_size_mobile',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'    => '24',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'    => '22',
		),
	),
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Input Fields', 'authow' ),
	'id'       => 'goso_tbpop_inputfs',
	'ids'         => array(
		'desktop' => 'goso_tbpop_inputfs',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '14',
		),
	),
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Submit Buttons', 'authow' ),
	'id'       => 'goso_tbpop_submitfs',
	'ids'         => array(
		'desktop' => 'goso_tbpop_submitfs',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '14',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Text/Links', 'authow' ),
	'id'       => 'goso_tbpop_textfs',
	'ids'         => array(
		'desktop' => 'goso_tbpop_textfs',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);

return $options;
