<?php
/**
 * Implement Default Theme/Customizer Options
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */


/**
 * Returns the default options for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_get_default_theme_options() {

	$theme_data = wp_get_theme();

	$default_theme_options = array(
		//Site Title an Tagline
		'move_title_tagline'                   => 0,

		//Layout
		'theme_layout'                         => 'right-sidebar',
		'content_layout'                       => 'excerpt-image-left',
		'single_post_image_layout'             => 'disabled',

		//Header Image
		'enable_featured_header_image'         => 'disabled',
		'featured_image_size'                  => 'full',
		'featured_header_image_url'            => '',
		'featured_header_image_alt'            => '',
		'featured_header_image_base'           => 0,

		//Breadcrumb Options
		'breadcumb_option'                     => 0,
		'breadcumb_onhomepage'                 => 0,
		'breadcumb_seperator'                  => '&raquo;',

		//Custom CSS
		'custom_css'                           => '',

		//Scrollup Options
		'disable_scrollup'                     => 0,

		//Excerpt Options
		'excerpt_length'                       => '45',
		'excerpt_more_text'                    => __( 'Read More ...', 'clean-magazine' ),

		//Homepage / Frontpage Settings
		'front_page_category'                  => array(),

		//Pagination Options
		'pagination_type'                      => 'default',

		//Promotion Headline Options
		'promotion_headline_option'            => 'homepage',
		'promotion_headline'                   => __( 'Clean Magazine is a Responsive WordPress Theme', 'clean-magazine' ),
		'promotion_subheadline'                => __( 'This is promotion headline. You can edit this from Appearance -> Customize -> Theme Options -> Promotion Headline Options', 'clean-magazine' ),
		'promotion_headline_button'            => __( 'Buy Now', 'clean-magazine' ),
		'promotion_headline_url'               => esc_url( 'https://catchthemes.com/' ),
		'promotion_headline_target'            => 1,

		//Search Options
		'search_text'                          => __( 'Search...', 'clean-magazine' ),

		//Footer Editor Options
		'footer_content'                       => sprintf( _x( 'Copyright &copy; %1$s %2$s. All Rights Reserved', '1: Year, 2: Site Title with home URL', 'clean-magazine' ), '[the-year]', '[site-link]' ) . ' &#124; ' . $theme_data->get( 'Name') . '&nbsp;' . __( 'by', 'clean-magazine' ). '&nbsp;<a target="_blank" href="'. $theme_data->get( 'AuthorURI' ) .'">'. $theme_data->get( 'Author' ) .'</a>',
		'reset_footer_content'                 => 0,

		//Color Options
		'background_color'                     => '#f9f9f9',
		'header_textcolor'                     => '#111111',

		//Featured Content Options
		'header_highlight_content_option'      => 'disabled',
		'header_highlight_content_type'        => 'demo-header-highlight-content',
		'header_highlight_content_headline'    => '',
		'header_highlight_content_subheadline' => '',
		'header_highlight_content_number'      => '5',
		'header_highlight_content_show'        => 'excerpt',

		//Featured Content Options
		'featured_content_option'              => 'disabled',
		'featured_content_layout'              => 'layout-four',
		'featured_content_position'            => 1,
		'featured_content_headline'            => '',
		'featured_content_subheadline'         => '',
		'featured_content_type'                => 'demo-featured-content',
		'featured_content_number'              => '3',
		'featured_content_show'                => 'excerpt',

		//News Ticker Options
		'news_ticker_option'                   => 'disabled',
		'news_ticker_position'                 => 'below-menu',
		'news_ticker_type'                     => 'demo-news-ticker',
		'news_ticker_label'                    => '',
		'news_ticker_number'                   => '4',
		'news_ticker_transition_effect'        => 'flipVert',

		//Featured Slider Options
		'featured_slider_option'               => 'disabled',
		'featured_slider_image_loader'         => 'true',
		'featured_slide_transition_effect'     => 'fadeout',
		'featured_slide_transition_delay'      => '4',
		'featured_slide_transition_length'     => '1',
		'featured_slider_type'                 => 'demo-featured-slider',
		'featured_slide_number'                => '4',

		//Reset all settings
		'reset_all_settings'                   => 0,
	);

	return apply_filters( 'clean_magazine_default_theme_options', $default_theme_options );
}

/**
 * Returns an array of layout options registered for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_layouts() {
	$layout_options = array(
		'left-sidebar' 	=> array(
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'clean-magazine' ),
		),
		'right-sidebar' => array(
			'value' => 'right-sidebar',
			'label' => __( 'Content, Primary Sidebar', 'clean-magazine' ),
		),
		'no-sidebar'	=> array(
			'value' => 'no-sidebar',
			'label' => __( 'No Sidebar ( Content Width )', 'clean-magazine' ),
		)
	);
	return apply_filters( 'clean_magazine_layouts', $layout_options );
}


/**
 * Returns an array of content layout options registered for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_get_archive_content_layout() {
	$layout_options = array(
		'excerpt-image-left' => array(
			'value' => 'excerpt-image-left',
			'label' => __( 'Excerpt Image Left', 'clean-magazine' ),
		),
		'full-content' => array(
			'value' => 'full-content',
			'label' => __( 'Show Full Content (No Featured Image)', 'clean-magazine' ),
		),
	);

	return apply_filters( 'clean_magazine_get_archive_content_layout', $layout_options );
}


/**
 * Returns an array of feature header enable options
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_enable_featured_header_image_options() {
	$enable_featured_header_image_options = array(
		'homepage' 		=> array(
			'value'	=> 'homepage',
			'label' => __( 'Homepage / Frontpage', 'clean-magazine' ),
		),
		'exclude-home' 		=> array(
			'value'	=> 'exclude-home',
			'label' => __( 'Excluding Homepage', 'clean-magazine' ),
		),
		'exclude-home-page-post' 	=> array(
			'value' => 'exclude-home-page-post',
			'label' => __( 'Excluding Homepage, Page/Post Featured Image', 'clean-magazine' ),
		),
		'entire-site' 	=> array(
			'value' => 'entire-site',
			'label' => __( 'Entire Site', 'clean-magazine' ),
		),
		'entire-site-page-post' 	=> array(
			'value' => 'entire-site-page-post',
			'label' => __( 'Entire Site, Page/Post Featured Image', 'clean-magazine' ),
		),
		'pages-posts' 	=> array(
			'value' => 'pages-posts',
			'label' => __( 'Pages and Posts', 'clean-magazine' ),
		),
		'disabled'		=> array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'clean-magazine' ),
		),
	);

	return apply_filters( 'clean_magazine_enable_featured_header_image_options', $enable_featured_header_image_options );
}


/**
 * Returns an array of feature image size
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_featured_image_size_options() {
	$featured_image_size_options = array(
		'full' 		=> array(
			'value'	=> 'full',
			'label' => __( 'Full Image', 'clean-magazine' ),
		),
		'large' 	=> array(
			'value' => 'large',
			'label' => __( 'Large Image', 'clean-magazine' ),
		),
		'slider'		=> array(
			'value' => 'slider',
			'label' => __( 'Slider Image', 'clean-magazine' ),
		),
	);

	return apply_filters( 'clean_magazine_featured_image_size_options', $featured_image_size_options );
}


/**
 * Returns an array of header highlight content types registered for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_header_highlight_content_types() {
	$options = array(
		'demo-header-highlight-content' => array(
			'value' => 'demo-header-highlight-content',
			'label' => __( 'Demo Content', 'clean-magazine' ),
		),
		'header-highlight-page-content' => array(
			'value' => 'header-highlight-page-content',
			'label' => __( 'Page Content', 'clean-magazine' ),
		)
	);

	return apply_filters( 'clean_magazine_header_highlight_content_types', $options );
}


/**
 * Returns an array of content and slider layout options registered for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_featured_slider_content_options() {
	$featured_slider_content_options = array(
		'homepage' 		=> array(
			'value'	=> 'homepage',
			'label' => __( 'Homepage / Frontpage', 'clean-magazine' ),
		),
		'entire-site' 	=> array(
			'value' => 'entire-site',
			'label' => __( 'Entire Site', 'clean-magazine' ),
		),
		'disabled'		=> array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'clean-magazine' ),
		),
	);

	return apply_filters( 'clean_magazine_featured_slider_content_options', $featured_slider_content_options );
}


/**
 * Returns an array of news ticker types registered for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_news_ticker_types() {
	$options = array(
		'demo-news-ticker' => array(
			'value' => 'demo-news-ticker',
			'label' => __( 'Demo Content', 'clean-magazine' ),
		),
		'page-news-ticker' => array(
			'value' => 'page-news-ticker',
			'label' => __( 'Page News Ticker', 'clean-magazine' ),
		)
	);

	return apply_filters( 'clean_magazine_news_ticker_types', $options );
}


/**
 * Returns an array of news ticker positions registered for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_news_ticker_positions() {
	$options = array(
		'below-menu' => array(
			'value' => 'below-menu',
			'label' => __( 'Below Menu', 'clean-magazine' ),
		),
		'above-content' => array(
			'value' => 'above-content',
			'label' => __( 'Above Content', 'clean-magazine' ),
		)
	);

	return apply_filters( 'clean_magazine_news_ticker_positions', $options );
}


/**
 * Returns an array of feature content types registered for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_featured_content_types() {
	$featured_content_types = array(
		'demo-featured-content' => array(
			'value' => 'demo-featured-content',
			'label' => __( 'Demo Featured Content', 'clean-magazine' ),
		),
		'featured-page-content' => array(
			'value' => 'featured-page-content',
			'label' => __( 'Featured Page Content', 'clean-magazine' ),
		)
	);

	return apply_filters( 'clean_magazine_featured_content_types', $featured_content_types );
}


/**
 * Returns an array of featured content options registered for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_featured_content_layout_options() {
	$featured_content_layout_option = array(
		'layout-two' 		=> array(
			'value'	=> 'layout-two',
			'label' => __( '2 columns', 'clean-magazine' ),
		),
		'layout-three' 		=> array(
			'value'	=> 'layout-three',
			'label' => __( '3 columns', 'clean-magazine' ),
		),
		'layout-four' 	=> array(
			'value' => 'layout-four',
			'label' => __( '4 columns', 'clean-magazine' ),
		),
	);

	return apply_filters( 'clean_magazine_featured_content_layout_options', $featured_content_layout_option );
}


/**
 * Returns an array of featured content show registered for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_featured_content_show() {
	$featured_content_show_option = array(
		'excerpt' 		=> array(
			'value'	=> 'excerpt',
			'label' => __( 'Show Excerpt', 'clean-magazine' ),
		),
		'full-content' 	=> array(
			'value' => 'full-content',
			'label' => __( 'Show Full Content', 'clean-magazine' ),
		),
		'hide-content' 	=> array(
			'value' => 'hide-content',
			'label' => __( 'Hide Content', 'clean-magazine' ),
		),
	);

	return apply_filters( 'clean_magazine_featured_content_show', $featured_content_show_option );
}


/**
 * Returns an array of feature slider types registered for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_featured_slider_types() {
	$featured_slider_types = array(
		'demo-featured-slider' => array(
			'value' => 'demo-featured-slider',
			'label' => __( 'Demo Featured Slider', 'clean-magazine' ),
		),
		'featured-page-slider' => array(
			'value' => 'featured-page-slider',
			'label' => __( 'Featured Page Slider', 'clean-magazine' ),
		),
	);

	return apply_filters( 'clean_magazine_featured_slider_types', $featured_slider_types );
}


/**
 * Returns an array of feature slider transition effects
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_featured_slide_transition_effects() {
	$featured_slide_transition_effects = array(
		'fade' 		=> array(
			'value'	=> 'fade',
			'label' => __( 'Fade', 'clean-magazine' ),
		),
		'fadeout' 	=> array(
			'value'	=> 'fadeout',
			'label' => __( 'Fade Out', 'clean-magazine' ),
		),
		'none' 		=> array(
			'value' => 'none',
			'label' => __( 'None', 'clean-magazine' ),
		),
		'scrollHorz'=> array(
			'value' => 'scrollHorz',
			'label' => __( 'Scroll Horizontal', 'clean-magazine' ),
		),
		'scrollVert'=> array(
			'value' => 'scrollVert',
			'label' => __( 'Scroll Vertical', 'clean-magazine' ),
		),
		'flipHorz'	=> array(
			'value' => 'flipHorz',
			'label' => __( 'Flip Horizontal', 'clean-magazine' ),
		),
		'flipVert'	=> array(
			'value' => 'flipVert',
			'label' => __( 'Flip Vertical', 'clean-magazine' ),
		),
		'tileSlide'	=> array(
			'value' => 'tileSlide',
			'label' => __( 'Tile Slide', 'clean-magazine' ),
		),
		'tileBlind'	=> array(
			'value' => 'tileBlind',
			'label' => __( 'Tile Blind', 'clean-magazine' ),
		),
		'shuffle'	=> array(
			'value' => 'shuffle',
			'label' => __( 'Shuffle', 'clean-magazine' ),
		)
	);

	return apply_filters( 'clean_magazine_featured_slide_transition_effects', $featured_slide_transition_effects );
}

/**
 * Returns an array of featured slider image loader options
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_featured_slider_image_loader() {
	$options = array(
		'true' => array(
			'value' 				=> 'true',
			'label' 				=> __( 'True', 'clean-magazine' ),
		),
		'wait' => array(
			'value' 				=> 'wait',
			'label' 				=> __( 'Wait', 'clean-magazine' ),
		),
		'false' => array(
			'value' 				=> 'false',
			'label' 				=> __( 'False', 'clean-magazine' ),
		),
	);

	return apply_filters( 'clean_magazine_featured_slider_image_loader', $options );
}


/**
 * Returns an array of pagination types registered for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_get_pagination_types() {
	$pagination_types = array(
		'default' => array(
			'value' => 'default',
			'label' => __( 'Default(Older Posts/Newer Posts)', 'clean-magazine' ),
		),
		'numeric' => array(
			'value' => 'numeric',
			'label' => __( 'Numeric', 'clean-magazine' ),
		),
		'infinite-scroll-click' => array(
			'value' => 'infinite-scroll-click',
			'label' => __( 'Infinite Scroll (Click)', 'clean-magazine' ),
		),
		'infinite-scroll-scroll' => array(
			'value' => 'infinite-scroll-scroll',
			'label' => __( 'Infinite Scroll (Scroll)', 'clean-magazine' ),
		),
	);

	return apply_filters( 'clean_magazine_get_pagination_types', $pagination_types );
}


/**
 * Returns an array of content featured image size.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_single_post_image_layout_options() {
	$single_post_image_layout_options = array(
		'large' => array(
			'value' => 'large',
			'label' => __( 'Large', 'clean-magazine' ),
		),
		'full-size' => array(
			'value' => 'full-size',
			'label' => __( 'Full size', 'clean-magazine' ),
		),
		'slider-image-size' => array(
			'value' => 'slider-image-size',
			'label' => __( 'Slider Image Size', 'clean-magazine' ),
		),
		'featured' => array(
			'value' => 'featured',
			'label' => __( 'Featured Image Size', 'clean-magazine' ),
		),
		'disabled' => array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'clean-magazine' ),
		),
	);
	return apply_filters( 'clean_magazine_single_post_image_layout_options', $single_post_image_layout_options );
}


/**
 * Returns an array of avaliable fonts registered for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_avaliable_fonts() {
	$avaliable_fonts = array(
		'arial-black' => array(
			'value' => 'arial-black',
			'label' => '"Arial Black", Gadget, sans-serif',
		),
		'allan' => array(
			'value' => 'allan',
			'label' => '"Allan", sans-serif',
		),
		'allerta' => array(
			'value' => 'allerta',
			'label' => '"Allerta", sans-serif',
		),
		'amaranth' => array(
			'value' => 'amaranth',
			'label' => '"Amaranth", sans-serif',
		),
		'arial' => array(
			'value' => 'arial',
			'label' => 'Arial, Helvetica, sans-serif',
		),
		'bitter' => array(
			'value' => 'bitter',
			'label' => '"Bitter", sans-serif',
		),
		'cabin' => array(
			'value' => 'cabin',
			'label' => '"Cabin", sans-serif',
		),
		'cantarell' => array(
			'value' => 'cantarell',
			'label' => '"Cantarell", sans-serif',
		),
		'century-gothic' => array(
			'value' => 'century-gothic',
			'label' => '"Century Gothic", sans-serif',
		),
		'courier-new' => array(
			'value' => 'courier-new',
			'label' => '"Courier New", Courier, monospace',
		),
		'crimson-text' => array(
			'value' => 'crimson-text',
			'label' => '"Crimson Text", sans-serif',
		),
		'cuprum' => array(
			'value' => 'cuprum',
			'label' => '"Cuprum", sans-serif',
		),
		'dancing-script' => array(
			'value' => 'dancing-script',
			'label' => '"Dancing Script", sans-serif',
		),
		'droid-sans' => array(
			'value' => 'droid-sans',
			'label' => '"Droid Sans", sans-serif',
		),
		'droid-serif' => array(
			'value' => 'droid-serif',
			'label' => '"Droid Serif", sans-serif',
		),
		'exo' => array(
			'value' => 'exo',
			'label' => '"Exo", sans-serif',
		),
		'exo-2' => array(
			'value' => 'exo-2',
			'label' => '"Exo 2", sans-serif',
		),
		'georgia' => array(
			'value' => 'georgia',
			'label' => 'Georgia, "Times New Roman", Times, serif',
		),
		'helvetica' => array(
			'value' => 'helvetica',
			'label' => 'Helvetica, "Helvetica Neue", Arial, sans-serif',
		),
		'helvetica-neue' => array(
			'value' => 'helvetica-neue',
			'label' => '"Helvetica Neue",Helvetica,Arial,sans-serif',
		),
		'istok-web' => array(
			'value' => 'istok-web',
			'label' => '"Istok Web", sans-serif',
		),
		'impact' => array(
			'value' => 'impact',
			'label' => 'Impact, Charcoal, sans-serif',
		),
		'josefin-sans' => array(
			'value' => 'josefin-sans',
			'label' => '"Josefin Sans", sans-serif',
		),
		'lato' => array(
			'value' => 'lato',
			'label' => '"Lato", sans-serif',
		),
		'libre-baskerville' => array(
			'value' => 'libre-baskerville',
			'label' => '"Libre Baskerville",serif'
		),
		'lucida-sans-unicode' => array(
			'value' => 'lucida-sans-unicode',
			'label' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
		),
		'lucida-grande' => array(
			'value' => 'lucida-grande',
			'label' => '"Lucida Grande", "Lucida Sans Unicode", sans-serif',
		),
		'lobster' => array(
			'value' => 'lobster',
			'label' => '"Lobster", sans-serif',
		),
		'lora' => array(
			'value' => 'lora',
			'label' => '"Lora", serif',
		),
		'monaco' => array(
			'value' => 'monaco',
			'label' => 'Monaco, Consolas, "Lucida Console", monospace, sans-serif',
		),
		'merriweather' => array(
			'value' => 'merriweather',
			'label' => '"Merriweather", sans-serif',
		),
		'montserrat' => array(
			'value' => 'montserrat',
			'label' => '"Montserrat", sans-serif',
		),
		'nobile' => array(
			'value' => 'nobile',
			'label' => '"Nobile", sans-serif',
		),
		'noto-serif' => array(
			'value' => 'noto-serif',
			'label' => '"Noto Serif", serif',
		),
		'neuton' => array(
			'value' => 'neuton',
			'label' => '"Neuton", serif',
		),
		'open-sans' => array(
			'value' => 'open-sans',
			'label' => '"Open Sans", sans-serif',
		),
		'oswald' => array(
			'value' => 'oswald',
			'label' => '"Oswald", sans-serif',
		),
		'palatino' => array(
			'value' => 'palatino',
			'label' => 'Palatino, "Palatino Linotype", "Book Antiqua", serif',
		),
		'patua-one' => array(
			'value' => 'patua-one',
			'label' => '"Patua One", sans-serif',
		),
		'playfair-display' => array(
			'value' => 'playfair-display',
			'label' => '"Playfair Display", sans-serif',
		),
		'pt-sans' => array(
			'value' => 'pt-sans',
			'label' => '"PT Sans", sans-serif',
		),
		'pt-serif' => array(
			'value' => 'pt-serif',
			'label' => '"PT Serif", serif',
		),
		'quattrocento' => array(
			'value' => 'Quattrocento',
			'label' => '"Quattrocento", serif',
		),
		'quattrocento-sans' => array(
			'value' => 'quattrocento-sans',
			'label' => '"Quattrocento Sans", sans-serif',
		),
		'roboto' => array(
			'value' => 'roboto',
			'label' => '"Roboto", sans-serif',
		),
		'roboto-slab' => array(
			'value' => 'roboto-slab',
			'label' => '"Roboto Slab", serif',
		),
		'sans-serif' => array(
			'value' => 'sans-serif',
			'label' => 'Sans Serif, Arial',
		),
		'source-sans-pro' => array(
			'value' => 'source-sans-pro',
			'label' => '"Source Sans Pro", sans-serif',
		),
		'tahoma' => array(
			'value' => 'tahoma',
			'label' => 'Tahoma, Geneva, sans-serif',
		),
		'trebuchet-ms' => array(
			'value' => 'trebuchet-ms',
			'label' => '"Trebuchet MS", "Helvetica", sans-serif',
		),
		'times-new-roman' => array(
			'value' => 'times-new-roman',
			'label' => '"Times New Roman", Times, serif',
		),
		'ubuntu' => array(
			'value' => 'ubuntu',
			'label' => '"Ubuntu", sans-serif',
		),
		'varela' => array(
			'value' => 'varela',
			'label' => '"Varela", sans-serif',
		),
		'verdana' => array(
			'value' => 'verdana',
			'label' => 'Verdana, Geneva, sans-serif',
		),
		'yanone-kaffeesatz' => array(
			'value' => 'yanone-kaffeesatz',
			'label' => '"Yanone Kaffeesatz", sans-serif',
		),
	);

	return apply_filters( 'clean_magazine_avaliable_fonts', $avaliable_fonts );
}


/**
 * Returns list of social icons currently supported
 *
 * @since Clean Magazine 0.2
*/
function clean_magazine_get_social_icons_list() {
	$clean_magazine_social_icons_list = array(
		'facebook_link'		=> array(
			'genericon_class' 	=> 'facebook-alt',
			'label' 			=> esc_html__( 'Facebook', 'clean-magazine' )
			),
		'twitter_link'		=> array(
			'genericon_class' 	=> 'twitter',
			'label' 			=> esc_html__( 'Twitter', 'clean-magazine' )
			),
		'googleplus_link'	=> array(
			'genericon_class' 	=> 'googleplus-alt',
			'label' 			=> esc_html__( 'Googleplus', 'clean-magazine' )
			),
		'email_link'		=> array(
			'genericon_class' 	=> 'mail',
			'label' 			=> esc_html__( 'Email', 'clean-magazine' )
			),
		'feed_link'			=> array(
			'genericon_class' 	=> 'feed',
			'label' 			=> esc_html__( 'Feed', 'clean-magazine' )
			),
		'wordpress_link'	=> array(
			'genericon_class' 	=> 'wordpress',
			'label' 			=> esc_html__( 'WordPress', 'clean-magazine' )
			),
		'github_link'		=> array(
			'genericon_class' 	=> 'github',
			'label' 			=> esc_html__( 'GitHub', 'clean-magazine' )
			),
		'linkedin_link'		=> array(
			'genericon_class' 	=> 'linkedin',
			'label' 			=> esc_html__( 'LinkedIn', 'clean-magazine' )
			),
		'pinterest_link'	=> array(
			'genericon_class' 	=> 'pinterest',
			'label' 			=> esc_html__( 'Pinterest', 'clean-magazine' )
			),
		'flickr_link'		=> array(
			'genericon_class' 	=> 'flickr',
			'label' 			=> esc_html__( 'Flickr', 'clean-magazine' )
			),
		'vimeo_link'		=> array(
			'genericon_class' 	=> 'vimeo',
			'label' 			=> esc_html__( 'Vimeo', 'clean-magazine' )
			),
		'youtube_link'		=> array(
			'genericon_class' 	=> 'youtube',
			'label' 			=> esc_html__( 'YouTube', 'clean-magazine' )
			),
		'tumblr_link'		=> array(
			'genericon_class' 	=> 'tumblr',
			'label' 			=> esc_html__( 'Tumblr', 'clean-magazine' )
			),
		'instagram_link'	=> array(
			'genericon_class' 	=> 'instagram',
			'label' 			=> esc_html__( 'Instagram', 'clean-magazine' )
			),
		'polldaddy_link'	=> array(
			'genericon_class' 	=> 'polldaddy',
			'label' 			=> esc_html__( 'PollDaddy', 'clean-magazine' )
			),
		'codepen_link'		=> array(
			'genericon_class' 	=> 'codepen',
			'label' 			=> esc_html__( 'CodePen', 'clean-magazine' )
			),
		'path_link'			=> array(
			'genericon_class' 	=> 'path',
			'label' 			=> esc_html__( 'Path', 'clean-magazine' )
			),
		'dribbble_link'		=> array(
			'genericon_class' 	=> 'dribbble',
			'label' 			=> esc_html__( 'Dribbble', 'clean-magazine' )
			),
		'skype_link'		=> array(
			'genericon_class' 	=> 'skype',
			'label' 			=> esc_html__( 'Skype', 'clean-magazine' )
			),
		'digg_link'			=> array(
			'genericon_class' 	=> 'digg',
			'label' 			=> esc_html__( 'Digg', 'clean-magazine' )
			),
		'reddit_link'		=> array(
			'genericon_class' 	=> 'reddit',
			'label' 			=> esc_html__( 'Reddit', 'clean-magazine' )
			),
		'stumbleupon_link'	=> array(
			'genericon_class' 	=> 'stumbleupon',
			'label' 			=> esc_html__( 'Stumbleupon', 'clean-magazine' )
			),
		'pocket_link'		=> array(
			'genericon_class' 	=> 'pocket',
			'label' 			=> esc_html__( 'Pocket', 'clean-magazine' ),
			),
		'dropbox_link'		=> array(
			'genericon_class' 	=> 'dropbox',
			'label' 			=> esc_html__( 'DropBox', 'clean-magazine' ),
			),
		'spotify_link'		=> array(
			'genericon_class' 	=> 'spotify',
			'label' 			=> esc_html__( 'Spotify', 'clean-magazine' ),
			),
		'foursquare_link'	=> array(
			'genericon_class' 	=> 'foursquare',
			'label' 			=> esc_html__( 'Foursquare', 'clean-magazine' ),
			),
		'twitch_link'		=> array(
			'genericon_class' 	=> 'twitch',
			'label' 			=> esc_html__( 'Twitch', 'clean-magazine' ),
			),
		'website_link'		=> array(
			'genericon_class' 	=> 'website',
			'label' 			=> esc_html__( 'Website', 'clean-magazine' ),
			),
		'phone_link'		=> array(
			'genericon_class' 	=> 'phone',
			'label' 			=> esc_html__( 'Phone', 'clean-magazine' ),
			),
		'handset_link'		=> array(
			'genericon_class' 	=> 'handset',
			'label' 			=> esc_html__( 'Handset', 'clean-magazine' ),
			),
		'cart_link'			=> array(
			'genericon_class' 	=> 'cart',
			'label' 			=> esc_html__( 'Cart', 'clean-magazine' ),
			),
		'cloud_link'		=> array(
			'genericon_class' 	=> 'cloud',
			'label' 			=> esc_html__( 'Cloud', 'clean-magazine' ),
			),
		'link_link'		=> array(
			'genericon_class' 	=> 'link',
			'label' 			=> esc_html__( 'Link', 'clean-magazine' ),
			),
	);

	return apply_filters( 'clean_magazine_social_icons_list', $clean_magazine_social_icons_list );
}


/**
 * Returns list of basic color options currently supported
 *
 * @since Clean Magazine 0.2
*/
function clean_magazine_get_basic_color_options() {
	$basic_color_options =	array(
									'text_color' 		=> __( 'Text Color', 'clean-magazine' ),
									'link_color' 		=> __( 'Link Color', 'clean-magazine' ),
									'link_hover_color'	=> __( 'Link Hover Color', 'clean-magazine' ),
								);

	return apply_filters( 'clean_magazine_get_basic_color_options', $basic_color_options );
}


/**
 * Returns list of content color options currently supported
 *
 * @since Clean Magazine 0.2
*/
function clean_magazine_get_content_color_options() {
	$content_color_options =	array(
									'content_wrapper_background_color' 	=> __( 'Content Wrapper Background Color', 'clean-magazine' ),
									'content_background_color'			=> __( 'Content Background Color', 'clean-magazine' ),
									'content_title_color' 				=> __( 'Content Title Color', 'clean-magazine' ),
									'content_title_hover_color' 		=> __( 'Content Title Hover Color', 'clean-magazine' ),
									'content_meta_color' 				=> __( 'Content Meta Color', 'clean-magazine' ),
									'content_meta_hover_color' 			=> __( 'Content Meta Hover Color', 'clean-magazine' ),
								);

	return apply_filters( 'clean_magazine_get_content_color_options', $content_color_options );
}


/**
 * Returns list of header color options currently supported
 *
 * @since Clean Magazine 0.2
*/
function clean_magazine_get_header_color_options() {
	$header_color_options =	array(
									'header_background_color' 	=> __( 'Header Background color', 'clean-magazine' ),
									'site_title_hover_color' 	=>__( 'Site Title Hover Color', 'clean-magazine' ),
									'tagline_color' 			=> __( 'Tagline Color', 'clean-magazine' )
								);

	return apply_filters( 'clean_magazine_get_header_color_options', $header_color_options );
}


/**
 * Returns list of sidebar color options currently supported
 *
 * @since Clean Magazine 0.2
*/
function clean_magazine_get_sidebar_color_options() {
	$sidebar_color_options = array(
									'sidebar_background_color' 		=> __( 'Sidebar Background Color', 'clean-magazine' ),
									'sidebar_widget_title_color' 	=>__( 'Sidebar Widget Title Color', 'clean-magazine' ),
									'sidebar_widget_text_color' 	=>__( 'Sidebar Widget Text Color', 'clean-magazine' ),
									'sidebar_widget_link_color' 	=>__( 'Sidebar Widget Link Color', 'clean-magazine' ),
								);
	return apply_filters( 'clean_magazine_get_sidebar_color_options', $sidebar_color_options );
}


/**
 * Returns list of pagination color options currently supported
 *
 * @since Clean Magazine 0.2
*/
function clean_magazine_get_pagination_color_options() {
	$pagination_color_options = array(
									'pagination_background_color' 					=> __( 'Pagination Background Color', 'clean-magazine' ),
									'pagination_hover_background_color' 			=> __( 'Pagination Hover Background Color', 'clean-magazine' ),
									'pagination_text_color' 						=> __( 'Pagination Text Color', 'clean-magazine' ),
									'pagination_link_color' 						=> __( 'Pagination Link Color', 'clean-magazine' ),
									'pagination_hover_active_color' 				=> __( 'Pagination Hover/Active Color', 'clean-magazine' ),
									'numeric_infinite_scroll_background_color' 		=> __( 'Numeric/Infinite Scroll Background Color', 'clean-magazine' ),
									'numeric_infinite_scroll_hover_background_color'=> __( 'Numeric/Infinite Scroll Hover Background Color', 'clean-magazine' ),
								);
	return apply_filters( 'clean_magazine_get_pagination_color_options', $pagination_color_options );
}


/**
 * Returns list of footer color options currently supported
 *
 * @since Clean Magazine 0.2
*/
function clean_magazine_get_footer_color_options() {
	$footer_color_options =	array(
									'footer_background_color' 				=> __( 'Footer Background Color', 'clean-magazine' ),
									'footer_text_color' 					=> __( 'Footer Text Color', 'clean-magazine' ),
									'footer_link_color' 					=> __( 'Footer Link Color', 'clean-magazine' ),
									'footer_sidebar_area_background_color' 	=> __( 'Footer Sidebar Area Background Color', 'clean-magazine' ),
									'footer_widget_background_color' 		=> __( 'Footer Widget Background Color', 'clean-magazine' ),
									'footer_widget_title_color'				=> __( 'Footer Widget Title Color', 'clean-magazine' ),
									'footer_widget_text_color'				=> __( 'Footer Widget Text Color', 'clean-magazine' ),
									'footer_widget_link_color'				=> __( 'Footer Widget Link Color', 'clean-magazine' ),
									'footer_widget_link_hover_color'		=> __( 'Footer Widget Link Hover Color', 'clean-magazine' ),

								);

	return apply_filters( 'clean_magazine_get_footer_color_options', $footer_color_options );
}


/**
 * Returns list of promotion headline color options currently supported
 *
 * @since Clean Magazine 0.2
*/
function clean_magazine_get_promotion_headline_color_options() {
	$promotion_headline_color_options =	array(
											'promotion_headline_background_color'				=> __( 'Promotion Headline Background Color', 'clean-magazine' ),
											'promotion_headline_title_color'					=> __( 'Promotion Headline Title Color', 'clean-magazine' ),
											'promotion_headline_text_color'						=> __( 'Promotion Headline Text Color', 'clean-magazine' ),
											'promotion_headline_link_color'						=> __( 'Promotion Headline Link Color', 'clean-magazine' ),
											'promotion_headline_link_hover_color'						=> __( 'Promotion Headline Link Hover Color', 'clean-magazine' ),
											'promotion_headline_button_background_color'		=> __( 'Promotion Headline Button Background Color', 'clean-magazine' ),
											'promotion_headline_button_text_color'				=> __( 'Promotion Headline Button Text Color', 'clean-magazine' ),
											'promotion_headline_button_hover_background_color'	=> __( 'Promotion Headline Button Hover Background Color', 'clean-magazine' ),
											'promotion_headline_button_hover_text_color'		=> __( 'Promotion Headline Button Hover Text Color', 'clean-magazine' ),
									);

	return apply_filters( 'clean_magazine_get_promotion_headline_color_options', $promotion_headline_color_options );
}


/**
 * Returns list of scrollup color options currently supported
 *
 * @since Clean Magazine 0.2
*/
function clean_magazine_get_scrollup_color_options() {
	$scrollup_color_options =	array(
									'scrollup_background_color'			=> __( 'Scrollup Background Color', 'clean-magazine' ),
									'scrollup_hover_background_color'	=> __( 'Scrollup Hover Background Color', 'clean-magazine' ),
									'scrollup_text_color'				=> __( 'Scrollup Text Color', 'clean-magazine' ),
									'scrollup_hover_text_color'			=> __( 'Scrollup Hover Text Color', 'clean-magazine' ),
							);

	return apply_filters( 'clean_magazine_get_scrollup_color_options', $scrollup_color_options );
}


/**
 * Returns list of slider color options currently supported
 *
 * @since Clean Magazine 0.2
*/
function clean_magazine_get_slider_color_options() {
	$slider_color_options =	array(
									'slider_content_background_color'	=> __( 'Slider Content Background Color', 'clean-magazine' ),
									'slider_text_color'					=> __( 'Slider Text Color', 'clean-magazine' ),
									'slider_link_color'					=> __( 'Slider Link Color', 'clean-magazine' ),
									'slider_link_hover_color'			=> __( 'Slider Link Hover Color', 'clean-magazine' ),
							);

	return apply_filters( 'clean_magazine_get_slider_color_options', $slider_color_options );
}


/**
 * Returns list of featured_content color options currently supported
 *
 * @since Clean Magazine 0.2
*/
function clean_magazine_get_featured_content_color_options() {
	$eatured_content_color_options = array(
											'featured_content_background_color'	=> __( 'Featured Content Background Color', 'clean-magazine' ),
											'featured_content_title_color'		=> __( 'Featured Content Title Color', 'clean-magazine' ),
											'featured_content_text_color'		=> __( 'Featured Content Text Color', 'clean-magazine' ),
											'featured_content_link_color'		=> __( 'Featured Content Link Color', 'clean-magazine' ),
									);

	return apply_filters( 'clean_magazine_get_featured_content_color_options', $eatured_content_color_options );
}


/**
 * Returns list of menu color options currently supported
 *
 * @since Clean Magazine 0.2
*/
function clean_magazine_get_menu_color_options() {
	$menu_color_options =	array(
									'menu_background_color'			=> __( 'Menu Background color', 'clean-magazine' ),
									'menu_color'					=> __( 'Menu Color', 'clean-magazine' ),
									'hover_active_background_color'	=> __( 'Hover Active Background Color', 'clean-magazine' ),
									'hover_active_text_color'		=> __( 'Hover Active Text Color', 'clean-magazine' ),
									'sub_menu_background_color'		=> __( 'Sub Menu Background Color', 'clean-magazine' ),
									'sub_menu_text_color'			=> __( 'Sub Menu Text Color', 'clean-magazine' ),
								);
	return apply_filters( 'clean_magazine_get_menu_color_options', $menu_color_options );
}

/**
 * Returns an array of metabox layout options registered for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_metabox_layouts() {
	$layout_options = array(
		'default' 	=> array(
			'id' 	=> 'clean-magazine-layout-option',
			'value' => 'default',
			'label' => __( 'Default', 'clean-magazine' ),
		),
		'left-sidebar' 	=> array(
			'id' 	=> 'clean-magazine-layout-option',
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'clean-magazine' ),
		),
		'right-sidebar' => array(
			'id' 	=> 'clean-magazine-layout-option',
			'value' => 'right-sidebar',
			'label' => __( 'Content, Primary Sidebar', 'clean-magazine' ),
		),
		'no-sidebar'	=> array(
			'id' 	=> 'clean-magazine-layout-option',
			'value' => 'no-sidebar',
			'label' => __( 'No Sidebar ( Content Width )', 'clean-magazine' ),
		),
	);
	return apply_filters( 'clean_magazine_layouts', $layout_options );
}

/**
 * Returns an array of metabox header featured image options registered for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_metabox_header_featured_image_options() {
	$header_featured_image_options = array(
		'default' => array(
			'id'		=> 'clean-magazine-header-image',
			'value' 	=> 'default',
			'label' 	=> __( 'Default', 'clean-magazine' ),
		),
		'enable' => array(
			'id'		=> 'clean-magazine-header-image',
			'value' 	=> 'enable',
			'label' 	=> __( 'Enable', 'clean-magazine' ),
		),
		'disable' => array(
			'id'		=> 'clean-magazine-header-image',
			'value' 	=> 'disable',
			'label' 	=> __( 'Disable', 'clean-magazine' )
		)
	);
	return apply_filters( 'header_featured_image_options', $header_featured_image_options );
}


/**
 * Returns an array of metabox featured image options registered for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_metabox_featured_image_options() {
	$featured_image_options = array(
		'default' => array(
			'id'		=> 'clean-magazine-featured-image',
			'value' 	=> 'default',
			'label' 	=> __( 'Default', 'clean-magazine' ),
		),
		'featured' => array(
			'id'		=> 'clean-magazine-featured-image',
			'value' 	=> 'featured',
			'label' 	=> __( 'Featured Image', 'clean-magazine' )
		),
		'full' => array(
			'id' => 'clean-magazine-featured-image',
			'value' => 'full',
			'label' => __( 'Full Image', 'clean-magazine' )
		),
		'slider' => array(
			'id' => 'clean-magazine-featured-image',
			'value' => 'slider',
			'label' => __( 'Slider Image', 'clean-magazine' )
		),
		'disable' => array(
			'id' => 'clean-magazine-featured-image',
			'value' => 'disable',
			'label' => __( 'Disable Image', 'clean-magazine' )
		)
	);
	return apply_filters( 'featured_image_options', $featured_image_options );
}


/**
 * Returns clean_magazine_contents registered for journal.
 *
 * @since Clean Magazine 0.1
 */
function clean_magazine_get_content() {
	$theme_data = wp_get_theme();

	$clean_magazine_content['left'] 	= sprintf( _x( 'Copyright &copy; %1$s %2$s. All Rights Reserved.', '1: Year, 2: Site Title with home URL', 'clean-magazine' ), date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

	$clean_magazine_content['right']	= esc_attr( $theme_data->get( 'Name') ) . '&nbsp;' . __( 'by', 'clean-magazine' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_attr( $theme_data->get( 'Author' ) ) .'</a>';

	return apply_filters( 'clean_magazine_get_content', $clean_magazine_content );
}