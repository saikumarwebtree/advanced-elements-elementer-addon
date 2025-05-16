// Flowthermolab Landing Widget JavaScript
(function($) {
    // Initialize the widget
    function initFlowthermoLabLanding() {
        // Add subtle animation to team members
        $('.flowthermolab-landing-team-member').hover(
            function() {
                $(this).css('transform', 'scale(1.05)');
            },
            function() {
                $(this).css('transform', 'scale(1)');
            }
        );

        // Testimonial hover effect
        $('.flowthermolab-landing-testimonial').hover(
            function() {
                $(this).css({
                    'transform': 'translateY(-10px)',
                    'box-shadow': '0 10px 25px rgba(59, 130, 246, 0.2)'
                });
            },
            function() {
                $(this).css({
                    'transform': 'translateY(0)',
                    'box-shadow': 'none'
                });
            }
        );
    }

    $('.testimonials-slider').slick({
        centerMode: true,
        centerPadding: '480px',  // Increased padding to show partial slides
        slidesToShow: 1,         // Show only one full slide
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        autoplay: true,
        autoplaySpeed: 5000,
        pauseOnHover: true,
        speed: 500,
        cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    centerPadding: '100px'
                }
            },
            {
                breakpoint: 992,
                settings: {
                    centerPadding: '80px'
                }
            },
            {
                breakpoint: 768,
                settings: {
                    centerPadding: '40px'
                }
            },
            {
                breakpoint: 576,
                settings: {
                    centerPadding: '20px'
                }
            }
        ]
    });

    // Run on Elementor frontend init
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/flowthermolab_landing.default', initFlowthermoLabLanding);
    });
})(jQuery);