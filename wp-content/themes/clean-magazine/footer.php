<?php
/**
 * The template for displaying the footer
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */


/**
 * clean_magazine_after_content hook
 *
 * @hooked clean_magazine_content_end - 10
 * @hooked clean_magazine_featured_content_display (move featured content below homepage posts) - 30
 *
 */
do_action( 'clean_magazine_after_content' );


/**
 * clean_magazine_footer hook
 *
 * @hooked clean_magazine_footer_content_start - 30
 * @hooked clean_magazine_footer_sidebar - 40
 * @hooked clean_magazine_get_footer_content - 100
 * @hooked clean_magazine_footer_content_end - 110
 * @hooked clean_magazine_page_end - 200
 *
 */
do_action( 'clean_magazine_footer' );


/**
 * clean_magazine_after hook
 *
 * @hooked clean_magazine_scrollup - 10
 * @hooked clean_magazine_mobile_menus- 20
 *
 */
do_action( 'clean_magazine_after' );

wp_footer();

?>

</body>
</html>