<?php
$options = [];
/* Add Options */
$options[]      = array(
	'default'  => 'Type and hit enter...',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Type and hit enter..."',
	'id'       => 'penci_trans_type_and_hit',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'read',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "read" - suffix of reading time',
	'id'       => 'penci_trans_read',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'views',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "views"',
	'id'       => 'penci_trans_countviews',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'ago',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "ago" after Time Ago Format',
	'id'       => 'penci_trans_tago',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => '',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Add Text Before Time Ago Format',
	'id'       => 'penci_trans_beforeago',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Published:',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Published:"',
	'id'       => 'penci_trans_published',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Last Updated on',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Last Updated on"',
	'id'       => 'penci_trans_modifiedat',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'comment',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "comment"',
	'id'       => 'penci_trans_comment',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'     => 'comments',
	'sanitize'    => 'sanitize_text_field',
	'label'       => 'Text: "comments"',
	'description' => 'for plural of comments',
	'id'          => 'penci_trans_comments',
	'type'        => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Reply',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Reply"',
	'id'       => 'penci_trans_reply_comment',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Edit',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Edit"',
	'id'       => 'penci_trans_edit_comment',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Your comment is awaiting approval',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Your comment is awaiting approval"',
	'id'       => 'penci_trans_wait_approval_comment',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Save my name, email, and website in this browser for the next time I comment.',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Save my name, email, and website in this browser for the next time I comment."',
	'id'       => 'penci_trans_save_fields',
	'type'     => 'authow-fw-textarea',
);
$options[]      = array(
	'default'  => 'by',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "by"',
	'id'       => 'penci_trans_by',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Home',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Home"',
	'id'       => 'penci_trans_home',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Newer Posts',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Newer Posts"',
	'id'       => 'penci_trans_newer_posts',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Older Posts',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Older Posts"',
	'id'       => 'penci_trans_older_posts',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Load More Posts',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Load More Posts"',
	'id'       => 'penci_trans_load_more_posts',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Sorry, No more posts',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Sorry, No more posts"',
	'id'       => 'penci_trans_no_more_posts',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'All',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "All"',
	'id'       => 'penci_trans_all',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Back To Top',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Back To Top"',
	'id'       => 'penci_trans_back_to_top',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'written by',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "written by"',
	'id'       => 'penci_trans_written_by',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'previous post',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "previous post"',
	'id'       => 'penci_trans_previous_post',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'next post',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "next post"',
	'id'       => 'penci_trans_next_post',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Name*',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Name*"',
	'id'       => 'penci_trans_name',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Email*',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Email*"',
	'id'       => 'penci_trans_email',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Website',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Website"',
	'id'       => 'penci_trans_website',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Your Comment',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Your Comment"',
	'id'       => 'penci_trans_your_comment',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Leave a Comment',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Leave a Comment"',
	'id'       => 'penci_trans_leave_a_comment',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Cancel Reply',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Cancel Reply"',
	'id'       => 'penci_trans_cancel_reply',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Submit',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Submit"',
	'id'       => 'penci_trans_submit',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Category:',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Category:"',
	'id'       => 'penci_trans_category',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Continue Reading',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Continue Reading"',
	'id'       => 'penci_trans_continue_reading',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Read more',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Read more"',
	'id'       => 'penci_trans_read_more',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'View All',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "View All"',
	'id'       => 'penci_trans_view_all',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Tag:',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Tag:"',
	'id'       => 'penci_trans_tag',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Tags',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Tags"',
	'id'       => 'penci_trans_tags',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Posts tagged with',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Posts tagged with"',
	'id'       => 'penci_trans_posts_tagged',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Author',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Author"',
	'id'       => 'penci_trans_author',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Daily Archives',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Daily Archives"',
	'id'       => 'penci_trans_daily_archives',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Monthly Archives',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Monthly Archives"',
	'id'       => 'penci_trans_monthly_archives',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Yearly Archives',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Yearly Archives"',
	'id'       => 'penci_trans_yearly_archives',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Archives',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Archives"',
	'id'       => 'penci_trans_archives',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Search',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Search"',
	'id'       => 'penci_trans_search',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Search results for',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Search results for"',
	'id'       => 'penci_trans_search_results_for',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Share',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Share"',
	'id'       => 'penci_trans_share',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Comments are closed.',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Comments are closed."',
	'id'       => 'penci_trans_comments_closed',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Sorry, but nothing matched your search terms. Please try again with some different keywords.',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Sorry, but nothing matched your search terms. Please try again with some different keywords."',
	'id'       => 'penci_trans_search_not_found',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Back to Home Page',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Back to Home Page"',
	'id'       => 'penci_trans_back_to_homepage',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Recent',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Recent"',
	'id'       => 'penci_trans_recent',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Popular',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Popular"',
	'id'       => 'penci_trans_popular',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Post',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Post"',
	'id'       => 'penci_trans_post',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'default'  => 'Posts',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Text: "Posts"',
	'id'       => 'penci_trans_posts',
	'type'     => 'authow-fw-text',
);
$options[]      = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Login/Register Form', 'authow' ),
	'id'       => 'penci_loginform_heading',
	'type'     => 'authow-fw-header',
);
$login_register = array(
	'penci_trans_hello_text'             => esc_html__( 'Hello', 'authow' ),
	'penci_trans_dashboard_text'         => esc_html__( 'Dashboard', 'authow' ),
	'penci_trans_profile_text'           => esc_html__( 'Profile', 'authow' ),
	'penci_trans_logout_text'            => esc_html__( 'Logout', 'authow' ),
	'penci_trans_sign_in'                => esc_html__( 'Sign In', 'authow' ),
	'penci_trans_register_new_account'   => esc_html__( 'Register New Account', 'authow' ),
	'penci_trans_recover_pass'           => esc_html__( 'Password Recovery', 'authow' ),
	'penci_trans_usernameemail_text'     => esc_html__( 'Username or email', 'authow' ),
	'penci_plogin_email_place'           => esc_html__( 'Email Address', 'authow' ),
	'penci_trans_pass_text'              => esc_html__( 'Password', 'authow' ),
	'penci_plogin_label_remember'        => esc_html__( 'Keep me signed in until I sign out', 'authow' ),
	'penci_plogin_label_log_in'          => esc_html__( 'Login to your account', 'authow' ),
	'penci_plogin_label_lostpassword'    => esc_html__( 'Forgot your password?', 'authow' ),
	'penci_plogin_text_has_account'      => esc_html__( 'Do not have an account ?', 'authow' ),
	'penci_plogin_label_registration'    => esc_html__( 'Register here', 'authow' ),
	'penci_plogin_validate_robot'        => esc_html__( 'Please validate you are not robot.', 'authow' ),
	'penci_plogin_wrong'                 => esc_html__( 'Wrong username or password', 'authow' ),
	'penci_plogin_success'               => esc_html__( 'Login successful, redirecting...', 'authow' ),
	'penci_preset_submit'                => esc_html__( 'Send My Password', 'authow' ),
	'penci_preset_desc'                  => esc_html__( 'A new password will be emailed to you.', 'authow' ),
	'penci_preset_received'              => esc_html__( 'Have received a new password?', 'authow' ),
	'penci_preset_noemail'               => esc_html__( 'There is no user registered with that email.', 'authow' ),
	'penci_preset_from'                  => esc_html__( 'From:', 'authow' ),
	'penci_preset_newpassis'             => esc_html__( 'Your new password is:', 'authow' ),
	'penci_preset_checkinbox'            => esc_html__( 'Check your email address to get the new password.', 'authow' ),
	'penci_preset_cantsend'              => esc_html__( 'The email could not be sent. Possible reason: your host may have disabled the mail() function.', 'authow' ),
	'penci_preset_somethingwrong'        => esc_html__( 'Oops! Something went wrong while updating your account.', 'authow' ),
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
);
foreach ( $login_register as $login_register_id => $login_register_label ) {
	$options[] = array(
		'default'  => $login_register_label,
		'sanitize' => 'sanitize_text_field',
		'label'    => 'Text: "' . $login_register_label . '"',
		'id'       => $login_register_id,
		'type'     => 'authow-fw-text',
	);
}

return $options;
