<?php

// and finally, the widget to display the ads on the sidebar
class WorthyD_AdSense_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
	 		'worthyd_adsense_widget', // base ID of the widget
			'WorthyD AdSense Widget', // the name of the widget
			array( 'description' => 'WorthyD AdSense Widget Settings' ) // the description for the widget
		);
	}

 	public function form( $instance ) {
		if ( isset( $instance[ 'ad_type' ] ) ) {
			$ad_type = $instance[ 'ad_type' ];
		} else {
			$ad_type = '300x250';
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'ad_type' ); ?>">Ad Type</label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'ad_type' ); ?>" name="<?php echo $this->get_field_name( 'ad_type' ); ?>" type="text" value="<?php echo esc_attr( $ad_type ); ?>" />
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance[ 'ad_type' ] = strip_tags( $new_instance[ 'ad_type' ] );
		return $instance;
	}

	public function widget( $args, $instance ) {
		echo worthyd_return_adsense( $instance[ 'ad_type' ] );
	}

}

function worthyd_myplugin_register_widgets() {
	register_widget( 'WorthyD_AdSense_Widget' );
}

add_action( 'widgets_init', 'worthyd_myplugin_register_widgets' );
?>