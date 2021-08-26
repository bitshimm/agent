$(function () {
    $(".photo-slider").slick({
        prevArrow: '<button type="button" class="btn btn-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="btn btn-next"><i class="fas fa-chevron-right"></i></button>',
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        ]
    });
    $(".fancybox").fancybox({
        autoScale: false
    });
    $('.btn-special-orders.non-active').on('click', function () {
        $('.collapse-special-orders').show(500);
        $('.btn-special-orders').removeClass('non-active');
        $('.btn-special-orders').addClass('active');
        $('.collapse-special-orders').removeClass('non-active');
        $('.collapse-special-orders').addClass('active');
        $('.btn-special-orders').html('<i class="fas fa-chevron-left"></i>');
    });
    $('.btn-special-orders.active').on('click', function () {
        $('.collapse-special-orders').hide(500);
        $('.btn-special-orders').removeClass('active');
        $('.collapse-special-orders').addClass('active');
        $('.btn-special-orders').addClass('non-active');
        $('.collapse-special-orders').addClass('non-active');
        $('.btn-special-orders').html('<i class="fas fa-chevron-right"></i>');
        console.log('ok');
    });
});