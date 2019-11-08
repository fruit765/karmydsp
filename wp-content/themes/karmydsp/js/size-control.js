
$(document).ready(function(){

    var colors, img, div, active, sizeRange;

    $('.card-left-block .size .items .item').click(function(){

        $('.card-left-block .size .items .item').removeClass('active');

        $(this).addClass('active');

        sizeRange = $(this).attr('size-range');

        if (sizeRange) {

            $('.colors img').off('.size-control');

            var colorsImgsHeight = $('.colors .imgs').css('height');

            $('.colors .imgs').css('height', colorsImgsHeight).html('');

            colors = $(this).attr('size-range').split(';');

            colors.forEach(function(item, i){

                div = document.createElement('div');

                if (i === 0) {

                    active = ' active';
                }
                else {

                    active = '';
                }

                img = new Image();

                $(img).on('load.size-control', function(){

                    if (i === colors.length - 1) {

                        $('.colors .imgs').css('height', 'auto');
                    }
                });

                $(img).appendTo(div).attr('src', imgs[item - 1]['color']);

                $(div).attr('class', 'img' + active).attr('color', item - 1).appendTo('.colors .imgs');
            });

            var colorElement = $('.colors .imgs .img.active')[0];

            reloadDesctopImgs(colorElement);

            reloadMobileImgs(colorElement);
        }
    });
});