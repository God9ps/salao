$(document).scroll(function () {

    var y = $(this).scrollTop();
    if (y > 550) {
        $('.btnMarcacao').show();
    } else {
        $('.btnMarcacao').fadeOut();
    }

});


$(document).ready(function () {

    $('#myCarousel').carousel({
        interval: 3000,
        cycle: true
    });

});