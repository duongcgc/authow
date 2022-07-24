<?php

namespace GosoAuthowElementor\Modules\GosoPostsTabs\Widgets;

use Elementor\Repeater;
use GosoAuthowElementor\Base\Base_Widget;
use GosoAuthowElementor\Base\Base_Color;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoPostsTabs extends Base_Widget {

	public function get_name() {
		return 'goso-posts-tabs';
	}

	public function get_title() {
		return goso_get_theme_name( 'Goso' ) . ' ' . esc_html__( ' Posts Tabs', 'authow' );
	}

	public function get_icon() {
		return 'eicon-tabs';
	}

	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'category' );
	}

	public function get_script_depends() {
		return [ 'goso_widget_tabs' ];
	}

	protected function register_controls() {

		$this->start_controls_section( 'tabs_settings', array(
			'label' => esc_html__( 'Tabs', 'authow' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		) );

		$this->add_control( 'tabs_order', array(
			'label'   => __( 'Tabs Order', 'authow' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'recent_popular_comments',
			'options' => [
				'recent_popular_comments' => 'Recent / Popular / Comments',
				'recent_comments_popular' => 'Recent / Comments / Popular',
				'popular_recent_comments' => 'Popular / Recent / Comments',
				'popular_comments_recent' => 'Popular / Comments / Recent ',
				'comments_popular_recent' => 'Comments / Popular / Recent ',
				'comments_recent_popular' => 'Comments / Recent / Popular ',
			]
		) );

		$this->add_control( 'tabs_style', array(
			'label'   => __( 'Tabs Style', 'authow' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'default',
			'options' => [
				'default' => 'Default Theme Style',
				'box'     => 'Box Tabs',
			]
		) );

		$this->add_control( 'disable_recent', array(
			'label' => __( 'Hide Recent Posts Tab', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'disable_popular', array(
			'label' => __( 'Hide Popular Posts Tab', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'disable_comments', array(
			'label' => __( 'Hide Comments Tab', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->end_controls_section();


		// Section layout
		$this->start_controls_section( 'section_settings', array(
			'label' => esc_html__( 'General', 'authow' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		) );

		$this->add_control( 'stick_posts', array(
			'label'   => __( 'Ignore Sticky Posts?', 'authow' ),
			'desc'    => 'Note that: Ignore sticky posts doesn\'t work if you filter your posts by a taxonomy or multiple taxonomies (categories, tags... ) - because it doesn\'t support by WordPress itself.',
			'type'    => Controls_Manager::SWITCHER,
			'default' => 'yes'
		) );

		$this->add_control( 'number', array(
			'label'   => __( 'Number of posts to show', 'authow' ),
			'type'    => Controls_Manager::NUMBER,
			'default' => 5
		) );

		$this->add_control( 'offset', array(
			'label' => __( 'Number of offset posts', 'authow' ),
			'type'  => Controls_Manager::NUMBER,
		) );

		$this->add_control( 'title_length', array(
			'label' => __( 'Custom words length for post titles:', 'authow' ),
			'desc'  => 'If your post titles is too long - You can use this option for trim it. Fill number value here.',
			'type'  => Controls_Manager::NUMBER,
		) );

		$this->add_control( 'number_comments', array(
			'label'   => __( 'Number of comments to show', 'authow' ),
			'type'    => Controls_Manager::NUMBER,
			'default' => 5
		) );

		$this->add_control( 'fthumb_size', array(
			'label'      => __( 'Custom Image Size for Featured Posts', 'authow' ),
			'type'       => Controls_Manager::SELECT,
			'default'    => '',
			'options'    => $this->get_list_image_sizes( true ),
			'conditions' => [
				'relation' => 'or',
				'terms'    => [
					[
						'name'     => 'featured',
						'operator' => '==',
						'value'    => 'yes',
					],
					[
						'name'     => 'allfeatured',
						'operator' => '==',
						'value'    => 'yes',
					],
				],
			],
		) );

		$this->add_control( 'thumb_size', array(
			'label'     => __( 'Custom Image Size', 'authow' ),
			'type'      => Controls_Manager::SELECT,
			'default'   => '',
			'condition' => [ 'allfeatured!' => 'yes' ],
			'options'   => $this->get_list_image_sizes( true ),
		) );

		$this->add_responsive_control( 'image_type', array(
			'label'     => __( 'Thumbnail Ratio', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
			'selectors' => array(
				'{{WRAPPER}}  .goso-wdtab-ct .goso-image-holder:before' => 'padding-top: {{SIZE}}%;',
			),
		) );

		$this->add_responsive_control( 'imgwidth', array(
			'label'     => __( 'Thumbnail Width', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 500, ) ),
			'selectors' => array(
				'{{WRAPPER}}  ul.goso-wdtab-ct li .goso-image-holder.small-fix-size' => 'width: {{SIZE}}px;',
			),
		) );

		$this->add_control( 'dotstyle', array(
			'label'   => __( 'Show Timeline Dots?', 'authow' ),
			'type'    => Controls_Manager::SELECT,
			'options' => [
				''   => 'Hidden',
				's1' => 'Show with Color Style',
				's2' => 'Show with Hover Style',
				's3' => 'Show with Animation Style',
			]
		) );

		$this->add_control( 'movemeta', array(
			'label' => __( 'Move post meta to display above post title?', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'hide_thumb', array(
			'label' => __( 'Hide Featured Image?', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'thumbright', array(
			'label' => __( 'Display thumbnail on right?', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'twocolumn', array(
			'label' => __( 'Display on 2 columns?', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'featured', array(
			'label' => __( 'Display 1st post featured?', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'featured2', array(
			'label' => __( 'Display featured post style 2', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'allfeatured', array(
			'label' => __( 'Display all post featured?', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'ordernum_recent', array(
			'label' => __( 'Hide Order Numbers on Recent Tab?', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'ordernum', array(
			'label' => __( 'Hide Order Numbers on Popular Tab?', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'show_author', array(
			'label' => __( 'Show Author Name', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'postdate', array(
			'label' => __( 'Hide Post Date', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'show_comment', array(
			'label' => __( 'Show Comment Count', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'show_postviews', array(
			'label' => __( 'Show Post Views', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'icon', array(
			'label' => __( 'Show icon post format', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_control( 'showborder', array(
			'label' => __( 'Remove Border at The Bottom?', 'authow' ),
			'type'  => Controls_Manager::SWITCHER,
		) );

		$this->add_responsive_control( 'row_gap', array(
			'label'     => __( 'Rows Gap Between Post Items', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 500, ) ),
			'selectors' => [
				'{{WRAPPER}} ul.goso-wdtab-ct.side-newsfeed:not(.goso-feed-2columns) li' => 'margin-bottom:calc({{SIZE}}px/2);padding-bottom:calc({{SIZE}}px/2)',
				'{{WRAPPER}} ul.goso-wdtab-ct.goso-feed-2columns li'                     => 'margin-bottom:{{SIZE}}px;'
			]
		) );

		$this->end_controls_section();

		$this->register_block_title_section_controls();

		$this->start_controls_section( 'section_style_tabs', array(
			'label' => __( 'Tabs', 'authow' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		) );

		$this->add_group_control( Group_Control_Typography::get_type(), array(
			'name'     => 'tab_title',
			'label'    => __( 'Tab Title Typography', 'authow' ),
			'selector' => '{{WRAPPER}} .goso_posts_tabs_widget .tabs ul > li a',
		) );

		$this->add_control( 'tab_title_color', array(
			'label'     => __( 'Tab Title Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .goso_posts_tabs_widget .tabs ul > li a' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'tab_title_hcolor', array(
			'label'     => __( 'Tab Title Hover Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .goso_posts_tabs_widget .tabs ul > li a:hover' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'tab_title_acolor', array(
			'label'     => __( 'Tab Title Active Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .goso_posts_tabs_widget .tabs ul > li.active a' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'tab_bd_color', array(
			'label'     => __( 'Tab Borders Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .goso_posts_tabs_widget .tabs ul > li a,{{WRAPPER}} .goso_posts_tabs_widget .tabs' => 'border-color: {{VALUE}};' ),
		) );

		$this->add_control( 'tab_bg_color', array(
			'label'     => __( 'Tab Background Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'condition' => [ 'tabs_style' => 'box' ],
			'selectors' => array( '{{WRAPPER}} .goso_posts_tabs_widget .tabs ul > li a' => 'background-color: {{VALUE}};' ),
		) );

		$this->add_control( 'tab_bg_hcolor', array(
			'label'     => __( 'Tab Hover Background Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'condition' => [ 'tabs_style' => 'box' ],
			'selectors' => array( '{{WRAPPER}} .goso_posts_tabs_widget .tabs ul > li a:hover' => 'background-color: {{VALUE}};' ),
		) );

		$this->add_control( 'tab_bg_acolor', array(
			'label'     => __( 'Tab Active Background Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'condition' => [ 'tabs_style' => 'box' ],
			'selectors' => array( '{{WRAPPER}} .goso_posts_tabs_widget .tabs ul > li.active a' => 'background-color: {{VALUE}};' ),
		) );

		$this->add_control( 'tab_abg_color', array(
			'label'     => __( 'Tab Active Background Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .goso_posts_tabs_widget .tabs ul > li.active a' => 'background-color: {{VALUE}};' ),
		) );

		$this->add_responsive_control( 'tabs_item_size', array(
			'label'     => __( 'Tab Padding', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 500, ) ),
			'selectors' => array(
                    '{{WRAPPER}} .goso_posts_tabs_widget .box-tabs .tabs ul > li a' => 'padding-top: {{SIZE}}px;padding-bottom: {{SIZE}}px;',
                    '{{WRAPPER}} .goso_posts_tabs_widget .default-tabs .tabs' => 'padding-bottom: {{SIZE}}px;',
            ),
		) );

		$this->add_responsive_control( 'tabs_title_spacing', array(
			'label'     => __( 'Tab Title Spacing', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 500, ) ),
			'selectors' => array(
				'{{WRAPPER}} .goso_posts_tabs_widget .tabs' => 'margin-bottom: {{SIZE}}px;',
			),
		) );

		$this->end_controls_section();

		$this->start_controls_section( 'section_style_image', array(
			'label' => __( 'Posts Typo & Color', 'authow' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		) );

		$this->add_group_control( Group_Control_Typography::get_type(), array(
			'name'     => 'fpost_title_typo',
			'label'    => __( 'Featured Post Title Typography', 'authow' ),
			'selector' => '{{WRAPPER}} ul.goso-wdtab-ct li.featured-news .side-item .side-item-text h4 a',
		) );

		$this->add_group_control( Group_Control_Typography::get_type(), array(
			'name'     => 'post_title_typo',
			'label'    => __( 'Post Title Typography', 'authow' ),
			'selector' => '{{WRAPPER}} ul.goso-wdtab-ct li:not(.featured-news) .side-item .side-item-text h4 a',
		) );

		$this->add_control( 'post_title_color', array(
			'label'     => __( 'Post Title Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} ul.goso-wdtab-ct li .side-item .side-item-text h4 a' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'post_title_hcolor', array(
			'label'     => __( 'Post Title Hover Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} ul.goso-wdtab-ct li .side-item .side-item-text h4 a:hover' => 'color: {{VALUE}};' ),
		) );

		$this->add_responsive_control( 'post_title_tm', array(
			'label'     => __( 'Post Title Top Margin', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'selectors' => array( '{{WRAPPER}} ul.goso-wdtab-ct li .side-item .side-item-text h4' => 'margin-top: {{SIZE}}px;' ),
		) );

		$this->add_responsive_control( 'post_title_bm', array(
			'label'     => __( 'Post Title Bottom Margin', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'selectors' => array( '{{WRAPPER}} ul.goso-wdtab-ct li .side-item .side-item-text h4' => 'margin-bottom: {{SIZE}}px;' ),
		) );

		$this->add_group_control( Group_Control_Typography::get_type(), array(
			'name'     => 'post_meta_typo',
			'label'    => __( 'Post Meta Typography', 'authow' ),
			'selector' => '{{WRAPPER}} ul.goso-wdtab-ct li .side-item .side-item-text .side-item-meta',
		) );

		$this->add_control( 'post_meta_color', array(
			'label'     => __( 'Post Meta Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} ul.goso-wdtab-ct li .side-item .side-item-text .side-item-meta,{{WRAPPER}} ul.goso-wdtab-ct li .side-item .side-item-text .side-item-meta a' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'post_meta_lcolor', array(
			'label'     => __( 'Post Meta Link Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} ul.goso-wdtab-ct li .side-item .side-item-text .side-item-meta a' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'post_meta_hcolor', array(
			'label'     => __( 'Post Meta Hover Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} ul.goso-wdtab-ct li .side-item .side-item-text .side-item-meta a:hover' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'post_meta_item_spacing', array(
			'label'     => __( 'Post Meta Items Spacing', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'selectors' => array( '{{WRAPPER}} .grid-post-box-meta span:after' => 'margin: 0 {{SIZE}}px 0 {{SIZE}}px' ),
		) );

		$this->add_responsive_control( 'post_meta_tm', array(
			'label'     => __( 'Post Meta Top Margin', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'selectors' => array( '{{WRAPPER}} .grid-post-box-meta, {{WRAPPER}} .grid-post-box-meta.goso-side-item-meta.pcsnmt-above' => 'margin-top: {{SIZE}}px;' ),
		) );

		$this->add_responsive_control( 'post_meta_bm', array(
			'label'     => __( 'Post Meta Bottom Margin', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'selectors' => array( '{{WRAPPER}} .grid-post-box-meta, {{WRAPPER}} .grid-post-box-meta.goso-side-item-meta.pcsnmt-above' => 'margin-bottom: {{SIZE}}px;' ),
		) );

		$this->add_control( 'post_list_border_color', array(
			'label'     => __( 'Post Listing Border Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} ul.goso-wdtab-ct li' => 'border-color: {{VALUE}};' ),
		) );

		$this->add_control( 'post_counter_color', array(
			'label'     => __( 'Order Numbers Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} ul.side-newsfeed li .number-post' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'post_counter_gcolor', array(
			'label'     => __( 'Order Numbers Background Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} ul.side-newsfeed li .number-post' => 'background-color: {{VALUE}};' ),
		) );

		$this->add_control( 'timeline_line_color', array(
			'label'     => __( 'Timeline Line Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .side-newsfeed.pctlst' => 'border-color: {{VALUE}};' ),
		) );

		$this->add_control( 'timeline_dot_color', array(
			'label'     => __( 'Timeline Dot Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .side-newsfeed.pctlst .goso-feed:before, {{WRAPPER}} .side-newsfeed.pctlst.pctl-s2 .goso-feed:before, {{WRAPPER}} .side-newsfeed.pctlst.pctl-s3 .goso-feed:before' => 'background-color: {{VALUE}};' ),
		) );

		$this->add_control( 'timeline_dot_acolor', array(
			'label'     => __( 'Timeline Dot Active Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .side-newsfeed.pctlst .goso-feed:before, {{WRAPPER}} .side-newsfeed.pctlst.pctl-s2 .goso-feed:hover:before,{{WRAPPER}} .side-newsfeed.pctlst.pctl-s3 .goso-feed:hover:after' => 'background-color: {{VALUE}};' ),
		) );

		$this->end_controls_section();

		$this->start_controls_section( 'section_style_comments', array(
			'label' => __( 'Comments Typo & Color', 'authow' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		) );

		$this->add_group_control( Group_Control_Typography::get_type(), array(
			'name'     => 'comments_typo',
			'label'    => __( 'Comment Title Typography', 'authow' ),
			'selector' => '{{WRAPPER}} .author-info,{{WRAPPER}} .author-info a',
		) );

		$this->add_control( 'comments_tabs_color', array(
			'label'     => __( 'Comment Text Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .author-info' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'comments_tabs_lcolor', array(
			'label'     => __( 'Comment Link Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .author-info a' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'comments_tabs_hcolor', array(
			'label'     => __( 'Comment Link Hover Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .author-info a:hover' => 'color: {{VALUE}};' ),
		) );

		$this->add_control( 'comments_tabs_gbdcolor', array(
			'label'     => __( 'Comment List Border Color', 'authow' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array( '{{WRAPPER}} .goso_posts_tabs_widget.el .tab-comments ul li' => 'border-color: {{VALUE}};' ),
		) );

		$this->add_control( 'comments_tabs_spacing', array(
			'label'     => __( 'Comment List Spacing', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
			'selectors' => array( '{{WRAPPER}} .goso_posts_tabs_widget.el .tab-comments ul li:not(:last-child)' => 'margin-bottom: calc({{SIZE}}px/2);padding-bottom: calc({{SIZE}}px/2);' ),
		) );

		$this->add_responsive_control( 'comments_ava_size', array(
			'label'       => __( 'Avatar Image Size', 'authow' ),
			'type'        => Controls_Manager::SLIDER,
			'render_type' => 'template',
			'range'       => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
			'selectors'   => array( '{{WRAPPER}} .goso_posts_tabs_widget .recent-comments .avatar' => 'flex: 0 0 {{SIZE}}px;' ),
		) );

		$this->add_responsive_control( 'comments_ava_bdradius', array(
			'label'     => __( 'Avatar Image Border Radius', 'authow' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
			'selectors' => array( '{{WRAPPER}} .goso_posts_tabs_widget .recent-comments .avatar img' => 'border-radius: {{SIZE}}px;' ),
		) );

		$this->end_controls_section();

		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$instance        = $this->get_settings();
		$sticky          = isset( $instance['sticky'] ) ? $instance['sticky'] : true;
		$tabs_order      = isset( $instance['tabs_order'] ) ? $instance['tabs_order'] : 'recent_popular_comments';
		$tabs_style      = isset( $instance['tabs_style'] ) ? $instance['tabs_style'] : 'default';
		$ptfsfe          = isset( $instance['ptfsfe'] ) ? absint( $instance['ptfsfe'] ) : '';
		$ptfs            = isset( $instance['ptfs'] ) ? absint( $instance['ptfs'] ) : '';
		$pmfs            = isset( $instance['pmfs'] ) ? absint( $instance['pmfs'] ) : '';
		$row_gap         = isset( $instance['row_gap'] ) ? absint( $instance['row_gap'] ) : '';
		$imgwidth        = isset( $instance['imgwidth'] ) ? absint( $instance['imgwidth'] ) : '';
		$number_comments = isset( $instance['number_comments'] ) ? $instance['number_comments'] : 5;
		$tabs_icon       = isset( $instance['tabs_icon'] ) ? $instance['tabs_icon'] : false;
		$rand            = rand( 1000, 10000 );
		$tabs_order      = explode( '_', $tabs_order );
		$class           = $tabs_style . '-tabs';
		$this->markup_block_title( $instance, $this );
		?>
        <div class="widget goso_posts_tabs_widget el">
            <div class="penc-posts-tabs <?php echo esc_attr( $class ); ?>" id="pc-wpt-<?php echo $rand; ?>">
                <div class="tabs">
                    <ul>
						<?php $count = 1;
						foreach ( $tabs_order as $tab ) {
							if ( isset( $instance[ 'disable_' . $tab ] ) && ! $instance[ 'disable_' . $tab ] ) {
								$class = $count == 1 ? ' active' : '';
								echo '<li class="li-tab-' . $tab . $class . '" data-tab="tab-' . $tab . '"><a href="#">' . goso_get_setting( 'goso_trans_' . $tab ) . '</a></li>';
								$count ++;
							}
						} ?>
                    </ul>
                </div>
                <div class="tabs-content">
					<?php $tcount = 1;
					foreach ( $tabs_order as $tab ) {
						$check = $tcount == 1;
						if ( isset( $instance[ 'disable_' . $tab ] ) && ! $instance[ 'disable_' . $tab ] ) {
							if ( $tab == 'popular' || $tab == 'recent' ) {
								$this->show_tabs_posts( $instance, $tab, $check );
							} else {
								$size_a = isset( $instance['comments_ava_size']['size'] ) ? $instance['comments_ava_size']['size'] : 70;
								$this->show_comment_posts( $check, $number_comments, $size_a );
							}
						}
						$tcount ++;
					} ?>
                </div>
            </div>
        </div>
		<?php
	}

	public function show_comment_posts( $active = false, $number = 5, $size = 70 ) {
		$comments = get_comments( [
			'number' => $number,
		] );
		$class    = $active ? 'active' : 'inactive';
		?>
        <div class="tab-comments recent-comments <?php echo $class; ?>">
            <ul>
				<?php foreach ( $comments as $comment ) {
					if ( isset( $comment->comment_author_email ) && $comment->comment_author_email ) {
						$usergravatar = 'http://www.gravatar.com/avatar/' . md5( $comment->comment_author_email ) . '?s=' . $size;
					} else {
						$usergravatar = get_avatar_url( $comment->user_id );
					}
					echo '<li>
						        <a href="' . get_author_posts_url( $comment->user_id ) . '" class="avatar"><img src="' . $usergravatar . '" alt=""></a>
						        <div class="author-info"><a href="' . get_author_posts_url( $comment->user_id ) . '">' . $comment->comment_author . '</a> on <a href="' . get_permalink( $comment->comment_post_ID ) . '">' . get_the_title( $comment->comment_post_ID ) . '</a></div>
						     </li>';
				} ?>
            </ul>
        </div>
		<?php
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

	public function show_tabs_posts( $instance, $type, $first = false ) {
		$sticky        = isset( $instance['sticky'] ) ? $instance['sticky'] : true;
		$sticky_value  = ( false == $sticky ) ? 0 : 1;
		$popular_order = isset( $instance['popular_order'] ) ? $instance['popular_order'] : 'all';
		$number        = isset( $instance['number'] ) ? $instance['number'] : '5';
		$offset        = isset( $instance['offset'] ) ? $instance['offset'] : '';
		$title_length  = isset( $instance['title_length'] ) ? $instance['title_length'] : '';
		$featured      = isset( $instance['featured'] ) ? $instance['featured'] : false;
		$dotstyle      = isset( $instance['dotstyle'] ) ? $instance['dotstyle'] : '';
		$movemeta      = isset( $instance['movemeta'] ) ? $instance['movemeta'] : false;
		$twocolumn     = isset( $instance['twocolumn'] ) ? $instance['twocolumn'] : false;
		$featured2     = isset( $instance['featured2'] ) ? $instance['featured2'] : false;
		$ordernum      = isset( $instance['ordernum'] ) ? $instance['ordernum'] : false;
		$allfeatured   = isset( $instance['allfeatured'] ) ? $instance['allfeatured'] : false;
		$thumbright    = isset( $instance['thumbright'] ) ? $instance['thumbright'] : false;
		$postdate      = isset( $instance['postdate'] ) ? $instance['postdate'] : false;
		$icon          = isset( $instance['icon'] ) ? $instance['icon'] : false;
		$hide_thumb    = isset( $instance['hide_thumb'] ) ? $instance['hide_thumb'] : false;
		$showauthor    = isset( $instance['show_author'] ) ? $instance['show_author'] : false;
		$showcomment   = isset( $instance['show_comment'] ) ? $instance['show_comment'] : false;
		$showviews     = isset( $instance['show_postviews'] ) ? $instance['show_postviews'] : false;
		$showborder    = isset( $instance['showborder'] ) ? $instance['showborder'] : false;
		$thumb_size    = isset( $instance['thumb_size'] ) ? $instance['thumb_size'] : 'goso-thumb-small';
		$fthumb_size    = isset( $instance['fthumb_size'] ) ? $instance['fthumb_size'] : 'goso-masonry-thumb';
		$query         = array(
			'meta_key'            => goso_get_postviews_key(),
			'orderby'             => 'meta_value_num',
			'order'               => 'DESC',
			'posts_per_page'      => $number,
			'post_type'           => 'post',
			'ignore_sticky_posts' => $sticky_value
		);

		if ( $popular_order == 'week' ) {
			$query = array(
				'posts_per_page' => $number,
				'meta_key'       => 'goso_post_week_views_count',
				'orderby'        => 'meta_value_num',
				'order'          => 'DESC',
			);
		} elseif ( $popular_order == 'month' ) {
			$query = array(
				'posts_per_page' => $number,
				'meta_key'       => 'goso_post_month_views_count',
				'orderby'        => 'meta_value_num',
				'order'          => 'DESC',
			);
		}
		if ( $offset ) {
			$query['offset'] = $offset;
		}

		if ( $type == 'recent' ) {
			$query    = array(
				'order'               => 'DESC',
				'posts_per_page'      => $number,
				'post_type'           => 'post',
				'ignore_sticky_posts' => $sticky_value
			);
			$ordernum = isset( $instance['ordernum_recent'] ) ? $instance['ordernum_recent'] : true;
		}

		$loop  = new \WP_Query( $query );
		$class = $first ? 'active' : 'inactive';
		?>

        <div class="tab-<?php echo esc_attr( $type . ' ' . $class ); ?>">
            <ul class="goso-wdtab-ct side-newsfeed<?php if ( $twocolumn && ! $allfeatured ): echo ' goso-feed-2columns';
				if ( $featured ) {
					echo ' goso-2columns-featured';
				} else {
					echo ' goso-2columns-feed';
				} endif; ?><?php if ( ! $ordernum ): echo ' display-order-numbers'; endif;
			if ( $dotstyle ) {
				echo ' pctlst pctl-' . $dotstyle;
			}
			if ( $showborder ) {
				echo ' goso-rcpw-hborders';
			} ?>">

				<?php $num = 1;
				while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <li class="goso-feed<?php if ( ( ( $num == 1 ) && $featured ) || $allfeatured ): echo ' featured-news';
						if ( $featured2 ): echo ' featured-news2'; endif; endif; ?><?php if ( $allfeatured ): echo ' all-featured-news'; endif; ?>">
						<?php if ( ! $ordernum && has_post_thumbnail() && ! $hide_thumb ): ?>
                            <span class="order-border-number<?php if ( $thumbright && ! $twocolumn ): echo ' right-side'; endif; ?>">
									<span class="number-post"><?php echo sanitize_text_field( $num ); ?></span>
								</span>
						<?php endif; ?>
                        <div class="side-item">
							<?php if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) && ! $hide_thumb ) : ?>
                                <div class="side-image<?php if ( $thumbright ): echo ' thumbnail-right'; endif; ?>">
									<?php
									/* Display Review Piechart  */
									if ( function_exists( 'goso_display_piechart_review_html' ) ) {
										$size_pie = 'small';
										if ( ( ( $num == 1 ) && $featured ) || $allfeatured ): $size_pie = 'normal'; endif;
										goso_display_piechart_review_html( get_the_ID(), $size_pie );
									}
									$thumb = $thumb_size;
									if ( ( ( $num == 1 ) && $featured ) || $allfeatured ): $thumb = $fthumb_size; endif;
									?>
									<?php if ( ! get_theme_mod( 'goso_disable_lazyload_layout' ) ) { ?>
                                        <a class="goso-image-holder goso-lazy<?php if ( ( ( $num == 1 ) && $featured ) || $allfeatured ) {
											echo '';
										} else {
											echo ' small-fix-size';
										} ?>" rel="bookmark"
                                           data-bgset="<?php echo goso_image_srcset( get_the_ID(), $thumb ); ?>"
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
        </div>

		<?php
	}

}
