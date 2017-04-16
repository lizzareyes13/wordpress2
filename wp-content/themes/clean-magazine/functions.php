<?php
/**
 * Functions and definitions
 *
 * Sets up the theme using core clean-magazine-core and provides some helper functions using clean-magazine-custon-functions.
 * Others are attached to action and
 * filter hooks in WordPress to change core functionality
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */

//define theme version
if ( !defined( 'CLEAN_MAGAZINE_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();

	define ( 'CLEAN_MAGAZINE_THEME_VERSION', $theme_data->get( 'Version' ) );
}

/**
 * Implement the core functions
 */
require trailingslashit( get_template_directory() ) . 'inc/clean-magazine-core.php';