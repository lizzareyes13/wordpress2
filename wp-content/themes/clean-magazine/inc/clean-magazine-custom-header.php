<?php
/**
 * Implement Custom Header functionality
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */


if ( ! function_exists( 'clean_magazine_custom_header' ) ) :
/**
 * Implementation of the Custom Header feature
 * Setup the WordPress core custom header feature and default custom headers packaged with the theme.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
	function clean_magazine_custom_header() {
		/**
		 * Get Default Theme Options Values
		 */
		$default_options = clean_magazine_get_default_theme_options();
		$default_header_color = $default_options['header_textcolor'];

		$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => $default_header_color,

		// Header image default
		'default-image'			=> get_template_directory_uri() . '/images/headers/buddha.jpg',

		// Set height and width, with a maximum value for the width.
		'height'                 => 400,
		'width'                  => 1200,

		// Support flexible height and width.
		'flex-height'            => true,
		'flex-width'             => true,

		// Random image rotation off by default.
		'random-default'         => false,

		// Callbacks for styling the header and the admin preview.
		'admin-head-callback'    => 'clean_magazine_admin_header_style',
		'admin-preview-callback' => 'clean_magazine_admin_header_image',
	);

	$args = apply_filters( 'custom-header', $args );

	// Add support for custom header
	add_theme_support( 'custom-header', $args );

	}
endif; // clean_magazine_custom_header
add_action( 'after_setup_theme', 'clean_magazine_custom_header' );


if ( ! function_exists( 'clean_magazine_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_admin_header_style() {
	$options 	= clean_magazine_get_theme_options();

	$defaults 	= clean_magazine_get_default_theme_options();
?>
	<style type="text/css">
	body {
		color: #404040;
		font-family: sans-serif;
		font-size: 15px;
		line-height: 1.5;
	}
	#site-logo,
	#site-header {
	    display: inline-block;
	    float: left;
	}
	#site-branding .site-title {
		font-size: 40px;
    	font-weight: bold;
    	line-height: 1.2;
    	margin: 0;
	}
	#site-branding .site-title a {
		color: #404040;
		text-decoration: none;
	}
	#site-branding .site-description {
		color: #404040;
		font-size: 13px;
		line-height: 1.2;
		font-style: italic;
		padding: 0;
	}
	.logo-left #site-header {
		padding-left: 10px;
	}
	.logo-right #site-header {
		padding-right: 10px;
	}
	#header-featured-image {
		clear: both;
		padding-top: 20px;
		max-width: 90%;
	}
	#header-featured-image img {
		height: auto;
		max-width: 100%;
	}
	<?php
	// If the user has set a custom color for the text use that
	if ( get_header_textcolor() != HEADER_TEXTCOLOR  && 'blank' != $text_color ) {
		echo '
		#site-branding .site-title a,
		#site-branding .site-description {
			color: #' . get_header_textcolor() . ';
		}';
	}
	if( $defaults[ 'site_title_color' ] != $options[ 'site_title_color' ] ) {
		echo "#site-branding .site-title a { color: ".  $options[ 'site_title_color' ] ."; }". "\n";
	}

	if( $defaults[ 'site_title_hover_color' ] != $options[ 'site_title_hover_color' ] ) {
		echo "#site-branding .site-title a:hover { color: ".  $options[ 'site_title_hover_color' ] ."; }". "\n";
	}

	if( $defaults[ 'tagline_color' ] != $options[ 'tagline_color' ] ) {
		echo "#site-branding .site-description { color: ".  $options[ 'tagline_color' ] ."; }". "\n";
	}

	 ?>
	</style>
<?php
}
endif; // clean_magazine_admin_header_style


if ( ! function_exists( 'clean_magazine_admin_header_image' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_admin_header_image() {

	clean_magazine_site_branding();
	clean_magazine_featured_image();
?>

<?php
}
endif; // clean_magazine_admin_header_image

if ( ! function_exists( 'clean_magazine_site_branding' ) ) :
	/**
	 * Get the logo and display
	 *
	 * @uses get_transient, clean_magazine_get_theme_options, get_header_textcolor, get_bloginfo, set_transient, display_header_text
	 * @get logo from options
	 *
	 * @display logo
	 *
	 * @action
	 *
	 * @since Clean Magazine 0.2
	 */
	function clean_magazine_site_branding() {
		$options 			= clean_magazine_get_theme_options();

		$clean_magazine_site_logo = '';

		//Checking Logo
		if ( function_exists( 'has_custom_logo' ) ) {
			if ( has_custom_logo() ) {
				$clean_magazine_site_logo = '
				<div id="site-logo">'. get_custom_logo() . '</div><!-- #site-logo -->';
			}
		}

		$clean_magazine_header_text = '
		<div id="site-header">
			<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a></h1>
			<h2 class="site-description">' . get_bloginfo( 'description' ) . '</h2>
		</div><!-- #site-header -->';


		$text_color = get_header_textcolor();
		if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
			if ( ! $options['move_title_tagline'] && 'blank' != $text_color ) {
				$clean_magazine_site_branding  = '<div id="site-branding" class="logo-left">';
				$clean_magazine_site_branding .= $clean_magazine_site_logo;
				$clean_magazine_site_branding .= $clean_magazine_header_text;
			}
			else {
				$clean_magazine_site_branding  = '<div id="site-branding" class="logo-right">';
				$clean_magazine_site_branding .= $clean_magazine_header_text;
				$clean_magazine_site_branding .= $clean_magazine_site_logo;
			}

		}
		else {
			$clean_magazine_site_branding	= '<div id="site-branding">';
			$clean_magazine_site_branding	.= $clean_magazine_header_text;
		}

		$clean_magazine_site_branding 	.= '</div><!-- #site-branding-->';

		echo $clean_magazine_site_branding ;
	}
endif; // clean_magazine_site_branding
add_action( 'clean_magazine_header', 'clean_magazine_site_branding', 60 );


if ( ! function_exists( 'clean_magazine_featured_image' ) ) :
	/**
	 * Template for Featured Header Image from theme options
	 *
	 * To override this in a child theme
	 * simply create your own clean_magazine_featured_image(), and that function will be used instead.
	 *
	 * @since Clean Magazine 0.2
	 */
	function clean_magazine_featured_image() {
		$options				= clean_magazine_get_theme_options();

		$header_image 			= get_header_image();

		//Support Random Header Image
		if ( is_random_header_image() ) {
			delete_transient( 'clean_magazine_featured_image' );
		}

		if ( !$clean_magazine_featured_image = get_transient( 'clean_magazine_featured_image' ) ) {

			echo '<!-- refreshing cache -->';

			if ( '' != $header_image  ) {

				// Header Image Link and Target
				if ( !empty( $options[ 'featured_header_image_url' ] ) ) {
					//support for qtranslate custom link
					if ( function_exists( 'qtrans_convertURL' ) ) {
						$link = qtrans_convertURL($options[ 'featured_header_image_url' ]);
					}
					else {
						$link = esc_url( $options[ 'featured_header_image_url' ] );
					}
					//Checking Link Target
					if ( !empty( $options[ 'featured_header_image_base' ] ) )  {
						$target = '_blank';
					}
					else {
						$target = '_self';
					}
				}
				else {
					$link = '';
					$target = '';
				}

				// Header Image Title/Alt
				if ( !empty( $options[ 'featured_header_image_alt' ] ) ) {
					$title = esc_attr( $options[ 'featured_header_image_alt' ] );
				}
				else {
					$title = '';
				}

				// Header Image
				$feat_image = '<img class="wp-post-image" alt="'.$title.'" src="'.esc_url(  $header_image ).'" />';

				$clean_magazine_featured_image = '<div id="header-featured-image">
					<div class="wrapper">';
					// Header Image Link
					if ( !empty( $options[ 'featured_header_image_url' ] ) ) :
						$clean_magazine_featured_image .= '<a title="'. esc_attr( $title ).'" href="'. esc_url( $link ) .'" target="'.$target.'">' . $feat_image . '</a>';
					else:
						// if empty featured_header_image on theme options, display default
						$clean_magazine_featured_image .= $feat_image;
					endif;
				$clean_magazine_featured_image .= '</div><!-- .wrapper -->
				</div><!-- #header-featured-image -->';
			}

			set_transient( 'clean_magazine_featured_image', $clean_magazine_featured_image, 86940 );
		}

		echo $clean_magazine_featured_image;

	} // clean_magazine_featured_image
endif;


if ( ! function_exists( 'clean_magazine_featured_page_post_image' ) ) :
	/**
	 * Template for Featured Header Image from Post and Page
	 *
	 * To override this in a child theme
	 * simply create your own clean_magazine_featured_imaage_pagepost(), and that function will be used instead.
	 *
	 * @since Clean Magazine 0.2
	 */
	function clean_magazine_featured_page_post_image() {
		global $post, $wp_query;

		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();
		$page_for_posts = get_option('page_for_posts');

		if ( is_home() && $page_for_posts == $page_id ) {
			$header_page_id = $page_id;
		}
		else {
			$header_page_id = $post->ID;
		}

		if( has_post_thumbnail( $header_page_id ) ) {
		   	$options					= clean_magazine_get_theme_options();
			$featured_header_image_url	= $options['featured_header_image_url'];
			$featured_header_image_base	= $options['featured_header_image_base'];

			if ( '' != $featured_header_image_url ) {
				//support for qtranslate custom link
				if ( function_exists( 'qtrans_convertURL' ) ) {
					$link = qtrans_convertURL( $featured_header_image_url );
				}
				else {
					$link = esc_url( $featured_header_image_url );
				}
				//Checking Link Target
				if ( '1' == $featured_header_image_base ) {
					$target = '_blank';
				}
				else {
					$target = '_self';
				}
			}
			else {
				$link = '';
				$target = '';
			}

			$featured_header_image_alt	= $options['featured_header_image_alt'];
			// Header Image Title/Alt
			if ( '' != $featured_header_image_alt ) {
				$title = esc_attr( $featured_header_image_alt );
			}
			else {
				$title = '';
			}

			$featured_image_size	= $options['featured_image_size'];

			if ( 'slider' ==  $featured_image_size ) {
				$feat_image = get_the_post_thumbnail( $post->ID, 'clean-magazine-slider', array('id' => 'main-feat-img'));
			}
			else if ( 'full' ==  $featured_image_size ) {
				$feat_image = get_the_post_thumbnail( $post->ID, 'full', array('id' => 'main-feat-img'));
			}
			else {
				$feat_image = get_the_post_thumbnail( $post->ID, 'clean-magazine-large', array('id' => 'main-feat-img'));
			}

			$clean_magazine_featured_image = '<div id="header-featured-image" class =' . $featured_image_size . '>';
				// Header Image Link
				if ( '' != $featured_header_image_url ) :
					$clean_magazine_featured_image .= '<a title="'. esc_attr( $title ).'" href="'. esc_url( $link ) .'" target="'.$target.'">' . $feat_image . '</a>';
				else:
					// if empty featured_header_image on theme options, display default
					$clean_magazine_featured_image .= $feat_image;
				endif;
			$clean_magazine_featured_image .= '</div><!-- #header-featured-image -->';

			echo $clean_magazine_featured_image;
		}
		else {
			clean_magazine_featured_image();
		}
	} // clean_magazine_featured_page_post_image
endif;


if ( ! function_exists( 'clean_magazine_featured_overall_image' ) ) :
	/**
	 * Template for Featured Header Image from theme options
	 *
	 * To override this in a child theme
	 * simply create your own clean_magazine_featured_pagepost_image(), and that function will be used instead.
	 *
	 * @since Clean Magazine 0.2
	 */
	function clean_magazine_featured_overall_image() {
		global $post, $wp_query;
		$options				= clean_magazine_get_theme_options();
		$defaults 				= clean_magazine_get_default_theme_options();
		$enableheaderimage 		= $options['enable_featured_header_image'];

		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();

		$page_for_posts = get_option('page_for_posts');

		// Check Enable/Disable header image in Page/Post Meta box
		if ( is_page() || is_single() ) {
			//Individual Page/Post Image Setting
			$individual_featured_image = get_post_meta( $post->ID, 'clean-magazine-header-image', true );

			if ( 'disable' == $individual_featured_image  || ( 'default' == $individual_featured_image  && 'disable' == $enableheaderimage  ) ) {
				echo '<!-- Page/Post Disable Header Image -->';
				return;
			}
			elseif ( 'enable' == $individual_featured_image  && 'disabled' == $enableheaderimage  ) {
				clean_magazine_featured_page_post_image();
			}
		}

		// Check Homepage
		if ( 'homepage' == $enableheaderimage  ) {
			if ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) {
				clean_magazine_featured_image();
			}
		}
		// Check Excluding Homepage
		if ( 'exclude-home' == $enableheaderimage  ) {
			if ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) {
				return false;
			}
			else {
				clean_magazine_featured_image();
			}
		}
		elseif ( 'exclude-home-page-post' == $enableheaderimage  ) {
			if ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) {
				return false;
			}
			elseif ( is_page() || is_single() ) {
				clean_magazine_featured_page_post_image();
			}
			else {
				clean_magazine_featured_image();
			}
		}
		// Check Entire Site
		elseif ( 'entire-site' == $enableheaderimage  ) {
			clean_magazine_featured_image();
		}
		// Check Entire Site (Post/Page)
		elseif ( 'entire-site-page-post' == $enableheaderimage  ) {
			if ( is_page() || is_single() ) {
				clean_magazine_featured_page_post_image();
			}
			else {
				clean_magazine_featured_image();
			}
		}
		// Check Page/Post
		elseif ( 'pages-posts' == $enableheaderimage  ) {
			if ( is_page() || is_single() ) {
				clean_magazine_featured_page_post_image();
			}
		}
		else {
			echo '<!-- Disable Header Image -->';
		}
	} // clean_magazine_featured_overall_image
endif;
add_action( 'clean_magazine_after_header', 'clean_magazine_featured_overall_image', 10 );