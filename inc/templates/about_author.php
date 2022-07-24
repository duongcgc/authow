<?php
/**
 * Display detail author of current post
 * Use in single post
 *
 * @since 1.0
 */
$author_id = false;
$author    = get_user_by( 'slug', get_query_var( 'author_name' ) );
if ( $author ) {
	$author_id = $author->ID;
}
$classes      = 'post-author';
$bio_style    = get_theme_mod( 'penci_authorbio_style' ) ? get_theme_mod( 'penci_authorbio_style' ) : 'style-1';
$bio_img      = get_theme_mod( 'penci_bioimg_style' ) ? get_theme_mod( 'penci_bioimg_style' ) : 'round';
$bio_img_size = get_theme_mod( 'penci_author_ava_size', 100 );
$classes      .= ' abio-' . $bio_style;
$classes      .= ' bioimg-' . $bio_img;
?>
<div class="<?php echo $classes; ?>">
    <div class="author-img">
		<?php
		echo get_avatar( get_the_author_meta( 'email', $author_id ), $bio_img_size );
		?>
    </div>
    <div class="author-content">
        <h5><?php echo penci_get_the_author_posts_link( $author_id ); ?></h5>
        <p><?php the_author_meta( 'description', $author_id ); ?></p>
        <div class="bio-social">
			<?php if ( get_the_author_meta( 'user_url', $author_id ) ) : ?>
                <a <?php echo penci_reltag_social_icons(); ?> target="_blank" class="author-social"
                                                              href="<?php the_author_meta( 'user_url', $author_id ); ?>"><?php penci_fawesome_icon( 'fas fa-globe' ); ?></a>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'facebook', $author_id ) ) : ?>
                <a <?php echo penci_reltag_social_icons(); ?> target="_blank" class="author-social"
                                                              href="https://facebook.com/<?php echo esc_attr( the_author_meta( 'facebook', $author_id ) ); ?>"><?php penci_fawesome_icon( 'fab fa-facebook-f' ); ?></a>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'twitter', $author_id ) ) : ?>
                <a <?php echo penci_reltag_social_icons(); ?> target="_blank" class="author-social"
                                                              href="https://twitter.com/<?php echo esc_attr( the_author_meta( 'twitter', $author_id ) ); ?>"><?php penci_fawesome_icon( 'fab fa-twitter' ); ?></a>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'instagram', $author_id ) ) : ?>
                <a <?php echo penci_reltag_social_icons(); ?> target="_blank" class="author-social"
                                                              href="https://instagram.com/<?php echo esc_attr( the_author_meta( 'instagram', $author_id ) ); ?>"><?php penci_fawesome_icon( 'fab fa-instagram' ); ?></a>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'pinterest', $author_id ) ) : ?>
                <a <?php echo penci_reltag_social_icons(); ?> target="_blank" class="author-social"
                                                              href="https://pinterest.com/<?php echo esc_attr( the_author_meta( 'pinterest', $author_id ) ); ?>"><?php penci_fawesome_icon( 'fab fa-pinterest' ); ?></a>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'tumblr', $author_id ) ) : ?>
                <a <?php echo penci_reltag_social_icons(); ?> target="_blank" class="author-social"
                                                              href="https://<?php echo esc_attr( the_author_meta( 'tumblr', $author_id ) ); ?>.tumblr.com/"><?php penci_fawesome_icon( 'fab fa-tumblr' ); ?></a>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'linkedin', $author_id ) ) : ?>
                <a <?php echo penci_reltag_social_icons(); ?> target="_blank" class="author-social"
                                                              href="<?php echo esc_url( the_author_meta( 'linkedin', $author_id ) ); ?>"><?php penci_fawesome_icon( 'fab fa-linkedin-in' ); ?></a>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'soundcloud', $author_id ) ) : ?>
                <a <?php echo penci_reltag_social_icons(); ?> target="_blank" class="author-social"
                                                              href="<?php echo esc_url( the_author_meta( 'soundcloud', $author_id ) ); ?>"><?php penci_fawesome_icon( 'fab fa-soundcloud' ); ?></a>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'youtube', $author_id ) ) : ?>
                <a <?php echo penci_reltag_social_icons(); ?> target="_blank" class="author-social"
                                                              href="<?php echo esc_url( the_author_meta( 'youtube', $author_id ) ); ?>"><?php penci_fawesome_icon( 'fab fa-youtube' ); ?></a>
			<?php endif; ?>
			<?php if ( get_the_author_meta( 'email', $author_id ) && get_theme_mod( 'penci_post_author_email' ) ) : ?>
                <a class="author-social"
                   href="mailto:<?php echo esc_attr( the_author_meta( 'email', $author_id ) ); ?>"><?php penci_fawesome_icon( 'fas fa-envelope' ); ?></a>
			<?php endif; ?>
        </div>
    </div>
</div>
