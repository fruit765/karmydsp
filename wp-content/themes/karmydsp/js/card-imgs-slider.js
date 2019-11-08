
$(document).ready(function(){

    $('.main-img').on('click', 'img', function(){

        var timer;

        var changeImgsTimer;

        var position = $(this).attr('position');

        var color = $(this).attr('color');

        $('.card-imgs-slider').remove();
        
        $('.desctop-imgs').prepend('<div class="card-imgs-slider"><div class="card-imgs-slider-wrapper owl-carousel"></div><div class="card-imgs-slider-preloader"></div><div class="card-imgs-slider-close"></div></div>');
        
        $('.card-imgs-slider').stop().animate(

            {
                
                opacity: 1
            },

            {

                duration: 500,

                easing: 'easeOutSine',

                queue: false,

                start: function(){

                    $('body').addClass('hidden-scroll');

                    $(this).addClass('open');

                    $('.card-imgs-slider-preloader').addClass('loading');

                    $(this).find('.card-imgs-slider-close').click(function(){

                        $('.card-imgs-slider').stop().animate(

                            {
                                
                                opacity: 0
                            },
                
                            {
                
                                duration: 500,
                
                                easing: 'easeOutSine',
                
                                queue: false,
                
                                complete: function(){

                                    clearInterval(timer);

                                    clearInterval(changeImgsTimer);
                
                                    $('body').removeClass('hidden-scroll');
                
                                    $(this).removeClass('open');

                                    setHeight();
                                },
                            }
                        );
                    });
                },
            }
        );

        imgs[color]['large_imgs_arr'].forEach(function(item, i){

            var img = new Image();

            $(img).on('load', function(){

                if (i === imgs[color]['large_imgs_arr'].length - 1) {

                    $('.card-imgs-slider-wrapper').addClass('open');

                    $('.card-imgs-slider-wrapper').owlCarousel({
                        loop:true, //Зацикливаем слайдер
                        margin:20, //Отступ от элемента справа в 50px
                        nav:true, //Отключение навигации
                        autoplay:false, //Автозапуск слайдера
                        smartSpeed:200, //Время движения слайда
                        autoplayTimeout:2000, //Время смены слайда
                        startPosition: position,
                        responsive:{ //Адаптивность. Кол-во выводимых элементов при определенной ширине.
                            0:{
                                items:1
                            }
                        }
                    });

                    timer = setInterval(function(){
                        
                        if (parseInt($('.card-imgs-slider-wrapper .owl-stage').css('width')) !== 0) {

                            clearInterval(timer);
                            
                            $('.card-imgs-slider-wrapper .owl-stage').addClass('none-transform');

                            var owlItemWidth = $('.card-imgs-slider-wrapper .owl-item').css('width');

                            var owlItemMargin = $('.card-imgs-slider-wrapper .owl-item').css('marginRight');

                            $('.card-imgs-slider-wrapper .owl-item').each(function(){

                                $(this).css('width', Math.floor(parseInt($('.card-imgs-slider-wrapper').css('width')) / imgs[color]['large_imgs_arr'].length) + 'px');

                                $(this).css('marginRight', '0');
                            });

                            setTimeout(function(){

                                $('.card-imgs-slider-wrapper .owl-stage').removeClass('none-transform');

                                $('.card-imgs-slider-wrapper .owl-item').each(function(){

                                    $(this).css('width', owlItemWidth);
    
                                    $(this).css('marginRight', owlItemMargin);
                                });

                                $('.card-imgs-slider-preloader').removeClass('loading');

                                $('.card-imgs-slider-wrapper').addClass('show');

                                changeImgsTimer = setInterval(function(){

                                    var position = $('.card-imgs-slider-wrapper .owl-item.active img').attr('position');

                                    $('.main-img img').attr('src', imgs[color]['medium_imgs_arr'][position]).attr('position', position);

                                    $('.desctop-imgs .imgs .img').removeClass('active');

                                    $('.desctop-imgs .imgs .img[position="' + position + '"]').addClass('active');
                                }, 100);
                            }, 100);
                        }
                    }, 500);
                }
            });

            $(img).appendTo('.card-imgs-slider-wrapper').attr('src', item).attr('position', i);
        });
    });
});