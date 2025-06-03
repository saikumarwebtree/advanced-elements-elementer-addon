<?php
/**
 * Plugin Name: Advanced Elements for Elementor
 * Description: Adds advanced custom widgets to Elementor including Platform Cards and Step Cards, etc
 * Version: 1.0.0
 * Author: Webtree
 * Author URI: https://webtreeonline.com
 * Text Domain: advanced-elements-elementor
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Main Advanced Elements Elementor Addon Class
 */
final class Advanced_Elements_Elementor_Addon {

    /**
     * Plugin Version
     */
    const VERSION = '1.0.0';

    /**
     * Minimum Elementor Version
     */
    const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

    /**
     * Minimum PHP Version
     */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
     * Instance
     */
    private static $_instance = null;

    /**
     * Instance
     */
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     */
    public function __construct() {
        // Load translation
        add_action('init', array($this, 'i18n'));
        
        // Initialize the plugin
        add_action('plugins_loaded', array($this, 'init'));
    }

    /**
     * Load Textdomain
     */
    public function i18n() {
        load_plugin_textdomain('advanced-elements-elementor');
    }

    /**
     * Initialize the plugin
     */
    public function init() {
        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', array($this, 'admin_notice_missing_main_plugin'));
            return;
        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', array($this, 'admin_notice_minimum_elementor_version'));
            return;
        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', array($this, 'admin_notice_minimum_php_version'));
            return;
        }

        // Register widgets
        add_action('elementor/widgets/widgets_registered', array($this, 'register_widgets'));

        // Register widget category
        add_action('elementor/elements/categories_registered', array($this, 'add_elementor_widget_categories'));

        // Register styles
        add_action('elementor/frontend/after_enqueue_styles', array($this, 'widget_styles'));
        add_action('elementor/frontend/after_enqueue_scripts', array($this, 'widget_scripts'));

        /* footer template */
        add_shortcode('flowthermolab_footer', array($this, 'render_footer_shortcode'));

        /* sidebar widget */
        add_action('widgets_init', array($this, 'register_footer_sidebar'));

    }

    /**
     * Admin notice for missing main plugin
     */
    public function admin_notice_missing_main_plugin() {
        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'advanced-elements-elementor'),
            '<strong>' . esc_html__('Advanced Elements for Elementor', 'advanced-elements-elementor') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'advanced-elements-elementor') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice for minimum Elementor version
     */
    public function admin_notice_minimum_elementor_version() {
        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'advanced-elements-elementor'),
            '<strong>' . esc_html__('Advanced Elements for Elementor', 'advanced-elements-elementor') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'advanced-elements-elementor') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice for minimum PHP version
     */
    public function admin_notice_minimum_php_version() {
        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'advanced-elements-elementor'),
            '<strong>' . esc_html__('Advanced Elements for Elementor', 'advanced-elements-elementor') . '</strong>',
            '<strong>' . esc_html__('PHP', 'advanced-elements-elementor') . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Add a custom category for our widgets
     */
    public function add_elementor_widget_categories($elements_manager) {
        $elements_manager->add_category(
            'advanced-elements',
            [
                'title' => esc_html__('Advanced Elements', 'advanced-elements-elementor'),
                'icon' => 'fa fa-plug',
            ]
        );
    }

    /**
     * Register widgets
     */
    public function register_widgets() {
        // Include widget files
        require_once(__DIR__ . '/widgets/class-widgets.php');
        require_once(__DIR__ . '/widgets/platform-card-widget.php');
        require_once(__DIR__ . '/widgets/learn-grow-step-widget.php');
        require_once(__DIR__ . '/widgets/consultancy-grid-widget.php');
        require_once(__DIR__ . '/widgets/happy-customers-widget.php');
        require_once(__DIR__ . '/widgets/hero-section-widget.php');
        require_once(__DIR__ . '/widgets/courses-showcase-widget.php');
        require_once(__DIR__ . '/widgets/course-advantage-widget.php');
        require_once(__DIR__ . '/widgets/cloud-computing-widget.php');
        require_once(__DIR__ . '/widgets/why-choose-widget.php');
        require_once(__DIR__ . '/widgets/flowthermolab-team-widget.php');
        require_once(__DIR__ . '/widgets/flowthermolab-cta-widget.php');
        require_once(__DIR__ . '/widgets/hero-banner-widget.php');
        require_once(__DIR__ . '/widgets/contact-widget.php');
        require_once(__DIR__ . '/widgets/promotional-slider.php');
        require_once(__DIR__ . '/widgets/separator-widget.php');
        // require_once(__DIR__ . '/widgets/world-heatmap-widget.php');
        // Register widgets
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\Platform_Card_Widget());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\Learn_Grow_Step_Widget());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\Consultancy_Grid_Widget());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\Happy_Customers_Widget());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\Hero_Section_Widget());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\Courses_Showcase_Widget());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\Course_Advantage_Widget());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\Cloud_Computing_Widget());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\Why_Choose_Widget());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\Flowthermolab_Team_Widget());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\Flowthermolab_CTA_Widget());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\Hero_Banner_Widget());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\Contact_Widget());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\Promo_Slider_Widget());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\Custom_Separator_Widget());
        // \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Advanced_Elements\Widgets\World_HeatMap_Widget());
    }

    /**
     * Register widget styles
     */
    public function widget_styles() {
        wp_register_style('advanced-elements-widgets', plugins_url('assets/css/widgets.css', __FILE__));
        wp_register_style('advanced-elements-animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', [], '4.1.1');
        wp_register_style('advanced-elements-slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1');
        wp_register_style('advanced-elements-slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1');
        wp_register_style('advanced-elements-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4');

        wp_register_style('advanced-elements-platform-card', plugins_url('assets/css/platform-card.css', __FILE__));
        wp_register_style('advanced-elements-learn-grow', plugins_url('assets/css/learn-grow-achieve.css', __FILE__));
        wp_register_style('advanced-elements-consultancy-grid', plugins_url('assets/css/consultancy-grid.css', __FILE__));
        wp_register_style('advanced-elements-happy-customers', plugins_url('assets/css/happy-customers.css', __FILE__));
        wp_register_style('advanced-elements-hero-section', plugins_url('assets/css/hero-section.css', __FILE__));
        wp_register_style('advanced-elements-courses-showcase', plugins_url('assets/css/courses-showcase.css', __FILE__));
        wp_register_style('advanced-elements-course-advantage', plugins_url('assets/css/course-advantage.css', __FILE__));
        wp_register_style('advanced-elements-cloud-computing', plugins_url('assets/css/cloud-computing.css', __FILE__));
        wp_register_style('advanced-elements-why-choose', plugins_url('assets/css/why-choose.css', __FILE__));
        wp_register_style('advanced-elements-flowthermolab-team', plugins_url('assets/css/flowthermolab-team.css', __FILE__));
        wp_register_style('advanced-elements-flowthermolab-cta', plugins_url('assets/css/flowthermolab-cta.css', __FILE__));
        wp_register_style('advanced-elements-hero-banner', plugins_url('assets/css/hero-banner.css', __FILE__));
        wp_register_style('advanced-elements-contact', plugins_url('assets/css/contact.css', __FILE__));
        wp_register_style('advanced-elements-flowthermolab-footer', plugins_url('assets/css/flowthermolab-footer.css', __FILE__));
        wp_register_style('advanced-elements-promotional-slider', plugins_url('assets/css/promotional-slider.css', __FILE__));
        // wp_register_style('advanced-elements-world-heatmap', plugins_url('assets/css/world-heatmap.css', __FILE__));
        

        wp_enqueue_style('advanced-elements-widgets');
        wp_enqueue_style('advanced-elements-animate-css');
        wp_enqueue_style('advanced-elements-slick');
        wp_enqueue_style('advanced-elements-slick-theme');
        wp_enqueue_style('advanced-elements-font-awesome');

        wp_enqueue_style('advanced-elements-platform-card');
        wp_enqueue_style('advanced-elements-learn-grow');
        wp_enqueue_style('advanced-elements-consultancy-grid');
        wp_enqueue_style('advanced-elements-happy-customers');
        wp_enqueue_style('advanced-elements-hero-section');
        wp_enqueue_style('advanced-elements-courses-showcase');
        wp_enqueue_style('advanced-elements-course-advantage');
        wp_enqueue_style('advanced-elements-cloud-computing');
        wp_enqueue_style('advanced-elements-why-choose');
        wp_enqueue_style('advanced-elements-flowthermolab-team');
        wp_enqueue_style('advanced-elements-flowthermolab-cta');
        wp_enqueue_style('advanced-elements-hero-banner');
        wp_enqueue_style('advanced-elements-contact');
        wp_enqueue_style('advanced-elements-flowthermolab-footer');
        wp_enqueue_style('advanced-elements-promotional-slider');
        // wp_enqueue_style('advanced-elements-world-heatmap');
    }

    public function widget_scripts() { 
        wp_register_script('advanced-elements-slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), self::VERSION, true);
        wp_register_script('advanced-elements-lottie', 'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js', array('jquery'), self::VERSION, true);
        wp_register_script('advanced-elements-consultancy-grid', plugins_url('assets/js/consultancy-grid.js', __FILE__), ['jquery'], self::VERSION, true);
        wp_register_script('advanced-elements-widgets', plugins_url('assets/js/widgets.js', __FILE__), ['jquery'], self::VERSION, true);
        wp_register_script('advanced-elements-courses-tabs', plugins_url('assets/js/courses-tabs.js', __FILE__), ['jquery'], self::VERSION, true);
        wp_register_script('advanced-elements-why-choose', plugins_url('assets/js/why-choose.js', __FILE__), ['jquery'], self::VERSION, true);
        wp_register_script('advanced-elements-flowthermolab-landing', plugins_url('assets/js/flowthermolab-landing.js', __FILE__), ['jquery'], self::VERSION, true);
        wp_register_script('advanced-elements-promotional-slider', plugins_url('assets/js/promotional-slider.js', __FILE__), ['jquery'], self::VERSION, true);
        // wp_register_script('advanced-elements-world-heatmap', plugins_url('assets/js/world-heatmap.js', __FILE__), ['jquery'], self::VERSION, true);
        
        wp_enqueue_script('advanced-elements-slick');
        wp_enqueue_script('advanced-elements-lottie');
        wp_enqueue_script('advanced-elements-consultancy-grid');
        wp_enqueue_script('advanced-elements-widgets');
        wp_enqueue_script('advanced-elements-courses-tabs');
        wp_enqueue_script('advanced-elements-why-choose');
        wp_enqueue_script('advanced-elements-flowthermolab-landing');
        wp_enqueue_scripts('advanced-elements-promotional-slider');
        // wp_enqueue_scripts('advanced-elements-world-heatmap');
    }

    /**
        * Register the footer-about sidebar area for use in themes
    */
    public function register_footer_sidebar() {
        register_sidebar(
            array(
                'name'          => __('Footer About', 'advanced-elements-elementor'),
                'id'            => 'footer-about',
                'description'   => __('Widgets in this area will appear in the about section of the footer.', 'advanced-elements-elementor'),
                'before_widget' => '<div class="footer-about-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="footer-about-title">',
                'after_title'   => '</h4>',
            )
        );
        register_sidebar(
            array(
                'name'          => __('Footer Social', 'advanced-elements-elementor'),
                'id'            => 'footer-social',
                'description'   => __('Widgets in this area will appear in the social icons section of the footer.', 'advanced-elements-elementor'),
                'before_widget' => '<div class="footer-social-icons-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="footer-social-icons-title">',
                'after_title'   => '</h4>',
            )
        );
        register_sidebar(
            array(
                'name'          => __('Footer Subscription', 'advanced-elements-elementor'),
                'id'            => 'footer-subscription',
                'description'   => __('Widgets in this area will appear in the social subscription section of the footer.', 'advanced-elements-elementor'),
                'before_widget' => '<div class="footer-subscription-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="footer-subscription-title">',
                'after_title'   => '</h4>',
            )
        );
        register_sidebar(
            array(
                'name'          => __('Footer Address 1', 'advanced-elements-elementor'),
                'id'            => 'footer-address-1',
                'description'   => __('Widgets in this area will appear in the address 1 section of the footer.', 'advanced-elements-elementor'),
                'before_widget' => '<div class="footer-address-1-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="footer-address-1-title">',
                'after_title'   => '</h4>',
            )
        );
        register_sidebar(
            array(
                'name'          => __('Footer Address 2', 'advanced-elements-elementor'),
                'id'            => 'footer-address-2',
                'description'   => __('Widgets in this area will appear in the address 2 section of the footer.', 'advanced-elements-elementor'),
                'before_widget' => '<div class="footer-address-2-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="footer-address-2-title">',
                'after_title'   => '</h4>',
            )
        );
        register_sidebar(
            array(
                'name'          => __('Footer Quick Links', 'advanced-elements-elementor'),
                'id'            => 'footer-quick-links',
                'description'   => __('Widgets in this area will appear in the quick links section of the footer.', 'advanced-elements-elementor'),
                'before_widget' => '<div class="footer-quick-links-widget %2$s support-links">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="footer-quick-llinks-title">',
                'after_title'   => '</h5>',
            )
        );
        register_sidebar(
            array(
                'name'          => __('Footer Contact', 'advanced-elements-elementor'),
                'id'            => 'footer-contact',
                'description'   => __('Widgets in this area will appear in the contanct section of the footer.', 'advanced-elements-elementor'),
                'before_widget' => '<div class="footer-contact-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="footer-contact-title">',
                'after_title'   => '</h4>',
            )
        );
    }
    public function render_footer_shortcode($atts) {
        // Start output buffering to capture the HTML
        ob_start();
        ?>
        
            <section class="flowthermolab-footer">
                <div class="container">
                    <div class="footer-content">
                        <div class="row">
                            <!-- Logo & Description -->
                            <div class="col col-lg-6 text-center-mobile text-lg-start footer-logo">
                                <?php dynamic_sidebar('footer-about'); ?>
                            </div>
    
                            <!-- Newsletter Subscription -->
                            <div class="col col-lg-6 col-center-mobile align-self-center">
                                <?php dynamic_sidebar('footer-subscription'); ?>
                                <?php dynamic_sidebar('footer-social'); ?>
                            </div>
                            <div class="empty-space"></div>
                            <!-- Address Sections -->
                            <div class="col col-md-6 col-lg-3 text-center-mobile text-lg-start">
                                <div class="col-center-mobile">
                                    <?php dynamic_sidebar('footer-address-1'); ?>
                                </div>
                            </div>
    
                            <div class="col col-md-6 col-lg-3 text-center-mobile text-lg-start">
                                <div class="col-center-mobile">
                                    <?php dynamic_sidebar('footer-address-2'); ?>
                                </div>
                            </div>
    
                            <!-- Support Links -->
                            <div class="col col-md-6 col-lg-3 text-center-mobile">
                                <div class="col-center-mobile">
                                    <?php dynamic_sidebar('footer-quick-links'); ?>
                                </div>
                            </div>
    
                            <!-- Contact Information -->
                            <div class="col col-md-6 col-lg-3 text-center-mobile text-lg-start">
                                <div class="col-center-mobile">
                                    <?php dynamic_sidebar('footer-contact'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="container">
                    <div class="copyright">
                        <p><?= date('Y'); ?> © Copyright <b>Flowthermolab</b>. All Rights Reserved</p>
                    </div>
                </div>
            </section>
        
        <?php
        // Get the buffered content and clean the buffer
        $content = ob_get_clean();
        
        return $content;
    }

}

// Initialize the plugin
Advanced_Elements_Elementor_Addon::instance();