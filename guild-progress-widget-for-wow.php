<?php
/*
 * Plugin Name:       Guild Progress Widget for WoW
 * Plugin URI:        https://a-wd.eu/guild-progress-widget-for-wow
 * Description:       Displays World of Warcraft guild raid progression in a widget or shortcode.
 * Version:           1.1.0
 * Requires at least: 6.5
 * Requires PHP:      8.2
 * Author:            Athlios
 * Author URI:        https://a-wd.eu
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       guild-progress-widget-for-wow
 * Domain Path:       /
 */

if (!defined('ABSPATH')) {
    exit;
}

define('ATHLIOS_GUILD_PROGRESS_PLUGIN_VERSION', '1.1.0');
define('ATHLIOS_GUILD_PROGRESS_PLUGIN_FILE', __FILE__);
define('ATHLIOS_GUILD_PROGRESS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ATHLIOS_GUILD_PROGRESS_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once ATHLIOS_GUILD_PROGRESS_PLUGIN_DIR . 'includes/class-wow-guild-progress-plugin.php';

function athlios_guild_progress_bootstrap(): void
{
    Athlios_Guild_Progress_Plugin::instance();
}
add_action('plugins_loaded', 'athlios_guild_progress_bootstrap');

register_activation_hook(__FILE__, array('Athlios_Guild_Progress_Plugin', 'activate'));
register_deactivation_hook(__FILE__, array('Athlios_Guild_Progress_Plugin', 'deactivate'));
