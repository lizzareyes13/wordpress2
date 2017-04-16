<?php
/**
 * The Header Right Sidebar containing the header right widget area
 *
 * @package Catch Themes
 * @subpackage Clean Magazine Pro
 * @since Clean Magazine 1.0
 */
?>

<?php
/**
 * clean_magazine_before_header_right hook
 */
do_action( 'clean_magazine_before_header_right' );

if ( has_nav_menu( 'header-right' ) || is_active_sidebar( 'header-right' ) ) {
 ?>
<aside class="sidebar sidebar-header-right widget-area">
	<?php
	if ( has_nav_menu( 'header-right' ) ) {
	?>
		<section class="widget widget_nav_menu" id="header-right-menu-widget">
			<div class="widget-wrap">
		    	<nav class="nav-header-right" role="navigation">
		            <div class="wrapper">
		                <h1 class="assistive-text"><?php _e( 'Header Right Menu', 'clean-magazine' ); ?></h1>
		                <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'clean-magazine' ); ?>"><?php _e( 'Skip to content', 'clean-magazine' ); ?></a></div>
		                <?php
		                    $clean_magazine_header_right_menu_args = array(
		                        'theme_location'    => 'header-right',
		                        'menu_class' => 'menu clean-magazine-nav-menu'
		                    );
		                    wp_nav_menu( $clean_magazine_header_right_menu_args );
		                ?>
		        	</div><!-- .wrapper -->
		        </nav><!-- .nav-header-right -->
		   	</div>
		</section>
	<?php
	}

	//Header Right Widgets Sidebar
	if ( is_active_sidebar( 'header-right' ) ) {
	   	dynamic_sidebar( 'header-right' );
	}
	?>
</aside><!-- .sidebar .header-sidebar .widget-area -->

<?php
}// endif if ( has_nav_menu( 'header-right' ) || is_active_sidebar( 'header-right' ) )
/**
 * clean_magazine_after_header_right hook
 */
do_action( 'clean_magazine_after_header_right' );