var setMobileImgsOverHeightTimer, reloadMobileImgsTimer;

$(document).ready(function(){

    var siteVersion, siteVersionNew;

    if ($('.desctop-imgs').css('display') === 'none') {

        siteVersion = 'mobile';
    }
    else {

        siteVersion = 'desctop';
    }

    setMobileImgsOverHeight();

    $(window).resize(function(){

        if ($('.desctop-imgs').css('display') === 'none') {

            siteVersionNew = 'mobile';
        }
        else {
    
            siteVersionNew = 'desctop';
        }

        if (siteVersion !== siteVersionNew) {

            siteVersion = siteVersionNew;

            if ($('.card-imgs-slider').hasClass('open')) {

                $('body').removeClass('hidden-scroll');
                
                $('.card-imgs-slider').removeClass('open');

                $('.card-imgs-slider-close').trigger('click');
            }

            setMobileImgsOverHeight();

            var colorElement = $('.colors .imgs .img.active')[0];

            if (colorElement) {

                reloadDesctopImgs(colorElement);

                reloadMobileImgs(colorElement);
            }
            else {

                $('.mobile-imgs').css({visibility: 'visible'});
            }
        }
        else {

            if ($('.mobile-imgs').css('display') !== 'none' && $('.mobile-imgs').css('visibility') === 'visible') {

                setTimeout(function(){

                    $('.mobile-imgs-over').css('height', $('.mobile-imgs').css('height'));
                }, 1000);
            }
        }
    });

    $('.colors .imgs').on('click', '.img', function(){

        reloadDesctopImgs(this);

        reloadMobileImgs(this);
    });

    function setMobileImgsOverHeight() {

        if ($('.desctop-imgs').css('display') === 'none' && parseInt($('.mobile-imgs-over').css('height')) === 0) {

            clearInterval(setMobileImgsOverHeightTimer);

            setMobileImgsOverHeightTimer = setInterval(function(){
    
                if (parseInt($('.mobile-imgs .owl-stage').css('width')) !== 0) {
    
                    clearInterval(setMobileImgsOverHeightTimer);
    
                    $('.mobile-imgs-over').css('height', $('.mobile-imgs').css('height'));

                    var colorElement = $('.colors .imgs .img.active')[0];

                    if (colorElement) {

                        reloadDesctopImgs(colorElement);

                        reloadMobileImgs(colorElement);
                    }
                    else {

                        $('.mobile-imgs').css({visibility: 'visible'});
                    }
                }
            }, 500);
        }
    }
});

function reloadDesctopImgs(colorElement) {

    if ($('.desctop-imgs').css('display') !== 'none') {

        clearInterval(setMobileImgsOverHeightTimer);

        clearInterval(reloadMobileImgsTimer);

        $('.desctop-imgs img, .mobile-imgs img').off('.reloadImgs');

        var img;

        var div;

        $('.colors .imgs .img').removeClass('active');

        $(colorElement).addClass('active');

        var mainImgsHeight = $('.desctop-imgs .main-img').css('height');

        var imgsHeight = $('.desctop-imgs .imgs').css('height');

        $('.desctop-imgs .main-img').css('height', mainImgsHeight).html('');

        $('.desctop-imgs .imgs').css('height', imgsHeight).html('');
        
        img = new Image();

        $(img).on('load.reloadImgs', function(){

            $('.desctop-imgs .main-img').css('height', 'auto');
        });

        $(img).appendTo('.desctop-imgs .main-img').attr('src', imgs[$(colorElement).attr('color')]['medium_imgs_arr'][0]).attr('position', '0').attr('color', $(colorElement).attr('color'));

        imgs[$(colorElement).attr('color')]['thumbnail_imgs_arr'].forEach(function(item, i, arr){

            div = document.createElement('div');

            var active = '';

            if (i == 0) {

                active = ' active';
            }
            
            img = new Image();

            $(img).on('load.reloadImgs', function(){

                if (i === arr.length - 1) {

                    $('.desctop-imgs .imgs').css('height', 'auto');

                    setHeight();
                }
            });

            $(img).appendTo(div).attr('src', item);

            $(div).attr('class', 'img' + active).attr('position', i).attr('color', $(colorElement).attr('color')).appendTo('.desctop-imgs .imgs');
        });
    }
}

function reloadMobileImgs(colorElement) {

    if ($('.desctop-imgs').css('display') === 'none' && parseInt($('.mobile-imgs-over').css('height')) !== 0) {

        clearInterval(reloadMobileImgsTimer);

        $('.desctop-imgs img, .mobile-imgs img').off('.reloadImgs');

        var img;

        var div;

        $('.preloader').addClass('loading');

        $('.colors .imgs .img').removeClass('active');

        $(colorElement).addClass('active');

        $('.mobile-imgs').remove();

        div = document.createElement('div');

        $(div).attr('class', 'mobile-imgs owl-carousel');

        imgs[$(colorElement).attr('color')]['medium_large_imgs_arr'].forEach(function(item, i, arr){

            img = new Image();

            $(img).on('load.reloadImgs', function(){

                if (i === arr.length - 1) {

                    $(div).insertAfter('.mobile-imgs-over');

                    $('.mobile-imgs').owlCarousel({
                        loop:true, //Зацикливаем слайдер
                        margin:20, //Отступ от элемента справа в 50px
                        nav:true, //Отключение навигации
                        autoplay:false, //Автозапуск слайдера
                        smartSpeed:200, //Время движения слайда
                        autoplayTimeout:2000, //Время смены слайда
                        responsive:{ //Адаптивность. Кол-во выводимых элементов при определенной ширине.
                            0:{
                                items:1
                            }
                        }
                    });
                    
                    reloadMobileImgsTimer = setInterval(function(){

                        if (parseInt($('.mobile-imgs .owl-stage').css('width')) !== 0) {

                            clearInterval(reloadMobileImgsTimer);

                            $('.preloader').removeClass('loading');

                            $('.mobile-imgs-over').css('height', $('.mobile-imgs').css('height'));

                            $('.mobile-imgs').css({visibility: 'visible'});
                        }
                    }, 500);
                }
            });

            $(img).appendTo(div).attr('src', item);
        });
    }
}