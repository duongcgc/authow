<?php
$group_color = 'Typo & Color';

vc_map( array(
	'base'          => 'penci_progress_bar',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => penci_get_theme_name('Authow'),
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/progress_bar/frontend.php',
	'weight'        => 700,
	'name'          => penci_get_theme_name('Goso').' '.esc_html__( 'Progress Bar', 'authow' ),
	'description'   => __( 'Progress Bar Block', 'authow' ),
	'controls'      => 'full',
	'params'        => array_merge(
		array(
			array(
				'type'        => 'param_group',
				'heading'     => __( 'Values', 'authow' ),
				'param_name'  => 'values',
				'description' => __( 'Enter values for graph - value, title and color.', 'authow' ),
				'value'       => urlencode( json_encode( array(
					array(
						'label' => __( 'Development', 'authow' ),
						'value' => '90',
					),
					array(
						'label' => __( 'Design', 'authow' ),
						'value' => '80',
					),
					array(
						'label' => __( 'Marketing', 'authow' ),
						'value' => '70',
					),
				) ) ),
				'params'      => array(
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Label', 'authow' ),
						'param_name'  => 'label',
						'description' => __( 'Enter text used as title of bar.', 'authow' ),
						'admin_label' => true,
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Value', 'authow' ),
						'param_name'  => 'value',
						'description' => __( 'Enter value of bar.', 'authow' ),
						'admin_label' => true,
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => __( 'Custom background color', 'authow' ),
						'param_name'  => 'bgcolor',
						'description' => __( 'Select custom single bar background color.', 'authow' )
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => __( 'Custom text color', 'authow' ),
						'param_name'  => 'textcolor',
						'description' => __( 'Select custom single bar text color.', 'authow' ),
						'dependency'  => array(
							'element' => 'color',
							'value'   => array( 'custom' ),
						),
					),
				),
			),
			array(
				'type'       => 'penci_only_number',
				'heading'    => esc_html__( 'Custom height for bar', 'authow' ),
				'param_name' => 'bar_height',
				'value'      => '',
				'min'        => 1,
				'max'        => 100,
				'suffix'     => 'px',
			),
			array(
				'type'       => 'penci_number',
				'heading'    => esc_html__( 'Custom margin top for bar', 'authow' ),
				'param_name' => 'bar_mar_top',
				'value'      => '',
				'min'        => 1,
				'max'        => 100,
				'suffix'     => 'px',
			),
			array(
				'type'       => 'penci_number',
				'heading'    => esc_html__( 'Custom margin bottom for bar', 'authow' ),
				'param_name' => 'bar_mar_bottom',
				'value'      => '',
				'min'        => 1,
				'max'        => 100,
				'suffix'     => 'px',
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Units', 'authow' ),
				'param_name'  => 'units',
				'description' => __( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'authow' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Options', 'authow' ),
				'param_name' => 'options',
				'value'      => array(
					__( 'Add stripes', 'authow' )                                          => 'striped',
					__( 'Add animation (Note: visible only with striped bar).', 'authow' ) => 'animated',
				),
			)
		),
		array(
			array(
				'type'             => 'textfield',
				'param_name'       => 'progress_typo_heading',
				'heading'          => esc_html__( 'Progress Bar', 'authow' ),
				'value'            => '',
				'group'            => $group_color,
				'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => __( 'Bar custom text color', 'authow' ),
				'param_name'  => 'bar_textcolor',
				'description' => __( 'Select custom text color for bars.', 'authow' ),
				'group'       => $group_color,
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => __( 'Bar process run custom background color', 'authow' ),
				'param_name'  => 'bar_run_bgcolor',
				'description' => __( 'Select custom background color for bars.', 'authow' ),
				'group'       => $group_color,
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => __( 'Bar custom background color', 'authow' ),
				'param_name'  => 'bar_bgcolor',
				'description' => __( 'Select custom background color for bars.', 'authow' ),
				'group'       => $group_color,
			),
		),
		Goso_Vc_Params_Helper::extra_params()
	)
) );
