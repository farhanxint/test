jQuery(document).ready(function () {
    $('.adverstisment-slider-1 .owl-carousel').owlCarousel({
        loop: false,
        margin: 0,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            }
        }
    });

    $('.gallerys').magnificPopup({
        type     : 'image',
        delegate : 'a',
        gallery  : {
            enabled : true
        }
    });

    $('.adverstisment-slider-2 .owl-carousel').owlCarousel({
        loop: false,
        margin: 0,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            }
        }
    });

    $('.adverstisment-slider-3 .owl-carousel').owlCarousel({
        loop: false,
        margin: 0,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            }
        }
    });

    $(".menu-icon").click(function () {
        $("header nav ul").slideToggle();
    });

});
