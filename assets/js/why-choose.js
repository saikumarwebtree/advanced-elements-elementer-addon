/**
 * Why Choose Widget Counter Animation
 * 
 * This JavaScript handles the animation of statistics counters
 * in the Why Choose widget, making them count up from 0 to their
 * final value when they come into the viewport.
 */

(function($) {
    "use strict";

    // Counter Animation Function
    function startCounterAnimation(element, duration) {
        const finalValue = element.data('value');
        let startValue = 0;
        const counterPlus = finalValue.includes('+');
        const numericValue = parseInt(finalValue.replace(/\D/g, ''));
        const increment = numericValue / (duration / 16); // 16ms is approx one frame at 60fps
        let currentValue = 0;
        
        // Clear any existing timers
        clearInterval(element.data('countTimer'));
        
        // Set the initial value
        element.text(startValue + (counterPlus ? '+' : ''));
        
        // Start the counter
        const timer = setInterval(function() {
            currentValue += increment;
            
            // Check if we've reached or exceeded the target
            if (currentValue >= numericValue) {
                clearInterval(timer);
                element.text(finalValue);
                return;
            }
            
            // Update the element with the current count
            element.text(Math.floor(currentValue) + (counterPlus ? '+' : ''));
        }, 16);
        
        // Store the timer reference
        element.data('countTimer', timer);
    }

    // Initialize counters when in viewport
    function initCounters() {
        $('.statistics-section[data-animation="yes"]').each(function() {
            const $this = $(this);
            
            // If already animated, skip
            if ($this.hasClass('counted')) {
                return;
            }
            
            // Check if the element is in viewport
            const top_of_element = $this.offset().top;
            const bottom_of_element = $this.offset().top + $this.outerHeight();
            const bottom_of_screen = $(window).scrollTop() + $(window).height();
            const top_of_screen = $(window).scrollTop();
            
            if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
                // Element is visible, start counting
                $this.addClass('counted');
                
                // Get animation duration from data attribute
                const duration = parseInt($this.data('duration')) || 2000;
                
                // For each stat number in this section
                $this.find('.stat-number').each(function() {
                    const $counter = $(this);
                    startCounterAnimation($counter, duration);
                });
            }
        });
    }

    // Run on document ready
    $(document).ready(function() {
        // Initial check on page load
        initCounters();
        
        // Check on scroll
        $(window).on('scroll', function() {
            initCounters();
        });
        
        // Also check on resize (in case of layout shifts)
        $(window).on('resize', function() {
            initCounters();
        });
    });

})(jQuery);