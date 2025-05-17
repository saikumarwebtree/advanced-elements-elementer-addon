<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Contact Widget
 */
class Contact_Widget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'contact';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Contact', 'advanced-elements-elementor');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-envelope';
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['contact', 'info', 'address', 'email', 'phone'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends() {
        return ['advanced-elements-widgets', 'advanced-elements-contact'];
    }

    /**
     * Register widget controls
     */
    protected function _register_controls() {

        // Content Section - Features
        $this->start_controls_section(
            'section_features',
            [
                'label' => esc_html__('Contact Features', 'advanced-elements-elementor'),
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
                    'value' => 'fas fa-phone',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'feature_title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Phone', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter title', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'feature_description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::WYSIWYG, // Changed to WYSIWYG editor
                'default' => esc_html__('Enter your contact details here.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter description', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'features',
            [
                'label' => esc_html__('Contact Information', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_title' => esc_html__('Phone', 'advanced-elements-elementor'),
                        'feature_description' => esc_html__('Call us: +1 234 567 890', 'advanced-elements-elementor'),
                    ],
                    [
                        'feature_title' => esc_html__('Email', 'advanced-elements-elementor'),
                        'feature_description' => esc_html__('Email us: info@example.com', 'advanced-elements-elementor'),
                    ],
                    [
                        'feature_title' => esc_html__('Address', 'advanced-elements-elementor'),
                        'feature_description' => esc_html__('123 Main Street, City, Country', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .contact-features-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
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
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .contact-feature-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'feature_box_border_color',
            [
                'label' => esc_html__('Box Border Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#e0e0e0',
                'selectors' => [
                    '{{WRAPPER}} .contact-feature-item' => 'border: 1px solid {{VALUE}};',
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
                    '{{WRAPPER}} .contact-feature-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .contact-feature-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .contact-features-grid' => 'grid-gap: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .contact-feature-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .contact-feature-icon svg' => 'fill: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'feature_icon_bg_color',
            [
                'label' => esc_html__('Icon Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f5f8ff',
                'selectors' => [
                    '{{WRAPPER}} .contact-feature-icon' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .contact-feature-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .contact-feature-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'feature_title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .contact-feature-title' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feature_title_typography',
                'selector' => '{{WRAPPER}} .contact-feature-title',
            ]
        );

        $this->add_control(
            'feature_description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .contact-feature-description' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .contact-feature-description a' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feature_description_typography',
                'selector' => '{{WRAPPER}} .contact-feature-description',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        
        ?>
        <div class="contact-container">
            <!-- Features Section -->
            <?php if (!empty($settings['features'])) : ?>
                <div class="contact-features-section animate-on-scroll" data-animation="animate__fadeInUp">
                    <div class="contact-features-grid">
                        <?php foreach ($settings['features'] as $index => $feature) : ?>
                            <div class="contact-feature-item">
                                <?php if (!empty($feature['feature_icon']['value'])) : ?>
                                    <div class="contact-feature-icon">
                                        <?php \Elementor\Icons_Manager::render_icon($feature['feature_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($feature['feature_title'])) : ?>
                                    <h3 class="contact-feature-title"><?php echo esc_html($feature['feature_title']); ?></h3>
                                <?php endif; ?>
                                
                                <?php if (!empty($feature['feature_description'])) : ?>
                                    <div class="contact-feature-description"><?php echo wp_kses_post($feature['feature_description']); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}