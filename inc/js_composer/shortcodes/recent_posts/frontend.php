<?php
$output = $goso_block_width = $el_class = $css_animation = $css = '';

$title_page          = $page_url = $page_height = $hide_faces = $hide_stream = '';
$heading_title_style = $heading = $heading_title_link = $heading_title_align = '';

$build_query  = $goso_img_ratio = $post_border_color = '';
$ptitle_color = $ptitle_hcolor = $ptitle_fsize = $use_ptitle_typo = $ptitle_typo = '';
$pmeta_color  = $pmeta_hcolor = $pmeta_fsize = $use_pmeta_typo = $pmeta_typo = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$query_args = goso_build_args_query( $build_query );
$loop       = new WP_Query( $query_args );

if ( ! $loop->have_posts() ) {
	return;
}

$goso_size    = isset( $atts['goso_size'] ) ? $atts['goso_size'] : '';
$thumb_size    = isset( $atts['thumb_size'] ) ? $atts['thumb_size'] : '';
$thumb_bigsize = isset( $atts['thumb_bigsize'] ) ? $atts['thumb_bigsize'] : '';

$rand = rand( 100, 10000 );

$class_to_filter = vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_class = 'goso-block-vc goso_recent-posts-sc';
$css_class .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$block_id  = Goso_Vc_Helper::get_unique_id_block( 'recent_posts' );

$title_length = intval( $atts['title_length'] );
$featured     = 'yes' == $atts['featured'] ? true : false;
$twocolumn    = 'yes' == $atts['twocolumn'] ? true : false;
$featured2    = 'yes' == $atts['featured2'] ? true : false;
$allfeatured  = 'yes' == $atts['allfeatured'] ? true : false;
$thumbright   = 'yes' == $atts['thumbright'] ? true : false;
$postdate     = 'yes' == $atts['hide_postdate'] ? true : false;
$icon         = 'yes' == $atts['icon_format'] ? true : false;
$hide_thumb   = 'yes' == $atts['hide_thumb'] ? true : false;
$showauthor   = 'yes' == $atts['show_author'] ? true : false;
$showcomment  = 'yes' == $atts['show_comment'] ? true : false;
$showviews    = 'yes' == $atts['show_postviews'] ? true : false;
$ordernum     = 'yes' == $atts['ordernum'] ? true : false;
$showborder   = 'yes' == $atts['showborder'] ? true : false;
$row_gap      = isset( $atts['row_gap'] ) ? $atts['row_gap'] : '';
?>
    <div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>">
		<?php Goso_Vc_Helper::markup_block_title( $atts ); ?>
        <div class="goso-block_content">
            <ul id="goso-latestwg-<?php echo sanitize_text_field( $rand ); ?>"
                class="side-newsfeed<?php if ( $twocolumn && ! $allfeatured ): echo ' goso-feed-2columns';
				    if ( $featured ) {
					    echo ' goso-2columns-featured';
				    } else {
					    echo ' goso-2columns-feed';
				    } endif; ?>">
				<?php $num = 1;
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <li class="goso-feed<?php if ( ( ( $num == 1 ) && $featured ) || $allfeatured ): echo ' featured-news';
						if ( $featured2 ): echo ' featured-news2'; endif; endif; ?><?php if ( $allfeatured ): echo ' all-featured-news'; endif; ?>">
						<?php if ( $ordernum && has_post_thumbnail() && ! $hide_thumb ): ?>
                            <span class="order-border-number<?php if ( $thumbright && ! $twocolumn ): echo ' right-side'; endif; ?>">
							<span class="number-post"><?php echo sanitize_text_field( $num ); ?></span>
						</span>
						<?php endif; ?>
                        <div class="side-item">
							<?php if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) && ! $hide_thumb ) : ?>
                                <div class="side-image<?php if ( $thumbright ): echo ' thumbnail-right'; endif; ?>">
									<?php
									/* Display Review Piechart  */
									if ( function_exists( 'goso_display_piechart_review_html' ) ) {
										$size_pie = 'small';
										if ( ( ( $num == 1 ) && $featured ) || $allfeatured ): $size_pie = 'normal'; endif;
										goso_display_piechart_review_html( get_the_ID(), $size_pie );
									}

									$thumb = goso_featured_images_size( 'small' );
									if ( 'horizontal' == $goso_size ) {
										$thumb = 'goso-thumb-small';
									} else if ( 'square' == $goso_size ) {
										$thumb = 'goso-thumb-square';
									} else if ( 'vertical' == $goso_size ) {
										$thumb = 'goso-thumb-vertical';
									} else if ( 'custom' == $goso_size ) {
										if ( $thumb_size ) {
											$thumb = $thumb_size;
										}
									}
									if ( ( ( $num == 1 ) && $featured ) || $allfeatured ) {
										$thumb = goso_featured_images_size();
										if ( 'horizontal' == $goso_size ) {
											$thumb = 'goso-thumb';
										} else if ( 'square' == $goso_size ) {
											$thumb = 'goso-thumb-square';
										} else if ( 'vertical' == $goso_size ) {
											$thumb = 'goso-thumb-vertical';
										} else if ( 'custom' == $goso_size ) {
											if ( $thumb_bigsize ) {
												$thumb = $thumb_bigsize;
											}
										}
									}
									?>
									<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                                        <a class="goso-image-holder goso-lazy<?php if ( ( ( $num == 1 ) && $featured ) || $allfeatured ) {
											echo '';
										} else {
											echo ' small-fix-size';
										} ?>" rel="bookmark"
                                           data-bgset="<?php echo goso_image_srcset( get_the_ID(),$thumb ); ?>"
                                           href="<?php the_permalink(); ?>"
                                           title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
									<?php } else { ?>
                                        <a class="goso-image-holder<?php if ( ( ( $num == 1 ) && $featured ) || $allfeatured ) {
											echo '';
										} else {
											echo ' small-fix-size';
										} ?>" rel="bookmark"
                                           style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $thumb ); ?>');"
                                           href="<?php the_permalink(); ?>"
                                           title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
									<?php } ?>

									<?php if ( $icon ): ?>
										<?php if ( has_post_format( 'video' ) ) : ?>
                                            <a href="<?php the_permalink() ?>" class="icon-post-format"
                                               aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-play' ); ?></a>
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
										<?php if ( has_post_format( 'gallery' ) ) : ?>
                                            <a href="<?php the_permalink() ?>" class="icon-post-format"
                                               aria-label="Icon"><?php goso_fawesome_icon( 'far fa-image' ); ?></a>
										<?php endif; ?>
									<?php endif; ?>
                                </div>
							<?php endif; ?>
                            <div class="side-item-text">
                                <h4 class="side-title-post">
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
										<?php
										if ( ! $title_length || ! is_numeric( $title_length ) ) {
											if ( $featured2 && ( ( ( $num == 1 ) && $featured ) || $allfeatured ) ) {
												echo wp_trim_words( wp_strip_all_tags( get_the_title() ), 12, '...' );
											} else {
												the_title();
											}
										} else {
											echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $title_length, '...' );
										}
										?>
                                    </a>
                                </h4>
								<?php if ( ! $postdate || $showauthor || $showcomment || $showviews ): ?>
                                    <div class="grid-post-box-meta goso-side-item-meta">
										<?php if ( $showauthor ): ?>
                                            <span class="side-item-meta side-wauthor"><?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                                        class="url fn n"
                                                        href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
										<?php endif; ?>
										<?php if ( ! $postdate ): ?>
                                            <span class="side-item-meta side-wdate"><?php goso_authow_time_link(); ?></span>
										<?php endif; ?>
										<?php if ( $showcomment ): ?>
                                            <span class="side-item-meta side-wcomments"><a
                                                        href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a></span>
										<?php endif; ?>
										<?php if ( $showviews ): ?>
                                            <span class="side-item-meta side-wviews"><?php echo goso_get_post_views( get_the_ID() ) . ' ' . goso_get_setting( 'goso_trans_countviews' ); ?></span>
										<?php endif; ?>
                                    </div>
								<?php endif; ?>
                            </div>
                        </div>
                    </li>
					<?php $num ++; endwhile; ?>
            </ul>
			<?php
			wp_reset_postdata();
			?>
        </div>
    </div>
<?php

$id_recent_posts = '#' . $block_id;
$css_custom      = Goso_Vc_Helper::get_heading_block_css( $id_recent_posts, $atts );

if ( 'horizontal' == $goso_size ) {
	$css_custom .= $id_recent_posts . ' ul.side-newsfeed .goso-image-holder:before{ padding-top: 66.6667%; }';
}
if ( 'square' == $goso_size ) {
	$css_custom .= $id_recent_posts . ' ul.side-newsfeed .goso-image-holder:before{ padding-top: 100%; }';
}
if ( 'vertical' == $goso_size ) {
	$css_custom .= $id_recent_posts . ' ul.side-newsfeed .goso-image-holder:before{ padding-top: 135.4%; }';
}
if ( 'custom' == $goso_size && $goso_img_ratio ) {
	$css_custom .= $id_recent_posts . ' ul.side-newsfeed .goso-image-holder:before{ padding-top: ' . esc_attr( $goso_img_ratio ) . '%; }';
}
if ( $post_border_color ) {
	$css_custom .= $id_recent_posts . ' ul.side-newsfeed li{ border-color: ' . esc_attr( $post_border_color ) . ' !important;}';
}
if ( $ptitle_color ) {
	$css_custom .= $id_recent_posts . ' ul.side-newsfeed li .side-item .side-item-text h4 a,';
	$css_custom .= $id_recent_posts . ' ul.side-newsfeed li .side-item .side-item-text h4{ color: ' . esc_attr( $ptitle_color ) . ' !important;}';
}
if ( $ptitle_hcolor ) {
	$css_custom .= $id_recent_posts . ' ul.side-newsfeed li .side-item .side-item-text h4 a:hover{ color: ' . esc_attr( $ptitle_hcolor ) . ' !important;}';
}
if ( $showborder ) {
	$css_custom .= $id_recent_posts . ' ul.side-newsfeed:not(.goso-feed-2columns) li{ border-bottom: none; padding-bottom: 0 !important; }';
}
if ( $imgwidth ) {
	$css_custom .= $id_recent_posts . ' ul.side-newsfeed li .goso-image-holder.small-fix-size{ width: ' . $imgwidth . '; }';
}
if ( $row_gap ) {
	$css_custom .= $id_recent_posts . ' ul.side-newsfeed:not(.goso-feed-2columns) li{ margin-bottom: ' . $row_gap . '; padding-bottom: ' . $row_gap . '; }';
	$css_custom .= $id_recent_posts . ' ul.goso-feed-2columns li{ margin-bottom: ' . $row_gap . ';}';
}

$css_custom .= Goso_Vc_Helper::vc_google_fonts_parse_attributes( array(
	'font_size'  => $ptitle_fsize,
	'font_style' => $use_ptitle_typo ? $ptitle_typo : '',
	'template'   => "{$id_recent_posts} ul.side-newsfeed li .side-item .side-item-text h4 a,{$id_recent_posts} ul.side-newsfeed li .side-item .side-item-text h4" . '{ %s }',
) );

if ( $pmeta_color ) {
	$css_custom .= $id_recent_posts . ' ul.side-newsfeed li .side-item .side-item-text .side-item-meta { color: ' . esc_attr( $pmeta_color ) . ' !important;}';
}
$css_custom .= Goso_Vc_Helper::vc_google_fonts_parse_attributes( array(
	'font_size'  => $pmeta_fsize,
	'font_style' => $use_pmeta_typo ? $pmeta_typo : '',
	'template'   => "{$id_recent_posts} ul.side-newsfeed li .side-item .side-item-text .side-item-meta" . '{ %s }',
) );

if ( $css_custom ) {
	echo '<style>';
	echo $css_custom;
	echo '</style>';
}
