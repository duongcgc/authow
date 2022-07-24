<?php
if ( ! function_exists( 'goso_builder_fonts_url' ) ) {
	function goso_builder_fonts_url( $data = 'normal' ) {
		$font_url = '';

		$array_fonts       = [];
		$array_get         = [];
		$array_options     = [];
		$array_earlyaccess = [];

		$font_settings = [
			'goso_header_pb_main_menu_goso_font_for_menu',
			'goso_header_pb_logo_goso_font_for_title',
			'goso_header_pb_logo_mobile_goso_font_for_title',
			'goso_header_pb_logo_sidebar_goso_font_for_title',
			'goso_header_pb_logo_sticky_goso_font_for_title',
			'goso_header_pb_logo_goso_font_for_slogan',
			'goso_header_pb_logo_mobile_goso_font_for_slogan',
			'goso_header_pb_logo_sidebar_goso_font_for_slogan',
			'goso_header_pb_logo_sticky_goso_font_for_slogan',
			'goso_header_pb_second_menu_goso_font_for_menu',
			'goso_header_pb_third_menu_goso_font_for_menu',
			'goso_header_pb_dropdown_menu_goso_font_for_menu',
			'goso_header_pb_login_register_goso_font_login_text',
			'goso_header_pb_button_font',
			'goso_header_pb_button_2_font',
			'goso_header_pb_button_3_font',
			'goso_header_pb_button_mobile_font',
			'goso_header_pb_button_mobile_1_font',
			'goso_header_pb_news_ticker_font'
		];

		$exlude_fonts         = array_merge( goso_get_custom_fonts(), goso_font_browser() );
		$default_loaded_fonts = goso_fonts_url( 'normalarray' );
		if ( is_array( $default_loaded_fonts ) && ! empty( $default_loaded_fonts ) ) {
			$exlude_fonts = array_merge( $exlude_fonts, $default_loaded_fonts );
		}
		$earlyaccess_loaded_fonts = goso_fonts_url( 'earlyaccess' );
		if ( is_array( $earlyaccess_loaded_fonts ) && ! empty( $earlyaccess_loaded_fonts ) ) {
			$exlude_fonts = array_merge( $exlude_fonts, $earlyaccess_loaded_fonts );
		}

		foreach ( $font_settings as $font ) {
			$font = goso_get_builder_mod( $font );
			if ( $font && ! in_array( $font, $exlude_fonts ) ) {
				$array_options[] = $font;
			}
		}

		if ( ! empty( $array_options ) ) {
			$font_earlyaccess_keys = [];
			if ( function_exists( 'goso_font_google_earlyaccess' ) ) {
				$font_earlyaccess_keys = array_keys( goso_font_google_earlyaccess() );
			}

			foreach ( $array_options as $font ) {
				if ( ! in_array( $font, $font_earlyaccess_keys ) ) {
					$font_family       = str_replace( '"', '', $font );
					$font_family_explo = explode( ", ", $font_family );
					$array_get[]       = isset( $font_family_explo[0] ) ? $font_family_explo[0] : '';
				} else {
					$font_family       = str_replace( '"', '', $font );
					$font_family_explo = explode( ", ", $font_family );
					if ( isset( $font_family_explo[0] ) ) {
						$font_earlyaccess_name = strtolower( str_replace( ' ', '', $font_family_explo[0] ) );
						$array_earlyaccess[]   = $font_earlyaccess_name;
					}
				}
			}
		}
		$array_end = array_unique( array_merge( $array_fonts, $array_get ), SORT_REGULAR );

		$string_end = implode( ':300,300italic,400,400italic,500,500italic,700,700italic,800,800italic|', $array_end );

		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'authow' ) && ! empty( $array_options ) ) {
			$font_url = add_query_arg( array(
				'family'  => urlencode( $string_end . ':300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,cyrillic-ext,greek,greek-ext,latin-ext' ),
				'display' => 'swap',
			), "https://fonts.googleapis.com/css" );
		}

		if ( $data == 'earlyaccess' ) {
			return $array_earlyaccess;
		} else {
			return $font_url;
		}
	}
}

add_action( 'authow_theme/custom_css', 'goso_builder_customizer_css' );
function goso_builder_customizer_css() {
	$block_settings        = [ 'topblock', 'topbar', 'midbar', 'bottombar', 'bottomblock' ];
	$sticky_block_settings = [ 'top', 'mid', 'bottom' ];
	$mobile_block_settings = [ 'topbar', 'midbar', 'bottombar' ];
	$return                = $out = '';
	foreach ( $block_settings as $area ) {
		$return .= goso_builder_get_area_css( $area, 'desktop', 'header' );
	}
	foreach ( $sticky_block_settings as $sticky_area ) {
		$return .= goso_builder_get_area_css( $sticky_area, 'sticky', 'header_sticky' );
	}
	foreach ( $mobile_block_settings as $mobile_area ) {
		$return .= goso_builder_get_area_css( $mobile_area, 'mobile', 'header_mobile' );
	}

	// General header
	$header_general_spacing = goso_get_builder_mod( 'goso_header_spacing_setting' );
	$out                    .= '.goso_header.goso-header-builder.main-builder-header{';
	$out                    .= goso_builder_spacing_extract_data( $header_general_spacing );
	$out                    .= '}';

	// Desktop Logo
	$custom_logo_mw                     = goso_get_builder_mod( 'goso_header_pb_logo_size_logo_w' );
	$custom_logo_mmw                    = goso_get_builder_mod( 'goso_header_pb_logo_size_logo_mw' );
	$custom_logo_mh                     = goso_get_builder_mod( 'goso_header_pb_logo_size_logo_h' );
	$custom_logo_mmh                    = goso_get_builder_mod( 'goso_header_pb_logo_size_logo_mh' );
	$custom_logo_msw                    = goso_get_builder_mod( 'goso_header_pb_logo_size_logo_sw' );
	$custom_logo_msh                    = goso_get_builder_mod( 'goso_header_pb_logo_size_logo_sh' );
	$custom_logo_fontsize_logo          = goso_get_builder_mod( 'goso_header_pb_logo_font_size_logo' );
	$custom_logo_color_logo             = goso_get_builder_mod( 'goso_header_pb_logo_color_logo' );
	$custom_logo_fontsize_m_logo        = goso_get_builder_mod( 'goso_header_pb_logo_font_size_m_logo' );
	$custom_logo_fontface_logo          = goso_get_builder_mod( 'goso_header_pb_logo_goso_font_for_title' );
	$custom_logo_fontweight_logo        = goso_get_builder_mod( 'goso_header_pb_logo_goso_font_weight_title' );
	$custom_logo_fontstyle_logo         = goso_get_builder_mod( 'goso_header_pb_logo_goso_font_style_title' );
	$custom_logo_fontsize_slogan_logo   = goso_get_builder_mod( 'goso_header_pb_logo_font_size_slogan' );
	$custom_logo_color_slogan_logo      = goso_get_builder_mod( 'goso_header_pb_logo_color_slogan' );
	$custom_logo_fontsize_slogan_m_logo = goso_get_builder_mod( 'goso_header_pb_logo_font_size_m_slogan' );
	$custom_logo_fontface_slogan_logo   = goso_get_builder_mod( 'goso_header_pb_logo_goso_font_for_slogan' );
	$custom_logo_fontweight_slogan_logo = goso_get_builder_mod( 'goso_header_pb_logo_goso_font_weight_slogan' );
	$custom_logo_fontstyle_slogan_logo  = goso_get_builder_mod( 'goso_header_pb_logo_goso_font_style_slogan' );

	$out .= '.goso-header-image-logo,.goso-header-text-logo{';
	if ( ! empty( $custom_logo_fontsize_logo ) ) {
		$out .= '--pchb-logo-title-size:' . $custom_logo_fontsize_logo . 'px;';
	}
	if ( ! empty( $custom_logo_color_logo ) ) {
		$out .= '--pchb-logo-title-color:' . $custom_logo_color_logo . ';';
	}
	if ( ! empty( $custom_logo_color_slogan_logo ) ) {
		$out .= '--pchb-logo-slogan-color:' . $custom_logo_color_slogan_logo . ';';
	}
	if ( ! empty( $custom_logo_fontsize_m_logo ) ) {
		$out .= '--pchb-logo-title-m-size:' . $custom_logo_fontsize_m_logo . 'px;';
	}
	if ( ! empty( $custom_logo_fontface_logo ) ) {
		$out .= '--pchb-logo-title-font:' . goso_builder_get_font_data( $custom_logo_fontface_logo ) . ';';
	}
	if ( ! empty( $custom_logo_fontweight_logo ) ) {
		$out .= '--pchb-logo-title-fw:' . $custom_logo_fontweight_logo . ';';
	}
	if ( ! empty( $custom_logo_fontstyle_logo ) ) {
		$out .= '--pchb-logo-title-fs:' . $custom_logo_fontstyle_logo . ';';
	}
	if ( ! empty( $custom_logo_fontsize_slogan_logo ) ) {
		$out .= '--pchb-logo-slogan-size:' . $custom_logo_fontsize_slogan_logo . 'px;';
	}
	if ( ! empty( $custom_logo_fontsize_slogan_m_logo ) ) {
		$out .= '--pchb-logo-slogan-m-size:' . $custom_logo_fontsize_slogan_m_logo . 'px;';
	}
	if ( ! empty( $custom_logo_fontface_slogan_logo ) ) {
		$out .= '--pchb-logo-slogan-font:' . $custom_logo_fontface_slogan_logo . ';';
	}
	if ( ! empty( $custom_logo_fontweight_slogan_logo ) ) {
		$out .= '--pchb-logo-slogan-fw:' . $custom_logo_fontweight_slogan_logo . ';';
	}
	if ( ! empty( $custom_logo_fontstyle_slogan_logo ) ) {
		$out .= '--pchb-logo-slogan-fs:' . $custom_logo_fontstyle_slogan_logo . ';';
	}
	$out .= '}';

	$out .= '.pc-logo-desktop.goso-header-image-logo img{';
	if ( ! empty( $custom_logo_mw ) ) {
		$out .= 'max-width:' . $custom_logo_mw . 'px;';
	}
	if ( ! empty( $custom_logo_mh ) ) {
		$out .= 'max-height:' . $custom_logo_mh . 'px;';
	}
	$out .= '}';

	$out .= '@media only screen and (max-width: 767px){.goso_navbar_mobile .goso-header-image-logo img{';
	if ( ! empty( $custom_logo_mmw ) ) {
		$out .= 'max-width:' . $custom_logo_mmw . 'px;';
	}
	if ( ! empty( $custom_logo_mmh ) ) {
		$out .= 'max-height:' . $custom_logo_mmh . 'px;';
	}
	$out .= '}}';

	$out .= '.goso_builder_sticky_header_desktop .goso-header-image-logo img{';
	if ( ! empty( $custom_logo_msw ) ) {
		$out .= 'max-width:' . $custom_logo_msw . 'px;';
	}
	if ( ! empty( $custom_logo_msh ) ) {
		$out .= 'max-height:' . $custom_logo_msh . 'px;';
	}
	$out .= '}';

	// Mobile Logo
	$custom_m_logo_mw                     = goso_get_builder_mod( 'goso_header_pb_logo_mobile_size_logo_mw' );
	$custom_m_logo_mh                     = goso_get_builder_mod( 'goso_header_pb_logo_mobile_size_logo_mh' );
	$custom_m_logo_msw                    = goso_get_builder_mod( 'goso_header_pb_logo_mobile_size_logo_sw' );
	$custom_m_logo_msh                    = goso_get_builder_mod( 'goso_header_pb_logo_mobile_size_logo_sh' );
	$custom_m_logo_fontsize_logo          = goso_get_builder_mod( 'goso_header_pb_logo_mobile_font_size_logo' );
	$custom_m_logo_color_logo             = goso_get_builder_mod( 'goso_header_pb_logo_mobile_color_logo' );
	$custom_m_logo_fontsize_m_logo        = goso_get_builder_mod( 'goso_header_pb_logo_mobile_font_size_m_logo' );
	$custom_m_logo_fontface_logo          = goso_get_builder_mod( 'goso_header_pb_logo_mobile_goso_font_for_title' );
	$custom_m_logo_fontweight_logo        = goso_get_builder_mod( 'goso_header_pb_logo_mobile_goso_font_weight_title' );
	$custom_m_logo_fontstyle_logo         = goso_get_builder_mod( 'goso_header_pb_logo_mobile_goso_font_style_title' );
	$custom_m_logo_fontsize_slogan_logo   = goso_get_builder_mod( 'goso_header_pb_logo_mobile_font_size_slogan' );
	$custom_m_logo_color_slogan_logo      = goso_get_builder_mod( 'goso_header_pb_logo_mobile_color_slogan' );
	$custom_m_logo_fontsize_slogan_m_logo = goso_get_builder_mod( 'goso_header_pb_logo_mobile_font_size_m_slogan' );
	$custom_m_logo_fontface_slogan_logo   = goso_get_builder_mod( 'goso_header_pb_logo_mobile_goso_font_for_slogan' );
	$custom_m_logo_fontweight_slogan_logo = goso_get_builder_mod( 'goso_header_pb_logo_mobile_goso_font_weight_slogan' );
	$custom_m_logo_fontstyle_slogan_logo  = goso_get_builder_mod( 'goso_header_pb_logo_mobile_goso_font_style_slogan' );

	$out .= '.goso_navbar_mobile .goso-header-text-logo{';
	if ( ! empty( $custom_m_logo_fontsize_logo ) ) {
		$out .= '--pchb-m-logo-title-size:' . $custom_m_logo_fontsize_logo . 'px;';
	}
	if ( ! empty( $custom_m_logo_color_logo ) ) {
		$out .= '--pchb-m-logo-title-color:' . $custom_m_logo_color_logo . ';';
	}
	if ( ! empty( $custom_m_logo_color_slogan_logo ) ) {
		$out .= '--pchb-m-logo-slogan-color:' . $custom_m_logo_color_slogan_logo . ';';
	}
	if ( ! empty( $custom_m_logo_fontsize_m_logo ) ) {
		$out .= '--pchb-m-logo-title-m-size:' . $custom_m_logo_fontsize_m_logo . 'px;';
	}
	if ( ! empty( $custom_m_logo_fontface_logo ) ) {
		$out .= '--pchb-m-logo-title-font:' . goso_builder_get_font_data( $custom_m_logo_fontface_logo ) . ';';
	}
	if ( ! empty( $custom_m_logo_fontweight_logo ) ) {
		$out .= '--pchb-m-logo-title-fw:' . $custom_m_logo_fontweight_logo . ';';
	}
	if ( ! empty( $custom_m_logo_fontstyle_logo ) ) {
		$out .= '--pchb-m-logo-title-fs:' . $custom_m_logo_fontstyle_logo . ';';
	}
	if ( ! empty( $custom_m_logo_fontsize_slogan_logo ) ) {
		$out .= '--pchb-m-logo-slogan-size:' . $custom_m_logo_fontsize_slogan_logo . 'px;';
	}
	if ( ! empty( $custom_m_logo_fontsize_slogan_m_logo ) ) {
		$out .= '--pchb-m-logo-slogan-m-size:' . $custom_m_logo_fontsize_slogan_m_logo . 'px;';
	}
	if ( ! empty( $custom_m_logo_fontface_slogan_logo ) ) {
		$out .= '--pchb-m-logo-slogan-font:' . $custom_m_logo_fontface_slogan_logo . ';';
	}
	if ( ! empty( $custom_m_logo_fontweight_slogan_logo ) ) {
		$out .= '--pchb-m-logo-slogan-fw:' . $custom_m_logo_fontweight_slogan_logo . ';';
	}
	if ( ! empty( $custom_m_logo_fontstyle_slogan_logo ) ) {
		$out .= '--pchb-m-logo-slogan-fs:' . $custom_m_logo_fontstyle_slogan_logo . ';';
	}
	$out .= '}';

	$out .= '.goso_navbar_mobile .goso-header-image-logo img{';
	if ( ! empty( $custom_m_logo_mw ) ) {
		$out .= 'max-width:' . $custom_m_logo_mw . 'px;';
	}
	if ( ! empty( $custom_m_logo_mh ) ) {
		$out .= 'max-height:' . $custom_m_logo_mh . 'px;';
	}
	$out .= '}';

	$out .= '.goso_navbar_mobile .sticky-enable .goso-header-image-logo img{';
	if ( ! empty( $custom_m_logo_msw ) ) {
		$out .= 'max-width:' . $custom_m_logo_msw . 'px;';
	}
	if ( ! empty( $custom_m_logo_msh ) ) {
		$out .= 'max-height:' . $custom_m_logo_msh . 'px;';
	}
	$out .= '}';

	// Mobile Sidebar Logo
	$custom_ms_logo_mw                     = goso_get_builder_mod( 'goso_header_pb_logo_sidebar_size_logo_mw' );
	$custom_ms_logo_mh                     = goso_get_builder_mod( 'goso_header_pb_logo_sidebar_size_logo_mh' );
	$custom_ms_logo_fontsize_logo          = goso_get_builder_mod( 'goso_header_pb_logo_sidebar_font_size_logo' );
	$custom_ms_logo_color_logo             = goso_get_builder_mod( 'goso_header_pb_logo_sidebar_color_logo' );
	$custom_ms_logo_fontsize_m_logo        = goso_get_builder_mod( 'goso_header_pb_logo_sidebar_font_size_m_logo' );
	$custom_ms_logo_fontface_logo          = goso_get_builder_mod( 'goso_header_pb_logo_sidebar_goso_font_for_title' );
	$custom_ms_logo_fontweight_logo        = goso_get_builder_mod( 'goso_header_pb_logo_sidebar_goso_font_weight_title' );
	$custom_ms_logo_fontstyle_logo         = goso_get_builder_mod( 'goso_header_pb_logo_sidebar_goso_font_style_title' );
	$custom_ms_logo_fontsize_slogan_logo   = goso_get_builder_mod( 'goso_header_pb_logo_sidebar_font_size_slogan' );
	$custom_ms_logo_color_slogan_logo      = goso_get_builder_mod( 'goso_header_pb_logo_sidebar_color_slogan' );
	$custom_ms_logo_fontsize_slogan_m_logo = goso_get_builder_mod( 'goso_header_pb_logo_sidebar_font_size_m_slogan' );
	$custom_ms_logo_fontface_slogan_logo   = goso_get_builder_mod( 'goso_header_pb_logo_sidebar_goso_font_for_slogan' );
	$custom_ms_logo_fontweight_slogan_logo = goso_get_builder_mod( 'goso_header_pb_logo_sidebar_goso_font_weight_slogan' );
	$custom_ms_logo_fontstyle_slogan_logo  = goso_get_builder_mod( 'goso_header_pb_logo_sidebar_goso_font_style_slogan' );

	$out .= '.pb-logo-sidebar-mobile{';
	if ( ! empty( $custom_ms_logo_fontsize_logo ) ) {
		$out .= '--pchb-logo-sm-title-size:' . $custom_ms_logo_fontsize_logo . 'px;';
	}
	if ( ! empty( $custom_ms_logo_color_logo ) ) {
		$out .= '--pchb-logo-sm-title-color:' . $custom_ms_logo_color_logo . ';';
	}
	if ( ! empty( $custom_ms_logo_color_slogan_logo ) ) {
		$out .= '--pchb-logo-sm-slogan-color:' . $custom_ms_logo_color_slogan_logo . ';';
	}
	if ( ! empty( $custom_ms_logo_fontsize_m_logo ) ) {
		$out .= '--pchb-logo-sm-title-m-size:' . $custom_ms_logo_fontsize_m_logo . 'px;';
	}
	if ( ! empty( $custom_ms_logo_fontface_logo ) ) {
		$out .= '--pchb-logo-sm-title-font:' . goso_builder_get_font_data( $custom_ms_logo_fontface_logo ) . ';';
	}
	if ( ! empty( $custom_ms_logo_fontweight_logo ) ) {
		$out .= '--pchb-logo-sm-title-fw:' . $custom_ms_logo_fontweight_logo . ';';
	}
	if ( ! empty( $custom_ms_logo_fontstyle_logo ) ) {
		$out .= '--pchb-logo-sm-title-fs:' . $custom_ms_logo_fontstyle_logo . ';';
	}
	if ( ! empty( $custom_ms_logo_fontsize_slogan_logo ) ) {
		$out .= '--pchb-logo-sm-slogan-size:' . $custom_ms_logo_fontsize_slogan_logo . 'px;';
	}
	if ( ! empty( $custom_ms_logo_fontsize_slogan_m_logo ) ) {
		$out .= '--pchb-logo-sm-slogan-m-size:' . $custom_ms_logo_fontsize_slogan_m_logo . 'px;';
	}
	if ( ! empty( $custom_ms_logo_fontface_slogan_logo ) ) {
		$out .= '--pchb-logo-sm-slogan-font:' . $custom_ms_logo_fontface_slogan_logo . ';';
	}
	if ( ! empty( $custom_ms_logo_fontweight_slogan_logo ) ) {
		$out .= '--pchb-logo-sm-slogan-fw:' . $custom_ms_logo_fontweight_slogan_logo . ';';
	}
	if ( ! empty( $custom_ms_logo_fontstyle_slogan_logo ) ) {
		$out .= '--pchb-logo-sm-slogan-fs:' . $custom_ms_logo_fontstyle_slogan_logo . ';';
	}
	$out .= '}';

	$out .= '.pc-builder-element.pb-logo-sidebar-mobile img{';
	if ( ! empty( $custom_ms_logo_mw ) ) {
		$out .= 'max-width:' . $custom_ms_logo_mw . 'px;';
	}
	if ( ! empty( $custom_ms_logo_mh ) ) {
		$out .= 'max-height:' . $custom_ms_logo_mh . 'px;';
	}
	$out .= '}';

	// Sticky Logo
	$custom_s_logo_mw                     = goso_get_builder_mod( 'goso_header_pb_logo_sticky_size_logo_w' );
	$custom_s_logo_mh                     = goso_get_builder_mod( 'goso_header_pb_logo_sticky_size_logo_h' );
	$custom_s_logo_fontsize_logo          = goso_get_builder_mod( 'goso_header_pb_logo_sticky_font_size_logo' );
	$custom_s_logo_color_logo             = goso_get_builder_mod( 'goso_header_pb_logo_sticky_color_logo' );
	$custom_s_logo_fontsize_m_logo        = goso_get_builder_mod( 'goso_header_pb_logo_sticky_font_size_m_logo' );
	$custom_s_logo_fontface_logo          = goso_get_builder_mod( 'goso_header_pb_logo_sticky_goso_font_for_title' );
	$custom_s_logo_fontweight_logo        = goso_get_builder_mod( 'goso_header_pb_logo_sticky_goso_font_weight_title' );
	$custom_s_logo_fontstyle_logo         = goso_get_builder_mod( 'goso_header_pb_logo_sticky_goso_font_style_title' );
	$custom_s_logo_fontsize_slogan_logo   = goso_get_builder_mod( 'goso_header_pb_logo_sticky_font_size_slogan' );
	$custom_s_logo_color_slogan_logo      = goso_get_builder_mod( 'goso_header_pb_logo_sticky_color_slogan' );
	$custom_s_logo_fontsize_slogan_m_logo = goso_get_builder_mod( 'goso_header_pb_logo_sticky_font_size_m_slogan' );
	$custom_s_logo_fontface_slogan_logo   = goso_get_builder_mod( 'goso_header_pb_logo_sticky_goso_font_for_slogan' );
	$custom_s_logo_fontweight_slogan_logo = goso_get_builder_mod( 'goso_header_pb_logo_sticky_goso_font_weight_slogan' );
	$custom_s_logo_fontstyle_slogan_logo  = goso_get_builder_mod( 'goso_header_pb_logo_sticky_goso_font_style_slogan' );

	$out .= '.pc-logo-sticky{';
	if ( ! empty( $custom_s_logo_fontsize_logo ) ) {
		$out .= '--pchb-logo-s-title-size:' . $custom_s_logo_fontsize_logo . 'px;';
	}
	if ( ! empty( $custom_s_logo_color_logo ) ) {
		$out .= '--pchb-logo-s-title-color:' . $custom_s_logo_color_logo . ';';
	}
	if ( ! empty( $custom_s_logo_color_slogan_logo ) ) {
		$out .= '--pchb-logo-s-slogan-color:' . $custom_s_logo_color_slogan_logo . ';';
	}
	if ( ! empty( $custom_s_logo_fontsize_m_logo ) ) {
		$out .= '--pchb-logo-s-title-m-size:' . $custom_s_logo_fontsize_m_logo . 'px;';
	}
	if ( ! empty( $custom_s_logo_fontface_logo ) ) {
		$out .= '--pchb-logo-s-title-font:' . goso_builder_get_font_data( $custom_s_logo_fontface_logo ) . ';';
	}
	if ( ! empty( $custom_s_logo_fontweight_logo ) ) {
		$out .= '--pchb-logo-s-title-fw:' . $custom_s_logo_fontweight_logo . ';';
	}
	if ( ! empty( $custom_s_logo_fontstyle_logo ) ) {
		$out .= '--pchb-logo-s-title-fs:' . $custom_s_logo_fontstyle_logo . ';';
	}
	if ( ! empty( $custom_s_logo_fontsize_slogan_logo ) ) {
		$out .= '--pchb-logo-s-slogan-size:' . $custom_s_logo_fontsize_slogan_logo . 'px;';
	}
	if ( ! empty( $custom_s_logo_fontsize_slogan_m_logo ) ) {
		$out .= '--pchb-logo-s-slogan-m-size:' . $custom_s_logo_fontsize_slogan_m_logo . 'px;';
	}
	if ( ! empty( $custom_s_logo_fontface_slogan_logo ) ) {
		$out .= '--pchb-logo-s-slogan-font:' . $custom_s_logo_fontface_slogan_logo . ';';
	}
	if ( ! empty( $custom_s_logo_fontweight_slogan_logo ) ) {
		$out .= '--pchb-logo-s-slogan-fw:' . $custom_s_logo_fontweight_slogan_logo . ';';
	}
	if ( ! empty( $custom_s_logo_fontstyle_slogan_logo ) ) {
		$out .= '--pchb-logo-s-slogan-fs:' . $custom_s_logo_fontstyle_slogan_logo . ';';
	}
	$out .= '}';

	$out .= '.pc-builder-element.pc-logo-sticky.pc-logo img{';
	if ( ! empty( $custom_s_logo_mw ) ) {
		$out .= 'max-width:' . $custom_s_logo_mw . 'px;';
	}
	if ( ! empty( $custom_s_logo_mh ) ) {
		$out .= 'max-height:' . $custom_s_logo_mh . 'px;';
	}
	$out .= '}';

	// Main Menu
	$main_menu_font        = goso_get_builder_mod( 'goso_header_pb_main_menu_goso_font_for_menu' );
	$main_menu_font_weight = goso_get_builder_mod( 'goso_header_pb_main_menu_goso_font_weight_menu' );
	$main_menu_fs          = goso_get_builder_mod( 'goso_header_pb_main_menu_goso_font_size_lv1' );
	$main_menu_lh          = goso_get_builder_mod( 'goso_header_pb_main_menu_goso_line_height_lv1' );
	$main_menu_fs_drop     = goso_get_builder_mod( 'goso_header_pb_main_menu_goso_font_size_drop' );
	$main_menu_tt          = goso_get_builder_mod( 'goso_header_pb_main_menu_goso_menu_uppercase' );
	$main_menu_mg          = goso_get_builder_mod( 'goso_header_pb_main_menu_goso_lv1_item_spacing' );

	$out .= '.pc-builder-element.pc-main-menu{';
	if ( ! empty( $main_menu_font ) ) {
		$out .= '--pchb-main-menu-font:' . goso_builder_get_font_data( $main_menu_font ) . ';';
	}
	if ( ! empty( $main_menu_font_weight ) ) {
		$out .= '--pchb-main-menu-fw:' . $main_menu_font_weight . ';';
	}
	if ( ! empty( $main_menu_fs ) ) {
		$out .= '--pchb-main-menu-fs:' . $main_menu_fs . 'px;';
	}
	if ( ! empty( $main_menu_fs_drop ) ) {
		$out .= '--pchb-main-menu-fs_l2:' . $main_menu_fs_drop . 'px;';
	}
	if ( ! empty( $main_menu_mg ) ) {
		$out .= '--pchb-main-menu-mg:' . $main_menu_mg . 'px;';
	}
	if ( ! empty( $main_menu_lh ) ) {
		$out .= '--pchb-main-menu-lh:' . $main_menu_lh . 'px;';
	}
	if ( 'enable' == $main_menu_tt ) {
		$out .= '--pchb-main-menu-tt: none;';
	}

	$out .= '}';

	// Secondary Menu
	$second_menu_font        = goso_get_builder_mod( 'goso_header_pb_second_menu_goso_font_for_menu' );
	$second_menu_font_weight = goso_get_builder_mod( 'goso_header_pb_second_menu_goso_font_weight_menu' );
	$second_menu_fs          = goso_get_builder_mod( 'goso_header_pb_second_menu_goso_font_size_lv1' );
	$second_menu_lh          = goso_get_builder_mod( 'goso_header_pb_second_menu_goso_line_height_lv1' );
	$second_menu_fs_drop     = goso_get_builder_mod( 'goso_header_pb_second_menu_goso_font_size_drop' );
	$second_menu_tt          = goso_get_builder_mod( 'goso_header_pb_second_menu_goso_menu_uppercase' );
	$second_menu_mg          = goso_get_builder_mod( 'goso_header_pb_second_menu_goso_lv1_item_spacing' );

	$out .= '.pc-builder-element.pc-second-menu{';
	if ( ! empty( $second_menu_font ) ) {
		$out .= '--pchb-second-menu-font:' . goso_builder_get_font_data( $second_menu_font ) . ';';
	}
	if ( ! empty( $second_menu_font_weight ) ) {
		$out .= '--pchb-second-menu-fw:' . $second_menu_font_weight . ';';
	}
	if ( ! empty( $second_menu_fs ) ) {
		$out .= '--pchb-second-menu-fs:' . $second_menu_fs . 'px;';
	}
	if ( ! empty( $second_menu_lh ) ) {
		$out .= '--pchb-second-menu-lh:' . $second_menu_lh . 'px;';
	}
	if ( ! empty( $second_menu_fs_drop ) ) {
		$out .= '--pchb-second-menu-fs_l2:' . $second_menu_fs_drop . 'px;';
	}
	if ( ! empty( $second_menu_mg ) ) {
		$out .= '--pchb-second-menu-mg:' . $second_menu_mg . 'px;';
	}
	if ( 'enable' == $second_menu_tt ) {
		$out .= '--pchb-second-menu-tt: none;';
	}
	$out .= '}';

	// Third Menu
	$third_menu_font        = goso_get_builder_mod( 'goso_header_pb_third_menu_goso_font_for_menu' );
	$third_menu_font_weight = goso_get_builder_mod( 'goso_header_pb_third_menu_goso_font_weight_menu' );
	$third_menu_fs          = goso_get_builder_mod( 'goso_header_pb_third_menu_goso_font_size_lv1' );
	$third_menu_lh          = goso_get_builder_mod( 'goso_header_pb_third_menu_goso_line_height_lv1' );
	$third_menu_fs_drop     = goso_get_builder_mod( 'goso_header_pb_third_menu_goso_font_size_drop' );
	$third_menu_tt          = goso_get_builder_mod( 'goso_header_pb_third_menu_goso_menu_uppercase' );
	$third_menu_mg          = goso_get_builder_mod( 'goso_header_pb_third_menu_goso_lv1_item_spacing' );

	$out .= '.pc-builder-element.pc-third-menu{';
	if ( ! empty( $third_menu_font ) ) {
		$out .= '--pchb-third-menu-font:' . goso_builder_get_font_data( $third_menu_font ) . ';';
	}
	if ( ! empty( $third_menu_font_weight ) ) {
		$out .= '--pchb-third-menu-fw:' . $third_menu_font_weight . ';';
	}
	if ( ! empty( $third_menu_fs ) ) {
		$out .= '--pchb-third-menu-fs:' . $third_menu_fs . 'px;';
	}
	if ( ! empty( $third_menu_lh ) ) {
		$out .= '--pchb-third-menu-lh:' . $third_menu_lh . 'px;';
	}
	if ( ! empty( $third_menu_fs_drop ) ) {
		$out .= '--pchb-third-menu-fs_l2:' . $third_menu_fs_drop . 'px;';
	}
	if ( ! empty( $third_menu_mg ) ) {
		$out .= '--pchb-third-menu-mg:' . $third_menu_mg . 'px;';
	}
	if ( 'enable' == $third_menu_tt ) {
		$out .= '--pchb-third-menu-tt: none;';
	}

	$out .= '}';

	// Button 1
	$button_1_spacing         = goso_get_builder_mod( 'goso_header_pb_button_spacing_setting' );
	$button_1_border_color    = goso_get_builder_mod( 'goso_header_pb_button_border_color' );
	$button_1_border_hv_color = goso_get_builder_mod( 'goso_header_pb_button_border_hv_color' );
	$button_1_bg_color        = goso_get_builder_mod( 'goso_header_pb_button_bg_color' );
	$button_1_bg_hv_color     = goso_get_builder_mod( 'goso_header_pb_button_bg_hv_color' );
	$button_1_txt_color       = goso_get_builder_mod( 'goso_header_pb_button_txt_color' );
	$button_1_txt_hv_color    = goso_get_builder_mod( 'goso_header_pb_button_txt_hv_color' );

	$out .= '.goso-builder.goso-builder-button.button-1{';
	if ( ! empty( $button_1_spacing ) ) {
		$out .= goso_builder_spacing_extract_data( $button_1_spacing );
	}
	if ( ! empty( $button_1_border_color ) ) {
		$out .= 'border-color:' . $button_1_border_color . ';';
	}
	if ( ! empty( $button_1_bg_color ) ) {
		$out .= 'background-color:' . $button_1_bg_color . ';';
	}
	if ( ! empty( $button_1_txt_color ) ) {
		$out .= 'color:' . $button_1_txt_color . ';';
	}
	$out .= '}';

	$out .= '.goso-builder.goso-builder-button.button-1:hover{';
	if ( ! empty( $button_1_border_hv_color ) ) {
		$out .= 'border-color:' . $button_1_border_hv_color . ';';
	}
	if ( ! empty( $button_1_bg_hv_color ) ) {
		$out .= 'background-color:' . $button_1_bg_hv_color . ';';
	}
	if ( ! empty( $button_1_txt_hv_color ) ) {
		$out .= 'color:' . $button_1_txt_hv_color . ';';
	}
	$out .= '}';

	// Button 2
	$button_2_spacing         = goso_get_builder_mod( 'goso_header_pb_button_2_spacing_setting' );
	$button_2_border_color    = goso_get_builder_mod( 'goso_header_pb_button_2_border_color' );
	$button_2_border_hv_color = goso_get_builder_mod( 'goso_header_pb_button_2_border_hv_color' );
	$button_2_bg_color        = goso_get_builder_mod( 'goso_header_pb_button_2_bg_color' );
	$button_2_bg_hv_color     = goso_get_builder_mod( 'goso_header_pb_button_2_bg_hv_color' );
	$button_2_txt_color       = goso_get_builder_mod( 'goso_header_pb_button_2_txt_color' );
	$button_2_txt_hv_color    = goso_get_builder_mod( 'goso_header_pb_button_2_txt_hv_color' );

	$out .= '.goso-builder.goso-builder-button.button-2{';
	if ( ! empty( $button_2_spacing ) ) {
		$out .= goso_builder_spacing_extract_data( $button_2_spacing );
	}
	if ( ! empty( $button_2_border_color ) ) {
		$out .= 'border-color:' . $button_2_border_color . ';';
	}
	if ( ! empty( $button_2_bg_color ) ) {
		$out .= 'background-color:' . $button_2_bg_color . ';';
	}
	if ( ! empty( $button_2_txt_color ) ) {
		$out .= 'color:' . $button_2_txt_color . ';';
	}
	$out .= '}';

	$out .= '.goso-builder.goso-builder-button.button-2:hover{';
	if ( ! empty( $button_2_border_hv_color ) ) {
		$out .= 'border-color:' . $button_2_border_hv_color . ';';
	}
	if ( ! empty( $button_2_bg_hv_color ) ) {
		$out .= 'background-color:' . $button_2_bg_hv_color . ';';
	}
	if ( ! empty( $button_2_txt_hv_color ) ) {
		$out .= 'color:' . $button_2_txt_hv_color . ';';
	}
	$out .= '}';

	// Button 3
	$button_3_spacing         = goso_get_builder_mod( 'goso_header_pb_button_3_spacing_setting' );
	$button_3_border_color    = goso_get_builder_mod( 'goso_header_pb_button_3_border_color' );
	$button_3_border_hv_color = goso_get_builder_mod( 'goso_header_pb_button_3_border_hv_color' );
	$button_3_bg_color        = goso_get_builder_mod( 'goso_header_pb_button_3_bg_color' );
	$button_3_bg_hv_color     = goso_get_builder_mod( 'goso_header_pb_button_3_bg_hv_color' );
	$button_3_txt_color       = goso_get_builder_mod( 'goso_header_pb_button_3_txt_color' );
	$button_3_txt_hv_color    = goso_get_builder_mod( 'goso_header_pb_button_3_txt_hv_color' );

	$out .= '.goso-builder.goso-builder-button.button-3{';
	if ( ! empty( $button_3_spacing ) ) {
		$out .= goso_builder_spacing_extract_data( $button_3_spacing );
	}
	if ( ! empty( $button_3_border_color ) ) {
		$out .= 'border-color:' . $button_3_border_color . ';';
	}
	if ( ! empty( $button_3_bg_color ) ) {
		$out .= 'background-color:' . $button_3_bg_color . ';';
	}
	if ( ! empty( $button_3_txt_color ) ) {
		$out .= 'color:' . $button_3_txt_color . ';';
	}
	$out .= '}';

	$out .= '.goso-builder.goso-builder-button.button-3:hover{';
	if ( ! empty( $button_3_border_hv_color ) ) {
		$out .= 'border-color:' . $button_3_border_hv_color . ';';
	}
	if ( ! empty( $button_3_bg_hv_color ) ) {
		$out .= 'background-color:' . $button_3_bg_hv_color . ';';
	}
	if ( ! empty( $button_3_txt_hv_color ) ) {
		$out .= 'color:' . $button_3_txt_hv_color . ';';
	}
	$out .= '}';

	// Button Mobile
	$button_m_1_spacing         = goso_get_builder_mod( 'goso_header_pb_button_mobile_spacing_setting' );
	$button_m_1_border_color    = goso_get_builder_mod( 'goso_header_pb_button_mobile_border_color' );
	$button_m_1_border_hv_color = goso_get_builder_mod( 'goso_header_pb_button_mobile_border_hv_color' );
	$button_m_1_bg_color        = goso_get_builder_mod( 'goso_header_pb_button_mobile_bg_color' );
	$button_m_1_bg_hv_color     = goso_get_builder_mod( 'goso_header_pb_button_mobile_bg_hv_color' );
	$button_m_1_txt_color       = goso_get_builder_mod( 'goso_header_pb_button_mobile_txt_color' );
	$button_m_1_txt_hv_color    = goso_get_builder_mod( 'goso_header_pb_button_mobile_txt_hv_color' );

	$out .= '.goso-builder.goso-builder-button.button-mobile-1{';
	if ( ! empty( $button_m_1_spacing ) ) {
		$out .= goso_builder_spacing_extract_data( $button_m_1_spacing );
	}
	if ( ! empty( $button_m_1_border_color ) ) {
		$out .= 'border-color:' . $button_m_1_border_color . ';';
	}
	if ( ! empty( $button_m_1_bg_color ) ) {
		$out .= 'background-color:' . $button_m_1_bg_color . ';';
	}
	if ( ! empty( $button_m_1_txt_color ) ) {
		$out .= 'color:' . $button_m_1_txt_color . ';';
	}
	$out .= '}';

	$out .= '.goso-builder.goso-builder-button.button-mobile-1:hover{';
	if ( ! empty( $button_m_1_border_hv_color ) ) {
		$out .= 'border-color:' . $button_m_1_border_hv_color . ';';
	}
	if ( ! empty( $button_m_1_bg_hv_color ) ) {
		$out .= 'background-color:' . $button_m_1_bg_hv_color . ';';
	}
	if ( ! empty( $button_m_1_txt_hv_color ) ) {
		$out .= 'color:' . $button_m_1_txt_hv_color . ';';
	}
	$out .= '}';

	// Button Mobile 2
	$button_m_2_spacing         = goso_get_builder_mod( 'goso_header_pb_button_mobile_2_spacing_setting' );
	$button_m_2_border_color    = goso_get_builder_mod( 'goso_header_pb_button_mobile_2_border_color' );
	$button_m_2_border_hv_color = goso_get_builder_mod( 'goso_header_pb_button_mobile_2_border_hv_color' );
	$button_m_2_bg_color        = goso_get_builder_mod( 'goso_header_pb_button_mobile_2_bg_color' );
	$button_m_2_bg_hv_color     = goso_get_builder_mod( 'goso_header_pb_button_mobile_2_bg_hv_color' );
	$button_m_2_txt_color       = goso_get_builder_mod( 'goso_header_pb_button_mobile_2_txt_color' );
	$button_m_2_txt_hv_color    = goso_get_builder_mod( 'goso_header_pb_button_mobile_2_txt_hv_color' );

	$out .= '.goso-builder.goso-builder-button.button-2{';
	if ( ! empty( $button_m_2_spacing ) ) {
		$out .= goso_builder_spacing_extract_data( $button_m_2_spacing );
	}
	if ( ! empty( $button_m_2_border_color ) ) {
		$out .= 'border-color:' . $button_m_2_border_color . ';';
	}
	if ( ! empty( $button_m_2_bg_color ) ) {
		$out .= 'background-color:' . $button_m_2_bg_color . ';';
	}
	if ( ! empty( $button_m_2_txt_color ) ) {
		$out .= 'color:' . $button_m_2_txt_color . ';';
	}
	$out .= '}';

	$out .= '.goso-builder.goso-builder-button.button-2:hover{';
	if ( ! empty( $button_m_2_border_hv_color ) ) {
		$out .= 'border-color:' . $button_m_2_border_hv_color . ';';
	}
	if ( ! empty( $button_m_2_bg_hv_color ) ) {
		$out .= 'background-color:' . $button_m_2_bg_hv_color . ';';
	}
	if ( ! empty( $button_m_2_txt_hv_color ) ) {
		$out .= 'color:' . $button_m_2_txt_hv_color . ';';
	}
	$out .= '}';

	// mobile sidebar

	$out .= goso_builder_get_area_css( 'sidebar', '', 'header_mobile', '.goso-builder-mobile-sidebar-nav.goso-menu-hbg' );

	// Mobile Menu

	$dropdown_fn  = goso_get_builder_mod( 'goso_header_pb_dropdown_menu_goso_font_for_menu' );
	$dropdown_fw  = goso_get_builder_mod( 'goso_header_pb_dropdown_menu_goso_font_weight_menu' );
	$dropdown_lv1 = goso_get_builder_mod( 'goso_header_pb_dropdown_menu_goso_font_size_lv1' );
	$dropdown_lv2 = goso_get_builder_mod( 'goso_header_pb_dropdown_menu_goso_font_size_drop' );
	$dropdown_tt  = goso_get_builder_mod( 'goso_header_pb_dropdown_menu_goso_menu_uppercase' );

	$out .= '.pc-builder-menu.pc-dropdown-menu{';
	if ( ! empty( $dropdown_fn ) ) {
		$out .= '--pchb-dd-fn:' . goso_builder_get_font_data( $dropdown_fn ) . ';';
	}
	if ( ! empty( $dropdown_fw ) ) {
		$out .= '--pchb-dd-fw:' . $dropdown_fw . ';';
	}
	if ( ! empty( $dropdown_lv1 ) ) {
		$out .= '--pchb-dd-lv1:' . $dropdown_lv1 . 'px;';
	}
	if ( ! empty( $dropdown_lv2 ) ) {
		$out .= '--pchb-dd-lv2:' . $dropdown_lv2 . 'px;';
	}
	$out .= '}';

	if ( 'enable' == $dropdown_tt ) {
		$out .= '.pc-builder-menu.pc-dropdown-menu .menu li a{text-transform: none;}';
	}


	$element_spacings = [
		'goso_header_pb_block_spacing'                      => '.goso-header-builder .goso-header-block-1',
		'goso_header_pb_block_2_spacing'                    => '.goso-header-builder .goso-header-block-2',
		'goso_header_pb_cart_icon_section_spacing'          => '.goso-header-builder .pb-header-builder.cart-icon',
		'goso_header_pb_compare_icon_section_spacing'       => '.goso-header-builder .goso-builder-elements.compare-icon',
		'goso_header_pb_data_time_spacing'                  => '.goso-header-builder .goso-builder-element.goso-data-time-format',
		'goso_header_pb_dropdown_menu_spacing'              => '.pc-builder-element.pc-builder-menu.pc-dropdown-menu',
		'goso_header_pb_hamburger_menu_spacing'             => '.goso-header-builder .pc-builder-element.goso-menuhbg-wapper',
		'goso_header_pb_logo_spacing'                       => '.goso-header-builder .pc-builder-element.pc-logo',
		'goso_header_pb_main_menu_spacing'                  => '.goso-header-builder .pc-builder-element.pc-builder-menu',
		'goso_header_pb_mobile_menu_spacing'                => '.goso_navbar_mobile .navigation.mobile-menu',
		'goso_header_pb_news_ticker_spacing'                => '.goso-header-builder .goso-builder-element.pctopbar-item',
		'goso_header_search_spacing'                        => '.goso-header-builder .pc-builder-element.goso-top-search',
		'goso_header_pb_second_menu_spacing'                => '.goso-header-builder .pc-builder-element.pc-second-menu',
		'goso_header_pb_third_menu_spacing'                 => '.goso-header-builder .pc-builder-element.pc-third-menu',
		'goso_header_builder_pb_shortcode_spacing'          => '.goso-header-builder .goso-builder-element.goso-shortcodes',
		'goso_header_builder_pb_shortcode_2_spacing'        => '.goso-header-builder .goso-builder-element.goso-shortcodes-2',
		'goso_header_builder_pb_shortcode_3_spacing'        => '.goso-header-builder .goso-builder-element.goso-shortcodes-3',
		'goso_header_builder_pb_shortcode_mobile_spacing'   => '.goso_navbar_mobile .goso-builder-element.goso-shortcodes-mobile,.goso-header-builder .goso-builder-element.goso-shortcodes-mobile',
		'goso_header_pb_social_icon_section_spacing'        => '.goso-header-builder .header-social.goso-builder-element.desktop-social',
		'goso_header_pb_wishlist_icon_section_spacing'      => '.goso-header-builder .pc-builder-element.wishlist-icon',
		'goso_header_pb_login_register_spacing'             => '.goso-header-builder .pc-header-element.pc-login-register',
		'goso_header_pb_search_form_menu_spacing'           => '.goso-header-builder .goso-builder-element.pc-search-form',
		'goso_header_pb_search_form_sidebar_menu_spacing'   => '.goso-builder-mobile-sidebar-nav .goso-builder-element.pc-search-form-sidebar',
		'goso_header_mobile_topbar_spacing_setting'         => '.goso-mobile-topbar',
		'goso_header_mobile_midbar_spacing_setting'         => '.goso-mobile-midbar',
		'goso_header_mobile_bottombar_spacing_setting'      => '.goso-mobile-bottombar',
		'goso_header_sticky_top_spacing_setting'            => '.goso-desktop-sticky-top',
		'goso_header_sticky_mid_spacing_setting'            => '.goso-desktop-sticky-mid',
		'goso_header_sticky_bottom_spacing_setting'         => '.goso-desktop-sticky-bottom',
		'goso_header_mobile_sidebar_spacing_setting'        => '.goso-mobile-sidebar-content-wrapper',
		'goso_header_desktop_sticky_spacing_setting'        => '.goso_builder_sticky_header_desktop,',
		'goso_header_pb_vertical_line1_spacing'             => '.goso-builder-element.vertical-line-1',
		'goso_header_pb_vertical_line2_spacing'             => '.goso-builder-element.vertical-line-2',
		'goso_header_pb_vertical_line3_spacing'             => '.goso-builder-element.vertical-line-3',
		'goso_header_pb_vertical_line4_spacing'             => '.goso-builder-element.vertical-line-4',
		'goso_header_pb_vertical_line5_spacing'             => '.goso-builder-element.vertical-line-5',
		'goso_header_pb_vertical_line_mobile1_spacing'      => '.goso-builder-element.vertical-line-mobile-1',
		'goso_header_pb_vertical_line_mobile2_spacing'      => '.goso-builder-element.vertical-line-mobile-2',
		'goso_header_search_btnspacing'                     => '.pc-builder-element.goso-top-search .search-click',
		'goso_header_pb_cart_icon_section_btnspacing'       => '.pb-header-builder.cart-icon',
		'goso_header_pb_compare_icon_section_btnspacing'    => '.goso-builder-elements.pcheader-icon.compare-icon > a',
		'goso_header_pb_mobile_menu_btnspacing'             => '.navigation .button-menu-mobile',
		'goso_header_pb_hamburger_menu_btnspacing'          => '.pc-builder-element a.goso-menuhbg-toggle',
		'goso_header_pb_logo_sidebar_spacing'               => '.goso-builder-mobile-sidebar-nav .pc-builder-element.pb-logo-sidebar-mobile',
		'goso_header_pb_logo_sticky_spacing'                => '.pc-builder-element.pc-logo-sticky',
		'goso_header_pb_social_icon_mobile_section_spacing' => '.goso-builder-mobile-sidebar-nav .goso-builder-element.mobile-social',
		'goso_header_builder_pb_html_mobile_spacing'        => '.goso-builder-mobile-sidebar-nav .goso-builder-element.goso-html-ads-mobile',
		'goso_header_builder_pb_html_mobile_2_spacing'      => '.goso-builder-mobile-sidebar-nav .goso-builder-element.goso-html-ads-mobile-2',
		'goso_header_builder_pb_html_spacing'               => '.goso-builder-element.goso-html-ads-1',
		'goso_header_builder_pb_html_2_spacing'             => '.goso-builder-element.goso-html-ads-2',
		'goso_header_builder_pb_html_3_spacing'             => '.goso-builder-element.goso-html-ads-3',
	];

	foreach ( $element_spacings as $element => $selector ) {
		$numbers = goso_get_builder_mod( $element );
		if ( ! empty( $numbers ) ) {
			$out .= $selector . '{';
			$out .= goso_builder_spacing_extract_data( $numbers );
			$out .= '}';
		}
	}

	$color_css = [
		'goso_header_search_icon_color'                             => '.pc-builder-element.goso-top-search .search-click',
		'goso_header_search_icon_hv_color'                          => '.pc-builder-element.goso-top-search .search-click:hover',
		'goso_header_search_icon_bcolor'                            => [ 'border-color' => '.pc-builder-element.goso-top-search .search-click' ],
		'goso_header_search_icon_bhcolor'                           => [ 'border-color' => '.pc-builder-element.goso-top-search .search-click:hover' ],
		'goso_header_search_button_bgcolor'                         => [ 'background-color' => '.pc-builder-element.goso-top-search .search-click' ],
		'goso_header_search_button_bghcolor'                        => [ 'background-color' => '.pc-builder-element.goso-top-search .search-click:hover' ],
		'goso_header_search_btnborder_style'                        => [ 'border-style' => '.pc-builder-element.goso-top-search .search-click' ],
		'goso_header_pb_data_time_color'                            => '.goso-builder-element.goso-data-time-format',
		'goso_header_pb_login_register_color'                       => '.pc-header-element.pc-login-register a',
		'goso_header_pb_login_register_hv_color'                    => '.pc-header-element.pc-login-register a:hover',
		// main menu
		'goso_header_pb_main_menu_goso_menu_color'                 => '.pc-builder-element.pc-main-menu .navigation .menu > li > a,.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu a',
		'goso_header_pb_main_menu_goso_menu_hv_color'              => '.pc-builder-element.pc-main-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-main-menu .navigation .menu > li:hover > a,.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu a:hover',
		'goso_header_pb_main_menu_goso_menu_active_color'          => '.pc-builder-element.pc-main-menu .navigation .menu li.current-menu-item > a,.pc-builder-element.pc-main-menu .navigation .menu > li.current_page_item > a,.pc-builder-element.pc-main-menu .navigation .menu > li.current-menu-ancestor > a,.pc-builder-element.pc-main-menu .navigation .menu > li.current-menu-item > a',
		'goso_header_pb_main_menu_goso_submenu_color'              => '.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu li a',
		'goso_header_pb_main_menu_goso_submenu_hv_color'           => '.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu li a:hover',
		'goso_header_pb_main_menu_goso_submenu_activecl'           => '.pc-builder-element.pc-main-menu .navigation .menu .sub-menu li.current-menu-item > a,.pc-builder-element.pc-main-menu .navigation .menu .sub-menu > li.current_page_item > a,.pc-builder-element.pc-main-menu .navigation .menu .sub-menu > li.current-menu-ancestor > a,.pc-builder-element.pc-main-menu .navigation .menu .sub-menu > li.current-menu-item > a',
		'goso_header_pb_main_menu_goso_menu_bg_color'              => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu > li > a'
		],
		'goso_header_pb_main_menu_goso_menu_line_hv_color'         => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation ul.menu > li > a:before, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu > ul.sub-menu > li > a:before'
		],
		'goso_header_pb_main_menu_goso_menu_bg_hv_color'           => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li > a:hover, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li:hover > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current-menu-item > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current_page_item > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current-menu-ancestor > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current-menu-item > a'
		],
		'goso_header_pb_main_menu_goso_mega_bg_color'              => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .goso-megamenu:not(.goso-block-mega), .pc-builder-element.pc-builder-menu.pc-main-menu .navigation.menu-style-1 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation.menu-style-1 .goso-megamenu .goso-mega-child-categories a.cat-active:before',
		],
		'goso_header_pb_main_menu_goso_mega_child_cat_bg_color'    => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation.menu-style-2 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active'
		],
		'goso_header_pb_main_menu_goso_mega_post_date_color'       => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .goso-megamenu:not(.goso-block-mega) .goso-mega-date',
		],
		'goso_header_pb_main_menu_goso_mega_post_category_color'   => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .goso-megamenu:not(.goso-block-mega) .goso-mega-thumbnail .mega-cat-name',
		],
		'goso_header_pb_main_menu_goso_mega_post_title_color'      => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu .goso-megamenu:not(.goso-block-mega) .goso-mega-latest-posts .goso-mega-post .post-mega-title a',
		],
		'goso_header_pb_main_menu_goso_mega_accent_color'          => [
			'color'            => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a:hover, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu .goso-megamenu:not(.goso-block-mega) .goso-mega-latest-posts .goso-mega-post .post-mega-title a:hover',
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .goso-megamenu:not(.goso-block-mega) .goso-mega-thumbnail .mega-cat-name',
		],
		'goso_header_pb_main_menu_goso_mega_border_style2'         => [
			'border-color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation.menu-style-2 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a::after',
		],
		'goso_header_pb_main_menu_goso_submenu_bordercolor'        => [
			'border-color'     => '.pc-builder-element.pc-main-menu .goso-dropdown-menu,.pc-builder-element.pc-main-menu .navigation .menu .sub-menu, .pc-builder-element.pc-main-menu .navigation ul.menu > li.megamenu > ul.sub-menu,.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu li > a, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation.menu-style-1 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active',
			'background-color' => '.pc-builder-element.pc-main-menu .menu-style-2 .goso-megamenu:not(.goso-block-mega) .goso-content-megamenu .goso-mega-latest-posts .goso-mega-post:before,.pc-builder-element.pc-main-menu .navigation ul.menu > li.megamenu > ul.sub-menu > li:before, .pc-builder-element.pc-main-menu .navigation.menu-style-2 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.all-style:before, .pc-builder-element.pc-main-menu .navigation.menu-style-2 .goso-megamenu .goso-mega-child-categories:after, .pc-builder-element.pc-main-menu .navigation .goso-megamenu .goso-mega-child-categories:after',
			'border-top-color' => '.pc-builder-element.pc-main-menu .navigation.menu-style-2 .menu .sub-menu'
		],
		'goso_header_pb_main_menu_goso_submenu_bgcolor'            => [
			'background-color' => '.pc-builder-element.pc-main-menu .navigation ul.menu > li.megamenu > ul.sub-menu, .pc-builder-element.pc-main-menu .navigation .menu .sub-menu, .pc-builder-element.pc-main-menu .navigation .menu .children'
		],
		'goso_header_pb_main_menu_drop_border_style2'               => [
			'background-color' => '.pc-builder-element.pc-main-menu .navigation.menu-style-2 ul.menu ul:before'
		],

		// second menu
		'goso_header_pb_second_menu_goso_menu_color'               => '.pc-builder-element.pc-second-menu .navigation .menu > li > a,.pc-builder-element.pc-second-menu .navigation ul.menu ul.sub-menu a',
		'goso_header_pb_second_menu_goso_menu_hv_color'            => '.pc-builder-element.pc-second-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-second-menu .navigation .menu > li:hover > a,.pc-builder-element.pc-second-menu .navigation ul.menu ul.sub-menu a:hover',
		'goso_header_pb_second_menu_goso_menu_active_color'        => '.pc-builder-element.pc-second-menu .navigation .menu li.current-menu-item > a,.pc-builder-element.pc-second-menu .navigation .menu > li.current_page_item > a,.pc-builder-element.pc-second-menu .navigation .menu > li.current-menu-ancestor > a,.pc-builder-element.pc-second-menu .navigation .menu > li.current-menu-item > a',
		'goso_header_pb_second_menu_goso_submenu_color'            => '.pc-builder-element.pc-second-menu .navigation ul.menu ul.sub-menu li a',
		'goso_header_pb_second_menu_goso_submenu_hv_color'         => '.pc-builder-element.pc-second-menu .navigation ul.menu ul.sub-menu li a:hover',
		'goso_header_pb_second_menu_goso_submenu_activecl'         => '.pc-builder-element.pc-second-menu .navigation .menu .sub-menu li.current-menu-item > a,.pc-builder-element.pc-second-menu .navigation .menu .sub-menu > li.current_page_item > a,.pc-builder-element.pc-second-menu .navigation .menu .sub-menu > li.current-menu-ancestor > a,.pc-builder-element.pc-second-menu .navigation .menu .sub-menu > li.current-menu-item > a',
		'goso_header_pb_second_menu_goso_menu_bg_color'            => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu > li > a'
		],
		'goso_header_pb_second_menu_goso_menu_line_hv_color'       => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation ul.menu > li > a:before, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu > ul > li > a:before'
		],
		'goso_header_pb_second_menu_goso_menu_bg_hv_color'         => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li > a:hover, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li:hover > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current-menu-item > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current_page_item > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current-menu-ancestor > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current-menu-item > a'
		],
		'goso_header_pb_second_menu_goso_mega_bg_color'            => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .goso-megamenu:not(.goso-block-mega), .pc-builder-element.pc-builder-menu.pc-second-menu .navigation.menu-style-1 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation.menu-style-1 .goso-megamenu .goso-mega-child-categories a.cat-active:before',
		],
		'goso_header_pb_second_menu_goso_mega_child_cat_bg_color'  => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation.menu-style-2 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active'
		],
		'goso_header_pb_second_menu_goso_mega_post_date_color'     => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .goso-megamenu:not(.goso-block-mega) .goso-mega-date',
		],
		'goso_header_pb_second_menu_goso_mega_post_title_color'    => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu .goso-megamenu:not(.goso-block-mega) .goso-mega-latest-posts .goso-mega-post .post-mega-title a',
		],
		'goso_header_pb_second_menu_goso_mega_post_category_color' => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .goso-megamenu:not(.goso-block-mega) .goso-mega-thumbnail .mega-cat-name',
		],
		'goso_header_pb_second_menu_goso_mega_accent_color'        => [
			'color'            => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a:hover, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu .goso-megamenu:not(.goso-block-mega) .goso-mega-latest-posts .goso-mega-post .post-mega-title a:hover',
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .goso-megamenu:not(.goso-block-mega) .goso-mega-thumbnail .mega-cat-name',
		],
		'goso_header_pb_second_menu_goso_mega_border_style2'       => [
			'border-color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation.menu-style-2 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a::after',
		],
		'goso_header_pb_second_menu_goso_submenu_bordercolor'      => [
			'border-color'     => '.pc-builder-element.pc-second-menu .goso-dropdown-menu,.pc-builder-element.pc-second-menu .navigation .menu .sub-menu, .pc-builder-element.pc-second-menu .navigation ul.menu > li.megamenu > ul.sub-menu,.pc-builder-element.pc-second-menu .navigation ul.menu ul.sub-menu li > a, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation.menu-style-1 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active',
			'background-color' => '.pc-builder-element.pc-second-menu .menu-style-2 .goso-megamenu:not(.goso-block-mega) .goso-content-megamenu .goso-mega-latest-posts .goso-mega-post:before,.pc-builder-element.pc-second-menu .navigation ul.menu > li.megamenu > ul.sub-menu > li:before, .pc-builder-element.pc-second-menu .navigation.menu-style-2 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.all-style:before, .pc-builder-element.pc-second-menu .navigation.menu-style-2 .goso-megamenu .goso-mega-child-categories:after, .pc-builder-element.pc-second-menu .navigation .goso-megamenu .goso-mega-child-categories:after',
			'border-top-color' => '.pc-builder-element.pc-second-menu .navigation.menu-style-2 .menu .sub-menu'
		],
		'goso_header_pb_second_menu_goso_submenu_bgcolor'          => [
			'background-color' => '.pc-builder-element.pc-second-menu .navigation ul.menu > li.megamenu > ul.sub-menu, .pc-builder-element.pc-second-menu .navigation .menu .sub-menu, .pc-builder-element.pc-second-menu .navigation .menu .children'
		],
		'goso_header_pb_second_menu_drop_border_style2'             => [
			'background-color' => '.pc-builder-element.pc-second-menu .navigation.menu-style-2 ul.menu ul.sub-menu:before'
		],

		// third menu
		'goso_header_pb_third_menu_goso_menu_color'                => '.pc-builder-element.pc-third-menu .navigation .menu > li > a,.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu a',
		'goso_header_pb_third_menu_goso_menu_hv_color'             => '.pc-builder-element.pc-third-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-third-menu .navigation .menu > li:hover > a,.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu a:hover',
		'goso_header_pb_third_menu_goso_menu_active_color'         => '.pc-builder-element.pc-third-menu .navigation .menu li.current-menu-item > a,.pc-builder-element.pc-third-menu .navigation .menu > li.current_page_item > a,.pc-builder-element.pc-third-menu .navigation .menu > li.current-menu-ancestor > a,.pc-builder-element.pc-third-menu .navigation .menu > li.current-menu-item > a',
		'goso_header_pb_third_menu_goso_submenu_color'             => '.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu li a',
		'goso_header_pb_third_menu_goso_submenu_hv_color'          => '.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu li a:hover',
		'goso_header_pb_third_menu_goso_submenu_activecl'          => '.pc-builder-element.pc-third-menu .navigation .menu .sub-menu li.current-menu-item > a,.pc-builder-element.pc-third-menu .navigation .menu .sub-menu > li.current_page_item > a,.pc-builder-element.pc-third-menu .navigation .menu .sub-menu > li.current-menu-ancestor > a,.pc-builder-element.pc-third-menu .navigation .menu .sub-menu > li.current-menu-item > a',
		'goso_header_pb_third_menu_goso_menu_bg_color'             => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu > li > a'
		],
		'goso_header_pb_third_menu_goso_menu_line_hv_color'        => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation ul.menu > li > a:before, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu > ul > li > a:before'
		],
		'goso_header_pb_third_menu_goso_menu_bg_hv_color'          => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li > a:hover, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li:hover > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current-menu-item > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current_page_item > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current-menu-ancestor > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current-menu-item > a'
		],
		'goso_header_pb_third_menu_goso_mega_bg_color'             => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .goso-megamenu:not(.goso-block-mega), .pc-builder-element.pc-builder-menu.pc-third-menu .navigation.menu-style-1 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation.menu-style-1 .goso-megamenu .goso-mega-child-categories a.cat-active:before',
		],
		'goso_header_pb_third_menu_goso_mega_child_cat_bg_color'   => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation.menu-style-2 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active'
		],
		'goso_header_pb_third_menu_goso_mega_post_date_color'      => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .goso-megamenu:not(.goso-block-mega) .goso-mega-date',
		],
		'goso_header_pb_third_menu_goso_mega_post_category_color'  => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .goso-megamenu:not(.goso-block-mega) .goso-mega-thumbnail .mega-cat-name',
		],
		'goso_header_pb_third_menu_goso_mega_post_title_color'     => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu .goso-megamenu:not(.goso-block-mega) .goso-mega-latest-posts .goso-mega-post .post-mega-title a',
		],
		'goso_header_pb_third_menu_goso_mega_accent_color'         => [
			'color'            => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a:hover, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu .goso-megamenu:not(.goso-block-mega) .goso-mega-latest-posts .goso-mega-post .post-mega-title a:hover',
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .goso-megamenu:not(.goso-block-mega) .goso-mega-thumbnail .mega-cat-name',
		],
		'goso_header_pb_third_menu_goso_mega_border_style2'        => [
			'border-color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation.menu-style-2 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a::after',
		],
		'goso_header_pb_third_menu_goso_submenu_bordercolor'       => [
			'border-color'     => '.pc-builder-element.pc-third-menu .goso-dropdown-menu,.pc-builder-element.pc-third-menu .navigation .menu .sub-menu, .pc-builder-element.pc-third-menu .navigation ul.menu > li.megamenu > ul.sub-menu,.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu li > a, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation.menu-style-1 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active',
			'background-color' => '.pc-builder-element.pc-third-menu .navigation ul.menu > li.megamenu > ul.sub-menu > li:before, .pc-builder-element.pc-third-menu .navigation.menu-style-2 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.all-style:before,.pc-builder-element.pc-third-menu .menu-style-2 .goso-megamenu:not(.goso-block-mega) .goso-content-megamenu .goso-mega-latest-posts .goso-mega-post:before, .pc-builder-element.pc-third-menu .navigation.menu-style-2 .goso-megamenu .goso-mega-child-categories:after, .pc-builder-element.pc-third-menu .navigation .goso-megamenu .goso-mega-child-categories:after',
			'border-top-color' => '.pc-builder-element.pc-third-menu .navigation.menu-style-2 .menu .sub-menu'
		],
		'goso_header_pb_third_menu_goso_submenu_bgcolor'           => [
			'background-color' => '.pc-builder-element.pc-third-menu .navigation ul.menu > li.megamenu > ul.sub-menu, .pc-builder-element.pc-third-menu .navigation .menu .sub-menu, .pc-builder-element.pc-third-menu .navigation .menu .children'
		],
		'goso_header_pb_third_menu_drop_border_style2'              => [
			'background-color' => '.pc-builder-element.pc-third-menu .navigation.menu-style-2 ul.menu ul.sub-menu:before'
		],

		// search
		'goso_header_pb_search_form_bg_color'                       => [
			'background-color' => '.goso-builder-element.pc-search-form-desktop form.pc-searchform input.search-input'
		],
		'goso_header_pb_search_form_border_color'                   => [
			'border-color' => '.goso-builder-element.pc-search-form-desktop form.pc-searchform input.search-input'
		],
		'goso_header_pb_search_form_btntxt_color'                   => [
			'color' => '.pc-search-form-desktop form.pc-searchform i, .goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-desktop .searchsubmit,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-desktop .searchsubmit'
		],
		'goso_header_pb_search_form_btnhtxt_color'                  => [
			'color' => '.goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-desktop .searchsubmit:hover,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-desktop .searchsubmit:hover'
		],
		'goso_header_pb_search_form_btn_color'                      => [
			'background-color' => '.goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-desktop .searchsubmit,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-desktop .searchsubmit'
		],
		'goso_header_pb_search_form_btn_hv_color'                   => [
			'background-color' => '.goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-desktop .searchsubmit:hover,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-desktop .searchsubmit:hover'
		],

		// search mobile
		'goso_header_pb_search_form_sidebar_bg_color'               => [
			'background-color' => '.goso-builder-element.pc-search-form.pc-search-form-sidebar form.pc-searchform input.search-input'
		],
		'goso_header_pb_search_form_sidebar_border_color'           => [
			'border-color' => '.goso-builder-element.pc-search-form.pc-search-form-sidebar form.pc-searchform input.search-input'
		],
		'goso_header_pb_search_form_sidebar_btntxt_color'           => [
			'color' => '.pc-search-form-sidebar form.pc-searchform i, .goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-sidebar .searchsubmit,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-sidebar .searchsubmit'
		],
		'goso_header_pb_search_form_sidebar_btnhtxt_color'          => [
			'color' => '.goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-sidebar .searchsubmit:hover,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-sidebar .searchsubmit:hover'
		],
		'goso_header_pb_search_form_sidebar_btn_color'              => [
			'background-color' => '.goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-sidebar .searchsubmit,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-sidebar .searchsubmit'
		],
		'goso_header_pb_search_form_sidebar_btn_hv_color'           => [
			'background-color' => '.goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-sidebar .searchsubmit:hover,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-sidebar .searchsubmit:hover'
		],

		// social icon dekstop
		'goso_header_pb_social_icon_section_icon_size'              => [
			'font-size' => '.goso-builder-element.header-social.desktop-social a i',
		],
		'goso_header_pb_social_icon_section_item_spacing'           => [
			'margin-right' => 'body:not(.rtl) .goso-builder-element.desktop-social .inner-header-social a',
			'margin-left'  => 'body.rtl .goso-builder-element.desktop-social .inner-header-social a',
		],

		'goso_header_pb_social_icon_section_bg_color'        => [
			'background-color' => '.goso-builder-element.desktop-social .inner-header-social a i',
		],
		'goso_header_pb_social_icon_section_bg_hv_color'     => [
			'background-color' => '.goso-builder-element.desktop-social .inner-header-social a:hover i',
		],
		'goso_header_pb_social_icon_section_border_color'    => [
			'border-color' => '.goso-builder-element.desktop-social .inner-header-social a i',
		],
		'goso_header_pb_social_icon_section_border_hv_color' => [
			'border-color' => '.goso-builder-element.desktop-social .inner-header-social a:hover i',
		],

		'goso_header_pb_social_icon_section_color'                  => [
			'color' => '.goso-builder-element.desktop-social .inner-header-social a,.goso-builder-element.desktop-social .inner-header-social a i',
		],
		'goso_header_pb_social_icon_section_hv_color'               => [
			'color' => '.goso-builder-element.desktop-social .inner-header-social a:hover,.goso-builder-element.desktop-social .inner-header-social a:hover i',
		],

		// social icon mobile
		'goso_header_pb_social_icon_mobile_section_icon_size'       => [
			'font-size' => '.goso-builder-element.mobile-social a i',
		],
		'goso_header_pb_social_icon_mobile_section_icon_w'          => [
			'width' => '.goso-builder-element.mobile-social i',
		],
		'goso_header_pb_social_icon_mobile_section_icon_h'          => [
			'height' => '.goso-builder-element.mobile-social i',
		],
		'goso_header_pb_social_icon_mobile_section_item_spacing'    => [
			'margin-right' => 'body:not(.rtl) .goso-builder-element.mobile-social .inner-header-social a',
			'margin-left'  => 'body.rtl .goso-builder-element.mobile-social .inner-header-social a',
		],
		'goso_header_pb_hamburger_menu_color'                       => [
			'background-color' => '.pc-builder-element a.goso-menuhbg-toggle .lines-button:after, .pc-builder-element a.goso-menuhbg-toggle.builder .goso-lines:before,.pc-builder-element a.goso-menuhbg-toggle.builder .goso-lines:after',
		],
		'goso_header_pb_hamburger_menu_hv_color'                    => [
			'background-color' => '.pc-builder-element a.goso-menuhbg-toggle:hover .lines-button:after, .pc-builder-element a.goso-menuhbg-toggle.builder:hover .goso-lines:before,.pc-builder-element a.goso-menuhbg-toggle.builder:hover .goso-lines:after',
		],
		'goso_header_pb_hamburger_menu_bcolor'                      => [
			'border-color' => '.pc-builder-element a.goso-menuhbg-toggle',
		],
		'goso_header_pb_hamburger_menu_bhcolor'                     => [
			'border-color' => '.pc-builder-element a.goso-menuhbg-toggle:hover',
		],
		'goso_header_pb_hamburger_menu_bgcolor'                     => [
			'background-color' => '.pc-builder-element a.goso-menuhbg-toggle',
		],
		'goso_header_pb_hamburger_menu_bghcolor'                    => [
			'background-color' => '.pc-builder-element a.goso-menuhbg-toggle:hover',
		],
		'goso_header_pb_hamburger_menu_btnbstyle'                   => [
			'border-style' => '.pc-builder-element a.goso-menuhbg-toggle',
		],
		'goso_header_pb_social_icon_mobile_section_bg_color'        => [
			'background-color' => '.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a i',
		],
		'goso_header_pb_social_icon_mobile_section_bg_hv_color'     => [
			'background-color' => '.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a:hover i',
		],
		'goso_header_pb_social_icon_mobile_section_border_color'    => [
			'border-color' => '.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a i',
		],
		'goso_header_pb_social_icon_mobile_section_border_hv_color' => [
			'border-color' => '.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a:hover i',
		],
		'goso_header_pb_social_icon_mobile_section_color'           => [
			'color' => '.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a,.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a i',
		],
		'goso_header_pb_social_icon_mobile_section_hv_color'        => [
			'color' => '.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a:hover,.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a:hover i',
		],

		// search form
		'goso_header_pb_search_form_height'                         => [
			'line-height' => '.pc-search-form-desktop.search-style-icon-button .searchsubmit:before,.pc-search-form-desktop.search-style-text-button .searchsubmit ',
		],
		'goso_header_pb_search_form_sidebar_height'                 => [
			'line-height' => '.pc-search-form-sidebar.search-style-icon-button .searchsubmit:before,.pc-search-form-sidebar.search-style-text-button .searchsubmit ',
		],

		'goso_header_pb_search_form_input_pdl' => [
			'padding-left' => '.goso-builder-element.pc-search-form-desktop form.pc-searchform input.search-input'
		],
		'goso_header_pb_search_form_input_pdr' => [
			'padding-right' => '.goso-builder-element.pc-search-form-desktop form.pc-searchform input.search-input'
		],
		'goso_header_pb_search_form_btn_pdl'   => [
			'padding-left' => '.goso-builder-element.pc-search-form-desktop .searchsubmit'
		],
		'goso_header_pb_search_form_btn_pdr'   => [
			'padding-right' => '.goso-builder-element.pc-search-form-desktop .searchsubmit'
		],

		'goso_header_pb_search_form_sidebar_input_pdl'   => [
			'padding-left' => '.goso-builder-element.pc-search-form-sidebar form.pc-searchform input.search-input'
		],
		'goso_header_pb_search_form_sidebar_input_pdr'   => [
			'padding-right' => '.goso-builder-element.pc-search-form-sidebar form.pc-searchform input.search-input'
		],
		'goso_header_pb_search_form_sidebar_btn_pdl'     => [
			'padding-left' => '.goso-builder-element.pc-search-form-sidebar .searchsubmit'
		],
		'goso_header_pb_search_form_sidebar_btn_pdr'     => [
			'padding-right' => '.goso-builder-element.pc-search-form-sidebar .searchsubmit'
		],

		// font size
		'goso_header_pb_cart_icon_section_size'          => [
			'font-size' => '.pb-header-builder.cart-icon .top-search-classes a.cart-contents > i, .pb-header-builder.cart-icon .top-search-classes.shoping-cart-icon > a > i',
		],
		'goso_header_pb_wishlist_icon_section_size'      => [
			'font-size' => '.goso-builder-elements.pcheader-icon.wishlist-icon > a',
		],
		'goso_header_pb_wishlist_icon_section_btnbstyle' => [
			'border-style' => '.goso-builder-elements.pcheader-icon.wishlist-icon > a',
		],
		'goso_header_pb_compare_icon_section_size'       => [
			'font-size' => '.goso-builder-elements.pcheader-icon.compare-icon > a',
		],
		'goso_header_pb_compare_icon_section_bd_color'   => [
			'border-color' => '.goso-builder-elements.pcheader-icon.compare-icon > a',
		],
		'goso_header_pb_compare_icon_section_bdh_color'  => [
			'border-color' => '.goso-builder-elements.pcheader-icon.compare-icon > a:hover',
		],
		'goso_header_pb_compare_icon_section_bg_color'   => [
			'background-color' => '.goso-builder-elements.pcheader-icon.compare-icon > a',
		],
		'goso_header_pb_compare_icon_section_bgh_color'  => [
			'background-color' => '.goso-builder-elements.pcheader-icon.compare-icon > a:hover',
		],

		'goso_header_pb_compare_icon_section_btnbstyle' => [
			'border-style' => '.goso-builder-elements.pcheader-icon.compare-icon > a',
		],

		'goso_header_pb_cart_icon_section_item_count_txt' => [
			'color' => '.pb-header-builder.cart-icon .top-search-classes a.cart-contents > span, .pb-header-builder.cart-icon .top-search-classes.shoping-cart-icon > span',
		],
		'goso_header_pb_cart_icon_section_item_count_bg'  => [
			'background-color' => '.pb-header-builder.cart-icon .top-search-classes a.cart-contents > span, .pb-header-builder.cart-icon .top-search-classes.shoping-cart-icon > span',
		],

		'goso_header_pb_compare_icon_section_item_count_txt' => [
			'color' => '.goso-builder-elements.pcheader-icon.compare-icon > a > span',
		],
		'goso_header_pb_compare_icon_section_item_count_bg'  => [
			'background-color' => '.goso-builder-elements.pcheader-icon.compare-icon > a > span',
		],

		'goso_header_pb_wishlist_icon_section_item_count_txt' => [
			'color' => '.goso-builder-elements.pcheader-icon.wishlist-icon > a > span',
		],
		'goso_header_pb_wishlist_icon_section_item_count_bg'  => [
			'background-color' => '.goso-builder-elements.pcheader-icon.wishlist-icon > a > span',
		],

		'goso_header_pb_wishlist_icon_section_bg_color'  => [
			'background-color' => '.goso-builder-elements.pcheader-icon.wishlist-icon > a',
		],
		'goso_header_pb_wishlist_icon_section_bgh_color' => [
			'background-color' => '.goso-builder-elements.pcheader-icon.wishlist-icon > a:hover',
		],
		'goso_header_pb_wishlist_icon_section_bd_color'  => [
			'border-color' => '.goso-builder-elements.pcheader-icon.wishlist-icon > a',
		],
		'goso_header_pb_wishlist_icon_section_bdh_color' => [
			'border-color' => '.goso-builder-elements.pcheader-icon.wishlist-icon > a:hover',
		],

		// cart
		'goso_header_pb_compare_icon_section_color'      => '.goso-builder-elements.pcheader-icon.compare-icon > a',
		'goso_header_pb_compare_icon_section_hv_color'   => '.goso-builder-elements.pcheader-icon.compare-icon > a:hover',
		'goso_header_pb_wishlist_icon_section_color'     => '.goso-builder-elements.pcheader-icon.wishlist-icon > a',
		'goso_header_pb_wishlist_icon_section_hv_color'  => '.goso-builder-elements.pcheader-icon.wishlist-icon > a:hover',
		'goso_header_pb_cart_icon_section_color'         => '.pb-header-builder.cart-icon .top-search-classes a.cart-contents',
		'goso_header_pb_cart_icon_section_hv_color'      => '.pb-header-builder.cart-icon .top-search-classes a.cart-contents:hover',

		'goso_header_pb_cart_icon_section_bcolor'    => [
			'border-color' => '.pb-header-builder.cart-icon',
		],
		'goso_header_pb_cart_icon_section_bhcolor'   => [
			'border-color' => '.pb-header-builder.cart-icon:hover',
		],
		'goso_header_pb_cart_icon_section_bgcolor'   => [
			'background-color' => '.pb-header-builder.cart-icon',
		],
		'goso_header_pb_cart_icon_section_bghcolor'  => [
			'background-color' => '.pb-header-builder.cart-icon:hover',
		],
		'goso_header_pb_cart_icon_section_btnbstyle' => [
			'border-style' => '.pb-header-builder.cart-icon',
		],

		// button font size
		'goso_header_pb_button_txt_size'             => [
			'font-size' => '.goso-builder-button.button-1',
		],
		'goso_header_pb_button_2_txt_size'           => [
			'font-size' => '.goso-builder-button.button-2',
		],
		'goso_header_pb_button_3_txt_size'           => [
			'font-size' => '.goso-builder-button.button-3',
		],
		'goso_header_pb_button_mobile_txt_size'      => [
			'font-size' => '.goso-builder-button.button-mobile-1',
		],
		'goso_header_pb_button_mobile_2_txt_size'    => [
			'font-size' => '.goso-builder-button.button-mobile-2',
		],

		'goso_header_pb_login_register_size'               => [
			'font-size' => '.pc-header-element.goso-topbar-social .pclogin-item a i',
		],
		'goso_header_pb_login_register_txt_size'           => [
			'font-size' => '.pc-header-element.goso-topbar-social .pclogin-item a',
		],

		// sidebar mobile menu
		'goso_header_pb_dropdown_menu_goso_menu_color'    => '.pc-builder-menu.pc-dropdown-menu .menu li a',
		'goso_header_pb_dropdown_menu_goso_menu_hv_color' => '.pc-builder-menu.pc-dropdown-menu .menu li a:hover,.pc-builder-menu.pc-dropdown-menu .menu > li.current_page_item > a',

		// button
		'goso_header_pb_button_font'                       => [
			'font-family' => '.goso-builder.goso-builder-button.button-1',
		],
		'goso_header_pb_button_font_w'                     => [
			'font-weight' => '.goso-builder.goso-builder-button.button-1',
		],
		'goso_header_pb_button_font_s'                     => [
			'font-style' => '.goso-builder.goso-builder-button.button-1',
		],
		'goso_header_pb_button_2_font'                     => [
			'font-family' => '.goso-builder.goso-builder-button.button-2',
		],
		'goso_header_pb_button_2_font_w'                   => [
			'font-weight' => '.goso-builder.goso-builder-button.button-2',
		],
		'goso_header_pb_button_2_font_s'                   => [
			'font-style' => '.goso-builder.goso-builder-button.button-2',
		],
		'goso_header_pb_button_3_font'                     => [
			'font-family' => '.goso-builder.goso-builder-button.button-3',
		],
		'goso_header_pb_button_3_font_w'                   => [
			'font-weight' => '.goso-builder.goso-builder-button.button-3',
		],
		'goso_header_pb_button_3_font_s'                   => [
			'font-style' => '.goso-builder.goso-builder-button.button-3',
		],
		'goso_header_pb_button_mobile_font'                => [
			'font-family' => '.goso-builder.goso-builder-button.button-mobile-1',
		],
		'goso_header_pb_button_mobile_font_w'              => [
			'font-weight' => '.goso-builder.goso-builder-button.button-mobile-1',
		],
		'goso_header_pb_button_mobile_font_s'              => [
			'font-style' => '.goso-builder.goso-builder-button.button-mobile-1',
		],
		'goso_header_pb_button_mobile_2_font'              => [
			'font-family' => '.goso-builder.goso-builder-button.button-mobile-2',
		],
		'goso_header_pb_button_mobile_2_font_w'            => [
			'font-weight' => '.goso-builder.goso-builder-button.button-mobile-2',
		],
		'goso_header_pb_button_mobile_2_font_s'            => [
			'font-style' => '.goso-builder.goso-builder-button.button-mobile-2',
		],
		'goso_header_search_icon_size'                     => [
			'font-size' => '.pc-builder-element.goso-top-search a i',
		],
		'goso_header_pb_data_time_format_size'             => [
			'font-size' => '.goso-builder-element.goso-data-time-format',
		],

		'goso_header_topblock_content_custom_width'            => [
			'width' => '.goso-desktop-topblock .container.container-custom',
		],
		'goso_header_topbar_content_custom_width'              => [
			'width' => '.goso-desktop-topbar .container.container-custom',
		],
		'goso_header_midbar_content_custom_width'              => [
			'width' => '.goso-desktop-midbar .container.container-custom',
		],
		'goso_header_bottombar_content_custom_width'           => [
			'width' => '.goso-desktop-bottombar .container.container-custom',
		],
		'goso_header_bottomblock_content_custom_width'         => [
			'width' => '.goso-desktop-bottomblock .container.container-custom',
		],
		'goso_header_wrap_custom_width'                        => [
			'width' => '.goso-header-builder.main-builder-header.container.container-custom',
		],
		'goso_header_pb_social_icon_section_icon_w'            => [
			'--pchb-socialw' => '.pc-wrapbuilder-header'
		],
		'goso_header_sticky_border_color'                      => [
			'border-color' => '.goso_builder_sticky_header_desktop',
		],
		'goso_header_sticky_border_style'                      => [
			'border-style' => '.goso_builder_sticky_header_desktop',
		],
		'goso_header_sticky_top_content_custom_width'          => [
			'width' => '.goso-desktop-sticky-top .container.container-custom',
		],
		'goso_header_sticky_mid_content_custom_width'          => [
			'width' => '.goso-desktop-sticky-mid .container.container-custom',
		],
		'goso_header_sticky_bottom_content_custom_width'       => [
			'width' => '.goso-desktop-sticky-bottom .container.container-custom',
		],
		'goso_header_desktop_sticky_wrap_custom_width'         => [
			'max-width' => '.goso_builder_sticky_header_desktop.container.container-custom',
		],

		// news ticker
		'goso_header_pb_news_ticker_color'                     => [
			'color' => '.goso-builder-element.goso-topbar-trending a.goso-topbar-post-title',
		],
		'goso_header_pb_news_ticker_hv_color'                  => [
			'color' => '.goso-builder-element.goso-topbar-trending a.goso-topbar-post-title:hover',
		],
		'goso_header_pb_news_ticker_arr_color'                 => [
			'color' => '.goso-builder-element.goso-topbar-trending .goso-trending-nav a',
		],
		'goso_header_pb_news_ticker_arr_hv_color'              => [
			'color' => '.goso-builder-element.goso-topbar-trending .goso-trending-nav a:hover',
		],
		'goso_header_pb_news_ticker_headline_color'            => [
			'color' => '.goso-builder-element.goso-topbar-trending .headline-title',
		],
		'goso_header_pb_news_ticker_headline_bg_style3'        => [
			'border-right-color' => '.goso-builder-element.goso-topbar-trending .headline-title.nticker-style-3::after',
		],
		'goso_header_pb_news_ticker_headline_bg'               => [
			'background-color'    => '.goso-builder-element.goso-topbar-trending .headline-title',
			'border-bottom-color' => '.goso-builder-element.goso-topbar-trending .headline-title.nticker-style-4:after',
			'border-left-color'   => '.goso-builder-element.goso-topbar-trending .headline-title.nticker-style-2:after',
		],
		'goso_header_pb_news_ticker_width'                     => [
			'max-width' => '.goso-builder-element.goso-topbar-trending',
		],
		'goso_header_pb_news_ticker_fs'                        => [
			'font-size' => '.goso-builder-element.goso-topbar-trending a.goso-topbar-post-title',
		],
		'goso_header_pb_news_ticker_arr_fs'                    => [
			'font-size' => '.goso-builder-element.goso-topbar-trending .goso-trending-nav a',
		],
		'goso_header_pb_news_ticker_headline_fs'               => [
			'font-size' => '.goso-builder-element.goso-topbar-trending .headline-title',
		],
		'goso_header_pb_news_ticker_font'                      => [
			'font-family' => '.goso-builder-element.goso-topbar-trending a.goso-topbar-post-title,.goso-builder-element.goso-topbar-trending .headline-title',
		],
		'goso_header_pb_dropdown_menu_goso_menu_border_color' => [
			'border-color' => '.goso-menu-hbg.goso-builder-mobile-sidebar-nav .menu li,.goso-menu-hbg.goso-builder-mobile-sidebar-nav ul.sub-menu'
		],
		'goso_header_pb_hamburger_menu_size'                   => [
			'--pcbd-menuhbg-size' => '.goso-menuhbg-toggle.builder',
		],
		'goso_header_pb_search_form_txt_color'                 => [
			'--pcs-d-txt-cl' => '.goso-builder-element.pc-search-form-desktop'
		],
		'goso_header_pb_search_form_sidebar_txt_color'         => [
			'--pcs-s-txt-cl' => '.goso-builder-element.pc-search-form-sidebar'
		],
		'goso_header_border_color'                             => [
			'border-color' => '.goso_header.main-builder-header',
		],
		'goso_header_border_style'                             => [
			'border-style' => '.goso_header.main-builder-header',
		],
		'goso_header_pb_mobile_menu_btnbstyle'                 => [
			'border-style' => '.navigation.mobile-menu',
		],
		'goso_header_pb_mobile_menu_bcolor'                    => [
			'border-color' => '.navigation.mobile-menu',
		],
		'goso_header_pb_mobile_menu_bhcolor'                   => [
			'border-color' => '.navigation.mobile-menu:hover',
		],
		'goso_header_pb_mobile_menu_bgcolor'                   => [
			'background-color' => '.navigation.mobile-menu',
		],
		'goso_header_pb_mobile_menu_bghcolor'                  => [
			'background-color' => '.navigation.mobile-menu:hover',
		],
		'goso_header_pb_mobile_menu_color'                     => [
			'color' => '.navigation .button-menu-mobile',
			'fill'  => '.navigation .button-menu-mobile svg',
		],
		'goso_header_pb_mobile_menu_hv_color'                  => [
			'color' => '.navigation .button-menu-mobile:hover',
			'fill'  => '.navigation .button-menu-mobile:hover svg',
		],
		'goso_header_search_border_color'                      => [
			'border-bottom-color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search:before',
			'border-top-color'    => '.header-search-style-showup .pc-wrapbuilder-header .show-search'
		],
		'goso_header_search_bg_color'                          => [
			'background-color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search'
		],
		'goso_header_search_input_border_color'                => [
			'border-color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform input.search-input',
		],
		'goso_header_search_input_bg_color'                    => [
			'background-color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform input.search-input',
		],
		'goso_header_search_input_color'                       => [
			'--pchd-sinput-txt' => '.pc-wrapbuilder-header',
			'color'             => '.header-search-style-overlay .pc-wrapbuilder-header .show-search form.pc-searchform input.search-input',
		],
		'goso_header_search_o_bdcolor'                         => [
			'border-color' => '.header-search-style-overlay .pc-wrapbuilder-header .show-search form.pc-searchform .pc-searchform-inner',
		],
		'goso_header_search_button_bg_color'                   => [
			'background-color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform .searchsubmit',
		],
		'goso_header_search_button_bg_hcolor'                  => [
			'background-color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform .searchsubmit:hover',
		],
		'goso_header_search_button_color'                      => [
			'color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform .searchsubmit',
		],
		'goso_header_search_button_hcolor'                     => [
			'color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform .searchsubmit:hover',
		],
		'goso_header_search_o_bgcolor'                         => [
			'background-color' => '.header-search-style-overlay .goso-header-builder .show-search',
		],
		'goso_header_search_o_closecolor'                      => [
			'color' => '.header-search-style-overlay .goso-header-builder .show-search a.close-search',
		],
		'goso_header_search_input_size'                        => [
			'font-size' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform input.search-input,.header-search-style-overlay .pc-wrapbuilder-header .show-search form.pc-searchform input.search-input',
		],
		'goso_header_search_btn_size'                          => [
			'font-size' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform .searchsubmit',
		],
		'goso_header_builder_pb_html_color'                    => [
			'color' => '.goso-builder-element.goso-html-ads-1',
		],
		'goso_header_builder_pb_html_link_color'               => [
			'color' => '.goso-builder-element.goso-html-ads-1 a',
		],
		'goso_header_builder_pb_html_fsize'                    => [
			'font-size' => '.goso-builder-element.goso-html-ads-1,.goso-builder-element.goso-html-ads-1 *',
		],
		'goso_header_builder_pb_html_2_color'                  => [
			'color' => '.goso-builder-element.goso-html-ads-2',
		],
		'goso_header_builder_pb_html_2_link_color'             => [
			'color' => '.goso-builder-element.goso-html-ads-2 a',
		],
		'goso_header_builder_pb_html_2_fsize'                  => [
			'font-size' => '.goso-builder-element.goso-html-ads-2,.goso-builder-element.goso-html-ads-2 *',
		],
		'goso_header_builder_pb_html_3_color'                  => [
			'color' => '.goso-builder-element.goso-html-ads-3',
		],
		'goso_header_builder_pb_html_3_link_color'             => [
			'color' => '.goso-builder-element.goso-html-ads-3 a',
		],
		'goso_header_builder_pb_html_3_fsize'                  => [
			'font-size' => '.goso-builder-element.goso-html-ads-3,.goso-builder-element.goso-html-ads-3 *',
		],
		'goso_header_builder_pb_html_mobile_color'             => [
			'color' => '.goso-builder-element.goso-html-ads-mobile',
		],
		'goso_header_builder_pb_html_mobile_link_color'        => [
			'color' => '.goso-builder-element.goso-html-ads-mobile a',
		],
		'goso_header_builder_pb_html_mobile_fsize'             => [
			'font-size' => '.goso-builder-element.goso-html-ads-mobile,.goso-builder-element.goso-html-ads-mobile *',
		],
		'goso_header_builder_pb_html_mobile_2_color'           => [
			'color' => '.goso-builder-element.goso-html-ads-mobile-2',
		],
		'goso_header_builder_pb_html_mobile_2_link_color'      => [
			'color' => '.goso-builder-element.goso-html-ads-mobile-2 a',
		],
		'goso_header_builder_pb_html_mobile_2_fsize'           => [
			'font-size' => '.goso-builder-element.goso-html-ads-mobile-2,.goso-builder-element.goso-html-ads-mobile-2 *',
		],
		'goso_header_pb_search_form_input_size'                => [
			'font-size' => '.goso-builder-element.pc-search-form-desktop form.pc-searchform input.search-input',
		],
		'goso_header_pb_search_form_btn_size'                  => [
			'font-size' => '.pc-search-form-desktop.search-style-default i,
							.pc-search-form-desktop.search-style-icon-button .searchsubmit:before,
							.pc-search-form-desktop.search-style-text-button .searchsubmit',
		],
		'goso_header_pb_search_form_sidebar_input_size'        => [
			'font-size' => '.goso-builder-element.pc-search-form-sidebar form.pc-searchform input.search-input',
		],
		'goso_header_pb_search_form_sidebar_btn_size'          => [
			'font-size' => '.pc-search-form-sidebar.search-style-default i,
							.pc-search-form-sidebar.search-style-icon-button .searchsubmit:before,
							.pc-search-form-sidebar.search-style-text-button .searchsubmit',
		],
	];

	foreach ( $color_css as $value => $selector ) {
		$control_value = goso_get_builder_mod( $value );
		$prefix        = '';
		if ( is_array( $selector ) && ! empty( $control_value ) ) {
			foreach ( $selector as $prop => $subselect ) {
				if ( $prop == 'font-family' ) {
					$control_value = goso_builder_get_font_data( $control_value );
				}
				$prefix = is_numeric( $control_value ) && $prop !== 'font-weight' ? 'px' : '';
				$out    .= $subselect . '{' . $prop . ':' . $control_value . $prefix . '}';
			}
		} elseif ( ! empty( $control_value ) ) {
			$out .= $selector . '{color:' . $control_value . $prefix . '}';
		}
	}

	$search_form_color = goso_get_builder_mod( 'goso_header_search_input_color' );
	if ( $search_form_color ) {
		$out .= '.header-search-style-overlay .pc-wrapbuilder-header .show-search form.pc-searchform ::placeholder{color:' . $search_form_color . '}';
	}

	$search_form_height = goso_get_builder_mod( 'goso_header_pb_search_form_height' );
	if ( ! empty( $search_form_height ) ) {
		$out .= '.goso-builder-element.pc-search-form-desktop,.goso-builder-element.pc-search-form-desktop.search-style-icon-button .search-input,.goso-builder-element.pc-search-form-desktop.search-style-text-button .search-input{';
		$out .= 'line-height:' . ( $search_form_height - 2 ) . 'px';
		$out .= '}';

		$out .= '.goso-builder-element.pc-search-form-desktop.search-style-default .search-input{';
		$out .= 'line-height:' . ( $search_form_height - 2 ) . 'px;padding-top:0;padding-bottom:0';
		$out .= '}';
	}

	$search_form_sidebar_height = goso_get_builder_mod( 'goso_header_pb_search_form_sidebar_height' );
	if ( ! empty( $search_form_sidebar_height ) ) {
		$out .= '.goso-builder-element.pc-search-form.pc-search-form-sidebar,.goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-sidebar .search-input,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-sidebar .search-input{';
		$out .= 'line-height:' . ( $search_form_sidebar_height - 2 ) . 'px';
		$out .= '}';

		$out .= '.goso-builder-element.pc-search-form-sidebar.search-style-default .search-input{';
		$out .= 'line-height:' . ( $search_form_sidebar_height - 2 ) . 'px;padding-top:0;padding-bottom:0';
		$out .= '}';
	}

	// search
	$search_form_width = goso_get_builder_mod( 'goso_header_pb_search_form_width' );
	if ( ! empty( $search_form_width ) ) {
		$out .= '.goso-builder-element.pc-search-form-desktop,.goso-builder-element.pc-search-form-desktop.search-style-icon-button .search-input,.goso-builder-element.pc-search-form-desktop.search-style-text-button .search-input{';
		$out .= 'max-width:' . $search_form_width . 'px;';
		$out .= '}';
	}

	$search_form_sidebar_width = goso_get_builder_mod( 'goso_header_pb_search_form_sidebar_width' );
	if ( ! empty( $search_form_sidebar_width ) ) {
		$out .= '.goso-builder-element.pc-search-form.pc-search-form-sidebar,.goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-sidebar .search-input,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-sidebar .search-input{';
		$out .= 'max-width:' . $search_form_sidebar_width . 'px;';
		$out .= '}';
	}

	// mobile logo
	$logo_mobile_spacing = goso_get_builder_mod( 'goso_header_pb_logo_mobile_spacing' );
	$out                 .= '.pc-builder-element.pc-logo.pb-logo-mobile{';
	$out                 .= goso_builder_spacing_extract_data( $logo_mobile_spacing );
	$out                 .= '}';

	// social icon line height
	$social_icon_height = goso_get_builder_mod( 'goso_header_pb_social_icon_section_icon_h' );
	$social_icon_style  = goso_get_builder_mod( 'goso_header_pb_social_icon_section_icon_style' );

	if ( ! empty( $social_icon_height ) ) {
		$social_line_height = $social_icon_height;
		if ( 'simple' != $social_icon_style ) {
			$social_line_height = $social_icon_height - 2;
		}
		$out .= '.goso-builder-element.header-social.desktop-social a i,.goso-builder-element.header-social.desktop-social .goso-social-simple a i{line-height:' . $social_line_height . 'px;}';
	}

	// social icon mobile height
	$social_mobile_icon_height = goso_get_builder_mod( 'goso_header_pb_social_icon_mobile_section_icon_h' );
	$social_mobile_icon_style  = goso_get_builder_mod( 'goso_header_pb_social_icon_mobile_section_icon_style' );

	if ( ! empty( $social_mobile_icon_height ) ) {
		$social_mobile_line_height = $social_mobile_icon_height;
		if ( 'simple' != $social_mobile_icon_style ) {
			$social_mobile_line_height = $social_mobile_icon_height - 2;
		}
		$out .= '.goso-builder-element.header-social.mobile-social a i,.goso-builder-element.header-social.mobile-social .goso-social-simple a i{line-height:' . $social_mobile_line_height . 'px;}';
	}

	// font for login text
	$out        .= '.pc-header-element.goso-topbar-social .pclogin-item a{';
	$login_font = goso_get_builder_mod( 'goso_header_pb_login_register_goso_font_login_text' );
	if ( ! empty( $login_font ) ) {
		$out .= 'font-family:' . goso_builder_get_font_data( $login_font ) . ';';
	}
	$login_uppercase = goso_get_builder_mod( 'goso_header_pb_login_register_text_uppercase' );
	if ( 'enable' == $login_uppercase ) {
		$out .= 'text-transform:uppercase;';
	}
	$login_weight = goso_get_builder_mod( 'goso_header_pb_login_register_goso_fontw_login_text' );
	if ( ! empty( $login_weight ) ) {
		$out .= 'font-weight:' . $login_weight . ';';
	}
	$out .= '}';

	$out .= 'body.goso-header-preview-layout .wrapper-boxed{min-height:1500px}';


	echo $out . $return;
}

function goso_builder_get_font_data( $setting ) {
	if ( ! $setting ) {
		return false;
	}
	$font_data = str_replace( '"', '', $setting );
	$font_data = explode( ", ", $font_data );

	$out = '';
	if ( isset( $font_data[0] ) ) {
		$out .= "'" . $font_data[0] . "'";
	}
	if ( isset( $font_data[2] ) ) {
		$out .= ', ' . $font_data[2];
	}

	return $out;
}

function goso_builder_get_area_css( $area, $cssprefix = '', $optionprefix = '', $customselect = '' ) {
	if ( ! empty( $customselect ) ) {
		$out = $customselect . '{';
	} else {
		$out = '.goso_header_overlap .goso-' . $cssprefix . '-' . $area . ',.goso-' . $cssprefix . '-' . $area . '{';
	}
	$out                   .= 'border-width:0;';
	$background_img        = goso_get_builder_mod( 'goso_' . $optionprefix . '_' . $area . '_background_img' );
	$background_color      = goso_get_builder_mod( 'goso_' . $optionprefix . '_' . $area . '_background_color' );
	$background_repeat     = goso_get_builder_mod( 'goso_' . $optionprefix . '_' . $area . '_background_repeat' );
	$background_position   = goso_get_builder_mod( 'goso_' . $optionprefix . '_' . $area . '_background_position' );
	$background_size       = goso_get_builder_mod( 'goso_' . $optionprefix . '_' . $area . '_background_size' );
	$background_attachment = goso_get_builder_mod( 'goso_' . $optionprefix . '_' . $area . '_background_attachment' );
	$background_spacing    = goso_get_builder_mod( 'goso_' . $optionprefix . '_' . $area . '_spacing_setting' );
	$background_border     = goso_get_builder_mod( 'goso_' . $optionprefix . '_' . $area . '_border_setting' );
	$border_style          = goso_get_builder_mod( 'goso_' . $optionprefix . '_' . $area . '_border_style_setting' );
	$background_text_color = goso_get_builder_mod( 'goso_' . $optionprefix . '_' . $area . '_text_color_setting' );
	$background_maxheight  = goso_get_builder_mod( 'goso_' . $optionprefix . '_' . $area . '_maxheight_setting' );

	if ( ! empty( $background_img ) ) {
		$out .= 'background-image:url(' . esc_url( $background_img ) . ');';
	}

	if ( ! empty( $background_color ) ) {
		$out .= 'background-color:' . esc_attr( $background_color ) . ';';
	}

	if ( ! empty( $background_repeat ) ) {
		$out .= 'background-repeat:' . esc_attr( $background_repeat ) . ';';
	}

	if ( ! empty( $background_position ) ) {
		$out .= 'background-position:' . esc_attr( $background_position ) . ';';
	}
	if ( ! empty( $background_size ) ) {
		$out .= 'background-size:' . esc_attr( $background_size ) . ';';
	}
	if ( ! empty( $background_attachment ) ) {
		$out .= 'background-attachment:' . esc_attr( $background_attachment ) . ';';
	}
	if ( ! empty( $background_border ) ) {
		$out .= 'border-color:' . esc_attr( $background_border ) . ';';
	}
	if ( ! empty( $border_style ) ) {
		$out .= 'border-style:' . esc_attr( $border_style ) . ';';
	}
	if ( ! empty( $background_text_color ) ) {
		$out .= 'color:' . esc_attr( $background_text_color ) . ';';
	}
	if ( ! empty( $background_maxheight ) ) {
		$out .= 'max-height:' . esc_attr( $background_maxheight ) . ';';
	}
	if ( ! empty( $background_spacing ) ) {
		$out .= goso_builder_spacing_extract_data( $background_spacing );
	}

	$out .= '}';

	return $out;
}

function goso_builder_spacing_extract_data( $number = '', $out = '' ) {
	$mpb = explode( ',', $number );
	if ( isset( $mpb[0] ) && is_numeric( $mpb[0] ) ) {
		$out .= 'margin-top:' . esc_attr( $mpb[0] ) . 'px;';
	}
	if ( isset( $mpb[1] ) && is_numeric( $mpb[1] ) ) {
		$out .= 'margin-right:' . esc_attr( $mpb[1] ) . 'px;';
	}
	if ( isset( $mpb[2] ) && is_numeric( $mpb[2] ) ) {
		$out .= 'margin-bottom:' . esc_attr( $mpb[2] ) . 'px;';
	}
	if ( isset( $mpb[3] ) && is_numeric( $mpb[3] ) ) {
		$out .= 'margin-left:' . esc_attr( $mpb[3] ) . 'px;';
	}

	if ( isset( $mpb[4] ) && is_numeric( $mpb[4] ) ) {
		$out .= 'padding-top:' . esc_attr( $mpb[4] ) . 'px;';
	}
	if ( isset( $mpb[5] ) && is_numeric( $mpb[5] ) ) {
		$out .= 'padding-right:' . esc_attr( $mpb[5] ) . 'px;';
	}
	if ( isset( $mpb[6] ) && is_numeric( $mpb[6] ) ) {
		$out .= 'padding-bottom:' . esc_attr( $mpb[6] ) . 'px;';
	}
	if ( isset( $mpb[7] ) && is_numeric( $mpb[7] ) ) {
		$out .= 'padding-left:' . esc_attr( $mpb[7] ) . 'px;';
	}

	if ( isset( $mpb[8] ) && is_numeric( $mpb[8] ) ) {
		$out .= 'border-top-width:' . esc_attr( $mpb[8] ) . 'px;';
	}
	if ( isset( $mpb[9] ) && is_numeric( $mpb[9] ) ) {
		$out .= 'border-right-width:' . esc_attr( $mpb[9] ) . 'px;';
	}
	if ( isset( $mpb[10] ) && is_numeric( $mpb[10] ) ) {
		$out .= 'border-bottom-width:' . esc_attr( $mpb[10] ) . 'px;';
	}
	if ( isset( $mpb[11] ) && is_numeric( $mpb[11] ) ) {
		$out .= 'border-left-width:' . esc_attr( $mpb[11] ) . 'px;';
	}

	if ( isset( $mpb[12] ) && is_numeric( $mpb[12] ) ) {
		$out .= 'border-top-left-radius:' . esc_attr( $mpb[12] ) . 'px;';
	}
	if ( isset( $mpb[13] ) && is_numeric( $mpb[13] ) ) {
		$out .= 'border-top-right-radius:' . esc_attr( $mpb[13] ) . 'px;';
	}
	if ( isset( $mpb[14] ) && is_numeric( $mpb[14] ) ) {
		$out .= 'border-bottom-right-radius:' . esc_attr( $mpb[14] ) . 'px;';
	}
	if ( isset( $mpb[15] ) && is_numeric( $mpb[15] ) ) {
		$out .= 'border-bottom-left-radius:' . esc_attr( $mpb[15] ) . 'px;';
	}

	return $out;
}

function goso_builder_preview_css( $color_css, $wrap = false ) {
	$out = $before = $after = '';
	foreach ( $color_css as $value => $selector ) {
		$control_value = goso_get_builder_mod( $value );
		$prefix        = is_numeric( $control_value ) ? 'px' : '';
		if ( is_array( $selector ) && ! empty( $control_value ) ) {
			foreach ( $selector as $prop => $subselect ) {
				$out .= $subselect . '{' . $prop . ':' . $control_value . $prefix . '}';
			}
		} elseif ( ! empty( $control_value ) ) {
			$out .= $selector . '{color:' . $control_value . $prefix . '}';
		}
	}

	if ( $wrap ) {
		$before = '<style>';
		$after  = '</style>';
	}

	return $before . $out . $after;
}
