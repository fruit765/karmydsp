
$(document).ready(function() {

    $('#contact-form .form-check-input').click(function(){

        if ($(this).prop('checked')) {

            $('#contact-form .form-check-label').addClass('active');
        }
        else {

            $('#contact-form .form-check-label').removeClass('active');
        }
    });
});