<?php
$block = goso_get_builder_mod( 'goso_header_pb_block_2_select' );
if ( ! empty( $block ) ) {
	?>
    <div class="goso-header-block goso-header-block-2">
		<?php
		$block_id = '';
		$block_oj = get_page_by_path( $block, OBJECT, 'goso-block' );
		if ( $block_oj ) {
			$block_id = $block_oj->ID;
		}
		if ( $block_id ) {
			if ( did_action( 'elementor/loaded' ) && Elementor\Plugin::instance()->db->is_built_with_elementor( $block_id )  ) {
				echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $block_id );
			} else {
				$block_content = get_post( $block_id );
				echo do_shortcode( $block_content->post_content );

				$shortcodes_custom_css = get_post_meta( $block_id, '_wpb_shortcodes_custom_css', true );

				echo '<style data-type="vc_shortcodes-custom-css">';
				if ( ! empty( $shortcodes_custom_css ) ) {
					echo $shortcodes_custom_css;
				}
				echo '</style>';
			}
		} ?>
    </div>
	<?php
}
