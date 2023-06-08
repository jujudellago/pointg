<?php
function goodresto_enovathemes_include_dynamic_styles() {
wp_enqueue_style('dynamic-styles', get_parent_theme_file_uri('/css/dynamic-styles.css'));

	goodresto_enovathemes_global_variables();

	if (defined('THEME_PANEL')) {
		theme_panel_demo_configurations_dynamic_styles();
	}

    $dynamic_css          = "";

    if(isset($GLOBALS['goodresto_enovathemes']['custom-css']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css'])){
		$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css'];
	}
  
	if(isset($GLOBALS['goodresto_enovathemes']['font-custom-css']) && !empty($GLOBALS['goodresto_enovathemes']['font-custom-css'])){
		$dynamic_css .= $GLOBALS['goodresto_enovathemes']['font-custom-css'];
	}

	/* Typography
	/*-------------*/

		$et_main_font_size          = (isset($GLOBALS['goodresto_enovathemes']['main-typo']['font-size']) && $GLOBALS['goodresto_enovathemes']['main-typo']['font-size']) ? $GLOBALS['goodresto_enovathemes']['main-typo']['font-size'] : "16px";
		$et_main_font_weight        = (isset($GLOBALS['goodresto_enovathemes']['main-typo']['font-weight']) && $GLOBALS['goodresto_enovathemes']['main-typo']['font-weight']) ? $GLOBALS['goodresto_enovathemes']['main-typo']['font-weight'] : "400";
		$et_main_line_height        = (isset($GLOBALS['goodresto_enovathemes']['main-typo']['line-height']) && $GLOBALS['goodresto_enovathemes']['main-typo']['line-height']) ? $GLOBALS['goodresto_enovathemes']['main-typo']['line-height'] : "28px";
		$et_main_letter_spacing     = (isset($GLOBALS['goodresto_enovathemes']['main-typo']['letter-spacing']) && $GLOBALS['goodresto_enovathemes']['main-typo']['letter-spacing']) ? $GLOBALS['goodresto_enovathemes']['main-typo']['letter-spacing'] : "0.75px";
		$et_main_font_family        = (isset($GLOBALS['goodresto_enovathemes']['main-typo']['font-family']) && $GLOBALS['goodresto_enovathemes']['main-typo']['font-family']) ? $GLOBALS['goodresto_enovathemes']['main-typo']['font-family'] : "Raleway, sans-serif";
		$et_main_color              = (isset($GLOBALS['goodresto_enovathemes']['main-typo']['color']) && $GLOBALS['goodresto_enovathemes']['main-typo']['color']) ? $GLOBALS['goodresto_enovathemes']['main-typo']['color'] : "#616161";
		$et_headings_font_family    = (isset($GLOBALS['goodresto_enovathemes']['headings-typo']['font-family']) && $GLOBALS['goodresto_enovathemes']['headings-typo']['font-family']) ? $GLOBALS['goodresto_enovathemes']['headings-typo']['font-family'] : "'Cabin Condensed', sans-serif";
		$et_headings_font_weight    = (isset($GLOBALS['goodresto_enovathemes']['headings-typo']['font-weight']) && $GLOBALS['goodresto_enovathemes']['headings-typo']['font-weight']) ? $GLOBALS['goodresto_enovathemes']['headings-typo']['font-weight'] : '400';
		$et_headings_text_transform = (isset($GLOBALS['goodresto_enovathemes']['headings-typo']['text-transform']) && $GLOBALS['goodresto_enovathemes']['headings-typo']['text-transform']) ? $GLOBALS['goodresto_enovathemes']['headings-typo']['text-transform'] : "none";
		$et_headings_letter_spacing = (isset($GLOBALS['goodresto_enovathemes']['headings-typo']['letter-spacing']) && $GLOBALS['goodresto_enovathemes']['headings-typo']['letter-spacing']) ? $GLOBALS['goodresto_enovathemes']['headings-typo']['letter-spacing'] : "1px";
		$et_headings_color          = (isset($GLOBALS['goodresto_enovathemes']['headings-typo']['color']) && $GLOBALS['goodresto_enovathemes']['headings-typo']['color']) ? $GLOBALS['goodresto_enovathemes']['headings-typo']['color'] : "#212121";
		$et_h1_font_size            = (isset($GLOBALS['goodresto_enovathemes']['h1-typo']['font-size']) && $GLOBALS['goodresto_enovathemes']['h1-typo']['font-size']) ? $GLOBALS['goodresto_enovathemes']['h1-typo']['font-size'] : "50px";
		$et_h1_line_height          = (isset($GLOBALS['goodresto_enovathemes']['h1-typo']['line-height']) && $GLOBALS['goodresto_enovathemes']['h1-typo']['line-height']) ? $GLOBALS['goodresto_enovathemes']['h1-typo']['line-height'] : "60px";
		$et_h2_font_size            = (isset($GLOBALS['goodresto_enovathemes']['h2-typo']['font-size']) && $GLOBALS['goodresto_enovathemes']['h2-typo']['font-size']) ? $GLOBALS['goodresto_enovathemes']['h2-typo']['font-size'] : "40px";
		$et_h2_line_height          = (isset($GLOBALS['goodresto_enovathemes']['h2-typo']['line-height']) && $GLOBALS['goodresto_enovathemes']['h2-typo']['line-height']) ? $GLOBALS['goodresto_enovathemes']['h2-typo']['line-height'] : "50px";
		$et_h3_font_size            = (isset($GLOBALS['goodresto_enovathemes']['h3-typo']['font-size']) && $GLOBALS['goodresto_enovathemes']['h3-typo']['font-size']) ? $GLOBALS['goodresto_enovathemes']['h3-typo']['font-size'] : "30px";
		$et_h3_line_height          = (isset($GLOBALS['goodresto_enovathemes']['h3-typo']['line-height']) && $GLOBALS['goodresto_enovathemes']['h3-typo']['line-height']) ? $GLOBALS['goodresto_enovathemes']['h3-typo']['line-height'] : "40px";
		$et_h4_font_size            = (isset($GLOBALS['goodresto_enovathemes']['h4-typo']['font-size']) && $GLOBALS['goodresto_enovathemes']['h4-typo']['font-size']) ? $GLOBALS['goodresto_enovathemes']['h4-typo']['font-size'] : "24px";
		$et_h4_line_height          = (isset($GLOBALS['goodresto_enovathemes']['h4-typo']['line-height']) && $GLOBALS['goodresto_enovathemes']['h4-typo']['line-height']) ? $GLOBALS['goodresto_enovathemes']['h4-typo']['line-height'] : "34px";
		$et_h5_font_size            = (isset($GLOBALS['goodresto_enovathemes']['h5-typo']['font-size']) && $GLOBALS['goodresto_enovathemes']['h5-typo']['font-size']) ? $GLOBALS['goodresto_enovathemes']['h5-typo']['font-size'] : "18px";
		$et_h5_line_height          = (isset($GLOBALS['goodresto_enovathemes']['h5-typo']['line-height']) && $GLOBALS['goodresto_enovathemes']['h5-typo']['line-height']) ? $GLOBALS['goodresto_enovathemes']['h5-typo']['line-height'] : "28px";
		$et_h6_font_size            = (isset($GLOBALS['goodresto_enovathemes']['h6-typo']['font-size']) && $GLOBALS['goodresto_enovathemes']['h6-typo']['font-size']) ? $GLOBALS['goodresto_enovathemes']['h6-typo']['font-size'] : "16px";
		$et_h6_line_height          = (isset($GLOBALS['goodresto_enovathemes']['h6-typo']['line-height']) && $GLOBALS['goodresto_enovathemes']['h6-typo']['line-height']) ? $GLOBALS['goodresto_enovathemes']['h6-typo']['line-height'] : "26px";

		$dynamic_css .='body,input,select,pre,code,kbd,samp,dt,#cancel-comment-reply-link,.box-item-content, textarea, .widget_price_filter .price_label {
			font-size: '.$et_main_font_size.';
			font-weight: '.$et_main_font_weight.';
			font-family:'.$et_main_font_family.';
			line-height: '.$et_main_line_height.';
			letter-spacing: '.$et_main_letter_spacing.';
			color:'.$et_main_color.';
		}';

		$dynamic_css .='.widget_et_recent_entries .post-title {
			font-family:'.$et_main_font_family.';
		}';

		$dynamic_css .='.widget_twitter .tweet-time, 
		.widget_rss ul li a,
		.widget_icl_lang_sel_widget li a,
		.recentcomments a,
		.widget_product_search form button:before,
		.page-content-wrap .widget_shopping_cart .cart_list li .remove {
			color:'.$et_main_color.' !important;
		}';

		$dynamic_css .='.post-tags-single a:after {
			background-color:'.$et_main_color.' !important;
		}';

		$dynamic_css .='h1,h2,h3,h4,h5,h6, 
		.woocommerce-page #et-content .shop_table .product-name > a:not(.yith-wcqv-button),
		.woocommerce-Tabs-panel .shop_attributes th,
		#reply-title,
		.product .summary .price,
		.widget_products .product_list_widget > li .product-title,
		.widget_recently_viewed_products .product_list_widget > li .product-title,
		.widget_recent_reviews .product_list_widget > li .product-title,
		.widget_top_rated_products .product_list_widget > li .product-title,
		.widget_recent_reviews .product_list_widget a,
		.et-circle-progress .percent,
		.et-timer .timer-count,
		.pricing-currency,
		.pricing-price,
		.et-schedule,
		.followers-label {
			font-family:'.$et_headings_font_family.';
			text-transform: '.$et_headings_text_transform.';
			font-weight: '.$et_headings_font_weight.';
			letter-spacing: '.$et_headings_letter_spacing.';
			color:'.$et_headings_color.';
		}';

		$dynamic_css .='.woocommerce-page #et-content .shop_table .product-name > a:not(.yith-wcqv-button),
		.widget_et_recent_entries .post-title a,
		.widget_recent_reviews .product_list_widget a,
		.woocommerce-tabs .tabs li a,
		.widget_categories ul li a,
		.widget_pages ul li a,
		.widget_archive ul li a,
		.widget_meta ul li a,
		.widget_layered_nav ul li a,
		.widget_nav_menu ul li a,
		.widget_product_categories ul li a,
		.widget_recent_entries ul li a {
			color:'.$et_headings_color.' !important;
		}';

		$dynamic_css .='.page-content-wrap .widget_shopping_cart .cart-product-title a,
		.et-circle-progress .percent {
			color:'.$et_headings_color.';
		}';

		$dynamic_css .='h1 {font-size: '.$et_h1_font_size.'; line-height: '.$et_h1_line_height.';}';
		$dynamic_css .='h2 {font-size: '.$et_h2_font_size.'; line-height: '.$et_h2_line_height.';}';
		$dynamic_css .='h3 {font-size: '.$et_h3_font_size.'; line-height: '.$et_h3_line_height.';}';
		$dynamic_css .='h4 {font-size: '.$et_h4_font_size.'; line-height: '.$et_h4_line_height.';}';
		$dynamic_css .='h5 {font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';}';
		$dynamic_css .='h6 {font-size: '.$et_h6_font_size.'; line-height: '.$et_h6_line_height.';}';

		$dynamic_css .='.woocommerce-Tabs-panel h2
		{font-size: '.$et_h6_font_size.'; line-height: '.$et_h6_line_height.';}';

		$dynamic_css .='.widget_products .product_list_widget > li .product-title,
		.widget_recently_viewed_products .product_list_widget > li .product-title,
		.widget_recent_reviews .product_list_widget > li .product-title,
		.widget_top_rated_products .product_list_widget > li .product-title,
		.shop_table .product-name > a:not(.yith-wcqv-button),
		.widget_shopping_cart .cart-product-title,
		.widget_categories ul li a, 
		.widget_pages ul li a, 
		.widget_archive ul li a, 
		.widget_meta ul li a, 
		.widget_layered_nav ul li a, 
		.widget_nav_menu ul li a, 
		.widget_product_categories ul li a,
		.widget_recent_reviews .product_list_widget a {
			font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';
		}';

		$dynamic_css .='#reply-title,.woocommerce h2,
		.working-hours-title h6
		{font-size: '.$et_h4_font_size.'; line-height: '.$et_h4_line_height.';}';

		$dynamic_css .='.et-circle-progress .percent,
		.et-timer .timer-count
		{font-size: '.$et_h1_font_size.'; line-height: '.$et_h1_line_height.';}';

		$dynamic_css .='.enovathemes-navigation li,
		.grid #loop-posts .post .post-category,
		.masonry1 #loop-posts .post .post-category,
		.grid .recent-posts .post .post-category,
		.masonry1 .recent-posts .post .post-category,
		.carousel .recent-posts .post .post-category,
		.related-posts .post .post-category,
		.post-meta,
		.widget_et_recent_entries .post-date,
		#related-posts .post-date-inline,
		.post-single-navigation a,
		.event-date-time,
		.event-date,
		.enovathemes-filter .filter,
		.event-status,
		.single-event-navigation-link,
		.menu-price,
		.menu-label,
		.product-status,
		.product .price,
		.overlay-hover .product-quick-view,
		.woocommerce-tabs .tabs li a,
		.summary .out-of-stock,
		.summary .in-stock,
		.product .summary table.variations label,
		.product_meta,
		th,
		.woocommerce-MyAccount-navigation ul li a,
		.woocommerce-mini-cart__total,
		.widget_categories ul li a, 
		.widget_pages ul li a, 
		.widget_archive ul li a, 
		.widget_meta ul li a, 
		.widget_layered_nav ul li a, 
		.widget_nav_menu ul li a, 
		.widget_product_categories ul li a,
		.feed-item-likes,
		.feed-item-comments,
		.person-subtitle,
		.pricing-label {
			font-family:'.$et_headings_font_family.';
		}';

	/* General
	/*-------------*/

		/* Colors
		/*-------------*/

			/* Main/Highlight color
			/*-------------*/

				$main_color      = (isset($GLOBALS['goodresto_enovathemes']['main-color']) && $GLOBALS['goodresto_enovathemes']['main-color']) ? $GLOBALS['goodresto_enovathemes']['main-color'] : '#d3a471';
				$highlight_color = (isset($GLOBALS['goodresto_enovathemes']['highlight-color']) && $GLOBALS['goodresto_enovathemes']['highlight-color']) ? $GLOBALS['goodresto_enovathemes']['highlight-color'] : '#6c1812';

				$dynamic_css .='#loop-posts .post-title:hover,
				#loop-posts .post-title a:hover,
				.recent-posts .post-title:hover,
				.recent-posts .post-title a:hover,
				.loop-product .post-title:hover,
				.loop-product .post-title a:hover,
				.post-social-share > .social-links > a:hover,
				.related-posts .post .post-title a:hover,
				.event-layout .event .post-body .post-title a:hover,
				.event-layout .event .event-category a:hover,
				.widget_twitter li:before,
				.widget_recent_comments li:before,
				.product .summary .price ins,
				.page-content-wrap .widget_shopping_cart .cart-product-title a:hover,
				.page-content-wrap .widget_shopping_cart .cart-product-title:hover a,
				.widget_products .product_list_widget > li > a:hover .product-title,
				.widget_recently_viewed_products .product_list_widget > li > a:hover .product-title,
				.widget_recent_reviews .product_list_widget > li > a:hover .product-title,
				.widget_top_rated_products .product_list_widget > li > a:hover .product-title,
				.search-posts .post-title a:hover,
				.search-posts .post-title:hover a,
				.et-testimonial-item .rating span,
				.post-read-more,
				.comment-reply-link,
				.wp-caption-text, .gallery-caption,
				.event-booking-alert,
				.et-booking-alert,
				.enovathemes-filter .filter,
				.product-loop-button,
				.added_to_cart,
				.star-rating,
				.comment-form-rating a,
				.comment-form-rating a:after,
				.product .summary table.variations label,
				.woo-cart-toggle:hover,
				.et-booking-toggle:hover,
				.et-working-hours-toggle:hover,
				.woo-cart-title,
				.et-booking-title,
				.working-hours-title h6,
				.feed-item-likes,
				.feed-item-comments,
				.et-person .person-title,
				.et-person .social-links a:hover,
				.simple.loop-posts .post-title a {
					color: '.$main_color.';
				}';

				$dynamic_css .='.post-meta a:hover,
				.event-meta ul a:not(.social-share):hover,
				.post-tags-single a:hover,
				.widget_et_recent_entries .post-title:hover a,
				.widget_et_recent_entries .post-date a:hover,
				.widget_twitter .tweet-time:hover,
				.widget_categories ul li a:hover,
				.widget_pages ul li a:hover,
				.widget_archive ul li a:hover,
				.widget_meta ul li a:hover,
				.widget_layered_nav ul li a:hover,
				.widget_nav_menu ul li a:hover,
				.widget_product_categories ul li a:hover,
				.widget_recent_entries ul li a:hover, 
				.widget_rss ul li a:hover,
				.widget_icl_lang_sel_widget li a:hover,
				.recentcomments a:hover,
				.woocommerce-tabs .tabs li a:hover,
				.woocommerce-tabs .tabs li.active a,
				#yith-quick-view-close:hover,
				.page-content-wrap .widget_shopping_cart .cart_list li .remove:hover,
				.woocommerce-page #et-content .shop_table .product-name > a:not(.yith-wcqv-button):hover,
				.et-timer .timer-count {
					color: '.$main_color.' !important;
				}';

				$dynamic_css .='.enovathemes-navigation li a:hover,
				.enovathemes-navigation li .current,
				.post-sticky,
				.post-media .flex-direction-nav li a:hover,
				.post-media .flex-control-nav li a:hover,
				.post-media .flex-control-nav li a.flex-active,
				.slick-dots li button:hover,
				.slick-dots li.slick-active button,
				.owl-carousel .owl-nav > *:hover,
				.enovathemes-filter .filter:before,
				.overlay-flip-hor .overlay-hover .post-image-overlay, 
				.overlay-flip-ver .overlay-hover .post-image-overlay,
				.image-move-up .post-image-overlay,
				.image-move-down .post-image-overlay,
				.image-move-left .post-image-overlay,
				.image-move-right .post-image-overlay,
				.overlay-image-move-up .post-image-overlay,
				.overlay-image-move-down .post-image-overlay,
				.overlay-image-move-left .post-image-overlay,
				.overlay-image-move-right .post-image-overlay,
				.product .onsale,
				.product .product-status,
				.product-quick-view:hover,
				.woocommerce-store-notice.demo_store,
				.shop_table .product-remove a:hover,
				.et-accordion .toggle-title.active,
				.tabset .tab.active,
				.et-mailchimp input[type="text"] + .after,
				.owl-carousel .owl-dots > .owl-dot.active,
				.popup-banner-toggle,
				.pricing-label,
				.pricing-footer .et-button:hover,
				.mob-menu-toggle-alt,
				.post-read-more:after,
				.comment-reply-link:after,
				.comment-list ul.children .comment:before,
				.event-booking-respond-message,
				.et-booking-respond-message,
				.product-loop-button:after,
				.added_to_cart:after,
				.product .summary .single_variation_wrap:before,
				.woocommerce-info a,
				.widget_nav_menu ul li a + ul li:before, 
				.widget_product_categories ul li a + ul li:before, 
				.desk-menu > ul > [data-mm="true"] .sub-menu .widget_nav_menu ul li a + ul li:before, 
				.desk-menu > ul > [data-mm="true"] .sub-menu .widget_product_categories ul li a + ul li:before,
				.followers-label:after {
					background-color: '.$main_color.';
				}';

				$dynamic_css .='.masonry2 .loop-posts .post-image-body-inner-wrap .post-read-more:hover,
				.mejs-controls .mejs-time-rail .mejs-time-current,
				.slick-slider .slick-prev:hover,
				.slick-slider .slick-next:hover,
				#event-gallery .owl-nav > .owl-prev:hover,
				#event-gallery .owl-nav > .owl-next:hover,
				.et-tweets ul.slick-dots li.slick-active button,
				.list .loop-posts .post-read-more:hover,
				.full .loop-posts .post-read-more:hover,
				.full #loop-posts .format-link .post-body-inner,
				.single-post-page > .format-link .format-container,
				.woo-cart-toggle:hover:before,
				.et-booking-toggle:hover:before,
				.et-working-hours-toggle:hover:before,
				.woo-cart .woocommerce-mini-cart__total:before{
					background-color: '.$main_color.' !important;
				}';

				$dynamic_css .='#yith-wcwl-popup-message {
					color:'.$main_color.' !important;
					box-shadow:inset 0 0 0 2px '.$main_color.';
				}';

				$dynamic_css .='.woocommerce-info {
					color:'.$main_color.' !important;
					box-shadow:inset 0 0 0 1px '.$main_color.';
				}';

				$dynamic_css .='.yith-wcwl-add-to-wishlist a {
					box-shadow:inset 0 0 0 32px '.$main_color.' !important;
				}';

				$dynamic_css .='.yith-wcwl-add-to-wishlist a:hover,
				.yith-wcwl-wishlistexistsbrowse.show a,
				.yith-wcwl-wishlistaddedbrowse.show a {
					box-shadow:inset 0 0 0 32px '.$highlight_color.' !important;
					background-color: '.$highlight_color.';
				}';

				$dynamic_css .='.yith-wcwl-add-to-wishlist a.active:after {
					border: 2px solid '.$main_color.';
					border-top: 2px solid '.$highlight_color.';
				}';

				$dynamic_css .='.yith-wcwl-add-to-wishlist a.active:hover:after {
					border: 2px solid '.$highlight_color.';
					border-top: 2px solid #ffffff;
				}';

				$dynamic_css .='.show a.active:after,
				.show a.active:hover:after {
					border: 2px solid '.$highlight_color.' !important;
					border-top: 2px solid #ffffff !important;
				}';

				$dynamic_css .='.ajax-add-to-cart-loading .circle-loader {
					border: 2px solid '.goodresto_enovathemes_hex_to_rgba($main_color,0.2).';
				}';

				$dynamic_css .='.ajax-add-to-cart-loading .circle-loader {
					border-left-color: '.$main_color.';
				}';

				$dynamic_css .='.ajax-add-to-cart-loading .load-complete {
					border-color:'.$main_color.' !important;
				}';

				$dynamic_css .='.ajax-add-to-cart-loading .checkmark:after {
					border-right: 2px solid '.$main_color.';
					border-top: 2px solid '.$main_color.';
				}';

				$dynamic_css .='.widget_price_filter .ui-slider-horizontal .ui-slider-range {
                    background-color:'.$main_color.' !important;
                }';

                $dynamic_css .='.widget_price_filter .ui-slider .ui-slider-handle {
                    border:2px solid '.$main_color.';
                }';

				$dynamic_css .= '.highlight-true .testimonial-content {
					box-shadow:inset 0 0 0 1px '.$main_color.';border-color:'.$main_color.';
				}';

				$dynamic_css .= '.highlight-true .testimonial-content:after {
					border-color: '.$main_color.' transparent transparent transparent;
				}';

				$dynamic_css .= '.post-image-overlay > .overlay-read-more, 
				.post-image-overlay > .post-image-overlay-content > .overlay-read-more{
					background-color: '.goodresto_enovathemes_hex_to_rgba($main_color,0.3).';
				}';

				$dynamic_css .= '.post-image-overlay > .overlay-read-more:hover, 
				.post-image-overlay > .post-image-overlay-content > .overlay-read-more:hover{
					background-color: '.$main_color.';
				}';

				$dynamic_css .= '.grid #loop-posts .post .post-category,
				.masonry1 #loop-posts .post .post-category,
				.grid .recent-posts .post .post-category,
				.masonry1 .recent-posts .post .post-category,
				.carousel .recent-posts .post .post-category,
				.related-posts .post .post-category,
				.event-status,
				.summary .out-of-stock,
				.summary .in-stock,
				.simple.loop-posts .post-title a:before{
					background-color:'.$highlight_color.';
				}';

				$dynamic_css .= '.post-read-more:hover,
				.comment-reply-link:hover,
				.product-loop-button:hover,
				.added_to_cart:hover,
				.post-single-navigation a:hover,
				.single-event-navigation a:hover,
				.simple.loop-posts .post-title a:hover {
					color:'.$highlight_color.';
				}';

				$dynamic_css .= '.post-read-more:before,
				.comment-reply-link:before,
				.product-loop-button:before,
				.added_to_cart:before {
					background-color:'.$highlight_color.';
				}';

				$dynamic_css .= 'blockquote, q {
					border-top:2px solid '.$main_color.';
					border-bottom:2px solid '.$main_color.';
				}';

				$dynamic_css .= 'ul.chat li:nth-child(2n+2) > p {
					background-color: '.goodresto_enovathemes_hex_to_rgba($main_color,0.3).';
				}';

				$dynamic_css .= '.single-event-page > .post .post-body .post-content {
					border-bottom:1px solid '.$main_color.';
				}';

				$dynamic_css .= '.et-map-link {
				    color: '.$main_color.' !important;
				}';

				$dynamic_css .= '.et-map-link:after {
				    background-color: '.$main_color.';
				}';

				$dynamic_css .= '.et-map-link:hover,
				.enovathemes-filter .filter:hover,
				.enovathemes-filter .filter.active {
				    color:'.$highlight_color.' !important;
				}';

				$dynamic_css .= '.et-map-link:hover:after,
				.enovathemes-filter .filter:after,
				.menu-label,
				.post-image .menu-additional-info > * {
				    background-color:'.$highlight_color.' !important;
				}';

				$dynamic_css .= '.menu-layout.grid .loop-menu .menu .highlight-true .post-body,
				.menu-layout.carousel .loop-menu .menu .highlight-true .post-body,
				.menu-layout.list2 .loop-menu .menu .highlight-true .post-body,
				.followers-box-inner {
					box-shadow:inset 0 0 0 2px '.$main_color.';
				}';

				$dynamic_css .= '.menu-layout.list .menu .highlight-true .post-image img {
					border:2px solid '.$main_color.';
				}';

				$dynamic_css .= '.woocommerce-error li,
				.cart-empty,
				.woocommerce-info,
				.woocommerce-message,
				.woocommerce-notice {
					box-shadow: inset 0 0 0 1px '.$main_color.';
					color: '.$main_color.';
				}';

				$dynamic_css .= '.woocommerce-error li a,
				.cart-empty a,
				.woocommerce-info a,
				.woocommerce-message a {
					background: '.$main_color.';
				}';

			/* Links
			/*-------------*/

				$link_color_reg   = (isset($GLOBALS['goodresto_enovathemes']['link-color']['regular']) && $GLOBALS['goodresto_enovathemes']['link-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['link-color']['regular'] : '#d3a471';
				$link_color_hov   = (isset($GLOBALS['goodresto_enovathemes']['link-color']['hover']) && $GLOBALS['goodresto_enovathemes']['link-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['link-color']['hover'] : '#212121';

				$dynamic_css .='a,a:visited,
				.comment-meta .comment-date-time a:hover,
				.comment-author a:hover,
				.comment-content .edit-link a a,
				#cancel-comment-reply-link:hover,
				.woocommerce-review-link {
					color: '.$link_color_reg.';
					opacity:1;
				}';

				$dynamic_css .='a:hover,
				.comment-content .edit-link a a:hover,
				.woocommerce-review-link:hover,
				.product_meta a:hover {
					color: '.$link_color_hov.';
				}';

				$dynamic_css .='.post-tags-single a:hover:after,
				.widget_tag_cloud .tagcloud a:after,
				.widget_product_tag_cloud .tagcloud a:after,
				.event-tags a:after {
					background-color:'.$link_color_reg.' !important;
				}';

				$dynamic_css .='.widget_tag_cloud .tagcloud a:hover:after,
				.widget_product_tag_cloud .tagcloud a:hover:after,
				.event-tags a:hover:after {
					background-color:'.$link_color_hov.' !important;
				}';

		/* Decorative icon
		/*-------------*/

			$icon_decorative = (isset($GLOBALS['goodresto_enovathemes']['icon-decorative']) && !empty($GLOBALS['goodresto_enovathemes']['icon-decorative'])) ? $GLOBALS['goodresto_enovathemes']['icon-decorative'] : 'icon-sep-sep5';

			switch ($icon_decorative) {
				case 'icon-sep-sep1':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e1000"}';
					break;
				case 'icon-sep-sep2':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e1001"}';
					break;
				case 'icon-sep-sep3':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e1002"}';
					break;
				case 'icon-sep-sep4':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e1003"}';
					break;
				case 'icon-sep-sep5':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e1004"}';
					break;
				case 'icon-sep-sep6':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e1005"}';
					break;
				case 'icon-sep-sep7':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e1006"}';
					break;
				case 'icon-sep-sep8':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e1007"}';
					break;
				case 'icon-sep-sep9':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e1008"}';
					break;
				case 'icon-sep-sep10':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e1009"}';
					break;
				case 'icon-sep-sep11':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e100a}';
					break;
				case 'icon-sep-sep12':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e100b"}';
					break;
				case 'icon-sep-sep13':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e100c"}';
					break;
				case 'icon-sep-sep14':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e100d"}';
					break;
				case 'icon-sep-sep15':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e100e"}';
					break;
				case 'icon-sep-sep16':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e100f"}';
					break;
				case 'icon-sep-sep17':
					$dynamic_css .='.woocommerce-product-details__short-description:after{content:"\e1010"}';
					break;
			}

		/* One page layout
		/*-------------*/

			$one_page_color_reg   = (isset($GLOBALS['goodresto_enovathemes']['one-page-color']['regular']) && $GLOBALS['goodresto_enovathemes']['one-page-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['one-page-color']['regular'] : '#303030';
			$one_page_color_hov   = (isset($GLOBALS['goodresto_enovathemes']['one-page-color']['hover']) && $GLOBALS['goodresto_enovathemes']['one-page-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['one-page-color']['hover'] : '#d3a471';

			$one_page_tooltip_color      = (isset($GLOBALS['goodresto_enovathemes']['one-page-tooltip-color']) && $GLOBALS['goodresto_enovathemes']['one-page-tooltip-color']) ? $GLOBALS['goodresto_enovathemes']['one-page-tooltip-color'] : "#ffffff";
			$one_page_tooltip_back_color = (isset($GLOBALS['goodresto_enovathemes']['one-page-tooltip-back-color']) && $GLOBALS['goodresto_enovathemes']['one-page-tooltip-back-color']) ? $GLOBALS['goodresto_enovathemes']['one-page-tooltip-back-color'] : "#303030";

			$one_page_back_color  = (isset($GLOBALS['goodresto_enovathemes']['one-page-back-color']) && $GLOBALS['goodresto_enovathemes']['one-page-back-color']) ? $GLOBALS['goodresto_enovathemes']['one-page-back-color'] : "#f5f5f5";
			$one_page_back_shadow = (isset($GLOBALS['goodresto_enovathemes']['one-page-back-shadow']) && $GLOBALS['goodresto_enovathemes']['one-page-back-shadow'] == 1) ? "true" : "false";

			$dynamic_css .='.one-page-bullets,
			#multiscroll-nav {
				background-color: '.$one_page_back_color.';';
				if ($one_page_back_shadow == "true") {
					$dynamic_css .='box-shadow: 0 0 5px 2px rgba(0,0,0,0.1);';
				}
			$dynamic_css .='}';

			$dynamic_css .='.one-page-bullets ul li a,
			#multiscroll-nav li a {
				background-color: '.$one_page_color_reg.';
			}';

			$dynamic_css .='.one-page-bullets ul li a:hover,
			.one-page-bullets ul li.one-page-active a,
			#multiscroll-nav li a:hover,
			#multiscroll-nav li a.active {
				background-color: '.$one_page_color_hov.';
			}';

			$dynamic_css .='.one-page-bullets ul li a:before,
			#multiscroll-nav li:before {
				background-color: '.$one_page_tooltip_back_color.';
				color: '.$one_page_tooltip_color.';
			}';

		/* Layout
		/*-------------*/

			$layout           = (isset($GLOBALS['goodresto_enovathemes']['layout']) && $GLOBALS['goodresto_enovathemes']['layout']) ? $GLOBALS['goodresto_enovathemes']['layout'] : "wide";
			$frame_width      = (isset($GLOBALS['goodresto_enovathemes']['frame-width']) && $GLOBALS['goodresto_enovathemes']['frame-width']) ? $GLOBALS['goodresto_enovathemes']['frame-width'] : "20";
			$frame_width_mob  = (isset($GLOBALS['goodresto_enovathemes']['frame-width-mob']) && $GLOBALS['goodresto_enovathemes']['frame-width-mob']) ? $GLOBALS['goodresto_enovathemes']['frame-width-mob'] : "20";
			$frame_color      = (isset($GLOBALS['goodresto_enovathemes']['frame-color']) && $GLOBALS['goodresto_enovathemes']['frame-color']) ? $GLOBALS['goodresto_enovathemes']['frame-color'] : "#ffffff";

			$dynamic_css .='body.layout-frame {
				padding:'.$frame_width.'px;
			}';

			$dynamic_css .='.layout-frame .site-sidebar {
			    right: '.$frame_width.'px;
			    top: '.$frame_width.'px;
			    height: calc( 100% - '.($frame_width*2).'px );
			}';

			$dynamic_css .='.layout-frame.sidebar-align-left .site-sidebar {
				right:auto !important;
			    left: '.$frame_width.'px;
			    top: '.$frame_width.'px;
			    height: calc( 100% - '.($frame_width*2).'px );
			}';

			$dynamic_css .='.body-borders > div:not(.shadow),
			.body-borders > .left-border:before,
			.body-borders .left-border:after,
			.body-borders > .right-border:before,
			.body-borders > .bottom-border:before {
				background-color:'.$frame_color.';
			}';

			$dynamic_css .='.body-borders > .top-border,
			.body-borders > .bottom-border {
				height:'.$frame_width.'px;
			}';

			$dynamic_css .='.body-borders > .left-border,
			.body-borders > .right-border {
				width:'.$frame_width.'px;
			}';

			$dynamic_css .='.body-borders .left-border:before,
			.body-borders .left-border:after,
			.body-borders .right-border:before,
			.body-borders > .bottom-border:before {
				width:'.($frame_width*2).'px;
				height: '.$frame_width.'px;
			}';

			$dynamic_css .='.body-borders > .bottom-border:before {
				width: '.$frame_width.'px;
				height: '.($frame_width*2).'px;
			}';

	/* Effects
	/*------------*/

		/* Custom scroll
		/*------------*/

            $custom_scroll             = (isset($GLOBALS['goodresto_enovathemes']['custom-scroll']) && $GLOBALS['goodresto_enovathemes']['custom-scroll'] == 1) ? 'true' : 'false';
			$custom_scroll_cursorwidth = (isset($GLOBALS['goodresto_enovathemes']['custom-scroll-cursorwidth']) && $GLOBALS['goodresto_enovathemes']['custom-scroll-cursorwidth']) ? $GLOBALS['goodresto_enovathemes']['custom-scroll-cursorwidth'] : "10";

			if ($custom_scroll == "true") {
				$dynamic_css .='html {
					margin-right:'.$custom_scroll_cursorwidth.'px;
				}';
			}

		/* Image preloader
		/*------------*/

			$img_preloader = (isset($GLOBALS['goodresto_enovathemes']['img-preload']) && $GLOBALS['goodresto_enovathemes']['img-preload'] == 1) ? 'true' : 'false';

			if ($img_preloader == "true") {

				$dynamic_css .='.image-preloader {
					opacity:1 !important;
					visibility: visible !important;
					z-index:1 !important;
				}';

				$dynamic_css .='.image-preloader + img {
					opacity:0 !important;
					visibility: hidden !important;
				}';
			}

		/* Move to top
		/*------------*/

			$mtt                  = (isset($GLOBALS['goodresto_enovathemes']['mtt']) && $GLOBALS['goodresto_enovathemes']['mtt'] == 1) ? 'true' : 'false';
			$mtt_size          	  = (isset($GLOBALS['goodresto_enovathemes']['mtt-size']) && $GLOBALS['goodresto_enovathemes']['mtt-size']) ? $GLOBALS['goodresto_enovathemes']['mtt-size'] : '40';
			$mtt_arrow_size    	  = (isset($GLOBALS['goodresto_enovathemes']['mtt-arrow-size']) && $GLOBALS['goodresto_enovathemes']['mtt-arrow-size']) ? $GLOBALS['goodresto_enovathemes']['mtt-arrow-size'] : '16';
			$mtt_border_radius 	  = (isset($GLOBALS['goodresto_enovathemes']['mtt-border-radius']) && $GLOBALS['goodresto_enovathemes']['mtt-border-radius']) ? $GLOBALS['goodresto_enovathemes']['mtt-border-radius'] : '0';
			$mtt_color_reg        = (isset($GLOBALS['goodresto_enovathemes']['mtt-color']['regular']) && $GLOBALS['goodresto_enovathemes']['mtt-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['mtt-color']['regular'] : '#9e9e9e';
			$mtt_color_hov        = (isset($GLOBALS['goodresto_enovathemes']['mtt-color']['hover']) && $GLOBALS['goodresto_enovathemes']['mtt-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['mtt-color']['hover'] : '#ffffff';
			$mtt_back_color_reg   = (isset($GLOBALS['goodresto_enovathemes']['mtt-back-color']['regular']) && $GLOBALS['goodresto_enovathemes']['mtt-back-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['mtt-back-color']['regular'] : '#151515';
			$mtt_back_color_hov   = (isset($GLOBALS['goodresto_enovathemes']['mtt-back-color']['hover']) && $GLOBALS['goodresto_enovathemes']['mtt-back-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['mtt-back-color']['hover'] : '#d3a471';

			if ($mtt == "true") {
				
				$dynamic_css .='#to-top {
					width: '.$mtt_size.'px;
					height: '.$mtt_size.'px;
					line-height: '.$mtt_size.'px !important;
					font-size: '.$mtt_arrow_size.'px;
					border-radius: '.$mtt_border_radius.'px;
					color: '.$mtt_color_reg.';
					background-color: '.$mtt_back_color_reg.';
				}';

				if ($layout == "frame") {
					$dynamic_css .='#to-top {
						right: '.(32 + $frame_width_mob).'px !important;
						bottom: '.(32 + $frame_width_mob).'px !important;
					}';
				}

				$dynamic_css .='#to-top:hover {
					color: '.$mtt_color_hov.';
					background-color: '.$mtt_back_color_hov.';
				}';

				$dynamic_css .='#to-top .et-ink {
					background-color: '.$mtt_color_hov.';
				}';

			}

	/* Page title section
	---------------*/

	    $page_title_height              = (isset($GLOBALS['goodresto_enovathemes']['page-title-height']) && $GLOBALS['goodresto_enovathemes']['page-title-height']) ? $GLOBALS['goodresto_enovathemes']['page-title-height'] : '256';

		$page_title_typo_font_family  	 = (isset($GLOBALS['goodresto_enovathemes']['page-title-typo']['font-family']) && !empty($GLOBALS['goodresto_enovathemes']['page-title-typo']['font-family'])) ? $GLOBALS['goodresto_enovathemes']['page-title-typo']['font-family'] : "'Cabin Condensed', sans-serif";
		$page_title_typo_font_weight  	 = (isset($GLOBALS['goodresto_enovathemes']['page-title-typo']['font-weight']) && !empty($GLOBALS['goodresto_enovathemes']['page-title-typo']['font-weight'])) ? $GLOBALS['goodresto_enovathemes']['page-title-typo']['font-weight'] : "700";
		$page_title_typo_font_size    	 = (isset($GLOBALS['goodresto_enovathemes']['page-title-typo']['font-size']) && !empty($GLOBALS['goodresto_enovathemes']['page-title-typo']['font-size'])) ? $GLOBALS['goodresto_enovathemes']['page-title-typo']['font-size'] : "72px";
		$page_title_typo_line_height     = (isset($GLOBALS['goodresto_enovathemes']['page-title-typo']['line-height']) && !empty($GLOBALS['goodresto_enovathemes']['page-title-typo']['line-height'])) ? $GLOBALS['goodresto_enovathemes']['page-title-typo']['line-height'] : "80px";
		$page_title_typo_letter_spacing  = (isset($GLOBALS['goodresto_enovathemes']['page-title-typo']['letter-spacing']) && !empty($GLOBALS['goodresto_enovathemes']['page-title-typo']['letter-spacing'])) ? $GLOBALS['goodresto_enovathemes']['page-title-typo']['letter-spacing'] : "15px";
		$page_title_typo_text_transform  = (isset($GLOBALS['goodresto_enovathemes']['page-title-typo']['text-transform']) && !empty($GLOBALS['goodresto_enovathemes']['page-title-typo']['text-transform'])) ? $GLOBALS['goodresto_enovathemes']['page-title-typo']['text-transform'] : "uppercase";

		$page_subtitle_typo_font_family  	 = (isset($GLOBALS['goodresto_enovathemes']['page-subtitle-typo']['font-family']) && !empty($GLOBALS['goodresto_enovathemes']['page-subtitle-typo']['font-family'])) ? $GLOBALS['goodresto_enovathemes']['page-subtitle-typo']['font-family'] : "'Cabin Condensed', sans-serif";
		$page_subtitle_typo_font_weight  	 = (isset($GLOBALS['goodresto_enovathemes']['page-subtitle-typo']['font-weight']) && !empty($GLOBALS['goodresto_enovathemes']['page-subtitle-typo']['font-weight'])) ? $GLOBALS['goodresto_enovathemes']['page-subtitle-typo']['font-weight'] : "400";
		$page_subtitle_typo_font_size    	 = (isset($GLOBALS['goodresto_enovathemes']['page-subtitle-typo']['font-size']) && !empty($GLOBALS['goodresto_enovathemes']['page-subtitle-typo']['font-size'])) ? $GLOBALS['goodresto_enovathemes']['page-subtitle-typo']['font-size'] : "16px";
		$page_subtitle_typo_letter_spacing 	 = (isset($GLOBALS['goodresto_enovathemes']['page-subtitle-typo']['letter-spacing']) && !empty($GLOBALS['goodresto_enovathemes']['page-subtitle-typo']['letter-spacing'])) ? $GLOBALS['goodresto_enovathemes']['page-subtitle-typo']['letter-spacing'] : "2px";
		$page_subtitle_typo_text_transform 	 = (isset($GLOBALS['goodresto_enovathemes']['page-subtitle-typo']['text-transform']) && !empty($GLOBALS['goodresto_enovathemes']['page-subtitle-typo']['text-transform'])) ? $GLOBALS['goodresto_enovathemes']['page-subtitle-typo']['text-transform'] : "uppercase";
	    
	    $page_breadcrumbs_typo_font_family    = (isset($GLOBALS['goodresto_enovathemes']['page-breadcrumbs-typo']['font-family']) && !empty($GLOBALS['goodresto_enovathemes']['page-breadcrumbs-typo']['font-family'])) ? $GLOBALS['goodresto_enovathemes']['page-breadcrumbs-typo']['font-family'] : "'Cabin Condensed', sans-serif";
		$page_breadcrumbs_typo_font_weight    = (isset($GLOBALS['goodresto_enovathemes']['page-breadcrumbs-typo']['font-weight']) && !empty($GLOBALS['goodresto_enovathemes']['page-breadcrumbs-typo']['font-weight'])) ? $GLOBALS['goodresto_enovathemes']['page-breadcrumbs-typo']['font-weight'] : "400";
		$page_breadcrumbs_typo_font_size      = (isset($GLOBALS['goodresto_enovathemes']['page-breadcrumbs-typo']['font-size']) && !empty($GLOBALS['goodresto_enovathemes']['page-breadcrumbs-typo']['font-size'])) ? $GLOBALS['goodresto_enovathemes']['page-breadcrumbs-typo']['font-size'] : "16px";
		$page_breadcrumbs_typo_letter_spacing = (isset($GLOBALS['goodresto_enovathemes']['page-breadcrumbs-typo']['letter-spacing']) && !empty($GLOBALS['goodresto_enovathemes']['page-breadcrumbs-typo']['letter-spacing'])) ? $GLOBALS['goodresto_enovathemes']['page-breadcrumbs-typo']['letter-spacing'] : "0.75px";
		$page_breadcrumbs_typo_text_transform = (isset($GLOBALS['goodresto_enovathemes']['page-breadcrumbs-typo']['text-transform']) && !empty($GLOBALS['goodresto_enovathemes']['page-breadcrumbs-typo']['text-transform'])) ? $GLOBALS['goodresto_enovathemes']['page-breadcrumbs-typo']['text-transform'] : "none";

		$mob_page_title_height                    = (isset($GLOBALS['goodresto_enovathemes']['mob-page-title-height']) && $GLOBALS['goodresto_enovathemes']['mob-page-title-height']) ? $GLOBALS['goodresto_enovathemes']['mob-page-title-height'] : $page_title_height;
		$mob_page_title_typo_font_weight  	      = (isset($GLOBALS['goodresto_enovathemes']['mob-page-title-typo']['font-weight']) && !empty($GLOBALS['goodresto_enovathemes']['mob-page-title-typo']['font-weight'])) ? $GLOBALS['goodresto_enovathemes']['mob-page-title-typo']['font-weight'] : $page_title_typo_font_weight;
		$mob_page_title_typo_font_size    	      = (isset($GLOBALS['goodresto_enovathemes']['mob-page-title-typo']['font-size']) && !empty($GLOBALS['goodresto_enovathemes']['mob-page-title-typo']['font-size'])) ? $GLOBALS['goodresto_enovathemes']['mob-page-title-typo']['font-size'] : '40px';
		$mob_page_title_typo_letter_spacing       = (isset($GLOBALS['goodresto_enovathemes']['mob-page-title-typo']['letter-spacing']) && !empty($GLOBALS['goodresto_enovathemes']['mob-page-title-typo']['letter-spacing'])) ? $GLOBALS['goodresto_enovathemes']['mob-page-title-typo']['letter-spacing'] : '5px';
		$mob_page_title_typo_line_height          = (isset($GLOBALS['goodresto_enovathemes']['mob-page-title-typo']['line-height']) && !empty($GLOBALS['goodresto_enovathemes']['mob-page-title-typo']['line-height'])) ? $GLOBALS['goodresto_enovathemes']['mob-page-title-typo']['line-height'] : '48px';
		$mob_page_title_typo_text_transform       = (isset($GLOBALS['goodresto_enovathemes']['mob-page-title-typo']['text-transform']) && !empty($GLOBALS['goodresto_enovathemes']['mob-page-title-typo']['text-transform'])) ? $GLOBALS['goodresto_enovathemes']['mob-page-title-typo']['text-transform'] : $page_title_typo_text_transform;
		$mob_page_subtitle_typo_font_weight  	  = (isset($GLOBALS['goodresto_enovathemes']['mob-page-subtitle-typo']['font-weight']) && !empty($GLOBALS['goodresto_enovathemes']['mob-page-subtitle-typo']['font-weight'])) ? $GLOBALS['goodresto_enovathemes']['mob-page-subtitle-typo']['font-weight'] : $page_subtitle_typo_font_weight;
		$mob_page_subtitle_typo_font_size    	  = (isset($GLOBALS['goodresto_enovathemes']['mob-page-subtitle-typo']['font-size']) && !empty($GLOBALS['goodresto_enovathemes']['mob-page-subtitle-typo']['font-size'])) ? $GLOBALS['goodresto_enovathemes']['mob-page-subtitle-typo']['font-size'] : $page_subtitle_typo_font_size;
		$mob_page_subtitle_typo_letter_spacing 	  = (isset($GLOBALS['goodresto_enovathemes']['mob-page-subtitle-typo']['letter-spacing']) && !empty($GLOBALS['goodresto_enovathemes']['mob-page-subtitle-typo']['letter-spacing'])) ? $GLOBALS['goodresto_enovathemes']['mob-page-subtitle-typo']['letter-spacing'] : $page_subtitle_typo_letter_spacing;
		$mob_page_subtitle_typo_text_transform 	  = (isset($GLOBALS['goodresto_enovathemes']['mob-page-subtitle-typo']['text-transform']) && !empty($GLOBALS['goodresto_enovathemes']['mob-page-subtitle-typo']['text-transform'])) ? $GLOBALS['goodresto_enovathemes']['mob-page-subtitle-typo']['text-transform'] : $page_subtitle_typo_text_transform;
		$mob_page_breadcrumbs_typo_font_weight    = (isset($GLOBALS['goodresto_enovathemes']['mob-breadcrumbs-typo']['font-weight']) && !empty($GLOBALS['goodresto_enovathemes']['mob-breadcrumbs-typo']['font-weight'])) ? $GLOBALS['goodresto_enovathemes']['mob-breadcrumbs-typo']['font-weight'] : $page_breadcrumbs_typo_font_weight;
		$mob_page_breadcrumbs_typo_font_size      = (isset($GLOBALS['goodresto_enovathemes']['mob-breadcrumbs-typo']['font-size']) && !empty($GLOBALS['goodresto_enovathemes']['mob-breadcrumbs-typo']['font-size'])) ? $GLOBALS['goodresto_enovathemes']['mob-breadcrumbs-typo']['font-size'] : $page_breadcrumbs_typo_font_size;
		$mob_page_breadcrumbs_typo_letter_spacing = (isset($GLOBALS['goodresto_enovathemes']['mob-breadcrumbs-typo']['letter-spacing']) && !empty($GLOBALS['goodresto_enovathemes']['mob-breadcrumbs-typo']['letter-spacing'])) ? $GLOBALS['goodresto_enovathemes']['mob-breadcrumbs-typo']['letter-spacing'] : $page_breadcrumbs_typo_letter_spacing;
		$mob_page_breadcrumbs_typo_text_transform = (isset($GLOBALS['goodresto_enovathemes']['mob-breadcrumbs-typo']['text-transform']) && !empty($GLOBALS['goodresto_enovathemes']['mob-breadcrumbs-typo']['text-transform'])) ? $GLOBALS['goodresto_enovathemes']['mob-breadcrumbs-typo']['text-transform'] : $page_breadcrumbs_typo_text_transform;

		$dynamic_css .='.rich-header, 
		.rich-header .parallax-container, 
		.rich-header .fixed-container {
			height: '.$page_title_height.'px;
		}';

		$dynamic_css .='.rich-header h1 {
			font-family:'.$page_title_typo_font_family.'; 
			font-weight:'.$page_title_typo_font_weight.'; 
			font-size:'.$page_title_typo_font_size.'; 
			line-height:'.$page_title_typo_line_height.'; 
			letter-spacing:'.$page_title_typo_letter_spacing.'; 
			text-transform:'.$page_title_typo_text_transform.';
		}';

		$dynamic_css .='.rich-header p {
			font-family:'.$page_subtitle_typo_font_family.'; 
			font-weight:'.$page_subtitle_typo_font_weight.'; 
			font-size:'.$page_subtitle_typo_font_size.'; 
			letter-spacing:'.$page_subtitle_typo_letter_spacing.'; 
			text-transform:'.$page_subtitle_typo_text_transform.';
		}';

		$dynamic_css .='.rich-header .et-breadcrumbs {
			font-family:'.$page_breadcrumbs_typo_font_family.'; 
			font-weight:'.$page_breadcrumbs_typo_font_weight.'; 
			font-size:'.$page_breadcrumbs_typo_font_size.'; 
			letter-spacing:'.$page_breadcrumbs_typo_letter_spacing.'; 
			text-transform:'.$page_breadcrumbs_typo_text_transform.';
		}';

		if (is_page()) {

			$values        = get_post_custom( get_the_ID() );
   			$title_section = isset( $values['title_section'][0]) ? $values['title_section'][0] : "true";
		    
		    if ($title_section == "true") {

			    $title_section_back_color          = isset( $values['title_section_back_color'][0] ) ? esc_attr( $values["title_section_back_color"][0] ) : '#f5f5f5';
			    $title_section_back_img            = isset( $values['title_section_back_img'][0] ) ? esc_url( $values["title_section_back_img"][0] ) : '';
			    $title_section_back_img_repeat     = isset( $values['title_section_back_img_repeat'][0] ) ? esc_attr( $values["title_section_back_img_repeat"][0] ) : 'no-repeat';
			    $title_section_back_img_position   = isset( $values['title_section_back_img_position'][0] ) ? esc_attr( $values["title_section_back_img_position"][0] ) : 'left top';
			    $title_section_back_img_attachment = isset( $values['title_section_back_img_attachment'][0] ) ? esc_attr( $values["title_section_back_img_attachment"][0] ) : 'scroll';
			    $title_section_back_img_size       = isset( $values['title_section_back_img_size'][0] ) ? esc_attr( $values["title_section_back_img_size"][0] ) : 'cover';

			    $title_section_title_color         = isset( $values['title_section_title_color'][0] ) ? esc_attr( $values["title_section_title_color"][0] ) : '#757575';
			    $title_section_title_back_color    = isset( $values['title_section_title_back_color'][0] ) ? esc_attr( $values["title_section_title_back_color"][0] ) : '';
			    
			    $title_section_subtitle_color      = isset( $values['title_section_subtitle_color'][0] ) ? esc_attr( $values["title_section_subtitle_color"][0] ) : '#9e9e9e';
			    $title_section_subtitle_back_color = isset( $values['title_section_subtitle_back_color'][0] ) ? esc_attr( $values["title_section_subtitle_back_color"][0] ) : '';
			    
			    $breadcrumbs_text_color            = isset( $values['breadcrumbs_text_color'][0] ) ? esc_attr( $values["breadcrumbs_text_color"][0] ) : '#9e9e9e';
			    $breadcrumbs_back_color            = isset( $values['breadcrumbs_back_color'][0] ) ? esc_attr( $values["breadcrumbs_back_color"][0] ) : '';
			    $breadcrumbs_separator_color       = isset( $values['breadcrumbs_separator_color'][0] ) ? esc_attr( $values["breadcrumbs_separator_color"][0] ) : '#d3a471';

				$dynamic_css .='.page-id-'.get_the_ID().' .page-header, 
				.page-id-'.get_the_ID().' .page-header .parallax-container, 
				.page-id-'.get_the_ID().' .page-header .fixed-container {
			    	background-color: '.$title_section_back_color.';';
					if(!empty($title_section_back_img)){
						$dynamic_css .='background-image:url('.$title_section_back_img.');
						background-repeat:'.$title_section_back_img_repeat.';
						background-attachment: '.$title_section_back_img_attachment.';
						-webkit-background-size: '.$title_section_back_img_size.';
						-moz-background-size: '.$title_section_back_img_size.';
						background-size: '.$title_section_back_img_size.';
						background-position:'.$title_section_back_img_position.';';
					}
				$dynamic_css .='}';

				$dynamic_css .= '.page-id-'.get_the_ID().' .page-header h1 {
					color:'.$title_section_title_color.';';
					if(!empty($title_section_title_back_color)){
						$dynamic_css .='padding:10px 30px;';
						$dynamic_css .='background-color:'.$title_section_title_back_color.';';
					} else {
						$dynamic_css .='padding:0px;background-color:transparent;';
					}
				$dynamic_css .='}';

				$dynamic_css .= '.page-id-'.get_the_ID().' .page-header p {
					color:'.$title_section_subtitle_color.';';
					if(!empty($title_section_subtitle_back_color)){
						$dynamic_css .='padding:10px 30px;';
						$dynamic_css .='background-color:'.$title_section_subtitle_back_color.';';
					} else {
						$dynamic_css .='padding:0px;background-color:transparent;';
					}
				$dynamic_css .='}';

				$dynamic_css .= '.page-id-'.get_the_ID().' .page-header .et-breadcrumbs {
					color:'.$breadcrumbs_text_color.';';
					if(!empty($breadcrumbs_back_color)){
						$dynamic_css .='padding:10px 30px;';
						$dynamic_css .='background-color:'.$breadcrumbs_back_color.';';
					} else {
						$dynamic_css .='padding:0px;background-color:transparent;';
					}
				$dynamic_css .='}';

				$dynamic_css .='.page-id-'.get_the_ID().' .et-breadcrumbs > *:before {
					color:'.$breadcrumbs_separator_color.';
				}';

				$dynamic_css .='.page-id-'.get_the_ID().' .et-breadcrumbs a:after {
					background-color:'.$breadcrumbs_text_color.';
				}';

			}
			
		}

	/* Site background
	/*-------------*/

		$et_site_back_col   = (isset($GLOBALS['goodresto_enovathemes']['site-background']['background-color']) && $GLOBALS['goodresto_enovathemes']['site-background']['background-color']) ? $GLOBALS['goodresto_enovathemes']['site-background']['background-color'] : "#ffffff";
		$et_site_back_img   = (isset($GLOBALS['goodresto_enovathemes']['site-background']['background-image']) && $GLOBALS['goodresto_enovathemes']['site-background']['background-image']) ? esc_url($GLOBALS['goodresto_enovathemes']['site-background']['background-image']) : "";
		$et_site_back_r     = (isset($GLOBALS['goodresto_enovathemes']['site-background']['background-repeat']) && $GLOBALS['goodresto_enovathemes']['site-background']['background-repeat']) ? $GLOBALS['goodresto_enovathemes']['site-background']['background-repeat'] : "no-repeat";
		$et_site_back_s     = (isset($GLOBALS['goodresto_enovathemes']['site-background']['background-size']) && $GLOBALS['goodresto_enovathemes']['site-background']['background-size']) ? $GLOBALS['goodresto_enovathemes']['site-background']['background-size'] : "inherit";
		$et_site_back_a     = (isset($GLOBALS['goodresto_enovathemes']['site-background']['background-attachment']) && $GLOBALS['goodresto_enovathemes']['site-background']['background-attachment']) ? $GLOBALS['goodresto_enovathemes']['site-background']['background-attachment'] : "inherit";
		$et_site_back_p     = (isset($GLOBALS['goodresto_enovathemes']['site-background']['background-position']) && $GLOBALS['goodresto_enovathemes']['site-background']['background-position']) ? $GLOBALS['goodresto_enovathemes']['site-background']['background-position'] : "left top";

		$dynamic_css .='html,
		#gen-wrap {
			background-color:'.$et_site_back_col.';';
			if(!empty($et_site_back_img)){
				$dynamic_css .='background-image:url('.$et_site_back_img.');
				background-repeat:'.$et_site_back_r.';
				background-attachment: '.$et_site_back_a.';
				-webkit-background-size: '.$et_site_back_s.';
				-moz-background-size: '.$et_site_back_s.';
				background-size: '.$et_site_back_s.';
				background-position:'.$et_site_back_p;
			}
		$dynamic_css .='}';

	/* Site loading
	---------------*/

		$custom_loading_backcolor = (isset($GLOBALS['goodresto_enovathemes']['custom-loading-backcolor']) && $GLOBALS['goodresto_enovathemes']['custom-loading-backcolor']) ? $GLOBALS['goodresto_enovathemes']['custom-loading-backcolor'] : "#ffffff";
		$custom_loading_color     = (isset($GLOBALS['goodresto_enovathemes']['custom-loading-color']) && $GLOBALS['goodresto_enovathemes']['custom-loading-color']) ? $GLOBALS['goodresto_enovathemes']['custom-loading-color'] : "#d3a471";

		$dynamic_css .='.site-loading {
			background-color: '.$custom_loading_backcolor.';
		}';

		$dynamic_css .='.logo-loading .loading-bar:after,
		.loading-bar-full:after {
			background-color: '.$custom_loading_color.';
		}';

		$dynamic_css .='#et-signature-custom {max-width:272px;width:272px;}';
		$dynamic_css .='#et-signature-custom svg path {stroke: '.$custom_loading_color.';animation: pathAnimateStroke 3s cubic-bezier(0.785, 0.135, 0.150, 0.860) forwards 1s, pathAnimateFillCustom 0.6s ease-in-out forwards 2.5s;}
		@keyframes pathAnimateFillCustom {0% {fill:transparent;}100% {fill:'.$custom_loading_color.';stroke:transparent;}}';

	/* Under const.
	---------------*/

		$under_construction_back_col   = (isset($GLOBALS['goodresto_enovathemes']['under-construction-back']['background-color']) && $GLOBALS['goodresto_enovathemes']['under-construction-back']['background-color']) ? $GLOBALS['goodresto_enovathemes']['under-construction-back']['background-color'] : "#ffffff";
		$under_construction_back_img   = (isset($GLOBALS['goodresto_enovathemes']['under-construction-back']['background-image']) && $GLOBALS['goodresto_enovathemes']['under-construction-back']['background-image']) ? esc_url($GLOBALS['goodresto_enovathemes']['under-construction-back']['background-image']) : "";
		$under_construction_back_r     = (isset($GLOBALS['goodresto_enovathemes']['under-construction-back']['background-repeat']) && $GLOBALS['goodresto_enovathemes']['under-construction-back']['background-repeat']) ? $GLOBALS['goodresto_enovathemes']['under-construction-back']['background-repeat'] : "no-repeat";
		$under_construction_back_s     = (isset($GLOBALS['goodresto_enovathemes']['under-construction-back']['background-size']) && $GLOBALS['goodresto_enovathemes']['under-construction-back']['background-size']) ? $GLOBALS['goodresto_enovathemes']['under-construction-back']['background-size'] : "inherit";
		$under_construction_back_a     = (isset($GLOBALS['goodresto_enovathemes']['under-construction-back']['background-attachment']) && $GLOBALS['goodresto_enovathemes']['under-construction-back']['background-attachment']) ? $GLOBALS['goodresto_enovathemes']['under-construction-back']['background-attachment'] : "inherit";
		$under_construction_back_p     = (isset($GLOBALS['goodresto_enovathemes']['under-construction-back']['background-position']) && $GLOBALS['goodresto_enovathemes']['under-construction-back']['background-position']) ? $GLOBALS['goodresto_enovathemes']['under-construction-back']['background-position'] : "left top";

		$dynamic_css .='.under-construction {
			background-color:'.$under_construction_back_col.';';
			if(!empty($under_construction_back_img)){
				$dynamic_css .='background-image:url('.$under_construction_back_img.');
				background-repeat:'.$under_construction_back_r.';
				background-attachment: '.$under_construction_back_a.';
				-webkit-background-size: '.$under_construction_back_s.';
				-moz-background-size: '.$under_construction_back_s.';
				background-size: '.$under_construction_back_s.';
				background-position:'.$under_construction_back_p;
			}
		$dynamic_css .='}';

	/* Forms
	---------------*/

		/* General
		---------------*/

			$form_text_color_reg         = (isset($GLOBALS['goodresto_enovathemes']['form-text-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['form-text-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['form-text-color']['regular'] : '#757575';
			$form_text_color_hov         = (isset($GLOBALS['goodresto_enovathemes']['form-text-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['form-text-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['form-text-color']['hover'] : '#757575';
			$form_back_color_reg         = (isset($GLOBALS['goodresto_enovathemes']['form-back-color']['regular']) && $GLOBALS['goodresto_enovathemes']['form-back-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['form-back-color']['regular'] : "#ffffff";
			$form_back_color_hov         = (isset($GLOBALS['goodresto_enovathemes']['form-back-color']['hover']) && $GLOBALS['goodresto_enovathemes']['form-back-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['form-back-color']['hover'] : "#ffffff";
			$form_border_color_reg       = (isset($GLOBALS['goodresto_enovathemes']['form-border-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['form-border-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['form-border-color']['regular'] : "#e0e0e0";
			$form_border_color_hov       = (isset($GLOBALS['goodresto_enovathemes']['form-border-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['form-border-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['form-border-color']['hover'] : "#bdbdbd";

			$form_button_typo_font_family  	   = (isset($GLOBALS['goodresto_enovathemes']['form-button-typo']['font-family']) && !empty($GLOBALS['goodresto_enovathemes']['form-button-typo']['font-family'])) ? $GLOBALS['goodresto_enovathemes']['form-button-typo']['font-family'] : "'Cabin Condensed', sans-serif";
			$form_button_typo_font_weight  	   = (isset($GLOBALS['goodresto_enovathemes']['form-button-typo']['font-weight']) && !empty($GLOBALS['goodresto_enovathemes']['form-button-typo']['font-weight'])) ? $GLOBALS['goodresto_enovathemes']['form-button-typo']['font-weight'] : "700";
			$form_button_typo_letter_spacing   = (isset($GLOBALS['goodresto_enovathemes']['form-button-typo']['letter-spacing']) && !empty($GLOBALS['goodresto_enovathemes']['form-button-typo']['letter-spacing'])) ? $GLOBALS['goodresto_enovathemes']['form-button-typo']['letter-spacing'] : "1px";
			$form_button_color_reg             = (isset($GLOBALS['goodresto_enovathemes']['form-button-color']['regular']) && $GLOBALS['goodresto_enovathemes']['form-button-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['form-button-color']['regular'] : "#ffffff";
			$form_button_color_hov             = (isset($GLOBALS['goodresto_enovathemes']['form-button-color']['hover']) && $GLOBALS['goodresto_enovathemes']['form-button-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['form-button-color']['hover'] : "#ffffff";
			$form_button_back_reg              = (isset($GLOBALS['goodresto_enovathemes']['form-button-back']['regular']) && $GLOBALS['goodresto_enovathemes']['form-button-back']['regular']) ? $GLOBALS['goodresto_enovathemes']['form-button-back']['regular'] : "#212121";
			$form_button_back_hov              = (isset($GLOBALS['goodresto_enovathemes']['form-button-back']['hover']) && $GLOBALS['goodresto_enovathemes']['form-button-back']['hover']) ? $GLOBALS['goodresto_enovathemes']['form-button-back']['hover'] : "#d3a471";
			$form_button_border_radius         = (isset($GLOBALS['goodresto_enovathemes']['form-button-radius']) && $GLOBALS['goodresto_enovathemes']['form-button-radius']) ? $GLOBALS['goodresto_enovathemes']['form-button-radius'] : "0";
			$form_button_border_width          = (isset($GLOBALS['goodresto_enovathemes']['form-button-width']) && $GLOBALS['goodresto_enovathemes']['form-button-width']) ? $GLOBALS['goodresto_enovathemes']['form-button-width'] : "0";
			$form_button_border_color_reg      = (isset($GLOBALS['goodresto_enovathemes']['form-button-border-color']['regular']) && $GLOBALS['goodresto_enovathemes']['form-button-border-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['form-button-border-color']['regular'] : "";
			$form_button_border_color_hov      = (isset($GLOBALS['goodresto_enovathemes']['form-button-border-color']['hover']) && $GLOBALS['goodresto_enovathemes']['form-button-border-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['form-button-border-color']['hover'] : "";

			$dynamic_css .='textarea, select,
			 input[type="date"], input[type="datetime"],
			 input[type="datetime-local"], input[type="email"],
			 input[type="month"], input[type="number"],
			 input[type="password"], input[type="search"],
			 input[type="tel"], input[type="text"],
			 input[type="time"], input[type="url"],
			 input[type="week"], input[type="file"] {
				color:'.$form_text_color_reg.';
				background-color:'.$form_back_color_reg.';
				border-color:'.$form_border_color_reg.';
			}';

			$dynamic_css .='.tech-page-search-form .search-icon,
			.widget_search form input[type="submit"]#searchsubmit + .search-icon, 
			.widget_product_search form input[type="submit"] + .search-icon {
				color:'.$form_text_color_reg.' !important;
			}';

			$dynamic_css .='.select2-container--default .select2-selection--single {
				color:'.$form_text_color_reg.' !important;
				background-color:'.$form_back_color_reg.' !important;
				border-color:'.$form_border_color_reg.' !important;
			}';

			$dynamic_css .='.select2-container--default .select2-selection--single .select2-selection__rendered{
				color:'.$form_text_color_reg.' !important;
			}';

			$dynamic_css .='.select2-dropdown,
			.select2-container--default .select2-search--dropdown .select2-search__field {
				background-color:'.$form_back_color_reg.' !important;
			}';

			$dynamic_css .='textarea:focus, select:focus,
			 input[type="date"]:focus, input[type="datetime"]:focus,
			 input[type="datetime-local"]:focus, input[type="email"]:focus,
			 input[type="month"]:focus, input[type="number"]:focus,
			 input[type="password"]:focus, input[type="search"]:focus,
			 input[type="tel"]:focus, input[type="text"]:focus,
			 input[type="time"]:focus, input[type="url"]:focus,
			 input[type="week"]:focus, input[type="file"]:focus {
				color:'.$form_text_color_hov.';
				border-color:'.$form_border_color_hov.';
				background-color:'.$form_back_color_hov.';';
			$dynamic_css .='}';

			$dynamic_css .='.tech-page-search-form [type="submit"]#searchsubmit:hover + .search-icon,
			.widget_search form input[type="submit"]#searchsubmit:hover + .search-icon, 
			.widget_product_search form input[type="submit"]:hover + .search-icon {
				color:'.$form_text_color_hov.' !important;
			}';

			$dynamic_css .='.select2-container--default .select2-selection--single:focus {
				color:'.$form_text_color_hov.' !important;
				border-color:'.$form_border_color_hov.' !important;
				background-color:'.$form_back_color_hov.' !important;';
			$dynamic_css .='}';

			$dynamic_css .='.select2-container--default .select2-selection--single .select2-selection__rendered:focus{
				color:'.$form_text_color_hov.' !important;
			}';

			$dynamic_css .='.select2-dropdown:focus,
			.select2-container--default .select2-search--dropdown .select2-search__field:focus {
				background-color:'.$form_back_color_hov.' !important;
			}';

			$dynamic_css .='input[type="button"],
			 input[type="reset"],
			 input[type="submit"],
			 button,
			 a.checkout-button,
			 .return-to-shop a,
			 .wishlist_table .product-add-to-cart a,
			 .wishlist_table .yith-wcqv-button,
			 a.woocommerce-button,
			 #page-links > a,
			 .edit-link a,
			 .event-link,
			 .mobile-navigation .cart-contents,
			 .page-content-wrap .woocommerce-mini-cart__buttons > a,
			 .desk-menu > ul > [data-mm="true"] > .sub-menu .woocommerce-mini-cart__buttons > a.button,
			 .mobile-navigation .woocommerce-mini-cart__buttons > a.button,
			 .site-sidebar .woocommerce-mini-cart__buttons > a.button,
			 .woocommerce .wishlist_table td.product-add-to-cart a,
			 .desk-menu ul ul > li[data-button="true"] a,
			 .follow-button,
			 .error404-button {
				color:'.$form_button_color_reg.' !important;
				font-family:'.$form_button_typo_font_family.'; 
				font-weight:'.$form_button_typo_font_weight.'; 
				letter-spacing:'.$form_button_typo_letter_spacing.'; 
				border-radius:'.$form_button_border_radius.'px !important; 
				background-color:'.$form_button_back_reg.';';
				if (!empty($form_button_border_width) && !empty($form_button_border_color_reg)) {
					$dynamic_css .='box-shadow:inset 0 0 0 '.$form_button_border_width.'px '.$form_button_border_color_reg.';';
				}
			$dynamic_css .='}';

			if ($form_button_back_reg == "transparent" || empty($form_button_back_reg)) {
				$dynamic_css .='.event-booking-form .sending,
				.et-booking-form .sending {
					border-radius:'.$form_button_border_radius.'px !important; 
					background-color:'.$form_button_color_reg.';';
				$dynamic_css .='}';
			} else {
				$dynamic_css .='.event-booking-form .sending,
				.et-booking-form .sending {
					border-radius:'.$form_button_border_radius.'px !important; 
					background-color:'.$form_button_back_reg.';';
				$dynamic_css .='}';
			}

			if ($form_button_back_hov == "transparent" || empty($form_button_back_hov)) {
				$dynamic_css .='.event-booking-form .sending:hover,
				.et-booking-form .sending:hover {
					background-color:'.$form_button_color_hov.';';
				$dynamic_css .='}';
			} else {
				$dynamic_css .='.event-booking-form .sending:hover,
				.et-booking-form .sending:hover {
					background-color:'.$form_button_back_hov.';';
				$dynamic_css .='}';
			}

			$dynamic_css .='.post-read-more,
			.comment-reply-link,
			.et-ajax-loader,
			.enovathemes-filter .filter,
			.enovathemes-filter .filter:before,
			.header-top .top-button,
			.menu-under-logo-true .header-button,
			.desk-menu > ul > li > a.menu-item-button,
			.woo-cart .woocommerce-mini-cart__buttons > a,
			.product-loop-button,
			.added_to_cart,
			.et-button,
			.et-button-3d {
				font-family:'.$form_button_typo_font_family.'; 
				font-weight:'.$form_button_typo_font_weight.'; 
				letter-spacing:'.$form_button_typo_letter_spacing.';
				border-radius:'.$form_button_border_radius.'px !important;
			}';

			$dynamic_css .='input[type="button"]:hover,
			input[type="reset"]:hover,
			input[type="submit"]:hover,
			button:hover,
			a.checkout-button:hover,
			.return-to-shop a:hover,
			.wishlist_table .product-add-to-cart a:hover,
			.wishlist_table .yith-wcqv-button:hover,
			a.woocommerce-button:hover,
			.woocommerce-mini-cart__buttons > a:hover,
			#page-links > a:hover,
			.edit-link a:hover,
			.et-ajax-loader:hover,
			.event-link:hover,
			.mobile-navigation .cart-contents:hover,
			.page-content-wrap .woocommerce-mini-cart__buttons > a:hover,
			.woocommerce .wishlist_table td.product-add-to-cart a:hover,
			.follow-button:hover,
			 .error404-button:hover {
				color:'.$form_button_color_hov.' !important;
				background-color:'.$form_button_back_hov.';';
				if (!empty($form_button_border_width) && !empty($form_button_border_color_hov)) {
					$dynamic_css .='box-shadow:inset 0 0 0 '.$form_button_border_width.'px '.$form_button_border_color_hov.';';
				}
			$dynamic_css .='}';

			$dynamic_css .='.et-ajax-loader.loading:hover:after {
				border: 2px solid '.$form_button_color_hov.';
			}';

			/* Woocoommerce
			-----------------*/

				$dynamic_css .='.widget_price_filter .ui-slider .ui-slider-handle {
					background-color:'.$form_button_back_reg.';
				}';

		/* Footer form corrections
		---------------*/

			$footer_form_text_color_reg          = (isset($GLOBALS['goodresto_enovathemes']['footer-form-text-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['footer-form-text-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['footer-form-text-color']['regular'] : '#9e9e9e';
			$footer_form_text_color_hov          = (isset($GLOBALS['goodresto_enovathemes']['footer-form-text-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['footer-form-text-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['footer-form-text-color']['hover'] : '#757575';
			$footer_form_back_color_reg          = (isset($GLOBALS['goodresto_enovathemes']['footer-form-back-color']['regular']) && $GLOBALS['goodresto_enovathemes']['footer-form-back-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['footer-form-back-color']['regular'] : "transparent";
			$footer_form_back_color_hov          = (isset($GLOBALS['goodresto_enovathemes']['footer-form-back-color']['hover']) && $GLOBALS['goodresto_enovathemes']['footer-form-back-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['footer-form-back-color']['hover'] : "transparent";
			$footer_form_border_color_reg        = (isset($GLOBALS['goodresto_enovathemes']['footer-form-border-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['footer-form-border-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['footer-form-border-color']['regular'] : "transparent";
			$footer_form_border_color_hov        = (isset($GLOBALS['goodresto_enovathemes']['footer-form-border-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['footer-form-border-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['footer-form-border-color']['hover'] : "transparent";

			$footer_form_button_color_reg        = (isset($GLOBALS['goodresto_enovathemes']['footer-form-button-color']['regular']) && $GLOBALS['goodresto_enovathemes']['footer-form-button-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['footer-form-button-color']['regular'] : "#ffffff";
			$footer_form_button_color_hov        = (isset($GLOBALS['goodresto_enovathemes']['footer-form-button-color']['hover']) && $GLOBALS['goodresto_enovathemes']['footer-form-button-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['footer-form-button-color']['hover'] : "#212121";
			$footer_form_button_back_reg         = (isset($GLOBALS['goodresto_enovathemes']['footer-form-button-back']['regular']) && $GLOBALS['goodresto_enovathemes']['footer-form-button-back']['regular']) ? $GLOBALS['goodresto_enovathemes']['footer-form-button-back']['regular'] : "#d3a471";
			$footer_form_button_back_hov         = (isset($GLOBALS['goodresto_enovathemes']['footer-form-button-back']['hover']) && $GLOBALS['goodresto_enovathemes']['footer-form-button-back']['hover']) ? $GLOBALS['goodresto_enovathemes']['footer-form-button-back']['hover'] : "#ffffff";
			$footer_form_button_border_color_reg = (isset($GLOBALS['goodresto_enovathemes']['footer-form-button-border-color']['regular']) && $GLOBALS['goodresto_enovathemes']['footer-form-button-border-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['footer-form-button-border-color']['regular'] : "";
			$footer_form_button_border_color_hov = (isset($GLOBALS['goodresto_enovathemes']['footer-form-button-border-color']['hover']) && $GLOBALS['goodresto_enovathemes']['footer-form-button-border-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['footer-form-button-border-color']['hover'] : "";

			$dynamic_css .='.footer textarea, .footer select,
			 .footer input[type="date"], .footer input[type="datetime"],
			 .footer input[type="datetime-local"], .footer input[type="email"],
			 .footer input[type="month"], .footer input[type="number"],
			 .footer input[type="password"], .footer input[type="search"],
			 .footer input[type="tel"], .footer input[type="text"],
			 .footer input[type="time"], .footer input[type="url"],
			 .footer input[type="week"], .footer input[type="file"] {
				color:'.$footer_form_text_color_reg.';
				background-color:'.$footer_form_back_color_reg.';
			}';

			$dynamic_css .='.footer textarea:focus, .footer select:focus,
			 .footer input[type="date"]:focus, .footer input[type="datetime"]:focus,
			 .footer input[type="datetime-local"]:focus, .footer input[type="email"]:focus,
			 .footer input[type="month"]:focus, .footer input[type="number"]:focus,
			 .footer input[type="password"]:focus, .footer input[type="search"]:focus,
			 .footer input[type="tel"]:focus, .footer input[type="text"]:focus,
			 .footer input[type="time"]:focus, .footer input[type="url"]:focus,
			 .footer input[type="week"]:focus, .footer input[type="file"]:focus {
				color:'.$footer_form_text_color_hov.';
				border-color:'.$footer_form_border_color_hov.';
				background-color:'.$footer_form_back_color_hov.';';
			$dynamic_css .='}';

			$dynamic_css .='.footer input[type="button"],
			 .footer input[type="reset"],
			 .footer input[type="submit"],
			 .footer button,
			 .footer a.checkout-button,
			 .footer a.woocommerce-button,
			 .footer .widget_shopping_cart .woocommerce-mini-cart__buttons > a.button {
				color:'.$footer_form_button_color_reg.' !important;
				background-color:'.$footer_form_button_back_reg.';';
				if (!empty($form_button_border_width) && !empty($footer_form_button_border_color_reg)) {
					$dynamic_css .='box-shadow:inset 0 0 0 '.$form_button_border_width.'px '.$footer_form_button_border_color_reg.';';
				}
			$dynamic_css .='}';

			$dynamic_css .='.footer .widget_shopping_cart .woocommerce-mini-cart__buttons > a.button {
				color:'.$footer_form_button_color_reg.' !important;
			}';

			$dynamic_css .='.footer input[type="button"]:hover,
			.footer input[type="reset"]:hover,
			.footer input[type="submit"]:hover,
			.footer button:hover,
			.footer a.checkout-button:hover,
			.footer a.woocommerce-button:hover,
			.footer .widget_shopping_cart .woocommerce-mini-cart__buttons > a.button:hover {
				color:'.$footer_form_button_color_hov.' !important;
				background-color:'.$footer_form_button_back_hov.';';
				if (!empty($form_button_border_width) && !empty($footer_form_button_border_color_hov)) {
					$dynamic_css .='box-shadow:inset 0 0 0 '.$form_button_border_width.'px '.$footer_form_button_border_color_hov.';';
				}
			$dynamic_css .='}';

			$dynamic_css .='.footer .widget_shopping_cart .woocommerce-mini-cart__buttons > a.button:hover {
				color:'.$footer_form_button_color_hov.' !important;
			}';

			/* Woocoommerce
			-----------------*/

				$dynamic_css .='.footer .widget_search form input[type="submit"]#searchsubmit + .search-icon, 
				.footer .widget_product_search form button:before {
					color:'.$footer_form_text_color_reg.';
				}';

		/* Sidebar form corrections
		---------------*/

			$sidebar_form_text_color_reg          = (isset($GLOBALS['goodresto_enovathemes']['sidebar-form-text-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-form-text-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-form-text-color']['regular'] : '#9e9e9e';
			$sidebar_form_text_color_hov          = (isset($GLOBALS['goodresto_enovathemes']['sidebar-form-text-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-form-text-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-form-text-color']['hover'] : '#757575';
			$sidebar_form_back_color_reg          = (isset($GLOBALS['goodresto_enovathemes']['sidebar-form-back-color']['regular']) && $GLOBALS['goodresto_enovathemes']['sidebar-form-back-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['sidebar-form-back-color']['regular'] : "transparent";
			$sidebar_form_back_color_hov          = (isset($GLOBALS['goodresto_enovathemes']['sidebar-form-back-color']['hover']) && $GLOBALS['goodresto_enovathemes']['sidebar-form-back-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['sidebar-form-back-color']['hover'] : "transparent";
			$sidebar_form_border_color_reg        = (isset($GLOBALS['goodresto_enovathemes']['sidebar-form-border-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-form-border-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-form-border-color']['regular'] : "transparent";
			$sidebar_form_border_color_hov        = (isset($GLOBALS['goodresto_enovathemes']['sidebar-form-border-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-form-border-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-form-border-color']['hover'] : "transparent";

			$sidebar_form_button_color_reg        = (isset($GLOBALS['goodresto_enovathemes']['sidebar-form-button-color']['regular']) && $GLOBALS['goodresto_enovathemes']['sidebar-form-button-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['sidebar-form-button-color']['regular'] : "#ffffff";
			$sidebar_form_button_color_hov        = (isset($GLOBALS['goodresto_enovathemes']['sidebar-form-button-color']['hover']) && $GLOBALS['goodresto_enovathemes']['sidebar-form-button-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['sidebar-form-button-color']['hover'] : "#212121";
			$sidebar_form_button_back_reg         = (isset($GLOBALS['goodresto_enovathemes']['sidebar-form-button-back']['regular']) && $GLOBALS['goodresto_enovathemes']['sidebar-form-button-back']['regular']) ? $GLOBALS['goodresto_enovathemes']['sidebar-form-button-back']['regular'] : "#d3a471";
			$sidebar_form_button_back_hov         = (isset($GLOBALS['goodresto_enovathemes']['sidebar-form-button-back']['hover']) && $GLOBALS['goodresto_enovathemes']['sidebar-form-button-back']['hover']) ? $GLOBALS['goodresto_enovathemes']['sidebar-form-button-back']['hover'] : "#ffffff";
			$sidebar_form_button_border_color_reg = (isset($GLOBALS['goodresto_enovathemes']['sidebar-form-button-border-color']['regular']) && $GLOBALS['goodresto_enovathemes']['sidebar-form-button-border-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['sidebar-form-button-border-color']['regular'] : "";
			$sidebar_form_button_border_color_hov = (isset($GLOBALS['goodresto_enovathemes']['sidebar-form-button-border-color']['hover']) && $GLOBALS['goodresto_enovathemes']['sidebar-form-button-border-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['sidebar-form-button-border-color']['hover'] : "";

			$dynamic_css .='.site-sidebar textarea, .site-sidebar select,
			 .site-sidebar input[type="date"], .site-sidebar input[type="datetime"],
			 .site-sidebar input[type="datetime-local"], .site-sidebar input[type="email"],
			 .site-sidebar input[type="month"], .site-sidebar input[type="number"],
			 .site-sidebar input[type="password"], .site-sidebar input[type="search"],
			 .site-sidebar input[type="tel"], .site-sidebar input[type="text"],
			 .site-sidebar input[type="time"], .site-sidebar input[type="url"],
			 .site-sidebar input[type="week"], .site-sidebar input[type="file"] {
				color:'.$sidebar_form_text_color_reg.';
				background-color:'.$sidebar_form_back_color_reg.';
			}';

			$dynamic_css .='.site-sidebar textarea:focus, .site-sidebar select:focus,
			 .site-sidebar input[type="date"]:focus, .site-sidebar input[type="datetime"]:focus,
			 .site-sidebar input[type="datetime-local"]:focus, .site-sidebar input[type="email"]:focus,
			 .site-sidebar input[type="month"]:focus, .site-sidebar input[type="number"]:focus,
			 .site-sidebar input[type="password"]:focus, .site-sidebar input[type="search"]:focus,
			 .site-sidebar input[type="tel"]:focus, .site-sidebar input[type="text"]:focus,
			 .site-sidebar input[type="time"]:focus, .site-sidebar input[type="url"]:focus,
			 .site-sidebar input[type="week"]:focus, .site-sidebar input[type="file"]:focus {
				color:'.$sidebar_form_text_color_hov.';
				border-color:'.$sidebar_form_border_color_hov.';
				background-color:'.$sidebar_form_back_color_hov.';';
			$dynamic_css .='}';

			$dynamic_css .='.site-sidebar input[type="button"],
			 .site-sidebar input[type="reset"],
			 .site-sidebar input[type="submit"],
			 .site-sidebar button,
			 .site-sidebar a.checkout-button,
			 .site-sidebar a.woocommerce-button,
			 .site-sidebar .widget_shopping_cart .woocommerce-mini-cart__buttons > a.button {
				color:'.$sidebar_form_button_color_reg.' !important;
				background-color:'.$sidebar_form_button_back_reg.';';
				if (!empty($form_button_border_width) && !empty($sidebar_form_button_border_color_reg)) {
					$dynamic_css .='box-shadow:inset 0 0 0 '.$form_button_border_width.'px '.$sidebar_form_button_border_color_reg.';';
				}
			$dynamic_css .='}';

			$dynamic_css .='.site-sidebar .widget_shopping_cart .woocommerce-mini-cart__buttons > a.button {
				color:'.$sidebar_form_button_color_reg.' !important;
			}';

			$dynamic_css .='.site-sidebar input[type="button"]:hover,
			.site-sidebar input[type="reset"]:hover,
			.site-sidebar input[type="submit"]:hover,
			.site-sidebar button:hover,
			.site-sidebar a.checkout-button:hover,
			.site-sidebar a.woocommerce-button:hover,
			.site-sidebar .widget_shopping_cart .woocommerce-mini-cart__buttons > a.button:hover {
				color:'.$sidebar_form_button_color_hov.' !important;
				background-color:'.$sidebar_form_button_back_hov.';';
				if (!empty($form_button_border_width) && !empty($sidebar_form_button_border_color_hov)) {
					$dynamic_css .='box-shadow:inset 0 0 0 '.$form_button_border_width.'px '.$sidebar_form_button_border_color_hov.';';
				}
			$dynamic_css .='}';

			$dynamic_css .='.site-sidebar .widget_shopping_cart .woocommerce-mini-cart__buttons > a.button:hover {
				color:'.$sidebar_form_button_color_hov.' !important;
			}';

			/* Woocoommerce
			-----------------*/

				$dynamic_css .='.site-sidebar .widget_search form input[type="submit"]#searchsubmit + .search-icon, 
				.site-sidebar .widget_product_search form button:before {
					color:'.$sidebar_form_text_color_reg.';
				}';

	/* Sidebar
	---------------*/

		$sidebar_background_color = (isset($GLOBALS['goodresto_enovathemes']['sidebar-back-color']) && $GLOBALS['goodresto_enovathemes']['sidebar-back-color']) ? $GLOBALS['goodresto_enovathemes']['sidebar-back-color'] : "#212121";
		
		$sidebar_width          = (isset($GLOBALS['goodresto_enovathemes']['sidebar-width']) && $GLOBALS['goodresto_enovathemes']['sidebar-width']) ? $GLOBALS['goodresto_enovathemes']['sidebar-width'] : '320';
		$sidebar_padding_top    = (isset($GLOBALS['goodresto_enovathemes']['sidebar-padding']['padding-top']) && $GLOBALS['goodresto_enovathemes']['sidebar-padding']['padding-top']) ? $GLOBALS['goodresto_enovathemes']['sidebar-padding']['padding-top'] : '0';       
		$sidebar_padding_bottom = (isset($GLOBALS['goodresto_enovathemes']['sidebar-padding']['padding-bottom']) && $GLOBALS['goodresto_enovathemes']['sidebar-padding']['padding-bottom']) ? $GLOBALS['goodresto_enovathemes']['sidebar-padding']['padding-bottom'] : '0';       
		$sidebar_padding_left   = (isset($GLOBALS['goodresto_enovathemes']['sidebar-padding']['padding-left']) && $GLOBALS['goodresto_enovathemes']['sidebar-padding']['padding-left']) ? $GLOBALS['goodresto_enovathemes']['sidebar-padding']['padding-left'] : '0';       
		$sidebar_padding_right  = (isset($GLOBALS['goodresto_enovathemes']['sidebar-padding']['padding-right']) && $GLOBALS['goodresto_enovathemes']['sidebar-padding']['padding-right']) ? $GLOBALS['goodresto_enovathemes']['sidebar-padding']['padding-right'] : '0';       

		$dynamic_css .='.site-sidebar {
			background-color:'.$sidebar_background_color.';
			padding-top:'.$sidebar_padding_top.';
			padding-bottom:'.$sidebar_padding_bottom.';
			padding-right:'.$sidebar_padding_right.';
			padding-left:'.$sidebar_padding_left.';
		}';

		$sidebar_widgets_text_color     = (isset($GLOBALS['goodresto_enovathemes']['sidebar-widgets-text-color']) && $GLOBALS['goodresto_enovathemes']['sidebar-widgets-text-color']) ? $GLOBALS['goodresto_enovathemes']['sidebar-widgets-text-color'] : "#bdbdbd";
		$sidebar_widgets_title_color    = (isset($GLOBALS['goodresto_enovathemes']['sidebar-widgets-title-color']) && $GLOBALS['goodresto_enovathemes']['sidebar-widgets-title-color']) ? $GLOBALS['goodresto_enovathemes']['sidebar-widgets-title-color'] : "#ffffff";
		$sidebar_widgets_link_color_reg = (isset($GLOBALS['goodresto_enovathemes']['sidebar-widgets-link-color']['regular']) && $GLOBALS['goodresto_enovathemes']['sidebar-widgets-link-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['sidebar-widgets-link-color']['regular'] : "#bdbdbd";
		$sidebar_widgets_link_color_hov = (isset($GLOBALS['goodresto_enovathemes']['sidebar-widgets-link-color']['hover']) && $GLOBALS['goodresto_enovathemes']['sidebar-widgets-link-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['sidebar-widgets-link-color']['hover'] : "#ffffff";

		$dynamic_css .='.site-sidebar .widget {
			color:'.$sidebar_widgets_text_color.';
		}';

		$dynamic_css .='.site-sidebar .widget_title {
			color:'.$sidebar_widgets_title_color.';
		}';

		$dynamic_css .='.site-sidebar .widget a,
		.mobile-site-sidebar-toggle {
			color:'.$sidebar_widgets_link_color_reg.';
		}';

		$dynamic_css .='.site-sidebar .widget a:hover,
		.mobile-site-sidebar-toggle:hover {
			color:'.$sidebar_widgets_link_color_hov.';
		}';

		$dynamic_css .='.site-sidebar .widget_twitter .tweet-time,
		.site-sidebar .widget_categories ul li a,
		.site-sidebar .widget_pages ul li a,
		.site-sidebar .widget_archive ul li a,
		.site-sidebar .widget_meta ul li a,
		.site-sidebar .widget_layered_nav ul li a,
		.site-sidebar .widget_nav_menu ul li a,
		.site-sidebar .widget_product_categories ul li a,
		.site-sidebar .widget_recent_entries ul li a, 
		.site-sidebar .widget_rss ul li a,
		.site-sidebar .widget_icl_lang_sel_widget li a,
		.site-sidebar .recentcomments a,
		.site-sidebar .widget_et_recent_entries .post-title a {
			color:'.$sidebar_widgets_text_color.' !important;
		}';

		$dynamic_css .='.site-sidebar .widget_twitter li:before,
		.site-sidebar .widget_recent_comments li:before,
		.site-sidebar .wp-caption-text, .site-sidebar .gallery-caption {
			color: '.$sidebar_widgets_text_color.';
		}';

		$dynamic_css .='.site-sidebar .widget_et_recent_entries .post-title:hover a,
		.site-sidebar .widget_et_recent_entries .post-date a:hover,
		.site-sidebar .widget_twitter .tweet-time:hover,
		.site-sidebar .widget_categories ul li a:hover,
		.site-sidebar .widget_pages ul li a:hover,
		.site-sidebar .widget_archive ul li a:hover,
		.site-sidebar .widget_meta ul li a:hover,
		.site-sidebar .widget_layered_nav ul li a:hover,
		.site-sidebar .widget_nav_menu ul li a:hover,
		.site-sidebar .widget_product_categories ul li a:hover,
		.site-sidebar .widget_recent_entries ul li a:hover, 
		.site-sidebar .widget_rss ul li a:hover,
		.site-sidebar .widget_icl_lang_sel_widget li a:hover,
		.site-sidebar .recentcomments a:hover,
		.site-sidebar .widget_et_recent_entries .post-title a:hover {
			color: '.$sidebar_widgets_link_color_hov.' !important;
		}';

		$dynamic_css .='.site-sidebar .widget_tag_cloud .tagcloud a,
		.site-sidebar .widget_product_tag_cloud .tagcloud a,
		.site-sidebar .event-tags a {
			color:'.$sidebar_widgets_link_color_reg.' !important;
		}';

		$dynamic_css .='.site-sidebar .widget_tag_cloud .tagcloud a:hover,
		.site-sidebar .widget_product_tag_cloud .tagcloud a:hover,
		.site-sidebar .event-tags a:hover {
			color:'.$sidebar_widgets_link_color_hov.' !important;
		}';

		$dynamic_css .='.site-sidebar .widget_tag_cloud .tagcloud a:after,
		.site-sidebar .widget_product_tag_cloud .tagcloud a:after,
		.site-sidebar .event-tags a:after {
			background-color:'.$sidebar_widgets_link_color_reg.' !important;
		}';

		$dynamic_css .='.site-sidebar .widget_tag_cloud .tagcloud a:hover:after,
		.site-sidebar .widget_product_tag_cloud .tagcloud a:hover:after,
		.site-sidebar .event-tags a:hover:after {
			background-color:'.$sidebar_widgets_link_color_hov.' !important;
		}';

		$dynamic_css .='.site-sidebar .widget_nav_menu ul li a.animate + ul li:before, 
		.site-sidebar .widget_product_categories ul li a.animate + ul li:before {
		    background-color: '.goodresto_enovathemes_hex_to_rgba($sidebar_widgets_text_color,0.5).';
		}';

		$dynamic_css .='.site-sidebar .widget_icl_lang_sel_widget li a,
		.site-sidebar .widget_calendar caption,
		.site-sidebar .widget_calendar th:first-child,
		.site-sidebar .widget_calendar th:last-child,
		.site-sidebar .widget_calendar td {
		    border-color: '.goodresto_enovathemes_hex_to_rgba($sidebar_widgets_text_color,0.5).';
		}';

		$dynamic_css .='.site-sidebar .mejs-container, 
		.site-sidebar .mejs-container,
		.site-sidebar .mejs-controls, 
		.site-sidebar .mejs-embed, 
		.site-sidebar .mejs-embed body {
			background: '.goodresto_enovathemes_hex_to_rgb_shade($sidebar_background_color,-30).' !important;
		}';

		$dynamic_css .='.site-sidebar .widget_schedule ul li {
			color: '.$sidebar_widgets_text_color.';
		}';

		$dynamic_css .='.site-sidebar .widget_schedule ul li:nth-child(2n+1) {
			background: '.goodresto_enovathemes_hex_to_rgba($sidebar_widgets_text_color,0.1).' !important;
			color: '.$sidebar_widgets_text_color.';
		}';

		$dynamic_css .='.site-sidebar input[type="button"]:hover,
		.site-sidebar input[type="reset"]:hover,
		.site-sidebar input[type="submit"]:hover,
		.site-sidebar button:hover,
		.site-sidebar a.checkout-button:hover,
		.site-sidebar a.woocommerce-button:hover,
		.site-sidebar .woocommerce-mini-cart__buttons > a:hover {
			color:'.$sidebar_background_color.';
			background-color:'.$sidebar_widgets_link_color_hov.';';
			if (!empty($form_button_border_width)) {
				$dynamic_css .='box-shadow:inset 0 0 0 '.$form_button_border_width.'px '.$sidebar_widgets_link_color_hov.';';
				$dynamic_css .='background-color:transparent !important;';
				$dynamic_css .='color:'.$sidebar_widgets_link_color_hov.' !important;';
			}
		$dynamic_css .='}';

		$dynamic_css .='.site-sidebar .widget_fast_contact_widget .sending:before {
			border-top: 2px solid '.goodresto_enovathemes_hex_to_rgba($sidebar_widgets_text_color,0.1).';
			border-right: 2px solid '.goodresto_enovathemes_hex_to_rgba($sidebar_widgets_text_color,0.1).';
			border-bottom: 2px solid '.goodresto_enovathemes_hex_to_rgba($sidebar_widgets_text_color,0.1).';
			border-left: 2px solid '.goodresto_enovathemes_hex_to_rgba($sidebar_widgets_text_color,0.4).';
		}';

		/* Widget woocommerce
		---------------*/

			$dynamic_css .='.site-sidebar .widget_shopping_cart .cart-product-title > a,
			.site-sidebar .widget_shopping_cart .cart-product-title a .product-title,
			.site-sidebar .widget_products .product_list_widget > li > a .product-title, 
			.site-sidebar .widget_products .widget_recent_reviews .product_list_widget a, 
			.site-sidebar .widget_recently_viewed_products .product_list_widget > li a .product-title, 
			.site-sidebar .widget_recent_reviews .product_list_widget > li a .product-title, 
			.site-sidebar .widget_top_rated_products .product_list_widget > li a .product-title,
			.site-sidebar .widget_layered_nav ul li a,
			.site-sidebar .widget_layered_nav_filters li a,
			.site-sidebar .widget_shopping_cart .cart_list li .remove {
				color:'.$sidebar_widgets_text_color.' !important;
			}';

			$dynamic_css .='.site-sidebar .widget_shopping_cart .cart-product-title > a:hover,
			.site-sidebar .widget_shopping_cart .cart_list li .remove:hover .product-title,
			.site-sidebar .widget_products .product_list_widget > li > a:hover .product-title, 
			.site-sidebar .widget_recently_viewed_products .product_list_widget > li a:hover .product-title, 
			.site-sidebar .widget_recent_reviews .product_list_widget > li a:hover .product-title, 
			.site-sidebar .widget_top_rated_products .product_list_widget > li a:hover .product-title,
			.site-sidebar .widget_layered_nav_filters li:hover > a,
			.site-sidebar .widget_shopping_cart .cart_list li .remove:hover {
				color:'.$sidebar_widgets_link_color_hov.' !important;
			}';

			$dynamic_css .='.site-sidebar .widget_layered_nav li a {
                color:'.$sidebar_widgets_text_color.' !important;
            }';

            $dynamic_css .='.site-sidebar .woocommerce-mini-cart__total:before {
                background-color:'.goodresto_enovathemes_hex_to_rgba($sidebar_widgets_text_color,0.3).' !important;
            }';

            $dynamic_css .='.site-sidebar .widget_price_filter .price_slider_wrapper .ui-widget-content {
                background-color:'.goodresto_enovathemes_hex_to_rgba($sidebar_widgets_text_color,0.1).' !important;
            }';

            $dynamic_css .='.site-sidebar .star-rating:before {
                color:'.goodresto_enovathemes_hex_to_rgba($sidebar_widgets_text_color,0.3).' !important;
            }';

	/* Megamenu
	---------------*/

		$megamenu_top_typo_text_transform = (isset($GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['text-transform']) && !empty($GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['text-transform'])) ? $GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['text-transform'] : "uppercase";
		$megamenu_top_typo_letter_spacing = (isset($GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['letter-spacing']) && !empty($GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['letter-spacing'])) ? $GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['letter-spacing'] : "1px";
		$megamenu_top_typo_font_weight    = (isset($GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['font-weight']) && !empty($GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['font-weight'])) ? $GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['font-weight'] : "700";
		$megamenu_top_typo_font_family    = (isset($GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['font-family']) && !empty($GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['font-family'])) ? $GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['font-family'] : "'Cabin Condensed', sans-serif";
		$megamenu_top_typo_font_size      = (isset($GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['font-size']) && !empty($GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['font-size'])) ? $GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['font-size'] : "14px";
		$megamenu_top_typo_color          = (isset($GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['color']) && !empty($GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['color'])) ? $GLOBALS['goodresto_enovathemes']['megamenu-top-typo']['color'] : "#ffffff";
		$megamenu_top_border              = (isset($GLOBALS['goodresto_enovathemes']['megamenu-top-border']) && $GLOBALS['goodresto_enovathemes']['megamenu-top-border']) ? $GLOBALS['goodresto_enovathemes']['megamenu-top-border'] : '';
		$megamenu_links_color_reg         = (isset($GLOBALS['goodresto_enovathemes']['megamenu_links']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['megamenu_links']['regular'])) ? $GLOBALS['goodresto_enovathemes']['megamenu_links']['regular'] : '#9e9e9e';
		$megamenu_links_color_hov         = (isset($GLOBALS['goodresto_enovathemes']['megamenu_links']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['megamenu_links']['hover'])) ? $GLOBALS['goodresto_enovathemes']['megamenu_links']['hover'] : '#ffffff';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu li > a {
			color: '.$megamenu_links_color_reg.' !important;
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu li > a:hover {
			color: '.$megamenu_links_color_hov.' !important;
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu > li > a,
		.desk-menu > ul > [data-mm="true"] > .sub-menu > li > a:hover {
			text-transform: '.$megamenu_top_typo_text_transform.';
			font-weight: '.$megamenu_top_typo_font_weight.';
			font-family: '.$megamenu_top_typo_font_family.';
			font-size: '.$megamenu_top_typo_font_size.';
			letter-spacing: '.$megamenu_top_typo_letter_spacing.';
			color: '.$megamenu_top_typo_color.' !important;
		}';

		if (!empty($megamenu_top_border)) {
			$dynamic_css .='.desk-menu [data-mm="true"] > .sub-menu > li > a {
				padding: 8px 16px 32px 16px !important;
			}';

			$dynamic_css .='.desk-menu [data-mm="true"] > .sub-menu > li > a:before {';
				$dynamic_css .='background:'.$megamenu_top_border.';';
			$dynamic_css .='}';

			// $dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu > li:not(:last-child):after {
			// 	background-color: '.goodresto_enovathemes_hex_to_rgba($megamenu_top_typo_color,0.05).' !important;
			// }';
		}

	/* Header top
	---------------*/

		$header_top_height 				     = (isset($GLOBALS['goodresto_enovathemes']['header-top-height']) && !empty($GLOBALS['goodresto_enovathemes']['header-top-height'])) ? $GLOBALS['goodresto_enovathemes']['header-top-height'] : "48";
		$header_top_back_color 				 = (isset($GLOBALS['goodresto_enovathemes']['header-top-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['header-top-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['header-top-back-color']['color'],$GLOBALS['goodresto_enovathemes']['header-top-back-color']['alpha']) : "#212121";
		$header_top_border_color        	 = (isset($GLOBALS['goodresto_enovathemes']['header-top-border-color']['color']) && $GLOBALS['goodresto_enovathemes']['header-top-border-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['header-top-border-color']['color'],$GLOBALS['goodresto_enovathemes']['header-top-border-color']['alpha']) : "";
		$header_top_menu_color_reg      	 = (isset($GLOBALS['goodresto_enovathemes']['header-top-menu-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['header-top-menu-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['header-top-menu-color']['regular'] : '#bebebf';
		$header_top_menu_color_hov      	 = (isset($GLOBALS['goodresto_enovathemes']['header-top-menu-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['header-top-menu-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['header-top-menu-color']['hover'] : '#ffffff';
		$header_top_submenu_color_reg      	 = (isset($GLOBALS['goodresto_enovathemes']['header-top-submenu-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['header-top-submenu-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['header-top-submenu-color']['regular'] : '#bebebf';
		$header_top_submenu_color_hov      	 = (isset($GLOBALS['goodresto_enovathemes']['header-top-submenu-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['header-top-submenu-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['header-top-submenu-color']['hover'] : '#ffffff';
		$header_top_submenu_back_reg      	 = (isset($GLOBALS['goodresto_enovathemes']['header-top-submenu-back']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['header-top-submenu-back']['regular'])) ? $GLOBALS['goodresto_enovathemes']['header-top-submenu-back']['regular'] : '#212121';
		$header_top_submenu_back_hov      	 = (isset($GLOBALS['goodresto_enovathemes']['header-top-submenu-back']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['header-top-submenu-back']['hover'])) ? $GLOBALS['goodresto_enovathemes']['header-top-submenu-back']['hover'] : '#212121';
		$header_top_menu_typo_font_family    = (isset($GLOBALS['goodresto_enovathemes']['header-top-menu-typo']['font-family']) && !empty($GLOBALS['goodresto_enovathemes']['header-top-menu-typo']['font-family'])) ? $GLOBALS['goodresto_enovathemes']['header-top-menu-typo']['font-family'] : "'Cabin Condensed', sans-serif";    
		$header_top_menu_typo_font_weight    = (isset($GLOBALS['goodresto_enovathemes']['header-top-menu-typo']['font-weight']) && !empty($GLOBALS['goodresto_enovathemes']['header-top-menu-typo']['font-weight'])) ? $GLOBALS['goodresto_enovathemes']['header-top-menu-typo']['font-weight'] : '400';    
		$header_top_menu_typo_font_size      = (isset($GLOBALS['goodresto_enovathemes']['header-top-menu-typo']['font-size']) && !empty($GLOBALS['goodresto_enovathemes']['header-top-menu-typo']['font-size'])) ? $GLOBALS['goodresto_enovathemes']['header-top-menu-typo']['font-size'] : '16px';    
		$header_top_menu_typo_text_transform = (isset($GLOBALS['goodresto_enovathemes']['header-top-menu-typo']['text-transform']) && !empty($GLOBALS['goodresto_enovathemes']['header-top-menu-typo']['text-transform'])) ? $GLOBALS['goodresto_enovathemes']['header-top-menu-typo']['text-transform'] : 'none';    
		$header_top_menu_typo_letter_spacing = (isset($GLOBALS['goodresto_enovathemes']['header-top-menu-typo']['letter-spacing']) && !empty($GLOBALS['goodresto_enovathemes']['header-top-menu-typo']['letter-spacing'])) ? $GLOBALS['goodresto_enovathemes']['header-top-menu-typo']['letter-spacing'] : '1px';    
		$header_top_social_links_color_reg   = (isset($GLOBALS['goodresto_enovathemes']['header-top-social-links-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['header-top-social-links-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['header-top-social-links-color']['regular'] : '#abacae';
		$header_top_social_links_color_hov   = (isset($GLOBALS['goodresto_enovathemes']['header-top-social-links-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['header-top-social-links-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['header-top-social-links-color']['hover'] : '#ffffff';
		$header_top_button_text_color_reg    = (isset($GLOBALS['goodresto_enovathemes']['header-top-button-text-color']['regular']) && $GLOBALS['goodresto_enovathemes']['header-top-button-text-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['header-top-button-text-color']['regular'] : "#212121";
		$header_top_button_text_color_hov    = (isset($GLOBALS['goodresto_enovathemes']['header-top-button-text-color']['hover']) && $GLOBALS['goodresto_enovathemes']['header-top-button-text-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['header-top-button-text-color']['hover'] : "#ffffff";
		$header_top_button_back_color_reg    = (isset($GLOBALS['goodresto_enovathemes']['header-top-button-back-color']['regular']) && $GLOBALS['goodresto_enovathemes']['header-top-button-back-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['header-top-button-back-color']['regular'] : "#ffffff";
		$header_top_button_back_color_hov    = (isset($GLOBALS['goodresto_enovathemes']['header-top-button-back-color']['hover']) && $GLOBALS['goodresto_enovathemes']['header-top-button-back-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['header-top-button-back-color']['hover'] : "#d3a471";

		$dynamic_css .='.desk .header-top,
		.desk .header-top .slogan,
		.desk .header-top-menu > ul > li {
			height:'.$header_top_height.'px;
			line-height:'.$header_top_height.'px;
		}';

		$dynamic_css .='.header-top-menu ul li a {
			line-height:'.$header_top_height.'px;
		}';

		$dynamic_css .='.header-top-menu ul li ul {
			top:'.$header_top_height.'px;
		}';

		$dynamic_css .='.desk .header-top .top-button,
		.desk .header-top .header-social-links {
			margin-top:'.(($header_top_height - 32)/2).'px;
		}';

		$dynamic_css .='.header-top {
			background-color:'.$header_top_back_color.';
		}';

		if(!empty($header_top_border_color)){

			$dynamic_css .='.desk.border-box-false .header-top {
				border-bottom:1px solid '.$header_top_border_color.';
			}';

			$dynamic_css .='.desk.border-box-true .header-top > .container {
				border-bottom:1px solid '.$header_top_border_color.';
			}';

		}

		$dynamic_css .='.header-top .top-button {
			background-color:'.$header_top_button_back_color_reg.';
			color:'.$header_top_button_text_color_reg.';
		}';

		$dynamic_css .='.header-top .top-button:hover {
			color:'.$header_top_button_text_color_hov.';
			background-color:'.$header_top_button_back_color_hov.';
		}';

		$dynamic_css .='.header-top .header-top-menu a {
			color:'.$header_top_menu_color_reg.';
			font-weight:'.$header_top_menu_typo_font_weight.';
			font-family:'.$header_top_menu_typo_font_family.';
			font-size:'.$header_top_menu_typo_font_size.';
			text-transform:'.$header_top_menu_typo_text_transform.';
			letter-spacing:'.$header_top_menu_typo_letter_spacing.';
		}';

		$dynamic_css .='.header-top .header-top-menu li:hover > a {
			color:'.$header_top_menu_color_hov.';
		}';

		$dynamic_css .='.header-top .header-top-menu ul li ul a {
			color:'.$header_top_submenu_color_reg.';
			background-color:'.$header_top_submenu_back_reg.';
		}';

		$dynamic_css .='.header-top .header-top-menu ul li ul li:hover > a {
			color:'.$header_top_submenu_color_hov.';
			background-color:'.$header_top_submenu_back_hov.';
		}';

		$dynamic_css .='.header-top .header-top-menu ul li ul {
			background-color:'.$header_top_submenu_back_reg.';
		}';

		$dynamic_css .='.header-social-links a {
			color:'.$header_top_social_links_color_reg.';
		}';

		$dynamic_css .='.header-social-links a:hover {
			color:'.$header_top_social_links_color_hov.';
		}';

	/* Header & menu
	---------------*/

		$menu_under_logo_boxed_radius        = (isset($GLOBALS['goodresto_enovathemes']['menu-under-logo-boxed-radius']) && $GLOBALS['goodresto_enovathemes']['menu-under-logo-boxed-radius']) ? $GLOBALS['goodresto_enovathemes']['menu-under-logo-boxed-radius'] : "0";
		$menu_under_logo_height              = (isset($GLOBALS['goodresto_enovathemes']['menu-height']) && $GLOBALS['goodresto_enovathemes']['menu-height']) ? $GLOBALS['goodresto_enovathemes']['menu-height'] : "64";
		$logo_pos_hor                        = (isset($GLOBALS['goodresto_enovathemes']['logo-pos-hor']) && $GLOBALS['goodresto_enovathemes']['logo-pos-hor']) ? $GLOBALS['goodresto_enovathemes']['logo-pos-hor'] : "0";
		$logo_pos_ver                        = (isset($GLOBALS['goodresto_enovathemes']['logo-pos-ver']) && $GLOBALS['goodresto_enovathemes']['logo-pos-ver']) ? $GLOBALS['goodresto_enovathemes']['logo-pos-ver'] : "0";
		$header_height                       = (isset($GLOBALS['goodresto_enovathemes']['header-height']) && $GLOBALS['goodresto_enovathemes']['header-height']) ? $GLOBALS['goodresto_enovathemes']['header-height'] : "120";
		$header_icons_color                  = (isset($GLOBALS['goodresto_enovathemes']['header-icons-color']) && $GLOBALS['goodresto_enovathemes']['header-icons-color']) ? $GLOBALS['goodresto_enovathemes']['header-icons-color'] : "#b6b6b6";
		$language_switcher_width             = (isset($GLOBALS['goodresto_enovathemes']['language-switcher-width']['width']) && $GLOBALS['goodresto_enovathemes']['language-switcher-width']['width']) ? $GLOBALS['goodresto_enovathemes']['language-switcher-width']['width'] : "120px";
		$language_switcher_back_color        = (isset($GLOBALS['goodresto_enovathemes']['language-switcher-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['language-switcher-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['language-switcher-back-color']['color'],$GLOBALS['goodresto_enovathemes']['language-switcher-back-color']['alpha']) : "#ededed";
		$language_switcher_back_hov_color    = (isset($GLOBALS['goodresto_enovathemes']['language-switcher-back-hov-color']['color']) && $GLOBALS['goodresto_enovathemes']['language-switcher-back-hov-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['language-switcher-back-hov-color']['color'],$GLOBALS['goodresto_enovathemes']['language-switcher-back-hov-color']['alpha']) : "#859aeb";
		$language_switcher_text_color_reg    = (isset($GLOBALS['goodresto_enovathemes']['language-switcher-text-color']['regular']) && $GLOBALS['goodresto_enovathemes']['language-switcher-text-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['language-switcher-text-color']['regular'] : "#212121";
		$language_switcher_text_color_hov    = (isset($GLOBALS['goodresto_enovathemes']['language-switcher-text-color']['hover']) && $GLOBALS['goodresto_enovathemes']['language-switcher-text-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['language-switcher-text-color']['hover'] : "#ffffff";
		$language_switcher_typo_font_size    = (isset($GLOBALS['goodresto_enovathemes']['language-switcher-typo']['font-size']) && !empty($GLOBALS['goodresto_enovathemes']['language-switcher-typo']['font-size'])) ? $GLOBALS['goodresto_enovathemes']['language-switcher-typo']['font-size'] : "14px";
		$cart_bubble_text_color              = (isset($GLOBALS['goodresto_enovathemes']['cart-bubble-text-color']['color']) && $GLOBALS['goodresto_enovathemes']['cart-bubble-text-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['cart-bubble-text-color']['color'],$GLOBALS['goodresto_enovathemes']['cart-bubble-text-color']['alpha']) : "#ffffff";
		$cart_bubble_back_color              = (isset($GLOBALS['goodresto_enovathemes']['cart-bubble-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['cart-bubble-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['cart-bubble-back-color']['color'],$GLOBALS['goodresto_enovathemes']['cart-bubble-back-color']['alpha']) : "#d3a471";
		$header_back_color                   = (isset($GLOBALS['goodresto_enovathemes']['header-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['header-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['header-back-color']['color'],$GLOBALS['goodresto_enovathemes']['header-back-color']['alpha']) : "#ffffff";
		$header_border_color                 = (isset($GLOBALS['goodresto_enovathemes']['header-border-color']['color']) && $GLOBALS['goodresto_enovathemes']['header-border-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['header-border-color']['color'],$GLOBALS['goodresto_enovathemes']['header-border-color']['alpha']) : "";
		$menu_back_color                     = (isset($GLOBALS['goodresto_enovathemes']['menu-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['menu-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['menu-back-color']['color'],$GLOBALS['goodresto_enovathemes']['menu-back-color']['alpha']) : "#ffffff";
		$menu_border_color                   = (isset($GLOBALS['goodresto_enovathemes']['menu-border-color']['color']) && $GLOBALS['goodresto_enovathemes']['menu-border-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['menu-border-color']['color'],$GLOBALS['goodresto_enovathemes']['menu-border-color']['alpha']) : "";
		$header_menu_m                       = (isset($GLOBALS['goodresto_enovathemes']['header-menu-m'])) ? $GLOBALS['goodresto_enovathemes']['header-menu-m'] : '32';
		$header_menu_m_1600                  = (isset($GLOBALS['goodresto_enovathemes']['header-menu-m-1600'])) ? $GLOBALS['goodresto_enovathemes']['header-menu-m-1600'] : $header_menu_m;
		$header_menu_separator               = (isset($GLOBALS['goodresto_enovathemes']['header-menu-separator']) && $GLOBALS['goodresto_enovathemes']['header-menu-separator'] == 1) ? 'true' : 'false';
		$header_menu_separator_height        = (isset($GLOBALS['goodresto_enovathemes']['header-menu-separator-height']) && !empty($GLOBALS['goodresto_enovathemes']['header-menu-separator-height'])) ? $GLOBALS['goodresto_enovathemes']['header-menu-separator-height'] : '40';
		$header_menu_separator_color         = (isset($GLOBALS['goodresto_enovathemes']['header-menu-separator-color']['color']) && $GLOBALS['goodresto_enovathemes']['header-menu-separator-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['header-menu-separator-color']['color'],$GLOBALS['goodresto_enovathemes']['header-menu-separator-color']['alpha']) : "#e0e0e0";
		$header_menu_color_reg               = (isset($GLOBALS['goodresto_enovathemes']['header-menu-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['header-menu-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['header-menu-color']['regular'] : '#757575';
		$header_menu_color_hov               = (isset($GLOBALS['goodresto_enovathemes']['header-menu-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['header-menu-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['header-menu-color']['hover'] : '#d3a471';
		$header_menu_typo_font_family  	 	 = (isset($GLOBALS['goodresto_enovathemes']['header-menu-typo']['font-family']) && !empty($GLOBALS['goodresto_enovathemes']['header-menu-typo']['font-family'])) ? $GLOBALS['goodresto_enovathemes']['header-menu-typo']['font-family'] : "'Cabin Condensed', sans-serif";
		$header_menu_typo_font_weight  	 	 = (isset($GLOBALS['goodresto_enovathemes']['header-menu-typo']['font-weight']) && !empty($GLOBALS['goodresto_enovathemes']['header-menu-typo']['font-weight'])) ? $GLOBALS['goodresto_enovathemes']['header-menu-typo']['font-weight'] : "700";
		$header_menu_typo_font_size    	 	 = (isset($GLOBALS['goodresto_enovathemes']['header-menu-typo']['font-size']) && !empty($GLOBALS['goodresto_enovathemes']['header-menu-typo']['font-size'])) ? $GLOBALS['goodresto_enovathemes']['header-menu-typo']['font-size'] : "14px";
		$header_menu_typo_letter_spacing 	 = (isset($GLOBALS['goodresto_enovathemes']['header-menu-typo']['letter-spacing']) && !empty($GLOBALS['goodresto_enovathemes']['header-menu-typo']['letter-spacing'])) ? $GLOBALS['goodresto_enovathemes']['header-menu-typo']['letter-spacing'] : "1px";
		$header_menu_typo_text_transform 	 = (isset($GLOBALS['goodresto_enovathemes']['header-menu-typo']['text-transform']) && !empty($GLOBALS['goodresto_enovathemes']['header-menu-typo']['text-transform'])) ? $GLOBALS['goodresto_enovathemes']['header-menu-typo']['text-transform'] : "uppercase";
		$header_menu_effect_color   	     = (isset($GLOBALS['goodresto_enovathemes']['header-menu-effect-color']['color']) && $GLOBALS['goodresto_enovathemes']['header-menu-effect-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['header-menu-effect-color']['color'],$GLOBALS['goodresto_enovathemes']['header-menu-effect-color']['alpha']) : "#d3a471";
		$header_submenu_effect_color   	     = (isset($GLOBALS['goodresto_enovathemes']['header-submenu-effect-color']['color']) && $GLOBALS['goodresto_enovathemes']['header-submenu-effect-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['header-submenu-effect-color']['color'],$GLOBALS['goodresto_enovathemes']['header-submenu-effect-color']['alpha']) : "#d3a471";
		$header_submenu_back_color       	 = (isset($GLOBALS['goodresto_enovathemes']['header-submenu-back-color']) && $GLOBALS['goodresto_enovathemes']['header-submenu-back-color']) ? $GLOBALS['goodresto_enovathemes']['header-submenu-back-color'] : "#212121";
		$header_submenu_shadow               = (isset($GLOBALS['goodresto_enovathemes']['header-submenu-shadow']) && $GLOBALS['goodresto_enovathemes']['header-submenu-shadow'] == 1) ? 'true' : 'false';
		$header_submenu_color_reg        	 = (isset($GLOBALS['goodresto_enovathemes']['header-submenu-color']['regular']) && $GLOBALS['goodresto_enovathemes']['header-submenu-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['header-submenu-color']['regular'] : "#9e9e9e";
		$header_submenu_color_hov        	 = (isset($GLOBALS['goodresto_enovathemes']['header-submenu-color']['hover']) && $GLOBALS['goodresto_enovathemes']['header-submenu-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['header-submenu-color']['hover'] : "#ffffff";
		$header_submenu_typo_font_family  	 = (isset($GLOBALS['goodresto_enovathemes']['header-submenu-typo']['font-family']) && !empty($GLOBALS['goodresto_enovathemes']['header-submenu-typo']['font-family'])) ? $GLOBALS['goodresto_enovathemes']['header-submenu-typo']['font-family'] : "'Cabin Condensed', sans-serif";
		$header_submenu_typo_font_weight  	 = (isset($GLOBALS['goodresto_enovathemes']['header-submenu-typo']['font-weight']) && !empty($GLOBALS['goodresto_enovathemes']['header-submenu-typo']['font-weight'])) ? $GLOBALS['goodresto_enovathemes']['header-submenu-typo']['font-weight'] : "400";
		$header_submenu_typo_font_size    	 = (isset($GLOBALS['goodresto_enovathemes']['header-submenu-typo']['font-size']) && !empty($GLOBALS['goodresto_enovathemes']['header-submenu-typo']['font-size'])) ? $GLOBALS['goodresto_enovathemes']['header-submenu-typo']['font-size'] : "16px";
		$header_submenu_typo_line_height      = (isset($GLOBALS['goodresto_enovathemes']['header-submenu-typo']['line-height']) && !empty($GLOBALS['goodresto_enovathemes']['header-submenu-typo']['line-height'])) ? $GLOBALS['goodresto_enovathemes']['header-submenu-typo']['line-height'] : "24px";
		$header_submenu_typo_text_transform   = (isset($GLOBALS['goodresto_enovathemes']['header-submenu-typo']['text-transform']) && !empty($GLOBALS['goodresto_enovathemes']['header-submenu-typo']['text-transform'])) ? $GLOBALS['goodresto_enovathemes']['header-submenu-typo']['text-transform'] : "none";

		$header_search_back              = (isset($GLOBALS['goodresto_enovathemes']['header-search-back']) && $GLOBALS['goodresto_enovathemes']['header-search-back']) ? $GLOBALS['goodresto_enovathemes']['header-search-back'] : "#d3a471";
		$header_search_back_opacity      = (isset($GLOBALS['goodresto_enovathemes']['header-search-back-opacity']) && $GLOBALS['goodresto_enovathemes']['header-search-back-opacity']) ? $GLOBALS['goodresto_enovathemes']['header-search-back-opacity'] : "8";
		$header_search_color             = (isset($GLOBALS['goodresto_enovathemes']['header-search-color']) && $GLOBALS['goodresto_enovathemes']['header-search-color']) ? $GLOBALS['goodresto_enovathemes']['header-search-color'] : "#ffffff";
		
		$header_search_back_default      = (isset($GLOBALS['goodresto_enovathemes']['header-search-back-default']['color']) && $GLOBALS['goodresto_enovathemes']['header-search-back-default']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['header-search-back-default']['color'],$GLOBALS['goodresto_enovathemes']['header-search-back-default']['alpha']) : "#ffffff";
		$header_search_border_default    = (isset($GLOBALS['goodresto_enovathemes']['header-search-border-default']['color']) && $GLOBALS['goodresto_enovathemes']['header-search-border-default']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['header-search-border-default']['color'],$GLOBALS['goodresto_enovathemes']['header-search-border-default']['alpha']) : "#e0e0e0";
		$header_search_text_default      = (isset($GLOBALS['goodresto_enovathemes']['header-search-text-default']) && $GLOBALS['goodresto_enovathemes']['header-search-text-default']) ? $GLOBALS['goodresto_enovathemes']['header-search-text-default'] : "#757575";

		$header_social_links                    = (isset($GLOBALS['goodresto_enovathemes']['header-social-links']) && $GLOBALS['goodresto_enovathemes']['header-social-links'] == 1) ? 'true' : 'false';
		$header_social_links_color_reg          = (isset($GLOBALS['goodresto_enovathemes']['header-social-links-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['header-social-links-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['header-social-links-color']['regular'] : '#abacae';
		$header_social_links_color_hov          = (isset($GLOBALS['goodresto_enovathemes']['header-social-links-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['header-social-links-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['header-social-links-color']['hover'] : '#d3a471';
		$header_social_links_border_color_reg   = (isset($GLOBALS['goodresto_enovathemes']['header-social-links-border-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['header-social-links-border-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['header-social-links-border-color']['regular'] : '';
		$header_social_links_border_color_hov   = (isset($GLOBALS['goodresto_enovathemes']['header-social-links-border-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['header-social-links-border-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['header-social-links-border-color']['hover'] : '';
		$header_social_links_back_color_reg     = (isset($GLOBALS['goodresto_enovathemes']['header-social-links-back-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['header-social-links-back-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['header-social-links-back-color']['regular'] : '';
		$header_social_links_back_color_hov     = (isset($GLOBALS['goodresto_enovathemes']['header-social-links-back-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['header-social-links-back-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['header-social-links-back-color']['hover'] : '';
		$header_social_links_border_radius      = (isset($GLOBALS['goodresto_enovathemes']['header-social-links-border-radius']) && !empty($GLOBALS['goodresto_enovathemes']['header-social-links-border-radius'])) ? $GLOBALS['goodresto_enovathemes']['header-social-links-border-radius'] : '0';
		$header_social_links_border_width       = (isset($GLOBALS['goodresto_enovathemes']['header-social-links-border-width']) && !empty($GLOBALS['goodresto_enovathemes']['header-social-links-border-width'])) ? $GLOBALS['goodresto_enovathemes']['header-social-links-border-width'] : '0';

		$header_button_text_color_reg       = (isset($GLOBALS['goodresto_enovathemes']['header-button-text-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['header-button-text-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['header-button-text-color']['regular'] : '#ffffff';
		$header_button_text_color_hov       = (isset($GLOBALS['goodresto_enovathemes']['header-button-text-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['header-button-text-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['header-button-text-color']['hover'] : '#ffffff';
		$header_button_back_color_reg       = (isset($GLOBALS['goodresto_enovathemes']['header_button_back_color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['header_button_back_color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['header_button_back_color']['regular'] : '#d3a471';
		$header_button_back_color_hov       = (isset($GLOBALS['goodresto_enovathemes']['header_button_back_color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['header_button_back_color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['header_button_back_color']['hover'] : '#212121';

		$dynamic_css .='.desk.top-false {
			height:'.$header_height.'px;
		}';

		$dynamic_css .='.desk.top-true {
			height:'.($header_height+$header_top_height).'px;
		}';

		$dynamic_css .='.desk.top-false.menu-under-logo-true {
			height:'.($header_height+$menu_under_logo_height).'px;
		}';

		$dynamic_css .='.desk.top-true.menu-under-logo-true {
			height:'.($header_height+$menu_under_logo_height+$header_top_height).'px;
		}';

		$dynamic_css .='.desk.menu-under-logo-true.menu-under-logo-boxed-true {
			height:'.($header_height+$menu_under_logo_height/2).'px;
		}';

		$dynamic_css .='.desk.menu-under-logo-true.menu-under-logo-boxed-true.top-true {
			height:'.($header_height+$header_top_height+$menu_under_logo_height/2).'px;
		}';

		$dynamic_css .='.desk .header-body {
		    background-color: '.$header_back_color.';';
			$dynamic_css .='height:'.$header_height.'px;
		}';

		$dynamic_css .='.desk.menu-under-logo-true .header-body {
			height:'.($header_height+$menu_under_logo_height).'px;
		}';

		$dynamic_css .='.desk.menu-under-logo-true.menu-under-logo-boxed-true .header-body {
			height:'.($header_height+$menu_under_logo_height/2).'px;
		}';

		if(!empty($header_border_color)){

			$dynamic_css .='.desk.border-box-false .header-body {
				border-bottom:1px solid '.$header_border_color.';
			}';

			$dynamic_css .='.desk.border-box-true .header-body > .container {
				border-bottom:1px solid '.$header_border_color.';
			}';

		}

		$dynamic_css .='.logo-area, .desk .logo,.desk .logo-title {
			height: '.$header_height.'px;
			line-height: '.$header_height.'px;
		}';

		$dynamic_css .='.desk .logo-desk .normal-logo {
			-webkit-transform:translate('.$logo_pos_hor.'px,'.$logo_pos_ver.'px);
			-ms-transform:translate('.$logo_pos_hor.'px,'.$logo_pos_ver.'px);
			transform:translate('.$logo_pos_hor.'px,'.$logo_pos_ver.'px);
		}';

		$dynamic_css .='.desk-menu > ul > li {
			margin-left:'.$header_menu_m.'px;
			height: '.$header_height.'px;
			line-height: '.$header_height.'px;
		}';

		$dynamic_css .='.desk.no-logo-true .left-part {
			padding-right:'.$header_menu_m.'px;
		}';

		$dynamic_css .='.desk-menu > ul > li > a {
			color:'.$header_menu_color_reg.';
			font-family:'.$header_menu_typo_font_family.'; 
			font-weight:'.$header_menu_typo_font_weight.'; 
			font-size:'.$header_menu_typo_font_size.'; 
			letter-spacing:'.$header_menu_typo_letter_spacing.'; 
			text-transform:'.$header_menu_typo_text_transform.';
			margin-top: '.(($header_height-36)/2).'px;
		}';

		$dynamic_css .='.desk-menu > ul > li > a.menu-item-button {
			margin-top: '.(($header_height-44)/2).'px;
		}';

		if ($header_menu_separator == "true") {

			$dynamic_css .='.desk-menu > ul > li > a:before,
			.desk-menu > ul > li:first-child:after,
			.desk .desk-cart-wrap:after,
			.desk .search-toggle:after,
			.desk .menu-header-social-links:after,
			.desk .sidebar-toggle:after {
				content:"";
				display:block;
				width:1px;
				height:'.$header_menu_separator_height.'px;
				top:50%;
				right:-'.($header_menu_m/2).'px;
				position:absolute;
				margin-top:-'.($header_menu_separator_height/2).'px;
				background-color:'.$header_menu_separator_color.';
				-webkit-transition: all 300ms ease-out;
    			transition: all 300ms ease-out;
			}';

			$dynamic_css .='.desk-menu > ul > li:first-child:after {
				left:-'.($header_menu_m/2).'px;
			}';

			$dynamic_css .='.logopos-center.menu-under-logo-true .desk-cart-wrap,
			.logopos-center.menu-under-logo-true .search-toggle,
			.logopos-center.menu-under-logo-true .menu-header-social-links,
			.logopos-center.menu-under-logo-true .sidebar-toggle,
			.logopos-left.menu-under-logo-false .desk-cart-wrap,
			.logopos-left.menu-under-logo-false .search-toggle,
			.logopos-left.menu-under-logo-false .menu-header-social-links,
			.logopos-left.menu-under-logo-false .sidebar-toggle,
			.logopos-right.menu-under-logo-false .desk-cart-wrap,
			.logopos-right.menu-under-logo-false .search-toggle,
			.logopos-right.menu-under-logo-false .menu-header-social-links,
			.logopos-right.menu-under-logo-false .sidebar-toggle {
				margin-left:10px !important;
			}';

			$dynamic_css .='.menu-under-logo-true .desk-cart-wrap:after,
			.menu-under-logo-true .search-toggle:after,
			.menu-under-logo-true .menu-header-social-links:after,
			.menu-under-logo-true .sidebar-toggle:after {
				right:-8px !important;
			}';

			$dynamic_css .='.menu-under-logo-false .desk-cart-wrap:after,
			.menu-under-logo-false .search-toggle:after,
			.menu-under-logo-false .menu-header-social-links:after,
			.menu-under-logo-false .sidebar-toggle:after {
				right:-6px !important;
			}';

			$dynamic_css .='.logopos-center.menu-under-logo-true .under-logo > .container > .desk-menu + *,
			.logopos-left.menu-under-logo-false .header-body > .container > *:nth-last-child(2),
			.logopos-right.menu-under-logo-false .header-body > .container > *:nth-last-child(2) {
				margin-left:'.($header_menu_m/2).'px !important;
			}';

		}

		if ($header_social_links == "true") {

			if (!empty($header_social_links_back_color_reg) || !empty($header_social_links_border_color_reg)) {
				$dynamic_css .='.desk .menu-header-social-links {margin-left:30px !important;}';
			}

			$dynamic_css .='.desk .menu-header-social-links a {
				color:'.$header_social_links_color_reg.';';
				if (!empty($header_social_links_back_color_reg)) {
					$dynamic_css .='background-color:'.$header_social_links_back_color_reg.';';
					$dynamic_css .='margin-right:8px;';
				}
				if (!empty($header_social_links_border_color_reg)) {
					$dynamic_css .='box-shadow:inset 0 0 0 '.$header_social_links_border_width.'px '.$header_social_links_border_color_reg.';';
					$dynamic_css .='margin-right:8px;';
				}
				$dynamic_css .='border-radius:'.$header_social_links_border_radius.'px;
			}';

			$dynamic_css .='.desk .menu-header-social-links a:hover {
				color:'.$header_social_links_color_hov.';';
				if (!empty($header_social_links_back_color_hov)) {
					$dynamic_css .='background-color:'.$header_social_links_back_color_hov.';';
				}
				if (!empty($header_social_links_border_color_hov)) {
					$dynamic_css .='box-shadow:inset 0 0 0 '.$header_social_links_border_width.'px '.$header_social_links_border_color_hov.';';
				}
			$dynamic_css .='}';
		}

		/* Menu effects
		---------------*/

			$dynamic_css .='.desk-menu > ul > li:hover > a,
			.desk-menu > ul > li.one-page-active > a,
			.desk-menu > ul > li.current-menu-item > a,
			.desk-menu > ul > li.current-menu-parent > a,
			.desk-menu > ul > li.current-menu-ancestor > a,
			.one-page-top .desk-menu > ul > li.current-menu-item > a,
			.one-page-top .desk-menu > ul > li.current-menu-parent > a,
			.one-page-top .desk-menu > ul > li.current-menu-ancestor > a {
				color:'.$header_menu_color_hov.';
			}';
			
			$dynamic_css .='.effect-underline .desk-menu > ul > li > a:after,
			.effect-overline .desk-menu > ul > li > a:after,
			.effect-fill .desk-menu > ul > li:hover,
			.effect-fill .desk-menu > ul > li.one-page-active,
			.effect-fill .desk-menu > ul > li.current-menu-item,
			.effect-fill .desk-menu > ul > li.current-menu-parent,
			.effect-fill .desk-menu > ul > li.current-menu-ancestor,
			.effect-box .desk-menu > ul > li:hover > a,
			.effect-box .desk-menu > ul > li.one-page-active > a,
			.effect-box .desk-menu > ul > li.current-menu-item > a,
			.effect-box .desk-menu > ul > li.current-menu-parent > a,
			.effect-box .desk-menu > ul > li.current-menu-ancestor > a {
				background: '.$header_menu_effect_color.';
			}';

			$dynamic_css .='.effect-dottes .desk-menu > ul > li > a .dottes,
			.effect-dottes .desk-menu > ul > li > a .dottes:after,
			.effect-dottes .desk-menu > ul > li > a .dottes:before {
				background: '.$header_menu_effect_color.';
			}';

			$dynamic_css .='.one-page-top.effect-fill .desk-menu > ul > li:hover,
			.one-page-top.effect-fill .desk-menu > ul > li.one-page-active {
				background: '.$header_menu_effect_color.' !important;
			}';

			$dynamic_css .='.one-page-top.effect-box .desk-menu > ul > li:hover > a,
			.one-page-top.effect-box .desk-menu > ul > li.one-page-active > a {
				background: '.$header_menu_effect_color.' !important;
			}';

			$dynamic_css .='.effect-outline .desk-menu > ul > li:hover > a,
			.effect-outline .desk-menu > ul > li.one-page-active > a,
			.effect-outline .desk-menu > ul > li.current-menu-item > a,
			.effect-outline .desk-menu > ul > li.current-menu-parent > a,
			.effect-outline .desk-menu > ul > li.current-menu-ancestor > a {
				box-shadow: inset 0 0 0 1px '.$header_menu_effect_color.';
			}';

			$dynamic_css .='.one-page-top.effect-outline .desk-menu > ul > li:hover > a,
			.one-page-top.effect-outline .desk-menu > ul > li.one-page-active > a {
				box-shadow: inset 0 0 0 1px '.$header_menu_effect_color.' !important;
			}';

			$dynamic_css .='.effect-overline .desk-menu > ul > li > a:after {
				top: -'.(($header_height-36)/2).'px;
			}';

			$dynamic_css .='.subeffect-hover-line .desk-menu .sub-menu > li > a:after {
				background: '.$header_submenu_effect_color.';
			}';

			$dynamic_css .='.subeffect-hover-fill .desk-menu .sub-menu > li:hover {
				background: '.$header_submenu_effect_color.';
			}';

			$dynamic_css .='.subeffect-hover-outline .desk-menu .sub-menu > li > a:after {
				box-shadow:inset 0 0 0 1px '.$header_submenu_effect_color.';
			}';

		/* Header submenu
		---------------*/

			$dynamic_css .='.desk-menu > ul ul {
				background-color:'.$header_submenu_back_color.';';
				if ($header_submenu_shadow == "true") {
					$dynamic_css .='box-shadow:2px 1px 4px 1px rgba(0,0,0,0.1)';
				}
			$dynamic_css .='}';

			$dynamic_css .='.desk-menu > ul > li > ul {
				top: '.$header_height.'px;
			}';

			$dynamic_css .='.desk-menu .sub-menu a {
				color:'.$header_submenu_color_reg.';
				font-family:'.$header_submenu_typo_font_family.'; 
				font-weight:'.$header_submenu_typo_font_weight.'; 
				font-size:'.$header_submenu_typo_font_size.'; 
				text-transform:'.$header_submenu_typo_text_transform.';
				line-height: '.$header_submenu_typo_line_height.';
			}';

			$dynamic_css .='.desk-menu ul ul > li[data-button="true"] {
				line-height: '.$header_submenu_typo_line_height.';
			}';

			$dynamic_css .='.desk-menu .sub-menu li:hover > a {
				color:'.$header_submenu_color_hov.';
			}';

		/* Menu under logo
		---------------*/

			$dynamic_css .='.menu-under-logo-true .under-logo {
				height:'.$menu_under_logo_height.'px;
				line-height:'.$menu_under_logo_height.'px;
			}';


			$dynamic_css .='.under-logo .desk-menu > ul > li,
			.sticky-true.active.menu-under-logo-true .desk-menu > ul > li {
			    height:'.$menu_under_logo_height.'px;
				line-height:'.$menu_under_logo_height.'px;
			}';

			$dynamic_css .='.under-logo .desk-menu > ul > li > a,
			.sticky-true.active.menu-under-logo-true .desk-menu > ul > li > a {
			    margin-top: '.(($menu_under_logo_height - 36)/2).'px !important;
			}';

			$dynamic_css .='.effect-overline .under-logo .desk-menu > ul > li > a:after {
				top: -'.(($menu_under_logo_height - 36)/2).'px !important;
			}';

			$dynamic_css .='.under-logo .search-toggle,
			.under-logo .desk-cart-wrap,
			.under-logo .sidebar-toggle,
			.under-logo .menu-header-social-links {
				margin-top:'.(($menu_under_logo_height - 40)/2).'px !important;
			}';

			$dynamic_css .='.under-logo .language-switcher {
				margin-top:'.(($menu_under_logo_height - 36)/2).'px !important;
			}';

			$dynamic_css .='.under-logo .desk-menu > ul > li > ul,
			.sticky-true.active.menu-under-logo-true .under-logo .desk-menu > ul > li > ul {
				top: '.$menu_under_logo_height.'px !important;
			}';

			$dynamic_css .='.menu-under-logo-true .header-button {
				background-color:'.$header_button_back_color_reg.';
				color:'.$header_button_text_color_reg.';
			}';

			$dynamic_css .='.menu-under-logo-true .header-button:hover {
				background-color:'.$header_button_back_color_hov.';
				color:'.$header_button_text_color_hov.';
			}';

			$dynamic_css .='.menu-under-logo-true .header-search input[type="text"] {
				background-color:'.$header_search_back_default.';
				border-color:'.$header_search_border_default.' !important;
				color:'.$header_search_text_default.';
			}';

			$dynamic_css .='.menu-under-logo-true .header-search input[type="submit"] + .search-icon {
				color:'.$header_search_text_default.' !important;
			}';

			$dynamic_css .='.menu-under-logo-true .header-search input[type="submit"]:hover + .search-icon {
				color:'.goodresto_enovathemes_hex_to_rgb_shade($header_search_text_default,88).' !important;
			}';

			$dynamic_css .='.desk .search-toggle, 
			.desk .desk-cart-wrap, 
			.desk .sidebar-toggle,
			.desk .menu-header-social-links  {
				margin-top:'.(($header_height-40)/2).'px;
			}';

			$dynamic_css .='.menu-under-logo-true .header-search,
			.menu-under-logo-true .header-button  {
				margin-top:'.(($header_height-44)/2).'px;
			}';

			$dynamic_css .='.header-search-modal {
				background: '.goodresto_enovathemes_hex_to_rgba($header_search_back,$header_search_back_opacity/10).';';
			$dynamic_css .='}';

			$dynamic_css .='.header-search-modal input[type="text"],
			.header-search-modal input[type="submit"] + .search-icon,
			.header-search-modal .modal-close {
				color: '.$header_search_color.' !important;';
			$dynamic_css .='}';

			$dynamic_css .='.header-search-modal input[type="text"] {
				border-bottom:1px solid '.$header_search_color.' !important;';
			$dynamic_css .='}';

			$dynamic_css .='.under-logo {
				background-color:'.$menu_back_color.';';
				if (!empty($menu_border_color)) {
					$dynamic_css .='border-top:1px solid '.$menu_border_color;
				}
			$dynamic_css .='}';

			$dynamic_css .='.logopos-left .under-logo .sidebar-toggle,
			.logopos-right .under-logo .sidebar-toggle {
				color:'.$header_menu_color_reg.';
			}';

			$dynamic_css .='.menu-under-logo-true.menu-under-logo-boxed-true .under-logo {
				border-radius:'.$menu_under_logo_boxed_radius.'px;
			}';

		/* Header icons
		---------------*/

			$dynamic_css .='.desk .search-toggle,
			.desk .cart-toggle,
			.desk .sidebar-toggle {
				color:'.$header_icons_color.';
			}';

			$dynamic_css .='.revolution-slider-active .active .search-toggle,
			.revolution-slider-active .active .cart-toggle,
			.revolution-slider-active .active .sidebar-toggle {
				color:'.$header_icons_color.' !important;
			}';

	/* Header sticky
	---------------*/

		$sticky_header_icons_color                  = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-icons-color']) && $GLOBALS['goodresto_enovathemes']['sticky-header-icons-color']) ? $GLOBALS['goodresto_enovathemes']['sticky-header-icons-color'] : $header_icons_color;
		$sticky_header_height                       = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-height']) && $GLOBALS['goodresto_enovathemes']['sticky-header-height']) ? $GLOBALS['goodresto_enovathemes']['sticky-header-height'] : $header_height;
		$sticky_language_switcher_back_color        = (isset($GLOBALS['goodresto_enovathemes']['sticky-language-switcher-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['sticky-language-switcher-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['sticky-language-switcher-back-color']['color'],$GLOBALS['goodresto_enovathemes']['sticky-language-switcher-back-color']['alpha']) : $language_switcher_back_color;
		$sticky_language_switcher_back_hov_color    = (isset($GLOBALS['goodresto_enovathemes']['sticky-language-switcher-back-hov-color']['color']) && $GLOBALS['goodresto_enovathemes']['sticky-language-switcher-back-hov-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['sticky-language-switcher-back-hov-color']['color'],$GLOBALS['goodresto_enovathemes']['sticky-language-switcher-back-hov-color']['alpha']) : $language_switcher_back_hov_color;
		$sticky_language_switcher_text_color_reg    = (isset($GLOBALS['goodresto_enovathemes']['sticky-language-switcher-text-color']['regular']) && $GLOBALS['goodresto_enovathemes']['sticky-language-switcher-text-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['sticky-language-switcher-text-color']['regular'] : $language_switcher_text_color_reg;
		$sticky_language_switcher_text_color_hov    = (isset($GLOBALS['goodresto_enovathemes']['sticky-language-switcher-text-color']['hover']) && $GLOBALS['goodresto_enovathemes']['sticky-language-switcher-text-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['sticky-language-switcher-text-color']['hover'] : $language_switcher_text_color_hov;
		$sticky_cart_bubble_text_color              = (isset($GLOBALS['goodresto_enovathemes']['sticky-cart-bubble-text-color']['color']) && $GLOBALS['goodresto_enovathemes']['sticky-cart-bubble-text-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['sticky-cart-bubble-text-color']['color'],$GLOBALS['goodresto_enovathemes']['sticky-cart-bubble-text-color']['alpha']) : $cart_bubble_text_color;
		$sticky_cart_bubble_back_color              = (isset($GLOBALS['goodresto_enovathemes']['sticky-cart-bubble-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['sticky-cart-bubble-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['sticky-cart-bubble-back-color']['color'],$GLOBALS['goodresto_enovathemes']['sticky-cart-bubble-back-color']['alpha']) : $cart_bubble_back_color;
		$sticky_header_back_color                   = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['sticky-header-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['sticky-header-back-color']['color'],$GLOBALS['goodresto_enovathemes']['sticky-header-back-color']['alpha']) : $header_back_color;
		$sticky_header_border_color                 = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-border-color']['color']) && $GLOBALS['goodresto_enovathemes']['sticky-header-border-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['sticky-header-border-color']['color'],$GLOBALS['goodresto_enovathemes']['sticky-header-border-color']['alpha']) : $header_border_color;
		$sticky_menu_back_color                     = (isset($GLOBALS['goodresto_enovathemes']['sticky-menu-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['sticky-menu-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['sticky-menu-back-color']['color'],$GLOBALS['goodresto_enovathemes']['sticky-menu-back-color']['alpha']) : $menu_back_color;
		$sticky_menu_border_color                   = (isset($GLOBALS['goodresto_enovathemes']['sticky-menu-border-color']['color']) && $GLOBALS['goodresto_enovathemes']['sticky-menu-border-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['sticky-menu-border-color']['color'],$GLOBALS['goodresto_enovathemes']['sticky-menu-border-color']['alpha']) : $menu_border_color;
		$sticky_header_menu_color_reg               = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-menu-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['sticky-header-menu-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['sticky-header-menu-color']['regular'] : $header_menu_color_reg;
		$sticky_header_menu_color_hov               = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-menu-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['sticky-header-menu-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['sticky-header-menu-color']['hover'] : $header_menu_color_hov;
		$sticky_header_menu_effect_color   	        = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-menu-effect-color']['color']) && $GLOBALS['goodresto_enovathemes']['sticky-header-menu-effect-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['sticky-header-menu-effect-color']['color'],$GLOBALS['goodresto_enovathemes']['sticky-header-menu-effect-color']['alpha']) : $header_menu_effect_color;
		$sticky_header_menu_separator_color         = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-menu-separator-color']['color']) && $GLOBALS['goodresto_enovathemes']['sticky-header-menu-separator-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['sticky-header-menu-separator-color']['color'],$GLOBALS['goodresto_enovathemes']['sticky-header-menu-separator-color']['alpha']) : $header_menu_separator_color;

		$sticky_header_social_links_color_reg          = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-social-links-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['sticky-header-social-links-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['sticky-header-social-links-color']['regular'] : $header_social_links_color_reg;
		$sticky_header_social_links_color_hov          = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-social-links-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['sticky-header-social-links-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['sticky-header-social-links-color']['hover'] : $header_social_links_color_hov;
		$sticky_header_social_links_border_color_reg   = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-social-links-border-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['sticky-header-social-links-border-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['sticky-header-social-links-border-color']['regular'] : $header_social_links_border_color_reg;
		$sticky_header_social_links_border_color_hov   = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-social-links-border-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['sticky-header-social-links-border-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['sticky-header-social-links-border-color']['hover'] : $header_social_links_border_color_hov;
		$sticky_header_social_links_back_color_reg     = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-social-links-back-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['sticky-header-social-links-back-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['sticky-header-social-links-back-color']['regular'] : $header_social_links_back_color_reg;
		$sticky_header_social_links_back_color_hov     = (isset($GLOBALS['goodresto_enovathemes']['sticky-header-social-links-back-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['sticky-header-social-links-back-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['sticky-header-social-links-back-color']['hover'] : $header_social_links_back_color_hov;

		$dynamic_css .='.sticky-true.active .search-toggle,
		.sticky-true.active .cart-toggle,
		.sticky-true.active .sidebar-toggle {
			color:'.$sticky_header_icons_color.';
		}';

		$dynamic_css .='.revolution-slider-active .active.active_2 .search-toggle,
		.revolution-slider-active .active.active_2 .cart-toggle,
		.revolution-slider-active .active.active_2 .sidebar-toggle {
			color:'.$sticky_header_icons_color.' !important;
		}';

		$dynamic_css .='.sticky-true.active.top-false {
			height:'.$sticky_header_height.'px !important;
		}';

		$dynamic_css .='.sticky-true.active.top-true, .sticky-true.active.menu-under-logo-true {
			height:'.($sticky_header_height+$header_top_height).'px !important;
		}';

		$dynamic_css .='.sticky-true.active.menu-under-logo-true {
			height:'.($header_height+$menu_under_logo_height).'px !important;
		}';

		$dynamic_css .='.sticky-true.active.top-true.menu-under-logo-true {
			height:'.($header_height+$header_top_height+$menu_under_logo_height).'px !important;
		}';

		$dynamic_css .='.sticky-true.active .header-body {
		    background-color: '.$sticky_header_back_color.' !important;
		    height:'.$sticky_header_height.'px !important;
		}';

		if(!empty($sticky_header_border_color)){

			$dynamic_css .='.sticky-true.active.border-box-false .header-body {
				border-bottom:1px solid '.$sticky_header_border_color.';
			}';

			$dynamic_css .='.sticky-true.active.border-box-true .header-body > .container {
				border-bottom:1px solid '.$sticky_header_border_color.';
			}';

		}

		$dynamic_css .='.sticky-true.active .logo,
		.sticky-true.active .logo-title,
		.sticky-true.active .logo-area {
			height: '.$sticky_header_height.'px !important;
			line-height: '.$sticky_header_height.'px !important;
		}';

		$dynamic_css .='.sticky-true.active.menu-under-logo-true .header-body {
		    background-color: '.$header_back_color.' !important;
		    height:'.$header_height.'px !important;
		}';
		  
		if(!empty($sticky_header_border_color)){

			$dynamic_css .='.sticky-true.active.menu-under-logo-true.border-box-false .header-body {
				border-bottom:1px solid '.$sticky_header_border_color.';
			}';

			$dynamic_css .='.sticky-true.active.menu-under-logo-true.border-box-true .header-body > .container {
				border-bottom:1px solid '.$sticky_header_border_color.';
			}';

		}

		if ($header_menu_separator == "true") {

			$dynamic_css .='.sticky-true.active .desk-menu > ul > li > a:before,
			.sticky-true.active .desk-cart-wrap:after,
			.sticky-true.active .search-toggle:after,
			.sticky-true.active .menu-header-social-links:after,
			.sticky-true.active .sidebar-toggle:after {
				background-color:'.$sticky_header_menu_separator_color.';
			}';

		}

		if ($header_social_links == "true") {

			$dynamic_css .='.header-under-slider-true.sticky-true.active .menu-header-social-links a,
			.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true .menu-header-social-links a,
			.sticky-true.active .menu-header-social-links a {
				color:'.$sticky_header_social_links_color_reg.';';
				if (!empty($sticky_header_social_links_back_color_reg)) {
					$dynamic_css .='background-color:'.$sticky_header_social_links_back_color_reg.';';
					$dynamic_css .='margin-right:8px;';
				}
				if (!empty($sticky_header_social_links_border_color_reg)) {
					$dynamic_css .='box-shadow:inset 0 0 0 '.$header_social_links_border_width.'px '.$sticky_header_social_links_border_color_reg.';';
					$dynamic_css .='margin-right:8px;';
				}
			$dynamic_css .='}';

			$dynamic_css .='.header-under-slider-true.sticky-true.active .menu-header-social-links a:hover,
			.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true .menu-header-social-links a:hover,
			.sticky-true.active .menu-header-social-links a:hover {
				color:'.$sticky_header_social_links_color_hov.';';
				if (!empty($sticky_header_social_links_back_color_hov)) {
					$dynamic_css .='background-color:'.$sticky_header_social_links_back_color_hov.';';
				}
				if (!empty($sticky_header_social_links_border_color_hov)) {
					$dynamic_css .='box-shadow:inset 0 0 0 '.$header_social_links_border_width.'px '.$sticky_header_social_links_border_color_hov.';';
				}
			$dynamic_css .='}';
		}

		$dynamic_css .='.sticky-true.active .under-logo {
			background-color:'.$sticky_menu_back_color.';';
			if (!empty($sticky_menu_border_color)) {
				$dynamic_css .='border-top:1px solid '.$sticky_menu_border_color;
			}
		$dynamic_css .='}';

		$dynamic_css .='.sticky-true.active.menu-under-logo-true .logo,
		.sticky-true.active.menu-under-logo-true .logo-title,
		.sticky-true.active.menu-under-logo-true .logo-area {
			height: '.$header_height.'px !important;
			line-height: '.$header_height.'px !important;
		}';

		$dynamic_css .='.sticky-true.active .desk-menu > ul > li {
			height: '.$sticky_header_height.'px !important;
			line-height: '.$sticky_header_height.'px !important;
		}';

		$dynamic_css .='.sticky-true.active.menu-under-logo-true .desk-menu > ul > li {
			height: '.$menu_under_logo_height.'px !important;
			line-height: '.$menu_under_logo_height.'px !important;
		}';

		$dynamic_css .='.sticky-true.active .desk-menu > ul > li > a {
			color:'.$sticky_header_menu_color_reg.' !important;
		}';

		$dynamic_css .='.sticky-true.active .desk-menu > ul > li > a {
			margin-top: '.(($sticky_header_height-36)/2).'px !important;
		}';

		$dynamic_css .='.sticky-true.active .desk-menu > ul > li > a.menu-item-button {
			margin-top: '.(($sticky_header_height-44)/2).'px !important;
		}';

		$dynamic_css .='.sticky-true.active .desk-menu > ul > li:hover > a,
		.sticky-true.active .desk-menu > ul > li.one-page-active > a,
		.sticky-true.active .desk-menu > ul > li.current-menu-item > a,
		.sticky-true.active .desk-menu > ul > li.current-menu-parent > a,
		.sticky-true.active .desk-menu > ul > li.current-menu-ancestor > a,
		.sticky-true.active.one-page-top .desk-menu > ul > li.current-menu-item > a,
		.sticky-true.active.one-page-top .desk-menu > ul > li.current-menu-parent > a,
		.sticky-true.active.one-page-top .desk-menu > ul > li.current-menu-ancestor > a {
			color:'.$sticky_header_menu_color_hov.' !important;
		}';

		$dynamic_css .='.sticky-true.active .desk-menu > ul > li > ul {
			top: '.$sticky_header_height.'px !important;
		}';

		$dynamic_css .='.sticky-true.active.effect-underline .desk-menu > ul > li > a:after,
		.sticky-true.active.effect-overline .desk-menu > ul > li > a:after,
		.sticky-true.active.effect-fill .desk-menu > ul > li:hover,
		.sticky-true.active.effect-fill .desk-menu > ul > li.one-page-active,
		.sticky-true.active.effect-fill .desk-menu > ul > li.current-menu-item,
		.sticky-true.active.effect-fill .desk-menu > ul > li.current-menu-parent,
		.sticky-true.active.effect-fill .desk-menu > ul > li.current-menu-ancestor,
		.sticky-true.active.effect-box .desk-menu > ul > li:hover > a,
		.sticky-true.active.effect-box .desk-menu > ul > li.one-page-active > a,
		.sticky-true.active.effect-box .desk-menu > ul > li.current-menu-item > a,
		.sticky-true.active.effect-box .desk-menu > ul > li.current-menu-parent > a,
		.sticky-true.active.effect-box .desk-menu > ul > li.current-menu-ancestor > a {
			background: '.$sticky_header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.sticky-true.active.effect-dottes .desk-menu > ul > li > a .dottes,
		.sticky-true.active.effect-dottes .desk-menu > ul > li > a .dottes:after,
		.sticky-true.active.effect-dottes .desk-menu > ul > li > a .dottes:before {
			background: '.$sticky_header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.sticky-true.active.one-page-top.effect-fill .desk-menu > ul > li:hover,
		.sticky-true.active.one-page-top.effect-fill .desk-menu > ul > li.one-page-active {
			background: '.$sticky_header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.sticky-true.one-page-top.effect-box .desk-menu > ul > li:hover > a,
		.sticky-true.active.one-page-top.effect-box .desk-menu > ul > li.one-page-active > a {
			background: '.$sticky_header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.sticky-true.active.effect-outline .desk-menu > ul > li:hover > a,
		.sticky-true.active.effect-outline .desk-menu > ul > li.one-page-active > a,
		.sticky-true.active.effect-outline .desk-menu > ul > li.current-menu-item > a,
		.sticky-true.active.effect-outline .desk-menu > ul > li.current-menu-parent > a,
		.sticky-true.active.effect-outline .desk-menu > ul > li.current-menu-ancestor > a {
			box-shadow: inset 0 0 0 1px '.$sticky_header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.sticky-true.active.one-page-top.effect-outline .desk-menu > ul > li:hover > a,
		.sticky-true.active.one-page-top.effect-outline .desk-menu > ul > li.one-page-active > a {
			box-shadow: inset 0 0 0 1px '.$sticky_header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.sticky-true.active.effect-overline.menu-under-logo-false .desk-menu > ul > li > a:after {
			top: -'.(($sticky_header_height-36)/2).'px !important;
		}';

		$dynamic_css .='.sticky-true.active .search-toggle, 
		.sticky-true.active .desk-cart-wrap, 
		.sticky-true.active .sidebar-toggle,
		.sticky-true.active .menu-header-social-links {
			margin-top:'.(($sticky_header_height-40)/2).'px !important;
		}';

		$dynamic_css .='.sticky-true.active.menu-under-logo-true .search-toggle, 
		.sticky-true.active.menu-under-logo-true .desk-cart-wrap, 
		.sticky-true.active.menu-under-logo-true .sidebar-toggle,
		.sticky-true.active.menu-under-logo-true .menu-header-social-links {
			margin-top:'.(($menu_under_logo_height-40)/2).'px !important;
		}';

		$dynamic_css .='.sticky-true.active.menu-under-logo-true.logopos-left .desk-cart-wrap,
		.sticky-true.active.menu-under-logo-true.logopos-right .desk-cart-wrap {
			margin-top:'.(($header_height-40)/2).'px !important;
		}';

		$dynamic_css .='.sticky-true.active.menu-under-logo-true {
			-webkit-transform:translateY(-'.$header_height.'px) !important;
			-ms-transform:translateY(-'.$header_height.'px) !important;
			transform:translateY(-'.$header_height.'px) !important;
		}';

		$dynamic_css .='.sticky-true.active.top-true.menu-under-logo-true {
			-webkit-transform:translateY(-'.($header_height+$header_top_height).'px) !important;
			-ms-transform:translateY(-'.($header_height+$header_top_height).'px) !important;
			transform:translateY(-'.($header_height+$header_top_height).'px) !important;
		}';

		// Header under slider

		$dynamic_css .='.revolution-slider-active .sticky-true.active.top-false {
			height:'.$header_height.'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.top-true {
			height:'.($header_height+$header_top_height).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.menu-under-logo-true {
			height:'.($header_height+$menu_under_logo_height).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.menu-under-logo-true {
			height:'.($header_height+$menu_under_logo_height).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.top-true.menu-under-logo-true {
			height:'.($header_height+$menu_under_logo_height+$header_top_height).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active .header-body {
		    background-color: '.$header_back_color.' !important;
		    height:'.$header_height.'px !important;
		}';

		if(!empty($header_border_color)){

			$dynamic_css .='.revolution-slider-active .sticky-true.active.border-box-false .header-body {
				border-bottom:1px solid '.$header_border_color.';
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active.border-box-true .header-body > .container {
				border-bottom:1px solid '.$header_border_color.';
			}';

		}

		$dynamic_css .='.revolution-slider-active .sticky-true.active .logo,
		.revolution-slider-active .sticky-true.active .logo-title,
		.revolution-slider-active .sticky-true.active .logo-area {
			height: '.$header_height.'px !important;
			line-height: '.$header_height.'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.menu-under-logo-true .header-body {
		    background-color: '.$header_back_color.' !important;
		    height:'.$header_height.'px !important;
		}';

		if(!empty($header_border_color)){

			$dynamic_css .='.revolution-slider-active .sticky-true.active.menu-under-logo-true .header-body {
				border-bottom:1px solid '.$header_border_color.';
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active.menu-under-logo-true .header-body > .container {
				border-bottom:1px solid '.$header_border_color.';
			}';

		}

		$dynamic_css .='.revolution-slider-active .sticky-true.active .under-logo {
			background-color:'.$menu_back_color.';
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.menu-under-logo-true .logo,
		.revolution-slider-active .sticky-true.active.menu-under-logo-true .logo-title,
		.revolution-slider-active .sticky-true.active.menu-under-logo-true .logo-area {
			height: '.$header_height.'px !important;
			line-height: '.$header_height.'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active .desk-menu > ul > li {
			height: '.$header_height.'px !important;
			line-height: '.$header_height.'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.menu-under-logo-true .desk-menu > ul > li {
			height: '.$menu_under_logo_height.'px !important;
			line-height: '.$menu_under_logo_height.'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active .desk-menu > ul > li > a {
			color:'.$header_menu_color_reg.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active .desk-menu > ul > li > a {
			margin-top: '.(($header_height-36)/2).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.menu-under-logo-true .desk-menu > ul > li > a {
			margin-top: '.(($menu_under_logo_height-36)/2).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active .desk-menu > ul > li > a.menu-item-button {
			margin-top: '.(($header_height-44)/2).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.menu-under-logo-true .desk-menu > ul > li > a.menu-item-button {
			margin-top: '.(($menu_under_logo_height-44)/2).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active .desk-menu > ul > li:hover > a,
		.revolution-slider-active .sticky-true.active .desk-menu > ul > li.one-page-active > a,
		.revolution-slider-active .sticky-true.active .desk-menu > ul > li.current-menu-item > a,
		.revolution-slider-active .sticky-true.active .desk-menu > ul > li.current-menu-parent > a,
		.revolution-slider-active .sticky-true.active .desk-menu > ul > li.current-menu-ancestor > a,
		.revolution-slider-active .sticky-true.active.one-page-top .desk-menu > ul > li.current-menu-item > a,
		.revolution-slider-active .sticky-true.active.one-page-top .desk-menu > ul > li.current-menu-parent > a,
		.revolution-slider-active .sticky-true.active.one-page-top .desk-menu > ul > li.current-menu-ancestor > a {
			color:'.$header_menu_color_hov.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active .desk-menu > ul > li > ul {
			top: '.$header_height.'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.effect-underline .desk-menu > ul > li > a:after,
		.revolution-slider-active .sticky-true.active.effect-overline .desk-menu > ul > li > a:after,
		.revolution-slider-active .sticky-true.active.effect-fill .desk-menu > ul > li:hover,
		.revolution-slider-active .sticky-true.active.effect-fill .desk-menu > ul > li.one-page-active,
		.revolution-slider-active .sticky-true.active.effect-fill .desk-menu > ul > li.current-menu-item,
		.revolution-slider-active .sticky-true.active.effect-fill .desk-menu > ul > li.current-menu-parent,
		.revolution-slider-active .sticky-true.active.effect-fill .desk-menu > ul > li.current-menu-ancestor,
		.revolution-slider-active .sticky-true.active.effect-box .desk-menu > ul > li:hover > a,
		.revolution-slider-active .sticky-true.active.effect-box .desk-menu > ul > li.one-page-active > a,
		.revolution-slider-active .sticky-true.active.effect-box .desk-menu > ul > li.current-menu-item > a,
		.revolution-slider-active .sticky-true.active.effect-box .desk-menu > ul > li.current-menu-parent > a,
		.revolution-slider-active .sticky-true.active.effect-box .desk-menu > ul > li.current-menu-ancestor > a {
			background: '.$header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.effect-dottes .desk-menu > ul > li > a .dottes,
		.revolution-slider-active .sticky-true.active.effect-dottes .desk-menu > ul > li > a .dottes:after,
		.revolution-slider-active .sticky-true.active.effect-dottes .desk-menu > ul > li > a .dottes:before {
			background: '.$header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.one-page-top.effect-fill .desk-menu > ul > li:hover,
		.revolution-slider-active .sticky-true.active.one-page-top.effect-fill .desk-menu > ul > li.one-page-active {
			background: '.$header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.one-page-top.effect-box .desk-menu > ul > li:hover > a,
		.revolution-slider-active .sticky-true.active.one-page-top.effect-box .desk-menu > ul > li.one-page-active > a {
			background: '.$header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.effect-outline .desk-menu > ul > li:hover > a,
		.revolution-slider-active .sticky-true.active.effect-outline .desk-menu > ul > li.one-page-active > a,
		.revolution-slider-active .sticky-true.active.effect-outline .desk-menu > ul > li.current-menu-item > a,
		.revolution-slider-active .sticky-true.active.effect-outline .desk-menu > ul > li.current-menu-parent > a,
		.revolution-slider-active .sticky-true.active.effect-outline .desk-menu > ul > li.current-menu-ancestor > a {
			box-shadow: inset 0 0 0 1px '.$header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.one-page-top.effect-outline .desk-menu > ul > li:hover > a,
		.revolution-slider-active .sticky-true.active.one-page-top.effect-outline .desk-menu > ul > li.one-page-active > a {
			box-shadow: inset 0 0 0 1px '.$header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.effect-overline.menu-under-logo-false .desk-menu > ul > li > a:after {
			top: -'.(($header_height-36)/2).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active .search-toggle, 
		.revolution-slider-active .sticky-true.active .desk-cart-wrap, 
		.revolution-slider-active .sticky-true.active .sidebar-toggle,
		.revolution-slider-active .sticky-true.active .menu-header-social-links {
			margin-top:'.(($header_height-40)/2).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.menu-under-logo-true.logopos-center .search-toggle, 
		.revolution-slider-active .sticky-true.active.menu-under-logo-true.logopos-center .desk-cart-wrap, 
		.revolution-slider-active .sticky-true.active.menu-under-logo-true.logopos-center .sidebar-toggle,
		.revolution-slider-active .sticky-true.active.menu-under-logo-true.logopos-center .menu-header-social-links {
			margin-top:'.(($menu_under_logo_height-40)/2).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.menu-under-logo-true.logopos-left .search-toggle, 
		.revolution-slider-active .sticky-true.active.menu-under-logo-true.logopos-left .desk-cart-wrap, 
		.revolution-slider-active .sticky-true.active.menu-under-logo-true.logopos-left .sidebar-toggle,
		.revolution-slider-active .sticky-true.active.menu-under-logo-true.logopos-right .search-toggle, 
		.revolution-slider-active .sticky-true.active.menu-under-logo-true.logopos-right .desk-cart-wrap, 
		.revolution-slider-active .sticky-true.active.menu-under-logo-true.logopos-right .sidebar-toggle {
			margin-top:'.(($menu_under_logo_height-40)/2).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.menu-under-logo-true.logopos-left .desk-cart-wrap,
		.revolution-slider-active .sticky-true.active.menu-under-logo-true.logopos-right .desk-cart-wrap {
			margin-top:'.(($header_height-40)/2).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-false {
			height:'.$sticky_header_height.'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-false .header-body {
			height:'.$sticky_header_height.'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-false .logo,
		.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-false .logo-title,
		.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-false .logo-area {
			height: '.$sticky_header_height.'px !important;
			line-height: '.$sticky_header_height.'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-false .desk-menu > ul > li {
			height: '.$sticky_header_height.'px !important;
			line-height: '.$sticky_header_height.'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-false .desk-menu > ul > li > a {
			margin-top: '.(($sticky_header_height-36)/2).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-false .desk-menu > ul > li > a.menu-item-button {
			margin-top: '.(($sticky_header_height-44)/2).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-false .search-toggle,
		.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-false .desk-cart-wrap,
		.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-false .sidebar-toggle,
		.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-false .menu-header-social-links {
			margin-top: '.(($sticky_header_height-40)/2).'px !important;
		}';


		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-false.effect-overline .desk-menu > ul > li > a:after {
			top: -'.(($sticky_header_height-36)/2).'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-false .desk-menu .sub-menu {
			top:'.$sticky_header_height.'px !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.menu-under-logo-false .header-body {
			background-color:'.$sticky_header_back_color.' !important;';
			
		$dynamic_css .='}';

		if(!empty($sticky_header_border_color)){

			$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.menu-under-logo-true .header-body {
				border-bottom:1px solid '.$sticky_header_border_color.';
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.menu-under-logo-true .header-body > .container {
				border-bottom:1px solid '.$sticky_header_border_color.';
			}';

		}

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.menu-under-logo-true .under-logo {
			background-color:'.$sticky_menu_back_color.';
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2 .desk-menu > ul > li > a {
			color:'.$sticky_header_menu_color_reg.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2 .desk-menu > ul > li:hover > a,
		.revolution-slider-active .sticky-true.active.active_2 .desk-menu > ul > li.one-page-active > a,
		.revolution-slider-active .sticky-true.active.active_2 .desk-menu > ul > li.current-menu-item > a,
		.revolution-slider-active .sticky-true.active.active_2 .desk-menu > ul > li.current-menu-parent > a,
		.revolution-slider-active .sticky-true.active.active_2 .desk-menu > ul > li.current-menu-ancestor > a,
		.revolution-slider-active .sticky-true.active.active_2.one-page-top .desk-menu > ul > li.current-menu-item > a,
		.revolution-slider-active .sticky-true.active.active_2.one-page-top .desk-menu > ul > li.current-menu-parent > a,
		.revolution-slider-active .sticky-true.active.active_2.one-page-top .desk-menu > ul > li.current-menu-ancestor > a {
			color:'.$sticky_header_menu_color_hov.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.effect-underline .desk-menu > ul > li > a:after,
		.revolution-slider-active .sticky-true.active.active_2.effect-overline .desk-menu > ul > li > a:after,
		.revolution-slider-active .sticky-true.active.active_2.effect-fill .desk-menu > ul > li:hover,
		.revolution-slider-active .sticky-true.active.active_2.effect-fill .desk-menu > ul > li.one-page-active,
		.revolution-slider-active .sticky-true.active.active_2.effect-fill .desk-menu > ul > li.current-menu-item,
		.revolution-slider-active .sticky-true.active.active_2.effect-fill .desk-menu > ul > li.current-menu-parent,
		.revolution-slider-active .sticky-true.active.active_2.effect-fill .desk-menu > ul > li.current-menu-ancestor,
		.revolution-slider-active .sticky-true.active.active_2.effect-box .desk-menu > ul > li:hover > a,
		.revolution-slider-active .sticky-true.active.active_2.effect-box .desk-menu > ul > li.one-page-active > a,
		.revolution-slider-active .sticky-true.active.active_2.effect-box .desk-menu > ul > li.current-menu-item > a,
		.revolution-slider-active .sticky-true.active.active_2.effect-box .desk-menu > ul > li.current-menu-parent > a,
		.revolution-slider-active .sticky-true.active.active_2.effect-box .desk-menu > ul > li.current-menu-ancestor > a {
			background: '.$sticky_header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.effect-dottes .desk-menu > ul > li > a .dottes,
		.revolution-slider-active .sticky-true.active.active_2.effect-dottes .desk-menu > ul > li > a .dottes:after,
		.revolution-slider-active .sticky-true.active.active_2.effect-dottes .desk-menu > ul > li > a .dottes:before {
			background: '.$sticky_header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.one-page-top.effect-fill .desk-menu > ul > li:hover,
		.revolution-slider-active .sticky-true.active.active_2.one-page-top.effect-fill .desk-menu > ul > li.one-page-active {
			background: '.$sticky_header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .one-page-top.effect-box .desk-menu > ul > li:hover > a,
		.revolution-slider-active .sticky-true.active.active_2.one-page-top.effect-box .desk-menu > ul > li.one-page-active > a {
			background: '.$sticky_header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.menu-under-logo-true.effect-outline .desk-menu > ul > li:hover > a,
		.revolution-slider-active .sticky-true.active.active_2.effect-outline .desk-menu > ul > li.one-page-active > a,
		.revolution-slider-active .sticky-true.active.active_2.effect-outline .desk-menu > ul > li.current-menu-item > a,
		.revolution-slider-active .sticky-true.active.active_2.effect-outline .desk-menu > ul > li.current-menu-parent > a,
		.revolution-slider-active .sticky-true.active.active_2.effect-outline .desk-menu > ul > li.current-menu-ancestor > a {
			box-shadow: inset 0 0 0 1px '.$sticky_header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.one-page-top.effect-outline .desk-menu > ul > li:hover > a,
		.revolution-slider-active .sticky-true.active.active_2.one-page-top.effect-outline .desk-menu > ul > li.one-page-active > a {
			box-shadow: inset 0 0 0 1px '.$sticky_header_menu_effect_color.' !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-true {
			-webkit-transform:translateY(-'.$header_height.'px) !important;
			-ms-transform:translateY(-'.$header_height.'px) !important;
			transform:translateY(-'.$header_height.'px) !important;
		}';

		$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-true.top-true {
			-webkit-transform:translateY(-'.($header_height+$header_top_height).'px) !important;
			-ms-transform:translateY(-'.($header_height+$header_top_height).'px) !important;
			transform:translateY(-'.($header_height+$header_top_height).'px) !important;
		}';

	/* Mobile
	---------------*/

		$mob_icons_color                         = (isset($GLOBALS['goodresto_enovathemes']['mob-header-icons-color']) && !empty($GLOBALS['goodresto_enovathemes']['mob-header-icons-color'])) ? $GLOBALS['goodresto_enovathemes']['mob-header-icons-color'] : "#b6b6b6";
		$mob_header_height                       = (isset($GLOBALS['goodresto_enovathemes']['mob-header-height']) && !empty($GLOBALS['goodresto_enovathemes']['mob-header-height'])) ? $GLOBALS['goodresto_enovathemes']['mob-header-height'] : "80";
		$mob_header_logo_back_color              = (isset($GLOBALS['goodresto_enovathemes']['mob-header-logo-back-color']) && !empty($GLOBALS['goodresto_enovathemes']['mob-header-logo-back-color'])) ? $GLOBALS['goodresto_enovathemes']['mob-header-logo-back-color'] : "#ffffff";
		
		$mob_header_menu_back_color_reg          = (isset($GLOBALS['goodresto_enovathemes']['mob-header-back-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['mob-header-back-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['mob-header-back-color']['regular'] : "#ffffff";
		$mob_header_menu_back_color_hov          = (isset($GLOBALS['goodresto_enovathemes']['mob-header-back-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['mob-header-back-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['mob-header-back-color']['hover'] : "#ffffff";
		$mob_header_menu_color_reg               = (isset($GLOBALS['goodresto_enovathemes']['mob-header-menu-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['mob-header-menu-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['mob-header-menu-color']['regular'] : '#212121';
		$mob_header_menu_color_hov               = (isset($GLOBALS['goodresto_enovathemes']['mob-header-menu-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['mob-header-menu-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['mob-header-menu-color']['hover'] : '#d3a471';
		$mob_header_menu_typo_font_family  	 	 = (isset($GLOBALS['goodresto_enovathemes']['mob-header-menu-typo']['font-family']) && !empty($GLOBALS['goodresto_enovathemes']['mob-header-menu-typo']['font-family'])) ? $GLOBALS['goodresto_enovathemes']['mob-header-menu-typo']['font-family'] : "'Cabin Condensed', sans-serif";
		$mob_header_menu_typo_font_weight  	 	 = (isset($GLOBALS['goodresto_enovathemes']['mob-header-menu-typo']['font-weight']) && !empty($GLOBALS['goodresto_enovathemes']['mob-header-menu-typo']['font-weight'])) ? $GLOBALS['goodresto_enovathemes']['mob-header-menu-typo']['font-weight'] : "700";
		$mob_header_menu_typo_font_size    	 	 = (isset($GLOBALS['goodresto_enovathemes']['mob-header-menu-typo']['font-size']) && !empty($GLOBALS['goodresto_enovathemes']['mob-header-menu-typo']['font-size'])) ? $GLOBALS['goodresto_enovathemes']['mob-header-menu-typo']['font-size'] : "16px";
		$mob_header_menu_typo_letter_spacing 	 = (isset($GLOBALS['goodresto_enovathemes']['mob-header-menu-typo']['letter-spacing']) && !empty($GLOBALS['goodresto_enovathemes']['mob-header-menu-typo']['letter-spacing'])) ? $GLOBALS['goodresto_enovathemes']['mob-header-menu-typo']['letter-spacing'] : "0px";
		$mob_header_menu_typo_text_transform 	 = (isset($GLOBALS['goodresto_enovathemes']['mob-header-menu-typo']['text-transform']) && !empty($GLOBALS['goodresto_enovathemes']['mob-header-menu-typo']['text-transform'])) ? $GLOBALS['goodresto_enovathemes']['mob-header-menu-typo']['text-transform'] : "uppercase";

		$dynamic_css .='.header-logo-area {
			height:'.$mob_header_height.'px;
			line-height:'.$mob_header_height.'px;
			background-color:'.$mob_header_logo_back_color.';
		}';

		$dynamic_css .='.mobile-navigation {
			background-color:'.$mob_header_menu_back_color_reg.';
		}';

		$dynamic_css .='.mobile-navigation ul > li > a {
			color:'.$mob_header_menu_color_reg.';
			font-family:'.$mob_header_menu_typo_font_family.'; 
			font-weight:'.$mob_header_menu_typo_font_weight.'; 
			font-size:'.$mob_header_menu_typo_font_size.'; 
			letter-spacing:'.$mob_header_menu_typo_letter_spacing.'; 
			text-transform:'.$mob_header_menu_typo_text_transform.';
			background-color:'.$mob_header_menu_back_color_reg.';
		}';

		$dynamic_css .='.mobile-navigation ul > li:hover > a,
		.mobile-navigation ul > li.current-menu-item > a,
		.mobile-navigation ul > li.current_page_item > a,
		.mobile-navigation ul > li.current-menu-parent > a,
		.mobile-navigation ul > li.current-menu-ancestor > a {
			color:'.$mob_header_menu_color_hov.';
			background-color:'.$mob_header_menu_back_color_hov.';
		}';

		$dynamic_css .='.mobile-navigation .language-switcher {
			border:1px solid '.goodresto_enovathemes_hex_to_rgba($mob_header_menu_color_reg,0.3).';
		}';

		$dynamic_css .='.mobile-navigation .language-switcher:hover {
			border:1px solid '.goodresto_enovathemes_hex_to_rgba($mob_header_menu_color_hov,0.5).';
		}';

		$dynamic_css .='.mob-site-sidebar-toggle,
		.mob-search-toggle,
		.mob-sidebar-toggle,
		.mob-fullscreen-toggle,
		.mob-menu-toggle {
			color: '.$mob_icons_color.';
			margin-top:'.(($mob_header_height-40)/2).'px;
		}';

		$dynamic_css .='.header-logo-area .mob-sidebar-toggle > span,
		.header-logo-area .mob-fullscreen-toggle > span,
		.header-logo-area .mob-menu-toggle > span,
		.header-logo-area .mob-sidebar-toggle > span:before,
		.header-logo-area .mob-fullscreen-toggle > span:before,
		.header-logo-area .mob-menu-toggle > span:before,
		.header-logo-area .mob-sidebar-toggle > span:after,
		.header-logo-area .mob-fullscreen-toggle > span:after,
		.header-logo-area .mob-menu-toggle > span:after {
			background-color: '.$mob_icons_color.';
		}';

		/* Mobile nav widgets
		---------------*/

			$dynamic_css .='.mobile-navigation .widget {
				color:'.$mob_header_menu_color_reg.';
				font-size:'.$mob_header_menu_typo_font_size.'; 
				line-height: 24px;
			}';

			$dynamic_css .='.mobile-navigation .widget a {
				color:'.$mob_header_menu_color_reg.';
				font-size:'.$mob_header_menu_typo_font_size.'; 
				line-height: 24px;
			}';

			$dynamic_css .='.mobile-navigation .widget a:hover {
				color:'.$mob_header_menu_color_hov.';
			}';

			$dynamic_css .='.mobile-navigation .widget_twitter .tweet-time,
			.mobile-navigation .widget_categories ul li a,
			.mobile-navigation .widget_pages ul li a,
			.mobile-navigation .widget_archive ul li a,
			.mobile-navigation .widget_meta ul li a,
			.mobile-navigation .widget_layered_nav ul li a,
			.mobile-navigation .widget_nav_menu ul li a,
			.mobile-navigation .widget_product_categories ul li a,
			.mobile-navigation .widget_recent_entries ul li a, 
			.mobile-navigation .widget_rss ul li a,
			.mobile-navigation .widget_icl_lang_sel_widget li a,
			.mobile-navigation .recentcomments a,
			.mobile-navigation .widget_et_recent_entries .post-title a {
				color:'.$mob_header_menu_color_reg.' !important;
			}';

			$dynamic_css .='.mobile-navigation .widget_twitter li:before,
			.mobile-navigation .widget_recent_comments li:before,
			.mobile-navigation .wp-caption-text, .mobile-navigation .gallery-caption {
				color: '.$mob_header_menu_color_reg.';
			}';

			$dynamic_css .='.mobile-navigation .widget_et_recent_entries .post-title:hover a,
			.mobile-navigation .widget_et_recent_entries .post-date a:hover,
			.mobile-navigation .widget_twitter .tweet-time:hover,
			.mobile-navigation .widget_categories ul li a:hover,
			.mobile-navigation .widget_pages ul li a:hover,
			.mobile-navigation .widget_archive ul li a:hover,
			.mobile-navigation .widget_meta ul li a:hover,
			.mobile-navigation .widget_layered_nav ul li a:hover,
			.mobile-navigation .widget_nav_menu ul li a:hover,
			.mobile-navigation .widget_product_categories ul li a:hover,
			.mobile-navigation .widget_recent_entries ul li a:hover, 
			.mobile-navigation .widget_rss ul li a:hover,
			.mobile-navigation .widget_icl_lang_sel_widget li a:hover,
			.mobile-navigation .recentcomments a:hover,
			.mobile-navigation .widget_et_recent_entries .post-title a:hover {
				color: '.$mob_header_menu_color_hov.' !important;
			}';

			$dynamic_css .='.mobile-navigation .widget_tag_cloud .tagcloud a,
			.mobile-navigation .widget_product_tag_cloud .tagcloud a,
			.mobile-navigation .event-tags a {
				color:'.$mob_header_menu_color_reg.' !important;
			}';

			$dynamic_css .='.mobile-navigation .widget_tag_cloud .tagcloud a:hover,
			.mobile-navigation .widget_product_tag_cloud .tagcloud a:hover,
			.mobile-navigation .event-tags a:hover {
				color:'.$mob_header_menu_color_hov.' !important;
			}';

			$dynamic_css .='.mobile-navigation .widget_tag_cloud .tagcloud a:after,
			.mobile-navigation .widget_product_tag_cloud .tagcloud a:after,
			.mobile-navigation .event-tags a:after {
				background-color:'.$mob_header_menu_color_reg.' !important;
			}';

			$dynamic_css .='.mobile-navigation .widget_tag_cloud .tagcloud a:hover:after,
			.mobile-navigation .widget_product_tag_cloud .tagcloud a:hover:after,
			.mobile-navigation .event-tags a:hover:after {
				background-color:'.$mob_header_menu_color_hov.' !important;
			}';

			$dynamic_css .='.mobile-navigation .widget_nav_menu ul li a.animate + ul li:before, 
			.mobile-navigation .widget_product_categories ul li a.animate + ul li:before {
			    background-color: '.goodresto_enovathemes_hex_to_rgba($mob_header_menu_color_reg,0.5).';
			}';

			$dynamic_css .='.mobile-navigation .widget_icl_lang_sel_widget li a,
			.mobile-navigation .widget_calendar caption,
			.mobile-navigation .widget_calendar th:first-child,
			.mobile-navigation .widget_calendar th:last-child,
			.mobile-navigation .widget_calendar td {
			    border-color: '.goodresto_enovathemes_hex_to_rgba($mob_header_menu_color_reg,0.5).';
			}';

			$dynamic_css .='.mobile-navigation .mejs-container, 
			.mobile-navigation .mejs-container,
			.mobile-navigation .mejs-controls, 
			.mobile-navigation .mejs-embed, 
			.mobile-navigation .mejs-embed body {
				background: '.goodresto_enovathemes_hex_to_rgb_shade($mob_header_menu_back_color_reg,-30).' !important;
			}';

			$dynamic_css .='.mobile-navigation .widget_schedule ul li {
				color: '.$mob_header_menu_color_reg.';
			}';

			$dynamic_css .='.mobile-navigation .widget_schedule ul li:nth-child(2n+1) {
				background: '.goodresto_enovathemes_hex_to_rgba($mob_header_menu_color_reg,0.1).' !important;
				color: '.$mob_header_menu_color_reg.';
			}';

			$dynamic_css .='.mobile-navigation input[type="button"]:hover,
			.mobile-navigation input[type="reset"]:hover,
			.mobile-navigation input[type="submit"]:hover,
			.mobile-navigation button:hover,
			.mobile-navigation a.checkout-button:hover,
			.mobile-navigation a.woocommerce-button:hover,
			.mobile-navigation .woocommerce-mini-cart__buttons > a.button:hover {
				color:'.$mob_header_menu_back_color_reg.';
				background-color:'.$mob_header_menu_color_hov.';';
				if (!empty($form_button_border_width)) {
					$dynamic_css .='box-shadow:inset 0 0 0 '.$form_button_border_width.'px '.$mob_header_menu_color_hov.';';
					$dynamic_css .='background-color:transparent !important;';
					$dynamic_css .='color:'.$mob_header_menu_color_hov.' !important;';
				}
			$dynamic_css .='}';

			$dynamic_css .='.mobile-navigation .widget_fast_contact_widget .sending:before {
				border-top: 2px solid '.goodresto_enovathemes_hex_to_rgba($mob_header_menu_color_reg,0.1).';
				border-right: 2px solid '.goodresto_enovathemes_hex_to_rgba($mob_header_menu_color_reg,0.1).';
				border-bottom: 2px solid '.goodresto_enovathemes_hex_to_rgba($mob_header_menu_color_reg,0.1).';
				border-left: 2px solid '.goodresto_enovathemes_hex_to_rgba($mob_header_menu_color_reg,0.4).';
			}';

			/* Widget woocommerce
			---------------*/

				$dynamic_css .='.mobile-navigation .widget_shopping_cart .cart-product-title > a,
				.mobile-navigation .widget_shopping_cart .cart-product-title a .product-title,
				.mobile-navigation .widget_products .product_list_widget > li > a .product-title, 
				.mobile-navigation .widget_products .widget_recent_reviews .product_list_widget a, 
				.mobile-navigation .widget_recently_viewed_products .product_list_widget > li a .product-title, 
				.mobile-navigation .widget_recent_reviews .product_list_widget > li a .product-title, 
				.mobile-navigation .widget_top_rated_products .product_list_widget > li a .product-title,
				.mobile-navigation .widget_layered_nav ul li a,
				.mobile-navigation .widget_layered_nav_filters li a,
				.mobile-navigation .widget_shopping_cart .cart_list li .remove {
					color:'.$mob_header_menu_color_reg.' !important;
				}';

				$dynamic_css .='.mobile-navigation .widget_shopping_cart .cart-product-title > a:hover,
				.mobile-navigation .widget_shopping_cart .cart_list li .remove:hover .product-title,
				.mobile-navigation .widget_products .product_list_widget > li > a:hover .product-title, 
				.mobile-navigation .widget_recently_viewed_products .product_list_widget > li a:hover .product-title, 
				.mobile-navigation .widget_recent_reviews .product_list_widget > li a:hover .product-title, 
				.mobile-navigation .widget_top_rated_products .product_list_widget > li a:hover .product-title,
				.mobile-navigation .widget_layered_nav_filters li:hover > a,
				.mobile-navigation .widget_shopping_cart .cart_list li .remove:hover {
					color:'.$mob_header_menu_color_hov.' !important;
				}';

				$dynamic_css .='.mobile-navigation .widget_layered_nav li a {
	                color:'.$mob_header_menu_color_reg.' !important;
	            }';

	            $dynamic_css .='.mobile-navigation .woocommerce-mini-cart__total:before {
	                background-color:'.goodresto_enovathemes_hex_to_rgba($mob_header_menu_color_reg,0.3).' !important;
	            }';

	            $dynamic_css .='.mobile-navigation .widget_price_filter .price_slider_wrapper .ui-widget-content {
	                background-color:'.goodresto_enovathemes_hex_to_rgba($mob_header_menu_color_reg,0.1).' !important;
	            }';

	            $dynamic_css .='.mobile-navigation .star-rating:before {
	                color:'.goodresto_enovathemes_hex_to_rgba($mob_header_menu_color_reg,0.3).' !important;
	            }';

	/* Header widgets
	---------------*/

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget {
			color:'.$megamenu_links_color_reg.';
			font-size:'.$header_submenu_typo_font_size.'; 
			line-height: '.$header_submenu_typo_line_height.';
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_title {
			text-transform: '.$megamenu_top_typo_text_transform.';
			font-weight: '.$megamenu_top_typo_font_weight.';
			font-family: '.$megamenu_top_typo_font_family.';
			font-size: '.$megamenu_top_typo_font_size.';
			letter-spacing: '.$megamenu_top_typo_letter_spacing.';
			color: '.$megamenu_top_typo_color.' !important;
		}';

		if (!empty($megamenu_top_border)) {
			$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_title {
				padding: 8px 16px 32px 16px !important;
			}';

			$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_title:before {';
				$dynamic_css .='background:'.$megamenu_top_border.';';
			$dynamic_css .='}';
		}

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget a {
			color:'.$megamenu_links_color_reg.';
			font-size:'.$header_submenu_typo_font_size.'; 
			line-height: '.$header_submenu_typo_line_height.';
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget a:hover {
			color:'.$megamenu_links_color_hov.';
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_twitter .tweet-time,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_categories ul li a,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_pages ul li a,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_archive ul li a,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_meta ul li a,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_layered_nav ul li a,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_nav_menu ul li a,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_product_categories ul li a,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_recent_entries ul li a, 
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_rss ul li a,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_icl_lang_sel_widget li a,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .recentcomments a,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_et_recent_entries .post-title a {
			color:'.$megamenu_links_color_reg.' !important;
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_twitter li:before,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_recent_comments li:before,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .wp-caption-text, .desk-menu > ul > [data-mm="true"] > .sub-menu .gallery-caption {
			color: '.$megamenu_links_color_reg.';
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_et_recent_entries .post-title:hover a,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_et_recent_entries .post-date a:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_twitter .tweet-time:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_categories ul li a:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_pages ul li a:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_archive ul li a:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_meta ul li a:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_layered_nav ul li a:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_nav_menu ul li a:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_product_categories ul li a:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_recent_entries ul li a:hover, 
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_rss ul li a:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_icl_lang_sel_widget li a:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .recentcomments a:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_et_recent_entries .post-title a:hover {
			color: '.$megamenu_links_color_hov.' !important;
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_tag_cloud .tagcloud a,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_product_tag_cloud .tagcloud a,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .event-tags a {
			color:'.$megamenu_links_color_reg.' !important;
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_tag_cloud .tagcloud a:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_product_tag_cloud .tagcloud a:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .event-tags a:hover {
			color:'.$megamenu_links_color_hov.' !important;
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_tag_cloud .tagcloud a:after,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_product_tag_cloud .tagcloud a:after,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .event-tags a:after {
			background-color:'.$megamenu_links_color_reg.' !important;
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_tag_cloud .tagcloud a:hover:after,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_product_tag_cloud .tagcloud a:hover:after,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .event-tags a:hover:after {
			background-color:'.$megamenu_links_color_hov.' !important;
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_nav_menu ul li a.animate + ul li:before, 
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_product_categories ul li a.animate + ul li:before {
		    background-color: '.goodresto_enovathemes_hex_to_rgba($megamenu_links_color_reg,0.5).';
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_icl_lang_sel_widget li a,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_calendar caption,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_calendar th:first-child,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_calendar th:last-child,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_calendar td {
		    border-color: '.goodresto_enovathemes_hex_to_rgba($megamenu_links_color_reg,0.5).';
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .mejs-container, 
		.desk-menu > ul > [data-mm="true"] > .sub-menu .mejs-container,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .mejs-controls, 
		.desk-menu > ul > [data-mm="true"] > .sub-menu .mejs-embed, 
		.desk-menu > ul > [data-mm="true"] > .sub-menu .mejs-embed body {
			background: '.goodresto_enovathemes_hex_to_rgb_shade($header_submenu_back_color,-30).' !important;
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_schedule ul li {
			color: '.$megamenu_links_color_reg.';
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_schedule ul li:nth-child(2n+1) {
			background: '.goodresto_enovathemes_hex_to_rgba($megamenu_links_color_reg,0.1).' !important;
			color: '.$megamenu_links_color_reg.';
		}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu input[type="button"]:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu input[type="reset"]:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu input[type="submit"]:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu button:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu a.checkout-button:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu a.woocommerce-button:hover,
		.desk-menu > ul > [data-mm="true"] > .sub-menu .woocommerce-mini-cart__buttons > a.button:hover {
			color:'.$header_submenu_back_color.';
			background-color:'.$megamenu_links_color_hov.';';
			if (!empty($form_button_border_width)) {
				$dynamic_css .='box-shadow:inset 0 0 0 '.$form_button_border_width.'px '.$megamenu_links_color_hov.';';
				$dynamic_css .='background-color:transparent !important;';
				$dynamic_css .='color:'.$megamenu_links_color_hov.' !important;';
			}
		$dynamic_css .='}';

		$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_fast_contact_widget .sending:before {
			border-top: 2px solid '.goodresto_enovathemes_hex_to_rgba($megamenu_links_color_reg,0.1).';
			border-right: 2px solid '.goodresto_enovathemes_hex_to_rgba($megamenu_links_color_reg,0.1).';
			border-bottom: 2px solid '.goodresto_enovathemes_hex_to_rgba($megamenu_links_color_reg,0.1).';
			border-left: 2px solid '.goodresto_enovathemes_hex_to_rgba($megamenu_links_color_reg,0.4).';
		}';

		/* Widget woocommerce
		---------------*/

			$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_shopping_cart .cart-product-title > a,
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_shopping_cart .cart-product-title a .product-title,
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_products .product_list_widget > li > a .product-title, 
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_products .widget_recent_reviews .product_list_widget a, 
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_recently_viewed_products .product_list_widget > li a .product-title, 
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_recent_reviews .product_list_widget > li a .product-title, 
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_top_rated_products .product_list_widget > li a .product-title,
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_layered_nav ul li a,
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_layered_nav_filters li a,
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_shopping_cart .cart_list li .remove {
				color:'.$megamenu_links_color_reg.' !important;
			}';

			$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_shopping_cart .cart-product-title > a:hover,
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_shopping_cart .cart_list li .remove:hover .product-title,
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_products .product_list_widget > li > a:hover .product-title, 
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_recently_viewed_products .product_list_widget > li a:hover .product-title, 
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_recent_reviews .product_list_widget > li a:hover .product-title, 
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_top_rated_products .product_list_widget > li a:hover .product-title,
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_layered_nav_filters li:hover > a,
			.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_shopping_cart .cart_list li .remove:hover {
				color:'.$megamenu_links_color_hov.' !important;
			}';

			$dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_layered_nav li a {
                color:'.$megamenu_links_color_reg.' !important;
            }';

            $dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .woocommerce-mini-cart__total:before {
                background-color:'.goodresto_enovathemes_hex_to_rgba($megamenu_links_color_reg,0.3).' !important;
            }';

            $dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .widget_price_filter .price_slider_wrapper .ui-widget-content {
                background-color:'.goodresto_enovathemes_hex_to_rgba($megamenu_links_color_reg,0.1).' !important;
            }';

            $dynamic_css .='.desk-menu > ul > [data-mm="true"] > .sub-menu .star-rating:before {
                color:'.goodresto_enovathemes_hex_to_rgba($megamenu_links_color_reg,0.3).' !important;
            }';

	/* Fullscreen
	---------------*/

		$fullscreen_header_icons_color                  = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-header-icons-color']) && $GLOBALS['goodresto_enovathemes']['fullscreen-header-icons-color']) ? $GLOBALS['goodresto_enovathemes']['fullscreen-header-icons-color'] : "#b6b6b6";
		$fullscreen_sticky_icons_color                  = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-icons-color']) && $GLOBALS['goodresto_enovathemes']['fullscreen-sticky-icons-color']) ? $GLOBALS['goodresto_enovathemes']['fullscreen-sticky-icons-color'] : $fullscreen_header_icons_color;

		$fullscreen_height                       		= (isset($GLOBALS['goodresto_enovathemes']['fullscreen-height']) && $GLOBALS['goodresto_enovathemes']['fullscreen-height']) ? $GLOBALS['goodresto_enovathemes']['fullscreen-height'] : "96";
		$fullscreen_back_color                   		= (isset($GLOBALS['goodresto_enovathemes']['fullscreen-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['fullscreen-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['fullscreen-back-color']['color'],$GLOBALS['goodresto_enovathemes']['fullscreen-back-color']['alpha']) : "#ffffff";
		$fullscreen_border_color                 		= (isset($GLOBALS['goodresto_enovathemes']['fullscreen-border-color']['color']) && $GLOBALS['goodresto_enovathemes']['fullscreen-border-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['fullscreen-border-color']['color'],$GLOBALS['goodresto_enovathemes']['fullscreen-border-color']['alpha']) : "";
		
		$fullscreen_sticky_height                  		= (isset($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-height']) && $GLOBALS['goodresto_enovathemes']['fullscreen-sticky-height']) ? $GLOBALS['goodresto_enovathemes']['fullscreen-sticky-height'] : $fullscreen_height;
		$fullscreen_sticky_back_color              		= (isset($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['fullscreen-sticky-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-back-color']['color'],$GLOBALS['goodresto_enovathemes']['fullscreen-sticky-back-color']['alpha']) : $fullscreen_back_color;
		$fullscreen_sticky_border_color            		= (isset($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-border-color']['color']) && $GLOBALS['goodresto_enovathemes']['fullscreen-sticky-border-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-border-color']['color'],$GLOBALS['goodresto_enovathemes']['fullscreen-sticky-border-color']['alpha']) : $fullscreen_border_color;

		$fullscreen_menu_color_reg               		= (isset($GLOBALS['goodresto_enovathemes']['fullscreen-menu-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-menu-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-menu-color']['regular'] : '#9e9e9e';
		$fullscreen_menu_color_hov               		= (isset($GLOBALS['goodresto_enovathemes']['fullscreen-menu-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-menu-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-menu-color']['hover'] : '#ffffff';
		$fullscreen_menu_typo_font_family  	 	 		= (isset($GLOBALS['goodresto_enovathemes']['fullscreen-menu-typo']['font-family']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-menu-typo']['font-family'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-menu-typo']['font-family'] : "'Cabin Condensed', sans-serif";
		$fullscreen_menu_typo_font_weight  	 	 		= (isset($GLOBALS['goodresto_enovathemes']['fullscreen-menu-typo']['font-weight']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-menu-typo']['font-weight'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-menu-typo']['font-weight'] : "600";
		$fullscreen_menu_typo_font_size    	 	 		= (isset($GLOBALS['goodresto_enovathemes']['fullscreen-menu-typo']['font-size']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-menu-typo']['font-size'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-menu-typo']['font-size'] : "24px";
		$fullscreen_menu_typo_letter_spacing 	 		= (isset($GLOBALS['goodresto_enovathemes']['fullscreen-menu-typo']['letter-spacing']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-menu-typo']['letter-spacing'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-menu-typo']['letter-spacing'] : "2px";
		$fullscreen_menu_typo_text_transform 	 		= (isset($GLOBALS['goodresto_enovathemes']['fullscreen-menu-typo']['text-transform']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-menu-typo']['text-transform'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-menu-typo']['text-transform'] : "uppercase";
		$fullscreen_effect_color   	     	     		= (isset($GLOBALS['goodresto_enovathemes']['fullscreen-menu-effect-color']['color']) && $GLOBALS['goodresto_enovathemes']['fullscreen-menu-effect-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['fullscreen-menu-effect-color']['color'],$GLOBALS['goodresto_enovathemes']['fullscreen-menu-effect-color']['alpha']) : "#d3a471";

		$fullscreen_back         	 				    = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-back']) && $GLOBALS['goodresto_enovathemes']['fullscreen-back']) ? $GLOBALS['goodresto_enovathemes']['fullscreen-back'] : "#ffffff";
		$fullscreen_back_opacity      	 				= (isset($GLOBALS['goodresto_enovathemes']['fullscreen-opacity']) && $GLOBALS['goodresto_enovathemes']['fullscreen-opacity']) ? $GLOBALS['goodresto_enovathemes']['fullscreen-opacity'] : "0";


		$fullscreen_social_links                    = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-social-links']) && $GLOBALS['goodresto_enovathemes']['fullscreen-social-links'] == 1) ? 'true' : 'false';
		$fullscreen_social_links_color_reg          = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-social-links-color']['regular'] : '#abacae';
		$fullscreen_social_links_color_hov          = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-social-links-color']['hover'] : '#d3a471';
		$fullscreen_social_links_border_color_reg   = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-border-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-border-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-social-links-border-color']['regular'] : '';
		$fullscreen_social_links_border_color_hov   = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-border-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-border-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-social-links-border-color']['hover'] : '';
		$fullscreen_social_links_back_color_reg     = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-back-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-back-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-social-links-back-color']['regular'] : '';
		$fullscreen_social_links_back_color_hov     = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-back-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-back-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-social-links-back-color']['hover'] : '';
		$fullscreen_social_links_border_radius      = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-border-radius']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-border-radius'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-social-links-border-radius'] : '0';
		$fullscreen_social_links_border_width       = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-border-width']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-social-links-border-width'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-social-links-border-width'] : '0';

		$fullscreen_sticky_social_links_color_reg          = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-color']['regular'] : $fullscreen_social_links_color_reg;
		$fullscreen_sticky_social_links_color_hov          = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-color']['hover'] : $fullscreen_social_links_color_hov;
		$fullscreen_sticky_social_links_border_color_reg   = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-border-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-border-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-border-color']['regular'] : $fullscreen_social_links_border_color_reg;
		$fullscreen_sticky_social_links_border_color_hov   = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-border-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-border-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-border-color']['hover'] : $fullscreen_social_links_border_color_hov;
		$fullscreen_sticky_social_links_back_color_reg     = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-back-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-back-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-back-color']['regular'] : $fullscreen_social_links_back_color_reg;
		$fullscreen_sticky_social_links_back_color_hov     = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-back-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-back-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-sticky-social-links-back-color']['hover'] : $fullscreen_social_links_back_color_hov;

		if ($fullscreen_social_links == "true") {
			$dynamic_css .='.fullscreen-bar .menu-header-social-links a {
				color:'.$fullscreen_social_links_color_reg.';';
				if (!empty($fullscreen_social_links_back_color_reg)) {
					$dynamic_css .='background-color:'.$fullscreen_social_links_back_color_reg.';';
				}
				if (!empty($fullscreen_social_links_border_color_reg)) {
					$dynamic_css .='box-shadow:inset 0 0 0 '.$fullscreen_social_links_border_width.'px '.$fullscreen_social_links_border_color_reg.';';
				}
				$dynamic_css .='border-radius:'.$fullscreen_social_links_border_radius.'px;
			}';

			$dynamic_css .='.fullscreen-bar .menu-header-social-links a:hover {
				color:'.$fullscreen_social_links_color_hov.';';
				if (!empty($fullscreen_social_links_back_color_hov)) {
					$dynamic_css .='background-color:'.$fullscreen_social_links_back_color_hov.';';
				}
				if (!empty($fullscreen_social_links_border_color_hov)) {
					$dynamic_css .='box-shadow:inset 0 0 0 '.$fullscreen_social_links_border_width.'px '.$fullscreen_social_links_border_color_hov.';';
				}
			$dynamic_css .='}';

			$dynamic_css .='.fullscreen-bar.sticky-true.active .menu-header-social-links a {
				color:'.$fullscreen_sticky_social_links_color_reg.';';
				if (!empty($fullscreen_sticky_social_links_back_color_reg)) {
					$dynamic_css .='background-color:'.$fullscreen_sticky_social_links_back_color_reg.';';
				}
				if (!empty($fullscreen_sticky_social_links_border_color_reg)) {
					$dynamic_css .='box-shadow:inset 0 0 0 '.$fullscreen_social_links_border_width.'px '.$fullscreen_sticky_social_links_border_color_reg.';';
				}
			$dynamic_css .='}';

			$dynamic_css .='.fullscreen-bar.sticky-true.active .menu-header-social-links a:hover {
				color:'.$fullscreen_sticky_social_links_color_hov.';';
				if (!empty($fullscreen_sticky_social_links_back_color_hov)) {
					$dynamic_css .='background-color:'.$fullscreen_sticky_social_links_back_color_hov.';';
				}
				if (!empty($fullscreen_sticky_social_links_border_color_hov)) {
					$dynamic_css .='box-shadow:inset 0 0 0 '.$fullscreen_social_links_border_width.'px '.$fullscreen_sticky_social_links_border_color_hov.';';
				}
			$dynamic_css .='}';
		}


		$dynamic_css .='.fullscreen-bar {
			height:'.$fullscreen_height.'px;
			background-color: '.$fullscreen_back_color.';';
		    if(!empty($fullscreen_border_color)){
				$dynamic_css .='border-bottom:1px solid '.$fullscreen_border_color.';';
		    }
		$dynamic_css .='}';

		$dynamic_css .='.fullscreen-bar.sticky-true.active {
			height:'.$fullscreen_sticky_height.'px;
			background-color: '.$fullscreen_sticky_back_color.';';
		    if(!empty($fullscreen_sticky_border_color)){
				$dynamic_css .='border-bottom:1px solid '.$fullscreen_sticky_border_color.';';
		    }
		$dynamic_css .='}';

		$dynamic_css .='.fullscreen-bar .logo {
			height: '.$fullscreen_height.'px;
			line-height: '.$fullscreen_height.'px;
		}';

		$dynamic_css .='.fullscreen-icons > * {
			margin-top: '.(($fullscreen_height-40)/2).'px;
		}';

		$dynamic_css .='.fullscreen-icons > .language-switcher {
			margin-top: '.(($fullscreen_height-36)/2).'px !important;
		}';

		$dynamic_css .='.fullscreen-bar.sticky-true.active .logo {
			height: '.$fullscreen_sticky_height.'px !important;
			line-height: '.$fullscreen_sticky_height.'px !important;
		}';

		$dynamic_css .='.fullscreen-bar.sticky-true.active .fullscreen-icons > * {
			margin-top: '.(($fullscreen_sticky_height-40)/2).'px !important;
		}';

		$dynamic_css .='.fullscreen-bar.sticky-true.active .fullscreen-icons > .language-switcher {
			margin-top: '.(($fullscreen_sticky_height-36)/2).'px !important;
		}';

		$dynamic_css .='.fullscreen-modal {
			background-color: '.goodresto_enovathemes_hex_to_rgba($fullscreen_back,$fullscreen_back_opacity/10).' !important;
		}';

		$dynamic_css .='.fullscreen-modal-close {
			color:'.$fullscreen_menu_color_reg.' !important;
		}';

		$dynamic_css .='.fullscreen-menu ul > li > a {
			color:'.$fullscreen_menu_color_reg.';
			font-family:'.$fullscreen_menu_typo_font_family.'; 
			font-weight:'.$fullscreen_menu_typo_font_weight.'; 
			font-size:'.$fullscreen_menu_typo_font_size.'; 
			letter-spacing:'.$fullscreen_menu_typo_letter_spacing.'; 
			text-transform:'.$fullscreen_menu_typo_text_transform.';
		}';

		$dynamic_css .='.fullscreen-menu ul > li > a:hover {
			color:'.$fullscreen_menu_color_hov.';
			background-color:'.$fullscreen_effect_color.';
		}';

		$dynamic_css .='.fullscreen-icons .cart-toggle,
		.fullscreen-icons > .search-toggle,
		.fullscreen-icons > .fullscreen-toggle
		{color: '.$fullscreen_header_icons_color.';}';

		$dynamic_css .='.fullscreen-icons > .fullscreen-toggle:before
		{background-color: '.$fullscreen_header_icons_color.';}';

		$dynamic_css .='.fullscreen-icons > .fullscreen-toggle > span
		{background-color: '.$fullscreen_header_icons_color.';}';

		$dynamic_css .='.active .fullscreen-icons .cart-toggle,
		.active .fullscreen-icons > .search-toggle,
		.active .fullscreen-icons > .fullscreen-toggle
		{color: '.$fullscreen_sticky_icons_color.';}';

		$dynamic_css .='.active .fullscreen-icons > .fullscreen-toggle:before
		{background-color: '.$fullscreen_sticky_icons_color.';}';

		$dynamic_css .='.active .fullscreen-icons > .fullscreen-toggle > span
		{background-color: '.$fullscreen_sticky_icons_color.';}';

	/* Sidebar navigation
	---------------*/

		$sidebar_back      			 		 = (isset($GLOBALS['goodresto_enovathemes']['sidebar-back']) && $GLOBALS['goodresto_enovathemes']['sidebar-back']) ? $GLOBALS['goodresto_enovathemes']['sidebar-back'] : "#ffffff";
		$sidebar_back_img       			 = (isset($GLOBALS['goodresto_enovathemes']['sidebar-back-img']['background-image']) && $GLOBALS['goodresto_enovathemes']['sidebar-back-img']['background-image']) ? esc_url($GLOBALS['goodresto_enovathemes']['sidebar-back-img']['background-image']) : "";
		$sidebar_back_r         			 = (isset($GLOBALS['goodresto_enovathemes']['sidebar-back-img']['background-repeat']) && $GLOBALS['goodresto_enovathemes']['sidebar-back-img']['background-repeat']) ? $GLOBALS['goodresto_enovathemes']['sidebar-back-img']['background-repeat'] : "no-repeat";
		$sidebar_back_s         			 = (isset($GLOBALS['goodresto_enovathemes']['sidebar-back-img']['background-size']) && $GLOBALS['goodresto_enovathemes']['sidebar-back-img']['background-size']) ? $GLOBALS['goodresto_enovathemes']['sidebar-back-img']['background-size'] : "inherit";
		$sidebar_back_a         			 = (isset($GLOBALS['goodresto_enovathemes']['sidebar-back-img']['background-attachment']) && $GLOBALS['goodresto_enovathemes']['sidebar-back-img']['background-attachment']) ? $GLOBALS['goodresto_enovathemes']['sidebar-back-img']['background-attachment'] : "inherit";
		$sidebar_back_p         			 = (isset($GLOBALS['goodresto_enovathemes']['sidebar-back-img']['background-position']) && $GLOBALS['goodresto_enovathemes']['sidebar-back-img']['background-position']) ? $GLOBALS['goodresto_enovathemes']['sidebar-back-img']['background-position'] : "left top";
		$sidebar_menu_color_reg              = (isset($GLOBALS['goodresto_enovathemes']['sidebar-menu-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-menu-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-menu-color']['regular'] : '#757575';
		$sidebar_menu_color_hov              = (isset($GLOBALS['goodresto_enovathemes']['sidebar-menu-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-menu-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-menu-color']['hover'] : '#d3a471';
		$sidebar_menu_typo_font_family  	 = (isset($GLOBALS['goodresto_enovathemes']['sidebar-menu-typo']['font-family']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-menu-typo']['font-family'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-menu-typo']['font-family'] : "'Cabin Condensed', sans-serif";
		$sidebar_menu_typo_font_weight  	 = (isset($GLOBALS['goodresto_enovathemes']['sidebar-menu-typo']['font-weight']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-menu-typo']['font-weight'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-menu-typo']['font-weight'] : "400";
		$sidebar_menu_typo_font_size    	 = (isset($GLOBALS['goodresto_enovathemes']['sidebar-menu-typo']['font-size']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-menu-typo']['font-size'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-menu-typo']['font-size'] : "16px";
		$sidebar_menu_typo_letter_spacing 	 = (isset($GLOBALS['goodresto_enovathemes']['sidebar-menu-typo']['letter-spacing']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-menu-typo']['letter-spacing'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-menu-typo']['letter-spacing'] : "0px";
		$sidebar_menu_typo_text_transform 	 = (isset($GLOBALS['goodresto_enovathemes']['sidebar-menu-typo']['text-transform']) && !empty($GLOBALS['goodresto_enovathemes']['sidebar-menu-typo']['text-transform'])) ? $GLOBALS['goodresto_enovathemes']['sidebar-menu-typo']['text-transform'] : "none";
		$sidebar_menu_border_color           = (isset($GLOBALS['goodresto_enovathemes']['sidebar-menu-border-color']['color']) && $GLOBALS['goodresto_enovathemes']['sidebar-menu-border-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['sidebar-menu-border-color']['color'],$GLOBALS['goodresto_enovathemes']['sidebar-menu-border-color']['alpha']) : "#e0e0e0";
		$sidebar_logo_margin_top             = (isset($GLOBALS['goodresto_enovathemes']['sidebar-logo-margin']['margin-top']) && $GLOBALS['goodresto_enovathemes']['sidebar-logo-margin']['margin-top']) ? $GLOBALS['goodresto_enovathemes']['sidebar-logo-margin']['margin-top'] : "0px";       
		$sidebar_logo_margin_bottom          = (isset($GLOBALS['goodresto_enovathemes']['sidebar-logo-margin']['margin-bottom']) && $GLOBALS['goodresto_enovathemes']['sidebar-logo-margin']['margin-bottom']) ? $GLOBALS['goodresto_enovathemes']['sidebar-logo-margin']['margin-bottom'] : "0px";       
		$sidebar_menu_margin_top             = (isset($GLOBALS['goodresto_enovathemes']['sidebar-menu-margin']['margin-top']) && $GLOBALS['goodresto_enovathemes']['sidebar-menu-margin']['margin-top']) ? $GLOBALS['goodresto_enovathemes']['sidebar-menu-margin']['margin-top'] : "0px";       
		$sidebar_menu_margin_bottom          = (isset($GLOBALS['goodresto_enovathemes']['sidebar-menu-margin']['margin-bottom']) && $GLOBALS['goodresto_enovathemes']['sidebar-menu-margin']['margin-bottom']) ? $GLOBALS['goodresto_enovathemes']['sidebar-menu-margin']['margin-bottom'] : "0px";       

		$dynamic_css .='.sidebar-nav {
			background-color: '.$sidebar_back.';';
			if(!empty($sidebar_back_img)){
				$dynamic_css .='background-image:url('.$sidebar_back_img.');
				background-repeat:'.$sidebar_back_r.';
				background-attachment: '.$sidebar_back_a.';
				-webkit-background-size: '.$sidebar_back_s.';
				-moz-background-size: '.$sidebar_back_s.';
				background-size: '.$sidebar_back_s.';
				background-position:'.$sidebar_back_p;
			}
		$dynamic_css .='}';

		$dynamic_css .='.sidebar-menu .sub-menu {
			background-color: '.$sidebar_back.';
		}';

		$dynamic_css .='.sidebar-menu ul > li > a {
			color:'.$sidebar_menu_color_reg.';
			font-family:'.$sidebar_menu_typo_font_family.'; 
			font-weight:'.$sidebar_menu_typo_font_weight.'; 
			font-size:'.$sidebar_menu_typo_font_size.'; 
			letter-spacing:'.$sidebar_menu_typo_letter_spacing.'; 
			text-transform:'.$sidebar_menu_typo_text_transform.';';
			if (!empty($sidebar_menu_border_color)) {
				$dynamic_css .='border-bottom:1px solid '.$sidebar_menu_border_color.';';
			}
		$dynamic_css .='}';

		$dynamic_css .='.sidebar-menu .sub-menu > li > a {';
			if (!empty($sidebar_menu_border_color)) {
				$dynamic_css .='border-bottom:1px solid '.$sidebar_back.';';
			}
		$dynamic_css .='}';

		$dynamic_css .='.mobile-sidebar-nav-toggle {
			color:'.$sidebar_menu_color_reg.';
		}';

		if (!empty($sidebar_menu_border_color)) {
			$dynamic_css .='.sidebar-menu > ul > li:first-child > a {border-top:1px solid '.$sidebar_menu_border_color.';}';
		}

		$dynamic_css .='.sidebar-nav.one-page-sidebar .sidebar-menu ul > li:hover > a,
		.sidebar-nav.one-page-sidebar .sidebar-menu > ul > li.current-menu-item > a,
		.sidebar-nav.one-page-sidebar .sidebar-menu > ul > li.current-menu-parent > a,
		.sidebar-nav.one-page-sidebar .sidebar-menu > ul > li.current-menu-ancestor > a {
			color:'.$sidebar_menu_color_reg.';
		}';

		$dynamic_css .='.sidebar-menu ul > li:hover > a,
		.sidebar-menu > ul > li.current-menu-item > a,
		.sidebar-menu > ul > li.current-menu-parent > a,
		.sidebar-menu > ul > li.current-menu-ancestor > a {
			color:'.$sidebar_menu_color_hov.';
		}';

		$dynamic_css .='.sidebar-menu > ul > li.one-page-active > a {
			color:'.$sidebar_menu_color_hov.' !important;
		}';

		$dynamic_css .='.logo-sidebar {
			margin-top:'.$sidebar_logo_margin_top.' !important;
			margin-bottom:'.$sidebar_logo_margin_bottom.' !important;
		}';

		$dynamic_css .='.vertical-true nav.sidebar-menu {
			margin-top:'.$sidebar_menu_margin_top.' !important;
			margin-bottom:'.$sidebar_menu_margin_bottom.' !important;
		}';

		$dynamic_css .=' nav.sidebar-menu {
			padding-top:'.$sidebar_menu_margin_top.' !important;
			padding-bottom:'.$sidebar_menu_margin_bottom.' !important;
		}';

		$dynamic_css .='.sidebar-nav-bottom {
			padding-top:'.$sidebar_logo_margin_bottom.' !important;
		}';

	/* Footer menu
	---------------*/

		$footer_menu_color_reg      	 = (isset($GLOBALS['goodresto_enovathemes']['footer-menu-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['footer-menu-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['footer-menu-color']['regular'] : '#bebebf';
		$footer_menu_color_hov      	 = (isset($GLOBALS['goodresto_enovathemes']['footer-menu-color']['hover']) && !empty($GLOBALS['goodresto_enovathemes']['footer-menu-color']['hover'])) ? $GLOBALS['goodresto_enovathemes']['footer-menu-color']['hover'] : '#ffffff';
		$footer_menu_typo_font_family    = (isset($GLOBALS['goodresto_enovathemes']['footer-menu-typo']['font-family']) && !empty($GLOBALS['goodresto_enovathemes']['footer-menu-typo']['font-family'])) ? $GLOBALS['goodresto_enovathemes']['footer-menu-typo']['font-family'] : "'Cabin Condensed', sans-serif";    
		$footer_menu_typo_font_weight    = (isset($GLOBALS['goodresto_enovathemes']['footer-menu-typo']['font-weight']) && !empty($GLOBALS['goodresto_enovathemes']['footer-menu-typo']['font-weight'])) ? $GLOBALS['goodresto_enovathemes']['footer-menu-typo']['font-weight'] : '400';    
		$footer_menu_typo_font_size      = (isset($GLOBALS['goodresto_enovathemes']['footer-menu-typo']['font-size']) && !empty($GLOBALS['goodresto_enovathemes']['footer-menu-typo']['font-size'])) ? $GLOBALS['goodresto_enovathemes']['footer-menu-typo']['font-size'] : '12px';    
		$footer_menu_typo_text_transform = (isset($GLOBALS['goodresto_enovathemes']['footer-menu-typo']['text-transform']) && !empty($GLOBALS['goodresto_enovathemes']['footer-menu-typo']['text-transform'])) ? $GLOBALS['goodresto_enovathemes']['footer-menu-typo']['text-transform'] : 'uppercase';    
		$footer_menu_typo_letter_spacing = (isset($GLOBALS['goodresto_enovathemes']['footer-menu-typo']['letter-spacing']) && !empty($GLOBALS['goodresto_enovathemes']['footer-menu-typo']['letter-spacing'])) ? $GLOBALS['goodresto_enovathemes']['footer-menu-typo']['letter-spacing'] : '0px';    

		$dynamic_css .='.footer .et-footer-menu a {
			color:'.$footer_menu_color_reg.';
			font-weight:'.$footer_menu_typo_font_weight.';
			font-family:'.$footer_menu_typo_font_family.';
			font-size:'.$footer_menu_typo_font_size.';
			text-transform:'.$footer_menu_typo_text_transform.';
			letter-spacing:'.$footer_menu_typo_letter_spacing.';
		}';

		$dynamic_css .='.footer .et-footer-menu li:hover > a {
			color:'.$footer_menu_color_hov.';
		}';

	/* Minicart
	---------------*/

		$header_shop_cart_back_color  = (isset($GLOBALS['goodresto_enovathemes']['header-shop-cart-back-color']) && !empty($GLOBALS['goodresto_enovathemes']['header-shop-cart-back-color'])) ? $GLOBALS['goodresto_enovathemes']['header-shop-cart-back-color'] : "#212121";
		$header_shop_cart_text_color  = (isset($GLOBALS['goodresto_enovathemes']['header-shop-cart-text-color']) && !empty($GLOBALS['goodresto_enovathemes']['header-shop-cart-text-color'])) ? $GLOBALS['goodresto_enovathemes']['header-shop-cart-text-color'] : "#bdbdbd";
		$header_shop_cart_title_color = (isset($GLOBALS['goodresto_enovathemes']['header-shop-cart-title-color']) && !empty($GLOBALS['goodresto_enovathemes']['header-shop-cart-title-color'])) ? $GLOBALS['goodresto_enovathemes']['header-shop-cart-title-color'] : "#ffffff";

		$header_shop_cart_button_color_reg        = (isset($GLOBALS['goodresto_enovathemes']['header-shop-cart-button-color']['regular']) && $GLOBALS['goodresto_enovathemes']['header-shop-cart-button-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['header-shop-cart-button-color']['regular'] : "#9e9e9e";
		$header_shop_cart_button_color_hov        = (isset($GLOBALS['goodresto_enovathemes']['header-shop-cart-button-color']['hover']) && $GLOBALS['goodresto_enovathemes']['header-shop-cart-button-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['header-shop-cart-button-color']['hover'] : "#757575";
		$header_shop_cart_button_back_reg         = (isset($GLOBALS['goodresto_enovathemes']['header-shop-cart-button-back']['regular']) && $GLOBALS['goodresto_enovathemes']['header-shop-cart-button-back']['regular']) ? $GLOBALS['goodresto_enovathemes']['header-shop-cart-button-back']['regular'] : "#ffffff";
		$header_shop_cart_button_back_hov         = (isset($GLOBALS['goodresto_enovathemes']['header-shop-cart-button-back']['hover']) && $GLOBALS['goodresto_enovathemes']['header-shop-cart-button-back']['hover']) ? $GLOBALS['goodresto_enovathemes']['header-shop-cart-button-back']['hover'] : "#d3a471";
		$header_shop_cart_button_border_color_reg = (isset($GLOBALS['goodresto_enovathemes']['header-shop-cart-button-border-color']['regular']) && $GLOBALS['goodresto_enovathemes']['header-shop-cart-button-border-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['header-shop-cart-button-border-color']['regular'] : "";
		$header_shop_cart_button_border_color_hov = (isset($GLOBALS['goodresto_enovathemes']['header-shop-cart-button-border-color']['hover']) && $GLOBALS['goodresto_enovathemes']['header-shop-cart-button-border-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['header-shop-cart-button-border-color']['hover'] : "";

		$dynamic_css .='.woo-cart,
		.et-booking,
		.et-working-hours {
			background-color:'.$header_shop_cart_back_color.';';
		$dynamic_css .='}';

		$dynamic_css .='.woo-cart .widget_shopping_cart .cart-product-title a,
		.woo-cart .woocommerce-mini-cart__total{
			color: '.$header_shop_cart_title_color.';
		}';

		$dynamic_css .='.woo-cart .widget_shopping_cart .cart-product-title:hover > a {
			color:'.$main_color.' !important;
		}';

		$dynamic_css .='.woo-cart .widget_shopping_cart,
		.et-booking,
		.et-working-hours {
		    color: '.$header_shop_cart_text_color.';
		}';

		$dynamic_css .='.woocommerce-mini-cart__empty-message:before {
		    color: '.goodresto_enovathemes_hex_to_rgba($header_shop_cart_text_color,0.1).';
		}';

		$dynamic_css .='.woo-cart-toggle:before,
		.et-booking-toggle:before,
		.et-working-hours-toggle:before {
		    background-color: '.$header_shop_cart_text_color.';
		}';

		$dynamic_css .='.woo-cart .woocommerce-mini-cart__total:before,
		.woo-cart .widget_shopping_cart .product_list_widget > li:before {
		    background-color: '.goodresto_enovathemes_hex_to_rgba($header_shop_cart_text_color,0.2).';
		}';

		$dynamic_css .='.woo-cart .widget_shopping_cart .cart_list li .remove {
		    color: '.$header_shop_cart_title_color.';
		}';

		$dynamic_css .='.woo-cart .widget_shopping_cart .cart_list li .remove:hover {
		    color: '.$main_color.' !important;
		}';

		if ($header_shop_cart_button_back_reg == "transparent" || empty($header_shop_cart_button_back_reg)) {
			$dynamic_css .='et-booking-form .sending {
				background-color:'.$header_shop_cart_button_color_reg.';';
			$dynamic_css .='}';
		} else {
			$dynamic_css .='.et-booking-form .sending {
				background-color:'.$header_shop_cart_button_back_reg.';';
			$dynamic_css .='}';
		}

		if ($header_shop_cart_button_back_hov == "transparent" || empty($header_shop_cart_button_back_hov)) {
			$dynamic_css .='.et-booking-form .sending:hover {
				background-color:'.$header_shop_cart_button_color_hov.';';
			$dynamic_css .='}';
		} else {
			$dynamic_css .='.et-booking-form .sending:hover {
				background-color:'.$header_shop_cart_button_back_hov.';';
			$dynamic_css .='}';
		}

		$dynamic_css .='.woo-cart .woocommerce-mini-cart__buttons > a,
		.et-booking .et-booking-form-submit {
			color:'.$header_shop_cart_button_color_reg.' !important;
			background-color:'.$header_shop_cart_button_back_reg.';';
			if (!empty($header_shop_cart_button_border_width) && !empty($header_shop_cart_button_border_color_reg)) {
				$dynamic_css .='box-shadow:inset 0 0 0 '.$header_shop_cart_button_border_width.'px '.$header_shop_cart_button_border_color_reg.';';
			}
		$dynamic_css .='}';

		$dynamic_css .='.woo-cart .woocommerce-mini-cart__buttons > a:hover,
		.et-booking .et-booking-form-submit:hover {
			color:'.$header_shop_cart_button_color_hov.' !important;
			background-color:'.$header_shop_cart_button_back_hov.';';
			if (!empty($header_shop_cart_button_border_width) && !empty($header_shop_cart_button_border_color_hov)) {
				$dynamic_css .='box-shadow:inset 0 0 0 '.$header_shop_cart_button_border_width.'px '.$header_shop_cart_button_border_color_hov.';';
			}
		$dynamic_css .='}';

	/* Widgets
	---------------*/

		/* Footer
		---------------*/

			$footer_widgets_text_color     = (isset($GLOBALS['goodresto_enovathemes']['footer-widgets-text-color']) && $GLOBALS['goodresto_enovathemes']['footer-widgets-text-color']) ? $GLOBALS['goodresto_enovathemes']['footer-widgets-text-color'] : "#bdbdbd";
			$footer_widgets_title_color    = (isset($GLOBALS['goodresto_enovathemes']['footer-widgets-title-color']) && $GLOBALS['goodresto_enovathemes']['footer-widgets-title-color']) ? $GLOBALS['goodresto_enovathemes']['footer-widgets-title-color'] : "#ffffff";
			$footer_widgets_link_color_reg = (isset($GLOBALS['goodresto_enovathemes']['footer-widgets-link-color']['regular']) && $GLOBALS['goodresto_enovathemes']['footer-widgets-link-color']['regular']) ? $GLOBALS['goodresto_enovathemes']['footer-widgets-link-color']['regular'] : "#bdbdbd";
			$footer_widgets_link_color_hov = (isset($GLOBALS['goodresto_enovathemes']['footer-widgets-link-color']['hover']) && $GLOBALS['goodresto_enovathemes']['footer-widgets-link-color']['hover']) ? $GLOBALS['goodresto_enovathemes']['footer-widgets-link-color']['hover'] : "#ffffff";

			$dynamic_css .='.footer .widget {
				color:'.$footer_widgets_text_color.';
			}';

			$dynamic_css .='.footer .widget_title {
				color:'.$footer_widgets_title_color.';
			}';

			$dynamic_css .='.footer a,
			.mobile-footer-toggle {
				color:'.$footer_widgets_link_color_reg.';
			}';

			$dynamic_css .='.et-footer-menu li a:after {
				background-color:'.$footer_widgets_link_color_reg.';
			}';
			

			$dynamic_css .='.footer a:hover,
			.mobile-footer-toggle:hover,
			footer .widget_twitter p {
				color:'.$footer_widgets_link_color_hov.';
			}';

			$dynamic_css .='.footer .widget_twitter .tweet-time,
			.footer .widget_categories ul li a,
			.footer .widget_pages ul li a,
			.footer .widget_archive ul li a,
			.footer .widget_meta ul li a,
			.footer .widget_layered_nav ul li a,
			.footer .widget_nav_menu ul li a,
			.footer .widget_product_categories ul li a,
			.footer .widget_recent_entries ul li a, 
			.footer .widget_rss ul li a,
			.footer .widget_icl_lang_sel_widget li a,
			.footer .recentcomments a,
			.footer .widget_et_recent_entries .post-title a {
				color:'.$footer_widgets_text_color.' !important;
			}';

			$dynamic_css .='.footer .widget_twitter li:before,
			.footer .widget_recent_comments li:before,
			.footer .wp-caption-text, .footer .gallery-caption {
				color: '.$footer_widgets_text_color.';
			}';

			$dynamic_css .='.footer .widget_et_recent_entries .post-title:hover a,
			.footer .widget_et_recent_entries .post-date a:hover,
			.footer .widget_twitter .tweet-time:hover,
			.footer .widget_categories ul li a:hover,
			.footer .widget_pages ul li a:hover,
			.footer .widget_archive ul li a:hover,
			.footer .widget_meta ul li a:hover,
			.footer .widget_layered_nav ul li a:hover,
			.footer .widget_nav_menu ul li a:hover,
			.footer .widget_product_categories ul li a:hover,
			.footer .widget_recent_entries ul li a:hover, 
			.footer .widget_rss ul li a:hover,
			.footer .widget_icl_lang_sel_widget li a:hover,
			.footer .recentcomments a:hover,
			.footer .widget_et_recent_entries .post-title a:hover {
				color: '.$footer_widgets_link_color_hov.' !important;
			}';

			$dynamic_css .='.footer .widget_tag_cloud .tagcloud a,
			.footer .widget_product_tag_cloud .tagcloud a,
			.footer .event-tags a {
				color:'.$footer_widgets_link_color_reg.' !important;
			}';

			$dynamic_css .='.footer .widget_tag_cloud .tagcloud a:hover,
			.footer .widget_product_tag_cloud .tagcloud a:hover,
			.footer .event-tags a:hover {
				color:'.$footer_widgets_link_color_hov.' !important;
			}';

			$dynamic_css .='.footer .widget_tag_cloud .tagcloud a:after,
			.footer .widget_product_tag_cloud .tagcloud a:after,
			.footer .event-tags a:after {
				background-color:'.$footer_widgets_link_color_reg.' !important;
			}';

			$dynamic_css .='.footer .widget_tag_cloud .tagcloud a:hover:after,
			.footer .widget_product_tag_cloud .tagcloud a:hover:after,
			.footer .event-tags a:hover:after {
				background-color:'.$footer_widgets_link_color_hov.' !important;
			}';

			$dynamic_css .='.footer .widget_nav_menu ul li a.animate + ul li:before, 
			.footer .widget_product_categories ul li a.animate + ul li:before {
			    background-color: '.goodresto_enovathemes_hex_to_rgba($footer_widgets_text_color,0.5).';
			}';

			$dynamic_css .='.footer .widget_icl_lang_sel_widget li a,
			.footer .widget_calendar caption,
			.footer .widget_calendar th:first-child,
			.footer .widget_calendar th:last-child,
			.footer .widget_calendar td {
			    border-color: '.goodresto_enovathemes_hex_to_rgba($footer_widgets_text_color,0.5).';
			}';

			$dynamic_css .='.footer .mejs-container, 
			.footer .mejs-container,
			.footer .mejs-controls, 
			.footer .mejs-embed, 
			.footer .mejs-embed body {
				background: '.goodresto_enovathemes_hex_to_rgb_shade($footer_widgets_text_color,140).' !important;
			}';

			$dynamic_css .='.footer .widget_schedule ul li {
				color: '.$footer_widgets_text_color.';
			}';

			$dynamic_css .='.footer .widget_schedule ul li:nth-child(2n+1) {
				background: '.goodresto_enovathemes_hex_to_rgba($footer_widgets_text_color,0.1).' !important;
				color: '.$footer_widgets_text_color.';
			}';

			$dynamic_css .='.footer .image-preloader {
    			background: '.goodresto_enovathemes_hex_to_rgb_shade($footer_widgets_text_color,140).' !important;
			}';

			$dynamic_css .='.footer .image-preloader:before {
    			border-bottom: 2px solid '.goodresto_enovathemes_hex_to_rgb_shade($footer_widgets_text_color,70).';
    			border-left: 2px solid '.goodresto_enovathemes_hex_to_rgb_shade($footer_widgets_text_color,70).';
			}';

			$dynamic_css .='.footer .widget_fast_contact_widget .sending:before {
				border-top: 2px solid '.goodresto_enovathemes_hex_to_rgba($footer_widgets_text_color,0.1).';
				border-right: 2px solid '.goodresto_enovathemes_hex_to_rgba($footer_widgets_text_color,0.1).';
				border-bottom: 2px solid '.goodresto_enovathemes_hex_to_rgba($footer_widgets_text_color,0.1).';
				border-left: 2px solid '.goodresto_enovathemes_hex_to_rgba($footer_widgets_text_color,0.4).';
			}';

			/* Widget woocommerce
			---------------*/

				$dynamic_css .='.footer .widget_shopping_cart .cart-product-title > a,
				.footer .widget_shopping_cart .cart-product-title a .product-title,
				.footer .widget_products .product_list_widget > li > a .product-title, 
				.footer .widget_products .widget_recent_reviews .product_list_widget a, 
				.footer .widget_recently_viewed_products .product_list_widget > li a .product-title, 
				.footer .widget_recent_reviews .product_list_widget > li a .product-title, 
				.footer .widget_top_rated_products .product_list_widget > li a .product-title,
				.footer .widget_layered_nav ul li a,
				.footer .widget_layered_nav_filters li a,
				.footer .widget_shopping_cart .cart_list li .remove {
					color:'.$footer_widgets_text_color.' !important;
				}';

				$dynamic_css .='.footer .widget_shopping_cart .cart-product-title > a:hover,
				.footer .widget_shopping_cart .cart_list li .remove:hover .product-title,
				.footer .widget_products .product_list_widget > li > a:hover .product-title, 
				.footer .widget_recently_viewed_products .product_list_widget > li a:hover .product-title, 
				.footer .widget_recent_reviews .product_list_widget > li a:hover .product-title, 
				.footer .widget_top_rated_products .product_list_widget > li a:hover .product-title,
				.footer .widget_layered_nav_filters li:hover > a,
				.footer .widget_shopping_cart .cart_list li .remove:hover {
					color:'.$footer_widgets_link_color_hov.' !important;
				}';

				$dynamic_css .='.footer .widget_layered_nav li a {
                    color:'.$footer_widgets_text_color.' !important;
                }';

                $dynamic_css .='.footer .woocommerce-mini-cart__total:before {
                    background-color:'.goodresto_enovathemes_hex_to_rgba($footer_widgets_text_color,0.3).' !important;
                }';

                $dynamic_css .='.footer .widget_price_filter .price_slider_wrapper .ui-widget-content {
                    background-color:'.goodresto_enovathemes_hex_to_rgba($footer_widgets_text_color,0.1).' !important;
                }';

                $dynamic_css .='.footer .star-rating:before {
                    color:'.goodresto_enovathemes_hex_to_rgba($footer_widgets_text_color,0.3).' !important;
                }';

	/* Post
	---------------*/

		/* Post title section
		---------------*/

			$blog_title = "true";

		    if (isset($GLOBALS['goodresto_enovathemes']['blog-title']) && $GLOBALS['goodresto_enovathemes']['blog-title'] == 0) {
		        $blog_title = "false";
    		}
		    
    		if ($blog_title == "true") {

			    $blog_title_back_color          = (isset($GLOBALS['goodresto_enovathemes']['blog-title-back']['background-color']) && $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-color']) ? $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-color'] : '#f5f5f5';
			    $blog_title_back_img            = (isset($GLOBALS['goodresto_enovathemes']['blog-title-back']['background-image']) && $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-image']) ? $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-image'] : '';
			    $blog_title_back_img_repeat     = (isset($GLOBALS['goodresto_enovathemes']['blog-title-back']['background-repeat']) && $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-repeat']) ? $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-repeat'] : 'no-repeat';
			    $blog_title_back_img_position   = (isset($GLOBALS['goodresto_enovathemes']['blog-title-back']['background-position']) && $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-position']) ? $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-position'] : 'left top';
			    $blog_title_back_img_attachment = (isset($GLOBALS['goodresto_enovathemes']['blog-title-back']['background-attachment']) && $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-attachment']) ? $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-attachment'] : 'scroll';
			    $blog_title_back_img_size       = (isset($GLOBALS['goodresto_enovathemes']['blog-title-back']['background-size']) && $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-size']) ? $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-size'] : 'auto';

			    $blog_title_color               = (isset($GLOBALS['goodresto_enovathemes']['blog-title-color']['color']) && $GLOBALS['goodresto_enovathemes']['blog-title-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['blog-title-color']['color'],$GLOBALS['goodresto_enovathemes']['blog-title-color']['alpha']) : "#757575";
			    $blog_title_text_back_color     = (isset($GLOBALS['goodresto_enovathemes']['blog-title-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['blog-title-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['blog-title-back-color']['color'],$GLOBALS['goodresto_enovathemes']['blog-title-back-color']['alpha']) : "";
			    $blog_subtitle_color            = (isset($GLOBALS['goodresto_enovathemes']['blog-subtitle-color']['color']) && $GLOBALS['goodresto_enovathemes']['blog-subtitle-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['blog-subtitle-color']['color'],$GLOBALS['goodresto_enovathemes']['blog-subtitle-color']['alpha']) : "#9e9e9e";
			    $blog_subtitle_back_color       = (isset($GLOBALS['goodresto_enovathemes']['blog-subtitle-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['blog-subtitle-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['blog-subtitle-back-color']['color'],$GLOBALS['goodresto_enovathemes']['blog-subtitle-back-color']['alpha']) : "";
			    $blog_breadcrumbs_color           = (isset($GLOBALS['goodresto_enovathemes']['blog-breadcrumbs-color']['color']) && $GLOBALS['goodresto_enovathemes']['blog-breadcrumbs-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['blog-breadcrumbs-color']['color'],$GLOBALS['goodresto_enovathemes']['blog-breadcrumbs-color']['alpha']) : "#757575";
			    $blog_breadcrumbs_back_color      = (isset($GLOBALS['goodresto_enovathemes']['blog-breadcrumbs-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['blog-breadcrumbs-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['blog-breadcrumbs-back-color']['color'],$GLOBALS['goodresto_enovathemes']['blog-breadcrumbs-back-color']['alpha']) : "";
			    $blog_breadcrumbs_separator_color = (isset($GLOBALS['goodresto_enovathemes']['blog-breadcrumbs-separator-color']['color']) && $GLOBALS['goodresto_enovathemes']['blog-breadcrumbs-separator-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['blog-breadcrumbs-separator-color']['color'],$GLOBALS['goodresto_enovathemes']['blog-breadcrumbs-separator-color']['alpha']) : "#d3a471";

				$dynamic_css .='.blog-header, 
				.blog-header .parallax-container, 
				.blog-header .fixed-container {
					background-color: '.$blog_title_back_color.';';
					if(!empty($blog_title_back_img)){
						$dynamic_css .='background-image:url('.$blog_title_back_img.');
						background-repeat:'.$blog_title_back_img_repeat.';
						background-attachment: '.$blog_title_back_img_attachment.';
						-webkit-background-size: '.$blog_title_back_img_size.';
						-moz-background-size: '.$blog_title_back_img_size.';
						background-size: '.$blog_title_back_img_size.';
						background-position:'.$blog_title_back_img_position;
					}
				$dynamic_css .='}';

				$dynamic_css .='.blog-header h1 {
					color:'.$blog_title_color.';';
					if(!empty($blog_title_text_back_color)){
						$dynamic_css .='padding:8px 24px;';
						$dynamic_css .='background-color:'.$blog_title_text_back_color.';';
					}
				$dynamic_css .='}';

				$dynamic_css .='.blog-header p {
					color:'.$blog_subtitle_color.';';
					if(!empty($blog_subtitle_back_color)){
						$dynamic_css .='padding:8px 24px;';
						$dynamic_css .='background-color:'.$blog_subtitle_back_color.';';
					}
				$dynamic_css .='}';

				$dynamic_css .='.blog-header .et-breadcrumbs {
					color:'.$blog_breadcrumbs_color.';';
					if(!empty($blog_breadcrumbs_back_color)){
						$dynamic_css .='padding:8px 24px;';
						$dynamic_css .='background-color:'.$blog_breadcrumbs_back_color.';';
					}
				$dynamic_css .='}';

				$dynamic_css .='.blog-header .et-breadcrumbs a:after {
					background-color:'.$blog_breadcrumbs_color.';
				}';

				$dynamic_css .='.blog-header .et-breadcrumbs > *:before {
					color:'.$blog_breadcrumbs_separator_color.';
				}';

			}

		/* Post layout
		---------------*/

			$blog_padding_top    = (isset($GLOBALS['goodresto_enovathemes']['blog-padding']['padding-top'])) ? $GLOBALS['goodresto_enovathemes']['blog-padding']['padding-top'] : "120px";       
			$blog_padding_bottom = (isset($GLOBALS['goodresto_enovathemes']['blog-padding']['padding-bottom'])) ? $GLOBALS['goodresto_enovathemes']['blog-padding']['padding-bottom'] : "120px";       
			$blog_padding_left   = (isset($GLOBALS['goodresto_enovathemes']['blog-padding']['padding-left'])) ? $GLOBALS['goodresto_enovathemes']['blog-padding']['padding-left'] : "0px";       
			$blog_padding_right  = (isset($GLOBALS['goodresto_enovathemes']['blog-padding']['padding-right'])) ? $GLOBALS['goodresto_enovathemes']['blog-padding']['padding-right'] : "0px";       
			$blog_post_title_min_height  = (isset($GLOBALS['goodresto_enovathemes']['blog-post-title-min-height']) && !empty($GLOBALS['goodresto_enovathemes']['blog-post-title-min-height'])) ? $GLOBALS['goodresto_enovathemes']['blog-post-title-min-height'] : "0";       

			if (empty($blog_padding_top)) {$blog_padding_top = '0px';}
			if (empty($blog_padding_bottom)) {$blog_padding_bottom = '0px';}
			if (empty($blog_padding_left)) {$blog_padding_left = '0px';}
			if (empty($blog_padding_right)) {$blog_padding_right = '0px';}

			$dynamic_css .='.blog-layout,
			.blog-layout-single {
				padding-top:'.$blog_padding_top.';
				padding-bottom:'.$blog_padding_bottom.';
			}';

			$dynamic_css .='.tech-layout {
				padding-left:'.$blog_padding_left.';
				padding-right:'.$blog_padding_right.';
			}';

			$dynamic_css .='#loop-posts .post-title,
			.recent-posts .post-title {
				min-height:'.$blog_post_title_min_height.'px;
			}';

	/* Event
	---------------*/

		/* Event title section
		---------------*/

    		$event_title = (isset($GLOBALS['goodresto_enovathemes']['event-title']) && $GLOBALS['goodresto_enovathemes']['event-title'] == 1) ? "true" : "false";
		    
    		if ($event_title == "true") {

			    $event_title_back_color          = (isset($GLOBALS['goodresto_enovathemes']['event-title-back']['background-color']) && $GLOBALS['goodresto_enovathemes']['event-title-back']['background-color']) ? $GLOBALS['goodresto_enovathemes']['event-title-back']['background-color'] : '#f5f5f5';
			    $event_title_back_img            = (isset($GLOBALS['goodresto_enovathemes']['event-title-back']['background-image']) && $GLOBALS['goodresto_enovathemes']['event-title-back']['background-image']) ? $GLOBALS['goodresto_enovathemes']['event-title-back']['background-image'] : '';
			    $event_title_back_img_repeat     = (isset($GLOBALS['goodresto_enovathemes']['event-title-back']['background-repeat']) && $GLOBALS['goodresto_enovathemes']['event-title-back']['background-repeat']) ? $GLOBALS['goodresto_enovathemes']['event-title-back']['background-repeat'] : 'no-repeat';
			    $event_title_back_img_position   = (isset($GLOBALS['goodresto_enovathemes']['event-title-back']['background-position']) && $GLOBALS['goodresto_enovathemes']['event-title-back']['background-position']) ? $GLOBALS['goodresto_enovathemes']['event-title-back']['background-position'] : 'left top';
			    $event_title_back_img_attachment = (isset($GLOBALS['goodresto_enovathemes']['event-title-back']['background-attachment']) && $GLOBALS['goodresto_enovathemes']['event-title-back']['background-attachment']) ? $GLOBALS['goodresto_enovathemes']['event-title-back']['background-attachment'] : 'scroll';
			    $event_title_back_img_size       = (isset($GLOBALS['goodresto_enovathemes']['event-title-back']['background-size']) && $GLOBALS['goodresto_enovathemes']['event-title-back']['background-size']) ? $GLOBALS['goodresto_enovathemes']['event-title-back']['background-size'] : 'auto';

			    $event_title_color               = (isset($GLOBALS['goodresto_enovathemes']['event-title-color']['color']) && $GLOBALS['goodresto_enovathemes']['event-title-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['event-title-color']['color'],$GLOBALS['goodresto_enovathemes']['event-title-color']['alpha']) : "#757575";
			    $event_title_text_back_color     = (isset($GLOBALS['goodresto_enovathemes']['event-title-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['event-title-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['event-title-back-color']['color'],$GLOBALS['goodresto_enovathemes']['event-title-back-color']['alpha']) : "";
			    $event_subtitle_color            = (isset($GLOBALS['goodresto_enovathemes']['event-subtitle-color']['color']) && $GLOBALS['goodresto_enovathemes']['event-subtitle-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['event-subtitle-color']['color'],$GLOBALS['goodresto_enovathemes']['event-subtitle-color']['alpha']) : "#9e9e9e";
			    $event_subtitle_back_color       = (isset($GLOBALS['goodresto_enovathemes']['event-subtitle-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['event-subtitle-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['event-subtitle-back-color']['color'],$GLOBALS['goodresto_enovathemes']['event-subtitle-back-color']['alpha']) : "";
			    $event_breadcrumbs_color           = (isset($GLOBALS['goodresto_enovathemes']['event-breadcrumbs-color']['color']) && $GLOBALS['goodresto_enovathemes']['event-breadcrumbs-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['event-breadcrumbs-color']['color'],$GLOBALS['goodresto_enovathemes']['event-breadcrumbs-color']['alpha']) : "#757575";
			    $event_breadcrumbs_back_color      = (isset($GLOBALS['goodresto_enovathemes']['event-breadcrumbs-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['event-breadcrumbs-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['event-breadcrumbs-back-color']['color'],$GLOBALS['goodresto_enovathemes']['event-breadcrumbs-back-color']['alpha']) : "";
			    $event_breadcrumbs_separator_color = (isset($GLOBALS['goodresto_enovathemes']['event-breadcrumbs-separator-color']['color']) && $GLOBALS['goodresto_enovathemes']['event-breadcrumbs-separator-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['event-breadcrumbs-separator-color']['color'],$GLOBALS['goodresto_enovathemes']['event-breadcrumbs-separator-color']['alpha']) : "#d3a471";

				$dynamic_css .='.event-header, 
				.event-header .parallax-container, 
				.event-header .fixed-container {
					background-color: '.$event_title_back_color.';';
					if(!empty($event_title_back_img)){
						$dynamic_css .='background-image:url('.$event_title_back_img.');
						background-repeat:'.$event_title_back_img_repeat.';
						background-attachment: '.$event_title_back_img_attachment.';
						-webkit-background-size: '.$event_title_back_img_size.';
						-moz-background-size: '.$event_title_back_img_size.';
						background-size: '.$event_title_back_img_size.';
						background-position:'.$event_title_back_img_position;
					}
				$dynamic_css .='}';

				$dynamic_css .='.event-header h1 {
					color:'.$event_title_color.';';
					if(!empty($event_title_text_back_color)){
						$dynamic_css .='padding:8px 24px;';
						$dynamic_css .='background-color:'.$event_title_text_back_color.';';
					}
				$dynamic_css .='}';

				$dynamic_css .='.event-header p {
					color:'.$event_subtitle_color.';';
					if(!empty($event_subtitle_back_color)){
						$dynamic_css .='padding:8px 24px;';
						$dynamic_css .='background-color:'.$event_subtitle_back_color.';';
					}
				$dynamic_css .='}';

				$dynamic_css .='.event-header .et-breadcrumbs {
					color:'.$event_breadcrumbs_color.';';
					if(!empty($event_breadcrumbs_back_color)){
						$dynamic_css .='padding:8px 24px;';
						$dynamic_css .='background-color:'.$event_breadcrumbs_back_color.';';
					}
				$dynamic_css .='}';

				$dynamic_css .='.event-header .et-breadcrumbs a:after {
					background-color:'.$event_breadcrumbs_color.';
				}';

				$dynamic_css .='.event-header .et-breadcrumbs > *:before {
					color:'.$event_breadcrumbs_separator_color.';
				}';

			}

		/* Event layout
		---------------*/

			$event_padding_top    = (isset($GLOBALS['goodresto_enovathemes']['event-padding']['padding-top']) && !empty($GLOBALS['goodresto_enovathemes']['event-padding']['padding-top'])) ? $GLOBALS['goodresto_enovathemes']['event-padding']['padding-top'] : "0px";       
			$event_padding_bottom = (isset($GLOBALS['goodresto_enovathemes']['event-padding']['padding-bottom']) && !empty($GLOBALS['goodresto_enovathemes']['event-padding']['padding-bottom'])) ? $GLOBALS['goodresto_enovathemes']['event-padding']['padding-bottom'] : "0px";       
			$event_padding_left   = (isset($GLOBALS['goodresto_enovathemes']['event-padding']['padding-left']) && !empty($GLOBALS['goodresto_enovathemes']['event-padding']['padding-left'])) ? $GLOBALS['goodresto_enovathemes']['event-padding']['padding-left'] : "0px";       
			$event_padding_right  = (isset($GLOBALS['goodresto_enovathemes']['event-padding']['padding-right']) && !empty($GLOBALS['goodresto_enovathemes']['event-padding']['padding-right'])) ? $GLOBALS['goodresto_enovathemes']['event-padding']['padding-right'] : "0px";       

			$dynamic_css .='.event-layout {
				padding-top:'.$event_padding_top.';
				padding-bottom:'.$event_padding_bottom.';
				padding-left:'.$event_padding_left.';
				padding-right:'.$event_padding_right.';
			}';

			if (isset($GLOBALS['goodresto_enovathemes']['event-related-events']) && $GLOBALS['goodresto_enovathemes']['event-related-events'] == 1){
				$dynamic_css .='.event-layout-single {
					padding-top:'.$event_padding_top.';
					padding-bottom:0;
				}';
			} else {
				$dynamic_css .='.event-layout-single {
					padding-top:'.$event_padding_top.';
					padding-bottom:'.$event_padding_bottom.';
				}';
			}

			if (is_singular('event')) {

				$values 		  = get_post_custom( get_the_ID() );
				$gallery_gap      = isset( $values['gallery_gap'][0] ) ? esc_attr( $values["gallery_gap"][0] ) : "0";
				$gallery_columns  = isset( $values['gallery_columns'][0] ) ? esc_attr( $values["gallery_columns"][0] ) : "1";
    			$gallery_wide_active = isset( $values['gallery_wide_active'] ) ? esc_attr( $values["gallery_wide_active"][0] ) : "false";

    			
				$dynamic_css .='.event-gallery ul.grid,
				.event-gallery ul.masonry,
				.event-gallery ul.carousel {
					margin-right: -'.($gallery_gap/2).'px !important;
					margin-left: -'.($gallery_gap/2).'px !important;
				}';

				$dynamic_css .='.event-gallery ul.grid li,
				.event-gallery ul.masonry li {
					padding-right: '.($gallery_gap/2).'px !important;
					padding-left: '.($gallery_gap/2).'px !important;
					padding-bottom: '.$gallery_gap.'px !important;
				}';

				$dynamic_css .='.event-gallery ul.carousel li {
					padding-right: '.($gallery_gap/2).'px !important;
					padding-left: '.($gallery_gap/2).'px !important;';
				$dynamic_css .='}';

				if ($img_preloader == "true" && $gallery_gap == 0 && $gallery_columns != 1) {

					$img_preloader_color = "#e0e0e0";

					$child_number = '(2n+2)';

					if ($gallery_columns == 3 || $gallery_columns == 5) {
						$child_number = '(2n+1)';
					}

					$dynamic_css .='.event-gallery ul li:nth-child'.$child_number.' .image-preloader {
						background-color:'.goodresto_enovathemes_hex_to_rgb_shade($img_preloader_color,5).' !important;
					}';

					$dynamic_css .='.event-gallery ul li:nth-child'.$child_number.' .image-preloader:before {
						border-top: 2px solid '.goodresto_enovathemes_hex_to_rgb_shade($img_preloader_color,5).' !important;
						border-right: 2px solid '.goodresto_enovathemes_hex_to_rgb_shade($img_preloader_color,5).' !important;
					}';

					$dynamic_css .='.event-gallery ul.carousel .owl-stage .owl-item:nth-child(2n+2) .image-preloader {
						background-color:'.goodresto_enovathemes_hex_to_rgb_shade($img_preloader_color,5).' !important;
					}';

					$dynamic_css .='.event-gallery ul.carousel .owl-stage .owl-item:nth-child(2n+2) .image-preloader:before {
						border-top: 2px solid '.goodresto_enovathemes_hex_to_rgb_shade($img_preloader_color,5).' !important;
						border-right: 2px solid '.goodresto_enovathemes_hex_to_rgb_shade($img_preloader_color,5).' !important;
					}';

				}

			}

	/* Menu
	---------------*/

		/* Menu title section
		---------------*/

    		$menu_title = (isset($GLOBALS['goodresto_enovathemes']['menu-title']) && $GLOBALS['goodresto_enovathemes']['menu-title'] == 1) ? "true" : "false";
		    
    		if ($menu_title == "true") {

			    $menu_title_back_color          = (isset($GLOBALS['goodresto_enovathemes']['menu-title-back']['background-color']) && $GLOBALS['goodresto_enovathemes']['menu-title-back']['background-color']) ? $GLOBALS['goodresto_enovathemes']['menu-title-back']['background-color'] : '#f5f5f5';
			    $menu_title_back_img            = (isset($GLOBALS['goodresto_enovathemes']['menu-title-back']['background-image']) && $GLOBALS['goodresto_enovathemes']['menu-title-back']['background-image']) ? $GLOBALS['goodresto_enovathemes']['menu-title-back']['background-image'] : '';
			    $menu_title_back_img_repeat     = (isset($GLOBALS['goodresto_enovathemes']['menu-title-back']['background-repeat']) && $GLOBALS['goodresto_enovathemes']['menu-title-back']['background-repeat']) ? $GLOBALS['goodresto_enovathemes']['menu-title-back']['background-repeat'] : 'no-repeat';
			    $menu_title_back_img_position   = (isset($GLOBALS['goodresto_enovathemes']['menu-title-back']['background-position']) && $GLOBALS['goodresto_enovathemes']['menu-title-back']['background-position']) ? $GLOBALS['goodresto_enovathemes']['menu-title-back']['background-position'] : 'left top';
			    $menu_title_back_img_attachment = (isset($GLOBALS['goodresto_enovathemes']['menu-title-back']['background-attachment']) && $GLOBALS['goodresto_enovathemes']['menu-title-back']['background-attachment']) ? $GLOBALS['goodresto_enovathemes']['menu-title-back']['background-attachment'] : 'scroll';
			    $menu_title_back_img_size       = (isset($GLOBALS['goodresto_enovathemes']['menu-title-back']['background-size']) && $GLOBALS['goodresto_enovathemes']['menu-title-back']['background-size']) ? $GLOBALS['goodresto_enovathemes']['menu-title-back']['background-size'] : 'auto';

			    $menu_title_color               = (isset($GLOBALS['goodresto_enovathemes']['menu-title-color']['color']) && $GLOBALS['goodresto_enovathemes']['menu-title-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['menu-title-color']['color'],$GLOBALS['goodresto_enovathemes']['menu-title-color']['alpha']) : "#757575";
			    $menu_title_text_back_color     = (isset($GLOBALS['goodresto_enovathemes']['menu-title-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['menu-title-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['menu-title-back-color']['color'],$GLOBALS['goodresto_enovathemes']['menu-title-back-color']['alpha']) : "";
			    $menu_subtitle_color            = (isset($GLOBALS['goodresto_enovathemes']['menu-subtitle-color']['color']) && $GLOBALS['goodresto_enovathemes']['menu-subtitle-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['menu-subtitle-color']['color'],$GLOBALS['goodresto_enovathemes']['menu-subtitle-color']['alpha']) : "#9e9e9e";
			    $menu_subtitle_back_color       = (isset($GLOBALS['goodresto_enovathemes']['menu-subtitle-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['menu-subtitle-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['menu-subtitle-back-color']['color'],$GLOBALS['goodresto_enovathemes']['menu-subtitle-back-color']['alpha']) : "";
			    $menu_breadcrumbs_color           = (isset($GLOBALS['goodresto_enovathemes']['menu-breadcrumbs-color']['color']) && $GLOBALS['goodresto_enovathemes']['menu-breadcrumbs-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['menu-breadcrumbs-color']['color'],$GLOBALS['goodresto_enovathemes']['menu-breadcrumbs-color']['alpha']) : "#757575";
			    $menu_breadcrumbs_back_color      = (isset($GLOBALS['goodresto_enovathemes']['menu-breadcrumbs-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['menu-breadcrumbs-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['menu-breadcrumbs-back-color']['color'],$GLOBALS['goodresto_enovathemes']['menu-breadcrumbs-back-color']['alpha']) : "";
			    $menu_breadcrumbs_separator_color = (isset($GLOBALS['goodresto_enovathemes']['menu-breadcrumbs-separator-color']['color']) && $GLOBALS['goodresto_enovathemes']['menu-breadcrumbs-separator-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['menu-breadcrumbs-separator-color']['color'],$GLOBALS['goodresto_enovathemes']['menu-breadcrumbs-separator-color']['alpha']) : "#d3a471";

				$dynamic_css .='.menu-header, 
				.menu-header .parallax-container, 
				.menu-header .fixed-container {
					background-color: '.$menu_title_back_color.';';
					if(!empty($menu_title_back_img)){
						$dynamic_css .='background-image:url('.$menu_title_back_img.');
						background-repeat:'.$menu_title_back_img_repeat.';
						background-attachment: '.$menu_title_back_img_attachment.';
						-webkit-background-size: '.$menu_title_back_img_size.';
						-moz-background-size: '.$menu_title_back_img_size.';
						background-size: '.$menu_title_back_img_size.';
						background-position:'.$menu_title_back_img_position;
					}
				$dynamic_css .='}';

				$dynamic_css .='.menu-header h1 {
					color:'.$menu_title_color.';';
					if(!empty($menu_title_text_back_color)){
						$dynamic_css .='padding:8px 24px;';
						$dynamic_css .='background-color:'.$menu_title_text_back_color.';';
					}
				$dynamic_css .='}';

				$dynamic_css .='.menu-header p {
					color:'.$menu_subtitle_color.';';
					if(!empty($menu_subtitle_back_color)){
						$dynamic_css .='padding:8px 24px;';
						$dynamic_css .='background-color:'.$menu_subtitle_back_color.';';
					}
				$dynamic_css .='}';

				$dynamic_css .='.menu-header .et-breadcrumbs {
					color:'.$menu_breadcrumbs_color.';';
					if(!empty($menu_breadcrumbs_back_color)){
						$dynamic_css .='padding:8px 24px;';
						$dynamic_css .='background-color:'.$menu_breadcrumbs_back_color.';';
					}
				$dynamic_css .='}';

				$dynamic_css .='.menu-header .et-breadcrumbs a:after {
					background-color:'.$menu_breadcrumbs_color.';
				}';

				$dynamic_css .='.menu-header .et-breadcrumbs > *:before {
					color:'.$menu_breadcrumbs_separator_color.';
				}';

			}

		/* Menu layout
		---------------*/

			$menu_padding_top    = (isset($GLOBALS['goodresto_enovathemes']['menu-padding']['padding-top']) && !empty($GLOBALS['goodresto_enovathemes']['menu-padding']['padding-top'])) ? $GLOBALS['goodresto_enovathemes']['menu-padding']['padding-top'] : "0px";       
			$menu_padding_bottom = (isset($GLOBALS['goodresto_enovathemes']['menu-padding']['padding-bottom']) && !empty($GLOBALS['goodresto_enovathemes']['menu-padding']['padding-bottom'])) ? $GLOBALS['goodresto_enovathemes']['menu-padding']['padding-bottom'] : "0px";       
			$menu_padding_left   = (isset($GLOBALS['goodresto_enovathemes']['menu-padding']['padding-left']) && !empty($GLOBALS['goodresto_enovathemes']['menu-padding']['padding-left'])) ? $GLOBALS['goodresto_enovathemes']['menu-padding']['padding-left'] : "0px";       
			$menu_padding_right  = (isset($GLOBALS['goodresto_enovathemes']['menu-padding']['padding-right']) && !empty($GLOBALS['goodresto_enovathemes']['menu-padding']['padding-right'])) ? $GLOBALS['goodresto_enovathemes']['menu-padding']['padding-right'] : "0px";       

			$menu_item_body_min_height  = (isset($GLOBALS['goodresto_enovathemes']['menu-item-body-min-height']) && !empty($GLOBALS['goodresto_enovathemes']['menu-item-body-min-height'])) ? $GLOBALS['goodresto_enovathemes']['menu-item-body-min-height'] : "0";       

			$dynamic_css .='.menu-layout {
				padding-top:'.$menu_padding_top.';
				padding-bottom:'.$menu_padding_bottom.';
				padding-left:'.$menu_padding_left.';
				padding-right:'.$menu_padding_right.';
			}';

			$dynamic_css .='.menu-layout.grid #loop-menu .menu .post-body {
				min-height:'.$menu_item_body_min_height.'px;
			}';

	/* Product
	---------------*/

		/* Product title section
		---------------*/

    		$product_title = (isset($GLOBALS['goodresto_enovathemes']['product-title']) && $GLOBALS['goodresto_enovathemes']['product-title'] == 1) ? "true" : "false";
		    
    		if ($product_title == "true") {

			    $product_title_back_color          = (isset($GLOBALS['goodresto_enovathemes']['product-title-back']['background-color']) && $GLOBALS['goodresto_enovathemes']['product-title-back']['background-color']) ? $GLOBALS['goodresto_enovathemes']['product-title-back']['background-color'] : '#f5f5f5';
			    $product_title_back_img            = (isset($GLOBALS['goodresto_enovathemes']['product-title-back']['background-image']) && $GLOBALS['goodresto_enovathemes']['product-title-back']['background-image']) ? $GLOBALS['goodresto_enovathemes']['product-title-back']['background-image'] : '';
			    $product_title_back_img_repeat     = (isset($GLOBALS['goodresto_enovathemes']['product-title-back']['background-repeat']) && $GLOBALS['goodresto_enovathemes']['product-title-back']['background-repeat']) ? $GLOBALS['goodresto_enovathemes']['product-title-back']['background-repeat'] : 'no-repeat';
			    $product_title_back_img_position   = (isset($GLOBALS['goodresto_enovathemes']['product-title-back']['background-position']) && $GLOBALS['goodresto_enovathemes']['product-title-back']['background-position']) ? $GLOBALS['goodresto_enovathemes']['product-title-back']['background-position'] : 'left top';
			    $product_title_back_img_attachment = (isset($GLOBALS['goodresto_enovathemes']['product-title-back']['background-attachment']) && $GLOBALS['goodresto_enovathemes']['product-title-back']['background-attachment']) ? $GLOBALS['goodresto_enovathemes']['product-title-back']['background-attachment'] : 'scroll';
			    $product_title_back_img_size       = (isset($GLOBALS['goodresto_enovathemes']['product-title-back']['background-size']) && $GLOBALS['goodresto_enovathemes']['product-title-back']['background-size']) ? $GLOBALS['goodresto_enovathemes']['product-title-back']['background-size'] : 'auto';

			    $product_title_color                 = (isset($GLOBALS['goodresto_enovathemes']['product-title-color']['color']) && $GLOBALS['goodresto_enovathemes']['product-title-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['product-title-color']['color'],$GLOBALS['goodresto_enovathemes']['product-title-color']['alpha']) : "#757575";
			    $product_title_text_back_color       = (isset($GLOBALS['goodresto_enovathemes']['product-title-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['product-title-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['product-title-back-color']['color'],$GLOBALS['goodresto_enovathemes']['product-title-back-color']['alpha']) : "";
			    $product_subtitle_color              = (isset($GLOBALS['goodresto_enovathemes']['product-subtitle-color']['color']) && $GLOBALS['goodresto_enovathemes']['product-subtitle-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['product-subtitle-color']['color'],$GLOBALS['goodresto_enovathemes']['product-subtitle-color']['alpha']) : "#9e9e9e";
			    $product_subtitle_back_color         = (isset($GLOBALS['goodresto_enovathemes']['product-subtitle-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['product-subtitle-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['product-subtitle-back-color']['color'],$GLOBALS['goodresto_enovathemes']['product-subtitle-back-color']['alpha']) : "";
			    $product_breadcrumbs_color           = (isset($GLOBALS['goodresto_enovathemes']['product-breadcrumbs-color']['color']) && $GLOBALS['goodresto_enovathemes']['product-breadcrumbs-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['product-breadcrumbs-color']['color'],$GLOBALS['goodresto_enovathemes']['product-breadcrumbs-color']['alpha']) : "#757575";
			    $product_breadcrumbs_back_color      = (isset($GLOBALS['goodresto_enovathemes']['product-breadcrumbs-back-color']['color']) && $GLOBALS['goodresto_enovathemes']['product-breadcrumbs-back-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['product-breadcrumbs-back-color']['color'],$GLOBALS['goodresto_enovathemes']['product-breadcrumbs-back-color']['alpha']) : "";
			    $product_breadcrumbs_separator_color = (isset($GLOBALS['goodresto_enovathemes']['product-breadcrumbs-separator-color']['color']) && $GLOBALS['goodresto_enovathemes']['product-breadcrumbs-separator-color']['color']) ? goodresto_enovathemes_hex_to_rgba($GLOBALS['goodresto_enovathemes']['product-breadcrumbs-separator-color']['color'],$GLOBALS['goodresto_enovathemes']['product-breadcrumbs-separator-color']['alpha']) : "#d3a471";

				$dynamic_css .='.product-header, 
				.product-header .parallax-container, 
				.product-header .fixed-container {
					background-color: '.$product_title_back_color.';';
					if(!empty($product_title_back_img)){
						$dynamic_css .='background-image:url('.$product_title_back_img.');
						background-repeat:'.$product_title_back_img_repeat.';
						background-attachment: '.$product_title_back_img_attachment.';
						-webkit-background-size: '.$product_title_back_img_size.';
						-moz-background-size: '.$product_title_back_img_size.';
						background-size: '.$product_title_back_img_size.';
						background-position:'.$product_title_back_img_position;
					}
				$dynamic_css .='}';

				$dynamic_css .='.product-header h1 {
					color:'.$product_title_color.';';
					if(!empty($product_title_text_back_color)){
						$dynamic_css .='padding:8px 24px;';
						$dynamic_css .='background-color:'.$product_title_text_back_color.';';
					}
				$dynamic_css .='}';

				$dynamic_css .='.product-header p {
					color:'.$product_subtitle_color.';';
					if(!empty($product_subtitle_back_color)){
						$dynamic_css .='padding:8px 24px;';
						$dynamic_css .='background-color:'.$product_subtitle_back_color.';';
					}
				$dynamic_css .='}';

				$dynamic_css .='.product-header .et-breadcrumbs {
					color:'.$product_breadcrumbs_color.';';
					if(!empty($product_breadcrumbs_back_color)){
						$dynamic_css .='padding:8px 24px;';
						$dynamic_css .='background-color:'.$product_breadcrumbs_back_color.';';
					}
				$dynamic_css .='}';

				$dynamic_css .='.product-header .et-breadcrumbs a:after {
					background-color:'.$product_breadcrumbs_color.';
				}';

				$dynamic_css .='.product-header .et-breadcrumbs > *:before {
					color:'.$product_breadcrumbs_separator_color.';
				}';

			}

		/* Product layout
		---------------*/

			$product_padding_top    = (isset($GLOBALS['goodresto_enovathemes']['product-padding']['padding-top'])) ? $GLOBALS['goodresto_enovathemes']['product-padding']['padding-top'] : "120px";       
			$product_padding_bottom = (isset($GLOBALS['goodresto_enovathemes']['product-padding']['padding-bottom'])) ? $GLOBALS['goodresto_enovathemes']['product-padding']['padding-bottom'] : "120px";       
			$product_padding_left   = (isset($GLOBALS['goodresto_enovathemes']['product-padding']['padding-left']))  ? $GLOBALS['goodresto_enovathemes']['product-padding']['padding-left'] : "0px";       
			$product_padding_right  = (isset($GLOBALS['goodresto_enovathemes']['product-padding']['padding-right'])) ? $GLOBALS['goodresto_enovathemes']['product-padding']['padding-right'] : "0px";       

			if (empty($product_padding_top)) {$product_padding_top = '0px';}
			if (empty($product_padding_bottom)) {$product_padding_bottom = '0px';}
			if (empty($product_padding_left)) {$product_padding_left = '0px';}
			if (empty($product_padding_right)) {$product_padding_right = '0px';}

			$dynamic_css .='.product-layout {
				padding-top:'.$product_padding_top.';
				padding-bottom:'.$product_padding_bottom.';
				padding-left:'.$product_padding_left.';
				padding-right:'.$product_padding_right.';
			}';
			
			$dynamic_css .='.product-layout-single {
				padding-top:'.$product_padding_top.';
				padding-bottom:'.$product_padding_bottom.';
			}';

		/* Product quick view
		---------------*/

			$product_quick_modal_width  = (isset($GLOBALS['goodresto_enovathemes']['product-quick-modal-width']) && !empty($GLOBALS['goodresto_enovathemes']['product-quick-modal-width'])) ? $GLOBALS['goodresto_enovathemes']['product-quick-modal-width'] : "1176";
			$product_quick_modal_height = (isset($GLOBALS['goodresto_enovathemes']['product-quick-modal-height']) && !empty($GLOBALS['goodresto_enovathemes']['product-quick-modal-height'])) ? $GLOBALS['goodresto_enovathemes']['product-quick-modal-height'] : "588";

	/* Search/404
	---------------*/

		$tech_title = "true";

		if(isset($GLOBALS['goodresto_enovathemes']['tech-title']) && $GLOBALS['goodresto_enovathemes']['tech-title'] == 0){
			$tech_title = "false";
		}
	    
		if ($tech_title == "true") {
		    
			$dynamic_css .='.tech-header, 
			.tech-header .parallax-container, 
			.tech-header .fixed-container {
				background-color: '.$blog_title_back_color.';';
				if(!empty($blog_title_back_img)){
					$dynamic_css .='background-image:url('.$blog_title_back_img.');
					background-repeat:'.$blog_title_back_img_repeat.';
					background-attachment: '.$blog_title_back_img_attachment.';
					-webkit-background-size: '.$blog_title_back_img_size.';
					-moz-background-size: '.$blog_title_back_img_size.';
					background-size: '.$blog_title_back_img_size.';
					background-position:'.$blog_title_back_img_position;
				}
			$dynamic_css .='}';

			$dynamic_css .='.tech-header h1 {
				color:'.$blog_title_color.';';
				if(!empty($blog_title_text_back_color)){
					$dynamic_css .='padding:8px 24px;';
					$dynamic_css .='background-color:'.$blog_title_text_back_color.';';
				}
			$dynamic_css .='}';

			$dynamic_css .='.tech-header p {
				color:'.$blog_subtitle_color.';';
				if(!empty($blog_subtitle_back_color)){
					$dynamic_css .='padding:8px 24px;';
					$dynamic_css .='background-color:'.$blog_subtitle_back_color.';';
				}
			$dynamic_css .='}';

			$dynamic_css .='.tech-header .et-breadcrumbs {
				color:'.$blog_breadcrumbs_color.';';
				if(!empty($blog_breadcrumbs_back_color)){
					$dynamic_css .='padding:8px 24x;';
					$dynamic_css .='background-color:'.$blog_breadcrumbs_back_color.';';
				}
			$dynamic_css .='}';

			$dynamic_css .='.tech-header .et-breadcrumbs a:after {
					background-color:'.$blog_breadcrumbs_color.';
				}';

			$dynamic_css .='.tech-header .et-breadcrumbs > *:before {
				color:'.$blog_breadcrumbs_separator_color.';
			}';

		}

		$dynamic_css .='.tech-layout {
			padding-top:'.$blog_padding_top.';
			padding-bottom:'.$blog_padding_bottom.';
		}';

	/* Responsive
	---------------*/

		$dynamic_css .='@media only screen and (min-width: 320px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-min-320']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-min-320'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-min-320'];
			}

			

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (max-width: 320px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-max-320']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-max-320'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-max-320'];
			}

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (max-width: 479px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-max-479']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-max-479'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-max-479'];
			}

			$dynamic_css .='.list #loop-posts .post .post-title,
			.list .recent-posts .post .post-title,
			.post-title-section .post-title {
				font-size: '.$et_h4_font_size.'; line-height: '.$et_h4_line_height.';
			}';

			$dynamic_css .='#loop-event .event .post-title {
				font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';
			}';

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (min-width: 480px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-min-480']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-min-480'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-min-480'];
			}

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (min-width: 480px) and (max-width: 767px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-min-480-max-767']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-min-480-max-767'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-min-480-max-767'];
			}

			$dynamic_css .='.list #loop-posts .post .post-title,
			.list .recent-posts .post .post-title,
			.full #loop-posts .post .post-title {
				font-size: '.$et_h3_font_size.'; line-height: '.$et_h3_line_height.';
			}';

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (max-width: 639px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-max-639']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-max-639'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-max-639'];
			}

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (min-width: 640px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-min-640']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-min-640'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-min-640'];
			}

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (min-width: 640px) and (max-width: 767px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-min-640-max-767']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-min-640-max-767'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-min-640-max-767'];
			}

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (max-width: 767px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-max-767']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-max-767'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-max-767'];
			}

		$dynamic_css .='}';


		$dynamic_css .='@media only screen and (min-width: 768px) and (max-width: 1023px)  {';

			$dynamic_css .='.post-size-medium.grid #loop-posts .post .post-title,
			.post-size-medium.masonry1 #loop-posts .post .post-title,
			.masonry2.post-size-medium #loop-posts .post .post-title,
			.post-size-medium.grid .recent-posts .post .post-title,
			.post-size-medium.masonry1 .recent-posts .post .post-title,
			.masonry2.post-size-medium .recent-posts .post .post-title {
				font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';
			}';

			$dynamic_css .='.post-size-medium #loop-event .event .post-title {
				font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';
			}';

			$dynamic_css .='.pricing-title {
				font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';
			}';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-min-768-max-1023']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-min-768-max-1023'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-min-768-max-1023'];
			}

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (min-width: 768px) {';

			$dynamic_css .='.list #loop-posts .post .post-title,
			.list .recent-posts .post .post-title,
			.full #loop-posts .post .post-title {
				font-size: '.$et_h2_font_size.'; line-height: '.$et_h2_line_height.';
			}';

			if (is_rtl()) {

				$dynamic_css .='.et-mailchimp input[type="text"] {
		    		border-bottom-left-radius: 0 !important;
		    		border-top-left-radius: 0 !important;
		    	}';

		    	$dynamic_css .='.et-mailchimp button#mc-embedded-subscribe {
		    		border-bottom-right-radius: 0 !important;
		    		border-top-right-radius: 0 !important;
		    	}';

			} else {

				$dynamic_css .='.et-mailchimp input[type="text"] {
		    		border-bottom-right-radius: 0 !important;
		    		border-top-right-radius: 0 !important;
		    	}';

		    	$dynamic_css .='.et-mailchimp button#mc-embedded-subscribe {
		    		border-bottom-left-radius: 0 !important;
		    		border-top-left-radius: 0 !important;
		    	}';

			}

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-min-768']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-min-768'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-min-768'];
			}

			$dynamic_css .='#wrap.active {
				-webkit-transform: translate3d(-'.$sidebar_width.'px, 0, 0) !important;
    			transform: translate3d(-'.$sidebar_width.'px, 0, 0) !important;
			}';

			$dynamic_css .='#wrap.active[data-sidebar-pos="right"] {
				-webkit-transform: translate3d('.$sidebar_width.'px, 0, 0) !important;
    			transform: translate3d('.$sidebar_width.'px, 0, 0) !important;
			}';

			$dynamic_css .='.site-sidebar {
				width:'.$sidebar_width.'px !important;
			}';

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (max-width: 1023px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-max-1023']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-max-1023'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-max-1023'];
			}

			$dynamic_css .='.rich-header, 
			.rich-header .parallax-container, 
			.rich-header .fixed-container {
				height: '.$mob_page_title_height.'px;
			}';

			$dynamic_css .='.rich-header h1 {
				font-weight:'.$mob_page_title_typo_font_weight.'; 
				font-size:'.$mob_page_title_typo_font_size.'; 
				letter-spacing:'.$mob_page_title_typo_letter_spacing.'; 
				line-height:'.$mob_page_title_typo_line_height.'; 
				text-transform:'.$mob_page_title_typo_text_transform.';';
			$dynamic_css .='}';

			$dynamic_css .='.rich-header p {
				font-weight:'.$mob_page_subtitle_typo_font_weight.'; 
				font-size:'.$mob_page_subtitle_typo_font_size.'; 
				letter-spacing:'.$mob_page_subtitle_typo_letter_spacing.'; 
				text-transform:'.$mob_page_subtitle_typo_text_transform.';';
			$dynamic_css .='}';
			
			$dynamic_css .='.rich-header .et-breadcrumbs {
				font-weight:'.$mob_page_breadcrumbs_typo_font_weight.'; 
				font-size:'.$mob_page_breadcrumbs_typo_font_size.'; 
				letter-spacing:'.$mob_page_breadcrumbs_typo_letter_spacing.'; 
				text-transform:'.$mob_page_breadcrumbs_typo_text_transform.';';
			$dynamic_css .='}';

			$dynamic_css .='body.layout-frame {
				padding:'.$frame_width_mob.'px;
			}';

			$dynamic_css .='.layout-frame .site-sidebar {
			    right: '.$frame_width_mob.'px;
			    top: '.$frame_width_mob.'px;
			    height: calc( 100% - '.($frame_width_mob*2).'px );
			}';

			$dynamic_css .='.layout-frame.sidebar-align-left .site-sidebar {
				right:auto !important;
			    left: '.$frame_width_mob.'px;
			    top: '.$frame_width_mob.'px;
			    height: calc( 100% - '.($frame_width_mob*2).'px );
			}';

			$dynamic_css .='.body-borders > .top-border,
				.body-borders > .bottom-border {
				height:'.$frame_width_mob.'px;
			}';

			$dynamic_css .='.body-borders > .left-border,
				.body-borders > .right-border {
				width:'.$frame_width_mob.'px;
			}';

			$dynamic_css .='.body-borders .left-border:before,
			.body-borders .left-border:after,
			.body-borders .right-border:before,
			.body-borders > .bottom-border:before {
				width:'.($frame_width_mob*2).'px;
				height: '.$frame_width_mob.'px;
			}';

			$dynamic_css .='.body-borders > .bottom-border:before {
				width: '.$frame_width_mob.'px;
				height: '.($frame_width_mob*2).'px;
			}';

			if ($event_padding_left != '0px' && $event_padding_right != '0px') {
				$event_padding_left = '16px';
				$event_padding_right = '16px';
			}

			$dynamic_css .='.event-layout {
				padding-left:'.$event_padding_left.';
				padding-right:'.$event_padding_right.';
			}';

			if ($menu_padding_left != '0px' && $menu_padding_right != '0px') {
				$menu_padding_left = '16px';
				$menu_padding_right = '16px';
			}

			$dynamic_css .='.menu-layout {
				padding-left:'.$menu_padding_left.';
				padding-right:'.$menu_padding_right.';
			}';

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (min-width: 1024px) {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-min-1024']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-min-1024'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-min-1024'];
			}

			$dynamic_css .='.post-size-small.grid #loop-posts .post .post-title,
			.post-size-small.masonry1 #loop-posts .post .post-title,
			.post-size-small.grid .recent-posts .post .post-title,
			.post-size-small.masonry1 .recent-posts .post .post-title {
				font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';
			}';

			$dynamic_css .='.post-size-small #loop-event .event .post-title {
				font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';
			}';

			$dynamic_css .='.post-size-small.grid .blog-content #loop-posts .post .post-title,
			.post-size-small.masonry1 .blog-content #loop-posts .post .post-title {
				font-size: '.$et_h4_font_size.'; line-height: '.$et_h4_line_height.';
			}';

			$dynamic_css .='.et-pricing[data-columns="4"] .pricing-title,
			.et-pricing[data-columns="5"] .pricing-title {
				font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';
			}';

			$dynamic_css .='.post-title-section .post-title,
			.full #loop-posts .post .post-title {
				font-size: '.$et_h1_font_size.'; line-height: '.$et_h1_line_height.';
			}';

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (min-width: 1024px) and (max-width: 1279px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-min-1024-max-1279']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-min-1024-max-1279'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-min-1024-max-1279'];
			}

			$dynamic_css .='.masonry2.post-size-small:not(.menu-layout) .loop-posts .post .post-title {
				font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';
			}';

			$dynamic_css .='.post-size-medium.grid .blog-content #loop-posts .post .post-title,
			.post-size-medium.masonry1 .blog-content #loop-posts .post .post-title {
				font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';
			}';

			if ($product_quick_modal_width > 960) {

				$ratio                           = round($product_quick_modal_height/$product_quick_modal_width,2);
				$product_quick_modal_width_1024  = ($product_quick_modal_width - ($product_quick_modal_width - 960));
				$product_quick_modal_height_1024 = round($product_quick_modal_width_1024*$ratio,0);

				$dynamic_css .='#yith-quick-view-modal .yith-wcqv-wrapper {
					width:'.$product_quick_modal_width_1024.'px !important;
					height:'.$product_quick_modal_height_1024.'px !important;
					margin-left:-'.($product_quick_modal_width_1024/2).'px !important;
					margin-top:-'.($product_quick_modal_height_1024/2).'px !important;
				}';

				$dynamic_css .='#yith-quick-view-content .summary {
					height:'.$product_quick_modal_height_1024.'px !important;
				}';
			}

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (max-width: 1279px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-max-1279']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-max-1279'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-max-1279'];
			}

			$et_mob_header_transparent   = (isset($GLOBALS['goodresto_enovathemes']['mob-header-transparent']) && $GLOBALS['goodresto_enovathemes']['mob-header-transparent'] == 1) ? "true" : "false";
			$et_mob_page_title_height    = (isset($GLOBALS['goodresto_enovathemes']['mob-page-title-height']) && $GLOBALS['goodresto_enovathemes']['mob-page-title-height']) ? $GLOBALS['goodresto_enovathemes']['mob-page-title-height'] : '160';
			$et_mob_header_height        = (isset($GLOBALS['goodresto_enovathemes']['mob-header-height']) && !empty($GLOBALS['goodresto_enovathemes']['mob-header-height'])) ? $GLOBALS['goodresto_enovathemes']['mob-header-height'] : "80";

			$mob_page_title_height    = ($et_mob_page_title_height + $et_mob_header_height);
			$mob_padding_top          = $et_mob_header_height;

			if ($et_mob_header_transparent == "true") {
				$dynamic_css .='.rich-header {
					padding-top: '.$mob_padding_top.'px;
				}';
			}


		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (min-width: 1280px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-min-1280']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-min-1280'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-min-1280'];
			}

			$dynamic_css .='.blog-layout {
				padding-left:'.$blog_padding_left.';
				padding-right:'.$blog_padding_right.';
			}';

			if ($layout == "frame") {
				$dynamic_css .='#to-top {
					right: '.(30 + $frame_width).'px !important;
					bottom: '.(30 + $frame_width).'px !important;
				}';
			}

			if (is_singular('event')) {

				$values 		  = get_post_custom( get_the_ID() );
				$gallery_gap      = isset( $values['gallery_gap'][0] ) ? esc_attr( $values["gallery_gap"][0] ) : "0";
    			$gallery_wide_active = isset( $values['gallery_wide_active'] ) ? esc_attr( $values["gallery_wide_active"][0] ) : "false";

    			if ($gallery_wide_active == "true") {
    				$dynamic_css .='.event-gallery ul.grid,
					.event-gallery ul.masonry,
					.event-gallery ul.carousel {
						margin-right: '.($gallery_gap/2).'px !important;
						margin-left: '.($gallery_gap/2).'px !important;
					}';
    			} else {
    				$dynamic_css .='.event-gallery ul.grid,
					.event-gallery ul.masonry,
					.event-gallery ul.carousel {
						margin-right: -'.($gallery_gap/2).'px !important;
						margin-left: -'.($gallery_gap/2).'px !important;
					}';
    			}

			}

			$et_sticky_header         = (isset($GLOBALS['goodresto_enovathemes']['sticky-header']) && $GLOBALS['goodresto_enovathemes']['sticky-header'] == 1) ? "true" : "false";
			$et_transparent_header    = (isset($GLOBALS['goodresto_enovathemes']['transparent-header']) && $GLOBALS['goodresto_enovathemes']['transparent-header'] == 1) ? "true" : "false";
			$et_boxed_header          = (isset($GLOBALS['goodresto_enovathemes']['boxed-header']) && $GLOBALS['goodresto_enovathemes']['boxed-header'] == 1) ? "true" : "false";
			$et_menu_under_logo       = (isset($GLOBALS['goodresto_enovathemes']['menu-under-logo']) && $GLOBALS['goodresto_enovathemes']['menu-under-logo'] == 1) ? "true" : "false";
			$et_menu_under_logo_boxed = (isset($GLOBALS['goodresto_enovathemes']['menu-under-logo-boxed']) && $GLOBALS['goodresto_enovathemes']['menu-under-logo-boxed'] == 1) ? "true" : "false";
			$et_header_under_slider   = (isset($GLOBALS['goodresto_enovathemes']['header-under-slider']) && $GLOBALS['goodresto_enovathemes']['header-under-slider'] == 1) ? "true" : "false";
			$et_header_top            = (isset($GLOBALS['goodresto_enovathemes']['header-top']) && $GLOBALS['goodresto_enovathemes']['header-top'] == 1) ? "true" : "false";
			$et_fullscreen_navigation = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-navigation']) && $GLOBALS['goodresto_enovathemes']['fullscreen-navigation'] == 1) ? "true" : "false";
	    	$et_fullscreen_transparent = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-transparent']) && $GLOBALS['goodresto_enovathemes']['fullscreen-transparent'] == 1) ? "true" : "false";

			$page_title_height    = (isset($GLOBALS['goodresto_enovathemes']['page-title-height']) && $GLOBALS['goodresto_enovathemes']['page-title-height']) ? $GLOBALS['goodresto_enovathemes']['page-title-height'] : '100';

			if ($et_fullscreen_navigation == "true") {
				$dynamic_css .='.fullscreen-bar.sticky-true.transparent-false + .page-content-wrap {
					padding-top: '.$fullscreen_height.'px;
				}';

				$dynamic_css .='.fullscreen-bar.sticky-true.transparent-false.active + .page-content-wrap {
					padding-top: '.$fullscreen_sticky_height.'px;
				}';

				if ($et_fullscreen_transparent == "true") {

					$page_title_height    = $page_title_height + $fullscreen_height;
					$padding_top          = $fullscreen_height;

					$dynamic_css .='.rich-header, 
					.rich-header .parallax-container, 
					.rich-header .fixed-container {
						height: '.$page_title_height.'px;
					}';

					$dynamic_css .='.rich-header {
						padding-top: '.$padding_top.'px;
					}';
				}
				
			} else {

				if ($et_sticky_header == "true") {

					$dynamic_css .='.top-true.sticky-true.active {
						-ms-transform:translateY(-'.$header_top_height.'px);
						transform:translateY(-'.$header_top_height.'px);
					}';

					$dynamic_css .='.desk.sticky-true.transparent-false.boxed-false + .page-content-wrap {
						padding-top: '.$header_height.'px;
					}';

					$dynamic_css .='.desk.sticky-true.transparent-false.boxed-false.top-true + .page-content-wrap {
						padding-top: '.($header_height+$header_top_height).'px;
					}';

					$dynamic_css .='.desk.sticky-true.transparent-false.boxed-false.active + .page-content-wrap,
					.desk.sticky-true.transparent-false.boxed-false.top-true.active + .page-content-wrap {
						padding-top: '.$sticky_header_height.'px;
					}';

					if ($et_menu_under_logo == "true") {

						$dynamic_css .='.desk.sticky-true.transparent-false.boxed-false.menu-under-logo-true + .page-content-wrap {
							padding-top: '.($header_height+$header_top_height).'px;
						}';

						$dynamic_css .='.desk.sticky-true.transparent-false.boxed-false.menu-under-logo-true.top-true + .page-content-wrap {
							padding-top: '.($header_height+$header_top_height+40).'px;
						}';

						if ($et_menu_under_logo_boxed == "true") {

							$dynamic_css .='.desk.sticky-true.transparent-false.boxed-false.menu-under-logo-true.menu-under-logo-boxed-true + .page-content-wrap {
								padding-top: '.($header_height+25).'px;
							}';

							$dynamic_css .='.desk.sticky-true.transparent-false.boxed-false.menu-under-logo-true.menu-under-logo-boxed-true.top-true + .page-content-wrap {
								padding-top: '.($header_height+65).'px;
							}';
							
						}
					}

					if ($et_header_under_slider == "true") {
						$dynamic_css .='.page-content-wrap.revolution-slider-active.sticky-status-true.active {
							padding-top: '.$header_height.'px;
						}';

						$dynamic_css .='.page-content-wrap.revolution-slider-active.sticky-status-true.active.active_2 {
							padding-top: '.$sticky_header_height.'px;
						}';
					}
				}

				if ($et_transparent_header == "true" || $et_boxed_header == "true") {

					$page_title_height    = ($et_header_top == "true") ? ($page_title_height + $header_height + $header_top_height) : ($page_title_height + $header_height);
					$padding_top          = ($et_header_top == "true") ? ($header_height + $header_top_height) : $header_height;

					if ($et_menu_under_logo == "true") {

						$page_title_height    = $page_title_height + 40;
						$padding_top          = $padding_top + 40;

						if ($et_menu_under_logo_boxed == "true") {

							$page_title_height    = $page_title_height + 25;
							$padding_top          = $padding_top + 25;
							
						}
					}

					$dynamic_css .='.rich-header, 
					.rich-header .parallax-container, 
					.rich-header .fixed-container {
						height: '.$page_title_height.'px;
					}';

					$dynamic_css .='.rich-header {
						padding-top: '.$padding_top.'px;
					}';
				}

			}

			$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2 .desk-cart-wrap .cart-contents {
				background: '.$sticky_cart_bubble_back_color.' !important;
				color: '.$sticky_cart_bubble_text_color.' !important;
			}';

			$dynamic_css .='.desk-cart-wrap .cart-contents {
				background: '.$cart_bubble_back_color.';
				color: '.$cart_bubble_text_color.';
			}';

			$dynamic_css .='.layout-frame .desk.sticky-true,
			.layout-frame .fullscreen-bar.sticky-true {
				top: '.$frame_width.'px !important;
			}';

			$dynamic_css .='.language-switcher {
				margin-top:'.(($header_height-36)/2).'px;
			}';

			$dynamic_css .='.language-switcher .wpml-ls-current-language > ul {
				width:'.$language_switcher_width.';
			}';

			$dynamic_css .='.language-switcher .wpml-ls-current-language > a {
				color:'.$language_switcher_text_color_reg.';
				font-family:'.$header_submenu_typo_font_family.'; 
				font-weight:'.$header_submenu_typo_font_weight.'; 
				font-size:'.$language_switcher_typo_font_size.'; 
				text-transform:'.$header_submenu_typo_text_transform.';
				background-color: '.$language_switcher_back_color.';
			}';

			$dynamic_css .='.language-switcher .wpml-ls-sub-menu li a {
				color:'.$language_switcher_text_color_reg.';
				font-family:'.$header_submenu_typo_font_family.'; 
				font-weight:'.$header_submenu_typo_font_weight.'; 
				font-size:'.$language_switcher_typo_font_size.'; 
				text-transform:'.$header_submenu_typo_text_transform.';
				line-height: '.$header_submenu_typo_line_height.';
				background-color: '.$language_switcher_back_color.';
			}';

			$dynamic_css .='.language-switcher ul li:hover > a {
				color:'.$language_switcher_text_color_hov.';
				background-color:'.$language_switcher_back_hov_color.';
			}';

			$dynamic_css .='.sticky-true.active .desk-cart-wrap .cart-contents {
				background: '.$sticky_cart_bubble_back_color.' !important;
				color: '.$sticky_cart_bubble_text_color.' !important;
			}';

			$dynamic_css .='.sticky-true.active .language-switcher {
				margin-top:'.(($sticky_header_height-36)/2).'px !important;
			}';

			$dynamic_css .='.sticky-true.active.menu-under-logo-true .language-switcher {
				margin-top:'.(($menu_under_logo_height-36)/2).'px !important;
			}';

			$dynamic_css .='.sticky-true.active .language-switcher .wpml-ls-current-language > a {
				color:'.$sticky_language_switcher_text_color_reg.' !important;
				background-color: '.$sticky_language_switcher_back_color.' !important;
			}';

			$dynamic_css .='.sticky-true.active .language-switcher .wpml-ls-sub-menu li a {
				color:'.$sticky_language_switcher_text_color_reg.' !important;
				background-color: '.$sticky_language_switcher_back_color.' !important;
			}';

			$dynamic_css .='.sticky-true.active .language-switcher ul li:hover > a {
				color:'.$sticky_language_switcher_text_color_hov.' !important;
				background-color:'.$sticky_language_switcher_back_hov_color.' !important;
			}';

			$dynamic_css .='.sticky-true.active .desk-cart-wrap .cart-contents {
				background: '.$sticky_cart_bubble_back_color.' !important;
				color: '.$sticky_cart_bubble_text_color.' !important;
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active .desk-cart-wrap .cart-contents {
				background: '.$cart_bubble_back_color.' !important;
				color: '.$cart_bubble_text_color.' !important;
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active .language-switcher {
				margin-top:'.(($header_height-36)/2).'px !important;
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active.menu-under-logo-true .language-switcher {
				margin-top:'.(($menu_under_logo_height-36)/2).'px !important;
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active .language-switcher .wpml-ls-current-language > a {
				color:'.$language_switcher_text_color_reg.' !important;
				background-color: '.$language_switcher_back_color.' !important;
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active .language-switcher .wpml-ls-sub-menu li a {
				color:'.$language_switcher_text_color_reg.' !important;
				background-color: '.$language_switcher_back_color.' !important;
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active .language-switcher ul li:hover > a {
				color:'.$language_switcher_text_color_hov.' !important;
				background-color:'.$language_switcher_back_hov_color.' !important;
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active .desk-cart-wrap .cart-contents {
				background: '.$cart_bubble_back_color.' !important;
				color: '.$cart_bubble_text_color.' !important;
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2 .desk-cart-wrap .cart-contents {
				background: '.$sticky_cart_bubble_back_color.' !important;
				color: '.$sticky_cart_bubble_text_color.' !important;
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.header-under-slider-true.menu-under-logo-false.top-true {
			    -ms-transform: translateY(-'.$header_top_height.'px) !important;
			    transform: translateY(-'.$header_top_height.'px) !important;
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2 .language-switcher {
				margin-top:'.(($sticky_header_height-36)/2).'px !important;
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2.menu-under-logo-true .language-switcher {
				margin-top:'.(($menu_under_logo_height-36)/2).'px !important;
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2 .language-switcher .wpml-ls-current-language > a {
				color:'.$sticky_language_switcher_text_color_reg.' !important;
				background-color: '.$sticky_language_switcher_back_color.' !important;
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2 .language-switcher .wpml-ls-sub-menu li a {
				color:'.$sticky_language_switcher_text_color_reg.' !important;
				background-color: '.$sticky_language_switcher_back_color.' !important;
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2 .language-switcher ul li:hover > a {
				color:'.$sticky_language_switcher_text_color_hov.' !important;
				background-color:'.$sticky_language_switcher_back_hov_color.' !important;
			}';

			$dynamic_css .='.revolution-slider-active .sticky-true.active.active_2 .desk-cart-wrap .cart-contents {
				background: '.$sticky_cart_bubble_back_color.' !important;
				color: '.$sticky_cart_bubble_text_color.' !important;
			}';

			$dynamic_css .='#yith-quick-view-modal .yith-wcqv-wrapper {
				width:'.$product_quick_modal_width.'px !important;
				height:'.$product_quick_modal_height.'px !important;
				margin-left:-'.($product_quick_modal_width/2).'px !important;
				margin-top:-'.($product_quick_modal_height/2).'px !important;
			}';

			$dynamic_css .='#yith-quick-view-content .summary {
				height:'.$product_quick_modal_height.'px !important;
			}';

			$dynamic_css .='#yith-quick-view-modal .yith-wcqv-wrapper {
				width:'.$product_quick_modal_width.'px !important;
				height:'.$product_quick_modal_height.'px !important;
				margin-left:-'.($product_quick_modal_width/2).'px !important;
				margin-top:-'.($product_quick_modal_height/2).'px !important;
			}';

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (min-width: 1280px) and (max-width: 1367px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-min-1280-max-1367']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-min-1280-max-1367'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-min-1280-max-1367'];
			}

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (min-width: 1366px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-min-1366']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-min-1366'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-min-1366'];
			}

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (min-width: 1366px) and (max-width: 1599px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-min-1366-max-1599']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-min-1366-max-1599'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-min-1366-max-1599'];
			}

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (max-width: 1599px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-max-1599']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-max-1599'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-max-1599'];
			}

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (min-width: 1600px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-min-1600']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-min-1600'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-min-1600'];
			}

			$dynamic_css .='.desk-menu > ul > li {
				margin-left:'.$header_menu_m_1600.'px;
			}';

			if ($header_menu_separator == "true") {

				$dynamic_css .='.desk-menu > ul > li > a:before,
				.desk-menu > ul > li:first-child:after {
					right:-'.($header_menu_m_1600/2).'px;
				}';
				$dynamic_css .='.desk-menu > ul > li:first-child:after {
					left:-'.($header_menu_m_1600/2).'px;
				}';
				$dynamic_css .='.logopos-center.menu-under-logo-true .under-logo > .container > .desk-menu + *,
				.logopos-left.menu-under-logo-false .header-body > .container > *:nth-last-child(2),
				.logopos-right.menu-under-logo-false .header-body > .container > *:nth-last-child(2) {
					margin-left:'.($header_menu_m_1600/2).'px !important;
				}';

			}

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (min-width: 1600px) and (max-width: 1919px)  {';

			if(isset($GLOBALS['goodresto_enovathemes']['custom-css-min-1600-max-1919']) && !empty($GLOBALS['goodresto_enovathemes']['custom-css-min-1600-max-1919'])){
				$dynamic_css .= $GLOBALS['goodresto_enovathemes']['custom-css-min-1600-max-1919'];
			}

		$dynamic_css .='}';


	/* Footer/Banner custom css
	---------------*/

    	$footer_settings = get_option('footer_settings');
		$footer_id       = $footer_settings['footer_id'];

		if ($footer_id != "none") {
			$dynamic_css .= get_post_meta($footer_id, '_wpb_shortcodes_custom_css', true);
		}
		wp_reset_query();

		$banner_settings = get_option('banner_settings');
		$banner_id       = $banner_settings['banner_id'];
		if ($banner_id != "none") {
			$dynamic_css .= get_post_meta($banner_id, '_wpb_shortcodes_custom_css', true);
		}
		wp_reset_query();

	$dynamic_css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $dynamic_css);
	$dynamic_css = str_replace(': ', ':', $dynamic_css);
	$dynamic_css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $dynamic_css);

	wp_add_inline_style( 'dynamic-styles', $dynamic_css );
}
add_action( 'wp_enqueue_scripts', 'goodresto_enovathemes_include_dynamic_styles',20);
?>