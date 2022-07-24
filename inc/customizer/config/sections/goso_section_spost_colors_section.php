<?php
$options         = [];
$options[]       = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Single Categories Accent Color',
	'id'       => 'penci_single_cat_color',
);
$options[]       = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Post Title Color',
	'id'       => 'penci_single_title_color',
);
$options[]       = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Post SubTitle Color',
	'id'       => 'penci_single_subtitle_color',
);
$options[]       = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Post Meta Color',
	'id'       => 'penci_single_meta_color',
);
$more_opt_single = array(
	'penci_single_color_title_s568'    => esc_html__( 'Post Title Color for Template Style 5, 6, 8', 'authow' ),
	'penci_single_color_subtitle_s568' => esc_html__( 'Post SubTitle Color for Template Style 5, 6, 8', 'authow' ),
	'penci_single_color_cat_s568'      => esc_html__( 'Categories Color for Template Style 5, 6, 8', 'authow' ),
	'penci_single_color_meta_s568'     => esc_html__( 'Color for Posts Meta on Template Style 5, 6, 8', 'authow' ),
	'penci_single_bgcolor_header'      => esc_html__( 'Header Background for Template Style 9 & 10', 'authow' ),
	'penci_single_color_title_s10'     => esc_html__( 'Post Title Color for Template Style 10', 'authow' ),
	'penci_single_color_subtitle_s10'  => esc_html__( 'Post SubTitle Color for Template Style 10', 'authow' ),
	'penci_single_color_cat_s10'       => esc_html__( 'Categories Color for Template Style 10', 'authow' ),
	'penci_single_color_meta_s10'      => esc_html__( 'Color for Posts Meta on Template Style 10', 'authow' ),
	'penci_single_color_bread_s10'     => esc_html__( 'Color for Breadcrumb on Template Style 10', 'authow' ),
);
foreach ( $more_opt_single as $opt_single_color_id => $opt_single_color_label ) {
	$desc = '';
	if ( 'penci_single_color_title_s568' == $opt_single_color_id || 'penci_single_color_subtitle_s568' == $opt_single_color_id || 'penci_single_color_cat_s568' == $opt_single_color_id || 'penci_single_color_meta_s568' == $opt_single_color_id ) {
		$desc = esc_html__( 'This option doesn\'t apply for move post title & meta below featured image', 'authow' );
	}
	$options[] = array(
		'default'     => '',
		'sanitize'    => 'sanitize_hex_color',
		'type'        => 'authow-fw-color',
		'label'       => $opt_single_color_label,
		'id'          => $opt_single_color_id,
		'description' => $desc
	);
}
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Tags Text Color',
	'id'       => 'penci_single_tag_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Tags Borders Color',
	'id'       => 'penci_single_tag_border',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Tags Background Color',
	'id'       => 'penci_single_tag_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Tags Hover Text Color',
	'id'       => 'penci_single_tag_hcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Tags Hover Borders Color',
	'id'       => 'penci_single_tag_hborder',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Tags Hover Background Color',
	'id'       => 'penci_single_tag_hbg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Share Text Color',
	'id'       => 'penci_single_share_tcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Share Text Background Color',
	'id'       => 'penci_single_share_bgcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Share Text Borders Color',
	'id'       => 'penci_single_share_bdcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Share Box Icon Color',
	'id'       => 'penci_single_share_icon_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Share Box Icon Hover Color',
	'id'       => 'penci_single_share_icon_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Numbers Like Of Post Color',
	'id'       => 'penci_single_number_like_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Icon Background Color for Share Box Style 3',
	'id'       => 'penci_single_share_icon_style3_bgcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Icon Background Hover Color for Share Box Style 3',
	'id'       => 'penci_single_share_icon_style3_hbgcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Custom Text Color Inside Post Content',
	'id'       => 'penci_single_color_text',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Color for Links',
	'id'       => 'penci_single_color_links',
);
for ( $pheading = 1; $pheading < 7; $pheading ++ ) {
	$options[] = array(
		'default'  => '',
		'sanitize' => 'sanitize_hex_color',
		'type'     => 'authow-fw-color',
		'label'    => 'Custom Color for H' . $pheading . ' Tag Inside Post Content',
		'id'       => 'penci_single_color_h' . $pheading,
	);
}
/* social new style*/
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Social Background Color',
	'id'       => 'penci_single_newshare_bgcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Social HoverBackground Color',
	'id'       => 'penci_single_newshare_hbgcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Social Color',
	'id'       => 'penci_single_newshare_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Social Color',
	'id'       => 'penci_single_newshare_hcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Social Borders Color',
	'id'       => 'penci_single_newshare_bcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Social Hover Boders Color',
	'id'       => 'penci_single_newshare_hbcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Plus Button Color',
	'id'       => 'penci_single_splus_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Plus Button Hover Color',
	'id'       => 'penci_single_splus_hcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Plus Button Background Color',
	'id'       => 'penci_single_splus_bgcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Plus Button Hover Background Color',
	'id'       => 'penci_single_splus_hbgcolor',
);
/*end social new style*/
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Blockquote Text Color',
	'id'       => 'penci_bquote_text_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Blockquote Author Text Color',
	'id'       => 'penci_bquote_author_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Blockquote Background Color',
	'id'       => 'penci_bquote_bgcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Borders & Icon Colors on Blockquote',
	'id'       => 'penci_bquote_border_color',
);
$options[] = array(
	'sanitize'    => 'sanitize_text_field',
	'label'       => esc_html__( 'Author Box', 'authow' ),
	'id'          => 'penci_section_cauthor_box',
	'description' => 'Please check <a target="_blank" href="https://authow.pencidesign.net/authow-document/#author-box">this guide</a> to know how to setup Author Box',
	'type'        => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Author Box Background Color',
	'id'       => 'penci_authorbio_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Author Box Borders Color',
	'id'       => 'penci_authorbio_bordercl',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Author Name Color',
	'id'       => 'penci_authorbio_name_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Author Name Hover Color',
	'id'       => 'penci_authorbio_name_hcolor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Author Description Color',
	'id'       => 'penci_authorbio_desc_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Author Social Icons Color',
	'id'       => 'penci_authorbio_social_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Author Social Icons Hover Color',
	'id'       => 'penci_authorbio_social_hcolor',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Next/Previous Posts', 'authow' ),
	'id'       => 'penci_section_cpost_nav',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Color for "previous post", "next post" Text',
	'id'       => 'penci_prevnext_colors',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Color for Post Titles',
	'id'       => 'penci_prevnext_ctitle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Color for Post Titles on Hover',
	'id'       => 'penci_prevnext_hctitle',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Related Posts & Comments', 'authow' ),
	'id'       => 'penci_section_crelatedp',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Color for Sections Heading',
	'id'       => 'penci_relatedcm_heading',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Color for Lines Before & After Sections Heading',
	'id'       => 'penci_relatedcm_lineheading',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Post Titles Color on Related Posts',
	'id'       => 'penci_relatedcm_ctitle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Post Titles Hover Color on Related Posts',
	'id'       => 'penci_relatedcm_hctitle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Post Date Color on Related Posts',
	'id'       => 'penci_relatedcm_cdate',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Comment Author Color',
	'id'       => 'penci_relatedcm_author',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Comment Author Hover Color',
	'id'       => 'penci_relatedcm_hauthor',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Comment Date Color',
	'id'       => 'penci_relatedcm_cmdate',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Reply/Edit Text Color',
	'id'       => 'penci_relatedcm_replyedit',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Comment Content Color',
	'id'       => 'penci_relatedcm_cmcontent',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'authow-fw-color',
	'label'       => 'Comment Form Inputs & Textarea Color',
	'description' => 'For change color on "Submit" button color, check options on General > Colors > General Buttons',
	'id'          => 'penci_relatedcm_cminput',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'GDPR message & "Save my name, email.." Color',
	'id'       => 'penci_relatedcm_gdpr',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Accent Color',
	'id'       => 'penci_single_accent_color',
);
$options[] = array(
	'sanitize'    => 'sanitize_text_field',
	'label'       => esc_html__( 'Related Posts Popup', 'authow' ),
	'id'          => 'penci_section_crelated_post_popup',
	'description' => 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/related-posts-popup.png">this image</a> to know what is "Related Posts Popup"',
	'type'        => 'authow-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Custom Heading Background on Related Posts Popup',
	'id'       => 'penci_rltpop_heading_bg',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Custom Heading Text Color on Related Posts Popup',
	'id'       => 'penci_rltpop_heading_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Close Button Color on Related Posts Popup',
	'id'       => 'penci_rltpop_close_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Background Color for Related Posts Popup',
	'id'       => 'penci_rltpop_bg_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Custom Color for Post Titles on Related Posts Popup',
	'id'       => 'penci_rltpop_title_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Custom Color for Post Titles Hover on Related Posts Popup',
	'id'       => 'penci_rltpop_title_hover',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Custom Color for Date on Related Posts Popup',
	'id'       => 'penci_rltpop_date_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'authow-fw-color',
	'label'    => 'Custom Color for Borders on Related Posts Popup',
	'id'       => 'penci_rltpop_border_color',
);

return $options;
