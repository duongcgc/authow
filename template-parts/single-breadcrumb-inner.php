<?php
if( get_theme_mod( 'goso_disable_breadcrumb' ) ) {
	return;
}

$yoast_breadcrumb = '';
if ( function_exists( 'yoast_breadcrumb' ) ) {
	$yoast_breadcrumb = yoast_breadcrumb( '<div class="goso-container-inside goso-breadcrumb single-breadcrumb">', '</div>', false );
}

if( $yoast_breadcrumb ){
	echo $yoast_breadcrumb;
}else{ ?>
	<div class="goso-container-inside goso-breadcrumb single-breadcrumb">
		<span><a class="crumb" href="<?php echo esc_url( home_url('/') ); ?>"><?php echo goso_get_setting( 'goso_trans_home' ); ?></a></span><?php goso_fawesome_icon('fas fa-angle-right'); ?>
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