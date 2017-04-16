<?php
/**
 * The template for displaying the Featured Content
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */


if( !function_exists( 'clean_magazine_header_highlight_content_display' ) ) :
/**
* Add Featured content.
*
* @uses action hook clean_magazine_before_content.
*
* @since Clean Magazine 0.2
*/
function clean_magazine_header_highlight_content_display() {
	clean_magazine_flush_transients();
	global $post, $wp_query;

	// get data value from options
	$options 		= clean_magazine_get_theme_options();
	$enablecontent 	= $options['header_highlight_content_option'];
	$contentselect 	= $options['header_highlight_content_type'];

	// Front page displays in Reading Settings
	$page_on_front 	= get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');


	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();
	if ( 'entire-site' == $enablecontent  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enablecontent  ) ) {
		if ( ( !$clean_magazine_header_highlight_content = get_transient( 'clean_magazine_header_highlight_content' ) ) ) {

			echo '<!-- refreshing cache -->';

			$classes = '';

			if ( 'demo-header-highlight-content' == $contentselect  ) {
				$classes .= ' demo-header-highlight-content' ;
			}
			elseif ( 'header-highlight-page-content' == $contentselect  ) {
				$classes .= ' header-highlight-page-content' ;
			}

			$header_highlight_content_number = $options [ 'header_highlight_content_number' ];

			$headline 	 = $options ['header_highlight_content_headline'];
			$subheadline = $options ['header_highlight_content_subheadline'];

			$classes .= ' layout-' . $header_highlight_content_number;

			$clean_magazine_header_highlight_content ='
				<section id="header-highlights-content" class="' . $classes . '">
					<div class="wrapper">';
						if ( !empty( $headline ) || !empty( $subheadline ) ) {
							$clean_magazine_header_highlight_content .='
							<div class="header-highlight-heading-wrap">';
								if ( !empty( $headline ) ) {
									$clean_magazine_header_highlight_content .='
									<h2 id="header-highlight-heading" class="entry-title">'. $headline .'</h2>';
								}
								if ( !empty( $subheadline ) ) {
									$clean_magazine_header_highlight_content .='
									<p>'. $subheadline .'</p>';
								}
							$clean_magazine_header_highlight_content .='
							</div><!-- .header-highlight-heading-wrap -->';
						}

						$clean_magazine_header_highlight_content .='
						<div class="header-highlight-content-wrap">';
							// Select content
							if ( 'demo-header-highlight-content' == $contentselect  && function_exists( 'clean_magazine_demo_header_highlight_content' ) ) {
								$clean_magazine_header_highlight_content .= clean_magazine_demo_header_highlight_content( $options );
							}
							elseif ( 'header-highlight-page-content' == $contentselect  && function_exists( 'clean_magazine_header_highlight_page_content' ) ) {
								$clean_magazine_header_highlight_content .= clean_magazine_header_highlight_page_content( $options );
							}

			$clean_magazine_header_highlight_content .='
						</div><!-- .header-highlight-content-wrap -->
					</div><!-- .wrapper -->
				</section><!-- #header-highlight-content -->';
			set_transient( 'clean_magazine_header_highlight_content', $clean_magazine_header_highlight_content, 86940 );

		}
		echo $clean_magazine_header_highlight_content;
	}
}
endif;
add_action( 'clean_magazine_before_content', 'clean_magazine_header_highlight_content_display', 10 );


if ( ! function_exists( 'clean_magazine_demo_content' ) ) :
/**
 * This function to display header highlight posts content
 *
 * @get the data value from customizer options
 *
 * @since Clean Magazine 0.2
 *
 */
function clean_magazine_demo_header_highlight_content( $options ) {
	$clean_magazine_demo_content = '
		<article id="large-featured-image" class="post hentry post-demo">
			<figure class="header-highlight-content-image">
				<a rel="bookmark" href="#">
					<img alt="Group Song" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured-1920x800.jpg" />
				</a>
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a href="#">Group Song</a>
					</h2>
				</header>
				<footer class="entry-footer">
					<p class="entry-meta">
						<span class="cat-links">
							<span class="screen-reader-text">Categories</span>
							<a rel="category tag" href="#">Music</a>
						</span>
						<span class="posted-on">
							<span class="screen-reader-text">Posted on</span>

							<a rel="bookmark" href="#">
								<time datetime="2016-05-15T04:29:55+00:00" class="entry-date published">May 7, 2016</time>

								<time datetime="2016-05-08T08:47:27+00:00" class="updated">May 7, 2016</time>
							</a>
						</span>
					</p><!-- .entry-meta -->
				</footer>
			</div><!-- .entry-container -->
		</article>

		<article id="header-highlight-post-1" class="post hentry post-demo">
			<figure class="header-highlight-content-image">
				<a rel="bookmark" href="#">
					<img alt="Sports Car" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured1-480x320.jpg" />
				</a>
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a href="#">Sports Car</a>
					</h2>
				</header>
				<footer class="entry-footer">
					<p class="entry-meta">
						<span class="cat-links">
							<span class="screen-reader-text">Categories</span>
							<a rel="category tag" href="#">Sports</a>
						</span>
						<span class="posted-on">
							<span class="screen-reader-text">Posted on</span>

							<a rel="bookmark" href="#">
								<time datetime="2016-05-15T04:29:55+00:00" class="entry-date published">May 7, 2016</time>

								<time datetime="2016-05-08T08:47:27+00:00" class="updated">May 7, 2016</time>
							</a>
						</span>
					</p><!-- .entry-meta -->
				</footer>
			</div><!-- .entry-container -->
		</article>

		<article id="header-highlight-post-2" class="post hentry post-demo">
			<figure class="header-highlight-content-image">
				<a rel="bookmark" href="#">
					<img alt="Landscape" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured2-480x320.jpg" />
				</a>
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a href="#">Landscape</a>
					</h2>
				</header>
				<footer class="entry-footer">
					<p class="entry-meta">
						<span class="cat-links">
							<span class="screen-reader-text">Categories</span>
							<a rel="category tag" href="#">Travel</a>
						</span>
						<span class="posted-on">
							<span class="screen-reader-text">Posted on</span>
							<a rel="bookmark" href="#">
								<time datetime="2016-05-15T04:29:55+00:00" class="entry-date published">May 7, 2016</time>
								<time datetime="2016-05-08T08:47:27+00:00" class="updated">May 7, 2016</time>
							</a>
						</span>
					</p><!-- .entry-meta -->
				</footer>
			</div><!-- .entry-container -->
		</article>

		<article id="header-highlight-post-3" class="post hentry post-demo">
			<figure class="header-highlight-content-image">
				<a href="#">
					<img alt="Great Vocalist" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured3-480x320.jpg" />
				</a>
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a href="#">Great Vocalist</a>
					</h2>
				</header>
				<footer class="entry-footer">
					<p class="entry-meta">
						<span class="cat-links">
							<span class="screen-reader-text">Categories</span>
							<a rel="category tag" href="#">Concert</a>
						</span>
						<span class="posted-on">
							<span class="screen-reader-text">Posted on</span>
							<a rel="bookmark" href="#">
								<time datetime="2016-05-15T04:29:55+00:00" class="entry-date published">May 7, 2016</time>
								<time datetime="2016-05-08T08:47:27+00:00" class="updated">May 7, 2016</time>
							</a>
						</span>
					</p><!-- .entry-meta -->
				</footer>
			</div><!-- .entry-container -->
		</article>

		<article id="header-highlight-post-4" class="post hentry post-demo">
			<figure class="header-highlight-content-image">
				<a href="#">
					<img alt="Classic Bike" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured4-480x320.jpg" />
				</a>
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="Classic Bike" href="#">Classic Bike</a>
					</h2>
				</header>
				<footer class="entry-footer">
					<p class="entry-meta">
						<span class="cat-links">
							<span class="screen-reader-text">Categories</span>
							<a rel="category tag" href="#">Auto</a>
						</span>
						<span class="posted-on">
							<span class="screen-reader-text">Posted on</span>

							<a rel="bookmark" href="#">
								<time datetime="2016-05-15T04:29:55+00:00" class="entry-date published">May 7, 2016</time>

								<time datetime="2016-05-08T08:47:27+00:00" class="updated">May 7, 2016</time>
							</a>
						</span>
					</p><!-- .entry-meta -->
				</footer>
			</div><!-- .entry-container -->
		</article>
		';

	return $clean_magazine_demo_content;
}
endif; // clean_magazine_demo_content


if ( ! function_exists( 'clean_magazine_header_highlight_page_content' ) ) :
/**
 * This function to display header highlight page content
 *
 * @param $options: clean_magazine_theme_options from customizer
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_header_highlight_page_content( $options ) {
	global $post;

	$quantity 		= $options ['header_highlight_content_number'];

	$number_of_post = 0; 		// for number of posts

	$post_list		= array();	// list of valid post ids

	$show_content	= isset( $options['header_highlight_content_show'] ) ? $options['header_highlight_content_show'] : 'excerpt';

	$output = '';

	//Get valid number of posts
	for( $i = 1; $i <= $quantity; $i++ ){
		if( isset ( $options['header_highlight_content_page_' . $i] ) && $options['header_highlight_content_page_' . $i] > 0 ){
			$number_of_post++;

			$post_list	=	wp_parse_args( $post_list, array( $options['header_highlight_content_page_' . $i] ) );
		}

	}

	if ( !empty( $post_list ) && $number_of_post > 0 ) {
		$get_posts = new WP_Query(
			array(
				'posts_per_page'      => $quantity,
				'post_type'           => 'page',
				'post__in'            => $post_list,
				'orderby'             => 'post__in',
				'ignore_sticky_posts' => 1 // ignore sticky posts
	        )
        );

        $i=0;

		while ( $get_posts->have_posts() ) {
			$get_posts->the_post();

			$title_attribute = the_title_attribute( array( 'before' => __( 'Permalink to: ', 'clean-magazine' ), 'echo' => false ) );

			$excerpt = get_the_excerpt();

			if ( 0 == $i ) {
				//Set image name to clean-magazine-slider 1920x800, if it is the first image
				$image_size = 'clean-magazine-slider';
				$article_id = 'large-featured-image';
			}
			else {
				//Set image name to post-thumbnail 480x320, if it is not the first image
				$image_size = 'post-thumbnail';
				$article_id = 'header-highlight-page-' . $i;
			}

			$output .= '
			<article id="' . $article_id . '" class="post hentry header-highlight-post-content">';
			if ( has_post_thumbnail() ) {
				//Pull post thunbnail if it is present
				$thumbnail = get_the_post_thumbnail(
					$post->ID,
					$image_size,
					array(
						'title' => esc_attr( $title_attribute ),
						'alt' => esc_attr( $title_attribute )
					)
				);
			}
			else {
				$first_image = clean_magazine_get_first_image(
					$post->ID,
					$image_size,
					array(
						'title' => esc_attr( $title_attribute ),
						'alt' => esc_attr( $title_attribute )
						)
					);

				if ( '' != $first_image ) {
					$thumbnail = $first_image;
				}
				else {
					$thumbnail = '<img class="wp-post-image" src="'.get_template_directory_uri().'/images/gallery/no-featured-image-1920x800.jpg" >';
				}
			}

			$output .= '
				<figure class="header-highlight-homepage-image">
					<a href="' . esc_url( get_permalink() ) . '" title="'. $title_attribute .'">
					'. $thumbnail .'
					</a>
				</figure>';

			$output .= '
				<div class="entry-container">
					<header class="entry-header">
						<h2 class="entry-title">
							<a href="' . get_permalink() . '" rel="bookmark">' . the_title( '','', false ) . '</a>
						</h2>
					</header>';

					if ( 'excerpt' == $show_content ) {
						$output .= '<div class="entry-summary"><p>' . $excerpt . '</p></div><!-- .entry-summary -->';
					}
					elseif ( 'full-content' == $show_content ) {
						$content = apply_filters( 'the_content', get_the_content() );
						$content = str_replace( ']]>', ']]&gt;', $content );
						$output .= '<div class="entry-content">' . $content . '</div><!-- .entry-content -->';
					}

				$output .= '
				</div><!-- .entry-container -->
			</article><!-- .header-highlight-post-'. $i .' -->';

			$i++;
		}

		wp_reset_query();
	}

	return $output;
}
endif; // clean_magazine_header_highlight_page_content