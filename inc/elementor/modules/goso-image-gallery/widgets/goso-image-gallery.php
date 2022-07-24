<?php

namespace GosoAuthowElementor\Modules\GosoImageGallery\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoImageGallery extends Base_Widget {

	public function get_name() {
		return 'goso-image-gallery';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Image Gallery', 'authow' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}
	
	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'facebook', 'social', 'embed', 'page' );
	}

	protected function register_controls() {
		

		$this->start_controls_section(
			'section_general', array(
				'label' => esc_html__( 'Image Gallery', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'goso_gallery', array(
				'label'      => __( 'Add Images', 'authow' ),
				'type'       => Controls_Manager::GALLERY,
				'show_label' => false,
			)
		);
		$this->add_control(
			'gallery_style', array(
				'label'   => __( 'Choose Style', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 's1',
				'options' => array(
					's1'            => esc_html__( 'Style 1 ( Grid )', 'authow' ),
					's2'            => esc_html__( 'Style 2 ( Mixed )', 'authow' ),
					's3'            => esc_html__( 'Style 3 ( Mixed 2 )', 'authow' ),
					'justified'     => esc_html__( 'Style 4 ( Justified )', 'authow' ),
					'masonry'       => esc_html__( 'Style 5 ( Masonry )', 'authow' ),
					'single-slider' => esc_html__( 'Style 6 ( Slider )', 'authow' ),
				)
			)
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(), array(
				'name'      => 'goso_img',
				'exclude'   => array( 'custom' ),
				'separator' => 'none',
				'default'   => 'medium_large',
				'condition' => array( 'gallery_style' => array( 's1','s2','s3' ) ),
			)
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(), array(
				'name'      => 'goso_img_bitem',
				'label'   => __( 'Image Size for Big Items', 'authow' ),
				'exclude'   => array( 'custom' ),
				'separator' => 'none',
				'default'   => 'large',
				'condition' => array( 'gallery_style' => array( 's2','s3' ) ),
			)
		);

		$this->add_control(
			'goso_img_type', array(
				'label'                => esc_html__( 'Image Type', 'authow' ),
				'type'                 => Controls_Manager::SELECT,
				'default'              => 'landscape',
				'options'              => array(
					''          => __( '-- Default --', 'authow' ),
					'landscape' => __( 'Landscape', 'authow' ),
					'vertical'  => __( 'Vertical', 'authow' ),
					'square'    => __( 'Square', 'authow' ),
					'custom'     => esc_html__( 'Custom', 'authow' ),
				),
				'selectors_dictionary' => array(
					'landscape' => '66.6667%',
					'vertical'  => '135.4%',
					'square'    => '100%',
				),
				'selectors'            => array( '{{WRAPPER}} .goso-image-holder:before' => ' padding-top: {{VALUE}}' ),
				'condition' => array( 'gallery_style' => array( 's1','s2','s3' ) ),
			)
		);

		$this->add_responsive_control(
			'goso_featimg_ratio', array(
				'label'          => __( 'Image Ratio', 'authow' ),
				'type'           => Controls_Manager::SLIDER,
				'default'        => array( 'size' => 0.66 ),
				'tablet_default' => array( 'size' => '' ),
				'mobile_default' => array( 'size' => 0.5 ),
				'range'          => array( 'px' => array( 'min' => 0.1, 'max' => 2, 'step' => 0.01 ) ),
				'selectors'      => array(
					'{{WRAPPER}} .goso-image-holder:before' => 'padding-top: calc( {{SIZE}} * 100% );',
				),
				'condition'      => array( 'goso_img_type' => 'custom' ),
			)
		);

		$this->add_control(
			'caption_source', array(
				'label'   => __( 'Caption', 'elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'none'       => __( 'None', 'elementor' ),
					'attachment' => __( 'Attachment Caption', 'elementor' ),
				),
				'default' => 'attachment',
			)
		);

		$this->add_responsive_control(
			'gallery_columns', array(
				'label'          => __( 'Columns', 'authow' ),
				'type'           => Controls_Manager::SELECT,
				'default'        => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options'        => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
				'condition'      => array( 'gallery_style' => array( 's1', 'masonry' ) ),
			)
		);
		$this->add_control(
			'row_gap', array(
				'label'     => __( 'Rows Gap', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}}  .gososc-grid' => 'grid-row-gap: {{SIZE}}px' ),
				'condition' => array( 'gallery_style' => array( 's1' ) ),
			)
		);
		$this->add_responsive_control(
			'col_gap', array(
				'label'     => __( 'Columns Gap', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}}  .gososc-grid' => 'grid-column-gap: {{SIZE}}px' ),
				'condition' => array( 'gallery_style' => array( 's1' ) ),
			)
		);

		$this->add_control(
			'gallery_height', array(
				'label'     => __( 'Custom the height of images', 'authow' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'condition' => array( 'gallery_style' => array( 'justified', 'masonry' ) ),

			)
		);
		$this->add_control(
			'slider_autoplay', array(
				'label'     => __( 'Autoplay', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'condition' => array( 'gallery_style' => array( 'single-slider' ) ),
			)
		);


		$this->end_controls_section();
		$this->register_block_title_section_controls();

		// Design
		$this->start_controls_section(
			'section_design_content',
			array(
				'label' => __( 'Gallery', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'p_icon_color',
			array(
				'label'     => __( 'Icon Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-gallery-item i' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'p_icon_size', array(
				'label'      => __( 'Icon Size', 'authow' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => array( 'px' => array( 'min' => 0, 'max' => 100 ) ),
				'size_units' => array( 'px' ),
				'selectors'  => array( '{{WRAPPER}} .goso-gallery-item i' => 'font-size: {{SIZE}}{{UNIT}};' ),
			)
		);
		$this->add_control(
			'p_overlay_bgcolor',
			array(
				'label'     => __( 'Overlay Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-gallery-item a::after' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->end_controls_section();
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( ! $settings['goso_gallery'] ) {
			return;
		}

		$style_gallery        = $settings['gallery_style'];
		$goso_img_size       = $settings['goso_img_size'];
		$goso_img_size_bitem = $settings['goso_img_bitem_size'];
		$goso_img_type       = $settings['goso_img_type'];

		$css_class = 'goso-block-vc goso-image-gallery';
		$css_class .= ' goso-image-gallery-' . $style_gallery;

		if ( 's1' == $style_gallery ) {
			$column_desktop = isset( $settings['gallery_columns'] ) && $settings['gallery_columns'] ? $settings['gallery_columns'] : '3';
			$column_tablet = isset( $settings['gallery_columns_tablet'] ) && $settings['gallery_columns_tablet'] ? $settings['gallery_columns_tablet'] : '2';
			$column_mobile = isset( $settings['gallery_columns_mobile'] ) && $settings['gallery_columns_mobile'] ? $settings['gallery_columns_mobile'] : '1';
			$css_class .= ' gososc-grid-' . $column_desktop;
			$css_class .= ' gososc-grid-tablet-' . $column_tablet;
			$css_class .= ' gososc-grid-mobile-' . $column_mobile;
		}

		if( 'attachment' != $settings['caption_source'] ) {
			$css_class .= ' goso-image-not-caption';
		}

		$images    = wp_list_pluck( $settings['goso_gallery'], 'id' );
		$total_img = is_array( $images ) ? count( (array) $images ) : 0;

		$block_id = 'goso-image_gallery_' . rand( 1000, 100000 );

		?>
		<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="goso-block_content <?php echo esc_attr( 's1' == $style_gallery ? ' gososc-grid' : '' ); ?>">
				<?php
				$gal_2_i = $gal_count = 0;

				if ( 's2' == $style_gallery ) {
					foreach ( $images as $image_key => $image_item ) {
						$gal_count ++;
						$gal_2_i ++;

						if ( $image_item < 0 ) {
							continue;
						}

						$class_item         = 'goso-gallery-small-item';
						$goso_img_size_pre = $goso_img_size;
						if ( $gal_count == 1 ) {
							$goso_img_size_pre = $goso_img_size_bitem;
							$class_item         = 'goso-gallery-big-item';
						}
						echo \Goso_Vc_Helper::get_image_holder_gal( $image_item, $goso_img_size_pre, $goso_img_type, true, $gal_count, $class_item, $settings['caption_source'] );

						if ( $gal_count == 1 ) {
							echo '<div class="goso-post-smalls">';
						}

						if ( 5 == $gal_count || $gal_2_i == $total_img ) {
							$gal_count = 0;
							echo '</div>';
						}
					}
				} elseif ( 's3' == $style_gallery ) {
					foreach ( $images as $image_key => $image_item ) {
						$gal_count ++;
						$gal_2_i ++;

						if ( $image_item < 0 ) {
							continue;
						}

						$class_item = 'goso-gallery-small-item';
						if ( $gal_count == 1 || $gal_count == 2 ) {
							$goso_img_size = $goso_img_size_bitem;
							$class_item     = 'goso-gallery-big-item';
						}

						echo \Goso_Vc_Helper::get_image_holder_gal( $image_item, $goso_img_size, $goso_img_type, true, $gal_count, $class_item, $settings['caption_source'] );

						if ( 5 == $gal_count || $gal_2_i == $total_img ) {
							$gal_count = 0;
						}
					}
				} elseif ( 'justified' == $style_gallery || 'masonry' == $style_gallery || 'single-slider' == $style_gallery ) {
					$data_height = '150';

					if ( is_numeric( $settings['gallery_height'] ) && 60 < $settings['gallery_height'] ) {
						$data_height = $settings['gallery_height'];
					}

					echo '<div class="goso-post-gallery-container ' . $style_gallery . ' column-' . $settings['gallery_columns'] . '" data-height="' . $data_height . '" data-margin="3">';

					if ( 'masonry' == $style_gallery ) {
						echo '<div class="inner-gallery-masonry-container">';
					}

					if ( 'single-slider' == $style_gallery ) {
						echo '<div class="goso-owl-carousel goso-owl-carousel-slider goso-nav-visible" data-auto="' . ( 'yes' == $settings['slider_autoplay'] ? 'true' : 'false' ) . '" data-lazy="true">';
					}

					$posts = get_posts( array( 'include' => $images, 'post_type' => 'attachment',  'orderby'   => 'post__in' ) );

					if ( $posts ) {
						foreach ( $posts as $imagePost ) {
							$caption       = '';
							$gallery_title = '';
							if ( $imagePost->post_excerpt ):
								$caption = $imagePost->post_excerpt;
							endif;

							if ( $caption && 'attachment' == $settings['caption_source'] ) {
								$gallery_title = ' data-cap="' . esc_attr( $caption ) . '"';
							}

							$get_full    = wp_get_attachment_image_src( $imagePost->ID, 'full' );
							$get_masonry = wp_get_attachment_image_src( $imagePost->ID, 'goso-masonry-thumb' );
							$thumbsize = 'goso-masonry-thumb';

							$image_alt        = goso_get_image_alt( $imagePost->ID, get_the_ID() );
							$image_title_html = goso_get_image_title( $imagePost->ID );

							$class_a_item = 'goso-gallery-ite';
							if ( 'masonry' != $style_gallery ) {
								$class_a_item = 'goso-gallery-ite item-gallery-' . $style_gallery;
							}
							
							if( $style_gallery == 'masonry' || $style_gallery == 'single-slider' ){
								$class_a_item .= ' item-link-relative';
							}

							if ( 'single-slider' == $style_gallery ) {
								echo '<figure>';
								$get_masonry = wp_get_attachment_image_src( $imagePost->ID, 'goso-full-thumb' );
								$thumbsize = 'goso-full-thumb';
							}
							if ( 'masonry' == $style_gallery ) {
								echo '<div class="item-gallery-' . $style_gallery . '">';
							}
							echo '<a class="' . $class_a_item . ( 'attachment' != $settings['caption_source'] ? ' added-caption' : '' ) . '" href="' . $get_full[0] . '"' . $gallery_title . ' data-rel="goso-gallery-image-content" data-idwrap="' .  esc_attr( $block_id ) . '">';

							if ( 'masonry' == $style_gallery ) {
								echo '<div class="inner-item-masonry-gallery">';
							}
							
							if( $style_gallery == 'masonry' || $style_gallery == 'single-slider' ){
								echo goso_get_ratio_img_basedid( $imagePost->ID, $thumbsize );
							}
							
							echo '<img src="' . $get_masonry[0] . '" alt="' . $image_alt . '"' . $image_title_html . '>';

							if ( $style_gallery == 'justified' && $caption && 'attachment' == $settings['caption_source'] ) {
								echo '<div class="caption">' . wp_kses( $caption, array( 'em' => array(), 'strong' => array(), 'b' => array(), 'i' => array() ) ) . '</div>';
							}
							if ( 'masonry' == $style_gallery ) {
								echo '</div>';
							}

							echo '</a>';

							// Close item-gallery-' . $style_gallery . '-wrap
							if ( 'masonry' == $style_gallery ) {
								echo '</div>';
							}

							if ( 'single-slider' == $style_gallery ) {
								if ( $caption && 'attachment' == $settings['caption_source'] ) {
									echo '<p class="goso-single-gallery-captions">' . $caption . '</p>';
								}
								echo '</figure>';
							}
						}
					}

					if ( 'masonry' == $style_gallery || 'single-slider' == $style_gallery ) {
						echo '</div>';
					}
					echo '</div>';
				} else {
					foreach ( $images as $image_key => $image_item ) {
						$gal_count ++;
						$gal_2_i ++;

						if ( $image_item < 0 ) {
							continue;
						}
						echo \Goso_Vc_Helper::get_image_holder_gal( $image_item, $goso_img_size, $goso_img_type, true, $gal_count, '', $settings['caption_source'] );
					}
				}
				?>
			</div>
		</div>
		<?php
	}
}
