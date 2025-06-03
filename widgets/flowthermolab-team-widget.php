<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Flowthermolab Team Widget
 */
class Flowthermolab_Team_Widget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'flowthermolab_team';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Flowthermolab Team', 'advanced-elements-elementor');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-person';
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['team', 'members', 'people', 'staff', 'experts', 'flotherm'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends() {
        return ['advanced-elements-widgets', 'advanced-elements-team'];
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
                'default' => esc_html__('Meet Our Team', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter subtitle', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('People Behind Flowthermolab', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter title', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Learn from industry leaders dedicated to making your learning journey impactful and career-focused!', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter description', 'advanced-elements-elementor'),
                'rows' => 3,
            ]
        );

        $this->end_controls_section();

        // Team Members Section
        $this->start_controls_section(
            'section_team_members',
            [
                'label' => esc_html__('Team Members', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'member_image',
            [
                'label' => esc_html__('Member Image', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'member_name',
            [
                'label' => esc_html__('Name', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Dr. Sandeep Mowal', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter member name', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'member_position',
            [
                'label' => esc_html__('Position', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('CEO', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter member position', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'member_link',
            [
                'label' => esc_html__('Profile Link', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'advanced-elements-elementor'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'team_members',
            [
                'label' => esc_html__('Team Members', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_name' => esc_html__('Dr. Sandeep Mowal', 'advanced-elements-elementor'),
                        'member_position' => esc_html__('CEO', 'advanced-elements-elementor'),
                    ],
                    [
                        'member_name' => esc_html__('Mr. Andy Powell', 'advanced-elements-elementor'),
                        'member_position' => esc_html__('CTO', 'advanced-elements-elementor'),
                    ],
                ],
                'title_field' => '{{{ member_name }}}',
            ]
        );

        $this->add_responsive_control(
            'members_columns',
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
                    '5' => '5',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-members-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
            ]
        );

        $this->end_controls_section();

        // Action Button Section
        $this->start_controls_section(
            'section_action_button',
            [
                'label' => esc_html__('Action Button', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('About Us', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter button text', 'advanced-elements-elementor'),
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

        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__('Button Icon', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Course Section
        $this->start_controls_section(
            'section_course',
            [
                'label' => esc_html__('Course Section', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_course_section',
            [
                'label' => esc_html__('Show Course Section', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'course_title',
            [
                'label' => esc_html__('Course Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Master Computational Engineering', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter course title', 'advanced-elements-elementor'),
                'condition' => [
                    'show_course_section' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'course_description',
            [
                'label' => esc_html__('Course Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('From beginner to advanced, our courses empower you with practical skills in CFD, FEA, and more.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter course description', 'advanced-elements-elementor'),
                'rows' => 3,
                'condition' => [
                    'show_course_section' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Testimonials Section
        $this->start_controls_section(
            'section_testimonials',
            [
                'label' => esc_html__('Testimonials', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'show_course_section' => 'yes',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'testimonial_image',
            [
                'label' => esc_html__('User Image', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'testimonial_name',
            [
                'label' => esc_html__('Name', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Savannah Nguyen', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter user name', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'testimonial_rating',
            [
                'label' => esc_html__('Rating', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '5',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ],
            ]
        );

        $repeater->add_control(
            'testimonial_content',
            [
                'label' => esc_html__('Testimonial Content', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('This course is perfect for beginners to C++. I particularly appreciated the section on pointers and pointer functions. These concepts had always been difficult for me to grasp, especially during my college C programming classes. However, the explanations in this course were incredibly clear and broke down these topics step by step, making them much easier to understand.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter testimonial content', 'advanced-elements-elementor'),
                'rows' => 5,
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label' => esc_html__('Testimonials', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'testimonial_name' => esc_html__('Savannah Nguyen', 'advanced-elements-elementor'),
                        'testimonial_rating' => '5',
                        'testimonial_content' => esc_html__('This course is perfect for beginners to C++. I particularly appreciated the section on pointers and pointer functions. These concepts had always been difficult for me to grasp, especially during my college C programming classes. However, the explanations in this course were incredibly clear and broke down these topics step by step, making them much easier to understand.', 'advanced-elements-elementor'),
                    ],
                ],
                'title_field' => '{{{ testimonial_name }}}',
            ]
        );

        $this->end_controls_section();

        // Partner Section
        $this->start_controls_section(
            'section_partner',
            [
                'label' => esc_html__('Partner Section', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_partner_section',
            [
                'label' => esc_html__('Show Partner Section', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'partner_logo',
            [
                'label' => esc_html__('Partner Logo', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'show_partner_section' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'partner_title',
            [
                'label' => esc_html__('Partner Title', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Supported By Innovate UK', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter partner title', 'advanced-elements-elementor'),
                'condition' => [
                    'show_partner_section' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'partner_description',
            [
                'label' => esc_html__('Partner Description', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Access scalable, high-performance computing resources anytime, anywhere computing resources anytime, anywhere.', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter partner description', 'advanced-elements-elementor'),
                'rows' => 3,
                'condition' => [
                    'show_partner_section' => 'yes',
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
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .team-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .team-subtitle',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .team-title' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .team-title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .team-description' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .team-description',
            ]
        );

        $this->add_responsive_control(
            'header_text_align',
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .team-header' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'header_margin',
            [
                'label' => esc_html__('Margin', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '50',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Team Members
        $this->start_controls_section(
            'section_style_members',
            [
                'label' => esc_html__('Team Members Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'member_bg_color',
            [
                'label' => esc_html__('Member Background', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#111827',
                'selectors' => [
                    '{{WRAPPER}} .member-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'member_padding',
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
                    '{{WRAPPER}} .member-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'member_border_radius',
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
                    '{{WRAPPER}} .member-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'member_spacing',
            [
                'label' => esc_html__('Spacing Between Members', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .team-members-grid' => 'grid-gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'member_box_shadow',
                'selector' => '{{WRAPPER}} .member-item',
            ]
        );

        $this->add_control(
            'member_image_border_radius',
            [
                'label' => esc_html__('Image Border Radius', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .member-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'member_image_spacing',
            [
                'label' => esc_html__('Image Bottom Spacing', 'advanced-elements-elementor'),
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
                    '{{WRAPPER}} .member-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'member_name_color',
            [
                'label' => esc_html__('Name Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .member-name' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'member_name_typography',
                'selector' => '{{WRAPPER}} .member-name',
            ]
        );

        $this->add_responsive_control(
            'member_name_spacing',
            [
                'label' => esc_html__('Name Spacing', 'advanced-elements-elementor'),
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
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .member-name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'member_position_color',
            [
                'label' => esc_html__('Position Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .member-position' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'member_position_typography',
                'selector' => '{{WRAPPER}} .member-position',
            ]
        );

        $this->add_responsive_control(
            'member_text_align',
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .member-info' => 'text-align: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        // Style Section - Button
        $this->start_controls_section(
            'section_style_button',
            [
                'label' => esc_html__('Button Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .team-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#4a89dc',
                'selectors' => [
                    '{{WRAPPER}} .team-button' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .team-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => esc_html__('Hover Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2d7bcb',
                'selectors' => [
                    '{{WRAPPER}} .team-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .team-button',
            ]
        );

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
                    '{{WRAPPER}} .team-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '12',
                    'right' => '24',
                    'bottom' => '12',
                    'left' => '24',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label' => esc_html__('Margin', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '30',
                    'right' => '0',
                    'bottom' => '50',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-button-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Course Section
        $this->start_controls_section(
            'section_style_course',
            [
                'label' => esc_html__('Course Section Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_course_section' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'course_title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .course-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'course_title_typography',
                'selector' => '{{WRAPPER}} .course-title',
            ]
        );

        $this->add_control(
            'course_description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .course-description' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'course_description_typography',
                'selector' => '{{WRAPPER}} .course-description',
            ]
        );

        $this->add_responsive_control(
            'course_text_align',
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .course-section' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'course_section_margin',
            [
                'label' => esc_html__('Section Margin', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '60',
                    'right' => '0',
                    'bottom' => '40',
                    'left' => '0',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .course-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Testimonials
        $this->start_controls_section(
            'section_style_testimonials',
            [
                'label' => esc_html__('Testimonials Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_course_section' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'testimonial_bg_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#3b82f6',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'testimonial_text_color',
            [
                'label' => esc_html__('Text Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-content, {{WRAPPER}} .testimonial-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'testimonial_star_color',
            [
                'label' => esc_html__('Star Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffc107',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-rating i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_content_typography',
                'selector' => '{{WRAPPER}} .testimonial-content',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_name_typography',
                'selector' => '{{WRAPPER}} .testimonial-name',
            ]
        );

        $this->add_control(
            'testimonial_border_radius',
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
                    '{{WRAPPER}} .testimonial-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonial_padding',
            [
                'label' => esc_html__('Padding', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => '25',
                    'right' => '25',
                    'bottom' => '25',
                    'left' => '25',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Partners
        $this->start_controls_section(
            'section_style_partner',
            [
                'label' => esc_html__('Partner Section Style', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_partner_section' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'partner_bg_color',
            [
                'label' => esc_html__('Background Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0f172a',
                'selectors' => [
                    '{{WRAPPER}} .partner-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'partner_title_color',
            [
                'label' => esc_html__('Title Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .partner-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'partner_title_typography',
                'selector' => '{{WRAPPER}} .partner-title',
            ]
        );

        $this->add_control(
            'partner_description_color',
            [
                'label' => esc_html__('Description Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .partner-description' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'partner_description_typography',
                'selector' => '{{WRAPPER}} .partner-description',
            ]
        );

        $this->add_responsive_control(
            'partner_padding',
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
                    '{{WRAPPER}} .partner-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'partner_border_radius',
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
                    '{{WRAPPER}} .partner-section' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .flowthermolab-team-container',
                'default' => [
                    'color' => '#0a0f1c',
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
                    'top' => '80',
                    'right' => '20',
                    'bottom' => '80',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .flowthermolab-team-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_max_width',
            [
                'label' => esc_html__('Content Max Width', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 500,
                        'max' => 2000,
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
                    '{{WRAPPER}} .flowthermolab-team-content' => 'max-width: {{SIZE}}{{UNIT}}; margin-left: auto; margin-right: auto;',
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
        
        // Button link
        $button_link = !empty($settings['button_link']['url']) ? $settings['button_link']['url'] : '#';
        $button_target = !empty($settings['button_link']['is_external']) ? ' target="_blank"' : '';
        $button_nofollow = !empty($settings['button_link']['nofollow']) ? ' rel="nofollow"' : '';
        ?>

        <div class="flowthermolab-team-container">
            <div class="flowthermolab-team-content">
                
                <div class="meet-our-team-left-bottom-line animate-on-scroll" data-animation="animate__fadeInLeft">
                    <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../assets/images/meet-our-team-left-bottom-line.svg'); ?>" alt="Decorative line" />
                </div>

                <div class="meet-our-team-right-top-line animate-on-scroll" data-animation="animate__fadeInRight">
                    <img src="<?php echo esc_url(plugin_dir_url(__FILE__) . '../assets/images/meet-our-team-right-top-line.svg'); ?>" alt="Decoration line" />
                </div>
                
                <?php if ($settings['show_partner_section'] === 'yes') : ?>
                    <!-- Partner Section -->
                    <div class="partner-section">
                        <div class="partner-card">
                            <?php if (!empty($settings['partner_logo']['url'])) : ?>
                                <div class="partner-card__logo animate-on-scroll" data-animation="animate__slideInLeft">
                                    <img src="<?php echo esc_url($settings['partner_logo']['url']); ?>" alt="<?php echo esc_attr($settings['partner_title']); ?>">
                                </div>
                            <?php endif; ?>
                            
                            <div class="partner-card__content animate-on-scroll" data-animation="animate__slideInRight">
                                <?php if (!empty($settings['partner_title'])) : ?>
                                    <h3 class="partner-title"><?php echo esc_html($settings['partner_title']); ?></h3>
                                <?php endif; ?>
                                
                                <?php if (!empty($settings['partner_description'])) : ?>
                                    <p class="partner-description"><?php echo esc_html($settings['partner_description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($settings['subtitle'])) : ?>
                <!-- Header Section -->
                <div class="team-header animate-on-scroll" data-animation="animate__fadeInUp">
                    <?php if (!empty($settings['subtitle'])) : ?>
                        <span class="team-subtitle"><?php echo esc_html($settings['subtitle']); ?></span>
                    <?php endif; ?>
                    
                    <?php if (!empty($settings['title'])) : ?>
                        <h2 class="team-title"><?php echo esc_html($settings['title']); ?></h2>
                    <?php endif; ?>
                    
                    <?php if (!empty($settings['description'])) : ?>
                        <p class="team-description"><?php echo esc_html($settings['description']); ?></p>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                
                <!-- Team Members Section -->
                <?php if (!empty($settings['team_members']) && $settings['team_members'][0]['member_name'] != '') : ?>
                    <div class="team-members-section animate-on-scroll" data-animation="animate__fadeInUp">
                        <div class="team-members-grid">
                            <?php foreach ($settings['team_members'] as $index => $member) : 
                                // Member link
                                $member_url = !empty($member['member_link']['url']) ? $member['member_link']['url'] : '';
                                $member_target = !empty($member['member_link']['is_external']) ? ' target="_blank"' : '';
                                $member_nofollow = !empty($member['member_link']['nofollow']) ? ' rel="nofollow"' : '';
                                
                                $member_tag = !empty($member_url) ? 'a' : 'div';
                                $member_attr = !empty($member_url) ? ' href="' . esc_url($member_url) . '"' . $member_target . $member_nofollow : '';
                            ?>
                                <<?php echo $member_tag . $member_attr; ?> class="member-item">
                                    <?php if (!empty($member['member_image']['url'])) : ?>
                                        <div class="member-image">
                                            <img src="<?php echo esc_url($member['member_image']['url']); ?>" alt="<?php echo esc_attr($member['member_name']); ?>">
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="member-info">
                                        <?php if (!empty($member['member_name'])) : ?>
                                            <h3 class="member-name"><?php echo esc_html($member['member_name']); ?></h3>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($member['member_position'])) : ?>
                                            <p class="member-position"><?php echo esc_html($member['member_position']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </<?php echo $member_tag; ?>>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Button Section -->
                <?php if ($settings['show_button'] === 'yes' && !empty($settings['button_text'])) : ?>
                    <div class="team-button-container animate-on-scroll" data-animation="animate__fadeInUp">
                        <a href="<?php echo esc_url($button_link); ?>" class="team-button" <?php echo $button_target . $button_nofollow; ?>>
                            <?php echo esc_html($settings['button_text']); ?>
                            <?php \Elementor\Icons_Manager::render_icon($settings['button_icon'], ['aria-hidden' => 'true']); ?>
                        </a>
                    </div>
                <?php endif; ?>
                
            </div>

            <section class="world-map-wrapper">
                <?php if ($settings['show_course_section'] === 'yes') : ?>
                        <!-- Course Section -->
                        <div class="course-section animate-on-scroll" data-animation="animate__fadeInUp">
                            <?php if (!empty($settings['course_title'])) : ?>
                                <h2 class="course-title"><?php echo esc_html($settings['course_title']); ?></h2>
                            <?php endif; ?>
                            
                            <?php if (!empty($settings['course_description'])) : ?>
                                <p class="course-description"><?php echo esc_html($settings['course_description']); ?></p>
                            <?php endif; ?>
                        </div>
                        
                    <?php endif; ?>

            <!-- Testimonials Section -->
            <?php if (!empty($settings['testimonials'])) : ?>
                        <div class="testimonials-section animate-on-scroll" data-animation="animate__fadeInUp">
                            <div class="testimonials-slider">
                                <?php foreach ($settings['testimonials'] as $index => $testimonial) : ?>
                                    <div>
                                        <div class="testimonial-item">
                                            <div class="testimonial-header">
                                                <?php if (!empty($testimonial['testimonial_image']['url'])) : ?>
                                                    <div class="testimonial-image">
                                                        <img src="<?php echo esc_url($testimonial['testimonial_image']['url']); ?>" alt="<?php echo esc_attr($testimonial['testimonial_name']); ?>">
                                                    </div>
                                                <?php endif; ?>
                                                
                                                <div class="testimonial-info">
                                                    <div class="testimonial-rating">
                                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                            <i class="fas fa-star<?php echo ($i <= $testimonial['testimonial_rating']) ? '' : '-o'; ?>"></i>
                                                        <?php endfor; ?>
                                                    </div>
                                                    
                                                    <?php if (!empty($testimonial['testimonial_name'])) : ?>
                                                        <h4 class="testimonial-name"><?php echo esc_html($testimonial['testimonial_name']); ?></h4>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <?php if (!empty($testimonial['testimonial_content'])) : ?>
                                                <div class="testimonial-content">
                                                    <p><?php echo esc_html($testimonial['testimonial_content']); ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
            </section>
        </div>
        <?php
    }
}