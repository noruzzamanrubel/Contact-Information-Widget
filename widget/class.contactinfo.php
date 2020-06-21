<?php
class ContactInfo extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'contactinfo',
            __( 'Contact Information', 'contactinfo' ),
            array( 'description' => __( 'Our Widget Description', 'contactinfo' ) )
        );
    }

    public function form( $instance ) {
        $title = isset( $instance['title'] ) ? $instance['title'] : __( 'Contact Us', 'contactinfo' );
        $location = isset( $instance['location'] ) ? $instance['location'] : '35/5 sheusgari, Bogura Sadar Bogura 5800';
        $phonenumber = isset( $instance['phonenumber'] ) ? $instance['phonenumber'] : '01304323232';
        $email = isset( $instance['email'] ) ? $instance['email'] : 'noruzzamanrubel@gmail.com';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', 'contactinfo' )?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ) ?>"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'location' ) ); ?>"><?php _e( 'Location', 'contactinfo' )?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'location' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'location' ) ) ?>"
                   value="<?php echo esc_attr( $location ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'phonenumber' ) ); ?>"><?php _e( 'Phone Number', 'contactinfo' )?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'phonenumber' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'phonenumber' ) ) ?>"
                   value="<?php echo esc_attr( $phonenumber ); ?>">
        </p>
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'Email' ) ); ?>"><?php _e( 'Email', 'demowidget' )?></label>
            <input class="widefat" type="email" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'email' ) ) ?>"
                   value="<?php echo esc_attr( $email ); ?>">
        </p>
		<?php
}

    public function widget( $args, $instance ) {

        echo $args['before_widget'];
        if ( isset( $instance['title'] ) || $instance['title'] != '' ) {
            echo $args['before_title'];
            echo apply_filters( 'widget_title', $instance['title'] );
            echo $args['after_title'];
            ?>
            <div class="contactinfo <?php echo esc_attr( $args['id'] ); ?>">
                <p><?php echo isset( $instance['location'] ) ? $instance['location'] : 'N/A'; ?></p>
                <p><?php echo isset( $instance['phonenumber'] ) ? $instance['phonenumber'] : 'N/A'; ?></p>
                <p><?php echo isset( $instance['email'] ) ? $instance['email'] : 'N/A'; ?></p>
            </div>
			<?php
}
        echo $args['after_widget'];

    }
    public function update( $new_instance, $old_instance ) {
        $instance = $new_instance;
        $instance['title'] = sanitize_text_field( $instance['title'] );
        $email = $new_instance['email'];
        $location = $new_instance['location'];
        $phonenumber = $new_instance['phonenumber'];
        if ( !is_email( $email ) ) {
            $instance['email'] = $old_instance['email'];
        }
        if ( !is_string ( $location ) ) {
            $instance['location'] = $old_instance['location'];
        }
        if ( !is_numeric( $phonenumber) ) {
            $instance['phonenumber'] = $old_instance['phonenumber'];
        }
        return $instance;
    }

}
