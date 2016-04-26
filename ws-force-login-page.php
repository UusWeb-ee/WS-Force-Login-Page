<?php
/**
* Plugin Name: WS Force Login page
* Plugin URI: http://www.webshark.ee/
* Description: Redirecting user to login page if not logged in
* Version: 1.1
* Author: WebShark
* Author URI: http://www.webshark.ee/
**/


class WS_Force_Login_Page {
    public function __construct(){
        add_action( 'plugins_loaded', array( $this, 'check_if_user_logged_in' ) );
    }

    public function check_if_user_logged_in(){
        if (!is_user_logged_in()) {
			global $pagenow;
			if ( 'wp-login.php' !== $pagenow ){
				wp_redirect(wp_login_url());
				exit;
			}
		}
    }
}
$wpse_ws_force_login_page_plugin = new WS_Force_Login_Page();
?>