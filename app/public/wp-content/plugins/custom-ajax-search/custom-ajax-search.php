<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://github.com/kontsol
 * @since             1.0.0
 * @package           Custom_Ajax_Search
 *
 * @wordpress-plugin
 * Plugin Name:       custom-ajax-search
 * Plugin URI:        https://https://github.com/kontsol
 * Description:       This is a description of the plugin.
 * Version:           1.0.0
 * Author:            Konstantinos Tsolakidis
 * Author URI:        https://https://github.com/kontsol/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom-ajax-search
 * Domain Path:       /languages
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
define( 'CUSTOM_AJAX_SEARCH_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-custom-ajax-search-activator.php
 */
function activate_custom_ajax_search() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-ajax-search-activator.php';
	Custom_Ajax_Search_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-custom-ajax-search-deactivator.php
 */
function deactivate_custom_ajax_search() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-ajax-search-deactivator.php';
	Custom_Ajax_Search_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_custom_ajax_search' );
register_deactivation_hook( __FILE__, 'deactivate_custom_ajax_search' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-custom-ajax-search.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_custom_ajax_search() {

	$plugin = new Custom_Ajax_Search();
	$plugin->run();

	wp_enqueue_script( 'ionicons', 'https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js', array(), '7.1.0', false );

}
run_custom_ajax_search();
