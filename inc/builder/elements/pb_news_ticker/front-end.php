<?php
$headline_uppercase = goso_get_builder_mod( 'goso_header_pb_news_ticker_disable_uppercase' );
$title_uppercase = goso_get_builder_mod( 'goso_header_pb_news_ticker_post_titles_uppercase' );
$title_classes   = $headline_class = ' goso-enable-uppercase';
if ( 'enable' == $title_uppercase ) {
	$title_classes = ' goso-disable-uppercase';
}
if ( 'enable' == $headline_uppercase ) {
	$headline_class = ' goso-disable-uppercase';
}
?>
<div class="goso-builder-element pctopbar-item goso-topbar-trending <?php echo goso_get_builder_mod( 'goso_header_pb_news_ticker_class' ); ?>">
	<?php if ( goso_get_builder_mod( 'goso_header_pb_news_ticker_text', 'Top Posts' ) ) {
		$toptext_style = goso_get_builder_mod( 'goso_header_pb_news_ticker_style', 'nticker-style-1' );
		?>
        <span class="headline-title <?php echo $toptext_style.$headline_class; ?>"><?php echo goso_get_builder_mod( 'goso_header_pb_news_ticker_text','Top Posts' ); ?></span>
	<?php } ?>
	<?php
	/**
	 * Display headline slider
	 */
	$number_posts = goso_get_builder_mod( 'goso_header_pb_news_ticker_total_posts', 10 );
	$topbar_sort  = goso_get_builder_mod( 'goso_header_pb_news_ticker_by' );
	$title_length = goso_get_builder_mod( 'goso_header_pb_news_ticker_post_titles', 8 );

	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => $number_posts
	);

	if ( goso_get_builder_mod( 'goso_header_pb_news_ticker_cats' ) || goso_get_builder_mod( 'goso_header_pb_news_ticker_filter_by' ) == 'category' ) {
		$list_cat          = goso_get_builder_mod( 'goso_header_pb_news_ticker_cats' );
		$list_cat_trim     = str_replace( ' ', '', $list_cat );
		$list_cats         = explode( ',', $list_cat_trim );
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $list_cat
			),
		);
	} elseif ( goso_get_builder_mod( 'goso_header_pb_news_ticker_tags' ) && goso_get_builder_mod( 'goso_header_pb_news_ticker_filter_by' ) == 'tags' ) {
		$list_tag          = goso_get_builder_mod( 'goso_header_pb_news_ticker_tags' );
		$list_tag_trim     = str_replace( ' ', '', $list_tag );
		$list_tags         = explode( ',', $list_tag_trim );
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'post_tag',
				'field'    => 'slug',
				'terms'    => $list_tags
			),
		);
	}

	if ( $topbar_sort == 'all' ) {
		$args['meta_key'] = goso_get_postviews_key();
		$args['orderby']  = 'meta_value_num';
		$args['order']    = 'DESC';
	} elseif ( $topbar_sort == 'week' ) {
		$args['meta_key'] = 'goso_post_week_views_count';
		$args['orderby']  = 'meta_value_num';
		$args['order']    = 'DESC';
	} elseif ( $topbar_sort == 'month' ) {
		$args['meta_key'] = 'goso_post_month_views_count';
		$args['orderby']  = 'meta_value_num';
		$args['order']    = 'DESC';
	}

	$news = new WP_Query( $args );
	if ( $news->have_posts() ):
		$auto_play = 'true';
		if ( 'enable' == goso_get_builder_mod( 'goso_header_pb_news_ticker_disable_autoplay' ) ): $auto_play = 'false'; endif;
		$auto_time  = goso_get_builder_mod( 'goso_header_pb_news_ticker_autoplay_timeout' );
		$auto_speed = goso_get_builder_mod( 'goso_header_pb_news_ticker_autoplay_speed' );
		$auto_time  = ( is_numeric( $auto_time ) && $auto_time > 0 ) ? $auto_time : '3000';
		$auto_speed = ( is_numeric( $auto_speed ) && $auto_speed > 0 ) ? $auto_speed : '200';
		$animation  = goso_get_builder_mod( 'goso_header_pb_news_ticker_animation', 'slideInUp' );
		?>
        <span class="goso-trending-nav">
			<a class="goso-slider-prev" href="#"><?php goso_fawesome_icon( 'fas fa-angle-left' ); ?></a>
			<a class="goso-slider-next" href="#"><?php goso_fawesome_icon( 'fas fa-angle-right' ); ?></a>
		</span>
        <div class="goso-owl-carousel goso-owl-carousel-slider goso-headline-posts"
             data-auto="<?php echo $auto_play; ?>" data-nav="false" data-autotime="<?php echo $auto_time; ?>"
             data-speed="<?php echo $auto_speed; ?>" data-anim="<?php echo $animation; ?>">
			<?php while ( $news->have_posts() ): $news->the_post();
				$title_full = get_the_title();
				?>
                <div>
                    <a class="goso-topbar-post-title <?php echo esc_attr($title_classes);?>"
                       href="<?php the_permalink(); ?>"><?php echo sanitize_text_field( wp_trim_words( get_the_title(), $title_length, '...' ) ); ?></a>
                </div>
			<?php endwhile;
			wp_reset_postdata(); ?>
        </div>
	<?php endif; /* End check if no posts */ ?>
</div>
