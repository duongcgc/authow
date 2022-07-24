<?php
namespace GosoAuthowElementor\Modules\GosoCounterUp\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Control_Media;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoCounterUp extends Base_Widget {

	public function get_name() {
		return 'penci-counter-up';
	}

	public function get_title() {
		return penci_get_theme_name('Goso').' '.esc_html__( ' Counter Up', 'authow' );
	}

	public function get_icon() {
		return 'eicon-countdown';
	}
	
	public function get_categories() {
		return [ 'penci-elements' ];
	}

	public function get_keywords() {
		return array( 'counter' );
	}

	/**
	 * Retrieve the list of scripts the image carousel widget depended on.
	 */
	public function get_script_depends() {
		return array( 'waypoints','jquery-counterup' );
	}

	protected function register_controls() {
		

		$this->start_controls_section(
			'section_general', array(
				'label' => esc_html__( 'Counter Up', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'penci_block_width', array(
				'label'   => __( 'Element Columns', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 1,
				'options' => array(
					'1' => esc_html__( '1 Column ( Small Container Width)', 'authow' ),
					'2' => esc_html__( '2 Columns ( Medium Container Width )', 'authow' ),
					'3' => esc_html__( '3 Columns ( Large Container Width )', 'authow' ),
				)
			)
		);
		$this->add_control(
			'cup_style', array(
				'label'   => __( 'Choose Style', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 's1',
				'options' => array(
					's1' => esc_html__( 'Style 1', 'authow' ),
					's2' => esc_html__( 'Style 2', 'authow' ),
				)
			)
		);
		$this->add_control(
			'cup_align', array(
				'label'   => __( 'Posttion', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'center',
				'options' => array(
					'left'   => esc_html__( 'Left', 'authow' ),
					'center' => esc_html__( 'Center', 'authow' ),
					'right'  => esc_html__( 'Right', 'authow' ),
				),
				'condition' => array( 'cup_style' => 's1' ),
			)
		);
		$this->add_control(
			'cup_number', array(
				'label'     => __( 'Number', 'authow' ),
				'type'      => Controls_Manager::TEXT,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'cup_prefix_number', array(
				'label'     => __( 'Prefix of number', 'authow' ),
				'type'      => Controls_Manager::TEXT,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'cup_suffix_number', array(
				'label'     => __( 'Suffix of number', 'authow' ),
				'type'      => Controls_Manager::TEXT,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'cup_title', array(
				'label'     => __( 'Title', 'authow' ),
				'type'      => Controls_Manager::TEXT,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'cup_icon_type', array(
				'label'   => __( 'Icon type', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'icon'  => __( 'Icon', 'authow' ),
					'image' => __( 'Image', 'authow' ),
				),
				'default' => 'icon',
			)
		);
		$this->add_control(
			'cup_icon', array(
				'label'     => __( 'Icon', 'authow' ),
				'type'      => Controls_Manager::ICON,
				'label_block' => true,
				'default'   => 'fas fa-star',
				'condition' => array( 'cup_icon_type' => 'icon' ),
			)
		);
		$this->add_control(
			'cup_image',
			array(
				'label'     => __( 'Choose Image', 'authow' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => array( 'url' => Utils::get_placeholder_image_src() ),
				'condition' => array( 'cup_icon_type' => 'image' ),
			)
		);

		$this->add_control(
			'icon_border_style', array(
				'label'     => __( 'Icon border style', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => array(
					''       => esc_html__( 'None', 'authow' ),
					'solid'  => esc_html__( 'Solid', 'authow' ),
					'dashed' => esc_html__( 'Dashed', 'authow' ),
					'dotted' => esc_html__( 'Dotted', 'authow' ),
				),
				'selectors' => array( '{{WRAPPER}} .penci-cup_icon--icon' => 'border-style: {{VALUE}}' ),
				'condition' => array( 'cup_icon_type' => 'icon' ),
			)
		);

		$this->add_control(
			'icon_border_width', array(
				'label'     => __( 'Border width for Icon', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-cup_icon--icon' => 'border-width: {{SIZE}}px' ),
				'condition' => array( 'icon_border_style' => array( 'solid', 'dashed', 'dotted', 'double' ) ),
			)
		);
		$this->add_control(
			'icon_border_radius', array(
				'label'     => __( 'Border radius for Icon', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-cup_icon--icon' => 'border-radius: {{SIZE}}px' ),
				'condition' => array( 'icon_border_style' => array( 'solid', 'dashed', 'dotted', 'double' ) ),
			)
		);
		$this->add_control(
			'icon_padding', array(
				'label'     => __( 'Padding for Icon', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-cup_icon--icon' => 'padding: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'_image_width_height', array(
				'label'     => __( 'Image With/Height', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-cup_icon--image' => 'width: {{SIZE}}px;height: {{SIZE}}px;' ),
				'condition' => array( 'cup_icon_type' => 'image' ),
			)
		);
		$this->add_control(
			'icon_margin_bottom', array(
				'label'     => __( 'Margin Bottom for Icon or Image', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-cup_icon' => 'margin-bottom: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'title_margin_top', array(
				'label'     => __( 'Margin Top for Title', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-cup-title' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'cup_delay', array(
				'label'     => __( 'Delay', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
			)
		);
		$this->add_control(
			'cup_time', array(
				'label'     => __( 'Time', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
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
			'cup_icon_color', array(
				'label'     => __( 'Icon color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-counter-up .penci-cup_icon' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_responsive_control(
			'cup_icon_size', array(
				'label'     => __( 'Font size for Icon', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-counter-up .penci-cup_icon' => 'font-size: {{SIZE}}px' ),
			)
		);

		$this->add_control(
			'cup_number_color', array(
				'label'     => __( 'Number Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-counterup-number' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),array(
				'name' => 'cup_number_typo',
				'label'     => __( 'Typography for Number', 'authow' ),
				'selector' => '{{WRAPPER}} .penci-counterup-number',
			)
		);
		$this->add_control(
			'cup_frefix_color', array(
				'label'     => __( 'Prefix and Suffix Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-cup-postfix,{{WRAPPER}} .penci-cup-prefix' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),array(
				'name' => 'cup_frefix_typo',
				'label'     => __( 'Typography for Prefix and Suffix', 'authow' ),
				'selector' => '{{WRAPPER}} .penci-cup-postfix,{{WRAPPER}} .penci-cup-prefix',
			)
		);

		$this->add_control(
			'cup_title_color', array(
				'label'     => __( 'Title color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-cup-title' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),array(
				'name' => 'cup_title_typo',
				'label'     => __( 'Typography for Title', 'authow' ),
				'selector' => '{{WRAPPER}} .penci-cup-title',
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_title_block',
			array(
				'label' => __( 'Heading Title', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'show_block_heading', array(
				'label'   => __( 'Show Heading Title', 'authow' ),
				'type'    => Controls_Manager::SWITCHER,
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
					'style-6'           => esc_html__( 'Style 6 - Only Text', 'authow' ),
					'style-7'           => esc_html__( 'Style 7', 'authow' ),
					'style-9'           => esc_html__( 'Style 8', 'authow' ),
					'style-8'           => esc_html__( 'Style 9 - Custom Background Image', 'authow' ),
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
				),
				'condition' => array(
					'show_block_heading' => 'yes'
				),
			)
		);
		$this->add_control(
			'heading', array(
				'label'   => __( 'Heading Title', 'authow' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Heading Title', 'authow' ),
				'condition' => array(
					'show_block_heading' => 'yes'
				),
			)
		);
		$this->add_control(
			'heading_title_link',
			array(
				'label'       => __( 'Title url', 'authow' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'authow' ),
				'separator'   => 'before',
				'condition' => array(
					'show_block_heading' => 'yes'
				),
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
				'condition' => array(
					'show_block_heading' => 'yes'
				),
			)
		);

		$this->add_control(
			'block_title_icon', array(
				'label'     => __( 'Icon', 'authow' ),
				'type'      => Controls_Manager::ICON,
				'default'   => 'fas fa-star',
				'label_block' => true,
				'condition' => array(
					'add_title_icon' => 'yes',
					'show_block_heading' => 'yes'
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
					'add_title_icon' => 'yes',
					'show_block_heading' => 'yes'
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
					'right'  => esc_html__( 'Right', 'authow' ),
				),
				'condition' => array(
					'show_block_heading' => 'yes'
				),
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
				'condition' => array(
					'show_block_heading' => 'yes'
				),
			)
		);

		$this->end_controls_section();
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		$css_class = 'penci-counter-up';
		$css_class .= ' penci-style-' . $settings['cup_style'];
		$css_class .= ' penci-counterup-' . $settings['cup_align'];
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php
			if( isset( $settings['show_block_heading'] ) && $settings['show_block_heading'] ) {
				$this->markup_block_title( $settings, $this );
			}
			?>
			<div class="penci-counter-up_inner">
				<?php
				if ( 'icon' == $settings['cup_icon_type'] ) {

					if( ! empty( $settings['cup_icon'] ) ) {
						$this->add_render_attribute( 'i', 'class', 'penci-cup_iconn--i ' . $settings['cup_icon'] );
						$this->add_render_attribute( 'i', 'aria-hidden', 'true' );

						echo '<div class="penci-cup_icon penci-cup_icon--icon">';
						echo '<i ' . $this->get_render_attribute_string( 'i' ) . '></i>';
						echo '</div>';
					}
				} elseif ( ! empty( $settings['cup_image']['url'] ) ) {
					$this->add_render_attribute( 'image', 'src', $settings['cup_image']['url'] );
					$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['cup_image'] ) );
					$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['cup_image'] ) );

					echo '<div class="penci-cup_icon penci-cup_icon--image">';
					echo  Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'cup_image' );
					echo  '</div>';
				}
				$data_delay  = $settings['cup_delay'] ? $settings['cup_delay'] : 0;
				$data_time   = $settings['cup_time'] ? $settings['cup_time'] : 2000;
				$data_number = $settings['cup_number'] ? $settings['cup_number'] : 0;
				?>
				<div class="penci-cup-info">
					<div class="penci-cup-number-wrapper">
				<span class="penci-span-inner">
				<?php if ( $settings['cup_prefix_number'] ): ?><span class="penci-cup-label penci-cup-prefix"><?php echo do_shortcode( $settings['cup_prefix_number'] ); ?></span><?php endif; ?>
					<span class="penci-counterup-number" data-delay="<?php echo $data_delay; ?>" data-time="<?php echo $data_time; ?>" data-count="<?php echo $data_number; ?>">0</span>
					<?php if ( $settings['cup_suffix_number'] ): ?><span class="penci-cup-label penci-cup-postfix"><?php echo do_shortcode( $settings['cup_suffix_number'] ); ?></span><?php endif; ?>
				</span>
					</div>
					<?php if ( $settings['cup_title'] ): ?>
						<div class="penci-cup-title"><?php echo $settings['cup_title']; ?></div><?php endif; ?>
				</div>
			</div>
		</div>
		<?php
	}
}
