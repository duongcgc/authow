<form role="search" method="get" class="pc-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="pc-searchform-inner">
        <input type="text" class="search-input"
               placeholder="<?php echo goso_get_setting( 'goso_trans_type_and_hit' ); ?>" name="s"/>
        <i class="gosoicon-magnifiying-glass"></i>
        <input type="submit" class="searchsubmit" value="<?php echo goso_get_setting( 'goso_trans_search' ); ?>"/>
    </div>
</form>
