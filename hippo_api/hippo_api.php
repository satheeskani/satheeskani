<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              wordpress
 * @since             1.0.0
 * @package           Hippo_api
 *
 * @wordpress-plugin
 * Plugin Name:       Hippo API
 * Plugin URI:        hippo_api
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Wordpress
 * Author URI:        wordpress
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'HIPPO_API_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-hippo_api-activator.php
 */
function activate_hippo_api() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hippo_api-activator.php';
	Hippo_api_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-hippo_api-deactivator.php
 */
function deactivate_hippo_api() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hippo_api-deactivator.php';
	Hippo_api_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_hippo_api' );
register_deactivation_hook( __FILE__, 'deactivate_hippo_api' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-hippo_api.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_hippo_api() {

	$plugin = new Hippo_api();
	$plugin->run();

}
run_hippo_api();

function wpdocs_register_my_custom_menu_page() {
    add_menu_page(
        __( 'Hippo API Settings', 'textdomain' ),
        'Hippo',
        'manage_options',
        'hippo_api/admin/index.php',
        '',
        'dashicons-admin-generic',
        6
    );
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

add_shortcode( 'hippo_api_form', 'form_function' );
function form_function( $atts, $content = "" ) {
    // return "content = $content";
    include 'form.php';
}

function my_enqueue() {
    wp_enqueue_script( 'ajax-script', plugin_dir_url( __FILE__ ) . '/public/js/hippo_api-call.js', array('jquery') );
    wp_localize_script( 'ajax-script', 'my_ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );

add_action("wp_ajax_ajax_form_data", "ajax_form_data"); 
add_action("wp_ajax_nopriv_aajax_form_data", "ajax_form_data");
function ajax_form_data(){
    global $wpdb;
    $first_name = $_REQUEST['first_name'];
    $mid_name = $_REQUEST['mid_name'];
    $last_name = $_REQUEST['last_name'];
    $st_add = $_REQUEST['st_add'];
    $unit = $_REQUEST['unit'];

    // Admin settings data
    $hippo_auth_token = get_option('hippo_auth_token');
    $hippo_api_url = get_option('hippo_api_url');

    // Process request to API

    // Sample Request

    $data = "{
        'quote_url':'https://api.staging.myhippo.io',
        'coverage_a':510000,
        'quote_premium':1183,
        'quote_id':'1234ab'
    }";
    echo $data;
    exit; 

 
 }
