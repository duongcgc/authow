<?php
$options   = [];
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Top Bar Background Color',
	'id'       => 'penci_top_bar_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => '"Current Date/Custom Text" Color',
	'id'       => 'penci_topbar_ct_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => '"Top Posts" Background Color',
	'id'       => 'penci_top_bar_top_posts_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => '"Top Posts" Text Color',
	'id'       => 'penci_top_bar_top_posts_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Next/Prev Posts Top Bar Button Color',
	'id'       => 'penci_top_bar_button_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Next/Prev Posts Top Bar Button Hover Color',
	'id'       => 'penci_top_bar_button_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Top Bar Posts Title Color',
	'id'       => 'penci_top_bar_title_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Top Bar Post Titles Hover Color',
	'id'       => 'penci_top_bar_title_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Top Bar Menu Text Color',
	'id'       => 'penci_top_bar_menu_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Top Bar Menu Text Hover Color',
	'id'       => 'penci_top_bar_menu_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Top Bar Menu Border Color',
	'id'       => 'penci_top_bar_menu_border',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Top Bar Menu Dropdown Background Color',
	'id'       => 'penci_top_bar_menu_dropdown_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Top Bar Social Icons Color',
	'id'       => 'penci_top_bar_social_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Top Bar Social Icons Hover Color',
	'id'       => 'penci_top_bar_social_hover_color',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Login/Register Popup', 'authow' ),
	'id'       => 'penci_lgpop_form_cheading',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Top Bar Login Icon & Text Color',
	'id'       => 'penci_tblgc_icon_text',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Top Bar Login Icon & Text Hover Color',
	'id'       => 'penci_tblgc_icon_htext',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Color for Popup Loading Icon',
	'id'       => 'penci_tblgpop_cloading',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Background Color for Popup Form',
	'id'       => 'penci_tblgpop_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Second Background Color for Popup Form ( for Gradient Background )',
	'id'       => 'penci_tblgpop_sbg',
);
$options[] = array(
	'default'  => '0.75',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Background Color Opacity for Popup Form',
	'id'       => 'penci_tblgpop_bg_opacity',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'0'    => '0',
		'0.05' => '0.05',
		'0.1'  => '0.1',
		'0.15' => '0.15',
		'0.2'  => '0.2',
		'0.25' => '0.25',
		'0.3'  => '0.3',
		'0.35' => '0.35',
		'0.4'  => '0.4',
		'0.45' => '0.45',
		'0.5'  => '0.5',
		'0.55' => '0.55',
		'0.6'  => '0.6',
		'0.65' => '0.65',
		'0.7'  => '0.7',
		'0.75' => '0.75',
		'0.8'  => '0.8',
		'0.85' => '0.85',
		'0.9'  => '0.9',
		'0.95' => '0.95',
		'1'    => '1',
	)
);
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => 'Background Image for Popup Form',
	'type'     => 'authow-fw-image',
	'id'       => 'penci_tblgpop_bgimgage',
);
$options[] = array(
	'default'  => 'no-repeat',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Background Image Repeat for Popup Form',
	'id'       => 'penci_tblgpop_bg_repeat',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'no-repeat' => 'No Repeat',
		'repeat'    => 'Repeat'
	)
);
$options[] = array(
	'default'  => 'fixed',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Background Image Attachment for Popup Form',
	'id'       => 'penci_tblgpop_bg_attachment',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'fixed'  => 'Fixed',
		'scroll' => 'Scroll',
		'local'  => 'Local'
	)
);
$options[] = array(
	'default'  => 'auto',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Background Image Size for Popup Form',
	'id'       => 'penci_tblgpop_bg_size',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'auto'    => 'Auto',
		'cover'   => 'Cover',
		'contain' => 'Contain',
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Color for Close Button on Popup Form',
	'id'       => 'penci_tblgc_close',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Color for Titles on Popup Form',
	'id'       => 'penci_tblgc_titles',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Text Color for Input Fields on Popup Form',
	'id'       => 'penci_tblgc_inputs',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Borders Color for Input Fields on Popup Form',
	'id'       => 'penci_tblgc_inputs_borders',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Color for Submit Buttons on Popup Form',
	'id'       => 'penci_tblgc_submit',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Background Color for Submit Buttons on Popup Form',
	'id'       => 'penci_tblgc_submit_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Hover Color for Submit Buttons on Popup Form',
	'id'       => 'penci_tblgc_hsubmit',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Hover Background Color for Submit Buttons on Popup Form',
	'id'       => 'penci_tblgc_submit_hbg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Text Color on Popup Form',
	'id'       => 'penci_tblgc_text',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Links Color on Popup Form',
	'id'       => 'penci_tblgc_links',
);

return $options;
