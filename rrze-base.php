<?php

/*
Plugin Name:     RRZE Base
Plugin URI:      https://gitlab.rrze.fau.de/rrze-webteam/rrze-base
Description:     Base template for WordPress plugins.
Version:         0.1.1
Author:          RRZE Webteam
Author URI:      https://blogs.fau.de/webworking/
License:         GNU General Public License v2
License URI:     http://www.gnu.org/licenses/gpl-2.0.html
Domain Path:     /languages
Text Domain:     rrze-base
*/

namespace RRZE\Base;

defined('ABSPATH') || exit;

const RRZE_PHP_VERSION = '7.4';
const RRZE_WP_VERSION  = '5.6';

/**
 * Composer autoload
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * SPL Autoloader (PSR-4).
 * @param string $class The fully-qualified class name.
 * @return void
 */
spl_autoload_register(function ($class) {
    $prefix = __NAMESPACE__;
    $base_dir = __DIR__ . '/includes/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relativeClass = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// Register plugin hooks.
register_activation_hook(__FILE__, __NAMESPACE__ . '\activation');
register_deactivation_hook(__FILE__, __NAMESPACE__ . '\deactivation');

add_action('plugins_loaded', __NAMESPACE__ . '\loaded');

/**
 * Load textdomain.
 */
function load_textdomain()
{
    load_plugin_textdomain(
        'rrze-base',
        false,
        sprintf('%s/languages/', dirname(plugin_basename(__FILE__)))
    );
}

/**
 * System requirement verification.
 */
function system_requirements()
{
    load_textdomain();
    $error = '';
    if (version_compare(PHP_VERSION, RRZE_PHP_VERSION, '<')) {
        $error = sprintf(
            __('The server is running PHP version %s. The Plugin requires at least PHP version %s.', 'rrze-base'),
            PHP_VERSION,
            RRZE_PHP_VERSION
        );
    } elseif (version_compare($GLOBALS['wp_version'], RRZE_WP_VERSION, '<')) {
        $error = sprintf(
            __('The server is running WordPress version %s. The Plugin requires at least WordPress version %s.', 'rrze-base'),
            $GLOBALS['wp_version'],
            RRZE_WP_VERSION
        );
    }

    return $error;
}

/**
 * Activation callback function.
 */
function activation()
{
    $error = system_requirements();
    if ($error) {
        deactivate_plugins(plugin_basename(__FILE__));
        wp_die(sprintf(__('Plugins: %s: %s', 'rrze-base'), plugin_basename(__FILE__), $error));
    }
}

/**
 * Deactivation callback function.
 */
function deactivation()
{
    //
}

/**
 * Instantiate Plugin class.
 * @return object Plugin
 */
function plugin()
{
    static $instance;
    if (null === $instance) {
        $instance = new \RRZE\WP\Plugin(__FILE__);
    }

    return $instance;
}

/**
 * Loaded callback function.
 *
 * @return void
 */
function loaded()
{
    add_action('init', __NAMESPACE__ . '\load_textdomain');
    plugin()->loaded();
    $error = system_requirements();
    if ($error) {
        add_action('admin_init', function () use ($error) {
            if (current_user_can('activate_plugins')) {
                $pluginData = get_plugin_data(plugin()->get_file());
                $pluginName = $pluginData['Name'];
                $tag = is_plugin_active_for_network(plugin()->get_basename()) ? 'network_admin_notices' : 'admin_notices';
                add_action($tag, function () use ($pluginName, $error) {
                    printf(
                        '<div class="notice notice-error"><p>' . __('Plugins: %s: %s', 'rrze-base') . '</p></div>',
                        esc_html($pluginName),
                        esc_html($error)
                    );
                });
            }
        });
        return;
    }
    new Main;
}
