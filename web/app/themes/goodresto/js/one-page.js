(function($){

    "use strict";
    
    var filterString = one_page_opt.filterArray;
    var navType      = one_page_opt.navType;
    var speed        = one_page_opt.speed;
    var hash         = one_page_opt.hash;
    
    if(navType == "top"){
        $('ul#header-menu').singlePageNav({
            currentClass: 'one-page-active',
            speed: parseInt(speed),
            easing: "swing",
            updateHash: hash,
            filter:':not('+filterString+')',
        });

        $('ul#header-menu-left').singlePageNav({
            currentClass: '',
            speed: parseInt(speed),
            easing: "swing",
            updateHash: hash,
            filter:':not('+filterString+')',
        });

        $('ul#header-menu-right').singlePageNav({
            currentClass: '',
            speed: parseInt(speed),
            easing: "swing",
            updateHash: hash,
            filter:':not('+filterString+')',
        });
        
    } else if(navType == "side") {
        $('ul#bullets').singlePageNav({
            currentClass: 'one-page-active',
            speed: parseInt(speed),
            easing: "swing",
            updateHash: hash,
            filter:':not('+filterString+')',
        }); 
    } else if(navType == "sidebar") {
        $('ul#sidebar-menu').singlePageNav({
            currentClass: 'one-page-active',
            speed: parseInt(speed),
            easing: "swing",
            updateHash: hash,
            filter:':not('+filterString+')',
        }); 
    }

})(jQuery);