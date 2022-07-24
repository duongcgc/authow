<?php
$classes       = '';
$content_width = goso_get_builder_mod( 'goso_header_topblock_content_width', 'container-fullwidth' );
$transparent   = goso_get_builder_mod( 'goso_header_topblock_transparent_background_color' );
$classes       .= 'enable' == $transparent ? 'bg-transparent' : 'bg-normal';
$classes       .= goso_can_render_header( 'desktop', 'topblock' ) ? ' pc-hasel' : ' pc-noel';
?>
<div class="goso_topblock goso-desktop-topblock pcmiddle-normal goso_container <?php echo esc_attr( $classes ); ?>">
    <div class="container <?php esc_attr_e( $content_width ); ?>">
        <div class="goso_nav_row">
			<?php
			$columns = [ 'center' ];

			foreach ( $columns as $column ) {

				$content_direction = goso_get_builder_mod( 'goso_header_topblock_content_direction', 'row' );
				$content_direction = $content_direction ? $content_direction : 'row';

				$setting_align = "goso_hb_align_desktop_topblock_{$column}";
				$align         = goso_get_builder_mod( $setting_align, $column );

				$setting_element = "goso_hb_element_desktop_topblock_{$column}";
				$elements        = goso_get_builder_mod( $setting_element, goso_header_default( "desktop_element_topblock_{$column}" ) );
				$elements        = $elements ? explode( ',', $elements ) : '';
				?>

                <div class="goso_nav_col goso_nav_<?php echo esc_attr( $column ); ?>  goso_content_<?php echo esc_attr( $content_direction ); ?> goso_nav_align<?php echo esc_attr( $align ); ?>">

						<?php
						if ( ! empty( $elements ) && is_array( $elements ) ) {
							foreach ( $elements as $element ) {
								if ( ! empty( $element ) && file_exists( PENCI_BUILDER_PATH . 'elements/' . $element . '/front-end.php' ) ) {
									load_template( PENCI_BUILDER_PATH . 'elements/' . $element . '/front-end.php', false, [ 'class_type' => 'normal-header' ] );
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
