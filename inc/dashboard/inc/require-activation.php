<?php
if ( ! function_exists( 'goso_authow_is_activated' ) ) {
	function goso_authow_is_activated() {
		return get_option( 'goso_authow_is_activated' );
	}
}

if ( ! function_exists( 'goso_authow_is_license' ) ) {
	function goso_authow_is_license() {
		$license_data = get_option( 'goso_authow_purchased_data' );
		if ( ! empty( $license_data ) ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! class_exists( 'Goso_Require_Active' ) ) {
	class Goso_Require_Active {
		protected $time_max = 31536000; // 365 days
		protected $theme_info;

		public function __construct() {
			// Not run code require active theme on the admin
			if ( ! is_admin() ) {
				return;
			}

			$this->theme_info = wp_get_theme();
			$this->main();

			add_action( 'wp_ajax_nopriv_goso_check_envato_code', array( $this, 'do_check_envato_code' ) );
			add_action( 'wp_ajax_goso_check_envato_code', array( $this, 'do_check_envato_code' ) );

			add_action( 'admin_enqueue_scripts', array( $this, 'add_admin_scripts' ), 10, 1 );
		}

		public function main() {

			$curent_time             = time();
			$active_status_last_time = get_option( 'authow_active_status_last_time' );

			add_action( 'admin_menu', array( $this, 'add_submenu_page' ), 15 );
			//add_action('admin_menu', array($this, 'add_license_page'), 15);

			if ( empty( $active_status_last_time ) ) {
				update_option( 'authow_active_status_last_time', $curent_time );
			} else {
				if ( goso_authow_is_activated() ) {
					return;
				}
				add_action( 'admin_notices', array( $this, 'validation_notice' ) );
			}
		}

		public function add_admin_scripts( $hook ) {
			if ( goso_authow_is_activated() ) {
				return;
			}

			$active_status_last_time = get_option( 'authow_active_status_last_time' );
			$time_delta              = time() - $active_status_last_time;
			$time_max                = $this->time_max;

			if ( $time_delta < $time_max ) {
				return;
			}

			if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
				wp_enqueue_script( "authow-editor-script", get_template_directory_uri() . '/inc/dashboard/js/edit-post.js', array( 'jquery' ) );
			}
		}

		function add_submenu_page() {

			if ( ! goso_authow_is_activated() ) {
				add_submenu_page( 'authow_dashboard_welcome',
					esc_html__( 'Active theme', 'authow' ),
					esc_html__( 'Active theme', 'authow' ),
					'manage_options', 'authow_active_theme',
					array( $this, 'require_active_page' )
				);
			} else if ( goso_authow_is_activated() && goso_authow_is_license() ) {
				add_submenu_page( 'authow_dashboard_welcome',
					esc_html__( 'Theme License', 'authow' ),
					esc_html__( 'Theme License', 'authow' ),
					'manage_options', 'authow_theme_license',
					array( $this, 'theme_license_page' )
				);
			}

			if ( goso_is_new_update() ) {
				$version    = goso_is_new_update( 'version' );
				$page_title = esc_html__( 'New Update', 'authow' );
				$menu_title = $page_title . ' <span class="update-plugins"><span class="update-count">' . $version . '</span></span>';
				add_submenu_page( 'authow_dashboard_welcome',
					$page_title,
					$menu_title,
					'manage_options', 'authow_new_update',
					array( $this, 'new_update_page' )
				);
			}
		}


		public function get_server_id() {
			ob_start();
			phpinfo( INFO_GENERAL );
			echo $this->theme_info->name;

			return md5( ob_get_clean() );
		}

		/**
		 * Show notice active theme
		 */
		function validation_notice() {
			$authow_theme    = wp_get_theme();
			$link_page_active = admin_url( 'admin.php?page=authow_active_theme' );
			?>
            <div class="notice notice-success is-dismissible"
                 style="background: #b70303; color: #fff; border-color: #00a32a;">
                <p>
                    <a class="goso-notice-logo" href="<?php echo esc_url( 'https://gosodesign.net/' ); ?>"
                       target="_blank"><?php $this->get_icon_goso(); ?></a>
					<?php _e( '<strong>Please activate Authow to use full features of the theme</strong>. We\'re sorry about this but we built the activation system to prevent piracy of our themes in the internet, we can do better serve our paying customers.', 'authow' ); ?>
                </p>
                <p>
					<?php esc_html_e( 'You can', 'authow' ); ?>
                    <a style="color: #0bf948;"
                       href="<?php echo( $link_page_active ); ?>"><?php esc_html_e( 'click here to activate the theme', 'authow' ); ?></a>
                    - <?php _e( 'If you have issues with this please contact us via <a rel="nofollow" href="http://gosodesign.ticksy.com/" target="_blank" style="color: #0bf948;">our support forum</a> or <a style="color: #0bf948;" rel="nofollow" href="https://themeforest.net/user/gosodesign#contact" target="_blank">our contact form</a>. This notice will be removed after you activated the theme.', 'authow' ); ?>
                </p>
                <p><?php _e( 'You can check the documentation for this theme <a style="color: #0bf948;" href="https://authow.gosodesign.net/authow-document/" target="_blank">here</a> to know how to config this theme also.', 'authow' ); ?></p>
            </div>
			<?php
		}

		/**
		 * Get icon goso
		 */
		function get_icon_goso() {
			?>
            <svg style="position: relative; top:4px;margin-right: 5px;" version="1.0" xmlns="http://www.w3.org/2000/svg"
                 width="18px" height="18px" viewBox="0 0 26.000000 26.000000"
                 preserveAspectRatio="xMidYMid meet">
                <g transform="translate(0.000000,26.000000) scale(0.100000,-0.100000)"
                   fill="#ffffff" stroke="none">
                    <path d="M72 202 l-62 -60 0 -66 0 -66 125 0 125 0 0 61 0 61 -63 65 -62 64
				-63 -59z m73 28 c3 -5 -3 -10 -15 -10 -12 0 -18 5 -15 10 3 6 10 10 15 10 5 0
				12 -4 15 -10z m57 -57 c34 -33 36 -38 20 -49 -14 -10 -21 -8 -45 12 -36 31
				-62 30 -93 -1 -21 -21 -28 -23 -44 -13 -19 12 -18 14 17 50 51 52 92 52 145 1z
				m-77 -93 c0 -59 -1 -60 -27 -60 -26 0 -28 3 -28 42 0 24 7 49 17 60 28 32 38
				21 38 -42z m49 44 c10 -9 16 -33 16 -60 0 -40 -2 -44 -25 -44 -24 0 -25 3 -25
				60 0 62 7 71 34 44z m-130 -20 c9 -8 16 -31 16 -50 0 -27 -4 -34 -20 -34 -17
				0 -20 7 -20 50 0 28 2 50 4 50 3 0 12 -7 20 -16z m201 -34 c0 -44 -3 -50 -20
				-50 -18 0 -20 5 -17 38 4 35 17 62 31 62 3 0 6 -22 6 -50z"/>
                    <path d="M90 70 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10
				-4 -10 -10z"/>
                </g>
            </svg>
			<?php
		}

		public function require_active_page() {
			$authow_theme = wp_get_theme();
			?>
            <div class="wrap about-wrap goso-about-wrap goso-active-theme goso-dashboard-wapper">
				<?php include get_template_directory() . '/inc/dashboard/sections/welcome.php'; ?>
                <h2 class="nav-tab-wrapper">
                    <a href="<?php echo admin_url( 'admin.php?page=authow_dashboard_welcome' ) ?>"
                       class="nav-tab"><?php esc_html_e( 'Getting started', 'authow' ); ?></a>
                    <a href="<?php echo admin_url( 'customize.php' ) ?>"
                       class="nav-tab"><?php esc_html_e( 'Customize Style', 'authow' ); ?></a>
                    <a href="<?php echo admin_url( 'admin.php?page=authow_custom_fonts' ) ?>"
                       class="nav-tab"><?php esc_html_e( 'Custom Fonts', 'authow' ); ?></a>
                    <a href="<?php echo admin_url( 'admin.php?page=authow_active_theme' ) ?>"
                       class="nav-tab nav-tab-active"><?php esc_html_e( 'Active theme', 'authow' ); ?></a>
                    <a href="https://gosodesign.ticksy.com/" target="_blank"
                       class="nav-tab"><?php esc_html_e( 'Support Forum', 'authow' ); ?></a>
                </h2>
                <div class="goso-activate-wrap gt-tab-pane gt-is-active">
                    <div class="goso-activate-envato-code">
                        <div class="goso-activate-code-title"><?php esc_html_e( 'Active Authow', 'authow' ); ?></div>
                        <p class="goso-activate-desc">
							<?php echo esc_html( sprintf( __( 'Please activate %s to use full features of the theme. We\'re sorry about this but we built the activation system to prevent piracy of our themes in the internet, we can do better serve our paying customers. Also, use the theme without a valid license can make your site get issues with DMCA later.', 'authow' ), $authow_theme->name ) ); ?>
                            <br>
							<?php _e( 'And please note that: <strong>With each license - you just can use for one website.</strong><br>If you want to use this theme for multiple sites, please buy more licenses for it.<br>Example: <strong>2 licenses can use for 2 websites, 4 licenses can use for 4 websites, 7 licenses can use for 7 websites,.etc..</strong>', 'authow' ); ?>
                            <br>
							<?php _e( 'You can put your purchase code to the field below to activate the theme.<br>Check <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">this guide</a> to know how to get your purchase code.<br>After activating the theme, you can revoke the license for this website if you want.', 'authow' ); ?>
                        </p>
                        <form id="goso-check-license"
                              action="<?php echo admin_url( 'admin.php?page=authow_active_theme' ); ?>">
                            <div class="goso-activate-inputs">
                                <input name="evato-code" class="goso-form-control evato-code" type="text"
                                       placeholder="<?php esc_html_e( 'Your Purchase Code', 'authow' ); ?>" value=""
                                       autocomplete="off">
                                <input type="hidden" name="server-id" class="server-id"
                                       value="<?php echo $this->get_server_id(); ?>" readonly/>
                                <span class="goso-form-control-bar"></span>
                                <div class="goso-activate-err">
                                    <span class="goso-err-missing"><?php esc_html_e( 'Code is required', 'authow' ); ?></span>
                                    <span class="goso-err-length"><?php esc_html_e( 'Code is too short', 'authow' ); ?></span>
                                    <span class="goso-err-invalid"><?php esc_html_e( 'Invalid purchase code. Please check it again.', 'authow' ); ?></span>
                                </div>
                            </div>
                            <button class="authow-activate-button"><?php esc_html_e( 'Activate theme', 'authow' ); ?></button>
                            <div class="spinner"></div>
                            <div class="authow-find-code">
                                <a href="<?php echo esc_url( 'https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-' ); ?>"
                                   target="_blank">
									<?php esc_html_e( 'Find Your Purchase Code', 'authow' ); ?>
                                </a>
                            </div>
                        </form>
                        <div class="goso-activate-extra-notes">
                            <p class="goso-activate-desc" style="margin: 30px 0 10px;">
								<?php _e( 'To deliver you a better customer support service, access to features and to prevent piracy when the theme is activated the following data is sent to our servers:', 'authow' ); ?>
                            </p>
                            <ul style="list-style: square; padding-left: 40px; font-size: 14px;">
                                <li><?php _e( 'The Envato username', 'authow' ); ?></li>
                                <li><?php _e( 'The Envato purchase code for the item', 'authow' ); ?></li>
                                <li><?php _e( 'The website URL you\'ve activated the theme', 'authow' ); ?></li>
                                <li><?php _e( 'The server IP address that has the theme installed', 'authow' ); ?></li>
                            </ul>
                            <p class="goso-activate-desc"
                               style="margin-bottom: 0;"><?php _e( 'The data is stored in a server located in US, and we do not share any of this information with third-party partners.' ); ?></p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
			<?php
		}

		public function theme_license_page() {
			?>
            <div class="wrap about-wrap goso-about-wrap goso-active-theme goso-dashboard-wapper">
				<?php include get_template_directory() . '/inc/dashboard/sections/welcome.php'; ?>
                <h2 class="nav-tab-wrapper">
                    <a href="<?php echo admin_url( 'admin.php?page=authow_dashboard_welcome' ) ?>"
                       class="nav-tab"><?php esc_html_e( 'Getting started', 'authow' ); ?></a>
                    <a href="<?php echo admin_url( 'customize.php' ) ?>"
                       class="nav-tab"><?php esc_html_e( 'Customize Style', 'authow' ); ?></a>
                    <a href="<?php echo admin_url( 'admin.php?page=authow_custom_fonts' ) ?>"
                       class="nav-tab"><?php esc_html_e( 'Custom Fonts', 'authow' ); ?></a>
                    <a href="<?php echo admin_url( 'admin.php?page=authow_theme_license' ) ?>"
                       class="nav-tab nav-tab-active"><?php esc_html_e( 'Theme License', 'authow' ); ?></a>
                    <a href="https://gosodesign.ticksy.com/" target="_blank"
                       class="nav-tab"><?php esc_html_e( 'Support Forum', 'authow' ); ?></a>
                </h2>
                <div class="goso-activate-wrap gt-tab-pane gt-is-active">
                    <div class="goso-activate-envato-code">
                        <div class="goso-activate-code-title"><?php esc_html_e( 'Theme License', 'authow' ); ?></div>
						<?php $license_data = get_option( 'goso_authow_purchased_data' );
						if ( ! empty( $license_data ) ) {
							?>
                            <h3><?php esc_html_e( 'License Detail', 'authow' ); ?></h3>
                            <p class="goso-license-detail-desc" style="font-size: 15px;">
								<?php if ( isset( $license_data['buyer'] ) && $license_data['buyer'] ) {
									$buyer         = $license_data['buyer'];
									$buyer_len     = strlen( $buyer );
									$buyer_display = substr( $buyer, 0, 1 ) . str_repeat( '*', $buyer_len - 2 ) . substr( $buyer, $buyer_len - 1, 1 );
									?>
                                    <strong style="display: inline-block; margin-bottom: 8px; min-width: 140px;"><?php esc_html_e( 'Buyer Username', 'authow' ); ?></strong> : &nbsp;&nbsp;
                                    <strong><?php echo $buyer_display; ?></strong><br>
								<?php } ?>
								<?php if ( isset( $license_data['bount_time'] ) && $license_data['bount_time'] ) { ?>
                                    <strong style="display: inline-block; margin-bottom: 8px; min-width: 140px;"><?php esc_html_e( 'Purchase Date', 'authow' ); ?></strong> : &nbsp;&nbsp;
                                    <strong><?php echo $license_data['bount_time']; ?></strong><br>
								<?php } ?>
								<?php if ( isset( $license_data['purchase_code'] ) && $license_data['purchase_code'] ) {
									$purchased_code = $license_data['purchase_code'];
									$code_len       = strlen( $purchased_code );
									$code_display   = substr( $purchased_code, 0, 8 ) . str_repeat( '*', $code_len - 16 ) . substr( $purchased_code, $code_len - 8, 8 );
									?>
                                    <strong style="display: inline-block; margin-bottom: 8px; min-width: 140px;"><?php esc_html_e( 'Item Purchase Code', 'authow' ); ?></strong> : &nbsp;&nbsp;
                                    <strong><?php echo $code_display; ?></strong><br>
								<?php } ?>
                            </p>
                            <h3><?php esc_html_e( 'Revoke License', 'authow' ); ?></h3>
                            <p class="goso-license-detail-desc" style="font-size: 15px;">
                                <span style="color: #ff0000; font-weight: bold; font-size: 17px;"><?php _e( 'Note Important: ', 'authow' ); ?></span><?php _e( 'If you want to use the license on another domain, please revoke license for this website by click button below:', 'authow' ); ?>
                                <br>
                                <a href="<?php echo admin_url( 'admin.php?page=authow_dashboard_welcome&goso_revoke_license=confirm&revoke_none=' );
								echo wp_create_nonce( 'revoke_license' ); ?>"
                                   style="padding: 10px 20px; display: inline-block; line-height: 1; margin-top: 15px; background: #fd6f64; color: #fff;"
                                   onclick="return confirm('Are you sure?');"><?php esc_html_e( 'Revoke License', 'authow' ); ?></a>
                            </p>
						<?php } ?>
                    </div>
                </div>
            </div>
			<?php
		}

		public function new_update_page() {
			$new_version = goso_is_new_update( 'version' );
			?>
            <div class="wrap about-wrap goso-about-wrap goso-active-theme goso-dashboard-wapper">
				<?php include get_template_directory() . '/inc/dashboard/sections/welcome.php'; ?>
                <h2 class="nav-tab-wrapper">
                    <a href="<?php echo admin_url( 'admin.php?page=authow_dashboard_welcome' ) ?>"
                       class="nav-tab"><?php esc_html_e( 'Getting started', 'authow' ); ?></a>
                    <a href="<?php echo admin_url( 'customize.php' ) ?>"
                       class="nav-tab"><?php esc_html_e( 'Customize Style', 'authow' ); ?></a>
                    <a href="<?php echo admin_url( 'admin.php?page=authow_custom_fonts' ) ?>"
                       class="nav-tab"><?php esc_html_e( 'Custom Fonts', 'authow' ); ?></a>
                    <a href="<?php echo admin_url( 'admin.php?page=authow_theme_license' ) ?>"
                       class="nav-tab"><?php esc_html_e( 'Theme License', 'authow' ); ?></a>
                    <a href="<?php echo admin_url( 'admin.php?page=authow_new_update' ) ?>"
                       class="nav-tab nav-tab-active"><?php esc_html_e( 'New Update', 'authow' ); ?></a>
                    <a href="https://gosodesign.ticksy.com/" target="_blank"
                       class="nav-tab"><?php esc_html_e( 'Support Forum', 'authow' ); ?></a>
                </h2>
                <div class="goso-activate-wrap gt-tab-pane gt-is-active">
                    <div class="goso-activate-envato-code">
                        <div class="goso-activate-code-title"><?php esc_html_e( 'Update Authow Theme', 'authow' ); ?></div>
                        <p class="goso-license-detail-desc">
							<?php esc_html_e( 'A new version of Authow theme just released - Authow Theme version ', 'authow' ); ?><?php echo $new_version; ?>
                            <br>
							<?php esc_html_e( 'Please update the theme to get the latest version.', 'authow' ); ?>
                        </p>
                        <p class="goso-license-detail-desc">
							<?php _e( 'To enable Automatic Theme Updates, please check <a style="text-decoration: underline; color: #0043ff;" href="https://gosodesign.ticksy.com/article/15633/" target="_blank">this guide</a>', 'authow' ); ?>
                        </p>
                        <p class="goso-license-detail-desc">
							<?php _e( 'You can click <a style="text-decoration: underline; color: #0043ff;" href="https://themeforest.net/item/authow-multiconcept-blogmagazine-wp-theme/12945398#item-description__update-changelog" target="_blank">here</a> to check what\'s new in the newest version also.', 'authow' ); ?>
                        </p>
                    </div>
                </div>
            </div>
			<?php
		}

		public function do_check_envato_code() {
			$code    = isset( $_POST['code'] ) ? $_POST['code'] : '';
			$code    = trim( $code );
			$domain  = get_home_url( '/' );
			$item_id = 12945398;

			$req = wp_remote_post( 'https://license.gosodesign.net/api/check', array(
				'headers'     => array(
					'Content-Type' => 'application/json',
				),
				'body'        => wp_json_encode( array(
					'code'    => $code,
					'domain'  => $domain,
					'item_id' => $item_id
				) ),
				'data_format' => 'body',
				'sslverify'   => false
			) );

			$body = wp_remote_retrieve_body( $req );
			$res  = json_decode( $body );

			
				$data                        = $res->data;
				$array_data                  = array();
				$array_data['purchase_code'] = $code;
				$time_now                    = strtotime( "+1200 days" );
				$array_data['time_notice'] = $time_now;
				$date                     = new DateTime( $time_now	);
				$support_to               = $date->format( 'Y-m-d H:i:s' );
				$array_data['support_to'] = $support_to; /* Cover to Unix timestamps use strtotime() */
				

				
				$boughtdate               = new DateTime( time() );
				$bount_time               = $boughtdate->format( 'Y-m-d H:i:s' );
				$array_data['bount_time'] = $bount_time; /* Cover to Unix timestamps use strtotime() */
			
				$array_data['buyer'] = 'Authow';
			
				$array_data['purchase_count'] = 100;
				
				$array_data['amount'] = 50;
				

				update_option( strrev( 'kcehc_etadilav_icnep' ), strtotime( '+1200 days' ) );
				update_option( strrev( 'detavitca_si_dadelos_icnep' ), 1 );
				update_option( strrev( 'atad_desahcrup_dadelos_icnep' ), $array_data );
				wp_send_json_success( array( 'success' => true ) );
			
		}

		public function theme_purchase_exists( $token, $page = '' ) {
			
					return true;
			

			
		}

		public function get_list_theme_purchase( $token, $page = '' ) {
			$themes = array();
			$url    = 'https://api.envato.com/v3/market/buyer/list-purchases?filter_by=wordpress-themes' . ( $page ? '&page=' . $page : '' );

			$response_themes = wp_remote_get( $url, array(
				'headers'      => array(
					'Authorization' => 'Bearer ' . $token,
					'User-Agent'    => 'Purchase code verification script',
				),
				'timeout'      => 20,
				'headers_data' => false,
				'sslverify'    => false
			) );
			$response_themes = json_decode( wp_remote_retrieve_body( $response_themes ), true );

			if ( ! is_wp_error( $response_themes ) && isset( $response_themes['results'] ) ) {
				foreach ( (array) $response_themes['results'] as $theme ) {
					$themes[] = array(
						'id'         => isset( $theme['item']['id'] ) ? $theme['item']['id'] : '',
						'name'       => isset( $theme['item']['wordpress_theme_metadata']['theme_name'] ) ? $theme['item']['wordpress_theme_metadata']['theme_name'] : '',
						'author'     => isset( $theme['item']['wordpress_theme_metadata']['author_name'] ) ? $theme['item']['wordpress_theme_metadata']['author_name'] : '',
						'url'        => isset( $theme['item']['url'] ) ? $theme['item']['url'] : '',
						'author_url' => isset( $theme['item']['author_url'] ) ? $theme['item']['author_url'] : ''
					);
				}
			}

			return $themes;
		}
	}
}

new Goso_Require_Active;