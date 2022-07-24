<?php
$btn_link        = goso_get_builder_mod( 'goso_header_pb_button_2_link_setting' );
$btn_link_rel    = goso_get_builder_mod( 'goso_header_pb_button_2_link_rel', 'noreferrer' );
$btn_link_target = goso_get_builder_mod( 'goso_header_pb_button_2_link_target', '_blank' );
$btn_title       = goso_get_builder_mod( 'goso_header_pb_button_2_text_setting' );
$btn_style       = goso_get_builder_mod( 'goso_header_pb_button_2_style', 'style-4' );
$btn_shape       = goso_get_builder_mod( 'goso_header_pb_button_2_shape', 'ratangle' );

$classes   = [];
$classes[] = 'goso-builder goso-builder-button button-2';
$classes[] = 'button-define-' . $btn_style;
$classes[] = 'button-shape-' . $btn_shape;
$classes[] = goso_get_builder_mod( 'goso_header_pb_button_2_txt_css_class', 'default' );
$btn_title = ! empty( $btn_title ) ? $btn_title : 'Button Text';

if ( ($btn_link && $btn_title) || is_customize_preview() ):?>
    <a target="<?php echo esc_attr( $btn_link_target ); ?>" rel="<?php echo esc_attr( $btn_link_rel ); ?>"
       href="<?php echo esc_url( $btn_link ); ?>" class="<?php echo implode( ' ', $classes ); ?> ">
		<?php echo $btn_title; ?>
    </a>
<?php endif; ?>
