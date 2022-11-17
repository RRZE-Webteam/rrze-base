<?php

namespace RRZE\Base;

defined('ABSPATH') || exit;

/**
 * Class Main
 * @package RRZE\Base
 */
class Main
{
    /**
     * __construct
     */
    public function __construct()
    {
        //add_action('wp_enqueue_scripts', [$this, 'registerScripts']);
    }

    /**
     * Registers a script to be enqueued later.
     */
    public function registerScripts()
    {
        wp_register_style(
            'rrze-base',
            plugins_url('assets/css/rrze-base.css', plugin()->getBasename()),
            [],
            plugin()->getVersion(true)
        );
        wp_register_script(
            'rrze-base',
            plugins_url('assets/js/rrze-base.js', plugin()->getBasename()),
            ['jquery'],
            plugin()->getVersion(true)
        );
    }
}
