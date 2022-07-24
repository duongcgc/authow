<?php
/**
 * This is content page will display in loop of page.php file
 * Don't edit this file, let create child theme and override it
 *
 * @since 1.0
 */

$pagetitle   = get_post_meta( $post->ID, 'goso_page_display_title', true );
$sharebox    = get_post_meta( $post->ID, 'goso_page_sharebox', true );
$block_style = get_theme_mod( 'goso_blockquote_style' ) ? get_theme_mod( 'goso_blockquote_style' ) : 'style-1';

$show_page_title = goso_is_pageheader();
$flag_ptitle     = true;
if ( get_theme_mod( 'goso_page_hide_ptitle' ) ) {
	$flag_ptitle = false;
}
if ( $pagetitle == 'yes' ) {
	$flag_ptitle = true;
} else if ( $pagetitle == 'no' ) {
	$flag_ptitle = false;
}
$simage_size = 'goso-full-thumb';
if ( goso_is_mobile() ) {
	$simage_size = 'goso-masonry-thumb';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! $show_page_title ): ?>
		<?php if ( get_the_title() && $flag_ptitle ): ?>
            <div class="goso-page-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </div>
		<?php endif; ?>
	<?php endif; ?>

	<?php goso_authow_meta_schema(); ?>

	<?php if ( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail() && ! get_theme_mod( 'goso_page_hide_featured_image' ) ) :
		$thumb_alt = $thumb_title_html = '';
		$thumb_id = get_post_thumbnail_id( get_the_ID() );
		$thumb_alt = goso_get_image_alt( $thumb_id, get_the_ID() );
		$thumb_title_html = goso_get_image_title( $thumb_id );
		?>
        <div class="post-image">
			<?php if ( get_theme_mod( 'goso_speed_disable_first_screen' ) || ! get_theme_mod('goso_disable_lazyload_fsingle') ) {
				$img_w = goso_get_image_data_based_post_id( get_the_ID(), $simage_size, 'w', false );
				$img_h = goso_get_image_data_based_post_id( get_the_ID(), $simage_size, 'h', false );
				?>
                <img class="attachment-goso-full-thumb size-goso-full-thumb goso-lazy wp-post-image"
                     src="<?php echo goso_holder_image_base( $img_w, $img_h ); ?>"
                     width="<?php echo $img_w; ?>"
                     height="<?php echo $img_h; ?>"
                     alt="<?php echo $thumb_alt; ?>"<?php echo $thumb_title_html; ?>
                     data-sizes="<?php echo goso_image_datasize( $simage_size , 'goso-masonry-thumb' ); ?>"
                     data-srcset="<?php echo goso_image_img_srcset( get_the_ID(), $simage_size ,'goso-masonry-thumb' ); ?>"
                     data-src="<?php echo goso_get_featured_image_size( get_the_ID(), $simage_size ); ?>">
			<?php } else { ?>
				<?php the_post_thumbnail( $simage_size ); ?>
			<?php } ?>
        </div>
	<?php endif; ?>

    <div class="post-entry <?php echo 'blockquote-' . $block_style; ?><?php if ( get_theme_mod( 'goso_page_comments' ) && get_theme_mod( 'goso_page_share' ) ): echo ' page-has-margin'; endif; ?>">
        <div class="inner-post-entry entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
        </div>
    </div>

	<?php if ( ! get_theme_mod( 'goso_page_share' ) && ( 'no' != $sharebox ) ) : ?>
		<?php get_template_part( 'template-parts/single-meta-comment' ); ?>
	<?php endif; ?>

	<?php if ( ! get_theme_mod( 'goso_page_comments' ) ) : ?>
		<?php comments_template( '', true ); ?>
	<?php endif; ?>

</article>
