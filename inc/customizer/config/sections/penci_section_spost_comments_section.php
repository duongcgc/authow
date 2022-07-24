<?php
$options   = [];
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Comments & Comment Form',
	'id'       => 'penci_post_hide_comments',
	'type'     => 'authow-fw-toggle',
);

$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Move Comment Form to Above the List Comments',
	'id'       => 'penci_post_move_comment_box',
	'type'     => 'authow-fw-toggle',
);

$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Hide "Name" field on Comment Form',
	'id'          => 'penci_single_comments_remove_name',
	'type'        => 'authow-fw-toggle',
	'description' => 'Note that: If you want to hide this field - you need go to Dashboard > Settings > Discussion > and un-check to "Comment author must fill out name and email" - check <a href="https://imgresources.s3.amazonaws.com/discussion_settings.png" target="_blank">this image</a> for more.',
);

$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Hide "Email" field on Comment Form',
	'id'          => 'penci_single_comments_remove_email',
	'description' => 'Note that: If you want to hide this field - you need go to Dashboard > Settings > Discussion > and un-check to "Comment author must fill out name and email" - check <a href="https://imgresources.s3.amazonaws.com/discussion_settings.png" target="_blank">this image</a> for more.',
	'type'        => 'authow-fw-toggle',
);

$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide "Website" field on Comment Form',
	'id'       => 'penci_single_comments_remove_website',
	'type'     => 'authow-fw-toggle',
);

$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Remove checkbox "Save my name, email, and website in this browser for the next time I comment."',
	'id'          => 'penci_single_hide_save_fields',
	'description' => 'Note that: This checkbox just appears when you use Wordpress from version 4.9.6',
	'type'        => 'authow-fw-toggle',
);

$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable GDPR message on Comment Form',
	'id'       => 'penci_single_gdpr',
	'type'     => 'authow-fw-toggle',
);

$options[] = array(
	'default'     => esc_html__( '* By using this form you agree with the storage and handling of your data by this website.', 'authow' ),
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => esc_html__( 'Custom GDPR Message on Comment Form', 'authow' ),
	'id'          => 'penci_single_gdpr_text',
	'description' => '',
	'type'        => 'authow-fw-textarea',
);

return $options;
