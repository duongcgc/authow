<?php
namespace GosoAuthowElementor\Modules\GosoFacebookPage\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoFacebookPage extends Base_Widget {

	public function get_name() {
		return 'goso-facebook-page';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Facebook Page', 'authow' );
	}

	public function get_icon() {
		return 'eicon-fb-feed';
	}
	
	public function get_categories() {
		return [ 'goso-elements' ];
	}

	public function get_keywords() {
		return array( 'facebook', 'social', 'embed', 'page' );
	}

	protected function register_controls() {
		

		// Section layout
		$this->start_controls_section(
			'section_page', array(
				'label' => esc_html__( 'Page', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'page_url', array(
				'label'       => __( 'Facebook Page URL', 'authow' ),
				'placeholder' => 'https://www.facebook.com/your-page/',
				'default'     => 'https://www.facebook.com/GosoDesign',
				'label_block' => true,
				'description' => __( 'Paste the URL of the Facebook page.', 'authow' ),
			)
		);

		$this->add_responsive_control(
			'page_height', array(
				'label'   => __( 'Facebook Page Height', 'authow' ),
				'description' => __( 'This option is only applied when "Hide Stream" option is not checked', 'authow' ),
				'type'    => Controls_Manager::SLIDER,
				'default' => array( 'size' => '290' ),
				'range'   => array( 'px' => array( 'min' => 100, 'max' => 500, ) ),
			)
		);
		
		$this->add_control(
			'hide_cover', array(
				'label'     => __( 'Hide Cover Photo?', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => '',
			)
		);
		
		$this->add_control(
			'hide_faces', array(
				'label'     => __( 'Hide Faces', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => '',
			)
		);
		$this->add_control(
			'hide_stream', array(
				'label'     => __( 'Hide Stream', 'authow' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => '',
			)
		);
		
		$this->add_control(
			'language', array(
				'label'       => __( 'Custom Language', 'authow' ),
				'placeholder' => 'en_GB',
				'default'     => '',
				'label_block' => true,
				'description' => __( 'Fill the language code to use on Facebook Page Box here. By default, the language will follow the site language. See more <a href="https://developers.facebook.com/docs/internationalization/" target="_blank">here</a>', 'authow' ),
			)
		);

		$this->end_controls_section();
		$this->register_block_title_section_controls();
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		if ( empty( $settings['page_url'] ) ) {
			echo $this->get_title() . ': ' . esc_html__( 'Please enter a valid URL', 'authow' );

			return;
		}

		$css_class = 'goso-block-vc goso_facebook_widget';

		$height = $settings['page_height']['size'] ? $settings['page_height']['size'] : '';
		$title_page = $settings['heading'] ? $settings['page_height'] : '';
		$page_url = $settings['page_url'] ? $settings['page_url'] : '';
		$faces = $settings['hide_faces'] ? $settings['hide_faces'] : '';
		$stream = $settings['hide_stream'] ? $settings['hide_stream'] : '';
		$cover = $settings['hide_cover'] ? $settings['hide_cover'] : '';
		$language = $settings['language'] ? $settings['language'] : '';
		
		$lang = $language ? $language : get_locale();
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="goso-block_content">
				<div id="fb-root"></div>
				<script data-cfasync="false">(function(d, s, id){
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/<?php echo esc_attr($lang)?>/sdk.js#xfbml=1&version=v9.0";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-page" data-href="<?php echo esc_url( $page_url ); ?>"<?php if( ! $stream && is_numeric( $height ) && $height > 69 ): ?> data-height="<?php echo absint( $height ); ?>"<?php endif;?> data-small-header="false" data-hide-cover="<?php if($cover) { echo 'true'; } else { echo 'false'; } ?>" data-show-facepile="<?php if($faces) { echo 'false'; } else { echo 'true'; } ?>" data-show-posts="<?php if($stream) { echo 'false'; } else { echo 'true'; } ?>" data-adapt-container-width="true">
					<div class="fb-xfbml-parse-ignore"><a href="<?php echo esc_attr( $page_url ); ?>"><?php if($title_page) { echo sanitize_text_field( $title_page ); } else { echo 'Facebook'; } ?></a></div>
				</div>
			</div>
		</div>
		<?php
	}
}
