<?php
/**
 * The settings of the plugin.
 *
 * @link       http://stallion-theme.co.uk/
 * @since      3.0.0
 *
 * @package    Stallion_Wordpress_Seo_Plugin
 * @subpackage Stallion_Wordpress_Seo_Plugin/admin
 */

/**
 * Class WordPress_Plugin_Template_Settings
 *
 */
class Stallion_Wordpress_Seo_Plugin_Admin_Settings {

	/**
	 * The ID of this plugin.
	 *
	 * @since    3.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    3.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    3.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * This function introduces the options into the 'Settings' menu
	 */
	public function setup_plugin_options_menu() {
		// Add the menu
#		add_options_page(
		add_menu_page(
			'Stallion WordPress SEO Plugin Options', // The title to be displayed in the browser window for this page.
			'Stallion SEO Plugin', // The text to be displayed for this menu item
			'manage_options', // Which type of users can see this menu item
			'stallion_seo_plugin', // The unique ID - that is, the slug - for this menu item
			array($this, 'render_options_page_content'), // The name of the function to call when rendering this menu's page
			'dashicons-smiley',
			'66'
		);
	}

	/**
	 * Provides default values for the Stallion WordPress SEO Plugin Main Options Tab.
	 *
	 * @return array
	 */
	public function default_stallion_wp_seo_options() {
		$defaults = array(
			'st_seo_notindex_login' => '2',
			'st_seo_notindex_date' => '1',
			'st_seo_notindex_author' => '1',
			'st_seo_notindex_search' => '0',
			'st_seo_notindex_category' => '0',
			'st_seo_notindex_tags' => '0',
			'st_seo_notindex_taxs' => '0',
			'st_seo_notindex_custptarc' => '0',
			'st_seo_notindex_home' => '1',
			'st_seo_notindex_pcomments' => '1',
			'st_seo_notindex_clean' => '2',
		);
		return $defaults;
	}

	/**
	 * Provide default values for the Yoast SEO Warnings Options.
	 *
	 * @return array
	 */
	public function default_seo_warnings() {
		$defaults = array(
			'st_seo_warnings_stallion' => '1',
			'st_seo_warnings_yoast' => '1',
			'st_seo_warnings_allinone' => '1',
		);
		return $defaults;
	}

	/**
	 * Renders a simple page to display for the menu defined above.
	 */
	public function render_options_page_content($active_tab = '') {
	?>
	<div class="wrap">
		<h1><?php _e('Stallion WordPress SEO Plugin Options', 'stallion-wordpress-seo-plugin'); ?></h1>
		<?php /* settings_errors(); */ ?>

		<div style="float:right; padding:10px;"><a href="http://stallion-theme.co.uk/stallion-responsive-theme/" target="_blank"><?php echo '<img src="' . plugins_url('stallion-responsive-theme.jpg', __FILE__) . '"  alt="Stallion Responsive Theme" width="400" height="275" > '; ?></a></div>

		<p><?php
		$yoast_review_url = 'http://stallion-theme.co.uk/yoast-wordpress-seo-plugin-review/';
		$all_review_url = 'http://stallion-theme.co.uk/wordpress-all-in-one-seo-plugin-review/';
		$all_yoast_review_link = sprintf(wp_kses(__("Please Note: this is NOT a replacement for plugins like the Yoast SEO plugin (<a href='%s' target='_blank'>see Yoast Plugin review</a>) or the All In One SEO plugin (<a href='%s' target='_blank'>see All in One SEO Plugin review.</a>). The Stallion WordPress SEO Plugin is a replacement for damaging SEO features related to Noindex and Nofollow within plugins like Yoast and All In One. It does NOT manage title tags or meta tags.", 'stallion-wordpress-seo-plugin'), array('a' => array('href' => array(), 'target' => array()))), esc_url($yoast_review_url), esc_url($all_review_url));
		echo $all_yoast_review_link;
		?></p>

		<p><?php
		$stallion_seo_plugin_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/';
		$stallion_seo_plugin_link = sprintf(wp_kses(__("This plugin was created to replace the SEO damaging plugin features related to nofollow and noindex that are part of some of the most popular WordPress SEO plugins Yoast and All In One SEO. See the <a href='%s' target='_blank'>Stallion WordPress SEO Plugin Article</a> for why webmasters shouldn't be using noindex and nofollow and how this plugin uses canonical URLs to conserve link benefit from the pages you don't want indexed.", 'stallion-wordpress-seo-plugin'), array('a' => array('href' => array(), 'target' => array()))), esc_url($stallion_seo_plugin_url));
		echo $stallion_seo_plugin_link;
		?></p>

		<h2 class="title"><?php _e("Yoast WordPress SEO and All In One SEO Have Damaging SEO Features!", 'stallion-wordpress-seo-plugin'); ?></h2>
		<p><?php
		_e("Popular SEO plugins like the All in One SEO Pack WordPress Plugin and the Yoast WordPress SEO Plugin add damaging nofollow and noindex code to WordPress sites. If one of those plugins are active, check the warnings on the warnings tabs below. If you see red warnings, best advice 2016 is turn those Yoast or All In One SEO features OFF.", 'stallion-wordpress-seo-plugin');
		?></p>

		<p><?php
		$stallion_seo_plugin_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/';
		$stallion_seo_plugin_link = sprintf(wp_kses(__("<a href='%s' target='_blank'>More Information About the Stallion WordPress SEO Plugin</a>.", 'stallion-wordpress-seo-plugin'), array('a' => array('href' => array(), 'target' => array()))), esc_url($stallion_seo_plugin_url));
		echo $stallion_seo_plugin_link;
		?></p>

		<?php
		if (isset($_GET['tab'])) {
			$active_tab = $_GET['tab'];
		} else if ($active_tab == 'seo_warnings') {
			$active_tab = 'seo_warnings';
		} else {
			$active_tab = 'not_index_options';
		} // end if/else 
		?>

		<h2 class="nav-tab-wrapper">
		<a href="?page=stallion_seo_plugin&tab=not_index_options" class="nav-tab <?php echo $active_tab == 'not_index_options' ? 'nav-tab-active' : ''; ?>"><?php _e('Not Index Options', 'stallion-wordpress-seo-plugin'); ?></a>
		<a href="?page=stallion_seo_plugin&tab=seo_warnings" class="nav-tab <?php echo $active_tab == 'seo_warnings' ? 'nav-tab-active' : ''; ?>"><?php _e('SEO Plugin Warnings', 'stallion-wordpress-seo-plugin'); ?></a>
		</h2>

		<form method="post" action="options.php">
		<?php
		if ($active_tab == 'not_index_options') {
			settings_fields('stallion_wp_seo_not_index');
			do_settings_sections('stallion_wp_seo_not_index');
		} elseif ($active_tab == 'seo_warnings') {
			settings_fields('stallion_wp_seo_plugin_warnings');
			do_settings_sections('stallion_wp_seo_plugin_warnings');
		} else {
			
		} // end if/else

		submit_button();
		?>
		</form>
		<?php
		if ($active_tab == 'not_index_options') { ?>

			<h4><?php
			_e("Short Not Index Tutorial", 'stallion-wordpress-seo-plugin');
			?></h4>

			<p><?php
			_e("The page types blocked above will still be spidered by Google etc..., but those pages will no longer be indexed (they will not be found for relevant searches). Links from those blocked pages will be followed and most of the link benefit that would be wasted if you noindexed archives etc... (options available in the Yoast and All In One SEO Plugins) is recovered and sent back to the home page or the first page of category/tag/search result archives via canonical URLs.", 'stallion-wordpress-seo-plugin');
			?></p>

			<p><?php
			_e("With the right settings your sites important pages will be fully indexed, while unimportant pages (like monthly archives) are not indexed and the link benefit to those blocked (Not Indexed) pages is partially recycled.", 'stallion-wordpress-seo-plugin');
			?></p>

			<p><?php
			$seo_wp_tut_url = 'http://stallion-theme.co.uk/seo-tutorial-for-wordpress/';
			$seo_tut_url = 'http://stallion-theme.co.uk/seo-tutorial/';
			$seo_tuts_link = sprintf(wp_kses(__("For a detailed set of plugin option tutorials click the More Information links above. Also see the <a href='%s' target='_blank'>WordPress SEO Tutorial</a> and the general <a href='%s' target='_blank'>Step by Step SEO Tutorial</a> to learn a lot more about search engine optimization.", 'stallion-wordpress-seo-plugin'), array('a' => array('href' => array(), 'target' => array()))), esc_url($seo_wp_tut_url), esc_url($seo_tut_url));
			echo $seo_tuts_link;
			?></p>

		<?php
		}
		?>

		<p><?php
		$seo_plugin_url = 'http://stallion-theme.co.uk/responsive/wordpress-seo-plugins/';
		$seo_plugin_link = sprintf(wp_kses(__('<a href="%s" target="_blank">More WordPress Plugins</a>', 'stallion-wordpress-seo-plugin'), array('a' => array('href' => array(), 'target' => array()))), esc_url($seo_plugin_url));
		echo $seo_plugin_link;
		?></p>
	</div><!-- /.wrap -->
	<?php
	}

	/**
	 * This function provides a simple description for the General Options page.
	 *
	 * It's called from the 'initialize_not_index_options' function by being passed as a parameter
	 * in the add_settings_section function.
	 */
	public function stallion_wp_seo_not_index_callback() {
		$options = get_option('stallion_wp_seo_not_index');
#		var_dump($options);
		echo '<h4>' . __('NOT INDEX is an advanced SEO technique using canonical URLs instead of noindex robot meta tags. Not Index was created to replace the SEO damaging (wastes ~15% of a noindex pages link benefit) Noindex Robots Meta Tag features found in the Yoast and All In One SEO plugins. Not Index the following page types and recover most of the link benefit that would be lost using the Noindex Robots Meta Tag.', 'stallion-wordpress-seo-plugin') . '</h4>';
		echo '<p><strong>' . __('** = recommended.', 'stallion-wordpress-seo-plugin') . '</strong><br/>';
		echo '<strong>' . __('^^ = suggested.', 'stallion-wordpress-seo-plugin') . '</strong></p>';
		echo '<p><strong style="color:green;">' . __('Highlighted Green = SEO safe for most sites.', 'stallion-wordpress-seo-plugin') . '</strong><br/>';
		echo '<strong style="color:orange;">' . __('Highlighted Orange = SEO safe for most sites, but check the More Information links for details.', 'stallion-wordpress-seo-plugin') . '</strong><br/>';
		echo '<strong style="color:red;">' . __("Highlighted Red = probably a bad idea, but check the More Information links for details.", 'stallion-wordpress-seo-plugin') . '</strong></p>';
	} 
// end stallion_wp_seo_not_index_callback

	/**
	 * This function provides a simple description for the Yoast SEO Warnings Options page.
	 * 
	 * It's called from the 'initialize_seo_plugin_warnings' function by being passed as a parameter
	 * in the add_settings_section function.
	 */
	public function seo_warnings_callback() {
		$options = get_option('stallion_wp_seo_plugin_warnings');
#		var_dump($options); // Output options for testing
#		echo '<p>' . __( ".", 'stallion-wordpress-seo-plugin' ) . '</p>';
	}
// end seo_warnings_callback

	/**
	 * Initializes the plugins main options page by registering the Sections,
	 * Fields, and Settings.
	 *
	 * This function is registered with the 'admin_init' hook.
	 */
	public function initialize_not_index_options() {
#		delete_option('stallion_wp_seo_not_index'); // For testing at plugin activation...
		// If the default options database entry does not exist, create them.
		if (false == get_option('stallion_wp_seo_not_index')) {
			// Check if version 2.* single option exist (only checking one) if so use them
			if (true == get_option('st_seo_notindex_login')) {
				// Set defaults for missing single options
				$new_options = array(
					'st_seo_notindex_login' => '2',
					'st_seo_notindex_date' => '1',
					'st_seo_notindex_author' => '1',
					'st_seo_notindex_search' => '0',
					'st_seo_notindex_category' => '0',
					'st_seo_notindex_tags' => '0',
					'st_seo_notindex_taxs' => '0',
					'st_seo_notindex_custptarc' => '0',
					'st_seo_notindex_home' => '1',
					'st_seo_notindex_pcomments' => '1',
					'st_seo_notindex_clean' => '2'
				);
				// Load $new_options one by one to check if they exist as single options
				foreach( $new_options as $key => $value ) {
					if ( is_numeric ( $existing = get_option($key) ) ) {
						// If single options exist replace $new_options version with the old single options version
						$new_options[$key] = $existing;
//						delete_option( 'st_seo_notindex_' . $key ); // Could delete all old single keys, but they might downgrade to v2.* and the st_seo_notindex_post and st_seo_notindex_page would be useful
					}
				}
				add_option( 'stallion_wp_seo_not_index', $new_options );
// delete v2.* options one by one, so we don't delete st_seo_notindex_post and st_seo_notindex_page
				delete_option( 'st_seo_notindex_pcomments' );
				delete_option( 'st_seo_notindex_home' );
//				delete_option( 'st_seo_notindex_custptarc' ); // not part of v2.*
//				delete_option( 'st_seo_notindex_taxs' ); // not part of v2.*
				delete_option( 'st_seo_notindex_tags' );
				delete_option( 'st_seo_notindex_category' );
				delete_option( 'st_seo_notindex_search' );
				delete_option( 'st_seo_notindex_author' );
				delete_option( 'st_seo_notindex_date' );
				delete_option( 'st_seo_notindex_admin' ); // option removed in v3.0.0
				delete_option( 'st_seo_notindex_login' );
			} else {
				// If single option doesn't exist, use defaults to create stallion_wp_seo_not_index options array
				$default_array = $this->default_stallion_wp_seo_options();
				add_option('stallion_wp_seo_not_index', $default_array);
			}
		}

		add_settings_section(
			'stallion_wp_seo_not_index', // ID used to identify this section and with which to register options
			__('Not Index Options', 'stallion-wordpress-seo-plugin'), // Title to be displayed on the administration page
			array($this, 'stallion_wp_seo_not_index_callback'), // Callback used to render the description of the section
			'stallion_wp_seo_not_index' // Page on which to add this section of options
		);

		// Next, we'll introduce the fields for toggling the visibility of content elements.
		add_settings_field(
			'st_seo_notindex_login',
			__('WordPress Login Pages', 'stallion-wordpress-seo-plugin'),
			array($this, 'st_seo_notindex_login_callback'),
			'stallion_wp_seo_not_index',
			'stallion_wp_seo_not_index'
		);

		add_settings_field(
			'st_seo_notindex_date',
			__('WordPress Date Archives', 'stallion-wordpress-seo-plugin'),
			array($this, 'st_seo_notindex_date_callback'),
			'stallion_wp_seo_not_index',
			'stallion_wp_seo_not_index'
		);

		add_settings_field(
			'st_seo_notindex_author',
			__('WordPress Author Archives', 'stallion-wordpress-seo-plugin'),
			array($this, 'st_seo_notindex_author_callback'),
			'stallion_wp_seo_not_index',
			'stallion_wp_seo_not_index'
		);

		add_settings_field(
			'st_seo_notindex_search',
			__('WordPress Search Result Archives', 'stallion-wordpress-seo-plugin'),
			array($this, 'st_seo_notindex_search_callback'),
			'stallion_wp_seo_not_index',
			'stallion_wp_seo_not_index'
		);

		add_settings_field(
			'st_seo_notindex_category',
			__('WordPress Category Archives', 'stallion-wordpress-seo-plugin'),
			array($this, 'st_seo_notindex_category_callback'),
			'stallion_wp_seo_not_index',
			'stallion_wp_seo_not_index'
		);

		add_settings_field(
			'st_seo_notindex_tags',
			__('WordPress Tag Archives', 'stallion-wordpress-seo-plugin'),
			array($this, 'st_seo_notindex_tags_callback'),
			'stallion_wp_seo_not_index',
			'stallion_wp_seo_not_index'
		);

		add_settings_field(
			'st_seo_notindex_taxs',
			__('WordPress Custom Taxonomy Archives', 'stallion-wordpress-seo-plugin'),
			array($this, 'st_seo_notindex_taxs_callback'),
			'stallion_wp_seo_not_index',
			'stallion_wp_seo_not_index'
		);

		add_settings_field(
			'st_seo_notindex_custptarc',
			__('WordPress Custom Post Type Archives', 'stallion-wordpress-seo-plugin'),
			array($this, 'st_seo_notindex_custptarc_callback'),
			'stallion_wp_seo_not_index',
			'stallion_wp_seo_not_index'
		);

		add_settings_field(
			'st_seo_notindex_home',
			__('WordPress Home Page Archives', 'stallion-wordpress-seo-plugin'),
			array($this, 'st_seo_notindex_home_callback'),
			'stallion_wp_seo_not_index',
			'stallion_wp_seo_not_index'
		);

		add_settings_field(
			'st_seo_notindex_pcomments',
			__('WordPress Paged Comments on Posts and Pages', 'stallion-wordpress-seo-plugin'),
			array($this, 'st_seo_notindex_pcomments_callback'),
			'stallion_wp_seo_not_index',
			'stallion_wp_seo_not_index'
		);

		add_settings_field(
			'st_seo_notindex_clean',
			__('Stallion SEO Plugin Clean Head', 'stallion-wordpress-seo-plugin'),
			array($this, 'st_seo_notindex_clean_callback'),
			'stallion_wp_seo_not_index',
			'stallion_wp_seo_not_index'
		);

		// Finally, we register the fields with WordPress
		register_setting(
			'stallion_wp_seo_not_index',
			'stallion_wp_seo_not_index'
		);
	}
// end initialize_not_index_options

	/**
	 * Initializes the SEO Plugin Warnings options by registering the Sections,
	 * Fields, and Settings.
	 *
	 * This function is registered with the 'admin_init' hook.
	 */
	public function initialize_seo_plugin_warnings() {
#		delete_option('stallion_wp_seo_plugin_warnings'); // For testing at plugin activation...
		if (false == get_option('stallion_wp_seo_plugin_warnings')) {
			$default_array = $this->default_seo_warnings();
			update_option('stallion_wp_seo_plugin_warnings', $default_array);
		} // end if 

		add_settings_section(
			'stallion_wp_seo_plugin_warnings', // ID used to identify this section and with which to register options
			__('SEO Plugin Warnings', 'stallion-wordpress-seo-plugin'), // Title to be displayed on the administration page
			array($this, 'seo_warnings_callback'), // Callback used to render the description of the section
			'stallion_wp_seo_plugin_warnings' // Page on which to add this section of options
		);

		add_settings_field(
			'st_seo_warnings_stallion',
			__('Stallion SEO Warnings', 'stallion-wordpress-seo-plugin'),
			array($this, 'st_seo_warnings_stallion_callback'),
			'stallion_wp_seo_plugin_warnings',
			'stallion_wp_seo_plugin_warnings'
		);

		add_settings_field(
			'st_seo_warnings_yoast',
			__('Yoast SEO Warnings', 'stallion-wordpress-seo-plugin'),
			array($this, 'st_seo_warnings_yoast_callback'),
			'stallion_wp_seo_plugin_warnings',
			'stallion_wp_seo_plugin_warnings'
		);

		add_settings_field(
			'st_seo_warnings_allinone',
			__('All In One SEO Warnings', 'stallion-wordpress-seo-plugin'),
			array($this, 'st_seo_warnings_allinone_callback'),
			'stallion_wp_seo_plugin_warnings',
			'stallion_wp_seo_plugin_warnings'
		);

		register_setting(
			'stallion_wp_seo_plugin_warnings',
			'stallion_wp_seo_plugin_warnings'
#,			array( $this, 'sanitize_seo_warnings') // All radio no need for sanitizing
		);
	}

	/**
	 * st_seo_notindex_login_callback
	 */
	public function st_seo_notindex_login_callback() {
		$options = get_option('stallion_wp_seo_not_index');
		if ( !isset( $options['st_seo_notindex_login'] ) ) {
			$options['st_seo_notindex_login'] = '2' ;
		}
		$swsp_info_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin-documentation/#st_seo_notindex_login';
		$swsp_info_link = sprintf( wp_kses( __( "<a href='%s' target='_blank'>More Information</a>", 'stallion-wordpress-seo-plugin' ), array ( 'a' => array ( 'href' => array (), 'target' => array () ) ) ), esc_url( $swsp_info_url ) );
		$html = '<input type="radio" id="st_seo_notindex_login_one" name="stallion_wp_seo_not_index[st_seo_notindex_login]" value="1"' . checked(1, $options['st_seo_notindex_login'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_notindex_login_one">Index Login Pages</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_login_two" name="stallion_wp_seo_not_index[st_seo_notindex_login]" value="2"' . checked(2, $options['st_seo_notindex_login'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label style="color:green;" for="st_seo_notindex_login_two">Block Login Pages**</label>';
		$html .= '<br /><p>' . $swsp_info_link . '</p>';
		echo $html;
	}
// end st_seo_notindex_login_callback

	public function st_seo_notindex_date_callback() {
		$options = get_option('stallion_wp_seo_not_index');
		if ( !isset( $options['st_seo_notindex_date'] ) ) {
			$options['st_seo_notindex_date'] = '1' ;
		}
		$swsp_info_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin-documentation/#st_seo_notindex_date';
		$swsp_info_link = sprintf( wp_kses( __( "<a href='%s' target='_blank'>More Information</a>", 'stallion-wordpress-seo-plugin' ), array ( 'a' => array ( 'href' => array (), 'target' => array () ) ) ), esc_url( $swsp_info_url ) );
		$html = '<input type="radio" id="st_seo_notindex_date_one" name="stallion_wp_seo_not_index[st_seo_notindex_date]" value="1"' . checked(1, $options['st_seo_notindex_date'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_notindex_date_one">Index Date Archives</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_date_two" name="stallion_wp_seo_not_index[st_seo_notindex_date]" value="2"' . checked(2, $options['st_seo_notindex_date'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label style="color:green;" for="st_seo_notindex_date_two">Block All Date Archives**</label>';
		$html .= '<br /><p>' . $swsp_info_link . '</p>';
		echo $html;
	}
// end st_seo_notindex_date_callback

	public function st_seo_notindex_author_callback() {
		$options = get_option('stallion_wp_seo_not_index');
		if ( !isset( $options['st_seo_notindex_author'] ) ) {
			$options['st_seo_notindex_author'] = '1' ;
		}
		$swsp_info_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin-documentation/#st_seo_notindex_author';
		$swsp_info_link = sprintf( wp_kses( __( "<a href='%s' target='_blank'>More Information</a>", 'stallion-wordpress-seo-plugin' ), array ( 'a' => array ( 'href' => array (), 'target' => array () ) ) ), esc_url( $swsp_info_url ) );
		$html = '<input type="radio" id="st_seo_notindex_author_one" name="stallion_wp_seo_not_index[st_seo_notindex_author]" value="1"' . checked(1, $options['st_seo_notindex_author'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_notindex_author_one">Index All Author Archives</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_author_two" name="stallion_wp_seo_not_index[st_seo_notindex_author]" value="2"' . checked(2, $options['st_seo_notindex_author'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label style="color:orange;" for="st_seo_notindex_author_two">Block All Author Archives^^</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_author_three" name="stallion_wp_seo_not_index[st_seo_notindex_author]" value="3"' . checked(3, $options['st_seo_notindex_author'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label style="color:green;" for="st_seo_notindex_author_three">Index First Author Archives Only : Block Paged 2,3,4...</label>';
		$html .= '<br /><p>' . $swsp_info_link . '</p>';
		echo $html;
	}
// end st_seo_notindex_author_callback

	public function st_seo_notindex_search_callback() {
		$options = get_option('stallion_wp_seo_not_index');
		if ( !isset( $options['st_seo_notindex_search'] ) ) {
			$options['st_seo_notindex_search'] = '0' ;
		}
		$swsp_info_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin-documentation/#st_seo_notindex_search';
		$swsp_info_link = sprintf( wp_kses( __( "<a href='%s' target='_blank'>More Information</a>", 'stallion-wordpress-seo-plugin' ), array ( 'a' => array ( 'href' => array (), 'target' => array () ) ) ), esc_url( $swsp_info_url ) );
		$html = '<input type="radio" id="st_seo_notindex_search_zero" name="stallion_wp_seo_not_index[st_seo_notindex_search]" value="0"' . checked(0, $options['st_seo_notindex_search'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_notindex_search_zero">Index All Search Results</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_search_one" name="stallion_wp_seo_not_index[st_seo_notindex_search]" value="1"' . checked(1, $options['st_seo_notindex_search'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_notindex_search_one">Block All Search Results</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_search_two" name="stallion_wp_seo_not_index[st_seo_notindex_search]" value="2"' . checked(2, $options['st_seo_notindex_search'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label style="color:green;" for="st_seo_notindex_search_two">Index First Search Result Only : Block Paged 2,3,4...**</label>';
		$html .= '<br /><p>' . $swsp_info_link . '</p>';
		echo $html;
	}
// end st_seo_notindex_search_callback

	public function st_seo_notindex_category_callback() {
		$options = get_option('stallion_wp_seo_not_index');
		if ( !isset( $options['st_seo_notindex_category'] ) ) {
			$options['st_seo_notindex_category'] = '0' ;
		}
		$swsp_info_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin-documentation/#st_seo_notindex_category';
		$swsp_info_link = sprintf( wp_kses( __( "<a href='%s' target='_blank'>More Information</a>", 'stallion-wordpress-seo-plugin' ), array ( 'a' => array ( 'href' => array (), 'target' => array () ) ) ), esc_url( $swsp_info_url ) );
		$html = '<input type="radio" id="st_seo_notindex_category_zero" name="stallion_wp_seo_not_index[st_seo_notindex_category]" value="0"' . checked(0, $options['st_seo_notindex_category'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_notindex_category_zero">Index All Categories^^</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_category_one" name="stallion_wp_seo_not_index[st_seo_notindex_category]" value="1"' . checked(1, $options['st_seo_notindex_category'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label style="color:red;" for="st_seo_notindex_category_one">Block All Categories</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_category_two" name="stallion_wp_seo_not_index[st_seo_notindex_category]" value="2"' . checked(2, $options['st_seo_notindex_category'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label style="color:green;" for="st_seo_notindex_category_two">Index First Categories Only : Block Paged 2,3,4...^^</label>';
		$html .= '<br /><p>' . $swsp_info_link . '</p>';
		echo $html;
	}
// end st_seo_notindex_category_callback

	public function st_seo_notindex_tags_callback() {
		$options = get_option('stallion_wp_seo_not_index');
		if ( !isset( $options['st_seo_notindex_tags'] ) ) {
			$options['st_seo_notindex_tags'] = '0' ;
		}
		$swsp_info_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin-documentation/#st_seo_notindex_tags';
		$swsp_info_link = sprintf( wp_kses( __( "<a href='%s' target='_blank'>More Information</a>", 'stallion-wordpress-seo-plugin' ), array ( 'a' => array ( 'href' => array (), 'target' => array () ) ) ), esc_url( $swsp_info_url ) );
		$html = '<input type="radio" id="st_seo_notindex_tags_zero" name="stallion_wp_seo_not_index[st_seo_notindex_tags]" value="0"' . checked(0, $options['st_seo_notindex_tags'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_notindex_tags_zero">Index All Tags</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_tags_one" name="stallion_wp_seo_not_index[st_seo_notindex_tags]" value="1"' . checked(1, $options['st_seo_notindex_tags'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label style="color:red;" for="st_seo_notindex_tags_one">Block All Tags</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_tags_two" name="stallion_wp_seo_not_index[st_seo_notindex_tags]" value="2"' . checked(2, $options['st_seo_notindex_tags'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label style="color:green;" for="st_seo_notindex_tags_two">Index First Tag Only : Block Paged 2,3,4...^^</label>';
		$html .= '<br /><p>' . $swsp_info_link . '</p>';
		echo $html;
	}
// end st_seo_notindex_tags_callback

	public function st_seo_notindex_taxs_callback() {
		$options = get_option('stallion_wp_seo_not_index');
		if ( !isset( $options['st_seo_notindex_taxs'] ) ) {
			$options['st_seo_notindex_taxs'] = '0' ;
		}
		$swsp_info_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin-documentation/#st_seo_notindex_taxs';
		$swsp_info_link = sprintf( wp_kses( __( "<a href='%s' target='_blank'>More Information</a>", 'stallion-wordpress-seo-plugin' ), array ( 'a' => array ( 'href' => array (), 'target' => array () ) ) ), esc_url( $swsp_info_url ) );
		$html = '<input type="radio" id="st_seo_notindex_taxs_zero" name="stallion_wp_seo_not_index[st_seo_notindex_taxs]" value="0"' . checked(0, $options['st_seo_notindex_taxs'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_notindex_taxs_zero">Index All Custom Taxonomy Archives</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_taxs_one" name="stallion_wp_seo_not_index[st_seo_notindex_taxs]" value="1"' . checked(1, $options['st_seo_notindex_taxs'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label style="color:red;" for="st_seo_notindex_taxs_one">Block All Custom Taxonomy Archives</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_taxs_two" name="stallion_wp_seo_not_index[st_seo_notindex_taxs]" value="2"' . checked(2, $options['st_seo_notindex_taxs'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label style="color:green;" for="st_seo_notindex_taxs_two">Index First Custom Taxonomy Archive Only : Block Paged 2,3,4...^^</label>';
		$html .= '<br /><p>' . $swsp_info_link . '</p>';
		echo $html;
	}
// end st_seo_notindex_taxs_callback

	public function st_seo_notindex_custptarc_callback() {
		$options = get_option('stallion_wp_seo_not_index');
		if ( !isset( $options['st_seo_notindex_custptarc'] ) ) {
			$options['st_seo_notindex_custptarc'] = '0' ;
		}
		$swsp_info_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin-documentation/#st_seo_notindex_custptarc';
		$swsp_info_link = sprintf( wp_kses( __( "<a href='%s' target='_blank'>More Information</a>", 'stallion-wordpress-seo-plugin' ), array ( 'a' => array ( 'href' => array (), 'target' => array () ) ) ), esc_url( $swsp_info_url ) );
		$html = '<input type="radio" id="st_seo_notindex_custptarc_zero" name="stallion_wp_seo_not_index[st_seo_notindex_custptarc]" value="0"' . checked(0, $options['st_seo_notindex_custptarc'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_notindex_custptarc_zero">Index All Custom Post Type Archives</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_custptarc_one" name="stallion_wp_seo_not_index[st_seo_notindex_custptarc]" value="1"' . checked(1, $options['st_seo_notindex_custptarc'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label style="color:red;" for="st_seo_notindex_custptarc_one">Block All Custom Post Type Archives</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_custptarc_two" name="stallion_wp_seo_not_index[st_seo_notindex_custptarc]" value="2"' . checked(2, $options['st_seo_notindex_custptarc'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label style="color:green;" for="st_seo_notindex_custptarc_two">Index First Custom Post Type Archives Only : Block Paged 2,3,4...^^</label>';
		$html .= '<br /><p>' . $swsp_info_link . '</p>';
		echo $html;
	}
// end st_seo_notindex_custptarc_callback

	public function st_seo_notindex_home_callback() {
		$options = get_option('stallion_wp_seo_not_index');
		if ( !isset( $options['st_seo_notindex_home'] ) ) {
			$options['st_seo_notindex_home'] = '1' ;
		}
		$swsp_info_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin-documentation/#st_seo_notindex_home';
		$swsp_info_link = sprintf( wp_kses( __( "<a href='%s' target='_blank'>More Information</a>", 'stallion-wordpress-seo-plugin' ), array ( 'a' => array ( 'href' => array (), 'target' => array () ) ) ), esc_url( $swsp_info_url ) );
		$html = '<input type="radio" id="st_seo_notindex_home_one" name="stallion_wp_seo_not_index[st_seo_notindex_home]" value="1"' . checked(1, $options['st_seo_notindex_home'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_notindex_home_one">Index Home Paged Archives</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_home_two" name="stallion_wp_seo_not_index[st_seo_notindex_home]" value="2"' . checked(2, $options['st_seo_notindex_home'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label style="color:green;" for="st_seo_notindex_home_two">Index Home Page Only : Block Paged 2,3,4...^^</label>';
		$html .= '<br /><p>' . $swsp_info_link . '</p>';
		echo $html;
	}
// end st_seo_notindex_home_callback

	public function st_seo_notindex_pcomments_callback() {
		$options = get_option('stallion_wp_seo_not_index');
		if ( !isset( $options['st_seo_notindex_pcomments'] ) ) {
			$options['st_seo_notindex_pcomments'] = '1' ;
		}
		$swsp_info_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin-documentation/#st_seo_notindex_pcomments';
		$swsp_info_link = sprintf( wp_kses( __( "<a href='%s' target='_blank'>More Information</a>", 'stallion-wordpress-seo-plugin' ), array ( 'a' => array ( 'href' => array (), 'target' => array () ) ) ), esc_url( $swsp_info_url ) );
		$html = '<input type="radio" id="st_seo_notindex_pcomments_one" name="stallion_wp_seo_not_index[st_seo_notindex_pcomments]" value="1"' . checked(1, $options['st_seo_notindex_pcomments'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_notindex_pcomments_one">Index All Paged Comments</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_pcomments_two" name="stallion_wp_seo_not_index[st_seo_notindex_pcomments]" value="2"' . checked(2, $options['st_seo_notindex_pcomments'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_notindex_pcomments_two">Index Main Post/Page Only : Block Paged Comments 2,3,4...</label>';
		$html .= '<br /><p>' . $swsp_info_link . '</p>';
		echo $html;
	}
// end st_seo_notindex_pcomments_callback

	public function st_seo_notindex_clean_callback() {
		$options = get_option('stallion_wp_seo_not_index');
		if ( !isset( $options['st_seo_notindex_clean'] ) ) {
			$options['st_seo_notindex_clean'] = '2' ;
		}
		$swsp_info_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin-documentation/#st_seo_notindex_clean';
		$swsp_info_link = sprintf( wp_kses( __( "<a href='%s' target='_blank'>More Information</a>", 'stallion-wordpress-seo-plugin' ), array ( 'a' => array ( 'href' => array (), 'target' => array () ) ) ), esc_url( $swsp_info_url ) );
		$html = '<input type="radio" id="st_seo_notindex_clean_one" name="stallion_wp_seo_not_index[st_seo_notindex_clean]" value="1"' . checked(1, $options['st_seo_notindex_clean'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label style="color:green;" for="st_seo_notindex_clean_one">Cleaner Head</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_notindex_clean_two" name="stallion_wp_seo_not_index[st_seo_notindex_clean]" value="2"' . checked(2, $options['st_seo_notindex_clean'], false) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_notindex_clean_two">NOT Cleaner Head</label>';
		$html .= '<br /><p>' . $swsp_info_link . '</p>';
		echo $html;
	}
// end st_seo_notindex_clean_callback

	public function st_seo_warnings_stallion_callback() {
		$options = get_option('stallion_wp_seo_plugin_warnings');
		if ( !isset( $options['st_seo_warnings_stallion'] ) ) {
			$options['st_seo_warnings_stallion'] = '1' ;
		}
		$swsp_info_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin-documentation/#stallion-seo-warnings';
		$swsp_info_link = sprintf( wp_kses( __( "<a href='%s' target='_blank'>More Information</a>", 'stallion-wordpress-seo-plugin' ), array ( 'a' => array ( 'href' => array (), 'target' => array () ) ) ), esc_url( $swsp_info_url ) );
		$html = '<input type="radio" id="st_seo_warnings_stallion_one" name="stallion_wp_seo_plugin_warnings[st_seo_warnings_stallion]" value="1"' . checked(1, $options['st_seo_warnings_stallion'], false) . ' />';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_warnings_stallion_one">ON</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_warnings_stallion_two" name="stallion_wp_seo_plugin_warnings[st_seo_warnings_stallion]" value="2"' . checked(2, $options['st_seo_warnings_stallion'], false) . ' />';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_warnings_stallion_two">OFF</label>';
		$html .= '<br /><p>' . $swsp_info_link . '</p>';
		echo $html;
		// If Stallion is active, show warnings
		if (($options['st_seo_warnings_stallion'] == '1') && (is_user_logged_in())) {
				include 'warning-stallion-seo-plugin.php';
		}
	}
// end st_seo_warnings_stallion_callback

	public function st_seo_warnings_yoast_callback() {
		$options = get_option('stallion_wp_seo_plugin_warnings');
		if ( !isset( $options['st_seo_warnings_yoast'] ) ) {
			$options['st_seo_warnings_yoast'] = '1' ;
		}
		$swsp_info_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin-documentation/#yoast-seo-warnings-on';
		$swsp_info_link = sprintf( wp_kses( __( "<a href='%s' target='_blank'>More Information</a>", 'stallion-wordpress-seo-plugin' ), array ( 'a' => array ( 'href' => array (), 'target' => array () ) ) ), esc_url( $swsp_info_url ) );
		$html = '<input type="radio" id="st_seo_warnings_yoast_one" name="stallion_wp_seo_plugin_warnings[st_seo_warnings_yoast]" value="1"' . checked(1, $options['st_seo_warnings_yoast'], false) . ' />';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_warnings_yoast_one">ON</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_warnings_yoast_two" name="stallion_wp_seo_plugin_warnings[st_seo_warnings_yoast]" value="2"' . checked(2, $options['st_seo_warnings_yoast'], false) . ' />';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_warnings_yoast_two">OFF</label>';
		$html .= '<br /><p>' . $swsp_info_link . '</p>';
		echo $html;
		// If Yoast is active, show warnings
		if (($options['st_seo_warnings_yoast'] == '1') && (is_user_logged_in())) {
			if (class_exists('WPSEO_Admin')) :
				include 'warning-yoast-seo-plugin.php';
			endif;
		}
	}
// end st_seo_warnings_yoast_callback

	public function st_seo_warnings_allinone_callback() {
		$options = get_option('stallion_wp_seo_plugin_warnings');
		if ( !isset( $options['st_seo_warnings_allinone'] ) ) {
			$options['st_seo_warnings_allinone'] = '1' ;
		}
		$swsp_info_url = 'http://stallion-theme.co.uk/stallion-wordpress-seo-plugin-documentation/#all-in-one-seo-warnings-on';
		$swsp_info_link = sprintf( wp_kses( __( "<a href='%s' target='_blank'>More Information</a>", 'stallion-wordpress-seo-plugin' ), array ( 'a' => array ( 'href' => array (), 'target' => array () ) ) ), esc_url( $swsp_info_url ) );
		$html = '<input type="radio" id="st_seo_warnings_allinone_one" name="stallion_wp_seo_plugin_warnings[st_seo_warnings_allinone]" value="1"' . checked(1, $options['st_seo_warnings_allinone'], false) . ' />';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_warnings_allinone_one">ON</label>';
		$html .= '&nbsp;<br />';
		$html .= '<input type="radio" id="st_seo_warnings_allinone_two" name="stallion_wp_seo_plugin_warnings[st_seo_warnings_allinone]" value="2"' . checked(2, $options['st_seo_warnings_allinone'], false) . ' />';
		$html .= '&nbsp;';
		$html .= '<label for="st_seo_warnings_allinone_two">OFF</label>';
		$html .= '<br /><p>' . $swsp_info_link . '</p>';
		echo $html;
		// If All In One is active, show warnings
		if (($options['st_seo_warnings_allinone'] == '1') && (is_user_logged_in())) {
			if (function_exists('aioseop_mrt_mkarry')) :
				include 'warning-all-in-one-seo-plugin.php';
			endif;
		}
	}
// end st_seo_warnings_allinone_callback

	/**
	 * Sanitization callback for the Yoast options. Since each of the options are text inputs,
	 * this function loops through the incoming option and strips all tags and slashes from the value
	 * before serializing it.
	 * didn't use this, but kept for future use
	 * @params	$input	The unsanitized collection of options.
	 *
	 * @returns			The collection of sanitized values.
	 */
	public function sanitize_seo_warnings($input) {
		// Define the array for the updated options
		$output = array();
		// Loop through each of the options sanitizing the data
		foreach ($input as $key => $val) {
			if (isset($input[$key])) {
				$output[$key] = esc_url_raw(strip_tags(stripslashes($input[$key])));
			} // end if
		} // end foreach
	// Return the new collection
		return apply_filters('sanitize_seo_warnings', $output, $input);
	}
// end sanitize_seo_warnings

	// Block Login Pages**
	public function st_seo_notindex_login() {
		$options = get_option('stallion_wp_seo_not_index');
		if ( !isset( $options['st_seo_notindex_login'] ) ) {
			$options['st_seo_notindex_login'] = '0' ;
		}
		if ($options['st_seo_notindex_login'] == "2") {
			if ($options['st_seo_notindex_clean'] == "2") {
				echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
			}
			echo "<link rel=\"canonical\" href=\"" . home_url( '/' ) . "\" />\n";
			if ($options['st_seo_notindex_clean'] == "2") {
				echo "<!-- Block Login Pages** - Stallion SEO -->\n";
			}
		}
	}

	// Canonical front end Output
	public function st_seo_notindex() {
		$options = get_option('stallion_wp_seo_not_index');
		// Index Main Post/Page Only : Block Paged Comments 2,3,4...
		if (((is_single() || is_page()) && !is_front_page()) && (!class_exists('BuddyPress') || bp_is_blog_page())     ) {
			if ( !isset( $options['st_seo_notindex_pcomments'] ) ) {
				$options['st_seo_notindex_pcomments'] = '0' ;
			}
			if ($options['st_seo_notindex_pcomments'] == "2") {
				add_filter( 'wpseo_canonical', '__return_false' );
				add_filter( 'aioseop_canonical_url', '__return_false' );
				remove_action( 'wp_head', 'rel_canonical' );
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
				}
				echo "<link rel=\"canonical\" href=\"" . get_permalink(get_the_ID()) . "\" />\n";
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "<!-- Index Main Post/Page Only : Block Paged Comments 2,3,4... - Stallion SEO -->\n";
				}
			}
		} elseif (is_category()) {
			if ( !isset( $options['st_seo_notindex_category'] ) ) {
				$options['st_seo_notindex_category'] = '0' ;
			}
			// Block All Categories
			if ($options['st_seo_notindex_category'] == "1") {
				add_filter( 'wpseo_canonical', '__return_false' );
				add_filter( 'aioseop_canonical_url', '__return_false' );
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
				}
				echo "<link rel=\"canonical\" href=\"" . home_url( '/' ) . "\" />\n";
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "<!-- Block All Categories - Stallion SEO -->\n";
				}
			}
			// Index First Categories Only : Block Paged 2,3,4...^^
			if ($options['st_seo_notindex_category'] == "2") {
				add_filter( 'wpseo_canonical', '__return_false' );
				add_filter( 'aioseop_canonical_url', '__return_false' );
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
				}
				echo "<link rel=\"canonical\" href=\"" . get_category_link(get_query_var('cat')) . "\" />\n";
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "<!-- Index First Categories Only : Block Paged 2,3,4...^^ - Stallion SEO -->\n";
				}
			}
		} elseif (is_tag()) {
			if ( !isset( $options['st_seo_notindex_tags'] ) ) {
				$options['st_seo_notindex_tags'] = '0' ;
			}
			// Block All Tags
			if ($options['st_seo_notindex_tags'] == "1") {
				add_filter( 'wpseo_canonical', '__return_false' );
				add_filter( 'aioseop_canonical_url', '__return_false' );
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
				}
				echo "<link rel=\"canonical\" href=\"" . home_url( '/' ) . "\" />\n";
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "<!-- Block All Tags - Stallion SEO -->\n";
				}
			}
			// Index First Tag Only : Block Paged 2,3,4...^^
			if ($options['st_seo_notindex_tags'] == "2") {
				add_filter( 'wpseo_canonical', '__return_false' );
				add_filter( 'aioseop_canonical_url', '__return_false' );
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
				}
				echo "<link rel=\"canonical\" href=\"" . get_term_link(get_query_var('tag'), 'post_tag') . "\" />\n";
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "<!-- Index First Tag Only : Block Paged 2,3,4...^^ - Stallion SEO -->\n";
				}
			}
		} elseif (is_home() || is_front_page()) {
			if ( !isset( $options['st_seo_notindex_home'] ) ) {
				$options['st_seo_notindex_home'] = '0' ;
			}
			// Index Home Paged Archives : do nothing

			// Index Home Page Only : Block Paged 2,3,4...^^
			if ($options['st_seo_notindex_home'] == "2") {
#				if (is_home() || is_front_page()) {
#					if ( 'page' == get_option( 'show_on_front' ) && get_option( 'page_for_posts' ) ) {
#						$posts_page = get_permalink( get_option( 'page_for_posts' ) );
#					} else {
						$posts_page = home_url( '/' );
#					}
					add_filter( 'wpseo_canonical', '__return_false' );
					add_filter( 'aioseop_canonical_url', '__return_false' );
					remove_action( 'wp_head', 'rel_canonical' );
					if ($options['st_seo_notindex_clean'] == "2") {
						echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
					}
					echo "<link rel=\"canonical\" href=\"" . $posts_page . "\" />\n";
					if ($options['st_seo_notindex_clean'] == "2") {
						echo "<!-- Index Home Page Only : Block Paged 2,3,4...^^ - Stallion SEO -->\n";
					}
#				}
			}
		} elseif (is_author()) {
			if ( !isset( $options['st_seo_notindex_author'] ) ) {
				$options['st_seo_notindex_author'] = '0' ;
			}
			// Block All Author Archives**
			if ($options['st_seo_notindex_author'] == "2") {
				add_filter( 'wpseo_canonical', '__return_false' );
				add_filter( 'aioseop_canonical_url', '__return_false' );
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
				}
				echo "<link rel=\"canonical\" href=\"" . home_url( '/' ) . "\" />\n";
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "<!-- Block All Author Archives** - Stallion SEO -->\n";
				}
			}
			// Index First Author Archive Only : Block Paged 2,3,4...^^
			if ($options['st_seo_notindex_author'] == "3") {
				add_filter( 'wpseo_canonical', '__return_false' );
				add_filter( 'aioseop_canonical_url', '__return_false' );
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
				}
				echo "<link rel=\"canonical\" href=\"" . get_author_posts_url(get_query_var('author')) . "\" />\n";
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "<!-- Index First Author Archive  Only : Block Paged 2,3,4...^^ - Stallion SEO -->\n";
				}
			}
		} elseif (is_date()) {
			if ( !isset( $options['st_seo_notindex_date'] ) ) {
				$options['st_seo_notindex_date'] = '0' ;
			}
			// Block All Date Archives**
			if ($options['st_seo_notindex_date'] == "2") {
				add_filter( 'wpseo_canonical', '__return_false' );
				add_filter( 'aioseop_canonical_url', '__return_false' );
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
				}
				echo "<link rel=\"canonical\" href=\"" . home_url( '/' ) . "\" />\n";
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "<!-- Block All Date Archives** - Stallion SEO -->\n";
				}
			}
		} elseif (is_search()) {
			if ( !isset( $options['st_seo_notindex_search'] ) ) {
				$options['st_seo_notindex_search'] = '0' ;
			}
			// Block All Search Results
			if ($options['st_seo_notindex_search'] == "1") {
				add_filter( 'wpseo_canonical', '__return_false' );
				add_filter( 'aioseop_canonical_url', '__return_false' );
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
				}
				echo "<link rel=\"canonical\" href=\"" . home_url( '/' ) . "\" />\n";
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "<!-- Block All Search Results - Stallion SEO -->\n";
				}
			}
			// Index First Search Result Only : Block Paged 2,3,4...**
			if ($options['st_seo_notindex_search'] == "2") {
				add_filter( 'wpseo_canonical', '__return_false' );
				add_filter( 'aioseop_canonical_url', '__return_false' );
				// Stallion Responsive search comments feature : needs work creating search comments canonical???
				if ( isset($_GET["search-type"]) && ($_GET["search-type"] == 'comment')) :
#				echo "<link rel=\"canonical\" href=\"" . get_search_link(get_query_var('search')) . "\" />\n";
				else :
					if ($options['st_seo_notindex_clean'] == "2") {
						echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
					}
					echo "<link rel=\"canonical\" href=\"" . get_search_link(get_query_var('search')) . "\" />\n";
					if ($options['st_seo_notindex_clean'] == "2") {
					echo "<!-- Index First Search Result Only : Block Paged 2,3,4...** - Stallion SEO -->\n";
					}
				endif;
			}
		} elseif (is_tax()) {
			if ( !isset( $options['st_seo_notindex_taxs'] ) ) {
				$options['st_seo_notindex_taxs'] = '0' ;
			}
			// Block All Custom Taxonomy Archives
			if ($options['st_seo_notindex_taxs'] == "1") {
				add_filter( 'wpseo_canonical', '__return_false' );
				add_filter( 'aioseop_canonical_url', '__return_false' );
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
				}
				echo "<link rel=\"canonical\" href=\"" . home_url( '/' ) . "\" />\n";
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "<!-- Block All Custom Taxonomy Archives - Stallion SEO -->\n";
				}
			}
			// Index First Custom Taxonomy Archive Only : Block Paged 2,3,4...^^
			if ($options['st_seo_notindex_taxs'] == "2") {
				add_filter( 'wpseo_canonical', '__return_false' );
				add_filter( 'aioseop_canonical_url', '__return_false' );
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
				}
				echo "<link rel=\"canonical\" href=\"" . get_term_link(get_query_var('term'), get_query_var( 'taxonomy')) . "\" />\n";
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "<!-- Index First Custom Taxonomy Archive Only : Block Paged 2,3,4...^^ - Stallion SEO -->\n";
				}
			}
		} elseif (is_post_type_archive()) {
			if ( !isset( $options['st_seo_notindex_custptarc'] ) ) {
				$options['st_seo_notindex_custptarc'] = '0' ;
			}
			// Block All Custom Post Type Archives
			if ($options['st_seo_notindex_custptarc'] == "1") {
				add_filter( 'wpseo_canonical', '__return_false' );
				add_filter( 'aioseop_canonical_url', '__return_false' );
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
				}
				echo "<link rel=\"canonical\" href=\"" . home_url( '/' ) . "\" />\n";
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "<!-- Block All Custom Post Type Archives - Stallion SEO -->\n";
				}
			}
			// Index First Custom Post Type Archive Only : Block Paged 2,3,4...^^
			if ($options['st_seo_notindex_custptarc'] == "2") {
				add_filter( 'wpseo_canonical', '__return_false' );
				add_filter( 'aioseop_canonical_url', '__return_false' );
				global $post_type;
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "\n<!-- Stallion WordPress SEO Plugin 3.0.0 by David Cameron Law http://stallion-theme.co.uk/stallion-wordpress-seo-plugin/ -->\n";
				}
				echo "<link rel=\"canonical\" href=\"" . get_post_type_archive_link($post_type) . "\" />\n";
				if ($options['st_seo_notindex_clean'] == "2") {
					echo "<!-- Index First Custom Post Type Archive Only : Block Paged 2,3,4...^^ - Stallion SEO -->\n";
				}
			}
		}
	}
}