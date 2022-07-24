<div class="nav_wrap goso-mobile-sidebar-content-wrapper">
    <div class="goso-builder-item-wrap item_main">
		<?php
		$elements = goso_get_builder_mod( 'goso_hb_element_mobile_drawer_top_center' );
		$elements = explode( ',', $elements );
		foreach ( $elements as $element ) {
			if ( ! empty( $element ) && file_exists( PENCI_BUILDER_PATH . 'elements/' . $element . '/front-end.php' ) ) {
				load_template( PENCI_BUILDER_PATH . 'elements/' . $element . '/front-end.php', false );
			}
		}
		?>
    </div>
</div>
