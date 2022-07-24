<?php
add_action( 'widgets_init', 'goso_videoplaylist_widget' );

function goso_videoplaylist_widget() {
	register_widget( 'Goso_Video_Playlist_Widget' );
}

if ( ! class_exists( 'Goso_Video_Playlist_Widget' ) ) {
	class Goso_Video_Playlist_Widget extends WP_Widget {

		/**
		 * Widget setup.
		 */
		function __construct() {
			$widget_ops  = array(
				'classname'   => 'goso_videoplaylist_widget',
				'description' => esc_html__( 'Video playlist block', 'authow' )
			);
			$control_ops = array( 'id_base' => 'goso_videoplaylist_widget' );

			global $wp_version;
			if ( 4.3 > $wp_version ) {
				$this->WP_Widget( 'goso_videoplaylist_widget', goso_get_theme_name('.Authow',true).esc_html__( 'Goso Video Playlist', 'authow' ), $widget_ops, $control_ops );
			} else {
				parent::__construct( 'goso_videoplaylist_widget', goso_get_theme_name('.Authow',true).esc_html__( 'Goso Video Playlist', 'authow' ), $widget_ops, $control_ops );
			}
		}

		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}

			$title = isset( $instance['title'] ) ? $instance['title'] : '';
			$title = apply_filters( 'widget_title', $title );

			$defaults = array(
				'title'              => esc_html__( 'Video Playlist', 'authow' ),
				'goso_block_width'  => 3,
				'videos_list'        => '',
				'hide_duration'      => '',
				'hide_order_number'  => '',
				'video_list_title'   => '',
				'video_title_length' => 10,
				'block_id'           => rand( 1000, 100000 ),
			);

			$settings = wp_parse_args( (array) $instance, $defaults );
			if ( ! $settings['videos_list'] ) {
				return;
			}
			?>
			<?php echo $args['before_widget']; ?>
			<?php
			if ( $title && ! $settings['video_list_title'] ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
			$css_class = 'goso-block-vc goso-video_playlist';
			$css_class .= ' gososc-column-1';
			?>
            <div class="<?php echo esc_attr( $css_class ); ?>">
                <div class="goso-block_content">
					<?php
					if ( ! get_theme_mod( 'goso_youtube_api_key' ) && preg_match( "#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $settings['videos_list'], $matches ) ) {
						echo '<strong>Youtube Api key</strong> is empty. Please go to Customize > General > Extra Options > YouTube API Key and enter an api key :)';
					}

					$videos = preg_split( '/\r\n|[\r\n]/', $settings['videos_list'] );;
					$videos_list     = get_transient( 'goso-shortcode-playlist-' . $settings['block_id'] );
					$videos_list_key = get_transient( 'goso-shortcode-playlist-key' . $settings['block_id'] );
					$rand_video_list = rand( 1000, 100000 );



					if ( empty( $videos_list ) || $settings['videos_list'] != $videos_list_key ) {
						$videos_list = \Goso_Video_List::get_video_infos( $videos );

						set_transient( 'goso-shortcode-playlist-' . $settings['block_id'], $videos_list, 18000 );
						set_transient( 'goso-shortcode-playlist-key' . $settings['block_id'], $settings['videos_list'], 18000 );
					}
					$videos_count = is_array( $videos_list ) ? count( (array) $videos_list ) : 0;



					if ( ! empty( $videos_list ) ): ?>
                        <div class="goso-video-play">
							<?php foreach ( (array) $videos_list as $key => $video ): ?>
								<?php
								if ( $key > 0 ) {
									continue;
								}
								?>
                                <div class="fluid-width-video-wrapper">
                                    <iframe class="goso-video-frame"
                                            id="video-<?php echo esc_attr( $rand_video_list ) ?>-1"
                                            src="<?php echo esc_attr( $video['id'] ) ?>" width="339"
                                            height="191"></iframe>
                                </div>
							<?php endforeach; ?>
                        </div>
                        <div class="goso-video-nav">
							<?php if ( $title && $settings['video_list_title'] ): ?>
                                <div class="goso-playlist-title">
                                    <div class="playlist-title-icon"><?php goso_fawesome_icon( 'fas fa-play' ); ?></span></div>
                                    <h2><?php echo $title; ?></h2>
                                    <span class="goso-videos-number">
								<span class="goso-video-playing">1</span> /
								<span class="goso-video-total"><?php echo( $videos_count ) ?></span>
										<?php
										if ( function_exists( 'goso_get_tran_setting' ) ) {
											echo goso_get_tran_setting( 'goso_social_video_text' );
										} else {
											esc_html_e( 'Videos', 'authow' );
										}
										?>
								</span>
                                </div>
							<?php endif; ?>
							<?php
							$class_nav = ( ! empty( $settings['title'] ) && $settings['video_list_title'] ) ? ' playlist-has-title' : '';
							$class_nav .= $videos_count > 3 ? ' goso-custom-scroll' : '';

							$direction = is_rtl() ? ' dir="rtl"' : '';
							?>
                            <div class="goso-video-playlist-nav<?php echo esc_attr( $class_nav ); ?>"<?php echo( $direction ); ?>>
								<?php
								$video_number = 0;
								foreach ( $videos_list as $video ):
									$video_number ++;
									?>
                                    <a data-name="video-<?php echo esc_attr( $rand_video_list . '-' . $video_number ) ?>"
                                       data-src="<?php echo esc_attr( $video['id'] ) ?>"
                                       class="goso-video-playlist-item goso-video-playlist-item-<?php echo esc_attr( $video_number ); ?>">
							<span class="goso-media-obj">
								<span class="goso-mobj-img">
									<?php if ( ! $settings['hide_order_number'] ): ?>
                                        <span class="playlist-panel-item goso-video-number"><?php echo esc_attr( $video_number ) ?></span>
                                        <span class="playlist-panel-item goso-video-play-icon"><?php goso_fawesome_icon( 'fas fa-play' ); ?></span>
                                        <span class="playlist-panel-item goso-video-paused-icon"><?php goso_fawesome_icon( 'fas fa-pause' ); ?></span>
									<?php
									endif;


									$class_lazy = $data_src = '';
									$dis_lazy   = get_theme_mod( 'goso_disable_lazyload_layout' );
									if ( $dis_lazy ) {
										$class_lazy = ' goso-disable-lazy';
										$data_src   = 'style="background-image: url(' . esc_url( $video['thumb'] ) . ');"';
									} else {
										$class_lazy = ' goso-lazy';
										$data_src   = 'data-bgset="' . esc_url( $video['thumb'] ) . '"';
									}

									printf( '<span class="goso-image-holder goso-video-thumbnail%s" %s><span class="screen-reader-text">%s</span></span>',
										$class_lazy,
										$data_src,
										esc_html__( 'Thumbnail youtube', 'authow' )
									);
									?>
								</span>
								<span class="goso-mobj-body">
									<span class="goso-video-title"
                                          title="<?php echo esc_attr( $video['title'] ); ?>"><?php echo wp_trim_words( $video['title'], $settings['video_title_length'], '...' ); ?></span>
									<?php if ( ! $settings['hide_duration'] ): ?>
                                        <span class="goso-video-duration"><?php echo esc_attr( $video['duration'] ) ?></span>
									<?php endif; ?>
								</span>
							</span>
                                    </a>
								<?php endforeach;
								?>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
            </div>
			<?php
			echo $args['after_widget'];
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
			$defaults = array(
				'title'              => esc_html__( 'Video Playlist', 'authow' ),
				'videos_list'        => '',
				'hide_duration'      => '',
				'hide_order_number'  => '',
				'video_list_title'   => '',
				'video_title_length' => 10,
				'block_id'           => rand( 1000, 100000 )
			);

			return $defaults;
		}

		function form( $instance ) {
			$defaults = $this->authow_widget_defaults();
			$instance = wp_parse_args( (array) $instance, $defaults );

			$instance_title     = $instance['title'] ? str_replace( '"', '&quot;', $instance['title'] ) : '';
			$video_title_length = isset( $instance['video_title_length'] ) ? absint( $instance['video_title_length'] ) : 10;
			$hide_duration      = isset( $instance['hide_duration'] ) ? (bool) $instance['hide_duration'] : false;
			$hide_order_number  = isset( $instance['hide_order_number'] ) ? (bool) $instance['hide_order_number'] : false;
			$video_list_title   = isset( $instance['video_list_title'] ) ? (bool) $instance['video_list_title'] : false;
			?>

            <p class="goso-field-item ">
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">Block title:</label>
                <input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" type="text"
                       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                       value="<?php echo $instance_title; ?>">
                <span class="goso-widget-desc">A title for this block, if you leave it blank the block will not have a title</span>
            </p>
            <p class="goso-field-item ">
                <label for="<?php echo esc_attr( $this->get_field_id( 'videos_list' ) ); ?>">Videos List</label>
                <textarea id="<?php echo esc_attr( $this->get_field_id( 'videos_list' ) ); ?>" class="widefat"
                          name="<?php echo esc_attr( $this->get_field_name( 'videos_list' ) ); ?>"><?php echo $instance['videos_list']; ?></textarea>
                <span class="goso-widget-desc">Enter each video url in a seprated line. Supports: YouTube and Vimeo videos only.<br><span
                            style="color: red;font-weight: bold;">Note Important</span>: If  you use video come from youtube, please go to Customize &gt; General Options &gt; YouTube API Key and enter an api key.</span>
            </p>
            <p class="goso-field-item goso-param-heading-wrapper no-top-margin vc_column vc_col-sm-12">
                <label for="widget-goso-widget__videos_playlist-2-heading_meta_settings">Extra settings</label>
            </p>
            <p class="goso-field-item vc_col-sm-6">
                <label for="<?php echo esc_attr( $this->get_field_id( 'video_list_title' ) ); ?>">Use Video PlayList
                    Title</label>
                <input class="goso-checkbox" id="<?php echo esc_attr( $this->get_field_id( 'video_list_title' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'video_list_title' ) ); ?>"
                       type="checkbox"<?php checked( $video_list_title ); ?>>
            </p>
            <p class="goso-field-item vc_col-sm-6">
                <label for="<?php echo esc_attr( $this->get_field_id( 'hide_duration' ) ); ?>">Hide video
                    duration</label>
                <input class="goso-checkbox" id="<?php echo esc_attr( $this->get_field_id( 'hide_duration' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'hide_duration' ) ); ?>"
                       type="checkbox"<?php checked( $hide_duration ); ?>>
            </p>
            <p class="goso-field-item vc_col-sm-6">
                <label for="<?php echo esc_attr( $this->get_field_id( 'hide_order_number' ) ); ?>">Hide video order
                    number</label>
                <input class="goso-checkbox" id="<?php echo esc_attr( $this->get_field_id( 'hide_order_number' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'hide_order_number' ) ); ?>"
                       type="checkbox"<?php checked( $hide_order_number ); ?>>
            </p>
            <p class="goso-field-item ">
                <label for="<?php echo esc_attr( $this->get_field_id( 'video_title_length' ) ); ?>">Custom Title
                    Length:</label>
                <input id="<?php echo esc_attr( $this->get_field_id( 'video_title_length' ) ); ?>" class="widefat"
                       type="text" name="<?php echo esc_attr( $this->get_field_name( 'video_title_length' ) ); ?>"
                       value="<?php echo $video_title_length; ?>">
            </p>
            <p class="goso-field-item ">
                <label for="<?php echo esc_attr( $this->get_field_id( 'block_id' ) ); ?>">Unique ID for Save & Clear
                    Caching</label>
                <input id="<?php echo esc_attr( $this->get_field_id( 'block_id' ) ); ?>" class="widefat" type="text"
                       name="<?php echo esc_attr( $this->get_field_name( 'block_id' ) ); ?>"
                       value="<?php echo sanitize_text_field( $instance['block_id'] ); ?>">
            </p>
			<?php
		}
	}
}
?>
