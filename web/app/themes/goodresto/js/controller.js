/* Functions
---------------*/
	
	function delay_exec( id, wait_time, callback_f ){
	    if( typeof wait_time === "undefined" ){ wait_time = 500; }
	    if( typeof window['delay_exec'] === "undefined" ){ window['delay_exec'] = [];}
	    if( typeof window['delay_exec'][id] !== "undefined" ){ clearTimeout( window['delay_exec'][id] );}
	    window['delay_exec'][id] = setTimeout( callback_f , wait_time );
	}

/* NiceScroll
---------------*/

	(function($){

		"use strict";

		var $customScroll                   = controller_opt.customScroll; 
        var $customScrollCursorcolor        = controller_opt.customScrollCursorcolor;
        var $customScrollRailcolor          = controller_opt.customScrollRailcolor;
        var $customScrollCursorOpacityMin   = controller_opt.customScrollCursorOpacityMin;
        var $customScrollCursorOpacityMax   = controller_opt.customScrollCursorOpacityMax;
        var $customScrollCursorWidth        = controller_opt.customScrollCursorWidth;
        var $customScrollCursorBorderRadius = controller_opt.customScrollCursorBorderRadius;
        var $customScrollScrollSpeed        = controller_opt.customScrollScrollSpeed;
        var $customScrollMouseScrollStep    = controller_opt.customScrollMouseScrollStep;

        if ($customScroll == "true") {
        	$("html").niceScroll({
				cursorcolor:$customScrollCursorcolor,
				cursoropacitymin:$customScrollCursorOpacityMin/100,
				cursoropacitymax:$customScrollCursorOpacityMax/100,
				cursorwidth:$customScrollCursorWidth+'px',
				cursorborderradius:$customScrollCursorBorderRadius+'px',
				scrollspeed:$customScrollScrollSpeed,
				mousescrollstep:$customScrollMouseScrollStep,
				background:$customScrollRailcolor,
				cursorborder: "none",
				zindex: "100000000"
			});
        }

        $('.site-sidebar').niceScroll({
			cursorcolor:'#222222',
			cursoropacitymin:0,
			cursoropacitymax:0,
			cursorwidth:$customScrollCursorWidth+'px',
			cursorborderradius:$customScrollCursorBorderRadius+'px',
			scrollspeed:$customScrollScrollSpeed,
			mousescrollstep:$customScrollMouseScrollStep,
			background:'#666666',
			cursorborder: "none",
			zindex: "15"
		});

		var mobileNavigationCursorColor = $('.mobile-navigation').data('color');
		$('.mobile-navigation').niceScroll({
			cursorcolor:mobileNavigationCursorColor,
			cursoropacitymin:0.3,
			cursoropacitymax:0.7,
			cursorwidth:'6px',
			cursorborderradius:$customScrollCursorBorderRadius+'px',
			scrollspeed:$customScrollScrollSpeed,
			mousescrollstep:$customScrollMouseScrollStep,
			cursorborder: "none",
			zindex: "15"
		});

		var fullscreenNavigationCursorColor = $('nav.fullscreen-menu').data('color');
		$('nav.fullscreen-menu').niceScroll({
			cursorcolor:fullscreenNavigationCursorColor,
			cursoropacitymin:0.3,
			cursoropacitymax:0.7,
			cursorwidth:'6px',
			cursorborderradius:$customScrollCursorBorderRadius+'px',
			scrollspeed:$customScrollScrollSpeed,
			mousescrollstep:$customScrollMouseScrollStep,
			cursorborder: "none",
			zindex: "20",
			touchbehavior: true
		});

		$('.woo-cart').niceScroll({
			cursorcolor:'#BDBDBD',
			cursoropacitymin:$customScrollCursorOpacityMin/100,
			cursoropacitymax:$customScrollCursorOpacityMax/100,
			cursorwidth:'8px',
			cursorborderradius:$customScrollCursorBorderRadius+'px',
			scrollspeed:$customScrollScrollSpeed,
			mousescrollstep:$customScrollMouseScrollStep,
			background:'#eeeeee',
			cursorborder: "none",
			zindex: "15"
		});

		$('.et-booking').niceScroll({
			cursorcolor:'#BDBDBD',
			cursoropacitymin:$customScrollCursorOpacityMin/100,
			cursoropacitymax:$customScrollCursorOpacityMax/100,
			cursorwidth:'8px',
			cursorborderradius:$customScrollCursorBorderRadius+'px',
			scrollspeed:$customScrollScrollSpeed,
			mousescrollstep:$customScrollMouseScrollStep,
			background:'#eeeeee',
			cursorborder: "none",
			zindex: "15"
		});

		$('.et-working-hours').niceScroll({
			cursorcolor:'#BDBDBD',
			cursoropacitymin:$customScrollCursorOpacityMin/100,
			cursoropacitymax:$customScrollCursorOpacityMax/100,
			cursorwidth:'8px',
			cursorborderradius:$customScrollCursorBorderRadius+'px',
			scrollspeed:$customScrollScrollSpeed,
			mousescrollstep:$customScrollMouseScrollStep,
			background:'#eeeeee',
			cursorborder: "none",
			zindex: "15"
		});

		$(window).resize(function(){
			$('.woo-cart').getNiceScroll().resize();
			$('.et-booking').getNiceScroll().resize();
			$('.et-working-hours').getNiceScroll().resize();
		});

		$( document ).ajaxComplete(function( event, xhr, settings ) {
			if ( settings.url === controller_opt.ajaxurl ) {
				$('.woo-cart').getNiceScroll().resize();
			}
		});

	})(jQuery);

/* General
---------------*/

	(function($){

		"use strict";

		setTimeout(function(){
			$('.site-loading').css({'display':'none'});
		},2800);

		setTimeout(function(){
			$('.lazy-load').removeClass('lazy');
		},300);

		$('.widget_icl_lang_sel_widget .wpml-ls-current-language > a')
		.append('<span class="toggle et-icon-arrow-down"></span>');

		$('.wpml-ls-legacy-dropdown-click a > span.toggle').on('click',function(e){
			$(this).parent().toggleClass('active');
			if ($(this).parent().next('ul').length != 0) {
				$(this).parent().toggleClass('animate');
				$(this).parent().next('ul').stop().slideToggle(300, "easeOutQuart");
			};
			e.preventDefault();
		});

		$('.wpml-ls-legacy-dropdown .wpml-ls-current-language').hoverIntent(
			function(){
				$(this).toggleClass('active');
				if ($(this).find('ul').length != 0) {
					$(this).toggleClass('animate');
					$(this).find('ul').stop().slideToggle(300, "easeOutQuart");
				};
			},
			function(){
				$(this).toggleClass('active');
				if ($(this).find('ul').length != 0) {
					$(this).toggleClass('animate');
					$(this).find('ul').stop().slideToggle(300, "easeOutQuart");
				};
			}
		);

		$('.widget_nav_menu').each(function(){

			var $this = $(this);
			var childItems = $this.find('.menu-item-has-children > a')
			.append('<span class="toggle et-icon-arrow-right"></span>');

			if ($this.find('.menu-item-has-children > a').attr( "href" ) == "#") {
				$this.find('.menu-item-has-children > a').on('click',function(e){
					$(this).toggleClass('active');
					if ($(this).next('ul').length != 0) {
						$(this).toggleClass('animate');
						$(this).next('ul').stop().slideToggle(300, "easeOutQuart");
						$('.site-sidebar').getNiceScroll().resize();
						$('html').getNiceScroll().resize();
					};
					e.preventDefault();
				});
			} else {
				$this.find('.menu-item-has-children > a > span.toggle').on('click',function(e){
					$(this).toggleClass('active');
					if ($(this).parent().next('ul').length != 0) {
						$(this).parent().toggleClass('animate');
						$(this).parent().next('ul').stop().slideToggle(300, "easeOutQuart");
						$('.site-sidebar').getNiceScroll().resize();
						$('html').getNiceScroll().resize();
					};
					e.preventDefault();
				});
			}
			
		});

		$('.desk-menu > ul > [data-mm="true"] .widget_nav_menu, .mobile-navigation .widget_nav_menu').each(function(){

			var $this = $(this);

			if ($this.find('.menu-item-has-children > a').attr( "href" ) == "#") {
				$this.find('.menu-item-has-children > a').on('click',function(e){
					$(this).toggleClass('hard-animate');
					if ($(this).next('ul').length != 0) {
						$(this).toggleClass('hard-animate');
						$(this).parent().next('ul').toggleClass('hard-animate');
					};
					e.preventDefault();
				});
			} else {
				$this.find('.menu-item-has-children > a > span.toggle').on('click',function(e){
					$(this).toggleClass('hard-animate');
					if ($(this).parent().next('ul').length != 0) {
						$(this).parent().toggleClass('hard-animate');
						$(this).parent().next('ul').toggleClass('hard-animate');
					};
					e.preventDefault();
				});
			}
			
		});

		$('.widget_product_categories').each(function(){

			var $this = $(this);

			if ($this.find('.count').length != 0) {
				$this.find('a').each(function(){
					var $self = $(this);
					var countClone = $self.next('.count').clone();
					$self.next('.count').remove();
					$self.append(countClone);
				});
			}

			var childItems = $this.find('.cat-parent > a')
			.append('<span class="toggle et-icon-arrow-right"></span>');

			if ($this.find('.cat-parent > a').attr( "href" ) == "#") {
				$this.find('.cat-parent > a').on('click',function(e){
					$(this).toggleClass('active');
					if ($(this).parent().next('.children').length != 0) {
						$(this).parent().toggleClass('animate');
						$(this).parent().next('.children').stop().slideToggle(300, "easeOutQuart");
					};
					e.preventDefault();
				});
			} else {
				$this.find('.cat-parent > a > span.toggle').on('click',function(e){
					$(this).toggleClass('active');
					if ($(this).parent().next('.children').length != 0) {
						$(this).parent().toggleClass('animate');
						$(this).parent().next('.children').stop().slideToggle(300, "easeOutQuart");
					};
					e.preventDefault();
				});
			}
			
		});

		$('.desk-menu > ul > [data-mm="true"] .widget_product_categories, .mobile-navigation .widget_product_categories').each(function(){

			var $this = $(this);
			
			if ($this.find('.cat-parent > a').attr( "href" ) == "#") {
				$this.find('.cat-parent > a').on('click',function(e){
					$(this).toggleClass('hard-animate');
					if ($(this).next('ul').length != 0) {
						$(this).toggleClass('hard-animate');
						$(this).parent().next('ul').toggleClass('hard-animate');
					};
					e.preventDefault();
				});
			} else {
				$this.find('.cat-parent > a > span.toggle').on('click',function(e){
					$(this).toggleClass('hard-animate');
					if ($(this).parent().next('ul').length != 0) {
						$(this).parent().toggleClass('hard-animate');
						$(this).parent().next('ul').toggleClass('hard-animate');
					};
					e.preventDefault();
				});
			}
			
		});

		$('.widget_calendar td#prev').attr('colspan','1');
		$('.widget_calendar td#next').attr('colspan','1');
		$('.widget_calendar td#prev > a').html('<span class="toggle et-icon-arrow-left"></span>');
		$('.widget_calendar td#next > a').html('<span class="toggle et-icon-arrow-right"></span>');

		$('.widget_calendar tbody td').each(function(){
			if($(this).children('a').length != 0){
				$(this).addClass('has-children');
			}
		});

		$('.widget_photos_from_flickr').each(function(){
			$(this).find('.flickr_badge_image > a').append('<div class="image-preloader"></div>');
		});

		$('.widget_product_search').each(function(){
			$('<div class="search-icon"></div>').insertAfter($(this).find('input[type="submit"]'));
		});

		$('.one-page-bullets ul li').each(function(){
			$(this).find('a').attr('data-title',$(this).find('a').text());
		});

		function init() {
			window.addEventListener( 'scroll', function( event ) {
			    if( !didScroll ) {
			        didScroll = true;
			        scrollPage();
			    }
			}, false );
		}

		function scrollPage() {
			var sy = scrollY();
			if ( sy >= activateOn ) {
				top.addClass('animate');
				$('.one-page-bullets').addClass('animate');
			} else {
				top.removeClass('animate');
				$('.one-page-bullets').removeClass('animate');
			}

			didScroll = false;
		}

		function scrollY() {
			return window.pageYOffset || docElem.scrollTop;
		}

		var top         = $('#to-top'),
			docElem     = document.documentElement,
			didScroll   = false,
			activateOn  = 400;

		top.bind('click.smoothscroll', function (event) {
			event.preventDefault();
			var target = this.hash;
			$('html, body').stop().animate({
			    'scrollTop': $(target).offset().top
			}, 800, function () {
			    window.location.hash = target;
			});
		});

		init();

		$.fn.placeholder = function() {

			$.each(this, function(){

				var $this       = $(this);

				if ($this.attr('placeholder')) {
					$this.attr("data-placeholder", $this.attr('placeholder'));
					$this.removeAttr('placeholder');
				};

				var placeholder = $this.data("placeholder");

				if($this.val() == '') { $this.val(placeholder);}

				$this
				.on('focus', function(){
					if($this.val() == placeholder) { $this.val('');}
				})
				.on('focusout', function(){
					if($this.val() == '') { $this.val(placeholder);}
				});

			});

		}

		$('input#s').placeholder();
		$('.enovathemes-contact-form input[type="text"],.enovathemes-contact-form textarea').placeholder();
		$('.widget_mailchimp input[type="text"]').placeholder();
		$('.et-mailchimp input[type="text"]').placeholder();

		$('.widget_mailchimp').each(function(){
			var form  = $(this).find('form');
			var email = form.find('#mce-EMAIL');
			var name  = form.find('#mce-FNAME');

			form.submit(function(event){
				if (email.val() === email.attr('data-placeholder') || name.val() === name.attr('data-placeholder')) {
					event.preventDefault();
					email.focus();
				}
			});
		});

		$('.et-mailchimp').each(function(){
			var form  = $(this).find('form');
			var email = form.find('#mce-EMAIL');
			form.submit(function(event){
				if (email.val() === email.attr('data-placeholder')) {
					event.preventDefault();
					email.focus();
				}
			});
		});

		$('.search-form').each(function(){
			var form  = $(this);
			var search = form.find('#s');
			form.submit(function(event){
				if (search.val() === search.attr('data-placeholder')) {
					event.preventDefault();
				}
			});
		});

		function responsiveTable(){

			if ($(window).outerWidth() <= 767) {
				$('table').addClass('responsive');
				$('table').parent().addClass('overflow-x');
			} else {
				$('table').removeClass('responsive');
				$('table').parent().removeClass('overflow-x');
			}
			
		}
		responsiveTable();
		$(window).resize(responsiveTable);

		$(".booking-toggle").on("click",function(event){
			event.preventDefault();
			var $this = $(this);
			$this.toggleClass('active');
			$('#wrap .overlay-booking').toggleClass('active');
			$('.et-booking').toggleClass('active');
			$('#wrap .overlay-cart').removeClass('active');
			$('.woo-cart').removeClass('active');
			$('.cart-toggle').removeClass('active');
		});

		$('.et-booking-toggle').on("click",function(event){
			$(".booking-toggle").toggleClass('active');
			$('#wrap .overlay-booking').toggleClass('active');
			$('.et-booking').toggleClass('active');
		});

		$('.overlay-booking').on("click",function(event){
			var $this = $(this);
			$this.removeClass('active');
			$(".et-booking-toggle").removeClass('active');
			$('.et-booking').removeClass('active');
		});

		$(".working-hours-toggle").on("click",function(event){
			event.preventDefault();
			var $this = $(this);
			$this.toggleClass('active');
			$('#wrap .overlay-working-hours').toggleClass('active');
			$('.et-working-hours').toggleClass('active');
			$('#wrap .overlay-cart').removeClass('active');
			$('.woo-cart').removeClass('active');
			$('.cart-toggle').removeClass('active');

			$('#wrap .overlay-booking').removeClass('active');
			$('.et-booking').removeClass('active');
			$('.et-booking-toggle').removeClass('active');
		});

		$('.et-working-hours-toggle').on("click",function(event){
			$(".working-hours-toggle").toggleClass('active');
			$('#wrap .overlay-working-hours').toggleClass('active');
			$('.et-working-hours').toggleClass('active');
		});

		$('.overlay-working-hours').on("click",function(event){
			var $this = $(this);
			$this.removeClass('active');
			$(".et-working-hours-toggle").removeClass('active');
			$('.et-working-hours').removeClass('active');
		});
		
	})(jQuery);

/* Footer
---------------*/

	(function($){

		"use strict";

		var footer = $('.footer[data-sticky="true"]');
		if (typeof(footer) != 'undefined' && footer.length) {
			footer.footerReveal({ shadow: false, zIndex: -101 });
			setTimeout(function(){
				footer.addClass('active');
			},1500);
		}

	})(jQuery);

/* Header
---------------*/

	(function($){

		"use strict";

		// Submenu conditional left/right

			function submenuPosition(){

				$('.desk-menu > ul > li.menu-item-has-children').each(function(){

					var $this = $(this);
					if( $this.offset().left + $this.width() + $this.children('ul').width() > $(window).width()){
						$this.addClass('submenu-left');
					} else {
						$this.removeClass('submenu-left');
					}

				});

			}

			submenuPosition();
			$(window).resize(submenuPosition);

		// Submenu

			$('.language-switcher .wpml-ls-current-language > a')
			.append('<span class="mi et-icon-arrow-down"></span>');

			$('.desk .language-switcher .wpml-ls-current-language').hoverIntent(
				function(){
					var $this = $(this);
					$this.children('ul')
					.stop(true, true)
					.animate({'opacity':'1'}, 300, "easeOutQuart")
					.css('display','block');
				},
				function(){
					var $this = $(this);
					$this.children('ul')
					.stop(true, true).animate({'opacity':'0'}, 300, "easeOutQuart", function(){
						$(this).css('display','none');
					});
				}
			);

			$('.subeffect-ghost .desk-menu ul li, .subeffect-ghost .header-top-menu ul li').hoverIntent(
				function(){
					var $this = $(this);

					if ($this.attr('data-mm') == 'true') {
						$this.children('ul:not(.wpml-ls-sub-menu)')
						.stop(true, true)
						.animate({'opacity':'1','margin-top':'0'}, 600, "easeOutQuart")
						.css('display','flex');
					} else {
						$this.children('ul:not(.wpml-ls-sub-menu)')
						.stop(true, true)
						.animate({'opacity':'1','margin-top':'0'}, 600, "easeOutQuart")
						.css('display','block');
					}

				},
				function(){
					var $this = $(this);

					$this.children('ul')
					.stop(true, true).animate({'opacity':'0','margin-top':'-20px'}, 600, "easeOutQuart", function(){
						$(this).css('display','none');
					});
				}
			);

			$('.subeffect-fade .desk-menu ul li, .subeffect-fade .header-top-menu ul li').hoverIntent(
				function(){
					var $this = $(this);
					if ($this.attr('data-mm') == 'true') {
						$this.children('ul:not(.wpml-ls-sub-menu)')
						.stop(true, true)
						.animate({'opacity':'1'}, 300, "easeOutQuart")
						.css('display','flex');
					} else {
						$this.children('ul:not(.wpml-ls-sub-menu)')
						.stop(true, true)
						.animate({'opacity':'1'}, 300, "easeOutQuart")
						.css('display','block');
					}
				},
				function(){
					var $this = $(this);

					$this.children('ul')
					.stop(true, true).animate({'opacity':'0'}, 300, "easeOutQuart", function(){
						$(this).css('display','none');
					});
				}
			);

		// Megamenu

			$('.desk [data-mm="true"]').each(function(){
				var $this = $(this),
					$img  = $this.data('mmb');

				if (typeof $img !== "undefined") {
					$this.children('.sub-menu').css({'background-image':'url('+$img+')'});
				};
			});

			$('.desk .menu-item-button').each(function(){

				var $this  = $(this),
					$style = $this.attr('style'),
					$hover = $this.data('hover');

				if (typeof $hover !== "undefined") {
					$this.hover(
						function(){
							$this.attr('style',$hover);
						},
						function(){
							$this.attr('style',$style);
						}
					);
				};

			});

		// Modal search

			$('.search-toggle').on('click', function(){
				$(this).toggleClass('active');
				$('.header-search-modal').toggleClass('active');
				$('.header-search-modal #s').focus();
				$('.mob-search-toggle').toggleClass('active');
			});

			$('.mob-search-toggle').on('click', function(){
				$(this).toggleClass('active');
				$('.header-search-modal').toggleClass('active');
				$('.header-search-modal #s').focus();
				$('.search-toggle').toggleClass('active');
			});

			$('.modal-close').on('click', function(){
				$('.header-search-modal').toggleClass('active');
				$('.search-toggle').toggleClass('active');
				$('.mob-search-toggle').toggleClass('active');
			});

		// Cart Woo

			if (!$('body').hasClass('cart-checkout')) {
				$(".cart-toggle").on("click",function(event){
	    			event.preventDefault();
	    			var $this = $(this);
					$this.toggleClass('active');
					$('#wrap .overlay-cart').toggleClass('active');
					$('#wrap .overlay-booking').removeClass('active');
					$('.woo-cart').toggleClass('active');
					$('.et-booking').removeClass('active');
				});

				$('.woo-cart-toggle').on("click",function(event){
					$(".cart-toggle").toggleClass('active');
					$('#wrap .overlay-cart').toggleClass('active');
					$('.woo-cart').toggleClass('active');
				});

				$('.overlay-cart').on("click",function(event){
					var $this = $(this);
					$this.removeClass('active');
					$(".cart-toggle").removeClass('active');
					$('.woo-cart').removeClass('active');
				});

			};

		// Site sidebar

			$(".sidebar-toggle").on("click",function(event){
    			$(this).toggleClass('active');
				$('.mobile-site-sidebar-toggle').toggleClass('active');
				$('.mob-site-sidebar-toggle').toggleClass('active');
				$('#wrap').toggleClass('active');
				$('.site-sidebar').toggleClass('active');
			});

			$(".mobile-site-sidebar-toggle").on("click",function(event){
				$(this).toggleClass('active');
				$('#wrap').toggleClass('active');
				$('.mob-site-sidebar-toggle').toggleClass('active');
				$('.site-sidebar').toggleClass('active');
				$(".sidebar-toggle").toggleClass('active');
			});

			$(".mob-site-sidebar-toggle").on("click",function(event){
				$(this).toggleClass('active');
				$('#wrap').toggleClass('active');
				$('.site-sidebar').toggleClass('active');
				$(".sidebar-toggle").toggleClass('active');
			});

			$('#wrap .overlay').on("click",function(){
				$(this).removeClass('active');
				$(this).parent('.active').removeClass('active');
				$('.site-sidebar').removeClass('active');
				$(".sidebar-toggle").removeClass('active');
				$('.mobile-navigation').removeClass('active');
				$('.mob-menu-toggle').removeClass('active');
				$('.mob-menu-toggle-alt').removeClass('active');
				$('.mob-site-sidebar-toggle').removeClass('active');
			});

			$(window).resize(function(){
				$('#wrap').removeClass('active');
				$('.site-sidebar').removeClass('active');
				$(".sidebar-toggle").removeClass('active');
				$('.mobile-navigation').removeClass('active');
				$('.mob-menu-toggle').removeClass('active');
				$('.mob-menu-toggle-alt').removeClass('active');
				$('.mob-site-sidebar-toggle').removeClass('active');
			});

		// Check logo

			// var normalLogo = $('.desk').find('.normal-logo').attr('src');
	  //       var stickyLogo = $('.desk').find('.sticky-logo').attr('src');

	  //       if (typeof(normalLogo) != 'undefined' && typeof(stickyLogo) != 'undefined'){
			// 	if (normalLogo.length === stickyLogo.length) {
	  //   			$('.desk').addClass('same-logo');
	  //   		}
	  //   	}

		// Sticky

			var docElem      = document.documentElement,
			header           = $( 'sticky-true' ),
			pageWrap         = $( '.page-content-wrap' ),
			headerOffset     = header.offset(),
	        didScroll        = false,
	        changeHeaderOn   = (header.hasClass('header-under-slider-true') && header.parent('.revolution-slider-active').length) ? headerOffset.top : 50,
	        changeHeaderOn_2 = (header.hasClass('header-under-slider-true') && header.parent('.revolution-slider-active').length) ? headerOffset.top + 300 : null;

		    function init() {

		    	if( !didScroll ) {
	                didScroll = true;
	                scrollPage();
	            }

		        window.addEventListener( 'scroll', function( event ) {
		            if( !didScroll ) {
		                didScroll = true;
		                scrollPage();
		            }
		        }, false );

		    }

		    function scrollPage() {
		        var sy = scrollY();

	    		if ( sy >= changeHeaderOn ) {
	        		header.addClass('active');
	        		pageWrap.addClass('active');

	        	} else {
	        		header.removeClass('active');
	        		pageWrap.removeClass('active');
	        	}

	        	if (sy >= changeHeaderOn_2) {
        			header.addClass('active_2');
					pageWrap.addClass('active_2');
        		} else {
        			header.removeClass('active_2');
					pageWrap.removeClass('active_2');
        		}
		        
		        didScroll = false;
		    }

		    function scrollY() {
		        return window.pageYOffset || docElem.scrollTop;
		    }

		    if (header.length != 0) {init();}

		// Mobile

			$('.mobile-navigation .language-switcher .wpml-ls-current-language').unbind( "hover" );
			$('.mobile-navigation ul li a').each(function(){
				var $link = $(this);
				if ($link.attr( "href" ) == "#") {
					$link.on('click',function(e){
						e.preventDefault();
						$link.find('.mi').toggleClass('active');
						$link.next('ul').stop().slideToggle(300, "easeOutQuart",function(){
							$('.mobile-navigation').getNiceScroll().resize();
						});
					});
				} else {
					$link.find('.mi').on("click", function(e){
						e.preventDefault();
						var $this = $(this);
						$this.toggleClass('active');
						$this.parent().next('ul').stop().slideToggle(300, "easeOutQuart",function(){
							$('.mobile-navigation').getNiceScroll().resize();
						});
					});
				}
			});

			$('.mob-menu-toggle').on("click", function(event){
				$(this).toggleClass('active');
				$('.mobile-navigation').toggleClass('active');
				$('#wrap .overlay').toggleClass('active');
			});

			$('.mob-menu-toggle-alt').on("click", function(event){
				$('.mob-menu-toggle').toggleClass('active');
				$('.mobile-navigation').toggleClass('active');
				$('#wrap .overlay').toggleClass('active');
			});

			$(window).resize(function(){
				$('.mob-menu-toggle').removeClass('active');
				$('.mobile-navigation').removeClass('active');
				$('#wrap .overlay').removeClass('active');
			});

		// Fullscreen menu

			$('.fullscreen-menu ul li a').each(function(){
				var $link = $(this);
				if ($link.attr( "href" ) == "#") {
					$link.on('click',function(e){
						e.preventDefault();
						$link.find('.mi').toggleClass('active');
						$link.next('ul').stop().slideToggle(300, "easeOutQuart", function(){
							$('nav.fullscreen-menu').getNiceScroll().resize();
						});
					});
				} else {
					$link.find('.mi').on("click", function(e){
						e.preventDefault();
						var $this = $(this);
						$this.toggleClass('active');
						$this.parent().next('ul').stop().slideToggle(300, "easeOutQuart", function(){
							$('nav.fullscreen-menu').getNiceScroll().resize();
						});
					});
				}
			});

			$('.fullscreen-toggle, .mob-fullscreen-toggle').on("click", function(event){
				$(this).toggleClass('active');
				$('.fullscreen-modal').addClass('active');
			});

			$('.fullscreen-modal-close').on("click", function(event){
				$('.fullscreen-modal.active').addClass('hide');
				$('.fullscreen-toggle').removeClass('active');
				setTimeout(function(){
					$('.fullscreen-modal.active')
					.removeClass('active')
					.removeClass('hide');
				},500);
			});

			var docElem_2    = document.documentElement,
			fullBar          = $( '.fullscreen-bar.sticky-true' ),
			fullBarOffset    = fullBar.offset(),
			pageWrap_2       = $( '.page-content-wrap' ),
	        didScroll_2      = false,
	        changefullBarOn  = 50;

		    function fullBarInit() {

		    	if( !didScroll_2 ) {
	                didScroll_2 = true;
	                fullBarScrollPage();
	            }

		        window.addEventListener( 'scroll', function( event ) {
		            if( !didScroll_2 ) {
		                didScroll_2 = true;
		                fullBarScrollPage();
		            }
		        }, false );

		    }

		    function fullBarScrollPage() {
		        var sy = fullBarScrollY();

	    		if ( sy >= changeHeaderOn ) {
	        		fullBar.addClass('active');
	        		pageWrap_2.addClass('active');
	        	} else {
	        		fullBar.removeClass('active');
	        		pageWrap_2.removeClass('active');
	        	}
		        
		        didScroll_2 = false;
		    }

		    function fullBarScrollY() {
		        return window.pageYOffset || docElem_2.scrollTop;
		    }

		    if (fullBar.length != 0) {fullBarInit();}

		// Sidebar navigation
			
			$(".mob-sidebar-toggle, .mobile-sidebar-nav-toggle").on("click",function(event){
				$('aside.sidebar-nav').toggleClass('active');
				$('.mobile.sidebar-nav').getNiceScroll().resize();
			});

			function sidebarMobileSwitch(){
				if ($(window).outerWidth() < 1200) {

					$('aside.sidebar-nav')
					.removeClass('desktop')
					.addClass('mobile');

			        var $customScrollCursorBorderRadius = controller_opt.customScrollCursorBorderRadius;
			        var $customScrollScrollSpeed        = controller_opt.customScrollScrollSpeed;
			        var $customScrollMouseScrollStep    = controller_opt.customScrollMouseScrollStep;

					var sidebarNavigationCursorColor = $('aside.sidebar-nav').data('color');
					$('aside.sidebar-nav').niceScroll({
						cursorcolor:sidebarNavigationCursorColor,
						cursoropacitymin:0.3,
						cursoropacitymax:0.7,
						cursorwidth:'6px',
						cursorborderradius:$customScrollCursorBorderRadius+'px',
						scrollspeed:$customScrollScrollSpeed,
						mousescrollstep:$customScrollMouseScrollStep,
						cursorborder: "none",
						zindex: "15"
					});

					$('.mobile.sidebar-nav .sidebar-menu ul li a').each(function(){
						var $link = $(this);
						if ($link.attr( "href" ) == "#") {
							$link.on('click',function(e){
								e.preventDefault();
								$link.find('.mi').toggleClass('active');
								$link.next('ul').stop().slideToggle(300, "easeOutQuart",function(){
									$('.mobile.sidebar-nav').getNiceScroll().resize();
								})
							});
						} else {
							$link.find('.mi').on("click", function(e){
								e.preventDefault();
								var $this = $(this);
								$this.toggleClass('active');
								$this.parent().next('ul').stop().slideToggle(300, "easeOutQuart",function(){
									$('.mobile.sidebar-nav').getNiceScroll().resize();
								});
							});
						}
					});

					$('.mobile.sidebar-nav').getNiceScroll().resize();

				} else {
					$('aside.sidebar-nav')
					.removeClass('mobile')
					.addClass('desktop');

					$('.desktop.sidebar-nav.subeffect-ghost .sidebar-menu ul li').hoverIntent(
						function(){
							var $this = $(this);

							if ($this.attr('data-mm') == 'true') {
								$this.children('ul:not(.wpml-ls-sub-menu)')
								.stop(true, true)
								.animate({'opacity':'1','margin-top':'0'}, 300, "easeOutQuart")
								.css('display','flex');
							} else {
								$this.children('ul:not(.wpml-ls-sub-menu)')
								.stop(true, true)
								.animate({'opacity':'1','margin-top':'0'}, 300, "easeOutQuart")
								.css('display','block');
							}

						},
						function(){
							var $this = $(this);
							$this.children('ul')
							.stop(true, true).animate({'opacity':'0','margin-top':'-20px'}, 300, "easeOutQuart", function(){
								$(this).css('display','none');
							});
						}
					);

					$('.desktop.sidebar-nav.subeffect-fade .sidebar-menu ul li').hoverIntent(
						function(){
							var $this = $(this);
							if ($this.attr('data-mm') == 'true') {
								$this.children('ul:not(.wpml-ls-sub-menu)')
								.stop(true, true)
								.animate({'opacity':'1'}, 300, "easeOutQuart")
								.css('display','flex');
							} else {
								$this.children('ul:not(.wpml-ls-sub-menu)')
								.stop(true, true)
								.animate({'opacity':'1'}, 300, "easeOutQuart")
								.css('display','block');
							}
						},
						function(){
							var $this = $(this);

							$this.children('ul')
							.stop(true, true).animate({'opacity':'0'}, 300, "easeOutQuart", function(){
								$(this).css('display','none');
							});
						}
					);
				}
			}

			sidebarMobileSwitch();
			$(window).resize(function(){
				sidebarMobileSwitch();
			});

	})(jQuery);

/* Inview random
---------------*/

	(function($){

		var docElem = window.document.documentElement;

		function getViewportH() {
			var client = docElem['clientHeight'],
				inner = window['innerHeight'];
			
			if( client < inner )
				return inner;
			else
				return client;
		}

		function scrollY() {
			return window.pageYOffset || docElem.scrollTop;
		}

		function getOffset( el ) {
			var offsetTop = 0, offsetLeft = 0;
			do {
				if ( !isNaN( el.offsetTop ) ) {
					offsetTop += el.offsetTop;
				}
				if ( !isNaN( el.offsetLeft ) ) {
					offsetLeft += el.offsetLeft;
				}
			} while( el = el.offsetParent )

			return {
				top : offsetTop,
				left : offsetLeft
			}
		}

		function inViewport( el, h ) {
			var elH = el.offsetHeight,
				scrolled = scrollY(),
				viewed = scrolled + getViewportH(),
				elTop = getOffset(el).top,
				elBottom = elTop + elH,
				h = h || 0;

			return (elTop + elH * h) <= viewed && (elBottom - elH * h) >= scrolled;
		}

		function extend( a, b ) {
			for( var key in b ) { 
				if( b.hasOwnProperty( key ) ) {
					a[key] = b[key];
				}
			}
			return a;
		}

		function AnimOnScroll( el, options ) {	
			this.el = el;
			this.options = extend( this.defaults, options );
			this._init();
		}

		AnimOnScroll.prototype = {
			defaults : {
				minDelay : 0,
				maxDelay : 0,
				viewportFactor : 0,
				reload:false,
				grid:false,
				delayType:'grid',
				delay:0
			},
			_init : function() {

				this.items      		 = this.options.items;
				this.itemsRenderedCount  = 0;
				this.itemsCount 		 = this.items.length;
				this.didScroll           = false;
				this.delay      		 = this.options.delay;
				this.grid       		 = this.options.grid;
				this.itemSelector        = this.options.itemSelector;
				this.reload     		 = this.options.reload;
				this.delayType     		 = this.options.delayType;
				this.minDelay     		 = this.options.minDelay;
				this.maxDelay     		 = this.options.maxDelay;
				this.viewportFactor      = this.options.viewportFactor;
				this.gridSizer           = this.options.gridSizer;

				var self = this;

				imagesLoaded( this.el, function() {

					if (self.grid) {

						if (typeof(self.gridSizer) != 'undefined' && self.gridSizer != null) {

							// initialize masonry
							var msnry = new Masonry( self.el, {
								itemSelector: self.itemSelector,
								transitionDelay : '0.6s',
								columnWidth: self.gridSizer
							} );

						} else {

							// initialize masonry
							var msnry = new Masonry( self.el, {
								itemSelector: self.itemSelector,
								transitionDelay : '0.6s'
							} );

						}

						if (self.reload) {
							msnry.reloadItems()
						}

					}

					if( Modernizr.cssanimations ) {

						// the items already shown...
						self.items.forEach( function( el, i ) {
							if( inViewport( el ) ) {
								self._checkTotalRendered();

								if( self.minDelay && self.maxDelay && self.delayType != "none") {
									var randomDelay = Math.round(( Math.random() * ( self.maxDelay - self.minDelay ) + self.minDelay ));

									if (self.delayType == 'both') {
										var preloader    = el.querySelector( '.image-preloader' );
										if (typeof(preloader) != 'undefined' && preloader != null){
											preloader.style.transitionDelay = ( randomDelay + 0 )+'ms';
										}
										el.style.WebkitAnimationDelay = randomDelay+'ms';
										el.style.MozAnimationDelay = randomDelay+'ms';
										el.style.animationDelay = randomDelay+'ms';
									} else if (self.delayType == 'grid') {
										el.style.WebkitAnimationDelay = randomDelay+'ms';
										el.style.MozAnimationDelay = randomDelay+'ms';
										el.style.animationDelay = randomDelay+'ms';
									} else if (self.delayType == 'image') {

										var preloader    = el.querySelector( '.image-preloader' );
										if (typeof(preloader) != 'undefined' && preloader != null){
											preloader.style.transitionDelay = ( randomDelay + 0 )+'ms';
										}
									}

									classie.add( el, 'shown');
								}
								
							}
						} );

						// animate on scroll the items inside the viewport
						window.addEventListener( 'scroll', function() {
							self._onScrollFn();
						}, false );
						window.addEventListener( 'resize', function() {
							self._resizeHandler();
						}, false );
						
					}

				});
			},
			_onScrollFn : function() {
				var self = this;
				if( !this.didScroll ) {
					this.didScroll = true;
					setTimeout( function() { self._scrollPage(); }, 60 );
				}
			},
			_scrollPage : function() {
				var self = this;
				this.items.forEach( function( el, i ) {
					if( !classie.has( el, 'shown' ) && !classie.has( el, 'animate' ) && inViewport( el, self.viewportFactor )) {
						setTimeout( function() {
							var perspY = scrollY() + getViewportH() / 2;
							self.el.style.WebkitPerspectiveOrigin = '50% ' + perspY + 'px';
							self.el.style.MozPerspectiveOrigin = '50% ' + perspY + 'px';
							self.el.style.perspectiveOrigin = '50% ' + perspY + 'px';

							self._checkTotalRendered();

							if( self.minDelay && self.maxDelay && self.delayType != "none") {
								
								var randomDelay = Math.round(( Math.random() * ( self.maxDelay - self.minDelay ) + self.minDelay ));
								
								if (self.delayType == 'both') {
									var preloader    = el.querySelector( '.image-preloader' );
									if (typeof(preloader) != 'undefined' && preloader != null){
										preloader.style.transitionDelay = ( randomDelay + 0 )+'ms';
									}
									el.style.WebkitAnimationDelay = randomDelay+'ms';
									el.style.MozAnimationDelay = randomDelay+'ms';
									el.style.animationDelay = randomDelay+'ms';
								} else if (self.delayType == 'grid') {
									el.style.WebkitAnimationDelay = randomDelay+'ms';
									el.style.MozAnimationDelay = randomDelay+'ms';
									el.style.animationDelay = randomDelay+'ms';
								} else if (self.delayType == 'image') {
									var preloader    = el.querySelector( '.image-preloader' );
									if (typeof(preloader) != 'undefined' && preloader != null){
										preloader.style.transitionDelay = ( randomDelay + 0 )+'ms';
									}
								}

								classie.add( el, 'animate' );
							}

						}, self.delay );
					}
				});

				this.didScroll = false;
			},
			_resizeHandler : function() {
				var self = this;
				function delayed() {
					self._scrollPage();
					self.resizeTimeout = null;
				}
				if ( this.resizeTimeout ) {
					clearTimeout( this.resizeTimeout );
				}
				this.resizeTimeout = setTimeout( delayed, 1000 );
			},
			_checkTotalRendered : function() {
				++this.itemsRenderedCount;
				if( this.itemsRenderedCount === this.itemsCount ) {
					window.removeEventListener( 'scroll', this._onScrollFn );
				}
			}
		}

		// add to global namespace
		window.AnimOnScroll = AnimOnScroll;

	})(jQuery);

/* Inview sequential
---------------*/

	(function($){

		$.fn.inViewSequential = function() {

			$.each(this, function(){

				var $this       = $(this);

				if (!$this.hasClass('effect-none')) {

					var items = $this.find('.et-item');
					var i = 0;
					var timer;

					$this.one('inview', function(event, isInView) {
						if (isInView) {
							timer = setInterval(function(){
								$(items[i]).find('.et-item-inner').addClass('animate');
								var preloader    = $(items[i]).find('.image-preloader' );
								if (typeof(preloader) != 'undefined' && preloader != null){
									preloader.css('transition-delay',( 200 + 200*i )+'ms');
								}
								i++;
								if (i == items.length) {clearInterval(timer);}
							}, 50);
						} else {
							clearInterval(timer);
						}
					});

				}

			});

		}

	})(jQuery);

/* Page
---------------*/

	(function($){

		"use strict";

		$('.rich-header[data-opacity="true"]').each(function(){
			var win   = $(window);
			var $this = $(this);
			win.scroll(function(){
				var percent = ($(document).scrollTop()/win.height());
				$this.find('.rh-content').css('opacity', 1 - percent);
			});
		});

		$('.rich-header[data-parallax="true"]').each(function(){
			var $this = $(this),
				plx = $this.find('.parallax-container');
			$(window).scroll(function() {
				var yPos   = Math.round($(window).scrollTop() / 2.5);
				plx.css({
					'-webkit-transform':'translateY('+yPos + 'px)',
					'-ms-transform':'translateY('+yPos + 'px)',
					'-moz-transform':'translateY('+yPos + 'px)',
					'transform':'translateY('+yPos + 'px)'
				});    
			});
		});

	})(jQuery);

/* Posts
---------------*/

	(function($){

		"use strict";

		// Blog loop
		var blogLayout         = $('.blog-layout');
		var blogMinDelay       = 100;
		var blogMaxDelay       = 300;
		var blogViewportFactor = 0.4;
		var blogDelay          = 50;
		var blogReload         = false;
		var blogGrid           = true;
		var blogDelayType      = 'grid';
		var blogItemSelector   = '.et-item';
		var blogGridSizer      = '.grid-sizer';
		var preloaderActive    = $('body').hasClass('preloader-active') ? true : false;

		if ($('#loop-posts').hasClass('effect-none')) {
			blogDelayType = (preloaderActive == true) ? 'image' : "none";
		} else {
			blogDelayType = (preloaderActive == true) ? 'both' : "grid";
		}

		if (blogLayout.hasClass('full') || blogLayout.hasClass('list')) {
			blogGrid     = false;
			blogDelayType = (preloaderActive == true) ? 'image' : "none";
		}

		var blogItemSet = document.querySelector( '#loop-posts' );
		var blogItems   = Array.prototype.slice.call( document.querySelectorAll( '#loop-posts > .post > .post-inner' ) );
		if (typeof(blogItemSet) != 'undefined' && blogItemSet != null && blogItems.length){
			new AnimOnScroll( blogItemSet, {
				items:blogItems,
				minDelay : blogMinDelay,
				maxDelay : blogMaxDelay,
				viewportFactor:blogViewportFactor,
				delay:blogDelay,
				reload:blogReload,
				grid:blogGrid,
				itemSelector:blogItemSelector,
				delayType:blogDelayType,
				gridSizer:blogGridSizer,
			} );
		}

		$('.post-gallery').each(function(){
			$(this).flexslider({
				animation:'slide',
				smoothHeight:false,
				touch: true,
				animationSpeed: 450,
				slideshow:false,
				directionNav:true,
				controlNav:true,
				pauseOnHover: true,
				prevText: "",
				nextText: "",
			});
		});

		var postLoop              = $('#loop-posts'),
			postLoadMore          = $('#post-ajax-loader'),
			postAjaxLoading       = $('#post-ajax-loading'),
			postAjaxLoadingStatus = $('#post-ajax-loading-status'),
			postAjaxError      = $('#post-ajax-error'),
			defaultText        = postLoadMore.html(),
			postStartPage      = parseInt(controller_opt.postStartPage) + 1,
			postMax            = parseInt(controller_opt.postMax),
			nextLink    	   = controller_opt.postNextLink,
			postNoText         = controller_opt.postNoText,
			loadRequestRunning = false;

		function postLoadMoreText(){
			if(postStartPage > postMax) {
				if (postLoadMore.hasClass('material')) {
					postLoadMore.html('<span class="et-ink click"></span>'+postNoText);
				} else {
					postLoadMore.html(postNoText);
				}
				postLoadMore.addClass('disable');
			} else {
				if (postLoadMore.hasClass('material')) {
					postLoadMore.html('<span class="et-ink click"></span>'+defaultText);
				} else {
					postLoadMore.html(defaultText);
				}
				postLoadMore.removeClass('disable');
			}
		}

		function postAjaxLoadingStatusCheck(){
			if(postStartPage > postMax) {
				postAjaxLoadingStatus.html(postNoText);
				postAjaxLoading.addClass('disable');
			} else {
				postAjaxLoadingStatus.empty();
				postAjaxLoading.removeClass('disable');
			}
		}

		if (postLoop.hasClass('nav-loadmore')) {
			postLoadMoreText();
			postLoadMore.on('click',function(){

				var $this = $(this);

				if (loadRequestRunning) {
					return;
				}

				loadRequestRunning = true;

				postLoadMoreText();

				if(postStartPage <= postMax) {

					$this.addClass('loading');
					$.get(nextLink,function(content) {

					    var content = $(content).find('#loop-posts > .post').addClass('appended');

					    if (typeof content !== "undefined") {
						    $('#loop-posts').append(content);
							var itemSet = document.querySelector( '.loop-posts' );
							var items   = Array.prototype.slice.call( document.querySelectorAll( '.loop-posts > .post > .post-inner' ) );
							
							if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){

								new AnimOnScroll( itemSet, {
									items:items,
									minDelay : blogMinDelay,
									maxDelay : blogMaxDelay,
									viewportFactor:blogViewportFactor,
									delay:blogDelay,
									reload:blogReload,
									grid:blogGrid,
									itemSelector:blogItemSelector,
									delayType:blogDelayType,
									gridSizer:blogGridSizer
								} );

							}

							// Update overlay-move
							$('#loop-posts.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );
							// Update material button
							materialButton();

							setTimeout(function(){
								$this.removeClass('loading');
								$('#loop-posts .post').removeClass('appended');

								// Update nicescroll
								$("html").getNiceScroll().resize();

								postLoadMoreText();
							},600);

							postStartPage++;

							nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ postStartPage);
							loadRequestRunning = false;

						} else {
							postAjaxError.show();
						}
					});

				}

				return false;
			});
		} else if (postLoop.hasClass('nav-scroll')) {
			postAjaxLoadingStatusCheck();
			$(window).scroll(function(){
	            if  ($(window).scrollTop() == $(document).height() - $(window).height()){
	            	if (loadRequestRunning) {
						return;
					}

					loadRequestRunning = true;

					postAjaxLoadingStatusCheck();

					if(postStartPage <= postMax) {

						postAjaxLoading.addClass('loading');
						$.get(nextLink,function(content) {

						    var content = $(content).find('#loop-posts > .post').addClass('appended');

						    if (typeof content !== "undefined") {

							    $('#loop-posts').append(content);
								var itemSet = document.querySelector( '.loop-posts' );
								var items   = Array.prototype.slice.call( document.querySelectorAll( '.loop-posts > .post > .post-inner' ) );
								
								if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){
									new AnimOnScroll( itemSet, {
										items:items,
										minDelay : blogMinDelay,
										maxDelay : blogMaxDelay,
										viewportFactor:blogViewportFactor,
										delay:blogDelay,
										reload:blogReload,
										grid:blogGrid,
										itemSelector:blogItemSelector,
										delayType:blogDelayType,
										gridSizer:blogGridSizer
									} );
								}
								
								// Update overlay-move
								$('#loop-posts.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );
								// Update material button
								materialButton();

								setTimeout(function(){
									postAjaxLoading.removeClass('loading');
									$('#loop-posts .post').removeClass('appended');

									// Update nicescroll
									$("html").getNiceScroll().resize();

									postLoadMoreText();
								},600);

								postStartPage++;

								nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ postStartPage);
								loadRequestRunning = false;
							} else {
								eventAjaxError.show();
							}
						});

					}

					return false;
	            }
	        });
		}

		var stickyOffeset = $('.desk').hasClass('sticky-true') ? parseInt(controller_opt.stickyHeaderHeight)+24 : 0;

		$("#single-post-page #post-social-share").stick_in_parent({
			parent:'.post-body',
			spacer:false,
			offset_top:stickyOffeset
		});

	})(jQuery);

/* Events
---------------*/

	(function($){

		"use strict";

		// Event loop
		var eventLayout         = $('.event-layout');
		var eventMinDelay       = 100;
		var eventMaxDelay       = 300;
		var eventViewportFactor = 0.4;
		var eventDelay          = 50;
		var eventReload         = true;
		var eventGrid           = true;
		var eventItemSelector   = '.et-item';
		var eventGridSizer      = '.grid-sizer';
		var eventDelayType      = 'both';
		var preloaderActive    = $('body').hasClass('preloader-active') ? true : false;

		if ($('#loop-event').hasClass('effect-none')) {
			eventDelayType = (preloaderActive == true) ? 'image' : "none";
		} else {
			eventDelayType = (preloaderActive == true) ? 'both' : "grid";
		}

		var eventItemSet = document.querySelector( '#loop-event' );
		var eventItems   = Array.prototype.slice.call( document.querySelectorAll( '#loop-event > .event > .post-inner' ) );
		if (typeof(eventItemSet) != 'undefined' && eventItemSet != null && eventItems.length){
			new AnimOnScroll( eventItemSet, {
				items:eventItems,
				minDelay : eventMinDelay,
				maxDelay : eventMaxDelay,
				viewportFactor:eventViewportFactor,
				delay:eventDelay,
				reload:eventReload,
				grid:eventGrid,
				gridSizer:eventGridSizer,
				itemSelector:eventItemSelector,
				delayType:eventDelayType
			} );
		}


		var eventFilter            = $('#event-filter'),
			eventLoop              = $('#loop-event'),
			eventNavigation        = eventLoop.data('navigation'),
			postPerPage              = eventFilter.data('posts-per-page'),
			eventLoadMore          = $('#event-ajax-loader'),
			eventAjaxLoading       = $('#event-ajax-loading'),
			eventAjaxLoadingStatus = $('#event-ajax-loading-status'),
			eventAjaxError         = $('#event-ajax-error'),
			defaultText              = eventLoadMore.html(),
			postStartPage            = parseInt(controller_opt.postStartPage) + 1,
			eventMax               = parseInt(controller_opt.eventMax),
			nextLink    	         = controller_opt.eventNextLink,
			eventNoText            = controller_opt.eventNoText,
			eventLoadingText       = controller_opt.eventLoadingText,
			loadRequestRunning       = false,
			paginationRequestRunning = false,
			filterRequestRunning     = false;

		function eventLoadMoreText(){
			if(postStartPage > eventMax) {
				if (eventLoadMore.hasClass('material')) {
					eventLoadMore.html('<span class="et-ink click"></span>'+eventNoText);
				} else {
					eventLoadMore.html(eventNoText);
				}
				eventLoadMore.addClass('disable');
			} else {
				if (eventLoadMore.hasClass('material')) {
					eventLoadMore.html('<span class="et-ink click"></span>'+defaultText);
				} else {
					eventLoadMore.html(defaultText);
				}
				eventLoadMore.removeClass('disable');
			}
		}

		function eventAjaxLoadingStatusCheck(){

			if(postStartPage > eventMax) {
				eventAjaxLoadingStatus.html(eventNoText);
				eventAjaxLoading.addClass('disable');
			} else {
				eventAjaxLoadingStatus.empty();
				eventAjaxLoading.removeClass('disable');
			}
		}

		function eventBuildPagination(){
			$('.enovathemes-navigation').addClass('ajax').empty();
			if(postStartPage <= eventMax) {

				$('.enovathemes-navigation').append('<ul class="page-numbers"></ul>');
				var $pagination = $('.enovathemes-navigation > .page-numbers');

				for (var i = 1; i <= eventMax; i++) {
					$pagination.append('<li><a class="page-numbers" href="'+nextLink.replace(/\/page\/[0-9]*/, '/page/'+ i)+'">'+i+'</a></li>');
				}

				$pagination.find('a').first().addClass('current');
			}
		}

		function eventAjaxLoad(){
			if (eventNavigation == "loadmore") {
				eventLoadMoreText();
				eventLoadMore.on('click',function(){

					var $this = $(this);

					if (loadRequestRunning) {
						return;
					}

					loadRequestRunning = true;

					eventLoadMoreText();				

					if(postStartPage <= eventMax) {

						$this.addClass('loading');
						$.get(nextLink,function(content) {

						    var content = $(content).find('#loop-event > .event').addClass('appended');

						    if (typeof content !== "undefined") {
							    $('#loop-event').append(content);
								var itemSet = document.querySelector( '#loop-event' );
								var items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-event > .event > .post-inner' ) );
								
								if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){

									new AnimOnScroll( itemSet, {
										items:items,
										minDelay : eventMinDelay,
										maxDelay : eventMaxDelay,
										viewportFactor:eventViewportFactor,
										delay:eventDelay,
										reload:eventReload,
										grid:eventGrid,
										gridSizer:eventGridSizer,
										itemSelector:eventItemSelector,
										delayType:eventDelayType
									} );
								}

								// Update lightbox gallery
								$('#loop-event a[data-lightbox-gallery="events-loop"]').nivoLightbox({
									effect: 'fadeScale',
								    theme: 'default', 
								    keyboardNav: true, 
								    clickOverlayToClose: true, 
								    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
								});

								// Update overlay-move
								$('#loop-event.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

								setTimeout(function(){
									$this.removeClass('loading');
									$('#loop-event .event').removeClass('appended');

									// Update nicescroll
									$("html").getNiceScroll().resize();

									eventLoadMoreText();
								},600);

								postStartPage++;

								nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ postStartPage);
								loadRequestRunning       = false;
								paginationRequestRunning = false;
								filterRequestRunning     = false;

							} else {
								eventAjaxError.show();
							}
						});

					}

					return false;
				});
			} else if (eventNavigation == "scroll") {
				eventAjaxLoadingStatusCheck();
				$(window).scroll(function(){
		            if  ($(window).scrollTop() == $(document).height() - $(window).height()){
		            	if (loadRequestRunning) {
							return;
						}

						loadRequestRunning = true;

						eventAjaxLoadingStatusCheck();

						if(postStartPage <= eventMax) {

							eventAjaxLoading.addClass('loading');
							$.get(nextLink,function(content) {

							    var content = $(content).find('#loop-event > .event').addClass('appended');
								if (typeof content !== "undefined") {
							    	
							    	$('#loop-event').append(content);
							    
									var itemSet = document.querySelector( '#loop-event' );
									var items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-event > .event > .post-inner' ) );
									
									if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){
										new AnimOnScroll( itemSet, {
											items:items,
											minDelay : eventMinDelay,
											maxDelay : eventMaxDelay,
											viewportFactor:eventViewportFactor,
											delay:eventDelay,
											reload:eventReload,
											grid:eventGrid,
											gridSizer:eventGridSizer,
											itemSelector:eventItemSelector,
											delayType:eventDelayType
										} );
									}

									// Update lightbox gallery
									$('#loop-event a[data-lightbox-gallery="events-loop"]').nivoLightbox({
										effect: 'fadeScale',
									    theme: 'default', 
									    keyboardNav: true, 
									    clickOverlayToClose: true, 
									    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
									});

									// Update overlay-move
									$('#loop-event.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

									setTimeout(function(){
										eventAjaxLoading.removeClass('loading');
										$('#loop-event .event').removeClass('appended');

										// Update nicescroll
										$("html").getNiceScroll().resize();

										eventLoadMoreText();
									},600);

									postStartPage++;

									nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ postStartPage);
									loadRequestRunning       = false;
									paginationRequestRunning = false;
									filterRequestRunning     = false;

								} else {
									eventAjaxError.show();
								}
							});

						}

						return false;
		            }
		        });
			} else if (eventNavigation == "pagination" && eventFilter.length) {
				if (!$('.enovathemes-navigation').hasClass('tax')) {
					eventBuildPagination();
					$('.enovathemes-navigation').find('a').on('click',function(event){

						event.preventDefault();

						var $this = $(this);

						$('.enovathemes-navigation .current').removeClass('current');

						$this.toggleClass('current');

						if (paginationRequestRunning) {
							return;
						}

						paginationRequestRunning = true;

						if(postStartPage <= eventMax) {

							eventLoop.prepend('<div class="ajax-loading-overlay"><div class="ajax-loading-overlay-content"><div class="ajax-loading-text">'+eventLoadingText+'</div><div class="ajax-loading"></div></div></div>');

							$('.ajax-loading-overlay').fadeIn(300,function(){

								var $ajaxLoadingOverlay = $(this);

								eventLoop.remove('.event');

								eventLoop.load($this.attr('href') + ' #loop-event > .event',
									function(response, status, xhr) {

										if (status == "error") {
											$('#loop-event').css('height','200px');
											$ajaxLoadingOverlay.fadeOut(300,function(){
												eventAjaxError.show();
											});
										} else {

											var content = $('#loop-event > .event').addClass('appended');

											if (typeof content !== "undefined") {

												$('#loop-event').append(content);

												var itemSet = document.querySelector( '#loop-event' );
												var items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-event > .event > .post-inner' ) );
												
												if (typeof(eventGridSizer) != 'undefined' && eventGridSizer != null) {
													$('#loop-event').append('<div class="grid-sizer"></div>');
												}

												if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){

													new AnimOnScroll( itemSet, {
														items:items,
														minDelay : eventMinDelay,
														maxDelay : eventMaxDelay,
														viewportFactor:eventViewportFactor,
														delay:eventDelay,
														reload:eventReload,
														grid:eventGrid,
														gridSizer:eventGridSizer,
														itemSelector:eventItemSelector,
														delayType:eventDelayType
													} );

												}

												// Update lightbox gallery
												$('#loop-event a[data-lightbox-gallery="events-loop"]').nivoLightbox({
													effect: 'fadeScale',
												    theme: 'default', 
												    keyboardNav: true, 
												    clickOverlayToClose: true, 
												    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
												});

												// Update overlay-move
												$('#loop-event.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

												setTimeout(function(){
													$ajaxLoadingOverlay.fadeOut(300);
													$('#loop-event .event').removeClass('appended');

													// Update nicescroll
													$("html").getNiceScroll().resize();

													eventLoadMoreText();
												},600);

												loadRequestRunning       = false;
												paginationRequestRunning = false;
												filterRequestRunning     = false;
												
											} else {
												eventAjaxError.show();
											}
										}
									}
								);

							});

						}

						return false;
					});
				}
			}
		}

		if (eventFilter.length) {

			eventFilter.find('.filter').on('click',function(){

				if (filterRequestRunning) {
					return;
				}

				filterRequestRunning = true;

				var $this = $(this);
        		var filterLink = $this.attr('data-link');

        		$('#event-filter .active').removeClass('active');

        		$this.toggleClass('active');
        		postStartPage = 2;
				nextLink      = filterLink + 'page/'+postStartPage;
				eventMax    = Math.ceil($this.attr('data-count')/postPerPage);

				if (eventNavigation == "pagination"){
					$('.enovathemes-navigation').addClass('hide');
        		} else {
					$('.ajax-container').addClass('hide');
        		}

				eventLoop.prepend('<div class="ajax-loading-overlay"><div class="ajax-loading-overlay-content"><div class="ajax-loading-text">'+eventLoadingText+'</div><div class="ajax-loading"></div></div></div>');

				$('.ajax-loading-overlay').fadeIn(300,function(){

					var $ajaxLoadingOverlay = $(this);

					eventLoop.remove('.event');

					eventLoop.load(filterLink + ' #loop-event > .event',
						function(response, status, xhr) {

							if (status == "error") {
								$('#loop-event').css('height','200px');
								$ajaxLoadingOverlay.fadeOut(300,function(){
									eventAjaxError.show();
								});

							} else {

								var content = $('#loop-event > .event').addClass('appended');

								if (typeof content !== "undefined") {

									$('#loop-event').append(content);

									var itemSet = document.querySelector( '#loop-event' );
									var items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-event > .event > .post-inner' ) );
									
									if (typeof(eventGridSizer) != 'undefined' && eventGridSizer != null) {
										$('#loop-event').append('<div class="grid-sizer"></div>');
									}

									if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){

										new AnimOnScroll( itemSet, {
											items:items,
											minDelay : eventMinDelay,
											maxDelay : eventMaxDelay,
											viewportFactor:eventViewportFactor,
											delay:eventDelay,
											reload:eventReload,
											grid:eventGrid,
											gridSizer:eventGridSizer,
											itemSelector:eventItemSelector,
											delayType:eventDelayType
										} );

									}

									// Update lightbox gallery
									$('#loop-event a[data-lightbox-gallery="events-loop"]').nivoLightbox({
										effect: 'fadeScale',
									    theme: 'default', 
									    keyboardNav: true, 
									    clickOverlayToClose: true, 
									    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
									});

									// Update overlay-move
									$('#loop-event.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );


									setTimeout(function(){
										$ajaxLoadingOverlay.fadeOut(300);
										$('#loop-event .event').removeClass('appended');
										$('.enovathemes-navigation').removeClass('hide');
										$('.ajax-container').removeClass('hide');

										// Update nicescroll
										$("html").getNiceScroll().resize();

									},600);

									loadRequestRunning       = false;
									paginationRequestRunning = false;
									filterRequestRunning     = false;

								} else {
									eventAjaxError.show();
								}
							}
						}
					);

					eventAjaxLoad();

				});

        		return false;

			});

			eventAjaxLoad();

		} else {
			eventAjaxLoad();
		}

		/* single event gallery
		---------------*/

			// Single post page
			imagesLoaded( $('.single-event-page > .post > .post-inner'), function() {
		        $('.single-event-page > .post > .post-inner > .post-media').one('inview', function(event, isInView) {
					if (isInView) {
						$(this).toggleClass('animate');
					} else {
						$(this).toggleClass('animate');
					}
				});
				$('.single-event-page > .post > .post-inner img[class*="wp-image"]').one('inview', function(event, isInView) {
					if (isInView) {
						$(this).toggleClass('animate');
					} else {
						$(this).toggleClass('animate');
					}
				});
				$('.single-event-page > .post > .post-inner .gallery').one('inview', function(event, isInView) {
					if (isInView) {
						$(this).toggleClass('animate');
					} else {
						$(this).toggleClass('animate');
					}
				});
	        });

	})(jQuery);

/* Menus
---------------*/

	(function($){

		"use strict";

		// Menu loop
		var menuLayout         = $('.menu-layout');
		var menuMinDelay       = 100;
		var menuMaxDelay       = 300;
		var menuViewportFactor = 0.4;
		var menuDelay          = 50;
		var menuReload         = true;
		var menuGrid           = true;
		var menuItemSelector   = '.et-item';
		var menuGridSizer      = '.grid-sizer';
		var menuDelayType      = 'both';
		var preloaderActive    = $('body').hasClass('preloader-active') ? true : false;

		if ($('#loop-menu').hasClass('effect-none')) {
			menuDelayType = (preloaderActive == true) ? 'image' : "none";
		} else {
			menuDelayType = (preloaderActive == true) ? 'both' : "grid";
		}

		var menuItemSet = document.querySelector( '#loop-menu' );
		var menuItems   = Array.prototype.slice.call( document.querySelectorAll( '#loop-menu > .menu > .post-inner' ) );
		if (typeof(menuItemSet) != 'undefined' && menuItemSet != null && menuItems.length){
			new AnimOnScroll( menuItemSet, {
				items:menuItems,
				minDelay : menuMinDelay,
				maxDelay : menuMaxDelay,
				viewportFactor:menuViewportFactor,
				delay:menuDelay,
				reload:menuReload,
				grid:menuGrid,
				gridSizer:menuGridSizer,
				itemSelector:menuItemSelector,
				delayType:menuDelayType
			} );
		}


		var menuFilter            = $('#menu-filter'),
			menuLoop              = $('#loop-menu'),
			menuNavigation        = menuLoop.data('navigation'),
			postPerPage              = menuFilter.data('posts-per-page'),
			menuLoadMore          = $('#menu-ajax-loader'),
			menuAjaxLoading       = $('#menu-ajax-loading'),
			menuAjaxLoadingStatus = $('#menu-ajax-loading-status'),
			menuAjaxError         = $('#menu-ajax-error'),
			defaultText              = menuLoadMore.html(),
			postStartPage            = parseInt(controller_opt.postStartPage) + 1,
			menuMax               = parseInt(controller_opt.menuMax),
			nextLink    	         = controller_opt.menuNextLink,
			menuNoText            = controller_opt.menuNoText,
			menuLoadingText       = controller_opt.menuLoadingText,
			loadRequestRunning       = false,
			paginationRequestRunning = false,
			filterRequestRunning     = false;

		function menuLoadMoreText(){
			if(postStartPage > menuMax) {
				if (menuLoadMore.hasClass('material')) {
					menuLoadMore.html('<span class="et-ink click"></span>'+menuNoText);
				} else {
					menuLoadMore.html(menuNoText);
				}
				menuLoadMore.addClass('disable');
			} else {
				if (menuLoadMore.hasClass('material')) {
					menuLoadMore.html('<span class="et-ink click"></span>'+defaultText);
				} else {
					menuLoadMore.html(defaultText);
				}
				menuLoadMore.removeClass('disable');
			}
		}

		function menuAjaxLoadingStatusCheck(){

			if(postStartPage > menuMax) {
				menuAjaxLoadingStatus.html(menuNoText);
				menuAjaxLoading.addClass('disable');
			} else {
				menuAjaxLoadingStatus.empty();
				menuAjaxLoading.removeClass('disable');
			}
		}

		function menuBuildPagination(){
			$('.enovathemes-navigation').addClass('ajax').empty();
			if(postStartPage <= menuMax) {

				$('.enovathemes-navigation').append('<ul class="page-numbers"></ul>');
				var $pagination = $('.enovathemes-navigation > .page-numbers');

				for (var i = 1; i <= menuMax; i++) {
					$pagination.append('<li><a class="page-numbers" href="'+nextLink.replace(/\/page\/[0-9]*/, '/page/'+ i)+'">'+i+'</a></li>');
				}

				$pagination.find('a').first().addClass('current');
			}
		}

		function menuAjaxLoad(){
			if (menuNavigation == "loadmore") {
				menuLoadMoreText();
				menuLoadMore.on('click',function(){

					var $this = $(this);

					if (loadRequestRunning) {
						return;
					}

					loadRequestRunning = true;

					menuLoadMoreText();				

					if(postStartPage <= menuMax) {

						$this.addClass('loading');
						$.get(nextLink,function(content) {

						    var content = $(content).find('#loop-menu > .menu').addClass('appended');

						    if (typeof content !== "undefined") {
							    $('#loop-menu').append(content);
								var itemSet = document.querySelector( '#loop-menu' );
								var items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-menu > .menu > .post-inner' ) );
								
								if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){

									new AnimOnScroll( itemSet, {
										items:items,
										minDelay : menuMinDelay,
										maxDelay : menuMaxDelay,
										viewportFactor:menuViewportFactor,
										delay:menuDelay,
										reload:menuReload,
										grid:menuGrid,
										gridSizer:menuGridSizer,
										itemSelector:menuItemSelector,
										delayType:menuDelayType
									} );
								}

								setTimeout(function(){
									$this.removeClass('loading');
									$('#loop-menu .menu').removeClass('appended');

									// Update nicescroll
									$("html").getNiceScroll().resize();

									menuLoadMoreText();
								},600);

								postStartPage++;

								nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ postStartPage);
								loadRequestRunning       = false;
								paginationRequestRunning = false;
								filterRequestRunning     = false;

							} else {
								menuAjaxError.show();
							}
						});

					}

					return false;
				});
			} else if (menuNavigation == "scroll") {
				menuAjaxLoadingStatusCheck();
				$(window).scroll(function(){
		            if  ($(window).scrollTop() == $(document).height() - $(window).height()){
		            	if (loadRequestRunning) {
							return;
						}

						loadRequestRunning = true;

						menuAjaxLoadingStatusCheck();

						if(postStartPage <= menuMax) {

							menuAjaxLoading.addClass('loading');
							$.get(nextLink,function(content) {

							    var content = $(content).find('#loop-menu > .menu').addClass('appended');
								if (typeof content !== "undefined") {
							    	
							    	$('#loop-menu').append(content);
							    
									var itemSet = document.querySelector( '#loop-menu' );
									var items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-menu > .menu > .post-inner' ) );
									
									if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){
										new AnimOnScroll( itemSet, {
											items:items,
											minDelay : menuMinDelay,
											maxDelay : menuMaxDelay,
											viewportFactor:menuViewportFactor,
											delay:menuDelay,
											reload:menuReload,
											grid:menuGrid,
											gridSizer:menuGridSizer,
											itemSelector:menuItemSelector,
											delayType:menuDelayType
										} );
									}

									setTimeout(function(){
										menuAjaxLoading.removeClass('loading');
										$('#loop-menu .menu').removeClass('appended');

										// Update nicescroll
										$("html").getNiceScroll().resize();

										menuLoadMoreText();
									},600);

									postStartPage++;

									nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ postStartPage);
									loadRequestRunning       = false;
									paginationRequestRunning = false;
									filterRequestRunning     = false;

								} else {
									menuAjaxError.show();
								}
							});

						}

						return false;
		            }
		        });
			} else if (menuNavigation == "pagination" && menuFilter.length) {
				if (!$('.enovathemes-navigation').hasClass('tax')) {
					menuBuildPagination();
					$('.enovathemes-navigation').find('a').on('click',function(event){

						event.preventDefault();

						var $this = $(this);

						$('.enovathemes-navigation .current').removeClass('current');

						$this.toggleClass('current');

						if (paginationRequestRunning) {
							return;
						}

						paginationRequestRunning = true;

						if(postStartPage <= menuMax) {

							menuLoop.prepend('<div class="ajax-loading-overlay"><div class="ajax-loading-overlay-content"><div class="ajax-loading-text">'+menuLoadingText+'</div><div class="ajax-loading"></div></div></div>');

							$('.ajax-loading-overlay').fadeIn(300,function(){

								var $ajaxLoadingOverlay = $(this);

								menuLoop.remove('.menu');

								menuLoop.load($this.attr('href') + ' #loop-menu > .menu',
									function(response, status, xhr) {

										if (status == "error") {
											$('#loop-menu').css('height','200px');
											$ajaxLoadingOverlay.fadeOut(300,function(){
												menuAjaxError.show();
											});
										} else {

											var content = $('#loop-menu > .menu').addClass('appended');

											if (typeof content !== "undefined") {

												$('#loop-menu').append(content);

												var itemSet = document.querySelector( '#loop-menu' );
												var items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-menu > .menu > .post-inner' ) );
												
												if (typeof(menuGridSizer) != 'undefined' && menuGridSizer != null) {
													$('#loop-menu').append('<div class="grid-sizer"></div>');
												}

												if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){

													new AnimOnScroll( itemSet, {
														items:items,
														minDelay : menuMinDelay,
														maxDelay : menuMaxDelay,
														viewportFactor:menuViewportFactor,
														delay:menuDelay,
														reload:menuReload,
														grid:menuGrid,
														gridSizer:menuGridSizer,
														itemSelector:menuItemSelector,
														delayType:menuDelayType
													} );

												}

												setTimeout(function(){
													$ajaxLoadingOverlay.fadeOut(300);
													$('#loop-menu .menu').removeClass('appended');

													// Update nicescroll
													$("html").getNiceScroll().resize();

													menuLoadMoreText();
												},600);

												loadRequestRunning       = false;
												paginationRequestRunning = false;
												filterRequestRunning     = false;
												
											} else {
												menuAjaxError.show();
											}
										}
									}
								);

							});

						}

						return false;
					});
				}
			}
		}

		if (menuFilter.length) {

			menuFilter.find('.filter').on('click',function(){

				if (filterRequestRunning) {
					return;
				}

				filterRequestRunning = true;

				var $this = $(this);
        		var filterLink = $this.attr('data-link');

        		$('#menu-filter .active').removeClass('active');

        		$this.toggleClass('active');
        		postStartPage = 2;
				nextLink      = filterLink + 'page/'+postStartPage;
				menuMax    = Math.ceil($this.attr('data-count')/postPerPage);

				if (menuNavigation == "pagination"){
					$('.enovathemes-navigation').addClass('hide');
        		} else {
					$('.ajax-container').addClass('hide');
        		}

				menuLoop.prepend('<div class="ajax-loading-overlay"><div class="ajax-loading-overlay-content"><div class="ajax-loading-text">'+menuLoadingText+'</div><div class="ajax-loading"></div></div></div>');

				$('.ajax-loading-overlay').fadeIn(300,function(){

					var $ajaxLoadingOverlay = $(this);

					menuLoop.remove('.menu');

					menuLoop.load(filterLink + ' #loop-menu > .menu',
						function(response, status, xhr) {

							if (status == "error") {
								$('#loop-menu').css('height','200px');
								$ajaxLoadingOverlay.fadeOut(300,function(){
									menuAjaxError.show();
								});

							} else {

								var content = $('#loop-menu > .menu').addClass('appended');

								if (typeof content !== "undefined") {

									$('#loop-menu').append(content);

									var itemSet = document.querySelector( '#loop-menu' );
									var items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-menu > .menu > .post-inner' ) );
									
									if (typeof(menuGridSizer) != 'undefined' && menuGridSizer != null) {
										$('#loop-menu').append('<div class="grid-sizer"></div>');
									}

									if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){

										new AnimOnScroll( itemSet, {
											items:items,
											minDelay : menuMinDelay,
											maxDelay : menuMaxDelay,
											viewportFactor:menuViewportFactor,
											delay:menuDelay,
											reload:menuReload,
											grid:menuGrid,
											gridSizer:menuGridSizer,
											itemSelector:menuItemSelector,
											delayType:menuDelayType
										} );

									}

									setTimeout(function(){
										$ajaxLoadingOverlay.fadeOut(300);
										$('#loop-menu .menu').removeClass('appended');
										$('.enovathemes-navigation').removeClass('hide');
										$('.ajax-container').removeClass('hide');

										// Update nicescroll
										$("html").getNiceScroll().resize();

									},600);

									loadRequestRunning       = false;
									paginationRequestRunning = false;
									filterRequestRunning     = false;

								} else {
									menuAjaxError.show();
								}
							}
						}
					);

					menuAjaxLoad();

				});

        		return false;

			});

			menuAjaxLoad();

		} else {
			menuAjaxLoad();
		}

	})(jQuery);

/* Product
---------------*/

	(function($){

		"use strict";

		// Product loop
		var productLayout         = $('.product-layout');
		var productMinDelay       = 100;
		var productMaxDelay       = 300;
		var productViewportFactor = 0.4;
		var productDelay          = 50;
		var productReload         = true;
		var productGrid           = true;
		var productItemSelector   = '.et-item';
		var productGridSizer      = '.grid-sizer';
		var productDelayType      = 'both';
		var preloaderActive    = $('body').hasClass('preloader-active') ? true : false;

		if ($('.product-loop').hasClass('effect-none')) {
			productDelayType = (preloaderActive == true) ? 'image' : "none";
		} else {
			productDelayType = (preloaderActive == true) ? 'both' : "grid";
		}

		var productItemSet = document.querySelector( '.product-loop' );
		var productItems   = Array.prototype.slice.call( document.querySelectorAll( '.product-loop > .product > .post-inner' ) );
		if (typeof(productItemSet) != 'undefined' && productItemSet != null && productItems.length){
			new AnimOnScroll( productItemSet, {
				items:productItems,
				minDelay : productMinDelay,
				maxDelay : productMaxDelay,
				viewportFactor:productViewportFactor,
				delay:productDelay,
				reload:productReload,
				grid:productGrid,
				gridSizer:productGridSizer,
				itemSelector:productItemSelector,
				delayType:productDelayType
			} );
		}

		var productFilter            = $('#product-filter'),
			productLoop              = $('.product-loop'),
			productNavigation        = productLoop.data('navigation'),
			postPerPage              = productFilter.data('posts-per-page'),
			productLoadMore          = $('#product-ajax-loader'),
			productAjaxLoading       = $('#product-ajax-loading'),
			productAjaxLoadingStatus = $('#product-ajax-loading-status'),
			productAjaxError         = $('#product-ajax-error'),
			defaultText              = productLoadMore.html(),
			postStartPage            = parseInt(controller_opt.postStartPage) + 1,
			productMax               = parseInt(controller_opt.productMax),
			nextLink    	         = controller_opt.productNextLink,
			productNoText            = controller_opt.productNoText,
			productLoadingText       = controller_opt.productLoadingText,
			loadRequestRunning       = false,
			paginationRequestRunning = false,
			filterRequestRunning     = false;

		function productLoadMoreText(){
			if(postStartPage > productMax) {
				if (productLoadMore.hasClass('material')) {
					productLoadMore.html('<span class="et-ink click"></span>'+productNoText);
				} else {
					productLoadMore.html(productNoText);
				}
				productLoadMore.addClass('disable');
			} else {
				if (productLoadMore.hasClass('material')) {
					productLoadMore.html('<span class="et-ink click"></span>'+defaultText);
				} else {
					productLoadMore.html(defaultText);
				}
				productLoadMore.removeClass('disable');
			}
		}

		function productAjaxLoadingStatusCheck(){

			if(postStartPage > productMax) {
				productAjaxLoadingStatus.html(productNoText);
				productAjaxLoading.addClass('disable');
			} else {
				productAjaxLoadingStatus.empty();
				productAjaxLoading.removeClass('disable');
			}
		}

		function productBuildPagination(){
			$('.enovathemes-navigation').addClass('ajax').empty();
			if(postStartPage <= productMax) {

				$('.enovathemes-navigation').append('<ul class="page-numbers"></ul>');
				var $pagination = $('.enovathemes-navigation > .page-numbers');

				for (var i = 1; i <= productMax; i++) {
					$pagination.append('<li><a class="page-numbers" href="'+nextLink.replace(/\/page\/[0-9]*/, '/page/'+ i)+'">'+i+'</a></li>');
				}

				$pagination.find('a').first().addClass('current');
			}
		}

		function productAjaxLoad(){
			if (productNavigation == "loadmore") {
				productLoadMoreText();
				productLoadMore.on('click',function(){

					var $this = $(this);

					if (loadRequestRunning) {
						return;
					}

					loadRequestRunning = true;

					productLoadMoreText();				

					if(postStartPage <= productMax) {

						$this.addClass('loading');
						$.get(nextLink,function(content) {

						    var content = $(content).find('.product-loop > .product').addClass('appended');

						    if (typeof content !== "undefined") {
							    $('.product-loop').append(content);
								var itemSet = document.querySelector( '.product-loop' );
								var items   = Array.prototype.slice.call( document.querySelectorAll( '.product-loop > .product > .post-inner' ) );
								
								if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){

									new AnimOnScroll( itemSet, {
										items:items,
										minDelay : productMinDelay,
										maxDelay : productMaxDelay,
										viewportFactor:productViewportFactor,
										delay:productDelay,
										reload:productReload,
										grid:productGrid,
										gridSizer:productGridSizer,
										itemSelector:productItemSelector,
										delayType:productDelayType
									} );
								}

								// Update lightbox gallery
								$('.product-loop a[data-lightbox-gallery="products-loop"]').nivoLightbox({
									effect: 'fadeScale',
								    theme: 'default', 
								    keyboardNav: true, 
								    clickOverlayToClose: true, 
								    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
								});

								// Update overlay-move
								$('.product-loop.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

								setTimeout(function(){
									$this.removeClass('loading');
									$('.product-loop .product').removeClass('appended');

									// Update nicescroll
									$("html").getNiceScroll().resize();

									productLoadMoreText();
								},600);

								postStartPage++;

								nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ postStartPage);
								loadRequestRunning       = false;
								paginationRequestRunning = false;
								filterRequestRunning     = false;

							} else {
								productAjaxError.show();
							}
						});

					}

					return false;
				});
			} else if (productNavigation == "scroll") {
				productAjaxLoadingStatusCheck();
				$(window).scroll(function(){
		            if  ($(window).scrollTop() == $(document).height() - $(window).height()){
		            	if (loadRequestRunning) {
							return;
						}

						loadRequestRunning = true;

						productAjaxLoadingStatusCheck();

						if(postStartPage <= productMax) {

							productAjaxLoading.addClass('loading');
							$.get(nextLink,function(content) {

							    var content = $(content).find('.product-loop > .product').addClass('appended');
								if (typeof content !== "undefined") {
							    	
							    	$('.product-loop').append(content);
							    
									var itemSet = document.querySelector( '.product-loop' );
									var items   = Array.prototype.slice.call( document.querySelectorAll( '.product-loop > .product > .post-inner' ) );
									
									if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){
										new AnimOnScroll( itemSet, {
											items:items,
											minDelay : productMinDelay,
											maxDelay : productMaxDelay,
											viewportFactor:productViewportFactor,
											delay:productDelay,
											reload:productReload,
											grid:productGrid,
											gridSizer:productGridSizer,
											itemSelector:productItemSelector,
											delayType:productDelayType
										} );
									}

									// Update lightbox gallery
									$('.product-loop a[data-lightbox-gallery="products-loop"]').nivoLightbox({
										effect: 'fadeScale',
									    theme: 'default', 
									    keyboardNav: true, 
									    clickOverlayToClose: true, 
									    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
									});

									// Update overlay-move
									$('.product-loop.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

									setTimeout(function(){
										productAjaxLoading.removeClass('loading');
										$('.product-loop .product').removeClass('appended');

										// Update nicescroll
										$("html").getNiceScroll().resize();

										productLoadMoreText();
									},600);

									postStartPage++;

									nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ postStartPage);
									loadRequestRunning       = false;
									paginationRequestRunning = false;
									filterRequestRunning     = false;

								} else {
									productAjaxError.show();
								}
							});

						}

						return false;
		            }
		        });
			} else if (productNavigation == "pagination" && productFilter.length) {

				productLoop = $('#loop-product');

				if (!$('.enovathemes-navigation').hasClass('tax')) {
					productBuildPagination();
					$('.enovathemes-navigation').find('a').on('click',function(event){

						event.preventDefault();

						var $this = $(this);

						$('.enovathemes-navigation .current').removeClass('current');

						$this.toggleClass('current');

						if (paginationRequestRunning) {
							return;
						}

						paginationRequestRunning = true;

						if(postStartPage <= productMax) {

							productLoop.prepend('<div class="ajax-loading-overlay"><div class="ajax-loading-overlay-content"><div class="ajax-loading-text">'+productLoadingText+'</div><div class="ajax-loading"></div></div></div>');

							$('.ajax-loading-overlay').fadeIn(300,function(){

								var $ajaxLoadingOverlay = $(this);

								productLoop.remove('.product');

								productLoop.load($this.attr('href') + ' .product-loop > .product',
									function(response, status, xhr) {

										if (status == "error") {
											$('#loop-product').css('height','200px');
											$ajaxLoadingOverlay.fadeOut(300,function(){
												productAjaxError.show();
											});
										} else {

											var content = $('#loop-product > .product').addClass('appended');

											if (typeof content !== "undefined") {

												$('#loop-product').append(content);

												var itemSet = document.querySelector( '#loop-product' );
												var items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-product > .product > .post-inner' ) );
												
												if (typeof(productGridSizer) != 'undefined' && productGridSizer != null) {
													$('#loop-product').append('<div class="grid-sizer"></div>');
												}

												if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){

													new AnimOnScroll( itemSet, {
														items:items,
														minDelay : productMinDelay,
														maxDelay : productMaxDelay,
														viewportFactor:productViewportFactor,
														delay:productDelay,
														reload:productReload,
														grid:productGrid,
														gridSizer:productGridSizer,
														itemSelector:productItemSelector,
														delayType:productDelayType
													} );

												}

												// Update overlay-move
												$('#loop-product.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

												setTimeout(function(){
													$ajaxLoadingOverlay.fadeOut(300);
													$('#loop-product .product').removeClass('appended');

													// Update nicescroll
													$("html").getNiceScroll().resize();

													productLoadMoreText();
												},600);

												loadRequestRunning       = false;
												paginationRequestRunning = false;
												filterRequestRunning     = false;
												
											} else {
												productAjaxError.show();
											}
										}
									}
								);

							});

						}

						return false;
					});
				}
			}
		}

		if (productFilter.length) {

			productLoop = $('#loop-product');

			productFilter.find('.filter').on('click',function(){

				if (filterRequestRunning) {
					return;
				}

				filterRequestRunning = true;

				var $this = $(this);
        		var filterLink = $this.attr('data-link');

        		$('#product-filter .active').removeClass('active');

        		$this.toggleClass('active');
        		postStartPage = 2;
				nextLink      = filterLink + 'page/'+postStartPage;
				productMax    = Math.ceil($this.attr('data-count')/postPerPage);

				if (productNavigation == "pagination"){
					$('.enovathemes-navigation').addClass('hide');
        		} else {
					$('.ajax-container').addClass('hide');
        		}

				productLoop.prepend('<div class="ajax-loading-overlay"><div class="ajax-loading-overlay-content"><div class="ajax-loading-text">'+productLoadingText+'</div><div class="ajax-loading"></div></div></div>');

				$('.ajax-loading-overlay').fadeIn(300,function(){

					var $ajaxLoadingOverlay = $(this);

					productLoop.remove('.product');

					productLoop.load(filterLink + ' #loop-product > .product',
						function(response, status, xhr) {

							if (status == "error") {
								$('#loop-product').css('height','200px');
								$ajaxLoadingOverlay.fadeOut(300,function(){
									productAjaxError.show();
								});

							} else {

								var content = $('#loop-product > .product').addClass('appended');

								if (typeof content !== "undefined") {

									$('#loop-product').append(content);

									var itemSet = document.querySelector( '#loop-product' );
									var items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-product > .product > .post-inner' ) );
									
									if (typeof(productGridSizer) != 'undefined' && productGridSizer != null) {
										$('#loop-product').append('<div class="grid-sizer"></div>');
									}

									if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){

										new AnimOnScroll( itemSet, {
											items:items,
											minDelay : productMinDelay,
											maxDelay : productMaxDelay,
											viewportFactor:productViewportFactor,
											delay:productDelay,
											reload:productReload,
											grid:productGrid,
											gridSizer:productGridSizer,
											itemSelector:productItemSelector,
											delayType:productDelayType
										} );

									}

									// Update overlay-move
									$('#loop-product.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

									setTimeout(function(){
										$ajaxLoadingOverlay.fadeOut(300);
										$('#loop-product .product').removeClass('appended');
										$('.enovathemes-navigation').removeClass('hide');
										$('.ajax-container').removeClass('hide');

										// Update nicescroll
										$("html").getNiceScroll().resize();

									},600);

									loadRequestRunning       = false;
									paginationRequestRunning = false;
									filterRequestRunning     = false;

								} else {
									productAjaxError.show();
								}
							}
						}
					);

					productAjaxLoad();

				});

        		return false;

			});

			productAjaxLoad();

		} else {
			productAjaxLoad();
		}

		function productAdditonalFunctionality(){
			$('.product-loop.overlay-none .product').each(function(){
				var $this              = $(this),
					$thisImgGallery    = $this.find('.product-image-gallery'),
					$thisFirstImg      = $thisImgGallery.find('.image-container'),
					$images            = $thisImgGallery.children('img');

				var length = $images.length + 1,
					i      = 1,
					timer  = '';

				if (length > 1) {

					$thisImgGallery.hover(
						function(){
							timer  = setInterval(function(){
								$thisImgGallery.children().eq(i)
								.addClass('visible')
								.siblings()
								.removeClass('visible');
								i++;
								if (i == length) {
									$thisFirstImg
									.addClass('visible')
									.siblings()
									.removeClass('visible');
									i = 1;
								}
							},700);
						},
						function(){
							clearInterval(timer);
							$thisFirstImg
							.addClass('visible')
							.siblings()
							.removeClass('visible');
							i = 1;
						}
					);

				}

			});

			$('.yith-wcwl-add-to-wishlist').each(function(){

				var $this = $(this);
				var $yithWcwlAddButton            = $this.find('.yith-wcwl-add-button');
				var $yithWcwlWishlistaddedbrowse  = $this.find('.yith-wcwl-wishlistaddedbrowse');
				var $yithWcwlWishlistexistsbrowse = $this.find('.yith-wcwl-wishlistexistsbrowse');

				var $yithWcwlAddButtonLink = $yithWcwlAddButton.find('a');
				$yithWcwlAddButtonLink.attr('title',$yithWcwlAddButtonLink.text().trim());

				$yithWcwlWishlistaddedbrowse.find('a').attr('title',$yithWcwlWishlistaddedbrowse.find('.feedback').text().trim());
				$yithWcwlWishlistexistsbrowse.find('a').attr('title',$yithWcwlWishlistexistsbrowse.find('.feedback').text().trim());

				$this.find('a').on('click',function(){
					var $self = $(this);
					$self.toggleClass('active');
					setTimeout(function(){
						$self.toggleClass('active');
					},1000);
				});

			});

			$('.loop-product .product').each(function(){

				var $this = $(this);
				var addToCard = $this.find('.ajax_add_to_cart');
				var productProgress = $this.find('.ajax-add-to-cart-loading');
				var addToCardEvent  = true;

				if (addToCard.hasClass('added')) {
					addToCardEvent  = false;
				}

				if (addToCard.attr('data-product_status') == 'outofstock') {
					addToCardEvent  = false;
				}

				if (addToCard.attr('data-product_type') == 'variable') {
					addToCardEvent  = false;
				}

				if (addToCardEvent == true) {
					addToCard.on('click',function(){
						var $self = $(this);
						productProgress.fadeIn(400,function(){
							setTimeout(function(){
								productProgress.find('.circle-loader').addClass('load-complete');
								setTimeout(function(){
									productProgress.fadeOut(400);
									addToCardEvent  = false;
								}, 500);
							}, 1500);
						});
						
					});
				}
			});
		}
		

		productAdditonalFunctionality();

        /* Product single
		---------------*/

			$('.product-image-zoom').each(function(){
				$(this).zoom({url: $(this).attr('href')});
			});

			var rtl = ($('body').hasClass('rtl')) ? true : false;
			$('#product-gallery ul.carousel_thumb').slick({
				asNavFor: '#product-gallery-navigation-set',
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				dots: false,
				draggable:false,
				adaptiveHeight:true,
				rtl:rtl,
				prevArrow: '<span class="slick-prev"></span>',
				nextArrow: '<span class="slick-next"></span>',
				fade: true
			});

			if ($('.product-layout-single').hasClass('single-product-tabs-under') || $('.product-layout-single').hasClass('single-product-center-mode')) {

				$('#product-gallery-navigation ul').slick({
					asNavFor: '#product-gallery-set',
					slidesToShow: 4,
					slidesToScroll: 1,
					dots: false,
					arrows: false,
					centerMode: false,
					focusOnSelect:true,
					variableWidth:true,
					rtl:rtl,
				});

			} else {

				$('#product-gallery-navigation ul').slick({
					asNavFor: '#product-gallery-set',
					slidesToShow: 4,
					slidesToScroll: 1,
					dots: false,
					arrows: false,
					centerMode: false,
					focusOnSelect:true,
					vertical:true,
					verticalSwiping:true
				});

			}

			$('.product-layout-single .single_add_to_cart_button').addClass(controller_opt.productButtonClass);

			var $customScrollCursorOpacityMin   = controller_opt.customScrollCursorOpacityMin;
	        var $customScrollCursorOpacityMax   = controller_opt.customScrollCursorOpacityMax;
	        var $customScrollCursorBorderRadius = controller_opt.customScrollCursorBorderRadius;
	        var $customScrollScrollSpeed        = controller_opt.customScrollScrollSpeed;
	        var $customScrollMouseScrollStep    = controller_opt.customScrollMouseScrollStep;

			function niceScrollChange(){
	        	if ($(window).outerWidth() < 800) {
					$('.yith-wcqv-main').niceScroll({
						cursorcolor:'#BDBDBD',
						cursoropacitymin:$customScrollCursorOpacityMin/100,
						cursoropacitymax:$customScrollCursorOpacityMax/100,
						cursorwidth:'8px',
						cursorborderradius:$customScrollCursorBorderRadius+'px',
						scrollspeed:$customScrollScrollSpeed,
						mousescrollstep:$customScrollMouseScrollStep,
						background:'#eeeeee',
						cursorborder: "none",
						zindex: "15"
					});
	        	} else {
	        		$('#yith-quick-view-content .summary').niceScroll({
						cursorcolor:'#BDBDBD',
						cursoropacitymin:$customScrollCursorOpacityMin/100,
						cursoropacitymax:$customScrollCursorOpacityMax/100,
						cursorwidth:'8px',
						cursorborderradius:$customScrollCursorBorderRadius+'px',
						scrollspeed:$customScrollScrollSpeed,
						mousescrollstep:$customScrollMouseScrollStep,
						background:'#eeeeee',
						cursorborder: "none",
						zindex: "15"
					});
	        	}
	        }

	        $('a[data-lightbox-gallery="product-single"]').nivoLightbox({
				effect: 'fadeScale',
			    theme: 'default', 
			    keyboardNav: true, 
			    clickOverlayToClose: true, 
			    errorMessage: 'The requested content cannot be loaded. Please try again later.',
			    afterShowLightbox: function(lightbox){
			    	$('.nivo-lightbox-open')
					.on('swipeleft', function(){
						$('.nivo-lightbox-next').trigger( "click" );
					})
					.on('swiperight', function(){
						$('.nivo-lightbox-prev').trigger( "click" );
					});
			    },
			    onPrev: function(element){
					$('#product-gallery-set').find('.slick-prev').trigger('click');
			    },
			    onNext: function(element){
					$('#product-gallery-set').find('.slick-next').trigger('click');
			    }
			});

			$( document ).ajaxComplete(function( event, xhr, settings ) {
			    if ( settings.url === controller_opt.ajaxurl ) {
			        

			        niceScrollChange();
			        $(window).resize(niceScrollChange);

			        var rtl = ($('body').hasClass('rtl')) ? true : false;
					$('#yith-quick-view-content #product-gallery ul.carousel_thumb').slick({
						slidesToShow: 1,
						slidesToScroll: 1,
						arrows: true,
						dots: false,
						draggable:false,
						adaptiveHeight:true,
						rtl:rtl,
						prevArrow: '<span class="slick-prev"></span>',
						nextArrow: '<span class="slick-next"></span>',
						fade: true
					});

					$('#yith-quick-view-content .product-image-zoom').each(function(){
						$(this).zoom({url: $(this).attr('href')});
					});

					$('a[data-lightbox-gallery="product-single"]').nivoLightbox({
						effect: 'fadeScale',
					    theme: 'default', 
					    keyboardNav: true, 
					    clickOverlayToClose: true, 
					    errorMessage: 'The requested content cannot be loaded. Please try again later.',
					    afterShowLightbox: function(lightbox){
					    	$('.nivo-lightbox-open')
							.on('swipeleft', function(){
								$('.nivo-lightbox-next').trigger( "click" );
							})
							.on('swiperight', function(){
								$('.nivo-lightbox-prev').trigger( "click" );
							});
					    },
					    onPrev: function(element){
							$('#product-gallery-set').find('.slick-prev').trigger('click');
					    },
					    onNext: function(element){
							$('#product-gallery-set').find('.slick-next').trigger('click');
					    }
					});

					$('.yith-wcwl-add-to-wishlist').each(function(){

						var $this = $(this);
						var $yithWcwlAddButton            = $this.find('.yith-wcwl-add-button');
						var $yithWcwlWishlistaddedbrowse  = $this.find('.yith-wcwl-wishlistaddedbrowse');
						var $yithWcwlWishlistexistsbrowse = $this.find('.yith-wcwl-wishlistexistsbrowse');

						var $yithWcwlAddButtonLink = $yithWcwlAddButton.find('a');
						$yithWcwlAddButtonLink.attr('title',$yithWcwlAddButtonLink.text().trim());

						$yithWcwlWishlistaddedbrowse.find('a').attr('title',$yithWcwlWishlistaddedbrowse.find('.feedback').text().trim());
						$yithWcwlWishlistexistsbrowse.find('a').attr('title',$yithWcwlWishlistexistsbrowse.find('.feedback').text().trim());

						$this.find('a').on('click',function(){
							var $self = $(this);
							$self.toggleClass('active');
							setTimeout(function(){
								$self.toggleClass('active');
							},1000);
						});

					});
			    }
			});

	})(jQuery);

/* Image preloader
---------------*/

	(function($){

		"use strict";

		var itemSetMinDelay       = 100;
		var itemSetMaxDelay       = 300;
		var itemSetViewportFactor = 0.4;
		var itemSetDelay          = 10;
		var itemSetReload         = false;
		var itemSetGrid           = false;
		var itemSetDelayType      = 'none';
		var preloaderActive    = $('body').hasClass('preloader-active') ? true : false;

		if (preloaderActive) {
			itemSetDelayType = 'image';
		}

		// Event widget
		var EventItemSet = document.querySelectorAll( '.widget_recent_event .recent-event' );
		imagesLoaded( EventItemSet, function() {
			for (var j = 0; j <= EventItemSet.length; j++) {
				if (typeof(EventItemSet[j]) != 'undefined' && EventItemSet[j] != null){

					var EventItem    = Array.prototype.slice.call( EventItemSet[j].querySelectorAll( '.post' ) );

					if (EventItem.length) {

						new AnimOnScroll( EventItemSet[j], {
							minDelay : itemSetMinDelay,
							maxDelay : itemSetMaxDelay,
							viewportFactor:itemSetViewportFactor,
							delay:itemSetDelay,
							reload:itemSetReload,
							grid:itemSetGrid,
							delayType:itemSetDelayType,
							items:EventItem
						} );

					}
				}
			}
		});

		// RPostsm widget
		var RPostsItemSet = document.querySelectorAll( '.widget_et_recent_entries ul' );
		imagesLoaded( RPostsItemSet, function() {
			for (var i = 0; i <= RPostsItemSet.length; i++) {
				if (typeof(RPostsItemSet[i]) != 'undefined' && RPostsItemSet[i] != null){

					var RPostsItem    = Array.prototype.slice.call( RPostsItemSet[i].querySelectorAll( 'li' ) );

					if (RPostsItem.length) {

					  	new AnimOnScroll( RPostsItemSet[i], {
							minDelay : itemSetMinDelay,
							maxDelay : itemSetMaxDelay,
							viewportFactor:itemSetViewportFactor,
							delay:itemSetDelay,
							reload:itemSetReload,
							grid:itemSetGrid,
							delayType:itemSetDelayType,
							items:RPostsItem
						} );
					}
				}
			}
		});

		// Instagramm widget
		var InstagramItemSet = document.querySelectorAll( '.instagram-pics' );
		imagesLoaded( InstagramItemSet, function() {
			for (var i = 0; i <= InstagramItemSet.length; i++) {
				if (typeof(InstagramItemSet[i]) != 'undefined' && InstagramItemSet[i] != null){

					var InstagramItem    = Array.prototype.slice.call( InstagramItemSet[i].querySelectorAll( 'li' ) );

					if (InstagramItem.length) {

					  	new AnimOnScroll( InstagramItemSet[i], {
							minDelay : itemSetMinDelay,
							maxDelay : itemSetMaxDelay,
							viewportFactor:itemSetViewportFactor,
							delay:itemSetDelay,
							reload:itemSetReload,
							grid:itemSetGrid,
							delayType:itemSetDelayType,
							items:InstagramItem
						} );
					}
				}
			}
		});
		
		// Flickrm widget
		var FlickrItemSet = document.querySelectorAll( '.photos_from_flickr' );
		imagesLoaded( FlickrItemSet, function() {
			for (var j = 0; j <= FlickrItemSet.length; j++) {
				if (typeof(FlickrItemSet[j]) != 'undefined' && FlickrItemSet[j] != null){

					var FlickrItem    = Array.prototype.slice.call( FlickrItemSet[j].querySelectorAll( '.flickr_badge_image' ) );

					if (FlickrItem.length) {

						new AnimOnScroll( FlickrItemSet[j], {
							minDelay : itemSetMinDelay,
							maxDelay : itemSetMaxDelay,
							viewportFactor:itemSetViewportFactor,
							delay:itemSetDelay,
							reload:itemSetReload,
							grid:itemSetGrid,
							delayType:itemSetDelayType,
							items:FlickrItem
						} );

					}
				}
			}
		});

		// ProductListItem
		var ProductListItemSet = document.querySelectorAll( '.product_list_widget' );
        imagesLoaded( ProductListItemSet, function() {
	        for (var i = 0; i <= ProductListItemSet.length; i++) {
	            if (typeof(ProductListItemSet[i]) != 'undefined' && ProductListItemSet[i] != null){

	                var ProductListItem    = Array.prototype.slice.call( ProductListItemSet[i].querySelectorAll( 'li' ) );

	                if (ProductListItem) {

		                new AnimOnScroll( ProductListItemSet[i], {
		                    minDelay : itemSetMinDelay,
		                    maxDelay : itemSetMaxDelay,
		                    viewportFactor:itemSetViewportFactor,
		                    delay:itemSetDelay,
		                    reload:itemSetReload,
		                    grid:itemSetGrid,
		                    delayType:itemSetDelayType,
		                    items:ProductListItem
		                } );

	                }
	            }
	        }
        });

		// Single post page
		imagesLoaded( $('.single-post-page > .post > .post-inner'), function() {
	        $('.single-post-page > .post > .post-inner > .post-media').one('inview', function(event, isInView) {
				if (isInView) {
					$(this).toggleClass('animate');
				} else {
					$(this).toggleClass('animate');
				}
			});
			$('.single-post-page > .post > .post-inner img[class*="wp-image"]').one('inview', function(event, isInView) {
				if (isInView) {
					$(this).toggleClass('animate');
				} else {
					$(this).toggleClass('animate');
				}
			});
			$('.single-post-page > .post > .post-inner .gallery').one('inview', function(event, isInView) {
				if (isInView) {
					$(this).toggleClass('animate');
				} else {
					$(this).toggleClass('animate');
				}
			});
        });

	})(jQuery);

/* Material
---------------*/

	function materialButton(){
		var ink, d, x, y;

		jQuery(".material").on('click',function(e){

			var jQuerythis = jQuery(this);
		    
			if(jQuerythis.find(".et-ink").length === 0){
		        jQuerythis.prepend("<span class='et-ink'></span>");
		    }

		    ink = jQuerythis.find(".et-ink");
		    ink.removeClass("click");
		     
		    if(!ink.height() && !ink.width()){
		        d = Math.max(jQuerythis.outerWidth(), jQuerythis.outerHeight());
		        ink.css({height: d, width: d});
		    }
		     
		    x = e.pageX - jQuerythis.offset().left - ink.width()/2;
		    y = e.pageY - jQuerythis.offset().top - ink.height()/2;
		     
		    ink.css({top: y+'px', left: x+'px'}).addClass("click");
		});
	}

	materialButton();

	function scaleButton(){
		jQuery(".et-button.hover-scale").each(function(e){
			var jQuerythis = jQuery(this);
		    var hover      = jQuerythis.find(".hover");
	        var d = Math.max(jQuerythis.outerWidth(), jQuerythis.outerHeight());
	        hover.css({'height': d*1.2, 'width': d*1.2});
		});
	}

	scaleButton();

/* Click smooth
---------------*/

	(function($){

		"use strict";

		var offset = 0;

		var header 	     = $('.desk.sticky-true');
		var stickyHeight = header.data('stickyheight');

		if (typeof(header) != 'undefined' && header != null){
			offset = stickyHeight;
		}

		if (header.hasClass('menu-under-logo-true')) {
			offset = 40;
		}

		if (header.hasClass('menu-under-logo-boxed-true')) {
			offset = 50;
		}
		
		$('.click-smooth').bind('click.smoothscroll', function (event) {
			event.preventDefault();
			var target = this.hash;
			$('html, body').stop().animate({
			    'scrollTop': $(target).offset().top
			}, 800, function () {
			    window.location.hash = target;
			});
		});

	})(jQuery);

/* Carousel
---------------*/

	(function($){

		"use strict";

		$('.owl-carousel').each(function(){

			var $this           = $(this);
			var	$thisColumns    =  $this.data('columns');
			var rtl             = ($('body').hasClass('rtl')) ? true : false;

			var columnsTabPort = ($thisColumns < 2) ? 1 : 2;
			var columnsTabLand = ($thisColumns <= 4) ? $thisColumns : ($thisColumns == 5 || $thisColumns == 6 || $thisColumns == 7 || $thisColumns == 9) ? 3 : 4;
			var columnsMob = 1;
			var dots 	   = false;
			var autoplay 	= false;

			if ($this.hasClass('et-instagram-pics')) {
				columnsTabPort = ($thisColumns < 2) ? 1 : $thisColumns;
				columnsMob = ($thisColumns < 2) ? 1 : 3;
			}

			if ($this.hasClass('loop-testimonial') || $this.hasClass('loop-carousel')) {
				dots = true;
			}

			if ($this.parent().hasClass('autoplay-true')) {
				autoplay = true;
			}

			imagesLoaded($this,function(){
				$this.owlCarousel({
					items:$thisColumns,
				    nav:true,
				    navText:[],
				    dots:dots,
				    autoplay:autoplay,
				    animateOut:false,
				    animateIn:false,
				    autoHeight: true,
				    rtl:rtl,
				    responsive:{
				    	320 : {items:1},
				    	480 : {items:columnsMob},
				    	768 : {items:columnsTabPort},
				    	1024 : {items:columnsTabLand},
				    	1280 : {items:$thisColumns}
				    },
				    responsiveRefreshRate:200,
				    responsiveBaseElement:window
				});
			});

		});

	})(jQuery);

/* Overlay-move
---------------*/

	(function($){
		"use strict";

		$('.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );
	})(jQuery);

/* Lightbox
---------------*/

	(function($){

		"use strict";

		var imagesWithLinks = $('a[href$=".gif"], a[href$=".jpg"], a[href$=".jpeg"], a[href$=".png"], a[href$=".bmp"]');
		imagesWithLinks.each(function(){

			if ($(this).has('img') && !$(this).hasClass('photoswip-event') && !$(this).hasClass('social-share') && !$(this).hasClass('photoswip-product') && !$(this).hasClass('photoswip-gallery')) {
				$(this).nivoLightbox({
					effect: 'fadeScale',
				    theme: 'default', 
				    keyboardNav: true, 
				    clickOverlayToClose: true, 
				    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
				});
			}
			
		});

		$('.gallery').each(function(){
			var $this = $(this);

			$this.find('.gallery-item').each(function(){
				var captionText = $(this).find('.wp-caption-text').text();
				var galleryImageWithLink = $(this).find('a[href$=".gif"], a[href$=".jpg"], a[href$=".jpeg"], a[href$=".png"], a[href$=".bmp"]');

				if (galleryImageWithLink.has('img')) {
					galleryImageWithLink
					.attr("title",captionText)
					.attr("data-lightbox-gallery","gallery")
					.nivoLightbox({
						effect: 'fadeScale',
					    theme: 'default', 
					    keyboardNav: true, 
					    clickOverlayToClose: true, 
					    errorMessage: 'The requested content cannot be loaded. Please try again later.',
					    afterShowLightbox: function(lightbox){
					    	$('.nivo-lightbox-open')
							.on('swipeleft', function(){
								$('.nivo-lightbox-next').trigger( "click" );
							})
							.on('swiperight', function(){
								$('.nivo-lightbox-prev').trigger( "click" );
							});
					    }
					});
				}
			});
			
		});

		$('a.single-image-link').nivoLightbox({
			effect: 'fadeScale',
		    theme: 'default', 
		    keyboardNav: true, 
		    clickOverlayToClose: true, 
		    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
		});

		$('a[data-lightbox-gallery="image-slider"]').nivoLightbox({
			effect: 'fadeScale',
		    theme: 'default', 
		    keyboardNav: true, 
		    clickOverlayToClose: true, 
		    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
		});

		$('a.video-modal').nivoLightbox({
			effect: 'fadeScale',
		    theme: 'default', 
		    keyboardNav: true, 
		    clickOverlayToClose: true, 
		    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
		});

		$('a.et-button.modal-true').nivoLightbox({
			effect: 'fadeScale',
		    theme: 'default', 
		    keyboardNav: true, 
		    clickOverlayToClose: true, 
		    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
		});

		$('a.et-button-3d.modal-true').nivoLightbox({
			effect: 'fadeScale',
		    theme: 'default', 
		    keyboardNav: true, 
		    clickOverlayToClose: true, 
		    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
		});

		$('a[data-modal="true"]').nivoLightbox({
			effect: 'fadeScale',
		    theme: 'default', 
		    keyboardNav: true, 
		    clickOverlayToClose: true, 
		    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
		});

	})(jQuery);

/* Photoswip event
---------------*/

	(function($){

		"use strict";

		var PhotoSwipe = window.PhotoSwipe,
			PhotoSwipeUI_Default = window.PhotoSwipeUI_Default;

		$('body').on('click', '.photoswip-event[data-size]', function(e) {
			if( !PhotoSwipe || !PhotoSwipeUI_Default ) {
				return;
			}

			e.preventDefault();
			openPhotoSwipe( this );
		});

		var parseThumbnailElements = function(gallery, el) {
			var elements = $(gallery).find('.photoswip-event[data-size]').has('img'),
				galleryItems = [],
				index;

			elements.each(function(i) {
				var $el = $(this),
					size = $el.data('size').split('x'),
					caption;
				
				caption = $el.attr('title');

				galleryItems.push({
					src: $el.attr('href'),
					w: parseInt(size[0], 10),
					h: parseInt(size[1], 10),
					title: caption,
					msrc: $el.find('img').attr('src'),
					el: $el
				});
				if( el === $el.get(0) ) {
					index = i;
				}
			});

			return [galleryItems, parseInt(index, 10)];
		};

		var openPhotoSwipe = function( element, disableAnimation ) {
			var pswpElement = $('.pswp').get(0),
				galleryElement = $(element).parents('.event-gallery').first(),
				gallery,
				options,
				items, index;

			items = parseThumbnailElements(galleryElement, element);
			index = items[1];
			items = items[0];

			options = {
				index: index,
				getThumbBoundsFn: function(index) {
					var image = items[index].el.find('img'),
						offset = image.offset();

					return {x:offset.left, y:offset.top, w:image.width()};
				},
				showHideOpacity: true,
				history: false,
			};

			if(disableAnimation) {
				options.showAnimationDuration = 0;
			}

			// Pass data to PhotoSwipe and initialize it
			gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
			gallery.init();
		};

	})(jQuery);

/* Photoswip product
---------------*/

	(function($){

		"use strict";

		var PhotoSwipe = window.PhotoSwipe,
			PhotoSwipeUI_Default = window.PhotoSwipeUI_Default;

		$('body').on('click', '.photoswip-product[data-size]', function(e) {
			if( !PhotoSwipe || !PhotoSwipeUI_Default ) {
				return;
			}

			e.preventDefault();
			openPhotoSwipe( this );
		});

		var parseThumbnailElements = function(gallery, el) {
			var elements = $(gallery).find('.photoswip-product[data-size]').has('img'),
				galleryItems = [],
				index;

			elements.each(function(i) {
				var $el = $(this),
					size = $el.data('size').split('x'),
					caption;
				
				caption = $el.attr('title');

				galleryItems.push({
					src: $el.attr('href'),
					w: parseInt(size[0], 10),
					h: parseInt(size[1], 10),
					title: caption,
					msrc: $el.find('img').attr('src'),
					el: $el
				});
				if( el === $el.get(0) ) {
					index = i;
				}
			});

			return [galleryItems, parseInt(index, 10)];
		};

		var openPhotoSwipe = function( element, disableAnimation ) {
			var pswpElement = $('.pswp').get(0),
				galleryElement = $(element).parents('#product-gallery-set').first(),
				gallery,
				options,
				items, index;

			items = parseThumbnailElements(galleryElement, element);
			index = items[1];
			items = items[0];

			options = {
				index: index,
				getThumbBoundsFn: function(index) {
					var image = items[index].el.find('img'),
						offset = image.offset();

					return {x:offset.left, y:offset.top, w:image.width()};
				},
				showHideOpacity: true,
				history: false,
			};

			if(disableAnimation) {
				options.showAnimationDuration = 0;
			}

			// Pass data to PhotoSwipe and initialize it
			gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
			gallery.init();
			gallery.listen('beforeChange', function() {

				$('.pswp__button--arrow--right').on('click',function(){
					$('#product-gallery-set').find('.slick-next').trigger('click');
				});	

				$('.pswp__button--arrow--left').on('click',function(){
					$('#product-gallery-set').find('.slick-prev').trigger('click');
				});

				$('.pswp__container')
				.on('swipeleft', function(){
					$('#product-gallery-set').find('.slick-next').trigger('click');
				})
				.on('swiperight', function(){
					$('#product-gallery-set').find('.slick-prev').trigger('click');
				});

				
			});
		};

	})(jQuery);

/* Recent posts
---------------*/

	(function($){

		"use strict";

		var blogLayout         = $('.recent-posts');
		var blogMinDelay       = 100;
		var blogMaxDelay       = 300;
		var blogViewportFactor = 0.4;
		var blogReload         = false;
		var blogItemSelector   = '.et-item';
		var blogGridSizer      = '.grid-sizer';
		var preloaderActive    = $('body').hasClass('preloader-active') ? true : false;

		var blogItemSet = document.querySelectorAll( '.recent-posts' );
		for (var j = 0; j <= blogItemSet.length; j++) {
			if (typeof(blogItemSet[j]) != 'undefined' && blogItemSet[j] != null){

				if (!blogItemSet[j].classList.contains('owl-carousel') && !blogItemSet[j].classList.contains('simple')) {

					var blogDelayType = 'both';
					var blogDelay     = 50;
					var blogGrid      = true;
					var blogItems    = Array.prototype.slice.call( blogItemSet[j].querySelectorAll( '.recent-posts > .post > .post-inner' ) );

					if (blogItemSet[j].classList.contains('effect-none')) {
						blogDelayType = (preloaderActive == true) ? 'image' : "none";
					} else {
						blogDelayType = (preloaderActive == true) ? 'both' : "grid";
					}

					if (blogItemSet[j].classList.contains('list')) {
						blogDelay    = 0;
						blogGrid     = false;
					}

					if (blogItems.length) {

						new AnimOnScroll( blogItemSet[j], {
							items:blogItems,
							minDelay : blogMinDelay,
							maxDelay : blogMaxDelay,
							viewportFactor:blogViewportFactor,
							delay:blogDelay,
							reload:blogReload,
							grid:blogGrid,
							itemSelector:blogItemSelector,
							delayType:blogDelayType,
							gridSizer:blogGridSizer,
						} );

					}

				}
			}
		}

	})(jQuery);

/* Recent events
---------------*/

	(function($){

		"use strict";

		var eventMinDelay       = 100;
		var eventMaxDelay       = 300;
		var eventViewportFactor = 0.4;
		var eventReload         = false;
		var eventItemSelector   = '.et-item';
		var eventGridSizer      = '.grid-sizer';
		var preloaderActive       = $('body').hasClass('preloader-active') ? true : false;

		$('.recent-events-layout.gridify.filter-true').each(function(){

			var $this = $(this);
			$this.imagesLoaded( function() {

				var $grid = $this.find('.recent-events').isotope({
					itemSelector: '.event',
					sizer:'.grid-sizer'
				});

				$this.find('.event-filter .filter').on( 'click', function() {
					var $filter  = $(this),
						filterValue = $filter.attr('data-filter'),
						isActive = $filter.hasClass( 'active' );

					if ( !isActive ) {
						$grid.isotope({ filter:'.'+filterValue });
						$this.find('.event-filter .active').removeClass('active');
						$filter.toggleClass('active');
					}
				});
			
			});

		});

		var eventItemSet = document.querySelectorAll( '.recent-events.gridify.filter-false' );
		for (var j = 0; j <= eventItemSet.length; j++) {
			if (typeof(eventItemSet[j]) != 'undefined' && eventItemSet[j] != null){

				if (!eventItemSet[j].classList.contains('owl-carousel')) {	

					var eventItems     = Array.prototype.slice.call( eventItemSet[j].querySelectorAll( '.recent-events.gridify.filter-false > .post > .post-inner' ) );
					var eventDelay     = 50;
					var eventGrid      = true;
					var eventDelayType = 'both';

					if (eventItemSet[j].classList.contains('effect-none')) {
						eventDelayType = (preloaderActive == true) ? 'image' : "none";
					} else {
						eventDelayType = (preloaderActive == true) ? 'both' : "grid";
					}

					if (eventItems.length) {

						new AnimOnScroll( eventItemSet[j], {
							items:eventItems,
							minDelay : eventMinDelay,
							maxDelay : eventMaxDelay,
							viewportFactor:eventViewportFactor,
							delay:eventDelay,
							reload:eventReload,
							grid:eventGrid,
							itemSelector:eventItemSelector,
							delayType:eventDelayType,
						} );

					}
				}
			}
		}

	})(jQuery);

/* Recent products
---------------*/

	(function($){

		"use strict";

		var productMinDelay       = 100;
		var productMaxDelay       = 300;
		var productViewportFactor = 0.4;
		var productReload         = false;
		var productItemSelector   = '.et-item';
		var preloaderActive       = $('body').hasClass('preloader-active') ? true : false;

		$('.recent-products-layout.gridify.filter-true').each(function(){

			var $this = $(this);
			$this.imagesLoaded( function() {

				var $grid = $this.find('.loop-product').isotope({
					itemSelector: '.product',
					sizer:'.grid-sizer'
				});

				$this.find('.product-filter .filter').on( 'click', function() {
					var $filter  = $(this),
						filterValue = $filter.attr('data-filter'),
						isActive = $filter.hasClass( 'active' );

					if ( !isActive ) {
						$grid.isotope({ filter:'.'+filterValue });
						$this.find('.product-filter .active').removeClass('active');
						$filter.toggleClass('active');
					}
				});
			
			});

		});

		var productItemSet = document.querySelectorAll( '.woocoomerce-product-shortcode.gridify.filter-false' );
		for (var j = 0; j <= productItemSet.length; j++) {
			if (typeof(productItemSet[j]) != 'undefined' && productItemSet[j] != null){

				if (!productItemSet[j].classList.contains('owl-carousel')) {	
				
					var productDelay          = 50;
					var productGrid           = true;
					var productDelayType      = 'both';
					var productItems    = Array.prototype.slice.call( productItemSet[j].querySelectorAll( '.woocoomerce-product-shortcode.gridify.filter-false > .post > .post-inner' ) );

					if (productItemSet[j].classList.contains('effect-none')) {
						productDelayType = (preloaderActive == true) ? 'image' : "none";
					} else {
						productDelayType = (preloaderActive == true) ? 'both' : "grid";
					}

					if (productItems.length) {

						new AnimOnScroll( productItemSet[j], {
							items:productItems,
							minDelay : productMinDelay,
							maxDelay : productMaxDelay,
							viewportFactor:productViewportFactor,
							delay:productDelay,
							reload:productReload,
							grid:productGrid,
							itemSelector:productItemSelector,
							delayType:productDelayType,
						} );

					}

				}
			}
		}

		$('.custom-product-shortcode').one('inview', function(event, isInView) {
			if (isInView) {
				$(this).toggleClass('animate');
			} else {
				$(this).toggleClass('animate');
			}
		});

		$('.custom-product-shortcode').each(function(){

				var $this = $(this);
				var addToCard = $this.find('.ajax_add_to_cart');
				var productProgress = $this.find('.ajax-add-to-cart-loading');
				var addToCardEvent  = true;

				if (addToCard.hasClass('added')) {
					addToCardEvent  = false;
				}

				if (addToCard.attr('data-product_status') == 'outofstock') {
					addToCardEvent  = false;
				}

				if (addToCard.attr('data-product_type') == 'variable') {
					addToCardEvent  = false;
				}

				if (addToCardEvent == true) {
					addToCard.on('click',function(){
						var $self = $(this);
						productProgress.fadeIn(400,function(){
							setTimeout(function(){
								productProgress.find('.circle-loader').addClass('load-complete');
								setTimeout(function(){
									productProgress.fadeOut(400);
									addToCardEvent  = false;
								}, 500);
							}, 1500);
						});
						
					});
				}
			});

		$('.custom-product-shortcode.overlay-none').each(function(){
			var $this              = $(this),
				$thisImgGallery    = $this.find('.product-image-gallery'),
				$thisFirstImg      = $thisImgGallery.find('.image-container'),
				$images            = $thisImgGallery.children('img');

			var length = $images.length + 1,
				i      = 1,
				timer  = '';

			if (length > 1) {

				$thisImgGallery.hover(
					function(){
						timer  = setInterval(function(){
							$thisImgGallery.children().eq(i)
							.addClass('visible')
							.siblings()
							.removeClass('visible');
							i++;
							if (i == length) {
								$thisFirstImg
								.addClass('visible')
								.siblings()
								.removeClass('visible');
								i = 1;
							}
						},700);
					},
					function(){
						clearInterval(timer);
						$thisFirstImg
						.addClass('visible')
						.siblings()
						.removeClass('visible');
						i = 1;
					}
				);

			}

		});

		$('.woocoomerce-product-shortcode.overlay-none .product').each(function(){
			var $this              = $(this),
				$thisImgGallery    = $this.find('.product-image-gallery'),
				$thisFirstImg      = $thisImgGallery.find('.image-container'),
				$images            = $thisImgGallery.children('img');

			var length = $images.length + 1,
				i      = 1,
				timer  = '';

			if (length > 1) {

				$thisImgGallery.hover(
					function(){
						timer  = setInterval(function(){
							$thisImgGallery.children().eq(i)
							.addClass('visible')
							.siblings()
							.removeClass('visible');
							i++;
							if (i == length) {
								$thisFirstImg
								.addClass('visible')
								.siblings()
								.removeClass('visible');
								i = 1;
							}
						},700);
					},
					function(){
						clearInterval(timer);
						$thisFirstImg
						.addClass('visible')
						.siblings()
						.removeClass('visible');
						i = 1;
					}
				);

			}

		});

	})(jQuery);

/* Recent menus
---------------*/

	(function($){

		"use strict";

		var menuMinDelay       = 100;
		var menuMaxDelay       = 300;
		var menuViewportFactor = 0.4;
		var menuReload         = false;
		var menuItemSelector   = '.et-item';
		var menuGridSizer      = '.grid-sizer';
		var preloaderActive       = $('body').hasClass('preloader-active') ? true : false;

		$('.recent-menus-layout.gridify.filter-true').each(function(){

			var $this         = $(this);
			var defaultFilter = $this.attr('data-default-filter');

			$this.imagesLoaded( function() {

				var $grid = $this.find('.recent-menus').isotope({
					itemSelector: '.menu',
					filter:'.'+defaultFilter,
					masonry:{columnWidth:menuGridSizer}
				});

				$this.find('.menu-filter .filter').on( 'click', function() {
					var $filter  = $(this),
						filterValue = $filter.attr('data-filter'),
						isActive = $filter.hasClass( 'active' );

					if ( !isActive ) {
						$grid.isotope({ filter:'.'+filterValue });
						$this.find('.menu-filter .active').removeClass('active');
						$filter.toggleClass('active');
					}
				});
			
			});

		});

		var menuItemSet = document.querySelectorAll( '.recent-menus.gridify.filter-false' );
		for (var j = 0; j <= menuItemSet.length; j++) {
			if (typeof(menuItemSet[j]) != 'undefined' && menuItemSet[j] != null){

				if (!menuItemSet[j].classList.contains('owl-carousel')) {	

					var menuItems     = Array.prototype.slice.call( menuItemSet[j].querySelectorAll( '.recent-menus.gridify.filter-false > .post > .post-inner' ) );
					var menuDelay     = 50;
					var menuGrid      = true;
					var menuDelayType = 'both';

					if (menuItemSet[j].classList.contains('effect-none')) {
						menuDelayType = (preloaderActive == true) ? 'image' : "none";
					} else {
						menuDelayType = (preloaderActive == true) ? 'both' : "grid";
					}

					if (menuItems.length) {

						new AnimOnScroll( menuItemSet[j], {
							items:menuItems,
							minDelay : menuMinDelay,
							maxDelay : menuMaxDelay,
							viewportFactor:menuViewportFactor,
							delay:menuDelay,
							reload:menuReload,
							grid:menuGrid,
							gridSizer:menuGridSizer,
							itemSelector:menuItemSelector,
							delayType:menuDelayType,
						} );

					}
				}
			}
		}

	})(jQuery);

/* Popup
---------------*/

	(function($){

		"use strict";

		$('.et-popup').each(function(){

			var $this 	     = $(this);
			var animationIn  =  $this.data('in');
			var animationOut =  $this.data('out');
			var width 	 	 =  $this.data('width');
			var position 	 =  $this.data('position');
			var color    	 =  $this.data('popup');

			if (0 === color.length) {color == '#212121';}

			$this.tipso({
			    background      : color,
			    color           : '#ffffff',
			    animationIn     : animationIn,
  				animationOut    : animationOut,
			    width           : width,
			    useTitle        : false,
			    position        : position,
			    speed             : 400,        
				showArrow         : false,
				delay             : 200,
				hideDelay         : 0,
				offsetX           : 0,
				offsetY           : 0,
				tooltipHover      : true,
			});
			
		});

	})(jQuery);

/* Alert
---------------*/

	(function($){

		"use strict";

		$('.alert').each(function(){
			var $this = $(this);
			$this.find('.close-alert').on('click', function(){
				$this.fadeOut(200);
			})
		});

	})(jQuery);

/* Signature
---------------*/

	(function($){

		"use strict";

		$('.et-signature').each(function(){
			var $this = $(this);
			$this.one('inview', function(event, isInView) {
				if (isInView) {
					$(this).toggleClass('animate');
				} else {
					$(this).toggleClass('animate');
				}
			});
		});

	})(jQuery);

/* Accordion
---------------*/

	(function($){

		"use strict";

		$('.et-accordion').each(function(){
			var $this = $(this),
				title = $this.find('.toggle-title'),
				content =  $this.find('.toggle-content');

				if($this.hasClass('collapsible-true')){
					$this.find('.active:not(:first)').removeClass("active");
				}

				content.hide();

				$this.find('.toggle-title.active').next().show();

				title.on('click', function(){

					var $self = $(this);
					var $selfContent = $self.next();
			
					if($this.hasClass('collapsible-true')){

						if(!$self.hasClass('active')){

							$self.addClass("active").siblings().removeClass("active");
							content.slideUp(300);
							$selfContent.slideDown(300);
						}

					} else {

						if(!$self.hasClass('active')){

							$self.addClass("active");
							$selfContent.stop().slideDown(300);

						} else {

							$self.removeClass("active");
							$selfContent.stop().slideUp(300);

						}

					}

				});

		});

	})(jQuery);

/* Tabs
---------------*/
	
	(function($){

		"use strict";

		$('.et-tab').each(function(){

			var $this    = $(this),
				tabs     = $this.find('.tab'),
				tabsQ    = tabs.length,
				tabsDefaultWidth  = 0,
				tabsDefaultHeight = 0,
				tabsContent = $this.find('.tab-content');

			tabs.wrapAll('<div class="tabset et-clearfix"></div>');
			tabsContent.wrapAll('<div class="tabs-container et-clearfix"></div>');

			var tabSet = $this.find('.tabset');

				if(!tabs.hasClass('active')){
					tabs.first().addClass('active');
				}
				
				tabs.each(function(){

					var $thiz = $(this);

					if ($thiz.hasClass('active')) {
						$thiz.siblings()
						.removeClass("active");
						tabsContent.hide(0);
						tabsContent.eq($thiz.index()).show(0);
					}

					tabsDefaultWidth += $(this).outerWidth();
					tabsDefaultHeight += $(this).outerHeight();
				});

				function OverflowCorrection(){

					if(tabsDefaultWidth >= $this.outerWidth()  && $this.hasClass('horizontal')){
						$this.addClass('tab-full');
					} else {
						$this.removeClass('tab-full');
					}

				}

				if(tabsQ >= 2){

					tabs.on('click', function(){
						var $self = $(this);
						
						if(!$self.hasClass("active")){

							$self.addClass("active");

							$self.siblings()
							.removeClass("active");

							tabsContent.hide(0);
							tabsContent.eq($self.index()).show(0);
						}
						
					});
				}

				OverflowCorrection();

				$(window).resize(OverflowCorrection);			

		});

	})(jQuery);

/* Gallery
---------------*/

	(function($){

		"use strict";

		$('.plain-gallery.gallery-type-grid.effect-type-sequential').each(function(){

			var $this = $(this);

			$this.imagesLoaded(function(){
				$this.masonry({
				  itemSelector: '.et-item',
				});
			});

			$this.inViewSequential();

		});

		var galleryMinDelay       = 100;
		var galleryMaxDelay       = 300;
		var galleryViewportFactor = 0.4;
		var galleryDelay          = 50;
		var galleryReload         = false;
		var galleryGrid           = true;
		var galleryItemSelector   = '.et-item';

		var galleryItemSet = document.querySelectorAll( '.plain-gallery.gallery-type-grid.effect-type-random' );
		for (var j = 0; j <= galleryItemSet.length; j++) {
			if (typeof(galleryItemSet[j]) != 'undefined' && galleryItemSet[j] != null){

				var galleryDelayType = 'both';

				if (galleryItemSet[j].classList.contains('effect-none')) {
					galleryDelayType = 'none';
				}
				
				var galleryItems    = Array.prototype.slice.call( galleryItemSet[j].querySelectorAll( '.plain-gallery.gallery-type-grid.effect-type-random > .et-item > .et-item-inner' ) );

				if (galleryItems.length) {

					new AnimOnScroll( galleryItemSet[j], {
						items:galleryItems,
						minDelay : galleryMinDelay,
						maxDelay : galleryMaxDelay,
						viewportFactor:galleryViewportFactor,
						delay:galleryDelay,
						reload:galleryReload,
						grid:galleryGrid,
						itemSelector:galleryItemSelector,
						delayType:galleryDelayType,
					} );

				}
			}
		}

	})(jQuery);

/* Default gallery
---------------*/

	(function($){

		"use strict";

		$('.gallery').each(function(){

			var $this = $(this);
			var items = $this.find('.gallery-item');
			var i = 0;
			var timer;

			if (!$this.parents('.menu-item-type-yawp_wim')) {
				$this.imagesLoaded(function(){
					$this.masonry({
					  itemSelector: '.gallery-item',
					});
				});
			}

		});

	})(jQuery);

/* Instagram
---------------*/

	(function($){

		"use strict";

		$('.et-instagram-feed.grid.effect-type-sequential').each(function(){

			var $this = $(this);

			$this.imagesLoaded(function(){
				$this.masonry({
				  itemSelector: '.et-item',
				});
			});

			$this.inViewSequential();

		});

		var instagramMinDelay       = 100;
		var instagramMaxDelay       = 300;
		var instagramViewportFactor = 0.4;
		var instagramDelay          = 50;
		var instagramReload         = false;
		var instagramGrid           = true;
		var instagramItemSelector   = '.et-item';

		var instagramItemSet = document.querySelectorAll( '.et-instagram-feed.grid.effect-type-random' );
		for (var j = 0; j <= instagramItemSet.length; j++) {
			if (typeof(instagramItemSet[j]) != 'undefined' && instagramItemSet[j] != null){

				var instagramDelayType = 'both';

				if (instagramItemSet[j].classList.contains('effect-none')) {
					instagramDelayType = 'none';
				}
				
				var instagramItems    = Array.prototype.slice.call( instagramItemSet[j].querySelectorAll( '.et-instagram-feed.grid.effect-type-random > .et-item > .et-item-inner' ) );

				if (instagramItems.length) {

					new AnimOnScroll( instagramItemSet[j], {
						items:instagramItems,
						minDelay : instagramMinDelay,
						maxDelay : instagramMaxDelay,
						viewportFactor:instagramViewportFactor,
						delay:instagramDelay,
						reload:instagramReload,
						grid:instagramGrid,
						itemSelector:instagramItemSelector,
						delayType:instagramDelayType,
					} );

				}
			}
		}

	})(jQuery);

/* Image slider
---------------*/

	(function($){

		"use strict";

		$('.et-image-slider.thumbnail-true').each(function(){

			var $this = $(this);
			var imageSliderSlides    = $this.find('.image-slider-slides');
			var columns              = $this.data('columns');
			var sliderNavigation     = '#'+imageSliderSlides.attr('id');
			var imageSliderThumbnail = $this.find('.image-slider-thumbnail');
			var thumbnailsNavigation = '#'+imageSliderThumbnail.attr('id');

			imageSliderSlides.slick({
				asNavFor: thumbnailsNavigation,
				slidesToShow: columns,
				slidesToScroll: 1,
				arrows: true,
				dots: false,

			});

			imageSliderThumbnail.slick({
				asNavFor: sliderNavigation,
				slidesToShow: 5,
				slidesToScroll: 1,
				dots: false,
				arrows: false,
				centerMode: false,
				focusOnSelect: true
			});


		});

		$('.et-image-slider[data-columns="1"]').each(function(){

			var $this = $(this);
			
			imagesLoaded($this, function() {
		        $this.one('inview', function(event, isInView) {
					if (isInView) {
						$(this).toggleClass('active');
					} else {
						$(this).toggleClass('active');
					}
				});
	        });

		});

		

	})(jQuery);

/* Counter
---------------*/

	(function($){

		"use strict";

		$('.et-counter').each(function(){

			var $this   = $(this);
			var $thisTo = $this.data('to');

		    $this.one('inview', function(event, isInView, visiblePartX, visiblePartY){
		    	if (isInView) {
		    		setTimeout(function(){
		    			$this.addClass('animate');
			    		$this.find('.counter').countTo({
						    from: 0,
						    to: $thisTo,
						    speed: 2000,
						    refreshInterval: 30
						});
		    		},250);
		    	};
		    });

		});

	})(jQuery);

/* Progress
---------------*/

	(function($){

		"use strict";

		$('.et-progress').each(function(){

			var $this 	   = $(this);
			var bar   	   = $this.find('.bar');
			var percentage = bar.data('percentage');
			var percent    = $this.find('.percent');


			$this.one('inview', function(event, isInView, visiblePartX, visiblePartY){
		    	if (isInView) {
		    		setTimeout(function(){

						bar.addClass('visible')
						.animate({width: percentage+'%'}, 2000, 'easeOutExpo');

						percent.addClass('visible')
						.countTo({
						    from: 0,
						    to: percentage,
						    speed: 2000,
						    refreshInterval: 30
						});

		    		},250);
		    	};
		    });

		});

	})(jQuery);

/* Circle progress
---------------*/

	(function($){

		"use strict";

		$('.et-circle-progress').each(function(){

			var $this 	   = $(this);
			var bar   	   = $this.data('bar');
			var track      = $this.data('track');
			var percentage = $this.data('percent');
			var percent    = $this.find('.percent');

			$this.one('inview', function(event, isInView, visiblePartX, visiblePartY){
		    	if (isInView) {
		    		setTimeout(function(){

		    			$this
		    			.addClass('visible')
						.easyPieChart({
							barColor: bar,
							trackColor: (typeof track == "undefined") ? "#e0e0e0" : track,
							lineCap:'square',
							lineWidth:4,
							size:212,
							animate:'1500',
							scaleColor: false
						});

						percent.countTo({
						    from: 0,
						    to: percentage,
						    speed: 2000,
						    refreshInterval: 30
						});

		    		},250);
		    	};
		    });

		});

	})(jQuery);

/* Timer
---------------*/

	(function($){

		"use strict";

		$('.et-timer').each(function(){
			var $this        = $(this)
				$this.find('ul').countdown({
					date: $this.data('enddate'),
					offset: -8,
					day: $this.data('days'),
					days: $this.data('days'),
					hour: $this.data('hours'),
					hours: $this.data('hours'),
					minute: $this.data('minutes'),
					minutes: $this.data('minutes'),
					second: $this.data('seconds'),
					seconds: $this.data('seconds')
				});
		});

	})(jQuery);

/* Separator
---------------*/

	(function($){

		"use strict";

		$('.sep-wrap.animate').each(function(){

			var $this 	   = $(this);

			$this.one('inview', function(event, isInView, visiblePartX, visiblePartY){
		    	if (isInView) {
		    		$this.addClass('active')
		    	};
		    });

		});

	})(jQuery);

/* Person
---------------*/

    (function($){

        "use strict";

        $('.loop-person.grid.effect-type-sequential').each(function(){

            var $this = $(this);

           	$this.masonry({
              itemSelector: '.et-item',
            });

            $this.inViewSequential();

        });

        var personMinDelay       = 100;
        var personMaxDelay       = 300;
        var personViewportFactor = 0.4;
        var personDelay          = 50;
        var personReload         = false;
        var personGrid           = true;
        var personDelayType      = 'both';
        var personItemSelector   = '.et-item';

        if ($('.loop-person.grid.effect-type-random').hasClass('effect-none')) {
			personDelayType = 'none';
		}

        var personItemSet = document.querySelectorAll( '.loop-person.grid.effect-type-random' );
        for (var j = 0; j <= personItemSet.length; j++) {
            if (typeof(personItemSet[j]) != 'undefined' && personItemSet[j] != null){
                
                var personItems    = Array.prototype.slice.call( personItemSet[j].querySelectorAll( '.loop-person.grid.effect-type-random > .et-item > .et-item-inner' ) );

                if (personItems.length) {

                    new AnimOnScroll( personItemSet[j], {
                        items:personItems,
                        minDelay : personMinDelay,
                        maxDelay : personMaxDelay,
                        viewportFactor:personViewportFactor,
                        delay:personDelay,
                        reload:personReload,
                        grid:personGrid,
                        itemSelector:personItemSelector,
                        delayType:personDelayType,
                    } );

                }
            }
        }

    })(jQuery);

/* Testimonial
---------------*/

	(function($){

	    "use strict";

	    $('.loop-testimonial.grid.effect-type-sequential').each(function(){

		    var $this = $(this);

		    $this.masonry({
	          itemSelector: '.et-item',
	        });

		    $this.inViewSequential();

	    });

	    var testimonialMinDelay       = 100;
	    var testimonialMaxDelay       = 300;
	    var testimonialViewportFactor = 0.4;
	    var testimonialDelay          = 50;
	    var testimonialReload         = false;
	    var testimonialGrid           = true;
	    var testimonialDelayType      = 'both';
	    var testimonialItemSelector   = '.et-item';

	    if ($('.loop-testimonial.grid.effect-type-random').hasClass('effect-none')) {
			testimonialDelayType = 'none';
		}

	    var testimonialItemSet = document.querySelectorAll( '.loop-testimonial.grid.effect-type-random' );
	    for (var j = 0; j <= testimonialItemSet.length; j++) {
	        if (typeof(testimonialItemSet[j]) != 'undefined' && testimonialItemSet[j] != null){
	            
	            var testimonialItems    = Array.prototype.slice.call( testimonialItemSet[j].querySelectorAll( '.loop-testimonial.grid.effect-type-random > .et-item > .et-item-inner' ) );

	            if (testimonialItems.length) {

	                new AnimOnScroll( testimonialItemSet[j], {
	                    items:testimonialItems,
	                    minDelay : testimonialMinDelay,
	                    maxDelay : testimonialMaxDelay,
	                    viewportFactor:testimonialViewportFactor,
	                    delay:testimonialDelay,
	                    reload:testimonialReload,
	                    grid:testimonialGrid,
	                    itemSelector:testimonialItemSelector,
	                    delayType:testimonialDelayType,
	                } );

	            }
	        }
	    }

	})(jQuery);

/* Tweets
---------------*/

	(function($){

		$('.et-tweets').each(function(){

			var $this = $(this);

			$this.find('ul').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				dots: true,
				draggable:true,
				adaptiveHeight:true
			});
		});

	})(jQuery);

/* Client
---------------*/

    (function($){

        "use strict";

        var clientMinDelay       = 100;
        var clientMaxDelay       = 300;
        var clientViewportFactor = 0.4;
        var clientDelay          = 50;
        var clientReload         = false;
        var clientGrid           = true;
        var clientDelayType      = 'both';
        var clientItemSelector   = '.et-item';

        if ($('.loop-client.grid').hasClass('effect-none')) {
			clientDelayType = 'none';
		}

        var clientItemSet = document.querySelectorAll( '.loop-client.grid' );
        for (var j = 0; j <= clientItemSet.length; j++) {
            if (typeof(clientItemSet[j]) != 'undefined' && clientItemSet[j] != null){
                
                var clientItems    = Array.prototype.slice.call( clientItemSet[j].querySelectorAll( '.loop-client.grid > .et-item > .et-item-inner' ) );

                if (clientItems.length) {

                    new AnimOnScroll( clientItemSet[j], {
                        items:clientItems,
                        minDelay : clientMinDelay,
                        maxDelay : clientMaxDelay,
                        viewportFactor:clientViewportFactor,
                        delay:clientDelay,
                        reload:clientReload,
                        grid:clientGrid,
                        itemSelector:clientItemSelector,
                        delayType:clientDelayType,
                    } );

                }
            }
        }

    })(jQuery);

/* Gmap
---------------*/

	(function($){

		"use strict";

		var styleArray = '';

		$('.map').each(function(){

			var $this     = $(this),
				xCoord    = ($this.attr('data-x')) ? $this.data('x') : 53.385873,
				yCoord    = ($this.attr('data-y')) ? $this.data('y') : -1.471471,
				zoom      = ($this.attr('data-zoom')) ? parseInt($this.data('zoom')) : 18,
				type      = ($this.attr('data-type')) ? $this.attr('data-type') : 'roadmap',
				content   = $this.find('.map-content').html(),
				title     = $this.attr('data-title'),
				mapTypeId = "roadmap";

				$this.find('.map-content').remove();

				switch(type){
					case 'roadmap':
					case 'black':
					case 'grey':
					case 'theme':
				        mapTypeId = google.maps.MapTypeId.ROADMAP
				        break;
				    case 'satellite':
				        mapTypeId = google.maps.MapTypeId.SATELLITE
				        break;
				}

				if (type === 'black') {
					styleArray = [{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}];
				} else if(type === 'grey') {
					styleArray = [{"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#E0E0E0"},{"lightness": 17}]},{"featureType": "landscape", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"},{"lightness": 20}]},{"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#ffffff"},{"lightness": 17}]},{"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#ffffff"},{"lightness": 29},{"weight": 0.2}]},{"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#ffffff"},{"lightness": 18}]},{"featureType": "road.local", "elementType": "geometry", "stylers": [{"color": "#ffffff"},{"lightness": 16}]},{"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"},{"lightness": 21}]},{"featureType": "poi.park", "elementType": "geometry", "stylers": [{"color": "#BDBDBD"},{"lightness": 21}]},{"elementType": "labels.text.stroke", "stylers": [{"visibility": "on"},{"color": "#ffffff"},{"lightness": 16}]},{"elementType": "labels.text.fill", "stylers": [{"saturation": 36},{"color": "#212121"},{"lightness": 40}]},{"elementType": "labels.icon", "stylers": [{"visibility": "off"}]},{"featureType": "transit", "elementType": "geometry", "stylers": [{"color": "#f2f2f2"},{"lightness": 19}]},{"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"color": "#FAFAFA"},{"lightness": 20}]},{"featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{"color": "#FAFAFA"},{"lightness": 17},{"weight": 1.2}]}];
				}


				var options = {
					center     : new google.maps.LatLng(xCoord, yCoord),
					zoom       : zoom, 
					mapTypeId  : mapTypeId,
					styles     : styleArray,
					disableDefaultUI: true
				};
				
				var map    = new google.maps.Map(document.getElementById($this.attr('id')), options);

				if ($this.attr('data-marker')) {

					var marker = new google.maps.Marker({ 
						position: new google.maps.LatLng(xCoord,yCoord), 
						map: map, 
						icon: $this.attr('data-marker'),
						title: title
					});

					if (typeof($content) == 'undefined' || $content != null){

						var infowindow = new google.maps.InfoWindow({
				        	content: content,
				        	maxWidth: 284
				        });

						marker.addListener('click', function() {
				          infowindow.open(map, marker);
				        });

					}

				};

				if ($this.attr('data-animate') == "true") {
					if (marker.getAnimation() != null) {marker.setAnimation(null);} else {marker.setAnimation(google.maps.Animation.DROP);}
				};
		});

	})(jQuery);

/* Banner
---------------*/

	(function($){

		$('.et-popup-banner-wrapper').each(function(){

			var $this  = $(this);
			var	$delay = $this.data('delay');
			var cookie = $this.data('cookie');

			if (typeof($delay) == 'undefined' || $delay != null){
				$delay = 3000;
			}

			var bannerClone = $this.clone();

			$('html').append(bannerClone);

			$this.remove();

			if (typeof($.cookie(bannerClone.attr('id'))) == 'undefined') {

				setTimeout(function(){
					bannerClone.addClass('animate');

					$('.enovathemes-contact-form input[type="text"],.enovathemes-contact-form textarea').placeholder();
					$('.et-mailchimp input[type="text"]').placeholder();
					$('.et-mailchimp').each(function(){
						var form  = $(this).find('form');
						var email = form.find('#mce-EMAIL');
						form.submit(function(event){
							if (email.val() === email.attr('data-placeholder')) {
								event.preventDefault();
							}
						});
					});

				},$delay);

				bannerClone.find('.popup-banner-toggle').on('click',function(){
					bannerClone.removeClass('animate');
					if (cookie == "true") {
						$.cookie(bannerClone.attr('id'),'active',{ expires: 1,path: '/'});
					}
				});

			}

		});

	})(jQuery);

/* Content box
---------------*/

	(function($){

		"use strict";


		$('.et-content-box.effect-type-sequential').each(function(){

			var $this = $(this);

			$this.inViewSequential();

		})

		var boxMinDelay       = 100;
		var boxMaxDelay       = 300;
		var boxViewportFactor = 0.4;
		var boxDelay          = 50;
		var boxReload         = false;
		var boxGrid           = false;
		var boxDelayType      = 'both';
		var boxItemSelector   = '.et-item';

		if ($('.et-content-box.effect-type-random').hasClass('effect-none')) {
			boxDelayType = 'none';
		}

		var boxItemSet = document.querySelectorAll( '.et-content-box.effect-type-random' );
		for (var j = 0; j <= boxItemSet.length; j++) {
			if (typeof(boxItemSet[j]) != 'undefined' && boxItemSet[j] != null){
				
				var boxItems    = Array.prototype.slice.call( boxItemSet[j].querySelectorAll( '.et-content-box.effect-type-random > .et-item > .et-item-inner' ) );

				if (boxItems.length) {

					new AnimOnScroll( boxItemSet[j], {
						items:boxItems,
						minDelay : boxMinDelay,
						maxDelay : boxMaxDelay,
						viewportFactor:boxViewportFactor,
						delay:boxDelay,
						reload:boxReload,
						grid:boxGrid,
						itemSelector:boxItemSelector,
						delayType:boxDelayType,
					} );

				}
			}
		}

	})(jQuery);

/* Button
---------------*/

	(function($){

		"use strict";


		$('.et-button').each(function(){

			var $this 			   = $(this);
			var dataColor 		   = $this.data('color');
			var dataColorHov  	   = $this.data('colorhover');
			var ink, d, x, y;

			$this.hover(
				function(){
					if (typeof(dataColorHov) != 'undefined' && dataColorHov != null) {
						$this.css('color',dataColorHov);
					}
				},
				function(){
					if (typeof(dataColor) != 'undefined' && dataColor != null) {
						$this.css('color',dataColor);
					}
				}
			);

			$this.on('click',function(e){
				ink = $this.find(".et-ink");
				if (typeof(ink) != 'undefined' && ink != null) {
					ink.removeClass("click");
				    if(!ink.height() && !ink.width()){
				        d = Math.max($this.outerWidth(), $this.outerHeight());
				        ink.css({height: d, width: d});
				    }
				    x = e.pageX - $this.offset().left - ink.width()/2;
				    y = e.pageY - $this.offset().top - ink.height()/2;
				    ink.css({top: y+'px', left: x+'px'}).addClass("click");
				}
			});
		});

	})(jQuery);

/* Button 3d
---------------*/

	(function($){

		"use strict";

		$('.et-button-3d').each(function(){

			var $this 			   = $(this);
			var $thisBefore 	   = $this.find('.before');
			var dataColor 		   = $this.data('color');
			var dataColorHov  	   = $this.data('colorhover');

			$this.hover(
				function(){
					if (typeof(dataColorHov) != 'undefined' && dataColorHov != null) {
						$this.css({
							'color':dataColorHov,
							'box-shadow':'inset 0 0 0 1px '+dataColorHov
						});

						$thisBefore.css({
							'color':dataColorHov,
							'box-shadow':'inset 0 0 0 1px '+dataColorHov
						});
					}
				},
				function(){
					if (typeof(dataColor) != 'undefined' && dataColor != null) {
						$this.css({
							'color':dataColor,
							'box-shadow':'inset 0 0 0 1px '+dataColor
						});

						$thisBefore.css({
							'color':dataColor,
							'box-shadow':'inset 0 0 0 1px '+dataColor
						});
					}
				}
			);
		});

	})(jQuery);

/* Typeit
---------------*/

	(function($){

		"use strict";

		$('.et-typeit').each(function(){
			var $this = $(this);
			var strings = $this.data('strings');
			var autostart = $this.data('autostart');
			var startdelay = $this.data('startdelay');
			    strings = strings.split(",");

			var string_1 = strings[0];
			var string_2 = strings[1];
			var string_3 = strings[2];
			var string_4 = strings[3];
			var string_5 = strings[4];

			$this.find('.typeit-dynamic').typeIt({
				speed: 100,
				startDelay:startdelay,
				autoStart: autostart,
				loop:false,
				lifeLike:true
			})
			.tiType(string_1)
			.tiPause(1000)
			.tiDelete(string_1.length)
			.tiType(string_2)
			.tiPause(1000)
			.tiDelete(string_2.length)
			.tiType(string_3)
			.tiPause(1000)
			.tiDelete(string_3.length)
			.tiType(string_4)
			.tiPause(1000)
			.tiDelete(string_4.length)
			.tiType(string_5)
		});

	})(jQuery);

/* Image parallax
---------------*/

	(function($){

		"use strict";

		$('.et-custom-image[data-parallax="true"]').each(function(){
			var $this 		= $(this);
			var speed 		= $this.data('speed');
			var coordinatex = $this.data('coordinatex');
			var coordinatey = $this.data('coordinatey');

			$(window).scroll(function() {
				var yPos   = Math.round(($(window).scrollTop()-$this.offset().top) / speed)  + coordinatey;
				$this.css({
					'-webkit-transform':'translate3d('+coordinatex+'px, '+yPos+ 'px, 0px)',
					'-ms-transform':'translate3d('+coordinatex+'px, '+yPos+ 'px, 0px)',
					'-moz-transform':'translate3d('+coordinatex+'px, '+yPos+ 'px, 0px)',
					'transform':'translate3d('+coordinatex+'px, '+yPos+ 'px, 0px)'
				});    
			});
		});

		$('.et-custom-image[data-curtain="true"]').each(function(){
			var $this 		= $(this);
				$this.one('inview', function(event, isInView) {
					if (isInView) {
						$this.addClass('active');
					} else {
						$this.removeClass('active');
					}
				});
		});

	})(jQuery);

/* Row parallax
---------------*/

    (function($){

        "use strict";

        $('.vc-parallax').each(function(){
            var $this = $(this),
            plx = $this.find('.parallax-container');
            
            if ($this.hasClass('vc-video-parallax')) {
           		plx = $this.find('.video-container');
            }

            $(window).scroll(function() {
                var yPos   = Math.round(($(window).scrollTop()-plx.offset().top) / $this.data('parallax-speed'));
                plx.css({
                    '-ms-transform':'translateY('+yPos + 'px)',
                    '-webkit-transform':'translateY('+yPos + 'px)',
                    '-moz-transform':'translateY('+yPos + 'px)',
                    'transform':'translateY('+yPos + 'px)'
                });    
            });
        });

        $('.vc-fixed-bg').each(function(){

	    	var $this      = $(this), 
	    		fx         = $this.find('.fixed-container'),
	    		$secHeight = $(this).outerHeight(),			
			    $secWidth  = $(this).outerWidth(),
				fxHeight   = ($secHeight > $(window).height()) ? $secHeight : $(window).height();

			fx.css({'height':fxHeight*1.2+'px'});
	    	delay_exec('resizeCorrections', 200, function(){
				fx.css({'height':fxHeight+100+'px'});
	    	})
	    });

	    function backgroundScroll(el,speed,direction){
    		var size = (direction == "horizontal") ? el.data('img-width') : el.data('img-height');
    		if (direction == "horizontal") {
				el.animate({'background-position-x' :size}, {duration:speed,easing:'linear',complete:function(){el.css('background-position-x','0');backgroundScroll(el, speed,direction);}});
    		} else if (direction == "vertical") {
    			el.animate({'background-position-y' :size}, {duration:speed,easing:'linear',complete:function(){el.css('background-position-y','0');backgroundScroll(el, speed,direction);}});
    		};
		}

	    $('.vc-animated-bg').each(function(){

	    	var $this         = $(this), 
	    		animatedBg    = $this.find('.animated-container'),
	    		animatedDir   = $this.data('animatedbg-dir'),
	    		animatedSpeed = $this.data('animatedbg-speed');

		    	if (animatedDir == 'horizontal') {
		    		backgroundScroll(animatedBg, animatedSpeed, 'horizontal');
		    	} else if (animatedDir == 'vertical') {
		    		backgroundScroll(animatedBg, animatedSpeed, 'vertical');
		    	};
	    });

	    $('.vc-transitions').each(function(){
	    	$(this).one('inview', function(event, isInView) {
				if (isInView) {
					$(this).toggleClass('transitions-active');
				} else {
					$(this).toggleClass('transitions-active');
				}
			})
	    });

    })(jQuery);

/* Mutliscroll
---------------*/

	(function($){

		"use strict";

		var toolTips = Array();

		$('.ms-split-screen').each(function(){

			var $this        = $(this);
			var $thisSection = $this.find('.ms-left').find('.ms-section');

			for (var i = 0; i < $thisSection.length; i++) {
				toolTips.push($($thisSection[i]).attr('data-title'));
			}

		});

		$('.ms-split-screen').each(function(){

				var $this  = $(this);
				var height = ($(window).outerWidth() < 1023) ? $(window).height() - $('.header-logo-area').outerHeight() : $(window).height();

				$this.height(height);

				$('.ms-split-screen').multiscroll({
					scrollingSpeed:500,
					navigation:true,
					navigationTooltips: toolTips,
					verticalCentered : true,
					easing: 'easeInQuart',
					menu: false,
					navigationPosition: 'right',
					navigationColor: '#000',
					loopBottom: false,
					loopTop: false,
					css3: false,
					paddingTop: 0,
					paddingBottom: 0,
					normalScrollElements: null,
					keyboardScrolling: true,
					touchSensitivity: 5,

					//responsive
					responsiveWidth: 0,
					responsiveHeight: 0,
					responsiveExpand: false,

					// Custom selectors
					sectionSelector: '.ms-section',
					leftSelector: '.ms-left',
					rightSelector: '.ms-right',
				});

				setTimeout(function(){
					$.fn.multiscroll.moveTo(1);
				},1000);

				setTimeout(function(){
					$this.addClass('lazy-load');
				},2000);
		});


		$(window).resize(function(){

			var height = ($(window).outerWidth() < 1023) ? $(window).height() - $('.header-logo-area').outerHeight() : $(window).height();

			$('.ms-split-screen').each(function(){
				var $this = $(this);

				$this.removeClass('lazy-load');
				
				setTimeout(function(){
					$.fn.multiscroll.destroy();
					
					if ($(window).outerWidth() < 1023) {
						$this.height(height);
					} else {
						$this.height(height);
					}

					$.fn.multiscroll.build();
					$.fn.multiscroll.moveTo(1);
				},1000);

				setTimeout(function(){
					$this.addClass('lazy-load');
				},2000);

			});

		});

	})(jQuery);