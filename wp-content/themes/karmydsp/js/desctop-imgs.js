
$(document).ready(function(){

    $('.desctop-imgs .imgs').on('click', '.img', function(){

        $('.desctop-imgs .imgs .img').removeClass('active');
        
        $(this).addClass('active');

        var position = $(this).attr('position');

        var color = $(this).attr('color');

        $('.main-img img').attr('src', imgs[color]['medium_imgs_arr'][position]).attr('position', position);
    });
});