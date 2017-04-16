<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://stallion-theme.co.uk/
 * @since      3.0.0
 *
 * @package    Stallion_Wordpress_Seo_Plugin
 * @subpackage Stallion_Wordpress_Seo_Plugin/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      3.0.0
 * @package    Stallion_Wordpress_Seo_Plugin
 * @subpackage Stallion_Wordpress_Seo_Plugin/includes
 * @author     David Law <davidlseo@gmail.com>
 */
class Stallion_Wordpress_Seo_Plugin {
	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    3.0.0
	 * @access   protected
	 * @var      Stallion_Wordpress_Seo_Plugin_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    3.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    3.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    3.0.0
	 */
	public function __construct() {
		$this->plugin_name = 'stallion-wordpress-seo-plugin';
		$this->version = '3.0.0';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Stallion_Wordpress_Seo_Plugin_Loader. Orchestrates the hooks of the plugin.
	 * - Stallion_Wordpress_Seo_Plugin_i18n. Defines internationalization functionality.
	 * - Stallion_Wordpress_Seo_Plugin_Admin. Defines all hooks for the admin area.
	 * - Stallion_Wordpress_Seo_Plugin_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    3.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-public.php';
		$this->loader = new Stallion_Wordpress_Seo_Plugin_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Stallion_Wordpress_Seo_Plugin_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    3.0.0
	 * @access   private
	 */
	private function set_locale() {
		$plugin_i18n = new Stallion_Wordpress_Seo_Plugin_i18n();
#		$plugin_i18n->set_domain( 'stallion-wordpress-seo-plugin' );
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    3.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {
		$plugin_admin = new Stallion_Wordpress_Seo_Plugin_Admin( $this->get_plugin_name(), $this->get_version() );
		$plugin_settings = new Stallion_Wordpress_Seo_Plugin_Admin_Settings( $this->get_plugin_name(), $this->get_version() );
		// Creates options page under Settings
		$this->loader->add_action( 'admin_menu', $plugin_settings, 'setup_plugin_options_menu' );
		// Creates options page tab Stallion WordPress SEO Options
		$this->loader->add_action( 'admin_init', $plugin_settings, 'initialize_not_index_options' );
		// Creates options page tab SEO Plugin Warnings
		$this->loader->add_action( 'admin_init', $plugin_settings, 'initialize_seo_plugin_warnings' );
		// Loads canonical url code to /wp-admin/wp-login.php head
		$this->loader->add_action( 'login_head', $plugin_settings, 'st_seo_notindex_login' );
		// Loads canonical url code to front end, had to set priority 1 due to All In One SEO and Yoast setting priority to 1 on their code, otherwise Stallion code AND Yoast/All In One code both load!
		$this->loader->add_action( 'wp_head', $plugin_settings, 'st_seo_notindex', 1 );
/*
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
*/
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    3.0.0
	 * @access   private
	 */
	private function define_public_hooks() {
		$plugin_public = new Stallion_Wordpress_Seo_Plugin_Public( $this->get_plugin_name(), $this->get_version() );
/*
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
*/
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    3.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     3.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     3.0.0
	 * @return    Stallion_Wordpress_Seo_Plugin_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     3.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}