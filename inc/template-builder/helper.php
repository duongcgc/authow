<?php
if ( ! function_exists( 'goso_should_render_archive_template' ) ) {
	function goso_should_render_archive_template() {
		$render = false;

		$cat_pages     = get_theme_mod( 'goso_archive_cat_template' );
		$tag_pages     = get_theme_mod( 'goso_archive_tag_template' );
		$author_pages  = get_theme_mod( 'goso_archive_author_template' );
		$date_pages    = get_theme_mod( 'goso_archive_date_template' );
		$search_paeges = get_theme_mod( 'goso_archive_search_template' );

		if ( is_category() ) {
			$cat_data          = get_queried_object();
			$cat_id            = $cat_data->term_id;
			$custom_cat        = get_option( "category_$cat_id" );
			$alayout_save_slug = isset( $custom_cat['goso_archive_layout'] ) ? $custom_cat['goso_archive_layout'] : '';
			$cat_pages         = $alayout_save_slug ? $alayout_save_slug : $cat_pages;

			if ( $cat_pages ) {
				$render = $cat_pages;
			}
		}

		if ( $tag_pages && is_tag() ) {
			$render = $tag_pages;
		}

		if ( $author_pages && is_author() ) {
			$render = $author_pages;
		}

		if ( $date_pages && ( is_date() || is_day() || is_month() || is_year() ) ) {
			$render = $date_pages;
		}

		if ( $search_paeges && is_search() ) {
			$render = $search_paeges;
		}

		return $render;
	}
}

if ( ! function_exists( 'goso_should_render_single_template' ) ) {
	function goso_should_render_single_template() {
		$render = false;

		if ( is_singular('post')  ) {
			$customize_template = get_theme_mod( 'goso_single_custom_template' );
			$post_template      = get_post_meta( get_the_ID(), 'goso_single_builder_layout', true );
			$template           = $post_template ? $post_template : $customize_template;
			$render             = ! empty( $template ) ? $template : false;
		}

		return $render;
	}
}
if ( ! function_exists( 'goso_is_builder_template' ) ) {
	function goso_is_builder_template(): bool {
		global $wp_query;
		$post_type = get_post( $wp_query->query['p'] )->post_type;

		return ( $post_type == 'custom-post-template' || $post_type == 'archive-template' );
	}
}
