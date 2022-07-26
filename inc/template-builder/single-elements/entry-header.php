<?php
$avatar               = $args['goso_single_author_avatar'];
$avatarw              = isset( $args['goso_avatar_w'] ) && $args['goso_avatar_w'] ? $args['goso_avatar_w'] : 32;
$ava_icon_enable      = $args['goso_single_meta_ava_icon_check'];
$ava_icon             = $args['goso_single_meta_ava_icon'];
$date_icon_enable     = $args['goso_single_meta_date_icon_check'];
$date_icon            = $args['goso_single_meta_date_icon'];
$commment_icon_enable = $args['goso_single_meta_comment_icon_check'];
$commment_icon        = $args['goso_single_meta_comment_icon'];
$view_icon_enable     = $args['goso_single_meta_view_icon_check'];
$view_icon            = $args['goso_single_meta_view_icon'];
$reading_icon_enable  = $args['goso_single_meta_reading_icon_check'];
$reading_icon         = $args['goso_single_meta_reading_icon'];
$icon_style           = $args['meta_icon_style'];
$label_text           = $args['hide_meta_label'];
$thumb_alt            = $thumb_title_html = '';
global $post;
?>
<div class="header-standard header-classic single-header">
	<?php if ( ! $args['goso_post_cat'] ) : ?>
        <div class="goso-standard-cat goso-single-cat <?php echo $args['cat_pre_style']; ?>"><span class="cat"><?php goso_category( '' ); ?></span></div>
	<?php endif; ?>

	<?php if ( ! $args['hide_title'] ): ?>
        <h1 class="post-title single-post-title entry-title"><span><?php the_title(); ?></span></h1>
	<?php endif; ?>
	<?php
	if ( ! $args['hide_subtitle'] ) {
		goso_display_post_subtitle();
	}
	?>
	<?php goso_authow_meta_schema(); ?>
	<?php $hide_readtime = $args['goso_single_hreadtime']; ?>
	<?php if ( ! $args['goso_single_meta_author'] || ! $args['goso_single_meta_date'] || ! $args['goso_single_meta_comment'] || $args['goso_single_show_cview'] || goso_isshow_reading_time( $hide_readtime ) ) : ?>
        <div class="post-box-meta-single style-<?php echo esc_attr( $icon_style ); ?>">
			<?php if ( ! $args['goso_single_meta_author'] ) :
				?>
                <span class="author-post byline">
                                        <span class="author vcard">
                                            <?php
                                            if ( ! $ava_icon_enable && $ava_icon ) {
	                                            echo '<span class="pcmt-icon ava-icon">';
	                                            \Elementor\Icons_Manager::render_icon( $ava_icon );
	                                            echo '</span>';
                                            }
                                            ?>
	                                        <?php if ( ! $label_text ) {
		                                        echo goso_get_setting( 'goso_trans_written_by' );
	                                        } ?>
                                            <a class="author-url url fn n"
                                               href="<?php echo get_author_posts_url( $post->post_author ); ?>">
                                                <?php
                                                if ( ! $avatar ) {
	                                                echo get_avatar( $post->post_author, $avatarw );
                                                }
                                                echo get_the_author_meta('display_name',$post->post_author); ?>
                                            </a>
                                        </span>
                                    </span>
			<?php endif; ?>
			<?php if ( ! $args['goso_single_meta_date'] ) : ?>
                <span class="pctmp-date-post">
                                <?php
                                if ( ! $date_icon_enable && $date_icon ) {
	                                echo '<span class="pcmt-icon date-icon">';
	                                \Elementor\Icons_Manager::render_icon( $date_icon );
	                                echo '</span>';
                                }
                                ?>
                                <?php goso_authow_time_link( 'single' ); ?></span>
			<?php endif; ?>
			<?php if ( ! $args['goso_single_meta_comment'] ) :
				?>
                <span class="pctmp-comment-post">
                                    <?php
                                    if ( ! $commment_icon_enable && $commment_icon ) {
	                                    echo '<span class="pcmt-icon comment-icon">';
	                                    \Elementor\Icons_Manager::render_icon( $commment_icon );
	                                    echo '</span>';
                                    }
                                    $comment_text  = ! $label_text ? ' ' . goso_get_setting( 'goso_trans_comment' ) : '';
                                    $comments_text = ! $label_text ? ' ' . goso_get_setting( 'goso_trans_comments' ) : '';
                                    ?>
                                    <?php comments_number( '0' . $comment_text, '1' . $comment_text, '%' . $comments_text ); ?></span>
			<?php endif; ?>
			<?php if ( ! $args['goso_single_show_cview'] ) : ?>
                <span class="pctmp-view-post">
                                    <?php
                                    if ( ! $view_icon_enable && $view_icon ) {
	                                    echo '<span class="pcmt-icon view-icon">';
	                                    \Elementor\Icons_Manager::render_icon( $view_icon );
	                                    echo '</span>';
                                    }
                                    ?>
                                        <i class="goso-post-countview-number"><?php echo goso_get_post_views( get_the_ID() ); ?></i><?php if ( ! $label_text ) {
						echo ' ' . goso_get_setting( 'goso_trans_countviews' );
					} ?></span>
			<?php endif; ?>
			<?php if ( goso_isshow_reading_time( $hide_readtime ) ):
				?>
                <span class="single-readtime">
                                    <?php
                                    if ( ! $reading_icon_enable && $reading_icon ) {
	                                    echo '<span class="pcmt-icon reading-icon">';
	                                    \Elementor\Icons_Manager::render_icon( $reading_icon );
	                                    echo '</span>';
                                    }
                                    ?>
                                    <?php goso_reading_time(); ?></span>
			<?php endif; ?>
        </div>
	<?php endif; ?>
	<?php
	$recipe_title = get_post_meta( get_the_ID(), 'goso_recipe_title', true );
	if ( has_shortcode( get_the_content(), 'goso_recipe' ) || $recipe_title ) {
		do_action( 'goso_recipes_action_hook' );
	} ?>
</div>
