<?php

/**
 * @package Mpesa for WooCommerce
 * @author Osen Concepts < hi@osen.co.ke >
 * @version 1.20.99
 *
 * Plugin Name: MPesa for WooCommerce
 * Plugin URI: https://wc-mpesa.osen.co.ke/
 * Description: This plugin extends WordPress and WooCommerce functionality to integrate <cite>Mpesa</cite> for making and receiving online payments.
 * Author: Osen Concepts Kenya < hi@osen.co.ke >
 * Version: 1.20.99
 * Author URI: https://osen.co.ke/
 *
 * Requires at least: 4.6
 * Tested up to: 5.5
 *
 * WC requires at least: 3.5.0
 * WC tested up to: 4.4
 *
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html

 * Copyright 2020  Osen Concepts

 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 3, as
 * published by the Free Software Foundation.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USAv
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

define('WCM_VER', '1.20.99');
if (!defined('WCM_PLUGIN_FILE')) {
    define('WCM_PLUGIN_FILE', __FILE__);
}

require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';

register_activation_hook(__FILE__, 'wc_mpesa_activation_check');
function wc_mpesa_activation_check()
{
    if (!get_option('wc_mpesa_flush_rewrite_rules_flag')) {
        add_option('wc_mpesa_flush_rewrite_rules_flag', true);
    }

    if (!is_plugin_active('woocommerce/woocommerce.php')) {
        deactivate_plugins(plugin_basename(__FILE__));

        add_action('admin_notices', function () {
            $class   = 'notice notice-error is-dismissible';
            $message = __('Please Install/Activate WooCommerce for this extension to work..', 'woocommerce');

            printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
        });
    }
}

add_action('init', 'wc_mpesa_flush_rewrite_rules_maybe', 20);
function wc_mpesa_flush_rewrite_rules_maybe()
{
    if (get_option('wc_mpesa_flush_rewrite_rules_flag')) {
        flush_rewrite_rules();
        delete_option('wc_mpesa_flush_rewrite_rules_flag');
    }
}

add_action('activated_plugin', 'wc_mpesa_detect_plugin_activation', 10, 2);
function wc_mpesa_detect_plugin_activation($plugin, $network_activation)
{
    flush_rewrite_rules();
    if ($plugin == 'osen-wc-mpesa/osen-wc-mpesa.php') {
        exit(wp_redirect(admin_url('admin.php?page=wc-settings&tab=checkout&section=mpesa')));
    }
}

add_action('deactivated_plugin', 'wc_mpesa_detect_woocommerce_deactivation', 10, 2);
function wc_mpesa_detect_woocommerce_deactivation($plugin, $network_activation)
{
    if ($plugin == 'woocommerce/woocommerce.php') {
        deactivate_plugins(plugin_basename(__FILE__));
    }
}

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'mpesa_action_links');
function mpesa_action_links($links)
{
    return array_merge(
        $links,
        array(
            '<a href="' . admin_url('admin.php?page=wc-settings&tab=checkout&section=mpesa') . '">&nbsp;STK & C2B Setup</a>',
            // '<a href="'.admin_url('edit.php?post_type=mpesaipn&page=wc_mpesa_b2c_preferences').'">&nbsp;B2C</a>'
        )
    );
}

add_filter('plugin_row_meta', 'mpesa_row_meta', 10, 2);
function mpesa_row_meta($links, $file)
{
    $plugin = plugin_basename(__FILE__);

    if ($plugin == $file) {
        $row_meta = array(
            'github'  => '<a href="' . esc_url('https://github.com/osenco/osen-wc-mpesa/') . '" target="_blank" aria-label="' . esc_attr__('Contribute on Github', 'woocommerce') . '">' . esc_html__('Github', 'woocommerce') . '</a>',
            'apidocs' => '<a href="' . esc_url('https://developer.safaricom.co.ke/docs/') . '" target="_blank" aria-label="' . esc_attr__('MPesa API Docs (Daraja)', 'woocommerce') . '">' . esc_html__('API docs', 'woocommerce') . '</a>',
        );

        return array_merge($links, $row_meta);
    }

    return (array) $links;
}

/**
 * Initialize all our custom post types
 */
//Osen\Woocommerce\Post\Types\B2C::init();
Osen\Woocommerce\Post\Types\C2B::init();

/**
 * Initialize our admin menus
 */
Osen\Woocommerce\Menus\Menu::init();

/**
 * Initialize settings pages for B2C API
 */
//Osen\Woocommerce\Settings\B2C::init();
Osen\Woocommerce\Settings\Withdraw::init();

/**
 * Initialize metaboxes for C2B API
 */
Osen\Woocommerce\Post\Metaboxes\C2B::init();

// Stk
$c2b = get_option('woocommerce_mpesa_settings');
Osen\Woocommerce\Mpesa\STK::set(
    array(
        'env'        => isset($c2b['env']) ? $c2b['env'] : 'sandbox',
        'appkey'     => isset($c2b['key']) ? $c2b['key'] : 'bclwIPkcRqw61yUt',
        'appsecret'  => isset($c2b['secret']) ? $c2b['secret'] : '9v38Dtu5u2BpsITPmLcXNWGMsjZRWSTG',
        'headoffice' => isset($c2b['headoffice']) ? $c2b['headoffice'] : '174379',
        'shortcode'  => isset($c2b['shortcode']) ? $c2b['shortcode'] : '174379',
        'type'       => isset($c2b['idtype']) ? $c2b['idtype'] : 4,
        'passkey'    => isset($c2b['passkey']) ? $c2b['passkey'] : 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919',
        'validate'   => home_url('lipwa/validate/'),
        'confirm'    => home_url('lipwa/confirm/'),
        'reconcile'  => home_url('lipwa/reconcile/'),
        'timeout'    => home_url('lipwa/timeout/'),
    )
);

// c2b
Osen\Woocommerce\Mpesa\C2B::set(
    array(
        'env'        => isset($c2b['env']) ? $c2b['env'] : 'sandbox',
        'appkey'     => isset($c2b['key']) ? $c2b['key'] : '9v38Dtu5u2BpsITPmLcXNWGMsjZRWSTG',
        'appsecret'  => isset($c2b['secret']) ? $c2b['secret'] : '9v38Dtu5u2BpsITPmLcXNWGMsjZRWSTG',
        'headoffice' => isset($c2b['headoffice']) ? $c2b['headoffice'] : '174379',
        'shortcode'  => isset($c2b['shortcode']) ? $c2b['shortcode'] : '174379',
        'type'       => isset($c2b['idtype']) ? $c2b['idtype'] : 4,
        'passkey'    => isset($c2b['passkey']) ? $c2b['passkey'] : 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919',
        'validate'   => home_url('lipwa/validate/'),
        'confirm'    => home_url('lipwa/confirm/'),
        'reconcile'  => home_url('lipwa/reconcile/'),
        'timeout'    => home_url('lipwa/timeout/'),
    )
);

//b2c
// $b2c = get_option('b2c_wcmpesa_options');
// Osen\Woocommerce\Mpesa\B2C::set(
//     array(
//         'env'             => isset($b2c['env']) ? $b2c['env'] : 'sandbox',
//         'appkey'         => isset($b2c['key']) ? $b2c['key'] : '',
//         'appsecret'     => isset($b2c['secret']) ? $b2c['secret'] : '',
//         'headoffice'     => isset($b2c['headoffice']) ? $b2c['headoffice'] : '',
//         'shortcode'     => isset($b2c['shortcode']) ? $b2c['shortcode'] : '',
//         'type'             => isset($b2c['idtype']) ? $b2c['idtype'] : 4,
//         'passkey'         => isset($b2c['passkey']) ? $b2c['passkey'] : '',
//         'username'         => isset($b2c['username']) ? $b2c['username'] : '',
//         'password'         => isset($b2c['password']) ? $b2c['password'] : '',
//         'validate'         => home_url('lipwa/validate/'),
//         'confirm'         => home_url('lipwa/confirm/'),
//         'reconcile'     => home_url('lipwa/reconcile/'),
//         'timeout'         => home_url('lipwa/timeout/')
//     )
// );

/**
 * Load Custom Plugin Functions
 */
foreach (glob(plugin_dir_path(__FILE__) . 'inc/*.php') as $filename) {
    require_once $filename;
}

/**
 * Auto-updates
 */
require __DIR__ . '/updates/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://raw.githubusercontent.com/osenco/osen-wc-mpesa/master/updates.json',
    __FILE__,
    'wc-mpesa'
);
