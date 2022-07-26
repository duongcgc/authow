<?php

namespace GosoAuthowElementor\Modules\GosoRecentPosts\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use GosoAuthowElementor\Base\Base_Widget;
use GosoAuthowElementor\Modules\QueryControl\Module as Query_Control;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoRecentPosts extends Base_Widget {

	public function get_name() {
		return 'goso-recent-posts';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Widget Recent/Popular Posts', 'authow' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'posts' );
	}

	protected function register_controls() {
		

		// Section layout
		$this->start_controls_section(
			'section_page_layout', array(
				'label' => esc_html__( 'Layout', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'goso_size', array(
				'label'                => __( 'Image Size Type', 'authow' ),
				'type'                 => Controls_Manager::SELECT,
				'default'              => '',
				'options'              => array(
					''           => esc_html__( 'Default', 'authow' ),
					'horizontal' => esc_html__( 'Horizontal Size', 'authow' ),
					'square'     => esc_html__( 'Square Size', 'authow' ),
					'vertical'   => esc_html__( 'Vertical Size', 'authow' ),
					'custom'     => esc_html__( 'Custom', 'authow' ),
				),
				'selectors'            => array( '{{WRAPPER}} .goso-image-holder:before' => '{{VALUE}}', ),
				'selectors_dictionary' => array(
					'horizontal' => 'padding-top: 66.6667%;',
					'square'     => 'padding-top: 100%;',
					'vertical'   => 'padding-top: 135.4%;',
				),
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
					'{{WRAPPER}} .goso-image-holder:before' => 'padding-top: calc( {{SIZE}} * 100% );',
				),
				'condition'      => array( 'goso_size' => 'custom' ),
			)
		);
		$this->add_control(
			'thumb_size', array(
				'label'     => __( 'Custom Image size', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => $this->get_list_image_sizes( true ),
				'condition' => array( 'goso_size' => 'custom' ),
			)
		);

		$this->add_control(
			'thumb_bigsize', array(
				'label'     => __( 'Custom Image size for Featured Posts', 'authow' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => $this->get_list_image_sizes( true ),
				'condition' => array( 'goso_size' => 'custom' ),
			)
		);

		$this->add_control(
			'title_length', array(
				'label'       => __( 'Custom words length for post titles', 'authow' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => __( 'If your post titles is too long - You can use this option for trim it. Fill number value here.', 'authow' ),
			)
		);
		
		$this->add_control(
			'dotstyle', array(
				'label'                => __( 'Show Timeline Dots?', 'authow' ),
				'type'                 => Controls_Manager::SELECT,
				'default'              => '',
				'options'              => array(
					''           => esc_html__( "Don't Show", 'authow' ),
					's1' => esc_html__( 'Show with Color Style', 'authow' ),
					's2'     => esc_html__( 'Show with Hover Style', 'authow' ),
					's3'   => esc_html__( 'Show with Animation Style', 'authow' ),
				),
			)
		);
		
		$this->add_control(
			'movemeta', array(
				'label'   => __( 'Move post meta to display above post title?', 'authow' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			)
		);

		$this->add_control(
			'hide_thumb', array(
				'label'   => __( 'Hide thumbnail', 'authow' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			)
		);
		$this->add_control(
			'thumbright', array(
				'label'     => __( 'Display thumbnail on right?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => '',
				'condition' => array( 'hide_thumb!' => 'yes' ),
			)
		);
		$this->add_control(
			'twocolumn', array(
				'label'       => __( 'Display on 2 columns?', 'authow' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => __( 'If you use 2 columns option, it will ignore option display thumbnail on right.', 'authow' ),
			)
		);
		$this->add_control(
			'featured', array(
				'label' => __( 'Display 1st post featured?', 'authow' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		$this->add_control(
			'featured2', array(
				'label' => __( 'Display featured post style 2?', 'authow' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		$this->add_control(
			'allfeatured', array(
				'label'       => __( 'Display all post featured?', 'authow' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => __( 'If you use all post featured option, it will ignore option display thumbnail on right & 2 columns.', 'authow' ),
			)
		);
		$this->add_control(
			'show_author', array(
				'label' => __( 'Show Author Name?', 'authow' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		$this->add_control(
			'hide_postdate', array(
				'label' => __( 'Hide post date?', 'authow' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		$this->add_control(
			'show_comment', array(
				'label' => __( 'Show Comment Count?', 'authow' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		$this->add_control(
			'show_postviews', array(
				'label' => __( 'Show Post Views?', 'authow' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		$this->add_control(
			'icon_format', array(
				'label' => __( 'Enable icon post format?', 'authow' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		$this->add_control(
			'ordernum', array(
				'label' => __( 'Show the order numbers?', 'authow' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);

		$this->add_responsive_control(
			'imgwidth', array(
				'label'       => __( 'Custom Image Width', 'authow' ),
				'description' => __( 'This option doesn\'t apply for featured posts.', 'authow' ),
				'type'        => Controls_Manager::SLIDER,
				'range'       => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
				'selectors'   => array(
					'{{WRAPPER}} ul.side-newsfeed li .goso-image-holder.small-fix-size' => 'width: {{SIZE}}px'
				),
				'condition'   => array( 'hide_thumb!' => 'yes' ),
			)
		);

		$this->add_control(
			'showborder', array(
				'label'     => __( 'Remove Border at The Bottom?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'selectors' => array(
					'{{WRAPPER}} ul.side-newsfeed:not(.goso-feed-2columns) li' => 'border-bottom: none'
				)
			)
		);

		$this->add_control(
			'rp_rows_gap', array(
				'label'              => __( 'Rows Gap', 'authow' ),
				'type'               => Controls_Manager::SLIDER,
				'range'              => array( 'px' => array( 'min' => 0, 'max' => 200 ) ),
				'frontend_available' => true,
				'selectors'          => array(
					'{{WRAPPER}} ul.side-newsfeed:not(.goso-feed-2columns) li' => 'margin-bottom: calc({{SIZE}}{{UNIT}}/2); padding-bottom: calc({{SIZE}}{{UNIT}}/2)',
					'{{WRAPPER}} ul.goso-feed-2columns li'                     => 'margin-bottom: {{SIZE}}{{UNIT}}',
				),
			)
		);

		$this->end_controls_section();
		$this->register_query_section_controls();
		$this->register_block_title_section_controls();
		$this->start_controls_section(
			'section_post_style',
			array(
				'label' => __( 'Post', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'pborder_color', array(
				'label'     => __( 'Borders Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ul.side-newsfeed li, {{WRAPPER}} .side-newsfeed.pctlst' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .side-newsfeed.pctlst.pctl-s2 .goso-feed:before, {{WRAPPER}} .side-newsfeed.pctlst.pctl-s3 .goso-feed:before' => 'background-color: {{VALUE}};',
				)
			)
		);
		$this->add_control(
			'pborder_timeline', array(
				'label'     => __( 'Border Colors for Timeline Dots', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'condition'      => array( 'dotstyle!' => '' ),
				'selectors' => array(
					'{{WRAPPER}} .side-newsfeed.pctlst' => 'border-color: {{VALUE}};',
				)
			)
		);
		$this->add_control(
			'dotbg', array(
				'label'     => __( 'Dots Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'condition'      => array( 'dotstyle!' => '' ),
				'selectors' => array(
					'{{WRAPPER}} .side-newsfeed.pctlst .goso-feed:before' => 'background-color: {{VALUE}};',
				)
			)
		);
		
		$this->add_control(
			'dothbg', array(
				'label'     => __( 'Dots Hover/Animation Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'condition'      => array( 'dotstyle' => array( 's2', 's3' ) ),
				'selectors' => array(
					'{{WRAPPER}} .side-newsfeed.pctlst.pctl-s2 .goso-feed:hover:before,{{WRAPPER}} .side-newsfeed.pctlst.pctl-s3 .goso-feed:after' => 'background-color: {{VALUE}};',
				)
			)
		);
		
		$this->add_control(
			'ordernum_bgcolor', array(
				'label'     => __( 'Order Number Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  ul.side-newsfeed li .number-post' => 'background-color: {{VALUE}};',
				)
			)
		);
		$this->add_control(
			'ordernum_color', array(
				'label'     => __( 'Order Number Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  ul.side-newsfeed li .number-post' => 'color: {{VALUE}};',
				)
			)
		);
		$this->add_control(
			'heading_ptitle_style', array(
				'label' => __( 'Post Title', 'authow' ),
				'type'  => Controls_Manager::HEADING
			)
		);

		$this->add_control(
			'ptitle_color', array(
				'label'     => __( 'Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ul.side-newsfeed li .side-item .side-item-text h4 a' => 'color: {{VALUE}};',
					'{{WRAPPER}} ul.side-newsfeed li .side-item .side-item-text h4'   => 'color: {{VALUE}};',
				)
			)
		);
		$this->add_control(
			'ptitle_hcolor', array(
				'label'     => __( 'Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ul.side-newsfeed li .side-item .side-item-text h4 a:hover' => 'color: {{VALUE}};',
				)
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'ptitle_typo',
				'selector' => '{{WRAPPER}} ul.side-newsfeed li .side-item .side-item-text h4 a,{{WRAPPER}}  ul.side-newsfeed li .side-item .side-item-text h4'
			)
		);

		$this->add_responsive_control(
			'featitle_size', array(
				'label'     => __( 'Font size for Featured/Big Post', 'authow' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array(
					'{{WRAPPER}} ul.side-newsfeed li.featured-news .side-item .side-item-text h4 a' => 'font-size: {{SIZE}}px'
				),
			)
		);

		$this->add_control(
			'heading_pmeta_style', array(
				'label' => __( 'Post Meta', 'authow' ),
				'type'  => Controls_Manager::HEADING
			)
		);

		$this->add_control(
			'pmeta_color', array(
				'label'     => __( 'Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ul.side-newsfeed li .side-item .side-item-text .side-item-meta' => 'color: {{VALUE}};',
				)
			)
		);
		$this->add_control(
			'pmeta_acolor', array(
				'label'     => __( 'Color for Author Name & Comment Count', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ul.side-newsfeed li .side-item .side-item-text .side-item-meta a' => 'color: {{VALUE}};',
				)
			)
		);
		$this->add_control(
			'pmeta_ahcolor', array(
				'label'     => __( 'Hover Color for Author Name & Comment Count', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ul.side-newsfeed li .side-item .side-item-text .side-item-meta a:hover' => 'color: {{VALUE}};',
				)
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pmeta_typo',
				'selector' => '{{WRAPPER}} ul.side-newsfeed li .side-item .side-item-text .side-item-meta'
			)
		);
		$this->end_controls_section();
		$this->register_block_title_style_section_controls();

	}

	/**
	 * Get image sizes.
	 *
	 * Retrieve available image sizes after filtering `include` and `exclude` arguments.
	 */
	public function get_list_image_sizes( $default = false ) {
		$wp_image_sizes = $this->get_all_image_sizes();

		$image_sizes = array();

		if ( $default ) {
			$image_sizes[''] = esc_html__( 'Default', 'authow' );
		}

		foreach ( $wp_image_sizes as $size_key => $size_attributes ) {
			$control_title = ucwords( str_replace( '_', ' ', $size_key ) );
			if ( is_array( $size_attributes ) ) {
				$control_title .= sprintf( ' - %d x %d', $size_attributes['width'], $size_attributes['height'] );
			}

			$image_sizes[ $size_key ] = $control_title;
		}

		$image_sizes['full'] = esc_html__( 'Full', 'authow' );

		return $image_sizes;
	}

	public function get_all_image_sizes() {
		global $_wp_additional_image_sizes;

		$default_image_sizes = [ 'thumbnail', 'medium', 'medium_large', 'large' ];

		$image_sizes = [];

		foreach ( $default_image_sizes as $size ) {
			$image_sizes[ $size ] = [
				'width'  => (int) get_option( $size . '_size_w' ),
				'height' => (int) get_option( $size . '_size_h' ),
				'crop'   => (bool) get_option( $size . '_crop' ),
			];
		}

		if ( $_wp_additional_image_sizes ) {
			$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
		}

		return $image_sizes;
	}

	protected function render() {
		$settings      = $this->get_settings();
		$goso_size    = $settings['goso_size'] ? $settings['goso_size'] : '';
		$dotstyle    = $settings['dotstyle'] ? $settings['dotstyle'] : '';
		$thumb_size    = $settings['thumb_size'] ? $settings['thumb_size'] : '';
		$thumb_bigsize = $settings['thumb_bigsize'] ? $settings['thumb_bigsize'] : '';
		$original_postype   = $settings['posts_post_type'];

		if ( in_array($original_postype,['current_query','related_posts']) && goso_elementor_is_edit_mode() && goso_is_builder_template() ) {
			$settings['posts_post_type'] = 'post';
		}

		$query_args = Query_Control::get_query_args( 'posts', $settings );
		if ( in_array($original_postype,['current_query','related_posts']) ) {
			$paged  = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$ppp    = $settings['posts_per_page'] ? $settings['posts_per_page'] : get_option( 'posts_per_page' );
			$ppp    = isset( $settings['arposts_per_page'] ) && $settings['arposts_per_page'] ? $settings['arposts_per_page'] : $ppp;
			$offset = 0;
			if ( $ppp ) {
				$query_args['posts_per_page'] = $ppp;
			}
			if ( $settings['arposts_new'] == 'yes' ) {
				$query_args['paged'] = 1;
			}
			if ( 0 < $settings['offset'] ) {
				$offset = $settings['offset'];
			}

			if ( ! empty( $settings['offset'] ) && $paged > 1 ) {
				$offset = $settings['offset'] + ( ( $paged - 1 ) * $ppp );
			}

			if ( $offset ) {
				$query_args['offset'] = $offset;
			}
		}
		$loop       = new \WP_Query( $query_args );

		if ( ! $loop->have_posts() ) {
			return;
		}

		$title_length = intval( $settings['title_length'] );
		$featured     = 'yes' == $settings['featured'] ? true : false;
		$movemeta     = 'yes' == $settings['movemeta'] ? true : false;
		$twocolumn    = 'yes' == $settings['twocolumn'] ? true : false;
		$featured2    = 'yes' == $settings['featured2'] ? true : false;
		$allfeatured  = 'yes' == $settings['allfeatured'] ? true : false;
		$thumbright   = 'yes' == $settings['thumbright'] ? true : false;
		$postdate     = 'yes' == $settings['hide_postdate'] ? true : false;
		$showauthor   = 'yes' == $settings['show_author'] ? true : false;
		$showcomment  = 'yes' == $settings['show_comment'] ? true : false;
		$showviews    = 'yes' == $settings['show_postviews'] ? true : false;
		$icon         = 'yes' == $settings['icon_format'] ? true : false;
		$ordernum     = 'yes' == $settings['ordernum'] ? true : false;


		$css_class = 'goso-block-vc goso_recent-posts-sc';
		$rand      = rand( 1000, 10000 );
		?>
        <div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
            <div class="goso-block_content">
                <ul id="goso-latestwg-<?php echo sanitize_text_field( $rand ); ?>"
                    class="side-newsfeed<?php if ( $twocolumn && ! $allfeatured ): echo ' goso-feed-2columns';
					    if ( $featured ) {
						    echo ' goso-2columns-featured';
					    } else {
						    echo ' goso-2columns-feed';
					    } endif; if ( $dotstyle ) { echo ' pctlst pctl-' . $dotstyle; } ?>">
					<?php $num = 1;
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <li class="goso-feed<?php if ( ( ( $num == 1 ) && $featured ) || $allfeatured ): echo ' featured-news';
							if ( $featured2 ): echo ' featured-news2'; endif; endif; ?><?php if ( $allfeatured ): echo ' all-featured-news'; endif; ?>">
							<?php if ( $ordernum && has_post_thumbnail() && ! $settings['hide_thumb'] ): ?>
                                <span class="order-border-number<?php if ( $thumbright && ! $twocolumn ): echo ' right-side'; endif; ?>">
									<span class="number-post"><?php echo sanitize_text_field( $num ); ?></span>
								</span>
							<?php endif; ?>
                            <div class="side-item">
								<?php if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) && ! $settings['hide_thumb'] ) : ?>
                                    <div class="side-image<?php if ( $thumbright ): echo ' thumbnail-right'; endif; ?>">
										<?php
										/* Display Review Piechart  */
										if ( function_exists( 'goso_display_piechart_review_html' ) ) {
											$size_pie = 'small';
											if ( ( ( $num == 1 ) && $featured ) || $allfeatured ): $size_pie = 'normal'; endif;
											goso_display_piechart_review_html( get_the_ID(), $size_pie );
										}

										$thumb = goso_featured_images_size( 'small' );
										if ( 'horizontal' == $goso_size ) {
											$thumb = 'goso-thumb-small';
										} else if ( 'square' == $goso_size ) {
											$thumb = 'goso-thumb-square';
										} else if ( 'vertical' == $goso_size ) {
											$thumb = 'goso-thumb-vertical';
										} else if ( 'custom' == $goso_size ) {
											if ( $thumb_size ) {
												$thumb = $thumb_size;
											}
										}
										if ( ( ( $num == 1 ) && $featured ) || $allfeatured ) {
											$thumb = goso_featured_images_size();
											if ( 'horizontal' == $goso_size ) {
												$thumb = 'goso-thumb';
											} else if ( 'square' == $goso_size ) {
												$thumb = 'goso-thumb-square';
											} else if ( 'vertical' == $goso_size ) {
												$thumb = 'goso-thumb-vertical';
											} else if ( 'custom' == $goso_size ) {
												if ( $thumb_bigsize ) {
													$thumb = $thumb_bigsize;
												}
											}
										}
										?>
										<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                                            <a class="goso-image-holder goso-lazy<?php if ( ( ( $num == 1 ) && $featured ) || $allfeatured ) {
												echo '';
											} else {
												echo ' small-fix-size';
											} ?>" rel="bookmark"
                                               data-bgset="<?php echo goso_image_srcset( get_the_ID(),$thumb ); ?>"
                                               href="<?php the_permalink(); ?>"
                                               title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
										<?php } else { ?>
                                            <a class="goso-image-holder<?php if ( ( ( $num == 1 ) && $featured ) || $allfeatured ) {
												echo '';
											} else {
												echo ' small-fix-size';
											} ?>" rel="bookmark"
                                               style="background-image: url('<?php echo goso_get_featured_image_size( get_the_ID(), $thumb ); ?>');"
                                               href="<?php the_permalink(); ?>"
                                               title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
										<?php } ?>

										<?php if ( $icon ): ?>
											<?php if ( has_post_format( 'video' ) ) : ?>
                                                <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                   aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-play' ); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'audio' ) ) : ?>
                                                <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                   aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-music' ); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'link' ) ) : ?>
                                                <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                   aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-link' ); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'quote' ) ) : ?>
                                                <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                   aria-label="Icon"><?php goso_fawesome_icon( 'fas fa-quote-left' ); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'gallery' ) ) : ?>
                                                <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                   aria-label="Icon"><?php goso_fawesome_icon( 'far fa-image' ); ?></a>
											<?php endif; ?>
										<?php endif; ?>
                                    </div>
								<?php endif; ?>
                                <div class="side-item-text">
									<?php if ( $movemeta && ( ! $postdate || $showauthor || $showcomment || $showviews ) ): ?>
                                        <div class="grid-post-box-meta goso-side-item-meta pcsnmt-above">
											<?php if ( $showauthor ): ?>
                                                <span class="side-item-meta side-wauthor"><?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                                            class="url fn n"
                                                            href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
											<?php endif; ?>
											<?php if ( ! $postdate ): ?>
                                                <span class="side-item-meta side-wdate"><?php goso_authow_time_link(); ?></span>
											<?php endif; ?>
											<?php if ( $showcomment ): ?>
                                                <span class="side-item-meta side-wcomments"><a
                                                            href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a></span>
											<?php endif; ?>
											<?php if ( $showviews ): ?>
                                                <span class="side-item-meta side-wviews"><?php echo goso_get_post_views( get_the_ID() ) . ' ' . goso_get_setting( 'goso_trans_countviews' ); ?></span>
											<?php endif; ?>
                                        </div>
									<?php endif; ?>
									
                                    <h4 class="side-title-post">
                                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
											<?php
											if ( ! $title_length || ! is_numeric( $title_length ) ) {
												if ( $featured2 && ( ( ( $num == 1 ) && $featured ) || $allfeatured ) ) {
													echo wp_trim_words( wp_strip_all_tags( get_the_title() ), 12, '...' );
												} else {
													the_title();
												}
											} else {
												echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $title_length, '...' );
											}
											?>
                                        </a>
                                    </h4>
									<?php if ( ! $movemeta && ( ! $postdate || $showauthor || $showcomment || $showviews ) ): ?>
                                        <div class="grid-post-box-meta goso-side-item-meta pcsnmt-below">
											<?php if ( $showauthor ): ?>
                                                <span class="side-item-meta side-wauthor"><?php echo goso_get_setting( 'goso_trans_by' ); ?> <a
                                                            class="url fn n"
                                                            href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
											<?php endif; ?>
											<?php if ( ! $postdate ): ?>
                                                <span class="side-item-meta side-wdate"><?php goso_authow_time_link(); ?></span>
											<?php endif; ?>
											<?php if ( $showcomment ): ?>
                                                <span class="side-item-meta side-wcomments"><a
                                                            href="<?php comments_link(); ?> "><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></a></span>
											<?php endif; ?>
											<?php if ( $showviews ): ?>
                                                <span class="side-item-meta side-wviews"><?php echo goso_get_post_views( get_the_ID() ) . ' ' . goso_get_setting( 'goso_trans_countviews' ); ?></span>
											<?php endif; ?>
                                        </div>
									<?php endif; ?>
                                </div>
                            </div>
                        </li>
						<?php $num ++; endwhile; ?>
                </ul>
				<?php
				wp_reset_postdata();
				?>
            </div>
        </div>
		<?php
	}
}
