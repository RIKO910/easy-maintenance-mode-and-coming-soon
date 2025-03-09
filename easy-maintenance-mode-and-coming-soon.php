<?php
/*
 * Plugin Name:       Easy Maintenance Mode and Coming Soon
 * Plugin URI:        https://tarikul.blog/plugins/easy-maintenance-mode-and-coming-soon
 * Description:       A simple and lightweight maintenance mode plugin for WordPress.
 * Version:           1.0.0
 * Requires at least: 6.5
 * Requires PHP:      7.2
 * Author:            Tarikul Islam Riko
 * Author URI:        https://tarikul.blog
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       easy-maintenance-mode-and-coming-soon
*/

/*
A simple and lightweight maintenance mode plugin that allows you to display a customizable "Under Maintenance" page.
*/

defined( 'ABSPATH' ) || exit; // Exist if accessed directly.

// Including classes.
require_once __DIR__ . '/includes/class-easy-maintenance-mode.php';
require_once __DIR__ . '/includes/class-admin.php';

/**
 * Initializing Plugin.
 *
 * @since 1.0.0
 * @retun Object Plugin object.
 */
function easy_maintenance_mode() {
    return new EMM_Mode( __FILE__, '1.0.0' );
}

easy_maintenance_mode();