<?php
/**
 * The template for displaying single pages.
 *
 * @since 1.0
 */
$block_style = get_theme_mod('goso_blockquote_style') ? get_theme_mod('goso_blockquote_style') : 'style-1';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-entry <?php echo 'blockquote-'. $block_style; ?>">
		<div class="inner-post-entry entry-content">
			<?php the_content(); ?>
			
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


</article>