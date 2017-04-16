<?php
/**
 * The template for adding Custom Sidebars and Widgets
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */

/**
 * Register widgetized area
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_widgets_init() {
	//Primary Sidebar
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'clean-magazine' ),
		'id'            => 'primary-sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'  => '</div><!-- .widget-wrap --></section><!-- #widget-default-search -->',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		'description'	=> __( 'This is the primary sidebar if you are using a two column site layout option.', 'clean-magazine' ),
	) );

	//Header Right
	register_sidebar( array(
		'name'          => __( 'Header Right', 'clean-magazine' ),
		'id'            => 'header-right',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'  => '</div><!-- .widget-wrap --></section><!-- #widget-default-search -->',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		'description'	=> __( 'This is the header right widget area. It typically appears on the right of the site title or logo. This widget area is not equipped to display any widget, and works best with a search form, social icons widget, Advertisement Widget or possibly a text widget.', 'clean-magazine' ),
	) );

	$footer_sidebar_number = 3; //Number of footer sidebars

	for( $i=1; $i <= $footer_sidebar_number; $i++ ) {
		register_sidebar( array(
			'name'          => sprintf( __( 'Footer Area %d', 'clean-magazine' ), $i ),
			'id'            => sprintf( 'footer-%d', $i ),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
			'after_widget'  => '</div><!-- .widget-wrap --></section><!-- #widget-default-search -->',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			'description'	=> sprintf( __( 'Footer %d widget area.', 'clean-magazine' ), $i ),
		) );
	}
}
add_action( 'widgets_init', 'clean_magazine_widgets_init' );

/**
 * Loads up Necessary JS Scripts for widgets
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_widgets_scripts( $hook) {
	if ( 'widgets.php' == $hook ) {
		wp_enqueue_style( 'clean-magazine-widgets-styles', get_template_directory_uri() . '/css/widgets.css' );
	}
}
add_action( 'admin_enqueue_scripts', 'clean_magazine_widgets_scripts' );

// Load Advertisement Image Widget
include get_template_directory() . '/inc/widgets/advertisement-image.php';

// Load Featured Posts
include get_template_directory() . '/inc/widgets/featured-posts.php';

// Load Instagram Widget
include get_template_directory() . '/inc/widgets/instagram.php';

// Load Social Icon Widget
include get_template_directory() . '/inc/widgets/social-icons.php';