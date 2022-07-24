<div id="top-search"
     class="pc-builder-element penci-top-search pcheader-icon top-search-classes <?php echo penci_get_builder_mod( 'penci_header_builder_search_icon_css_class' ); ?>">
    <a class="search-click pc-button-define-<?php echo penci_get_builder_mod( 'penci_header_search_icon_btn_style','customize' ); ?>">
        <i class="penciicon-magnifiying-glass"></i>
    </a>
    <div class="show-search">
		<?php get_search_form(); ?>
        <a class="search-click close-search"><i class="penciicon-close-button"></i></a>
    </div>
</div>
