<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Consultancy Grid Widget
 */
class Consultancy_Grid_Widget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'consultancy_grid';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Consultancy Grid', 'advanced-elements-elementor');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['consultancy', 'grid', 'features', 'services'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends() {
        return ['advanced-elements-widgets', 'advanced-elements-consultancy-grid'];
    }

    /**
     * Register widget controls
     */
    protected function _register_controls() {

        // Header Section
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
                'default' => esc_html__('Consultancy', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter subtitle', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Solve Complex Challenges with Confidence', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter title', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Our team of computational engineering experts delivers tailored consultancy for your projects.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter description', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View More', 'advanced-elements-elementor'),
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

        $this->end_controls_section();

        // Main Image Section
        $this->start_controls_section(
            'section_main_image',
            [
                'label' => esc_html__('Main Images', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'main_image_left',
            [
                'label' => esc_html__('Left Image', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'main_image_right',
            [
                'label' => esc_html__('Right Image', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'circular_button_text',
            [
                'label' => esc_html__('Circular Button Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Know More about Consultancy', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter circular button text', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'circular_button_link',
            [
                'label' => esc_html__('Circular Button Link', 'advanced-elements-elementor'),
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
            'circular_button_icon',
            [
                'label' => esc_html__('Play Icon', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-play',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'play',
                        'play-circle',
                    ],
                ],
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => esc_html__('Video URL', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://www.youtube.com/watch?v=VIDEO_ID', 'advanced-elements-elementor'),
                'description' => esc_html__('Enter YouTube or Vimeo URL', 'advanced-elements-elementor'),
                'default' => [
                    'url' => '',
                ],
                'separator' => 'before',
            ]
        );
        
        $this->add_control(
            'video_play_on_mobile',
            [
                'label' => esc_html__('Play on Mobile', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'description' => esc_html__('Enable or disable video autoplay on mobile devices', 'advanced-elements-elementor'),
            ]
        );
        
        $this->add_control(
            'video_aspect_ratio',
            [
                'label' => esc_html__('Aspect Ratio', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '169' => '16:9',
                    '219' => '21:9',
                    '43' => '4:3',
                    '32' => '3:2',
                    '11' => '1:1',
                ],
                'default' => '169',
                'description' => esc_html__('Select the aspect ratio of the video', 'advanced-elements-elementor'),
            ]
        );

        $this->end_controls_section();

        // Grid Features Section
        $this->start_controls_section(
            'section_features',
            [
                'label' => esc_html__('Features Grid', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'feature_icon',
            [
                'label' => esc_html__('Feature Icon', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-cog',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'feature_title',
            [
                'label' => esc_html__('Feature Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Feature Title', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter feature title', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'feature_link',
            [
                'label' => esc_html__('Feature Link', 'advanced-elements-elementor'),
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
            'features_list',
            [
                'label' => esc_html__('Features', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_title' => esc_html__('Custom Simulations', 'advanced-elements-elementor'),
                        'feature_link' => ['url' => '#'],
                    ],
                    [
                        'feature_title' => esc_html__('Optimization Strategies', 'advanced-elements-elementor'),
                        'feature_link' => ['url' => '#'],
                    ],
                    [
                        'feature_title' => esc_html__('Industry-Specific Solutions', 'advanced-elements-elementor'),
                        'feature_link' => ['url' => '#'],
                    ],
                    [
                        'feature_title' => esc_html__('Fast Turnaround', 'advanced-elements-elementor'),
                        'feature_link' => ['url' => '#'],
                    ],
                ],
                'title_field' => '{{{ feature_title }}}',
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
                'default' => '#2d7bcb',
                'selectors' => [
                    '{{WRAPPER}} .consultancy-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .consultancy-subtitle',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .consultancy-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .consultancy-title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .consultancy-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .consultancy-description',
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
                    '{{WRAPPER}} .consultancy-button' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .consultancy-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_border_color',
            [
                'label' => esc_html__('Border Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2d7bcb',
                'selectors' => [
                    '{{WRAPPER}} .consultancy-button' => 'border-color: {{VALUE}};',
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
                    '{{WRAPPER}} .consultancy-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_background_color',
            [
                'label' => esc_html__('Hover Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2d7bcb',
                'selectors' => [
                    '{{WRAPPER}} .consultancy-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Features Grid
        $this->start_controls_section(
            'section_style_features',
            [
                'label' => esc_html__('Features Grid Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'features_background_color',
            [
                'label' => esc_html__('Feature Box Background', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#1c2432',
                'selectors' => [
                    '{{WRAPPER}} .feature-box' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'features_text_color',
            [
                'label' => esc_html__('Feature Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .feature-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'features_icon_color',
            [
                'label' => esc_html__('Feature Icon Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2d7bcb',
                'selectors' => [
                    '{{WRAPPER}} .feature-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .feature-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'features_border_radius',
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
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .feature-box' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Circular Button
        $this->start_controls_section(
            'section_style_circular_button',
            [
                'label' => esc_html__('Circular Button Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'circular_background_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2d7bcb',
                'selectors' => [
                    '{{WRAPPER}} .circular-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'circular_text_color',
            [
                'label' => esc_html__('Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .circular-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'circular_icon_color',
            [
                'label' => esc_html__('Icon Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .circular-button .play-icon' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .circular-button .play-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'circular_size',
            [
                'label' => esc_html__('Size', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 80,
                        'max' => 200,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 120,
                ],
                'selectors' => [
                    '{{WRAPPER}} .circular-button' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .consultancy-grid-container',
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => esc_html__('Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .consultancy-grid-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        // Responsive Settings
        $this->start_controls_section(
            'section_responsive',
            [
                'label' => esc_html__('Responsive Settings', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'responsive_note',
            [
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => esc_html__('Adjust settings for different screen sizes.', 'advanced-elements-elementor'),
                'content_classes' => 'elementor-descriptor',
            ]
        );

        $this->add_control(
            'features_columns_tablet',
            [
                'label' => esc_html__('Features Columns (Tablet)', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1' => esc_html__('1 Column', 'advanced-elements-elementor'),
                    '2' => esc_html__('2 Columns', 'advanced-elements-elementor'),
                ],
            ]
        );

        $this->add_control(
            'features_columns_mobile',
            [
                'label' => esc_html__('Features Columns (Mobile)', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('1 Column', 'advanced-elements-elementor'),
                    '2' => esc_html__('2 Columns', 'advanced-elements-elementor'),
                ],
            ]
        );

        $this->end_controls_section();

        // Curved Divider Section
        $this->start_controls_section(
            'section_curve_divider',
            [
                'label' => esc_html__('Curved Divider', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_curve_divider',
            [
                'label' => esc_html__('Show Curve Divider', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'curve_divider_position',
            [
                'label' => esc_html__('Position', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'bottom',
                'options' => [
                    'bottom' => esc_html__('Bottom', 'advanced-elements-elementor'),
                    'top' => esc_html__('Top', 'advanced-elements-elementor'),
                    'both' => esc_html__('Both', 'advanced-elements-elementor'),
                ],
                'condition' => [
                    'show_curve_divider' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'curve_divider_color',
            [
                'label' => esc_html__('Curve Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .curve-divider .curve-svg path' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'show_curve_divider' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'curve_divider_height',
            [
                'label' => esc_html__('Height', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'vh', '%'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 300,
                        'step' => 1,
                    ],
                    'vh' => [
                        'min' => 1,
                        'max' => 20,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 20,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .curve-divider' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_curve_divider' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'custom_curve_svg',
            [
                'label' => esc_html__('Custom Curve SVG', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_type' => 'image',
                'description' => esc_html__('Upload a custom SVG curve or use the default', 'advanced-elements-elementor'),
                'condition' => [
                    'show_curve_divider' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'flip_curve',
            [
                'label' => esc_html__('Flip Curve', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => '',
                'condition' => [
                    'show_curve_divider' => 'yes',
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
        
        // Button Link attributes
        $button_link = !empty($settings['button_link']['url']) ? $settings['button_link']['url'] : '#';
        $button_target = !empty($settings['button_link']['is_external']) ? ' target="_blank"' : '';
        $button_nofollow = !empty($settings['button_link']['nofollow']) ? ' rel="nofollow"' : '';
        
        // Circular button link attributes
        $circular_link = !empty($settings['circular_button_link']['url']) ? $settings['circular_button_link']['url'] : '#';
        $circular_target = !empty($settings['circular_button_link']['is_external']) ? ' target="_blank"' : '';
        $circular_nofollow = !empty($settings['circular_button_link']['nofollow']) ? ' rel="nofollow"' : '';
        
        // Responsive settings
        $tablet_class = 'columns-' . $settings['features_columns_tablet'] . '-tablet';
        $mobile_class = 'columns-' . $settings['features_columns_mobile'] . '-mobile';
        ?>
    
        <div class="consultancy-grid-container">
            <div class="consultancy-grid-content">
                <div class="consultancy-header">
                    <div class="consultancy-header-left">
                        <?php if (!empty($settings['subtitle'])) : ?>
                            <h5 class="consultancy-subtitle animate-on-scroll" data-animation="animate__fadeInUp"><?php echo esc_html($settings['subtitle']); ?></h5>
                        <?php endif; ?>
                        
                        <?php if (!empty($settings['title'])) : ?>
                            <h2 class="consultancy-title animate-on-scroll" data-animation="animate__fadeInUp"><?php echo esc_html($settings['title']); ?></h2>
                        <?php endif; ?>
                        
                        <?php if (!empty($settings['description'])) : ?>
                            <p class="consultancy-description animate-on-scroll" data-animation="animate__fadeInUp"><?php echo esc_html($settings['description']); ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <?php if (!empty($settings['button_text'])) : ?>
                    <div class="consultancy-header-right">
                        <a href="<?php echo esc_url($button_link); ?>" class="consultancy-button animate-on-scroll" data-animation="animate__fadeInUp" <?php echo $button_target . $button_nofollow; ?>>
                            <?php echo esc_html($settings['button_text']); ?> 
                            <span class="button-arrow">→</span>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="consultancy-main-content">
                    <!-- Left Column: Image + Features Grid -->
                    <div class="consultancy-left-column">
                        <!-- Main Left Image -->
                        <div class="consultancy-image-left animate-on-scroll" data-animation="animate__fadeInUp">
                            <img src="<?php echo esc_url($settings['main_image_left']['url']); ?>" alt="Consultancy Team" />
                        </div>
                        
                        <!-- Features Grid -->
                        <div class="consultancy-features-grid <?php echo esc_attr($tablet_class . ' ' . $mobile_class); ?>">
                            <?php foreach ($settings['features_list'] as $index => $item) : 
                                $feature_link = !empty($item['feature_link']['url']) ? $item['feature_link']['url'] : '#';
                                $feature_target = !empty($item['feature_link']['is_external']) ? ' target="_blank"' : '';
                                $feature_nofollow = !empty($item['feature_link']['nofollow']) ? ' rel="nofollow"' : '';
                            ?>
                                <div class="feature-box animate-on-scroll" data-animation="animate__fadeInUp">
                                    <a href="<?php echo esc_url($feature_link); ?>" <?php echo $feature_target . $feature_nofollow; ?>>
                                        <div class="feature-icon">
                                            <?php \Elementor\Icons_Manager::render_icon($item['feature_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                        <div class="feature-title"><?php echo esc_html($item['feature_title']); ?></div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <!-- Right Column: Image with Button -->
                    <div class="consultancy-right-column">
                        <!-- Right Image with Circular Button -->
                        <div class="background-top-right-mask-container animate-on-scroll" data-animation="animate__fadeInUp">
                            <!-- Circle Button Container -->
                            <?php 
                                $video_url = !empty($settings['video_url']['url']) ? $settings['video_url']['url'] : '';
                                $has_video = !empty($video_url);
                                $video_aspect_ratio = !empty($settings['video_aspect_ratio']) ? esc_attr(trim($settings['video_aspect_ratio'])) : '169';
                                $play_on_mobile = !empty($settings['video_play_on_mobile']) ? 'true' : 'false';
                                
                                if (!empty($settings['button_text'])) :
                                    $button_onclick = $has_video ? 'onclick="openVideoPopup(\'' . esc_url($video_url) . '\', \'' . esc_attr($video_aspect_ratio) . '\', ' . $play_on_mobile . '); return false;"' : '';
                            ?>
                            <div class="circle-button-container">
                                <a href="<?php echo esc_url($circular_link); ?>" class="circle-button" 
                                    <?php if (!empty($video_url)) : ?>
                                        data-video-url="<?php echo esc_url($video_url); ?>"
                                        data-aspect-ratio="<?php echo esc_attr($settings['video_aspect_ratio']); ?>"
                                        data-play-mobile="<?php echo $settings['video_play_on_mobile'] === 'yes' ? 'true' : 'false'; ?>"
                                    <?php endif; ?>
                                    <?php echo $circular_target . $circular_nofollow; ?>
                                >
                                    <svg viewBox="0 0 280 280" class="text-ring">
                                        <defs>
                                            <path id="circlePath" d="M140,140 m-85,0 a85,85 0 1,1 170,0 a85,85 0 1,1 -170,0" />
                                        </defs>
                                        <text>
                                            <textPath href="#circlePath" startOffset="0%">
                                                <?php echo esc_html($settings['circular_button_text']); ?>
                                            </textPath>
                                        </text>
                                    </svg>
                                    
                                    <!-- Center Play Icon -->
                                    <div class="play-icon">
                                        <?php \Elementor\Icons_Manager::render_icon($settings['circular_button_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                </a>
                            </div>
                            <?php endif; ?> 
                            
                            <div class="image-card">
                                <img src="<?php echo esc_url($settings['main_image_right']['url']); ?>" alt="Engineering Design" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ('yes' === $settings['show_curve_divider']) : ?>
                <?php $svg_url = !empty($settings['custom_curve_svg']['url'])  ? $settings['custom_curve_svg']['url'] : plugins_url('assets/images/curve-divider.svg', dirname(__FILE__)); ?>
                <div class="consultancy-end-line animate-on-scroll" data-animation="animate__slideInUp">
                    <img src="<?php echo esc_url($svg_url); ?>" alt="Curve Divider">
                </div>
                <!-- Curved Divider -->
                <?php /*
                    // Get SVG source
                    $svg_url = !empty($settings['custom_curve_svg']['url']) 
                        ? $settings['custom_curve_svg']['url'] 
                        : plugins_url('assets/images/curve-divider.svg', dirname(__FILE__));
                    
                    // Flip classes
                    $flip_class = $settings['flip_curve'] === 'yes' ? 'flip-vertical' : '';
                    
                    // Position classes
                    if ($settings['curve_divider_position'] === 'bottom' || $settings['curve_divider_position'] === 'both') : 
                ?>
                    <div class="curve-divider bottom-curve <?php echo esc_attr($flip_class); ?>">
                        <div class="curve-svg">
                            <img src="<?php echo esc_url($svg_url); ?>" alt="Curve Divider">
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php 
                    if ($settings['curve_divider_position'] === 'top' || $settings['curve_divider_position'] === 'both') : 
                        $top_flip_class = $settings['flip_curve'] === 'yes' ? '' : 'flip-vertical';
                ?>
                    <div class="curve-divider top-curve <?php echo esc_attr($top_flip_class); ?>">
                        <div class="curve-svg">
                            <img src="<?php echo esc_url($svg_url); ?>" alt="Curve Divider">
                        </div>
                    </div>
                <?php endif; */ ?>
            <?php endif; ?>
        </div>
        <?php
            // Add the video popup markup at the end
            if ($has_video) :
        ?>
            <script>
                jQuery(document).ready(function($) {
                    $(".circle-button").on("click", function(e) {
                        e.preventDefault();
                        openVideoPopup("<?php echo esc_url($video_url); ?>", "'<?php echo $video_aspect_ratio; ?>", '<?php echo $play_on_mobile; ?>');
                    });
                });
            </script>
            <div id="video-popup-overlay" class="video-popup-overlay">
                <div class="video-popup-container">
                    <div class="video-popup-close">&times;</div>
                    <div id="video-popup-content" class="video-popup-content"></div>
                </div>
            </div>
        <?php endif; ?>
        <?php
    }
}