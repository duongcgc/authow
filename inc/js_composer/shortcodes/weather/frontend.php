<?php
$output = $goso_block_width = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_class = 'goso-block-vc goso_block_weather goso-weather';
$css_class .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$block_id  = Goso_Vc_Helper::get_unique_id_block( 'weather' );
wp_enqueue_style( 'goso-font-iweather' );
?>
    <div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>">
		<?php Goso_Vc_Helper::markup_block_title( $atts ); ?>
        <div class="goso-block_content">
			<?php
			$weather_data = Goso_Weather::show_forecats( array(
				'location'      => $atts['goso_location'],
				'location_show' => $atts['goso_location_show'],
				'forecast_days' => $atts['goso_forcast'],
				'units'         => $atts['goso_units'],
			) );

			if ( $weather_data ) {
				echo $weather_data;
			} else {
				echo '<div class="goso-block-error">';
				echo '<span>Weather widget</span>';
				echo ' You need to fill API key to Customize > General > Extra Options > Weather API Key to get this widget work.';
				echo '</div>';
			}
			?>
        </div>
    </div>
<?php

$id_weather = '#' . $block_id;
$css_custom = Goso_Vc_Helper::get_heading_block_css( $id_weather, $atts );

if ( $atts['w_genneral_color'] ) {
	$css_custom .= sprintf( '%s .goso-weather-condition,
					 %s .goso-weather-information,
					 %s .goso-weather-lo-hi__content .fa,
					 %s .goso-circle,
					 %s .goso-weather-animated-icon i,
					 %s .goso-weather-unit { color : %s; opacity: 1; }',
		$id_weather, $id_weather, $id_weather, $id_weather, $id_weather, $id_weather, $atts['w_genneral_color'] );
}

if ( $atts['w_localtion_color'] ) {
	$css_custom .= sprintf( '%s .goso-weather-city { color : %s; }', $id_weather, $atts['w_localtion_color'] );
}

if ( $atts['w_border_color'] ) {
	$css_custom .= sprintf( '%s .goso-weather-information { border-color : %s; }', $id_weather, $atts['w_border_color'] );
}

if ( $atts['w_degrees_color'] ) {
	$css_custom .= sprintf( '%s .goso-big-degrees,%s .goso-small-degrees { color : %s; }', $id_weather, $id_weather, $atts['w_degrees_color'] );
}

if ( $atts['w_forecast_text_color'] ) {
	$css_custom .= sprintf( '%s .goso-weather-week{ color : %s; }', $id_weather, $atts['w_forecast_text_color'] );
}

if ( $atts['w_forecast_bg_color'] ) {
	$css_custom .= sprintf( '%s .goso-weather-week:before { background-color : %s;opacity: 1; }', $id_weather, $atts['w_forecast_bg_color'] );
}

if ( $atts['w_location_size'] ) {
	$css_custom .= sprintf( '%s .goso-weather-city{ font-size: %s; }', $id_weather, $atts['w_location_size'] );
}
if ( $atts['w_condition_size'] ) {
	$css_custom .= sprintf( '%s .goso-weather-condition{ font-size: %s; }', $id_weather, $atts['w_condition_size'] );
}
if ( $atts['w_whc_info_size'] ) {
	$css_custom .= sprintf( '%s .goso-weather-information{ font-size: %s; }', $id_weather, $atts['w_whc_info_size'] );
}
if ( $atts['w_temp_size'] ) {
	$css_custom .= sprintf( '%s .goso-weather-now .goso-big-degrees{ font-size: %s; }', $id_weather, $atts['w_temp_size'] );
}
if ( $atts['w_tempsmall_size'] ) {
	$css_custom .= sprintf( '%s .goso-weather-degrees-wrap .goso-small-degrees{ font-size: %s; }', $id_weather, $atts['w_tempsmall_size'] );
}
if ( $atts['w_forecast_size'] ) {
	$css_custom .= sprintf( '%s .goso-weather-days .goso-day-degrees { font-size: %s; }', $id_weather, $atts['w_forecast_size'] );
}

if ( $css_custom ) {
	echo '<style>';
	echo $css_custom;
	echo '</style>';
}
