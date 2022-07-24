<?php
$sidebar_enable = goso_single_sidebar_return();
$sidebar_position = goso_get_posts_sidebar_class();
$sidebar_small_width = goso_single_smaller_content_enable();

// Check layout magazine
$single_magazine = 'container-single goso-single-style-5 goso-single-smore container-single-fullwidth hentry  goso-header-text-white';
if( get_theme_mod( 'goso_home_layout' ) == 'magazine-1' || get_theme_mod( 'goso_home_layout' ) == 'magazine-2' ) {
	$single_magazine .= ' container-single-magazine';
}

// Check class main content
$class_container_single = 'container container-single goso-single-style-5 goso-single-smore';
if ( $sidebar_enable ){
	$class_container_single .= ' goso_sidebar';
	$class_container_single .= ' ' . $sidebar_position;
} else {
	$class_container_single .= ' goso_is_nosidebar';
	$single_magazine .= ' goso_is_nosidebar';
}

if( $sidebar_small_width ) {
	$class_container_single .= ' goso-single-smaller-width';
}

if( ! get_theme_mod( 'goso_disable_lightbox_single' ) ){
	$class_container_single .= ' goso-enable-lightbox';
}

$post_format = get_post_format();
$show_post_format = true;
if( get_theme_mod( 'goso_post_thumb' ) && ! in_array( $post_format, array( 'link', 'quote','gallery','video' ) )  ) {
	$class_container_single .= ' goso-single-pheader-noimg';
	$show_post_format = false;
}

$postID = get_the_ID();
$current_permalink = get_permalink( $postID );
$current_title = get_the_title( $postID );
$infinite_load  = get_theme_mod( 'goso_loadnp_posts' ) ? get_theme_mod( 'goso_loadnp_posts' ) : false;
$prev_post_id = $prev_post_url = $prev_post_title = $wrap_inficlass = $flag_infi = '';
$data_infiads = get_theme_mod( 'goso_loadnp_ads' ) ? '<div class="goso-single-infiads">' . get_theme_mod( 'goso_loadnp_ads' ) . '</div>' : '';
if( get_theme_mod( 'goso_loadnp_posts' ) ){
	$prev_post = goso_get_next_prev_posts();
	$flag_infi = 'no_data';
	if( ! empty( $prev_post ) && $prev_post != null && $prev_post != '' ) {
		$prev_post_id = $prev_post->ID;
		$prev_post_url = get_permalink( $prev_post_id );
		$prev_post_title = get_the_title( $prev_post_id );
		$wrap_inficlass = ' goso-single-infiscroll';
		$flag_infi = 'has_data';
	}
}
?>
<div class="goso-single-wrapper<?php echo $wrap_inficlass; ?>"<?php if( get_theme_mod( 'goso_loadnp_posts' ) && $data_infiads ) echo ' data-infiads="' . htmlentities( $data_infiads ) . '"'; ?>>
	<div class="goso-single-block<?php if( $flag_infi == 'no_data' ){ echo ' goso-single-infiblock-end'; } ?>"<?php if( get_theme_mod( 'goso_loadnp_posts' ) ): ?> data-prev-url="<?php echo esc_url( $prev_post_url );?>" data-current-url="<?php echo esc_url( $current_permalink );?>" data-post-title="<?php echo esc_attr( $current_title );?>" data-edit-post="<?php echo get_edit_post_link( $postID ); ?>" data-postid="<?php echo $postID; ?><?php endif; ?>">
		<div class="goso-single-pheader <?php echo ( $single_magazine );?>">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					if( ! get_theme_mod( 'goso_move_title_bellow' ) && ! $show_post_format ) {
						echo '<div class="container' . ( 'two-sidebar' == $sidebar_position ? ' two-sidebar' : '' ) . '">';
						get_template_part( 'template-parts/single', 'breadcrumb' );
						get_template_part( 'template-parts/single', 'entry-header' );
						echo '</div>';
					}else{
						get_template_part( 'template-parts/single', 'post-format2' );
					}
				endwhile;
			endif;
			?>
		</div>
		<div class="<?php echo $class_container_single; ?>">
			<div id="main"<?php if ( get_theme_mod( 'goso_sidebar_sticky' ) ): ?> class="goso-main-sticky-sidebar"<?php endif; ?>>
				<div class="theiaStickySidebar">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php goso_set_post_views( $post->ID ); ?>
						<?php get_template_part( 'template-parts/single', 'content-main' ); ?>
					<?php endwhile; endif; ?>
				</div>
			</div>
			<?php get_template_part( 'template-parts/single', 'sidebar' ); ?>
		</div>
		<?php do_action( 'goso_action_after_post_content' ); ?>
	</div>
</div>
<?php if( get_theme_mod( 'goso_loadnp_posts' ) && $flag_infi != 'no_data' ){ ?>
	<div class="goso-ldsingle"><div class="goso-ldspinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>
<?php } ?>
<?php get_footer(); ?>