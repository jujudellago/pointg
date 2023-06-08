<?php

	goodresto_enovathemes_global_variables();

	$et_one_page_nav   = (isset($GLOBALS['goodresto_enovathemes']['one-page-navigation']) && !empty($GLOBALS['goodresto_enovathemes']['one-page-navigation'])) ? $GLOBALS['goodresto_enovathemes']['one-page-navigation'] : 'none';
	$header_class      = "header desk one-page-".$et_one_page_nav;
	$mob_header_class  = "header-mobile one-page-".$et_one_page_nav;
	$fullscreen_class  = "fullscreen-bar";
	$sidebar_class     = "sidebar-nav one-page-".$et_one_page_nav;
	$et_navigation     = "default";
	$et_booking        = (isset($GLOBALS['goodresto_enovathemes']['booking']) && $GLOBALS['goodresto_enovathemes']['booking'] == 1) ? "true" : "false";
	$et_working_hours  = (isset($GLOBALS['goodresto_enovathemes']['working-hours']) && $GLOBALS['goodresto_enovathemes']['working-hours'] == 1) ? "true" : "false";


	if (is_page()) {
		$values           = get_post_custom( get_the_ID() );
		$et_rev_slider    = (isset($values["rev_slider"][0])) ? $values["rev_slider"][0] : "";
    	$one_page         = isset( $values['one_page'][0] ) ? $values["one_page"][0] : "false";

		if (!empty($et_rev_slider)) {
			$header_class .= " slider-active";
		} else {
			$header_class .= " slider-inactive";
		}

		if ($one_page == 'true') {
			$header_class .= " one-page-active";
		}
	}

	// Logo

		$et_logo   = (isset($GLOBALS['goodresto_enovathemes']['logo']['url']) && !empty($GLOBALS['goodresto_enovathemes']['logo']['url'])) ? esc_url($GLOBALS['goodresto_enovathemes']['logo']['url']) : "";
		$et_logo_w = (isset($GLOBALS['goodresto_enovathemes']['logo']['url']) && !empty($GLOBALS['goodresto_enovathemes']['logo']['url'])) ? $GLOBALS['goodresto_enovathemes']['logo']['width']: "";
		$et_logo_h = (isset($GLOBALS['goodresto_enovathemes']['logo']['url']) && !empty($GLOBALS['goodresto_enovathemes']['logo']['url'])) ? $GLOBALS['goodresto_enovathemes']['logo']['height'] : "";
		if (isset($GLOBALS['goodresto_enovathemes']['logo-retina']['url']) && !empty($GLOBALS['goodresto_enovathemes']['logo-retina']['url'])) 
		{$et_logo = esc_url($GLOBALS['goodresto_enovathemes']['logo-retina']['url']);}

		$et_logo_fixed   = (isset($GLOBALS['goodresto_enovathemes']['logo-fixed']['url']) && !empty($GLOBALS['goodresto_enovathemes']['logo-fixed']['url'])) ? esc_url($GLOBALS['goodresto_enovathemes']['logo-fixed']['url']) : $et_logo;
		$et_logo_fixed_w = (isset($GLOBALS['goodresto_enovathemes']['logo-fixed']['url']) && !empty($GLOBALS['goodresto_enovathemes']['logo-fixed']['url'])) ? $GLOBALS['goodresto_enovathemes']['logo-fixed']['width']: $et_logo_w;
		$et_logo_fixed_h = (isset($GLOBALS['goodresto_enovathemes']['logo-fixed']['url']) && !empty($GLOBALS['goodresto_enovathemes']['logo-fixed']['url'])) ? $GLOBALS['goodresto_enovathemes']['logo-fixed']['height'] : $et_logo_h;
		if (isset($GLOBALS['goodresto_enovathemes']['logo-fixed-retina']['url']) && !empty($GLOBALS['goodresto_enovathemes']['logo-fixed-retina']['url'])) 
		{$et_logo_fixed = esc_url($GLOBALS['goodresto_enovathemes']['logo-fixed-retina']['url']);}
		
		$et_mob_logo       = (isset($GLOBALS['goodresto_enovathemes']['logo-mobile']['url']) && !empty($GLOBALS['goodresto_enovathemes']['logo-mobile']['url'])) ? esc_url($GLOBALS['goodresto_enovathemes']['logo-mobile']['url']) : $et_logo;
		$et_mob_logo_w     = (isset($GLOBALS['goodresto_enovathemes']['logo-mobile']['url']) && !empty($GLOBALS['goodresto_enovathemes']['logo-mobile']['url'])) ? $GLOBALS['goodresto_enovathemes']['logo-mobile']['width'] : $et_logo_w;
		$et_mob_logo_h     = (isset($GLOBALS['goodresto_enovathemes']['logo-mobile']['url']) && !empty($GLOBALS['goodresto_enovathemes']['logo-mobile']['url'])) ? $GLOBALS['goodresto_enovathemes']['logo-mobile']['height'] : $et_logo_h;
		if (isset($GLOBALS['goodresto_enovathemes']['logo-mobile-retina']['url']) && !empty($GLOBALS['goodresto_enovathemes']['logo-mobile-retina']['url']))
		{$et_mob_logo = esc_url($GLOBALS['goodresto_enovathemes']['logo-mobile-retina']['url']);}

	// Quick Styles
	
		$et_transparent_header    = (isset($GLOBALS['goodresto_enovathemes']['transparent-header']) && $GLOBALS['goodresto_enovathemes']['transparent-header'] == 1) ? "true" : "false";
		$et_boxed_header          = (isset($GLOBALS['goodresto_enovathemes']['boxed-header']) && $GLOBALS['goodresto_enovathemes']['boxed-header'] == 1) ? "true" : "false";
		$et_sticky_header         = (isset($GLOBALS['goodresto_enovathemes']['sticky-header']) && $GLOBALS['goodresto_enovathemes']['sticky-header'] == 1) ? "true" : "false";
		$et_full_header           = (isset($GLOBALS['goodresto_enovathemes']['full-header']) && $GLOBALS['goodresto_enovathemes']['full-header'] == 1) ? "true" : "false";
		$et_logo_position         = (isset($GLOBALS['goodresto_enovathemes']['logo-position']) && !empty($GLOBALS['goodresto_enovathemes']['logo-position'])) ? $GLOBALS['goodresto_enovathemes']['logo-position'] : "left";
		$et_menu_under_logo       = (isset($GLOBALS['goodresto_enovathemes']['menu-under-logo']) && $GLOBALS['goodresto_enovathemes']['menu-under-logo'] == 1) ? "true" : "false";
		$et_menu_under_logo_boxed = (isset($GLOBALS['goodresto_enovathemes']['menu-under-logo-boxed']) && $GLOBALS['goodresto_enovathemes']['menu-under-logo-boxed'] == 1) ? "true" : "false";
		$et_menu_under_logo_icons = (isset($GLOBALS['goodresto_enovathemes']['menu-under-logo-icons']) && $GLOBALS['goodresto_enovathemes']['menu-under-logo-icons'] == 1) ? "true" : "false";

		$et_header_under_slider = (isset($GLOBALS['goodresto_enovathemes']['header-under-slider']) && $GLOBALS['goodresto_enovathemes']['header-under-slider'] == 1) ? "true" : "false";
		
	// Header top

		$et_header_top               = (isset($GLOBALS['goodresto_enovathemes']['header-top']) && $GLOBALS['goodresto_enovathemes']['header-top'] == 1) ? "true" : "false";
		$et_mob_header_top           = (isset($GLOBALS['goodresto_enovathemes']['mob-header-top']) && $GLOBALS['goodresto_enovathemes']['mob-header-top'] == 1) ? "true" : "false";
		$et_header_top_social_links  = (isset($GLOBALS['goodresto_enovathemes']['header-top-social-links']) && $GLOBALS['goodresto_enovathemes']['header-top-social-links'] == 1) ? "true" : "false";
	
	// Header & Menu

		$et_no_logo                     = (isset($GLOBALS['goodresto_enovathemes']['no-logo']) && $GLOBALS['goodresto_enovathemes']['no-logo'] == 1) ? "true" : "false";
		$et_menu_position               = (isset($GLOBALS['goodresto_enovathemes']['menu-position']) && !empty($GLOBALS['goodresto_enovathemes']['menu-position'])) ? $GLOBALS['goodresto_enovathemes']['menu-position'] : "left";
		$et_border_box            	    = (isset($GLOBALS['goodresto_enovathemes']['border-box']) && $GLOBALS['goodresto_enovathemes']['border-box'] == 1) ? "true" : "false";
		$et_header_search            	= (isset($GLOBALS['goodresto_enovathemes']['header-search']) && $GLOBALS['goodresto_enovathemes']['header-search'] == 1) ? "true" : "false";
		$et_header_social_links         = (isset($GLOBALS['goodresto_enovathemes']['header-social-links']) && $GLOBALS['goodresto_enovathemes']['header-social-links'] == 1) ? "true" : "false";
		$et_header_shop_cart         	= (isset($GLOBALS['goodresto_enovathemes']['header-shop-cart']) && $GLOBALS['goodresto_enovathemes']['header-shop-cart'] == 1) ? "true" : "false";
		$et_language_switcher        	= (isset($GLOBALS['goodresto_enovathemes']['language-switcher']) && !empty($GLOBALS['goodresto_enovathemes']['language-switcher'])) ? "true" : "false";
		$et_header_menu_effect       	= (isset($GLOBALS['goodresto_enovathemes']['header-menu-effect']) && !empty($GLOBALS['goodresto_enovathemes']['header-menu-effect'])) ? $GLOBALS['goodresto_enovathemes']['header-menu-effect'] : "underline";
		$et_header_submenu_effect    	= (isset($GLOBALS['goodresto_enovathemes']['header-submenu-effect']) && !empty($GLOBALS['goodresto_enovathemes']['header-submenu-effect'])) ? $GLOBALS['goodresto_enovathemes']['header-submenu-effect'] : "ghost";
		$et_header_submenu_hover_effect = (isset($GLOBALS['goodresto_enovathemes']['header-submenu-hover-effect']) && !empty($GLOBALS['goodresto_enovathemes']['header-submenu-hover-effect'])) ? $GLOBALS['goodresto_enovathemes']['header-submenu-hover-effect'] : "none";
		$header_height                  = (isset($GLOBALS['goodresto_enovathemes']['header-height']) && $GLOBALS['goodresto_enovathemes']['header-height']) ? $GLOBALS['goodresto_enovathemes']['header-height'] : '80';
		$sticky_header_height           = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-height']) && $GLOBALS['goodresto_enovathemes']['sticky-header-height']) ? $GLOBALS['goodresto_enovathemes']['sticky-header-height'] : $header_height;

		$element_wrap_start = '';
		$element_wrap_end   = '';

		if ($et_menu_position == "center" && $et_no_logo == "true") {
			$element_wrap_start = '<div class="header-elements-wrapper et-clearfix">';
			$element_wrap_end   = '</div>';
		}

	// Sidebar

		$et_sidebar 		 = (isset($GLOBALS['goodresto_enovathemes']['sidebar']) && $GLOBALS['goodresto_enovathemes']['sidebar'] == 1) ? "true" : "false";

	// Sidebar navigation

		$et_sidebar_navigation = (isset($GLOBALS['goodresto_enovathemes']['sidebar-navigation']) && $GLOBALS['goodresto_enovathemes']['sidebar-navigation'] == 1) ? "true" : "false";
	    $et_sidebar_logo       = (isset($GLOBALS['goodresto_enovathemes']['sidebar-logo']['url']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-logo']['url'])) ? esc_url($GLOBALS['goodresto_enovathemes']['sidebar-logo']['url']) : "";
		$et_sidebar_logo_w     = (isset($GLOBALS['goodresto_enovathemes']['sidebar-logo']['url']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-logo']['url'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-logo']['width']: "";
		$et_sidebar_logo_h     = (isset($GLOBALS['goodresto_enovathemes']['sidebar-logo']['url']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-logo']['url'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-logo']['height'] : "";
		if (isset($GLOBALS['goodresto_enovathemes']['sidebar-logo-retina']['url']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-logo-retina']['url'])) 
		{$et_sidebar_logo      = esc_url($GLOBALS['goodresto_enovathemes']['sidebar-logo-retina']['url']);}

	    $et_sidebar_submenu_effect = (isset($GLOBALS['goodresto_enovathemes']['sidebar-submenu-effect']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-submenu-effect'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-submenu-effect'] : "ghost";
	    $et_sidebar_position  	   = (isset($GLOBALS['goodresto_enovathemes']['sidebar-position']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-position'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-position'] : "left";
	    $et_sidebar_alignment 	   = (isset($GLOBALS['goodresto_enovathemes']['sidebar-alignment']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-alignment'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-alignment'] : "center";
	    $et_sidebar_menu_vertical  = (isset($GLOBALS['goodresto_enovathemes']['sidebar-menu-vertical']) && $GLOBALS['goodresto_enovathemes']['sidebar-menu-vertical'] == 1) ? "true" : "false";

	// Fullscreen navigation

		$et_fullscreen_navigation           = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-navigation']) && $GLOBALS['goodresto_enovathemes']['fullscreen-navigation'] == 1) ? "true" : "false";
	    $et_fullscreen_transparent          = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-transparent']) && $GLOBALS['goodresto_enovathemes']['fullscreen-transparent'] == 1) ? "true" : "false";
	    $et_fullscreen_sticky               = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-sticky']) && $GLOBALS['goodresto_enovathemes']['fullscreen-sticky'] == 1) ? "true" : "false";
		$et_fullscreen_full_header          = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-full-header']) && $GLOBALS['goodresto_enovathemes']['fullscreen-full-header'] == 1) ? "true" : "false";
		$et_fullscreen_logo_position        = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-logo-position']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-logo-position'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-logo-position'] : "left";
		$et_fullscreen_search               = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-search']) && $GLOBALS['goodresto_enovathemes']['fullscreen-search'] == 1) ? "true" : "false";
		$et_fullscreen_social_links         = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-social-links']) && $GLOBALS['goodresto_enovathemes']['fullscreen-social-links'] == 1) ? "true" : "false";
		$et_fullscreen_language_switcher    = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-language-switcher']) && $GLOBALS['goodresto_enovathemes']['fullscreen-language-switcher'] == 1) ? "true" : "false";
		$et_fullscreen_header_icons_version = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-header-icons-version']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-header-icons-version'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-header-icons-version'] : "dark";
		$et_fullscreen_sticky_icons_version = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-icons-version']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-icons-version'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-sticky-icons-version'] : $et_fullscreen_header_icons_version;
		$et_fullscreen_header_icons_size    = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-header-icons-size']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-header-icons-size'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-header-icons-size'] : "medium";

		$et_fullscreen_logo   = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-logo']['url']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-logo']['url'])) ? esc_url($GLOBALS['goodresto_enovathemes']['fullscreen-logo']['url']) : "";
		$et_fullscreen_logo_w = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-logo']['url']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-logo']['url'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-logo']['width']: "";
		$et_fullscreen_logo_h = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-logo']['url']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-logo']['url'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-logo']['height'] : "";
		if (isset($GLOBALS['goodresto_enovathemes']['fullscreen-logo-retina']['url']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-logo-retina']['url'])) 
		{$et_fullscreen_logo = esc_url($GLOBALS['goodresto_enovathemes']['fullscreen-logo-retina']['url']);}

		if ($et_fullscreen_navigation == "true") {
	    	$et_navigation = "fullscreen";
	    }

		if ($et_sidebar_navigation == "true") {
	    	$et_navigation = "sidebar";
	    }

	    if ($et_sidebar_navigation == "false" && $et_fullscreen_navigation == "false") {
	    	$et_navigation = "default";
	    }

	// Mobile

		$et_mob_header_search        = (isset($GLOBALS['goodresto_enovathemes']['mob-header-search']) && $GLOBALS['goodresto_enovathemes']['mob-header-search'] == 1) ? "true" : "false";
		$et_mob_header_shop_cart     = (isset($GLOBALS['goodresto_enovathemes']['mob-header-shop-cart']) && $GLOBALS['goodresto_enovathemes']['mob-header-shop-cart'] == 1) ? "true" : "false";
		$et_mob_language_switcher    = (isset($GLOBALS['goodresto_enovathemes']['mob-language-switcher']) && !empty($GLOBALS['goodresto_enovathemes']['mob-language-switcher'])) ? "true" : "false";
		$et_mob_header_sidebar       = (isset($GLOBALS['goodresto_enovathemes']['mob-header-sidebar']) && $GLOBALS['goodresto_enovathemes']['mob-header-sidebar'] == 1) ? "true" : "false";
		$et_mob_header_transparent   = (isset($GLOBALS['goodresto_enovathemes']['mob-header-transparent']) && $GLOBALS['goodresto_enovathemes']['mob-header-transparent'] == 1) ? "true" : "false";


	$header_class .=" no-logo-".$et_no_logo;
	$header_class .=" border-box-".$et_border_box;
	$header_class .=" transparent-".$et_transparent_header;
	$header_class .=" boxed-".$et_boxed_header;
	$header_class .=" sticky-".$et_sticky_header;
	$header_class .=" full-".$et_full_header;
	$header_class .=" logopos-".$et_logo_position;
	$header_class .=" menupos-".$et_menu_position;
	$header_class .=" menu-under-logo-".$et_menu_under_logo;
	$header_class .=" menu-under-logo-boxed-".$et_menu_under_logo_boxed;
	$header_class .=" menu-under-logo-icons-".$et_menu_under_logo_icons;
	$header_class .=" header-under-slider-".$et_header_under_slider;
	$header_class .=" top-".$et_header_top;
	$header_class .=" sidebar-".$et_sidebar;
	$header_class .=" top-sl-".$et_header_top_social_links;
	$header_class .=" search-".$et_header_search;
	$header_class .=" social-links-".$et_header_social_links;
	$header_class .=" cart-".$et_header_shop_cart;
	$header_class .=" language-".$et_language_switcher;
	$header_class .=" effect-".$et_header_menu_effect;
	$header_class .=" subeffect-".$et_header_submenu_effect;
	$header_class .=" subeffect-hover-".$et_header_submenu_hover_effect;

	$mob_header_class .=" top-".$et_header_top;
	$mob_header_class .=" sidebar-".$et_sidebar;
	$mob_header_class .=" top-sl-".$et_header_top_social_links;
	$mob_header_class .=" transparent-".$et_mob_header_transparent;
	$mob_header_class .=" no-logo-".$et_no_logo;

	$fullscreen_class .=" transparent-".$et_fullscreen_transparent;
	$fullscreen_class .=" sticky-".$et_fullscreen_sticky;
	$fullscreen_class .=" full-".$et_fullscreen_full_header;
	$fullscreen_class .=" logo-position-".$et_fullscreen_logo_position;
	$fullscreen_class .=" search-".$et_fullscreen_search;
	$fullscreen_class .=" social-".$et_fullscreen_social_links;
	$fullscreen_class .=" cart-".$et_header_shop_cart;
	$fullscreen_class .=" language-".$et_fullscreen_language_switcher;
	$fullscreen_class .=" iversion-".$et_fullscreen_header_icons_version;
	$fullscreen_class .=" isize-".$et_fullscreen_header_icons_size;
	$fullscreen_class .=" siversion-".$et_fullscreen_sticky_icons_version;

	$sidebar_class .=" position-".$et_sidebar_position;
	$sidebar_class .=" alignment-".$et_sidebar_alignment;
	$sidebar_class .=" vertical-".$et_sidebar_menu_vertical;
	$sidebar_class .=" subeffect-".$et_sidebar_submenu_effect;

	$mobarg_main = array( 
		'theme_location' => 'mobile-menu', 
		'depth'          => 4, 
		'container'      => false, 
		'menu_id'        => 'mob-header-menu',
		'link_before'    => '<span class="mi"></span><span class="txt">',
		'link_after'     => '</span><span class="mi et-icon-arrow-down"></span>'
	);

	$mobarg = array( 
		'theme_location' => 'header-menu', 
		'depth'          => 4, 
		'container'      => false, 
		'menu_id'        => 'mob-header-menu',
		'link_before'    => '<span class="mi"></span><span class="txt">',
		'link_after'     => '</span><span class="mi et-icon-arrow-down"></span>'
	);

	$mobarg_1 = array( 
		'theme_location' => 'header-menu-left', 
		'depth'          => 4, 
		'container'      => false, 
		'menu_id'        => 'mob-header-menu',
		'link_before'    => '<span class="mi"></span><span class="txt">',
		'link_after'     => '</span><span class="mi et-icon-arrow-down"></span>'
	);

	$mobarg_2 = array( 
		'theme_location' => 'header-menu-right', 
		'depth'          => 4, 
		'container'      => false, 
		'menu_id'        => 'mob-header-menu',
		'link_before'    => '<span class="mi"></span><span class="txt">',
		'link_after'     => '</span><span class="mi et-icon-arrow-down"></span>'
	);

	$toparg = array( 
		'theme_location' => 'top-menu', 
		'depth'          => 2, 
		'container'      => false, 
		'menu_id'        => 'header-top-menu',
		'link_before'    => '<span class="txt">',
		'link_after'     => '</span><span class="mi et-icon-arrow-down"></span>'
	);

	if ($et_header_menu_effect == 'dottes') {
		$link_after = '</span><span class="dottes"></span><span class="mi et-icon-arrow-down"></span>';
	} else {
		$link_after = '</span><span class="mi et-icon-arrow-down"></span>';
	}

	$headerarg = array( 
		'theme_location' => 'header-menu', 
		'depth'          => 4, 
		'container'      => false, 
		'menu_id'        => 'header-menu',
		'link_before'    => '<span class="txt">',
		'link_after'     => $link_after,
		'walker'         => new et_scm_walker
	);

	$headerarg_1 = array( 
		'theme_location' => 'header-menu-left', 
		'depth'          => 4, 
		'container'      => false, 
		'menu_id'        => 'header-menu-left',
		'link_before'    => '<span class="txt">',
		'link_after'     => $link_after,
		'walker'         => new et_scm_walker
	);

	$headerarg_2 = array( 
		'theme_location' => 'header-menu-right', 
		'depth'          => 4, 
		'container'      => false, 
		'menu_id'        => 'header-menu-right',
		'link_before'    => '<span class="txt">',
		'link_after'     => $link_after,
		'walker'         => new et_scm_walker
	);

	$sidebararg = array( 
		'theme_location' => 'sidebar-menu', 
		'depth'          => 3, 
		'container'      => false, 
		'menu_id'        => 'sidebar-menu',
		'link_before'    => '<span class="txt">',
		'link_after'     => '</span><span class="mi et-icon-arrow-right"></span>',
	);

	$fullscreenarg = array( 
		'theme_location' => 'fullscreen-menu', 
		'depth'          => 3, 
		'container'      => false, 
		'menu_id'        => 'fullscreen-menu',
		'link_before'    => '<span class="txt">',
		'link_after'     => '</span><span class="mi et-icon-arrow-down"></span>',
	);

?>