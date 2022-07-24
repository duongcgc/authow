<?php
$options         = [];
$options[]       = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Page Default Template Layout',
	'id'          => 'penci_page_default_template_layout',
	'description' => 'Check <a target="_blank" href="https://authow.pencidesign.net/authow-document/images/template.png">this image</a> to know how to change Template of a page.',
	'type'        => 'authow-fw-select',
	'choices'     => array(
		''              => 'No Sidebar with Container',
		'small-width'   => 'No Sidebar with Smaller Container Width',
		'right-sidebar' => 'Page with Right Sidebar',
		'left-sidebar'  => 'Page with Left Sidebar',
		'two-sidebar'   => 'Page with Two Sidebars'
	)
);
$options[]       = array(
	'default'  => '900',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Width for "Page No Sidebar with Smaller Container Width"', 'authow' ),
	'id'       => 'penci_page_custom_width',
	'ids'      => array(
		'desktop' => 'penci_page_custom_width',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 2000,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '900',
		),
	),
);
$options[]       = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Featured Image Auto Appears',
	'id'       => 'penci_page_hide_featured_image',
	'type'     => 'authow-fw-toggle',
);
$options[]       = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Page Titles',
	'id'       => 'penci_page_hide_ptitle',
	'type'     => 'authow-fw-toggle',
);
$options[]       = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Uppercase on Page Titles',
	'id'       => 'penci_page_title_uppercase',
	'type'     => 'authow-fw-toggle',
);
$options[]       = array(
	'label'       => '',
	'description' => '',
	'id'          => 'penci_page_title_fsize_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
	'default'     => '18',
);
$options[]       = array(
	'label'    => 'Font Size for Page Titles',
	'id'       => 'penci_page_title_fsize',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'default'  => '24',
	'ids'      => array(
		'desktop' => 'penci_page_title_fsize',
		'mobile'  => 'penci_page_title_fsize_mobile',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'default' => '24',
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
		),
		'mobile'  => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '18',
		),
	),
);
$options[]       = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Share Buttons',
	'id'       => 'penci_page_share',
	'type'     => 'authow-fw-toggle',
);
$share_style     = [];
$share_style[''] = 'Inherit from Single Post Settings';
for ( $i = 1; $i <= 23; $i ++ ) {
	$v                      = $i < 4 ? 's' : 'n';
	$n                      = $i < 4 ? $i : $i - 3;
	$share_style[ $v . $n ] = 'Style ' . $i;
}
$options[] = array(
	'id'       => 'penci_page_style_cscount',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Share Box Style',
	'type'     => 'authow-fw-select',
	'choices'  => $share_style,
);
$options[] = array(
	'id'       => 'penci_page_align_cscount',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Share Box Alignment',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		''       => 'Default Theme Style',
		'left'   => 'Left',
		'right'  => 'Right',
		'center' => 'Center',
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for "Share" Text', 'authow' ),
	'id'       => 'penci_page_sharetext_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'penci_page_sharetext_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),

);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Social Share Icons', 'authow' ),
	'id'       => 'penci_page_shareicon_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'penci_page_shareicon_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Comments',
	'id'       => 'penci_page_comments',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Header Transparent',
	'id'       => 'penci_header_enable_transparent',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => 'main-sidebar',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Sidebar for Pages',
	'id'          => 'penci_sidebar_name_pages',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar.',
	'type'        => 'authow-fw-select',
	'choices'     => get_list_custom_sidebar_option()
);
$options[] = array(
	'default'     => 'main-sidebar-left',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Sidebar Left for Pages',
	'id'          => 'penci_sidebar_left_name_pages',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar Left. This option just apply when you use 2 sidebars for Pages',
	'type'        => 'authow-fw-select',
	'choices'     => get_list_custom_sidebar_option()
);

return $options;
