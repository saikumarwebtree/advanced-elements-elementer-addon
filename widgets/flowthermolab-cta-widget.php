<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Flowthermolab CTA Widget
 */
class Flowthermolab_CTA_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'flowthermolab_cta';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Flowthermolab CTA', 'advanced-elements-elementor');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-call-to-action';
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['cta', 'call to action', 'flowthermolab'];
    }

    /**
     * Register widget controls
     */
    protected function _register_controls() {
        // Content Section
        $this->start_controls_section(
            'section_cta_content',
            [
                'label' => esc_html__('Content', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'cta_title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Ready to Transform Your Engineering Career?', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter CTA title', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'cta_description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Join Flowthermolab today and unlock a world of possibilities.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter CTA description', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'cta_button_text',
            [
                'label' => esc_html__('Button Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Contact Us', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter button text', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'cta_button_link',
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

        // Style Section
        $this->start_controls_section(
            'section_cta_style',
            [
                'label' => esc_html__('CTA Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'cta_background_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#1E3A8A',
                'selectors' => [
                    '{{WRAPPER}} .flowthermolab-cta-container' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cta_title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .flowthermolab-cta-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cta_description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#CBD5E1',
                'selectors' => [
                    '{{WRAPPER}} .flowthermolab-cta-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cta_button_style',
            [
                'label' => esc_html__('Button Style', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'cta_button_bg_color',
            [
                'label' => esc_html__('Button Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#3B82F6',
                'selectors' => [
                    '{{WRAPPER}} .flowthermolab-cta-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'cta_button_text_color',
            [
                'label' => esc_html__('Button Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .flowthermolab-cta-button' => 'color: {{VALUE}};',
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
        
        // Prepare link attributes
        $button_link = !empty($settings['cta_button_link']['url']) ? $settings['cta_button_link']['url'] : '#';
        $button_target = !empty($settings['cta_button_link']['is_external']) ? ' target="_blank"' : '';
        $button_nofollow = !empty($settings['cta_button_link']['nofollow']) ? ' rel="nofollow"' : '';
        ?>
        <div class="flowthermolab-cta-container animate-on-scroll" data-animation="animate__fadeInUp">
            <div class="flowthermolab-cta-content">
                <?php if (!empty($settings['cta_title'])) : ?>
                    <h2 class="flowthermolab-cta-title"><?php echo esc_html($settings['cta_title']); ?></h2>
                <?php endif; ?>
                
                <?php if (!empty($settings['cta_description'])) : ?>
                    <p class="flowthermolab-cta-description"><?php echo esc_html($settings['cta_description']); ?></p>
                <?php endif; ?>
                
                <?php if (!empty($settings['cta_button_text'])) : ?>
                    <a href="<?php echo esc_url($button_link); ?>" 
                       class="flowthermolab-cta-button"
                       <?php echo $button_target . $button_nofollow; ?>>
                        <?php echo esc_html($settings['cta_button_text']); ?> →
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}