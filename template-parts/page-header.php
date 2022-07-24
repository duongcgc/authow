<?php

$postid = get_the_ID();
$page_title = get_post_meta( get_the_ID(), 'goso_pmeta_page_title', true );

$pheader_hideline      = get_theme_mod( 'goso_pheader_hideline' );
$pheader_hidebead      = get_theme_mod( 'goso_pheader_hidebead' );
$pheader_align         = get_theme_mod( 'goso_pheader_align' );

$page_title_df = array(
	'pheader_hideline'      => '',
	'pheader_hidebead'      => '',
	'pheader_align'         => ''
);

$page_title = wp_parse_args( $page_title, $page_title_df );

if( 'hide' == $page_title['pheader_hidebead'] ){
	$pheader_hidebead = true;
}elseif( 'show' == $page_title['pheader_hidebead'] ){
	$pheader_hidebead = false;
}

if( 'hide' == $page_title['pheader_hideline'] ){
	$pheader_hideline = true;
}elseif( 'show' == $page_title['pheader_hideline'] ){
	$pheader_hideline = false;
}


if( $page_title['pheader_align'] ){
	$pheader_align = $page_title['pheader_align'];
}

$class_page_header = 'goso-page-header-wrap';
$class_page_header .= ' goso-pheader-'.  esc_attr( $pheader_align ? $pheader_align : 'center' );
$class_page_header .= $pheader_hidebead  ? ' goso-phhide-bread' : '';
$class_page_header .= $pheader_hideline  ? ' goso-phhide-line' : '';
?>
<div class="<?php echo esc_attr( $class_page_header ); ?>">
	<div class="goso-page-header-inner container">
		<h1 class="goso-page-header-title"> <?php echo get_the_title( $postid ); ?> </h1>

		<?php if ( ! $pheader_hidebead ) : ?>
			<?php
			$yoast_breadcrumb = '';
			if ( function_exists( 'yoast_breadcrumb' ) ) {
				$yoast_breadcrumb = yoast_breadcrumb( '<div class="container container-single-page goso-breadcrumb">', '</div>', false );
			}

			if( $yoast_breadcrumb ){
				echo $yoast_breadcrumb;
			}else{ ?>
				<div class="container container-single-page goso-breadcrumb">
					<span><a class="crumb" href="<?php echo esc_url( home_url('/') ); ?>"><?php echo goso_get_setting( 'goso_trans_home' ); ?></a></span><?php goso_fawesome_icon('fas fa-angle-right'); ?>
					<?php
					$page_parent = get_post_ancestors( get_the_ID() );
					if( ! empty( $page_parent ) ):
						$page_parent = array_reverse($page_parent);
						foreach( $page_parent as $pages ){
							?>
							<span><a class="crumb" href="<?php echo get_permalink( $pages ); ?>"><?php echo get_the_title( $pages ); ?></a></span><?php goso_fawesome_icon('fas fa-angle-right'); ?>
						<?php }
					endif; ?>
					<span><?php the_title(); ?></span>
				</div>
			<?php } ?>
		<?php endif; ?>
	</div>
</div>
