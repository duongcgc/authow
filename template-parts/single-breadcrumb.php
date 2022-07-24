<?php
if ( get_theme_mod( 'goso_disable_breadcrumb' ) ) {
	return;
}
$yoast_breadcrumb = '';
$extra_class      = '';
$single_style     = goso_get_single_style();
if ( get_theme_mod( 'goso_move_breadcrumbs' ) && in_array( $single_style, array( 'style-8' ) ) ) {
	$extra_class = ' goso-crumb-inside';
}
if ( function_exists( 'yoast_breadcrumb' ) ) {
	$yoast_breadcrumb = yoast_breadcrumb( '<div class="container goso-container-inside goso-breadcrumb single-breadcrumb' . $extra_class . '">', '</div>', false );
}

if ( $yoast_breadcrumb ) {
	echo $yoast_breadcrumb;
} else { ?>
    <div class="container goso-breadcrumb single-breadcrumb<?php echo $extra_class; ?>">
        <span><a class="crumb"
                 href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo goso_get_setting( 'goso_trans_home' ); ?></a></span><?php goso_fawesome_icon( 'fas fa-angle-right' ); ?>
		<?php
		if ( get_theme_mod( 'enable_pri_cat_yoast_seo' ) ) {
			$primary_term = goso_get_wpseo_primary_term();

			if ( $primary_term ) {
				echo $primary_term;
			} else {
				$goso_cats = get_the_category( get_the_ID() );
				$goso_cat  = array_shift( $goso_cats );
			echo goso_get_category_parents( $goso_cat );
		}
	} else {
		$goso_cats = get_the_category( get_the_ID() );
		$goso_cat  = array_shift( $goso_cats );
		echo goso_get_category_parents( $goso_cat );
	}
	?>
	<span><?php the_title(); ?></span>
</div>
<?php } ?>
