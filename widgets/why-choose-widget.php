<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Why Choose Us Widget
 */
class Why_Choose_Widget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'why_choose_us';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Why Choose Us', 'advanced-elements-elementor');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-info-box';
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['why', 'choose', 'feature', 'reasons', 'benefits', 'stats'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends() {
        return ['advanced-elements-widgets', 'advanced-elements-why-choose'];
    }
    
    /**
     * Get script depends
     */
    public function get_script_depends() {
        return ['advanced-elements-why-choose-counter'];
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
            'title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Why Choose Flowthermolab?', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter title', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat nisi, adipiscing mauris non purus parturient.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter description', 'advanced-elements-elementor'),
                'rows' => 3,
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
                'default' => esc_html__('Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat nisi, adipiscing mauris non.', 'advanced-elements-elementor'),
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
                        'feature_title' => esc_html__('All in One Platform', 'advanced-elements-elementor'),
                        'feature_description' => esc_html__('Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat nisi, adipiscing mauris non.', 'advanced-elements-elementor'),
                    ],
                    [
                        'feature_title' => esc_html__('24/7 Support', 'advanced-elements-elementor'),
                        'feature_description' => esc_html__('Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat nisi, adipiscing mauris non.', 'advanced-elements-elementor'),
                    ],
                    [
                        'feature_title' => esc_html__('Course Quality', 'advanced-elements-elementor'),
                        'feature_description' => esc_html__('Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat nisi, adipiscing mauris non.', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .why-choose-features-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
            ]
        );

        $this->end_controls_section();

        // Content Section - Action Button
        $this->start_controls_section(
            'section_action_button',
            [
                'label' => esc_html__('Action Button', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('About Us', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter button text', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
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
            'button_icon',
            [
                'label' => esc_html__('Button Icon', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->end_controls_section();

        // Content Section - Statistics
        $this->start_controls_section(
            'section_statistics',
            [
                'label' => esc_html__('Statistics', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'stat_number',
            [
                'label' => esc_html__('Number', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '73+',
                'placeholder' => esc_html__('Enter statistic number', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'stat_title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Countries served', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter statistic title', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'statistics',
            [
                'label' => esc_html__('Statistics', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'stat_number' => '73+',
                        'stat_title' => esc_html__('Countries served', 'advanced-elements-elementor'),
                    ],
                    [
                        'stat_number' => '3000+',
                        'stat_title' => esc_html__('Students', 'advanced-elements-elementor'),
                    ],
                    [
                        'stat_number' => '20+',
                        'stat_title' => esc_html__('Industrial Customers', 'advanced-elements-elementor'),
                    ],
                    [
                        'stat_number' => '12000+',
                        'stat_title' => esc_html__('Projects Completed', 'advanced-elements-elementor'),
                    ],
                ],
                'title_field' => '{{{ stat_title }}}',
            ]
        );

        $this->add_control(
            'enable_counter_animation',
            [
                'label' => esc_html__('Enable Counter Animation', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'counter_duration',
            [
                'label' => esc_html__('Animation Duration (ms)', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 500,
                'max' => 5000,
                'step' => 100,
                'default' => 2000,
                'condition' => [
                    'enable_counter_animation' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'statistics_columns',
            [
                'label' => esc_html__('Columns', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'tablet_default' => '2',
                'mobile_default' => '2',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ],
                'selectors' => [
                    '{{WRAPPER}} .statistics-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
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
            'title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .why-choose-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .why-choose-title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .why-choose-description' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .why-choose-description',
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
                    '{{WRAPPER}} .why-choose-header' => 'text-align: {{VALUE}};',
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
                    '{{WRAPPER}} .why-choose-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'default' => '#111827',
                'selectors' => [
                    '{{WRAPPER}} .why-choose-feature-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'feature_box_border_color',
            [
                'label' => esc_html__('Box Border Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#3B82F6',
                'selectors' => [
                    '{{WRAPPER}} .why-choose-feature-item' => 'border: 1px solid {{VALUE}};',
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
                    '{{WRAPPER}} .why-choose-feature-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .why-choose-feature-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .why-choose-features-grid' => 'grid-gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'feature_icon_color',
            [
                'label' => esc_html__('Icon Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4299e1',
                'selectors' => [
                    '{{WRAPPER}} .why-choose-feature-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .why-choose-feature-icon svg' => 'fill: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'feature_icon_bg_color',
            [
                'label' => esc_html__('Icon Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#1e3a8a',
                'selectors' => [
                    '{{WRAPPER}} .why-choose-feature-icon' => 'background-color: {{VALUE}};',
                ],
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
                    '{{WRAPPER}} .why-choose-feature-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .why-choose-feature-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'feature_icon_padding',
            [
                'label' => esc_html__('Icon Padding', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .why-choose-feature-icon' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'feature_icon_radius',
            [
                'label' => esc_html__('Icon Border Radius', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .why-choose-feature-icon' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'feature_icon_spacing',
            [
                'label' => esc_html__('Icon Bottom Spacing', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .why-choose-feature-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .why-choose-feature-title' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feature_title_typography',
                'selector' => '{{WRAPPER}} .why-choose-feature-title',
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
                    '{{WRAPPER}} .why-choose-feature-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .why-choose-feature-description' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feature_description_typography',
                'selector' => '{{WRAPPER}} .why-choose-feature-description',
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

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .action-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#3b82f6',
                'selectors' => [
                    '{{WRAPPER}} .action-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_text_color',
            [
                'label' => esc_html__('Hover Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .action-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => esc_html__('Hover Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2563eb',
                'selectors' => [
                    '{{WRAPPER}} .action-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .action-button',
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
                    '{{WRAPPER}} .action-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .action-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label' => esc_html__('Margin', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '40',
                    'right' => '0',
                    'bottom' => '60',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .why-choose-button-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Statistics
        $this->start_controls_section(
            'section_style_statistics',
            [
                'label' => esc_html__('Statistics Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'stat_number_color',
            [
                'label' => esc_html__('Number Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .stat-number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'stat_number_typography',
                'selector' => '{{WRAPPER}} .stat-number',
            ]
        );

        $this->add_control(
            'stat_title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .stat-title' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'stat_title_typography',
                'selector' => '{{WRAPPER}} .stat-title',
            ]
        );

        $this->add_responsive_control(
            'stat_spacing',
            [
                'label' => esc_html__('Statistics Spacing', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .statistics-grid' => 'grid-gap: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'stat_text_align',
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
                    '{{WRAPPER}} .stat-item' => 'text-align: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .why-choose-container',
                'default' => [
                    'color' => '#0a0f1c',
                ],
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
                    '{{WRAPPER}} .why-choose-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .why-choose-content' => 'max-width: {{SIZE}}{{UNIT}}; margin-left: auto; margin-right: auto;',
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
        
        // Button link
        $button_link = !empty($settings['button_link']['url']) ? $settings['button_link']['url'] : '#';
        $button_target = !empty($settings['button_link']['is_external']) ? ' target="_blank"' : '';
        $button_nofollow = !empty($settings['button_link']['nofollow']) ? ' rel="nofollow"' : '';
        ?>

        <div class="why-choose-container">
            <div class="why-choose-content">
                <!-- Header Section -->
                <div class="why-choose-header animate-on-scroll" data-animation="animate__fadeInUp">
                    <?php if (!empty($settings['title'])) : ?>
                        <h2 class="why-choose-title"><?php echo esc_html($settings['title']); ?></h2>
                    <?php endif; ?>
                    
                    <?php if (!empty($settings['description'])) : ?>
                        <p class="why-choose-description"><?php echo esc_html($settings['description']); ?></p>
                    <?php endif; ?>
                </div>
                
                <!-- Features Section -->
                <?php if (!empty($settings['features'])) : ?>
                    <div class="why-choose-features-section animate-on-scroll" data-animation="animate__fadeInUp">
                        <div class="why-choose-features-grid">
                            <?php foreach ($settings['features'] as $index => $feature) : ?>
                                <div class="why-choose-feature-item">
                                    <?php if (!empty($feature['feature_icon']['value'])) : ?>
                                        <div class="why-choose-feature-icon">
                                            <?php \Elementor\Icons_Manager::render_icon($feature['feature_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($feature['feature_title'])) : ?>
                                        <h3 class="why-choose-feature-title"><?php echo esc_html($feature['feature_title']); ?></h3>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($feature['feature_description'])) : ?>
                                        <p class="why-choose-feature-description"><?php echo esc_html($feature['feature_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Button Section -->
                <?php if (!empty($settings['button_text'])) : ?>
                    <div class="why-choose-button-container animate-on-scroll" data-animation="animate__fadeInUp">
                        <a href="<?php echo esc_url($button_link); ?>" class="action-button" <?php echo $button_target . $button_nofollow; ?>>
                            <?php echo esc_html($settings['button_text']); ?>
                            <?php \Elementor\Icons_Manager::render_icon($settings['button_icon'], ['aria-hidden' => 'true']); ?>
                        </a>
                    </div>
                <?php endif; ?>
                
                <!-- Statistics Section -->
                <?php if (!empty($settings['statistics'])) : ?>
                    <div class="statistics-section" data-animation="<?php echo esc_attr($settings['enable_counter_animation']); ?>" data-duration="<?php echo esc_attr($settings['counter_duration']); ?>">
                        <div class="statistics-grid">
                            <?php foreach ($settings['statistics'] as $index => $stat) : ?>
                                <div class="stat-item">
                                    <?php if (!empty($stat['stat_number'])) : ?>
                                        <h2 class="stat-number" data-value="<?php echo esc_attr($stat['stat_number']); ?>"><?php echo $settings['enable_counter_animation'] === 'yes' ? '0' : esc_html($stat['stat_number']); ?></h2>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($stat['stat_title'])) : ?>
                                        <p class="stat-title"><?php echo esc_html($stat['stat_title']); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}