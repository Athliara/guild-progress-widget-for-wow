<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('WP_Widget') && defined('ABSPATH')) {
    $aths_guild_progress_widget_file = ABSPATH . WPINC . '/class-wp-widget.php';
    if (file_exists($aths_guild_progress_widget_file)) {
        require_once $aths_guild_progress_widget_file;
    }
}

final class Aths_Guild_Progress_Plugin
{
    private const PAGE_SLUG = 'aths-guild-progress-for-wow';
    private const PLUGIN_LABEL = 'Aths Guild Progress for WoW';
    private const MENU_LABEL = 'Aths Guild Progress';
    private const MENU_ICON = 'data:image/svg+xml;base64,PHN2ZyBpZD0ic3ZnIiB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHdpZHRoPSI0MDAiIGhlaWdodD0iNDAwIiB2aWV3Qm94PSIwLCAwLCA0MDAsNDAwIj48ZyBpZD0ic3ZnZyI+PHBhdGggaWQ9InBhdGgwIiBkPSJNMTY3Ljk5MyA1Mi41OTMgQyAxNTMuODYwIDU1LjYyMSwxMzUuNzg3IDYyLjYzMSwxMjQuMzM2IDY5LjUyNyBMIDExNS4yNDYgNzUuMDAwIDk1LjEyMyA3NS4wMDAgTCA3NS4wMDAgNzUuMDAwIDc1LjAwMCA5NS4xMjMgTCA3NS4wMDAgMTE1LjI0NiA2OS41MjcgMTI0LjMzNiBDIDQzLjI1MiAxNjcuOTY5LDQzLjI1MiAyMzIuMDMxLDY5LjUyNyAyNzUuNjY0IEwgNzUuMDAwIDI4NC43NTQgNzUuMDAwIDMwNC44NzcgTCA3NS4wMDAgMzI1LjAwMCA5NS4xMjMgMzI1LjAwMCBMIDExNS4yNDYgMzI1LjAwMCAxMjQuMzM2IDMzMC40NzMgQyAxNjcuOTY5IDM1Ni43NDgsMjMyLjAzMSAzNTYuNzQ4LDI3NS42NjQgMzMwLjQ3MyBMIDI4NC43NTQgMzI1LjAwMCAzMDQuODc3IDMyNS4wMDAgTCAzMjUuMDAwIDMyNS4wMDAgMzI1LjAwMCAzMDQuODc3IEwgMzI1LjAwMCAyODQuNzU0IDMzMC40NzMgMjc1LjY2NCBDIDM1Ni43NDggMjMyLjAzMSwzNTYuNzQ4IDE2Ny45NjksMzMwLjQ3MyAxMjQuMzM2IEwgMzI1LjAwMCAxMTUuMjQ2IDMyNS4wMDAgOTUuMTIzIEwgMzI1LjAwMCA3NS4wMDAgMzA0Ljg3NyA3NS4wMDAgTCAyODQuNzU0IDc1LjAwMCAyNzUuNjY0IDY5LjUyNyBDIDI0Ni45NTkgNTIuMjQxLDIwMi4zNjcgNDUuMjI4LDE2Ny45OTMgNTIuNTkzIE0yMjcuMDM1IDc5LjA3MSBDIDIzOC41MTEgODEuNjMxLDI2MC40ODYgOTAuOTkxLDI2OC42MjEgOTYuNzgzIEMgMjcyLjMzOSA5OS40MzEsMjc1LjUxNiAxMDAuMDAwLDI4Ni41NjkgMTAwLjAwMCBMIDMwMC4wMDAgMTAwLjAwMCAzMDAuMDAwIDExMy40MzEgQyAzMDAuMDAwIDEyNC40ODQsMzAwLjU2OSAxMjcuNjYxLDMwMy4yMTcgMTMxLjM3OSBDIDMyOS43MzQgMTY4LjYxOSwzMjkuNzM0IDIzMS4zODEsMzAzLjIxNyAyNjguNjIxIEMgMzAwLjU2OSAyNzIuMzM5LDMwMC4wMDAgMjc1LjUxNiwzMDAuMDAwIDI4Ni41NjkgTCAzMDAuMDAwIDMwMC4wMDAgMjg2LjU2OSAzMDAuMDAwIEMgMjc1LjUxNiAzMDAuMDAwLDI3Mi4zMzkgMzAwLjU2OSwyNjguNjIxIDMwMy4yMTcgQyAyMzEuMzgxIDMyOS43MzQsMTY4LjYxOSAzMjkuNzM0LDEzMS4zNzkgMzAzLjIxNyBDIDEyNy42NjEgMzAwLjU2OSwxMjQuNDg0IDMwMC4wMDAsMTEzLjQzMSAzMDAuMDAwIEwgMTAwLjAwMCAzMDAuMDAwIDEwMC4wMDAgMjg2LjU2OSBDIDEwMC4wMDAgMjc1LjUxNiw5OS40MzEgMjcyLjMzOSw5Ni43ODMgMjY4LjYyMSBDIDcwLjI2NiAyMzEuMzgxLDcwLjI2NiAxNjguNjE5LDk2Ljc4MyAxMzEuMzc5IEMgOTkuNDMxIDEyNy42NjEsMTAwLjAwMCAxMjQuNDg0LDEwMC4wMDAgMTEzLjQzMSBMIDEwMC4wMDAgMTAwLjAwMCAxMTMuNDMxIDEwMC4wMDAgQyAxMjQuMzgzIDEwMC4wMDAsMTI3LjY3NiA5OS40MjAsMTMxLjI3NiA5Ni44NTcgQyAxNTUuMzY2IDc5LjcwMywxOTYuMDE5IDcyLjE1MiwyMjcuMDM1IDc5LjA3MSBNMTE4LjMzOSAxNDQuNDM1IEMgMTI0LjQzOSAxNTEuMzY1LDEyNC40NTEgMTUxLjQwNSwxMzYuNDU1IDIwNS40NDcgQyAxNDkuNDUxIDI2My45NDgsMTQ5LjI5OSAyNjEuNzIzLDE0MC45MjMgMjcwLjcwMyBMIDEzNi45MTUgMjc1LjAwMCAxNjIuMjA4IDI3NS4wMDAgQyAxNzYuMTE4IDI3NS4wMDAsMTg3LjUwMCAyNzQuNjE0LDE4Ny41MDAgMjc0LjE0MSBDIDE4Ny41MDAgMjczLjY2OSwxODYuMzkwIDI3MS4xMzYsMTg1LjAzNCAyNjguNTE0IEMgMTgyLjc1MyAyNjQuMTAzLDE5Ni40MzMgMjE3LjIxNSwyMDAuMDAwIDIxNy4yMTUgQyAyMDMuNTY3IDIxNy4yMTUsMjE3LjI0NyAyNjQuMTAzLDIxNC45NjYgMjY4LjUxNCBDIDIxMy42MTAgMjcxLjEzNiwyMTIuNTAwIDI3My42NjksMjEyLjUwMCAyNzQuMTQxIEMgMjEyLjUwMCAyNzQuNjE0LDIyMy44ODIgMjc1LjAwMCwyMzcuNzkyIDI3NS4wMDAgTCAyNjMuMDg1IDI3NS4wMDAgMjU5LjA3NyAyNzAuNzAzIEMgMjUwLjcwMSAyNjEuNzIzLDI1MC41NDkgMjYzLjk0OCwyNjMuNTQ1IDIwNS40NDcgQyAyNzUuNTQ5IDE1MS40MDUsMjc1LjU2MSAxNTEuMzY1LDI4MS42NjEgMTQ0LjQzNSBMIDI4Ny43NjYgMTM3LjUwMCAyNjIuNjMzIDEzNy41MDAgQyAyNDguODEwIDEzNy41MDAsMjM3LjUwMCAxMzcuODI4LDIzNy41MDAgMTM4LjIyOCBDIDIzNy41MDAgMTM4LjYyOSwyMzguNjk3IDE0MS40NjYsMjQwLjE2MCAxNDQuNTM0IEMgMjQyLjc2NCAxNDkuOTk1LDIzMS4zOTYgMjA3LjQ5MCwyMjguMTEzIDIwNS40NjEgQyAyMjcuNTg0IDIwNS4xMzQsMjIxLjI5MyAxODkuNzA5LDIxNC4xMzMgMTcxLjE4MyBDIDIwNi45NzQgMTUyLjY1NywyMDAuNjE0IDEzNy41MDAsMjAwLjAwMCAxMzcuNTAwIEMgMTk5LjM4NiAxMzcuNTAwLDE5My4wMjYgMTUyLjY1NywxODUuODY3IDE3MS4xODMgQyAxNzguNzA3IDE4OS43MDksMTcyLjQxNiAyMDUuMTM0LDE3MS44ODcgMjA1LjQ2MSBDIDE2OC42MDQgMjA3LjQ5MCwxNTcuMjM2IDE0OS45OTUsMTU5Ljg0MCAxNDQuNTM0IEMgMTYxLjMwMyAxNDEuNDY2LDE2Mi41MDAgMTM4LjYyOSwxNjIuNTAwIDEzOC4yMjggQyAxNjIuNTAwIDEzNy44MjgsMTUxLjE5MCAxMzcuNTAwLDEzNy4zNjcgMTM3LjUwMCBMIDExMi4yMzQgMTM3LjUwMCAxMTguMzM5IDE0NC40MzUgIiBzdHJva2U9Im5vbmUiIGZpbGw9IiNhN2FhYWQiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PC9wYXRoPjwvZz48L3N2Zz4=';
    private const SETTINGS_OPTION = 'athsgupr_settings';
    private const CACHE_OPTION = 'athsgupr_progress_cache';
    private const CRON_HOOK = 'athsgupr_daily_sync';
    private const RAID_CATALOG = array(
        array(
            'expansion' => 'Classic',
            'raids' => array(
                array('slug' => 'onyxias-lair', 'name' => "Onyxia's Lair"),
                array('slug' => 'molten-core', 'name' => 'Molten Core'),
                array('slug' => 'blackwing-lair', 'name' => 'Blackwing Lair'),
                array('slug' => 'ruins-of-ahnqiraj', 'name' => "Ruins of Ahn'Qiraj"),
                array('slug' => 'temple-of-ahnqiraj', 'name' => "Temple of Ahn'Qiraj"),
                array('slug' => 'zul-gurub', 'name' => "Zul'Gurub"),
                array('slug' => 'naxxramas', 'name' => 'Naxxramas'),
            ),
        ),
        array(
            'expansion' => 'The Burning Crusade',
            'raids' => array(
                array('slug' => 'karazhan', 'name' => 'Karazhan'),
                array('slug' => 'gruuls-lair', 'name' => "Gruul's Lair"),
                array('slug' => 'magtheridons-lair', 'name' => "Magtheridon's Lair"),
                array('slug' => 'serpentshrine-cavern', 'name' => 'Serpentshrine Cavern'),
                array('slug' => 'the-eye', 'name' => 'The Eye'),
                array('slug' => 'battle-for-mount-hyjal', 'name' => 'Battle for Mount Hyjal'),
                array('slug' => 'black-temple', 'name' => 'Black Temple'),
                array('slug' => 'zulaman', 'name' => "Zul'Aman"),
                array('slug' => 'sunwell-plateau', 'name' => 'Sunwell Plateau'),
            ),
        ),
        array(
            'expansion' => 'Wrath of the Lich King',
            'raids' => array(
                array('slug' => 'vault-of-archavon', 'name' => 'Vault of Archavon'),
                array('slug' => 'obsidian-sanctum', 'name' => 'The Obsidian Sanctum'),
                array('slug' => 'eye-of-eternity', 'name' => 'The Eye of Eternity'),
                array('slug' => 'naxxramas', 'name' => 'Naxxramas'),
                array('slug' => 'ulduar', 'name' => 'Ulduar'),
                array('slug' => 'trial-of-the-crusader', 'name' => 'Trial of the Crusader'),
                array('slug' => 'onyxias-lair', 'name' => "Onyxia's Lair"),
                array('slug' => 'icecrown-citadel', 'name' => 'Icecrown Citadel'),
                array('slug' => 'ruby-sanctum', 'name' => 'The Ruby Sanctum'),
            ),
        ),
        array(
            'expansion' => 'Cataclysm',
            'raids' => array(
                array('slug' => 'blackwing-descent', 'name' => 'Blackwing Descent'),
                array('slug' => 'the-bastion-of-twilight', 'name' => 'The Bastion of Twilight'),
                array('slug' => 'throne-of-the-four-winds', 'name' => 'Throne of the Four Winds'),
                array('slug' => 'baradin-hold', 'name' => 'Baradin Hold'),
                array('slug' => 'firelands', 'name' => 'Firelands'),
                array('slug' => 'dragon-soul', 'name' => 'Dragon Soul'),
            ),
        ),
        array(
            'expansion' => 'Mists of Pandaria',
            'raids' => array(
                array('slug' => 'siege-of-orgrimmar', 'name' => 'Siege of Orgrimmar'),
                array('slug' => 'throne-of-thunder', 'name' => 'Throne of Thunder'),
                array('slug' => 'mogushan-vaults', 'name' => "Mogu'shan Vaults"),
                array('slug' => 'heart-of-fear', 'name' => 'Heart of Fear'),
                array('slug' => 'terrace-of-endless-spring', 'name' => 'Terrace of Endless Spring'),
            ),
        ),
        array(
            'expansion' => 'Warlords of Draenor',
            'raids' => array(
                array('slug' => 'hellfire-citadel', 'name' => 'Hellfire Citadel'),
                array('slug' => 'blackrock-foundry', 'name' => 'Blackrock Foundry'),
                array('slug' => 'highmaul', 'name' => 'Highmaul'),
            ),
        ),
        array(
            'expansion' => 'Legion',
            'raids' => array(
                array('slug' => 'antorus-the-burning-throne', 'name' => 'Antorus, the Burning Throne'),
                array('slug' => 'tomb-of-sargeras', 'name' => 'Tomb of Sargeras'),
                array('slug' => 'the-nighthold', 'name' => 'Nighthold'),
                array('slug' => 'trial-of-valor', 'name' => 'Trial of Valor'),
                array('slug' => 'the-emerald-nightmare', 'name' => 'Emerald Nightmare'),
            ),
        ),
        array(
            'expansion' => 'Battle for Azeroth',
            'raids' => array(
                array('slug' => 'nyalotha-the-waking-city', 'name' => "Ny'alotha, the Waking City"),
                array('slug' => 'the-eternal-palace', 'name' => "Azshara's Eternal Palace"),
                array('slug' => 'crucible-of-storms', 'name' => 'Crucible of Storms'),
                array('slug' => 'battle-of-dazaralor', 'name' => "Battle of Dazar'alor"),
                array('slug' => 'uldir', 'name' => 'Uldir'),
            ),
        ),
        array(
            'expansion' => 'Shadowlands',
            'raids' => array(
                array('slug' => 'sepulcher-of-the-first-ones', 'name' => 'Sepulcher of the First Ones'),
                array('slug' => 'sanctum-of-domination', 'name' => 'Sanctum of Domination'),
                array('slug' => 'castle-nathria', 'name' => 'Castle Nathria'),
            ),
        ),
        array(
            'expansion' => 'Dragonflight',
            'raids' => array(
                array('slug' => 'amirdrassil-the-dreams-hope', 'name' => "Amirdrassil, the Dream's Hope"),
                array('slug' => 'aberrus-the-shadowed-crucible', 'name' => 'Aberrus, the Shadowed Crucible'),
                array('slug' => 'vault-of-the-incarnates', 'name' => 'Vault of the Incarnates'),
            ),
        ),
        array(
            'expansion' => 'The War Within',
            'raids' => array(
                array('slug' => 'manaforge-omega', 'name' => 'Manaforge Omega'),
                array('slug' => 'liberation-of-undermine', 'name' => 'Liberation of Undermine'),
                array('slug' => 'nerubar-palace', 'name' => "Nerub-ar Palace"),
            ),
        ),
        array(
            'expansion' => 'Midnight',
            'raids' => array(
                array('slug' => 'march-on-queldanas', 'name' => "March on Quel'Danas"),
                array('slug' => 'the-voidspire', 'name' => 'The Voidspire'),
                array('slug' => 'the-dreamrift', 'name' => 'The Dreamrift'),
            ),
        ),
    );

    private static $instance = null;

    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function activate(): void
    {
        self::schedule_daily_sync();
    }

    public static function deactivate(): void
    {
        $next = wp_next_scheduled(self::CRON_HOOK);
        while ($next) {
            wp_unschedule_event($next, self::CRON_HOOK);
            $next = wp_next_scheduled(self::CRON_HOOK);
        }
    }

    public static function schedule_daily_sync(): void
    {
        $targetTz = new DateTimeZone('Europe/Paris');
        $now = new DateTimeImmutable('now', $targetTz);
        $next = $now->setTime(2, 0, 0);

        if ($next <= $now) {
            $next = $next->modify('+1 day');
        }

        $existing = wp_next_scheduled(self::CRON_HOOK);
        if ($existing) {
            $existingInTargetTz = (new DateTimeImmutable('@' . $existing))->setTimezone($targetTz);
            $matchesTarget = $existingInTargetTz->format('H:i') === '02:00';

            if ($matchesTarget) {
                return;
            }

            while ($existing) {
                wp_unschedule_event($existing, self::CRON_HOOK);
                $existing = wp_next_scheduled(self::CRON_HOOK);
            }
        }

        wp_schedule_event($next->getTimestamp(), 'daily', self::CRON_HOOK);
    }

    private function __construct()
    {
        self::schedule_daily_sync();
        add_action('admin_menu', array($this, 'register_admin_page'));
        add_action('admin_init', array($this, 'register_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));
        add_action('admin_post_athsgupr_manual_sync', array($this, 'handle_manual_sync'));
        add_action(self::CRON_HOOK, array($this, 'refresh_progress_data'));
        add_action('init', array($this, 'register_shortcode'));
        add_action('widgets_init', array($this, 'register_widget'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
        add_filter('plugin_action_links_' . plugin_basename(ATHS_GUILD_PROGRESS_PLUGIN_FILE), array($this, 'add_plugin_action_links'));
    }

    public function register_shortcode(): void
    {
        add_shortcode('aths_guild_progress', array($this, 'render_shortcode'));
    }

    public function register_widget(): void
    {
        register_widget('Aths_Guild_Progress_Widget');
    }

    public function enqueue_assets(): void
    {
        wp_register_style(
            'athsgupr-style',
            ATHS_GUILD_PROGRESS_PLUGIN_URL . 'assets/wgp.css',
            array(),
            filemtime(ATHS_GUILD_PROGRESS_PLUGIN_DIR . 'assets/wgp.css')
        );

        wp_register_script(
            'athsgupr-script',
            ATHS_GUILD_PROGRESS_PLUGIN_URL . 'assets/wgp.js',
            array(),
            filemtime(ATHS_GUILD_PROGRESS_PLUGIN_DIR . 'assets/wgp.js'),
            true
        );
    }

    public function render_shortcode(): string
    {
        wp_enqueue_style('athsgupr-style');
        wp_enqueue_script('athsgupr-script');
        return $this->build_progress_html();
    }

    public function build_progress_html(): string
    {
        $cache = get_option(self::CACHE_OPTION, array());
        $raids = is_array($cache) ? ($cache['raids'] ?? array()) : array();
        $error = is_array($cache) ? ($cache['error'] ?? '') : '';
        $settings = $this->get_settings();
        $selectedRaidSlugs = array();

        foreach ($this->get_selected_raid_slugs($settings) as $selectedSlug) {
            $resolvedSlug = $this->resolve_catalog_raid_slug((string) $selectedSlug);
            if ($resolvedSlug !== '') {
                $selectedRaidSlugs[] = $resolvedSlug;
            }
        }

        $selectedRaidSlugs = array_values(array_unique($selectedRaidSlugs));
        $selectedRaidSlugMap = array_fill_keys($selectedRaidSlugs, true);

        $raids = $this->filter_renderable_raids($raids, $selectedRaidSlugMap);

        if ((empty($raids) || !is_array($raids)) && !empty($selectedRaidSlugMap) && $error === '') {
            $this->refresh_progress_data();
            $cache = get_option(self::CACHE_OPTION, array());
            $raids = is_array($cache) ? ($cache['raids'] ?? array()) : array();
            $error = is_array($cache) ? ($cache['error'] ?? '') : '';
            $raids = $this->filter_renderable_raids($raids, $selectedRaidSlugMap);
        }

        if ((empty($raids) || !is_array($raids)) && !empty($selectedRaidSlugs)) {
            $raids = $this->build_placeholder_raids_from_selection($selectedRaidSlugs);
        }

        $raids = $this->apply_manual_overrides($raids, $settings);

        if (!empty($error)) {
            return '<div class="wgp-wrap"><p class="wgp-error">' . esc_html($error) . '</p></div>';
        }

        if (empty($raids) || !is_array($raids)) {
            return '<div class="wgp-wrap"><p>No raid progress available yet.</p></div>';
        }

        $uid = wp_unique_id('athsgupr-');
        ob_start();
        ?>
        <div class="wgp-wrap">
            <?php foreach ($raids as $index => $raid) : ?>
                <?php
                $raidSlug = sanitize_title((string) ($raid['slug'] ?? ($raid['name'] ?? '')));
                $raidBgUrl = $this->get_raid_background_url($raidSlug);
                $bossList = is_array($raid['bosses'] ?? null) ? $raid['bosses'] : array();
                $progress = is_array($raid['progress'] ?? null) ? $raid['progress'] : array();
                $bossTotal = isset($progress['total']) ? (int) $progress['total'] : count($bossList);
                $bossKilled = isset($progress['killed']) ? (int) $progress['killed'] : 0;
                $bossTier = (string) ($progress['tier_label'] ?? '');
                $bossTierClass = $this->get_difficulty_css_class($bossTier);
                if (!isset($progress['killed'])) {
                    foreach ($bossList as $bossItem) {
                        if (!empty($bossItem['mark'])) {
                            $bossKilled++;
                        }
                    }
                }
                ?>
                <div class="wgp-raid <?php echo $raidBgUrl !== '' ? 'has-bg' : 'no-bg'; ?>"<?php if ($raidBgUrl !== '') : ?> style="--wgp-raid-bg-image: url('<?php echo esc_url($raidBgUrl); ?>');"<?php endif; ?>>
                    <button class="wgp-raid-toggle" type="button" aria-expanded="false" aria-controls="<?php echo esc_attr($uid . '-raid-' . $index); ?>">
                        <span class="wgp-raid-title"><?php echo esc_html($raid['name'] ?? 'Raid'); ?></span>
                        <span class="wgp-raid-count">
                            <span class="wgp-raid-fraction"><?php echo esc_html($bossKilled . '/' . $bossTotal); ?></span>
                            <?php if ($bossTier !== '') : ?><span class="wgp-raid-tier <?php echo esc_attr($bossTierClass); ?>"><?php echo esc_html($bossTier); ?></span><?php endif; ?>
                        </span>
                    </button>
                    <ul id="<?php echo esc_attr($uid . '-raid-' . $index); ?>" class="wgp-bosses" hidden>
                        <?php foreach ($bossList as $bossIndex => $boss) : ?>
                            <?php
                            $bossMark = (string) ($boss['mark'] ?? '');
                            $markClasses = array('wgp-mark', !empty($bossMark) ? 'is-killed' : 'is-unkilled');
                            $markDifficultyClass = $this->get_difficulty_css_class($bossMark);
                            if ($markDifficultyClass !== '') {
                                $markClasses[] = $markDifficultyClass;
                            }
                            if (
                                strtoupper($bossMark) === 'M'
                                && !empty($bossList)
                                && $bossIndex === (count($bossList) - 1)
                            ) {
                                $markClasses[] = 'is-last-boss-mythic';
                            }
                            ?>
                            <li class="wgp-boss">
                                <span class="wgp-boss-name"><?php echo esc_html($boss['name'] ?? 'Boss'); ?></span>
                                <span class="<?php echo esc_attr(implode(' ', $markClasses)); ?>">
                                    <?php echo esc_html($bossMark ?: '-'); ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
        return (string) ob_get_clean();
    }

    public function refresh_progress_data(): void
    {
        $settings = $this->get_settings();
        $existingCache = get_option(self::CACHE_OPTION, array());
        $existingRaids = is_array($existingCache) && is_array($existingCache['raids'] ?? null)
            ? $existingCache['raids']
            : array();

        if (empty($settings['client_id']) || empty($settings['client_secret']) || empty($settings['realm_slug']) || empty($settings['guild_slug'])) {
            update_option(
                self::CACHE_OPTION,
                array(
                    'updated_at' => time(),
                    'raids' => array(),
                    'error' => 'Configure Battle.net credentials and guild details in Aths Guild Progress for WoW settings.',
                ),
                false
            );
            return;
        }

        $token = $this->request_access_token($settings);
        if (is_wp_error($token)) {
            update_option(
                self::CACHE_OPTION,
                array(
                    'updated_at' => time(),
                    'raids' => array(),
                    'error' => $token->get_error_message(),
                ),
                false
            );
            return;
        }

        $progress = $this->fetch_raid_progression($settings, $token);
        if (is_wp_error($progress)) {
            update_option(
                self::CACHE_OPTION,
                array(
                    'updated_at' => time(),
                    'raids' => array(),
                    'error' => $progress->get_error_message(),
                ),
                false
            );
            return;
        }

        $raids = $this->transform_progression($progress, $settings);
        $raids = $this->merge_raiderio_selected_raid_progress($raids, $settings);
        if (empty($raids) && !empty($existingRaids)) {
            $raids = $existingRaids;
        }

        update_option(
            self::CACHE_OPTION,
            array(
                'updated_at' => time(),
                'raids' => $raids,
                'error' => '',
            ),
            false
        );
    }

    private function request_access_token(array $settings)
    {
        $region = $settings['region'];
        $url = 'https://' . $region . '.battle.net/oauth/token';
        $auth = base64_encode($settings['client_id'] . ':' . $settings['client_secret']);

        $response = wp_remote_post(
            $url,
            array(
                'timeout' => 20,
                'headers' => array(
                    'Authorization' => 'Basic ' . $auth,
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ),
                'body' => array(
                    'grant_type' => 'client_credentials',
                ),
            )
        );

        if (is_wp_error($response)) {
            return new WP_Error('athsgupr_token_error', 'Battle.net auth request failed.');
        }

        $status = wp_remote_retrieve_response_code($response);
        $body = json_decode((string) wp_remote_retrieve_body($response), true);

        if ($status < 200 || $status >= 300 || empty($body['access_token'])) {
            return new WP_Error('athsgupr_token_invalid', 'Battle.net auth failed. Verify client ID/secret and region.');
        }

        return (string) $body['access_token'];
    }

    private function fetch_raid_progression(array $settings, string $token)
    {
        $region = $settings['region'];
        $namespace = 'profile-' . $region;
        $locale = $settings['locale'];
        $realmSlug = rawurlencode($settings['realm_slug']);
        $guildSlug = rawurlencode($settings['guild_slug']);

        $guildUrl = sprintf('https://%s.api.blizzard.com/data/wow/guild/%s/%s', $region, $realmSlug, $guildSlug);
        $guildResult = $this->perform_blizzard_get($guildUrl, $namespace, $locale, $token);
        if (is_wp_error($guildResult)) {
            return $guildResult;
        }

        $progressUrl = sprintf('https://%s.api.blizzard.com/data/wow/guild/%s/%s/raid-progression', $region, $realmSlug, $guildSlug);
        $progressResult = $this->perform_blizzard_get($progressUrl, $namespace, $locale, $token);
        if (is_wp_error($progressResult)) {
            return $progressResult;
        }
        $guildStatus = (int) ($guildResult['status'] ?? 0);
        $guildBody = is_array($guildResult['body'] ?? null) ? $guildResult['body'] : array();
        $progressStatus = (int) ($progressResult['status'] ?? 0);
        $progressBody = is_array($progressResult['body'] ?? null) ? $progressResult['body'] : array();

        $guildOk = $guildStatus >= 200 && $guildStatus < 300;
        $progressOk = $progressStatus >= 200 && $progressStatus < 300 && is_array($progressBody);

        // Some guilds return 404 for raid progression even when guild lookup is valid.
        // Try Raider.IO fallback before treating it as no progression data yet.
        if ($guildOk && $progressStatus === 404) {
            $fallback = $this->fetch_raiderio_progression($settings);
            if (!empty($fallback['expansions']) && is_array($fallback['expansions'])) {
                return $fallback;
            }
            return array('expansions' => array());
        }

        if (!$guildOk || !$progressOk) {
            $guildDetail = $this->extract_api_detail($guildBody);
            $progressDetail = $this->extract_api_detail($progressBody);

            $message = sprintf(
                'Battle.net progression request failed. guild HTTP %d, raid-progression HTTP %d. Check region/realm/guild slugs.',
                $guildStatus,
                $progressStatus
            );

            if ($guildDetail !== '') {
                $message .= ' Guild detail: ' . $guildDetail;
            }
            if ($progressDetail !== '') {
                $message .= ' Progress detail: ' . $progressDetail;
            }

            return new WP_Error('athsgupr_progress_invalid', $message);
        }

        return $progressBody;
    }

    private function perform_blizzard_get(string $url, string $namespace, string $locale, string $token)
    {
        $response = wp_remote_get(
            add_query_arg(
                array(
                    'namespace' => $namespace,
                    'locale' => $locale,
                ),
                $url
            ),
            array(
                'timeout' => 20,
                'headers' => array(
                    'Authorization' => 'Bearer ' . $token,
                ),
            )
        );

        if (is_wp_error($response)) {
            return new WP_Error('athsgupr_progress_request_failed', 'Failed to fetch guild data from Battle.net.');
        }

        $status = wp_remote_retrieve_response_code($response);
        $body = json_decode((string) wp_remote_retrieve_body($response), true);

        return array(
            'status' => (int) $status,
            'body' => is_array($body) ? $body : array(),
        );
    }

    private function extract_api_detail(array $body): string
    {
        return (string) ($body['detail'] ?? ($body['title'] ?? ($body['reason'] ?? '')));
    }

    private function fetch_raiderio_progression(array $settings): array
    {
        $internal = $this->fetch_raiderio_internal_progression($settings);
        $public = $this->fetch_raiderio_public_progression($settings);

        if (!empty($internal['expansions']) && !empty($public['expansions'])) {
            return $this->merge_progression_payloads($public, $internal);
        }

        if (!empty($internal['expansions'])) {
            return $internal;
        }

        return $public;
    }

    private function fetch_raiderio_public_progression(array $settings): array
    {
        $url = add_query_arg(
            array(
                'region' => (string) $settings['region'],
                'realm' => (string) $settings['realm_slug'],
                'name' => (string) ($settings['guild_name'] !== '' ? $settings['guild_name'] : str_replace('-', ' ', (string) $settings['guild_slug'])),
                'fields' => 'raid_progression',
            ),
            'https://raider.io/api/v1/guilds/profile'
        );

        $response = wp_remote_get(
            $url,
            array(
                'timeout' => 20,
            )
        );

        if (is_wp_error($response)) {
            return array('expansions' => array());
        }

        $status = wp_remote_retrieve_response_code($response);
        $body = json_decode((string) wp_remote_retrieve_body($response), true);
        if ($status < 200 || $status >= 300 || !is_array($body) || !is_array($body['raid_progression'] ?? null)) {
            return array('expansions' => array());
        }

        return $this->build_progression_from_raiderio((array) $body['raid_progression']);
    }

    private function fetch_raiderio_internal_progression(array $settings): array
    {
        $guildName = (string) ($settings['guild_name'] !== '' ? $settings['guild_name'] : str_replace('-', ' ', (string) $settings['guild_slug']));
        if ($guildName === '' || (string) ($settings['region'] ?? '') === '' || (string) ($settings['realm_slug'] ?? '') === '') {
            return array('expansions' => array());
        }

        $url = add_query_arg(
            array(
                'region' => (string) $settings['region'],
                'realm' => (string) $settings['realm_slug'],
                'guild' => $guildName,
            ),
            'https://raider.io/api/guilds/details'
        );

        $response = wp_remote_get(
            $url,
            array(
                'timeout' => 20,
                'headers' => array(
                    'X-Requested-With' => 'XMLHttpRequest',
                ),
            )
        );

        if (is_wp_error($response)) {
            return array('expansions' => array());
        }

        $status = wp_remote_retrieve_response_code($response);
        $body = json_decode((string) wp_remote_retrieve_body($response), true);
        if ($status < 200 || $status >= 300 || !is_array($body) || !is_array($body['guildDetails']['raidProgress'] ?? null)) {
            return array('expansions' => array());
        }

        return $this->build_progression_from_raiderio_internal((array) $body['guildDetails']);
    }

    private function build_progression_from_raiderio_internal(array $guildDetails): array
    {
        $partitionCatalog = $this->get_raiderio_partition_catalog();
        $raidProgress = is_array($guildDetails['raidProgress'] ?? null) ? $guildDetails['raidProgress'] : array();
        $instances = array();

        foreach ($raidProgress as $raidEntry) {
            if (!is_array($raidEntry)) {
                continue;
            }

            $tierSlug = sanitize_title((string) ($raidEntry['raid'] ?? ''));
            if ($tierSlug === '' || empty($partitionCatalog[$tierSlug])) {
                continue;
            }

            $encountersDefeated = is_array($raidEntry['encountersDefeated'] ?? null) ? $raidEntry['encountersDefeated'] : array();
            $killedByDifficulty = array();

            foreach (array('normal', 'heroic', 'mythic') as $difficultyKey) {
                $killedByDifficulty[$difficultyKey] = array();
                foreach (($encountersDefeated[$difficultyKey] ?? array()) as $encounter) {
                    if (!is_array($encounter)) {
                        continue;
                    }

                    $encounterSlug = sanitize_title((string) ($encounter['slug'] ?? ''));
                    if ($encounterSlug !== '') {
                        $killedByDifficulty[$difficultyKey][$encounterSlug] = true;
                    }
                }
            }

            foreach ($partitionCatalog[$tierSlug] as $raidSlug => $partition) {
                $bosses = is_array($partition['bosses'] ?? null) ? $partition['bosses'] : array();
                if (empty($bosses)) {
                    continue;
                }

                $modes = array();
                foreach (array('normal', 'heroic', 'mythic') as $difficultyKey) {
                    $encounters = array();
                    $bossIndex = 1;

                    foreach ($bosses as $boss) {
                        $bossSlug = sanitize_title((string) ($boss['slug'] ?? ''));
                        $bossName = (string) ($boss['name'] ?? '');
                        if ($bossSlug === '' || $bossName === '') {
                            continue;
                        }

                        $encounters[] = array(
                            'encounter' => array(
                                'id' => $bossIndex,
                                'name' => $bossName,
                            ),
                            'completed_count' => !empty($killedByDifficulty[$difficultyKey][$bossSlug]) ? 1 : 0,
                        );
                        $bossIndex++;
                    }

                    $modes[] = array(
                        'difficulty' => array('type' => $difficultyKey),
                        'progress' => array('encounters' => $encounters),
                    );
                }

                $instances[] = array(
                    'instance' => array(
                        'name' => (string) ($partition['name'] ?? $this->get_catalog_raid_name($raidSlug)),
                    ),
                    'modes' => $modes,
                );
            }
        }

        if (empty($instances)) {
            return array('expansions' => array());
        }

        return array(
            'expansions' => array(
                array(
                    'instances' => $instances,
                ),
            ),
        );
    }

    private function merge_progression_payloads(array $primary, array $secondary): array
    {
        $instancesBySlug = array();

        foreach (array($primary, $secondary) as $payload) {
            foreach (($payload['expansions'] ?? array()) as $expansion) {
                foreach (($expansion['instances'] ?? array()) as $instance) {
                    if (!is_array($instance)) {
                        continue;
                    }

                    $name = (string) ($instance['instance']['name'] ?? '');
                    $slug = $this->resolve_catalog_raid_slug($name);
                    if ($slug === '') {
                        continue;
                    }

                    $instancesBySlug[$slug] = $instance;
                }
            }
        }

        if (empty($instancesBySlug)) {
            return array('expansions' => array());
        }

        return array(
            'expansions' => array(
                array(
                    'instances' => array_values($instancesBySlug),
                ),
            ),
        );
    }

    private function get_raiderio_partition_catalog(): array
    {
        return array(
            'tier-mn-1' => array(
                'the-voidspire' => array(
                    'name' => 'The Voidspire',
                    'bosses' => array(
                        array('slug' => 'imperator-averzian', 'name' => 'Imperator Averzian'),
                        array('slug' => 'vorasius', 'name' => 'Vorasius'),
                        array('slug' => 'fallenking-salhadaar', 'name' => 'Fallen-King Salhadaar'),
                        array('slug' => 'vaelgor-ezzorak', 'name' => 'Vaelgor & Ezzorak'),
                        array('slug' => 'lightblinded-vanguard', 'name' => 'Lightblinded Vanguard'),
                        array('slug' => 'crown-of-the-cosmos', 'name' => 'Crown of the Cosmos'),
                    ),
                ),
                'the-dreamrift' => array(
                    'name' => 'The Dreamrift',
                    'bosses' => array(
                        array('slug' => 'chimaerus-the-undreamt-god', 'name' => 'Chimaerus the Undreamt God'),
                    ),
                ),
                'march-on-queldanas' => array(
                    'name' => "March on Quel'Danas",
                    'bosses' => array(
                        array('slug' => 'beloren-child-of-alar', 'name' => "Belo'ren, Child of Al'ar"),
                        array('slug' => 'midnight-falls', 'name' => 'Midnight Falls'),
                    ),
                ),
            ),
        );
    }

    private function build_progression_from_raiderio(array $raidProgression): array
    {
        $instances = array();

        foreach ($raidProgression as $raidSlug => $raid) {
            if (!is_array($raid)) {
                continue;
            }

            $raidName = (string) ($raid['name'] ?? '');
            if ($raidName === '' && is_string($raidSlug)) {
                $raidName = ucwords(str_replace('-', ' ', $raidSlug));
            }
            if ($raidName === '') {
                continue;
            }

            $totalBosses = (int) ($raid['total_bosses'] ?? 0);
            $normalKilled = (int) ($raid['normal_bosses_killed'] ?? 0);
            $heroicKilled = (int) ($raid['heroic_bosses_killed'] ?? 0);
            $mythicKilled = (int) ($raid['mythic_bosses_killed'] ?? 0);

            if ($totalBosses <= 0) {
                $parsed = $this->parse_raiderio_summary((string) ($raid['summary'] ?? ''));
                $totalBosses = (int) $parsed['total'];
            }
            if ($normalKilled <= 0) {
                $normalKilled = (int) $this->parse_raiderio_summary((string) ($raid['normal_progress'] ?? ''))['killed'];
            }
            if ($heroicKilled <= 0) {
                $heroicKilled = (int) $this->parse_raiderio_summary((string) ($raid['heroic_progress'] ?? ''))['killed'];
            }
            if ($mythicKilled <= 0) {
                $mythicKilled = (int) $this->parse_raiderio_summary((string) ($raid['mythic_progress'] ?? ''))['killed'];
            }

            $totalBosses = max($totalBosses, $normalKilled, $heroicKilled, $mythicKilled);
            if ($totalBosses <= 0) {
                continue;
            }

            $normalKilled = min($normalKilled, $totalBosses);
            $heroicKilled = min($heroicKilled, $totalBosses);
            $mythicKilled = min($mythicKilled, $totalBosses);

            $normalEncounters = array();
            $heroicEncounters = array();
            $mythicEncounters = array();
            $fallbackNames = $this->get_fallback_boss_names(sanitize_title((string) $raidSlug), $totalBosses);
            for ($i = 1; $i <= $totalBosses; $i++) {
                $fallbackName = $fallbackNames[$i - 1] ?? ('Boss ' . $i);
                $encounter = array(
                    'encounter' => array(
                        'id' => $i,
                        'name' => $fallbackName,
                    ),
                );

                $normal = $encounter;
                $normal['completed_count'] = $i <= $normalKilled ? 1 : 0;
                $normalEncounters[] = $normal;

                $heroic = $encounter;
                $heroic['completed_count'] = $i <= $heroicKilled ? 1 : 0;
                $heroicEncounters[] = $heroic;

                $mythic = $encounter;
                $mythic['completed_count'] = $i <= $mythicKilled ? 1 : 0;
                $mythicEncounters[] = $mythic;
            }

            $instances[] = array(
                'instance' => array(
                    'name' => $raidName,
                ),
                'modes' => array(
                    array(
                        'difficulty' => array('type' => 'normal'),
                        'progress' => array('encounters' => $normalEncounters),
                    ),
                    array(
                        'difficulty' => array('type' => 'heroic'),
                        'progress' => array('encounters' => $heroicEncounters),
                    ),
                    array(
                        'difficulty' => array('type' => 'mythic'),
                        'progress' => array('encounters' => $mythicEncounters),
                    ),
                ),
            );
        }

        if (empty($instances)) {
            return array('expansions' => array());
        }

        return array(
            'expansions' => array(
                array(
                    'instances' => $instances,
                ),
            ),
        );
    }

    private function parse_raiderio_summary(string $summary): array
    {
        if (preg_match('/(\d+)\s*\/\s*(\d+)/', $summary, $m) !== 1) {
            return array(
                'killed' => 0,
                'total' => 0,
            );
        }

        return array(
            'killed' => (int) $m[1],
            'total' => (int) $m[2],
        );
    }

    private function filter_renderable_raids($raids, array $selectedRaidSlugMap): array
    {
        if (!is_array($raids) || empty($raids)) {
            return array();
        }

        foreach ($raids as &$raid) {
            if (!is_array($raid)) {
                continue;
            }

            $source = (string) ($raid['slug'] ?? ($raid['name'] ?? ''));
            $raid['slug'] = $this->resolve_catalog_raid_slug($source);
        }
        unset($raid);

        if (!empty($selectedRaidSlugMap)) {
            $raids = array_values(array_filter(
                $raids,
                static function ($raid) use ($selectedRaidSlugMap): bool {
                    if (!is_array($raid)) {
                        return false;
                    }

                    $slug = sanitize_title((string) ($raid['slug'] ?? ($raid['name'] ?? '')));

                    return $slug !== '' && isset($selectedRaidSlugMap[$slug]);
                }
            ));
        }

        usort($raids, array($this, 'compare_raids_by_release_order_desc'));

        return $raids;
    }

    private function sanitize_manual_overrides($input): array
    {
        if (!is_array($input)) {
            return array();
        }

        $overrides = array();
        foreach ($input as $slug => $override) {
            $slug = sanitize_title((string) $slug);
            if ($slug === '' || !is_array($override)) {
                continue;
            }

            $killed = max(0, absint($override['killed'] ?? 0));
            $total = max(0, absint($override['total'] ?? 0));
            $tier = strtoupper(sanitize_text_field((string) ($override['tier_label'] ?? '')));
            if (!in_array($tier, array('', 'NM', 'HC', 'M'), true)) {
                $tier = '';
            }

            $bossMarks = array();
            if (is_array($override['boss_marks'] ?? null)) {
                foreach ($override['boss_marks'] as $bossIndex => $bossMark) {
                    $bossKey = absint($bossIndex);
                    if ($bossKey <= 0) {
                        continue;
                    }

                    $bossMark = strtoupper(sanitize_text_field((string) $bossMark));
                    if (!in_array($bossMark, array('', 'NM', 'HC', 'M'), true)) {
                        $bossMark = '';
                    }

                    $bossMarks[$bossKey] = $bossMark;
                }
            }

            $overrides[$slug] = array(
                'enabled' => !empty($override['enabled']),
                'killed' => $killed,
                'total' => $total,
                'tier_label' => $tier,
                'boss_marks' => $bossMarks,
            );
        }

        return $overrides;
    }

    private function apply_manual_overrides(array $raids, array $settings): array
    {
        $manualOverrides = is_array($settings['manual_overrides'] ?? null) ? $settings['manual_overrides'] : array();
        if (empty($manualOverrides)) {
            return $raids;
        }

        $raidsBySlug = array();
        foreach ($raids as $raid) {
            if (!is_array($raid)) {
                continue;
            }

            $slug = sanitize_title((string) ($raid['slug'] ?? ($raid['name'] ?? '')));
            if ($slug === '') {
                continue;
            }

            $raidsBySlug[$slug] = $raid;
        }

        foreach ($manualOverrides as $slug => $override) {
            if (empty($override['enabled'])) {
                continue;
            }

            $slug = sanitize_title((string) $slug);
            if ($slug === '') {
                continue;
            }

            $total = max(0, (int) ($override['total'] ?? 0));
            $killed = max(0, (int) ($override['killed'] ?? 0));
            $tier = (string) ($override['tier_label'] ?? '');
            $bossMarks = is_array($override['boss_marks'] ?? null) ? $override['boss_marks'] : array();

            $fallbackNames = $this->get_fallback_boss_names($slug, max($total, 1));
            if ($total <= 0) {
                $fallbackNames = array_values(array_filter($fallbackNames, static fn($name) => strpos($name, 'Boss ') !== 0));
                $total = count($fallbackNames);
            }

            $total = max(0, $total);
            $bosses = array();
            $names = $this->get_fallback_boss_names($slug, max($total, count($bossMarks), 0));

            if (!empty($bossMarks)) {
                $total = max($total, count($names), max(array_keys($bossMarks)));
                $highestRank = 0;
                $killedAtHighestRank = 0;

                for ($i = 1; $i <= $total; $i++) {
                    $mark = (string) ($bossMarks[$i] ?? '');
                    $bosses[] = array(
                        'name' => $names[$i - 1] ?? ('Boss ' . $i),
                        'mark' => $mark,
                    );

                    $rank = $this->difficulty_label_to_rank($mark);
                    if ($rank > $highestRank) {
                        $highestRank = $rank;
                    }
                }

                if ($highestRank > 0) {
                    foreach ($bosses as $boss) {
                        if ($this->difficulty_label_to_rank((string) ($boss['mark'] ?? '')) === $highestRank) {
                            $killedAtHighestRank++;
                        }
                    }
                }

                $killed = $killedAtHighestRank;
                $tier = $this->rank_to_difficulty_label($highestRank);
            } else {
                $killed = min($killed, $total);
                for ($i = 0; $i < $total; $i++) {
                    $bosses[] = array(
                        'name' => $names[$i] ?? ('Boss ' . ($i + 1)),
                        'mark' => ($tier !== '' && $i < $killed) ? $tier : '',
                    );
                }
            }

            $raidsBySlug[$slug] = array(
                'name' => $this->get_catalog_raid_name($slug),
                'slug' => $slug,
                'bosses' => $bosses,
                'progress' => array(
                    'killed' => $killed,
                    'total' => $total,
                    'tier_label' => $tier,
                ),
            );
        }

        $raids = array_values($raidsBySlug);
        usort($raids, array($this, 'compare_raids_by_release_order_desc'));

        return $raids;
    }

    private function difficulty_label_to_rank(string $label): int
    {
        return match (strtoupper($label)) {
            'M' => 3,
            'HC' => 2,
            'NM' => 1,
            default => 0,
        };
    }

    private function rank_to_difficulty_label(int $rank): string
    {
        return match ($rank) {
            3 => 'M',
            2 => 'HC',
            1 => 'NM',
            default => '',
        };
    }

    private function get_difficulty_css_class(string $label): string
    {
        return match (strtoupper(trim($label))) {
            'NM' => 'is-normal',
            'HC' => 'is-heroic',
            'M' => 'is-mythic',
            default => '',
        };
    }

    private function get_fallback_boss_names(string $raidSlug, int $totalBosses): array
    {
        $raidSlug = $this->resolve_catalog_raid_slug($raidSlug);
        $map = array(
            'the-voidspire' => array(
                'Imperator Averzian',
                'Vorasius',
                'Fallen-King Salhadaar',
                'Vaelgor & Ezzorak',
                'Lightblinded Vanguard',
                'Crown of the Cosmos',
            ),
            'the-dreamrift' => array(
                'Chimaerus the Undreamt God',
            ),
            'march-on-queldanas' => array(
                "Belo'ren, Child of Al'ar",
                'Midnight Falls',
            ),
            'manaforge-omega' => array(
                'Plexus Sentinel',
                "Loom'ithar",
                'Soulbinder Naazindhri',
                'Forgeweaver Araz',
                'The Soul Hunters',
                'Fractillus',
                'Nexus-King Salhadaar',
                'Dimensius, the All-Devouring',
            ),
            'liberation-of-undermine' => array(
                'Vexie and the Geargrinders',
                'Cauldron of Carnage',
                'Rik Reverb',
                'Stix Bunkjunker',
                'Sprocketmonger Lockenstock',
                'The One-Armed Bandit',
                "Mug'Zee, Heads of Security",
                'Chrome King Gallywix',
            ),
            'nerubar-palace' => array(
                'Ulgrax the Devourer',
                'The Bloodbound Horror',
                'Sikran, Captain of the Sureki',
                "Rasha'nan",
                "Broodtwister Ovi'nax",
                "Nexus-Princess Ky'veza",
                'The Silken Court',
                'Queen Ansurek',
            ),
        );

        $names = $map[$raidSlug] ?? array();
        if (count($names) >= $totalBosses) {
            return array_slice($names, 0, $totalBosses);
        }

        for ($i = count($names) + 1; $i <= $totalBosses; $i++) {
            $names[] = 'Boss ' . $i;
        }
        return $names;
    }

    private function transform_progression(array $data, array $settings): array
    {
        $expansions = $data['expansions'] ?? array();
        if (empty($expansions) || !is_array($expansions)) {
            return array();
        }

        $selectedRaidSlugs = array();
        foreach ($this->get_selected_raid_slugs($settings) as $selectedSlug) {
            $resolved = $this->resolve_catalog_raid_slug((string) $selectedSlug);
            if ($resolved !== '') {
                $selectedRaidSlugs[] = $resolved;
            }
        }
        $selectedRaidSlugs = array_values(array_unique($selectedRaidSlugs));
        $selectedRaidSlugMap = array_fill_keys($selectedRaidSlugs, true);
        $instances = array();

        if (!empty($selectedRaidSlugs)) {
            foreach ($expansions as $expansion) {
                foreach (($expansion['instances'] ?? array()) as $instance) {
                    $name = (string) ($instance['instance']['name'] ?? '');
                    $slug = $this->resolve_catalog_raid_slug($name);
                    if ($slug !== '' && isset($selectedRaidSlugMap[$slug])) {
                        $instances[] = $instance;
                    }
                }
            }
        } else {
            $latestExpansion = end($expansions);
            $instances = is_array($latestExpansion) ? ($latestExpansion['instances'] ?? array()) : array();
        }

        $difficultyMap = array(
            'normal' => array('rank' => 1, 'label' => 'NM'),
            'heroic' => array('rank' => 2, 'label' => 'HC'),
            'mythic' => array('rank' => 3, 'label' => 'M'),
        );

        $raids = array();
        foreach ($instances as $instance) {
            $raidName = (string) ($instance['instance']['name'] ?? '');
            if ($raidName === '') {
                continue;
            }

            $bosses = array();

            foreach (($instance['modes'] ?? array()) as $mode) {
                $difficultyKey = $this->normalize_difficulty((string) ($mode['difficulty']['type'] ?? ''));
                if (!isset($difficultyMap[$difficultyKey])) {
                    continue;
                }

                $rank = $difficultyMap[$difficultyKey]['rank'];
                $encounters = $mode['progress']['encounters'] ?? array();

                foreach ($encounters as $encounter) {
                    $id = (int) ($encounter['encounter']['id'] ?? 0);
                    $name = (string) ($encounter['encounter']['name'] ?? '');
                    $completedCount = (int) ($encounter['completed_count'] ?? 0);
                    $killed = $completedCount > 0;

                    if ($id <= 0 || $name === '') {
                        continue;
                    }

                    if (!isset($bosses[$id])) {
                        $bosses[$id] = array(
                            'name' => $name,
                            'rank' => 0,
                        );
                    }

                    if ($killed && $rank > $bosses[$id]['rank']) {
                        $bosses[$id]['rank'] = $rank;
                    }
                }
            }

            $formattedBosses = array();
            $highestRank = 0;
            foreach ($bosses as $boss) {
                if ((int) $boss['rank'] > $highestRank) {
                    $highestRank = (int) $boss['rank'];
                }
            }

            $killedAtHighestRank = 0;
            if ($highestRank > 0) {
                foreach ($bosses as $boss) {
                    if ((int) $boss['rank'] === $highestRank) {
                        $killedAtHighestRank++;
                    }
                }
            }

            foreach ($bosses as $boss) {
                $mark = '-';
                foreach ($difficultyMap as $diff) {
                    if ($boss['rank'] === $diff['rank']) {
                        $mark = $diff['label'];
                        break;
                    }
                }

                $formattedBosses[] = array(
                    'name' => $boss['name'],
                    'mark' => $mark === '-' ? '' : $mark,
                );
            }

            $raids[] = array(
                'name' => $raidName,
                'slug' => $this->resolve_catalog_raid_slug($raidName),
                'bosses' => $formattedBosses,
                'progress' => array(
                    'killed' => $killedAtHighestRank,
                    'total' => count($formattedBosses),
                    'tier_label' => $highestRank === 3 ? 'M' : ($highestRank === 2 ? 'HC' : ($highestRank === 1 ? 'NM' : '')),
                ),
            );
        }

        usort($raids, array($this, 'compare_raids_by_release_order_desc'));
        return $raids;
    }

    private function merge_raiderio_selected_raid_progress(array $raids, array $settings): array
    {
        $selectedRaidSlugs = array();
        foreach ($this->get_selected_raid_slugs($settings) as $selectedSlug) {
            $resolved = $this->resolve_catalog_raid_slug((string) $selectedSlug);
            if ($resolved !== '') {
                $selectedRaidSlugs[] = $resolved;
            }
        }

        $selectedRaidSlugs = array_values(array_unique($selectedRaidSlugs));
        if (empty($selectedRaidSlugs)) {
            return $raids;
        }

        $raiderData = $this->fetch_raiderio_progression($settings);
        if (empty($raiderData['expansions']) || !is_array($raiderData['expansions'])) {
            return $raids;
        }

        $raiderRaids = $this->transform_progression($raiderData, $settings);
        if (empty($raiderRaids)) {
            return $raids;
        }

        $selectedRaidMap = array_fill_keys($selectedRaidSlugs, true);
        $currentBySlug = array();
        foreach ($raids as $raid) {
            if (!is_array($raid)) {
                continue;
            }

            $slug = sanitize_title((string) ($raid['slug'] ?? ($raid['name'] ?? '')));
            if ($slug === '') {
                continue;
            }

            $currentBySlug[$slug] = $raid;
        }

        foreach ($raiderRaids as $raid) {
            if (!is_array($raid)) {
                continue;
            }

            $slug = sanitize_title((string) ($raid['slug'] ?? ($raid['name'] ?? '')));
            if ($slug === '' || !isset($selectedRaidMap[$slug])) {
                continue;
            }

            $current = $currentBySlug[$slug] ?? null;
            $currentKilled = is_array($current['progress'] ?? null) ? (int) ($current['progress']['killed'] ?? 0) : 0;
            $currentTotal = is_array($current['progress'] ?? null) ? (int) ($current['progress']['total'] ?? 0) : 0;
            $raiderKilled = is_array($raid['progress'] ?? null) ? (int) ($raid['progress']['killed'] ?? 0) : 0;
            $raiderTotal = is_array($raid['progress'] ?? null) ? (int) ($raid['progress']['total'] ?? 0) : 0;

            if ($current === null || $raiderKilled > $currentKilled || ($currentKilled === 0 && $raiderTotal > $currentTotal)) {
                $currentBySlug[$slug] = $raid;
            }
        }

        $merged = array_values($currentBySlug);
        usort($merged, array($this, 'compare_raids_by_release_order_desc'));

        return $merged;
    }

    private function normalize_difficulty(string $difficulty): string
    {
        $difficulty = strtolower($difficulty);

        if (strpos($difficulty, 'mythic') !== false) {
            return 'mythic';
        }
        if (strpos($difficulty, 'heroic') !== false) {
            return 'heroic';
        }
        if (strpos($difficulty, 'normal') !== false) {
            return 'normal';
        }

        return '';
    }

    private function normalize_slug(string $value): string
    {
        return sanitize_title($value);
    }

    private function sanitize_slug_list($values): array
    {
        if (!is_array($values)) {
            return array();
        }

        $slugs = array();
        foreach ($values as $value) {
            if (!is_scalar($value)) {
                continue;
            }

            $slug = sanitize_title((string) $value);
            if ($slug !== '') {
                $slugs[] = $slug;
            }
        }

        return array_values(array_unique($slugs));
    }

    private function get_selected_raid_slugs(array $settings): array
    {
        $selected = $this->sanitize_slug_list($settings['selected_raid_slugs'] ?? array());
        if (!empty($selected)) {
            return $selected;
        }

        // Backward compatibility for existing comma-separated raid name config.
        $legacyNames = $this->parse_selected_raids((string) ($settings['raid_names'] ?? ''));
        return $this->sanitize_slug_list($legacyNames);
    }

    private function get_raid_catalog(): array
    {
        return self::RAID_CATALOG;
    }

    private function get_raid_background_url(string $raidSlug): string
    {
        $raidSlug = sanitize_title($raidSlug);
        if ($raidSlug === '') {
            return '';
        }

        $slugCandidates = array($raidSlug);
        if (strpos($raidSlug, 'ahnqiraj') !== false) {
            $slugCandidates[] = str_replace('ahnqiraj', 'ahn-qiraj', $raidSlug);
        }
        if (strpos($raidSlug, 'ahn-qiraj') !== false) {
            $slugCandidates[] = str_replace('ahn-qiraj', 'ahnqiraj', $raidSlug);
        }
        if ($raidSlug === 'zulaman') {
            $slugCandidates[] = 'zul-aman';
            $slugCandidates[] = 'zul-aman-temple';
        }
        $slugCandidates = array_values(array_unique($slugCandidates));

        foreach (array('jpg', 'png', 'webp') as $ext) {
            foreach ($slugCandidates as $candidate) {
                $relative = 'assets/raid-bg/' . $candidate . '.' . $ext;
                if (file_exists(ATHS_GUILD_PROGRESS_PLUGIN_DIR . $relative)) {
                    return ATHS_GUILD_PROGRESS_PLUGIN_URL . $relative;
                }
            }
        }

        return '';
    }

    private function get_raid_release_order_map(): array
    {
        $order = array();
        $index = 0;

        // Build a newest->oldest index from static catalog data so visual order
        // is based on raid release chronology, not API encounter/kill order.
        foreach (array_reverse($this->get_raid_catalog()) as $expansion) {
            foreach (($expansion['raids'] ?? array()) as $raid) {
                $slug = sanitize_title((string) ($raid['slug'] ?? ''));
                if ($slug === '') {
                    continue;
                }

                // Keep first seen entry (newest occurrence) for duplicated slugs.
                if (!isset($order[$slug])) {
                    $order[$slug] = $index;
                    $index++;
                }
            }
        }

        return $order;
    }

    private function resolve_catalog_raid_slug(string $raidName): string
    {
        $candidate = sanitize_title($raidName);
        if ($candidate === '') {
            return '';
        }

        foreach ($this->get_raid_catalog() as $expansion) {
            foreach (($expansion['raids'] ?? array()) as $raid) {
                $catalogSlug = sanitize_title((string) ($raid['slug'] ?? ''));
                $catalogName = sanitize_title((string) ($raid['name'] ?? ''));

                if ($candidate === $catalogSlug || $candidate === $catalogName) {
                    return $catalogSlug !== '' ? $catalogSlug : $catalogName;
                }
            }
        }

        $aliases = array(
            'nerub-ar-palace' => 'nerubar-palace',
            'mogu-shan-vaults' => 'mogushan-vaults',
            'azsharas-eternal-palace' => 'the-eternal-palace',
            'zul-aman' => 'zulaman',
            'voidspire' => 'the-voidspire',
            'dreamrift' => 'the-dreamrift',
            'march-on-quel-danas' => 'march-on-queldanas',
        );

        return $aliases[$candidate] ?? $candidate;
    }

    private function compare_raids_by_release_order_desc(array $left, array $right): int
    {
        static $orderMap = null;
        if (!is_array($orderMap)) {
            $orderMap = $this->get_raid_release_order_map();
        }

        $leftSlug = sanitize_title((string) ($left['slug'] ?? ($left['name'] ?? '')));
        $rightSlug = sanitize_title((string) ($right['slug'] ?? ($right['name'] ?? '')));

        $leftOrder = (int) ($orderMap[$leftSlug] ?? PHP_INT_MAX);
        $rightOrder = (int) ($orderMap[$rightSlug] ?? PHP_INT_MAX);

        if ($leftOrder === $rightOrder) {
            return strcasecmp((string) ($left['name'] ?? ''), (string) ($right['name'] ?? ''));
        }

        return $leftOrder <=> $rightOrder;
    }

    private function parse_selected_raids(string $raw): array
    {
        if ($raw === '') {
            return array();
        }

        $names = array_map('trim', explode(',', $raw));
        $names = array_filter($names, static fn($name) => $name !== '');
        return array_map('strtolower', $names);
    }

    private function get_settings(): array
    {
        $stored = get_option(self::SETTINGS_OPTION, array());

        return array(
            'guild_name' => (string) ($stored['guild_name'] ?? $this->humanize_slug((string) ($stored['guild_slug'] ?? ''))),
            'server' => (string) ($stored['server'] ?? $this->humanize_slug((string) ($stored['realm_slug'] ?? ''))),
            'client_id' => (string) ($stored['client_id'] ?? ''),
            'client_secret' => (string) ($stored['client_secret'] ?? ''),
            'region' => in_array(($stored['region'] ?? 'eu'), array('eu', 'us', 'kr', 'tw', 'cn'), true) ? $stored['region'] : 'eu',
            'locale' => (string) ($stored['locale'] ?? $this->get_default_locale_for_region((string) ($stored['region'] ?? 'eu'))),
            'realm_slug' => (string) ($stored['realm_slug'] ?? ''),
            'guild_slug' => (string) ($stored['guild_slug'] ?? ''),
            'selected_raid_slugs' => $this->sanitize_slug_list($stored['selected_raid_slugs'] ?? array()),
            'manual_overrides' => $this->sanitize_manual_overrides($stored['manual_overrides'] ?? array()),
            'raid_names' => (string) ($stored['raid_names'] ?? ''),
        );
    }

    private function get_default_locale_for_region(string $region): string
    {
        $localeMap = array(
            'us' => 'en_US',
            'eu' => 'en_GB',
            'kr' => 'ko_KR',
            'tw' => 'zh_TW',
            'cn' => 'zh_CN',
        );

        $region = strtolower(trim($region));

        return $localeMap[$region] ?? 'en_GB';
    }

    public function register_admin_page(): void
    {
        add_menu_page(
            self::PLUGIN_LABEL,
            self::MENU_LABEL,
            'manage_options',
            self::PAGE_SLUG,
            array($this, 'render_admin_page'),
            self::MENU_ICON,
            58.1
        );
    }

    public function enqueue_admin_assets(string $hook_suffix): void
    {
        if ($hook_suffix !== 'toplevel_page_' . self::PAGE_SLUG) {
            return;
        }

        wp_enqueue_style('athsgupr-admin-settings', ATHS_GUILD_PROGRESS_PLUGIN_URL . 'assets/admin-settings.css', array(), ATHS_GUILD_PROGRESS_PLUGIN_VERSION);
        wp_enqueue_script('athsgupr-admin-settings', ATHS_GUILD_PROGRESS_PLUGIN_URL . 'assets/admin-settings.js', array(), ATHS_GUILD_PROGRESS_PLUGIN_VERSION, true);
        wp_localize_script(
            'athsgupr-admin-settings',
            'athsguprAdminSettings',
            array(
                'localeMap' => array(
                    'us' => 'en_US',
                    'eu' => 'en_GB',
                    'kr' => 'ko_KR',
                    'tw' => 'zh_TW',
                    'cn' => 'zh_CN',
                ),
            )
        );
    }

    public function register_settings(): void
    {
        register_setting(
            'athsgupr_settings_group',
            self::SETTINGS_OPTION,
            array(
                'type' => 'array',
                'sanitize_callback' => array($this, 'sanitize_settings'),
                'default' => array(),
            )
        );
    }

    public function sanitize_settings($input): array
    {
        if (!is_array($input)) {
            $input = array();
        }

        $region = sanitize_key((string) ($input['region'] ?? 'eu'));
        if (!in_array($region, array('eu', 'us', 'kr', 'tw', 'cn'), true)) {
            $region = 'eu';
        }

        $guildName = sanitize_text_field((string) ($input['guild_name'] ?? ''));
        $server = sanitize_text_field((string) ($input['server'] ?? ''));
        $clientSecret = $input['client_secret'] ?? '';
        $clientSecret = is_scalar($clientSecret) ? (string) $clientSecret : '';
        $locale = $this->get_default_locale_for_region($region);

        return array(
            'guild_name' => $guildName,
            'server' => $server,
            'client_id' => sanitize_text_field((string) ($input['client_id'] ?? '')),
            'client_secret' => $clientSecret,
            'region' => $region,
            'locale' => $locale,
            'realm_slug' => $this->normalize_slug($server),
            'guild_slug' => $this->normalize_slug($guildName),
            'selected_raid_slugs' => $this->sanitize_slug_list($input['selected_raid_slugs'] ?? array()),
            'manual_overrides' => $this->sanitize_manual_overrides($input['manual_overrides'] ?? array()),
            'raid_names' => sanitize_text_field((string) ($input['raid_names'] ?? '')),
        );
    }

    public function render_admin_page(): void
    {
        if (!current_user_can('manage_options')) {
            return;
        }

        $settings = $this->get_settings();
        $selectedRaidSlugs = $this->get_selected_raid_slugs($settings);
        $selectedRaidMap = array_fill_keys($selectedRaidSlugs, true);
        $manualOverrides = is_array($settings['manual_overrides'] ?? null) ? $settings['manual_overrides'] : array();
        $raidCatalog = array_reverse($this->get_raid_catalog());
        $nextRun = wp_next_scheduled(self::CRON_HOOK);
        $nextRunDisplay = '';
        if ($nextRun) {
            $nextRunDisplay = (new DateTimeImmutable('@' . $nextRun))
                ->setTimezone(new DateTimeZone('Europe/Paris'))
                ->format('Y-m-d H:i');
        }
        $syncStatus = sanitize_key((string) filter_input(INPUT_GET, 'athsgupr_sync_status', FILTER_UNSAFE_RAW));
        $syncMessage = sanitize_text_field((string) filter_input(INPUT_GET, 'athsgupr_sync_message', FILTER_UNSAFE_RAW));
        $settingsUpdated = sanitize_key((string) filter_input(INPUT_GET, 'settings-updated', FILTER_UNSAFE_RAW));
        $resolvedLocale = $settings['locale'] !== '' ? $settings['locale'] : $this->get_default_locale_for_region((string) $settings['region']);
        ?>
        <div class="wrap wgp-admin-page">
            <div class="wgp-admin-hero">
                <span class="wgp-admin-hero__logo" aria-hidden="true"><?php echo wp_kses($this->get_logo_svg_markup(), $this->get_logo_svg_allowed_html()); ?></span>
                <div class="wgp-admin-hero__content">
                    <h1><?php echo esc_html(self::PLUGIN_LABEL); ?></h1>
                    <p><?php esc_html_e('Sync your guild raid progression from Battle.net and control which raids appear in the widget or shortcode output.', 'aths-guild-progress-for-wow'); ?></p>
                </div>
            </div>

            <p>
                <a href="<?php echo esc_url(ATHS_GUILD_PROGRESS_HELP_URL); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Plugin Documentation', 'aths-guild-progress-for-wow'); ?></a>
                |
                <a href="<?php echo esc_url(ATHS_GUILD_PROGRESS_BUG_URL); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Report Bugs', 'aths-guild-progress-for-wow'); ?></a>
            </p>

            <form method="post" action="options.php" class="wgp-admin-form">
                <?php settings_fields('athsgupr_settings_group'); ?>
                <div class="wgp-admin-tabs" role="tablist" aria-label="<?php esc_attr_e('Aths Guild Progress for WoW settings', 'aths-guild-progress-for-wow'); ?>">
                    <button type="button" class="wgp-admin-tab is-active" data-tab="guild-import"><?php esc_html_e('Guild Import', 'aths-guild-progress-for-wow'); ?></button>
                    <button type="button" class="wgp-admin-tab" data-tab="appearance"><?php esc_html_e('Appearance', 'aths-guild-progress-for-wow'); ?></button>
                    <button type="button" class="wgp-admin-tab" data-tab="manual-override"><?php esc_html_e('Manual Override', 'aths-guild-progress-for-wow'); ?></button>
                </div>

                <section class="wgp-admin-panel is-active" data-panel="guild-import">
                    <div class="wgp-admin-card">
                        <div class="wgp-admin-field-grid wgp-admin-field-grid--compact">
                            <?php $this->render_text_field('guild_name', __('Guild Name', 'aths-guild-progress-for-wow'), (string) $settings['guild_name'], __('Enter the World of Warcraft guild name.', 'aths-guild-progress-for-wow')); ?>
                            <?php $this->render_text_field('server', __('Realm', 'aths-guild-progress-for-wow'), (string) $settings['server'], __('Enter the World of Warcraft realm name.', 'aths-guild-progress-for-wow')); ?>
                            <?php $this->render_region_field((string) $settings['region'], $resolvedLocale); ?>
                        </div>
                        <div class="wgp-admin-field-grid wgp-admin-field-grid--compact">
                            <?php $this->render_text_field('client_id', __('Battle.net Client ID', 'aths-guild-progress-for-wow'), (string) $settings['client_id'], __('Create API credentials in the Battle.net Developer Portal: develop.battle.net.', 'aths-guild-progress-for-wow')); ?>
                            <?php $this->render_text_field('client_secret', __('Battle.net Client Secret', 'aths-guild-progress-for-wow'), (string) $settings['client_secret'], __('Keep this private. It is used together with Client ID for Blizzard API authentication.', 'aths-guild-progress-for-wow'), 'password', array('autocomplete' => 'new-password')); ?>
                        </div>
                        <div class="wgp-admin-meta">
                            <p><?php esc_html_e('Use widget "Aths Guild Progress for WoW" or shortcode [aths_guild_progress].', 'aths-guild-progress-for-wow'); ?></p>
                            <p>
                                <?php
                                /* translators: %s: next scheduled sync date and time. */
                                printf(esc_html__('Daily sync is scheduled for 02:00 CET/CEST. Next run: %s', 'aths-guild-progress-for-wow'), $nextRunDisplay !== '' ? esc_html($nextRunDisplay) : esc_html__('Not scheduled', 'aths-guild-progress-for-wow'));
                                ?>
                            </p>
                        </div>
                        <div class="wgp-admin-actions">
                            <?php submit_button(__('Save Changes', 'aths-guild-progress-for-wow'), 'primary', 'submit', false); ?>
                            <button type="submit" class="button button-secondary" form="athsgupr-manual-sync-form"><?php esc_html_e('Sync Guild Data', 'aths-guild-progress-for-wow'); ?></button>
                        </div>
                        <?php if ($settingsUpdated !== '') : ?>
                            <div class="wgp-inline-notice wgp-inline-notice--success"><p><?php esc_html_e('Settings saved.', 'aths-guild-progress-for-wow'); ?></p></div>
                        <?php endif; ?>
                        <?php if ($syncStatus !== '' && $syncMessage !== '') : ?>
                            <div class="wgp-inline-notice <?php echo $syncStatus === 'success' ? 'wgp-inline-notice--success' : 'wgp-inline-notice--error'; ?>"><p><?php echo esc_html($syncMessage); ?></p></div>
                        <?php endif; ?>
                    </div>
                </section>

                <section class="wgp-admin-panel" data-panel="appearance" hidden>
                    <div class="wgp-admin-card">
                        <div class="wgp-admin-field-grid wgp-admin-field-grid--list">
                            <div class="wgp-admin-field wgp-admin-field--raids">
                                <span class="wgp-admin-field__label"><?php esc_html_e('Enabled Raids', 'aths-guild-progress-for-wow'); ?></span>
                                <div class="wgp-enabled-raids">
                                    <?php foreach ($raidCatalog as $group) : ?>
                                        <div class="wgp-expansion-group">
                                            <div class="wgp-expansion-title"><?php echo esc_html((string) ($group['expansion'] ?? 'Expansion')); ?></div>
                                            <?php foreach (($group['raids'] ?? array()) as $raid) : ?>
                                                <?php $slug = (string) ($raid['slug'] ?? ''); ?>
                                                <?php $name = (string) ($raid['name'] ?? ''); ?>
                                                <?php if ($slug === '' || $name === '') { continue; } ?>
                                                <div class="wgp-raid-option">
                                                    <input
                                                        id="<?php echo esc_attr('wgp-raid-' . $slug); ?>"
                                                        type="checkbox"
                                                        name="<?php echo esc_attr(self::SETTINGS_OPTION); ?>[selected_raid_slugs][]"
                                                        value="<?php echo esc_attr($slug); ?>"
                                                        <?php checked(isset($selectedRaidMap[$slug])); ?>
                                                    />
                                                    <label class="wgp-raid-option__label" for="<?php echo esc_attr('wgp-raid-' . $slug); ?>"><?php echo esc_html($name); ?></label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <p class="description"><?php esc_html_e('If none are selected, the widget falls back to the latest expansion raids.', 'aths-guild-progress-for-wow'); ?></p>
                            </div>
                        </div>
                        <div class="wgp-admin-actions"><?php submit_button(__('Save Changes', 'aths-guild-progress-for-wow'), 'primary', 'submit', false); ?></div>
                        <?php if ($settingsUpdated !== '') : ?>
                            <div class="wgp-inline-notice wgp-inline-notice--success"><p><?php esc_html_e('Settings saved.', 'aths-guild-progress-for-wow'); ?></p></div>
                        <?php endif; ?>
                    </div>
                </section>

                <section class="wgp-admin-panel" data-panel="manual-override" hidden>
                    <div class="wgp-admin-card">
                        <div class="wgp-admin-field-grid wgp-admin-field-grid--list">
                            <div class="wgp-admin-field wgp-admin-field--raids">
                                <span class="wgp-admin-field__label"><?php esc_html_e('Manual Progress Override', 'aths-guild-progress-for-wow'); ?></span>
                                <?php if (empty($selectedRaidSlugs)) : ?>
                                    <p class="description"><?php esc_html_e('Select raids in the Appearance tab first. Manual overrides are shown for the currently enabled raids.', 'aths-guild-progress-for-wow'); ?></p>
                                <?php else : ?>
                                    <div class="wgp-override-grid">
                                        <?php foreach ($selectedRaidSlugs as $slug) : ?>
                                            <?php $override = is_array($manualOverrides[$slug] ?? null) ? $manualOverrides[$slug] : array(); ?>
                                            <?php $overrideBossMarks = is_array($override['boss_marks'] ?? null) ? $override['boss_marks'] : array(); ?>
                                            <?php $overrideBossNames = array_values(array_filter($this->get_fallback_boss_names($slug, 99), static fn($name) => strpos($name, 'Boss ') !== 0)); ?>
                                            <div class="wgp-override-card">
                                                <div class="wgp-expansion-title"><?php echo esc_html($this->get_catalog_raid_name($slug)); ?></div>
                                                <div class="wgp-raid-option">
                                                    <input
                                                        id="<?php echo esc_attr('wgp-override-enabled-' . $slug); ?>"
                                                        type="checkbox"
                                                        name="<?php echo esc_attr(self::SETTINGS_OPTION); ?>[manual_overrides][<?php echo esc_attr($slug); ?>][enabled]"
                                                        value="1"
                                                        <?php checked(!empty($override['enabled'])); ?>
                                                    />
                                                    <label class="wgp-raid-option__label" for="<?php echo esc_attr('wgp-override-enabled-' . $slug); ?>"><?php esc_html_e('Use manual values for this raid', 'aths-guild-progress-for-wow'); ?></label>
                                                </div>
                                                <?php if (!empty($overrideBossNames)) : ?>
                                                    <div class="wgp-override-bosses">
                                                        <div class="wgp-admin-field__label"><?php esc_html_e('Boss Kills By Difficulty', 'aths-guild-progress-for-wow'); ?></div>
                                                        <?php foreach ($overrideBossNames as $bossIndex => $bossName) : ?>
                                                            <?php $bossNumber = $bossIndex + 1; ?>
                                                            <div class="wgp-override-boss-row">
                                                                <span class="wgp-override-boss-name"><?php echo esc_html($bossName); ?></span>
                                                                <select name="<?php echo esc_attr(self::SETTINGS_OPTION); ?>[manual_overrides][<?php echo esc_attr($slug); ?>][boss_marks][<?php echo esc_attr((string) $bossNumber); ?>]">
                                                                    <?php foreach (array('' => '-', 'NM' => 'NM', 'HC' => 'HC', 'M' => 'M') as $markValue => $markLabel) : ?>
                                                                        <option value="<?php echo esc_attr($markValue); ?>" <?php selected((string) ($overrideBossMarks[$bossNumber] ?? ''), $markValue); ?>><?php echo esc_html($markLabel); ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <p class="description"><?php esc_html_e('Use this only when Blizzard progression is unavailable or incomplete for selected raids. Manual values override the displayed counts for that raid.', 'aths-guild-progress-for-wow'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="wgp-admin-actions"><?php submit_button(__('Save Changes', 'aths-guild-progress-for-wow'), 'primary', 'submit', false); ?></div>
                        <?php if ($settingsUpdated !== '') : ?>
                            <div class="wgp-inline-notice wgp-inline-notice--success"><p><?php esc_html_e('Settings saved.', 'aths-guild-progress-for-wow'); ?></p></div>
                        <?php endif; ?>
                    </div>
                </section>
            </form>

            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" id="athsgupr-manual-sync-form" class="wgp-admin-sync-form">
                <?php wp_nonce_field('athsgupr_manual_sync'); ?>
                <input type="hidden" name="action" value="athsgupr_manual_sync" />
                <p class="description"><?php esc_html_e('Runs an immediate Battle.net sync for guild progression data. Automatic sync still runs daily.', 'aths-guild-progress-for-wow'); ?></p>
            </form>
        </div>
        <?php
    }

    public function handle_manual_sync(): void
    {
        if (!current_user_can('manage_options')) {
            wp_die('Unauthorized.');
        }
        check_admin_referer('athsgupr_manual_sync');

        $this->refresh_progress_data();
        $cache = get_option(self::CACHE_OPTION, array());
        $error = is_array($cache) ? (string) ($cache['error'] ?? '') : '';

        wp_safe_redirect(
            add_query_arg(
                array(
                    'page' => self::PAGE_SLUG,
                    'athsgupr_sync_status' => $error === '' ? 'success' : 'error',
                    'athsgupr_sync_message' => $error === '' ? 'Guild progress synced successfully.' : $error,
                ),
                admin_url('admin.php')
            )
        );
        exit;
    }

    public function add_plugin_action_links(array $links): array
    {
        $settingsLink = sprintf(
            '<a href="%s">%s</a>',
            esc_url(admin_url('admin.php?page=' . self::PAGE_SLUG)),
            esc_html__('Settings', 'aths-guild-progress-for-wow')
        );

        array_unshift($links, $settingsLink);

        return $links;
    }

    private function get_logo_svg_markup(): string
    {
        $svg = base64_decode((string) substr(self::MENU_ICON, strpos(self::MENU_ICON, ',') + 1), true);

        return is_string($svg) ? $svg : '';
    }

    private function get_logo_svg_allowed_html(): array
    {
        return array(
            'svg' => array(
                'id' => true,
                'version' => true,
                'xmlns' => true,
                'xmlns:xlink' => true,
                'width' => true,
                'height' => true,
                'viewbox' => true,
                'viewBox' => true,
            ),
            'g' => array(
                'id' => true,
            ),
            'path' => array(
                'id' => true,
                'd' => true,
                'stroke' => true,
                'fill' => true,
                'fill-rule' => true,
            ),
        );
    }

    private function humanize_slug(string $value): string
    {
        $value = trim($value);
        if ($value === '') {
            return '';
        }

        return ucwords(str_replace('-', ' ', $value));
    }

    private function build_placeholder_raids_from_selection(array $selectedRaidSlugs): array
    {
        $selectedRaidSlugs = array_values(array_unique(array_filter(array_map('sanitize_title', $selectedRaidSlugs))));
        if (empty($selectedRaidSlugs)) {
            return array();
        }

        $catalogMap = array();
        foreach ($this->get_raid_catalog() as $expansion) {
            foreach (($expansion['raids'] ?? array()) as $raid) {
                $slug = sanitize_title((string) ($raid['slug'] ?? ''));
                if ($slug === '') {
                    continue;
                }

                $catalogMap[$slug] = (string) ($raid['name'] ?? $slug);
            }
        }

        $raids = array();
        foreach ($selectedRaidSlugs as $slug) {
            $fallbackNames = $this->get_fallback_boss_names($slug, 99);
            $fallbackNames = array_values(array_filter($fallbackNames, static fn($name) => strpos($name, 'Boss ') !== 0));
            $bosses = array();
            foreach ($fallbackNames as $name) {
                $bosses[] = array(
                    'name' => $name,
                    'mark' => '',
                );
            }

            $raids[] = array(
                'name' => $catalogMap[$slug] ?? $this->humanize_slug($slug),
                'slug' => $slug,
                'bosses' => $bosses,
                'progress' => array(
                    'killed' => 0,
                    'total' => count($bosses),
                    'tier_label' => '',
                ),
            );
        }

        usort($raids, array($this, 'compare_raids_by_release_order_desc'));

        return $raids;
    }

    private function get_catalog_raid_name(string $slug): string
    {
        $slug = sanitize_title($slug);
        foreach ($this->get_raid_catalog() as $expansion) {
            foreach (($expansion['raids'] ?? array()) as $raid) {
                $raidSlug = sanitize_title((string) ($raid['slug'] ?? ''));
                if ($raidSlug === $slug) {
                    return (string) ($raid['name'] ?? $slug);
                }
            }
        }

        return $this->humanize_slug($slug);
    }

    private function render_text_field(string $key, string $label, string $value, string $description, string $type = 'text', array $attributes = array()): void
    {
        $name = self::SETTINGS_OPTION . '[' . $key . ']';
        ?>
        <div class="wgp-admin-field">
            <label for="<?php echo esc_attr('wgp-' . $key); ?>" class="wgp-admin-field__label"><?php echo esc_html($label); ?></label>
            <input id="<?php echo esc_attr('wgp-' . $key); ?>" class="regular-text" type="<?php echo esc_attr($type); ?>" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>"<?php foreach ($attributes as $attribute_name => $attribute_value) : ?> <?php echo esc_attr($attribute_name); ?>="<?php echo esc_attr((string) $attribute_value); ?>"<?php endforeach; ?> />
            <p class="description"><?php echo esc_html($description); ?></p>
        </div>
        <?php
    }

    private function render_region_field(string $value, string $locale): void
    {
        $regions = array('eu' => 'EU', 'us' => 'US', 'kr' => 'KR', 'tw' => 'TW', 'cn' => 'CN');
        ?>
        <div class="wgp-admin-field">
            <label for="wgp-region" class="wgp-admin-field__label"><?php esc_html_e('Region', 'aths-guild-progress-for-wow'); ?></label>
            <select id="wgp-region" name="<?php echo esc_attr(self::SETTINGS_OPTION . '[region]'); ?>" data-region-select>
                <?php foreach ($regions as $region_key => $region_label) : ?>
                    <option value="<?php echo esc_attr($region_key); ?>" <?php selected($value, $region_key); ?>><?php echo esc_html($region_label); ?></option>
                <?php endforeach; ?>
            </select>
            <p class="description"><?php esc_html_e('Choose the World of Warcraft guild region.', 'aths-guild-progress-for-wow'); ?></p>
            <p class="description">
                <?php
                /* translators: %s: locale code selected from the chosen region. */
                printf(wp_kses_post(__('Locale is selected automatically from the region: <strong data-locale-preview>%s</strong>.', 'aths-guild-progress-for-wow')), esc_html($locale));
                ?>
            </p>
        </div>
        <?php
    }
}

if (class_exists('WP_Widget')) {
    class Aths_Guild_Progress_Widget extends WP_Widget
    {
        public function __construct()
        {
            parent::__construct(
                'aths_guild_progress_widget',
                'Aths Guild Progress for WoW',
                array('description' => 'Shows raid progress from Battle.net data.')
            );
        }

        public function widget($args, $instance)
        {
            echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            if (!empty($instance['title'])) {
                echo $args['before_title'] . esc_html($instance['title']) . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }

            wp_enqueue_style('athsgupr-style');
            wp_enqueue_script('athsgupr-script');
            echo Aths_Guild_Progress_Plugin::instance()->build_progress_html(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }

        public function form($instance)
        {
            $title = $instance['title'] ?? 'Guild Progress';
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
            </p>
            <?php
        }

        public function update($new_instance, $old_instance)
        {
            return array(
                'title' => sanitize_text_field((string) ($new_instance['title'] ?? '')),
            );
        }
    }
}
