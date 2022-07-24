<?php
$classes   = [];
$classes[] = 'social-icon-style goso-social-' . goso_get_builder_mod( 'goso_header_pb_social_icon_mobile_section_icon_style', 'default' );
$classes[] = 'goso-social-' . goso_get_builder_mod( 'goso_header_pb_social_icon_mobile_section_icon_color', 'normal' );
?>
<div class="header-social goso-builder-element mobile-social">
    <div class="inner-header-social <?php echo implode( ' ', $classes ); ?>">
		<?php
		$dataref     = goso_get_builder_mod( 'goso_header_pb_social_icon_mobile_section_goso_rel_type_social' ) ? goso_get_builder_mod( 'goso_header_pb_social_icon_mobile_section_goso_rel_type_social' ) : 'noreferrer';
		$data_return = str_replace( '_', ' ', $dataref );
		if ( 'none' != $data_return ) {
			$rel = ' rel="' . $data_return . '"';
		} else {
			$rel = '';
		}


		$social_data = goso_social_media_array();
		foreach ( $social_data as $name => $sdata ) {
			if ( $sdata[0] ) {
				$icon_html = goso_icon_by_ver( $sdata[1] );
				?>
                <a href="<?php echo esc_url( do_shortcode( $sdata[0] ) ); ?>"
                   aria-label="<?php echo ucwords( $name ); ?>" <?php echo $rel; ?>
                   target="_blank"><?php echo $icon_html; ?></a>
				<?php
			}
		}
		?>
    </div>
</div>
