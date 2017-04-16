<?php
/**
 * The Template for displaying all single posts
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */

get_header();

?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

		<?php
			/**
			 * clean_magazine_after_post hook
			 *
			 * @hooked clean_magazine_post_navigation - 10
			 */
			do_action( 'clean_magazine_after_post' );

			/**
			 * clean_magazine_comment_section hook
			 *
			 * @hooked clean_magazine_get_comment_section - 10
			 */
			do_action( 'clean_magazine_comment_section' );
		?>
	<?php endwhile; // end of the loop. ?>

<?php

get_sidebar();
get_footer(); ?>