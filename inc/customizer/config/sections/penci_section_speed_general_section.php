<?php
$options   = [];
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Activate optimize CSS/JS for logged in users?',
	'id'       => 'penci_speed_disable_cssjs',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Emoji and Smilies',
	'id'       => 'penci_speed_disable_emoji',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Remove query strings from static resource',
	'description' => __( 'Remove query strings for non-login & non-administrator users', 'authow' ),
	'id'          => 'penci_speed_remove_query_string',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Remove wlwmanifest Link',
	'description' => __( 'If you do not use Windows Live Writer, you can disable it.', 'authow' ),
	'id'          => 'penci_speed_remove_wlwmanifest',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Remove XML-RPC and RSD Link',
	'description' => __( 'Check <a href="https://codex.wordpress.org/XML-RPC_Support" target="_blank">this post</a> and <a target="_blank" href="https://developer.wordpress.org/reference/functions/rsd_link/">this post</a> to understand what is it. In most cases, its not needed, so if you dont need it, you can remove it.', 'authow' ),
	'id'          => 'penci_speed_remove_xml_rsd',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'sanitize'    => 'sanitize_text_field',
	'label'       => esc_html__( 'Lazyload Images', 'authow' ),
	'id'          => 'penci_section_speed_lazy_heading',
	'description' => __( "This theme supports lazyload images from itself. But, if you want to use lazyload images from another plugin - let disable the lazyload images below to get it works. But, If you want to use the optimise speed features from our theme, using the lazy load images feature from our theme is required.", "authow" ),
	'type'        => 'authow-fw-header',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Delay all images loading in the first screen to optimize LCP value',
	'id'       => 'penci_speed_disable_first_screen',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable LazyLoad Images on Category Mega Menu',
	'id'       => 'penci_topbar_mega_disable_lazy',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Lazy Load Images on Sliders',
	'id'       => 'penci_disable_lazyload_slider',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Lazyload Images on All Posts Layouts & Widgets',
	'id'       => 'penci_disable_lazyload_layout',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Lazyload for Featured Image on Single Posts/Pages',
	'id'       => 'penci_disable_lazyload_fsingle',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Lazyload Images on Single Posts',
	'id'       => 'penci_disable_lazyload_single',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Disable Lazyload for All Iframes',
	'id'       => 'penci_disable_lazyload_iframe',
	'description' => __( "Note that: Lazyload iframes just apply when you activate optimize CSS", "authow" ),
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'penci_disable_lazyload_extra',
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => 'Exclude Custom CSS Classes from Lazyload',
	'description' => __( "Enter one per line to exclude certain CSS class from this optimizations OR a part of image/iframe URL. Examples: <strong>my-css-class</strong>", "authow" ),
	'type'        => 'authow-fw-textarea',
);

return $options;
