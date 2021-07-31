<?php
/**
 * Instagram widget
 *
 * @link       http://www.rollybueno.com/wp-social-media
 * @since      1.0.0
 *
 * @package    WP_Social_Media
 * @subpackage WP_Social_Media/admin/widget/Instagram
 */

class WP_Social_Media_Instagram_Widget extends WP_Widget {

	/**
	 * WP Widget registration
	 *
	 * __construct() will initialise this class
	 */
	function __construct() {
		parent::__construct(
			'wp_social_media_instagram',
			esc_html__( 'WP Social Media - Instagram', 'wp-social-media' ),
			array(
				'description'           => esc_html__( 'Display your Instagram media', 'wp-social-media' ),
				'show_instance_in_rest' => true,
			)
		);
	}

	/**
	 * Front-end display of the widget.
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from the database.
	 *
	 * @see WP_Widget::widget()
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		if ( ! empty( $instance['text'] ) ) {
			?>
			<p class="custom-widget-text">
				<?php echo nl2br( esc_html( $instance['text'] ) ); ?>
			</p>
			<?php
		}
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @param array $instance Previously saved values from the database.
	 *
	 * @see WP_Widget::form()
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$desc  = ! empty( $instance['description'] ) ? $instance['description'] : '';
		?>
		<!-- Title -->
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
			<?php esc_attr__( 'Title:', 'wp-social-media' ); ?>
		</label>
		<input 
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			type="text"
			value="<?php echo esc_attr( $title ); ?>">
		</p>
		<!-- Desc -->
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>">
			<?php esc_attr__( 'Description:', 'wp-social-media' ); ?>
		</label>
		<textarea 
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"
			name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"
		><?php echo esc_attr( $desc ); ?></textarea>
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from the database.
	 *
	 * @return array Updated safe values to be saved.
	 *
	 * @see WP_Widget::update()
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? $new_instance['description'] : '';
		} else {
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? sanitize_text_field( $new_instance['description'] ) : '';
		}
		return $instance;
	}
}

/**
 * Register widget
 *
 * This is where we run them
 */
function wp_social_media_widget() {
	register_widget( 'WP_Social_Media_Instagram_Widget' );
}
add_action( 'widgets_init', 'wp_social_media_widget' );
