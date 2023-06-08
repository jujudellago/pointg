<?php

/*  Clear extra tags from shortcodes
/*------------*/

	add_filter("the_content", "enovathemes_addons_the_content_filter");
	function enovathemes_addons_the_content_filter($content) {
	 
		$block = join("|",array("et_cart","et_gap","et_gap_inline","et_icon","et_separator","et_separator_decorative","et_separator_dottes","et_column","et_row","et_dropcap"));
	 
		$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
			
		$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
	 
		return $rep;
	 
	}

/*  gap
/*------------*/

	function et_gap( $atts, $content = null ) {
	   extract(shortcode_atts(array('height' => '32','custom_class'=>''), $atts));

		if (isset($custom_class) && !empty($custom_class)) {
			$custom_class = esc_attr($custom_class);
		}

	   return '<span class="et-gap et-clearfix '.$custom_class.'" style="height:'.absint($height).'px">&nbsp;</span>';
	}
	add_shortcode('et_gap', 'et_gap');

	function et_gap_inline( $atts, $content = null ) {
	   extract(shortcode_atts(array('width' => '32','custom_class'=>''), $atts));

		if (isset($custom_class) && !empty($custom_class)) {
			$custom_class = esc_attr($custom_class);
		}

	   return '<span class="et-gap-inline et-clearfix '.$custom_class.'" style="width:'.absint($width).'px">&nbsp;</span>';
	}
	add_shortcode('et_gap_inline', 'et_gap_inline');

/*  column/row
/*------------*/

	function et_row( $atts, $content = null ) {
	   extract(shortcode_atts(array('margin' => ''), $atts));

	   $output = '';

	   $output .= '<div class="inline-row et-clearfix" style="margin:'.esc_attr($margin).';">';
	   	$output .= do_shortcode($content);
	   $output .= '</div>';
	   
	   return $output;
	}
	add_shortcode('et_row', 'et_row');

	function et_column( $atts, $content = null ) {
	   extract(shortcode_atts(array('width' => '','padding' => ''), $atts));

	   $output = '';

	   if ($width == '33%') {
	   		$width = '33.33333333333333%';
	   }

	   $output .= '<div class="inline-column et-clearfix" style="width:'.esc_attr($width).'; padding:'.esc_attr($padding).';">';
	   	$output .= do_shortcode($content);
	   $output .= '</div>';
	   
	   return $output;
	}
	add_shortcode('et_column', 'et_column');

/*	separator
--------------*/

	function et_separator($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'top'    	  => '24',
				'bottom' 	  => '24',
				'type'   	  => 'solid',
				'color'  	  => '#e0e0e0',
				'align'  	  => 'left',
				'animate'  	  => 'false',
				'width'  	  => '',
				'height' 	  => '1',
				'class'       => ''
			), $atts)
		);

		$styles = "";
		$animation_styles = "";
		$extra_class = "";
		$output = "";

		if (isset($class) && !empty($class)) {
			$class = esc_attr($class);
		}

		if (isset($top) && !empty($top)) {
			$styles .= 'margin-top:'.absint($top).'px;';
		}

		if (isset($bottom) && !empty($bottom)) {
			$styles .= 'margin-bottom:'.absint($bottom).'px;';
		}

		if (isset($height) && !empty($height)) {
			$styles .= 'height:'.absint($height).'px;';
		}

		if (isset($width) && !empty($width)) {
			$styles .= 'width:'.absint($width).'px;';
		} else {
			$styles .= 'width:100%;';
		}

		if (isset($type) && !empty($type)) {

			if (isset($animate) && $animate == "true") {
				if (isset($width) && !empty($width)) {
					if ($width > $height) {
						$extra_class = "animate horizontal";

						$animation_styles .= 'border-bottom-style:'.$type.';';
						$animation_styles .= 'border-bottom-width:'.$height.'px;';
						if (isset($color) && !empty($color)) {
							$animation_styles .= 'border-bottom-color:'.$color.';';
						}

					} else {
						$extra_class = "animate vertical";

						$animation_styles .= 'border-left-style:'.$type.';';
						$animation_styles .= 'border-left-width:'.$width.'px;';
						if (isset($color) && !empty($color)) {
							$animation_styles .= 'border-left-color:'.$color.';';
						}
					}
				} else {

					$animation_styles .= 'border-bottom-style:'.$type.';';
					$animation_styles .= 'border-bottom-width:'.$height.'px;';
					if (isset($color) && !empty($color)) {
						$animation_styles .= 'border-bottom-color:'.$color.';';
					}

					$extra_class = "animate horizontal";
				}
			} else {

				$styles .= 'border-bottom-width:'.$height.'px;';
				$styles .= 'border-bottom-style:'.$type.';';
				if (isset($color) && !empty($color)) {
					$styles .= 'border-bottom-color:'.$color.';';
				}

			}

			

			
			
		}

		$output .= '<div class="sep-wrap '.sanitize_html_class($align).' '.$class.' '.$extra_class.' et-clearfix">';

			if (isset($animate) && $animate == "true") {
				$output .= '<div class="et-separator '.sanitize_html_class($type).'" style="'.esc_attr($styles).'"><div class="et-separator-bar" style="'.$animation_styles.'"></div></div>';
			} else {
				$output .= '<div class="et-separator '.sanitize_html_class($type).'" style="'.esc_attr($styles).'"></div>';
			}
			
		$output .= '</div>';

		return $output;
	}
	add_shortcode('et_separator', 'et_separator');

/*	decorative separator
--------------*/

	function et_separator_decorative($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'top'    	  => '24',
				'bottom' 	  => '24',
				'type'   	  => 'sep1',
				'size'   	  => 'small',
				'color'  	  => '#e0e0e0',
				'align'  	  => 'left',
				'class'       => ''
			), $atts)
		);

		$styles = "";

		if (isset($class) && !empty($class)) {
			$class = esc_attr($class);
		}

		if (isset($type) && !empty($type)) {


			if (isset($color) && !empty($color)) {
				$styles .= 'color:'.$color.';';
			}

			if (isset($top) && !empty($top)) {
				$styles .= 'margin-top:'.absint($top).'px;';
			}

			if (isset($bottom) && !empty($bottom)) {
				$styles .= 'margin-bottom:'.absint($bottom).'px;';
			}
			
		}

		$output = '<div class="sep-wrap '.sanitize_html_class($align).' '.$class.' et-clearfix"><div class="et-separator-decorative '.esc_attr($size).' icon-sep-'.sanitize_html_class($type).'" style="'.esc_attr($styles).'"></div></div>';
		return $output;
	}
	add_shortcode('et_separator_decorative', 'et_separator_decorative');

/*	separator dottes
--------------*/

	function et_separator_dottes($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'top'    	  => '24',
				'bottom' 	  => '24',
				'color'  	  => '#e0e0e0',
				'align'  	  => 'left',
				'class'       => ''
			), $atts)
		);

		$styles = "";

		if (isset($class) && !empty($class)) {
			$class = esc_attr($class);
		}

		if (isset($color) && !empty($color)) {
			$styles .= 'background-color:'.$color.';';
		}

		if (isset($top) && !empty($top)) {
			$styles .= 'margin-top:'.absint($top).'px;';
		}

		if (isset($bottom) && !empty($bottom)) {
			$styles .= 'margin-bottom:'.absint($bottom).'px;';
		}

		$output = '<div class="sep-wrap '.sanitize_html_class($align).' '.$class.' et-clearfix"><div class="et-separator-dottes" style="'.esc_attr($styles).'"></div></div>';
		return $output;
	}
	add_shortcode('et_separator_dottes', 'et_separator_dottes');

/*	separator icon
--------------*/

	function et_separator_icon($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'top'    	  => '24',
				'bottom' 	  => '24',
				'icon_prefix' => '',
				'icon_name'   => '',
				'color_sep'   => '#e0e0e0',
				'icon_size'   => 'small',
				'color_icon'  => '#d3a471',
				'align'  	  => 'left',
				'width'  	  => '120',
				'height' 	  => '1'
			), $atts)
		);

		$styles      = "";
		$styles_sep  = "";
		$styles_icon = "";

		if (!isset($icon_prefix) || empty($icon_prefix)) {
			$icon_prefix = 'fa';
		}

		if (isset($icon_name) && !empty($icon_name)) {

			if (isset($width) && !empty($width)) {
				$styles_sep .= 'width:'.absint($width).'px;';
			}

			if (isset($height) && !empty($height)) {
				$styles_sep .= 'height:'.absint($height).'px;';
			} else {
				$styles_sep .= 'height:1px;';
			}

			if (isset($color_sep) && !empty($color_sep)) {
				$styles_sep .= 'background-color:'.$color_sep.';';
			}

			if (isset($color_icon) && !empty($color_icon)) {
				$styles_icon .= 'color:'.$color_icon.';';
			}

			if (isset($top) && !empty($top)) {
				$styles .= 'margin-top:'.absint($top).'px;';
			}

			if (isset($bottom) && !empty($bottom)) {
				$styles .= 'margin-bottom:'.absint($bottom).'px;';
			}

			$output = '';

			$output .= '<div class="sep-wrap '.sanitize_html_class($align).' et-clearfix" style="'.esc_attr($styles).'">';
				if ($align != 'left') {
					$output .= '<span class="et-separator-left '.$icon_size.'" style="'.esc_attr($styles_sep).'"></span>';
				}
				$output .= '<span class="et-separator-icon '.$icon_size.' '.$icon_prefix.' '.$icon_name.'" style="'.esc_attr($styles_icon).'"></span>';
				if ($align != 'right') {
					$output .= '<span class="et-separator-right '.$icon_size.'" style="'.esc_attr($styles_sep).'"></span>';
				}
			$output .= '</div>';
			
		}

		return $output;
	}
	add_shortcode('et_separator_icon', 'et_separator_icon');

/*  dropcap
--------------*/

	function et_dropcap( $atts, $content = null ) {

		extract(shortcode_atts(
			array(
				'type' => 'empty',
				'color' => ''
			), $atts)
		);

		if (isset($color) && !empty($color)) {
			switch ($type) {
				case 'empty':
				case 'inline':
					$color = 'style="color:'.$color.';"';
					break;
				case 'full':
					$color = 'style="background-color:'.$color.';"';
					break;
			}
		}

		$output = '<span class="et-dropcap '.esc_attr($type).'" '.$color.'>'.do_shortcode($content).'</span>';

		return $output;  		
	}

	add_shortcode('et_dropcap', 'et_dropcap');

/*	alert
--------------*/

	function et_alert($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'type' => 'note'
			), $atts)
		);

		$output = '';

		$output .= '<div class="alert '.sanitize_html_class($type).'">';
			$output .= '<div class="alert-message">'.strip_tags($content).'</div>';
			$output .= '<span class="close-alert"></span>';
		$output .= '</div>';

		return $output;
	}

	add_shortcode('et_alert', 'et_alert');

/*	menu
--------------*/

	function et_menu($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'menu'            => '', 
				'container'       => '', 
				'container_class' => '', 
				'container_id'    => '', 
				'menu_class'      => 'et-footer-menu', 
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => '',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'depth'           => 1,
				'walker'          => '',
				'theme_location'  => '',
			), $atts)
		);

		return wp_nav_menu( array( 
		'menu'            => $menu, 
		'container'       => $container, 
		'container_class' => $container_class, 
		'container_id'    => $container_id, 
		'menu_class'      => $menu_class, 
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location));
	}

	add_shortcode('et_menu', 'et_menu');

/*	social icon
--------------*/

	function et_social_icons($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'target' 				=> '_self',
				'styling_original'      => 'false',
				'icon_color_reg' 		=> '#616161',
				'icon_color_hov' 		=> '#212121',
				'icon_back_color_reg' 	=> '',
				'icon_back_color_hov' 	=> '',
				'icon_border_color_reg' => '',
				'icon_border_color_hov' => '',
				'icon_border_radius' 	=> '0',
				'icon_border_width' 	=> '0'
			), $atts)
		);

		$styles = "";
		static $id_counter = 1;
		$class  = "";

		if ($styling_original == "true") {
			$styles .= '#et-social-links-'.$id_counter.' a {';
				if (isset($icon_border_radius) && !empty($icon_border_radius)) {
					$styles .= 'border-radius:'.$icon_border_radius.'px;';
				}
			$styles .= '}';
			$class  = "full";
		} else {
			$styles .= '#et-social-links-'.$id_counter.' a {';
				if (isset($icon_color_reg) && !empty($icon_color_reg)) {
					$styles .= 'color:'.$icon_color_reg.';';
				}
				if (isset($icon_back_color_reg) && !empty($icon_back_color_reg)) {
					$styles .= 'background-color:'.$icon_back_color_reg.';';
					$class  = "full";
				}
				if (isset($icon_border_width) && !empty($icon_border_width)) {
					if (isset($icon_border_color_reg) && !empty($icon_border_color_reg)) {
						$styles .= 'box-shadow:inset 0 0 0 '.$icon_border_width.'px '.$icon_border_color_reg.';';
						$class  = "full";
					}
				}
				$styles .= 'border-radius:'.$icon_border_radius.'px;';
			$styles .= '}';

			$styles .= '#et-social-links-'.$id_counter.' a:hover {';
				if (isset($icon_color_hov) && !empty($icon_color_hov)) {
					$styles .= 'color:'.$icon_color_hov.';';
				}
				if (isset($icon_back_color_hov) && !empty($icon_back_color_hov)) {
					$styles .= 'background-color:'.$icon_back_color_hov.';';
				}
				if (isset($icon_border_width) && !empty($icon_border_width)) {
					if (isset($icon_border_color_hov) && !empty($icon_border_color_hov)) {
						$styles .= 'box-shadow:inset 0 0 0 '.$icon_border_width.'px '.$icon_border_color_hov.';';
					}
				}
			$styles .= '}';
		}

		$output = '';

		$output .= '<div id="et-social-links-'.$id_counter.'" class="et-social-links social-links et-clearfix '.$class.' styling-original-'.$styling_original.'">';
			$output .= '<style>'.$styles.'</style>';
			foreach($atts as $social => $href) {
				if($href && $social != 'target' && $social != 'icon_color_reg' && $social != 'icon_color_hov' && $social != 'icon_back_color_reg' && $social != 'icon_back_color_hov' && $social != 'icon_border_color_reg' && $social != 'icon_border_color_hov' && $social != 'icon_border_radius' && $social != 'icon_border_width' && $social != 'styling_original') {
					if ($social == 'email') {
						$output .='<a class="et-icon-'.$social.'" href="'.esc_attr($href).'" target="'.esc_attr($target).'"></a>';
					} elseif ($social == 'skype') {
						$output .='<a class="et-icon-'.$social.'" href="'.esc_attr($href).'" target="'.esc_attr($target).'"></a>';
					} else {
						$output .='<a class="et-icon-'.$social.'" href="'.esc_url($href).'" target="'.esc_attr($target).'"></a>';
					}
				}
			}
		$output .= '</div>';

		$id_counter++;

		return $output;
	}
	add_shortcode('et_social_icons', 'et_social_icons');

/*	social share
--------------*/

	function et_social_share($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'icon_color_reg' 		=> '#616161',
				'icon_color_hov' 		=> '#d3a471',
				'icon_back_color_reg' 	=> '',
				'icon_back_color_hov' 	=> '',
				'icon_border_color_reg' => '',
				'icon_border_color_hov' => '',
				'icon_border_radius' 	=> '0',
				'icon_border_width' 	=> '0'
			), $atts)
		);

		$styles = "";
		$class  = "";
		static $id_counter = 1;

		$styles .= '#et-social-share-'.$id_counter.' a {';
			if (isset($icon_color_reg) && !empty($icon_color_reg)) {
				$styles .= 'color:'.$icon_color_reg.';';
			}
			if (isset($icon_back_color_reg) && !empty($icon_back_color_reg)) {
				$styles .= 'background-color:'.$icon_back_color_reg.';';
				$class  = "full";
			}
			if (isset($icon_border_width) && !empty($icon_border_width)) {
				if (isset($icon_border_color_reg) && !empty($icon_border_color_reg)) {
					$styles .= 'box-shadow:inset 0 0 0 '.$icon_border_width.'px '.$icon_border_color_reg.';';
					$class  = "full";
				}
			}
			$styles .= 'border-radius:'.$icon_border_radius.'px;';
		$styles .= '}';

		$styles .= '#et-social-share-'.$id_counter.' a:hover {';
			if (isset($icon_color_hov) && !empty($icon_color_hov)) {
				$styles .= 'color:'.$icon_color_hov.';';
			}
			if (isset($icon_back_color_hov) && !empty($icon_back_color_hov)) {
				$styles .= 'background-color:'.$icon_back_color_hov.';';
			}
			if (isset($icon_border_width) && !empty($icon_border_width)) {
				if (isset($icon_border_color_hov) && !empty($icon_border_color_hov)) {
					$styles .= 'box-shadow:inset 0 0 0 '.$icon_border_width.'px '.$icon_border_color_hov.';';
				}
			}
		$styles .= '}';

		$output = '';

		$output .= '<div id="et-social-share-'.$id_counter.'" class="et-social-links social-links et-clearfix '.$class.'">';
			$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
			$output .= '<style>'.$styles.'</style>';
            $output .= '<a title="'.esc_html__("Share on Facebook", 'enovathemes-addons').'" class="social-share post-facebook-share et-icon-facebook" target="_blank" href="//facebook.com/sharer.php?u='.urlencode(get_the_permalink(get_the_ID())).'"></a>';
            $output .= '<a title="'.esc_html__("Tweet this!", 'enovathemes-addons').'" class="social-share post-twitter-share et-icon-twitter" target="_blank" href="//twitter.com/intent/tweet?text='.urlencode(get_the_title(get_the_ID()).' - '.get_the_permalink(get_the_ID())).'"></a>';
            $output .= '<a title="'.esc_html__("Share on Pinterest", 'enovathemes-addons').'" class="social-share post-pinterest-share et-icon-pinterest" target="_blank" href="//pinterest.com/pin/create/button/?url='.urlencode(get_the_permalink(get_the_ID())).'&media='.urlencode(esc_url($url)).'&description='.rawurlencode(get_the_title(get_the_ID())).'"></a>';
            $output .= '<a title="'.esc_html__("Share on LinkedIn", 'enovathemes-addons').'" class="social-share post-linkedin-share et-icon-linkedin" target="_blank" href="//www.linkedin.com/shareArticle?mini=true&url='.urlencode(get_the_permalink(get_the_ID())).'&title='.rawurlencode(get_the_title(get_the_ID())).'"></a>';
            $output .= '<a title="'.esc_html__("Share on Google+", 'enovathemes-addons').'" class="social-share post-google-share et-icon-google" target="_blank" href="//plus.google.com/share?url='.urlencode(get_the_permalink(get_the_ID())).'" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;"></a>';
		$output .= '</div>';

		$id_counter++;

		return $output;
	}
	add_shortcode('et_social_share', 'et_social_share');

/*	popup
--------------*/

	function et_popup($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'icon_prefix'   => '',
				'icon_name'     => '',
				'icon_size'     => 'small',
				'direction'     => 'left',
				'icon_color'    => '#d3a471',
				'popup_color'   => '#212121',
				'message_width' => '320',
				'message'       => 'Your popup message goes here'
			), $atts)
		);

		$output = '';

		if (!isset($icon_prefix) || empty($icon_prefix)) {
			$icon_prefix = 'fa';
		}

		if (isset($icon_name) && !empty($icon_name)) {

			$message_width = (isset($message_width) && !empty($message_width)) ? esc_attr($message_width) : '350';
			$position = "left";

			if ($direction == "left") {
				$direction = 'data-in="fadeInLeft" data-out="fadeOutLeft"';
			} elseif ($direction == "right") {
				$position = "right";
				$direction = 'data-in="fadeInRight" data-out="fadeOutRight"';
			} elseif ($direction == "top") {
				$position = "top";
				$direction = 'data-in="fadeInTop" data-out="fadeOutTop"';
			} elseif ($direction == "bottom") {
				$position = "bottom";
				$direction = 'data-in="fadeInDown" data-out="fadeOutDown"';
			}

			$data_popupcolor = '';

			if (isset($popup_color) && !empty($popup_color)) {
				$data_popupcolor  = $popup_color;
			}

			$output .= '<div class="et-popup '.$icon_size.'" data-position="'.$position.'" '.$direction.' data-width="'.$message_width.'" data-tipso="'.strip_tags($message).'" data-popup="'.$data_popupcolor.'" style="background-color:'.esc_attr($icon_color).';">';
				$output .= '<span class="el-icon '.$icon_prefix.' '.$icon_name.'" ></span>';
				$output .= '<span class="et-popup-border" style="background-color:'.esc_attr($icon_color).';"></span>';
			$output .= '</div>';

		}
		
		return $output;
	}

	add_shortcode('et_popup', 'et_popup');

/*	highlight
--------------*/

	function et_highlight( $atts, $content = null ) {

		extract(shortcode_atts(
			array(
				'color' 	   => '',
				'back_color'   => '',
				'border_color' => '',
			), $atts)
		);

		$styles="";
		$class="";

		if (isset($color) && !empty($color)) {
			$styles.='color:'.esc_attr($color).';';
		}

		if (isset($back_color) && !empty($back_color)) {
			$styles.='background-color:'.esc_attr($back_color).';';
			$class = "full";
		}

		if (isset($border_color) && !empty($border_color)) {
			$styles.='border-bottom-color:'.esc_attr($border_color).';';
		}

		$output = '<span class="et-highlight '.$class.'" style="'.$styles.'">'.do_shortcode($content).'</span>';

		return $output;  		
	}

	add_shortcode('et_highlight', 'et_highlight');

/*	icon
--------------*/
	
	function et_icon($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'icon_size'          => 'medium',
				'icon_prefix'        => '',
				'icon_name'          => '',
				'icon_color'         => '',
				'icon_back_color'    => '',
				'icon_border_radius' => '0',
				'icon_border_width'  => '0',
				'icon_border_color'  => '',
				'animate'            => 'false'
			), $atts)
		);

		$output 	 = '';
		$styles 	 = '';
		$extra_class = '';

		if (!isset($icon_prefix) || empty($icon_prefix)) {
			$icon_prefix = 'fa';
		}

		if (isset($icon_name) && !empty($icon_name)) {

			if (isset($icon_color) && !empty($icon_color)) {
				$styles .= 'color:'.$icon_color.';';
			}

			if (isset($icon_back_color) && !empty($icon_back_color)) {
				$styles .= 'background-color:'.$icon_back_color.';';
			}


			if (isset($icon_border_width) && !empty($icon_border_width)) {

				if (isset($icon_border_color) && !empty($icon_border_color)) {
					$styles .= 'box-shadow:inset 0 0 0 '.$icon_border_width.'px '.$icon_border_color.';';
				}

			}

			if (isset($icon_border_radius) && !empty($icon_border_radius)) {
				$styles .= 'border-radius:'.$icon_border_radius.'px;';
			}

			if ((isset($icon_border_width) && !empty($icon_border_width)) || isset($icon_back_color) && !empty($icon_back_color)) {
				$extra_class = 'full';
			}
		}

		$output .= '<div class="et-el-icon '.sanitize_html_class($icon_size).' '.$extra_class.' " style="'.esc_attr($styles).'">';
			$output .= '<span class="el-icon '.sanitize_html_class($icon_prefix).' '.sanitize_html_class($icon_name).' animate-'.sanitize_html_class($animate).'"></span>';
		$output .= '</div>';

		return $output;
	}
	add_shortcode('et_icon', 'et_icon');

/*	icon list
--------------*/
	
	function et_icon_list($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'icon_size'          => 'small',
				'icon_prefix'        => '',
				'icon_name'          => '',
				'icon_color'         => '',
				'icon_back_color'    => '',
				'icon_border_color'  => '',
				'icon_border_radius' => '0',
				'icon_border_width'  => '0'
			), $atts)
		);

		$output = '';
		$styles = '';
		$li_styles = '';
		$extra_class = '';

		if (!isset($icon_prefix) || empty($icon_prefix)) {
			$icon_prefix = 'fa';
		}

		if (isset($icon_name) && !empty($icon_name)) {

			if (isset($icon_back_color) && !empty($icon_back_color) || 
				(isset($icon_border_width) && !empty($icon_border_width) && 
				isset($icon_border_color) && !empty($icon_border_color))) {
				switch ($icon_size) {
					case 'small':
						$li_styles = 'style="margin-bottom:16px;"';
						break;
					case 'medium':
						$li_styles = 'style="margin-bottom:24px;"';
						break;
					case 'large':
						$li_styles = 'style="margin-bottom:32px;"';
						break;
					case 'extra-large':
						$li_styles = 'style="margin-bottom:40px;"';
						break;
				}
			}

			if (isset($icon_color) && !empty($icon_color)) {
				$styles .= 'color:'.$icon_color.';';
			}

			if (isset($icon_back_color) && !empty($icon_back_color)) {
				$styles .= 'background-color:'.$icon_back_color.';';
			}

			if (isset($icon_border_width) && !empty($icon_border_width)) {

				if (isset($icon_border_color) && !empty($icon_border_color)) {
					$styles .= 'box-shadow:inset 0 0 0 '.$icon_border_width.'px '.$icon_border_color.';';
				}

			}

			if (isset($icon_border_radius) && !empty($icon_border_radius)) {
				$styles .= 'border-radius:'.$icon_border_radius.'px;';
			}
		}

		if ((isset($icon_border_width) && !empty($icon_border_width)) || (isset($icon_back_color) && !empty($icon_back_color))) {
			$extra_class = 'full';
		}

		$output .= '<ul class="et-list-icon '.$extra_class.' '.sanitize_html_class($icon_size).'">';
			$split = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $content);
			foreach($split as $haystack) {
	            $output .= '<li '.$li_styles.'>';
	            	$output .= '<div class="icon-wrap">';
		            	$output .= '<div class="icon '.sanitize_html_class($icon_size).'" style="'.esc_attr($styles).'">';
	            			$output .= '<span class="'.sanitize_html_class($icon_size).' '.sanitize_html_class($icon_prefix).' '.sanitize_html_class($icon_name).'"></span>';
	            		$output .= '</div>';
            		$output .= '</div>';
	            	$output .= '<div>' . do_shortcode($haystack) . '</div>';
	            $output .= '</li>';
	        }
	    $output .= '</ul>';

		return $output;
	}
	add_shortcode('et_icon_list', 'et_icon_list');

/*  typeit
/*------------*/

	function et_typeit( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'align'          => 'left',
			'autostart'      => 'false',
			'start_delay'    => '',
			'type'			 => 'h1',
			'main_title'     => '',
			'string_1'		 => '',
			'string_2'		 => '',
			'string_3'		 => '',
			'string_4'		 => '',
			'string_5'		 => '',
			'font_size'      => '',
			'font_weight'    => '',
			'line_height'    => '',
			'letter_spacing' => '',
			'color'          => '#d3a471',
			'custom_class'   => ''
		), $atts));

		$styles = '';

		if (isset($align) && !empty($align)) {
			$styles .= 'text-align:'.$align.' !important;';
		}

		if (isset($autostart) && !empty($autostart)) {
			$autostart = 'data-autostart="'.esc_attr($autostart).'"';
		}

		if (isset($start_delay) && !empty($start_delay)) {
			$start_delay = 'data-startdelay="'.absint($start_delay).'"';
		}

		if (isset($font_size) && !empty($font_size)) {
			$styles .= 'font-size:'.$font_size.'px;';
		}

		if (isset($font_weight) && !empty($font_weight)) {
			$styles .= 'font-weight:'.$font_weight.';';
		}

		if (isset($line_height) && !empty($line_height)) {
			$styles .= 'line-height:'.$line_height.'px;';
		}

		if (isset($letter_spacing) && !empty($letter_spacing)) {
			$styles .= 'letter-spacing:'.$letter_spacing.'px;';
		}

		if (isset($color) && !empty($color)) {
			$styles .= 'color:'.$color.';';
		}

		$string_array = [];

		if (isset($string_1) && !empty($string_1)) {	
	    	array_push($string_array, $string_1);
		}

		if (isset($string_2) && !empty($string_2)) {	
	    	array_push($string_array, $string_2);
		}

		if (isset($string_3) && !empty($string_3)) {	
	    	array_push($string_array, $string_3);
		}

		if (isset($string_4) && !empty($string_4)) {	
	    	array_push($string_array, $string_4);
		}

		if (isset($string_5) && !empty($string_5)) {	
	    	array_push($string_array, $string_5);
		}

		if (isset($custom_class) && !empty($custom_class)) {
			$custom_class = esc_attr($custom_class);
		}

		if (is_array($string_array) && !empty($string_array)) {	
	    	return '<'.$type.' class="et-typeit et-clearfix '.$custom_class.'" '.$autostart.' '.$start_delay.' data-strings="'.implode(',',$string_array).'" style="'.$styles.'">'.esc_attr($main_title).'<span class="typeit-dynamic"></span></'.$type.'>';
		}

	}
	add_shortcode('et_typeit', 'et_typeit');

/*  signature
/*------------*/

	function et_signature( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'color' => '#212121',
			'width' => '',
			'align' => 'left'
		), $atts));

		$output = '';

		static $id_counter = 1;

			$output .= '<div class="et-signature-wrapper et-clearfix '.$align.'">';
				if (isset($color) && !empty($color)) {
					$output .= '<style>';
						if (isset($width) && !empty($width)) {
							$output .= '#et-signature-'.$id_counter.' {width:'.esc_attr($width).'px;}';
						}
						$output .= '#et-signature-'.$id_counter.'.animate svg path {stroke: '.$color.';animation: pathAnimateStroke 3s cubic-bezier(0.785, 0.135, 0.150, 0.860) forwards 0s, pathAnimateFill'.$id_counter.' 0.6s ease-in-out forwards 1.5s;}
						@keyframes pathAnimateFill'.$id_counter.' {0% {fill:transparent;}100% {fill:'.$color.';stroke:transparent;}}';
					$output .= '</style>';
				}
				$output .= '<div id="et-signature-'.$id_counter.'" class="et-signature">';
					$output .= do_shortcode('[vc_raw_html]'.$content.'[/vc_raw_html]');
				$output .= '</div>';
			$output .= '</div>';

		$id_counter++;

		return $output;

	}
	add_shortcode('et_signature', 'et_signature');

/*  image
/*------------*/

	function et_image( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'image' 				=> '',
			'title' 				=> '',
			'size' 					=> 'full',
			'caption' 				=> 'false',
			'link' 					=> 'none',
			'link_target'           => '_self',
			'custom_link' 			=> '',
			'overlay'               => 'overlay-none',
			'overlay_caption'       => 'caption-up',
			'parallax'              => 'false',
			'parallax_speed'        => '1',
			'parallax_x'            => '0',
			'parallax_y'            => '0',
			'alignment'             => 'left',
			'modal'                 => 'false',
			'curtain'               => 'false',
			'curtain_direction'     => 'left',
			'curtain_color'           => '#d3a471',
			'curtain_animation_delay' => '0'
		), $atts));

		global $goodresto_enovathemes;

		$output = '';
		$simplify_image = "false";

		if ($parallax == "true" || $curtain == "true") {
			$simplify_image = "true";
		}

		if (isset($image) && !empty($image)) {

			if ($caption == "true") {
				$overlay = 'overlay-none';
			}

			$overlay_effect = $overlay;

			if (isset($caption) && !empty($caption) && $caption == "true") {
				$overlay_effect = $overlay_caption;
			}

			$image_full    = wp_get_attachment_image_src($image, 'full');
			$image_cropped = wp_get_attachment_image_src($image, $size);

			$image_src    = $image_cropped[0];
			$image_width  = $image_cropped[1];
			$image_height = $image_cropped[2];

			$link_before = '';
			$link_after  = '';

			if (isset($link) && !empty($link) && $link != "none" && ($overlay_effect == "overlay-none" || $overlay_effect == "transform" || $overlay_effect == "caption-up")) {

				switch ($link) {
					case 'attach':
						$link_before = '<a title="'.esc_attr($title).'" href="'.$image_full[0].'">';
						$link_after  = '</a>';
						break;
					case 'lightbox':
						$link_before = '<a title="'.esc_attr($title).'" class="single-image-link" href="'.$image_full[0].'">';
						$link_after  = '</a>';
						break;
					case 'custom':
						if (isset($custom_link) && !empty($custom_link)) {
							$link_before = '<a title="'.esc_attr($title).'" data-modal="'.esc_attr($modal).'" target="'.$link_target.'" href="'.esc_url($custom_link).'">';
							$link_after  = '</a>';
						}
						break;
				}
			}

			$output .='<div data-curtain="'.esc_attr($curtain).'" data-animation-delay="'.esc_attr($curtain_animation_delay).'" data-parallax="'.esc_attr($parallax).'" data-coordinatex="'.esc_attr($parallax_x).'" data-coordinatey="'.esc_attr($parallax_y).'" data-speed="'.esc_attr($parallax_speed).'" class="et-custom-image align'.$alignment.' '.$overlay_effect.' curtain-'.$curtain_direction.'">';
				if ($simplify_image == "true") {
					$output .='<img width="'.$image_width.'" height="'.$image_height.'" src="'.esc_url($image_src).'" alt="'.esc_attr($title).'">';
					if ($curtain == "true") {
						$output .='<div class="curtain" style="background:'.$curtain_color.';"></div>';
					}
				} else {
					$output .='<div class="overlay-hover">';
						$output .= $link_before;
							$output .='<div class="image">';
								$output .='<div class="image-container">';
									$output .='<img width="'.$image_width.'" height="'.$image_height.'" src="'.esc_url($image_src).'" alt="'.esc_attr($title).'">';
								$output .='</div>';

								if (isset($link) && !empty($link) && $link != "none" && $caption == "false" && $overlay_effect != "transform") {

									$output .='<div class="post-image-overlay">';
						            	switch ($link) {
											case 'attach':
												$output .='<a class="overlay-read-more" title="'.esc_attr($title).'" href="'.$image_full[0].'"></a>';
												break;
											case 'lightbox':
												$output .='<a class="overlay-read-more single-image-link" title="'.esc_attr($title).'" href="'.$image_full[0].'"></a>';
												break;
											case 'custom':
												if (isset($custom_link) && !empty($custom_link)) {
													$output .='<a data-modal="'.esc_attr($modal).'" title="'.esc_attr($title).'" target="'.$link_target.'" class="overlay-read-more single-image-link" href="'.esc_url($custom_link).'"></a>';
												}
												break;
										}
							        $output .='</div>';

							    }
						    $output .='</div>';
						$output .= $link_after;
						if (isset($caption) && !empty($caption) && $caption == "true") {
							if (isset($title) && !empty($title)) {
								$output .='<div class="caption">';
									$output .= esc_attr($title);
								$output .='</div>';
							}
						}
					$output .='</div>';
				}
				
			$output .='</div>';

	    	return $output;

		}

	}
	add_shortcode('et_image', 'et_image');

/*  image with content
/*------------*/

	function et_image_content( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'image' 	  => '',
			'size' 		  => 'full',
			'overlay'     => 'overlay-fade',
			'color'       => '',
			'link'        => '',
			'link_target' => '_self',
			'align'       => 'left'
		), $atts));

		$output = '';
		$styles    = '';
		$link_before = '';
		$link_after  = '';

		if (isset($link) && !empty($link)) {
			$link_before = '<a href="'.esc_url($link).'" target="'.esc_attr($link_target).'">';
			$link_after  = '</a>';
		}

		if (isset($color) && !empty($color)) {
			$styles .= 'background-color:'.$color.';';
		}

		if (isset($image) && !empty($image)) {

			$image_cropped = wp_get_attachment_image_src($image, $size);

			$image_src    = $image_cropped[0];
			$image_width  = $image_cropped[1];
			$image_height = $image_cropped[2];
			$image_alt    = get_post_meta( $image, '_wp_attachment_image_alt', true );


			$output .='<div class="et-image-content '.$overlay.'">';
				$output .=$link_before;
				$output .='<div class="overlay-hover">';
					$output .='<div class="image post-image">';
						$output .='<div class="image-container">';
							$output .='<img width="'.$image_width.'" height="'.$image_height.'" src="'.esc_url($image_src).'" alt="'.esc_attr($image_alt).'">';
						$output .='</div>';
						$output .='<div class="post-image-overlay" style="'.$styles.'">';
			            	$output .='<div class="post-image-overlay-content text-align-'.$align.'">';
			            		$output .= do_shortcode($content);
			            	$output .='</div>';
				        $output .='</div>';
				    $output .='</div>';
				$output .='</div>';
				$output .=$link_after;
			$output .='</div>';

	    	return $output;

		}

	}
	add_shortcode('et_image_content', 'et_image_content');

/*  gallery
/*------------*/

	function et_gallery($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'gallery_type' 	         => 'grid',
				'gallery_images' 	      => '',
				'gallery_size' 		      => 'full',
				'gallery_caption' 	      => 'false',
				'gallery_link' 		      => 'none',
				'gallery_overlay'         => 'overlay-none',
				'gallery_overlay_caption' => 'caption-up',
				'gallery_animation_type'  => 'sequential',
				'gallery_animation_effect'=> 'none',
				'gallery_column' 		  => '1',
				'gallery_gap' 			  => '0'
			), $atts)
		);

		$output = '';
		$styles = '';
		static $id_counter = 1;

		global $goodresto_enovathemes;

		$overlay_effect = $gallery_overlay;

		if (isset($gallery_caption) && !empty($gallery_caption) && $gallery_caption == "true") {
			$gallery_overlay = 'overlay-none';
			$overlay_effect = $gallery_overlay_caption;
		}

		if (isset($gallery_gap) && !empty($gallery_gap)) {
			if ($gallery_type == 'grid') {
				$styles .= '#plain-gallery-'.$id_counter.'{margin-left:-'.($gallery_gap/2).'px;margin-right:-'.($gallery_gap/2).'px;}';
				$styles .= '#plain-gallery-'.$id_counter.' .et-item {padding-left:'.($gallery_gap/2).'px;padding-right:'.($gallery_gap/2).'px;padding-bottom:'.$gallery_gap.'px}';	
			} else {
				$styles .= '#plain-gallery-'.$id_counter.'{margin-left:-'.($gallery_gap/2).'px;margin-right:-'.($gallery_gap/2).'px;}';
				$styles .= '#plain-gallery-'.$id_counter.' .owl-nav > .owl-prev {left:'.($gallery_gap/2).'px}';
				$styles .= '#plain-gallery-'.$id_counter.' .owl-nav > .owl-next {right:'.($gallery_gap/2).'px}';
				$styles .= '#plain-gallery-'.$id_counter.' .et-item {padding-left:'.($gallery_gap/2).'px;padding-right:'.($gallery_gap/2).'px;}';	
			}
		}

		if ($gallery_type == 'grid') {
			$gallery_type = 'gallery-type-'.$gallery_type;
		} else {
			$gallery_type = 'owl-carousel';
		}

		

		if (isset($gallery_images) && !empty($gallery_images)) {

			$gallery_images = explode( ',', $gallery_images );
			$i = - 1;

			$output .= '<div class="et-plain-gallery-wrapper">';
				if (!empty($styles)) {
					$output .= '<style>'.$styles.'</style>';
				}
				$output .='<div id="plain-gallery-'.$id_counter.'" data-columns="'.$gallery_column.'" class="plain-gallery loop-gallery '.$gallery_type.' effect-type-'.esc_attr($gallery_animation_type).' effect-'.esc_attr($gallery_animation_effect).' '.$overlay_effect.' et-item-set et-clearfix">';
					foreach ( $gallery_images as $attach_id ) {
						$i ++;

						if ( $attach_id > 0 ) {

							$image_full    = wp_get_attachment_image_src($attach_id, 'full');
							$image_cropped = wp_get_attachment_image_src($attach_id, $gallery_size);

							$image_src    = $image_cropped[0];
							$image_width  = $image_cropped[1];
							$image_height = $image_cropped[2];

							$image_obj     = get_post( $attach_id );
							$image_caption = $image_obj->post_excerpt;

							$link_before = '';
							$link_after  = '';

							if (isset($gallery_link) && !empty($gallery_link) && $gallery_link != "none") {

								switch ($gallery_link) {
									case 'attach':
										$link_before = '<a href="'.$image_full.'">';
										$link_after  = '</a>';
										break;
									case 'lightbox':
										if (!empty($image_caption)) {
											$link_before ='<a title="'.$image_caption.'" data-lightbox-gallery="gallery-image'.$id_counter.'" title="'.$image_caption.'" href="'.$image_full[0].'">';
										} else {
											$link_before ='<a title="'.$image_caption.'" data-lightbox-gallery="gallery-image'.$id_counter.'" href="'.$image_full[0].'">';
										}
										$link_after  = '</a>';
										break;
								}
							}

							$output .='<div class="et-item gallery">';
								$output .='<div class="et-item-inner et-clearfix">';
									$output .='<div class="overlay-hover">';
										
										if ($gallery_link != "none" && ($overlay_effect == 'overlay-none' || $overlay_effect == 'transform' || $overlay_effect == 'caption-up')) {
											$output .= $link_before;
										}	

										$output .='<div class="image-container">';
											$output .='<img width="'.$image_width.'" height="'.$image_height.'" src="'.esc_url($image_src).'" alt="'.esc_attr($image_caption).'">';
										$output .='</div>';

										if ($overlay_effect != 'overlay-none' && $overlay_effect != 'transform' && $gallery_caption == "false") {
											if (isset($gallery_link) && !empty($gallery_link) && $gallery_link != "none") {

												$output .='<div class="post-image-overlay">';
									            	switch ($gallery_link) {
														case 'attach':
															$output .='<a class="overlay-read-more" href="'.$image_full[0].'"></a>';
															break;
														case 'lightbox':

															if (isset($gallery_caption) && !empty($gallery_caption) && $gallery_caption == "true") {

																$output .='<a class="overlay-read-more" title="'.$image_caption.'" data-lightbox-gallery="gallery-image'.$id_counter.'" title="'.$image_caption.'" href="'.$image_full[0].'"></a>';

															} else {
																$output .='<a class="overlay-read-more" title="'.$image_caption.'" data-lightbox-gallery="gallery-image'.$id_counter.'" href="'.$image_full[0].'"></a>';
															}

															break;
													}
										        $output .='</div>';

										    }
										}

									    if ($gallery_link != "none" && ($overlay_effect == 'overlay-none' || $overlay_effect == 'transform' || $overlay_effect == 'caption-up')) {
											$output .= $link_after;
										}

										if (isset($gallery_caption) && !empty($gallery_caption) && $gallery_caption == "true") {
											if (isset($image_caption) && !empty($image_caption)) {
												$output .='<div class="caption">';
													$output .= $image_caption;
												$output .='</div>';
											}
										}

									$output .='</div>';
									
								$output .='</div>';
							$output .='</div>';
							
						}
					}
				$output .= '</div>';
			$output .= '</div>';

			$id_counter++;

			return $output;

		}
		
	}
	add_shortcode('et_gallery', 'et_gallery');

/*  image slider
/*------------*/

	function et_image_slider($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'slider_images' 	=> '',
				'slider_size' 		=> 'full',
				'slider_column' 	=> '1',
				'slider_gap' 		=> '0',
				'slider_thumbnails' => 'false'
			), $atts)
		);

		$output = '';
		static $id_counter = 1;

		global $goodresto_enovathemes;

		if (isset($slider_images) && !empty($slider_images)) {

			$slider_images = explode( ',', $slider_images );
			$i = - 1;

			if ($slider_thumbnails == "true") {
				$slider_thumbnails = 'thumbnail-true';
			} else {
				$slider_thumbnails = 'carousel';
			}

	        $output .= '<div id="image-slider-'.$id_counter.'" data-columns="'.$slider_column.'" class="et-image-slider '.$slider_thumbnails.'">';
	
				if (isset($slider_column) && !empty($slider_column) && $slider_column != '1' && isset($slider_gap) && !empty($slider_gap) && $slider_gap != '0') {
					$output .= '<style>';
						$output .= '#image-slider-slides-'.$id_counter.'{margin-left:-'.($slider_gap/2).'px;margin-right:-'.($slider_gap/2).'px;}';
						$output .= '#image-slider-slides-'.$id_counter.' .et-slider-item {padding-left:'.($slider_gap/2).'px;padding-right:'.($slider_gap/2).'px;}';
						$output .= '#image-slider-slides-'.$id_counter.' .owl-nav > .owl-prev {left:'.($slider_gap/2).'px}';
						$output .= '#image-slider-slides-'.$id_counter.' .owl-nav > .owl-next {right:'.($slider_gap/2).'px}';
					$output .= '</style>';
				}

				$output .='<ul id="image-slider-slides-'.$id_counter.'" data-columns="'.$slider_column.'" class="image-slider-slides owl-'.$slider_thumbnails.' et-clearfix">';
					foreach ( $slider_images as $attach_id ) {
						$i ++;

						if ( $attach_id > 0 ) {

							$image_full    = wp_get_attachment_image_src($attach_id, 'full');
							$image_cropped = wp_get_attachment_image_src($attach_id, $slider_size);

							$image_src    = $image_cropped[0];
							$image_width  = $image_cropped[1];
							$image_height = $image_cropped[2];
							$image_alt    = get_post_meta( $attach_id, '_wp_attachment_image_alt', true );

							$output .='<li class="et-slider-item">';
									$output .='<div class="overlay-hover">';
										$output .='<a data-lightbox-gallery="image-slider-'.$id_counter.'" href="'.$image_full[0].'">';
											$output .='<div class="image-container">';
												$output .='<img width="'.$image_width.'" alt="'.esc_attr($image_alt).'" height="'.$image_height.'" src="'.esc_url($image_src).'">';
											$output .='</div>';
						            	$output .='</a>';
									$output .='</div>';
							$output .='</li>';
							
						}
					}
				$output .= '</ul>';
				if ($slider_thumbnails == "thumbnail-true" && $slider_column == 1){
					$output .='<ul id="image-slider-thumbnail-'.$id_counter.'" class="image-slider-thumbnail et-clearfix">';
						
						$j = - 1;

						foreach ( $slider_images as $attach_id ) {
							$j ++;

							if ( $attach_id > 0 ) {

								$image_cropped = wp_get_attachment_image_src($attach_id, 'thumbnail');
								$image_src    = $image_cropped[0];
								$image_width  = $image_cropped[1];
								$image_height = $image_cropped[2];
								$image_alt    = get_post_meta( $attach_id, '_wp_attachment_image_alt', true );

								$output .='<li>';
									$output .='<div class="image-container">';
										$output .='<img width="'.$image_width.'" height="'.$image_height.'" alt="'.esc_attr($image_alt).'" src="'.esc_url($image_src).'">';
				                	$output .='</div>';
								$output .='</li>';
								
							}
						}
					$output .='</ul>';
				}
			$output .= '</div>';

			$id_counter++;

			return $output;

		}
		
	}
	add_shortcode('et_image_slider', 'et_image_slider');

/*  youtube/vimeo
/*------------*/
	
	function et_emb( $atts, $tag,$content = null ) {

	    extract( 
	    	shortcode_atts(
    		array(
    			'id' 		   => '',
    			'width' 	   => '',
    			'modal' 	   => "false",
    			'image' 	   =>'',
    			'player_image' =>'',
    			'size'  	   => 'full'
    		), $atts)
	    );

	    switch( $tag ) {
	        case "et_youtube":
	            $src = '//www.youtube-nocookie.com/embed/';
	            break;
	        case "et_vimeo":
	            $src = '//player.vimeo.com/video/';
	            break;
	    }

	    $style  = "";
	    $output = "";
	    $class  = "";

	    if (!empty($width)) {$style = 'max-width:'.absint($width).'px;';}


	    if(isset($id) && !empty($id)){
	    	if ($modal == "true") {
	    		if(isset($image) && !empty($image)) {
					$img_attributes = wp_get_attachment_image_src($image, $size);
					$class = "full";
				}

				if(isset($player_image) && !empty($player_image)) {
					$player_image = wp_get_attachment_image_src($player_image, 'full');
					$player_image_width  = $player_image[1];
					$player_image_height = $player_image[2];
					$player_image_src    = $player_image[0];
				} else {
					$player_image 		 = GOODRESTO_ENOVATHEMES_IMAGES.'/video_icon.png';
					$player_image_width  = 75;
					$player_image_height = 75;
					$player_image_src    = GOODRESTO_ENOVATHEMES_IMAGES.'/video_icon.png';
				}

	    		switch( $tag ) {
			        case "et_youtube":
	    				$output .= '<a class="video-modal '.$class.'" href="//www.youtube.com/watch?v='.$id.'">';
	    					if(isset($image) && !empty($image)) {
	    						if(isset($player_image) && !empty($player_image)) {
	    							$output .= '<img class="modal-player-image" width="'.$player_image_width.'" height="'.$player_image_height.'" alt="" src="'.$player_image_src.'">';
	    							$output .= '<img width="'.$img_attributes[1].'" height="'.$img_attributes[2].'" src="'.$img_attributes[0].'" alt="">';
								} else {
	    							$output .= '<img width="'.$img_attributes[1].'" height="'.$img_attributes[2].'" src="'.$img_attributes[0].'" alt="">';
	    						}
	    					} else {
	    						if(isset($player_image) && !empty($player_image)) {
	    							$output .= '<img class="modal-player-image" width="'.$player_image_width.'" height="'.$player_image_height.'" alt="" src="'.$player_image_src.'">';
								}
	    					}
	    				$output .= '</a>';
			            break;
			        case "et_vimeo":
			            $output .= '<a class="video-modal '.$class.'" href="//vimeo.com/'.$id.'">';
			            	if(isset($image) && !empty($image)) {
	    						if(isset($player_image) && !empty($player_image)) {
	    							$output .= '<img class="modal-player-image" width="'.$player_image_width.'" height="'.$player_image_height.'" alt="" src="'.$player_image_src.'">';
	    							$output .= '<img width="'.$img_attributes[1].'" height="'.$img_attributes[2].'" src="'.$img_attributes[0].'" alt="">';
								} else {
	    							$output .= '<img width="'.$img_attributes[1].'" height="'.$img_attributes[2].'" src="'.$img_attributes[0].'" alt="">';
	    						}
	    					} else {
	    						if(isset($player_image) && !empty($player_image)) {
	    							$output .= '<img class="modal-player-image" width="'.$player_image_width.'" height="'.$player_image_height.'" alt="" src="'.$player_image_src.'">';
								}
	    					}
			            $output .= '</a>';
			            break;
			    }

	    	} else {
	    		$output .='<div class="video-embed" style="'.esc_attr($style).'">';
			    	$output .='<div class="flex-mod">';
			    		$output .= '<iframe allowfullscreen="allowfullscreen" frameBorder="0" src="'.$src.esc_attr($id).'" class="iframevideo"></iframe>';
			    	$output .='</div>';
			    $output .='</div>';
	    	}
	    }

	    return $output;
	}
	add_shortcode( 'et_youtube', 'et_emb' );
	add_shortcode( 'et_vimeo', 'et_emb' );

/*  soundcloud
/*------------*/
	
	function et_soundcloud($atts) {

		extract( 
		 	shortcode_atts(
			array(
				'url'    => '',
				'width'  => '100%',
				'height' => '166'
			), $atts)
		);

		$output = "";

		if(empty($width)) {$width = "100%";} else {absint($width);}

		if(empty($height) || !is_numeric($height)) {$height = "166";}

		if(isset($url) && !empty($url)){
			$output .= '<div class="soundcloud"><iframe width="'.$width.'" height="'.absint($height).'" scrolling="no" frameborder="no" src="//w.soundcloud.com/player/?url='.esc_url($url).'&amp;"></iframe></div>';
		}
	    
		return $output;
	}

	add_shortcode('et_soundcloud', 'et_soundcloud');

/*  instagram
/*------------*/
	
	function et_instagram($atts) {

		extract( 
		 	shortcode_atts(
			array(
				'username' => '',
				'image_size' => 'thumbnail',
				'items_num' => '',
				'type' => 'grid',
				'columns' => '1',
				'animation_type' => 'sequential',
				'animation_effect' => 'none',
				'gap' => '0',
				'logo' => '',
				'logo_retina' => ''
			), $atts)
		);

		static $id_counter = 1;

		$output = "";
		$styles = "";

		if(!is_numeric($items_num) || !isset($items_num) || empty($items_num) || $items_num < 0) {
			$items_num = 6;
		}

		if ($type == 'carousel') {
			$type = 'owl-carousel';
		}

		if (isset($gap) && !empty($gap)) {
			if ($type == 'grid') {
				$styles .= '#et-instagram-feed-'.$id_counter.'{margin-left:-'.($gap/2).'px;margin-right:-'.($gap/2).'px;}';
				$styles .= '#et-instagram-feed-'.$id_counter.' .et-item {padding-left:'.($gap/2).'px;padding-right:'.($gap/2).'px;padding-bottom:'.$gap.'px}';	
			} else {
				$styles .= '#et-instagram-feed-'.$id_counter.'{margin-left:-'.($gap/2).'px;margin-right:-'.($gap/2).'px;}';
				$styles .= '#et-instagram-feed-'.$id_counter.' .owl-nav > .owl-prev {left:'.($gap/2).'px}';
				$styles .= '#et-instagram-feed-'.$id_counter.' .owl-nav > .owl-next {right:'.($gap/2).'px}';
				$styles .= '#et-instagram-feed-'.$id_counter.' .et-item {padding-left:'.($gap/2).'px;padding-right:'.($gap/2).'px;}';	
			}
		}

		if (isset($username) && !empty($username)) {
			$media_array = enovathemes_addons_scrape_instagram( $username );

			if ( is_wp_error( $media_array ) ) {

				$output = wp_kses_post( $media_array->get_error_message() );

			} else {

				$media_array = array_slice( $media_array, 0, $items_num );

				$output .= '<div class="et-instagram-feed-wrapper">';
					if (!empty($styles)) {
						$output .= '<style>'.$styles.'</style>';
					}
					$output .='<div id="et-instagram-feed-'.$id_counter.'" data-columns="'.esc_attr($columns).'" class="et-instagram-feed '.$type.' effect-type-'.esc_attr($animation_type).' effect-'.esc_attr($animation_effect).' overlay-fade et-item-set et-clearfix">';

						if ($type == "grid") {
							$output .='<div class="et-item instagram-feed-item followers-counter">';
								$output .='<div class="et-item-inner et-clearfix">';
									$output .='<div class="followers-box">';
										$output .='<div class="followers-box-inner">';
											$output .='<div class="followers-box-content">';
												if (isset($logo) || !empty($logo)) {

													$logo_ats = wp_get_attachment_image_src($logo, 'full');
													$logo_s = $logo_ats[0];
													$logo_w = $logo_ats[1];
													$logo_h = $logo_ats[2];

													if (isset($logo_retina) || !empty($logo_retina)) {$logo = $logo_retina;}

													$logo_ats = wp_get_attachment_image_src($logo, 'full');

													$logo_s = $logo_ats[0];

													$output .= '<img class="instagram-logo" alt="'.esc_attr($username).'" width="'.$logo_w.'" height="'.$logo_h.'" src="'. $logo_ats[0] .'" />';
													$output .='<div></div>';

												}
												$output .='<div class="followers-label">'.esc_html__("Instagram", "enovathemes-addons").'</div>';
													$output .= '<h6 class="followers-count">'.esc_attr( $media_array[0]["followers"] ).'</h6>';
												$output .='<div class="followers-sublabel">'.esc_html__("Followers", "enovathemes-addons").'</div>';
												$output .='<a class="follow-button et-button small" target="_blank" href="//www.instagram.com/'.$username.'">'.esc_html__("Follow", "enovathemes-addons").'</a>';
											$output .='</div>';
										$output .='</div>';
									$output .='</div>';
									$output .= '<img src="'. esc_url( $media_array[0][$image_size] ) .'" alt="Instagram" />';
								$output .='</div>';
							$output .='</div>';
						}

						foreach ( $media_array as $item ) {

							$output .='<div class="et-item instagram-feed-item">';
								$output .='<div class="et-item-inner et-clearfix">';
									$output .='<div class="overlay-hover">';
										$output .= '<a href="'. esc_url( $item['link'] ) .'" target="_blank">';
											$output .='<div class="image-container">';
												$output .= '<img alt="'.esc_attr($item["description"]).'" src="'. esc_url( $item[$image_size] ) .'" />';
											$output .='</div>';
											$output .='<div class="post-image-overlay">';
												$output .='<div class="post-image-overlay-content">';
													$output .='<p>';
														$output .='<span class="feed-item-likes">';
															$output .='<span class="feed-item-icons et-icon-heart"></span>';
															$output .= esc_attr( $item["likes"] );
														$output .='</span>';
														$output .='<span class="feed-item-comments">';
															$output .='<span class="feed-item-icons et-icon-comment"></span>';
															$output .= esc_attr( $item["comments"] );
														$output .='</span>';
													$output .='</p>';
													$output .='<p class="feed-item-description">';

														$excerpt = $item["description"];
														$limit   = 93;

												        if ( mb_strlen( $excerpt ) > $limit ) {
												            $subex = mb_substr( $excerpt, 0, $limit - 5 );
												            $exwords = explode( ' ', $subex );
												            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
												            if ( $excut < 0 ) {
												                $output .= mb_substr( $subex, 0, $excut );
												            } else {
												                $output .= $subex;
												            }
												            $output .= '[...]';
												        } else {
												            $output .= $excerpt;
												        }

													$output .='</p>';
													$output .='<div class="et-separator-dottes"></div>';
												$output .='</div>';
											$output .='</div>';
							            $output .= '</a>';	
									$output .='</div>';
								$output .='</div>';
							$output .='</div>';
						}
					$output .= '</div>';
				$output .= '</div>';
			}

			$id_counter++;

			return $output;

		}
	}

	add_shortcode('et_instagram', 'et_instagram');

/*  gmap
--------------*/
	
	function et_gmap($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'zoom'    => '18',
				'x_coords'=> '',
				'y_coords'=> '',
				'type'    => 'roadmap',
				'width'   => '100%',
				'height'  => '480px',
				'marker'  => '',
				'animate' => 'false',
				'title'   => ''
			), $atts)
		);

		global $goodresto_enovathemes;

		static $id = 1;
		$output ='';

		if(empty($width)) {$width = "100%";}
		if(empty($height)) {$height = "480px";}
		if(empty($zoom) || !is_numeric($zoom) || $zoom < 0){$zoom = "18";}

		if (!isset($marker) || empty($marker)) {
			$marker = GOODRESTO_ENOVATHEMES_IMAGES.'/marker.png';
		} else {
			$marker_ats = wp_get_attachment_image_src($marker, 'full');
			$marker     =  $marker_ats[0];
		}

		$output .= '<div class="map" id="gmap-'.$id.'" data-title="'.esc_attr($title).'" data-animate="'.esc_attr($animate).'"  data-x="'.esc_attr($x_coords).'" data-y="'.esc_attr($y_coords).'" data-type="'.esc_attr($type).'" data-zoom="'.absint($zoom).'" data-marker="'.$marker.'" style="width:'.$width.';height:'.$height.';">';
			if (isset($content) && !empty($content)) {
				$output .= '<div class="map-content">'.do_shortcode(wp_kses($content,wp_kses_allowed_html( 'post' ))).'</div>';
			}
		$output .= '</div>';

		$id++;

		return $output;

	}
	add_shortcode('et_gmap', 'et_gmap');

/*  counter
/*------------*/

	function et_counter( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'number'         => '',
			'number_prefix'  => '',
			'font_size'      => '56',
			'font_weight'    => '400',
			'line_height'    => '56',
			'letter_spacing' => '',
			'color'          => '#d3a471'
		), $atts));

		$styles = '';
		$output = '';

		if (isset($font_size) && !empty($font_size)) {
			$styles .= 'font-size:'.$font_size.'px;';
		}

		if (isset($font_weight) && !empty($font_weight)) {
			$styles .= 'font-weight:'.$font_weight.';';
		}

		if (isset($line_height) && !empty($line_height)) {
			$styles .= 'line-height:'.$line_height.'px;';
		}

		if (isset($letter_spacing) && !empty($letter_spacing)) {
			$styles .= 'letter-spacing:'.$letter_spacing.'px;';
		}

		if (isset($color) && !empty($color)) {
			$styles .= 'color:'.$color.';';
		}

		if (isset($number) && !empty($number)) {	
	    	$output .='<p data-to="'.$number.'" class="et-counter et-clearfix" style="'.$styles.'">';
	    		$output .='<span class="counter"></span>';
	    		if (isset($number_prefix) && !empty($number_prefix)) {
	    			$output .='<span class="prefix">'.esc_attr($number_prefix).'</span>';
	    		}
	    	$output .='</p>';

	    	return $output;
		}

	}
	add_shortcode('et_counter', 'et_counter');

/*  progress
/*------------*/

	function et_progress( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'title'	         => '',
			'percentage'	 => '',
			'bar_color'      => '#d3a471',
			'track_color'    => '#e0e0e0'
		), $atts));

		$output = '';

		if(!is_numeric($percentage) || $percentage < 0){$percentage = "";} 
		elseif ($percentage > 100) {$percentage = "100";}

		if(isset($track_color) && !empty($track_color)) {$track_color = 'background-color:'.$track_color.';';}
		if(isset($bar_color) && !empty($bar_color)) {$bar_color = 'background-color:'.$bar_color.';';}

		if (isset($percentage) && !empty($percentage)) {

			$output .= '<div class="et-progress">';
				$output .= '<div class="text">';
					$output .= '<h5 class="title">'.esc_attr($title).'</h5>';
					$output .= '<span class="percent">'.absint($percentage).'</span>';
				$output .= '</div>';
				$output .= '<div class="track-bar">';
					$output .= '<div style="'.$bar_color.'" class="bar" data-percentage="'.absint($percentage).'"></div>';
					$output .= '<div style="'.$track_color.'" class="track"></div>';
				$output .= '</div>';
			$output .= '</div>';

	    	return $output;
		}

	}
	add_shortcode('et_progress', 'et_progress');

/*  circle progress
/*------------*/

	function et_circle_progress( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'percentage'	 => '',
			'bar_color'      => '#d3a471',
			'track_color'    => '#e1e1e1'
		), $atts));

		$output = '';

		if(!is_numeric($percentage) || $percentage < 0){$percentage = "";} 
		elseif ($percentage > 100) {$percentage = "100";}

		if(isset($bar_color) && !empty($bar_color)) {$bar_color = 'data-bar="'.$bar_color.'"';}
		if(isset($track_color) && !empty($track_color)) {$track_color = 'data-track="'.$track_color.'"';}

		if (isset($percentage) && !empty($percentage)) {

			$output .= '<div class="et-circle-progress" data-percent="'.absint($percentage).'" '.$bar_color.' '.$track_color.'>';
				$output .= '<span class="percent">'.absint($percentage).'</span>';
			$output .= '</div>';

	    	return $output;
		}

	}
	add_shortcode('et_circle_progress', 'et_circle_progress');

/*  timer
/*------------*/

	function et_timer( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'enddate'              => '',
			'days'                 => '',
			'hours'                => '',
			'minutes' 			   => '',
			'seconds' 			   => '',
		), $atts));

		$output 	  = '';

		if (isset($enddate) && !empty($enddate)) {
			$enddate = 'data-enddate="'.$enddate.'"';
		}

		if (isset($days) && !empty($days)) {
			$days = esc_attr($days);
		}

		if (isset($hours) && !empty($hours)) {
			$hours = esc_attr($hours);
		}

		if (isset($minutes) && !empty($minutes)) {
			$minutes = esc_attr($minutes);
		}

		if (isset($seconds) && !empty($seconds)) {
			$seconds = esc_attr($seconds);
		}

		if (isset($enddate) && !empty($enddate)) {

			$output .='<div data-days="'.$days.'" data-hours="'.$hours.'" data-minutes="'.$minutes.'" data-seconds="'.$seconds.'" class="et-timer et-clearfix" '.$enddate.'>';
				$output .='<ul>';
				  $output .='<li><div><span class="timer-count days">00</span><h5 class="days_text timer-title">'.$days.'</h5></div></li>';
					$output .='<li><div><span class="timer-count hours">00</span><h5 class="hours_text timer-title">'.$hours.'</h5></div></li>';
					$output .='<li><div><span class="timer-count minutes">00</span><h5 class="minutes_text timer-title">'.$minutes.'</h5></div></li>';
					$output .='<li><div><span class="timer-count seconds">00</span><h5 class="seconds_text timer-title">'.$seconds.'</h5></div></li>';
				$output .='</ul>';
			$output .='</div>';

	    	return $output;
		}

	}
	add_shortcode('et_timer', 'et_timer');

/*	accordion
--------------*/

	function et_accordion($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'collapsible' => 'false',
			), $atts)
		);

		$output = '';
		static $id_counter = 1;

		$output .= '<div class="et-accordion-wrapper">';
			$output .='<div id="et-accordion-'.$id_counter.'" class="et-accordion et-clearfix collapsible-'.esc_attr($collapsible).'">';
				$output .= do_shortcode($content);
			$output .= '</div>';
		$output .= '</div>';

		$id_counter++;

		return $output;
		
	}
	add_shortcode('et_accordion', 'et_accordion');
	
	function et_accordion_item($atts, $content = null) {

		extract(shortcode_atts(array(
			'title' 	  => '',
			'icon_prefix' => '',
			'icon_name'   => '',
			'open'  	  => 'false',
		), $atts));

		$output = '';
		$class  = '';
		static $id_counter = 1;

		if($open == 'true'){
			$open = "active";
		}

		if (!isset($icon_prefix) || empty($icon_prefix)) {
			$icon_prefix = 'fa';
		}

		if (isset($icon_name) && !empty($icon_name)) {
			$class = 'icon-true';
		}

		$output .= '<div class="'.sanitize_html_class($open).' '.sanitize_html_class($class).' toggle-title et-clearfix">';
			if (isset($icon_name) && !empty($icon_name)) {
				$output .= '<span class="toggle-icon '.sanitize_html_class($icon_prefix).' '.sanitize_html_class($icon_name).'"></span>';
			}
			if (isset($title) && !empty($title)) {
				$output .= '<h5 class="toggle-title-tag">'.esc_attr($title).'</h5>';
			}
			$output .= '<span class="toggle-ind"></span>';
		$output .= '</div> ';
		$output .= '<div id="'.sanitize_title($title).'-'.$id_counter.'" class="toggle-content et-clearfix">';
		    $output .= do_shortcode($content);
		$output .= '</div>';

		$id_counter++;

		return $output;
	}
	add_shortcode('et_accordion_item', 'et_accordion_item');

/*	tab
--------------*/

	function et_tab($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'type'   => 'horizontal',
				'center' => 'false'
			), $atts)
		);

		$output = '';
		static $id_counter = 1;

		$output .= '<div class="et-tab-wrapper">';
			$output .='<div id="et-tab-'.$id_counter.'" class="et-tab center-'.esc_attr($center).' et-clearfix '.sanitize_html_class($type).'">';
				$output .= do_shortcode($content);
			$output .= '</div>';
		$output .= '</div>';

		$id_counter++;

		return $output;
		
	}
	add_shortcode('et_tab', 'et_tab');
	
	function et_tab_item($atts, $content = null) {

		extract(shortcode_atts(array(
			'title' 	  => '',
			'icon_prefix' => '',
			'icon_name'   => '',
			'active'  	  => 'false',
		), $atts));

		$output = '';

		static $id_counter = 1;

		if($active == 'true'){
			$active = "active";
		}

		if (!isset($icon_prefix) || empty($icon_prefix)) {
			$icon_prefix = 'fa';
		}

		$output .= '<div data-target="tab-'. sanitize_title( $title ) .'" class="'.sanitize_html_class($active).' tab et-clearfix">';
			if (isset($icon_name) && !empty($icon_name)) {
				$output .= '<span class="icon '.sanitize_html_class($icon_prefix).' '.sanitize_html_class($icon_name).'"></span>';
			}
			if (isset($title) && !empty($title)) {
				$output .= '<h5 class="tab-title-tag">'.esc_attr($title).'</h5>';
			}
		$output .= '</div> ';
		$output .= '<div id="tab-'.sanitize_title($title).'-'.$id_counter.'" class="tab-content et-clearfix">';
		    $output .= do_shortcode($content);
		$output .= '</div>';

		$id_counter++;

		return $output;
	}
	add_shortcode('et_tab_item', 'et_tab_item');

/*  person
/*------------*/

	function et_person( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'title'       => '',
			'subtitle'    => '',
			'image' 	  => '',
			'link' 		  => '',
			'link_target' => '_self',
			'box_back'    => ''
		), $atts));

		static $id_counter = 1;

		$output = '';
		$styles = '';

		if (isset($box_back) && !empty($box_back)) {
			$box_back = 'style="background-color:'.esc_attr($box_back).';"';
		}

		if (isset($image) && !empty($image)) {

			$image = wp_get_attachment_image_src($image,'full');

			$image_src    = $image[0];
			$image_width  = $image[1];
			$image_height = $image[2];
			$image_alt    = get_post_meta( $image, '_wp_attachment_image_alt', true );

			$output .='<div id="et-person-'.$id_counter.'" class="et-person overlay-fade">';
				$output .='<div class="overlay-hover">';
					$output .='<div class="image post-image">';
						$output .='<div class="image-container">';
							$output .='<img width="'.$image_width.'" height="'.$image_height.'" alt="'.esc_attr($image_alt).'" src="'.esc_url($image_src).'">';
						$output .='</div>';
						if (isset($link) && !empty($link)) {
							$output .= '<a href="'.esc_url($link).'" target="'.esc_attr($link_target).'">';
							$output .='<div class="post-image-overlay">';
								$output .='<div class="post-image-overlay-content">';
					            	$output .= '<span class="overlay-read-more"></span>';
				            	$output .='</div>';
					        $output .='</div>';
					        $output .='</a>';
				        }
				    $output .='</div>';
				$output .='</div>';
				$output .= '<div class="under-image-content et-clearfix" '.$box_back.'>';
					if (isset($title) && !empty($title)) {
						$output .= '<h4 class="person-title">'.esc_attr($title).'</h4>';
					}

					if (isset($subtitle) && !empty($subtitle)) {
						$output .= '<p class="person-subtitle">'.esc_attr($subtitle).'</p>';
					}
					$output .= '<div class="et-social-links social-links full et-clearfix">';
						foreach($atts as $social => $href) {
							if($href && $social != 'image' && $social != 'link' && $social != 'link_target' && $social != 'title' && $social != 'subtitle' && $social != 'box_back') {
								if ($social == 'email') {
									$output .='<a class="et-icon-'.$social.'" href="'.esc_attr($href).'"></a>';
								} elseif ($social == 'skype') {
									$output .='<a class="et-icon-'.$social.'" href="'.esc_attr($href).'"></a>';
								} else {
									$output .='<a class="et-icon-'.$social.'" href="'.esc_url($href).'"></a>';
								}
							}
						}
					$output .= '</div>';
				$output .= '</div>';
			$output .='</div>';

			$id_counter++;

	    	return $output;

		}


	}
	add_shortcode('et_person', 'et_person');

/*  testimonial
/*------------*/

	function et_testimonial( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'layout'                => 'grid',
			'animation_type'        => 'sequential',
			'animation_effect'      => 'none',
			'navigation_type'       => 'only-arrows',
			'column'                => '1',
			'gap'                   => '0',
		), $atts));

		$output = '';
		$styles = '';
		$extra_class = "";

		static $id_counter = 1;

		if (isset($gap) && !empty($gap)) {
			if ($layout == 'carousel') {
				$styles .= '#loop-testimonial-'.$id_counter.'{margin-left:-'.($gap/2).'px;margin-right:-'.($gap/2).'px;}';
				$styles .= '#loop-testimonial-'.$id_counter.' .et-item {padding-left:'.($gap/2).'px;padding-right:'.($gap/2).'px;}';
				$styles .= '#loop-testimonial-'.$id_counter.' .owl-nav > .owl-prev {left:-'.(64 - $gap/2).'px}';
				$styles .= '#loop-testimonial-'.$id_counter.' .owl-nav > .owl-next {right:-'.(64 - $gap/2).'px}';
			} else {
				$styles .= '#loop-testimonial-'.$id_counter.'{margin-left:-'.($gap/2).'px;margin-right:-'.($gap/2).'px;}';
				$styles .= '#loop-testimonial-'.$id_counter.' .et-item {padding-left:'.($gap/2).'px;padding-right:'.($gap/2).'px;padding-bottom:'.$gap.'px}';
			}
		}

		if ($layout == 'carousel') {
			$layout = 'owl-carousel';
		}

		$output .= '<div class="et-testimonial-wrapper">';

			if (!empty($styles)) {
				$output .= '<style>'.$styles.'</style>';
			}

			$output .='<div id="loop-testimonial-'.$id_counter.'" data-columns="'.$column.'" class="loop-testimonial '.$layout.' '.$extra_class.' navigation-'.$navigation_type.' effect-type-'.esc_attr($animation_type).' effect-'.esc_attr($animation_effect).' et-item-set et-clearfix">';
				$output .= do_shortcode($content);
			$output .= '</div>';

		$output .= '</div>';

		$id_counter++;

		return $output;


	}
	add_shortcode('et_testimonial', 'et_testimonial');

	function et_testimonial_item( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'image'     => '',
			'rating'    => 'none',
			'title'     => '',
			'highlights'=> "",
			'highlight' => 'false',
		), $atts));

		$output = '';

		$output .='<div class="et-item et-testimonial-item highlight-'.$highlight.'">';
			$output .='<div class="et-item-inner">';
				$output .= '<div class="testimonial-content et-clearfix">';
					if ($rating != 'none') {

						$width = 100;
						switch ($rating) {
							case 'poor':
								$width = 20;
								break;
							case 'fair':
								$width = 40;
								break;
							case 'average':
								$width = 60;
								break;
							case 'good':
								$width = 80;
								break;
							case 'excellent':
								$width = 100;
								break;
						}

						$output .= '<div class="rating">';
							$output .= '<span style="width:'.$width.'%;"></span>';
						$output .= '</div>';
					}
					if (isset($highlights) && !empty($highlights)) {
						$output .= '<h4 class="testimonial-highlights">"'.esc_attr($highlights).'"</h4><p>';
					}
					$output .= do_shortcode(wpautop(trim($content)));
				$output .= '</div>';
				if (isset($image) && !empty($image)) {

					$image 		  = wp_get_attachment_image_src($image,'thumbnail');
					$image_src    = $image[0];
					$image_width  = $image[1];
					$image_height = $image[2];
					$image_alt    = get_post_meta( $image, '_wp_attachment_image_alt', true );

					$output .='<img width="'.$image_width.'" height="'.$image_height.'" alt="'.esc_attr($image_alt).'" src="'.esc_url($image_src).'">';
				}
				

				if (isset($title) && !empty($title)) {
					$output .= '<h5 class="testimonial-title">'.esc_attr($title).'</h5>';
				}
			$output .='</div>';
		$output .='</div>';

    	return $output;

	}
	add_shortcode('et_testimonial_item', 'et_testimonial_item');


	function et_testimonial_alt( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'navigation_type'       => 'only-arrows',
		), $atts));

		$output = '';
		$styles = '';
		$extra_class = "";

		static $id_counter = 1;

		$output .= '<div class="et-testimonial-wrapper">';

			$output .='<div id="loop-testimonial-'.$id_counter.'" data-columns="1" class="loop-testimonial testimonial-alt owl-carousel navigation-'.$navigation_type.' et-clearfix">';
				$output .= do_shortcode($content);
			$output .= '</div>';

		$output .= '</div>';

		$id_counter++;

		return $output;


	}
	add_shortcode('et_testimonial_alt', 'et_testimonial_alt');

	function et_testimonial_alt_item( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'image'     => '',
			'rating'    => 'none',
			'title'     => '',
			'highlights'=> "",
		), $atts));

		$output = '';

		$output .='<div class="et-testimonial-item">';
			$output .='<div class="et-item-inner">';
				$output .= '<div class="testimonial-content et-clearfix">';

					if ($rating != 'none') {

						$width = 100;
						switch ($rating) {
							case 'poor':
								$width = 20;
								break;
							case 'fair':
								$width = 40;
								break;
							case 'average':
								$width = 60;
								break;
							case 'good':
								$width = 80;
								break;
							case 'excellent':
								$width = 100;
								break;
						}

						$output .= '<div class="rating">';
							$output .= '<span style="width:'.$width.'%;"></span>';
						$output .= '</div>';
					}

					if (isset($highlights) && !empty($highlights)) {
						$output .= '<h4 class="testimonial-highlights">"'.esc_attr($highlights).'"</h4>';
					}

					$output .= do_shortcode($content);
				$output .= '</div>';
				if (isset($image) && !empty($image)) {

					$image 		  = wp_get_attachment_image_src($image,'full');
					$image_src    = $image[0];
					$image_width  = $image[1];
					$image_height = $image[2];
					$image_alt    = get_post_meta( $image, '_wp_attachment_image_alt', true );

					$output .='<img width="'.$image_width.'" height="'.$image_height.'" alt="'.esc_attr($image_alt).'" src="'.esc_url($image_src).'">';
				}
				

				if (isset($title) && !empty($title)) {
					$output .= '<h4 class="testimonial-title">'.esc_attr($title).'</h4>';
				}
			$output .='</div>';
		$output .='</div>';

    	return $output;

	}
	add_shortcode('et_testimonial_alt_item', 'et_testimonial_alt_item');

/*  tweets
/*------------*/

	function et_tweets($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'twitter_id' => '',
				'count'      => '1',
				'icon_color' => '#d3a471',
				'text_color' => '',  
			), $atts)
		);

		$output = '';
		$styles = '';

		static $id_counter = 1;

		global $goodresto_enovathemes;

		if (isset($text_color) && !empty($text_color)) {
			$styles .= '#et-tweets-'.$id_counter.' {color:'.$text_color.';}';
		}

		if (isset($icon_color) && !empty($icon_color)) {
			$styles .= '#et-tweets-'.$id_counter.':before {color:'.$icon_color.';}';
			$styles .= '#et-tweets-'.$id_counter.' a {color:'.$icon_color.';}';
			$styles .= '#et-tweets-'.$id_counter.' a:hover {color:'.goodresto_enovathemes_hex_to_rgb_shade($icon_color,60).';}';
		}

		if (!empty($twitter_id)) {

			$args = array(
				'before_widget' => '<div class="et-tweets-wrapper"><style>'.$styles.'</style><div id="et-tweets-'.$id_counter.'" class="et-tweets">',
				'after_widget'  => '</div></div>'
			);

			$instance = array(
				'title'               => '',
				'twitter_id'          => $twitter_id,
				'count'               => absint($count)
			);

			$output .= goodresto_enovathemes_get_the_widget( 'Enovathemes_Addons_WP_Widget_Twitter', $instance,$args);

		}

		$id_counter++;

		return $output;
	}

	add_shortcode('et_tweets', 'et_tweets');

/*  client
/*------------*/

	function et_client( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'layout'                => 'grid',
			'column'                => '1',
			'gap'                   => '0',
			'box_back'      		=> '',
			'box_border'    		=> '',
		), $atts));

		$output = '';
		$styles = '';
		$class  = 'without-gap';

		static $id_counter = 1;

		if ($layout == 'carousel') {
			$layout = 'owl-carousel';
		}

		if (isset($gap) && !empty($gap)) {
			$styles .= '#loop-client-'.$id_counter.'{margin-left:-'.($gap/2).'px;margin-right:-'.($gap/2).'px;}';
			
			if ($layout == 'owl-carousel') {
				$styles .= '#loop-client-'.$id_counter.' .et-item {padding-left:'.($gap/2).'px;padding-right:'.($gap/2).'px;}';
				$styles .= '#loop-client-'.$id_counter.' .owl-nav > .owl-prev {left:-'.(64 - $gap/2).'px}';
				$styles .= '#loop-client-'.$id_counter.' .owl-nav > .owl-next {right:-'.(64 - $gap/2).'px}';
			} else {
				$styles .= '#loop-client-'.$id_counter.' .et-item {padding-left:'.($gap/2).'px;padding-right:'.($gap/2).'px;padding-bottom:'.$gap.'px;}';
			}

		
			if (isset($box_border) && !empty($box_border)) {
				$styles .= '#loop-client-'.$id_counter.' .client-content {box-shadow:inset 0 0 0 1px '.$box_border.';}';
			}

			$class = "with-gap";

		} else {
			
			if (isset($box_border) && !empty($box_border)) {
				$styles .= '#loop-client-'.$id_counter.' .client-content {border-right:1px solid '.$box_border.';border-bottom:1px solid '.$box_border.';}';
			}
		}

		if (isset($box_back) && !empty($box_back)) {
			$styles .= '#loop-client-'.$id_counter.' .client-content {background-color:'.$box_back.';}';
		}

		$output .= '<div class="et-client-wrapper">';

			if (!empty($styles)) {
				$output .= '<style>'.$styles.'</style>';
			}

			$output .='<div id="loop-client-'.$id_counter.'" data-columns="'.$column.'" class="loop-client '.$class.' '.$layout.' effect-none et-item-set et-clearfix">';
				$output .= do_shortcode($content);
			$output .= '</div>';

		$output .= '</div>';

		$id_counter++;

		return $output;


	}
	add_shortcode('et_client', 'et_client');

	function et_client_item( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'image'  	  => '',
			'link' 		  => '',
			'link_target' => '_self'
		), $atts));

		$output = '';

		$link_before = "";
		$link_after  = "";

		if (isset($link) && !empty($link)) {
			$link_before = '<a href="'.esc_url($link).'" target="'.$link_target.'">';
			$link_after  = '</a>';
		}

		$output .='<div class="et-item et-client-item">';
			$output .='<div class="et-item-inner">';
				$output .= '<div class="client-content et-clearfix">';
					if (isset($image) && !empty($image)) {

						$image 		  = wp_get_attachment_image_src($image,'full');
						$image_src    = $image[0];
						$image_width  = $image[1];
						$image_height = $image[2];
						$output .= $link_before;
							$output .='<img width="'.$image_width.'" height="'.$image_height.'" alt="" src="'.esc_url($image_src).'">';
						$output .= $link_after;
					}
				$output .= '</div>';
			$output .='</div>';
		$output .='</div>';

    	return $output;

	}
	add_shortcode('et_client_item', 'et_client_item');

/*  mailchimp
/*------------*/

	function et_mailchimp( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'action'                => '',
			'name'                  => '',
			'center'                => 'false',
			'email_placeholder' 	=> esc_html__('Enter your email','enovathemes-addons'),
			'button_placeholder' 	=> esc_html__('Subscribe','enovathemes-addons'),
		), $atts));

		$output = '';

		static $id_counter = 1;

		if (isset($email_placeholder) && !empty($email_placeholder)) {
			$email_placeholder = 'placeholder="'.esc_attr($email_placeholder).'"';
		}

		if (isset($button_placeholder) && !empty($button_placeholder)) {
			$button_placeholder = esc_attr($button_placeholder);
		}

		if (isset($action) && !empty($action)) {
			$action = esc_attr($action);
		}

		if (isset($name) && !empty($name)) {
			$name = esc_attr($name);
		}


        $output .='<div class="et-mailchimp-wrapper center-'.esc_attr($center).'">';
			$output .='<div id="et-mailchimp-'.$id_counter.'" class="et-mailchimp">';
				$output .='<form action="'.$action.'" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>';
					$output .='<div class="input-wrap">';
						$output .='<input type="text" value="" name="EMAIL" class="email" id="mce-EMAIL" '.$email_placeholder.' required>';
						$output .='<span class="after"></span>';
					$output .='</div>';
				    $output .='<button type="submit" name="subscribe" id="mc-embedded-subscribe">'.$button_placeholder.'</button>';
				    $output .='<input type="hidden" name="'.$name.'" tabindex="-1" value="" class="hidden">';
				$output .='</form>';
			$output .='</div>';
		$output .='</div>';

		$id_counter++;

		return $output;


	}
	add_shortcode('et_mailchimp', 'et_mailchimp');

/*  booking
/*------------*/

	function et_booking( $atts, $content = null ) {

		extract(shortcode_atts(array(), $atts));

		$output = '';

		static $id_counter = 1;

		$output .='<form name="et-booking-form" action="'.esc_url( admin_url('admin-post.php') ).'" class="et-booking-form" id="et-booking-form-'.$id_counter.'" method="POST">';
			$output .='<div class="et-booking-half push-right">';
				$output .='<span class="et-booking-alert et-booking-form-name-valid warning">'.esc_html__('Please enter your name', 'enovathemes-addons').'</span>';
				$output .='<input type="text" name="et_booking_form_name" class="et-booking-form-name" placeholder="'.esc_html__('Name', 'enovathemes-addons').'" />';
			$output .='</div>';

			$output .='<div class="et-booking-half">';
				$output .='<span class="et-booking-alert et-booking-form-tel-valid warning">'.esc_html__('Please enter your telephone', 'enovathemes-addons').'</span>';
				$output .='<input type="text" name="et_booking_form_tel" class="et-booking-form-tel" placeholder="'.esc_html__('Tel', 'enovathemes-addons').'" />';
			$output .='</div>';

			$output .='<div class="et-booking-half push-right">';
				$output .='<span class="et-booking-alert et-booking-form-email-valid warning">'.esc_html__('Invalid or empty email', 'enovathemes-addons').'</span>';
				$output .='<input type="text" name="et_booking_form_email" class="et-booking-form-email" placeholder="'.esc_html__('Your Email', 'enovathemes-addons').'" />';
			$output .='</div>';

			$output .='<div class="et-booking-half">';
				$output .='<span class="et-booking-alert et-booking-form-person-valid warning">'.esc_html__('Please choose person number', 'enovathemes-addons').'</span>';
				$output .='<select name="et_booking_form_person" class="et-booking-form-person">';
					$output .='<option value="none">'.esc_html__('Number of persons', 'enovathemes-addons').'</option>';
                    $output .='<option value="1">'.esc_html__('1 person', 'enovathemes-addons').'</option>';
                    $output .='<option value="2">'.esc_html__('2 persons', 'enovathemes-addons').'</option>';
                    $output .='<option value="2-5">'.esc_html__('2-5 persons', 'enovathemes-addons').'</option>';
                    $output .='<option value="5-10">'.esc_html__('5-10 persons', 'enovathemes-addons').'</option>';
                    $output .='<option value="10-15">'.esc_html__('10-15 persons', 'enovathemes-addons').'</option>';
                    $output .='<option value="15+">'.esc_html__('15 and more', 'enovathemes-addons').'</option>';
				$output .='</select>';
			$output .='</div>';

			$output .='<div class="et-booking-half push-right">';
				$output .='<span class="et-booking-alert et-booking-form-date-valid warning">'.esc_html__('Please choose the date', 'enovathemes-addons').'</span>';
				$output .='<input type="date" name="et_booking_form_date" class="et-booking-form-date" />';
			$output .='</div>';

			$output .='<div class="et-booking-half">';
				$output .='<span class="et-booking-alert et-booking-form-time-valid warning">'.esc_html__('Please choose the time', 'enovathemes-addons').'</span>';
				$output .='<input type="time" name="et_booking_form_time" class="et-booking-form-time" />';
			$output .='</div>';

			$output .='<div class="message-div">';
				$output .='<textarea name="et_booking_form_mgs" class="et-booking-form-mgs" placeholder="'.esc_html__('Additional notes', 'enovathemes-addons').'"></textarea>';
			$output .='</div>';
			$output .='<div class="send-div">';
				$output .='<input type="hidden" name="action" value="et_booking_form" />';
				$output .='<input class="et-booking-form-submit" type="submit" value="'.esc_html__('Book now', 'enovathemes-addons').'" name="submit" id="et_booking_form_submit">';
				$output .='<div class="sending"></div>';
			$output .='</div>';
	    	$output .='<div class="et-booking-respond-message et-booking-form-submit-success success">'.esc_html__('Your booking is successfully sent', 'enovathemes-addons').'</div>';
	    	$output .='<div class="et-booking-respond-message et-booking-form-submit-error warning">'.esc_html__('Something went wrong. Your booking was not send.', 'enovathemes-addons').'</div>';
	    $output .='</form>';


		$id_counter++;

		return $output;


	}
	add_shortcode('et_booking', 'et_booking');

/*  tagline
/*------------*/

	function et_tagline( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'title'                   => 'Call to action',
			'title_color'             => '#ffffff',
			'back_color'    	      => '#d3a471',
			'button_text'             => 'Read more',
			'button_link'             => '#link',
			'button_color'            => '#212121',
			'button_color_hover'      => '#ffffff',
			'button_back_color'       => '#ffffff',
			'button_back_color_hover' => '#212121',
			'icon_prefix'             => '',
			'icon_name'               => '',
			'icon_size'               => '',
		), $atts));

		$output 		     = '';
		$styles              = '';
		$styles_title  		 = '';
		$styles_icon  		 = '';
		$styles_button 		 = '';
		$button_styles_hover = '';

		static $id_counter = 1;


        if (isset($title_color) && !empty($title_color)) {
            $styles_title .= 'color:'.$title_color.';';
        }
		
        if (isset($button_color) && !empty($button_color)) {
            $styles_button .= 'color:'.$button_color.';';
        }

        if (isset($button_back_color) && !empty($button_back_color)) {
            $styles_button .= 'background-color:'.$button_back_color.';';
            if (empty($button_back_color_hov)) {
            	$button_styles_hover = 'background:'.goodresto_enovathemes_hex_to_rgb_shade($button_back_color,30).';';
            }
        }

        if (isset($button_back_color_hover) && !empty($button_back_color_hover)) {
        	$button_styles_hover = 'background-color:'.$button_back_color_hover.';';
        }

        if (isset($button_color_hover) && !empty($button_color_hover)) {
        	$button_styles_hover .= 'color:'.$button_color_hover.';';
        }

        if (isset($back_color) && !empty($back_color)) {
            $styles .= 'background-color:'.$back_color.';';
        }

        if (!isset($icon_prefix) || empty($icon_prefix)) {
			$icon_prefix = 'fa';
		}

		if (isset($icon_name) && !empty($icon_name)) {
			if (isset($title_color) && !empty($title_color)) {
				$styles_icon .= 'color:'.$title_color.';';
			}
		}

        $output .='<div class="et-tagline-wrapper">';
        	$output .='<style>#et-tagline-'.$id_counter.' {'.$styles.'}#et-tagline-'.$id_counter.' .tagline-title{'.$styles_title.'}#et-tagline-'.$id_counter.' .tagline-button{'.$styles_button.'}#et-tagline-'.$id_counter.' .tagline-button:hover{'.$button_styles_hover.'}#et-tagline-'.$id_counter.' .tagline-icon{'.$styles_icon.'}</style>';
			$output .='<div id="et-tagline-'.$id_counter.'" class="et-tagline icon-'.sanitize_html_class($icon_size).'">';
				if (isset($icon_name) && !empty($icon_name)) {
					$output .= '<span class="tagline-icon et-icon '.sanitize_html_class($icon_prefix).' '.sanitize_html_class($icon_name).'"></span>';
				}
				$output .='<h3 class="tagline-title">'.esc_attr($title).'</h3>';
				if (isset($button_link) && !empty($button_link)) {
					$output .='<a href="'.esc_url($button_link).'" class="tagline-button et-button medium">'.esc_attr($button_text).'</a>';
				}
			$output .='</div>';
		$output .='</div>';

		$id_counter++;

		return $output;


	}
	add_shortcode('et_tagline', 'et_tagline');

/*  banner
/*------------*/

	function et_banner( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'visible_mob'   => 'false',
			'visible_tablet'=> 'false',
			'cookie'        => 'false',
			'delay'  => '3000',
			'effect' => 'fade-in-scale', 
			'width'  => '720',
			'height' => '400',
			'back_color'   => '#ffffff',
			'border_color' => '',
			'back_img'     => ''
		), $atts));

		$output 		     = '';
		$styles              = '';

		static $id_counter = 1;

		if (isset($back_color) && !empty($back_color)) {
            $styles .= 'background-color:'.$back_color.';';
        }

        if (isset($border_color) && !empty($border_color)) {
            $styles .= 'box-shadow:inset 0 0 0 4px '.$border_color.';';
        }

        if (isset($width) && !empty($width)) {
            $styles .= 'width:'.esc_attr($width).'px;';
            $styles .= 'margin-left:-'.(esc_attr($width)/2).'px;';
        }

        if (isset($height) && !empty($height)) {
            $styles .= 'height:'.esc_attr($height).'px;';
            $styles .= 'margin-top:-'.(esc_attr($height)/2).'px;';
        }

        $image = wp_get_attachment_image_src($back_img,'full');
		$image_src    = $image[0];

		if ($image_src) {
            $styles .= 'background-image:url('.$image_src.');';
        }

		$output .='<div id="et-popup-banner-wrapper-'.$id_counter.'" data-cookie="'.esc_attr($cookie).'" data-mob="'.$visible_mob.'" data-delay="'.absint($delay).'" data-tablet="'.$visible_tablet.'" class="et-popup-banner-wrapper">';
			$output .='<div id="et-popup-banner-'.$id_counter.'" class="et-popup-banner et-clearfix '.esc_attr($effect).'" style="'.$styles.'">';
				$output .='<div class="popup-banner-toggle"></div>';
				$output .= do_shortcode($content);
			$output .='</div>';
		$output .='</div>';

		$id_counter++;

		return $output;


	}
	add_shortcode('et_banner', 'et_banner');

/*  pricing
/*------------*/

	function et_pricing( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'column' 				=> '1',
			'gap'                   => '0',
			'highlight_color' 	    => '#d3a471',
		), $atts));

		$output = '';
		$styles = '';
		$class  = '';

		static $id_counter = 1;

		if ($gap == '0') {
			$class  = 'no-gap';
		}

		if (isset($gap) && !empty($gap)) {
			$styles .= '#et-pricing-'.$id_counter.' {margin-left:-'.($gap/2).'px;margin-right:-'.($gap/2).'px;}';
			$styles .= '#et-pricing-'.$id_counter.' .pricing-item {padding-left:'.($gap/2).'px;padding-right:'.($gap/2).'px;padding-bottom:'.$gap.'px;}';
		}

		if (isset($highlight_color) && !empty($highlight_color)) {
		
			$styles .= '#et-pricing-'.$id_counter.' .pricing-item.highlight-true .pricing-item-inner  {';
				$styles .= 'box-shadow:inset 0 0 0 1px '.$highlight_color.', 0 10px 50px -12px rgba(171, 171, 171, 0.9);';
				$styles .= 'border-color:'.$highlight_color.' !important;';
			$styles .= '}';

			$styles .= '#et-pricing-'.$id_counter.' .pricing-item.highlight-true .et-button  {';
				$styles .= 'background-color:'.$highlight_color.';';
			$styles .= '}';

			$styles .= '#et-pricing-'.$id_counter.' pricing-label  {';
				$styles .= 'background-color:'.$highlight_color.';';
			$styles .= '}';

		}

        $output .='<div class="et-pricing-wrapper">';
        	if (!empty($styles)) {
        		$output .='<style>'.$styles.'</style>';
        	}
			$output .='<div id="et-pricing-'.$id_counter.'" class="et-pricing '.$class.'" data-columns="'.esc_attr($column).'">';
				$output .= do_shortcode($content);
			$output .='</div>';
		$output .='</div>';

		$id_counter++;

		return $output;


	}
	add_shortcode('et_pricing', 'et_pricing');

	function et_pricing_item($atts, $content = null) {

		extract(shortcode_atts(array(
			'highlight'=> 'false',
			'title'	   => '',
			'currency' => '',
			'price'    => '',
			'plan'     => '',
			'button_text' => '',
			'button_link' => '',
			'target' => '_self',
			'label' => '',
		), $atts));

		$output = '';

		$output .='<div class="pricing-item highlight-'.$highlight.'">';
			
			$output .='<div class="pricing-item-inner">';

				$output .='<div class="pricing-head">';
					
					if (isset($label) && !empty($label)) {
						$output .= '<span class="pricing-label">'.esc_attr($label).'</span>';
					}

					if (isset($title) && !empty($title)) {
						$output .= '<h4 class="pricing-title">'.esc_attr($title).'</h4>';
					}
					$output .='<div class="pricing-price">';
						if (isset($currency) && !empty($currency)) {
							$output .= '<span class="pricing-currency">'.esc_attr($currency).'</span>';
						}
						if (isset($price) && !empty($price)) {
							$output .= '<span class="pricing-price">'.esc_attr($price).'</span>';
						}
					$output .='</div>';
					if (isset($plan) && !empty($plan)) {
						$output .= '<div class="pricing-plan">'.esc_attr($plan).'</div>';
					}
				$output .='</div>';

				$output .='<div class="pricing-body">';
					$output .='<ul>';
						$split = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $content);
						foreach($split as $haystack) {
				            $output .= '<li>';
				            	$output .= $haystack;
				            $output .= '</li>';
				        }
			        $output .='</ul>';
		        $output .='</div>';

		        if (isset($button_text) && !empty($button_text) && isset($button_link) && !empty($button_link)) {
		        	$output .='<div class="pricing-footer">';
						$output .='<a target="'.$target.'" href="'.esc_url($button_link).'" class="et-button medium">';
							$output .='<span class="text">'.esc_attr($button_text).'</span>';
						$output .='</a>';
					$output .='</div>';
				}

			$output .='</div>';

		$output .='</div>';

		return $output;
	}
	add_shortcode('et_pricing_item', 'et_pricing_item');

/*  content box
/*------------*/

	function et_content_box( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'column'			 => '1',
			'gap'				 => '40',
			'animation_type'     => 'sequential',
			'animation_effect'   => 'none',
			'icon_size'			 => 'medium',
			'icon_alignment' 	 => 'left',
			'icon_border_radius' => '',
			'animate_hover'      => 'none'
		), $atts));

		$output = '';
		$styles = '';

		static $id_counter = 1;

		if (isset($gap) && !empty($gap)) {
			$styles .= '#et-content-box-'.$id_counter.'{margin-left:-'.($gap/2).'px;margin-right:-'.($gap/2).'px;}';
			$styles .= '#et-content-box-'.$id_counter.' .box-item-inner {padding:'.($gap/2).'px}';
		}

		if (isset($icon_border_radius) && !empty($icon_border_radius)) {
			$styles .= '#et-content-box-'.$id_counter.' .et-icon-wrap {border-radius:'.$icon_border_radius.'px;}';
		}

        $output .='<div class="et-content-box-wrapper">';
        	if (!empty($styles)) {
        		$output .='<style>'.$styles.'</style>';
        	}
			$output .='<div id="et-content-box-'.$id_counter.'" class="et-content-box et-item-set et-clearfix hover-'.esc_attr($animate_hover).' '.esc_attr($icon_size).' '.esc_attr($icon_alignment).' effect-type-'.esc_attr($animation_type).' effect-'.esc_attr($animation_effect).'" data-columns="'.esc_attr($column).'">';
				$output .= do_shortcode($content);
			$output .='</div>';
		$output .='</div>';

		$id_counter++;

		return $output;


	}
	add_shortcode('et_content_box', 'et_content_box');

	function et_box_item($atts, $content = null) {

		extract(shortcode_atts(array(
			'icon_prefix' 		   		 => '',
			'icon_name' 		   		 => '',
			'icon_link' 		   		 => '',
			'icon_color' 		   		 => '',
			'icon_back_color' 		     => '',
			'icon_border_color'    		 => '',
			'icon_color_hover'     		 => '',
			'icon_back_color_hover'      => '',
			'icon_border_color_hover'    => '',
			'icon_border_width'  		 => '',
			'icon_shadow'		 		 => 'false',
		), $atts));

		$output 	  = '';
		$extra_class  = '';
		$styles       = '';
		$styles_glint = '';
		$styles_hover = '';
		$styles_icon_hover = '';
		$link_before  = ''; 
		$link_after   = ''; 

		if (isset($icon_link) && !empty($icon_link)) {
			$link_before = '<a href="'.esc_url($icon_link).'">'; 
			$link_after  = '</a>'; 
		}

		static $id_counter = 1;

		if ((isset($icon_border_color) && !empty($icon_border_color)) || (isset($icon_back_color) && !empty($icon_back_color))) {
			$extra_class = 'full';
		}

		$styles .= '#box-item-'.$id_counter.' .et-icon-wrap {';

			if (isset($icon_back_color) && !empty($icon_back_color)) {
				$styles .= 'background-color:'.$icon_back_color.';';
			}

			if (isset($icon_border_width) && !empty($icon_border_width)) {
				if (isset($icon_border_color) && !empty($icon_border_color)) {
					if ($icon_shadow == "true") {
						$styles .= 'box-shadow:inset 0 0 0 '.$icon_border_width.'px '.$icon_border_color.', 0 0 2px 2px rgba(0,0,0,0.1);';
					} else {
						$styles .= 'box-shadow:inset 0 0 0 '.$icon_border_width.'px '.$icon_border_color.';';
					}
				}
			}

		$styles .= '}';

		
		if (isset($icon_color) && !empty($icon_color)) {
			$styles .= '#box-item-'.$id_counter.' .et-icon-wrap > .et-icon {';
				$styles .= 'color:'.$icon_color.';';
				$styles_icon_hover = 'color:'.$icon_color.';';
				$styles_glint = 'background-color:'.$icon_color.';';
			$styles .= '}';
		}
		
		if (isset($icon_border_width) && !empty($icon_border_width)) {
			if (isset($icon_border_color_hover) && !empty($icon_border_color_hover)) {
				$styles .= '#box-item-'.$id_counter.':hover .et-icon-wrap {';
					if ($icon_shadow == "true") {
						$styles .= 'box-shadow:inset 0 0 0 '.$icon_border_width.'px '.$icon_border_color_hover.', 0 0 2px 2px rgba(0,0,0,0.1);';
					} else {
						$styles .= 'box-shadow:inset 0 0 0 '.$icon_border_width.'px '.$icon_border_color_hover.';';
					}
				$styles .= '}';
			}
		}
		
		if (isset($icon_color_hover) && !empty($icon_color_hover)) {
			$styles .= '#box-item-'.$id_counter.':hover .et-icon-wrap > .et-icon {';
				$styles .= 'color:'.$icon_color_hover.';';
				$styles_glint = 'background-color:'.$icon_color_hover.';';
				$styles_icon_hover = 'color:'.$icon_color_hover.';';
			$styles .= '}';
		}
		
		if (isset($icon_back_color_hover) && !empty($icon_back_color_hover)) {
			$styles_hover .= 'background-color:'.$icon_back_color_hover.';';
		}



		if (isset($icon_border_width) && !empty($icon_border_width)) {
			$styles_hover .='width:calc(100% - '.(absint($icon_border_width)*2).'px);height:calc(100% - '.(absint($icon_border_width)*2).'px);';
		}

		$output .='<div class="box-item-wrapper et-item et-box-item">';
			if (!empty($styles)) {
				$output .='<style>'.$styles.'</style>';
			}
			$output .='<div id="box-item-'.$id_counter.'"  class="box-item-inner et-item-inner">';
				$output .='<div class="box-item-content-wrapper et-clearfix">';
					$output .= $link_before;
					if (!isset($icon_prefix) || empty($icon_prefix)) {
						$icon_prefix = 'fa';
					}
					if (isset($icon_name) && !empty($icon_name)) {
						$output .= '<div class="et-icon-wrap '.$extra_class.'">';
							$output .= '<span class="box-hover" style="'.$styles_hover.'" ></span>';
							$output .='<span class="glint" style="'.$styles_glint.'"></span>';
							$output .= '<span class="et-icon '.sanitize_html_class($icon_prefix).' '.sanitize_html_class($icon_name).'"></span>';
						$output .= '</div>';
					}
					$output .='<div class="box-item-content et-clearfix">';
						$output .= do_shortcode($content);
					$output .='</div>';
					$output .= $link_after;
				$output .='</div>';
			$output .='</div>';
		$output .='</div>';
		$id_counter++;

		return $output;
	}
	add_shortcode('et_box_item', 'et_box_item');

/*  splitscreen
/*------------*/

	function et_split_screen( $atts, $content = null ) {

		extract(shortcode_atts(array(), $atts));

		$output = '';

		$output .='<div class="ms-split-screen-wrapper">';
			$output .='<div class="ms-split-screen">';
				$output .= do_shortcode($content);
			$output .='</div>';
		$output .='</div>';

		return $output;
	}
	add_shortcode('et_split_screen', 'et_split_screen');

	function et_split_screen_left($atts, $content = null) {

		extract(shortcode_atts(array(
		), $atts));

		$output = '';

		$output .='<div class="ms-left">';
			$output .= do_shortcode($content);
		$output .='</div>';

		return $output;
	}
	add_shortcode('et_split_screen_left', 'et_split_screen_left');

	function et_split_screen_right($atts, $content = null) {

		extract(shortcode_atts(array(
		), $atts));

		$output = '';

		$output .='<div class="ms-right">';
			$output .= do_shortcode($content);
		$output .='</div>';

		return $output;
	}
	add_shortcode('et_split_screen_right', 'et_split_screen_right');

	function et_split_screen_content( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'title'          => '',
			'back_color'     => '',
			'back_image'     => '',
			'align'          => 'left',
			'class'          => ''
		), $atts));

		$output 	  = '';
		$styles 	  = '';

		static $id_counter = 1;

		if (isset($align) && !empty($align)) {
			$styles .= 'text-align:'.$align.';';
		}

		if (isset($back_color) && !empty($back_color)) {
			$styles .= 'background-color:'.$back_color.';';
		}

		if (isset($back_image) && !empty($back_image)) {
			$back_image = wp_get_attachment_image_src($back_image,'full');
			$styles .= 'background-image:url('.$back_image[0].');';
		}

		if (isset($title) && !empty($title)) {
			$title = 'data-title="'.esc_attr($title).'"';
		}

		$output .='<div id="ms-section-'.$id_counter.'" '.$title.' class="ms-section '.esc_attr($class).'" style="'.$styles.'">';
			$output .='<div class="ms-tableCell">';
				$output .= do_shortcode($content);
			$output .='</div>';
		$output .='</div>';

		$id_counter++;

		return $output;
	}
	add_shortcode('et_split_screen_content', 'et_split_screen_content');

/*  button
/*------------*/

	function et_button( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'button_text' 			       => '',
			'button_link' 				   => '',
			'target'                       => '_self',
			'button_link_modal' 		   => 'false',
			'button_size' 			       => 'medium',
			'button_font_size' 			   => '',
			'button_font_weight' 		   => '500',
			'button_letter_spacing' 	   => '',
			'button_color' 				   => '',
			'button_back_color' 	       => '',
			'button_border_color' 	       => '',
			'button_border_radius' 	       => '',
			'button_border_width' 		   => '',
			'button_shadow' 			   => 'false',
			'icon_prefix' 				   => '',
			'icon_name' 				   => '',
			'icon_position'                => 'left',
			'button_color_hover'		   => '',
			'button_back_color_hover'      => '',
			'button_border_color_hover'    => '',
			'animate_hover' 			   => 'none',
			'animate_click' 	           => 'none',
			'click_smooth' 	               => 'false',
			'custom_class'                 => ''
		), $atts));

		$output 	  = '';
		$styles 	  = '';
		$styles_hover = '';
		$styles_regular = '';
		$styles_glint = '';
		$data_color   = '';
		$class        = '';

		static $id_counter = 1;

		global $goodresto_enovathemes;

		if ($button_link_modal == "true") {
			$target = "_self";
		}

		if (isset($custom_class) && !empty($custom_class)) {
			$custom_class = esc_attr($custom_class);
		}

		if (isset($icon_name) && !empty($icon_name)) {
			$class .= 'has-icon ';
		}

		if (isset($click_smooth) && !empty($click_smooth) && $click_smooth == "true") {
			$click_smooth = 'click-smooth';
		}

		if (isset($button_color) && !empty($button_color)) {
			$styles .= 'color:'.$button_color.';';
			$data_color = 'data-color="'.$button_color.'"';
			$styles_glint = 'background-color:'.$button_color.';';
		}

        if (isset($button_back_color) && !empty($button_back_color)) {
            $styles_regular .= 'background-color:'.$button_back_color.';';
            if (isset($button_shadow) && $button_shadow == "true") {
	            $styles .= 'box-shadow:0 4px 15px rgba(0,0,0,0.1);';
	        }
        }

        
        if (isset($button_font_size) && !empty($button_font_size)) {
            $styles .= 'font-size:'.$button_font_size.'px !important;';
        }

        if (isset($button_font_weight) && !empty($button_font_weight)) {
            $styles .= 'font-weight:'.$button_font_weight.' !important;';
        }

        if (isset($button_letter_spacing) && !empty($button_letter_spacing)) {
            $styles .= 'letter-spacing:'.$button_letter_spacing.'px !important;';
        }

		if (isset($button_border_radius) && !empty($button_border_radius)) {
            $styles .= 'border-radius:'.$button_border_radius.'px !important;';
            if ($button_border_radius >= 16) {
            	$class .= 'border-radius-large ';
            }
        }

		if (isset($button_border_width) && !empty($button_border_width)) {
			if (isset($button_border_color) && !empty($button_border_color)) {
				$styles_regular .= 'box-shadow:inset 0 0 0 '.$button_border_width.'px '.$button_border_color.'  !important;';
	        }
        }

        if (isset($button_back_color_hover) && !empty($button_back_color_hover)) {
            $styles_hover .= 'background-color:'.$button_back_color_hover.' !important;';
        }

        if (isset($button_border_width) && !empty($button_border_width)) {
			if (isset($button_border_color_hover) && !empty($button_border_color_hover)) {
				$styles_hover .= 'box-shadow:inset 0 0 0 '.$button_border_width.'px '.$button_border_color_hover.' !important;';
	        }
        }

        if (isset($button_color_hover) && !empty($button_color_hover)) {
			$styles_glint = 'background-color:'.$button_color_hover.';';
			$button_color_hover = 'data-colorhover="'.$button_color_hover.'"';
		}

		if (isset($button_text) && !empty($button_text) && isset($button_link) && !empty($button_link)) {
			$output .='<a target="'.$target.'" href="'.esc_url($button_link).'" id="et-button-'.$id_counter.'" style="'.$styles.'" class="et-button '.$custom_class.' '.$class.' icon-position-'.$icon_position.' modal-'.esc_attr($button_link_modal).' '.esc_attr($button_size).' hover-'.esc_attr($animate_hover).' '.$click_smooth.' click-'.esc_attr($animate_click).'" '.$data_color.' '.$button_color_hover.'>';
				$output .='<span style="'.$styles_hover.'" class="hover"></span>';
				$output .='<span style="'.$styles_regular.'" class="regular"></span>';
				if ($animate_hover == "glint") {
					$output .='<span style="'.$styles_glint.'" class="glint"></span>';
				}
				if ($animate_click == "material") {
					$output .='<span style="'.$styles_glint.'" class="et-ink"></span>';
				}

				if (!isset($icon_prefix) || empty($icon_prefix)) {
					$icon_prefix = 'fa';
				}

				if ($icon_position == "left") {
					if (isset($icon_name) && !empty($icon_name)) {
						$output .='<span class="icon '.$icon_prefix.' '.$icon_name.'"></span>';
					}
					$output .='<span class="text">'.esc_attr($button_text).'</span>';
				} else {
					$output .='<span class="text">'.esc_attr($button_text).'</span>';
					if (isset($icon_name) && !empty($icon_name)) {
						$output .='<span class="icon '.$icon_prefix.' '.$icon_name.'"></span>';
					}
				}
				
			$output .='</a>';
		}
		
		$id_counter++;

		return $output;
	}
	add_shortcode('et_button', 'et_button');

/*  button_3d
/*------------*/

	function et_button_3d( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'button_text' 			       => '',
			'button_link' 				   => '',
			'target'                       => '_self',
			'button_link_modal' 		   => 'false',
			'button_size' 			       => 'medium',
			'button_font_size' 			   => '',
			'button_font_weight' 		   => '500',
			'button_letter_spacing' 	   => '',
			'button_color' 				   => '',
			'button_border_radius' 	       => '',
			'button_color_hover'		   => '',
			'animate_click' 	           => 'none',
			'click_smooth' 	               => 'false',
			'custom_class'                 => ''
		), $atts));

		$output 	  = '';
		$styles 	  = '';
		$stles_before = '';
		$data_color   = '';
		$class        = '';

		static $id_counter = 1;

		global $goodresto_enovathemes;

		if ($button_link_modal == "true") {
			$target = "_self";
		}

		if (isset($custom_class) && !empty($custom_class)) {
			$custom_class = esc_attr($custom_class);
		}

		if (isset($click_smooth) && !empty($click_smooth) && $click_smooth == "true") {
			$click_smooth = 'click-smooth';
		}

		if (isset($button_color) && !empty($button_color)) {
			$styles .= 'color:'.$button_color.';box-shadow:inset 0 0 0  1px '.$button_color.';';
			$data_color = 'data-color="'.$button_color.'"';
		}

        if (isset($button_font_size) && !empty($button_font_size)) {
            $styles .= 'font-size:'.$button_font_size.'px !important;';
        }

        if (isset($button_font_weight) && !empty($button_font_weight)) {
            $styles .= 'font-weight:'.$button_font_weight.' !important;';
        }

        if (isset($button_letter_spacing) && !empty($button_letter_spacing)) {
            $styles .= 'letter-spacing:'.$button_letter_spacing.'px !important;';
        }

		if (isset($button_border_radius) && !empty($button_border_radius)) {
            $styles .= 'border-radius:'.$button_border_radius.'px !important;';
            if ($button_border_radius >= 16) {
            	$class .= 'border-radius-large ';
            }
        }

        if (isset($button_color_hover) && !empty($button_color_hover)) {
			$button_color_hover = 'data-colorhover="'.$button_color_hover.'"';
		}

		if (isset($button_text) && !empty($button_text) && isset($button_link) && !empty($button_link)) {
			$output .='<a target="'.$target.'" href="'.esc_url($button_link).'" id="et-button-3d-'.$id_counter.'" style="'.$styles.'" class="et-button-3d '.$custom_class.' '.$class.' modal-'.esc_attr($button_link_modal).' '.esc_attr($button_size).' '.$click_smooth.' click-'.esc_attr($animate_click).'" '.$data_color.' '.$button_color_hover.'>';
				$output .='<span style="'.$styles.'" class="before"></span>';
				$output .='<span class="text">'.esc_attr($button_text).'</span>';
			$output .='</a>';
		}
		
		$id_counter++;

		return $output;
	}
	add_shortcode('et_button_3d', 'et_button_3d');

/*	grid
--------------*/

	function et_grid($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'item_animation_type'   => 'sequential',
				'item_animation_effect' => 'none',
				'item_column' 		 	=> '1',
				'item_gap' 			 	=> '0'
			), $atts)
		);

		$output = '';
		$styles = '';
		static $id_counter = 1;

		if (isset($item_gap) && !empty($item_gap)) {
			$styles .= '#loop-grid-'.$id_counter.'{margin-left:-'.($item_gap/2).'px;margin-right:-'.($item_gap/2).'px;}';
			$styles .= '#loop-grid-'.$id_counter.' > .et-item {padding-left:'.($item_gap/2).'px;padding-right:'.($item_gap/2).'px;padding-bottom:'.$item_gap.'px}';
		}

		$output .= '<div class="et-grid-wrapper">';
			if (!empty($styles)) {
				$output .= '<style>'.$styles.'</style>';
			}
		$output .= '</div>';
		$output .='<div id="loop-grid-'.$id_counter.'" data-columns="'.$item_column.'" class="loop-grid effect-type-'.esc_attr($item_animation_type).' effect-'.esc_attr($item_animation_effect).' et-item-set et-clearfix">';
			$output .= '<div class="grid-sizer"></div>';
			$output .= do_shortcode($content);
		$output .= '</div>';

		$id_counter++;

		return $output;
		
	}
	add_shortcode('et_grid', 'et_grid');
	
	function et_grid_item($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'custom_width'       => '',
				'custom_width_value' => '25%'
			), $atts)
		);

		$output = '';

		if (isset($custom_width) && $custom_width == "true") {
			$custom_width_value = 'data-width="'.esc_attr($custom_width_value).'"';
		} else {
			$custom_width_value = '';
		}

		$output .='<div '.$custom_width_value.' class="et-item grid-item">';
			$output .='<div class="et-item-inner et-clearfix">';
					$output .= do_shortcode($content);
			$output .='</div>';
		$output .='</div>';

		return $output;
	}
	add_shortcode('et_grid_item', 'et_grid_item');

/*	carousel
--------------*/

	function et_carousel($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'item_column' => '1',
				'item_gap'    => '0',
				'navigation_type' => 'only-arrows',
				'autoplay' => 'false',
			), $atts)
		);

		$output = '';
		$styles = '';
		static $id_counter = 1;

		if (isset($item_gap) && !empty($item_gap)) {
			$styles .= '#loop-carousel-'.$id_counter.' .loop-carousel {margin-left:-'.($item_gap/2).'px;margin-right:-'.($item_gap/2).'px;}';
			$styles .= '#loop-carousel-'.$id_counter.' .loop-carousel .et-carousel-item {padding-left:'.($item_gap/2).'px;padding-right:'.($item_gap/2).'px;padding-bottom:'.$item_gap.'px}';
			$styles .= '#loop-carousel-'.$id_counter.' .owl-nav > .owl-prev {left:-'.(64 - $item_gap/2).'px}';
			$styles .= '#loop-carousel-'.$id_counter.' .owl-nav > .owl-next {right:-'.(64 - $item_gap/2).'px}';
		}

		$output .= '<div class="et-carousel-wrapper">';
			if (!empty($styles)) {
				$output .= '<style>'.$styles.'</style>';
			}
			$output .='<div id="loop-carousel-'.$id_counter.'" class="loop-carousel et-clearfix autoplay-'.$autoplay.' navigation-'.$navigation_type.'">';
				$output .= '<div class="owl-carousel loop-carousel" data-columns="'.$item_column.'">';
					$output .= do_shortcode($content);
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';

		$id_counter++;

		return $output;
		
	}
	add_shortcode('et_carousel', 'et_carousel');
	
	function et_carousel_item($atts, $content = null) {

		extract(shortcode_atts(
			array(), $atts)
		);

		$output = '';

		$output .='<div class="et-carousel-item et-clearfix">';
			$output .= do_shortcode($content);
		$output .='</div>';

		return $output;
	}
	add_shortcode('et_carousel_item', 'et_carousel_item');

/*  recent posts
/*------------*/

	function et_recent_posts($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'post_type' 			=> 'grid',
				'post_size' 			=> 'small',
				'post_animation_effect' => 'none',
				'post_excerpt'          => '104',
				'post_number' 			=> '6',
				'post_cat' 				=> '',
				'post_filter'           => 'false',
				'post_filter_slugs'     => '',
				'operator'     			=> '',
				'orderby'     			=> '',
				'order'     			=> '',
			), $atts)
		);

		global $post, $goodresto_enovathemes;
		$output = "";

		static $id_counter = 1;

		if (isset($post_filter) && $post_filter == "true") {


			$post_number = 100;

			$query_options = array(
				'post_type'           => 'post',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 1,
				'orderby'             => $orderby,
				'order'               => $order,
				'posts_per_page' 	  => absint($post_number), 
				'post_name__in'       => explode(',',$post_filter_slugs)
			);
		} else {
			if (isset($post_cat) && !empty($post_cat)) {
				$query_options = array( 
					'orderby'             => $orderby,
					'order'               => $order,
					'post_type'           => 'post',
					'posts_per_page' 	  => absint($post_number), 
					'tax_query'           => array(
						array(
							'taxonomy' => 'category',
							'field'    => 'slug',
							'terms'    => explode(',',$post_cat),
							'operator' => $operator
						)
					),
					'post_status' 	 	  => 'publish',
					'ignore_sticky_posts' => true
				);
			} else {
				$query_options = array(
					'post_type'           => 'post',
					'post_status'         => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page' 	  => absint($post_number), 
					'orderby'             => $orderby,
					'order'               => $order,
				);
			}
		}


		$recent_posts = new WP_Query($query_options);

		if($recent_posts->have_posts()){

			$columns = 1;
			if(!is_numeric($post_number) || !isset($post_number) || empty($post_number) || $post_number < 0) {$post_number = 6;}

			$blog_image_effect = (isset($GLOBALS['goodresto_enovathemes']['blog-image-effect']) && $GLOBALS['goodresto_enovathemes']['blog-image-effect']) ? $GLOBALS['goodresto_enovathemes']['blog-image-effect'] : "overlay-fade";

			$class = 'recent-posts-layout';
			$class .= ' blog-layout-'.$post_type;
			$class .= ' '.$post_type;

			$list_class = '';

			if ($post_type == "grid" || $post_type == "masonry1" || $post_type == "masonry2") {
				$class .= ' post-size-'.$post_size;
				$list_class .= 'gridify';
			}

			if ($post_type == "carousel") {
				$list_class .= 'owl-carousel';
			}

			if ($post_animation_effect == "none") {
				$class .= ' lazy lazy-load';
			}

			switch ($post_size) {
	            case 'small' :
	                $columns = 4;
	                break;
	            case 'medium':
	                $columns = 3;
	                break;
	            case 'large':
	                $columns = 2;
	                break;
	        }

	        $thumb_size      = 'goodresto_588X440';
			$post_img_attr   = array();
			$post_img_sizes  = '100vw';
			$post_img_default_size  = $post_img_sizes;

			if ($post_type == "list") {
		    	$thumb_size            = 'goodresto_588X588';
				$post_img_default_size = '150px';
				$post_img_1024_size    = '150px';
				$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 588px, (max-width: 1023px) 150px, (max-width: 1279px) '.$post_img_1024_size.', '.$post_img_default_size;
		    } elseif ($post_type == "grid") {

		        switch ($post_size) {
		            case 'small' :
		            	$thumb_size            = 'goodresto_588X440';
						$post_img_default_size = '588px';
						$post_img_1024_size    = '588px';
						$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 588px, (max-width: 1023px) 384px, (max-width: 1279px) '.$post_img_1024_size.', '.$post_img_default_size;
		                break;
		            case 'medium':
						$thumb_size            = 'goodresto_588X440';
						$post_img_default_size = '588px';
						$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 588px, (max-width: 1023px) 384px, (max-width: 1279px) 384px, '.$post_img_default_size;
		                break;
		            case 'large':
						$thumb_size            = 'goodresto_588X440';
						$post_img_default_size = '588px';
						$post_img_1024_size    = '588px';
						$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 384px, (max-width: 1023px) 384px, (max-width: 1279px) '.$post_img_1024_size.', '.$post_img_default_size;
		                break;
		        }
		    }

			$output .='<div class="'.esc_attr($class).'">';
				$output .='<div id="loop-posts-'.$id_counter.'" data-columns="'.$columns.'" class="loop-posts '.$post_type.' '.$list_class.' recent-posts effect-'.esc_attr($post_animation_effect).' '.esc_attr($blog_image_effect).' et-item-set et-clearfix">';
					while($recent_posts->have_posts()) : $recent_posts->the_post();
						
						if ($post_type == "grid" || $post_type == "masonry1" || $post_type == "masonry2") {
							$output .='<div class="grid-sizer"></div>';
						}

						$values 	= get_post_custom( get_the_ID() );
						$post_width = isset( $values['post_width'] ) ? esc_attr( $values['post_width'][0] ) : "";

						if (empty($post_width) || !isset($post_width)) {
							switch ($post_size) {
								case 'small':
									$post_width = '25';
									break;
								case 'medium':
									$post_width = '30';
									break;
								case 'large':
									$post_width = '50';
									break;
							}
						}

						if (has_post_thumbnail()){

							if ( '' != get_the_title() ){
								$post_img_attr['alt'] = esc_html(get_the_title());
							}

							$post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "full" );
							$post_img_384  = get_the_post_thumbnail_url(get_the_ID(),'goodresto_384X288');
							$post_img_588  = get_the_post_thumbnail_url(get_the_ID(),'goodresto_588X440');

							$post_img_srcset = "";

							if (strpos($post_img_384, '384x')) {
								$post_img_srcset .= $post_img_384.' 384w';
							}


							if (strpos($post_img_588, '588x')) {
								$post_img_srcset .= ', '.$post_img_588.' 588w';
							}

							if ($post_type == "masonry1" || $post_type == "masonry2") {
								$thumb_size = 'full';
							}

							if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
								$post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
								$post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
							}

							$post_img_attr['srcset'] = $post_img_srcset;
							$post_img_attr['sizes']  = $post_img_sizes;
							
						}

						$output .='<article class="'.join( ' ', get_post_class('et-item')).'" data-width="'.$post_width.'" id="post-'.get_the_ID().'">';
							$output .='<div class="post-inner et-item-inner et-clearfix">';
								if ($post_type != "simple") {
									if (has_post_thumbnail()){
										if ($post_type == "masonry2"){
											$output .='<div class="post-image-wrapper">';
												$output .='<div class="post-image overlay-hover post-media">';
													if(is_sticky(get_the_ID())){
														$output .='<span class="post-sticky">'.esc_html__("Sticky post", "enovathemes-addons").'</span>';
													}
													$output .='<div class="image-container">';
														$output .='<div class="image-preloader"></div>';
														$output .=get_the_post_thumbnail( get_the_ID(), $thumb_size ,$post_img_attr);
													$output .='</div>';
													$output .='<div class="post-image-body">';
														$output .='<div class="post-image-body-inner-wrap">';
															$output .='<div class="post-image-body-inner">';
																$output .='<div class="post-meta et-clearfix">';
																	if('' != get_the_category_list()){
																		$output .='<div class="post-category">'.get_the_category_list(esc_html__( ', ', 'enovathemes-addons' )).'</div>';
																	}
																	$output .='<div class="post-date-inline">'.get_the_date().'</div>';
																$output .='</div>';
																if( '' != get_the_title() ){
																	$output .='<h3 class="post-title entry-title">';
																		$output .='<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title().'" rel="bookmark">';
																			$output .= get_the_title();
																		$output .='</a>';
																	$output .='</h3>';
																}
																if( '' != get_the_excerpt() ){
																	$output .='<div class="post-excerpt">'.goodresto_enovathemes_excerpt($post_excerpt).'</div>';
																}
															$output .='</div>';
															$output .='<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title().'" class="post-read-more">'.esc_html__("Continue reading", 'enovathemes-addons').'<span class="screen-reader-text">'.get_the_title().'</span></a>';
														$output .='</div>';
													$output .='</div>';
												$output .='</div>';
											$output .='</div>';
										}else {
											$output .='<div class="post-image-wrapper">';
												$output .='<div class="post-image overlay-hover post-media">';
													if(is_sticky(get_the_ID())){
														$output .='<span class="post-sticky">'.esc_html__("Sticky post", "enovathemes-addons").'</span>';
													}
													if($post_type != "list"){
														$output .=goodresto_enovathemes_post_image_overlay(get_the_ID());
													}
													$output .='<div class="image-container">';
														if($post_type != "carousel"){
															$output .='<div class="image-preloader"></div>';
														}
														$output .=get_the_post_thumbnail( get_the_ID(), $thumb_size ,$post_img_attr);
													$output .='</div>';
												$output .='</div>';
											$output .='</div>';
										}
				        			}
			        			}
			        			if ($post_type != "masonry2"){
									$output .='<div class="post-body et-clearfix">';

										if ($post_type == "grid" || $post_type == "masonry1"){
											if ('' != get_the_category_list()){
												$output .='<div class="post-category">'.get_the_category_list(esc_html__( ', ', 'enovathemes-addons' )).'</div>';
											}
										}

										$output .='<div class="post-body-inner-wrap">';
											$output .='<div class="post-body-inner">';
												if($post_type == "grid" || $post_type == "masonry1" || $post_type == "simple"){
													$output .='<div class="post-meta et-clearfix">';
														$output .='<div class="post-date-inline">'.get_the_date().'</div>';
													$output .='</div>';
												}
												if($post_type == "list"){
													$output .='<div class="post-meta et-clearfix">';
														if('' != get_the_category_list()){
															$output .=esc_html__("Posted in ", 'enovathemes-addons').'<div class="post-category">'.get_the_category_list(esc_html__( ', ', 'enovathemes-addons' )).'</div>';
														}
														$output .=esc_html__("on ", 'enovathemes-addons').'<div class="post-date-inline">'.get_the_date().'</div>';
													$output .='</div>';
												}
												if( '' != get_the_title() ){
													$output .='<h3 class="post-title entry-title">';
														$output .='<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title().'" rel="bookmark">';
															$output .=get_the_title();
														$output .='</a>';
													$output .='</h3>';
												}
												if ($post_type != "simple") {
													if( '' != get_the_excerpt() ){
														$output .='<div class="post-excerpt">'.goodresto_enovathemes_excerpt($post_excerpt).'</div>';
													}
													$output .='<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title().'" class="post-read-more">'.esc_html__("Continue reading", 'enovathemes-addons').'<span class="screen-reader-text">'.get_the_title().'?></span></a>';
												}
											$output .='</div>';
										$output .='</div>';
										if(!has_post_thumbnail() && $post_type == "grid"){
											if(is_sticky(get_the_ID())){
												$output .='<span class="post-sticky">'.esc_html__("Sticky post", "enovathemes-addons").'</span>';
											}
										}
									$output .='</div>';
								}

							$output .='</div>';
						$output .='</article>';	
					endwhile;
				$output .='</div>';
			$output .='</div>';

			$id_counter++;

			return $output;

			wp_reset_postdata();
			
		} else {
			goodresto_enovathemes_not_found('post');
		}

	}
	add_shortcode('et_recent_posts', 'et_recent_posts');

/*  recent events
/*------------*/

	function et_recent_events($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'event_container'        => 'boxed',
				'event_size' 			 => 'small',
				'event_type' 			 => 'grid',
				'event_animation_effect' => 'none',
				'event_limit'            => 'false',
				'event_filter_slugs'     => '',
				'event_filter'           => 'false',
				'event_number' 		     => '6',
				'category' 				 => '',
				'operator' 				 => 'IN',
				'gap'                    => '24'
			), $atts)
		);

		global $post, $goodresto_enovathemes;
		$output  = "";
		$columns = 1;
		$styles = '';

		static $id_counter = 1;

		if ($event_limit == "true" || !empty($category)) {
			$event_filter = "false";
			$event_number = 100;
		}

		if ($event_filter == "true") {
			$event_animation_effect = "none";
		}

		if (isset($gap) && !empty($gap)) {
			$styles .= '#loop-events-'.$id_counter.'{margin-left:-'.($gap/2).'px;margin-right:-'.($gap/2).'px;}';
			if ($event_type == 'carousel') {
				$styles .= '#loop-events-'.$id_counter.' .et-item {padding-left:'.($gap/2).'px;padding-right:'.($gap/2).'px;}';
				$styles .= '#loop-events-'.$id_counter.' .owl-nav > .owl-prev {left:-'.(64 - $gap/2).'px}';
				$styles .= '#loop-events-'.$id_counter.' .owl-nav > .owl-next {right:-'.(64 - $gap/2).'px}';
			} else {
				$styles .= '#loop-events-'.$id_counter.' .et-item {padding-left:'.($gap/2).'px;padding-right:'.($gap/2).'px;padding-bottom:'.$gap.'px;}';
			}
		}

		if(!is_numeric($event_number) || !isset($event_number) || empty($event_number) || $event_number < 0) {
			$event_number = 6;
		}

		if (isset($event_limit) && $event_limit == "true") {
			$query_options = array(
				'post_type'           => 'et-event',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 0,
				'meta_key'=>'event_date_unix',
		        'orderby'=>'meta_value',
		        'order'=>'DESC',
				'post_name__in'       => explode(',',$event_filter_slugs),
				'posts_per_page' 	  => absint($event_number), 
			);

			$event_filter = "false";

		} else {
			if (isset($category) && !empty($category)) {
				$query_options = array( 
					'meta_key'=>'event_date_unix',
			        'orderby'=>'meta_value',
			        'order'=>'DESC',
					'post_type'           => 'et-event',
					'posts_per_page' 	  => absint($event_number), 
					'tax_query'           => array(
						array(
							'taxonomy' => 'event-category',
							'field'    => 'slug',
							'terms'    => explode(',',$category),
							'operator' => $operator
						)
					),
					'post_status' 	 	  => 'publish',
					'ignore_sticky_posts' => true
				);

				$event_filter = "false";

			} else {
				$query_options = array(
					'post_type'           => 'et-event',
					'post_status'         => 'publish',
					'ignore_sticky_posts' => 0,
					'posts_per_page' 	  => absint($event_number), 
					'meta_key'=>'event_date_unix',
			        'orderby'=>'meta_value',
			        'order'=>'DESC',
				);
			}
		}

		$recent_events = new WP_Query($query_options);

		if($recent_events->have_posts()){

			$event_image_effect         = (isset($GLOBALS['goodresto_enovathemes']['event-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['event-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['event-image-effect'] : "overlay-fade";

			$class = 'recent-events-layout event-layout';

			if ($event_animation_effect == "none") {
				$class .= ' lazy lazy-load';
			}

			if ($event_type == "grid") {
				$class .= ' '.$event_type;
				$class .= ' post-size-'.$event_size;
				$class .= ' gridify';
			}

			$class .= ' filter-'.$event_filter;

		    $thumb_size      = 'goodresto_588X440';
			$post_img_attr   = array();
			$post_img_sizes  = '100vw';
			$post_img_default_size  = $post_img_sizes;

			switch ($event_size) {
		        case 'small' :
					$thumb_size            = ($event_container == "wide") ? 'goodresto_640X400' : 'goodresto_588X440';
					$post_img_default_size = ($event_container == "wide") ? '640px' : '588px';
					$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) '.$post_img_default_size.', (max-width: 767px) '.$post_img_default_size.', (max-width: 1023px) '.$post_img_default_size.', (max-width: 1279px) '.$post_img_default_size.', '.$post_img_default_size;
		            $columns = 4;
		            break;
		        case 'medium':
					$thumb_size            = ($event_container == "wide") ? 'goodresto_640X400' : 'goodresto_588X440';
					$post_img_default_size = ($event_container == "wide") ? '640px' : '588px';
					$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) '.$post_img_default_size.', (max-width: 767px) '.$post_img_default_size.', (max-width: 1023px) '.$post_img_default_size.', (max-width: 1279px) '.$post_img_default_size.', '.$post_img_default_size;
		            $columns = 3;
		            break;
		        case 'large':
					$thumb_size            = ($event_container == "wide") ? 'goodresto_960X600' : 'goodresto_588X440';
					$post_img_default_size = ($event_container == "wide") ? '960px' : '588px';
					$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) '.$post_img_default_size.', (max-width: 767px) '.$post_img_default_size.', (max-width: 1023px) '.$post_img_default_size.', (max-width: 1279px) '.$post_img_default_size.', '.$post_img_default_size;
		            $columns = 2;
		            break;
		    }

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

			$count_posts = wp_count_posts('et-event');
			$taxonomy  = 'event-category'; 
			$tax_terms = get_terms($taxonomy);

			$output .='<div class="'.esc_attr($class).'">';
				$output .='<style>'.$styles.'</style>';
				if ($event_filter == "true" && $event_type != 'carousel'){

					if (count($tax_terms) != 0){

						$output .='<div class="event-filter recent-event-filter et-event-filter enovathemes-filter button-group filter-button-group">';
				            $output .='<span class="first-filter active filter" data-filter="all" data-count="'.$count_posts->publish.'">'.esc_html__('Show All', 'enovathemes-addons').'</span>';
			            	foreach(get_terms('event-category',$args) as $filter_term){
		            			$filter_count    = $filter_term->count;
		            			$filter_children = get_term_children( $filter_term->term_id, 'event-category' );
		            			if(is_array($filter_children) && !empty($filter_children)) {
		            				foreach ($filter_children as $filter_child) {
		            					$filter_child_obj = get_term($filter_child, 'event-category');
		            					$filter_count = $filter_count + $filter_child_obj->count;
		            				}
		            			}
				                $output .='<span class="filter" data-filter="'.$filter_term->slug.'" data-count="'.$filter_count.'">'.$filter_term->name.'</span>';
				            }
					    $output .='</div>';

					}
				}
				$output .='<div id="loop-events-'.$id_counter.'" data-columns="'.$columns.'" class="loop-posts loop-event '.(($event_type == "grid") ? "gridify" : "owl-carousel").' recent-events effect-'.esc_attr($event_animation_effect).' '.esc_attr($event_image_effect).' filter-'.$event_filter.' et-item-set et-clearfix">';
					
					if ($event_type == 'grid') {
						$output .='<div class="grid-sizer"></div>';
					}
					
					while($recent_events->have_posts()) : $recent_events->the_post();
						
						$values     = get_post_custom( get_the_ID() );
					    $event_date = isset( $values['event_date'][0] ) ? date_create(esc_attr( $values["event_date"][0] )) : "";

					    $date       = new DateTime($values["event_date"][0]);
						$today      = new DateTime();

						$today->settime(0,0);

						$date  = $date->format('Y-m-d\TH:i:s.uO');
						$today = $today->format('Y-m-d\TH:i:s.uO');

						$event_status = '';

						if ($date < $today) {
							$event_status = esc_html__("Passed", "enovathemes-addons");
						}

						if ($date > $today) {
							$event_status = esc_html__("Upcoming", "enovathemes-addons");
						}

						if ($date == $today) {
							$event_status = esc_html__("Today", "enovathemes-addons");
						}

						$classes= array('all');
						if (get_the_terms( $post->ID, 'event-category', '', ' ', '' )) {
							foreach(get_the_terms( $post->ID, 'event-category', '', '', '' ) as $term) {
								array_push($classes, $term->slug);
							}
						}

						$output .='<article class="'.join( ' ', get_post_class('et-item post event '.implode(' ',$classes))).'" id="event-'.get_the_ID().'">';
							if (has_post_thumbnail()){

								if ( '' != get_the_title() ){
									$post_img_attr['alt'] = esc_html(get_the_title());
								}

								$post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "full" );
								$post_img_588  = get_the_post_thumbnail_url(get_the_ID(),'goodresto_588X440');
								$post_img_640  = get_the_post_thumbnail_url(get_the_ID(),'goodresto_640X400');
								$post_img_960  = get_the_post_thumbnail_url(get_the_ID(),'goodresto_960X600');

								$post_img_srcset = "";

								if (strpos($post_img_588, '588x')) {

									$post_img_srcset .= ', '.$post_img_588.' 588w';
								}

								if (strpos($post_img_640, '640x')) {

									$post_img_srcset .= ', '.$post_img_640.' 640w';
								}

								if (strpos($post_img_960, '960x')) {
									$post_img_srcset .= ', '.$post_img_960.' 960w';
								}

								if (empty($post_img_srcset)) {
									$post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
									$post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
								}

								$post_img_attr['srcset'] = $post_img_srcset;
								$post_img_attr['sizes']  = $post_img_sizes;
								
								
							}

							$output .='<div class="post-inner et-item-inner et-clearfix">';
								if (has_post_thumbnail()){
									$output .='<div class="post-image overlay-hover post-media">';
										$output .=goodresto_enovathemes_event_image_overlay(get_the_ID(),$event_type);
										$output .='<div class="image-preloader"></div>';
										$output .=get_the_post_thumbnail( get_the_ID(), $thumb_size ,$post_img_attr);
									$output .='</div>';
			        			}
			    				$output .='<div class="post-body et-clearfix">';

			    					if (!empty($event_status)){
			    						$output .='<div class="event-status">'.$event_status.'</div>';
			    					}

									$output .='<div class="post-body-inner-wrap">';
										$output .='<div class="post-body-inner">';
											$output .='<div class="event-date">'.date_i18n("F j, Y", strtotime(date_format($event_date,"F j, Y"))).'</div>';
											if ( '' != get_the_title() ){
												$output .='<h4 class="post-title">';
													$output .='<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title().'" rel="bookmark">';
														$output .= get_the_title();
													$output .='</a>';
												$output .='</h4>';
											}
										$output .='</div>';
									$output .='</div>';
								$output .='</div>';
							$output .='</div>';

						$output .='</article>';

					endwhile;
				$output .='</div>';
			$output .='</div>';

			$id_counter++;

			return $output;

			wp_reset_postdata();

		} else {
			goodresto_enovathemes_not_found('event');
		}

	}
	add_shortcode('et_recent_events', 'et_recent_events');


/*  recent menus
/*------------*/

	function et_restaurant_menu($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'menu_container' => 'boxed',
				'menu_post_layout' => 'grid',
				'menu_post_size' => 'small',
				'menu_animation_effect' => 'none',
				'menu_limit' => 'false',
				'menu_filter_slugs' => '',
				'menu_number' => '6',
				'category' => '',
				'operator' => 'IN',
				'menu_filter' => 'false',
				'default_filter' => 'all',
				'orderby' => '',
				'order' => '',
			), $atts)
		);

		global $post, $goodresto_enovathemes;
		$output  = "";
		$columns = 1;

		static $id_counter = 1;

		if ($menu_limit == "true" || !empty($category)) {
			// $menu_filter = "false";
			$menu_number = 10000;
		}

		if ($menu_filter == "true") {
			$menu_animation_effect = "none";
			$menu_number = 10000;
		}

		if(!is_numeric($menu_number) || !isset($menu_number) || empty($menu_number) || $menu_number < 0) {
			$menu_number = 6;
		}

		if (isset($menu_limit) && $menu_limit == "true") {
			$query_options = array(
				'post_type'           => 'menu',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 1,
		        'orderby'=>$orderby,
		        'order'=>$order,
				'post_name__in'       => explode(',',$menu_filter_slugs),
				'posts_per_page' 	  => absint($menu_number), 
			);

			$menu_filter = "false";

		} else {
			if (isset($category) && !empty($category)) {
				$query_options = array( 
					'orderby'=>$orderby,
		        	'order'=>$order,
					'post_type'           => 'menu',
					'posts_per_page' 	  => absint($menu_number), 
					'tax_query'           => array(
						array(
							'taxonomy' => 'menu-category',
							'field'    => 'slug',
							'terms'    => explode(',',$category),
							'operator' => $operator
						)
					),
					'post_status' 	 	  => 'publish',
					'ignore_sticky_posts' => true
				);

				// $menu_filter = "false";

			} else {

				$query_options = array(
					'post_type'           => 'menu',
					'post_status'         => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page' 	  => absint($menu_number), 
					'orderby'=>$orderby,
		        	'order'=>$order,
				);
				
			}
		}

		$recent_menus = new WP_Query($query_options);

		if($recent_menus->have_posts()){

			$class = 'recent-menus-layout menu-layout';

			if ($menu_animation_effect == "none") {
				$class .= ' lazy lazy-load';
			}

			$class .= ' '.$menu_post_layout;
			$class .= ' menu-container-'.$menu_container;
			$class .= ' post-size-'.$menu_post_size;

			if ($menu_post_layout != "carousel") {
				$class .= ' gridify';
			}

			$class .= ' filter-'.$menu_filter;

		    $thumb_size      = 'goodresto_588X440';
			$post_img_attr   = array();
			$post_img_sizes  = '100vw';
			$post_img_default_size  = $post_img_sizes;

			if ($menu_post_layout == "grid" || $menu_post_layout == "carousel") {
				switch ($menu_post_size) {
			        case 'small' :
						$thumb_size            = 'goodresto_588X588';
						$post_img_default_size = '588px';
						$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) '.$post_img_default_size.', (max-width: 767px) '.$post_img_default_size.', (max-width: 1023px) '.$post_img_default_size.', (max-width: 1279px) '.$post_img_default_size.', '.$post_img_default_size;
			            $columns = 4;
			            break;
			        case 'medium':
						$thumb_size            = 'goodresto_588X588';
						$post_img_default_size = '588px';
						$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) '.$post_img_default_size.', (max-width: 767px) '.$post_img_default_size.', (max-width: 1023px) '.$post_img_default_size.', (max-width: 1279px) '.$post_img_default_size.', '.$post_img_default_size;
			            $columns = 3;
			            break;
			        case 'large':
						$thumb_size            = ($menu_container == "wide") ? 'goodresto_960X600' : 'goodresto_588X588';
						$post_img_default_size = ($menu_container == "wide") ? '960px' : '588px';
						$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) '.$post_img_default_size.', (max-width: 767px) '.$post_img_default_size.', (max-width: 1023px) '.$post_img_default_size.', (max-width: 1279px) '.$post_img_default_size.', '.$post_img_default_size;
			            $columns = 2;
			            break;
			    }
			} elseif ($menu_post_layout == "list") {
				$thumb_size            = 'goodresto_144X144';
				$post_img_default_size = '144px';
				$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) '.$post_img_default_size.', (max-width: 767px) '.$post_img_default_size.', (max-width: 1023px) '.$post_img_default_size.', (max-width: 1279px) '.$post_img_default_size.', '.$post_img_default_size;
			}

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
			$count_posts = wp_count_posts('menu');
			$taxonomy  = 'menu-category'; 
			$tax_terms = get_terms($taxonomy);

			$output .='<div class="'.esc_attr($class).'" data-default-filter="'.$default_filter.'">';
				if ($menu_filter == "true" && $menu_post_layout != 'carousel'){

					if (count($tax_terms) != 0){

						$output .='<div class="menu-filter recent-menu-filter et-menu-filter enovathemes-filter button-group filter-button-group">';


				            if (isset($category) && !empty($category)) {

				            	$term = get_term_by('slug',$category,'menu-category');

				            	if (is_object($term)) {
				            		$filter_children = get_term_children( $term->term_id, 'menu-category' );

				            		if(is_array($filter_children) && !empty($filter_children)) {
			            				foreach ($filter_children as $filter_child) {
			            					$filter_child_obj = get_term($filter_child, 'menu-category');
			            						
			            					$active_class = "";

					            			if ($default_filter != 'all') {
					            				if ($filter_child_obj->slug == $default_filter) {
					            					$active_class = "active";
					            				}
					            			}

			            					$output .='<span class="filter '.$active_class.'" data-filter="'.$filter_child_obj->slug.'" data-count="'.$filter_child_obj->count.'">'.$filter_child_obj->name.'</span>';
			            				}
			            			}

				            	}

				            	
				            } else {

				            	if ($default_filter == "all"){
					           		$output .='<span class="first-filter active filter" data-filter="all" data-count="'.$count_posts->publish.'">'.esc_html__('Show All', 'enovathemes-addons').'</span>';
					            }

				            	foreach(get_terms('menu-category',$args) as $filter_term){
			            			$filter_count    = $filter_term->count;
			            			$filter_children = get_term_children( $filter_term->term_id, 'menu-category' );
			            			if(is_array($filter_children) && !empty($filter_children)) {
			            				foreach ($filter_children as $filter_child) {
			            					$filter_child_obj = get_term($filter_child, 'menu-category');
			            					$filter_count = $filter_count + $filter_child_obj->count;
			            				}
			            			}

			            			$active_class = "";

			            			if ($default_filter != 'all') {
			            				if ($filter_term->slug == $default_filter) {
			            					$active_class = "active";
			            				}
			            			}

					                $output .='<span class="filter '.$active_class.'" data-filter="'.$filter_term->slug.'" data-count="'.$filter_count.'">'.$filter_term->name.'</span>';
					            }
				            }

			            	
					    $output .='</div>';

					}
				}
				$output .='<div id="loop-menus-'.$id_counter.'" data-columns="'.$columns.'" class="loop-posts loop-menu '.(($menu_post_layout == "carousel") ? "owl-carousel" : "gridify").' recent-menus effect-'.esc_attr($menu_animation_effect).' filter-'.$menu_filter.' et-item-set et-clearfix">';
					
					if ($menu_post_layout != 'carousel') {
						$output .='<div class="grid-sizer"></div>';
					}
					
					while($recent_menus->have_posts()) : $recent_menus->the_post();
						
						$values     = get_post_custom( get_the_ID() );
					    $menu_ingredients = isset( $values['menu_ingredients'][0] ) ? esc_html( $values["menu_ingredients"][0] ) : "";
					    $menu_price       = isset( $values['menu_price'][0] ) ? esc_attr( $values["menu_price"][0] ) : "";
					    $menu_label       = isset( $values['menu_label'][0] ) ? esc_attr( $values["menu_label"][0] ) : "";
					    $menu_highlight   = isset( $values['menu_highlight'][0] ) ? esc_attr( $values["menu_highlight"][0] ) : "false";
					    $menu_spicy       = isset( $values['menu_spicy'][0] ) ? esc_attr( $values["menu_spicy"][0] ) : "false";
					    $menu_vegetarian  = isset( $values['menu_vegetarian'][0] ) ? esc_attr( $values["menu_vegetarian"][0] ) : "false";
					    $menu_gluten      = isset( $values['menu_gluten'][0] ) ? esc_attr( $values["menu_gluten"][0] ) : "false";
					    $post_width       = isset( $values['menu_width'] ) ? esc_attr( $values['menu_width'][0] ) : "";

					    if (empty($post_width) || !isset($post_width)) {
							switch ($menu_post_size) {
								case 'small':
									$post_width = '25';
									break;
								case 'medium':
									$post_width = '30';
									break;
								case 'large':
									$post_width = '50';
									break;
							}
						}

						$classes= array();

						if ($default_filter == "all") {
							$classes= array('all');
						}

						if (get_the_terms( $post->ID, 'menu-category', '', ' ', '' )) {
							foreach(get_the_terms( $post->ID, 'menu-category', '', '', '' ) as $term) {
								array_push($classes, $term->slug);
							}
						}

						$output .='<article class="'.join( ' ', get_post_class('et-item post menu '.implode(' ',$classes))).'" data-width="'.esc_attr($post_width).'" id="menu-'.get_the_ID().'">';
							if (has_post_thumbnail()){

								if ( '' != get_the_title() ){
									$post_img_attr['alt'] = esc_html(get_the_title());
								}

								$post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "full" );
								$post_img_144  = get_the_post_thumbnail_url(get_the_ID(),'goodresto_144X144');
								$post_img_588  = get_the_post_thumbnail_url(get_the_ID(),'goodresto_588X588');
								$post_img_960  = get_the_post_thumbnail_url(get_the_ID(),'goodresto_960X600');

								$post_img_srcset = "";

								if (strpos($post_img_144, '144x')) {
									$post_img_srcset .= $post_img_144.' 144w';
								}

								if (strpos($post_img_588, '588x')) {

									$post_img_srcset .= ', '.$post_img_588.' 588w';
								}

								if (strpos($post_img_960, '960x')) {
									$post_img_srcset .= ', '.$post_img_960.' 960w';
								}

								if ($menu_post_layout == "masonry2") {
									$thumb_size = 'full';
								}

								if (empty($post_img_srcset) || $menu_post_layout == "masonry2") {
									$post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
									$post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
								}

								$post_img_attr['srcset'] = $post_img_srcset;
								$post_img_attr['sizes']  = $post_img_sizes;
								
							}

							$output .='<div class="post-inner et-item-inner et-clearfix highlight-'.$menu_highlight.'">';
								

								if ($menu_post_layout == "masonry2" && has_post_thumbnail()){
									$output .='<div class="post-image-wrapper">';
										$output .='<div class="post-image overlay-hover post-media">';
											$output .='<div class="image-container">';
												$output .='<div class="image-preloader"></div>';
												$output .=get_the_post_thumbnail( get_the_ID(), $thumb_size ,$post_img_attr);
												if (!empty($menu_label)){
													$output .='<div class="menu-label">'.$menu_label.'</div>';
												}
												$output .='<div class="menu-additional-info et-clearfix">';
													if ($menu_spicy == "true"){
														$output .='<span class="menu-additional icon-goodresto-pepper" title="'.esc_html__("Spicy", "enovathemes-addons").'"></span>';
													}
													if ($menu_vegetarian == "true"){
														$output .='<span class="menu-additional icon-goodresto-broccoli" title="'.esc_html__("Vegetarian", "enovathemes-addons").'"></span>';
													}
													if ($menu_gluten == "true"){
														$output .='<span class="menu-additional icon-goodresto-wheat" title="'.esc_html__("Includes gluten", "enovathemes-addons").'"></span>';
													}
												$output .='</div>';
											$output .='</div>';
											$output .='<div class="post-image-body">';
												$output .='<div class="post-image-body-inner-wrap">';
													$output .='<div class="post-image-body-inner">';
														if ( '' != get_the_title() ){
															$output .='<h4 class="post-title">'.get_the_title();
																if (!empty($menu_price)){$output .=' / '.esc_attr($menu_price);}
															$output .='</h4>';
														}
														if (!empty($menu_ingredients)){
															$output .='<div class="menu-ingredients">'.esc_attr($menu_ingredients).'</div>';
														}
													$output .='</div>';
												$output .='</div>';
											$output .='</div>';
										$output .='</div>';
									$output .='</div>';
								}else{
									if ($menu_post_layout == "grid" || $menu_post_layout == "list" || $menu_post_layout == "carousel"){
										if (has_post_thumbnail()){
											$output .='<div class="post-image overlay-hover post-media">';
												$output .='<div class="image-preloader"></div>';
												$output .=get_the_post_thumbnail( get_the_ID(), $thumb_size ,$post_img_attr);
												if (!empty($menu_label)){
													$output .='<div class="menu-label">'.$menu_label.'</div>';
												}
												if ($menu_post_layout == "grid"){
													$output .='<div class="menu-additional-info et-clearfix">';
														if ($menu_spicy == "true"){
															$output .='<span class="menu-additional icon-goodresto-pepper" title="'.esc_html__("Spicy", "enovathemes-addons").'"></span>';
														}
														if ($menu_vegetarian == "true"){
															$output .='<span class="menu-additional icon-goodresto-broccoli" title="'.esc_html__("Vegetarian", "enovathemes-addons").'"></span>';
														}
														if ($menu_gluten == "true"){
															$output .='<span class="menu-additional icon-goodresto-wheat" title="'.esc_html__("Includes gluten", "enovathemes-addons").'"></span>';
														}
													$output .='</div>';
												}
											$output .='</div>';
					        			}
									}
									
								}
								if ($menu_post_layout != "masonry2"){
				    				$output .='<div class="post-body et-clearfix">';
										$output .='<div class="post-body-inner-wrap">';
											$output .='<div class="post-body-inner">';
												if ( '' != get_the_title() ){
													$output .='<h4 class="post-title et-clearfix">';
														$output .='<span class="menu-title-inline">'.get_the_title().'</span>';
														if ($menu_post_layout == "list" || $menu_post_layout == "list2"){
															if (!empty($menu_price)){
																$output .='<span class="menu-price-inline">'.esc_attr($menu_price).'</span>';
															}
														}
													$output .='</h4>';
												}
												if (!empty($menu_ingredients)){
													$output .='<div class="menu-ingredients">';
														$output .=esc_attr($menu_ingredients);
														if ($menu_post_layout == "list" || $menu_post_layout == "list2"){
															$output .='<div class="menu-additional-info inline et-clearfix">';
																if ($menu_spicy == "true"){
																	$output .='<span class="menu-additional icon-goodresto-pepper" title="'.esc_html__("Spicy", "enovathemes-addons").'"></span>';
																}
																if ($menu_vegetarian == "true"){
																	$output .='<span class="menu-additional icon-goodresto-broccoli" title="'.esc_html__("Vegetarian", "enovathemes-addons").'"></span>';
																}
																if ($menu_gluten == "true"){
																	$output .='<span class="menu-additional icon-goodresto-wheat" title="'.esc_html__("Includes gluten", "enovathemes-addons").'"></span>';
																}
															$output .='</div>';
														}
													$output .='</div>';
												}
												if ($menu_post_layout == "grid"){
													if (!empty($menu_price)){
														$output .='<div class="menu-price">'.esc_attr($menu_price).'</div>';
													}
												}
												if ($menu_post_layout == "list2"){
													if (!empty($menu_label)){
														$output .='<div class="menu-label">'.$menu_label.'</div>';
													}
												}
											$output .='</div>';
										$output .='</div>';
									$output .='</div>';
								}


							$output .='</div>';

						$output .='</article>';

					endwhile;
				$output .='</div>';
			$output .='</div>';

			$id_counter++;

			return $output;

			wp_reset_postdata();

		} else {
			goodresto_enovathemes_not_found('menu');
		}

	}
	add_shortcode('et_restaurant_menu', 'et_restaurant_menu');


/*  woocommerce cart
/*------------*/

	function et_cart( $atts, $content = null ) {

		extract(shortcode_atts(array(
		), $atts));

		if (class_exists('Woocommerce')){

			global $woocommerce;

			$output = "";

			$output .= '<div class="et-cart-content">';
				$output .= '<a class="cart-contents" href="'.esc_url(wc_get_cart_url()).'" title="'.esc_html__('View your shopping cart', 'enovathemes-addons').'">';
		            $output .= '<span class="cart-title">'.esc_html__('Cart','enovathemes-addons').'</span>';
		            $output .= '<span class="cart-total">'.$woocommerce->cart->get_cart_total().'</span>';
		            $output .= '<span class="cart-info">'.$woocommerce->cart->cart_contents_count.'</span>';
		        $output .= '</a>';
	        $output .= '</div>';

			return $output;

		} else {
			return '<div class="alert error"><div class="alert-message">'.esc_html__("Woocommerce plugin is not installed/active, please install/activate Woocommerce plugin", "enovathemes-addons").'</div></div>';
		}

	}
	add_shortcode('et_cart', 'et_cart');

/*  woocommerce recent products
/*------------*/

	function et_recent_products($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'product_animation_effect' => 'none',
				'post_type'				   => 'grid',
				'per_page' 				   => '6',
				'post_size'				   => 'small',
				'orderby'  				   => 'date',
				'order'    				   => 'desc',
				'category' 				   => '',
				'operator' 				   => 'IN',
				'product_filter'           => 'false'
			), $atts)
		);

		$output  = '';

		if (class_exists('Woocommerce')){

			global $post, $goodresto_enovathemes;

			static $id_counter = 1;

			if(!is_numeric($per_page) || !isset($per_page) || empty($per_page) || $per_page < 0) {
				$per_page = 6;
			}

			if (isset($category) && !empty($category)) {

				$query_options = array( 
					'orderby'             => $orderby,
					'order'               => $order,
					'post_type'           => 'product',
					'posts_per_page' 	  => absint($per_page),
					'meta_query'          => WC()->query->get_meta_query(), 
					'tax_query'           => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'slug',
							'terms'    => explode(',',$category),
							'operator' => $operator
						)
					),
					'post_status' 	 	  => 'publish',
					'ignore_sticky_posts' => true
				);

				$product_filter = "false";

			} else {

				$query_options = array(
					'post_type'           => 'product',
					'post_status'         => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => $per_page,
					'orderby'             => $orderby,
					'order'               => $order,
					'meta_query'          => WC()->query->get_meta_query(),
					'tax_query'           => WC()->query->get_tax_query(),
				);

			}

			if ($product_filter == "true") {
				$product_animation_effect = "none";
			}

			$recent_products = new WP_Query($query_options);

			if($recent_products->have_posts()){

				$columns = 1;

                $product_image_effect     = (isset($GLOBALS['goodresto_enovathemes']['product-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['product-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['product-image-effect'] : "overlay-none";
                

                $thumb_size             = 'goodresto_384X384';
                $post_img_attr          = array();
                $post_img_sizes         = '100vw';
                $post_img_default_size  = $post_img_sizes;

                if ($post_type == "grid") {
                    $thumb_size            = 'goodresto_588X588';
                    $post_img_default_size = '588px';
                    $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 384px, (max-width: 1023px) 384px, (max-width: 1279px) 588px, '.$post_img_default_size;
                }

				$class = 'recent-products-layout shortcode-product-layout';

				if ($post_type == "grid" || $post_type == "masonry1") {
					$class .= ' gridify';
					$class .= ' post-size-'.$post_size;
				}
				
				$class .= ' '.$post_type;
				$class .= ' filter-'.$product_filter;

				if ($product_animation_effect == "none") {
					$class .= ' lazy lazy-load';
				}

		    	switch ($post_size) {
		            case 'small' :
		                $columns = 4;
		                break;
		            case 'medium':
		                $columns = 3;
		                break;
		            case 'large':
		                $columns = 2;
		                break;
		        }

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

				$count_posts = wp_count_posts('product');
				$taxonomy  = 'product_cat'; 
				$tax_terms = get_terms($taxonomy);

		        $output .='<div class="'.esc_attr($class).'">';

		        	if ($product_filter == "true" && $post_type != 'carousel'){

						if (count($tax_terms) != 0){

							$output .='<div class="product-filter recent-product-filter et-product-filter enovathemes-filter button-group filter-button-group">';
					            $output .='<span class="first-filter active filter" data-filter="all" data-count="'.$count_posts->publish.'">'.esc_html__('Show All', 'enovathemes-addons').'</span>';
				            	foreach(get_terms('product_cat',$args) as $filter_term){
			            			$filter_count    = $filter_term->count;
			            			$filter_children = get_term_children( $filter_term->term_id, 'product-category' );
			            			if(is_array($filter_children) && !empty($filter_children)) {
			            				foreach ($filter_children as $filter_child) {
			            					$filter_child_obj = get_term($filter_child, 'product-category');
			            					$filter_count = $filter_count + $filter_child_obj->count;
			            				}
			            			}
					                $output .='<span class="filter" data-filter="'.$filter_term->slug.'" data-count="'.$filter_count.'">'.$filter_term->name.'</span>';
					            }
						    $output .='</div>';

						}
					}

					$output .='<ul id="loop-products-'.$id_counter.'" data-columns="'.$columns.'" class="loop-posts loop-product '.(($post_type == 'grid' || $post_type == 'masonry1') ? 'gridify' : 'owl-carousel' ).' recent-products woocoomerce-product-shortcode effect-'.esc_attr($product_animation_effect).' '.$product_image_effect.' filter-'.$product_filter.' et-item-set et-clearfix">';
						
						if ($post_type == 'masonry1' || $post_type == 'grid') {
							$output .='<li class="grid-sizer"></li>';
						}

						while($recent_products->have_posts()) : $recent_products->the_post();

							$classes= array('all');
							if (get_the_terms( $post->ID, 'product_cat', '', ' ', '' )) {
								foreach(get_the_terms( $post->ID, 'product_cat', '', '', '' ) as $term) {
									array_push($classes, $term->slug);
								}
							}

							$output .='<li class="'.join( ' ', get_post_class('et-item post product '.implode(' ',$classes))).'" id="post-'.get_the_ID().'" >';

								global $product;

								if (has_post_thumbnail()){

                                    if ( '' != get_the_title() ){
                                        $post_img_attr['alt'] = esc_html(get_the_title());
                                    }

                                    $post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
                                    $post_img_588      = get_the_post_thumbnail_url($post->ID,$thumb_size);

                                    $post_img_srcset = "";

                                    if (strpos($post_img_588, '588x')) {
                                        $post_img_srcset .= $post_img_588.' 588w';
                                    } else {
                                        $post_img_srcset .= $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                    }

                                    if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                        $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                        $thumb_size      = 'full';
                                    }

                                    $post_img_attr['srcset'] = $post_img_srcset;
                                    $post_img_attr['sizes']  = $post_img_sizes;
                                }

								$output .='<div class="post-inner et-item-inner et-clearfix">';
										
									if (defined('YITH_WCWL')){
										$output .= do_shortcode('[yith_wcwl_add_to_wishlist]');
									}
									$stock_status = $product->get_stock_status();
									if ($stock_status == "outofstock"){
										$output .='<div class="product-status outofstock"><span>'.esc_html__( 'Out of stock', 'enovathemes-addons' ).'</span></div>';
									} else {
										if ( $product->is_on_sale() ){
											$output .='<div class="product-status onsale"><span>'.esc_html__( 'Sale!', 'enovathemes-addons' ).'</span></div>';
										}
									}
									$output .='<div class="post-image post-media overlay-hover">';

										if (class_exists('YITH_WCQV_Frontend')){

					                        if (get_option('yith-wcqv-enable') == 'yes'){
					                            $output .='<a href="#" class="button yith-wcqv-button product-single-button product-quick-view size-medium" data-product_id="' . $product->get_id() . '" title="'.esc_html__("Product quick view", 'enovathemes-addons').'">' . esc_html__("Quick view", 'enovathemes-addons') . '</a>';
					                        }
					                    }

										if ($product_image_effect != "overlay-none"){

									        $output .= goodresto_enovathemes_product_image_overlay($product->get_id());

									        $output .='<div class="image-container visible">';
												$output .='<div class="image-preloader"></div>';
											    if (has_post_thumbnail()){
											   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
											    } else {
											   		$output .= wc_placeholder_img($thumb_size);
											    }
											$output .='</div>';

										} else {

											$output .='<a href="'.get_the_permalink().'" >';
												$output .='<div class="product-image-gallery">';
													$output .='<div class="image-container visible">';
														$output .='<div class="image-preloader"></div>';
														if (has_post_thumbnail()){
													   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
													    } else {
													   		$output .= wc_placeholder_img($thumb_size);
													    }
													$output .='</div>';
													$product_gallery_ids = $product->get_gallery_image_ids();
													if (is_array($product_gallery_ids) && !empty($product_gallery_ids)){
														foreach ($product_gallery_ids as $image_id){

															$post_img_original = wp_get_attachment_image_src( $image_id, "full" );
                                                            $post_img_282  = wp_get_attachment_image_src($image_id,'goodresto_282X282');
                                                            $post_img_384  = wp_get_attachment_image_src($image_id,'goodresto_384X384');
                                                            $post_img_588  = wp_get_attachment_image_src($image_id,'goodresto_588X588');
                                                            $post_img_640  = wp_get_attachment_image_src($image_id,'goodresto_640X400');
                                                            $post_img_960  = wp_get_attachment_image_src($image_id,'goodresto_960X600');

                                                            $post_img_srcset = "";

                                                            if (strpos($post_img_282[0], '282x')) {
                                                                $post_img_srcset .= $post_img_282[0].' 282w';
                                                            }

                                                            if (strpos($post_img_384[0], '384x')) {
                                                                $post_img_srcset .= ', '.$post_img_384[0].' 384w';
                                                            }

                                                            if (strpos($post_img_588[0], '588x')) {
                                                                $post_img_srcset .= ', '.$post_img_588[0].' 588w';
                                                            }

                                                            if (strpos($post_img_640[0], '640x')) {

                                                                $post_img_srcset .= ', '.$post_img_640[0].' 640w';
                                                            }

                                                            if (strpos($post_img_960[0], '960x')) {
                                                                $post_img_srcset .= ', '.$post_img_960[0].' 960w';
                                                            }

                                                            if ($post_type == "masonry1" || $post_type == "masonry2") {
                                                                $thumb_size = 'full';
                                                            }

                                                            if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                                                $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                                            }

                                                            $post_img_attr['srcset'] = $post_img_srcset;
                                                            $post_img_attr['sizes']  = $post_img_sizes;

												            $output .= wp_get_attachment_image($image_id, $thumb_size,false,$post_img_attr);
														}
													}
												$output .='</div>';
											$output .='</a>';

										}

									$output .='</div>';
									$output .='<div class="post-body et-clearfix">';
										$output .='<div class="post-body-inner-wrap">';
											$output .='<div class="post-body-inner">';
					        					$output .='<h4 class="post-title">';
					        						$output .='<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title().'">'.get_the_title().'</a>';
												$output .='</h4>';
												if ( get_option( 'woocommerce_enable_review_rating' ) != 'no' ) {
													$output .= wc_get_rating_html( $product->get_average_rating() );
												}
												if ( $price_html = $product->get_price_html() ){
													$output .= '<span class="price">'.$price_html.'</span>';
												}

												$post_type  = ($product->is_type( 'variable' )) ? "variable" : "simple";
                                                $product_class = 'button add_to_cart_button product-loop-button';
                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes" && $post_type == "simple" && $product->get_stock_status() != "outofstock"){
                                                    $product_class .=' ajax_add_to_cart';
                                                }

                                                $output .= apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                    sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" data-post_type="%s" data-product_status="%s" class="%s" title="%s" >%s</a>',
                                                        esc_url( $product->add_to_cart_url() ),
                                                        esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                                        esc_attr( $product->get_id() ),
                                                        esc_attr( $product->get_sku() ),
                                                        esc_attr( $post_type ),
                                                        esc_attr( $product->get_stock_status() ),
                                                        esc_attr( $product_class ),
                                                        esc_html( $product->add_to_cart_text() ),
                                                        esc_html( $product->add_to_cart_text() )
                                                    ),
                                                $product );

                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes"){
                                                    $output .= '<div class="ajax-add-to-cart-loading"><div class="circle-loader"><div class="checkmark draw"></div></div></div>';
                                                }

											$output .='</div>';
										$output .='</div>';
									$output .='</div>';

								$output .='</div>';

							$output .='</li>';

						endwhile;
					$output .='</ul>';
				$output .='</div>';

				$id_counter++;

				return $output;

				wp_reset_postdata();

			} else {
				goodresto_enovathemes_not_found('product');
			}

		} else {
			return '<div class="alert error"><div class="alert-message">'.esc_html__("Woocommerce plugin is not installed/active, please install/activate Woocommerce plugin", "enovathemes-addons").'</div></div>';
		}

	}
	add_shortcode('et_recent_products', 'et_recent_products');

/*  woocommerce featured products
/*------------*/

	function et_featured_products($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'product_animation_effect' => 'none',
				'post_type'				   => 'grid',
				'per_page' 				   => '6',
				'post_size'				   => 'small',
				'orderby'  				   => 'date',
				'order'    				   => 'desc',
				'category' 				   => '',
				'operator' 				   => 'IN',
			), $atts)
		);

		if (class_exists('Woocommerce')){

			global $post, $goodresto_enovathemes;

			static $id_counter = 1;

			if(!is_numeric($per_page) || !isset($per_page) || empty($per_page) || $per_page < 0) {
				$per_page = 6;
			}

			if (isset($category) && !empty($category)) {

				$query_options = array( 
					'orderby'             => $orderby,
					'order'               => $order,
					'post_type'           => 'product',
					'posts_per_page' 	  => absint($per_page),
					'meta_query'          => WC()->query->get_meta_query(),
					'tax_query'           => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'slug',
							'terms'    => explode(',',$category),
							'operator' => $operator
						),
						array(
							'taxonomy' => 'product_visibility',
							'field'    => 'name',
							'terms'    => 'featured',
							'operator' => 'IN',
						)
					),
					'post_status' 	 	  => 'publish',
					'ignore_sticky_posts' => true
				);

			} else {

				$query_options = array(
					'post_type'           => 'product',
					'post_status'         => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => $per_page,
					'orderby'             => $orderby,
					'order'               => $order,
					'meta_query'          => WC()->query->get_meta_query(),
					'tax_query'           => array(
						array(
							'taxonomy' => 'product_visibility',
							'field'    => 'name',
							'terms'    => 'featured',
							'operator' => 'IN',
						)
					),
				);

			}

			$output  = '';

			$featured_products = new WP_Query($query_options);

			if($featured_products->have_posts()){

				$columns = 1;

				$product_image_effect     = (isset($GLOBALS['goodresto_enovathemes']['product-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['product-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['product-image-effect'] : "overlay-none";
                
				
				$class = 'featured-products-layout shortcode-product-layout';

				if ($post_type == "grid" || $post_type == "masonry1") {
					$class .= ' gridify';
					$class .= ' post-size-'.$post_size;
				}

				$class .= ' '.$post_type;
				$class .= ' filter-false';


				if ($product_animation_effect == "none") {
					$class .= ' lazy lazy-load';
				}

			    $thumb_size             = 'goodresto_384X384';
                $post_img_attr          = array();
                $post_img_sizes         = '100vw';
                $post_img_default_size  = $post_img_sizes;

                if ($post_type == "grid") {
                    $thumb_size            = 'goodresto_588X588';
                    $post_img_default_size = '588px';
                    $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 384px, (max-width: 1023px) 384px, (max-width: 1279px) 588px, '.$post_img_default_size;
                }


		    	switch ($post_size) {
		            case 'small' :
		                $columns = 4;
		                break;
		            case 'medium':
		                $columns = 3;
		                break;
		            case 'large':
		                $columns = 2;
		                break;
		        }

		        $output .='<div class="'.esc_attr($class).'">';
					$output .='<ul id="loop-products-'.$id_counter.'" data-columns="'.$columns.'" class="loop-posts loop-product '.(($post_type == 'grid' || $post_type == 'masonry1') ? 'gridify' : 'owl-carousel' ).' featured-products woocoomerce-product-shortcode effect-'.esc_attr($product_animation_effect).' '.$product_image_effect.' filter-false et-item-set et-clearfix">';
						
						while($featured_products->have_posts()) : $featured_products->the_post();

							$output .='<li class="'.join( " ", get_post_class('et-item post product')).'" id="post-'.get_the_ID().'" >';

								global $product;

								if (has_post_thumbnail()){

                                    if ( '' != get_the_title() ){
                                        $post_img_attr['alt'] = esc_html(get_the_title());
                                    }

                                    $post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
                                    $post_img_588      = get_the_post_thumbnail_url($post->ID,$thumb_size);

                                    $post_img_srcset = "";

                                    if (strpos($post_img_588, '588x')) {
                                        $post_img_srcset .= $post_img_588.' 588w';
                                    } else {
                                        $post_img_srcset .= $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                    }

                                    if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                        $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                        $thumb_size      = 'full';
                                    }

                                    $post_img_attr['srcset'] = $post_img_srcset;
                                    $post_img_attr['sizes']  = $post_img_sizes;
                                }

								$output .='<div class="post-inner et-item-inner et-clearfix">';
										
									if (defined('YITH_WCWL')){
										$output .= do_shortcode('[yith_wcwl_add_to_wishlist]');
									}
									$stock_status = $product->get_stock_status();
									if ($stock_status == "outofstock"){
										$output .='<div class="product-status outofstock"><span>'.esc_html__( 'Out of stock', 'enovathemes-addons' ).'</span></div>';
									} else {
										if ( $product->is_on_sale() ){
											$output .='<div class="product-status onsale"><span>'.esc_html__( 'Sale!', 'enovathemes-addons' ).'</span></div>';
										}
									}
									$output .='<div class="post-image post-media overlay-hover">';

										if (class_exists('YITH_WCQV_Frontend')){

					                        if (get_option('yith-wcqv-enable') == 'yes'){
					                            $output .='<a href="#" class="button yith-wcqv-button product-single-button product-quick-view size-medium" data-product_id="' . $product->get_id() . '" title="'.esc_html__("Product quick view", 'enovathemes-addons').'">' . esc_html__("Quick view", 'enovathemes-addons') . '</a>';
					                        }
					                    }

										if ($product_image_effect != "overlay-none"){

									        $output .= goodresto_enovathemes_product_image_overlay($product->get_id());

									        $output .='<div class="image-container visible">';
												$output .='<div class="image-preloader"></div>';
											    if (has_post_thumbnail()){
											   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
											    } else {
											   		$output .= wc_placeholder_img($thumb_size);
											    }
											$output .='</div>';

										} else {

											$output .='<a href="'.get_the_permalink().'" >';
												$output .='<div class="product-image-gallery">';
													$output .='<div class="image-container visible">';
														$output .='<div class="image-preloader"></div>';
														if (has_post_thumbnail()){
													   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
													    } else {
													   		$output .= wc_placeholder_img($thumb_size);
													    }
													$output .='</div>';
													$product_gallery_ids = $product->get_gallery_image_ids();
													if (is_array($product_gallery_ids) && !empty($product_gallery_ids)){
														foreach ($product_gallery_ids as $image_id){

															$post_img_original = wp_get_attachment_image_src( $image_id, "full" );
                                                            $post_img_282  = wp_get_attachment_image_src($image_id,'goodresto_282X282');
                                                            $post_img_384  = wp_get_attachment_image_src($image_id,'goodresto_384X384');
                                                            $post_img_588  = wp_get_attachment_image_src($image_id,'goodresto_588X588');
                                                            $post_img_640  = wp_get_attachment_image_src($image_id,'goodresto_640X400');
                                                            $post_img_960  = wp_get_attachment_image_src($image_id,'goodresto_960X600');

                                                            $post_img_srcset = "";

                                                            if (strpos($post_img_282[0], '282x')) {
                                                                $post_img_srcset .= $post_img_282[0].' 282w';
                                                            }

                                                            if (strpos($post_img_384[0], '384x')) {
                                                                $post_img_srcset .= ', '.$post_img_384[0].' 384w';
                                                            }

                                                            if (strpos($post_img_588[0], '588x')) {
                                                                $post_img_srcset .= ', '.$post_img_588[0].' 588w';
                                                            }

                                                            if (strpos($post_img_640[0], '640x')) {

                                                                $post_img_srcset .= ', '.$post_img_640[0].' 640w';
                                                            }

                                                            if (strpos($post_img_960[0], '960x')) {
                                                                $post_img_srcset .= ', '.$post_img_960[0].' 960w';
                                                            }

                                                            if ($post_type == "masonry1" || $post_type == "masonry2") {
                                                                $thumb_size = 'full';
                                                            }

                                                            if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                                                $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                                            }

                                                            $post_img_attr['srcset'] = $post_img_srcset;
                                                            $post_img_attr['sizes']  = $post_img_sizes;

												            $output .= wp_get_attachment_image($image_id, $thumb_size,false,$post_img_attr);
														}
													}
												$output .='</div>';
											$output .='</a>';

										}

									$output .='</div>';
									$output .='<div class="post-body et-clearfix">';
										$output .='<div class="post-body-inner-wrap">';
											$output .='<div class="post-body-inner">';
					        					$output .='<h4 class="post-title">';
					        						$output .='<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title().'">'.get_the_title().'</a>';
												$output .='</h4>';
												if ( get_option( 'woocommerce_enable_review_rating' ) != 'no' ) {
													$output .= wc_get_rating_html( $product->get_average_rating() );
												}
												if ( $price_html = $product->get_price_html() ){
													$output .= '<span class="price">'.$price_html.'</span>';
												}

												$post_type  = ($product->is_type( 'variable' )) ? "variable" : "simple";
                                                $product_class = 'button add_to_cart_button product-loop-button';
                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes" && $post_type == "simple" && $product->get_stock_status() != "outofstock"){
                                                    $product_class .=' ajax_add_to_cart';
                                                }

                                                $output .= apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                    sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" data-post_type="%s" data-product_status="%s" class="%s" title="%s" >%s</a>',
                                                        esc_url( $product->add_to_cart_url() ),
                                                        esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                                        esc_attr( $product->get_id() ),
                                                        esc_attr( $product->get_sku() ),
                                                        esc_attr( $post_type ),
                                                        esc_attr( $product->get_stock_status() ),
                                                        esc_attr( $product_class ),
                                                        esc_html( $product->add_to_cart_text() ),
                                                        esc_html( $product->add_to_cart_text() )
                                                    ),
                                                $product );

                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes"){
                                                    $output .= '<div class="ajax-add-to-cart-loading"><div class="circle-loader"><div class="checkmark draw"></div></div></div>';
                                                }

											$output .='</div>';
										$output .='</div>';
									$output .='</div>';

								$output .='</div>';

							$output .='</li>';

						endwhile;
					$output .='</ul>';
				$output .='</div>';

				$id_counter++;

				return $output;

				wp_reset_postdata();

			} else {
				goodresto_enovathemes_not_found('product');
			}

		} else {
			return '<div class="alert error"><div class="alert-message">'.esc_html__("Woocommerce plugin is not installed/active, please install/activate Woocommerce plugin", "enovathemes-addons").'</div></div>';
		}

	}
	add_shortcode('et_featured_products', 'et_featured_products');

/*  woocommerce sale products
/*------------*/

	function et_sale_products($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'product_animation_effect' => 'none',
				'post_type'				   => 'grid',
				'per_page' 				   => '6',
				'post_size'				   => 'small',
				'orderby'  				   => 'date',
				'order'    				   => 'desc',
				'category' 				   => '',
				'operator' 				   => 'IN',
			), $atts)
		);

		$output = '';

		if (class_exists('Woocommerce')){

			global $post, $goodresto_enovathemes;

			static $id_counter = 1;

			if(!is_numeric($per_page) || !isset($per_page) || empty($per_page) || $per_page < 0) {
				$per_page = 6;
			}

			if (isset($category) && !empty($category)) {

				$query_options = array( 
					'orderby'             => $orderby,
					'order'               => $order,
					'post_type'           => 'product',
					'posts_per_page' 	  => absint($per_page), 
					'post__in'            => array_merge( array( 0 ), wc_get_product_ids_on_sale() ),
					'tax_query'           => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'slug',
							'terms'    => explode(',',$category),
							'operator' => $operator
						)
					),
					'post_status' 	 	  => 'publish',
					'ignore_sticky_posts' => true,
					'meta_query'          => WC()->query->get_meta_query()
				);

			} else {

				$query_options = array(
					'post_type'           => 'product',
					'post_status'         => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => $per_page,
					'orderby'             => $orderby,
					'order'               => $order,
					'post__in'            => array_merge( array( 0 ), wc_get_product_ids_on_sale() ),
					'meta_query'          => WC()->query->get_meta_query(),
					'tax_query'           => WC()->query->get_tax_query()
				);

			}

			$sale_products = new WP_Query($query_options);

			if($sale_products->have_posts()){

				$columns = 1;

				$product_image_effect     = (isset($GLOBALS['goodresto_enovathemes']['product-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['product-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['product-image-effect'] : "overlay-none";
                
				
				$class = 'sale-products-layout shortcode-product-layout';

				if ($post_type == "grid" || $post_type == "masonry1") {
					$class .= ' gridify';
					$class .= ' post-size-'.$post_size;
				}

				$class .= ' '.$post_type;
				$class .= ' filter-false';


				if ($product_animation_effect == "none") {
					$class .= ' lazy lazy-load';
				}

			    $thumb_size             = 'goodresto_384X384';
                $post_img_attr          = array();
                $post_img_sizes         = '100vw';
                $post_img_default_size  = $post_img_sizes;

                if ($post_type == "grid") {
                    $thumb_size            = 'goodresto_588X588';
                    $post_img_default_size = '588px';
                    $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 384px, (max-width: 1023px) 384px, (max-width: 1279px) 588px, '.$post_img_default_size;
                }

		    	switch ($post_size) {
		            case 'small' :
		                $columns = 4;
		                break;
		            case 'medium':
		                $columns = 3;
		                break;
		            case 'large':
		                $columns = 2;
		                break;
		        }

		        $output .='<div class="'.esc_attr($class).'">';
					$output .='<ul id="loop-products-'.$id_counter.'" data-columns="'.$columns.'" class="loop-posts loop-product '.(($post_type == 'grid' || $post_type == 'masonry1') ? 'gridify' : 'owl-carousel' ).' sale-products woocoomerce-product-shortcode effect-'.esc_attr($product_animation_effect).' '.$product_image_effect.' filter-false et-item-set et-clearfix">';
						
						while($sale_products->have_posts()) : $sale_products->the_post();

							$output .='<li class="'.join( " ", get_post_class('et-item post product')).'" id="post-'.get_the_ID().'" >';

								global $product;

								if (has_post_thumbnail()){

                                    if ( '' != get_the_title() ){
                                        $post_img_attr['alt'] = esc_html(get_the_title());
                                    }

                                    $post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
                                    $post_img_588      = get_the_post_thumbnail_url($post->ID,$thumb_size);

                                    $post_img_srcset = "";

                                    if (strpos($post_img_588, '588x')) {
                                        $post_img_srcset .= $post_img_588.' 588w';
                                    } else {
                                        $post_img_srcset .= $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                    }

                                    if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                        $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                        $thumb_size      = 'full';
                                    }

                                    $post_img_attr['srcset'] = $post_img_srcset;
                                    $post_img_attr['sizes']  = $post_img_sizes;
                                }

								$output .='<div class="post-inner et-item-inner et-clearfix">';
										
									if (defined('YITH_WCWL')){
										$output .= do_shortcode('[yith_wcwl_add_to_wishlist]');
									}
									$stock_status = $product->get_stock_status();
									if ($stock_status == "outofstock"){
										$output .='<div class="product-status outofstock"><span>'.esc_html__( 'Out of stock', 'enovathemes-addons' ).'</span></div>';
									} else {
										if ( $product->is_on_sale() ){
											$output .='<div class="product-status onsale"><span>'.esc_html__( 'Sale!', 'enovathemes-addons' ).'</span></div>';
										}
									}
									$output .='<div class="post-image post-media overlay-hover">';

										if (class_exists('YITH_WCQV_Frontend')){

					                        if (get_option('yith-wcqv-enable') == 'yes'){
					                            $output .='<a href="#" class="button yith-wcqv-button product-single-button product-quick-view size-medium" data-product_id="' . $product->get_id() . '" title="'.esc_html__("Product quick view", 'enovathemes-addons').'">' . esc_html__("Quick view", 'enovathemes-addons') . '</a>';
					                        }
					                    }

										if ($product_image_effect != "overlay-none"){

									        $output .= goodresto_enovathemes_product_image_overlay($product->get_id());

									        $output .='<div class="image-container visible">';
												$output .='<div class="image-preloader"></div>';
											    if (has_post_thumbnail()){
											   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
											    } else {
											   		$output .= wc_placeholder_img($thumb_size);
											    }
											$output .='</div>';

										} else {

											$output .='<a href="'.get_the_permalink().'" >';
												$output .='<div class="product-image-gallery">';
													$output .='<div class="image-container visible">';
														$output .='<div class="image-preloader"></div>';
														if (has_post_thumbnail()){
													   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
													    } else {
													   		$output .= wc_placeholder_img($thumb_size);
													    }
													$output .='</div>';
													$product_gallery_ids = $product->get_gallery_image_ids();
													if (is_array($product_gallery_ids) && !empty($product_gallery_ids)){
														foreach ($product_gallery_ids as $image_id){

															$post_img_original = wp_get_attachment_image_src( $image_id, "full" );
                                                            $post_img_282  = wp_get_attachment_image_src($image_id,'goodresto_282X282');
                                                            $post_img_384  = wp_get_attachment_image_src($image_id,'goodresto_384X384');
                                                            $post_img_588  = wp_get_attachment_image_src($image_id,'goodresto_588X588');
                                                            $post_img_640  = wp_get_attachment_image_src($image_id,'goodresto_640X400');
                                                            $post_img_960  = wp_get_attachment_image_src($image_id,'goodresto_960X600');

                                                            $post_img_srcset = "";

                                                            if (strpos($post_img_282[0], '282x')) {
                                                                $post_img_srcset .= $post_img_282[0].' 282w';
                                                            }

                                                            if (strpos($post_img_384[0], '384x')) {
                                                                $post_img_srcset .= ', '.$post_img_384[0].' 384w';
                                                            }

                                                            if (strpos($post_img_588[0], '588x')) {
                                                                $post_img_srcset .= ', '.$post_img_588[0].' 588w';
                                                            }

                                                            if (strpos($post_img_640[0], '640x')) {

                                                                $post_img_srcset .= ', '.$post_img_640[0].' 640w';
                                                            }

                                                            if (strpos($post_img_960[0], '960x')) {
                                                                $post_img_srcset .= ', '.$post_img_960[0].' 960w';
                                                            }

                                                            if ($post_type == "masonry1" || $post_type == "masonry2") {
                                                                $thumb_size = 'full';
                                                            }

                                                            if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                                                $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                                            }

                                                            $post_img_attr['srcset'] = $post_img_srcset;
                                                            $post_img_attr['sizes']  = $post_img_sizes;

												            $output .= wp_get_attachment_image($image_id, $thumb_size,false,$post_img_attr);
														}
													}
												$output .='</div>';
											$output .='</a>';

										}

									$output .='</div>';
									$output .='<div class="post-body et-clearfix">';
										$output .='<div class="post-body-inner-wrap">';
											$output .='<div class="post-body-inner">';
					        					$output .='<h4 class="post-title">';
					        						$output .='<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title().'">'.get_the_title().'</a>';
												$output .='</h4>';
												if ( get_option( 'woocommerce_enable_review_rating' ) != 'no' ) {
													$output .= wc_get_rating_html( $product->get_average_rating() );
												}
												if ( $price_html = $product->get_price_html() ){
													$output .= '<span class="price">'.$price_html.'</span>';
												}

												$post_type  = ($product->is_type( 'variable' )) ? "variable" : "simple";
                                                $product_class = 'button add_to_cart_button product-loop-button';
                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes" && $post_type == "simple" && $product->get_stock_status() != "outofstock"){
                                                    $product_class .=' ajax_add_to_cart';
                                                }

                                                $output .= apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                    sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" data-post_type="%s" data-product_status="%s" class="%s" title="%s" >%s</a>',
                                                        esc_url( $product->add_to_cart_url() ),
                                                        esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                                        esc_attr( $product->get_id() ),
                                                        esc_attr( $product->get_sku() ),
                                                        esc_attr( $post_type ),
                                                        esc_attr( $product->get_stock_status() ),
                                                        esc_attr( $product_class ),
                                                        esc_html( $product->add_to_cart_text() ),
                                                        esc_html( $product->add_to_cart_text() )
                                                    ),
                                                $product );

                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes"){
                                                    $output .= '<div class="ajax-add-to-cart-loading"><div class="circle-loader"><div class="checkmark draw"></div></div></div>';
                                                }

											$output .='</div>';
										$output .='</div>';
									$output .='</div>';

								$output .='</div>';

							$output .='</li>';

						endwhile;
					$output .='</ul>';
				$output .='</div>';

				$id_counter++;

				return $output;

				wp_reset_postdata();

			} else {
				goodresto_enovathemes_not_found('product');
			}

		} else {
			return '<div class="alert error"><div class="alert-message">'.esc_html__("Woocommerce plugin is not installed/active, please install/activate Woocommerce plugin", "enovathemes-addons").'</div></div>';
		}

	}
	add_shortcode('et_sale_products', 'et_sale_products');

/*  woocommerce best selling products
/*------------*/

	function et_best_selling_products($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'product_animation_effect' => 'none',
				'post_type'				   => 'grid',
				'per_page' 				   => '6',
				'post_size'				   => 'small',
				'category' 				   => '',
				'operator' 				   => 'IN',
			), $atts)
		);

		$output = '';

		if (class_exists('Woocommerce')){

			global $post, $goodresto_enovathemes;

			static $id_counter = 1;

			if(!is_numeric($per_page) || !isset($per_page) || empty($per_page) || $per_page < 0) {
				$per_page = 6;
			}

			if (isset($category) && !empty($category)) {

				$query_options = array( 
					'meta_key'            => 'total_sales',
					'orderby'             => 'meta_value_num',
					'post_type'           => 'product',
					'posts_per_page' 	  => absint($per_page), 
					'tax_query'           => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'slug',
							'terms'    => explode(',',$category),
							'operator' => $operator
						)
					),
					'post_status' 	 	  => 'publish',
					'ignore_sticky_posts' => true,
					'meta_query'          => WC()->query->get_meta_query()
				);

			} else {

				$query_options = array(
					'post_type'           => 'product',
					'post_status'         => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => absint($per_page),
					'meta_key'            => 'total_sales',
					'orderby'             => 'meta_value_num',
					'meta_query'          => WC()->query->get_meta_query(),
					'tax_query'           => WC()->query->get_tax_query(),
				);

			}

			$best_selling_products = new WP_Query($query_options);

			if($best_selling_products->have_posts()){

				$columns = 1;

				$product_image_effect     = (isset($GLOBALS['goodresto_enovathemes']['product-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['product-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['product-image-effect'] : "overlay-none";
                
				
				$class = 'best-selling-products-layout shortcode-product-layout';

				if ($post_type == "grid" || $post_type == "masonry1") {
					$class .= ' gridify';
					$class .= ' post-size-'.$post_size;
				}

				$class .= ' '.$post_type;
				$class .= ' filter-false';


				if ($product_animation_effect == "none") {
					$class .= ' lazy lazy-load';
				}

			    $thumb_size             = 'goodresto_384X384';
                $post_img_attr          = array();
                $post_img_sizes         = '100vw';
                $post_img_default_size  = $post_img_sizes;

                if ($post_type == "grid") {
                    $thumb_size            = 'goodresto_588X588';
                    $post_img_default_size = '588px';
                    $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 384px, (max-width: 1023px) 384px, (max-width: 1279px) 588px, '.$post_img_default_size;
                }

		    	switch ($post_size) {
		            case 'small' :
		                $columns = 4;
		                break;
		            case 'medium':
		                $columns = 3;
		                break;
		            case 'large':
		                $columns = 2;
		                break;
		        }

		        $output .='<div class="'.esc_attr($class).'">';
					$output .='<ul id="loop-products-'.$id_counter.'" data-columns="'.$columns.'" class="loop-posts loop-product '.(($post_type == 'grid' || $post_type == 'masonry1') ? 'gridify' : 'owl-carousel' ).' best-selling-products woocoomerce-product-shortcode effect-'.esc_attr($product_animation_effect).' '.$product_image_effect.' filter-false et-item-set et-clearfix">';
						
						while($best_selling_products->have_posts()) : $best_selling_products->the_post();

							$output .='<li class="'.join( " ", get_post_class('et-item post product')).'" id="post-'.get_the_ID().'" >';

								global $product;

								if (has_post_thumbnail()){

                                    if ( '' != get_the_title() ){
                                        $post_img_attr['alt'] = esc_html(get_the_title());
                                    }

                                    $post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
                                    $post_img_588      = get_the_post_thumbnail_url($post->ID,$thumb_size);

                                    $post_img_srcset = "";

                                    if (strpos($post_img_588, '588x')) {
                                        $post_img_srcset .= $post_img_588.' 588w';
                                    } else {
                                        $post_img_srcset .= $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                    }

                                    if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                        $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                        $thumb_size      = 'full';
                                    }

                                    $post_img_attr['srcset'] = $post_img_srcset;
                                    $post_img_attr['sizes']  = $post_img_sizes;
                                }

								$output .='<div class="post-inner et-item-inner et-clearfix">';
										
									if (defined('YITH_WCWL')){
										$output .= do_shortcode('[yith_wcwl_add_to_wishlist]');
									}
									$stock_status = $product->get_stock_status();
									if ($stock_status == "outofstock"){
										$output .='<div class="product-status outofstock"><span>'.esc_html__( 'Out of stock', 'enovathemes-addons' ).'</span></div>';
									} else {
										if ( $product->is_on_sale() ){
											$output .='<div class="product-status onsale"><span>'.esc_html__( 'Sale!', 'enovathemes-addons' ).'</span></div>';
										}
									}
									$output .='<div class="post-image post-media overlay-hover">';

										if (class_exists('YITH_WCQV_Frontend')){

					                        if (get_option('yith-wcqv-enable') == 'yes'){
					                            $output .='<a href="#" class="button yith-wcqv-button product-single-button product-quick-view size-medium" data-product_id="' . $product->get_id() . '" title="'.esc_html__("Product quick view", 'enovathemes-addons').'">' . esc_html__("Quick view", 'enovathemes-addons') . '</a>';
					                        }
					                    }

										if ($product_image_effect != "overlay-none"){

									        $output .= goodresto_enovathemes_product_image_overlay($product->get_id());

									        $output .='<div class="image-container visible">';
												$output .='<div class="image-preloader"></div>';
											    if (has_post_thumbnail()){
											   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
											    } else {
											   		$output .= wc_placeholder_img($thumb_size);
											    }
											$output .='</div>';

										} else {

											$output .='<a href="'.get_the_permalink().'" >';
												$output .='<div class="product-image-gallery">';
													$output .='<div class="image-container visible">';
														$output .='<div class="image-preloader"></div>';
														if (has_post_thumbnail()){
													   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
													    } else {
													   		$output .= wc_placeholder_img($thumb_size);
													    }
													$output .='</div>';
													$product_gallery_ids = $product->get_gallery_image_ids();
													if (is_array($product_gallery_ids) && !empty($product_gallery_ids)){
														foreach ($product_gallery_ids as $image_id){

															$post_img_original = wp_get_attachment_image_src( $image_id, "full" );
                                                            $post_img_282  = wp_get_attachment_image_src($image_id,'goodresto_282X282');
                                                            $post_img_384  = wp_get_attachment_image_src($image_id,'goodresto_384X384');
                                                            $post_img_588  = wp_get_attachment_image_src($image_id,'goodresto_588X588');
                                                            $post_img_640  = wp_get_attachment_image_src($image_id,'goodresto_640X400');
                                                            $post_img_960  = wp_get_attachment_image_src($image_id,'goodresto_960X600');

                                                            $post_img_srcset = "";

                                                            if (strpos($post_img_282[0], '282x')) {
                                                                $post_img_srcset .= $post_img_282[0].' 282w';
                                                            }

                                                            if (strpos($post_img_384[0], '384x')) {
                                                                $post_img_srcset .= ', '.$post_img_384[0].' 384w';
                                                            }

                                                            if (strpos($post_img_588[0], '588x')) {
                                                                $post_img_srcset .= ', '.$post_img_588[0].' 588w';
                                                            }

                                                            if (strpos($post_img_640[0], '640x')) {

                                                                $post_img_srcset .= ', '.$post_img_640[0].' 640w';
                                                            }

                                                            if (strpos($post_img_960[0], '960x')) {
                                                                $post_img_srcset .= ', '.$post_img_960[0].' 960w';
                                                            }

                                                            if ($post_type == "masonry1" || $post_type == "masonry2") {
                                                                $thumb_size = 'full';
                                                            }

                                                            if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                                                $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                                            }

                                                            $post_img_attr['srcset'] = $post_img_srcset;
                                                            $post_img_attr['sizes']  = $post_img_sizes;

												            $output .= wp_get_attachment_image($image_id, $thumb_size,false,$post_img_attr);
														}
													}
												$output .='</div>';
											$output .='</a>';

										}

									$output .='</div>';
									$output .='<div class="post-body et-clearfix">';
										$output .='<div class="post-body-inner-wrap">';
											$output .='<div class="post-body-inner">';
					        					$output .='<h4 class="post-title">';
					        						$output .='<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title().'">'.get_the_title().'</a>';
												$output .='</h4>';
												if ( get_option( 'woocommerce_enable_review_rating' ) != 'no' ) {
													$output .= wc_get_rating_html( $product->get_average_rating() );
												}
												if ( $price_html = $product->get_price_html() ){
													$output .= '<span class="price">'.$price_html.'</span>';
												}

												$post_type  = ($product->is_type( 'variable' )) ? "variable" : "simple";
                                                $product_class = 'button add_to_cart_button product-loop-button';
                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes" && $post_type == "simple" && $product->get_stock_status() != "outofstock"){
                                                    $product_class .=' ajax_add_to_cart';
                                                }

                                                $output .= apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                    sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" data-post_type="%s" data-product_status="%s" class="%s" title="%s" >%s</a>',
                                                        esc_url( $product->add_to_cart_url() ),
                                                        esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                                        esc_attr( $product->get_id() ),
                                                        esc_attr( $product->get_sku() ),
                                                        esc_attr( $post_type ),
                                                        esc_attr( $product->get_stock_status() ),
                                                        esc_attr( $product_class ),
                                                        esc_html( $product->add_to_cart_text() ),
                                                        esc_html( $product->add_to_cart_text() )
                                                    ),
                                                $product );

                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes"){
                                                    $output .= '<div class="ajax-add-to-cart-loading"><div class="circle-loader"><div class="checkmark draw"></div></div></div>';
                                                }

											$output .='</div>';
										$output .='</div>';
									$output .='</div>';

								$output .='</div>';

							$output .='</li>';

						endwhile;
					$output .='</ul>';
				$output .='</div>';

				$id_counter++;

				return $output;

				wp_reset_postdata();

			} else {
				goodresto_enovathemes_not_found('product');
			}

		} else {
			return '<div class="alert error"><div class="alert-message">'.esc_html__("Woocommerce plugin is not installed/active, please install/activate Woocommerce plugin", "enovathemes-addons").'</div></div>';
		}

	}
	add_shortcode('et_best_selling_products', 'et_best_selling_products');

/*  woocommerce top rated products
/*------------*/

	function et_top_rated_products($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'product_animation_effect' => 'none',
				'post_type'				   => 'grid',
				'per_page' 				   => '6',
				'post_size'				   => 'small',
				'orderby'  				   => 'date',
				'order'    				   => 'desc',
				'category' 				   => '',
				'operator' 				   => 'IN',
			), $atts)
		);

		$output = "";

		if (class_exists('Woocommerce')){

			global $post, $goodresto_enovathemes;

			static $id_counter = 1;

			if(!is_numeric($per_page) || !isset($per_page) || empty($per_page) || $per_page < 0) {
				$per_page = 6;
			}

			if (isset($category) && !empty($category)) {

				$query_options = array( 
					'orderby'             => $orderby,
					'order'               => $order,
					'post_type'           => 'product',
					'posts_per_page' 	  => absint($per_page), 
					'tax_query'           => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'slug',
							'terms'    => explode(',',$category),
							'operator' => $operator
						)
					),
					'post_status' 	 	  => 'publish',
					'ignore_sticky_posts' => true,
					'meta_query'          => WC()->query->get_meta_query()
				);

			} else {

				$query_options = array(
					'post_type'           => 'product',
					'post_status'         => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => $per_page,
					'orderby'             => $orderby,
					'order'               => $order,
					'meta_query'          => WC()->query->get_meta_query(),
					'tax_query'           => WC()->query->get_tax_query(),
				);

			}

			$top_rated_products = new WP_Query($query_options);

			if($top_rated_products->have_posts()){

				$columns = 1;

				$product_image_effect     = (isset($GLOBALS['goodresto_enovathemes']['product-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['product-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['product-image-effect'] : "overlay-none";
                
				
				$class = 'top-rated-products-layout shortcode-product-layout';

				if ($post_type == "grid" || $post_type == "masonry1") {
					$class .= ' gridify';
					$class .= ' post-size-'.$post_size;
				}

				$class .= ' '.$post_type;
				$class .= ' filter-false';


				if ($product_animation_effect == "none") {
					$class .= ' lazy lazy-load';
				}

			    $thumb_size             = 'goodresto_384X384';
                $post_img_attr          = array();
                $post_img_sizes         = '100vw';
                $post_img_default_size  = $post_img_sizes;

                if ($post_type == "grid") {
                    $thumb_size            = 'goodresto_588X588';
                    $post_img_default_size = '588px';
                    $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 384px, (max-width: 1023px) 384px, (max-width: 1279px) 588px, '.$post_img_default_size;
                }

		    	switch ($post_size) {
		            case 'small' :
		                $columns = 4;
		                break;
		            case 'medium':
		                $columns = 3;
		                break;
		            case 'large':
		                $columns = 2;
		                break;
		        }

		        add_filter( 'posts_clauses', array( __CLASS__, 'order_by_rating_post_clauses' ) );

		        $output .='<div class="'.esc_attr($class).'">';
					$output .='<ul id="loop-products-'.$id_counter.'" data-columns="'.$columns.'" class="loop-posts loop-product '.(($post_type == 'grid' || $post_type == 'masonry1') ? 'gridify' : 'owl-carousel' ).' top-rated-products woocoomerce-product-shortcode effect-'.esc_attr($product_animation_effect).' '.$product_image_effect.' filter-false et-item-set et-clearfix">';
						
						while($top_rated_products->have_posts()) : $top_rated_products->the_post();

							$output .='<li class="'.join( " ", get_post_class('et-item post product')).'" id="post-'.get_the_ID().'" >';

								global $product;

								if (has_post_thumbnail()){

                                    if ( '' != get_the_title() ){
                                        $post_img_attr['alt'] = esc_html(get_the_title());
                                    }

                                    $post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
                                    $post_img_588      = get_the_post_thumbnail_url($post->ID,$thumb_size);

                                    $post_img_srcset = "";

                                    if (strpos($post_img_588, '588x')) {
                                        $post_img_srcset .= $post_img_588.' 588w';
                                    } else {
                                        $post_img_srcset .= $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                    }

                                    if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                        $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                        $thumb_size      = 'full';
                                    }

                                    $post_img_attr['srcset'] = $post_img_srcset;
                                    $post_img_attr['sizes']  = $post_img_sizes;
                                }

								$output .='<div class="post-inner et-item-inner et-clearfix">';
										
									if (defined('YITH_WCWL')){
										$output .= do_shortcode('[yith_wcwl_add_to_wishlist]');
									}
									$stock_status = $product->get_stock_status();
									if ($stock_status == "outofstock"){
										$output .='<div class="product-status outofstock"><span>'.esc_html__( 'Out of stock', 'enovathemes-addons' ).'</span></div>';
									} else {
										if ( $product->is_on_sale() ){
											$output .='<div class="product-status onsale"><span>'.esc_html__( 'Sale!', 'enovathemes-addons' ).'</span></div>';
										}
									}
									$output .='<div class="post-image post-media overlay-hover">';

										if (class_exists('YITH_WCQV_Frontend')){

					                        if (get_option('yith-wcqv-enable') == 'yes'){
					                            $output .='<a href="#" class="button yith-wcqv-button product-single-button product-quick-view size-medium" data-product_id="' . $product->get_id() . '" title="'.esc_html__("Product quick view", 'enovathemes-addons').'">' . esc_html__("Quick view", 'enovathemes-addons') . '</a>';
					                        }
					                    }

										if ($product_image_effect != "overlay-none"){

									        $output .= goodresto_enovathemes_product_image_overlay($product->get_id());

									        $output .='<div class="image-container visible">';
												$output .='<div class="image-preloader"></div>';
											    if (has_post_thumbnail()){
											   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
											    } else {
											   		$output .= wc_placeholder_img($thumb_size);
											    }
											$output .='</div>';

										} else {

											$output .='<a href="'.get_the_permalink().'" >';
												$output .='<div class="product-image-gallery">';
													$output .='<div class="image-container visible">';
														$output .='<div class="image-preloader"></div>';
														if (has_post_thumbnail()){
													   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
													    } else {
													   		$output .= wc_placeholder_img($thumb_size);
													    }
													$output .='</div>';
													$product_gallery_ids = $product->get_gallery_image_ids();
													if (is_array($product_gallery_ids) && !empty($product_gallery_ids)){
														foreach ($product_gallery_ids as $image_id){

															$post_img_original = wp_get_attachment_image_src( $image_id, "full" );
                                                            $post_img_282  = wp_get_attachment_image_src($image_id,'goodresto_282X282');
                                                            $post_img_384  = wp_get_attachment_image_src($image_id,'goodresto_384X384');
                                                            $post_img_588  = wp_get_attachment_image_src($image_id,'goodresto_588X588');
                                                            $post_img_640  = wp_get_attachment_image_src($image_id,'goodresto_640X400');
                                                            $post_img_960  = wp_get_attachment_image_src($image_id,'goodresto_960X600');

                                                            $post_img_srcset = "";

                                                            if (strpos($post_img_282[0], '282x')) {
                                                                $post_img_srcset .= $post_img_282[0].' 282w';
                                                            }

                                                            if (strpos($post_img_384[0], '384x')) {
                                                                $post_img_srcset .= ', '.$post_img_384[0].' 384w';
                                                            }

                                                            if (strpos($post_img_588[0], '588x')) {
                                                                $post_img_srcset .= ', '.$post_img_588[0].' 588w';
                                                            }

                                                            if (strpos($post_img_640[0], '640x')) {

                                                                $post_img_srcset .= ', '.$post_img_640[0].' 640w';
                                                            }

                                                            if (strpos($post_img_960[0], '960x')) {
                                                                $post_img_srcset .= ', '.$post_img_960[0].' 960w';
                                                            }

                                                            if ($post_type == "masonry1" || $post_type == "masonry2") {
                                                                $thumb_size = 'full';
                                                            }

                                                            if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                                                $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                                            }

                                                            $post_img_attr['srcset'] = $post_img_srcset;
                                                            $post_img_attr['sizes']  = $post_img_sizes;

												            $output .= wp_get_attachment_image($image_id, $thumb_size,false,$post_img_attr);
														}
													}
												$output .='</div>';
											$output .='</a>';

										}

									$output .='</div>';
									$output .='<div class="post-body et-clearfix">';
										$output .='<div class="post-body-inner-wrap">';
											$output .='<div class="post-body-inner">';
					        					$output .='<h4 class="post-title">';
					        						$output .='<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title().'">'.get_the_title().'</a>';
												$output .='</h4>';
												if ( get_option( 'woocommerce_enable_review_rating' ) != 'no' ) {
													$output .= wc_get_rating_html( $product->get_average_rating() );
												}
												if ( $price_html = $product->get_price_html() ){
													$output .= '<span class="price">'.$price_html.'</span>';
												}

												$post_type  = ($product->is_type( 'variable' )) ? "variable" : "simple";
                                                $product_class = 'button add_to_cart_button product-loop-button';
                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes" && $post_type == "simple" && $product->get_stock_status() != "outofstock"){
                                                    $product_class .=' ajax_add_to_cart';
                                                }

                                                $output .= apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                    sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" data-post_type="%s" data-product_status="%s" class="%s" title="%s" >%s</a>',
                                                        esc_url( $product->add_to_cart_url() ),
                                                        esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                                        esc_attr( $product->get_id() ),
                                                        esc_attr( $product->get_sku() ),
                                                        esc_attr( $post_type ),
                                                        esc_attr( $product->get_stock_status() ),
                                                        esc_attr( $product_class ),
                                                        esc_html( $product->add_to_cart_text() ),
                                                        esc_html( $product->add_to_cart_text() )
                                                    ),
                                                $product );

                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes"){
                                                    $output .= '<div class="ajax-add-to-cart-loading"><div class="circle-loader"><div class="checkmark draw"></div></div></div>';
                                                }

											$output .='</div>';
										$output .='</div>';
									$output .='</div>';

								$output .='</div>';

							$output .='</li>';

						endwhile;
					$output .='</ul>';
				$output .='</div>';

				remove_filter( 'posts_clauses', array( __CLASS__, 'order_by_rating_post_clauses' ) );

				$id_counter++;

				return $output;

				wp_reset_postdata();

			} else {
				goodresto_enovathemes_not_found('product');
			}

		} else {
			return '<div class="alert error"><div class="alert-message">'.esc_html__("Woocommerce plugin is not installed/active, please install/activate Woocommerce plugin", "enovathemes-addons").'</div></div>';
		}

	}
	add_shortcode('et_top_rated_products', 'et_top_rated_products');

/*  woocommerce attribute products
/*------------*/

	function et_attribute_products($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'product_animation_effect' => 'none',
				'post_type'				   => 'grid',
				'per_page' 				   => '6',
				'post_size'				   => 'small',
				'orderby'  				   => 'date',
				'order'    				   => 'desc',
				'category' 				   => '',
				'operator' 				   => 'IN',
				'attribute'                => '',
				'filter'                   => ''
			), $atts)
		);

		$output = '';

		if (class_exists('Woocommerce')){

			global $post, $goodresto_enovathemes;

			static $id_counter = 1;

			if(!is_numeric($per_page) || !isset($per_page) || empty($per_page) || $per_page < 0) {
				$per_page = 6;
			}

			if (isset($category) && !empty($category)) {

				$query_options = array( 
					'orderby'             => $orderby,
					'order'               => $order,
					'post_type'           => 'product',
					'posts_per_page' 	  => absint($per_page), 
					'tax_query'           => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'slug',
							'terms'    => explode(',',$category),
							'operator' => $operator
						),
						array(
							'taxonomy' => strstr( $attribute, 'pa_' ) ? sanitize_title( $attribute ) : 'pa_' . sanitize_title( $attribute ),
							'terms'    => array_map( 'sanitize_title', explode( ',', $filter ) ),
							'field'    => 'slug',
						)
					),
					'post_status' 	 	  => 'publish',
					'ignore_sticky_posts' => true,
					'meta_query'          => WC()->query->get_meta_query()
				);

			} else {

				$query_options = array(
					'post_type'           => 'product',
					'post_status'         => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => $per_page,
					'orderby'             => $orderby,
					'order'               => $order,
					'meta_query'          => WC()->query->get_meta_query(),
					'tax_query'           => array(
						array(
							'taxonomy' => strstr( $attribute, 'pa_' ) ? sanitize_title( $attribute ) : 'pa_' . sanitize_title( $attribute ),
							'terms'    => array_map( 'sanitize_title', explode( ',', $filter ) ),
							'field'    => 'slug',
						)
					),
				);

			}

			$attribute_products = new WP_Query($query_options);

			if($attribute_products->have_posts()){

				$columns = 1;

				$product_image_effect     = (isset($GLOBALS['goodresto_enovathemes']['product-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['product-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['product-image-effect'] : "overlay-none";
                
				
				$class = 'attribute-products-layout shortcode-product-layout';

				if ($post_type == "grid" || $post_type == "masonry1") {
					$class .= ' gridify';
					$class .= ' post-size-'.$post_size;
				}

				$class .= ' '.$post_type;
				$class .= ' filter-false';


				if ($product_animation_effect == "none") {
					$class .= ' lazy lazy-load';
				}

			    $thumb_size             = 'goodresto_384X384';
                $post_img_attr          = array();
                $post_img_sizes         = '100vw';
                $post_img_default_size  = $post_img_sizes;

                if ($post_type == "grid") {
                    $thumb_size            = 'goodresto_588X588';
                    $post_img_default_size = '588px';
                    $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 384px, (max-width: 1023px) 384px, (max-width: 1279px) 588px, '.$post_img_default_size;
                }

		    	switch ($post_size) {
		            case 'small' :
		                $columns = 4;
		                break;
		            case 'medium':
		                $columns = 3;
		                break;
		            case 'large':
		                $columns = 2;
		                break;
		        }

		        $output .='<div class="'.esc_attr($class).'">';
					$output .='<ul id="loop-products-'.$id_counter.'" data-columns="'.$columns.'" class="loop-posts loop-product '.(($post_type == 'grid' || $post_type == 'masonry1') ? 'gridify' : 'owl-carousel' ).' attribute-products woocoomerce-product-shortcode effect-'.esc_attr($product_animation_effect).' '.$product_image_effect.' filter-false et-item-set et-clearfix">';
						
						while($attribute_products->have_posts()) : $attribute_products->the_post();

							$output .='<li class="'.join( " ", get_post_class('et-item post product')).'" id="post-'.get_the_ID().'" >';

								global $product;

								if (has_post_thumbnail()){

                                    if ( '' != get_the_title() ){
                                        $post_img_attr['alt'] = esc_html(get_the_title());
                                    }

                                    $post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
                                    $post_img_588      = get_the_post_thumbnail_url($post->ID,$thumb_size);

                                    $post_img_srcset = "";

                                    if (strpos($post_img_588, '588x')) {
                                        $post_img_srcset .= $post_img_588.' 588w';
                                    } else {
                                        $post_img_srcset .= $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                    }

                                    if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                        $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                        $thumb_size      = 'full';
                                    }

                                    $post_img_attr['srcset'] = $post_img_srcset;
                                    $post_img_attr['sizes']  = $post_img_sizes;
                                }

								$output .='<div class="post-inner et-item-inner et-clearfix">';
										
									if (defined('YITH_WCWL')){
										$output .= do_shortcode('[yith_wcwl_add_to_wishlist]');
									}
									$stock_status = $product->get_stock_status();
									if ($stock_status == "outofstock"){
										$output .='<div class="product-status outofstock"><span>'.esc_html__( 'Out of stock', 'enovathemes-addons' ).'</span></div>';
									} else {
										if ( $product->is_on_sale() ){
											$output .='<div class="product-status onsale"><span>'.esc_html__( 'Sale!', 'enovathemes-addons' ).'</span></div>';
										}
									}
									$output .='<div class="post-image post-media overlay-hover">';

										if (class_exists('YITH_WCQV_Frontend')){

					                        if (get_option('yith-wcqv-enable') == 'yes'){
					                            $output .='<a href="#" class="button yith-wcqv-button product-single-button product-quick-view size-medium" data-product_id="' . $product->get_id() . '" title="'.esc_html__("Product quick view", 'enovathemes-addons').'">' . esc_html__("Quick view", 'enovathemes-addons') . '</a>';
					                        }
					                    }

										if ($product_image_effect != "overlay-none"){

									        $output .= goodresto_enovathemes_product_image_overlay($product->get_id());

									        $output .='<div class="image-container visible">';
												$output .='<div class="image-preloader"></div>';
											    if (has_post_thumbnail()){
											   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
											    } else {
											   		$output .= wc_placeholder_img($thumb_size);
											    }
											$output .='</div>';

										} else {

											$output .='<a href="'.get_the_permalink().'" >';
												$output .='<div class="product-image-gallery">';
													$output .='<div class="image-container visible">';
														$output .='<div class="image-preloader"></div>';
														if (has_post_thumbnail()){
													   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
													    } else {
													   		$output .= wc_placeholder_img($thumb_size);
													    }
													$output .='</div>';
													$product_gallery_ids = $product->get_gallery_image_ids();
													if (is_array($product_gallery_ids) && !empty($product_gallery_ids)){
														foreach ($product_gallery_ids as $image_id){

															$post_img_original = wp_get_attachment_image_src( $image_id, "full" );
                                                            $post_img_282  = wp_get_attachment_image_src($image_id,'goodresto_282X282');
                                                            $post_img_384  = wp_get_attachment_image_src($image_id,'goodresto_384X384');
                                                            $post_img_588  = wp_get_attachment_image_src($image_id,'goodresto_588X588');
                                                            $post_img_640  = wp_get_attachment_image_src($image_id,'goodresto_640X400');
                                                            $post_img_960  = wp_get_attachment_image_src($image_id,'goodresto_960X600');

                                                            $post_img_srcset = "";

                                                            if (strpos($post_img_282[0], '282x')) {
                                                                $post_img_srcset .= $post_img_282[0].' 282w';
                                                            }

                                                            if (strpos($post_img_384[0], '384x')) {
                                                                $post_img_srcset .= ', '.$post_img_384[0].' 384w';
                                                            }

                                                            if (strpos($post_img_588[0], '588x')) {
                                                                $post_img_srcset .= ', '.$post_img_588[0].' 588w';
                                                            }

                                                            if (strpos($post_img_640[0], '640x')) {

                                                                $post_img_srcset .= ', '.$post_img_640[0].' 640w';
                                                            }

                                                            if (strpos($post_img_960[0], '960x')) {
                                                                $post_img_srcset .= ', '.$post_img_960[0].' 960w';
                                                            }

                                                            if ($post_type == "masonry1" || $post_type == "masonry2") {
                                                                $thumb_size = 'full';
                                                            }

                                                            if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                                                $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                                            }

                                                            $post_img_attr['srcset'] = $post_img_srcset;
                                                            $post_img_attr['sizes']  = $post_img_sizes;

												            $output .= wp_get_attachment_image($image_id, $thumb_size,false,$post_img_attr);
														}
													}
												$output .='</div>';
											$output .='</a>';

										}

									$output .='</div>';
									$output .='<div class="post-body et-clearfix">';
										$output .='<div class="post-body-inner-wrap">';
											$output .='<div class="post-body-inner">';
					        					$output .='<h4 class="post-title">';
					        						$output .='<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title().'">'.get_the_title().'</a>';
												$output .='</h4>';
												if ( get_option( 'woocommerce_enable_review_rating' ) != 'no' ) {
													$output .= wc_get_rating_html( $product->get_average_rating() );
												}
												if ( $price_html = $product->get_price_html() ){
													$output .= '<span class="price">'.$price_html.'</span>';
												}

												$post_type  = ($product->is_type( 'variable' )) ? "variable" : "simple";
                                                $product_class = 'button add_to_cart_button product-loop-button';
                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes" && $post_type == "simple" && $product->get_stock_status() != "outofstock"){
                                                    $product_class .=' ajax_add_to_cart';
                                                }

                                                $output .= apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                    sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" data-post_type="%s" data-product_status="%s" class="%s" title="%s" >%s</a>',
                                                        esc_url( $product->add_to_cart_url() ),
                                                        esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                                        esc_attr( $product->get_id() ),
                                                        esc_attr( $product->get_sku() ),
                                                        esc_attr( $post_type ),
                                                        esc_attr( $product->get_stock_status() ),
                                                        esc_attr( $product_class ),
                                                        esc_html( $product->add_to_cart_text() ),
                                                        esc_html( $product->add_to_cart_text() )
                                                    ),
                                                $product );

                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes"){
                                                    $output .= '<div class="ajax-add-to-cart-loading"><div class="circle-loader"><div class="checkmark draw"></div></div></div>';
                                                }

											$output .='</div>';
										$output .='</div>';
									$output .='</div>';

								$output .='</div>';

							$output .='</li>';

						endwhile;
					$output .='</ul>';
				$output .='</div>';

				$id_counter++;

				return $output;

				wp_reset_postdata();

			} else {
				goodresto_enovathemes_not_found('product');
			}

		} else {
			return '<div class="alert error"><div class="alert-message">'.esc_html__("Woocommerce plugin is not installed/active, please install/activate Woocommerce plugin", "enovathemes-addons").'</div></div>';
		}

	}
	add_shortcode('et_attribute_products', 'et_attribute_products');

/*  woocommerce related products
/*------------*/

	function et_related_products($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'product_animation_effect' => 'none',
				'post_type'				   => 'grid',
				'per_page' 				   => '6',
				'post_size'				   => 'small',
				'orderby'  				   => 'date',
				'order'    				   => 'desc',
			), $atts)
		);

		$output = "";

		if (class_exists('Woocommerce')){

			global $post, $goodresto_enovathemes, $product;

			if ( $post && $post->post_type ) {

				$post_type = $post->post_type;

				if (!is_wp_error($post_type)) {

					if ( empty( $product ) || ! $product->is_visible() ) {
						return;
					}

					static $id_counter = 1;

					if(!is_numeric($per_page) || !isset($per_page) || empty($per_page) || $per_page < 0) {
						$per_page = 6;
					}

					$terms = get_the_terms( $product->get_id() , 'product_tag');

					if ($terms) {

						$tagids = array();
			            foreach($terms as $tag) {$tagids[] = $tag->term_id;}

						$query_options = array(
							'post_type'           => 'product',
							'post_status'         => 'publish',
							'ignore_sticky_posts' => 1,
							'posts_per_page'      => $per_page,
							'orderby'             => $orderby,
							'order'               => $order,
							'meta_query'          => WC()->query->get_meta_query(),
							'tax_query' => array(
			                    array(
			                        'taxonomy' => 'product_tag',
			                        'field'    => 'id',
			                        'terms'    => $tagids,
			                        'operator' => 'IN'
			                     )
			                ),
							'post__not_in'        => array($product->get_id())
						);

						$related_products = new WP_Query($query_options);

						if($related_products->have_posts()){

							$columns = 1;

				$product_image_effect     = (isset($GLOBALS['goodresto_enovathemes']['product-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['product-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['product-image-effect'] : "overlay-none";
                
				
				$class = 'related-products-layout shortcode-product-layout';

				if ($post_type == "grid" || $post_type == "masonry1") {
					$class .= ' gridify';
					$class .= ' post-size-'.$post_size;
				}

				$class .= ' '.$post_type;
				$class .= ' filter-false';


				if ($product_animation_effect == "none") {
					$class .= ' lazy lazy-load';
				}

			    $thumb_size             = 'goodresto_384X384';
                $post_img_attr          = array();
                $post_img_sizes         = '100vw';
                $post_img_default_size  = $post_img_sizes;

                if ($post_type == "grid") {
                    $thumb_size            = 'goodresto_588X588';
                    $post_img_default_size = '588px';
                    $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 384px, (max-width: 1023px) 384px, (max-width: 1279px) 588px, '.$post_img_default_size;
                }

		    	switch ($post_size) {
		            case 'small' :
		                $columns = 4;
		                break;
		            case 'medium':
		                $columns = 3;
		                break;
		            case 'large':
		                $columns = 2;
		                break;
		        }

		        $output .='<div class="'.esc_attr($class).'">';
					$output .='<ul id="loop-products-'.$id_counter.'" data-columns="'.$columns.'" class="loop-posts loop-product '.(($post_type == 'grid' || $post_type == 'masonry1') ? 'gridify' : 'owl-carousel' ).' related-products woocoomerce-product-shortcode effect-'.esc_attr($product_animation_effect).' '.$product_image_effect.' filter-false et-item-set et-clearfix">';
						
						while($related_products->have_posts()) : $related_products->the_post();

							$output .='<li class="'.join( " ", get_post_class('et-item post product')).'" id="post-'.get_the_ID().'" >';

								global $product;

								if (has_post_thumbnail()){

                                    if ( '' != get_the_title() ){
                                        $post_img_attr['alt'] = esc_html(get_the_title());
                                    }

                                    $post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
                                    $post_img_588      = get_the_post_thumbnail_url($post->ID,$thumb_size);

                                    $post_img_srcset = "";

                                    if (strpos($post_img_588, '588x')) {
                                        $post_img_srcset .= $post_img_588.' 588w';
                                    } else {
                                        $post_img_srcset .= $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                    }

                                    if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                        $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                        $thumb_size      = 'full';
                                    }

                                    $post_img_attr['srcset'] = $post_img_srcset;
                                    $post_img_attr['sizes']  = $post_img_sizes;
                                }

								$output .='<div class="post-inner et-item-inner et-clearfix">';
										
									if (defined('YITH_WCWL')){
										$output .= do_shortcode('[yith_wcwl_add_to_wishlist]');
									}
									$stock_status = $product->get_stock_status();
									if ($stock_status == "outofstock"){
										$output .='<div class="product-status outofstock"><span>'.esc_html__( 'Out of stock', 'enovathemes-addons' ).'</span></div>';
									} else {
										if ( $product->is_on_sale() ){
											$output .='<div class="product-status onsale"><span>'.esc_html__( 'Sale!', 'enovathemes-addons' ).'</span></div>';
										}
									}
									$output .='<div class="post-image post-media overlay-hover">';

										if (class_exists('YITH_WCQV_Frontend')){

					                        if (get_option('yith-wcqv-enable') == 'yes'){
					                            $output .='<a href="#" class="button yith-wcqv-button product-single-button product-quick-view size-medium" data-product_id="' . $product->get_id() . '" title="'.esc_html__("Product quick view", 'enovathemes-addons').'">' . esc_html__("Quick view", 'enovathemes-addons') . '</a>';
					                        }
					                    }

										if ($product_image_effect != "overlay-none"){

									        $output .= goodresto_enovathemes_product_image_overlay($product->get_id());

									        $output .='<div class="image-container visible">';
												$output .='<div class="image-preloader"></div>';
											    if (has_post_thumbnail()){
											   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
											    } else {
											   		$output .= wc_placeholder_img($thumb_size);
											    }
											$output .='</div>';

										} else {

											$output .='<a href="'.get_the_permalink().'" >';
												$output .='<div class="product-image-gallery">';
													$output .='<div class="image-container visible">';
														$output .='<div class="image-preloader"></div>';
														if (has_post_thumbnail()){
													   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
													    } else {
													   		$output .= wc_placeholder_img($thumb_size);
													    }
													$output .='</div>';
													$product_gallery_ids = $product->get_gallery_image_ids();
													if (is_array($product_gallery_ids) && !empty($product_gallery_ids)){
														foreach ($product_gallery_ids as $image_id){

															$post_img_original = wp_get_attachment_image_src( $image_id, "full" );
                                                            $post_img_282  = wp_get_attachment_image_src($image_id,'goodresto_282X282');
                                                            $post_img_384  = wp_get_attachment_image_src($image_id,'goodresto_384X384');
                                                            $post_img_588  = wp_get_attachment_image_src($image_id,'goodresto_588X588');
                                                            $post_img_640  = wp_get_attachment_image_src($image_id,'goodresto_640X400');
                                                            $post_img_960  = wp_get_attachment_image_src($image_id,'goodresto_960X600');

                                                            $post_img_srcset = "";

                                                            if (strpos($post_img_282[0], '282x')) {
                                                                $post_img_srcset .= $post_img_282[0].' 282w';
                                                            }

                                                            if (strpos($post_img_384[0], '384x')) {
                                                                $post_img_srcset .= ', '.$post_img_384[0].' 384w';
                                                            }

                                                            if (strpos($post_img_588[0], '588x')) {
                                                                $post_img_srcset .= ', '.$post_img_588[0].' 588w';
                                                            }

                                                            if (strpos($post_img_640[0], '640x')) {

                                                                $post_img_srcset .= ', '.$post_img_640[0].' 640w';
                                                            }

                                                            if (strpos($post_img_960[0], '960x')) {
                                                                $post_img_srcset .= ', '.$post_img_960[0].' 960w';
                                                            }

                                                            if ($post_type == "masonry1" || $post_type == "masonry2") {
                                                                $thumb_size = 'full';
                                                            }

                                                            if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                                                $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                                            }

                                                            $post_img_attr['srcset'] = $post_img_srcset;
                                                            $post_img_attr['sizes']  = $post_img_sizes;

												            $output .= wp_get_attachment_image($image_id, $thumb_size,false,$post_img_attr);
														}
													}
												$output .='</div>';
											$output .='</a>';

										}

									$output .='</div>';
									$output .='<div class="post-body et-clearfix">';
										$output .='<div class="post-body-inner-wrap">';
											$output .='<div class="post-body-inner">';
					        					$output .='<h4 class="post-title">';
					        						$output .='<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title().'">'.get_the_title().'</a>';
												$output .='</h4>';
												if ( get_option( 'woocommerce_enable_review_rating' ) != 'no' ) {
													$output .= wc_get_rating_html( $product->get_average_rating() );
												}
												if ( $price_html = $product->get_price_html() ){
													$output .= '<span class="price">'.$price_html.'</span>';
												}

												$post_type  = ($product->is_type( 'variable' )) ? "variable" : "simple";
                                                $product_class = 'button add_to_cart_button product-loop-button';
                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes" && $post_type == "simple" && $product->get_stock_status() != "outofstock"){
                                                    $product_class .=' ajax_add_to_cart';
                                                }

                                                $output .= apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                    sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" data-post_type="%s" data-product_status="%s" class="%s" title="%s" >%s</a>',
                                                        esc_url( $product->add_to_cart_url() ),
                                                        esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                                        esc_attr( $product->get_id() ),
                                                        esc_attr( $product->get_sku() ),
                                                        esc_attr( $post_type ),
                                                        esc_attr( $product->get_stock_status() ),
                                                        esc_attr( $product_class ),
                                                        esc_html( $product->add_to_cart_text() ),
                                                        esc_html( $product->add_to_cart_text() )
                                                    ),
                                                $product );

                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes"){
                                                    $output .= '<div class="ajax-add-to-cart-loading"><div class="circle-loader"><div class="checkmark draw"></div></div></div>';
                                                }

											$output .='</div>';
										$output .='</div>';
									$output .='</div>';

								$output .='</div>';

							$output .='</li>';

						endwhile;
					$output .='</ul>';
				$output .='</div>';

							$id_counter++;

							return $output;

							wp_reset_postdata();

						} else {
							goodresto_enovathemes_not_found('product');
						}

					}

				}

			}

		} else {
			return '<div class="alert error"><div class="alert-message">'.esc_html__("Woocommerce plugin is not installed/active, please install/activate Woocommerce plugin", "enovathemes-addons").'</div></div>';
		}

	}
	add_shortcode('et_related_products', 'et_related_products');

/*  woocommerce product
/*------------*/

	function et_product($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'id' => 'date'
			), $atts)
		);

		$output = "";

		if (class_exists('Woocommerce')){

			global $post, $goodresto_enovathemes, $product;

			static $id_counter = 1;

			$query_options = array(
				'post_type'      => 'product',
				'posts_per_page' => 1,
				'no_found_rows'  => 1,
				'post_status'    => 'publish',
				'meta_query'     => WC()->query->get_meta_query(),
				'tax_query'      => WC()->query->get_tax_query(),
			);

			if ( isset( $id ) ) {
				$query_options['p'] = $id;
			}

			$custom_product = new WP_Query($query_options);

			if($custom_product->have_posts()){

				$columns = 1;

				$product_image_effect     = (isset($GLOBALS['goodresto_enovathemes']['product-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['product-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['product-image-effect'] : "overlay-none";
                $post_type                = (isset($GLOBALS['goodresto_enovathemes']['product-post-layout']) && $GLOBALS['goodresto_enovathemes']['product-post-layout']) ? $GLOBALS['goodresto_enovathemes']['product-post-layout'] : "grid";
				
				$class = 'custom-product-layout shortcode-product-layout';

			    $thumb_size             = 'goodresto_384X384';
                $post_img_attr          = array();
                $post_img_sizes         = '100vw';
                $post_img_default_size  = $post_img_sizes;

                if ($post_type == "grid") {
                    $thumb_size            = 'goodresto_588X588';
                    $post_img_default_size = '588px';
                    $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 384px, (max-width: 1023px) 384px, (max-width: 1279px) 588px, '.$post_img_default_size;
                }

				while($custom_product->have_posts()) : $custom_product->the_post();
					$output .='<div class="woocoomerce-product-shortcode custom-product-shortcode effect-none '.$product_image_effect.'" >';
						$output .='<div class="'.join( " ", get_post_class('post product custom-product')).'" id="post-'.get_the_ID().'" >';

							global $product;

							if (has_post_thumbnail()){

	                            if ( '' != get_the_title() ){
	                                $post_img_attr['alt'] = esc_html(get_the_title());
	                            }

	                            $post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
	                            $post_img_588      = get_the_post_thumbnail_url($post->ID,$thumb_size);

	                            $post_img_srcset = "";

	                            if (strpos($post_img_588, '588x')) {
	                                $post_img_srcset .= $post_img_588.' 588w';
	                            } else {
	                                $post_img_srcset .= $post_img_original[0].' '.$post_img_original[1].'w';
	                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
	                            }

	                            if (empty($post_img_srcset)) {
	                                $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
	                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
	                                $thumb_size      = 'full';
	                            }

	                            $post_img_attr['srcset'] = $post_img_srcset;
	                            $post_img_attr['sizes']  = $post_img_sizes;
	                        }

							$output .='<div class="post-inner et-item-inner et-clearfix">';
									
								if (defined('YITH_WCWL')){
									$output .= do_shortcode('[yith_wcwl_add_to_wishlist]');
								}
								$stock_status = $product->get_stock_status();
								if ($stock_status == "outofstock"){
									$output .='<div class="product-status outofstock"><span>'.esc_html__( 'Out of stock', 'enovathemes-addons' ).'</span></div>';
								} else {
									if ( $product->is_on_sale() ){
										$output .='<div class="product-status onsale"><span>'.esc_html__( 'Sale!', 'enovathemes-addons' ).'</span></div>';
									}
								}
								$output .='<div class="post-image post-media overlay-hover">';

									if (class_exists('YITH_WCQV_Frontend')){

				                        if (get_option('yith-wcqv-enable') == 'yes'){
				                            $output .='<a href="#" class="button yith-wcqv-button product-single-button product-quick-view size-medium" data-product_id="' . $product->get_id() . '" title="'.esc_html__("Product quick view", 'enovathemes-addons').'">' . esc_html__("Quick view", 'enovathemes-addons') . '</a>';
				                        }
				                    }

									if ($product_image_effect != "overlay-none"){

								        $output .= goodresto_enovathemes_product_image_overlay($product->get_id());

								        $output .='<div class="image-container visible">';
											$output .='<div class="image-preloader"></div>';
										    if (has_post_thumbnail()){
										   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
										    } else {
										   		$output .= wc_placeholder_img($thumb_size);
										    }
										$output .='</div>';

									} else {

										$output .='<a href="'.get_the_permalink().'" >';
											$output .='<div class="product-image-gallery">';
												$output .='<div class="image-container visible">';
													$output .='<div class="image-preloader"></div>';
													if (has_post_thumbnail()){
												   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
												    } else {
												   		$output .= wc_placeholder_img($thumb_size);
												    }
												$output .='</div>';
												$product_gallery_ids = $product->get_gallery_image_ids();
												if (is_array($product_gallery_ids) && !empty($product_gallery_ids)){
													foreach ($product_gallery_ids as $image_id){

														$post_img_original = wp_get_attachment_image_src( $image_id, "full" );
	                                                    $post_img_282  = wp_get_attachment_image_src($image_id,'goodresto_282X282');
	                                                    $post_img_384  = wp_get_attachment_image_src($image_id,'goodresto_384X384');
	                                                    $post_img_588  = wp_get_attachment_image_src($image_id,'goodresto_588X588');
	                                                    $post_img_640  = wp_get_attachment_image_src($image_id,'goodresto_640X400');
	                                                    $post_img_960  = wp_get_attachment_image_src($image_id,'goodresto_960X600');

	                                                    $post_img_srcset = "";

	                                                    if (strpos($post_img_282[0], '282x')) {
	                                                        $post_img_srcset .= $post_img_282[0].' 282w';
	                                                    }

	                                                    if (strpos($post_img_384[0], '384x')) {
	                                                        $post_img_srcset .= ', '.$post_img_384[0].' 384w';
	                                                    }

	                                                    if (strpos($post_img_588[0], '588x')) {
	                                                        $post_img_srcset .= ', '.$post_img_588[0].' 588w';
	                                                    }

	                                                    if (strpos($post_img_640[0], '640x')) {

	                                                        $post_img_srcset .= ', '.$post_img_640[0].' 640w';
	                                                    }

	                                                    if (strpos($post_img_960[0], '960x')) {
	                                                        $post_img_srcset .= ', '.$post_img_960[0].' 960w';
	                                                    }

	                                                    if ($post_type == "masonry1" || $post_type == "masonry2") {
	                                                        $thumb_size = 'full';
	                                                    }

	                                                    if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
	                                                        $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
	                                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
	                                                    }

	                                                    $post_img_attr['srcset'] = $post_img_srcset;
	                                                    $post_img_attr['sizes']  = $post_img_sizes;

											            $output .= wp_get_attachment_image($image_id, $thumb_size,false,$post_img_attr);
													}
												}
											$output .='</div>';
										$output .='</a>';

									}

								$output .='</div>';
								$output .='<div class="post-body et-clearfix">';
									$output .='<div class="post-body-inner-wrap">';
										$output .='<div class="post-body-inner">';
				        					$output .='<h4 class="post-title">';
				        						$output .='<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title().'">'.get_the_title().'</a>';
											$output .='</h4>';
											if ( get_option( 'woocommerce_enable_review_rating' ) != 'no' ) {
												$output .= wc_get_rating_html( $product->get_average_rating() );
											}
											if ( $price_html = $product->get_price_html() ){
												$output .= '<span class="price">'.$price_html.'</span>';
											}

											$post_type  = ($product->is_type( 'variable' )) ? "variable" : "simple";
	                                        $product_class = 'button add_to_cart_button product-loop-button';
	                                        if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes" && $post_type == "simple" && $product->get_stock_status() != "outofstock"){
	                                            $product_class .=' ajax_add_to_cart';
	                                        }

	                                        $output .= apply_filters( 'woocommerce_loop_add_to_cart_link',
	                                            sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" data-post_type="%s" data-product_status="%s" class="%s" title="%s" >%s</a>',
	                                                esc_url( $product->add_to_cart_url() ),
	                                                esc_attr( isset( $quantity ) ? $quantity : 1 ),
	                                                esc_attr( $product->get_id() ),
	                                                esc_attr( $product->get_sku() ),
	                                                esc_attr( $post_type ),
	                                                esc_attr( $product->get_stock_status() ),
	                                                esc_attr( $product_class ),
	                                                esc_html( $product->add_to_cart_text() ),
	                                                esc_html( $product->add_to_cart_text() )
	                                            ),
	                                        $product );

	                                        if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes"){
	                                            $output .= '<div class="ajax-add-to-cart-loading"><div class="circle-loader"><div class="checkmark draw"></div></div></div>';
	                                        }

										$output .='</div>';
									$output .='</div>';
								$output .='</div>';

							$output .='</div>';
						$output .='</div>';
					$output .='</div>';

				endwhile;

				$id_counter++;

				return $output;

				wp_reset_postdata();

			} else {
				goodresto_enovathemes_not_found('product');
			}

		} else {
			return '<div class="alert error"><div class="alert-message">'.esc_html__("Woocommerce plugin is not installed/active, please install/activate Woocommerce plugin", "enovathemes-addons").'</div></div>';
		}

	}
	add_shortcode('et_product', 'et_product');

/*  woocommerce products
/*------------*/

	function et_products($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'product_animation_effect' => 'none',
				'post_type'				   => 'grid',
				'post_size'				   => 'small',
				'orderby'  				   => 'date',
				'order'    				   => 'desc',
				'ids' 				       => ''
			), $atts)
		);

		$output = '';

		if (class_exists('Woocommerce')){

			global $post, $goodresto_enovathemes;

			static $id_counter = 1;

			$query_options = array(
				'post_type'           => 'product',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 1,
				'posts_per_page'      => -1,
				'orderby'             => $orderby,
				'order'               => $order,
				'meta_query'          => WC()->query->get_meta_query(),
				'tax_query'           => WC()->query->get_tax_query(),
			);

			if ( ! empty( $ids ) ) {
				$query_options['post__in'] = array_map( 'trim', explode( ',', $ids ) );
			}

			$list_products = new WP_Query($query_options);

			if($list_products->have_posts()){
				
				$columns = 1;

				$product_image_effect     = (isset($GLOBALS['goodresto_enovathemes']['product-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['product-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['product-image-effect'] : "overlay-none";
                
				
				$class = 'list-products-layout shortcode-product-layout';

				if ($post_type == "grid" || $post_type == "masonry1") {
					$class .= ' gridify';
					$class .= ' post-size-'.$post_size;
				}

				$class .= ' '.$post_type;
				$class .= ' filter-false';


				if ($product_animation_effect == "none") {
					$class .= ' lazy lazy-load';
				}

			    $thumb_size             = 'goodresto_384X384';
                $post_img_attr          = array();
                $post_img_sizes         = '100vw';
                $post_img_default_size  = $post_img_sizes;

                if ($post_type == "grid") {
                    $thumb_size            = 'goodresto_588X588';
                    $post_img_default_size = '588px';
                    $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 384px, (max-width: 1023px) 384px, (max-width: 1279px) 588px, '.$post_img_default_size;
                }

		    	switch ($post_size) {
		            case 'small' :
		                $columns = 4;
		                break;
		            case 'medium':
		                $columns = 3;
		                break;
		            case 'large':
		                $columns = 2;
		                break;
		        }

		        $output .='<div class="'.esc_attr($class).'">';
					$output .='<ul id="loop-products-'.$id_counter.'" data-columns="'.$columns.'" class="loop-posts loop-product '.(($post_type == 'grid' || $post_type == 'masonry1') ? 'gridify' : 'owl-carousel' ).' list-products woocoomerce-product-shortcode effect-'.esc_attr($product_animation_effect).' '.$product_image_effect.' filter-false et-item-set et-clearfix">';
						
						while($list_products->have_posts()) : $list_products->the_post();

							$output .='<li class="'.join( " ", get_post_class('et-item post product')).'" id="post-'.get_the_ID().'" >';

								global $product;

								if (has_post_thumbnail()){

                                    if ( '' != get_the_title() ){
                                        $post_img_attr['alt'] = esc_html(get_the_title());
                                    }

                                    $post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
                                    $post_img_588      = get_the_post_thumbnail_url($post->ID,$thumb_size);

                                    $post_img_srcset = "";

                                    if (strpos($post_img_588, '588x')) {
                                        $post_img_srcset .= $post_img_588.' 588w';
                                    } else {
                                        $post_img_srcset .= $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                    }

                                    if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                        $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                        $thumb_size      = 'full';
                                    }

                                    $post_img_attr['srcset'] = $post_img_srcset;
                                    $post_img_attr['sizes']  = $post_img_sizes;
                                }

								$output .='<div class="post-inner et-item-inner et-clearfix">';
										
									if (defined('YITH_WCWL')){
										$output .= do_shortcode('[yith_wcwl_add_to_wishlist]');
									}
									$stock_status = $product->get_stock_status();
									if ($stock_status == "outofstock"){
										$output .='<div class="product-status outofstock"><span>'.esc_html__( 'Out of stock', 'enovathemes-addons' ).'</span></div>';
									} else {
										if ( $product->is_on_sale() ){
											$output .='<div class="product-status onsale"><span>'.esc_html__( 'Sale!', 'enovathemes-addons' ).'</span></div>';
										}
									}
									$output .='<div class="post-image post-media overlay-hover">';

										if (class_exists('YITH_WCQV_Frontend')){

					                        if (get_option('yith-wcqv-enable') == 'yes'){
					                            $output .='<a href="#" class="button yith-wcqv-button product-single-button product-quick-view size-medium" data-product_id="' . $product->get_id() . '" title="'.esc_html__("Product quick view", 'enovathemes-addons').'">' . esc_html__("Quick view", 'enovathemes-addons') . '</a>';
					                        }
					                    }

										if ($product_image_effect != "overlay-none"){

									        $output .= goodresto_enovathemes_product_image_overlay($product->get_id());

									        $output .='<div class="image-container visible">';
												$output .='<div class="image-preloader"></div>';
											    if (has_post_thumbnail()){
											   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
											    } else {
											   		$output .= wc_placeholder_img($thumb_size);
											    }
											$output .='</div>';

										} else {

											$output .='<a href="'.get_the_permalink().'" >';
												$output .='<div class="product-image-gallery">';
													$output .='<div class="image-container visible">';
														$output .='<div class="image-preloader"></div>';
														if (has_post_thumbnail()){
													   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
													    } else {
													   		$output .= wc_placeholder_img($thumb_size);
													    }
													$output .='</div>';
													$product_gallery_ids = $product->get_gallery_image_ids();
													if (is_array($product_gallery_ids) && !empty($product_gallery_ids)){
														foreach ($product_gallery_ids as $image_id){

															$post_img_original = wp_get_attachment_image_src( $image_id, "full" );
                                                            $post_img_282  = wp_get_attachment_image_src($image_id,'goodresto_282X282');
                                                            $post_img_384  = wp_get_attachment_image_src($image_id,'goodresto_384X384');
                                                            $post_img_588  = wp_get_attachment_image_src($image_id,'goodresto_588X588');
                                                            $post_img_640  = wp_get_attachment_image_src($image_id,'goodresto_640X400');
                                                            $post_img_960  = wp_get_attachment_image_src($image_id,'goodresto_960X600');

                                                            $post_img_srcset = "";

                                                            if (strpos($post_img_282[0], '282x')) {
                                                                $post_img_srcset .= $post_img_282[0].' 282w';
                                                            }

                                                            if (strpos($post_img_384[0], '384x')) {
                                                                $post_img_srcset .= ', '.$post_img_384[0].' 384w';
                                                            }

                                                            if (strpos($post_img_588[0], '588x')) {
                                                                $post_img_srcset .= ', '.$post_img_588[0].' 588w';
                                                            }

                                                            if (strpos($post_img_640[0], '640x')) {

                                                                $post_img_srcset .= ', '.$post_img_640[0].' 640w';
                                                            }

                                                            if (strpos($post_img_960[0], '960x')) {
                                                                $post_img_srcset .= ', '.$post_img_960[0].' 960w';
                                                            }

                                                            if ($post_type == "masonry1" || $post_type == "masonry2") {
                                                                $thumb_size = 'full';
                                                            }

                                                            if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                                                $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                                            }

                                                            $post_img_attr['srcset'] = $post_img_srcset;
                                                            $post_img_attr['sizes']  = $post_img_sizes;

												            $output .= wp_get_attachment_image($image_id, $thumb_size,false,$post_img_attr);
														}
													}
												$output .='</div>';
											$output .='</a>';

										}

									$output .='</div>';
									$output .='<div class="post-body et-clearfix">';
										$output .='<div class="post-body-inner-wrap">';
											$output .='<div class="post-body-inner">';
					        					$output .='<h4 class="post-title">';
					        						$output .='<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title().'">'.get_the_title().'</a>';
												$output .='</h4>';
												if ( get_option( 'woocommerce_enable_review_rating' ) != 'no' ) {
													$output .= wc_get_rating_html( $product->get_average_rating() );
												}
												if ( $price_html = $product->get_price_html() ){
													$output .= '<span class="price">'.$price_html.'</span>';
												}

												$post_type  = ($product->is_type( 'variable' )) ? "variable" : "simple";
                                                $product_class = 'button add_to_cart_button product-loop-button';
                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes" && $post_type == "simple" && $product->get_stock_status() != "outofstock"){
                                                    $product_class .=' ajax_add_to_cart';
                                                }

                                                $output .= apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                    sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" data-post_type="%s" data-product_status="%s" class="%s" title="%s" >%s</a>',
                                                        esc_url( $product->add_to_cart_url() ),
                                                        esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                                        esc_attr( $product->get_id() ),
                                                        esc_attr( $product->get_sku() ),
                                                        esc_attr( $post_type ),
                                                        esc_attr( $product->get_stock_status() ),
                                                        esc_attr( $product_class ),
                                                        esc_html( $product->add_to_cart_text() ),
                                                        esc_html( $product->add_to_cart_text() )
                                                    ),
                                                $product );

                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes"){
                                                    $output .= '<div class="ajax-add-to-cart-loading"><div class="circle-loader"><div class="checkmark draw"></div></div></div>';
                                                }

											$output .='</div>';
										$output .='</div>';
									$output .='</div>';

								$output .='</div>';

							$output .='</li>';

						endwhile;
					$output .='</ul>';
				$output .='</div>';

				$id_counter++;

				return $output;

				wp_reset_postdata();

			} else {
				goodresto_enovathemes_not_found('product');
			}

		} else {
			return '<div class="alert error"><div class="alert-message">'.esc_html__("Woocommerce plugin is not installed/active, please install/activate Woocommerce plugin", "enovathemes-addons").'</div></div>';
		}

	}
	add_shortcode('et_products', 'et_products');

/*  woocommerce product category
/*------------*/

	function et_product_category($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'product_animation_effect' => 'none',
				'post_type'				   => 'grid',
				'per_page' 				   => '6',
				'post_size'				   => 'small',
				'orderby'  				   => 'date',
				'order'    				   => 'desc',
				'category' 				   => ''
			), $atts)
		);

		$output = "";

		if (class_exists('Woocommerce')){

			global $post, $goodresto_enovathemes;

			if ( ! $category ) {
				return '';
			}

			static $id_counter = 1;

			if(!is_numeric($per_page) || !isset($per_page) || empty($per_page) || $per_page < 0) {
				$per_page = 6;
			}

			if (isset($category) && !empty($category)) {

				$query_options = array( 
					'orderby'             => $orderby,
					'order'               => $order,
					'post_type'           => 'product',
					'posts_per_page' 	  => absint($per_page),
					'meta_query'          => WC()->query->get_meta_query(), 
					'tax_query'           => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'slug',
							'terms'    => $category,
							'operator' => 'IN'
						)
					),
					'post_status' 	 	  => 'publish',
					'ignore_sticky_posts' => true
				);

			} else {

				$query_options = array(
					'post_type'           => 'product',
					'post_status'         => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => $per_page,
					'orderby'             => $orderby,
					'order'               => $order,
					'meta_query'          => WC()->query->get_meta_query(),
					'tax_query'           => WC()->query->get_tax_query(),
				);

			}

			$category_products = new WP_Query($query_options);

			if($category_products->have_posts()){

				$columns = 1;

				$product_image_effect     = (isset($GLOBALS['goodresto_enovathemes']['product-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['product-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['product-image-effect'] : "overlay-none";
                
				$class = 'category-products-layout shortcode-product-layout';

				if ($post_type == "grid" || $post_type == "masonry1") {
					$class .= ' gridify';
					$class .= ' post-size-'.$post_size;
				}

				$class .= ' '.$post_type;
				$class .= ' filter-false';


				if ($product_animation_effect == "none") {
					$class .= ' lazy lazy-load';
				}

			    $thumb_size             = 'goodresto_384X384';
                $post_img_attr          = array();
                $post_img_sizes         = '100vw';
                $post_img_default_size  = $post_img_sizes;

                if ($post_type == "grid") {
                    $thumb_size            = 'goodresto_588X588';
                    $post_img_default_size = '588px';
                    $post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) 384px, (max-width: 767px) 384px, (max-width: 1023px) 384px, (max-width: 1279px) 588px, '.$post_img_default_size;
                }

		    	switch ($post_size) {
		            case 'small' :
		                $columns = 4;
		                break;
		            case 'medium':
		                $columns = 3;
		                break;
		            case 'large':
		                $columns = 2;
		                break;
		        }

		        $output .='<div class="'.esc_attr($class).'">';
					$output .='<ul id="loop-products-'.$id_counter.'" data-columns="'.$columns.'" class="loop-posts loop-product '.(($post_type == 'grid' || $post_type == 'masonry1') ? 'gridify' : 'owl-carousel' ).' category-products woocoomerce-product-shortcode effect-'.esc_attr($product_animation_effect).' '.$product_image_effect.' filter-false et-item-set et-clearfix">';
						
						while($category_products->have_posts()) : $category_products->the_post();

							$output .='<li class="'.join( " ", get_post_class('et-item post product')).'" id="post-'.get_the_ID().'" >';

								global $product;

								if (has_post_thumbnail()){

                                    if ( '' != get_the_title() ){
                                        $post_img_attr['alt'] = esc_html(get_the_title());
                                    }

                                    $post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
                                    $post_img_588      = get_the_post_thumbnail_url($post->ID,$thumb_size);

                                    $post_img_srcset = "";

                                    if (strpos($post_img_588, '588x')) {
                                        $post_img_srcset .= $post_img_588.' 588w';
                                    } else {
                                        $post_img_srcset .= $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                    }

                                    if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                        $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                        $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                        $thumb_size      = 'full';
                                    }

                                    $post_img_attr['srcset'] = $post_img_srcset;
                                    $post_img_attr['sizes']  = $post_img_sizes;
                                }

								$output .='<div class="post-inner et-item-inner et-clearfix">';
										
									if (defined('YITH_WCWL')){
										$output .= do_shortcode('[yith_wcwl_add_to_wishlist]');
									}
									$stock_status = $product->get_stock_status();
									if ($stock_status == "outofstock"){
										$output .='<div class="product-status outofstock"><span>'.esc_html__( 'Out of stock', 'enovathemes-addons' ).'</span></div>';
									} else {
										if ( $product->is_on_sale() ){
											$output .='<div class="product-status onsale"><span>'.esc_html__( 'Sale!', 'enovathemes-addons' ).'</span></div>';
										}
									}
									$output .='<div class="post-image post-media overlay-hover">';

										if (class_exists('YITH_WCQV_Frontend')){

					                        if (get_option('yith-wcqv-enable') == 'yes'){
					                            $output .='<a href="#" class="button yith-wcqv-button product-single-button product-quick-view size-medium" data-product_id="' . $product->get_id() . '" title="'.esc_html__("Product quick view", 'enovathemes-addons').'">' . esc_html__("Quick view", 'enovathemes-addons') . '</a>';
					                        }
					                    }

										if ($product_image_effect != "overlay-none"){

									        $output .= goodresto_enovathemes_product_image_overlay($product->get_id());

									        $output .='<div class="image-container visible">';
												$output .='<div class="image-preloader"></div>';
											    if (has_post_thumbnail()){
											   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
											    } else {
											   		$output .= wc_placeholder_img($thumb_size);
											    }
											$output .='</div>';

										} else {

											$output .='<a href="'.get_the_permalink().'" >';
												$output .='<div class="product-image-gallery">';
													$output .='<div class="image-container visible">';
														$output .='<div class="image-preloader"></div>';
														if (has_post_thumbnail()){
													   		$output .= wp_get_attachment_image(get_post_thumbnail_id( get_the_ID() ), $thumb_size,false,$post_img_attr);
													    } else {
													   		$output .= wc_placeholder_img($thumb_size);
													    }
													$output .='</div>';
													$product_gallery_ids = $product->get_gallery_image_ids();
													if (is_array($product_gallery_ids) && !empty($product_gallery_ids)){
														foreach ($product_gallery_ids as $image_id){

															$post_img_original = wp_get_attachment_image_src( $image_id, "full" );
                                                            $post_img_282  = wp_get_attachment_image_src($image_id,'goodresto_282X282');
                                                            $post_img_384  = wp_get_attachment_image_src($image_id,'goodresto_384X384');
                                                            $post_img_588  = wp_get_attachment_image_src($image_id,'goodresto_588X588');
                                                            $post_img_640  = wp_get_attachment_image_src($image_id,'goodresto_640X400');
                                                            $post_img_960  = wp_get_attachment_image_src($image_id,'goodresto_960X600');

                                                            $post_img_srcset = "";

                                                            if (strpos($post_img_282[0], '282x')) {
                                                                $post_img_srcset .= $post_img_282[0].' 282w';
                                                            }

                                                            if (strpos($post_img_384[0], '384x')) {
                                                                $post_img_srcset .= ', '.$post_img_384[0].' 384w';
                                                            }

                                                            if (strpos($post_img_588[0], '588x')) {
                                                                $post_img_srcset .= ', '.$post_img_588[0].' 588w';
                                                            }

                                                            if (strpos($post_img_640[0], '640x')) {

                                                                $post_img_srcset .= ', '.$post_img_640[0].' 640w';
                                                            }

                                                            if (strpos($post_img_960[0], '960x')) {
                                                                $post_img_srcset .= ', '.$post_img_960[0].' 960w';
                                                            }

                                                            if ($post_type == "masonry1" || $post_type == "masonry2") {
                                                                $thumb_size = 'full';
                                                            }

                                                            if (empty($post_img_srcset) || $post_type == "masonry1" || $post_type == "masonry2") {
                                                                $post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
                                                                $post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
                                                            }

                                                            $post_img_attr['srcset'] = $post_img_srcset;
                                                            $post_img_attr['sizes']  = $post_img_sizes;

												            $output .= wp_get_attachment_image($image_id, $thumb_size,false,$post_img_attr);
														}
													}
												$output .='</div>';
											$output .='</a>';

										}

									$output .='</div>';
									$output .='<div class="post-body et-clearfix">';
										$output .='<div class="post-body-inner-wrap">';
											$output .='<div class="post-body-inner">';
					        					$output .='<h4 class="post-title">';
					        						$output .='<a href="'.get_the_permalink().'" title="'.esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title().'">'.get_the_title().'</a>';
												$output .='</h4>';
												if ( get_option( 'woocommerce_enable_review_rating' ) != 'no' ) {
													$output .= wc_get_rating_html( $product->get_average_rating() );
												}
												if ( $price_html = $product->get_price_html() ){
													$output .= '<span class="price">'.$price_html.'</span>';
												}

												$post_type  = ($product->is_type( 'variable' )) ? "variable" : "simple";
                                                $product_class = 'button add_to_cart_button product-loop-button';
                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes" && $post_type == "simple" && $product->get_stock_status() != "outofstock"){
                                                    $product_class .=' ajax_add_to_cart';
                                                }

                                                $output .= apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                    sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" data-post_type="%s" data-product_status="%s" class="%s" title="%s" >%s</a>',
                                                        esc_url( $product->add_to_cart_url() ),
                                                        esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                                        esc_attr( $product->get_id() ),
                                                        esc_attr( $product->get_sku() ),
                                                        esc_attr( $post_type ),
                                                        esc_attr( $product->get_stock_status() ),
                                                        esc_attr( $product_class ),
                                                        esc_html( $product->add_to_cart_text() ),
                                                        esc_html( $product->add_to_cart_text() )
                                                    ),
                                                $product );

                                                if(get_option( 'woocommerce_enable_ajax_add_to_cart' ) === "yes"){
                                                    $output .= '<div class="ajax-add-to-cart-loading"><div class="circle-loader"><div class="checkmark draw"></div></div></div>';
                                                }

											$output .='</div>';
										$output .='</div>';
									$output .='</div>';

								$output .='</div>';

							$output .='</li>';

						endwhile;
					$output .='</ul>';
				$output .='</div>';

				$id_counter++;

				return $output;

				wp_reset_postdata();

			} else {
				goodresto_enovathemes_not_found('product');
			}

		} else {
			return '<div class="alert error"><div class="alert-message">'.esc_html__("Woocommerce plugin is not installed/active, please install/activate Woocommerce plugin", "enovathemes-addons").'</div></div>';
		}

	}
	add_shortcode('et_product_category', 'et_product_category');

/*  woocommerce product categories
/*------------*/

	function et_product_categories($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'product_animation_effect' => 'none',
				'post_size'				   => 'small',
				'orderby'  				   => 'date',
				'order'    				   => 'desc',
				'category' 				   => '',
			), $atts)
		);

		$output  = '';

		if (class_exists('Woocommerce')){

			global $post, $goodresto_enovathemes;

			static $id_counter = 1;

			$categories = array_filter( array_map( 'trim', explode( ',', $category ) ) );

			$args = array(
				'orderby'    => $orderby,
				'order'      => $order,
				'include'    => $categories,
				'pad_counts' => true,
				'taxonomy'   => 'product_cat',
			    'hide_empty' => true, 
			);

			$product_categories = get_terms($args );

			ob_start();

			if($product_categories){

				$columns = 1;

				$product_image_effect     = (isset($GLOBALS['goodresto_enovathemes']['product-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['product-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['product-image-effect'] : "overlay-none";
                
				$class = 'product-categories-layout shortcode-product-layout';
				$class .= ' gridify';
				$class .= ' post-size-'.$post_size;
				$class .= ' grid';
				$class .= ' filter-false';

				if ($product_animation_effect == "none") {
					$class .= ' lazy lazy-load';
				}

			    $thumb_size             = 'goodresto_384X384';
                $post_img_attr          = array();
                $post_img_sizes         = '100vw';
                $post_img_default_size  = $post_img_sizes;

		    	switch ($post_size) {
		            case 'small' :
		                $columns = 4;
		                break;
		            case 'medium':
		                $columns = 3;
		                break;
		            case 'large':
		                $columns = 2;
		                break;
		        }

		        foreach ( $product_categories as $product_category ) {
					wc_get_template( 'content-product_cat.php', array(
						'category' => $product_category,
					) );
				}

				$output .='<div class="'.esc_attr($class).'">';
					$output .='<ul id="lloop-product-category-'.$id_counter.'" data-columns="'.$columns.'" class="loop-posts loop-product loop-product-category gridify product-categories woocoomerce-product-shortcode effect-'.esc_attr($product_animation_effect).' '.$product_image_effect.' filter-false et-item-set et-clearfix">';
						$output .= ob_get_clean();
					$output .='</ul>';
				$output .='</div>';

				$id_counter++;

				return $output;

			}

			woocommerce_reset_loop();

		} else {
			return '<div class="alert error"><div class="alert-message">'.esc_html__("Woocommerce plugin is not installed/active, please install/activate Woocommerce plugin", "enovathemes-addons").'</div></div>';
		}

	}
	add_shortcode('et_product_categories', 'et_product_categories');

/*  Add elements to TinyMCE
/*------------*/

	add_action('admin_head', 'enovathemes_addons_add_tinymce_button');

	function enovathemes_addons_register_tinymce_plugins($buttons) {  
		array_push($buttons,
			'et_cart',
			'et_gap',
			'et_gap_inline',
			'et_row',
			'et_column',
			'et_highlight',
			'et_dropcap',
			'et_separator',
			'et_separator_dottes',
			'et_separator_decorative',
			'et_icon'
		);  
		return $buttons;  
	}

	function enovathemes_addons_add_tinymce_plugins($plugin_array) {
	   $plugin_array['et_cart']      = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['et_gap']       = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['et_gap_inline'] = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['et_row']    = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['et_column']    = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['et_highlight'] = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['et_dropcap'] = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['et_separator'] = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['et_separator_dottes'] = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['et_separator_decorative'] = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   $plugin_array['et_icon'] = plugin_dir_url( __FILE__ ).'tinymce/plugins.js';
	   return $plugin_array;
	}

	function enovathemes_addons_add_tinymce_button() { 
		if(!current_user_can('edit_posts') && !current_user_can('edit_pages') ) {return;}
		if (get_user_option('rich_editing') == 'true') {
			add_filter("mce_external_plugins", "enovathemes_addons_add_tinymce_plugins");
			add_filter('mce_buttons', 'enovathemes_addons_register_tinymce_plugins');
		}
	}

?>