<?php
$options   = [];
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Use Classic Editor for Edit Portfolio Projects?', 'authow' ),
	'description' => __( 'Edit the portfolio projects using WP Block Editor by default, if you want to use Classic Editor to edit it, check this option.', 'authow' ),
	'id'          => 'penci_portfolio_classic_editor',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Sidebar On Portfolio Categories',
	'id'       => 'penci_portfolio_cat_enable_sidebar',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Sidebar On Single Portfolio',
	'id'       => 'penci_portfolio_single_enable_sidebar',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_portfolio_single_enable_left_sidebar',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Left Sidebar On Single Portfolio',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Two Sidebars On Single Portfolio',
	'id'       => 'penci_portfolio_single_enable_2sidebar',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => 'main-sidebar',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Custom Sidebar for Single Portfolio',
	'id'          => 'penci_sidebar_single_portfolio',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar',
	'type'        => 'authow-fw-select',
	'choices'     => get_list_custom_sidebar_option()
);
$options[] = array(
	'default'  => 'style-1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Single Portfolio Style',
	'id'       => 'penci_single_portfolio_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'style-1' => __( 'Style 1', 'authow' ),
		'style-2' => __( 'Style 2', 'authow' ),
		'style-3' => __( 'Style 3', 'authow' ),
	)
);
$options[] = array(
	'default'  => 'style-1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Single Portfolio Social Share Style',
	'id'       => 'penci_single_portfolio_social_share_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'style-1' => __( 'Style 1', 'authow' ),
		'style-2' => __( 'Style 2', 'authow' ),
		'style-3' => __( 'Style 3', 'authow' ),
		'style-4' => __( 'Style 4', 'authow' ),
	)
);
$options[] = array(
	'default'     => 'main-sidebar-left',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Custom Sidebar Left for Single Portfolio',
	'id'          => 'penci_sidebar_left_single_portfolio',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar Left. This option just use when you enable 2 sidebars for Single Portfolio',
	'type'        => 'authow-fw-select',
	'choices'     => get_list_custom_sidebar_option()
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Featured Image on Single Portfolio',
	'id'       => 'penci_portfolio_hide_featured_image_single',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Share Box on Single Portfolio',
	'id'       => 'penci_portfolio_share_box',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Next/Prev Project on Single Portfolio',
	'id'       => 'penci_portfolio_next_prev_project',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Related Project on Single Portfolio',
	'id'       => 'penci_portfolio_related_project',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => 'Next Project',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Custom Text for Next Project Button',
	'id'       => 'penci_portfolio_next_text',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'default'  => 'Previous Project',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Custom Text for Previous Project Button',
	'id'       => 'penci_portfolio_prev_text',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'default'  => __( 'Related Projects', 'authow' ),
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Custom Text for Related Projects Text',
	'id'       => 'penci_portfolio_related_text',
	'type'     => 'authow-fw-text',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Comment on Single Portfolio',
	'id'       => 'penci_portfolio_enable_comment',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => 'masonry',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Portfolio Category Layout',
	'id'       => 'penci_portfolio_layout',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'masonry' => 'Masonry Layout',
		'grid'    => 'Grid Layout'
	)
);
$options[] = array(
	'default'  => 'text_overlay',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Portfolio Category Layout',
	'id'       => 'penci_portfolio_item_style',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'text_overlay' => 'Text Overlay',
		'below_img'    => 'Text Below Image'
	)
);
$options[] = array(
	'id'       => 'penci_portfolio_layout',
	'default'  => 'carousel',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Portfolio Category Layout',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'grid'     => 'Grid',
		'carousel' => 'Carousel'
	)
);
$options[] = array(
	'default'  => '3',
	'id'       => 'penci_single_portfolio_related_col',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Single Portfolio Related Projects Columns',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'2' => __( '2 Columns', 'authow' ),
		'3' => __( '3 Columns', 'authow' ),
		'4' => __( '4 Columns', 'authow' ),
	)
);
$options[] = array(
	'default'  => '3',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'label'    => 'Single Portfolio Related Projects Item',
	'id'       => 'penci_single_portfolio_related_num',
	'ids'         => array(
		'desktop' => 'penci_single_portfolio_related_num',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
		),
	),
);

return $options;
