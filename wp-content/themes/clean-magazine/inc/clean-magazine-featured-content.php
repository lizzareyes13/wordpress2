<?php
/**
 * The template for displaying the Featured Content
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */


if( !function_exists( 'clean_magazine_featured_content_display' ) ) :
/**
* Add Featured content.
*
* @uses action hook clean_magazine_before_content.
*
* @since Clean Magazine 0.2
*/
function clean_magazine_featured_content_display() {
	//clean_magazine_flush_transients();
	global $post, $wp_query;

	// get data value from options
	$options 		= clean_magazine_get_theme_options();
	$enablecontent 	= $options['featured_content_option'];
	$contentselect 	= $options['featured_content_type'];

	// Front page displays in Reading Settings
	$page_on_front 	= get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');


	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();
	if ( 'entire-site' == $enablecontent  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enablecontent  ) ) {
		if ( ( !$clean_magazine_featured_content = get_transient( 'clean_magazine_featured_content' ) ) ) {
			$layouts 	 = $options ['featured_content_layout'];
			$headline 	 = $options ['featured_content_headline'];
			$subheadline = $options ['featured_content_subheadline'];

			echo '<!-- refreshing cache -->';

			if ( !empty( $layouts ) ) {
				$classes = $layouts ;
			}

			if ( 'demo-featured-content' == $contentselect  ) {
				$classes 	.= ' demo-featured-content' ;
				$headline 		= __( 'Featured Content', 'clean-magazine' );
				$subheadline 	= __( 'Here you can showcase the x number of Featured Content. You can edit this Headline, Subheadline and Feaured Content from "Appearance -> Customize -> Featured Content Options".', 'clean-magazine' );
			}
			else if ( 'featured-post-content' == $contentselect  ) {
				$classes 	.= ' featured-post-content' ;
			}
			elseif ( 'featured-page-content' == $contentselect  ) {
				$classes .= ' featured-page-content' ;
			}
			elseif ( 'featured-category-content' == $contentselect  ) {
				$classes .= ' featured-category-content' ;
			}
			elseif ( 'featured-image-content' == $contentselect  ) {
				$classes .= ' featured-image-content' ;
			}

			$featured_content_position = $options [ 'featured_content_position' ];

			if ( '1' == $featured_content_position ) {
				$classes .= ' border-top' ;
			}

			$clean_magazine_featured_content ='
				<aside id="featured-content" class="' . $classes . '" role="complementary">
					<div class="wrapper">';
						if ( !empty( $headline ) || !empty( $subheadline ) ) {
							$clean_magazine_featured_content .='<div class="featured-heading-wrap">';
								if ( !empty( $headline ) ) {
									$clean_magazine_featured_content .='<h2 id="featured-heading" class="entry-title">'. $headline .'</h2>';
								}
								if ( !empty( $subheadline ) ) {
									$clean_magazine_featured_content .='<p>'. $subheadline .'</p>';
								}
							$clean_magazine_featured_content .='</div><!-- .featured-heading-wrap -->';
						}

						$clean_magazine_featured_content .='
						<div class="featured-content-wrap">
							<section class="widget widget_' . $classes . '">';
							// Select content
							if ( 'demo-featured-content' == $contentselect  && function_exists( 'clean_magazine_demo_content' ) ) {
								$clean_magazine_featured_content .= clean_magazine_demo_content( $options );
							}
							elseif ( 'featured-page-content' == $contentselect  && function_exists( 'clean_magazine_page_content' ) ) {
								$clean_magazine_featured_content .= clean_magazine_page_content( $options );
							}

			$clean_magazine_featured_content .='
							</section>
						</div><!-- .featured-content-wrap -->
					</div><!-- .wrapper -->
				</aside><!-- #featured-content -->';
			set_transient( 'clean_magazine_featured_content', $clean_magazine_featured_content, 86940 );

		}

		echo $clean_magazine_featured_content;
	}
}
endif;


if ( ! function_exists( 'clean_magazine_featured_content_display_position' ) ) :
/**
 * Homepage Featured Content Position
 *
 * @action clean_magazine_content, clean_magazine_after_secondary
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_featured_content_display_position() {
	// Getting data from Theme Options
	$options 		= clean_magazine_get_theme_options();

	$featured_content_position = $options [ 'featured_content_position' ];

	if ( '1' != $featured_content_position ) {
		add_action( 'clean_magazine_before_content', 'clean_magazine_featured_content_display', 40 );
	} else {
		add_action( 'clean_magazine_after_content', 'clean_magazine_featured_content_display', 30 );
	}

}
endif; // clean_magazine_featured_content_display_position
add_action( 'clean_magazine_before', 'clean_magazine_featured_content_display_position' );


if ( ! function_exists( 'clean_magazine_demo_content' ) ) :
/**
 * This function to display featured posts content
 *
 * @get the data value from customizer options
 *
 * @since Clean Magazine 0.2
 *
 */
function clean_magazine_demo_content( $options ) {
	$clean_magazine_demo_content = '
		<article id="featured-post-1" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Travel Map" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured1-350x263.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="Travel Map" href="#">Travel Map</a>
					</h2>
				</header>
				<div class="entry-summary">
					<p>A map is a picture or representation of the Earth\'s surface, showing how things are related to each other by distance, direction, and size. Create a travel map to record your experiences.
						<a href="#" class="more-link">Read More ...</a></p>
				</div><!-- .entry-summary -->
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-2" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Volkswagen Camper" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured2-350x263.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="Volkswagen Camper" href="#">Volkswagen Camper</a>
					</h2>
				</header>
				<div class="entry-summary">
					<p>The Volkswagen Camper gives you freedom. Whether you are into extreme sports, family fun or simply escaping for the weekend, discover new journeys with the Volkswagen.
						<a href="#" class="more-link">Read More ...</a></p>
				</div><!-- .entry-summary -->
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-3" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Best Beaches" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured3-350x263.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="Best Beaches" href="#">Best Beaches</a>
					</h2>
				</header>
				<div class="entry-summary">
					<p>We can all agree that after months of polar vortexes and a winter that refused to quit, the idea of hitting the beach sounds pretty terrific, right? Calm, warm waters, gently sloping sand.
						<a href="#" class="more-link">Read More ...</a></p>
				</div><!-- .entry-summary -->
			</div><!-- .entry-container -->
		</article>';

	if( 'layout-four' == $options ['featured_content_layout'] || 'layout-two' == $options ['featured_content_layout'] ) {
		$clean_magazine_demo_content .= '
		<article id="featured-post-4" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Santorini Island" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured4-350x263.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="Santorini Island" href="#">Santorini Island</a>
					</h2>
				</header>
				<div class="entry-summary">
					<p>Santorini is an island in the southern Aegean Sea, about 200 km (120 mi) southeast of Greece\'s mainland. The two main sources of wealth in Santorini are agriculture and tourism. <a href="#" class="more-link">Read More ...</a></p>
				</div><!-- .entry-summary -->
			</div><!-- .entry-container -->
		</article>';
	}

	return $clean_magazine_demo_content;
}
endif; // clean_magazine_demo_content


if ( ! function_exists( 'clean_magazine_page_content' ) ) :
/**
 * This function to display featured page content
 *
 * @param $options: clean_magazine_theme_options from customizer
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_page_content( $options ) {
	global $post;

	$quantity 		= $options [ 'featured_content_number' ];

	$more_link_text	= $options['excerpt_more_text'];

	$show_content	= $options['featured_content_show'];

	$number_of_page = 0; 		// for number of pages

	$page_list		= array();	// list of valid pages ids

	$clean_magazine_page_content 	= '';

	//Get valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if( isset ( $options['featured_content_page_' . $i] ) && $options['featured_content_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	wp_parse_args( $page_list, array( $options['featured_content_page_' . $i] ) );
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
		while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
			$title_attribute = the_title_attribute( array( 'before' => __( 'Permalink to: ', 'clean-magazine' ), 'echo' => false ) );

			$excerpt = get_the_excerpt();

			$clean_magazine_page_content .= '
				<article id="featured-post-' . $i . '" class="post hentry featured-page-content">';
				if ( has_post_thumbnail() ) {
					$clean_magazine_page_content .= '
					<figure class="featured-homepage-image">
						<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">
						'. get_the_post_thumbnail( $post->ID, 'post-thumbnail', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) ) .'
						</a>
					</figure>';
				}
				else {
					$clean_magazine_first_image = clean_magazine_get_first_image( $post->ID, 'post-thumbnail', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) );

					if ( '' != $clean_magazine_first_image ) {
						$clean_magazine_page_content .= '
						<figure class="featured-homepage-image">
							<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">
								'. $clean_magazine_first_image .'
							</a>
						</figure>';
					}
				}

				$clean_magazine_page_content .= '
					<div class="entry-container">
						<header class="entry-header">
							<h2 class="entry-title">
								<a href="' . get_permalink() . '" rel="bookmark">' . the_title( '','', false ) . '</a>
							</h2>
						</header>';
						if ( 'excerpt' == $show_content ) {
							$clean_magazine_page_content .= '<div class="entry-summary"><p>' . $excerpt . '</p></div><!-- .entry-summary -->';
						}
						elseif ( 'full-content' == $show_content ) {
							$content = apply_filters( 'the_content', get_the_content() );
							$content = str_replace( ']]>', ']]&gt;', $content );
							$clean_magazine_page_content .= '<div class="entry-content">' . $content . '</div><!-- .entry-content -->';
						}
					$clean_magazine_page_content .= '
					</div><!-- .entry-container -->
				</article><!-- .featured-post-'. $i .' -->';
		endwhile;

		wp_reset_query();
	}

	return $clean_magazine_page_content;
}
endif; // clean_magazine_page_content