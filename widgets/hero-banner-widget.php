<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Hero Banner Widget
 */
class Hero_Banner_Widget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'hero_banner';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Hero Banner', 'advanced-elements-elementor');
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
        return ['hero', 'banner', 'header', 'image', 'consultancy'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends() {
        return ['advanced-elements-widgets', 'advanced-elements-hero-banner'];
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
                'default' => esc_html__('Consultancy Services across Industries in Computational Engineering', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter title', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'caption',
            [
                'label' => esc_html__('Caption', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Master skills with expert-led courses, solve challenges with tailored consultancy, and power your projects with cutting-edge cloud computing.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter caption', 'advanced-elements-elementor'),
                'rows' => 4,
            ]
        );

        $this->end_controls_section();

        // SVG Overlay Section
        $this->start_controls_section(
            'section_svg_overlay',
            [
                'label' => esc_html__('SVG Overlay', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_svg_overlay',
            [
                'label' => esc_html__('Show SVG Overlay', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'svg_image',
            [
                'label' => esc_html__('SVG Image', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg'],
                'default' => [
                    'url' => '',
                ],
                'condition' => [
                    'show_svg_overlay' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'svg_width',
            [
                'label' => esc_html__('SVG Width', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'vw' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 40,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-banner-svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_svg_overlay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'svg_opacity',
            [
                'label' => esc_html__('SVG Opacity', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'size' => 0.8,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-banner-svg' => 'opacity: {{SIZE}};',
                ],
                'condition' => [
                    'show_svg_overlay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'svg_position',
            [
                'label' => esc_html__('SVG Position', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'center',
                'options' => [
                    'top-left' => esc_html__('Top Left', 'advanced-elements-elementor'),
                    'top-center' => esc_html__('Top Center', 'advanced-elements-elementor'),
                    'top-right' => esc_html__('Top Right', 'advanced-elements-elementor'),
                    'center-left' => esc_html__('Center Left', 'advanced-elements-elementor'),
                    'center' => esc_html__('Center', 'advanced-elements-elementor'),
                    'center-right' => esc_html__('Center Right', 'advanced-elements-elementor'),
                    'bottom-left' => esc_html__('Bottom Left', 'advanced-elements-elementor'),
                    'bottom-center' => esc_html__('Bottom Center', 'advanced-elements-elementor'),
                    'bottom-right' => esc_html__('Bottom Right', 'advanced-elements-elementor'),
                ],
                'condition' => [
                    'show_svg_overlay' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'svg_offset_x',
            [
                'label' => esc_html__('Offset X', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-banner-svg' => '--offset-x: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_svg_overlay' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'svg_offset_y',
            [
                'label' => esc_html__('Offset Y', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-banner-svg' => '--offset-y: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_svg_overlay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'svg_rotate',
            [
                'label' => esc_html__('Rotate', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-banner-svg' => 'transform: translate(var(--offset-x), var(--offset-y)) rotate({{SIZE}}deg);',
                ],
                'condition' => [
                    'show_svg_overlay' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Background Section
        $this->start_controls_section(
            'section_background',
            [
                'label' => esc_html__('Background', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'background_image',
            [
                'label' => esc_html__('Background Image', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'background_position',
            [
                'label' => esc_html__('Background Position', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'center center',
                'options' => [
                    'top left' => esc_html__('Top Left', 'advanced-elements-elementor'),
                    'top center' => esc_html__('Top Center', 'advanced-elements-elementor'),
                    'top right' => esc_html__('Top Right', 'advanced-elements-elementor'),
                    'center left' => esc_html__('Center Left', 'advanced-elements-elementor'),
                    'center center' => esc_html__('Center Center', 'advanced-elements-elementor'),
                    'center right' => esc_html__('Center Right', 'advanced-elements-elementor'),
                    'bottom left' => esc_html__('Bottom Left', 'advanced-elements-elementor'),
                    'bottom center' => esc_html__('Bottom Center', 'advanced-elements-elementor'),
                    'bottom right' => esc_html__('Bottom Right', 'advanced-elements-elementor'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-banner-container' => 'background-position: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_size',
            [
                'label' => esc_html__('Background Size', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'auto' => esc_html__('Auto', 'advanced-elements-elementor'),
                    'cover' => esc_html__('Cover', 'advanced-elements-elementor'),
                    'contain' => esc_html__('Contain', 'advanced-elements-elementor'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-banner-container' => 'background-size: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'overlay_color',
            [
                'label' => esc_html__('Overlay Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 30, 0.7)',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner-overlay' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .hero-banner-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .hero-banner-title',
            ]
        );

        $this->add_control(
            'caption_color',
            [
                'label' => esc_html__('Caption Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner-caption' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'caption_typography',
                'selector' => '{{WRAPPER}} .hero-banner-caption',
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
            'banner_height',
            [
                'label' => esc_html__('Banner Height', 'advanced-elements-elementor'),
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
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 500,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-banner-container' => 'height: {{SIZE}}{{UNIT}};',
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
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 80,
                ],
                'selectors' => [
                    '{{WRAPPER}} .hero-banner-content' => 'max-width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .hero-banner-content' => 'text-align: {{VALUE}}; margin-left: auto; margin-right: auto;',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__('Content Padding', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .hero-banner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .hero-banner-container' => 'align-items: {{VALUE}};',
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
        
        $background_image = !empty($settings['background_image']['url']) ? 
            'style="background-image: url(' . esc_url($settings['background_image']['url']) . ');"' : '';
        
        // SVG position class
        $svg_position_class = 'svg-position-' . $settings['svg_position'];
        
        ?>
        <div class="hero-banner-container" <?php echo $background_image; ?>>
            <div class="hero-banner-overlay"></div>
            
            <?php if ($settings['show_svg_overlay'] === 'yes' && !empty($settings['svg_image']['url'])) : ?>
                <div class="hero-banner-svg <?php echo esc_attr($svg_position_class); ?>">
                    <img src="<?php echo esc_url($settings['svg_image']['url']); ?>" alt="SVG Overlay">
                </div>
            <?php endif; ?>
            
            <div class="hero-banner-content">
                <?php if (!empty($settings['title'])) : ?>
                    <h1 class="hero-banner-title"><?php echo esc_html($settings['title']); ?></h1>
                <?php endif; ?>
                
                <?php if (!empty($settings['caption'])) : ?>
                    <div class="hero-banner-caption"><?php echo esc_html($settings['caption']); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}