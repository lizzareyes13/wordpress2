<?php
/**
 * @link              http://stallion-theme.co.uk/
 * @since             3.0.0
 * @package           Stallion_Wordpress_Seo_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Stallion WordPress SEO Plugin
 * Plugin URI:        http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/
 * Description:       Block search engines like Google from indexing sections/pages of your site without deleting valuable link benefit via canonical URLs rather than noindex and nofollow. Other so called WordPress SEO plugins damage your sites search engine optimization by using nofollow (deletes link benefit) and noindex (wastes link benefit). The Stallion WordPress SEO Plugin uses canonical URLs to conserve link benefit.
 * Version:           3.0.0
 * Author:            David Law
 * Author URI:        http://stallion-theme.co.uk/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       stallion-wordpress-seo-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function stallion_seo_plugin() {
// Empty function for Stallion Responsive to check for
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-activator.php
 */
function activate_stallion_wordpress_seo_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-activator.php';
	Stallion_Wordpress_Seo_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-deactivator.php
 */
function deactivate_stallion_wordpress_seo_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-deactivator.php';
	Stallion_Wordpress_Seo_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_stallion_wordpress_seo_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_stallion_wordpress_seo_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-stallion-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    3.0.0
 */
function run_stallion_wordpress_seo_plugin() {

	$plugin = new Stallion_Wordpress_Seo_Plugin();
	$plugin->run();

}
run_stallion_wordpress_seo_plugin();
