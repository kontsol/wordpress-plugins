<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://github.com/kontsol
 * @since      1.0.0
 *
 * @package    Custom_Ajax_Search
 * @subpackage Custom_Ajax_Search/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Custom_Ajax_Search
 * @subpackage Custom_Ajax_Search/includes
 * @author     Konstantinos Tsolakidis <konstantinostsolakidhs20@gmail.com>
 */
class Custom_Ajax_Search_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'custom-ajax-search',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
