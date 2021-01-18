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
        \RRZE\WP\I18n::loadTextdomain();
    }
}
