<?php
$options   = [];
$options[] = array(
	'id'       => 'goso_popup_show_after',
	'default'  => 'all_pages',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Popup Event',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'all_pages' => 'Show on all pages, no using cookies',
		'time'      => 'One Time - close forever when users close popup',
		'fixtime'   => 'After Fixed Time',
	],
);
$options[] = array(
	'id'       => 'goso_popup_html_content',
	'default'  => '',
	'sanitize' => 'goso_sanitize_textarea_field',
	'label'    => 'Load Popup Content Using Shortcode/HTML',
	'type'     => 'authow-fw-textarea',
);
$options[] = array(
	'id'          => 'goso_popup_block',
	'default'     => '',
	'sanitize'    => 'goso_sanitize_choices_field',
	'label'       => 'Load Popup Content Using Goso Block',
	'description' => 'You can add new or edit a Goso Block on <a target="_blank" href="' . esc_url( admin_url( '/edit.php?post_type=goso-block' ) ) . '">this page</a>',
	'type'        => 'authow-fw-ajax-select',
	'choices'     => call_user_func( function () {
		$builder_layout  = [ '' => '- Select -' ];
		$builder_layouts = get_posts( [
			'post_type'      => 'goso-block',
			'posts_per_page' => - 1,
		] );

		foreach ( $builder_layouts as $builder_builder ) {
			$builder_layout[ $builder_builder->post_name ] = $builder_builder->post_title;
		}

		return $builder_layout;
	} ),
);
$options[] = array(
	'id'          => 'goso_popup_show_after_time',
	'default'     => '2000',
	'sanitize'    => 'goso_sanitize_text_field',
	'label'       => 'Popup Delay',
	'description' => 'Show popup after some time (in milliseconds). Apply for "Some Time" Setting.',
	'type'        => 'authow-fw-text'
);
$options[] = array(
	'id'          => 'goso_popup_show_after_time',
	'default'     => '7',
	'sanitize'    => 'goso_sanitize_text_field',
	'label'       => 'Show After Fixed Time',
	'description' => 'Set the number of days expire the popup cookie. Apply for "After Fixed Time" Setting.',
	'type'        => 'authow-fw-text'
);
$options[] = array(
	'id'          => 'goso_popup_version',
	'default'     => '1',
	'sanitize'    => 'goso_sanitize_text_field',
	'label'       => 'Popup Version',
	'description' => 'If you apply any changes to your popup settings or content you might want to force the popup to all visitors who already closed it again. In this case, you just need to increase the banner version.',
	'type'        => 'authow-fw-text'
);
$options[] = array(
	'id'          => 'goso_popup_show_after_pages',
	'default'     => '0',
	'sanitize'    => 'goso_sanitize_text_field',
	'label'       => 'Show After Number of Pages Visited',
	'description' => 'You can choose how many pages the user should visit before the popup will be shown.',
	'type'        => 'authow-fw-text'
);
$options[] = array(
	'id'       => 'goso_popup_animation',
	'default'  => 'move-to-top',
	'sanitize' => 'goso_sanitize_choices_field',
	'label'    => 'Popup Open Animation',
	'type'     => 'authow-fw-select',
	'choices'  => [
		'move-to-left'   => 'Move To Left',
		'move-to-right'  => 'Move To Right',
		'move-to-top'    => 'Move To Top',
		'move-to-bottom' => 'Move To Bottom',
		'fadein'         => 'Fade In',
	]
);

return $options;
