<?php
/**
 * Post navigation in single post
 * Create next and prev button to next and prev posts
 *
 * @package Wordpress
 * @since 1.0
 */
?>
<div class="post-pagination">
	<?php
	$prev_post = get_previous_post();
	$next_post = get_next_post();
	?>
	<?php if ( ! empty( $prev_post ) ) : ?>
        <div class="prev-post">
			<?php if ( has_post_thumbnail( $prev_post->ID ) && get_theme_mod( 'goso_post_nav_thumbnail' ) ): ?>
				<?php if ( ! get_theme_mod( 'goso_disable_lazyload_single' ) ) { ?>
                    <a class="goso-post-nav-thumb goso-holder-load goso-lazy"
                       href="<?php echo esc_url( get_the_permalink( $prev_post->ID ) ); ?>"
                       data-bgset="<?php echo goso_image_srcset( $prev_post->ID,'thumbnail' ); ?>">
                    </a>
				<?php } else { ?>
                    <a class="goso-post-nav-thumb" href="<?php echo esc_url( get_the_permalink( $prev_post->ID ) ); ?>"
                       style="background-image: url('<?php echo goso_get_featured_image_size( $prev_post->ID, 'thumbnail' ); ?>');">
                    </a>
				<?php } ?>
			<?php endif; ?>
            <div class="prev-post-inner">
                <div class="prev-post-title">
                    <span><?php echo goso_get_setting( 'goso_trans_previous_post' ); ?></span>
                </div>
                <a href="<?php echo esc_url( get_the_permalink( $prev_post->ID ) ); ?>">
                    <div class="pagi-text">
                        <h5 class="prev-title"><?php echo get_the_title( $prev_post->ID ); ?></h5>
                    </div>
                </a>
            </div>
        </div>
	<?php endif; ?>

	<?php if ( ! empty( $next_post ) ) : ?>
        <div class="next-post">
			<?php if ( has_post_thumbnail( $next_post->ID ) && get_theme_mod( 'goso_post_nav_thumbnail' ) ): ?>
				<?php if ( ! get_theme_mod( 'goso_disable_lazyload_single' ) ) { ?>
                    <a class="goso-post-nav-thumb goso-holder-load goso-lazy nav-thumb-next"
                       href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>"
                       data-bgset="<?php echo goso_image_srcset( $next_post->ID,'thumbnail' ); ?>">
                    </a>
				<?php } else { ?>
                    <a class="goso-post-nav-thumb nav-thumb-next"
                       href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>"
                       style="background-image: url('<?php echo goso_get_featured_image_size( $next_post->ID, 'thumbnail' ); ?>');">
                    </a>
				<?php } ?>
			<?php endif; ?>
            <div class="next-post-inner">
                <div class="prev-post-title next-post-title">
                    <span><?php echo goso_get_setting( 'goso_trans_next_post' ); ?></span>
                </div>
                <a href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>">
                    <div class="pagi-text">
                        <h5 class="next-title"><?php echo get_the_title( $next_post->ID ); ?></h5>
                    </div>
                </a>
            </div>
        </div>
	<?php endif; ?>
</div>
