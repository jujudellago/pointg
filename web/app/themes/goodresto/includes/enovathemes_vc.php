<?php

vc_disable_frontend();

vc_remove_param('vc_section', 'full_width');
vc_remove_param('vc_row', 'full_width');
vc_remove_param('vc_row_inner', 'gap');
vc_remove_param('vc_row', 'gap');
vc_remove_param('vc_row', 'parallax');
vc_remove_param('vc_row', 'parallax_image');
vc_remove_param('vc_row', 'video_bg');
vc_remove_param('vc_row', 'video_bg_url');
vc_remove_param('vc_row', 'video_bg_parallax');
vc_remove_param('vc_row', 'parallax_speed_bg');
vc_remove_param('vc_row', 'parallax_speed_video');

vc_add_param('vc_row', array(
	'type'       => 'dropdown',
	'heading'    => esc_html__( 'Row stretch', 'goodresto' ),
	'param_name' => 'full_width',
	'value'      => array(
		esc_html__( 'No stretching', 'goodresto' )           => 'stretch_no',
		esc_html__( 'Stretch row', 'goodresto' )             => 'stretch_row',
		esc_html__( 'Stretch row and content', 'goodresto' ) => 'stretch_row_content',
	),
	'weight' => 1,
	'description' => esc_html__( '"No stretching" alignes the row with the main theme container, "Stretch row" makes the row full width, but keeps the content of the row aligned with theme main theme container, "Stretch row and content" makes the row and content full width', 'goodresto' )
));


vc_add_param('vc_row', array(
	'type'       => 'dropdown',
	'heading'    => esc_html__( 'Columns gap', 'goodresto' ),
	'param_name' => 'gap',
	'weight'     => 1,
	'value'      => array(
		esc_html__('0px', 'goodresto')    => '0', 
		esc_html__('2px', 'goodresto')    => '2', 
		esc_html__('4px', 'goodresto')    => '4', 
		esc_html__('8px', 'goodresto')    => '8', 
		esc_html__('16px', 'goodresto')   => '16', 
		esc_html__('24px', 'goodresto')   => '24', 
		esc_html__('32px', 'goodresto')   => '32', 
		esc_html__('40px', 'goodresto')   => '40', 
		esc_html__('48px', 'goodresto')   => '48', 
		esc_html__('56px', 'goodresto')   => '56', 
		esc_html__('64px', 'goodresto')   => '64', 
		esc_html__('72px', 'goodresto')   => '72', 
		esc_html__('80px', 'goodresto')   => '80', 
	),
	'std' => '24'
));

vc_add_param('vc_row_inner', array(
	'type'       => 'dropdown',
	'heading'    => esc_html__( 'Columns gap', 'goodresto' ),
	'param_name' => 'gap',
	'weight'     => 1,
	'value'      => array(
		esc_html__('0px', 'goodresto')    => '0', 
		esc_html__('2px', 'goodresto')    => '2', 
		esc_html__('4px', 'goodresto')    => '4', 
		esc_html__('8px', 'goodresto')    => '8', 
		esc_html__('16px', 'goodresto')   => '16', 
		esc_html__('24px', 'goodresto')   => '24', 
		esc_html__('32px', 'goodresto')   => '32', 
		esc_html__('40px', 'goodresto')   => '40', 
		esc_html__('48px', 'goodresto')   => '48', 
		esc_html__('56px', 'goodresto')   => '56', 
		esc_html__('64px', 'goodresto')   => '64', 
		esc_html__('72px', 'goodresto')   => '72', 
		esc_html__('80px', 'goodresto')   => '80', 
	),
));

vc_add_param('vc_row', array(
	'type'       => 'checkbox',
	'heading'    => esc_html__( 'Parallax', 'goodresto' ),
	'param_name' => 'parallax',
	'group'      => esc_html__('Parallax','goodresto'),
));

vc_add_param('vc_row', array(
	'type'       => 'attach_image',
	'group'      => esc_html__('Parallax','goodresto'),
	'heading'    => esc_html__( 'Parallax image', 'goodresto' ),
	'param_name' => 'parallax_image',
	'dependency' => Array('element' => 'parallax', 'value' => 'true')
));

vc_add_param('vc_row', array(
	'type'       => 'textfield',
	'group'      => esc_html__('Parallax','goodresto'),
	'heading'    => esc_html__( 'Parallax speed', 'goodresto' ),
	'param_name' => 'parallax_speed_bg',
	'description'=> esc_html__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)','goodresto'),
	'dependency' => Array('element' => 'parallax', 'value' => 'true'),
	'default'    => '1.5'
));

vc_add_param('vc_row', array(
	'type'       => 'checkbox',
	'heading'    => esc_html__( 'Video background', 'goodresto' ),
	'param_name' => 'video_bg',
	'group'      => esc_html__('Video','goodresto'),
));

vc_add_param('vc_row', array(
	'type'       => 'textfield',
	'group'      => esc_html__('Video','goodresto'),
	'heading'    => esc_html__( 'Video background mp4 file url', 'goodresto' ),
	'param_name' => 'video_bg_mp4',
	'dependency' => Array('element' => 'video_bg', 'value' => 'true')
));

vc_add_param('vc_row', array(
	'type'       => 'textfield',
	'group'      => esc_html__('Video','goodresto'),
	'heading'    => esc_html__( 'Video background webm file url', 'goodresto' ),
	'param_name' => 'video_bg_webm',
	'dependency' => Array('element' => 'video_bg', 'value' => 'true')
));

vc_add_param('vc_row', array(
	'type'       => 'textfield',
	'group'      => esc_html__('Video','goodresto'),
	'heading'    => esc_html__( 'Video background ogv file url', 'goodresto' ),
	'param_name' => 'video_bg_ogv',
	'dependency' => Array('element' => 'video_bg', 'value' => 'true')
));

vc_add_param('vc_row', array(
	'type'       => 'attach_image',
	'group'      => esc_html__('Video','goodresto'),
	'heading'    => esc_html__( 'Video overlay', 'goodresto' ),
	'param_name' => 'video_overlay',
	'dependency' => Array('element' => 'video_bg', 'value' => 'true')
));

vc_add_param('vc_row', array(
	'type'       => 'attach_image',
	'group'      => esc_html__('Video','goodresto'),
	'heading'    => esc_html__( 'Video placeholder', 'goodresto' ),
	'param_name' => 'video_placeholder',
	'dependency' => Array('element' => 'video_bg', 'value' => 'true')
));

vc_add_param('vc_row', array(
	'type'       => 'checkbox',
	'heading'    => esc_html__( 'Video parallax', 'goodresto' ),
	'param_name' => 'video_bg_parallax',
	'group'      => esc_html__('Video','goodresto'),
	'dependency' => Array(
		'element' => 'video_bg', 'value' => 'true',

	)
));

vc_add_param('vc_row', array(
	'type'       => 'textfield',
	'group'      => esc_html__('Video','goodresto'),
	'heading'    => esc_html__( 'Video background parallax speed', 'goodresto' ),
	'param_name' => 'parallax_speed_video',
	'description'=> esc_html__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)','goodresto'),
	'dependency' => Array(
		'element' => 'video_bg_parallax', 'value' => 'true',
	),
	'default'    => '1.5'
));

vc_add_param('vc_row', array(
	'type'       => 'checkbox',
	'heading'    => esc_html__( 'Fixed background', 'goodresto' ),
	'group'      => esc_html__('Fixed','goodresto'),
	'param_name' => 'fixed_bg',
));

vc_add_param('vc_row', array(
	'type'       => 'attach_image',
	'heading'    => esc_html__( 'Fixed background image', 'goodresto' ),
	'group'      => esc_html__('Fixed','goodresto'),
	'param_name' => 'fixed_bg_image',
	'dependency' => Array('element' => 'fixed_bg', 'value' => 'true')
));


vc_add_param('vc_row', array(
	'type'       => 'checkbox',
	'heading'    => esc_html__( 'Animated background', 'goodresto' ),
	'group'      => esc_html__('Animated','goodresto'),
	'param_name' => 'animated_bg',
));

vc_add_param('vc_row', array(
	'type'       => 'dropdown',
	'heading'    => esc_html__( 'Animated background direction', 'goodresto' ),
	'group'      => esc_html__('Animated','goodresto'),
	'param_name' => 'animated_bg_dir',
	'value'     => array(
		esc_html__('Horizontal','goodresto')  => 'horizontal',
		esc_html__('Vertical','goodresto')  => 'vertical',
	),
	'dependency' => Array('element' => 'animated_bg', 'value' => 'true')
));

vc_add_param('vc_row', array(
	'type'       => 'textfield',
	'heading'    => esc_html__( 'Animated background speed in ms (default is 35000)', 'goodresto' ),
	'group'      => esc_html__('Animated','goodresto'),
	'param_name' => 'animated_bg_speed',
	'dependency' => Array('element' => 'animated_bg', 'value' => 'true')
));

vc_add_param('vc_row', array(
	'type'       => 'attach_image',
	'heading'    => esc_html__( 'Animated background image', 'goodresto' ),
	'group'      => esc_html__('Animated','goodresto'),
	'param_name' => 'animated_bg_image',
	'dependency' => Array('element' => 'animated_bg', 'value' => 'true')
));

$animation_delay_values = array();

for ($i=0; $i <= 1000; $i = $i + 50) { 
	$animation_delay_values[$i.esc_html__('ms', 'goodresto')] = $i;
}

vc_add_param('vc_column', array(
	'type'       => 'dropdown',
	'heading'    => esc_html__( 'Animation delay in ms (example 300)', 'goodresto' ),
	'param_name' => 'animation_delay',
	'weight'     => 1,
	'value'      => $animation_delay_values
));

vc_add_param('vc_row', array(
	'type'       => 'checkbox',
	'heading'    => esc_html__( 'Transitions', 'goodresto' ),
	'param_name' => 'transitions',
	'group'      => esc_html__('Transitions','goodresto'),
));

vc_add_param('vc_row', array(
	'type'       => 'attach_image',
	'group'      => esc_html__('Transitions','goodresto'),
	'heading'    => esc_html__( 'Upload image', 'goodresto' ),
	'param_name' => 'transitions_image',
	'dependency' => Array('element' => 'transitions', 'value' => 'true')
));

vc_add_param('vc_row', array(
	'type'       => 'dropdown',
	'heading'    => esc_html__( 'Transition type', 'goodresto' ),
	'group'      => esc_html__('Transitions','goodresto'),
	'param_name' => 'transitions_type',
	'value'     => array(
		esc_html__('Fade','goodresto')        => 'fade',
		esc_html__('Scale down','goodresto')  => 'scale',
		esc_html__('Zoom','goodresto')        => 'zoom',
	),
	'dependency' => Array('element' => 'transitions', 'value' => 'true')
));

vc_remove_param('vc_column', 'parallax');
vc_remove_param('vc_column', 'parallax_image');
vc_remove_param('vc_column', 'video_bg');
vc_remove_param('vc_column', 'video_bg_url');
vc_remove_param('vc_column', 'video_bg_parallax');
vc_remove_param('vc_column', 'parallax_speed_bg');
vc_remove_param('vc_column', 'parallax_speed_video');

vc_add_param('vc_column', array(
	'type'       => 'checkbox',
	'heading'    => esc_html__( 'Parallax', 'goodresto' ),
	'param_name' => 'parallax',
	'group'      => esc_html__('Parallax','goodresto'),
));

vc_add_param('vc_column', array(
	'type'       => 'attach_image',
	'group'      => esc_html__('Parallax','goodresto'),
	'heading'    => esc_html__( 'Parallax image', 'goodresto' ),
	'param_name' => 'parallax_image',
	'dependency' => Array('element' => 'parallax', 'value' => 'true')
));

vc_add_param('vc_column', array(
	'type'       => 'textfield',
	'group'      => esc_html__('Parallax','goodresto'),
	'heading'    => esc_html__( 'Parallax speed', 'goodresto' ),
	'param_name' => 'parallax_speed_bg',
	'description'=> esc_html__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)','goodresto'),
	'dependency' => Array('element' => 'parallax', 'value' => 'true'),
	'default'    => '1.5'
));


vc_add_param('vc_column', array(
	'type'       => 'checkbox',
	'heading'    => esc_html__( 'Transitions', 'goodresto' ),
	'param_name' => 'transitions',
	'group'      => esc_html__('Transitions','goodresto'),
));

vc_add_param('vc_column', array(
	'type'       => 'attach_image',
	'group'      => esc_html__('Transitions','goodresto'),
	'heading'    => esc_html__( 'Upload image', 'goodresto' ),
	'param_name' => 'transitions_image',
	'dependency' => Array('element' => 'transitions', 'value' => 'true')
));

vc_add_param('vc_column', array(
	'type'       => 'dropdown',
	'heading'    => esc_html__( 'Transition type', 'goodresto' ),
	'group'      => esc_html__('Transitions','goodresto'),
	'param_name' => 'transitions_type',
	'value'     => array(
		esc_html__('Fade','goodresto')        => 'fade',
		esc_html__('Scale down','goodresto')  => 'scale',
		esc_html__('Zoom','goodresto')        => 'zoom',
	),
	'dependency' => Array('element' => 'transitions', 'value' => 'true')
));

function goodresto_enovathemes_remove_woocommerce() {
    if (class_exists('Woocommerce')) {
        vc_remove_element( 'recent_products' );
		vc_remove_element( 'featured_products' );
		vc_remove_element( 'product' );
		vc_remove_element( 'products' );
		vc_remove_element( 'product_category' );
		vc_remove_element( 'product_categories' );
		vc_remove_element( 'sale_products' );
		vc_remove_element( 'best_selling_products' );
		vc_remove_element( 'top_rated_products' );
		vc_remove_element( 'related_products' );
		vc_remove_element( 'product_attribute' );
    }
}
add_action( 'vc_build_admin_page', 'goodresto_enovathemes_remove_woocommerce', 11 );
add_action( 'vc_load_shortcode', 'goodresto_enovathemes_remove_woocommerce', 11 );

if (defined( 'ENOVATHEMES_ADDONS' ) && file_exists( get_parent_theme_file_path('/plugins/enovathemes-addons.zip')) ) {
	add_action( 'init', 'goodresto_enovathemes_integrateVC');
    function goodresto_enovathemes_integrateVC() {

    	$animation_delay_values = array();

		for ($i=0; $i <= 1000; $i = $i + 50) { 
			$animation_delay_values[$i.esc_html__('ms', 'goodresto')] = $i;
		}

    	$order_by_values = array(
			esc_html__( 'Date', 'goodresto' ) => 'date',
			esc_html__( 'ID', 'goodresto' ) => 'ID',
			esc_html__( 'Author', 'goodresto' ) => 'author',
			esc_html__( 'Title', 'goodresto' ) => 'title',
			esc_html__( 'Modified', 'goodresto' ) => 'modified',
			esc_html__( 'Random', 'goodresto' ) => 'rand',
			esc_html__( 'Comment count', 'goodresto' ) => 'comment_count',
			esc_html__( 'Menu order', 'goodresto' ) => 'menu_order',
		);

		$order_way_values = array(
			esc_html__( 'Descending', 'goodresto' ) => 'DESC',
			esc_html__( 'Ascending', 'goodresto' ) => 'ASC',
		);

		$operator_values = array(
			esc_html__( 'IN', 'goodresto' ) => 'IN',
			esc_html__( 'NOT IN', 'goodresto' ) => 'NOT IN',
			esc_html__( 'AND', 'goodresto' ) => 'AND',
		);

		$animation_values = array(
			esc_html__('None', 'goodresto')     => 'none',
			esc_html__('Fade In', 'goodresto')  => 'fadeIn',
			esc_html__('Move Up', 'goodresto')  => 'moveUp',
		);

		$size_values_box = array(
			esc_html__('Small (1/4 - 25%)', 'goodresto')        => 'small', 
			esc_html__('Medium (1/3 - 33%)', 'goodresto')       => 'medium',
			esc_html__('Large (1/2 - 50%)', 'goodresto')        => 'large'
		);

		$size_values_default = array(
			esc_html__('Small', 'goodresto')        => 'small', 
			esc_html__('Medium', 'goodresto')       => 'medium',
			esc_html__('Large', 'goodresto')        => 'large'
		);

		$size_values_extra = array(
			esc_html__('Extra small', 'goodresto')  => 'extra-small', 
			esc_html__('Small', 'goodresto')        => 'small', 
			esc_html__('Medium', 'goodresto')       => 'medium',
			esc_html__('Large', 'goodresto')        => 'large',
			esc_html__('Extra large', 'goodresto')  => 'large-x',
			esc_html__('Extra Extra large', 'goodresto')  => 'large-xx'
		);

		$font_weight_values = array(
			'100'  => '100', 
			'200'  => '200', 
			'300'  => '300', 
			'400'  => '400', 
			'500'  => '500', 
			'600'  => '600', 
			'700'  => '700', 
			'800'  => '800', 
			'900'  => '900',
		);

		$align_values = array(
			esc_html__('Left','goodresto')   => 'left', 
			esc_html__('Right','goodresto')  => 'right', 
			esc_html__('Center','goodresto') => 'center'
		);

		$logic_values = array(
			esc_html__('False','goodresto')   => 'false', 
			esc_html__('True','goodresto')  => 'true', 
		);

		$animation_type_values = array(
			esc_html__('None', 'goodresto')       => 'none',
			esc_html__('Sequential','goodresto')  => 'sequential',
			esc_html__('Random','goodresto')      => 'random'
		);

		$image_size_values = array(
			'full'      => 'full',
			'thumbnail' => 'thumbnail',
			'goodresto_1200X440' => 'goodresto_1200X440',
			'goodresto_960X600'  => 'goodresto_960X600',
			'goodresto_870X440'  => 'goodresto_870X440',
			'goodresto_870X530'  => 'goodresto_870X530',
			'goodresto_640X400'  => 'goodresto_640X400',
			'goodresto_588X588'  => 'goodresto_588X588',
			'goodresto_588X440'  => 'goodresto_588X440',
			'goodresto_480X300'  => 'goodresto_480X300',
			'goodresto_384X384'  => 'goodresto_384X384',
			'goodresto_384X288'  => 'goodresto_384X288',
			'goodresto_282X282'  => 'goodresto_282X282',
			'goodresto_282X212'  => 'goodresto_282X212'
		);

		$image_overlay_values = array(
			esc_html__('Overlay none','goodresto') 						 => 'overlay-none',
			esc_html__('Overlay fade','goodresto') 						 => 'overlay-fade',
			esc_html__('Overlay fade with image zoom','goodresto')         => 'overlay-fade-zoom',
			esc_html__('Overlay fade with extreme image zoom','goodresto') => 'overlay-fade-zoom-extreme',
			esc_html__('Overlay move fluid','goodresto')                   => 'overlay-move',
			esc_html__('Overlay scale in','goodresto')                     => 'overlay-scale-in',
			esc_html__('Transform','goodresto')                            => 'transform'
		);

		$image_caption_values = array(
			esc_html__('Caption up','goodresto') => 'caption-up',
		);

		$layout_type_values = array(
			esc_html__('Grid', 'goodresto')     => 'grid', 
			esc_html__('Carousel', 'goodresto') => 'carousel', 
		);

		$gap_values = array();

		for ($i=0; $i <= 80; $i = $i + 2) { 
			$gap_values[$i.esc_html__('px', 'goodresto')] = $i;
		}

		$social_links_array = array(
			'youtube',
			'vk',
			'tripadvisor',
			'google',
			'facebook',
			'instagram',
			'twitter',
			'vimeo',
			'dribbble',
			'behance',
			'apple',
			'android',
			'skype',
			'linkedin',
			'pinterest',
			'email'
		);

		/* signature
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Signature','goodresto'),
	    		'description'             => esc_html__('Insert animate signature','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_signature',
	    		'class'                   => 'et_signature',
	    		'icon'                    => 'et_signature',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
					array(
						'type'       => 'textarea_raw_html',
						'heading'    => esc_html__('Paste the svg code here','goodresto'),
						'param_name' => 'content',
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Color','goodresto'),
						'param_name' => 'color',
						'value'      => '#212121'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Width in px (without any string)','goodresto'),
						'param_name' => 'width',
						'value'      => '',
					),
					array(
						'param_name'=>'align',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Align', 'goodresto'), 
						'value'     => $align_values
					),
	    		)
	    	));

		/* typeit
		---------------*/

			for ($i=1; $i <= 5 ; $i++) { 
				vc_add_param('et_typeit', array(
					'type'       => 'textfield',
					'heading'    => 'String #'.$i,
					'param_name' => 'string_'.$i,
					'value'      => ''
				));
			}

			vc_map(array(
	    		'name'                    => esc_html__('Typeit','goodresto'),
	    		'description'             => esc_html__('Insert animate typewrite','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_typeit',
	    		'class'                   => 'et_typeit',
	    		'icon'                    => 'et_typeit',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'param_name'=>'type',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Typeit type', 'goodresto'), 
						'group'      => esc_html__('Typography','goodresto'),
						'value'     => array(
							esc_html__('H1', 'goodresto')  => 'h1', 
							esc_html__('H2', 'goodresto')  => 'h2', 
							esc_html__('H3', 'goodresto')  => 'h3', 
							esc_html__('H4', 'goodresto')  => 'h4', 
							esc_html__('H5', 'goodresto')  => 'h5', 
							esc_html__('H6', 'goodresto')  => 'h6', 
							esc_html__('p', 'goodresto')   => 'p', 
						),
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Font size (without any string)','goodresto'),
						'group'      => esc_html__('Typography','goodresto'),
						'param_name' => 'font_size',
						'value'      => '',
					),
					array(
						'param_name'=>'font_weight',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Font weight (without any string)', 'goodresto'),
						'group'     => esc_html__('Typography','goodresto'), 
						'value'     => $font_weight_values,
						'std' => '400'
					),
					array(
						'type'       => 'textfield',
						'group'      => esc_html__('Typography','goodresto'),
						'heading'    => esc_html__('Line height (without any string)','goodresto'),
						'param_name' => 'line_height',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'group'      => esc_html__('Typography','goodresto'),
						'heading'    => esc_html__('Letter spacing (without any string)','goodresto'),
						'param_name' => 'letter_spacing',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Color','goodresto'),
						'param_name' => 'color',
						'value'      => '#d3a471'
					),
					array(
						'param_name'=>'align',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Text align', 'goodresto'), 
						'value'     => $align_values
					),
					array(
						'param_name'=>'autostart',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Autostart', 'goodresto'), 
						'value'     => $logic_values
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Start delay in ms','goodresto'),
						'param_name' => 'start_delay',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Main title','goodresto'),
						'param_name' => 'main_title',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Custom class','goodresto'),
						'param_name' => 'custom_class',
						'value'      => ''
					),
	    		)
	    	));

		/* separator
		---------------*/

	    	vc_map(array(
				'name'                    => esc_html__('Separator','goodresto'),
				'description'             => esc_html__('Use this element to separate content','goodresto'),
				'category'                => esc_html__('Enovathemes','goodresto'),
				'base'                    => 'et_separator',
				'class'                   => 'et_separator',
				'icon'                    => 'et_separator',
				'show_settings_on_create' => true,
				'params'                  => array(
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Type','goodresto'),
						'param_name' => 'type',
						'value'      => array(
							esc_html__('solid','goodresto')  => 'solid',
							esc_html__('dotted','goodresto') => 'dotted',
							esc_html__('dashed','goodresto') => 'dashed',
						)
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Color','goodresto'),
						'param_name' => 'color',
						'value'      => '#e0e0e0'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Gap from top (without any string)','goodresto'),
						'param_name' => 'top',
						'value'      => '24'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Gap from bottom (without any string)','goodresto'),
						'param_name' => 'bottom',
						'value'      => '24'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Width (without any string, if you want 100% leave blank)','goodresto'),
						'param_name' => 'width',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Height (without any string, if you want 1px leave blank)','goodresto'),
						'param_name' => 'height',
						'value'      => ''
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Align','goodresto'),
						'param_name' => 'align',
						'value'      => $align_values
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Animate','goodresto'),
						'param_name' => 'animate',
						'value'      => $logic_values
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Extra class','goodresto'),
						'param_name' => 'class',
						'value'      => ''
					),
				)
			));

	    /* decorative separator
		---------------*/

	    	vc_map(array(
				'name'                    => esc_html__('Decorative separator','goodresto'),
				'description'             => esc_html__('Use this element to separate content','goodresto'),
				'category'                => esc_html__('Enovathemes','goodresto'),
				'base'                    => 'et_separator_decorative',
				'class'                   => 'et_separator_decorative',
				'icon'                    => 'et_separator_decorative',
				'show_settings_on_create' => true,
				'params'                  => array(
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Type','goodresto'),
						'param_name' => 'type',
						'value'      => array(
							esc_html__('separator 1', 'goodresto')  => 'sep1', 
							esc_html__('separator 2', 'goodresto')  => 'sep2', 
							esc_html__('separator 3', 'goodresto')  => 'sep3', 
							esc_html__('separator 4', 'goodresto')  => 'sep4', 
							esc_html__('separator 5', 'goodresto')  => 'sep5', 
							esc_html__('separator 6', 'goodresto')  => 'sep6', 
							esc_html__('separator 7', 'goodresto')  => 'sep7', 
							esc_html__('separator 8', 'goodresto')  => 'sep8', 
							esc_html__('separator 9', 'goodresto')  => 'sep9', 
							esc_html__('separator 10', 'goodresto')  => 'sep10', 
							esc_html__('separator 11', 'goodresto')  => 'sep11', 
							esc_html__('separator 12', 'goodresto')  => 'sep12', 
							esc_html__('separator 13', 'goodresto')  => 'sep13', 
							esc_html__('separator 14', 'goodresto')  => 'sep14', 
							esc_html__('separator 15', 'goodresto')  => 'sep15', 
							esc_html__('separator 16', 'goodresto')  => 'sep16', 
							esc_html__('separator 17', 'goodresto')  => 'sep17', 
						)
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Color','goodresto'),
						'param_name' => 'color',
						'value'      => '#e0e0e0'
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Size','goodresto'),
						'param_name' => 'size',
						'value'      => $size_values_default
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Gap from top (without any string)','goodresto'),
						'param_name' => 'top',
						'value'      => '24'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Gap from bottom (without any string)','goodresto'),
						'param_name' => 'bottom',
						'value'      => '24'
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Align','goodresto'),
						'param_name' => 'align',
						'value'      => $align_values
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Extra class','goodresto'),
						'param_name' => 'class',
						'value'      => ''
					),
				)
			));

	    /* separator icon
		---------------*/

	    	vc_map(array(
				'name'                    => esc_html__('Icon separator','goodresto'),
				'description'             => esc_html__('Use this element to separate content','goodresto'),
				'category'                => esc_html__('Enovathemes','goodresto'),
				'base'                    => 'et_separator_icon',
				'class'                   => 'et_separator_icon',
				'icon'                    => 'et_separator_icon',
				'show_settings_on_create' => true,
				'params'                  => array(
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon prefix','goodresto'),
						'param_name' => 'icon_prefix',
						'value'      => '',
						'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','goodresto')
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon name','goodresto'),
						'param_name' => 'icon_name',
						'value'      => '',
						'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','goodresto')
					),
					array(
						'param_name'=>'icon_size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Icon size', 'goodresto'), 
						'value'     => $size_values_default
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Separator color','goodresto'),
						'param_name' => 'color_sep',
						'value'      => '#e0e0e0'
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon color','goodresto'),
						'param_name' => 'color_icon',
						'value'      => '#d3a471'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Gap from top (without any string)','goodresto'),
						'param_name' => 'top',
						'value'      => '24'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Gap from bottom (without any string)','goodresto'),
						'param_name' => 'bottom',
						'value'      => '24'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Separator width (without any string)','goodresto'),
						'param_name' => 'width',
						'value'      => '120'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Height (without any string, if you want 1px leave blank)','goodresto'),
						'param_name' => 'height',
						'value'      => '1'
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Align','goodresto'),
						'param_name' => 'align',
						'value'      => $align_values
					),
				)
			));

		/* separator decorative
		---------------*/

	    	vc_map(array(
				'name'                    => esc_html__('Dottes separator','goodresto'),
				'description'             => esc_html__('Use this element to separate content','goodresto'),
				'category'                => esc_html__('Enovathemes','goodresto'),
				'base'                    => 'et_separator_dottes',
				'class'                   => 'et_separator_dottes',
				'icon'                    => 'et_separator_dottes',
				'show_settings_on_create' => true,
				'params'                  => array(
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Color','goodresto'),
						'param_name' => 'color',
						'value'      => '#e0e0e0'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Gap from top (without any string)','goodresto'),
						'param_name' => 'top',
						'value'      => '24'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Gap from bottom (without any string)','goodresto'),
						'param_name' => 'bottom',
						'value'      => '24'
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Align','goodresto'),
						'param_name' => 'align',
						'value'      => $align_values
					),
				)
			));

		/* gap
		---------------*/

	    	vc_map(array(
	    		'name'                    => esc_html__('Gap','goodresto'),
	    		'description'             => esc_html__('Insert space','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_gap',
	    		'class'                   => 'et_gap',
	    		'icon'                    => 'et_gap',
	    		'show_settings_on_create' => false,
	    		'params'                  => array(
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Gap size (without any string)','goodresto'),
						'param_name' => 'height',
						'value'      => '32'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Custom class','goodresto'),
						'param_name' => 'custom_class',
						'value'      => ''
					)
	    		)
	    	));

	    	vc_map(array(
	    		'name'                    => esc_html__('Gap inline','goodresto'),
	    		'description'             => esc_html__('Insert horizontal space','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_gap_inline',
	    		'class'                   => 'et_gap_inline',
	    		'icon'                    => 'et_gap_inline',
	    		'show_settings_on_create' => false,
	    		'params'                  => array(
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Gap size (without any string)','goodresto'),
						'param_name' => 'width',
						'value'      => '32'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Custom class','goodresto'),
						'param_name' => 'custom_class',
						'value'      => ''
					)
	    		)
	    	));

	    /* popup
		---------------*/

	    	vc_map(array(
	    		'name'                    => esc_html__('Popup message','goodresto'),
	    		'description'             => esc_html__('Insert popup message with icon','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_popup',
	    		'class'                   => 'et_popup',
	    		'icon'                    => 'et_popup',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon prefix','goodresto'),
						'param_name' => 'icon_prefix',
						'value'      => '',
						'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','goodresto')
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon name','goodresto'),
						'param_name' => 'icon_name',
						'value'      => '',
						'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','goodresto')
					),
					array(
						'param_name'=>'icon_size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Icon size', 'goodresto'), 
						'value'     => $size_values_default
					),
					array(
	    				'type'       => 'textfield',
						'heading'    => esc_html__('Message', 'goodresto'),
						'param_name' => 'message',
						'value'      => 'Your popup message goes here',
					),
					array(
	    				'type'       => 'textfield',
						'heading'    => esc_html__('Message width (without any string)', 'goodresto'),
						'param_name' => 'message_width',
						'value'      => '320',
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon color', 'goodresto'),
						'param_name' => 'icon_color',
						'value'      => '#d3a471'
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Popup color', 'goodresto'),
						'param_name' => 'popup_color',
						'value'      => '#212121'
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Direction', 'goodresto'),
						'param_name' => 'direction',
						'value'      => array(
							esc_html__('Left', 'goodresto')   => 'left',
							esc_html__('Right', 'goodresto')  => 'right',
							esc_html__('Top', 'goodresto')    => 'top',
							esc_html__('Bottom', 'goodresto') => 'bottom'
						)
					)
	    		)
	    	));

	    /* alert
		---------------*/

	    	vc_map(array(
	    		'name'                    => esc_html__('Alert','goodresto'),
	    		'description'             => esc_html__('Insert alert','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_alert',
	    		'class'                   => 'et_alert',
	    		'icon'                    => 'et_alert',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Message type','goodresto'),
						'param_name' => 'type',
						'value'      => array(
							esc_html__('Note','goodresto')        => 'note',
							esc_html__('Success','goodresto')     => 'success',
							esc_html__('Warning','goodresto')     => 'warning',
							esc_html__('Error','goodresto')       => 'error',
							esc_html__('Information','goodresto') => 'information'
						)
					),
					array(
						'type'       => 'textarea',
						'param_name' => 'content',
						'value'      => 'Alert message content goes here'
					)
	    		)
	    	));

	    /* nav menu
		---------------*/

			$menus = get_registered_nav_menus();

	    	vc_map(array(
	    		'name'                    => esc_html__('Navigation menu','goodresto'), 'description'             => esc_html__('Insert navigation menu','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_menu',
	    		'class'                   => 'et_menu',
	    		'icon'                    => 'et_menu',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Menu name','goodresto'),
						'param_name' => 'menu',
						'value'      => array_flip($menus),
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Menu container','goodresto'),
						'param_name' => 'container',
						'value'      => '',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Menu container class','goodresto'),
						'param_name' => 'container_class',
						'value'      => '',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Menu container id','goodresto'),
						'param_name' => 'container_id',
						'value'      => '',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Menu class','goodresto'),
						'param_name' => 'menu_class',
						'value'      => 'menu',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Menu id','goodresto'),
						'param_name' => 'menu_id',
						'value'      => '',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Menu before','goodresto'),
						'param_name' => 'menu_before',
						'value'      => '',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Menu after','goodresto'),
						'param_name' => 'menu_after',
						'value'      => '',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Menu link before','goodresto'),
						'param_name' => 'menu_link_before',
						'value'      => '',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Menu link after','goodresto'),
						'param_name' => 'menu_link_after',
						'value'      => '',
					)
	    		)
	    	));

	    /* social icons
		---------------*/

			foreach ($social_links_array as $social) {
				vc_add_param('et_social_icons', array(
					'type'       => 'textfield',
					'heading'    => ucfirst($social).' link',
					'param_name' => $social,
					'value'      => '',
					'weight' => 1
				));
			}

	    	vc_map(array(
				'name'                    => esc_html__('Social icons','goodresto'),
				'description'             => esc_html__('Use this element to add social service icons','goodresto'),
				'category'                => esc_html__('Enovathemes','goodresto'),
				'base'                    => 'et_social_icons',
				'class'                   => 'et_social_icons',
				'icon'                    => 'et_social_icons',
				'show_settings_on_create' => true,
				'params'                  => array(
					array(
						'param_name'=>'target',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Target', 'goodresto'), 
						'value'     => array(
							'_self'  => '_self',
							'_blank' => '_blank' 
						)
					),
					array(
						'param_name'=>'size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Size', 'goodresto'), 
						'value'     => $size_values_default
					),
					array(
						'param_name'=>'styling_original',
						'type'      => 'dropdown',
						'group'     => esc_html__('Styling','goodresto'), 
						'heading'   => esc_html__('Original styling', 'goodresto'), 
						'value'     => $logic_values
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon color regular','goodresto'),
						'group'     => esc_html__('Styling','goodresto'), 
						'param_name' => 'icon_color_reg',
						'value'      => '#616161',
						'dependency' => Array('element' => 'styling_original', 'value' => 'false')
					),

					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon color hover','goodresto'),
						'group'     => esc_html__('Styling','goodresto'), 
						'param_name' => 'icon_color_hov',
						'value'      => '#212121',
						'dependency' => Array('element' => 'styling_original', 'value' => 'false')
					),

					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon background color regular','goodresto'),
						'group'     => esc_html__('Styling','goodresto'), 
						'param_name' => 'icon_back_color_reg',
						'value'      => '',
						'dependency' => Array('element' => 'styling_original', 'value' => 'false')
					),

					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon background color hover','goodresto'),
						'group'     => esc_html__('Styling','goodresto'), 
						'param_name' => 'icon_back_color_hov',
						'value'      => '',
						'dependency' => Array('element' => 'styling_original', 'value' => 'false')
					),

					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon border color regular','goodresto'),
						'group'     => esc_html__('Styling','goodresto'), 
						'param_name' => 'icon_border_color_reg',
						'value'      => '',
						'dependency' => Array('element' => 'styling_original', 'value' => 'false')
					),

					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon border color hover','goodresto'),
						'group'     => esc_html__('Styling','goodresto'), 
						'param_name' => 'icon_border_color_hov',
						'value'      => '',
						'dependency' => Array('element' => 'styling_original', 'value' => 'false')
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon border radius (without any string)','goodresto'),
						'group'     => esc_html__('Styling','goodresto'), 
						'param_name' => 'icon_border_radius',
						'value'      => '0'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon border width (without any string)','goodresto'),
						'group'     => esc_html__('Styling','goodresto'), 
						'param_name' => 'icon_border_width',
						'value'      => '0',
						'dependency' => Array('element' => 'styling_original', 'value' => 'false')
					)
				)
			));

		/* social share
		---------------*/

	    	vc_map(array(
				'name'                    => esc_html__('Social share','goodresto'),
				'description'             => esc_html__('Use this element to add social share','goodresto'),
				'category'                => esc_html__('Enovathemes','goodresto'),
				'base'                    => 'et_social_share',
				'class'                   => 'et_social_share',
				'icon'                    => 'et_social_share',
				'show_settings_on_create' => true,
				'params'                  => array(
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon color regular','goodresto'),
						'param_name' => 'icon_color_reg',
						'value'      => '#616161'
					),

					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon color hover','goodresto'),
						'param_name' => 'icon_color_hov',
						'value'      => '#d3a471'
					),

					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon background color regular','goodresto'),
						'param_name' => 'icon_back_color_reg',
						'value'      => ''
					),

					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon background color hover','goodresto'),
						'param_name' => 'icon_back_color_hov',
						'value'      => ''
					),

					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon border color regular','goodresto'),
						'param_name' => 'icon_border_color_reg',
						'value'      => ''
					),

					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon border color hover','goodresto'),
						'param_name' => 'icon_border_color_hov',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon border radius (without any string)','goodresto'),
						'param_name' => 'icon_border_radius',
						'value'      => '0'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon border width (without any string)','goodresto'),
						'param_name' => 'icon_border_width',
						'value'      => '0'
					)
				)
			));
    	
	    /* tweets
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Tweets','goodresto'),
	    		'description'             => esc_html__('Insert recent tweets','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_tweets',
	    		'class'                   => 'et_tweets',
	    		'icon'                    => 'et_tweets',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Enter the twitter ID','goodresto'),
						'param_name' => 'twitter_id',
						'value'      => ''
					),
					array(
						'param_name'=>'count',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Number of tweets', 'goodresto'), 
						'value'     => array(
							'1'  => '1',
							'2'  => '2',
							'3'  => '3',
							'4'  => '4',
							'5'  => '5',
							'6'  => '6',
							'7'  => '7',
							'8'  => '8',
							'9'  => '9',
							'10'  => '10'
						)
					),
					array(
	    				'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon color','goodresto'),
						'param_name' => 'icon_color',
						'value'      => '#d3a471',
					),
					array(
	    				'type'       => 'colorpicker',
						'heading'    => esc_html__('Text color','goodresto'),
						'param_name' => 'text_color',
						'value'      => '',
					)
	    		)
	    	));

		/* mailchimp
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Mailchimp','goodresto'),
	    		'description'             => esc_html__('Insert mailchimp subscribe','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_mailchimp',
	    		'class'                   => 'et_mailchimp',
	    		'icon'                    => 'et_mailchimp',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
	    				'type'       => 'checkbox',
						'heading'    => esc_html__('Align to the center', 'goodresto'),
						'param_name' => 'center',
						'value'      => '',
					),
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Action','goodresto'),
						'param_name' => 'action',
						'value'      => '',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Name','goodresto'),
						'param_name' => 'name',
						'value'      => '',
					),
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Email field placeholder text','goodresto'),
						'param_name' => 'email_placeholder',
						'value'      => esc_html__('Enter your email','goodresto'),
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button placeholder text','goodresto'),
						'param_name' => 'button_placeholder',
						'value'      => esc_html__('Subscribe','goodresto'),
					),
	    		)
	    	));

		/* booking
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Booking','goodresto'),
	    		'description'             => esc_html__('Insert AJAX booking form','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_booking',
	    		'class'                   => 'et_booking',
	    		'icon'                    => 'et_booking',
	    		'show_settings_on_create' => false,
	    	));

	    /* icon
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Icon','goodresto'),
	    		'description'             => esc_html__('Insert icon','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_icon',
	    		'class'                   => 'et_icon',
	    		'icon'                    => 'et_icon',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon prefix','goodresto'),
						'param_name' => 'icon_prefix',
						'value'      => '',
						'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','goodresto')
					),
					array(
						'type'       => 'textfield',
						
						'heading'    => esc_html__('Icon name','goodresto'),
						'param_name' => 'icon_name',
						'value'      => '',
						'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','goodresto')
					),
	    			array(
						'param_name'=>'icon_size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Size', 'goodresto'), 
						'value'     => $size_values_extra,
						'std'       => 'medium'
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon color','goodresto'),
						'param_name' => 'icon_color',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon background color','goodresto'),
						'param_name' => 'icon_back_color',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon border color','goodresto'),
						'param_name' => 'icon_border_color',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon border radius (without any string)','goodresto'),
						'param_name' => 'icon_border_radius',
						'value'      => '0'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon border width (without any string)','goodresto'),
						'param_name' => 'icon_border_width',
						'value'      => '0'
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Animate','goodresto'),
						'param_name' => 'animate',
						'value'      => array(
							esc_html__('false','goodresto')  => 'false',
							esc_html__('true','goodresto')   => 'true'
						)
					),
	    		)
	    	));
	
		/* icon list
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Icon list','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'description'             => esc_html__('Insert icon list','goodresto'),
	    		'base'                    => 'et_icon_list',
	    		'class'                   => 'et_icon_list',
	    		'icon'                    => 'et_icon_list',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'textfield',
						
						'heading'    => esc_html__('Icon prefix','goodresto'),
						'param_name' => 'icon_prefix',
						'value'      => '',
						'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','goodresto')
					),
					array(
						'type'       => 'textfield',
						
						'heading'    => esc_html__('Icon name','goodresto'),
						'param_name' => 'icon_name',
						'value'      => '',
						'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','goodresto')
					),
	    			array(
						'param_name'=>'icon_size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Size', 'goodresto'), 
						'value'     => $size_values_default,
						'std'       => 'small'
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon color','goodresto'),
						'param_name' => 'icon_color',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon background color','goodresto'),
						'param_name' => 'icon_back_color',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon border color','goodresto'),
						'param_name' => 'icon_border_color',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon border radius (without any string)','goodresto'),
						'param_name' => 'icon_border_radius',
						'value'      => '0'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon border width (without any string)','goodresto'),
						'param_name' => 'icon_border_width',
						'value'      => '0'
					),
					array(
						'type'       => 'textarea',
						'heading'    => esc_html__('List items','goodresto'),
						'param_name' => 'content',
						'value'      => '',
						'description' => esc_html__('Use line break (press Enter) to separate between items','goodresto'),
					),
	    		)
	    	));
	
	    /* button
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Button','goodresto'),
	    		'description'             => esc_html__('Insert button','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_button',
	    		'class'                   => 'et_button',
	    		'icon'                    => 'et_button',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(

	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button text','goodresto'),
						'param_name' => 'button_text',
						'value'      => '',
					),

					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button link','goodresto'),
						'param_name' => 'button_link',
						'value'      => '',
					),
					array(
						'param_name'=>'target',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Target', 'goodresto'), 
						'value'     => array(
							'_self'  => '_self',
							'_blank' => '_blank' 
						)
					),
					array(
	    				'type'       => 'checkbox',
						'heading'    => esc_html__('Open link in modal window?', 'goodresto'),
						'param_name' => 'button_link_modal',
						'value'      => '',
					),
	    			array(
						'param_name'=>'button_size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Button size', 'goodresto'), 
						'value'     => $size_values_default,
						'std'       => 'medium'
					),
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button font size (without any string)','goodresto'),
						'group'      => esc_html__('Typography','goodresto'),
						'param_name' => 'button_font_size',
						'value'      => '',
					),
					array(
						'param_name'=>'button_font_weight',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Button font weight (without any string)', 'goodresto'),
						'group'      => esc_html__('Typography','goodresto'),
						'value'     => array(
							'100'  => '100', 
							'200'  => '200', 
							'300'  => '300', 
							'400'  => '400', 
							'500'  => '500', 
							'600'  => '600', 
							'700'   => '700', 
							'800'   => '800', 
							'900'   => '900',
						),
						'std' => '500'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button letter spacing (without any string)','goodresto'),
						'group'      => esc_html__('Typography','goodresto'),
						'param_name' => 'button_letter_spacing',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Button color','goodresto'),
						'group'      => esc_html__('Styling','goodresto'),
						'param_name' => 'button_color',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Button background color','goodresto'),
						'group'      => esc_html__('Styling','goodresto'),
						'param_name' => 'button_back_color',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Button border color','goodresto'),
						'group'      => esc_html__('Styling','goodresto'),
						'param_name' => 'button_border_color',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button border radius (without any string)','goodresto'),
						'group'      => esc_html__('Styling','goodresto'),
						'param_name' => 'button_border_radius',
						'value'      => '0'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button border width (without any string)','goodresto'),
						'group'      => esc_html__('Styling','goodresto'),
						'param_name' => 'button_border_width',
						'value'      => '0'
					),

					array(
	    				'type'       => 'checkbox',
						'heading'    => esc_html__('Button shadow ?', 'goodresto'),
						'group'      => esc_html__('Styling','goodresto'),
						'param_name' => 'button_shadow',
						'value'      => '',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon prefix','goodresto'),
						'group'      => esc_html__('Icon','goodresto'),
						'param_name' => 'icon_prefix',
						'value'      => '',
						'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','goodresto')
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon name','goodresto'),
						'group'      => esc_html__('Icon','goodresto'),
						'param_name' => 'icon_name',
						'value'      => '',
						'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','goodresto')
					),

					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Icon position','goodresto'),
						'group'      => esc_html__('Icon','goodresto'),
						'param_name' => 'icon_position',
						'value'      => array(
							esc_html__('Left','goodresto')  => 'left',
							esc_html__('Right','goodresto')  => 'right',
						)
					),

					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Button color hover','goodresto'),
						'group'      => esc_html__('Hover','goodresto'),
						'param_name' => 'button_color_hover',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Button background color hover','goodresto'),
						'group'      => esc_html__('Hover','goodresto'),
						'param_name' => 'button_back_color_hover',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Button border color hover','goodresto'),
						'group'      => esc_html__('Hover','goodresto'),
						'param_name' => 'button_border_color_hover',
						'value'      => ''
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Hover animation','goodresto'),
						'group'      => esc_html__('Hover','goodresto'),
						'param_name' => 'animate_hover',
						'value'      => array(
							esc_html__('None','goodresto')  => 'none',
							esc_html__('Fill','goodresto')  => 'fill',
							esc_html__('Glint','goodresto') => 'glint',
							esc_html__('Scale','goodresto') => 'scale',
						)
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Click animation','goodresto'),
						'group'      => esc_html__('Click','goodresto'),
						'param_name' => 'animate_click',
						'value'      => array(
							esc_html__('None','goodresto')  => 'none',
							esc_html__('Material','goodresto')  => 'material',
						)
					),
					array(
						'type'       => 'checkbox',
						'heading'    => esc_html__('Smooth Click animation','goodresto'),
						'group'      => esc_html__('Click','goodresto'),
						'param_name' => 'click_smooth',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Custom class','goodresto'),
						'param_name' => 'custom_class',
						'value'      => '',
					),
	    		)
	    	));
	
		/* button 3d
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('3D Button','goodresto'),
	    		'description'             => esc_html__('Insert 3D button','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_button_3d',
	    		'class'                   => 'et_button_3d',
	    		'icon'                    => 'et_button_3d',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(

	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button text','goodresto'),
						'param_name' => 'button_text',
						'value'      => '',
					),

					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button link','goodresto'),
						'param_name' => 'button_link',
						'value'      => '',
					),
					array(
						'param_name'=>'target',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Target', 'goodresto'), 
						'value'     => array(
							'_self'  => '_self',
							'_blank' => '_blank' 
						)
					),
					array(
	    				'type'       => 'checkbox',
						'heading'    => esc_html__('Open link in modal window?', 'goodresto'),
						'param_name' => 'button_link_modal',
						'value'      => '',
					),
	    			array(
						'param_name'=>'button_size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Button size', 'goodresto'), 
						'value'     => $size_values_default,
						'std'       => 'medium'
					),
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button font size (without any string)','goodresto'),
						'group'      => esc_html__('Typography','goodresto'),
						'param_name' => 'button_font_size',
						'value'      => '',
					),
					array(
						'param_name'=>'button_font_weight',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Button font weight (without any string)', 'goodresto'),
						'group'      => esc_html__('Typography','goodresto'),
						'value'     => array(
							'100'  => '100', 
							'200'  => '200', 
							'300'  => '300', 
							'400'  => '400', 
							'500'  => '500', 
							'600'  => '600', 
							'700'   => '700', 
							'800'   => '800', 
							'900'   => '900',
						),
						'std' => '500'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button letter spacing (without any string)','goodresto'),
						'group'      => esc_html__('Typography','goodresto'),
						'param_name' => 'button_letter_spacing',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Button color','goodresto'),
						'group'      => esc_html__('Styling','goodresto'),
						'param_name' => 'button_color',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button border radius (without any string)','goodresto'),
						'group'      => esc_html__('Styling','goodresto'),
						'param_name' => 'button_border_radius',
						'value'      => '0'
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Button color hover','goodresto'),
						'group'      => esc_html__('Hover','goodresto'),
						'param_name' => 'button_color_hover',
						'value'      => ''
					),
					array(
						'type'       => 'checkbox',
						'heading'    => esc_html__('Smooth Click animation','goodresto'),
						'group'      => esc_html__('Click','goodresto'),
						'param_name' => 'click_smooth',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Custom class','goodresto'),
						'param_name' => 'custom_class',
						'value'      => '',
					),
	    		)
	    	));

	    /* carousel
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Carousel','goodresto'),
	    		'description'             => esc_html__('Insert carousel with any content you want','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_carousel',
	    		'class'                   => 'et_carousel',
	    		'icon'                    => 'et_carousel',
	    		'show_settings_on_create' => true,
	    		'is_container'            => true,
		    	'content_element'         => true,
	    		'js_view'                 => 'VcColumnView',
	    		'as_parent'               => array('only' => 'et_carousel_item'),
	    		'params'                  => array(
					array(
						'param_name'=>'item_column',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Column', 'goodresto'), 
						'value'     => array(
							'1'  => '1',
							'2'  => '2',
							'3'  => '3',
							'4'  => '4',
							'5'  => '5',
							'6'  => '6',
							'7'  => '7',
							'8'  => '8',
							'9'  => '9',
							'10' => '10'
						)
					),
					array(
						'param_name'=>'item_gap',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Gap', 'goodresto'), 
						'value'     => $gap_values
					),
					array(
						'param_name'=>'navigation_type',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Navigation type', 'goodresto'), 
						'value'     => array(
							esc_html__('Only arrows','goodresto')  => 'only-arrows',
							esc_html__('Only dottes','goodresto')  => 'only-dottes',
							esc_html__('Both arrows and dottes','goodresto')  => 'both'
						)
					),
					array(
						'param_name'=>'autoplay',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Autoplay', 'goodresto'), 
						'value'     => $logic_values
					),
	    		)
	    	));

	    	vc_map(array(
	    		'name'                    => 'Carousel item',
	    		'description'             => esc_html__('Insert carousel item','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_carousel_item',
	    		'class'                   => 'et_carousel_item',
	    		'icon'                    => 'et_carousel_item',
	    		'show_settings_on_create' => false,
		    	'content_element'         => true,
	    		'as_child'               => array('only' => 'et_carousel'),
	    		"as_parent"               => array('except' => 'vc_row, vc_section'),
				"js_view"                 => 'VcColumnView',
	    		'params'                  => array()
	    	));

	    /* image
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Image','goodresto'),
	    		'description'             => esc_html__('Insert single image','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_image',
	    		'class'                   => 'et_image',
	    		'icon'                    => 'et_image',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'attach_image',
						'heading'    => esc_html__('Upload image','goodresto'),
						'param_name' => 'image',
					),
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Title','goodresto'),
						'param_name' => 'title',
						'value'      => '',
					),
	    			array(
						'param_name'=>'size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Size', 'goodresto'), 
						'value'     => $image_size_values
					),
	    			array(
	    				'type'       => 'dropdown',
						'heading'    => esc_html__('Caption', 'goodresto'),
						'param_name' => 'caption',
						'value'      => $logic_values,
						'description'=> esc_html__('Check this option if you want to have caption on image. Make sure Title is not empty', 'goodresto'),
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Link to','goodresto'),
						'param_name' => 'link',
						'value'      => array(
							esc_html__('None','goodresto')       => 'none',
							esc_html__('Attachment','goodresto') => 'attach',
							esc_html__('Lightbox','goodresto')   => 'lightbox',
							esc_html__('Custom','goodresto')     => 'custom',
						)
					),
					array(
	    				'type'       => 'checkbox',
						'heading'    => esc_html__('Modal', 'goodresto'),
						'param_name' => 'modal',
						'value'      => '',
						'description'=> esc_html__('Check this option if you want to open the link content in modal box.', 'goodresto'),
						'dependency' => Array('element' => 'link', 'value' => 'custom')
					),
					array(
						'param_name'=>'link_target',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Link target', 'goodresto'), 
						'value'     => array(
							'_self'  => '_self',
							'_blank' => '_blank' 
						),
						'dependency' => Array('element' => 'link', 'value' => 'custom')
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Image custom link','goodresto'),
						'param_name' => 'custom_link',
						'value'      => '',
						'dependency' => Array('element' => 'link', 'value' => 'custom')
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Hover','goodresto'),
						'param_name' => 'overlay',
						'value'      => $image_overlay_values,
						'dependency' => Array(
							'element' => 'link', 'value' => array('attach','lightbox','custom'),
							'element' => 'caption', 'value' => 'false'
						)
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Hover','goodresto'),
						'param_name' => 'overlay_caption',
						'value'      => $image_caption_values,
						'dependency' => Array(
							'element' => 'link', 'value' => array('attach','lightbox','custom'),
							'element' => 'caption', 'value' => 'true'
						)
					),
					array(
						'param_name'=>'alignment',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Alignment', 'goodresto'),
						'value'     => $align_values
					),
					array(
						'type'       => 'checkbox',
						'heading'    => esc_html__('Parallax','goodresto'),
						'group'      => esc_html__('Transform','goodresto'),
						'param_name' => 'parallax',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Parallax X coordinate','goodresto'),
						'group'      => esc_html__('Transform','goodresto'),
						'param_name' => 'parallax_x',
						'value'      => '0',
						'dependency' => Array(
							'element' => 'parallax', 'value' => 'true'
						)
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Parallax Y coordinate','goodresto'),
						'group'      => esc_html__('Transform','goodresto'),
						'param_name' => 'parallax_y',
						'value'      => '0',
						'dependency' => Array(
							'element' => 'parallax', 'value' => 'true'
						)
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Parallax speed radtio','goodresto'),
						'group'      => esc_html__('Transform','goodresto'),
						'description'=> esc_html__('The more the value is the slower the parallax effect is','goodresto'),
						'param_name' => 'parallax_speed',
						'value'     => array(
							'1'  => '1',
							'2'  => '2',
							'3'  => '3',
							'4'  => '4',
							'5'  => '5',
							'6'  => '6',
							'7'  => '7',
							'8'  => '8',
							'9'  => '9',
							'10' => '10',
							'11' => '11',
							'12' => '12',
							'13' => '13',
							'14' => '14',
							'15' => '15',
							'16' => '16',
							'17' => '17',
							'18' => '18',
							'19' => '19',
							'20' => '20'
						),
						'dependency' => Array(
							'element' => 'parallax', 'value' => 'true'
						)
					),
					array(
						'type'       => 'checkbox',
						'heading'    => esc_html__('Curtain effect','goodresto'),
						'group'      => esc_html__('Curtain effect','goodresto'),
						'param_name' => 'curtain',
						'value'      => ''
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Curtain direction','goodresto'),
						'group'      => esc_html__('Curtain effect','goodresto'),
						'param_name' => 'curtain_direction',
						'value'      => array(
							esc_html__('Left to Right','goodresto') => 'left',
							esc_html__('Right to Left','goodresto') => 'right',
							esc_html__('Top to bottom','goodresto') => 'top',
							esc_html__('Bottom to top','goodresto') => 'bottom',
						),
						'dependency' => Array(
							'element' => 'curtain', 'value' => 'true'
						)
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Curtain color','goodresto'),
						'group'      => esc_html__('Curtain effect','goodresto'),
						'param_name' => 'curtain_color',
						'value'      => '#d3a471',
						'dependency' => Array(
							'element' => 'curtain', 'value' => 'true'
						)
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Animation delay in ms (example 300)', 'goodresto' ),
						'group'      => esc_html__('Curtain effect','goodresto'),
						'param_name' => 'curtain_animation_delay',
						'value'      => $animation_delay_values,
						'dependency' => Array(
							'element' => 'curtain', 'value' => 'true'
						)
					)
	    		)
	    	));
	
		/* gallery
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Simple gallery','goodresto'),
	    		'description'             => esc_html__('Insert image gallery','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_gallery',
	    		'class'                   => 'et_gallery',
	    		'icon'                    => 'et_gallery',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'attach_images',
						'heading'    => esc_html__('Upload images','goodresto'),
						'param_name' => 'gallery_images',
					),
					array(
	    				'type'       => 'dropdown',
						'heading'    => esc_html__('Gallery type', 'goodresto'),
						'param_name' => 'gallery_type',
						'value'      => array(
							esc_html__('Grid/Masonry','goodresto') => 'grid',
							esc_html__('Carousel','goodresto')     => 'carousel',
						)
					),
	    			array(
						'param_name'=>'gallery_size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Size', 'goodresto'), 
						'value'     => $image_size_values,
						'dependency' => Array(
							'element' => 'gallery_type', 'value' => array('grid','carousel'),
						)
					),
	    			array(
	    				'type'       => 'dropdown',
						'heading'    => esc_html__('Caption', 'goodresto'),
						'param_name' => 'gallery_caption',
						'value'      => $logic_values,
						'description'=> esc_html__('Check this option if you want to have caption on image', 'goodresto'),
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Link to','goodresto'),
						'param_name' => 'gallery_link',
						'value'      => array(
							esc_html__('None','goodresto')       => 'none',
							esc_html__('Attachment','goodresto') => 'attach',
							esc_html__('Lightbox','goodresto')   => 'lightbox',
						)
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Hover','goodresto'),
						'param_name' => 'gallery_overlay',
						'value'      => $image_overlay_values,
						'dependency' => Array(
							'element' => 'gallery_link', 'value' => array('attach','lightbox'),
							'element' => 'gallery_caption', 'value' => 'false'
						)
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Hover','goodresto'),
						'param_name' => 'gallery_overlay_caption',
						'value'      => $image_caption_values,
						'dependency' => Array(
							'element' => 'gallery_link', 'value' => array('attach','lightbox'),
							'element' => 'gallery_caption','value' => 'true'
						)
					),
					array(
						'param_name'=>'gallery_animation_type',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Animation type', 'goodresto'), 
						'value'     => array(
							esc_html__('Sequential','goodresto')  => 'sequential',
							esc_html__('Random','goodresto')      => 'random'
						),
						'dependency' => Array(
							'element' => 'gallery_type', 'value' => array('grid','justified'),
						)
					),
	    			array(
						'param_name'=>'gallery_animation_effect',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Animation effect', 'goodresto'),
						'value'     => $animation_values,
						'dependency' => Array(
							'element' => 'gallery_type', 'value' => array('grid','justified'),
						)
					),
					array(
						'param_name'=>'gallery_column',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Column', 'goodresto'), 
						'value'     => array(
							'1'  => '1',
							'2'  => '2',
							'3'  => '3',
							'4'  => '4',
							'5'  => '5',
							'6'  => '6',
							'7'  => '7',
							'8'  => '8',
							'9'  => '9',
							'10' => '10'
						),
						'dependency' => Array(
							'element' => 'gallery_type', 'value' => array('grid','carousel'),
						)
					),
					array(
						'param_name'=>'gallery_gap',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Gap', 'goodresto'), 
						'value'     => $gap_values
					),
	    		)
	    	));
	
		/* image slider
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Image slider','goodresto'),
	    		'description'             => esc_html__('Insert image slider','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_image_slider',
	    		'class'                   => 'et_image_slider',
	    		'icon'                    => 'et_image_slider',
	    		'show_settings_on_create' => true,
	    		'js_view'                 => '',
	    		'params'                  => array(
	    			array(
						'type'       => 'attach_images',
						'heading'    => esc_html__('Upload images','goodresto'),
						'param_name' => 'slider_images',
					),
	    			array(
						'param_name'=>'slider_size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Image Size', 'goodresto'), 
						'value'     => $image_size_values
					),
					array(
						'param_name'=>'slider_column',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Column', 'goodresto'), 
						'value'     => array(
							'1'  => '1',
							'2'  => '2',
							'3'  => '3',
							'4'  => '4',
							'5'  => '5',
							'6'  => '6'
						)
					),
					array(
						'param_name'=>'slider_gap',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Gap', 'goodresto'), 
						'value'     => $gap_values,
						'dependency' => Array('element' => 'slider_column', 'value' => array('2','3','4','5','6'))
					),
					array(
	    				'type'       => 'checkbox',
						'heading'    => esc_html__('Include thumbnails', 'goodresto'),
						'param_name' => 'slider_thumbnails',
						'value'      => '',
						'description'=> esc_html__('Check this option if you want to have slider thumbnails', 'goodresto'),
						'dependency' => Array('element' => 'slider_column', 'value' => '1')
					)
	    		)
	    	));

		/* image with content
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Image with content','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'description'             => esc_html__('Insert single image with content on hover','goodresto'),
	    		'base'                    => 'et_image_content',
	    		'class'                   => 'et_image_content',
	    		'icon'                    => 'et_image',
	    		'show_settings_on_create' => true,
	    		'content_element'         => true,
	    		"as_parent"               => array('except' => 'vc_row, vc_section'),
	    		"js_view"                 => 'VcColumnView',
	    		'params'                  => array(
	    			array(
						'type'       => 'attach_image',
						'heading'    => esc_html__('Upload image','goodresto'),
						'param_name' => 'image',
					),
	    			array(
						'param_name'=>'size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Size', 'goodresto'), 
						'value'     => $image_size_values
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Overlay','goodresto'),
						'param_name' => 'overlay',
						'value'      => array(
							esc_html__('Overlay fade','goodresto') 						 => 'overlay-fade',
							esc_html__('Overlay fade with image zoom','goodresto')         => 'overlay-fade-zoom',
							esc_html__('Overlay fade with extreme image zoom','goodresto') => 'overlay-fade-zoom-extreme',
							esc_html__('Overlay move up','goodresto')    				     => 'overlay-move-up',
							esc_html__('Overlay move down','goodresto')  				     => 'overlay-move-down',
							esc_html__('Overlay move left','goodresto')  				     => 'overlay-move-left',
							esc_html__('Overlay move right','goodresto') 				     => 'overlay-move-right',
							esc_html__('Image move up','goodresto')      				     => 'image-move-up',
							esc_html__('Image move down','goodresto')    				     => 'image-move-down',
							esc_html__('Image move left','goodresto')    				     => 'image-move-left',
							esc_html__('Image move right','goodresto')   				     => 'image-move-right',
							esc_html__('Overlay and image move up','goodresto')            => 'overlay-image-move-up',
							esc_html__('Overlay and image move down','goodresto')          => 'overlay-image-move-down',
							esc_html__('Overlay and image move left','goodresto')          => 'overlay-image-move-left',
							esc_html__('Overlay and image move right','goodresto')         => 'overlay-image-move-right',
							esc_html__('Overlay move fluid','goodresto')                   => 'overlay-move',
							esc_html__('Overlay scale in','goodresto')                     => 'overlay-scale-in',
							esc_html__('Overlay flip horizontal','goodresto')        	     => 'overlay-flip-hor',
							esc_html__('Overlay flip vertical','goodresto')          	     => 'overlay-flip-ver',
						),
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Overlay color','goodresto'),
						'param_name' => 'color',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Image link','goodresto'),
						'param_name' => 'link',
						'value'      => '',
					),
					array(
						'param_name'=>'link_target',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Link target', 'goodresto'), 
						'value'     => array(
							'_self'  => '_self',
							'_blank' => '_blank' 
						),
						'dependency' => Array('element' => 'link', 'not_empty' => true)
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Text align','goodresto'),
						'param_name' => 'align',
						'value'      => $align_values
					),
	    		)
	    	));

		/* youtube
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Youtube','goodresto'),
	    		'description'             => esc_html__('Insert youtube videos','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_youtube',
	    		'class'                   => 'et_youtube',
	    		'icon'                    => 'et_youtube',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Video ID','goodresto'),
						'param_name' => 'id',
						'value'      => '',
						'description' => esc_html__('For example https://www.youtube.com/watch?v=KDOLHClNTOI (Use video id after watch?v=)','goodresto')
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Width optional (without any string)','goodresto'),
						'param_name' => 'width',
						'value'      => ''
					),
					array(
	    				'type'       => 'checkbox',
						'heading'    => esc_html__('Modal','goodresto'),
						'param_name' => 'modal',
					),
					array(
						'type'       => 'attach_image',
						'heading'    => esc_html__('Upload modal image','goodresto'),
						'param_name' => 'image',
						'value'      => '',
						'dependency' => Array('element' => 'modal', 'value' => 'true')
					),
					array(
						'param_name'=>'size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Modal image size', 'goodresto'), 
						'value'     => $image_size_values,
						'dependency' => Array('element' => 'modal', 'value' => 'true')
					),
					array(
						'type'       => 'attach_image',
						'heading'    => esc_html__('Custom modal video player image','goodresto'),
						'param_name' => 'player_image',
						'value'      => '',
						'dependency' => Array('element' => 'modal', 'value' => 'true')
					)
	    		)
	    	));

		/* vimeo
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Vimeo','goodresto'),
	    		'description'             => esc_html__('Insert vimeo videos','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_vimeo',
	    		'class'                   => 'et_vimeo',
	    		'icon'                    => 'et_vimeo',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Video ID','goodresto'),
						'param_name' => 'id',
						'value'      => '',
						'description' => esc_html__('For example http://vimeo.com/5121526 (Use video id after last /','goodresto')
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Width optional (without any string)','goodresto'),
						'param_name' => 'width',
						'value'      => ''
					),
					array(
	    				'type'       => 'checkbox',
						'heading'    => esc_html__('Modal','goodresto'),
						'param_name' => 'modal',
					),
					array(
						'type'       => 'attach_image',
						'heading'    => esc_html__('Upload modal image','goodresto'),
						'param_name' => 'image',
						'value'      => '',
						'dependency' => Array('element' => 'modal', 'value' => 'true')
					),
					array(
						'param_name'=>'size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Modal image size', 'goodresto'), 
						'value'     => $image_size_values,
						'dependency' => Array('element' => 'modal', 'value' => 'true')
					),
					array(
						'type'       => 'attach_image',
						'heading'    => esc_html__('Custom modal video player image','goodresto'),
						'param_name' => 'player_image',
						'value'      => '',
						'dependency' => Array('element' => 'modal', 'value' => 'true')
					)
	    		)
	    	));

		/* soundcloud
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Soundcloud', 'goodresto'),
	    		'description'             => esc_html__('Insert soundcloud audio','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_soundcloud',
	    		'class'                   => 'et_soundcloud',
	    		'icon'                    => 'et_soundcloud',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Url','goodresto'),
						'param_name' => 'url',
						'value'      => '',
						'description' => esc_html__('For example api.soundcloud.com/tracks/151325062','goodresto')
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Width (optional)','goodresto'),
						'param_name' => 'width',
						'value'      => '100%'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Height (optional)','goodresto'),
						'param_name' => 'height',
						'value'      => '166'
					)
	    		)
	    	));

		/* googlemap
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Google map','goodresto'),
	    		'description'             => esc_html__('Inser google map','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_gmap',
	    		'class'                   => 'et_gmap',
	    		'icon'                    => 'et_gmap',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'type'        => 'textfield',
						'heading'     => esc_html__('X coordinate','goodresto'),
						'param_name'  => 'x_coords',
						'value'       => '',
						'description' => esc_html__('Use latitude coordinate for example 53.339381','goodresto'),
					),
	    			array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Y coordinate','goodresto'),
						'param_name'  => 'y_coords',
						'value'       => '',
						'description' => esc_html__('Use longitude coordinate for example -6.260405','goodresto'),
					),
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Google map zoom level (from 1 to 19 without any string)','goodresto'),
						'param_name' => 'zoom',
						'value'      => '18'
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Type','goodresto'),
						'param_name' => 'type',
						'value'      => array(
							esc_html__('Roadmap','goodresto')    => 'roadmap',
							esc_html__('Satellite','goodresto')  => 'satellite',
							esc_html__('Black','goodresto')      => 'black',
							esc_html__('Grey','goodresto')      => 'grey',
						)
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Width','goodresto'),
						'param_name' => 'width',
						'value'      => '100%'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Height','goodresto'),
						'param_name' => 'height',
						'value'      => '480px'
					),
					array(
						'type'       => 'attach_image',
						'heading'    => esc_html__('Upload custom marker','goodresto'),
						'param_name' => 'marker',
						'value'      => ''
					),
					array(
	    				'type'       => 'dropdown',
						'heading'    => esc_html__('Animate marker','goodresto'),
						'param_name' => 'animate',
						'value'      => array('false'=>'false','true'=>'true')
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Title','goodresto'),
						'param_name' => 'title',
						'value'      => ''
					),
					array(
						'type'       => 'textarea_html',
						'heading'    => esc_html__('Content','goodresto'),
						'param_name' => 'content',
					),
	    		)
	    	));

		/* counter
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Counter','goodresto'),
	    		'description'             => esc_html__('Insert number counter','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_counter',
	    		'class'                   => 'et_counter',
	    		'icon'                    => 'et_counter',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Number','goodresto'),
						'param_name' => 'number',
						'value'      => '',
						'description' => esc_html__('Insert an integer value to count to','goodresto'),
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Number prefix','goodresto'),
						'param_name' => 'number_prefix',
						'value'      => '',
						'description' => esc_html__('Insert any prefix you want %,$, etc.','goodresto'),
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Font size (without any string)','goodresto'),
						'param_name' => 'font_size',
						'value'      => '56',
					),
					array(
						'param_name'=>'font_weight',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Font weight (without any string)', 'goodresto'), 
						'value'     => array(
							'100'  => '100', 
							'200'  => '200', 
							'300'  => '300', 
							'400'  => '400', 
							'500'  => '500', 
							'600'  => '600', 
							'700'   => '700', 
							'800'   => '800', 
							'900'   => '900',
						),
						'std' => '400'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Line height (without any string)','goodresto'),
						'param_name' => 'line_height',
						'value'      => '56'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Letter spacing (without any string)','goodresto'),
						'param_name' => 'letter_spacing',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Color','goodresto'),
						'param_name' => 'color',
						'value'      => '#d3a471'
					)
	    		)
	    	));

		/* progress
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Progress','goodresto'),
	    		'description'             => esc_html__('Insert progress bar','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_progress',
	    		'class'                   => 'et_progress',
	    		'icon'                    => 'et_progress',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Title','goodresto'),
						'param_name' => 'title',
						'value'      => '',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Percentage','goodresto'),
						'param_name' => 'percentage',
						'value'      => '',
						'description' => esc_html__('Only integer value, without any string','goodresto'),
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Bar Color','goodresto'),
						'param_name' => 'bar_color',
						'value'      => '#d3a471'
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Track Color','goodresto'),
						'param_name' => 'track_color',
						'value'      => '#e0e0e0'
					)
	    		)
	    	));

		/* circle progress
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Circle progress','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'description'             => esc_html__('Insert circle progress','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_circle_progress',
	    		'class'                   => 'et_circle_progress',
	    		'icon'                    => 'et_circle_progress',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Percentage','goodresto'),
						'param_name' => 'percentage',
						'value'      => '',
						'description' => esc_html__('Only integer value, without any string','goodresto'),
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Bar Color','goodresto'),
						'param_name' => 'bar_color',
						'value'      => '#d3a471'
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Track Color','goodresto'),
						'param_name' => 'track_color',
						'value'      => '#e0e0e0'
					)
	    		)
	    	));

		/* timer
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Timer','goodresto'),
	    		'description'             => esc_html__('Insert timer','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_timer',
	    		'class'                   => 'et_timer',
	    		'icon'                    => 'et_timer',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('End date to count to','goodresto'),
						'param_name' => 'enddate',
						'value'      => '',
						'description' => esc_html__('Use format : June 7, 2025 15:03:25','goodresto'),
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Days label','goodresto'),
						'param_name' => 'days',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Hours label','goodresto'),
						'param_name' => 'hours',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Minutes label','goodresto'),
						'param_name' => 'minutes',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Seconds label','goodresto'),
						'param_name' => 'seconds',
						'value'      => ''
					),
	    		)
	    	));

		/* accordion
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Accordion','goodresto'),
	    		'description'             => esc_html__('Insert accordion','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_accordion',
	    		'class'                   => 'et_accordion',
	    		'icon'                    => 'et_accordion',
	    		'as_parent'               => array('only' => 'et_accordion_item'),
	    		'content_element'         => true,
	    		'show_settings_on_create' => true,
	    		'is_container'            => true,
	    		'js_view'                 => 'VcColumnView',
	    		'params'                  => array(
	    			array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Collapsible','goodresto'),
						'param_name' => 'collapsible',
						'value'      => $logic_values
					),
	    		)
	    	));

			vc_map(array(
	    		'name'                    => esc_html__('Accordion item','goodresto'),
	    		'base'                    => 'et_accordion_item',
	    		'icon'                    => 'et_accordion_item',
	    		'as_child'                => array('only' => 'et_accordion'),
	    		"as_parent"               => array('except' => 'vc_row, vc_section'),
	    		'content_element'         => true,
				"js_view"                 => 'VcColumnView',
	    		'params'                  => array(
	    			array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Open','goodresto'),
						'param_name' => 'open',
						'value'      => $logic_values
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon prefix','goodresto'),
						'param_name' => 'icon_prefix',
						'value'      => '',
						'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','goodresto')
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon name','goodresto'),
						'param_name' => 'icon_name',
						'value'      => '',
						'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','goodresto')
					),
					array(
	    				'type'       => 'textfield',
						'heading'    => esc_html__('Title','goodresto'),
						'param_name' => 'title',
						'value'      => ''
					),
	    		)
	    	));

		/* tab
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Tab','goodresto'),
	    		'description'             => esc_html__('Insert tab','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_tab',
	    		'class'                   => 'et_tab',
	    		'icon'                    => 'et_tab',
	    		'as_parent'               => array('only' => 'et_tab_item'),
	    		'content_element'         => true,
	    		'show_settings_on_create' => true,
	    		'is_container'            => true,
	    		'js_view'                 => 'VcColumnView',
	    		'params'                  => array(
	    			array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Type','goodresto'),
						'param_name' => 'type',
						'value'      => array(
							esc_html__('Horizontal','goodresto')  => 'horizontal',
							esc_html__('Vertical','goodresto')  => 'vertical',
						)
					),
					array(
						'type'       => 'checkbox',
						'heading'    => esc_html__('Tabs center','goodresto'),
						'param_name' => 'center',
					),
	    		)
	    	));

			vc_map(array(
	    		'name'                    => esc_html__('Tab item','goodresto'),
	    		'base'                    => 'et_tab_item',
	    		'icon'                    => 'et_tab_item',
	    		'as_child'                => array('only' => 'et_tab'),
	    		"as_parent"               => array('except' => 'vc_row, vc_section'),
				"js_view"                 => 'VcColumnView',
	    		'content_element'         => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'dropdown',
						
						'heading'    => esc_html__('Active','goodresto'),
						'param_name' => 'active',
						'value'      => array(
							'false' => 'false',
							'true'  => 'true'
						)
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon prefix','goodresto'),
						'param_name' => 'icon_prefix',
						'value'      => '',
						'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','goodresto')
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon name','goodresto'),
						'param_name' => 'icon_name',
						'value'      => '',
						'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','goodresto')
					),
					array(
	    				'type'       => 'textfield',
						'heading'    => esc_html__('Title','goodresto'),
						'param_name' => 'title',
						'value'      => ''
					),
	    		)
	    	));

		/* person
		---------------*/

			foreach ($social_links_array as $social) {

				if($social != 'tripadvisor') {

					vc_add_param('et_person', array(
						'type'       => 'textfield',
						'heading'    => ucfirst($social).' link',
						'param_name' => $social,
						'value'      => '',
						'weight'     => 0
					));

				}
			}

			vc_map(array(
	    		'name'                    => esc_html__('Person','goodresto'),
	    		'description'             => esc_html__('Insert person','goodresto'),
	    		'base'                    => 'et_person',
	    		'icon'                    => 'et_person',
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'params'                  => array(
	    			array(
						'type'       => 'attach_image',
						'heading'    => esc_html__('Upload image','goodresto'),
						'param_name' => 'image',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Link','goodresto'),
						'param_name' => 'link',
						'value'      => ''
					),
					array(
						'param_name'=>'link_target',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Link target', 'goodresto'), 
						'value'     => array(
							'_self'  => '_self',
							'_blank' => '_blank' 
						)
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Title','goodresto'),
						'param_name' => 'title',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Subtitle','goodresto'),
						'param_name' => 'subtitle',
						'value'      => ''
					),
					array(
	    				'type'       => 'colorpicker',
						'heading'    => esc_html__('Box background color','goodresto'),
						'param_name' => 'box_back',
						'value'      => '',
					),
	    		)
	    	));

		/* testimonial
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Testimonial','goodresto'),
	    		'description'             => esc_html__('Insert testimonials','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_testimonial',
	    		'class'                   => 'et_testimonial',
	    		'icon'                    => 'et_testimonial',
	    		'content_element'         => true,
	    		'show_settings_on_create' => true,
				'is_container'            => true,
	    		'as_parent'               => array('only' => 'et_testimonial_item'),
				'js_view'                 => 'VcColumnView',
	    		'params'                  => array(
	    			array(
						'param_name'=>'layout',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Layout', 'goodresto'), 
						'value'     => $layout_type_values
					),
					array(
						'param_name'=>'navigation_type',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Navigation type', 'goodresto'), 
						'value'     => array(
							esc_html__('Only arrows','goodresto')  => 'only-arrows',
							esc_html__('Only dottes','goodresto')  => 'only-dottes',
							esc_html__('Both arrows and dottes','goodresto')  => 'both'
						),
						'dependency' => Array('element' => 'layout', 'value' => 'carousel')
					),
					array(
						'param_name'=>'animation_type',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Animation type', 'goodresto'), 
						'value'     => $animation_type_values,
						'dependency' => Array('element' => 'layout', 'value' => 'grid')
					),
	    			array(
						'param_name'=>'animation_effect',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Animation effect', 'goodresto'),
						'value'     => $animation_values,
						'dependency' => Array('element' => 'layout', 'value' => 'grid')
					),
					array(
						'param_name'=>'column',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Column', 'goodresto'), 
						'value'     => array(
							'1'  => '1',
							'2'  => '2',
							'3'  => '3',
							'4'  => '4',
						)
					),
					array(
						'param_name'=>'gap',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Gap', 'goodresto'), 
						'value'     => $gap_values
					),
	    		)
	    	));

			vc_map(array(
	    		'name'                    => esc_html__('Testimonial','goodresto'),
	    		'base'                    => 'et_testimonial_item',
	    		'icon'                    => 'et_testimonial_item',
	    		'as_child'                => array('only' => 'et_testimonial'),
	    		'content_element'         => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'attach_image',
						
						'heading'    => esc_html__('Upload image','goodresto'),
						'param_name' => 'image',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Title','goodresto'),
						'param_name' => 'title',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Highlights','goodresto'),
						'param_name' => 'highlights',
						'value'      => ''
					),
					array(
						'param_name'=>'rating',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Rating', 'goodresto'), 
						'value'     => array(
							esc_html__('None', 'goodresto') => 'none', 
							esc_html__('Poor', 'goodresto') => 'poor', 
							esc_html__('Fair', 'goodresto') => 'fair', 
							esc_html__('Average', 'goodresto') => 'average', 
							esc_html__('Good', 'goodresto') => 'good', 
							esc_html__('Excellent', 'goodresto') => 'excellent', 
						)
					),
					array(
						'param_name'=>'highlight',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Highlight', 'goodresto'), 
						'value'     => $logic_values
					),
					array(
						'type'       => 'textarea_html',
						'heading'    => esc_html__('Content','goodresto'),
						'param_name' => 'content',
					),
	    		)
	    	));

	    	vc_map(array(
	    		'name'                    => esc_html__('Testimonial alternative','goodresto'),
	    		'description'             => esc_html__('Insert testimonials','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_testimonial_alt',
	    		'class'                   => 'et_testimonial_alt',
	    		'icon'                    => 'et_testimonial',
	    		'content_element'         => true,
	    		'show_settings_on_create' => true,
				'is_container'            => true,
	    		'as_parent'               => array('only' => 'et_testimonial_alt_item'),
				'js_view'                 => 'VcColumnView',
	    		'params'                  => array(
					array(
						'param_name'=>'navigation_type',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Navigation type', 'goodresto'), 
						'value'     => array(
							esc_html__('Only arrows','goodresto')  => 'only-arrows',
							esc_html__('Only dottes','goodresto')  => 'only-dottes',
							esc_html__('Both arrows and dottes','goodresto')  => 'both'
						),
					),
	    		)
	    	));

			vc_map(array(
	    		'name'                    => esc_html__('Testimonial','goodresto'),
	    		'base'                    => 'et_testimonial_alt_item',
	    		'icon'                    => 'et_testimonial_item',
	    		'as_child'                => array('only' => 'et_testimonial_alt'),
	    		'content_element'         => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'attach_image',
						
						'heading'    => esc_html__('Upload image','goodresto'),
						'param_name' => 'image',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Title','goodresto'),
						'param_name' => 'title',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Highlights','goodresto'),
						'param_name' => 'highlights',
						'value'      => ''
					),
					array(
						'param_name'=>'rating',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Rating', 'goodresto'), 
						'value'     => array(
							esc_html__('None', 'goodresto') => 'none', 
							esc_html__('Poor', 'goodresto') => 'poor', 
							esc_html__('Fair', 'goodresto') => 'fair', 
							esc_html__('Average', 'goodresto') => 'average', 
							esc_html__('Good', 'goodresto') => 'good', 
							esc_html__('Excellent', 'goodresto') => 'excellent', 
						)
					),
					array(
						'type'       => 'textarea_html',
						'heading'    => esc_html__('Content','goodresto'),
						'param_name' => 'content',
					),
	    		)
	    	));

		/* clients
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Clients','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'description'             => esc_html__('Insert clients','goodresto'),
	    		'base'                    => 'et_client',
	    		'class'                   => 'et_client',
	    		'icon'                    => 'et_client',
	    		'content_element'         => true,
	    		'show_settings_on_create' => true,
				'is_container'            => true,
	    		'as_parent'               => array('only' => 'et_client_item'),
				'js_view'                 => 'VcColumnView',
	    		'params'                  => array(
	    			array(
						'param_name'=>'layout',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Layout', 'goodresto'), 
						'value'     => $layout_type_values
					),
					array(
						'param_name'=>'column',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Column', 'goodresto'), 
						'value'     => array(
							'1'  => '1',
							'2'  => '2',
							'3'  => '3',
							'4'  => '4',
							'5'  => '5',
							'6'  => '6',
							'7'  => '7',
							'8'  => '8',
							'9'  => '9',
							'10' => '10'
						)
					),
					array(
						'param_name'=>'gap',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Gap', 'goodresto'), 
						'value'     => $gap_values
					),
					array(
	    				'type'       => 'colorpicker',
						'heading'    => esc_html__('Client box background color','goodresto'),
						'param_name' => 'box_back',
						'value'      => '',
					),
					array(
	    				'type'       => 'colorpicker',
						'heading'    => esc_html__('Client box border color','goodresto'),
						'param_name' => 'box_border',
						'value'      => '',
					),
	    		)
	    	));

			vc_map(array(
	    		'name'                    => esc_html__('Client','goodresto'),
	    		'base'                    => 'et_client_item',
	    		'icon'                    => 'et_client_item',
	    		'as_child'                => array('only' => 'et_client'),
	    		'content_element'         => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'attach_image',
						'heading'    => esc_html__('Upload image','goodresto'),
						'param_name' => 'image',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Link','goodresto'),
						'param_name' => 'link',
						'value'      => ''
					),
					array(
						'param_name'=>'link_target',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Link target', 'goodresto'), 
						'value'     => array(
							'_self'  => '_self',
							'_blank' => '_blank' 
						)
					),
	    		)
	    	));

		/* tagline
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Tagline','goodresto'),
	    		'description'             => esc_html__('Insert tagline (call to action block with button)','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_tagline',
	    		'class'                   => 'et_tagline',
	    		'icon'                    => 'et_tagline',
	    		'show_settings_on_create' => true,
	    		'js_view'                 => '',
	    		'params'                  => array(
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Title','goodresto'),
						'param_name' => 'title',
						'value'      => 'Call to action title',
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Tagline title color','goodresto'),
						'param_name' => 'title_color',
						'value'      => '#ffffff'
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Tagline background color','goodresto'),
						'param_name' => 'back_color',
						'value'      => '#d3a471'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button text','goodresto'),
						'group'      => esc_html__('Button','goodresto'),
						'param_name' => 'button_text',
						'value'      => 'Read more',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button link','goodresto'),
						'group'      => esc_html__('Button','goodresto'),
						'param_name' => 'button_link',
						'value'      => '#link',
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Button color','goodresto'),
						'group'      => esc_html__('Button','goodresto'),
						'param_name' => 'button_color',
						'value'      => '#212121'
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Button background color','goodresto'),
						'group'      => esc_html__('Button','goodresto'),
						'param_name' => 'button_back_color',
						'value'      => '#ffffff'
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Button color hover','goodresto'),
						'group'      => esc_html__('Button','goodresto'),
						'param_name' => 'button_color_hover',
						'value'      => '#212121'
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Button background color hover','goodresto'),
						'group'      => esc_html__('Button','goodresto'),
						'param_name' => 'button_back_color_hover',
						'value'      => '#ffffff'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon prefix','goodresto'),
						'group'      => esc_html__('Icon','goodresto'),
						'param_name' => 'icon_prefix',
						'value'      => '',
						'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','goodresto')
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon name','goodresto'),
						'group'      => esc_html__('Icon','goodresto'),
						'param_name' => 'icon_name',
						'value'      => '',
						'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','goodresto')
					),
	    			array(
						'param_name'=>'icon_size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Icon size', 'goodresto'),
						'group'      => esc_html__('Icon','goodresto'), 
						'value'     => $size_values_default
					)
	    		)
	    	));

		/* pricing table
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Pricing table','goodresto'),
	    		'description'             => esc_html__('Insert pricing table','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_pricing',
	    		'class'                   => 'et_pricing',
	    		'icon'                    => 'et_pricing',
	    		'show_settings_on_create' => true,
	    		'content_element'         => true,
				'is_container'            => true,
				'as_parent'               => array('only' => 'et_pricing_item'),
				'js_view'                 => 'VcColumnView',
	    		'params'                  => array(
					array(
						'param_name'=>'column',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Column', 'goodresto'), 
						'value'     => array(
							'1'  => '1',
							'2'  => '2',
							'3'  => '3',
							'4'  => '4',
							'5'  => '5'
						)
					),
					array(
						'param_name'=>'gap',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Columns gap', 'goodresto'), 
						'value'     => $gap_values,
						'std'       => '0'
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Highlight color','goodresto'),
						'param_name' => 'highlight_color',
						'value'      => '#d3a471'
					)
	    		)
	    	));

			vc_map(array(
	    		'name'                    => esc_html__('Pricing table column','goodresto'),
	    		'base'                    => 'et_pricing_item',
	    		'icon'                    => 'et_pricing_item',
	    		'as_child'                => array('only' => 'et_pricing'),
	    		'content_element'         => true,
	    		'params'                  => array(
	    			array(
	    				'type'       => 'checkbox',
						'heading'    => esc_html__('Highlight', 'goodresto'),
						'param_name' => 'highlight',
						'value'      => '',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Label','goodresto'),
						'param_name' => 'label',
						'value'      => ''
					),
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Title','goodresto'),
						'param_name' => 'title',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Currency','goodresto'),
						'param_name' => 'currency',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Price','goodresto'),
						'param_name' => 'price',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Plan','goodresto'),
						'param_name' => 'plan',
						'value'      => ''
					),
					array(
						'type'       => 'textarea',
						'heading'    => esc_html__('List items','goodresto'),
						'param_name' => 'content',
						'value'      => '',
						'description' => esc_html__('Use line break (press Enter) to separate between items','goodresto'),
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button text','goodresto'),
						'param_name' => 'button_text',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Button link','goodresto'),
						'param_name' => 'button_link',
						'value'      => ''
					),
					array(
						'param_name'=>'target',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Target', 'goodresto'), 
						'value'     => array(
							'_self'  => '_self',
							'_blank' => '_blank' 
						)
					),
	    		)
	    	));
	
		/* banner
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Popup banner','goodresto'),
	    		'description'             => esc_html__('Insert popup banner (if you want to have the popup in entire site, put the banner inside footer)','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_banner',
	    		'class'                   => 'et_banner',
	    		'icon'                    => 'et_banner',
	    		"as_parent"               => array('except' => 'vc_row, vc_section'),
				"js_view"                 => 'VcColumnView',
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array(
	    				'type'       => 'checkbox',
						'heading'    => esc_html__('Visible on mobile', 'goodresto'),
						'param_name' => 'visible_mob',
						'value'      => '',
						'description'=> esc_html__('Check this option if you want to display banner on mobile', 'goodresto'),
					),
					array(
	    				'type'       => 'checkbox',
						'heading'    => esc_html__('Visible on tablet', 'goodresto'),
						'param_name' => 'visible_tablet',
						'value'      => '',
						'description'=> esc_html__('Check this option if you want to display tablet on mobile', 'goodresto'),
					),
					array(
	    				'type'       => 'checkbox',
						'heading'    => esc_html__('Use cookie', 'goodresto'),
						'param_name' => 'cookie',
						'value'      => '',
						'description'=> esc_html__('Toggle this option if you want to display your banner onces per visit session', 'goodresto'),
					),
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Delay in ms','goodresto'),
						'param_name' => 'delay',
						'value'      => '3000',
					),
					array(
						'param_name'=>'effect',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Effect', 'goodresto'),
						'value'     => array(
							esc_html__('Fade in and scale', 'goodresto') => 'fade-in-scale', 
							esc_html__('Slide in right', 'goodresto')  	 => 'slide-in-right', 
							esc_html__('Slide in bottom', 'goodresto')   => 'slide-in-bottom', 
							esc_html__('3d flip horizontal', 'goodresto')=> 'flip-horizonatal',
							esc_html__('3d flip vertical', 'goodresto')  => 'flip-vertical'
						)
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Width in px','goodresto'),
						'param_name' => 'width',
						'value'      => '720',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Height in px','goodresto'),
						'param_name' => 'height',
						'value'      => '400',
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Background color','goodresto'),
						'param_name' => 'back_color',
						'value'      => '#ffffff'
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Border color','goodresto'),
						'param_name' => 'border_color',
						'value'      => ''
					),
					array(
						'type'       => 'attach_image',
						'heading'    => esc_html__('Background image','goodresto'),
						'param_name' => 'back_img',
					),
	    		)
	    	));

		/* content boxes
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Content boxes','goodresto'),
	    		'description'             => esc_html__('Insert content boxes','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_content_box',
	    		'class'                   => 'et_content_box',
	    		'icon'                    => 'et_content_box',
	    		'show_settings_on_create' => true,
	    		'content_element'         => true,
				'is_container'            => true,
				'as_parent'               => array('only' => 'et_box_item'),
				'js_view'                 => 'VcColumnView',
	    		'params'                  => array(
					array(
						'param_name'=>'column',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Column', 'goodresto'), 
						'value'     => array(
							'1'  => '1',
							'2'  => '2',
							'3'  => '3',
							'4'  => '4',
						)
					),
					array(
						'param_name'=>'gap',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Box gap', 'goodresto'), 
						'value'     => $gap_values,
						'std'       => '40'
					),
					array(
						'param_name'=>'animation_type',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Box animation type', 'goodresto'), 
						'value'     => $animation_type_values
					),
	    			array(
						'param_name'=>'animation_effect',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Box animation effect', 'goodresto'),
						'value'     => $animation_values
					),
					array(
						'param_name'=>'icon_size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Box icon size', 'goodresto'), 
						'group'     => esc_html__('Box icon', 'goodresto'), 
						'value'     => $size_values_default,
						'std'       => 'medium'
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon border radius (without any string)','goodresto'),
						'param_name' => 'icon_border_radius',
						'group'     => esc_html__('Box icon', 'goodresto'), 
						'value'      => ''
					),
					array(
						'param_name'=>'icon_alignment',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Box icon alignment', 'goodresto'),
						'group'     => esc_html__('Box icon', 'goodresto'), 
						'value'     => $align_values
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Hover animation','goodresto'),
						'group'     => esc_html__('Box icon', 'goodresto'), 
						'param_name' => 'animate_hover',
						'value'      => array(
							esc_html__('None','goodresto')  => 'none',
							esc_html__('Scale down','goodresto')  => 'scale',
							esc_html__('Scale out','goodresto')  => 'scale-out',
							esc_html__('Fill background','goodresto')  => 'fill',
							esc_html__('Glint','goodresto')  => 'glint',
						)
					),
	    		)
	    	));

			vc_map(array(
	    		'name'                    => esc_html__('Content box','goodresto'),
	    		'base'                    => 'et_box_item',
	    		'icon'                    => 'et_box_item',
	    		'as_child'                => array('only' => 'et_content_box'),
	    		"as_parent"               => array('except' => 'vc_row, vc_section'),
				"js_view"                 => 'VcColumnView',
	    		"content_element"         => true,
	    		'params'                  => array(
	    			array(
						'heading'    => esc_html__('Icon prefix','goodresto'),
						'description'=> esc_html__('If you want to use custom icons, you need to paste here the icon prefix, but if you want to use Fontawesome icons, leave this option blank','goodresto'),
						'type'       => 'textfield',
						'param_name' => 'icon_prefix',
						'value'      => '',
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon name','goodresto'),
						'param_name' => 'icon_name',
						'value'      => '',
						'description'=> esc_html__('Add icon name, for example fa-gear. Make sure you did not forget about icon prefix option','goodresto'),
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon link','goodresto'),
						'param_name' => 'icon_link',
						'value'      => '',
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon color','goodresto'),
						'param_name' => 'icon_color',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon background color','goodresto'),
						'param_name' => 'icon_back_color',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon border color','goodresto'),
						'param_name' => 'icon_border_color',
						'value'      => ''
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Icon border width (without any string)','goodresto'),
						'param_name' => 'icon_border_width',
						'value'      => ''
					),
					array(
	    				'type'       => 'checkbox',
						'heading'    => esc_html__('Box icon shadow', 'goodresto'),
						'param_name' => 'icon_shadow',
						'value'      => '',
						'description'=> esc_html__('Check this option if you want to have shadow on icon (make sure you have background or border color set)', 'goodresto'),
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon color hover','goodresto'),
						'group'    => esc_html__('Icon hover','goodresto'),
						'param_name' => 'icon_color_hover',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon background color hover','goodresto'),
						'group'    => esc_html__('Icon hover','goodresto'),
						'param_name' => 'icon_back_color_hover',
						'value'      => ''
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Icon border color hover','goodresto'),
						'group'    => esc_html__('Icon hover','goodresto'),
						'param_name' => 'icon_border_color_hover',
						'value'      => ''
					),
	    		)
	    	));

		/* split screen
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Split screen','goodresto'),
	    		'description'             => esc_html__('Insert split screen','goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_split_screen',
	    		'class'                   => 'et_split_screen',
	    		'icon'                    => 'et_split_screen',
	    		'show_settings_on_create' => false,
	    		'content_element'         => true,
				'is_container'            => true,
				'as_parent'               => array('only' => 'et_split_screen_left,et_split_screen_right'),
				'js_view'                 => 'VcColumnView',
	    		'params'                  => array()
	    	));

			vc_map(array(
	    		'name'                    => esc_html__('Split screen left part','goodresto'),
	    		'base'                    => 'et_split_screen_left',
	    		'icon'                    => 'et_split_screen_left',
	    		'as_child'                => array('only' => 'et_split_screen'),
	    		"as_parent"               => array('only' => 'et_split_screen_content'),
				"js_view"                 => 'VcColumnView',
	    		"content_element"         => true,
	    		'show_settings_on_create' => false,
	    		'params'                  => array()
	    	));

	    	vc_map(array(
	    		'name'                    => esc_html__('Split screen right part','goodresto'),
	    		'base'                    => 'et_split_screen_right',
	    		'icon'                    => 'et_split_screen_right',
	    		'as_child'                => array('only' => 'et_split_screen'),
	    		"as_parent"               => array('only' => 'et_split_screen_content'),
				"js_view"                 => 'VcColumnView',
	    		"content_element"         => true,
	    		'show_settings_on_create' => false,
	    		'params'                  => array()
	    	));

	    	vc_map(array(
	    		'name'                    => esc_html__('Split screen content','goodresto'),
	    		'base'                    => 'et_split_screen_content',
	    		'icon'                    => 'et_split_screen_content',
	    		'as_child'                => array('only' => 'et_split_screen'),
	    		"as_parent"               => array('except' => 'vc_row, vc_section, et_split_screen, et_split_screen_left, et_split_screen_right'),
				"js_view"                 => 'VcColumnView',
	    		"content_element"         => true,
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Title','goodresto'),
						'param_name' => 'title',
						'value'      => '',
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__('Background color','goodresto'),
						'param_name' => 'back_color',
						'value'      => ''
					),
					array(
						'type'       => 'attach_image',
						'heading'    => esc_html__('Background image','goodresto'),
						'param_name' => 'back_image',
						'value'      => ''
					),
					array(
						'param_name'=>'align',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Text align', 'goodresto'), 
						'value'     => $align_values
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__('Extra class','goodresto'),
						'param_name' => 'class',
						'value'      => ''
					),
	    		)
	    	));

		/* recent events
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Recent events', 'goodresto'),
	    		'description'             => esc_html__('Use this element to insert recent events', 'goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_recent_events',
	    		'class'                   => 'et_recent_events',
	    		'icon'                    => 'et_recent_events',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'param_name'=>'event_container',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Event container', 'goodresto'), 
						'value'     => array(
							esc_html__('Boxed', 'goodresto')     => 'boxed', 
							esc_html__('Wide', 'goodresto')  => 'wide', 
						)
					),
	    			array(
						'param_name'=>'event_type',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Event layout type', 'goodresto'), 
						'value'     => array(
							esc_html__('Grid', 'goodresto')     => 'grid', 
							esc_html__('Carousel', 'goodresto') => 'carousel',
							esc_html__('Simple', 'goodresto') => 'simple',
						)
					),
					array(
						'param_name'=>'gap',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Events gap', 'goodresto'), 
						'value'     => $gap_values,
						'std'       => '24',
					),
	    			array(
						'param_name'=>'event_size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Event size', 'goodresto'), 
						'value'     => $size_values_box
					),
					array(
						'param_name'=>'event_animation_effect',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Event animation effect', 'goodresto'),
						'value'     => $animation_values,
						'dependency' => Array(
							'element' => 'event_type', 'value' => array('grid','masonry2'),
						)
					),
					array(
						'param_name'=>'event_limit',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Limit events to certain events?', 'goodresto'), 
						'value'     => $logic_values,
						'dependency' => Array('element' => 'event_type', 'value' => array('grid','masonry2'))
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Events', 'goodresto' ),
						'value' => '',
						'param_name' => 'event_filter_slugs',
						'save_always' => true,
						'description' => esc_html__( "Enter comma separated events' slugs if you want to show certain events", 'goodresto' ),
						'dependency' => Array('element' => 'event_limit', 'value' => 'true')
					),
					array(
	    				'type'       => 'textfield',
						'heading'    => esc_html__('Event number', 'goodresto'),
						'param_name' => 'event_number',
						'value'      => '6',
						'dependency' => Array('element' => 'event_limit', 'value' => 'false')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Category', 'goodresto' ),
						'value' => '',
						'param_name' => 'category',
						'save_always' => true,
						'description' => esc_html__( 'Enter comma separated categories slugs if you want to show certain categories', 'goodresto' ),
						'dependency' => Array('element' => 'event_limit', 'value' => 'false')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Operator', 'goodresto' ),
						'param_name' => 'operator',
						'value' => $operator_values,
						'save_always' => true,
						'description' => esc_html__( 'Select filter operator', 'goodresto' ),
						'dependency' => Array('element' => 'category', 'not_empty' => true)
					),
					array(
	    				'type'       => 'checkbox',
						'heading'    => esc_html__('Event filter', 'goodresto'),
						'param_name' => 'event_filter',
						'value'      => '',
						'description'=> esc_html__('Check this option if you want to have event filter', 'goodresto'),
						'dependency' => Array(
							'element' => 'event_type', 'value' => array('grid','masonry2'),
							'element' => 'category', 'not_empty' => false,
							'element' => 'event_limit', 'value' => 'false'
						)
					)
	    		)
	    	));

    	/* recent posts
		---------------*/

			vc_map(array(
	    		'name'                    => esc_html__('Recent posts', 'goodresto'),
	    		'description'             => esc_html__('Use this element to insert recent posts', 'goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_recent_posts',
	    		'class'                   => 'et_recent_posts',
	    		'icon'                    => 'et_recent_posts',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'param_name'=>'post_type',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Post layout type', 'goodresto'), 
						'value'     => array(
							esc_html__('Grid', 'goodresto') => 'grid',
							esc_html__('Masonry 1', 'goodresto') => 'masonry1',
							esc_html__('Masonry 2', 'goodresto') => 'masonry2',
							esc_html__('List', 'goodresto') => 'list',
							esc_html__('Carousel', 'goodresto') => 'carousel',
							esc_html__('Simple', 'goodresto') => 'simple',
						)
					),
	    			array(
						'param_name'=>'post_size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Post size', 'goodresto'), 
						'value'     => $size_values_box,
						'dependency' => Array('element' => 'post_type', 'value' => array('grid','masonry1','masonry2','carousel'))
					),
					array(
						'param_name'=>'post_animation_effect',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Post animation effect', 'goodresto'),
						'value'     => $animation_values,
						'dependency' => Array('element' => 'post_type', 'value' => array('grid','masonry1','masonry2'))
					),
					array(
						'param_name' =>'post_excerpt',
						'type'       => 'textfield',
						'heading'    => esc_html__('Post excerpt length', 'goodresto'),
						'value'      => '104',
						'dependency' => Array('element' => 'post_type', 'value' => array('grid','masonry1','masonry2','carousel','list'))
					),
					array(
						'param_name'=>'post_filter',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Limit posts to certain posts?', 'goodresto'), 
						'value'     => $logic_values
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Posts', 'goodresto' ),
						'value' => '',
						'param_name' => 'post_filter_slugs',
						'save_always' => true,
						'description' => esc_html__( 'Enter comma separated post slugs if you want to show certain posts', 'goodresto' ),
						'dependency' => Array('element' => 'post_filter', 'value' => 'true')
					),
					array(
	    				'type'       => 'textfield',
						'heading'    => esc_html__('Post number', 'goodresto'),
						'param_name' => 'post_number',
						'value'      => '6',
						'dependency' => Array('element' => 'post_filter', 'value' => 'false')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Category', 'goodresto' ),
						'value' => '',
						'param_name' => 'post_cat',
						'save_always' => true,
						'description' => esc_html__( 'Enter comma separated categories slugs if you want to show certain categories', 'goodresto' ),
						'dependency' => Array('element' => 'post_filter', 'value' => 'false')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Operator', 'goodresto' ),
						'param_name' => 'operator',
						'value' => $operator_values,
						'save_always' => true,
						'description' => esc_html__( 'Select filter operator', 'goodresto' ),
						'dependency' => Array('element' => 'post_cat', 'not_empty' => true)
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order by', 'goodresto' ),
						'param_name' => 'orderby',
						'value' => $order_by_values,
						'save_always' => true,
						'description' => sprintf( esc_html__( 'Select how to sort retrieved posts. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Sort order', 'goodresto' ),
						'param_name' => 'order',
						'value' => $order_way_values,
						'save_always' => true,
						'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
					),
	    		)
	    	));

		/* restaurant menu
		---------------*/

			$restaurant_menu_categories = array(
				esc_html__('All','goodresto')  => 'all',
			);

			$args = array(
			    'orderby'           => 'name', 
			    'order'             => 'ASC',
			    'hide_empty'        => true, 
			    'exclude'           => array(), 
			    'exclude_tree'      => array(), 
			    'number'            => '', 
			    'fields'            => 'all', 
			    'slug'              => '', 
			    'parent'            => '',
			    'hierarchical'      => false, 
			    'child_of'          => 0, 
			    'get'               => '', 
			    'name__like'        => '',
			    'description__like' => '',
			    'pad_counts'        => false, 
			    'offset'            => '', 
			    'search'            => '', 
			    'cache_domain'      => 'core'
			);
			$tax_terms = get_terms('menu-category');

			if (count($tax_terms) != 0){
            	foreach(get_terms('menu-category',$args) as $filter_term){
        			$filter_count    = $filter_term->count;
        			$filter_children = get_term_children( $filter_term->term_id, 'menu-category' );
        			if(is_array($filter_children) && !empty($filter_children)) {
        				foreach ($filter_children as $filter_child) {
        					$filter_child_obj = get_term($filter_child, 'menu-category');
        					$filter_count = $filter_count + $filter_child_obj->count;
        				}
        			}

        			$restaurant_menu_categories[$filter_term->name] = $filter_term->slug;
	            }
			}

			vc_map(array(
	    		'name'                    => esc_html__('Restaurant menu', 'goodresto'),
	    		'description'             => esc_html__('Use this element to insert restaurant menu', 'goodresto'),
	    		'category'                => esc_html__('Enovathemes','goodresto'),
	    		'base'                    => 'et_restaurant_menu',
	    		'class'                   => 'et_restaurant_menu',
	    		'icon'                    => 'et_restaurant_menu',
	    		'show_settings_on_create' => true,
	    		'params'                  => array(
	    			array(
						'param_name'=>'menu_container',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Event container', 'goodresto'), 
						'value'     => array(
							esc_html__('Boxed', 'goodresto')     => 'boxed', 
							esc_html__('Wide', 'goodresto')  => 'wide', 
						)
					),
	    			array(
						'param_name'=>'menu_post_layout',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Event layout type', 'goodresto'), 
						'value'     => array(
							esc_html__('Grid', 'goodresto')     => 'grid', 
							esc_html__('Masonry', 'goodresto')     => 'masonry2', 
							esc_html__('Carousel', 'goodresto') => 'carousel',
							esc_html__('List with image', 'goodresto') => 'list',
							esc_html__('List without image', 'goodresto') => 'list2',
						)
					),
	    			array(
						'param_name'=>'menu_post_size',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Menu post size', 'goodresto'), 
						'value'     => $size_values_box
					),
					array(
						'param_name'=>'menu_animation_effect',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Event animation effect', 'goodresto'),
						'value'     => $animation_values,
						'dependency' => Array(
							'element' => 'menu_post_layout', 'value' => array('grid','masonry2','list','list2'),
						)
					),
					array(
						'param_name'=>'menu_limit',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Limit menu items to certain menu items?', 'goodresto'), 
						'value'     => $logic_values
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Menu items', 'goodresto' ),
						'value' => '',
						'param_name' => 'menu_filter_slugs',
						'save_always' => true,
						'description' => esc_html__( "Enter comma separated menu items' slugs if you want to show certain menu items", 'goodresto' ),
						'dependency' => Array('element' => 'menu_limit', 'value' => 'true')
					),
					array(
	    				'type'       => 'textfield',
						'heading'    => esc_html__('Menu number', 'goodresto'),
						'param_name' => 'menu_number',
						'value'      => '6',
						'dependency' => Array('element' => 'menu_limit', 'value' => 'false')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Category', 'goodresto' ),
						'value' => '',
						'param_name' => 'category',
						'save_always' => true,
						'description' => esc_html__( 'Enter comma separated categories slugs if you want to show certain categories', 'goodresto' ),
						'dependency' => Array('element' => 'menu_limit', 'value' => 'false')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Operator', 'goodresto' ),
						'param_name' => 'operator',
						'value' => $operator_values,
						'save_always' => true,
						'description' => esc_html__( 'Select filter operator', 'goodresto' ),
						'dependency' => Array('element' => 'category', 'not_empty' => true)
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Order by', 'goodresto' ),
						'param_name' => 'orderby',
						'value' => $order_by_values,
						'save_always' => true,
						'description' => sprintf( esc_html__( 'Select how to sort retrieved menu items. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Sort order', 'goodresto' ),
						'param_name' => 'order',
						'value' => $order_way_values,
						'save_always' => true,
						'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
					),
					array(
	    				'type'       => 'checkbox',
						'heading'    => esc_html__('Menu filter', 'goodresto'),
						'param_name' => 'menu_filter',
						'value'      => '',
						'description'=> esc_html__('Check this option if you want to have menu filter', 'goodresto'),
						'dependency' => Array(
							'element' => 'menu_post_layout', 'value' => array('grid','masonry2','list','list2'),
							'element' => 'category', 'not_empty' => false,
							'element' => 'menu_limit', 'value' => 'false'
						)
					),
					array(
						'param_name'=>'default_filter',
						'type'      => 'dropdown',
						'heading'   => esc_html__('Define default filter', 'goodresto'), 
						'value'     => $restaurant_menu_categories,
						'dependency' => Array('element' => 'menu_filter', 'value' => 'true')
					),
	    		)
	    	));

		if (class_exists('Woocommerce')){

			$cat_args = array(
				'orderby'    => 'name',
			    'order'      => 'asc',
			    'hide_empty' => false
			);

			$category_values = array();
			$category_list   = get_terms( 'product_cat', $cat_args );
			if( !empty($category_list) ){

			    foreach ($category_list as $category) {
			    	if ($category->parent) {
			    		$category_values[' - '.$category->name] = $category->slug;
			    	} else {
			    		$category_values[$category->name] = $category->slug;
			    	}
			    }
			}

			$attributes_tax = wc_get_attribute_taxonomies();
			$attributes = array();
			foreach ( $attributes_tax as $attribute ) {
				$attributes[ $attribute->attribute_label ] = $attribute->attribute_name;
			}

		    /* woocommerce cart
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Woocommerce AJAX cart','goodresto'),
		    		'description'             => esc_html__('Insert AJAX add to cart','goodresto'),
		    		'category'                => array(esc_html__('WooCommerce','goodresto'),esc_html__('Enovathemes','goodresto')),
		    		'base'                    => 'et_cart',
		    		'class'                   => 'et_cart',
		    		'icon'                    => 'et_cart',
		    		'show_settings_on_create' => false,
		    	));

		    /* woocommerce recent products
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Recent products','goodresto'),
		    		'description'             => esc_html__('Lists recent products','goodresto'),
		    		'category'                => array(esc_html__('WooCommerce','goodresto'),esc_html__('Enovathemes','goodresto')),
		    		'base'                    => 'et_recent_products',
		    		'class'                   => 'et_recent_products',
		    		'icon'                    => 'et_recent_products',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
		    			array(
							'param_name'=>'post_type',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product layout type', 'goodresto'), 
							'value'     => array(
								esc_html__('Grid', 'goodresto')     => 'grid', 
								esc_html__('Masonry', 'goodresto')  => 'masonry1', 
								esc_html__('Carousel', 'goodresto') => 'carousel',
							)
						),
						array(
							'param_name'=>'product_animation_effect',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product animation effect', 'goodresto'),
							'value'     => $animation_values,
							'dependency' => Array('element' => 'post_type', 'value' => array('grid','masonry1'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Columns', 'goodresto' ),
							'value'     => $size_values_box,
							'param_name' => 'post_size',
							'save_always' => true
						),
		    			array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Per page', 'goodresto' ),
							'value' => 12,
							'save_always' => true,
							'param_name' => "per_page",
							'description' => esc_html__( 'The "per_page" shortcode determines how many products to show on the page', 'goodresto' ),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Category', 'goodresto' ),
							'value' => '',
							'param_name' => 'category',
							'save_always' => true,
							'description' => esc_html__( 'Enter comma separated categories slugs if you want to show certain categories', 'goodresto' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Operator', 'goodresto' ),
							'param_name' => 'operator',
							'value' => $operator_values,
							'save_always' => true,
							'description' => esc_html__( 'Select filter operator', 'goodresto' ),
							'dependency' => Array('element' => 'category', 'not_empty' => true)
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Order by', 'goodresto' ),
							'param_name' => 'orderby',
							'value' => $order_by_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Sort order', 'goodresto' ),
							'param_name' => 'order',
							'value' => $order_way_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
						array(
		    				'type'       => 'checkbox',
							'heading'    => esc_html__('Product filter', 'goodresto'),
							'param_name' => 'product_filter',
							'value'      => '',
							'description'=> esc_html__('Check this option if you want to have event filter', 'goodresto'),
							'dependency' => Array(
								'element' => 'post_type', 'value' => array('grid','masonry1'),
							)
						)
	    			)
		    	));

		    /* woocommerce featured products
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Featured products','goodresto'),
		    		'description'             => esc_html__('Lists featured products','goodresto'),
		    		'category'                => array(esc_html__('WooCommerce','goodresto'),esc_html__('Enovathemes','goodresto')),
		    		'base'                    => 'et_featured_products',
		    		'class'                   => 'et_featured_products',
		    		'icon'                    => 'et_featured_products',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
		    			array(
							'param_name'=>'post_type',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product layout type', 'goodresto'), 
							'value'     => array(
								esc_html__('Grid', 'goodresto')     => 'grid', 
								esc_html__('Masonry', 'goodresto')  => 'masonry1', 
								esc_html__('Carousel', 'goodresto') => 'carousel',
							)
						),
						array(
							'param_name'=>'product_animation_effect',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product animation effect', 'goodresto'),
							'value'     => $animation_values,
							'dependency' => Array('element' => 'post_type', 'value' => array('grid','masonry1'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Columns', 'goodresto' ),
							'value'     => $size_values_box,
							'param_name' => 'post_size',
							'save_always' => true
						),
		    			array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Per page', 'goodresto' ),
							'value' => 12,
							'save_always' => true,
							'param_name' => "per_page",
							'description' => esc_html__( 'The "per_page" shortcode determines how many products to show on the page', 'goodresto' ),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Category', 'goodresto' ),
							'value' => '',
							'param_name' => 'category',
							'save_always' => true,
							'description' => esc_html__( 'Enter comma separated categories slugs if you want to show certain categories', 'goodresto' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Operator', 'goodresto' ),
							'param_name' => 'operator',
							'value' => $operator_values,
							'save_always' => true,
							'description' => esc_html__( 'Select filter operator', 'goodresto' ),
							'dependency' => Array('element' => 'category', 'not_empty' => true)
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Order by', 'goodresto' ),
							'param_name' => 'orderby',
							'value' => $order_by_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Sort order', 'goodresto' ),
							'param_name' => 'order',
							'value' => $order_way_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
	    			)
		    	));

		    /* woocommerce sale products
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Sale products','goodresto'),
		    		'description'             => esc_html__('Lists sale products','goodresto'),
		    		'category'                => array(esc_html__('WooCommerce','goodresto'),esc_html__('Enovathemes','goodresto')),
		    		'base'                    => 'et_sale_products',
		    		'class'                   => 'et_sale_products',
		    		'icon'                    => 'et_sale_products',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
		    			array(
							'param_name'=>'post_type',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product layout type', 'goodresto'), 
							'value'     => array(
								esc_html__('Grid', 'goodresto')     => 'grid', 
								esc_html__('Masonry', 'goodresto')  => 'masonry1', 
								esc_html__('Carousel', 'goodresto') => 'carousel',
							)
						),
						array(
							'param_name'=>'product_animation_effect',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product animation effect', 'goodresto'),
							'value'     => $animation_values,
							'dependency' => Array('element' => 'post_type', 'value' => array('grid','masonry1'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Columns', 'goodresto' ),
							'value'     => $size_values_box,
							'param_name' => 'post_size',
							'save_always' => true
						),
		    			array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Per page', 'goodresto' ),
							'value' => 12,
							'save_always' => true,
							'param_name' => "per_page",
							'description' => esc_html__( 'The "per_page" shortcode determines how many products to show on the page', 'goodresto' ),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Category', 'goodresto' ),
							'value' => '',
							'param_name' => 'category',
							'save_always' => true,
							'description' => esc_html__( 'Enter comma separated categories slugs if you want to show certain categories', 'goodresto' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Operator', 'goodresto' ),
							'param_name' => 'operator',
							'value' => $operator_values,
							'save_always' => true,
							'description' => esc_html__( 'Select filter operator', 'goodresto' ),
							'dependency' => Array('element' => 'category', 'not_empty' => true)
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Order by', 'goodresto' ),
							'param_name' => 'orderby',
							'value' => $order_by_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Sort order', 'goodresto' ),
							'param_name' => 'order',
							'value' => $order_way_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
	    			)
		    	));

		    /* woocommerce best selling products
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Best selling products','goodresto'),
		    		'description'             => esc_html__('Lists best selling products','goodresto'),
		    		'category'                => array(esc_html__('WooCommerce','goodresto'),esc_html__('Enovathemes','goodresto')),
		    		'base'                    => 'et_best_selling_products',
		    		'class'                   => 'et_best_selling_products',
		    		'icon'                    => 'et_best_selling_products',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
		    			array(
							'param_name'=>'post_type',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product layout type', 'goodresto'), 
							'value'     => array(
								esc_html__('Grid', 'goodresto')     => 'grid', 
								esc_html__('Masonry', 'goodresto')  => 'masonry1', 
								esc_html__('Carousel', 'goodresto') => 'carousel',
							)
						),
						array(
							'param_name'=>'product_animation_effect',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product animation effect', 'goodresto'),
							'value'     => $animation_values,
							'dependency' => Array('element' => 'post_type', 'value' => array('grid','masonry1'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Columns', 'goodresto' ),
							'value'     => $size_values_box,
							'param_name' => 'post_size',
							'save_always' => true
						),
		    			array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Per page', 'goodresto' ),
							'value' => 12,
							'save_always' => true,
							'param_name' => "per_page",
							'description' => esc_html__( 'The "per_page" shortcode determines how many products to show on the page', 'goodresto' ),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Category', 'goodresto' ),
							'value' => '',
							'param_name' => 'category',
							'save_always' => true,
							'description' => esc_html__( 'Enter comma separated categories slugs if you want to show certain categories', 'goodresto' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Operator', 'goodresto' ),
							'param_name' => 'operator',
							'value' => $operator_values,
							'save_always' => true,
							'description' => esc_html__( 'Select filter operator', 'goodresto' ),
							'dependency' => Array('element' => 'category', 'not_empty' => true)
						),
	    			)
		    	));

		    /* woocommerce top rated products
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Top rated products','goodresto'),
		    		'description'             => esc_html__('Lists top rated products','goodresto'),
		    		'category'                => array(esc_html__('WooCommerce','goodresto'),esc_html__('Enovathemes','goodresto')),
		    		'base'                    => 'et_top_rated_products',
		    		'class'                   => 'et_top_rated_products',
		    		'icon'                    => 'et_top_rated_products',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
		    			array(
							'param_name'=>'post_type',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product layout type', 'goodresto'), 
							'value'     => array(
								esc_html__('Grid', 'goodresto')     => 'grid', 
								esc_html__('Masonry', 'goodresto')  => 'masonry1', 
								esc_html__('Carousel', 'goodresto') => 'carousel',
							)
						),
						array(
							'param_name'=>'product_animation_effect',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product animation effect', 'goodresto'),
							'value'     => $animation_values,
							'dependency' => Array('element' => 'post_type', 'value' => array('grid','masonry1'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Columns', 'goodresto' ),
							'value'     => $size_values_box,
							'param_name' => 'post_size',
							'save_always' => true
						),
		    			array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Per page', 'goodresto' ),
							'value' => 12,
							'save_always' => true,
							'param_name' => "per_page",
							'description' => esc_html__( 'The "per_page" shortcode determines how many products to show on the page', 'goodresto' ),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Category', 'goodresto' ),
							'value' => '',
							'param_name' => 'category',
							'save_always' => true,
							'description' => esc_html__( 'Enter comma separated categories slugs if you want to show certain categories', 'goodresto' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Operator', 'goodresto' ),
							'param_name' => 'operator',
							'value' => $operator_values,
							'save_always' => true,
							'description' => esc_html__( 'Select filter operator', 'goodresto' ),
							'dependency' => Array('element' => 'category', 'not_empty' => true)
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Order by', 'goodresto' ),
							'param_name' => 'orderby',
							'value' => $order_by_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Sort order', 'goodresto' ),
							'param_name' => 'order',
							'value' => $order_way_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
	    			)
		    	));
		
		    /* woocommerce attribute product
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Attribute products','goodresto'),
		    		'description'             => esc_html__('List attribute products','goodresto'),
		    		'category'                => array(esc_html__('WooCommerce','goodresto'),esc_html__('Enovathemes','goodresto')),
		    		'base'                    => 'et_attribute_products',
		    		'class'                   => 'et_attribute_products',
		    		'icon'                    => 'et_attribute_products',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
		    			array(
							'param_name'=>'post_type',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product layout type', 'goodresto'), 
							'value'     => array(
								esc_html__('Grid', 'goodresto')     => 'grid', 
								esc_html__('Masonry', 'goodresto')  => 'masonry1', 
								esc_html__('Carousel', 'goodresto') => 'carousel',
							)
						),
						array(
							'param_name'=>'product_animation_effect',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product animation effect', 'goodresto'),
							'value'     => $animation_values,
							'dependency' => Array('element' => 'post_type', 'value' => array('grid','masonry1'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Columns', 'goodresto' ),
							'value'     => $size_values_box,
							'param_name' => 'post_size',
							'save_always' => true
						),
		    			array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Per page', 'goodresto' ),
							'value' => 12,
							'save_always' => true,
							'param_name' => "per_page",
							'description' => esc_html__( 'The "per_page" shortcode determines how many products to show on the page', 'goodresto' ),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Category', 'goodresto' ),
							'value' => '',
							'param_name' => 'category',
							'save_always' => true,
							'description' => esc_html__( 'Enter comma separated categories slugs if you want to show certain categories', 'goodresto' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Operator', 'goodresto' ),
							'param_name' => 'operator',
							'value' => $operator_values,
							'save_always' => true,
							'description' => esc_html__( 'Select filter operator', 'goodresto' ),
							'dependency' => Array('element' => 'category', 'not_empty' => true)
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Order by', 'goodresto' ),
							'param_name' => 'orderby',
							'value' => $order_by_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Sort order', 'goodresto' ),
							'param_name' => 'order',
							'value' => $order_way_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Attribute', 'goodresto' ),
							'param_name' => 'attribute',
							'value' => $attributes,
							'save_always' => true,
							'description' => esc_html__( 'List of product taxonomy attribute', 'goodresto' ),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Filter', 'goodresto' ),
							'value' => '',
							'param_name' => 'filter',
							'save_always' => true,
							'description' => esc_html__( 'Taxonomy values', 'goodresto' ),
						),
	    			)
		    	));
		
		    /* woocommerce related products
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Related products','goodresto'),
		    		'description'             => esc_html__('Lists related products','goodresto'),
		    		'category'                => array(esc_html__('WooCommerce','goodresto'),esc_html__('Enovathemes','goodresto')),
		    		'base'                    => 'et_related_products',
		    		'class'                   => 'et_related_products',
		    		'icon'                    => 'et_related_products',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
		    			array(
							'param_name'=>'post_type',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product layout type', 'goodresto'), 
							'value'     => array(
								esc_html__('Grid', 'goodresto')     => 'grid', 
								esc_html__('Masonry', 'goodresto')  => 'masonry1', 
								esc_html__('Carousel', 'goodresto') => 'carousel',
							)
						),
						array(
							'param_name'=>'product_animation_effect',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product animation effect', 'goodresto'),
							'value'     => $animation_values,
							'dependency' => Array('element' => 'post_type', 'value' => array('grid','masonry1'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Columns', 'goodresto' ),
							'value'     => $size_values_box,
							'param_name' => 'post_size',
							'save_always' => true
						),
		    			array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Per page', 'goodresto' ),
							'value' => 12,
							'save_always' => true,
							'param_name' => "per_page",
							'description' => esc_html__( 'The "per_page" shortcode determines how many products to show on the page', 'goodresto' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Order by', 'goodresto' ),
							'param_name' => 'orderby',
							'value' => $order_by_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Sort order', 'goodresto' ),
							'param_name' => 'order',
							'value' => $order_way_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
	    			)
		    	));
		
		    /* woocommerce product
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Product','goodresto'),
		    		'description'             => esc_html__('Show a single product by ID','goodresto'),
		    		'category'                => array(esc_html__('WooCommerce','goodresto'),esc_html__('Enovathemes','goodresto')),
		    		'base'                    => 'et_product',
		    		'class'                   => 'et_product',
		    		'icon'                    => 'et_product',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
		    			array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Select identificator', 'goodresto' ),
							'param_name'  => 'id',
							'description' => esc_html__( 'Input product ID', 'goodresto' ),
						)
	    			)
		    	));
		
		    /* woocommerce products
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Products','goodresto'),
		    		'description'             => esc_html__('Show multiple products by ID','goodresto'),
		    		'category'                => array(esc_html__('WooCommerce','goodresto'),esc_html__('Enovathemes','goodresto')),
		    		'base'                    => 'et_products',
		    		'class'                   => 'et_products',
		    		'icon'                    => 'et_products',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
		    			array(
							'param_name'=>'post_type',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product layout type', 'goodresto'), 
							'value'     => array(
								esc_html__('Grid', 'goodresto')     => 'grid', 
								esc_html__('Masonry', 'goodresto')  => 'masonry1', 
								esc_html__('Carousel', 'goodresto') => 'carousel',
							)
						),
						array(
							'param_name'=>'product_animation_effect',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product animation effect', 'goodresto'),
							'value'     => $animation_values,
							'dependency' => Array('element' => 'post_type', 'value' => array('grid','masonry1'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Columns', 'goodresto' ),
							'value'     => $size_values_box,
							'param_name' => 'post_size',
							'save_always' => true
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Products', 'goodresto' ),
							'value' => '',
							'param_name' => 'ids',
							'save_always' => true,
							'description' => esc_html__( 'Enter comma separated products ids', 'goodresto' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Order by', 'goodresto' ),
							'param_name' => 'orderby',
							'value' => $order_by_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Sort order', 'goodresto' ),
							'param_name' => 'order',
							'value' => $order_way_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
	    			)
		    	));
		
		    /* woocommerce category
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Product category','goodresto'),
		    		'description'             => esc_html__('Show multiple products in a category','goodresto'),
		    		'category'                => array(esc_html__('WooCommerce','goodresto'),esc_html__('Enovathemes','goodresto')),
		    		'base'                    => 'et_product_category',
		    		'class'                   => 'et_product_category',
		    		'icon'                    => 'et_product_category',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
		    			array(
							'param_name'=>'post_type',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product layout type', 'goodresto'), 
							'value'     => array(
								esc_html__('Grid', 'goodresto')     => 'grid', 
								esc_html__('Masonry', 'goodresto')  => 'masonry1', 
								esc_html__('Carousel', 'goodresto') => 'carousel',
							)
						),
						array(
							'param_name'=>'product_animation_effect',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product animation effect', 'goodresto'),
							'value'     => $animation_values,
							'dependency' => Array('element' => 'post_type', 'value' => array('grid','masonry1'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Columns', 'goodresto' ),
							'value'     => $size_values_box,
							'param_name' => 'post_size',
							'save_always' => true
						),
		    			array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Per page', 'goodresto' ),
							'value' => 12,
							'save_always' => true,
							'param_name' => "per_page",
							'description' => esc_html__( 'The "per_page" shortcode determines how many products to show on the page', 'goodresto' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Category', 'goodresto' ),
							'value' => $category_values,
							'param_name' => 'category',
							'save_always' => true,
							'description' => esc_html__( 'Product category list', 'goodresto' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Order by', 'goodresto' ),
							'param_name' => 'orderby',
							'value' => $order_by_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Sort order', 'goodresto' ),
							'param_name' => 'order',
							'value' => $order_way_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
	    			)
		    	));
		
		    /* woocommerce categories loop
			---------------*/

		    	vc_map(array(
		    		'name'                    => esc_html__('Product categories','goodresto'),
		    		'description'             => esc_html__('Display product categories loop','goodresto'),
		    		'category'                => array(esc_html__('WooCommerce','goodresto'),esc_html__('Enovathemes','goodresto')),
		    		'base'                    => 'et_product_categories',
		    		'class'                   => 'et_product_categories',
		    		'icon'                    => 'et_product_categories',
		    		'show_settings_on_create' => true,
		    		'params'                  => array(
						array(
							'param_name'=>'product_animation_effect',
							'type'      => 'dropdown',
							'heading'   => esc_html__('Product animation effect', 'goodresto'),
							'value'     => $animation_values,
							'dependency' => Array('element' => 'post_type', 'value' => array('grid','masonry1'))
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Columns', 'goodresto' ),
							'value'     => $size_values_box,
							'param_name' => 'post_size',
							'save_always' => true
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Categories', 'goodresto' ),
							'value' => '',
							'param_name' => 'category',
							'save_always' => true,
							'description' => esc_html__( 'Enter comma separated categories slugs if you want to show certain categories', 'goodresto' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Order by', 'goodresto' ),
							'param_name' => 'orderby',
							'value' => $order_by_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Select how to sort retrieved products. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Sort order', 'goodresto' ),
							'param_name' => 'order',
							'value' => $order_way_values,
							'save_always' => true,
							'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'goodresto' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						),
	    			)
		    	));
		}
	}


	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

		class WPBakeryShortCode_et_Carousel extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Carousel_Item extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Accordion extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Accordion_Item extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Tab extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Tab_Item extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Testimonial extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Testimonial_Alt extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Client extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Pricing extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Content_Box extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Box_Item extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Banner extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Image_Content extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Split_Screen extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Split_Screen_Left extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Split_Screen_Right extends WPBakeryShortCodesContainer {}
		class WPBakeryShortCode_et_Split_Screen_Content extends WPBakeryShortCodesContainer {}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_et_Client_Item extends WPBakeryShortCode {}
		class WPBakeryShortCode_et_Pricing_Item extends WPBakeryShortCode {}
		class WPBakeryShortCode_et_Testimonial_Item extends WPBakeryShortCode {}
		class WPBakeryShortCode_et_Testimonial_Item_Alt extends WPBakeryShortCode {}
	}

}

?>