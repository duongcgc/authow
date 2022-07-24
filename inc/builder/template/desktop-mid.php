<?php
$classes        = '';
$middle_content = goso_get_builder_mod( 'goso_header_midbar_middle_column', 'enable' );
$content_width  = goso_get_builder_mod( 'goso_header_midbar_content_width', 'container' );
$transparent    = goso_get_builder_mod( 'goso_header_midbar_transparent_background_color' );
$classes        .= 'enable' == $transparent ? 'bg-transparent' : 'bg-normal';
$classes        .= 'enable' == $middle_content ? ' pcmiddle-center' : ' pcmiddle-normal';
$classes        .= goso_can_render_header( 'desktop', 'mid' ) ? ' pc-hasel' : ' pc-noel';
?>
<div class="goso_midbar goso-desktop-midbar goso_container <?php echo esc_attr( $classes ); ?>">
    <div class="container <?php esc_attr_e( $content_width ); ?>">
        <div class="goso_nav_row">
			<?php
			$columns = array( 'left', 'center', 'right' );

			foreach ( $columns as $column ) {
				$setting_align = "goso_hb_align_desktop_mid_{$column}";
				$align         = goso_get_builder_mod( $setting_align, $column );


				$setting_element = "goso_hb_element_desktop_mid_{$column}";
				$elements        = goso_get_builder_mod( $setting_element, goso_header_default( "desktop_element_mid_{$column}" ) );
				$elements        = $elements ? explode( ',', $elements ) : '';
				?>

                <div class="goso_nav_col goso_nav_<?php echo esc_attr( $column ); ?> goso_nav_align<?php echo esc_attr( $align ); ?>">

						<?php
						if ( ! empty( $elements ) && is_array( $elements ) ) {
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
