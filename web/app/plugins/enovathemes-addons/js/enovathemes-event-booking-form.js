(function($){

    var valid = "invalid";
    function validateValue($value, $target, $email){
        if ($email == true) {
            var n = $value.indexOf("@");
            var r = $value.lastIndexOf(".");
            if (n < 1 || r < n + 2 || r + 2 >= $value.length) {
                valid =  "invalid";
            } else {
                valid = "valid";
            }
            
            if ($value == null || $value == "" || valid == "invalid") {
                $target.addClass('visible');
            } else {
                $target.removeClass('visible');
            }

        } else {
            if ($value == null || $value == "") {
                $target.addClass('visible');
            } else {
                $target.removeClass('visible');
            }
        }
    };

    $('.event-booking-form').each(function(){

        var $this = $(this);

        $this.submit(function(event) {

            event.preventDefault();

            var formData = $this.serialize();

            var name   = $this.find(".event-booking-form-name").val();
            var email  = $this.find(".event-booking-form-email").val();
            var tel    = $this.find(".event-booking-form-tel").val();
            var person = $this.find(".event-booking-form-person option:selected").val();
            var msg    = $this.find(".event-booking-form-mgs").val();

            var namePlaceholder   = $this.find(".event-booking-form-name").attr('placeholder');
            var emailPlaceholder  = $this.find(".event-booking-form-email").attr('placeholder');
            var telPlaceholder    = $this.find(".event-booking-form-tel").attr('placeholder');
            var personPlaceholder = $this.find(".event-booking-form-person option:first").val();

            validateValue(name, $this.find(".event-booking-form-name-valid"));
            validateValue(email, $this.find(".event-booking-form-email-valid"), true);
            validateValue(tel, $this.find(".event-booking-form-tel-valid"));

            if (person === personPlaceholder) {
                $this.find(".event-booking-form-person-valid").addClass('visible');
            } else {
                $this.find(".event-booking-form-person-valid").removeClass('visible');
            }

            if (name === namePlaceholder || email === emailPlaceholder || tel === telPlaceholder || person === personPlaceholder) {
                event.preventDefault();
                $('.et-booking').getNiceScroll().resize();
            }

            if (name != "" && email != "" && tel != "" && valid == "valid"){

                $this.find(".sending").addClass('visible');

                $.ajax({
                    type: 'POST',
                    url: $this.attr('action'),
                    data: formData
                })
                .done(function(response) {
                    
                    setTimeout(function(){
                        $this.find(".sending").removeClass('visible');
                        $this.find(".event-booking-form-submit-success").addClass('visible');
                        // Clear the form.
                        $this.find(".event-booking-form-name").val('');
                        $this.find(".event-booking-form-email").val('');
                        $this.find(".event-booking-form-tel").val('');
                        $this.find(".event-booking-form-person option[value='none']").prop('selected', true);;
                        $this.find(".event-booking-form-mgs").val('');

                        setTimeout(function(){
                            $this.find(".event-booking-form-submit-success").removeClass('visible');
                        },3000);

                    },3000);
                })
                .fail(function(data) {
                    setTimeout(function(){
                        $this.find(".sending").removeClass('visible');
                        $this.find(".event-booking-form-submit-error").addClass('visible');

                        // Clear the form.
                        $this.find(".event-booking-form-name").val('');
                        $this.find(".event-booking-form-email").val('');
                        $this.find(".event-booking-form-tel").val('');
                        $this.find(".event-booking-form-person option[value='none']").prop('selected', true);;
                        $this.find(".event-booking-form-mgs").val('');

                        setTimeout(function(){
                            $this.find(".event-booking-form-submit-error").removeClass('visible');
                        },3000);

                    },3000);
                });

            }
        });
    });

})(jQuery);