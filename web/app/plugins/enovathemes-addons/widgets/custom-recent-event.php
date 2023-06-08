<?php

	add_action('widgets_init', 'enovathemes_addons_register_recent_event_widget');
	function enovathemes_addons_register_recent_event_widget(){
		register_widget( 'Enovathemes_Addons_WP_Widget_Recent_Events' );
	}

	class  Enovathemes_Addons_WP_Widget_Recent_Events extends WP_Widget {

		public function __construct() {
			parent::__construct(
				'recent_event',
				esc_html__('* Recent Events', 'enovathemes-addons'),
				array( 'description' => esc_html__('Display recent event with thumbnails', 'enovathemes-addons'))
			);
		}

		public function widget( $args, $instance ) {

			extract($args);

			$title        = apply_filters( 'widget_title', $instance['title'] );
			$posts_number = (isset($instance['posts_number']) && is_numeric($instance['posts_number'])) ? esc_attr($instance['posts_number']) : '6';
			
			$columns_mob    = isset($instance['columns_mob']) ? esc_attr($instance['columns_mob']) : "";
			$columns_tablet = isset($instance['columns_tablet']) ? esc_attr($instance['columns_tablet']) : "";
			$columns_desk   = isset($instance['columns_desk']) ? esc_attr($instance['columns_desk']) : "";

			$category     = (isset($instance['category'])) ? esc_attr($instance['category']) : '';
			global $post;

			$output = "";

				if (isset($category) && !empty($category)) {
					$recent_query_opt = array( 
						'meta_key'=>'event_date_unix',
				        'orderby'=>'meta_value',
				        'order'=>'DESC',
						'post_type'           => 'et-event',
						'posts_per_page' 	  => absint($posts_number), 
						'tax_query'           => array(
							array(
								'taxonomy' => 'event-category',
								'field'    => 'slug',
								'terms'    => explode(',',$category),
								'operator' => 'IN'
							)
						),
						'post_status' 	 	  => 'publish',
						'ignore_sticky_posts' => true
					);
				} else {
					$recent_query_opt = array( 
						'post_type'           => 'et-event',
						'post_status'         => 'publish',
						'ignore_sticky_posts' => 1,
						'posts_per_page' 	  => absint($posts_number), 
						'meta_key'=>'event_date_unix',
				        'orderby'=>'meta_value',
				        'order'=>'DESC',
					);
				}

				$recent_event_with_thumbnail = new WP_Query($recent_query_opt);
				
				if($recent_event_with_thumbnail->have_posts()){

					echo $before_widget;
			
					if($title) {echo $before_title.$title.$after_title;}

					$output .= '<div class="recent-event columns-mob-'.esc_attr($columns_mob).' columns-tablet-'.esc_attr($columns_tablet).' columns-desk-'.esc_attr($columns_desk).' et-clearfix">';

						while($recent_event_with_thumbnail->have_posts()) : $recent_event_with_thumbnail->the_post();
							
							$output .= '<div class="post et-clearfix">';
								$output .='<a href="' . get_permalink() . '" title="'.get_the_title().'">';
									if ( '' != get_the_post_thumbnail() ) {

										$output .= '<div class="image-container">';
											$output .= '<div class="image-preloader"></div>';
											$output .= get_the_post_thumbnail( $post->ID, 'thumbnail' ,'');
										$output .= '</div>';
										
									}
								$output .= '</a>';
							$output .= '</div>';

						endwhile;
						
					$output .= '</div>';

					echo $output;

				} else {
					echo goodresto_enovathemes_not_found('event');
				}

				wp_reset_postdata();


				echo $after_widget;
		}

	 	public function form( $instance ) {

			$defaults = array(
	 			'title'        => esc_html__('Recent event', 'enovathemes-addons'),
	 			'posts_number' => '6',
	 			'category'     => '',
	 			'columns_mob'    => '1',
	 			'columns_tablet' => '1',
	 			'columns_desk'   => '1',
	 		);

	 		$instance = wp_parse_args((array) $instance, $defaults);
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html__( 'Title:', 'enovathemes-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'posts_number' ); ?>"><?php echo esc_html__( 'Number of event to show:', 'enovathemes-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'posts_number' ); ?>" name="<?php echo $this->get_field_name( 'posts_number' ); ?>" type="text" value="<?php echo $instance['posts_number']; ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php echo esc_html__( 'Enter comma separated list of categories id to filter:', 'enovathemes-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" type="text" value="<?php echo $instance['category']; ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'columns_mob' ); ?>"><?php echo esc_html__( 'Columns mobile:', 'enovathemes-addons' ); ?></label> 
				<select class="widefat" id="<?php echo $this->get_field_id( 'columns_mob' ); ?>" name="<?php echo $this->get_field_name( 'columns_mob' ); ?>" >
                	<?php for ($i=1; $i < 11; $i++) { ?>
                		<option value="<?php echo $i; ?>" <?php selected( $instance['columns_mob'], $i ); ?>><?php echo esc_html__($i,'enovathemes-addons'); ?></option>
                	<?php } ?>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'columns_tablet' ); ?>"><?php echo esc_html__( 'Columns tablet:', 'enovathemes-addons' ); ?></label> 
				<select class="widefat" id="<?php echo $this->get_field_id( 'columns_tablet' ); ?>" name="<?php echo $this->get_field_name( 'columns_tablet' ); ?>" >
                	<?php for ($i=1; $i < 11; $i++) { ?>
                		<option value="<?php echo $i; ?>" <?php selected( $instance['columns_tablet'], $i ); ?>><?php echo esc_html__($i,'enovathemes-addons'); ?></option>
                	<?php } ?>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'columns_desk' ); ?>"><?php echo esc_html__( 'Columns desk:', 'enovathemes-addons' ); ?></label> 
				<select class="widefat" id="<?php echo $this->get_field_id( 'columns_desk' ); ?>" name="<?php echo $this->get_field_name( 'columns_desk' ); ?>" >
                	<?php for ($i=1; $i < 11; $i++) { ?>
                		<option value="<?php echo $i; ?>" <?php selected( $instance['columns_desk'], $i ); ?>><?php echo esc_html__($i,'enovathemes-addons'); ?></option>
                	<?php } ?>
				</select>
			</p>
			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title']        = strip_tags( $new_instance['title'] );
			$instance['posts_number'] = strip_tags( $new_instance['posts_number'] );
			$instance['category']     = strip_tags( $new_instance['category'] );
			$instance['columns_mob']    = strip_tags( $new_instance['columns_mob'] );
			$instance['columns_tablet'] = strip_tags( $new_instance['columns_tablet'] );
			$instance['columns_desk']   = strip_tags( $new_instance['columns_desk'] );
			return $instance;
		}
	}

?>