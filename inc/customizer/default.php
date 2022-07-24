<?php
/**
 * Set some values default when theme is activated
 *
 * @param string $name
 *
 * @return string / true / false
 */
function penci_default_setting_customizer( $name ) {
	$defaults = array(

		// Options
		'penci_sidebar_home'                => true,
		'penci_sidebar_posts'               => true,
		'penci_sidebar_archive'             => true,
		'penci_preload_google_fonts'        => true,
		'penci_toppost_enable'              => true,
		'penci_tb_date_text'                => "[penci_date format='l, F j Y'] - Welcome",
		'penci_facebook'                    => 'https://www.facebook.com/GosoDesign',
		'penci_twitter'                     => 'https://twitter.com/GosoDesign',
		'penci_single_poslcscount'          => 'below-content',

		// Transition text
		'penci_top_bar_custom_text'         => esc_html__( 'Top Posts', 'authow' ),
		'penci_header_slogan_text'          => esc_html__( 'keep your memories alive', 'authow' ),
		'penci_trans_comment'               => esc_html__( 'comment', 'authow' ),
		'penci_trans_countviews'            => esc_html__( 'views', 'authow' ),
		'penci_trans_read'                  => esc_html__( 'read', 'authow' ),
		'penci_trans_tago'                  => esc_html__( 'ago', 'authow' ),
		'penci_trans_beforeago'             => esc_html__( '', 'authow' ),
		'penci_trans_published'             => esc_html__( 'Published:', 'authow' ),
		'penci_trans_modifiedat'            => esc_html__( 'Last Updated on', 'authow' ),
		'penci_trans_save_fields'           => esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'authow' ),
		'penci_trans_type_and_hit'          => esc_html__( 'Type and hit enter...', 'authow' ),
		'penci_trans_comments'              => esc_html__( 'comments', 'authow' ),
		'penci_trans_reply_comment'         => esc_html__( 'Reply', 'authow' ),
		'penci_trans_edit_comment'          => esc_html__( 'Edit', 'authow' ),
		'penci_trans_wait_approval_comment' => esc_html__( 'Your comment is awaiting approval', 'authow' ),
		'penci_trans_by'                    => esc_html__( 'by', 'authow' ),
		'penci_trans_home'                  => esc_html__( 'Home', 'authow' ),
		'penci_home_popular_title'          => esc_html__( 'Popular Posts', 'authow' ),
		'penci_home_title'                  => '',
		'penci_trans_newer_posts'           => esc_html__( 'Newer Posts', 'authow' ),
		'penci_trans_older_posts'           => esc_html__( 'Older Posts', 'authow' ),
		'penci_trans_load_more_posts'       => esc_html__( 'Load More Posts', 'authow' ),
		'penci_trans_no_more_posts'         => esc_html__( 'Sorry, No more posts', 'authow' ),
		'penci_trans_all'                   => esc_html__( 'All', 'authow' ),
		'penci_trans_back_to_top'           => esc_html__( 'Back To Top', 'authow' ),
		'penci_trans_written_by'            => esc_html__( 'written by', 'authow' ),
		'penci_trans_previous_post'         => esc_html__( 'previous post', 'authow' ),
		'penci_trans_next_post'             => esc_html__( 'next post', 'authow' ),
		'penci_post_related_text'           => esc_html__( 'You may also like', 'authow' ),
		'penci_inlinerp_title'              => esc_html__( 'You Might Be Interested In', 'authow' ),
		'penci_rltpopup_heading_text'       => esc_html__( 'Read also', 'authow' ),
		'penci_trans_name'                  => esc_html__( 'Name*', 'authow' ),
		'penci_trans_email'                 => esc_html__( 'Email*', 'authow' ),
		'penci_trans_website'               => esc_html__( 'Website', 'authow' ),
		'penci_trans_your_comment'          => esc_html__( 'Your Comment', 'authow' ),
		'penci_trans_leave_a_comment'       => esc_html__( 'Leave a Comment', 'authow' ),
		'penci_trans_cancel_reply'          => esc_html__( 'Cancel Reply', 'authow' ),
		'penci_trans_submit'                => esc_html__( 'Submit', 'authow' ),
		'penci_trans_category'              => esc_html__( 'Category:', 'authow' ),
		'penci_trans_continue_reading'      => esc_html__( 'Continue Reading', 'authow' ),
		'penci_trans_read_more'             => esc_html__( 'Read more', 'authow' ),
		'penci_trans_view_all'              => esc_html__( 'View All', 'authow' ),
		'penci_trans_tag'                   => esc_html__( 'Tag:', 'authow' ),
		'penci_trans_tags'                  => esc_html__( 'Tags', 'authow' ),
		'penci_trans_posts_tagged'          => esc_html__( 'Posts tagged with', 'authow' ),
		'penci_trans_author'                => esc_html__( 'Author', 'authow' ),
		'penci_trans_daily_archives'        => esc_html__( 'Daily Archives', 'authow' ),
		'penci_trans_monthly_archives'      => esc_html__( 'Monthly Archives', 'authow' ),
		'penci_trans_yearly_archives'       => esc_html__( 'Yearly Archives', 'authow' ),
		'penci_trans_archives'              => esc_html__( 'Archives', 'authow' ),
		'penci_trans_search'                => esc_html__( 'Search', 'authow' ),
		'penci_trans_search_results_for'    => esc_html__( 'Search results for', 'authow' ),
		'penci_trans_share'                 => esc_html__( 'Share', 'authow' ),
		'penci_trans_comments_closed'       => esc_html__( 'Comments are closed.', 'authow' ),
		'penci_trans_search_not_found'      => esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'authow' ),
		'penci_trans_back_to_homepage'      => esc_html__( 'Back to Home Page', 'authow' ),
		'penci_not_found_sub_heading'       => esc_html__( "OOPS! Page you're looking for doesn't exist. Please use search for help", "authow" ),
		'penci_footer_copyright'            => '@2021 - All Right Reserved. Designed and Developed by <a rel="nofollow" href="https://1.envato.market/YYJ4P" target="_blank">GosoDesign</a>',
		'penci_bg_color_dark'               => '#ffffff',
		'penci_text_color_dark'             => '#afafaf',
		'penci_border_color_dark'           => '#DEDEDE',
		'penci_meta_color_dark'             => '#949494',
		'penci_gprd_desc'                   => esc_html__( "This website uses cookies to improve your experience. We'll assume you're ok with this, but you can opt-out if you wish.", 'authow' ),
		'penci_gprd_rmore'                  => esc_html__( "Read More", 'authow' ),
		'penci_gprd_btn_accept'             => esc_html__( "Accept", 'authow' ),
		'penci_gprd_policy_text'            => esc_html__( "Privacy & Cookies Policy", 'authow' ),
		'penci_gprd_rmore_link'             => '#',
		'penci_arf_title'                   => esc_html__( 'Latest in {name}', 'authow' ),

		// Login & Register
		'penci_tblogin_text'                => '',
		'penci_trans_hello_text'            => esc_html__( 'Hello', 'authow' ),
		'penci_trans_dashboard_text'        => esc_html__( 'Dashboard', 'authow' ),
		'penci_trans_profile_text'          => esc_html__( 'Profile', 'authow' ),
		'penci_trans_logout_text'           => esc_html__( 'Logout', 'authow' ),
		'penci_trans_sign_in'               => esc_html__( 'Sign In', 'authow' ),
		'penci_trans_register_new_account'  => esc_html__( 'Register New Account', 'authow' ),
		'penci_trans_recover_pass'          => esc_html__( 'Password Recovery', 'authow' ),
		'penci_plogin_wrong'                => esc_html__( 'Wrong username or password', 'authow' ),
		'penci_plogin_success'              => esc_html__( 'Login successful, redirecting...', 'authow' ),
		'penci_plogin_email_place'          => esc_html__( 'Email Address', 'authow' ),
		'penci_trans_usernameemail_text'    => esc_html__( 'Username or email', 'authow' ),
		'penci_trans_pass_text'             => esc_html__( 'Password', 'authow' ),
		'penci_plogin_label_remember'       => esc_html__( 'Keep me signed in until I sign out', 'authow' ),
		'penci_plogin_label_log_in'         => esc_html__( 'Login to your account', 'authow' ),
		'penci_plogin_validate_robot'       => esc_html__( 'Please validate you are not robot.', 'authow' ),
		'penci_plogin_label_lostpassword'   => esc_html__( 'Forgot your password?', 'authow' ),
		'penci_plogin_text_has_account'     => esc_html__( 'Do not have an account ?', 'authow' ),
		'penci_plogin_label_registration'   => esc_html__( 'Register here', 'authow' ),

		'penci_preset_submit'         => esc_html__( 'Send My Password', 'authow' ),
		'penci_preset_desc'           => esc_html__( 'A new password will be emailed to you.', 'authow' ),
		'penci_preset_received'       => esc_html__( 'Have received a new password?', 'authow' ),
		'penci_preset_noemail'        => esc_html__( 'There is no user registered with that email.', 'authow' ),
		'penci_preset_from'           => esc_html__( 'From:', 'authow' ),
		'penci_preset_newpassis'      => esc_html__( 'Your new password is:', 'authow' ),
		'penci_preset_checkinbox'     => esc_html__( 'Check your email address to get the new password.', 'authow' ),
		'penci_preset_cantsend'       => esc_html__( 'The email could not be sent. Possible reason: your host may have disabled the mail() function.', 'authow' ),
		'penci_preset_somethingwrong' => esc_html__( 'Oops! Something went wrong while updating your account.', 'authow' ),

		'penci_pregister_first_name'         => esc_html__( 'First Name', 'authow' ),
		'penci_pregister_last_name'          => esc_html__( 'Last Name', 'authow' ),
		'penci_pregister_user_name'          => esc_html__( 'Username', 'authow' ),
		'penci_pregister_user_email'         => esc_html__( 'Email address', 'authow' ),
		'penci_pregister_user_pass'          => esc_html__( 'Password', 'authow' ),
		'penci_pregister_pass_confirm'       => esc_html__( 'Confirm Password', 'authow' ),
		'penci_pregister_button_submit'      => esc_html__( 'Sign up new account', 'authow' ),
		'penci_pregister_has_account'        => esc_html__( 'Have an account?', 'authow' ),
		'penci_pregister_label_registration' => esc_html__( 'Login here', 'authow' ),

		'penci_plogin_mess_invalid_email'    => esc_html__( 'Invalid email.', 'authow' ),
		'penci_plogin_mess_error_email_pass' => esc_html__( 'Password does not match the confirm password', 'authow' ),
		'penci_plogin_mess_username_reg'     => esc_html__( 'This username is already registered.', 'authow' ),
		'penci_plogin_mess_email_reg'        => esc_html__( 'This email address is already registered.', 'authow' ),
		'penci_plogin_mess_wrong_email_pass' => esc_html__( 'Wrong username or password.', 'authow' ),
		'penci_plogin_mess_reg_succ'         => esc_html__( 'Registered successful, redirecting...', 'authow' ),

		'penci__hide_share_linkedin'    => 1,
		'penci__hide_share_tumblr'      => 1,
		'penci__hide_share_reddit'      => 1,
		'penci__hide_share_telegram'    => 1,
		'penci__hide_share_stumbleupon' => 1,
		'penci__hide_share_whatsapp'    => 1,
		'penci__hide_share_line'        => 1,
		'penci__hide_share_ok'          => 1,
		'penci__hide_share_vk'          => 1,
		'penci__hide_share_messenger'   => 1,
		'penci__hide_share_pocket'      => 1,
		'penci__hide_share_skype'       => 1,
		'penci__hide_share_viber'       => 1,


		'penci_ajaxsearch_no_post'   => esc_html__( "No Post Found!", 'authow' ),
		'penci_agepopup_agree_text'  => esc_html__( "I am 18 or Older", 'authow' ),
		'penci_agepopup_cancel_text' => esc_html__( "I am Under 18", 'authow' ),

		'penci_toc_heading_text' => esc_html__( "Table of Contents", 'authow' ),
		'penci_trans_recent'     => esc_html__( "Recent", 'authow' ),
		'penci_trans_popular'    => esc_html__( "Popular", 'authow' ),
		'penci_trans_post'       => esc_html__( "Post", 'authow' ),
		'penci_trans_posts'      => esc_html__( "Posts", 'authow' ),
		'followers'              => esc_html__( "Followers", 'authow' ),
		'follow'                 => esc_html__( "Follow", 'authow' ),
		'following'              => esc_html__( "Following", 'authow' ),
		'likes'                  => esc_html__( "Likes", 'authow' ),
	);

	return isset( $defaults[ $name ] ) ? $defaults[ $name ] : '';
}

/**
 * Get theme settings.
 *
 * @param string $name
 *
 * @since 4.0
 */
function penci_get_setting( $name ) {
	return do_shortcode( get_theme_mod( $name, penci_default_setting_customizer( $name ) ) );
}