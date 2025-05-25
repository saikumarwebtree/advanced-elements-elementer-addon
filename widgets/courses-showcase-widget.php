<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Courses Showcase Widget
 */
class Courses_Showcase_Widget extends Widget_Base
{

    /**
     * Get widget name
     */
    public function get_name()
    {
        return 'courses_showcase';
    }

    /**
     * Get widget title
     */
    public function get_title()
    {
        return esc_html__('Courses Showcase', 'advanced-elementsx-elementor');
    }

    /**
     * Get widget icon
     */
    public function get_icon()
    {
        return 'eicon-posts-grid';
    }

    /**
     * Get widget keywords
     */
    public function get_keywords()
    {
        return ['courses', 'products', 'woocommerce', 'grid', 'showcase', 'tabs'];
    }

    /**
     * Get script depends
     */
    public function get_script_depends()
    {
        return ['advanced-elements-courses-tabs'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends()
    {
        return ['advanced-elements-widgets', 'advanced-elements-courses-showcase'];
    }

    /**
     * Register widget controls
     */
    protected function _register_controls()
    {

        // Content Section - Header
        $this->start_controls_section(
            'section_header',
            [
                'label' => esc_html__('Header', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Courses', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter subtitle', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Master Computational Engineering', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter title', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('From beginner to advanced, our courses empower you with practical skills in CFD, FEA, and more.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter description', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'badge_text',
            [
                'label' => esc_html__('Badge Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Risk free', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter badge text', 'advanced-elements-elementor'),
            ]
        );

        /*$this->add_control(
            'badge_subtext',
            [
                'label' => esc_html__('Badge Subtext', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('100% Money-back Guarantee', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter badge subtext', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'badge_icon',
            [
                'label' => esc_html__('Badge Icon', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-award',
                    'library' => 'fa-solid',
                ],
            ]
        );*/

        $this->add_control(
            'promise_text',
            [
                'label' => esc_html__('Promise Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Your satisfaction matters—get a full refund within 5 days if needed!', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter promise text', 'advanced-elements-elementor'),
                'rows' => 2,
            ]
        );

        $this->add_control(
            'circle_main_text',
            [
                'label' => esc_html__('Circle Main Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('100%', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter main text', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'circle_small_text',
            [
                'label' => esc_html__('Circle Small Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('PROMISE', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter small text', 'advanced-elements-elementor'),
            ]
        );


        $this->end_controls_section();

        // Content Section - Categories & Tabs
        $this->start_controls_section(
            'section_categories',
            [
                'label' => esc_html__('Categories & Tabs', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_all_tab',
            [
                'label' => esc_html__('Show "All" Tab', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'all_tab_text',
            [
                'label' => esc_html__('All Tab Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('All', 'advanced-elements-elementor'),
                'condition' => [
                    'show_all_tab' => 'yes',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tab_title',
            [
                'label' => esc_html__('Tab Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Category', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter tab title', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'product_source',
            [
                'label' => esc_html__('Product Source', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'category',
                'options' => [
                    'category' => esc_html__('Product Category', 'advanced-elements-elementor'),
                    'custom' => esc_html__('Custom Selection', 'advanced-elements-elementor'),
                    'ld_category' => esc_html__('LearnDash Course Category', 'advanced-elements-elementor'),
                    'ld_custom' => esc_html__('LearnDash Custom Courses', 'advanced-elements-elementor'),
                    'manual_courses' => esc_html__('Manual Course Creation', 'advanced-elements-elementor'),
                ],
            ]
        );

        // Manual Course Creation Repeater
        $course_repeater = new \Elementor\Repeater();

        $course_repeater->add_control(
            'course_image',
            [
                'label' => esc_html__('Course Image', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $course_repeater->add_control(
            'course_title',
            [
                'label' => esc_html__('Course Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Course Title', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter course title', 'advanced-elements-elementor'),
                'label_block' => true,
            ]
        );

        $course_repeater->add_control(
            'course_lessons',
            [
                'label' => esc_html__('Number of Lessons', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '10',
                'placeholder' => esc_html__('e.g., 10', 'advanced-elements-elementor'),
            ]
        );

        $course_repeater->add_control(
            'course_duration',
            [
                'label' => esc_html__('Course Duration', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '5h 30m',
                'placeholder' => esc_html__('e.g., 5h 30m', 'advanced-elements-elementor'),
            ]
        );

        $course_repeater->add_control(
            'course_price',
            [
                'label' => esc_html__('Course Price', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '$99',
                'placeholder' => esc_html__('e.g., $99 or Free', 'advanced-elements-elementor'),
            ]
        );

        $course_repeater->add_control(
            'course_regular_price',
            [
                'label' => esc_html__('Regular Price (Optional)', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => esc_html__('e.g., $149', 'advanced-elements-elementor'),
                'description' => esc_html__('Leave empty if no discount price', 'advanced-elements-elementor'),
            ]
        );

        $course_repeater->add_control(
            'course_link',
            [
                'label' => esc_html__('Course Link', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-course-link.com', 'advanced-elements-elementor'),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $course_repeater->add_control(
            'course_rating',
            [
                'label' => esc_html__('Course Rating', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 5,
                'step' => 0.1,
                'default' => 4.5,
                'description' => esc_html__('Enter rating from 0 to 5', 'advanced-elements-elementor'),
            ]
        );

        $course_repeater->add_control(
            'course_rating_count',
            [
                'label' => esc_html__('Rating Count', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'default' => 125,
                'description' => esc_html__('Number of people who rated', 'advanced-elements-elementor'),
            ]
        );

        $course_repeater->add_control(
            'course_badge',
            [
                'label' => esc_html__('Course Badge (Optional)', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => esc_html__('e.g., Bestseller, New', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'manual_courses',
            [
                'label' => esc_html__('Manual Courses', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $course_repeater->get_controls(),
                'default' => [
                    [
                        'course_title' => esc_html__('Sample Course 1', 'advanced-elements-elementor'),
                        'course_lessons' => '12',
                        'course_duration' => '6h 45m',
                        'course_price' => '$99',
                        'course_rating' => 4.8,
                        'course_rating_count' => 245,
                    ],
                    [
                        'course_title' => esc_html__('Sample Course 2', 'advanced-elements-elementor'),
                        'course_lessons' => '8',
                        'course_duration' => '4h 20m',
                        'course_price' => '$79',
                        'course_rating' => 4.6,
                        'course_rating_count' => 189,
                    ],
                ],
                'title_field' => '{{{ course_title }}}',
                'condition' => [
                    'product_source' => 'manual_courses',
                ],
            ]
        );

        // Check if LearnDash is active
        if (defined('LEARNDASH_VERSION')) {
            $ld_categories = get_terms([
                'taxonomy' => 'ld_course_category', // LearnDash course category taxonomy
                'hide_empty' => true,
            ]);

            $ld_categories_options = [];
            foreach ($ld_categories as $category) {
                $ld_categories_options[$category->term_id] = $category->name;
            }

            $repeater->add_control(
                'ld_course_category',
                [
                    'label' => esc_html__('Select LearnDash Category', 'advanced-elements-elementor'),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'label_block' => true,
                    'options' => $ld_categories_options,
                    'condition' => [
                        'product_source' => 'ld_category',
                    ],
                ]
            );

            // Get all LearnDash courses
            $courses = get_posts([
                'post_type' => 'sfwd-courses', // LearnDash course post type
                'post_status' => 'publish',
                'numberposts' => -1,
            ]);

            $course_options = [];
            foreach ($courses as $course) {
                $course_options[$course->ID] = $course->post_title;
            }

            $repeater->add_control(
                'ld_custom_courses',
                [
                    'label' => esc_html__('Select LearnDash Courses', 'advanced-elements-elementor'),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => $course_options,
                    'condition' => [
                        'product_source' => 'ld_custom',
                    ],
                ]
            );

            /*$repeater->add_control(
                'number_of_products',
                [
                    'label' => esc_html__('Number of Products', 'advanced-elements-elementor'),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'description' => esc_html__('Enter how many products to display. Enter -1 to show all products.', 'advanced-elements-elementor'),
                    'default' => -1,
                    'min' => -1,
                    'step' => 1,
                ]
            );*/

        } else {
            $repeater->add_control(
                'learndash_notice',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => esc_html__('LearnDash is not active. Please install and activate LearnDash to use course features.', 'advanced-elements-elementor'),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
                    'condition' => [
                        'product_source' => ['ld_category', 'ld_custom'],
                    ],
                ]
            );
        }

        // Only show if WooCommerce is active
        if (class_exists('WooCommerce')) {
            $product_categories = get_terms([
                'taxonomy' => 'product_cat',
                'hide_empty' => true,
            ]);

            $categories = [];
            foreach ($product_categories as $category) {
                $categories[$category->term_id] = $category->name;
            }

            $repeater->add_control(
                'product_category',
                [
                    'label' => esc_html__('Select Category', 'advanced-elements-elementor'),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'label_block' => true,
                    'options' => $categories,
                    'condition' => [
                        'product_source' => 'category',
                    ],
                ]
            );

            $repeater->add_control(
                'category_url',
                [
                    'label' => esc_html__('Category URL', 'advanced-elements-elementor'),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'advanced-elements-elementor'),
                    'default' => [
                        'url' => '',
                        'is_external' => false,
                        'nofollow' => false,
                    ],
                    'condition' => [
                        'product_source' => 'category',
                    ],
                ]
            );

            // Get all products
            $products = get_posts([
                'post_type' => 'product',
                'post_status' => 'publish',
                'numberposts' => -1,
            ]);

            $product_options = [];
            foreach ($products as $product) {
                $product_options[$product->ID] = $product->post_title;
            }

            $repeater->add_control(
                'custom_products',
                [
                    'label' => esc_html__('Select Products', 'advanced-elements-elementor'),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => $product_options,
                    'condition' => [
                        'product_source' => 'custom',
                    ],
                ]
            );
        } else {
            $repeater->add_control(
                'woocommerce_notice',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => esc_html__('WooCommerce is not active. Please install and activate WooCommerce to use product features.', 'advanced-elements-elementor'),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
                ]
            );
        }

        $repeater->add_control(
            'view_all_text',
            [
                'label' => esc_html__('View All Button Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Courses', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'view_all_url',
            [
                'label' => esc_html__('View All URL', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'advanced-elements-elementor'),
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label' => esc_html__('Tabs', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tab_title' => esc_html__('Live Workshops', 'advanced-elements-elementor'),
                        'product_source' => 'category',
                    ],
                    [
                        'tab_title' => esc_html__('CFD - Courses', 'advanced-elements-elementor'),
                        'product_source' => 'category',
                    ],
                    [
                        'tab_title' => esc_html__('Coding Courses', 'advanced-elements-elementor'),
                        'product_source' => 'category',
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );

        $this->add_control(
            'number_of_products',
            [
                'label' => esc_html__('Products Per Tab', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => -1,
                'max' => 20,
                'step' => 1,
                'default' => 4,
            ]
        );

        $this->end_controls_section();

        // Content Section - Product Display Settings
        $this->start_controls_section(
            'section_product_display',
            [
                'label' => esc_html__('Product Display Settings', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_rating',
            [
                'label' => esc_html__('Show Rating', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_price',
            [
                'label' => esc_html__('Show Price', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_sale_price',
            [
                'label' => esc_html__('Show Sale Price', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
                'condition' => [
                    'show_price' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'show_product_meta',
            [
                'label' => esc_html__('Show Product Meta', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'lesson_text',
            [
                'label' => esc_html__('Lesson Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Lesson', 'advanced-elements-elementor'),
                'condition' => [
                    'show_product_meta' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'duration_text',
            [
                'label' => esc_html__('Duration Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Duration', 'advanced-elements-elementor'),
                'condition' => [
                    'show_product_meta' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'product_badge_text',
            [
                'label' => esc_html__('Product Badge Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('CFD Software', 'advanced-elements-elementor'),
            ]
        );

        $this->end_controls_section();

        // Style Section - Header
        $this->start_controls_section(
            'section_style_header',
            [
                'label' => esc_html__('Header Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .courses-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .courses-subtitle',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .courses-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .courses-title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .courses-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .courses-description',
            ]
        );

        $this->end_controls_section();

        // Style Section - Badge
        $this->start_controls_section(
            'section_style_badge',
            [
                'label' => esc_html__('Badge Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'badge_background_color',
            [
                'label' => esc_html__('Badge Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .courses-badge' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'badge_text_color',
            [
                'label' => esc_html__('Badge Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .courses-badge-text, {{WRAPPER}} .courses-badge-subtext' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'badge_icon_color',
            [
                'label' => esc_html__('Badge Icon Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .courses-badge-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .courses-badge-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'badge_size',
            [
                'label' => esc_html__('Badge Size', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 60,
                        'max' => 200,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 120,
                ],
                'selectors' => [
                    '{{WRAPPER}} .courses-badge' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Tabs
        $this->start_controls_section(
            'section_style_tabs',
            [
                'label' => esc_html__('Tabs Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tabs_background_color',
            [
                'label' => esc_html__('Tabs Background', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .courses-tabs' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tabs_spacing',
            [
                'label' => esc_html__('Tabs Spacing', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .courses-tab-item' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_style_tabs');

        $this->start_controls_tab(
            'tabs_style_normal',
            [
                'label' => esc_html__('Normal', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'tab_color',
            [
                'label' => esc_html__('Tab Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .courses-tab-item' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tab_background_color',
            [
                'label' => esc_html__('Tab Background', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .courses-tab-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'tab_border',
                'selector' => '{{WRAPPER}} .courses-tab-item',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tabs_style_active',
            [
                'label' => esc_html__('Active', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'active_tab_color',
            [
                'label' => esc_html__('Active Tab Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .courses-tab-item.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'active_tab_background_color',
            [
                'label' => esc_html__('Active Tab Background', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .courses-tab-item.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'active_tab_border',
                'selector' => '{{WRAPPER}} .courses-tab-item.active',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'tab_border_radius',
            [
                'label' => esc_html__('Border Radius', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => '50',
                    'right' => '50',
                    'bottom' => '50',
                    'left' => '50',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .courses-tab-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'tab_padding',
            [
                'label' => esc_html__('Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'default' => [
                    'top' => '10',
                    'right' => '20',
                    'bottom' => '10',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .courses-tab-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Course Cards
        $this->start_controls_section(
            'section_style_cards',
            [
                'label' => esc_html__('Course Cards Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_background_color',
            [
                'label' => esc_html__('Card Background', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#1c2432',
                'selectors' => [
                    '{{WRAPPER}} .course-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => esc_html__('Border Radius', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => '10',
                    'right' => '10',
                    'bottom' => '10',
                    'left' => '10',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .course-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .course-card-image' => 'border-top-left-radius: {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'selector' => '{{WRAPPER}} .course-card',
            ]
        );

        $this->add_control(
            'card_title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .course-card-title' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'card_title_typography',
                'selector' => '{{WRAPPER}} .course-card-title',
            ]
        );

        $this->add_control(
            'card_meta_color',
            [
                'label' => esc_html__('Meta Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .course-card-meta' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_price_color',
            [
                'label' => esc_html__('Price Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .course-card-price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_regular_price_color',
            [
                'label' => esc_html__('Regular Price Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#888888',
                'selectors' => [
                    '{{WRAPPER}} .course-card-regular-price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_badge_background_color',
            [
                'label' => esc_html__('Badge Background', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#e63946',
                'selectors' => [
                    '{{WRAPPER}} .course-card-badge' => 'background-color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'card_badge_color',
            [
                'label' => esc_html__('Badge Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .course-card-badge' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'star_rating_color',
            [
                'label' => esc_html__('Star Rating Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffc107',
                'selectors' => [
                    '{{WRAPPER}} .course-card-rating i.fas' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'empty_star_color',
            [
                'label' => esc_html__('Empty Star Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .course-card-rating i.far' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - View All Button
        $this->start_controls_section(
            'section_style_view_all',
            [
                'label' => esc_html__('View All Button', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'view_all_typography',
                'selector' => '{{WRAPPER}} .view-all-button',
            ]
        );

        $this->start_controls_tabs('view_all_style_tabs');

        $this->start_controls_tab(
            'view_all_style_normal',
            [
                'label' => esc_html__('Normal', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'view_all_color',
            [
                'label' => esc_html__('Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .view-all-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'view_all_background_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'transparent',
                'selectors' => [
                    '{{WRAPPER}} .view-all-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'view_all_border_color',
            [
                'label' => esc_html__('Border Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .view-all-button' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'view_all_style_hover',
            [
                'label' => esc_html__('Hover', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'view_all_hover_color',
            [
                'label' => esc_html__('Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .view-all-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'view_all_hover_background_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .view-all-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'view_all_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .view-all-button:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'view_all_border',
                'selector' => '{{WRAPPER}} .view-all-button',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'view_all_border_radius',
            [
                'label' => esc_html__('Border Radius', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .view-all-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'view_all_padding',
            [
                'label' => esc_html__('Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .view-all-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Background Settings
        $this->start_controls_section(
            'section_background',
            [
                'label' => esc_html__('Background', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__('Background', 'advanced-elements-elementor'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .courses-showcase-container',
                'default' => [
                    'color' => '#0c1221',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => esc_html__('Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .courses-showcase-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '60',
                    'right' => '20',
                    'bottom' => '60',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Generate a unique ID for the tabs
        $tabs_id = 'courses-tabs-' . $this->get_id();
        ?>

        <div class="courses-showcase-container">
            <div class="courses-showcase-content">
                <!-- Header Section -->
                <div class="courses-header">
                    <div class="courses-header-left animate-on-scroll" data-animation="animate__fadeInUp">
                        <?php if (!empty($settings['subtitle'])): ?>
                            <h5 class="courses-subtitle"><?php echo esc_html($settings['subtitle']); ?></h5>
                        <?php endif; ?>

                        <?php if (!empty($settings['title'])): ?>
                            <h2 class="courses-title"><?php echo esc_html($settings['title']); ?></h2>
                        <?php endif; ?>

                        <?php if (!empty($settings['description'])): ?>
                            <p class="courses-description"><?php echo esc_html($settings['description']); ?></p>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($settings['badge_text'])): ?>
                        <div class="badge-circle-button-container animate-on-scroll" data-animation="animate__fadeInUp">
                            <?php if (!empty($settings['promise_text'])): ?>
                                <div class="promise-text">
                                    <p><?php echo esc_html($settings['promise_text']); ?></p>
                                </div>
                            <?php endif; ?>

                            <div class="circle-button">
                                <div class="play-icon">
                                    <?php if (!empty($settings['circle_main_text'])): ?>
                                        <?php echo esc_html($settings['circle_main_text']); ?>
                                    <?php endif; ?>

                                    <?php if (!empty($settings['circle_small_text'])): ?>
                                        <small><?php echo esc_html($settings['circle_small_text']); ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php /*
                        <div class="badge-circle-button-container animate-on-scroll" data-animation="animate__fadeInUp">
                            <div class="circle-button">
                                <svg viewBox="0 0 280 280" class="text-ring">
                                    <defs>
                                        <path id="circlePath" d="M140,140 m-85,0 a85,85 0 1,1 170,0 a85,85 0 1,1 -170,0"></path>
                                    </defs>
                                    <text>
                                        <textPath href="#circlePath" startOffset="0%">
                                            <?php echo esc_html($settings['badge_text']); ?>
                                        </textPath>
                                    </text>
                                </svg>

                                <!-- Center Play Icon -->
                                <div class="play-icon">
                                    <?php \Elementor\Icons_Manager::render_icon($settings['badge_icon'], ['aria-hidden' => 'true']); ?>
                                </div>
                            </div>
                        </div>
                        */ ?>
                        <?php /*<div class="courses-header-right">
                                      <div class="courses-badge">
                                          <div class="courses-badge-icon">
                                              <?php \Elementor\Icons_Manager::render_icon($settings['badge_icon'], ['aria-hidden' => 'true']); ?>
                                          </div>
                                          <div class="courses-badge-content">
                                              <div class="courses-badge-text"><?php echo esc_html($settings['badge_text']); ?></div>
                                              <?php if (!empty($settings['badge_subtext'])) : ?>
                                                  <div class="courses-badge-subtext"><?php echo esc_html($settings['badge_subtext']); ?></div>
                                              <?php endif; ?>
                                          </div>
                                      </div>
                                  </div>*/ ?>
                    <?php endif; ?>
                </div>

                <!-- Tabs Section -->
                <div class="courses-tabs-container  animate-on-scroll" data-animation="animate__fadeInUp">
                    <div class="courses-tabs" id="<?php echo esc_attr($tabs_id); ?>">
                        <?php if ('yes' === $settings['show_all_tab']): ?>
                            <div class="courses-tab-item active" data-tab="all">
                                <?php echo esc_html($settings['all_tab_text']); ?>
                            </div>
                        <?php endif; ?>

                        <?php foreach ($settings['tabs'] as $index => $tab):
                            $tab_id = 'tab-' . $index;
                            $is_active = 'yes' !== $settings['show_all_tab'] && $index === 0 ? 'active' : '';
                            ?>
                            <div class="courses-tab-item <?php echo esc_attr($is_active); ?>"
                                data-tab="<?php echo esc_attr($tab_id); ?>">
                                <?php echo esc_html($tab['tab_title']); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Tab Content -->
                <div class="courses-tab-content  animate-on-scroll" data-animation="animate__fadeInUp">
                    <?php
                    // All tab content (if enabled)
                    if ('yes' === $settings['show_all_tab']): ?>
                        <div class="tab-pane active" data-tab-content="all">
                            <div class="courses-grid">
                                <?php
                                // Get products from all tabs (limited to avoid duplicates)
                                $all_products = [];
                                $count = 0;

                                // Only process if WooCommerce is active
                                if (class_exists('WooCommerce')) {
                                    foreach ($settings['tabs'] as $tab) {
                                        if ($tab['product_source'] === 'category' && !empty($tab['product_category'])) {
                                            // Get products from category
                                            $args = [
                                                'post_type' => 'product',
                                                'posts_per_page' => ceil($settings['number_of_products'] / count($settings['tabs'])),
                                                'tax_query' => [
                                                    [
                                                        'taxonomy' => 'product_cat',
                                                        'field' => 'term_id',
                                                        'terms' => $tab['product_category'],
                                                    ],
                                                ],
                                            ];

                                            $products = get_posts($args);

                                            foreach ($products as $product) {
                                                if (!isset($all_products[$product->ID])) {
                                                    $all_products[$product->ID] = $product;
                                                    $count++;

                                                    if ($count >= $settings['number_of_products']) {
                                                        break 2;
                                                    }
                                                }
                                            }
                                        } elseif ($tab['product_source'] === 'custom' && !empty($tab['custom_products'])) {
                                            // Get custom selected products
                                            foreach ($tab['custom_products'] as $product_id) {
                                                if (!isset($all_products[$product_id])) {
                                                    $product = get_post($product_id);
                                                    if ($product) {
                                                        $all_products[$product_id] = $product;
                                                        $count++;

                                                        if ($count >= $settings['number_of_products']) {
                                                            break 2;
                                                        }
                                                    }
                                                }
                                            }
                                        } elseif ($tab['product_source'] === 'ld_category' && !empty($tab['ld_course_category'])) {
                                            $number_of_products = $settings['number_of_products'];
                                            // Get courses from LearnDash category
                                            $args = [
                                                'post_type' => 'sfwd-courses',
                                                'order_by' => 'date',  // Order by date
                                                'order' => 'DESC',
                                                'tax_query' => [
                                                    [
                                                        'taxonomy' => 'ld_course_category',
                                                        'field' => 'term_id',
                                                        'terms' => $tab['ld_course_category'],
                                                    ],
                                                ],
                                            ];

                                            if ($number_of_products !== -1) {
                                                $args['posts_per_page'] = intval($number_of_products);
                                            } else {
                                                $args['posts_per_page'] = -1; // WordPress way of saying "get all posts"
                                            }

                                            $courses = get_posts($args);

                                            // Render the courses
                                            foreach ($courses as $course) {
                                                $this->render_course_card($course, $settings);
                                            }
                                        } elseif ($tab['product_source'] === 'ld_custom' && !empty($tab['ld_custom_courses'])) {
                                            // Get custom selected courses
                                            foreach ($tab['ld_custom_courses'] as $course_id) {
                                                $course = get_post($course_id);
                                                if ($course) {
                                                    $this->render_course_card($course, $settings);
                                                }
                                            }
                                        } elseif ($tab['product_source'] === 'manual_courses' && !empty($tab['manual_courses'])) {
                                            // Get manual courses
                                            $manual_courses = $tab['manual_courses'];
                                            
                                            // Limit to the specified number if needed
                                            if ($settings['number_of_products'] > 0) {
                                                $manual_courses = array_slice($manual_courses, 0, $settings['number_of_products']);
                                            }
                                            
                                            // Render the manual courses
                                            foreach ($manual_courses as $course_data) {
                                                $this->render_manual_course_card($course_data, $settings);
                                            }
                                        }
                                    }

                                    // Render the products
                                    foreach ($all_products as $product) {
                                        $this->render_product_card($product, $settings);
                                    }
                                } else {
                                    echo '<p>' . esc_html__('WooCommerce is not active. Please install and activate WooCommerce to display products.', 'advanced-elements-elementor') . '</p>';
                                }
                                ?>
                            </div>

                            <?php
                            // Display View All button if any tab has a view all URL
                            $has_view_all = false;
                            $view_all_url = '';
                            $view_all_text = '';

                            foreach ($settings['tabs'] as $tab) {
                                if (!empty($tab['view_all_url']['url'])) {
                                    $has_view_all = true;
                                    $view_all_url = $tab['view_all_url']['url'];
                                    $view_all_text = $tab['view_all_text'];
                                    break;
                                }
                            }

                            if ($has_view_all): ?>
                                <div class="view-all-container">
                                    <a href="<?php echo esc_url($view_all_url); ?>" class="view-all-button">
                                        <?php echo esc_html($view_all_text); ?> <span class="arrow-icon">→</span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    // Individual tab content
                    foreach ($settings['tabs'] as $index => $tab):
                        $tab_id = 'tab-' . $index;
                        $is_active = 'yes' !== $settings['show_all_tab'] && $index === 0 ? 'active' : '';
                        ?>
                        <div class="tab-pane <?php echo esc_attr($is_active); ?>"
                            data-tab-content="<?php echo esc_attr($tab_id); ?>">
                            <div class="courses-grid">
                                <?php
                                // Only process if WooCommerce is active
                                if (class_exists('WooCommerce')) {
                                    $products = [];

                                    if ($tab['product_source'] === 'category' && !empty($tab['product_category'])) {
                                        // Get products from category
                                        $args = [
                                            'post_type' => 'product',
                                            'posts_per_page' => $settings['number_of_products'],
                                            'tax_query' => [
                                                [
                                                    'taxonomy' => 'product_cat',
                                                    'field' => 'term_id',
                                                    'terms' => $tab['product_category'],
                                                ],
                                            ],
                                        ];

                                        $products = get_posts($args);
                                    } elseif ($tab['product_source'] === 'custom' && !empty($tab['custom_products'])) {
                                        // Get custom selected products
                                        foreach ($tab['custom_products'] as $product_id) {
                                            $product = get_post($product_id);
                                            if ($product) {
                                                $products[] = $product;
                                            }
                                        }

                                        // Limit to the specified number
                                        $products = array_slice($products, 0, $settings['number_of_products']);
                                    } elseif ($tab['product_source'] === 'ld_category' && !empty($tab['ld_course_category'])) {
                                        $number_of_products = $settings['number_of_products'];
                                        // Get courses from LearnDash category
                                        $args = [
                                            'post_type' => 'sfwd-courses',
                                            'order_by' => 'date',  // Order by date
                                            'order' => 'DESC',
                                            'tax_query' => [
                                                [
                                                    'taxonomy' => 'ld_course_category',
                                                    'field' => 'term_id',
                                                    'terms' => $tab['ld_course_category'],
                                                ],
                                            ],
                                        ];

                                        if ($number_of_products !== -1) {
                                            $args['posts_per_page'] = intval($number_of_products);
                                        } else {
                                            $args['posts_per_page'] = -1; // WordPress way of saying "get all posts"
                                        }

                                        $courses = get_posts($args);

                                        // Render the courses
                                        foreach ($courses as $course) {
                                            $this->render_course_card($course, $settings);
                                        }
                                    } elseif ($tab['product_source'] === 'ld_custom' && !empty($tab['ld_custom_courses'])) {
                                        // Get custom selected courses
                                        foreach ($tab['ld_custom_courses'] as $course_id) {
                                            $course = get_post($course_id);
                                            if ($course) {
                                                $this->render_course_card($course, $settings);
                                            }
                                        }
                                    } elseif ($tab['product_source'] === 'manual_courses' && !empty($tab['manual_courses'])) {
                                        // Get manual courses
                                        $manual_courses = $tab['manual_courses'];
                                        
                                        // Limit to the specified number if needed
                                        if ($settings['number_of_products'] > 0) {
                                            $manual_courses = array_slice($manual_courses, 0, $settings['number_of_products']);
                                        }
                                        
                                        // Render the manual courses
                                        foreach ($manual_courses as $course_data) {
                                            $this->render_manual_course_card($course_data, $settings);
                                        }
                                    }

                                    // Render the products
                                    foreach ($products as $product) {
                                        $this->render_product_card($product, $settings);
                                    }
                                } else {
                                    echo '<p>' . esc_html__('WooCommerce is not active. Please install and activate WooCommerce to display products.', 'advanced-elements-elementor') . '</p>';
                                }
                                ?>
                            </div>

                            <?php if (!empty($tab['view_all_url']['url'])): ?>
                                <div class="view-all-container">
                                    <a href="<?php echo esc_url($tab['view_all_url']['url']); ?>" class="view-all-button">
                                        <?php echo esc_html($tab['view_all_text']); ?> <span class="arrow-icon">→</span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Tab functionality
                const tabsContainer = document.getElementById('<?php echo esc_js($tabs_id); ?>');
                const tabItems = tabsContainer.querySelectorAll('.courses-tab-item');
                const tabPanes = document.querySelectorAll('.tab-pane');

                tabItems.forEach(function (tab) {
                    tab.addEventListener('click', function () {
                        // Remove active class from all tabs
                        tabItems.forEach(function (item) {
                            item.classList.remove('active');
                        });

                        // Add active class to clicked tab
                        this.classList.add('active');

                        // Show corresponding tab content
                        const tabId = this.getAttribute('data-tab');

                        tabPanes.forEach(function (pane) {
                            pane.classList.remove('active');

                            if (pane.getAttribute('data-tab-content') === tabId) {
                                pane.classList.add('active');
                            }
                        });
                    });
                });
            });
        </script>
        <?php
    }

    /**
     * Render a product card
     */

    /**
     * Render a LearnDash course card
     */
    private function render_course_card($course, $settings)
    {
        if (!defined('LEARNDASH_VERSION')) {
            return;
        }

        $course_id = $course->ID;
        $course_permalink = get_permalink($course_id);
        $course_title = get_the_title($course_id);
        $course_image = get_the_post_thumbnail_url($course_id, 'medium') ?: \Elementor\Utils::get_placeholder_image_src();

        // Get course meta
        $lessons_count = learndash_get_course_lessons_list($course_id) ? count(learndash_get_course_lessons_list($course_id)) : 0;

        // Get course duration - depends on how you store it
        $duration = get_post_meta($course_id, '_ld_course_duration', true) ?: '';

        // Price - for LearnDash courses if you have pricing enabled
        $price = '';
        if (function_exists('learndash_get_course_price')) {
            $course_pricing = learndash_get_course_price($course_id);
            if (!empty($course_pricing) && $course_pricing['type'] !== 'open') {
                if ($course_pricing['type'] === 'free') {
                    $price = __('Free', 'advanced-elements-elementor');
                } else {
                    // Get currency symbol
                    $currency = '';
                    if (function_exists('learndash_get_currency_symbol')) {
                        $currency = learndash_get_currency_symbol();
                    } else {
                        // Fallback to WooCommerce currency symbol if available
                        if (function_exists('get_woocommerce_currency_symbol')) {
                            $currency = get_woocommerce_currency_symbol();
                        } else {
                            // Default fallback
                            $currency = '$';
                        }
                    }

                    $price = $currency . $course_pricing['price'];

                    // Add subscription info if applicable
                    if (!empty($course_pricing['price_type']) && $course_pricing['price_type'] === 'subscribe') {
                        $price .= '/' . $course_pricing['interval_count'] . ' ' . $course_pricing['interval'];
                    }
                }
            }
        }

        // Badge text
        $badge_text = $settings['product_badge_text'];
        ?>
        <div class="course-card">
            <?php if (!empty($badge_text)): ?>
                <!-- <div class="course-card-badge"><?php echo esc_html($badge_text); ?></div> -->
            <?php endif; ?>

            <div class="course-card-image">
                <img src="<?php echo esc_url($course_image); ?>" alt="<?php echo esc_attr($course_title); ?>">
            </div>

            <div class="course-card-content">
                <h3 class="course-card-title">
                    <a href="<?php echo esc_url($course_permalink); ?>"><?php echo esc_html($course_title); ?></a>
                </h3>

                <?php if ('yes' === $settings['show_product_meta']): ?>
                    <div class="course-card-meta">
                        <span class="course-card-lessons">
                            <i class="fas fa-book"></i> <?php echo esc_html($settings['lesson_text']); ?>
                            <?php echo esc_html($lessons_count); ?>
                        </span>
                        <?php if (!empty($duration)): ?>
                            <span class="course-card-duration">
                                <i class="fas fa-clock"></i> <?php echo esc_html($duration); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ('yes' === $settings['show_price'] && !empty($price)): ?>
                    <div class="course-card-price-container">
                        <div class="course-card-price">
                            <?php echo esc_html($price); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
    private function render_product_card($product, $settings)
    {
        if (!class_exists('WooCommerce')) {
            return;
        }

        $product_id = $product->ID;
        $product_obj = wc_get_product($product_id);

        if (!$product_obj) {
            return;
        }

        $product_permalink = get_permalink($product_id);
        $product_title = get_the_title($product_id);
        $product_image = get_the_post_thumbnail_url($product_id, 'medium') ?: \Elementor\Utils::get_placeholder_image_src();

        // Get product meta (can be customized to use your actual product meta keys)
        $lessons = get_post_meta($product_id, '_lessons', true) ?: '10';
        $duration = get_post_meta($product_id, '_duration', true) ?: '19h 30m';

        // Rating
        $rating = $product_obj->get_average_rating();
        $rating_count = $product_obj->get_rating_count();

        // Price
        $price = $product_obj->get_price_html();

        // Custom badge
        $badge_text = $settings['product_badge_text'];
        ?>
        <div class="course-card">
            <?php if (!empty($badge_text)): ?>
                <!-- <div class="course-card-badge"><?php echo esc_html($badge_text); ?></div> -->
            <?php endif; ?>

            <div class="course-card-image">
                <img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_title); ?>">
            </div>

            <div class="course-card-content">
                <?php if ('yes' === $settings['show_rating'] && $rating > 0): ?>
                    <div class="course-card-rating">
                        <?php
                        // Display stars
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= floor($rating)) {
                                echo '<i class="fas fa-star"></i>';
                            } elseif ($i - 0.5 <= $rating) {
                                echo '<i class="fas fa-star-half-alt"></i>';
                            } else {
                                echo '<i class="far fa-star"></i>';
                            }
                        }

                        // Display rating count
                        echo '(' . number_format_i18n($rating_count) . ')';
                        ?>
                    </div>
                <?php endif; ?>

                <h3 class="course-card-title">
                    <a href="<?php echo esc_url($product_permalink); ?>"><?php echo esc_html($product_title); ?></a>
                </h3>

                <?php if ('yes' === $settings['show_product_meta']): ?>
                    <div class="course-card-meta">
                        <span class="course-card-lessons">
                            <i class="fas fa-book"></i> <?php echo esc_html($settings['lesson_text']); ?>
                            <?php echo esc_html($lessons); ?>
                        </span>
                        <span class="course-card-duration">
                            <i class="fas fa-clock"></i> <?php echo esc_html($duration); ?>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if ('yes' === $settings['show_price']): ?>
                    <div class="course-card-price-container">
                        <div class="course-card-price">
                            <?php
                            // Display price
                            if ($product_obj->is_on_sale() && 'yes' === $settings['show_sale_price']) {
                                $regular_price = $product_obj->get_regular_price();
                                $sale_price = $product_obj->get_sale_price();

                                if (!empty($regular_price) && !empty($sale_price)) {
                                    echo '<span class="course-card-sale-price">' . wc_price($sale_price) . '</span> ';
                                    echo '<span class="course-card-regular-price"><del>' . wc_price($regular_price) . '</del></span>';
                                } else {
                                    echo wp_kses_post($price);
                                }
                            } else {
                                echo wp_kses_post($price);
                            }
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

    /**
     * Render a manual course card
     */
    private function render_manual_course_card($course_data, $settings)
    {
        // Extract course data
        $course_title = !empty($course_data['course_title']) ? $course_data['course_title'] : 'Course Title';
        $course_image = !empty($course_data['course_image']['url']) ? $course_data['course_image']['url'] : \Elementor\Utils::get_placeholder_image_src();
        $course_lessons = !empty($course_data['course_lessons']) ? $course_data['course_lessons'] : '10';
        $course_duration = !empty($course_data['course_duration']) ? $course_data['course_duration'] : '5h 30m';
        $course_price = !empty($course_data['course_price']) ? $course_data['course_price'] : '$99';
        $course_regular_price = !empty($course_data['course_regular_price']) ? $course_data['course_regular_price'] : '';
        $course_rating = !empty($course_data['course_rating']) ? floatval($course_data['course_rating']) : 0;
        $course_rating_count = !empty($course_data['course_rating_count']) ? intval($course_data['course_rating_count']) : 0;
        $course_badge = !empty($course_data['course_badge']) ? $course_data['course_badge'] : '';
        
        // Course link
        $course_link = !empty($course_data['course_link']['url']) ? $course_data['course_link']['url'] : '#';
        $course_target = !empty($course_data['course_link']['is_external']) ? ' target="_blank"' : '';
        $course_nofollow = !empty($course_data['course_link']['nofollow']) ? ' rel="nofollow"' : '';
        ?>
        <div class="course-card">
            <?php if (!empty($course_badge)): ?>
                <div class="course-card-badge"><?php echo esc_html($course_badge); ?></div>
            <?php endif; ?>

            <div class="course-card-image">
                <img src="<?php echo esc_url($course_image); ?>" alt="<?php echo esc_attr($course_title); ?>">
            </div>

            <div class="course-card-content">
                <?php if ('yes' === $settings['show_rating'] && $course_rating > 0): ?>
                    <div class="course-card-rating">
                        <?php
                        // Display stars
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= floor($course_rating)) {
                                echo '<i class="fas fa-star"></i>';
                            } elseif ($i - 0.5 <= $course_rating) {
                                echo '<i class="fas fa-star-half-alt"></i>';
                            } else {
                                echo '<i class="far fa-star"></i>';
                            }
                        }

                        // Display rating count
                        if ($course_rating_count > 0) {
                            echo '(' . number_format_i18n($course_rating_count) . ')';
                        }
                        ?>
                    </div>
                <?php endif; ?>

                <h3 class="course-card-title">
                    <a href="<?php echo esc_url($course_link); ?>" <?php echo $course_target . $course_nofollow; ?>>
                        <?php echo esc_html($course_title); ?>
                    </a>
                </h3>

                <?php if ('yes' === $settings['show_product_meta']): ?>
                    <div class="course-card-meta">
                        <span class="course-card-lessons">
                            <i class="fas fa-book"></i> <?php echo esc_html($settings['lesson_text']); ?>
                            <?php echo esc_html($course_lessons); ?>
                        </span>
                        <span class="course-card-duration">
                            <i class="fas fa-clock"></i> <?php echo esc_html($course_duration); ?>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if ('yes' === $settings['show_price']): ?>
                    <div class="course-card-price-container">
                        <div class="course-card-price">
                            <?php
                            // Display price with sale price if available
                            if (!empty($course_regular_price) && 'yes' === $settings['show_sale_price']) {
                                echo '<span class="course-card-sale-price">' . esc_html($course_price) . '</span> ';
                                echo '<span class="course-card-regular-price"><del>' . esc_html($course_regular_price) . '</del></span>';
                            } else {
                                echo esc_html($course_price);
                            }
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}