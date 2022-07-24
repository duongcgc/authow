<?php
add_filter( 'body_class', function ( $class ) {
	$class[] = 'pccustom-template-enable';

	return $class;
} );
get_header(); ?>
<div class="container-archive-page">
    <div id="main" class="goso-custom-archive-template">
		<?php
		$post_name = goso_should_render_archive_template();
		$post_data = get_page_by_path( $post_name, OBJECT, 'archive-template' );
		if ( ! empty( $post_data ) && isset( $post_data->ID ) ) {
			$frontend = \Elementor\Plugin::$instance->frontend;

			add_action( 'wp_enqueue_scripts', array( $frontend, 'enqueue_styles' ) );
			add_action( 'wp_head', array( $frontend, 'print_fonts_links' ) );
			add_action( 'wp_footer', array( $frontend, 'wp_footer' ) );

			add_action( 'wp_enqueue_scripts', array( $frontend, 'register_scripts' ), 5 );
			add_action( 'wp_enqueue_scripts', array( $frontend, 'register_styles' ), 5 );

			$html = $frontend->get_builder_content( $post_data->ID );

			add_filter( 'get_the_excerpt', array( $frontend, 'start_excerpt_flag' ), 1 );
			add_filter( 'get_the_excerpt', array( $frontend, 'end_excerpt_flag' ), 20 );

			echo $html;
		}
		?>
    </div>
</div>
<?php get_footer(); ?>
