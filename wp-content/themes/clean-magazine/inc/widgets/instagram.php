<?php
/**
 * Newsletter Widget
 *
 * @package Catch Themes
 * @subpackage Clean Magazine Pro
 * @since Clean Magazine 1.0
 */


class clean_magazine_instagram_widget extends WP_Widget {

	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Constructor. Set the default widget options and create widget.
	 *
	 * @since 0.1.0
	 */
	function __construct() {
		$this->defaults = array(
			'title'    => __( 'Instagram', 'clean-magazine' ),
			'username' => '',
			'layout'   => 'one-column',
			'number'   => 6,
			'size'     => 'thumbnail',
			'target'   => 0,
			'link'     => __( 'View on Instagram', 'clean-magazine' ),
		);

		$widget_ops = array(
			'classname'   => 'ct-instagram ctninstagram ctfeaturedpostpageimage',
			'description' => __( 'Displays your latest Instagram photos', 'clean-magazine' ),
		);

		$control_ops = array(
			'id_base' => 'ct-instagram',
		);

		parent::__construct(
			'ct-instagram', // Base ID
			__( 'CT: Instagram', 'clean-magazine' ), // Name
			$widget_ops,
			$control_ops
		);
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'clean-magazine' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e( 'Username', 'clean-magazine' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo esc_attr( $instance['username'] ); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'layout' ); ?>"><?php _e( 'Layout', 'clean-magazine' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'layout' ); ?>" name="<?php echo $this->get_field_name( 'layout' ); ?>" class="widefat">
				<?php
					$post_type_choices = array(
						'one-column'   => __( '1 Column', 'clean-magazine' ),
						'two-column'   => __( '2 Column', 'clean-magazine' ),
						'three-column' => __( '3 Column', 'clean-magazine' ),
						'four-column'  => __( '4 Column', 'clean-magazine' ),
					);

				foreach ( $post_type_choices as $key => $value ) {
					echo '<option value="' . $key . '" '. selected( $key, $instance['layout'], false ) .'>' . $value .'</option>';
				}
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of photos', 'clean-magazine' ); ?>:</label>
			<input type="number" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo absint( $instance['number'] ); ?>" class="small-text" min="1" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e( 'Instagram Image Size', 'clean-magazine' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>" class="widefat">
				<?php
					$post_type_choices = array(
						'thumbnail' => __( 'Thumbnail', 'clean-magazine' ),
						'small'     => __( 'Small', 'clean-magazine' ),
						'large'     => __( 'Large', 'clean-magazine' ),
						'original'  => __( 'Original', 'clean-magazine' ),
					);

				foreach ( $post_type_choices as $key => $value ) {
					echo '<option value="' . $key . '" '. selected( $key, $instance['size'], false ) .'>' . $value .'</option>';
				}
				?>
			</select>
		</p>

		 <p>
        	<input class="checkbox" type="checkbox" <?php checked( $instance['target'], true ) ?> id="<?php echo $this->get_field_id( 'target' ); ?>" name="<?php echo $this->get_field_name( 'target' ); ?>" />
        	<label for="<?php echo $this->get_field_id('target' ); ?>"><?php _e( 'Check to Open Link in new Tab/Window', 'clean-magazine' ); ?></label><br />
        </p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php _e( 'Link text', 'clean-magazine' ); ?>:
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['link'] ); ?>" /></label></p>
		<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']    = sanitize_text_field( $new_instance['title'] );
		$instance['username'] = sanitize_text_field( $new_instance['username'] );
		$instance['layout']   = sanitize_key( $new_instance['layout'] );
		$instance['number']   = absint( $new_instance['number'] );
		$instance['size']     = sanitize_key( $new_instance['size'] );
		$instance['target']   = clean_magazine_sanitize_checkbox( $new_instance['target'] );
		$instance['link']     = strip_tags( $new_instance['link'] );

		return $instance;
	}

	function widget( $args, $instance ) {
		// Merge with defaults
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $args['before_widget'];

		// Set up the author bio
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];
		}

		$username = empty( $instance['username'] ) ? '' : $instance['username'];
		$number   = empty( $instance['number'] ) ? 9 : $instance['number'];
		$size     = empty( $instance['size'] ) ? 'large' : $instance['size'];
		$link     = empty( $instance['link'] ) ? '' : $instance['link'];

		$target = '_self';

		if ( $instance['target'] ) {
			$target = '_blank';
		}

		if ( '' != $username ) {

			$media_array = $this->scrape_instagram( $username, $number );

			if ( is_wp_error( $media_array ) ) {

				echo wp_kses_post( $media_array->get_error_message() );

			}
			else {
				// filter for images only?
				if ( $images_only = apply_filters( 'clean_magazine_images_only', FALSE ) ) {
					$media_array = array_filter( $media_array, array( $this, 'images_only' ) );
				}
				?>

				<ul class="<?php echo esc_attr( $instance['layout'] ); ?>">
				<?php
					foreach ( $media_array as $item ) {
						echo '
						<li class="hentry">
							<a href="'. esc_url( $item['link'] ) .'" target="'. esc_attr( $target ) .'">
								<img src="'. esc_url( $item[$size] ) .'"  alt="'. esc_attr( $item['description'] ) .'" title="'. esc_attr( $item['description'] ).'"/>
							</a>
						</li>';
					}
				?>
				</ul>
			<?php
			}
		}

		$linkclass = apply_filters( 'clean_magazine_link_class', 'clear' );

		if ( '' != $link ) {
			?>
			<p class="<?php echo esc_attr( $linkclass ); ?>">
				<a class="genericon genericon-instagram" href="//instagram.com/<?php echo esc_attr( trim( $username ) ); ?>" rel="me" target="<?php echo esc_attr( $target ); ?>"><span><?php echo wp_kses_post( $link ); ?></span></a>
			</p>
			<?php
		}

		echo $args['after_widget'];
	}

	// based on https://gist.github.com/cosmocatalano/4544576
	function scrape_instagram( $username, $slice = 9 ) {
		$username = strtolower( $username );
		$username = str_replace( '@', '', $username );

		if ( false === ( $instagram = get_transient( 'instagram-a3-'.sanitize_title_with_dashes( $username ) ) ) ) {

			$remote = wp_remote_get( 'http://instagram.com/'.trim( $username ) );

			if ( is_wp_error( $remote ) ) {
				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'clean-magazine' ) );
			}

			if ( 200 != wp_remote_retrieve_response_code( $remote ) ) {
				return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'clean-magazine' ) );
			}

			$shards      = explode( 'window._sharedData = ', $remote['body'] );
			$insta_json  = explode( ';</script>', $shards[1] );
			$insta_array = json_decode( $insta_json[0], TRUE );

			if ( ! $insta_array ) {
				return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'clean-magazine' ) );
			}

			if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
				$images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
			}
			else {
				return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'clean-magazine' ) );
			}

			if ( ! is_array( $images ) ) {
				return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'clean-magazine' ) );
			}

			$instagram = array();

			foreach ( $images as $image ) {

				$image['thumbnail_src'] = preg_replace( '/^https?\:/i', '', $image['thumbnail_src'] );
				$image['display_src']   = preg_replace( '/^https?\:/i', '', $image['display_src'] );

				// handle both types of CDN url
				if ( (strpos( $image['thumbnail_src'], 's640x640' ) !== false ) ) {
					$image['thumbnail'] = str_replace( 's640x640', 's160x160', $image['thumbnail_src'] );
					$image['small']     = str_replace( 's640x640', 's320x320', $image['thumbnail_src'] );
				}
				else {
					$urlparts  = wp_parse_url( $image['thumbnail_src'] );
					$pathparts = explode( '/', $urlparts['path'] );

					array_splice( $pathparts, 3, 0, array( 's160x160' ) );

					$image['thumbnail'] = '//' . $urlparts['host'] . implode('/', $pathparts);
					$pathparts[3]       = 's320x320';
					$image['small']     = '//' . $urlparts['host'] . implode('/', $pathparts);
				}

				$image['large'] = $image['thumbnail_src'];

				if ( $image['is_video'] == true ) {
					$type = 'video';
				}
				else {
					$type = 'image';
				}

				$caption = __( 'Instagram Image', 'clean-magazine' );
				if ( ! empty( $image['caption'] ) ) {
					$caption = $image['caption'];
				}

				$instagram[] = array(
					'description'   => $caption,
					'link'		  	=> '//instagram.com/p/' . $image['code'],
					'time'		  	=> $image['date'],
					'comments'	  	=> $image['comments']['count'],
					'likes'		 	=> $image['likes']['count'],
					'thumbnail'	 	=> $image['thumbnail'],
					'small'			=> $image['small'],
					'large'			=> $image['large'],
					'original'		=> $image['display_src'],
					'type'		  	=> $type
				);
			}



			// do not set an empty transient - should help catch private or empty accounts
			if ( ! empty( $instagram ) ) {
				set_transient( 'instagram-a3-'.sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'clean_magazine_instagram_cache_time', HOUR_IN_SECONDS*2 ) );
			}
		}

		if ( ! empty( $instagram ) ) {
			return array_slice( $instagram, 0, $slice );
		} else {

			return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'clean-magazine' ) );

		}
	}

	function images_only( $media_item ) {
		if ( $media_item['type'] == 'image' ) {
			return true;
		}

		return false;
	}
}

//From Codex: https://codex.wordpress.org/Widgets_API
add_action('widgets_init',
	create_function('', 'return register_widget("clean_magazine_instagram_widget");')
);