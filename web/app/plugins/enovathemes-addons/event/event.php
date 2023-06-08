<?php
	function enovathemes_addons_event() {

		global $goodresto_enovathemes;
		$slug = (isset($GLOBALS['goodresto_enovathemes']['event-slug']) && !empty($GLOBALS['goodresto_enovathemes']['event-slug'])) ? esc_attr($GLOBALS['goodresto_enovathemes']['event-slug']) : 'event';

		$labels = array(
			'name'               => esc_html__('Events', 'enovathemes-addons'),
			'singular_name'      => esc_html__('Event', 'enovathemes-addons'),
			'add_new'            => esc_html__('Add new', 'enovathemes-addons'),
			'add_new_item'       => esc_html__('Add new event', 'enovathemes-addons'),
			'edit_item'          => esc_html__('Edit event', 'enovathemes-addons'),
			'new_item'           => esc_html__('New event', 'enovathemes-addons'),
			'all_items'          => esc_html__('All events', 'enovathemes-addons'),
			'view_item'          => esc_html__('View event', 'enovathemes-addons'),
			'search_items'       => esc_html__('Search events', 'enovathemes-addons'),
			'not_found'          => esc_html__('No events found', 'enovathemes-addons'),
			'not_found_in_trash' => esc_html__('No events found in trash', 'enovathemes-addons'), 
			'parent_item_colon'  => '',
			'menu_name'          => esc_html__('Event', 'enovathemes-addons')
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true, 
			'show_in_menu'       => true, 
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $slug,'with_front' => false ),
			'capability_type'    => 'post',
			'has_archive'        => true, 
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'          => 'dashicons-megaphone',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		);

		register_post_type( 'et-event', $args );
	}

	add_action( 'init', 'enovathemes_addons_event' );

	function enovathemes_addons_event_taxonomies() {

		global $goodresto_enovathemes;
		$category_slug = (isset($GLOBALS['goodresto_enovathemes']['event-cat-slug']) && !empty($GLOBALS['goodresto_enovathemes']['event-cat-slug'])) ? esc_attr($GLOBALS['goodresto_enovathemes']['event-cat-slug']) : 'event-category';

		register_taxonomy('event-category', 'et-event', array(
			'hierarchical' => true,
			'labels' => array(
				'name' 				=> esc_html__( 'Category', 'enovathemes-addons' ),
				'singular_name' 	=> esc_html__( 'Category', 'enovathemes-addons' ),
				'search_items' 		=> esc_html__( 'Search category', 'enovathemes-addons' ),
				'all_items' 		=> esc_html__( 'All categories', 'enovathemes-addons' ),
				'parent_item' 		=> esc_html__( 'Parent category', 'enovathemes-addons' ),
				'parent_item_colon' => esc_html__( 'Parent category', 'enovathemes-addons' ),
				'edit_item' 		=> esc_html__( 'Edit category', 'enovathemes-addons' ),
				'update_item' 		=> esc_html__( 'Update category', 'enovathemes-addons' ),
				'add_new_item' 		=> esc_html__( 'Add new category', 'enovathemes-addons' ),
				'new_item_name' 	=> esc_html__( 'New category', 'enovathemes-addons' ),
				'menu_name' 		=> esc_html__( 'Categories', 'enovathemes-addons' ),
			),
			'rewrite' => array(
				'slug' 		   => $category_slug,
				'with_front'   => true,
				'hierarchical' => true
			),
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_admin_column' => true
		));

	}
	add_action( 'init', 'enovathemes_addons_event_taxonomies', 0 );

	add_filter("manage_edit-et-event_columns", "enovathemes_addons_event_edit_columns");

	function enovathemes_addons_event_edit_columns($columns){

		$columns['cb']             = "<input type=\"checkbox\" />";
		$columns['image']          = esc_html__("Thumbnail", 'enovathemes-addons');
		$columns['title']          = esc_html__("Title", 'enovathemes-addons');
		$columns['event-date']     = esc_html__("Event date", 'enovathemes-addons');
		$columns['event-status']   = esc_html__("Event status", 'enovathemes-addons');
		$columns['format']         = esc_html__("Format", 'enovathemes-addons');

		unset($columns['comments']);
		return $columns;
	}

	add_action("manage_et-event_posts_custom_column", "enovathemes_addons_event_custom_columns");

	function enovathemes_addons_event_custom_columns($column){
		global $post;
		$values          = get_post_custom();
		$format          = isset($values["format"][0]) ? $values["format"][0] : "gallery";
		$event_date      = isset( $values['event_date'][0] ) ? esc_attr( $values["event_date"][0] ) : "";
		$booking_closed  = isset( $values['$booking_closed'][0] ) ? esc_attr( $values["$booking_closed"][0] ) : "false";

		$date       = new DateTime($values["event_date"][0]);
		$today      = new DateTime();

		$date  = $date->format('F j, Y');
		$today = $today->format('F j, Y');

		if ($date < $today) {
			$booking_closed = "true";
		}

		switch ($column){


			case "image":

				if (has_post_thumbnail()){
					echo '<a href="'.get_edit_post_link($post->ID).'">'.get_the_post_thumbnail($post->ID,'thumbnail').'</a>';
				}
				
			break;

			case "format":


				switch ($format) {
					case 'gallery':
						echo '<span class="post-state-format post-format-icon post-format-gallery"></span>';
						break;
					case 'audio':
						echo '<span class="post-state-format post-format-icon post-format-audio"></span>';
						break;
					case 'video':
						echo '<span class="post-state-format post-format-icon post-format-video"></span>';
						break;
				}
			
			break;

			case "event-date":

				echo date_format(date_create($event_date),"F j, Y");
			
			break;

			case "event-status":

				if ($booking_closed == "true") {
					echo '<div class="custom-meta-ind gallery_type">'.esc_html__("Closed", "enovathemes-addons").'</div>';
				} else {
					echo '<div class="custom-meta-ind layout">'.esc_html__("Open", "enovathemes-addons").'</div>';
				}
			
			break;

		}
	}
?>