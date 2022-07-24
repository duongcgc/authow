<?php
$options   = [];
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Minify JS from the Theme',
	'id'       => 'goso_speed_js_minify',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'goso_sanitize_checkbox_field',
	'label'    => 'Remove jQuery Migrate',
	'id'       => 'goso_speed_remove_jquery_migrate',
	'type'     => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_speed_delay_js',
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Delay Javascript Execution',
	'description' => __( "Delay execution of the targeted JS files until user interaction ( move mouse, click, scroll, touch,... ).", "authow" ),
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'id'          => 'goso_speed_delay_js_adsense',
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Delay Google Ads',
	'description' => __( "Delay Google Adsense until first interaction.", "authow" ),
	'type'        => 'authow-fw-toggle',
);
$default_ex = "analytics.js
google-analytics
googletagmanager
analytics
gtag
jetpack
url://stats.wp.com
_stq.push
browser-redirect/app.js
id:-js-extra
et_core_page_resource_fallback
window.\$us === undefined
js-extra
fusionNavIsCollapsed
eio_lazy_vars
et_animation_data
wpforms_settings
var nfForms
//stats.wp.com
_stq.push
fluent_form_ff_form_instance_
cpLoadCSS
ninja_column_
var rbs_gallery_
var lepopup_
var billing_additional_field
var gtm4wp
var dataLayer_content
/ewww-image-optimizer/includes/load[_-]webp(\.min)?.js
/ewww-image-optimizer/includes/check-webp(\.min)?.js
ewww_webp_supported
/dist/js/browser-redirect/app.js
/perfmatters/js/lazyload.min.js
scripts.mediavine.com/tags/
initCubePortfolio
jetpack-lazy-images-js-enabled
jetpack-boost-critical-css";
$options[] = array(
	'id'          => 'goso_speed_delay_js_excludes',
	'default'     => $default_ex,
	'sanitize'    => 'goso_sanitize_textarea_field',
	'label'       => 'Exclude Scripts from Delay Execution',
	'description' => __( 'Enter one per line to exclude certain scripts from this optimizations, you can use ids of the scripts or a part from src attr from the scripts.<br/>Examples:', 'authow' )
		. '<br/><code>id:my-js-id</code> or <code>a-part-from-src-attr</code>',
	'type'        => 'authow-fw-textarea',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'goso_sanitize_checkbox_field',
	'label'       => 'Load deferred for JS files from the theme',
	'id'          => 'goso_speed_add_defer',
	'description' => __( "This option will help you add defer='defer' attr to JS files from the theme", "authow" ),
	'type'        => 'authow-fw-toggle',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'goso_sanitize_textarea_field',
	'label'       => 'Manually add JS name(s) to load defer="defer"',
	'id'          => 'goso_speed_add_more_defer',
	'description' => __( "You can manage to add JS you want to load defer='defer' here, use JS name(s) & separated by commas.<br>Example: <strong>js-name-a, js-name-b</strong><br><strong>The JS name</strong> is \$handle string use inside <a href='https://developer.wordpress.org/reference/functions/wp_enqueue_script/' target='_blank'>wp_enqueue_script</a> function", "authow" ),
	'type'        => 'authow-fw-textarea',
);

return $options;
