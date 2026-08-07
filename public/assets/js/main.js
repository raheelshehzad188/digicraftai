(function ($) {
    "use strict";

    // Legacy spinner hide only (preloader handled inline in layout)
    if ($('#spinner').length > 0) {
        $('#spinner').removeClass('show');
    }
    
    
    // Initiate the wowjs
    new WOW().init();
    
    
   // Back to top button
   $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Blog carousel
    $(".blog-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: false,
        dots: false,
        loop: true,
        margin: 50,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0:{
                items:2,
                margin: 12,
                nav: false
            },
            768:{
                items:2,
                margin: 30
            },
            992:{
                items:2
            },
            1200:{
                items:3
            }
        }
    });


    // Testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: false,
        dots: true,
        loop: true,
        margin: 50,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0:{
                items:2,
                margin: 12,
                nav: false,
                center: false
            },
            576:{
                items:2,
                margin: 16,
                nav: false
            },
            768:{
                items:2,
                margin: 30
            },
            992:{
                items:2
            },
            1200:{
                items:3
            }
        }
    });

})(jQuery);

