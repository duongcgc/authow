<?php
$output = $goso_block_width = $el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if ( ! $atts['videos_list'] ) {
	return;
}

$class_to_filter = vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_class = 'goso-block-vc goso-video_playlist';
$css_class .= ' gososc-column-' . $atts['goso_block_width'];
$css_class .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$block_id = Goso_Vc_Helper::get_unique_id_block( 'video_playlist' );
?>
	<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>">
		<?php Goso_Vc_Helper::markup_block_title( $atts ); ?>
		<div class="goso-block_content">
			<?php
			if ( ! get_theme_mod( 'goso_youtube_api_key' ) && preg_match( "#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $atts['videos_list'], $matches ) ) {
				echo '<strong>Youtube Api key</strong> is empty. Please go to Customize > General > Extra Options > YouTube API Key and enter an api key :)';
			}

			$videos = explode( ',', $atts['videos_list'] );
			$videos_list     = get_transient( 'goso-shortcode-playlist-' . $atts['block_id'] );
			$videos_list_key = get_transient( 'goso-shortcode-playlist-key' . $atts['block_id'] );
			$rand_video_list = rand( 1000, 100000 );



			if ( empty( $videos_list ) || $atts['videos_list'] != $videos_list_key ) {
				$videos_list = Goso_Video_List::get_video_infos( $videos );
				set_transient( 'goso-shortcode-playlist-' . $atts['block_id'], $videos_list, 18000 );
				set_transient( 'goso-shortcode-playlist-key' . $atts['block_id'], $atts['videos_list'], 18000 );
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
						<iframe class="goso-video-frame" id="video-<?php echo esc_attr( $rand_video_list ) ?>-1" src="<?php echo esc_attr( $video['id'] ) ?>" width="770" height="434"></iframe>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="goso-video-nav">
					<?php if ( ! empty( $atts['heading'] ) && 'video_list' == $atts['heading_title_style'] ): ?>
						<div class="goso-playlist-title">
							<div class="playlist-title-icon"><?php goso_fawesome_icon('fas fa-play'); ?></span></div>
							<h2>
								<?php
								echo( ! empty( $atts['heading_title_link'] ) ? '<a href=" ' . esc_url( $atts['heading_title_link'] ) . ' ">' : '<span>' );
								echo esc_html( $atts['heading'] );
								echo( ! empty( $atts['heading_title_link'] ) ? '</a >' : '</span>' );
								?>
							</h2>
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
					$class_nav = ( ! empty( $atts['title'] ) && 'video_list' == $atts['block_title_style'] ) ? ' playlist-has-title' : '';
					$class_nav .= $videos_count > 3 ? ' goso-custom-scroll' : '';

					$direction = is_rtl() ? ' dir="rtl"' : '';
					?>
					<div class="goso-video-playlist-nav<?php echo esc_attr( $class_nav ); ?>"<?php echo( $direction ); ?>>
						<?php
						$video_number = 0;
						foreach ( $videos_list as $video ):
							$video_number ++;
							?>
							<a data-name="video-<?php echo esc_attr( $rand_video_list . '-' . $video_number ) ?>" data-bgset="<?php echo esc_attr( $video['id'] ) ?>"
							   class="goso-video-playlist-item goso-video-playlist-item-<?php echo esc_attr( $video_number ); ?>">
							<span class="goso-media-obj">
								<span class="goso-mobj-img">
									<?php if ( ! $atts['hide_order_number'] ): ?>
										<span class="playlist-panel-item goso-video-number"><?php echo esc_attr( $video_number ) ?></span>
										<span class="playlist-panel-item goso-video-play-icon"><?php goso_fawesome_icon('fas fa-play'); ?></span>
										<span class="playlist-panel-item goso-video-paused-icon"><?php goso_fawesome_icon('fas fa-pause'); ?></span>
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
									<span class="goso-video-title" title="<?php echo esc_attr( $video['title'] ); ?>"><?php echo wp_trim_words( $video['title'], $atts['video_title_length'], '...' ); ?></span>
									<?php if ( ! $atts['hide_duration'] ): ?>
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

$id_block_css = '#' . $block_id;
$css_custom = Goso_Vc_Helper::get_heading_block_css( $id_block_css, $atts );

if ( 'video_list' == $atts['heading_title_style'] ) {
	$css_custom .= Goso_Vc_Helper::vc_google_fonts_parse_attributes( array(
		'font_size'  => $atts['btitle_fsize'],
		'font_style' => $atts['use_btitle_typo'] ? $atts['btitle_typo'] : '',
		'template'   => $id_block_css . ' .goso-playlist-title h2{ %s }',
	) );

	if ( $atts['btitle_bgcolor'] ) {
		$css_custom .= $id_block_css . '.goso-video_playlist .goso-playlist-title{ background-color:' . esc_attr( $atts['btitle_bgcolor'] ) . ';}';
	}

	if ( $atts['block_title_color'] ) {
		$css_custom .= $id_block_css . '.goso-video_playlist .goso-playlist-title{ color:' . esc_attr( $atts['block_title_color'] ) . ';}';
	}

	if ( $atts['block_title_hcolor'] ) {
		$css_custom .= $id_block_css . '.goso-video_playlist .goso-playlist-title a:hover{ color:' . esc_attr( $atts['block_title_hcolor'] ) . ';}';
	}
}

if ( $atts['list_video_bgcolor'] ) {
	$css_custom .= $id_block_css . '.goso-video_playlist .goso-video-nav{ background-color:' . esc_attr( $atts['list_video_bgcolor'] ) . ';}';
}
if ( $atts['video_title_color'] ) {
	$css_custom .= $id_block_css . ' .goso-video-playlist-item .goso-video-title{ color:' . esc_attr( $atts['video_title_color'] ) . ';}';
}
if ( $atts['video_title_hover_color'] ) {
	$css_custom .= $id_block_css . ' .goso-video-playlist-item .goso-video-title:hover{ color:' . esc_attr( $atts['video_title_hover_color'] ) . ';}';
}
if ( $atts['duration_color'] ) {
	$css_custom .= $id_block_css . ' .goso-video-playlist-item .goso-video-duration{ color:' . esc_attr( $atts['duration_color'] ) . ';}';
}
if ( $atts['order_number_color'] ) {
	$css_custom .= $id_block_css . '.goso-video_playlist .goso-video-nav .playlist-panel-item{ color:' . esc_attr( $atts['order_number_color'] ) . ';}';
}
if ( $atts['order_number_bgcolor'] ) {
	$css_custom .= $id_block_css . '.goso-video_playlist .goso-video-nav .playlist-panel-item{ background-color:' . esc_attr( $atts['order_number_bgcolor'] ) . ';}';
}
if ( $atts['item_video_border_color'] ) {
	$css_custom .= $id_block_css . '.goso-video_playlist .goso-video-nav .goso-video-playlist-item{ border-color:' . esc_attr( $atts['item_video_border_color'] ) . ';}';
}
if ( $atts['item_video_bg_hcolor'] ) {
	$css_custom .= $id_block_css . '.goso-video_playlist .goso-video-nav .goso-video-playlist-item:hover{ background-color:' . esc_attr( $atts['item_video_bg_hcolor'] ) . ';}';
}
if ( $atts['scrollbar_bg_hcolor'] ) {
	$css_custom .= $id_block_css . '.goso-video_playlist .goso-custom-scroll::-webkit-scrollbar-thumb{ background-color:' . esc_attr( $atts['scrollbar_bg_hcolor'] ) . ';}';
}

if ( $css_custom ) {
	echo '<style>';
	echo $css_custom;
	echo '</style>';
}
