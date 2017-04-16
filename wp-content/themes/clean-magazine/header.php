<?php
/**
 * The default template for displaying header
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */

	/**
	 * clean_magazine_doctype hook
	 *
	 * @hooked clean_magazine_doctype -  10
	 *
	 */
	do_action( 'clean_magazine_doctype' );?>

<head>
<?php
	/**
	 * clean_magazine_before_wp_head hook
	 *
	 * @hooked clean_magazine_head -  10
	 *
	 */
	do_action( 'clean_magazine_before_wp_head' );

	wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
     * clean_magazine_before_header hook
     *
     */
    do_action( 'clean_magazine_before' );

	/**
	 * clean_magazine_header hook
	 *
	 * @hooked clean_magazine_page_start -  10
	 * @hooked clean_magazine_header_top -  20
	 * @hooked clean_magazine_promotion_headline - 25
	 * @hooked clean_magazine_featured_overall_image (before-header) - 30
	 * @hooked clean_magazine_header_start- 40
	 * @hooked clean_magazine_mobile_header_nav_anchor - 50
	 * @hooked clean_magazine_site_branding - 60
	 * @hooked clean_magazine_header_right - 70
	 * @hooked clean_magazine_header_end - 100
	 *
	 */
	do_action( 'clean_magazine_header' );

	/**
     * clean_magazine_after_header hook
     *
     * @hooked clean_magazine_featured_overall_image (before-menu) - 10
     * @hooked clean_magazine_primary_menu - 20
     * @hooked clean_magazine_news_ticker (below-menu) - 30
     * @hooked clean_magazine_secondary_menu - 40
     * @hooked clean_magazine_add_breadcrumb - 50
     */
	do_action( 'clean_magazine_after_header' );

	/**
	 * clean_magazine_before_content hook
	 *
	 * @hooked clean_magazine_header_highlight_content_display - 10
	 * @hooked clean_magazine_featured_slider - 20
	 * @hooked clean_magazine_featured_overall_image (after-slider)  - 30
	 * @hooked clean_magazine_featured_content_display (move featured content above homepage posts - default option) - 40
	 */
	do_action( 'clean_magazine_before_content' );

	/**
     * clean_magazine_main hook
     * @hooked clean_magazine_news_ticker (above-content) - 10
     * @hooked clean_magazine_content_start - 20
     * @hooked clean_magazine_primary_start - 30
     * @hooked clean_magazine_main_start - 40
     */
	do_action( 'clean_magazine_content' );