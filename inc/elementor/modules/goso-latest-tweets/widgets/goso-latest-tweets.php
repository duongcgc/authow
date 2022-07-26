<?php

namespace GosoAuthowElementor\Modules\GosoLatestTweets\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use GosoAuthowElementor\Base\Base_Widget;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoLatestTweets extends Base_Widget {

	public function get_name() {
		return 'goso-latest-tweets';
	}

	public function get_title() {
		return goso_get_theme_name( 'Goso' ) . ' ' . esc_html__( ' Latest Tweets', 'authow' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'tweets', 'social' );
	}

	protected function register_controls() {


		// Section layout
		$this->start_controls_section( 'section_page', array(
			'label' => esc_html__( 'Latest Tweets', 'authow' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		) );
		$this->add_control( 'note_important', array(
			'type'            => Controls_Manager::RAW_HTML,
			'raw'             => sprintf( __( 'Note Important: To use this widget you need to connect your Twitter account <a target="_blank" href="%s">here</a>', 'authow' ), admin_url( 'admin.php?page=goso_twitter_token' ) ),
			'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',

		) );
		$this->add_control( 'tweets_style', array(
			'label'   => __( 'Layout', 'authow' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'slider',
			'options' => array(
				'slider' => esc_html__( 'Slider', 'authow' ),
				'list'   => esc_html__( 'List', 'authow' ),
			)
		) );
		$this->add_control( 'tweets_align', array(
			'label'     => __( 'Align This Widget', 'authow' ),
			'type'      => Controls_Manager::SELECT,
			'default'   => 'pc_aligncenter',
			'condition' => [ 'tweets_style' => 'slider' ],
			'options'   => array(
				'pc_aligncenter' => esc_html__( 'Align Center', 'authow' ),
				'pc_alignleft'   => esc_html__( 'Align Left', 'authow' ),
				'pc_alignright'  => esc_html__( 'Align Right', 'authow' ),
			)
		) );

		$this->add_control( 'tweets_hide_date', array(
			'label'     => __( 'Hide tweets date?', 'authow' ),
			'type'      => Controls_Manager::SWITCHER,
			'label_on'  => __( 'Yes', 'authow' ),
			'label_off' => __( 'No', 'authow' ),
			'default'   => '',
		) );
		$this->add_control( 'tweets_dis_auto', array(
			'label'     => __( 'Disable Auto Play Tweets Slider?', 'authow' ),
			'type'      => Controls_Manager::SWITCHER,
			'label_on'  => __( 'Yes', 'authow' ),
			'label_off' => __( 'No', 'authow' ),
			'condition' => [ 'tweets_style' => 'slider' ],
			'default'   => '',
		) );
		$this->add_control( 'tweets_reply', array(
			'label'       => __( 'Custom Reply text', 'authow' ),
			'default'     => esc_html__( 'Reply', 'authow' ),
			'condition'   => [ 'tweets_style' => 'slider' ],
			'label_block' => true,
		) );
		$this->add_control( 'tweets_retweet', array(
			'label'       => __( 'Custom Retweet text', 'authow' ),
			'default'     => esc_html__( 'Retweet', 'authow' ),
			'condition'   => [ 'tweets_style' => 'slider' ],
			'label_block' => true,
		) );
		$this->add_control( 'tweets_favorite', array(
			'label'       => __( 'Custom Favorite text', 'authow' ),
			'default'     => esc_html__( 'Favorite', 'authow' ),
			'condition'   => [ 'tweets_style' => 'slider' ],
			'label_block' => true,
		) );

		$this->end_controls_section();
		$this->register_block_title_section_controls();

		$this->start_controls_section( 'section_latest_tweets_spacing', array(
			'label' => __( 'Elements Spacing', 'authow' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		) );
		$this->add_control( 'tweets_icon_spacing', array(
			'label'     => __( 'Tweet Icon Spacing', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'condition' => [ 'tweets_style' => 'slider' ],
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 500, ) ),
			'selectors' => array( '{{WRAPPER}} .goso-tweets-widget-content .icon-tweets' => 'margin-bottom: {{SIZE}}px;' )
		) );
		$this->add_control( 'tweets_date_spacing', array(
			'label'     => __( 'Tweet Date Spacing', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 500, ) ),
			'selectors' => array( '{{WRAPPER}} .goso-tweets-widget-content .tweet-date' => 'margin-bottom: {{SIZE}}px;' )
		) );
		$this->add_control( 'tweets_title_spacing', array(
			'label'     => __( 'Tweet Title Spacing', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 500, ) ),
			'selectors' => array( '{{WRAPPER}} .goso-tweets-widget-content .tweet-text' => 'margin-bottom: {{SIZE}}px;' )
		) );
		$this->add_control( 'tweets_iconp_spacing', array(
			'label'     => __( 'Reply / Retweet/ Favorite Links & Icons', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 500, ) ),
			'selectors' => array( '{{WRAPPER}} .goso-tweets-widget-content .tweet-intents' => 'margin-top: {{SIZE}}px!important;' )
		) );
		$this->add_control( 'tweets_nav_spacing', array(
			'label'     => __( 'Tweet Dots Spacing', 'authow' ),
			'condition' => [ 'tweets_style' => 'slider' ],
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 500, ) ),
			'selectors' => array( '{{WRAPPER}} .goso-owl-carousel.goso-tweets-slider .owl-dots' => 'margin-top: {{SIZE}}px!important;' )
		) );
		$this->add_control( 'tweets_items_spacing', array(
			'label'     => __( 'Spacing Between Tweets Items', 'authow' ),
			'condition' => [ 'tweets_style!' => 'slider' ],
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 500, ) ),
			'selectors' => array( '{{WRAPPER}} .goso-tweets-lists .goso-tweet:not(:last-child)' => 'margin-bottom: calc({{SIZE}}px / 2);padding-bottom:calc({{SIZE}}px / 2)' )
		) );
		$this->end_controls_section();

		$this->start_controls_section( 'section_latest_tweets_style', array(
			'label' => __( 'Latest Tweets', 'authow' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		) );
		$this->add_control( 'tweets_bd_color', array(
			'label'     => __( 'General Border Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .goso-tweets-lists .goso-tweet:not(:last-child)' => 'border-color: {{VALUE}};' )
		) );
		$this->add_control( 'tweets_text_headings', array(
			'label' => __( 'Text', 'authow' ),
			'type'  => Controls_Manager::HEADING,
		) );
		$this->add_control( 'tweets_text_color', array(
			'label'     => __( 'Text color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .tweet-text' => 'color: {{VALUE}};' )
		) );
		$this->add_control( 'tweets_text_lcolor', array(
			'label'     => __( 'Text Links color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .tweet-text a' => 'color: {{VALUE}};' )
		) );
		$this->add_control( 'tweets_text_lhcolor', array(
			'label'     => __( 'Text Links Hover color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .tweet-text a:hover' => 'color: {{VALUE}};' )
		) );
		$this->add_group_control( Group_Control_Typography::get_type(), array(
			'name'     => 'tweets_text_typo',
			'label'    => __( 'Typography', 'authow' ),
			'selector' => '{{WRAPPER}} .tweet-text',
		) );
		$this->add_control( 'tweets_date_headings', array(
			'label'     => __( 'Date', 'authow' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		) );
		$this->add_control( 'tweets_date_color', array(
			'label'     => __( 'Date color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .tweet-date' => 'color: {{VALUE}};' )
		) );
		$this->add_group_control( Group_Control_Typography::get_type(), array(
			'name'     => 'tweets_date_typo',
			'label'    => __( 'Typography', 'authow' ),
			'selector' => '{{WRAPPER}} .tweet-date',
		) );
		$this->add_control( 'tweets_link_headings', array(
			'label'     => __( 'Reply / Retweet/ Favorite Links & Icons', 'authow' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		) );
		$this->add_control( 'tweets_link_color', array(
			'label'     => __( 'Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array(
				'{{WRAPPER}} .goso-tweets-widget-content .tweet-intents-inner:after'                                                                                                                                                         => 'background-color: {{VALUE}};',
				'{{WRAPPER}} .goso-tweets-widget-content .tweet-intents-inner:before'                                                                                                                                                        => 'background-color: {{VALUE}};',
				'{{WRAPPER}} .goso-tweets-widget-content .icon-tweets, {{WRAPPER}} .goso-tweets-widget-content .tweet-intents span:after, {{WRAPPER}} .goso-tweets-widget-content .tweet-intents a' => 'color: {{VALUE}};',
			)
		) );
		$this->add_responsive_control( 'tweets_link_size', array(
			'label'     => __( 'Font size', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
			'selectors' => array( '{{WRAPPER}} .goso-tweets-widget-content .tweet-intents a' => 'font-size: {{SIZE}}px' ),
		) );
		$this->add_control( 'tweets_dots_headings', array(
			'label'     => __( 'Dots', 'authow' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => [ 'tweets_style' => 'slider' ],
		) );
		$this->add_control( 'tweets_dot_color', array(
			'condition' => [ 'tweets_style' => 'slider' ],
			'label'     => __( 'Background Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array( '{{WRAPPER}} .goso-owl-carousel.goso-tweets-slider .owl-dots .owl-dot span' => 'border-color: {{VALUE}};background-color:{{VALUE}};' ),
		) );
		$this->add_control( 'tweets_dot_hcolor', array(
			'condition' => [ 'tweets_style' => 'slider' ],
			'label'     => __( 'Border and Background Active Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .goso-owl-carousel.goso-tweets-slider .owl-dots .owl-dot:hover span,' . '{{WRAPPER}} .goso-owl-carousel.goso-tweets-slider .owl-dots .owl-dot.active span' => 'border-color: {{VALUE}};background-color:{{VALUE}};'
			),
		) );

		$this->end_controls_section();

		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();
		if ( function_exists( 'goso_getTweets' ) ) {
			$tweets = goso_getTweets( 5 );
			if ( empty( $tweets ) ) {
				return;
			}

			$reply    = $settings['tweets_reply'];
			$retweet  = $settings['tweets_retweet'];
			$favorite = $settings['tweets_favorite'];

			$css_class = 'goso-latest-tweets-widget';
			$style     = isset( $settings['tweets_style'] ) && $settings['tweets_style'] ? $settings['tweets_style'] : 'slider';
			$classes   = 'slider' == $style ? 'goso-owl-carousel goso-owl-carousel-slider goso-tweets-slider' : 'goso-tweets-lists';
			?>
            <div class="<?php echo esc_attr( $css_class ); ?>">
				<?php $this->markup_block_title( $settings, $this ); ?>
                <div class="goso-block_content">
					<?php
					if ( isset( $tweets['error'] ) ) {
						echo 'Missing Twitter API Keys - please connect your Twitter Account by go to admin > Authow > Connect Twitter';
					} else {
						$rtl_align = is_rtl() ? 'pc_alignright' : 'pc_alignleft';
						$align     = $style == 'slider' ? $settings['tweets_align'] : $rtl_align;
						?>
                        <div class="goso-tweets-widget-content <?php echo esc_attr( $align ); ?>">
							<?php if ( $style == 'slider' ): ?>
                                <span class="icon-tweets"><?php goso_fawesome_icon( 'fab fa-twitter' ); ?></span>
							<?php endif; ?>
                            <div class="<?php echo esc_attr( $classes ); ?>" data-dots="true"
                                 data-nav="false" data-auto="<?php if ( $settings['tweets_dis_auto'] ) {
								echo 'false';
							} else {
								echo 'true';
							} ?>">
								<?php foreach ( $tweets as $tweet ):
									$date_array = explode( ' ', $tweet['created_at'] );
									$tweet_id = $tweet['id_str'];
									$tweet_text = $tweet['text'];
									$urls = $tweet['entities']['urls'];

									if ( isset( $urls ) ) {
										foreach ( $urls as $ul ) {
											$url = $ul['url'];
											if ( isset( $url ) ):
												$tweet_text = str_replace( $url, '<a href="' . $url . '" target="_blank">' . $url . '</a>', $tweet_text );
											endif;
										}
									}
									?>
                                    <div class="goso-tweet">

										<?php if ( $style == 'list' ):
											$reply = '<i class="fa fa-reply" aria-hidden="true"></i>';
											$retweet = '<i class="fa fa-retweet" aria-hidden="true"></i>';
											$favorite = '<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
											?>

                                            <div class="tweet-list-top">

												<?php if ( $date_array[1] && $date_array[2] && $date_array[5] && ! $settings['tweets_hide_date'] ): ?>
                                                    <span class="tweet-date"><?php echo $date_array[2] . '-' . $date_array[1] . '-' . $date_array[5]; ?></span>
												<?php endif; ?>

                                            </div>

										<?php endif; ?>

                                        <div class="tweet-text">
											<?php echo $tweet_text; ?>
                                        </div>
										<?php
										if ( $style == 'slider' && $date_array[1] && $date_array[2] && $date_array[5] && ! $settings['tweets_hide_date'] ): ?>
                                            <p class="tweet-date"><?php echo $date_array[2] . '-' . $date_array[1] . '-' . $date_array[5]; ?></p>
										<?php endif; ?>
                                        <div class="tweet-intents">
                                            <div class="tweet-intents-inner">
                                            <span><a target="_blank" class="reply"
                                                     href="https://twitter.com/intent/tweet?in_reply_to=<?php echo sanitize_text_field( $tweet_id ); ?>"><?php echo do_shortcode( $reply ); ?></a></span>
                                                <span><a target="_blank" class="retweet"
                                                         href="https://twitter.com/intent/retweet?tweet_id=<?php echo sanitize_text_field( $tweet_id ); ?>"><?php echo do_shortcode( $retweet ); ?></a></span>
                                                <span><a target="_blank" class="favorite"
                                                         href="https://twitter.com/intent/favorite?tweet_id=<?php echo sanitize_text_field( $tweet_id ); ?>"><?php echo do_shortcode( $favorite ); ?></a></span>
                                            </div>
                                        </div>
                                    </div>
								<?php endforeach; ?>
                            </div>
                        </div>

						<?php
					}
					?>
                </div>
            </div>
			<?php
		} else {
			_e( 'Please install the "Goso Social Feed" plugin via Apperance > Install Plugins to get this widget working.', 'authow' );
		}
	}
}
