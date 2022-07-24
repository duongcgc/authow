<?php
/**
 * Set some values default when theme is activated
 *
 * @param string $name
 *
 * @return string / true / false
 */
function goso_default_setting_customizer( $name ) {
	$defaults = array(

		// Options
		'goso_sidebar_home'                => true,
		'goso_sidebar_posts'               => true,
		'goso_sidebar_archive'             => true,
		'goso_preload_google_fonts'        => true,
		'goso_toppost_enable'              => true,
		'goso_tb_date_text'                => "[goso_date format='l, F j Y'] - Welcome",
		'goso_facebook'                    => 'https://www.facebook.com/GosoDesign',
		'goso_twitter'                     => 'https://twitter.com/GosoDesign',
		'goso_single_poslcscount'          => 'below-content',

		// Transition text
		'goso_top_bar_custom_text'         => esc_html__( 'Top Posts', 'authow' ),
		'goso_header_slogan_text'          => esc_html__( 'keep your memories alive', 'authow' ),
		'goso_trans_comment'               => esc_html__( 'comment', 'authow' ),
		'goso_trans_countviews'            => esc_html__( 'views', 'authow' ),
		'goso_trans_read'                  => esc_html__( 'read', 'authow' ),
		'goso_trans_tago'                  => esc_html__( 'ago', 'authow' ),
		'goso_trans_beforeago'             => esc_html__( '', 'authow' ),
		'goso_trans_published'             => esc_html__( 'Published:', 'authow' ),
		'goso_trans_modifiedat'            => esc_html__( 'Last Updated on', 'authow' ),
		'goso_trans_save_fields'           => esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'authow' ),
		'goso_trans_type_and_hit'          => esc_html__( 'Type and hit enter...', 'authow' ),
		'goso_trans_comments'              => esc_html__( 'comments', 'authow' ),
		'goso_trans_reply_comment'         => esc_html__( 'Reply', 'authow' ),
		'goso_trans_edit_comment'          => esc_html__( 'Edit', 'authow' ),
		'goso_trans_wait_approval_comment' => esc_html__( 'Your comment is awaiting approval', 'authow' ),
		'goso_trans_by'                    => esc_html__( 'by', 'authow' ),
		'goso_trans_home'                  => esc_html__( 'Home', 'authow' ),
		'goso_home_popular_title'          => esc_html__( 'Popular Posts', 'authow' ),
		'goso_home_title'                  => '',
		'goso_trans_newer_posts'           => esc_html__( 'Newer Posts', 'authow' ),
		'goso_trans_older_posts'           => esc_html__( 'Older Posts', 'authow' ),
		'goso_trans_load_more_posts'       => esc_html__( 'Load More Posts', 'authow' ),
		'goso_trans_no_more_posts'         => esc_html__( 'Sorry, No more posts', 'authow' ),
		'goso_trans_all'                   => esc_html__( 'All', 'authow' ),
		'goso_trans_back_to_top'           => esc_html__( 'Back To Top', 'authow' ),
		'goso_trans_written_by'            => esc_html__( 'written by', 'authow' ),
		'goso_trans_previous_post'         => esc_html__( 'previous post', 'authow' ),
		'goso_trans_next_post'             => esc_html__( 'next post', 'authow' ),
		'goso_post_related_text'           => esc_html__( 'You may also like', 'authow' ),
		'goso_inlinerp_title'              => esc_html__( 'You Might Be Interested In', 'authow' ),
		'goso_rltpopup_heading_text'       => esc_html__( 'Read also', 'authow' ),
		'goso_trans_name'                  => esc_html__( 'Name*', 'authow' ),
		'goso_trans_email'                 => esc_html__( 'Email*', 'authow' ),
		'goso_trans_website'               => esc_html__( 'Website', 'authow' ),
		'goso_trans_your_comment'          => esc_html__( 'Your Comment', 'authow' ),
		'goso_trans_leave_a_comment'       => esc_html__( 'Leave a Comment', 'authow' ),
		'goso_trans_cancel_reply'          => esc_html__( 'Cancel Reply', 'authow' ),
		'goso_trans_submit'                => esc_html__( 'Submit', 'authow' ),
		'goso_trans_category'              => esc_html__( 'Category:', 'authow' ),
		'goso_trans_continue_reading'      => esc_html__( 'Continue Reading', 'authow' ),
		'goso_trans_read_more'             => esc_html__( 'Read more', 'authow' ),
		'goso_trans_view_all'              => esc_html__( 'View All', 'authow' ),
		'goso_trans_tag'                   => esc_html__( 'Tag:', 'authow' ),
		'goso_trans_tags'                  => esc_html__( 'Tags', 'authow' ),
		'goso_trans_posts_tagged'          => esc_html__( 'Posts tagged with', 'authow' ),
		'goso_trans_author'                => esc_html__( 'Author', 'authow' ),
		'goso_trans_daily_archives'        => esc_html__( 'Daily Archives', 'authow' ),
		'goso_trans_monthly_archives'      => esc_html__( 'Monthly Archives', 'authow' ),
		'goso_trans_yearly_archives'       => esc_html__( 'Yearly Archives', 'authow' ),
		'goso_trans_archives'              => esc_html__( 'Archives', 'authow' ),
		'goso_trans_search'                => esc_html__( 'Search', 'authow' ),
		'goso_trans_search_results_for'    => esc_html__( 'Search results for', 'authow' ),
		'goso_trans_share'                 => esc_html__( 'Share', 'authow' ),
		'goso_trans_comments_closed'       => esc_html__( 'Comments are closed.', 'authow' ),
		'goso_trans_search_not_found'      => esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'authow' ),
		'goso_trans_back_to_homepage'      => esc_html__( 'Back to Home Page', 'authow' ),
		'goso_not_found_sub_heading'       => esc_html__( "OOPS! Page you're looking for doesn't exist. Please use search for help", "authow" ),
		'goso_footer_copyright'            => '@2021 - All Right Reserved. Designed and Developed by <a rel="nofollow" href="https://1.envato.market/YYJ4P" target="_blank">GosoDesign</a>',
		'goso_bg_color_dark'               => '#ffffff',
		'goso_text_color_dark'             => '#afafaf',
		'goso_border_color_dark'           => '#DEDEDE',
		'goso_meta_color_dark'             => '#949494',
		'goso_gprd_desc'                   => esc_html__( "This website uses cookies to improve your experience. We'll assume you're ok with this, but you can opt-out if you wish.", 'authow' ),
		'goso_gprd_rmore'                  => esc_html__( "Read More", 'authow' ),
		'goso_gprd_btn_accept'             => esc_html__( "Accept", 'authow' ),
		'goso_gprd_policy_text'            => esc_html__( "Privacy & Cookies Policy", 'authow' ),
		'goso_gprd_rmore_link'             => '#',
		'goso_arf_title'                   => esc_html__( 'Latest in {name}', 'authow' ),

		// Login & Register
		'goso_tblogin_text'                => '',
		'goso_trans_hello_text'            => esc_html__( 'Hello', 'authow' ),
		'goso_trans_dashboard_text'        => esc_html__( 'Dashboard', 'authow' ),
		'goso_trans_profile_text'          => esc_html__( 'Profile', 'authow' ),
		'goso_trans_logout_text'           => esc_html__( 'Logout', 'authow' ),
		'goso_trans_sign_in'               => esc_html__( 'Sign In', 'authow' ),
		'goso_trans_register_new_account'  => esc_html__( 'Register New Account', 'authow' ),
		'goso_trans_recover_pass'          => esc_html__( 'Password Recovery', 'authow' ),
		'goso_plogin_wrong'                => esc_html__( 'Wrong username or password', 'authow' ),
		'goso_plogin_success'              => esc_html__( 'Login successful, redirecting...', 'authow' ),
		'goso_plogin_email_place'          => esc_html__( 'Email Address', 'authow' ),
		'goso_trans_usernameemail_text'    => esc_html__( 'Username or email', 'authow' ),
		'goso_trans_pass_text'             => esc_html__( 'Password', 'authow' ),
		'goso_plogin_label_remember'       => esc_html__( 'Keep me signed in until I sign out', 'authow' ),
		'goso_plogin_label_log_in'         => esc_html__( 'Login to your account', 'authow' ),
		'goso_plogin_validate_robot'       => esc_html__( 'Please validate you are not robot.', 'authow' ),
		'goso_plogin_label_lostpassword'   => esc_html__( 'Forgot your password?', 'authow' ),
		'goso_plogin_text_has_account'     => esc_html__( 'Do not have an account ?', 'authow' ),
		'goso_plogin_label_registration'   => esc_html__( 'Register here', 'authow' ),

		'goso_preset_submit'         => esc_html__( 'Send My Password', 'authow' ),
		'goso_preset_desc'           => esc_html__( 'A new password will be emailed to you.', 'authow' ),
		'goso_preset_received'       => esc_html__( 'Have received a new password?', 'authow' ),
		'goso_preset_noemail'        => esc_html__( 'There is no user registered with that email.', 'authow' ),
		'goso_preset_from'           => esc_html__( 'From:', 'authow' ),
		'goso_preset_newpassis'      => esc_html__( 'Your new password is:', 'authow' ),
		'goso_preset_checkinbox'     => esc_html__( 'Check your email address to get the new password.', 'authow' ),
		'goso_preset_cantsend'       => esc_html__( 'The email could not be sent. Possible reason: your host may have disabled the mail() function.', 'authow' ),
		'goso_preset_somethingwrong' => esc_html__( 'Oops! Something went wrong while updating your account.', 'authow' ),

		'goso_pregister_first_name'         => esc_html__( 'First Name', 'authow' ),
		'goso_pregister_last_name'          => esc_html__( 'Last Name', 'authow' ),
		'goso_pregister_user_name'          => esc_html__( 'Username', 'authow' ),
		'goso_pregister_user_email'         => esc_html__( 'Email address', 'authow' ),
		'goso_pregister_user_pass'          => esc_html__( 'Password', 'authow' ),
		'goso_pregister_pass_confirm'       => esc_html__( 'Confirm Password', 'authow' ),
		'goso_pregister_button_submit'      => esc_html__( 'Sign up new account', 'authow' ),
		'goso_pregister_has_account'        => esc_html__( 'Have an account?', 'authow' ),
		'goso_pregister_label_registration' => esc_html__( 'Login here', 'authow' ),

		'goso_plogin_mess_invalid_email'    => esc_html__( 'Invalid email.', 'authow' ),
		'goso_plogin_mess_error_email_pass' => esc_html__( 'Password does not match the confirm password', 'authow' ),
		'goso_plogin_mess_username_reg'     => esc_html__( 'This username is already registered.', 'authow' ),
		'goso_plogin_mess_email_reg'        => esc_html__( 'This email address is already registered.', 'authow' ),
		'goso_plogin_mess_wrong_email_pass' => esc_html__( 'Wrong username or password.', 'authow' ),
		'goso_plogin_mess_reg_succ'         => esc_html__( 'Registered successful, redirecting...', 'authow' ),

		'goso__hide_share_linkedin'    => 1,
		'goso__hide_share_tumblr'      => 1,
		'goso__hide_share_reddit'      => 1,
		'goso__hide_share_telegram'    => 1,
		'goso__hide_share_stumbleupon' => 1,
		'goso__hide_share_whatsapp'    => 1,
		'goso__hide_share_line'        => 1,
		'goso__hide_share_ok'          => 1,
		'goso__hide_share_vk'          => 1,
		'goso__hide_share_messenger'   => 1,
		'goso__hide_share_pocket'      => 1,
		'goso__hide_share_skype'       => 1,
		'goso__hide_share_viber'       => 1,


		'goso_ajaxsearch_no_post'   => esc_html__( "No Post Found!", 'authow' ),
		'goso_agepopup_agree_text'  => esc_html__( "I am 18 or Older", 'authow' ),
		'goso_agepopup_cancel_text' => esc_html__( "I am Under 18", 'authow' ),

		'goso_toc_heading_text' => esc_html__( "Table of Contents", 'authow' ),
		'goso_trans_recent'     => esc_html__( "Recent", 'authow' ),
		'goso_trans_popular'    => esc_html__( "Popular", 'authow' ),
		'goso_trans_post'       => esc_html__( "Post", 'authow' ),
		'goso_trans_posts'      => esc_html__( "Posts", 'authow' ),
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
function goso_get_setting( $name ) {
	return do_shortcode( get_theme_mod( $name, goso_default_setting_customizer( $name ) ) );
}