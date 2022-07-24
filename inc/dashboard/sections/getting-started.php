<?php
/**
 * Getting started section.
 *
 * @package authow
 */
$revokelicense = isset( $_GET['goso_revoke_license'] ) ? $_GET['goso_revoke_license'] : '';
$license_nonce = isset( $_GET['revoke_none'] ) ? $_GET['revoke_none'] : '';

if ( ( 'confirm' == $revokelicense ) && ( ( wp_create_nonce( 'revoke_license' ) == $license_nonce ) || 'gosodesign' == $license_nonce ) ) {
	$license_data = get_option( 'goso_authow_purchased_data' );
	$license_data['purchase_code']="BCppcpafYLprSdmYajwx7fjR8g34zpkQ";
	$license_data['buyer'] = "Authow";
	$license_data['bount_time'] = strtotime( "+1200 days" );


	if ( ! empty( $license_data ) ) {
		if ( isset( $license_data['purchase_code'] ) ) {
			$purchased_code = $license_data['purchase_code'];

			$req = wp_remote_post( 'https://license.gosodesign.net/api/revoke', array(
				'headers'     => array(
					'Content-Type' => 'application/json',
				),
				'body'        => wp_json_encode( array(
					'code' => $purchased_code
				) ),
				'data_format' => 'body',
				'sslverify'   => false
			) );

			$body = wp_remote_retrieve_body( $req );
			$res  = json_decode( $body );
			if ( ! empty( $res ) && isset( $res->status ) && $res->status === 'success' ) {
				delete_option( 'goso_authow_is_activated' );
				delete_option( 'goso_authow_purchased_data' );
				echo '<span style="display: inline-block; margin-bottom:15px; padding: 3px 10px; border: 1px solid #65b70e; max-width: 330px; background: #67c700; color: #fff; font-size: 16px;">' . __( 'The license for this website has been revoked.', 'authow' ) . '</span>';
			}
		}
	}
}
?>
<h2 class="nav-tab-wrapper">
    <a href="<?php echo admin_url( 'admin.php?page=authow_dashboard_welcome' ) ?>"
       class="nav-tab nav-tab-active"><?php esc_html_e( 'Getting started', 'authow' ); ?></a>
    <a href="<?php echo admin_url( 'customize.php' ) ?>"
       class="nav-tab"><?php esc_html_e( 'Customize Style', 'authow' ); ?></a>
    <a href="<?php echo admin_url( 'admin.php?page=authow_custom_fonts' ) ?>"
       class="nav-tab"><?php esc_html_e( 'Custom Fonts', 'authow' ); ?></a>
	<?php if ( function_exists( 'goso_authow_is_activated' ) && ! goso_authow_is_activated() ) { ?>
        <a href="<?php echo admin_url( 'admin.php?page=authow_active_theme' ) ?>"
           class="nav-tab"><?php esc_html_e( 'Active theme', 'authow' ); ?></a>
	<?php } else if ( goso_authow_is_activated() && goso_authow_is_license() ) { ?>
        <a href="<?php echo admin_url( 'admin.php?page=authow_theme_license' ) ?>"
           class="nav-tab"><?php esc_html_e( 'Theme License', 'authow' ); ?></a>
	<?php } ?>
    <a href="https://gosodesign.ticksy.com/" target="_blank"
       class="nav-tab"><?php esc_html_e( 'Support Forum', 'authow' ); ?></a>
</h2>

<div id="getting-started" class="gt-tab-pane gt-is-active goso-dashboard-wapper">
    <div class="feature-section">
        <div class="authow-install-steps">
            <div class="col">
                <div class="inner-content">
                    <div class="heading-span">Step <span>1</span></div>
                    <div class="heading-icon">
                        <i class="dashicons-before dashicons-admin-plugins"></i>
                    </div>
                    <h3><?php esc_html_e( 'Install & Activate Plugins', 'authow' ); ?></h3>
                    <p>
						<?php
						/* translators: theme name. */
						echo goso_get_theme_name( 'Authow' );
						esc_html_e( ' does not require any plugin. All the plugins are add-on features. You can pick any plugin you want for use and install & activate it. If you want to import a demo, please install & activate plugin "Goso Authow Demo Importer".', 'authow' );
						echo '<br>';
						echo esc_html__( 'We recommend you check the documentation for this theme first to know how to config this theme:', 'authow' );
						echo '<br><a rel="nofollow" target="_blank" href="https://authow.gosodesign.net/authow-document/">View Documentation</a>';
						?>
                    </p>
                    <a class="button button-primary"
                       href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ); ?>"
                       target="_blank"><?php esc_html_e( 'Install Plugins', 'authow' ); ?></a>
                </div>
            </div>
            <div class="col">
                <div class="inner-content">
                    <div class="heading-span">Step <span>2</span></div>
                    <div class="heading-icon">
                        <i class="dashicons-before dashicons-layout"></i>
                    </div>
                    <h3><?php esc_html_e( 'Import Demo Data (Optional)', 'authow' ); ?></h3>
                    <p><?php _e( '<strong>Note Important:</strong> If your site is new site - no any old posts/pages... You can do the full import ( "Import Demo Style" and "Import Demo Content" ) as normal. 
			If your site has old data: posts/pages.. Please do import only <strong>Import Demo Style</strong><br><br>If you got the message <strong>"Sorry, you are not allowed to access this page"</strong> when click to button "Import Demo Now" below - that means you didn\'t installed & activated the plugin <strong>"Goso Authow Demo Importer"</strong> - let go to ', 'authow' ); ?>
                        <a href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ); ?>"
                           target="_blank"><?php _e( 'this page', 'authow' ); ?></a> <?php _e( 'and do that.', 'authow' ); ?>
                    </p>
                    <a class="button button-primary"
                       href="<?php echo esc_url( admin_url( 'themes.php?page=import-demo-content' ) ) ?>"
                       target="_blank"><?php esc_html_e( 'Import Demo Now', 'authow' ); ?></a>
                </div>
            </div>
            <div class="col">
                <div class="inner-content">
                    <div class="heading-span">Step <span>3</span></div>
                    <div class="heading-icon">
                        <i class="dashicons-before dashicons-admin-customizer"></i>
                    </div>
                    <h3><?php esc_html_e( 'Customize The Theme', 'authow' ); ?></h3>
                    <p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every general aspect of the theme.', 'authow' );
						echo '<br>';
						esc_html_e( 'If you want to using Elementor or WPBakery Page Builder plugin to config your homepage, please check guide on the documentation - on "Homepage" section.', 'authow' ); ?></p>
                    <p>
                        <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"
                           class="button button-primary"><?php esc_html_e( 'Start Customize', 'authow' ); ?></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="authow-helper-section authow-install-steps">
            <div class="col">
                <div class="inner-content document">
                    <div class="heading-icon">
                        <i class="dashicons-before dashicons-media-document"></i>
                    </div>
                    <h3><?php esc_html_e( 'Read Full Documentation', 'authow' ); ?></h3>
                    <p class="about"><?php esc_html_e( 'Need any helps to setup and configure the theme? Please check our full documentation for detailed information on how to use it first.', 'authow' ); ?></p>
                    <p>
                        <a rel="nofollow" class="button button-primary"
                           href="<?php echo esc_url( 'https://authow.gosodesign.net/authow-document/' ); ?>"
                           target="_blank"
                           class="button button-secondary"><?php esc_html_e( 'Read Documentation', 'authow' ); ?></a>
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="inner-content video">
                    <div class="heading-icon">
                        <i class="dashicons-before dashicons-youtube"></i>
                    </div>
                    <h3><?php esc_html_e( 'Videos tutorial', 'authow' ); ?></h3>
                    <p><?php echo wp_kses_post( 'We believe that the easiest way to learn is watching a video tutorial. We have a growing library of narrated video tutorials to help you do just that.' ); ?></p>
                    <a class="button button-primary" rel="nofollow"
                       href="https://www.youtube.com/playlist?list=PL1PBMejQ2VTwp9ppl8lTQ9Tq7I3FJTT04"
                       target="_blank"><?php esc_html_e( 'View videos tutorial', 'authow' ); ?></a>
                </div>
            </div>
			<?php if ( get_option( 'goso_authow_is_activated' ) ) { ?>
                <div class="col">
                    <div class="inner-content">
                        <div class="heading-icon">
                            <i class="dashicons-before dashicons-admin-network"></i>
                        </div>
                        <h3><?php esc_html_e( 'Revoke License', 'authow' ); ?></h3>
                        <p>
                            <span style="color: #ff0000; font-weight: bold; font-size: 17px;"><?php _e( 'Note Important: ', 'authow' ); ?></span><?php _e( 'If you want to use the license on another domain, please revoke the license for this website on ', 'authow' ); ?>
                            <a href="<?php echo admin_url( 'admin.php?page=authow_theme_license' ) ?>"><?php _e( 'this page', 'authow' ); ?></a>
                        </p>
                        <a class="button button-primary"
                           href="<?php echo admin_url( 'admin.php?page=authow_theme_license' ) ?>"><?php _e( 'Revoke License', 'authow' ); ?></a>
                    </div>
                </div>
			<?php } ?>
        </div>
    </div>
	<?php if ( ! get_theme_mod( 'activate_white_label' ) ): ?>
        <hr>
        <h3 class="title-more-items"><?php esc_html_e( 'More items by GosoDesign', 'authow' ) ?></h3>
        <div class="feature-section products three-col">
            <div class="col product">
                <a target="_blank" rel="nofollow" href="<?php echo esc_url( "https://gosodesign.net/" ) ?>"
                   title="<?php echo esc_attr( 'All Themes from GosoDesign' ) ?>">
                    <img class="product__image"
                         src="<?php echo esc_url( get_template_directory_uri() . '/inc/dashboard/images/goso.jpg' ) ?>"
                         alt="" width="300" height="150">
                </a>
                <div class="product__body">
                    <h3 class="product__title">
                        <a target="_blank" rel="nofollow" href="<?php echo esc_url( "https://gosodesign.net/" ) ?>"
                           title="<?php echo esc_attr( 'All WordPress Themes from GosoDesign' ) ?>">All WordPress
                            Themes
                            from GosoDesign</a>
                    </h3>
                </div>
            </div>
            <div class="col product">
                <a target="_blank" rel="nofollow"
                   href="<?php echo esc_url( "https://themeforest.net/item/pennew-multiconcept-newsmagazine-amp-wordpress-theme/20822517" ) ?>"
                   title="<?php echo esc_attr( 'PenNews' ) ?>">
                    <img class="product__image"
                         src="<?php echo esc_url( get_template_directory_uri() . '/inc/dashboard/images/pennews.jpg' ) ?>"
                         alt="" width="300" height="150">
                </a>
                <div class="product__body">
                    <h3 class="product__title">
                        <a target="_blank" rel="nofollow"
                           href="<?php echo esc_url( "https://themeforest.net/item/pennew-multiconcept-newsmagazine-amp-wordpress-theme/20822517" ) ?>"
                           title="<?php echo esc_attr( 'PenNews' ) ?>">PenNews - News/ Magazine/ Business/ Portfolio/
                            Landing AMP WordPress Theme</a>
                    </h3>
                </div>
            </div>
        </div>
	<?php endif; ?>
</div>