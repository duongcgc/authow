<div class="goso-bgitem<?php if ( 'style-2' == $biggid_style ) {
	echo ' item-masonry';
}
echo $is_big_item . goso_big_grid_count_classes( $bg, $biggid_style ); ?>">
    <div class="goso-bgitin">
        <div class="goso-bgmain">
            <div class="pcbg-thumb">
				<?php
				/* Display Review Piechart  */
				if ( 'yes' == $show_reviewpie && function_exists( 'goso_display_piechart_review_html' ) ) {
					goso_display_piechart_review_html( get_the_ID() );
				}
				?>
				<?php if ( 'yes' == $show_formaticon ): ?>
					<?php if ( has_post_format( 'video' ) ) : ?>
                        <a href="<?php the_permalink() ?>" class="icon-post-format"
                           aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-play' ); ?></a>
					<?php endif; ?>
					<?php if ( has_post_format( 'gallery' ) ) : ?>
                        <a href="<?php the_permalink() ?>" class="icon-post-format"
                           aria-label="Icon"><?php goso_fawesome_icon( 'far fa-image' ); ?></a>
					<?php endif; ?>
					<?php if ( has_post_format( 'audio' ) ) : ?>
                        <a href="<?php the_permalink() ?>" class="icon-post-format"
                           aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-music' ); ?></a>
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
                <div class="pcbg-thumbin">
                    <a class="pcbg-bgoverlay<?php if ( 'whole' == $overlay_type && 'on' != $bgcontent_pos ): echo ' active-overlay'; endif; ?>"
                       href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
					<?php if ( ! $disable_lazy ) { ?>
                        <div class="goso-image-holder goso-lazy"<?php if ( 'style-2' == $biggid_style ) {
							echo ' style="padding-bottom: ' . goso_get_featured_image_padding_markup( get_the_ID(), $thumbnail, true ) . '%"';
						} ?>
                             data-bgset="<?php echo goso_image_srcset( get_the_ID(),$thumbnail,$mthumb_size ); ?>"
                             data-sizes="<?php echo goso_image_datasize( $thumbnail,$mthumb_size ); ?>">
                        </div>
					<?php } else { ?>
                        <div class="goso-image-holder"
                             style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $thumbnail ); ?>');<?php if ( 'style-2' == $biggid_style ) {
							     echo 'padding-bottom: ' . goso_get_featured_image_padding_markup( get_the_ID(), $thumbnail, true ) . '%';
						     } ?>">
                        </div>
					<?php } ?>
                </div>
            </div>
            <div class="pcbg-content">
                <div class="pcbg-content-flex">
                    <a class="pcbg-bgoverlay<?php if ( 'whole' == $overlay_type && 'on' == $bgcontent_pos ): echo ' active-overlay'; endif; ?>"
                       href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
                    <div class="pcbg-content-inner<?php if ( 'inline-block' == $content_display ) {
						echo ' bgcontent-inline-block';
					} else {
						echo ' bgcontent-block';
					} ?>">
                        <a href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"
                           class="pcbg-bgoverlaytext<?php if ( 'text' == $overlay_type ): echo ' active-overlay'; endif; ?> item-hover"></a>

						<?php if ( in_array( 'cat', $post_meta ) && ! $hide_cat_small_flag ) : ?>
                            <div class="pcbg-above item-hover">
							<span class="cat pcbg-sub-title">
								<?php goso_category( '', $primary_cat ); ?>
							</span>
                            </div>
						<?php endif; ?>

						<?php if ( in_array( 'title', $post_meta ) ) : ?>
                            <div class="pcbg-heading item-hover">
                                <h3 class="pcbg-title"<?php if( $title_length ): echo ' title="'. wp_strip_all_tags( get_the_title() ) .'"'; endif; ?>>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ( ! $title_length ) { the_title(); } else { echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $title_length, '...' ); } ?>
                                    </a>
                                </h3>
                            </div>
						<?php endif; ?>

						<?php if ( ! $hide_meta_small_flag && count( array_intersect( array(
								'author',
								'date',
								'comment',
								'views',
								'reading',
								'excerpt'
							), $post_meta ) ) > 0 ) { ?>
                            <div class="grid-post-box-meta pcbg-meta item-hover">
                                <div class="pcbg-meta-desc">
									<?php if ( in_array( 'author', $post_meta ) ) : ?>
                                        <span class="bg-date-author author-italic author vcard">
										<?php echo goso_get_setting( 'goso_trans_by' ); ?> <a class="url fn n"
                                                                                                href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
									</span>
									<?php endif; ?>
									<?php if ( in_array( 'date', $post_meta ) ) : ?>
                                        <span class="bg-date"><?php goso_authow_time_link(); ?></span>
									<?php endif; ?>
									<?php if ( in_array( 'comment', $post_meta ) ) : ?>
                                        <span class="bg-comment">
										<a href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a>
									</span>
									<?php endif; ?>
									<?php
									if ( in_array( 'views', $post_meta ) ) {
										echo '<span>';
										echo goso_get_post_views( get_the_ID() );
										echo ' ' . goso_get_setting( 'goso_trans_countviews' );
										echo '</span>';
									}
									?>
									<?php
									$hide_readtime = in_array( 'reading', $post_meta ) ? false : true;
									if ( goso_isshow_reading_time( $hide_readtime ) ): ?>
                                        <span class="bg-readtime"><?php goso_reading_time(); ?></span>
									<?php endif; ?>
                                </div>
								<?php if ( in_array( 'excerpt', $post_meta ) && ! $hide_excerpt_small_flag ) : ?>
                                    <div class="pcbg-pexcerpt">
										<?php goso_the_excerpt( $excerpt_length ); ?>
                                    </div>
								<?php endif; ?>
                            </div>
						<?php } ?>

						<?php if ( $show_readmore && ! $hide_rm_small_flag ) { ?>
                            <div class="pcbg-readmore-sec item-hover">
                                <a href="<?php the_permalink(); ?>"
                                   class="pcbg-readmorebtn <?php echo 'pcreadmore-icon-' . $readmore_icon_pos; ?>">
                                    <span class="pcrm-text"><?php echo goso_get_setting( 'goso_trans_read_more' ); ?></span>
									<?php if ( $readmore_icon ): ?>
										<?php \Elementor\Icons_Manager::render_icon( $readmore_icon ); ?>
									<?php endif; ?>
                                </a>
                            </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
