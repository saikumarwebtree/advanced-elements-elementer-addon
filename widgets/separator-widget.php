<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Custom Separator Widget
 */
class Custom_Separator_Widget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'custom_separator';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Custom Separator', 'advanced-elements-elementor');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-divider';
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['separator', 'divider', 'line', 'break', 'section', 'custom'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends() {
        return ['advanced-elements-widgets', 'advanced-elements-separator'];
    }

    /**
     * Register widget controls
     */
    protected function _register_controls() {

        // Content Section - Separator
        $this->start_controls_section(
            'section_separator',
            [
                'label' => esc_html__('Separator', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_separator',
            [
                'label' => esc_html__('Show Separator', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'separator_image',
            [
                'label' => esc_html__('Separator Image', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'description' => esc_html__('Upload custom separator SVG or use the default', 'advanced-elements-elementor'),
                'condition' => [
                    'show_separator' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'separator_width',
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
                    '{{WRAPPER}} .separator-line img' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .separator-line svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_separator' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'separator_color',
            [
                'label' => esc_html__('Separator Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .separator-line svg path' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .separator-line svg' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'show_separator' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'separator_height',
            [
                'label' => esc_html__('Height', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .separator-line img' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .separator-line svg' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_separator' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'separator_alignment',
            [
                'label' => esc_html__('Alignment', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .separator-line' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'show_separator' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Spacing
        $this->start_controls_section(
            'section_style_spacing',
            [
                'label' => esc_html__('Spacing', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'separator_margin',
            [
                'label' => esc_html__('Margin', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .separator-line' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '50',
                    'right' => '0',
                    'bottom' => '50',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'condition' => [
                    'show_separator' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'separator_padding',
            [
                'label' => esc_html__('Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .separator-line' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'show_separator' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Effects
        $this->start_controls_section(
            'section_style_effects',
            [
                'label' => esc_html__('Effects', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'separator_opacity',
            [
                'label' => esc_html__('Opacity', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .separator-line' => 'opacity: {{SIZE}};',
                ],
                'default' => [
                    'size' => 1,
                ],
                'condition' => [
                    'show_separator' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'separator_animation',
            [
                'label' => esc_html__('Enable Animation', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
                'condition' => [
                    'show_separator' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'animation_type',
            [
                'label' => esc_html__('Animation Type', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'animate__fadeInUp',
                'options' => [
                    'animate__fadeIn' => esc_html__('Fade In', 'advanced-elements-elementor'),
                    'animate__fadeInUp' => esc_html__('Fade In Up', 'advanced-elements-elementor'),
                    'animate__fadeInDown' => esc_html__('Fade In Down', 'advanced-elements-elementor'),
                    'animate__fadeInLeft' => esc_html__('Fade In Left', 'advanced-elements-elementor'),
                    'animate__fadeInRight' => esc_html__('Fade In Right', 'advanced-elements-elementor'),
                    'animate__slideInUp' => esc_html__('Slide In Up', 'advanced-elements-elementor'),
                    'animate__slideInDown' => esc_html__('Slide In Down', 'advanced-elements-elementor'),
                    'animate__zoomIn' => esc_html__('Zoom In', 'advanced-elements-elementor'),
                ],
                'condition' => [
                    'show_separator' => 'yes',
                    'separator_animation' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'animation_delay',
            [
                'label' => esc_html__('Animation Delay (seconds)', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 3,
                        'min' => 0,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'size' => 0.2,
                ],
                'condition' => [
                    'show_separator' => 'yes',
                    'separator_animation' => 'yes',
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
                'selector' => '{{WRAPPER}} .separator-container',
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => esc_html__('Section Padding', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .separator-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        
        // Check if separator should be shown
        if ('yes' !== $settings['show_separator']) {
            return;
        }
        
        // Animation classes
        $animation_class = '';
        $animation_data = '';
        if ('yes' === $settings['separator_animation']) {
            $animation_class = 'animate-on-scroll';
            $animation_data = ' data-animation="' . esc_attr($settings['animation_type']) . '"';
            if (!empty($settings['animation_delay']['size'])) {
                $animation_data .= ' data-delay="' . esc_attr($settings['animation_delay']['size']) . '"';
            }
        }
        ?>
        <div class="custom-separator">
            <!-- <div class="separator-line <?php echo esc_attr($animation_class); ?>"<?php echo $animation_data; ?>> -->
            <div class="course-advantages-end-line animate-on-scroll" data-animation="animate__fadeInUp" style="left: 0; width: 100%;">
                <?php if (!empty($settings['separator_image']['url'])) : ?>
                    <?php
                    $image_url = $settings['separator_image']['url'];
                    $image_alt = !empty($settings['separator_image']['alt']) ? $settings['separator_image']['alt'] : 'Separator';
                    
                    // Check if it's an SVG file
                    $file_extension = pathinfo($image_url, PATHINFO_EXTENSION);
                    if (strtolower($file_extension) === 'svg') {
                        // For SVG files, we'll use img tag but ensure proper styling
                        echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '" />';
                    } else {
                        // For other image formats
                        echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '" />';
                    }
                    ?>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}