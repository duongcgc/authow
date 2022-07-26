<?php
$output = $goso_block_width = $el_class = $css_animation = $css = '';

$working_hours         = $row_gap = $subtitle_martop = '';
$ophour_icon_color     = $ophour_icon_size = '';
$ophour_title_color    = $ophour_title_size = $ophour_title_typo = '';
$ophour_subtitle_color = $ophour_subtitle_size = $ophour_subtitle_typo = '';
$ophour_hour_color     = $ophour_hour_size = $ophour_hour_weight = $ophour_hour_typo = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$working_hours = (array) vc_param_group_parse_atts( $working_hours );

if( ! $working_hours ) {
	return;
}

$class_to_filter = vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_class = 'goso-block-vc goso-working-hours';
$css_class .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$block_id = Goso_Vc_Helper::get_unique_id_block( 'open_hours' );
?>
	<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>">
		<?php Goso_Vc_Helper::markup_block_title( $atts ); ?>
		<div class="goso-block_content">
			<div class="goso-workingh-lists">
				<ul>
					<?php foreach ( (array)$working_hours as $hour ):
						$icon = isset( $hour['icon'] ) ? $hour['icon'] : '';
						$title = isset( $hour['title'] ) ? $hour['title'] : '';
						$hours = isset( $hour['hours'] ) ? $hour['hours'] : '';
						$subtitle = isset( $hour['subtitle'] ) ? $hour['subtitle'] : '';

						?>
						<li class="goso-workingh-item">
							<div class="goso-workingh-item-inner">
								<div class="goso-workingh-line1">
									<div class="goso-icontitle">
										<?php
										if ( $icon ) {
											echo '<i class="goso-listitem-icon ' . $icon . '"></i>';
										}
										if ( $title ) {
											echo '<span class="goso-listitem-title">' . $title . '</span>';
										}
										?>
									</div>
									<?php
									if ( $hours ) {
										echo '<span class="goso-listitem-hours">' . $hours . '</span>';
									}
									?>
								</div>
								<?php
								if ( $subtitle ) {
									echo '<span class="goso-listitem-subtitle">' . $subtitle . '</span>';
								}
								?>
							</div>
						</li>
					<?php endforeach; ?>

				</ul>
			</div>
		</div>
	</div>
<?php

$id_open_hours = '#' . $block_id;
$css_custom = Goso_Vc_Helper::get_heading_block_css( $id_open_hours, $atts );

if ( $row_gap ) {
	$css_custom .= $id_open_hours . ' .goso-workingh-item{ margin-bottom: ' . esc_attr( $row_gap ) . 'px;}';
}
if ( $subtitle_martop ) {
	$css_custom .= $id_open_hours . ' .goso-listitem-subtitle{ margin-top: ' . esc_attr( $subtitle_martop ) . ';}';
}
if ( $ophour_icon_color ) {
	$css_custom .= $id_open_hours . ' .goso-workingh-lists .goso-listitem-icon{ color: ' . esc_attr( $ophour_icon_color ) . ';}';
}
if ( $ophour_icon_size ) {
	$css_custom .= $id_open_hours . ' .goso-workingh-lists .goso-listitem-icon{ font-size: ' . esc_attr( $ophour_icon_size ) . ';}';
}
if ( $ophour_title_color ) {
	$css_custom .= $id_open_hours . ' .goso-workingh-lists .goso-listitem-title{ color: ' . esc_attr( $ophour_title_color ) . ';}';
}
if ( $ophour_title_size ) {
	$css_custom .= $id_open_hours . ' .goso-workingh-lists .goso-listitem-title{ font-size: ' . esc_attr( $ophour_title_size ) . ';}';
}
if ( $ophour_subtitle_color ) {
	$css_custom .= $id_open_hours . ' .goso-workingh-lists .goso-listitem-subtitle{ color: ' . esc_attr( $ophour_subtitle_color ) . ';}';
}
if ( $ophour_subtitle_size ) {
	$css_custom .= $id_open_hours . ' .goso-workingh-lists .goso-listitem-subtitle{ font-size: ' . esc_attr( $ophour_subtitle_size ) . ';}';
}
if ( $ophour_hour_color ) {
	$css_custom .= $id_open_hours . ' .goso-workingh-lists .goso-listitem-hours{ color: ' . esc_attr( $ophour_hour_color ) . ';}';
}
if ( $ophour_hour_size ) {
	$css_custom .= $id_open_hours . ' .goso-workingh-lists .goso-listitem-hours{ font-size: ' . esc_attr( $ophour_hour_size ) . ';}';
}
if ( $ophour_hour_weight ) {
	$css_custom .= $id_open_hours . ' .goso-workingh-lists .goso-listitem-hours{ font-weight: ' . esc_attr( $ophour_hour_weight ) . ';}';
}

if ( $css_custom ) {
	echo '<style>';
	echo $css_custom;
	echo '</style>';
}
