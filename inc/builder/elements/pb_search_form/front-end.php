<?php
$class   = [];
$class[] = 'search-style-' . goso_get_builder_mod( 'goso_header_pb_search_form_style' );
$class[] = goso_get_builder_mod( 'goso_header_pb_search_form_menu_class' );
?>
<div class="goso-builder-element pc-search-form-desktop pc-search-form <?php echo implode( ' ', $class ); ?>">
    <form role="search" method="get" class="pc-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="pc-searchform-inner">
            <input type="text" class="search-input"
                   placeholder="<?php echo goso_get_setting( 'goso_trans_type_and_hit' ); ?>" name="s"/>
            <i class="gosoicon-magnifiying-glass"></i>
            <button type="submit" class="searchsubmit"><?php echo goso_get_setting( 'goso_trans_search' ); ?></button>
        </div>
    </form>
</div>
