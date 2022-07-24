<?php
$setting_align = "goso_hb_align_desktop_sticky_{$row}_{$column}";
$default_align = goso_get_builder_mod( $setting_align );

$setting_element = "goso_hb_element_desktop_sticky_{$row}_{$column}";
$default_element = goso_get_builder_mod( $setting_element );
$default_element = explode( ',', $default_element );
?>
<div class="header-builder-<?php echo esc_html( $column ); ?> header-builder-column <?php echo esc_html( $default_align ); ?>"
     data-column="<?php echo esc_html( $column ); ?>">
    <div class="header-builder-drop-zone">
		<?php
		$elements = \HeaderBuilder::desktop_header_element();
		if ( is_array( $default_element ) ) {
			foreach ( $default_element as $element ) {
				if ( ! empty( $element ) ) {
					$template->render( 'header-element', array(
						'key'   => $element,
						'value' => $elements[ $element ]
					), true );
				}
			}
		}
		?>
        <div class="header-setting"><i class="fa"></i></div>
    </div>
    <div class="header-column-option-tooltip">
        <div class="header-column-option-align">
            <h3><?php esc_html_e( 'Align', 'authow' ); ?></h3>
            <ul>
                <li class="left <?php echo esc_attr( $default_align ) === 'left' ? 'active' : ''; ?>"
                    data-align="left"><?php esc_html_e( 'Left', 'authow' ); ?></li>
                <li class="center <?php echo esc_attr( $default_align ) === 'center' ? 'active' : ''; ?>"
                    data-align="center"><?php esc_html_e( 'Center', 'authow' ); ?></li>
                <li class="right <?php echo esc_attr( $default_align ) === 'right' ? 'active' : ''; ?>"
                    data-align="right"><?php esc_html_e( 'Right', 'authow' ); ?></li>
            </ul>
        </div>
    </div>
</div>
