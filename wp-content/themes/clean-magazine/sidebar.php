<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */
?>

<?php
/**
 * clean_magazine_before_secondary hook
 *
 * @hooked clean_magazine_main_end - 20
 * @hooked clean_magazine_primary_end - 30
 *
 */
do_action( 'clean_magazine_before_secondary' );

$clean_magazine_layout = clean_magazine_get_theme_layout();

if( 'no-sidebar' == $clean_magazine_layout ) {
	return;
}


do_action( 'clean_magazine_before_primary_sidebar' );
?>
	<aside class="sidebar sidebar-primary widget-area" role="complementary">
		<?php
		if ( is_active_sidebar( 'primary-sidebar' ) ) {
        	dynamic_sidebar( 'primary-sidebar' );
   		}
		else {
			//Helper Text
			if ( current_user_can( 'edit_theme_options' ) ) { ?>
				<section id="widget-default-text" class="widget widget_text">
					<div class="widget-wrap">
	                	<h4 class="widget-title"><?php _e( 'Primary Sidebar Widget Area', 'clean-magazine' ); ?></h4>

	           			<div class="textwidget">
	                   		<p><?php _e( 'This is the Primary Sidebar Widget Area if you are using a two or three column site layout option.', 'clean-magazine' ); ?></p>
	                   		<p><?php printf( __( 'By default it will load Search and Archives widgets as shown below. You can add widget to this area by visiting your <a href="%s">Widgets Panel</a> which will replace default widgets.', 'clean-magazine' ), admin_url( 'widgets.php' ) ); ?></p>
	                 	</div>
	           		</div><!-- .widget-wrap -->
	       		</section><!-- #widget-default-text -->
			<?php
			} ?>
			<section class="widget widget_widget_clean_magazine_adspace_widget" id="header-right-ads">
				<div class="widget-wrap">
					<a class="ads-image" href="#">
						<img src="<?php echo get_template_directory_uri(); ?>/images/gallery/ads-300x250.jpg">
					</a>
				</div><!-- .widget-wrap -->
			</section><!-- .widget-wrap -->
			<section class="widget widget_search" id="default-search">
				<div class="widget-wrap">
					<h4 class="widget-title"><?php _e( 'Search', 'clean-magazine' ); ?></h4>
					<?php get_search_form(); ?>
				</div><!-- .widget-wrap -->
			</section><!-- #default-search -->
			<section class="widget widget_archive" id="default-archives">
				<div class="widget-wrap">
					<h4 class="widget-title"><?php _e( 'Archives', 'clean-magazine' ); ?></h4>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</div><!-- .widget-wrap -->
			</section><!-- #default-archives -->
			<?php
		} ?>
	</aside><!-- .sidebar sidebar-primary widget-area -->
<?php
/**
 * clean_magazine_after_primary_sidebar hook
 */
do_action( 'clean_magazine_after_primary_sidebar' );


/**
 * clean_magazine_after_secondary hook
 *
 */
do_action( 'clean_magazine_after_secondary' );