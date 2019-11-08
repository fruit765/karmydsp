
var setHeightTimer;

$(document).ready(function() {

    setHeight();

    $(window).resize(function(){

        setHeight();
    });
});

function setHeight(){

    var timerCount = 0;

    clearInterval(setHeightTimer);

    setHeightTimer = setInterval(function(){

        timerCount++;
        
        if (timerCount === 50) {

            clearInterval(setHeightTimer);
        }

        if (parseInt($('.sidebar').css('height')) > parseInt($('.main-block-wrapper').css('height'))) {
    
            $('.main-block').css('height', parseInt($('.sidebar').css('height')) + 'px');
        }
        else {
    
            $('.main-block').css('height', 'auto');
        }
    }, 200);
}