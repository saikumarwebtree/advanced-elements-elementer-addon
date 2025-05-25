<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Cloud Computing Service Widget
 */
class Cloud_Computing_Widget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'cloud_computing';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Cloud Computing Service', 'advanced-elements-elementor');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-cloud-check';
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['cloud', 'computing', 'service', 'hosting', 'server', 'technology'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends() {
        return ['advanced-elements-widgets', 'advanced-elements-cloud-computing'];
    }

    /**
     * Register widget controls
     */
    protected function _register_controls() {

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
                'default' => esc_html__('Cloud Computing', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter subtitle', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Increase Your Computing Power', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter title', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Access scalable, high-performance computing resources anytime, anywhere.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter description', 'advanced-elements-elementor'),
                'rows' => 3,
            ]
        );

        $this->end_controls_section();

        // Content Section - Action Buttons
        $this->start_controls_section(
            'section_buttons',
            [
                'label' => esc_html__('Action Buttons', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button1_text',
            [
                'label' => esc_html__('Button 1 Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Student Plan', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter button text', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'button1_link',
            [
                'label' => esc_html__('Button 1 Link', 'advanced-elements-elementor'),
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
            'button1_icon',
            [
                'label' => esc_html__('Button 1 Icon', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'button2_text',
            [
                'label' => esc_html__('Button 2 Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Enterprise Plan', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter button text', 'advanced-elements-elementor'),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'button2_link',
            [
                'label' => esc_html__('Button 2 Link', 'advanced-elements-elementor'),
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
            'button2_icon',
            [
                'label' => esc_html__('Button 2 Icon', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->end_controls_section();

        // Content Section - Illustration
        $this->start_controls_section(
            'section_illustration',
            [
                'label' => esc_html__('Illustration', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'illustration_image',
            [
                'label' => esc_html__('Illustration Image', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('assets/images/cloud-computing-illustration.svg', dirname(__FILE__)),
                ],
            ]
        );

        $this->add_responsive_control(
            'illustration_width',
            [
                'label' => esc_html__('Width', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 400,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cloud-illustration img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Content Section - Features
        $this->start_controls_section(
            'section_features',
            [
                'label' => esc_html__('Features', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'feature_icon',
            [
                'label' => esc_html__('Icon', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-check',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'feature_title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Feature Title', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter feature title', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'feature_description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('When unknown printer took galley of type and scrambled.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter feature description', 'advanced-elements-elementor'),
                'rows' => 3,
            ]
        );

        $this->add_control(
            'features',
            [
                'label' => esc_html__('Features', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_title' => esc_html__('No Hardware Hassles', 'advanced-elements-elementor'),
                        'feature_description' => esc_html__('When unknown printer took galley of type and scrambled.', 'advanced-elements-elementor'),
                    ],
                    [
                        'feature_title' => esc_html__('Instant Scalability', 'advanced-elements-elementor'),
                        'feature_description' => esc_html__('When unknown printer took galley of type and scrambled.', 'advanced-elements-elementor'),
                    ],
                    [
                        'feature_title' => esc_html__('Cost-Effective Plans', 'advanced-elements-elementor'),
                        'feature_description' => esc_html__('When unknown printer took galley of type and scrambled.', 'advanced-elements-elementor'),
                    ],
                    [
                        'feature_title' => esc_html__('Embedded Cyber Security', 'advanced-elements-elementor'),
                        'feature_description' => esc_html__('When unknown printer took galley of type and scrambled.', 'advanced-elements-elementor'),
                    ],
                    [
                        'feature_title' => esc_html__('24/7 Support', 'advanced-elements-elementor'),
                        'feature_description' => esc_html__('When unknown printer took galley of type and scrambled.', 'advanced-elements-elementor'),
                    ],
                    [
                        'feature_title' => esc_html__('ISO Certified', 'advanced-elements-elementor'),
                        'feature_description' => esc_html__('When unknown printer took galley of type and scrambled.', 'advanced-elements-elementor'),
                    ],
                    [
                        'feature_title' => esc_html__('Predictable Pricing', 'advanced-elements-elementor'),
                        'feature_description' => esc_html__('When unknown printer took galley of type and scrambled.', 'advanced-elements-elementor'),
                    ],
                    [
                        'feature_title' => esc_html__('Build On Your Terms', 'advanced-elements-elementor'),
                        'feature_description' => esc_html__('When unknown printer took galley of type and scrambled.', 'advanced-elements-elementor'),
                    ],
                ],
                'title_field' => '{{{ feature_title }}}',
            ]
        );

        $this->add_responsive_control(
            'features_columns',
            [
                'label' => esc_html__('Columns', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'tablet_default' => '2',
                'mobile_default' => '1',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ],
                'selectors' => [
                    '{{WRAPPER}} .features-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
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
                    '{{WRAPPER}} .cloud-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'use_gradient_subtitle',
            [
                'label' => esc_html__('Use Gradient for Subtitle', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'subtitle_gradient_color1',
            [
                'label' => esc_html__('Gradient Color 1', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4E7FCE',
                'condition' => [
                    'use_gradient_subtitle' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'subtitle_gradient_color2',
            [
                'label' => esc_html__('Gradient Color 2', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4FAAFF',
                'condition' => [
                    'use_gradient_subtitle' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .cloud-subtitle' => 'background: linear-gradient(90deg, {{subtitle_gradient_color1}}, {{VALUE}}); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; color: transparent;',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .cloud-subtitle',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .cloud-title' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .cloud-title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .cloud-description' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .cloud-description',
            ]
        );

        $this->end_controls_section();

        // Style Section - Buttons
        $this->start_controls_section(
            'section_style_buttons',
            [
                'label' => esc_html__('Buttons Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('button_style_tabs');

        // Button 1 Tab
        $this->start_controls_tab(
            'button1_style_tab',
            [
                'label' => esc_html__('Button 1', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'button1_text_color',
            [
                'label' => esc_html__('Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .cloud-button-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button1_background_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .cloud-button-1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button1_hover_text_color',
            [
                'label' => esc_html__('Hover Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .cloud-button-1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button1_hover_background_color',
            [
                'label' => esc_html__('Hover Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#3a6db0',
                'selectors' => [
                    '{{WRAPPER}} .cloud-button-1:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Button 2 Tab
        $this->start_controls_tab(
            'button2_style_tab',
            [
                'label' => esc_html__('Button 2', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'button2_text_color',
            [
                'label' => esc_html__('Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .cloud-button-2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_background_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'transparent',
                'selectors' => [
                    '{{WRAPPER}} .cloud-button-2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_border_color',
            [
                'label' => esc_html__('Border Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .cloud-button-2' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_hover_text_color',
            [
                'label' => esc_html__('Hover Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .cloud-button-2:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button2_hover_background_color',
            [
                'label' => esc_html__('Hover Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .cloud-button-2:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => '5',
                    'right' => '5',
                    'bottom' => '5',
                    'left' => '5',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cloud-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '12',
                    'right' => '24',
                    'bottom' => '12',
                    'left' => '24',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cloud-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_spacing',
            [
                'label' => esc_html__('Spacing Between Buttons', 'advanced-elements-elementor'),
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
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cloud-button-1' => 'margin-right: {{SIZE}}{{UNIT}};',
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
            'feature_box_bg_color',
            [
                'label' => esc_html__('Box Background', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#1c2432',
                'selectors' => [
                    '{{WRAPPER}} .feature-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'feature_box_border_radius',
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
                    '{{WRAPPER}} .feature-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'feature_box_padding',
            [
                'label' => esc_html__('Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '20',
                    'right' => '20',
                    'bottom' => '20',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .feature-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'feature_box_shadow',
                'selector' => '{{WRAPPER}} .feature-item',
            ]
        );

        $this->add_responsive_control(
            'feature_box_spacing',
            [
                'label' => esc_html__('Box Spacing', 'advanced-elements-elementor'),
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
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .features-grid' => 'grid-gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'feature_icon_color',
            [
                'label' => esc_html__('Icon Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .computing-feature-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .computing-feature-icon svg' => 'fill: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'feature_icon_size',
            [
                'label' => esc_html__('Icon Size', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 24,
                ],
                'selectors' => [
                    '{{WRAPPER}} .computing-feature-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .computing-feature-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'feature_icon_spacing',
            [
                'label' => esc_html__('Icon Spacing', 'advanced-elements-elementor'),
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
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .computing-feature-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'feature_title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .computing-feature-title' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feature_title_typography',
                'selector' => '{{WRAPPER}} .computing-feature-title',
            ]
        );

        $this->add_responsive_control(
            'feature_title_spacing',
            [
                'label' => esc_html__('Title Spacing', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .computing-feature-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'feature_description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .computing-feature-description' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feature_description_typography',
                'selector' => '{{WRAPPER}} .computing-feature-description',
            ]
        );

        $this->end_controls_section();

        // Layout Section
        $this->start_controls_section(
            'section_layout',
            [
                'label' => esc_html__('Layout', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => esc_html__('Section Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '80',
                    'right' => '20',
                    'bottom' => '80',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cloud-computing-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_max_width',
            [
                'label' => esc_html__('Content Max Width', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 500,
                        'max' => 2000,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => 50,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1200,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cloud-computing-content' => 'max-width: {{SIZE}}{{UNIT}}; margin-left: auto; margin-right: auto;',
                ],
            ]
        );

        $this->add_control(
            'features_top_spacing',
            [
                'label' => esc_html__('Features Top Spacing', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 60,
                ],
                'selectors' => [
                    '{{WRAPPER}} .features-section' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Background Section
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
                'selector' => '{{WRAPPER}} .cloud-computing-container',
                'default' => [
                    'color' => '#0c1221',
                ],
            ]
        );

        $this->end_controls_section();

        // End Line Section
        $this->start_controls_section(
            'section_end_line',
            [
                'label' => esc_html__('End Line', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_end_line',
            [
                'label' => esc_html__('Show End Line', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'end_line_image',
            [
                'label' => esc_html__('End Line Image', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload custom end line SVG or use the default', 'advanced-elements-elementor'),
                'condition' => [
                    'show_end_line' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'end_line_width',
            [
                'label' => esc_html__('Width', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 2000,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .cloud-computing-end-line img' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_end_line' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'end_line_color',
            [
                'label' => esc_html__('End Line Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .cloud-computing-end-line svg path' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'show_end_line' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'end_line_margin',
            [
                'label' => esc_html__('Margin', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cloud-computing-end-line' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '50',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'condition' => [
                    'show_end_line' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_lottie',
            [
                'label' => esc_html__('Lottie Animation', 'your-textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'lottie_source',
            [
                'label' => esc_html__('Source', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'url',
                'options' => [
                    'url' => esc_html__('URL', 'your-textdomain'),
                    'file' => esc_html__('File', 'your-textdomain'),
                    'default' => esc_html__('Default Animation', 'your-textdomain'),
                ],
            ]
        );
        
        $this->add_control(
            'lottie_url',
            [
                'label' => esc_html__('URL', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'https://assets9.lottiefiles.com/packages/lf20_rqcjx3y6.json',
                'placeholder' => esc_html__('Enter your Lottie JSON URL', 'your-textdomain'),
                'label_block' => true,
                'condition' => [
                    'lottie_source' => 'url',
                ],
            ]
        );
        
        $this->add_control(
            'lottie_file',
            [
                'label' => esc_html__('File', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_type' => 'application/json',
                'default' => [
                    'url' => '',
                ],
                'condition' => [
                    'lottie_source' => 'file',
                ],
            ]
        );
        
        // Add controls for loop, autoplay, speed, size, etc.
        $this->add_control(
            'lottie_loop',
            [
                'label' => esc_html__('Loop', 'your-textdomain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'your-textdomain'),
                'label_off' => esc_html__('No', 'your-textdomain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        
        // Add more controls...
        
        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $lottie_source = '';
    
        if ($settings['lottie_source'] === 'url' && !empty($settings['lottie_url'])) {
            $lottie_source = $settings['lottie_url'];
        } elseif ($settings['lottie_source'] === 'file' && !empty($settings['lottie_file']['url'])) {
            $lottie_source = $settings['lottie_file']['url'];
        } elseif ($settings['lottie_source'] === 'default') {
            // Default animation path
            $lottie_source = plugin_dir_url(__FILE__) . '../assets/lottie/cloud-computing.json';
        }
        
        // Button links
        $button1_link = !empty($settings['button1_link']['url']) ? $settings['button1_link']['url'] : '#';
        $button1_target = !empty($settings['button1_link']['is_external']) ? ' target="_blank"' : '';
        $button1_nofollow = !empty($settings['button1_link']['nofollow']) ? ' rel="nofollow"' : '';
        
        $button2_link = !empty($settings['button2_link']['url']) ? $settings['button2_link']['url'] : '#';
        $button2_target = !empty($settings['button2_link']['is_external']) ? ' target="_blank"' : '';
        $button2_nofollow = !empty($settings['button2_link']['nofollow']) ? ' rel="nofollow"' : '';
        ?>

        <div class="cloud-computing-container">
            <div class="cloud-computing-content">
                <!-- Header and Hero Section -->
                <div class="cloud-hero-section">
                    <div class="cloud-info animate-on-scroll" data-animation="animate__fadeInUp">
                        <?php if (!empty($settings['subtitle'])) : ?>
                            <h5 class="cloud-subtitle"><?php echo esc_html($settings['subtitle']); ?></h5>
                        <?php endif; ?>
                        
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="cloud-title"><?php echo esc_html($settings['title']); ?></h2>
                        <?php endif; ?>
                        
                        <?php if (!empty($settings['description'])) : ?>
                            <p class="cloud-description"><?php echo esc_html($settings['description']); ?></p>
                        <?php endif; ?>
                        
                        <div class="cloud-buttons">
                            <?php if (!empty($settings['button1_text'])) : ?>
                                <a href="<?php echo esc_url($button1_link); ?>" class="cloud-button cloud-button-1" <?php echo $button1_target . $button1_nofollow; ?>>
                                    <?php echo esc_html($settings['button1_text']); ?>
                                    <?php \Elementor\Icons_Manager::render_icon($settings['button1_icon'], ['aria-hidden' => 'true']); ?>
                                </a>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['button2_text'])) : ?>
                                <a href="<?php echo esc_url($button2_link); ?>" class="cloud-button cloud-button-2" <?php echo $button2_target . $button2_nofollow; ?>>
                                    <?php echo esc_html($settings['button2_text']); ?>
                                    <?php \Elementor\Icons_Manager::render_icon($settings['button2_icon'], ['aria-hidden' => 'true']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="cloud-illustration animate-on-scroll" data-animation="animate__fadeInUp">
                        <?php if (!empty($settings['illustration_image']['url'])) : ?>
                            <!-- <img src="<?php echo esc_url($settings['illustration_image']['url']); ?>" alt="Cloud Computing Illustration"> -->
                            <lottie-player 
                                class="lottie-player"
                                src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../assets/lottie/cloud-computing.json'); ?>"
                                background="transparent"
                                speed="1"
                                loop
                                autoplay>
                            </lottie-player>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Features Section -->
                <?php if (!empty($settings['features'])) : ?>
                    <div class="features-section">
                        <div class="features-grid">
                            <?php $i = 0.1; foreach ($settings['features'] as $index => $feature) : ?>
                                <div class="feature-item animate-on-scroll" data-animation="animate__fadeInUp" data-delay="<?= $i = $i + 0.1; ?>">
                                    <?php if (!empty($feature['feature_icon']['value'])) : ?>
                                        <div class="computing-feature-icon">
                                            <?php \Elementor\Icons_Manager::render_icon($feature['feature_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($feature['feature_title'])) : ?>
                                        <h3 class="computing-feature-title"><?php echo esc_html($feature['feature_title']); ?></h3>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($feature['feature_description'])) : ?>
                                        <p class="computing-feature-description"><?php echo esc_html($feature['feature_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- End Line -->
            <?php if ('yes' === $settings['show_end_line']) : ?>
                <div class="cloud-computing-end-line animate-on-scroll" data-animation="animate__fadeInUp">
                    <?php if (!empty($settings['end_line_image']['url'])) : ?>
                        <img src="<?php echo esc_url($settings['end_line_image']['url']); ?>" alt="Cloud Computing End Line">
                    <?php else: ?>
                        <img src="<?php echo esc_url(plugins_url('assets/images/cloud-computing-end-line.svg', dirname(__FILE__))); ?>" alt="Cloud Computing End Line">
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
        <?php
    }
}