(function () {
    'use strict';

    function updateLocalePreview(root) {
        var regionSelect = root.querySelector('[data-region-select]');
        var preview = root.querySelector('[data-locale-preview]');
        var localeMap = window.athsguprAdminSettings && window.athsguprAdminSettings.localeMap ? window.athsguprAdminSettings.localeMap : {};

        if (!regionSelect || !preview) {
            return;
        }

        preview.textContent = localeMap[regionSelect.value] || 'en_GB';
    }

    function setupTabs(root) {
        var tabs = root.querySelectorAll('.wgp-admin-tab');
        var panels = root.querySelectorAll('.wgp-admin-panel');

        Array.prototype.forEach.call(tabs, function (tab) {
            tab.addEventListener('click', function () {
                var panelId = tab.getAttribute('data-tab');

                Array.prototype.forEach.call(tabs, function (item) {
                    item.classList.toggle('is-active', item === tab);
                });

                Array.prototype.forEach.call(panels, function (panel) {
                    var matches = panel.getAttribute('data-panel') === panelId;
                    panel.classList.toggle('is-active', matches);
                    panel.hidden = !matches;
                });
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        var root = document.querySelector('.wgp-admin-page');
        if (!root) {
            return;
        }

        setupTabs(root);
        updateLocalePreview(root);

        var regionSelect = root.querySelector('[data-region-select]');
        if (regionSelect) {
            regionSelect.addEventListener('change', function () {
                updateLocalePreview(root);
            });
        }
    });
})();
