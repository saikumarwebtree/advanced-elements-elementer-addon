<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Course Advantage Widget
 */
class Course_Advantage_Widget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'course_advantage';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Course Advantage', 'advanced-elements-elementor');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-check-circle';
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['course', 'advantage', 'features', 'benefits', 'education'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends() {
        return ['advanced-elements-widgets', 'advanced-elements-course-advantage'];
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
                'default' => esc_html__('Our Course Advantage', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter title', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Learn from industry leaders dedicated to making your learning journey', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter description', 'advanced-elements-elementor'),
            ]
        );

        $this->end_controls_section();

        // Content Section - Advantages
        $this->start_controls_section(
            'section_advantages',
            [
                'label' => esc_html__('Advantages', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'advantage_icon',
            [
                'label' => esc_html__('Icon', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-check',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'check',
                        'check-circle',
                        'star',
                        'award',
                        'certificate',
                        'graduation-cap',
                        'book',
                        'video',
                        'download',
                        'clock',
                        'money-bill',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'advantage_title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Advantage Title', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter advantage title', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'advantage_description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('When unknown printer took galley of type and scrambled.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter advantage description', 'advanced-elements-elementor'),
                'rows' => 3,
            ]
        );

        $this->add_control(
            'advantages',
            [
                'label' => esc_html__('Advantages', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'advantage_title' => esc_html__('Expert Led Courses', 'advanced-elements-elementor'),
                        'advantage_description' => esc_html__('When unknown printer took galley of type and scrambled.', 'advanced-elements-elementor'),
                    ],
                    [
                        'advantage_title' => esc_html__('Affordable', 'advanced-elements-elementor'),
                        'advantage_description' => esc_html__('When unknown printer took galley of type and scrambled.', 'advanced-elements-elementor'),
                    ],
                    [
                        'advantage_title' => esc_html__('Certified Courses', 'advanced-elements-elementor'),
                        'advantage_description' => esc_html__('When unknown printer took galley of type and scrambled.', 'advanced-elements-elementor'),
                    ],
                    [
                        'advantage_title' => esc_html__('5 Days Refund Promise', 'advanced-elements-elementor'),
                        'advantage_description' => esc_html__('When unknown printer took galley of type and scrambled.', 'advanced-elements-elementor'),
                    ],
                ],
                'title_field' => '{{{ advantage_title }}}',
            ]
        );

        $this->add_responsive_control(
            'columns',
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
                    '{{WRAPPER}} .advantage-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
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
            'title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .advantage-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .advantage-title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .advantage-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .advantage-description',
            ]
        );

        $this->add_responsive_control(
            'header_spacing',
            [
                'label' => esc_html__('Header Bottom Spacing', 'advanced-elements-elementor'),
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
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .advantage-header' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'header_alignment',
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
                    '{{WRAPPER}} .advantage-header' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Advantage Items
        $this->start_controls_section(
            'section_style_advantages',
            [
                'label' => esc_html__('Advantage Items Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'item_spacing',
            [
                'label' => esc_html__('Item Spacing', 'advanced-elements-elementor'),
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
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .advantage-grid' => 'grid-gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'item_bg_color',
            [
                'label' => esc_html__('Item Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'transparent',
                'selectors' => [
                    '{{WRAPPER}} .advantage-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'item_border_radius',
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
                    '{{WRAPPER}} .advantage-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'item_padding',
            [
                'label' => esc_html__('Padding', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .advantage-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'item_box_shadow',
                'selector' => '{{WRAPPER}} .advantage-item',
            ]
        );

        $this->add_control(
            'item_alignment',
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
                    '{{WRAPPER}} .advantage-item' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Icon
        $this->start_controls_section(
            'section_style_icon',
            [
                'label' => esc_html__('Icon Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .advantage-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .advantage-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label' => esc_html__('Icon Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(87, 147, 206, 0.15)',
                'selectors' => [
                    '{{WRAPPER}} .advantage-icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_size',
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
                    'size' => 48,
                ],
                'selectors' => [
                    '{{WRAPPER}} .advantage-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .advantage-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_container_size',
            [
                'label' => esc_html__('Container Size', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 30,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .advantage-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_border_radius',
            [
                'label' => esc_html__('Border Radius', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => '12',
                    'right' => '12',
                    'bottom' => '12',
                    'left' => '12',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .advantage-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_border_color',
            [
                'label' => esc_html__('Border Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'transparent',
                'selectors' => [
                    '{{WRAPPER}} .advantage-icon' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_border_width',
            [
                'label' => esc_html__('Border Width', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .advantage-icon' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_spacing',
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
                    '{{WRAPPER}} .advantage-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Typography
        $this->start_controls_section(
            'section_style_item_typography',
            [
                'label' => esc_html__('Item Typography', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item_title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .advantage-item-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'item_title_typography',
                'selector' => '{{WRAPPER}} .advantage-item-title',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
                ],
            ]
        );

        $this->add_responsive_control(
            'item_title_spacing',
            [
                'label' => esc_html__('Title Bottom Spacing', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .advantage-item-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'item_description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .advantage-item-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'item_description_typography',
                'selector' => '{{WRAPPER}} .advantage-item-text',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
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
                'selector' => '{{WRAPPER}} .advantage-container',
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
                    '{{WRAPPER}} .advantage-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        // Add this after the Advantages section
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
                    '{{WRAPPER}} .course-advantages-end-line img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .course-advantages-end-line' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    }

    /**
     * Render widget output on the frontend
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="advantage-container">
            <div class="advantage-content">
                <div class="advantage-header animate-on-scroll" data-animation="animate__fadeInUp">
                    <?php if (!empty($settings['title'])) : ?>
                        <h2 class="advantage-title"><?php echo esc_html($settings['title']); ?></h2>
                    <?php endif; ?>
                    
                    <?php if (!empty($settings['description'])) : ?>
                        <p class="advantage-description"><?php echo esc_html($settings['description']); ?></p>
                    <?php endif; ?>
                </div>
                
                <?php if (!empty($settings['advantages'])) : ?>
                    <div class="advantage-grid">
                        <?php $i = 0.1; foreach ($settings['advantages'] as $index => $item) : ?>
                            <div class="advantage-item animate-on-scroll" data-animation="animate__fadeInUp" data-delay="<?= $i = $i + 0.2; ?>">
                                <?php if (!empty($item['advantage_icon']['value'])) : ?>
                                    <div class="advantage-icon">
                                        <?php \Elementor\Icons_Manager::render_icon($item['advantage_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($item['advantage_title'])) : ?>
                                    <h3 class="advantage-item-title"><?php echo esc_html($item['advantage_title']); ?></h3>
                                <?php endif; ?>
                                
                                <?php if (!empty($item['advantage_description'])) : ?>
                                    <p class="advantage-item-text"><?php echo esc_html($item['advantage_description']); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="course-advantages-end-line animate-on-scroll" data-animation="animate__fadeInUp">
                <?php if (!empty($settings['end_line_image']['url'])) : ?>
                    <img src="<?php echo esc_url($settings['end_line_image']['url']); ?>" alt="Course Advantages End Line">
                <?php else: ?>
                    <img src="<?php echo esc_url(plugins_url('assets/images/course-advantages-end-line.svg', dirname(__FILE__))); ?>" alt="Course Advantages End Line">
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}