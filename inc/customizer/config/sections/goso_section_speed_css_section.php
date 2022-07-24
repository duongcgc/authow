<?php
$options   = [];
$options[] = array(
	'default'     => 'inline',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Render Customizer CSS Method',
	'id'          => 'goso_spcss_render',
	'description' => __( 'Render Customizer CSS in a separate file can help you to improve performance dramatically.', 'authow' ),
	'type'        => 'authow-fw-select',
	'choices'     => array(
		'inline'        => esc_html__( 'Inline CSS', 'authow' ),
		'separate_file' => esc_html__( 'Separate CSS File', 'authow' ),
	)
);
$options[] = array(
	'data_type'       => 'render_separate_css',
	'nonce'           => esc_html( wp_create_nonce( 'goso_render_separate_css_file' ) ),
	'label'           => __( 'Regenerate CSS File', 'authow' ),
	'id'              => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname',
	'type'            => 'authow-fw-button',
	'callback'        => 'goso_activate_separate_css_file_callback',
	'active_callback' => [
		[
			'setting'  => 'goso_spcss_render',
			'operator' => '==',
			'value'    => 'separate_file',
		],
	],
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Remove Gutenberg Styles',
	'description' => __( 'Use with caution. This will remove styles for Gutenberg editor from the <head> - only activate it if your website users using the Classic Editor', 'authow' ),
	'id'          => 'goso_speed_remove_gutenbergcss',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_speed_optimize_css',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Enable Optimize CSS',
	'description' => __( "You need to check to this option to make all optimize CSS options below works", "authow" ),
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_speed_optimize_css_minify',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Minify All CSS',
	'description' => __( "Minify CSS to reduced the CSS size.", "authow" ),
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_speed_optimize_css_to_inline',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Inline Optimized CSS',
	'description' => __( "Inline the CSS to prevent flash of unstyled content. Highly recommended.", "authow" ),
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_speed_optimize_gfonts',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Optimize Google Fonts',
	'description' => __( "Add preconnect hints and add display swap for Google Fonts.", "authow" ),
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_speed_optimize_gfonts_inline',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Inline Google Fonts CSS',
	'description' => __( "Inline the Google Fonts CSS for a big boost on FCP and slight on LCP on mobile. Highly recommended.", "authow" ),
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_speed_optimize_gfonts_delay',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Delay Loading Google Fonts',
	'description' => __( "It can helps you reduce the FCP & LCP for Core Web Vitals.", "authow" ),
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'       => 'goso_speed_optimize_disable_icon_delay',
	'default'  => '',
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Disable Delay Loading Icon Fonts',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_speed_optimize_css_excludes',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_textarea_field',
	'label'       => 'Exclude Stylesheets from Optimize CSS',
	'description' => __( "Enter one per line to exclude certain CSS files from this optimizations. Examples: <strong>id:my-css-id</strong> OR <strong>a-part-from-file-url</strong>", "authow" ),
	'type'        => 'authow-fw-textarea',
);
/* CSS Optimizer Options */
$options[] = array(
	'id'          => 'goso_speed_remove_css',
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Create Critical CSS?',
	'description' => 'Remove Unused CSS to reduce the loading time, all other CSS will be delayed to loads until user interaction.',
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_speed_remove_css_excludes',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_textarea_field',
	'label'       => 'Exclude Stylesheets from Remove Unused CSS',
	'description' => __( "Enter one per line to exclude certain CSS files from this optimizations. It won't remove the Unused CSS from those stylesheets. Examples: <strong>id:my-css-id</strong> OR <strong>a-part-from-file-url</strong>", "authow" ),
	'type'        => 'authow-fw-textarea',
);
$options[] = array(
	'id'          => 'goso_speed_allow_css_selectors',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_textarea_field',
	'label'       => 'Always Keep Selectors',
	'description' => __( "Enter one per line. Partial or full matches for selectors (if any of these keywords found, the selector will be kept). Examples: .myclass", "authow" ),
	'type'        => 'authow-fw-textarea',
);
// extra information
if ( function_exists( 'goso_speed_optimizer_get_stat' ) ) {
	$authow_pages_speed_stat = goso_speed_optimizer_get_stat();
	$css_cache                = $authow_pages_speed_stat['css'];
	$options[]                = array(
		'type'        => 'authow-fw-button',
		'data_type'   => 'goso_speed_delete_cache',
		'nonce'       => esc_html( wp_create_nonce( 'goso_speed_delete_cache' ) ),
		'label'       => __( 'Clear Critical CSS Cache', 'authow' ),
		'description' => sprintf( __( '<strong>Critical CSS Cache Files:</strong> <span class="count">%1$d</span>', 'authow' ), $css_cache ),
		'id'          => 'goso_speed_delete_cache_button',
	);
}

return $options;
