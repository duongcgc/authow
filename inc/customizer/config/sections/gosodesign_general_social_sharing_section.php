<?php
$options           = [];
$list_block_social = array(
	'plike'       => array( esc_html__( 'Hide Like Post', 'authow' ), '' ),
	'facebook'    => array( esc_html__( 'Hide Facebook Share Button', 'authow' ), '' ),
	'twitter'     => array( esc_html__( 'Hide Twitter Share Button', 'authow' ), '' ),
	'pinterest'   => array( esc_html__( 'Hide Pinterest Share Button', 'authow' ), '' ),
	'linkedin'    => array( esc_html__( 'Hide Linkedin Share Button', 'authow' ), '' ),
	'tumblr'      => array( esc_html__( 'Hide Tumblr Share Button', 'authow' ), '' ),
	/* 'messenger'        => array( esc_html__( 'Hide Share Messenger Button', 'authow' ), '' ), */
	'vk'          => array( esc_html__( 'Hide VKontakte Share Button', 'authow' ), '' ),
	'ok'          => array( esc_html__( 'Hide Odnoklassniki Share Button', 'authow' ), '' ),
	'reddit'      => array( esc_html__( 'Hide Reddit Share Button', 'authow' ), '' ),
	'stumbleupon' => array( esc_html__( 'Hide Stumbleupon Share Button', 'authow' ), '' ),
	'whatsapp'    => array(
		esc_html__( 'Hide Whatsapp Share Button', 'authow' ),
		esc_html__( 'Works for Mobile Only', 'authow' )
	),
	'telegram'    => array(
		esc_html__( 'Hide Telegram Share Button', 'authow' ),
		esc_html__( 'Works for Mobile Only', 'authow' )
	),
	'line'        => array(
		esc_html__( 'Hide LINE Share Button', 'authow' ),
		esc_html__( 'Works for Mobile Only', 'authow' )
	),
	'pocket'      => array( esc_html__( 'Hide Pocket Share Button', 'authow' ), '' ),
	'skype'       => array( esc_html__( 'Hide Skype Share Button', 'authow' ), '' ),
	'viber'       => array(
		esc_html__( 'Hide Viber Share Button', 'authow' ),
		esc_html__( 'Works for Mobile Only', 'authow' )
	),
	'email'       => array( esc_html__( 'Hide Email Share Button', 'authow' ), '' ),
);
foreach ( $list_block_social as $social_id => $social_label ) {
	$default = '';
	if ( in_array( $social_id, array(
		'messenger',
		'vk',
		'ok',
		'pocket',
		'skype',
		'viber',
		'linkedin',
		'tumblr',
		'reddit',
		'stumbleupon',
		'whatsapp',
		'telegram',
		'line'
	) ) ) {
		$default = 1;
	}
	$options[] = array(
		'label'       => $social_label[0],
		'description' => $social_label[1],
		'type'        => 'authow-fw-toggle',
		'id'          => 'penci__hide_share_' . $social_id,
		'sanitize'    => 'penci_sanitize_checkbox_field',
		'default'     => $default
	);
}
$options[] = array(
	'label'       => 'Custom Sharing Text for Twitter',
	'description' => __( 'Custom prefix text on preview share of Twitter', 'authow' ),
	'id'          => 'penci_post_twitter_share_text',
	'type'        => 'authow-fw-textarea',
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field'
);

return $options;
