<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

function ws_force_login_settings_create_menu() {
	add_options_page( __( 'WS Force Login Page Settings', 'ws-force-login-page' ), 'WS Force Login', 'manage_options', 'ws-force-login-settings', 'ws_force_login_settings_page' );
}
add_action('admin_menu', 'ws_force_login_settings_create_menu');

function ws_force_login_settings_register() {
	register_setting( 'ws-force-login-settings-group', 'wsforce-login-message-option' );
}
add_action( 'admin_init', 'ws_force_login_settings_register' );

function ws_force_login_settings_page() {
	?>
    <div class="wrap">
        <h2><?php _e( 'WS Force Login Page Settings', 'ws-force-login-page' ); ?></h2>
    </div>

	<form method="post" action="options.php">
		<?php settings_fields( 'ws-force-login-settings-group' ); ?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php echo _e( 'Message', 'ws-force-login-page' ); ?></th>
				<td>
					<input class="regular-text" type="text" name="wsforce-login-message-option" value="<?php echo get_option('wsforce-login-message-option'); ?>" placeholder="<?php echo esc_html_e( 'Message for those who trie to get access to site', 'ws-force-login-page' ); ?>" />
				</td>
			</tr>
		</table>
		
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>

	</form>
    <?php
}

add_filter( 'plugin_action_links_ws-force-login-page/ws-force-login-page.php', 'ws_force_login_action_links' );

function ws_force_login_action_links( $links ) {
	$mylinks = array(
		'<a href="' . admin_url( 'options-general.php?page=ws-force-login-settings' ) . '">Settings</a>',
	);
	return array_merge( $links, $mylinks );
}
?>