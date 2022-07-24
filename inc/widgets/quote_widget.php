<?php
/**
 * Block quote widget in sidebar
 * Display your quote on footer or sidebar
 *
 * @package Wordpress
 * @since   1.0
 */

add_action( 'widgets_init', 'goso_quote_load_widget' );

function goso_quote_load_widget() {
	register_widget( 'goso_quote_widget' );
}

if ( ! class_exists( 'goso_quote_widget' ) ) {
	class goso_quote_widget extends WP_Widget {

		/**
		 * Widget setup.
		 */
		function __construct() {
			/* Widget settings. */
			$widget_ops = array(
				'classname'   => 'goso_quote_widget',
				'description' => esc_html__( 'A widget that displays an quote widget on your sidebar', 'authow' )
			);

			/* Widget control settings. */
			$control_ops = array( 'id_base' => 'goso_quote_widget' );

			/* Create the widget. */
			global $wp_version;
			if ( 4.3 > $wp_version ) {
				$this->WP_Widget( 'goso_quote_widget', goso_get_theme_name('.Authow',true).esc_html__( 'Quote', 'authow' ), $widget_ops, $control_ops );
			} else {
				parent::__construct( 'goso_quote_widget', goso_get_theme_name('.Authow',true).esc_html__( 'Quote', 'authow' ), $widget_ops, $control_ops );
			}
		}

		/**
		 * How to display the widget on the screen.
		 */
		function widget( $args, $instance ) {
			extract( $args );

			/* Our variables from the widget settings. */
			$title       = isset( $instance['title'] ) ? $instance['title'] : '';
			$title       = apply_filters( 'widget_title', $title );
			$description = isset( $instance['description'] ) ? $instance['description'] : '';

			/* Before widget (defined by themes). */
			echo ent2ncr( $before_widget );

			/* Display the widget title if one was input (before and after defined by themes). */
			if ( $title ) {
				echo ent2ncr( $before_title ) . $title . ent2ncr( $after_title );
			}

			?>

			<?php if ( $description ) : ?>
                <div class="quote-widget">
					<?php goso_fawesome_icon( 'fas fa-quote-left' ); ?>
                    <p><?php echo do_shortcode( $description ); ?></p>
                </div>
			<?php endif; ?>

			<?php

			/* After widget (defined by themes). */
			echo ent2ncr( $after_widget );
		}

		/**
		 * Update the widget settings.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$data_instance = $this->authow_widget_defaults();

			foreach ( $data_instance as $data => $value ) {
				$instance[ $data ] = ! empty( $new_instance[ $data ] ) ? $new_instance[ $data ] : '';
			}

			return $instance;
		}

		public function authow_widget_defaults() {
			$defaults = array( 'title' => 'Quote', 'description' => '' );

			return $defaults;
		}


		function form( $instance ) {

			/* Set up some default widget settings. */
			$defaults       = $this->authow_widget_defaults();
			$instance       = wp_parse_args( (array) $instance, $defaults );
			$instance_title = $instance['title'] ? str_replace( '"', '&quot;', $instance['title'] ) : '';
			?>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'authow' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                       value="<?php echo $instance_title; ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'Quote content text:', 'authow' ); ?></label>
                <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"
                          name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"
                          rows="6"><?php echo esc_textarea( $instance['description'] ); ?></textarea>
            </p>


			<?php
		}
	}
}

?>
