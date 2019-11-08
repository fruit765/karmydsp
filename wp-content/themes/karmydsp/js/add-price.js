$(document).ready(function(){

    var sizeElement, colorElement, numSize = 0, numColor = 0;

    $('.size .items').on('click', '.item', function(){

        addPrice();
    });

    $('.colors .imgs').on('click', '.img', function(){

        addPrice();
    });

    function addPrice() {

        sizeElement = $('.size .items .item.active')[0];

        if (sizeElement) {

            $('.size .items .item').each(function(index){

                if (this === sizeElement) {

                    numSize = index + 1;
                }
            });
        }

        colorElement = $('.colors .imgs .img.active')[0];

        if (colorElement) {

            $('.colors .imgs .img').each(function(index){

                if (this === colorElement) {

                    numColor = index + 1;
                }
            });
        }

        if ($('div').is('.price')) {

            $('.price .value').text(parseInt($('.price').attr('price')) + addPriceArr[numSize][numColor]);
        }
    }
});