<?php
/**
 * Related post popup template
 * Render list related posts
 *
 * @since 6.3
 */

$orig_post = $post;
global $post;
$numbers_related = get_theme_mod( 'goso_rltpopup_numpost' );
if ( ! isset( $numbers_related ) || $numbers_related < 1 ): $numbers_related = 3; endif;


$orderby_post         = get_theme_mod( 'goso_rltpopup_orderby' ) ? get_theme_mod( 'goso_rltpopup_orderby' ) : 'date';
$related_position     = get_theme_mod( 'goso_rltpopup_position' ) ? get_theme_mod( 'goso_rltpopup_position' ) : 'left';
$related_order_post   = get_theme_mod( 'goso_rltpopup_sort_order' ) ? get_theme_mod( 'goso_rltpopup_sort_order' ) : 'DESC';
$goso_related_by     = get_theme_mod( 'goso_rltpopup_by' );
$related_title_length = get_theme_mod( 'goso_rltpopup_title_length' ) ? get_theme_mod( 'goso_rltpopup_title_length' ) : 6;

$args = goso_get_query_related_posts( get_the_ID(), $goso_related_by, $orderby_post, $related_order_post, $numbers_related );

if ( ! empty( $args ) ) {

$my_query = new wp_query( $args );
if ( $my_query->have_posts() ) {
?>
<aside class="goso-rlt-popup goso-rltpopup-<?php echo $related_position; ?><?php if ( get_theme_mod( 'goso_rltpopup_hide_mobile' ) ): echo ' rltpopup-hide-mobile'; endif; ?>">
    <h3 class="rtlpopup-heading"><?php echo goso_get_setting( 'goso_rltpopup_heading_text' ); ?><a
                class="goso-close-rltpopup">x<span></span><span></span></a></h3>

    <div class="goso-rtlpopup-content">
		<?php $i = 0;
		while ( $my_query->have_posts() ) : $my_query->the_post();
			$trans = 400 + ( 80 * $i ); ?>
            <div class="rltpopup-item"
                 style="transition-delay: <?php echo $trans; ?>ms; -webkit-transition-delay: <?php echo $trans; ?>ms;">
                <div class="rltpopup-item-inner">
					<?php if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) : ?>
						<?php if ( ! get_theme_mod( 'goso_disable_lazyload_single' ) ) { ?>
                            <figure class="rltpopup-thumbnail">
                                <a class="rltpopup-thumb goso-image-holder goso-lazy"
                                   data-bgset="<?php echo goso_image_srcset( get_the_ID(),goso_featured_images_size( 'small' ) ); ?>"
                                   href="<?php the_permalink(); ?>"
                                   title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
                            </figure>
						<?php } else { ?>
                            <figure class="rltpopup-thumbnail">
                                <a class="rltpopup-thumb goso-image-holder"
                                   style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), goso_featured_images_size( 'small' ) ); ?>');"
                                   href="<?php the_permalink(); ?>"
                                   title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
                            </figure>
						<?php } ?>
					<?php endif; ?>
                    <div class="rltpopup-meta">
                        <h4><a class="rltpopup-title"
                               href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $related_title_length, '...' ); ?></a>
                        </h4>
						<?php if ( ! get_theme_mod( 'goso_rltpopup_hide_date' ) ): ?>
                            <span class="date"><?php goso_authow_time_link(); ?></span>
						<?php endif; ?>
                    </div>
                </div>
            </div>
			<?php
			$i ++; endwhile;
		echo '</div></aside>';
		}
		}
		$post = $orig_post;
		wp_reset_postdata();
		?>
