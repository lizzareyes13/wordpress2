<?php
/**
 * Advertisement Image Widget
 *
 * @package Catch Themes
 * @subpackage Clean Magazine Pro
 * @since Clean Magazine 1.0
 */


/**
 * Makes a custom Widget for Displaying Image Ads
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Catch Themes
 * @subpackage Clean Magazine Pro
 * @since Clean Magazine 1.0
 */
class clean_magazine_advertisement_image_widget extends WP_Widget {

	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	function __construct() {

		$this->defaults = array(
			'title'           => '',
			'items_number'    => 1,
			'layout'          => 'one-column',
			'enable_hide_404' => 1,
		);

		$widget_ops = array(
			'classname'   => 'ct-advertisement-image ctadvertisement',
			'description' => __( 'Use this widget to add Image as Advertisement', 'clean-magazine' ),
		);

		$control_ops = array(
			'id_base' => 'ct-advertisement-image',
		);

		parent::__construct(
			'ct-advertisement-image', // Base ID
			__( 'CT: Advertisement Images', 'clean-magazine' ), // Name
			$widget_ops,
			$control_ops
		);
	}

	/**
	 * Creates the form for the widget in the back-end which includes the Title , adcode, image, alt
	 * $instance Current settings
	 */
	function form($instance) {
		//* Merge with defaults
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>
        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'clean-magazine' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'layout' ); ?>"><?php _e( 'Layout', 'clean-magazine' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'layout' ); ?>" name="<?php echo $this->get_field_name( 'layout' ); ?>" class="widefat">
				<?php
					$post_type_choices = array(
						'one-column' => __( '1 Column', 'clean-magazine' ),
						'two-column' => __( '2 Column', 'clean-magazine' )
					);

				foreach ( $post_type_choices as $key => $value ) {
					echo '<option value="' . $key . '" '. selected( $key, $instance['layout'], false ) .'>' . $value .'</option>';
				}
				?>
			</select>
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'items_number' ); ?>"><?php _e( 'No. of Items', 'clean-magazine' ); ?>:</label>
			<input type="number" id="<?php echo $this->get_field_id( 'items_number' ); ?>" name="<?php echo $this->get_field_name( 'items_number' ); ?>" value="<?php echo absint( $instance['items_number'] ); ?>" class="small-text" min="1" />
			<br>
			<span class="description"><?php _e( 'Please save the widget once No. of items is changed to reflect the changes', 'clean-magazine' ); ?></span>
		</p>

		<?php for( $i=1; $i<= absint( $instance['items_number'] ); $i++ ) { ?>

		<div class="ct-image-box">
			<?php
				$image
					=  isset( $instance['image' . '_' .  $i] ) ? $instance['image' . '_' .  $i] : '';
				$image_link
					=  isset( $instance['image_link' . '_' .  $i] ) ? $instance['image_link' . '_' .  $i] : '';
				$target
					=  isset( $instance['target' . '_' .  $i] ) ? $instance['target' . '_' .  $i] : '';
				$alt
					=  isset( $instance['alt' . '_' .  $i] ) ? $instance['alt' . '_' .  $i] : '';
			?>
			<h2> <?php printf( __( 'Image %1s', 'clean-magazine' ), $i ); ?> </h2>

			<p>
	            <label for="<?php echo $this->get_field_id('image' . '_' .  $i ); ?>"><?php _e('Image Url:','clean-magazine'); ?></label>
	        <input type="text" name="<?php echo $this->get_field_name('image' . '_' .  $i ); ?>" value="<?php echo esc_url( $image ); ?>" class="widefat" id="<?php echo $this->get_field_id('image' . '_' .  $i ); ?>" />
	        </p>

	        <p>
	            <label for="<?php echo $this->get_field_id('image_link' . '_' .  $i ); ?>"><?php _e('Image Link:','clean-magazine'); ?></label>
	            <input type="text" name="<?php echo $this->get_field_name('image_link' . '_' .  $i ); ?>" value="<?php echo esc_url( $image_link ); ?>" class="widefat" id="<?php echo $this->get_field_id('image_link' . '_' .  $i ); ?>" />
	        </p>

	        <p>
	        	<input class="checkbox" type="checkbox" <?php checked( $target, true ) ?> id="<?php echo $this->get_field_id( 'target' . '_' .  $i ); ?>" name="<?php echo $this->get_field_name( 'target' . '_' .  $i ); ?>" />
	        	<label for="<?php echo $this->get_field_id('target' . '_' .  $i ); ?>"><?php _e( 'Check to Open Link in new Tab/Window', 'clean-magazine' ); ?></label><br />
	        </p>
	        <p>
	            <label for="<?php echo $this->get_field_id('alt' . '_' .  $i ); ?>"><?php _e('Alt text:','clean-magazine'); ?></label>
	            <input type="text" name="<?php echo $this->get_field_name('alt' . '_' .  $i ); ?>" value="<?php echo esc_attr( $alt ) ?>" class="widefat" id="<?php echo $this->get_field_id('alt' . '_' .  $i ); ?>" />
	        </p>
	    </div> <!-- .ct-image-box -->
	    <?php } //end for ?>
        <p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['enable_hide_404'], true ) ?> id="<?php echo $this->get_field_id('enable_hide_404'); ?>" name="<?php echo $this->get_field_name('enable_hide_404'); ?>" /> <label for="<?php echo $this->get_field_id('enable_hide_404'); ?>"><?php _e( 'Check to Hide Ad on 404 page', 'clean-magazine' ); ?></label>
		</p>
        <?php
	}

	/**
	 * update the particular instant
	 *
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * $new_instance New settings for this instance as input by the user via form()
	 * $old_instance Old settings for this instance
	 * Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {
		$instance 				= $old_instance;

		$instance['title']           = sanitize_text_field( $new_instance['title'] );
		$instance['items_number']    = absint( $new_instance['items_number'] );
		$instance['layout']          = sanitize_key( $new_instance['layout'] );
		$instance['enable_hide_404'] = clean_magazine_sanitize_checkbox( $new_instance['enable_hide_404'] );

		for( $i=1; $i<= absint( $instance['items_number'] ); $i++ ) {
			$instance['image' . '_' .  $i]
				= esc_url_raw( $new_instance['image' . '_' .  $i] );
			$instance['image_link' . '_' .  $i]
				= esc_url_raw( $new_instance['image_link' . '_' .  $i] );
			$instance[ 'target' . '_' .  $i]
				= clean_magazine_sanitize_checkbox( $new_instance['target' . '_' .  $i] );
			$instance['alt' . '_' .  $i]
				= sanitize_text_field( $new_instance['alt' . '_' .  $i] );
		}

		return $instance;
	}

	/**
	 * Displays the Widget in the front-end.
	 *catchthemes
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		// Merge with defaults
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		if ( $instance['enable_hide_404'] && is_404() ) {
			//Bail Early if the page is 404 error page and the widget is set to be hidden in that page
			return;
		}

		echo $args['before_widget'];

		// Set up the author bio
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];
		}



		echo '<div class="ads-image-wrap ' . esc_attr( $instance['layout'] ) . '">';

		for( $i=1; $i<= absint( $instance['items_number'] ); $i++ ) {

			$image
				=  isset( $instance['image' . '_' .  $i] ) ? $instance['image' . '_' .  $i] : '';
			$image_link
				=  isset( $instance['image_link' . '_' .  $i] ) ? $instance['image_link' . '_' .  $i] : '';
			$target
				=  isset( $instance['target' . '_' .  $i] ) ? $instance['target' . '_' .  $i] : '';
			$alt
				=  isset( $instance['alt' . '_' .  $i] ) ? $instance['alt' . '_' .  $i] : '';


			$base = '_self';

			if ( $target ) {
				$base = '_blank';
			}


			if ( '' != $image ) {
				echo '<div class="ads-image ads-hentry hentry">';

				$image_output = '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $alt ) . '" />';

					if( '' != $image_link ) {
						echo '
						<a href="' . esc_url( $image_link ) . '" target="' . esc_attr( $base ) . '">
							' . $image_output . '
						</a>';
					}
					else {
						echo $image_output;
					}
				echo '</div><!-- .ads-image -->';
			}
		}

		echo '</div><!-- .ads-image-wrap -->';

		echo $args['after_widget'];
	}

}

//From Codex: https://codex.wordpress.org/Widgets_API
add_action('widgets_init',
	create_function('', 'return register_widget("clean_magazine_advertisement_image_widget");')
);