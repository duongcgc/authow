<div class="pc-builder-element goso-menuhbg-wapper goso-menu-toggle-wapper">
    <a href="#" class="goso-menuhbg-toggle builder pc-button-define-<?php echo goso_get_builder_mod('goso_header_pb_hamburger_menu_btn_style','customize');?>">
		<span class="goso-menuhbg-inner">
			<i class="lines-button lines-button-double">
				<i class="goso-lines"></i>
			</i>
			<i class="lines-button lines-button-double goso-hover-effect">
				<i class="goso-lines"></i>
			</i>
		</span>
    </a>
</div>
<?php
add_filter( 'theme_mod_goso_menu_hbg_show', function () {
	return true;
} );
