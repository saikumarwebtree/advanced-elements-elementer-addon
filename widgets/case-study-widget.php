<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Case Study Tabs Widget
 */
class Case_Study_Tabs_Widget extends Widget_Base
{

    /**
     * Get widget name
     */
    public function get_name()
    {
        return 'case_study_tabs';
    }

    /**
     * Get widget title
     */
    public function get_title()
    {
        return esc_html__('Case Study Tabs', 'advanced-elements-elementor');
    }

    /**
     * Get widget icon
     */
    public function get_icon()
    {
        return 'eicon-tabs';
    }

    /**
     * Get widget keywords
     */
    public function get_keywords()
    {
        return ['case study', 'tabs', 'showcase', 'portfolio', 'projects'];
    }

    /**
     * Get script depends
     */
    public function get_script_depends()
    {
        return ['advanced-elements-case-study-tabs'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends()
    {
        return ['advanced-elements-widgets', 'advanced-elements-case-study-tabs'];
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
                'default' => esc_html__('Case Studies', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter subtitle', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Success Stories', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter title', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Explore our portfolio of successful projects and case studies that showcase our expertise and achievements.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter description', 'advanced-elements-elementor'),
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

        // Case Study Repeater
        $case_study_repeater = new \Elementor\Repeater();

        $case_study_repeater->add_control(
            'case_study_image',
            [
                'label' => esc_html__('Case Study Image', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $case_study_repeater->add_control(
            'case_study_title',
            [
                'label' => esc_html__('Case Study Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Case Study Title', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter case study title', 'advanced-elements-elementor'),
                'label_block' => true,
            ]
        );

        $case_study_repeater->add_control(
            'case_study_description',
            [
                'label' => esc_html__('Short Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Brief description of the case study and the problem solved.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter short description', 'advanced-elements-elementor'),
                'rows' => 3,
            ]
        );

        $case_study_repeater->add_control(
            'case_study_link',
            [
                'label' => esc_html__('Case Study Link', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-case-study-link.com', 'advanced-elements-elementor'),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $repeater->add_control(
            'case_studies',
            [
                'label' => esc_html__('Case Studies', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $case_study_repeater->get_controls(),
                'default' => [
                    [
                        'case_study_title' => esc_html__('Sample Case Study 1', 'advanced-elements-elementor'),
                        'case_study_description' => esc_html__('This case study demonstrates our expertise in solving complex problems for our clients.', 'advanced-elements-elementor'),
                    ],
                    [
                        'case_study_title' => esc_html__('Sample Case Study 2', 'advanced-elements-elementor'),
                        'case_study_description' => esc_html__('Another successful project showcasing innovation and excellent results.', 'advanced-elements-elementor'),
                    ],
                ],
                'title_field' => '{{{ case_study_title }}}',
            ]
        );

        $repeater->add_control(
            'view_all_text',
            [
                'label' => esc_html__('View All Button Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Case Studies', 'advanced-elements-elementor'),
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
                        'tab_title' => esc_html__('Web Development', 'advanced-elements-elementor'),
                    ],
                    [
                        'tab_title' => esc_html__('Mobile Apps', 'advanced-elements-elementor'),
                    ],
                    [
                        'tab_title' => esc_html__('Digital Marketing', 'advanced-elements-elementor'),
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );

        $this->add_control(
            'items_per_tab',
            [
                'label' => esc_html__('Items Per Tab', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 20,
                'step' => 1,
                'default' => 6,
            ]
        );

        $this->add_control(
            'learn_more_text',
            [
                'label' => esc_html__('Learn More Button Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Learn More', 'advanced-elements-elementor'),
                'separator' => 'before',
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
                    '{{WRAPPER}} .case-study-tabs-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .case-study-tabs-subtitle',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .case-study-tabs-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .case-study-tabs-title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .case-study-tabs-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .case-study-tabs-description',
            ]
        );

        $this->add_responsive_control(
            'header_text_align',
            [
                'label' => esc_html__('Text Alignment', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'advanced-elements-elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'advanced-elements-elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'advanced-elements-elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .case-study-tabs-header' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'header_margin',
            [
                'label' => esc_html__('Margin', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '50',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .case-study-tabs-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .case-study-tabs-nav' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .case-study-tab-item' => 'margin-right: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .case-study-tab-item' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tab_background_color',
            [
                'label' => esc_html__('Tab Background', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .case-study-tab-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'tab_border',
                'selector' => '{{WRAPPER}} .case-study-tab-item',
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
                    '{{WRAPPER}} .case-study-tab-item.active' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .case-study-tab-item.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'active_tab_border',
                'selector' => '{{WRAPPER}} .case-study-tab-item.active',
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
                    '{{WRAPPER}} .case-study-tab-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .case-study-tab-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'tabs_margin',
            [
                'label' => esc_html__('Tabs Margin', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '40',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .case-study-tabs-nav-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Case Study Cards
        $this->start_controls_section(
            'section_style_cards',
            [
                'label' => esc_html__('Case Study Cards Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'cards_columns',
            [
                'label' => esc_html__('Columns', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'tablet_default' => '2',
                'mobile_default' => '1',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ],
                'selectors' => [
                    '{{WRAPPER}} .case-study-tabs-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
            ]
        );

        $this->add_responsive_control(
            'cards_gap',
            [
                'label' => esc_html__('Cards Gap', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .case-study-tabs-grid' => 'grid-gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'card_background_color',
            [
                'label' => esc_html__('Card Background', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#1c2432',
                'selectors' => [
                    '{{WRAPPER}} .case-study-card' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .case-study-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .case-study-card-image' => 'border-top-left-radius: {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'selector' => '{{WRAPPER}} .case-study-card',
            ]
        );

        $this->add_responsive_control(
            'card_padding',
            [
                'label' => esc_html__('Card Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .case-study-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_content_padding',
            [
                'label' => esc_html__('Content Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'default' => [
                    'top' => '20',
                    'right' => '20',
                    'bottom' => '20',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .case-study-card-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'card_title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .case-study-card-title' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'card_title_typography',
                'selector' => '{{WRAPPER}} .case-study-card-title',
            ]
        );

        $this->add_responsive_control(
            'card_title_spacing',
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
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .case-study-card-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'card_description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .case-study-card-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'card_description_typography',
                'selector' => '{{WRAPPER}} .case-study-card-description',
            ]
        );

        $this->add_responsive_control(
            'card_description_spacing',
            [
                'label' => esc_html__('Description Spacing', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .case-study-card-description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Learn More Button
        $this->start_controls_section(
            'section_style_button',
            [
                'label' => esc_html__('Learn More Button', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .case-study-learn-more-btn',
            ]
        );

        $this->start_controls_tabs('button_style_tabs');

        $this->start_controls_tab(
            'button_style_normal',
            [
                'label' => esc_html__('Normal', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .case-study-learn-more-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'transparent',
                'selectors' => [
                    '{{WRAPPER}} .case-study-learn-more-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_border_color',
            [
                'label' => esc_html__('Border Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .case-study-learn-more-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_style_hover',
            [
                'label' => esc_html__('Hover', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__('Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .case-study-learn-more-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_background_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .case-study-learn-more-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .case-study-learn-more-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .case-study-learn-more-btn',
                'separator' => 'before',
                'fields_options' => [
                    'border' => [
                        'default' => 'solid',
                    ],
                    'width' => [
                        'default' => [
                            'top' => '1',
                            'right' => '1',
                            'bottom' => '1',
                            'left' => '1',
                            'isLinked' => true,
                        ],
                    ],
                ],
            ]
        );

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
                    '{{WRAPPER}} .case-study-learn-more-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'top' => '10',
                    'right' => '20',
                    'bottom' => '10',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .case-study-learn-more-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .case-study-view-all-button',
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
                    '{{WRAPPER}} .case-study-view-all-button' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .case-study-view-all-button' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .case-study-view-all-button' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .case-study-view-all-button:hover' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .case-study-view-all-button:hover' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .case-study-view-all-button:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'view_all_border',
                'selector' => '{{WRAPPER}} .case-study-view-all-button',
                'separator' => 'before',
                'fields_options' => [
                    'border' => [
                        'default' => 'solid',
                    ],
                    'width' => [
                        'default' => [
                            'top' => '1',
                            'right' => '1',
                            'bottom' => '1',
                            'left' => '1',
                            'isLinked' => true,
                        ],
                    ],
                ],
            ]
        );

        $this->add_control(
            'view_all_border_radius',
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
                    '{{WRAPPER}} .case-study-view-all-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'view_all_padding',
            [
                'label' => esc_html__('Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'default' => [
                    'top' => '12',
                    'right' => '24',
                    'bottom' => '12',
                    'left' => '24',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .case-study-view-all-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'view_all_margin',
            [
                'label' => esc_html__('Margin', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '30',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .case-study-view-all-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .case-study-tabs-container',
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
                    '{{WRAPPER}} .case-study-tabs-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $tabs_id = 'case-study-tabs-' . $this->get_id();
        ?>

        <div class="case-study-tabs-container">
            <div class="case-study-tabs-content">
                <!-- Header Section -->
                <div class="case-study-tabs-header">
                    <?php if (!empty($settings['subtitle'])): ?>
                        <h5 class="case-study-tabs-subtitle"><?php echo esc_html($settings['subtitle']); ?></h5>
                    <?php endif; ?>

                    <?php if (!empty($settings['title'])): ?>
                        <h2 class="case-study-tabs-title"><?php echo esc_html($settings['title']); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($settings['description'])): ?>
                        <p class="case-study-tabs-description"><?php echo esc_html($settings['description']); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Tabs Section -->
                <div class="case-study-tabs-nav-container">
                    <div class="case-study-tabs-nav" id="<?php echo esc_attr($tabs_id); ?>">
                        <?php if ('yes' === $settings['show_all_tab']): ?>
                            <div class="case-study-tab-item active" data-tab="all">
                                <?php echo esc_html($settings['all_tab_text']); ?>
                            </div>
                        <?php endif; ?>

                        <?php foreach ($settings['tabs'] as $index => $tab):
                            $tab_id = 'tab-' . $index;
                            $is_active = 'yes' !== $settings['show_all_tab'] && $index === 0 ? 'active' : '';
                            ?>
                            <div class="case-study-tab-item <?php echo esc_attr($is_active); ?>"
                                data-tab="<?php echo esc_attr($tab_id); ?>">
                                <?php echo esc_html($tab['tab_title']); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Tab Content -->
                <div class="case-study-tabs-content-area">
                    <?php
                    // All tab content (if enabled)
                    if ('yes' === $settings['show_all_tab']): ?>
                        <div class="case-study-tab-pane active" data-tab-content="all">
                            <div class="case-study-tabs-grid">
                                <?php
                                // Get case studies from all tabs (limited to avoid duplicates)
                                $all_case_studies = [];
                                $count = 0;
                                $max_items = $settings['items_per_tab'];

                                foreach ($settings['tabs'] as $tab_index => $tab) {
                                    if (!empty($tab['case_studies'])) {
                                        // Calculate how many items to take from each tab
                                        $items_per_tab = ceil($max_items / count($settings['tabs']));
                                        $tab_count = 0;
                                        
                                        foreach ($tab['case_studies'] as $case_study) {
                                            $case_study_title = $case_study['case_study_title'];
                                            
                                            // Create a unique key using tab index and title to avoid true duplicates
                                            $unique_key = $tab_index . '_' . sanitize_title($case_study_title);
                                            
                                            if (!isset($all_case_studies[$unique_key]) && $tab_count < $items_per_tab && $count < $max_items) {
                                                $all_case_studies[$unique_key] = $case_study;
                                                $count++;
                                                $tab_count++;
                                            }
                                            
                                            if ($count >= $max_items) {
                                                break 2;
                                            }
                                        }
                                    }
                                }

                                // If we don't have enough items, get more from any tab
                                if ($count < $max_items) {
                                    foreach ($settings['tabs'] as $tab_index => $tab) {
                                        if (!empty($tab['case_studies'])) {
                                            foreach ($tab['case_studies'] as $case_study) {
                                                $case_study_title = $case_study['case_study_title'];
                                                $unique_key = $tab_index . '_' . sanitize_title($case_study_title);
                                                
                                                if (!isset($all_case_studies[$unique_key]) && $count < $max_items) {
                                                    $all_case_studies[$unique_key] = $case_study;
                                                    $count++;
                                                }
                                                
                                                if ($count >= $max_items) {
                                                    break 2;
                                                }
                                            }
                                        }
                                    }
                                }

                                // Render the case studies
                                foreach ($all_case_studies as $case_study) {
                                    $this->render_case_study_card($case_study, $settings);
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
                                <div class="case-study-view-all-container">
                                    <a href="<?php echo esc_url($view_all_url); ?>" class="case-study-view-all-button">
                                        <?php echo esc_html($view_all_text); ?> <span class="case-study-arrow-icon">→</span>
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
                        <div class="case-study-tab-pane <?php echo esc_attr($is_active); ?>"
                            data-tab-content="<?php echo esc_attr($tab_id); ?>">
                            <div class="case-study-tabs-grid">
                                <?php
                                if (!empty($tab['case_studies'])) {
                                    $case_studies = array_slice($tab['case_studies'], 0, $settings['items_per_tab']);
                                    foreach ($case_studies as $case_study) {
                                        $this->render_case_study_card($case_study, $settings);
                                    }
                                }
                                ?>
                            </div>

                            <?php if (!empty($tab['view_all_url']['url'])): ?>
                                <div class="case-study-view-all-container">
                                    <a href="<?php echo esc_url($tab['view_all_url']['url']); ?>" class="case-study-view-all-button">
                                        <?php echo esc_html($tab['view_all_text']); ?> <span class="case-study-arrow-icon">→</span>
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
                
                if (!tabsContainer) {
                    return;
                }
                
                const tabItems = tabsContainer.querySelectorAll('.case-study-tab-item');
                const tabPanes = tabsContainer.closest('.case-study-tabs-container').querySelectorAll('.case-study-tab-pane');

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
     * Render a case study card
     */
    private function render_case_study_card($case_study, $settings)
    {
        // Extract case study data
        $case_study_title = !empty($case_study['case_study_title']) ? $case_study['case_study_title'] : 'Case Study Title';
        $case_study_image = !empty($case_study['case_study_image']['url']) ? $case_study['case_study_image']['url'] : \Elementor\Utils::get_placeholder_image_src();
        $case_study_description = !empty($case_study['case_study_description']) ? $case_study['case_study_description'] : '';
        
        // Case study link
        $case_study_link = !empty($case_study['case_study_link']['url']) ? $case_study['case_study_link']['url'] : '#';
        $case_study_target = !empty($case_study['case_study_link']['is_external']) ? ' target="_blank"' : '';
        $case_study_nofollow = !empty($case_study['case_study_link']['nofollow']) ? ' rel="nofollow"' : '';
        ?>
        <div class="case-study-card">
            <div class="case-study-card-image">
                <img src="<?php echo esc_url($case_study_image); ?>" alt="<?php echo esc_attr($case_study_title); ?>">
            </div>

            <div class="case-study-card-content">
                <h3 class="case-study-card-title">
                    <?php echo esc_html($case_study_title); ?>
                </h3>

                <?php if (!empty($case_study_description)): ?>
                    <p class="case-study-card-description">
                        <?php echo esc_html($case_study_description); ?>
                    </p>
                <?php endif; ?>
                <div style="text-align: right">
                <a href="<?php echo esc_url($case_study_link); ?>" 
                   class="case-study-learn-more-btn" 
                   <?php echo $case_study_target . $case_study_nofollow; ?>>
                    <?php echo esc_html($settings['learn_more_text']); ?>
                </a>
                </div>
            </div>
        </div>
        <?php
    }
}