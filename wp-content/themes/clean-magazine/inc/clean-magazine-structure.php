<?php
/**
 * The template for Managing Theme Structure
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */


if ( ! function_exists( 'clean_magazine_doctype' ) ) :
	/**
	 * Doctype Declaration
	 *
	 * @since Clean Magazine 0.2
	 *
	 */
	function clean_magazine_doctype() {
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<?php
	}
endif;
add_action( 'clean_magazine_doctype', 'clean_magazine_doctype', 10 );


if ( ! function_exists( 'clean_magazine_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Clean Magazine 0.2
	 *
	 */
	function clean_magazine_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php
	}
endif;
add_action( 'clean_magazine_before_wp_head', 'clean_magazine_head', 10 );


if ( ! function_exists( 'clean_magazine_page_start' ) ) :
	/**
	 * Start div id #page
	 *
	 * @since Clean Magazine 0.2
	 *
	 */
	function clean_magazine_page_start() {
		?>
		<div id="page" class="hfeed site">
		<?php
	}
endif;
add_action( 'clean_magazine_header', 'clean_magazine_page_start', 10 );


if ( ! function_exists( 'clean_magazine_header_top' ) ) :
	/**
	 * Header Top Area
	 *
	 * @since Clean Magazine 0.2
	 *
	 */
	function clean_magazine_header_top() {
		$options      = clean_magazine_get_theme_options();
		$social_icons = clean_magazine_get_social_icons();

		if ( '' == $social_icons && !has_nav_menu( 'header-top' ) ) {
			//Helper Text
			if ( current_user_can( 'edit_theme_options' ) ) { ?>
			    <aside role="complementary" id="header-top" class="header-top-bar">
			        <div class="wrapper">
			            <div class="header-top-left full-width">
			                <section id="widget-default-text" class="widget widget_text header_top_widget_area">
			                    <div class="widget-wrap">
			                        <div class="textwidget">
			                            <p><?php _e( 'This is Header Top Area. Assign Header Top Menu and Social Icons from Theme Customizer', 'clean-magazine' ); ?></p>
			                        </div>
			                    </div><!-- .widget-wrap -->
			                </section><!-- #widget-default-text -->
			            </div><!-- .header-top-left -->
			        </div><!-- .wrapper -->
			    </aside><!-- #header-top -->
			<?php
			}
		}
		else { ?>
		    <aside role="complementary" id="header-top" class="header-top-bar">
		        <div class="wrapper">
		            <?php if ( has_nav_menu( 'header-top' ) ) { ?>
		                <div class="clearfix header-top-left">
		                    <?php if ( function_exists( 'clean_magazine_header_top_menu' ) ) {  clean_magazine_header_top_menu(); } ?>
		                </div><!-- .header-top-left -->
		            <?php
		            }
		            if ( '' != $social_icons ) { ?>
		                <div class="header-top-right">
		                    <section class="widget widget_clean_magazine_social_icons" id="header-right-social-icons">
		                        <div class="widget-wrap">
		                            <?php echo $social_icons; ?>
		                        </div><!-- .widget-wrap -->
		                    </section><!-- #header-right-social-icons -->
		                </div><!-- .header-top-right -->
		            <?php
		            } ?>
		        </div><!-- .wrapper -->
		    </aside><!-- #header-top -->
		<?php
		}
	} //clean_magazine_header_top
endif;
add_action( 'clean_magazine_header', 'clean_magazine_header_top', 20 );


if ( ! function_exists( 'clean_magazine_page_end' ) ) :
	/**
	 * End div id #page
	 *
	 * @since Clean Magazine 0.2
	 *
	 */
	function clean_magazine_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'clean_magazine_footer', 'clean_magazine_page_end', 200 );


if ( ! function_exists( 'clean_magazine_header_start' ) ) :
	/**
	 * Start Header id #masthead and class .wrapper
	 *
	 * @since Clean Magazine 0.2
	 *
	 */
	function clean_magazine_header_start() {
		?>
		<header id="masthead" role="banner">
    		<div class="wrapper">
		<?php
	}
endif;
add_action( 'clean_magazine_header', 'clean_magazine_header_start', 40 );


if ( ! function_exists( 'clean_magazine_header_right' ) ) :
/**
 * Header Right Sidebar
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_header_right() {
	get_sidebar( 'header-right' );
}
endif;
add_action( 'clean_magazine_header', 'clean_magazine_header_right', 70 );


if ( ! function_exists( 'clean_magazine_after_primary' ) ) :
	/**
	 * End Header id #masthead and class .wrapper
	 *
	 * @since Clean Magazine 0.2
	 *
	 */
	function clean_magazine_after_primary() {
		?>
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;
add_action( 'clean_magazine_header', 'clean_magazine_after_primary', 100 );


if ( ! function_exists( 'clean_magazine_content_start' ) ) :
	/**
	 * Start div id #content and class .wrapper
	 *
	 * @since Clean Magazine 0.2
	 *
	 */
	function clean_magazine_content_start() {
		?>
		<div id="content" class="site-content">
			<div class="wrapper">
	<?php
	}
endif;
add_action('clean_magazine_content', 'clean_magazine_content_start', 20 );


if ( ! function_exists( 'clean_magazine_primary_start' ) ) :
	/**
	 * Start div id #primary
	 *
	 * @since Clean Magazine 0.2
	 *
	 */
	function clean_magazine_primary_start() {
		?>
		<div id="primary" class="content-area">
		<?php
	}
endif;
add_action( 'clean_magazine_content', 'clean_magazine_primary_start', 30 );


if ( ! function_exists( 'clean_magazine_main_start' ) ) :
	/**
	 * Start main #main
	 *
	 * @since Clean Magazine 0.2
	 *
	 */
	function clean_magazine_main_start() {
		?>
		<main id="main" class="site-main" role="main">
		<?php
	}
endif;
add_action( 'clean_magazine_content', 'clean_magazine_main_start', 40 );


if ( ! function_exists( 'clean_magazine_main_end' ) ) :
	/**
	 * End main #main
	 *
	 * @since Clean Magazine 0.2
	 *
	 */
	function clean_magazine_main_end() {
		?>
		</main><!-- #main -->
		<?php
	}
endif;
add_action( 'clean_magazine_before_secondary', 'clean_magazine_main_end', 20 );


if ( ! function_exists( 'clean_magazine_primary_end' ) ) :
	/**
	 * End div id #primary
	 *
	 * @since Clean Magazine 0.2
	 *
	 */
	function clean_magazine_primary_end() {
		?>
		</div><!-- #primary -->
		<?php
	}
endif;
add_action( 'clean_magazine_before_secondary', 'clean_magazine_primary_end', 30 );


if ( ! function_exists( 'clean_magazine_content_end' ) ) :
	/**
	 * End div id #content and class .wrapper
	 *
	 * @since Clean Magazine 0.2
	 */
	function clean_magazine_content_end() {
		?>
			</div><!-- .wrapper -->
	    </div><!-- #content -->
		<?php
	}

endif;
add_action( 'clean_magazine_after_content', 'clean_magazine_content_end', 10 );


if ( ! function_exists( 'clean_magazine_footer_content_start' ) ) :
/**
 * Start footer id #colophon
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_footer_content_start() {
	?>
	<footer id="colophon" class="site-footer" role="contentinfo">
    <?php
}
endif;
add_action('clean_magazine_footer', 'clean_magazine_footer_content_start', 30 );


if ( ! function_exists( 'clean_magazine_footer_sidebar' ) ) :
/**
 * Footer Sidebar
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_footer_sidebar() {
	get_sidebar( 'footer' );
}
endif;
add_action( 'clean_magazine_footer', 'clean_magazine_footer_sidebar', 40 );


if ( ! function_exists( 'clean_magazine_footer_content_end' ) ) :
/**
 * End footer id #colophon
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_footer_content_end() {
	?>
	</footer><!-- #colophon -->
	<?php
}
endif;
add_action( 'clean_magazine_footer', 'clean_magazine_footer_content_end', 110 );