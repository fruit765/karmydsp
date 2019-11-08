
$(document).ready(function(){

    $('#contact-form-modal-btn, #free-consultation').click(function(){

        $('body').addClass('hidden-scroll');

        $('#contact-form-modal').addClass('open');

        $('.contact-form-modal-cover').stop().animate(

            {
                
                opacity: 1
            },

            {

                duration: 500,
    
                easing: 'easeOutSine',

                queue: false,

                start: function(){

                    $(this).addClass('open');
                },
            }
        );
    });

    $('#contact-form-modal .close').click(function(){

        $('#contact-form-modal').removeClass('open');

        $('body').removeClass('hidden-scroll');

        $('.contact-form-modal-cover').stop().animate(

            {
                
                opacity: 0
            },

            {

                duration: 500,
    
                easing: 'easeOutSine',

                queue: false,

                complete: function(){

                    $(this).removeClass('open');
                },
            }
        );
    });

    $('#contact-form-modal .form-check-input').click(function(){

        if ($(this).prop('checked')) {

            $('#contact-form-modal .form-check-label').addClass('active');
        }
        else {

            $('#contact-form-modal .form-check-label').removeClass('active');
        }
    });
});