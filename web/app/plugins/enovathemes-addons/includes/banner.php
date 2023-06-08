<?php

	function enovathemes_addons_banner() {

		$labels = array(
			'name'               => esc_html__('Banners', 'enovathemes-addons'),
			'singular_name'      => esc_html__('Banners', 'enovathemes-addons'),
			'add_new'            => esc_html__('Add new', 'enovathemes-addons'),
			'add_new_item'       => esc_html__('Add new banner', 'enovathemes-addons'),
			'edit_item'          => esc_html__('Edit banner', 'enovathemes-addons'),
			'new_item'           => esc_html__('New banner', 'enovathemes-addons'),
			'all_items'          => esc_html__('All banners', 'enovathemes-addons'),
			'view_item'          => esc_html__('View banner', 'enovathemes-addons'),
			'search_items'       => esc_html__('Search banner', 'enovathemes-addons'),
			'not_found'          => esc_html__('No banner found', 'enovathemes-addons'),
			'not_found_in_trash' => esc_html__('No banner found in trash', 'enovathemes-addons'), 
			'parent_item_colon'  => '',
			'menu_name'          => esc_html__('Banners', 'enovathemes-addons')
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'exclude_from_search'=> true,
			'show_ui'            => true, 
			'show_in_menu'       => true, 
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'banner','with_front' => false ),
			'capability_type'    => 'post',
			'has_archive'        => false, 
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'          => 'dashicons-welcome-view-site',
			'supports'           => array( 'title', 'editor'),
		);

		register_post_type( 'banner', $args );
	}

	add_action( 'init', 'enovathemes_addons_banner' );

	add_filter("manage_edit-banner_columns", "enovathemes_addons_banner_edit_columns");
	function enovathemes_addons_banner_edit_columns($columns){
		$columns['cb']             = "<input type=\"checkbox\" />";
		$columns['title']          = esc_html__("Title", 'enovathemes-addons');
		$columns['active']         = esc_html__("Active banner", 'enovathemes-addons');

		unset($columns['comments']);
		return $columns;
	}

	add_action("manage_banner_posts_custom_column", "enovathemes_addons_banner_custom_columns");
	function enovathemes_addons_banner_custom_columns($column){
		global $post;
		
		$banner_settings   = get_option('banner_settings');
		$banner_id         = isset($banner_settings["banner_id"]) ? $banner_settings["banner_id"] : "none";



		switch ($column){
			case "active":
			if ($banner_id == $post->ID) {
				echo '<div class="custom-meta-ind active-banner">'.esc_html__("Active", 'enovathemes-addons').'</div>';
			}
			break;
		}
	}


	add_action( 'admin_menu', 'banner_settings' );
	function banner_settings(){
		add_submenu_page(
			'edit.php?post_type=banner',
			esc_html__( 'Chose banner', 'enovathemes-addons'),
			esc_html__( 'Chose banner', 'enovathemes-addons'),
			'administrator',
			'banner_settings',
			'render_banner_settings'
		);
	}

	function render_banner_settings(){	
	?>
		<?php settings_errors(); ?>
		<form class="enovathemes-banner-settings" method="post" action="options.php">
			<?php
				settings_fields( 'banner_settings' );
				do_settings_sections( 'banner_settings' );
				submit_button();
			?>
		</form>
	<?php }
	
	function banner_default_settings(){
		$defaults = array(
			'banner_id'      => 'none',
		);
		return apply_filters( 'banner_default_settings', $defaults );
	}

	function initialize_banner_settings (){

		if( false == get_option( 'banner_settings' ) ) {	
			add_option( 'banner_settings', apply_filters( 'banner_default_settings', banner_default_settings() ) );
		}

		add_settings_section( 
	        'banner_settings_section',
	        esc_html__( 'Chose banner', 'enovathemes-addons'),
	        'banner_settings_callback',
	        'banner_settings'
	    );

		add_settings_field(	
			'banner_id',
			esc_html__( 'Banner name:', 'enovathemes-addons'),
			'banner_id_callback',
			'banner_settings',
			'banner_settings_section',
			array(esc_html__('Choose banner name, default is none', 'enovathemes-addons'))
		);

		register_setting(  
	        'banner_settings',  
	        'banner_settings'  
	    );
		
	}
	add_action( 'admin_init', 'initialize_banner_settings' );

	function banner_settings_callback() {  
	    echo '<hr>';  
	}

	function banner_id_callback($args) {

		$settings = get_option('banner_settings');

		if(!isset($settings['banner_id'])) {
			$settings['banner_id'] = "none";
		}

		$output = "";

		$output .= '<div id="banner-id">';
			$output .= '<select id="banner_settings[banner_id]" name="banner_settings[banner_id]" >';
				
				global $post;

				$banner_query_opt = array( 
					'post_type'=> 'banner', 
					'orderby' => 'title',
					'order'   => 'ASC' 
				);

				$output .= '<option value="none">'.esc_html__('None', 'enovathemes-addons').'</option>';

				$et_banner = new WP_Query($banner_query_opt);

				if($et_banner->have_posts()){
					while ($et_banner->have_posts()) {
						$et_banner->the_post();
						$output .= '<option value="'.$post->ID.'"'.selected( $settings['banner_id'], $post->ID, false) . '>'.$post->post_title.'</option>';
					}
				}
				wp_reset_postdata();
			$output .= '</select>';
			$output .= '<p>'.$args[0].'</p>';
		$output .= '</div>';
		echo $output;
	     
	}
?>