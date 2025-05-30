/**
 * Promotional Slider JavaScript
 */
(function($) {
    'use strict';

    var PromoSlider = {
        
        init: function() {
            this.initSliders();
            this.bindEvents();
        },

        initSliders: function() {
            $('.promo-slider').each(function() {
                var $slider = $(this);
                var sliderId = $slider.attr('id');
                
                // Check if slider is already initialized
                if ($slider.hasClass('slick-initialized')) {
                    return;
                }

                // Default slider options
                var defaultOptions = {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 5000,
                    dots: true,
                    arrows: false,
                    infinite: true,
                    speed: 500,
                    fade: false,
                    pauseOnHover: true,
                    pauseOnFocus: true,
                    adaptiveHeight: false,
                    cssEase: 'ease-in-out',
                    responsive: [
                        {
                            breakpoint: 768,
                            settings: {
                                dots: true,
                                arrows: false
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                dots: true,
                                arrows: false
                            }
                        }
                    ]
                };

                // Initialize slider with default options
                $slider.slick(defaultOptions);

                // Add slide change animations
                $slider.on('afterChange', function(event, slick, currentSlide) {
                    PromoSlider.addSlideAnimations($slider);
                });

                // Initial animation
                PromoSlider.addSlideAnimations($slider);
            });
        },

        addSlideAnimations: function($slider) {
            // Add animation classes to current slide
            $slider.find('.slick-active .left-section, .slick-active .right-section').each(function() {
                $(this).addClass('animate-in');
            });
        },

        bindEvents: function() {
            // Pause autoplay on button hover
            $(document).on('mouseenter', '.promo-button', function() {
                var $slider = $(this).closest('.promo-slider');
                $slider.slick('slickPause');
            });

            $(document).on('mouseleave', '.promo-button', function() {
                var $slider = $(this).closest('.promo-slider');
                $slider.slick('slickPlay');
            });

            // Keyboard navigation
            $(document).on('keydown', function(e) {
                var $focusedSlider = $('.promo-slider:focus, .promo-slider:hover').first();
                
                if ($focusedSlider.length) {
                    switch(e.keyCode) {
                        case 37: // Left arrow
                            e.preventDefault();
                            $focusedSlider.slick('slickPrev');
                            break;
                        case 39: // Right arrow
                            e.preventDefault();
                            $focusedSlider.slick('slickNext');
                            break;
                    }
                }
            });

            // Touch swipe enhancement for mobile
            $('.promo-slider').on('swipe', function(event, slick, direction) {
                // Add haptic feedback for supported devices
                if (navigator.vibrate) {
                    navigator.vibrate(50);
                }
            });

            // Window resize handler
            $(window).on('resize', PromoSlider.debounce(function() {
                $('.promo-slider').each(function() {
                    var $slider = $(this);
                    if ($slider.hasClass('slick-initialized')) {
                        $slider.slick('setPosition');
                    }
                });
            }, 250));
        },

        // Utility function for debouncing
        debounce: function(func, wait, immediate) {
            var timeout;
            return function() {
                var context = this, args = arguments;
                var later = function() {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        },

        // Destroy and reinitialize slider (useful for dynamic content)
        refresh: function($slider) {
            if ($slider.hasClass('slick-initialized')) {
                $slider.slick('unslick');
            }
            this.initSliders();
        }
    };

    // Initialize when document is ready
    $(document).ready(function() {
        PromoSlider.init();
    });

    // Reinitialize for Elementor preview
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/promo_slider.default', function($scope) {
            PromoSlider.init();
        });
    });

    // Make PromoSlider globally available
    window.PromoSlider = PromoSlider;

})(jQuery);