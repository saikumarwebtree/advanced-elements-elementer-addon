<?php
namespace Advanced_Elements\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Base widget class that all our widgets will extend
 */
abstract class Widget_Base extends \Elementor\Widget_Base {

    /**
     * Get widget categories.
     */
    public function get_categories() {
        return ['advanced-elements'];
    }

    /**
     * Get widget icon.
     */
    public function get_icon() {
        return 'eicon-inner-section';
    }

    /**
     * Get script depends
     */
    public function get_script_depends() {
        return [];
    }

    /**
     * Get style depends
     */
    public function get_style_depends() {
        return ['advanced-elements-widgets'];
    }
}