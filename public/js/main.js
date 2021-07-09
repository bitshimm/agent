$(function() {
    $(".photo-slider").slick({
        prevArrow:
            '<button type="button" class="btn btn-danger btn-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow:
            '<button type="button" class="btn btn-danger btn-next"><i class="fas fa-chevron-right"></i></button>',
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
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
        autoScale : false
    });
});
