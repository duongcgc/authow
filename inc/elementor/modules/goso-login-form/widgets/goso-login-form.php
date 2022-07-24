<?php
namespace GosoAuthowElementor\Modules\GosoLoginForm\Widgets;

use GosoAuthowElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GosoLoginForm extends Base_Widget {

	public function get_name() {
		return 'goso-login-form';
	}

	public function get_title() {
		return goso_get_theme_name('Goso').' '.esc_html__( ' Login/Register Form', 'authow' );
	}

	public function get_icon() {
		return 'eicon-lock-user';
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
				'label' => esc_html__( 'General', 'authow' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		
		$this->add_control(
			'app_id', array(
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<span style="color: #888;font-size: 12px;">Please note that when a user is logged in, the registration form will be hidden. And if you select to show "Register" form, you need to go to Dashboard > Settings > General > on "Membership" select "Anyone can register" to make the Register form displays.</span>',
				'content_classes' => 'elementor-descriptor',
			)
		);
		
		$this->add_control(
			'form_style', array(
				'label'   => __( 'Choose Form Type', 'authow' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'login',
				'options' => array(
					'login'    => esc_html__( 'Login', 'authow' ),
					'register' => esc_html__( 'Register', 'authow' ),
				)
			)
		);

		$this->end_controls_section();
		$this->register_block_title_section_controls();

		// Design
		$this->start_controls_section(
			'section_design_content',
			array(
				'label' => __( 'Content', 'authow' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'pformtext_color',
			array(
				'label'     => __( 'Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-user-login' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pformtext_typo',
				'label'    => __( 'Description Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-user-login',
			)
		);
		$this->add_control(
			'pinput_color',
			array(
				'label'     => __( 'Input Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .goso-register-wrap input[type="text"]'     => 'color: {{VALUE}};',
					'{{WRAPPER}} .goso-register-wrap input[type="email"]'    => 'color: {{VALUE}};',
					'{{WRAPPER}} .goso-register-wrap input[type="url"]'      => 'color: {{VALUE}};',
					'{{WRAPPER}} .goso-register-wrap input[type="password"]' => 'color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-login input[type="text"]'        => 'color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-login input[type="email"]'       => 'color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-login input[type="url"]'         => 'color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-login input[type="password"]'    => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'pinput_placeholder_color',
			array(
				'label'     => __( 'Input Placeholder Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} form input::-webkit-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} form input:-moz-placeholder'          => 'color: {{VALUE}};',
					'{{WRAPPER}} form input::-ms-input-placeholder'     => 'color: {{VALUE}};',
					'{{WRAPPER}} form input::placeholder'     => 'color: {{VALUE}}; opacity: 1;',
				),
			)
		);
		$this->add_control(
			'pinput_border_color',
			array(
				'label'     => __( 'Input Border Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .goso-register-wrap input[type="text"]'     => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .goso-register-wrap input[type="email"]'    => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .goso-register-wrap input[type="url"]'      => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .goso-register-wrap input[type="password"]' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-login input[type="text"]'        => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-login input[type="email"]'       => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-login input[type="url"]'         => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-login input[type="password"]'    => 'border-color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'pinput_bgcolor',
			array(
				'label'     => __( 'Input Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .goso-register-wrap input[type="text"]'     => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .goso-register-wrap input[type="email"]'    => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .goso-register-wrap input[type="url"]'      => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .goso-register-wrap input[type="password"]' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-login input[type="text"]'        => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-login input[type="email"]'       => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-login input[type="url"]'         => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-login input[type="password"]'    => 'background-color: {{VALUE}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pinput_typo',
				'label'    => __( 'Input Typography', 'authow' ),
				'selector' => '{{WRAPPER}}  .goso-register-wrap input[type="text"],{{WRAPPER}}  .goso-register-wrap input[type="email"],{{WRAPPER}}  .goso-register-wrap input[type="password"],{{WRAPPER}}  .goso-user-login input[type="text"],{{WRAPPER}}  .goso-user-login input[type="email"],{{WRAPPER}}  .goso-user-login input[type="password"]'
			)
		);
		$this->add_control(
			'psubmitbtn_color',
			array(
				'label'     => __( 'Button Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .goso-register-wrap input[type="submit"],{{WRAPPER}} .goso-user-login input[type="submit"], .goso-user-logged-in .goso-user-action-links a' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'psubmitbtn_bgcolor',
			array(
				'label'     => __( 'Button Background Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .goso-register-wrap input[type="submit"]'        => 'background-color: {{VALUE}};border-color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-login input[type="submit"]'           => 'background-color: {{VALUE}};border-color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-logged-in .goso-user-action-links a' => 'background-color: {{VALUE}};border-color: {{VALUE}};'
				),
			)
		);
		$this->add_control(
			'psubmitbtn_hcolor',
			array(
				'label'     => __( 'Button Hover Text Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .goso-register-wrap input[type="submit"]:hover'        => 'color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-login input[type="submit"]:hover'           => 'color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-logged-in .goso-user-action-links a:hover' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'psubmitbtn_hbgcolor',
			array(
				'label'     => __( 'Button Background Hover Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .goso-register-wrap input[type="submit"]:hover'        => 'background-color: {{VALUE}};border-color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-login input[type="submit"]:hover'           => 'background-color: {{VALUE}};border-color: {{VALUE}};',
					'{{WRAPPER}} .goso-user-logged-in .goso-user-action-links a:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}};'
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'psubmitbtn_typo',
				'label'    => __( 'Button Typography', 'authow' ),
				'selector' => '{{WRAPPER}} .goso-register-wrap input[type="submit"],{{WRAPPER}} .goso-user-login input[type="submit"],{{WRAPPER}} .goso-user-logged-in .goso-user-action-links a'
			)
		);
		
		$this->add_control(
			'ploginregis_link',
			array(
				'label'     => __( 'Login & Register Links Color', 'authow' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .goso-loginform-extra a'        => 'color: {{VALUE}};border-color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();
		
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		$form_type = $settings['form_style'];

		$css_class  = 'goso-block-vc goso-login-register';

		$current_url = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		if( ! is_user_logged_in() || ( $form_type != 'register' && is_user_logged_in() ) ){
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="goso-block_content">
				<div class="goso-login-wrap goso-user-login clearfix<?php echo( 'login' != $form_type ? ' hidden' : '' ); ?>">
					<?php
					if ( ! is_user_logged_in() ) {
						\Goso_Vc_Helper::_login_form();
					} else {
						$current_user = wp_get_current_user();
						?>
						<div class="goso-user-logged-in">
							<div class="goso-login-header">
								<div class="goso-login-avatar">
									<?php echo get_avatar( $current_user->ID, 85 ); ?>
								</div>
								<p>
									<span class="goso-text-hello"><?php echo goso_get_setting( 'goso_trans_hello_text' ); ?></span>
									<span class="goso-display_name"><?php echo $current_user->display_name; ?></span>
								</p>
							</div>
							<div class="goso-user-action-links">
								<?php
								if ( class_exists( 'bbpress' ) ) {
									$profile_url = bbp_get_user_profile_url( bbp_get_current_user_id() );
								} else {
									$profile_url = get_edit_user_link();
								}
								?>
								<a class="goso-button goso-button-ptofile" href="<?php echo $profile_url; ?>"><?php goso_fawesome_icon('far fa-user-circle'); ?> <?php echo goso_get_setting( 'goso_trans_profile_text' ); ?></a>
								<a class="goso-button goso-button-logout" href="<?php echo wp_logout_url( $current_url ); ?>"><?php goso_fawesome_icon('fas fa-sign-out-alt'); ?> <?php echo goso_get_setting( 'goso_trans_logout_text' ); ?></a>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<?php if( ! is_user_logged_in() && get_option( 'users_can_register' ) ){ ?>
				<div class="goso-register-wrap clearfix<?php echo( 'register' != $form_type ? ' hidden' : '' ); ?>">
					<div class="goso-register-container">
						<form name="form" id="goso-registration-form" class="goso-registration-form" action="<?php echo esc_url( site_url( 'wp-login.php?action=register', 'login_post' ) ); ?>" method="post" novalidate="novalidate">
							<input type="hidden" name="_wpnonce" class="goso_form_nonce" value="<?php echo wp_create_nonce( 'register' ); ?>">
							<p class="register-input">
								<input class="goso_first_name goso-input" name="goso_first_name" type="text" placeholder="<?php echo goso_get_setting( 'goso_pregister_first_name' ); ?>"/>
							</p>
							<p class="register-input">
								<input class="goso_last_name goso-input" name="goso_last_name" type="text" placeholder="<?php echo goso_get_setting( 'goso_pregister_last_name' ); ?>"/>
							</p>
							<p class="register-input">
								<input class="goso_user_name goso-input" name="goso_user_name" type="text" placeholder="<?php echo goso_get_setting( 'goso_pregister_user_name' ); ?>"/>
							</p>
							<p class="register-input">
								<input class="goso_user_email goso-input" name="goso_user_email" type="email" placeholder="<?php echo goso_get_setting( 'goso_pregister_user_email' ); ?>"/>
							</p>
							<p class="register-input">
								<input class="goso_user_pass goso-input" name="goso_user_pass" type="password" placeholder="<?php echo goso_get_setting( 'goso_pregister_user_pass' ); ?>"/>
							</p>
							<p class="register-input">
								<input class="goso_user_pass_confirm goso-input" name="goso_user_pass_confirm" type="password" placeholder="<?php echo goso_get_setting( 'goso_pregister_pass_confirm' ); ?>"/>
							</p>
							<?php do_action( 'register_form' ); ?>
							<p class="register-input">
								<input type="submit" name="goso_submit" class="button" value="<?php echo goso_get_setting( 'goso_pregister_button_submit' ); ?>"/>
							</p>
						</form>
						<?php
						echo '<div class="goso-loginform-extra"><a class="goso-user-login-here" href="' . esc_url( wp_login_url() ) . '">' . goso_get_setting( 'goso_pregister_label_registration' ) . '</a></div>';
						?>
					</div>
				</div>
				<?php } ?>
				<div class="goso-loading-icon"><?php goso_fawesome_icon('fas fa-spinner fa-pulse fa-3x fa-fw'); ?></div>
			</div>
		</div>
		<?php
		}
	}
}
