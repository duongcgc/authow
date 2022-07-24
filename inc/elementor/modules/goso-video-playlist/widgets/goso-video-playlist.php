<?php
namespace GosoAuthowElementor\Modules\GosoVideoPlaylist\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoVideoPlaylist extends Base_Widget {

	public function get_name() {
		return 'penci-video-playlist';
	}

	public function get_title() {
		return penci_get_theme_name('Goso').' '.esc_html__( ' Video Playlist', 'authow' );
	}

	public function get_icon() {
		return 'eicon-youtube';
	}
	
	public function get_categories() {
		return [ 'penci-elements' ];
	}

	public function get_keywords() {
		return array( 'facebook', 'social', 'embed', 'page' );
	}

	protected function register_controls() {
		

		$this->start_controls_section(
			'section_general', array(
				'label' => esc_html__( 'General', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'penci_block_width', array(
				'label'   => __( 'Element Columns', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 3,
				'options' => array(
					'1' => esc_html__( '1 Column ( Small Container Width)', 'authow' ),
					'2' => esc_html__( '2 Columns ( Medium Container Width )', 'authow' ),
					'3' => esc_html__( '3 Columns ( Large Container Width )', 'authow' ),
				)
			)
		);

		$this->add_control(
			'app_id', array(
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<span style="color: red;font-weight: bold;">Note Important</span>: If  you use video come from youtube, please go to Customize &gt; General Options &gt; YouTube API Key and enter an api key.',
				'content_classes' => 'elementor-descriptor',

			)
		);

		$this->add_control(
			'videos_list', array(
				'label'       => __( 'Videos List', 'authow' ),
				'type'        => Controls_Manager::TEXTAREA,
				'description' => __( 'Enter each video url in a seprated line. Supports: YouTube and Vimeo videos only.', 'authow' ),
			)
		);
		$this->add_control(
			'hide_duration', array(
				'label'     => __( 'Hide video duration', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
			)
		);
		$this->add_control(
			'hide_order_number', array(
				'label'     => __( 'Hide video order number', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
			)
		);
		$this->add_control(
			'video_title_length', array(
				'label'     => __( 'Title Length for Video', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '10',
				'separator' => 'before',
			)
		);
		$this->add_control(
			'block_id', array(
				'label'   => __( 'Unique ID for Save & Clear Caching', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default' => rand( 1000, 100000 ),
			)
		);
		$this->end_controls_section();

		$this->register_block_title_section_controls();


		// Design
		$this->start_controls_section(
			'section_design_content',
			array(
				'label' => __( 'Content', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'list_video_bgcolor',
			array(
				'label'     => __( 'Background list videos', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-video-nav' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'video_title_color',
			array(
				'label'     => __( 'Video title color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-video-playlist-item .penci-video-title' => 'color: {{VALUE}};', ),
			)
		);
		$this->add_control(
			'video_title_hover_color',
			array(
				'label'     => __( 'Video title hover color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-video-playlist-item .penci-video-title:hover' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'duration_color',
			array(
				'label'     => __( 'Video duration color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video-playlist-item .penci-video-duration' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'order_number_color',
			array(
				'label'     => __( 'Video order number color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-video-nav .playlist-panel-item' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'order_number_bgcolor',
			array(
				'label'     => __( 'Video order number background color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-video-nav .playlist-panel-item' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'item_video_border_color',
			array(
				'label'     => __( 'Item video border color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-video-nav .penci-video-playlist-item' => 'border-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'item_video_bg_hcolor',
			array(
				'label'     => __( 'Item video hover background and border color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-video-nav .penci-video-playlist-item:hover' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'scrollbar_bg_hcolor',
			array(
				'label'     => __( 'Scroll bar background color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-custom-scroll::-webkit-scrollbar-thumb' => 'background-color: {{VALUE}};' ),
			)
		);

		$this->end_controls_section();
		$this->register_heading_title_style_section_controls();
	}

	public function register_block_title_section_controls() {
		$this->start_controls_section(
			'section_title_block',
			array(
				'label' => __( 'Heading Title', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'heading_title_style', array(
				'label'   => __( 'Choose Style', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''                  => esc_html__( 'Default ( follow Customize )', 'authow' ),
					'style-1'           => esc_html__( 'Style 1', 'authow' ),
					'style-2'           => esc_html__( 'Style 2', 'authow' ),
					'style-3'           => esc_html__( 'Style 3', 'authow' ),
					'style-4'           => esc_html__( 'Style 4', 'authow' ),
					'style-5'           => esc_html__( 'Style 5', 'authow' ),
					'style-6'           => esc_html__( 'Style 6', 'authow' ),
					'style-7'           => esc_html__( 'Style 7', 'authow' ),
					'style-9'           => esc_html__( 'Style 8', 'authow' ),
					'style-8'           => esc_html__( 'Style 9', 'authow' ),
					'style-10'          => esc_html__( 'Style 10', 'authow' ),
					'style-11'          => esc_html__( 'Style 11', 'authow' ),
					'style-12'          => esc_html__( 'Style 12', 'authow' ),
					'style-13'          => esc_html__( 'Style 13', 'authow' ),
					'style-14'          => esc_html__( 'Style 14', 'authow' ),
					'style-15'          => esc_html__( 'Style 15', 'authow' ),
					'style-16'          => esc_html__( 'Style 16', 'authow' ),
					'style-2 style-17'  => esc_html__( 'Style 17', 'authow' ),
					'style-18'          => esc_html__( 'Style 18', 'authow' ),
					'style-18 style-19' => esc_html__( 'Style 19', 'authow' ),
					'style-18 style-20' => esc_html__( 'Style 20', 'authow' ),
					'video_list'        => esc_html__( 'Style Video List', 'authow' ),
				)
			)
		);
		$this->add_control(
			'heading', array(
				'label'   => __( 'Heading Title', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Heading Title', 'authow' ),
			)
		);
		$this->add_control(
			'heading_title_link',
			array(
				'label'       => __( 'Title url', 'authow' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'authow' ),
				'separator'   => 'before',
			)
		);

		$this->add_control(
			'add_title_icon', array(
				'label'     => __( 'Add icon for title?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Show', 'authow' ),
				'label_off' => __( 'Hide', 'authow' ),
				'default'   => '',
				'separator' => 'before',
			)
		);

		$this->add_control(
			'block_title_icon', array(
				'label'     => __( 'Icon', 'authow' ),
				'type'      => Controls_Manager::ICON,
				'default'   => 'fas fa-star',
				'label_block' => true,
				'condition' => array(
					'add_title_icon' => 'yes'
				),
			)
		);
		$this->add_control(
			'block_title_ialign', array(
				'label'     => __( 'Icon Alignment', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'left',
				'options'   => array(
					'left'  => esc_html__( 'Left', 'authow' ),
					'right' => esc_html__( 'Right', 'authow' ),
				),
				'condition' => array(
					'add_title_icon' => 'yes'
				),
			)
		);

		$this->add_control(
			'block_title_align', array(
				'label'   => __( 'Heading Align', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''       => esc_html__( 'Default ( follow Customize )', 'authow' ),
					'left'   => esc_html__( 'Left', 'authow' ),
					'center' => esc_html__( 'Center', 'authow' ),
					'right'  => esc_html__( 'Right', 'authow' )
				)
			)
		);

		$this->add_control(
			'heading_icon_pos', array(
				'label'     => __( 'Align Icon on Style 15', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => array(
					''              => esc_html__( 'Default ( follow Customize )', 'authow' ),
					'pciconp-right' => esc_html__( 'Right', 'authow' ),
					'pciconp-left'  => esc_html__( 'Left', 'authow' ),
				),
				'condition' => array( 'heading_title_style' => array( 'style-15' ) ),
			)
		);
		$this->add_control(
			'heading_icon', array(
				'label'     => __( 'Custom Icon on Style 15', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => array(
					''             => esc_html__( 'Default ( follow Customize )', 'authow' ),
					'pcicon-right' => esc_html__( 'Arrow Right', 'authow' ),
					'pcicon-left'  => esc_html__( 'Arrow Left', 'authow' ),
					'pcicon-down'  => esc_html__( 'Arrow Down', 'authow' ),
					'pcicon-up'    => esc_html__( 'Arrow Up', 'authow' ),
					'pcicon-star'  => esc_html__( 'Star', 'authow' ),
					'pcicon-bars'  => esc_html__( 'Bars', 'authow' ),
					'pcicon-file'  => esc_html__( 'File', 'authow' ),
					'pcicon-fire'  => esc_html__( 'Fire', 'authow' ),
					'pcicon-book'  => esc_html__( 'Book', 'authow' ),
				),
				'condition' => array( 'heading_title_style' => array( 'style-15' ) ),
			)
		);

		$this->add_control(
			'block_title_marginbt', array(
				'label'     => __( 'Margin Bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-homepage-title' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		$this->end_controls_section();
	}

	public function register_heading_title_style_section_controls() {
		$this->start_controls_section(
			'section_title_block_style',
			array(
				'label' => __( 'Block Heading Title', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'block_title_color', array(
				'label'     => __( 'Title Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow .inner-arrow'   => 'color: {{VALUE}};',
					'{{WRAPPER}} .penci-border-arrow .inner-arrow a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .penci-video_playlist .penci-playlist-title' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'block_title_hcolor', array(
				'label'     => __( 'Title Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow .inner-arrow a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .penci-video_playlist .penci-playlist-title a:hover' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'block_title_bcolor', array(
				'label'     => __( 'Border Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow .inner-arrow,' .
					'{{WRAPPER}} .style-4.penci-border-arrow .inner-arrow:before,' .
					'{{WRAPPER}} .style-4.penci-border-arrow .inner-arrow:after,' .
					'{{WRAPPER}} .style-4.penci-border-arrow .inner-arrow > span:before,' .
					'{{WRAPPER}} .style-4.penci-border-arrow .inner-arrow > span:after,' .
					'{{WRAPPER}} .style-4.penci-border-arrow .inner-arrow > span:after,' .
					'{{WRAPPER}} .style-4.penci-border-arrow .inner-arrow > span:before,' .
					'{{WRAPPER}} .style-5.penci-border-arrow,' .
					'{{WRAPPER}} .style-7.penci-border-arrow,' .
					'{{WRAPPER}} .style-9.penci-border-arrow' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .penci-border-arrow:before'  => 'border-top-color: {{VALUE}}',
				)
			)
		);
		$this->add_control(
			'btitle_outer_bcolor', array(
				'label'     => __( 'Border Outer Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}}  .penci-border-arrow:after' => 'border-color: {{VALUE}};'
				)
			)
		);
		$this->add_control(
			'btitle_style10_btopcolor', array(
				'label'     => __( 'Border Top', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-homepage-title.style-10' => 'border-top-color: {{VALUE}};'
				),
				'condition' => array( 'heading_title_style' => 'style-10' ),
			)
		);
		$this->add_control(
			'btitle_style5_bcolor', array(
				'label'     => __( 'Border Bottom', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .style-5.penci-border-arrow' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .penci-homepage-title.style-10' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .style-12.penci-border-arrow' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .style-11.penci-border-arrow' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .style-5.penci-border-arrow .inner-arrow' => 'border-bottom-color: {{VALUE}};',
				),
				'condition' => array( 'heading_title_style' => array( 'style-5','style-10','style-11','style-12' ) ),
			)
		);
		$this->add_control(
			'btitle_style78_bcolor', array(
				'label'     => __( 'Border Bottom on Widget Heading Style 7,8', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .style-7.penci-border-arrow .inner-arrow:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .style-9.penci-border-arrow .inner-arrow:before' => 'background-color: {{VALUE}};'
				),
				'condition' => array( 'heading_title_style' => array( 'style-7', 'style-8' ) ),
			)
		);
		$this->add_control(
			'btitle_shapes_color', array(
				'label'     => __( 'Background Shapes', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .style-13.pcalign-center .inner-arrow:before,{{WRAPPER}} .style-13.pcalign-right .inner-arrow:before'                                         => 'border-left-color: {{VALUE}};',
					'{{WRAPPER}} .style-13.pcalign-center .inner-arrow:after,{{WRAPPER}} .style-13.pcalign-left .inner-arrow:after'                                            => ' border-right-color: {{VALUE}};',
					'{{WRAPPER}} .style-12 .inner-arrow:before,{{WRAPPER}} .style-12.pcalign-right .inner-arrow:after,{{WRAPPER}} .style-12.pcalign-center .inner-arrow:after' => ' border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .style-11 .inner-arrow:after,{{WRAPPER}} .style-11 .inner-arrow:before'                                                                       => ' border-top-color: {{VALUE}};'
				),
				'condition' => array( 'heading_title_style' => array( 'style-13', 'style-11', 'style-12' ) ),
			)
		);
		$this->add_control(
			'bgstyle15_color', array(
				'label'       => __( 'Background Color for Icon', 'authow' ),
				'type'        => Controls_Manager::COLOR,
				'default'     => '',
				'description' => __( 'For Icon on Style 15', 'authow' ),
				'selectors'   => array(
					'{{WRAPPER}} .style-15.penci-border-arrow:before' => 'background-color: {{VALUE}};',
				),
				'condition'   => array( 'heading_title_style' => array( 'style-15' ) ),
			)
		);
		$this->add_control(
			'iconstyle15_color', array(
				'label'       => __( 'Icon Color', 'authow' ),
				'type'        => Controls_Manager::COLOR,
				'default'     => '',
				'description' => __( 'For Icon on Style 15', 'authow' ),
				'selectors'   => array(
					'{{WRAPPER}} .style-15.penci-border-arrow:after' => 'color: {{VALUE}};',
				),
				'condition'   => array( 'heading_title_style' => array( 'style-15' ) ),
			)
		);
		$this->add_control(
			'lines_color', array(
				'label'       => __( 'Color for Lines', 'authow' ),
				'type'        => Controls_Manager::COLOR,
				'default'     => '',
				'description' => __( 'For Lines on Style 18, 19, 20', 'authow' ),
				'selectors'   => array(
					'{{WRAPPER}} .style-18.penci-border-arrow:after' => 'color: {{VALUE}};',
				),
				'condition'   => array(
					'heading_title_style' => array(
						'style-18',
						'style-18 style-19',
						'style-18 style-20'
					)
				),
			)
		);
		$this->add_control(
			'btitle_bgcolor', array(
				'label'     => __( 'Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .style-2.penci-border-arrow:after'           => 'border-color: transparent;border-top-color: {{VALUE}};',
					'{{WRAPPER}} .penci-border-arrow .inner-arrow'            => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-video_playlist .penci-playlist-title' => 'background-color: {{VALUE}};',
				)
			)
		);
		$this->add_control(
			'btitle_outer_bgcolor', array(
				'label'     => __( 'Background Outer Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow:after' => 'background-color: {{VALUE}};'
				)
			)
		);

		$this->add_control(
			'btitle_style9_bgimg', array(
				'label'       => __( 'Select Background Image for Style 9', 'authow' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => array( 'active' => true ),
				'responsive'  => true,
				'render_type' => 'template',
				'selectors'   => array( '{{WRAPPER}} .style-8.penci-border-arrow .inner-arrow' => 'background-image: url("{{URL}}");' ),
				'condition' => array( 'heading_title_style' => 'style-8' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'btitle_typo',
				'label'    => __( 'Block Title Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .penci-border-arrow .inner-arrow, {{WRAPPER}} .penci-video_playlist .penci-playlist-title h2',
			)
		);
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings();

		if ( ! $settings['videos_list'] ) {
			return;
		}
		
		$css_class = 'penci-block-vc penci-video_playlist';
		$css_class .= ' pencisc-column-' . $settings['penci_block_width'];
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="penci-block_content">
				<?php
				if ( ! get_theme_mod( 'penci_youtube_api_key' ) && preg_match( "#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $settings['videos_list'], $matches ) ) {
					echo '<strong>Youtube Api key</strong> is empty. Please go to Customize > General > Extra Options > YouTube API Key and enter an api key :)';
				}

				$videos = preg_split( '/\r\n|[\r\n]/', $settings['videos_list'] );;
				$videos_list     = get_transient( 'penci-shortcode-playlist-' . $settings['block_id'] );
				$videos_list_key = get_transient( 'penci-shortcode-playlist-key' . $settings['block_id'] );
				$rand_video_list = rand( 1000, 100000 );


				if ( empty( $videos_list ) || $settings['videos_list'] != $videos_list_key ) {
					$videos_list = \Goso_Video_List::get_video_infos( $videos );
					set_transient( 'penci-shortcode-playlist-' . $settings['block_id'], $videos_list, 18000 );
					set_transient( 'penci-shortcode-playlist-key' . $settings['block_id'], $settings['videos_list'], 18000 );
				}
				$videos_count = is_array( $videos_list ) ? count( (array) $videos_list ) : 0;

				if ( ! empty( $videos_list ) ): ?>
					<div class="penci-video-play">
						<?php foreach ( (array) $videos_list as $key => $video ): ?>
							<?php
							if ( $key > 0 ) {
								continue;
							}
							?>
							<div class="fluid-width-video-wrapper">
								<iframe class="penci-video-frame" id="video-<?php echo esc_attr( $rand_video_list ) ?>-1" src="<?php echo esc_attr( $video['id'] ) ?>" width="770" height="434" allowfullscreen></iframe>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="penci-video-nav">
						<?php if ( ! empty( $settings['heading'] ) && 'video_list' == $settings['heading_title_style'] ): ?>
							<div class="penci-playlist-title">
								<div class="playlist-title-icon"><?php penci_fawesome_icon('fas fa-play'); ?></span></div>
								<h2>
									<?php
									$attr_link = ' href="#"';
									if ( $settings['heading_title_link']['url'] ) {
										$this->add_render_attribute( 'link', 'href', $settings['heading_title_link']['url'] );
										if ( $settings['heading_title_link']['is_external'] ) {
											$this->add_render_attribute( 'link', 'target', '_blank' );
										}

										if ( $settings['heading_title_link']['nofollow'] ) {
											$this->add_render_attribute( 'link', 'rel', 'nofollow' );
										}

										$attr_link = $this->get_render_attribute_string( 'link' );
									}

									echo( ! empty( $settings['heading_title_link'] ) ? '<a ' . $attr_link . '>' : '<span>' );
									echo esc_html( $settings['heading'] );
									echo( ! empty( $settings['heading_title_link'] ) ? '</a >' : '</span>' );
									?>
								</h2>
								<span class="penci-videos-number">
								<span class="penci-video-playing">1</span> /
								<span class="penci-video-total"><?php echo( $videos_count ) ?></span>
									<?php
									if ( function_exists( 'penci_get_tran_setting' ) ) {
										echo penci_get_tran_setting( 'penci_social_video_text' );
									} else {
										esc_html_e( 'Videos', 'authow' );
									}
									?>
								</span>
							</div>
						<?php endif; ?>
						<?php
						$class_nav = ( ! empty( $settings['title'] ) && 'video_list' == $settings['heading_title_style'] ) ? ' playlist-has-title' : '';
						$class_nav .= $videos_count > 3 ? ' penci-custom-scroll' : '';

						$direction = is_rtl() ? ' dir="rtl"' : '';
						?>
						<div class="penci-video-playlist-nav<?php echo esc_attr( $class_nav ); ?>"<?php echo( $direction ); ?>>
							<?php
							$video_number = 0;
							foreach ( $videos_list as $video ):
								$video_number ++;
								?>
								<a data-name="video-<?php echo esc_attr( $rand_video_list . '-' . $video_number ) ?>" data-src="<?php echo esc_attr( $video['id'] ) ?>"
								   class="penci-video-playlist-item penci-video-playlist-item-<?php echo esc_attr( $video_number ); ?>">
							<span class="penci-media-obj">
								<span class="penci-mobj-img">
									<?php if ( ! $settings['hide_order_number'] ): ?>
										<span class="playlist-panel-item penci-video-number"><?php echo esc_attr( $video_number ) ?></span>
										<span class="playlist-panel-item penci-video-play-icon"><?php penci_fawesome_icon('fas fa-play'); ?></span>
										<span class="playlist-panel-item penci-video-paused-icon"><?php penci_fawesome_icon('fas fa-pause'); ?></span>
										<?php
									endif;


									$class_lazy = $data_src = '';
									$dis_lazy   = get_theme_mod( 'penci_disable_lazyload_layout' );
									if ( $dis_lazy ) {
										$class_lazy = ' penci-disable-lazy';
										$data_src   = 'style="background-image: url(' . esc_url( $video['thumb'] ) . ');"';
									} else {
										$class_lazy = ' penci-lazy';
										$data_src   = 'data-bgset="' . esc_url( $video['thumb'] ) . '"';
									}

									printf( '<span class="penci-image-holder penci-video-thumbnail%s" %s><span class="screen-reader-text">%s</span></span>',
										$class_lazy,
										$data_src,
										esc_html__( 'Thumbnail youtube', 'authow' )
									);
									?>
								</span>
								<span class="penci-mobj-body">
									<span class="penci-video-title" title="<?php echo esc_attr( $video['title'] ); ?>"><?php echo wp_trim_words( $video['title'], $settings['video_title_length'], '...' ); ?></span>
									<?php if ( ! $settings['hide_duration'] ): ?>
										<span class="penci-video-duration"><?php echo esc_attr( $video['duration'] ) ?></span>
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
	}
}
