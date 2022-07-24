<?php
/**
 * Comments template
 *
 * @package Wordpress
 * @since 1.0
 */

// Get numbers comments
$comment_numbers = get_comments_number();
$hide_count = 0;
if( get_theme_mod( 'goso_single_comments_remove_name' ) ){
	$hide_count += 1;
}
if( get_theme_mod( 'goso_single_comments_remove_email' ) ){
	$hide_count += 1;
}
if( get_theme_mod( 'goso_single_comments_remove_website' ) ){
	$hide_count += 1;
}
?>
<div class="post-comments<?php if( $comment_numbers == 0 ): echo ' no-comment-yet'; endif; echo ' goso-comments-hide-'. $hide_count; ?>" id="comments">
	<?php
	/* Custom field */
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

	$fields =  array(
		'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . goso_get_setting( 'goso_trans_name' ) . '" size="30"' . $aria_req . ' /></p>',

		'email' => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="' . goso_get_setting( 'goso_trans_email' ) . '" size="30"' . $aria_req . ' /></p>',

		'url' => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . goso_get_setting( 'goso_trans_website' ) . '" size="30" /></p>',
	);
	
	if( get_theme_mod( 'goso_single_comments_remove_name' ) ){
		$fields['author'] = '';
	}
	if( get_theme_mod( 'goso_single_comments_remove_email' ) ){
		$fields['email'] = '';
	}
	if( get_theme_mod( 'goso_single_comments_remove_website' ) ){
		$fields['url'] = '';
	}
	
	if( ! get_theme_mod( 'goso_single_hide_save_fields' ) && version_compare( get_bloginfo('version'),'4.9.6', '>=' ) ){
		$fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
							'<span class="comment-form-cookies-text" for="wp-comment-cookies-consent">' . goso_get_setting( 'goso_trans_save_fields' ) . '</span></p>';
	} else {
		$fields['cookies'] = '';
	}
	
	$custom_comment_field = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="' . goso_get_setting( 'goso_trans_your_comment' ) . '" aria-required="true"></textarea></p>';  //label removed for cleaner layout

	$gdrp_mess = '';
	if( get_theme_mod( 'goso_single_gdpr' ) ){
		$mess_default = get_theme_mod( 'goso_single_gdpr_text' ) ? do_shortcode( get_theme_mod( 'goso_single_gdpr_text' ) ) : esc_html__( '* By using this form you agree with the storage and handling of your data by this website.','authow' );

		if( $mess_default ) {
			$gdrp_mess .= '<div class="goso-gdpr-message">';
			$gdrp_mess .= do_shortcode( $mess_default );
			$gdrp_mess .= '</div>';
		}
	}
	
	if( get_theme_mod('goso_post_move_comment_box') ):
		comment_form( array(
			'comment_field'        => $custom_comment_field,
			'comment_notes_after'  => '',
			'logged_in_as'         => '',
			'comment_notes_before' => '',
			'title_reply'          => '<span>' . goso_get_setting( 'goso_trans_leave_a_comment' ) . '</span>',
			'cancel_reply_link'    => goso_get_setting( 'goso_trans_cancel_reply' ),
			'label_submit'         => goso_get_setting( 'goso_trans_submit' ),
			'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
			'submit_field'         => $gdrp_mess . '<p class="form-submit">%1$s %2$s</p>',
		) );
	endif; /* End check if move comment box to above */
	
	if ( have_comments() ) :
		echo '<div class="post-title-box"><h4 class="post-box-title">';
		comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 '. goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) );
		echo '</h4></div>';

		echo "<div class='comments'>";
		wp_list_comments( array(
			'avatar_size' => 100,
			'max_depth'   => 5,
			'style'       => 'div',
			'callback'    => 'goso_comments_template',
			'type'        => 'all'
		) );
		echo "</div>";

	echo "<div id='comments_pagination'>";
	paginate_comments_links( array( 'prev_text' => '&laquo;', 'next_text' => '&raquo;' ) );
	echo "</div>";

	endif;

	// If comments are closed and there are comments, let's leave a little note.
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php echo goso_get_setting( 'goso_trans_comments_closed' ); ?></p>
	<?php endif;
	if( ! get_theme_mod('goso_post_move_comment_box') ):
		comment_form( array(
			'comment_field'        => $custom_comment_field,
			'comment_notes_after'  => '',
			'logged_in_as'         => '',
			'comment_notes_before' => '',
			'title_reply'          => '<span>' . goso_get_setting( 'goso_trans_leave_a_comment' ) . '</span>',
			'cancel_reply_link'    => goso_get_setting( 'goso_trans_cancel_reply' ),
			'label_submit'         => goso_get_setting( 'goso_trans_submit' ),
			'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
			'submit_field'         => $gdrp_mess . '<p class="form-submit">%1$s %2$s</p>',
		) );
	endif;
	?>
</div> <!-- end comments div -->
