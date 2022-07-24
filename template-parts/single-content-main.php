<?php
/**
 * The template for displaying single pages.
 *
 * @since 1.0
 */
$block_style = get_theme_mod( 'goso_blockquote_style' ) ? get_theme_mod( 'goso_blockquote_style' ) : 'style-1';
$thumb_alt   = $thumb_title_html = '';

if ( has_post_thumbnail() ) {
	$thumb_id         = get_post_thumbnail_id( get_the_ID() );
	$thumb_alt        = goso_get_image_alt( $thumb_id, get_the_ID() );
	$thumb_title_html = goso_get_image_title( $thumb_id );
}

$single_style = goso_get_single_style();
?>
<article id="post-<?php the_ID(); ?>" class="post type-post status-publish<?php do_action( 'goso_post_class' ); ?>">
	<?php if ( 'style-8' == $single_style ): ?>
		<?php
		$single_magazine = 'container-single goso-single-style-8  goso-header-text-white';
		if ( get_theme_mod( 'goso_home_layout' ) == 'magazine-1' || get_theme_mod( 'goso_home_layout' ) == 'magazine-2' ) {
			$single_magazine .= ' container-single-magazine';
		}
		?>
        <div class="<?php echo( $single_magazine ); ?>">
			<?php
			$post_format = get_post_format();
			if ( ! get_theme_mod( 'goso_move_title_bellow' ) && get_theme_mod( 'goso_post_thumb' ) && ! in_array( $post_format, array(
					'link',
					'quote',
					'gallery',
					'video'
				) ) ) {
				get_template_part( 'template-parts/single', 'entry-header' );
			} else {
				get_template_part( 'template-parts/single', 'post-format2' );
			}
			?>
        </div>
		<?php if ( get_theme_mod( 'goso_post_adsense_one' ) ): ?>
            <div class="goso-google-adsense-1">
				<?php echo do_shortcode( get_theme_mod( 'goso_post_adsense_one' ) ); ?>
            </div>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ( get_theme_mod( 'goso_move_title_bellow' ) && 'style-10' != $single_style ): ?>
		<?php
		if ( 'style-8' != $single_style ) {
			get_template_part( 'template-parts/single', 'breadcrumb-inner' );
		}

		get_template_part( 'template-parts/single', 'entry-header' );
		?>

		<?php if ( get_theme_mod( 'goso_post_adsense_one' ) ): ?>
            <div class="goso-google-adsense-1">
				<?php echo do_shortcode( get_theme_mod( 'goso_post_adsense_one' ) ); ?>
            </div>
		<?php endif; ?>

	<?php endif; /* End check if not move title bellow featured image */ ?>

	<?php
	$share_show         = false;
	$single_style       = get_theme_mod( 'goso_single_style' );
	$single_poslcscount = goso_get_setting( 'goso_single_poslcscount' );
	if ( 'above-content' == $single_poslcscount || 'abovebelow-content' == $single_poslcscount ) {
		$share_show = true;
	}
	if ( $share_show ) {
		get_template_part( 'template-parts/single-meta-comment-top' );
	}
	?>

    <div class="post-entry <?php echo 'blockquote-' . $block_style; ?>">
        <div class="inner-post-entry entry-content" id="goso-post-entry-inner">

			<?php do_action( 'goso_action_before_the_content' ); ?>

			<?php the_content(); ?>

			<?php do_action( 'goso_action_after_the_content' ); ?>

            <div class="goso-single-link-pages">
				<?php wp_link_pages(); ?>
            </div>
			<?php if ( ! get_theme_mod( 'goso_post_tags' ) && has_tag() ) : ?>
				<?php if ( is_single() ) : ?>
                    <div class="post-tags">
						<?php the_tags( wp_kses( __( '', 'authow' ), goso_allow_html() ), "", "" ); ?>
                    </div>
				<?php endif; ?>
			<?php endif; ?>
        </div>
    </div>

	<?php if ( get_theme_mod( 'goso_post_adsense_two' ) ): ?>
        <div class="goso-google-adsense-2">
			<?php echo do_shortcode( get_theme_mod( 'goso_post_adsense_two' ) ); ?>
        </div>
	<?php endif; ?>

	<?php
	if ( 'below-content' == $single_poslcscount || 'abovebelow-content' == $single_poslcscount || 'btitle-bcontent' == $single_poslcscount ) {
		get_template_part( 'template-parts/single', 'meta-comment' );
	}
	?>

	<?php if ( get_theme_mod( 'goso_related_post_popup' ) ) : ?>
        <div class="goso-flag-rlt-popup"></div><?php endif; ?>

	<?php
	$reorder      = get_theme_mod( 'goso_single_ordersec' ) ? get_theme_mod( 'goso_single_ordersec' ) : 'author-postnav-related-comments';
	$reorderarray = explode( '-', $reorder );
	if ( ! empty( $reorderarray ) ) {
		foreach ( $reorderarray as $sec ) {
			?>

			<?php if ( $sec == 'author' && ! get_theme_mod( 'goso_post_author' ) ) : ?>
				<?php get_template_part( 'inc/templates/about_author' ); ?>
			<?php endif; ?>

			<?php if ( $sec == 'postnav' && ! get_theme_mod( 'goso_post_nav' ) ) : ?>
				<?php get_template_part( 'inc/templates/post_pagination' ); ?>
			<?php endif; ?>

			<?php if ( $sec == 'related' && ! get_theme_mod( 'goso_post_related' ) ) : ?>
				<?php get_template_part( 'inc/templates/related_posts' ); ?>
			<?php endif; ?>

			<?php if ( $sec == 'comments' && ! get_theme_mod( 'goso_post_hide_comments' ) ) : ?>
				<?php comments_template( '', true ); ?>
			<?php endif; ?>

		<?php }
	} ?>

	<?php if ( get_theme_mod( 'goso_related_post_popup' ) ) : ?>
        <div class="goso-flag-rlt-popup"></div><?php endif; ?>

</article>
