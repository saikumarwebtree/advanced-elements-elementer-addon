(function($) {
    'use strict';

    // Initialize tabs functionality when the document is ready
    $(document).ready(function() {
        initCourseTabs();
    });

    /**
     * Initialize tabs functionality for course showcase
     */
    function initCourseTabs() {
        $('.courses-tabs').each(function() {
            const $tabsContainer = $(this);
            const $tabItems = $tabsContainer.find('.courses-tab-item');
            const $tabPanes = $tabsContainer.closest('.courses-showcase-container').find('.tab-pane');
            
            $tabItems.on('click', function() {
                const $tab = $(this);
                const tabId = $tab.data('tab');
                
                // Remove active class from all tabs
                $tabItems.removeClass('active');
                
                // Add active class to clicked tab
                $tab.addClass('active');
                
                // Show corresponding tab content
                $tabPanes.removeClass('active');
                $tabPanes.filter('[data-tab-content="' + tabId + '"]').addClass('active');
            });
        });
    }

})(jQuery);