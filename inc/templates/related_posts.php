<?php
/**
 * Related post template
 * Render list related posts
 *
 * @since 1.0
 */
$data_auto = 'true';
$auto      = get_theme_mod( 'goso_post_related_autoplay' );
if ( $auto == false ): $data_auto = 'false'; endif;

$sidebar_opts = get_post_meta( get_the_ID(), 'goso_post_sidebar_display', true );

$orig_post = $post;
global $post;
$numbers_related = get_theme_mod( 'goso_numbers_related_post' );
if ( ! isset( $numbers_related ) || $numbers_related < 1 ): $numbers_related = 10; endif;

$orderby_post = 'date';
if ( get_theme_mod( 'goso_related_orderby' ) && get_theme_mod( 'goso_related_orderby' ) != 'date' ):
	$orderby_post = get_theme_mod( 'goso_related_orderby' );
endif;

$related_order_post   = get_theme_mod( 'goso_related_sort_order' );
$related_order_post   = $related_order_post ? $related_order_post : 'DESC';
$related_title_length = get_theme_mod( 'goso_related_posts_title_length' ) ? get_theme_mod( 'goso_related_posts_title_length' ) : 8;
$goso_related_by     = get_theme_mod( 'goso_related_by' );

$args = goso_get_query_related_posts( get_the_ID(), $goso_related_by, $orderby_post, $related_order_post, $numbers_related );

if ( ! empty( $args ) ) {

$my_query = new wp_query( $args );
if ( $my_query->have_posts() ) {
$data_loop            = '';
$number_posts_display = $my_query->post_count;
if ( $number_posts_display < 4 ):
	$data_loop = ' data-loop="false"';
endif;
?>
<div class="post-related<?php if ( get_theme_mod( 'goso_post_related_grid' ) ): echo ' goso-posts-related-grid'; endif; ?>">
	<?php if ( goso_get_setting( 'goso_post_related_text' ) ): ?>
        <div class="post-title-box"><h4
                    class="post-box-title"><?php echo goso_get_setting( 'goso_post_related_text' ); ?></h4></div>
	<?php endif; ?>
	<?php if ( ! get_theme_mod( 'goso_post_related_grid' ) ) {
	$lazy_class = 'goso-lazy'; ?>
    <div class="goso-owl-carousel goso-owl-carousel-slider goso-related-carousel"
         data-lazy="true"<?php echo $data_loop; ?> data-item="3" data-desktop="3" data-tablet="2" data-tabsmall="2"
         data-auto="<?php echo $data_auto; ?>"
         data-speed="300"<?php if ( ! get_theme_mod( 'goso_post_related_dots' ) ) {
		echo ' data-dots="true"';
	}
	if ( ! get_theme_mod( 'goso_post_related_arrows' ) ) {
		echo ' data-nav="false"';
	} ?>>
		<?php } else {
		$lazy_class = 'goso-lazy'; ?>
        <div class="goso-related-carousel goso-related-grid-display">
			<?php } ?>
			<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                <div class="item-related">
					<?php if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) : ?>
					<?php if ( ! get_theme_mod( 'goso_disable_lazyload_single' ) ) { ?>
                    <a class="related-thumb goso-image-holder <?php echo $lazy_class; ?>"
                       data-bgset="<?php echo goso_image_srcset( get_the_ID(), goso_featured_images_size() ); ?>"
                       href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
						<?php } else { ?>
                        <a class="related-thumb goso-image-holder"
                           style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), goso_featured_images_size() ); ?>');"
                           href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
							<?php } ?>
							<?php if ( has_post_thumbnail() && get_theme_mod( 'goso_post_related_icons' ) ): ?>
								<?php if ( has_post_format( 'video' ) ) : ?>
									<?php goso_fawesome_icon( 'fas fa-play' ); ?>
								<?php endif; ?>
								<?php if ( has_post_format( 'audio' ) ) : ?>
									<?php goso_fawesome_icon( 'fas fa-music' ); ?>
								<?php endif; ?>
								<?php if ( has_post_format( 'link' ) ) : ?>
									<?php goso_fawesome_icon( 'fas fa-link' ); ?>
								<?php endif; ?>
								<?php if ( has_post_format( 'quote' ) ) : ?>
									<?php goso_fawesome_icon( 'fas fa-quote-left' ); ?>
								<?php endif; ?>
								<?php if ( has_post_format( 'gallery' ) ) : ?>
									<?php goso_fawesome_icon( 'far fa-image' ); ?>
								<?php endif; ?>
							<?php endif; ?>
                        </a>
						<?php endif; ?>
                        <h3>
                            <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $related_title_length, '...' ); ?></a>
                        </h3>
						<?php if ( ! get_theme_mod( 'goso_hide_date_related' ) ): ?>
                            <span class="date"><?php goso_authow_time_link(); ?></span>
						<?php endif; ?>
                </div>
			<?php
			endwhile;
			echo '</div></div>';
			}
			}
			$post = $orig_post;
			wp_reset_postdata();
			?>
