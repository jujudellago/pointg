<?php

	add_action('widgets_init', 'enovathemes_addons_register_reglog_widget');
	function enovathemes_addons_register_reglog_widget(){
		register_widget( 'Enovathemes_Addons_WP_Widget_RegLog' );
	}

	class  Enovathemes_Addons_WP_Widget_RegLog extends WP_Widget {

		public function __construct() {
			parent::__construct(
				'reglog',
				esc_html__('* Registration/Login form', 'enovathemes-addons'),
				array( 'description' => esc_html__('Front-end registration/login form', 'enovathemes-addons'))
			);
		}

		public function widget( $args, $instance ) {

			extract($args);

			$title  = apply_filters( 'widget_title', $instance['title'] );

			$output = "";
			echo $before_widget;
			if ( ! empty( $title ) ){echo $before_title . $title . $after_title;}

			$args = array(
		        'echo'           => true,
		        'form_id'        => 'loginform',
		        'label_username' => esc_html__('Username', 'enovathemes-addons'),
		        'label_password' => esc_html__('Password', 'enovathemes-addons'),
		        'label_remember' => esc_html__( 'Remember Me', 'enovathemes-addons'),
		        'label_log_in'   => esc_html__( 'Log In', 'enovathemes-addons'),
		        'id_username'    => 'user_login',
		        'id_password'    => 'user_pass',
		        'id_remember'    => 'rememberme',
		        'id_submit'      => 'wp-submit',
		        'remember'       => false,
		        'value_username' => '',
		        'value_remember' => false
			);

			if ( is_user_logged_in() ) {
				$current_user = wp_get_current_user();
				$user = ($current_user->user_firstname) ? $current_user->user_firstname : $current_user->display_name;
			?>
			<span><?php echo esc_html__('Hello, ', 'enovathemes-addons').$user; ?></span> |  
			<a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php echo esc_html__('Logout', 'enovathemes-addons'); ?>"><?php echo esc_html__('Logout', 'enovathemes-addons'); ?></a>
			<?php } else {wp_login_form( $args );}
			echo $after_widget;
		}

	 	public function form( $instance ) {

			$defaults = array(
	 			'title'  => esc_html__('Login', 'enovathemes-addons'),
	 		);

	 		$instance = wp_parse_args((array) $instance, $defaults);
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html__( 'Title:', 'enovathemes-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>
			<p><?php echo esc_html__('This widget does not have any options','enovathemes-addons'); ?></p>
			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title']  = strip_tags( $new_instance['title'] );
			return $instance;
		}
	}

?>