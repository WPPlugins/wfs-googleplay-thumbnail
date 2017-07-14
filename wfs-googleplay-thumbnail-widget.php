<?phpclass wfs_googleplay_thumbnail_widget extends WP_Widget {	/**	 * Register widget with WordPress.	 */	function __construct() 	{		parent::__construct(			'wfs_googleplay_thumbnail_widget', // Base ID			'WFS GooglePlay Thumbnail', // Name			array( 'description' => 'WFS GooglePlay Thumbnail', ) // Args		);	}	/**	 * Front-end display of widget.	 *	 * @see WP_Widget::widget()	 *	 * @param array $args     Widget arguments.	 * @param array $instance Saved values from database.	 */	public function widget( $args, $instance ) 	{		$title = apply_filters( 'widget_title', $instance['title'] );		$key = apply_filters( 'widget_key', $instance['key'] );		echo $args['before_widget'];				if ( ! empty( $title ) )			echo $args['before_title'] . $title . $args['after_title'];					// see this function at 'thumbnail.php'		display_wfs_googleplay_thumbnail($key);				echo $args['after_widget'];	}	/**	 * Back-end widget form.	 *	 * @see WP_Widget::form()	 *	 * @param array $instance Previously saved values from database.	 */	public function form( $instance ) 	{		if ( isset( $instance[ 'title' ] ) ) 			$title = $instance[ 'title' ]; 		else  			$title = ''; 				if ( isset( $instance[ 'key' ] ) ) 			$key = $instance[ 'key' ]; 		else  			$key = ''; 				?>		<p>		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />		</p>		<p>		<label for="<?php echo $this->get_field_id( 'key' ); ?>"><?php _e( 'Key:' ); ?></label> 		<textarea name="<?php echo $this->get_field_name( 'key' ); ?>" id="<?php echo $this->get_field_id( 'key' ); ?>" cols="15" rows="8" class="widefat"><?php echo esc_attr( $key ); ?></textarea>		</p>		<?php 	}	/**	 * Sanitize widget form values as they are saved.	 *	 * @see WP_Widget::update()	 *	 * @param array $new_instance Values just sent to be saved.	 * @param array $old_instance Previously saved values from database.	 *	 * @return array Updated safe values to be saved.	 */	public function update( $new_instance, $old_instance ) 	{		$instance = array();		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';		$instance['key'] = ( ! empty( $new_instance['key'] ) ) ? strip_tags( $new_instance['key'] ) : '';		return $instance;	}}?>