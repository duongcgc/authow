<?php
$options                = [];
$options[]              = array(
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'authow-fw-size',
	'label'    => __( 'Font Size for Categories', 'authow' ),
	'id'       => 'goso_single_cat_font_size',
	'ids'      => array(
		'desktop' => 'goso_single_cat_font_size',
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
$options[]              = array(
	'label'    => '',
	'id'       => 'goso_single_title_font_msize',
	'type'     => 'authow-fw-hidden',
	'sanitize' => 'absint',
);
$options[]              = array(
	'label'    => 'Font Size for Post Title',
	'id'       => 'goso_single_title_font_size',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'default'  => '30',
	'ids'      => array(
		'desktop' => 'goso_single_title_font_size',
		'mobile'  => 'goso_single_title_font_msize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '30',
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
$options[]              = array(
	'label'    => '',
	'id'       => 'goso_single_subtitle_font_msize',
	'type'     => 'authow-fw-hidden',
	'sanitize' => 'absint',
);
$options[]              = array(
	'label'    => 'Font Size for SubTitle',
	'id'       => 'goso_single_subtitle_font_size',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_single_subtitle_font_size',
		'mobile'  => 'goso_single_subtitle_font_msize',
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
$opt_single_title_fsize = array(
	'psingle_title_size_s3'  => esc_html__( 'Font Size for Post Title on Style 3', 'authow' ),
	'psingle_title_size_s4'  => esc_html__( 'Font Size for Post Title on Style 4', 'authow' ),
	'psingle_title_size_s5'  => esc_html__( 'Font Size for Post Title on Style 5', 'authow' ),
	'psingle_title_size_s6'  => esc_html__( 'Font Size for Post Title on Style 6', 'authow' ),
	'psingle_title_size_s7'  => esc_html__( 'Font Size for Post Title on Style 7', 'authow' ),
	'psingle_title_size_s8'  => esc_html__( 'Font Size for Post Title on Style 8', 'authow' ),
	'psingle_title_size_s9'  => esc_html__( 'Font Size for Post Title on Style 9', 'authow' ),
	'psingle_title_size_s10' => esc_html__( 'Font Size for Post Title on Style 10', 'authow' ),
);
foreach ( $opt_single_title_fsize as $opt_single_title_fsize_id => $opt_single_title_fsize_label ) {
	$options[] = array(
		'default'  => '',
		'sanitize' => 'absint',
		'label'    => '',
		'id'       => $opt_single_title_fsize_id . '_mobile',
		'type'     => 'authow-fw-hidden',
	);
	$options[] = array(
		'default'  => '',
		'sanitize' => 'absint',
		'label'    => __( $opt_single_title_fsize_label, 'authow' ),
		'id'       => $opt_single_title_fsize_id,
		'ids'      => [
			'desktop' => $opt_single_title_fsize_id,
			'mobile'  => $opt_single_title_fsize_id . '_mobile',
		],
		'type'     => 'authow-fw-size',
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
}
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Post Meta', 'authow' ),
	'id'       => 'goso_single_meta_font_size',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_single_meta_font_size',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 300,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '14',
		),
	),
);
for ( $x = 1; $x < 7; $x ++ ) {
	$default   = 26 - ( $x * 2 );
	$options[] = array(
		'label'       => '',
		'description' => '',
		'id'          => 'goso_single_title_h' . $x . '_size_mobile',
		'type'        => 'authow-fw-hidden',
		'sanitize'    => 'absint',
	);
	$options[] = array(
		'label'    => 'Font Size for H' . $x . ' inside Post Content',
		'id'       => 'goso_single_title_h' . $x . '_size',
		'type'     => 'authow-fw-size',
		'sanitize' => 'absint',
		'default'  => $default,
		'ids'      => array(
			'desktop' => 'goso_single_title_h' . $x . '_size',
			'mobile'  => 'goso_single_title_h' . $x . '_size_mobile',
		),
		'choices'  => array(
			'desktop' => array(
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
				'edit'    => true,
				'unit'    => 'px',
				'default' => $default,
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
}
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'goso_single_title_p_size_mobile',
	'type'        => 'authow-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'    => 'Font Size Text Inside Post Content',
	'id'       => 'goso_single_title_p_size',
	'type'     => 'authow-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'goso_single_title_p_size',
		'mobile'  => 'goso_single_title_p_size_mobile',
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
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Blockquote', 'authow' ),
	'id'       => 'goso_single_blockquote_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_single_blockquote_fsize',
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
	'label'    => __( 'Font Size for Blockquote Author', 'authow' ),
	'id'       => 'goso_single_blockquoteauthor_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_single_blockquoteauthor_fsize',
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
	'default'  => '11',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Post Tags', 'authow' ),
	'id'       => 'goso_single_tags_font_size',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_single_tags_font_size',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '11',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Share Box', 'authow' ),
	'id'       => 'goso_single_share_box_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_single_share_box_fsize',
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
	'sanitize'    => 'sanitize_text_field',
	'label'       => esc_html__( 'Author Box', 'authow' ),
	'id'          => 'goso_section_fauthor_box',
	'description' => 'Please check <a target="_blank" href="https://authow.gosodesign.net/authow-document/#author-box">this guide</a> to know how to setup Author Box',
	'type'        => 'authow-fw-header',
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Author Name', 'authow' ),
	'id'       => 'goso_authorbio_name_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_authorbio_name_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '14',
		),
	),
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Author Description', 'authow' ),
	'id'       => 'goso_authorbio_desc_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_authorbio_desc_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '14',
		),
	),
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Author Social Icons', 'authow' ),
	'id'       => 'goso_authorbio_social_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_authorbio_social_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '14',
		),
	),
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Next/Previous Posts', 'authow' ),
	'id'       => 'goso_authorbio_nextprev_fsize',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'The "previous post", "next post" Text', 'authow' ),
	'id'       => 'goso_prevnextpost_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_prevnextpost_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '14',
		),
	),
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Post Titles on Prev/Next Posts', 'authow' ),
	'id'       => 'goso_prevnextpost_title_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_prevnextpost_title_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '14',
		),
	),
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Related Posts & Comments', 'authow' ),
	'id'       => 'goso_relatedpost_fsize',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '18',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Sections Heading', 'authow' ),
	'id'       => 'goso_rltcomment_heading_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_rltcomment_heading_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '18',
		),
	),
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Post Titles on Related Posts', 'authow' ),
	'id'       => 'goso_rltcomment_post_title_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_rltcomment_post_title_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '14',
		),
	),
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Post Date on Related Posts', 'authow' ),
	'id'       => 'goso_rltcomment_post_date_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_rltcomment_post_date_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '14',
		),
	),
);
$options[] = array(
	'default'  => '13',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Comment Author Name', 'authow' ),
	'id'       => 'goso_rltcomment_cmauthor_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_rltcomment_cmauthor_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '13',
		),
	),
);
$options[] = array(
	'default'  => '12',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Comment Date', 'authow' ),
	'id'       => 'goso_rltcomment_cmdate_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_rltcomment_cmdate_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '12',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Comment Content', 'authow' ),
	'id'       => 'goso_rltcomment_cmcontent_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_rltcomment_cmcontent_fsize',
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
	'default'  => '11',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Reply/Edit Text', 'authow' ),
	'id'       => 'goso_rltcomment_cmreplyedit_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_rltcomment_cmreplyedit_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '11',
		),
	),
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Inputs on Comment Form', 'authow' ),
	'id'       => 'goso_rltcomment_input_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_rltcomment_input_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '14',
		),
	),
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Submit Button on Comment Form', 'authow' ),
	'id'       => 'goso_rltcomment_submit_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_rltcomment_submit_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '14',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for GDPR message & "Save my name, email.." Text', 'authow' ),
	'id'       => 'goso_rltcomment_gdrp_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_rltcomment_gdrp_fsize',
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
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Related Posts Popup', 'authow' ),
	'id'       => 'goso_relatedpostpopup_fsize',
	'type'     => 'authow-fw-header',
);
$options[] = array(
	'default'  => '16',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Heading', 'authow' ),
	'id'       => 'goso_rltpopup_heading_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_rltpopup_heading_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '16',
		),
	),
);
$options[] = array(
	'default'  => '15',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Post Titles', 'authow' ),
	'id'       => 'goso_rltpopup_title_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_rltpopup_title_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '15',
		),
	),
);
$options[] = array(
	'default'  => '13',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Post Date', 'authow' ),
	'id'       => 'goso_rltpopup_date_fsize',
	'type'     => 'authow-fw-size',
	'ids'      => array(
		'desktop' => 'goso_rltpopup_date_fsize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '13',
		),
	),
);

return $options;
