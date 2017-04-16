<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://stallion-theme.co.uk/
 * @since      3.0.0
 *
 * @package    Stallion_Wordpress_Seo_Plugin
 * @subpackage Stallion_Wordpress_Seo_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      3.0.0
 * @package    Stallion_Wordpress_Seo_Plugin
 * @subpackage Stallion_Wordpress_Seo_Plugin/includes
 * @author     David Law <davidlseo@gmail.com>
 */
class Stallion_Wordpress_Seo_Plugin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    3.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'stallion-wordpress-seo-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
