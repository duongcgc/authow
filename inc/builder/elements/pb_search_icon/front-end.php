<div id="top-search"
     class="pc-builder-element goso-top-search pcheader-icon top-search-classes <?php echo goso_get_builder_mod( 'goso_header_builder_search_icon_css_class' ); ?>">
    <a class="search-click pc-button-define-<?php echo goso_get_builder_mod( 'goso_header_search_icon_btn_style','customize' ); ?>">
        <i class="gosoicon-magnifiying-glass"></i>
    </a>
    <div class="show-search">
		<?php get_search_form(); ?>
        <a class="search-click close-search"><i class="gosoicon-close-button"></i></a>
    </div>
</div>
