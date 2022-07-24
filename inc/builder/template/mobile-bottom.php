<?php
$classes        = '';
$stick_class    = goso_get_builder_mod( 'goso_header_mobile_bottombar_sticky_setting', '' );
$middle_content = goso_get_builder_mod( 'goso_header_mobile_bottombar_middle_column', 'enable' );
$classes        .= 'enable' == $stick_class ? 'sticky-enable' : 'sticky-disable';
$classes        .= 'enable' == $middle_content ? ' pcmiddle-center' : ' pcmiddle-normal';
$classes        .= goso_can_render_header( 'mobile', 'bottom' ) ? ' pc-hasel' : ' pc-noel';
?>
<div class="goso_mobile_bottombar goso-mobile-bottombar goso_container <?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="goso_nav_row">
			<?php
			$columns = array( 'left', 'center', 'right' );

			foreach ( $columns as $column ) {
				$setting_align = "goso_hb_align_mobile_bottom_{$column}";
				$align         = goso_get_builder_mod( $setting_align, $column );


				$setting_element = "goso_hb_element_mobile_bottom_{$column}";
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
