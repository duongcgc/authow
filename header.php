<?php
/**
 * The Header for our theme
 *
 * @package    WordPress
 * @since      1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
	<?php if ( get_theme_mod( 'goso_favicon' ) ) : ?>
        <link rel="shortcut icon" href="<?php echo esc_url( get_theme_mod( 'goso_favicon' ) ); ?>"
              type="image/x-icon"/>
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_theme_mod( 'goso_favicon' ) ); ?>">
	<?php endif; ?>
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed"
          href="<?php bloginfo( 'rss2_url' ); ?>"/>
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?> Atom Feed"
          href="<?php bloginfo( 'atom_url' ); ?>"/>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
    <!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php /* body open action */
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}
?>
<?php
if ( get_theme_mod( 'goso_custom_code_after_body_tag' ) ):
	echo do_shortcode( get_theme_mod( 'goso_custom_code_after_body_tag' ) );
endif;
?>
<?php
$goso_hide_header = $show_page_title = false;
if ( is_page() ) {
	$goso_hide_header = get_post_meta( get_the_ID(), 'goso_page_hide_header', true );

	$show_page_title  = get_theme_mod( 'goso_pheader_show' );
	$goso_page_title = get_post_meta( get_the_ID(), 'goso_pmeta_page_title', true );

	$pheader_show = isset( $goso_page_title['pheader_show'] ) ? $goso_page_title['pheader_show'] : '';
	if ( 'enable' == $pheader_show ) {
		$show_page_title = true;
	} elseif ( 'disable' == $pheader_show ) {
		$show_page_title = false;
	}
} else if ( is_single() ) {
	$goso_hide_header = goso_is_hide_header();
}

/**
 * Get header layout in your customizer to change header layout
 *
 * @author GosoDesign
 */
$header_layout = goso_authow_get_header_layout();
$menu_style    = get_theme_mod( 'goso_header_menu_style' ) ? get_theme_mod( 'goso_header_menu_style' ) : 'menu-style-1';

$header_class = $header_layout;
if ( $header_layout == 'header-9' ) {
	$header_class = 'header-6 header-9';
}

if ( get_theme_mod( 'goso_vertical_nav_show' ) ) {
	get_template_part( 'template-parts/menu-hamburger' );
}

$class_wrapper_boxed = 'wrapper-boxed header-style-' . esc_attr( $header_layout );
if ( get_theme_mod( 'goso_body_boxed_layout' ) && ! get_theme_mod( 'goso_vertical_nav_show' ) ) {
	$class_wrapper_boxed .= ' enable-boxed';
}
if ( get_theme_mod( 'goso_enable_dark_layout' ) ) {
	$class_wrapper_boxed .= ' dark-layout-enabled';
}
if ( $goso_hide_header ) {
	$class_wrapper_boxed .= ' goso-page-hide-header';
}
if ( get_theme_mod( 'goso_header_logo_mobile_center' ) ) {
	$class_wrapper_boxed .= ' goso-hlogo-center';
}

$header_builder      = function_exists( 'goso_check_theme_mod' ) && goso_check_theme_mod( 'goso_enable_builder' ) ? goso_check_theme_mod( 'goso_enable_builder' ) : '';
$header_search_style = ! empty( $header_builder ) ? goso_get_builder_mod( 'goso_header_search_style', 'showup' ) : get_theme_mod( 'goso_topbar_search_style', 'default' );
$class_wrapper_boxed .= ' header-search-style-' . esc_attr( $header_search_style );
$custom_header_class = $header_builder ? ' pc-wrapbuilder-header' : '';
?>
<div class="<?php echo esc_attr( $class_wrapper_boxed ); ?>">
	<?php
	if ( ! $goso_hide_header ) {

		echo '<div class="goso-header-wrap' . $custom_header_class . '">';

		get_template_part( 'template-parts/header/top-instagram' );

		if ( ! empty( $header_builder ) ) {

			if ( is_singular( 'goso-block' ) ) {
				return;
			}

			load_template( get_template_directory() . '/inc/builder/template/desktop-builder.php' );

		} else {

			if ( get_theme_mod( 'goso_top_bar_show' ) ) {
				get_template_part( 'inc/modules/topbar' );
			}

			get_template_part( 'template-parts/header/' . $header_layout );
		}
		echo '</div>';

		if ( ! is_customize_preview() || ! isset( $_GET['layout_id'] ) ) {

			get_template_part( 'template-parts/header/mailchimp-below-header' );

			if ( is_home() || get_theme_mod( 'goso_featured_slider_all_page' ) ) {
				get_template_part( 'template-parts/header/feature-slider' );
			}

			if ( ( ( is_home() || is_front_page() ) && get_theme_mod( 'goso_signup_display_homepage' ) ) || ! get_theme_mod( 'goso_signup_display_homepage' ) ) {
				get_template_part( 'template-parts/header/mailchimp-below-header2' );
			}
		}
	}
	if ( $show_page_title && ! is_home() && ! is_front_page() ) {
		get_template_part( 'template-parts/page-header' );
	}
	?>
