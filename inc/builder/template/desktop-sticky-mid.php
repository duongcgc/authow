<?php
$classes        = '';
$middle_content = goso_get_builder_mod( 'goso_header_sticky_mid_middle_column', 'enable' );
$classes        .= 'enable' == $middle_content ? 'pcmiddle-center' : 'pcmiddle-normal';
$classes        .= goso_can_render_header( 'desktop_sticky', 'mid' ) ? ' pc-hasel' : ' pc-noel';
$content_width  = goso_get_builder_mod( 'goso_header_sticky_mid_content_width', 'container' );
?>
<div class="goso-desktop-sticky-mid goso-sticky-mid <?php echo esc_attr( $classes ); ?>">
    <div class="container <?php echo esc_attr( $content_width ); ?>">
        <div class="goso_nav_row">
			<?php
			$columns = array( 'left', 'center', 'right' );

			foreach ( $columns as $column ) {
				$setting_align = "goso_hb_align_desktop_sticky_mid_{$column}";
				$align         = goso_get_builder_mod( $setting_align, $column );


				$setting_element = "goso_hb_element_desktop_sticky_mid_{$column}";
				$elements        = goso_get_builder_mod( $setting_element, goso_header_default( "sticky_element_mid_{$column}" ) );
				$elements        = $elements ? explode( ',', $elements ) : '';
				?>

                <div class="goso_nav_col goso_nav_<?php echo esc_attr( $column ); ?> goso_nav_align<?php echo esc_attr( $align ); ?>">

					<?php
					if ( ! empty( $elements ) && is_array( $elements ) ) {
						foreach ( $elements as $element ) {
							if ( ! empty( $element ) && file_exists( GOSO_BUILDER_PATH . 'elements/' . $element . '/front-end.php' ) ) {
								load_template( GOSO_BUILDER_PATH . 'elements/' . $element . '/front-end.php', false, [ 'class_type' => 'sticky-header' ] );
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
