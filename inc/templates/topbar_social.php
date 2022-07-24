<div class="pctopbar-item goso-topbar-social<?php if( get_theme_mod('goso_top_bar_brand_social') ): echo ' goso-social-textcolored'; endif; if( get_theme_mod('goso_tblogin') ): echo ' goso-lgdisplay-' . get_theme_mod('goso_tblogin'); endif; ?>">
	<?php
	if( get_theme_mod( 'goso_tblogin' ) == 'left' ){
		get_template_part( 'inc/templates/topbar_login' );
	}
	if( ! get_theme_mod( 'goso_top_bar_hide_social' ) ){
		get_template_part( 'inc/modules/socials' );
	}
	if( get_theme_mod( 'goso_tblogin' ) == 'right' ){
		get_template_part( 'inc/templates/topbar_login' );
	}
	?>
</div>