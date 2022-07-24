<?php
$class   = [];
$class[] = 'search-style-' . penci_get_builder_mod( 'penci_header_pb_search_form_style' );
$class[] = penci_get_builder_mod( 'penci_header_pb_search_form_menu_class' );
?>
<div class="penci-builder-element pc-search-form-desktop pc-search-form <?php echo implode( ' ', $class ); ?>">
    <form role="search" method="get" class="pc-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="pc-searchform-inner">
            <input type="text" class="search-input"
                   placeholder="<?php echo penci_get_setting( 'penci_trans_type_and_hit' ); ?>" name="s"/>
            <i class="penciicon-magnifiying-glass"></i>
            <button type="submit" class="searchsubmit"><?php echo penci_get_setting( 'penci_trans_search' ); ?></button>
        </div>
    </form>
</div>
