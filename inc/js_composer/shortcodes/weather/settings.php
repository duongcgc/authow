<?php
vc_map( array(
	'base'          => 'goso_weather',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => goso_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/weather/frontend.php',
	'weight'        => 700,
	'name'          => goso_get_theme_name('Goso').' '.esc_html__( 'Weather', 'authow' ),
	'description'   => __( 'Weather Block', 'authow' ),
	'controls'      => 'full',
	'params'        => array_merge(
		Goso_Vc_Params_Helper::params_container_width(),
		array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Search your for location:', 'authow' ),
				'param_name'  => 'goso_location',
				'std'         => 'London',
				'admin_label' => true,
				'description' => sprintf( '%s - You can use "city name" (ex: London) or "city name,country code" (ex: London,uk)',
					'<a href="' . esc_url( 'http://openweathermap.org/find' ) . '">' . esc_html__( 'Find your location', 'pennews' ) . '</a>' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Location display', 'authow' ),
				'param_name'  => 'goso_location_show',
				'description' => esc_html__( 'If the option is empty,will display results from ', 'pennews' ) . '<a href="' . esc_url( 'http://openweathermap.org/find' ) . '">openweathermap.org</a>',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Units', 'authow' ),
				'param_name' => 'goso_units',
				'value'      => array(
					esc_html__( 'F', 'authow' ) => 'imperial',
					esc_html__( 'C', 'authow' ) => 'metric',
				),
				'std'        => 'metric',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Forcast', 'authow' ),
				'param_name' => 'goso_forcast',
				'value'      => array(
					esc_html__( '1 Day', 'authow' )  => '1',
					esc_html__( '2 Days', 'authow' ) => '2',
					esc_html__( '3 Days', 'authow' ) => '3',
					esc_html__( '4 Days', 'authow' ) => '4',
					esc_html__( '5 Days', 'authow' ) => '5',
				),
				'std'        => '5',
			),
		),
		Goso_Vc_Params_Helper::heading_block_params(),
		Goso_Vc_Params_Helper::params_heading_typo_color(),
		array(
			array(
				'type'             => 'textfield',
				'param_name'       => 'color_weather_css',
				'heading'          => esc_html__( 'Weather colors', 'authow' ),
				'value'            => '',
				'group'            => $group_color,
				'edit_field_class' => 'goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'General color', 'authow' ),
				'param_name'       => 'w_genneral_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Localtion color', 'authow' ),
				'param_name'       => 'w_localtion_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'goso_number',
				'param_name' => 'w_location_size',
				'heading'    => __( 'Font size for Location', 'authow' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => $group_color,
			),
			array(
				'type'       => 'goso_number',
				'param_name' => 'w_condition_size',
				'heading'    => __( 'Font size for Cloudiness', 'authow' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => $group_color,
			),
			array(
				'type'       => 'goso_number',
				'param_name' => 'w_whc_info_size',
				'heading'    => __( 'Font size for Wind,Humidity, Clouds', 'authow' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => $group_color,
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Border color', 'authow' ),
				'param_name'       => 'w_border_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Degrees color', 'authow' ),
				'param_name'       => 'w_degrees_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'goso_number',
				'param_name' => 'w_temp_size',
				'heading'    => __( 'Font size for Temperature', 'authow' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => $group_color,
			),
			array(
				'type'       => 'goso_number',
				'param_name' => 'w_tempsmall_size',
				'heading'    => __( 'Font size for Min/Max Temperature', 'authow' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => $group_color,
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Custom color for forecast weather in next days', 'authow' ),
				'param_name'       => 'w_forecast_text_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Custom background for forecast weather in next days', 'authow' ),
				'param_name'       => 'w_forecast_bg_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'goso_number',
				'param_name' => 'w_forecast_size',
				'heading'    => __( 'Font size for Weather Forecast', 'authow' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => $group_color,
			),
		),
		Goso_Vc_Params_Helper::extra_params()
	)
) );
