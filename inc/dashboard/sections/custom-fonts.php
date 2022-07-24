<?php
/**
 * Getting started section.
 *
 * @package authow
 */

?>
<h2 class="nav-tab-wrapper">
	<a href="<?php echo admin_url( 'admin.php?page=authow_dashboard_welcome' ) ?>" class="nav-tab"><?php esc_html_e( 'Getting started', 'authow' ); ?></a>
	<a href="<?php echo admin_url( 'customize.php' ) ?>" class="nav-tab"><?php esc_html_e( 'Customize Style', 'authow' ); ?></a>
	<a href="<?php echo admin_url( 'admin.php?page=authow_custom_fonts' ) ?>" class="nav-tab nav-tab-active"><?php esc_html_e( 'Custom Fonts', 'authow' ); ?></a>
	<?php if( function_exists( 'goso_authow_is_activated' ) && ! goso_authow_is_activated() ){ ?>
	<a href="<?php echo admin_url( 'admin.php?page=authow_active_theme' ) ?>" class="nav-tab"><?php esc_html_e( 'Active theme', 'authow' ); ?></a>
	<?php } else if( goso_authow_is_activated() && goso_authow_is_license() ) { ?>
	<a href="<?php echo admin_url( 'admin.php?page=authow_theme_license' ) ?>" class="nav-tab"><?php esc_html_e( 'Theme License', 'authow' ); ?></a>
	<?php } ?>
    <a href="https://gosodesign.ticksy.com/" target="_blank"
       class="nav-tab"><?php esc_html_e( 'Support Forum', 'authow' ); ?></a>
</h2>

<div id="goso-custom-fonts" class="gt-tab-pane gt-is-active goso-dashboard-wapper">

	<form method="post" action="options.php">
		<table class="widefat goso-table-options" cellspacing="0">
			<thead>
			<tr><th colspan="4">
					<h4 style="margin: 6px 0 15px 0; font-weight: bold; font-size: 20px;"><?php esc_html_e( 'Custom font files','authow' ); ?></h4>
					<p class="description">
						<?php esc_html_e( 'You can generate your font file and format into .woff using','authow' ); ?>
						<a rel="nofollow" href="<?php echo esc_url( 'http://www.fontsquirrel.com/tools/webfont-generator' ); ?>"><?php esc_html_e( 'fontsquirrel','authow' ); ?></a>
						<?php esc_html_e( '(free tool)','authow' ); ?>
						<br>
						<?php esc_html_e( 'After the fonts is uploaded - You need to refresh your customizer to see your font on the font list.','authow' ); ?>
					</p>
				</th></tr>
			</thead>
			<tbody>
			<tr>
				<td class="custom-fonts-name">
					<strong><?php esc_html_e( 'Custom font file 1','authow' ); ?></strong>
					<span class="status-small-text"><?php esc_html_e( 'Upload the link to the file ( .woff format )','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<div class="goso-upload-font-controls">
						<?php
						$unique_id_1 = 'authow-cf1';
						?>
						<input id="<?php echo esc_attr( $unique_id_1 ); ?>" style="width: 100%" type="text" class="goso-upload-link-font" name="authow_custom_font1" value="<?php echo esc_attr( goso_get_option('authow_custom_font1') ); ?>" />
						<div class="goso-upload-font-actions">
							<a id="<?php echo esc_attr( $unique_id_1 ); ?>-button-upload" class="button button-upload"><?php esc_html_e( 'Upload','authow' ); ?></a>
							<a id="<?php echo esc_attr( $unique_id_1 ); ?>-button-delete" class="button button-remove <?php echo ( ! goso_get_option('authow_custom_font3') ? 'button-hide' : '' ); ?>"><?php esc_html_e( 'Remove','authow' ); ?></a>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font family 1','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'The font name you can find','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<input id="<?php echo esc_attr( $unique_id_1 ); ?>family" style="width: 50%" type="text" class="goso-upload-link-font" name="authow_custom_fontfamily1" value="<?php echo esc_attr( goso_get_option('authow_custom_fontfamily1') ); ?>" />

				</td>
			</tr>
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font file 2','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'Upload the link to the file ( .woff format )','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<div class="goso-upload-font-controls">
						<?php
						$unique_id_2 = 'authow-cf2';
						?>
						<input id="<?php echo esc_attr( $unique_id_2 ); ?>" style="width: 100%" type="text" class="goso-upload-link-font" name="authow_custom_font2" value="<?php echo esc_attr( goso_get_option('authow_custom_font2') ); ?>" />
						<div class="goso-upload-font-actions">
							<a id="<?php echo esc_attr( $unique_id_2 ); ?>-button-upload" class="button button-upload"><?php esc_html_e( 'Upload','authow' ); ?></a>
							<a id="<?php echo esc_attr( $unique_id_2 ); ?>-button-delete" class="button button-remove <?php echo ( ! goso_get_option('authow_custom_font3') ? 'button-hide' : '' ); ?>"><?php esc_html_e( 'Remove','authow' ); ?></a>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font family 2','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'The font name you can find','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<input id="<?php echo esc_attr( $unique_id_2 ); ?>family" style="width: 50%" type="text" class="goso-upload-link-font" name="authow_custom_fontfamily2" value="<?php echo esc_attr( goso_get_option('authow_custom_fontfamily2') ); ?>" />

				</td>
			</tr>
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font file 3','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'Upload the link to the file ( .woff format )','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<div class="goso-upload-font-controls">
						<?php
						$unique_id_3 = 'authow-cf3';
						?>
						<input id="<?php echo esc_attr( $unique_id_3 ); ?>" style="width: 100%" type="text" class="goso-upload-link-font" name="authow_custom_font3" value="<?php echo esc_attr( goso_get_option('authow_custom_font3') ); ?>" />
						<div class="goso-upload-font-actions">
							<a id="<?php echo esc_attr( $unique_id_3 ); ?>-button-upload" class="button button-upload"><?php esc_html_e( 'Upload','authow' ); ?></a>
							<a id="<?php echo esc_attr( $unique_id_3 ); ?>-button-delete" class="button button-remove <?php echo ( ! goso_get_option('authow_custom_font3') ? 'button-hide' : '' ); ?>"><?php esc_html_e( 'Remove','authow' ); ?></a>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font family 3','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'The font name you can find','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<input id="<?php echo esc_attr( $unique_id_3 ); ?>family" style="width: 50%" type="text" class="goso-upload-link-font" name="authow_custom_fontfamily3" value="<?php echo esc_attr( goso_get_option('authow_custom_fontfamily3') ); ?>" />

				</td>
			</tr>
			<!-- 4 -->
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font file 4','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'Upload the link to the file ( .woff format )','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<div class="goso-upload-font-controls">
						<?php
						$unique_id_4 = 'authow-cf4';
						?>
						<input id="<?php echo esc_attr( $unique_id_4 ); ?>" style="width: 100%" type="text" class="goso-upload-link-font" name="authow_custom_font4" value="<?php echo esc_attr( goso_get_option('authow_custom_font4') ); ?>" />
						<div class="goso-upload-font-actions">
							<a id="<?php echo esc_attr( $unique_id_4 ); ?>-button-upload" class="button button-upload"><?php esc_html_e( 'Upload','authow' ); ?></a>
							<a id="<?php echo esc_attr( $unique_id_4 ); ?>-button-delete" class="button button-remove <?php echo ( ! goso_get_option('authow_custom_font4') ? 'button-hide' : '' ); ?>"><?php esc_html_e( 'Remove','authow' ); ?></a>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font family 4','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'The font name you can find','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<input id="<?php echo esc_attr( $unique_id_4 ); ?>family" style="width: 50%" type="text" class="goso-upload-link-font" name="authow_custom_fontfamily4" value="<?php echo esc_attr( goso_get_option('authow_custom_fontfamily4') ); ?>" />

				</td>
			</tr>
			<!-- 5 -->
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font file 5','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'Upload the link to the file ( .woff format )','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<div class="goso-upload-font-controls">
						<?php
						$unique_id_5 = 'authow-cf5';
						?>
						<input id="<?php echo esc_attr( $unique_id_5 ); ?>" style="width: 100%" type="text" class="goso-upload-link-font" name="authow_custom_font5" value="<?php echo esc_attr( goso_get_option('authow_custom_font5') ); ?>" />
						<div class="goso-upload-font-actions">
							<a id="<?php echo esc_attr( $unique_id_5 ); ?>-button-upload" class="button button-upload"><?php esc_html_e( 'Upload','authow' ); ?></a>
							<a id="<?php echo esc_attr( $unique_id_5 ); ?>-button-delete" class="button button-remove <?php echo ( ! goso_get_option('authow_custom_font5') ? 'button-hide' : '' ); ?>"><?php esc_html_e( 'Remove','authow' ); ?></a>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font family 5','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'The font name you can find','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<input id="<?php echo esc_attr( $unique_id_5 ); ?>family" style="width: 50%" type="text" class="goso-upload-link-font" name="authow_custom_fontfamily5" value="<?php echo esc_attr( goso_get_option('authow_custom_fontfamily5') ); ?>" />

				</td>
			</tr>
			<!-- 6 -->
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font file 6','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'Upload the link to the file ( .woff format )','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<div class="goso-upload-font-controls">
						<?php
						$unique_id_6 = 'authow-cf6';
						?>
						<input id="<?php echo esc_attr( $unique_id_6 ); ?>" style="width: 100%" type="text" class="goso-upload-link-font" name="authow_custom_font6" value="<?php echo esc_attr( goso_get_option('authow_custom_font6') ); ?>" />
						<div class="goso-upload-font-actions">
							<a id="<?php echo esc_attr( $unique_id_6 ); ?>-button-upload" class="button button-upload"><?php esc_html_e( 'Upload','authow' ); ?></a>
							<a id="<?php echo esc_attr( $unique_id_6 ); ?>-button-delete" class="button button-remove <?php echo ( ! goso_get_option('authow_custom_font6') ? 'button-hide' : '' ); ?>"><?php esc_html_e( 'Remove','authow' ); ?></a>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font family 6','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'The font name you can find','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<input id="<?php echo esc_attr( $unique_id_6 ); ?>family" style="width: 50%" type="text" class="goso-upload-link-font" name="authow_custom_fontfamily6" value="<?php echo esc_attr( goso_get_option('authow_custom_fontfamily6') ); ?>" />

				</td>
			</tr>
			<!-- 7 -->
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font file 7','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'Upload the link to the file ( .woff format )','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<div class="goso-upload-font-controls">
						<?php
						$unique_id_7 = 'authow-cf7';
						?>
						<input id="<?php echo esc_attr( $unique_id_7 ); ?>" style="width: 100%" type="text" class="goso-upload-link-font" name="authow_custom_font7" value="<?php echo esc_attr( goso_get_option('authow_custom_font7') ); ?>" />
						<div class="goso-upload-font-actions">
							<a id="<?php echo esc_attr( $unique_id_7 ); ?>-button-upload" class="button button-upload"><?php esc_html_e( 'Upload','authow' ); ?></a>
							<a id="<?php echo esc_attr( $unique_id_7 ); ?>-button-delete" class="button button-remove <?php echo ( ! goso_get_option('authow_custom_font7') ? 'button-hide' : '' ); ?>"><?php esc_html_e( 'Remove','authow' ); ?></a>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font family 7','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'The font name you can find','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<input id="<?php echo esc_attr( $unique_id_7 ); ?>family" style="width: 50%" type="text" class="goso-upload-link-font" name="authow_custom_fontfamily7" value="<?php echo esc_attr( goso_get_option('authow_custom_fontfamily7') ); ?>" />

				</td>
			</tr>
			<!-- 8 -->
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font file 8','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'Upload the link to the file ( .woff format )','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<div class="goso-upload-font-controls">
						<?php
						$unique_id_8 = 'authow-cf8';
						?>
						<input id="<?php echo esc_attr( $unique_id_8 ); ?>" style="width: 100%" type="text" class="goso-upload-link-font" name="authow_custom_font8" value="<?php echo esc_attr( goso_get_option('authow_custom_font8') ); ?>" />
						<div class="goso-upload-font-actions">
							<a id="<?php echo esc_attr( $unique_id_8 ); ?>-button-upload" class="button button-upload"><?php esc_html_e( 'Upload','authow' ); ?></a>
							<a id="<?php echo esc_attr( $unique_id_8 ); ?>-button-delete" class="button button-remove <?php echo ( ! goso_get_option('authow_custom_font8') ? 'button-hide' : '' ); ?>"><?php esc_html_e( 'Remove','authow' ); ?></a>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font family 8','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'The font name you can find','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<input id="<?php echo esc_attr( $unique_id_8 ); ?>family" style="width: 50%" type="text" class="goso-upload-link-font" name="authow_custom_fontfamily8" value="<?php echo esc_attr( goso_get_option('authow_custom_fontfamily8') ); ?>" />

				</td>
			</tr>
			<!-- 9 -->
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font file 9','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'Upload the link to the file ( .woff format )','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<div class="goso-upload-font-controls">
						<?php
						$unique_id_9 = 'authow-cf9';
						?>
						<input id="<?php echo esc_attr( $unique_id_9 ); ?>" style="width: 100%" type="text" class="goso-upload-link-font" name="authow_custom_font9" value="<?php echo esc_attr( goso_get_option('authow_custom_font9') ); ?>" />
						<div class="goso-upload-font-actions">
							<a id="<?php echo esc_attr( $unique_id_9 ); ?>-button-upload" class="button button-upload"><?php esc_html_e( 'Upload','authow' ); ?></a>
							<a id="<?php echo esc_attr( $unique_id_9 ); ?>-button-delete" class="button button-remove <?php echo ( ! goso_get_option('authow_custom_font9') ? 'button-hide' : '' ); ?>"><?php esc_html_e( 'Remove','authow' ); ?></a>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font family 9','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'The font name you can find','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<input id="<?php echo esc_attr( $unique_id_9 ); ?>family" style="width: 50%" type="text" class="goso-upload-link-font" name="authow_custom_fontfamily9" value="<?php echo esc_attr( goso_get_option('authow_custom_fontfamily9') ); ?>" />

				</td>
			</tr>
			<!-- 10 -->
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font file 10','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'Upload the link to the file ( .woff format )','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<div class="goso-upload-font-controls">
						<?php
						$unique_id_10 = 'authow-cf10';
						?>
						<input id="<?php echo esc_attr( $unique_id_10 ); ?>" style="width: 100%" type="text" class="goso-upload-link-font" name="authow_custom_font10" value="<?php echo esc_attr( goso_get_option('authow_custom_font10') ); ?>" />
						<div class="goso-upload-font-actions">
							<a id="<?php echo esc_attr( $unique_id_10 ); ?>-button-upload" class="button button-upload"><?php esc_html_e( 'Upload','authow' ); ?></a>
							<a id="<?php echo esc_attr( $unique_id_10 ); ?>-button-delete" class="button button-remove <?php echo ( ! goso_get_option('authow_custom_font10') ? 'button-hide' : '' ); ?>"><?php esc_html_e( 'Remove','authow' ); ?></a>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td class="custom-fonts-name">
					<?php esc_html_e( 'Custom font family 10','authow' ); ?>
					<span class="status-small-text"><?php esc_html_e( 'The font name you can find','authow' ); ?></span>
				</td>
				<td class="custom-fonts-value">
					<input id="<?php echo esc_attr( $unique_id_10 ); ?>family" style="width: 50%" type="text" class="goso-upload-link-font" name="authow_custom_fontfamily10" value="<?php echo esc_attr( goso_get_option('authow_custom_fontfamily10') ); ?>" />

				</td>
			</tr>
			</tbody>
		</table>
		<input type="hidden" name="_page" value="authow_custom_fonts">

		<?php submit_button(); ?>

	</form>

</div>
