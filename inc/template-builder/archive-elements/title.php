<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class GosoArchiveTitle extends \Elementor\Widget_Base {

	public function get_title() {
		return esc_html__( 'Archive - Title', 'authow' );
	}

	public function get_icon() {
		return 'eicon-post-title';
	}

	public function get_categories() {
		return [ 'goso-custom-archive-builder' ];
	}

	public function get_keywords() {
		return [ 'archive', 'title' ];
	}

	protected function get_html_wrapper_class() {
		return 'pcab-atitle elementor-widget-' . $this->get_name();
	}

	public function get_name() {
		return 'goso-archive-title';
	}

	protected function register_controls() {

		$this->start_controls_section( 'content_section', [
			'label' => esc_html__( 'General', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		] );

		$this->add_control( 'heading_markup', [
			'label'   => esc_html__( 'Heading Markup', 'authow' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'default' => 'h1',
			'options' => [
				'h1' => 'H1',
				'h2' => 'H2',
				'h3' => 'H3',
				'h4' => 'H4',
				'h5' => 'H5',
				'h6' => 'H6',
			]
		] );

		$this->add_control( 'heading_align', [
			'label'   => __( 'Heading Align', 'authow' ),
			'type'    => \Elementor\Controls_Manager::CHOOSE,
			'default' => 'left',
			'options' => array(
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
			'toggle'  => true,
		] );

		$this->add_control( 'heading_line', [
			'label'     => __( 'Remove Heading Line', 'authow' ),
			'type'      => \Elementor\Controls_Manager::SWITCHER,
			'selectors' => [
				'{{WRAPPER}} .pcab-abox .title-bar:after' => 'display:none',
				'{{WRAPPER}} .pcab-abox .title-bar'       => 'padding:0;margin:0;',
			],
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'color_style', [
			'label' => esc_html__( 'Color & Styles', 'authow' ),
			'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), array(
			'name'     => 'heading_typo',
			'label'    => __( 'Typography for Prefix Text', 'authow' ),
			'selector' => '{{WRAPPER}} .archive-box',
		) );

		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), array(
			'name'     => 'heading_main_typo',
			'label'    => __( 'Typography for Archive Main Title', 'authow' ),
			'selector' => '{{WRAPPER}} .archive-box .page-title',
		) );

		$this->add_control( 'text-color', [
			'label'    => 'Prefix Text Color',
			'type'     => \Elementor\Controls_Manager::COLOR,
			'selector' => '{{WRAPPER}} .archive-box',
		] );

		$this->add_control( 'main-text-color', [
			'label'     => 'Main Text Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .archive-box .page-title' => 'color:{{VALUE}} !important' ],
		] );

		$this->add_control( 'heading-line-color', [
			'label'     => 'Heading Line Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .pcab-abox .title-bar:after' => 'background-color:{{VALUE}} !important' ],
		] );

		$this->add_control( 'heading-line-s', [
			'label'      => 'Heading Line Spacing with Title',
			'type'       => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px' ],
			'range'      => array(
				'px' => array( 'max' => 500 ),
			),
			'selectors'  => [
				'{{WRAPPER}} .pcab-abox .title-bar' => 'padding-bottom:{{SIZE}}px;',
			],
		] );

		$this->add_control( 'heading-line-w', [
			'label'      => 'Heading Line Width',
			'type'       => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px' ],
			'range'      => array(
				'px' => array( 'max' => 500 ),
			),
			'selectors'  => [
				'{{WRAPPER}} .pcab-abox .title-bar:after'              => 'width:{{SIZE}}px !important;',
				'{{WRAPPER}} .pcab-abox .title-bar.align-center:after' => 'margin-left:calc({{SIZE}}px / 2 * -1)',
			],
		] );

		$this->add_control( 'heading-line-h', [
			'label'      => 'Heading Line Height',
			'type'       => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px' ],
			'range'      => array(
				'px' => array( 'max' => 50 ),
			),
			'selectors'  => [
				'{{WRAPPER}} .pcab-abox .title-bar:after' => 'height:{{SIZE}}px !important;',
			],
		] );

		$this->end_controls_section();

	}

	protected function render() {

		if ( goso_elementor_is_edit_mode() ) {
			$this->preview_content();
		} else {
			$this->builder_content();
		}

	}

	protected function preview_content() {
		$settings    = $this->get_settings_for_display();
		$heading_tag = $settings['heading_markup'];
		$align       = $settings['heading_align'];
		?>
        <div class="archive-box pcab-abox">
            <div class="title-bar align-<?php echo $align; ?>">
                <<?php echo $heading_tag; ?> class="page-title">
				<?php _e( 'General Archive Title', 'authow' ); ?>
            </<?php echo $heading_tag; ?>>
        </div>
        </div>
		<?php
	}

	protected function builder_content() {
		$settings    = $this->get_settings_for_display();
		$heading_tag = $settings['heading_markup'];
		$align       = $settings['heading_align'];
		?>
        <div class="archive-box pcab-abox">
            <div class="title-bar align-<?php echo $align; ?>">
				<?php
				if ( is_day() ) :
					if ( goso_get_setting( 'goso_trans_daily_archives' ) ):
						echo '<span>';
						echo goso_get_setting( 'goso_trans_daily_archives' );
						echo ' </span>';
					endif;
					printf( wp_kses( __( '<' . $heading_tag . ' class="page-title">%s</' . $heading_tag . '>', 'authow' ), goso_allow_html() ), get_the_date() );
                elseif ( is_month() ) :
					if ( goso_get_setting( 'goso_trans_monthly_archives' ) ):
						echo '<span>';
						echo goso_get_setting( 'goso_trans_monthly_archives' );
						echo ' </span>';
					endif;
					printf( wp_kses( __( '<' . $heading_tag . ' class="page-title">%s</' . $heading_tag . '>', 'authow' ), goso_allow_html() ), get_the_date( _x( 'F Y', 'monthly archives date format', 'authow' ) ) );
                elseif ( is_year() ) :
					if ( goso_get_setting( 'goso_trans_yearly_archives' ) ):
						echo '<span>';
						echo goso_get_setting( 'goso_trans_yearly_archives' );
						echo ' </span>';
					endif;
					printf( wp_kses( __( '<' . $heading_tag . ' class="page-title">%s</' . $heading_tag . '>', 'authow' ), goso_allow_html() ), get_the_date( _x( 'Y', 'yearly archives date format', 'authow' ) ) );
                elseif ( is_author() ) :
					echo '<span>';
					echo goso_get_setting( 'goso_trans_author' );
					echo ' </span>';
					printf( wp_kses( __( '<' . $heading_tag . ' class="page-title">%s</' . $heading_tag . '>', 'authow' ), goso_allow_html() ), get_userdata( get_query_var( 'author' ) )->display_name );
                elseif ( is_category() ):
					if ( ! get_theme_mod( 'goso_remove_cat_words' ) ): ?>
                        <span><?php echo goso_get_setting( 'goso_trans_category' ); ?></span>
					<?php endif;
					printf( wp_kses( __( '<' . $heading_tag . ' class="page-title">%s</' . $heading_tag . '>', 'authow' ), goso_allow_html() ), single_cat_title( '', false ) );
                elseif ( is_tag() ):
					if ( ! get_theme_mod( 'goso_remove_tag_words' ) ): ?>
                        <span><?php echo goso_get_setting( 'goso_trans_tag' ); ?></span>
					<?php endif;
					printf( wp_kses( __( '<' . $heading_tag . ' class="page-title">%s</' . $heading_tag . '>', 'authow' ), goso_allow_html() ), single_tag_title( '', false ) );
                elseif ( is_search() ):
					echo '<span>' . goso_get_setting( 'goso_trans_search_results_for' ) . '</span> ';
					printf( wp_kses( __( '<' . $heading_tag . ' class="page-title">"%s"</' . $heading_tag . '>', 'authow' ), goso_allow_html() ), get_search_query() );
                elseif ( is_tax() ) :
					the_archive_title( '<' . $heading_tag . ' class="page-title">', '</' . $heading_tag . '>' );
                else :
					echo '<' . $heading_tag . ' class="page-title">';
					echo goso_get_setting( 'goso_trans_archives' );
					echo '</' . $heading_tag . '>';
				endif;
				?>
            </div>
        </div>
		<?php
	}
}
