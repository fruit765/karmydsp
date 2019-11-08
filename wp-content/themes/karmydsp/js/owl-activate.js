

$(document).ready(function() {

    $('.owl-carousel-catalog').owlCarousel({
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

    $('.owl-carousel-action').owlCarousel({
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
});