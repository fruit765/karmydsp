
$(document).ready(function() {

    correctLastElement();

    $(window).resize(function(){

        correctLastElement();
    });
});

function correctLastElement() {

    var timer;

    var timerCount = 0;

    timer = setInterval(function(){

        timerCount++;
        
        if (timerCount === 10) {

            clearInterval(timer);
        }

        var $items = $('.catalog-block .item');

        if ($items.length) {

            $items.css('maxWidth', 'none');

            if ($items.length <= 2) {

                if ($('.wrapper .header-container .header .phone').css('font-size') != '0' && $('.wrapper .header-container .header .phone').css('font-size') != '0px') {

                    $items.css('maxWidth', '300px');
                }
            }
            else {

                var firstElementWidth = $('.catalog-block .item:first-child')[0].offsetWidth;

                for (var i = 1; i < $items.length; i++) {

                    if ($items[i].offsetWidth !== firstElementWidth) {
        
                        $($items[i]).css('maxWidth', firstElementWidth + 'px');
                    }
                }
            }
        }
    }, 1000);
}