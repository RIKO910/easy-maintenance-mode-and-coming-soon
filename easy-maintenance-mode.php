<?php
/*
 * Plugin Name:       Easy maintenance mode
 * Plugin URI:        https://tarikul.blog/plugins/quantity-based-price/
 * Description:       A simple and lightweight maintenance mode plugin for WordPress.
 * Version:           1.0.0
 * Requires at least: 6.5
 * Requires PHP:      7.2
 * Author:            Tarikul
 * Author URI:        https://tarikul.blog
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       easy-maintenance-mode
*/

/*
Easy maintenance mood.


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