<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Interactive World Heat Map Widget
 */
class World_HeatMap_Widget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'interactive_world_heatmap';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Interactive World Heat Map', 'advanced-elements-elementor');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-globe';
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return ['world', 'map', 'heatmap', 'countries', 'global', 'statistics', 'interactive', 'data', 'visualization'];
    }

    /**
     * Get style depends
     */
    public function get_style_depends() {
        return ['advanced-elements-widgets', 'advanced-elements-interactive-heatmap'];
    }

    /**
     * Get script depends
     */
    public function get_script_depends() {
        return ['advanced-elements-interactive-heatmap-js'];
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
                'default' => esc_html__('Our Global Presence', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter title', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Discover our worldwide reach and impact across different regions', 'advanced-elements-elementor'),
                'placeholder' => esc_html__('Enter subtitle', 'advanced-elements-elementor'),
                'rows' => 2,
            ]
        );

        $this->end_controls_section();

        // Content Section - Map Settings
        $this->start_controls_section(
            'section_map_settings',
            [
                'label' => esc_html__('Map Settings', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'color_scheme',
            [
                'label' => esc_html__('Color Scheme', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'blue',
                'options' => [
                    'blue' => esc_html__('Blue', 'advanced-elements-elementor'),
                    'green' => esc_html__('Green', 'advanced-elements-elementor'),
                    'red' => esc_html__('Red', 'advanced-elements-elementor'),
                    'purple' => esc_html__('Purple', 'advanced-elements-elementor'),
                    'orange' => esc_html__('Orange', 'advanced-elements-elementor'),
                    'custom' => esc_html__('Custom', 'advanced-elements-elementor'),
                ],
            ]
        );

        $this->add_control(
            'show_tooltip',
            [
                'label' => esc_html__('Show Tooltips', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_legend',
            [
                'label' => esc_html__('Show Legend', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_statistics',
            [
                'label' => esc_html__('Show Statistics', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'animation_on_load',
            [
                'label' => esc_html__('Animation on Load', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'advanced-elements-elementor'),
                'label_off' => esc_html__('No', 'advanced-elements-elementor'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'animation_speed',
            [
                'label' => esc_html__('Animation Speed (ms)', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 500,
                        'max' => 3000,
                        'step' => 100,
                    ],
                ],
                'default' => [
                    'size' => 1500,
                ],
                'condition' => [
                    'animation_on_load' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Content Section - Countries Data
        $this->start_controls_section(
            'section_countries_data',
            [
                'label' => esc_html__('Countries Data', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'country_code',
            [
                'label' => esc_html__('Country Code', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'US',
                'options' => $this->get_countries_list(),
                'description' => esc_html__('Select country from the list', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'value',
            [
                'label' => esc_html__('Value', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 100,
                'min' => 0,
                'max' => 1000,
                'description' => esc_html__('Numeric value for heat map intensity', 'advanced-elements-elementor'),
            ]
        );

        $repeater->add_control(
            'intensity_level',
            [
                'label' => esc_html__('Intensity Level', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'high',
                'options' => [
                    'low' => esc_html__('Low', 'advanced-elements-elementor'),
                    'medium' => esc_html__('Medium', 'advanced-elements-elementor'),
                    'high' => esc_html__('High', 'advanced-elements-elementor'),
                    'maximum' => esc_html__('Maximum', 'advanced-elements-elementor'),
                ],
            ]
        );

        $repeater->add_control(
            'custom_info',
            [
                'label' => esc_html__('Custom Information', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '',
                'description' => esc_html__('Additional info to show in tooltip', 'advanced-elements-elementor'),
                'rows' => 2,
            ]
        );

        $this->add_control(
            'countries_list',
            [
                'label' => esc_html__('Countries', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => $this->get_default_countries(),
                'title_field' => '{{{ country_code }}} - Level: {{{ intensity_level }}}',
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
                    '{{WRAPPER}} .heatmap-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .heatmap-title',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => [
                    '{{WRAPPER}} .heatmap-subtitle' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .heatmap-subtitle',
            ]
        );

        $this->end_controls_section();

        // Style Section - Map Colors
        $this->start_controls_section(
            'section_style_colors',
            [
                'label' => esc_html__('Map Colors', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'map_background',
            [
                'label' => esc_html__('Map Background', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2c3e50',
                'selectors' => [
                    '{{WRAPPER}} .world-heatmap-svg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'default_country_color',
            [
                'label' => esc_html__('Default Country Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#34495e',
                'description' => esc_html__('Color for countries not in your data', 'advanced-elements-elementor'),
            ]
        );

        $this->add_control(
            'low_intensity_color',
            [
                'label' => esc_html__('Low Intensity Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#74b9ff',
                'condition' => [
                    'color_scheme' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'medium_intensity_color',
            [
                'label' => esc_html__('Medium Intensity Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0984e3',
                'condition' => [
                    'color_scheme' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'high_intensity_color',
            [
                'label' => esc_html__('High Intensity Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2d3436',
                'condition' => [
                    'color_scheme' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'maximum_intensity_color',
            [
                'label' => esc_html__('Maximum Intensity Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#636e72',
                'condition' => [
                    'color_scheme' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'country_border_color',
            [
                'label' => esc_html__('Country Border Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2c3e50',
            ]
        );

        $this->add_control(
            'country_border_width',
            [
                'label' => esc_html__('Border Width', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0.5,
                        'max' => 3,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'size' => 0.8,
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Interactions
        $this->start_controls_section(
            'section_style_interactions',
            [
                'label' => esc_html__('Interactions', 'advanced-elements-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'hover_color',
            [
                'label' => esc_html__('Hover Color', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f39c12',
            ]
        );

        $this->add_control(
            'hover_effect',
            [
                'label' => esc_html__('Hover Effect', 'advanced-elements-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'glow',
                'options' => [
                    'none' => esc_html__('None', 'advanced-elements-elementor'),
                    'glow' => esc_html__('Glow', 'advanced-elements-elementor'),
                    'scale' => esc_html__('Scale', 'advanced-elements-elementor'),
                    'both' => esc_html__('Glow & Scale', 'advanced-elements-elementor'),
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
                'selector' => '{{WRAPPER}} .interactive-heatmap-widget',
                'default' => [
                    'color' => '#1a1a1a',
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
                    'top' => '60',
                    'right' => '20',
                    'bottom' => '60',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .interactive-heatmap-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Get countries list for dropdown
     */
    private function get_countries_list() {
        return [
            // Major Markets
            'US' => 'United States',
            'CN' => 'China', 
            'IN' => 'India',
            'GB' => 'United Kingdom',
            'DE' => 'Germany',
            'JP' => 'Japan',
            'FR' => 'France',
            'BR' => 'Brazil',
            'IT' => 'Italy',
            'CA' => 'Canada',
            'AU' => 'Australia',
            'KR' => 'South Korea',
            'ES' => 'Spain',
            'NL' => 'Netherlands',
            'SA' => 'Saudi Arabia',
            
            // Southeast Asia & Asia Pacific
            'SG' => 'Singapore',
            'MY' => 'Malaysia',
            'TH' => 'Thailand',
            'ID' => 'Indonesia',
            'PH' => 'Philippines',
            'VN' => 'Vietnam',
            'TW' => 'Taiwan',
            'HK' => 'Hong Kong',
            'LK' => 'Sri Lanka',
            'BD' => 'Bangladesh',
            'PK' => 'Pakistan',
            'NP' => 'Nepal',
            
            // Middle East & Gulf
            'AE' => 'United Arab Emirates',
            'QA' => 'Qatar',
            'KW' => 'Kuwait',
            'LB' => 'Lebanon',
            'JO' => 'Jordan',
            'IR' => 'Iran',
            'PS' => 'Palestinian Territory',
            
            // Europe
            'SK' => 'Slovakia',
            'TR' => 'Turkey',
            'GR' => 'Greece',
            'AT' => 'Austria',
            'PT' => 'Portugal',
            'PL' => 'Poland',
            'FI' => 'Finland',
            'SE' => 'Sweden',
            'CZ' => 'Czech Republic',
            'NO' => 'Norway',
            'BE' => 'Belgium',
            'DK' => 'Denmark',
            'IE' => 'Ireland',
            'HU' => 'Hungary',
            'RS' => 'Serbia',
            'UA' => 'Ukraine',
            
            // Africa
            'ZA' => 'South Africa',
            'EG' => 'Egypt',
            'NG' => 'Nigeria',
            'KE' => 'Kenya',
            'MA' => 'Morocco',
            'ZM' => 'Zambia',
            'UG' => 'Uganda',
            'GH' => 'Ghana',
            'CM' => 'Cameroon',
            'SN' => 'Senegal',
            'DZ' => 'Algeria',
            
            // Americas
            'MX' => 'Mexico',
            'AR' => 'Argentina',
            'CL' => 'Chile',
            'CO' => 'Colombia',
            'PE' => 'Peru',
            'EC' => 'Ecuador',
            
            // Central Asia
            'UZ' => 'Uzbekistan',
            
            // Additional countries for completeness
            'AF' => 'Afghanistan', 'AL' => 'Albania', 'AM' => 'Armenia', 'AZ' => 'Azerbaijan',
            'BG' => 'Bulgaria', 'BY' => 'Belarus', 'CH' => 'Switzerland', 'CR' => 'Costa Rica',
            'HR' => 'Croatia', 'EE' => 'Estonia', 'GE' => 'Georgia', 'IS' => 'Iceland',
            'IQ' => 'Iraq', 'IL' => 'Israel', 'KZ' => 'Kazakhstan', 'LV' => 'Latvia',
            'LT' => 'Lithuania', 'LU' => 'Luxembourg', 'MD' => 'Moldova', 'MN' => 'Mongolia',
            'NZ' => 'New Zealand', 'RO' => 'Romania', 'RU' => 'Russia', 'SI' => 'Slovenia',
            'UY' => 'Uruguay', 'VE' => 'Venezuela', 'ZW' => 'Zimbabwe'
        ];
    }

    /**
     * Get default countries data
     */
    private function get_default_countries() {
        return [
            // Major markets - Maximum intensity
            ['country_code' => 'US', 'value' => 950, 'intensity_level' => 'maximum', 'custom_info' => 'Primary market with extensive operations'],
            ['country_code' => 'CN', 'value' => 920, 'intensity_level' => 'maximum', 'custom_info' => 'Largest Asian market with growing presence'],
            ['country_code' => 'IN', 'value' => 880, 'intensity_level' => 'maximum', 'custom_info' => 'Major market with rapid expansion'],
            ['country_code' => 'GB', 'value' => 850, 'intensity_level' => 'maximum', 'custom_info' => 'European headquarters and key market'],
            ['country_code' => 'DE', 'value' => 820, 'intensity_level' => 'maximum', 'custom_info' => 'Central European operations hub'],
            
            // High intensity markets
            ['country_code' => 'BR', 'value' => 780, 'intensity_level' => 'high', 'custom_info' => 'Major South American hub'],
            ['country_code' => 'JP', 'value' => 760, 'intensity_level' => 'high', 'custom_info' => 'Technology innovation center'],
            ['country_code' => 'FR', 'value' => 740, 'intensity_level' => 'high', 'custom_info' => 'Key European market'],
            ['country_code' => 'IT', 'value' => 720, 'intensity_level' => 'high', 'custom_info' => 'Important European presence'],
            ['country_code' => 'CA', 'value' => 700, 'intensity_level' => 'high', 'custom_info' => 'Strong North American presence'],
            ['country_code' => 'AU', 'value' => 680, 'intensity_level' => 'high', 'custom_info' => 'Pacific region hub'],
            ['country_code' => 'KR', 'value' => 660, 'intensity_level' => 'high', 'custom_info' => 'South Korea - Technology powerhouse'],
            ['country_code' => 'ES', 'value' => 640, 'intensity_level' => 'high', 'custom_info' => 'Iberian Peninsula operations'],
            ['country_code' => 'NL', 'value' => 620, 'intensity_level' => 'high', 'custom_info' => 'Netherlands - European logistics hub'],
            ['country_code' => 'SA', 'value' => 600, 'intensity_level' => 'high', 'custom_info' => 'Saudi Arabia - Gulf region leader'],
            
            // Medium intensity markets
            ['country_code' => 'SG', 'value' => 580, 'intensity_level' => 'medium', 'custom_info' => 'Singapore - Southeast Asian hub'],
            ['country_code' => 'AE', 'value' => 560, 'intensity_level' => 'medium', 'custom_info' => 'UAE - Middle East operations center'],
            ['country_code' => 'TR', 'value' => 540, 'intensity_level' => 'medium', 'custom_info' => 'Turkey - Bridge between Europe and Asia'],
            ['country_code' => 'MX', 'value' => 520, 'intensity_level' => 'medium', 'custom_info' => 'Mexico - Latin American operations'],
            ['country_code' => 'ID', 'value' => 500, 'intensity_level' => 'medium', 'custom_info' => 'Indonesia - Southeast Asian market'],
            ['country_code' => 'TH', 'value' => 480, 'intensity_level' => 'medium', 'custom_info' => 'Thailand - Manufacturing hub'],
            ['country_code' => 'MY', 'value' => 460, 'intensity_level' => 'medium', 'custom_info' => 'Malaysia - Southeast Asian presence'],
            ['country_code' => 'PH', 'value' => 440, 'intensity_level' => 'medium', 'custom_info' => 'Philippines - Growing market'],
            ['country_code' => 'VN', 'value' => 420, 'intensity_level' => 'medium', 'custom_info' => 'Vietnam - Emerging Asian market'],
            ['country_code' => 'EG', 'value' => 400, 'intensity_level' => 'medium', 'custom_info' => 'Egypt - North African hub'],
            ['country_code' => 'ZA', 'value' => 380, 'intensity_level' => 'medium', 'custom_info' => 'South Africa - African regional hub'],
            ['country_code' => 'PK', 'value' => 360, 'intensity_level' => 'medium', 'custom_info' => 'Pakistan - South Asian market'],
            ['country_code' => 'NG', 'value' => 340, 'intensity_level' => 'medium', 'custom_info' => 'Nigeria - West African operations'],
            ['country_code' => 'AR', 'value' => 320, 'intensity_level' => 'medium', 'custom_info' => 'Argentina - South American market'],
            ['country_code' => 'CL', 'value' => 300, 'intensity_level' => 'medium', 'custom_info' => 'Chile - Pacific coast operations'],
            ['country_code' => 'CO', 'value' => 280, 'intensity_level' => 'medium', 'custom_info' => 'Colombia - South American expansion'],
            
            // Low intensity markets
            ['country_code' => 'SK', 'value' => 260, 'intensity_level' => 'low', 'custom_info' => 'Slovakia - Central European presence'],
            ['country_code' => 'LK', 'value' => 240, 'intensity_level' => 'low', 'custom_info' => 'Sri Lanka - South Asian operations'],
            ['country_code' => 'GR', 'value' => 220, 'intensity_level' => 'low', 'custom_info' => 'Greece - Mediterranean market'],
            ['country_code' => 'KE', 'value' => 200, 'intensity_level' => 'low', 'custom_info' => 'Kenya - East African operations'],
            ['country_code' => 'PE', 'value' => 180, 'intensity_level' => 'low', 'custom_info' => 'Peru - South American expansion'],
            ['country_code' => 'AT', 'value' => 160, 'intensity_level' => 'low', 'custom_info' => 'Austria - Central European market'],
            ['country_code' => 'LB', 'value' => 140, 'intensity_level' => 'low', 'custom_info' => 'Lebanon - Middle East operations'],
            ['country_code' => 'ZM', 'value' => 120, 'intensity_level' => 'low', 'custom_info' => 'Zambia - Southern African market'],
            ['country_code' => 'MA', 'value' => 100, 'intensity_level' => 'low', 'custom_info' => 'Morocco - North African presence'],
            ['country_code' => 'RS', 'value' => 80, 'intensity_level' => 'low', 'custom_info' => 'Serbia - Balkan operations'],
            ['country_code' => 'NP', 'value' => 60, 'intensity_level' => 'low', 'custom_info' => 'Nepal - Himalayan region'],
            ['country_code' => 'QA', 'value' => 40, 'intensity_level' => 'low', 'custom_info' => 'Qatar - Gulf state presence'],
            ['country_code' => 'UA', 'value' => 20, 'intensity_level' => 'low', 'custom_info' => 'Ukraine - Eastern European market'],
            ['country_code' => 'JO', 'value' => 180, 'intensity_level' => 'low', 'custom_info' => 'Jordan - Middle Eastern operations'],
            ['country_code' => 'DK', 'value' => 160, 'intensity_level' => 'low', 'custom_info' => 'Denmark - Nordic market'],
            ['country_code' => 'IE', 'value' => 140, 'intensity_level' => 'low', 'custom_info' => 'Ireland - European tech hub'],
            ['country_code' => 'UG', 'value' => 120, 'intensity_level' => 'low', 'custom_info' => 'Uganda - East African expansion'],
            ['country_code' => 'BD', 'value' => 200, 'intensity_level' => 'low', 'custom_info' => 'Bangladesh - South Asian growth market'],
            ['country_code' => 'PT', 'value' => 180, 'intensity_level' => 'low', 'custom_info' => 'Portugal - Iberian operations'],
            ['country_code' => 'IR', 'value' => 160, 'intensity_level' => 'low', 'custom_info' => 'Iran - Persian Gulf region'],
            ['country_code' => 'DZ', 'value' => 140, 'intensity_level' => 'low', 'custom_info' => 'Algeria - North African market'],
            ['country_code' => 'PL', 'value' => 220, 'intensity_level' => 'low', 'custom_info' => 'Poland - Central European market'],
            ['country_code' => 'FI', 'value' => 200, 'intensity_level' => 'low', 'custom_info' => 'Finland - Nordic technology leader'],
            ['country_code' => 'SE', 'value' => 240, 'intensity_level' => 'low', 'custom_info' => 'Sweden - Scandinavian hub'],
            ['country_code' => 'CZ', 'value' => 180, 'intensity_level' => 'low', 'custom_info' => 'Czech Republic - Central European presence'],
            ['country_code' => 'NO', 'value' => 220, 'intensity_level' => 'low', 'custom_info' => 'Norway - Nordic energy market'],
            ['country_code' => 'BE', 'value' => 200, 'intensity_level' => 'low', 'custom_info' => 'Belgium - European Union hub'],
            ['country_code' => 'UZ', 'value' => 100, 'intensity_level' => 'low', 'custom_info' => 'Uzbekistan - Central Asian market'],
            ['country_code' => 'HK', 'value' => 320, 'intensity_level' => 'medium', 'custom_info' => 'Hong Kong - Asian financial hub'],
            ['country_code' => 'HU', 'value' => 160, 'intensity_level' => 'low', 'custom_info' => 'Hungary - Central European operations'],
            ['country_code' => 'EC', 'value' => 140, 'intensity_level' => 'low', 'custom_info' => 'Ecuador - Pacific South America'],
            ['country_code' => 'KW', 'value' => 180, 'intensity_level' => 'low', 'custom_info' => 'Kuwait - Gulf state operations'],
            ['country_code' => 'TW', 'value' => 280, 'intensity_level' => 'medium', 'custom_info' => 'Taiwan - Technology manufacturing hub'],
            ['country_code' => 'GH', 'value' => 120, 'intensity_level' => 'low', 'custom_info' => 'Ghana - West African growth market'],
            ['country_code' => 'PS', 'value' => 80, 'intensity_level' => 'low', 'custom_info' => 'Palestine - Middle Eastern territory'],
            ['country_code' => 'CM', 'value' => 100, 'intensity_level' => 'low', 'custom_info' => 'Cameroon - Central African operations'],
            ['country_code' => 'SN', 'value' => 120, 'intensity_level' => 'low', 'custom_info' => 'Senegal - West African presence'],
        ];
    }

    /**
     * Get color scheme colors
     */
    private function get_color_scheme_colors($scheme) {
        $schemes = [
            'blue' => ['#e3f2fd', '#bbdefb', '#2196f3', '#0d47a1'],
            'green' => ['#e8f5e8', '#a5d6a7', '#4caf50', '#1b5e20'],
            'red' => ['#ffebee', '#ffcdd2', '#f44336', '#b71c1c'],
            'purple' => ['#f3e5f5', '#ce93d8', '#9c27b0', '#4a148c'],
            'orange' => ['#fff3e0', '#ffcc02', '#ff9800', '#e65100'],
        ];
        
        return $schemes[$scheme] ?? $schemes['blue'];
    }

    /**
     * Render widget output on the frontend
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $widget_id = $this->get_id();
        
        // Prepare countries data
        $countries_data = [];
        if (!empty($settings['countries_list'])) {
            foreach ($settings['countries_list'] as $country) {
                if (!empty($country['country_code'])) {
                    $countries_data[$country['country_code']] = [
                        'value' => $country['value'],
                        'intensity' => $country['intensity_level'],
                        'info' => $country['custom_info'],
                        'name' => $this->get_countries_list()[$country['country_code']] ?? $country['country_code']
                    ];
                }
            }
        }
        
        // Get color scheme
        if ($settings['color_scheme'] === 'custom') {
            $colors = [
                $settings['low_intensity_color'],
                $settings['medium_intensity_color'],
                $settings['high_intensity_color'],
                $settings['maximum_intensity_color']
            ];
        } else {
            $colors = $this->get_color_scheme_colors($settings['color_scheme']);
        }
        
        // Widget settings for JavaScript
        $widget_settings = [
            'countries' => $countries_data,
            'colors' => $colors,
            'defaultColor' => $settings['default_country_color'],
            'hoverColor' => $settings['hover_color'],
            'borderColor' => $settings['country_border_color'],
            'borderWidth' => $settings['country_border_width']['size'] ?? 0.8,
            'hoverEffect' => $settings['hover_effect'],
            'showTooltip' => $settings['show_tooltip'] === 'yes',
            'animationOnLoad' => $settings['animation_on_load'] === 'yes',
            'animationSpeed' => $settings['animation_speed']['size'] ?? 1500,
        ];
        
        $total_countries = count($countries_data);
        ?>

        <div class="interactive-heatmap-widget" 
             data-settings='<?php echo wp_json_encode($widget_settings); ?>'
             data-widget-id="<?php echo esc_attr($widget_id); ?>">
            
            <!-- Header Section -->
            <?php if (!empty($settings['title']) || !empty($settings['subtitle'])) : ?>
                <div class="heatmap-header">
                    <?php if (!empty($settings['title'])) : ?>
                        <h2 class="heatmap-title"><?php echo esc_html($settings['title']); ?></h2>
                    <?php endif; ?>
                    
                    <?php if (!empty($settings['subtitle'])) : ?>
                        <p class="heatmap-subtitle"><?php echo esc_html($settings['subtitle']); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <!-- Statistics Section -->
            <?php if ($settings['show_statistics'] === 'yes' && $total_countries > 0) : ?>
                <div class="heatmap-statistics">
                    <div class="stat-item">
                        <span class="stat-number"><?php echo esc_html($total_countries); ?></span>
                        <span class="stat-label"><?php echo esc_html__('Countries', 'advanced-elements-elementor'); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?php echo esc_html(array_sum(array_column($countries_data, 'value'))); ?></span>
                        <span class="stat-label"><?php echo esc_html__('Total Value', 'advanced-elements-elementor'); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?php echo esc_html(count(array_filter($countries_data, function($c) { return $c['intensity'] === 'maximum'; }))); ?></span>
                        <span class="stat-label"><?php echo esc_html__('High Impact', 'advanced-elements-elementor'); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- Legend -->
            <?php if ($settings['show_legend'] === 'yes') : ?>
                <div class="heatmap-legend">
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: <?php echo esc_attr($colors[0]); ?>;"></span>
                        <span><?php echo esc_html__('Low', 'advanced-elements-elementor'); ?></span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: <?php echo esc_attr($colors[1]); ?>;"></span>
                        <span><?php echo esc_html__('Medium', 'advanced-elements-elementor'); ?></span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: <?php echo esc_attr($colors[2]); ?>;"></span>
                        <span><?php echo esc_html__('High', 'advanced-elements-elementor'); ?></span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background-color: <?php echo esc_attr($colors[3]); ?>;"></span>
                        <span><?php echo esc_html__('Maximum', 'advanced-elements-elementor'); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- World Map Container -->
            <div class="world-heatmap-container">
                <svg class="world-heatmap-svg" id="heatmap-<?php echo esc_attr($widget_id); ?>" 
                     viewBox="0 0 1008 651" xmlns="http://www.w3.org/2000/svg">
                    <!-- Include the complete SVG world map from your document -->
                    <!-- This is a simplified version - you would include the full SVG paths -->
                    <g class="countries">
                        <!-- Sample countries - you would include all country paths from the provided SVG -->
                        <path id="US" class="country" data-country="US" fill="<?php echo esc_attr($settings['default_country_color']); ?>" stroke="<?php echo esc_attr($settings['country_border_color']); ?>" stroke-width="<?php echo esc_attr($settings['country_border_width']['size'] ?? 0.8); ?>" d="M285.179,314.235l-1.245,-1.187l-1.88,0.7l-0.932,-1.083l-2.139,3.097l-0.855,3.148l-0.995,1.82l-1.191,0.616l-0.897,0.2l-0.281,0.978l-5.167,0.003l-4.26,0.027l-1.265,0.726l-2.87,2.73l0.287,0.544l0.166,1.506l-2.103,1.27l-2.297,-0.318l-2.204,-0.143l-1.328,0.439l0.249,1.15l0,0.002l0.055,0.373l-2.416,2.265l-2.115,1.089l-1.443,0.506l-1.661,1.035l-2.03,0.496l-1.398,-0.191l-1.729,-0.772l0.961,-1.449l0.617,-1.321l1.318,-2.091z"/>
                        
                        <path id="CN" class="country" data-country="CN" fill="<?php echo esc_attr($settings['default_country_color']); ?>" stroke="<?php echo esc_attr($settings['country_border_color']); ?>" stroke-width="<?php echo esc_attr($settings['country_border_width']['size'] ?? 0.8); ?>" d="M784.628,410.405l-2.423,1.412l-2.299,-0.91l-0.081,-2.535l1.382,-1.341l3.063,-0.831l1.612,0.071l0.627,1.131l-1.232,1.301L784.628,410.405zM833.186,302.885l4.88,1.379l3.321,3.035l1.135,3.945l4.261,0.005l2.431,-1.647l4.634,-1.239l-1.474,3.761l-1.089,1.512l-0.961,4.462l-1.886,3.888l-3.402,-0.703l-2.407,1.4l0.739,3.357l-0.404,4.553l-1.432,0.103l0.017,1.929l-1.811,-2.244l-1.114,2.13l-4.33,1.625l0.438,1.975l-2.424,-0.136l-1.331,-1.172l-1.927,2.644l-3.09,1.984l-2.283,2.347l-3.92,1.057l-2.064,1.689l-3.02,0.981l1.49,-1.668l-0.587,-1.411l2.221,-2.454l-1.481,-1.93l-2.444,1.302l-3.165,2.544l-1.728,2.34l-2.75,0.173l-1.431,1.676l1.479,2.409l2.294,0.582l0.095,1.583l2.218,1.025l3.143,-2.513l2.489,1.374l1.813,0.093l0.455,1.836l-3.97,0.974l-1.311,1.872l-2.727,1.728l-1.439,2.393l3.019,1.864l1.102,3.307l1.706,3.046l1.904,2.529l-0.046,2.426l-1.76,0.887l0.671,1.725l1.65,1l-0.431,2.609l-0.712,2.518l-1.567,0.284l-2.047,3.407l-2.271,4.086l-2.604,3.676l-3.855,2.818l-3.9,2.553l-3.159,0.347l-1.714,1.34l-0.97,-0.979l-1.586,1.498l-3.919,1.504l-2.967,0.459l-0.957,3.151l-1.554,0.174l-0.735,-2.162l0.664,-1.157l-3.762,-0.959l-1.325,0.488l-2.823,-0.778l-1.335,-1.222l0.443,-1.738l-2.563,-0.553l-1.352,-1.138l-2.39,1.615l-2.726,0.349l-2.236,-0.016l-1.505,0.737l-1.453,0.442l0.424,3.433l-1.495,-0.082l-0.252,-0.703l-0.085,-1.24l-2.057,0.874l-1.214,-0.552l-2.082,-1.128l0.816,-2.507l-1.775,-0.587l-0.669,-2.801l-2.96,0.506l0.337,-3.635l2.655,-2.58l0.113,-2.566l-0.083,-2.398l-1.224,-0.75l-0.937,-1.86l-1.641,0.235l-3.023,-0.474l0.947,-1.334l-1.314,-1.986l-1.999,1.346l-2.352,-0.785l-3.232,2.03l-2.552,2.355l-2.262,0.395l-1.228,-0.849l-1.48,-0.077l-2.004,-0.732l-1.515,0.803l-1.854,2.341l-0.235,-2.481l-1.71,0.665l-3.27,-0.309l-3.172,-0.725l-2.275,-1.393l-2.179,-0.627l-0.941,-1.533l-1.575,-0.459l-2.831,-2.094l-2.248,-0.993l-1.162,0.773l-3.896,-2.265l-2.755,-2.065l-0.786,-3.629l2.012,0.445l0.092,-1.694l-1.115,-1.708l0.284,-2.744l-3.014,-3.989l-4.611,-1.39l-0.83,-2.661l-2.071,-1.627l-0.499,-1.007l-0.421,-2.012l0.098,-1.381l-1.703,-0.812l-0.921,0.359l-0.711,-3.324l0.798,-0.829l-0.387,-0.85l2.677,-1.726l1.938,-0.718l2.968,0.492l1.061,-2.354l3.597,-0.44l0.999,-1.478l4.419,-2.031l0.394,-0.853l-0.224,-2.165l1.924,-0.995l-2.524,-6.754l5.555,-1.582l1.436,-0.886l2.022,-7.262l5.563,1.353l1.56,-1.86l0.134,-4.186l2.329,-0.395l2.134,-2.831l1.098,-0.352l0.736,2.97l2.356,2.23l3.999,1.565l1.935,3.319l-1.079,4.728l1.009,1.729l3.332,0.678l3.776,0.552l3.388,2.448l1.732,0.433l1.277,3.568l1.646,2.269l3.091,-0.088l5.787,0.852l3.729,-0.528l2.768,0.565l4.148,2.291l3.393,-0.003l1.241,1.164l3.265,-2.014l4.529,-1.312l4.202,-0.144l3.276,-1.337l2.012,-2.051l1.963,-1.297l-0.454,-1.28l-0.896,-1.499l1.473,-2.538l1.577,0.358l2.882,0.8l2.794,-2.101l4.275,-1.546l2.055,-2.662l1.974,-1.156l4.072,-0.541l2.213,0.459l0.307,-1.453l-2.541,-2.887l-2.25,-1.333l-2.155,1.538l-2.766,-0.647l-1.587,0.528l-0.723,-1.706l1.981,-4.228l1.365,-3.247l3.365,1.632l3.952,-2.739l-0.026,-1.929l2.531,-4.725l1.56,-1.45l-0.035,-2.522l-1.538,-1.095l2.315,-2.313l3.484,-0.845l3.718,-0.127l4.196,1.394l2.462,1.711l1.733,4.611l1.051,1.937l0.977,2.731L833.186,302.885z"/>
                        
                        <path id="BR" class="country" data-country="BR" fill="<?php echo esc_attr($settings['default_country_color']); ?>" stroke="<?php echo esc_attr($settings['country_border_color']); ?>" stroke-width="<?php echo esc_attr($settings['country_border_width']['size'] ?? 0.8); ?>" d="M313.681,551.79L317.421,547.418L320.586,544.34L322.469,543.058L324.83,541.33L324.887,538.84L323.48,537.052L322.092,537.645L322.642,535.862L323.022,534.045L323.023,532.363L322.015,531.81L320.963,532.303L319.917,532.167L319.59,530.995L319.329,528.217L318.804,527.315L316.91,526.5L315.766,527.09L312.806,526.512L312.992,522.447L312.163,520.793L313.04,520.18L312.77,518.493L313.538,517.2L314.036,514.884L313.374,513.063L311.842,512.244L311.542,511.093L311.953,509.414L306.578,509.294L305.5,505.924L306.317,505.876L306.281,504.633L305.734,503.793L305.611,502.132L303.982,501.282L302.218,501.311L301.058,500.479L299.163,499.912L298.059,498.845L294.919,498.374L291.875,495.822L292.1,493.918L291.755,492.828L292.054,490.708L288.385,491.186L286.908,492.249L284.456,493.397L283.831,494.255L282.387,494.317L280.302,494.077L278.72,494.565L277.445,494.239L277.632,489.939L275.332,491.605L272.857,491.532L271.797,490.024L269.936,489.86L270.529,488.648L268.971,486.934L267.804,484.401L268.543,483.887L268.541,482.702L270.235,481.892L269.956,480.376L270.671,479.402L270.875,478.096L274.081,476.194L276.379,475.656L276.755,475.236L279.282,475.367L280.542,467.72L280.608,466.512L280.169,464.917L278.925,463.901L278.939,461.877L280.519,461.418L281.079,461.707L281.174,460.64L279.531,460.352L279.497,458.608L284.959,458.671L285.887,457.71L286.666,458.594L287.212,460.237L287.742,459.894L289.285,461.367L291.465,461.187L292.008,460.334L294.093,459.684L295.248,459.227L295.573,458.047L297.576,457.254L297.425,456.668L295.049,456.429L294.66,454.672L294.773,452.802L293.518,452.078L294.044,451.821L296.12,452.178L298.349,452.876L299.158,452.216L301.175,451.783L304.311,450.737L305.336,449.671L304.965,448.882L306.423,448.758L307.075,449.402L306.71,450.63L307.674,451.053L308.317,452.351L307.54,453.334L307.093,455.708L307.811,457.118L308.014,458.408L309.739,459.715L311.115,459.853L311.425,459.308L312.312,459.187L313.58,458.698L314.492,457.957L316.042,458.194L316.725,458.094L318.25,458.322L318.502,457.752L318.032,457.198L318.312,456.391L319.443,456.639L320.768,456.354L322.374,456.945L323.598,457.52L324.466,456.764L325.093,456.88L325.476,457.665L326.818,457.466L327.893,456.407L328.753,454.354L330.412,451.799L331.367,451.667L332.061,453.211L333.633,458.088L335.133,458.548L335.208,460.471L333.1,462.764L333.972,463.604L338.928,464.041L339.029,466.833L341.159,465.005L344.687,466.006L349.344,467.708L350.712,469.34L350.253,470.883L353.513,470.024L358.97,471.499L363.159,471.39L367.304,473.699L370.884,476.828L373.044,477.634L375.442,477.747L376.458,478.629L377.41,482.195L377.875,483.894L376.759,488.546L375.332,490.389L371.38,494.329L369.594,497.544L367.518,500.019L366.817,500.075L366.034,502.183L366.233,507.581L365.451,512.059L365.153,513.986L364.267,515.143L363.77,519.082L360.927,522.96L360.45,526.053L358.181,527.357L357.524,529.168L354.478,529.161L350.067,530.326L348.092,531.679L344.952,532.57L341.652,535.01L339.279,538.071L338.871,540.393L339.337,542.12L338.813,545.302L338.177,546.85L336.217,548.604L333.106,554.28L330.641,556.873L328.734,558.412L327.456,561.566L325.601,563.48L324.825,561.585L326.061,560.007L324.439,557.759L322.24,555.944L319.354,553.855L318.313,553.95L315.5,551.446z"/>
                        
                        <path id="IN" class="country" data-country="IN" fill="<?php echo esc_attr($settings['default_country_color']); ?>" stroke="<?php echo esc_attr($settings['country_border_color']); ?>" stroke-width="<?php echo esc_attr($settings['country_border_width']['size'] ?? 0.8); ?>" d="M693.498,357.437L696.512,361.426L696.228,364.169L697.343,365.877L697.251,367.571L695.239,367.126L696.025,370.756L698.78,372.821L702.677,375.086L700.897,376.547L699.809,379.538L702.525,380.74L705.169,382.292L708.826,384.059L712.669,384.465L714.286,386.058L716.453,386.354L719.826,387.081L722.161,387.029L722.482,385.794L722.113,383.803L722.33,382.447L724.04,381.782L724.275,384.263L724.335,384.892L726.884,386.079L728.646,385.59L731.014,385.8L733.301,385.707L733.498,383.782L732.356,382.777L734.618,382.383L737.17,380.027L740.402,377.997L742.754,378.782L744.753,377.436L746.067,379.421L745.12,380.756L748.144,381.229L748.355,382.428L747.372,383.006L747.603,384.939L745.599,384.372L741.969,386.534L742.054,388.313L740.507,390.907L740.364,392.405L739.114,394.927L736.923,394.231L736.814,397.379L736.181,398.41L736.477,399.691L735.094,400.405L733.617,395.606L732.843,395.616L732.385,397.556L730.85,395.984L731.715,394.25L732.97,394.073L734.262,391.479L732.646,390.953L730.045,390.999L727.377,390.576L727.13,388.426L725.791,388.273L723.57,386.93L722.58,389.037L724.604,390.672L722.851,391.819L722.229,392.938L723.954,393.757L723.478,395.596L724.449,397.877L724.886,400.362L724.484,401.458L722.576,401.421L719.12,402.043L719.281,404.291L717.784,406.051L713.749,408.045L710.611,411.511L708.503,413.359L705.709,415.271L705.705,416.609L704.308,417.325L701.782,418.364L700.472,418.518L699.632,420.723L700.215,424.466L700.364,426.842L699.176,429.554L699.163,434.379L697.712,434.516L696.436,436.673L697.289,437.604L694.732,438.403L693.788,440.319L692.663,441.128L690.009,438.499L688.711,434.542L687.635,431.682L686.652,430.336L685.163,427.598L684.467,424.016L683.982,422.22L681.432,418.252L680.271,412.606L679.432,408.844L679.442,405.255L678.898,402.461L674.818,404.249L672.842,403.892L669.179,400.261L670.527,399.172L669.699,397.986L666.41,395.411L668.277,393.374L674.447,393.382L673.891,390.745L672.315,389.179L671.996,386.788L670.161,385.386L673.251,382.091L676.507,382.331L679.44,379.005L681.197,375.754L683.92,372.505L683.876,370.177L686.268,368.274L684.004,366.64L683.03,364.386L682.037,361.44L683.411,359.979L687.665,360.807L690.79,360.303z"/>
                        
                        <path id="AU" class="country" data-country="AU" fill="<?php echo esc_attr($settings['default_country_color']); ?>" stroke="<?php echo esc_attr($settings['country_border_color']); ?>" stroke-width="<?php echo esc_attr($settings['country_border_width']['size'] ?? 0.8); ?>" d="M882.928,588.16l2.709,1.277l1.526,-0.508l2.188,-0.71l1.682,0.248l0.199,4.425l-0.961,1.3l-0.289,3.064l-0.98,-1.047l-1.946,2.675l-0.58,-0.208l-1.725,-0.12l-1.729,-3.276l-0.384,-2.496l-1.617,-3.254l0.071,-1.695L882.928,588.16zM877.779,502.097l1.01,2.254l1.799,-1.084l0.929,1.218l1.346,1.125l-0.288,1.28l0.598,2.484l0.426,1.452l0.706,0.355l0.761,2.495l-0.271,1.52l0.908,1.995l3.038,1.542l1.98,1.407l1.881,1.292l-0.367,0.721l1.604,1.872l1.09,3.249l1.119,-0.662l1.137,1.306l0.686,-0.464l0.483,3.208l1.989,1.871l1.302,1.167l2.191,2.488l0.788,2.487l0.072,1.774l-0.193,1.937l1.336,2.676l-0.16,2.811l-0.485,1.48l-0.757,2.871l0.057,1.859l-0.555,2.34l-1.238,2.996l-2.077,1.631l-1.023,2.59l-0.936,1.666l-0.831,2.932l-1.082,1.707l-0.709,2.583l-0.362,2.401l0.144,1.109l-1.607,1.224l-3.139,0.128l-2.588,1.454l-1.288,1.38l-1.694,1.539l-2.322,-1.584l-1.718,-0.629l0.436,-1.851l-1.533,0.67l-2.455,2.582l-2.424,-0.97l-1.59,-0.564l-1.604,-0.254l-2.714,-1.027l-1.813,-2.175l-0.521,-2.655l-0.651,-1.752l-1.378,-1.398l-2.697,-0.414l0.922,-1.661l-0.679,-2.522l-1.369,2.351l-2.495,0.627l1.467,-1.885l0.425,-1.953l1.083,-1.646l-0.225,-2.472l-2.28,2.849l-1.752,1.15l-1.074,2.693l-2.189,-1.396l0.087,-1.791l-1.754,-2.43l-1.479,-1.247l0.527,-0.766l-3.598,-2.001l-1.971,-0.094l-2.696,-1.597l-5.021,0.31l-3.631,1.175l-3.19,1.1l-2.676,-0.219l-2.972,1.696l-2.432,0.766l-0.54,1.75l-1.035,1.363l-2.38,0.082l-1.761,0.299l-2.478,-0.613l-2.017,0.367l-1.925,0.154l-1.668,1.801l-0.817,-0.153l-1.406,0.959l-1.348,1.082l-2.046,-0.134l-1.879,-0.001l-2.975,-2.168l-1.507,-0.642l0.061,-1.927l1.393,-0.456l0.476,-0.761l-0.1,-1.196l0.343,-2.302l-0.313,-1.948l-1.482,-3.294l-0.46,-1.845l0.121,-1.83l-1.116,-2.079l-0.071,-0.934l-1.242,-1.262l-0.35,-2.468l-1.603,-2.477l-0.388,-1.327l1.231,1.346l-0.946,-2.881l1.391,0.898l0.83,1.203l-0.047,-1.59l-1.388,-2.43l-0.269,-0.968l-0.65,-0.917l0.305,-1.767l0.574,-0.75l0.383,-1.519l-0.3,-1.768l1.159,-2.165l0.211,2.292l1.185,-2.071l2.278,-1.002l1.366,-1.276l2.143,-1.095l1.274,-0.232l0.772,0.367l2.209,-1.109l1.701,-0.33l0.425,-0.65l0.742,-0.271l1.55,0.07l2.947,-0.867l1.524,-1.313l0.716,-1.575l1.645,-1.491l0.126,-1.169l0.073,-1.589l1.962,-2.474l1.181,2.514l1.193,-0.582l-0.998,-1.375l0.88,-1.409l1.237,0.629l0.34,-2.205l1.532,-1.421l0.676,-1.138l1.41,-0.491l0.044,-0.804l1.232,0.335l0.049,-0.722l1.233,-0.412l1.355,-0.387l2.071,1.318l1.556,1.705l1.755,0.02l1.783,0.271l-0.594,-1.582l1.343,-2.303l1.264,-0.749l-0.437,-0.715l1.218,-1.632l1.698,-1.006l1.435,0.339l2.355,-0.537l-0.051,-1.455l-2.054,-0.936l1.493,-0.413l1.857,0.704l1.489,1.167l2.361,0.729l0.801,-0.288l1.738,0.875l1.638,-0.815l1.054,0.248l0.656,-0.547l1.287,1.41l-0.747,1.528l-1.064,1.155l-0.964,0.096l0.325,1.146l-0.824,1.435l-0.996,1.414l0.201,0.814l2.229,1.596l2.16,0.928l1.443,0.999l2.027,1.722l0.79,-0.003l1.468,0.746l0.426,0.901l2.677,0.992l1.852,-0.999l0.549,-1.566l0.568,-1.289l0.349,-1.59l0.853,-2.3l-0.39,-1.394l0.202,-0.837l-0.324,-1.643l0.367,-2.157l0.538,-0.581l-0.437,-0.953l0.678,-1.511l0.532,-1.563l0.07,-0.81l1.042,-1.063l0.791,1.388l0.194,1.783l0.699,0.344l0.119,1.197l1.02,1.452l0.21,1.62L877.779,502.097z"/>
                        
                        <!-- Include more country paths from the provided SVG -->
                        <!-- This would include all the country paths from your world map SVG -->
                        <?php
                        // Get all country paths from the provided SVG
                        $svg_content = file_get_contents(ADVANCED_ELEMENTS_PATH . '/assets/world-map.svg');
                        preg_match_all('/<path id="([A-Z]{2})"[^>]*d="([^"]*)"[^>]*\/?>/', $svg_content, $matches);
                        
                        if (!empty($matches[1])) {
                            for ($i = 0; $i < count($matches[1]); $i++) {
                                $country_code = $matches[1][$i];
                                $path_data = $matches[2][$i];
                                
                                // Skip countries already added above
                                if (in_array($country_code, ['US', 'CN', 'BR', 'IN', 'AU'])) {
                                    continue;
                                }
                                
                                echo sprintf(
                                    '<path id="%s" class="country" data-country="%s" fill="%s" stroke="%s" stroke-width="%s" d="%s"/>',
                                    esc_attr($country_code),
                                    esc_attr($country_code),
                                    esc_attr($settings['default_country_color']),
                                    esc_attr($settings['country_border_color']),
                                    esc_attr($settings['country_border_width']['size'] ?? 0.8),
                                    esc_attr($path_data)
                                );
                            }
                        }
                        ?>
                    </g>
                </svg>
                
                <!-- Loading indicator -->
                <div class="heatmap-loading" style="display: none;">
                    <div class="loading-spinner"></div>
                    <span><?php echo esc_html__('Loading map...', 'advanced-elements-elementor'); ?></span>
                </div>
            </div>
            
            <!-- Tooltip -->
            <?php if ($settings['show_tooltip'] === 'yes') : ?>
                <div class="heatmap-tooltip" id="tooltip-<?php echo esc_attr($widget_id); ?>" style="display: none;">
                    <div class="tooltip-content">
                        <div class="tooltip-header">
                            <strong class="tooltip-country-name"></strong>
                            <span class="tooltip-value"></span>
                        </div>
                        <div class="tooltip-info"></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <style>
        .interactive-heatmap-widget {
            position: relative;
            background: <?php echo esc_attr($settings['map_background']); ?>;
            border-radius: 12px;
            overflow: hidden;
        }

        .heatmap-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .heatmap-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .heatmap-subtitle {
            font-size: 1.1rem;
            line-height: 1.6;
            opacity: 0.8;
            max-width: 600px;
            margin: 0 auto;
        }

        .heatmap-statistics {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            min-width: 120px;
        }

        .stat-number {
            display: block;
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.7;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .heatmap-legend {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .legend-color {
            width: 16px;
            height: 16px;
            border-radius: 4px;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .world-heatmap-container {
            position: relative;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            background: <?php echo esc_attr($settings['map_background']); ?>;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .world-heatmap-svg {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .country {
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            filter: drop-shadow(0 1px 3px rgba(0, 0, 0, 0.3));
        }

        .country:hover {
            <?php if ($settings['hover_effect'] === 'glow' || $settings['hover_effect'] === 'both') : ?>
            filter: drop-shadow(0 0 10px <?php echo esc_attr($settings['hover_color']); ?>) drop-shadow(0 1px 3px rgba(0, 0, 0, 0.3));
            <?php endif; ?>
            
            <?php if ($settings['hover_effect'] === 'scale' || $settings['hover_effect'] === 'both') : ?>
            transform: scale(1.05);
            transform-origin: center;
            <?php endif; ?>
        }

        .heatmap-loading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
        }

        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid #fff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 16px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .heatmap-tooltip {
            position: absolute;
            z-index: 1000;
            background: <?php echo esc_attr($settings['tooltip_bg_color'] ?? '#1f2937'); ?>;
            color: <?php echo esc_attr($settings['tooltip_text_color'] ?? '#ffffff'); ?>;
            padding: 16px;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            max-width: 280px;
            pointer-events: none;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .heatmap-tooltip.show {
            opacity: 1;
            transform: translateY(0);
        }

        .tooltip-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
            padding-bottom: 8px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .tooltip-country-name {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .tooltip-value {
            font-size: 0.9rem;
            opacity: 0.8;
            background: rgba(255, 255, 255, 0.1);
            padding: 4px 8px;
            border-radius: 4px;
        }

        .tooltip-info {
            font-size: 0.9rem;
            line-height: 1.4;
            opacity: 0.9;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .heatmap-title {
                font-size: 2rem;
            }
            
            .heatmap-statistics {
                gap: 1.5rem;
            }
            
            .stat-item {
                padding: 16px;
                min-width: 100px;
            }
            
            .stat-number {
                font-size: 1.5rem;
            }
            
            .heatmap-legend {
                gap: 1rem;
            }
            
            .world-heatmap-container {
                padding: 15px;
            }
        }

        @media (max-width: 480px) {
            .heatmap-statistics {
                gap: 1rem;
            }
            
            .stat-item {
                padding: 12px;
                min-width: 80px;
            }
            
            .heatmap-legend {
                flex-direction: column;
                align-items: center;
                gap: 0.5rem;
            }
        }

        /* Animation classes */
        .country-animate {
            animation: countryPulse 2s ease-in-out infinite;
        }

        @keyframes countryPulse {
            0%, 100% { 
                opacity: 1; 
                transform: scale(1);
            }
            50% { 
                opacity: 0.8; 
                transform: scale(1.02);
            }
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        </style>

        <script>
        jQuery(document).ready(function($) {
            const widget = $('.interactive-heatmap-widget[data-widget-id="<?php echo esc_js($widget_id); ?>"]');
            const settings = widget.data('settings');
            const svg = widget.find('.world-heatmap-svg');
            const tooltip = $('#tooltip-<?php echo esc_js($widget_id); ?>');
            
            if (!settings) return;
            
            // Initialize the heat map
            initializeHeatMap();
            
            function initializeHeatMap() {
                const countries = settings.countries;
                const colors = settings.colors;
                
                // Apply colors to countries based on their intensity
                Object.keys(countries).forEach(countryCode => {
                    const country = countries[countryCode];
                    const countryElement = svg.find(`#${countryCode}`);
                    
                    if (countryElement.length) {
                        let color;
                        switch (country.intensity) {
                            case 'low':
                                color = colors[0];
                                break;
                            case 'medium':
                                color = colors[1];
                                break;
                            case 'high':
                                color = colors[2];
                                break;
                            case 'maximum':
                                color = colors[3];
                                break;
                            default:
                                color = colors[1];
                        }
                        
                        if (settings.animationOnLoad) {
                            // Animate country appearance
                            setTimeout(() => {
                                countryElement.css({
                                    'fill': color,
                                    'opacity': 0
                                }).animate({
                                    'opacity': 1
                                }, 600);
                            }, Math.random() * settings.animationSpeed);
                        } else {
                            countryElement.css('fill', color);
                        }
                    }
                });
                
                // Add hover effects
                svg.find('.country').hover(
                    function() {
                        const countryCode = $(this).attr('id');
                        const country = countries[countryCode];
                        
                        if (country) {
                            $(this).css('fill', settings.hoverColor);
                            showTooltip($(this), countryCode, country);
                        }
                    },
                    function() {
                        const countryCode = $(this).attr('id');
                        const country = countries[countryCode];
                        
                        if (country) {
                            let color;
                            switch (country.intensity) {
                                case 'low':
                                    color = colors[0];
                                    break;
                                case 'medium':
                                    color = colors[1];
                                    break;
                                case 'high':
                                    color = colors[2];
                                    break;
                                case 'maximum':
                                    color = colors[3];
                                    break;
                            }
                            $(this).css('fill', color);
                        }
                        
                        hideTooltip();
                    }
                );
                
                // Add click events for mobile
                svg.find('.country').on('click', function() {
                    const countryCode = $(this).attr('id');
                    const country = countries[countryCode];
                    
                    if (country) {
                        // Add pulse animation
                        $(this).addClass('country-animate');
                        setTimeout(() => {
                            $(this).removeClass('country-animate');
                        }, 2000);
                    }
                });
                
                // Add fade-in animation to the entire widget
                if (settings.animationOnLoad) {
                    widget.addClass('fade-in');
                }
            }
            
            function showTooltip(element, countryCode, country) {
                if (!settings.showTooltip || !tooltip.length) return;
                
                tooltip.find('.tooltip-country-name').text(country.name);
                tooltip.find('.tooltip-value').text(`Value: ${country.value}`);
                tooltip.find('.tooltip-info').text(country.info || '');
                
                tooltip.addClass('show');
            }
            
            function hideTooltip() {
                if (tooltip.length) {
                    tooltip.removeClass('show');
                }
            }
            
            // Update tooltip position on mouse move
            widget.on('mousemove', function(e) {
                if (tooltip.hasClass('show')) {
                    const offset = 15;
                    tooltip.css({
                        'left': e.pageX + offset + 'px',
                        'top': e.pageY - offset + 'px'
                    });
                }
            });
            
            // Handle window resize
            $(window).on('resize', function() {
                hideTooltip();
            });
        });
        </script>
        <?php
    }
}