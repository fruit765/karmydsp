
$(document).ready(function() {

    $('.sidebar > ul > li > div').click(function(){

        $(this).parent().toggleClass('open');

        $(this).parent().find('ul').slideToggle();
    });

    $('.menu-btn').click(function(){

        $('body').addClass('hidden');

        $('.sidebar').addClass('open');

        $('.sidebar-cover').stop().animate(

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

    $('.sidebar .close').click(function(){

        $('.sidebar').removeClass('open');

        $('body').removeClass('hidden');

        $('.sidebar-cover').stop().animate(

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
            },
        );
    });
});