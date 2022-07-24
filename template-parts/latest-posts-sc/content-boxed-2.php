<?php
/**
 * Template loop for list boxed style 2
 */
if ( ! isset ( $n ) ) {
	$n = 1;
} else {
	$n = $n;
}
?>
<?php
$goso_featimg_size = isset( $goso_featimg_size ) ? $goso_featimg_size : '';
$thumb_size         = isset( $thumb_size ) ? $thumb_size : '';

if ( ! isset ( $x ) ) {
	$x = 1;
} else {
	$x = $x;
}

$category_oj  = get_queried_object();
$fea_cat_id   = isset( $category_oj->term_id ) ? $category_oj->term_id : '';
$cat_meta     = get_option( "category_$fea_cat_id" );
$sidebar_opts = isset( $cat_meta['cat_sidebar_display'] ) ? $cat_meta['cat_sidebar_display'] : '';
$show_sidebar = false;

if ( ( goso_get_setting( 'goso_sidebar_archive' ) && $sidebar_opts != 'no' ) || $sidebar_opts == 'left' || $sidebar_opts == 'right' ) {
	$show_sidebar = true;
}

if ( is_home() ) {
	$show_sidebar = goso_get_setting( 'goso_sidebar_home' );
}
$display_val = true;
if ( ( $show_sidebar && ( $x % 2 == 0 ) ) || ( ! $show_sidebar && ( $x % 3 == 2 ) ) ) {
	$display_val = false;
}

?>
    <li class="list-boxed-post-2">
        <article id="post-<?php the_ID(); ?>" class="item hentry">
            <div class="content-boxed-2 show-top<?php if ( ! has_post_thumbnail() ) : echo ' boxed-fullwidth-2'; endif; ?><?php if ( $display_val ): echo ' boxed-none'; endif; ?>">
                <div class="inner-parent-boxed-2">
                    <div class="inner-boxed-2">
						<?php if ( 'yes' != $grid_cat ) : ?>
                            <span class="cat"><?php goso_category( '' ); ?></span>
						<?php endif; ?>

                        <h2 class="goso-entry-title entry-title grid-title"><a
                                    href="<?php the_permalink(); ?>"><?php goso_trim_post_title( get_the_ID(), $grid_title_length ); ?></a>
                        </h2>

						<?php if ( 'yes' != $grid_date || 'yes' != $grid_author || 'yes' == $grid_viewscount || 'yes' == $grid_comment_other || goso_isshow_reading_time( $grid_readtime ) ) : ?>
                            <div class="grid-post-box-meta">
								<?php if ( 'yes' != $grid_author ) : ?>
                                    <span class="otherl-date-author author-italic author vcard"><?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                                class="url fn n"
                                                href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
								<?php endif; ?>
								<?php if ( 'yes' != $grid_date ) : ?>
                                    <span class="otherl-date"><?php goso_authow_time_link(); ?></span>
								<?php endif; ?>
								<?php if ( 'yes' == $grid_comment_other ) : ?>
                                    <span class="otherl-comment"><a
                                                href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a></span>
								<?php endif; ?>
								<?php
								if ( 'yes' == $grid_viewscount ) {
									echo '<span>';
									echo goso_get_post_views( get_the_ID() );
									echo ' ' . goso_get_setting( 'goso_trans_countviews' );
									echo '</span>';
								}
								?>
								<?php if ( goso_isshow_reading_time( $grid_readtime ) ): ?>
                                    <span class="otherl-readtime"><?php goso_reading_time(); ?></span>
								<?php endif; ?>
                            </div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
			<?php if ( has_post_thumbnail() ) : ?>
                <div class="thumbnail<?php if ( $display_val ) {
					echo ' arrow-bottom';
				} else {
					echo ' arrow-top';
				} ?>">
					<?php
					/* Display Review Piechart  */
					if ( function_exists( 'goso_display_piechart_review_html' ) ) {
						goso_display_piechart_review_html( get_the_ID() );
					}
					?>
					<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                        <a class="goso-image-holder goso-lazy<?php echo goso_class_lightbox_enable(); ?>"
                           data-bgset="<?php echo goso_image_srcset( get_the_ID(), goso_featured_images_size_vcel( 'normal', $goso_featimg_size, $thumb_size ) ); ?>"
                           href="<?php goso_permalink_fix(); ?>" title="<?php echo
						wp_strip_all_tags( get_the_title() ); ?>"></a>
					<?php } else { ?>
                        <a class="goso-image-holder<?php echo goso_class_lightbox_enable(); ?>"
                           style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), goso_featured_images_size_vcel( 'normal', $goso_featimg_size, $thumb_size ) ); ?>');"
                           href="<?php goso_permalink_fix(); ?>"
                           title="<?php echo wp_strip_all_tags(
							   get_the_title() ); ?>"></a>
					<?php } ?>

					<?php if ( 'yes' != $grid_icon_format ): ?>
						<?php if ( has_post_format( 'video' ) ) : ?>
                            <a href="<?php the_permalink() ?>" class="icon-post-format"
                               aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-play' ); ?></a>
						<?php endif; ?>
						<?php if ( has_post_format( 'audio' ) ) : ?>
                            <a href="<?php the_permalink() ?>" class="icon-post-format"
                               aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-music' ); ?></a>
						<?php endif; ?>
						<?php if ( has_post_format( 'gallery' ) ) : ?>
                            <a href="<?php the_permalink() ?>" class="icon-post-format"
                               aria-label="Icon"><?php goso_fawesome_icon( 'far fa-image' ); ?></a>
						<?php endif; ?>
						<?php if ( has_post_format( 'link' ) ) : ?>
                            <a href="<?php the_permalink() ?>" class="icon-post-format"
                               aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-link' ); ?></a>
						<?php endif; ?>
						<?php if ( has_post_format( 'quote' ) ) : ?>
                            <a href="<?php the_permalink() ?>" class="icon-post-format"
                               aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-quote-left' ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
                </div>
			<?php endif; ?>

            <div class="content-boxed-2 show-bottom<?php if ( ! has_post_thumbnail() ) : echo ' boxed-fullwidth-2'; endif; ?><?php if ( ! $display_val ) : echo ' boxed-none'; endif; ?>">
                <div class="inner-parent-boxed-2">
                    <div class="inner-boxed-2">
						<?php if ( 'yes' != $grid_share_box ) : ?>
                            <span class="cat"><?php goso_category( '' ); ?></span>
						<?php endif; ?>

                        <h2 class="goso-entry-title entry-title grid-title"><a
                                    href="<?php the_permalink(); ?>"><?php goso_trim_post_title( get_the_ID(), $grid_title_length ); ?></a>
                        </h2>
						<?php goso_authow_meta_schema(); ?>
						<?php if ( 'yes' != $grid_date || 'yes' != $grid_author || 'yes' == $grid_viewscount || 'yes' == $grid_comment_other || goso_isshow_reading_time( $grid_readtime ) ) : ?>
                            <div class="grid-post-box-meta">
								<?php if ( 'yes' != $grid_author ) : ?>
                                    <span class="otherl-date-author author-italic author vcard"><?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                                class="url fn n"
                                                href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
								<?php endif; ?>
								<?php if ( 'yes' != $grid_date ) : ?>
                                    <span class="otherl-date"><?php goso_authow_time_link(); ?></span>
								<?php endif; ?>
								<?php if ( 'yes' == $grid_comment_other ) : ?>
                                    <span class="otherl-comment"><a
                                                href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a></span>
								<?php endif; ?>
								<?php
								if ( 'yes' == $grid_viewscount ) {
									echo '<span>';
									echo goso_get_post_views( get_the_ID() );
									echo ' ' . goso_get_setting( 'goso_trans_countviews' );
									echo '</span>';
								}
								?>
								<?php if ( goso_isshow_reading_time( $grid_readtime ) ): ?>
                                    <span class="otherl-readtime"><?php goso_reading_time(); ?></span>
								<?php endif; ?>
                            </div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </article>
    </li>

<?php
if ( isset( $infeed_ads ) && $infeed_ads ) {
	goso_get_markup_infeed_ad(
		array(
			'wrapper'    => 'li',
			'classes'    => 'list-boxed-post-2 goso-infeed-data goso-infeed-vcele',
			'fullwidth'  => $infeed_full,
			'order_ad'   => $infeed_num,
			'order_post' => $n,
			'code'       => $infeed_ads,
			'echo'       => true
		)
	);
}
?>
<?php $n ++; ?>

<?php $x ++; ?>
