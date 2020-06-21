<?php 
/**
 * Plugin Name:       Contact Information Widget   
 * Plugin URI:        https://github.com/noruzzamanrubel/Contact-Information-Widget
 * Description:       This plugin is use for Contact Information
 * Version:           1.0
 * Requires PHP:      
 * Author:            Md Noruzzaman
 * Author URI:        https://github.com/noruzzamanrubel
 * License:           GPL v2 or later
 * Text Domain:       contactinfo
 * Domain Path:       /languages
 */
require_once plugin_dir_path(__FILE__)."widget/class.contactinfo.php";

if ( !defined( "ABSPATH" ) ) {
    exit;
}
// Exit if accessed directly

//plugin textdomain loaded action
function contactinfo_load_textdomain() {
    load_plugin_textdomain( "contactinfo", false, dirname( __FILE__ ) . "/languages" );
}
add_action( "plugin_loaded", "contactinfo_load_textdomain" );

//Register Widget
function contactinfo_register(){
    register_widget( 'ContactInfo' );
}
add_action("widgets_init", "contactinfo_register");