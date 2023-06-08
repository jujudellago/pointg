<?php

	function enovathemes_addons_menu() {

		global $goodresto_enovathemes;
		$slug = (isset($GLOBALS['goodresto_enovathemes']['menu-slug']) && !empty($GLOBALS['goodresto_enovathemes']['menu-slug'])) ? esc_attr($GLOBALS['goodresto_enovathemes']['menu-slug']) : 'menu';

		$labels = array(
			'name'               => esc_html__('Menu', 'enovathemes-addons'),
			'singular_name'      => esc_html__('Menu item', 'enovathemes-addons'),
			'add_new'            => esc_html__('Add new item', 'enovathemes-addons'),
			'add_new_item'       => esc_html__('Add new item', 'enovathemes-addons'),
			'edit_item'          => esc_html__('Edit item', 'enovathemes-addons'),
			'new_item'           => esc_html__('New item', 'enovathemes-addons'),
			'all_items'          => esc_html__('All menu', 'enovathemes-addons'),
			'view_item'          => esc_html__('View item', 'enovathemes-addons'),
			'search_items'       => esc_html__('Search menu items', 'enovathemes-addons'),
			'not_found'          => esc_html__('No item found', 'enovathemes-addons'),
			'not_found_in_trash' => esc_html__('No item found in trash', 'enovathemes-addons'), 
			'parent_item_colon'  => '',
			'menu_name'          => esc_html__('Menu', 'enovathemes-addons')
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
			'menu_icon'          => 'dashicons-carrot',
			'supports'           => array( 'title', 'thumbnail',),
		);

		register_post_type( 'menu', $args );
	}

	add_action( 'init', 'enovathemes_addons_menu' );

	function enovathemes_addons_menu_taxonomies() {

		global $goodresto_enovathemes;
		$category_slug = (isset($GLOBALS['goodresto_enovathemes']['menu-cat-slug']) && !empty($GLOBALS['goodresto_enovathemes']['menu-cat-slug'])) ? esc_attr($GLOBALS['goodresto_enovathemes']['menu-cat-slug']) : 'menu-category';

		register_taxonomy('menu-category', 'menu', array(
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
	add_action( 'init', 'enovathemes_addons_menu_taxonomies', 0 );


	add_filter("manage_edit-menu_columns", "enovathemes_addons_menu_edit_columns");

	function enovathemes_addons_menu_edit_columns($columns){

		$columns['cb']         = "<input type=\"checkbox\" />";
		$columns['image']      = esc_html__("Thumbnail", 'enovathemes-addons');
		$columns['title']      = esc_html__("Title", 'enovathemes-addons');
		$columns['price']      = esc_html__("Price", 'enovathemes-addons');
		$columns['additional'] = esc_html__("Additional", 'enovathemes-addons');

		unset($columns['comments']);
		return $columns;
	}

	add_action("manage_menu_posts_custom_column", "enovathemes_addons_menu_custom_columns");

	function enovathemes_addons_menu_custom_columns($column){

		global $post;
		$values          = get_post_custom();
	    $menu_price      = isset( $values['menu_price'][0] ) ? esc_attr( $values["menu_price"][0] ) : "";
	    $menu_spicy      = isset( $values['menu_spicy'][0] ) ? esc_attr( $values["menu_spicy"][0] ) : "false";
	    $menu_vegetarian = isset( $values['menu_vegetarian'][0] ) ? esc_attr( $values["menu_vegetarian"][0] ) : "false";
	    $menu_gluten     = isset( $values['menu_gluten'][0] ) ? esc_attr( $values["menu_gluten"][0] ) : "false";

		switch ($column){


			case "image":

				if (has_post_thumbnail()){
					echo '<a href="'.get_edit_post_link($post->ID).'">'.get_the_post_thumbnail($post->ID,'thumbnail').'</a>';
				}
				
			break;

			case "price":

				echo $menu_price;
			
			break;

			case "additional":

				if ($menu_spicy == "true") {
					echo '<span class="custom-meta-ind gallery_type">'.esc_html__("Spicy", "enovathemes-addons").'</span>';
				}

				if ($menu_vegetarian == "true") {
					echo '<span class="custom-meta-ind layout">'.esc_html__("Vegetarian", "enovathemes-addons").'</span>';
				}

				if ($menu_gluten == "true") {
					echo '<span class="custom-meta-ind">'.esc_html__("Gluten", "enovathemes-addons").'</span>';
				}
			
			break;

		}
	}

?>