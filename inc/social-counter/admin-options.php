<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Goso_Social_Counter' ) ):
	class Goso_Social_Counter {

		static $list_socials = array(
			'facebook'   => 'Facebook',
			'twitter'    => 'Twitter',
			'youtube'    => 'Youtube',
			'instagram'  => 'Instagram',
			'pinterest'  => 'Pinterest',
			'flickr'     => 'Flickr',
			'vimeo'      => 'Vimeo',
			'soundcloud' => 'Soundcloud',
			'behance'    => 'Behance',
			'vk'         => 'VKontakte',
			'twitch'     => 'Twitch',
			'tiktok'     => 'Tiktok',
			'rss'        => 'RSS',
		);

		public function __construct() {

			add_filter( 'mb_settings_pages', array( $this, 'settings_pages' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'facebook_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'twitter_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'youtube_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'instagram_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'linkedin_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'pinterest_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'flickr_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'vimeo_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'soundcloud_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'github_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'behance_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'vk_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'twitch_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'tiktok_option' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'rss_option' ) );
		}

		function settings_pages( $settings_pages ) {
			$list_social_media = Goso_Social_Counter::$list_socials;

			$settings_pages[] = array(
				'id'          => 'penci_social_counter_settings',
				'option_name' => 'penci_social_counter_settings',
				'menu_title'  => 'Social Counter',
				'parent'      => 'authow_dashboard_welcome',
				'style'       => 'no-boxes',
				'tab_style'   => 'default',
				'columns'     => 1,
				'tabs'        => $list_social_media
			);

			return $settings_pages;
		}

		function facebook_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'facebook',
				'title'          => 'Facebook Settings',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'facebook',

				'fields' => array(
					array(
						'id'   => 'facebook_name',
						'type' => 'text',
						'name' => esc_html__( 'Facebook Page ID/Name', 'authow' ),
						'std'  => '80655071208',
						'desc' => __( 'Never know it before? <a target="_blank" href="https://www.facebook.com/help/1503421039731588">Get it here</a>.' )
					),
					array(
						'id'   => 'facebook_appid',
						'type' => 'text',
						'name' => esc_html__( 'Facebook App ID', 'authow' ),
						'std'  => '',
						'desc' => __( 'You can create an application and get Facebook App ID <a href="https://developers.facebook.com/docs/apps/register" target="_blank">here</a>.' )
					),
					array(
						'id'   => 'facebook_appsecret',
						'type' => 'text',
						'name' => esc_html__( 'Facebook App Secret', 'authow' ),
						'std'  => '',
						'desc' => __( 'You can create an application and get Facebook App Secret <a href="https://developers.facebook.com/docs/apps/register" target="_blank">here</a>.' )
					),
					array(
						'id'   => 'facebook_token',
						'type' => 'text',
						'name' => esc_html__( 'Facebook Access Token', 'authow' ),
						'std'  => '',
						'desc' => __( '<a class="pcfb_acces_token" href="#">Click here</a> to get the Facebook Access Token. Require Facebook App ID & Facebook App Secret' )
					),
					array(
						'id'   => 'facebook_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'facebook_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Custom "Fans" text', 'authow' ),
						'std'  => esc_html__( 'Fans', 'authow' ),
					),
					array(
						'id'   => 'facebook_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
						'std'  => esc_html__( 'Like', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function vimeo_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'vimeo',
				'title'          => 'vimeo',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'vimeo',

				'fields' => array(
					array(
						'id'   => 'vimeo_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'desc' => __( 'Enter Vimeo profile name.<br>Example: http://vimeo.com/<strong>profilename</strong><br/><i style="color:red">Please DO NOT enter the full profile URL.</i>', 'authow' ),
						'std'  => esc_html__( 'Vimeo', 'authow' ),
					),
					array(
						'id'   => 'vimeo_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'vimeo_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Custom "Subscribers" text', 'authow' ),
						'std'  => esc_html__( 'Subscribers', 'authow' ),
					),
					array(
						'id'   => 'vimeo_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
						'std'  => esc_html__( 'Subscribe', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function youtube_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'youtube',
				'title'          => 'youtube',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'youtube',

				'fields' => array(
					array(
						'id'   => 'youtube_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'std'  => esc_html__( '', 'authow' ),
						'desc' => 'Enter your Youtube username.<br>Example: http://www.youtube.com/<strong>username</strong> or http://www.youtube.com/c/<strong>username</strong><br/><i style="color:red">Please DO NOT enter the full profile URL.</i>'
					),
					array(
						'id'      => 'youtube_type',
						'type'    => 'select',
						'options' => array(
							'channel' => 'Channel',
							'user'    => 'User',
						),
						'name'    => esc_html__( 'Account Type', 'authow' )
					),
					array(
						'id'   => 'youtube_api_key',
						'type' => 'text',
						'name' => esc_html__( 'Youtube API Key', 'authow' ),
						'desc' => 'You can register Google API Key here for <a href="https://developers.google.com/youtube/v3/getting-started" target="_blank">YouTube</a>.',
					),
					array(
						'id'   => 'youtube_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'youtube_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'authow' ),
						'std'  => esc_html__( 'Subscribers', 'authow' ),
					),
					array(
						'id'   => 'youtube_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
						'std'  => esc_html__( 'Subscribe', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function soundcloud_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'soundcloud',
				'title'          => 'soundcloud',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'soundcloud',
				'fields'         => array(
					array(
						'id'   => 'soundcloud_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'std'  => esc_html__( '', 'authow' ),
						'desc' => esc_html__( 'Enter your SoundCloud username.', 'authow' ),
					),
					array(
						'id'   => 'soundcloud_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'soundcloud_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'authow' ),
						'std'  => esc_html__( 'Followers', 'authow' ),
					),
					array(
						'id'   => 'soundcloud_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
						'std'  => esc_html__( 'Follow Us', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function twitter_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'twitter',
				'title'          => 'twitter',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'twitter',

				'fields' => array(
					array(
						'id'   => 'twitter_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'std'  => esc_html__( 'envato', 'authow' ),
						'desc' => __( 'Enter your Twitter Username', 'authow' ),
					),
					array(
						'id'   => 'twitter_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'twitter_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'authow' ),
						'std'  => esc_html__( 'Followers', 'authow' ),
					),
					array(
						'id'   => 'twitter_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
						'std'  => esc_html__( 'Follow Us', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function instagram_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'instagram',
				'title'          => 'instagram',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'instagram',

				'fields' => array(
					array(
						'id'   => 'instagram_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'std'  => esc_html__( '', 'authow' ),
						'desc' => esc_html__( 'Enter your Instagram username.', 'authow' ),
					),
					array(
						'id'   => 'instagram_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'instagram_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'authow' ),
						'std'  => esc_html__( 'Followers', 'authow' ),
					),
					array(
						'id'   => 'instagram_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
						'std'  => esc_html__( 'Follow Us', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function linkedin_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'linkedin',
				'title'          => 'linkedin',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'linkedin',

				'fields' => array(
					array(
						'id'   => 'linkedin_url',
						'type' => 'text',
						'name' => esc_html__( 'Linkedin url', 'authow' )
					),
					array(
						'id'   => 'linkedin_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'std'  => esc_html__( 'Linkedin', 'authow' ),
					),
					array(
						'id'   => 'linkedin_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'authow' ),
						'std'  => esc_html__( 'Follow', 'authow' ),
					),
					array(
						'id'   => 'linkedin_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
						'std'  => esc_html__( 'Follow Us', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function pinterest_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'pinterest',
				'title'          => 'pinterest',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'pinterest',

				'fields' => array(
					array(
						'id'   => 'pinterest_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'std'  => esc_html__( '', 'authow' ),
						'desc' => esc_html__( 'Enter your Pinterest username', 'authow' ),
					),
					array(
						'id'   => 'pinterest_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'pinterest_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'authow' ),
						'std'  => esc_html__( 'Followers', 'authow' ),
					),
					array(
						'id'   => 'pinterest_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
						'std'  => esc_html__( 'Follow Us', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function flickr_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'flickr',
				'title'          => 'flickr',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'flickr',

				'fields' => array(
					array(
						'id'   => 'flickr_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'desc' => __( 'Enter full URL of your Flickr profile.<br/>Example: <strong>https://www.flickr.com/photos/yourprofile/</strong>', 'authow' ),
						'std'  => esc_html__( 'Flickr', 'authow' ),
					),
					array(
						'id'   => 'flickr_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default.', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'flickr_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'authow' ),
						'std'  => esc_html__( 'Followers', 'authow' ),
					),
					array(
						'id'   => 'flickr_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
						'std'  => esc_html__( 'Follow Us', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function dribbble_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'dribbble',
				'title'          => 'dribbble',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'dribbble',

				'fields' => array(
					array(
						'id'   => 'dribbble_username',
						'type' => 'text',
						'name' => esc_html__( 'Dribbble UserName', 'authow' )
					),
					array(
						'id'   => 'dribbble_token',
						'type' => 'text',
						'name' => esc_html__( 'Access Token Key', 'authow' )
					),
					array(
						'id'   => 'dribbble_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'std'  => esc_html__( 'Dribbble', 'authow' ),
					),
					array(
						'id'   => 'dribbble_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'dribbble_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'authow' ),
						'std'  => esc_html__( 'Followers', 'authow' ),
					),
					array(
						'id'   => 'dribbble_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
						'std'  => esc_html__( 'Follow Us', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function delicious_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'delicious',
				'title'          => 'delicious',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'delicious',

				'fields' => array(
					array(
						'id'   => 'delicious_username',
						'type' => 'text',
						'name' => esc_html__( 'Delicious UserName', 'authow' )
					),
					array(
						'id'   => 'delicious_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'std'  => esc_html__( 'Delicious', 'authow' ),
					),
					array(
						'id'   => 'delicious_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'delicious_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'authow' ),
						'std'  => esc_html__( 'Followers', 'authow' ),
					),
					array(
						'id'   => 'delicious_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
						'std'  => esc_html__( 'Follow Us', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function github_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'github',
				'title'          => 'github',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'github',

				'fields' => array(
					array(
						'id'   => 'github_username',
						'type' => 'text',
						'name' => esc_html__( 'Github UserName', 'authow' )
					),
					array(
						'id'   => 'github_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'std'  => esc_html__( 'Github', 'authow' ),
					),
					array(
						'id'   => 'github_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'github_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'authow' ),
						'std'  => esc_html__( 'Followers', 'authow' ),
					),
					array(
						'id'   => 'github_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
						'std'  => esc_html__( 'Follow Us', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function behance_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'behance',
				'title'          => 'behance',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'behance',

				'fields' => array(
					array(
						'id'   => 'behance_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'std'  => esc_html__( '', 'authow' ),
						'desc' => esc_html__( 'Enter your Behance username', 'authow' ),
					),
					array(
						'id'   => 'behance_api',
						'type' => 'text',
						'name' => esc_html__( 'Behance API Key', 'authow' ),
						'desc' => __( 'Get your key <a target="_blank" href="https://www.behance.net/dev/apps">here</a>.', 'authow' ),
					),
					array(
						'id'   => 'behance_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'behance_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'authow' ),
						'std'  => esc_html__( 'Followers', 'authow' ),
					),
					array(
						'id'   => 'behance_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
						'std'  => esc_html__( 'Follow Us', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function vk_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'vk',
				'title'          => 'vk',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'vk',

				'fields' => array(
					array(
						'id'   => 'vk_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'std'  => esc_html__( '', 'authow' ),
						'desc' => esc_html__( 'Enter your VK username.', 'authow' ),
					),
					array(
						'id'   => 'vk_api',
						'type' => 'text',
						'name' => esc_html__( 'VK API', 'authow' ),
						'std'  => esc_html__( '', 'authow' ),
						'desc' => __( 'Enter your VK API. Get your key <a target="_blank" href="https://vk.com/dev/">here</a>.', 'authow' ),
					),
					array(
						'id'   => 'vk_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'vk_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'authow' ),
						'std'  => esc_html__( 'Followers', 'authow' ),
					),
					array(
						'id'   => 'vk_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
						'std'  => esc_html__( 'Follow Us', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function tiktok_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'tiktok',
				'title'          => 'tiktok',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'tiktok',

				'fields' => array(
					array(
						'id'   => 'tiktok_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'std'  => esc_html__( '', 'authow' ),
						'desc' => esc_html__( 'Enter your Tiktok username.', 'authow' ),
					),
					array(
						'id'   => 'tiktok_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'tiktok_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'authow' ),
						'std'  => esc_html__( 'Followers', 'authow' ),
					),
					array(
						'id'   => 'tiktok_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
						'std'  => esc_html__( 'Follow Us', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function twitch_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'twitch',
				'title'          => 'twitch',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'twitch',

				'fields' => array(
					array(
						'id'   => 'twitch_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'std'  => esc_html__( '', 'authow' ),
						'desc' => esc_html__( 'Enter your Twitch channel name.', 'authow' ),
					),
					array(
						'id'   => 'twitch_client_id',
						'type' => 'text',
						'name' => esc_html__( 'Client ID', 'authow' ),
						'std'  => esc_html__( 'Twitch', 'authow' ),
						'desc' => __( 'You can create an application and get Twitch Client ID <a href="https://dev.twitch.tv/docs/v5/guides/authentication/" target="_blank">here</a>.', 'authow' ),
					),
					array(
						'id'   => 'twitch_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Like default', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'twitch_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text Below The Number', 'authow' ),
						'std'  => esc_html__( 'Followers', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

		function rss_option( $meta_boxes ) {
			$meta_boxes[] = array(
				'id'             => 'rss',
				'title'          => 'rss',
				'settings_pages' => 'penci_social_counter_settings',
				'tab'            => 'rss',

				'fields' => array(
					array(
						'id'   => 'rss_name',
						'type' => 'text',
						'name' => esc_html__( 'Name', 'authow' ),
						'desc' => __( 'Enter the RSS unique setting name.<br><i>Put any text you want but not leave it blank.</i>', 'authow' ),
					),
					array(
						'id'      => 'rss_type',
						'type'    => 'select',
						'name'    => esc_html__( 'Type', 'authow' ),
						'options' => array(
							'feedpress' => 'feedpress.it',
							'manual'    => esc_html__( 'Manual', 'authow' ),
						),
					),
					array(
						'id'   => 'rss_feedpress',
						'type' => 'text',
						'name' => esc_html__( 'Feedpress.it JSON file URL', 'authow' ),
						'desc' => esc_html__( 'Apply to Feedpress RSS Type', 'authow' ),
						'std'  => '',
					),
					array(
						'id'   => 'rss_feed_uri',
						'type' => 'text',
						'name' => esc_html__( 'Feed URL', 'authow' ),
						'desc' => esc_html__( 'Apply to Manual RSS Type', 'authow' ),
					),
					array(
						'id'   => 'rss_default',
						'type' => 'number',
						'name' => esc_html__( 'Number of Subscriber default', 'authow' ),
						'desc' => esc_html__( 'Show custom subscirbe on Manual RSS Type', 'authow' ),
						'std'  => 0,
					),
					array(
						'id'   => 'rss_text_below',
						'type' => 'text',
						'name' => esc_html__( 'Text below the number', 'authow' ),
					),
					array(
						'id'   => 'rss_text_btn',
						'type' => 'text',
						'name' => esc_html__( 'Custom Button Text', 'authow' ),
					),
				),
			);

			return $meta_boxes;
		}

	}

	new Goso_Social_Counter;
endif;
