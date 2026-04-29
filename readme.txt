=== Aths Guild Progress for WoW ===
Contributors: athlios
Tags: world of warcraft, wow, guild, raid, widget
Requires at least: 6.5
Tested up to: 6.9
Requires PHP: 8.2
Stable tag: 1.1.0
License: GPL-3.0-or-later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Show World of Warcraft guild raid progression in a collapsible widget or shortcode with daily sync and manual override support.

== Description ==

Aths Guild Progress for WoW displays World of Warcraft guild raid progression on your WordPress site.

The plugin can sync progression from Battle.net and use Raider.IO raid data as a fallback when selected raid progress is not available from Battle.net. Site admins can also enter manual progress overrides for selected raids.

Each raid appears as a collapsible row. Expanding a raid shows bosses with the highest confirmed kill difficulty mark:

* NM (Normal)
* HC (Heroic)
* M (Mythic)

Main features:

* Daily automatic synchronization at 02:00 CET/CEST via WP-Cron.
* Manual **Sync Guild Data** action from the plugin settings page.
* Classic widget and shortcode support with `[aths_guild_progress]`.
* Select which raids appear in the public progress display.
* Manual progress overrides for raids with unavailable or incomplete API data.

Documentation: https://github.com/Athliara/aths-guild-progress-for-wow

Report bugs: https://github.com/Athliara/aths-guild-progress-for-wow/issues

== Installation ==

1. Upload the plugin folder to `/wp-content/plugins/aths-guild-progress-for-wow/`.
2. Activate the plugin from the **Plugins** screen.
3. Open **Aths Guild Progress** from the left admin menu.
4. Enter your Battle.net API credentials and guild details.
5. Save settings and click **Sync Guild Data**.
6. Add the **Aths Guild Progress for WoW** widget or use shortcode `[aths_guild_progress]`.

== Frequently Asked Questions ==

= What do I need before this works? =

You need a Blizzard/Battle.net API client ID and client secret, plus your guild name, realm, and region.

= Why is daily sync not exactly at 02:00? =

WP-Cron runs on site visits. The sync is scheduled for 02:00 CET/CEST and executes on the first visit after that time.

= Can I show only specific raids? =

Yes. Use the **Enabled Raids** checkboxes in plugin settings.

== External Services ==

This plugin connects to external services only when syncing guild progress data.

Battle.net API is used to request an OAuth access token and retrieve World of Warcraft guild raid progression. The plugin sends the configured region, realm, guild name/slug, Battle.net client ID, and Battle.net client secret as needed for those API requests.

Battle.net API terms: https://www.blizzard.com/legal/a2989b50-5f16-43b1-abec-2ae17cc09dd6/blizzard-developer-api-terms-of-use

Raider.IO is used as a fallback source for public guild raid progression when Battle.net does not return selected raid progress. The plugin sends the configured region, realm, and guild name/slug to Raider.IO.

Raider.IO terms: https://raider.io/terms-of-use
Raider.IO privacy policy: https://raider.io/privacy-policy

== Changelog ==

= 1.1.0 =

* Initial public release.
* Battle.net sync for World of Warcraft guild raid progression.
* Raider.IO fallback support for selected raid progress when Battle.net data is incomplete.
* Daily automatic sync at 02:00 CET/CEST plus manual sync action.
* Collapsible raid display with per-boss highest difficulty marks (NM/HC/M).
* Widget and shortcode support.
* Raid selection and manual progress override settings.
* Top-level **Aths Guild Progress** admin menu.
