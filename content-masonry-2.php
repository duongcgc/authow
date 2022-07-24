<?php
/**
 * Template loop for masonry 2 columns style
 */
if ( ! isset ( $j ) ) { $j = 1; } else { $j = $j; }
?>
<article id="post-<?php the_ID(); ?>" class="item item-masonry grid-masonry grid-masonry-2 hentry<?php if( get_theme_mod('goso_grid_meta_overlay') ): echo ' grid-overlay-meta'; endif; ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="thumbnail">
			<?php
			/* Display Review Piechart  */
			if( function_exists('goso_display_piechart_review_html') ) {
				goso_display_piechart_review_html( get_the_ID() );
			}
			?>
			<a href="<?php goso_permalink_fix() ?>" class="post-thumbnail<?php echo goso_class_lightbox_enable(); ?>">
				<?php
				$src_full = goso_get_featured_image_size( get_the_ID(), 'full' );
				$src_check = substr( $src_full, -4 );
				if( $src_check == '.gif' ) {
					echo goso_get_featured_image_padding_markup( get_the_ID(), 'full' );
					the_post_thumbnail( 'full' );
				} else {
					echo goso_get_featured_image_padding_markup( get_the_ID(), 'goso-masonry-thumb' );
					the_post_thumbnail( 'goso-masonry-thumb' );
				}
				?>
			</a>
			<?php if( ! get_theme_mod('goso_grid_icon_format') ): ?>
				<?php if ( has_post_format( 'video' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format" aria-label="Icon"><?php goso_fawesome_icon('fas fa-play'); ?></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'gallery' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format" aria-label="Icon"><?php goso_fawesome_icon('far fa-image'); ?></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'audio' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format" aria-label="Icon"><?php goso_fawesome_icon('fas fa-music'); ?></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'link' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format" aria-label="Icon"><?php goso_fawesome_icon('fas fa-link'); ?></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'quote' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format" aria-label="Icon"><?php goso_fawesome_icon('fas fa-quote-left'); ?></a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="grid-header-box">
		<?php if ( ! get_theme_mod( 'goso_grid_cat' ) ) : ?>
			<span class="cat"><?php goso_category( '' ); ?></span>
		<?php endif; ?>
		<h2 class="goso-entry-title entry-title grid-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php goso_authow_meta_schema(); ?>
		<?php $hide_readtime = get_theme_mod( 'goso_grid_readingtime' ); ?>
		<?php if ( ! get_theme_mod( 'goso_grid_date' ) || ! get_theme_mod( 'goso_grid_author' ) || get_theme_mod( 'goso_grid_countviews' ) || get_theme_mod( 'goso_grid_comment_other' ) || goso_isshow_reading_time( $hide_readtime ) ) : ?>
			<div class="grid-post-box-meta">
				<?php if ( ! get_theme_mod( 'goso_grid_author' ) ) : ?>
					<span class="otherl-date-author author-italic author vcard"><?php echo goso_get_setting('goso_trans_by'); ?> <a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
				<?php endif; ?>
				<?php if ( ! get_theme_mod( 'goso_grid_date' ) ) : ?>
					<span class="otherl-date"><?php goso_authow_time_link(); ?></span>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'goso_grid_comment_other' ) ) : ?>
					<span class="otherl-comment"><a href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 '. goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a></span>
				<?php endif; ?>
				<?php
				if ( get_theme_mod( 'goso_grid_countviews' ) ) {
					echo '<span>';
					echo goso_get_post_views( get_the_ID() );
					echo ' ' . goso_get_setting( 'goso_trans_countviews' );
					echo '</span>';
				}
				?>
				<?php if( goso_isshow_reading_time( $hide_readtime ) ): ?>
					<span class="otherl-readtime"><?php goso_reading_time(); ?></span>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>

	<?php if( get_the_excerpt() && ! get_theme_mod( 'goso_grid_remove_excerpt' ) ): ?>
		<div class="item-content entry-content">
			<?php 
			if( ! get_theme_mod( 'goso_excerptcharac' ) ){
				the_excerpt();
			} else {
				$excerpt_length = get_theme_mod( 'goso_post_excerpt_length', 30 );
				goso_the_excerpt( $excerpt_length );
			}
			?>
		</div>
	<?php endif; ?>

	<?php if( get_theme_mod( 'goso_grid_add_readmore' ) ): 
	$class_button = '';
	if( get_theme_mod( 'goso_grid_remove_arrow' ) ): $class_button .= ' goso-btn-remove-arrow'; endif;
	if( get_theme_mod( 'goso_grid_readmore_button' ) ): $class_button .= ' goso-btn-make-button'; endif;
	if( get_theme_mod( 'goso_grid_readmore_align' ) ): $class_button .= ' goso-btn-align-' . get_theme_mod( 'goso_grid_readmore_align' ); endif;
	?>
		<div class="goso-readmore-btn<?php echo $class_button; ?>">
			<a class="goso-btn-readmore" href="<?php the_permalink(); ?>"><?php echo goso_get_setting( 'goso_trans_read_more' ); ?><?php goso_fawesome_icon('fas fa-angle-double-right'); ?></a>
		</div>
	<?php endif; ?>

	<?php if ( ! get_theme_mod( 'goso_grid_share_box' ) ) : ?>
		<div class="goso-post-box-meta goso-post-box-grid">
			<div class="goso-post-share-box">
				<?php echo goso_getPostLikeLink( get_the_ID() ); ?>
				<?php goso_authow_social_share( );  ?>
			</div>
		</div>
	<?php endif; ?>
</article>
<?php 
if( isset( $infeed_ads ) && $infeed_ads ){
	goso_get_markup_infeed_ad(
		array(
			'wrapper' => 'article',
			'classes'      => 'item item-masonry grid-masonry grid-masonry-2 goso-infeed-data',
			'fullwidth'	 => $infeed_full,
			'order_ad'   => $infeed_num,
			'order_post' => $j,
			'code'       => $infeed_ads,
			'echo'       => true
		)
	); 
}
?>
<?php $j++; ?>