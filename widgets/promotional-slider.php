<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Promotional Slider Widget
 */
class Promo_Slider_Widget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'promo_slider';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Promotional Slider', 'advanced-elements-elementor');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-slider-push';
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['promo', 'slider', 'carousel', 'banner', 'offer', 'deal'];
    }

    /**
     * Get script depends
     */
    public function get_script_depends() {
        return ['slick-carousel', 'advanced-elements-promo-slider'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends() {
        return ['slick-carousel', 'advanced-elements-widgets', 'advanced-elements-promo-slider'];
    }

    /**
     * Register widget controls
     */
    protected function _register_controls() {

        // Content Section - Slides
        $this->start_controls_section(
            'section_slides',
            [
                'label' => esc_html__('Slides', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        // Left Section (Discount/Offer Section)
        $repeater->add_control(
            'left_section_heading',
            [
                'label' => esc_html__('Left Section', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'discount_percentage',
            [
                'label' => esc_html__('Discount Percentage', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '50%',
                'placeholder' => esc_html__('50%', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'discount_text',
            [
                'label' => esc_html__('Discount Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'OFF',
                'placeholder' => esc_html__('OFF', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'left_description',
            [
                'label' => esc_html__('Left Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Get real-world CFD engineering skills with our exclusive bundle.',
                'placeholder' => esc_html__('Enter description', 'advanced-elements-elementor'),
                'rows' => 3,
            ]
        );

        // Right Section (Product/Bundle Section)
        $repeater->add_control(
            'right_section_heading',
            [
                'label' => esc_html__('Right Section', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'product_title',
            [
                'label' => esc_html__('Product Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'CFD BUNDLE',
                'placeholder' => esc_html__('CFD BUNDLE', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'product_description',
            [
                'label' => esc_html__('Product Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Get real-world CFD engineering skills with our exclusive bundle.',
                'placeholder' => esc_html__('Enter product description', 'advanced-elements-elementor'),
                'rows' => 2,
            ]
        );

        $repeater->add_control(
            'features_list',
            [
                'label' => esc_html__('Features List', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Get real-world\nGet real-world\nGet real-world",
                'placeholder' => esc_html__('Enter each feature on a new line', 'advanced-elements-elementor'),
                'rows' => 4,
                'description' => esc_html__('Enter each feature on a new line', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Buy Now',
                'placeholder' => esc_html__('Buy Now', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'advanced-elements-elementor'),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => esc_html__('Slides', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'discount_percentage' => '50%',
                        'discount_text' => 'OFF',
                        'left_description' => 'Get real-world CFD engineering skills with our exclusive bundle.',
                        'product_title' => 'CFD BUNDLE',
                        'product_description' => 'Get real-world CFD engineering skills with our exclusive bundle.',
                        'features_list' => "Get real-world\nGet real-world\nGet real-world",
                        'button_text' => 'Buy Now',
                    ],
                    [
                        'discount_percentage' => '30%',
                        'discount_text' => 'OFF',
                        'left_description' => 'Master advanced engineering with our comprehensive course.',
                        'product_title' => 'ADVANCED COURSE',
                        'product_description' => 'Master advanced engineering with our comprehensive course.',
                        'features_list' => "Advanced techniques\nReal projects\nExpert guidance",
                        'button_text' => 'Enroll Now',
                    ],
                ],
                'title_field' => '{{{ product_title }}}',
            ]
        );

        $this->end_controls_section();

        // Content Section - Slider Settings
        $this->start_controls_section(
            'section_slider_settings',
            [
                'label' => esc_html__('Slider Settings', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => esc_html__('Autoplay Speed (ms)', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5000,
                'min' => 1000,
                'max' => 10000,
                'step' => 500,
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'show_dots',
            [
                'label' => esc_html__('Show Dots', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_arrows',
            [
                'label' => esc_html__('Show Arrows', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'no',
            ]
        );

        $this->add_control(
            'infinite',
            [
                'label' => esc_html__('Infinite Loop', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'slide_speed',
            [
                'label' => esc_html__('Slide Speed (ms)', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 500,
                'min' => 100,
                'max' => 2000,
                'step' => 100,
            ]
        );

        $this->add_control(
            'fade_effect',
            [
                'label' => esc_html__('Fade Effect', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'no',
                'description' => esc_html__('Enable fade transition between slides', 'advanced-elements-elementor'),
            ]
        );

        $this->end_controls_section();

        // Style Section - Container
        $this->start_controls_section(
            'section_style_container',
            [
                'label' => esc_html__('Container Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'container_background',
                'label' => esc_html__('Background', 'advanced-elements-elementor'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .promo-slider-container',
                'default' => [
                    'color' => '#0D1B32',
                ],
            ]
        );

        $this->add_responsive_control(
            'container_padding',
            [
                'label' => esc_html__('Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '60',
                    'right' => '20',
                    'bottom' => '60',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .promo-slider-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Slide
        $this->start_controls_section(
            'section_style_slide',
            [
                'label' => esc_html__('Slide Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'slide_border_radius',
            [
                'label' => esc_html__('Border Radius', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => '20',
                    'right' => '20',
                    'bottom' => '20',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .promo-slide' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'slide_box_shadow',
                'selector' => '{{WRAPPER}} .promo-slide',
                'fields_options' => [
                    'box_shadow_type' => [
                        'default' => 'yes',
                    ],
                    'box_shadow' => [
                        'default' => [
                            'horizontal' => 0,
                            'vertical' => 10,
                            'blur' => 30,
                            'spread' => 0,
                            'color' => 'rgba(0,0,0,0.1)',
                        ],
                    ],
                ],
            ]
        );

        $this->add_responsive_control(
            'slide_min_height',
            [
                'label' => esc_html__('Min Height', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'vh'],
                'range' => [
                    'px' => [
                        'min' => 200,
                        'max' => 600,
                    ],
                    'vh' => [
                        'min' => 20,
                        'max' => 80,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 320,
                ],
                'selectors' => [
                    '{{WRAPPER}} .promo-slide' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Left Section
        $this->start_controls_section(
            'section_style_left',
            [
                'label' => esc_html__('Left Section Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'left_background_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .left-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'discount_percentage_color',
            [
                'label' => esc_html__('Percentage Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0D1B32',
                'selectors' => [
                    '{{WRAPPER}} .discount-percentage' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'discount_percentage_typography',
                'selector' => '{{WRAPPER}} .discount-percentage',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 80, 'unit' => 'px']],
                    'font_weight' => ['default' => '800'],
                    'line_height' => ['default' => ['size' => 0.9, 'unit' => 'em']],
                ],
            ]
        );

        $this->add_control(
            'discount_text_color',
            [
                'label' => esc_html__('Discount Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0D1B32',
                'selectors' => [
                    '{{WRAPPER}} .discount-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'discount_text_typography',
                'selector' => '{{WRAPPER}} .discount-text',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 24, 'unit' => 'px']],
                    'font_weight' => ['default' => '700'],
                    'letter_spacing' => ['default' => ['size' => 2, 'unit' => 'px']],
                ],
            ]
        );

        $this->add_control(
            'left_description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .left-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'left_description_typography',
                'selector' => '{{WRAPPER}} .left-description',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16, 'unit' => 'px']],
                    'line_height' => ['default' => ['size' => 1.5, 'unit' => 'em']],
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Right Section
        $this->start_controls_section(
            'section_style_right',
            [
                'label' => esc_html__('Right Section Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'right_background',
                'label' => esc_html__('Background', 'advanced-elements-elementor'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .right-section',
                'fields_options' => [
                    'background' => [
                        'default' => 'gradient',
                    ],
                    'color' => [
                        'default' => '#4a89dc',
                    ],
                    'color_b' => [
                        'default' => '#667eea',
                    ],
                    'gradient_angle' => [
                        'default' => [
                            'unit' => 'deg',
                            'size' => 135,
                        ],
                    ],
                ],
            ]
        );

        $this->add_control(
            'product_title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .product-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'product_title_typography',
                'selector' => '{{WRAPPER}} .product-title',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 32, 'unit' => 'px']],
                    'font_weight' => ['default' => '700'],
                    'letter_spacing' => ['default' => ['size' => 2, 'unit' => 'px']],
                ],
            ]
        );

        $this->add_control(
            'product_description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(255,255,255,0.9)',
                'selectors' => [
                    '{{WRAPPER}} .product-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'product_description_typography',
                'selector' => '{{WRAPPER}} .product-description',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16, 'unit' => 'px']],
                    'line_height' => ['default' => ['size' => 1.5, 'unit' => 'em']],
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Features
        $this->start_controls_section(
            'section_style_features',
            [
                'label' => esc_html__('Features Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'features_color',
            [
                'label' => esc_html__('Features Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(255,255,255,0.9)',
                'selectors' => [
                    '{{WRAPPER}} .features-list li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'features_typography',
                'selector' => '{{WRAPPER}} .features-list li',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 14, 'unit' => 'px']],
                ],
            ]
        );

        $this->add_control(
            'features_bullet_color',
            [
                'label' => esc_html__('Bullet Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(255,255,255,0.7)',
                'selectors' => [
                    '{{WRAPPER}} .features-list li::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'features_spacing',
            [
                'label' => esc_html__('Features Spacing', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 30,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 12,
                ],
                'selectors' => [
                    '{{WRAPPER}} .features-list li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Button
        $this->start_controls_section(
            'section_style_button',
            [
                'label' => esc_html__('Button Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('button_style_tabs');

        $this->start_controls_tab(
            'button_normal',
            [
                'label' => esc_html__('Normal', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .promo-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#3a7bd5',
                'selectors' => [
                    '{{WRAPPER}} .promo-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover',
            [
                'label' => esc_html__('Hover', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'button_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .promo-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_background_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2563eb',
                'selectors' => [
                    '{{WRAPPER}} .promo-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .promo-button',
                'fields_options' => [
                    'typography' => ['default' => 'yes'],
                    'font_size' => ['default' => ['size' => 16, 'unit' => 'px']],
                    'font_weight' => ['default' => '600'],
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => '8',
                    'right' => '8',
                    'bottom' => '8',
                    'left' => '8',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .promo-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'default' => [
                    'top' => '12',
                    'right' => '32',
                    'bottom' => '12',
                    'left' => '32',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .promo-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Dots
        $this->start_controls_section(
            'section_style_dots',
            [
                'label' => esc_html__('Dots Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_dots' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'dots_color',
            [
                'label' => esc_html__('Dots Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(255,255,255,0.5)',
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dots_active_color',
            [
                'label' => esc_html__('Active Dot Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li.slick-active button:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_size',
            [
                'label' => esc_html__('Dots Size', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 20,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:before' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_spacing',
            [
                'label' => esc_html__('Dots Spacing', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        
        if (empty($settings['slides'])) {
            return;
        }

        $slider_id = 'promo-slider-' . $this->get_id();
        
        $slider_options = [
            'slidesToShow' => 1,
            'slidesToScroll' => 1,
            'autoplay' => $settings['autoplay'] === 'yes',
            'autoplaySpeed' => intval($settings['autoplay_speed']),
            'dots' => $settings['show_dots'] === 'yes',
            'arrows' => $settings['show_arrows'] === 'yes',
            'infinite' => $settings['infinite'] === 'yes',
            'speed' => intval($settings['slide_speed']),
            'fade' => $settings['fade_effect'] === 'yes',
            'pauseOnHover' => true,
            'pauseOnFocus' => true,
            'adaptiveHeight' => false,
            'cssEase' => 'ease-in-out',
            'responsive' => [
                [
                    'breakpoint' => 1024,
                    'settings' => [
                        'slidesToShow' => 1,
                        'slidesToScroll' => 1,
                    ]
                ],
                [
                    'breakpoint' => 768,
                    'settings' => [
                        'slidesToShow' => 1,
                        'slidesToScroll' => 1,
                    ]
                ]
            ]
        ];
        ?>

        <div class="promo-slider-container">
            <div class="promo-slider" id="<?php echo esc_attr($slider_id); ?>">
                <?php foreach ($settings['slides'] as $slide): ?>
                    <div class="promo-slide-wrapper">
                        <div class="promo-slide">
                            <!-- Left Section (Discount/Offer) -->
                            <div class="left-section">
                                <div class="discount-content">
                                    <?php if (!empty($slide['discount_percentage'])): ?>
                                        <div class="discount-percentage">
                                            <?php echo esc_html($slide['discount_percentage']); ?>
                                            <?php if (!empty($slide['discount_text'])): ?>
                                                <div class="discount-text"><?php echo esc_html($slide['discount_text']); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($slide['left_description'])): ?>
                                        <div class="left-description"><?php echo esc_html($slide['left_description']); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Right Section (Product/Bundle) -->
                            <div class="right-section">
                                <div class="product-content">
                                    <?php if (!empty($slide['product_title'])): ?>
                                        <h3 class="product-title"><?php echo esc_html($slide['product_title']); ?></h3>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($slide['product_description'])): ?>
                                        <div class="product-description"><?php echo esc_html($slide['product_description']); ?></div>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($slide['features_list'])): ?>
                                        <ul class="features-list">
                                            <?php
                                            $features = explode("\n", $slide['features_list']);
                                            foreach ($features as $feature) {
                                                $feature = trim($feature);
                                                if (!empty($feature)) {
                                                    echo '<li>' . esc_html($feature) . '</li>';
                                                }
                                            }
                                            ?>
                                        </ul>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($slide['button_text'])): ?>
                                        <div class="button-section">
                                            <?php
                                            $button_link = !empty($slide['button_link']['url']) ? $slide['button_link']['url'] : '#';
                                            $button_target = !empty($slide['button_link']['is_external']) ? ' target="_blank"' : '';
                                            $button_nofollow = !empty($slide['button_link']['nofollow']) ? ' rel="nofollow"' : '';
                                            ?>
                                            <a href="<?php echo esc_url($button_link); ?>" class="promo-button" <?php echo $button_target . $button_nofollow; ?>>
                                                <?php echo esc_html($slide['button_text']); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof jQuery !== 'undefined' && jQuery.fn.slick) {
                    jQuery('#<?php echo esc_js($slider_id); ?>').slick(<?php echo wp_json_encode($slider_options); ?>);
                }
            });
        </script>
        <?php
    }
}