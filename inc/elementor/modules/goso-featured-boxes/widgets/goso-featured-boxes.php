<?php
namespace GosoAuthowElementor\Modules\GosoFeaturedBoxes\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoFeaturedBoxes extends Base_Widget {

	public function get_name() {
		return 'goso-featured-boxes';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Featured Boxes', 'authow' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}
	
	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'featured boxes' );
	}

	protected function register_controls() {
		

		// Section layout
		$this->start_controls_section(
			'section_general', array(
				'label' => esc_html__( 'General', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'goso_style', array(
				'label'   => __( 'Style', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'boxes-style-1',
				'options' => array(
					'boxes-style-1' => esc_html__( 'Style 1', 'authow' ),
					'boxes-style-2' => esc_html__( 'Style 2', 'authow' ),
					'boxes-style-3' => esc_html__( 'Style 3', 'authow' ),
					'boxes-style-4' => esc_html__( 'Style 4', 'authow' ),
				)
			)
		);

		$this->add_control(
			'goso_columns', array(
				'label'   => __( 'Columns', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'boxes-3-columns',
				'options' => array(
					'boxes-1-column'  => esc_html__( '1 Column', 'authow' ),
					'boxes-2-columns' => esc_html__( '2 Columns', 'authow' ),
					'boxes-3-columns' => esc_html__( '3 Columns', 'authow' ),
					'boxes-4-columns' => esc_html__( '4 Columns', 'authow' )
				)
			)
		);

		$this->add_control(
			'goso_size', array(
				'label'   => __( 'Image Size Type', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'horizontal',
				'options' => array(
					'horizontal' => esc_html__( 'Horizontal Size', 'authow' ),
					'square'     => esc_html__( 'Square Size', 'authow' ),
					'vertical'   => esc_html__( 'Vertical Size', 'authow' ),
					'custom'   => esc_html__( 'Custom', 'authow' ),
				)
			)
		);
		$this->add_responsive_control(
			'goso_img_ratio', array(
				'label'          => __( 'Image Ratio', 'authow' ),
				'type'           => Controls_Manager::SLIDER,
				'default'        => array( 'size' => 0.66 ),
				'tablet_default' => array( 'size' => '' ),
				'mobile_default' => array( 'size' => 0.5 ),
				'range'          => array( 'px' => array( 'min' => 0.1, 'max' => 2, 'step' => 0.01 ) ),
				'selectors'      => array(
					'{{WRAPPER}} .home-featured-boxes .goso-image-holder:before' => 'padding-top: calc( {{SIZE}} * 100% );',
				),
				'condition'      => array( 'goso_size' => 'custom' ),
			)
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			array(
				'name'      => 'thumbnail',
				'default'   => 'full',
				'separator' => 'none',
				'condition'      => array( 'goso_size' => 'custom' ),
			)
		);

		$this->add_control(
			'goso_new_tab', array(
				'label'     => __( 'Open in New Tab?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'authow' ),
				'label_off' => __( 'No', 'authow' ),
			)
		);

		$this->add_responsive_control(
			'goso_margin_top', array(
				'label'   => __( 'Custom Margin Top ( Unit is Pixel )', 'authow' ),
				'type'    => Controls_Manager::SLIDER,
				'range'   => array( 'px' => array( 'min' => 0, 'max' => 500, ) ),
				'selectors' => array( '{{WRAPPER}} .home-featured-boxes' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_responsive_control(
			'goso_margin_bottom', array(
				'label'   => __( 'Custom Margin Bottom ( Unit is Pixel )', 'authow' ),
				'type'    => Controls_Manager::SLIDER,
				'range'   => array( 'px' => array( 'min' => 0, 'max' => 500, ) ),
				'selectors' => array( '{{WRAPPER}} .home-featured-boxes' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'_image',
			array(
				'label'   => __( 'Image', 'authow' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array( 'url' => Utils::get_placeholder_image_src() ),
			)
		);
		$repeater->add_control(
			'_text', array(
				'label' => __( 'Text', 'authow' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'_url', array(
				'label' => __( 'URL', 'authow' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'boxes_data', array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'_image' => array( 'url' => Utils::get_placeholder_image_src() ),
						'_text'  => 'Featured Boxed 1',
						'_url'   => 'http://example1.com/'
					),
					array(
						'_image' => array( 'url' => Utils::get_placeholder_image_src() ),
						'_text'  => 'Featured Boxed 2',
						'_url'   => 'http://example1.com/'
					),
					array(
						'_image' => array( 'url' => Utils::get_placeholder_image_src() ),
						'_text'  => 'Featured Boxed 3',
						'_url'   => 'http://example1.com/'
					),
				),
				'title_field' => '{{{ name }}}',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_block_style',
			array(
				'label' => __( 'Featured Boxes', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'img_box_border_color', array(
				'label'     => __( 'Background and Border color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} ul.homepage-featured-boxes .goso-fea-in h4 span span:before'     => 'border-color: {{VALUE}};',
					'{{WRAPPER}} ul.homepage-featured-boxes li .goso-fea-in:after'                => 'border-color: {{VALUE}};',
					'{{WRAPPER}} ul.homepage-featured-boxes li .goso-fea-in:before'               => 'border-color: {{VALUE}};',
					'{{WRAPPER}} ul.homepage-featured-boxes .goso-fea-in.boxes-style-2 h4:before' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} ul.homepage-featured-boxes .goso-fea-in h4 span span'            => 'background-color: {{VALUE}};',
					'{{WRAPPER}} ul.homepage-featured-boxes .goso-fea-in.boxes-style-2 h4'        => 'background-color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'img_box_text_color', array(
				'label'     => __( 'Text color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} ul.homepage-featured-boxes .goso-fea-in h4 > span,{{WRAPPER}} ul.homepage-featured-boxes .goso-fea-in h4 span span' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'img_box_text_hcolor', array(
				'label'     => __( 'Hover text color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} ul.homepage-featured-boxes li .goso-fea-in:hover h4 > span' => 'color: {{VALUE}};',
					'{{WRAPPER}} ul.homepage-featured-boxes li .goso-fea-in:hover h4 span span' => 'color: {{VALUE}};',
				),
			)
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'img_box_typo',
				'label'    => __( 'Text Typography', 'authow' ),
				'selector' => '{{WRAPPER}} ul.homepage-featured-boxes .goso-fea-in h4 > span,{{WRAPPER}} ul.homepage-featured-boxes .goso-fea-in h4 span span',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		if ( empty( $settings['boxes_data'] ) ) {
			return;
		}
		$size = $settings['goso_size'];
		$thumb = 'goso-thumb';
		if( $size == 'square' ){
			$thumb = 'goso-thumb-square';
		} elseif( $size == 'vertical' ) {
			$thumb = 'goso-thumb-vertical';
		} elseif ( $size == 'custom' ){
			if( $settings['thumbnail_size'] ){
				$thumb = $settings['thumbnail_size'];
			}
		}
		?>
		<div class="clearfix home-featured-boxes home-featured-boxes-sc home-featured-boxes-vc boxes-size-<?php echo $size; ?>">
			<ul class="homepage-featured-boxes <?php echo esc_attr( $settings['goso_columns'] ); ?>">
				<?php
				foreach ( (array)$settings['boxes_data'] as $item ) {
					if ( isset( $item['_image'] ) ):
						$homepage_box_image = $this->get_marker_img_el( $item['_image'], 'full' );
						$homepage_box_text = isset( $item['_text'] ) ? $item['_text'] : '';
						$homepage_box_url = isset( $item['_url'] ) ? $item['_url'] : '';

						$open_url  = '';
						$close_url = '';
						$target = '';
						if( 'yes' == $settings['goso_new_tab'] ):
							$target = ' target="_blank"';
						endif;
						if ( $homepage_box_url ) {
							$open_url  = '<a href="' . do_shortcode( $homepage_box_url ) . '"' . $target . '>';
							$close_url = '</a>';
						}
						?>
						<li class="goso-featured-ct <?php echo ( $homepage_box_text ? ' boxes-has-text' : 'boxes-no-text' ); ?>">
							<?php echo wp_kses( $open_url, goso_allow_html() ); ?>
							<div class="goso-fea-in <?php echo esc_attr( $settings['goso_style'] ); ?>">
								<?php if( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
									<div class="fea-box-img goso-image-holder goso-holder-load goso-lazy" data-bgset="<?php echo goso_get_image_size_url( $homepage_box_image, $thumb ); ?>"></div>
								<?php } else { ?>
									<div class="fea-box-img goso-image-holder" style="background-image: url('<?php echo goso_get_image_size_url( $homepage_box_image, $thumb ); ?>');"></div>
								<?php }?>

								<?php if( $homepage_box_text ): ?>
									<h4><span class="boxes-text"><span><?php echo do_shortcode( $homepage_box_text ); ?></span></span></h4>
								<?php endif; ?>
							</div>
							<?php echo wp_kses( $close_url, goso_allow_html() ) ; ?>
						</li>
						<?php
					endif;
				}
				?>
			</ul>
		</div>
		<?php
	}

	public function get_marker_img_el( $image, $thumbnail_size = 'thumbnail' ) {
		if ( empty( $image['url'] ) ) {
			return '';
		}
		if ( ! empty( $image['id'] ) ) {
			$attr = wp_get_attachment_image_src( $image['id'], $thumbnail_size );
			if ( isset( $attr['url'] ) && $attr['url'] ) {
				$image['url'] = $attr['url'];
			}
		}

		return $image['url'];
	}
}
