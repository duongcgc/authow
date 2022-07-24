<?php
$options   = [];
$options[] = array(
	'label'       => esc_attr__( 'YouTube API Key', 'authow' ),
	'id'          => 'penci_youtube_api_key',
	'type'        => 'authow-fw-text',
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'description' => 'Please go to <a href="https://developers.google.com/youtube/v3/getting-started?hl=en" target="_blank">https://developers.google.com/youtube/v3/getting-started?hl=en</a> and check this giude and get the YouTube API Key',
);
$options[] = array(
	'label'       => esc_attr__( 'Weather API Key', 'authow' ),
	'id'          => 'penci_api_weather_key',
	'type'        => 'authow-fw-text',
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'description' => '<a href="' . esc_url( 'https://openweathermap.org/appid#get' ) . '" target="_blank">' . esc_html__( 'Click here to get an api key', 'authow' ) . '</a>'
);
$options[] = array(
	'label'       => esc_attr__( 'Google Map API Key', 'authow' ),
	'id'          => 'penci_map_api_key',
	'type'        => 'authow-fw-text',
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'description' => 'When you use "Goso Map" element from Elementor or WPBakery page builder, it required an Google Map API to make it works.',
);
$options[] = array(
	'label'    => 'Select "rel" Attribute Type for Social Media & Social Share Icons',
	'id'       => 'penci_rel_type_social',
	'default'  => 'noreferrer',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'authow-fw-select',
	'choices'  => array(
		'none'                         => 'None',
		'nofollow'                     => 'nofollow',
		'noreferrer'                   => 'noreferrer',
		'noopener'                     => 'noopener',
		'noreferrer_noopener'          => 'noreferrer noopener',
		'nofollow_noreferrer'          => 'nofollow noreferrer',
		'nofollow_noopener'            => 'nofollow noopener',
		'nofollow_noreferrer_noopener' => 'nofollow noreferrer noopener',
	)
);
if ( get_option( 'penci_authow_is_activated' ) ) {
	$options[] = array(
		'label'       => 'Disable New Version Update Notice on The Admin Page',
		'description' => 'You can check <a href="https://imgresources.s3.amazonaws.com/notice-updates.png" target="_blank">this image</a> to understand what\'s "new version update notice on admin page". When a new version released, this notice will appear. This option will help you disable this notice if you want.',
		'id'          => 'penci_disable_notice_updates',
		'type'        => 'authow-fw-toggle',
		'default'     => false,
		'sanitize'    => 'penci_sanitize_checkbox_field'
	);
}
$options[] = array(
	'label'    => 'Use Fontawesome Version 5',
	'id'       => 'penci_fontawesome_ver5',
	'type'     => 'authow-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);

return $options;
