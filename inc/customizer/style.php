<?php
/**
 * Add customize CSS from options customizer
 * Hook to wp_head() function to render style
 *
 * @package Wordpress
 * @since 1.0
 */
if ( ! function_exists( 'gosodesign_return_css' ) ):
	function gosodesign_return_css() {
		ob_start();
		gosodesign_get_customizer_css_file();
		if ( is_page() ) {
			gosodesign_customizer_css_page_header_title();
			gosodesign_customizer_css_page_header_transparent();
		}

		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
endif;

/* Customize CSS */
if ( ! function_exists( 'gosodesign_customizer_css' ) ):
	function gosodesign_customizer_css() {
		if ( get_theme_mod( 'goso_custom_code_inside_head_tag' ) ):
			echo do_shortcode( get_theme_mod( 'goso_custom_code_inside_head_tag' ) );
		endif;

		$option = get_theme_mod( 'goso_spcss_render' );
		if ( 'separate_file' != $option ) {
			$string_css    = gosodesign_return_css();
			$string_render = trim( preg_replace( '/\s+/', ' ', $string_css ) );
			echo '<style id="goso-custom-style" type="text/css">';
			echo $string_render;
			echo '</style>';
		}
	}
endif;

if ( ! function_exists( 'gosodesign_get_customizer_css_file' ) ):
	function gosodesign_get_customizer_css_file() {
		$single_image_ratio = get_theme_mod( 'goso_post_featured_image_ratio' );
		$custom_container   = get_theme_mod( 'goso_custom_container_w' );
		$custom_container2  = get_theme_mod( 'goso_custom_container2_w' );
		$custom_scontainer  = get_theme_mod( 'goso_single_container_w' );
		$custom_scontainer2 = get_theme_mod( 'goso_single_container2_w' );
		?>
        body{
        --pcbg-cl: #fff;
        --pctext-cl: #313131;
        --pcborder-cl: #dedede;
        --pcheading-cl: #313131;
        --pcmeta-cl: #888888;
        --pcaccent-cl: #6eb48c;
        --pcbody-font: 'PT Serif', serif;
        --pchead-font: 'Raleway', sans-serif;
        --pchead-wei: bold;
        }
		.single.goso-body-single-style-5 #header, 
		.single.goso-body-single-style-6 #header, 
		.single.goso-body-single-style-10 #header, 
		.single.goso-body-single-style-5 .pc-wrapbuilder-header, 
		.single.goso-body-single-style-6 .pc-wrapbuilder-header, 
		.single.goso-body-single-style-10 .pc-wrapbuilder-header {
			--pchd-mg: 40px;
		}
        .fluid-width-video-wrapper > div {
			position: absolute;
			left: 0;
			right: 0;
			top: 0;
			width: 100%;
			height: 100%;
        }
		.yt-video-place {
			position: relative;
			text-align: center;
		}
		.yt-video-place.embed-responsive .start-video {
			display: block;
			top: 0;
			left: 0;
			bottom: 0;
			right: 0;
			position: absolute;
			transform: none;
		}
		.yt-video-place.embed-responsive .start-video img {
			margin: 0;
			padding: 0;
			top: 50%;
			display: inline-block;
			position: absolute;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 68px;
			height: auto;
		}
		<?php
		if ( $custom_container && $custom_container > 799 ) {
			echo 'body{--pcctain: ' . $custom_container . 'px}';
			if( $custom_container > 1170 ){
				echo '@media only screen and (min-width: 1170px) and (max-width: '. $custom_container .'px){ body{ --pcctain: calc( 100% - 40px ); } }';
			}
		}

		if ( $custom_container2 && $custom_container2 > 799 ) {
			echo 'body{--pcctain2: ' . $custom_container2 . 'px}';
			if( $custom_container2 > 1400 ){
				echo '@media only screen and (min-width: 1400px) and (max-width: '. $custom_container2 .'px){ body{ --pcctain2: calc( 100% - 40px ); } }';
			}
		}

		if ( $custom_scontainer && $custom_scontainer > 599 ) {
			echo 'body.single{--pcctain: ' . $custom_scontainer . 'px}';
			if( $custom_scontainer > 1170 ){
				echo '@media only screen and (min-width: 1170px) and (max-width: '. $custom_scontainer .'px){ body.single{ --pcctain: calc( 100% - 40px ); } }';
			}
		}

		if ( $custom_scontainer2 && $custom_scontainer2 > 799 ) {
			echo 'body.single{--pcctain2: ' . $custom_scontainer2 . 'px}';
			if( $custom_scontainer2 > 1400 ){
				echo '@media only screen and (min-width: 1400px) and (max-width: '. $custom_scontainer2 .'px){ body.single{ --pcctain2: calc( 100% - 40px ); } }';
			}
		}

		$pmeta_single_image_ratio = get_post_meta( get_the_ID(), 'goso_pfeatured_image_ratio', true );
		if ( $pmeta_single_image_ratio ) {
			$single_image_ratio = $pmeta_single_image_ratio;
		}

		$single_style = goso_get_single_style();

		if ( $single_image_ratio ) {
			$single_image_ratio  = array_filter( explode( ':', $single_image_ratio . ':' ) );
			$single_image_width  = isset( $single_image_ratio[0] ) ? $single_image_ratio[0] : '';
			$single_image_height = isset( $single_image_ratio[1] ) ? $single_image_ratio[1] : '';

			if ( $single_image_width && $single_image_height ) {
				echo '.single .goso-single-featured-img{ padding-top: ' . number_format( $single_image_height / $single_image_width * 100, 4 ) . '% !important; }';
			}
		}

		if ( get_theme_mod( 'goso_featured_image_size' ) == 'square' ) {
			echo '.goso-image-holder:before{ padding-top: 100%; }';
		} elseif ( get_theme_mod( 'goso_featured_image_size' ) == 'vertical' ) {
			echo '.goso-image-holder:before{ padding-top: 135.4%; }';
		} elseif ( get_theme_mod( 'goso_featured_image_size' ) == 'custom' ) {
			$single_image_ratio = get_theme_mod( 'goso_general_featured_image_ratio' );

			if ( $single_image_ratio ) {
				$single_image_ratio  = array_filter( explode( ':', $single_image_ratio . ':' ) );
				$single_image_width  = isset( $single_image_ratio[0] ) ? $single_image_ratio[0] : '';
				$single_image_height = isset( $single_image_ratio[1] ) ? $single_image_ratio[1] : '';

				if ( $single_image_width && $single_image_height ) {
					echo '.goso-image-holder:before{ padding-top: ' . number_format( $single_image_height / $single_image_width * 100, 4 ) . '%; }';
				}
			}
		}

		if ( get_theme_mod( 'goso_mega_featured_image_size' ) == 'square' ) {
			echo '.goso-megamenu .goso-image-holder:before{ padding-top: 100%; }';
		} elseif ( get_theme_mod( 'goso_mega_featured_image_size' ) == 'vertical' ) {
			echo '.goso-megamenu .goso-image-holder:before{ padding-top: 135.4%; }';
		} elseif ( get_theme_mod( 'goso_mega_featured_image_size' ) == 'custom' ) {
			$single_image_ratio = get_theme_mod( 'goso_mega_featured_image_ratio' );

			if ( $single_image_ratio ) {
				$single_image_ratio  = array_filter( explode( ':', $single_image_ratio . ':' ) );
				$single_image_width  = isset( $single_image_ratio[0] ) ? $single_image_ratio[0] : '';
				$single_image_height = isset( $single_image_ratio[1] ) ? $single_image_ratio[1] : '';

				if ( $single_image_width && $single_image_height ) {
					echo '.goso-megamenu .goso-image-holder:before{ padding-top: ' . number_format( $single_image_height / $single_image_width * 100, 4 ) . '%; }';
				}
			}
		}

		if ( function_exists( 'goso_authow_list_self_fonts' ) ) {
			goso_authow_list_self_fonts();
		}
		if ( function_exists( 'goso_authow_add_custom_fonts' ) ) {
			goso_authow_add_custom_fonts();
		}

		if ( get_theme_mod( 'goso_font_for_title' ) && '"Raleway", "100:200:300:regular:500:600:700:800:900", sans-serif' != get_theme_mod( 'goso_font_for_title' ) ) {
			$font_family_title     = get_theme_mod( 'goso_font_for_title' );
			$font_family_title_end = $font_family_title;
			if ( ! array_key_exists( $font_family_title, goso_font_browser() ) ) {
				$font_family_title = str_replace( '"', '', $font_family_title );
				$font_title_explo  = explode( ", ", $font_family_title );
				$font_title        = isset( $font_title_explo[0] ) ? $font_title_explo[0] : '';
				$font_title_serif  = isset( $font_title_explo[2] ) ? $font_title_explo[2] : '';
				$space_end         = ', ';
				if ( empty( $font_title_serif ) ): $space_end = ''; endif;
				$font_family_title_end = "'" . $font_title . "'" . $space_end . $font_title_serif;
			}
			?>
            body { --pchead-font: <?php echo sanitize_text_field( $font_family_title_end ); ?>; }
			<?php
		}
		?>
		<?php
		if ( get_theme_mod( 'goso_font_for_body' ) && '"PT Serif", "regular:italic:700:700italic", serif' != get_theme_mod( 'goso_font_for_body' ) ) {
			$font_family_body     = get_theme_mod( 'goso_font_for_body' );
			$font_family_body_end = $font_family_body;
			if ( ! array_key_exists( $font_family_body, goso_font_browser() ) ) {
				$font_family_body = str_replace( '"', '', $font_family_body );
				$font_body_explo  = explode( ", ", $font_family_body );
				$font_body        = isset( $font_body_explo[0] ) ? $font_body_explo[0] : '';
				$font_body_serif  = isset( $font_body_explo[2] ) ? $font_body_explo[2] : '';
				$space_body_end   = ', ';
				if ( empty( $font_body_serif ) ): $space_body_end = ''; endif;
				$font_family_body_end = "'" . $font_body . "'" . $space_body_end . $font_body_serif;
			}
			?>
            body { --pcbody-font: <?php echo sanitize_text_field( $font_family_body_end ); ?>; } p{ line-height: 1.8; }
			<?php
		}
		if ( get_theme_mod( 'goso_font_weight_bodytext' ) ) {
			?>
            #main #bbpress-forums .bbp-login-form fieldset.bbp-form select, #main #bbpress-forums .bbp-login-form .bbp-form input[type="password"], #main #bbpress-forums .bbp-login-form .bbp-form input[type="text"], .goso-login-register input[type="email"], .goso-login-register input[type="text"], .goso-login-register input[type="password"], .goso-login-register input[type="number"], body, textarea, #respond textarea, .widget input[type="text"], .widget input[type="email"], .widget input[type="date"], .widget input[type="number"], .wpcf7 textarea, .mc4wp-form input, #respond input,
            div.wpforms-container .wpforms-form.wpforms-form input[type=date], div.wpforms-container .wpforms-form.wpforms-form input[type=datetime], div.wpforms-container .wpforms-form.wpforms-form input[type=datetime-local], div.wpforms-container .wpforms-form.wpforms-form input[type=email], div.wpforms-container .wpforms-form.wpforms-form input[type=month], div.wpforms-container .wpforms-form.wpforms-form input[type=number], div.wpforms-container .wpforms-form.wpforms-form input[type=password], div.wpforms-container .wpforms-form.wpforms-form input[type=range], div.wpforms-container .wpforms-form.wpforms-form input[type=search], div.wpforms-container .wpforms-form.wpforms-form input[type=tel], div.wpforms-container .wpforms-form.wpforms-form input[type=text], div.wpforms-container .wpforms-form.wpforms-form input[type=time], div.wpforms-container .wpforms-form.wpforms-form input[type=url], div.wpforms-container .wpforms-form.wpforms-form input[type=week], div.wpforms-container .wpforms-form.wpforms-form select, div.wpforms-container .wpforms-form.wpforms-form textarea,
            .wpcf7 input, form.pc-searchform input.search-input, ul.homepage-featured-boxes .goso-fea-in h4, .widget.widget_categories ul li span.category-item-count, .about-widget .about-me-heading, .widget ul.side-newsfeed li .side-item .side-item-text .side-item-meta { font-weight: <?php echo get_theme_mod( 'goso_font_weight_bodytext' ); ?> }
		<?php } ?>
		<?php
		if ( get_theme_mod( 'goso_font_for_slogan' ) ) {
			$font_family_slogan     = get_theme_mod( 'goso_font_for_slogan' );
			$font_family_slogan_end = $font_family_slogan;
			if ( ! array_key_exists( $font_family_slogan, goso_font_browser() ) ) {
				$font_family_slogan = str_replace( '"', '', $font_family_slogan );
				$font_slogan_explo  = explode( ", ", $font_family_slogan );
				$font_slogan        = isset( $font_slogan_explo[0] ) ? $font_slogan_explo[0] : '';
				$font_slogan_serif  = isset( $font_slogan_explo[2] ) ? $font_slogan_explo[2] : '';
				$space_slogan_end   = ', ';
				if ( empty( $font_slogan_serif ) ): $space_slogan_end = ''; endif;
				$font_family_slogan_end = "'" . $font_slogan . "'" . $space_slogan_end . $font_slogan_serif;
			}
			?>
            .header-slogan .header-slogan-text{ font-family: <?php echo sanitize_text_field( $font_family_slogan_end ); ?>;  }
		<?php } ?>
		<?php
		if ( get_theme_mod( 'goso_font_for_menu' ) ) {
			$font_family_menu     = get_theme_mod( 'goso_font_for_menu' );
			$font_family_menu_end = $font_family_menu;
			if ( ! array_key_exists( $font_family_menu, goso_font_browser() ) ) {
				$font_family_menu = str_replace( '"', '', $font_family_menu );
				$font_menu_explo  = explode( ", ", $font_family_menu );
				$font_menu        = isset( $font_menu_explo[0] ) ? $font_menu_explo[0] : '';
				$font_menu_serif  = isset( $font_menu_explo[2] ) ? $font_menu_explo[2] : '';
				$space_menu_end   = ', ';
				if ( empty( $font_menu_serif ) ): $space_menu_end = ''; endif;
				$font_family_menu_end = "'" . $font_menu . "'" . $space_menu_end . $font_menu_serif;
			}
			?>
            #navigation .menu > li > a, #navigation ul.menu ul.sub-menu li > a, .navigation ul.menu ul.sub-menu li > a, .goso-menu-hbg .menu li a, #sidebar-nav .menu li a { font-family: <?php echo sanitize_text_field( $font_family_menu_end ); ?>; font-weight: normal; }
		<?php } ?>
        .goso-hide-tagupdated{ display: none !important; }
		<?php if ( get_theme_mod( 'goso_font_style_slogan' ) ): ?>
            .header-slogan .header-slogan-text { font-style:<?php echo get_theme_mod( 'goso_font_style_slogan' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_font_weight_slogan' ) ): ?>
            .header-slogan .header-slogan-text { font-weight:<?php echo get_theme_mod( 'goso_font_weight_slogan' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_font_size_slogan' ) ): ?>
            .header-slogan .header-slogan-text { font-size:<?php echo get_theme_mod( 'goso_font_size_slogan' ); ?>px; }
		<?php endif; ?>
		<?php
		$body_size                    = get_theme_mod( 'goso_font_for_size_body' );
		if ( is_numeric( $body_size ) && $body_size > 1 && $body_size != '14' ): ?>
            body, .widget ul li a{ font-size: <?php echo absint( $body_size ); ?>px; }
            .widget ul li, .post-entry, p, .post-entry p { font-size: <?php echo absint( $body_size ); ?>px; line-height: 1.8; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_font_mfor_size_body' ) && '14' != get_theme_mod( 'goso_font_mfor_size_body' ) ): ?>
            @media only screen and (max-width: 480px){ body, .widget ul li a, .widget ul li, .post-entry, p, .post-entry p{ font-size: <?php echo get_theme_mod( 'goso_font_mfor_size_body' ); ?>px; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_archive_fpagetitle' ) ): ?>
            .archive-box span, .archive-box h1{ font-size: <?php echo get_theme_mod( 'goso_archive_fpagetitle' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_archive_mobile_fpagetitle' ) ): ?>
            @media only screen and (max-width: 479px){ .archive-box span, .archive-box h1{ font-size: <?php echo get_theme_mod( 'goso_archive_mobile_fpagetitle' ); ?>px; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_archive_uppagetitle' ) ): ?>
            .archive-box span, .archive-box h1{ text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_body_line_height' ) && '1.8' != get_theme_mod( 'goso_body_line_height' ) ): ?>
            .widget ul li, .post-entry, p, .post-entry p{ line-height: <?php echo get_theme_mod( 'goso_body_line_height' ); ?>; }
		<?php endif; ?>
		<?php
		if ( get_theme_mod( 'goso_font_weight_title' ) ) {
			?>
            body { --pchead-wei: <?php echo get_theme_mod( 'goso_font_weight_title' ); ?>; }
			<?php
		}
		?>
		<?php if ( get_theme_mod( 'goso_image_border_radius' ) ) { ?>
            .goso-image-holder, .standard-post-image img, .goso-overlay-over:before, .goso-overlay-over .overlay-border, .goso-grid li .item img,
            .goso-masonry .item-masonry a img, .goso-grid .list-post.list-boxed-post, .goso-grid li.list-boxed-post-2 .content-boxed-2, .grid-mixed,
            .goso-grid li.typography-style .overlay-typography, .goso-grid li.typography-style .overlay-typography:before, .goso-grid li.typography-style .overlay-typography:after,
            .container-single .post-image, .home-featured-cat-content .mag-photo .mag-overlay-photo, .mag-single-slider-overlay, ul.homepage-featured-boxes li .goso-fea-in:before, ul.homepage-featured-boxes li .goso-fea-in:after, ul.homepage-featured-boxes .goso-fea-in .fea-box-img:after, ul.homepage-featured-boxes li .goso-fea-in, .goso-slider38-overlay, .pcbg-thumb, .pcbg-bgoverlay { border-radius: <?php echo get_theme_mod( 'goso_image_border_radius' ); ?>; -webkit-border-radius: <?php echo get_theme_mod( 'goso_image_border_radius' ); ?>; }
            .goso-featured-content-right:before{ border-top-right-radius: <?php echo get_theme_mod( 'goso_image_border_radius' ); ?>; border-bottom-right-radius: <?php echo get_theme_mod( 'goso_image_border_radius' ); ?>; }
            .goso-slider4-overlay, .goso-slide-overlay .overlay-link, .featured-style-29 .featured-slider-overlay, .goso-widget-slider-overlay{ border-radius: <?php echo get_theme_mod( 'goso_image_border_radius' ); ?>; -webkit-border-radius: <?php echo get_theme_mod( 'goso_image_border_radius' ); ?>; }
            .goso-flat-overlay .goso-slide-overlay .goso-mag-featured-content:before{ border-bottom-left-radius: <?php echo get_theme_mod( 'goso_image_border_radius' ); ?>; border-bottom-right-radius: <?php echo get_theme_mod( 'goso_image_border_radius' ); ?>; }
		<?php } ?>
		<?php if ( get_theme_mod( 'goso_slider_border_radius' ) || '0' == get_theme_mod( 'goso_slider_border_radius' ) ) { ?>
            .featured-area .goso-image-holder, .featured-area .goso-slider4-overlay, .featured-area .goso-slide-overlay .overlay-link, .featured-style-29 .featured-slider-overlay, .goso-slider38-overlay{ border-radius: <?php echo get_theme_mod( 'goso_slider_border_radius' ); ?>; -webkit-border-radius: <?php echo get_theme_mod( 'goso_slider_border_radius' ); ?>; }
            .goso-featured-content-right:before{ border-top-right-radius: <?php echo get_theme_mod( 'goso_image_border_radius' ); ?>; border-bottom-right-radius: <?php echo get_theme_mod( 'goso_image_border_radius' ); ?>; }
            .goso-flat-overlay .goso-slide-overlay .goso-mag-featured-content:before{ border-bottom-left-radius: <?php echo get_theme_mod( 'goso_image_border_radius' ); ?>; border-bottom-right-radius: <?php echo get_theme_mod( 'goso_image_border_radius' ); ?>; }
		<?php } ?>
		<?php if ( get_theme_mod( 'goso_post_featured_image_radius' ) || '0' == get_theme_mod( 'goso_post_featured_image_radius' ) ) { ?>
            .container-single .post-image{ border-radius: <?php echo get_theme_mod( 'goso_post_featured_image_radius' ); ?>; -webkit-border-radius: <?php echo get_theme_mod( 'goso_post_featured_image_radius' ); ?>; }
		<?php } ?>
		<?php if ( get_theme_mod( 'goso_megamenu_border_radius' ) || '0' == get_theme_mod( 'goso_megamenu_border_radius' ) ) { ?>
            .goso-mega-thumbnail .goso-image-holder{ border-radius: <?php echo get_theme_mod( 'goso_megamenu_border_radius' ); ?>; -webkit-border-radius: <?php echo get_theme_mod( 'goso_megamenu_border_radius' ); ?>; }
		<?php } ?>

		<?php if ( get_theme_mod( 'goso_separator_post_meta' ) ) {
			$separator_meta           = get_theme_mod( 'goso_separator_post_meta' );
			$separator_meta_selectors = '.goso-magazine-slider .mag-item-1 .mag-meta-child span:after, .goso-magazine-slider .mag-meta-child span:after, .post-box-meta-single > span:before, .standard-top-meta > span:before, .goso-mag-featured-content .feat-meta > span:after, .goso-featured-content .feat-text .feat-meta > span:after, .featured-style-35 .featured-content-excerpt .feat-meta > span:after, .goso-post-box-meta .goso-box-meta span:after, .grid-post-box-meta span:after, .overlay-post-box-meta > div:after';
			?>
			<?php if ( 'horiline' == $separator_meta ) { ?>
				<?php echo $separator_meta_selectors; ?>{ height: 1px; width: 5px; border: none; border-top: 1px solid; vertical-align: middle; }
			<?php } else if ( 'bcricle' == $separator_meta ) { ?>
				<?php echo $separator_meta_selectors; ?>{ box-sizing: border-box; -webkit-box-sizing: border-box; width: 4px; height: 4px; border: 1px solid; border-radius: 2px; transform: translateY(-2px); -webkit-transform: translateY(-2px); }
			<?php } else if ( 'circle' == $separator_meta ) { ?>
				<?php echo $separator_meta_selectors; ?>{ box-sizing: border-box; -webkit-box-sizing: border-box; width: 4px; height: 4px; border: 2px solid; border-radius: 2px; transform: translateY(-2px); -webkit-transform: translateY(-2px); }
			<?php } else if ( 'bsquare' == $separator_meta ) { ?>
				<?php echo $separator_meta_selectors; ?>{ box-sizing: border-box; -webkit-box-sizing: border-box; width: 4px; height: 4px; border: 1px solid; transform: translateY(-2px); -webkit-transform: translateY(-2px); }
			<?php } else if ( 'square' == $separator_meta ) { ?>
				<?php echo $separator_meta_selectors; ?>{ box-sizing: border-box; -webkit-box-sizing: border-box; width: 4px; height: 4px; border: 2px solid; transform: translateY(-2px); -webkit-transform: translateY(-2px); }
			<?php } else if ( 'diamond' == $separator_meta ) { ?>
				<?php echo $separator_meta_selectors; ?>{ box-sizing: border-box; -webkit-box-sizing: border-box; width: 4px; height: 4px; border: 2px solid; transform: translateY(-2px) rotate(45deg); -webkit-transform: translateY(-2px) rotate(45deg); }
			<?php } else if ( 'bdiamond' == $separator_meta ) { ?>
				<?php echo $separator_meta_selectors; ?>{ margin: 0 12px 0 12px; box-sizing: border-box; -webkit-box-sizing: border-box; width: 5px; height: 5px; border: 1px solid; transform: translateY(-2px) rotate(45deg); -webkit-transform: translateY(-2px) rotate(45deg); }
			<?php } ?>
		<?php } ?>

		<?php if ( get_theme_mod( 'goso_separator_cat' ) ) {
			$separator_cat           = get_theme_mod( 'goso_separator_cat' );
			$separator_cat_selectors = '.cat > a.goso-cat-name:after';
			?>
			<?php if ( 'horiline' == $separator_cat ) { ?>
				<?php echo $separator_cat_selectors; ?>{ height: 1px; width: 5px; border: none; border-top: 1px solid; vertical-align: middle; transform: none; margin-top: 0; }
			<?php } else if ( 'bcricle' == $separator_cat ) { ?>
				<?php echo $separator_cat_selectors; ?>{ width: 4px; height: 4px; box-sizing: border-box; -webkit-box-sizing: border-box; transform: none; border-radius: 2px; margin-top: -2px; }
			<?php } else if ( 'circle' == $separator_cat ) { ?>
				<?php echo $separator_cat_selectors; ?>{ width: 4px; height: 4px; box-sizing: border-box; -webkit-box-sizing: border-box; transform: none; border-radius: 2px; margin-top: -2px; border-width: 2px; }
			<?php } else if ( 'bsquare' == $separator_cat ) { ?>
				<?php echo $separator_cat_selectors; ?>{ width: 4px; height: 4px; box-sizing: border-box; -webkit-box-sizing: border-box; transform: none; margin-top: -2px; }
			<?php } else if ( 'square' == $separator_cat ) { ?>
				<?php echo $separator_cat_selectors; ?>{ width: 4px; height: 4px; box-sizing: border-box; -webkit-box-sizing: border-box; transform: none; margin-top: -2px; border-width: 2px; }
			<?php } else if ( 'diamond' == $separator_cat ) { ?>
				<?php echo $separator_cat_selectors; ?>{ width: 4px; height: 4px; box-sizing: border-box; -webkit-box-sizing: border-box; margin-top: -2px; border-width: 2px; }
			<?php } else if ( 'verline' == $separator_cat ) { ?>
				<?php echo $separator_cat_selectors; ?>{ height: 8px; width: 1px; border: none; border-right: 1px solid; transform: none; margin-top: -4px; }
			<?php } ?>
		<?php } ?>

		<?php if ( get_theme_mod( 'goso_catdesign' ) ) {
			$pccatdesign = get_theme_mod( 'goso_catdesign' ); ?>
            .cat > a.goso-cat-name{ font-size: 11px; padding: 2px 7px; color: #fff; line-height: 14px; background: rgba(0, 0, 0, 0.8); margin: 0 6px 5px 0; }
            .cat > a.goso-cat-name:last-child{ padding: 2px 7px; }
            body.rtl .cat > a.goso-cat-name{ margin-left: 6px; margin-right: 0; }
            .cat > a.goso-cat-name:hover{ background: var(--pcaccent-cl); }
            .cat > a.goso-cat-name:after{ content: none; display: none; }
			<?php if ( 'fillr' == $pccatdesign ): ?>
                .cat > a.goso-cat-name{ border-radius: 3px; -webkit-border-radius: 3px; }
			<?php endif; ?>
			<?php if ( 'fillc' == $pccatdesign ): ?>
                .cat > a.goso-cat-name{ border-radius: 20px; -webkit-border-radius: 20px;}
                .cat > a.goso-cat-name, .cat > a.goso-cat-name:last-child{ padding: 2px 10px; }
			<?php endif; ?>
		<?php } ?>
		<?php if ( get_theme_mod( 'goso_cfiled_cl' ) ) { ?>
            .pccatds-filled .cat > a.goso-cat-name{ color: <?php echo get_theme_mod( 'goso_cfiled_cl' ); ?>; }
		<?php } ?>
		<?php if ( get_theme_mod( 'goso_cfiled_bgcl' ) ) { ?>
            .pccatds-filled .cat > a.goso-cat-name{ background-color: <?php echo get_theme_mod( 'goso_cfiled_bgcl' ); ?>; }
		<?php } ?>
		<?php if ( get_theme_mod( 'goso_cfiled_hcl' ) ) { ?>
            .pccatds-filled .cat > a.goso-cat-name:hover{ color: <?php echo get_theme_mod( 'goso_cfiled_hcl' ); ?>; }
		<?php } ?>
		<?php if ( get_theme_mod( 'goso_cfiled_hbgcl' ) ) { ?>
            .pccatds-filled .cat > a.goso-cat-name:hover{ background-color: <?php echo get_theme_mod( 'goso_cfiled_hbgcl' ); ?>; }
		<?php } ?>
		<?php if ( get_theme_mod( 'goso_font_weight_menu' ) ) { ?>
            #navigation .menu > li > a, #navigation ul.menu ul.sub-menu li > a, .navigation ul.menu ul.sub-menu li > a, .goso-menu-hbg .menu li a, #sidebar-nav .menu li a, #navigation .goso-megamenu .goso-mega-child-categories a, .navigation .goso-megamenu .goso-mega-child-categories a{ font-weight: <?php echo get_theme_mod( 'goso_font_weight_menu' ); ?>; }
		<?php } ?>
		<?php if ( get_theme_mod( 'goso_body_boxed_bg_color' ) ): ?>
            body.goso-body-boxed { background-color:<?php echo get_theme_mod( 'goso_body_boxed_bg_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_body_boxed_bg_image' ) ): ?>
            body.goso-body-boxed { background-image: url(<?php echo get_theme_mod( 'goso_body_boxed_bg_image' ); ?>); }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_body_boxed_bg_repeat' ) ): ?>
            body.goso-body-boxed { background-repeat:<?php echo get_theme_mod( 'goso_body_boxed_bg_repeat' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_body_boxed_bg_attachment' ) ): ?>
            body.goso-body-boxed { background-attachment:<?php echo get_theme_mod( 'goso_body_boxed_bg_attachment' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_body_boxed_bg_size' ) ): ?>
            body.goso-body-boxed { background-size:<?php echo get_theme_mod( 'goso_body_boxed_bg_size' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_padding' ) ): ?>
            #header .inner-header .container { padding:<?php echo get_theme_mod( 'goso_header_padding' ); ?>px 0; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_logo_max_width' ) && get_theme_mod( 'goso_logo_max_width' ) > 0 ): ?>
            #logo a { max-width:<?php echo get_theme_mod( 'goso_logo_max_width' ); ?>px; width: 100%; }
            @media only screen and (max-width: 960px) and (min-width: 768px){ #logo img{ max-width: 100%; } }
			<?php if ( get_theme_mod( 'goso_logo' ) ) {
				$logo_url_upload = get_theme_mod( 'goso_logo' );
				$logo_type       = wp_check_filetype( $logo_url_upload );
				if ( 'svg' == $logo_type['ext'] ) {
					echo '#logo a img, #navigation.header-6 #logo img{ width: 100%; }';
				}
			} ?>
		<?php endif; ?>
		<?php
		/* CSL for logo img */
		if ( get_theme_mod( 'goso_logo' ) && ! is_user_logged_in() && get_theme_mod( 'goso_enable_spoptimizer' ) && function_exists( 'hpp_shouldlazy' ) && hpp_shouldlazy() ) {
			$logo_src_data   = get_theme_mod( 'goso_logo' );
			$logo_src_width  = goso_get_image_data_basedurl( $logo_src_data, 'w' );
			$logo_src_height = goso_get_image_data_basedurl( $logo_src_data, 'h' );
			if ( $logo_src_width && $logo_src_height ) {
				$logo_maxwidth      = get_theme_mod( 'goso_logo_max_width' );
				$logo_src_ratio     = $logo_src_height / $logo_src_width;
				$array_logo_width   = array( 1170 );
				$array_logo_width[] = (int) $logo_src_width;
				if ( $logo_maxwidth ) {
					$logo_src_mw_data   = get_theme_mod( 'goso_logo_max_width' );
					$array_logo_width[] = (int) $logo_src_mw_data;
				}
				$logo_height_desktop = round( min( $array_logo_width ) * $logo_src_ratio );
				if ( $logo_src_width > 355 ) {
					if ( ! $logo_maxwidth || ( $logo_maxwidth && ( $logo_maxwidth > 355 ) ) ) {
						$logo_height_mobile = round( 355 * $logo_src_ratio );
					} elseif ( $logo_maxwidth && ( $logo_maxwidth < 355 ) ) {
						$logo_height_mobile = round( $logo_maxwidth * $logo_src_ratio );
					}
				}
				echo '@media only screen and (min-width: 1170px){.inner-header img.pclogo-cls{ width: auto; height:' . $logo_height_desktop . 'px;}}';
				echo '@media only screen and (max-width: 479px){.inner-header img.pclogo-cls{ width: auto; height:' . $logo_height_mobile . 'px;}}';
			}
		}
		if ( get_theme_mod( 'goso_logo_height' ) ): ?>
            @media only screen and (min-width: 1170px){.inner-header #logo img{ width: auto; height:<?php echo get_theme_mod( 'goso_logo_height' ); ?>px; }}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_logo_height_mobile' ) ): ?>
            @media only screen and (max-width: 479px){ .inner-header #logo img{ width: auto; height:<?php echo get_theme_mod( 'goso_logo_height_mobile' ); ?>px; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_logo_max_width_overflow' ) && get_theme_mod( 'goso_logo_max_width_overflow' ) > 0 ): ?>
            @media only screen and (min-width: 960px){.is-sticky #navigation.goso-logo-overflow.header-10 #logo a, .is-sticky #navigation.goso-logo-overflow.header-11 #logo a{ max-width:<?php echo get_theme_mod( 'goso_logo_max_width_overflow' ); ?>px; }}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_page_custom_width' ) ): ?>
            .goso-page-container-smaller { max-width:<?php echo get_theme_mod( 'goso_page_custom_width' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_page_title_uppercase' ) ): ?>
            .goso-page-header h1 { text-transform: none; }
		<?php endif; ?>
		<?php echo goso_renders_css( '.goso-page-header h1', 'goso_page_title_fsize' ); ?>
		<?php if ( get_theme_mod( 'goso_pagetitle_color' ) ): ?>
            .goso-page-header h1 { color: <?php echo get_theme_mod( 'goso_pagetitle_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_page_sharetext_fsize' ) ): ?>
            .tags-share-box.hide-tags.page-share .share-title{ font-size: <?php echo get_theme_mod( 'goso_page_sharetext_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_page_shareicon_fsize' ) ): ?>
            .tags-share-box.hide-tags.page-share .post-share a{ font-size: <?php echo get_theme_mod( 'goso_page_shareicon_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_psharetext_color' ) ): ?>
            .tags-share-box.hide-tags.page-share .share-title{ color: <?php echo get_theme_mod( 'goso_psharetext_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_pageshareicon_color' ) ): ?>
            .tags-share-box.hide-tags.page-share .post-share a{ color: <?php echo get_theme_mod( 'goso_pageshareicon_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_pageshareicon_hcolor' ) ): ?>
            .tags-share-box.hide-tags.page-share .post-share a:hover{ color: <?php echo get_theme_mod( 'goso_pageshareicon_hcolor' ); ?>; }
		<?php endif; ?>

		<?php if ( get_theme_mod( 'goso_not_found_removeline' ) ): ?>
            .error-image{ padding-bottom: 0; } .error-image:after{ content: none; display: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_notfound_message_fsize' ) ): ?>
            .error-404 .sub-heading-text-404{ font-size: <?php echo get_theme_mod( 'goso_notfound_message_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_notfound_input_fsize' ) ): ?>
            .error-404 form.pc-searchform input.search-input{ font-size: <?php echo get_theme_mod( 'goso_notfound_input_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_notfound_backhome_fsize' ) ): ?>
            .error-404 .go-back-home a{ font-size: <?php echo get_theme_mod( 'goso_notfound_backhome_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_404_line_color' ) ): ?>
            .error-image:after{ background-color: <?php echo get_theme_mod( 'goso_404_line_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_404_message_ctext' ) ): ?>
            .error-404 .sub-heading-text-404{ color: <?php echo get_theme_mod( 'goso_404_message_ctext' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_404_input_color' ) ): ?>
            .error-404 form.pc-searchform input.search-input{ color: <?php echo get_theme_mod( 'goso_404_input_color' ); ?>; }
            .error-404 form.pc-searchform input.search-input::-webkit-input-placeholder{ color: <?php echo get_theme_mod( 'goso_404_input_color' ); ?>; }
            .error-404 form.pc-searchform input.search-input:-ms-input-placeholder{ color: <?php echo get_theme_mod( 'goso_404_input_color' ); ?>; }
            .error-404 form.pc-searchform input.search-input::placeholder{ color: <?php echo get_theme_mod( 'goso_404_input_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_404_formborder_color' ) ): ?>
            .error-404 form.pc-searchform input.search-input{ border-color: <?php echo get_theme_mod( 'goso_404_formborder_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_404_backhome_color' ) ): ?>
            .error-404 .go-back-home a{ color: <?php echo get_theme_mod( 'goso_404_backhome_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_post_caption_below' ) ): ?>
            .wp-caption p.wp-caption-text, .goso-featured-caption { position: static; background: none; padding: 11px 0 0; color: #888; }
            .wp-caption:hover p.wp-caption-text, .post-image:hover .goso-featured-caption{ opacity: 1; transform: none; -webkit-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_post_caption_disable_italic' ) ): ?>
            .wp-caption p.wp-caption-text, .goso-featured-caption { font-style: normal; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_enable_dark_layout' ) ): ?>
            .post-entry .wp-block-quote, .wpb_text_column .wp-block-quote, .woocommerce .page-description .wp-block-quote{ border-color: #888; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_bg_color_dark' ) ): ?>
            body{ --pcbg-cl: <?php echo goso_get_setting( 'goso_bg_color_dark' ); ?>; }
            .goso-single-style-7:not( .goso-single-pheader-noimg ).goso_sidebar #main article.post, .goso-single-style-3:not( .goso-single-pheader-noimg ).goso_sidebar #main article.post { background-color: var(--pcbg-cl); }
            @media only screen and (max-width: 767px){ .standard-post-special_wrapper { background: var(--pcbg-cl); } }
            .wrapper-boxed, .wrapper-boxed.enable-boxed, .home-pupular-posts-title span, .goso-post-box-meta.goso-post-box-grid .goso-post-share-box, .goso-pagination.goso-ajax-more a.goso-ajax-more-button, .woocommerce .woocommerce-product-search input[type="search"], .overlay-post-box-meta, .widget ul.side-newsfeed li.featured-news2 .side-item .side-item-text, .widget select, .widget select option, .woocommerce .woocommerce-error, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message, #goso-demobar, #goso-demobar .style-toggle, .grid-overlay-meta .grid-header-box, .header-standard.standard-overlay-meta{ background-color: var(--pcbg-cl); }
            .goso-grid .list-post.list-boxed-post .item > .thumbnail:before{ border-right-color: var(--pcbg-cl); }
            .goso-grid .list-post.list-boxed-post:nth-of-type(2n+2) .item > .thumbnail:before{ border-left-color: var(--pcbg-cl); }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_border_color_dark' ) ): ?>
            body{ --pcborder-cl: <?php echo goso_get_setting( 'goso_border_color_dark' ); ?>; }
            #main #bbpress-forums .bbp-login-form fieldset.bbp-form select, #main #bbpress-forums .bbp-login-form .bbp-form input[type="password"], #main #bbpress-forums .bbp-login-form .bbp-form input[type="text"],
            .widget ul li, .grid-mixed, .goso-post-box-meta, .goso-pagination.goso-ajax-more a.goso-ajax-more-button, .widget-social a i, .goso-home-popular-posts, .header-header-1.has-bottom-line, .header-header-4.has-bottom-line, .header-header-7.has-bottom-line, .container-single .post-entry .post-tags a,.tags-share-box.tags-share-box-2_3,.tags-share-box.tags-share-box-top, .tags-share-box, .post-author, .post-pagination, .post-related, .post-comments .post-title-box, .comments .comment, #respond textarea, .wpcf7 textarea, #respond input,
            div.wpforms-container .wpforms-form.wpforms-form input[type=date], div.wpforms-container .wpforms-form.wpforms-form input[type=datetime], div.wpforms-container .wpforms-form.wpforms-form input[type=datetime-local], div.wpforms-container .wpforms-form.wpforms-form input[type=email], div.wpforms-container .wpforms-form.wpforms-form input[type=month], div.wpforms-container .wpforms-form.wpforms-form input[type=number], div.wpforms-container .wpforms-form.wpforms-form input[type=password], div.wpforms-container .wpforms-form.wpforms-form input[type=range], div.wpforms-container .wpforms-form.wpforms-form input[type=search], div.wpforms-container .wpforms-form.wpforms-form input[type=tel], div.wpforms-container .wpforms-form.wpforms-form input[type=text], div.wpforms-container .wpforms-form.wpforms-form input[type=time], div.wpforms-container .wpforms-form.wpforms-form input[type=url], div.wpforms-container .wpforms-form.wpforms-form input[type=week], div.wpforms-container .wpforms-form.wpforms-form select, div.wpforms-container .wpforms-form.wpforms-form textarea,
            .wpcf7 input, .widget_wysija input, #respond h3, form.pc-searchform input.search-input, .post-password-form input[type="text"], .post-password-form input[type="email"], .post-password-form input[type="password"], .post-password-form input[type="number"], .goso-recipe, .goso-recipe-heading, .goso-recipe-ingredients, .goso-recipe-notes, .goso-pagination ul.page-numbers li span, .goso-pagination ul.page-numbers li a, #comments_pagination span, #comments_pagination a, body.author .post-author, .tags-share-box.hide-tags.page-share, .goso-grid li.list-post, .goso-grid li.list-boxed-post-2 .content-boxed-2, .home-featured-cat-content .mag-post-box, .home-featured-cat-content.style-2 .mag-post-box.first-post, .home-featured-cat-content.style-10 .mag-post-box.first-post, .widget select, .widget ul ul, .widget input[type="text"], .widget input[type="email"], .widget input[type="date"], .widget input[type="number"], .widget input[type="search"], .widget .tagcloud a, #wp-calendar tbody td, .woocommerce div.product .entry-summary div[itemprop="description"] td, .woocommerce div.product .entry-summary div[itemprop="description"] th, .woocommerce div.product .woocommerce-tabs #tab-description td, .woocommerce div.product .woocommerce-tabs #tab-description th, .woocommerce-product-details__short-description td, th, .woocommerce ul.cart_list li, .woocommerce ul.product_list_widget li, .woocommerce .widget_shopping_cart .total, .woocommerce.widget_shopping_cart .total, .woocommerce .woocommerce-product-search input[type="search"], .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce div.product .product_meta, .woocommerce div.product .woocommerce-tabs ul.tabs, .woocommerce div.product .related > h2, .woocommerce div.product .upsells > h2, .woocommerce #reviews #comments ol.commentlist li .comment-text, .woocommerce table.shop_table td, .post-entry td, .post-entry th, #add_payment_method .cart-collaterals .cart_totals tr td, #add_payment_method .cart-collaterals .cart_totals tr th, .woocommerce-cart .cart-collaterals .cart_totals tr td, .woocommerce-cart .cart-collaterals .cart_totals tr th, .woocommerce-checkout .cart-collaterals .cart_totals tr td, .woocommerce-checkout .cart-collaterals .cart_totals tr th, .woocommerce-cart .cart-collaterals .cart_totals table, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce table.shop_table a.remove, .woocommerce form .form-row .input-text, .woocommerce-page form .form-row .input-text, .woocommerce .woocommerce-error, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message, .woocommerce form.checkout_coupon, .woocommerce form.login, .woocommerce form.register, .woocommerce form.checkout table.shop_table, .woocommerce-checkout #payment ul.payment_methods, .post-entry table, .wrapper-goso-review, .goso-review-container.goso-review-count, #goso-demobar .style-toggle, #widget-area, .post-entry hr, .wpb_text_column hr, #buddypress .dir-search input[type=search], #buddypress .dir-search input[type=text], #buddypress .groups-members-search input[type=search], #buddypress .groups-members-search input[type=text], #buddypress ul.item-list, #buddypress .profile[role=main], #buddypress select, #buddypress div.pagination .pagination-links span, #buddypress div.pagination .pagination-links a, #buddypress div.pagination .pag-count, #buddypress div.pagination .pagination-links a:hover, #buddypress ul.item-list li, #buddypress table.forum tr td.label, #buddypress table.messages-notices tr td.label, #buddypress table.notifications tr td.label, #buddypress table.notifications-settings tr td.label, #buddypress table.profile-fields tr td.label, #buddypress table.wp-profile-fields tr td.label, #buddypress table.profile-fields:last-child, #buddypress form#whats-new-form textarea, #buddypress .standard-form input[type=text], #buddypress .standard-form input[type=color], #buddypress .standard-form input[type=date], #buddypress .standard-form input[type=datetime], #buddypress .standard-form input[type=datetime-local], #buddypress .standard-form input[type=email], #buddypress .standard-form input[type=month], #buddypress .standard-form input[type=number], #buddypress .standard-form input[type=range], #buddypress .standard-form input[type=search], #buddypress .standard-form input[type=password], #buddypress .standard-form input[type=tel], #buddypress .standard-form input[type=time], #buddypress .standard-form input[type=url], #buddypress .standard-form input[type=week], .bp-avatar-nav ul, .bp-avatar-nav ul.avatar-nav-items li.current, #bbpress-forums li.bbp-body ul.forum, #bbpress-forums li.bbp-body ul.topic, #bbpress-forums li.bbp-footer, .bbp-pagination-links a, .bbp-pagination-links span.current, .wrapper-boxed .bbp-pagination-links a:hover, .wrapper-boxed .bbp-pagination-links span.current, #buddypress .standard-form select, #buddypress .standard-form input[type=password], #buddypress .activity-list li.load-more a, #buddypress .activity-list li.load-newest a, #buddypress ul.button-nav li a, #buddypress div.generic-button a, #buddypress .comment-reply-link, #bbpress-forums div.bbp-template-notice.info, #bbpress-forums #bbp-search-form #bbp_search, #bbpress-forums .bbp-forums-list, #bbpress-forums #bbp_topic_title, #bbpress-forums #bbp_topic_tags, #bbpress-forums .wp-editor-container, .widget_display_stats dd, .widget_display_stats dt, div.bbp-forum-header, div.bbp-topic-header, div.bbp-reply-header, .widget input[type="text"], .widget input[type="email"], .widget input[type="date"], .widget input[type="number"], .widget input[type="search"], .widget input[type="password"], blockquote.wp-block-quote, .post-entry blockquote.wp-block-quote, .wp-block-quote:not(.is-large):not(.is-style-large), .post-entry pre, .wp-block-pullquote:not(.is-style-solid-color), .post-entry hr.wp-block-separator, .wp-block-separator, .wp-block-latest-posts, .wp-block-yoast-how-to-block ol.schema-how-to-steps, .wp-block-yoast-how-to-block ol.schema-how-to-steps li, .wp-block-yoast-faq-block .schema-faq-section, .post-entry .wp-block-quote, .wpb_text_column .wp-block-quote, .woocommerce .page-description .wp-block-quote, .wp-block-search .wp-block-search__input{ border-color: var(--pcborder-cl); }
            .goso-recipe-index-wrap h4.recipe-index-heading > span:before, .goso-recipe-index-wrap h4.recipe-index-heading > span:after{ border-color: var(--pcborder-cl); opacity: 1; }
            .tags-share-box .single-comment-o:after, .post-share a.goso-post-like:after{ background-color: var(--pcborder-cl); }
            .goso-grid .list-post.list-boxed-post{ border-color: var(--pcborder-cl) !important; }
            .goso-post-box-meta.goso-post-box-grid:before, .woocommerce .widget_price_filter .ui-slider .ui-slider-range{ background-color: var(--pcborder-cl); }
            .goso-pagination.goso-ajax-more a.goso-ajax-more-button.loading-posts{ border-color: var(--pcborder-cl) !important; }
            .goso-vernav-enable .goso-menu-hbg{ box-shadow: none; -webkit-box-shadow: none; -moz-box-shadow: none; }
            .goso-vernav-enable.goso-vernav-poleft .goso-menu-hbg{ border-right: 1px solid var(--pcborder-cl); }
            .goso-vernav-enable.goso-vernav-poright .goso-menu-hbg{ border-left: 1px solid var(--pcborder-cl); }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_enable_dark_layout' ) ): ?>
            body.pcdark-mode{ --pcmeta-cl: <?php echo goso_get_setting( 'goso_meta_color_dark' ); ?>; --pctext-cl: <?php echo goso_get_setting( 'goso_text_color_dark' ); ?>; --pcheading-cl: #f5f5f5; }
            body, .goso-post-box-meta .goso-post-share-box a, .goso-pagination a, .goso-pagination .disable-url, .widget-social a i, .post-share a, #respond textarea, .wpcf7 textarea, #respond input, .wpcf7 input, .widget_wysija input, #respond h3 small a, #respond h3 small a:hover, .post-comments span.reply a, .post-comments span.reply a:hover, .thecomment .comment-text span.author, .thecomment .comment-text span.author a, #respond h3.comment-reply-title span, .post-box-title, .post-pagination a, .post-pagination span, .author-content .author-social, .author-content h5 a, .error-404 .sub-heading-text-404, form.pc-searchform input.search-input, input, .goso-pagination ul.page-numbers li span, .goso-pagination ul.page-numbers li a, #comments_pagination span, #comments_pagination a, .item-related h3 a, .archive-box span, .archive-box h1, .header-standard .author-post span a, .post-entry h1, .post-entry h2, .post-entry h3, .post-entry h4, .post-entry h5, .post-entry h6, .wpb_text_column h1, .wpb_text_column h2, .wpb_text_column h3, .wpb_text_column h4, .wpb_text_column h5, .wpb_text_column h6, .tags-share-box.hide-tags.page-share .share-title, .about-widget .about-me-heading, .goso-tweets-widget-content .tweet-text, .widget select, .widget ul li, .widget .tagcloud a, #wp-calendar caption, .woocommerce .page-title, .woocommerce ul.products li.product h3, .woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce .widget_price_filter .price_label, .woocommerce .woocommerce-product-search input[type="search"], .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce div.product .entry-summary div[itemprop="description"] h1, .woocommerce div.product .entry-summary div[itemprop="description"] h2, .woocommerce div.product .entry-summary div[itemprop="description"] h3, .woocommerce div.product .entry-summary div[itemprop="description"] h4, .woocommerce div.product .entry-summary div[itemprop="description"] h5, .woocommerce div.product .entry-summary div[itemprop="description"] h6, .woocommerce div.product .woocommerce-tabs #tab-description h1, .woocommerce div.product .woocommerce-tabs #tab-description h2, .woocommerce div.product .woocommerce-tabs #tab-description h3, .woocommerce div.product .woocommerce-tabs #tab-description h4, .woocommerce div.product .woocommerce-tabs #tab-description h5, .woocommerce div.product .woocommerce-tabs #tab-description h6, .woocommerce-product-details__short-description h1, .woocommerce-product-details__short-description h2, .woocommerce-product-details__short-description h3, .woocommerce-product-details__short-description h4, .woocommerce-product-details__short-description h5, .woocommerce-product-details__short-description h6,
            .woocommerce div.product .woocommerce-tabs .panel > h2:first-child, .woocommerce div.product .woocommerce-tabs .panel #reviews #comments h2, .woocommerce div.product .woocommerce-tabs .panel #respond h3.comment-reply-title, .woocommerce div.product .woocommerce-tabs .panel #respond .comment-reply-title, .woocommerce div.product .related > h2, .woocommerce div.product .upsells > h2, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce .comment-form p.stars a, .woocommerce #reviews #comments ol.commentlist li .comment-text .meta strong, .goso-page-header h1, .woocommerce table.shop_table a.remove, .woocommerce table.shop_table td.product-name a, .woocommerce table.shop_table th, .woocommerce form .form-row .input-text, .woocommerce-page form .form-row .input-text, .demobar-title, .demobar-desc, .container-single .post-share a, .page-share .post-share a, .footer-instagram h4.footer-instagram-title, .post-entry .goso-portfolio-filter ul li a, .goso-portfolio-filter ul li a, .widget-social.show-text a span, #buddypress select, #buddypress div.pagination .pagination-links a:hover, #buddypress div.pagination .pagination-links span, #buddypress div.pagination .pagination-links a, #buddypress div.pagination .pag-count, #buddypress ul.item-list li div.item-title span, #buddypress div.item-list-tabs:not(#subnav) ul li a, #buddypress div.item-list-tabs:not(#subnav) ul li > span, #buddypress div#item-header div#item-meta, #buddypress form#whats-new-form textarea, #buddypress .standard-form input[type=text], #buddypress .standard-form input[type=color], #buddypress .standard-form input[type=date], #buddypress .standard-form input[type=datetime], #buddypress .standard-form input[type=datetime-local], #buddypress .standard-form input[type=email], #buddypress .standard-form input[type=month], #buddypress .standard-form input[type=number], #buddypress .standard-form input[type=range], #buddypress .standard-form input[type=search], #buddypress .standard-form input[type=password], #buddypress .standard-form input[type=tel], #buddypress .standard-form input[type=time], #buddypress .standard-form input[type=url], #buddypress .standard-form input[type=week], #buddypress ul.button-nav li a, #buddypress div.generic-button a, #buddypress .comment-reply-link, .wrapper-boxed .bbp-pagination-links a, .wrapper-boxed .bbp-pagination-links a:hover, .wrapper-boxed .bbp-pagination-links span.current, #buddypress .activity-list li.load-more a, #buddypress .activity-list li.load-newest a, .activity-inner, #buddypress a.activity-time-since, .activity-greeting, div.bbp-template-notice, div.indicator-hint, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-info a, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title a, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-topic-count, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-reply-count, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-freshness, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-freshness a, #bbpress-forums li.bbp-body ul.topic li.bbp-forum-topic-count, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-voice-count, #bbpress-forums li.bbp-body ul.topic li.bbp-forum-reply-count, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-freshness > a, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-freshness, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-reply-count, div.bbp-template-notice a, #bbpress-forums #bbp-search-form #bbp_search, #bbpress-forums .wp-editor-container, #bbpress-forums div.bbp-the-content-wrapper textarea.bbp-the-content, .widget_display_stats dd, #bbpress-forums fieldset.bbp-form legend, #bbpress-forums .bbp-pagination-count, span.bbp-admin-links a, .bbp-forum-header a.bbp-forum-permalink, .bbp-topic-header a.bbp-topic-permalink, .bbp-reply-header a.bbp-reply-permalink, #bbpress-forums .status-closed, #bbpress-forums .status-closed a, .post-entry blockquote.wp-block-quote p, .wpb_text_column blockquote.wp-block-quote p, .post-entry blockquote.wp-block-quote cite, .wpb_text_column blockquote.wp-block-quote cite, .post-entry code, .wp-block-video figcaption, .post-entry .wp-block-pullquote blockquote p, .post-entry .wp-block-pullquote blockquote cite, .wp-block-categories .category-item-count{ color: var(--pctext-cl); }
            .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .post-entry .wp-block-file a.wp-block-file__button{ background-color: var(--pctext-cl); }
            .goso-owl-carousel-slider .owl-dot span{ background-color: var(--pctext-cl); border-color: var(--pctext-cl); }
            .grid-post-box-meta span, .widget ul.side-newsfeed li .side-item .side-item-text .side-item-meta, .grid-post-box-meta span a, .goso-post-box-meta .goso-box-meta span, .goso-post-box-meta .goso-box-meta a, .header-standard .author-post span, .thecomment .comment-text span.date, .item-related span.date, .post-box-meta-single span, .container.goso-breadcrumb span, .container.goso-breadcrumb span a, .container.goso-breadcrumb i,.goso-container-inside.goso-breadcrumb span, .goso-container-inside.goso-breadcrumb span a, .goso-container-inside.goso-breadcrumb i, .overlay-post-box-meta, .overlay-post-box-meta .overlay-share span, .overlay-post-box-meta .overlay-share a, .woocommerce #reviews #comments ol.commentlist li .comment-text .meta, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-info .bbp-forum-content, #bbpress-forums li.bbp-body ul.topic p.bbp-topic-meta, #bbpress-forums .bbp-breadcrumb a, #bbpress-forums .bbp-breadcrumb .bbp-breadcrumb-current, .bbp-breadcrumb .bbp-breadcrumb-sep, #bbpress-forums .bbp-topic-started-by, #bbpress-forums .bbp-topic-started-in{ color: var(--pcmeta-cl); }
            .goso-review-process{ background-color: var(--pcmeta-cl); }
            .post-entry .wp-block-file a.wp-block-file__button{ color: var(--pcbg-cl); }
            .pcdark-mode .goso-pagination.goso-ajax-more a.goso-ajax-more-button.loading-posts{ color: var(--pctext-cl) !important; border-color: var(--pcborder-cl) !important; }
            .pcdark-mode .widget ul.side-newsfeed li .order-border-number{ background-color: rgba(255,255,255,0.2); box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.1); }
            .pcdark-mode .widget ul.side-newsfeed li .number-post{ background-color: #212121; }
            .pcdark-mode div.wpforms-container .wpforms-form.wpforms-form input[type=submit], .pcdark-mode div.wpforms-container .wpforms-form.wpforms-form button[type=submit], .pcdark-mode div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button,
            .pcdark-mode #respond #submit, .pcdark-mode .wpcf7 input[type="submit"], .pcdark-mode .widget_wysija input[type="submit"], .pcdark-mode .widget input[type="submit"], .pcdark-mode .goso-user-logged-in .goso-user-action-links a, .pcdark-mode .goso-button, .widget button[type="submit"], .pcdark-mode .woocommerce #respond input#submit, .pcdark-mode .woocommerce a.button, .pcdark-mode .woocommerce button.button, .pcdark-mode .woocommerce input.button, .pcdark-mode #bbpress-forums #bbp_reply_submit, .pcdark-mode #bbpress-forums #bbp_topic_submit, .pcdark-mode #main .bbp-login-form .bbp-submit-wrapper button[type="submit"]{ background: #444; color: #f9f9f9; }
            .pcdark-mode #wp-calendar tbody td, .pcdark-mode #wp-calendar tbody td:hover{ background: none; }
            .pcdark-mode .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content{ background-color: #636363; }
            .pcdark-mode .is-sticky #navigation, .pcdark-mode #navigation .menu .sub-menu, #navigation .menu .children,.pcdark-mode .goso-dropdown-menu{ box-shadow: 0px 1px 5px rgba(255, 255, 255, 0.08); -webkit-box-shadow: 0px 1px 5px rgba(255, 255, 255, 0.08); -moz-box-shadow: 0px 1px 5px rgba(255, 255, 255, 0.08); }
            .pcdark-mode .goso-image-holder:not([style*='background-image']), .pcdark-mode .goso-lazy[src*="goso-holder"], .pcdark-mode .goso-holder-load:not([style*='background-image']){ background-color: #333333; background-image: linear-gradient(to left,#333333 0%,#383838 15%,#333333 40%,#333333 100%); }
            .pcdark-mode #goso-demobar .style-toggle, .pcdark-mode #goso-demobar{ box-shadow: -1px 2px 10px 0 rgba(255, 255, 255, .15); -webkit-box-shadow: -1px 2px 10px 0 rgba(255, 255, 255, .15); -moz-box-shadow: -1px 2px 10px 0 rgba(255, 255, 255, .15); }
            .pcdark-mode .goso-page-header h1{ color: #fff; }
            .pcdark-mode .post-entry.blockquote-style-2 blockquote, .pcdark-mode .wp-block-quote.is-style-large, .pcdark-mode .wp-block-quote.is-large{ background: #2b2b2b; }
            .pcdark-mode .goso-overlay-over .overlay-border{ opacity: 0.5; }
            .pcdark-mode .post-entry pre, .pcdark-mode .post-entry code, .pcdark-mode .wp-block-table.is-style-stripes tr:nth-child(odd), .pcdark-mode .post-entry pre.wp-block-verse, .pcdark-mode .post-entry .wp-block-verse pre, .pcdark-mode .wp-block-pullquote.is-style-solid-color{ background-color: #333333; }
            .pcdark-mode .post-entry blockquote.wp-block-quote cite, .pcdark-mode .wpb_text_column blockquote.wp-block-quote cite{ opacity: 0.6; }
            .pcdark-mode .goso-pagination ul.page-numbers li a:hover, .pcdark-mode #comments_pagination a:hover, .pcdark-mode .woocommerce nav.woocommerce-pagination ul li a:hover{ color: #dedede; border-color: #777777; }
            .pcdark-mode #buddypress div.item-list-tabs, .pcdark-mode #buddypress .comment-reply-link, .pcdark-mode #buddypress .generic-button a, .pcdark-mode #buddypress .standard-form button, .pcdark-mode #buddypress a.button, .pcdark-mode #buddypress input[type=button], .pcdark-mode #buddypress input[type=reset], .pcdark-mode #buddypress input[type=submit], .pcdark-mode #buddypress ul.button-nav li a, .pcdark-mode a.bp-title-button, .pcdark-mode #bbpress-forums li.bbp-header, .pcdark-mode #bbpress-forums div.bbp-forum-header, .pcdark-mode #bbpress-forums div.bbp-topic-header, .pcdark-mode #bbpress-forums div.bbp-reply-header{ background-color: #252525; }
            .pcdark-mode #buddypress .comment-reply-link, .pcdark-mode #buddypress .generic-button a, .pcdark-mode #buddypress .standard-form button, .pcdark-mode #buddypress a.button, .pcdark-mode #buddypress input[type=button], .pcdark-mode #buddypress input[type=reset], .pcdark-mode #buddypress input[type=submit], .pcdark-mode #buddypress ul.button-nav li a, .pcdark-mode a.bp-title-button{ border-color: #252525; }
            .pcdark-mode #buddypress div.item-list-tabs:not(#subnav) ul li.selected a, .pcdark-mode #buddypress div.item-list-tabs:not(#subnav) ul li.current a, .pcdark-mode #buddypress div.item-list-tabs:not(#subnav) ul li a:hover, .pcdark-mode #buddypress div.item-list-tabs:not(#subnav) ul li.selected a, .pcdark-mode #buddypress div.item-list-tabs:not(#subnav) ul li.current a, .pcdark-mode #buddypress div.item-list-tabs:not(#subnav) ul li a:hover{ color: #fff; }
            .pcdark-mode #buddypress div.item-list-tabs:not(#subnav) ul li a, .pcdark-mode #buddypress div.item-list-tabs:not(#subnav) ul li > span{ border-color: #313131; }
            .pcdark-mode .pcnav-lgroup ul ul{background-color:rgba(0,0,0,0.9);}
			<?php if ( get_theme_mod( 'goso_post_caption_below' ) ): ?>
                .wp-caption p.wp-caption-text, .goso-featured-caption{ color: var(--pcmeta-cl); }
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_general_text_color' ) ): ?>
            body{ color: <?php echo get_theme_mod( 'goso_general_text_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_color_accent' ) ): ?>
            body{ --pcaccent-cl: <?php echo get_theme_mod( 'goso_color_accent' ); ?>; }
            .goso-menuhbg-toggle:hover .lines-button:after, .goso-menuhbg-toggle:hover .goso-lines:before, .goso-menuhbg-toggle:hover .goso-lines:after,.tags-share-box.tags-share-box-s2 .post-share-plike,.goso-video_playlist .goso-playlist-title,.gososc-column-2.goso-video_playlist
            .goso-video-nav .playlist-panel-item, .gososc-column-1.goso-video_playlist .goso-video-nav .playlist-panel-item,.goso-video_playlist .goso-custom-scroll::-webkit-scrollbar-thumb, .gososc-button, .post-entry .gososc-button, .goso-dropcap-box, .goso-dropcap-circle, .goso-login-register input[type="submit"]:hover, .goso-ld .goso-ldin:before, .goso-ldspinner > div{ background: <?php echo get_theme_mod( 'goso_color_accent' ); ?>; }
            a, .post-entry .goso-portfolio-filter ul li a:hover, .goso-portfolio-filter ul li a:hover, .goso-portfolio-filter ul li.active a, .post-entry .goso-portfolio-filter ul li.active a, .goso-countdown .countdown-amount, .archive-box h1, .post-entry a, .container.goso-breadcrumb span a:hover, .post-entry blockquote:before, .post-entry blockquote cite, .post-entry blockquote .author, .wpb_text_column blockquote:before, .wpb_text_column blockquote cite, .wpb_text_column blockquote .author, .goso-pagination a:hover, ul.goso-topbar-menu > li a:hover, div.goso-topbar-menu > ul > li a:hover, .goso-recipe-heading a.goso-recipe-print,.goso-review-metas .goso-review-btnbuy, .main-nav-social a:hover, .widget-social .remove-circle a:hover i, .goso-recipe-index .cat > a.goso-cat-name, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-info a:hover, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title a:hover, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-info .bbp-forum-content a, #bbpress-forums li.bbp-body ul.topic p.bbp-topic-meta a, #bbpress-forums .bbp-breadcrumb a:hover, #bbpress-forums .bbp-forum-freshness a:hover, #bbpress-forums .bbp-topic-freshness a:hover, #buddypress ul.item-list li div.item-title a, #buddypress ul.item-list li h4 a, #buddypress .activity-header a:first-child, #buddypress .comment-meta a:first-child, #buddypress .acomment-meta a:first-child, div.bbp-template-notice a:hover, .goso-menu-hbg .menu li a .indicator:hover, .goso-menu-hbg .menu li a:hover, #sidebar-nav .menu li a:hover, .goso-rlt-popup .rltpopup-meta .rltpopup-title:hover, .goso-video_playlist .goso-video-playlist-item .goso-video-title:hover, .goso_list_shortcode li:before, .goso-dropcap-box-outline, .goso-dropcap-circle-outline, .goso-dropcap-regular, .goso-dropcap-bold{ color: <?php echo get_theme_mod( 'goso_color_accent' ); ?>; }
            .goso-home-popular-post ul.slick-dots li button:hover, .goso-home-popular-post ul.slick-dots li.slick-active button, .post-entry blockquote .author span:after, .error-image:after, .error-404 .go-back-home a:after, .goso-header-signup-form, .woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce div.product .entry-summary div[itemprop="description"]:before, .woocommerce div.product .entry-summary div[itemprop="description"] blockquote .author span:after, .woocommerce div.product .woocommerce-tabs #tab-description blockquote .author span:after, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .pcheader-icon.shoping-cart-icon > a > span, #goso-demobar .buy-button, #goso-demobar .buy-button:hover, .goso-recipe-heading a.goso-recipe-print:hover,.goso-review-metas .goso-review-btnbuy:hover, .goso-review-process span, .goso-review-score-total, #navigation.menu-style-2 ul.menu ul.sub-menu:before, #navigation.menu-style-2 .menu ul ul.sub-menu:before, .goso-go-to-top-floating, .post-entry.blockquote-style-2 blockquote:before, #bbpress-forums #bbp-search-form .button, #bbpress-forums #bbp-search-form .button:hover, .wrapper-boxed .bbp-pagination-links span.current, #bbpress-forums #bbp_reply_submit:hover, #bbpress-forums #bbp_topic_submit:hover,#main .bbp-login-form .bbp-submit-wrapper button[type="submit"]:hover, #buddypress .dir-search input[type=submit], #buddypress .groups-members-search input[type=submit], #buddypress button:hover, #buddypress a.button:hover, #buddypress a.button:focus, #buddypress input[type=button]:hover, #buddypress input[type=reset]:hover, #buddypress ul.button-nav li a:hover, #buddypress ul.button-nav li.current a, #buddypress div.generic-button a:hover, #buddypress .comment-reply-link:hover, #buddypress input[type=submit]:hover, #buddypress div.pagination .pagination-links .current, #buddypress div.item-list-tabs ul li.selected a, #buddypress div.item-list-tabs ul li.current a, #buddypress div.item-list-tabs ul li a:hover, #buddypress table.notifications thead tr, #buddypress table.notifications-settings thead tr, #buddypress table.profile-settings thead tr, #buddypress table.profile-fields thead tr, #buddypress table.wp-profile-fields thead tr, #buddypress table.messages-notices thead tr, #buddypress table.forum thead tr, #buddypress input[type=submit] { background-color: <?php echo get_theme_mod( 'goso_color_accent' ); ?>; }
            .goso-pagination ul.page-numbers li span.current, #comments_pagination span { color: #fff; background: <?php echo get_theme_mod( 'goso_color_accent' ); ?>; border-color: <?php echo get_theme_mod( 'goso_color_accent' ); ?>; }
            .footer-instagram h4.footer-instagram-title > span:before, .woocommerce nav.woocommerce-pagination ul li span.current, .goso-pagination.goso-ajax-more a.goso-ajax-more-button:hover, .goso-recipe-heading a.goso-recipe-print:hover,.goso-review-metas .goso-review-btnbuy:hover, .home-featured-cat-content.style-14 .magcat-padding:before, .wrapper-boxed .bbp-pagination-links span.current, #buddypress .dir-search input[type=submit], #buddypress .groups-members-search input[type=submit], #buddypress button:hover, #buddypress a.button:hover, #buddypress a.button:focus, #buddypress input[type=button]:hover, #buddypress input[type=reset]:hover, #buddypress ul.button-nav li a:hover, #buddypress ul.button-nav li.current a, #buddypress div.generic-button a:hover, #buddypress .comment-reply-link:hover, #buddypress input[type=submit]:hover, #buddypress div.pagination .pagination-links .current, #buddypress input[type=submit], form.pc-searchform.goso-hbg-search-form input.search-input:hover, form.pc-searchform.goso-hbg-search-form input.search-input:focus, .goso-dropcap-box-outline, .goso-dropcap-circle-outline { border-color: <?php echo get_theme_mod( 'goso_color_accent' ); ?>; }
            .woocommerce .woocommerce-error, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message { border-top-color: <?php echo get_theme_mod( 'goso_color_accent' ); ?>; }
            .goso-slider ol.goso-control-nav li a.goso-active, .goso-slider ol.goso-control-nav li a:hover, .goso-related-carousel .owl-dot.active span, .goso-owl-carousel-slider .owl-dot.active span{ border-color: <?php echo get_theme_mod( 'goso_color_accent' ); ?>; background-color: <?php echo get_theme_mod( 'goso_color_accent' ); ?>; }
            .woocommerce .woocommerce-message:before, .woocommerce form.checkout table.shop_table .order-total .amount, .woocommerce ul.products li.product .price ins, .woocommerce ul.products li.product .price, .woocommerce div.product p.price ins, .woocommerce div.product span.price ins, .woocommerce div.product p.price, .woocommerce div.product .entry-summary div[itemprop="description"] blockquote:before, .woocommerce div.product .woocommerce-tabs #tab-description blockquote:before, .woocommerce div.product .entry-summary div[itemprop="description"] blockquote cite, .woocommerce div.product .entry-summary div[itemprop="description"] blockquote .author, .woocommerce div.product .woocommerce-tabs #tab-description blockquote cite, .woocommerce div.product .woocommerce-tabs #tab-description blockquote .author, .woocommerce div.product .product_meta > span a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce ul.cart_list li .amount, .woocommerce ul.product_list_widget li .amount, .woocommerce table.shop_table td.product-name a:hover, .woocommerce table.shop_table td.product-price span, .woocommerce table.shop_table td.product-subtotal span, .woocommerce-cart .cart-collaterals .cart_totals table td .amount, .woocommerce .woocommerce-info:before, .woocommerce div.product span.price, .goso-container-inside.goso-breadcrumb span a:hover { color: <?php echo get_theme_mod( 'goso_color_accent' ); ?>; }
            .standard-content .goso-more-link.goso-more-link-button a.more-link, .goso-readmore-btn.goso-btn-make-button a, .goso-featured-cat-seemore.goso-btn-make-button a{ background-color: <?php echo get_theme_mod( 'goso_color_accent' ); ?>; color: #fff; }
            .goso-vernav-toggle:before{ border-top-color: <?php echo get_theme_mod( 'goso_color_accent' ); ?>; color: #fff; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_body_breadcrumbs' ) ): ?>
            .goso-container-inside.goso-breadcrumb i, .container.goso-breadcrumb i, .goso-container-inside.goso-breadcrumb span, .goso-container-inside.goso-breadcrumb span a, .container.goso-breadcrumb span, .container.goso-breadcrumb span a{ font-size: <?php echo get_theme_mod( 'goso_body_breadcrumbs' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_breadcrumbs_color' ) ): ?>
            .goso-container-inside.goso-breadcrumb i, .container.goso-breadcrumb i, .goso-container-inside.goso-breadcrumb span, .goso-container-inside.goso-breadcrumb span a, .container.goso-breadcrumb span, .container.goso-breadcrumb span a{ color: <?php echo get_theme_mod( 'goso_breadcrumbs_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_loadmore_size' ) ): ?>
            .goso-pagination a, .goso-pagination .disable-url, .goso-pagination ul.page-numbers li span, .goso-pagination ul.page-numbers li a, #comments_pagination span, #comments_pagination a{ font-size: <?php echo get_theme_mod( 'goso_home_loadmore_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_pagination_color' ) ): ?>
            .goso-pagination a, .goso-pagination .disable-url, .goso-pagination ul.page-numbers li span, .goso-pagination ul.page-numbers li a, #comments_pagination span, #comments_pagination a{ color: <?php echo get_theme_mod( 'goso_pagination_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_pagination_hcolor' ) ): ?>
            .goso-pagination a:hover{ color: <?php echo get_theme_mod( 'goso_pagination_hcolor' ); ?>; }
            .goso-pagination ul.page-numbers li span.current, #comments_pagination span{ border-color: <?php echo get_theme_mod( 'goso_pagination_hcolor' ); ?>; background-color: <?php echo get_theme_mod( 'goso_pagination_hcolor' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_loadmorebtn_color' ) ): ?>
            .goso-pagination.goso-ajax-more a.goso-ajax-more-button{ color: <?php echo get_theme_mod( 'goso_loadmorebtn_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_loadmorebtn_borders' ) ): ?>
            .goso-pagination.goso-ajax-more a.goso-ajax-more-button{ border-color: <?php echo get_theme_mod( 'goso_loadmorebtn_borders' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_loadmorebtn_bg' ) ): ?>
            .goso-pagination.goso-ajax-more a.goso-ajax-more-button{ background-color: <?php echo get_theme_mod( 'goso_loadmorebtn_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_loadmorebtn_hcolor' ) ): ?>
            .goso-pagination.goso-ajax-more a.goso-ajax-more-button:hover{ color: <?php echo get_theme_mod( 'goso_loadmorebtn_hcolor' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_loadmorebtn_hborders' ) ): ?>
            .goso-pagination.goso-ajax-more a.goso-ajax-more-button:hover{ border-color: <?php echo get_theme_mod( 'goso_loadmorebtn_hborders' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_loadmorebtn_hbg' ) ): ?>
            .goso-pagination.goso-ajax-more a.goso-ajax-more-button:hover{ background-color: <?php echo get_theme_mod( 'goso_loadmorebtn_hbg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_archivetitle_prefix_color' ) ): ?>
            .archive-box span{ color: <?php echo get_theme_mod( 'goso_archivetitle_prefix_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_archivetitle_color' ) ): ?>
            .archive-box h1{ color: <?php echo get_theme_mod( 'goso_archivetitle_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_box_text_size' ) ): ?>
            ul.homepage-featured-boxes .goso-fea-in h4 span span, ul.homepage-featured-boxes .goso-fea-in.boxes-style-3 h4 span span { font-size: <?php echo get_theme_mod( 'goso_home_box_text_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_polular_fsectitle' ) ): ?>
            .home-pupular-posts-title{ font-size: <?php echo get_theme_mod( 'goso_home_polular_fsectitle' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_polular_mfsectitle' ) ): ?>
            @media only screen and (max-width: 479px){ .home-pupular-posts-title{ font-size: <?php echo get_theme_mod( 'goso_home_polular_mfsectitle' ); ?>px; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_popular_post_font_size' ) ): ?>
            .goso-home-popular-post .item-related h3 a { font-size: <?php echo get_theme_mod( 'goso_home_popular_post_font_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_popular_post_fdate' ) ): ?>
            .goso-home-popular-post .item-related span.date { font-size: <?php echo get_theme_mod( 'goso_home_popular_post_fdate' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_hmobile' ) ): ?>
            @media only screen and (max-width: 767px){ .goso-top-bar{ display: none; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_auto_speed' ) ): ?>
            .goso-headline .animated.slideOutUp, .goso-headline .animated.slideInUp { -webkit-animation-duration: <?php echo get_theme_mod( 'goso_top_bar_auto_speed' ); ?>ms; animation-duration: <?php echo get_theme_mod( 'goso_top_bar_auto_speed' ); ?>ms; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_bg' ) ): ?>
            .goso-top-bar, .goso-topbar-trending .goso-owl-carousel .owl-item, ul.goso-topbar-menu ul.sub-menu, div.goso-topbar-menu > ul ul.sub-menu, .pctopbar-login-btn .pclogin-sub{ background-color: <?php echo get_theme_mod( 'goso_top_bar_bg' ); ?>; }
            .headline-title.nticker-style-3:after{ border-color: <?php echo get_theme_mod( 'goso_top_bar_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_top_posts_bg' ) ): ?>
            .headline-title { background-color: <?php echo get_theme_mod( 'goso_top_bar_top_posts_bg' ); ?>; }
            .headline-title.nticker-style-2:after, .headline-title.nticker-style-4:after{ border-color: <?php echo get_theme_mod( 'goso_top_bar_top_posts_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_top_posts_color' ) ): ?>
            .headline-title { color: <?php echo get_theme_mod( 'goso_top_bar_top_posts_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_button_color' ) ): ?>
            .goso-owl-carousel-slider.goso-headline-posts .owl-nav .owl-prev, .goso-owl-carousel-slider.goso-headline-posts .owl-nav .owl-next, .goso-trending-nav a{ color: <?php echo get_theme_mod( 'goso_top_bar_button_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_button_hover_color' ) ): ?>
            .goso-owl-carousel-slider.goso-headline-posts .owl-nav .owl-prev:hover, .goso-owl-carousel-slider.goso-headline-posts .owl-nav .owl-next:hover, .goso-trending-nav a:hover{ color: <?php echo get_theme_mod( 'goso_top_bar_button_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_title_color' ) ): ?>
            a.goso-topbar-post-title { color: <?php echo get_theme_mod( 'goso_top_bar_title_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_title_hover_color' ) ): ?>
            a.goso-topbar-post-title:hover { color: <?php echo get_theme_mod( 'goso_top_bar_title_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_topbar_ct_color' ) ): ?>
            .goso-headline .pctopbar-item { color: <?php echo get_theme_mod( 'goso_topbar_ct_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_off_uppercase' ) ): ?>
            a.goso-topbar-post-title { text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_top_posts_lowcase' ) ): ?>
            .headline-title { text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_off_uppercase_menu' ) ): ?>
            ul.goso-topbar-menu > li a, div.goso-topbar-menu > ul > li a { text-transform: none; font-size: 12px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_topbar_ctsize' ) ): ?>
            .goso-topbar-ctext, .goso-top-bar .pctopbar-item{ font-size: <?php echo get_theme_mod( 'goso_topbar_ctsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_top_post_size' ) ): ?>
            .headline-title { font-size: <?php echo get_theme_mod( 'goso_top_bar_top_post_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_toppost_width' ) ): ?>
            .goso-topbar-trending{ max-width: <?php echo get_theme_mod( 'goso_toppost_width' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_toppost_width_mobile' ) ): ?>
            @media only screen and (max-width: 767px){ .goso-topbar-trending{ max-width: <?php echo get_theme_mod( 'goso_toppost_width_mobile' ); ?>px; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_top_post_size_title' ) ): ?>
            a.goso-topbar-post-title { font-size: <?php echo get_theme_mod( 'goso_top_bar_top_post_size_title' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_auto_speed' ) && '300' != get_theme_mod( 'goso_top_bar_auto_speed' ) ):
			$autospeed = get_theme_mod( 'goso_top_bar_auto_speed' );
			$autospeed_time           = (int) $autospeed / 1000;
			?>
            .goso-top-bar .goso-topbar-trending .animated.slideOutUp, .goso-top-bar .goso-topbar-trending .animated.slideInUp, .goso-top-bar .goso-topbar-trending .animated.TickerslideOutRight, .goso-top-bar .goso-topbar-trending .animated.TickerslideInRight, .goso-top-bar .goso-topbar-trending .animated.fadeOut, .goso-top-bar .goso-topbar-trending .animated.fadeIn{ -webkit-animation-duration : <?php echo $autospeed_time; ?>s; animation-duration : <?php echo $autospeed_time; ?>s; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_menu_level_one' ) ): ?>
            ul.goso-topbar-menu > li > a, div.goso-topbar-menu > ul > li > a { font-size: <?php echo get_theme_mod( 'goso_top_bar_menu_level_one' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_sub_menu_size' ) ): ?>
            ul.goso-topbar-menu ul.sub-menu > li a, div.goso-topbar-menu ul.sub-menu > li a { font-size: <?php echo get_theme_mod( 'goso_top_bar_sub_menu_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_social_size' ) ): ?>
            .goso-topbar-social a, .goso-top-bar .goso-login-popup-btn a i{ font-size: <?php echo get_theme_mod( 'goso_top_bar_social_size' ); ?>px; }
		<?php endif; ?>
		<?php echo goso_renders_css( '.goso-lgpop-title', 'goso_tbpop_title_size' ); ?>
		<?php if ( get_theme_mod( 'goso_tbpop_inputfs' ) ): ?>
            #goso-login-popup .goso-login input[type="text"], #goso-login-popup .goso-login input[type="password"], #goso-login-popup .goso-login input[type="email"]{ font-size: <?php echo get_theme_mod( 'goso_tbpop_inputfs' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tbpop_submitfs' ) ): ?>
            #goso-login-popup .goso-login input[type="submit"]{ font-size: <?php echo get_theme_mod( 'goso_tbpop_submitfs' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tbpop_textfs' ) ): ?>
            #goso-login-popup, #goso-login-popup p{ font-size: <?php echo get_theme_mod( 'goso_tbpop_textfs' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_menu_color' ) ): ?>
            ul.goso-topbar-menu > li a, div.goso-topbar-menu > ul > li a { color: <?php echo get_theme_mod( 'goso_top_bar_menu_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_menu_dropdown_bg' ) ): ?>
            ul.goso-topbar-menu ul.sub-menu, div.goso-topbar-menu > ul ul.sub-menu { background-color: <?php echo get_theme_mod( 'goso_top_bar_menu_dropdown_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_menu_hover_color' ) ): ?>
            ul.goso-topbar-menu > li a:hover, div.goso-topbar-menu > ul > li a:hover { color: <?php echo get_theme_mod( 'goso_top_bar_menu_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_menu_border' ) ): ?>
            ul.goso-topbar-menu ul.sub-menu li a, div.goso-topbar-menu > ul ul.sub-menu li a, ul.goso-topbar-menu > li > ul.sub-menu > li:first-child, div.goso-topbar-menu > ul > li > ul.sub-menu > li:first-child { border-color: <?php echo get_theme_mod( 'goso_top_bar_menu_border' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_social_color' ) ): ?>
            .goso-topbar-social a { color: <?php echo get_theme_mod( 'goso_top_bar_social_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_bar_social_hover_color' ) ): ?>
            .goso-topbar-social a:hover { color: <?php echo get_theme_mod( 'goso_top_bar_social_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgc_icon_text' ) ): ?>
            .goso-topbar-social .pctopbar-login-btn a{ color: <?php echo get_theme_mod( 'goso_tblgc_icon_text' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgc_icon_htext' ) ): ?>
            .goso-topbar-social .pctopbar-login-btn a:hover{ color: <?php echo get_theme_mod( 'goso_tblgc_icon_htext' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgpop_cloading' ) ): ?>
            #goso-login-popup .goso-ld .goso-ldin:before{ background-color: <?php echo get_theme_mod( 'goso_tblgpop_cloading' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgpop_bg' ) ): ?>
            #goso-login-popup, #goso-login-popup:before, #goso-login-popup.ajax-loading:before{ background-color: <?php echo get_theme_mod( 'goso_tblgpop_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgpop_bg' ) && get_theme_mod( 'goso_tblgpop_sbg' ) ): ?>
            #goso-login-popup, #goso-login-popup:before, #goso-login-popup.ajax-loading:before{ background: linear-gradient( 135deg ,<?php echo get_theme_mod( 'goso_tblgpop_bg' ); ?> 0%,<?php echo get_theme_mod( 'goso_tblgpop_sbg' ); ?> 100%); }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgpop_bg_opacity' ) || '0' == get_theme_mod( 'goso_tblgpop_bg_opacity' ) ): ?>
            #goso-login-popup:before{ opacity: <?php echo get_theme_mod( 'goso_tblgpop_bg_opacity' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgpop_bgimgage' ) ):
			$lgrgpop_img_bg = get_theme_mod( 'goso_tblgpop_bgimgage' );
			$lgrgpop_img_bgrepeat     = get_theme_mod( 'goso_tblgpop_bg_repeat' );
			$lgrgpop_img_bgattachment = get_theme_mod( 'goso_tblgpop_bg_attachment' );
			$lgrgpop_img_bgsize       = get_theme_mod( 'goso_tblgpop_bg_size' );

			$lgrgpop_bgimg_html = "background-image: url('" . $lgrgpop_img_bg . "');";
			if ( $lgrgpop_img_bgrepeat ): $lgrgpop_bgimg_html .= 'background-repeat: ' . $lgrgpop_img_bgrepeat . ';'; endif;
			if ( $lgrgpop_img_bgattachment ): $lgrgpop_bgimg_html .= 'background-attachment: ' . $lgrgpop_img_bgattachment . ';'; endif;
			if ( $lgrgpop_img_bgsize ): $lgrgpop_bgimg_html .= 'background-size: ' . $lgrgpop_img_bgsize . ';'; endif;
			?>
            #goso-login-popup:after{ <?php echo $lgrgpop_bgimg_html; ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgc_close' ) ): ?>
            .mfp-close-btn-in #goso-login-popup .mfp-close{ color: <?php echo get_theme_mod( 'goso_tblgc_close' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgc_titles' ) ): ?>
            .goso-lgpop-title{ color: <?php echo get_theme_mod( 'goso_tblgc_titles' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgc_inputs' ) ): ?>
            #goso-login-popup .goso-login input[type="text"], #goso-login-popup .goso-login input[type="password"], #goso-login-popup .goso-login input[type="email"]{ color: <?php echo get_theme_mod( 'goso_tblgc_inputs' ); ?>; }
            #goso-login-popup .goso-login input[type="text"]::-webkit-input-placeholder, #goso-login-popup .goso-login input[type="password"]::-webkit-input-placeholder, #goso-login-popup .goso-login input[type="email"]::-webkit-input-placeholder{ color: <?php echo get_theme_mod( 'goso_tblgc_inputs' ); ?>; }
            #goso-login-popup .goso-login input[type="text"]::-ms-input-placeholder, #goso-login-popup .goso-login input[type="password"]::-ms-input-placeholder, #goso-login-popup .goso-login input[type="email"]::-ms-input-placeholder{ color: <?php echo get_theme_mod( 'goso_tblgc_inputs' ); ?>; }
            #goso-login-popup .goso-login input[type="text"]::placeholder, #goso-login-popup .goso-login input[type="password"]::placeholder, #goso-login-popup .goso-login input[type="email"]::placeholder{ color: <?php echo get_theme_mod( 'goso_tblgc_inputs' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgc_inputs_borders' ) ): ?>
            #goso-login-popup .goso-login input[type="text"], #goso-login-popup .goso-login input[type="password"], #goso-login-popup .goso-login input[type="email"]{ border-color: <?php echo get_theme_mod( 'goso_tblgc_inputs_borders' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgc_submit' ) ): ?>
            #goso-login-popup .goso-login input[type="submit"]{ color: <?php echo get_theme_mod( 'goso_tblgc_submit' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgc_hsubmit' ) ): ?>
            #goso-login-popup .goso-login input[type="submit"]:hover{ color: <?php echo get_theme_mod( 'goso_tblgc_hsubmit' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgc_submit_bg' ) ): ?>
            #goso-login-popup .goso-login input[type="submit"]{ background-color: <?php echo get_theme_mod( 'goso_tblgc_submit_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgc_submit_hbg' ) ): ?>
            #goso-login-popup .goso-login input[type="submit"]:hover{ background-color: <?php echo get_theme_mod( 'goso_tblgc_submit_hbg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgc_text' ) ): ?>
            #goso-login-popup, #goso-login-popup p:not(.message){ color: <?php echo get_theme_mod( 'goso_tblgc_text' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblgc_links' ) ): ?>
            #goso-login-popup a, #goso-login-popup a:hover{ color: <?php echo get_theme_mod( 'goso_tblgc_links' ); ?>; }
		<?php endif; ?>

		<?php if ( get_theme_mod( 'goso_tbtext_mobile' ) ): ?>
            @media only screen and (max-width: 767px){ .goso-top-bar .pctopbar-item.goso-topbar-ctext { display: none; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_toppost_mobile' ) ): ?>
            @media only screen and (max-width: 767px){ .goso-top-bar .pctopbar-item.goso-topbar-trending { display: block; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tbmenu_mobile' ) ): ?>
            @media only screen and (max-width: 767px){ .goso-top-bar .pctopbar-item.goso-wtopbar-menu { display: none; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tbsocial_mobile' ) ): ?>
            @media only screen and (max-width: 767px){ .goso-top-bar .pctopbar-item.goso-topbar-social { display: none; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblogin_titleupper' ) ): ?>
            .goso-lgpop-title{ text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_tblogin_submitupper' ) ): ?>
            #goso-login-popup .goso-login input[type="submit"]{ text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_remove_border_bottom_header' ) ): ?>
            .header-header-1.has-bottom-line, .header-header-4.has-bottom-line, .header-header-7.has-bottom-line { border-bottom: none; }
		<?php endif; ?>
		<?php
		$header_bgcolor   = get_theme_mod( 'goso_header_background_color' );
		$header_bgimg     = get_theme_mod( 'goso_header_background_image' );
		$main_bar_bgcolor = get_theme_mod( 'goso_main_bar_bg' );
		$main_bar_bgimg   = '';

		$mainmenu_height        = get_theme_mod( 'goso_mainmenu_height' );
		$mainmenu_height_sticky = get_theme_mod( 'goso_mainmenu_height_sticky' );
		if ( $mainmenu_height && ! $mainmenu_height_sticky ) {
			$mainmenu_height_sticky = 60;
		}

		if ( is_page() ) {
			$pmeta_page_header = get_post_meta( get_the_ID(), 'goso_pmeta_page_header', true );
			if ( isset( $pmeta_page_header['header_bgcolor'] ) && $pmeta_page_header['header_bgcolor'] ) {
				$header_bgcolor = $pmeta_page_header['header_bgcolor'];
			}
			if ( isset( $pmeta_page_header['header_bgimg'] ) && $pmeta_page_header['header_bgimg'] ) {
				$header_bgimg_meta = wp_get_attachment_url( intval( $pmeta_page_header['header_bgimg'] ) );
				if ( $header_bgimg_meta ) {
					$header_bgimg = $header_bgimg_meta;
				}
			}
			if ( isset( $pmeta_page_header['main_bar_bg'] ) && $pmeta_page_header['main_bar_bg'] ) {
				$main_bar_bgcolor = $pmeta_page_header['main_bar_bg'];
			}
			if ( isset( $pmeta_page_header['main_bar_bgimg'] ) && $pmeta_page_header['main_bar_bgimg'] ) {
				$main_bar_bgimg_meta = wp_get_attachment_url( intval( $pmeta_page_header['main_bar_bgimg'] ) );
				if ( $main_bar_bgimg_meta ) {
					$main_bar_bgimg = $main_bar_bgimg_meta;
				}
			}


			if ( isset( $pmeta_page_header['goso_mainmenu_height'] ) && $pmeta_page_header['goso_mainmenu_height'] ) {
				$mainmenu_height = $pmeta_page_header['goso_mainmenu_height'];
			}
			if ( isset( $pmeta_page_header['goso_mainmenu_height_sticky'] ) && $pmeta_page_header['goso_mainmenu_height_sticky'] ) {
				$mainmenu_height_sticky = $pmeta_page_header['goso_mainmenu_height_sticky'];
			}
		}

		if ( $mainmenu_height && $mainmenu_height > 29 ) {

			$fonts_lv1 = get_theme_mod( 'goso_font_size_lv1' ) ? get_theme_mod( 'goso_font_size_lv1' ) : 12;
			$fonts_lv1 = intval( $fonts_lv1 ) + 2;

			echo '@media only screen and (min-width: 961px){';
			echo '#navigation,.sticky-wrapper:not( .is-sticky ) #navigation, #navigation.sticky:not(.sticky-active){ height: ' . esc_attr( $mainmenu_height ) . 'px !important; }';
			echo '#navigation .menu > li > a,.main-nav-social,#navigation.sticky:not(.sticky-active) .menu > li > a, #navigation.sticky:not(.sticky-active) .main-nav-social, .sticky-wrapper:not( .is-sticky ) #navigation .menu>li>a,.sticky-wrapper:not( .is-sticky ) .main-nav-social{ line-height: ' . esc_attr( $mainmenu_height - 2 ) . 'px !important; height: ' . esc_attr( $mainmenu_height - 1 ) . 'px !important; }';
			echo '#navigation.sticky:not(.sticky-active) ul.menu > li > a:before, #navigation.sticky:not(.sticky-active) .menu > ul > li > a:before, .sticky-wrapper:not( .is-sticky ) #navigation ul.menu > li > a:before,.sticky-wrapper:not( .is-sticky ) #navigation .menu > ul > li > a:before{ bottom: calc( ' . esc_attr( $mainmenu_height ) . 'px/2 - ' . $fonts_lv1 . 'px ) !important; }';
			echo '.top-search-classes a.cart-contents, .pcheader-icon > a, #navigation.sticky:not(.sticky-active) .pcheader-icon > a,.sticky-wrapper:not( .is-sticky ) .pcheader-icon > a{ height: ' . esc_attr( $mainmenu_height - 2 ) . 'px !important;line-height: ' . esc_attr( $mainmenu_height - 2 ) . 'px !important; }';
			echo '.goso-header-builder .pcheader-icon > a, .goso-header-builder .goso-menuhbg-toggle, .goso-header-builder .top-search-classes a.cart-contents, .goso-header-builder .top-search-classes > a{ height: auto !important; line-height: unset !important; }';
			echo '.pcheader-icon.shoping-cart-icon > a > span, #navigation.sticky:not(.sticky-active) .pcheader-icon.shoping-cart-icon > a > span, .sticky-wrapper:not( .is-sticky ) .pcheader-icon.shoping-cart-icon > a > span{ top: calc( ' . esc_attr( $mainmenu_height ) . 'px/2 - 18px ) !important; }';
			echo '.goso-menuhbg-toggle, .show-search, .show-search form.pc-searchform input.search-input, #navigation.sticky:not(.sticky-active) .goso-menuhbg-toggle, #navigation.sticky:not(.sticky-active) .show-search, #navigation.sticky:not(.sticky-active) .show-search form.pc-searchform input.search-input, .sticky-wrapper:not( .is-sticky ) #navigation .goso-menuhbg-toggle,.sticky-wrapper:not( .is-sticky ) #navigation .show-search, .sticky-wrapper:not( .is-sticky ) .show-search form.pc-searchform input.search-input{ height: ' . esc_attr( $mainmenu_height - 2 ) . 'px !important; }';
			echo '#navigation.sticky:not(.sticky-active) .show-search a.close-search, .sticky-wrapper:not( .is-sticky ) .show-search a.close-search{ height: ' . esc_attr( $mainmenu_height ) . 'px !important;line-height: ' . esc_attr( $mainmenu_height ) . 'px !important; }';
			echo '#navigation #logo img, #navigation.sticky:not(.sticky-active).header-6 #logo img, #navigation.header-6 #logo img{ max-height: ' . esc_attr( $mainmenu_height ) . 'px; }';
			echo 'body.rtl #navigation.sticky:not(.sticky-active) ul.menu > li > .sub-menu, body.rtl #navigation.header-6.sticky:not(.sticky-active) ul.menu > li > .sub-menu, body.rtl #navigation.header-6.sticky:not(.sticky-active) .menu > ul > li > .sub-menu, body.rtl #navigation.header-10.sticky:not(.sticky-active) ul.menu > li > .sub-menu, body.rtl #navigation.header-10.sticky:not(.sticky-active) .menu > ul > li > .sub-menu, body.rtl #navigation.header-11.sticky:not(.sticky-active) ul.menu > li > .sub-menu, body.rtl #navigation.header-11.sticky:not(.sticky-active) .menu > ul > li > .sub-menu, body.rtl #navigation-sticky-wrapper:not(.is-sticky) #navigation ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper:not(.is-sticky) #navigation.header-6 ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper:not(.is-sticky) #navigation.header-6 .menu > ul > li > .sub-menu, body.rtl #navigation-sticky-wrapper:not(.is-sticky) #navigation.header-10 ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper:not(.is-sticky) #navigation.header-10 .menu > ul > li > .sub-menu, body.rtl #navigation-sticky-wrapper:not(.is-sticky) #navigation.header-11 ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper:not(.is-sticky) #navigation.header-11 .menu > ul > li > .sub-menu{ top: ' . ( $mainmenu_height - 1 ) . 'px; }';
			echo '#navigation.header-10.sticky:not(.sticky-active):not(.goso-logo-overflow) #logo img, #navigation.header-11.sticky:not(.sticky-active):not(.goso-logo-overflow) #logo img, .sticky-wrapper:not( .is-sticky ) #navigation.header-10:not( .goso-logo-overflow ) #logo img, .sticky-wrapper:not( .is-sticky ) #navigation.header-11:not( .goso-logo-overflow ) #logo img { max-height: ' . ( $mainmenu_height ) . 'px; }';

			$header_layout = goso_authow_get_header_layout();
			if ( $header_layout ) {
				echo '.sticky-wrapper:not( .is-sticky ) #navigation.' . $header_layout . '.menu-item-padding,#navigation.' . $header_layout . '.menu-item-padding.sticky:not(.sticky-active)';
				echo '.sticky-wrapper:not( .is-sticky ) #navigation.' . $header_layout . '.menu-item-padding ul.menu > li > a, #navigation.' . $header_layout . '.menu-item-padding.sticky:not(.sticky-active) ul.menu > li > a{ height: ' . esc_attr( $mainmenu_height ) . 'px; }';
			}

			echo '}';
		}
		if ( $mainmenu_height_sticky && $mainmenu_height_sticky > 29 ) {
			$fonts_lv1 = get_theme_mod( 'goso_font_size_lv1' ) ? get_theme_mod( 'goso_font_size_lv1' ) : 12;
			$fonts_lv1 = intval( $fonts_lv1 ) + 2;

			echo '@media only screen and (min-width: 961px){';
			echo '.sticky-wrapper.is-sticky #navigation, .is-sticky #navigation.menu-item-padding,.is-sticky #navigation.menu-item-padding, #navigation.sticky-active,#navigation.sticky-active.menu-item-padding,#navigation.sticky-active.menu-item-padding{  height: ' . esc_attr( $mainmenu_height_sticky ) . 'px !important; }';

			echo '.sticky-wrapper.is-sticky #navigation .menu>li>a,.sticky-wrapper.is-sticky .main-nav-social, #navigation.sticky-active .menu > li > a, #navigation.sticky-active .main-nav-social{ line-height: ' . esc_attr( $mainmenu_height_sticky - 2 ) . 'px !important; height: ' . esc_attr( $mainmenu_height_sticky - 2 ) . 'px !important; }';
			echo '#navigation.sticky-active.header-10.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-10.menu-item-padding ul.menu > li > a,';
			echo '#navigation.sticky-active.header-11.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-11.menu-item-padding ul.menu > li > a,';
			echo '#navigation.sticky-active.header-1.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-1.menu-item-padding ul.menu > li > a,';
			echo '#navigation.sticky-active.header-4.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-4.menu-item-padding ul.menu > li > a,';
			echo '#navigation.sticky-active.header-7.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-7.menu-item-padding ul.menu > li > a,';
			echo '#navigation.sticky-active.header-6.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-6.menu-item-padding ul.menu > li > a,';
			echo '#navigation.sticky-active.header-9.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-9.menu-item-padding ul.menu > li > a,';
			echo '#navigation.sticky-active.header-2.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-2.menu-item-padding ul.menu > li > a,';
			echo '#navigation.sticky-active.header-3.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-3.menu-item-padding ul.menu > li > a,';
			echo '#navigation.sticky-active.header-5.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-5.menu-item-padding ul.menu > li > a,';
			echo '#navigation.sticky-active.header-8.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-8.menu-item-padding ul.menu > li > a{ height: ' . esc_attr( $mainmenu_height_sticky ) . 'px !important; line-height: ' . esc_attr( $mainmenu_height_sticky ) . 'px !important; }';

			echo '.is-sticky .top-search-classes a.cart-contents, #navigation.sticky-active .main-nav-social, #navigation.sticky-active .pcheader-icon > a, .is-sticky .main-nav-social,.is-sticky .pcheader-icon > a,';
			echo '#navigation.sticky-active .goso-menuhbg-toggle, .sticky-wrapper.is-sticky #navigation .goso-menuhbg-toggle,';
			echo '#navigation.sticky-active .show-search, #navigation.sticky-active .show-search form.pc-searchform input.search-input, .sticky-wrapper.is-sticky .show-search, .sticky-wrapper.is-sticky .show-search form.pc-searchform input.search-input,';
			echo '#navigation.sticky-active .show-search a.close-search, .sticky-wrapper.is-sticky .show-search a.close-search{ height: ' . esc_attr( $mainmenu_height_sticky - 2 ) . 'px !important; line-height: ' . esc_attr( $mainmenu_height_sticky - 2 ) . 'px !important; }';

			echo '#navigation.sticky-active.header-6 #logo img, .is-sticky #navigation.header-6 #logo img{ max-height: ' . esc_attr( $mainmenu_height_sticky ) . 'px; }';

			echo '#navigation.sticky-active .pcheader-icon.shoping-cart-icon > a > span, .sticky-wrapper.is-sticky .pcheader-icon.shoping-cart-icon > a > span{ top: calc( ' . esc_attr( $mainmenu_height_sticky ) . 'px/2 - 18px ) !important; }';

			echo '#navigation.sticky-active ul.menu > li > a:before, #navigation.sticky-active .menu > ul > li > a:before, .sticky-wrapper.is-sticky #navigation ul.menu > li > a:before, .sticky-wrapper.is-sticky #navigation .menu > ul > li > a:before{ bottom: calc( ' . esc_attr( $mainmenu_height_sticky ) . 'px/2 - ' . $fonts_lv1 . 'px ) !important; }';

			echo 'body.rtl #navigation.sticky-active ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper.is-sticky #navigation ul.menu > li > .sub-menu,';
			echo 'body.rtl #navigation.sticky-active.header-6 ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper.is-sticky #navigation.header-6 ul.menu > li > .sub-menu,';
			echo 'body.rtl #navigation.sticky-active.header-6 .menu > ul > li > .sub-menu, body.rtl #navigation-sticky-wrapper.is-sticky #navigation.header-6 .menu > ul > li > .sub-menu,';
			echo 'body.rtl #navigation.sticky-active.header-10 ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper.is-sticky #navigation.header-10 ul.menu > li > .sub-menu,';
			echo 'body.rtl #navigation.sticky-active.header-10 .menu > ul > li > .sub-menu, body.rtl #navigation-sticky-wrapper.is-sticky #navigation.header-10 .menu > ul > li > .sub-menu,';
			echo 'body.rtl #navigation.sticky-active.header-11 ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper.is-sticky #navigation.header-11 ul.menu > li > .sub-menu,';
			echo 'body.rtl #navigation.sticky-active.header-11 .menu > ul > li > .sub-menu, body.rtl #navigation-sticky-wrapper.is-sticky #navigation.header-11 .menu > ul > li > .sub-menu{ top: ' . ( $mainmenu_height_sticky - 1 ) . 'px; }';

			echo '#navigation.sticky-active.header-10:not(.goso-logo-overflow) #logo img, #navigation.sticky-active.header-11:not(.goso-logo-overflow) #logo img, .is-sticky #navigation.header-10:not( .goso-logo-overflow ) #logo img, .is-sticky #navigation.header-11:not( .goso-logo-overflow ) #logo img { max-height: ' . ( $mainmenu_height_sticky ) . 'px; }';
			echo '}';
		}
		?>
		<?php if ( get_theme_mod( 'goso_mainmenu_height_mobile' ) && 30 < get_theme_mod( 'goso_mainmenu_height_mobile' ) ):
			$mmbheight = get_theme_mod( 'goso_mainmenu_height_mobile' );
			?>
            @media only screen and (max-width: 960px){
            #navigation, .show-search a.close-search{ height: <?php echo $mmbheight; ?>px !important; }
            #navigation .button-menu-mobile, .show-search a.close-search{ line-height: <?php echo $mmbheight; ?>px !important; }
            .top-search-classes a.cart-contents, .pcheader-icon > a, .show-search, .show-search form.pc-searchform input.search-input, .goso-menuhbg-toggle{ height: <?php echo( $mmbheight - 2 ); ?>px !important; }
            .top-search-classes a.cart-contents, .pcheader-icon > a, .main-nav-social{ line-height: <?php echo( $mmbheight - 2 ); ?>px !important; }
            .goso-mobile-hlogo img, #navigation.header-6 #logo img{ max-height: <?php echo $mmbheight; ?>px !important; }
            }
		<?php endif; ?>
		<?php if ( $header_bgcolor ): ?>
            #header .inner-header { background-color: <?php echo $header_bgcolor; ?>; background-image: none; }
		<?php endif; ?>
		<?php if ( $header_bgimg ): ?>
            #header .inner-header { background-image: url('<?php echo $header_bgimg; ?>'); }
		<?php endif; ?>
		<?php if ( $main_bar_bgcolor ): ?>
            #navigation, .show-search { background: <?php echo $main_bar_bgcolor; ?>; }
            @media only screen and (min-width: 960px){ #navigation.header-11 > .container { background: <?php echo $main_bar_bgcolor; ?>; }}
		<?php endif; ?>
		<?php if ( $main_bar_bgimg ): ?>
            #navigation, .show-search { background-image: url('<?php echo $main_bar_bgimg; ?>'); }
            @media only screen and (min-width: 960px){ #navigation.header-11 > .container { background-image: url('<?php echo $main_bar_bgimg; ?>'); }}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_remove_line_hover' ) ): ?>
            #navigation ul.menu > li > a:before, #navigation .menu > ul > li > a:before{ content: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_remove_line_slogan' ) ): ?>
            .header-slogan .header-slogan-text:before, .header-slogan .header-slogan-text:after{ content: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_main_bar_border_color' ) ): ?>
            #navigation, #navigation.header-layout-bottom { border-color: <?php echo get_theme_mod( 'goso_main_bar_border_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_main_bar_nav_color' ) ): ?>
            #navigation .menu > li > a, #navigation .menu .sub-menu li a { color:  <?php echo get_theme_mod( 'goso_main_bar_nav_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_main_bar_color_active' ) ): ?>
            #navigation .menu > li > a:hover, #navigation .menu li.current-menu-item > a, #navigation .menu > li.current_page_item > a, #navigation .menu > li:hover > a, #navigation .menu > li.current-menu-ancestor > a, #navigation .menu > li.current-menu-item > a, #navigation .menu .sub-menu li a:hover, #navigation .menu .sub-menu li.current-menu-item > a, #navigation .sub-menu li:hover > a { color:  <?php echo get_theme_mod( 'goso_main_bar_color_active' ); ?>; }
            #navigation ul.menu > li > a:before, #navigation .menu > ul > li > a:before { background: <?php echo get_theme_mod( 'goso_main_bar_color_active' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_main_bar_padding_color' ) ): ?>
            #navigation.menu-item-padding .menu > li > a:hover, #navigation.menu-item-padding .menu > li:hover > a, #navigation.menu-item-padding .menu > li.current-menu-item > a, #navigation.menu-item-padding .menu > li.current_page_item > a, #navigation.menu-item-padding .menu > li.current-menu-ancestor > a, #navigation.menu-item-padding .menu > li.current-menu-item > a { background-color:  <?php echo get_theme_mod( 'goso_main_bar_padding_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_drop_bg_color' ) ): ?>
            #navigation .menu .sub-menu, #navigation .menu .children, #navigation ul.menu > li.megamenu > ul.sub-menu { background-color:  <?php echo get_theme_mod( 'goso_drop_bg_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_drop_items_border' ) ): ?>
            #navigation .menu .sub-menu, #navigation .menu .children, #navigation ul.menu ul.sub-menu li > a, #navigation .menu ul ul.sub-menu li a, #navigation.menu-style-2 .menu .sub-menu, #navigation.menu-style-2 .menu .children { border-color:  <?php echo get_theme_mod( 'goso_drop_items_border' ); ?>; }
            #navigation .goso-megamenu .goso-mega-child-categories a.cat-active { border-top-color: <?php echo get_theme_mod( 'goso_drop_items_border' ); ?>; border-bottom-color: <?php echo get_theme_mod( 'goso_drop_items_border' ); ?>; }
            #navigation ul.menu > li.megamenu > ul.sub-menu > li:before, #navigation .goso-megamenu .goso-mega-child-categories:after { background-color: <?php echo get_theme_mod( 'goso_drop_items_border' ); ?>; }
            .goso-dropdown-menu{ border-color: <?php echo get_theme_mod( 'goso_drop_items_border' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_mega_bg_color' ) ): ?>
            #navigation .goso-megamenu, #navigation .goso-megamenu .goso-mega-child-categories a.cat-active,
            #navigation .goso-megamenu .goso-mega-child-categories a.cat-active:before { background-color: <?php echo get_theme_mod( 'goso_mega_bg_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_mega_child_cat_bg_color' ) ): ?>
            #navigation .goso-megamenu .goso-mega-child-categories, #navigation.menu-style-2 .goso-megamenu .goso-mega-child-categories a.cat-active { background-color: <?php echo get_theme_mod( 'goso_mega_child_cat_bg_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_mega_post_date_color' ) ): ?>
            #navigation .goso-megamenu .goso-mega-date { color: <?php echo get_theme_mod( 'goso_mega_post_date_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_mega_border_style2' ) ): ?>
            #navigation.menu-style-2 .goso-megamenu .goso-mega-child-categories:after, #navigation.menu-style-2 .goso-megamenu .goso-mega-child-categories a.all-style:before, .menu-style-2 .goso-megamenu .goso-content-megamenu .goso-mega-latest-posts .goso-mega-post:before{ background-color: <?php echo get_theme_mod( 'goso_mega_border_style2' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_mega_post_category_color' ) ): ?>
            #navigation .goso-megamenu .goso-mega-thumbnail .mega-cat-name { color: <?php echo get_theme_mod( 'goso_mega_post_category_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_mega_accent_color' ) ): ?>
            #navigation .goso-megamenu .goso-mega-child-categories a.cat-active, #navigation .menu .goso-megamenu .goso-mega-child-categories a:hover, #navigation .menu .goso-megamenu .goso-mega-latest-posts .goso-mega-post a:hover { color: <?php echo get_theme_mod( 'goso_mega_accent_color' ); ?>; }
            #navigation .goso-megamenu .goso-mega-thumbnail .mega-cat-name { background: <?php echo get_theme_mod( 'goso_mega_accent_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_size_header_social_check' ) ): ?>
            .header-social a i, .main-nav-social a { font-size: <?php echo get_theme_mod( 'goso_size_header_social_check' ); ?>px; }
            .header-social a svg, .main-nav-social a svg{ width: <?php echo get_theme_mod( 'goso_size_header_social_check' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'size_header_search_icon_check' ) ): ?>
            .pcheader-icon .search-click{ font-size: <?php echo get_theme_mod( 'size_header_search_icon_check' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'size_header_search_input' ) ): ?>
            .show-search form.pc-searchform input.search-input{ font-size: <?php echo get_theme_mod( 'size_header_search_input' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'size_header_cart_icon_check' ) ): ?>
            .pcheader-icon.shoping-cart-icon > a > i{ font-size: <?php echo get_theme_mod( 'size_header_cart_icon_check' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_topbar_menu_uppercase' ) ): ?>
            #navigation .menu > li > a, #navigation ul.menu ul.sub-menu li > a, .navigation ul.menu ul.sub-menu li > a, #navigation .goso-megamenu .goso-mega-child-categories a, .navigation .goso-megamenu .goso-mega-child-categories a{ text-transform: none; }
            #navigation .goso-megamenu .post-mega-title a{ text-transform: uppercase; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_font_size_lv1' ) ): ?>
            #navigation ul.menu > li > a, #navigation .menu > ul > li > a { font-size: <?php echo get_theme_mod( 'goso_font_size_lv1' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_font_size_drop' ) ): ?>
            #navigation ul.menu ul.sub-menu li > a, #navigation .goso-megamenu .goso-mega-child-categories a, #navigation .goso-megamenu .post-mega-title a, #navigation .menu ul ul.sub-menu li a { font-size: <?php echo get_theme_mod( 'goso_font_size_drop' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_hidesocial_nav' ) ): ?>
            @media only screen and (max-width: 767px){ .main-nav-social{ display: none; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_font_size_title_cat_mega' ) ): ?>
            #navigation .goso-megamenu .post-mega-title a, .navigation .goso-megamenu .goso-content-megamenu .goso-mega-latest-posts .goso-mega-post a{ font-size:<?php echo get_theme_mod( 'goso_font_size_title_cat_mega' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_font_size_child_cat_mega' ) ): ?>
            #navigation .goso-megamenu .goso-mega-child-categories a, .pc-builder-element.pc-main-menu .navigation .menu li .goso-mega-child-categories a{ font-size: <?php echo get_theme_mod( 'goso_font_size_child_cat_mega' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_font_size_cat_mega' ) ): ?>
            #navigation .goso-megamenu .goso-mega-thumbnail .mega-cat-name, .navigation .goso-megamenu .goso-mega-thumbnail .mega-cat-name { font-size:<?php echo get_theme_mod( 'goso_font_size_cat_mega' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_font_size_date_mega' ) ): ?>
            #navigation .goso-megamenu .goso-mega-date, .navigation .goso-megamenu .goso-mega-date { font-size:<?php echo get_theme_mod( 'goso_font_size_date_mega' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_vernav_remove_line' ) ): ?>
            #sidebar-nav-logo{ padding-bottom: 0; } #sidebar-nav-logo:before { content: none; display: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_vernav_fsearchinput' ) ): ?>
            #sidebar-nav form.pc-searchform.goso-hbg-search-form input.search-input{ font-size:<?php echo get_theme_mod( 'goso_vernav_fsearchinput' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_font_icons_mobile_nav' ) ): ?>
            #sidebar-nav .header-social.sidebar-nav-social a i { font-size: <?php echo get_theme_mod( 'goso_font_icons_mobile_nav' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_font_size_mobile_nav' ) ): ?>
            #sidebar-nav .menu li a { font-size: <?php echo get_theme_mod( 'goso_font_size_mobile_nav' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_vernav_off_uppercase' ) ): ?>
            #sidebar-nav .menu li a { text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_font_size_menu_hbg' ) ): ?>
            .goso-menu-hbg .menu li a { font-size: <?php echo get_theme_mod( 'goso_font_size_menu_hbg' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_font_size_submenu_hbg' ) ): ?>
            .goso-menu-hbg .menu ul.sub-menu li a { font-size: <?php echo get_theme_mod( 'goso_font_size_submenu_hbg' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_menu_hbg_lowcase' ) ): ?>
            .goso-menu-hbg .menu li a { text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_off_uppercase_cat_mega' ) ): ?>
            #navigation .goso-megamenu .post-mega-title a, .navigation .goso-megamenu .goso-content-megamenu .goso-mega-latest-posts .goso-mega-post a{ text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_slogan_color' ) ): ?>
            .header-slogan .header-slogan-text { color:  <?php echo get_theme_mod( 'goso_header_slogan_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_slogan_line_color' ) ): ?>
            .header-slogan .header-slogan-text:before, .header-slogan .header-slogan-text:after { background:  <?php echo get_theme_mod( 'goso_header_slogan_line_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_drop_text_color' ) ): ?>
            #navigation .menu .sub-menu li a { color:  <?php echo get_theme_mod( 'goso_drop_text_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_drop_text_hover_color' ) ): ?>
            #navigation .menu .sub-menu li a:hover, #navigation .menu .sub-menu li.current-menu-item > a, #navigation .sub-menu li:hover > a { color:  <?php echo get_theme_mod( 'goso_drop_text_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_drop_border_style2' ) ): ?>
            #navigation.menu-style-2 ul.menu ul.sub-menu:before, #navigation.menu-style-2 .menu ul ul.sub-menu:before { background-color: <?php echo get_theme_mod( 'goso_drop_border_style2' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_main_bar_search_magnify' ) ): ?>
            .top-search-classes a.cart-contents, .pcheader-icon > a, #navigation .button-menu-mobile { color: <?php echo get_theme_mod( 'goso_main_bar_search_magnify' ); ?>; }
            #navigation .button-menu-mobile svg { fill: <?php echo get_theme_mod( 'goso_main_bar_search_magnify' ); ?>; }
            .show-search form.pc-searchform input.search-input::-webkit-input-placeholder{ color: <?php echo get_theme_mod( 'goso_main_bar_search_magnify' ); ?>; }
            .show-search form.pc-searchform input.search-input:-moz-placeholder { color: <?php echo get_theme_mod( 'goso_main_bar_search_magnify' ); ?>; opacity: 1;}
            .show-search form.pc-searchform input.search-input::-moz-placeholder {color: <?php echo get_theme_mod( 'goso_main_bar_search_magnify' ); ?>; opacity: 1; }
            .show-search form.pc-searchform input.search-input:-ms-input-placeholder { color: <?php echo get_theme_mod( 'goso_main_bar_search_magnify' ); ?>; }
            .show-search form.pc-searchform input.search-input{ color: <?php echo get_theme_mod( 'goso_main_bar_search_magnify' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_main_bar_close_color' ) ): ?>
            .show-search a.close-search { color: <?php echo get_theme_mod( 'goso_main_bar_close_color' ); ?>; }
            .header-search-style-overlay .show-search a.close-search { color: <?php echo get_theme_mod( 'goso_main_bar_close_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_search_obg_color' ) ): ?>
            .header-search-style-overlay .show-search { background-color: <?php echo get_theme_mod( 'goso_search_obg_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_search_oinput_color' ) ): ?>
            .header-search-style-overlay .show-search form.pc-searchform input.search-input { color: <?php echo get_theme_mod( 'goso_search_oinput_color' ); ?>; }
            .header-search-style-overlay .show-search form.pc-searchform ::placeholder{ color: <?php echo get_theme_mod( 'goso_search_oinput_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_search_obd_color' ) ): ?>
            .header-search-style-overlay .show-search form.pc-searchform .pc-searchform-inner { border-bottom-color: <?php echo get_theme_mod( 'goso_search_obd_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_off_uppercase_title' ) ): ?>
            .goso-featured-content .feat-text h3 a, .featured-style-35 .feat-text-right h3 a, .featured-style-4 .goso-featured-content .feat-text h3 a, .goso-mag-featured-content h3 a, .gososlider-container .gososlider-content .gososlider-title { text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_lowcase_popular_posts' ) ): ?>
            .goso-home-popular-post .item-related h3 a { text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_fslider_cat_fsize' ) ): ?>
            .featured-area .cat > a.goso-cat-name { font-size: <?php echo get_theme_mod( 'goso_fslider_cat_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_fslider_meta_fsize' ) ): ?>
            .goso-featured-content .feat-text .feat-meta span { font-size: <?php echo get_theme_mod( 'goso_fslider_meta_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_fslider_title_fsize' ) ): ?>
            @media only screen and (min-width: 768px){ .goso-featured-content .feat-text h3 a, .featured-style-4 .goso-featured-content .feat-text h3 a, .featured-style-6 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-7 .goso-mag-featured-content h3 a, .featured-style-8 .goso-mag-featured-content h3 a, .featured-style-9 .goso-mag-featured-content h3 a, .featured-style-10 .goso-mag-featured-content h3 a, .featured-style-11 .goso-mag-featured-content h3 a, .featured-style-12 .goso-mag-featured-content h3 a, .featured-style-13 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-14 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-15 .goso-item-2 .goso-mag-featured-content h3 a, .featured-style-16 .goso-item-2 .goso-mag-featured-content h3 a, .featured-style-17 .goso-item-3 .goso-mag-featured-content h3 a, .featured-style-18 .goso-item-3 .goso-mag-featured-content h3 a, .featured-style-19 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-19 .goso-item-0 .goso-mag-featured-content h3 a, .featured-style-20 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-20 .goso-item-2 .goso-mag-featured-content h3 a, .featured-style-21 .goso-item-4 .goso-mag-featured-content h3 a, .featured-style-21 .goso-item-0 .goso-mag-featured-content h3 a, .featured-style-22 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-22 .goso-item-2 .goso-mag-featured-content h3 a, .featured-style-23 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-23 .goso-item-2 .goso-mag-featured-content h3 a, .featured-style-24 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-25 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-26 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-27 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-28 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-29 .goso-featured-content .feat-text h3 a, .featured-style-35 .feat-text-right h3 a, .featured-style-37 .goso-item-1 .goso-mag-featured-content h3 a{ font-size: <?php echo get_theme_mod( 'goso_fslider_title_fsize' ); ?>px; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_fslider_smalltitle_fsize' ) ): ?>
            @media only screen and (min-width: 768px){ .goso-mag-featured-content h3 a, .featured-style-13 .goso-mag-featured-content h3 a, .featured-style-15 .goso-mag-featured-content h3 a, .featured-style-18 .goso-mag-featured-content h3 a, .featured-style-24 .goso-item-2 .goso-mag-featured-content h3 a { font-size: <?php echo get_theme_mod( 'goso_fslider_smalltitle_fsize' ); ?>px; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_fslider_tinytitle_fsize' ) ): ?>
            @media only screen and (min-width: 768px){ .featured-style-22 .goso-item-3 .goso-mag-featured-content h3 a, .featured-style-22 .goso-item-4 .goso-mag-featured-content h3 a, .featured-style-22 .goso-item-5 .goso-mag-featured-content h3 a, .featured-style-22 .goso-item-6 .goso-mag-featured-content h3 a, .featured-style-22 .goso-item-0 .goso-mag-featured-content h3 a, .featured-style-23 .goso-item-3 .goso-mag-featured-content h3 a, .featured-style-23 .goso-item-4 .goso-mag-featured-content h3 a, .featured-style-23 .goso-item-5 .goso-mag-featured-content h3 a, .featured-style-23 .goso-item-0 .goso-mag-featured-content h3 a, .featured-style-24 .goso-item-3 .goso-mag-featured-content h3 a, .featured-style-24 .goso-item-0 .goso-mag-featured-content h3 a{ font-size: <?php echo get_theme_mod( 'goso_fslider_tinytitle_fsize' ); ?>px; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_fslider_excerpt_fsize' ) ): ?>
            .featured-style-35 .featured-content-excerpt p, .featured-slider-excerpt p { font-size: <?php echo get_theme_mod( 'goso_fslider_excerpt_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_fslider_button_fsize' ) ): ?>
            .featured-style-29 .goso-featured-slider-button a, .featured-style-35 .goso-featured-slider-button a, .featured-style-38 .goso-featured-slider-button a { font-size: <?php echo get_theme_mod( 'goso_fslider_button_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_fslider_title_fsize_mobile' ) ): ?>
            @media only screen and (max-width: 479px){ .goso-featured-content .feat-text h3 a, .featured-style-4 .goso-featured-content .feat-text h3 a, .featured-style-5 .goso-featured-content .feat-text h3 a, .featured-style-6 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-7 .goso-mag-featured-content h3 a, .featured-style-8 .goso-mag-featured-content h3 a, .featured-style-9 .goso-mag-featured-content h3 a, .featured-style-10 .goso-mag-featured-content h3 a, .featured-style-11 .goso-mag-featured-content h3 a, .featured-style-12 .goso-mag-featured-content h3 a, .featured-style-13 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-14 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-15 .goso-mag-featured-content h3 a, .featured-style-15 .goso-item-2 .goso-mag-featured-content h3 a, .featured-style-16 .goso-mag-featured-content h3 a, .featured-style-16 .goso-item-2 .goso-mag-featured-content h3 a, .featured-style-17 .goso-item-3 .goso-mag-featured-content h3 a, .featured-style-18 .goso-item-3 .goso-mag-featured-content h3 a, .featured-style-20 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-21 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-22 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-26 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-27 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-28 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-29 .goso-featured-content .feat-text h3 a, .featured-style-30 .goso-featured-content .feat-text h3 a, .featured-style-35 .feat-text-right h3 a, .featured-style-37 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-38 .goso-featured-content .feat-text h3 a{ font-size: <?php echo get_theme_mod( 'goso_fslider_title_fsize_mobile' ); ?>px; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_fslider_small_fsize_mobile' ) ): ?>
            @media only screen and (max-width: 479px){ .goso-mag-featured-content h3 a, .featured-style-13 .goso-mag-featured-content h3 a, .featured-style-18 .goso-mag-featured-content h3 a, .featured-style-19 .goso-mag-featured-content h3 a, .featured-style-19 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-19 .goso-item-0 .goso-mag-featured-content h3 a, .featured-style-20 .goso-item-3 .goso-mag-featured-content h3 a, .featured-style-20 .goso-item-4 .goso-mag-featured-content h3 a, .featured-style-20 .goso-item-0 .goso-mag-featured-content h3 a, .featured-style-20 .goso-item-2 .goso-mag-featured-content h3 a, .featured-style-21 .goso-item-4 .goso-mag-featured-content h3 a, .featured-style-21 .goso-item-0 .goso-mag-featured-content h3 a, .featured-style-21 .goso-item-2 .goso-mag-featured-content h3 a, .featured-style-21 .goso-item-3 .goso-mag-featured-content h3 a, .featured-style-22 .goso-item-2 .goso-mag-featured-content h3 a, .featured-style-22 .goso-item-3 .goso-mag-featured-content h3 a, .featured-style-22 .goso-item-4 .goso-mag-featured-content h3 a, .featured-style-22 .goso-item-5 .goso-mag-featured-content h3 a, .featured-style-22 .goso-item-6 .goso-mag-featured-content h3 a, .featured-style-22 .goso-item-0 .goso-mag-featured-content h3 a, .featured-style-23 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-23 .goso-item-2 .goso-mag-featured-content h3 a, .featured-style-23 .goso-item-3 .goso-mag-featured-content h3 a, .featured-style-23 .goso-item-4 .goso-mag-featured-content h3 a, .featured-style-23 .goso-item-5 .goso-mag-featured-content h3 a, .featured-style-23 .goso-item-0 .goso-mag-featured-content h3 a, .featured-style-24 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-24 .goso-item-2 .goso-mag-featured-content h3 a, .featured-style-24 .goso-item-3 .goso-mag-featured-content h3 a, .featured-style-24 .goso-item-0 .goso-mag-featured-content h3 a, .featured-style-25 .goso-item-1 .goso-mag-featured-content h3 a, .featured-style-25 .goso-item-2 .goso-mag-featured-content h3 a, .featured-style-25 .goso-item-3 .goso-mag-featured-content h3 a, .featured-style-25 .goso-item-0 .goso-mag-featured-content h3 a, .featured-style-26 .goso-item-2 .goso-mag-featured-content h3 a, .featured-style-26 .goso-item-3 .goso-mag-featured-content h3 a, .featured-style-26 .goso-item-4 .goso-mag-featured-content h3 a, .featured-style-26 .goso-item-0 .goso-mag-featured-content h3 a, .featured-style-27 .goso-item-2 .goso-mag-featured-content h3 a, .featured-style-27 .goso-item-3 .goso-mag-featured-content h3 a, .featured-style-27 .goso-item-4 .goso-mag-featured-content h3 a, .featured-style-27 .goso-item-0 .goso-mag-featured-content h3 a, .featured-style-28 .goso-mag-featured-content h3 a{ font-size: <?php echo get_theme_mod( 'goso_fslider_small_fsize_mobile' ); ?>px; } }
		<?php endif; ?>
		<?php echo goso_renders_css( '.gososlider-container .gososlider-content .gososlider-title', 'goso_pslider_title_fsize' ); ?>
		<?php echo goso_renders_css( '.gososlider-container .gososlider-content .gososlider-caption', 'goso_pslider_caption_fsize' ); ?>
		<?php echo goso_renders_css( '.gososlider-container .gososlider-content .gososlider-button', 'goso_pslider_button_fsize' ); ?>
		<?php if ( get_theme_mod( 'goso_featured_cat_margin' ) ):
			$margin_space = get_theme_mod( 'goso_featured_cat_margin' );
			$margin_space       = absint( $margin_space );
			?>
            .home-featured-cat-content, .goso-featured-cat-seemore, .goso-featured-cat-custom-ads, .home-featured-cat-content.style-8 { margin-bottom: <?php echo $margin_space; ?>px; }
            .home-featured-cat-content.style-8 .goso-grid li.list-post:last-child{ margin-bottom: 0; }
            .home-featured-cat-content.style-3, .home-featured-cat-content.style-11{ margin-bottom: <?php echo( $margin_space - 10 ); ?>px; }
            .home-featured-cat-content.style-7{ margin-bottom: <?php echo( $margin_space - 26 ); ?>px; }
            .home-featured-cat-content.style-13{ margin-bottom: <?php echo( $margin_space - 20 ); ?>px; }
            .goso-featured-cat-seemore, .goso-featured-cat-custom-ads{ margin-top: <?php echo - ( $margin_space - 20 ); ?>px; }
            .goso-featured-cat-seemore.goso-seemore-style-7, .mag-cat-style-7 .goso-featured-cat-custom-ads{ margin-top: <?php echo - ( abs( $margin_space - 26 ) + 4 ); ?>px; }
            .goso-featured-cat-seemore.goso-seemore-style-8, .mag-cat-style-8 .goso-featured-cat-custom-ads{ margin-top: <?php echo - ( abs( $margin_space - 60 ) - 20 ); ?>px; }
            .goso-featured-cat-seemore.goso-seemore-style-13, .mag-cat-style-13 .goso-featured-cat-custom-ads{ margin-top: <?php echo - ( $margin_space - 20 ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_feacat_rmborder' ) ): ?>
            .home-featured-cat-content .mag-post-box{ border-bottom: none; margin-bottom: 20px; padding-bottom: 0; }
            .home-featured-cat-content.style-2 .mag-post-box.first-post, .home-featured-cat-content.style-10 .mag-post-box.first-post, .home-featured-cat-content.style-8 .goso-grid li.list-post{ padding-bottom: 0; border-bottom: none; }
            .home-featured-cat-content.style-14 .mag-post-box, .home-featured-cat-content.style-14 .mag-post-box{ padding-bottom: 0; margin-bottom: 20px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_cat_imgwidth' ) ): ?>
            .home-featured-cat-content.style-15 .goso-image-holder.small-fix-size, .home-featured-cat-content .goso-image-holder.small-fix-size{ width: <?php echo get_theme_mod( 'goso_featured_cat_imgwidth' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_slider_filter_type' ) != 'tags' && get_theme_mod( 'goso_featured_cat' ) && get_theme_mod( 'goso_featured_cat_hide' ) ):
			$featured_cat_id = get_theme_mod( 'goso_featured_cat' );
			?>
            .widget_categories ul li.cat-item-<?php echo $featured_cat_id; ?>, .widget_categories select option[value="<?php echo $featured_cat_id; ?>"], .widget_tag_cloud .tag-cloud-link.tag-link-<?php echo $featured_cat_id; ?>{ display: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_featured_cat_lowcase' ) ): ?>
            .goso-homepage-title.goso-magazine-title h3 a, .goso-border-arrow.goso-homepage-title .inner-arrow { text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_cat_size' ) ): ?>
            .goso-homepage-title.goso-magazine-title h3 a, .goso-border-arrow.goso-homepage-title .inner-arrow { font-size: <?php echo get_theme_mod( 'goso_featured_cat_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featuredcat_cat_size' ) ): ?>
            .home-featured-cat-content .cat > a.goso-cat-name { font-size: <?php echo get_theme_mod( 'goso_featuredcat_cat_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featuredcat_meta_size' ) ): ?>
            .home-featured-cat-content .grid-post-box-meta, .home-featured-cat-content.style-12 .magcat-detail .mag-meta, .goso-fea-cat-style-13 .grid-post-box-meta, .home-featured-cat-content.style-14 .mag-meta{ font-size: <?php echo get_theme_mod( 'goso_featuredcat_meta_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featuredcat_excerpt_size' ) ): ?>
            .mag-excerpt p, .mag-excerpt, .home-featured-cat-content .item-content p, .home-featured-cat-content .item-content{ font-size: <?php echo get_theme_mod( 'goso_featuredcat_excerpt_size' ); ?>px; }
		<?php endif; ?>
		<?php echo goso_renders_css( '.home-featured-cat-content .goso-magcat-carousel .magcat-detail h3 a, .home-featured-cat-content .goso-grid li .item h2 a, .home-featured-cat-content .mag-photo .magcat-detail h3 a, .home-featured-cat-content .first-post .magcat-detail h3 a', 'goso_featuredcat_title_size' ); ?>
		<?php echo goso_renders_css( '.home-featured-cat-content .magcat-detail h3 a', 'goso_featuredcat_smtitle_size' ); ?>
		<?php echo goso_renders_css( '.goso-single-mag-slider .magcat-detail .magcat-titlte', 'goso_featuredcat4_title_size' ); ?>
		<?php echo goso_renders_css( '.home-featured-cat-content.style-12 .goso-magcat-carousel .magcat-detail h3 a, .home-featured-cat-content .goso-grid.goso-fea-cat-style-13 li .item h2 a', 'goso_featuredcat12_title_size' ); ?>
		<?php echo goso_renders_css( '.home-featured-cat-content.style-14 .first-post .magcat-detail h3 a', 'goso_featuredcat14_ftitle_size' ); ?>
		<?php echo goso_renders_css( '.home-featured-cat-content .magcat-detail .magcat-title-small a', 'goso_featuredcat14_title_size' ); ?>
		<?php if ( get_theme_mod( 'goso_featuredcat_viewall_size' ) ): ?>
            .goso-featured-cat-seemore a, .goso-featured-cat-seemore.goso-btn-make-button a{ font-size: <?php echo get_theme_mod( 'goso_featuredcat_viewall_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_cat_image_8' ) ): ?>
            .goso-homepage-title.style-8 .inner-arrow { background-image: url(<?php echo get_theme_mod( 'goso_featured_cat_image_8' ); ?>); }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_cat8_repeat' ) ): ?>
            .goso-homepage-title.style-8 .inner-arrow { background-repeat: <?php echo get_theme_mod( 'goso_featured_cat8_repeat' ); ?>; background-size: auto; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_goso_slider_ratio' ) ): ?>
            .goso-owl-carousel .gososlider-item .goso-image-holder{ height: auto !important; }
            .goso-owl-carousel .gososlider-item .goso-image-holder:before { content: ''; padding-top: <?php echo get_theme_mod( 'goso_featured_goso_slider_ratio' ); ?>%; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_goso_slider_remove_overlay' ) ): ?>
            .gososlider-container .gososlider-content .gososlider-title span, .gososlider-container .gososlider-content .gososlider-caption span{ background: none; padding: 0; }
		<?php endif; ?>
        .goso-header-signup-form { padding-top: <?php echo get_theme_mod( 'goso_header_signup_padding' ); ?>px; padding-bottom: <?php echo get_theme_mod( 'goso_header_signup_padding' ); ?>px; }
		<?php if ( get_theme_mod( 'goso_header_signup_fdesc' ) ): ?>
            .goso-header-signup-form .mc4wp-form-fields > p{ font-size: <?php echo get_theme_mod( 'goso_header_signup_fdesc' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_signup_finput' ) ): ?>
            .goso-header-signup-form .mc4wp-form input[type="text"], .goso-header-signup-form .mc4wp-form input[type="email"], .goso-header-signup-form .mc4wp-form input[type="date"], .goso-header-signup-form .mc4wp-form input[type="number"]{ font-size: <?php echo get_theme_mod( 'goso_header_signup_finput' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_signup_fsubmit' ) ): ?>
            .goso-header-signup-form .widget input[type="submit"] { font-size: <?php echo get_theme_mod( 'goso_header_signup_fsubmit' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_signup_bg' ) ): ?>
            .goso-header-signup-form { background-color: <?php echo get_theme_mod( 'goso_header_signup_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_signup_color' ) ): ?>
            .goso-header-signup-form .mc4wp-form, .goso-header-signup-form h4.header-signup-form, .goso-header-signup-form .mc4wp-form-fields > p, .goso-header-signup-form form > p { color: <?php echo get_theme_mod( 'goso_header_signup_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_signup_input_border' ) ): ?>
            .goso-header-signup-form .mc4wp-form input[type="text"], .goso-header-signup-form .mc4wp-form input[type="email"] { border-color: <?php echo get_theme_mod( 'goso_header_signup_input_border' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_signup_input_color' ) ): ?>
            .goso-header-signup-form .mc4wp-form input[type="text"], .goso-header-signup-form .mc4wp-form input[type="email"] { color: <?php echo get_theme_mod( 'goso_header_signup_input_color' ); ?>; }
            .goso-header-signup-form .mc4wp-form input[type="text"]::-webkit-input-placeholder, .goso-header-signup-form .mc4wp-form input[type="email"]::-webkit-input-placeholder{  color: <?php echo get_theme_mod( 'goso_header_signup_input_color' ); ?>;  }
            .goso-header-signup-form .mc4wp-form input[type="text"]:-moz-placeholder, .goso-header-signup-form .mc4wp-form input[type="email"]:-moz-placeholder {  color: <?php echo get_theme_mod( 'goso_header_signup_input_color' ); ?>;  }
            .goso-header-signup-form .mc4wp-form input[type="text"]::-moz-placeholder, .goso-header-signup-form .mc4wp-form input[type="email"]::-moz-placeholder {  color: <?php echo get_theme_mod( 'goso_header_signup_input_color' ); ?>;  }
            .goso-header-signup-form .mc4wp-form input[type="text"]:-ms-input-placeholder, .goso-header-signup-form .mc4wp-form input[type="email"]:-ms-input-placeholder {  color: <?php echo get_theme_mod( 'goso_header_signup_input_color' ); ?>;  }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_signup_submit_bg' ) ): ?>
            .goso-header-signup-form .widget input[type="submit"] { background-color: <?php echo get_theme_mod( 'goso_header_signup_submit_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_signup_submit_color' ) ): ?>
            .goso-header-signup-form .widget input[type="submit"] { color: <?php echo get_theme_mod( 'goso_header_signup_submit_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_signup_submit_bg_hover' ) ): ?>
            .goso-header-signup-form .widget input[type="submit"]:hover { background-color: <?php echo get_theme_mod( 'goso_header_signup_submit_bg_hover' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_signup_submit_color_hover' ) ): ?>
            .goso-header-signup-form .widget input[type="submit"]:hover { color: <?php echo get_theme_mod( 'goso_header_signup_submit_color_hover' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_social_color' ) ): ?>
            .header-social a i, .main-nav-social a {   color: <?php echo get_theme_mod( 'goso_header_social_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_header_social_color_hover' ) ): ?>
            .header-social a:hover i, .main-nav-social a:hover, .goso-menuhbg-toggle:hover .lines-button:after, .goso-menuhbg-toggle:hover .goso-lines:before, .goso-menuhbg-toggle:hover .goso-lines:after {   color: <?php echo get_theme_mod( 'goso_header_social_color_hover' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_ver_nav_overlay_color' ) ): ?>
            #close-sidebar-nav { background-color: <?php echo get_theme_mod( 'goso_ver_nav_overlay_color' ); ?>; }
            .open-sidebar-nav #close-sidebar-nav { opacity: 0.85; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_ver_nav_close_bg' ) ): ?>
            #close-sidebar-nav i { background-color: <?php echo get_theme_mod( 'goso_ver_nav_close_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_ver_nav_close_color' ) ): ?>
            #close-sidebar-nav i { color: <?php echo get_theme_mod( 'goso_ver_nav_close_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_ver_nav_bg' ) ): ?>
            #sidebar-nav { background: <?php echo get_theme_mod( 'goso_ver_nav_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_ver_nav_searchborder' ) ): ?>
            #sidebar-nav form.pc-searchform.goso-hbg-search-form input.search-input, #sidebar-nav form.pc-searchform.goso-hbg-search-form input.search-input:hover, #sidebar-nav form.pc-searchform.goso-hbg-search-form input.search-input:focus { border-color: <?php echo get_theme_mod( 'goso_ver_nav_searchborder' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_ver_nav_textcolor' ) ): ?>
            #sidebar-nav form.pc-searchform.goso-hbg-search-form input.search-input { color: <?php echo get_theme_mod( 'goso_ver_nav_textcolor' ); ?>; }
            #sidebar-nav form.pc-searchform.goso-hbg-search-form input.search-input::-webkit-input-placeholder { color: <?php echo get_theme_mod( 'goso_ver_nav_textcolor' ); ?>; }
            #sidebar-nav form.pc-searchform.goso-hbg-search-form input.search-input:-ms-input-placeholder { color: <?php echo get_theme_mod( 'goso_ver_nav_textcolor' ); ?>; }
            #sidebar-nav form.pc-searchform.goso-hbg-search-form input.search-input::placeholder { color: <?php echo get_theme_mod( 'goso_ver_nav_textcolor' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_ver_nav_iconcolor' ) ): ?>
            #sidebar-nav form.pc-searchform.goso-hbg-search-form i { color: <?php echo get_theme_mod( 'goso_ver_nav_iconcolor' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_ver_nav_accent_color' ) ): ?>
            .header-social.sidebar-nav-social a i, #sidebar-nav .menu li a, #sidebar-nav .menu li a .indicator { color: <?php echo get_theme_mod( 'goso_ver_nav_accent_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_ver_nav_accent_hover_color' ) ): ?>
            #sidebar-nav .menu li a:hover, .header-social.sidebar-nav-social a:hover i, #sidebar-nav .menu li a .indicator:hover, #sidebar-nav .menu .sub-menu li a .indicator:hover{ color: <?php echo get_theme_mod( 'goso_ver_nav_accent_hover_color' ); ?>; }
            #sidebar-nav-logo:before{ background-color: <?php echo get_theme_mod( 'goso_ver_nav_accent_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_ver_nav_items_border' ) ): ?>
            #sidebar-nav .menu li, #sidebar-nav ul.sub-menu, #sidebar-nav #logo + ul {   border-color: <?php echo get_theme_mod( 'goso_ver_nav_items_border' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_video_height' ) ): ?>
            #goso-featured-video-bg { height: <?php echo get_theme_mod( 'goso_featured_video_height' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_video_heading_color' ) ): ?>
            h2.goso-heading-video { color: <?php echo get_theme_mod( 'goso_featured_video_heading_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_video_sub_heading_color' ) ): ?>
            p.goso-sub-heading-video { color: <?php echo get_theme_mod( 'goso_featured_video_sub_heading_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_slider_overlay_bg' ) ): ?>
            .goso-slide-overlay .overlay-link {
            background: -moz-linear-gradient(top, rgba(255,255,255,0) 60%, <?php echo get_theme_mod( 'goso_featured_slider_overlay_bg' ); ?> 100%);
            background: -webkit-linear-gradient(top, rgba(255,255,255,0) 60%, <?php echo get_theme_mod( 'goso_featured_slider_overlay_bg' ); ?> 100%);
            background: -o-linear-gradient(top, rgba(255,255,255,0) 60%, <?php echo get_theme_mod( 'goso_featured_slider_overlay_bg' ); ?> 100%);
            background: -ms-linear-gradient(top, rgba(255,255,255,0) 60%, <?php echo get_theme_mod( 'goso_featured_slider_overlay_bg' ); ?> 100%);
            background: linear-gradient(to bottom, rgba(255,255,255,0) 60%, <?php echo get_theme_mod( 'goso_featured_slider_overlay_bg' ); ?> 100%);
            }
            .goso-slider4-overlay{
            background: -moz-linear-gradient(left, rgba(255,255,255,0) 26%, <?php echo get_theme_mod( 'goso_featured_slider_overlay_bg' ); ?> 65%);
            background: -webkit-gradient(linear, left top, right top, color-stop(26%, <?php echo get_theme_mod( 'goso_featured_slider_overlay_bg' ); ?>), color-stop(65%,transparent));
            background: -webkit-linear-gradient(left, rgba(255,255,255,0) 26%, <?php echo get_theme_mod( 'goso_featured_slider_overlay_bg' ); ?> 65%);
            background: -o-linear-gradient(left, rgba(255,255,255,0) 26%, <?php echo get_theme_mod( 'goso_featured_slider_overlay_bg' ); ?> 65%);
            background: -ms-linear-gradient(left, rgba(255,255,255,0) 26%, <?php echo get_theme_mod( 'goso_featured_slider_overlay_bg' ); ?> 65%);
            background: linear-gradient(to right, rgba(255,255,255,0) 26%, <?php echo get_theme_mod( 'goso_featured_slider_overlay_bg' ); ?> 65%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo get_theme_mod( 'goso_featured_slider_overlay_bg' ); ?>', endColorstr='<?php echo get_theme_mod( 'goso_featured_slider_overlay_bg' ); ?>',GradientType=1 );
            }
            @media only screen and (max-width: 960px){
            .featured-style-4 .goso-featured-content .featured-slider-overlay, .featured-style-5 .goso-featured-content .featured-slider-overlay { background-color: <?php echo get_theme_mod( 'goso_featured_slider_overlay_bg' ); ?>; }
            }
            .goso-slider38-overlay, .goso-flat-overlay .goso-slide-overlay .goso-mag-featured-content:before{ background-color: <?php echo get_theme_mod( 'goso_featured_slider_overlay_bg' ); ?>; }
		<?php endif; ?>
        .goso-slide-overlay .overlay-link, .goso-slider38-overlay, .goso-flat-overlay .goso-slide-overlay .goso-mag-featured-content:before { opacity: <?php echo get_theme_mod( 'goso_featured_slider_overlay_bg_opacity' ); ?>; }
        .goso-item-mag:hover .goso-slide-overlay .overlay-link, .featured-style-38 .item:hover .goso-slider38-overlay, .goso-flat-overlay .goso-item-mag:hover .goso-slide-overlay .goso-mag-featured-content:before { opacity: <?php echo get_theme_mod( 'goso_featured_slider_overlay_bg_hover_opacity' ); ?>; }
        .goso-featured-content .featured-slider-overlay { opacity: <?php echo get_theme_mod( 'goso_featured_slider_box_opacity' ); ?>; }
		<?php if ( get_theme_mod( 'goso_featured_slider_box_opacity' ) ): ?>
            @-webkit-keyframes gosofadeInUpDiv{Header Background Color
            0%{ opacity:0; -webkit-transform:translate3d(0,450px,0);transform:translate3d(0,450px,0);}
            100%{opacity:<?php echo get_theme_mod( 'goso_featured_slider_box_opacity' ); ?>;-webkit-transform:none;transform:none}
            }
            @keyframes gosofadeInUpDiv{
            0%{opacity:0;-webkit-transform:translate3d(0,450px,0);transform:translate3d(0,450px,0);}
            100%{opacity:<?php echo get_theme_mod( 'goso_featured_slider_box_opacity' ); ?>;-webkit-transform:none;transform:none}
            }
            @media only screen and (max-width: 960px){
            .goso-featured-content-right .feat-text-right:before{ opacity: <?php echo get_theme_mod( 'goso_featured_slider_box_opacity' ); ?>; }
            }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_slider_box_bg_color' ) ): ?>
            .goso-featured-content .featured-slider-overlay, .goso-featured-content-right:before, .goso-featured-content-right .feat-text-right:before { background: <?php echo get_theme_mod( 'goso_featured_slider_box_bg_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_slider_cat_color' ) ): ?>
            .goso-featured-content .feat-text .featured-cat a, .goso-mag-featured-content .cat > a.goso-cat-name, .featured-style-35 .cat > a.goso-cat-name { color: <?php echo get_theme_mod( 'goso_featured_slider_cat_color' ); ?>; }
            .goso-mag-featured-content .cat > a.goso-cat-name:after, .goso-featured-content .cat > a.goso-cat-name:after, .featured-style-35 .cat > a.goso-cat-name:after{ border-color: <?php echo get_theme_mod( 'goso_featured_slider_cat_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_slider_cat_hover_color' ) ): ?>
            .goso-featured-content .feat-text .featured-cat a:hover, .goso-mag-featured-content .cat > a.goso-cat-name:hover, .featured-style-35 .cat > a.goso-cat-name:hover { color: <?php echo get_theme_mod( 'goso_featured_slider_cat_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_slider_title_color' ) ): ?>
            .goso-mag-featured-content h3 a, .goso-featured-content .feat-text h3 a, .featured-style-35 .feat-text-right h3 a { color: <?php echo get_theme_mod( 'goso_featured_slider_title_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_slider_title_hover_color' ) ): ?>
            .goso-mag-featured-content h3 a:hover, .goso-featured-content .feat-text h3 a:hover, .featured-style-35 .feat-text-right h3 a:hover { color: <?php echo get_theme_mod( 'goso_featured_slider_title_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_slider_meta_color' ) ): ?>
            .goso-mag-featured-content .feat-meta span, .goso-mag-featured-content .feat-meta a, .goso-featured-content .feat-text .feat-meta span, .goso-featured-content .feat-text .feat-meta span a, .featured-style-35 .featured-content-excerpt .feat-meta span, .featured-style-35 .featured-content-excerpt .feat-meta span a { color: <?php echo get_theme_mod( 'goso_featured_slider_meta_color' ); ?>; }
            .goso-mag-featured-content .feat-meta > span:after, .goso-featured-content .feat-text .feat-meta > span:after { border-color: <?php echo get_theme_mod( 'goso_featured_slider_meta_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_slider_excerpt_color' ) ): ?>
            .featured-style-35 .featured-content-excerpt p, .featured-slider-excerpt p{ color: <?php echo get_theme_mod( 'goso_featured_slider_excerpt_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_slider_icon_color' ) ): ?>
            .featured-area .overlay-icon-format { color: <?php echo get_theme_mod( 'goso_featured_slider_icon_color' ); ?>; border-color: <?php echo get_theme_mod( 'goso_featured_slider_icon_color' ); ?>; }
		<?php endif; ?>
        .featured-style-29 .featured-slider-overlay { opacity: <?php echo get_theme_mod( 'goso_featured_slider_overlay_opacity29' ); ?>; }
		<?php if ( get_theme_mod( 'goso_featured_slider_color_29' ) ): ?>
            .featured-style-29 .featured-slider-overlay { background-color: <?php echo get_theme_mod( 'goso_featured_slider_color_29' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_slider_lines_color' ) ): ?>
            .featured-style-29 .goso-featured-content .feat-text h3:before { border-color: <?php echo get_theme_mod( 'goso_featured_slider_lines_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_slider_button_color' ) ): ?>
            .featured-style-29 .goso-featured-slider-button a, .featured-style-35 .goso-featured-slider-button a, .featured-style-38 .goso-featured-slider-button a { border-color: <?php echo get_theme_mod( 'goso_featured_slider_button_color' ); ?>; color: <?php echo get_theme_mod( 'goso_featured_slider_button_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_slider_button_hover_bg' ) ): ?>
            .featured-style-29 .goso-featured-slider-button a:hover, .featured-style-35 .goso-featured-slider-button a:hover, .featured-style-38 .goso-featured-slider-button a:hover { border-color: <?php echo get_theme_mod( 'goso_featured_slider_button_hover_bg' ); ?>; background-color: <?php echo get_theme_mod( 'goso_featured_slider_button_hover_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_featured_slider_button_hover_color' ) ): ?>
            .featured-style-29 .goso-featured-slider-button a:hover, .featured-style-35 .goso-featured-slider-button a:hover, .featured-style-38 .goso-featured-slider-button a:hover { color: <?php echo get_theme_mod( 'goso_featured_slider_button_hover_color' ); ?>; }
		<?php endif; ?>
		<?php
		$auto_speed = get_theme_mod( 'goso_featured_slider_auto_speed' );
		if ( is_numeric( $auto_speed ) ):
			$auto_speed_css = $auto_speed / 1000;
			?>
            .goso-owl-carousel{--pcfs-delay:<?php echo sanitize_text_field( $auto_speed_css - 0.1 ); ?>s;}
           	<?php endif; ?>
		<?php
		$goso_slider_height  = get_theme_mod( 'goso_featured_goso_slider_height' );
		if ( ! empty( $goso_slider_height ) && is_numeric( $goso_slider_height ) ): ?>
            .featured-area .goso-slider { max-height: <?php echo absint( $goso_slider_height ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_standard_meta_overlay' ) ): ?>
            .goso-wrapper-data .standard-post-image:not(.classic-post-image){ margin-bottom: 0; }
            .header-standard.standard-overlay-meta{ margin: -30px 30px 19px; background: #fff; padding-top: 25px; padding-left: 5px; padding-right: 5px; z-index: 10; position: relative; }
            .goso-wrapper-data .standard-post-image:not(.classic-post-image) .audio-iframe, .goso-wrapper-data .standard-post-image:not(.classic-post-image) .standard-content-special{ bottom: 50px; }
            @media only screen and (max-width: 479px){
            .header-standard.standard-overlay-meta{ margin-left: 10px; margin-right: 10px; }
            }
			<?php if ( get_theme_mod( 'goso_bg_color_dark' ) ): ?>
                .header-standard.standard-overlay-meta{ background-color: var(--pcbg-cl); }
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_stahea_align' ) ):
			$staheader_align = get_theme_mod( 'goso_stahea_align' );
			?>
            .header-standard:not(.single-header), .standard-post-image{ text-align: <?php echo $staheader_align; ?> }
			<?php if ( 'left' == $staheader_align ) { ?>
            .header-standard:after{ left: 0; margin-left: 0; }
            .header-standard.standard-overlay-meta{ padding-left: 20px; padding-right: 10px; }
            .header-standard.standard-overlay-meta:after{ left: 20px; }
		<?php } else if ( 'right' == $staheader_align ) { ?>
            .header-standard:after{ left: auto; right: 0; margin-left: 0; }
            .header-standard.standard-overlay-meta{ padding-right: 20px; padding-left: 10px; }
            .header-standard.standard-overlay-meta:after{ right: 20px; }
		<?php } ?>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_staex_align' ) ): ?>
            .post-entry.standard-post-entry{ text-align: <?php echo get_theme_mod( 'goso_staex_align' ); ?> }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_stacoti_align' ) ):
			$staconti_align = get_theme_mod( 'goso_stacoti_align' );
			?>
            .goso-more-link{ text-align: <?php echo get_theme_mod( 'goso_stacoti_align' ); ?> }
			<?php if ( 'left' == $staconti_align ) { ?>
            .goso-more-link a.more-link:before{ content: none; }
		<?php } else if ( 'right' == $staconti_align ) { ?>
            .goso-more-link a.more-link:after{ content: none; }
		<?php } ?>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_standard_effect_button' ) ): ?>
            .goso-more-link a.more-link:hover:before { right: 100%; margin-right: 10px; width: 60px; }
            .goso-more-link a.more-link:hover:after{ left: 100%; margin-left: 10px; width: 60px; }
            .standard-post-entry a.more-link:hover, .standard-post-entry a.more-link:hover:before, .standard-post-entry a.more-link:hover:after { opacity: 0.8; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_standard_off_uppercase_title' ) ): ?>
            .header-standard h2, .header-standard .post-title, .header-standard h2 a { text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_standard_on_uppercase_cat' ) ): ?>
            .header-standard .cat a.goso-cat-name { text-transform: uppercase; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_standard_categories_action_color' ) ): ?>
            .goso-standard-cat .cat > a.goso-cat-name { color: <?php echo get_theme_mod( 'goso_standard_categories_action_color' ); ?>; }
            .goso-standard-cat .cat:before, .goso-standard-cat .cat:after { background-color: <?php echo get_theme_mod( 'goso_standard_categories_action_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_standard_title_post_color' ) ): ?>
            .header-standard > h2 a { color: <?php echo get_theme_mod( 'goso_standard_title_post_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_standard_title_post_color' ) ): ?>
            .header-standard > h2 a { color: <?php echo get_theme_mod( 'goso_standard_title_post_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_standard_title_post_hover_color' ) ): ?>
            .header-standard > h2 a:hover { color: <?php echo get_theme_mod( 'goso_standard_title_post_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_standard_share_icon_color' ) ): ?>
            .standard-content .goso-post-box-meta .goso-post-share-box a { color: <?php echo get_theme_mod( 'goso_standard_share_icon_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_standard_share_icon_hover_color' ) ): ?>
            .standard-content .goso-post-box-meta .goso-post-share-box a:hover, .standard-content .goso-post-box-meta .goso-post-share-box a.liked { color: <?php echo get_theme_mod( 'goso_standard_share_icon_hover_color' ); ?>; }
		<?php endif; ?>

		<?php if ( get_theme_mod( 'goso_standard_meta_post_color' ) ): ?>
            .header-standard .author-post span, .standard-content .goso-post-box-meta .goso-box-meta span, .standard-content .goso-post-box-meta .goso-box-meta a { color: <?php echo get_theme_mod( 'goso_standard_meta_post_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_standard_author_post_color' ) ): ?>
            .header-standard .author-post span a{ color: <?php echo get_theme_mod( 'goso_standard_author_post_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_standard_accent_color' ) ): ?>
            .header-standard .post-entry a:hover, .header-standard .author-post span a:hover, .standard-content a, .standard-content .post-entry a, .standard-post-entry a.more-link:hover, .goso-post-box-meta .goso-box-meta a:hover, .standard-content .post-entry blockquote:before, .post-entry blockquote cite, .post-entry blockquote .author, .standard-content-special .author-quote span, .standard-content-special .format-post-box .post-format-icon i, .standard-content-special .format-post-box .dt-special a:hover, .standard-content .goso-more-link a.more-link, .standard-content .goso-post-box-meta .goso-box-meta a:hover { color: <?php echo get_theme_mod( 'goso_standard_accent_color' ); ?>; }
            .standard-content .goso-more-link.goso-more-link-button a.more-link{ background-color: <?php echo get_theme_mod( 'goso_standard_accent_color' ); ?>; color: #fff; }
            .standard-content-special .author-quote span:before, .standard-content-special .author-quote span:after, .standard-content .post-entry ul li:before, .post-entry blockquote .author span:after, .header-standard:after { background-color: <?php echo get_theme_mod( 'goso_standard_accent_color' ); ?>; }
            .goso-more-link a.more-link:before, .goso-more-link a.more-link:after { border-color: <?php echo get_theme_mod( 'goso_standard_accent_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_standard_readmore_color' ) ): ?>
            .standard-content .goso-more-link a.more-link, .standard-content .goso-more-link.goso-more-link-button a.more-link{ color: <?php echo get_theme_mod( 'goso_standard_readmore_color' ); ?>; }
            .standard-content .goso-more-link a.more-link:before, .standard-content .goso-more-link a.more-link:after{ border-color: <?php echo get_theme_mod( 'goso_standard_readmore_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_standard_readmore_bg' ) ): ?>
            .standard-content .goso-more-link.goso-more-link-button a.more-link{ background-color: <?php echo get_theme_mod( 'goso_standard_readmore_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_grid_off_title_uppercase' ) ): ?>
            .goso-grid li .item h2 a, .goso-masonry .item-masonry h2 a, .grid-mixed .mixed-detail h2 a, .overlay-header-box .overlay-title a { text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_grid_off_letter_spacing' ) ): ?>
            .goso-grid li .item h2 a, .goso-masonry .item-masonry h2 a { }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_grid_uppercase_cat' ) ): ?>
            .goso-grid .cat a.goso-cat-name, .goso-masonry .cat a.goso-cat-name, .goso-featured-infor .cat a.goso-cat-name, .grid-mixed .cat a.goso-cat-name, .overlay-header-box .cat a.goso-cat-name { text-transform: uppercase; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_masonry_categories_accent_color' ) ): ?>
            .goso-featured-infor .cat a.goso-cat-name, .goso-grid .cat a.goso-cat-name, .goso-masonry .cat a.goso-cat-name, .goso-featured-infor .cat a.goso-cat-name { color: <?php echo get_theme_mod( 'goso_masonry_categories_accent_color' ); ?>; }
            .goso-featured-infor .cat a.goso-cat-name:after, .goso-grid .cat a.goso-cat-name:after, .goso-masonry .cat a.goso-cat-name:after, .goso-featured-infor .cat a.goso-cat-name:after{ border-color: <?php echo get_theme_mod( 'goso_masonry_categories_accent_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_masonry_box_icon' ) ): ?>
            .goso-post-box-meta .goso-post-share-box a { color: <?php echo get_theme_mod( 'goso_masonry_box_icon' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_masonry_box_icon_hover' ) ): ?>
            .goso-post-share-box a.liked, .goso-post-share-box a:hover { color: <?php echo get_theme_mod( 'goso_masonry_box_icon_hover' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_masonry_box_ficon' ) ): ?>
            .grid-featured .goso-featured-share-box a { color: <?php echo get_theme_mod( 'goso_masonry_box_ficon' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_masonry_box_ficon_hover' ) ): ?>
            .grid-featured .goso-featured-share-box a:hover { color: <?php echo get_theme_mod( 'goso_masonry_box_ficon_hover' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_masonry_box_icon_bg' ) ): ?>
            .goso-featured-share-box .goso-shareic, .goso-featured-share-box .goso-shareso { background-color: <?php echo get_theme_mod( 'goso_masonry_box_icon_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_masonry_title_post_color' ) ): ?>
            .goso-featured-infor .goso-entry-title a, .goso-grid li .item h2 a, .goso-masonry .item-masonry h2 a, .grid-mixed .mixed-detail h2 a { color: <?php echo get_theme_mod( 'goso_masonry_title_post_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_masonry_title_post_hover_color' ) ): ?>
            .goso-featured-infor .goso-entry-title a:hover, .goso-grid li .item h2 a:hover, .goso-masonry .item-masonry h2 a:hover, .grid-mixed .mixed-detail h2 a:hover { color: <?php echo get_theme_mod( 'goso_masonry_title_post_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_masonry_meta_color' ) ): ?>
            .grid-post-box-meta span, .overlay-post-box-meta, .overlay-post-box-meta .overlay-share span, .overlay-post-box-meta .overlay-share a{ color: <?php echo get_theme_mod( 'goso_masonry_meta_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_masonry_author_color' ) ): ?>
            .grid-post-box-meta span a, .grid-mixed .goso-post-box-meta .goso-box-meta a{ color: <?php echo get_theme_mod( 'goso_masonry_author_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_masonry_accent_color' ) ): ?>
            .overlay-post-box-meta .overlay-share a:hover, .overlay-author a:hover, .goso-grid .standard-content-special .format-post-box .dt-special a:hover, .grid-post-box-meta span a:hover, .grid-post-box-meta span a.comment-link:hover, .goso-grid .standard-content-special .author-quote span, .goso-grid .standard-content-special .format-post-box .post-format-icon i, .grid-mixed .goso-post-box-meta .goso-box-meta a:hover { color: <?php echo get_theme_mod( 'goso_masonry_accent_color' ); ?>; }
            .goso-grid .standard-content-special .author-quote span:before, .goso-grid .standard-content-special .author-quote span:after, .grid-header-box:after, .list-post .header-list-style:after { background-color: <?php echo get_theme_mod( 'goso_masonry_accent_color' ); ?>; }
            .goso-grid .post-box-meta span:after, .goso-masonry .post-box-meta span:after { border-color: <?php echo get_theme_mod( 'goso_masonry_accent_color' ); ?>; }
            .goso-readmore-btn.goso-btn-make-button a{ background-color: <?php echo get_theme_mod( 'goso_masonry_accent_color' ); ?>; color: #fff; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_masonry_readmore_color' ) ): ?>
            .goso-readmore-btn a, .goso-readmore-btn.goso-btn-make-button a{ color: <?php echo get_theme_mod( 'goso_masonry_readmore_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_masonry_readmore_bg' ) ): ?>
            .goso-readmore-btn.goso-btn-make-button a{ background-color: <?php echo get_theme_mod( 'goso_masonry_readmore_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_photography_overlay_color' ) ): ?>
            .goso-grid li.typography-style .overlay-typography { background-color: <?php echo get_theme_mod( 'goso_photography_overlay_color' ); ?>; }
		<?php endif; ?>
        .goso-grid li.typography-style .overlay-typography { opacity: <?php echo get_theme_mod( 'goso_photography_overlay_opacity' ); ?>; }
        .goso-grid li.typography-style:hover .overlay-typography { opacity: <?php echo get_theme_mod( 'goso_photography_overlay_hover_opacity' ); ?>; }
		<?php if ( get_theme_mod( 'goso_photography_categories_color' ) ): ?>
            .goso-grid .typography-style .main-typography a.goso-cat-name, .goso-grid .typography-style .main-typography a.goso-cat-name:hover { color: <?php echo get_theme_mod( 'goso_photography_categories_color' ); ?>; }
            .typography-style .main-typography a.goso-cat-name:after { border-color: <?php echo get_theme_mod( 'goso_photography_categories_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_photography_title_post_color' ) ): ?>
            .goso-grid li.typography-style .item .main-typography h2 a { color: <?php echo get_theme_mod( 'goso_photography_title_post_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_photography_title_post_hover_color' ) ): ?>
            .goso-grid li.typography-style .item .main-typography h2 a:hover { color: <?php echo get_theme_mod( 'goso_photography_title_post_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_photography_meta_color' ) ): ?>
            .goso-grid li.typography-style .grid-post-box-meta span, .goso-grid li.typography-style .grid-post-box-meta span a { color: <?php echo get_theme_mod( 'goso_photography_meta_color' ); ?>; }
            .goso-grid li.typography-style .grid-post-box-meta span:after { background-color: <?php echo get_theme_mod( 'goso_photography_meta_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_photography_accent_color' ) ): ?>
            .goso-grid li.typography-style .grid-post-box-meta span a:hover { color: <?php echo get_theme_mod( 'goso_photography_accent_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_overlay_title_post_color' ) ): ?>
            .overlay-header-box .overlay-title a { color: <?php echo get_theme_mod( 'goso_overlay_title_post_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_overlay_title_post_hover_color' ) ): ?>
            .overlay-header-box .overlay-title a:hover { color: <?php echo get_theme_mod( 'goso_overlay_title_post_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_overlay_cat_post_color' ) ): ?>
            .overlay-header-box .cat > a.goso-cat-name { color: <?php echo get_theme_mod( 'goso_overlay_cat_post_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_overlay_cat_hover_post_color' ) ): ?>
            .overlay-header-box .cat > a.goso-cat-name:hover { color: <?php echo get_theme_mod( 'goso_overlay_cat_hover_post_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_overlay_author_post_color' ) ): ?>
            .overlay-author span, .overlay-author a { color: <?php echo get_theme_mod( 'goso_overlay_author_post_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_layout_category_fsize' ) ): ?>
            .goso-featured-infor .cat > a.goso-cat-name, .goso-standard-cat .cat > a.goso-cat-name, .grid-header-box .cat > a.goso-cat-name, .header-list-style .cat > a.goso-cat-name, .overlay-header-box .cat > a.goso-cat-name, .inner-boxed-2 .cat > a.goso-cat-name, .main-typography .cat > a.goso-cat-name{ font-size: <?php echo get_theme_mod( 'goso_layout_category_fsize' ); ?>px; }
		<?php endif; ?>
		<?php echo goso_renders_css( '.header-standard h2 a, .overlay-header-box .overlay-title a, .goso-featured-infor .goso-entry-title', 'goso_layout_titlebig_fsize' ); ?>
		<?php echo goso_renders_css( '.goso-grid li .item h2 a, .goso-masonry .item-masonry h2 a', 'goso_layout_title_fsize' ); ?>
		<?php if ( get_theme_mod( 'goso_layout_meta_fsize' ) ): ?>
            .grid-post-box-meta, .overlay-header-box .overlay-author, .goso-post-box-meta .goso-box-meta, .header-standard .author-post{ font-size: <?php echo get_theme_mod( 'goso_layout_meta_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_layout_excerpt_fsize' ) ): ?>
            .item-content p, .standard-content .standard-post-entry, .standard-content .standard-post-entry p{ font-size: <?php echo get_theme_mod( 'goso_layout_excerpt_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_layout_readmore_fsize' ) ): ?>
            .standard-content .goso-more-link a.more-link, .standard-content .goso-more-link.goso-more-link-button a.more-link, .goso-readmore-btn a, .goso-readmore-btn.goso-btn-make-button a{ font-size: <?php echo get_theme_mod( 'goso_layout_readmore_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_layout_sharebox_fsize' ) ): ?>
            .grid-featured .goso-post-share-box a, .goso-post-box-meta .goso-post-share-box a{ font-size: <?php echo get_theme_mod( 'goso_layout_sharebox_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rgap_pitems' ) ): ?>
            .goso-grid > li, .grid-featured, .goso-grid li.typography-style, .grid-mixed, .goso-grid .list-post.list-boxed-post, .goso-masonry .item-masonry, article.standard-article, .goso-grid li.list-post, .grid-overlay, .goso-grid li.list-post.goso-slistp{ margin-bottom: <?php echo get_theme_mod( 'goso_rgap_pitems' ); ?>px; }
            .goso-grid li.list-post, .goso-grid li.list-post.goso-slistp{ padding-bottom: <?php echo get_theme_mod( 'goso_rgap_pitems' ); ?>px; }
            .goso-layout-mixed-3 .goso-grid li.goso-slistp, .goso-layout-mixed-4 .goso-grid li.goso-slistp{ padding-bottom: 0px; margin-bottom: 0px; padding-top: <?php echo get_theme_mod( 'goso_rgap_pitems' ); ?>px; }
            .goso-layout-mixed-3 .goso-grid li.goso-slistp ~ .goso-slistp, .goso-layout-mixed-4 .goso-grid li.goso-slistp ~ .goso-slistp{ margin-top: <?php echo get_theme_mod( 'goso_rgap_pitems' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rgap_pbitems' ) ): ?>
            .grid-featured, .grid-mixed, article.standard-article, .grid-overlay{ margin-bottom: <?php echo get_theme_mod( 'goso_rgap_pbitems' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rgap_listitems' ) ): ?>
            .goso-grid li.list-post{ margin-bottom: <?php echo get_theme_mod( 'goso_rgap_listitems' ); ?>px; padding-bottom: <?php echo get_theme_mod( 'goso_rgap_listitems' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rgap_psitems' ) ): ?>
            .goso-grid li.list-post.goso-slistp{ margin-bottom: <?php echo get_theme_mod( 'goso_rgap_psitems' ); ?>px; padding-bottom: <?php echo get_theme_mod( 'goso_rgap_psitems' ); ?>px; }
            .goso-layout-mixed-3 .goso-grid li.goso-slistp, .goso-layout-mixed-4 .goso-grid li.goso-slistp{ padding-bottom: 0; margin-bottom: 0; padding-top: <?php echo get_theme_mod( 'goso_rgap_psitems' ); ?>px; }
            .goso-layout-mixed-3 .goso-grid li.goso-slistp ~ .goso-slistp, .goso-layout-mixed-4 .goso-grid li.goso-slistp ~ .goso-slistp{ margin-top: <?php echo get_theme_mod( 'goso_rgap_psitems' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_img_listwidth' ) ):
			$list_img_width = get_theme_mod( 'goso_img_listwidth' );
			$list_right_width = 100 - $list_img_width;
			?>
            @media only screen and (min-width: 768px){
            .goso-grid li.list-post .item > .thumbnail, .home-featured-cat-content.style-6 .mag-post-box.first-post .magcat-thumb{ width: <?php echo $list_img_width; ?>%; }
            .goso-grid li.list-post .item .content-list-right, .home-featured-cat-content.style-6 .mag-post-box.first-post .magcat-detail{ width: <?php echo $list_right_width; ?>%; }
            }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_img_slistwidth' ) ): ?>
            @media only screen and (min-width: 768px){
            .goso-grid li.list-post.goso-slistp .item > .thumbnail{ width: <?php echo get_theme_mod( 'goso_img_slistwidth' ); ?>%; }
            }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_width' ) ):
			$sidebarwidth = get_theme_mod( 'goso_sidebar_width' );
			$sidebarcontent   = 100 - $sidebarwidth;
			?>
            @media only screen and (min-width: 961px){ .goso-sidebar-content{ width: <?php echo $sidebarwidth; ?>%; } .goso-single-style-10 .goso-single-s10-content, .container.goso_sidebar:not(.two-sidebar) #main{ width: <?php echo $sidebarcontent; ?>%;  } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_width_px' ) ):
			$sidebarwidth_px = get_theme_mod( 'goso_sidebar_width_px' );
			?>
            @media only screen and (min-width: 961px){ .goso-sidebar-content{ width: <?php echo $sidebarwidth_px; ?>px; } .goso-single-style-10 .goso-single-s10-content, .container.goso_sidebar:not(.two-sidebar) #main{ width: calc(100% - <?php echo $sidebarwidth_px; ?>px);  } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_2sidebar_width' ) ):
			$sidebarswidth = get_theme_mod( 'goso_2sidebar_width' );
			$sidebarscontent  = 100 - ( $sidebarswidth * 2 );
			?>
            @media only screen and (min-width: 1201px){ .layout-14_12_14 .goso-vc-sidebar, .container.two-sidebar .goso-sidebar-content{ width: <?php echo $sidebarswidth; ?>%; } .layout-14_12_14 .goso-main-content, .container.two-sidebar #main{ width: <?php echo $sidebarscontent; ?>%; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_2sidebar_width_px' ) ):
			$sidebarswidth2_px = get_theme_mod( 'goso_2sidebar_width_px' );
			?>
            @media only screen and (min-width: 1201px){ .layout-14_12_14 .goso-vc-sidebar, .container.two-sidebar .goso-sidebar-content{ width: <?php echo $sidebarswidth2_px; ?>px; } .layout-14_12_14 .goso-main-content, .container.two-sidebar #main{ width: calc(100% - <?php echo( $sidebarswidth2_px * 2 ); ?>px); } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_space' ) ): ?>
            @media only screen and (min-width: 961px){ .goso-single-style-10 .goso-single-s10-content, .container.goso_sidebar.right-sidebar #main{ padding-right: <?php echo get_theme_mod( 'goso_sidebar_space' ); ?>px; } .goso-single-style-10.goso_sidebar.left-sidebar .goso-single-s10-content, .container.goso_sidebar.left-sidebar #main,.goso-woo-page-container.goso_sidebar.left-sidebar .sidebar-both .goso-single-product-sidebar-wrap,.goso-woo-page-container.goso_sidebar.left-sidebar .sidebar-bottom .goso-single-product-bottom-container .bottom-content{ padding-left: <?php echo get_theme_mod( 'goso_sidebar_space' ); ?>px; } }
            @media only screen and (min-width: 1201px){ .layout-14_12_14 .goso-main-content, .container.two-sidebar #main{ padding-left: <?php echo get_theme_mod( 'goso_sidebar_space' ); ?>px; padding-right: <?php echo get_theme_mod( 'goso_sidebar_space' ); ?>px; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_widget_margin' ) ): ?>
            .goso-sidebar-content .widget, .goso-sidebar-content.pcsb-boxed-whole { margin-bottom: <?php echo get_theme_mod( 'goso_sidebar_widget_margin' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_padding' ) ): ?>
            .goso-sidebar-content.pcsb-boxed-whole, .goso-sidebar-content.pcsb-boxed-widget .widget{ padding: <?php echo get_theme_mod( 'goso_sidebar_padding' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_padding_mobile' ) ): ?>
            @media only screen and (max-width: 479px){ .goso-sidebar-content.pcsb-boxed-whole, .goso-sidebar-content.pcsb-boxed-widget .widget{ padding: <?php echo get_theme_mod( 'goso_sidebar_padding_mobile' ); ?>px; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_bxsb_bg' ) ): ?>
            .goso-sidebar-content.pcsb-boxed-whole, .goso-sidebar-content.pcsb-boxed-widget .widget{ background-color: <?php echo get_theme_mod( 'goso_bxsb_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_bxsb_border' ) ): ?>
            .goso-sidebar-content.pcsb-boxed-whole, .goso-sidebar-content.pcsb-boxed-widget .widget{ border-color: <?php echo get_theme_mod( 'goso_bxsb_border' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sbbx_bdstyle' ) ): ?>
            .goso-sidebar-content.pcsb-boxed-whole, .goso-sidebar-content.pcsb-boxed-widget .widget{ border-style: <?php echo get_theme_mod( 'goso_sbbx_bdstyle' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_boxed_bdw' ) ): ?>
            .goso-sidebar-content.pcsb-boxed-whole, .goso-sidebar-content.pcsb-boxed-widget .widget{ border-width: <?php echo get_theme_mod( 'goso_sidebar_boxed_bdw' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_disable_phtml' ) ): ?>
            .goso-sidebar-content.pcsb-boxed-widget .widget.widget_custom_html{ padding: 0; border: none; background: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_heading_lowcase' ) ): ?>
            .goso-sidebar-content .goso-border-arrow .inner-arrow { text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_rm_bdbottom' ) ): ?>
            .widget ul li, .widget ul.side-newsfeed li, .woocommerce ul.product_list_widget li{ padding-bottom: 0; border-bottom: none; }
            .widget ul li{ margin-bottom: 15px; }
            .woocommerce ul.product_list_widget li{ margin-bottom: 20px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_heading_size' ) ): ?>
            .goso-sidebar-content .goso-border-arrow .inner-arrow { font-size: <?php echo get_theme_mod( 'goso_sidebar_heading_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_heading_image_8' ) ): ?>
            .goso-sidebar-content.style-8 .goso-border-arrow .inner-arrow { background-image: url(<?php echo get_theme_mod( 'goso_sidebar_heading_image_8' ); ?>); }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_heading8_repeat' ) ): ?>
            .goso-sidebar-content.style-8 .goso-border-arrow .inner-arrow { background-repeat: <?php echo get_theme_mod( 'goso_sidebar_heading8_repeat' ); ?>; background-size: auto; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_heading_bg' ) ): ?>
            .goso-sidebar-content.style-11 .goso-border-arrow .inner-arrow,
            .goso-sidebar-content.style-12 .goso-border-arrow .inner-arrow,
            .goso-sidebar-content.style-14 .goso-border-arrow .inner-arrow:before,
            .goso-sidebar-content.style-13 .goso-border-arrow .inner-arrow,
            .goso-sidebar-content .goso-border-arrow .inner-arrow, .goso-sidebar-content.style-15 .goso-border-arrow .inner-arrow{ background-color: <?php echo get_theme_mod( 'goso_sidebar_heading_bg' ); ?>; }
            .goso-sidebar-content.style-2 .goso-border-arrow:after{ border-top-color: <?php echo get_theme_mod( 'goso_sidebar_heading_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_heading_outer_bg' ) ): ?>
            .goso-sidebar-content .goso-border-arrow:after { background-color: <?php echo get_theme_mod( 'goso_sidebar_heading_outer_bg' ); ?>; }
		<?php endif; ?>

		<?php if ( get_theme_mod( 'goso_sidebar_heading_border_color' ) ): ?>
            .goso-sidebar-content .goso-border-arrow .inner-arrow, .goso-sidebar-content.style-4 .goso-border-arrow .inner-arrow:before, .goso-sidebar-content.style-4 .goso-border-arrow .inner-arrow:after, .goso-sidebar-content.style-5 .goso-border-arrow, .goso-sidebar-content.style-7
            .goso-border-arrow, .goso-sidebar-content.style-9 .goso-border-arrow{ border-color: <?php echo get_theme_mod( 'goso_sidebar_heading_border_color' ); ?>; }
            .goso-sidebar-content .goso-border-arrow:before { border-top-color: <?php echo get_theme_mod( 'goso_sidebar_heading_border_color' ); ?>; }
            .goso-sidebar-content.style-16 .goso-border-arrow:after{ background-color: <?php echo get_theme_mod( 'goso_sidebar_heading_border_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_heading_border_color5' ) ): ?>
            .goso-sidebar-content.style-5 .goso-border-arrow { border-color: <?php echo get_theme_mod( 'goso_sidebar_heading_border_color5' ); ?>; }
            .goso-sidebar-content.style-12 .goso-border-arrow,.goso-sidebar-content.style-10 .goso-border-arrow,
            .goso-sidebar-content.style-5 .goso-border-arrow .inner-arrow{ border-bottom-color: <?php echo get_theme_mod( 'goso_sidebar_heading_border_color5' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'sidebar_heading_bordertop_color10' ) ): ?>
            .goso-sidebar-content.style-10 .goso-border-arrow{ border-top-color: <?php echo get_theme_mod( 'sidebar_heading_bordertop_color10' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_heading_shapes_color' ) ): ?>
            .goso-sidebar-content.style-11 .goso-border-arrow .inner-arrow:after,
            .goso-sidebar-content.style-11 .goso-border-arrow .inner-arrow:before{ border-top-color: <?php echo get_theme_mod( 'goso_sidebar_heading_shapes_color' ); ?>; }
            .goso-sidebar-content.style-12 .goso-border-arrow .inner-arrow:before,
            .goso-sidebar-content.style-12.pcalign-center .goso-border-arrow .inner-arrow:after,
            .goso-sidebar-content.style-12.pcalign-right .goso-border-arrow .inner-arrow:after{ border-bottom-color: <?php echo get_theme_mod( 'goso_sidebar_heading_shapes_color' ); ?>; }
            .goso-sidebar-content.style-13.pcalign-center .goso-border-arrow .inner-arrow:after,
            .goso-sidebar-content.style-13.pcalign-left .goso-border-arrow .inner-arrow:after{ border-right-color: <?php echo get_theme_mod( 'goso_sidebar_heading_shapes_color' ); ?>; }
            .goso-sidebar-content.style-13.pcalign-center .goso-border-arrow .inner-arrow:before,
            .goso-sidebar-content.style-13.pcalign-right .goso-border-arrow .inner-arrow:before { border-left-color: <?php echo get_theme_mod( 'goso_sidebar_heading_shapes_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_bgstyle15' ) ): ?>
            .goso-sidebar-content.style-15 .goso-border-arrow:before{ background-color: <?php echo get_theme_mod( 'goso_sidebar_bgstyle15' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_iconstyle15' ) ): ?>
            .goso-sidebar-content.style-15 .goso-border-arrow:after{ color: <?php echo get_theme_mod( 'goso_sidebar_iconstyle15' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_cllines' ) ): ?>
            .goso-sidebar-content.style-18 .goso-border-arrow:after{ color: <?php echo get_theme_mod( 'goso_sidebar_cllines' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_heading_border_color7' ) ): ?>
            .goso-sidebar-content.style-7 .goso-border-arrow .inner-arrow:before, .goso-sidebar-content.style-9 .goso-border-arrow .inner-arrow:before { background-color: <?php echo get_theme_mod( 'goso_sidebar_heading_border_color7' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_heading_border_inner_color' ) ): ?>
            .goso-sidebar-content .goso-border-arrow:after { border-color: <?php echo get_theme_mod( 'goso_sidebar_heading_border_inner_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_heading_color' ) ): ?>
            .goso-sidebar-content .goso-border-arrow .inner-arrow { color: <?php echo get_theme_mod( 'goso_sidebar_heading_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_remove_border_outer' ) ): ?>
            .goso-sidebar-content .goso-border-arrow:after { content: none; display: none; }
            .goso-sidebar-content .widget-title{ margin-left: 0; margin-right: 0; margin-top: 0; }
            .goso-sidebar-content .goso-border-arrow:before{ bottom: -6px; border-width: 6px; margin-left: -6px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_remove_arrow_down' ) ): ?>
            .goso-sidebar-content .goso-border-arrow:before, .goso-sidebar-content.style-2 .goso-border-arrow:after { content: none; display: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_accent_color' ) ): ?>
            .widget ul.side-newsfeed li .side-item .side-item-text h4 a, .widget a, #wp-calendar tbody td a, .widget.widget_categories ul li, .widget.widget_archive ul li, .widget-social a i, .widget-social a span, .widget-social.show-text a span,.goso-video_playlist .goso-video-playlist-item .goso-video-title, .widget ul.side-newsfeed li .side-item .side-item-text .side-item-meta a{ color: <?php echo get_theme_mod( 'goso_sidebar_accent_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_sidebar_accent_hover_color' ) ): ?>
            .goso-video_playlist .goso-video-playlist-item .goso-video-title:hover,.widget ul.side-newsfeed li .side-item .side-item-text h4 a:hover, .widget a:hover, .goso-sidebar-content .widget-social a:hover span, .widget-social a:hover span, .goso-tweets-widget-content .icon-tweets, .goso-tweets-widget-content .tweet-intents a, .goso-tweets-widget-content
            .tweet-intents span:after, .widget-social.remove-circle a:hover i , #wp-calendar tbody td a:hover, .goso-video_playlist .goso-video-playlist-item .goso-video-title:hover, .widget ul.side-newsfeed li .side-item .side-item-text .side-item-meta a:hover{ color: <?php echo get_theme_mod( 'goso_sidebar_accent_hover_color' ); ?>; }
            .widget .tagcloud a:hover, .widget-social a:hover i, .widget input[type="submit"]:hover,.goso-user-logged-in .goso-user-action-links a:hover,.goso-button:hover, .widget button[type="submit"]:hover { color: #fff; background-color: <?php echo get_theme_mod( 'goso_sidebar_accent_hover_color' ); ?>; border-color: <?php echo get_theme_mod( 'goso_sidebar_accent_hover_color' ); ?>; }
            .about-widget .about-me-heading:before { border-color: <?php echo get_theme_mod( 'goso_sidebar_accent_hover_color' ); ?>; }
            .goso-tweets-widget-content .tweet-intents-inner:before, .goso-tweets-widget-content .tweet-intents-inner:after, .gososc-column-1.goso-video_playlist .goso-video-nav .playlist-panel-item, .goso-video_playlist .goso-custom-scroll::-webkit-scrollbar-thumb, .goso-video_playlist .goso-playlist-title { background-color: <?php echo get_theme_mod( 'goso_sidebar_accent_hover_color' ); ?>; }
            .goso-owl-carousel.goso-tweets-slider .owl-dots .owl-dot.active span, .goso-owl-carousel.goso-tweets-slider .owl-dots .owl-dot:hover span { border-color: <?php echo get_theme_mod( 'goso_sidebar_accent_hover_color' ); ?>; background-color: <?php echo get_theme_mod( 'goso_sidebar_accent_hover_color' ); ?>; }
		<?php endif; ?>
		<?php
		$footer_widget_padding = get_theme_mod( 'goso_footer_widget_padding' );
		if ( is_page() ) {
			$pmeta_page_footer = get_post_meta( get_the_ID(), 'goso_pmeta_page_footer', true );
			if ( isset( $pmeta_page_footer['goso_fw_padding_top_bottom'] ) && $pmeta_page_footer['goso_fw_padding_top_bottom'] ) {
				$footer_widget_padding = $pmeta_page_footer['goso_fw_padding_top_bottom'];
			}
		}

		if ( $footer_widget_padding ) {
			echo '#widget-area { padding: ' . $footer_widget_padding . 'px 0; }';
		}
		?>
		<?php if ( get_theme_mod( 'goso_footer_widget_titlefsize' ) ): ?>
            .footer-widget-wrapper .widget .widget-title .inner-arrow{ font-size: <?php echo get_theme_mod( 'goso_footer_widget_titlefsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_social_size' ) ): ?>
            ul.footer-socials li a i{ font-size: <?php echo get_theme_mod( 'goso_footer_social_size' ); ?>px; }
            ul.footer-socials li a svg{ width: <?php echo get_theme_mod( 'goso_footer_social_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_social_lowercase' ) ): ?>
            ul.footer-socials li a span { text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_social_text_size' ) ): ?>
            ul.footer-socials li a span { font-size: <?php echo get_theme_mod( 'goso_footer_social_text_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_mwlogo' ) ): ?>
            #footer-logo a{ max-width: <?php echo get_theme_mod( 'goso_footer_mwlogo' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_mwlogo_mobile' ) ): ?>
            @media only screen and (max-width: 479px){ #footer-logo a{ max-width: <?php echo get_theme_mod( 'goso_footer_mwlogo_mobile' ); ?>px; } #footer-logo img{ max-width: 100%; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_menu_size' ) ): ?>
            #footer-section .footer-menu li a { font-size: <?php echo get_theme_mod( 'goso_footer_menu_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_copyright_size' ) ): ?>
            #footer-copyright * { font-size: <?php echo get_theme_mod( 'goso_footer_copyright_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_copyright_remove_italic' ) ): ?>
            #footer-copyright * { font-style: normal; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_signup_showemail' ) ): ?>
            .footer-subscribe .mc4wp-form .mname{ display: block; }
            .footer-subscribe .mc4wp-form .memail, .footer-subscribe .mc4wp-form .msubmit{ float: none; display: block; width: 100%; margin-right: 0; margin-left: 0; }
            .footer-subscribe .mc4wp-form .msubmit input, .footer-subscribe .widget .mc4wp-form input[type="email"], .footer-subscribe .widget .mc4wp-form input[type="text"]{ width: 100%; max-width: 100%; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_signup_ptop' ) ): ?>
            @media only screen and (min-width: 480px){ .footer-subscribe { padding-top: <?php echo get_theme_mod( 'goso_footer_signup_ptop' ); ?>px; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_signup_pbottom' ) ): ?>
            @media only screen and (min-width: 480px){ .footer-subscribe { padding-bottom: <?php echo get_theme_mod( 'goso_footer_signup_pbottom' ); ?>px; } }
		<?php endif; ?>
		<?php echo goso_renders_css( '.footer-subscribe h4.footer-subscribe-title', 'goso_footer_signup_fstitle' ); ?>
		<?php echo goso_renders_css( '.footer-subscribe .mc4wp-form .mdes', 'goso_footer_signup_fsdesc' ); ?>
		<?php if ( get_theme_mod( 'goso_footer_signup_fsinputs' ) ): ?>
            .footer-subscribe .widget .mc4wp-form input[type="email"], .footer-subscribe .widget .mc4wp-form input[type="text"] { font-size: <?php echo get_theme_mod( 'goso_footer_signup_fsinputs' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_signup_fsisubmit' ) ): ?>
            .footer-subscribe .widget .mc4wp-form input[type="submit"]{ font-size: <?php echo get_theme_mod( 'goso_footer_signup_fsisubmit' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_signup_area_bg' ) ): ?>
            .footer-subscribe { background-color: <?php echo get_theme_mod( 'goso_footer_signup_area_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_signup_heading_color' ) ): ?>
            .footer-subscribe h4.footer-subscribe-title { color: <?php echo get_theme_mod( 'goso_footer_signup_heading_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_signup_des_color' ) ): ?>
            .footer-subscribe .mc4wp-form .mdes { color: <?php echo get_theme_mod( 'goso_footer_signup_des_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_signup_email_border' ) ): ?>
            .footer-subscribe .widget .mc4wp-form input[type="email"], .footer-subscribe .widget .mc4wp-form input[type="text"] { border-color: <?php echo get_theme_mod( 'goso_footer_signup_email_border' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'footer_signup_email_border_hover' ) ): ?>
            .footer-subscribe .widget .mc4wp-form input[type="email"]:focus, .footer-subscribe .widget .mc4wp-form input[type="email"]:hover, .footer-subscribe .widget .mc4wp-form input[type="text"]:focus, .footer-subscribe .widget .mc4wp-form input[type="text"]:hover { border-color: <?php echo get_theme_mod( 'footer_signup_email_border_hover' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_signup_email_text_color' ) ): ?>
            .footer-subscribe .widget .mc4wp-form input[type="email"], .footer-subscribe .widget .mc4wp-form input[type="text"] { color: <?php echo get_theme_mod( 'goso_footer_signup_email_text_color' ); ?>; }
            .footer-subscribe input[type="email"]::-webkit-input-placeholder { color: <?php echo get_theme_mod( 'goso_footer_signup_email_text_color' ); ?>; }
            .footer-subscribe input[type="email"]:-moz-placeholder { color: <?php echo get_theme_mod( 'goso_footer_signup_email_text_color' ); ?>; }
            .footer-subscribe input[type="email"]::-moz-placeholder { color: <?php echo get_theme_mod( 'goso_footer_signup_email_text_color' ); ?>; }
            .footer-subscribe input[type="email"]:-ms-input-placeholder {color: <?php echo get_theme_mod( 'goso_footer_signup_email_text_color' ); ?>;}
            .footer-subscribe input[type="email"]::-ms-input-placeholder {color: <?php echo get_theme_mod( 'goso_footer_signup_email_text_color' ); ?>;}
            .footer-subscribe input[type="text"]::-webkit-input-placeholder { color: <?php echo get_theme_mod( 'goso_footer_signup_email_text_color' ); ?>; }
            .footer-subscribe input[type="text"]:-moz-placeholder { color: <?php echo get_theme_mod( 'goso_footer_signup_email_text_color' ); ?>; }
            .footer-subscribe input[type="text"]::-moz-placeholder { color: <?php echo get_theme_mod( 'goso_footer_signup_email_text_color' ); ?>; }
            .footer-subscribe input[type="text"]:-ms-input-placeholder {color: <?php echo get_theme_mod( 'goso_footer_signup_email_text_color' ); ?>;}
            .footer-subscribe input[type="text"]::-ms-input-placeholder {color: <?php echo get_theme_mod( 'goso_footer_signup_email_text_color' ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_signup_button_bg' ) ): ?>
            .footer-subscribe .widget .mc4wp-form input[type="submit"] { background-color: <?php echo get_theme_mod( 'goso_footer_signup_button_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_signup_button_bg_hover' ) ): ?>
            .footer-subscribe .widget .mc4wp-form input[type="submit"]:hover { background-color: <?php echo get_theme_mod( 'goso_footer_signup_button_bg_hover' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_signup_button_text' ) ): ?>
            .footer-subscribe .widget .mc4wp-form input[type="submit"] { color: <?php echo get_theme_mod( 'goso_footer_signup_button_text' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_signup_button_text_hover' ) ): ?>
            .footer-subscribe .widget .mc4wp-form input[type="submit"]:hover { color: <?php echo get_theme_mod( 'goso_footer_signup_button_text_hover' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_widget_area_bg' ) ): ?>
            #widget-area { background-color: <?php echo get_theme_mod( 'goso_footer_widget_area_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_widget_area_border' ) ): ?>
            #widget-area { border-color: <?php echo get_theme_mod( 'goso_footer_widget_area_border' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_widget_area_text_color' ) ): ?>
            .footer-widget-wrapper, .footer-widget-wrapper .widget.widget_categories ul li, .footer-widget-wrapper .widget.widget_archive ul li,  .footer-widget-wrapper .widget input[type="text"], .footer-widget-wrapper .widget input[type="email"], .footer-widget-wrapper .widget input[type="date"], .footer-widget-wrapper .widget input[type="number"], .footer-widget-wrapper .widget input[type="search"] { color: <?php echo get_theme_mod( 'goso_footer_widget_area_text_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_widget_area_list_border' ) ): ?>
            .footer-widget-wrapper .widget ul li, .footer-widget-wrapper .widget ul ul, .footer-widget-wrapper .widget input[type="text"], .footer-widget-wrapper .widget input[type="email"], .footer-widget-wrapper .widget input[type="date"], .footer-widget-wrapper .widget input[type="number"],
            .footer-widget-wrapper .widget input[type="search"] { border-color: <?php echo get_theme_mod( 'goso_footer_widget_area_list_border' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_widget_title_center' ) ): ?>
            .footer-widget-wrapper .widget .widget-title { text-align: center; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_widget_color' ) ): ?>
            .footer-widget-wrapper .widget .widget-title { color: <?php echo get_theme_mod( 'goso_footer_widget_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_widget_title_border_color' ) ): ?>
            .footer-widget-wrapper .widget .widget-title .inner-arrow { border-color: <?php echo get_theme_mod( 'goso_footer_widget_title_border_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_widget_title_border_width' ) ): ?>
            .footer-widget-wrapper .widget .widget-title .inner-arrow { border-bottom-width: <?php echo get_theme_mod( 'goso_footer_widget_title_border_width' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_widget_accent_color' ) ): ?>
            .footer-widget-wrapper a, .footer-widget-wrapper .widget ul.side-newsfeed li .side-item .side-item-text h4 a, .footer-widget-wrapper .widget a, .footer-widget-wrapper .widget-social a i, .footer-widget-wrapper .widget-social a span, .footer-widget-wrapper .widget ul.side-newsfeed li .side-item .side-item-text .side-item-meta a{ color: <?php echo get_theme_mod( 'goso_footer_widget_accent_color' ); ?>; }
            .footer-widget-wrapper .widget-social a:hover i{ color: #fff; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_widget_accent_hover_color' ) ): ?>
            .footer-widget-wrapper .goso-tweets-widget-content .icon-tweets, .footer-widget-wrapper .goso-tweets-widget-content .tweet-intents a, .footer-widget-wrapper .goso-tweets-widget-content .tweet-intents span:after, .footer-widget-wrapper .widget ul.side-newsfeed li .side-item
            .side-item-text h4 a:hover, .footer-widget-wrapper .widget a:hover, .footer-widget-wrapper .widget-social a:hover span, .footer-widget-wrapper a:hover, .footer-widget-wrapper .widget-social.remove-circle a:hover i, .footer-widget-wrapper .widget ul.side-newsfeed li .side-item .side-item-text .side-item-meta a:hover{ color: <?php echo get_theme_mod( 'goso_footer_widget_accent_hover_color' ); ?>; }
            .footer-widget-wrapper .widget .tagcloud a:hover, .footer-widget-wrapper .widget-social a:hover i, .footer-widget-wrapper .mc4wp-form input[type="submit"]:hover, .footer-widget-wrapper .widget input[type="submit"]:hover,.footer-widget-wrapper .goso-user-logged-in .goso-user-action-links a:hover, .footer-widget-wrapper .widget button[type="submit"]:hover { color: #fff; background-color: <?php echo get_theme_mod( 'goso_footer_widget_accent_hover_color' ); ?>; border-color: <?php echo get_theme_mod( 'goso_footer_widget_accent_hover_color' ); ?>; }
            .footer-widget-wrapper .about-widget .about-me-heading:before { border-color: <?php echo get_theme_mod( 'goso_footer_widget_accent_hover_color' ); ?>; }
            .footer-widget-wrapper .goso-tweets-widget-content .tweet-intents-inner:before, .footer-widget-wrapper .goso-tweets-widget-content .tweet-intents-inner:after { background-color: <?php echo get_theme_mod( 'goso_footer_widget_accent_hover_color' ); ?>; }
            .footer-widget-wrapper .goso-owl-carousel.goso-tweets-slider .owl-dots .owl-dot.active span, .footer-widget-wrapper .goso-owl-carousel.goso-tweets-slider .owl-dots .owl-dot:hover span {  border-color: <?php echo get_theme_mod( 'goso_footer_widget_accent_hover_color' ); ?>;  background: <?php echo get_theme_mod( 'goso_footer_widget_accent_hover_color' ); ?>;  }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_icon_color' ) ): ?>
            ul.footer-socials li a i { color: <?php echo get_theme_mod( 'goso_footer_icon_color' ); ?>; border-color: <?php echo get_theme_mod( 'goso_footer_icon_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_icon_hover_color' ) ): ?>
            ul.footer-socials li a:hover i { background-color: <?php echo get_theme_mod( 'goso_footer_icon_hover_color' ); ?>; border-color: <?php echo get_theme_mod( 'goso_footer_icon_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_icon_hover_icon_color' ) ): ?>
            ul.footer-socials li a:hover i { color: <?php echo get_theme_mod( 'goso_footer_icon_hover_icon_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_social_text_color' ) ): ?>
            ul.footer-socials li a span { color: <?php echo get_theme_mod( 'goso_footer_social_text_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_social_hover_text_color' ) ): ?>
            ul.footer-socials li a:hover span { color: <?php echo get_theme_mod( 'goso_footer_social_hover_text_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_social_border_color' ) ): ?>
            .footer-socials-section, .goso-footer-social-moved{ border-color: <?php echo get_theme_mod( 'goso_footer_social_border_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'footer_instagram_border_color' ) ): ?>
            .footer-instagram h4.footer-instagram-title{ border-color: <?php echo get_theme_mod( 'footer_instagram_border_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_instagram_title_color' ) ): ?>
            .footer-instagram h4.footer-instagram-title{ color: <?php echo get_theme_mod( 'goso_footer_instagram_title_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_copyright_bg_color' ) ): ?>
            #footer-section, .goso-footer-social-moved{ background-color: <?php echo get_theme_mod( 'goso_footer_copyright_bg_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_social_bgcolor' ) ): ?>
            .goso-footer-social-moved{ background-color: <?php echo get_theme_mod( 'goso_footer_social_bgcolor' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_menu_color' ) ): ?>
            #footer-section .footer-menu li a { color: <?php echo get_theme_mod( 'goso_footer_menu_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_menu_color_hover' ) ): ?>
            #footer-section .footer-menu li a:hover { color: <?php echo get_theme_mod( 'goso_footer_menu_color_hover' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_copyright_text_color' ) ): ?>
            #footer-section, #footer-copyright * { color: <?php echo get_theme_mod( 'goso_footer_copyright_text_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_go_top_color' ) ): ?>
            #footer-section .go-to-top i, #footer-section .go-to-top-parent span { color: <?php echo get_theme_mod( 'goso_footer_go_top_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_go_top_hover_color' ) ): ?>
            #footer-section .go-to-top:hover span, #footer-section .go-to-top:hover i { color: <?php echo get_theme_mod( 'goso_footer_go_top_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_go_top_float_color' ) ): ?>
            .goso-go-to-top-floating { background-color: <?php echo get_theme_mod( 'goso_footer_go_top_float_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_go_top_float_icon_color' ) ): ?>
            .goso-go-to-top-floating { color: <?php echo get_theme_mod( 'goso_footer_go_top_float_icon_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_copyright_accent_color' ) ): ?>
            #footer-section a { color: <?php echo get_theme_mod( 'goso_footer_copyright_accent_color' ); ?>; }
		<?php endif; ?>
		<?php echo goso_renders_css( '.footer-instagram h4.footer-instagram-title > span::before,.footer-instagram.goso-insta-title-overlay h4.footer-instagram-title > span::before,.footer-instagram h4.footer-instagram-title span, .footer-instagram.goso-insta-title-overlay h4.footer-instagram-title > span, .footer-instagram.goso-insta-title-overlay h4.footer-instagram-title > span > span', 'goso_footer_insta_title' ); ?>
		<?php if ( get_theme_mod( 'goso_single_accent_color' ) ): ?>
            .comment-content a, .container-single .post-entry a, .container-single .format-post-box .dt-special a:hover, .container-single .author-quote span, .container-single .author-post span a:hover, .post-entry blockquote:before, .post-entry blockquote cite, .post-entry blockquote .author, .wpb_text_column blockquote:before, .wpb_text_column blockquote cite, .wpb_text_column blockquote .author, .post-pagination a:hover, .author-content h5 a:hover, .author-content .author-social:hover, .item-related h3 a:hover, .container-single .format-post-box .post-format-icon i, .container.goso-breadcrumb.single-breadcrumb span a:hover, .goso_list_shortcode li:before, .goso-dropcap-box-outline, .goso-dropcap-circle-outline, .goso-dropcap-regular, .goso-dropcap-bold, .header-standard .post-box-meta-single .author-post span a:hover{ color: <?php echo get_theme_mod( 'goso_single_accent_color' ); ?>; }
            .container-single .standard-content-special .format-post-box, ul.slick-dots li button:hover, ul.slick-dots li.slick-active button, .goso-dropcap-box-outline, .goso-dropcap-circle-outline { border-color: <?php echo get_theme_mod( 'goso_single_accent_color' ); ?>; }
            ul.slick-dots li button:hover, ul.slick-dots li.slick-active button, #respond h3.comment-reply-title span:before, #respond h3.comment-reply-title span:after, .post-box-title:before, .post-box-title:after, .container-single .author-quote span:before, .container-single .author-quote
            span:after, .post-entry blockquote .author span:after, .post-entry blockquote .author span:before, .post-entry ul li:before, #respond #submit:hover,
            div.wpforms-container .wpforms-form.wpforms-form input[type=submit]:hover, div.wpforms-container .wpforms-form.wpforms-form button[type=submit]:hover, div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button:hover,
            .wpcf7 input[type="submit"]:hover, .widget_wysija input[type="submit"]:hover, .post-entry.blockquote-style-2 blockquote:before,.tags-share-box.tags-share-box-s2 .post-share-plike, .goso-dropcap-box, .goso-dropcap-circle, .goso-ldspinner > div{  background-color: <?php echo get_theme_mod( 'goso_single_accent_color' ); ?>; }
            .container-single .post-entry .post-tags a:hover { color: #fff; border-color: <?php echo get_theme_mod( 'goso_single_accent_color' ); ?>; background-color: <?php echo get_theme_mod( 'goso_single_accent_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_buttons_bg' ) ): ?>
            .goso-user-logged-in .goso-user-action-links a, .goso-login-register input[type="submit"], .widget input[type="submit"], .widget button[type="submit"], .contact-form input[type=submit], #respond #submit, .wpcf7 input[type="submit"], .widget_wysija input[type="submit"], div.wpforms-container .wpforms-form.wpforms-form input[type=submit], div.wpforms-container .wpforms-form.wpforms-form button[type=submit], div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button, .mc4wp-form input[type=submit]{ background-color: <?php echo get_theme_mod( 'goso_buttons_bg' ); ?>; }
            .pcdark-mode .goso-user-logged-in .goso-user-action-links a, .pcdark-mode .goso-login-register input[type="submit"], .pcdark-mode .widget input[type="submit"], .pcdark-mode .widget button[type="submit"], .pcdark-mode .contact-form input[type=submit], .pcdark-mode #respond #submit, .pcdark-mode .wpcf7 input[type="submit"], .pcdark-mode .widget_wysija input[type="submit"], .pcdark-mode div.wpforms-container .wpforms-form.wpforms-form input[type=submit], .pcdark-mode div.wpforms-container .wpforms-form.wpforms-form button[type=submit], .pcdark-mode div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button, .pcdark-mode .mc4wp-form input[type=submit]{ background-color: <?php echo get_theme_mod( 'goso_buttons_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_buttons_color' ) ): ?>
            .goso-user-logged-in .goso-user-action-links a, .goso-login-register input[type="submit"], .widget input[type="submit"], .widget button[type="submit"], .contact-form input[type=submit], #respond #submit, .wpcf7 input[type="submit"], .widget_wysija input[type="submit"], div.wpforms-container .wpforms-form.wpforms-form input[type=submit], div.wpforms-container .wpforms-form.wpforms-form button[type=submit], div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button, .mc4wp-form input[type=submit]{ color: <?php echo get_theme_mod( 'goso_buttons_color' ); ?>; }
            .pcdark-mode .goso-user-logged-in .goso-user-action-links a, .pcdark-mode .goso-login-register input[type="submit"], .pcdark-mode .widget input[type="submit"], .pcdark-mode .widget button[type="submit"], .pcdark-mode .contact-form input[type=submit], .pcdark-mode #respond #submit, .pcdark-mode .wpcf7 input[type="submit"], .pcdark-mode .widget_wysija input[type="submit"], .pcdark-mode div.wpforms-container .wpforms-form.wpforms-form input[type=submit], .pcdark-mode div.wpforms-container .wpforms-form.wpforms-form button[type=submit], .pcdark-mode div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button, .pcdark-mode .mc4wp-form input[type=submit]{ color: <?php echo get_theme_mod( 'goso_buttons_color' ); ?>; }
            .wp-block-search .wp-block-search__button svg{ fill: <?php echo get_theme_mod( 'goso_buttons_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_buttons_bghover' ) ): ?>
            .goso-user-logged-in .goso-user-action-links a:hover, .goso-login-register input[type="submit"]:hover, .footer-widget-wrapper .widget button[type="submit"]:hover,.footer-widget-wrapper .mc4wp-form input[type="submit"]:hover, .footer-widget-wrapper .widget input[type="submit"]:hover,.widget input[type="submit"]:hover, .widget button[type="submit"]:hover, .contact-form input[type=submit]:hover, #respond #submit:hover, .wpcf7 input[type="submit"]:hover, .widget_wysija input[type="submit"]:hover, div.wpforms-container .wpforms-form.wpforms-form input[type=submit]:hover, div.wpforms-container .wpforms-form.wpforms-form button[type=submit]:hover, div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button:hover, .mc4wp-form input[type=submit]:hover{ background-color: <?php echo get_theme_mod( 'goso_buttons_bghover' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_buttons_colorhver' ) ): ?>
            .goso-user-logged-in .goso-user-action-links a:hover, .goso-login-register input[type="submit"]:hover, .footer-widget-wrapper .widget button[type="submit"]:hover,.footer-widget-wrapper .mc4wp-form input[type="submit"]:hover, .footer-widget-wrapper .widget input[type="submit"]:hover,.widget input[type="submit"]:hover, .widget button[type="submit"]:hover, .contact-form input[type=submit]:hover, #respond #submit:hover, .wpcf7 input[type="submit"]:hover, .widget_wysija input[type="submit"]:hover, div.wpforms-container .wpforms-form.wpforms-form input[type=submit]:hover, div.wpforms-container .wpforms-form.wpforms-form button[type=submit]:hover, div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button:hover, .mc4wp-form input[type=submit]:hover{ color: <?php echo get_theme_mod( 'goso_buttons_colorhver' ); ?>; }
            .wp-block-search .wp-block-search__button:hover svg{ fill: <?php echo get_theme_mod( 'goso_buttons_colorhver' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_loadnp_ldscolor' ) ): ?>
            .goso-ldspinner > div{ background-color: <?php echo get_theme_mod( 'goso_loadnp_ldscolor' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_cat_color' ) ): ?>
            .container-single .goso-standard-cat .cat > a.goso-cat-name { color: <?php echo get_theme_mod( 'goso_single_cat_color' ); ?>; }
            .container-single .goso-standard-cat .cat:before, .container-single .goso-standard-cat .cat:after { background-color: <?php echo get_theme_mod( 'goso_single_cat_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_off_uppercase_post_title' ) ): ?>
            .container-single .single-post-title { text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_title_font_size' ) ): ?>
            @media only screen and (min-width: 769px){  .container-single .single-post-title { font-size: <?php echo get_theme_mod( 'goso_single_title_font_size' ); ?>px; }  }
		<?php endif; ?>

		<?php if ( get_theme_mod( 'goso_dis_jarallax_single_mb' ) ): ?>
            @media only screen and (max-width: 768px){ .single .goso-jarallax {padding-top: 0 !important;} .single .goso-jarallax .jarallax-container-fix, .single .goso-jarallax > div{ position: relative !important; } .single .goso-jarallax .jarallax-img{ position: relative !important; width: 100% !important; height: auto !important; margin-top: 0 !important; transform: none !important; } }
		<?php endif; ?>

		<?php
		if ( 'style-3' == $single_style && get_theme_mod( 'psingle_title_size_s3' ) ) {
			echo '@media only screen and (min-width: 768px){  .container-single.goso-single-style-3 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s3' ) . 'px; }  }';
		} elseif ( 'style-4' == $single_style && get_theme_mod( 'psingle_title_size_s4' ) ) {
			echo '@media only screen and (min-width: 768px){  .container-single.goso-single-style-4 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s4' ) . 'px; }  }';
		}
		if ( 'style-5' == $single_style && get_theme_mod( 'psingle_title_size_s5' ) ) {
			echo '@media only screen and (min-width: 768px){  .container-single.goso-single-style-5 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s5' ) . 'px; }  }';
		}
		if ( 'style-6' == $single_style && get_theme_mod( 'psingle_title_size_s6' ) ) {
			echo '@media only screen and (min-width: 768px){  .container-single.goso-single-style-6 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s6' ) . 'px; }  }';
		}
		if ( 'style-7' == $single_style && get_theme_mod( 'psingle_title_size_s7' ) ) {
			echo '@media only screen and (min-width: 768px){  .container-single.goso-single-style-7 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s7' ) . 'px; }  }';
		}
		if ( 'style-8' == $single_style && get_theme_mod( 'psingle_title_size_s8' ) ) {
			echo '@media only screen and (min-width: 768px){  .container-single.goso-single-style-8 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s8' ) . 'px; }  }';
		}
		if ( 'style-9' == $single_style && get_theme_mod( 'psingle_title_size_s9' ) ) {
			echo '@media only screen and (min-width: 768px){  .container-single.goso-single-style-9 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s9' ) . 'px; }  }';
		}
		if ( 'style-10' == $single_style && get_theme_mod( 'psingle_title_size_s10' ) ) {
			echo '@media only screen and (min-width: 768px){  .container-single.goso-single-style-10 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s10' ) . 'px; }  }';
		}
		?>
		<?php if ( get_theme_mod( 'goso_single_title_font_msize' ) ): ?>
            @media only screen and (max-width: 768px){ .container-single .single-post-title, .container-single.goso-single-style-3 .single-post-title, .container-single.goso-single-style-4 .single-post-title, .container-single.goso-single-style-5 .single-post-title, .container-single.goso-single-style-6 .single-post-title, .container-single.goso-single-style-7 .single-post-title, .container-single.goso-single-style-8 .single-post-title, .container-single.goso-single-style-9 .single-post-title, .container-single.goso-single-style-10 .single-post-title{ font-size: <?php echo get_theme_mod( 'goso_single_title_font_msize' ); ?>px; }  }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_subtitle_font_size' ) ): ?>
            @media only screen and (min-width: 769px){ .container-single .header-standard h2.goso-psub-title, .container-single h2.goso-psub-title{ font-size: <?php echo get_theme_mod( 'goso_single_subtitle_font_size' ); ?>px; }  }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_subtitle_font_msize' ) ): ?>
            @media only screen and (max-width: 768px){ .container-single .header-standard h2.goso-psub-title, .container-single h2.goso-psub-title{ font-size: <?php echo get_theme_mod( 'goso_single_subtitle_font_msize' ); ?>px; }  }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_disable_default_fonts' ) && get_theme_mod( 'goso_disable_all_fonts' ) ): ?>
            .post-entry blockquote:before, .wpb_text_column blockquote:before, .woocommerce .page-description blockquote:before, .woocommerce div.product .entry-summary div[itemprop="description"] blockquote:before, .woocommerce div.product .woocommerce-tabs #tab-description blockquote:before, .woocommerce-product-details__short-description blockquote:before, .format-post-box .post-format-icon i.fa-quote-left:before { font-family: 'FontAwesome'; content: '\f10d'; font-size: 30px; left: 2px; top: 0px; font-weight: normal; }
            .goso-fawesome-ver5 .post-entry blockquote:before, .goso-fawesome-ver5 .wpb_text_column blockquote:before, .goso-fawesome-ver5 .woocommerce .page-description blockquote:before, .goso-fawesome-ver5 .woocommerce div.product .entry-summary div[itemprop="description"] blockquote:before, .goso-fawesome-ver5 .woocommerce div.product .woocommerce-tabs #tab-description blockquote:before, .goso-fawesome-ver5 .woocommerce-product-details__short-description blockquote:before, .goso-fawesome-ver5 .format-post-box .post-format-icon i.fa-quote-left:before{ font-family: 'Font Awesome 5 Free'; font-weight: 900; }
		<?php endif; ?>
		<?php
		for ( $x = 1; $x < 7; $x ++ ) {
			echo goso_renders_css( '.post-entry h' . $x . ', .wpb_text_column h' . $x . ', .elementor-text-editor h' . $x . ', .woocommerce .page-description h' . $x, 'goso_single_title_h' . $x . '_size' );
		}
		?>
		<?php echo goso_renders_css( '.post-entry, .post-entry p, .wpb_text_column p, .woocommerce .page-description p', 'goso_single_title_p_size' ); ?>
		<?php if ( get_theme_mod( 'goso_single_blockquote_fsize' ) ): ?>
            .post-entry blockquote.wp-block-quote p, .wpb_text_column blockquote.wp-block-quote p, .post-entry blockquote, .post-entry blockquote p, .wpb_text_column blockquote, .wpb_text_column blockquote p, .woocommerce .page-description blockquote, .woocommerce .page-description blockquote p{ font-size: <?php echo get_theme_mod( 'goso_single_blockquote_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_blockquoteauthor_fsize' ) ): ?>
            .post-entry blockquote cite, .post-entry blockquote .author, .wpb_text_column blockquote cite, .wpb_text_column blockquote .author, .woocommerce .page-description blockquote cite, .woocommerce .page-description blockquote .author, .post-entry blockquote.wp-block-quote cite, .wpb_text_column blockquote.wp-block-quote cite{ font-size: <?php echo get_theme_mod( 'goso_single_blockquoteauthor_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_cat_font_size' ) ): ?>
            .container-single .goso-standard-cat .cat > a.goso-cat-name{ font-size: <?php echo get_theme_mod( 'goso_single_cat_font_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_meta_font_size' ) ): ?>
            .post-box-meta-single, .tags-share-box .single-comment-o{ font-size: <?php echo get_theme_mod( 'goso_single_meta_font_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_tags_font_size' ) ): ?>
            .container-single .post-entry .post-tags a{ font-size: <?php echo get_theme_mod( 'goso_single_tags_font_size' ); ?>px !important; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_share_box_fsize' ) ): ?>
            .post-share a, .post-share .count-number-like, .tags-share-box.tags-share-box-2_3 .goso-social-share-text{ font-size: <?php echo get_theme_mod( 'goso_single_share_box_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_authorbio_name_fsize' ) ): ?>
            .author-content h5{ font-size: <?php echo get_theme_mod( 'goso_authorbio_name_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_bio_upper_name' ) ): ?>
            .author-content h5{ text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_authorbio_desc_fsize' ) ): ?>
            .author-content p, .author-content{ font-size: <?php echo get_theme_mod( 'goso_authorbio_desc_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_authorbio_social_fsize' ) ): ?>
            .author-content .author-social{ font-size: <?php echo get_theme_mod( 'goso_authorbio_social_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_prevnextpost_fsize' ) ): ?>
            .post-pagination span{ font-size: <?php echo get_theme_mod( 'goso_prevnextpost_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_prevnextpost_title_fsize' ) ): ?>
            .post-pagination h5{ font-size: <?php echo get_theme_mod( 'goso_prevnextpost_title_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltcomment_heading_fsize' ) ): ?>
            #respond h3.comment-reply-title span, .post-box-title{ font-size: <?php echo get_theme_mod( 'goso_rltcomment_heading_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltcomment_post_title_fsize' ) ): ?>
            .post-related .item-related h3 a{ font-size: <?php echo get_theme_mod( 'goso_rltcomment_post_title_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltcomment_post_date_fsize' ) ): ?>
            .post-related .item-related span.date{ font-size: <?php echo get_theme_mod( 'goso_rltcomment_post_date_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltcomment_cmauthor_fsize' ) ): ?>
            .thecomment .comment-text span.author, .thecomment .comment-text span.author a{ font-size: <?php echo get_theme_mod( 'goso_rltcomment_cmauthor_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltcomment_cmdate_fsize' ) ): ?>
            .thecomment .comment-text span.date{ font-size: <?php echo get_theme_mod( 'goso_rltcomment_cmdate_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltcomment_cmcontent_fsize' ) ): ?>
            .thecomment .comment-content, .thecomment .comment-content p{ font-size: <?php echo get_theme_mod( 'goso_rltcomment_cmcontent_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltcomment_cmreplyedit_fsize' ) ): ?>
            .post-comments span.reply a{ font-size: <?php echo get_theme_mod( 'goso_rltcomment_cmreplyedit_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltcomment_input_fsize' ) ): ?>
            #respond input, #respond textarea{ font-size: <?php echo get_theme_mod( 'goso_rltcomment_input_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltcomment_submit_fsize' ) ): ?>
            #respond #submit{ font-size: <?php echo get_theme_mod( 'goso_rltcomment_submit_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltcomment_gdrp_fsize' ) ): ?>
            form#commentform > .comment-form-cookies-consent, form#commentform > div.goso-gdpr-message{ font-size: <?php echo get_theme_mod( 'goso_rltcomment_gdrp_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltpopup_heading_fsize' ) ): ?>
            .goso-rlt-popup .rtlpopup-heading{ font-size: <?php echo get_theme_mod( 'goso_rltpopup_heading_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltpopup_title_fsize' ) ): ?>
            .goso-rlt-popup .rltpopup-meta .rltpopup-title{ font-size: <?php echo get_theme_mod( 'goso_rltpopup_title_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltpopup_date_fsize' ) ): ?>
            .goso-rlt-popup .rltpopup-meta .date{ font-size: <?php echo get_theme_mod( 'goso_rltpopup_date_fsize' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_off_letter_space_post_title' ) ): ?>
            .container-single .single-post-title { }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_on_uppercase_post_cat' ) ): ?>
            .container-single .cat a.goso-cat-name { text-transform: uppercase; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_grid_remove_line' ) ): ?>
            .list-post .header-list-style:after, .grid-header-box:after, .goso-overlay-over .overlay-header-box:after, .home-featured-cat-content .first-post .magcat-detail .mag-header:after { content: none; }
            .list-post .header-list-style, .grid-header-box, .goso-overlay-over .overlay-header-box, .home-featured-cat-content .first-post .magcat-detail .mag-header{ padding-bottom: 0; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_grid_rmbd_bottom' ) ): ?>
            .goso-grid li.list-post{ padding-bottom: 0; border-bottom: none; }
            .goso-layout-mixed-3 .goso-grid li.goso-slistp, .goso-layout-mixed-4 .goso-grid li.goso-slistp, .goso-latest-posts-mixed-3 .goso-grid li.goso-slistp, .goso-latest-posts-mixed-4 .goso-grid li.goso-slistp{ border-top: none; padding-top: 0; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_grid_share_rmbd' ) ): ?>
            .goso-post-box-meta.goso-post-box-grid .goso-post-share-box{ padding: 0; background: none !important; }
            .goso-post-box-meta.goso-post-box-grid:before{ content: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_standard_remove_line' ) ): ?>
            .header-standard:after { content: none; }
            .header-standard { padding-bottom: 0; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_grihead_align' ) ):
			$gridheader_align = get_theme_mod( 'goso_grihead_align' );
			?>
            .grid-header-box,.header-list-style{ text-align: <?php echo $gridheader_align; ?> }
			<?php if ( 'left' == $gridheader_align ) { ?>
            .grid-header-box:after, .header-list-style:after, .grid-mixed .grid-header-box:after, .container .goso-grid li.magazine-layout .grid-header-box:after, .list-post .header-list-style:after, .goso-layout-boxed-1 .list-boxed-post .header-list-style:after, .goso-layout-standard-boxed-1 .list-boxed-post .header-list-style:after, .goso-layout-classic-boxed-1 .list-boxed-post .header-list-style:after, .list-post.list-boxed-post .header-list-style:after{ left: 0; right: auto; margin-left: 0; margin-right: 0; }
            .grid-overlay-meta .grid-header-box{ padding-left: 10px; }
            .grid-overlay-meta .grid-header-box:after, .container .goso-grid li.magazine-layout.grid-overlay-meta .grid-header-box:after{ left: 10px; }
		<?php } else if ( 'center' == $gridheader_align ) { ?>
            .grid-header-box:after, .header-list-style:after, .grid-mixed .grid-header-box:after, .container .goso-grid li.magazine-layout .grid-header-box:after, .list-post .header-list-style:after, .goso-layout-boxed-1 .list-boxed-post .header-list-style:after, .goso-layout-standard-boxed-1 .list-boxed-post .header-list-style:after, .goso-layout-classic-boxed-1 .list-boxed-post .header-list-style:after, .list-post.list-boxed-post .header-list-style:after{ left: 50%; margin-left: -30px; }
		<?php } else if ( 'right' == $gridheader_align ) { ?>
            .grid-header-box:after, .header-list-style:after, .grid-mixed .grid-header-box:after, .container .goso-grid li.magazine-layout .grid-header-box:after, .list-post .header-list-style:after, .goso-layout-boxed-1 .list-boxed-post .header-list-style:after, .goso-layout-standard-boxed-1 .list-boxed-post .header-list-style:after, .goso-layout-classic-boxed-1 .list-boxed-post .header-list-style:after, .list-post.list-boxed-post .header-list-style:after{ left: auto; right: 0; margin-left: 0; margin-right: 0; }
            .grid-overlay-meta .grid-header-box{ padding-right: 10px; }
            .grid-overlay-meta .grid-header-box:after, .container .goso-grid li.magazine-layout.grid-overlay-meta .grid-header-box:after{ right: 10px; }
		<?php } ?>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_griexc_align' ) ): ?>
            .goso-featured-infor .item-content, .goso-grid li .item .item-content, .goso-masonry .item-masonry .item-content, .goso-grid .mixed-detail .item-content{ text-align: <?php echo get_theme_mod( 'goso_griexc_align' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_grishare_align' ) ):
			$gridshare_align = get_theme_mod( 'goso_grishare_align' );
			?>
            .goso-post-box-meta.goso-post-box-grid{ text-align: <?php echo $gridshare_align; ?>; }
			<?php if ( 'left' == $gridshare_align ) { ?>
            .goso-post-box-meta.goso-post-box-grid .goso-post-share-box{ padding-left: 0; }
		<?php } else if ( 'right' == $gridshare_align ) { ?>
            .goso-post-box-meta.goso-post-box-grid .goso-post-share-box{ padding-right: 0; }
		<?php } ?>
		<?php endif; ?>
		<?php
		if ( get_theme_mod( 'goso_align_left_post_title' ) ): ?>
            .goso-single-style-6 .single-breadcrumb, .goso-single-style-5 .single-breadcrumb, .goso-single-style-4 .single-breadcrumb, .goso-single-style-3 .single-breadcrumb, .goso-single-style-9 .single-breadcrumb, .goso-single-style-7 .single-breadcrumb{ text-align: left; }
            .container-single .header-standard, .container-single .post-box-meta-single { text-align: left; }
            .rtl .container-single .header-standard,.rtl .container-single .post-box-meta-single { text-align: right; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_off_uppercase_post_title_nav' ) ): ?>
            .container-single .post-pagination h5 { text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_post_remove_lines_related' ) ): ?>
            #respond h3.comment-reply-title span:before, #respond h3.comment-reply-title span:after, .post-box-title:before, .post-box-title:after { content: none; display: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_off_uppercase_post_title_related' ) ): ?>
            .container-single .item-related h3 a { text-transform: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_title_color' ) ): ?>
            .container-single .header-standard .post-title { color: <?php echo get_theme_mod( 'goso_single_title_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_subtitle_color' ) ): ?>
            .container-single .header-standard h2.goso-psub-title, .container-single h2.goso-psub-title { color: <?php echo get_theme_mod( 'goso_single_subtitle_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_tag_color' ) ): ?>
            .container-single .post-entry .post-tags a{ color: <?php echo get_theme_mod( 'goso_single_tag_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_tag_border' ) ): ?>
            .container-single .post-entry .post-tags a{ border-color: <?php echo get_theme_mod( 'goso_single_tag_border' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_tag_bg' ) ): ?>
            .container-single .post-entry .post-tags a{ background-color: <?php echo get_theme_mod( 'goso_single_tag_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_tag_hcolor' ) ): ?>
            .container-single .post-entry .post-tags a:hover{ color: <?php echo get_theme_mod( 'goso_single_tag_hcolor' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_tag_hborder' ) ): ?>
            .container-single .post-entry .post-tags a:hover{ border-color: <?php echo get_theme_mod( 'goso_single_tag_hborder' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_tag_hbg' ) ): ?>
            .container-single .post-entry .post-tags a:hover{ background-color: <?php echo get_theme_mod( 'goso_single_tag_hbg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_share_tcolor' ) ): ?>
            .pcnew-share .goso-social-share-text,.tags-share-box.tags-share-box-2_3 .goso-social-share-text{ color: <?php echo get_theme_mod( 'goso_single_share_tcolor' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_share_bgcolor' ) ): ?>
            .pcnew-share .goso-social-share-text{ background-color: <?php echo get_theme_mod( 'goso_single_share_bgcolor' ); ?>; }
            .pcnew-share .goso-social-share-text:after{border-left-color: <?php echo get_theme_mod( 'goso_single_share_bgcolor' ); ?>;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_share_bdcolor' ) ): ?>
            .pcnew-share .goso-social-share-text{ border-color: <?php echo get_theme_mod( 'goso_single_share_bdcolor' ); ?>; }
            .pcnew-share .goso-social-share-text:before{border-left-color: <?php echo get_theme_mod( 'goso_single_share_bdcolor' ); ?>;}
		<?php endif; ?>
		<?php
		if ( get_theme_mod( 'goso_single_share_icon_color' ) ): ?>
            .tags-share-box.tags-share-box-2_3 .post-share .count-number-like, .tags-share-box.tags-share-box-2_3 .post-share a,
            .container-single .post-share a, .page-share .post-share a { color: <?php echo get_theme_mod( 'goso_single_share_icon_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_share_icon_hover_color' ) ): ?>
            .container-single .post-share a:hover, .container-single .post-share a.liked, .page-share .post-share a:hover { color: <?php echo get_theme_mod( 'goso_single_share_icon_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_number_like_color' ) ): ?>
            .tags-share-box.tags-share-box-2_3 .post-share .count-number-like,
            .post-share .count-number-like { color: <?php echo get_theme_mod( 'goso_single_number_like_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_share_icon_style3_bgcolor' ) ): ?>
            .tags-share-box.tags-share-box-s3 .post-share .post-share-item{ background-color: <?php echo get_theme_mod( 'goso_single_share_icon_style3_bgcolor' ); ?>; }
		<?php endif; ?>

		<?php if ( get_theme_mod( 'goso_single_share_icon_style3_hbgcolor' ) ): ?>
            .tags-share-box.tags-share-box-s3 .post-share .post-share-item:hover{ background-color: <?php echo get_theme_mod( 'goso_single_share_icon_style3_hbgcolor' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_meta_color' ) ): ?>
            .tags-share-box .single-comment-o, .post-box-meta-single span, .header-standard .post-box-meta-single .author-post span, .header-standard .post-box-meta-single .author-post span a{ color: <?php echo get_theme_mod( 'goso_single_meta_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_breadcrumbs_hcolor' ) ): ?>
            .container.goso-breadcrumb.single-breadcrumb span a:hover, .goso-container-inside.goso-breadcrumb span a:hover, .container.goso-breadcrumb span a:hover{ color: <?php echo get_theme_mod( 'goso_breadcrumbs_hcolor' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_smaller_width' ) ): ?>
            .goso-single-smaller-width { max-width: <?php echo get_theme_mod( 'goso_single_smaller_width' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_color_text' ) ): ?>
            .post-entry, .post-entry p{ color: <?php echo get_theme_mod( 'goso_single_color_text' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_single_color_links' ) ): ?>
            .post-entry a, .container-single .post-entry a{ color: <?php echo get_theme_mod( 'goso_single_color_links' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_inlinerp_titleline' ) ): ?>
            .pcilrp-heading{margin-bottom: 15px;}.pcilrp-heading span{padding-bottom: 0;}.pcilrp-heading span:after{content: none;display: none;}
		<?php endif; ?>

		<?php echo goso_renders_css( '.pcilrp-heading span', 'goso_inlinerp_fsheading' ); ?>
		<?php if ( get_theme_mod( 'goso_inlinerp_fstitle' ) ): ?>
            .goso-ilrelated-posts .pcilrp-item-grid .pcilrp-title a, .goso-ilrelated-posts .pcilrp-item-list a{ font-size: <?php echo get_theme_mod( 'goso_inlinerp_fstitle' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_inlinerp_fsmeta' ) ): ?>
            .pcilrp-meta{ font-size: <?php echo get_theme_mod( 'goso_inlinerp_fsmeta' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_inlinerp_bg' ) ): ?>
            .goso-ilrelated-posts{ background-color: <?php echo get_theme_mod( 'goso_inlinerp_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_inlinerp_border' ) ): ?>
            .goso-ilrelated-posts{ border-color: <?php echo get_theme_mod( 'goso_inlinerp_border' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_inlinerp_cheading' ) ): ?>
            .pcilrp-heading span{ color: <?php echo get_theme_mod( 'goso_inlinerp_cheading' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_inlinerp_cline' ) ): ?>
            .pcilrp-heading span:after{ border-color: <?php echo get_theme_mod( 'goso_inlinerp_cline' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_inlinerp_ctitle' ) ): ?>
            .goso-ilrelated-posts .pcilrp-item-grid .pcilrp-title a, .goso-ilrelated-posts .pcilrp-item-list a{ color: <?php echo get_theme_mod( 'goso_inlinerp_ctitle' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_inlinerp_hctitle' ) ): ?>
            .goso-ilrelated-posts .pcilrp-item-grid .pcilrp-title a:hover, .goso-ilrelated-posts .pcilrp-item-list a:hover{ color: <?php echo get_theme_mod( 'goso_inlinerp_hctitle' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_inlinerp_hcmeta' ) ): ?>
            .pcilrp-meta{ color: <?php echo get_theme_mod( 'goso_inlinerp_hcmeta' ); ?>; }
		<?php endif; ?>

		<?php for ( $pheading = 1; $pheading < 7; $pheading ++ ) { ?>
			<?php if ( get_theme_mod( 'goso_single_color_h' . $pheading ) ): ?>
                .post-entry h<?php echo $pheading; ?>{ color: <?php echo get_theme_mod( 'goso_single_color_h' . $pheading ); ?>; }
			<?php endif; ?>
		<?php } ?>
		<?php if ( get_theme_mod( 'goso_single_bgcolor_header' ) ): ?>
            .goso-single-style-9 .goso-post-image-wrapper,.goso-single-style-10 .goso-post-image-wrapper { background-color: <?php echo get_theme_mod( 'goso_single_bgcolor_header' ); ?>; }
		<?php endif; ?>
		<?php
		// Color single
		if ( ! get_theme_mod( 'goso_move_title_bellow' ) ) {
			$single_color_title    = get_theme_mod( 'goso_single_color_title_s568' );
			$single_color_subtitle = get_theme_mod( 'goso_single_color_subtitle_s568' );
			$single_color_cat      = get_theme_mod( 'goso_single_color_cat_s568' );
			$single_color_meta     = get_theme_mod( 'goso_single_color_meta_s568' );

			if ( $single_color_title && in_array( $single_style, array( 'style-5', 'style-6', 'style-8' ) ) ) {
				echo '@media only screen and (min-width: 768px){ .container-single.goso-single-' . $single_style . ' .single-header .post-title { color: ' . esc_attr( $single_color_title ) . '; } }';
			}
			if ( $single_color_subtitle && in_array( $single_style, array( 'style-5', 'style-6', 'style-8' ) ) ) {
				echo '@media only screen and (min-width: 768px){ .container-single.goso-single-' . $single_style . ' .single-header .goso-psub-title{ color: ' . esc_attr( $single_color_subtitle ) . '; } }';
			}
			if ( $single_color_cat && in_array( $single_style, array( 'style-5', 'style-6', 'style-8' ) ) ) {
				echo '@media only screen and (min-width: 768px){ .container-single.goso-single-' . $single_style . ' .goso-single-cat .cat > a.goso-cat-name { color: ' . esc_attr( $single_color_cat ) . '; } }';
			}
			if ( $single_color_meta && in_array( $single_style, array( 'style-5', 'style-6', 'style-8' ) ) ) {

				echo '@media only screen and (min-width: 768px){';
				echo '.goso-single-' . $single_style . '.goso-header-text-white .post-box-meta-single span,';
				echo '.goso-single-' . $single_style . '.goso-header-text-white .header-standard .author-post span a{ color: ' . esc_attr( $single_color_meta ) . '; }';
				echo '}';

				if ( get_theme_mod( 'goso_single_accent_color' ) ) {
					echo '.goso-single-' . $single_style . '.goso-header-text-white .header-standard .author-post span a:hover{ color: ' . get_theme_mod( 'goso_single_accent_color' ) . '; }';
				}
			}
		}

		if ( 'style-10' == $single_style ) {
			if ( get_theme_mod( 'goso_single_color_bread_s10' ) ) {
				echo '.goso-single-style-10 .goso-container-inside.goso-breadcrumb i,.goso-single-style-10  .container.goso-breadcrumb i,
				.goso-single-style-10 .goso-container-inside.goso-breadcrumb a,';
				echo '.goso-single-style-10 .goso-container-inside.goso-breadcrumb span{ color: ' . get_theme_mod( 'goso_single_color_bread_s10' ) . ' }';
			}

			if ( get_theme_mod( 'goso_single_color_title_s10' ) ) {
				echo '.goso-single-style-10.goso-header-text-white .header-standard .post-title,';
				echo '.goso-single-style-10.goso-header-text-white .header-standard h2 a';
				echo '{ color: ' . get_theme_mod( 'goso_single_color_title_s10' ) . ' }';
			}

			if ( get_theme_mod( 'goso_single_color_subtitle_s10' ) ) {
				echo '.goso-single-style-10.goso-header-text-white .header-standard h2.goso-psub-title{ color: ' . get_theme_mod( 'goso_single_color_subtitle_s10' ) . ' }';
			}

			if ( get_theme_mod( 'goso_single_color_cat_s10' ) ) {
				echo '.goso-single-style-10.goso-header-text-white .goso-standard-cat  .cat > a.goso-cat-name { color: ' . get_theme_mod( 'goso_single_color_cat_s10' ) . '; }';
			}

			if ( get_theme_mod( 'goso_single_color_meta_s10' ) ) {
				echo '.goso-single-style-10.goso-header-text-white .post-box-meta-single span,';
				echo '.goso-single-style-10.goso-header-text-white .header-standard .author-post span a';
				echo '{ color: ' . get_theme_mod( 'goso_single_color_meta_s10' ) . ' }';

				if ( get_theme_mod( 'goso_single_accent_color' ) ) {
					echo '.goso-single-style-10.goso-header-text-white .header-standard .author-post span a:hover{ color: ' . get_theme_mod( 'goso_single_accent_color' ) . '; }';
				}
			}
		}

		$bquote_text_color   = get_theme_mod( 'goso_bquote_text_color' );
		$bquote_author_color = get_theme_mod( 'goso_bquote_author_color' );
		$bquote_bgcolor      = get_theme_mod( 'goso_bquote_bgcolor' );
		$bquote_border_color = get_theme_mod( 'goso_bquote_border_color' );

		if ( $bquote_text_color ) {
			echo '.post-entry blockquote, .post-entry blockquote p, .wpb_text_column blockquote, .wpb_text_column blockquote p{ color: ' . $bquote_text_color . ' }';
		}
		if ( $bquote_author_color ) {
			echo '.post-entry blockquote cite, .post-entry blockquote .author, .wpb_text_column blockquote cite, .wpb_text_column blockquote .author, .woocommerce .page-description blockquote cite, .woocommerce .page-description blockquote .author{ color: ' . esc_attr( $bquote_author_color ) . ' }';
			echo '.post-entry blockquote .author span:after, .wpb_text_column blockquote .author span:after, .woocommerce .page-description blockquote .author span:after{ background-color: ' . esc_attr( $bquote_author_color ) . ' }';
		}
		if ( $bquote_bgcolor ) {
			echo '.post-entry.blockquote-style-2 blockquote{ background-color: ' . esc_attr( $bquote_bgcolor ) . ' }';
		}
		if ( $bquote_border_color ) {
			echo '.post-entry.blockquote-style-2 blockquote:before{ background-color: ' . esc_attr( $bquote_border_color ) . '  }';
			echo '.post-entry blockquote::before, .wpb_text_column blockquote::before, .woocommerce .page-description blockquote:before{ color: ' . esc_attr( $bquote_border_color ) . '  }';
		}
		?>
		<?php if ( get_theme_mod( 'goso_rltpopup_hide_mobile' ) ): ?>
            @media only screen and (max-width: 479px) { .goso-rlt-popup{ display: none !important; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltpopup_padding_bottom' ) ): ?>
            .goso-rlt-popup .goso-rtlpopup-content{ padding-bottom: <?php echo get_theme_mod( 'goso_rltpopup_padding_bottom' ); ?>px; }
            @media only screen and (max-width: 479px){ .goso-rlt-popup .goso-rtlpopup-content{ padding-bottom: <?php echo get_theme_mod( 'goso_rltpopup_padding_bottom' ); ?>px; } }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltpop_heading_bg' ) ): ?>
            .goso-rlt-popup .rtlpopup-heading{ background-color: <?php echo get_theme_mod( 'goso_rltpop_heading_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltpop_heading_color' ) ): ?>
            .goso-rlt-popup .rtlpopup-heading{ color: <?php echo get_theme_mod( 'goso_rltpop_heading_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltpop_close_color' ) ): ?>
            .goso-rlt-popup .goso-close-rltpopup{ color: <?php echo get_theme_mod( 'goso_rltpop_close_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltpop_bg_color' ) ): ?>
            .goso-rlt-popup{ background-color: <?php echo get_theme_mod( 'goso_rltpop_bg_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltpop_title_color' ) ): ?>
            .goso-rlt-popup .rltpopup-meta .rltpopup-title{ color: <?php echo get_theme_mod( 'goso_rltpop_title_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltpop_title_hover' ) ): ?>
            .goso-rlt-popup .rltpopup-meta .rltpopup-title:hover{ color: <?php echo get_theme_mod( 'goso_rltpop_title_hover' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltpop_date_color' ) ): ?>
            .goso-rlt-popup .rltpopup-meta .date{ color: <?php echo get_theme_mod( 'goso_rltpop_date_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_rltpop_border_color' ) ): ?>
            .goso-rlt-popup .rltpopup-item{ border-color: <?php echo get_theme_mod( 'goso_rltpop_border_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_authorbio_bg' ) ): ?>
            .post-author{ background-color: <?php echo get_theme_mod( 'goso_authorbio_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_authorbio_bordercl' ) ): ?>
            .post-author, .abio-style-3 .author-img img, .abio-style-4 .author-img img{ border-color: <?php echo get_theme_mod( 'goso_authorbio_bordercl' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_authorbio_name_color' ) ): ?>
            .author-content h5 a{ color: <?php echo get_theme_mod( 'goso_authorbio_name_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_authorbio_name_hcolor' ) ): ?>
            .author-content h5 a:hover{ color: <?php echo get_theme_mod( 'goso_authorbio_name_hcolor' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_authorbio_desc_color' ) ): ?>
            .author-content p{ color: <?php echo get_theme_mod( 'goso_authorbio_desc_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_authorbio_social_color' ) ): ?>
            .author-content .author-social{ color: <?php echo get_theme_mod( 'goso_authorbio_social_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_authorbio_social_hcolor' ) ): ?>
            .author-content .author-social:hover{ color: <?php echo get_theme_mod( 'goso_authorbio_social_hcolor' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_prevnext_colors' ) ): ?>
            .post-pagination span{ color: <?php echo get_theme_mod( 'goso_prevnext_colors' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_prevnext_ctitle' ) ): ?>
            .post-pagination a{ color: <?php echo get_theme_mod( 'goso_prevnext_ctitle' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_prevnext_hctitle' ) ): ?>
            .post-pagination a:hover{ color: <?php echo get_theme_mod( 'goso_prevnext_hctitle' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_relatedcm_heading' ) ): ?>
            #respond h3.comment-reply-title span, .post-box-title{ color: <?php echo get_theme_mod( 'goso_relatedcm_heading' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_relatedcm_lineheading' ) ): ?>
            #respond h3.comment-reply-title span:before, #respond h3.comment-reply-title span:after, .post-box-title:before, .post-box-title:after{ background-color: <?php echo get_theme_mod( 'goso_relatedcm_lineheading' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_relatedcm_ctitle' ) ): ?>
            .item-related h3 a{ color: <?php echo get_theme_mod( 'goso_relatedcm_ctitle' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_relatedcm_hctitle' ) ): ?>
            .item-related h3 a:hover{ color: <?php echo get_theme_mod( 'goso_relatedcm_hctitle' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_relatedcm_cdate' ) ): ?>
            .item-related span.date{ color: <?php echo get_theme_mod( 'goso_relatedcm_cdate' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_relatedcm_author' ) ): ?>
            .thecomment .comment-text span.author, .thecomment .comment-text span.author a{ color: <?php echo get_theme_mod( 'goso_relatedcm_author' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_relatedcm_hauthor' ) ): ?>
            .thecomment .comment-text span.author a:hover{ color: <?php echo get_theme_mod( 'goso_relatedcm_hauthor' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_relatedcm_cmdate' ) ): ?>
            .thecomment .comment-text span.date{ color: <?php echo get_theme_mod( 'goso_relatedcm_cmdate' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_relatedcm_replyedit' ) ): ?>
            .post-comments span.reply a, .post-comments span.reply a:hover{ color: <?php echo get_theme_mod( 'goso_relatedcm_replyedit' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_relatedcm_cmcontent' ) ): ?>
            .thecomment .comment-content, .thecomment .comment-content p{ color: <?php echo get_theme_mod( 'goso_relatedcm_cmcontent' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_relatedcm_cminput' ) ): ?>
            #respond input[type="text"], #respond input[type="email"], #respond textarea{ color: <?php echo get_theme_mod( 'goso_relatedcm_cminput' ); ?>; } #respond input[type="text"]::placeholder{ color: <?php echo get_theme_mod( 'goso_relatedcm_cminput' ); ?>; opacity: 1; } #respond input[type="text"]:-ms-input-placeholder{ color: <?php echo get_theme_mod( 'goso_relatedcm_cminput' ); ?>; } #respond input[type="text"]::-ms-input-placeholder{ color: <?php echo get_theme_mod( 'goso_relatedcm_cminput' ); ?>; } #respond input[type="email"]::placeholder{ color: <?php echo get_theme_mod( 'goso_relatedcm_cminput' ); ?>; opacity: 1; } #respond input[type="email"]:-ms-input-placeholder{ color: <?php echo get_theme_mod( 'goso_relatedcm_cminput' ); ?>; } #respond input[type="email"]::-ms-input-placeholder{ color: <?php echo get_theme_mod( 'goso_relatedcm_cminput' ); ?>; } #respond textarea::placeholder{ color: <?php echo get_theme_mod( 'goso_relatedcm_cminput' ); ?>; opacity: 1; } #respond textarea:-ms-input-placeholder{ color: <?php echo get_theme_mod( 'goso_relatedcm_cminput' ); ?>; } #respond textarea::-ms-input-placeholder{ color: <?php echo get_theme_mod( 'goso_relatedcm_cminput' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_relatedcm_gdpr' ) ): ?>
            form#commentform > .comment-form-cookies-consent, form#commentform > div.goso-gdpr-message{ color: <?php echo get_theme_mod( 'goso_relatedcm_gdpr' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_footer_insta_hide_icon' ) ): ?>
            .footer-instagram-html h4.footer-instagram-title>span:before{ content: none; display: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_top_insta_hide_icon' ) ): ?>
            .goso-top-instagram h4.footer-instagram-title>span:before{ content: none; display: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_boxes_overlay' ) ): ?>
            ul.homepage-featured-boxes .goso-fea-in h4 span span, ul.homepage-featured-boxes .goso-fea-in h4 span, ul.homepage-featured-boxes .goso-fea-in.boxes-style-2 h4 { background-color: <?php echo get_theme_mod( 'goso_home_boxes_overlay' ); ?>; }
            ul.homepage-featured-boxes li .goso-fea-in:before, ul.homepage-featured-boxes li .goso-fea-in:after, ul.homepage-featured-boxes .goso-fea-in h4 span span:before, ul.homepage-featured-boxes .goso-fea-in h4 > span:before, ul.homepage-featured-boxes .goso-fea-in h4 > span:after, ul.homepage-featured-boxes .goso-fea-in.boxes-style-2 h4:before { border-color: <?php echo get_theme_mod( 'goso_home_boxes_overlay' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_boxes_title_color' ) ): ?>
            ul.homepage-featured-boxes .goso-fea-in h4 span span { color: <?php echo get_theme_mod( 'goso_home_boxes_title_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_boxes_accent_hover_color' ) ): ?>
            ul.homepage-featured-boxes .goso-fea-in:hover h4 span { color: <?php echo get_theme_mod( 'goso_home_boxes_accent_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_popular_label_color' ) ): ?>
            .home-pupular-posts-title { color: <?php echo get_theme_mod( 'goso_home_popular_label_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_popular_border_color' ) ): ?>
            .goso-home-popular-posts { border-color: <?php echo get_theme_mod( 'goso_home_popular_border_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_popular_post_title_color' ) ): ?>
            .goso-home-popular-post .item-related h3 a { color: <?php echo get_theme_mod( 'goso_home_popular_post_title_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_popular_post_title_hover_color' ) ): ?>
            .goso-home-popular-post .item-related h3 a:hover { color: <?php echo get_theme_mod( 'goso_home_popular_post_title_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_popular_post_date_color' ) ): ?>
            .goso-home-popular-post .item-related span.date { color: <?php echo get_theme_mod( 'goso_home_popular_post_date_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_title_box_bg' ) ): ?>
            .goso-homepage-title.style-14 .inner-arrow:before,
            .goso-homepage-title.style-11 .inner-arrow,
            .goso-homepage-title.style-12 .inner-arrow,
            .goso-homepage-title.style-13 .inner-arrow,
            .goso-homepage-title .inner-arrow, .goso-homepage-title.style-15 .inner-arrow{ background-color: <?php echo get_theme_mod( 'goso_home_title_box_bg' ); ?>; }
            .goso-border-arrow.goso-homepage-title.style-2:after{ border-top-color: <?php echo get_theme_mod( 'goso_home_title_box_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_title_box_outer_bg' ) ): ?>
            .goso-border-arrow.goso-homepage-title:after { background-color: <?php echo get_theme_mod( 'goso_home_title_box_outer_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_title_box_border_color' ) ): ?>
            .goso-border-arrow.goso-homepage-title .inner-arrow, .goso-homepage-title.style-4 .inner-arrow:before, .goso-homepage-title.style-4 .inner-arrow:after, .goso-homepage-title.style-7, .goso-homepage-title.style-9 { border-color: <?php echo get_theme_mod( 'goso_home_title_box_border_color' ); ?>; }
            .goso-border-arrow.goso-homepage-title:before { border-top-color: <?php echo get_theme_mod( 'goso_home_title_box_border_color' ); ?>; }
            .goso-homepage-title.style-5, .goso-homepage-title.style-7{ border-color: <?php echo get_theme_mod( 'goso_home_title_box_border_color' ); ?>; }
            .goso-homepage-title.style-16.goso-border-arrow:after{ background-color: <?php echo get_theme_mod( 'goso_home_title_box_border_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_title_box_border_bottom5' ) ): ?>
            .goso-homepage-title.style-10, .goso-homepage-title.style-12,
            .goso-border-arrow.goso-homepage-title.style-5 .inner-arrow{ border-bottom-color: <?php echo get_theme_mod( 'goso_home_title_box_border_bottom5' ); ?>; }
            .goso-homepage-title.style-5{ border-color: <?php echo get_theme_mod( 'goso_home_title_box_border_bottom5' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_title_box_border_bottom7' ) ): ?>
            .goso-homepage-title.style-7 .inner-arrow:before, .goso-homepage-title.style-9 .inner-arrow:before{ background-color: <?php echo get_theme_mod( 'goso_home_title_box_border_bottom7' ); ?>; }
		<?php endif; ?>

		<?php if ( get_theme_mod( 'goso_home_title_box_border_top10' ) ): ?>
            .goso-homepage-title.style-10{ border-top-color: <?php echo get_theme_mod( 'goso_home_title_box_border_top10' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_title_box_shapes_color' ) ): ?>
            .goso-homepage-title.style-13.pcalign-center .inner-arrow:before,
            .goso-homepage-title.style-13.pcalign-right .inner-arrow:before{ border-left-color: <?php echo get_theme_mod( 'goso_home_title_box_shapes_color' ); ?>; }
            .goso-homepage-title.style-13.pcalign-center .inner-arrow:after,
            .goso-homepage-title.style-13.pcalign-left .inner-arrow:after{ border-right-color: <?php echo get_theme_mod( 'goso_home_title_box_shapes_color' ); ?>; }

            .goso-homepage-title.style-12 .inner-arrow:before,
            .goso-homepage-title.style-12.pcalign-center .inner-arrow:after,
            .goso-homepage-title.style-12.pcalign-right .inner-arrow:after{ border-bottom-color: <?php echo get_theme_mod( 'goso_home_title_box_shapes_color' ); ?>; }
            .goso-homepage-title.style-11 .inner-arrow:after,
            .goso-homepage-title.style-11 .inner-arrow:before{ border-top-color: <?php echo get_theme_mod( 'goso_home_title_box_shapes_color' ); ?>; }
		<?php endif; ?>

		<?php if ( get_theme_mod( 'goso_home_bgstyle15' ) ): ?>
            .goso-homepage-title.style-15.goso-border-arrow:before{ background-color: <?php echo get_theme_mod( 'goso_home_bgstyle15' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_iconstyle15' ) ): ?>
            .goso-homepage-title.style-15.goso-border-arrow:after{ color: <?php echo get_theme_mod( 'goso_home_iconstyle15' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_cllines' ) ): ?>
            .goso-homepage-title.style-18.goso-border-arrow:after{ color: <?php echo get_theme_mod( 'goso_home_cllines' ); ?>; }
		<?php endif; ?>

		<?php if ( get_theme_mod( 'goso_home_title_box_border_inner_color' ) ): ?>
            .goso-border-arrow.goso-homepage-title:after { border-color: <?php echo get_theme_mod( 'goso_home_title_box_border_inner_color' ); ?>; }
		<?php endif; ?>

		<?php if ( get_theme_mod( 'goso_home_title_box_text_color' ) ): ?>
            .goso-homepage-title .inner-arrow, .goso-homepage-title.goso-magazine-title .inner-arrow a { color: <?php echo get_theme_mod( 'goso_home_title_box_text_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_remove_border_outer' ) ): ?>
            .goso-homepage-title:after { content: none; display: none; }
            .goso-homepage-title { margin-left: 0; margin-right: 0; margin-top: 0; }
            .goso-homepage-title:before { bottom: -6px; border-width: 6px; margin-left: -6px; }
            .rtl .goso-homepage-title:before { bottom: -6px; border-width: 6px; margin-right: -6px; margin-left: 0; }
            .goso-homepage-title.goso-magazine-title:before{ left: 25px; }
            .rtl .goso-homepage-title.goso-magazine-title:before{ right: 25px; left:auto; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_remove_arrow_down' ) ): ?>
            .goso-homepage-title:before, .goso-border-arrow.goso-homepage-title.style-2:after { content: none; display: none; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_featured_title_color' ) ): ?>
            .home-featured-cat-content .magcat-detail h3 a { color: <?php echo get_theme_mod( 'goso_home_featured_title_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_featured_title_hover_color' ) ): ?>
            .home-featured-cat-content .magcat-detail h3 a:hover { color: <?php echo get_theme_mod( 'goso_home_featured_title_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_featured_meta_color' ) ): ?>
            .home-featured-cat-content .grid-post-box-meta span{ color: <?php echo get_theme_mod( 'goso_home_featured_meta_color' ); ?> }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_featured3_meta_color' ) ): ?>
            .home-featured-cat-content .mag-photo .grid-post-box-meta span, .home-featured-cat-content .mag-photo .grid-post-box-meta span a, .home-featured-cat-content .goso-single-mag-slider .grid-post-box-meta span, .home-featured-cat-content .goso-single-mag-slider .grid-post-box-meta span a, .home-featured-cat-content.style-14 .mag-meta, .home-featured-cat-content.style-14 .mag-meta span a, .home-featured-cat-content .mag-photo .grid-post-box-meta span:after, .home-featured-cat-content.style-15 .first-post .grid-post-box-meta span, .home-featured-cat-content.style-15 .first-post .grid-post-box-meta span a{ color: <?php echo get_theme_mod( 'goso_home_featured3_meta_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_featured_metalink_color' ) ): ?>
            .home-featured-cat-content .grid-post-box-meta span a{ color: <?php echo get_theme_mod( 'goso_home_featured_metalink_color' ); ?> }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_featured_accent_color' ) ): ?>
            .home-featured-cat-content .grid-post-box-meta span a:hover { color: <?php echo get_theme_mod( 'goso_home_featured_accent_color' ); ?>; }
            .home-featured-cat-content .first-post .magcat-detail .mag-header:after { background: <?php echo get_theme_mod( 'goso_home_featured_accent_color' ); ?>; }
            .goso-slider ol.goso-control-nav li a.goso-active, .goso-slider ol.goso-control-nav li a:hover { border-color: <?php echo get_theme_mod( 'goso_home_featured_accent_color' ); ?>; background: <?php echo get_theme_mod( 'goso_home_featured_accent_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_featured_viewall_color' ) ): ?>
            .goso-featured-cat-seemore a, .goso-featured-cat-seemore.goso-btn-make-button a{ color: <?php echo get_theme_mod( 'goso_home_featured_viewall_color' ); ?> }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_featured_viewall_bg' ) ): ?>
            .goso-featured-cat-seemore.goso-btn-make-button a{ background-color: <?php echo get_theme_mod( 'goso_home_featured_viewall_bg' ); ?> }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_featured3_overlay_color' ) ): ?>
            .home-featured-cat-content .mag-photo .mag-overlay-photo { background-color: <?php echo get_theme_mod( 'goso_home_featured3_overlay_color' ); ?>; }
		<?php endif; ?>
        .home-featured-cat-content .mag-photo .mag-overlay-photo { opacity: <?php echo get_theme_mod( 'goso_home_featured3_overlay_opacity' ); ?>; }
        .home-featured-cat-content .mag-photo:hover .mag-overlay-photo { opacity: <?php echo get_theme_mod( 'goso_home_featured3_overlay_hover_opacity' ); ?>; }
		<?php if ( get_theme_mod( 'goso_home_featured3_title_color' ) ): ?>
            .home-featured-cat-content .mag-photo .magcat-detail h3 a, .goso-single-mag-slider .magcat-detail .magcat-titlte a, .home-featured-cat-content.style-14 .first-post .magcat-detail h3 a, .home-featured-cat-content.style-15 .first-post .magcat-detail h3 a{ color: <?php echo get_theme_mod( 'goso_home_featured3_title_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_home_featured3_title_hover_color' ) ): ?>
            .home-featured-cat-content .mag-photo .magcat-detail h3 a:hover, .goso-single-mag-slider .magcat-detail .magcat-titlte a:hover, .home-featured-cat-content.style-14 .first-post .magcat-detail h3 a:hover, .home-featured-cat-content.style-15 .first-post .magcat-detail h3 a:hover { color: <?php echo get_theme_mod( 'goso_home_featured3_title_hover_color' ); ?>; }
		<?php endif; ?>

		<?php if ( get_theme_mod( 'goso_portfolio_layout_title_color' ) ): ?>
            .portfolio-overlay-content .portfolio-short .portfolio-title a, .text-grid-info h3 a { color: <?php echo get_theme_mod( 'goso_portfolio_layout_title_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_portfolio_layout_title_hover' ) ): ?>
            .portfolio-overlay-content .portfolio-short .portfolio-title a:hover, .text-grid-info h3 a:hover { color: <?php echo get_theme_mod( 'goso_portfolio_layout_title_hover' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_portfolio_buttons_icon_color' ) ): ?>
            .portfolio-buttons a { color: <?php echo get_theme_mod( 'goso_portfolio_buttons_icon_color' ); ?>; border-color: <?php echo get_theme_mod( 'goso_portfolio_buttons_icon_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_portfolio_buttons_icon_hover' ) ): ?>
            .portfolio-item .portfolio-buttons a:hover { color: <?php echo get_theme_mod( 'goso_portfolio_buttons_icon_hover' ); ?>; border-color: <?php echo get_theme_mod( 'goso_portfolio_buttons_icon_hover' ); ?>; }
            .portfolio-item .portfolio-buttons a.liked > i { color: <?php echo get_theme_mod( 'goso_portfolio_buttons_icon_hover' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_portfolio_layout_overlay_color' ) ): ?>
            .portfolio-overlay-background { background: <?php echo get_theme_mod( 'goso_portfolio_layout_overlay_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_portfolio_layout_overlay_border_color' ) ): ?>
            .inner-item-portfolio:hover .portfolio-overlay-background { border-color: <?php echo get_theme_mod( 'goso_portfolio_layout_overlay_border_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_portfolio_grid_categories_color' ) ): ?>
            .text-grid-cat, .text-grid-cat a { color: <?php echo get_theme_mod( 'goso_portfolio_grid_categories_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_portfolio_grid_categories_hover' ) ): ?>
            .text-grid-cat a:hover { color: <?php echo get_theme_mod( 'goso_portfolio_grid_categories_hover' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_portfolio_overlay_color' ) ): ?>
            .goso-portfolio-thumbnail a:after { background-color: <?php echo get_theme_mod( 'goso_portfolio_overlay_color' ); ?>; }
		<?php endif; ?>
        .inner-item-portfolio:hover .goso-portfolio-thumbnail a:after { opacity: <?php echo get_theme_mod( 'goso_portfolio_overlay_opacity' ); ?>; }
		<?php if ( get_theme_mod( 'goso_portfolio_title_color' ) ): ?>
            .inner-item-portfolio .portfolio-desc h3 { color: <?php echo get_theme_mod( 'goso_portfolio_title_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_portfolio_cate_color' ) ): ?>
            .inner-item-portfolio .portfolio-desc span { color: <?php echo get_theme_mod( 'goso_portfolio_cate_color' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_portfolio_title_hcolor' ) ): ?>
            .inner-item-portfolio .portfolio-desc h3:hover { color: <?php echo get_theme_mod( 'goso_portfolio_title_hcolor' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_portfolio_cate_hcolor' ) ): ?>
            .inner-item-portfolio .portfolio-desc span:hover { color: <?php echo get_theme_mod( 'goso_portfolio_cate_hcolor' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_menu_hbg_mobile' ) ): ?>
            @media only screen and (max-width: 960px){ .goso-menuhbg-wapper { display: none !important; } }
		<?php endif; ?>
		<?php $hbg_size = get_theme_mod( 'goso_hbg_size_icon' ); ?>
		<?php if ( $hbg_size && $hbg_size > 13 && $hbg_size < 31 ): ?>
            .goso-menuhbg-toggle { width: <?php echo $hbg_size; ?>px; }
            .goso-menuhbg-toggle .goso-menuhbg-inner { height: <?php echo $hbg_size; ?>px; }
            .goso-menuhbg-toggle .goso-lines, .goso-menuhbg-wapper{ width: <?php echo $hbg_size; ?>px; }
            .goso-menuhbg-toggle .lines-button{ top: <?php echo ( $hbg_size - 2 ) / 2; ?>px; }
            .goso-menuhbg-toggle .goso-lines:before{ top: <?php echo( ( $hbg_size / 2 ) - 4 ); ?>px; }
            .goso-menuhbg-toggle .goso-lines:after{ top: -<?php echo( ( $hbg_size / 2 ) - 4 ); ?>px; }
            .goso-menuhbg-toggle:hover .lines-button:after, .goso-menuhbg-toggle:hover .goso-lines:before, .goso-menuhbg-toggle:hover .goso-lines:after{ transform: translateX(<?php echo( $hbg_size + 10 ); ?>px); }
            .goso-menuhbg-toggle .lines-button.goso-hover-effect{ left: -<?php echo( $hbg_size + 10 ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_hbg_sitetitle_size' ) ): ?>
            .goso-menu-hbg-inner .goso-hbg_sitetitle{ font-size: <?php echo get_theme_mod( 'goso_hbg_sitetitle_size' ); ?>px; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_hbg_sitedes_size' ) ): ?>
            .goso-menu-hbg-inner .goso-hbg_desc{ font-size: <?php echo get_theme_mod( 'goso_hbg_sitedes_size' ); ?>px; }
		<?php endif; ?>
		<?php
		if ( get_theme_mod( 'goso_menu_hbg_show' ) || get_theme_mod( 'goso_vertical_nav_show' ) || get_theme_mod( 'pchdbd_all' ) || get_theme_mod( 'pchdbd_homepage' ) || get_theme_mod( 'pchdbd_archive' ) || get_theme_mod( 'pchdbd_post' ) || get_theme_mod( 'pchdbd_page' ) ):
			$max_width_hbg = get_theme_mod( 'goso_hbg_logo_max_width' );
			if ( get_theme_mod( 'goso_hbg_logo_max_width' ) ) {
				echo '.goso-hbg-logo img{ max-width: ' . $max_width_hbg . 'px; }';
			}
			$goso_hbg_width  = get_theme_mod( 'goso_hbg_width' );
			$goso_hbg_screen = 1500;
			if ( $goso_hbg_width && $goso_hbg_width > 249 && $goso_hbg_width < 501 ) {
				$goso_hbg_screen = 1170 + $goso_hbg_width;
				echo '.goso-menu-hbg{ width: ' . $goso_hbg_width . 'px; }';
				echo '.goso-menu-hbg.goso-menu-hbg-left{ transform: translateX(-' . $goso_hbg_width . 'px); -webkit-transform: translateX(-' . $goso_hbg_width . 'px); -moz-transform: translateX(-' . $goso_hbg_width . 'px); }';
				echo '.goso-menu-hbg.goso-menu-hbg-right{ transform: translateX(' . $goso_hbg_width . 'px); -webkit-transform: translateX(' . $goso_hbg_width . 'px); -moz-transform: translateX(' . $goso_hbg_width . 'px); }';
				echo '.goso-menuhbg-open .goso-menu-hbg.goso-menu-hbg-left, .goso-vernav-poleft.goso-menuhbg-open .goso-vernav-toggle{ left: ' . $goso_hbg_width . 'px; }';
				echo '@media only screen and (min-width: 961px) { .goso-vernav-enable.goso-vernav-poleft .wrapper-boxed{ padding-left: ' . $goso_hbg_width . 'px; } .goso-vernav-enable.goso-vernav-poright .wrapper-boxed{ padding-right: ' . $goso_hbg_width . 'px; } .goso-vernav-enable .is-sticky #navigation{ width: calc(100% - ' . $goso_hbg_width . 'px); } }';
				echo '@media only screen and (min-width: 961px) { .goso-vernav-enable .goso_is_nosidebar .wp-block-image.alignfull, .goso-vernav-enable .goso_is_nosidebar .wp-block-cover-image.alignfull, .goso-vernav-enable .goso_is_nosidebar .wp-block-cover.alignfull, .goso-vernav-enable .goso_is_nosidebar .wp-block-gallery.alignfull, .goso-vernav-enable .goso_is_nosidebar .alignfull{ margin-left: calc(50% - 50vw + ' . floor( $goso_hbg_width / 2 ) . 'px); width: calc(100vw - ' . $goso_hbg_width . 'px); } }';
				echo '.goso-vernav-poright.goso-menuhbg-open .goso-vernav-toggle{ right: ' . $goso_hbg_width . 'px; }';
				echo '@media only screen and (min-width: 961px) { .goso-vernav-enable.goso-vernav-poleft .goso-rltpopup-left{ left: ' . $goso_hbg_width . 'px; } }';
				echo '@media only screen and (min-width: 961px) { .goso-vernav-enable.goso-vernav-poright .goso-rltpopup-right{ right: ' . $goso_hbg_width . 'px; } }';
			}
			echo '@media only screen and (max-width: ' . $goso_hbg_screen . 'px) and (min-width: 961px) { .goso-vernav-enable .container { max-width: 100%; max-width: calc(100% - 30px); } .goso-vernav-enable .container.home-featured-boxes{ display: block; } .goso-vernav-enable .container.home-featured-boxes:before, .goso-vernav-enable .container.home-featured-boxes:after{ content: ""; display: table; clear: both; } }';

			$mhbg_icon_toggle_color  = get_theme_mod( 'goso_mhbg_icon_toggle_color' );
			$mhbg_icon_toggle_hcolor = get_theme_mod( 'goso_mhbg_icon_toggle_hcolor' );

			$goso_mhbg_mobilecl   = get_theme_mod( 'goso_mhbg_mobilecl' );
			$goso_mhbg_mobilebgcl = get_theme_mod( 'goso_mhbg_mobilebgcl' );

			if ( $goso_mhbg_mobilebgcl ) {
				echo '.goso-vernav-toggle:before{border-top-color:' . $goso_mhbg_mobilebgcl . '}';
			}

			if ( $goso_mhbg_mobilecl ) {
				echo '.goso-vernav-toggle svg{fill:' . $goso_mhbg_mobilecl . '}';
			}

			if ( $mhbg_icon_toggle_color ) {
				echo '.goso-menuhbg-toggle .lines-button:after,.goso-menuhbg-toggle .goso-lines:before, .goso-menuhbg-toggle .goso-lines:after{ background-color: ' . esc_attr( $mhbg_icon_toggle_color ) . ' }';
			}

			if ( $mhbg_icon_toggle_hcolor ) {
				echo '.goso-menuhbg-toggle:hover .lines-button:after, .goso-menuhbg-toggle:hover .goso-lines:before, .goso-menuhbg-toggle:hover .goso-lines:after{ background-color: ' . esc_attr( $mhbg_icon_toggle_hcolor ) . ' }';
			}

			$mhbg_bgcolor            = get_theme_mod( 'goso_mhbg_bgcolor' );
			$mhbg_textcolor          = get_theme_mod( 'goso_mhbg_textcolor' );
			$mhbg_closecolor         = get_theme_mod( 'goso_mhbg_closecolor' );
			$mhbg_closehover         = get_theme_mod( 'goso_mhbg_closehover' );
			$mhbg_bordercolor        = get_theme_mod( 'goso_mhbg_bordercolor' );
			$mhbg_bgimgcolor         = get_theme_mod( 'goso_menu_hbg_bgimg' );
			$mhbgtitle_color         = get_theme_mod( 'goso_mhbgtitle_color' );
			$mhbgdesc_hcolor         = get_theme_mod( 'goso_mhbgdesc_hcolor' );
			$mhbgsearch_border       = get_theme_mod( 'goso_mhbg_search_border' );
			$mhbgsearch_border_hover = get_theme_mod( 'goso_mhbg_search_border_hover' );
			$mhbgsearch_color        = get_theme_mod( 'goso_mhbg_search_color' );
			$mhbgsearch_icon         = get_theme_mod( 'goso_mhbg_search_icon' );
			$mhbgaccent_color        = get_theme_mod( 'goso_mhbgaccent_color' );
			$mhbgaccent_hover_color  = get_theme_mod( 'goso_mhbgaccent_hover_color' );
			$mhbgfooter_color        = get_theme_mod( 'goso_mhbgfooter_color' );
			$mhbgicon_color          = get_theme_mod( 'goso_mhbgicon_color' );
			$mhbgicon_hover_color    = get_theme_mod( 'goso_mhbgicon_hover_color' );
			$mhbg_social_size        = get_theme_mod( 'goso_menuhbg_icon_size' );
			$mhbgicon_border         = get_theme_mod( 'goso_mhbgicon_border' );
			$mhbgicon_border_hover   = get_theme_mod( 'goso_mhbgicon_border_hover' );
			$mhbgicon_bg             = get_theme_mod( 'goso_mhbgicon_bg' );
			$mhbgicon_bg_hover       = get_theme_mod( 'goso_mhbgicon_bg_hover' );

			$mhbg_widget_title_color = get_theme_mod( 'goso_mhbg_widget_title_color' );
			$mhbgicon_bg_hover_color = get_theme_mod( 'goso_mhbgicon_bg_hover_color' );

			if ( $mhbg_bgcolor ) {
				echo '.goso-menu-hbg,.goso-menu-hbg .goso-sidebar-content .widget-title{background-color: ' . esc_attr( $mhbg_bgcolor ) . ';}';
			}
			if ( $mhbg_bgimgcolor ) {
				echo '.goso-menu-hbg{background-image: url( ' . esc_url( $mhbg_bgimgcolor ) . ' );}';
			}
			if ( $mhbg_closecolor ) {
				echo '.goso-menu-hbg-inner #goso-close-hbg:before, .goso-menu-hbg-inner #goso-close-hbg:after{background-color: ' . esc_attr( $mhbg_closecolor ) . ';}';
			}
			if ( $mhbg_closehover ) {
				echo '.goso-menu-hbg-inner #goso-close-hbg:hover:before, .goso-menu-hbg-inner #goso-close-hbg:hover:after{background-color: ' . esc_attr( $mhbg_closehover ) . ';}';
			}
			if ( $mhbg_textcolor ) {
				echo '.goso-menu-hbg,.goso-menu-hbg .about-widget .about-me-heading,';
				echo '.goso-menu-hbg .widget select,.goso-menu-hbg .widget select option,';
				echo '.goso-menu-hbg form.pc-searchform input.search-input{ color: ' . $mhbg_textcolor . ' }';
			}

			if ( $mhbg_bordercolor ) {
				echo '.goso-menu-hbg .widget ul li,.goso-menu-hbg .menu li,';
				echo '.goso-menu-hbg .widget-social a i,';
				echo '.goso-menu-hbg .goso-home-popular-posts,';
				echo '.goso-menu-hbg #respond textarea,';
				echo '.goso-menu-hbg .wpcf7 textarea,';
				echo '.goso-menu-hbg #respond input,';
				echo '.goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=date], .goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=datetime], .goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=datetime-local], .goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=email], .goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=month], .goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=number], .goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=password], .goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=range], .goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=search], .goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=tel], .goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=text], .goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=time], .goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=url], .goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=week], .goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form select, .goso-menu-hbg div.wpforms-container .wpforms-form.wpforms-form textarea,';
				echo '.goso-menu-hbg .wpcf7 input,';
				echo '.goso-menu-hbg .widget_wysija input,';
				echo '.goso-menu-hbg .widget select,';
				echo '.goso-menu-hbg .widget ul ul,';
				echo '.goso-menu-hbg .widget .tagcloud a,';
				echo '.goso-menu-hbg #wp-calendar tbody td,';
				echo '.goso-menu-hbg #wp-calendar thead th,';
				echo '.goso-menu-hbg .widget input[type="text"],';
				echo '.goso-menu-hbg .widget input[type="email"],';
				echo '.goso-menu-hbg .widget input[type="date"],';
				echo '.goso-menu-hbg .widget input[type="number"],';
				echo '.goso-menu-hbg .widget input[type="search"], .widget input[type="password"], .goso-menu-hbg form.pc-searchform input.search-input,';
				echo '.goso-vernav-enable.goso-vernav-poleft .goso-menu-hbg, .goso-vernav-enable.goso-vernav-poright .goso-menu-hbg, .goso-menu-hbg ul.sub-menu{border-color: ' . $mhbg_bordercolor . ';}';
			}
			if ( $mhbgtitle_color ) {
				echo '.goso-menu-hbg-inner .goso-hbg_sitetitle{ color:' . esc_attr( $mhbgtitle_color ) . ';}';
			}
			if ( $mhbgdesc_hcolor ) {
				echo '.goso-menu-hbg-inner .goso-hbg_desc{ color:' . esc_attr( $mhbgdesc_hcolor ) . ';}';
			}
			if ( $mhbgsearch_border ) {
				echo '.goso-menu-hbg form.pc-searchform.goso-hbg-search-form input.search-input{ border-color:' . esc_attr( $mhbgsearch_border ) . ';}';
			}
			if ( $mhbgsearch_border_hover ) {
				echo '.goso-menu-hbg .goso-hbg-search-form input.search-input:hover, form.pc-searchform.goso-hbg-search-form input.search-input:hover, form.pc-searchform.goso-hbg-search-form input.search-input:focus{ border-color:' . esc_attr( $mhbgsearch_border_hover ) . ';}';
			}
			if ( $mhbgsearch_color ) {
				echo 'form.pc-searchform.goso-hbg-search-form input.search-input{ color:' . esc_attr( $mhbgsearch_color ) . ';}';
				echo 'form.pc-searchform.goso-hbg-search-form input.search-input::-webkit-input-placeholder { color: ' . esc_attr( $mhbgsearch_color ) . '; }';
				echo 'form.pc-searchform.goso-hbg-search-form input.search-input::-moz-placeholder { color: ' . esc_attr( $mhbgsearch_color ) . '; opacity: 1; }';
				echo 'form.pc-searchform.goso-hbg-search-form input.search-input:-ms-input-placeholder { color: ' . esc_attr( $mhbgsearch_color ) . '; }';
				echo 'form.pc-searchform.goso-hbg-search-form input.search-input:-moz-placeholder { color: ' . esc_attr( $mhbgsearch_color ) . '; opacity: 1; }';
			}
			if ( $mhbgsearch_icon ) {
				echo 'form.pc-searchform.goso-hbg-search-form i{ color:' . esc_attr( $mhbgsearch_icon ) . ';}';
			}

			if ( $mhbgaccent_color ) {
				echo '.goso-menu-hbg .menu li a,';
				echo '.goso-menu-hbg .widget ul.side-newsfeed li .side-item .side-item-text h4 a,';
				echo '.goso-menu-hbg #wp-calendar tbody td a,';
				echo '.goso-menu-hbg .widget.widget_categories ul li,';
				echo '.goso-menu-hbg .widget.widget_archive ul li, .goso-menu-hbg .widget-social a i,';
				echo '.goso-menu-hbg .widget-social a span,';
				echo '.goso-menu-hbg .widget-social.show-text a span,';
				echo '.goso-menu-hbg .widget a{ color: ' . esc_attr( $mhbgaccent_color ) . ';}';
			}

			if ( $mhbgaccent_hover_color ) {
				echo '.goso-menu-hbg .menu li a:hover,.goso-menu-hbg .menu li a .indicator:hover';
				echo '.goso-menu-hbg .widget ul.side-newsfeed li .side-item .side-item-text h4 a:hover,';
				echo '.goso-menu-hbg .widget a:hover,';
				echo '.goso-menu-hbg .goso-sidebar-content .widget-social a:hover span,';
				echo '.goso-menu-hbg .widget-social a:hover span,';
				echo '.goso-menu-hbg .goso-tweets-widget-content .icon-tweets,';
				echo '.goso-menu-hbg .goso-tweets-widget-content .tweet-intents a,';
				echo '.goso-menu-hbg .goso-tweets-widget-content.tweet-intents span:after,';
				echo '.goso-menu-hbg .widget-social.remove-circle a:hover i,';
				echo '.goso-menu-hbg #wp-calendar tbody td a:hover,';
				echo '.goso-menu-hbg a:hover {color: ' . esc_attr( $mhbgaccent_hover_color ) . ';}';

				echo '.goso-menu-hbg .widget .tagcloud a:hover,';
				echo '.goso-menu-hbg .widget-social a:hover i,';
				echo '.goso-menu-hbg .widget .goso-user-logged-in .goso-user-action-links a:hover,';
				echo '.goso-menu-hbg .widget input[type="submit"]:hover,';
				echo '.goso-menu-hbg .widget button[type="submit"]:hover{ color: #fff; background-color: ' . esc_attr( $mhbgaccent_hover_color ) . '; border-color: ' . esc_attr( $mhbgaccent_hover_color ) . '; }';

				echo '.goso-menu-hbg .about-widget .about-me-heading:before { border-color: ' . esc_attr( $mhbgaccent_hover_color ) . '; }';
				echo '.goso-menu-hbg .goso-tweets-widget-content .tweet-intents-inner:before,';
				echo '.goso-menu-hbg .goso-tweets-widget-content .tweet-intents-inner:after { background-color: ' . esc_attr( $mhbgaccent_hover_color ) . '; }';
				echo '.goso-menu-hbg .goso-owl-carousel.goso-tweets-slider .owl-dots .owl-dot.active span,';
				echo '.goso-menu-hbg .goso-owl-carousel.goso-tweets-slider .owl-dots .owl-dot:hover span { border-color: ' . esc_attr( $mhbgaccent_hover_color ) . '; background-color: ' . esc_attr( $mhbgaccent_hover_color ) . '; }';
			}

			if ( $mhbgfooter_color ) {
				echo '.goso-menu-hbg-inner .goso_menu_hbg_ftext{ color:' . esc_attr( $mhbgfooter_color ) . ';}';
			}
			if ( $mhbgicon_color ) {
				echo '.goso-menu-hbg .header-social.sidebar-nav-social a i, .goso-menu-hbg .header-social.goso-hbg-social-style-2 a i{ color:' . esc_attr( $mhbgicon_color ) . ';}';
			}
			if ( $mhbgicon_hover_color ) {
				echo '.goso-menu-hbg .header-social.sidebar-nav-social a:hover i, .goso-menu-hbg .header-social.goso-hbg-social-style-2 a:hover i{ color:' . esc_attr( $mhbgicon_hover_color ) . ';}';
			}
			if ( $mhbgicon_border ) {
				echo '.goso-menu-hbg .header-social.goso-hbg-social-style-2 a i{ border-color:' . esc_attr( $mhbgicon_border ) . ';}';
			}
			if ( $mhbgicon_border_hover ) {
				echo '.goso-menu-hbg .header-social.goso-hbg-social-style-2 a:hover i{ border-color:' . esc_attr( $mhbgicon_border_hover ) . ';}';
			}
			if ( $mhbgicon_bg ) {
				echo '.goso-menu-hbg .header-social.goso-hbg-social-style-2 a i{ background-color:' . esc_attr( $mhbgicon_bg ) . ';}';
			}
			if ( $mhbgicon_bg_hover ) {
				echo '.goso-menu-hbg .header-social.goso-hbg-social-style-2 a:hover i{ background-color:' . esc_attr( $mhbgicon_bg_hover ) . ';}';
			}
			if ( $mhbg_social_size ) {
				echo '.goso-menu-hbg .header-social.sidebar-nav-social a i{ font-size:' . absint( $mhbg_social_size ) . 'px;}';
			}

			// Widget
			$mhbg_widget_margin             = get_theme_mod( 'goso_mhbg_widget_margin' );
			$mhbgwidget_heading_lowcase     = get_theme_mod( 'goso_mhbgwidget_heading_lowcase' );
			$mhbgwidget_heading_size        = get_theme_mod( 'goso_mhbgwidget_heading_size' );
			$mhbgwidget_heading_image_9     = get_theme_mod( 'goso_mhbgwidget_heading_image_9' );
			$mhbgwidget_heading9_repeat     = get_theme_mod( 'goso_mhbgwidget_heading9_repeat' );
			$mhbgwidget_remove_border_outer = get_theme_mod( 'goso_mhbgwidget_remove_border_outer' );
			$mhbgwidget_remove_arrow_down   = get_theme_mod( 'goso_mhbgwidget_remove_arrow_down' );

			if ( $mhbg_widget_margin ) {
				echo '.goso-menu-hbg .goso-sidebar-content .widget{ margin-bottom: ' . esc_attr( $mhbg_widget_margin ) . 'px; }';
				echo '.goso-menu-hbg-widgets2{ margin-top: ' . esc_attr( $mhbg_widget_margin ) . 'px; }';
			}

			if ( $mhbgwidget_heading_lowcase ) {
				echo '.goso-menu-hbg .goso-sidebar-content .goso-border-arrow .inner-arrow{ text-transform: none; }';
			}

			if ( $mhbgwidget_heading_size ) {
				echo '.goso-menu-hbg .goso-sidebar-content .goso-border-arrow .inner-arrow { font-size: ' . $mhbgwidget_heading_size . 'px; }';
			}
			if ( $mhbgwidget_heading_image_9 ) {
				echo '.goso-menu-hbg .goso-sidebar-content.style-8 .goso-border-arrow .inner-arrow { background-image: url(' . $mhbgwidget_heading_image_9 . '); }';
			}
			if ( $mhbgwidget_heading9_repeat ) {
				echo '.goso-menu-hbg .goso-sidebar-content.style-8 .goso-border-arrow .inner-arrow{ background-repeat: ' . $mhbgwidget_heading9_repeat . '; background-size: auto; }';
			}
			if ( $mhbgwidget_remove_border_outer ) {
				echo '.goso-menu-hbg .goso-sidebar-content .goso-border-arrow:after { content: none; display: none; }
		.goso-menu-hbg .goso-sidebar-content .widget-title{ margin-left: 0; margin-right: 0; margin-top: 0; }
		.goso-menu-hbg .goso-sidebar-content .goso-border-arrow:before{ bottom: -6px; border-width: 6px; margin-left: -6px; }';
			}

			if ( $mhbgwidget_remove_arrow_down ) {
				echo '.goso-menu-hbg .goso-sidebar-content .goso-border-arrow:before, .goso-sidebar-content.style-2 .goso-border-arrow:after { content: none; display: none; }';
			}

			$mhwidget_heading_bg           = get_theme_mod( 'goso_mhwidget_heading_bg' );
			$mhwidget_heading_outer_bg     = get_theme_mod( 'goso_mhwidget_heading_outer_bg' );
			$mhwidget_heading_bcolor       = get_theme_mod( 'goso_mhwidget_heading_bcolor' );
			$mhwidget_heading_binner_color = get_theme_mod( 'goso_mhwidget_heading_binner_color' );
			$mhwidget_heading_bcolor5      = get_theme_mod( 'goso_mhwidget_heading_bcolor5' );
			$mhwidget_heading_bcolor7      = get_theme_mod( 'goso_mhwidget_heading_bcolor7' );
			$mhwidget_bordertop_color10    = get_theme_mod( 'goso_mhwidget_bordertop_color10' );
			$mhwidget_shapes_color         = get_theme_mod( 'goso_mhwidget_shapes_color' );
			$mhwidget_bgstyle15            = get_theme_mod( 'goso_mhwidget_bgstyle15' );
			$mhwidget_iconstyle15          = get_theme_mod( 'goso_mhwidget_iconstyle15' );
			$mhwidget_cllines              = get_theme_mod( 'goso_mhwidget_cllines' );
			$mhwidget_heading_color        = get_theme_mod( 'goso_mhwidget_heading_color' );

			if ( $mhwidget_heading_bg ) {
				echo '.goso-menu-hbg .goso-sidebar-content.style-11 .goso-border-arrow .inner-arrow, .goso-menu-hbg .goso-sidebar-content.style-12 .goso-border-arrow .inner-arrow, .goso-menu-hbg .goso-sidebar-content.style-14 .goso-border-arrow .inner-arrow:before, .goso-menu-hbg .goso-sidebar-content.style-13 .goso-border-arrow .inner-arrow, .goso-menu-hbg .goso-sidebar-content .goso-border-arrow .inner-arrow, .goso-menu-hbg .goso-sidebar-content.style-15 .goso-border-arrow .inner-arrow{ background-color: ' . $mhwidget_heading_bg . '; }';
				echo '.goso-menu-hbg .goso-sidebar-content.style-2 .goso-border-arrow:after{ border-top-color: ' . $mhwidget_heading_bg . '; }';
			}
			if ( $mhwidget_heading_outer_bg ) {
				echo '.goso-menu-hbg .goso-sidebar-content .goso-border-arrow:after { background-color: ' . $mhwidget_heading_bg . '; }';
			}
			if ( $mhwidget_heading_bcolor ) {
				echo '.goso-menu-hbg .goso-sidebar-content .goso-border-arrow .inner-arrow,';
				echo '.goso-menu-hbg .goso-sidebar-content.style-4 .goso-border-arrow .inner-arrow:before,';
				echo '.goso-menu-hbg .goso-sidebar-content.style-4 .goso-border-arrow .inner-arrow:after,';
				echo '.goso-menu-hbg .goso-sidebar-content.style-5 .goso-border-arrow,';
				echo '.goso-menu-hbg .goso-sidebar-content.style-7 .goso-border-arrow,';
				echo '.goso-menu-hbg .goso-sidebar-content.style-9 .goso-border-arrow { border-color: ' . $mhwidget_heading_bcolor . '; }';
				echo '.goso-menu-hbg .goso-sidebar-content .goso-border-arrow:before { border-top-color: ' . $mhwidget_heading_bcolor . '; }';
				echo '.goso-menu-hbg .goso-sidebar-content.style-16 .goso-border-arrow:after{ background-color: ' . $mhwidget_heading_bcolor . '; }';
			}
			if ( $mhwidget_heading_binner_color ) {
				echo '.goso-menu-hbg .goso-sidebar-content .goso-border-arrow:after { border-color: ' . $mhwidget_heading_binner_color . '; }';
			}
			if ( $mhwidget_heading_bcolor5 ) {
				echo '.goso-menu-hbg .goso-sidebar-content.style-5 .goso-border-arrow{ border-color: ' . $mhwidget_heading_bcolor5 . '; }';
				echo '.goso-menu-hbg .goso-sidebar-content.style-12 .goso-border-arrow, .goso-menu-hbg .goso-sidebar-content.style-10 .goso-border-arrow, .goso-menu-hbg .goso-sidebar-content.style-5 .goso-border-arrow .inner-arrow{ border-bottom-color: ' . $mhwidget_heading_bcolor5 . '; }';
			}
			if ( $mhwidget_heading_bcolor7 ) {
				echo '.goso-menu-hbg .goso-sidebar-content.style-7 .goso-border-arrow .inner-arrow:before,.goso-menu-hbg .goso-sidebar-content.style-9 .goso-border-arrow .inner-arrow:before{ background-color: ' . $mhwidget_heading_bcolor7 . '; }';
			}
			if ( $mhwidget_bordertop_color10 ) {
				echo '.goso-menu-hbg .goso-sidebar-content.style-10 .goso-border-arrow{ border-top-color: ' . $mhwidget_bordertop_color10 . '; }';
			}
			if ( $mhwidget_shapes_color ) {
				echo '.goso-menu-hbg .goso-sidebar-content.style-11 .goso-border-arrow .inner-arrow:after,.goso-menu-hbg .goso-sidebar-content.style-11 .goso-border-arrow .inner-arrow:before{ border-top-color: ' . $mhwidget_shapes_color . '; }';
				echo '.goso-menu-hbg .goso-sidebar-content.style-12 .goso-border-arrow .inner-arrow:before,.goso-menu-hbg .goso-sidebar-content.style-12.pcalign-center .goso-border-arrow .inner-arrow:after, .goso-menu-hbg .goso-sidebar-content.style-12.pcalign-right .goso-border-arrow .inner-arrow:after{ border-bottom-color: ' . $mhwidget_shapes_color . '; }';
				echo '.goso-menu-hbg .goso-sidebar-content.style-13.pcalign-center .goso-border-arrow .inner-arrow:after, .goso-menu-hbg .goso-sidebar-content.style-13.pcalign-left .goso-border-arrow .inner-arrow:after{ border-right-color: ' . $mhwidget_shapes_color . '; }';
				echo '.goso-menu-hbg .goso-sidebar-content.style-13.pcalign-center .goso-border-arrow .inner-arrow:before, .goso-menu-hbg .goso-sidebar-content.style-13.pcalign-right .goso-border-arrow .inner-arrow:before{ border-left-color: ' . $mhwidget_shapes_color . '; }';
			}
			if ( $mhwidget_bgstyle15 ) {
				echo '.goso-menu-hbg .goso-sidebar-content.style-15 .goso-border-arrow:before{ background-color: ' . $mhwidget_bgstyle15 . '; }';
			}
			if ( $mhwidget_iconstyle15 ) {
				echo '.goso-menu-hbg .goso-sidebar-content.style-15 .goso-border-arrow:after{ color: ' . $mhwidget_iconstyle15 . '; }';
			}
			if ( $mhwidget_cllines ) {
				echo '.goso-menu-hbg .goso-sidebar-content.style-18 .goso-border-arrow:after{ color: ' . $mhwidget_cllines . '; }';
			}
			if ( $mhwidget_heading_color ) {
				echo '.goso-menu-hbg .goso-sidebar-content .goso-border-arrow .inner-arrow { color: ' . $mhwidget_heading_color . '; }';
			}
		endif; /* End check if enable HBG menu or Vertical Nav */ ?>
		<?php if ( get_theme_mod( 'goso_woo_paging_align' ) == 'left' ): ?>
            .woocommerce nav.woocommerce-pagination { text-align: left; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_woo_paging_align' ) == 'right' ): ?>
            .woocommerce nav.woocommerce-pagination { text-align: right; }
		<?php endif; ?>

		<?php
		// RDGP
		$gprd_bgcolor     = get_theme_mod( 'goso_gprd_bgcolor' );
		$gprd_color       = get_theme_mod( 'goso_gprd_color' );
		$gprd_btn_color   = get_theme_mod( 'goso_gprd_btn_color' );
		$gprd_btn_bgcolor = get_theme_mod( 'goso_gprd_btn_bgcolor' );
		$gprd_border      = get_theme_mod( 'goso_gprd_border' );

		$rdgoso_css = '';
		if ( $gprd_bgcolor ) {
			$rdgoso_css .= '.goso-wrap-gprd-law .goso-gdrd-show,.goso-gprd-law{ background-color: ' . $gprd_bgcolor . ' } ';
		}
		if ( $gprd_color ) {
			$rdgoso_css .= '.goso-wrap-gprd-law .goso-gdrd-show,.goso-gprd-law{ color: ' . $gprd_color . ' } ';
		}
		if ( $gprd_btn_color ) {
			$rdgoso_css .= '.goso-gprd-law .goso-gprd-accept{ color: ' . $gprd_btn_color . ' }';
		}
		if ( $gprd_btn_bgcolor ) {
			$rdgoso_css .= '.goso-gprd-law .goso-gprd-accept{ background-color: ' . $gprd_btn_bgcolor . ' }';
		}
		if ( $gprd_border ) {
			$rdgoso_css .= '.goso-gprd-law{ border-top: 2px solid ' . $gprd_border . ' } ';
			$rdgoso_css .= '.goso-wrap-gprd-law .goso-gdrd-show{ border: 1px solid ' . $gprd_border . '; border-bottom: 0; } ';
		}
		echo $rdgoso_css;
		?>
		<?php if ( get_theme_mod( 'goso_section_searchform_form_bg' ) ) : ?>
            .header-search-style-showup .show-search{ background-color: <?php echo get_theme_mod( 'goso_section_searchform_form_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_section_searchform_top_border_cl' ) ) : ?>
            .header-search-style-showup .show-search:before{ border-bottom-color: <?php echo get_theme_mod( 'goso_section_searchform_top_border_cl' ); ?>; }
            .header-search-style-showup .show-search{ border-color: <?php echo get_theme_mod( 'goso_section_searchform_top_border_cl' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_section_searchform_text_bg' ) ) : ?>
            .header-search-style-showup .show-search form.pc-searchform input.search-input{ background-color: <?php echo get_theme_mod( 'goso_section_searchform_text_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_section_searchform_text_cl' ) ) : ?>
            .header-search-style-showup .show-search form.pc-searchform input.search-input{ color: <?php echo get_theme_mod( 'goso_section_searchform_text_cl' ); ?>; }
            .header-search-style-showup .show-search form.pc-searchform input.search-input::placeholder{ opacity: 1; color: <?php echo get_theme_mod( 'goso_section_searchform_text_cl' ); ?>; }
            .header-search-style-showup .show-search form.pc-searchform input.search-input:-ms-input-placeholder{ color: <?php echo get_theme_mod( 'goso_section_searchform_text_cl' ); ?>; }
            .header-search-style-showup .show-search form.pc-searchform input.search-input::-ms-input-placeholder{ color: <?php echo get_theme_mod( 'goso_section_searchform_text_cl' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_section_searchform_bd_cl' ) ) : ?>
            .header-search-style-showup .sticky-wrapper:not(.is-sticky) .show-search form.pc-searchform input.search-input, .header-search-style-showup .sticky-wrapper.is-sticky .show-search form.pc-searchform input.search-input, .header-search-style-showup .show-search form.pc-searchform input.search-input{ border-color: <?php echo get_theme_mod( 'goso_section_searchform_bd_cl' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_section_searchform_btn_bg' ) ) : ?>
            .header-search-style-showup .show-search form.pc-searchform .searchsubmit{ background-color: <?php echo get_theme_mod( 'goso_section_searchform_btn_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_section_searchform_btn_hv_bg' ) ) : ?>
            .header-search-style-showup .show-search form.pc-searchform .searchsubmit:hover{ background-color: <?php echo get_theme_mod( 'goso_section_searchform_btn_hv_bg' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_section_searchform_btn_cl' ) ) : ?>
            .header-search-style-showup .show-search form.pc-searchform .searchsubmit{ color: <?php echo get_theme_mod( 'goso_section_searchform_btn_cl' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_section_searchform_btn_hv_cl' ) ) : ?>
            .header-search-style-showup .show-search form.pc-searchform .searchsubmit:hover{ color: <?php echo get_theme_mod( 'goso_section_searchform_btn_hv_cl' ); ?>; }
		<?php endif; ?>
		<?php if ( get_theme_mod( 'goso_custom_css' ) ) : ?>
			<?php echo get_theme_mod( 'goso_custom_css' ); ?>
		<?php endif; ?>
		<?php

		$social_share_style = get_theme_mod( 'goso_single_style_cscount' );
		$snew_bgcolor       = get_theme_mod( 'goso_single_newshare_bgcolor' );
		$snew_bghcolor      = get_theme_mod( 'social_bghcolor' );
		$snew_color         = get_theme_mod( 'goso_single_newshare_color' );
		$snew_hcolor        = get_theme_mod( 'goso_single_newshare_hcolor' );
		$snew_bcolor        = get_theme_mod( 'goso_single_newshare_bcolor' );
		$snew_hbcolor       = get_theme_mod( 'goso_single_newshare_hbcolor' );
		$splus_color        = get_theme_mod( 'goso_single_splus_color' );
		$splus_hcolor       = get_theme_mod( 'goso_single_splus_hcolor' );
		$splus_bgcolor      = get_theme_mod( 'goso_single_splus_bgcolor' );
		$splus_hbgcolor    = get_theme_mod( 'goso_single_splus_hbgcolor' );

		if ( $splus_color ) {
			echo 'a.post-share-expand,.black-ver .post-share-expand i,.tags-share-box.tags-share-box-2_3 .post-share-expand,.goso-social-colored .post-share-item.post-share-expand i, .tags-share-box.tags-share-box-s2 .post-share-item.post-share-expand i{color:' . $splus_color . '}';
		}

		if ( $splus_hcolor ) {
			echo 'a.post-share-expand:hover,.black-ver .post-share-expand:hover i,.tags-share-box.tags-share-box-2_3 .post-share-expand:hover,.goso-social-colored .post-share-item.post-share-expand:hover i,.tags-share-box.tags-share-box-s2 .post-share-item.post-share-expand:hover i{color:' . $splus_hcolor . '}';
		}

		if ( $splus_bgcolor ) {
			echo 'a.post-share-expand,.black-ver .post-share-expand,.black-ver .post-share-expand i,.tags-share-box.tags-share-box-2_3 .post-share-expand,.goso-social-colored .post-share-item.post-share-expand i,.tags-share-box.tags-share-box-s2 .post-share-item.post-share-expand{background-color:' . $splus_bgcolor . '}';
		}

		if ( $splus_hbgcolor ) {
			echo 'a.post-share-expand:hover,.black-ver .post-share-expand:hover,.black-ver .post-share-expand:hover i,.tags-share-box.tags-share-box-2_3 .post-share-expand:hover,.goso-social-colored .post-share-item.post-share-expand:hover i, .tags-share-box.tags-share-box-s2 .post-share-item.post-share-expand:hover{background-color:' . $splus_hbgcolor . '}';
		}

		if ( $snew_bgcolor && in_array( $social_share_style, [
				's1',
				's3',
				'n14',
				'n15',
				'n16',
				'n17',
				'n18',
				'n19',
				'n20',
				'n21',
				'n22',
				'n23'
			] ) ) {
			echo 'a.post-share-item,.black-ver .post-share-item,.black-ver .post-share-item i{background-color:' . $snew_bgcolor . '}';
		}

		if ( $snew_bghcolor && in_array( $social_share_style, [
				's1',
				's3',
				'n14',
				'n15',
				'n16',
				'n17',
				'n18',
				'n19',
				'n20',
				'n21',
				'n22',
				'n23'
			] ) ) {
			echo 'a.post-share-item:hover,.black-ver .post-share-item:hover,.black-ver .post-share-item:hover i{background-color:' . $snew_bghcolor . '}';
		}

		if ( $snew_color && in_array( $social_share_style, [
				's1',
				's3',
				'n14',
				'n15',
				'n17',
				'n18',
				'n19',
				'n20',
				'n21',
				'n22',
				'n23'
			] ) ) {
			echo 'a.post-share-item,.black-ver .post-share-item i,.show-txt.post-share a .dt-share{color:' . $snew_color . '}';
		}

		if ( $snew_hcolor && in_array( $social_share_style, [
				's1',
				's3',
				'n14',
				'n15',
				'n17',
				'n18',
				'n19',
				'n20',
				'n21',
				'n22',
				'n23'
			] ) ) {
			echo 'a.post-share-item:hover,.black-ver .post-share-item:hover i,.show-txt.post-share a:hover .dt-share{color:' . $snew_hcolor . '}';
		}

		if ( $snew_bcolor && in_array( $social_share_style, [
				's1',
				's3',
				'n16',
				'n17',
				'n18',
				'n19',
				'n20',
				'n21',
				'n22',
				'n23'
			] ) ) {
			echo 'a.post-share-item,.pcnew-share.goso-icon-full.border-style .post-share-item i{border-color:' . $snew_bcolor . '}';
		}

		if ( $snew_hbcolor && in_array( $social_share_style, [
				's1',
				's3',
				'n16',
				'n17',
				'n18',
				'n19',
				'n20',
				'n21',
				'n22',
				'n23'
			] ) ) {
			echo 'a.post-share-item:hover,.pcnew-share.goso-icon-full.border-style .post-share-item:hover i{border-color:' . $snew_hbcolor . '}';
		}

		do_action( 'authow_theme/custom_css' );
		if ( is_page() ) {
			$page_custom_css = get_post_meta( get_the_ID(), 'goso_pmeta_page_custom_css', true );
			if ( isset( $page_custom_css['page_custom_css'] ) && $page_custom_css['page_custom_css'] ) {
				echo $page_custom_css['page_custom_css'];
			}
			$page_background       = get_post_meta( get_the_ID(), 'goso_pmeta_page_background', true );
			$css_page_wapper       = '';
			$page_background_color = '';

			if ( isset( $page_background['page_wrap_bgcolor'] ) && $page_background['page_wrap_bgcolor'] ) {
				$css_page_wapper       .= 'background-color:' . esc_attr( $page_background['page_wrap_bgcolor'] ) . ' !important;';
				$page_background_color = esc_attr( $page_background['page_wrap_bgcolor'] );
			}
			if ( isset( $page_background['page_wrap_bgimg'] ) && $page_background['page_wrap_bgimg'] ) {
				$bgimg           = wp_get_attachment_url( $page_background['page_wrap_bgimg'] );
				$css_page_wapper .= 'background-image: url(' . esc_url( $bgimg ) . ') !important;';
			}
			if ( isset( $page_background['page_wrap_bg_pos'] ) && $page_background['page_wrap_bg_pos'] ) {
				$css_page_wapper .= 'background-position:' . esc_attr( str_replace( '_', ' ', $page_background['page_wrap_bg_pos'] ) ) . ' !important;';
			}
			if ( isset( $page_background['page_wrap_bg_size'] ) && $page_background['page_wrap_bg_size'] ) {
				$css_page_wapper .= 'background-size:' . esc_attr( $page_background['page_wrap_bg_size'] ) . ' !important;';
			}
			if ( isset( $page_background['page_wrap_bg_repeat'] ) && $page_background['page_wrap_bg_repeat'] ) {
				$css_page_wapper .= 'background-repeat:' . esc_attr( $page_background['page_wrap_bg_repeat'] ) . ' !important;';
			}
			?>
			<?php if ( $css_page_wapper ): ?>
                .wrapper-boxed, .wrapper-boxed.enable-boxed{<?php echo $css_page_wapper; ?> }
			<?php endif; ?>
			<?php if ( $page_background_color ): ?>
                .goso-single-style-7:not( .goso-single-pheader-noimg ).goso_sidebar #main article.post, .goso-single-style-3:not( .goso-single-pheader-noimg ).goso_sidebar #main article.post { background-color: var(--pcbg-cl); }
                @media only screen and (max-width: 767px){ .standard-post-special_wrapper { background: <?php echo $page_background_color; ?>; } }
                .home-pupular-posts-title span, .goso-post-box-meta.goso-post-box-grid .goso-post-share-box, .goso-pagination.goso-ajax-more a.goso-ajax-more-button, .woocommerce .woocommerce-product-search input[type="search"], .overlay-post-box-meta, .widget ul.side-newsfeed li.featured-news2 .side-item .side-item-text, .widget select, .widget select option, .woocommerce .woocommerce-error, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message, #goso-demobar, #goso-demobar .style-toggle,
                .grid-overlay-meta .grid-header-box, .header-standard.standard-overlay-meta{ background-color: <?php echo $page_background_color; ?>; }
                .goso-grid .list-post.list-boxed-post .item > .thumbnail:before{ border-right-color: <?php echo $page_background_color; ?>; }
                .goso-grid .list-post.list-boxed-post:nth-of-type(2n+2) .item > .thumbnail:before{ border-left-color: <?php echo $page_background_color; ?>; }
			<?php endif; ?>
		<?php } ?>
		<?php
	}
endif;


add_action( 'wp_head', 'gosodesign_customizer_css' );
?>
