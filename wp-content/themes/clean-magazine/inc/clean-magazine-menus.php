<?php
/**
 * The template for displaying custom menus
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */


if ( ! function_exists( 'clean_magazine_primary_menu' ) ) :
/**
 * Shows the Primary Menu
 *
 * default load in sidebar-header-right.php
 */
function clean_magazine_primary_menu() {
    ?>
	<nav class="nav-primary search-enabled" role="navigation">
        <div class="wrapper">
            <h1 class="assistive-text"><?php _e( 'Primary Menu', 'clean-magazine' ); ?></h1>
            <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'clean-magazine' ); ?>"><?php _e( 'Skip to content', 'clean-magazine' ); ?></a></div>
            <?php
                if ( has_nav_menu( 'primary' ) ) {
                    $clean_magazine_primary_menu_args = array(
                        'theme_location'    => 'primary',
                        'menu_class'        => 'menu clean-magazine-nav-menu',
                        'container'         => false
                    );
                    wp_nav_menu( $clean_magazine_primary_menu_args );
                }
                else {
                    wp_page_menu( array( 'menu_class'  => 'menu clean-magazine-nav-menu' ) );
                }
                ?>
                <div id="search-toggle" class="genericon">
                    <a class="screen-reader-text" href="#search-container"><?php _e( 'Search', 'clean-magazine' ); ?></a>
                </div>

                <div id="search-container" class="displaynone">
                    <?php get_search_form(); ?>
                </div>
    	</div><!-- .wrapper -->
    </nav><!-- .nav-primary -->
    <?php
}
endif; //clean_magazine_primary_menu
add_action( 'clean_magazine_after_header', 'clean_magazine_primary_menu', 20 );


if ( ! function_exists( 'clean_magazine_add_page_menu_class' ) ) :
/**
 * Filters wp_page_menu to add menu class  for default page menu
 *
 */
function clean_magazine_add_page_menu_class( $ulclass ) {
  return preg_replace( '/<ul>/', '<ul class="menu page-menu-wrap">', $ulclass, 1 );
}
endif; //clean_magazine_add_page_menu_class
add_filter( 'wp_page_menu', 'clean_magazine_add_page_menu_class' );


if ( ! function_exists( 'clean_magazine_mobile_menus' ) ) :
/**
 * This function loads Mobile Menus
 *
 * @get the data value from theme options
 * @uses clean_magazine_after action to add the code in the footer
 */
function clean_magazine_mobile_menus() {
    //Getting Ready to load options data
    $options                    = clean_magazine_get_theme_options();

    // Header Left Mobile Menu(Always Primary in free version)
    echo '<nav id="mobile-header-left-nav" class="mobile-menu" role="navigation">';
        if ( has_nav_menu( 'primary' ) ) :
            $args = array(
                'theme_location'    => 'primary',
                'container'         => false,
                'items_wrap'        => '<ul id="header-left-nav" class="menu">%3$s</ul>'
            );
            wp_nav_menu( $args );
        else :
            wp_page_menu( array( 'menu_class'  => 'menu' ) );
        endif;
    echo '</nav><!-- #mobile-header-left-nav -->';

    if ( has_nav_menu( 'header-right' ) ) :
        echo '<nav id="mobile-header-right-nav" class="mobile-menu" role="navigation">';
            $args = array(
                'theme_location'    => 'header-right',
                'container'         => false,
                'items_wrap'        => '<ul id="header-right-nav" class="menu">%3$s</ul>'
            );
            wp_nav_menu( $args );
        echo '</nav><!-- #mobile-header-right-nav -->';
    endif;

    // Check Header Top Menu
    if ( has_nav_menu( 'header-top' ) ) :
        echo '<nav id="mobile-header-top-nav" class="mobile-menu" role="navigation">';
            $args = array(
                'theme_location'    => 'header-top',
                'container'         => false,
                'items_wrap'        => '<ul id="header-top-nav" class="menu">%3$s</ul>'
            );
            wp_nav_menu( $args );
        echo '</nav><!-- #mobile-header-top-nav" -->';
    endif;

}
endif; //clean_magazine_mobile_menus

add_action( 'clean_magazine_after', 'clean_magazine_mobile_menus', 20 );


if ( ! function_exists( 'clean_magazine_mobile_header_nav_anchor' ) ) :
/**
 * This function loads Mobile Menus Left Anchor
 *
 * @get the data value from theme options
 * @uses clean_magazine_header action to add in the Header
 */
function clean_magazine_mobile_header_nav_anchor() {
    //Getting Ready to load options data
    $options = clean_magazine_get_theme_options();

    // Header Left Mobile Menu Anchor
    if ( has_nav_menu( 'primary' ) ) {
        $classes = "mobile-menu-anchor primary-menu";
    }
    else {
        $classes = "mobile-menu-anchor page-menu";
    }
    ?>

    <div id="mobile-header-left-menu" class="<?php echo $classes; ?>">
        <a href="#mobile-header-left-nav" id="header-left-menu" class="genericon genericon-menu">
            <span class="mobile-menu-text"><?php _e( 'Menu', 'clean-magazine' );?></span>
        </a>
    </div><!-- #mobile-header-menu -->

    <?php
    // Header Right Mobile Menu Anchor
    if ( !has_nav_menu( 'header-right' ) ) {
        //Bail if there is no header-right menu
        return;
    }
    ?>
    <div id="mobile-header-right-menu" class="mobile-menu-anchor secondary-menu">
        <a href="#mobile-header-right-nav" id="header-right-menu" class="genericon genericon-menu">
            <span class="mobile-menu-text"><?php _e( 'Header Right Menu', 'clean-magazine' );?></span>
        </a>
    </div><!-- #mobile-header-menu -->

    <?php
}
endif; //clean_magazine_mobile_menus
add_action( 'clean_magazine_header', 'clean_magazine_mobile_header_nav_anchor', 50 );


if ( ! function_exists( 'clean_magazine_header_top_menu' ) ) :
/**
 * Shows the Secondary Menu
 *
 * default load in sidebar-header-right.php
 */
function clean_magazine_header_top_menu() {
    if ( has_nav_menu( 'header-top' ) ) {
    ?>
    <section id="header-top-menu" class="widget widget_nav_menu">
        <div class="widget-wrap">
            <div class="mobile-menu-anchor header-top-menu" id="mobile-header-top-menu">
                <a class="genericon genericon-menu" id="header-top-menu" href="#mobile-header-top-nav">
                    <span class="mobile-menu-text">Menu</span>
                </a>
            </div>
            <nav class="nav-header-top" role="navigation">
                <div class="wrapper">
                    <h1 class="assistive-text"><?php _e( 'Header Top Menu', 'clean-magazine' ); ?></h1>
                    <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'clean-magazine' ); ?>"><?php _e( 'Skip to content', 'clean-magazine' ); ?></a></div>
                    <?php
                        $clean_magazine_header_top_menu_args = array(
                            'theme_location'    => 'header-top',
                            'menu_class'        => 'menu clean-magazine-nav-menu'
                        );
                        wp_nav_menu( $clean_magazine_header_top_menu_args );
                    ?>
                </div><!-- .wrapper -->
            </nav><!-- .nav-header-top -->
        </div><!-- .widget-wrap -->
    </section>
<?php
    }
}
endif; //clean_magazine_header_top_menu