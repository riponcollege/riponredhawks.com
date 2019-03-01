<?php



// Creating the widget 
class ripon_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'ripon_widget', 

			// Widget name will appear in UI
			__('Ripon Widget', 'ripon_widget_domain'), 

			// Widget description
			array( 'description' => __( 'Our magical custom widget that lets you choose an icon for the top of each widget.', 'ripon_widget_domain'), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$icon = apply_filters( 'widget_icon', $instance['icon'] );
		$content = apply_filters( 'widget_text', $instance['content'] );

		// open the ripon widget
		echo '<div class="ripon-widget ' . $icon . '">';

		// before and after widget arguments are defined by themes
		if ( !empty( $title ) && $title != 'none' ) echo $args['before_title'] . $title . $args['after_title'];
		if ( !empty( $content ) ) echo $content;

		// close the widget tag
		echo '</div>';
	}
			

	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
			$icon = $instance[ 'icon' ];
			$content = $instance[ 'content' ];
		} else {
			$title = '';
			$icon = '';
			$content = '';
		}

		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e( 'Icon:' ); ?></label> 
			<select class="widefat" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>">
		<?php
$this->ripon_icon_option_value( "none", $icon );
$this->ripon_icon_option_value( "fa-question-circle", $icon );
$this->ripon_icon_option_value( "fa-calculator", $icon );
$this->ripon_icon_option_value( "fa-book", $icon );
$this->ripon_icon_option_value( "fa-briefcase", $icon );
$this->ripon_icon_option_value( "fa-camera-retro", $icon );
$this->ripon_icon_option_value( "fa-gift", $icon );
$this->ripon_icon_option_value( "fa-mortar-board", $icon );
$this->ripon_icon_option_value( "fa-map-marker", $icon );
$this->ripon_icon_option_value( "fa-tree", $icon );
?>
	</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content:' ); ?></label><br>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" rows="10"><?php echo $content; ?></textarea>
		</p>
		<?php 
	}
	
	public function ripon_icon_option_value( $icon_name, $icon_value ) {
		?>
		<option value="<?php echo $icon_name; ?>"<?php echo ( $icon_name == $icon_value ? ' selected' : "" ); ?>><?php echo $icon_name ?></option>
		<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['icon'] = ( ! empty( $new_instance['icon'] ) ) ? strip_tags( $new_instance['icon'] ) : '';
		$instance['content'] = ( ! empty( $new_instance['content'] ) ) ? $new_instance['content'] : '';
		return $instance;
	}

}



// Register and load the widget
function ripon_load_widget() {
	register_widget( 'ripon_widget' );
}
add_action( 'widgets_init', 'ripon_load_widget' );



?>