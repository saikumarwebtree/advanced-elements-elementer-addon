<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Hero Section Widget
 */
class Hero_Section_Widget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'hero_section';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Hero Section', 'advanced-elements-elementor');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-banner';
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['hero', 'header', 'banner', 'intro', 'showcase'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends() {
        return ['advanced-elements-widgets', 'advanced-elements-hero-section'];
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
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Comprehensive Platform', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter subtitle', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Learn and Build Career in One Platform', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter title', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('From beginner to advanced levels, our courses and consultancy services empower you with practical skills in CFD and FEA, bridging the knowledge gap in your career with Flowthermolab.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter description', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'show_button',
            [
                'label' => esc_html__('Show Button', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'return_value' => 'yes',
                'default' => '',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'advanced-elements-elementor'),
                'condition' => [
                    'show_button' => 'yes',
                ],
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
                'condition' => [
                    'show_button' => 'yes',
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
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .hero-section',
            ]
        );

        $this->add_control(
            'background_overlay',
            [
                'label' => esc_html__('Background Overlay', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.5)',
                'selectors' => [
                    '{{WRAPPER}} .hero-section::before' => 'content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: {{VALUE}}; z-index: 1;',
                ],
                'condition' => [
                    'background_background' => ['classic', 'video'],
                ],
            ]
        );

        $this->end_controls_section();

        // Typography Section
        $this->start_controls_section(
            'section_style_typography',
            [
                'label' => esc_html__('Typography', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .hero-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .hero-subtitle',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_SECONDARY,
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .hero-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .hero-title',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(255, 255, 255, 0.8)',
                'selectors' => [
                    '{{WRAPPER}} .hero-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .hero-description',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
                ],
            ]
        );

        $this->end_controls_section();

        // Button Style Section
        $this->start_controls_section(
            'section_style_button',
            [
                'label' => esc_html__('Button', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .hero-button',
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
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .hero-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .hero-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .hero-button',
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
            'button_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .hero-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_background_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2d7bcb',
                'selectors' => [
                    '{{WRAPPER}} .hero-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-button:hover' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'button_border_border!' => '',
                ],
            ]
        );

        $this->add_control(
            'button_hover_transition',
            [
                'label' => esc_html__('Transition Duration', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 3,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'size' => 0.3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-button' => 'transition: all {{SIZE}}s ease;',
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
                    '{{WRAPPER}} .hero-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'top' => '15',
                    'right' => '30',
                    'bottom' => '15',
                    'left' => '30',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Layout Section
        $this->start_controls_section(
            'section_style_layout',
            [
                'label' => esc_html__('Layout', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'section_height',
            [
                'label' => esc_html__('Section Height', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'vh', '%'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 10,
                    ],
                    'vh' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 500,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-section' => 'min-height: {{SIZE}}{{UNIT}};',
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
                    'top' => '120',
                    'right' => '0',
                    'bottom' => '120',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_width',
            [
                'label' => esc_html__('Content Width', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 300,
                        'max' => 1200,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 800,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-content' => 'max-width: {{SIZE}}{{UNIT}}; margin-left: auto; margin-right: auto;',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_alignment',
            [
                'label' => esc_html__('Content Alignment', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .hero-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'vertical_position',
            [
                'label' => esc_html__('Vertical Position', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'center',
                'options' => [
                    'flex-start' => esc_html__('Top', 'advanced-elements-elementor'),
                    'center' => esc_html__('Middle', 'advanced-elements-elementor'),
                    'flex-end' => esc_html__('Bottom', 'advanced-elements-elementor'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-section' => 'display: flex; align-items: {{VALUE}};',
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
        
        // Button link properties
        $button_link = $settings['show_button'] === 'yes' ? (!empty($settings['button_link']['url']) ? $settings['button_link']['url'] : '#') : '';
        $button_target = $settings['show_button'] === 'yes' ? (!empty($settings['button_link']['is_external']) ? ' target="_blank"' : '') : '';
        $button_nofollow = $settings['show_button'] === 'yes' ? (!empty($settings['button_link']['nofollow']) ? ' rel="nofollow"' : '') : '';
        
        ?>
        <section class="hero-section">
            <div class="hero-container">
                <div class="hero-content">
                    <?php if (!empty($settings['subtitle'])) : ?>
                        <span class="hero-subtitle animate-on-scroll" data-animation="animate__fadeInUp" data-delay="0.1s"><?php echo esc_html($settings['subtitle']); ?></span>
                    <?php endif; ?>
                    
                    <?php if (!empty($settings['title'])) : ?>
                        <h1 class="hero-title animate-on-scroll" data-animation="animate__fadeInUp" data-delay="0.2s"><?php echo esc_html($settings['title']); ?></h1>
                    <?php endif; ?>
                    
                    <?php if (!empty($settings['description'])) : ?>
                        <p class="hero-description animate-on-scroll" data-animation="animate__fadeInUp"  data-delay="0.3s"><?php echo esc_html($settings['description']); ?></p>
                    <?php endif; ?>
                    
                    <?php if ($settings['show_button'] === 'yes' && !empty($settings['button_text'])) : ?>
                        <div class="hero-button-container">
                            <a href="<?php echo esc_url($button_link); ?>" class="hero-button" <?php echo $button_target . $button_nofollow; ?>>
                                <?php echo esc_html($settings['button_text']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php
    }
}