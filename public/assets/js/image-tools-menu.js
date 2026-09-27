(function () {
    var nav = document.getElementById('mobile-menu');
    var panel = document.getElementById('image-tools-mega');
    var trigger = document.getElementById('image-tools-trigger');
    var more = document.getElementById('more-tools-menu');
    var moreTrigger = document.getElementById('more-tools-trigger');
    var closeTimer = null;
    var apps = document.querySelector('.it-apps');

    function isDesktop() {
        return window.matchMedia('(min-width: 1200px)').matches;
    }

    function setExpanded(button, open) {
        if (!button) return;
        button.setAttribute('aria-expanded', open ? 'true' : 'false');
        var item = button.closest('li');
        if (item) item.classList.toggle('is-open', open);
    }

    function openMega() {
        if (!panel || !isDesktop()) return;
        window.clearTimeout(closeTimer);
        closeMore();
        panel.hidden = false;
        panel.removeAttribute('inert');
        panel.setAttribute('aria-hidden', 'false');
        window.requestAnimationFrame(function () {
            panel.classList.add('is-open');
        });
        setExpanded(trigger, true);
        if (apps) apps.setAttribute('aria-expanded', 'true');
    }

    function closeMega(immediate) {
        if (!panel) return;
        panel.classList.remove('is-open');
        panel.setAttribute('inert', '');
        panel.setAttribute('aria-hidden', 'true');
        setExpanded(trigger, false);
        if (apps) apps.setAttribute('aria-expanded', 'false');
        var hide = function () {
            if (!panel.classList.contains('is-open')) panel.hidden = true;
        };
        if (immediate) hide();
        else window.setTimeout(hide, 220);
    }

    function scheduleClose() {
        window.clearTimeout(closeTimer);
        closeTimer = window.setTimeout(function () { closeMega(false); }, 160);
    }

    function openMore() {
        if (!more || !isDesktop()) return;
        closeMega(true);
        more.hidden = false;
        more.removeAttribute('inert');
        more.setAttribute('aria-hidden', 'false');
        setExpanded(moreTrigger, true);
    }

    function closeMore() {
        if (!more) return;
        more.hidden = true;
        more.setAttribute('inert', '');
        more.setAttribute('aria-hidden', 'true');
        setExpanded(moreTrigger, false);
    }

    if (trigger && panel) {
        var megaItem = trigger.closest('li');
        megaItem.addEventListener('mouseenter', openMega);
        megaItem.addEventListener('mouseleave', scheduleClose);
        panel.addEventListener('mouseenter', function () { window.clearTimeout(closeTimer); });
        panel.addEventListener('mouseleave', scheduleClose);
        trigger.addEventListener('click', function (event) {
            event.preventDefault();
            if (panel.classList.contains('is-open')) closeMega(false);
            else openMega();
        });
        trigger.addEventListener('keydown', function (event) {
            if (event.key === 'ArrowDown') {
                event.preventDefault();
                openMega();
                var first = panel.querySelector('a');
                if (first) first.focus();
            }
        });
    }

    if (apps) {
        apps.addEventListener('click', function () {
            if (!panel) return;
            if (panel.classList.contains('is-open')) closeMega(false);
            else openMega();
        });
    }

    if (moreTrigger && more) {
        var moreItem = moreTrigger.closest('li');
        moreItem.addEventListener('mouseenter', openMore);
        moreItem.addEventListener('mouseleave', closeMore);
        moreTrigger.addEventListener('click', function (event) {
            event.preventDefault();
            if (more.hidden) openMore();
            else closeMore();
        });
    }

    document.addEventListener('click', function (event) {
        if (panel && !panel.contains(event.target) && trigger && !trigger.contains(event.target) && !(apps && apps.contains(event.target))) {
            closeMega(false);
        }
        if (more && moreTrigger && !more.contains(event.target) && !moreTrigger.contains(event.target)) {
            closeMore();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key !== 'Escape') return;
        var megaOpen = panel && panel.classList.contains('is-open');
        var moreOpen = more && !more.hidden;
        closeMega(false);
        closeMore();
        if (megaOpen && trigger) trigger.focus();
        else if (moreOpen && moreTrigger) moreTrigger.focus();
    });

    document.querySelectorAll('.it-acc__toggle').forEach(function (button) {
        button.addEventListener('click', function () {
            var panelId = button.getAttribute('aria-controls');
            var target = panelId ? document.getElementById(panelId) : null;
            if (!target) return;
            var open = button.getAttribute('aria-expanded') === 'true';
            button.setAttribute('aria-expanded', open ? 'false' : 'true');
            target.hidden = open;
        });
    });
})();
