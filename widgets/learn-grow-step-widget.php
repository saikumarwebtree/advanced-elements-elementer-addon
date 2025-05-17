<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Learn Grow Achieve Section Widget
 */
class Learn_Grow_Step_Widget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'learn_grow_section';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Learn Grow Section', 'advanced-elements-elementor');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-section';
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['section', 'learn', 'grow', 'achieve', 'process', 'sine wave'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends() {
        return ['advanced-elements-widgets', 'advanced-elements-learn-grow'];
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
            'sine_wave_image',
            [
                'label' => esc_html__('Sine Wave Image', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url('assets/images/sine-wave.svg', dirname(__FILE__)),
                ],
            ]
        );

        // Step 1
        $this->add_control(
            'step1_heading',
            [
                'label' => esc_html__('Step 1', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'step1_title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Learn', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'step1_description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Access high-quality educational resources and expert insights', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'step1_icon',
            [
                'label' => esc_html__('Icon', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Step 2
        $this->add_control(
            'step2_heading',
            [
                'label' => esc_html__('Step 2', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'step2_title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Grow', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'step2_description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Develop your skills through interactive learning and practice', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'step2_icon',
            [
                'label' => esc_html__('Icon', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Step 3
        $this->add_control(
            'step3_heading',
            [
                'label' => esc_html__('Step 3', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'step3_title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Achieve', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'step3_description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Reach your goals and advance your career with proven methods', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'step3_icon',
            [
                'label' => esc_html__('Icon', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Section Style', 'advanced-elements-elementor'),
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
                    'right' => '0',
                    'bottom' => '100',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .learn-grow-achieve' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sine_wave_shadow',
            [
                'label' => esc_html__('Sine Wave Shadow', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'sine_wave_shadow_color',
            [
                'label' => esc_html__('Shadow Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.2)',
                'condition' => [
                    'sine_wave_shadow' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .learn-grow-achieve .sine-wave' => 'filter: drop-shadow(0px 40px 5px {{VALUE}});',
                ],
            ]
        );

        $this->end_controls_section();

        // Step Style
        $this->start_controls_section(
            'section_step_style',
            [
                'label' => esc_html__('Step Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'step_padding',
            [
                'label' => esc_html__('Step Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '80',
                    'right' => '90',
                    'bottom' => '80',
                    'left' => '90',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .learn-grow-achieve .step' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .learn-grow-achieve .step .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .learn-grow-achieve .step .title',
                'default' => [
                    'font_size' => '22px',
                    'font_weight' => 'bold',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .learn-grow-achieve .step .description p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .learn-grow-achieve .step .description p',
                'default' => [
                    'font_size' => '22px',
                ],
            ]
        );

        $this->add_control(
            'step_number_color_start',
            [
                'label' => esc_html__('Step Number Color Start', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(27, 50, 95, 1)',
            ]
        );

        $this->add_control(
            'step_number_color_middle',
            [
                'label' => esc_html__('Step Number Color Middle', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(27, 50, 95, 0.8)',
            ]
        );

        $this->add_control(
            'step_number_color_end',
            [
                'label' => esc_html__('Step Number Color End', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(27, 50, 95, 0)',
            ]
        );

        $this->add_control(
            'step_number_size',
            [
                'label' => esc_html__('Step Number Size', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 151,
                ],
                'selectors' => [
                    '{{WRAPPER}} .learn-grow-achieve .step .description span' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_background',
            [
                'label' => esc_html__('Icon Background', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .learn-grow-achieve .step .icon' => 'background-color: {{VALUE}};',
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
                        'min' => 40,
                        'max' => 150,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 80,
                ],
                'selectors' => [
                    '{{WRAPPER}} .learn-grow-achieve .step .icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_border_radius',
            [
                'label' => esc_html__('Icon Border Radius', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .learn-grow-achieve .step .icon' => 'border-radius: {{SIZE}}{{UNIT}};',
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
                'raw' => esc_html__('Configure responsive behavior for different screen sizes.', 'advanced-elements-elementor'),
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
        
        // Generate gradient for step numbers
        $step_number_gradient = 'background: linear-gradient(180deg, ' . 
            $settings['step_number_color_start'] . ', ' . 
            $settings['step_number_color_middle'] . ', ' . 
            $settings['step_number_color_end'] . '); ' .
            '-webkit-background-clip: text; ' .
            '-webkit-text-fill-color: transparent; ' .
            'background-clip: text; ' .
            'color: transparent;';
        
        // Check if sine wave shadow is enabled
        $sine_wave_classes = '';
        if ($settings['sine_wave_shadow'] !== 'yes') {
            $sine_wave_classes = 'no-shadow';
        }
        ?>
        <div class="learn-grow-achieve">
            <div class="sine-wave animate-on-scroll <?php echo esc_attr($sine_wave_classes); ?>" data-animation="animate__fadeIn" data-delay="0.2s">
                <img src="<?php echo esc_url($settings['sine_wave_image']['url']); ?>" alt="Sine Wave">
            </div>
            <div class="row" style="display: flex;">
                <!-- Step 1 -->
                <div class="col-lg-4">
                    <div class="step">
                        <h3 class="title animate-on-scroll" data-animation="animate__fadeIn" data-delay="0.2s"><?php echo esc_html($settings['step1_title']); ?></h3>
                        <div class="description mb-30">
                            <p class="animate-on-scroll" data-animation="animate__fadeIn" data-delay="0.2s"><?php echo esc_html($settings['step1_description']); ?></p>
                            <span class="step-no animate-on-scroll" data-animation="animate__fadeIn" data-delay="0.8s" style="<?php echo esc_attr($step_number_gradient); ?>">1</span>
                        </div>
                        <div class="icon animate-on-scroll" data-animation="animate__fadeInUp">
                            <img src="<?php echo esc_url($settings['step1_icon']['url']); ?>" alt="<?php echo esc_attr($settings['step1_title']); ?> Icon" />
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="col-lg-4">
                    <div class="step">
                        <div class="icon mb-30 animate-on-scroll" data-animation="animate__fadeInDown">
                            <img src="<?php echo esc_url($settings['step2_icon']['url']); ?>" alt="<?php echo esc_attr($settings['step2_title']); ?> Icon" />
                        </div>
                        <h3 class="title animate-on-scroll" data-animation="animate__fadeIn" data-delay="0.2s"><?php echo esc_html($settings['step2_title']); ?></h3>
                        <div class="description">
                            <p class="animate-on-scroll" data-animation="animate__fadeIn" data-delay="0.2s"><?php echo esc_html($settings['step2_description']); ?></p>
                            <span class="step-no animate-on-scroll" data-animation="animate__fadeIn" data-delay="0.8s" style="<?php echo esc_attr($step_number_gradient); ?>">2</span>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="col-lg-4">
                    <div class="step">
                        <h3 class="title animate-on-scroll" data-animation="animate__fadeIn" data-delay="0.2s"><?php echo esc_html($settings['step3_title']); ?></h3>
                        <div class="description mb-30">
                            <p class="animate-on-scroll" data-animation="animate__fadeIn" data-delay="0.2s"><?php echo esc_html($settings['step3_description']); ?></p>
                            <span class="step-no animate-on-scroll" data-animation="animate__fadeIn" data-delay="0.8s" style="<?php echo esc_attr($step_number_gradient); ?>">3</span>
                        </div>
                        <div class="icon animate-on-scroll" data-animation="animate__fadeInUp">
                            <img src="<?php echo esc_url($settings['step3_icon']['url']); ?>" alt="<?php echo esc_attr($settings['step3_title']); ?> Icon" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}