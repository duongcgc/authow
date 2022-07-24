<?php
/**
 * About me widget
 * Display your information on footer or sidebar
 *
 * @package Wordpress
 * @since   1.0
 */

add_action( 'widgets_init', 'goso_instagram_feed_widget' );

if ( ! function_exists( 'goso_instagram_feed_widget' ) ) {
	function goso_instagram_feed_widget() {
		register_widget( 'Goso_Instagram_Feed_Widget' );
	}
}

if ( ! class_exists( 'Goso_Instagram_Feed_Widget' ) ) {
	class Goso_Instagram_Feed_Widget extends WP_Widget {

		protected $default;

		function __construct() {
			$this->default = array(
				'title'            => __( 'Instagram', 'authow' ),
				'template'         => 'thumbs-no-border',
				'images_link'      => 'image_url',
				'custom_url'       => '',
				'orderby'          => 'rand',
				'images_number'    => 9,
				'columns'          => 3,
				'refresh_hour'     => 12,
				'image_size'       => 'jr_insta_square',
				'image_link_rel'   => '',
				'image_link_class' => '',
				'controls'         => 'prev_next',
				'caption_words'    => 20,
				'slidespeed'       => 7000,
				'description'      => array( 'username', 'time', 'caption' ),
			);

			$widget_ops  = array(
				'classname'   => 'goso-insta-slider',
				'description' => esc_html__( 'A widget that displays thumbnails or a slider with instagram images', 'authow' )
			);
			$control_ops = array( 'id_base' => 'goso-insta-slider' );

			global $wp_version;
			if ( 4.3 > $wp_version ) {
				$this->WP_Widget( 'goso-insta-slider', goso_get_theme_name( '.Authow', true ) . ' ' . esc_html__( 'Instagram Feed', 'authow' ), $widget_ops, $control_ops );
			} else {
				parent::__construct( 'goso-insta-slider', goso_get_theme_name( '.Authow', true ) . ' ' . esc_html__( 'Instagram Feed', 'authow' ), $widget_ops, $control_ops );
			}
		}

		function widget( $args, $instance ) {
			$instance = wp_parse_args( $instance, $this->default );
			extract( $args );

			/* Before widget (defined by themes). */
			echo ent2ncr( $before_widget );

			/* Display the widget title if one was input (before and after defined by themes). */
			$title = apply_filters( 'widget_title', $instance['title'] );
			if ( $title ) {
				echo ent2ncr( $before_title ) . $title . ent2ncr( $after_title );
			}

			Goso_Instagram_Feed::display_images( $instance );

			/* After widget (defined by themes). */
			echo ent2ncr( $after_widget );
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title']            = isset( $new_instance['title'] ) && $new_instance['title'] ? $new_instance['title'] : '';
			$instance['template']         = isset( $new_instance['template'] ) && $new_instance['template'] ? $new_instance['template'] : '';
			$instance['images_link']      = isset( $new_instance['images_link'] ) && $new_instance['images_link'] ? $new_instance['images_link'] : '';
			$instance['custom_url']       = isset( $new_instance['custom_url'] ) && $new_instance['custom_url'] ? $new_instance['custom_url'] : '';
			$instance['orderby']          = isset( $new_instance['orderby'] ) && $new_instance['orderby'] ? $new_instance['orderby'] : '';
			$instance['images_number']    = isset( $new_instance['images_number'] ) && $new_instance['images_number'] ? $new_instance['images_number'] : '';
			$instance['columns']          = isset( $new_instance['columns'] ) && $new_instance['columns'] ? $new_instance['columns'] : '';
			$instance['refresh_hour']     = isset( $new_instance['refresh_hour'] ) && $new_instance['refresh_hour'] ? $new_instance['refresh_hour'] : '';
			$instance['image_size']       = isset( $new_instance['image_size'] ) && $new_instance['image_size'] ? $new_instance['image_size'] : '';
			$instance['image_link_rel']   = isset( $new_instance['image_link_rel'] ) && $new_instance['image_link_rel'] ? $new_instance['image_link_rel'] : '';
			$instance['image_link_class'] = isset( $new_instance['image_link_class'] ) && $new_instance['image_link_class'] ? $new_instance['image_link_class'] : '';
			$instance['controls']         = isset( $new_instance['controls'] ) && $new_instance['controls'] ? $new_instance['controls'] : '';
			$instance['caption_words']    = isset( $new_instance['caption_words'] ) && $new_instance['caption_words'] ? $new_instance['caption_words'] : '';
			$instance['slidespeed']       = isset( $new_instance['slidespeed'] ) && $new_instance['slidespeed'] ? $new_instance['slidespeed'] : '';
			$instance['description']      = isset( $new_instance['description'] ) && $new_instance['description'] ? $new_instance['description'] : '';

			return $instance;
		}

		function form( $instance ) {
			$instance = wp_parse_args( $instance, $this->default );

			$instance_title = $instance['title'] ? str_replace( '"', '&quot;', $instance['title'] ) : '';
			?>
            <div class="goso-instagram-container">
                <p><span style="color: #ff0000;">Note Important: </span>Please connect to your Instagram accout on <a
                            href="<?php echo esc_url( admin_url( 'admin.php?page=goso_instgram_token' ) ); ?>"
                            target="_blank">this page</a> first.
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e( 'Title:', 'authow' ); ?></strong></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                           name="<?php echo $this->get_field_name( 'title' ); ?>"
                           value="<?php echo $instance_title; ?>"/>
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'images_number' ); ?>"><strong><?php _e( 'Number of images to show:', 'authow' ); ?></strong>
                        <input class="small-text" id="<?php echo $this->get_field_id( 'images_number' ); ?>"
                               name="<?php echo $this->get_field_name( 'images_number' ); ?>"
                               value="<?php echo $instance['images_number']; ?>"/>
                    </label>
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'refresh_hour' ); ?>"><strong><?php _e( 'Check for new images every:', 'authow' ); ?></strong>
                        <input class="small-text" id="<?php echo $this->get_field_id( 'refresh_hour' ); ?>"
                               name="<?php echo $this->get_field_name( 'refresh_hour' ); ?>"
                               value="<?php echo $instance['refresh_hour']; ?>"/>
                        <span><?php _e( 'hours', 'authow' ); ?></span>
                    </label>
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'template' ); ?>"><strong><?php _e( 'Template', 'authow' ); ?></strong>
                        <select class="widefat" name="<?php echo $this->get_field_name( 'template' ); ?>"
                                id="<?php echo $this->get_field_id( 'template' ); ?>">
                            <option value="thumbs-no-border" <?php echo ( $instance['template'] == 'thumbs-no-border' ) ? ' selected="selected"' : ''; ?>><?php _e( 'Thumbnails - Without Border', 'authow' ); ?></option>
                            <option value="thumbs" <?php echo ( $instance['template'] == 'thumbs' ) ? ' selected="selected"' : ''; ?>><?php _e( 'Thumbnails', 'authow' ); ?></option>
                            <option value="slider" <?php echo ( $instance['template'] == 'slider' ) ? ' selected="selected"' : ''; ?>><?php _e( 'Slider - Normal', 'authow' ); ?></option>
                            <option value="slider-overlay" <?php echo ( $instance['template'] == 'slider-overlay' ) ? ' selected="selected"' : ''; ?>><?php _e( 'Slider - Overlay Text', 'authow' ); ?></option>
                        </select>
                    </label>
                </p>
                <p class="<?php if ( 'thumbs' != $instance['template'] && 'thumbs-no-border' != $instance['template'] ) {
					echo 'hidden';
				} ?>">
                    <label for="<?php echo $this->get_field_id( 'columns' ); ?>"><strong><?php _e( 'Number of Columns:', 'authow' ); ?></strong>
                        <input class="small-text" id="<?php echo $this->get_field_id( 'columns' ); ?>"
                               name="<?php echo $this->get_field_name( 'columns' ); ?>"
                               value="<?php echo $instance['columns']; ?>"/>
                        <span class='goso-description'><?php _e( 'max is 10 ( only for thumbnails template )', 'authow' ); ?></span>
                    </label>
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><strong><?php _e( 'Order by', 'authow' ); ?></strong>
                        <select class="widefat" name="<?php echo $this->get_field_name( 'orderby' ); ?>"
                                id="<?php echo $this->get_field_id( 'orderby' ); ?>">
                            <option value="date-ASC" <?php selected( $instance['orderby'], 'date-ASC', true ); ?>><?php _e( 'Date - Ascending', 'authow' ); ?></option>
                            <option value="date-DESC" <?php selected( $instance['orderby'], 'date-DESC', true ); ?>><?php _e( 'Date - Descending', 'authow' ); ?></option>
                            <option value="popular-ASC" <?php selected( $instance['orderby'], 'popular-ASC', true ); ?>><?php _e( 'Popularity - Ascending', 'authow' ); ?></option>
                            <option value="popular-DESC" <?php selected( $instance['orderby'], 'popular-DESC', true ); ?>><?php _e( 'Popularity - Descending', 'authow' ); ?></option>
                            <option value="rand" <?php selected( $instance['orderby'], 'rand', true ); ?>><?php _e( 'Random', 'authow' ); ?></option>
                        </select>
                    </label>
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'images_link' ); ?>"><strong><?php _e( 'Link to', 'authow' ); ?></strong>
                        <select class="widefat" name="<?php echo $this->get_field_name( 'images_link' ); ?>"
                                id="<?php echo $this->get_field_id( 'images_link' ); ?>">
                            <option value="image_url" <?php selected( $instance['images_link'], 'image_url', true ); ?>><?php _e( 'Instagram Image', 'authow' ); ?></option>
                            <option value="user_url" <?php selected( $instance['images_link'], 'user_url', true ); ?>><?php _e( 'Instagram Profile', 'authow' ); ?></option>
                            <option value="attachment" <?php selected( $instance['images_link'], 'attachment', true ); ?>><?php _e( 'Attachment Page', 'authow' ); ?></option>
                            <option value="none" <?php selected( $instance['images_link'], 'none', true ); ?>><?php _e( 'None', 'authow' ); ?></option>
                        </select>
                    </label>
                </p>
                <p class="<?php if ( 'custom_url' != $instance['images_link'] ) {
					echo 'hidden';
				} ?>">
                    <label for="<?php echo $this->get_field_id( 'custom_url' ); ?>"><?php _e( 'Custom link:', 'authow' ); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'custom_url' ); ?>"
                           name="<?php echo $this->get_field_name( 'custom_url' ); ?>"
                           value="<?php echo $instance['custom_url']; ?>"/>
                    <span><?php _e( '* use this field only if the above option is set to <strong>Custom Link</strong>', 'authow' ); ?></span>
                </p>
                <div class="goso-advanced-input">
                    <div class="goso-slider-options <?php if ( 'thumbs' == $instance['template'] || 'thumbs-no-border' == $instance['template'] ) {
						echo 'hidden';
					} ?>">
                        <h4 class="goso-advanced-title"><?php _e( 'Advanced Slider Options', 'authow' ); ?></h4>
                        <p>
							<?php _e( 'Slider Navigation Controls:', 'authow' ); ?><br>
                            <label class="goso-radio"><input type="radio"
                                                              id="<?php echo $this->get_field_id( 'controls' ); ?>"
                                                              name="<?php echo $this->get_field_name( 'controls' ); ?>"
                                                              value="prev_next" <?php checked( 'prev_next', $instance['controls'] ); ?> /> <?php _e( 'Prev & Next', 'authow' ); ?>
                            </label>
                            <label class="goso-radio"><input type="radio"
                                                              id="<?php echo $this->get_field_id( 'controls' ); ?>"
                                                              name="<?php echo $this->get_field_name( 'controls' ); ?>"
                                                              value="numberless" <?php checked( 'numberless', $instance['controls'] ); ?> /> <?php _e( 'Dotted', 'authow' ); ?>
                            </label>
                            <label class="goso-radio"><input type="radio"
                                                              id="<?php echo $this->get_field_id( 'controls' ); ?>"
                                                              name="<?php echo $this->get_field_name( 'controls' ); ?>"
                                                              value="none" <?php checked( 'none', $instance['controls'] ); ?> /> <?php _e( 'No Navigation', 'authow' ); ?>
                            </label>
                        </p>
                        <p>
                            <label for="<?php echo $this->get_field_id( 'caption_words' ); ?>"><?php _e( 'Number of words in caption:', 'authow' ); ?>
                                <input class="small-text" id="<?php echo $this->get_field_id( 'caption_words' ); ?>"
                                       name="<?php echo $this->get_field_name( 'caption_words' ); ?>"
                                       value="<?php echo $instance['caption_words']; ?>"/>
                            </label>
                        </p>
                        <p>
                            <label for="<?php echo $this->get_field_id( 'slidespeed' ); ?>"><?php _e( 'Slide Speed:', 'authow' ); ?>
                                <input class="small-text" id="<?php echo $this->get_field_id( 'slidespeed' ); ?>"
                                       name="<?php echo $this->get_field_name( 'slidespeed' ); ?>"
                                       value="<?php echo $instance['slidespeed']; ?>"/>
                                <span><?php _e( 'milliseconds', 'authow' ); ?></span>
                                <span class='goso-description'><?php _e( '1000 milliseconds = 1 second', 'authow' ); ?></span>
                            </label>
                        </p>
                        <p>
                            <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Slider Text Description:', 'authow' ); ?></label>
                            <select size=3 class='widefat' id="<?php echo $this->get_field_id( 'description' ); ?>"
                                    name="<?php echo $this->get_field_name( 'description' ); ?>[]" multiple="multiple">
                                <option value='username' <?php $this->selected( $instance['description'], 'username' ); ?>><?php _e( 'Username', 'authow' ); ?></option>
                                <option value='time'<?php $this->selected( $instance['description'], 'time' ); ?>><?php _e( 'Time', 'authow' ); ?></option>
                                <option value='caption'<?php $this->selected( $instance['description'], 'caption' ); ?>><?php _e( 'Caption', 'authow' ); ?></option>
                            </select>
                            <span class="jr-description"><?php _e( 'Hold ctrl and click the fields you want to show/hide on your slider. Leave all unselected to hide them all. Default all selected.', 'authow' ) ?></span>
                        </p>
                    </div>
                </div>
            </div>
			<?php
		}

		public function selected( $haystack, $current ) {

			if ( is_array( $haystack ) && in_array( $current, $haystack ) ) {
				selected( 1, 1, true );
			}
		}
	}
}
?>
