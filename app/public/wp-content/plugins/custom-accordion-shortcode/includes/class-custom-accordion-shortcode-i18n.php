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
 * @package    Custom_Accordion_Shortcode
 * @subpackage Custom_Accordion_Shortcode/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Custom_Accordion_Shortcode
 * @subpackage Custom_Accordion_Shortcode/includes
 * @author     Konstantinos Tsolakidis <konstantinostsolakidhs20@gmail.com>
 */
class Custom_Accordion_Shortcode_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'custom-accordion-shortcode',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
