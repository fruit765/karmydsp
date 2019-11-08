$(document).ready(function(){

    var user = detect.parse(navigator.userAgent);
    var deviceType = user.device.type;

    if (!(deviceType === 'Desktop' && !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) {
    
        $('.img-for-slider-over').on('click', function(){

            window.location.href = $(this).attr('location');
        });
    }
});