<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class GosoSingleShare extends \Elementor\Widget_Base {

	public function get_title() {
		return esc_html__( 'Post - Social Share', 'authow' );
	}

	public function get_icon() {
		return 'eicon-share-arrow';
	}

	public function get_categories() {
		return [ 'goso-single-builder' ];
	}

	public function get_keywords() {
		return [ 'single', 'comment', 'share' ];
	}

	protected function get_html_wrapper_class() {
		return 'pcsb-share elementor-widget-' . $this->get_name();
	}

	public function get_name() {
		return 'goso-single-share';
	}

	protected function register_controls() {

		$this->start_controls_section( 'content_section', [
			'label' => esc_html__( 'General', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		] );

		$share_style = [];
		for ( $i = 1; $i <= 23; $i ++ ) {
			$v                      = $i < 4 ? 's' : 'n';
			$n                      = $i < 4 ? $i : $i - 3;
			$share_style[ $v . $n ] = 'Style ' . $i;
		}

		$this->add_control( 'goso_single_style_cscount', [
			'label'   => esc_html__( 'Share Style', 'authow' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'default' => 's1',
			'options' => $share_style
		] );

		$this->add_control( 'goso_single_meta_comment', [
			'label'     => esc_html__( 'Hide Comment?', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'condition' => [ 'goso_single_style_cscount' => [ 's1', 's2', 's3' ] ],
		] );

		$this->add_control( 'goso_single_share_label', [
			'label'     => esc_html__( 'Hide Share Label?', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'condition' => [ 'goso_single_style_cscount!' => [ 's1', 's2', 's3' ] ],
			'selectors' => [ '{{WRAPPER}} .goso-social-share-text' => 'display:none !important' ],
		] );

		$this->add_control( 'goso__hide_share_plike', [
			'label' => esc_html__( 'Hide Post Like?', 'authow' ),
			'type'  => \Elementor\Controls_Manager::SWITCHER,
		] );

		$this->add_control( 'meta_align', [
			'label'     => __( 'Social Align', 'authow' ),
			'type'      => \Elementor\Controls_Manager::CHOOSE,
			'default'   => 'left',
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
			'selectors' => [ '{{WRAPPER}} .tags-share-box' => 'text-align:{{VALUE}}' ],
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'label_style', [
			'label'     => esc_html__( 'Colors', 'authow' ),
			'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
			'condition' => [ 'goso_single_share_label!' => [ 'yes' ] ],
		] );

		$this->add_control( 'comment_text_color', [
			'label'     => 'Comment Text Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .single-comment-o'                       => 'color:{{VALUE}}',
				'{{WRAPPER}} .tags-share-box .single-comment-o:after' => 'background-color:{{VALUE}};opacity: 0.5;'
			],
			'condition' => [ 'goso_single_style_cscount' => [ 's1' ] ],
		] );

		$this->add_control( 'label_color', [
			'label'     => 'Share Label Text Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .pcnew-share .goso-social-share-text,{{WRAPPER}} .tags-share-box.tags-share-box-2_3 .goso-social-share-text' => 'color:{{VALUE}}' ],
		] );

		$this->add_control( 'label_icolor', [
			'label'     => 'Share Label Icon Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .pcnew-share .goso-social-share-text i,{{WRAPPER}} .tags-share-box.tags-share-box-2_3 .goso-social-share-text i' => 'color:{{VALUE}}' ],
		] );

		$this->add_control( 'label_bdcolor', [
			'label'     => 'Share Label Borders Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pcnew-share .goso-social-share-text'        => 'border-color:{{VALUE}}',
				'{{WRAPPER}} .pcnew-share .goso-social-share-text:before' => 'border-left-color:{{VALUE}}',
				'body.rtl {{WRAPPER}} .pcnew-share .goso-social-share-text:before' => 'border-left-color:transparent;border-right-color:{{VALUE}}',
			],
		] );

		$this->add_control( 'label_bgcolor', [
			'label'     => 'Share Label Background Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pcnew-share .goso-social-share-text'       => 'background-color:{{VALUE}}',
				'{{WRAPPER}} .pcnew-share .goso-social-share-text:after' => 'border-left-color:{{VALUE}};',
				'body.rtl {{WRAPPER}} .pcnew-share .goso-social-share-text:after' => 'border-right-color:{{VALUE}};',
			],
		] );

		$this->add_control( 'like_btn_head', [
			'label' => 'Like Button',
			'type'  => \Elementor\Controls_Manager::HEADING,
		] );

		$this->add_control( 'likebtn_bgcolor', [
			'label'     => 'Like Button Background Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .tags-share-box.tags-share-box-2_3 .post-share-plike,{{WRAPPER}} .tags-share-box-n19.post-share a.goso-post-like,{{WRAPPER}} .tags-share-box-n20.post-share a.goso-post-like,{{WRAPPER}} .tags-share-box.tags-share-box-s2 .post-share-plike,{{WRAPPER}} .pcnew-share .post-share-item.post-share-plike' => 'background-color:{{VALUE}}' ],
			'condition' => [
				'goso_single_style_cscount!' => [ 's1' ]
			],
		] );

		$this->add_control( 'likebtn_color', [
			'label'     => 'Like Button Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .black-ver .post-share-plike i,{{WRAPPER}} .post-share.tags-share-box-2_3.post-share .count-number-like,{{WRAPPER}} .tags-share-box.tags-share-box-2_3.post-share .post-share-item .goso-post-like,{{WRAPPER}} .pcnew-share.goso-icon-full .post-share-item.post-share-plike i,{{WRAPPER}} .tags-share-box-n19.pcnew-share.border-style .post-share-item.post-share-plike i, {{WRAPPER}} .tags-share-box-n20.pcnew-share.border-style .post-share-item.post-share-plike i, {{WRAPPER}} .tags-share-box-n20 .post-share-item.post-share-plike i,{{WRAPPER}} .goso-social-textcolored .post-share-plike i.fa-heart-o, {{WRAPPER}} .tags-share-box.tags-share-box-s2 .post-share-plike .count-number-like,{{WRAPPER}} .tags-share-box.tags-share-box-s2 .post-share-plike .goso-post-like,{{WRAPPER}} .pcnew-share .post-share-item.post-share-plike .count-number-like,{{WRAPPER}} .pcnew-share .post-share-item.post-share-plike .goso-post-like' => 'color:{{VALUE}} !important' ],
		] );

		$this->add_control( 'likebtn_bcolor', [
			'label'     => 'Like Button Borders Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .tags-share-box.tags-share-box-s2 .post-share-plike,{{WRAPPER}} .pcnew-share .post-share-item.post-share-plike' => 'border-color:{{VALUE}}' ],
			'condition' => [
				'goso_single_style_cscount' => [ 'n16', 'n17', 'n18', 'n19', 'n20', 'n21', 'n22', 'n23' ]
			],
		] );

		$this->add_control( 'social_color_head', [
			'label'     => 'Social Icons',
			'type'      => \Elementor\Controls_Manager::HEADING,
			'condition' => [
				'goso_single_style_cscount' => [
					's1',
					's3',
					'n14',
					'n15',
					'n17',
					'n18',
					'n19',
					'n20',
					'n21',
					'n22',
					'n23'
				]
			],
		] );

		$this->add_control( 'social_bgcolor', [
			'label'     => 'Social Background Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} a.post-share-item,{{WRAPPER}} .black-ver .post-share-item,{{WRAPPER}} .black-ver .post-share-item i' => 'background-color:{{VALUE}}' ],
			'condition' => [
				'goso_single_style_cscount' => [
					's1',
					's3',
					'n14',
					'n15',
					'n16',
					'n17',
					'n18',
					'n19',
					'n20',
					'n21',
					'n22',
					'n23'
				]
			],
		] );

		$this->add_control( 'social_bghcolor', [
			'label'     => 'Social Hover Background Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} a.post-share-item:hover,{{WRAPPER}} .black-ver .post-share-item:hover,{{WRAPPER}} .black-ver .post-share-item:hover i' => 'background-color:{{VALUE}}' ],
			'condition' => [
				'goso_single_style_cscount' => [
					's1',
					's3',
					'n14',
					'n15',
					'n16',
					'n17',
					'n18',
					'n19',
					'n20',
					'n21',
					'n22',
					'n23'
				]
			],
		] );

		$this->add_control( 'social_color', [
			'label'     => 'Social Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} a.post-share-item,{{WRAPPER}} .black-ver .post-share-item i,{{WRAPPER}} .show-txt.post-share a .dt-share' => 'color:{{VALUE}}' ],
			'condition' => [
				'goso_single_style_cscount' => [
					's1',
					's3',
					'n14',
					'n15',
					'n17',
					'n18',
					'n19',
					'n20',
					'n21',
					'n22',
					'n23'
				]
			],
		] );

		$this->add_control( 'social_hcolor', [
			'label'     => 'Social Hover Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} a.post-share-item:hover,{{WRAPPER}} .black-ver .post-share-item:hover i,{{WRAPPER}} .show-txt.post-share a:hover .dt-share' => 'color:{{VALUE}}' ],
			'condition' => [
				'goso_single_style_cscount' => [
					's1',
					's3',
					'n14',
					'n15',
					'n17',
					'n18',
					'n19',
					'n20',
					'n21',
					'n22',
					'n23'
				]
			],
		] );

		$this->add_control( 'social_bcolor', [
			'label'     => 'Social Borders Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} a.post-share-item,{{WRAPPER}} .pcnew-share.goso-icon-full.border-style .post-share-item i' => 'border-color:{{VALUE}}' ],
			'condition' => [
				'goso_single_style_cscount' => [ 's1', 's3', 'n16', 'n17', 'n18', 'n19', 'n20', 'n21', 'n22', 'n23' ]
			],
		] );

		$this->add_control( 'social_bhcolor', [
			'label'     => 'Social Hover Borders Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} a.post-share-item:hover,{{WRAPPER}} .pcnew-share.goso-icon-full.border-style .post-share-item:hover i' => 'border-color:{{VALUE}}' ],
			'condition' => [
				'goso_single_style_cscount' => [ 's1', 's3', 'n16', 'n17', 'n18', 'n19', 'n20', 'n21', 'n22', 'n23' ]
			],
		] );

		$this->add_control( 'plus_btn_head', [
			'label' => 'Plus Button',
			'type'  => \Elementor\Controls_Manager::HEADING,
		] );

		$this->add_control( 'plus_btn_color', [
			'label'     => 'Plus Button Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} a.post-share-expand,{{WRAPPER}} .black-ver .post-share-expand i,{{WRAPPER}} .tags-share-box.tags-share-box-2_3 .post-share-expand,{{WRAPPER}} .goso-social-colored .post-share-item.post-share-expand i, {{WRAPPER}} .tags-share-box.tags-share-box-s2 .post-share-item.post-share-expand i' => 'color:{{VALUE}} !important' ],
		] );

		$this->add_control( 'plus_btn_hcolor', [
			'label'     => 'Plus Button Hover Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} a.post-share-expand:hover,{{WRAPPER}} .black-ver .post-share-expand:hover i,{{WRAPPER}} .tags-share-box.tags-share-box-2_3 .post-share-expand:hover,{{WRAPPER}} .goso-social-colored .post-share-item.post-share-expand:hover i, {{WRAPPER}} .tags-share-box.tags-share-box-s2 .post-share-item.post-share-expand:hover i' => 'color:{{VALUE}} !important' ],
		] );

		$this->add_control( 'plus_btn_bgcolor', [
			'label'     => 'Plus Button Background Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} a.post-share-expand,{{WRAPPER}} .black-ver .post-share-expand,{{WRAPPER}} .black-ver .post-share-expand i,{{WRAPPER}} .tags-share-box.tags-share-box-2_3 .post-share-expand,{{WRAPPER}} .goso-social-colored .post-share-item.post-share-expand i, {{WRAPPER}} .tags-share-box.tags-share-box-s2 .post-share-item.post-share-expand' => 'background-color:{{VALUE}} !important' ],
		] );

		$this->add_control( 'plus_btn_bghcolor', [
			'label'     => 'Plus Button Background Hover Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} a.post-share-expand:hover,{{WRAPPER}} .black-ver .post-share-expand:hover,{{WRAPPER}} .black-ver .post-share-expand:hover i,{{WRAPPER}} .tags-share-box.tags-share-box-2_3 .post-share-expand:hover,{{WRAPPER}} .goso-social-colored .post-share-item.post-share-expand:hover i, {{WRAPPER}} .tags-share-box.tags-share-box-s2 .post-share-item.post-share-expand:hover' => 'background-color:{{VALUE}} !important' ],
		] );

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$style_cscount    = $settings['goso_single_style_cscount'];
		$wrapper_class    = array();
		$wrapper_class[]  = 'tags-share-box';
		$wrapper_class[]  = is_page() ? 'page-share hide-tags' : 'single-post-share';
		$wrapper_class[]  = 'tags-share-box-' . $style_cscount;
		$wrapper_class_c1 = 's1' == $style_cscount ? ' center-box' : ' tags-share-box-2_3';
		$wrapper_class[]  = strpos( $style_cscount, 'n' ) !== false ? ' pcnew-share' : $wrapper_class_c1;

		if ( in_array( $style_cscount, [ 'n1', 'n3', 'n5', 'n8', 'n9', 'n10', 'n11', 'n12', 'n13', 'n19', 'n20' ] ) ) {
			$wrapper_class[] = ' goso-social-colored';
		}

		if ( in_array( $style_cscount, [
			'n1',
			'n3',
			'n5',
			'n8',
			'n9',
			'n10',
			'n11',
			'n12',
			'n13',
			'n14',
			'n16',
			'n19',
			'n20'
		] ) ) {
			$wrapper_class[] = ' goso-icon-full';
		}

		if ( in_array( $style_cscount, [ 'n2', 'n4', 'n6', 'n7', 'n9', 'n11', 'n13' ] ) ) {
			$wrapper_class[] = ' tags-share-box-s2';
		}

		if ( in_array( $style_cscount, [
			'n2',
			'n4',
			'n6',
			'n7',
			'n9',
			'n11',
			'n13',
			'n15',
			'n17',
			'n18',
			'n19',
			'n20'
		] ) ) {
			$wrapper_class[] = ' show-txt';
		}

		if ( in_array( $style_cscount, [ 'n3', 'n4', 'n18' ] ) ) {
			$wrapper_class[] = ' rounder';
		}

		if ( in_array( $style_cscount, [ 'n5', 'n6', 'n10', 'n11' ] ) ) {
			$wrapper_class[] = ' show-shadow';
		}

		if ( in_array( $style_cscount, [ 'n7' ] ) ) {
			$wrapper_class[] = ' focus-icon';
		}

		if ( in_array( $style_cscount, [ 'n8', 'n9', 'n10', 'n11', 'n12', 'n13' ] ) ) {
			$wrapper_class[] = ' size-large';
		}

		if ( in_array( $style_cscount, [ 'n9', 'n11', 'n13' ] ) ) {
			$wrapper_class[] = ' txt-below';
		}

		if ( in_array( $style_cscount, [ 'n12', 'n13' ] ) ) {
			$wrapper_class[] = ' no-spacing';
		}

		if ( in_array( $style_cscount, [ 'n14', 'n15' ] ) ) {
			$wrapper_class[] = ' black-ver';
		}

		if ( in_array( $style_cscount, [ 'n16', 'n17', 'n18', 'n19', 'n20' ] ) ) {
			$wrapper_class[] = ' border-style';
		}

		if ( in_array( $style_cscount, [ 'n16', 'n17', 'n18' ] ) ) {
			$wrapper_class[] = ' goso-social-textcolored';
		}

		if ( in_array( $style_cscount, [ 'n19', 'n20' ] ) ) {
			$wrapper_class[] = ' full-border';
		}

		?>
        <div class="<?php echo esc_attr( implode( ' ', $wrapper_class ) ); ?> post-share<?php if ( $settings['goso__hide_share_plike'] ): echo ' hide-like-count'; endif; ?>">
			<?php
			if ( 's1' != $style_cscount ) {
				echo '<span class="goso-social-share-text">';
				echo '<i class="gosoicon-sharing"></i>';
				echo goso_get_setting( 'goso_trans_share' ) ? do_shortcode( goso_get_setting( 'goso_trans_share' ) ) : 'Share';
				echo '</span>';
			}
			?>
			<?php if ( ! $settings['goso_single_meta_comment'] && 's1' == $style_cscount && ! is_page() ) : ?>
                <span class="single-comment-o"><?php goso_fawesome_icon( 'far fa-comment' ); ?><?php comments_number( '0 ' . goso_get_setting( 'goso_trans_comment' ), '1 ' . goso_get_setting( 'goso_trans_comment' ), '% ' . goso_get_setting( 'goso_trans_comments' ) ); ?></span>
			<?php endif; ?>

			<?php if ( ! $settings['goso__hide_share_plike'] && ! is_page() ): ?>
                <span class="post-share-item post-share-plike">
		            <?php echo goso_single_getPostLikeLink( get_the_ID() ); ?>
                    </span>
			<?php endif; ?>
			<?php goso_authow_social_share(); ?>
        </div>
		<?php

	}
}
