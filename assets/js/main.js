document.addEventListener('DOMContentLoaded', function () {
    // --- Header scroll effect (مطابق React) ---
    var header = document.getElementById('site-header');
    if (header) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 20) {
                header.classList.add('bg-white/95', 'backdrop-blur-xl', 'shadow-lg', 'border-b', 'border-gray-100');
                header.classList.remove('py-4');
                header.classList.add('py-3');
            } else {
                header.classList.remove('bg-white/95', 'backdrop-blur-xl', 'shadow-lg', 'border-b', 'border-gray-100');
                header.classList.remove('py-3');
                header.classList.add('py-4');
            }
        });
    }

    // --- Mobile menu toggle ---
    var mobileToggle = document.getElementById('mobile-menu-toggle');
    var mobilePanel = document.getElementById('mobile-menu-panel');
    if (mobileToggle && mobilePanel) {
        mobileToggle.addEventListener('click', function () {
            mobilePanel.classList.toggle('hidden');
            var isExpanded = !mobilePanel.classList.contains('hidden');
            mobileToggle.setAttribute('aria-expanded', isExpanded);
            mobileToggle.setAttribute('aria-label', isExpanded ? 'إغلاق القائمة' : 'فتح القائمة');
            mobileToggle.innerHTML = isExpanded
                ? '<svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>'
                : '<svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>';
        });
    }

    // --- Animated stat counter (مطابق React AnimatedCounter) ---
    var statCounters = document.querySelectorAll('.stat-counter');
    if (statCounters.length && 'IntersectionObserver' in window) {
        var counterObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                var el = entry.target;
                var end = parseInt(el.getAttribute('data-end'), 10) || 0;
                var suffix = el.getAttribute('data-suffix') || '';
                var duration = 2000;
                var startTime = null;
                function animate(time) {
                    if (!startTime) startTime = time;
                    var progress = Math.min((time - startTime) / duration, 1);
                    el.textContent = Math.floor(progress * end) + suffix;
                    if (progress < 1) requestAnimationFrame(animate);
                }
                requestAnimationFrame(animate);
                counterObserver.unobserve(el);
            });
        }, { threshold: 0.5 });
        statCounters.forEach(function (c) { counterObserver.observe(c); });
    }

    // --- Quotation Popup ---
    var popup = document.getElementById('quotation-popup');
    var closeBtn = document.getElementById('close-popup');
    var backdrop = document.getElementById('popup-backdrop');

    if (popup) {
        if (!sessionStorage.getItem('quotationPopupShown')) {
            setTimeout(function () {
                popup.classList.remove('hidden');
                popup.classList.add('flex');
                sessionStorage.setItem('quotationPopupShown', 'true');
            }, 5000);
        }

        var closePopup = function () {
            popup.classList.add('hidden');
            popup.classList.remove('flex');
        };

        if (closeBtn) closeBtn.addEventListener('click', closePopup);
        if (backdrop) backdrop.addEventListener('click', closePopup);
    }
});
