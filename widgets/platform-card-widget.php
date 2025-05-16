<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Platform Card Widget
 */
class Platform_Card_Widget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'platform_card';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Platform Card', 'advanced-elements-elementor');
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
        return ['platform', 'card', 'box', 'info'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends() {
        return ['advanced-elements-widgets', 'advanced-elements-platform-card'];
    }

    /**
     * Register widget controls
     */
    protected function _register_controls() {

        // Content Section
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'card_icon',
            [
                'label' => esc_html__('Icon', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'card_title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Consultancy', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter your title', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'card_description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Expert solutions for your engineering challenges.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter your description', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'card_link',
            [
                'label' => esc_html__('Link', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'advanced-elements-elementor'),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Card
        $this->start_controls_section(
            'section_style_card',
            [
                'label' => esc_html__('Card', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_background_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#1c2024',
                'selectors' => [
                    '{{WRAPPER}} .platform-card' => 'background: linear-gradient(180deg, {{VALUE}}, {{VALUE}});',
                ],
            ]
        );

        $this->add_control(
            'card_hover_background_color',
            [
                'label' => esc_html__('Hover Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#1b325f',
                'selectors' => [
                    '{{WRAPPER}} .platform-card-container:hover .platform-card' => 'background: linear-gradient(180deg, {{VALUE}}, #1c2024);',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'selector' => '{{WRAPPER}} .platform-card',
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => esc_html__('Border Radius', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => '30',
                    'right' => '30',
                    'bottom' => '30',
                    'left' => '30',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .platform-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_padding',
            [
                'label' => esc_html__('Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '30',
                    'right' => '30',
                    'bottom' => '30',
                    'left' => '30',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .platform-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Icon
        $this->start_controls_section(
            'section_style_icon',
            [
                'label' => esc_html__('Icon', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_background_color_start',
            [
                'label' => esc_html__('Background Color Start', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2d7bcb',
            ]
        );

        $this->add_control(
            'icon_background_color_end',
            [
                'label' => esc_html__('Background Color End', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#00a2fa',
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__('Size', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 200,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .platform-card .icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_border_radius',
            [
                'label' => esc_html__('Border Radius', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .platform-card .icon' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_padding',
            [
                'label' => esc_html__('Padding', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .platform-card .icon img' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Typography
        $this->start_controls_section(
            'section_style_typography',
            [
                'label' => esc_html__('Typography', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .platform-card .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .platform-card .title',
                'default' => [
                    'font_size' => '22px',
                    'font_weight' => '600',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .platform-card .description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .platform-card .description',
                'default' => [
                    'font_size' => '18px',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Button
        $this->start_controls_section(
            'section_style_button',
            [
                'label' => esc_html__('Button', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_background_color_start',
            [
                'label' => esc_html__('Background Color Start', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2d7bcb',
            ]
        );

        $this->add_control(
            'button_background_color_end',
            [
                'label' => esc_html__('Background Color End', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#00a2fa',
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .button-container a span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_size',
            [
                'label' => esc_html__('Size', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 150,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 90,
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

        // Build link attributes
        $link_url = $settings['card_link']['url'] ? $settings['card_link']['url'] : '#';
        $target = $settings['card_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['card_link']['nofollow'] ? ' rel="nofollow"' : '';

        // Get icon background gradient
        $icon_bg = 'background: linear-gradient(90deg, ' . $settings['icon_background_color_start'] . ', ' . $settings['icon_background_color_end'] . ');';
        
        // Get button background gradient
        $button_bg = 'background: linear-gradient(90deg, ' . $settings['button_background_color_start'] . ', ' . $settings['button_background_color_end'] . ');';
        
        // Set button size
        $button_size = $settings['button_size']['size'] . 'px';
        
        ?>
        <div class="platform-card-container animate-on-scroll" data-animation="animate__slideInUp">
            <div class="platform-card">
                <div class="icon" style="<?php echo esc_attr($icon_bg); ?>">
                    <img src="<?php echo esc_url($settings['card_icon']['url']); ?>" alt="<?php echo esc_attr($settings['card_title']); ?> Icon" />
                </div>
                <h4 class="title"><?php echo esc_html($settings['card_title']); ?></h4>
                <p class="description"><?php echo esc_html($settings['card_description']); ?></p>
            </div>
            <div class="button-container">
                <a href="<?php echo esc_url($link_url); ?>"<?php echo $target . $nofollow; ?> style="<?php echo esc_attr($button_bg); ?> width: <?php echo esc_attr($button_size); ?>; height: <?php echo esc_attr($button_size); ?>; line-height: <?php echo esc_attr($button_size); ?>;">
                    <span>→</span>
                </a>
            </div>
        </div>
        <?php
    }
}