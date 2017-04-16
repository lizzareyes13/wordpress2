<?php
/**
 * The template for displaying the News Ticker
 *
 * @package Catch Themes
 * @subpackage Clean Magazine Pro
 * @since Clean Magazine 0.2
 */


if( !function_exists( 'clean_magazine_news_ticker_display' ) ) :
/**
* Add News Ticker
*
* @uses action hook clean_magazine_before_content.
*
* @since Clean Magazine 0.2
*/
function clean_magazine_news_ticker_display() {
	clean_magazine_flush_transients();
	global $post, $wp_query;

	// get data value from options
	$options 		= clean_magazine_get_theme_options();
	$enablecontent 	= $options['news_ticker_option'];
	$contentselect 	= $options['news_ticker_type'];

	// Front page displays in Reading Settings
	$page_on_front 	= get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');


	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();
	if ( 'entire-site' == $enablecontent  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enablecontent  ) ) {
		if ( ( !$clean_magazine_news_ticker = get_transient( 'clean_magazine_news_ticker' ) ) ) {

			$headline = $options ['news_ticker_label'];

			echo '<!-- refreshing cache -->';


			if ( 'demo-news-ticker' == $contentselect  ) {
				$headline 		= __( 'The Latest News', 'clean-magazine' );
			}

			$clean_magazine_news_ticker ='
				<div id="news-ticker" class="' . esc_attr( $contentselect ) . '">
					<div class="wrapper">';
						if ( !empty( $headline ) ) {
							$clean_magazine_news_ticker .='<h2 class="news-ticker-label">'. $headline .'</h2>';
						}
						$clean_magazine_news_ticker .='

						<div class="new-ticket-content">
							<div class=" news-ticker-slider cycle-slideshow"
							    data-cycle-log="false"
							    data-cycle-pause-on-hover="true"
							    data-cycle-swipe="true"
							    data-cycle-auto-height=container
								data-cycle-slides="> h2"
								data-cycle-fx="'. esc_attr( $options['news_ticker_transition_effect'] ) .'"
								>';

								// Select content
								if ( 'demo-news-ticker' == $contentselect  && function_exists( 'clean_magazine_demo_ticker' ) ) {
									$clean_magazine_news_ticker .= clean_magazine_demo_ticker( $options );
								}
								elseif ( 'page-news-ticker' == $contentselect  && function_exists( 'clean_magazine_page_ticker' ) ) {
									$clean_magazine_news_ticker .= clean_magazine_page_ticker( $options );
								}

			$clean_magazine_news_ticker .='
							</div><!-- .news-ticker-slider -->
						</div><!-- .new-ticket-content -->
					</div><!-- .wrapper -->
				</div><!-- #news-ticker -->';
			set_transient( 'clean_magazine_news_ticker', $clean_magazine_news_ticker, 86940 );

		}

		echo $clean_magazine_news_ticker;
	}
}
endif;


if ( ! function_exists( 'clean_magazine_news_ticker_display_position' ) ) :
/**
 * Homepage Featured Content Position
 *
 * @action clean_magazine_content, clean_magazine_after_secondary
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_news_ticker_display_position() {
	// Getting data from Theme Options
	$options 		= clean_magazine_get_theme_options();

	$news_ticker_position = $options [ 'news_ticker_position' ];

	if ( 'below-menu' == $news_ticker_position ) {
		add_action( 'clean_magazine_after_header', 'clean_magazine_news_ticker_display', 40 );
	} else {
		add_action( 'clean_magazine_content', 'clean_magazine_news_ticker_display', 10 );
	}

}
endif; // clean_magazine_news_ticker_display_position
add_action( 'clean_magazine_before', 'clean_magazine_news_ticker_display_position' );


if ( ! function_exists( 'clean_magazine_demo_ticker' ) ) :
/**
 * This function to display featured posts content
 *
 * @get the data value from customizer options
 *
 * @since Clean Magazine 0.2
 *
 */
function clean_magazine_demo_ticker( $options ) {
	return '<h2 class="news-ticker-title displayblock">
				<a href="#">
					Clinton and Obama Pushed the Trade Deal That Made the Panama Papers Scandal Possible
				</a>
			</h2>
			<h2 class="news-ticker-title">
				<a href="#">
					10-Year-old Boy Gets $10,000 Reward for Uncovering Instagram Security Flaw
				</a>
			</h2>
			<h2 class="news-ticker-title">
				<a href="#">
					Baby Rescued From Rubble Nearly Four Days After Kenya Building Collapse
				</a>
			</h2>
			<h2 class="news-ticker-title">
				<a href="#">
					Six of the Greatest Legends in Rock History to Gather for 3-Day Concert in October
				</a>
			</h2>';
}
endif; // clean_magazine_demo_content


if ( ! function_exists( 'clean_magazine_page_ticker' ) ) :
/**
 * This function to display featured page content
 *
 * @param $options: clean_magazine_theme_options from customizer
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_page_ticker( $options ) {
	global $post;

	$quantity 		= $options [ 'news_ticker_number' ];

	$more_link_text	= $options['excerpt_more_text'];

	$show_content	= $options['news_ticker_show'];

	$number_of_page = 0; 		// for number of pages

	$page_list		= array();	// list of valid pages ids

	$clean_magazine_page_ticker 	= '';

	//Get valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if( isset ( $options['news_ticker_page_' . $i] ) && $options['news_ticker_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	wp_parse_args( $page_list, array( $options['news_ticker_page_' . $i] ) );
		}

	}
	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$get_featured_posts = new WP_Query( array(
                    'posts_per_page' 		=> $number_of_page,
                    'post__in'       		=> $page_list,
                    'orderby'        		=> 'post__in',
                    'post_type'				=> 'page',
                ));

		$i=0;
		while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post();
			if ( $i == 1 ) { $classes = 'page post-'.$post->ID.' news-ticker-title displayblock'; } else { $classes = 'page post-'.$post->ID.' news-ticker-title displaynone'; }
			$clean_magazine_page_ticker .= '
			<h2 class="'.$classes.'">
				<a href="'. esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>
			</h2>';
		endwhile;

		wp_reset_query();
	}

	return $clean_magazine_page_ticker;
}
endif; // clean_magazine_page_ticker