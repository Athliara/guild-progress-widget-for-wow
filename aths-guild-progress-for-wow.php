<?php
/*
 * Plugin Name:       Aths Guild Progress for WoW
 * Plugin URI:        https://github.com/Athliara/aths-guild-progress-for-wow
 * Description:       Displays World of Warcraft guild raid progression in a widget or shortcode.
 * Version:           1.1.0
 * Requires at least: 6.5
 * Requires PHP:      8.2
 * Author:            Athlios
 * Author URI:        https://a-wd.eu
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       aths-guild-progress-for-wow
 * Domain Path:       /
 */

if (!defined('ABSPATH')) {
    exit;
}

define('ATHS_GUILD_PROGRESS_PLUGIN_VERSION', '1.1.0');
define('ATHS_GUILD_PROGRESS_PLUGIN_FILE', __FILE__);
define('ATHS_GUILD_PROGRESS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ATHS_GUILD_PROGRESS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ATHS_GUILD_PROGRESS_HELP_URL', 'https://github.com/Athliara/aths-guild-progress-for-wow');
define('ATHS_GUILD_PROGRESS_BUG_URL', 'https://github.com/Athliara/aths-guild-progress-for-wow/issues');

require_once ATHS_GUILD_PROGRESS_PLUGIN_DIR . 'includes/class-aths-guild-progress-plugin.php';

function aths_guild_progress_bootstrap(): void
{
    Aths_Guild_Progress_Plugin::instance();
}
add_action('plugins_loaded', 'aths_guild_progress_bootstrap');

register_activation_hook(__FILE__, array('Aths_Guild_Progress_Plugin', 'activate'));
register_deactivation_hook(__FILE__, array('Aths_Guild_Progress_Plugin', 'deactivate'));
