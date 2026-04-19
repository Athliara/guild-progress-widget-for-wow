(function () {
    function bindToggles() {
        var toggles = document.querySelectorAll('.wgp-raid-toggle');
        toggles.forEach(function (toggle) {
            if (toggle.dataset.wgpBound === '1') {
                return;
            }

            toggle.dataset.wgpBound = '1';
            toggle.addEventListener('click', function () {
                var id = toggle.getAttribute('aria-controls');
                if (!id) {
                    return;
                }

                var target = document.getElementById(id);
                if (!target) {
                    return;
                }

                var expanded = toggle.getAttribute('aria-expanded') === 'true';
                toggle.setAttribute('aria-expanded', expanded ? 'false' : 'true');
                target.hidden = expanded;
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', bindToggles);
    } else {
        bindToggles();
    }
})();
