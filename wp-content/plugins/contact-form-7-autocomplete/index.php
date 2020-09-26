<?php
/*
Plugin Name: Contact Form 7 Autocomplete (+ address Contact Form 7)
Plugin URI: https://codecanyonwp.com/contact-form-7-autocomplete
Description: Autocomplete simplifies and speeds up a form filling process and make your users save time by finding necessary data with suggestions.
Author: Rednumber
Version: 2.5
Author URI: https://codecanyonwp.com/
*/
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
define( 'CT_7_AUTO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CT_7_AUTO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'CT_7_AUTO_TEXT_DOMAIN', "cf7_auto" );
include_once(ABSPATH.'wp-admin/includes/plugin.php');
/*
* Include pib
*/
if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
    include CT_7_AUTO_PLUGIN_PATH."backend/index.php";
    include CT_7_AUTO_PLUGIN_PATH."frontend/index.php";
}
/*
* Check plugin contact form 7
*/
class cf7_auto_checkout_init {
    function __construct(){
       add_action('admin_notices', array($this, 'on_admin_notices' ) );
    }
    function on_admin_notices(){
        if ( !is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
            echo '<div class="error"><p>' . __('Plugin need active plugin Contact Form 7', CT_7_AUTO_TEXT_DOMAIN) . '</p></div>';
        }
    }
}
new cf7_auto_checkout_init;