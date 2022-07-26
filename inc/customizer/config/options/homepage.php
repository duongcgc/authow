<?php
/**
 * @author : GosoDesign
 */

namespace AuthowFW\Customizer;

/**
 * Class Theme Authow Customizer
 */
class HomepageOption extends CustomizerOptionAbstract {

	public $panelID = 'goso_homepage_panel';

	public function set_option() {
		$this->set_panel();
		$this->set_section();
	}

	public function set_panel() {
		$this->customizer->add_panel( [
			'id'          => $this->panelID,
			'title'       => esc_html__( 'Homepage', 'authow' ),
			'description' => __( 'This is a powerful WordPress theme, it supports 3 ways to help you can setup a homepage - you can check more <a target="_blank" href="https://authow.gosodesign.net/authow-document/#homepage">here</a>.<br>And most of all the options here apply when you use <strong>WAY 2: Config Homepage by use Customize</strong>.', 'authow' ),
			'priority'    => $this->id,
		] );
	}

	public function set_section() {
		$this->add_lazy_section( 'goso_section_homepage_general_section', esc_html__( 'General', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'goso_section_homepage_featured_boxes_section', esc_html__( 'Home Featured Boxes', 'authow' ), $this->panelID, __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/featured-boxes.png">this image</a> to understand what is Featured Boxes.', 'authow' ) );
		$this->add_lazy_section( 'goso_section_homepage_popular_posts_section', esc_html__( 'Home Popular Posts', 'authow' ), $this->panelID, __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/home-popular-posts.png">this image</a> to understand what is Home Popular Posts.', 'authow' ) );
		$this->add_lazy_section( 'goso_section_homepage_title_box_section', esc_html__( 'Home Title Box', 'authow' ), $this->panelID, __( 'You can understand "Home Title Box" is the block heading title of a featured category or block heading title of the "Latest Posts" section on the homepage.<br>Please check more on <a target="_blank" href="https://imgresources.s3.amazonaws.com/home-title-box.png">this image</a>.', 'authow' ) );
		$this->add_lazy_section( 'goso_section_homepage_featured_cat_section', esc_html__( 'Featured Categories', 'authow' ), $this->panelID, __( 'Please check <a target="_blank" href="https://authow.gosodesign.net/authow-magazine/">this demo</a> for example and <a target="_blank" href="https://imgresources.s3.amazonaws.com/featured-categories.png">this image</a> to understand what is Featured Categories.', 'authow' ) );
		$this->add_lazy_section( 'goso_section_homepage_fontsize_section', esc_html__( 'Font Size', 'authow' ), $this->panelID );
		$this->add_lazy_section( 'goso_section_homepage_colors_section', esc_html__( 'Colors', 'authow' ), $this->panelID );
	}
}
