<?php
/**
 * Active callbacks for Theme/Customzer Options
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */


if( ! function_exists( 'clean_magazine_is_header_highlight_content_active' ) ) :
	/**
	* Return true if header highlight content is active
	*
	* @since  Clean Magazine 0.2
	*/
	function clean_magazine_is_header_highlight_content_active( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable = $control->manager->get_setting( 'clean_magazine_theme_options[header_highlight_content_option]' )->value();

		//return true only if previwed page on customizer matches the type of content option selected
		return ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) );
	}
endif;


if( ! function_exists( 'clean_magazine_is_demo_header_highlight_content_inactive' ) ) :
	/**
	* Return true if demo header highlight content is inactive
	*
	* @since  Clean Magazine 0.2
	*/
	function clean_magazine_is_demo_header_highlight_content_inactive( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable 	= $control->manager->get_setting( 'clean_magazine_theme_options[header_highlight_content_option]' )->value();

		$type 	= $control->manager->get_setting( 'clean_magazine_theme_options[header_highlight_content_type]' )->value();

		//return true only if previwed page on customizer matches the type of content option selected and is not demo content
		return ( ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) ) && !( 'demo-header-highlight-content' == $type ) );
	}
endif;


if( ! function_exists( 'clean_magazine_is_header_highlight_page_content_active' ) ) :
	/**
	* Return true if page content is active
	*
	* @since  Clean Magazine 0.2
	*/
	function clean_magazine_is_header_highlight_page_content_active( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable = $control->manager->get_setting( 'clean_magazine_theme_options[header_highlight_content_option]' )->value();

		$type 	= $control->manager->get_setting( 'clean_magazine_theme_options[header_highlight_content_type]' )->value();

		//return true only if previwed page on customizer matches the type of content option selected and page content
		return ( ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) ) && ( 'header-highlight-page-content' == $type ) );
	}
endif;


if( ! function_exists( 'clean_magazine_is_slider_active' ) ) :
	/**
	* Return true if slider is active
	*
	* @since  Clean Magazine 0.2
	*/
	function clean_magazine_is_slider_active( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable = $control->manager->get_setting( 'clean_magazine_theme_options[featured_slider_option]' )->value();

		//return true only if previwed page on customizer matches the type of slider option selected
		return ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) );
	}
endif;


if( ! function_exists( 'clean_magazine_is_demo_slider_inactive' ) ) :
	/**
	* Return true if demo slider is inactive
	*
	* @since  Clean Magazine 0.2
	*/
	function clean_magazine_is_demo_slider_inactive( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable	= $control->manager->get_setting( 'clean_magazine_theme_options[featured_slider_option]' )->value();

		$type 	= $control->manager->get_setting( 'clean_magazine_theme_options[featured_slider_type]' )->value();

		//return true only if previwed page on customizer matches the type of slider option selected and is not demo slider
		return ( ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) ) && !( 'demo-featured-slider' == $type ) );
	}
endif;


if( ! function_exists( 'clean_magazine_is_page_slider_active' ) ) :
	/**
	* Return true if page slider is active
	*
	* @since  Clean Magazine 0.2
	*/
	function clean_magazine_is_page_slider_active( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable = $control->manager->get_setting( 'clean_magazine_theme_options[featured_slider_option]' )->value();

		$type 	= $control->manager->get_setting( 'clean_magazine_theme_options[featured_slider_type]' )->value();

		//return true only if previwed page on customizer matches the type of slider option selected and page slider
		return ( ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) ) && ( 'featured-page-slider' == $type ) );
	}
endif;


if( ! function_exists( 'clean_magazine_is_featured_content_active' ) ) :
	/**
	* Return true if featured content is active
	*
	* @since  Clean Magazine 0.2
	*/
	function clean_magazine_is_featured_content_active( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable = $control->manager->get_setting( 'clean_magazine_theme_options[featured_content_option]' )->value();

		//return true only if previwed page on customizer matches the type of content option selected
		return ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) );
	}
endif;


if( ! function_exists( 'clean_magazine_is_demo_featured_content_inactive' ) ) :
	/**
	* Return true if demo featured content is inactive
	*
	* @since  Clean Magazine 0.2
	*/
	function clean_magazine_is_demo_featured_content_inactive( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable 	= $control->manager->get_setting( 'clean_magazine_theme_options[featured_content_option]' )->value();

		$type 	= $control->manager->get_setting( 'clean_magazine_theme_options[featured_content_type]' )->value();

		//return true only if previwed page on customizer matches the type of content option selected and is not demo content
		return ( ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) ) && !( 'demo-featured-content' == $type ) );
	}
endif;


if( ! function_exists( 'clean_magazine_is_featured_page_content_active' ) ) :
	/**
	* Return true if page content is active
	*
	* @since  Clean Magazine 0.2
	*/
	function clean_magazine_is_featured_page_content_active( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable = $control->manager->get_setting( 'clean_magazine_theme_options[featured_content_option]' )->value();

		$type 	= $control->manager->get_setting( 'clean_magazine_theme_options[featured_content_type]' )->value();

		//return true only if previwed page on customizer matches the type of content option selected and page content
		return ( ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) ) && ( 'featured-page-content' == $type ) );
	}
endif;


if( ! function_exists( 'clean_magazine_is_news_ticker_active' ) ) :
	/**
	* Return true if news ticker is active
	*
	* @since  Clean Magazine 0.2
	*/
	function clean_magazine_is_news_ticker_active( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable = $control->manager->get_setting( 'clean_magazine_theme_options[news_ticker_option]' )->value();

		//return true only if previwed page on customizer matches the type of content option selected
		return ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) );
	}
endif;


if( ! function_exists( 'clean_magazine_is_demo_news_ticker_inactive' ) ) :
	/**
	* Return true if demo news ticker is inactive
	*
	* @since  Clean Magazine 0.2
	*/
	function clean_magazine_is_demo_news_ticker_inactive( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable 	= $control->manager->get_setting( 'clean_magazine_theme_options[news_ticker_option]' )->value();

		$type 	= $control->manager->get_setting( 'clean_magazine_theme_options[news_ticker_type]' )->value();

		//return true only if previwed page on customizer matches the type of content option selected and is not demo content
		return ( ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) ) && !( 'demo-news-ticker' == $type ) );
	}
endif;


if( ! function_exists( 'clean_magazine_is_page_news_ticker_active' ) ) :
	/**
	* Return true if page news ticker is active
	*
	* @since  Clean Magazine 0.2
	*/
	function clean_magazine_is_page_news_ticker_active( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable = $control->manager->get_setting( 'clean_magazine_theme_options[news_ticker_option]' )->value();

		$type 	= $control->manager->get_setting( 'clean_magazine_theme_options[news_ticker_type]' )->value();

		//return true only if previwed page on customizer matches the type of content option selected and page content
		return ( ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) ) && ( 'page-news-ticker' == $type ) );
	}
endif;