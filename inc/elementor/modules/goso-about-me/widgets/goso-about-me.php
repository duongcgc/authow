<?php

namespace GosoAuthowElementor\Modules\GosoAboutMe\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use GosoAuthowElementor\Base\Base_Color;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoAboutMe extends Base_Widget {

	public function get_name() {
		return 'goso-about-me';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Widget About Me', 'authow' );
	}

	public function get_icon() {
		return 'eicon-document-file';
	}
	
	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'about me', 'image', 'about' );
	}

	protected function register_controls() {


		// Section layout
		$this->start_controls_section(
			'section_aboutme', array(
				'label' => esc_html__( 'About me', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'image',
			array(
				'label'   => __( 'Choose Image', 'authow' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array( 'url' => Utils::get_placeholder_image_src() ),
			)
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			array(
				'name'      => 'thumbnail',
				'default'   => 'full',
				'separator' => 'none',
			)
		);
		$this->add_control(
			'link',
			array(
				'label'       => __( 'Link', 'authow' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'authow' ),
				'separator'   => 'before',
			)
		);
		$this->add_control(
			'about_us_heading',
			array(
				'label'       => __( 'Heading Text', 'authow' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'This is the heading', 'authow' ),
				'placeholder' => __( 'Enter your title', 'authow' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'content',
			array(
				'label'       => __( 'About us text:', 'authow' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'     => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'authow' ),
				'placeholder' => __( 'Enter your description', 'authow' ),
				'separator'   => 'none',
				'rows'        => 10,
				'show_label'  => false,
			)
		);


		$this->add_control(
			'align_block',
			array(
				'label'     => __( 'Align This Block', 'authow' ),
				'type'      => Controls_Manager::CHOOSE,
				'default'   => 'center',
				'options'   => array(
					'left'   => array(
						'title' => __( 'Left', 'authow' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'authow' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => __( 'Right', 'authow' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'toggle'    => true,
			)
		);

		$this->add_control(
			'title_tag',
			array(
				'label'   => __( 'Title HTML Tag', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				),
				'default' => 'h3',
			)
		);

		$pmetas = array(
			'img_circle'   => array( 'label' => __( 'Make About Image Circle', 'authow' ), 'default' => '' ),
			'dis_lazyload' => array( 'label' => __( 'Disable Lazyload for Image', 'authow' ), 'default' => '' )
		);

		foreach ( $pmetas as $key => $pmeta ) {
			$this->add_control(
				$key, array(
					'label'     => $pmeta['label'],
					'type'      => Controls_Manager::SWITCHER,
					'label_on'  => __( 'Show', 'authow' ),
					'label_off' => __( 'Hide', 'authow' ),
					'default'   => $pmeta['default'],
					'separator' => '',
				)
			);
		}

		$this->end_controls_section();

		$this->register_block_title_section_controls();

		$this->start_controls_section(
			'section_style_image',
			array(
				'label' => __( 'Image', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'image_space',
			array(
				'label'     => __( 'Margin bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => array( 'size' => '' ),
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array(
					'{{WRAPPER}} .about-widget .goso-widget-about-image'  => 'margin-bottom: {{SIZE}}{{UNIT}};'
				)
			)
		);

		$this->add_responsive_control(
			'image_size',
			array(
				'label'          => __( 'Width', 'authow' ) . ' (%)',
				'type'           => Controls_Manager::SLIDER,
				'default'        => array(
					'size' => '',
					'unit' => '%',
				),
				'tablet_default' => array(
					'unit' => '%'
				),
				'mobile_default' => array(
					'unit' => '%'
				),
				'size_units'     => array( '%' ),
				'range'          => array(
					'%' => array( 'min' => 5, 'max' => 100 )
				),
				'selectors'      => array( '{{WRAPPER}} .goso-widget-about-image' => 'max-width: {{SIZE}}{{UNIT}} !important;' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			array(
				'label' => __( 'Content', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'heading_title',
			array(
				'label'     => __( 'Heading', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_responsive_control(
			'title_bottom_space',
			array(
				'label'     => __( 'Margin bottom', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100 ) ),
				'selectors' => array( '{{WRAPPER}} .about-me-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};' )
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Title Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .about-me-heading' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'title_typo',
				'label'    => __( 'Title Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .about-me-heading',
			)
		);
		$this->add_control(
			'line_color',
			array(
				'label'     => __( 'Line Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .about-me-heading:before' => 'border-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'heading_content_typo',
			array(
				'label'     => __( 'Content', 'authow' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'content_color',
			array(
				'label'     => __( 'Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-aboutme-content, {{WRAPPER}} .goso-aboutme-content p' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'content_typo',
				'label'    => __( 'Content Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-aboutme-content, {{WRAPPER}} .goso-aboutme-content p',
			)
		);
		$this->end_controls_section();
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		$open_image = $close_image = '';
		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'image-wrapper', 'href', $settings['link']['url'] );
			if ( ! empty( $settings['link']['is_external'] ) ) {
				$this->add_render_attribute( 'image-wrapper', 'target', '_blank' );
			}
			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'image-wrapper', 'rel', 'nofollow' );
			}
			$open_image  = '<a ' . $this->get_render_attribute_string( 'image-wrapper' ) . '>';
			$close_image = '</a>';
		}

		$image_id = isset( $settings['image']['id'] ) ? $settings['image']['id'] : '';

		$image_src = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'thumbnail', $settings );

		if ( ! $image_src && isset( $settings['image']['url'] ) ) {
			$image_src = $settings['image']['url'];
		}

		$inline_style = '';
		$inline_style_html = '';

		if( isset( $settings['img_circle'] ) && $settings['img_circle'] ):
			$inline_style .= 'border-radius: 50%; -webkit-border-radius: 50%;';
		endif;

		if( $inline_style ){
			$inline_style_html = ' style="'. $inline_style .'"';
		}
		$image_width = $image_height = '';
		?>
		<div class="goso-block-vc goso-about-me">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="goso-block_content about-widget<?php if ( $settings['align_block'] ): echo ' pc_align' . esc_attr( $settings['align_block'] ); endif; ?>">
				<?php if ( $image_src ) : 
					$image_width = goso_get_image_data_basedurl( $image_src, 'w' );
					$image_height = goso_get_image_data_basedurl( $image_src, 'h' );
					?>
					<?php echo $open_image; ?>
					<?php if ( ! $settings['dis_lazyload'] ) { ?>
						<img class="goso-widget-about-image nopin goso-lazy" nopin="nopin" width="<?php echo $image_width; ?>" height="<?php $image_height; ?>" src="<?php echo goso_holder_image_base( $image_width, $image_height ); ?>" data-src="<?php echo esc_url( $image_src ); ?>" alt="<?php echo esc_attr( $settings['about_us_heading'] ); ?>"<?php echo $inline_style_html; ?>/>
					<?php } else { ?>
						<img class="goso-widget-about-image nopin" nopin="nopin" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>" src="<?php echo esc_url( $image_src ); ?>" alt="<?php echo esc_attr( $settings['about_us_heading'] ); ?>"<?php echo $inline_style_html; ?>/>
					<?php } ?>
					<?php echo $close_image; ?>
				<?php endif; ?>

				<?php if ( $settings['about_us_heading'] ) : ?>
				<<?php echo $settings['title_tag']; ?> class="about-me-heading"><?php echo do_shortcode( $settings['about_us_heading'] ); ?></<?php echo $settings['title_tag']; ?>>
		<?php endif; ?>

			<?php if ( $settings['content'] ) : ?>
				<div class="goso-aboutme-content"><?php echo do_shortcode( $settings['content'] ); ?></div>
			<?php endif; ?>
		</div>
		</div>
		<?php
	}
}
