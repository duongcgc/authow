<?php
/**
 * Featured video background
 * When featured video background is enable, it will disable featured slider
 *
 * @since 1.0
 */

$video_url = get_theme_mod( 'goso_featured_video_url' );
$start_time = get_theme_mod( 'goso_featured_video_start' );
if( ! is_numeric( $start_time ) || ! $start_time ) { $start_time = '0'; }
?>
<div class="featured-area featured-video">
	<div class="featured-video-background<?php if( get_theme_mod( 'goso_featured_video_img_mobile' ) ): ?> has-bg-image<?php endif; ?>" id="goso-featured-video-bg" data-videosrc="<?php echo esc_attr( $video_url ); ?>" data-starttime="<?php echo absint( $start_time ); ?>">
		<?php if( get_theme_mod( 'goso_featured_video_img_mobile' ) ): ?>
			<div class="goso-video-overlay-background" style="background-image: url('<?php echo get_theme_mod( 'goso_featured_video_img_mobile' ); ?>');"></div>
		<?php endif; ?>
		<div class="goso-video-bg-overlay"></div>
		<?php if( get_theme_mod( 'goso_featured_video_text_heading' ) || get_theme_mod( 'goso_featured_video_sub_heading' ) || get_theme_mod( 'goso_featured_video_image' ) ): ?>
			<div class="goso-video-overlay">
				<?php if( get_theme_mod( 'goso_featured_video_image' ) ): ?>
					<div class="goso-video-custom-img<?php if( ! get_theme_mod( 'goso_featured_video_text_heading' ) && ! get_theme_mod( 'goso_featured_video_sub_heading' ) ): echo ' no-margin-bottom'; endif; ?>">
						<img src="<?php echo get_theme_mod( 'goso_featured_video_image' ); ?>" alt="Video Image" />
					</div>
				<?php endif; ?>
				<?php if( get_theme_mod( 'goso_featured_video_text_heading' ) ): ?>
					<h2 class="goso-heading-video"><?php echo do_shortcode( get_theme_mod( 'goso_featured_video_text_heading' ) ); ?></h2>
				<?php endif; ?>
				<?php if( get_theme_mod( 'goso_featured_video_sub_heading' ) ): ?>
					<p class="goso-sub-heading-video"><?php echo do_shortcode( get_theme_mod( 'goso_featured_video_sub_heading' ) ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</div>