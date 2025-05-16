<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Happy Customers Widget
 */
class Happy_Customers_Widget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'happy_customers';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Happy Customers', 'advanced-elements-elementor');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-carousel';
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['customers', 'clients', 'testimonials', 'logos', 'partners'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends() {
        return ['advanced-elements-widgets', 'advanced-elements-happy-customers'];
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
            'title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Happy Customers', 'advanced-elements-elementor'),
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'customer_logo',
            [
                'label' => esc_html__('Customer Logo', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'customer_name',
            [
                'label' => esc_html__('Customer Name', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Company Name', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter company name', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'customer_link',
            [
                'label' => esc_html__('Customer Link', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://customer-website.com', 'advanced-elements-elementor'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'customer_list',
            [
                'label' => esc_html__('Customer Logos', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'customer_name' => esc_html__('Google', 'advanced-elements-elementor'),
                        'customer_link' => ['url' => '#'],
                    ],
                    [
                        'customer_name' => esc_html__('Microsoft', 'advanced-elements-elementor'),
                        'customer_link' => ['url' => '#'],
                    ],
                    [
                        'customer_name' => esc_html__('Amazon', 'advanced-elements-elementor'),
                        'customer_link' => ['url' => '#'],
                    ],
                    [
                        'customer_name' => esc_html__('Apple', 'advanced-elements-elementor'),
                        'customer_link' => ['url' => '#'],
                    ],
                ],
                'title_field' => '{{{ customer_name }}}',
            ]
        );

        $this->add_control(
            'wave_shape',
            [
                'label' => esc_html__('Bottom Wave', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('assets/images/curve-wave.svg', dirname(__FILE__)),
                ],
                'description' => esc_html__('Upload a curve wave SVG or use the default', 'advanced-elements-elementor'),
                'separator' => 'before',
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
                    '{{WRAPPER}} .happy-customers-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .happy-customers-title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .happy-customers-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .happy-customers-description',
            ]
        );

        $this->end_controls_section();

        // Style Section - Layout
        $this->start_controls_section(
            'section_style_layout',
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
                    'top' => '100',
                    'right' => '20',
                    'bottom' => '150',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .happy-customers-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'max_width',
            [
                'label' => esc_html__('Maximum Width', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 500,
                        'max' => 1600,
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
                    '{{WRAPPER}} .happy-customers-content' => 'max-width: {{SIZE}}{{UNIT}}; margin-left: auto; margin-right: auto;',
                ],
            ]
        );

        $this->add_responsive_control(
            'columns',
            [
                'label' => esc_html__('Logos Per Row', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'tablet_default' => '3',
                'mobile_default' => '2',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                ],
                'selectors' => [
                    '{{WRAPPER}} .happy-customers-logos' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
            ]
        );

        $this->add_responsive_control(
            'logo_gap',
            [
                'label' => esc_html__('Logo Gap', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .happy-customers-logos' => 'grid-gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'text_align',
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
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .happy-customers-header' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Customer Logos
        $this->start_controls_section(
            'section_style_logos',
            [
                'label' => esc_html__('Customer Logos', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'logo_background_color',
            [
                'label' => esc_html__('Logo Background', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0d1731',
                'selectors' => [
                    '{{WRAPPER}} .logo-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'logo_border_radius',
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
                    '{{WRAPPER}} .logo-item' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'logo_box_shadow',
                'selector' => '{{WRAPPER}} .logo-item',
            ]
        );

        $this->add_responsive_control(
            'logo_padding',
            [
                'label' => esc_html__('Logo Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '30',
                    'right' => '20',
                    'bottom' => '30',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'logo_height',
            [
                'label' => esc_html__('Logo Height', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 60,
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo-item img' => 'max-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'logo_opacity',
            [
                'label' => esc_html__('Logo Opacity', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo-item img' => 'opacity: {{SIZE}}%;',
                ],
            ]
        );

        $this->add_control(
            'logo_hover_opacity',
            [
                'label' => esc_html__('Logo Hover Opacity', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo-item:hover img' => 'opacity: {{SIZE}}%;',
                ],
            ]
        );

        $this->add_control(
            'logo_hover_effect',
            [
                'label' => esc_html__('Hover Effect', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'translateY',
                'options' => [
                    'none' => esc_html__('None', 'advanced-elements-elementor'),
                    'translateY' => esc_html__('Move Up', 'advanced-elements-elementor'),
                    'scale' => esc_html__('Scale', 'advanced-elements-elementor'),
                    'shadow' => esc_html__('Shadow', 'advanced-elements-elementor'),
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Wave
        $this->start_controls_section(
            'section_style_wave',
            [
                'label' => esc_html__('Bottom Wave', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'wave_color',
            [
                'label' => esc_html__('Wave Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4285f4',
                'selectors' => [
                    '{{WRAPPER}} .wave-shape svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'wave_height',
            [
                'label' => esc_html__('Wave Height', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'vh', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
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
                    '{{WRAPPER}} .wave-shape' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'wave_position',
            [
                'label' => esc_html__('Wave Position', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'bottom',
                'options' => [
                    'bottom' => esc_html__('Bottom', 'advanced-elements-elementor'),
                    'top' => esc_html__('Top', 'advanced-elements-elementor'),
                    'both' => esc_html__('Both', 'advanced-elements-elementor'),
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
                'selector' => '{{WRAPPER}} .happy-customers-container',
                'default' => [
                    'color' => '#0c1221',
                ],
            ]
        );

        $this->end_controls_section();

        // Responsive Section
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
                'raw' => esc_html__('Adjust settings for different screen sizes using the responsive controls.', 'advanced-elements-elementor'),
                'content_classes' => 'elementor-descriptor',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        
        // Wave position class
        $wave_position_class = 'wave-' . $settings['wave_position'];
        
        // Logo hover effect class
        $hover_effect_class = 'hover-' . $settings['logo_hover_effect'];
        ?>

        <div class="happy-customers-container <?php echo esc_attr($wave_position_class); ?>">
            <div class="happy-customers-content">
                <div class="happy-customers-header">
                    <?php if (!empty($settings['title'])) : ?>
                        <h2 class="happy-customers-title"><?php echo esc_html($settings['title']); ?></h2>
                    <?php endif; ?>
                    
                    <?php if (!empty($settings['description'])) : ?>
                        <p class="happy-customers-description"><?php echo esc_html($settings['description']); ?></p>
                    <?php endif; ?>
                </div>
                
                <?php if (!empty($settings['customer_list'])) : ?>
                    <div class="happy-customers-logos">
                        <?php foreach ($settings['customer_list'] as $index => $item) : 
                            $link_url = !empty($item['customer_link']['url']) ? $item['customer_link']['url'] : '#';
                            $link_target = !empty($item['customer_link']['is_external']) ? ' target="_blank"' : '';
                            $link_nofollow = !empty($item['customer_link']['nofollow']) ? ' rel="nofollow"' : '';
                        ?>
                            <div class="logo-item <?php echo esc_attr($hover_effect_class); ?>">
                                <a href="<?php echo esc_url($link_url); ?>" <?php echo $link_target . $link_nofollow; ?>>
                                    <img src="<?php echo esc_url($item['customer_logo']['url']); ?>" alt="<?php echo esc_attr($item['customer_name']); ?>" />
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if (!empty($settings['wave_shape']['url']) && in_array($settings['wave_position'], ['bottom', 'both'])) : ?>
                <div class="wave-shape bottom-wave">
                    <img src="<?php echo esc_url($settings['wave_shape']['url']); ?>" alt="Wave Shape" />
                </div>
            <?php endif; ?>
            
            <?php if (!empty($settings['wave_shape']['url']) && in_array($settings['wave_position'], ['top', 'both'])) : ?>
                <div class="wave-shape top-wave">
                    <img src="<?php echo esc_url($settings['wave_shape']['url']); ?>" alt="Wave Shape" />
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}