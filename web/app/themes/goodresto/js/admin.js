(function($){
	
	"use strict";

	$('.enovathemes-color-picker').wpColorPicker();

	var mmo = $('.megamenu-options');

    mmo.each(function(){

        var $this = $(this),
            mms   = $this.find('.mms select'),
            mmc   = $this.find('.mmc'),
            mmw   = $this.find('.mmw'),
            mmb   = $this.find('.mmb');
           
        if ( mms.val() == "true") {
            mmc.show();mmb.show();mmw.show();
        }

        mms.on("change",function(){
            if ($(this).val() == "false") {
                mmc.hide();mmb.hide();mmw.hide();
            } else {
                mmc.show();mmb.show();mmw.show();
            }
        });

    });

    var buttonOptions = $('.button-opt');

    buttonOptions.each(function(){

        var $this = $(this),
            buttonSelect   = $this.find('.button-select'),
            buttonStyling  = $this.find('.button-styling');

        if ( buttonSelect.val() == "true") {
            buttonStyling.show();
        }

        buttonSelect.on("change",function(){
            if ($(this).val() == "false") {
                buttonStyling.hide();
            } else {
                buttonStyling.show();
            }
        });

    });

    $('.enovathemes-upload').each(function(){

            "use strict";

            var custom_uploader;
            var $this   = $(this);
            var upload  = $this.find('.enovathemes-button-upload');
            var path    = $this.find('.enovathemes-upload-path');
            var preview = $this.find('.enovathemes-preview-upload');
            var pattern = $this.find('.enovathemes-pattern-preview');
            var remove  = $this.find('.enovathemes-button-remove');

            upload.on('click',function(e) {
                e.preventDefault();

                if (custom_uploader) {
                    custom_uploader.open();
                    return;
                }

                custom_uploader = wp.media.frames.file_frame = wp.media({
                    title: 'Upload background image',
                    button: {
                        text: 'Upload background image'
                    },
                    multiple: false
                });

                custom_uploader.on('select', function() {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    path.val(attachment.url);
                    preview.attr('src',attachment.url).css('display','block');
                    pattern.css({
                        'background-image':'url('+attachment.url+')',
                        'height':'200px',
                        'margin':'15px 0'
                    });
                });

                custom_uploader.open();
            });

            remove.on('click',function(e){
                e.preventDefault();
                path.val("");
                preview.attr('src',"").hide(0);
                pattern.attr('style',"");
            });

            if (path.val()) {
                pattern.css({
                    'background-image':'url('+path.val()+')',
                    'height':'200px',
                    'margin':'15px 0'
                });
                preview.show(0);
            }
    });

    $('.enovathemes-thumbnail-upload').each(function(){

            "use strict";

            var custom_uploader;
            var $this   = $(this);
            var upload  = $this.find('.enovathemes-button-upload');
            var path    = $this.find('.enovathemes-upload-path');
            var preview = $this.find('.enovathemes-preview-upload');

            upload.on('click',function(e) {
                e.preventDefault();

                if (custom_uploader) {
                    custom_uploader.open();
                    return;
                }

                custom_uploader = wp.media.frames.file_frame = wp.media({
                    title: 'Upload event thumbnail',
                    button: {
                        text: 'Upload event thumbnail'
                    },
                    multiple: false
                });

                custom_uploader.on('select', function() {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    path.val(attachment.url);
                    preview.attr('src',attachment.url).show(0);
                });

                custom_uploader.open();
            });

            if (path.val()) {
                preview.show(0);
            }
    });

    $('input.title_section_height').slider();
	
})(jQuery);


(function($){

    function formatSwitch($target){

        if ($target.val() == "gallery") {
            $('#gallery-metabox').show(0);
            $('#post-section-post-formats')
            .find('#format-'+$target.val())
            .show(0)
            .siblings()
            .hide(0);
        } 
        else if ($target.val() == "aside" || $target.val() == "chat" || $target.val() == "0") {
            $('#gallery-metabox').hide(0);
            $('#post-section-post-formats').find('.optional').hide(0);
        }
        else {
            $('#gallery-metabox').hide(0);
            $('#post-section-post-formats')
            .find('#format-'+$target.val())
            .show(0)
            .siblings()
            .hide(0);
        }
    }

    $('#formatdiv input[type="radio"]').each(function(){
        var $this = $(this);

        $this.on('click', function(){
            formatSwitch($this);
        });

        if($this.is(":checked")){
            formatSwitch($this);
        }
    });

})(jQuery);

(function($){

    function eventFormatSwitch($target){

        if ($target.val() == "gallery") {
            $('#gallery-metabox').show(0);
        }
        else {
            $('#gallery-metabox').hide(0);
        }

        $('#event-format-options')
        .find('#format-'+$target.val())
        .show(0)
        .siblings()
        .hide(0);
    }

    $('#event-format-subsection input[type="radio"]').each(function(){
        var $this = $(this);

        $this.on('click', function(){
            eventFormatSwitch($this);
        });

        if($this.is(":checked")){
            eventFormatSwitch($this);
        }
    });

    $('#post-section-event-details input[name="booking_closed"]').on('click', function(){
        $('#post-section-event-details #event-booking-message').toggleClass('active');
    });

    if($('#post-section-event-details input[name="booking_closed"]').is(":checked")){
        $('#post-section-event-details #event-booking-message').toggleClass('active');
    }

})(jQuery);

(function($){

    function quickStyleSwitch($prefix,$target){
        $('#'+$prefix+'_'+$target.val())
        .addClass('active')
        .siblings()
        .removeClass('active');
    }

    $('#header_style input[type="radio"]').each(function(){
        var $this = $(this);
        $this.on('click', function(){
            quickStyleSwitch('header_style',$this);
        });
        if($this.is(":checked")){
            quickStyleSwitch('header_style',$this);
        }
    });

    $('#page_style input[type="radio"]').each(function(){
        var $this = $(this);
        $this.on('click', function(){
            quickStyleSwitch('page_style',$this);
        });
        if($this.is(":checked")){
            quickStyleSwitch('page_style',$this);
        }
    });

    $('#language_style input[type="radio"]').each(function(){
        var $this = $(this);
        $this.on('click', function(){
            quickStyleSwitch('language_style',$this);
        });
        if($this.is(":checked")){
            quickStyleSwitch('language_style',$this);
        }
    });

})(jQuery);

(function($){

    $('#post-section-page-options input[name="title_section"]').on('click', function(){
        $('#post-section-page-options .page-title-section-group').toggleClass('active');
    });

    if($('#post-section-page-options input[name="title_section"]').is(":checked")){
        $('#post-section-page-options .page-title-section-group').toggleClass('active');
    }

})(jQuery);

(function($){

    $('#goodresto_enovathemes-icon-decorative').find('input').each(function(){
        $(this).after('<span class="admin-icon"></span>');
    });

})(jQuery);


