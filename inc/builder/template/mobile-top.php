<?php
$classes     = '';
$stick_class = goso_get_builder_mod( 'goso_header_mobile_topbar_sticky_setting', 'enable' );
$classes     .= 'enable' == $stick_class ? 'sticky-enable' : 'sticky-disable';
$classes     .= goso_can_render_header( 'mobile', 'top' ) ? ' pc-hasel' : ' pc-noel';

$middle_content = goso_get_builder_mod( 'goso_header_mobile_topbar_column', 'enable' );
$classes        .= 'enable' == $middle_content ? ' pcmiddle-center' : ' pcmiddle-normal';
?>
<div class="goso_mobile_topbar goso-mobile-topbar goso_container <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="goso_nav_row">
	        <?php
	        $columns = array( 'left', 'center', 'right' );

	        foreach ( $columns as $column ) {
		        $setting_align = "goso_hb_align_mobile_top_{$column}";
		        $align         = goso_get_builder_mod( $setting_align, $column );

		        $setting_element = "goso_hb_element_mobile_top_{$column}";
		        $elements        = goso_get_builder_mod( $setting_element );
		        $elements        = $elements ? explode( ',', $elements ) : '';
		        ?>

                <div class="goso_nav_col goso_nav_<?php echo esc_attr( $column ); ?> goso_nav_align<?php echo esc_attr( $align ); ?>">

			        <?php
			        if ( ! empty( $elements ) ) {
				        foreach ( $elements as $element ) {
					        if ( ! empty( $element ) && file_exists( PENCI_BUILDER_PATH . 'elements/' . $element . '/front-end.php' ) ) {
						        load_template( PENCI_BUILDER_PATH . 'elements/' . $element . '/front-end.php', false );
					        }
				        }
			        }
			        ?>

                </div>

		        <?php
	        }
	        ?>
        </div>
    </div>
</div>
